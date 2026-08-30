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

@php
    // RESOLVE OS CAMPOS DE SEO COM FALLBACK: USA OS CAMPOS meta_* SE PREENCHIDOS, SENAO DERIVA DO TITULO/INTRO
    $metaTitle = $article->meta_title ?: $article->title; // META TITLE (FALLBACK = TITULO DO ARTIGO)
    $metaDescription = $article->meta_description ?: Str::limit($article->intro, 155); // META DESCRIPTION (FALLBACK = INTRO TRUNCADA)
    $articleUrl = route('article', [$category, $article]); // URL CANONICA DO ARTIGO (REUTILIZADA NAS TAGS)
    $heroImage = $article->hero_image; // HERO FEITO A MAO (OPCIONAL) — SOBREPOE A FOTO AUTOMATICA SE PREENCHIDO
    $socialImage = $heroImage ?: optional($article->products->first())->image; // IMAGEM SOCIAL/GOOGLE: HERO OU, SENAO, A FOTO DO PRODUTO #1 (AUTOMATICO, VEM DA API)
    $heroAlt = $article->focus_keyword ?: $article->title; // ALT DA IMAGEM = PALAVRA-CHAVE PRINCIPAL (FALLBACK = TITULO)
    if ($socialImage) { $jsonLd['image'] = $socialImage; } // ADICIONA A IMAGEM AO SCHEMA ITEMLIST (HERO OU PRODUTO #1)
@endphp

@php
    // MONTA O JSON-LD DE BLOGPOSTING (AUTORIA, PUBLISHER E DATAS) — COMPLEMENTA O ITEMLIST ACIMA
    $autorPerfil = App\Support\Autores::porNome($article->author); // PERFIL DO AUTOR EM config/authors.php (NULL SE NAO CADASTRADO)

    // ENTIDADE PERSON DO AUTOR.
    // O @id E O url APONTAM PARA /author/<slug> USANDO O MESMO IDENTIFICADOR DECLARADO NAQUELA
    // PAGINA. E ISSO QUE FAZ O GOOGLE ENTENDER QUE O AUTOR DOS 76 ARTIGOS, O FUNDADOR CITADO EM
    // /about E A PESSOA DESCRITA EM /author/felipe-iglesias SAO A MESMA ENTIDADE — E NAO TRES
    // MENCOES SOLTAS DO MESMO NOME. O sameAs FECHA A CONTA LIGANDO-A A UM PERFIL EXTERNO REAL.
    $autorLd = array_filter([ // ARRAY_FILTER REMOVE OS CAMPOS VAZIOS
        '@type' => 'Person', // O AUTOR E UMA PESSOA, NAO A ORGANIZACAO
        '@id' => isset($autorPerfil['slug']) ? route('author', $autorPerfil['slug']).'#person' : null, // IDENTIFICADOR COMPARTILHADO COM A PAGINA DO AUTOR
        'name' => $article->author, // NOME EXIBIDO DO AUTOR
        'url' => isset($autorPerfil['slug']) ? route('author', $autorPerfil['slug']) : null, // PAGINA CANONICA DO AUTOR NO PROPRIO SITE
        'jobTitle' => $autorPerfil['role'] ?? null, // CARGO/FUNCAO (SE CADASTRADO)
        'description' => $autorPerfil['bio'] ?? null, // BIO DO AUTOR (SE CADASTRADA)
        'image' => App\Support\Autores::foto($autorPerfil), // FOTO DO AUTOR (ACEITA CDN OU ARQUIVO LOCAL)
        'sameAs' => array_values(array_filter($autorPerfil['socials'] ?? [])) ?: null, // PERFIS EXTERNOS QUE COMPROVAM A IDENTIDADE
        'knowsAbout' => $autorPerfil['knows_about'] ?? null, // AREAS DE CONHECIMENTO DO AUTOR
    ]);
    $blogPostingLd = array_filter([
        '@context' => 'https://schema.org', // CONTEXTO PADRAO DO SCHEMA.ORG
        '@type' => 'BlogPosting', // O ARTIGO E UM POST EDITORIAL
        '@id' => $articleUrl.'#article', // ID UNICO DA ENTIDADE ARTIGO
        'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => $articleUrl], // PAGINA PRINCIPAL QUE CONTEM O ARTIGO
        'headline' => Str::limit($article->title, 110, ''), // HEADLINE (O GOOGLE CORTA ACIMA DE 110 CHARS)
        'description' => $metaDescription, // DESCRICAO = META DESCRIPTION JA RESOLVIDA ACIMA
        'image' => $socialImage ?: null, // IMAGEM DO ARTIGO (HERO OU FOTO DO PRODUTO #1)
        'inLanguage' => 'en-GB', // IDIOMA DO CONTEUDO (MESMO VALOR DO WEBSITE NO LAYOUT)
        'datePublished' => $article->published_at->toAtomString(), // DATA DE PUBLICACAO
        'dateModified' => $article->updated_at->toAtomString(), // DATA DA ULTIMA ATUALIZACAO
        'author' => $autorLd, // AUTOR DO ARTIGO
        'publisher' => ['@id' => url('/#organization')], // PUBLISHER APONTA PARA A ORGANIZATION DECLARADA NO LAYOUT
        'isPartOf' => ['@id' => url('/#website')], // LIGA O ARTIGO AO WEBSITE DECLARADO NO LAYOUT
        'articleSection' => $category->name, // SECAO/CATEGORIA DO ARTIGO
    ]);
