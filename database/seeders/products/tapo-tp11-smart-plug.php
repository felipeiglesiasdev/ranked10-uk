<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// PAGINA DO #2 DE 10 NO ARTIGO "Best Smart Plug 2026". 18.125 AVALIACOES.
//
// ─── ACHADO 1: A MESMA TP-LINK PUBLICA DUAS TENSOES DIFERENTES ───
//   ESTA FICHA (TP11) .. "Voltage: **240 Volts (AC)**"
//   FICHA DO P110 ..... "Operating Voltage: **220 Volts**"
//   MESMA MARCA, MESMA LOJA, MESMA REDE ELETRICA BRITANICA, 20 V DE DIFERENCA.
//   O P110 AINDA DECLARA 13 A E 2.860 W (13 × 220). A 240 V O MESMO RELE DARIA 3.120 W.
//   SAO **260 W** DE DIFERENCA SO PELA TENSAO ESCOLHIDA NO CADASTRO.
//   ⚠ ESTA FICHA **NAO** PUBLICA CORRENTE NEM WATTAGE — SO A TENSAO. ENTAO O 13 A CITADO
//   NA PAGINA E ATRIBUIDO EXPLICITAMENTE A FICHA DO P110, NAO A ESTA.
//   AS DUAS PAGINAS DO SITE MOSTRAM AS DUAS METADES, E DA PARA CONFERIR AS DUAS FICHAS.
//
// ─── ACHADO 2: TRES QUANTIDADES DIFERENTES NUM PACOTE DE QUATRO ───
//   "Number of Packs: **24**"  |  "Unit Count: **4.0 count**"  |  "Number of Items: **1**"
//   NA MESMA TABELA, DO MESMO ANUNCIO, QUE SE CHAMA "TP11(4-pack)".
//   TRES CAMPOS DE QUANTIDADE, TRES RESPOSTAS, E SO UMA DELAS ESTA CERTA.
//
// ─── ACHADO 3: E AQUI O TIPO DE PLUGUE ESTA CERTO ───
//   "Plug Type: **Type G**" — O PLUGUE BRITANICO, CORRETO.
//   NA FICHA DO P110 O MESMO CAMPO DIZ "Connector Type: **Schuko**", QUE E O PLUGUE
//   REDONDO EUROPEU E NAO ENTRA NUMA TOMADA BRITANICA. MESMA MARCA, DOIS ANUNCIOS,
//   UM CERTO E UM ERRADO.
//
// ─── PRECO POR TOMADA ───
//   £31.96 / 4 = **£7.99 POR TOMADA**, EXATAMENTE O MESMO DO P110 EM PACOTE DE DOIS
//   (£15.97 / 2). O MULTIPACK NAO FICA MAIS BARATO POR UNIDADE A PARTIR DE DOIS.
//
// ─── DISTRIBUICAO: A MAIS SAUDAVEL JA COLETADA NO SITE ───
//   80% cinco / 14% quatro / 3% tres / 1% duas / **2% uma**. 94% DERAM QUATRO OU CINCO.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE**, COM AUTOR, DATA, NOTA E SELO DE COMPRA
//   VERIFICADA CONFERIDO NA PROPRIA FICHA. AS DUAS SAO POSITIVAS (DECISAO DO FELIPE).
//   A BARRA DE 1 ESTRELA CONTINUA VISIVEL NA DISTRIBUICAO.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-smart-plug',
    'asin' => 'B0GWFLLS6M',
    'slug' => 'tapo-tp11-smart-plug',

    'meta_title' => 'Tapo TP11 Smart Plug Review: Specs and Ratings',
    'meta_description' => 'Everything the Amazon listing publishes about the Tapo TP11 four-pack: price per socket, the spec table, how the ratings break down, and what buyers say.',

    'page_intro' => "The Tapo TP11 is TP-Link's compact energy-monitoring smart plug, sold here as a four-pack, and it takes second place in our smart plug ranking. At GBP 31.96 for four it works out at GBP 7.99 a socket, which is exactly what the P110 costs per socket in its two-pack, so buying four rather than two saves nothing per plug. It is the highest-rated plug in that ranking at 4.7 stars.\n\nRead its voltage row next to its sibling's. This listing gives 240 volts. The P110 listing, same brand and same shop, gives 220 volts, and adds a 13-amp current rating and a wattage of 2,860 watts. At 240 volts that same 13-amp relay would carry 3,120 watts instead: a 260-watt difference decided by nothing more than which voltage went into the form. This listing publishes no current rating or wattage at all, only the voltage, so the 13 amps quoted here comes from the P110 page rather than this one.",

    'harvested_at' => '2026-09-03 16:30:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 80, 4 => 14, 3 => 3, 2 => 1, 1 => 2],

    // FICHA COPIADA DA TABELA. OS TRES CAMPOS DE QUANTIDADE FICAM, ROTULADOS
    // "(as listed)", PORQUE A CONTRADICAO ENTRE ELES **E** O ACHADO.
    'tech_specs' => [
        'Voltage (as listed)|240 Volts (AC)',
        'Plug type|Type G',
        'Brand|Tapo',
        'Manufacturer|TP-Link',
        'Manufacturer part number|TP11(4-pack)',
        'Included components|TP11(4-pack)',
        'Number of packs (as listed)|24',
        'Unit count (as listed)|4.0 count',
        'Number of items (as listed)|1',
        'Item weight|440 g',
        'Colour|White',
        'Product warranty|3 year',
        'Country of origin|China',
        'ASIN|B0GWFLLS6M',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE AS FICHAS PUBLICAM. VIRA FAQPage NO SCHEMA.
    'faq' => [
        'How many plugs do you actually get?|Four. The listing is named TP11(4-pack) and "Unit Count" reads 4.0. Two other quantity fields disagree with that on the same table: "Number of Packs" reads 24 and "Number of Items" reads 1. The four-pack is what ships; the other two figures are catalogue fields filled in wrongly.',
        'How many watts can it take?|This listing does not say. It publishes a voltage of 240 volts and no current rating or wattage at all. Its sibling the P110 gives 13 amps and 2,860 watts at 220 volts; at the 240 volts declared here, 13 amps would be 3,120 watts. Either way a 3kW kettle or heater sits at the limit of a British 13-amp socket.',
        'Why does it say 240 volts when the P110 says 220?|Both are TP-Link listings on the same shop, and they disagree. British mains is 230 volts nominal, so neither figure is the current standard. It changes the maximum wattage each listing implies, which is why it is worth checking rather than assuming.',
        'Does it need a hub?|No. The listing sells it on easy setup with voice control through Google and Alexa, connecting over Wi-Fi.',
        'What does the energy monitoring show?|TP-Link sells the TP11 on energy monitoring alongside auto-off and an away mode. The listing does not publish an accuracy tolerance for the measurement, so treat the readings as a guide.',
        'Is it smaller than the P110?|The listing sells the TP11 on a compact design and gives the four-pack a weight of 440 grams, which is 110 grams a plug. It does not publish the dimensions of a single plug, so there is no measurement to compare directly with the P110.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => "I think I have about 8 now dotted around the house. I have them on timers for lamps, water heaters, and really good for lights for my pet snake and others.",
            'author' => 'Steveoswithmilk',
            'rating' => 5,
            'date' => '10 May 2026',
            'title' => 'Reliable and easy tonise',
            'verified' => true,
        ],
        [
            'text' => "I'm really pleased with these smart plugs. They were incredibly easy to set up and connect, and using them through the app is very straightforward.",
            'author' => 'Ilaria T',
            'rating' => 5,
            'date' => '14 July 2026',
            'title' => 'Easy to set up, reliable and makes everyday routines easier',
            'verified' => true,
        ],
    ],
];
