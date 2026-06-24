@props(['navCategories' => collect()]){{-- PROP: CATEGORIAS DO MENU (PASSADA PELO LAYOUT) --}}
{{-- HEADER DESKTOP: VISIVEL APENAS EM TELAS MEDIAS/GRANDES (hidden md:block) --}}
<header class="hidden md:block bg-white border-b border-slate-200 sticky top-0 z-50">{{-- CABECALHO DESKTOP FIXO NO TOPO --}}
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex items-center justify-between gap-4 h-16">{{-- LINHA SUPERIOR COM LOGO E BUSCA --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0" aria-label="ranked10 home">{{-- LOGO COM LINK PARA A HOME --}}
                {{-- ICONE DE TROFEU (BOOTSTRAP ICONS: TROPHY-FILL) EM SVG INLINE --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16" class="text-brand" aria-hidden="true"><path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5q0 .807-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33 33 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935m10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935"/></svg>
                <span class="text-xl font-extrabold tracking-tight text-slate-900">ranked<span class="text-brand">10</span></span>{{-- NOME DO SITE --}}
            </a>

            <form action="{{ route('search') }}" method="GET" class="flex items-center flex-1 max-w-xs" role="search">{{-- FORMULARIO DE BUSCA DO DESKTOP --}}
                <label for="desktop-search" class="sr-only">Search articles</label>{{-- LABEL ACESSIVEL PARA LEITORES DE TELA --}}
                <div class="relative w-full">
                    {{-- ICONE DE LUPA (BOOTSTRAP ICONS: SEARCH) EM SVG INLINE --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" aria-hidden="true"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>
                    <input id="desktop-search" type="search" name="q" value="{{ request('q') }}" placeholder="Search top 10 lists..." class="w-full rounded-full border border-slate-200 bg-slate-50 py-2 pl-9 pr-4 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/30">{{-- CAMPO DE BUSCA DO HEADER --}}
                </div>
            </form>
        </div>

        <nav class="flex items-center gap-1 -mx-1 pb-2 overflow-x-auto" aria-label="Main navigation">{{-- NAVEGACAO HORIZONTAL DE CATEGORIAS --}}
            <a href="{{ route('home') }}" class="whitespace-nowrap rounded-full px-3 py-1.5 text-sm font-medium {{ request()->routeIs('home') ? 'bg-brand text-white' : 'text-slate-600 hover:bg-slate-100' }}">Home</a>{{-- LINK DA HOME COM ESTADO ATIVO --}}
            @foreach ($navCategories as $navCategory){{-- PERCORRE AS CATEGORIAS COMPARTILHADAS PELO VIEW COMPOSER --}}
                <a href="{{ route('category', $navCategory) }}" class="whitespace-nowrap rounded-full px-3 py-1.5 text-sm font-medium {{ request()->is($navCategory->slug.'*') ? 'bg-brand text-white' : 'text-slate-600 hover:bg-slate-100' }}">{{ $navCategory->name }}</a>{{-- LINK DA CATEGORIA COM ESTADO ATIVO --}}
            @endforeach
        </nav>
    </div>
</header>
