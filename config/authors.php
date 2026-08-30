<?php

// ═══════════════════════════════════════════════════════════════════════════
// ═══ PERFIS DOS AUTORES DO SITE (EDITE AQUI) ═══
//
// O CAMPO 'name' DEVE BATER EXATAMENTE COM O 'author' GRAVADO NO ARTIGO (TABELA articles).
// O 'slug' VIRA A URL DA PAGINA DO AUTOR: /author/<slug>.
//
// ⚠ FOTO: O CAMPO 'photo' ACEITA AS DUAS FORMAS —
//     URL COMPLETA .. 'https://cdn.ranked10.co.uk/authors/felipe.jpg'  (PREFERIDA: SAI PELO CDN)
//     CAMINHO LOCAL  .. 'images/authors/felipe-iglesias.jpg'           (ARQUIVO DENTRO DE public/)
//   SE O CAMPO ESTIVER VAZIO, OU SE O ARQUIVO LOCAL NAO EXISTIR, O SITE DESENHA AUTOMATICAMENTE
//   UM AVATAR COM AS INICIAIS. NADA QUEBRA POR FALTA DE FOTO.
//
// POR QUE ESTE ARQUIVO FICOU GRANDE: E-E-A-T (EXPERIENCE, EXPERTISE, AUTHORITATIVENESS,
// TRUSTWORTHINESS) E O QUE SEPARA UM SITE DE AFILIADO DE UM SITE QUE O GOOGLE TRATA COMO FONTE.
// CADA CAMPO ABAIXO ALIMENTA AO MESMO TEMPO A PAGINA /author/<slug> E O SCHEMA Person, QUE E
// COMO O GOOGLE LIGA O CONTEUDO A UMA PESSOA REAL E VERIFICAVEL.
// ═══════════════════════════════════════════════════════════════════════════

return [

    [
        'name' => 'Felipe Iglesias',        // NOME EXIBIDO (DEVE BATER COM article->author)
        'slug' => 'felipe-iglesias',        // SLUG DA PAGINA DO AUTOR → /author/felipe-iglesias
        'role' => 'Founder & Lead Reviewer', // CARGO EXIBIDO ABAIXO DO NOME

        // ⚠ COLE AQUI O LINK DA FOTO NO CDN QUANDO SUBIR (ex.: https://cdn.ranked10.co.uk/authors/felipe-iglesias.jpg)
        'photo' => '',                      // VAZIO = AVATAR COM AS INICIAIS (NAO QUEBRA NADA)

        'location' => 'São Paulo, Brazil',  // DE ONDE ESCREVE — DECLARAR ISSO E MAIS HONESTO QUE OMITIR NUM SITE .co.uk
        'headline' => 'Computational engineering student who has been doing SEO since he was 16, and who reads product spec sheets for fun.', // FRASE DE ABERTURA DA PAGINA DO AUTOR

        // BIO CURTA: APARECE NA CAIXA DO AUTOR AO FIM DE CADA ARTIGO. UM PARAGRAFO, SEM ENROLACAO.
        'bio' => 'Felipe founded ranked10 and researches every guide on the site. He compares manufacturer spec sheets against the claims in the same listing, and publishes the contradictions he finds — the wattage that the battery cannot supply, the weight printed twice at different values, the lux figure with no distance attached.',

        // BIO LONGA: UM PARAGRAFO POR ITEM, RENDERIZADO NA PAGINA /author/felipe-iglesias.
        'bio_long' => [
            'Felipe Iglesias is the founder of ranked10 and the person behind all 76 buying guides on the site. He holds a BSc in Exact Sciences from the Federal University of Juiz de Fora (UFJF), one of Brazil\'s federal public universities, and is currently reading for a degree in Computational Engineering at the same institution.',
            'He has worked on search engine optimisation since he was sixteen — nine years of watching what actually ranks and what quietly does not. ranked10 came out of a specific observation from that work: the buying guides that rank and hold their position are the ones that answer a factual question with a checkable number, not the ones that describe how a product feels to use.',
            'That is why every guide here is built the same way. Products are collected from the UK Amazon storefront with delivery set to a real British postcode, so prices and availability match what a UK reader sees. Each listing is read twice — once in the specification table, once in the "About this item" bullets — because the contradictions almost always sit between the two. A mini chainsaw advertising 1000 watts on a battery that holds 84 watt-hours; a vibration plate whose "maximum speed in RPM" is really the number of levels on its remote control; a garden storage box whose published internal dimensions work out at 305 litres under an 870-litre label. Those findings are the point of the site.',
            'The engineering background is the reason the method is arithmetic rather than opinion. Watt-hours divided by run time gives real draw. Lux falls with the square of distance. A 13-amp UK plug caps at about 3,000 watts no matter what the box says. None of that requires owning the product — it requires reading what the seller published and doing the multiplication.',
            'Outside of ranked10 he lifts weights and watches Formula 1, which is its own exercise in reading numbers that manufacturers would rather present differently.',
        ],

        // FORMACAO: ALIMENTA O CAMPO alumniOf DO SCHEMA Person E O BLOCO DE CREDENCIAIS DA PAGINA.
        'education' => [
            ['degree' => 'BSc in Exact Sciences', 'school' => 'Federal University of Juiz de Fora (UFJF)', 'note' => 'Interdisciplinary degree covering mathematics, physics, chemistry and computing'],
            ['degree' => 'BEng in Computational Engineering (in progress)', 'school' => 'Federal University of Juiz de Fora (UFJF)', 'note' => 'Numerical methods, modelling and scientific computing'],
        ],

        // AREAS DE CONHECIMENTO: ALIMENTA O knowsAbout DO SCHEMA Person.
        'knows_about' => [
            'Search engine optimisation',
            'Product specification analysis',
            'Consumer electronics',
            'Home appliances',
            'Computational engineering',
            'Technical data analysis',
        ],

        'seo_since' => 2017,  // ANO EM QUE COMECOU COM SEO (AOS 16). A PAGINA CALCULA OS ANOS SOZINHA
        'founded' => 2026,    // ANO DE FUNDACAO DO ranked10

        // INTERESSES PESSOAIS: PARECE SUPERFLUO, MAS NAO E. PAGINA DE AUTOR SEM NADA HUMANO LE-SE
        // COMO PERFIL GERADO, QUE E EXATAMENTE O SINAL QUE ESTAMOS TENTANDO NAO EMITIR.
        'interests' => ['Strength training', 'Formula 1', 'Personal side projects'],

        'socials' => [                                                    // LINKS SOCIAIS (DEIXE '' PARA OCULTAR CADA UM)
            'website' => '',                                              // SITE PESSOAL
            'twitter' => '',                                              // PERFIL NO X/TWITTER (URL COMPLETA)
            'instagram' => '',                                            // PERFIL NO INSTAGRAM (URL COMPLETA)
            'linkedin' => 'https://www.linkedin.com/in/felipe-iglesias/', // ⚠ O MAIS IMPORTANTE: E O sameAs QUE LIGA O AUTOR A UMA IDENTIDADE VERIFICAVEL
        ],
    ],

];
