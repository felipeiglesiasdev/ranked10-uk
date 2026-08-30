<?php

namespace App\Http\Controllers;

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (BLOCO DE MELHOR AVALIADOS DE OUTROS GUIAS)
use App\Services\Turnstile; // IMPORTA O SERVICO DO CAPTCHA (SO PARA LER A CHAVE PUBLICA)
use Illuminate\View\View; // IMPORTA O TIPO DE RETORNO DAS VIEWS

class ArticleController extends Controller
{
    public function show(Category $category, Article $article): View // EXIBE UM ARTIGO COMPLETO COM SEUS PRODUTOS
    {
        abort_unless($article->category_id === $category->id, 404); // GARANTE QUE O ARTIGO PERTENCE A CATEGORIA DA URL

        abort_unless($article->published_at && $article->published_at->isPast(), 404); // BLOQUEIA ACESSO A ARTIGOS NAO PUBLICADOS

        $article->load('products'); // CARREGA OS PRODUTOS DO ARTIGO (JA ORDENADOS POR POSITION NO RELACIONAMENTO)

        $author = collect(config('authors'))->firstWhere('name', $article->author); // BUSCA O PERFIL DO AUTOR PELO NOME (config/authors.php)

        $related = $this->relacionados($category, $article); // BUSCA OS ARTIGOS RELACIONADOS PARA ANCORAGEM DE LINKS

        $sidebarArticles = $this->paraBarraLateral($category, $article, $related); // GUIAS EXTRAS PARA A COLUNA DA DIREITA

        $topProducts = Product::melhorAvaliados() // ORDENA PELA NOTA PONDERADA PELO VOLUME DE AVALIACOES
            ->where('article_id', '!=', $article->id) // EXCLUI OS PRODUTOS DO PROPRIO ARTIGO (JA ESTAO NA PAGINA)
            ->with('article.category') // CARREGA ARTIGO E CATEGORIA PARA MONTAR O LINK INTERNO SEM N+1
            ->take(4) // LIMITA AOS 4 MELHORES DE OUTROS GUIAS
            ->get(); // EXECUTA A CONSULTA

        $comentarios = collect(); // COLECAO VAZIA POR PADRAO (COMENTARIOS PODEM ESTAR DESLIGADOS)
        $turnstileSiteKey = null; // CHAVE PUBLICA DO CAPTCHA (NULA = CAPTCHA DESLIGADO NO .env)

        if (config('comments.enabled', true)) { // SO CONSULTA COMENTARIOS SE A SECAO ESTIVER LIGADA
            $comentarios = $article->comentariosPublicados() // COMENTARIOS RAIZ APROVADOS, MAIS NOVOS PRIMEIRO
                ->with('replies') // CARREGA AS RESPOSTAS DE UMA VEZ (SEM ISSO SERIA 1 CONSULTA POR COMENTARIO)
                ->take((int) config('comments.per_page', 20)) // TETO DE COMENTARIOS RENDERIZADOS NA PAGINA
                ->get(); // EXECUTA A CONSULTA

            $turnstileSiteKey = app(Turnstile::class)->siteKey(); // SO DEVOLVE ALGO SE O PAR DE CHAVES ESTIVER COMPLETO
        }

        return view('articles.show', compact('category', 'article', 'author', 'related', 'sidebarArticles', 'topProducts', 'comentarios', 'turnstileSiteKey')); // RETORNA A VIEW DO ARTIGO COM OS DADOS
    }

