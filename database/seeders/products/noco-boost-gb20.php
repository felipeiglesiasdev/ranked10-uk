<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// GB20 E O #5 DE 10 NO ARTIGO "BEST JUMP STARTER 2026". PRECO GBP 71.99,
// MEDIA 4.6 SOBRE 12.968 AVALIACOES.
//
// ─── ACHADO 1: O MESMO ERRO DE UNIDADE DO GB70, AGORA NO GB20 ───
//   A TABELA DECLARA "Battery Capacity: 500 Amp Hours". MAS "Amperage" TAMBEM DA
//   500 Amps E "Peak Output Current" TAMBEM DA 500 Amps. OS TRES CAMPOS CARREGAM
//   O **MESMO NUMERO**: E O PICO DE CORRENTE COPIADO PARA O CAMPO DE CAPACIDADE,
//   NA UNIDADE ERRADA (Ah NAO E A). CONSEQUENCIA PRATICA: A FICHA **NUNCA PUBLICA**
//   O TAMANHO REAL DA BATERIA. COMPARACAO INTERNA DA PROPRIA NOCO NA AMAZON.CO.UK:
//   O GB40 PUBLICA "2150 Milliamp Hours" NO MESMO CAMPO; O GB20 NAO PUBLICA NADA.
//   PADRAO JA VISTO NO GB70 — LOGO, NAO E DESLIZE ISOLADO DE UM SKU.
//
// ─── ACHADO 2: DIMENSOES IDENTICAS AS DO GB40, COM MENOS DA METADE DO PESO ───
//   GB20: 11.7 x 20.8 x 10.7 cm, 454 g.
//   GB40: 11.7 x 20.8 x 10.7 cm, 1.09 kg (1090 g).
//   MESMA CAIXA DECLARADA, PESO DE 41,7% DO GB40 (454 / 1090). OU O CAMPO DE
//   DIMENSAO FOI COPIADO ENTRE OS DOIS ANUNCIOS, OU ELE DESCREVE A EMBALAGEM E NAO
//   O APARELHO. A FICHA NAO DIZ QUAL DOS DOIS. FICA REGISTRADO SEM CORRIGIR.
//
// ─── ACHADO 3: A LISTA DO QUE VEM NA CAIXA NAO CITA CABOS ───
//   "Included Components" DO GB20: pack, bolsa de microfibra, cabo USB, manual.
//   A MESMA LINHA NO GB40 CITA "Heavy Duty Jump Leads" EXPLICITAMENTE.
//   NAO AFIRMAMOS QUE FALTAM CABOS — AFIRMAMOS QUE A FICHA NAO OS NOMEIA.
//
// ─── FORMA DA DISTRIBUICAO ───
//   79% cinco / 12% quatro / 3% tres / 1% duas / **5% UMA ESTRELA**.
//   UMA ESTRELA (5%) APARECE MAIS QUE DUAS E TRES SOMADAS (1%+3%=4%). CURVA EM J
//   OUTRA VEZ, PORTANTO A MEDIA DE 4.6 ESCONDE UM BLOCO DE 5% DE INSATISFEITOS.
//   EM 12.968 AVALIACOES, ESSES 5% SAO CERCA DE 648 VOTOS DE UMA ESTRELA.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE** DA FICHA, COM AUTOR, DATA, NOTA E SELO DE
//   COMPRA VERIFICADA. NUNCA GERAR, RESUMIR NEM TRADUZIR CITACAO.
//   DECISAO DO FELIPE (03/09/2026): AS DUAS CITACOES SAO POSITIVAS (5 E 5) — A
//   PAGINA VENDE. O SINAL NEGATIVO NAO SUMIU: A BARRA DE 1 ESTRELA CONTINUA
//   MOSTRANDO OS 5% NA DISTRIBUICAO, ENTAO O LEITOR VE O NUMERO SEM QUE A CITACAO
//   O EMPURRE PARA LA.
//
// ⚠ A FICHA DECLARA "Specification Met: UL" (O GB40 DECLARA CE — CAMPOS DIFERENTES
//   PARA A MESMA FAMILIA DE PRODUTO). REPORTADO COMO O QUE O ANUNCIO PUBLICA,
//   SEM AFIRMAR CONFORMIDADE NEM CERTIFICACAO DE NADA.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-jump-starter',
    'asin' => 'B015TKPT1A',
    'slug' => 'noco-boost-gb20',

    'meta_title' => 'NOCO Boost GB20 Review: Specs, Ratings and Price',
    'meta_description' => 'Everything the Amazon listing publishes about the NOCO Boost GB20 500A jump starter: price, the specification table, its ratings breakdown and buyer quotes.',

    'page_intro' => "The NOCO Boost GB20 500A UltraSafe Jump Starter Power Pack is the cheapest way into the NOCO Boost range, and it takes fifth place in our jump starter ranking. It is the lightest of the four NOCO packs in that ranking at 454g, which is the concrete reason to pick it: it rides in a motorbike seat pack or a glovebox without being noticed. Everything on this page comes from the Amazon listing rather than from our own testing, including the GBP 71.99 price, the specification table, the spread of its 12,968 ratings and two review quotes copied word for word.\n\nOne line of that specification rewards a closer look. The battery capacity field reads 500 Amp Hours, but the Amperage field also reads 500 Amps and the Peak Output Current field reads 500 Amps as well. The same number sits in all three, so what the capacity row actually shows is the peak current in the wrong unit, and the listing never publishes the real size of the battery. The dimensions are worth a second look too: 11.7 x 20.8 x 10.7 centimetres, the same figures the GB40 listing gives, even though the GB20 weighs 454 g against the GB40's 1.09 kg.",

    'harvested_at' => '2026-09-03 15:00:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 79, 4 => 12, 3 => 3, 2 => 1, 1 => 5],

    // FICHA TECNICA COPIADA DA TABELA DA AMAZON. LINHAS DE LIXO DE CATALOGO FORAM
    // DESCARTADAS. A LINHA DE CAPACIDADE FICA NA PAGINA **COM O ROTULO HONESTO**,
    // PORQUE ELA MESMA E O ACHADO — NAO CORRIGIMOS O VALOR EM SILENCIO.
    'tech_specs' => [
        'Brand|NOCO',
        'Model number|GB20',
        'Manufacturer part number|GB20',
        'Item type|Jump Starter',
        'Peak output current|500 Amps',
        'Amperage|500 Amps',
        'Battery capacity (as listed)|500 Amp Hours',
        'Voltage|12 Volts',
        'Battery cell composition|Lithium Ion',
        'Compatible vehicle type|Boat, Moto, Passenger Car',
        'Automotive fit type|Universal Fit',
        'Item dimensions (D x W x H)|11.7 x 20.8 x 10.7 centimetres',
        'Item weight|454 g',
        'Included components|GB20 Jump Starter Power Pack, Microfibre Storage Bag, USB Charging Cable, User Guide',
        'Number of items|1',
        'Specification met (as listed)|UL',
        'Manufacturer warranty|1-Year Limited',
        'EU spare part availability|1 Year',
        'ASIN|B015TKPT1A',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    'faq' => [
        'What will the NOCO Boost GB20 start?|The listing gives 500 peak amps and names boats, motorbikes and passenger cars as the compatible vehicle types, with a universal fit. It does not publish an engine size limit, so read it as the small end of the NOCO Boost range rather than a big-engine pack.',
        'How big is the battery?|The listing does not say. The battery capacity field reads 500 Amp Hours, which is the peak current figure in the wrong unit: the Amperage and Peak Output Current rows both give 500 Amps as well. The cells are lithium ion at 12 volts, and that is as far as the specification goes.',
        'How heavy is it and will it fit a glovebox?|The specification table gives 454 g and 11.7 x 20.8 x 10.7 centimetres. That weight is less than half the 1.09 kg the GB40 listing gives, although both listings publish the same dimensions.',
        'What comes in the box?|The listing names four things: the GB20 pack itself, a microfibre storage bag, a USB charging cable and a user guide. It does not name jump leads in that list, while the GB40 listing names heavy duty jump leads in the same field.',
        'Is the GB20 certified?|We make no claim either way. The specification table has a field called Specification Met, and on this listing it reads UL. That is what the listing publishes, nothing more.',
        'What warranty does it come with?|NOCO gives a 1-Year Limited warranty according to the listing, and the same listing puts EU spare part availability at 1 year.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => "Jump started my car without me having to charge the device first. It was really simple to use. I am really impressed with it.",
            'author' => 'Jones',
            'rating' => 5,
            'date' => '6 March 2026',
            'title' => 'Great device. Highly recommend',
            'verified' => true,
        ],
        [
            'text' => "I literally never write reviews but this thing is so perfect and exactly what I was hoping it'd be that I had to give it 5 stars.",
            'author' => 'Lewis Beattie',
            'rating' => 5,
            'date' => '28 May 2021',
            'title' => "Great product. Use it for my motorbike and it's perfect.",
            'verified' => true,
        ],
    ],
];
