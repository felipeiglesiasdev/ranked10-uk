<?php

namespace App\Http\Controllers;

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS
use App\Support\Autores; // IMPORTA O ACESSO AOS PERFIS DE AUTOR
use Illuminate\View\View; // IMPORTA O TIPO DE RETORNO DAS VIEWS

// PAGINAS INSTITUCIONAIS DE AUTORIDADE (E-E-A-T): /about, /how-we-rank E /author/<slug>.
// SAO AS TRES PAGINAS QUE O GOOGLE USA PARA DECIDIR SE UM SITE DE AFILIADO E UMA FONTE OU
// APENAS MAIS UM AGREGADOR. TODAS AS ESTATISTICAS SAO LIDAS DO BANCO EM VEZ DE ESCRITAS NO
// TEXTO — NUMERO CRAVADO NA MAO ENVELHECE E VIRA MENTIRA SEM QUE NINGUEM PERCEBA.
class PageController extends Controller
{
    public function about(): View // PAGINA SOBRE O ranked10
    {
        return view('pages.about', [
            'stats' => $this->numeros(), // NUMEROS DO SITE INTEIRO
            'categorias' => Category::withCount(['articles' => fn ($q) => $q->publicados()])->orderBy('name')->get(), // CATEGORIAS COM A CONTAGEM DE GUIAS
            'autor' => Autores::porSlug('felipe-iglesias'), // PERFIL DO FUNDADOR PARA O BLOCO DE ASSINATURA
        ]);
    }

    public function howWeRank(): View // PAGINA DA METODOLOGIA DE RANQUEAMENTO
    {
        return view('pages.how-we-rank', [
            'stats' => $this->numeros(), // NUMEROS DO SITE INTEIRO
            'autor' => Autores::porSlug('felipe-iglesias'), // PERFIL DE QUEM APLICA O METODO
        ]);
    }

    public function author(string $slug): View // PAGINA PESSOAL DE UM AUTOR
    {
        $autor = Autores::porSlug($slug); // BUSCA O PERFIL PELO SLUG DA URL

        abort_unless($autor, 404); // SLUG DESCONHECIDO NAO INVENTA PAGINA (EVITA PAGINA VAZIA INDEXAVEL)

        $artigos = Article::publicados() // ARTIGOS PUBLICADOS DESTE AUTOR
            ->with('category') // CARREGA A CATEGORIA PARA MONTAR OS LINKS SEM N+1
            ->where('author', $autor['name']) // CASA PELO NOME EXIBIDO, QUE E O QUE FICA GRAVADO NO ARTIGO
            ->latest('published_at') // MAIS RECENTES PRIMEIRO
            ->get(); // EXECUTA A CONSULTA

        return view('pages.author', [
            'autor' => $autor, // PERFIL COMPLETO
            'artigos' => $artigos, // TODOS OS GUIAS DELE (A VIEW DECIDE QUANTOS MOSTRAR)
            'stats' => $this->numerosDoAutor($autor['name'], $artigos), // NUMEROS ESPECIFICOS DESTE AUTOR
        ]);
    }

    private function numeros(): array // ESTATISTICAS DO SITE INTEIRO, LIDAS DO BANCO
    {
        return [
            'artigos' => Article::publicados()->count(), // QUANTOS GUIAS PUBLICADOS
            'produtos' => Product::whereHas('article', fn ($q) => $q->publicados())->count(), // QUANTOS PRODUTOS ANALISADOS
            'categorias' => Category::whereHas('articles', fn ($q) => $q->publicados())->count(), // QUANTAS CATEGORIAS COM CONTEUDO
            'avaliacoes' => (int) Product::whereHas('article', fn ($q) => $q->publicados())->sum('reviews_count'), // SOMA DAS AVALIACOES DE CLIENTE LIDAS
        ];
    }

    private function numerosDoAutor(string $nome, $artigos): array // ESTATISTICAS DE UM AUTOR ESPECIFICO
    {
        $ids = $artigos->pluck('id'); // IDS DOS ARTIGOS DELE

        return [
            'artigos' => $artigos->count(), // QUANTOS GUIAS ESCREVEU
            'produtos' => Product::whereIn('article_id', $ids)->count(), // QUANTOS PRODUTOS PASSARAM PELAS MAOS DELE
            'categorias' => $artigos->pluck('category_id')->unique()->count(), // EM QUANTAS CATEGORIAS ATUA
            'avaliacoes' => (int) Product::whereIn('article_id', $ids)->sum('reviews_count'), // SOMA DAS AVALIACOES DE CLIENTE CONSIDERADAS
            'primeiro' => $artigos->min('published_at'), // DATA DO PRIMEIRO GUIA
            'ultimo' => $artigos->max('published_at'), // DATA DO GUIA MAIS RECENTE
        ];
    }
}
