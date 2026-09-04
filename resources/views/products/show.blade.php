@extends('layouts.app'){{-- USA O LAYOUT MESTRE UNICO --}}

@php
    // ═══════════════════════════════════════════════════════════════════════
    // PAGINA PROPRIA DE PRODUTO
    //
    // ⚠ ESTA PAGINA NAO LEVA ASSINATURA DE AUTOR, DE PROPOSITO. ELA NAO E UMA ANALISE
    //   EDITORIAL: E UMA FICHA MONTADA A PARTIR DO QUE A AMAZON PUBLICA NO ANUNCIO.
    //   O JULGAMENTO DO ranked10 VIVE NO RANKING, QUE E ASSINADO E FICA LINKADO AQUI.
    //   POR ISSO O JSON-LD ABAIXO NAO DECLARA "review" COM AUTOR NOSSO.
    // ═══════════════════════════════════════════════════════════════════════

    $productUrl = url()->current(); // URL CANONICA DESTA PAGINA
    $precoNumerico = preg_replace('/[^0-9.]/', '', $product->price); // EXTRAI SO OS NUMEROS DO PRECO PARA O SCHEMA

    // SEO COM O NOME DO PRODUTO EM TUDO, COMO PEDIDO. O CAMPO DO BANCO MANDA; O FALLBACK
    // GARANTE QUE A PAGINA NUNCA FIQUE SEM TITLE MESMO SE O SEEDER ESQUECER O CAMPO.
    $metaTitle = $product->meta_title ?: $product->name.': Full Review'; // TITULO DA ABA/GOOGLE
    $metaDescription = $product->meta_description ?: Str::limit(strip_tags($product->page_intro ?: $product->summary), 155); // META DESCRIPTION

    $jsonLd = [ // JSON-LD DA PAGINA: PRODUCT + BREADCRUMB + FAQ QUANDO HOUVER
        '@context' => 'https://schema.org',
        '@graph' => array_values(array_filter([
            array_filter([ // O PRODUTO EM SI
                '@type' => 'Product',
                '@id' => $productUrl.'#product',
                'name' => $product->name,
                'image' => $product->image,
                'description' => Str::limit(strip_tags($product->page_intro ?: $product->summary), 300),
                'offers' => [
                    '@type' => 'Offer',
                    'price' => $precoNumerico,
                    'priceCurrency' => 'GBP',
                    'url' => $product->affiliate_link,
                    'availability' => 'https://schema.org/InStock',
                ],
                'aggregateRating' => $product->rating ? [ // NOTA AGREGADA VEM DA AMAZON, NAO DE UMA NOTA NOSSA
                    '@type' => 'AggregateRating',
                    'ratingValue' => (string) $product->rating,
                    'reviewCount' => max(1, $product->reviews_count),
                    'bestRating' => '5',
                ] : null,
            ]),
            [ // A TRILHA ATE AQUI: CATEGORIA > RANKING > PRODUTO
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => $category->name, 'item' => route('category', $category)],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => $article->title, 'item' => route('article', [$category, $article])],
                    ['@type' => 'ListItem', 'position' => 3, 'name' => $product->name, 'item' => $productUrl],
                ],
            ],
            filled($product->faq) ? [ // FAQPage: O UNICO RICH RESULT DESTA LISTA QUE O SITE AINDA NAO TINHA
                '@type' => 'FAQPage',
                'mainEntity' => collect($product->faq)->map(fn ($f) => [
                    '@type' => 'Question',
                    'name' => $f['q'] ?? '',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a'] ?? ''],
                ])->all(),
            ] : null,
        ])),
    ];

    $totalEstrelas = collect($product->rating_breakdown ?: [])->sum(); // SOMA DAS PORCENTAGENS, PARA SABER SE A DISTRIBUICAO E UTILIZAVEL
@endphp

