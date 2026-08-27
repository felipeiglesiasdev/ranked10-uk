<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class HeatedClothesAirersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE VARAIS AQUECIDOS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // COLETA: AMAZON.CO.UK EM 27/08/2026, ENTREGA EM M4 6BD (MANCHESTER), BUSCA "heated clothes airer" FILTRADA A PARTIR DE £35.
        //
        // ═══ ACHADOS DA COLETA (O DIFERENCIAL DO ARTIGO) ═══
        // 1. POTENCIA VARIA 6,5x NA MESMA BUSCA: 230W (DAEWOO) ATE 1500W (KASYDOFF). OS DOIS EXTREMOS SE ANUNCIAM COMO "ENERGY EFFICIENT".
        //    E 3 DOS 10 ANUNCIOS NAO INFORMAM A POTENCIA EM LUGAR NENHUM: BLACK+DECKER 63099, BLACK+DECKER 63091 E OYPLA.
        // 2. O CAMPO "WEIGHT LIMIT" VARIA 7,6x: OYPLA DECLARA 3,7kg; A MAIORIA DECLARA 15kg; INNOTIC DECLARA 28kg NA TABELA.
        //    INNOTIC SE CONTRADIZ SOZINHO: O TITULO DIZ "21KG Load" E A TABELA DE ESPECIFICACOES DIZ "Weight limit 28 Kilograms".
        //    HOMEFRONT NAO DECLARA LIMITE DE PESO NENHUM.
        // 3. DRY:SOON DELUXE (£169,99) TEM FICHA IDENTICA AO DRY:SOON NORMAL (£139,99): 300W, 21m, 15kg. OS £30 COMPRAM O TIMER.
        // 4. A BUSCA ESTA CONTAMINADA: AS CAPAS AVULSAS DRY:SOON (B01HTGQMTA £48,49 COM 991 AVALIACOES E B00S9OQWS8 £48,49 COM 1.401)
        //    APARECEM ENTRE OS VARAIS, E O VILEDA INFINITY FLEX PLUS (£64, 5.800 AVALIACOES, 4.6) NAO E AQUECIDO. FICARAM DE FORA.
        // 5. BLACK+DECKER 63099 PROMETE "8.4p per hour" SEM DIZER A POTENCIA — 8,4p/h SO FECHA SE O APARELHO FOR ~336W A 25p/kWh.
        //
        // ═══ CRITERIO DE CORTE ═══
        // EXCLUIDOS POR AMOSTRA INSUFICIENTE (<10 AVALIACOES): B0G4X97GXQ (6), B0FV8BB66F (6), B0FWTD3JNN (8), B0G9MLTJKW (4), B0GGHV4WJ4 (7).
        // EXCLUIDOS POR NAO SEREM VARAL AQUECIDO: AS DUAS CAPAS DRY:SOON, VILEDA INFINITY FLEX (B0BNR5J5SK), HOMCOM 4-TIER (B0140NNT9Q).
        // TODOS OS 10 DA LISTA TEM 521 AVALIACOES OU MAIS — NENHUMA NOTA SEM AMOSTRA.
        //
        // ═══ CUSTO POR HORA ═══
        // CALCULADO A 25p/kWh PARA TODOS, PARA A COMPARACAO SER ENTRE IGUAIS. A TARIFA REAL DE CADA LEITOR MUDA O VALOR ABSOLUTO,
        // MAS NAO MUDA A ORDEM ENTRE OS APARELHOS. 230W = 5,8p/h · 300W = 7,5p/h · 330W = 8,3p/h · 1500W = 37,5p/h.
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best home and household products available in the UK.', // DESCRICAO
        ];

        $article = [
            'slug' => 'best-heated-clothes-airer',                               // SLUG DO ARTIGO (URL) = PALAVRA-CHAVE EM formato-url
            'title' => 'Best Heated Clothes Airer 2026: 10 Ranked by Running Cost', // TITULO / H1 — CONTEM A PALAVRA-CHAVE
            'meta_title' => 'Best Heated Clothes Airer 2026: Top 10 Ranked',      // TITLE DA ABA/GOOGLE (50 CHARS)
            'meta_description' => 'We ranked the best heated clothes airer models on wattage, drying space and real running cost, from a £29.99 230W winged airer to a 1500W heated rack.', // META DESCRIPTION (~155 CHARS)
            'focus_keyword' => 'best heated clothes airer',                      // PALAVRA-CHAVE PRINCIPAL — VIRA O ALT DO HERO
            'hero_image' => '',                                                  // SEM HERO MANUAL: A VIEW USA A FOTO DO PRODUTO #1 COMO IMAGEM SOCIAL
            'intro' => 'A heated clothes airer is the cheapest way to dry laundry indoors through a British winter, but the listings make it almost impossible to compare them. We pulled the full specification sheet for ten of them on Amazon UK and found the numbers do not line up. Power ranges from 230W to 1500W, a difference of more than six times in what the thing costs to run, and three of the ten listings never print a wattage at all. The stated load limit ranges from 3.7kg to 28kg, and one airer contradicts itself between its own title and its own specification table. So this guide ranks the best heated clothes airer options on the two numbers that actually decide the purchase, watts and drying space, with every running cost worked out at the same 25p per kWh so the comparison is like for like.', // INTRO OTIMIZADA
            'conclusion' => 'The best heated clothes airer for most homes is a 300W three-tier model with around 21m of drying space, because that combination dries a full wash load overnight for roughly 7.5p an hour. Spend less and you are buying a winged airer with less capacity, which is a genuine option if you do smaller loads: the Daewoo does it for £29.99. Spend more and you are usually buying a timer, a cover or wheels rather than more drying performance, which is worth knowing before you pay £169.99 for a Dry:Soon Deluxe that dries exactly as much as the £139.99 one. The models to think hardest about are the ones at the extremes: a 1500W rack dries faster but costs around five times as much per hour to run, and any airer that will not tell you its wattage is asking you to take its running cost claim on trust.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-27 10:00:00',                             // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA E REEMBARALHARIA "LATEST GUIDES"
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'Lakeland Dry:Soon 3-Tier Heated Clothes Airer',                            // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£139.99',                                                                // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 1310,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/51HtahgCELL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Lakeland Dry:Soon 3-tier heated clothes airer with three heated shelves open', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07DNYMXXZ?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The airer the rest of the category is measured against: 300W across three tiers, 21m of drying space, a 15kg load limit and a complete specification sheet that does not contradict itself.', // TEXTO CURTO DO CARD
                'body' => 'The Dry:Soon three-tier is the default recommendation for a reason, and it is not brand loyalty. It is the only airer in this guide where every number a buyer needs is printed and consistent: 300W of thermostatically controlled heat, 21m of drying space over three tiers, a 15kg load limit, and a folded depth of 8cm. At 25p per kWh that works out at roughly 7.5p an hour, so a ten-hour overnight run costs about 75p to dry what the listing describes as two full wash loads.

The shelves fold individually, which matters more than it sounds. Drop the middle tier and a duvet or a pair of jeans hangs full length instead of draping over two bars and staying damp in the fold. Left flat, the shelves take knitwear without stretching it on a hanger. At 6.8kg it is heavy enough to feel stable with a full load on it and light enough to carry upstairs.

The case against it is the price. It costs £139.99 and the BLACK+DECKER at number two dries the same 21m and takes the same 15kg for £60 less. What the extra buys is the strongest evidence in the category, 4.4 from 1,310 ratings, and a spec sheet you can actually rely on.',
                'pros' => ['300W and 21m of drying space, both clearly stated', '15kg load limit backed by a consistent spec sheet', 'Shelves fold individually for duvets and long items', 'Folds to 8cm deep for storage', '4.4 from 1,310 ratings, the most reliable evidence here'],
                'contras' => ['£60 more than the BLACK+DECKER with the same drying spec', 'No timer at this price', 'Only a 1-year guarantee'],
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'BLACK+DECKER 63099 3-Tier Heated Clothes Airer',                           // NOME
                'price' => '£79.99',                                                                 // PRECO NA COLETA
                'rating' => 4.2,                                                                     // NOTA
                'reviews_count' => 1543,                                                             // Nº DE AVALIACOES (MAIOR AMOSTRA ENTRE OS 3 ANDARES)
                'image' => 'https://m.media-amazon.com/images/I/81ibDqwzm0L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'BLACK+DECKER 63099 three-tier heated clothes airer in cool grey aluminium', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07PL763M9?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The same 21m of drying space and 15kg limit as the Dry:Soon for £60 less, and the biggest review sample of any three-tier here. The catch is that the listing never states its wattage.', // TEXTO CURTO DO CARD
                'body' => 'On the numbers that matter this matches the Dry:Soon exactly: 21m of drying space, 15kg of wet washing, three tiers, folds flat. It arrives assembled, so it is out of the box and plugged in within a minute. It has 1,543 ratings at 4.2, the largest sample of any three-tier airer in this guide, and it costs £79.99 rather than £139.99.

Here is the thing we could not resolve. The listing makes a specific running cost promise, that it "costs an average of just 8.4p per hour" against roughly £1.50 for a tumble dryer cycle, but nowhere on the page, in the bullets or in the specification table, does it state the wattage. Working backwards, 8.4p an hour only holds if the airer draws about 336W at 25p per kWh. That is entirely plausible for a three-tier of this size and consistent with the 300W to 330W of everything else here. But you are being asked to accept a cost claim without the number it is derived from, and if your unit rate is higher than the one they used, the 8.4p is not your 8.4p.

The other thing to check before you order is stock. When we collected this list the page read "Only 1 left in stock", and this is a model that goes in and out of availability through autumn.',
                'pros' => ['Same 21m and 15kg as airers costing £60 more', '1,543 ratings, the biggest sample of any three-tier here', 'Arrives fully assembled', 'Folds flat for storage'],
                'contras' => ['Wattage is not stated anywhere on the listing', 'The 8.4p per hour claim has no published power figure behind it', 'Showed "Only 1 left in stock" when we checked', 'No cover or timer included'],
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'Neo XL 3-Tier Heated Airer with Cover and Peg Hangers',                    // NOME
                'price' => '£99.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 735,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71vNTRGFMVL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Neo XL three-tier heated clothes airer with 36 rails and zip-up drying cover', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BS9QST4Q?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The most equipment for the money: 300W over 36 heated rails, plus the drying cover and peg hangers in the box, for £70 less than the Dry:Soon Deluxe.', // TEXTO CURTO DO CARD
                'body' => 'This is the value case in the guide once you account for what comes in the box. It is 300W over 36 heated rails with open-sided shelves, and it ships with the drying cover and peg hangers included. Buy the Dry:Soon at number one and the equivalent cover is a separate £48.49 purchase, which is a detail worth pausing on: it means a £99.99 Neo with its cover undercuts a £139.99 Dry:Soon without one by nearly £90 all in.

The cover is not a gimmick on a heated airer. Trapping the warm air around the bars is what turns a 300W rail into something that dries a load overnight rather than leaving it damp, and it is the single cheapest way to speed up any airer here. The open-sided shelves are the other sensible touch, letting you reach across the middle tier without lifting whatever is on the top one.

It is the heaviest airer in the guide at 7.18kg and the widest at 148cm open, so measure the space before you order. The listing states 15kg as the load limit, in line with the Dry:Soon and the BLACK+DECKER, and the 1.8m cable is the longest here bar none.',
                'pros' => ['Cover and peg hangers included, worth about £48 separately', '36 heated rails, the joint-highest count in this guide', '300W clearly stated on the listing', 'Open-sided shelves for easier loading', '1.8m cable, the longest here'],
                'contras' => ['Heaviest airer in the guide at 7.18kg', '148cm wide when open, needs real floor space', 'Smaller review sample than the Dry:Soon or BLACK+DECKER'],
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'Daewoo HEA1874 Winged Heated Clothes Airer, 230W',                         // NOME
                'price' => '£29.99',                                                                 // PRECO NA COLETA (O MAIS BARATO DA LISTA)
                'rating' => 4.1,                                                                     // NOTA
                'reviews_count' => 605,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61JBEGGlDNL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Daewoo HEA1874 winged heated clothes airer in white with folding side wings', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01MCXGNEF?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest way into a heated airer at £29.99, and the cheapest to run at 230W. Less capacity than a three-tier, but it states its wattage and carries a 3-year warranty.', // TEXTO CURTO DO CARD
                'body' => 'At £29.99 this costs less than a quarter of the Dry:Soon Deluxe, and at 230W it is the cheapest airer here to run: about 5.8p an hour at 25p per kWh, against 7.5p for a 300W three-tier and 37.5p for the 1500W rack further down this list. Over a winter of nightly use that gap is real money.

What you give up is shape. This is a winged airer, not a three-tier: a flat bed with two folding side wings, 146cm across when open. It takes the same stated 15kg as the big three-tiers but spreads it over a single level, so bulky items compete for space in a way they do not on a stack of shelves. If you do two or three loads a week rather than daily family washing, that is a limitation you will never notice. If you are drying for four people, it is the wrong airer.

Two things push it above the more expensive models further down. It states its wattage, which three listings in this guide do not, and it carries a 3-year warranty subject to online registration, against the 1-year on the Dry:Soon models. At 2.8kg it is also by far the easiest to move and store.',
                'pros' => ['£29.99, the cheapest airer in this guide by some margin', '230W, the lowest running cost here at about 5.8p an hour', '3-year warranty on registration, longest in the guide', 'Only 2.8kg, easy to fold away and carry', 'Wattage clearly stated'],
                'contras' => ['Winged design holds less than a three-tier despite the same 15kg rating', '146cm wide when open', 'No cover or timer', 'The "up to 89% cheaper" claim is against an unnamed 9kg dryer'],
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'Dry:Soon Deluxe 3-Tier Heated Clothes Airer with Timer',                   // NOME
                'price' => '£169.99',                                                                // PRECO NA COLETA (O MAIS CARO DA LISTA)
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 1571,                                                             // Nº DE AVALIACOES (MAIOR AMOSTRA DA LISTA)
                'image' => 'https://m.media-amazon.com/images/I/31ABIq810AL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Dry:Soon Deluxe three-tier heated clothes airer with built-in digital timer', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B016Q6NOCC?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Identical drying specification to the £139.99 Dry:Soon: 300W, 21m, 15kg. The extra £30 buys a 1 to 12 hour timer and open-sided access, not more drying.', // TEXTO CURTO DO CARD
                'body' => 'Put the two Dry:Soon listings side by side and the specification sheets are the same document. Both are 300W. Both give 21m of drying space. Both take 15kg. Both fold to 8cm. The Deluxe costs £169.99 and the standard model costs £139.99, and the difference between them is a built-in digital timer that runs from 1 to 12 hours and an open-fronted H-frame that makes loading easier.

Whether £30 is a fair price for a timer depends entirely on how you use an airer. If you load it at bedtime and want it to stop at 4am rather than running until you remember it, the timer pays for itself in electricity over a winter, and it removes the one genuine annoyance of a heated airer, which is leaving it on all day by accident. If you are around to switch it off, you are paying £30 for a convenience and getting no extra drying capacity at all.

It has the largest review sample in this guide, 1,571 ratings at 4.3, so the evidence behind it is solid. It is simply not £30 better at the job of drying clothes, and the Neo XL at number three includes a cover for £70 less.',
                'pros' => ['1 to 12 hour timer, the only one on a bar-type airer here', '1,571 ratings, the largest sample in this guide', 'Open-fronted H-frame is genuinely easier to load', 'Same trusted 300W and 21m as the standard model'],
                'contras' => ['£30 more than the standard Dry:Soon for identical drying specification', 'Most expensive airer in the guide at £169.99', 'No cover included at this price', '1-year guarantee only'],
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'Innotic 330W 3-Tier Heated Clothes Airer, 36 Rails',                       // NOME
                'price' => '£139.99',                                                                // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 662,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71bVR8Sh75L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Innotic 330W three-tier heated clothes airer in white with 36 heated rails', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FKN6FY55?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The highest wattage of the bar-type airers at 330W and 36 rails, but the listing states two different load limits: 21kg in the title and 28kg in its own specification table.', // TEXTO CURTO DO CARD
                'body' => 'On paper this is the most capable bar-type airer in the guide. It is 330W rather than 300W, it has 36 heated rails, and it folds to 5.8cm, the slimmest here. It is also the same £139.99 as the Dry:Soon at number one while claiming to carry substantially more weight.

That claim is where it comes apart. The product title sells a "21KG Load". The specification table on the same page states a weight limit of 28 Kilograms. Those are not two ways of saying the same thing, they are a 7kg difference on the one number that tells you whether the frame will hold a soaked duvet. When a listing cannot agree with itself about its own load rating, the sensible response is to treat the lower figure as the real one and load it accordingly, which still leaves it ahead of the 15kg models.

The other claim to take lightly is "up to 30% faster drying". Faster than what is never specified, and a heated airer with no cover is competing against still air in a cold room, so the baseline is doing a lot of work in that sentence. Rated on what is verifiable, 330W and 36 rails for £139.99, it is a reasonable buy with a 4.4 average from 662 ratings behind it.',
                'pros' => ['330W, the highest of the bar-type airers here', '36 heated rails and a slim 5.8cm folded depth', 'Load limit is higher than the 15kg class either way you read it', '4.4 average from 662 ratings'],
                'contras' => ['States 21kg in the title and 28kg in the specification table', 'The "up to 30% faster" claim has no stated baseline', 'Same price as the Dry:Soon with a much smaller review sample', 'No cover included'],
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'Homefront EcoDry 3-Tier Heated Clothes Airer with Cover',                  // NOME
                'price' => '£109.99',                                                                // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 521,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/81dLu5GPDaL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Homefront EcoDry three-tier heated clothes airer with zip-up cover fitted', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07F6CXBRQ?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => '330W with a zip-up mesh-vented cover included for £109.99. Solid on paper, except the listing never states a load limit at all.', // TEXTO CURTO DO CARD
                'body' => 'The EcoDry gets the important parts right. It is 330W, it gives 21m of drying space across three tiers, and the zip-up cover is in the box rather than sold separately, with mesh vents so moisture escapes instead of condensing inside. Folded it is 7cm deep. At £109.99 with the cover included it sits neatly between the BLACK+DECKER and the Dry:Soon on price.

What is missing is the load limit. Every other three-tier here publishes one, whether that is 15kg, 16kg or a disputed 21kg. The Homefront specification table lists material, dimensions, weight and five "special features" and simply never says how much washing the frame is rated to hold. For a product whose whole job is holding wet laundry, that is the one number you would expect to find, and its absence is why this sits at seven rather than three.

The running cost language has the same problem in miniature. "Dry laundry pennies per hour" is true at 330W, about 8.3p an hour at 25p per kWh, but the listing never does the arithmetic for you. Take the 330W figure, which is stated, and ignore the adjectives.',
                'pros' => ['330W clearly stated on the listing', 'Zip-up cover with mesh vents included in the box', '21m of drying space across three tiers', 'Folds to 7cm deep', '4.4 average from 521 ratings'],
                'contras' => ['No load limit stated anywhere on the listing', '"Pennies per hour" claim is never quantified', 'Smallest review sample of the three-tier airers here'],
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'BLACK+DECKER 63091 3-Tier Heated Airer with Cover and Wheels',             // NOME
                'price' => '£119.00',                                                                // PRECO NA COLETA
                'rating' => 4.1,                                                                     // NOTA
                'reviews_count' => 589,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/81CzeojsvSL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'BLACK+DECKER 63091 three-tier heated clothes airer with cover and wheels', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0846GQHMJ?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The 63099 with a cover and wheels added, for £39 more. Same 21m and 15kg, same undeclared wattage, and both additions need assembling.', // TEXTO CURTO DO CARD
                'body' => 'This is the same airer as number two with two things bolted on. The frame, the 21m of drying space, the 15kg limit and the 140cm height are identical to the 63099. What £39 extra buys is a cover that traps the heat and a set of wheels so you can push it between rooms.

Both additions come with a caveat printed on the listing itself. The cover "requires some assembly" and the wheels "screw into legs of airer", so this is not a case of unfolding it and plugging it in the way the 63099 is. Whether that is worth £39 depends on how much you value the cover, and it is worth noting the Neo XL at number three includes a cover and peg hangers for £99.99, £19 less than this.

It inherits the same weakness as the 63099: no wattage anywhere on the listing. It also has the joint-lowest rating in the guide at 4.1, from 589 ratings, against 4.2 from 1,543 for the plain 63099. If you want the BLACK+DECKER frame, the cheaper one has both the better score and the bigger sample behind it.',
                'pros' => ['Cover and wheels included over the 63099', 'Same proven 21m and 15kg frame', 'Wheels make it easy to move between rooms with a full load'],
                'contras' => ['£39 more than the identical 63099 for accessories, not drying', 'Wattage is not stated anywhere on the listing', 'Cover and wheels both require assembly', 'Rated 4.1 against 4.2 for the cheaper 63099'],
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'KASYDoFF 1500W Heated Clothes Airer with Cover and 12 Hangers',            // NOME
                'price' => '£72.99',                                                                 // PRECO NA COLETA
                'rating' => 4.0,                                                                     // NOTA
                'reviews_count' => 2318,                                                             // Nº DE AVALIACOES (MAIOR AMOSTRA DA BUSCA INTEIRA)
                'image' => 'https://m.media-amazon.com/images/I/714L7vHjvAL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'KASYDoFF 1500W heated clothes airer with zip-up cover and hanging rail', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FH6G6L1P?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A different machine entirely: 1500W of forced hot air rather than warm bars. It dries far faster and costs roughly five times as much per hour to run.', // TEXTO CURTO DO CARD
                'body' => 'This is the product that makes the category confusing, and it has 2,318 ratings, more than anything else in the search. It looks like a heated airer and it is sold as one, but it is not doing the same thing. The models above warm aluminium bars to a little above room temperature and let time do the work. This blows 1500W of hot air into a zipped fabric tower.

The consequence is entirely predictable and almost never stated plainly. At 25p per kWh, 1500W costs about 37.5p an hour to run. The 300W airers cost about 7.5p, and the Daewoo about 5.8p. It dries much faster, so the total cost of a single load is closer than the hourly figure suggests, but if you leave it running the way people leave an overnight airer running, the bill is a different order of magnitude. Anyone buying this because heated airers are the cheap option should know which of the two machines they are actually buying.

Taken on its own terms it is well equipped: a 240-minute timer, 12 additional hangers, a 16kg capacity over 1.7m, a remote control and a one-year replacement policy. The 4.0 average is the lowest in this guide, but it is drawn from the largest sample by far, which makes it a more trustworthy 4.0 than most. The negative ion "sterilise" function is the one claim we would ignore entirely.',
                'pros' => ['Dries far faster than a warm-bar airer', '2,318 ratings, by far the largest sample in the category', '240-minute timer and remote control included', '12 extra hangers and a 16kg capacity', 'Cover included'],
                'contras' => ['1500W costs about 37.5p an hour to run, roughly five times a 300W airer', 'Sold alongside warm-bar airers as though it were the same product', 'Lowest rating in this guide at 4.0', 'The anion sterilising claim is unsupported'],
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'Oypla 3-Tier Heated Clothes Airer, 24 Rails',                              // NOME
                'price' => '£69.99',                                                                 // PRECO NA COLETA
                'rating' => 4.2,                                                                     // NOTA
                'reviews_count' => 1198,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61uvbtD4fUL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Oypla three-tier heated clothes airer in aluminium with 24 heated rails', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GF7RDVGN?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Cheap for a three-tier at £69.99, but it is a much smaller airer than the photos suggest and the listing states a load limit of 3.7kg.', // TEXTO CURTO DO CARD
                'body' => 'The Oypla sells well, with 1,198 ratings at 4.2, and at £69.99 it looks like a three-tier bargain. Read the dimensions and it is a different proposition. It is 62cm wide and 112cm tall against 134cm to 148cm wide for the airers above it, and it offers 11.2m of drying space over 24 rails against 21m over 36. It is roughly half an airer for roughly half the price, which is fair, but the listing photography does not make that obvious.

Then there is the load limit. The specification table states a weight limit of 3.7 Kilograms. Every other three-tier in this guide states 15kg or more. A soaked bath towel weighs around 1.5kg, so read literally, this airer is rated for about two of them. Either the frame is genuinely far weaker than its rivals or the figure is wrong, and there is no way to tell which from the listing. Neither answer is good, and it is the reason this finishes tenth rather than mid-table.

Like both BLACK+DECKER models, it also declines to state a wattage. So on the two numbers this guide ranks by, power and capacity, one is missing and the other is either alarming or an error.',
                'pros' => ['Cheapest three-tier frame in the guide at £69.99', '1,198 ratings at 4.2, a solid sample', 'Compact 62cm width suits small flats', 'Lightest three-tier here at 4.9kg'],
                'contras' => ['States a load limit of 3.7kg, against 15kg for its rivals', 'Wattage is not stated anywhere on the listing', '11.2m of drying space, roughly half the airers above it', 'Much smaller than the listing photos suggest'],
            ],
        ];

        // ═══════════════════════════════════════════════════════════════
        // ═══ FIM DA AREA EDITAVEL — NAO PRECISA MEXER ABAIXO ═══
        // ═══════════════════════════════════════════════════════════════

        $categoryModel = Category::updateOrCreate( // CRIA OU ATUALIZA A CATEGORIA PELO SLUG (NAO DUPLICA)
            ['slug' => $category['slug']], // CHAVE DE BUSCA: SLUG DA CATEGORIA
            $category, // DADOS A SEREM GRAVADOS/ATUALIZADOS
        );

        $articleModel = Article::updateOrCreate( // CRIA OU ATUALIZA O ARTIGO PELO SLUG (NAO DUPLICA)
            ['slug' => $article['slug']], // CHAVE DE BUSCA: SLUG DO ARTIGO
            array_merge($article, ['category_id' => $categoryModel->id]), // VINCULA O ARTIGO A CATEGORIA
        );

        $articleModel->products()->delete(); // REMOVE OS PRODUTOS ANTIGOS DESTE ARTIGO PARA REFLETIR EDICOES SEM DUPLICAR

        foreach ($products as $produto) { // PERCORRE A LISTA MANUAL DE PRODUTOS
            $articleModel->products()->create($produto); // RECRIA CADA PRODUTO VINCULADO AO ARTIGO
        }

        $this->command?->info(static::class.": 1 categoria, 1 artigo e ".count($products)." produtos."); // RESUMO DO QUE FOI POPULADO
        $this->command?->info("URL do artigo: /{$category['slug']}/{$article['slug']}"); // URL ONDE O ARTIGO FICA ACESSIVEL
    }
}
