<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class WaterFilterJugsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE JARRAS COM FILTRO DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM M4 6BD (MANCHESTER), BUSCA "water filter jug" FILTRADA A PARTIR DE £15.
        //
        // ═══ ACHADOS DA COLETA (O DIFERENCIAL DO ARTIGO) ═══
        // 1. O PRECO DA JARRA NAO IMPORTA. O QUE IMPORTA E QUANTOS LITROS DE AGUA FILTRADA VEM NA CAIXA, E ISSO VARIA 12x:
        //    WATERDROP PT-07B £15,49 = 757L (1 FILTRO DE 200 GALOES) · BRITA MARELLA 12-PACK £44,99 = 1.800L (12 x 150L) ·
        //    PHILIPS £23,91 = 600L (4 x 150L) · AQUA OPTIMA £22,00 = 600L (6 x 100L) · BRITA GLASS £59,99 = 450L (3 x 150L) ·
        //    BRITA XXL TANK £35,95 = 150L (1 x 150L).
        //    A JARRA DE £15,49 TRAZ MAIS AGUA FILTRADA DENTRO DA CAIXA DO QUE A DE £59,99.
        // 2. VIDA DO FILTRO VARIA 7,6x: AQUA OPTIMA EVOLVE+ 100L · BRITA MAXTRA PRO 150L · PHILIPS TASTE+ 150L ·
        //    WATERDROP WD-PF-01A PLUS 757L (200 GALOES). A AQUAPHOR DIZ "Longer filter life" E NAO PUBLICA NUMERO NENHUM.
        // 3. LITROS POR LIBRA GASTA NA COMPRA: WATERDROP 48,9 L/£ · BRITA 12-PACK 40,0 L/£ · AQUA OPTIMA 27,3 L/£ ·
        //    PHILIPS 25,1 L/£ · BRITA GLASS 7,5 L/£ · BRITA XXL TANK 4,2 L/£.
        // 4. DENTRO DA PROPRIA BRITA, O PACOTE MUDA TUDO: MARELLA COM 3 CARTUCHOS SAI A £19,99 (DOIS ASINS) E £25,89 (UM TERCEIRO),
        //    E COM 12 CARTUCHOS SAI A £44,99. OS 9 CARTUCHOS EXTRA CUSTAM £25, OU £2,78 CADA, CADA UM VALENDO 150L.
        // 5. CARTUCHO DE TERCEIRO QUEBRA A AMARRACAO: AMAZON BASICS 6-PACK £19,80 COM 16.634 AVALIACOES E MAXBLUE 12-PACK £19,99
        //    COM 3.4K, AMBOS DECLARADOS COMPATIVEIS COM BRITA MAXTRA+. SAO £3,30 E £1,67 POR CARTUCHO.
        // 6. CONTRADICOES DE FICHA:
        //    AQUAPHOR: O BULLET DIZ "battery-free filter life counter" E A TABELA DIZ "Power source Battery Powered".
        //    PHILIPS: DIMENSOES LISTADAS COMO "25L x 11W x 24H MILLIMETRES" — UMA JARRA DE 25mm.
        //    BRITA XXL TANK: O CAMPO "Included components" TRAZ LITERALMENTE O VALOR "FALSE".
        //    BRITA GLASS: OS BULLETS DIZEM 2,5L E A TABELA DIZ 2,4L.
        //    AQUA OPTIMA: O BULLET DIZ "H240 x W260 x D100mm" E A TABELA DIZ "26L x 20W x 24H centimetres".
        // 7. O CAMPO "Special feature" DA WATERDROP PT-07B E USADO COMO ANUNCIO, EM NEGRITO UNICODE, MANDANDO BUSCAR OUTRO ASIN
        //    PARA COMPRAR O FILTRO DE REPOSICAO.
        //
        // ═══ CRITERIO DE CORTE ═══
        // TODOS OS 10 TEM 700+ AVALIACOES. A BUSCA DEVOLVE TAMBEM PACOTES DE CARTUCHO AVULSO (AMAZON BASICS, MAXBLUE) QUE NAO SAO
        // JARRAS — FICARAM DE FORA DA LISTA E ENTRARAM SO COMO REFERENCIA DE PRECO NO TEXTO.
        //
        // ═══ VARIACOES DE PALAVRA-CHAVE TRABALHADAS NO TEXTO ═══
        // best water filter jug · best water filter jug on amazon · water filter pitcher · brita filter jug ·
        // water filter jug uk · filter jug for hard water · best water filter jug for limescale · fridge water filter jug ·
        // replacement water filter cartridges · cheapest water filter jug to run
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-water-filter-jug',                                    // SLUG DO ARTIGO (URL) = PALAVRA-CHAVE EM formato-url
            'title' => 'Best Water Filter Jug 2026: 10 Ranked by Cost Per Litre',  // TITULO / H1 — CONTEM A PALAVRA-CHAVE
            'meta_title' => 'Best Water Filter Jug 2026: Top 10 Ranked',          // TITLE DA ABA/GOOGLE (43 CHARS)
            'meta_description' => 'We ranked the best water filter jug options on filtered litres per pound, not jug price. Filter life ranges from 100 litres to 757, a difference of 7.6 times.', // META DESCRIPTION (~157 CHARS)
            'focus_keyword' => 'best water filter jug',                           // PALAVRA-CHAVE PRINCIPAL — VIRA O ALT DO HERO
            'hero_image' => '',                                                   // SEM HERO MANUAL: A VIEW USA A FOTO DO PRODUTO #1 COMO IMAGEM SOCIAL
            'intro' => 'The price on a water filter jug is close to meaningless, because you are not really buying a jug. You are buying a subscription to cartridges, and the listings make that almost impossible to see. Filter life across this guide runs from 100 litres to 757 litres, a difference of more than seven times, and the cheapest jug in the search comes with more filtered water in the box than the most expensive one. A £15.49 Waterdrop includes a single cartridge rated at 757 litres. A £59.99 BRITA glass jug includes three cartridges rated at 150 litres each, so 450 litres in total. Same category, four times the price, forty percent less water. So instead of ranking these by how they look on a fridge shelf, we worked out what every listing actually gives you: how many litres of filtered water arrive in the box, how long each cartridge is rated for, and what it costs to keep the thing running once the bundled filters are gone. That is the only way to compare the best water filter jug options honestly.', // INTRO OTIMIZADA
            'conclusion' => 'The best water filter jug for most kitchens is whichever one gives you the most filtered litres for the money, and that calculation almost never matches the price order on the shelf. Work it out before you buy: multiply the number of cartridges in the box by the litres each one is rated for, then divide by the price. On that measure the cheapest jug here delivers 48.9 litres per pound and the most expensive delivers 7.5. If you have settled on BRITA because the cartridges are everywhere, buy the twelve-cartridge bundle rather than the three, because the extra nine work out at £2.78 each against roughly £5 bought separately, and third-party cartridges from Amazon Basics and Maxblue undercut even that. Beyond running cost, check two things on the listing: whether the filter life is quoted in litres or only in weeks, since weeks tell you nothing about how much you drink, and whether the jug fits your fridge door, because several here are sold on that promise and one publishes its dimensions in millimetres by mistake.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                        // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 10:00:00',                              // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'Waterdrop PT-07B Lucid Water Filter Jug, 3.5L',                            // NOME
                'price' => '£15.49',                                                                 // PRECO NA COLETA (O MAIS BARATO DA LISTA)
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 17391,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61d3xm26j0L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Waterdrop PT-07B Lucid water filter jug, 3.5 litre capacity',          // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07C3P2RZP?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest jug here at £15.49, and it includes a 757-litre cartridge. That is 48.9 litres of filtered water per pound spent, the best figure in this guide by a wide margin.', // TEXTO CURTO DO CARD
                'body' => 'Run the arithmetic that nobody puts on these listings and this wins outright. One cartridge, rated at more than 200 gallons or 757 litres, in a £15.49 jug. That works out at 48.9 litres of filtered water for every pound you spend, against 4.2 for the BRITA XXL tank at the bottom of this page. The cartridge is also rated at three months rather than the four weeks BRITA quotes, so you will handle it a third as often.

