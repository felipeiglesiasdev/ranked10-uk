<!DOCTYPE html>{{-- DECLARA O DOCUMENTO COMO HTML5 --}}
<html lang="en-GB">{{-- IDIOMA INGLES BRITANICO PARA SEO E ACESSIBILIDADE --}}
<head>
    <meta charset="utf-8">{{-- CHARSET UTF-8 --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">{{-- VIEWPORT RESPONSIVO MOBILE-FIRST --}}

    @stack('seo'){{-- PONTO ONDE CADA VIEW INJETA SUAS META TAGS DE SEO --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">{{-- PRECONNECT PARA O GOOGLE FONTS --}}
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>{{-- PRECONNECT PARA O CDN DE FONTES --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">{{-- IMPORTA A FONTE INTER --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-slate-50 font-sans text-slate-800 antialiased">{{-- CORPO COM FLEX COLUNA PARA O FOOTER COLAR NO FIM --}}

    <header class="bg-white border-b border-slate-200 sticky top-0 z-50">{{-- CABECALHO FIXO NO TOPO --}}
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex items-center justify-between gap-4 h-16">
                <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0" aria-label="ranked10 home">{{-- LOGO COM LINK PARA A HOME --}}
                    {{-- ICONE DE TROFEU (BOOTSTRAP ICONS: TROPHY-FILL) EM SVG INLINE --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16" class="text-amber-500" aria-hidden="true"><path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5q0 .807-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33 33 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935m10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935"/></svg>
                    <span class="text-xl font-extrabold tracking-tight text-slate-900">ranked<span class="text-amber-500">10</span></span>{{-- NOME DO SITE --}}
                </a>

                <form action="{{ route('search') }}" method="GET" class="hidden md:flex items-center flex-1 max-w-xs" role="search">{{-- BUSCA VISIVEL SO NO DESKTOP --}}
                    <label for="header-search" class="sr-only">Search articles</label>{{-- LABEL ACESSIVEL PARA LEITORES DE TELA --}}
                    <div class="relative w-full">
                        {{-- ICONE DE LUPA (BOOTSTRAP ICONS: SEARCH) EM SVG INLINE --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" aria-hidden="true"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>
                        <input id="header-search" type="search" name="q" value="{{ request('q') }}" placeholder="Search top 10 lists..." class="w-full rounded-full border border-slate-200 bg-slate-50 py-2 pl-9 pr-4 text-sm focus:border-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-200">{{-- CAMPO DE BUSCA DO HEADER --}}
                    </div>
                </form>

                <a href="{{ route('search') }}" class="md:hidden p-2 text-slate-500 hover:text-slate-900" aria-label="Search">{{-- NO MOBILE A BUSCA VIRA UM ICONE-LINK --}}
                    {{-- ICONE DE LUPA (BOOTSTRAP ICONS: SEARCH) EM SVG INLINE --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>
                </a>
            </div>

            <nav class="flex items-center gap-1 -mx-1 pb-2 overflow-x-auto" aria-label="Main navigation">{{-- NAV COM SCROLL HORIZONTAL NO MOBILE (SEM JS) --}}
                <a href="{{ route('home') }}" class="whitespace-nowrap rounded-full px-3 py-1.5 text-sm font-medium {{ request()->routeIs('home') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">Home</a>{{-- LINK DA HOME COM ESTADO ATIVO --}}
                @foreach ($navCategories as $navCategory){{-- PERCORRE AS CATEGORIAS COMPARTILHADAS PELO VIEW COMPOSER --}}
                    <a href="{{ route('category', $navCategory) }}" class="whitespace-nowrap rounded-full px-3 py-1.5 text-sm font-medium {{ request()->is($navCategory->slug.'*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">{{ $navCategory->name }}</a>{{-- LINK DA CATEGORIA COM ESTADO ATIVO --}}
                @endforeach
            </nav>
        </div>
    </header>

    <main class="flex-1">{{-- AREA PRINCIPAL QUE CRESCE PARA EMPURRAR O FOOTER --}}
        @yield('content'){{-- PONTO ONDE CADA VIEW INJETA SEU CONTEUDO --}}
    </main>

    <footer class="mt-16 bg-slate-900 text-slate-300">{{-- RODAPE ESCURO --}}
        <div class="max-w-6xl mx-auto px-4 py-10">
            <div class="flex flex-col gap-8 md:flex-row md:items-start md:justify-between">
                <div class="max-w-sm">
                    <p class="text-lg font-extrabold text-white">ranked<span class="text-amber-500">10</span></p>{{-- LOGO DO RODAPE --}}
                    <p class="mt-2 text-sm text-slate-400">Independent buying guides and top 10 rankings for UK shoppers. We research so you don't have to.</p>{{-- DESCRICAO CURTA DO SITE --}}
                </div>
                <nav class="flex flex-col gap-2 text-sm" aria-label="Footer navigation">{{-- LINKS INSTITUCIONAIS DO RODAPE --}}
                    <a href="#" class="hover:text-white">About</a>{{-- LINK SOBRE --}}
                    <a href="#" class="hover:text-white">Privacy Policy</a>{{-- LINK DE PRIVACIDADE --}}
                    <a href="#" class="hover:text-white">Affiliate Disclosure</a>{{-- LINK DA DIVULGACAO DE AFILIADOS --}}
                </nav>
            </div>
            <div class="mt-8 border-t border-slate-800 pt-6 text-xs text-slate-500">
                <p>As an Amazon Associate we earn from qualifying purchases. Prices and availability are subject to change.</p>{{-- AVISO OBRIGATORIO DO PROGRAMA DE AFILIADOS --}}
                <p class="mt-2">&copy; {{ date('Y') }} ranked10.co.uk — All rights reserved.</p>{{-- COPYRIGHT COM ANO DINAMICO --}}
            </div>
        </div>
    </footer>

</body>
</html>
