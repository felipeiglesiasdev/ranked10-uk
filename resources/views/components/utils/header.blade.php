@props(['navCategories' => collect()]){{-- PROP: CATEGORIAS COM ARTIGOS+PRODUTOS (PASSADA PELO LAYOUT) --}}

@php
    // MONTA O SCHEMA SITENAVIGATIONELEMENT (SEO) COM HOME + CATEGORIAS
    $navSchema = [
        '@context' => 'https://schema.org', // CONTEXTO PADRAO DO SCHEMA.ORG
        '@type' => 'SiteNavigationElement', // TIPO DE ELEMENTO DE NAVEGACAO DO SITE
        'name' => array_merge(['Home'], $navCategories->pluck('name')->all()), // NOMES DOS ITENS DO MENU
        'url' => array_merge([route('home')], $navCategories->map(fn ($c) => route('category', $c))->all()), // URLS DOS ITENS DO MENU
    ];
@endphp

{{-- SCHEMA DE NAVEGACAO (SEO): RENDERIZADO INLINE NO BODY POIS O HEADER E EXIBIDO APOS O @stack('seo') DO HEAD; JSON-LD E VALIDO EM QUALQUER LUGAR DO DOCUMENTO --}}
<script type="application/ld+json">{!! json_encode($navSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>{{-- DADOS ESTRUTURADOS DA NAVEGACAO --}}

{{-- HEADER UNICO E RESPONSIVO (MOBILE-FIRST) CONTROLADO PELO ALPINE --}}
<header
    x-data="{ open: null, mobileOpen: false }"
    @keydown.escape.window="open = null; mobileOpen = false"
    @mouseleave="open = null"
    class="sticky top-0 z-50 bg-white border-b border-slate-200"
    role="banner"
>
    <nav class="mx-auto max-w-6xl px-5 sm:px-6 lg:px-8" aria-label="Primary navigation">{{-- CONTAINER COM O MESMO GUTTER DO BODY/FOOTER --}}
        <div class="flex h-16 items-center justify-between gap-3">{{-- BARRA SUPERIOR --}}

            {{-- BOTAO HAMBURGUER: SO NO MOBILE/TABLET (ABAIXO DE lg) --}}
            <button
                type="button"
                @click="mobileOpen = !mobileOpen"
                :aria-expanded="mobileOpen.toString()"
                aria-controls="mobile-menu"
                class="lg:hidden -ml-2 p-2 text-slate-700 hover:text-brand"
                aria-label="Toggle navigation menu"
            >
                {{-- ICONE HAMBURGUER (BOOTSTRAP ICONS: LIST) - VISIVEL QUANDO FECHADO --}}
                <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/></svg>
                {{-- ICONE X (BOOTSTRAP ICONS: X-LG) - VISIVEL QUANDO ABERTO --}}
                <svg x-show="mobileOpen" x-cloak xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/></svg>
            </button>

            {{-- LOGO --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0" aria-label="ranked10 — homepage">
                {{-- ICONE DE TROFEU (BOOTSTRAP ICONS: TROPHY-FILL) EM SVG INLINE --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16" class="text-brand" aria-hidden="true"><path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5q0 .807-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33 33 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935m10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935"/></svg>
                <span class="text-xl font-extrabold tracking-tight text-slate-900">ranked<span class="text-brand">10</span></span>
            </a>

            {{-- NAVEGACAO DESKTOP (lg+) COM MEGA MENU --}}
            <ul class="hidden lg:flex items-center gap-1">{{-- LISTA HORIZONTAL DE CATEGORIAS --}}
                <li>
                    <a href="{{ route('home') }}" @mouseenter="open = null" class="block whitespace-nowrap rounded-full px-3 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'bg-brand text-white' : 'text-slate-600 hover:bg-slate-100' }}">Home</a>{{-- LINK DA HOME --}}
                </li>
                @foreach ($navCategories as $navCategory){{-- PERCORRE AS CATEGORIAS --}}
                    <li @mouseenter="open = {{ $navCategory->id }}">{{-- AO PASSAR O MOUSE, ABRE O MEGA MENU DESTA CATEGORIA --}}
                        <a
                            href="{{ route('category', $navCategory) }}"
                            class="flex items-center gap-1 whitespace-nowrap rounded-full px-3 py-2 text-sm font-medium {{ request()->is($navCategory->slug.'*') ? 'bg-brand text-white' : 'text-slate-600 hover:bg-slate-100' }}"
                            :aria-expanded="(open === {{ $navCategory->id }}).toString()"
                        >
                            {{ $navCategory->name }}
                            {{-- ICONE CHEVRON BAIXO (BOOTSTRAP ICONS: CHEVRON-DOWN), GIRA QUANDO ABERTO --}}
                            <svg class="transition-transform" :class="open === {{ $navCategory->id }} ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/></svg>
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- BUSCA DESKTOP (lg+) --}}
            <form action="{{ route('search') }}" method="GET" class="hidden lg:flex items-center w-56" role="search">{{-- FORMULARIO DE BUSCA --}}
                <label for="header-search" class="sr-only">Search articles</label>
                <div class="relative w-full">
                    {{-- ICONE DE LUPA (BOOTSTRAP ICONS: SEARCH) EM SVG INLINE --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" aria-hidden="true"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>
                    <input id="header-search" type="search" name="q" value="{{ request('q') }}" placeholder="Search top 10 lists..." class="w-full rounded-full border border-slate-200 bg-slate-50 py-2 pl-9 pr-3 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/30">
                </div>
            </form>

            {{-- BUSCA MOBILE: ICONE-LINK (ABAIXO DE lg) --}}
            <a href="{{ route('search') }}" class="lg:hidden -mr-2 p-2 text-slate-600 hover:text-brand" aria-label="Search">
                {{-- ICONE DE LUPA (BOOTSTRAP ICONS: SEARCH) EM SVG INLINE --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>
            </a>
        </div>
    </nav>

    {{-- PAINEIS DO MEGA MENU (DESKTOP): UM POR CATEGORIA, FULL-WIDTH ABAIXO DA BARRA --}}
    @foreach ($navCategories as $navCategory){{-- PERCORRE AS CATEGORIAS PARA CRIAR OS PAINEIS --}}
        <div
            x-show="open === {{ $navCategory->id }}"
            x-cloak
            x-transition.opacity.duration.150ms
            @mouseenter="open = {{ $navCategory->id }}"
            class="absolute inset-x-0 top-full hidden lg:block border-t border-slate-100 bg-white shadow-xl"
        >
            <div class="mx-auto max-w-6xl px-5 sm:px-6 lg:px-8 py-6">{{-- CONTAINER DO PAINEL --}}
                <div class="grid gap-8 md:grid-cols-3">{{-- LAYOUT: APRESENTACAO + GUIAS --}}

                    <div class="md:col-span-1">{{-- COLUNA DE APRESENTACAO DA CATEGORIA --}}
                        <p class="text-xs font-semibold uppercase tracking-wide text-brand">{{ $navCategory->name }}</p>{{-- NOME DA CATEGORIA --}}
                        @if ($navCategory->description)
                            <p class="mt-2 text-sm text-slate-500 line-clamp-3">{{ $navCategory->description }}</p>{{-- DESCRICAO --}}
                        @endif
                        <a href="{{ route('category', $navCategory) }}" class="mt-3 inline-flex items-center gap-1 text-sm font-semibold text-brand hover:text-brand-light">
                            View all {{ $navCategory->name }} guides
                            {{-- ICONE SETA (BOOTSTRAP ICONS: ARROW-RIGHT) EM SVG INLINE --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                        </a>
                    </div>

                    <div class="md:col-span-2">{{-- COLUNA DOS ARTIGOS E PRODUTOS DA CATEGORIA --}}
                        @if ($navCategory->articles->isNotEmpty())
                            <div class="grid gap-x-6 gap-y-4 sm:grid-cols-2">{{-- GRID DE GUIAS --}}
                                @foreach ($navCategory->articles->take(4) as $navArticle){{-- ATE 4 ARTIGOS DA CATEGORIA --}}
                                    <div>
                                        <a href="{{ route('article', [$navCategory, $navArticle]) }}" class="block text-sm font-bold text-slate-900 hover:text-brand">{{ $navArticle->title }}</a>{{-- TITULO DO ARTIGO --}}
                                        <ul class="mt-1.5 space-y-1">{{-- TOP PRODUTOS DO ARTIGO --}}
                                            @foreach ($navArticle->products->take(3) as $navProduct){{-- ATE 3 PRODUTOS --}}
                                                <li>
                                                    <a href="{{ route('article', [$navCategory, $navArticle]) }}#product-{{ $navProduct->position }}" class="text-xs text-slate-500 hover:text-brand line-clamp-1">{{ $navProduct->position }}. {{ $navProduct->name }}</a>{{-- PRODUTO ANCORADO --}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-sm text-slate-500">Guides coming soon for this category.</p>{{-- MENSAGEM SE NAO HOUVER ARTIGOS --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- MENU MOBILE (ABAIXO DE lg): ACCORDION DE CATEGORIAS COM x-collapse --}}
    <div id="mobile-menu" x-show="mobileOpen" x-collapse x-cloak class="lg:hidden border-t border-slate-100 bg-white">
        <div class="mx-auto max-w-6xl px-5 sm:px-6 py-4 space-y-1">{{-- CONTAINER DO MENU MOBILE --}}
            <a href="{{ route('home') }}" class="block rounded-lg px-3 py-2.5 text-sm font-semibold {{ request()->routeIs('home') ? 'bg-brand text-white' : 'text-slate-800 hover:bg-slate-100' }}">Home</a>{{-- LINK DA HOME --}}

            @foreach ($navCategories as $navCategory){{-- PERCORRE AS CATEGORIAS --}}
                <div x-data="{ sub: false }" class="border-t border-slate-100 pt-1">{{-- CADA CATEGORIA E UM ITEM COM SUBMENU --}}
                    <div class="flex items-center justify-between">{{-- LINHA: LINK DA CATEGORIA + BOTAO EXPANDIR --}}
                        <a href="{{ route('category', $navCategory) }}" class="flex-1 rounded-lg px-3 py-2.5 text-sm font-semibold text-slate-800 hover:bg-slate-100">{{ $navCategory->name }}</a>{{-- LINK DIRETO PARA A CATEGORIA --}}
                        <button type="button" @click="sub = !sub" :aria-expanded="sub.toString()" class="p-2.5 text-slate-500 hover:text-brand" aria-label="Show {{ $navCategory->name }} guides">{{-- BOTAO QUE ABRE OS ARTIGOS --}}
                            {{-- ICONE CHEVRON BAIXO (BOOTSTRAP ICONS: CHEVRON-DOWN), GIRA QUANDO ABERTO --}}
                            <svg class="transition-transform" :class="sub ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/></svg>
                        </button>
                    </div>
                    <div x-show="sub" x-collapse x-cloak>{{-- SUBMENU COLAPSAVEL COM OS ARTIGOS --}}
                        <div class="pl-3 pb-2 space-y-1">
                            @forelse ($navCategory->articles->take(5) as $navArticle){{-- ATE 5 ARTIGOS DA CATEGORIA --}}
                                <a href="{{ route('article', [$navCategory, $navArticle]) }}" class="block rounded-md px-3 py-2 text-sm text-slate-600 hover:bg-slate-50 hover:text-brand">{{ $navArticle->title }}</a>{{-- LINK DO ARTIGO --}}
                            @empty
                                <p class="px-3 py-2 text-sm text-slate-400">Guides coming soon.</p>{{-- MENSAGEM SE VAZIO --}}
                            @endforelse
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</header>
