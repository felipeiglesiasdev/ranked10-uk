<?php

namespace App\Providers;

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS (LISTA DE GUIAS DO RODAPE)
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS PARA O MENU
use Illuminate\Support\Facades\Schema; // IMPORTA A FACADE SCHEMA PARA CHECAR SE A TABELA EXISTE
use Illuminate\Support\Facades\URL; // IMPORTA A FACADE URL PARA FIXAR A RAIZ CANONICA (www)
use Illuminate\Support\Facades\View; // IMPORTA A FACADE VIEW PARA O VIEW COMPOSER
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ═══════════════════════════════════════════════════════════════════
        // TODA URL PUBLICA SAI COM www.
        //
        // O CANONICO DO SITE E https://www.ranked10.co.uk, NAO O APEX. SEM ISTO, TUDO QUE
        // route() GERA COPIA O HOST DA REQUISICAO: quem chegasse pelo apex receberia uma
        // pagina que se declara canonica NO APEX, competindo com a versao www — e o mesmo
        // valia para og:url, o JSON-LD e as 130 URLs do sitemap.
        //
        // O REDIRECIONAMENTO DA CLOUDFLARE resolve o acesso, mas nao o que o HTML DIZ de si
        // mesmo se alguma requisicao escapar por baixo dele. Aqui e resolvido na geracao.
        //
        // ⚠ O GUARDA E O PROPRIO HOST, NAO O APP_ENV: o .env de producao pode estar como
        // 'local' e isto continuaria valendo. Em ranked10-app.test e localhost nao toca em nada.
        // ═══════════════════════════════════════════════════════════════════
        if (str_contains(request()->getHost(), 'ranked10.co.uk')) {
            URL::forceRootUrl(config('app.canonical_url')); // RAIZ FIXA: SEMPRE O HOST COM www
            URL::forceScheme('https'); // E SEMPRE HTTPS, MESMO ATRAS DO PROXY DA CLOUDFLARE
        }

        // ═══════════════════════════════════════════════════════════════════
        // DADOS COMPARTILHADOS COM O LAYOUT (HEADER E FOOTER DE TODA PAGINA).
        //
        // ⚠ ESTE COMPOSER RODA EM **TODA** REQUISICAO DO SITE. TUDO QUE ENTRAR AQUI E PAGO
        // NA HOME, NA BUSCA, NA POLITICA DE PRIVACIDADE E EM CADA UM DOS 76 ARTIGOS.
        //
        // ATE AGOSTO/2026 ELE CARREGAVA AS 7 CATEGORIAS **COM OS 76 ARTIGOS E OS 760 PRODUTOS**,
        // PARA MONTAR OS PAINEIS DO MEGA MENU DENTRO DO HTML. ISSO CUSTAVA 91 KB EM CADA PAGINA
        // (81% DA POLITICA DE PRIVACIDADE) MAIS O TRABALHO DE HIDRATAR 836 MODELS ELOQUENT POR
        // REQUISICAO — TUDO PARA UM MENU QUE A MAIORIA DOS VISITANTES NUNCA ABRE.
        //
        // AGORA O MENU BUSCA O PROPRIO CONTEUDO EM /nav/menu QUANDO E ABERTO
        // (App\Http\Controllers\NavigationController), E AQUI FICA SO O ESSENCIAL:
        //   navCategories ........ 7 LINHAS, SEM RELACIONAMENTO NENHUM
        //   navPopularArticles ... 6 ARTIGOS COM A CATEGORIA, PARA A COLUNA DO RODAPE
        // ═══════════════════════════════════════════════════════════════════
        View::composer('layouts.app', function ($view) {
            $temTabelas = Schema::hasTable('categories') && Schema::hasTable('articles'); // EVITA ERRO ANTES DAS MIGRATIONS RODAREM

            $categories = $temTabelas
                ? Category::orderBy('name')->get() // SO AS CATEGORIAS: O CONTEUDO DO MENU VEM DE /nav/menu
                : collect(); // COLECAO VAZIA SE AS TABELAS AINDA NAO EXISTEM

            // O RODAPE LISTA OS GUIAS MAIS RECENTES. ANTES ELE DERIVAVA ISSO DOS ARTIGOS JA
            // CARREGADOS NAS CATEGORIAS; SEM ELES, PRECISA DA PROPRIA CONSULTA — QUE E UMA SO,
            // COM LIMITE DE 6 E A CATEGORIA JUNTO (SEM ISSO, SERIAM 6 CONSULTAS EXTRAS PARA
            // MONTAR OS LINKS, O VELHO N+1 EM TODAS AS PAGINAS DO SITE).
            $popularArticles = $temTabelas
                ? Article::publicados()->with('category')->latest('published_at')->take(6)->get() // 6 GUIAS MAIS RECENTES
                : collect(); // COLECAO VAZIA SE AS TABELAS AINDA NAO EXISTEM

            $view->with('navCategories', $categories); // CATEGORIAS PARA O HEADER E PARA O RODAPE
            $view->with('navPopularArticles', $popularArticles); // GUIAS RECENTES PARA O RODAPE
        });
    }
}