    private function paraBarraLateral(Category $category, Article $article, $jaExibidos) // MONTA A LISTA DE GUIAS DA COLUNA LATERAL
    {
        // POR QUE ESTA CONSULTA EXISTE: A COLUNA DA DIREITA ERA ESPACO MORTO NO DESKTOP, E O SITE
        // ACABOU DE PERDER ~28 LINKS DE ARTIGO POR PAGINA QUANDO O MEGA MENU VIROU ASSINCRONO.
        // LINK CONTEXTUAL DENTRO DO ARTIGO VALE MAIS QUE LINK DE MENU, ENTAO A TROCA E BOA — MAS
        // SO SE ELE EXISTIR. AQUI ELE PASSA A EXISTIR.
        //
        // ⚠ EXCLUI OS ARTIGOS QUE JA APARECEM NO BLOCO "RELATED" DO RODAPE. REPETIR O MESMO LINK
        // DUAS VEZES NA MESMA PAGINA NAO ACRESCENTA NADA AO GRAFO INTERNO E SO GASTA ESPACO.
        $excluir = collect($jaExibidos)->pluck('id')->push($article->id)->all(); // IDS QUE NAO PODEM SE REPETIR

        $daCategoria = Article::publicados() // PRIMEIRO OS DA MESMA CATEGORIA: SAO OS MAIS RELEVANTES PARA QUEM ESTA LENDO
            ->with('category') // CARREGA A CATEGORIA PARA MONTAR O LINK SEM N+1
            ->where('category_id', $category->id) // MESMA CATEGORIA
            ->whereNotIn('id', $excluir) // SEM REPETIR O QUE JA ESTA NA PAGINA
            ->latest('published_at') // MAIS RECENTES PRIMEIRO
            ->take(8) // TETO DA COLUNA
            ->get(); // EXECUTA

        if ($daCategoria->count() >= 8) { // A CATEGORIA SOZINHA JA PREENCHEU A COLUNA
            return $daCategoria; // NAO PRECISA COMPLEMENTAR
        }

        // CATEGORIA PEQUENA (GARDEN E PET SUPPLIES TEM 7 ARTIGOS): COMPLEMENTA COM ARTIGOS DE FORA
        // PARA A COLUNA NAO FICAR PELA METADE.
        //
        // ⚠ O skip(6) NAO E ARBITRARIO. O RODAPE DE **TODA** PAGINA DO SITE JA LISTA OS 6 GUIAS
        // MAIS RECENTES (VER AppServiceProvider). SEM PULAR ESSES SEIS, A COLUNA LATERAL ESCOLHIA
        // EXATAMENTE OS MESMOS E A PAGINA APONTAVA DOIS LINKS PARA CADA UM — MEDIDO: 5 ARTIGOS
        // DUPLICADOS. O GOOGLE SO CONSIDERA A ANCORA DO PRIMEIRO LINK, ENTAO O SEGUNDO NAO
        // ACRESCENTA NADA AO GRAFO E AINDA GASTA UMA VAGA QUE PODIA LEVAR A OUTRO ARTIGO.
        $complemento = Article::publicados() // BUSCA FORA DA CATEGORIA
            ->with('category') // CARREGA A CATEGORIA
            ->where('category_id', '!=', $category->id) // DE OUTRAS CATEGORIAS
            ->whereNotIn('id', $excluir) // SEM REPETIR O QUE JA ESTA NA PAGINA
            ->latest('published_at') // MAIS RECENTES PRIMEIRO
            ->skip(6) // PULA OS 6 QUE O RODAPE JA LINKA
            ->take(8 - $daCategoria->count()) // SO O QUE FALTA PARA FECHAR A COLUNA
            ->get(); // EXECUTA

        return $daCategoria->concat($complemento); // JUNTA OS DOIS CONJUNTOS
    }

    private function relacionados(Category $category, Article $article) // MONTA ATE 3 ARTIGOS RELACIONADOS
    {
        $relacionados = Article::publicados() // COMECA PELOS ARTIGOS PUBLICADOS
            ->with('category') // CARREGA A CATEGORIA PARA MONTAR OS LINKS
            ->where('category_id', $category->id) // PRIORIZA ARTIGOS DA MESMA CATEGORIA
            ->whereKeyNot($article->id) // EXCLUI O PROPRIO ARTIGO ATUAL
            ->latest('published_at') // ORDENA DO MAIS RECENTE PARA O MAIS ANTIGO
            ->take(3) // LIMITA A 3 ARTIGOS
            ->get(); // EXECUTA A CONSULTA

        if ($relacionados->count() < 3) { // SE NAO COMPLETOU 3 DA MESMA CATEGORIA
            $complemento = Article::publicados() // BUSCA ARTIGOS DE OUTRAS CATEGORIAS PARA COMPLETAR
                ->with('category') // CARREGA A CATEGORIA
                ->where('category_id', '!=', $category->id) // DE CATEGORIAS DIFERENTES
                ->whereKeyNot($article->id) // EXCLUI O ARTIGO ATUAL POR SEGURANCA
                ->latest('published_at') // ORDENA DO MAIS RECENTE
                ->take(3 - $relacionados->count()) // PEGA APENAS O QUE FALTA PARA CHEGAR A 3
                ->get(); // EXECUTA A CONSULTA

            $relacionados = $relacionados->concat($complemento); // JUNTA OS DOIS CONJUNTOS
        }

        return $relacionados; // RETORNA A COLECAO DE RELACIONADOS
    }
}
