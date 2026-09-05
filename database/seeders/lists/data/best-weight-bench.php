<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
//
// COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// BUSCA: /s?k=weight+bench+adjustable&rh=p_36%3A5000-  (10 FICHAS)
// CATEGORIA FITNESS — UMA DAS MAIS MAGRAS DO SITE. SAZONAL: JANEIRO E OUTONO (home gym).
//
// ─── ACHADO QUE MUDA A COMPRA: CAPACIDADE NAO E O MESMO QUE PESO DO USUARIO ───
//   SO 1 DOS 10 ANUNCIOS SEPARA OS DOIS NUMEROS:
//     YOLEO B08HGJDTC8 (£79.99) .... "375KG Capacity, Max User Weight 150KG, independently tested"
//     375 − 150 = 225 kg SOBRANDO PARA BARRA + ANILHAS. E O UNICO CALCULO CHECAVEL DA PAGINA.
//   OS OUTROS 9 DAO UM NUMERO SO E NUNCA DIZEM SE O LEVANTADOR ESTA DENTRO DELE:
//     B08GKRVB4Y "375KG" / B07HNLBZ4Y "300KG certified" / B0GSYX9T71 "300KG+ dynamic" /
//     B0F941JTVJ "990 lbs" / B07GNTNHLC "300kg" / B09FPBLSS6 "800 Lbs" / B0FNRGPBT3 "318 kg"
//   E 2 NAO PUBLICAM CAPACIDADE NENHUMA (titulo, bullets ou ficha):
//     B07MPWQPW7 JX FITNESS (£79.99) e B0D92Y7T2G KAYMAN (£50.99, o mais barato da pagina).
//   → VAI NA INTRO.
//
// ─── ACHADO 2: O "74.5cm WIDE SEAT" NAO EXISTE (B0GSYX9T71) ───
//   TITULO: "74.5cm Wide Seat". FICHA: "114D x 28W x 44H centimetres".
//   74.5 − 28 = 46.5 cm DE ASSENTO QUE NAO CABE NO PROPRIO BANCO (2,66x a largura publicada).
//   O BULLET 4 DA A RESPOSTA: "EXTRA-LONG 74.5CM BACKREST" — E COMPRIMENTO DE ENCOSTO.
//   (CONTRASTE HONESTO: os 33cm de assento do B08HGJDTC8 num quadro de 32W sao 1 cm de sobra
//    de estofado. ISSO NAO E ERRO. 46,5 cm E.)
//
// ─── ACHADO 3: OS NUMEROS GRANDES DE AJUSTE SAO MULTIPLICACOES ───
//   B08HGJDTC8: "84 Adjustable Positions: 7 back + 4 seat + 3 leg" → 7 x 4 x 3 = 84 (bate).
//   B0F941JTVJ: titulo "72/108 Training Angles"; bullet "9 backrest, 4 seat, 3 footrest" →
//               9 x 4 x 3 = 108 (bate). NADA no anuncio multiplica para 72.
//   B08GKRVB4Y: "90 Adjustable Options and 90 Degrees Vertical, 10 back adjustments" —
//               unico ajuste publicado e 10; NAO DA PARA RECONSTRUIR 90. (E usa "90" para duas
//               coisas diferentes no mesmo bullet: contagem e angulo.)
//   ORDENANDO POR POSICOES DE ENCOSTO (o que da para sentar): 10 (B08GKRVB4Y) > 9 (B0F941JTVJ)
//   > 8 (B07HNLBZ4Y, B0GSYX9T71) > 7 (B08HGJDTC8, B07GNTNHLC) > 6 (B09FPBLSS6, B0D92Y7T2G).
//   INVERTE A ORDEM DO MARKETING. → VAI NA INTRO.
//
// ─── EIXO 1: CABE O CORPO? ENCOSTO E ASSENTO ───
//   SO 3 PUBLICAM COMPRIMENTO DE ENCOSTO: MERACH 80 cm / B0GSYX9T71 74.5 cm / YOLEO ENISO 71 cm.
//   (80 − 71 = 9 cm entre o maior e o menor publicado.)
//   LARGURA DE ASSENTO: PUBLICADA UMA UNICA VEZ NA PAGINA (B08HGJDTC8, 33 cm).
//   ALTURA DE ASSENTO NOS BANCOS PLANOS: 42 / 44 / 44 / 44 / 48 cm — 6 cm de diferenca,
//   e e isso que decide se o levantador baixo planta o pe no chao.
//
// ─── EIXO 2: AJUSTE QUE SERVE — 90 GRAUS E DECLINE ───
//   90 GRAUS VERTICAL PUBLICADO POR 2: B08GKRVB4Y e B0FNRGPBT3 ("90 to -30 degrees").
//   B0GSYX9T71 PARA EM 67 GRAUS (23 GRAUS AQUEM DA VERTICAL) — sem press sentado.
//   MAIOR DECLINE PUBLICADO: −31 graus (B0GSYX9T71).
//
// ─── EIXO 3: CAPACIDADE, MASSA E O QUE ELA VALE ───
//   RAZAO CAPACIDADE / PESO DO PROPRIO BANCO:
//     B0GSYX9T71 300 / 7.73  = 38.8x  (a mais agressiva da pagina, e o banco mais leve)
//     B09FPBLSS6 363 / 18.3  = 19.8x  (a mais conservadora, e o banco mais pesado)
//   IMPERIAL NUMA LOJA BRITANICA: 800 lb = 362.9 kg (B09FPBLSS6, sem nenhum numero em kg);
//     990 lb = 449.06 kg contra titulo "MAX 450KG" (B0F941JTVJ arredonda 0,94 kg PARA CIMA);
//     318 kg (B0FNRGPBT3) = 700 lb convertido — a unica capacidade metrica nao redonda da pagina.
//   CERTIFICACAO: 3 ALEGAM, NENHUMA CITA NUMERO DE NORMA. A MESMA MARCA (YOLEO) NOMEIA UM ORGAO
//     AMERICANO NUM BANCO (ASTM) E UM EUROPEU NO OUTRO (ENISO) PARA O MESMO 375 kg.
//     REGRA 7: SO REPORTAR O QUE O ANUNCIO DIZ. NUNCA AFIRMAR CONFORMIDADE.
//
// ─── EIXO 4: PEGADA, DOBRA E MONTAGEM ───
//   SO 1 DIZ QUANTO DOBRA: B08HGJDTC8, 80 x 30 x 20 cm. OS OUTROS 9 DIZEM SO "foldable".
//   "PRODUCT DIMENSIONS" NAO QUER DIZER A MESMA COISA DUAS VEZES: bancos planos reportam
//   ALTURA DE ASSENTO (42–48H); as estacoes reportam ALTURA TOTAL (106–124H). NAO DA PARA ORDENAR.
//   PEGADA: HOMCOM 160 x 54 = 8.640 cm2 contra YOLEO ENISO 113 x 32 = 3.616 cm2 → 2,4x o chao.
//
// ⚠ FICHAS QUEBRADAS (comentario, mas duas mudam a compra):
//   B07MPWQPW7: ficha "47D x 10W x 46H MILLIMETRES" (banco de 4,7 cm) contra o proprio bullet
//     "43.11in L" = 109,5 cm. 1095 / 47 = 23,3x de diferenca NO MESMO ANUNCIO. Convertido, o banco
//     real da ~109,5 x 27–40,5 x 45 cm — quase identico ao FLYBIRD B07HNLBZ4Y (107,4 x 38 x 44).
//   B0D92Y7T2G: "108D x 108W x 112H". A PROFUNDIDADE ESTA NA FAIXA (107,4–160); A LARGURA E O CAMPO
//     QUEBRADO — 108 cm e o DOBRO da maior largura viavel da pagina (HOMCOM, 54 cm) e igual a
//     propria profundidade. Larguras da pagina: 21 / 28 / 32 / 33 / 38 / 40 / 48.5 / 54 (+ 10 do JX).
//   B0GSYX9T71: ficha lista DOIS METAIS — "Material: Aluminium" e "Frame material: Commercial Steel".
//   PESO PROPRIO: B08GKRVB4Y ficha 11.9 kg contra bullet "only 10.4KG" (1,5 kg, 14% mais pesado);
//     B0D92Y7T2G ficha 9 kg contra bullet "weighing just 10 kg" (esse SUPERestima o proprio peso).
//     NAO MUDA QUAL BANCO COMPRAR — vale uma linha para quem sobe escada com ele.
//   B07GNTNHLC: unico anuncio que diz que anilha serve — "2.5cm diameter", que e a bitola de 1 polegada
//     (1 in = 2,54 cm) e NAO os 50 mm olimpicos. Esta enterrado no ultimo bullet. (O anuncio chama de
//     "diameter" o que so pode ser o furo.)
//
// ✔ OS PONTOS HONESTOS DA PAGINA (dizer isso tambem):
//   B07GNTNHLC e o UNICO cuja ficha e cujo bullet concordam em TODAS as dimensoes (160 x 54 x 106).
//   B07HNLBZ4Y e B0D92Y7T2G RECUSAM a multiplicacao e reportam direto ("8 back, 4 seat" / "6, 4, 3").
//     O Kayman, se quisesse, teria estampado 72 no titulo (6 x 4 x 3) e nao estampou.
//
// ⚠ CINCO ANUNCIOS, DUAS MARCAS: campo de marca FLYBIRD em B07HNLBZ4Y, B0GSYX9T71 (titulo SEM marca
//   nenhuma) e B0FNRGPBT3; YOLEO em B08GKRVB4Y e B08HGJDTC8. Quem compara "dez bancos" compara oito casas.
//
// POOL DE AVALIACOES: 20.989 do FLYBIRD B07HNLBZ4Y sao 3,02x a soma dos outros nove (6.941) e 7,9x
//   o segundo (2.658). O PROPRIO BULLET 2 chama o produto de "2026 step-up bench" — logo o pool
//   atravessa revisoes do MESMO ASIN. NAO E pool compartilhado entre modelos: os dez numeros sao
//   todos distintos. Reportar exatamente assim.
//
// PROFUNDIDADE (FICHA): 20.989 / 2.658 / 1.115 / 695 / 650 / 625 / 458 / 363 / 236 / 141.
// (SEM PISO DE AVALIACOES — ver memoria feedback-ranked10-no-review-floor. O de 141 entra pelo que E:
//  o unico que se descreve como "light daily home use" e um dos dois com 90 graus publicados.)
//
// FOCUS KEYWORD: best weight bench
// VARIACOES: weight bench / adjustable weight bench / foldable weight bench / folding weight bench /
// home gym bench / workout bench / incline bench / weight bench for home gym / adjustable bench
// ═══════════════════════════════════════════════════════════════

