<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// SEGUNDO PRODUTO A GANHAR PAGINA, #3 DO RANKING DE JUMP STARTERS.
// PRECO £187.98 / MEDIA 4.6 / 30.093 AVALIACOES.
//
// ─── ACHADO 1: A FICHA NAO PUBLICA A CAPACIDADE DA BATERIA ───
//   TRES CAMPOS DA TABELA TRAZEM O MESMO NUMERO:
//     "Battery Capacity | 2000 Amp Hours"
//     "Amperage         | 2000 Amps"
//     "Peak Output Current | 2000 Amps"
//   AMPERE-HORA NAO E AMPERE. 2000Ah SERIA UM BANCO DE BATERIAS DE LAZER DO TAMANHO
//   DE UMA MALA — NAO UM APARELHO DE 2 kg. O 2000 E CLARAMENTE O PICO DE CORRENTE
//   VAZANDO PARA O CAMPO DE CAPACIDADE. RESULTADO PRATICO: **A FICHA DO GB70 NAO
//   PUBLICA CAPACIDADE NENHUMA**, ENQUANTO A DO GB40 PUBLICA (2150 mAh).
//   A LINHA FICA NA TABELA ROTULADA COMO "Battery capacity (as listed)" — NAO SE
//   CORRIGE VALOR ERRADO EM SILENCIO, MOSTRA-SE COMO ESTA.
//
// ─── ACHADO 2: "Included Components" NAO CITA CABOS ───
//   O CAMPO LISTA 4 ITENS: "GB70 Jump Starter Power Pack, Microfiber Storage Bag,
//   USB-C Charging Cable, User Guide". NENHUMA MENCAO A JUMP LEADS / GARRAS.
//   NUM APARELHO DE £187.98 VENDIDO PARA DAR PARTIDA, O CAMPO QUE DEVERIA LISTAR
//   O CABO DE PARTIDA LISTA O CABO DE **RECARGA**. NAO SE AFIRMA QUE NAO VEM —
//   AFIRMA-SE QUE A FICHA NAO DIZ.
//
// ─── ACHADO 3: DIMENSOES INCOMPATIVEIS COM O PESO E COM O USO ───
//   "18.8D x 32W x 9.4H centimetres" x "2 kg". ISSO DA 5.655 cm³, CONTRA 2.604 cm³
//   DO GB40 (11.7 x 20.8 x 10.7): 2,17x DE VOLUME PARA 1,83x DE PESO (2 kg / 1.09 kg).
//   OS 32 cm DE LARGURA CHEIRAM A MEDIDA DA **CAIXA**, NAO DO APARELHO — E UM
//   AVALIADOR 5 ESTRELAS (dennis prince, 25/05/2026) DESCREVE O PRODUTO COMO
//   PEQUENO E FACIL DE GUARDAR. A TABELA VAI PUBLICADA COMO ESTA.
//
// ─── ACHADO 4: MESMA MARCA, SELO DIFERENTE ───
//   O GB40 DECLARA "Specification Met: CE"; O GB70 DECLARA "Specification Met: UL".
//   MESMA MARCA, MESMA LOJA (amazon.co.uk), CAMPOS DIVERGENTES. REPORTADO COMO O QUE
//   O ANUNCIO PUBLICA, SEM AFIRMAR CONFORMIDADE NEM CERTIFICACAO DE NADA.
//
// ─── FORMA DA DISTRIBUICAO ───
//   81% cinco / 9% quatro / 3% tres / 1% duas / **6% UMA ESTRELA**.
//   UMA ESTRELA E O **TERCEIRO** VOTO MAIS COMUM E SOZINHO SUPERA DUAS E TRES
//   SOMADAS (1%+3%=4%). SOBRE 30.093 AVALIACOES, OS 6% VALEM ~1.806 NOTAS MINIMAS.
//   MESMA CURVA EM J DO GB40 (LA ERAM 7%), E A MEDIA DE 4.6 NAO DEIXA VER.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE** DA FICHA, COM AUTOR, DATA, NOTA E SELO DE
//   COMPRA VERIFICADA. NUNCA GERAR, RESUMIR NEM TRADUZIR CITACAO.
//   OS TEXTOS COLETADOS VINHAM CORTADOS EM 270 CARACTERES; CADA TRECHO ESCOLHIDO
//   TERMINA EM FRASE COMPLETA, LONGE DO PONTO DE CORTE.
//   DECISAO DO FELIPE (03/09/2026): AS DUAS CITACOES SAO POSITIVAS — A PAGINA VENDE.
//   O SINAL NEGATIVO NAO SUMIU: A BARRA DE 1 ESTRELA CONTINUA MOSTRANDO OS 6% NA
//   DISTRIBUICAO, ENTAO O LEITOR VE O NUMERO SEM QUE A CITACAO O EMPURRE PARA LA.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-jump-starter',
    'asin' => 'B016UG6PWE',
    'slug' => 'noco-boost-gb70',

    'meta_title' => 'NOCO Boost GB70 Review: Specs, Ratings and Price',
    'meta_description' => 'Everything the Amazon listing publishes about the NOCO Boost GB70: price, the full specification table, how its ratings break down, and what buyers say.',

    'page_intro' => "The NOCO Boost GB70 is a 2000-amp lithium jump starter, and it takes third place in our jump starter ranking. It sits there as the pick for big diesels, vans and 4x4s, on the strength of one number: the listing gives 2000 peak amps, double the output of the GB40 that tops the ranking. Everything on this page comes from the Amazon listing rather than from our own testing — the price, the specification table, the spread of its 30,093 ratings, and two review quotes copied word for word.\n\nOne row of that table is worth a second look. It gives the battery capacity as 2000 Amp Hours, but the amperage row and the peak output current row both read 2000 Amps as well, so the same 2000 has landed in the capacity field. Amp hours are not amps, and 2000Ah would be a leisure battery bank rather than a 2 kg pack you keep in the boot. The practical upshot: this listing never actually publishes how much charge the GB70 holds. We have left the row in the specification table exactly as NOCO gives it, labelled as listed, so you can see it for yourself.",

    'harvested_at' => '2026-09-03 15:00:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 81, 4 => 9, 3 => 3, 2 => 1, 1 => 6],

    // FICHA TECNICA COPIADA DA TABELA DA AMAZON. LIXO DE CATALOGO DESCARTADO
    // ("Item Type Name" so repetia o titulo; "Manufacturer" so repetia a marca).
    // A LINHA DA CAPACIDADE FICA, ROTULADA "as listed", PORQUE ELA **E** O ACHADO.
    'tech_specs' => [
        'Brand|NOCO',
        'Model number|GB70',
        'Manufacturer part number|GB70',
        'Peak output current|2000 Amps',
        'Amperage|2000 Amps',
        'Voltage|12 Volts',
        'Battery cell composition|Lithium Ion',
        'Battery capacity (as listed)|2000 Amp Hours',
        'Compatible vehicle type|Boat, Moto, Passenger Car',
        'Automotive fit type|Universal Fit',
        'Item dimensions (D x W x H)|18.8 x 32 x 9.4 centimetres',
        'Item weight|2 kg',
        'Included components|GB70 Jump Starter Power Pack, Microfiber Storage Bag, USB-C Charging Cable, User Guide',
        'Number of items|1',
        'Specification met (as listed)|UL',
        'Manufacturer warranty|1-Year Limited',
        'EU spare part availability|2 Years',
        'ASIN|B016UG6PWE',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    // ATENCAO: A FICHA DO GB70 **NAO** PUBLICA LIMITE DE CILINDRADA, ENTAO NENHUMA
    // RESPOSTA AQUI CITA TAMANHO DE MOTOR.
    'faq' => [
        'How much power does the NOCO Boost GB70 put out?|The listing gives 2000 peak amps at 12 volts, from a lithium ion cell. That is double the output of the GB40 at the top of our ranking, which is why the GB70 is the pick for bigger engines.',
        "What is the battery capacity of the GB70?|The listing does not publish a usable figure. There is a battery capacity row, but it reads 2000 Amp Hours, the same 2000 that appears under amperage and under peak output current. Amp hours are not amps, so read that row as the peak output leaking into the wrong field rather than as a capacity.",
        "What vehicles does the listing cover?|The compatible vehicle type field names boats, motorcycles and passenger cars, and the automotive fit type is given as universal. The listing publishes no engine size limits, so it does not tell you the largest engine it will turn.",
        "What comes in the box?|The included components field names four things: the GB70 jump starter power pack, a microfibre storage bag, a USB-C charging cable and a user guide. Jump leads are not named in that field.",
        'How heavy is it and how big?|The specification table gives 2 kg, and the dimensions as 18.8 x 32 x 9.4 centimetres. Those are the figures the listing gives; it does not say whether the 32cm width is the pack itself or its packaging.',
        "What warranty does the listing give?|A 1-Year Limited manufacturer warranty, with EU spare part availability listed as 2 years. The listing also states Specification Met: UL, which is what the page publishes rather than anything we have verified.",
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => 'If you are trying to decide whether to spend this amount of money and wondering if it actually works, then I can confirm it does.',
            'author' => 'Clifford Clarkson',
            'rating' => 5,
            'date' => '20 November 2025',
            'title' => 'Best thing I have ever purchased.',
            'verified' => true,
        ],
        [
            'text' => "The Noco GB Genius jump starter pack is unbelievable! With the inbuilt technology, it's impossible to get the polarity wrong as it indicates the incorrect connections and just won't work.",
            'author' => 'Jay',
            'rating' => 5,
            'date' => '1 February 2021',
            'title' => "Just a fantastic piece of equipment that'll give you total peace of mind!",
            'verified' => true,
        ],
    ],
];
