<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 05/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// PAGINA DO #9 DE 10 NO ARTIGO "Best Smart Plug 2026". 1.212 AVALIACOES.
// UNICO PRODUTO DO RANKING QUE NAO E UMA TOMADA: E UMA REGUA/EXTENSAO INTELIGENTE.
//
// ─── ACHADO 1: A PIOR DISTRIBUICAO DA PAGINA INTEIRA ───
//   65% cinco / 15% quatro / 7% tres / 3% duas / **10% UMA ESTRELA**.
//   10% DE UMA ESTRELA E O MAIOR DO RANKING, E 4.2 E A MENOR MEDIA. E UMA REGUA COM MAIS
//   PECAS (4 AC + 4 USB + WI-FI) — MAIS COISA PRA DAR ERRADO. AS BARRAS MOSTRAM ISSO;
//   AS CITACOES SEGUEM POSITIVAS (DECISAO DO FELIPE), MAS O 10% CONTINUA VISIVEL.
//
// ─── ACHADO 2: DOIS TIPOS DE PLUGUE NA MESMA TABELA ───
//   "Power Plug Type: Type G" (BRITANICO, TRES PINOS, CERTO) E, DUAS LINHAS ABAIXO,
//   "Plug Type: Type C" (EUROPEU REDONDO DE DOIS PINOS, QUE NAO ENTRA EM TOMADA UK).
//   UMA LINHA DESCREVE O QUE VOCE ESPETA NA PAREDE; A OUTRA NAO DESCREVE NADA DA CAIXA.
//
// ─── ACHADO 3: "Unit Count: 545.0 count" ───
//   QUINHENTAS E QUARENTA E CINCO UNIDADES DE UMA REGUA QUE VEM UMA POR CAIXA
//   ("Box Contents: 1 x smart power strip"). CAMPO DE CATALOGO COMPLETAMENTE SOLTO.
//   E "Colour: 4 Gang 4 USB" — A CONFIGURACAO ENFIADA NO CAMPO DE COR (COMO O MSS305
//   POE "2 Pack" NA COR). "Number of Outlets: 8" CONTA AS 4 AC + 4 USB JUNTAS.
//
// ─── ACHADO 4: A PARTE ELETRICA ESTA CERTA ───
//   "Voltage: 230 Volts" + "Maximum Current: 13 Amps" → 2.990 W, TENSAO E CONTA CORRETAS.
//   ⚠ O ARTIGO CITA UM "Total output 3250W MAX" (que fura o fusivel de 13 A). ESSE NUMERO
//   **NAO APARECE MAIS** NA FICHA EM 05/09 — A AMAZON PODE TER CORRIGIDO O ANUNCIO. POR
//   ISSO A PAGINA **NAO** REPETE O 3250 W: SO REPORTA O QUE ESTA LA AGORA. VER REDO LIST.
//
// ─── USB ───
//   4 PORTAS USB-A COMPARTILHANDO **20 W** NO TOTAL, CHAVEADAS EM GRUPO (NAO
//   INDIVIDUALMENTE). AS 4 TOMADAS AC SIM SAO CHAVEADAS UMA A UMA. WALL-MOUNT.
//
// ─── PRECO ───
//   £34.99 A UNIDADE (E UMA REGUA, NAO SE DIVIDE POR TOMADA COMO OS PACOTES).
//   ⚠ SUBIU DE £29.74 DA COLETA DE 03/09. O ARTIGO FOI ATUALIZADO.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE**, COM AUTOR, DATA, NOTA E SELO DE COMPRA
//   VERIFICADA CONFERIDO NA FICHA. AS DUAS SAO POSITIVAS (DECISAO DO FELIPE).
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-smart-plug',
    'asin' => 'B08JG232D8',
    'slug' => 'meross-mss425-smart-plug',

    'meta_title' => 'Meross MSS425 Smart Extension Lead Review: Specs',
    'meta_description' => 'Everything the Amazon listing publishes about the Meross MSS425 smart extension lead: price, the spec table, how the ratings break down, and what buyers say.',

    'page_intro' => "The Meross MSS425 is the odd one out in our smart plug ranking: not a plug but a smart extension lead, with four individually switched UK sockets and four USB-A ports, and it takes ninth place. At GBP 34.99 it is priced as one unit rather than per socket. What it does that no plug here can is control a cluster of devices behind one piece of furniture, a TV stack or a desk, switching each socket on its own by app or voice, with the four USB ports sharing a 20 watt output and switching together as a group. It wall-mounts, and it works with Apple HomeKit as well as Alexa and Google Home.\n\nIt also carries the weakest ratings on the page, at 4.2 stars with a one-star share of ten per cent, the highest in the ranking, which is what happens when a device has more parts to go wrong than a single plug. The specification table adds its own confusion. It gives the plug type twice and differently: \"Power Plug Type: Type G\", the correct British three-pin, and two rows down \"Plug Type: Type C\", the European round two-pin that does not fit a UK socket. It records a unit count of 545 for something that ships one to a box, and it puts the configuration, \"4 Gang 4 USB\", in the colour field. The electrical figures, at least, are right: 230 volts and 13 amps, which is 2,990 watts, the true ceiling of any 13-amp lead.",

    'harvested_at' => '2026-09-05 14:00:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 65, 4 => 15, 3 => 7, 2 => 3, 1 => 10],

    // FICHA COPIADA DA TABELA. OS CAMPOS DE LIXO FICAM ROTULADOS "(as listed)",
    // PORQUE ELES **SAO** O ACHADO — NAO SE CORRIGE EM SILENCIO.
    'tech_specs' => [
        'Maximum current|13 Amps',
        'Voltage|230 Volts',
        'Power plug type|Type G',
        'Plug type (as listed)|Type C',
        'Number of outlets|8 (4 AC + 4 USB)',
        'Total USB ports|4',
        'USB output|20W shared across the four ports',
        'AC sockets|4, switched individually',
        'Item dimensions (L x W)|34 x 6.1 centimetres',
        'Item weight|630 g',
        'Enclosure material|Plastic',
        'Other features|Mountable',
        'Compatible with|Apple HomeKit, Alexa, Google, SmartThings',
        'Colour (as listed)|4 Gang 4 USB',
        'Unit count (as listed)|545.0 count',
        'Box contents|1 x smart power strip',
        'Brand|meross',
        'Model number|MSS425F',
        'Manufacturer part number|MSS425FHK-UK',
        'Country of origin|China',
        'ASIN|B08JG232D8',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    'faq' => [
        'How is the MSS425 different from the plugs in this ranking?|It is an extension lead, not a single plug. You get four UK sockets that each switch on their own by app or voice, plus four USB-A ports, in one unit that wall-mounts. That suits a cluster of devices behind one piece of furniture better than four separate plugs would.',
        'Why is it rated lower than the plugs above it?|At 4.2 stars it has the weakest average on the page, and its breakdown carries the highest one-star share in the ranking at ten per cent. A lead with four sockets, four USB ports and Wi-Fi has more parts to go wrong than a plain plug, and the reviews reflect that.',
        'Do the USB ports charge fast?|Not especially. The four USB-A ports share a single 20 watt output between them and switch as a group, not individually, so they suit phones and tablets rather than a laptop. The listing points to other Meross models for USB-C or fast charging.',
        'How many watts can it handle?|The table gives 13 amps at 230 volts, which is 2,990 watts, the ceiling of any 13-amp lead, set by the fuse in its plug. Spread across four sockets, a single high-draw appliance like a heater will use most of that on its own.',
        'Why does the table show two plug types?|"Power Plug Type" reads Type G, the British three-pin, which is correct. "Plug Type" two rows down reads Type C, the European two-pin, which is a catalogue field filled in wrongly; nothing in the box has a Type C plug. The lead plugs into a normal UK socket.',
        'What does the 545 unit count mean?|Nothing about what you receive. "Box Contents" reads "1 x smart power strip", so you get one lead. The 545 in the unit-count field is a stray catalogue value, the same kind of error as the configuration sitting in the colour field.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => "I used this with my Apple Home and it worked great! It is a good quality product that is easy to install.",
            'author' => 'O. Ali',
            'rating' => 5,
            'date' => '22 June 2022',
            'title' => 'Awsome Product',
            'verified' => true,
        ],
        [
            'text' => "It's easy to set up, operate and link to my Alexa and sets routines.",
            'author' => 'DubbleDee',
            'rating' => 5,
            'date' => '10 April 2026',
            'title' => 'Absolute gamechanger',
            'verified' => true,
        ],
    ],
];