@endphp

@php
    // ACRESCENTA OS COMENTARIOS AO SCHEMA DO BLOGPOSTING.
    // POR QUE ISSO IMPORTA: commentCount E comment SAO SINAIS DE PAGINA VIVA E DE DISCUSSAO REAL.
    // O TEXTO VAI TRUNCADO EM 500 CARACTERES — O SCHEMA E UM RESUMO PARA O BUSCADOR, NAO UMA
    // SEGUNDA COPIA DO CONTEUDO (DUPLICAR A PAGINA INTEIRA DENTRO DO JSON-LD NAO AJUDA NADA).
    $comentariosPlanos = $comentarios->flatMap(fn ($c) => collect([$c])->concat($c->replies)); // JUNTA RAIZES E RESPOSTAS NUMA LISTA UNICA

    if ($comentariosPlanos->isNotEmpty()) { // SO ADICIONA O BLOCO SE HOUVER COMENTARIO PUBLICADO
        $blogPostingLd['commentCount'] = $comentariosPlanos->count(); // QUANTIDADE TOTAL DE COMENTARIOS APROVADOS
        $blogPostingLd['comment'] = $comentariosPlanos->take(20)->map(fn ($c) => [ // ATE 20 COMENTARIOS NO SCHEMA
            '@type' => 'Comment', // TIPO COMMENT DO SCHEMA.ORG
            'author' => ['@type' => 'Person', 'name' => $c->author_name], // AUTOR DO COMENTARIO
            'datePublished' => $c->created_at->toAtomString(), // QUANDO FOI PUBLICADO
            'text' => Str::limit($c->body, 500), // TEXTO TRUNCADO
        ])->values()->all(); // INDICES SEQUENCIAIS NO JSON FINAL
    }
@endphp

