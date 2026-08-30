@props(['data' => null]){{-- PROP: O ARRAY how_we_rank DO ARTIGO (NULO NOS ARTIGOS ANTIGOS) --}}

@php
    $bloco = is_array($data) ? $data : []; // NORMALIZA: ARTIGO SEM O CAMPO VIRA ARRAY VAZIO
    $conferido = $bloco['checked'] ?? []; // ITENS QUE FORAM CONFERIDOS NESTA CATEGORIA
    $temConteudo = filled($bloco['summary'] ?? null) || filled($conferido); // SO VALE A PENA RENDERIZAR SE HOUVER SUBSTANCIA
@endphp

@if ($temConteudo){{-- ⚠ ARTIGO SEM how_we_rank SIMPLESMENTE NAO RENDERIZA NADA — E ASSIM QUE OS 76 ANTIGOS SEGUEM INTACTOS --}}
    {{-- BLOCO "HOW WE RANK" DO ARTIGO.
         E DIFERENTE DA PAGINA /how-we-rank: LA ESTA O METODO DO SITE, AQUI ESTA O RECIBO DESTE
         ARTIGO — QUANTOS ANUNCIOS FORAM ABERTOS, QUAIS NUMEROS FORAM CONFERIDOS NESTA CATEGORIA
         ESPECIFICA E O QUE FICOU DE FORA. E O QUE SEPARA "ranqueamos por qualidade e valor" DE
         UMA AFIRMACAO QUE O LEITOR CONSEGUE VERIFICAR. --}}
    <section id="how-we-rank" class="mt-10 scroll-mt-24 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm" aria-labelledby="how-we-rank-title">

        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 bg-slate-50 px-5 py-3.5 md:px-6">{{-- FAIXA DE TITULO --}}
            <h2 id="how-we-rank-title" class="flex items-center gap-2 text-base font-bold text-slate-900">{{-- H2 DO BLOCO --}}
                {{-- ICONE DE REGUA (BOOTSTRAP ICONS: RULERS) EM SVG INLINE --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" viewBox="0 0 16 16" class="text-brand" aria-hidden="true"><path d="M1 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2V3a1 1 0 0 0-1-1h-2V1a1 1 0 0 0-1-1zm1 13.5v-11h1v1a.5.5 0 0 0 1 0v-1h1v1a.5.5 0 0 0 1 0v-1h1v1a.5.5 0 0 0 1 0v-1h1v11H8v-1a.5.5 0 0 0-1 0v1H6v-1a.5.5 0 0 0-1 0v1H4v-1a.5.5 0 0 0-1 0v1zm7.5-9h1v1a.5.5 0 0 0 1 0v-1h1v9h-1v-1a.5.5 0 0 0-1 0v1h-1zm3.5 2h1v1a.5.5 0 0 0 1 0v-1h1v7h-1v-1a.5.5 0 0 0-1 0v1h-1z"/></svg>
                How we ranked this list
            </h2>
            @if (! empty($bloco['sample']))
                <p class="text-xs font-medium text-slate-500">{{ $bloco['sample'] }}</p>{{-- TAMANHO DA AMOSTRA (Nº DE ANUNCIOS ABERTOS, FAIXA DE AVALIACOES) --}}
            @endif
        </div>

        <div class="px-5 py-5 md:px-6 md:py-6">{{-- CORPO DO BLOCO --}}

            @if (! empty($bloco['summary']))
                <p class="leading-relaxed text-slate-600">{{ $bloco['summary'] }}</p>{{-- O QUE DECIDIU ESTE RANQUEAMENTO, EM UM PARAGRAFO --}}
            @endif

            @if (! empty($conferido))
                <h3 class="mt-5 text-xs font-bold uppercase tracking-wide text-slate-500">What we checked in this category</h3>{{-- SUBTITULO DA LISTA --}}
                <ul class="mt-3 grid gap-3 sm:grid-cols-2">{{-- GRID DOS ITENS CONFERIDOS --}}
                    @foreach ($conferido as $item){{-- PERCORRE OS ITENS --}}
                        <li class="flex min-w-0 items-start gap-2.5 rounded-xl bg-slate-50 p-3.5">{{-- CARTAO DE UM ITEM --}}
                            {{-- ICONE DE CHECK EM CIRCULO (BOOTSTRAP ICONS: CHECK-CIRCLE-FILL) EM SVG INLINE --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16" class="mt-0.5 shrink-0 text-brand" aria-hidden="true"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>
                            <span class="min-w-0">
                                <span class="block text-sm font-bold text-slate-900">{{ $item['label'] ?? '' }}</span>{{-- O QUE FOI CONFERIDO --}}
                                @if (! empty($item['text']))
                                    <span class="mt-0.5 block text-sm leading-relaxed text-slate-600">{{ $item['text'] }}</span>{{-- COMO FOI CONFERIDO, COM O NUMERO --}}
                                @endif
                            </span>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if (! empty($bloco['excluded']))
                {{-- O QUE FICOU DE FORA IMPORTA TANTO QUANTO O QUE ENTROU: E O QUE MOSTRA QUE HOUVE
                     UM CRITERIO, E NAO SO OS DEZ PRIMEIROS RESULTADOS DA BUSCA. --}}
                <div class="mt-5 border-t border-slate-100 pt-4">{{-- SEPARADOR ANTES DA EXCLUSAO --}}
                    <h3 class="text-xs font-bold uppercase tracking-wide text-slate-500">What we left out</h3>{{-- SUBTITULO --}}
                    <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ $bloco['excluded'] }}</p>{{-- CRITERIO DE EXCLUSAO --}}
                </div>
            @endif

            <p class="mt-5 border-t border-slate-100 pt-4 text-xs leading-relaxed text-slate-400">{{-- RODAPE COM A RESSALVA E O LINK PARA O METODO GERAL --}}
                Figures are taken from what each manufacturer publishes on its own product page and were correct on the date of collection. We do not test these products in a laboratory — <a href="{{ route('how-we-rank') }}" class="font-medium text-brand underline underline-offset-2 hover:text-brand-light">read our full method</a>.
            </p>
        </div>
    </section>
@endif
