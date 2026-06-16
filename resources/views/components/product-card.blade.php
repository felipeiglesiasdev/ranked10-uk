@props(['product']){{-- PROPS: O PRODUTO A SER RENDERIZADO --}}

<section id="product-{{ $product->position }}" class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">{{-- CARD DO PRODUTO COM ANCORA PELA POSICAO --}}

    <div class="flex items-center gap-3 border-b border-slate-100 bg-slate-50 px-5 py-3">{{-- FAIXA SUPERIOR COM POSICAO E NOME --}}
        <span class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full {{ $product->position === 1 ? 'bg-amber-400 text-slate-900' : 'bg-slate-900 text-white' }} text-sm font-extrabold">{{ $product->position }}</span>{{-- BADGE DA POSICAO (DOURADO PARA O 1º LUGAR) --}}
        <h3 class="text-lg font-bold text-slate-900">{{ $product->name }}</h3>{{-- NOME DO PRODUTO --}}
    </div>

    <div class="grid gap-6 p-5 md:grid-cols-[12rem_1fr]">{{-- GRID COM IMAGEM A ESQUERDA NO DESKTOP --}}

        <div class="flex items-start justify-center">{{-- COLUNA DA IMAGEM --}}
            @if ($product->image){{-- SO RENDERIZA A TAG IMG SE HOUVER IMAGEM --}}
                <img src="{{ $product->image }}" alt="{{ $product->name }}" loading="lazy" class="h-44 w-44 rounded-xl border border-slate-100 object-contain bg-white">{{-- IMAGEM DO PRODUTO COM ALT E LAZY LOADING --}}
            @else{{-- PLACEHOLDER QUANDO NAO HA IMAGEM --}}
                <div class="flex h-44 w-44 items-center justify-center rounded-xl bg-slate-100 text-slate-300" role="img" aria-label="No image available">
                    {{-- ICONE DE IMAGEM (BOOTSTRAP ICONS: IMAGE) EM SVG INLINE --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/><path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/></svg>
                </div>
            @endif
        </div>

        <div>{{-- COLUNA DO CONTEUDO --}}
            <div class="flex flex-wrap items-center gap-x-4 gap-y-2">{{-- LINHA COM PRECO, ESTRELAS E REVIEWS --}}
                <span class="text-2xl font-extrabold text-slate-900">{{ $product->price }}</span>{{-- PRECO EM DESTAQUE --}}
                @if ($product->rating){{-- SO MOSTRA AS ESTRELAS SE HOUVER NOTA --}}
                    <span class="flex items-center gap-1" role="img" aria-label="Rated {{ number_format($product->rating, 1) }} out of 5 stars">{{-- GRUPO DE ESTRELAS ACESSIVEL --}}
                        @for ($i = 1; $i <= 5; $i++){{-- DESENHA SEMPRE 5 ESTRELAS --}}
                            {{-- ICONE DE ESTRELA (BOOTSTRAP ICONS: STAR-FILL) EM SVG INLINE, PREENCHIDA OU APAGADA --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="{{ $i <= round($product->rating) ? 'text-amber-400' : 'text-slate-200' }}" aria-hidden="true"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                        @endfor
                        <span class="ml-1 text-sm font-semibold text-slate-700">{{ number_format($product->rating, 1) }}</span>{{-- NOTA NUMERICA AO LADO DAS ESTRELAS --}}
                    </span>
                @endif
                @if ($product->reviews_count > 0){{-- SO MOSTRA O CONTADOR SE HOUVER REVIEWS --}}
                    <span class="text-sm text-slate-500">{{ number_format($product->reviews_count) }} reviews</span>{{-- QUANTIDADE DE REVIEWS FORMATADA --}}
                @endif
            </div>

            <p class="mt-3 leading-relaxed text-slate-600">{{ $product->summary }}</p>{{-- TEXTO DA REVIEW INDIVIDUAL --}}

            <div class="mt-4 grid gap-4 sm:grid-cols-2">{{-- COLUNAS DE PROS E CONTRAS --}}
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-wide text-green-700">Pros</h4>{{-- TITULO DA LISTA DE PROS --}}
                    <ul class="mt-2 space-y-1.5">{{-- LISTA DE PONTOS POSITIVOS --}}
                        @foreach ($product->pros as $pro){{-- PERCORRE OS PROS DO PRODUTO --}}
                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                {{-- ICONE DE CHECK (BOOTSTRAP ICONS: CHECK-LG) EM SVG INLINE VERDE --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="mt-0.5 shrink-0 text-green-600" aria-hidden="true"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/></svg>
                                {{ $pro }}{{-- TEXTO DO PONTO POSITIVO --}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-wide text-red-700">Cons</h4>{{-- TITULO DA LISTA DE CONTRAS --}}
                    <ul class="mt-2 space-y-1.5">{{-- LISTA DE PONTOS NEGATIVOS --}}
                        @foreach ($product->contras as $contra){{-- PERCORRE OS CONTRAS DO PRODUTO --}}
                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                {{-- ICONE DE X (BOOTSTRAP ICONS: X-LG) EM SVG INLINE VERMELHO --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" class="mt-1 shrink-0 text-red-500" aria-hidden="true"><path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/></svg>
                                {{ $contra }}{{-- TEXTO DO PONTO NEGATIVO --}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <a href="{{ $product->affiliate_link }}" rel="sponsored nofollow" target="_blank" class="mt-6 inline-flex items-center gap-2 rounded-full bg-amber-400 px-6 py-3 text-sm font-bold text-slate-900 shadow-sm transition hover:bg-amber-300">{{-- BOTAO CTA COM REL OBRIGATORIO DE AFILIADO --}}
                Check Price on Amazon
                {{-- ICONE DE LINK EXTERNO (BOOTSTRAP ICONS: BOX-ARROW-UP-RIGHT) EM SVG INLINE --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/><path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/></svg>
            </a>
        </div>
    </div>
</section>
