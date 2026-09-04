<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// PRIMEIRO PRODUTO A GANHAR PAGINA. ESCOLHIDO POR TER A MAIOR PROFUNDIDADE DE
// AVALIACAO DO SITE (126.359 NO ARTIGO) E POR VIR DE UM ARTIGO JA VERIFICADO.
//
// ─── ACHADO 1: A MEDIA DE 4.5 ESCONDE A FORMA DA DISTRIBUICAO ───
//   77% cinco estrelas / 11% quatro / 3% tres / 2% duas / **7% UMA ESTRELA**.
//   OU SEJA: UMA ESTRELA E O **SEGUNDO** VOTO MAIS COMUM, MAIS FREQUENTE QUE DUAS E
//   TRES SOMADAS (2%+3%=5%). E A CURVA EM J CLASSICA — QUEM COMENTA E QUEM AMOU OU
//   QUEM FICOU NA MAO. NENHUM CONCORRENTE MOSTRA ISSO; A PAGINA MOSTRA.
//
// ─── ACHADO 2: "PORTABLE POWER BANK" COM 2.150 mAh ───
//   O TITULO VENDE "Portable Power Bank". A TABELA DECLARA "Battery Capacity: 2150
//   Milliamp Hours". CELULAR MEDIO TEM BATERIA DE ~4.000 mAh, ENTAO O APARELHO NAO
//   CARREGA UM TELEFONE INTEIRO — DA UM REFORCO. NAO E MENTIRA, MAS E EXPECTATIVA ERRADA.
//
// ─── ACHADO 3: "ATE 20 PARTIDAS POR CARGA" x O QUE OS COMPRADORES RELATAM ───
//   OS BULLETS PROMETEM "Up to 20 starts per charge on engines up to 6.0L petrol".
//   HA AVALIACAO DE 1 ESTRELA NA FICHA (Dan, 24/01/2025, compra verificada) DESCREVENDO
//   O APARELHO QUASE DESCARREGADO DEPOIS DE POUCAS TENTATIVAS NUM DIESEL 2.0.
//   ⚠ ESSA CITACAO **NAO** ESTA NA PAGINA POR DECISAO COMERCIAL (VER NOTA DAS CITACOES).
//   FICA REGISTRADA AQUI PORQUE E MATERIA-PRIMA DO ESTUDO DE FICHAS DA AMAZON.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE** DA FICHA, COM AUTOR, DATA, NOTA E SELO DE
//   COMPRA VERIFICADA. NUNCA GERAR, RESUMIR NEM TRADUZIR CITACAO.
//   DECISAO DO FELIPE (03/09/2026): AS DUAS CITACOES SAO POSITIVAS — A PAGINA VENDE.
//   O SINAL NEGATIVO NAO SUMIU DA PAGINA: A BARRA DE 1 ESTRELA CONTINUA MOSTRANDO OS 7%
//   NA DISTRIBUICAO, ENTAO O LEITOR VE O NUMERO SEM QUE A CITACAO O EMPURRE PARA LA.
//
// ⚠ A FICHA DECLARA "Specification Met: CE". REPORTADO COMO O QUE O ANUNCIO PUBLICA,
//   SEM AFIRMAR CONFORMIDADE DE NADA.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-jump-starter',
    'asin' => 'B015TKUPIC',
    'slug' => 'noco-boost-gb40',

    'meta_title' => 'NOCO Boost GB40 Review: Specs, Ratings and Price',
    'meta_description' => 'Everything the Amazon listing publishes about the NOCO Boost GB40: price, the full specification table, how its ratings break down, and what buyers say.',

    'page_intro' => "The NOCO Boost GB40 is a 1000-amp lithium jump starter, and it takes first place in our jump starter ranking. Everything on this page comes from its Amazon listing rather than from our own testing: the price, the specification table, the spread of its customer ratings, and two review quotes copied word for word.\n\nTwo figures reward a closer look. The title sells the GB40 as a portable power bank, while the specification table puts its battery at 2,150mAh, which is a top-up rather than a full phone charge. And NOCO states up to 20 starts per charge on engines up to 6.0 litres of petrol, a figure worth reading next to the ratings breakdown below rather than on its own. Both come from the listing itself, so you can check either one.",

    'harvested_at' => '2026-09-03 14:30:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 77, 4 => 11, 3 => 3, 2 => 2, 1 => 7],

    // FICHA TECNICA COPIADA DA TABELA DA AMAZON. LINHAS DE LIXO DE CATALOGO
    // (o campo "Customer Reviews" vinha com JavaScript dentro) FORAM DESCARTADAS.
    'tech_specs' => [
        'Brand|NOCO',
        'Model number|GB40',
        'Manufacturer part number|GB40',
        'Peak output current|1000 Amps',
        'Amperage|1000 Amps',
        'Voltage|12 Volts',
        'Battery cell composition|Lithium Ion',
        'Battery capacity|2150 Milliamp Hours',
        'Compatible vehicle type|Boat, Moto, Passenger Car',
        'Automotive fit type|Universal Fit',
        'Item dimensions (D x W x H)|11.7 x 20.8 x 10.7 centimetres',
        'Item weight|1.09 kg',
        'Included components|GB40 Jump Starter Power Pack, Heavy Duty Jump Leads, Microfibre Storage Bag, USB-C Charging Cable',
        'Number of items|1',
        'Specification met (as listed)|CE',
        'Manufacturer warranty|1-Year Limited',
        'EU spare part availability|2 Years',
        'Best sellers rank|3 in Car Battery Jump Starters',
        'ASIN|B015TKUPIC',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA,
    // QUE E O UNICO RICH RESULT QUE O SITE AINDA NAO TINHA.
    'faq' => [
        'Will the NOCO Boost GB40 start a diesel?|The listing states it covers petrol engines up to 6.0 litres and diesel engines up to 3.0 litres, from 1000 peak amps. Above 3.0 litres of diesel NOCO points you at a bigger pack in the range, such as the GB70.',
        'How many jump starts do you get per charge?|NOCO states up to 20 starts per charge on engines up to 6.0 litres of petrol. That is the figure on the listing rather than one we measured, and how close you get to it depends on the engine and how flat the battery is.',
        'Can it charge a phone?|The specification table gives the battery as 2,150mAh. A typical phone battery is around 4,000mAh, so treat the power bank function as an emergency top-up rather than a full charge.',
        'What happens if I connect the clamps the wrong way round?|NOCO states the GB40 has spark-proof technology and reverse polarity protection, so a wrong connection does not spark. That is the maker claim; we have not tested it.',
        'What comes in the box?|The listing names the GB40 pack itself, heavy duty jump leads, a microfibre storage bag and a USB-C charging cable.',
        'How heavy is it and will it fit a glovebox?|The specification table gives 1.09 kg and 11.7 x 20.8 x 10.7 centimetres, so it fits most gloveboxes and every boot.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => 'It started my wife’s (1.4L petrol) engine immediately when the car battery went flat, and again the next day, without a recharge in between.',
            'author' => 'Gwyn',
            'rating' => 5,
            'date' => '21 January 2024',
            'title' => 'It starts engines and it’s handy for camping',
            'verified' => true,
        ],
        [
            'text' => 'I am always sceptical of these units and went for a brand that is well known and trusted, and I am glad I did. I have a 2.2l Diesel and it started it first time, so power wise, no issues.',
            'author' => 'Murray Low',
            'rating' => 5,
            'date' => '2 September 2026',
            'title' => 'Will charge a completely dead battery.',
            'verified' => true,
        ],
    ],
];
