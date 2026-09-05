<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// SEGUNDO PRODUTO A GANHAR PAGINA. #6 DE 10 NO ARTIGO "BEST JUMP STARTER 2026".
// PRECO GBP 129.99 / NOTA 4.6 / 5.820 AVALIACOES.
//
// ─── ACHADO 1: A MESMA FICHA PUBLICA DUAS CAPACIDADES DE BATERIA ───
//   TABELA DE ESPECIFICACAO: "Battery Capacity: 6000 Milliamp Hours".
//   CAMPO "Item Highlight", NA MESMA PAGINA: "24000mAh, 88.8Wh".
//   24000 / 6000 = **4x DE DIFERENCA**. A ARITMETICA EXPLICA O DESENCONTRO:
//   88.8 Wh / 6 Ah = 14.8 V (QUATRO CELULAS DE 3.7 V EM SERIE), E 88.8 Wh / 24 Ah
//   = 3.7 V (A CONTAGEM CELULA A CELULA). OS DOIS NUMEROS DESCREVEM A MESMA
//   BATERIA EM TENSOES DIFERENTES, MAS A FICHA NAO DIZ ISSO EM LUGAR NENHUM —
//   ELA SO JOGA OS DOIS NA CARA DO COMPRADOR. A PAGINA MOSTRA OS DOIS, CADA UM
//   COM O CAMPO DE ONDE SAIU, E NAO "CORRIGE" NENHUM.
//
// ─── ACHADO 2: "Specification Met: true" — BOOLEANO ONDE DEVERIA HAVER NORMA ───
//   O MESMO CAMPO QUE NO NOCO GB40 TRAZIA "CE" AQUI TRAZ A PALAVRA "true".
//   ALGUEM MARCOU UM CHECKBOX E O VALOR VAZOU PARA A FICHA PUBLICA. ENTRA NA
//   TABELA COMO 'Specification met (as listed)|true' PORQUE **O LIXO E O ACHADO**.
//   NENHUMA CONFORMIDADE E AFIRMADA NA PAGINA.
//
// ─── ACHADO 3: 4000 A DECLARADO DUAS VEZES, EM DOIS CAMPOS DIFERENTES ───
//   "Amperage: 4000 Amps" E "Peak Output Current: 4000 Amps". OU SEJA: O CAMPO
//   DE CORRENTE NOMINAL FOI PREENCHIDO COM O PICO. NAO HA NENHUM NUMERO DE
//   CORRENTE CONTINUA NA FICHA INTEIRA. AS DUAS LINHAS FICAM NA PAGINA, ROTULADAS.
//
// ─── ACHADO 4: "10L Petrol / 10L Diesel" ───
//   O CAMPO Item Highlight PROMETE COBERTURA ATE 10 LITROS DE DIESEL. DIESEL DE
//   10 LITROS E MOTOR DE CAMINHAO; CARRO DE RUA RARAMENTE PASSA DE 3.0 L.
//   ENTRA COMO 'Engine cover (as listed)' — DECLARACAO DO ANUNCIO, NAO FATO.
//
// ─── ACHADO 5: O PRODUTO TEM TRES NOMES NA PROPRIA FICHA ───
//   TITULO: "MV24". Model Number: "MegaVolt24". Manufacturer Part Number: "6570140".
//   UM AVALIADOR ESCREVE "mega24" E "400a". O SLUG DO SITE USA megavolt24.
//
// ─── FORMA DA DISTRIBUICAO ───
//   84% CINCO / 7% QUATRO / 2% TRES / 1% DUAS / **6% UMA ESTRELA**.
//   A CURVA E EM J DE NOVO: UMA ESTRELA (6%) QUASE EMPATA COM QUATRO ESTRELAS (7%)
//   E VALE O DOBRO DE DUAS + TRES SOMADAS (1% + 2% = 3%). SOBRE 5.820 AVALIACOES,
//   6% SAO CERCA DE 350 COMPRADORES DE UMA ESTRELA. A MEDIA 4.6 ESCONDE ISSO.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE** DA FICHA, COM AUTOR, DATA, NOTA E SELO DE
//   COMPRA VERIFICADA. NUNCA GERAR, RESUMIR NEM TRADUZIR CITACAO.
//   DECISAO DO FELIPE (03/09/2026): AS DUAS CITACOES SAO POSITIVAS — A PAGINA VENDE.
//   O SINAL NEGATIVO NAO SUMIU: A BARRA DE 1 ESTRELA CONTINUA EXIBINDO OS 6% NA
//   DISTRIBUICAO, ENTAO O LEITOR VE O NUMERO SEM QUE A CITACAO O EMPURRE PARA LA.
//   DOIS TEXTOS COLETADOS (paul, 22/01/2026 E Beachbuggy, 04/02/2026) FORAM
//   DESCARTADOS POR VIREM CORTADOS NO MEIO DA FRASE NA COLETA ("just a clic",
//   "after YouTub") — CITAR ALI SERIA CITAR UM PEDACO SEM PENSAMENTO FECHADO.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-jump-starter',
    'asin' => 'B0CRRKRJ2S',
    'slug' => 'wolfbox-megavolt24',

    'meta_title' => 'WOLFBOX MV24 Jump Starter: Specs, Ratings and Price',
    'meta_description' => 'Everything the Amazon listing publishes about the WOLFBOX MV24 jump starter: price, full specs, how its 5,820 ratings break down, and what buyers say.',

    'page_intro' => "The WOLFBOX MV24 is a 4,000-amp lithium jump starter that ships with a 65W USB-C wall charger, and it takes sixth place in our jump starter ranking. Everything on this page comes from its Amazon listing rather than from our own testing: the GBP 129.99 price, the specification table, the spread of its 5,820 customer ratings, and two review quotes copied word for word. The listing sells it on that screen: an LED display that shows charge as a number rather than a row of lights.\n\nOne line of the specification is worth a second look. The table gives the battery as 6,000 milliamp hours, while the Item Highlight field on the same page gives 24,000mAh and 88.8Wh. The two capacity figures sit a factor of four apart on the same listing, so the watt-hour number is the one to carry over when you compare packs. Two other fields read oddly as published: the listing claims cover for 10 litres of petrol and 10 litres of diesel, and its Specification Met field reads simply true, with no standard named.",

    'harvested_at' => '2026-09-03 15:00:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 84, 4 => 7, 3 => 2, 2 => 1, 1 => 6],

    // FICHA TECNICA COPIADA DA TABELA DA AMAZON. LINHAS DE LIXO DE CATALOGO
    // (Manufacturer repetindo Brand Name) FORAM DESCARTADAS. AS DUAS CAPACIDADES
    // E O CAMPO "Specification Met" FICAM PORQUE SAO O ACHADO.
    'tech_specs' => [
        'Brand|WOLFBOX',
        'Model number|MegaVolt24',
        'Manufacturer part number|6570140',
        'Peak output current|4000 Amps',
        'Amperage (as listed)|4000 Amps',
        'Voltage|12 Volts',
        'Battery cell composition|Lithium Ion',
        'Battery capacity (specification table)|6000 Milliamp Hours',
        'Battery capacity (Item Highlight field)|24000mAh, 88.8Wh',
        'Engine cover (as listed)|10L Petrol / 10L Diesel',
        'Compatible vehicle type|Automotive',
        'Automotive fit type|Universal Fit',
        'Item dimensions (D x W x H)|9.8 x 23.7 x 3.8 centimetres',
        'Item weight|1.36 kg',
        'Included components|65W USB C Wall Charger, EVA Pack, Jumper Cable, MegaVolt24 Jump Starter, USB C to USB C cable',
        'Number of items|1',
        'Specification met (as listed)|true',
        'Manufacturer warranty|2 Year',
        'ASIN|B0CRRKRJ2S',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    'faq' => [
        "What size engine will the WOLFBOX MV24 start?|The Item Highlight field on the listing claims 10 litres of petrol and 10 litres of diesel, from 4,000 peak amps. That is a very large diesel figure for a pack this size, and it is the listing talking rather than a number we measured.",
        "How big is the battery?|The listing gives two answers. The specification table says 6,000 milliamp hours; the Item Highlight field on the same page says 24,000mAh and 88.8Wh. We report both because both are published. The 88.8Wh figure is the one that compares cleanly with other packs, since milliamp hours mean little without the voltage behind them.",
        "How much current does it actually deliver?|The listing gives 4,000 amps twice, once as Peak Output Current and once as Amperage. Both fields carry the same number, so the specification publishes no separate continuous rating.",
        "What comes in the box and how is it charged?|WOLFBOX lists the MegaVolt24 jump starter itself, a 65W USB C wall charger, a USB C to USB C cable, the jumper cable and an EVA pack.",
        "How heavy is it and will it fit a glovebox?|The specification table gives 1.36 kg and 9.8 x 23.7 x 3.8 centimetres. It is flat and long rather than chunky, at 23.7 centimetres long and only 3.8 deep it is flat rather than chunky, though the listing does not say whether it fits a glovebox.",
        "What warranty does it come with?|The listing states a 2 year manufacturer warranty. Its Specification Met field reads simply true, so no standard or certification is named on the page at all.",
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => 'Excellent. Arrived with 74% charge but charges to 100% really fast. Started my totally flat Range Rover first time. The storage box is great and keeps everything in one place.',
            'author' => 'gparker',
            'rating' => 5,
            'date' => '16 May 2026',
            'title' => 'It works flawlessly',
            'verified' => true,
        ],
        [
            'text' => 'It feels well built, easy to use, and has plenty of power to start my vehicle quickly without any issues. The battery holds charge well, and the display is clear and simple to understand.',
            'author' => 'Christmas Wreath not included',
            'rating' => 5,
            'date' => '10 May 2026',
            'title' => 'Powerful and Reliable Jump Starter',
            'verified' => true,
        ],
    ],
];
