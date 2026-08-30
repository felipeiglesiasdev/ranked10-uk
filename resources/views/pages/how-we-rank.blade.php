@extends('layouts.app'){{-- USA O LAYOUT MESTRE UNICO --}}

@php
    use App\Support\Autores; // ACESSO CENTRALIZADO AOS PERFIS DE AUTOR

    $urlPagina = route('how-we-rank'); // URL CANONICA DESTA PAGINA
    $metaTitle = 'How we rank: our testing and research method'; // TITULO DA ABA/GOOGLE
    $metaDescription = 'The documented process behind every ranked10 guide: how products are collected, how manufacturer claims are checked with arithmetic, and what gets a product excluded.'; // META DESCRIPTION

    // AS ETAPAS DO METODO. FICAM NUM ARRAY PORQUE ALIMENTAM DUAS COISAS AO MESMO TEMPO:
    // O TEXTO DA PAGINA E O SCHEMA HowTo. ESCREVER AS DUAS COISAS SEPARADAS GARANTIA QUE UMA
    // DELAS FICARIA DESATUALIZADA.
    $etapas = [
        [
            'titulo' => 'We only cover categories where the decision is made on specifications',
            'texto' => 'Some purchases are decided by numbers — storage capacity, suction in kilopascals, watt-hours, litres. Others are decided by how something feels to use. We deliberately avoid the second kind, because a written guide cannot honestly settle them. Before a category is approved we also check review depth on the product pages themselves: if fewer than three or four listings carry several hundred customer ratings, the category is rejected and never published.',
        ],
        [
            'titulo' => 'Products are collected from the UK storefront, at a UK address',
            'texto' => 'Every product is gathered from amazon.co.uk with the delivery address set to a real British postcode, so the prices, availability and delivery options match what a UK reader actually sees. A minimum price filter removes the accessories and spare parts that otherwise flood a search. Around twenty listings are examined for each guide, and ten make the final list.',
        ],
        [
            'titulo' => 'Each listing is read twice, from two different places',
            'texto' => 'We pull the manufacturer specification table and the "About this item" bullets separately, because the contradictions almost always sit between the two — and increasingly between the title and the bullets, or between a bullet heading and the body of that same bullet. Reading only one source hides exactly the thing that is worth reporting.',
        ],
        [
            'titulo' => 'Every claim gets checked with arithmetic',
            'texto' => 'A 21-volt 4.0Ah battery holds 84 watt-hours; if the listing also states eighty minutes of run time, the real sustained draw is about 63 watts, not the 1000 watts on the title. Lux falls with the square of distance, so 10,000 lux at 12cm is 576 lux at 50cm. A UK 13-amp plug caps at roughly 3,000 watts regardless of what the box says. None of this needs the product in hand — it needs the seller\'s own published numbers and a calculator.',
        ],
        [
            'titulo' => 'Ranking weighs evidence, not just the score',
            'texto' => 'A 5.0 average from four ratings tells you almost nothing; a 4.4 from fifty thousand tells you a great deal. Ratings are weighted by sample size, then adjusted for what the specification check found. A product that publishes honest, complete and internally consistent numbers moves up. A product whose own listing contradicts itself moves down, even when it is cheaper and better rated.',
        ],
        [
            'titulo' => 'Findings are published, including the awkward ones',
            'texto' => 'Where a listing contradicts itself we say so in the guide, naming the brand, the field and the figure. That includes products we rank highly and products we earn commission on. A guide that only ever flatters is not research, it is a catalogue.',
        ],
    ];

    // O QUE SEMPRE SINALIZAMOS. LISTA CURTA E CONCRETA — MAIS UTIL QUE UMA PROMESSA GENERICA
    // DE "ANALISE INDEPENDENTE", QUE QUALQUER SITE ESCREVE E NINGUEM CONSEGUE CONFERIR.
    $sinalizamos = [
        'A product with only a handful of customer ratings, however good the average looks',
        'An average below 4.0 backed by a large sample',
        'The title, the bullets and the specification table disagreeing with each other',
        'The same product sold under two listings at different prices with the same pool of reviews',
        'A specification field filled with the wrong unit — watts in a "horsepower" box, RPM in a "chain speed" box',
        'Imperial units, foreign plug types or non-UK holidays in a British listing',
        'A figure that is really the sum of parts you cannot use at the same time',
        'A comparison made against the brand\'s own older model, with no outside baseline',
    ];
