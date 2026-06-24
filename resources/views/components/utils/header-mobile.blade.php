@props(['navCategories' => collect()]){{-- PROP: CATEGORIAS DO MENU (PASSADA PELO LAYOUT) --}}
{{-- HEADER MOBILE: VISIVEL APENAS EM TELAS PEQUENAS (block md:hidden) --}}
<header class="block md:hidden bg-white border-b border-slate-200 sticky top-0 z-50">{{-- CABECALHO MOBILE FIXO NO TOPO --}}
    {{-- CHECKBOX OCULTO QUE CONTROLA O MENU COLAPSAVEL SEM JS (CHECKBOX HACK) --}}
    <input type="checkbox" id="mobile-nav-toggle" class="peer hidden" aria-hidden="true">

    <div class="flex items-center justify-between gap-3 px-4 h-16">{{-- BARRA SUPERIOR COM HAMBURGUER, LOGO E BUSCA --}}
        {{-- LABEL DO HAMBURGUER: ALTERNA O CHECKBOX AO SER CLICADO --}}
        <label for="mobile-nav-toggle" class="p-2 -ml-2 text-slate-600 cursor-pointer" aria-label="Toggle navigation menu" role="button">
            {{-- ICONE HAMBURGUER (BOOTSTRAP ICONS: LIST) EM SVG INLINE, SOME QUANDO O MENU ABRE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 16 16" class="peer-checked:hidden block" aria-hidden="true"><path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/></svg>
            {{-- ICONE X (BOOTSTRAP ICONS: X-LG) EM SVG INLINE, APARECE QUANDO O MENU ESTA ABERTO --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16" class="peer-checked:block hidden" aria-hidden="true"><path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/></svg>
        </label>

        <a href="{{ route('home') }}" class="flex items-center gap-2" aria-label="ranked10 home">{{-- LOGO CENTRAL COM LINK PARA A HOME --}}
            {{-- ICONE DE TROFEU (BOOTSTRAP ICONS: TROPHY-FILL) EM SVG INLINE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" class="text-brand" aria-hidden="true"><path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5q0 .807-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33 33 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935m10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935"/></svg>
            <span class="text-lg font-extrabold tracking-tight text-slate-900">ranked<span class="text-brand">10</span></span>{{-- NOME DO SITE --}}
        </a>

        <a href="{{ route('search') }}" class="p-2 -mr-2 text-slate-500 hover:text-slate-900" aria-label="Search">{{-- ATALHO DA BUSCA NO MOBILE --}}
            {{-- ICONE DE LUPA (BOOTSTRAP ICONS: SEARCH) EM SVG INLINE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>
        </a>
    </div>

    {{-- NAVEGACAO COLAPSAVEL: FECHADA POR PADRAO, ABRE QUANDO O CHECKBOX ESTA MARCADO (peer-checked) --}}
    <nav class="hidden peer-checked:block border-t border-slate-100 bg-white px-4 py-3" aria-label="Mobile navigation">
        <a href="{{ route('home') }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium {{ request()->routeIs('home') ? 'bg-brand text-white' : 'text-slate-700 hover:bg-slate-100' }}">Home</a>{{-- LINK DA HOME COM ESTADO ATIVO --}}
        @foreach ($navCategories as $navCategory){{-- PERCORRE AS CATEGORIAS COMPARTILHADAS PELO VIEW COMPOSER --}}
            <a href="{{ route('category', $navCategory) }}" class="block rounded-lg px-3 py-2.5 text-sm font-medium {{ request()->is($navCategory->slug.'*') ? 'bg-brand text-white' : 'text-slate-700 hover:bg-slate-100' }}">{{ $navCategory->name }}</a>{{-- LINK DA CATEGORIA COM ESTADO ATIVO --}}
        @endforeach
    </nav>
</header>
