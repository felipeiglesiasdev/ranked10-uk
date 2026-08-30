@props(['article', 'category', 'articles', 'topProducts', 'topPick' => null]){{-- PROPS: ARTIGO ATUAL, CATEGORIA, GUIAS DA COLUNA, PRODUTOS MELHOR AVALIADOS E O PRODUTO #1 --}}

{{-- ═══════════════════════════════════════════════════════════════════════════
     COLUNA LATERAL DO ARTIGO (DESKTOP)
     ═══════════════════════════════════════════════════════════════════════════
     A coluna de leitura tem max-w-4xl dentro de um container max-w-7xl, entao sobravam ~19rem
     de espaco morto a direita em qualquer tela grande. Agora esse espaco carrega o trabalho que
     o mega menu deixou de fazer: quando os paineis viraram assincronos, cada pagina perdeu ~28
     links de artigo. Link contextual dentro do artigo vale mais que link de menu — mas so se
     ele existir, e ate agora nao existia.

     NO MOBILE A GRADE COLAPSA PARA UMA COLUNA E TUDO ISTO EMPILHA ABAIXO DO CONTEUDO, QUE E
     EXATAMENTE ONDE ESSES BLOCOS JA FICAVAM. UM RENDER SO, CERTO NOS DOIS TAMANHOS — NADA DE
     DUPLICAR O HTML COM hidden/lg:block.
     ═══════════════════════════════════════════════════════════════════════════ --}}
<aside class="mt-12 lg:mt-0" aria-label="More from ranked10">{{-- COLUNA LATERAL --}}

    {{-- O sticky ACOMPANHA O LEITOR PELO ARTIGO INTEIRO. FUNCIONA PORQUE ESTA COLUNA E MUITO MAIS
         CURTA QUE O CONTEUDO — NUM ARTIGO DE 20.000px ELA FICARIA VISIVEL SO NO TOPO SEM ISSO. --}}
    <div class="space-y-6 lg:sticky lg:top-24">{{-- WRAPPER GRUDENTO --}}

        {{-- ─── 1. ESCOLHA DO EDITOR ───
             O leitor rola dez produtos; este cartao mantem a recomendacao sempre a vista.
             O link e uma ancora interna para o card do #1, nao o link de afiliado: quem clica
             aqui ainda esta decidindo, e a pagina do produto convence melhor que um botao. --}}
        @if ($topPick)
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">{{-- CARTAO DA ESCOLHA --}}
                <p class="border-b border-slate-100 bg-brand px-4 py-2 text-xs font-bold uppercase tracking-wide text-white">Our top pick</p>{{-- FAIXA --}}
                <a href="#product-{{ $topPick->position }}" class="block p-4 transition hover:bg-slate-50">{{-- ANCORA PARA O CARD DO PRODUTO --}}
                    @if ($topPick->image)
                        <img src="{{ $topPick->image }}" alt="{{ $topPick->alt_text ?: $topPick->name }}" width="120" height="120" loading="lazy" class="mx-auto h-28 w-28 rounded-xl border border-slate-100 object-contain">{{-- FOTO DO PRODUTO #1 --}}
                    @endif
                    <p class="mt-3 text-sm font-bold leading-snug text-slate-900">{{ $topPick->name }}</p>{{-- NOME --}}
                    <div class="mt-2 flex flex-wrap items-center gap-x-3 gap-y-1">{{-- PRECO E NOTA --}}
                        <span class="text-lg font-extrabold text-slate-900">{{ $topPick->price }}</span>{{-- PRECO --}}
                        @if ($topPick->rating)
                            <span class="inline-flex items-center gap-1 text-sm font-semibold text-slate-600">{{-- NOTA --}}
                                {{-- ICONE DE ESTRELA (BOOTSTRAP ICONS: STAR-FILL) EM SVG INLINE --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16" class="text-amber-400" aria-hidden="true"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                                {{ number_format($topPick->rating, 1) }}
                            </span>
                        @endif
                    </div>
                    <span class="mt-3 block text-sm font-semibold text-brand">Read why it wins &rarr;</span>{{-- CHAMADA --}}
                </a>
            </div>
        @endif

        {{-- ─── 2. MAIS GUIAS ───
             O bloco de link interno que o artigo nao tinha. Prioriza a mesma categoria (mais
             relevante para quem esta lendo) e completa com os mais recentes do site quando a
             categoria e pequena. --}}
        @if ($articles->isNotEmpty())
            <nav class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm" aria-label="More guides">{{-- CAIXA DE GUIAS --}}
                <div class="flex flex-wrap items-baseline justify-between gap-2">{{-- CABECALHO --}}
                    <h2 class="text-sm font-bold uppercase tracking-wide text-slate-900">More {{ $category->name }} guides</h2>{{-- TITULO --}}
                    <a href="{{ route('category', $category) }}" class="text-xs font-semibold text-brand hover:text-brand-light">See all</a>{{-- LINK DA CATEGORIA --}}
                </div>

                <ul class="mt-3 divide-y divide-slate-100">{{-- LISTA DE GUIAS --}}
                    @foreach ($articles as $guia){{-- PERCORRE OS GUIAS DA COLUNA --}}
                        <li>
                            <a href="{{ route('article', [$guia->category, $guia]) }}" class="block py-2.5 text-sm font-medium leading-snug text-slate-700 transition hover:text-brand">{{-- LINK DO GUIA --}}
                                {{ $guia->title }}
                                @if ($guia->category_id !== $category->id){{-- MARCA OS QUE VIERAM DE OUTRA CATEGORIA PARA A LISTA NAO ENGANAR --}}
                                    <span class="mt-0.5 block text-xs font-normal text-slate-400">{{ $guia->category->name }}</span>{{-- CATEGORIA DE ORIGEM --}}
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        @endif

        {{-- ─── 3. MELHOR AVALIADOS DE OUTROS GUIAS ───
             Links profundos direto na ancora do produto dentro de outro artigo. Vieram do rodape
             da pagina para ca: no rodape competiam com os relacionados, aqui ocupam espaco que
             estava vazio. --}}
        @if ($topProducts->isNotEmpty())
            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">{{-- CAIXA DE PRODUTOS --}}
                <h2 class="text-sm font-bold uppercase tracking-wide text-slate-900">Highest rated right now</h2>{{-- TITULO --}}
                <p class="mt-1 text-xs leading-relaxed text-slate-500">Weighted by how many people rated each product, not just the score.</p>{{-- EXPLICA O CRITERIO --}}

                <ul class="mt-3 space-y-3">{{-- LISTA DE PRODUTOS --}}
                    @foreach ($topProducts as $produto){{-- PERCORRE OS MELHOR AVALIADOS --}}
                        @continue (! $produto->url){{-- SEM ARTIGO OU CATEGORIA NAO HA COMO MONTAR O LINK --}}
                        <li>
                            <a href="{{ $produto->url }}" class="flex min-w-0 items-center gap-3 transition hover:opacity-80">{{-- LINK PROFUNDO NA ANCORA DO PRODUTO --}}
                                @if ($produto->image)
                                    <img src="{{ preg_replace('/\._[^.]*_\./', '._AC_SL160_.', $produto->image) }}" alt="" width="44" height="44" loading="lazy" class="h-11 w-11 shrink-0 rounded-lg border border-slate-100 object-contain">{{-- MINIATURA EM 160px, NAO EM 1500px --}}
                                @endif
                                <span class="min-w-0 flex-1">
                                    <span class="block text-xs font-semibold leading-snug text-slate-700 line-clamp-2">{{ $produto->name }}</span>{{-- NOME DO PRODUTO --}}
                                    <span class="mt-0.5 flex items-center gap-1.5 text-xs text-slate-400">{{-- NOTA E VOLUME --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" viewBox="0 0 16 16" class="text-amber-400" aria-hidden="true"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                                        {{ number_format($produto->rating, 1) }} · {{ number_format($produto->reviews_count) }}
                                    </span>
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ─── 4. CAIXA DE CONFIANCA ───
             Link institucional em toda pagina de artigo. /about sustenta o E-E-A-T e, sem esta
             caixa, so receberia link do rodape. --}}
        <div class="rounded-2xl bg-slate-100 p-4">{{-- CAIXA CLARA --}}
            <p class="text-sm font-bold text-slate-900">Why trust this ranking?</p>{{-- TITULO --}}
            <p class="mt-1.5 text-xs leading-relaxed text-slate-600">We rank on price, customer ratings and the specifications that decide the job, and we say when a product is the wrong one for you.</p>{{-- RESUMO --}}
            <a href="{{ route('about') }}" class="mt-3 inline-block text-xs font-semibold text-brand hover:text-brand-light">About ranked10</a>{{-- SOBRE --}}
        </div>
    </div>
</aside>
