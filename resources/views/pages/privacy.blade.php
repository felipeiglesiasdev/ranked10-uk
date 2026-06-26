@extends('layouts.app'){{-- USA O LAYOUT MESTRE UNICO --}}

@push('seo'){{-- INJETA AS META TAGS DE SEO NO HEAD DO LAYOUT --}}
    <title>Privacy Policy & Affiliate Disclosure | ranked10</title>{{-- TITULO DA PAGINA --}}
    <meta name="description" content="How ranked10 handles your data, our affiliate disclosure, and our responsibility for external links. We rank the top 10 UK products by price and ratings.">{{-- META DESCRIPTION --}}
    <link rel="canonical" href="{{ route('privacy') }}">{{-- URL CANONICA --}}
    <meta property="og:type" content="website">{{-- TIPO OPEN GRAPH --}}
    <meta property="og:title" content="Privacy Policy & Affiliate Disclosure | ranked10">{{-- TITULO OPEN GRAPH --}}
    <meta property="og:description" content="Our privacy practices, affiliate disclosure and external-link policy.">{{-- DESCRICAO OPEN GRAPH --}}
    <meta property="og:url" content="{{ route('privacy') }}">{{-- URL OPEN GRAPH --}}
    <meta property="og:site_name" content="ranked10">{{-- NOME DO SITE OPEN GRAPH --}}
@endpush

@section('content'){{-- INICIO DO CONTEUDO DA PAGINA --}}

    <div class="mx-auto max-w-6xl px-5 sm:px-6 lg:px-8 py-12">{{-- CONTAINER COM O MESMO GUTTER DO HEADER/FOOTER --}}
        <div class="max-w-3xl">{{-- COLUNA DE LEITURA ALINHADA A ESQUERDA --}}

            <x-utils.breadcrumbs :items="[['label' => 'Privacy Policy']]" />{{-- TRILHA: HOME (ICONE+TEXTO) > PRIVACY POLICY --}}

            <h1 class="mt-4 text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">Privacy Policy &amp; Disclosures</h1>{{-- H1 DA PAGINA --}}
            <p class="mt-2 text-sm text-slate-500">Last updated: 25 June 2026</p>{{-- DATA DA ULTIMA ATUALIZACAO --}}

            <div class="mt-8 space-y-10 leading-relaxed text-slate-600">{{-- CORPO DA POLITICA --}}

                {{-- SECAO: SOBRE (ANCORA #about) --}}
                <section id="about" class="scroll-mt-24">{{-- scroll-mt EVITA QUE O HEADER FIXO CUBRA O TITULO AO ANCORAR --}}
                    <h2 class="text-xl font-bold text-slate-900">About ranked10</h2>{{-- TITULO DA SECAO --}}
                    <p class="mt-3">ranked10 is an independent buying-guide site for the United Kingdom. <strong>Our mission is to rank the top 10 products in the UK based on price and customer ratings</strong>, turning hours of research into clear, honest top 10 lists so you can buy with confidence.</p>{{-- MISSAO DO SITE --}}
                    <p class="mt-3">Our rankings are based on publicly available information such as pricing, specifications and aggregated customer reviews. We are not the seller of any product featured on this site — all purchases are completed on third-party retailers such as Amazon.</p>{{-- COMO RANQUEAMOS --}}
                </section>

                {{-- SECAO: DISCLOSURE DE AFILIADO (ANCORA #affiliate) --}}
                <section id="affiliate" class="scroll-mt-24">
                    <h2 class="text-xl font-bold text-slate-900">Affiliate Disclosure</h2>{{-- TITULO DA SECAO --}}
                    <p class="mt-3"><strong>ranked10 is an affiliate site, and we are financially rewarded for the recommendations we make.</strong> As an Amazon Associate, and through other affiliate programmes, we earn a commission when you click an outbound link and make a qualifying purchase — <strong>at no extra cost to you</strong>.</p>{{-- SOMOS AFILIADOS E SOMOS RECOMPENSADOS --}}
                    <p class="mt-3">This commission helps fund the research and running of the site. Being commissioned does not change the price you pay, and we aim to keep our rankings driven by price and ratings rather than by commission rates.</p>{{-- COMISSAO NAO MUDA O PRECO --}}
                    <p class="mt-3">Prices and availability shown on ranked10 are accurate as of the date and time indicated and are subject to change. Always check the final price on the retailer's website before purchasing.</p>{{-- PRECOS PODEM MUDAR --}}
                </section>

                {{-- SECAO: LINKS EXTERNOS E RESPONSABILIDADE --}}
                <section id="external-links" class="scroll-mt-24">
                    <h2 class="text-xl font-bold text-slate-900">External links &amp; responsibility</h2>{{-- TITULO DA SECAO --}}
                    <p class="mt-3"><strong>Once you leave our domain through an outbound link, you are subject to the terms, privacy policy and pricing of that third-party website.</strong> ranked10 is not responsible for the content, products, services, prices or transactions on external sites, and we do not control how those sites handle your data.</p>{{-- SAIU DO DOMINIO, NAO SOMOS RESPONSAVEIS --}}
                    <p class="mt-3">We encourage you to read the privacy policy and terms of any website you visit through our links before sharing personal information or completing a purchase.</p>{{-- RECOMENDACAO --}}
                </section>

                {{-- SECAO: COOKIES E ANALYTICS --}}
                <section id="cookies" class="scroll-mt-24">
                    <h2 class="text-xl font-bold text-slate-900">Cookies &amp; analytics</h2>{{-- TITULO DA SECAO --}}
                    <p class="mt-3">We may use cookies and privacy-friendly analytics to understand how visitors use the site and to improve our content. Affiliate partners may also set cookies to attribute qualifying purchases. You can control or disable cookies through your browser settings at any time.</p>{{-- COOKIES --}}
                </section>

                {{-- SECAO: DADOS QUE COLETAMOS --}}
                <section id="data" class="scroll-mt-24">
                    <h2 class="text-xl font-bold text-slate-900">Information we collect</h2>{{-- TITULO DA SECAO --}}
                    <p class="mt-3">ranked10 is a content site and does not require you to create an account or submit personal details to read our guides. Any data collected is limited to standard, aggregated analytics (such as pages viewed and general location) and is used only to improve the site.</p>{{-- DADOS --}}
                </section>

                {{-- SECAO: ALTERACOES --}}
                <section id="changes" class="scroll-mt-24">
                    <h2 class="text-xl font-bold text-slate-900">Changes to this policy</h2>{{-- TITULO DA SECAO --}}
                    <p class="mt-3">We may update this policy from time to time to reflect changes in our practices or for legal reasons. Any changes will be posted on this page with an updated "last updated" date.</p>{{-- ALTERACOES --}}
                </section>

            </div>
        </div>
    </div>

@endsection{{-- FIM DO CONTEUDO DA PAGINA --}}