The certification is the other reason it sits first. This is NSF 42 certified for chlorine, taste and odour reduction, and NSF 372 certified as lead-free in its materials. Those are named, checkable standards from a recognised body, which is more than most of this guide offers, and the 3.5 litre body holds a litre more than the standard BRITA Marella. With 17,391 ratings at 4.6 the evidence behind it is deep.

Two things to know. It uses the Waterdrop WD-PF-01A Plus cartridge, not BRITA MAXTRA, so the cheap third-party MAXTRA cartridges do not fit and you are tied to Waterdrop for refills. And the listing is candid that reducing TDS is not what this filter is for, which is a fair warning rather than a fault. Check the 25.5 x 13.5 x 25.5cm dimensions against your fridge door before ordering.',
                'pros' => ['757 litres from one cartridge, the longest life in this guide', '48.9 litres of filtered water per pound spent, the best value here', 'NSF 42 and NSF 372 certified, named standards', '3.5L body, larger than a standard Marella', '17,391 ratings at 4.6'],
                'contras' => ['Uses Waterdrop cartridges, so no cheap third-party MAXTRA option', 'Does not reduce TDS, as the listing states', 'Only one cartridge in the box', 'The Special feature field is used as an advert for the refill ASIN'],
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'BRITA Marella Water Filter Jug with 12 MAXTRA PRO Cartridges',             // NOME
                'price' => '£44.99',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 2516,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71-JPcU8fsL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'BRITA Marella water filter jug in white with twelve MAXTRA PRO cartridges', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BSXGFJKM?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The right way to buy BRITA: twelve MAXTRA PRO cartridges at 150 litres each, so 1,800 litres in the box for £44.99, or 40 litres of filtered water per pound.', // TEXTO CURTO DO CARD
                'body' => 'If you want a BRITA, and plenty of people sensibly do because the cartridges are stocked in every supermarket in the country, this is the bundle to buy. Twelve MAXTRA PRO cartridges at 150 litres each gives 1,800 litres of filtered water in one box, which is the largest volume in this guide by a distance and works out at 40 litres per pound spent.

