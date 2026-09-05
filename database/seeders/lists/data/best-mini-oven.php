<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
//
// COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// BUSCA: /s?k=mini+oven+countertop&rh=p_36%3A5000-  (10 FICHAS)
// CATEGORIA KITCHEN (COMISSAO 5%). SAZONAL: OUTONO/INVERNO + VOLTA AS AULAS (estudante, flat pequeno).
//
// ─── ACHADO 1 (VAI NA INTRO): WATT NAO E POTENCIA DE FORNO — E A NETTA PUBLICA A PROVA ───
//   NETTA 45L (B07RFSMZ6D) bullet 3: "high-power 2850W total output".
//   NETTA 45L (B07RFSMZ6D) bullet 2: "dual hotplate 800W and 600W burners".
//   2850 - 800 - 600 = 1.450W SOBRAM PARA FORNO + GRILL.
//   NETTA 30L (B0FBHPK37Y), SEM NENHUMA CHAPA: "upgraded 1500W high-power heating".
//   → O FORNO DE 45L E 50W MAIS FRACO QUE O DE 30L DA PROPRIA NETTA, NUMA CAVIDADE 15 LITROS MAIOR.
//   WATT POR LITRO: 1450/45 = 32,2 W/L  x  1500/30 = 50 W/L (NETTA 30L E PRODEX 30L). UM TERCO A MENOS.
//
// ─── ACHADO 2 (SEGUNDA BATIDA): HOMCOM 28L SE CONTRADIZ EM 1.000W ───
//   B0DSVC99CD titulo: "...with Hob 1600W Black". Bullet 1: "the powerful 2600W toaster oven".
//   2600 - 1600 = 1000W. FICHA TECNICA VAZIA (sem marca, cor, dimensao ou capacidade) — NAO HA
//   TERCEIRO NUMERO PARA DESEMPATAR. UNICO ANUNCIO DA PAGINA SEM NENHUMA DIMENSAO PUBLICADA.
//   (LEITURA INOCENTE EXISTE: 1600 forno + 1000 de chapas. POR ISSO E BEAT 2, NAO MANCHETE.)
//
// ─── ACHADO 3: QUATRO DOS DEZ NAO PUBLICAM POTENCIA NENHUMA ───
//   SEM WATT EM TITULO, BULLET OU FICHA: HOMCOM 30L (B0D7VJ6X4Y), PRODEX PX7161B 60L (B0D2HVH77M),
//   COOKS PROFESSIONAL 28L (B0C7HGD6TP). HOMCOM 28L PUBLICA DOIS QUE BRIGAM ENTRE SI.
//
// ─── ACHADO 4: IGENIX x PRODEX 60L SAO A MESMA CAIXA NOS DADOS PUBLICADOS ───
//   AMBOS: 47D x 64.5W x 39.7H cm E 60 LITROS. MODELOS IG-7161 e PX-7161-B — MESMOS QUATRO DIGITOS.
//   O 30L DA PRODEX E PX7030B (o numero codifica os 30 litros); PX7161B NAO CODIFICA 60 — CODIFICA IGENIX.
//   PRECOS: 109,99 x 99,99 = 10,00 DE DIFERENCA. NAO AFIRMAR MESMA FABRICA — SO O QUE ESTA PUBLICADO.
//   O QUE OS 10 LIBRAS COMPRAM: A IGENIX PUBLICA 2500W, 100-230C, TIMER DE 60 MIN, LUZ INTERNA,
//   DUPLO ISOLAMENTO E DIMENSOES COM EIXO NOMEADO. A PRODEX 60L NAO PUBLICA NENHUM DESSES.
//
// ─── ACHADO 5: 33,6% DAS AVALIACOES DA PAGINA SAO EMPRESTADAS ───
//   NETTA 35L + NETTA 45L + NETTA 30L: TODAS 4.2 COM 1.230 AVALIACOES (3 ASINS, 3 TAMANHOS, 1 NUMERO).
//   PRODEX PX7030B + PX7161B: AMBAS 4.4 COM 505.
//   SOMA EXIBIDA 8.812  x  POOLS DISTINTOS 5.847  =  2.965 DUPLICADAS (1230 x 2 + 505) = 33,6%.
//
// ─── ACHADO 6: AS DUAS MAIORES NOTAS TEM A EVIDENCIA MAIS FINA ───
//   4.5: COOKS 28L (101) E HOMCOM 28L (66) = 167 AVALIACOES SOMADAS.
//   O TZS 45L SOZINHO TEM 3.232 — 19 VEZES MAIS. A PAGINA INTEIRA CABE EM 0,3 ESTRELA (4.2 a 4.5),
//   ENTAO A NOTA QUASE NAO DISCRIMINA AQUI; O QUE DISCRIMINA E A CONTAGEM.
//
// ─── EIXOS DE COMPRA ───
//   1. LITROS DENTRO x CENTIMETROS DE BANCADA CEDIDOS (60L = 64,5cm de largura; 28L = 49cm).
//   2. SO FORNO x FORNO COM CHAPAS (substituir fogao em bedsit/caravana/anexo, ou so somar ao fogao).
//   3. TURBINA x CALOR ESTATICO — SO DOIS ANUNCIOS PUBLICAM CONVECCAO: TZS E IGENIX.
//      (A IGENIX AINDA DIZ "unlike other mini ovens" — E O TZS ESTA NA MESMA PAGINA DE RESULTADOS.)
//   4. O QUANTO A FICHA REALMENTE PUBLICA (watt, faixa de temperatura, timer, dimensao) E O QUE FALTA.
//
// ─── ARITMETICA DE APOIO ───
//   LIBRA POR LITRO: PRODEX 60L 1,67 / IGENIX 1,83 / HOMCOM 30L 1,93 / PRODEX 30L 2,17 / NETTA 45L 2,22 /
//   NETTA 30L 2,33 / NETTA 35L 2,57 / HOMCOM 28L 2,64 / TZS 3,33 / COOKS 3,93 (o mais caro por litro).
//   109,99 COMPRA 28 LITROS (COOKS) OU 60 LITROS (IGENIX) NESTA MESMA PAGINA.
//   BANCADA (cm2): NETTA 30L 1.633 / HOMCOM 30L 1.798 / COOKS 1.911 / PRODEX 30L 1.969 / NETTA 35L 1.991 /
//   TZS 2.268 / NETTA 45L 2.278 / IGENIX = PRODEX 60L 3.031 (0,30 m2). HOMCOM 28L: NAO PUBLICA.
//   CAIXA EXTERNA x CAVIDADE: IGENIX/PRODEX 60L = 120,35 L DE CAIXA PARA 60 L DE FORNO (49,9%).
//   MELHOR RAZAO: TZS 45/79,38 = 56,7%. PIOR: COOKS 28/64,97 = 43,1%.
//   ALTURA: MAIS ALTO E O NETTA 45L COM 41cm — 1,3cm MAIS ALTO QUE OS DOIS DE 60 LITROS.
//   TETO DE TEMPERATURA: TODOS OS QUE PUBLICAM PARAM EM 230C. PISO MAIS BAIXO: HOMCOM 30L, 60C
//   (40C ABAIXO DOS 100C DA PRODEX 30L E DA IGENIX) — E E O MAIS BARATO DA PAGINA.
//   TIMER: 120 MIN (NETTA 35L e 45L) / 60 MIN (NETTA 30L, IGENIX, HOMCOM 30L) / DURACAO NAO PUBLICADA
//   (PRODEX 60L, COOKS) / NENHUM PUBLICADO (TZS, PRODEX 30L, HOMCOM 28L).
//
// ⚠ AVISO DE ENCAIXE (nao afirmar como fato): TZS traz "56D x 40.5W x 35H" — UNICO DA PAGINA MAIS
//   FUNDO QUE LARGO. TODOS OS OUTROS SAO MAIS LARGOS QUE FUNDOS. PROVAVEL TROCA DE CAMPOS D/W NO
//   CATALOGO. PUBLICAR COMO "MEDIR ANTES", NUNCA COMO DEFEITO DO PRODUTO.
//
// ⚠ CAMPO LIXO: "Special feature". HOMCOM 30L REPETE O TITULO E A CAPACIDADE. PRODEX 30L DIZ
//   "Insulated" SEM BULLET DE ISOLAMENTO. PRODEX 60L DIZ "Timer" SEM DURACAO EM LUGAR NENHUM.
//   SO A IGENIX SUSTENTA O CAMPO COM BULLET ("double insulated").
//
// ⚠ NETTA REPETE AS PROPRIAS DIMENSOES EM DUAS ORDENS DIFERENTES E SEM ROTULO:
//   35L ficha "37.5D x 53.1W x 38H" / bullet "53.1 x 37.5 x 38cm" = L x P x A.
//   30L ficha "32.8D x 49.8W x 36.5H" / bullet "49.8 x 36.5 x 32.8cm" = L x A x P.
//   SO A IGENIX ROTULA OS TRES EIXOS: "H 39.7cm x W 64.5cm x D 47cm".
//
// NAO ENCONTRADO (nao insinuar): nenhuma unidade imperial; nenhuma divergencia de capacidade entre
// titulo e ficha; nenhum "battery not included" ou acessorio vendido a parte.
//
// PROFUNDIDADE (AVALIACOES): 3.232 / 1.230 / 1.230 / 1.230 / 623 / 505 / 505 / 101 / 90 / 66.
// (SEM PISO DE AVALIACOES — ver memoria feedback-ranked10-no-review-floor. Os de 66 e 90 entram pelo
//  que SAO, e a fragilidade da amostra esta reportada no card e na ficha.)
//
// FOCUS KEYWORD: best mini oven
// VARIACOES: mini oven / countertop mini oven / electric mini oven / table top mini oven /
// mini oven with hob / mini oven with hotplates / 60 litre mini oven / small oven for a flat /
// best mini ovens / compact oven
// ═══════════════════════════════════════════════════════════════