@endphp

@push('seo'){{-- INJETA AS META TAGS DE SEO NO HEAD DO LAYOUT --}}
    <title>{{ $metaTitle }} | ranked10</title>{{-- TITULO DA ABA/GOOGLE --}}
    <meta name="description" content="{{ $metaDescription }}">{{-- META DESCRIPTION --}}
    <link rel="canonical" href="{{ $urlPagina }}">{{-- URL CANONICA --}}
    <meta property="og:type" content="article">{{-- TIPO OPEN GRAPH --}}
    <meta property="og:title" content="{{ $metaTitle }}">{{-- TITULO OPEN GRAPH --}}
    <meta property="og:description" content="{{ $metaDescription }}">{{-- DESCRICAO OPEN GRAPH --}}
    <meta property="og:url" content="{{ $urlPagina }}">{{-- URL OPEN GRAPH --}}
    <meta property="og:site_name" content="ranked10">{{-- NOME DO SITE --}}
    <meta name="twitter:title" content="{{ $metaTitle }}">{{-- TITULO DO CARD DO X --}}
    <meta name="twitter:description" content="{{ $metaDescription }}">{{-- DESCRICAO DO CARD DO X --}}

    {{-- SCHEMA HowTo: DESCREVE UM PROCESSO EM ETAPAS. E O TIPO CERTO PARA UMA PAGINA DE
         METODOLOGIA E DA AO GOOGLE UMA DESCRICAO ESTRUTURADA DE COMO O CONTEUDO E PRODUZIDO —
         exatamente o que as diretrizes de qualidade pedem de um site de recomendacao. --}}
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org', // CONTEXTO PADRAO
        '@type' => 'HowTo', // PROCESSO EM ETAPAS
        '@id' => $urlPagina.'#method', // ID DA ENTIDADE (REFERENCIAVEL PELOS ARTIGOS)
        'name' => 'How ranked10 ranks products', // NOME DO PROCESSO
        'description' => $metaDescription, // RESUMO DO PROCESSO
        'inLanguage' => 'en-GB', // IDIOMA
        'publisher' => ['@id' => url('/#organization')], // PUBLISHER DECLARADO NO LAYOUT
        'step' => collect($etapas)->values()->map(fn ($e, $i) => [ // CADA ETAPA VIRA UM HowToStep
            '@type' => 'HowToStep', // TIPO DA ETAPA
            'position' => $i + 1, // POSICAO NA SEQUENCIA
            'name' => $e['titulo'], // TITULO DA ETAPA
            'text' => $e['texto'], // DESCRICAO DA ETAPA
        ])->all(), // LISTA DE ETAPAS
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>{{-- DADOS ESTRUTURADOS DA METODOLOGIA --}}
@endpush

