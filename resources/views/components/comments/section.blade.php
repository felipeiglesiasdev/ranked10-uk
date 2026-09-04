@props(['article', 'category', 'comments', 'product' => null, 'turnstileSiteKey' => null]){{-- PROPS: ARTIGO, CATEGORIA, COMENTARIOS RAIZ JA CARREGADOS, PRODUTO (NULO NO ARTIGO) E A CHAVE PUBLICA DO CAPTCHA --}}

@php
    $maxTexto = (int) config('comments.max_length', 2000); // TETO DE CARACTERES, USADO NO CONTADOR DO ALPINE
    $totalComentarios = $comments->sum(fn ($c) => 1 + $c->replies->count()); // TOTAL REAL = RAIZES + RESPOSTAS
@endphp

{{-- SECAO DE COMENTARIOS.
     ARQUITETURA (E O PORQUE DE CADA METADE):
       1. A LISTA E RENDERIZADA PELO SERVIDOR → ESTA NO HTML, O GOOGLE INDEXA, VIRA CONTEUDO
          UNICO E SINAL DE ATUALIZACAO DA PAGINA. E O MOTIVO DE NAO USARMOS DISQUS.
       2. O JAVASCRIPT (CAPTCHA + TOKEN CSRF) E CARREGADO SOB DEMANDA, SO QUANDO O LEITOR
          CHEGA PERTO DESTA SECAO → QUEM SO LE O ARTIGO NAO PAGA NADA POR ISSO NO LCP. --}}
<section
    id="comments"
    class="mt-14 scroll-mt-24 border-t border-slate-200 pt-10"
    aria-labelledby="comments-heading"
    data-comments-section
    x-data="{
        respondendoA: null,
        respondendoNome: '',
        restantes: {{ max(0, $maxTexto - mb_strlen((string) old('body'))) }},
        contar(valor) { this.restantes = {{ $maxTexto }} - valor.length },
        responderA(id, nome) {
            this.respondendoA = id; this.respondendoNome = nome;
            this.$nextTick(() => { this.$refs.form.scrollIntoView({ behavior: 'smooth', block: 'center' }); this.$refs.corpo.focus(); });
        },
        cancelarResposta() { this.respondendoA = null; this.respondendoNome = ''; },
    }"
>{{-- O ESTADO DE RESPOSTA E O CONTADOR VIVEM NO ALPINE, QUE JA ESTA NO BUNDLE PRINCIPAL --}}

    <div class="flex flex-wrap items-baseline justify-between gap-3">{{-- CABECALHO DA SECAO --}}
        <h2 id="comments-heading" class="flex items-center gap-2 text-xl font-bold text-slate-900">{{-- H2 DA SECAO --}}
            {{-- ICONE DE BALAO DE CONVERSA (BOOTSTRAP ICONS: CHAT-SQUARE-TEXT) EM SVG INLINE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16" class="text-brand" aria-hidden="true"><path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/><path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/></svg>
            @if ($totalComentarios > 0)
                {{ $totalComentarios }} {{ Str::plural('comment', $totalComentarios) }}{{-- CONTAGEM REAL DE COMENTARIOS --}}
            @else
                Comments{{-- TITULO NEUTRO QUANDO AINDA NAO HA NENHUM --}}
            @endif
        </h2>
        <p class="text-xs text-slate-400">Reader comments are not checked against the manufacturer's claims above.</p>{{-- DEIXA CLARO O QUE E EDITORIAL E O QUE E OPINIAO DE LEITOR --}}
    </div>

    {{-- ─── AVISOS DE RESULTADO DO ENVIO ANTERIOR ─── --}}

    @if (session('comment_status') === 'approved'){{-- COMENTARIO PUBLICADO NA HORA --}}
        <div class="mt-5 flex items-start gap-2.5 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-800" role="status">
            {{-- ICONE DE CHECK EM CIRCULO (BOOTSTRAP ICONS: CHECK-CIRCLE-FILL) EM SVG INLINE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="mt-0.5 shrink-0" aria-hidden="true"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>
            <span>Thanks — your comment is live. Scroll up to see it.</span>{{-- MENSAGEM DE SUCESSO --}}
        </div>
    @elseif (session('comment_status') === 'pending'){{-- COMENTARIO FOI PARA A FILA DE MODERACAO --}}
        <div class="mt-5 flex items-start gap-2.5 rounded-xl border border-amber-200 bg-amber-50 p-4 text-sm text-amber-900" role="status">
            {{-- ICONE DE RELOGIO (BOOTSTRAP ICONS: CLOCK-FILL) EM SVG INLINE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="mt-0.5 shrink-0" aria-hidden="true"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/></svg>
            <span>Thanks — your comment has been received and will appear once it has been checked.</span>{{-- MENSAGEM DE PENDENTE --}}
        </div>
    @endif

    @if (session('comment_error')){{-- ERRO DE LIMITE DE FREQUENCIA OU FORMULARIO EXPIRADO --}}
        <div class="mt-5 flex items-start gap-2.5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800" role="alert">
            {{-- ICONE DE EXCLAMACAO (BOOTSTRAP ICONS: EXCLAMATION-CIRCLE-FILL) EM SVG INLINE --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="mt-0.5 shrink-0" aria-hidden="true"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/></svg>
            <span>{{ session('comment_error') }}</span>{{-- TEXTO DO ERRO --}}
        </div>
    @endif

    {{-- ─── LISTA DE COMENTARIOS (RENDERIZADA PELO SERVIDOR, INDEXAVEL) ─── --}}

    @if ($comments->isNotEmpty())
        <div class="mt-8 space-y-8">{{-- PILHA DE COMENTARIOS RAIZ --}}
            @foreach ($comments as $comment){{-- PERCORRE OS COMENTARIOS DE PRIMEIRO NIVEL --}}
                <x-comments.item :comment="$comment" />{{-- CADA COMENTARIO COM SUAS RESPOSTAS --}}
            @endforeach
        </div>
    @else
        <div class="mt-8 rounded-2xl border border-dashed border-slate-300 bg-white p-6 text-center">{{-- ESTADO VAZIO --}}
            <p class="text-sm font-semibold text-slate-700">No comments yet</p>{{-- TITULO DO ESTADO VAZIO --}}
            <p class="mt-1 text-sm text-slate-500">Be the first to add something we missed — a price change, a spec that turned out wrong, or how one of these held up.</p>{{-- CONVITE ESPECIFICO: PEDIDO VAGO ("deixe seu comentario") NAO GERA COMENTARIO --}}
        </div>
    @endif

    <x-comments.form :article="$article" :category="$category" :product="$product" :turnstile-site-key="$turnstileSiteKey" />{{-- FORMULARIO DE ENVIO --}}
</section>