return [
    'category' => 'kitchen',
    'slug' => 'best-mini-oven',
    'title' => 'Best Mini Oven 2026: 10 Countertop Ovens Ranked by Litres',
    'meta_title' => 'Best Mini Oven 2026: 10 Countertop Ovens Ranked',
    'meta_description' => 'The best mini oven picks for small kitchens, from 28 to 60 litres. Ten countertop mini ovens compared on real watts, worktop space and price.',
    'focus_keyword' => 'best mini oven',
    'published_at' => '2026-09-03 11:30:00',

    'intro' => "If you want the short answer, the TZS First Austria 45L is the best mini oven for most kitchens: GBP 149.95, 4.4 stars from 3,232 ratings, 2000W, a convection fan and a rotisserie, with a ceiling of 230C. If that is more than you want to spend, the Igenix IG7161 gives you sixty litres and a fan for GBP 109.99, and it publishes more about itself than any other listing here.

Before you compare wattages, read them twice, because on this page they do not all mean the same thing. NETTA advertises a high-power 2850W total output on its 45-litre model, then one bullet earlier gives the split: an 800W hotplate and a 600W hotplate. Subtract those and the oven and the grill are left with 1,450W, which is fifty watts less than the 1,500W NETTA quotes for its own 30-litre oven, a machine with no hotplates at all and a cavity fifteen litres smaller. HOMCOM goes one better on its 28-litre: 1600W in the title, the powerful 2600W toaster oven in the first bullet, a thousand watts apart on a single listing with an empty spec table to settle it. So choose on four things instead. How many litres you get for the centimetres of worktop you give up, because a 60-litre countertop mini oven is 64.5cm wide. Whether you need hotplates on the lid or just an oven beside your cooker. Whether the listing publishes a fan, because only two here do. And how much the listing publishes at all, because four of these ten electric mini ovens give a buyer no usable power figure whatsoever.",

    'conclusion' => "For most homes the best mini oven here is the TZS First Austria 45L. Forty-five litres takes a small roasting tin without swallowing the worktop, it is one of only two listings on the page that publish a convection fan, and its 4.4 comes from 3,232 ratings of its own rather than a number shared across a family of models. If GBP 149.95 is too much, the Igenix IG7161 is the sensible second: sixty litres, fan assisted, and a specification actually written down, for GBP 109.99.

Buy differently for the room you are cooking in. If there is no hob at all, in a bedsit, a caravan or an annexe, skip the oven-only order and start at the NETTA 45L with its two hotplates, or the HOMCOM 28L if GBP 73.99 is the ceiling. If you have less than about 55cm of free worktop, only the 28 and 30-litre machines will fit and the 60-litre pair are out of the question. If you want it purely as a second oven for Christmas, go straight to sixty litres. One last thing about the stars: this whole page sits between 4.2 and 4.5, and the counts are worse than they look. Add up every rating shown and you get 8,812, but only 5,847 of them are distinct, because three NETTA ovens share one pool of 1,230 and two Prodex ovens share one pool of 505. That is 2,965 borrowed ratings, a third of the review volume on the page, so buy the small oven on its litres, its watts and its centimetres rather than on its score.",

    'products' => [
        [
            'TZS First Austria Mini Oven 45L, 2000W, Convection and Rotisserie',
            '£149.95', 4.4, 3232,
            'B00WTE08LQ',
            '71XEklKiIXL',
            'best mini oven',
            'The best mini oven for most kitchens: 45 litres, a convection fan, a rotisserie and 2000W to 230C, with 3,232 ratings behind it.',
            "Forty-five litres is the sweet spot on this page. It is enough for a small roasting tin or a full tray of chips, and it stops well short of the 60-litre machines that take over a worktop run. Behind that cavity sits 2000W and a ceiling of 230C, which works out at roughly 44 watts for every litre of oven. By contrast the NETTA 45L further down has the same capacity with about 1,450W once its hotplates are accounted for.

Crucially, this is one of only two listings here that publish a convection function, and the only one that pairs the fan with a rotisserie. A fan matters more than the spinning spit does: it circulates air so a tray browns evenly instead of needing a turn halfway. The housing is stainless steel with double glazing and protective grounding, and a baking tray comes in the box.

Its 4.4 stars rest on 3,232 ratings, and that is the point. It is the one large review pool on this page that is not shared with sibling models, which makes it the most tested machine here by a wide margin. Two honest caveats. At GBP 149.95 it is almost forty pounds dearer than anything else on the list. And the spec table reads 56D x 40.5W x 35H, making it the only oven here published as deeper than it is wide, so measure for roughly 56cm across the front before you commit.",
            ['3,232 ratings, by far the largest genuine sample here', 'Convection fan for even browning without turning the tray', '2000W and up to 230C, about 44 watts a litre', 'Stainless steel housing with double glazing', 'Rotisserie and baking tray included'],
            ['GBP 149.95, almost forty pounds dearer than the rest', 'Depth and width look swapped in the spec table, so measure first', 'No timer duration published anywhere on the listing', 'No minimum temperature published'],
            [
                'Customer ratings|3,232 at 4.4 stars|good|The only big review pool here not shared with sibling models',
                'Power|2000W, up to 230C|good|Roughly 44 watts per litre of cavity',
                'Fan|Convection, plus rotisserie|good|One of only two listings here that publish a fan',
                'Dimensions|56D x 40.5W x 35H cm|neutral|The only oven here published deeper than wide, so measure',
                'Price|£149.95|bad|The dearest on this page',
            ],
        ],
        [
            'Igenix IG7161 Countertop Mini Oven, 60 Litre, 2500W, Fan Assisted',
            '£109.99', 4.2, 623,
            'B09BJSTXMQ',
            '71subQ6okKL',
            'Igenix IG7161 60 litre fan assisted countertop mini oven',
            'The most oven for the money: sixty litres, fan assisted, 2500W, and the most complete spec sheet on the page for GBP 109.99.',
            "Sixty litres for GBP 109.99 works out at about GBP 1.83 a litre, and the comparison that makes the point is on this very list. The Cooks Professional at number nine costs exactly the same GBP 109.99 and gives you twenty-eight litres. Same money, thirty-two litres more cavity, which is the difference between a big toaster oven and a genuine second oven for a bird or a full tray in December.

Meanwhile it publishes what most rivals here leave blank: 2500W, a range of 100C to 230C, a 60-minute timer, an oven light and double insulation. It even labels its dimensions axis by axis, H 39.7cm x W 64.5cm x D 47cm, which no other listing on the page bothers to do. It is also one of only two here to claim convection, although its own bullet says that is unlike other mini ovens, and the TZS at number one sits on the same results page publishing a fan of its own.

The cost is counter space, and it is not small. At 64.5cm wide and 47cm deep it claims about 0.30 square metres of worktop, and the external box works out at roughly 120 litres for a 60-litre cavity, so half of what you make room for is casing rather than oven. Its 4.2 over 623 ratings is a step below the TZS in both score and sample.",
            ['Sixty litres for GBP 109.99, about GBP 1.83 a litre', 'Fan assisted, one of only two here that publish convection', 'Publishes 2500W, 100C to 230C, timer, oven light and insulation', 'The only listing here that labels all three dimensions by axis', 'Same price as the 28-litre oven at number nine'],
            ['64.5cm wide and 47cm deep, about 0.30 square metres of worktop', 'The box is roughly 120 litres for a 60-litre cavity', '4.2 stars over 623 ratings, mid-table on both counts', 'Too big for a standard student worktop'],
            [
                'Capacity|60 litres for £109.99|good|About £1.83 a litre, the same money as 28 litres at number nine',
                'Power|2500W, 100C to 230C|good|Both ends of the range published',
                'Fan|Fan assisted convection|good',
                'Footprint|64.5W x 47D cm|bad|Roughly 0.30 square metres of worktop',
                'Customer ratings|623 at 4.2 stars|neutral',
            ],
        ],
        [
            'NETTA 45L Mini Oven with Double Hotplate and Electric Grill',
            '£99.99', 4.2, 1230,
            'B07RFSMZ6D',
            '71eGqDkMZZL',
            'NETTA 45L mini oven with double hotplate and electric grill',
            'The whole cooker in one box: a 45-litre oven, a grill and two hotplates for GBP 99.99, with a 120-minute timer.',
            "If the room has no hob in it at all, this changes the shopping list. A bedsit, a caravan, an annexe or a holiday let needs one appliance that boils a pan and roasts a tray, and this is the largest oven among the hotplate models here: 45 litres underneath, an electric grill, and two integrated burners on the lid. The 120-minute timer is twice what most rivals on this page offer, which matters on a slow roast where a 60-minute timer means getting up to reset it.

However, the arithmetic on this listing is worth reading before you buy. Bullet three advertises a high-power 2850W total output. Bullet two, one line above it, gives the split: an 800W burner and a 600W burner. Take those away and roughly 1,450W is left for the oven and the grill, which is fifty watts less than the 1,500W NETTA quotes for its own 30-litre oven with no hotplates at all. Per litre of cavity that is about 32 watts against 50, so it heats a bigger space with less to do it. It is a cooking station first and an oven second.

Two more things to weigh. At 58.1cm wide and 41cm tall it is the tallest machine on this page, taller even than the 60-litre pair, and the burners sit on the lid, so anything in the cupboard above has to clear a pan as well as the case. And its 4.2 from 1,230 ratings is the identical figure shown on NETTA's 35-litre and 30-litre models, three different sizes with one shared pool rather than a verdict on this one.",
            ['A 45-litre oven, a grill and two hotplates for GBP 99.99', 'The largest cavity among the cooker replacements here', '120-minute timer, twice what most rivals publish', 'The only listing here that publishes what each hotplate draws', 'Covers a whole kitchen where there is no hob at all'],
            ['About 1,450W left for the oven once the hotplates are subtracted', 'Around 32 watts a litre, a third less than the 30-litre ovens', '41cm tall with burners on the lid, so it needs clearance above', '1,230 ratings is a pool shared with two other NETTA sizes'],
            [
                'Oven power|About 1,450W once the hotplates come off|bad|2850W total less 800W and 600W of burner',
                'Capacity|45 litres, plus two hotplates|good',
                'Timer|120 minutes|good|Twice the timer on most rivals here',
                'Height|41 cm|neutral|The tallest here, and the burners sit on the lid',
                'Customer ratings|1,230 at 4.2 stars|bad|The same count shown on the NETTA 35L and 30L',
            ],
        ],
        [
            'Prodex PX7030B 30 Litre Tabletop Mini Oven, 1500W Cooker and Grill',
            '£64.99', 4.4, 505,
            'B09RKP6W4T',
            '71-t4HFDhdL',
            'Prodex PX7030B 30 litre tabletop mini oven',
            'The sensible small one: 30 litres, 1500W, a published 100C to 230C range and an insulated body for GBP 64.99.',
            "For a student room or a single household, this is the practical size. Thirty litres handles toast, jacket potatoes, a tray of chips and reheating, and at 51cm wide by 38.6cm deep the table top mini oven sits on a normal worktop without a rethink of where the kettle goes. Behind it is 1500W, which comes to 50 watts a litre, the joint-highest heat-to-capacity ratio on this page and a good deal more than the 32 you get from the NETTA 45L above.

Meanwhile it does something several rivals here do not: it publishes both ends of its temperature range, 100C to 230C. That 230C ceiling is the same figure given by every listing on this page that publishes one at all, so the useful information is the floor. Its spec table also lists it as insulated, although no bullet on the listing explains what that means in practice.

Two reasons it is fourth rather than higher. There is no fan claim anywhere on the listing, so trays want turning halfway, and no timer duration is published at all, which on a small oven is a real omission. Its 4.4 over 505 ratings also happens to be the identical figure shown on the 60-litre Prodex at number six, so treat it as one shared pool rather than 505 verdicts on this oven.",
            ['GBP 64.99 for 30 litres, 1500W and a published range', '50 watts a litre, the joint-best heat-to-capacity ratio here', 'Publishes both ends of its 100C to 230C range', '51cm wide, fits a normal worktop without rearranging it', 'Insulated body listed in the spec table'],
            ['No fan claim, so trays need turning halfway', 'No timer duration published anywhere on the listing', 'Thirty litres will not take a large roasting tin', 'The 505 ratings are shared with the 60-litre Prodex'],
            [
                'Power|1500W|good|50 watts a litre, the joint-best ratio here',
                'Temperature|100C to 230C|good|Both ends published',
                'Footprint|51W x 38.6D cm|good|Fits a standard worktop run',
                'Timer|Duration not published|bad',
                'Customer ratings|505 at 4.4 stars|neutral|The same count shown on the 60-litre Prodex',
            ],
        ],
        [
            'HOMCOM 30 Litre Mini Oven, Adjustable Temperature, 60 Min Timer',
            '£57.99', 4.2, 90,
            'B0D7VJ6X4Y',
            '71zBZNkq5NL',
            'HOMCOM 30 litre mini oven with 60 minute timer',
            'The cheapest way in at GBP 57.99, and the only oven here that publishes a 60C floor for keeping food warm.',
            "At GBP 57.99 this is the cheapest oven on the page, some GBP 91.96 below the dearest, and it still gives you thirty litres. It is also physically modest with it: 48.6cm wide, 37cm deep and just 32cm tall, which makes it the shortest machine here and one of the easiest to slide under a wall cupboard.

The genuinely interesting number is the temperature floor. HOMCOM publishes 60C to 230C, and nothing else on this page goes anywhere near that bottom end. The Cooks Professional stops at 90C, while the Prodex 30L and the Igenix both floor out at 100C, a full forty degrees higher. For holding a plate warm or proving dough, that is the one axis where the cheapest small oven on the list leads outright. The door is double-layer glass and the wire rack, baking pan and tray handle are dishwasher safe.

By contrast, the listing never publishes a wattage anywhere, in the title, the bullets or the spec table, so heat-up time is a guess. Its Special feature field is catalogue filler that simply restates the title and the capacity. And 90 ratings at 4.2 stars is an early sample rather than a settled verdict. The one line about what fits inside, up to 8 slices of bread or 12 chicken wings, is HOMCOM's own measure of one rack, not a standard anyone else reports.",
            ['GBP 57.99, the cheapest oven on this page', 'A 60C floor, forty degrees below most rivals here', 'Just 32cm tall, the shortest machine on the list', 'Double-layer glass door and dishwasher-safe accessories', 'Small footprint at 48.6cm by 37cm'],
            ['No wattage published anywhere on the listing', 'Only 90 ratings, an early sample', 'The Special feature field just repeats the title', 'The bread-and-wings claim is the maker measure, not a standard'],
            [
                'Price|£57.99|good|The cheapest here, £91.96 below the dearest',
                'Temperature|60C to 230C|good|The lowest published floor on this page',
                'Power|Not published|bad|No wattage in the title, bullets or spec table',
                'Size|48.6W x 37D cm, 32 cm tall|good|The shortest oven here',
                'Customer ratings|90 at 4.2 stars|bad|An early sample',
            ],
        ],
        [
            'Prodex PX7161B Electric Mini Oven with Grill, 60 Litre, Black',
            '£99.99', 4.4, 505,
            'B0D2HVH77M',
            '71l1UziqxKL',
            'Prodex PX7161B 60 litre electric mini oven with grill',
            'The cheapest sixty litres here at GBP 99.99, on exactly the same published dimensions as the Igenix but with far less written down.',
            "This is the most cavity per pound on the page: GBP 99.99 for sixty litres, about GBP 1.67 a litre, ten pounds under the Igenix at number two. And on the published data the two are the same box. Both list 47D x 64.5W x 39.7H centimetres, to the millimetre, and both list sixty litres. Both model numbers even carry the same four digits, IG-7161 and PX-7161-B, while Prodex's own thirty-litre is a PX7030B, a number that encodes its capacity. There is nothing in 7161 that says sixty.

However, the ten pounds buys information. The Igenix listing publishes 2500W, a range of 100C to 230C, a 60-minute timer, an oven light and double insulation. This one publishes sixty litres, an aluminium baking tray, and the words all-in-one, versatile functionality and sleek black finish. No wattage, no temperature range, no timer duration, although the spec table does list Timer as a special feature with nothing anywhere to say how long it runs.

In practice that means the fan, the light and the 2500W you are picturing come from the other listing, not this one. If it is the same machine you save a tenner; if it is not, you have bought a 60-litre oven with no published power figure. Its 4.4 from 505 ratings is also the identical count shown on the 30-litre Prodex, so that is a shared pool too.",
            ['GBP 99.99 for sixty litres, about GBP 1.67 a litre', 'The cheapest capacity on the whole page', 'Same published dimensions as the dearer Igenix, to the millimetre', 'Aluminium baking tray included', 'Black finish where the Igenix is white'],
            ['No wattage published anywhere on the listing', 'No temperature range published at either end', 'Lists a timer in the spec table but never says how long', 'The 505 ratings are shared with the 30-litre Prodex'],
            [
                'Price per litre|£1.67|good|The cheapest capacity on this page',
                'Dimensions|47D x 64.5W x 39.7H cm|neutral|Identical to the Igenix, to the millimetre',
                'Power|Not published|bad',
                'Temperature|Not published|bad|Neither floor nor ceiling given',
                'Customer ratings|505 at 4.4 stars|neutral|The same count shown on the 30-litre Prodex',
            ],
        ],
        [
            'NETTA 35L Mini Oven with Double Hotplate and Electric Grill',
            '£89.99', 4.2, 1230,
            'B07H7RJH4B',
            '71HulTdATpL',
            'NETTA 35L mini oven with double hotplate and electric grill',
            'The same twin-hotplate cooking station as the 45L, squeezed into 53.1cm of width for GBP 89.99.',
            "This is the narrower version of the machine at number three, and the reason to choose it is width rather than price. At 53.1cm across and 37.5cm deep it asks for five centimetres less worktop than the 45-litre model, which in a small kitchen can be the whole argument. You still get a 35-litre oven, an electric grill, two integrated hotplates and the same 120-minute timer, and NETTA publishes a weight of 10.8kg, one of only two ovens on this page that publish one at all.

However, ten pounds more buys the 45-litre version with ten more litres inside, so whenever the space allows, that is the better buy. Per litre this works out at about GBP 2.57 against GBP 2.22 for its bigger brother, and oven-only rivals at this money give you far more cavity again.

The power figure needs care here. The listing quotes 2850W as a combined output and, unlike the 45-litre model, never breaks out what the two hotplates take, so what the oven itself draws is simply not published. No temperature range is given either. And the 1,230 ratings at 4.2 are the same pool shown on the other two NETTA ovens on this page, which makes the score a family average rather than a report on this size.",
            ['53.1cm wide, five centimetres narrower than the 45-litre NETTA', 'Oven, grill and two hotplates in one appliance', '120-minute timer, twice what most rivals here publish', 'Publishes a weight, 10.8kg, which most listings here do not', 'GBP 89.99 for a full cooker replacement'],
            ['The oven share of the 2850W is not published on this listing', 'GBP 10 more buys the 45-litre version and ten more litres', 'No temperature range published at either end', 'The 1,230 ratings are shared across three NETTA sizes'],
            [
                'Power|2850W combined, no split published|bad|Only the 45-litre NETTA breaks out the hotplates',
                'Footprint|53.1W x 37.5D cm|good|Five centimetres narrower than the 45-litre NETTA',
                'Timer|120 minutes|good',
                'Weight|10.8 kg|neutral|One of only two ovens here that publish one',
                'Customer ratings|1,230 at 4.2 stars|bad|The same count shown on the NETTA 45L and 30L',
            ],
        ],
        [
            'NETTA 30L Mini Oven and Electric Grill, 1500W, 60-Minute Timer',
            '£69.99', 4.2, 1230,
            'B0FBHPK37Y',
            '61F+uaVRMdL',
            'NETTA 30L mini oven and electric grill',
            'The one to lift: 7.2kg, the smallest footprint on the page, and 1500W behind thirty litres.',
            "This is the compact oven for people who will move it. At 49.8cm wide and 32.8cm deep it takes the least worktop of anything here, and at 7.2kg it is the lightest weight published on the page, which makes it the realistic choice for a campervan or for going back in a cupboard between uses. Two more litres than the 28-litre Cooks at number nine, in noticeably less space.

Its 1500W is also the number that exposes the headline finding. Thirty litres on 1500W is 50 watts a litre, and this oven has no hotplates sharing that supply. NETTA's own 45-litre station, once its 800W and 600W burners are subtracted from the advertised 2850W, is left with about 1,450W. In other words the small, cheap oven is the more powerful one.

It sits eighth on value rather than on merit. GBP 69.99 is five pounds more than the Prodex at number four for the same thirty litres and the same 1500W, with a lower 4.2 score and only a 60-minute timer. NETTA publishes adjustable heat from 100C but never says where it stops, so the ceiling is unknown. And the 1,230 ratings are the family pool again, shared with the 35-litre and 45-litre models.",
            ['The smallest footprint on this page at 49.8cm by 32.8cm', '7.2kg, the lightest weight published here', '1500W over thirty litres, 50 watts a litre', 'Genuinely portable for a campervan or a cupboard', 'Publishes a 60-minute timer and a 100C starting point'],
            ['GBP 5 more than the Prodex for the same litres and watts', 'No maximum temperature published anywhere', 'Only a 60-minute timer, half the NETTA cooking stations', 'The 1,230 ratings are shared across three NETTA sizes'],
            [
                'Footprint|49.8W x 32.8D cm|good|The smallest on this page',
                'Weight|7.2 kg|good|The lightest published here',
                'Power|1500W|good|50 watts a litre, more than the 45-litre NETTA',
                'Temperature|From 100C, no maximum published|bad',
                'Customer ratings|1,230 at 4.2 stars|bad|The same count shown on the NETTA 45L and 35L',
            ],
        ],
        [
            'Cooks Professional Mini Portable Oven with Hobs, 28L, 90C to 230C',
            '£109.99', 4.5, 101,
            'B0C7HGD6TP',
            '51gFssCgA5L',
            'Cooks Professional 28L mini portable oven with hobs',
            'A large hob, a small hob and a 28-litre oven in 49cm of width, at the highest price per litre on the page.',
            "There are two good reasons this one is here. It fits an oven, a large hob and a small hob into 49cm of width, the least frontage any cooker replacement on this list asks for, and it publishes a 90C floor, the second lowest here, which is useful for holding food warm. Its 4.5 stars are the joint-highest score on the page.

By contrast the value is the weakest on the list. GBP 109.99 for twenty-eight litres works out at about GBP 3.93 a litre, the dearest capacity here by some way, and the same GBP 109.99 buys the Igenix with sixty litres, while GBP 99.99 buys the NETTA with forty-five litres and two hotplates. The footprint is not as thrifty as the width suggests either: 49cm by 39cm is more worktop than either 30-litre oven on this page, both of which hold more food.

The listing is also quieter than the price implies. No wattage is published at all, and although the spec table lists a timer and a bullet mentions precision timing, no duration appears anywhere. The line about a smaller footprint helping to save on electricity compared with a full oven is the maker's claim with no figure attached to it. The 4.5 rests on 101 ratings, one of the two thinnest samples on the page. The title reads Mini Portable Oven, yet no weight is published to tell you how portable that is.",
            ['A large hob, a small hob and an oven in 49cm of width', 'A 90C floor, the second lowest published here', '4.5 stars, the joint-highest score on the page', 'The narrowest cooker replacement on this list', 'Both hobs usable alongside the oven'],
            ['About GBP 3.93 a litre, the dearest capacity here', 'The same money buys sixty litres from the Igenix', 'No wattage and no timer duration published', 'Only 101 ratings behind that 4.5 score'],
            [
                'Price per litre|£3.93|bad|The dearest capacity on this page',
                'Temperature|90C to 230C|good|The second lowest floor here',
                'Hobs|One large, one small|good|Plus a 28-litre oven',
                'Footprint|49W x 39D cm|neutral|More worktop than either 30-litre oven here',
                'Customer ratings|101 at 4.5 stars|neutral|Joint-highest score, one of the thinnest samples',
            ],
        ],
        [
            'HOMCOM 28L Toaster Oven with Double Hotplate, Black',
            '£73.99', 4.5, 66,
            'B0DSVC99CD',
            '71RWI7+8teL',
            'HOMCOM 28L toaster oven with double hotplate',
            'The cheapest oven with two hotplates here at GBP 73.99, on a listing that contradicts its own wattage by a thousand watts.',
            "It still has a job. GBP 73.99 is the least you can pay on this page for an oven with two individually usable hotplates, which for a small kitchen or a room with no hob and a tight budget is exactly the combination that matters. Twenty-eight litres inside, and the accessory set is complete for once: bake rack, bake tray, crumb tray and tray handle, all dishwasher safe.

However, it is last because the listing does not agree with itself. The title says 1600W. The first bullet calls it the powerful 2600W toaster oven. That is a thousand watts apart on one page. There is an innocent explanation available, since NETTA shows elsewhere on this list that these makers quote oven and hotplates as a single combined figure, so 1,600W of oven plus 1,000W of burner would reconcile the two. Nothing on the listing says so, though, and the buyer is left choosing between two numbers.

Worse, there is no third figure to settle it, because this is the only listing on the page with no spec table at all. No brand field, no colour, no capacity, no dimensions. It is the only mini oven here that publishes no measurements whatsoever, so you cannot check that it will fit the space before it arrives. And the 4.5 stars rest on 66 ratings, the thinnest sample on the page.",
            ['GBP 73.99, the cheapest oven with two hotplates here', 'Both hotplates individually usable', 'Complete accessory set, all dishwasher safe', 'Twenty-eight litres for a small kitchen with no hob'],
            ['1600W in the title against 2600W in the first bullet', 'No spec table at all, and no published dimensions', 'No temperature range and no weight published', 'Only 66 ratings, the thinnest sample on the page'],
            [
                'Power|1600W in the title, 2600W in the first bullet|bad|A thousand watts apart on one listing',
                'Dimensions|Not published|bad|The only oven here with no measurements at all',
                'Price|£73.99|good|The cheapest oven with two hotplates here',
                'Accessories|Bake rack, bake tray, crumb tray, tray handle|good|Dishwasher safe',
                'Customer ratings|66 at 4.5 stars|bad|The thinnest sample on this page',
            ],
        ],
    ],
];
