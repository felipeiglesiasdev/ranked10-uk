@extends('layouts.app'){{-- USA O LAYOUT MESTRE UNICO --}}

@php
    // MONTA O JSON-LD (ITEMLIST + PRODUCT + REVIEW) PARA RICH SNIPPETS NO GOOGLE
    $jsonLd = [
        '@context' => 'https://schema.org', // CONTEXTO PADRAO DO SCHEMA.ORG
        '@type' => 'ItemList', // O ARTIGO E UMA LISTA RANQUEADA DE PRODUTOS
        'name' => $article->title, // NOME DA LISTA = TITULO DO ARTIGO
        'description' => Str::limit($article->intro, 160), // DESCRICAO CURTA DA LISTA
        'itemListOrder' => 'https://schema.org/ItemListOrderAscending', // INDICA QUE A LISTA E ORDENADA
        'numberOfItems' => $article->products->count(), // QUANTIDADE DE PRODUTOS NA LISTA
        'itemListElement' => $article->products->map(function ($product) { // CONVERTE CADA PRODUTO EM UM LISTITEM
            $item = [
                '@type' => 'ListItem', // CADA ENTRADA DA LISTA E UM LISTITEM
                'position' => $product->position, // POSICAO DO PRODUTO NO RANKING
                'item' => array_filter([ // O ITEM EM SI E UM PRODUCT (ARRAY_FILTER REMOVE CAMPOS VAZIOS)
                    '@type' => 'Product', // TIPO PRODUTO DO SCHEMA.ORG
                    'name' => $product->name, // NOME DO PRODUTO
                    'image' => $product->image, // IMAGEM DO PRODUTO (REMOVIDA SE NULA)
                    'description' => Str::limit($product->summary, 160), // RESUMO CURTO DO PRODUTO
                    'offers' => [ // OFERTA COM O PRECO EM LIBRAS
                        '@type' => 'Offer', // TIPO OFERTA DO SCHEMA.ORG
                        'price' => preg_replace('/[^0-9.]/', '', $product->price), // EXTRAI SO OS NUMEROS DO PRECO
                        'priceCurrency' => 'GBP', // MOEDA LIBRA ESTERLINA
                        'url' => $product->affiliate_link, // LINK DA OFERTA
                    ],
                    'review' => [ // REVIEW EDITORIAL DO PRODUTO
                        '@type' => 'Review', // TIPO REVIEW DO SCHEMA.ORG
                        'reviewBody' => Str::limit($product->summary, 300), // CORPO DA REVIEW
                        'author' => ['@type' => 'Organization', 'name' => 'ranked10 Editorial Team'], // AUTOR DA REVIEW
                    ],
                    'aggregateRating' => $product->rating ? [ // NOTA AGREGADA SO SE EXISTIR RATING
                        '@type' => 'AggregateRating', // TIPO DE NOTA AGREGADA
                        'ratingValue' => (string) $product->rating, // NOTA MEDIA DO PRODUTO
                        'reviewCount' => max(1, $product->reviews_count), // QUANTIDADE DE AVALIACOES (MINIMO 1 EXIGIDO PELO SCHEMA)
                        'bestRating' => '5', // NOTA MAXIMA POSSIVEL
                    ] : null, // SEM RATING O CAMPO E REMOVIDO PELO ARRAY_FILTER
                ]),
            ];
            return $item; // RETORNA O LISTITEM MONTADO
        })->values()->all(), // GARANTE INDICES SEQUENCIAIS NO JSON FINAL
    ];
@endphp

