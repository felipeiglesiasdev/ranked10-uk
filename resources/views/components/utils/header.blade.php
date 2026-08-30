@props(['navCategories' => collect()]){{-- PROP: SO AS CATEGORIAS (SEM ARTIGOS, SEM PRODUTOS) --}}

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

{{-- ═══════════════════════════════════════════════════════════════════════════
     MEGA MENU ASSINCRONO
     ═══════════════════════════════════════════════════════════════════════════
     ANTES: OS SETE PAINEIS VINHAM PRONTOS NO HTML DE TODA PAGINA DO SITE. MEDIDO NA POLITICA
     DE PRIVACIDADE, O <header> OCUPAVA 91 KB DE 112 KB — **81% DA PAGINA**. E O VIEW COMPOSER
     CARREGAVA 76 ARTIGOS E 760 PRODUTOS DO BANCO EM CADA REQUISICAO PARA MONTA-LOS.

     AGORA: O SERVIDOR MANDA SO A BARRA (SETE LINKS). O CONTEUDO DOS PAINEIS VEM DE /nav/menu
     NUMA UNICA REQUISICAO DE ~12 KB, DISPARADA NA PRIMEIRA INTENCAO DE ABRIR O MENU, E E
     INJETADO NO DOM PELO resources/js/megamenu.js.

     A DIVISAO DE TRABALHO E PROPOSITAL:
       ALPINE (JA NO BUNDLE PRINCIPAL) .. ABRE E FECHA. RESPONDE NO PRIMEIRO FRAME, SEMPRE.
       CHUNK PREGUICOSO ................. BUSCA E DESENHA O CONTEUDO.
     SE O CHUNK AINDA NAO CHEGOU, O MENU ABRE COM ESQUELETO DE CARREGAMENTO EM VEZ DE NAO ABRIR.

     ⚠ OS LINKS DAS SETE CATEGORIAS CONTINUAM NO HTML, COMO <a> DE VERDADE. SO O CONTEUDO DOS
     PAINEIS SAIU. CADA ARTIGO SEGUE ALCANCAVEL PELA PAGINA DA CATEGORIA E PELO sitemap.xml.
     ═══════════════════════════════════════════════════════════════════════════ --}}
<header
    x-data="{
        aberto: null,
        mobileAberto: false,
        alterna(id) { this.aberto = this.aberto === id ? null : id; },
        abre(id) { this.aberto = id; },
        fecha() { this.aberto = null; },
    }"
    @keydown.escape.window="fecha(); mobileAberto = false"
    @mouseleave="fecha()"
    class="sticky top-0 z-50 bg-white border-b border-slate-200"
    role="banner"
    data-nav-root
