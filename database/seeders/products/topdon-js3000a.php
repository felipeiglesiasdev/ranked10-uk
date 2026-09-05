<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// PRODUTO #10 DE 10 NO ARTIGO "Best Jump Starter 2026". PRECO £119.98,
// NOTA 4.7 SOBRE 127 AVALIACOES — A MENOR PROFUNDIDADE DE AVALIACAO DA LISTA.
//
// ─── ACHADO 1: A DISTRIBUICAO TEM DUAS ESTRELAS ACIMA DE QUATRO ───
//   90% cinco / 3% quatro / 2% tres / **4% DUAS** / 1% uma.
//   OU SEJA: DUAS ESTRELAS (4%) E MAIS COMUM QUE QUATRO ESTRELAS (3%). A CURVA NAO
//   DESCE DE FORMA SUAVE A PARTIR DAS CINCO, O QUE QUASE NUNCA ACONTECE.
//   ⚠ RESSALVA HONESTA: A BASE E DE **127** AVALIACOES. ARITMETICA SIMPLES SOBRE OS
//   PERCENTUAIS PUBLICADOS (3% E 4% DE 127) DA ALGO COMO 4 E 5 AVALIACOES — UMA
//   UNICA NOTA MUDA A ORDEM DAS DUAS BARRAS. A FORMA E REAL, A MARGEM E MINIMA.
//   POR ISSO A PAGINA REGISTRA O FATO **COM** O TOTAL DE 127 NA MESMA FRASE.
//
// ─── ACHADO 2: 2,26 kg — O MAIS PESADO DO RANKING ───
//   A TABELA DECLARA "Item Weight: 2.26 kg". E O PACOTE MAIS PESADO DOS 10.
//   COMPARACAO DO PROPRIO RANKING: **CINCO VEZES** OS 454 g DO NOCO GB20.
//   MUDA A DECISAO DE COMPRA: E ITEM DE PORTA-MALAS, NAO DE PORTA-LUVAS.
//   A FICHA **NAO PUBLICA DIMENSOES** (nao ha linha de Item Dimensions), ENTAO A
//   PAGINA DIZ ISSO EM VEZ DE ESTIMAR TAMANHO.
//
// ─── ACHADO 3: 3000 AMPS APARECE DUAS VEZES, COM ROTULOS DIFERENTES ───
//   "Peak Output Current|3000 Amps" E "Amperage|3000 Amps". O MESMO NUMERO OCUPA A
//   LINHA DE PICO E A LINHA DE AMPERAGEM SIMPLES, O QUE SUGERE QUE 3000 E SEMPRE O
//   PICO. AS DUAS LINHAS FICAM NA FICHA DA PAGINA, LADO A LADO, SEM CORRECAO.
//
// ─── ACHADO 4: NUMERO DE PECA NAO BATE COM O NOME DO MODELO ───
//   O TITULO VENDE "JS3000A". A TABELA DECLARA "Manufacturer Part Number:
//   JUMPSURGE3000". SAO DUAS NOMENCLATURAS PARA O MESMO ITEM DENTRO DA MESMA FICHA.
//   AS DUAS ENTRAM NA TABELA DA PAGINA.
//
// ─── ACHADO 5: "Item Highlight" TRAZ DADO QUE FALTA NO RESTO DA TABELA ───
//   "for 9.0L Gas or 7L Diesel Engines, Jump Starter with LED Flashlight, 24000mAh".
//   E A **UNICA** FONTE DE COBERTURA DE MOTOR NA FICHA INTEIRA. POR ISSO A LINHA
//   NAO FOI DESCARTADA COMO LIXO DE CATALOGO: ELA E MANTIDA E ROTULADA COMO
//   "Item highlight (as listed)". "Gas" E O TERMO AMERICANO PARA GASOLINA, COPIADO
//   COMO ESTA NO ANUNCIO.
//
// ⚠ A FICHA DECLARA "Specification Met: UL". REPORTADO COMO O QUE O ANUNCIO PUBLICA,
//   SEM AFIRMAR CONFORMIDADE NEM CERTIFICACAO DE NADA. O MESMO VALE PARA O
//   "Stop Spark Sensor" DO TITULO: A FICHA DA O NOME, NAO DA O FUNCIONAMENTO.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE** DA FICHA, COM AUTOR, DATA E NOTA.
//   NUNCA GERAR, RESUMIR NEM TRADUZIR CITACAO. OS TEXTOS FORAM CAPTURADOS TRUNCADOS
//   EM 270 CARACTERES, ENTAO SO FOI CITADO TRECHO QUE FECHA SOZINHO, LONGE DO CORTE.
//   DECISAO DO FELIPE (03/09/2026): AS DUAS CITACOES SAO POSITIVAS — A PAGINA VENDE.
//   O SINAL NEGATIVO NAO SUMIU: A BARRA DE 1 ESTRELA (1%) E A DE 2 ESTRELAS (4%)
//   CONTINUAM VISIVEIS NA DISTRIBUICAO, E O ACHADO 1 ESTA NO TEXTO DE ABERTURA.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-jump-starter',
    'asin' => 'B09XBF5VTR',
    'slug' => 'topdon-js3000a',

    'meta_title' => 'TOPDON JS3000A Review: Specs, Ratings and Price',
    'meta_description' => 'Everything the Amazon listing publishes about the TOPDON JS3000A: price, the full specification table, how its ratings break down, and what buyers say.',

    'page_intro' => "The TOPDON JS3000A Car Jump Starter with Stop Spark Sensor is a lithium pack the listing rates at 3,000 peak amps, from a vehicle diagnostics brand, and it takes tenth place in our jump starter ranking. It was GBP 119.98 when we collected the listing. Everything on this page comes from that listing rather than from our own testing: the price, the specification table, the spread of its customer ratings, and two review quotes copied word for word. We placed it tenth as the professional-leaning pack in the group; the listing's own highlight line names an LED flashlight and the 24,000mAh battery, which suit someone who jump starts often rather than once a year.\n\nThe most telling figure is the weight. The table gives 2.26 kg, the heaviest pack in our ranking and five times the 454g of the NOCO GB20, so this is a boot item rather than a glovebox one. Two other details are worth a look. The table prints 3,000 amps twice, once as peak output current and once as plain amperage, so read 3,000 as the peak. And the ratings have an unusual shape: two stars, at 4%, is more common than four stars, at 3%, on a base of only 127 ratings.",

    'harvested_at' => '2026-09-03 15:00:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    // 4% DE DUAS ESTRELAS CONTRA 3% DE QUATRO — VER ACHADO 1.
    'rating_breakdown' => [5 => 90, 4 => 3, 3 => 2, 2 => 4, 1 => 1],

    // FICHA TECNICA COPIADA DA TABELA DA AMAZON. DESCARTADAS AS LINHAS DUPLICADAS DE
    // CATALOGO ("Manufacturer: TOPDON" repete "Brand Name: TOPDON").
    // AS DUAS LINHAS DE 3000 AMPS FICAM COMO ESTAO, LADO A LADO.
    'tech_specs' => [
        'Brand|TOPDON',
        'Model (from the product title)|JS3000A',
        'Manufacturer part number|JUMPSURGE3000',
        'Peak output current|3000 Amps',
        'Amperage|3000 Amps',
        'Voltage|12 Volts',
        'Battery cell composition|Lithium Ion',
        'Battery capacity|24000 Milliamp Hours',
        'Compatible vehicle type|ATV, Motorcycle, Passenger Car, SUV, Truck',
        'Item weight|2.26 kg',
        'Specification met (as listed)|UL',
        'Item highlight (as listed)|for 9.0L Gas or 7L Diesel Engines, Jump Starter with LED Flashlight, 24000mAh',
        'ASIN|B09XBF5VTR',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    'faq' => [
        'Will the TOPDON JS3000A start a diesel?|The listing covers engine size in one line, and it reads "for 9.0L Gas or 7L Diesel Engines". Gas is the American word for petrol, so that is 9.0 litres of petrol or 7 litres of diesel, from the 3,000 peak amps the table gives. TOPDON publishes no other engine figure.',
        'How many amps does it actually deliver?|The specification table prints 3,000 amps twice: once as peak output current and once as plain amperage. The same number in both rows points to 3,000 being the peak figure rather than a sustained one. Neither row is something we measured.',
        'How big is the battery?|The table gives 24,000 milliamp hours of lithium ion. The listing does not publish a USB output rating or a number of starts per charge, so we cannot tell you what else it will run or how many jumps you get between charges.',
        'How heavy is it, and will it fit a glovebox?|The table gives 2.26 kg. That makes it the heaviest pack in our ranking, five times the 454g of the NOCO GB20, so plan on the boot. The listing publishes no dimensions at all, so we cannot quote a size.',
        'What vehicles does the listing say it suits?|Compatible vehicle type is given as ATV, Motorcycle, Passenger Car, SUV and Truck. Together with the 9.0 litre petrol and 7 litre diesel figure, that is the whole of what the listing states about fit.',
        'What does the listing say about safety and approvals?|The specification table has a row reading "Specification Met: UL", and the product name carries a Stop Spark Sensor. Both are what the listing publishes: it gives the label and the name, not how either was tested, and we make no claim about certification.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => "Omg! Jumped a descovery td5 with a dead battery, within seconds it fired into life with so much power, it was astonishing",
            'author' => 'David S',
            'rating' => 5,
            'date' => '20 May 2026',
            'title' => 'Astonishing power.',
            'verified' => true,
        ],
        [
            'text' => "I'm very impressed with the Topdon js3000 it's started my 1.8 a few times and never failed I charge when it drops to 75% not to heavy good case I can honestly say it does the job",
            'author' => 'Jay',
            'rating' => 5,
            'date' => '17 November 2025',
            'title' => 'Reliable does what it should',
            'verified' => true,
        ],
    ],
];