The comparison inside BRITA own range makes the point sharply. The same Marella jug with three cartridges sells for £19.99. This one, with twelve, is £44.99. So the nine extra cartridges cost £25, or £2.78 each, against roughly £5 apiece bought individually. Buying the annual pack rather than the starter pack is close to a half-price deal on the consumable that actually costs you money.

The MAXTRA PRO cartridge is also a genuine improvement on the older MAXTRA+ that ships with the cheaper Marella listings further down: four-stage filtration, a micro-mesh that BRITA says blocks microparticles of 30 microns four times better than its predecessor, and 150 litres of life against roughly 100. The jug itself is the familiar 2.4 litre Marella that fits a fridge door and holds 1.4 litres of filtered water, with a digital Memo indicator on the lid.',
                'pros' => ['1,800 litres of filtered water in the box, the most in this guide', 'Extra cartridges work out at £2.78 each against about £5 separately', 'MAXTRA PRO lasts 150L against roughly 100L for MAXTRA+', 'Cartridges stocked in every UK supermarket', 'Digital Memo indicator on the lid'],
                'contras' => ['2.4L jug holds only 1.4L of filtered water', 'Twelve cartridges take up storage space', '2,516 ratings, a smaller sample than the plain Marella listing', 'Cartridge life is quoted in litres and weeks, which do not always agree'],
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'Philips Water Filter Jug with 4 Taste+ Cartridges, 2.6L',                  // NOME
                'price' => '£23.91',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 7440,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61GyYkZG04L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Philips water filter jug in white with digital timer and Taste+ cartridges', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CSDPPVL5?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Four cartridges at 150 litres each for £23.91, so 600 litres in the box. It also names microplastics and PFAS among what it reduces, which most rivals do not.', // TEXTO CURTO DO CARD
                'body' => 'Philips has quietly built a strong position here and 7,440 ratings say buyers have noticed. Four Taste+ cartridges at 150 litres each gives 600 litres in the box for £23.91, or 25.1 litres per pound, which beats every BRITA listing in this guide except the twelve-cartridge annual pack.

