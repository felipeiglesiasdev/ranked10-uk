@extends('layouts.app'){{-- USA O LAYOUT MESTRE UNICO --}}

@php
    use App\Support\Autores; // ACESSO CENTRALIZADO AOS PERFIS DE AUTOR

    $foto = Autores::foto($autor); // URL DA FOTO (CDN OU LOCAL) OU NULO
    $iniciais = Autores::iniciais($autor); // FALLBACK QUANDO NAO HA FOTO
    $anosSeo = Autores::anosDeSeo($autor); // CALCULADO A PARTIR DE seo_since, NUNCA ESCRITO NA MAO
    $sociais = array_filter($autor['socials'] ?? []); // REMOVE OS LINKS SOCIAIS VAZIOS
    $urlAutor = route('author', $autor['slug']); // URL CANONICA DESTA PAGINA

    $metaTitle = $autor['name'].' — '.$autor['role']; // TITULO DA ABA/GOOGLE
    $metaDescription = Str::limit($autor['headline'] ?? $autor['bio'], 155, ''); // META DESCRIPTION VINDA DA FRASE DE ABERTURA

    // SCHEMA ProfilePage + Person.
    // ESTE E O BLOCO QUE FAZ O TRABALHO DE AUTORIDADE: O sameAs APONTANDO PARA O LINKEDIN E O QUE
    // LIGA "Felipe Iglesias" A UMA IDENTIDADE QUE O GOOGLE JA CONHECE E CONSEGUE CONFERIR. SEM ELE,
    // O NOME NA ASSINATURA DO ARTIGO E APENAS UMA STRING.
    $personLd = array_filter([
        '@type' => 'Person', // O AUTOR E UMA PESSOA
        '@id' => $urlAutor.'#person', // ID UNICO DA ENTIDADE PESSOA (REUSADO PELOS ARTIGOS)
        'name' => $autor['name'], // NOME
        'url' => $urlAutor, // PAGINA CANONICA DA PESSOA
        'jobTitle' => $autor['role'] ?? null, // CARGO
        'description' => $autor['bio'] ?? null, // BIO CURTA
        'image' => $foto, // FOTO (REMOVIDA PELO array_filter SE NAO HOUVER)
        'sameAs' => array_values($sociais) ?: null, // PERFIS EXTERNOS QUE COMPROVAM A IDENTIDADE
        'knowsAbout' => $autor['knows_about'] ?? null, // AREAS DE CONHECIMENTO
        'alumniOf' => collect($autor['education'] ?? [])->map(fn ($e) => [ // INSTITUICOES DE ENSINO
            '@type' => 'EducationalOrganization', // TIPO DA INSTITUICAO
            'name' => $e['school'], // NOME DA UNIVERSIDADE
        ])->unique('name')->values()->all() ?: null, // SEM REPETIR A MESMA UNIVERSIDADE DUAS VEZES
        'worksFor' => ['@id' => url('/#organization')], // TRABALHA NA ORGANIZACAO DECLARADA NO LAYOUT
        'homeLocation' => isset($autor['location']) ? ['@type' => 'Place', 'name' => $autor['location']] : null, // ONDE MORA
    ]);

    $profileLd = [
        '@context' => 'https://schema.org', // CONTEXTO PADRAO
        '@type' => 'ProfilePage', // O TIPO CERTO PARA PAGINA DE PERFIL (NAO E WebPage GENERICA)
        '@id' => $urlAutor, // ID DA PAGINA
        'name' => $metaTitle, // NOME DA PAGINA
        'inLanguage' => 'en-GB', // IDIOMA
        'isPartOf' => ['@id' => url('/#website')], // LIGA AO WEBSITE DECLARADO NO LAYOUT
        'mainEntity' => $personLd, // A ENTIDADE PRINCIPAL DA PAGINA E A PESSOA
        'dateModified' => optional($stats['ultimo'])->toAtomString() ?? now()->toAtomString(), // ULTIMA ATIVIDADE EDITORIAL DO AUTOR
    ];
@endphp

