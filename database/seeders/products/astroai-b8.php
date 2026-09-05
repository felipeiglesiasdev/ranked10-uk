<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: PAGINA PROPRIA DE PRODUTO ═══
//
// COLETA: FICHA DA AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// PAGINA DO #2 DE 10 NO ARTIGO "Best Jump Starter 2026".
// E O MAIS BARATO DO RANKING (GBP 31.99) COM 1.976 AVALIACOES E MEDIA 4.6.
//
// ─── ACHADO 1: A MESMA FICHA PUBLICA DOIS PESOS, COM O DOBRO DE DIFERENCA ───
//   TABELA DE ESPECIFICACAO: "Item Weight: 650 g".
//   TITULO DO PRODUTO E CAMPO "Item Highlight": "Ultra-light 329g".
//   650 / 329 = 1,98 — OU SEJA, A TABELA DECLARA PRATICAMENTE **O DOBRO** DO QUE O
//   TITULO VENDE, NA MESMA PAGINA, NO MESMO DIA. NAO DA PARA SABER QUAL ESTA CERTO
//   (650 g PODE SER O PESO COM CAIXA, BOLSA E CABOS; 329 g PODE SER SO O APARELHO),
//   ENTAO A PAGINA MOSTRA **OS DOIS**, CADA UM ATRIBUIDO AO CAMPO DE ONDE SAIU.
//   NENHUM DOS DOIS FOI "CORRIGIDO" NEM ESCOLHIDO COMO VENCEDOR.
//   ESTE E O CASO MAIS LIMPO DE CONTRADICAO INTERNA DE FICHA QUE JA COLETAMOS.
//
// ─── ACHADO 2: 2000 AMPS NA TABELA, MAS O TITULO NAO VENDE AMPERE ───
//   A TABELA DECLARA "Amperage: 2000 Amps". O TITULO IGNORA O NUMERO E LIDERA POR
//   CILINDRADA: "7.0L Petrol / 5.5L Diesel". CATEGORIA INTEIRA VENDE POR AMPERE;
//   ESTA FICHA TROCA A UNIDADE DE COMPARACAO NO PROPRIO TITULO, O QUE IMPEDE O
//   COMPRADOR DE COMPARAR LADO A LADO SEM ABRIR A TABELA.
//
// ─── ACHADO 3: A MEDIA DE 4.6 ESCONDE A FORMA DA DISTRIBUICAO ───
//   80% cinco / 11% quatro / 3% tres / 1% duas / **5% UMA ESTRELA**.
//   UMA ESTRELA E O **TERCEIRO** VOTO MAIS COMUM (QUATRO ESTRELAS, COM 11%, VEM ANTES), MAS MAIS FREQUENTE QUE DUAS E
//   TRES SOMADAS (1%+3%=4%). SOBRE 1.976 AVALIACOES, OS 5% SAO ~99 PESSOAS.
//   MESMA CURVA EM J DO GB40 (77/11/3/2/7). PADRAO DA CATEGORIA, NAO DO PRODUTO.
//
// ─── ACHADO 4: 8000 mAh CONTRA OS 2150 mAh DO #1 DO RANKING ───
//   A TABELA DECLARA "Battery Capacity: 8000 Milliamp Hours", QUASE 4x A CAPACIDADE
//   DECLARADA PELO NOCO GB40, POR UM PRECO MENOR. NAO VALIDAMOS A MEDIDA; SO
//   REGISTRAMOS QUE E O QUE AS DUAS FICHAS PUBLICAM.
//
// ⚠ CITACOES: COPIADAS **LITERALMENTE** DA FICHA, COM AUTOR, DATA, NOTA E SELO DE
//   COMPRA VERIFICADA. NUNCA GERAR, RESUMIR NEM TRADUZIR CITACAO.
//   OS CORPOS VIERAM TRUNCADOS EM 270 CARACTERES NA COLETA, ENTAO SO FORAM USADOS
//   TRECHOS QUE FECHAM SOZINHOS, LONGE DO PONTO DE CORTE.
//   DECISAO DO FELIPE (03/09/2026): AS DUAS CITACOES SAO POSITIVAS — A PAGINA VENDE.
//   O SINAL NEGATIVO NAO SUMIU DA PAGINA: A BARRA DE 1 ESTRELA CONTINUA MOSTRANDO OS 5%
//   NA DISTRIBUICAO, ENTAO O LEITOR VE O NUMERO SEM QUE A CITACAO O EMPURRE PARA LA.
//
// ⚠ A FICHA FALA EM "10 Smart Safety Protections" E EM GARANTIA DE 2 ANOS. AMBAS
//   REPORTADAS COMO O QUE O ANUNCIO PUBLICA, SEM AFIRMAR CONFORMIDADE NEM CERTIFICACAO.
// ═══════════════════════════════════════════════════════════════

