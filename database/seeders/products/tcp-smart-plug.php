<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 05/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// PAGINA DO #5 DE 10 NO ARTIGO "Best Smart Plug 2026". 1.489 AVALIACOES.
//
// ─── ACHADO 1: A UNICA FICHA DO RANKING CUJA CONTA **NAO FECHA DENTRO DELA MESMA** ───
//   TABELA: "Current Rating: 13 Amps" + "Operating Voltage: 240 Volts (AC)" + "Wattage: 2990 watts".
//   13 × 240 = 3.120, NAO 2.990. OS 2.990 W SAO O RESULTADO DE 13 × **230**.
//   OU SEJA, A FICHA DECLARA A TENSAO DE UM MUNDO (240 V) E A WATTAGE DE OUTRO (230 V),
//   NA MESMA TABELA. AS QUATRO ANTERIORES ERRAVAM A TENSAO MAS PELO MENOS MULTIPLICAVAM
//   CERTO; ESTA MISTURA AS DUAS. ISSO VAI NA INTRO.
//   ⚠ E A STRING DE "Included Components" CARIMBA OS DOIS JUNTOS, POR EXTENSO:
//     "TCP 13A 240V 2.4Hz 2990W Smart Wi-Fi Socket" — 240 V E 2.990 W LADO A LADO,
//     QUE NAO SE MULTIPLICAM, MAIS "2.4Hz", QUE E O 2.4 GHz DO WI-FI ENFIADO NUM CAMPO
//     ELETRICO (A REDE E 50 Hz; NADA ALI E 2,4 Hz). TRES NUMEROS, DUAS TROCAS.
//
// ─── ACHADO 2: E A PRIMEIRA DO RANKING **SEM MEDICAO DE ENERGIA** ───
//   AS QUATRO ANTERIORES SE VENDEM POR "energy monitoring". ESTA SE VENDE POR
//   "energy-saving" (AGENDA E DESLIGAR REMOTO), QUE E OUTRA COISA: DESLIGAR PRA
//   ECONOMIZAR NAO E O MESMO QUE MEDIR O CONSUMO. NENHUM BULLET PROMETE MEDICAO, E HA
//   UMA PERGUNTA DE CLIENTE NA PROPRIA FICHA: "Does it have an energy monitoring feature?".
//   A PAGINA DIZ ISSO SEM DRAMA — QUEM SO QUER LIGAR/DESLIGAR NA VOZ NAO PERDE NADA.
//
// ─── ACHADO 3: O DIFERENCIAL REAL, E ELE E BOM ───
//   INTERRUPTOR FISICO NO CORPO ("Operation Mode: Manual" DE VERDADE E UM BOTAO) +
//   SIRI SHORTCUTS **SEM HUB MATTER**. E A MAIS COMPATIVEL DA PAGINA (Alexa + Google +
//   Siri, sem hub). A PAGINA VENDE POR AI.
//
// ─── ACHADO 4: OS CAMPOS DE CATALOGO, COMO SEMPRE ───
//   "Terminal: Screw" NUM PLUGUE MOLDADO SEM PARAFUSO. "Mounting Type: No Mount".
//   "Number of Positions: 4", QUE E O TAMANHO DO PACOTE. "Number of Items: 1" NUM
//   PACOTE DE QUATRO (enquanto "Unit Count: 4.0" e "Number of Positions: 4" concordam
//   que sao quatro). "Country Of Origin: USA" (TCP e marca de iluminacao).
//
// ─── PRECO POR TOMADA ───
//   £44.00 / 4 = **£11.00 POR TOMADA** — O PACOTE DE QUATRO MAIS CARO DA PAGINA.
//   ⚠ SUBIU DE £37.50 (£9.38/tomada) DA COLETA DE 03/09. O ARTIGO FOI ATUALIZADO.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE**, COM AUTOR, DATA, NOTA E SELO DE COMPRA
//   VERIFICADA CONFERIDO NA FICHA. AS DUAS SAO POSITIVAS (DECISAO DO FELIPE).
//   A BARRA DE 1 ESTRELA (4%) CONTINUA VISIVEL NA DISTRIBUICAO.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-smart-plug',
    'asin' => 'B0B7XCQ5Z5',
    'slug' => 'tcp-smart-plug',

    'meta_title' => 'TCP Smart Plug Review: Specs and Ratings',
    'meta_description' => 'Everything the Amazon listing publishes about the TCP Smart Plug four-pack: price per socket, the spec table, how the ratings break down, and what buyers say.',

    'page_intro' => "The TCP Smart Plug is a Wi-Fi socket sold here as a four-pack, and it takes fifth place in our smart plug ranking. At GBP 44.00 for four that is GBP 11.00 a socket, the dearest four-pack on this page, against GBP 7.99 from either Tapo multipack and GBP 8.75 from the EIGHTREE. What it gives you for the money is reach: a manual switch on the body so it works with no phone at all, and Siri Shortcuts support without the Matter hub the Apple-friendly plugs lower down this ranking need. With Alexa and Google Home on top of that, and no hub of any kind, it is the most broadly compatible plug here.\n\nTwo things set it apart from the plugs above it, and they pull in opposite directions. The first is that its specification table is the only one in this ranking whose own numbers do not multiply: it gives 13 amps, 240 volts and 2,990 watts, but 13 times 240 is 3,120, and 2,990 is what you get at 230 volts. It has borrowed the voltage from one figure and the wattage from another. The second is that, unlike the four plugs ranked above it, this one is not sold on energy monitoring at all. It is sold on saving energy through schedules and remote switching, which is a different thing from measuring what a device draws, and a buyer on the listing asks outright whether it monitors energy. If all you want is to switch things on and off by voice or timer, neither point costs you anything; if you wanted a meter, this is not one.",

    'harvested_at' => '2026-09-05 12:00:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 76, 4 => 15, 3 => 4, 2 => 1, 1 => 4],

    // FICHA COPIADA DA TABELA. OS CAMPOS DE LIXO FICAM ROTULADOS "(as listed)",
    // PORQUE ELES **SAO** O ACHADO — NAO SE CORRIGE EM SILENCIO.
    'tech_specs' => [
        'Current rating|13 Amps',
        'Operating voltage (as listed)|240 Volts (AC)',
        'Wattage (as listed)|2990 watts',
        'Included components (as listed)|1 x TCP 13A 240V 2.4Hz 2990W Smart Wi-Fi Socket 4-Piece Pack, White',
        'Connectivity protocol|Wi-Fi',
        'Compatible devices|Alexa, Google Home, Siri',
        'Control method|App',
        'Operation mode (as listed)|Manual',
        'Switch type|Toggle',
        'Connector type|Plug In',
        'Terminal (as listed)|Screw',
        'Mounting type (as listed)|No Mount',
        'Number of positions (as listed)|4',
        'Number of items (as listed)|1',
        'Unit count|4.0 count',
        'Material|Brass, Copper',
        'Colour|White',
        'Item weight|430 g',
        'Item type name|Wi-Fi Socket',
        'Specification met (as listed)|CE',
        'Brand|TCP Smart',
        'Manufacturer|TCP Lighting',
        'Model number|TAYWISSINWUK4P',
        'Country of origin (as listed)|USA',
        'ASIN|B0B7XCQ5Z5',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    'faq' => [
        'Does the TCP Smart Plug monitor energy use?|No. It is sold on saving energy through schedules and remote switching, not on measuring it, and a buyer on the listing asks the same question. The four plugs ranked above it in our guide do publish energy monitoring; if a running total of watts is what you are after, this is not the plug for it.',
        'How many watts can it take?|The table gives 13 amps, 240 volts and 2,990 watts, but those do not agree: 13 amps at 240 volts is 3,120 watts, and 2,990 is the figure for 230 volts. British mains is 230 volts nominal, so 2,990 watts is the honest ceiling. Either way, 13 amps is the limit and a 3kW kettle or heater sits right at it.',
        'Can I use it without the app?|Yes, and that is its selling point. There is a manual switch on the body, so the plug works like an ordinary socket when the Wi-Fi is down, the app is slow or a guest just wants the lamp on. Most plugs in this ranking have no physical button.',
        'Does it work with Apple?|Yes, through Siri Shortcuts, and without the Matter hub that the Apple-compatible Meross and Tapo models lower down this ranking need. It also works with Alexa and Google Home, which makes it the most broadly compatible plug on this page.',
        'Does it need a hub?|No. The listing states no hub is required for any of its platforms.',
        'How many plugs do you get?|Four. The listing names a "4-Piece Pack" in its components and "Unit Count" reads 4.0, though "Number of Items" reads 1 and "Number of Positions" reads 4, which is the pack size in a field meant for switch positions.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => "This smart plug is excellent quality and works well. It's simple to set up and very easy to use. I've bought this item several times as keep finding extra uses for one. Highly recommended.",
            'author' => 'DPB',
            'rating' => 5,
            'date' => '18 April 2026',
            'title' => 'Excellent quality',
            'verified' => true,
        ],
        [
            'text' => "Easy set up and link to automation. Having had other makes of smart plugs this ones th best I've had. Phone app to set schedules/timers etc is very simple and integration with Alexa is a doddle.",
            'author' => 'John',
            'rating' => 5,
            'date' => '2 April 2026',
            'title' => 'Extremely easy set up',
            'verified' => true,
        ],
    ],
];