The filtration claims are also more specific than the category norm. Where most listings talk vaguely about impurities, Philips names microplastics, chlorine, limescale, heavy metals and PFAS. It also claims 20 percent faster filtration than comparable jugs, which sounds like marketing until you have stood at a sink waiting for a slow filter to drain. A digital timer on the lid tracks the cartridge rather than leaving you to remember, and the jug is shaped to fit a fridge door.

Two small things. The listing gives the cartridge life twice, once as 30 days and once as approximately one month or 150 litres, and those are not quite the same claim: 150 litres in 30 days is five litres a day, which is more than most households filter. Use the litre figure. And the specification table lists the product dimensions as 25 by 11 by 24 millimetres, which would make it a jug the size of a matchbox. It is centimetres.',
                'pros' => ['600 litres of filtered water in the box for £23.91', 'Names microplastics, PFAS and heavy metals specifically', 'Digital timer tracks cartridge life for you', 'Claims 20 percent faster filtration', '7,440 ratings behind it'],
                'contras' => ['Dimensions listed in millimetres rather than centimetres', 'Filter life stated as both 30 days and 150 litres, which differ in practice', '4.4 rating, among the lower scores here', '2.6L jug is mid-sized for a family'],
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'Aqua Optima Liscia Water Filter Jug 2.5L with 6 Evolve+ Filters',          // NOME
                'price' => '£22.00',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 2645,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61k-IMcvEuL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Aqua Optima Liscia slim water filter jug in white with Evolve+ filters', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09ZL1LN6V?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Six Evolve+ cartridges at 100 litres each for £22.00, giving 600 litres in the box and a genuinely slim body built to sit in a fridge door.', // TEXTO CURTO DO CARD
                'body' => 'The Liscia is built around one idea, which is fitting where other jugs do not. The profile is slim enough for a fridge door shelf rather than needing a whole rack space, and if you have ever tried to wedge a round BRITA into a door and given up, that alone may decide it. Six Evolve+ cartridges at 100 litres each puts 600 litres in the box for £22.00, or 27.3 litres per pound, second only to the Waterdrop and the BRITA annual pack.

The five-stage Evolve+ cartridge is a step above the simple carbon-and-resin designs, reducing limescale, chlorine and microplastics, and Aqua Optima is clear that each cartridge is rated at 100 litres. That is the shortest life in this guide, so you will change it more often than a Waterdrop owner, but the six in the box cover the best part of a year for a modest household.

One inconsistency to note. The first bullet gives the dimensions as H240 x W260 x D100mm, which is 24 by 26 by 10cm and matches the slim-fit claim. The specification table says 26 by 20 by 24 centimetres. The depth is the number that decides whether it fits your fridge door, and the two figures disagree by 10cm. Measure your shelf and treat the bullet figure as the one to check against.',
                'pros' => ['600 litres of filtered water in the box for £22.00', 'Genuinely slim profile for a fridge door shelf', 'Five-stage Evolve+ cartridge reducing microplastics', '4.6 from 2,645 ratings', 'Six cartridges cover most of a year'],
                'contras' => ['100 litres per cartridge, the shortest life in this guide', 'Bullet and specification table disagree on depth by 10cm', '2.5L jug is small for a family', 'Cartridges are less widely stocked than BRITA'],
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'AQUAPHOR Onyx Water Filter Jug 4.2L with 3 Maxfor+ Cartridges',            // NOME
                'price' => '£26.99',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 5129,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/713gMI+TsHL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'AQUAPHOR Onyx black water filter jug, 4.2 litre family size',          // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09TG4ZW5H?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The largest jug in the guide at 4.2 litres, with three cartridges and a counter that needs no battery. It is also the only listing that never states a filter life in litres.', // TEXTO CURTO DO CARD
                'body' => 'If the problem you are solving is a household that empties a 2.4 litre jug by lunchtime, the Onyx is the sensible answer. At 4.2 litres it is the biggest jug here, nearly double the standard Marella, and the countertop shape is designed to be left out rather than crammed into a fridge. Three Maxfor+ cartridges come in the box, the flip-top lid fills one-handed, and the whole thing is dishwasher safe apart from the lid.

