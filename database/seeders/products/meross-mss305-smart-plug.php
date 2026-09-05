<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// PAGINA DO #3 DE 10 NO ARTIGO "Best Smart Plug 2026". 1.206 AVALIACOES.
//
// ─── ACHADO 1: A UNICA QUE FAZ A CONTA NA FRENTE DO CLIENTE — E ERRA A TENSAO ───
//   BULLET: "This WiFi plug can handle a load of up to **13A, 3120W**".
//   TABELA: "Amperage: **13 Amps**"  +  "Voltage: **240 Volts**".
//   13 × 240 = 3.120 ✓ — A ARITMETICA FECHA PERFEITAMENTE, E E A UNICA DAS DEZ QUE
//   MOSTRA O RESULTADO PARA O COMPRADOR EM VEZ DE DEIXAR ELE MULTIPLICAR.
//   ⚠ MAS 240 V E A TENSAO BRITANICA **ANTIGA**. DESDE A HARMONIZACAO DE 1995 A REDE E
//   230 V NOMINAL, ONDE 13 A DAO 2.990 W. OU SEJA, O NUMERO PUBLICADO E 130 W ACIMA.
//   A MARCA QUE MOSTRA A CONTA E JUSTAMENTE A QUE DA PARA CONFERIR — E CONFERINDO,
//   APARECE A TENSAO VELHA. ISSO VAI NA INTRO.
//
// ─── ACHADO 2: TRES FICHAS DO SITE, TRES TENSOES ───
//   TAPO P110 ..... 220 V  →  13 A = 2.860 W
//   MEROSS MSS305 . 240 V  →  13 A = 3.120 W   (ESTA)
//   TAPO TP11 ..... 240 V  →  (nao publica corrente)
//   MESMO RELE DE 13 A, **260 W** DE DIFERENCA ENTRE A PRIMEIRA E A SEGUNDA.
//   AS TRES PAGINAS DO SITE AGORA MOSTRAM AS TRES FICHAS, CONFERIVEIS UMA A UMA.
//
// ─── ACHADO 3: O CAMPO DE COR GUARDA O TAMANHO DO PACOTE ───
//   "Colour: **2 Pack**". E "Number of Items: **1**" NUM ANUNCIO DE DOIS, ENQUANTO
//   "Number of Packs: 2", "Unit Count: 2.0 count" E "Included Components: Smart plug x 2"
//   CONCORDAM QUE SAO DOIS. TRES CAMPOS CERTOS, UM ERRADO.
//
// ─── O QUE ELA ACERTA E OS CONCORRENTES ERRAM ───
//   "Number of Poles: 3" E "Number Of Wires: 3" — CORRETO PARA PLUGUE BRITANICO
//   (FASE, NEUTRO E TERRA). A EIGHTREE DO MESMO RANKING DECLARA 4 FIOS.
//   E "Plug Type: Type G", CERTO, CONTRA O "Schuko" DA FICHA DO P110.
//   ELA TAMBEM PUBLICA DIMENSAO REAL (61 × 33 × 48 mm), QUE O TP11 NAO PUBLICA.
//
// ─── PRECO POR TOMADA ───
//   £16.99 / 2 = **£8.50 POR TOMADA**, CONTRA £7.99 DOS DOIS PACOTES DA TAPO.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE**, COM AUTOR, DATA, NOTA E SELO DE COMPRA
//   VERIFICADA CONFERIDO NA FICHA. AS DUAS SAO POSITIVAS (DECISAO DO FELIPE).
//   ⚠ DESCARTADA A AVALIACAO DO "Mr E." (4 ESTRELAS): O TEXTO DELA E SOBRE O PACOTE DE
//   **QUATRO**, QUE E OUTRO ANUNCIO. NAO SE CITA AVALIACAO DE OUTRO PRODUTO.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-smart-plug',
    'asin' => 'B0CGC6235V',
    'slug' => 'meross-mss305-smart-plug',

    'meta_title' => 'Meross MSS305 Smart Plug Review: Specs and Ratings',
    'meta_description' => 'Everything the Amazon listing publishes about the Meross MSS305 two-pack: price per socket, the spec table, how the ratings break down, and what buyers say.',

    'page_intro' => "The Meross MSS305 is a mini energy-monitoring smart plug sold here as a two-pack, and it takes third place in our smart plug ranking. At GBP 16.99 for two that is GBP 8.50 a socket, about fifty pence more than either Tapo multipack. It works with Alexa, Google Home and SmartThings, needs no hub, and keeps working on the local network if the router loses its internet connection.\n\nIt is also the only plug in that ranking that does the arithmetic for you, and that turns out to be worth checking. A bullet states the plug handles a load of up to 13A and 3120W, and the specification table backs it with 13 amps and 240 volts, so 13 times 240 is exactly 3,120 and the sum is perfect. The voltage is the old one. British mains has been 230 volts nominal since 1995, where 13 amps carries 2,990 watts, so the published figure runs about 130 watts high. The brand that shows its working is the one you can check, and checking finds the pre-1995 number.",

    'harvested_at' => '2026-09-03 17:00:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 78, 4 => 14, 3 => 5, 2 => 1, 1 => 2],

    // FICHA COPIADA DA TABELA. OS CAMPOS DE LIXO FICAM ROTULADOS "(as listed)",
    // PORQUE ELES **SAO** O ACHADO — NAO SE CORRIGE EM SILENCIO.
    'tech_specs' => [
        'Amperage|13 Amps',
        'Voltage (as listed)|240 Volts',
        'Plug type|Type G',
        'Number of poles|3',
        'Number of wires|3',
        'Connector type|Plug in',
        'Item dimensions (D x W x H)|61 x 33 x 48 millimetres',
        'Item weight|180 g',
        'Material|Acrylonitrile Butadiene Styrene (ABS)',
        'Product grade|Residential',
        'Included components|Smart plug x 2, User manual x 1',
        'Number of packs|2',
        'Unit count|2.0 count',
        'Number of items (as listed)|1',
        'Colour (as listed)|2 Pack',
        'Product warranty|2 year manufacturer',
        'Model number|MSS305',
        'Specification met (as listed)|CE',
        'ASIN|B0CGC6235V',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    'faq' => [
        'How many watts can the Meross MSS305 take?|The listing states 13A and 3120W, and its table gives 13 amps at 240 volts, so the sum is exact. British mains is 230 volts nominal, where 13 amps carries 2,990 watts, so treat 3,120 as the ceiling on the old voltage rather than a promise. Either way, a 3kW kettle or heater sits right at the limit.',
        'Does it need a hub?|No. The listing says no hub is required, and lists compatibility with Alexa, Google Home and SmartThings over Wi-Fi.',
        'Does it still work if the internet goes down?|The listing says yes for devices on the same network: it describes local and offline control, so devices on the same LAN can still be controlled if the router loses its internet connection. That is the maker claim; we have not tested it.',
        'How many plugs do you get?|Two. The listing names "Smart plug x 2" in its components, gives "Number of Packs: 2" and "Unit Count: 2.0", and even puts "2 Pack" in the colour field. One field disagrees: "Number of Items" reads 1.',
        'How big is each plug?|The table gives 61 x 33 x 48 millimetres and 180 grams for the pair. That is one of the few listings in this ranking that publishes a real size, which matters if you need to know whether it blocks the second socket.',
        'What does the energy monitoring show?|Meross sells it on tracking appliance consumption in detail through its app. The listing does not publish an accuracy tolerance for the measurement, so treat the readings as a guide rather than a meter reading.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => "I've got 12 of these, and they are so simple to use with Alexa & Home Assistant. I use them with Home Assistant for the energy monitoring which allows me to spot high use appliances, and then automate them if I don't need them on all the time.",
            'author' => 'Reg Skelton',
            'rating' => 5,
            'date' => '6 January 2026',
            'title' => 'Top quality, great functionality, excellent support - highly recommended',
            'verified' => true,
        ],
        [
            'text' => "Purchased a set of two Meross Smart Plugs a month or two ago. We have been so impressed with the quality and ease of use that we ordered another set (of four!)",
            'author' => 'H. & T.',
            'rating' => 5,
            'date' => '20 April 2024',
            'title' => 'SO easy to setup & use! - Simply Brilliant!',
            'verified' => true,
        ],
    ],
];