>
    <nav class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8" aria-label="Primary navigation">{{-- CONTAINER COM O MESMO GUTTER DO BODY/FOOTER --}}
        <div class="flex h-16 items-center justify-between gap-3">{{-- BARRA SUPERIOR --}}

            {{-- BOTAO HAMBURGUER: SO NO MOBILE/TABLET (ABAIXO DE lg) --}}
            <button
                type="button"
                @click="mobileAberto = ! mobileAberto"
                :aria-expanded="mobileAberto.toString()"
                aria-controls="mobile-menu"
                class="lg:hidden -ml-2 p-2 text-slate-700 hover:text-brand"
                aria-label="Toggle navigation menu"
            >
                {{-- ICONE HAMBURGUER (BOOTSTRAP ICONS: LIST) - VISIVEL QUANDO FECHADO --}}
                <svg x-show="! mobileAberto" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/></svg>
                {{-- ICONE X (BOOTSTRAP ICONS: X-LG) - VISIVEL QUANDO ABERTO --}}
                <svg x-show="mobileAberto" x-cloak xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/></svg>
            </button>

            {{-- LOGO --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0" aria-label="ranked10 — homepage">
                {{-- ICONE DE TROFEU (BOOTSTRAP ICONS: TROPHY-FILL) EM SVG INLINE --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16" class="text-brand" aria-hidden="true"><path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5q0 .807-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33 33 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935m10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935"/></svg>
                <span class="text-xl font-extrabold tracking-tight text-slate-900">ranked<span class="text-brand">10</span></span>
            </a>

            {{-- NAVEGACAO DESKTOP (lg+) --}}
            <ul class="hidden lg:flex items-center gap-0.5" data-nav-bar>{{-- data-nav-bar E O GATILHO QUE FAZ O app.js BAIXAR O CHUNK DO MENU --}}
                <li>
                    <a href="{{ route('home') }}" @mouseenter="fecha()" class="block whitespace-nowrap rounded-full px-3 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'bg-brand text-white' : 'text-slate-600 hover:bg-slate-100' }}">Home</a>{{-- LINK DA HOME --}}
                </li>

                @foreach ($navCategories as $navCategory){{-- PERCORRE AS CATEGORIAS --}}
                    @php $ativa = request()->is($navCategory->slug.'*'); @endphp{{-- A CATEGORIA DA PAGINA ATUAL FICA DESTACADA --}}
                    <li
                        class="relative"
                        @mouseenter="abre({{ $navCategory->id }})"
                        data-nav-item="{{ $navCategory->id }}"
                    >{{-- HOVER ABRE O PAINEL DESTA CATEGORIA --}}
                        <div class="flex items-center rounded-full {{ $ativa ? 'bg-brand text-white' : 'text-slate-600 hover:bg-slate-100' }}">{{-- AGRUPA O LINK E O BOTAO NUMA PILULA SO --}}
                            {{-- ⚠ CONTINUA SENDO UM <a> DE VERDADE: E UM DOS SETE LINKS INTERNOS QUE
                                 TODA PAGINA DO SITE DA PARA AS CATEGORIAS. TROCAR POR <button> TERIA
                                 CUSTADO ESSES LINKS NO GRAFO INTERNO. --}}
                            <a href="{{ route('category', $navCategory) }}" class="whitespace-nowrap py-2 pl-3 pr-1 text-sm font-medium">{{ $navCategory->name }}</a>{{-- LINK DA CATEGORIA --}}
                            <button
                                type="button"
                                @click.prevent="alterna({{ $navCategory->id }})"
                                :aria-expanded="(aberto === {{ $navCategory->id }}).toString()"
                                aria-controls="mega-panel"
                                class="py-2 pl-0.5 pr-2.5"
                                aria-label="Show {{ $navCategory->name }} guides"
                            >{{-- BOTAO SEPARADO PARA ABRIR POR CLIQUE (TECLADO E TOQUE), SEM ROUBAR O CLIQUE DO LINK --}}
                                {{-- ICONE CHEVRON BAIXO (BOOTSTRAP ICONS: CHEVRON-DOWN), GIRA QUANDO ABERTO --}}
                                <svg class="transition-transform duration-200" :class="aberto === {{ $navCategory->id }} ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/></svg>
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>

            {{-- BUSCA DESKTOP (lg+) --}}
            <form action="{{ route('search') }}" method="GET" class="hidden lg:flex items-center w-56" role="search" @mouseenter="fecha()">{{-- FORMULARIO DE BUSCA --}}
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

    {{-- ─── PAINEL UNICO DO MEGA MENU (DESKTOP) ───
         UM SO PARA AS SETE CATEGORIAS. O JAVASCRIPT TROCA O CONTEUDO CONFORME O HOVER MUDA,
         O QUE EVITA MANTER SETE ARVORES DE DOM VIVAS AO MESMO TEMPO. --}}
    {{-- ⚠ AQUI NAO SE USA x-show NEM x-transition, E O MOTIVO IMPORTA.
         NUM MEGA MENU O PONTEIRO ATRAVESSA VARIAS CATEGORIAS EM MENOS DE UM SEGUNDO, E O
         @mouseleave DO HEADER FECHA O PAINEL ENTRE UMA E OUTRA. ISSO INTERROMPE A ANIMACAO DE
         SAIDA DO ALPINE NO MEIO, COM A DE ENTRADA JA COMECANDO — E O x-transition TRAVA,
         DEIXANDO O ELEMENTO EM display:none PARA SEMPRE. O CONTEUDO FICAVA RENDERIZADO E O
         PAINEL INVISIVEL, SEM ERRO NENHUM NO CONSOLE.

         A TROCA: O ALPINE SO ALTERNA CLASSES; QUEM ANIMA E O CSS.
           visibility + opacity .. TRANSICIONAM DE VERDADE, AO CONTRARIO DE display
           pointer-events-none ... IMPEDE CLIQUE NO PAINEL FECHADO
           hidden lg:block ....... SEGUE SENDO O UNICO DONO DO display, SO QUE NO ELEMENTO PAI
         COM display FORA DA JOGADA, NAO EXISTE ESTADO INTERMEDIARIO PARA TRAVAR.

         ⚠ AS CLASSES DE ESTADO VIVEM SO NO :class, NUNCA TAMBEM NO class="". TER opacity-0 FIXO
         NO class E opacity-100 VINDO DO :class DEIXA AS DUAS NO ELEMENTO AO MESMO TEMPO — MESMA
         ESPECIFICIDADE, E QUEM GANHA E A ORDEM DA FOLHA DE ESTILO, NAO A INTENCAO. O PAINEL ABRIA
         VISIVEL E TRANSPARENTE. O x-cloak COBRE O UNICO VAO QUE SOBRA, O INSTANTE ANTES DO ALPINE
         INICIAR — E ELE E REMOVIDO UMA VEZ SO, ENTAO NAO TRAZ DE VOLTA O RISCO DE TRAVAR. --}}
    <div class="hidden lg:block">{{-- CAMADA 1: RESTRICAO A DESKTOP, CONTROLADA SO PELO CSS --}}
        <div
            id="mega-panel"
            x-cloak
            :class="aberto !== null ? 'visible translate-y-0 opacity-100' : 'invisible -translate-y-1 opacity-0 pointer-events-none'"
            class="absolute inset-x-0 top-full border-t border-slate-100 bg-white shadow-xl transition duration-150 ease-out"
            data-nav-panel
        >{{-- CAMADA 2: ABERTURA E FECHAMENTO, VIA CLASSE (NUNCA VIA display) --}}
            <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8 py-7" data-nav-panel-body>{{-- ALVO DA INJECAO DO JAVASCRIPT --}}
                {{-- CONTEUDO INJETADO PELO resources/js/megamenu.js --}}
            </div>
        </div>
    </div>

    {{-- ─── MENU MOBILE (ABAIXO DE lg) ───
         MESMA LOGICA: A SANFONA ABRE NA HORA (ALPINE), O CONTEUDO CHEGA DEPOIS (CHUNK). --}}
    <div id="mobile-menu" x-show="mobileAberto" x-collapse x-cloak class="lg:hidden border-t border-slate-100 bg-white" data-nav-mobile-root>
        <div class="mx-auto max-w-7xl px-5 sm:px-6 py-4 space-y-1">{{-- CONTAINER DO MENU MOBILE --}}
            <a href="{{ route('home') }}" class="block rounded-lg px-3 py-2.5 text-sm font-semibold {{ request()->routeIs('home') ? 'bg-brand text-white' : 'text-slate-800 hover:bg-slate-100' }}">Home</a>{{-- LINK DA HOME --}}

            @foreach ($navCategories as $navCategory){{-- PERCORRE AS CATEGORIAS --}}
                <div x-data="{ sub: false }" class="border-t border-slate-100 pt-1">{{-- CADA CATEGORIA E UM ITEM COM SUBMENU --}}
                    <div class="flex items-center justify-between">{{-- LINHA: LINK DA CATEGORIA + BOTAO EXPANDIR --}}
                        <a href="{{ route('category', $navCategory) }}" class="flex-1 rounded-lg px-3 py-2.5 text-sm font-semibold text-slate-800 hover:bg-slate-100">{{ $navCategory->name }}</a>{{-- LINK DIRETO PARA A CATEGORIA --}}
                        <button type="button" @click="sub = ! sub" :aria-expanded="sub.toString()" class="p-2.5 text-slate-500 hover:text-brand" aria-label="Show {{ $navCategory->name }} guides" data-nav-mobile-toggle="{{ $navCategory->id }}">{{-- BOTAO QUE PEDE OS ARTIGOS AO JAVASCRIPT --}}
                            {{-- ICONE CHEVRON BAIXO (BOOTSTRAP ICONS: CHEVRON-DOWN), GIRA QUANDO ABERTO --}}
                            <svg class="transition-transform duration-200" :class="sub ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/></svg>
                        </button>
                    </div>
                    <div x-show="sub" x-collapse x-cloak>{{-- SUBMENU COLAPSAVEL --}}
                        <div class="pb-2 pl-3" data-nav-mobile-body="{{ $navCategory->id }}">{{-- ALVO DA INJECAO DO JAVASCRIPT --}}
                            {{-- CONTEUDO INJETADO PELO resources/js/megamenu.js --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</header>