@push('seo'){{-- INJETA AS META TAGS DE SEO NO HEAD DO LAYOUT --}}
    <title>{{ $article->title }} | ranked10</title>{{-- TITULO DINAMICO DO ARTIGO --}}
    <meta name="description" content="{{ Str::limit($article->intro, 155) }}">{{-- META DESCRIPTION COM A INTRO TRUNCADA --}}
    <link rel="canonical" href="{{ route('article', [$category, $article]) }}">{{-- URL CANONICA DO ARTIGO --}}
    <meta property="og:type" content="article">{{-- TIPO OPEN GRAPH DE ARTIGO --}}
    <meta property="og:title" content="{{ $article->title }}">{{-- TITULO OPEN GRAPH --}}
    <meta property="og:description" content="{{ Str::limit($article->intro, 155) }}">{{-- DESCRICAO OPEN GRAPH --}}
    <meta property="og:url" content="{{ route('article', [$category, $article]) }}">{{-- URL OPEN GRAPH --}}
    <meta property="og:site_name" content="ranked10">{{-- NOME DO SITE OPEN GRAPH --}}
    <meta property="article:published_time" content="{{ $article->published_at->toAtomString() }}">{{-- DATA DE PUBLICACAO OPEN GRAPH --}}
    <meta property="article:modified_time" content="{{ $article->updated_at->toAtomString() }}">{{-- DATA DE ATUALIZACAO OPEN GRAPH --}}
    <script type="application/ld+json">{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>{{-- DADOS ESTRUTURADOS JSON-LD --}}
@endpush

@section('content'){{-- INICIO DO CONTEUDO DO ARTIGO --}}

    <article class="max-w-4xl px-4 py-12">{{-- ARTIGO SEMANTICO ALINHADO A ESQUERDA --}}

        <x-utils.breadcrumbs :items="[
            ['label' => $category->name, 'url' => route('category', $category)],
            ['label' => $article->title],
        ]" />{{-- TRILHA: HOME (ICONE) > CATEGORIA > TITULO DO ARTIGO --}}

        <h1 class="mt-4 text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">{{ $article->title }}</h1>{{-- H1 COM O TITULO DO ARTIGO --}}

        <div class="mt-4">
            <x-article-meta :author="$article->author" :date="$article->updated_at" />{{-- COMPONENTE COM AUTOR E DATA DE ATUALIZACAO --}}
        </div>

        <p class="mt-6 text-lg leading-relaxed text-slate-600">{{ $article->intro }}</p>{{-- TEXTO DE INTRODUCAO --}}

        <div class="mt-10">
            <h2 class="text-xl font-bold text-slate-900">At a glance</h2>{{-- TITULO DA TABELA COMPARATIVA --}}
            <div class="mt-4">
                <x-comparison-table :products="$article->products" />{{-- COMPONENTE DA TABELA COMPARATIVA --}}
            </div>
        </div>

        <div class="mt-12 space-y-12">{{-- LISTA DE PRODUTOS: CADA ITEM = CARD + TEXTO SEO ABAIXO --}}
            @foreach ($article->products as $product){{-- PERCORRE OS PRODUTOS JA ORDENADOS POR POSICAO --}}
                <div class="space-y-5 {{ ! $loop->last ? 'border-b border-slate-200 pb-12' : '' }}">{{-- AGRUPA CARD + BODY COM SEPARADOR ENTRE PRODUTOS --}}
                    <x-product-card :product="$product" />{{-- 1. CARD COMPLETO (POSICAO, IMAGEM, NOME, PRECO, RATING, SUMMARY, PROS, CONTRAS, CTA) --}}

                    @if (filled($product->body)){{-- 2. SO RENDERIZA O TEXTO SEO SE O BODY NAO ESTIVER VAZIO --}}
                        <div class="prose prose-slate max-w-none px-1 text-slate-600 leading-relaxed [&>p]:mt-4">{{-- BLOCO DE TEXTO SEO LONGO FORA DO CARD --}}
                            @foreach (preg_split('/\n{2,}/', trim($product->body)) as $paragrafo){{-- QUEBRA O BODY EM PARAGRAFOS POR LINHAS EM BRANCO --}}
                                <p>{{ $paragrafo }}</p>{{-- PARAGRAFO DO TEXTO SEO --}}
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <section class="mt-12 rounded-2xl bg-slate-100 p-6 md:p-8">{{-- BLOCO DA CONCLUSAO --}}
            <h2 class="text-xl font-bold text-slate-900">Our verdict</h2>{{-- TITULO DA CONCLUSAO --}}
            <p class="mt-3 leading-relaxed text-slate-600">{{ $article->conclusion }}</p>{{-- TEXTO DA CONCLUSAO --}}
        </section>

        <x-utils.share-buttons :url="route('article', [$category, $article])" :title="$article->title" />{{-- BOTOES DE COMPARTILHAR (WHATSAPP, X, FACEBOOK, EMAIL, COPIAR) --}}

        <x-utils.author-bio :author="$author" />{{-- FOTO E BIO DO AUTOR DO ARTIGO --}}

        <x-utils.related-articles :articles="$related" />{{-- ARTIGOS RELACIONADOS PARA ANCORAGEM DE LINKS --}}

    </article>

@endsection{{-- FIM DO CONTEUDO DO ARTIGO --}}
