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

        // FOTO NO CDN. TROCAR ESTA LINHA TROCA A IMAGEM NA PAGINA DO AUTOR, NA CAIXA DE BIO DOS
        // 76 ARTIGOS E NO SCHEMA Person DE UMA VEZ SO — NAO HA COPIA DELA EM LUGAR NENHUM.
        'photo' => 'https://cdn.ranked10.co.uk/images/felipe-iglesias.webp', // FOTO SERVIDA PELO CDN (CLOUDFLARE R2)

        'location' => 'São Paulo, Brazil',  // DE ONDE ESCREVE — DECLARAR ISSO E MAIS HONESTO QUE OMITIR NUM SITE .co.uk
        'headline' => 'Computational engineering student who has been doing SEO since he was 16, and who reads product spec sheets for fun.', // FRASE DE ABERTURA DA PAGINA DO AUTOR

        // BIO CURTA: APARECE NA CAIXA DO AUTOR AO FIM DE CADA ARTIGO. UM PARAGRAFO, SEM ENROLACAO.
        'bio' => 'Felipe is a computational engineering student who has been working in SEO since he was sixteen. He founded ranked10 and researches every guide on the site.',

        // BIO LONGA: A PAGINA /author/felipe-iglesias. CURTA DE PROPOSITO.
        // ⚠ NAO DESCREVER O METODO AQUI — ELE JA TEM /how-we-rank E /about. PAGINA DE AUTOR QUE
        // EXPLICA METODOLOGIA AFOGA A UNICA COISA QUE SO ELA PODE DIZER: QUEM E A PESSOA.
        'bio_long' => [
            'Felipe Iglesias is 25, from São Paulo, and the person behind every guide on ranked10. He holds a BSc in Exact Sciences from the Federal University of Juiz de Fora (UFJF) and is currently studying Computational Engineering at the same university.',
            'He has been working in SEO since he was sixteen. ranked10 is his own project, built to see how far a buying guide gets when it answers questions with numbers instead of adjectives.',
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
