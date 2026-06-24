@props(['url', 'title']){{-- PROPS: URL DA PAGINA E TITULO DO ARTIGO --}}

@php
    // PRE-CODIFICA OS VALORES PARA USO SEGURO NAS URLS DE COMPARTILHAMENTO
    $u = rawurlencode($url); // URL CODIFICADA
    $t = rawurlencode($title); // TITULO CODIFICADO
    $whatsapp = "https://wa.me/?text={$t}%20{$u}"; // LINK DE COMPARTILHAR NO WHATSAPP
    $twitter = "https://twitter.com/intent/tweet?text={$t}&url={$u}"; // LINK DE COMPARTILHAR NO X (TWITTER)
    $facebook = "https://www.facebook.com/sharer/sharer.php?u={$u}"; // LINK DE COMPARTILHAR NO FACEBOOK
    $email = "mailto:?subject={$t}&body={$u}"; // LINK DE COMPARTILHAR POR E-MAIL
@endphp

<section class="mt-12" aria-label="Share this article">{{-- BLOCO DE COMPARTILHAMENTO --}}
    <p class="text-sm font-semibold text-slate-900">Share this guide</p>{{-- TITULO DA SECAO --}}

    <div class="mt-3 flex flex-wrap items-center gap-2">{{-- LINHA DE BOTOES DE SHARE --}}

        <a href="{{ $whatsapp }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-[#25D366] hover:text-white" aria-label="Share on WhatsApp">{{-- BOTAO WHATSAPP --}}
            {{-- ICONE WHATSAPP (BOOTSTRAP ICONS: WHATSAPP) EM SVG INLINE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.05c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.480 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg>
            <span class="hidden sm:inline">WhatsApp</span>{{-- ROTULO (OCULTO NO MOBILE) --}}
        </a>

        <a href="{{ $twitter }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-ink hover:text-white" aria-label="Share on X">{{-- BOTAO X (TWITTER) --}}
            {{-- ICONE X/TWITTER (BOOTSTRAP ICONS: TWITTER-X) EM SVG INLINE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/></svg>
            <span class="hidden sm:inline">X</span>{{-- ROTULO (OCULTO NO MOBILE) --}}
        </a>

        <a href="{{ $facebook }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-[#1877F2] hover:text-white" aria-label="Share on Facebook">{{-- BOTAO FACEBOOK --}}
            {{-- ICONE FACEBOOK (BOOTSTRAP ICONS: FACEBOOK) EM SVG INLINE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/></svg>
            <span class="hidden sm:inline">Facebook</span>{{-- ROTULO (OCULTO NO MOBILE) --}}
        </a>

        <a href="{{ $email }}" class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-brand hover:text-white" aria-label="Share by email">{{-- BOTAO E-MAIL --}}
            {{-- ICONE ENVELOPE (BOOTSTRAP ICONS: ENVELOPE) EM SVG INLINE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/></svg>
            <span class="hidden sm:inline">Email</span>{{-- ROTULO (OCULTO NO MOBILE) --}}
        </a>

        {{-- BOTAO COPIAR LINK: USA A CLIPBOARD API COM UM PEQUENO HANDLER INLINE (UNICO TRECHO DE JS) --}}
        <button type="button" onclick="navigator.clipboard.writeText('{{ $url }}').then(() => { const s = this.querySelector('[data-label]'); if (s) { const o = s.textContent; s.textContent = 'Copied!'; setTimeout(() => s.textContent = o, 1500); } })" class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-200" aria-label="Copy link">{{-- BOTAO COPIAR LINK --}}
            {{-- ICONE LINK (BOOTSTRAP ICONS: LINK-45DEG) EM SVG INLINE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z"/><path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z"/></svg>
            <span data-label class="hidden sm:inline">Copy link</span>{{-- ROTULO QUE VIRA "COPIED!" TEMPORARIAMENTE --}}
        </button>
    </div>
</section>