return [
    'category' => 'fitness',
    'slug' => 'best-weight-bench',
    'title' => 'Best Weight Bench 2026: 10 Adjustable Home Gym Benches Ranked',
    'meta_title' => 'Best Weight Bench 2026: 10 Adjustable Benches Ranked',
    'meta_description' => 'The best weight bench picks for home gyms, from folding budget benches to heavy-duty stations. Ten adjustable weight benches compared on fit, load and price.',
    'focus_keyword' => 'best weight bench',
    'published_at' => '2026-09-03 10:30:00',

    'intro' => "If you want the short answer, the YOLEO 375KG bench is the best weight bench for most home lifters: 2,658 ratings at 4.6 stars, a 71cm backrest and a 33cm seat, 84 positions spread across back, seat and legs, and GBP 79.99. It arrives 98 per cent assembled on the listing's own account, needs two pins and no tools, and folds to a stated 80 x 30 x 20cm. If you are tall or spending less, the GBP 59.99 foldable at number two publishes a 74.5cm backrest and weighs only 7.73kg.

Now the number that should decide your shortlist. Only one of these ten listings tells you how much of that capacity you are allowed to be. The YOLEO publishes a 375kg capacity and, separately, a 150kg maximum user weight, which leaves 225kg for the bar and the plates. The other nine quote one big figure and never say whether the lifter is inside it, and two of them, the JX FITNESS at GBP 79.99 and the Kayman at GBP 50.99, publish no capacity anywhere at all. After that, ignore the headline adjustment counts. Eighty-four positions is 7 back x 4 seat x 3 leg, and MERACH's 108 is 9 x 4 x 3, so the honest comparison is back positions alone, where the order flips: 10, then 9, then 7. Finally, buy on fit. Backrest length is what stops your head hanging off the end, and only three benches here publish one, at 80cm, 74.5cm and 71cm. Seat width is published exactly once on the whole page.",

    'conclusion' => "For most home gyms the best weight bench here is the YOLEO 375KG. It is the only one that separates the frame rating from the 150kg maximum user weight, the only one that publishes both a backrest length and a seat width, and the only one that says how small it folds. Add 98 per cent pre-assembly and 2,658 ratings at 4.6 stars and it is the least risky sixty seconds of shopping on this page. For value, the GBP 59.99 foldable at number two gives you a longer 74.5cm backrest and the widest angle range here, provided you read its title with your eyes open.

Buy differently if your body or your room breaks the average. Over 178cm, backrest length beats everything else, so go for the 74.5cm foldable or the 80cm MERACH and stop counting angles. Lifting heavy with the bench out permanently? Pay the GBP 127.49 for the JOROTO, because 18.3kg of frame and 60mm pads are what stability costs, but note its 800lb works out at roughly 363kg, less than the 375kg both YOLEO benches quote despite the bigger-sounding number. If the bench has to vanish into a cupboard, weight and folded size decide it: 7.73kg, or 10.2kg folding to 80 x 30 x 20cm. And if you want leg extension work without a second machine, the HOMCOM is the only option here, so long as you accept a 160cm footprint. One warning across the whole category. These capacity numbers are frame ratings, not user ratings, and nine of the ten never say which.",

    'products' => [
        [
            'YOLEO Adjustable Weight Bench for Home Gym, 375KG, 98% Pre-Assembled',
            '£79.99', 4.6, 2658,
            'B08HGJDTC8',
            '81pu4FK5uSL',
            'best weight bench',
            'The best weight bench for most home lifters: the only listing here that separates a 375kg frame rating from a 150kg maximum user weight.',
            "Start with the part that decides whether a bench is comfortable, because most listings will not tell you. This one publishes a 71cm extended backrest and a 33cm wide seat, and that seat width is the only one on the entire page. Seventy-one centimetres is enough to keep your shoulder blades supported through a press instead of leaving your head dangling past the end of the pad, which is the single most common complaint about cheap adjustable benches.

Then the arithmetic. The listing quotes a 375kg capacity and, separately, a maximum user weight of 150kg, so 225kg is left for the bar and the plates. Nine other benches here give one number and never say whether the lifter counts inside it. The listing also states the figure was independently tested and names ENISO, though no standard number is given that a buyer could look up, so treat that as the maker's claim rather than a verified fact. It is still the only claim on this page you can do sums with.

Practically, it is easy to live with. YOLEO says it arrives 98 per cent assembled and needs two pins and no tools, it folds in seconds to a stated 80 x 30 x 20cm, and at 10.2kg it is the second lightest bench here. Two honest caveats. The headline 84 positions is a multiplication, 7 back x 4 seat x 3 leg, and seven back positions is mid-pack rather than best. And the 113cm frame is on the short side, so very tall lifters should measure before buying.",
            ['The only listing separating 375kg capacity from a 150kg maximum user weight', 'Publishes both a 71cm backrest and a 33cm seat, the only seat width on the page', 'The only bench here that says how small it folds, at 80 x 30 x 20cm', '98 per cent pre-assembled, two pins and no tools', '2,658 ratings at 4.6 stars, a deep and settled sample'],
            ['GBP 79.99 sits at the top of the mid-price cluster', 'The 84 positions are combinations, not 84 places to sit', 'Seven back adjustments is fewer than the 10 and 9 above it', '113cm frame is shorter than the 132cm YOLEO at number four'],
            [
                'Customer ratings|2,658 at 4.6 stars|good|Second deepest sample here',
                'Stated capacity|375 kg frame, 150 kg user|good|The only listing that splits the two',
                'Body fit|71 cm backrest, 33 cm seat|good|Only published seat width on the page',
                'Folded size|80 x 30 x 20 cm|good|The only folded figure published here',
                'Price|£79.99|neutral|Joint dearest of the folding benches',
            ],
        ],
        [
            'Weight Bench Foldable, 300kg Workout Bench, 74.5cm Wide Seat, Adjustable',
            '£59.99', 4.6, 625,
            'B0GSYX9T71',
            '719zG2ZrQzL',
            'foldable adjustable weight bench with long backrest',
            'Best value and the pick for taller buyers: a 74.5cm backrest and eight angles for GBP 59.99, on a listing that contradicts its own title.',
            "This is a lot of usable bench for sixty pounds. It publishes a 74.5cm backrest, the second longest on the page, and the bullet says outright that the length is there for buyers over 178cm, which is an unusually specific promise from a budget listing. The angle range is the widest here too: eight positions running from a 31 degree decline to 67 degrees upright, so decline work and incline pressing are both genuinely on the menu. At 7.73kg it is by some way the lightest bench in this group and the listing says it folds to fit under a bed.

The title, however, is wrong, and it matters that you know why. It advertises a 74.5cm wide seat while the spec table gives the whole product as 114 x 28 x 44cm. That is a seat 46.5cm wider than the entire bench, or 2.66 times its published width, which cannot exist. The fourth bullet supplies the answer: 74.5cm is the backrest length. For contrast, the YOLEO above claims a 33cm seat on a 32cm frame, which is ordinary pad overhang. This one is a different order of error. The spec table also names two metals, listing the material as aluminium and the frame material as commercial steel, and although the brand field says FLYBIRD, the title carries no brand name at all.

Two things to weigh before you buy. The most upright position is 67 degrees, not vertical, so seated overhead pressing with your back supported is out; two rivals here publish a full 90. And 300kg-plus of claimed dynamic load on a 7.73kg frame works out at 38.8 times the bench's own weight, the most aggressive ratio on this page. With 625 ratings at 4.6 stars the record is decent rather than deep.",
            ['GBP 59.99, joint second cheapest bench here', 'Publishes a 74.5cm backrest, the second longest on the page', 'Eight angles from a 31 degree decline to 67 degrees upright, the widest range here', '7.73kg, the lightest bench in this group, and folds under a bed', '625 ratings at 4.6 stars'],
            ['The title sells a 74.5cm seat on a bench the spec table says is 28cm wide', 'Stops at 67 degrees, so no seated press with the back vertical', 'Spec table names aluminium and commercial steel as the material', '300kg claimed on a 7.73kg frame, 38.8 times its own weight'],
            [
                'Price|£59.99|good|Joint second cheapest here',
                'Backrest|74.5 cm|good|Listing says it suits buyers over 178cm',
                'Angle range|-31 to 67 degrees, 8 positions|neutral|Widest range, but not vertical',
                'Title against spec|74.5 cm seat on a 28 cm bench|bad|Read it as backrest length',
                'Bench weight|7.73 kg|neutral|Lightest here, for better and worse',
            ],
        ],
        [
            'FLYBIRD Adjustable Weight Bench, 300KG Capacity, 8 Back Positions',
            '£79.99', 4.6, 20989,
            'B07HNLBZ4Y',
            '61LCzHjGfRL',
            'FLYBIRD adjustable weight bench for home gym',
            'The proven default: 20,989 ratings at 4.6 stars, three times the other nine benches on this page put together.',
            "Twenty thousand nine hundred and eighty-nine ratings is not simply the biggest sample here, it is a different class of evidence. The other nine benches on this page add up to 6,941 between them, so this one listing carries three times their combined record and 7.9 times the next deepest. When that many buyers settle on the same 4.6, the bench is doing roughly what it says.

The listing is also unusually straight about the thing that ruins cheap benches. It calls out rock-solid zero-slip locking rather than shallow grooves, and a backrest that shifts under load mid-press is the failure mode owners complain about most. Eight back positions and four seat positions are reported as they are, with no multiplying up into a headline number, which after MERACH and YOLEO is worth saying out loud. Capacity is given as 300KG and described as certified, though no certifying body is named. At 10.4kg with a sweat-proof grip surface it is easy to move and pleasant in a warm room.

Two reasons it sits third rather than first. It costs GBP 79.99, the same as the better-specified YOLEO above, while publishing no backrest length at all, and its spec table gives a 107.4cm frame, the shortest here, so tall buyers are guessing. And the second bullet calls this a 2026 step-up bench, which means that huge review pool spans earlier revisions of the same listing rather than describing only the bench arriving at your door.",
            ['20,989 ratings at 4.6 stars, three times the other nine combined', 'Reports 8 back and 4 seat positions straight, with no inflated multiplication', 'Zero-slip locking is called out against shallow-groove designs', 'Sweat-proof grip surface and 10.4kg carrying weight', '300KG stated capacity on a reinforced triangle frame'],
            ['GBP 79.99, the same price as the better-specified YOLEO above', 'No backrest length published anywhere on the listing', '107.4cm frame, the shortest published here', 'The bullet calls it a 2026 bench, so the review pool spans older revisions'],
            [
                'Customer ratings|20,989 at 4.6 stars|good|Three times the rest of this page combined',
                'Adjustment|8 back, 4 seat positions|good|Reported straight, not multiplied',
                'Stated capacity|300 kg, no body named|neutral|No maximum user weight given',
                'Frame length|107.4 cm|bad|The shortest on this page',
                'Price|£79.99|neutral',
            ],
        ],
        [
            'YOLEO Adjustable Weight Bench, 300/375KG, 132cm Frame, 90 Degrees Vertical',
            '£69.99', 4.6, 1115,
            'B08GKRVB4Y',
            '71IEKr+9uQL',
            'YOLEO 132cm adjustable weight bench with vertical backrest',
            'The long one, at 132cm with 10 back adjustments and a full 90 degrees vertical, held back by a title that quotes two capacities.',
            "At 132cm this is the longest flat-frame bench on the page, and the listing sells extended head and spine support with a longer headrest to go with it. If your current bench leaves your head unsupported at the top of the pad, length is the fix and this has the most of it. It also offers 10 back adjustments, more than any other bench here, and reaches a full 90 degrees vertical, which is what you need for seated shoulder pressing with your back braced. The frame uses wider leg tubes in a triangle structure, and 1,115 ratings at 4.6 stars is a solid record for GBP 69.99.

The numbers are where it slips. The title quotes 300/375KG and nothing in the listing explains which figure applies to what; the first bullet then uses only the 375. That is awkward given the same brand's other bench, our number one, shows exactly how to publish a pair of capacities properly by naming one as the frame rating and one as the maximum user weight. The second bullet claims 90 adjustable options, but the only adjustment count published is the 10 back positions, so unlike MERACH's 9 x 4 x 3 there is no working here to check. That same bullet also uses 90 twice for two different things, a count of options and an angle in degrees.

One more gap worth knowing if you are carrying it upstairs: the spec table says 11.9kg while the bullet advertises only 10.4kg, a difference of 1.5kg, or 14 per cent heavier than the marketing. Note too that this listing names ASTM while its sibling names ENISO for the identical 375kg figure, and neither cites a standard number, so both are maker claims rather than anything a buyer can verify.",
            ['132cm, the longest flat-frame bench on this page', '10 back adjustments, the most here', 'Reaches a full 90 degrees vertical for seated pressing', 'Extended head and spine support with a longer headrest', '1,115 ratings at 4.6 stars for GBP 69.99'],
            ['The title quotes 300/375KG and never explains which is which', '90 adjustable options cannot be reconstructed from the 10 adjustments published', 'Spec table says 11.9kg against a bullet claiming 10.4kg', 'No backrest length or seat width published'],
            [
                'Frame length|132 cm|good|The longest here',
                'Back adjustments|10|good|The most on this page',
                'Upright angle|90 degrees vertical|good|One of only two here',
                'Stated capacity|300/375 kg, unexplained|bad|No maximum user weight given',
                'Bench weight|11.9 kg spec, 10.4 kg bullet|bad|A 1.5 kg gap on one listing',
            ],
        ],
        [
            'JOROTO MD60 Adjustable Weight Bench, 800 Pounds Capacity, 4 in 1',
            '£127.49', 4.6, 650,
            'B09FPBLSS6',
            '61bq1obGgyL',
            'JOROTO MD60 heavy duty adjustable weight bench',
            'The heavy-duty pick at 18.3kg with 60mm pads, and the only listing on this page that publishes a pad thickness.',
            "This is the most substantial bench in the group by a clear margin. At 18.3kg it carries almost two and a half times the frame weight of the lightest bench here, and mass is the honest proxy for stability once the numbers on the bar get serious. It is also the only listing on the whole page that publishes a pad thickness, at 60mm; every other bench describes its padding in adjectives, from soft foam to thick cushion to breathable upholstery. The 4-in-1 configuration and six backrest positions cover a normal training programme, and it arrives semi-assembled.

Read the capacity carefully, though. It is published only in pounds, at 800lb, with no metric figure anywhere on the listing, and 800lb works out at roughly 363kg. That is less than the 375kg both YOLEO benches quote, so buying the biggest-sounding number would lead you the wrong way. On the other hand, 363kg claimed on an 18.3kg frame is a ratio of 19.8 to one, the most conservative on this page, where the lightest bench here claims 38.8 times its own weight.

The obvious problem is money and floor. GBP 127.49 is two and a half times the cheapest bench here, and at that price you get the joint fewest back positions in the group, six, the same as the GBP 50.99 Kayman. Its footprint of 145 x 48.5cm is the second largest here and it stands 120cm tall, so this is a bench that lives in the room rather than folding away between sessions. What the money buys is mass, pad depth and the fourth function, not adjustment.",
            ['18.3kg of frame, the heaviest and most substantial bench here', 'The only listing on the page that publishes a pad thickness, at 60mm', 'The most conservative capacity claim per kilo of frame, at 19.8 to one', '4-in-1 multifunction with six backrest positions', 'Semi-assembled out of the box, 650 ratings at 4.6 stars'],
            ['GBP 127.49, two and a half times the cheapest bench here', 'Capacity published only in pounds; 800lb is roughly 363kg, below both YOLEOs', 'Six back positions, the joint fewest, on the dearest bench', '145 x 48.5cm and 120cm tall, the second largest footprint here'],
            [
                'Bench weight|18.3 kg|good|The heaviest here, which is the point',
                'Pad thickness|60 mm|good|The only pad figure published on this page',
                'Stated capacity|800 lb, about 363 kg|neutral|No metric figure on the listing',
                'Back positions|6|bad|Joint fewest, on the dearest bench',
                'Price|£127.49|bad|Two and a half times the cheapest here',
            ],
        ],
        [
            'MERACH Weight Bench Foldable for Home Gym, 72/108 Training Angles, MAX 450KG',
            '£72.99', 4.2, 363,
            'B0F941JTVJ',
            '61p5sXIi16L',
            'MERACH foldable weight bench with 80cm backrest',
            'The longest published backrest on the page at 80cm, with nine back positions, let down by the lowest rating here.',
            "If incline pressing is your main lift, the geometry here is the best on the page. The backrest measures 80cm with an integrated headrest, nine centimetres longer than our number one and five and a half longer than the budget foldable at number two. Combined with 16 adjustment points across three planes, nine backrest, four seat and three footrest, and 13kg of steel underneath, this is a genuinely well-proportioned bench for anyone who wants their head supported at every angle rather than only when flat.

The marketing needs unpicking. The title shouts 72/108 training angles, and the 108 does check out, since 9 x 4 x 3 comes to exactly 108. But those are combinations of three separate parts, not 108 places to lie down, and the useful figure is the nine backrest positions. As for the 72, nothing published on the listing multiplies to it. The capacity is similar: the bullet says 990lb, which converts to about 449kg, so the title rounding to MAX 450KG is fair to within a kilogram, but 450 appears nowhere in the bullets and no independent testing is mentioned for the biggest number on this page.

The real reason it sits sixth is the record. At 4.2 stars it carries the lowest average in the group, and across only 363 ratings, so the sample is both thin and the least enthusiastic here. At GBP 72.99 you are paying mid-cluster money on the least settled evidence. Buy it for the 80cm backrest, which is a real and checkable advantage, and go in knowing the reviews are lukewarm.",
            ['80cm backrest with headrest, the longest published on this page', 'Nine back positions, second most here', '13kg of steel, mid-weight and stable for the price', 'Three planes of adjustment: back, seat and footrest', 'GBP 72.99 sits mid-pack for the longest backrest here'],
            ['4.2 stars, the lowest average in this group', 'Only 363 ratings, a thin sample', 'The 108 training angles are 9 x 4 x 3 combinations, not bench positions', 'Nothing on the listing multiplies to the 72 in its own title'],
            [
                'Backrest|80 cm with headrest|good|The longest published here',
                'Back positions|9|good|Second most on this page',
                'Customer ratings|363 at 4.2 stars|bad|Lowest average in the group',
                'Stated capacity|990 lb, about 449 kg|neutral|Title rounds it up to 450 kg',
                'Price|£72.99|neutral',
            ],
        ],
        [
            'FLYBIRD Adjustable Bench FBGEAR23, 318 kg Capacity, 8-Position',
            '£69.99', 4.5, 141,
            'B0FNRGPBT3',
            '71zbwlYuZuL',
            'FLYBIRD FBGEAR23 folding weight bench for light home use',
            'The honest light-use bench: it describes itself that way in its own first bullet, and it publishes a full 90 to minus 30 degree range.',
            "Credit where it is due. The first bullet describes this bench as simple and functional for light daily home use, with no commercial-grade posturing and no capacity theatre. That is a rare and useful thing on a page where several listings talk like gym equipment suppliers. For dumbbell work, sit-ups and general conditioning at home, it is an accurate description.

The adjustment range is real rather than dressed up. The backrest runs from 90 degrees down to minus 30, making this one of only two benches here publishing a genuine vertical position, with a minus 15 degree decline setting for sit-ups. The listing says it is functional five minutes out of the box, and the frame is H-carbon steel at 11.6kg with a thick cushion. Its 48cm seat height is also the tallest of the flat benches here, six centimetres above our number one, which is worth checking if you are short, because planting both feet flat on the floor is what keeps you stable under a press.

Two reservations keep it seventh. It has 141 ratings, the thinnest sample on the page, so treat the 4.5 as an early signal rather than a settled verdict. And at GBP 69.99 it costs exactly what the 132cm YOLEO costs while offering a 109cm frame, no published backrest length and a self-described light-duty brief. The 318kg headline is a curiosity too: it is 700lb converted, the only non-round metric capacity here, which is another imperial figure wearing metric clothes.",
            ['Describes itself honestly as light daily home use', 'Backrest runs a full 90 to minus 30 degrees, one of only two verticals here', 'Minus 15 degree decline setting for sit-ups', 'Stated five minutes from box to usable folding bench', '11.6kg H-carbon steel frame with a thick cushion'],
            ['141 ratings, the thinnest sample on this page', 'GBP 69.99 buys a 132cm YOLEO instead, against this 109cm frame', 'No backrest length published', 'The 318kg headline is simply 700lb converted'],
            [
                'Angle range|90 to -30 degrees|good|One of only two verticals here',
                'Customer ratings|141 at 4.5 stars|bad|The thinnest sample on this page',
                'Assembly|Stated 5 minutes|good',
                'Stated capacity|318 kg|neutral|700 lb converted, no user weight given',
                'Seat height|48 cm|neutral|Tallest of the flat benches here',
            ],
        ],
        [
            'JX FITNESS Adjustable Weight Bench, Flat to Sit-Up, Foldable',
            '£79.99', 4.5, 695,
            'B07MPWQPW7',
            '619ByOYodUL',
            'JX FITNESS folding flat to sit up weight bench',
            'A decent flat-to-sit-up convertible with 695 ratings, sold on the least informative listing on this page.',
            "As a piece of kit this is reasonable. It is a flat bench that converts to a sit-up bench with two-way height adjustment, it uses heavy-duty tubular construction, it folds away with a quick release, and at 10kg it is easy to shift. With 695 ratings at 4.5 stars the record is respectable. If you mainly want a solid flat bench with an ab option rather than a full incline station, it does that job.

The listing is the problem, and it is why the bench sits eighth. The spec table gives the product dimensions as 47 x 10 x 46 millimetres, which describes something the size of a matchbox. The fifth bullet then gives the real figures in imperial: 43.11 inches long, 10.63 to 15.95 inches wide and 17.72 inches high. Convert those and you get roughly 109.5 x 27 to 40.5 x 45cm, which is almost exactly the FLYBIRD at number three. So the same listing publishes two lengths that differ by a factor of 23, and the only usable one is in inches, in a British shop.

Worse, no capacity figure appears anywhere: not in the title, not in the bullets, not in the spec table. On a weight bench that is the one number that genuinely matters, and it is simply absent, while a bullet offers tons of training possibilities where a specification should be. At GBP 79.99 you are paying top-of-cluster money, the same as our number one, for the least informative listing here.",
            ['695 ratings at 4.5 stars, a solid record', 'Flat bench converts to a sit-up bench with two-way height adjustment', 'Quick-release folding and 10kg carrying weight', 'Heavy-duty tubular construction', 'Real size works out at roughly 109.5 x 27 to 40.5 x 45cm'],
            ['No capacity figure published anywhere on the listing', 'Spec table gives the bench as 47 x 10 x 46 millimetres', 'The only usable dimensions are in inches', 'GBP 79.99, the same as our top pick, for far less information'],
            [
                'Stated capacity|None published|bad|Absent from title, bullets and spec table',
                'Spec table size|47 x 10 x 46 mm|bad|A bench the size of a matchbox',
                'Real size|About 109.5 x 27 to 40.5 x 45 cm|neutral|Converted from the imperial bullet',
                'Customer ratings|695 at 4.5 stars|good',
                'Price|£79.99|bad|Top of the cluster for the least detail',
            ],
        ],
        [
            'Kayman Adjustable Weight Bench, 6 Back, 4 Seat, 3 Leg Levels',
            '£50.99', 4.3, 236,
            'B0D92Y7T2G',
            '71N6o7XLSrL',
            'Kayman cheap adjustable weight bench with three plane adjustment',
            'The cheapest way in at GBP 50.99, with three-plane adjustment reported honestly and no capacity figure at all.',
            "At GBP 50.99 this is the lowest price in the group, and the architecture is not a cut-down one: six back levels, four seat levels and three leg levels is the same three-plane arrangement as benches costing thirty pounds more. It deserves credit for how it reports them, too. Six times four times three comes to 72, and the listing could easily have stamped that on the title the way two rivals here have done with 84 and 108. It did not. At 9kg it folds and carries easily, and steel with EPE foam and a PU covering is a normal specification at this money.

What you do not get is information. No capacity figure appears anywhere on the listing; the fourth bullet says only that it is sturdy and stable for a range of weights, which tells a buyer nothing about whether it will hold them plus a loaded barbell. There is no backrest length either, and the spec table gives the dimensions as 108 x 108 x 112cm. The 108cm depth is credible and sits inside the range every other bench occupies, but the width is broken: 108cm is exactly double the widest working figure on this page and exactly equal to its own depth, when every other bench here measures between 21 and 54cm across.

It also contradicts the one number it does publish, with the spec table saying 9kg and the bullet saying it weighs just 10kg, which is the unusual case of a listing over-claiming its own weight. With 236 ratings at 4.3 stars, the sample is thin and the score is the joint lowest here. For a teenager's first bench or occasional dumbbell work in a small flat it is a legitimate entry point, but you are buying on price, not on evidence.",
            ['GBP 50.99, the cheapest bench on this page', 'Six back, four seat and three leg levels, the same three-plane layout as dearer benches', 'Reports its adjustments straight instead of multiplying them to 72', '9kg on the spec table, easy to fold and carry', 'Steel frame with EPE foam and PU covering'],
            ['No capacity figure published anywhere on the listing', 'Spec width of 108cm is double the widest credible bench here', 'No backrest length published', '236 ratings at 4.3, a thin sample and the joint lowest score'],
            [
                'Price|£50.99|good|The cheapest here',
                'Adjustment|6 back, 4 seat, 3 leg|good|Reported straight, not multiplied',
                'Stated capacity|None published|bad|Only sturdy and stable for a range of weights',
                'Spec width|108 cm|bad|Double the widest working figure on this page',
                'Customer ratings|236 at 4.3 stars|bad|Joint lowest score here',
            ],
        ],
        [
            'HOMCOM Foldable Weight Bench with Leg Extension, 7-Level Backrest',
            '£59.99', 4.3, 458,
            'B07GNTNHLC',
            '61k61Q8S5nL',
            'HOMCOM foldable weight bench with built in leg extension',
            'A leg-extension station first and a bench second, with the largest footprint here and the most consistent spec sheet on the page.',
            "It earns its place for one reason. This is the only entry here with a built-in leg extension, with foam rollers supporting the knees and ankles, so if you want quad and hamstring work without buying a second machine, nothing else in this group offers it. Seven backrest levels and a stated 300kg maximum load at GBP 59.99 make it joint second cheapest, and it folds away for storage.

It also deserves a compliment the rest of the page has not earned. It is the only listing here whose spec table and bullet agree on every single dimension, both giving 160 x 54 x 106cm. It is likewise the only listing that says anything about plate compatibility, and that detail matters: the last bullet specifies plates with a 2.5cm diameter, which is the one-inch standard bar size rather than the 50mm Olympic bore, so the plates you already own may not fit. Note too that on a weight plate the figure quoted can only describe the centre hole rather than the plate itself.

As a bench, though, it is the weakest here, and the footprint is why. Its 160 x 54cm floor area is the largest in the group, 2.4 times our number one and bigger even than the GBP 127.49 JOROTO, for a bench with fewer adjustments than anything above it. There is no seat or leg-angle adjustment at all, only the seven backrest levels, so incline work is coarse. And at 4.3 across 458 ratings it carries the joint lowest score here. Buy it if the leg extension is the point; if you want a bench, everything above it is a better bench.",
            ['The only entry here with a built-in leg extension and foam rollers', 'The only listing whose spec table and bullet agree on every dimension', 'The only listing that states which weight plates fit', 'Seven backrest levels and a stated 300kg maximum load', 'GBP 59.99, joint second cheapest on this page'],
            ['160 x 54cm is the largest footprint here, 2.4 times our top pick', 'No seat or leg-angle adjustment, only the seven backrest levels', 'Takes 2.5cm standard plates, not the 50mm Olympic bore', '4.3 across 458 ratings, the joint lowest score here'],
            [
                'Leg extension|Built in, with foam rollers|good|The only one on this page',
                'Spec consistency|Table and bullet agree|good|The only listing here that does',
                'Plate fit|2.5 cm bore|bad|Standard size, not 50mm Olympic',
                'Footprint|160 x 54 cm|bad|The largest in this group',
                'Customer ratings|458 at 4.3 stars|bad|Joint lowest score here',
            ],
        ],
    ],
];
