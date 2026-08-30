@props(['author', 'date']){{-- PROPS: AUTOR E DATA DE ATUALIZACAO --}}

@php
    $perfilDoAutor = App\Support\Autores::porNome($author); // PERFIL EM config/authors.php (NULO SE O AUTOR NAO ESTIVER CADASTRADO)
@endphp

<p class="flex items-center gap-2 text-sm text-slate-500">{{-- LINHA DE METADADOS EM CINZA --}}
    {{-- ICONE DE CALENDARIO (BOOTSTRAP ICONS: CALENDAR3) EM SVG INLINE --}}
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/><path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/></svg>
    <span>
        By
        @if ($perfilDoAutor){{-- AUTOR CADASTRADO: A ASSINATURA VIRA LINK PARA A PAGINA DELE --}}
            {{-- ESTE LINK E UM DOS SINAIS DE E-E-A-T MAIS BARATOS QUE EXISTEM: LIGA CADA UM DOS
                 ARTIGOS DO SITE A UMA PAGINA DE PESSOA REAL, COM CREDENCIAIS E PERFIL EXTERNO
                 VERIFICAVEL. SEM ELE, O NOME NA ASSINATURA E SO UMA STRING SOLTA NA PAGINA. --}}
            <a href="{{ route('author', $perfilDoAutor['slug']) }}" class="font-medium text-slate-700 underline decoration-slate-300 underline-offset-2 hover:text-brand hover:decoration-brand" rel="author">{{ $author }}</a>{{-- LINK PARA A PAGINA DO AUTOR --}}
        @else{{-- AUTOR SEM PERFIL CADASTRADO: SO O NOME, SEM LINK QUEBRADO --}}
            <span class="font-medium text-slate-700">{{ $author }}</span>{{-- NOME EM TEXTO --}}
        @endif
        &middot; Updated <time datetime="{{ $date->toDateString() }}">{{ $date->format('j F Y') }}</time>{{-- DATA NO FORMATO BRITANICO --}}
    </span>
</p>
