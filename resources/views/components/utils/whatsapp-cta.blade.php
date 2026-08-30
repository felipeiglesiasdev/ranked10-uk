@php
    $promo = (array) config('promo.whatsapp', []); // CONFIGURACAO DO BLOCO (config/promo.php)
    $url = trim($promo['url'] ?? ''); // CONVITE DO GRUPO
    $ligado = ($promo['enabled'] ?? true) && filled($url); // SO RENDERIZA COM A URL PREENCHIDA E O BLOCO LIGADO
@endphp

@if ($ligado){{-- ⚠ SEM URL O BLOCO SOME. BOTAO MORTO NA PAGINA E PIOR QUE NENHUM BOTAO --}}
    {{-- ═══════════════════════════════════════════════════════════════════════
         CHAMADA DO GRUPO DE OFERTAS NO WHATSAPP
         ═══════════════════════════════════════════════════════════════════════
         PALETA: FUNDO NO PRETO DA MARCA (--color-ink), VERDE DO WHATSAPP SO NO ICONE E NO BOTAO.
         A PRIMEIRA VERSAO TINHA O CARTAO INTEIRO VERDE E O FELIPE REPROVOU — COM RAZAO: O SITE E
         VERMELHO E PRETO, E UM BLOCO VERDE INTEIRO BRIGA COM TUDO EM VOLTA. O ICONE MAIS O BOTAO
         JA FAZEM O LEITOR RECONHECER O WHATSAPP SEM O CARTAO PRECISAR GRITAR.

         ⚠ LOGO DA AMAZON: **NAO COLOCAR**, NEM AQUI NEM EM QUALQUER OUTRO CTA.
         O CONTRATO DE OPERACAO DO PROGRAMA DE ASSOCIADOS PROIBE USAR AS MARCAS DA AMAZON FORA
         DAS FERRAMENTAS DE LINK APROVADAS, E EM ESPECIAL DE FORMA QUE SUGIRA PATROCINIO OU
         ENDOSSO — QUE E EXATAMENTE O QUE UM LOGO NUM ANUNCIO DE GRUPO DE WHATSAPP FAZ.
         CITAR "Amazon" EM TEXTO E PERMITIDO E O SITE JA FAZ ISSO NO RODAPE. O LOGO E A LINHA.

         ⚠ CONTRASTE: O VERDE CLARO (#25D366) COM TEXTO BRANCO DA ~2,1:1 E REPROVA NO WCAG AA.
         POR ISSO ELE SO APARECE COMO **FUNDO DE BOTAO COM TEXTO ESCURO** (6,8:1). O SITE JA
         CORRIGIU ESSE MESMO ERRO UMA VEZ COM O --color-brand-on-dark; NAO REINTRODUZIR AQUI.

         MEDICAO: O LINK CARREGA data-cta="whatsapp-group" E O HOST chat.whatsapp.com, ENTAO DA
         PARA CRIAR O GATILHO NO GTM POR QUALQUER UM DOS DOIS, SEM MEXER NO CODIGO. --}}
    <div class="overflow-hidden rounded-2xl bg-ink p-5 shadow-sm ring-1 ring-[#25D366]/25">{{-- CARTAO PRETO DA MARCA, COM UM FIO VERDE NA BORDA --}}

        <div class="flex items-center gap-2">{{-- LINHA DA ETIQUETA --}}
            {{-- PONTO PULSANTE: SINALIZA "ACONTECENDO AGORA" SEM PRECISAR ESCREVER ISSO --}}
            <span class="relative flex h-2 w-2" aria-hidden="true">
                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-[#25D366] opacity-75"></span>{{-- ANEL QUE PULSA --}}
                <span class="relative inline-flex h-2 w-2 rounded-full bg-[#25D366]"></span>{{-- PONTO SOLIDO --}}
            </span>
            <p class="text-xs font-bold uppercase tracking-wide text-[#25D366]">{{ $promo['eyebrow'] }}</p>{{-- ETIQUETA --}}
        </div>

        <div class="mt-3 flex items-start gap-3">{{-- LINHA DO LOGO E DA MANCHETE --}}
            {{-- ICONE DO WHATSAPP (BOOTSTRAP ICONS: WHATSAPP) EM SVG INLINE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16" class="mt-0.5 shrink-0 text-[#25D366]" aria-hidden="true"><path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/></svg>
            <p class="text-base font-extrabold leading-snug text-white">{{ $promo['title'] }}</p>{{-- MANCHETE --}}
        </div>

        <p class="mt-2 text-sm leading-relaxed text-slate-300">{{ $promo['text'] }}</p>{{-- FRASE DE APOIO --}}

        {{-- rel: nofollow PORQUE E LINK PROMOCIONAL E NAO EDITORIAL; noopener PORQUE ABRE EM ABA NOVA --}}
        <a
            href="{{ $url }}"
            target="_blank"
            rel="nofollow noopener"
            data-cta="whatsapp-group"
            class="mt-4 flex w-full items-center justify-center gap-2 rounded-full bg-[#25D366] px-5 py-3 text-sm font-extrabold text-[#04352F] shadow-sm transition hover:bg-[#1FBF5A]"
        >{{-- BOTAO: VERDE CLARO COM TEXTO ESCURO, QUE E ONDE O CONTRASTE FUNCIONA --}}
            {{-- ICONE DO WHATSAPP (BOOTSTRAP ICONS: WHATSAPP) EM SVG INLINE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/></svg>
            {{ $promo['button'] }}
        </a>

        @if (! empty($promo['footnote']))
            <p class="mt-2.5 text-center text-xs text-slate-400">{{ $promo['footnote'] }}</p>{{-- TIRA O ATRITO DE CLICAR --}}
        @endif
    </div>
@endif
