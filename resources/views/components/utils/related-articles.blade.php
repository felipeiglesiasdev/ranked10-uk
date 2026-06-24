@props(['articles']){{-- PROP: COLECAO DE ARTIGOS RELACIONADOS --}}

@if ($articles->isNotEmpty()){{-- SO RENDERIZA A SECAO SE HOUVER ARTIGOS RELACIONADOS --}}
    <section class="mt-12" aria-label="Related guides">{{-- BLOCO DE ARTIGOS RELACIONADOS --}}
        <h2 class="text-xl font-bold text-slate-900">Related buying guides</h2>{{-- TITULO DA SECAO --}}

        <div class="mt-4 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">{{-- GRID RESPONSIVO DE CARDS --}}
            @foreach ($articles as $related){{-- PERCORRE OS ARTIGOS RELACIONADOS --}}
                <a href="{{ route('article', [$related->category, $related]) }}" class="group flex flex-col rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md hover:border-brand/40">{{-- CARD CLICAVEL (ANCORA DE LINK INTERNO) --}}
                    <span class="inline-flex w-fit items-center rounded-full bg-brand/10 px-3 py-1 text-xs font-semibold text-brand">{{ $related->category->name }}</span>{{-- BADGE DA CATEGORIA --}}
                    <h3 class="mt-3 text-base font-bold text-slate-900 group-hover:text-brand">{{ $related->title }}</h3>{{-- TITULO DO ARTIGO RELACIONADO --}}
                    <p class="mt-2 text-sm text-slate-500 line-clamp-2">{{ $related->intro }}</p>{{-- INTRO TRUNCADA EM 2 LINHAS --}}
                </a>
            @endforeach
        </div>
    </section>
@endif
