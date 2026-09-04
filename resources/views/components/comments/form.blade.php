@props(['article', 'category', 'product' => null, 'turnstileSiteKey' => null]){{-- PROPS: ARTIGO, CATEGORIA, PRODUTO (NULO NO ARTIGO, PREENCHIDO NA PAGINA DE PRODUTO) E A CHAVE PUBLICA DO CAPTCHA --}}

<div x-ref="form" class="mt-10 scroll-mt-28 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">{{-- CAIXA DO FORMULARIO --}}

    <h3 class="text-base font-bold text-slate-900" x-text="respondendoA ? ('Replying to ' + respondendoNome) : 'Leave a comment'">Leave a comment</h3>{{-- TITULO QUE MUDA QUANDO E RESPOSTA --}}

    <p class="mt-1 text-sm text-slate-500" x-show="! respondendoA">{{-- SUBTITULO SO NO MODO COMENTARIO NOVO --}}
        No account needed. Own one of these? Tell other readers how it actually performed.
    </p>

    <div x-show="respondendoA" x-cloak class="mt-1">{{-- AVISO E BOTAO DE CANCELAR NO MODO RESPOSTA --}}
        <button type="button" @click="cancelarResposta()" class="text-sm font-semibold text-brand hover:text-brand-light">Cancel reply</button>{{-- VOLTA A COMENTAR DO ZERO --}}
    </div>

    <form
        method="POST"
        action="{{ $product ? route('comments.store.product', [$category, $article, $product->slug]) : route('comments.store', [$category, $article]) }}"{{-- MESMO PIPELINE NO SERVIDOR; SO MUDA A PAGINA DE DESTINO --}}
        class="mt-5 space-y-4"
        data-comment-form
        data-token-url="{{ route('comments.token') }}"
        @if ($turnstileSiteKey) data-turnstile-sitekey="{{ $turnstileSiteKey }}" @endif
    >{{-- OS data-* SAO O CONTRATO COM O JAVASCRIPT PREGUICOSO (resources/js/comments.js) --}}
        @csrf{{-- TOKEN CSRF INICIAL; O JAVASCRIPT TROCA POR UM FRESCO NA HORA DE ENVIAR --}}

        <input type="hidden" name="parent_id" :value="respondendoA ?? ''">{{-- COMENTARIO QUE ESTA SENDO RESPONDIDO (VAZIO = COMENTARIO RAIZ) --}}

        {{-- CARIMBO DE TEMPO CIFRADO COM A APP_KEY: DIZ AO SERVIDOR HA QUANTO TEMPO ESTE FORMULARIO
             FOI RENDERIZADO. BOT PREENCHE E ENVIA EM MENOS DE UM SEGUNDO; HUMANO NAO. COMO E CIFRADO,
             NAO DA PARA FORJAR UM VALOR "ANTIGO O SUFICIENTE". --}}
        <input type="hidden" name="rendered_at" value="{{ Crypt::encryptString((string) time()) }}">

        {{-- HONEYPOT. FICA FORA DA TELA EM VEZ DE display:none PORQUE PARTE DOS BOTS JA IGNORA
             CAMPO ESCONDIDO POR CSS. PARA GENTE ELE E INVISIVEL, NAO RECEBE FOCO POR TAB E E
             ANUNCIADO COMO ESCONDIDO AO LEITOR DE TELA. QUALQUER VALOR AQUI DESCARTA O ENVIO. --}}
        <div style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden" aria-hidden="true">
            <label for="c-website">Leave this field empty</label>
            <input type="text" id="c-website" name="website" tabindex="-1" autocomplete="off" value="">
        </div>

        <div class="grid gap-4 sm:grid-cols-2">{{-- NOME E EMAIL LADO A LADO A PARTIR DE sm --}}
            <div>
                <label for="c-name" class="block text-sm font-semibold text-slate-700">Name <span class="text-brand" aria-hidden="true">*</span></label>{{-- ROTULO DO NOME --}}
                <input
                    type="text" id="c-name" name="author_name" required maxlength="{{ config('comments.name_max', 40) }}"
                    value="{{ old('author_name') }}" autocomplete="nickname"
                    class="mt-1.5 w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm focus:border-brand focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand/30"
                >{{-- CAMPO DO NOME EXIBIDO --}}
                @error('author_name')<p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>@enderror{{-- ERRO DE VALIDACAO DO NOME --}}
            </div>

            <div>
                <label for="c-email" class="block text-sm font-semibold text-slate-700">Email <span class="font-normal text-slate-400">(optional, never published)</span></label>{{-- ROTULO DO EMAIL --}}
                <input
                    type="email" id="c-email" name="author_email" maxlength="120"
                    value="{{ old('author_email') }}" autocomplete="email"
                    class="mt-1.5 w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm focus:border-brand focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand/30"
                >{{-- CAMPO DE EMAIL OPCIONAL: NUNCA VAI PARA A PAGINA, SERVE SO PARA CONTATO --}}
                @error('author_email')<p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>@enderror{{-- ERRO DE VALIDACAO DO EMAIL --}}
            </div>
        </div>

        <div>
            <div class="flex items-baseline justify-between gap-3">{{-- LINHA DO ROTULO COM O CONTADOR DE CARACTERES --}}
                <label for="c-body" class="block text-sm font-semibold text-slate-700">Comment <span class="text-brand" aria-hidden="true">*</span></label>{{-- ROTULO DO TEXTO --}}
                <span class="text-xs tabular-nums text-slate-400" x-text="restantes + ' left'">{{ config('comments.max_length', 2000) }} left</span>{{-- QUANTOS CARACTERES AINDA CABEM --}}
            </div>
            <textarea
                id="c-body" name="body" rows="4" required
                minlength="{{ config('comments.min_length', 12) }}" maxlength="{{ config('comments.max_length', 2000) }}"
                x-ref="corpo" @input="contar($event.target.value)"
                placeholder="Share what you know about these products — what you bought, what surprised you, what you would avoid."
                class="mt-1.5 w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm leading-relaxed focus:border-brand focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand/30"
            >{{ old('body') }}</textarea>{{-- CAMPO DO COMENTARIO --}}
            @error('body')<p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>@enderror{{-- ERRO DE VALIDACAO DO TEXTO --}}
        </div>

        @if ($turnstileSiteKey){{-- SO RENDERIZA O CAPTCHA SE AS DUAS CHAVES ESTIVEREM NO .env --}}
            {{-- O SCRIPT DA CLOUDFLARE NAO E CARREGADO AQUI. QUEM O INJETA E O comments.js, QUE SO
                 RODA QUANDO O LEITOR CHEGA PERTO DESTA SECAO. ASSIM O CAPTCHA NAO PESA NO LCP DE
                 QUEM SO LE O ARTIGO E VAI EMBORA — QUE E A ESMAGADORA MAIORIA DO TRAFEGO. --}}
            <div data-turnstile class="min-h-[65px]"></div>{{-- ALVO ONDE O WIDGET E DESENHADO (ALTURA RESERVADA PARA NAO CAUSAR CLS) --}}
        @endif

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">{{-- LINHA FINAL: BOTAO + AVISO --}}
            <button
                type="submit" data-comment-submit
                class="inline-flex items-center justify-center gap-2 rounded-full bg-brand px-6 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-brand-light disabled:cursor-not-allowed disabled:opacity-60"
            >{{-- BOTAO DE ENVIO --}}
                {{-- ICONE DE ENVIAR (BOOTSTRAP ICONS: SEND) EM SVG INLINE --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.36.05L6.598 10.85 1.85 8.446a.75.75 0 0 1 .05-1.361L16.4.265a.5.5 0 0 1 .54.11zM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/></svg>
                <span data-comment-submit-label>Post comment</span>{{-- ROTULO QUE O JAVASCRIPT TROCA POR "Posting..." --}}
            </button>

            <p class="text-xs leading-relaxed text-slate-400 sm:max-w-xs sm:text-right">{{-- AVISO DE MODERACAO E PRIVACIDADE --}}
                Comments with links are checked before they appear. See our <a href="{{ route('privacy') }}" class="underline hover:text-brand">privacy policy</a>.
            </p>
        </div>
    </form>
</div>
