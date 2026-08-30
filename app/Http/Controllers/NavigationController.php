<?php

namespace App\Http\Controllers;

use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use Illuminate\Http\JsonResponse; // IMPORTA O TIPO DE RETORNO
use Illuminate\Support\Facades\Cache; // IMPORTA O CACHE (O CONTEUDO DO MENU MUDA UMA VEZ POR SEMANA, NAO POR REQUISICAO)

// DADOS DO MEGA MENU, SERVIDOS COMO JSON E INJETADOS NO DOM PELO NAVEGADOR.
//
// ─── POR QUE ISTO EXISTE ───
// O MENU ERA RENDERIZADO PELO SERVIDOR DENTRO DE <header>, EM TODAS AS PAGINAS. MEDIDO NA PAGINA
// DE POLITICA DE PRIVACIDADE: 91 KB DE 112 KB — **81% DO HTML DA PAGINA ERA O MENU**. E O
// AppServiceProvider CARREGAVA 7 CATEGORIAS + 76 ARTIGOS + 760 PRODUTOS DO BANCO EM TODA
// REQUISICAO DO SITE, INCLUSIVE NA BUSCA E NA POLITICA DE PRIVACIDADE, QUE NAO USAM NADA DISSO.
//
// ─── POR QUE UM ENDPOINT SO, E NAO UM POR CATEGORIA ───
// SETE ENDPOINTS SEPARADOS DARIAM ATE SETE IDAS AO SERVIDOR ENQUANTO O VISITANTE PASSEIA PELO
// MENU, CADA UMA COM SUA LATENCIA E SEU PISCA DE CARREGAMENTO. O PAYLOAD INTEIRO DAS SETE
// CATEGORIAS E PEQUENO, ENTAO E BUSCADO UMA VEZ SO, NA PRIMEIRA INTENCAO DE ABRIR O MENU, E
// TODOS OS HOVERS SEGUINTES SAO INSTANTANEOS PORQUE JA ESTAO NA MEMORIA DA ABA.
class NavigationController extends Controller
{
    private const TTL = 3600; // 1 HORA DE CACHE NO SERVIDOR (O MENU SO MUDA QUANDO UM ARTIGO NOVO E PUBLICADO)

    public function menu(): JsonResponse // DEVOLVE O CONTEUDO DE TODOS OS PAINEIS DO MEGA MENU
    {
        $dados = Cache::remember('nav:mega-menu', self::TTL, fn () => $this->monta()); // MONTA UMA VEZ POR HORA, SERVE DO CACHE NO RESTO DO TEMPO

        return response()->json($dados)
            ->header('Cache-Control', 'public, max-age=600'); // 10 MINUTOS NO NAVEGADOR: O MENU NAO PRECISA ESTAR AO VIVO
    }

    private function monta(): array // CONSULTA O BANCO E MONTA A ESTRUTURA DO MENU
    {
        $categorias = Category::query()
            ->withCount(['articles' => fn ($q) => $q->publicados()]) // TOTAL DE GUIAS PUBLICADOS DA CATEGORIA
            ->with(['articles' => fn ($q) => $q // SO OS ARTIGOS QUE APARECEM NO PAINEL
                ->publicados() // APENAS PUBLICADOS
                ->latest('published_at') // MAIS RECENTES PRIMEIRO
                ->take(6) // O PAINEL MOSTRA SEIS
                ->with(['products' => fn ($p) => $p->orderBy('position')->take(1)]), // SO O PRODUTO #1, QUE VIRA A MINIATURA
            ])
            ->orderBy('name') // ORDEM ALFABETICA, IGUAL A DA BARRA
            ->get(); // EXECUTA

        return [
            'categories' => $categorias->map(fn (Category $c) => [
                'id' => $c->id, // ID USADO COMO CHAVE NO JAVASCRIPT
                'name' => $c->name, // NOME EXIBIDO
                'slug' => $c->slug, // SLUG
                'url' => route('category', $c), // LINK DA CATEGORIA
                'description' => $c->description, // DESCRICAO EXIBIDA NO PAINEL
                'count' => $c->articles_count, // QUANTOS GUIAS A CATEGORIA TEM NO TOTAL
                'articles' => $c->articles->map(fn ($a) => [
                    'title' => $a->title, // TITULO DO GUIA
                    'url' => route('article', [$c, $a]), // LINK DO GUIA
                    'image' => $this->miniatura(optional($a->products->first())->image), // MINIATURA (FOTO DO PRODUTO #1)
                    'updated' => $a->updated_at?->format('j M Y'), // DATA DE ATUALIZACAO NO FORMATO BRITANICO
                ])->values()->all(), // LISTA DE GUIAS
            ])->values()->all(), // LISTA DE CATEGORIAS
        ];
    }

    private function miniatura(?string $url): ?string // ENCOLHE A IMAGEM DA AMAZON PARA TAMANHO DE MINIATURA
    {
        if (blank($url)) { // ARTIGO SEM PRODUTO OU PRODUTO SEM FOTO
            return null; // O PAINEL DESENHA UM PLACEHOLDER
        }

        // AS FOTOS SAO GRAVADAS EM _AC_SL1500_ (1500px), QUE E O TAMANHO CERTO PARA O CARD DO
        // PRODUTO E UM ABSURDO PARA UMA MINIATURA DE 40px NO MENU. A AMAZON SERVE QUALQUER
        // TAMANHO PELO PROPRIO NOME DO ARQUIVO, ENTAO TROCAR O NUMERO CORTA ~95% DO PESO.
        return preg_replace('/\._[^.]*_\./', '._AC_SL160_.', $url) ?: $url; // MINIATURA DE 160px
    }
}
