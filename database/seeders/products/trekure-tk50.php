<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// TREKURE TK50 — #8 DE 10 NO ARTIGO "Best Jump Starter 2026".
// PRECO GBP 69.99 / NOTA 4.6 / 1.248 AVALIACOES.
//
// ─── ACHADO 1: DOIS NUMEROS DE AMPERAGEM PARA O MESMO PRODUTO, NA MESMA PAGINA ───
//   A TABELA TECNICA DECLARA "Amperage: 9000 Amps". O TITULO DO ANUNCIO VENDE O
//   APARELHO COMO PACK DE 7000A. DIFERENCA DE 2.000 A, OU SEJA, A TABELA E ~28,6%
//   MAIOR QUE O TITULO (9000 / 7000 = 1,286). NAO HA NOTA DE RODAPE EXPLICANDO SE UM
//   E PICO E O OUTRO CONTINUO — SAO SO DOIS NUMEROS SOLTOS. A PAGINA REPORTA OS DOIS,
//   ROTULADOS COMO "(as listed)" E "(product title)". NAO CORRIGIMOS NENHUM DOS DOIS.
//
// ─── ACHADO 2: "Number of Items: 5" NUM ANUNCIO QUE VENDE UM APARELHO ───
//   NA MESMA TABELA: "Number of Packs: 1" E "Unit Count: 1.0 count". TRES CAMPOS DE
//   QUANTIDADE, DOIS DIZEM 1 E UM DIZ 5. O 5 NAO CORRESPONDE A NADA — O CAMPO
//   "Included Components" LISTA 4 ITENS (FAQ Card & Instruction Manual, Storage Bag,
//   TREKURE Jump Starter Power Pack, USB-C cable), ENTAO NEM COMO CONTAGEM DE
//   COMPONENTES O 5 FECHA. LINHA MANTIDA NA PAGINA **PORQUE ELA E O ACHADO**,
//   ROTULADA "Number of items (as listed)". LIXO DE CATALOGO COM VALOR JORNALISTICO.
//
// ─── ACHADO 3: A FICHA NAO PUBLICA DIMENSAO NENHUMA ───
//   TEM PESO (640 g) E NAO TEM ALTURA, LARGURA NEM PROFUNDIDADE. NUM PRODUTO CUJO
//   ARGUMENTO DE VENDA E CABER NO PORTA-LUVAS, O CAMPO QUE RESPONDERIA ISSO ESTA VAZIO.
//   A FAQ DIZ ISSO COM TODAS AS LETRAS EM VEZ DE ESTIMAR TAMANHO.
//
// ─── NOTA SOBRE A DISTRIBUICAO: A AMAZON NAO PUBLICOU LINHA DE 2 ESTRELAS ───
//   82% CINCO / 8% QUATRO / 5% TRES / **SEM LINHA DE DUAS** / 5% UMA ESTRELA.
//   SOMA 100 SEM O DEGRAU DE 2, ENTAO O CAMPO VAI COMO 2 => 0. SOBRE 1.248 AVALIACOES
//   ISSO DA ~1.023 DE CINCO ESTRELAS E ~62 DE UMA ESTRELA — E OS 5% DE UMA ESTRELA
//   EMPATAM COM OS 5% DE TRES. CURVA EM J DE NOVO, SO QUE COM O MEIO OCO.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE** DA FICHA, COM AUTOR, DATA, NOTA E SELO DE
//   COMPRA VERIFICADA. NUNCA GERAR, RESUMIR NEM TRADUZIR CITACAO. OS CORPOS COLETADOS
//   VINHAM CORTADOS EM 270 CARACTERES, ENTAO SO FOI USADO TRECHO QUE FECHA SOZINHO,
//   LONGE DO PONTO DE CORTE.
//   DECISAO DO FELIPE (03/09/2026): AS DUAS CITACOES SAO POSITIVAS — A PAGINA VENDE.
//   O SINAL NEGATIVO NAO SUMIU DA PAGINA: A BARRA DE 1 ESTRELA CONTINUA MOSTRANDO OS 5%
//   NA DISTRIBUICAO, ENTAO O LEITOR VE O NUMERO SEM QUE A CITACAO O EMPURRE PARA LA.
//
// ⚠ A FICHA NAO DECLARA "Specification Met" NESTE PRODUTO. NADA DE CONFORMIDADE FOI
//   ESCRITO NA PAGINA. A GARANTIA VAI COMO "o anuncio da 24 months", NAO COMO PROMESSA.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-jump-starter',
    'asin' => 'B0FXB1T7F8',
    'slug' => 'trekure-tk50',

    'meta_title' => 'TREKURE TK50 Review: Specs, Ratings and Price',
    'meta_description' => 'Everything the Amazon listing publishes about the TREKURE TK50: price, the full specification table, how its ratings break down, and what buyers say.',

    'page_intro' => "The TREKURE TK50 Jump Starter Power Pack is a 26,800mAh lithium polymer booster, and it sits eighth of ten in our jump starter ranking. At GBP 69.99 it is the big-capacity mid-price option: the listing puts 26,800mAh behind it, which is enough for several attempts and a lot of phone charging, and the title claims coverage of all petrol engines and diesel engines up to 12 litres. Everything on this page comes from the Amazon listing rather than from our own testing.\n\nThe specification is worth reading twice, because it gives two different headline outputs. The table declares 9000 Amps while the title sells the TK50 as a 7000A pack, and nothing on the listing reconciles the two, so both appear below exactly as published. The same table also reads \"Number of Items: 5\" next to \"Number of Packs: 1\" on an order that ships one jump starter, and it publishes a weight of 640 g without publishing a single dimension.",

    'harvested_at' => '2026-09-03 15:00:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SEM LINHA DE 2 ESTRELAS
    // NA FICHA, ENTAO 2 => 0. SOMA 100.
    'rating_breakdown' => [5 => 82, 4 => 8, 3 => 5, 2 => 0, 1 => 5],

    // FICHA TECNICA COPIADA DA TABELA DA AMAZON. AS DUAS LINHAS CONTRADITORIAS
    // (amperagem e contagem de itens) FICAM, ROTULADAS, PORQUE SAO O ACHADO.
    'tech_specs' => [
        'Brand|TREKURE',
        'Manufacturer|TREKURE',
        'Model number|TK50',
        'Manufacturer part number|TK50',
        'Amperage (as listed)|9000 Amps',
        'Amperage (product title)|7000A',
        'Voltage|12 Volts',
        'Battery capacity|26800 Milliamp Hours',
        'Battery cell composition|Lithium Polymer',
        'Compatible vehicle type|Automotive',
        'Automotive fit type|Universal Fit',
        'Item weight|640 g',
        'Included components|FAQ Card & Instruction Manual, Storage Bag, TREKURE Jump Starter Power Pack, USB-C cable',
        'Number of items (as listed)|5',
        'Number of packs|1',
        'Unit count (as listed)|1.0 count',
        'Manufacturer warranty|24 months',
        'ASIN|B0FXB1T7F8',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    'faq' => [
        'Will the TREKURE TK50 start a diesel?|The product title claims all petrol engines and diesel engines up to 12 litres. That is what the listing sells rather than a figure we measured, and how close you get to it depends on the engine and how flat the battery is.',
        'How many amps does it actually put out?|The listing gives two answers. The specification table reads 9000 Amps and the product title sells the TK50 as a 7000A pack. Both numbers are on the same page, so we publish both rather than pick one.',
        'Can it charge a phone?|The specification table gives the battery as 26,800mAh, and a USB-C cable is one of the included components. TREKURE does not publish how many phone charges that works out at, so treat the capacity as the only figure you have.',
        'What comes in the box?|The listing names four things: the TREKURE Jump Starter Power Pack, a storage bag, a USB-C cable and an FAQ card with the instruction manual. Note that the table separately reads "Number of Items: 5" while "Number of Packs" reads 1, which is the listing contradicting itself.',
        'How heavy is it and will it fit a glovebox?|The table gives 640 g. It publishes no height, width or depth at all, so the listing does not answer the glovebox question and we are not going to estimate it for them.',
        'Is there a warranty?|The listing gives a manufacturer warranty description of 24 months. That is the claim printed on the Amazon page; check the terms with TREKURE before you rely on it.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => "I wasn't quite sure what to expect when I ordered this, but it has genuinely turned out to be one of the most useful and versatile gadgets I own.",
            'author' => 'UKITA2020',
            'rating' => 5,
            'date' => '23 March 2026',
            'title' => 'multiuse car starter-power bank & torch',
            'verified' => true,
        ],
        [
            'text' => "I recently purchased this car jump starter and I'm extremely impressed with its performance. It has already proven to be a very reliable and practical tool to keep in my vehicle.",
            'author' => 'Colin',
            'rating' => 5,
            'date' => '6 March 2026',
            'title' => 'Quality item',
            'verified' => true,
        ],
    ],
];
