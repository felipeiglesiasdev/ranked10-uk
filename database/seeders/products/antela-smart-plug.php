<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 05/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// PAGINA DO #8 DE 10 NO ARTIGO "Best Smart Plug 2026". 2.176 AVALIACOES.
//
// ─── ACHADO 1: A CONTA MAIS BAGUNCADA DA PAGINA — TRES NUMEROS, NENHUM PAR BATE ───
//   "Current Rating: 13 Amps" + "Operating Voltage: 220 Volts" + "Wattage: 3680 watts".
//   13 × 220 = 2.860, NAO 3.680. E 3.680 W E UM VALOR DE **16 A** (16 × 230 = 3.680).
//   OU SEJA, DECLARA A CORRENTE DE UM PLUGUE DE 13 A E A WATTAGE DE UM DE 16 A, NA MESMA
//   TABELA, COM UMA TENSAO (220 V) QUE NAO PRODUZ NENHUM DOS DOIS. E ~800 W ACIMA DO QUE
//   13 A REALMENTE CARREGAM (2.860-2.990 W). ISSO ABRE A INTRO — ACHADO COM ARESTA DE SEGURANCA.
//
// ─── ACHADO 2: VOCABULARIO DE PLACA DE CIRCUITO NUMA TOMADA DE PAREDE ───
//   "Terminal: Through Hole" + "Mounting Type: Through Hole Mount" — TERMOS DE SOLDA DE
//   COMPONENTE EM PLACA (perna atravessando furo), NUMA COISA QUE ESPETA NA PAREDE.
//   "Operation Mode: ON-OFF-ON" DESCREVE CHAVE DE TRES POSICOES; A TOMADA TEM DUAS.
//   "Switch Type: Push Button" + "Number of Positions: 4" (que e o tamanho do pacote).
//
// ─── ACHADO 3: A "DIMENSAO" E A CAIXA, NAO A TOMADA ───
//   "Item Dimensions: 12.7 x 8.5 x 12.7 cm" — 127 mm NAO E UMA TOMADA, E O PACOTE DE
//   QUATRO. REPORTADO COMO ESTA NA FICHA, MAS SEM CHAMAR DE TAMANHO DA TOMADA.
//
// ─── ACHADO 4: PRECO POR TOMADA E VOLUME DE AVALIACOES ───
//   £25.49 / 4 = **£6.37 POR TOMADA** — O MENOR PRECO POR TOMADA DA PAGINA NA COLETA DE
//   05/09 (ABAIXO DO EIGHTREE ET32 A £7.00). ⚠ CAIU DE £29.99 DA COLETA DE 03/09.
//   2.176 AVALIACOES E O MAIOR VOLUME ENTRE AS MARCAS BARATAS DA PAGINA.
//   ⚠ PRECOS AQUI OSCILAM SEMANA A SEMANA; O SUPERLATIVO DE "MAIS BARATA" E DATADO.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE**, COM AUTOR, DATA, NOTA E SELO DE COMPRA
//   VERIFICADA CONFERIDO NA FICHA. AS DUAS SAO POSITIVAS (DECISAO DO FELIPE).
//   A BARRA DE 1 ESTRELA (6%) CONTINUA VISIVEL NA DISTRIBUICAO.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-smart-plug',
    'asin' => 'B09VP5KNWM',
    'slug' => 'antela-smart-plug',

    'meta_title' => 'ANTELA Smart Plug Review: Specs and Ratings',
    'meta_description' => 'Everything the Amazon listing publishes about the ANTELA smart plug four-pack: price per socket, the spec table, the ratings, and what buyers say.',

    'page_intro' => "The ANTELA Smart Plug is an energy-monitoring plug sold here as a four-pack, and it takes eighth place in our smart plug ranking. At GBP 25.49 for four it is GBP 6.37 a socket, the lowest price per socket on the page when we checked, below even the EIGHTREE at GBP 7.00, and it has more ratings behind it than any of the other budget brands here at 2,176. Prices in this category move week to week, so check the live figure, but the plug does the usual energy monitoring, scheduling and voice control over 2.4GHz Wi-Fi with no hub.\n\nWhat sets this listing apart is its specification table, which contains the messiest arithmetic on the page. It gives a current rating of 13 amps, an operating voltage of 220 volts and a wattage of 3,680 watts, and no two of those agree with each other. Thirteen amps at 220 volts is 2,860 watts, not 3,680; and 3,680 watts is a 16-amp figure, the rating of a larger circuit, not a 13-amp plug. So it pairs the current of one plug with the wattage of another, roughly 800 watts above what 13 amps can actually carry. The same table then borrows the language of circuit boards, calling the terminal \"Through Hole\" and the mounting \"Through Hole Mount\", both soldering terms for a component pushed through a printed board, and lists the operation mode as \"ON-OFF-ON\", a three-position switch, for a plug that has two states.",

    'harvested_at' => '2026-09-05 13:30:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 72, 4 => 15, 3 => 5, 2 => 2, 1 => 6],

    // FICHA COPIADA DA TABELA. OS CAMPOS DE LIXO FICAM ROTULADOS "(as listed)",
    // PORQUE ELES **SAO** O ACHADO — NAO SE CORRIGE EM SILENCIO.
    'tech_specs' => [
        'Current rating|13 Amps',
        'Operating voltage (as listed)|220 Volts',
        'Wattage (as listed)|3680 watts',
        'Operation mode (as listed)|ON-OFF-ON',
        'Switch type|Push Button',
        'Terminal (as listed)|Through Hole',
        'Mounting type (as listed)|Through Hole Mount',
        'Number of positions (as listed)|4',
        'Contact type|Normally Open',
        'Connector type|Plug In',
        'Circuit type|1-way',
        'Upper temperature rating|50 Degrees Celsius',
        'Connectivity protocol|Wi-Fi',
        'Controller type|Amazon Alexa, Google Assistant',
        'Control method|Remote, Voice',
        'Item dimensions (pack, as listed)|12.7 x 8.5 x 12.7 centimetres',
        'Item weight|350 g',
        'Material|Plastic',
        'International protection rating|IP20',
        'Number of items|4',
        'Unit count|4.0 count',
        'Specification met (as listed)|CE, RoHS',
        'Brand|ANTELA',
        'Model number|F1s302-UK',
        'Country of origin|China',
        'ASIN|B09VP5KNWM',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    'faq' => [
        'How many watts can the ANTELA plug really take?|Ignore the 3,680 watts on the table. That is a 16-amp figure, and this is a 13-amp plug: the current rating on the same table says 13 amps, which at Britain\'s 230 volts is 2,990 watts. Thirteen amps is the real ceiling, set by the fuse in the plug, and a 3kW kettle or heater sits right at it. The 3,680 figure describes a bigger circuit than this plug is.',
        'Why do the current, voltage and wattage not match?|Because the fields were filled in from different places. 13 amps at the 220 volts listed is 2,860 watts, and 3,680 watts needs 16 amps. No two of the three agree. British mains is 230 volts nominal, where 13 amps is 2,990 watts, and that is the figure to trust because it follows from the fuse.',
        'Is it really the cheapest here?|When we checked it was GBP 6.37 a socket, the lowest on the page, just under the EIGHTREE at GBP 7.00. Prices in this category change often, though, so treat that as a snapshot and check the live price before buying.',
        'Does it need a hub?|No. It connects over 2.4GHz Wi-Fi and works with Alexa and Google Home for voice control, running through the widely used Smart Life app.',
        'How big is each plug?|The listing does not give a single plug\'s size. The 12.7 x 8.5 x 12.7 centimetre figure on the table is the four-pack box, not one plug, so there is no measurement here for whether it blocks the second socket.',
        'Does it monitor energy use?|Yes. The listing says it shows energy consumption in the app, with a graph of usage over time, and notes the plug starts showing data after an hour of use. As with every plug in this ranking, it publishes no accuracy figure for the meter, so treat the readings as a guide.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => "These smart plugs are brilliant. Downloaded the app, plugged them in one by one and went through instructions and away I went.",
            'author' => 'John B.',
            'rating' => 5,
            'date' => '18 December 2025',
            'title' => 'Definitely smart.',
            'verified' => true,
        ],
        [
            'text' => "Amazing plugs 😊 I work shifts so brilliant I can set them for when I come home.",
            'author' => 'Kerry oakes',
            'rating' => 5,
            'date' => '20 July 2026',
            'title' => 'Brilliant smart plugs',
            'verified' => true,
        ],
    ],
];
