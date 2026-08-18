<!DOCTYPE html>{{-- DECLARA O DOCUMENTO COMO HTML5 --}}
<html lang="en-GB">{{-- IDIOMA INGLES BRITANICO PARA SEO E ACESSIBILIDADE --}}
<head>
    <meta charset="utf-8">{{-- CHARSET UTF-8 (FICA EM PRIMEIRO PARA O NAVEGADOR NAO REINTERPRETAR O DOCUMENTO) --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">{{-- VIEWPORT RESPONSIVO MOBILE-FIRST --}}

    {{-- GOOGLE TAG MANAGER (GTM-W6JNCFFC) — O MAIS ALTO POSSIVEL NO <head>, SO DEPOIS DE charset/viewport.
         MESMA REGRA DO GA4 ABAIXO: NAO CARREGA EM ambiente local. COM O GTM ISSO PESA AINDA MAIS, PORQUE O
         CONTAINER PODE DISPARAR VARIAS TAGS (GA4, PIXELS, CONVERSOES) E TODAS SUJARIAM OS DADOS EM DESENVOLVIMENTO. --}}
    @unless (app()->environment('local'))
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-W6JNCFFC');</script>{{-- SNIPPET DO CONTAINER GTM --}}
    @endunless

    <meta name="theme-color" content="#BE1627">{{-- COR DA BARRA DO NAVEGADOR (MOBILE) NA COR DA MARCA --}}
    <meta name="robots" content="index, follow, max-image-preview:large">{{-- PADRAO: INDEXAR E SEGUIR (PAGINAS PODEM SOBRESCREVER) --}}
    <meta name="author" content="ranked10">{{-- AUTOR/PUBLISHER DO SITE --}}
    <meta name="format-detection" content="telephone=no">{{-- EVITA O IOS TRANSFORMAR NUMEROS EM LINKS DE TELEFONE --}}
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Ranked10" />
    <link rel="manifest" href="/site.webmanifest" />
    <meta property="og:locale" content="en_GB">{{-- LOCALE OPEN GRAPH --}}
    <meta name="twitter:card" content="summary_large_image">{{-- CARTAO DO TWITTER/X --}}

    {{-- GOOGLE ANALYTICS 4 (GA4). NAO CARREGA EM AMBIENTE local PARA O TRAFEGO DE DESENVOLVIMENTO
         NAO SUJAR OS RELATORIOS — DADO DE ANALYTICS NAO PODE SER LIMPO DEPOIS.
         A CONDICAO E "TUDO QUE NAO FOR local", ENTAO SE O SERVIDOR NAO DEFINIR APP_ENV A TAG CARREGA IGUAL. --}}
    @unless (app()->environment('local'))
        <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>{{-- PRECONNECT COM O HOST DO GTAG PARA REDUZIR A LATENCIA DA TAG --}}
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-81KLERKV14"></script>{{-- CARREGA O SCRIPT DO GA4 DE FORMA ASSINCRONA (NAO BLOQUEIA O RENDER) --}}
        <script>
            window.dataLayer = window.dataLayer || []; // FILA DE EVENTOS DO GTAG
            function gtag(){dataLayer.push(arguments);} // FUNCAO PADRAO QUE EMPILHA OS ARGUMENTOS NA FILA
            gtag('js', new Date()); // MARCA O INICIO DA SESSAO DE MEDICAO
            gtag('config', 'G-81KLERKV14'); // ID DE MEDICAO DA PROPRIEDADE GA4 DO ranked10
        </script>
    @endunless

    @stack('seo'){{-- PONTO ONDE CADA VIEW INJETA SUAS META TAGS E SCHEMAS DE SEO --}}

    {{-- SCHEMA GLOBAL: ORGANIZATION + WEBSITE COM CAIXA DE BUSCA (SITELINKS SEARCHBOX) --}}
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'Organization', // ENTIDADE DA MARCA
                '@id' => url('/#organization'),
                'name' => 'ranked10',
                'url' => url('/'),
                'description' => 'Independent top 10 buying guides for UK shoppers.',
            ],
            [
                '@type' => 'WebSite', // ENTIDADE DO SITE
                '@id' => url('/#website'),
                'url' => url('/'),
                'name' => 'ranked10',
                'inLanguage' => 'en-GB',
                'publisher' => ['@id' => url('/#organization')],
                'potentialAction' => [ // ACAO DE BUSCA PARA A CAIXA DE PESQUISA DO GOOGLE
                    '@type' => 'SearchAction',
                    'target' => [
                        '@type' => 'EntryPoint',
                        'urlTemplate' => route('search').'?q={search_term_string}',
                    ],
                    'query-input' => 'required name=search_term_string',
                ],
            ],
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    <link rel="preconnect" href="https://cdn.ranked10.co.uk" crossorigin>{{-- PRECONNECT COM O CDN (CLOUDFLARE R2) QUE SERVE AS FONTES --}}
    <link rel="preload" as="font" type="font/woff2" href="https://cdn.ranked10.co.uk/fonts/Poppins-Regular.woff2" crossorigin>{{-- PRELOAD DO PESO MAIS USADO (CORPO DE TEXTO) PARA ACELERAR O PRIMEIRO RENDER --}}
    <link rel="preload" as="font" type="font/woff2" href="https://cdn.ranked10.co.uk/fonts/Poppins-SemiBold.woff2" crossorigin>{{-- PRELOAD DO PESO DOS TITULOS (600-800) --}}

    @vite(['resources/css/app.css', 'resources/js/app.js']){{-- CARREGA O TAILWIND + ALPINE COMPILADOS PELO VITE --}}
</head>
<body class="min-h-screen flex flex-col bg-slate-50 font-sans text-slate-800 antialiased">{{-- CORPO COM FLEX COLUNA PARA O FOOTER COLAR NO FIM --}}

    {{-- GOOGLE TAG MANAGER (noscript) — TEM QUE FICAR IMEDIATAMENTE APOS A ABERTURA DO <body>.
         SERVE PARA NAVEGADORES COM JAVASCRIPT DESABILITADO. MESMA GUARDA DE AMBIENTE DO SNIPPET DO <head>. --}}
    @unless (app()->environment('local'))
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W6JNCFFC"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>{{-- FALLBACK SEM JAVASCRIPT --}}
    @endunless

    <x-utils.header :nav-categories="$navCategories" />{{-- HEADER UNICO E RESPONSIVO (MOBILE-FIRST + MEGA MENU) --}}

    <main class="flex-1" role="main">{{-- AREA PRINCIPAL QUE CRESCE PARA EMPURRAR O FOOTER --}}
        @yield('content'){{-- PONTO ONDE CADA VIEW INJETA SEU CONTEUDO --}}
    </main>

    <x-utils.footer :nav-categories="$navCategories" />{{-- FOOTER UNICO E RESPONSIVO (RECEBE CATEGORIAS+ARTIGOS PARA O GRAFO DE LINKS) --}}

</body>
</html>
