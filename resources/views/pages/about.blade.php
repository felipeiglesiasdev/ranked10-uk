@extends('layouts.app'){{-- USA O LAYOUT MESTRE UNICO --}}

@php
    use App\Support\Autores; // ACESSO CENTRALIZADO AOS PERFIS DE AUTOR

    $foto = Autores::foto($autor); // URL DA FOTO DO FUNDADOR (CDN OU LOCAL) OU NULO
    $iniciais = Autores::iniciais($autor); // FALLBACK QUANDO NAO HA FOTO
    $urlPagina = route('about'); // URL CANONICA DESTA PAGINA
    $metaTitle = 'About ranked10'; // TITULO DA ABA/GOOGLE
    $metaDescription = 'ranked10 is an independent UK buying-guide site. We rank products by checking what manufacturers publish against their own numbers — and we publish the contradictions we find.'; // META DESCRIPTION
@endphp

@push('seo'){{-- INJETA AS META TAGS DE SEO NO HEAD DO LAYOUT --}}
    <title>{{ $metaTitle }} | ranked10</title>{{-- TITULO DA ABA/GOOGLE --}}
    <meta name="description" content="{{ $metaDescription }}">{{-- META DESCRIPTION --}}
    <link rel="canonical" href="{{ $urlPagina }}">{{-- URL CANONICA --}}
    <meta property="og:type" content="website">{{-- TIPO OPEN GRAPH --}}
    <meta property="og:title" content="{{ $metaTitle }}">{{-- TITULO OPEN GRAPH --}}
    <meta property="og:description" content="{{ $metaDescription }}">{{-- DESCRICAO OPEN GRAPH --}}
    <meta property="og:url" content="{{ $urlPagina }}">{{-- URL OPEN GRAPH --}}
    <meta property="og:site_name" content="ranked10">{{-- NOME DO SITE --}}
    <meta name="twitter:title" content="{{ $metaTitle }}">{{-- TITULO DO CARD DO X --}}
    <meta name="twitter:description" content="{{ $metaDescription }}">{{-- DESCRICAO DO CARD DO X --}}

    {{-- SCHEMA AboutPage.
         O BLOCO REABRE A ENTIDADE Organization DECLARADA NO LAYOUT (MESMO @id) SO PARA ACRESCENTAR
         O founder E O foundingDate. USAR O MESMO @id E O QUE FAZ O GOOGLE JUNTAR OS DOIS PEDACOS
         NUMA ENTIDADE SO, EM VEZ DE ENTENDER QUE EXISTEM DUAS ORGANIZACOES COM O MESMO NOME. --}}
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org', // CONTEXTO PADRAO
        '@graph' => [
            [
                '@type' => 'AboutPage', // TIPO CERTO PARA PAGINA INSTITUCIONAL
                '@id' => $urlPagina, // ID DA PAGINA
                'name' => $metaTitle, // NOME DA PAGINA
                'description' => $metaDescription, // DESCRICAO
                'inLanguage' => 'en-GB', // IDIOMA
                'isPartOf' => ['@id' => url('/#website')], // LIGA AO WEBSITE DO LAYOUT
                'mainEntity' => ['@id' => url('/#organization')], // A ENTIDADE PRINCIPAL E A ORGANIZACAO
            ],
            array_filter([
                '@type' => 'Organization', // MESMA ORGANIZACAO DO LAYOUT, ENRIQUECIDA AQUI
                '@id' => url('/#organization'), // ⚠ MESMO @id DO LAYOUT: E O QUE UNIFICA AS DUAS DECLARACOES
                'name' => 'ranked10', // NOME DA MARCA
                'url' => url('/'), // SITE
                'foundingDate' => (string) ($autor['founded'] ?? ''), // ANO DE FUNDACAO
                'knowsAbout' => $autor['knows_about'] ?? null, // AREAS DE ATUACAO
                'founder' => $autor ? array_filter([ // FUNDADOR COMO PESSOA
                    '@type' => 'Person', // TIPO PESSOA
                    '@id' => route('author', $autor['slug']).'#person', // ⚠ MESMO @id DA PAGINA DO AUTOR: LIGA AS DUAS PAGINAS NA MESMA PESSOA
                    'name' => $autor['name'], // NOME
                    'url' => route('author', $autor['slug']), // PAGINA DA PESSOA
                    'jobTitle' => $autor['role'] ?? null, // CARGO
                    'image' => $foto, // FOTO
                    'sameAs' => array_values(array_filter($autor['socials'] ?? [])) ?: null, // PERFIS EXTERNOS VERIFICAVEIS
                ]) : null, // SEM AUTOR CADASTRADO O CAMPO SOME
            ]),
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>{{-- DADOS ESTRUTURADOS (ABOUTPAGE + ORGANIZATION COM FUNDADOR) --}}
@endpush

@section('content'){{-- INICIO DO CONTEUDO --}}

    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8 py-12">{{-- CONTAINER COM O MESMO GUTTER DO HEADER/FOOTER --}}
        <div class="max-w-4xl min-w-0">{{-- COLUNA DE LEITURA; min-w-0 IMPEDE QUE UM FILHO LARGO A ESTIQUE --}}

            <x-utils.breadcrumbs :items="[['label' => 'About']]" />{{-- TRILHA: HOME > ABOUT --}}

            <h1 class="mt-4 text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">About ranked10</h1>{{-- H1 DA PAGINA --}}

            <p class="mt-4 text-lg leading-relaxed text-slate-600">{{-- PARAGRAFO DE ABERTURA --}}
                ranked10 is an independent buying-guide site for the United Kingdom. We publish top 10 lists in categories where the right choice can be settled with numbers — and we get there by checking what manufacturers publish against their own figures.
            </p>

            {{-- ─── NUMEROS DO SITE (LIDOS DO BANCO) ─── --}}
            <div class="mt-8 grid grid-cols-2 gap-3 sm:grid-cols-4">{{-- GRID DE ESTATISTICAS --}}
                @foreach ([
                    ['valor' => number_format($stats['artigos']), 'rotulo' => 'buying guides'],
                    ['valor' => number_format($stats['produtos']), 'rotulo' => 'products analysed'],
                    ['valor' => number_format($stats['categorias']), 'rotulo' => 'categories'],
                    ['valor' => number_format($stats['avaliacoes']), 'rotulo' => 'customer ratings read'],
                ] as $tile)
                    <div class="rounded-xl border border-slate-200 bg-white p-4 text-center shadow-sm">{{-- CARTAO DE UM NUMERO --}}
                        <p class="text-2xl font-extrabold tabular-nums text-slate-900">{{ $tile['valor'] }}</p>{{-- O NUMERO --}}
                        <p class="mt-0.5 text-xs leading-tight text-slate-500">{{ $tile['rotulo'] }}</p>{{-- O QUE ELE SIGNIFICA --}}
                    </div>
                @endforeach
            </div>

            {{-- ─── A IDEIA ─── --}}
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-slate-900">Why this site exists</h2>{{-- H2 DA SECAO --}}
                <div class="mt-4 space-y-4 leading-relaxed text-slate-600">{{-- PARAGRAFOS --}}
                    <p>Search for almost any product in Britain and you will find a dozen guides that read the same. They restate the marketing copy, add an adjective, and rank whatever pays best. Nobody checks whether the numbers on the box hold up, because checking is slow and restating is fast.</p>{{-- O PROBLEMA --}}
                    <p>That is the gap ranked10 works in. A mini chainsaw advertising a 1000-watt motor runs on a battery holding 84 watt-hours; the run time the same listing publishes puts the real draw nearer 63 watts. A vibration plate reporting a "maximum speed" of 180 RPM is reporting the number of levels on its remote control. A SAD lamp claiming 10,000 lux is claiming it at 12 centimetres, which is 576 lux at the distance you would actually sit.</p>{{-- EXEMPLOS CONCRETOS --}}
                    <p>None of that is hidden. It is printed on the product page, by the seller, in public — it just requires reading the specification table and the bullet points as two separate documents and noticing where they disagree. That is what we do, one category at a time.</p>{{-- O METODO EM UMA FRASE --}}
                </div>
            </div>

            {{-- ─── ONDE ATUAMOS E ONDE NAO ─── --}}
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-slate-900">What we cover, and what we avoid</h2>{{-- H2 DA SECAO --}}
                <p class="mt-3 leading-relaxed text-slate-600">We cover categories where the decision is made on specifications. We stay out of the ones decided by how a product feels in the hand, because a written guide cannot settle those honestly — you would be reading an opinion dressed up as research.</p>{{-- CRITERIO --}}

                <ul class="mt-5 grid gap-3 sm:grid-cols-2">{{-- GRID DE CATEGORIAS --}}
                    @foreach ($categorias as $categoria){{-- PERCORRE AS CATEGORIAS COM CONTAGEM --}}
                        <li class="min-w-0 rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition hover:border-brand">{{-- CARTAO DE UMA CATEGORIA --}}
                            <a href="{{ route('category', $categoria) }}" class="font-bold text-slate-900 hover:text-brand">{{ $categoria->name }}</a>{{-- NOME E LINK --}}
                            <p class="mt-0.5 text-xs text-slate-500">{{ $categoria->articles_count }} {{ Str::plural('guide', $categoria->articles_count) }}</p>{{-- QUANTOS GUIAS --}}
                            @if ($categoria->description)
                                <p class="mt-2 text-sm leading-relaxed text-slate-500">{{ $categoria->description }}</p>{{-- DESCRICAO DA CATEGORIA --}}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- ─── QUEM ESCREVE ─── --}}
            @if ($autor)
                <div class="mt-12 overflow-hidden rounded-2xl bg-ink text-slate-300 shadow-sm">{{-- CARTAO ESCURO DO FUNDADOR --}}
                    <div class="flex flex-col gap-5 p-6 sm:flex-row sm:items-start md:p-8">{{-- LAYOUT: FOTO + TEXTO --}}
                        <div class="shrink-0">{{-- COLUNA DA FOTO --}}
                            @if ($foto)
                                <img src="{{ $foto }}" alt="{{ $autor['name'] }}, founder of ranked10" width="96" height="96" loading="lazy" class="h-20 w-20 rounded-2xl border-2 border-brand-on-dark object-cover sm:h-24 sm:w-24">{{-- FOTO REAL --}}
                            @else
                                <div class="flex h-20 w-20 items-center justify-center rounded-2xl border-2 border-brand-on-dark bg-slate-800 text-2xl font-extrabold text-white sm:h-24 sm:w-24" role="img" aria-label="{{ $autor['name'] }}">{{ $iniciais }}</div>{{-- AVATAR COM INICIAIS --}}
                            @endif
                        </div>
                        <div class="min-w-0">{{-- COLUNA DO TEXTO --}}
                            <h2 class="text-xl font-bold text-white">Who runs ranked10</h2>{{-- H2 DA SECAO --}}
                            <p class="mt-2 leading-relaxed">{{ $autor['bio'] }}</p>{{-- BIO CURTA --}}
                            <a href="{{ route('author', $autor['slug']) }}" class="mt-4 inline-flex items-center gap-1.5 font-semibold text-brand-on-dark hover:text-white">{{-- LINK PARA A PAGINA DO AUTOR --}}
                                Full profile and credentials
                                {{-- ICONE SETA (BOOTSTRAP ICONS: ARROW-RIGHT) EM SVG INLINE --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            {{-- ─── PONTE PARA A METODOLOGIA E O DISCLOSURE ─── --}}
            <div class="mt-12 grid gap-4 sm:grid-cols-2">{{-- CARTOES DE NAVEGACAO --}}
                <a href="{{ route('author', 'felipe-iglesias') }}" class="min-w-0 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:border-brand">{{-- CARTAO DO AUTOR --}}
                    <h2 class="font-bold text-slate-900">Who writes these guides</h2>{{-- TITULO DO CARTAO --}}
                    <p class="mt-2 text-sm leading-relaxed text-slate-600">Every guide on ranked10 is researched and written by one person. Credentials, background and the full list of guides.</p>{{-- RESUMO --}}
                    <span class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-brand">Read the profile</span>{{-- CHAMADA --}}
                </a>
                <a href="{{ route('privacy') }}#affiliate" class="min-w-0 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:border-brand">{{-- CARTAO DO DISCLOSURE --}}
                    <h2 class="font-bold text-slate-900">How we are funded</h2>{{-- TITULO DO CARTAO --}}
                    <p class="mt-2 text-sm leading-relaxed text-slate-600">We earn an affiliate commission on qualifying purchases, at no extra cost to you. No brand pays for a position or sees a guide before it is published.</p>{{-- RESUMO --}}
                    <span class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-brand">Read the disclosure</span>{{-- CHAMADA --}}
                </a>
            </div>

        </div>{{-- FIM DA COLUNA DE LEITURA --}}
    </div>{{-- FIM DO CONTAINER --}}

@endsection{{-- FIM DO CONTEUDO --}}