@push('seo'){{-- INJETA AS META TAGS DE SEO NO HEAD DO LAYOUT --}}
    <title>{{ $metaTitle }} | ranked10</title>{{-- TITULO COM O NOME DO PRODUTO --}}
    <meta name="description" content="{{ $metaDescription }}">{{-- META DESCRIPTION COM O NOME DO PRODUTO --}}
    <link rel="canonical" href="{{ $productUrl }}">{{-- URL CANONICA DESTA PAGINA --}}
    <meta property="og:type" content="product">{{-- TIPO OPEN GRAPH DE PRODUTO --}}
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $productUrl }}">
    <meta property="og:site_name" content="ranked10">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    @if ($product->image)
        <meta property="og:image" content="{{ $product->image }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:image" content="{{ $product->image }}">
    @endif
    <script type="application/ld+json">{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>{{-- SCHEMA DA PAGINA --}}
@endpush

@section('content'){{-- INICIO DO CONTEUDO DA PAGINA DE PRODUTO --}}

<div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8 py-12">{{-- MESMO GUTTER DO HEADER/FOOTER --}}
  <div class="lg:grid lg:grid-cols-[minmax(0,1fr)_19rem] lg:gap-10">{{-- MESMA GRADE DO ARTIGO: LEITURA + COLUNA DE 19rem --}}
    <div class="max-w-4xl min-w-0">{{-- COLUNA DE LEITURA; min-w-0 IMPEDE QUE A TABELA LARGA ESTIQUE A GRADE --}}

      <x-utils.breadcrumbs :items="[
          ['label' => $category->name, 'url' => route('category', $category)],
          ['label' => $article->title, 'url' => route('article', [$category, $article])],
          ['label' => $product->name, 'url' => null],
      ]" />{{-- TRILHA: CATEGORIA > RANKING > PRODUTO --}}

      {{-- ─── CABECALHO: FOTO, PRECO, NOTA E O BOTAO DA AMAZON ─── --}}
      <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex flex-col gap-6 sm:flex-row">
          {{-- ⚠ w-full E OBRIGATORIO AQUI. SEM ELE, O shrink-0 SOMADO A UMA IMAGEM DE 1500px
               DA AMAZON FAZIA O CONTEINER CRESCER ATE A LARGURA INTRINSECA DA FOTO E EMPURRAR A
               COLUNA DO PRECO PARA FORA DA TELA — 2058px DE SCROLL NUM VIEWPORT DE 1910. --}}
          <div class="w-full sm:w-56 sm:shrink-0">
            @if ($product->image)
              <img src="{{ $product->image }}" alt="{{ $product->alt_text ?: $product->name }}" class="mx-auto h-56 w-full max-w-full object-contain" width="224" height="224" loading="eager">{{-- FOTO DO PRODUTO --}}
            @endif
          </div>

          <div class="min-w-0 flex-1">
            <p class="text-xs font-bold uppercase tracking-wide text-brand">Rank #{{ $product->position }} in {{ $article->title }}</p>{{-- DE QUAL RANKING ELE VEIO --}}
            <h1 class="mt-1 text-2xl font-extrabold leading-tight text-slate-900 sm:text-3xl">{{ $product->name }}</h1>{{-- H1 = NOME DO PRODUTO --}}

            <div class="mt-3 flex flex-wrap items-center gap-x-4 gap-y-2">
              <span class="text-2xl font-extrabold text-slate-900">{{ $product->price }}</span>{{-- PRECO --}}
              @if ($product->rating)
                <span class="inline-flex items-center gap-1.5 text-sm text-slate-600">
                  <span class="inline-flex" aria-hidden="true">
                    @for ($i = 1; $i <= 5; $i++)
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 16 16" fill="currentColor" class="{{ $i <= round($product->rating) ? 'text-amber-400' : 'text-slate-300' }}"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                    @endfor
                  </span>
                  <span class="font-semibold text-slate-900">{{ number_format($product->rating, 1) }}</span>
                  <span>from {{ number_format($product->reviews_count) }} Amazon ratings</span>{{-- QUANTIDADE DE AVALIACOES --}}
                </span>
              @endif
            </div>

            <a href="{{ $product->affiliate_link }}" rel="sponsored nofollow" target="_blank" class="mt-5 inline-flex items-center gap-2 rounded-full bg-brand px-6 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-brand-light">{{-- BOTAO PARA CONFERIR NA AMAZON --}}
              Check price on Amazon
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/><path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/></svg>
            </a>
            <p class="mt-2 text-xs text-slate-500">Price and rating as shown on Amazon when we collected them. Both change.</p>{{-- PRECO MUDA: NAO PROMETEMOS O VALOR --}}
          </div>
        </div>
      </div>

      {{-- ─── 1 A 2 PARAGRAFOS SOBRE O PRODUTO ─── --}}
      @if (filled($product->page_intro))
        <div class="prose prose-slate mt-8 max-w-none">
          @foreach (preg_split('/\n\s*\n/', trim($product->page_intro)) as $paragrafo)
            <p>{{ $paragrafo }}</p>{{-- CURTO DE PROPOSITO: O TEXTO LONGO VIVE NO RANKING --}}
          @endforeach
        </div>
      @endif

      {{-- ─── DISTRIBUICAO DAS AVALIACOES ─── --}}
      @if ($totalEstrelas > 0)
        <section class="mt-10">
          <h2 class="text-xl font-extrabold text-slate-900">How those {{ number_format($product->reviews_count) }} ratings break down</h2>
          <p class="mt-1 text-sm text-slate-600">An average hides its own shape. This is the spread behind the {{ number_format($product->rating, 1) }} stars.</p>
          <div class="mt-4 space-y-2 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            @foreach ([5, 4, 3, 2, 1] as $estrela)
              @php $pct = (int) ($product->rating_breakdown[(string) $estrela] ?? $product->rating_breakdown[$estrela] ?? 0); @endphp
              <div class="flex items-center gap-3">
                <span class="w-12 shrink-0 text-sm font-semibold text-slate-700">{{ $estrela }} star</span>
                <div class="h-3 flex-1 overflow-hidden rounded-full bg-slate-100">
                  <div class="h-full rounded-full bg-amber-400" style="width: {{ max(0, min(100, $pct)) }}%"></div>{{-- BARRA PROPORCIONAL --}}
                </div>
                <span class="w-10 shrink-0 text-right text-sm tabular-nums text-slate-600">{{ $pct }}%</span>
              </div>
            @endforeach
          </div>
        </section>
      @endif

      {{-- ─── FICHA TECNICA DA AMAZON (TABELA) ─── --}}
      @if (filled($product->tech_specs))
        <section class="mt-10">
          <h2 class="text-xl font-extrabold text-slate-900">Specification</h2>
          <p class="mt-1 text-sm text-slate-600">Exactly as published on the Amazon listing, field for field.</p>
          <div class="mt-4 overflow-x-auto rounded-2xl border border-slate-200 bg-white shadow-sm">{{-- overflow-x-auto: TABELA LARGA NAO PODE ESTOURAR A TELA NO MOBILE --}}
            <table class="w-full min-w-[28rem] text-left text-sm">
              <tbody class="divide-y divide-slate-100">
                @foreach ($product->tech_specs as $linha)
                  <tr class="odd:bg-slate-50/60">
                    <th scope="row" class="w-2/5 px-4 py-2.5 font-semibold text-slate-700">{{ $linha['label'] ?? '' }}</th>
                    <td class="px-4 py-2.5 text-slate-600">{{ $linha['value'] ?? '' }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </section>
      @endif

      {{-- ─── DUAS AVALIACOES CURTAS DE CLIENTES ─── --}}
      <x-product-reviews :quotes="$product->review_quotes" :product-name="$product->name" />{{-- TRECHOS CURTOS DE AVALIACOES REAIS (SO RENDERIZA SE PREENCHIDOS) --}}

      {{-- ─── ALTERNATIVAS: OS ADVERSARIOS DO MESMO RANKING ─── --}}
      @if ($alternativas->isNotEmpty())
        <section class="mt-10">
          <h2 class="text-xl font-extrabold text-slate-900">What it is up against</h2>
          <p class="mt-1 text-sm text-slate-600">The rivals it was ranked against in <a href="{{ route('article', [$category, $article]) }}" class="font-semibold text-brand hover:underline">{{ $article->title }}</a>.</p>
          <div class="mt-4 grid gap-3 sm:grid-cols-2">
            @foreach ($alternativas as $rival)
              <a href="{{ $rival->page_url ?: $rival->url }}" class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-3 transition hover:border-brand hover:shadow-sm">{{-- LEVA PARA A PAGINA DELE SE EXISTIR, SENAO PARA O CARD NO RANKING --}}
                @if ($rival->image)
                  <img src="{{ $rival->image }}" alt="{{ $rival->alt_text ?: $rival->name }}" class="h-14 w-14 shrink-0 object-contain" width="56" height="56" loading="lazy">
                @endif
                <span class="min-w-0">
                  <span class="block text-xs font-bold uppercase tracking-wide text-slate-400">Rank #{{ $rival->position }}</span>
                  <span class="block text-sm font-semibold leading-snug text-slate-900 line-clamp-2">{{ $rival->name }}</span>{{-- line-clamp-1/2 EM VEZ DE truncate: NAO ESTOURA A GRADE NO MOBILE --}}
                  <span class="mt-0.5 block text-sm text-slate-500">{{ $rival->price }}</span>
                </span>
              </a>
            @endforeach
          </div>
        </section>
      @endif

      {{-- ─── FAQ ─── --}}
      @if (filled($product->faq))
        <section class="mt-10">
          <h2 class="text-xl font-extrabold text-slate-900">Questions people ask</h2>
          <div class="mt-4 divide-y divide-slate-100 rounded-2xl border border-slate-200 bg-white shadow-sm">
            @foreach ($product->faq as $item)
              <details class="group p-5">{{-- details/summary: ABRE SEM JAVASCRIPT E O TEXTO FICA NO HTML PARA O GOOGLE --}}
                <summary class="flex cursor-pointer items-center justify-between gap-4 text-sm font-bold text-slate-900 marker:content-none">
                  {{ $item['q'] ?? '' }}
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="shrink-0 text-slate-400 transition group-open:rotate-180" aria-hidden="true"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/></svg>
                </summary>
                <p class="mt-3 text-sm leading-relaxed text-slate-600">{{ $item['a'] ?? '' }}</p>
              </details>
            @endforeach
          </div>
        </section>
      @endif

      {{-- ─── DE ONDE VEIO ESTA INFORMACAO ─── --}}
      <aside class="mt-10 rounded-2xl border border-slate-200 bg-slate-50 p-5 text-sm text-slate-600">
        <p class="font-semibold text-slate-900">Where this page comes from</p>
        <p class="mt-1.5">
          Every figure on this page — the price, the star rating, the number of ratings, how they break down, the specification table and the customer quotes — was taken from this product's Amazon listing{{ $product->harvested_at ? ' on '.$product->harvested_at->format('j F Y') : '' }}. We did not test the product ourselves, and this page carries no author for that reason. Our own judgement, and the reasoning that put it at number {{ $product->position }}, is in <a href="{{ route('article', [$category, $article]) }}" class="font-semibold text-brand hover:underline">{{ $article->title }}</a>.
        </p>
        <p class="mt-1.5">Listings change without notice, so check the figures on Amazon before you buy. As an Amazon Associate we earn from qualifying purchases.</p>
      </aside>

      <div class="mt-10">
        <x-utils.whatsapp-cta />{{-- CHAMADA DO GRUPO DE OFERTAS --}}
      </div>

      {{-- ─── COMENTARIOS: MESMO SISTEMA DO RANKING ─── --}}
      <x-comments.section :article="$article" :category="$category" :product="$product" :comments="$comentarios" :turnstile-site-key="$turnstileSiteKey" />

    </div>

    {{-- ═══════════ COLUNA DA DIREITA ═══════════ --}}
    <aside class="mt-12 lg:mt-0">
      <div class="lg:sticky lg:top-24 space-y-6">

        {{-- A QUAL RANKING ELE PERTENCE --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
          <p class="text-xs font-bold uppercase tracking-wide text-slate-400">Ranked in</p>
          <a href="{{ route('article', [$category, $article]) }}" class="mt-2 block text-sm font-bold leading-snug text-slate-900 hover:text-brand">{{ $article->title }}</a>
          <p class="mt-1.5 text-sm text-slate-500">This product sits at number {{ $product->position }} of {{ $article->products->count() ?: 10 }}.</p>
          <a href="{{ route('article', [$category, $article]) }}#product-{{ $product->position }}" class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-brand hover:underline">
            See why it ranks there
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/></svg>
          </a>
        </div>

        {{-- PRODUTOS SEMELHANTES --}}
        @if ($semelhantes->isNotEmpty())
          <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-bold uppercase tracking-wide text-slate-400">Similar products</p>
            <ul class="mt-3 space-y-3">
              @foreach ($semelhantes as $similar)
                <li>
                  <a href="{{ $similar->page_url ?: $similar->url }}" class="flex items-start gap-3 hover:text-brand">
                    @if ($similar->image)
                      <img src="{{ $similar->image }}" alt="{{ $similar->alt_text ?: $similar->name }}" class="h-10 w-10 shrink-0 object-contain" width="40" height="40" loading="lazy">
                    @endif
                    <span class="min-w-0">
                      <span class="block text-sm font-semibold leading-snug text-slate-900 line-clamp-2">{{ $similar->name }}</span>
                      <span class="block text-xs text-slate-500">{{ $similar->price }}</span>
                    </span>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- OUTRAS CATEGORIAS --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
          <p class="text-xs font-bold uppercase tracking-wide text-slate-400">Browse categories</p>
          <ul class="mt-3 space-y-1.5">
            @foreach ($categorias as $cat)
              <li>
                <a href="{{ route('category', $cat) }}" class="flex items-center justify-between gap-2 text-sm {{ $cat->id === $category->id ? 'font-bold text-brand' : 'text-slate-600 hover:text-brand' }}">
                  <span class="min-w-0 line-clamp-1">{{ $cat->name }}</span>
                  <span class="shrink-0 text-xs text-slate-400">{{ $cat->articles_count }}</span>
                </a>
              </li>
            @endforeach
          </ul>
        </div>

        {{-- OUTROS ARTIGOS --}}
        @if ($sidebarArticles->isNotEmpty())
          <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-bold uppercase tracking-wide text-slate-400">More guides</p>
            <ul class="mt-3 space-y-3">
              @foreach ($sidebarArticles as $guia)
                <li>
                  <a href="{{ route('article', [$guia->category, $guia]) }}" class="block text-sm font-semibold leading-snug text-slate-700 hover:text-brand line-clamp-2">{{ $guia->title }}</a>
                </li>
              @endforeach
            </ul>
          </div>
        @endif

        <x-utils.whatsapp-cta />{{-- CHAMADA DO WHATSAPP TAMBEM NA COLUNA --}}

      </div>
    </aside>

  </div>
</div>

@endsection
