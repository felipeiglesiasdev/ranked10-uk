<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 05/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// PAGINA DO #7 DE 10 NO ARTIGO "Best Smart Plug 2026". 1.048 AVALIACOES.
// SEGUNDO PRODUTO MEROSS DO RANKING (MSS315 MATTER), DIFERENTE DO MSS305 (#3).
//
// ─── ACHADO 1: A PIOR DISTRIBUICAO DA PAGINA — E A PAGINA MOSTRA ───
//   68% cinco / 15% quatro / 5% tres / 3% duas / **9% UMA ESTRELA**.
//   9% DE UMA ESTRELA E O MAIOR INDICE DE UMA ESTRELA DE TODO O RANKING (A TAPO TEM 2-3%),
//   E A MEDIA DE 4.3 E A SEGUNDA MAIS BAIXA DA PAGINA. SETUP MATTER E MAIS CHATO E OS
//   COMPRADORES REFLETEM ISSO. AS BARRAS DE DISTRIBUICAO CARREGAM O SINAL; AS CITACOES
//   SEGUEM POSITIVAS (DECISAO DO FELIPE), MAS O 9% CONTINUA VISIVEL NA PAGINA.
//
// ─── ACHADO 2: A FICHA ELETRICA MAIS LIMPA DA PAGINA ───
//   "Voltage: 230 Volts (AC)" + "Amperage: 13 Amps" → 13 × 230 = 2.990 W, TENSAO CERTA.
//   "Number of Poles: 3" + "Number Of Wires: 3" — AMBOS CORRETOS PARA PLUGUE BRITANICO
//   (CONTRASTE COM OS "4 fios" DO EIGHTREE ET32 EM #6). E PUBLICA DIMENSAO REAL
//   (61 × 48 × 33 mm). O UNICO LIXO ELETRICO E "Plug Type: wall plug", QUE NAO E UM TIPO.
//
// ─── ACHADO 3: A UNICA QUE DIZ, ANTES DA COMPRA, EXATAMENTE O QUE VOCE PRECISA ───
//   DOIS DOS CINCO BULLETS SAO REQUISITOS: iOS/iPadOS 16.1+, 2.4 GHz E UM HUB (Apple TV
//   4K 2a/3a ger. OU HomePod Mini) PARA APPLE; Android 8.1+, 2.4 GHz E UM HUB (SmartThings
//   v3, Echo 4a ger., Nest Hub 2a ger. etc.) PARA ANDROID. MATTER **EXIGE HUB** E QUASE
//   NINGUEM AVISA; ESTA NOMEIA OS MODELOS. HONESTIDADE VALE COMO PONTO POSITIVO.
//
// ─── ACHADO 4: CONTRADICAO DE QUANTIDADE, DE NOVO ───
//   "Unit Count: 1.0 count" NUM PACOTE DE QUATRO, ENQUANTO "Number of Items: 4" E
//   "Included Components: Matter Smart Plug x 4, User Manual x 1" CONCORDAM QUE SAO QUATRO.
//   MESMO PADRAO DAS OUTRAS FICHAS: UM CAMPO DE QUANTIDADE DISCORDA DOS DEMAIS.
//
// ─── PRECO POR TOMADA ───
//   £49.99 / 4 = **£12.50 POR TOMADA** — O MAIS CARO DA PAGINA. MATTER SE PAGA EM
//   DURABILIDADE (INDEPENDENTE DA NUVEM DO FABRICANTE), NAO EM PRECO.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE**, COM AUTOR, DATA, NOTA E SELO DE COMPRA
//   VERIFICADA CONFERIDO NA FICHA. AS DUAS SAO POSITIVAS (DECISAO DO FELIPE).
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-smart-plug',
    'asin' => 'B0CNVHBCR3',
    'slug' => 'meross-mss315-smart-plug',

    'meta_title' => 'Meross MSS315 Matter Smart Plug Review: Specs and Ratings',
    'meta_description' => 'Everything the Amazon listing publishes about the Meross MSS315 Matter four-pack: price per socket, the spec table, the ratings, and what buyers say.',

    'page_intro' => "The Meross MSS315 is a Matter smart plug sold here as a four-pack, and it takes seventh place in our smart plug ranking. At GBP 49.99 for four it is GBP 12.50 a socket, the dearest plug on this page, roughly half as much again as the EIGHTREE at GBP 8.75. What you pay for is Matter: it talks to Apple Home, Google Home, Alexa and SmartThings through one open standard rather than a manufacturer's cloud, so it keeps working if Meross changes its app, and it runs locally rather than through a server abroad. For a device left in a wall for a decade, that is a form of insurance the cheaper Wi-Fi plugs do not offer.\n\nTwo things are worth knowing before you buy, and this listing is unusually honest about the first. Two of its five bullets are spent naming exactly what you need: for Apple, iOS 16.1 or later, a 2.4GHz connection and a hub such as an Apple TV 4K or a HomePod Mini; for Android, a SmartThings, Echo or Nest hub. Matter plugs need a hub and most listings barely mention it. The second is the ratings: at 4.3 stars this is the second-lowest average on the page, and its breakdown carries the highest one-star share in the ranking at nine per cent, where the Tapo plugs sit at two or three. Matter setups are fiddlier and the reviews reflect it. Its electrical spec, by contrast, is among the cleanest here: 230 volts, 13 amps, three poles and three wires, all correct for a British plug.",

    'harvested_at' => '2026-09-05 13:00:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 68, 4 => 15, 3 => 5, 2 => 3, 1 => 9],

    // FICHA COPIADA DA TABELA. OS CAMPOS DE LIXO FICAM ROTULADOS "(as listed)",
    // PORQUE ELES **SAO** O ACHADO — NAO SE CORRIGE EM SILENCIO.
    'tech_specs' => [
        'Amperage|13 Amps',
        'Voltage|230 Volts (AC)',
        'Plug type (as listed)|wall plug',
        'Number of poles|3',
        'Number of wires|3',
        'Connector type|Plug In',
        'Item dimensions (D x W x H)|61 x 48 x 33 millimetres',
        'Item weight|350 g',
        'Material|Polycarbonate (PC)',
        'Product grade|Residential',
        'Number of items|4',
        'Unit count (as listed)|1.0 count',
        'Included components|Matter Smart Plug x 4, User Manual x 1',
        'Colour|White',
        'Product warranty|2 year manufacturer',
        'Specification met (as listed)|CE',
        'Model number|MSS315',
        'Country of origin|China',
        'ASIN|B0CNVHBCR3',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    'faq' => [
        'Why is the MSS315 rated lower than the other plugs here?|Its average is 4.3 stars, the second-lowest on the page, and its breakdown has the highest one-star share in the ranking at nine per cent, against two or three for the Tapo plugs. Matter plugs need a hub and a specific setup, which is fiddlier than a plain Wi-Fi plug, and the reviews reflect that. The plugs that just join Wi-Fi rate higher because they ask less of the buyer.',
        'What do I need to make it work?|The listing spells it out, which is rare. For Apple: iOS or iPadOS 16.1 or later, a 2.4GHz connection, and a hub such as an Apple TV 4K (2nd or 3rd generation) or a HomePod Mini. For Android: 8.1 or later, 2.4GHz, and a hub such as a SmartThings v3, an Echo (4th generation) or a Nest Hub (2nd generation). Without a hub, a Matter plug will not set up.',
        'What does Matter actually get me?|It lets the plug work with Apple Home, Google Home, Alexa and SmartThings through one open standard instead of the maker\'s own cloud, so it keeps working if Meross changes its app, and it runs locally rather than through a remote server. For something you leave in a wall for years, that independence is the point.',
        'How many watts can it take?|The table gives 13 amps at 230 volts, which is 2,990 watts, and 230 volts is Britain\'s real nominal figure. It is one of the cleaner electrical listings here: three poles and three wires, both correct for a British plug. A 3kW kettle or heater still sits at the 13-amp limit.',
        'How many plugs do you get?|Four. The components line reads "Matter Smart Plug x 4" and "Number of Items" reads 4. One field disagrees, as on the other listings here: "Unit Count" reads 1.0.',
        'Does it monitor energy use?|Yes. Meross states it has an internal power meter and the app shows real-time usage. As with every plug in this ranking, it does not publish an accuracy figure for that meter, so treat the readings as a guide.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => "Very easy to setup with HomeKit, shows current energy usage, and works as intended.",
            'author' => 'FossilizedCarlos',
            'rating' => 5,
            'date' => '10 July 2026',
            'title' => 'Works well with HomeKit',
            'verified' => true,
        ],
        [
            'text' => "Setup was very easy and connected quickly with Google Home.",
            'author' => 'Manoj Jangid',
            'rating' => 5,
            'date' => '9 April 2026',
            'title' => 'Good smart plug, works as expected',
            'verified' => true,
        ],
    ],
];
