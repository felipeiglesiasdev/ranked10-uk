@props(['navCategories' => collect()]){{-- PROP: CATEGORIAS COM ARTIGOS (PARA OS LINKS DO FOOTER) --}}

@php
    // MONTA UMA LISTA DE "GUIAS POPULARES" JUNTANDO OS ARTIGOS DE TODAS AS CATEGORIAS (PARA O GRAFO DE LINKS)
    $popularArticles = $navCategories->flatMap->articles->sortByDesc('published_at')->take(6); // ATE 6 ARTIGOS MAIS RECENTES
@endphp

{{-- FOOTER UNICO E RESPONSIVO: COLUNAS NO DESKTOP, EMPILHADO NO MOBILE --}}
<footer class="mt-16 bg-ink text-slate-300" role="contentinfo">{{-- RODAPE ESCURO (PRETO DA MARCA) --}}
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-12">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">{{-- GRID QUE COLAPSA: 1 -> 2 -> 4 COLUNAS --}}

            {{-- COLUNA 1: MARCA + MISSAO + DISCLOSURE CURTO --}}
            <div class="sm:col-span-2 lg:col-span-1">{{-- OCUPA LARGURA TOTAL ATE O LG --}}
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2" aria-label="ranked10 — homepage">{{-- LOGO DO RODAPE --}}
                    {{-- ICONE DE TROFEU (BOOTSTRAP ICONS: TROPHY-FILL) EM SVG INLINE --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" class="text-brand" aria-hidden="true"><path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5q0 .807-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33 33 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935m10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935"/></svg>
                    <span class="text-lg font-extrabold text-white">ranked<span class="text-brand">10</span></span>{{-- NOME DO SITE --}}
                </a>
                <p class="mt-3 text-sm leading-relaxed text-slate-400">{{-- MISSAO DO SITE --}}
                    <span class="font-semibold text-slate-300">Our mission:</span> to rank the top 10 products in the UK based on price and customer ratings, so you can buy with confidence.
                </p>
                <p class="mt-3 text-xs leading-relaxed text-slate-500">{{-- DISCLOSURE CURTO DE AFILIADO --}}
                    ranked10 is an affiliate site and is financially rewarded through commissions on qualifying purchases.
                </p>
            </div>

            {{-- COLUNA 2: CATEGORIAS --}}
            <nav class="text-sm" aria-label="Footer categories">{{-- LINKS DAS CATEGORIAS (GRAFO DE LINKS) --}}
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Categories</p>{{-- TITULO DA COLUNA --}}
                <ul class="mt-3 space-y-2">{{-- LISTA DE CATEGORIAS --}}
                    @forelse ($navCategories as $navCategory){{-- PERCORRE AS CATEGORIAS --}}
                        <li>
                            <a href="{{ route('category', $navCategory) }}" class="text-slate-400 hover:text-white">{{ $navCategory->name }}</a>{{-- LINK DA CATEGORIA --}}
                        </li>
                    @empty
                        <li class="text-slate-500">Coming soon</li>{{-- MENSAGEM SE VAZIO --}}
                    @endforelse
                </ul>
            </nav>

            {{-- COLUNA 3: GUIAS POPULARES (TOP 10) --}}
            <nav class="text-sm" aria-label="Popular guides">{{-- LINKS DE ARTIGOS PARA FECHAR O GRAFO DE LINKS --}}
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Popular top 10 guides</p>{{-- TITULO DA COLUNA --}}
                <ul class="mt-3 space-y-2">{{-- LISTA DE ARTIGOS --}}
                    @forelse ($popularArticles as $popular){{-- PERCORRE OS ARTIGOS POPULARES --}}
                        <li>
                            <a href="{{ route('article', [$popular->category, $popular]) }}" class="text-slate-400 hover:text-white">{{ $popular->title }}</a>{{-- LINK DO ARTIGO --}}
                        </li>
                    @empty
                        <li class="text-slate-500">Guides coming soon</li>{{-- MENSAGEM SE VAZIO --}}
                    @endforelse
                </ul>
            </nav>

            {{-- COLUNA 4: LEGAL/INSTITUCIONAL --}}
            <nav class="text-sm" aria-label="Legal">{{-- LINKS LEGAIS --}}
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Company</p>{{-- TITULO DA COLUNA --}}
                <ul class="mt-3 space-y-2.5">{{-- LISTA DE LINKS LEGAIS --}}
                    <li>
                        <a href="{{ route('privacy') }}#about" class="inline-flex items-center gap-2 text-slate-400 hover:text-white">{{-- ABOUT COMO ANCORA NA POLITICA DE PRIVACIDADE --}}
                            {{-- ICONE INFO (BOOTSTRAP ICONS: INFO-CIRCLE) EM SVG INLINE --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-slate-500" aria-hidden="true"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/></svg>
                            About
                        </a>{{-- LINK SOBRE (ANCORA #about) --}}
                    </li>
                    <li>
                        <a href="{{ route('privacy') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-white">{{-- POLITICA DE PRIVACIDADE --}}
                            {{-- ICONE ESCUDO (BOOTSTRAP ICONS: SHIELD-LOCK) EM SVG INLINE --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-slate-500" aria-hidden="true"><path d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.262 10.36-.12 7.042.476 2.562A1.54 1.54 0 0 1 1.52 1.300C2.18 1.085 3.298.728 4.408.428z"/><path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"/></svg>
                            Privacy Policy
                        </a>{{-- LINK DE PRIVACIDADE --}}
                    </li>
                    <li>
                        <a href="{{ route('privacy') }}#affiliate" class="inline-flex items-center gap-2 text-slate-400 hover:text-white">{{-- DISCLOSURE DE AFILIADO COMO ANCORA --}}
                            {{-- ICONE TAG (BOOTSTRAP ICONS: TAG) EM SVG INLINE --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-slate-500" aria-hidden="true"><path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0M5 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/><path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1m0 5.586 7 7L13.586 9l-7-7H2z"/></svg>
                            Affiliate Disclosure
                        </a>{{-- LINK DA DIVULGACAO DE AFILIADOS (ANCORA #affiliate) --}}
                    </li>
                </ul>
            </nav>
        </div>

        <div class="mt-10 border-t border-slate-800 pt-6 space-y-2 text-xs leading-relaxed text-slate-500">{{-- RODAPE INFERIOR COM AVISOS LEGAIS --}}
            <p>As an Amazon Associate, ranked10 earns from qualifying purchases. We are an affiliate site and receive a commission when you buy through our links, at no extra cost to you. Prices and availability are accurate as of the date/time shown and are subject to change.</p>{{-- AVISO DE AFILIADO/COMISSAO --}}
            <p>Once you leave our domain via an outbound link, you are subject to the terms, privacy policy and pricing of that third-party website. ranked10 is not responsible for the content, products or transactions on external sites.</p>{{-- AVISO DE SAIDA DO DOMINIO --}}
            <p class="pt-1 text-slate-400">&copy; {{ date('Y') }} ranked10.co.uk — All rights reserved.</p>{{-- COPYRIGHT COM ANO DINAMICO --}}
        </div>
    </div>
</footer>
