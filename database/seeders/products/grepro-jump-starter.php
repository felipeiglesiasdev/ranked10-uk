<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// GREPRO GP196, ASIN B0BBV7KC7Z. £32,99. NOTA 4,6 SOBRE 2.522 AVALIACOES.
// POSICAO #7 DE 10 NO ARTIGO "Best Jump Starter 2026".
//
// ─── ACHADO 1: TRES CAMPOS DA TABELA SAO TEXTO DE PREENCHIMENTO, NAO DADO ───
//   "Included Components: **NO**" — o campo que existe para listar o que vem na caixa
//   diz literalmente "NO". "Item Type Name: **No**". E "Manufacturer Warranty Description:
//   **1**", um algarismo solto, sem unidade: um ano? um mes? uma unidade? INDECIDIVEL.
//   SAO 3 DE 19 LINHAS DA FICHA (16%) OCUPADAS POR PLACEHOLDER. RESULTADO PRATICO:
//   O ANUNCIO NAO DIZ AO COMPRADOR O QUE HA DENTRO DA EMBALAGEM NEM QUANTO DURA A GARANTIA.
//   AS TRES LINHAS FICAM NA PAGINA MARCADAS "(as listed)" — SAO O ACHADO, NAO LIXO.
//
// ─── ACHADO 2: O MESMO 4000 APARECE DUAS VEZES, UMA DELAS SEM UNIDADE ───
//   "Amperage: 4000 Amps" / "Peak Output Current: **4000**" — sem unidade nenhuma.
//   MESMO NUMERO, DUAS LINHAS, UMA SO DELAS INTERPRETAVEL. NAO CORRIGIDO NA PAGINA:
//   REPRODUZIDO COMO 'Peak output current (as listed)|4000'.
//
// ─── ACHADO 3: A UNICA PISTA DO CONTEUDO DA CAIXA ESTA NO CAMPO ERRADO ───
//   COM "Included Components" ZERADO, O UNICO LUGAR QUE CITA BOLSA DE TRANSPORTE,
//   LANTERNA LED E VISOR LCD E O "Item Highlight" — CAMPO DE MARKETING, NAO DE CONTEUDO.
//   POR ISSO ESSA LINHA FOI MANTIDA (NAO E REPETICAO DO TITULO) E A FAQ RESPONDE
//   "O QUE VEM NA CAIXA" DIZENDO QUE A FICHA NAO DIZ.
//
// ─── ACHADO 4: 10.000 mAh EM 300 g ───
//   A TABELA DECLARA "Battery Capacity: 10000 Milliamp Hours" E "Item Weight: 300 g".
//   CONTRA O NOCO GB40 (#1 DO MESMO RANKING, FICHA COLETADA NO MESMO DIA): 2.150 mAh
//   E 1,09 kg. OU SEJA, A FICHA DA GREPRO DECLARA **4,6x** A CAPACIDADE EM **27%** DO
//   PESO. NUMEROS DE ANUNCIO, NAO MEDICAO NOSSA — E EXATAMENTE ESSE O PONTO DO ESTUDO.
//
// ─── FORMA DA DISTRIBUICAO ───
//   79% cinco / 12% quatro / 4% tres / 1% duas / **4% UMA ESTRELA**. SOMA 100.
//   UMA ESTRELA E QUATRO VEZES MAIS FREQUENTE QUE DUAS, E EMPATA COM TRES. E A MESMA
//   CURVA EM J DO GB40, POREM MAIS RASA (LA A BASE ERA 7%). A MEDIA DE 4,6 NAO MOSTRA ISSO.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE** DA FICHA, COM AUTOR, DATA, NOTA E SELO DE
//   COMPRA VERIFICADA. NUNCA GERAR, RESUMIR NEM TRADUZIR CITACAO.
//   DECISAO DO FELIPE (03/09/2026): AS DUAS CITACOES SAO POSITIVAS — A PAGINA VENDE.
//   O SINAL NEGATIVO NAO SUMIU: A BARRA DE 1 ESTRELA CONTINUA MOSTRANDO OS 4% NA
//   DISTRIBUICAO, ENTAO O LEITOR VE O NUMERO SEM QUE UMA CITACAO O EMPURRE PARA LA.
//   OS TEXTOS COLETADOS VIERAM TRUNCADOS EM 270 CARACTERES; OS TRECHOS ESCOLHIDOS
//   TERMINAM EM PONTO FINAL, LONGE DO CORTE.
//
// ⚠ A FICHA DECLARA "Specification Met: RoHS". REPORTADO COMO O QUE O ANUNCIO PUBLICA,
//   SEM AFIRMAR CONFORMIDADE DE NADA.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-jump-starter',
    'asin' => 'B0BBV7KC7Z',
    'slug' => 'grepro-jump-starter',

    'meta_title' => 'GREPRO Jump Starter Review: Specs, Ratings and Price',
    'meta_description' => 'Everything the Amazon listing publishes about the GREPRO Jump Starter: price, the full specification table, how its ratings break down and what buyers say.',

    'page_intro' => "The GREPRO Jump Starter Power Pack is a 12-volt lithium polymer booster rated by its listing for 7.0 litres of petrol or 5.0 litres of diesel, and it takes seventh place in our jump starter ranking. It earns that spot on weight: the specification table gives 300 grams, the lightest pack in the ranking, with an LCD that reports the charge left as a number rather than a row of dots. Everything on this page comes from the Amazon listing rather than from our own testing.\n\nThe specification also says something odd, and it is worth knowing before you buy. Three of its fields carry placeholder text instead of data: the box contents field reads \"NO\", the item type field reads \"No\", and the warranty field reads \"1\" with no unit attached, so there is no way to tell a year from a month. A fourth field gives peak output current as \"4000\" with no unit at all, while the amperage row directly above it gives 4,000 amps. We have left all four rows on the page exactly as the listing publishes them, marked as listed, so you can see what the seller does and does not tell you.",

    'harvested_at' => '2026-09-03 15:00:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 79, 4 => 12, 3 => 4, 2 => 1, 1 => 4],

    // FICHA TECNICA COPIADA DA TABELA DA AMAZON. LINHAS DE CATALOGO SEM VALOR PARA O
    // LEITOR FORAM DESCARTADAS (o campo "Manufacturer" so repetia a marca).
    // AS QUATRO LINHAS QUEBRADAS FICAM, MARCADAS "(as listed)": ELAS SAO O ACHADO.
    'tech_specs' => [
        'Brand|GREPRO',
        'Model number|GP196',
        'Manufacturer part number|GP196',
        'Amperage|4000 Amps',
        'Peak output current (as listed)|4000',
        'Voltage|12 Volts',
        'Battery cell composition|Lithium Polymer',
        'Battery capacity|10000 Milliamp Hours',
        'Compatible vehicle type|Automotive',
        'Automotive fit type|Universal Fit',
        'Item dimensions (D x W x H)|8 x 14.5 x 3 centimetres',
        'Item weight|300 g',
        'Item highlight (as listed)|Emergency Roadside, LCD Display, LED Flashlight, Carry Bag, Car Battery Booster Jump Starter',
        'Included components (as listed)|NO',
        'Item type name (as listed)|No',
        'Manufacturer warranty description (as listed)|1',
        'Specification met (as listed)|RoHS',
        'ASIN|B0BBV7KC7Z',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    // ONDE A FICHA NAO RESPONDE, A RESPOSTA E QUE A FICHA NAO RESPONDE.
    'faq' => [
        'What size engine will the GREPRO jump starter handle?|The product name gives 7.0 litres of petrol and 5.0 litres of diesel, and the table gives 4,000 amps. Those are the figures the listing publishes rather than ones we measured, and how close you get to them depends on the engine and how flat the battery is.',
        'How heavy is it and will it fit a glovebox?|The specification table gives 300 grams and 8 x 14.5 x 3 centimetres. That is the lightest pack in our ranking, and at three centimetres thick it fits a glovebox, a door pocket or a rucksack.',
        "What comes in the box?|The listing does not say. Its included components field reads \"NO\" rather than a list, so there is nothing to quote. The only clue is the item highlight row, which names an LCD display, an LED flashlight and a carry bag. Treat that as marketing copy, not a packing list.",
        'How big is the battery?|The table gives 10,000 milliamp hours of lithium polymer at 12 volts. For scale, the NOCO GB40 at the top of our ranking lists 2,150 milliamp hours, so GREPRO claims a much larger cell in a far lighter body.',
        "What warranty does it come with?|Unclear from the listing. The manufacturer warranty description field contains a single character, \"1\", with no unit, so it could mean one year, one month or one of something else. If the warranty matters to you, ask the seller before buying.",
        'Why does the page show peak output current as just 4000?|Because that is what the listing publishes. The amperage row gives 4,000 amps, and the peak output current row directly below gives 4,000 with no unit at all. We report the field as it stands rather than filling in the missing unit ourselves.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => 'For a compact little bit of kit I was very impressed. My car was pointing down a slope on my drive so would be very difficult to move in a position for a jump start from another car.',
            'author' => 'Shazza',
            'rating' => 5,
            'date' => '25 August 2026',
            'title' => 'Quick and easy to use',
            'verified' => true,
        ],
        [
            'text' => "We bought this the last time we needed a neighbor to jump start our car so we would be able to self-serve a jump start (so it's been 8 months since we got this).",
            'author' => 'Nicolas',
            'rating' => 5,
            'date' => '6 September 2025',
            'title' => "It's worth it, will never travel without one of these again",
            'verified' => true,
        ],
    ],
];
