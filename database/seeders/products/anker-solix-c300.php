<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: AMAZON.CO.UK EM 05/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// PAGINA DO #1 DE 10 NO ARTIGO "Best Portable Power Station 2026".
//
// ─── ACHADO 1: CAPACIDADE EM mAh, NAO EM Wh — O NUMERO QUE SOA GRANDE ───
//   "Battery Capacity: **90000 Milliamp Hours**". mAh SO FAZ SENTIDO COM A TENSAO JUNTO;
//   PARA POWER STATION O QUE IMPORTA E Wh. O PRODUTO E 288 Wh (TITULO). 90.000 mAh E O
//   NUMERO GRANDE DE MARKETING NUMA UNIDADE QUE NAO DIZ QUANTA ENERGIA HA. EIXO DO SITE.
//
// ─── ACHADO 2: A FICHA BRIGA COM O TITULO EM TRES PONTOS ───
//   "Output Wattage: 360" x TITULO "300W".  |  TABELA "Lithium Ion" x TITULO "LiFePO4"
//   (LiFePO4 dura muito mais ciclos — a genericizacao apaga o argumento).  |  TITULO
//   "7 Ports" x TABELA "Number of Ports: 11" / "Number of Outlets: 7".
//
// ─── ACHADO 3: CAMPOS DE CATALOGO IMPOSSIVEIS ───
//   "Is Electric: No" (numa estacao de energia), "Antenna Location: Camping",
//   "Is Product Cordless: No". REPORTADOS COMO ESTAO, ROTULADOS.
//
// ─── O QUE E REAL ───
//   288 Wh, 4,13 kg, 230 V, LiFePO4 (titulo), doca de 7 tomadas/portas uteis.
//   82% cinco estrelas — a distribuicao mais saudavel do topo do ranking.
//
// ⚠ CITACOES: /product-reviews FILTRADO 5 ESTRELAS + REINO UNIDO. LITERAIS, POSITIVAS.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-portable-power-station',
    'asin' => 'B0D62GMQ3F',
    'slug' => 'anker-solix-c300',

    'meta_title' => 'Anker SOLIX C300 Review: Specs and Ratings',
    'meta_description' => 'Everything the Amazon listing publishes about the Anker SOLIX C300 portable power station: capacity, the spec table, the ratings, and what buyers say.',

    'page_intro' => "The Anker SOLIX C300 takes first place in our portable power station ranking, and it earns it on the things that matter: 288Wh of LiFePO4 capacity, a 300W output, seven usable ports, a 4.13 kg body you can actually carry, and the healthiest ratings at the top of the page, 4.7 stars with 82 per cent at five. It is the compact station most homes should start with, big enough to run lights, a router and phones through a power cut or a camping weekend.\n\nIts specification table is a useful lesson in reading these listings, because it fights the title in several places. It states the capacity as \"90000 Milliamp Hours\", a number that sounds enormous but is meaningless for a power station without a voltage attached; the figure that matters, 288Wh, is in the title, not the table. The table then gives \"Output Wattage: 360\" where the title says 300W, calls the cells \"Lithium Ion\" where the title specifies the longer-lasting LiFePO4, and lists eleven ports against the title's seven. It also carries impossible catalogue fields such as \"Is Electric: No\" and \"Antenna Location: Camping\". None of it changes the hardware, but it shows why the headline numbers on these products deserve a second look. Everything here comes from the Amazon listing rather than our own testing.",

    'harvested_at' => '2026-09-05 18:00:00',

    'rating_breakdown' => [5 => 82, 4 => 11, 3 => 3, 2 => 2, 1 => 2],

    'tech_specs' => [
        'Usable capacity|288 Wh (LiFePO4, from the title)',
        'Capacity (as listed)|90,000 Milliamp Hours|meaningless without a voltage',
        'Output|300 W (title); "Output Wattage: 360" in the table',
        'Battery chemistry|LiFePO4 (title); "Lithium Ion" in the table',
        'Ports|7 usable (title); "Number of Ports: 11" in the table',
        'Voltage|230 Volts',
        'Weight|4.13 kg',
        'Dimensions|12.4 x 12 x 20 centimetres',
        'Catalogue oddities (as listed)|"Is Electric: No", "Antenna Location: Camping"',
        'Model number|A1722',
        'ASIN|B0D62GMQ3F',
    ],

    'faq' => [
        'How much can the Anker SOLIX C300 actually store?|288 watt-hours, the figure in the title. Ignore the "90000 Milliamp Hours" on the spec table: milliamp-hours mean nothing for a power station unless you also know the voltage, so it is a big-sounding number rather than a useful one. 288Wh is enough for many phone charges, a router for most of a day, or lights through an evening.',
        'What can it run?|Its output is 300W (the title figure; the table confusingly says 360W), so it powers low-draw devices: laptops, phones, a router, lights, a small fan or a TV. It will not run a kettle, a heater or anything with a 3kW element, which need far more than 300W.',
        'Is it LiFePO4 or ordinary lithium-ion?|The title says LiFePO4, which lasts far more charge cycles than ordinary lithium-ion; the spec table genericises it to "Lithium Ion". LiFePO4 is the meaningful claim, and it is why a station like this is worth more than a cheap power bank of similar size.',
        'How many ports does it have?|Seven usable ports according to the title, which is what you plan around. The spec table says eleven, counting differently; the seven-port figure is the practical one.',
        'Is it light enough to carry?|Yes. At 4.13 kg it is genuinely portable, one of the lighter mains-capable stations here, and small at roughly 12 x 12 x 20 cm.',
        'Can it be charged by solar?|The listing lists solar as a supported input, so it can be topped up from a compatible panel, though no panel is included. Mains charging is the standard method.',
    ],

    'review_quotes' => [
        [
            'text' => "Brilliant small machine needed it for lights and its better than expected",
            'author' => 'heather lord',
            'rating' => 5,
            'date' => '5 August 2026',
            'title' => 'Brilliant machine',
            'verified' => true,
        ],
        [
            'text' => "I bought this for my son, who is quite clued-up on all things technical. This is the type that he had chosen for himself, based on the specifications and he seems very happy with it.",
            'author' => 'JAJ',
            'rating' => 5,
            'date' => '7 June 2026',
            'title' => 'Bought as a gift',
            'verified' => true,
        ],
    ],
];
