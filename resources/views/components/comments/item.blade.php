@props(['comment', 'isReply' => false]){{-- PROPS: O COMENTARIO E SE ELE E UMA RESPOSTA (MUDA SO O RECUO E O TAMANHO DO AVATAR) --}}

{{-- UM COMENTARIO. RENDERIZADO NO SERVIDOR DE PROPOSITO: ASSIM O TEXTO ESTA NO HTML QUE O
     GOOGLE BAIXA, VIRA CONTEUDO INDEXAVEL DA PAGINA E SINAL DE FRESCOR. WIDGET DE TERCEIRO
     (DISQUS E AFINS) ENTREGA ISSO DENTRO DE UM IFRAME, QUE NAO CONTA PARA NADA DISSO. --}}
<article
    id="comment-{{ $comment->id }}"
    class="scroll-mt-28 {{ $isReply ? 'mt-4 border-l-2 border-slate-200 pl-4 sm:pl-5' : '' }}"
    itemprop="comment" itemscope itemtype="https://schema.org/Comment"
>{{-- MICRODADOS DE Comment: LIGA O COMENTARIO AO BlogPosting DECLARADO NO JSON-LD DO ARTIGO --}}

    <div class="flex items-start gap-3">{{-- LINHA: AVATAR + CONTEUDO --}}

        {{-- AVATAR COM AS INICIAIS. NAO USA GRAVATAR DE PROPOSITO: SERIA UMA REQUISICAO EXTERNA
             POR COMENTARIO, MAIS UM VAZAMENTO DO HASH DO EMAIL DO LEITOR PARA OUTRO SERVIDOR. --}}
        <div class="flex {{ $isReply ? 'h-8 w-8 text-xs' : 'h-10 w-10 text-sm' }} shrink-0 items-center justify-center rounded-full {{ $comment->cor_do_avatar }} font-bold text-white" aria-hidden="true">
            {{ $comment->iniciais }}{{-- ATE DUAS INICIAIS DO NOME --}}
        </div>

        <div class="min-w-0 flex-1">{{-- COLUNA DO CONTEUDO; min-w-0 IMPEDE QUE UMA URL LONGA ESTIQUE A PAGINA NO MOBILE --}}

            <div class="flex flex-wrap items-center gap-x-2 gap-y-1">{{-- CABECALHO: NOME + DATA --}}
                <span class="text-sm font-bold text-slate-900" itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <span itemprop="name">{{ $comment->author_name }}</span>{{-- NOME DO AUTOR (ESCAPADO PELO BLADE) --}}
                </span>
                <span class="text-slate-300" aria-hidden="true">·</span>{{-- SEPARADOR VISUAL --}}
                <time datetime="{{ $comment->created_at->toAtomString() }}" itemprop="dateCreated" class="text-xs text-slate-500">{{ $comment->created_at->diffForHumans() }}</time>{{-- DATA LEGIVEL COM O VALOR EXATO NO ATRIBUTO --}}
            </div>

            {{-- CORPO DO COMENTARIO.
                 ⚠ O {!! !!} AQUI E SEGURO E INTENCIONAL: O HTML VEM DO ACCESSOR body_html DO MODEL,
                 QUE ESCAPA TODO O TEXTO ANTES DE MONTAR AS UNICAS TAGS PERMITIDAS (<p>, <br>, <a>).
                 OS LINKS SAEM DE LA JA COM rel="ugc nofollow noopener". NUNCA IMPRIMA $comment->body CRU. --}}
            <div class="mt-1.5 space-y-2 text-sm leading-relaxed text-slate-600 [&_p]:break-words" itemprop="text">{!! $comment->body_html !!}</div>

            @unless ($isReply){{-- SO COMENTARIO RAIZ RECEBE BOTAO DE RESPONDER: A ARVORE E ACHATADA EM UM NIVEL --}}
                <button
                    type="button"
                    @click="responderA({{ $comment->id }}, @js($comment->author_name))"
                    class="mt-2 inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 transition hover:text-brand"
                >{{-- ABRE O FORMULARIO JA APONTANDO PARA ESTE COMENTARIO --}}
                    {{-- ICONE DE RESPONDER (BOOTSTRAP ICONS: REPLY) EM SVG INLINE --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true"><path d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.7 8.7 0 0 0-1.921-.306 7 7 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254l-.042-.028a.147.147 0 0 1 0-.252l.042-.028zM7.8 10.386q.103 0 .223.006c.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96z"/></svg>
                    Reply
                </button>
            @endunless

            @if (! $isReply && $comment->relationLoaded('replies') && $comment->replies->isNotEmpty()){{-- RESPOSTAS DESTE COMENTARIO --}}
                <div class="mt-3">{{-- BLOCO DAS RESPOSTAS --}}
                    @foreach ($comment->replies as $reply){{-- PERCORRE AS RESPOSTAS APROVADAS, DA MAIS ANTIGA PARA A MAIS NOVA --}}
                        <x-comments.item :comment="$reply" :is-reply="true" />{{-- MESMO COMPONENTE, EM MODO RESPOSTA --}}
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</article>
