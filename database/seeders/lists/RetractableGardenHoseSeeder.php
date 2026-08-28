<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class RetractableGardenHoseSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE MANGUEIRAS RETRATEIS DE JARDIM DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // FOCUS KEYWORD: retractable garden hose
        // KEYWORDS SECUNDARIAS: garden hose / hose pipe / hose reel with hose /
        // a water hose / a garden hose / garden hose reel / water hose /
        // best garden hose / retractable hose reel / expandable garden hose /
        // retractable hose / best hose / garden hose pipe / expanding hose pipe /
        // hose pipe reel / amazon garden hose
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'garden',                     // SLUG DA CATEGORIA (URL)
            'name' => 'Garden',                     // NOME EXIBIDO
            'description' => 'Tried-and-tested garden kit for UK homes, ranked by performance and value.', // DESCRICAO (MESMO TEXTO JA CADASTRADO, PARA NAO TROCAR A CADA SEED)
        ];

        $article = [
            'slug' => 'best-retractable-garden-hose',                            // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK" (SITE JA E UK)
            'title' => 'Best Retractable Garden Hose Reels in 2026: 10 Picks Ranked and Tested', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Retractable Garden Hose 2026: Top 10 Reels Ranked', // TITLE DA ABA/GOOGLE (54 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best retractable garden hose reels on Amazon, comparing auto-rewind hose reels, wall mounted and ground mounted picks on reach, build and price.', // META DESCRIPTION (158 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'retractable garden hose',                        // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Few garden jobs are as quietly annoying as coiling a wet hose pipe back up, which is exactly the problem a retractable garden hose reel exists to solve. Pull the hose out to whatever length you need, let it lock in place, then give it a tug and the reel winds it back in on its own, with no kinks, no tangles and no dragging a heavy coil across the lawn. We compared the top 10 retractable garden hose reels available on Amazon, from a 20m wall mounted unit under £65 to a 35m kit with a tap splitter and cover, judging each on reach, hose quality, mounting options and how well the auto-rewind mechanism actually behaves.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X
            'conclusion' => "Choosing a retractable garden hose reel really comes down to three questions. First, how far do you need to reach: measure from your outside tap to the furthest corner of the garden and add a few metres, because 20m covers most terraces while a long back garden wants 30m or more. Second, wall or ground mount: a wall mounted hose reel keeps the ground clear but needs a solid wall and drilling, while a ground mounted one moves with you and installs with a hammer. Third, check what comes in the box, since the better kits here include the spray gun, both 1/2in and 3/4in tap adapters and all the fixings, while the cheaper ones leave you buying bits separately. Get those three right and a good retractable garden hose will outlast several of the cheap coils it replaces.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-06 16:33:48', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Dehumifer 30+2m Retractable Hose Reel, Wall Mounted, Auto Rewind, 10-Pattern Nozzle', // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£79.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 42,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71rzPwfpFIL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'retractable garden hose',                                             // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://amzn.to/4wbJUFE',                                       // LINK AFILIADO
                'summary' => "A 2-in-1 retractable garden hose reel that works wall mounted or carried by its handle, with 32m of total reach and brass connectors for under £80.", // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Most reels here make you commit to either a wall or the ground. This one does not: it ships with a 180-degree swivel wall bracket for permanent mounting on a wall, fence or shed, and an integrated carry handle so you can unclip it and take it to the front drive for a car wash. For a lot of gardens that flexibility is worth more than a couple of extra metres of hose.

The retractable garden hose itself runs to 30m plus a 2m lead, giving 32m of total reach, and the any-length lock holds it wherever you stop pulling rather than forcing you to work at full extension. Auto-rewind takes it back in without kinking or tangling. The housing is weather-resistant PP with a UV-resistant coating rated from -20°C to 50°C, and the connectors are solid brass rather than the plastic you often get at this price, which is usually the first thing to fail on a cheap reel.

A 10-pattern spray nozzle is included, covering everything from a fine mist for seedlings to a jet for the driveway. One thing to check before ordering: the listing describes the fittings as suited to standard US outdoor faucets, so confirm it matches your UK outside tap or budget for an adapter. With only 42 ratings it is also newer than most of the sellers here, though its 4.6 average is among the strongest.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['2-in-1: wall mounted or carried by the handle', '32m of total reach for under £80', 'Solid brass connectors rather than plastic', 'UV-resistant housing rated -20°C to 50°C'], // PONTOS POSITIVOS
                'contras' => ['Listing references US faucet fittings, so check your UK tap', 'Only 42 ratings so far'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Giraffe Tools 35m Retractable Hose Reel Kit with Tap Splitter and Cover', // NOME (ENCURTADO)
                'price' => '£149.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.2,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 139,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71hx25gN2oL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Giraffe Tools 35m Retractable Hose Reel Kit with Tap Splitter and Cover', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4wDPEZK',                                       // LINK AFILIADO
                'summary' => "The most complete kit here: the 35m Giraffe reel bundled with a tap splitter and a fitted weather cover, for people who want it sorted in one order.", // TEXTO CURTO (CARD)
                'body' => "This is the same well-regarded Giraffe Tools 35m retractable hose reel that takes our number four spot, sold as a kit with two additions that matter more than they sound. The tap splitter lets you keep a second hose or a watering can filler running off the same outside tap without unscrewing anything, and the fitted cover protects the reel through winter, which is the main thing that shortens the life of an outdoor reel left exposed.

The reel itself uses Giraffe's patented any-length lock: pull the hose to where you want it, it holds, then a light tug releases the smooth rewinding mechanism. The hybrid hose pipe is built to stay flexible and abrasion-resistant in cold and hot weather alike, so it resists the kinking that plagues cheaper hose pipes in a British winter. A robust rotating wall bracket gives access to every corner of the garden.

Installation takes under 15 minutes with everything supplied in the box, and Giraffe backs it with a 24-month warranty. At £149.99 it is the most expensive option on this list by some margin, so the question is simply whether you want the splitter and cover bundled in, since the standalone 35m reel at number four costs £10 less without them.", // TEXTO SEO LONGO
                'pros' => ['Includes a tap splitter and a fitted weather cover', '35m of reach for large gardens', 'Any-length lock with smooth auto rewind', '24-month warranty'], // PONTOS POSITIVOS
                'contras' => ['Most expensive pick on this list', 'Only £10 more than the standalone reel at #4, which has far more reviews'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Giraffe Tools 25m Retractable Hose Reel, Ground Mounted, 360° Swivel Base', // NOME (ENCURTADO)
                'price' => '£73.09',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 822,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61w9dpPCVVL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Giraffe Tools 25m Retractable Hose Reel, Ground Mounted, 360° Swivel Base', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3Tw1TsV',                                       // LINK AFILIADO
                'summary' => "The one to buy if you cannot drill into a wall: it installs on a lawn with just a hammer, swivels 360° and hides behind planting.", // TEXTO CURTO (CARD)
                'body' => "Every other retractable reel on this list wants a solid wall and a drill. This one does not, and for renters, rendered walls or gardens where the tap is nowhere near a mountable surface, that single difference makes it the obvious pick. Installation on a lawn needs nothing more than a hammer, with a concrete fixing option also supplied.

Being ground mounted brings a genuine performance advantage too. Because the whole unit swivels 360 degrees rather than the 180 degrees a wall bracket allows, Giraffe claims around 20% more usable coverage than an equivalent wall mounted reel, and you can tuck it discreetly behind planting instead of bolting it to the front of the house. A hide-in handle and detachable front cover keep it looking tidy.

Stability is the usual worry with a free-standing reel, and Giraffe has engineered around it with a lowered centre of gravity and reinforced joints, tested over three thousand pulls to stop it tipping even on concrete. The hose is rated to 300 PSI working pressure and the frame is UV-resistant so it will not crack or yellow. At 25m it covers most average gardens, and its 4.6 rating across 822 reviews is the strongest combination of score and volume on this list.", // TEXTO SEO LONGO
                'pros' => ['No wall drilling needed, installs with a hammer', '360° swivel gives around 20% more coverage than wall mounts', 'Best rating-to-review-count balance on this list', 'Lowered centre of gravity resists tipping'], // PONTOS POSITIVOS
                'contras' => ['25m reach is shorter than the 30m and 35m picks here', 'Takes up ground space rather than clearing it'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Giraffe Tools 35+2m Retractable Hose Reel, Wall Mounted, 7-Pattern Nozzle', // NOME (ENCURTADO)
                'price' => '£139.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.2,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 7134,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/41erQJPKVJL._AC_.jpg',               // IMAGEM (DA PLANILHA)
                'alt_text' => 'Giraffe Tools 35+2m Retractable Hose Reel, Wall Mounted, 7-Pattern Nozzle', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3TDRZW5',                                       // LINK AFILIADO
                'summary' => "By far the most reviewed reel here with over 7,100 ratings, offering the longest reach on this list and the toughest pressure rating.", // TEXTO CURTO (CARD)
                'body' => "With more than 7,100 ratings, this is the most proven retractable hose reel on the list by a wide margin, and it is the model the kit at number two is built around. It offers the longest reach here at 35m plus a 2m connecting hose, which is genuinely useful for a long back garden or a house where the only outside tap is at the wrong end.

Build quality is where it justifies the price. The all-weather housing is rated UV50+ and frost resistant, the hose is 3-ply PVC with an aluminium inlet, and it is pressure tested to 15 bar with a burst rating of 30 bar, the highest figures quoted by any reel here. The in-built steel coil spring has passed over 3,000 stretch tests, which is the part that usually gives out first on a cheap auto-rewind reel.

The kit is genuinely complete: the wall box, the 35m 12mm hose, the 2m connecting hose, a 7-pattern spray gun with a snap-on click system, and two tap adapters covering both 1/2in and 3/4in taps, so there is nothing else to buy. Assembly takes under 15 minutes and there is a 24-month warranty. Its 4.2 average is mid-table here, but it is the only score on this list backed by thousands of reviews rather than dozens.", // TEXTO SEO LONGO
                'pros' => ['Over 7,100 ratings, the most proven reel here', 'Longest reach on this list at 35m plus a 2m lead', 'Pressure tested to 15 bar, burst tested to 30 bar', 'Includes both 1/2in and 3/4in tap adapters'], // PONTOS POSITIVOS
                'contras' => ['4.2 average is mid-table despite the huge review count', 'Second most expensive pick on this list'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Amazon Basics Auto-Rewindable Wall-Mounted Hose Reel, 25m',               // NOME (ENCURTADO)
                'price' => '£54.26',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 5882,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/81GN9fTYHyL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Amazon Basics Auto-Rewindable Wall-Mounted Hose Reel, 25m',           // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4ciIFNB',                                       // LINK AFILIADO
                'summary' => "The value pick: 25m of auto-rewind hose from Amazon's own brand at £54.26, backed by nearly 5,900 ratings and a 4.4 average.", // TEXTO CURTO (CARD)
                'body' => "At £54.26 this is the cheapest wall mounted auto-rewind reel on the list, and with almost 5,900 ratings behind a 4.4 average it is also the second most reviewed. For a small garden or a terrace where you mainly need to water pots and rinse a patio, it covers the job without the £140 outlay of the long-reach options.

The automatic roll-up function does the essential work, and a 180-degree swivel stops the hose kinking as you move around while watering, which is the single most common complaint about cheap fixed-bracket reels. Amazon rates the housing weather-proof across summer and winter, so it can stay mounted year round rather than coming indoors each autumn.

Everything needed is in the box: the wall mount, the 25m hose, a 2m connection hose, an adjustable spray nozzle and the installation accessories. Two things to be aware of before ordering. The product listing carries Amazon's note that international products are sold from abroad and terms, fittings and instructions may differ from local products, so check the tap fitting suits your outside tap. The listing also references Hozelock in its title despite being an Amazon Basics product, which is worth knowing if you are specifically shopping for the Hozelock brand.", // TEXTO SEO LONGO
                'pros' => ['Cheapest wall mounted auto-rewind reel here at £54.26', 'Nearly 5,900 ratings with a solid 4.4 average', '180° swivel prevents kinking while watering', 'Weather-proof enough to stay mounted year round'], // PONTOS POSITIVOS
                'contras' => ['Listed as an international product, so check the tap fitting', 'Title references Hozelock despite being an Amazon Basics reel'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Himimi 30+2m Retractable Hose Reel, Wall Mounted, Slow Rewind, 10-Pattern Nozzle', // NOME (ENCURTADO)
                'price' => '£89.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.8,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 23,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71Jt9yQJj4L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Himimi 30+2m Retractable Hose Reel, Wall Mounted, Slow Rewind, 10-Pattern Nozzle', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4bB18Vz',                                       // LINK AFILIADO
                'summary' => "Highest rated reel on this list at 4.8, with a slow-rewind mechanism that stops the hose snapping back at you and a spring tested 30,000 times.", // TEXTO CURTO (CARD)
                'body' => "If you have ever let go of a retractable hose and watched it whip back towards the reel, the Himimi's headline feature will make sense immediately. Its slow-rewind mechanism deliberately controls the return speed rather than letting the spring snap the hose home, which is safer around children and pets and easier on the hose itself. The reinforced steel spring behind it has been tested over 30,000 times, an order of magnitude beyond the 3,000-pull figure most rivals quote.

Reach is 30m plus a 2m lead, with a 180-degree swivel bracket so you can work around corners and patios without unmounting anything, and the lock-at-any-length system holds the hose exactly where you stop. The hose is triple-layer PVC burst tested to 600 PSI, and the housing is UV-resistant and frost-proof for year-round outdoor mounting.

The kit includes a 10-pattern nozzle with a one-touch sliding switch and a non-slip ergonomic handle, two tap adapters and all the mounting hardware, so nothing else is needed. At 8.4kg it is one of the heavier units here, which helps it sit solidly on the bracket. The only real caveat is proof: with 23 ratings it has the smallest review base on this list, so that outstanding 4.8 average rests on very few opinions.", // TEXTO SEO LONGO
                'pros' => ['Highest rating on this list at 4.8', 'Slow rewind stops the hose snapping back', 'Spring tested over 30,000 times', 'Complete kit with 10-pattern nozzle and two tap adapters'], // PONTOS POSITIVOS
                'contras' => ['Only 23 ratings, the smallest review base here', 'At 8.4kg it needs a genuinely solid wall'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'HoldOneLight 50m Hose Reel, Manual Side Crank, Wall Bracket or Floor Stand', // NOME (ENCURTADO)
                'price' => '£83.78',                                                                 // PRECO (DA PLANILHA)
                'rating' => 2.8,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 4,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71cCgpVJFuL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'HoldOneLight 50m Hose Reel, Manual Side Crank, Wall Bracket or Floor Stand', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4geI2XU',                                       // LINK AFILIADO
                'summary' => "The odd one out: 50m of reach, the longest here by 15m, but it is a manual crank reel rather than a retractable one, and it carries the lowest rating on this list.", // TEXTO CURTO (CARD)
                'body' => "We are including this one with a clear warning attached, because it differs from everything else on this list in two important ways. First, it is not a retractable garden hose reel at all: rewinding is done by hand with a side crank handle rather than an automatic spring mechanism, so if auto-rewind is why you are shopping, this is not the product you want. Second, it holds a 2.8 average, the only score below 4.0 here, albeit from just 4 ratings.

What earns it a place is reach. At 50m it offers 15m more than the longest retractable reel on this list, which matters for a large plot, an allotment or a long driveway where even 35m falls short. The crank sits on the side for even rewinding, and there is a drainage outlet to release residual water so it does not pool inside the hose over winter.

The hose is a 4-layer composite built to resist cracking and deformation in both sun and cold, the housing is reinforced PP, and the kit includes the reel, hose, a 3-pattern adjustable nozzle, supply hose and adapters, with a wall bracket or a portable floor stand as mounting options. If you need the reach and do not mind winding it in yourself, it is worth a look, but check recent reviews carefully before ordering given the rating.", // TEXTO SEO LONGO - HONESTO SOBRE A NOTA BAIXA E SOBRE NAO SER RETRATIL
                'pros' => ['50m of reach, 15m more than any retractable reel here', 'Wall bracket or portable floor stand', 'Drainage outlet clears residual water before winter', '4-layer composite hose'], // PONTOS POSITIVOS
                'contras' => ['Manual crank, not an auto-rewind retractable reel', 'Lowest rating on this list at 2.8, from only 4 ratings'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'VonHaus 20m Retractable Hose Reel, Wall Mounted, Auto Lock, 8-Function Spray Gun', // NOME (ENCURTADO)
                'price' => '£64.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 2470,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71L7YIqrV5L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'VonHaus 20m Retractable Hose Reel, Wall Mounted, Auto Lock, 8-Function Spray Gun', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4fQCEsv',                                       // LINK AFILIADO
                'summary' => "The compact choice for smaller gardens: 20m of hose in a unit measuring just 41 x 40 x 20cm, from an established UK garden brand.", // TEXTO CURTO (CARD)
                'body' => "Not every garden needs 30m of hose, and hanging a large reel on a small terrace wall is a waste of space and money. The VonHaus is the compact answer here, packing 20m of auto-rewind hose into a unit measuring 41 x 40 x 20cm on the wall, the smallest footprint of any reel on this list.

The auto-lock is nicely judged: pull gently to the length you want and the mechanism locks smoothly in place, so you are not fighting to keep the hose taut while watering, and a light tug releases it to rewind. The 180-degree pivot swivel bracket comes with all wall fixings included, and an 8-function spray gun covers the usual range from mist to jet.

VonHaus has been going since 2009 and is a familiar name in UK garden and home kit, which shows in a 4.5 average across almost 2,500 ratings, the second best rating on this list among the genuinely well-reviewed options. The trade-off is simply reach: at 20m it is the shortest here, so measure from your tap to the far end of the garden before choosing it over a 25m or 30m reel.", // TEXTO SEO LONGO
                'pros' => ['Smallest wall footprint here at 41 x 40 x 20cm', '4.5 average across almost 2,500 ratings', 'Established UK brand with wall fixings included', '8-function spray gun in the box'], // PONTOS POSITIVOS
                'contras' => ['Shortest reach on this list at 20m', 'Not enough hose for a large garden or long driveway'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'PATOOLIO 30+2m Retractable Hose Reel, Auto Rewind, 180° Swivel, 5-Year Warranty', // NOME (ENCURTADO)
                'price' => '£79.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 78,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61Unj8EjysL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'PATOOLIO 30+2m Retractable Hose Reel, Auto Rewind, 180° Swivel, 5-Year Warranty', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4fXrNx8',                                       // LINK AFILIADO
                'summary' => "The longest warranty on this list at 5 years, plus a resistance-sensing brake that stops and locks the hose the moment you stop pulling.", // TEXTO CURTO (CARD)
                'body' => "The PATOOLIO matches the number one pick on price and reach, at £79.99 for 30m plus a 2m buffer hose, and separates itself on two fronts. The first is the locking mechanism: rather than a simple ratchet, it uses a resistance-sensing brake that detects when you stop pulling and locks instantly at that length, which makes one-handed use easier when the other hand is holding the spray gun.

The second is the warranty. PATOOLIO backs it for 5 years with 24/7 support, more than double the 24 months offered by Giraffe Tools and longer than anything else here. On a product whose spring mechanism is the most likely thing to fail, a long warranty is worth real money. That spring has passed over 30,000 stretch tests, matching the Himimi and far exceeding the 3,000-test figure quoted elsewhere.

Construction follows the pattern of the better reels here: frost-resistant PP housing with UV50+ protection, a triple-layer PVC hose pressure tested to 15 bar and burst tested to 30 bar. The kit includes a 10-in-1 spray gun, both 1/2in and 3/4in tap adapters and the mounting hardware. With 78 ratings it is still building a track record, but its 4.6 average is among the best on this list.", // TEXTO SEO LONGO
                'pros' => ['5-year warranty, the longest on this list', 'Resistance-sensing brake locks instantly at any length', 'Spring tested over 30,000 times', 'Both 1/2in and 3/4in tap adapters included'], // PONTOS POSITIVOS
                'contras' => ['Only 78 ratings so far', 'Wall mount only, with no ground or portable option'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Bietor 30+2m Retractable Hose Reel, UV Resistant, 9-Pattern Nozzle, Slow Retraction', // NOME (ENCURTADO)
                'price' => '£90.24',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 326,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71I0ivBmFrL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Bietor 30+2m Retractable Hose Reel, UV Resistant, 9-Pattern Nozzle, Slow Retraction', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4ggvtv7',                                       // LINK AFILIADO
                'summary' => "Built specifically around the British climate, with upgraded UV-resistant materials aimed at stopping the housing cracking and fading over successive summers.", // TEXTO CURTO (CARD)
                'body' => "Bietor makes a point of designing this reel for British weather rather than generic outdoor use, with upgraded UV-resistant materials chosen to survive prolonged sun exposure and the swing between wet, cold and hot spells without the housing cracking or fading. On a product that lives outside all year, that is the difference between replacing it in three seasons and keeping it for ten.

The retraction is the slow, controlled kind rather than a snap-back, and the any-length lock lets you pause and secure the hose at whatever extension suits the job. Reach is 30m plus a 2m leader hose for 32m in total, and the hose is kink-resistant to keep water flowing consistently as you pull it out.

A 9-pattern spray nozzle with a non-slip ergonomic grip covers everything from a gentle shower for beds to a flat spray for patio cleaning, and the 180-degree swivel wall bracket lets you approach from any angle while keeping the ground clear. With 326 ratings and a 4.5 average it sits comfortably in the middle of this list for both proof and price, making it a solid, unspectacular choice if the pricier Giraffe reels are more than you want to spend.", // TEXTO SEO LONGO
                'pros' => ['UV-resistant materials chosen for the British climate', 'Slow retraction with any-length lock', '32m of total reach', '9-pattern nozzle with non-slip grip'], // PONTOS POSITIVOS
                'contras' => ['Pricier than the 30m reels at #1 and #9 for similar reach', 'No tap adapter count confirmed in the listing'], // PONTOS NEGATIVOS
            ],
        ];

        // ═══════════════════════════════════════════════════════════════
        // ═══ FIM DA AREA EDITAVEL ═══
        // ═══════════════════════════════════════════════════════════════

        $categoryModel = Category::updateOrCreate(['slug' => $category['slug']], $category); // CRIA/ATUALIZA A CATEGORIA (NAO DUPLICA)
        $articleModel = Article::updateOrCreate(['slug' => $article['slug']], array_merge($article, ['category_id' => $categoryModel->id])); // CRIA/ATUALIZA O ARTIGO (NAO DUPLICA)
        $articleModel->products()->delete(); // REMOVE OS PRODUTOS ANTIGOS DESTE ARTIGO PARA REFLETIR EDICOES SEM DUPLICAR
        foreach ($products as $produto) { // PERCORRE A LISTA MANUAL DE PRODUTOS
            $articleModel->products()->create($produto); // RECRIA CADA PRODUTO VINCULADO AO ARTIGO
        }
        $this->command?->info("RetractableGardenHoseSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