@push('seo'){{-- INJETA AS META TAGS DE SEO NO HEAD DO LAYOUT --}}
    <title>{{ $metaTitle }} | ranked10</title>{{-- TITULO DA ABA/GOOGLE (meta_title COM FALLBACK PARA O TITULO) --}}
    <meta name="description" content="{{ $metaDescription }}">{{-- META DESCRIPTION (meta_description COM FALLBACK PARA A INTRO) --}}
    <link rel="canonical" href="{{ $articleUrl }}">{{-- URL CANONICA DO ARTIGO --}}
    <meta property="og:type" content="article">{{-- TIPO OPEN GRAPH DE ARTIGO --}}
    <meta property="og:title" content="{{ $metaTitle }}">{{-- TITULO OPEN GRAPH (MESMO VALOR DO TITLE) --}}
    <meta property="og:description" content="{{ $metaDescription }}">{{-- DESCRICAO OPEN GRAPH (MESMO VALOR DA META DESCRIPTION) --}}
    <meta property="og:url" content="{{ $articleUrl }}">{{-- URL OPEN GRAPH --}}
    <meta property="og:site_name" content="ranked10">{{-- NOME DO SITE OPEN GRAPH --}}
    <meta name="twitter:title" content="{{ $metaTitle }}">{{-- TITULO DO TWITTER/X CARD (MESMO VALOR DO TITLE) --}}
    <meta name="twitter:description" content="{{ $metaDescription }}">{{-- DESCRICAO DO TWITTER/X CARD (MESMO VALOR DA META DESCRIPTION) --}}
    @if ($socialImage){{-- IMAGEM SOCIAL/GOOGLE = HERO MANUAL OU, SE NAO HOUVER, A FOTO DO PRODUTO #1 --}}
        <meta property="og:image" content="{{ $socialImage }}">{{-- IMAGEM DO CARD OPEN GRAPH --}}
        <meta property="og:image:alt" content="{{ $heroAlt }}">{{-- ALT DA IMAGEM SOCIAL = PALAVRA-CHAVE PRINCIPAL --}}
        <meta name="twitter:image" content="{{ $socialImage }}">{{-- IMAGEM DO CARD DO TWITTER/X --}}
    @endif{{-- (SEM og:image:width/height PORQUE A FOTO DO PRODUTO TEM DIMENSOES VARIAVEIS) --}}
    <meta property="article:published_time" content="{{ $article->published_at->toAtomString() }}">{{-- DATA DE PUBLICACAO OPEN GRAPH --}}
    <meta property="article:modified_time" content="{{ $article->updated_at->toAtomString() }}">{{-- DATA DE ATUALIZACAO OPEN GRAPH --}}
    <script type="application/ld+json">{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>{{-- DADOS ESTRUTURADOS JSON-LD (ITEMLIST + PRODUCT + REVIEW) --}}
    <script type="application/ld+json">{!! json_encode($blogPostingLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>{{-- DADOS ESTRUTURADOS JSON-LD (BLOGPOSTING: AUTOR, PUBLISHER E DATAS) --}}
@endpush

@section('content'){{-- INICIO DO CONTEUDO DO ARTIGO --}}

    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8 py-12">{{-- CONTAINER DO ARTIGO (DIV) COM O MESMO GUTTER LATERAL DO HEADER/FOOTER --}}
        <div class="max-w-4xl min-w-0">{{-- COLUNA DE LEITURA ALINHADA A ESQUERDA; min-w-0 IMPEDE QUE UM FILHO LARGO A ESTIQUE --}}

        <x-utils.breadcrumbs :items="[
            ['label' => $category->name, 'url' => route('category', $category)],
            ['label' => $article->title],
        ]" />{{-- TRILHA: HOME (ICONE) > CATEGORIA > TITULO DO ARTIGO --}}

        <h1 class="mt-4 text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">{{ $article->title }}</h1>{{-- H1 COM O TITULO DO ARTIGO --}}

        <div class="mt-4">
            <x-article-meta :author="$article->author" :date="$article->updated_at" />{{-- COMPONENTE COM AUTOR E DATA DE ATUALIZACAO --}}
        </div>

        @if ($heroImage){{-- IMAGEM PRINCIPAL (HERO) DO ARTIGO — ALT = PALAVRA-CHAVE PRINCIPAL --}}
            <img src="{{ $heroImage }}" alt="{{ $heroAlt }}" width="1200" height="630" fetchpriority="high" class="mt-6 aspect-[1200/630] w-full rounded-2xl border border-slate-200 object-cover bg-slate-100">{{-- HERO 1200x630 WEBP; fetchpriority=high POIS E O ELEMENTO LCP; width/height RESERVAM O ESPACO (EVITA CLS) --}}
        @endif

        <p class="mt-6 text-lg leading-relaxed text-slate-600">{{ $article->intro }}</p>{{-- TEXTO DE INTRODUCAO --}}

        <x-utils.toc :products="$article->products" :has-verdict="filled($article->conclusion)" :has-method="filled($article->how_we_rank)" />{{-- INDICE COM ANCORAS PARA CADA PRODUTO (LINKS INTERNOS + SITELINKS DE SALTO NO GOOGLE) --}}

        <x-utils.how-we-rank :data="$article->how_we_rank" />{{-- METODOLOGIA DESTE ARTIGO: VEM ANTES DA LISTA PORQUE ENSINA O LEITOR A LER O RANKING (SO RENDERIZA SE PREENCHIDA) --}}

        <div id="at-a-glance" class="mt-10 scroll-mt-24">{{-- ANCORA DA TABELA COMPARATIVA (scroll-mt COMPENSA O HEADER STICKY) --}}
            <h2 class="text-xl font-bold text-slate-900">At a glance</h2>{{-- TITULO DA TABELA COMPARATIVA --}}
            <div class="mt-4 min-w-0 overflow-hidden">{{-- CONTEM A TABELA: NADA AQUI DENTRO PODE VAZAR PARA A PAGINA --}}
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

        <div id="final-verdict" class="mt-12 scroll-mt-24 rounded-2xl bg-slate-100 p-6 md:p-8">{{-- BLOCO DA CONCLUSAO (DIV) COM ANCORA PARA O INDICE --}}
            <h2 class="text-xl font-bold text-slate-900">Final Verdict</h2>{{-- H2 DA SECAO DE CONCLUSAO --}}
            <p class="mt-3 leading-relaxed text-slate-600">{{ $article->conclusion }}</p>{{-- TEXTO DA CONCLUSAO --}}
        </div>

        <x-utils.share-buttons :url="route('article', [$category, $article])" :title="$article->title" />{{-- BOTOES DE COMPARTILHAR (WHATSAPP, X, FACEBOOK, EMAIL, COPIAR) --}}

        <x-utils.author-bio :author="$author" />{{-- FOTO E BIO DO AUTOR DO ARTIGO --}}

        @if (config('comments.enabled', true)){{-- SECAO DE COMENTARIOS (UGC SEM LOGIN) --}}
            {{-- FICA DEPOIS DA BIO E ANTES DOS RELACIONADOS DE PROPOSITO: A CONVERSA PERTENCE AO
                 ARTIGO, E OS BLOCOS DE LINKS INTERNOS SAO A SAIDA DA PAGINA. --}}
            <x-comments.section :article="$article" :category="$category" :comments="$comentarios" :turnstile-site-key="$turnstileSiteKey" />{{-- LISTA INDEXAVEL + FORMULARIO COM JS PREGUICOSO --}}
        @endif

        <x-utils.related-articles :articles="$related" :category="$category" />{{-- ARTIGOS RELACIONADOS + LINK PARA A CATEGORIA (ANCORAGEM DE LINKS) --}}

        @if ($topProducts->isNotEmpty()){{-- MELHOR AVALIADOS DE OUTROS GUIAS: LEVA O LEITOR PARA DENTRO DE OUTROS ARTIGOS --}}
            <div class="mt-14 border-t border-slate-200 pt-10">{{-- SEPARADOR ANTES DO BLOCO --}}
                <x-utils.top-products
                    :products="$topProducts"
                    title="Highest rated in our other guides"
                    subtitle="Weighted by how many people rated each product, not just the score." />{{-- LINKS INTERNOS PROFUNDOS PARA PRODUTOS DE OUTROS ARTIGOS --}}
            </div>
        @endif

        </div>{{-- FIM DA COLUNA DE LEITURA --}}
    </div>{{-- FIM DO CONTAINER DO ARTIGO --}}

@endsection{{-- FIM DO CONTEUDO DO ARTIGO --}}
