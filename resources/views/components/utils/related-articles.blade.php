@props(['articles', 'category' => null]){{-- PROPS: COLECAO DE ARTIGOS RELACIONADOS E A CATEGORIA ATUAL (OPCIONAL) --}}

@if ($articles->isNotEmpty()){{-- SO RENDERIZA A SECAO SE HOUVER ARTIGOS RELACIONADOS --}}
    <div class="mt-12">{{-- BLOCO DE ARTIGOS RELACIONADOS (DIV) --}}
        <div class="flex flex-wrap items-center justify-between gap-3">{{-- CABECALHO COM TITULO E LINK DA CATEGORIA --}}
            <h2 class="text-xl font-bold text-slate-900">Related buying guides</h2>{{-- TITULO DA SECAO --}}
            @if ($category){{-- LINK DE VOLTA PARA A CATEGORIA (MAIS UM LINK INTERNO CONTEXTUAL) --}}
                <a href="{{ route('category', $category) }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-brand hover:text-brand-light">{{-- LINK PARA TODOS OS GUIAS DA CATEGORIA --}}
                    All {{ $category->name }} guides
                    {{-- ICONE DE SETA (BOOTSTRAP ICONS: ARROW-RIGHT) EM SVG INLINE --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
                </a>
            @endif
        </div>

        <div class="mt-4 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">{{-- GRID RESPONSIVO DE CARDS --}}
            @foreach ($articles as $related){{-- PERCORRE OS ARTIGOS RELACIONADOS --}}
                <a href="{{ route('article', [$related->category, $related]) }}" class="group flex flex-col rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md hover:border-brand/40">{{-- CARD CLICAVEL (ANCORA DE LINK INTERNO) --}}
                    <span class="inline-flex w-fit items-center rounded-full bg-brand/10 px-3 py-1 text-xs font-semibold text-brand">{{ $related->category->name }}</span>{{-- BADGE DA CATEGORIA --}}
                    <h3 class="mt-3 text-base font-bold text-slate-900 group-hover:text-brand">{{ $related->title }}</h3>{{-- TITULO DO ARTIGO RELACIONADO --}}
                    <p class="mt-2 text-sm text-slate-500 line-clamp-2">{{ $related->intro }}</p>{{-- INTRO TRUNCADA EM 2 LINHAS --}}
                </a>
            @endforeach
        </div>
    </div>
@endif
