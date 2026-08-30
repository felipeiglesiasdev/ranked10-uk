@props(['specs' => null, 'position' => null]){{-- PROPS: A FICHA DO PRODUTO E A POSICAO DELE NO RANKING --}}

@php
    $linhas = is_array($specs) ? array_filter($specs, fn ($l) => filled($l['label'] ?? null)) : []; // SO LINHAS COM ROTULO
@endphp

@if (! empty($linhas)){{-- PRODUTO SEM FICHA NAO RENDERIZA NADA (OS 760 PRODUTOS ANTIGOS SEGUEM INTACTOS) --}}
    {{-- FICHA TECNICA DO PRODUTO: OS NUMEROS QUE COLOCARAM ELE NESTA POSICAO.
         O CAMPO 'verdict' DE CADA LINHA E O QUE FAZ ESTE BLOCO VALER MAIS QUE UMA TABELA DE
         ESPECIFICACOES QUALQUER — ELE DIZ SE AQUELE NUMERO PESOU A FAVOR OU CONTRA:
           good ..... A FAVOR (VERDE)
           bad ...... CONTRA (VERMELHO)
           neutral .. CONTEXTO, NEM A FAVOR NEM CONTRA (CINZA) — E O PADRAO
         O CAMPO 'note' CARREGA A CONTA QUE DESMONTA OU CONFIRMA O NUMERO ANUNCIADO. --}}
    <div class="mt-5 overflow-hidden rounded-xl border border-slate-200">{{-- CAIXA DA FICHA --}}

        <p class="border-b border-slate-200 bg-slate-50 px-4 py-2.5 text-xs font-bold uppercase tracking-wide text-slate-600">{{-- FAIXA DE TITULO --}}
            @if ($position)
                Why it is number {{ $position }}{{-- TITULO QUE AMARRA A FICHA A POSICAO NO RANKING --}}
            @else
                What the listing publishes{{-- TITULO NEUTRO QUANDO NAO HA POSICAO --}}
            @endif
        </p>

        <dl class="divide-y divide-slate-100">{{-- LISTA DE DEFINICOES: ROTULO + VALOR --}}
            @foreach ($linhas as $linha){{-- PERCORRE AS LINHAS DA FICHA --}}
                @php
                    $veredito = $linha['verdict'] ?? 'neutral'; // A FAVOR, CONTRA OU CONTEXTO
                    $corDaBorda = match ($veredito) { // BORDA ESQUERDA COLORIDA PELO VEREDITO
                        'good' => 'border-l-green-500',
                        'bad' => 'border-l-red-500',
                        default => 'border-l-slate-200',
                    };
                    $corDoValor = match ($veredito) { // O VALOR TAMBEM RECEBE A COR
                        'good' => 'text-green-700',
                        'bad' => 'text-red-700',
                        default => 'text-slate-900',
                    };
                @endphp
                <div class="grid gap-x-4 gap-y-1 border-l-4 {{ $corDaBorda }} px-4 py-3 sm:grid-cols-[11rem_1fr]">{{-- UMA LINHA DA FICHA; EMPILHA NO MOBILE --}}
                    <dt class="min-w-0 text-sm text-slate-500">{{ $linha['label'] }}</dt>{{-- ROTULO DA CARACTERISTICA --}}
                    <dd class="min-w-0">{{-- VALOR E OBSERVACAO --}}
                        <span class="text-sm font-bold {{ $corDoValor }}">{{ $linha['value'] ?? '—' }}</span>{{-- VALOR PUBLICADO PELO FABRICANTE --}}
                        @if (! empty($linha['note']))
                            <span class="mt-0.5 block text-xs leading-relaxed text-slate-500">{{ $linha['note'] }}</span>{{-- A CONTA QUE CONFIRMA OU DESMONTA O NUMERO --}}
                        @endif
                    </dd>
                </div>
            @endforeach
        </dl>
    </div>
@endif
