@props([
    'categories',                          // COLECAO DE CATEGORIAS (COM articles_count SE VIER DO withCount)
    'title' => 'Browse by category',       // TITULO DA SECAO
    'currentSlug' => null,                 // SLUG DA CATEGORIA ATUAL (EXCLUIDA DA GRADE QUANDO INFORMADO)
])

@php
    $lista = $currentSlug // QUANDO USADO DENTRO DE UMA CATEGORIA, REMOVE ELA MESMA DA GRADE
        ? $categories->where('slug', '!=', $currentSlug)
        : $categories;
@endphp

@if ($lista->isNotEmpty()){{-- SO RENDERIZA SE SOBRAR ALGUMA CATEGORIA --}}
    {{-- GRADE DE CATEGORIAS: DISTRIBUI AUTORIDADE DA HOME/CATEGORIA PARA TODAS AS OUTRAS CATEGORIAS,
         FECHANDO O GRAFO DE LINKS INTERNOS EM VEZ DE DEIXAR CADA CATEGORIA ISOLADA. --}}
    <section class="mt-4" aria-labelledby="grade-categorias-titulo">{{-- SECAO DA GRADE DE CATEGORIAS --}}
        <h2 id="grade-categorias-titulo" class="text-2xl font-bold text-slate-900">{{ $title }}</h2>{{-- TITULO DA SECAO --}}

        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">{{-- GRID RESPONSIVO: 1 -> 2 -> 3 COLUNAS --}}
            @foreach ($lista as $categoria){{-- PERCORRE AS CATEGORIAS --}}
                {{-- min-w-0 PELO MESMO MOTIVO DO BLOCO DE PRODUTOS: ITEM DE GRID NAO ENCOLHE ABAIXO DO min-content SEM ISSO --}}
                <a href="{{ route('category', $categoria) }}" class="group flex min-w-0 items-start justify-between gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-brand/40 hover:shadow-md">{{-- CARD CLICAVEL DA CATEGORIA --}}
                    <div class="min-w-0">{{-- COLUNA DE TEXTO --}}
                        <h3 class="font-bold text-slate-900 group-hover:text-brand">{{ $categoria->name }}</h3>{{-- NOME DA CATEGORIA --}}
                        @if ($categoria->description){{-- DESCRICAO QUANDO EXISTIR --}}
                            <p class="mt-1 text-sm text-slate-500 line-clamp-2">{{ $categoria->description }}</p>{{-- DESCRICAO TRUNCADA EM 2 LINHAS --}}
                        @endif
                        @isset($categoria->articles_count){{-- CONTADOR SO APARECE SE A CONSULTA USOU withCount --}}
                            <p class="mt-2 text-xs font-semibold uppercase tracking-wide text-slate-500">{{ $categoria->articles_count }} {{ Str::plural('guide', $categoria->articles_count) }}</p>{{-- QUANTIDADE DE GUIAS NA CATEGORIA --}}
                        @endisset
                    </div>
                    {{-- ICONE DE SETA (BOOTSTRAP ICONS: ARROW-RIGHT) EM SVG INLINE --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="mt-1 shrink-0 text-slate-300 transition group-hover:translate-x-0.5 group-hover:text-brand" aria-hidden="true"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                </a>
            @endforeach
        </div>
    </section>
@endif
