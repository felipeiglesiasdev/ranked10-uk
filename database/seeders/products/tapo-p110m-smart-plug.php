<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 05/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// PAGINA DO #10 DE 10 NO ARTIGO "Best Smart Plug 2026". 165 AVALIACOES.
// FECHA A SERIE DE 10 PAGINAS DE PRODUTO DO RANKING DE TOMADAS.
//
// ─── ACHADO 1: A MELHOR NOTA DA PAGINA, NA MENOR AMOSTRA — E COM UMA RESSALVA GRANDE ───
//   4.7 ESTRELAS, 85% CINCO ESTRELAS (O MAIOR % DE CINCO DA PAGINA), MAS SO **165**
//   AVALIACOES — A AMOSTRA MAIS RASA DO RANKING (O P110 TEM DEZENAS DE MILHARES).
//   NOTA ALTA EM POUCA EVIDENCIA E NOTA ALTA COM ASTERISCO. ISSO ABRE A INTRO.
//
// ─── ACHADO 2 (O DECISIVO): A MEDICAO POR MATTER SO FUNCIONA EM DOIS DOS QUATRO ECOSSISTEMAS ───
//   BULLET LITERAL: "currently works with SmartThings and Home Assistant only" E
//   "There are no third-party HUB support Matter energy monitoring by now on Tapo P110M".
//   OU SEJA: A MEDICAO DE ENERGIA — QUE E A PREMISSA DO PRODUTO — **NAO** APARECE VIA
//   MATTER NO APPLE HOME NEM NO GOOGLE HOME, DOIS DOS QUATRO DONOS DO PADRAO MATTER.
//   O "Item Highlight" AINDA DIZ "Works with Alexa, Google & Apple Home, No Hub Required",
//   ENTAO A FICHA SE CONTRADIZ: O RESUMO PROMETE OS QUATRO, O BULLET ENTREGA DOIS.
//   TP-LINK MERECE CREDITO POR DIZER ISSO NA PAGINA, NAO SO NUM artigo de suporte.
//
// ─── ACHADO 3: A TERCEIRA TENSAO DA TP-LINK ───
//   "Voltage: 240 Volts" + "Amperage: 13 Amps" → 3.120 W (base 240 V).
//   O P110 (nao-Matter, mesma marca) DECLARA **220 V**; O TP11, 240 V; ESTE P110M, 240 V.
//   A SUCESSORA MATTER DO P110 USA TENSAO DIFERENTE DO PROPRIO P110. TRES ANUNCIOS
//   TP-LINK, DUAS TENSOES. NENHUMA E 230 V, QUE E A REAL.
//
// ─── ACHADO 4: A FICHA ELETRICA E LIMPA (AO CONTRARIO DO P110) ───
//   "Number Of Wires: 3" (CERTO) E "Plug Type: Type G" (CERTO). O P110 ERRAVA COM
//   "Connector Type: Schuko"; ESTE ACERTA. E PUBLICA DIMENSAO REAL (52 × 37 × 73 mm).
//   ⚠ QUANTIDADE, DE NOVO: "Number of Items: 1" E "Unit Count: 1.0" NUM PACOTE DE QUATRO,
//   ENQUANTO "Number of Packs: 4" E O MODELO "Tapo P110M(4-pack)" DIZEM QUATRO.
//
// ─── PRECO POR TOMADA ───
//   £38.99 / 4 = **£9.75 POR TOMADA** — MAIS CARO QUE O P110 (£7.99) E ENTREGANDO MENOS
//   NAS PLATAFORMAS QUE A MAIORIA USA. LUGAR INCOMUM PRA UM MODELO MAIS NOVO CAIR.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE**, COM AUTOR, DATA, NOTA E SELO DE COMPRA
//   VERIFICADA CONFERIDO NA FICHA. AS DUAS SAO POSITIVAS (DECISAO DO FELIPE).
//   A BARRA DE 1 ESTRELA (3%) CONTINUA VISIVEL NA DISTRIBUICAO.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-smart-plug',
    'asin' => 'B0DQL38QCY',
    'slug' => 'tapo-p110m-smart-plug',

    'meta_title' => 'Tapo P110M Matter Smart Plug Review: Specs and Ratings',
    'meta_description' => 'Everything the Amazon listing publishes about the Tapo P110M Matter four-pack: price per socket, the spec table, the ratings, and what buyers say.',

    'page_intro' => "The Tapo P110M is TP-Link's Matter version of the P110, sold here as a four-pack, and it takes tenth place in our smart plug ranking. At GBP 38.99 for four it is GBP 9.75 a socket, more than the standard P110 at GBP 7.99, and it carries the highest average on the page at 4.7 stars, with 85 per cent of reviews at five. That average sits on the thinnest evidence here, though: just 165 ratings, where the P110 has tens of thousands, so read the score as promising rather than proven.\n\nThe reason it finishes last is one candid line in its own first bullet. Its Matter energy monitoring, which is the whole point of paying the premium, \"currently works with SmartThings and Home Assistant only\". Apple Home and Google Home, two of the four platforms that jointly govern the Matter standard, do not show its energy data over Matter, even though the listing's own highlight promises it works with all of them. If you run Home Assistant or SmartThings this is arguably the best plug on the page and the ranking should be reversed for you; if you run Apple Home or Google Home, the ordinary P110 costs less and does more. Its electrical spec, at least, is cleaner than the P110's: three wires and a Type G plug, both correct, where the P110's table wrongly says Schuko. It declares 240 volts, which is TP-Link's third voltage figure across three listings, since the P110 says 220 and the TP11 says 240; none of the three is the 230 volts Britain actually runs.",

    'harvested_at' => '2026-09-05 14:30:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 85, 4 => 9, 3 => 1, 2 => 2, 1 => 3],

    // FICHA COPIADA DA TABELA. OS CAMPOS DE LIXO FICAM ROTULADOS "(as listed)",
    // PORQUE ELES **SAO** O ACHADO — NAO SE CORRIGE EM SILENCIO.
    'tech_specs' => [
        'Amperage|13 Amps',
        'Voltage (as listed)|240 Volts',
        'Plug type|Type G',
        'Number of wires|3',
        'Connector type|Plug In',
        'Item dimensions (D x W x H)|52 x 37 x 73 millimetres',
        'Item weight|440 g',
        'Material|Plastic',
        'Product grade|Residential',
        'Matter energy monitoring (as listed)|SmartThings and Home Assistant only',
        'Number of packs|4',
        'Number of items (as listed)|1',
        'Unit count (as listed)|1.0 count',
        'Included components (as listed)|Mini Smart Wi-Fi Plug Tapo P110M',
        'Colour|White',
        'Product warranty|1 Year Manufacturer',
        'Specification met (as listed)|CE',
        'Brand|Tapo',
        'Manufacturer|TP-Link',
        'Model number|Tapo P110M(4-pack)',
        'Country of origin|China',
        'ASIN|B0DQL38QCY',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    'faq' => [
        'Does the Tapo P110M show energy use in Apple Home?|Not over Matter. The listing states its Matter energy monitoring "currently works with SmartThings and Home Assistant only", so Apple Home and Google Home do not display its consumption data through Matter, despite the highlight saying it works with all of them. You would use TP-Link\'s own Tapo app for the readings instead.',
        'Is it better than the standard P110?|It depends on your setup. If you run Home Assistant or SmartThings, its Matter monitoring works and it is arguably the best plug on this page. If you run Apple Home or Google Home, the ordinary P110 costs less per socket and delivers the energy data the P110M withholds over Matter, so buy that instead.',
        'Why does it have such a high rating?|It averages 4.7 stars with 85 per cent of reviews at five, the highest share on the page. The catch is the sample: only 165 ratings, against tens of thousands for the P110, so the score is encouraging but not yet well proven. The one-star share is three per cent.',
        'How many watts can it take?|The table gives 13 amps at 240 volts, which is 3,120 watts, though 240 volts is the pre-1995 figure; at Britain\'s real 230 volts, 13 amps is 2,990 watts. Either way 13 amps is the ceiling, set by the fuse, and a 3kW appliance sits at it.',
        'How many plugs do you get?|Four. The model name is "Tapo P110M(4-pack)" and "Number of Packs" reads 4. Two other fields disagree on the same table, as on the other listings here: "Number of Items" and "Unit Count" both read 1.',
        'Is its spec sheet accurate?|More than the P110\'s. It gives three wires and a Type G plug, both correct for a British plug, where the P110\'s table wrongly lists a Schuko connector. It also publishes real dimensions, 52 x 37 x 73mm. The voltage, 240, is the pre-1995 nominal rather than today\'s 230.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => "Great item, easy to set up and working well with home assistant and the matter integration (in addition to the tapo integration)",
            'author' => 'Andy',
            'rating' => 5,
            'date' => '23 April 2026',
            'title' => 'Matter works flawlessly, limited entities though.',
            'verified' => true,
        ],
        [
            'text' => "Not the easiest to set up, but have been completely reliable and trouble free.",
            'author' => 'bjtallguy',
            'rating' => 5,
            'date' => '24 March 2026',
            'title' => 'Reliable and accurate',
            'verified' => true,
        ],
    ],
];
