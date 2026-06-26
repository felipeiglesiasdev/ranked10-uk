@extends('layouts.app'){{-- USA O LAYOUT MESTRE UNICO --}}

@push('seo'){{-- INJETA AS META TAGS DE SEO NO HEAD DO LAYOUT --}}
    <title>{{ $category->name }} — Top 10 Buying Guides | ranked10</title>{{-- TITULO DA CATEGORIA --}}
    <meta name="description" content="{{ $category->description ?? 'The best '.$category->name.' top 10 rankings and buying guides for UK shoppers.' }}">{{-- META DESCRIPTION DA CATEGORIA --}}
    <link rel="canonical" href="{{ route('category', $category) }}">{{-- URL CANONICA DA CATEGORIA --}}
    <meta property="og:type" content="website">{{-- TIPO OPEN GRAPH --}}
    <meta property="og:title" content="{{ $category->name }} — Top 10 Buying Guides | ranked10">{{-- TITULO OPEN GRAPH --}}
    <meta property="og:description" content="{{ $category->description ?? 'The best '.$category->name.' rankings for UK shoppers.' }}">{{-- DESCRICAO OPEN GRAPH --}}
    <meta property="og:url" content="{{ route('category', $category) }}">{{-- URL OPEN GRAPH --}}
    <meta property="og:site_name" content="ranked10">{{-- NOME DO SITE OPEN GRAPH --}}
@endpush

@section('content'){{-- INICIO DO CONTEUDO DA CATEGORIA --}}

    <section class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-12">{{-- SECAO PRINCIPAL DA CATEGORIA --}}
        <x-utils.breadcrumbs :items="[['label' => $category->name]]" />{{-- TRILHA: HOME (ICONE) > CATEGORIA ATUAL --}}

        <h1 class="mt-4 text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">{{ $category->name }}</h1>{{-- TITULO DA CATEGORIA --}}
        @if ($category->description){{-- SO MOSTRA A DESCRICAO SE EXISTIR --}}
            <p class="mt-3 max-w-2xl text-slate-600">{{ $category->description }}</p>{{-- DESCRICAO DA CATEGORIA --}}
        @endif

        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">{{-- GRID RESPONSIVO DE ARTIGOS --}}
            @forelse ($articles as $article){{-- PERCORRE OS ARTIGOS PUBLICADOS DA CATEGORIA --}}
                <a href="{{ route('article', [$category, $article]) }}" class="group flex flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:shadow-md hover:border-brand/40">{{-- CARD CLICAVEL DO ARTIGO --}}
                    <h2 class="text-lg font-bold text-slate-900 group-hover:text-brand">{{ $article->title }}</h2>{{-- TITULO DO ARTIGO --}}
                    <p class="mt-2 text-sm text-slate-500 line-clamp-3">{{ $article->intro }}</p>{{-- INTRO TRUNCADA EM 3 LINHAS --}}
                    <span class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-brand">
                        Read the ranking
                        {{-- ICONE DE SETA (BOOTSTRAP ICONS: ARROW-RIGHT) EM SVG INLINE --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                    </span>{{-- CHAMADA PARA LER O ARTIGO --}}
                </a>
            @empty{{-- CASO A CATEGORIA NAO TENHA ARTIGOS PUBLICADOS --}}
                <p class="text-slate-500">No guides in this category yet. Check back soon!</p>{{-- MENSAGEM DE LISTA VAZIA --}}
            @endforelse
        </div>
    </section>

@endsection{{-- FIM DO CONTEUDO DA CATEGORIA --}}
