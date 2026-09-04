<?php

namespace App\Http\Controllers;

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS
use App\Services\Turnstile; // IMPORTA O SERVICO DO CAPTCHA (SO PARA LER A CHAVE PUBLICA)
use Illuminate\Database\Eloquent\Builder; // IMPORTA O BUILDER PARA TIPAR OS CALLBACKS DE CONSULTA
use Illuminate\View\View; // IMPORTA O TIPO DE RETORNO DAS VIEWS

// ═══════════════════════════════════════════════════════════════════════════
// PAGINA PROPRIA DE UM PRODUTO — /{categoria}/{artigo}/{produto}
//
// ⚠ SO EXISTE PARA PRODUTO COM slug PREENCHIDO. TODO O RESTO DO SITE SEGUE IGUAL.
// ⚠ ESTA PAGINA NAO TEM AUTOR: ELA NAO E ANALISE EDITORIAL ASSINADA, E UMA FICHA
//   MONTADA A PARTIR DO QUE A AMAZON PUBLICA. O AVISO DE ORIGEM FICA NA VIEW.
// ═══════════════════════════════════════════════════════════════════════════

class ProductController extends Controller
{
    public function show(Category $category, Article $article, string $produto): View // EXIBE A PAGINA DE UM PRODUTO
    {
        abort_unless($article->category_id === $category->id, 404); // O ARTIGO TEM QUE PERTENCER A CATEGORIA DA URL
        abort_unless($article->published_at && $article->published_at->isPast(), 404); // NAO SE ABRE PRODUTO DE RASCUNHO

        $product = $article->products()->where('slug', $produto)->first(); // O PRODUTO TEM QUE SER DESTE ARTIGO
        abort_unless($product && $product->temPagina(), 404); // SEM PRODUTO OU SEM PAGINA LIBERADA: 404

        $alternativas = $article->products() // OS ADVERSARIOS DO MESMO RANKING
            ->whereKeyNot($product->id) // MENOS ELE MESMO
            ->orderBy('position') // NA ORDEM DO RANKING
            ->take(4) // OS QUATRO MAIS BEM COLOCADOS
            ->get(); // EXECUTA

        $semelhantes = Product::melhorAvaliados() // PRODUTOS PARECIDOS: OS MELHOR AVALIADOS DE OUTROS GUIAS DA MESMA CATEGORIA
            ->where('article_id', '!=', $article->id) // DE OUTRO ARTIGO
            ->whereHas('article', fn (Builder $q) => $q->where('category_id', $category->id)) // MAS DA MESMA CATEGORIA
            ->with('article.category') // CARREGA ARTIGO E CATEGORIA PARA O LINK, SEM N+1
            ->take(4) // TETO DO BLOCO
            ->get(); // EXECUTA

        $sidebarArticles = Article::publicados() // OUTROS GUIAS PARA A COLUNA DA DIREITA
            ->with('category') // CARREGA A CATEGORIA PARA MONTAR O LINK SEM N+1
            ->whereKeyNot($article->id) // SEM REPETIR O RANKING DE ORIGEM, QUE JA TEM DESTAQUE PROPRIO NA COLUNA
            ->where('category_id', $category->id) // PRIORIZA A MESMA CATEGORIA
            ->latest('published_at') // MAIS RECENTES PRIMEIRO
            ->take(6) // TETO DA COLUNA
            ->get(); // EXECUTA

        if ($sidebarArticles->count() < 6) { // CATEGORIA PEQUENA: COMPLETA COM ARTIGOS DE FORA PARA A COLUNA NAO FICAR PELA METADE
            $sidebarArticles = $sidebarArticles->concat(
                Article::publicados()
                    ->with('category')
                    ->where('category_id', '!=', $category->id) // DE OUTRAS CATEGORIAS
                    ->latest('published_at')
                    ->skip(6) // PULA OS 6 QUE O RODAPE DE TODA PAGINA JA LINKA (MESMO MOTIVO DO ArticleController)
                    ->take(6 - $sidebarArticles->count()) // SO O QUE FALTA
                    ->get()
            );
        }

        $categorias = Category::withCount(['articles' => fn (Builder $q) => $q->publicados()]) // AS OUTRAS CATEGORIAS PARA A COLUNA
            ->orderBy('name') // EM ORDEM ALFABETICA
            ->get(); // EXECUTA

        $comentarios = collect(); // COLECAO VAZIA POR PADRAO (COMENTARIOS PODEM ESTAR DESLIGADOS)
        $turnstileSiteKey = null; // CHAVE PUBLICA DO CAPTCHA (NULA = CAPTCHA DESLIGADO NO .env)

        if (config('comments.enabled', true)) { // MESMO SISTEMA DO RANKING, SO QUE FILTRADO POR product_id
            $comentarios = $product->comments() // COMENTARIOS DESTA PAGINA DE PRODUTO
                ->aprovados() // SO OS APROVADOS
                ->whereNull('parent_id') // SO AS RAIZES: AS RESPOSTAS VEM PELO RELACIONAMENTO
                ->with('replies') // CARREGA AS RESPOSTAS DE UMA VEZ (SEM ISSO SERIA 1 CONSULTA POR COMENTARIO)
                ->latest() // MAIS NOVOS PRIMEIRO, IGUAL AO ARTIGO
                ->take((int) config('comments.per_page', 20)) // TETO DE COMENTARIOS RENDERIZADOS
                ->get(); // EXECUTA

            $turnstileSiteKey = app(Turnstile::class)->siteKey(); // SO DEVOLVE ALGO SE O PAR DE CHAVES ESTIVER COMPLETO
        }

        return view('products.show', compact('category', 'article', 'product', 'alternativas', 'semelhantes', 'sidebarArticles', 'categorias', 'comentarios', 'turnstileSiteKey')); // RETORNA A VIEW DA PAGINA DO PRODUTO
    }
}