@section('content'){{-- INICIO DO CONTEUDO --}}

    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8 py-12">{{-- CONTAINER COM O MESMO GUTTER DO HEADER/FOOTER --}}
        <div class="max-w-4xl min-w-0">{{-- COLUNA DE LEITURA; min-w-0 IMPEDE QUE UM FILHO LARGO A ESTIQUE --}}

            <x-utils.breadcrumbs :items="[['label' => 'How we rank']]" />{{-- TRILHA: HOME > HOW WE RANK --}}

            <h1 class="mt-4 text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">How we rank</h1>{{-- H1 DA PAGINA --}}

            <p class="mt-4 text-lg leading-relaxed text-slate-600">{{-- PARAGRAFO DE ABERTURA COM OS NUMEROS REAIS DO SITE --}}
                Every guide on ranked10 is built the same way. Across {{ number_format($stats['artigos']) }} guides we have examined {{ number_format($stats['produtos']) }} products and read through {{ number_format($stats['avaliacoes']) }} customer ratings. This page explains exactly what happens between a search result and a published ranking — so you can judge the method, not just the outcome.
            </p>

            {{-- ─── O QUE ESTE SITE NAO FAZ (VEM PRIMEIRO DE PROPOSITO) ─── --}}
            {{-- ABRIR PELA LIMITACAO E O UNICO JEITO HONESTO DE ESCREVER ISTO. TODO SITE DE AFILIADO
                 ESCREVE "TESTAMOS EXAUSTIVAMENTE"; DIZER O QUE NAO FAZEMOS E O QUE TORNA O RESTO CRIVEL. --}}
            <div class="mt-8 rounded-2xl border-l-4 border-brand bg-white p-6 shadow-sm md:p-8">{{-- CAIXA DESTACADA COM A RESSALVA --}}
                <h2 class="text-xl font-bold text-slate-900">First, what we do not do</h2>{{-- H2 DA RESSALVA --}}
                <p class="mt-3 leading-relaxed text-slate-600">We do not buy every product and use it for six weeks. We are not a laboratory and we do not pretend to be one. What we do is read what manufacturers publish about their own products, compare it against what the same manufacturer publishes elsewhere on the same page, and check whether the numbers survive basic arithmetic. Surprisingly often they do not — and that gap is the most useful thing we can give you.</p>{{-- O QUE NAO FAZEMOS --}}
                <p class="mt-3 leading-relaxed text-slate-600">Where a guide covers a product making a health claim, we describe what the device does and what the seller states. We do not endorse or dispute the clinical claim, and we say plainly that the question belongs with a doctor. Where a finding concerns safety, we describe what each listing publishes and explain the technical difference — without making any statement about any product's legal compliance.</p>{{-- SAUDE E SEGURANCA --}}
            </div>

            {{-- ─── AS ETAPAS ─── --}}
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-slate-900">The process, step by step</h2>{{-- H2 DAS ETAPAS --}}

                <ol class="mt-6 space-y-5">{{-- LISTA ORDENADA DAS ETAPAS --}}
                    @foreach ($etapas as $i => $etapa){{-- PERCORRE AS ETAPAS --}}
                        <li id="step-{{ $i + 1 }}" class="scroll-mt-24 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm md:p-6">{{-- CARTAO DE UMA ETAPA --}}
                            <div class="flex items-start gap-4">{{-- LINHA: NUMERO + TEXTO --}}
                                <span class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-ink text-sm font-extrabold text-white">{{ $i + 1 }}</span>{{-- BADGE DO NUMERO DA ETAPA --}}
                                <div class="min-w-0">{{-- TEXTO DA ETAPA --}}
                                    <h3 class="font-bold leading-snug text-slate-900">{{ $etapa['titulo'] }}</h3>{{-- TITULO DA ETAPA --}}
                                    <p class="mt-2 leading-relaxed text-slate-600">{{ $etapa['texto'] }}</p>{{-- DESCRICAO DA ETAPA --}}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>

            {{-- ─── SINAIS DE ALERTA ─── --}}
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-slate-900">What we always flag</h2>{{-- H2 DOS SINAIS --}}
                <p class="mt-3 leading-relaxed text-slate-600">These appear in a guide whenever we find them, regardless of how well the product is selling or how well it is rated.</p>{{-- INTRODUCAO DA LISTA --}}

                <ul class="mt-5 grid gap-3 sm:grid-cols-2">{{-- GRID DOS SINAIS: 1 COLUNA NO MOBILE, 2 NO DESKTOP --}}
                    @foreach ($sinalizamos as $sinal){{-- PERCORRE OS SINAIS --}}
                        <li class="flex min-w-0 items-start gap-2.5 rounded-xl border border-slate-200 bg-white p-4 text-sm leading-relaxed text-slate-600 shadow-sm">{{-- CARTAO DE UM SINAL --}}
                            {{-- ICONE DE ALERTA (BOOTSTRAP ICONS: EXCLAMATION-TRIANGLE-FILL) EM SVG INLINE --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16" class="mt-0.5 shrink-0 text-brand" aria-hidden="true"><path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/></svg>
                            <span>{{ $sinal }}</span>{{-- TEXTO DO SINAL --}}
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- ─── DINHEIRO E INDEPENDENCIA ─── --}}
            <div class="mt-12 rounded-2xl bg-ink p-6 text-slate-300 md:p-8">{{-- CAIXA ESCURA COM A PARTE FINANCEIRA --}}
                <h2 class="text-2xl font-bold text-white">How this is paid for</h2>{{-- H2 DA SECAO FINANCEIRA --}}
                <p class="mt-3 leading-relaxed">ranked10 earns a commission when you buy through a link on this site, at no extra cost to you. We are an Amazon Associate. That is our only source of revenue: no brand pays for a position, no brand sees a guide before it goes live, and no brand can request a change to one.</p>{{-- FONTE DE RECEITA --}}
                <p class="mt-3 leading-relaxed">It is worth being honest about where that creates pressure. Commission gives us a reason to want you to buy something. Our answer is to publish the problems we find in products we earn from, and to tell you when the cheapest option in a guide is the one worth having. You can check that claim against any list on the site.</p>{{-- CONFLITO DE INTERESSE DECLARADO --}}
                <a href="{{ route('privacy') }}#affiliate" class="mt-4 inline-flex items-center gap-1.5 font-semibold text-brand-on-dark hover:text-white">{{-- LINK PARA O DISCLOSURE COMPLETO --}}
                    Read the full affiliate disclosure
                    {{-- ICONE SETA (BOOTSTRAP ICONS: ARROW-RIGHT) EM SVG INLINE --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                </a>
            </div>

            {{-- ─── CORRECOES ─── --}}
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-slate-900">Updates and corrections</h2>{{-- H2 DAS CORRECOES --}}
                <p class="mt-3 leading-relaxed text-slate-600">Prices move and listings change. Each guide shows the date it was last updated, and every price we quote is the price on the day of collection, named as such. If you find something wrong — a figure we misread, a product that has changed, a price that is now far off — the comment box at the end of every guide is the fastest way to tell us, and corrections are made in the guide itself rather than quietly.</p>{{-- POLITICA DE ATUALIZACAO --}}
            </div>

            {{-- ─── QUEM APLICA O METODO ─── --}}
            @if ($autor)
                <div class="mt-12 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">{{-- CAIXA DE ASSINATURA DO METODO --}}
                    <h2 class="text-xl font-bold text-slate-900">Who does this work</h2>{{-- H2 DA ASSINATURA --}}
                    <p class="mt-3 leading-relaxed text-slate-600">{{ $autor['bio'] }}</p>{{-- BIO CURTA DO AUTOR --}}
                    <a href="{{ route('author', $autor['slug']) }}" class="mt-4 inline-flex items-center gap-1.5 font-semibold text-brand hover:text-brand-light">{{-- LINK PARA A PAGINA DO AUTOR --}}
                        More about {{ $autor['name'] }}
                        {{-- ICONE SETA (BOOTSTRAP ICONS: ARROW-RIGHT) EM SVG INLINE --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                    </a>
                </div>
            @endif

        </div>{{-- FIM DA COLUNA DE LEITURA --}}
    </div>{{-- FIM DO CONTAINER --}}

@endsection{{-- FIM DO CONTEUDO --}}
