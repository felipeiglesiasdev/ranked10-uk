@props(['quotes' => null, 'productName' => null]){{-- PROPS: AS CITACOES E O NOME DO PRODUTO --}}

@php
    $citacoes = is_array($quotes) ? array_filter($quotes, fn ($c) => filled($c['text'] ?? null)) : []; // SO CITACOES COM TEXTO
@endphp

@if (! empty($citacoes)){{-- PRODUTO SEM CITACAO NAO RENDERIZA NADA --}}
    {{-- ═══════════════════════════════════════════════════════════════════════
         TRECHOS DE AVALIACOES REAIS DE CLIENTES.
         ═══════════════════════════════════════════════════════════════════════
         ⚠ REGRA ABSOLUTA: TODO TEXTO AQUI E COPIADO LITERALMENTE DE UMA AVALIACAO PUBLICADA NA
         FICHA DO PRODUTO. NUNCA GERAR, RESUMIR, TRADUZIR NEM "MELHORAR" UMA CITACAO. UMA
         AVALIACAO INVENTADA E UM DEPOIMENTO FALSO — E ESTE BLOCO EXISTE JUSTAMENTE PARA MOSTRAR
         QUE O SITE NAO E TEXTO DE IA SOBRE PRODUTO QUE NINGUEM VIU.

         ⚠ E DE PROPOSITO QUE ESTAS CITACOES **NAO** ENTRAM NO SCHEMA Review DO PRODUTO. ELAS
         SAO DE CLIENTES DA AMAZON, NAO NOSSAS; MARCA-LAS COMO REVIEW DESTE SITE SERIA APROPRIAR-SE
         DE AVALIACAO DE TERCEIRO, QUE E VIOLACAO DAS DIRETRIZES DE DADOS ESTRUTURADOS DO GOOGLE.
         A ATRIBUICAO FICA VISIVEL PARA O LEITOR, ONDE ELA IMPORTA.
         ═══════════════════════════════════════════════════════════════════════ --}}
    <div class="mt-5">{{-- BLOCO DE AVALIACOES --}}

        <div class="flex flex-wrap items-baseline justify-between gap-2">{{-- CABECALHO --}}
            <h3 class="flex items-center gap-2 text-sm font-bold uppercase tracking-wide text-slate-700">{{-- H3 DO BLOCO --}}
                {{-- ICONE DE ASPAS (BOOTSTRAP ICONS: CHAT-QUOTE-FILL) EM SVG INLINE --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16" class="text-brand" aria-hidden="true"><path d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M7.194 6.766a1.7 1.7 0 0 0-.227-.272 1.5 1.5 0 0 0-.469-.324l-.008-.004A1.8 1.8 0 0 0 5.734 6C4.776 6 4 6.746 4 7.667c0 .92.776 1.666 1.734 1.666.343 0 .662-.095.931-.26-.137.389-.39.804-.81 1.22a.405.405 0 0 0 .011.59c.173.16.447.155.614-.01 1.334-1.329 1.37-2.758.941-3.706a2.5 2.5 0 0 0-.227-.4M11 9.073c-.136.389-.39.804-.81 1.22a.405.405 0 0 0 .012.59c.172.16.446.155.613-.01 1.334-1.329 1.37-2.758.942-3.706a2.5 2.5 0 0 0-.228-.4 1.7 1.7 0 0 0-.227-.273 1.5 1.5 0 0 0-.469-.324l-.008-.004A1.8 1.8 0 0 0 10.264 6C9.306 6 8.53 6.746 8.53 7.667c0 .92.776 1.666 1.734 1.666.343 0 .662-.095.931-.26z"/></svg>
                What buyers actually say
            </h3>
            <p class="text-xs text-slate-400">Quoted from customer reviews on Amazon</p>{{-- ATRIBUICAO VISIVEL: A FONTE NAO E NOSSA E ISSO FICA DITO --}}
        </div>

        <div class="mt-3 grid gap-3 lg:grid-cols-2">{{-- GRID DE CITACOES: 1 COLUNA NO MOBILE, 2 NO DESKTOP --}}
            @foreach ($citacoes as $citacao){{-- PERCORRE AS CITACOES --}}
                <blockquote class="flex min-w-0 flex-col rounded-xl border border-slate-200 bg-slate-50 p-4">{{-- CARTAO DE UMA AVALIACAO --}}

                    <div class="flex flex-wrap items-center gap-x-2.5 gap-y-1">{{-- LINHA DE NOTA E SELO --}}
                        @if (! empty($citacao['rating']))
                            <span class="flex items-center gap-0.5" role="img" aria-label="Rated {{ $citacao['rating'] }} out of 5 by this reviewer">{{-- ESTRELAS DESTA AVALIACAO --}}
                                @for ($i = 1; $i <= 5; $i++){{-- DESENHA SEMPRE 5 ESTRELAS --}}
                                    {{-- ICONE DE ESTRELA (BOOTSTRAP ICONS: STAR-FILL) EM SVG INLINE --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" class="{{ $i <= (int) round($citacao['rating']) ? 'text-amber-400' : 'text-slate-300' }}" aria-hidden="true"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                                @endfor
                            </span>
                        @endif
                        @if (! empty($citacao['verified']))
                            <span class="inline-flex items-center gap-1 text-xs font-semibold text-green-700">{{-- SELO DE COMPRA VERIFICADA --}}
                                {{-- ICONE DE CHECK EM ESCUDO (BOOTSTRAP ICONS: PATCH-CHECK-FILL) EM SVG INLINE --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"/></svg>
                                Verified purchase
                            </span>
                        @endif
                    </div>

                    @if (! empty($citacao['title']))
                        <p class="mt-2 text-sm font-bold text-slate-900">{{ $citacao['title'] }}</p>{{-- TITULO DA AVALIACAO --}}
                    @endif

                    {{-- O TEXTO SAI ENTRE ASPAS TIPOGRAFICAS PORQUE E CITACAO LITERAL, NAO PARAFRASE. --}}
                    <p class="mt-1.5 flex-1 text-sm italic leading-relaxed text-slate-600">&ldquo;{{ $citacao['text'] }}&rdquo;</p>{{-- TEXTO DA AVALIACAO --}}

                    <footer class="mt-3 text-xs text-slate-400">{{-- AUTORIA E DATA --}}
                        <cite class="not-italic font-medium text-slate-500">{{ $citacao['author'] ?? 'Amazon customer' }}</cite>{{-- NOME EXIBIDO PELO AVALIADOR --}}
                        @if (! empty($citacao['date']))
                            <span> &middot; {{ $citacao['date'] }}</span>{{-- QUANDO FOI ESCRITA --}}
                        @endif
                    </footer>
                </blockquote>
            @endforeach
        </div>
    </div>
@endif
