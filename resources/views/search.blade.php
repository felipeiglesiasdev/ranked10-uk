@extends('layouts.app'){{-- USA O LAYOUT MESTRE UNICO --}}

@push('seo'){{-- INJETA AS META TAGS DE SEO NO HEAD DO LAYOUT --}}
    <title>{{ $query !== '' ? 'Search: '.$query : 'Search' }} | ranked10</title>{{-- TITULO DINAMICO COM O TERMO BUSCADO --}}
    <meta name="description" content="Search the best top 10 buying guides for UK shoppers on ranked10.">{{-- META DESCRIPTION DA BUSCA --}}
    <meta name="robots" content="noindex, follow">{{-- EVITA INDEXACAO DE PAGINAS DE BUSCA --}}
@endpush

@section('content'){{-- INICIO DO CONTEUDO DA BUSCA --}}

    <section class="max-w-3xl mx-auto px-4 py-12">{{-- SECAO PRINCIPAL DA BUSCA --}}
        <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">Search</h1>{{-- TITULO DA PAGINA --}}

        <form action="{{ route('search') }}" method="GET" class="mt-6" role="search">{{-- FORMULARIO DE BUSCA --}}
            <label for="search-q" class="sr-only">Search articles</label>{{-- LABEL ACESSIVEL PARA LEITORES DE TELA --}}
            <div class="relative">
                {{-- ICONE DE LUPA (BOOTSTRAP ICONS: SEARCH) EM SVG INLINE --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" aria-hidden="true"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>
                <input id="search-q" type="search" name="q" value="{{ $query }}" placeholder="Try &quot;air fryer&quot; or &quot;dog bed&quot;..." class="w-full rounded-full border border-slate-200 bg-white py-3 pl-11 pr-28 shadow-sm focus:border-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-200" autofocus>{{-- CAMPO DO TERMO DE BUSCA --}}
                <button type="submit" class="absolute right-1.5 top-1/2 -translate-y-1/2 rounded-full bg-slate-900 px-5 py-2 text-sm font-semibold text-white hover:bg-slate-700">Search</button>{{-- BOTAO DE ENVIO --}}
            </div>
        </form>

        @if ($query !== ''){{-- SO MOSTRA RESULTADOS SE HOUVE BUSCA --}}
            <p class="mt-8 text-sm text-slate-500">{{ $articles->count() }} {{ Str::plural('result', $articles->count()) }} for "<span class="font-semibold text-slate-900">{{ $query }}</span>"</p>{{-- CONTADOR DE RESULTADOS --}}

            <div class="mt-4 space-y-4">{{-- LISTA VERTICAL DE RESULTADOS --}}
                @forelse ($articles as $article){{-- PERCORRE OS RESULTADOS DA BUSCA --}}
                    <a href="{{ route('article', [$article->category, $article]) }}" class="group block rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md hover:border-amber-300">{{-- CARD DO RESULTADO --}}
                        <span class="inline-flex items-center rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">{{ $article->category->name }}</span>{{-- BADGE DA CATEGORIA --}}
                        <h2 class="mt-2 text-lg font-bold text-slate-900 group-hover:text-amber-600">{{ $article->title }}</h2>{{-- TITULO DO ARTIGO --}}
                        <p class="mt-1 text-sm text-slate-500 line-clamp-2">{{ $article->intro }}</p>{{-- INTRO TRUNCADA EM 2 LINHAS --}}
                    </a>
                @empty{{-- CASO NENHUM ARTIGO CORRESPONDA AO TERMO --}}
                    <p class="rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-center text-slate-500">No results found. Try a different keyword.</p>{{-- MENSAGEM DE BUSCA SEM RESULTADOS --}}
                @endforelse
            </div>
        @endif
    </section>

@endsection{{-- FIM DO CONTEUDO DA BUSCA --}}
