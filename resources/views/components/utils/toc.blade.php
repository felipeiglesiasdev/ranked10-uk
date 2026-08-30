@props(['products', 'hasVerdict' => true, 'hasMethod' => false]){{-- PROPS: PRODUTOS, SE EXISTE CONCLUSAO E SE EXISTE O BLOCO "HOW WE RANK" --}}

@if ($products->isNotEmpty()){{-- SO RENDERIZA O INDICE SE O ARTIGO TIVER PRODUTOS --}}
    {{-- INDICE DO ARTIGO: GERA ANCORAS INTERNAS (BOM PARA UX E PARA OS SITELINKS DE SALTO DO GOOGLE).
         MOBILE-FIRST: RECOLHIDO NO CELULAR COM UM BOTAO, SEMPRE ABERTO A PARTIR DE md. --}}
    <nav x-data="{ aberto: false }" class="mt-8 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm" aria-labelledby="toc-titulo">{{-- CAIXA DO INDICE --}}

        <div class="flex items-center justify-between gap-4">{{-- CABECALHO DO INDICE --}}
            <h2 id="toc-titulo" class="flex items-center gap-2 text-sm font-bold uppercase tracking-wide text-slate-900">{{-- TITULO DO INDICE --}}
                {{-- ICONE DE LISTA (BOOTSTRAP ICONS: LIST-OL) EM SVG INLINE --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="text-brand" aria-hidden="true"><path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5"/><path d="M.5 4a.5.5 0 0 1 0-1h.5V1.5a.5.5 0 0 1 1 0V3h.5a.5.5 0 0 1 0 1zM.5 8.5a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .4.8L1.5 10h1.4a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.4-.8L1.5 8.5zM.5 12a.5.5 0 0 0 0 1h1.2a.4.4 0 0 1 0 .8H1a.5.5 0 0 0 0 1h.7a.4.4 0 0 1 0 .8H.5a.5.5 0 0 0 0 1h1.2a1.4 1.4 0 0 0 .96-2.4A1.4 1.4 0 0 0 1.7 12z"/></svg>
                In this guide
            </h2>

            <button type="button" @click="aberto = ! aberto" class="inline-flex items-center gap-1 text-xs font-semibold text-brand md:hidden" :aria-expanded="aberto ? 'true' : 'false'" aria-controls="toc-lista">{{-- BOTAO SO NO MOBILE --}}
                <span x-text="aberto ? 'Hide' : 'Show'">Show</span>{{-- ROTULO ALTERNA CONFORME O ESTADO --}}
                {{-- ICONE DE SETA (BOOTSTRAP ICONS: CHEVRON-DOWN) EM SVG INLINE, GIRA AO ABRIR --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" class="transition-transform" :class="aberto && 'rotate-180'" aria-hidden="true"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/></svg>
            </button>
        </div>

        {{-- LISTA: ESCONDIDA NO MOBILE ATE O CLIQUE (!block SOBRESCREVE O hidden), SEMPRE VISIVEL A PARTIR DE md --}}
        <div id="toc-lista" class="hidden md:block" :class="aberto && '!block'">
            <ol class="mt-4 space-y-1 border-t border-slate-100 pt-4">{{-- LISTA ORDENADA DAS ANCORAS --}}
                @if ($hasMethod){{-- SO OS ARTIGOS COM METODOLOGIA PROPRIA GANHAM ESTA ENTRADA --}}
                    <li>
                        <a href="#how-we-rank" class="flex items-center gap-3 rounded-lg px-2 py-1.5 text-sm text-slate-600 transition hover:bg-slate-50 hover:text-brand">{{-- ANCORA DO BLOCO DE METODOLOGIA --}}
                            <span class="w-6 shrink-0 text-center text-xs font-bold text-slate-400">—</span>{{-- MARCADOR NEUTRO (NAO E UM PRODUTO) --}}
                            <span class="font-medium">How we ranked this list</span>{{-- ROTULO DA METODOLOGIA --}}
                        </a>
                    </li>
                @endif

                <li>
                    <a href="#at-a-glance" class="flex items-center gap-3 rounded-lg px-2 py-1.5 text-sm text-slate-600 transition hover:bg-slate-50 hover:text-brand">{{-- ANCORA DA TABELA COMPARATIVA --}}
                        <span class="w-6 shrink-0 text-center text-xs font-bold text-slate-400">—</span>{{-- MARCADOR NEUTRO (NAO E UM PRODUTO) --}}
                        <span class="font-medium">At a glance: all {{ $products->count() }} compared</span>{{-- ROTULO DA TABELA COMPARATIVA --}}
                    </a>
                </li>

                @foreach ($products as $product){{-- PERCORRE OS PRODUTOS NA ORDEM DO RANKING --}}
                    <li>
                        <a href="#product-{{ $product->position }}" class="flex items-start gap-3 rounded-lg px-2 py-1.5 text-sm text-slate-600 transition hover:bg-slate-50 hover:text-brand">{{-- ANCORA DIRETA DO CARD DO PRODUTO --}}
                            <span class="mt-px w-6 shrink-0 rounded text-center text-xs font-extrabold {{ $product->position === 1 ? 'text-brand' : 'text-slate-400' }}">{{ $product->position }}</span>{{-- NUMERO DA POSICAO (1º EM VERMELHO) --}}
                            <span class="min-w-0 break-words font-medium">{{ $product->name }}</span>{{-- NOME DO PRODUTO; min-w-0 + break-words GARANTEM QUEBRA MESMO EM CODIGOS DE MODELO LONGOS SEM ESPACO --}}
                        </a>
                    </li>
                @endforeach

                @if ($hasVerdict){{-- SO LINKA A CONCLUSAO SE ELA EXISTIR --}}
                    <li>
                        <a href="#final-verdict" class="flex items-center gap-3 rounded-lg px-2 py-1.5 text-sm text-slate-600 transition hover:bg-slate-50 hover:text-brand">{{-- ANCORA DA CONCLUSAO --}}
                            <span class="w-6 shrink-0 text-center text-xs font-bold text-slate-400">—</span>{{-- MARCADOR NEUTRO --}}
                            <span class="font-medium">Final verdict: how to choose</span>{{-- ROTULO DA CONCLUSAO --}}
                        </a>
                    </li>
                @endif
            </ol>
        </div>
    </nav>
@endif
