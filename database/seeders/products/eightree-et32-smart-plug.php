<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 05/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// PAGINA DO #6 DE 10 NO ARTIGO "Best Smart Plug 2026". 1.568 AVALIACOES.
// SEGUNDO PRODUTO EIGHTREE DO RANKING (MODELO ET32), DIFERENTE DO ET35 (#4, 5 GHz).
//
// ─── ACHADO 1: A MAIS BARATA POR TOMADA DA PAGINA INTEIRA ───
//   £27.99 / 4 = **£7.00 POR TOMADA**, ABAIXO ATE DA TAPO (£7.99). E COM MEDICAO DE
//   ENERGIA, QUE AS DUAS TAPO TAMBEM TEM. NAO E BARATA POR FALTAR COISA. ISSO ABRE A INTRO.
//   ⚠ SUBIU DE £24.99 (£6.25/tomada) DA COLETA DE 03/09. O ARTIGO FOI ATUALIZADO.
//
// ─── ACHADO 2: O IRMAO QUE PUBLICA TUDO E O IRMAO QUE PUBLICA NADA ───
//   O ET35 (#4) DA 13 A + 2.990 W + 230 V (a unica conta certa da pagina).
//   ESTE ET32 (#6), MESMA MARCA, **NAO PUBLICA TENSAO, WATTAGE NEM CORRENTE** NA FICHA.
//   NAO DA PRA CONVERTER PRA WATT. DOIS ANUNCIOS DA EIGHTREE, EXTREMOS OPOSTOS DE DETALHE.
//   ⚠ NAO ATRIBUIR OS "13A/3120W" QUE APARECEM NA PAGINA: ELES SAO DE UM PRODUTO
//   RELACIONADO (HBN Remote Control Plug) NO CARROSSEL, NAO DESTE ET32. CONFERIDO.
//
// ─── ACHADO 3: "Number Of Wires: 4" ───
//   PLUGUE BRITANICO TEM **TRES** FIOS: FASE, NEUTRO E TERRA. UM QUARTO NAO TERIA ONDE
//   ENTRAR. E O CAMPO QUE A PAGINA DA MEROSS JA CITAVA ("a EIGHTREE do mesmo ranking
//   declara 4 fios") — AGORA NA PROPRIA FICHA DELA. "Number of Poles: 3" ESTA CERTO.
//   E "Plug Type: ELECTRICAL" + "Connector Type: Quick Connect" NAO DESCREVEM NADA.
//
// ─── ACHADO 4: MAS NOMEIA A NORMA CERTA, E E A UNICA QUE FAZ ISSO ───
//   "Specification Met: BS1363, UKCA". BS 1363 E A NORMA BRITANICA DE PLUGUES DE 13 A;
//   UKCA E A MARCACAO DE CONFORMIDADE POS-BREXIT. NENHUM OUTRO ANUNCIO DA PAGINA
//   NOMEIA A NORMA QUE CUMPRE. MARCA DESCONHECIDA CITANDO O NUMERO CERTO VALE MAIS QUE
//   LOGO FAMOSO QUE NAO CITA. CREDITO ONDE E DEVIDO.
//   ⚠ "Included Components: Smart Plug, User Manual" — NO SINGULAR, NUM PACOTE DE QUATRO.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE**, COM AUTOR, DATA, NOTA E SELO DE COMPRA
//   VERIFICADA CONFERIDO NA FICHA. AS DUAS SAO POSITIVAS (DECISAO DO FELIPE).
//   A BARRA DE 1 ESTRELA (4%) CONTINUA VISIVEL NA DISTRIBUICAO.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-smart-plug',
    'asin' => 'B0CJBGXPD8',
    'slug' => 'eightree-et32-smart-plug',

    'meta_title' => 'EIGHTREE ET32 Smart Plug Review: Specs and Ratings',
    'meta_description' => 'Everything the Amazon listing publishes about the EIGHTREE ET32 four-pack: price per socket, the spec table, the ratings, and what buyers say.',

    'page_intro' => "The EIGHTREE ET32 is an energy-monitoring smart plug sold here as a four-pack, and it takes sixth place in our smart plug ranking. At GBP 27.99 for four it comes to GBP 7.00 a socket, among the cheapest four-packs on this page, at or below the Tapo P110 at GBP 7.99. It is not cheap for the usual reason: it does the same energy monitoring, cost estimation, timers and scheduling as the plugs above it, runs on the widely used Smart Life app, and carries 1,568 ratings at 4.6 stars.\n\nIt is the second EIGHTREE in this ranking, and it sits at the opposite end of the detail scale from its sibling. The ET35 at number four publishes 13 amps, 2,990 watts and 230 volts, the only listing here whose arithmetic runs on Britain's real voltage. This one publishes no voltage, no wattage and no current at all, so there is nothing to multiply. What its specification table does publish is worth reading both ways. It is the only listing on this page to name the British standard it is built to, BS 1363 and UKCA, which from an unfamiliar brand is worth more than a familiar logo that names nothing. And in the next row it states the plug has four wires, where a British plug has three, alongside a plug type given as \"ELECTRICAL\" and a connector type of \"Quick Connect\", neither of which describes anything.",

    'harvested_at' => '2026-09-05 12:30:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 76, 4 => 15, 3 => 3, 2 => 2, 1 => 4],

    // FICHA COPIADA DA TABELA. OS CAMPOS DE LIXO FICAM ROTULADOS "(as listed)",
    // PORQUE ELES **SAO** O ACHADO — NAO SE CORRIGE EM SILENCIO.
    // ⚠ A FICHA NAO PUBLICA TENSAO, WATTAGE NEM CORRENTE. NAO INVENTAR NENHUM DOS TRES.
    'tech_specs' => [
        'Specification met|BS1363, UKCA',
        'Number of poles|3',
        'Number of wires (as listed)|4',
        'Plug type (as listed)|ELECTRICAL',
        'Connector type (as listed)|Quick Connect',
        'Connectivity protocol|Wi-Fi (2.4GHz)',
        'Compatible with|Alexa, Google Home, SmartThings',
        'Material|Plastic, Rubber',
        'Colour|White',
        'Number of items|4',
        'Unit count|4.0 count',
        'Included components (as listed)|Smart Plug, User Manual',
        'Item weight|310 g',
        'Brand|Eightree',
        'Model number|ET32',
        'Manufacturer part number|ET32',
        'ASIN|B0CJBGXPD8',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    'faq' => [
        'How much is the EIGHTREE ET32 per socket?|At GBP 27.99 for four it is GBP 7.00 a plug, among the lowest on this page, at or below the Tapo P110 at GBP 7.99 and under the EIGHTREE ET35 at GBP 8.75, and it still includes energy monitoring. Prices here move week to week, so check the live figure before buying.',
        'How many watts can it take?|The listing does not say. Unlike its sibling the ET35, which publishes 13 amps at 230 volts for 2,990 watts, this one gives no voltage, wattage or current at all, so there is nothing to convert. As a 13-amp British plug the ceiling is the socket, and a 3kW kettle or heater sits at it.',
        'Does it actually meet British plug standards?|Its specification table names BS 1363, the British Standard for 13-amp plugs and sockets, and UKCA, the post-Brexit conformity marking. It is the only listing on this page to name a standard by number. That is the maker stating conformity on the listing; we report it rather than certify it.',
        'Why does it say four wires?|A British plug has three: live, neutral and earth. The four in the table is a catalogue field filled in wrongly, the same kind of error as the "ELECTRICAL" plug type and "Quick Connect" connector type in the rows near it. The hardware is a standard three-pin type G plug.',
        'Does it monitor energy use?|Yes. The listing sells it on real-time energy monitoring through the Smart Life app, with charts and a cost estimate if you enter your tariff. As with every plug here, it does not publish an accuracy figure for the meter, so treat the readings as a guide.',
        'Does it need a hub?|No. It connects over 2.4GHz Wi-Fi and works with Alexa, Google Home and SmartThings without a hub. Being 2.4GHz only, it is the band its own 5GHz sibling at number four exists to avoid.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => "Setup was super quick — it connected smoothly to my Wi-Fi and synced with Amazon Alexa without any hassle.",
            'author' => 'Sticklanders',
            'rating' => 5,
            'date' => '26 October 2025',
            'title' => 'Easy to set up and works perfectly',
            'verified' => true,
        ],
        [
            'text' => "It is unbelievably useful to have the energy monitoring on a per plug basis which these offer when using the Smart Life app to isolate which devices are using the most power and just how much they are costing, on an ongoing basis.",
            'author' => 'Stefan_Mac',
            'rating' => 5,
            'date' => '21 January 2026',
            'title' => 'Good quality, very useful - much more useful than expected',
            'verified' => true,
        ],
    ],
];
