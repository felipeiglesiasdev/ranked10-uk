@props([
    'products',                                   // COLECAO DE PRODUTOS JA ORDENADA PELO CONTROLLER
    'title' => 'Top rated products right now',    // TITULO DA SECAO
    'subtitle' => null,                           // LINHA DE APOIO OPCIONAL ABAIXO DO TITULO
])

@if ($products->isNotEmpty()){{-- SO RENDERIZA A SECAO SE HOUVER PRODUTOS --}}
    {{-- BLOCO DE PRODUTOS MELHOR AVALIADOS: CADA CARD APONTA PARA A ANCORA DO PRODUTO DENTRO DO ARTIGO,
         O QUE GERA LINKS INTERNOS PROFUNDOS (NAO SO PARA A HOME/CATEGORIA, MAS PARA O TRECHO EXATO DO GUIA). --}}
    <section class="mt-4" aria-labelledby="top-produtos-titulo">{{-- SECAO DOS MELHORES AVALIADOS --}}
        <div class="flex flex-wrap items-end justify-between gap-2">{{-- CABECALHO DA SECAO --}}
            <div>
                <h2 id="top-produtos-titulo" class="text-2xl font-bold text-slate-900">{{ $title }}</h2>{{-- TITULO DA SECAO --}}
                @if ($subtitle){{-- SUBTITULO OPCIONAL --}}
                    <p class="mt-1 text-sm text-slate-500">{{ $subtitle }}</p>{{-- TEXTO DE APOIO --}}
                @endif
            </div>
        </div>

        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">{{-- GRID RESPONSIVO: 1 -> 2 -> 4 COLUNAS --}}
            @foreach ($products as $product){{-- PERCORRE OS PRODUTOS MELHOR AVALIADOS --}}
                @if ($product->url){{-- SO LINKA SE O PRODUTO TIVER ARTIGO E CATEGORIA VALIDOS --}}
                    {{-- min-w-0 E OBRIGATORIO: ITEM DE GRID NASCE COM min-width:auto E SE RECUSA A ENCOLHER ABAIXO DO
                         PROPRIO min-content, ENTAO SEM ISSO UM TEXTO LONGO AQUI DENTRO EMPURRA A PAGINA NO MOBILE. --}}
                    <a href="{{ $product->url }}" class="group flex min-w-0 flex-col rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-brand/40 hover:shadow-md">{{-- CARD CLICAVEL (LINK INTERNO PROFUNDO) --}}

                        <div class="flex items-start gap-4">{{-- LINHA COM IMAGEM E DADOS --}}
                            @if ($product->image){{-- IMAGEM DO PRODUTO QUANDO EXISTIR --}}
                                <img src="{{ $product->image }}" alt="{{ $product->alt_text ?: $product->name }}" loading="lazy" class="h-16 w-16 shrink-0 rounded-lg border border-slate-100 bg-white object-contain">{{-- MINIATURA DO PRODUTO --}}
                            @else{{-- PLACEHOLDER QUANDO NAO HA IMAGEM --}}
                                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-300" role="img" aria-label="No image available">
                                    {{-- ICONE DE IMAGEM (BOOTSTRAP ICONS: IMAGE) EM SVG INLINE --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/><path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/></svg>
                                </div>
                            @endif

                            <div class="min-w-0">{{-- COLUNA DE DADOS (min-w-0 PERMITE TRUNCAR NOMES LONGOS) --}}
                                @if ($product->rating){{-- LINHA DE NOTA SO SE HOUVER RATING --}}
                                    <div class="flex items-center gap-1.5" role="img" aria-label="Rated {{ number_format($product->rating, 1) }} out of 5 stars">{{-- GRUPO DE NOTA ACESSIVEL --}}
                                        {{-- ICONE DE ESTRELA (BOOTSTRAP ICONS: STAR-FILL) EM SVG INLINE --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16" class="text-amber-400" aria-hidden="true"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                                        <span class="text-sm font-bold text-slate-900">{{ number_format($product->rating, 1) }}</span>{{-- NOTA NUMERICA --}}
                                        @if ($product->reviews_count > 0){{-- CONTADOR DE AVALIACOES --}}
                                            <span class="text-xs text-slate-400">({{ number_format($product->reviews_count) }})</span>{{-- QUANTIDADE DE AVALIACOES --}}
                                        @endif
                                    </div>
                                @endif
                                <p class="mt-1 text-sm font-bold text-slate-900 line-clamp-2 group-hover:text-brand">{{ $product->name }}</p>{{-- NOME DO PRODUTO EM 2 LINHAS --}}
                                <p class="mt-1 text-sm font-extrabold text-slate-700">{{ $product->price }}</p>{{-- PRECO --}}
                            </div>
                        </div>

                        <div class="mt-4 flex items-center gap-2 border-t border-slate-100 pt-3">{{-- RODAPE DO CARD: DE QUAL GUIA O PRODUTO VEIO --}}
                            <span class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full {{ $product->position === 1 ? 'bg-brand' : 'bg-ink' }} text-[10px] font-extrabold text-white">{{ $product->position }}</span>{{-- POSICAO NO RANKING DE ORIGEM --}}
                            <span class="min-w-0 line-clamp-1 text-xs text-slate-500">in {{ $product->article->title }}</span>{{-- TITULO DO GUIA DE ORIGEM; line-clamp-1 (E NAO truncate) PORQUE truncate APLICA white-space:nowrap E O TITULO LONGO VIRA UMA LINHA INDIVISIVEL QUE ESTOURA A LARGURA NO MOBILE --}}
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </section>
@endif
