<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// PRECO NA COLETA: GBP 118.18. NOTA 4.5 SOBRE 15.015 AVALIACOES.
// POSICAO #4 DE 10 NO ARTIGO "Best Jump Starter 2026".
//
// ─── ACHADO 1: A TABELA SE CONTRADIZ NO NUMERO DE CAPA (TRES LINHAS, DOIS VALORES) ───
//   "Amperage" = **1250 Amps** (bate com o titulo do anuncio).
//   "Peak Output Current" = **250 Amps**, NA LINHA SEGUINTE. UM QUINTO DO ANTERIOR.
//   "Battery Capacity" = **250 Amp Hours**, QUE REPETE O MESMO 250.
//   OU SEJA: 1250 APARECE 1 VEZ, 250 APARECE 2 VEZES, NA MESMA TABELA, NA MESMA PAGINA.
//   UMA DAS LINHAS ESTA ERRADA E A FICHA NAO DIZ QUAL. QUEM COMPARA BOOSTER POR PICO DE
//   AMPERAGEM — QUE E COMO A CATEGORIA INTEIRA E COMPARADA — PODE LER 250 E DESCARTAR
//   O PRODUTO, OU LER 1250 E COMPRAR OUTRA COISA. AS TRES LINHAS ESTAO NA PAGINA COM
//   O ROTULO "(as listed)". NADA FOI CORRIGIDO EM SILENCIO.
//
// ─── ACHADO 2: "250 Amp Hours" E UNIDADE ERRADA, IGUAL AO GB40 ───
//   MESMO PADRAO JA REGISTRADO NO GB40 (que declarava mAh onde o titulo vendia power bank):
//   AQUI A CAPACIDADE VEM EM **Amp Hours** EM VEZ DE MILIAMPERE-HORA. 250 Ah NUM APARELHO
//   DE 1,2 kg E FISICAMENTE IMPOSSIVEL — 250 Ah A 12 V SERIA 3 kWh, BATERIA DE CASA.
//   O CAMPO PARECE TER HERDADO O VALOR DA LINHA DE PICO. SEGUNDO SINAL DE QUE O 250 E
//   QUE ESTA CONTAMINANDO A TABELA, E NAO O 1250.
//
// ─── ACHADO 3: "Specification Met: Energy" NAO E NOME DE NORMA ───
//   O GB40 DECLARAVA "CE" NESSE CAMPO. AQUI O MESMO CAMPO DECLARA "Energy", QUE NAO
//   IDENTIFICA NORMA, ORGAO NEM CERTIFICADO. REPORTADO COMO O QUE O ANUNCIO PUBLICA,
//   COM ROTULO "(as listed)", SEM AFIRMAR CONFORMIDADE DE COISA NENHUMA.
//
// ─── FORMA DA DISTRIBUICAO ───
//   79% cinco / 9% quatro / 4% tres / 1% duas / **7% UMA ESTRELA**.
//   DE NOVO A CURVA EM J: UMA ESTRELA E O **TERCEIRO** VOTO MAIS COMUM (QUATRO ESTRELAS, COM 9%, VEM ANTES), MAIS FREQUENTE
//   QUE DUAS E TRES SOMADAS (1%+4%=5%). PRATICAMENTE IDENTICA A DO GB40 (77/11/3/2/7),
//   O QUE SUGERE ASSINATURA DA CATEGORIA E NAO DEFEITO DE UM MODELO.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE** DA FICHA, COM AUTOR, DATA, NOTA E SELO DE
//   COMPRA VERIFICADA. NUNCA GERAR, RESUMIR NEM TRADUZIR CITACAO.
//   DECISAO DO FELIPE (03/09/2026): AS DUAS CITACOES SAO POSITIVAS — A PAGINA VENDE.
//   O SINAL NEGATIVO NAO SUMIU: A BARRA DE 1 ESTRELA CONTINUA MOSTRANDO OS 7% NA
//   DISTRIBUICAO, ENTAO O LEITOR VE O NUMERO SEM QUE A CITACAO O EMPURRE PARA LA.
//
// ⚠ MATERIA-PRIMA DO ESTUDO, NAO USADA NA PAGINA: A AVALIACAO DE 5 ESTRELAS DE
//   Gavin Clee (21/09/2025, compra verificada) ESCREVE "1250A peak current is no joke".
//   E EVIDENCIA DIRETA DO ACHADO 1: O COMPRADOR ADOTA O NUMERO DO **TITULO** E NUNCA
//   VE A LINHA DE 250 A. FICOU DE FORA DAS CITACAOES SO POR TAMANHO (109 CARACTERES).
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-jump-starter',
    'asin' => 'B0924V8SPC',
    'slug' => 'noco-boost-x-gbx45',

    'meta_title' => 'NOCO Boost X GBX45 Review: Specs, Ratings and Price',
    'meta_description' => 'Everything the Amazon listing publishes about the NOCO Boost X GBX45: price, the full spec table, how its 15,015 ratings break down, and buyer quotes.',

    'page_intro' => "The NOCO Boost X GBX45 is a 12-volt lithium jump starter, and it takes fourth place in our ranking of ten car battery boosters. It sold for GBP 118.18 on the day we collected the listing. Buyers pick this one for the charging rather than the raw grunt: the listing gives a 48-minute recharge over USB-C, and 60W out over USB-C, so it will also feed a laptop. Everything on this page comes from the Amazon listing rather than from our own testing — the price, the specification table, the spread of its 15,015 customer ratings, and two review quotes copied word for word.\n\nOne figure is worth reading twice, because the listing gives it twice and gives it differently. The specification table puts Amperage at 1250 Amps, which matches the product title. Further down the same table, Peak Output Current reads 250 Amps, a fifth of that. Battery Capacity then repeats the same 250, quoted as amp hours rather than milliamp hours. Peak amps is the number this whole category gets compared on, so a shopper reading the table instead of the title would take away a very different jump starter. Both values sit in the specification below exactly as the listing publishes them, and nothing there says which row is the mistake.",

    'harvested_at' => '2026-09-03 15:00:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 79, 4 => 9, 3 => 4, 2 => 1, 1 => 7],

    // FICHA TECNICA COPIADA DA TABELA DA AMAZON. LINHAS DE LIXO DE CATALOGO
    // (Manufacturer repetindo a marca, Item Type Name repetindo o titulo) DESCARTADAS.
    // AS TRES LINHAS DO ACHADO 1 FICAM, COM ROTULO "(as listed)", SEM CORRECAO.
    'tech_specs' => [
        'Brand|NOCO',
        'Model number|GBX45',
        'Manufacturer part number|GBX45',
        'Amperage (as listed)|1250 Amps',
        'Peak output current (as listed)|250 Amps',
        'Battery capacity (as listed)|250 Amp Hours',
        'Voltage|12 Volts',
        'Battery cell composition|Lithium Ion',
        'Compatible vehicle type|Boat, Moto, Passenger Car, SUV',
        'Automotive fit type|Universal Fit',
        'Item dimensions (D x W x H)|12.6 x 20.9 x 9.2 centimetres',
        'Item weight|1.2 kg',
        'Included components|GBX45 UltraSafe Jump Starter Power Pack, Heavy-Duty Jumper Cable Clamps, Microfiber Storage Bag',
        'Number of items|1',
        'Specification met (as listed)|Energy',
        'EU spare part availability|2 Years',
        'ASIN|B0924V8SPC',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    'faq' => [
        'How many amps does the NOCO Boost X GBX45 put out?|The listing gives two different answers. Amperage reads 1250 Amps, the same figure as the product title, while Peak Output Current, further down the same table, reads 250 Amps. We publish both exactly as listed, because nothing on the page says which one is right.',
        "How long does it take to charge?|The listing gives a full recharge in 48 minutes over USB-C. That is NOCO's own figure, taken from the product title, rather than a time we measured.",
        'Can it charge a laptop?|The listing gives 60W over USB-C, which covers a lot of USB-C laptops. NOCO sells the GBX45 as a jump starter first, so treat the power delivery as a second job rather than the main one.',
        'Which vehicles does it cover?|The specification table names boats, motorbikes, passenger cars and SUVs, with a universal automotive fit. It does not publish an engine size limit, so the table alone will not tell you whether it suits a big diesel.',
        'What comes in the box?|The listing names three things: the GBX45 UltraSafe jump starter power pack, heavy-duty jumper cable clamps and a microfibre storage bag.',
        'How big and heavy is it?|The table gives 12.6 x 20.9 x 9.2 centimetres and 1.2 kg, so it is glovebox sized and light enough to live in a door pocket.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => 'I purchased this in 2024 and have only just had an occasion to use it. I charged it in 2024, and it was still fully charged in 2026, even after sitting in the boot of the car all that time.',
            'author' => 'Crazylife',
            'rating' => 5,
            'date' => '9 July 2026',
            'title' => 'Thoroughly impressed.',
            'verified' => true,
        ],
        [
            'text' => "I bought this in October 2021, after my car battery had run flat at the train station after a weekend away, and the AA couldn't get to me for at least 2hrs!! I have 3L diesel so needed something with some power.",
            'author' => 'M. L. Wells',
            'rating' => 5,
            'date' => '4 July 2026',
            'title' => "Works every time, and there's been lots of times.",
            'verified' => true,
        ],
    ],
];
