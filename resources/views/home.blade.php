@extends('layouts.app'){{-- USA O LAYOUT MESTRE UNICO --}}

@push('seo'){{-- INJETA AS META TAGS DE SEO NO HEAD DO LAYOUT --}}
    <title>ranked10 — The UK's Best Top 10 Buying Guides</title>{{-- TITULO DA HOME --}}
    <meta name="description" content="Independent top 10 rankings and buying guides for UK shoppers. We research the best products on Amazon so you don't have to.">{{-- META DESCRIPTION DA HOME --}}
    <link rel="canonical" href="{{ route('home') }}">{{-- URL CANONICA DA HOME --}}
    <meta property="og:type" content="website">{{-- TIPO OPEN GRAPH --}}
    <meta property="og:title" content="ranked10 — The UK's Best Top 10 Buying Guides">{{-- TITULO OPEN GRAPH --}}
    <meta property="og:description" content="Independent top 10 rankings and buying guides for UK shoppers.">{{-- DESCRICAO OPEN GRAPH --}}
    <meta property="og:url" content="{{ route('home') }}">{{-- URL OPEN GRAPH --}}
    <meta property="og:site_name" content="ranked10">{{-- NOME DO SITE OPEN GRAPH --}}
@endpush

@section('content'){{-- INICIO DO CONTEUDO DA HOME --}}

    <section class="bg-ink text-white">{{-- HERO ESCURO DE ABERTURA (PRETO DA MARCA) --}}
        <div class="max-w-6xl mx-auto px-4 py-16 md:py-24 text-center">
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight">Find the best products in the UK,<br class="hidden md:block"> <span class="text-brand-light">ranked for you.</span></h1>{{-- TITULO PRINCIPAL DO HERO --}}
            <p class="mt-4 max-w-2xl mx-auto text-slate-300 md:text-lg">Honest top 10 lists with pros, cons and real review data — so you can buy with confidence.</p>{{-- SUBTITULO DO HERO --}}
            <div class="mt-8 flex flex-wrap justify-center gap-3">{{-- BOTOES PARA AS CATEGORIAS --}}
                @foreach ($categories as $category){{-- PERCORRE AS CATEGORIAS PARA CRIAR OS ATALHOS --}}
                    <a href="{{ route('category', $category) }}" class="rounded-full border border-white/15 bg-white/5 px-5 py-2 text-sm font-medium hover:border-brand hover:text-brand-light">{{ $category->name }}</a>{{-- ATALHO DA CATEGORIA --}}
                @endforeach
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 py-12">{{-- SECAO DE ARTIGOS EM DESTAQUE --}}
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-slate-900">Latest buying guides</h2>{{-- TITULO DA SECAO --}}
        </div>

        <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">{{-- GRID RESPONSIVO DE CARDS --}}
            @forelse ($featured as $article){{-- PERCORRE OS ARTIGOS EM DESTAQUE --}}
                <a href="{{ route('article', [$article->category, $article]) }}" class="group flex flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:shadow-md hover:border-brand/40">{{-- CARD CLICAVEL DO ARTIGO --}}
                    <span class="inline-flex w-fit items-center rounded-full bg-brand/10 px-3 py-1 text-xs font-semibold text-brand">{{ $article->category->name }}</span>{{-- BADGE DA CATEGORIA --}}
                    <h3 class="mt-3 text-lg font-bold text-slate-900 group-hover:text-brand">{{ $article->title }}</h3>{{-- TITULO DO ARTIGO --}}
                    <p class="mt-2 text-sm text-slate-500 line-clamp-3">{{ $article->intro }}</p>{{-- INTRO TRUNCADA EM 3 LINHAS --}}
                    <span class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-brand">
                        Read the ranking
                        {{-- ICONE DE SETA (BOOTSTRAP ICONS: ARROW-RIGHT) EM SVG INLINE --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                    </span>{{-- CHAMADA PARA LER O ARTIGO --}}
                </a>
            @empty{{-- CASO NAO EXISTAM ARTIGOS PUBLICADOS --}}
                <p class="text-slate-500">No guides published yet. Check back soon!</p>{{-- MENSAGEM DE LISTA VAZIA --}}
            @endforelse
        </div>
    </section>

@endsection{{-- FIM DO CONTEUDO DA HOME --}}