The Maxfor+ cartridge is well regarded and AQUAPHOR makes a point of its longer contact time, which is what allows a filter to do more per pass rather than just running water through carbon quickly. It reduces chlorine, limescale, pesticides and heavy metals including lead.

What we cannot tell you is how long it lasts, because AQUAPHOR does not say. The fourth bullet promises a longer filter life and offers no number, in litres or in weeks, anywhere on the page. In a category where the entire cost of ownership is cartridge life, that is the one figure a listing has to publish, and it is why this sits fifth rather than higher. There is also a small contradiction worth a smile: the second bullet advertises a battery-free filter life counter, while the specification table lists the power source as Battery Powered.',
                'pros' => ['4.2 litre capacity, the largest jug in this guide', 'Three Maxfor+ cartridges included', 'Battery-free filter life counter on the lid', 'Dishwasher safe except the lid', '5,129 ratings at 4.6'],
                'contras' => ['No filter life published in litres or weeks anywhere', 'Bullets say battery-free while the spec table says battery powered', 'Too large for most fridge doors', 'Cartridges less widely stocked than BRITA'],
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'BRITA Marella Fridge Water Filter Jug, 2.4L',                              // NOME
                'price' => '£23.99',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 20468,                                                            // Nº DE AVALIACOES (MAIOR AMOSTRA DA BUSCA INTEIRA)
                'image' => 'https://m.media-amazon.com/images/I/61lDV777-FL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'BRITA Marella fridge water filter jug in white, 2.4 litre',            // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01NCEIPNM?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The most reviewed water filter jug on Amazon UK with 20,468 ratings. It arrives with a single MAXTRA+ cartridge and an indicator that flashes after four weeks.', // TEXTO CURTO DO CARD
                'body' => 'This is the default purchase in the category and the numbers explain why: 20,468 ratings at 4.6 is more feedback than any other jug in this search, the Marella shape has been on British fridge shelves for two decades, and MAXTRA cartridges are stocked everywhere from Tesco to the corner shop. If you want the option you can replace in five minutes on a Sunday, this is it.

The reason it sits sixth is what comes in the box. One MAXTRA+ cartridge, with an indicator that flashes after four weeks. MAXTRA+ is the older cartridge, rated at roughly 100 litres against 150 for the MAXTRA PRO in the twelve-pack at number two, so you are starting with the smallest amount of filtered water of any listing here and buying refills almost immediately.

That is easily fixed, and fixing it is the actual advice. Either buy the annual bundle at number two, or buy this jug and pair it with third-party cartridges: the search returns an Amazon Basics six-pack at £19.80 with more than 16,000 ratings and a Maxblue twelve-pack at £19.99, both declared compatible with MAXTRA+, working out at £3.30 and £1.67 per cartridge. The jug is good. It is the starter cartridge count that makes the sticker price misleading.',
                'pros' => ['20,468 ratings, the largest sample in the category', 'MAXTRA cartridges stocked in every UK supermarket', 'Fits a standard fridge door at 2.4 litres', 'Third-party cartridges available from £1.67 each', 'Indicator on the lid tracks the four-week cycle'],
                'contras' => ['Only one MAXTRA+ cartridge in the box', 'MAXTRA+ lasts around 100L against 150L for MAXTRA PRO', 'Filter life given in weeks rather than litres', 'Holds 2.4L but only 1.4L of it is filtered water'],
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'BRITA Style Water Filter Jug MAXTRA+, 2.4L',                               // NOME
                'price' => '£26.00',                                                                 // PRECO NA COLETA
                'rating' => 4.7,                                                                     // NOTA (MAIOR DA LISTA)
                'reviews_count' => 10632,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61QCoOM8gXL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'BRITA Style water filter jug in grey with MAXTRA+ cartridge',          // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01MZZIF5W?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The best rated jug here at 4.7 from 10,632 ratings, in a squarer body that stacks better in a fridge. Same single MAXTRA+ cartridge problem as the Marella.', // TEXTO CURTO DO CARD
                'body' => 'The Style is the Marella in a squarer, taller body, and for a lot of fridges that shape works better: it sits flat against a shelf back rather than rolling, and the narrower footprint leaves room beside it. At 4.7 from 10,632 ratings it holds the highest score in this guide, which is not nothing across a sample that size.