return [
    'article' => 'best-jump-starter',
    'asin' => 'B0FB2L7CCX',
    'slug' => 'astroai-b8',

    'meta_title' => 'AstroAI B8 Jump Starter: Specs, Ratings and Price',
    'meta_description' => 'Everything the Amazon listing publishes about the AstroAI B8 jump starter: price, the full specification table, how its ratings break down and buyer quotes.',

    'page_intro' => "The AstroAI B8 is a 12V lithium polymer jump starter, and it takes second place in our jump starter ranking. It is the value pick: at GBP 31.99 it is the cheapest pack in the ten, and at 8.3 x 16 x 2.8 centimetres it drops into a glovebox and stays there. Everything on this page comes from its Amazon listing rather than from our own testing: the price, the specification table, the spread of its 1,976 customer ratings, and two review quotes copied word for word.\n\nThe specification is worth reading closely, because it contradicts itself on weight. The product title and the Item Highlight field both sell the B8 as \"Ultra-light 329g\", while the specification table on the same page gives the item weight as 650 g — very nearly double. We cannot tell you which figure is right, so both appear in the table below with the field each one came from. The other number to note is the amperage: the table declares 2,000 amps, yet the title leads on engine size instead, quoting 7.0 litres of petrol and 5.5 litres of diesel.",

    'harvested_at' => '2026-09-03 15:00:00',

    // DISTRIBUICAO EM PORCENTAGEM, COMO A AMAZON PUBLICA. SOMA 100.
    'rating_breakdown' => [5 => 80, 4 => 11, 3 => 3, 2 => 1, 1 => 5],

    // FICHA TECNICA COPIADA DA TABELA DA AMAZON. LINHAS DE LIXO DE CATALOGO FORAM
    // DESCARTADAS. AS DUAS LINHAS DE PESO E A LINHA "Item Highlight" FICAM PORQUE
    // ELAS **SAO** O ACHADO — CADA UMA ROTULADA COM O CAMPO DE ORIGEM.
    'tech_specs' => [
        'Brand|AstroAI',
        'Model number|B8',
        'Manufacturer part number|B8',
        'Manufacturer|AstroAI',
        'Amperage|2000 Amps',
        'Voltage|12 Volts',
        'Battery cell composition|Lithium Polymer',
        'Battery capacity|8000 Milliamp Hours',
        'Compatible vehicle type|Automotive',
        'Automotive fit type|Universal Fit',
        'Item dimensions (D x W x H)|8.3 x 16 x 2.8 centimetres',
        'Item weight (specification table)|650 g',
        'Item weight (title and Item Highlight)|329 g',
        'Item highlight (as listed)|Ultra-light 329g Car Battery Booster Jump Starter, 10 Smart Safety Protections, Emergency LED Light, Portable Storage Bag',
        'Included components|AstroAI B8 Car Battery Jump Starter, Pack with Giftbox, Smart Jumper Leads, Storage bag',
        'Number of items|1',
        "Manufacturer warranty|2-year manufacturer's warranty",
        'ASIN|B0FB2L7CCX',
    ],

    // PERGUNTAS RESPONDIDAS **SO** COM O QUE A FICHA PUBLICA. VIRA FAQPage NO SCHEMA.
    'faq' => [
        'What size engine will the AstroAI B8 start?|The title quotes 7.0 litres of petrol and 5.5 litres of diesel, from a declared 2,000 amps. Those are the listing figures rather than ones we measured, and how close you get depends on the engine and how flat the battery is.',
        'How much does the AstroAI B8 actually weigh?|The listing publishes two different answers. The product title and the Item Highlight field both say 329g; the specification table says 650 g. We report both because we cannot tell which one AstroAI intends, and the difference is close to double.',
        'Can it charge a phone?|The specification table gives the battery as 8,000mAh, and the listing sells the B8 as a power pack as well as a jump starter. The listing does not state how many phone charges that works out to.',
        'What comes in the box?|The listing names the B8 jump starter itself, a giftbox pack, smart jumper leads and a storage bag. It also lists an emergency LED light on the unit.',
        'What safety features does the listing claim?|AstroAI states the B8 has 10 smart safety protections and describes the leads as smart jumper leads. That is the maker claim as published on the listing; we have not tested it.',
        'Will it fit in a glovebox, and what warranty does it carry?|The specification table gives 8.3 x 16 x 2.8 centimetres, which is glovebox size, and the listing states a 2-year manufacturer warranty.',
    ],

    // ⚠ TEXTO LITERAL DA FICHA. NAO EDITAR, NAO RESUMIR, NAO TRADUZIR.
    'review_quotes' => [
        [
            'text' => 'Absolute life saver product. Very easy to use and charge. Very quick to start car, literally bonnet open, connect the two do das, start car.',
            'author' => 'Deborah',
            'rating' => 5,
            'date' => '13 August 2026',
            'title' => 'Amazing product, does a lot, easy, well worth it.',
            'verified' => true,
        ],
        [
            'text' => "This jump starter is an absolute essential for any car, my 1.2 Vauxhall Corsa's battery had completely drained after sitting for months on the driveway.",
            'author' => 'Nate B',
            'rating' => 5,
            'date' => '11 August 2026',
            'title' => 'An essential for every car - time saving and great for emergencies',
            'verified' => true,
        ],
    ],
];
