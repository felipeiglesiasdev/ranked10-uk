@props(['products']){{-- PROPS: COLECAO DE PRODUTOS DO ARTIGO --}}

{{-- ═══ MOBILE (< md): CARDS EMPILHADOS. NENHUM ELEMENTO PASSA DA LARGURA DA TELA, ENTAO NAO HA SCROLL LATERAL ═══ --}}
<div class="md:hidden space-y-3">{{-- LISTA VERTICAL DE RESUMOS --}}
    @foreach ($products as $product){{-- PERCORRE OS PRODUTOS ORDENADOS POR POSICAO --}}
        <div class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">{{-- CARD RESUMO DO PRODUTO --}}

            {{-- FOTO CIRCULAR DO PRODUTO COM A POSICAO EM ETIQUETA NO CANTO --}}
            <div class="relative shrink-0">{{-- relative PARA POSICIONAR A ETIQUETA SOBRE A FOTO --}}
                @if ($product->image){{-- MOSTRA A FOTO REAL SE EXISTIR --}}
                    <img src="{{ $product->image }}" alt="{{ $product->alt_text ?: $product->name }}" loading="lazy" class="h-14 w-14 rounded-full border border-slate-200 object-cover bg-white">{{-- FOTO EM FORMATO CIRCULAR --}}
                @else{{-- PLACEHOLDER CIRCULAR QUANDO NAO HA FOTO --}}
                    <div class="flex h-14 w-14 items-center justify-center rounded-full border border-slate-200 bg-slate-100 text-slate-300" role="img" aria-label="No image available">
                        {{-- ICONE DE IMAGEM (BOOTSTRAP ICONS: IMAGE) EM SVG INLINE --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/><path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/></svg>
                    </div>
                @endif
                {{-- ETIQUETA DA POSICAO SOBRE A FOTO, NO CANTO SUPERIOR ESQUERDO (VERMELHA NO 1º, PRETA NOS DEMAIS) --}}
                <span class="absolute -top-1.5 -left-1.5 inline-flex h-6 w-6 items-center justify-center rounded-full {{ $product->position === 1 ? 'bg-brand' : 'bg-ink' }} text-[11px] font-extrabold text-white ring-2 ring-white">{{ $product->position }}</span>
            </div>

            <div class="min-w-0 flex-1">{{-- min-w-0 PERMITE O TEXTO ENCOLHER E QUEBRAR EM VEZ DE EMPURRAR --}}
                <a href="#product-{{ $product->position }}" class="block text-sm font-semibold text-slate-900 line-clamp-2 hover:text-brand">{{ $product->name }}</a>{{-- NOME COM ANCORA LOCAL PARA O CARD COMPLETO DO PRODUTO --}}
                <div class="mt-1 flex flex-wrap items-center gap-x-3 gap-y-1 text-sm">{{-- LINHA DE PRECO E NOTA --}}
                    <span class="font-bold text-slate-900">{{ $product->price }}</span>{{-- PRECO --}}
                    @if ($product->rating){{-- SO MOSTRA A NOTA SE EXISTIR --}}
                        <span class="inline-flex items-center gap-1 text-slate-600">
                            {{-- ICONE DE ESTRELA (BOOTSTRAP ICONS: STAR-FILL) EM SVG INLINE --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" class="text-amber-400" aria-hidden="true"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                            {{ number_format($product->rating, 1) }}{{-- NOTA COM UMA CASA DECIMAL --}}
                        </span>
                    @endif
                </div>
            </div>

            <a href="{{ $product->affiliate_link }}" rel="sponsored nofollow" target="_blank" class="shrink-0 inline-flex items-center gap-1 rounded-full bg-ink px-3 py-1.5 text-xs font-semibold text-white hover:bg-brand" aria-label="View {{ $product->name }} on Amazon">{{-- LINK DE AFILIADO COM REL OBRIGATORIO --}}
                View
                {{-- ICONE DE LINK EXTERNO (BOOTSTRAP ICONS: BOX-ARROW-UP-RIGHT) EM SVG INLINE --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/><path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/></svg>
            </a>
        </div>
    @endforeach
</div>

{{-- ═══ DESKTOP (md+): TABELA NORMAL. SEM min-width, ENTAO NUNCA EMPURRA A PAGINA ═══ --}}
<div class="hidden md:block w-full max-w-full overflow-x-auto rounded-2xl border border-slate-200 bg-white shadow-sm">{{-- WRAPPER COM SCROLL INTERNO DE SEGURANCA --}}
    <table class="w-full text-left text-sm">{{-- TABELA SEM LARGURA MINIMA FIXA --}}
        <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">{{-- CABECALHO DA TABELA --}}
            <tr>
                <th scope="col" class="px-4 py-3">#</th>{{-- COLUNA DA POSICAO --}}
                <th scope="col" class="px-4 py-3">Product</th>{{-- COLUNA DO NOME --}}
                <th scope="col" class="px-4 py-3">Price</th>{{-- COLUNA DO PRECO --}}
                <th scope="col" class="px-4 py-3">Rating</th>{{-- COLUNA DA NOTA --}}
                <th scope="col" class="px-4 py-3"><span class="sr-only">Link</span></th>{{-- COLUNA DO LINK (TITULO OCULTO PARA LEITORES DE TELA) --}}
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">{{-- CORPO DA TABELA COM LINHAS DIVIDIDAS --}}
            @foreach ($products as $product){{-- PERCORRE OS PRODUTOS ORDENADOS POR POSICAO --}}
                <tr class="hover:bg-brand/5">{{-- LINHA COM DESTAQUE SUAVE NO HOVER --}}
                    <td class="px-4 py-3">
                        <span class="inline-flex h-7 w-7 items-center justify-center rounded-full {{ $product->position === 1 ? 'bg-brand text-white' : 'bg-slate-100 text-slate-600' }} text-xs font-bold">{{ $product->position }}</span>{{-- BADGE DA POSICAO (VERMELHO PARA O 1º LUGAR) --}}
                    </td>
                    <td class="px-4 py-3 font-semibold text-slate-900">{{ $product->name }}</td>{{-- NOME DO PRODUTO --}}
                    <td class="px-4 py-3 whitespace-nowrap text-slate-600">{{ $product->price }}</td>{{-- PRECO DO PRODUTO --}}
                    <td class="px-4 py-3">
                        @if ($product->rating){{-- SO MOSTRA A NOTA SE EXISTIR --}}
                            <span class="inline-flex items-center gap-1 whitespace-nowrap text-slate-700">
                                {{-- ICONE DE ESTRELA (BOOTSTRAP ICONS: STAR-FILL) EM SVG INLINE --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" class="text-amber-400" aria-hidden="true"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                                {{ number_format($product->rating, 1) }}{{-- NOTA COM UMA CASA DECIMAL --}}
                            </span>
                        @else{{-- CASO O PRODUTO NAO TENHA NOTA --}}
                            <span class="text-slate-400">—</span>{{-- TRAVESSAO PARA NOTA AUSENTE --}}
                        @endif
                    </td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ $product->affiliate_link }}" rel="sponsored nofollow" target="_blank" class="inline-flex items-center gap-1.5 whitespace-nowrap rounded-full bg-ink px-4 py-1.5 text-xs font-semibold text-white hover:bg-brand">{{-- LINK DE AFILIADO COM REL OBRIGATORIO --}}
                            View
                            {{-- ICONE DE LINK EXTERNO (BOOTSTRAP ICONS: BOX-ARROW-UP-RIGHT) EM SVG INLINE --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/><path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/></svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