Everything else follows the Marella. The same 2.4 litre capacity, the same MAXTRA+ cartridge with the same four-week lid indicator, the same German build and the same universal cartridge availability. It costs £2.01 more than the Marella for the shape and a slightly different lid, which is a fair price for a preference.

And it inherits the same limitation. One MAXTRA+ cartridge in the box, quoted only in weeks rather than litres, on a listing that costs £26.00. That is the least filtered water per pound of any BRITA in this guide bar the tank at number ten. The remedy is identical: pair it with a multipack of cartridges, own-brand or third-party, and the running cost drops to something sensible. Judged on the jug alone it is excellent. Judged on what arrives in the box, it is a starter kit.',
                'pros' => ['4.7 from 10,632 ratings, the highest score in this guide', 'Squarer body sits better on a fridge shelf than a round jug', 'MAXTRA cartridges available everywhere', 'Proven design with a long track record', 'Four-week lid indicator'],
                'contras' => ['Only one MAXTRA+ cartridge included at £26.00', 'Filter life quoted in weeks, never in litres', '£2.01 more than the Marella for the same filtration', 'Holds 2.4L but yields only about 1.4L filtered'],
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'Waterdrop ED61B Instant Electric Water Filter Jug, 3.5L',                  // NOME
                'price' => '£38.99',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 711,                                                              // Nº DE AVALIACOES (AMOSTRA MAIS FINA — SINALIZADO NO TEXTO)
                'image' => 'https://m.media-amazon.com/images/I/61MHdKbP51L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Waterdrop ED61B instant electric water filter jug in blue',            // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DZHNJQBK?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'An electric jug that dispenses filtered water at the touch of a button instead of making you wait for gravity, with the same 757-litre filter life as its manual sibling.', // TEXTO CURTO DO CARD
                'body' => 'The complaint everyone has about filter jugs is the waiting: you fill the funnel, then stand there while it drains. The ED61B replaces gravity with a pump, so you press a button and filtered water comes out immediately through a 5 micron carbon block. If that irritation is the reason your current jug lives at the back of a cupboard, this is the product that fixes it.

It keeps the Waterdrop advantage on running cost, with a filter rated at 200 gallons or three months, the same 757 litres as the manual PT-07B at number one. It claims reduction of 98 percent of chlorine and more than 20 contaminants, holds 3.5 litres, and charges over USB-C with battery-powered standby so it is not tethered to a socket.

Two caveats keep it at eight. It costs £38.99 against £15.49 for the manual jug with the same filter, so you are paying £23.50 for the convenience of not waiting. And it holds 711 ratings, comfortably the thinnest sample in this guide, on a product with a pump and a battery, which are two more things to fail than a plastic jug has. The listing is also refreshingly blunt in its first bullet that this system does not lower TDS, and directs you elsewhere if that is what you want.',
                'pros' => ['One-touch dispensing with no waiting for gravity', 'Same 757-litre, three-month filter as the manual Waterdrop', 'Reduces 98 percent of chlorine and 20-plus contaminants', '3.5L capacity with USB-C charging', 'Listing is upfront that it does not reduce TDS'],
                'contras' => ['£23.50 more than the manual jug using the same filter', 'Only 711 ratings, the thinnest sample here', 'A pump and battery are two more things to fail', 'Needs charging, unlike every other jug in this guide'],
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'BRITA Flow XXL Water Filter Tank with Tap, 8.2L',                          // NOME
                'price' => '£35.95',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 6094,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71Q0+LtJjAL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'BRITA Flow XXL water filter tank with tap, 8.2 litre capacity',        // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BSXFMRQN?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'An 8.2 litre tank with a tap that lives on a fridge shelf, holding 5.2 litres of filtered water. It arrives with a single cartridge, so just 150 litres in the box.', // TEXTO CURTO DO CARD
                'body' => 'The Flow solves a real problem for larger households. An 8.2 litre tank holding 5.2 litres of filtered water means one fill covers a family day rather than three trips to the sink, and the tap on the front means nobody has to lift a heavy jug to pour a glass. It sits on a fridge shelf rather than in the door, and the sliding lid makes refilling and cleaning easy.

