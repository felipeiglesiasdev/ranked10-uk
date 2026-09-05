<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// PAGINA DO #1 DE 10 NO ARTIGO "Best Smart Plug 2026: 10 Ranked, and Why 13 Amps
// Means Three Different Wattages". PRODUTO MAIS AVALIADO DAQUELE RANKING (38.347).
//
// ─── ACHADO 1: A FICHA FAZ A CONTA NA FRENTE DO CLIENTE — E USA A TENSAO ERRADA ───
//   A TABELA PUBLICA OS TRES NUMEROS DE UMA VEZ:
//       "Current Rating: 13 Amps"  +  "Operating Voltage: 220 Volts"  +  "Wattage: 2860 watts"
//   13 × 220 = 2.860 ✓ — A ARITMETICA FECHA PERFEITAMENTE.
//   MAS A REDE BRITANICA E **230 V NOMINAL** DESDE A HARMONIZACAO EUROPEIA DE 1995.
//   A 230 V O MESMO RELE DE 13 A DA 2.990 W. E CONCORRENTES QUE DECLARAM 240 V VENDEM
//   O MESMO COMPONENTE COMO 3.120 W. E O ACHADO CENTRAL DO ARTIGO, AQUI VISIVEL NUMA
//   TABELA SO — POR ISSO ESTA PAGINA E A MELHOR VITRINE DELE.
//
// ─── ACHADO 2: "Connector Type: Schuko" ───
//   SCHUKO E O PLUGUE REDONDO DE DOIS PINOS DA EUROPA CONTINENTAL. **NAO ENTRA** NUMA
//   TOMADA BRITANICA. NUM ANUNCIO BRITANICO DE UM PLUGUE TIPO G COM 38.347 AVALIACOES.
//
// ─── ACHADO 3: TEXTO DE TEMPLATE CRU, COM AS ASPAS DE ESCAPE AINDA NO MEIO ───
//   "Switch Type: Wall Outlet\" or \"Receptacle" E "Circuit Type: series\" or \"parallel".
//   SAO AS DUAS OPCOES DO FORMULARIO DE CADASTRO, GRAVADAS COMO SE FOSSEM O VALOR.
//
// ─── ACHADO 4: VOCABULARIO DE PLACA DE CIRCUITO NUMA TOMADA DE PAREDE ───
//   "Contact Type: Normally Open", "Terminal: Blade", "Actuator Type: relay".
//   E "Number of Positions: 2", QUE E O TAMANHO DO PACOTE, NAO POSICOES DE CHAVE.
//
// ─── DISTRIBUICAO: A MAIS SAUDAVEL QUE JA COLETEI ───
//   78% cinco / 15% quatro / 3% tres / 1% duas / 3% uma. 93% DERAM QUATRO OU CINCO.
//   COMPARE COM OS JUMP STARTERS, ONDE UMA ESTRELA CHEGA A 7%.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE** DA FICHA, COM AUTOR, DATA, NOTA E SELO DE
//   COMPRA VERIFICADA CONFERIDO NA PROPRIA PAGINA. NUNCA GERAR, RESUMIR NEM TRADUZIR.
//   AS DUAS SAO POSITIVAS (DECISAO DO FELIPE: A PAGINA VENDE). A BARRA DE 1 ESTRELA
//   CONTINUA VISIVEL NA DISTRIBUICAO, ENTAO O NUMERO NAO SUMIU DA PAGINA.
//   ⚠ DESCARTADA A AVALIACAO MAIS BEM POSICIONADA (Rhianna Axford, 5 estrelas): O TEXTO
//   DELA FALA DO **P100**, QUE E OUTRO MODELO. NAO SE CITA AVALIACAO DE OUTRO PRODUTO.
//
// ⚠ "Specification Met: CE" E "International Protection Rating: IP00" SAO REPORTADOS
//   COMO O QUE O ANUNCIO PUBLICA, SEM AFIRMAR CONFORMIDADE DE NADA.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-smart-plug',
    'asin' => 'B0B831STBX',
    'slug' => 'tapo-p110-smart-plug',

    'meta_title' => 'Tapo P110 Smart Plug Review: Specs and Ratings',
    'meta_description' => 'Everything the Amazon listing publishes about the Tapo P110 smart plug: price, the specification table, how its ratings break down, and what buyers say.',

    'page_intro' => "The TP-Link Tapo P110 is an energy-monitoring smart plug sold here as a two-pack, and it takes first place in our smart plug ranking. At GBP 15.97 for two it works out at GBP 7.99 a socket, which is a quarter less than the same plug costs bought singly. Everything on this page comes from its Amazon listing rather than from our own testing.\n\nThe specification table is worth reading closely, because it does the arithmetic in front of you and then uses the wrong voltage. It publishes a current rating of 13 amps, an operating voltage of 220 volts and a wattage of 2,860 watts, and 13 times 220 is exactly 2,860, so the sum is internally perfect. British mains, however, has been 230 volts nominal since 1995. At 230 volts the same 13-amp relay carries 2,990 watts, and rival plugs that declare 240 volts sell the identical component as 3,120 watts. Same switch, three different ceilings, depending only on which voltage the listing chose.",

    'harvested_at' => '2026-09-03 16:00:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 78, 4 => 15, 3 => 3, 2 => 1, 1 => 3],

    // FICHA TECNICA COPIADA DA TABELA DA AMAZON. AS LINHAS DE LIXO DE CATALOGO FICAM,
    // ROTULADAS "(as listed)", PORQUE ELAS **SAO** O ACHADO — NAO SE CORRIGE EM SILENCIO.
    'tech_specs' => [
        'Current rating|13 Amps',
        'Operating voltage (as listed)|220 Volts',
        'Wattage (as listed)|2860 watts',
        'Connectivity protocol|Wi-Fi',
        'Controller type|Amazon Alexa, Google Assistant',
        'Control method|Voice, remote',
        'Number of items|2',
        'Item dimensions|7.2 x 5.1 x 6 centimetres',
        'Material|Polycarbonate',
        'Colour|White',
        'Mounting type|Plug-in',
        'Upper temperature rating|40 Degrees Celsius',
        'Operation mode|ON-OFF',
        'Actuator type (as listed)|relay',
        'Contact type (as listed)|Normally Open',
        'Terminal (as listed)|Blade',
        'Number of positions (as listed)|2',
        'Connector type (as listed)|Schuko',
        'International protection rating (as listed)|IP00',
        'Specification met (as listed)|CE',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    'faq' => [
        'How many watts can the Tapo P110 actually take?|The listing gives a current rating of 13 amps and a wattage of 2,860 watts, which is 13 amps at the 220 volts the same table declares. British mains is 230 volts nominal, where 13 amps carries 2,990 watts. Either way, 13 amps is the ceiling, and a 3kW kettle or heater sits right at it.',
        'Does it need a hub?|No. The listing sells it as an easy setup with no hub required, connecting over Wi-Fi and working with Amazon Alexa and Google Assistant for voice control.',
        'What does the energy monitoring actually show?|TP-Link sells the P110 on energy monitoring, and the specification table gives the wattage ceiling. The listing does not publish an accuracy tolerance for the measurement, so treat the readings as a guide rather than a meter reading.',
        'Why does the listing say the connector type is Schuko?|That is what the specification table says, and it does not match the product: Schuko is the round two-pin continental European plug, which does not fit a British socket. The plug shown and sold is a British three-pin type G. It is a catalogue field filled in wrongly rather than anything about the hardware.',
        'How big is it and will it block the second socket?|The listing gives 7.2 x 5.1 x 6 centimetres and describes the design as compact. It does not say whether it leaves a double socket usable, so measure your own if that matters.',
        'Is it one plug or two?|Two. This listing is the two-pack, which the table records as "Number of Items: 2", and at GBP 15.97 that is GBP 7.99 per socket.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    //   A GRAFIA DO FRANK ESTA COMO ELE ESCREVEU, DE PROPOSITO.
    'review_quotes' => [
        [
            'text' => "Great smart plug that's easy to set up and use. I use it to turn my fan on and off with voice commands and to automatically switch off my phone charger after an hour overnight.",
            'author' => 'Zack',
            'rating' => 5,
            'date' => '20 June 2026',
            'title' => 'Tapo',
            'verified' => true,
        ],
        [
            'text' => "as an older person i found these simple to set up and use,simply download the app follow a couple of instructions and i can now turn my kettle on from my bed in the morning and it's boiled by the time i get to the kitchen",
            'author' => 'Frank',
            'rating' => 5,
            'date' => '20 August 2026',
            'title' => 'easy to set up and use',
            'verified' => true,
        ],
    ],
];