@push('seo'){{-- INJETA AS META TAGS DE SEO NO HEAD DO LAYOUT --}}
    <title>{{ $metaTitle }} | ranked10</title>{{-- TITULO DA ABA/GOOGLE --}}
    <meta name="description" content="{{ $metaDescription }}">{{-- META DESCRIPTION --}}
    <link rel="canonical" href="{{ $urlAutor }}">{{-- URL CANONICA --}}
    <meta property="og:type" content="profile">{{-- TIPO OPEN GRAPH DE PERFIL --}}
    <meta property="og:title" content="{{ $metaTitle }}">{{-- TITULO OPEN GRAPH --}}
    <meta property="og:description" content="{{ $metaDescription }}">{{-- DESCRICAO OPEN GRAPH --}}
    <meta property="og:url" content="{{ $urlAutor }}">{{-- URL OPEN GRAPH --}}
    <meta property="og:site_name" content="ranked10">{{-- NOME DO SITE --}}
    @if ($foto)
        <meta property="og:image" content="{{ $foto }}">{{-- FOTO NO CARD SOCIAL --}}
        <meta name="twitter:image" content="{{ $foto }}">{{-- FOTO NO CARD DO X --}}
    @endif
    <meta name="twitter:title" content="{{ $metaTitle }}">{{-- TITULO DO CARD DO X --}}
    <meta name="twitter:description" content="{{ $metaDescription }}">{{-- DESCRICAO DO CARD DO X --}}
    <script type="application/ld+json">{!! json_encode($profileLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>{{-- DADOS ESTRUTURADOS (PROFILEPAGE + PERSON) --}}
@endpush

@section('content'){{-- INICIO DO CONTEUDO --}}

    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8 py-12">{{-- CONTAINER COM O MESMO GUTTER DO HEADER/FOOTER --}}
        <div class="max-w-4xl min-w-0">{{-- COLUNA DE LEITURA; min-w-0 IMPEDE QUE UM FILHO LARGO A ESTIQUE --}}

            <x-utils.breadcrumbs :items="[['label' => $autor['name']]]" />{{-- TRILHA: HOME > NOME DO AUTOR --}}

            {{-- ─── CARTAO DE APRESENTACAO ─── --}}
            <div class="mt-4 overflow-hidden rounded-2xl bg-ink text-slate-300 shadow-sm">{{-- CARTAO ESCURO (PRETO DA MARCA) --}}
                <div class="flex flex-col gap-6 p-6 sm:flex-row sm:items-start md:p-8">{{-- LAYOUT: FOTO + TEXTO, EMPILHADO NO MOBILE --}}

                    <div class="shrink-0">{{-- COLUNA DA FOTO --}}
                        @if ($foto)
                            <img src="{{ $foto }}" alt="{{ $autor['name'] }}, {{ $autor['role'] }} at ranked10" width="128" height="128" fetchpriority="high" class="h-28 w-28 rounded-2xl border-2 border-brand-on-dark object-cover sm:h-32 sm:w-32">{{-- FOTO REAL; width/height RESERVAM O ESPACO E EVITAM CLS --}}
                        @else
                            <div class="flex h-28 w-28 items-center justify-center rounded-2xl border-2 border-brand-on-dark bg-slate-800 text-3xl font-extrabold text-white sm:h-32 sm:w-32" role="img" aria-label="{{ $autor['name'] }}">{{ $iniciais }}</div>{{-- AVATAR COM INICIAIS ENQUANTO A FOTO NAO SOBE --}}
                        @endif
                    </div>

                    <div class="min-w-0">{{-- COLUNA DO TEXTO --}}
                        <h1 class="text-3xl font-extrabold tracking-tight text-white md:text-4xl">{{ $autor['name'] }}</h1>{{-- H1 COM O NOME --}}
                        <p class="mt-1 font-semibold text-brand-on-dark">{{ $autor['role'] }}</p>{{-- CARGO EM VERMELHO CLARO (O VERMELHO DA MARCA REPROVA NO CONTRASTE SOBRE PRETO) --}}

                        <div class="mt-3 flex flex-wrap items-center gap-x-4 gap-y-1.5 text-sm text-slate-400">{{-- LINHA DE METADADOS --}}
                            @if (! empty($autor['location']))
                                <span class="inline-flex items-center gap-1.5">{{-- LOCALIZACAO --}}
                                    {{-- ICONE DE PIN (BOOTSTRAP ICONS: GEO-ALT) EM SVG INLINE --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/><path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/></svg>
                                    {{ $autor['location'] }}
                                </span>
                            @endif
                            @if ($anosSeo)
                                <span class="inline-flex items-center gap-1.5">{{-- ANOS DE SEO (CALCULADO) --}}
                                    {{-- ICONE DE GRAFICO (BOOTSTRAP ICONS: GRAPH-UP-ARROW) EM SVG INLINE --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M0 0h1v15h15v1H0z"/><path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5"/></svg>
                                    {{ $anosSeo }} years working in SEO
                                </span>
                            @endif
                        </div>

                        @if (! empty($autor['headline']))
                            <p class="mt-4 leading-relaxed text-slate-300">{{ $autor['headline'] }}</p>{{-- FRASE DE POSICIONAMENTO --}}
                        @endif

                        @if (! empty($sociais['linkedin']))
                            <a href="{{ $sociais['linkedin'] }}" target="_blank" rel="noopener me" class="mt-5 inline-flex items-center gap-2 rounded-full bg-white px-5 py-2.5 text-sm font-bold text-ink transition hover:bg-slate-200">{{-- rel="me" DECLARA QUE ESTE PERFIL E DA MESMA PESSOA --}}
                                {{-- ICONE LINKEDIN (BOOTSTRAP ICONS: LINKEDIN) EM SVG INLINE --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/></svg>
                                Verify on LinkedIn
                            </a>{{-- BOTAO DE VERIFICACAO: O LEITOR PODE CONFERIR QUE A PESSOA EXISTE --}}
                        @endif
                    </div>
                </div>
            </div>

            {{-- ─── NUMEROS DO TRABALHO (LIDOS DO BANCO, NUNCA ESCRITOS NA MAO) ─── --}}
            <div class="mt-6 grid grid-cols-2 gap-3 sm:grid-cols-4">{{-- GRID DE ESTATISTICAS: 2 COLUNAS NO MOBILE, 4 NO DESKTOP --}}
                @foreach ([
                    ['valor' => number_format($stats['artigos']), 'rotulo' => 'guides written'],
                    ['valor' => number_format($stats['produtos']), 'rotulo' => 'products analysed'],
                    ['valor' => number_format($stats['categorias']), 'rotulo' => 'categories covered'],
                    ['valor' => number_format($stats['avaliacoes']), 'rotulo' => 'customer ratings read'],
                ] as $tile)
                    <div class="rounded-xl border border-slate-200 bg-white p-4 text-center shadow-sm">{{-- CARTAO DE UM NUMERO --}}
                        <p class="text-2xl font-extrabold tabular-nums text-slate-900">{{ $tile['valor'] }}</p>{{-- O NUMERO --}}
                        <p class="mt-0.5 text-xs leading-tight text-slate-500">{{ $tile['rotulo'] }}</p>{{-- O QUE ELE SIGNIFICA --}}
                    </div>
                @endforeach
            </div>

            {{-- ─── BIOGRAFIA ─── --}}
            <div class="mt-12">
                <h2 class="text-xl font-bold text-slate-900">About {{ Str::before($autor['name'], ' ') }}</h2>{{-- H2 USANDO SO O PRIMEIRO NOME --}}
                <div class="mt-4 space-y-4 leading-relaxed text-slate-600">{{-- PARAGRAFOS DA BIO LONGA --}}
                    @foreach ($autor['bio_long'] ?? [$autor['bio']] as $paragrafo){{-- PERCORRE OS PARAGRAFOS (CAI PARA A BIO CURTA SE NAO HOUVER LONGA) --}}
                        <p>{{ $paragrafo }}</p>{{-- UM PARAGRAFO --}}
                    @endforeach
                </div>
            </div>

            {{-- ─── FORMACAO ─── --}}
            @if (! empty($autor['education']))
                <div class="mt-12">
                    <h2 class="text-xl font-bold text-slate-900">Education</h2>{{-- H2 DA FORMACAO --}}
                    <ul class="mt-4 space-y-3">{{-- LISTA DE FORMACOES --}}
                        @foreach ($autor['education'] as $formacao){{-- PERCORRE AS FORMACOES --}}
                            <li class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-4 shadow-sm">{{-- CARTAO DE UMA FORMACAO --}}
                                {{-- ICONE DE CAPELO (BOOTSTRAP ICONS: MORTARBOARD-FILL) EM SVG INLINE --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16" class="mt-0.5 shrink-0 text-brand" aria-hidden="true"><path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z"/><path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z"/></svg>
                                <div class="min-w-0">{{-- TEXTO DA FORMACAO --}}
                                    <p class="font-bold text-slate-900">{{ $formacao['degree'] }}</p>{{-- GRAU --}}
                                    <p class="text-sm font-medium text-slate-600">{{ $formacao['school'] }}</p>{{-- INSTITUICAO --}}
                                    @if (! empty($formacao['note']))
                                        <p class="mt-1 text-sm text-slate-500">{{ $formacao['note'] }}</p>{{-- OBSERVACAO --}}
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ─── AREAS DE CONHECIMENTO ─── --}}
            @if (! empty($autor['knows_about']))
                <div class="mt-12">
                    <h2 class="text-xl font-bold text-slate-900">Areas covered</h2>{{-- H2 DAS AREAS --}}
                    <ul class="mt-4 flex flex-wrap gap-2">{{-- LISTA DE ETIQUETAS --}}
                        @foreach ($autor['knows_about'] as $area){{-- PERCORRE AS AREAS --}}
                            <li class="rounded-full border border-slate-200 bg-white px-3.5 py-1.5 text-sm font-medium text-slate-700">{{ $area }}</li>{{-- UMA ETIQUETA --}}
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ─── GUIAS RECENTES DO AUTOR ─── --}}
            @if ($artigos->isNotEmpty())
                <div class="mt-12">
                    <div class="flex flex-wrap items-baseline justify-between gap-3">{{-- CABECALHO DA LISTA --}}
                        <h2 class="text-xl font-bold text-slate-900">Latest guides by {{ Str::before($autor['name'], ' ') }}</h2>{{-- H2 DA LISTA --}}
                        <p class="text-sm text-slate-500">{{ $artigos->count() }} published in total</p>{{-- TOTAL PUBLICADO --}}
                    </div>

                    <ul class="mt-4 grid gap-3 sm:grid-cols-2">{{-- GRID DE GUIAS: 1 COLUNA NO MOBILE, 2 NO DESKTOP --}}
                        @foreach ($artigos->take(12) as $guia){{-- ATE 12 GUIAS MAIS RECENTES --}}
                            <li class="min-w-0 rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition hover:border-brand">{{-- CARTAO DE UM GUIA --}}
                                <p class="text-xs font-semibold uppercase tracking-wide text-brand">{{ $guia->category->name }}</p>{{-- CATEGORIA --}}
                                <a href="{{ route('article', [$guia->category, $guia]) }}" class="mt-1 block font-bold leading-snug text-slate-900 hover:text-brand">{{ $guia->title }}</a>{{-- TITULO E LINK --}}
                                <p class="mt-1.5 text-xs text-slate-400">Updated {{ $guia->updated_at->format('j M Y') }}</p>{{-- DATA DE ATUALIZACAO --}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ─── FORA DA MESA ─── --}}
            @if (! empty($autor['interests']))
                <div class="mt-12 rounded-2xl bg-slate-100 p-6 md:p-8">{{-- CAIXA CLARA DE FECHAMENTO --}}
                    <h2 class="text-xl font-bold text-slate-900">Away from the spreadsheet</h2>{{-- H2 DO BLOCO PESSOAL --}}
                    <p class="mt-3 leading-relaxed text-slate-600">{{ implode(', ', array_slice($autor['interests'], 0, -1)) }} and {{ end($autor['interests']) }}.</p>{{-- LISTA DE INTERESSES EM FRASE --}}
                </div>
            @endif

        </div>{{-- FIM DA COLUNA DE LEITURA --}}
    </div>{{-- FIM DO CONTAINER --}}

@endsection{{-- FIM DO CONTEUDO --}}
