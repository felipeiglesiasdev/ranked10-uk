@props(['products']){{-- PROPS: COLECAO DE PRODUTOS DO ARTIGO --}}

<div class="overflow-x-auto rounded-2xl border border-slate-200 bg-white shadow-sm">{{-- WRAPPER COM SCROLL HORIZONTAL NO MOBILE --}}
    <table class="w-full min-w-[40rem] text-left text-sm">{{-- TABELA COM LARGURA MINIMA PARA FORCAR O SCROLL --}}
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
                    <td class="px-4 py-3 text-slate-600">{{ $product->price }}</td>{{-- PRECO DO PRODUTO --}}
                    <td class="px-4 py-3">
                        @if ($product->rating){{-- SO MOSTRA A NOTA SE EXISTIR --}}
                            <span class="inline-flex items-center gap-1 text-slate-700">
                                {{-- ICONE DE ESTRELA (BOOTSTRAP ICONS: STAR-FILL) EM SVG INLINE --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" class="text-amber-400" aria-hidden="true"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                                {{ number_format($product->rating, 1) }}{{-- NOTA COM UMA CASA DECIMAL --}}
                            </span>
                        @else{{-- CASO O PRODUTO NAO TENHA NOTA --}}
                            <span class="text-slate-400">—</span>{{-- TRAVESSAO PARA NOTA AUSENTE --}}
                        @endif
                    </td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ $product->affiliate_link }}" rel="sponsored nofollow" target="_blank" class="inline-flex items-center gap-1.5 rounded-full bg-ink px-4 py-1.5 text-xs font-semibold text-white hover:bg-brand">{{-- LINK DE AFILIADO COM REL OBRIGATORIO --}}
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