The MAXTRA PRO cartridge inside is BRITA current generation, rated at 150 litres over four weeks, with the four-stage filtration and the micro-mesh that blocks particles down to 30 microns. The digital Memo indicator tracks the cycle. As a piece of kit for a busy kitchen it is well judged and 6,094 ratings at 4.6 back that up.

The value is where it falls down, and by this guide measure it falls a long way. One cartridge in the box, 150 litres of filtered water, for £35.95. That is 4.2 litres per pound, the worst figure in this guide and less than a tenth of the Waterdrop at number one. You are paying for the tank and the tap, which is fine if that is what you need, but understand that the running cost starts immediately. One small oddity in the specification table: the Included components field contains the literal word FALSE.',
                'pros' => ['8.2L tank yielding 5.2L of filtered water', 'Tap on the front, so no lifting a heavy jug', 'Current MAXTRA PRO cartridge rated at 150 litres', 'Sits neatly on a fridge shelf', '6,094 ratings at 4.6'],
                'contras' => ['Only 150 litres of filtered water in the box for £35.95', '4.2 litres per pound, the worst value in this guide', 'Included components field in the spec table reads FALSE', 'Too large for a fridge door'],
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'BRITA MAXTRA Glass Water Filter Jug with 3 Cartridges',                    // NOME
                'price' => '£59.99',                                                                 // PRECO NA COLETA (O MAIS CARO DA LISTA)
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 4545,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71xqo3cw3tL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'BRITA borosilicate glass water filter jug in light blue',              // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BT1F3BV2?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A borosilicate glass jug with an LED reminder, 60 percent recycled glass and plastic-free packaging. At £59.99 for 450 litres it is the worst value per litre bar the tank.', // TEXTO CURTO DO CARD
                'body' => 'This is BRITA answer to everyone who dislikes drinking from plastic, and on its own terms it is well made. The body is lightweight borosilicate glass, the same heat-resistant material used in laboratory glassware, so it will not discolour or hold taste the way an aged plastic jug does. BRITA calls it its most sustainable jug: 60 percent recycled glass, 100 percent bio-based components and plastic-free cardboard packaging. An LED Smart Light on the lid handles the filter reminder, and it is dishwasher safe to 60 degrees.

Three MAXTRA PRO cartridges at 150 litres each means 450 litres in the box. Set that against £59.99 and you get 7.5 litres of filtered water per pound, which is the second worst figure in this guide, and less than a fifth of what the £15.49 Waterdrop delivers. The £44.99 annual pack at number two gives you four times as much filtered water for £15 less.

So this is a purchase about material and appearance rather than value, which is a perfectly legitimate reason to buy something. Just be clear that is the trade. It also holds 4.4, the joint lowest score here, and glass in a kitchen carries an obvious risk that plastic does not. The bullets describe a full capacity of 2.5 litres while the specification table says 2.4.',
                'pros' => ['Borosilicate glass, so no plastic taste or discolouration', '60 percent recycled glass and plastic-free packaging', 'LED Smart Light filter reminder on the lid', 'Three current MAXTRA PRO cartridges included', 'Dishwasher safe to 60 degrees'],
                'contras' => ['£59.99 for 450 litres, just 7.5 litres per pound', 'The £44.99 annual pack gives four times the water for less', '4.4 rating, joint lowest in this guide', 'Bullets say 2.5L capacity while the spec table says 2.4L'],
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
