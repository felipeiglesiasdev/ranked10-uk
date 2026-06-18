@props(['items' => []]){{-- PROPS: ITEMS = ['label' => ..., 'url' => ...]; O ULTIMO ITEM E A PAGINA ATUAL (SEM LINK) --}}

@php
    // MONTA A TRILHA COMPLETA COM O HOME SEMPRE NA PRIMEIRA POSICAO
    $crumbs = array_merge([['label' => 'Home', 'url' => route('home')]], $items); // PREPENDE O HOME AOS ITENS RECEBIDOS
    $lastIndex = count($crumbs) - 1; // INDICE DO ULTIMO ITEM (PAGINA ATUAL)

    // MONTA O JSON-LD BREADCRUMBLIST PARA SEO
    $breadcrumbLd = [
        '@context' => 'https://schema.org', // CONTEXTO PADRAO DO SCHEMA.ORG
        '@type' => 'BreadcrumbList', // TIPO LISTA DE NAVEGACAO
        'itemListElement' => collect($crumbs)->map(fn ($crumb, $i) => array_filter([ // CONVERTE CADA CRUMB EM UM LISTITEM
            '@type' => 'ListItem', // CADA ENTRADA E UM LISTITEM
            'position' => $i + 1, // POSICAO COMECANDO EM 1
            'name' => $crumb['label'], // ROTULO DO ITEM
            'item' => $crumb['url'] ?? null, // URL DO ITEM (REMOVIDA NO ATUAL PELO ARRAY_FILTER)
        ]))->values()->all(), // GARANTE INDICES SEQUENCIAIS
    ];
@endphp

@push('seo'){{-- INJETA O JSON-LD DA TRILHA NO HEAD VIA STACK DE SEO --}}
    <script type="application/ld+json">{!! json_encode($breadcrumbLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>{{-- DADOS ESTRUTURADOS BREADCRUMBLIST --}}
@endpush

<nav class="flex items-center flex-wrap gap-1.5 text-sm text-slate-500" aria-label="Breadcrumb">{{-- TRILHA DE NAVEGACAO VISUAL --}}
    @foreach ($crumbs as $i => $crumb){{-- PERCORRE CADA ITEM DA TRILHA --}}
        @if ($i > 0){{-- ANTES DE CADA ITEM (MENOS O PRIMEIRO) DESENHA O SEPARADOR --}}
            {{-- ICONE CHEVRON DIREITA (BOOTSTRAP ICONS: CHEVRON-RIGHT) EM SVG INLINE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" class="text-slate-300 shrink-0" aria-hidden="true"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/></svg>
        @endif

        @if ($i === $lastIndex){{-- O ULTIMO ITEM E A PAGINA ATUAL, ENTAO NAO E UM LINK --}}
            <span class="font-medium text-slate-900" aria-current="page">{{ $crumb['label'] }}</span>{{-- PAGINA ATUAL SEM LINK --}}
        @elseif ($i === 0){{-- O PRIMEIRO ITEM (HOME) E REPRESENTADO PELO ICONE DE CASA --}}
            <a href="{{ $crumb['url'] }}" class="inline-flex items-center hover:text-slate-900" aria-label="Home">
                {{-- ICONE DE CASA (BOOTSTRAP ICONS: HOUSE-DOOR) EM SVG INLINE --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M7.97 1.06a.75.75 0 0 1 1.06 0l6 6V13.5A1.5 1.5 0 0 1 13.53 15h-2.53a.5.5 0 0 1-.5-.5V11a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v3.5a.5.5 0 0 1-.5.5H3.5A1.5 1.5 0 0 1 2 13.5V7.06zM8 2.12 3 7.12V13.5a.5.5 0 0 0 .5.5H5v-3a1.5 1.5 0 0 1 1.5-1.5h3A1.5 1.5 0 0 1 11 11v3h1.53a.5.5 0 0 0 .5-.5V7.06z"/></svg>
            </a>{{-- HOME COMO ICONE DE CASA LINKANDO PARA A ROTA HOME --}}
        @else{{-- ITENS INTERMEDIARIOS SAO LINKS DE TEXTO --}}
            <a href="{{ $crumb['url'] }}" class="hover:text-slate-900">{{ $crumb['label'] }}</a>{{-- ITEM INTERMEDIARIO COM LINK --}}
        @endif
    @endforeach
</nav>
