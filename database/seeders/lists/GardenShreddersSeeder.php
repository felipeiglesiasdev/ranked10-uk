<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class GardenShreddersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE TRITURADORES DE JARDIM DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=garden+shredder+electric&rh=p_36%3A6000-  (20 ASINS, 10 FICHAS)
        // METODO NOVO: 10 FICHAS NUMA CHAMADA SO (fetch + DOMParser).
        // CATEGORIA GARDEN (a mais fina do site). SAZONAL: PICO AGORA — poda de outono.
        //
        // ⚠ REGRA CORRIGIDA EM 03/09: NAO EXISTE PISO DE AVALIACOES PARA ESCOLHER CATEGORIA.
        //   FELIPE: "a gente ta ranqueando os produtos pelo o que eles sao, a avaliacao e um complemento
        //   do ranking". A BARRA DE 200/500 AVALIACOES FOI INVENCAO MINHA NO HANDOFF DE 29/08 E FOI DERRUBADA.
        //   AVALIACAO CONTINUA SENDO REPORTADA COM HONESTIDADE NO TEXTO — SO NAO VETA MAIS CATEGORIA.
        //
        // ─── ACHADO QUE MUDA A COMPRA: LAMINA RAPIDA x ROLO LENTO SAO MAQUINAS DIFERENTES ───
        //   IMPACTO/LAMINA (3800-4200 rpm): pica rapido, aceita folha e material verde, MAS E BARULHENTO.
        //   ROLO/DRUM LENTO (LawnMaster T-Drive, DOVAMAN 88dB): esmaga galho com torque, quase silencioso,
        //     MAS ENTOPE COM MATERIAL MOLE/FOLHOSO. → QUEM TEM VIZINHO PERTO PEGA ROLO; QUEM TEM FOLHA PEGA LAMINA.
        //
        // ⚠ ACHADO 2: A MARCA PREMIUM TEM A MENOR CAPACIDADE DECLARADA DA LISTA.
        //   BOSCH AXT Rapid 2200 = £179.00 para 40mm. SCHEPPACH £149.00 = 45mm. HYUNDAI 2800W £98.99 = 45mm.
        //
        // ⚠ ACHADO 3: BOSCH CORDLESS £229.98 E O MAIS CARO E O PRECO *NAO INCLUI* BATERIA NEM CARREGADOR.
        //
        // ⚠ ACHADO 4: PESO VAI DE 9,3kg (Hyundai, corpo plastico, lamina) A 24kg (LawnMaster, chassi de aco, rolo).
        //   E CATEGORIA DE NOTA BAIXA: NENHUM PASSA DE 4.4 E VARIOS FICAM EM 3.8-3.9 — REPORTAR ISSO NA INTRO.
        //
        // PROFUNDIDADE (FICHA): 609 / 171 / 98 / 75 / 44 / 36 / 16 / 13 / 11 / 10.
        //
        // FOCUS KEYWORD: best garden shredder
        // VARIACOES: garden shredder / electric garden shredder / wood chipper / quiet garden shredder /
        // best garden shredder uk / branch shredder / impact shredder / garden mulcher
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'garden',
            'name' => 'Garden',
            'description' => 'Independent, research-led buying guides to the best garden tools and outdoor equipment available in the UK.',
        ];

        $article = [
            'slug' => 'best-garden-shredder',
            'title' => 'Best Garden Shredder 2026: 10 Electric Shredders Ranked',
            'meta_title' => 'Best Garden Shredder 2026: 10 Electric Models Ranked',
            'meta_description' => 'The best garden shredder picks for autumn pruning, from fast impact blades to quiet roller crushers. Ten electric shredders compared on capacity and noise.',
            'focus_keyword' => 'best garden shredder',

            'intro' => "If you want the short answer, the Hyundai 2400W is the best garden shredder for most gardens: 609 ratings, a 4.5cm branch capacity, a 4200rpm blade and a 10m cable, at GBP 127.74. If your neighbours are close, buy the LawnMaster instead — it is a quiet roller machine rather than a fast blade one, and that difference matters more than any other on this page.

Those are the two kinds of machine, and choosing the wrong one is the usual regret. An impact shredder spins blades at 3800 to 4200rpm: it chops fast, copes with leaves and soft green waste, and is genuinely loud. A roller or drum shredder turns slowly with high torque, crushing branches against a plate: it is close to conversation-quiet, it pulls material in by itself, and it will jam on wet leafy waste that the blade machines eat happily. So decide by what you are actually clearing — hedge trimmings and woody prunings suit a roller, a general autumn tidy-up of leaves and green waste needs a blade. After that check the stated branch capacity in millimetres, which runs from 40 to 45mm here, and the weight, which runs from 9.3kg to 24kg. One warning about this category as a whole: nothing on this page scores above 4.4 stars and several score 3.8 or 3.9, because people routinely feed shredders soft, wet material they were never designed for and then find them jammed.",

            'conclusion' => "For most gardens the best garden shredder here is the Hyundai 2400W: it has the most customer feedback on the page by a distance, it takes 45mm branches, and at 12kg with a 10m cable you can wheel it to the far end of a garden without an extension lead. The Scheppach is the better-built alternative for about twenty pounds more, with two reversible blades and a higher score.

Buy a roller machine instead for one specific reason: noise. The LawnMaster and the brushless DOVAMAN both run far quieter than a blade shredder, which is what you want in a terrace or a close-packed estate, and they crush thick woody prunings without complaint — just keep the soft green waste for the compost heap rather than the hopper. And two things to be careful of: the Bosch AXT Rapid costs GBP 179 while stating the smallest branch capacity here at 40mm, and the Bosch cordless is GBP 229.98 with the battery and charger not included, so its real cost is higher than the listing suggests.",

            'author' => 'Felipe Iglesias',
            'published_at' => '2026-09-03 08:30:00',
        ];

        $products = [
            [
                'position' => 1,
                'name' => 'Hyundai Electric Garden Shredder 2400W, 4200rpm, 4.5cm Capacity, 10m Cable',
                'price' => '£127.74',
                'rating' => 4.0,
                'reviews_count' => 609,
                'image' => 'https://m.media-amazon.com/images/I/71wdVvw8OrL._AC_SL1500_.jpg',
                'alt_text' => 'best garden shredder',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08XY3ZWLZ?tag=ranked10-21',
                'summary' => 'The best garden shredder for most gardens. 609 ratings, 4.5cm branch capacity, and a 10m cable so it reaches the end of the garden.',
                'body' => "Six hundred and nine ratings is more than three times any other shredder on this page, which for a category this fiddly is worth a lot: it means a large number of people have got this machine working on real garden waste. The 2400W motor spins at 4200rpm and takes wood up to 4.5cm thick, a detachable collection bag catches the chippings, and a flat push stick is included for guiding overhanging branches in safely.

The 10 metre cable is the quiet practicality here — most rivals expect you to run an extension to the bottom of the garden, and at 12kg you can move it there easily. Its 4.0-star average is middling, and reading the pattern of complaints in this category, that is usually about soft wet material jamming rather than the machine failing. Feed it woody prunings and it does the job it claims.",
                'pros' => ['609 ratings, over three times any rival here', '4.5cm branch capacity from a 2400W, 4200rpm motor', '10m cable reaches the end of most gardens', '12kg, easy to move around', 'Detachable collection bag and push stick included'],
                'contras' => ['4.0 stars, middling for the page', 'Blade machine, so noisy', 'Jams on soft wet green waste', 'Plastic-bodied rather than steel-framed'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '609 at 4.0 stars', 'verdict' => 'good', 'note' => 'Triple any rival here.'],
                    ['label' => 'Branch capacity', 'value' => '4.5 cm', 'verdict' => 'good'],
                    ['label' => 'Type', 'value' => 'Impact blade, 4200rpm', 'verdict' => 'neutral', 'note' => 'Fast but loud.'],
                    ['label' => 'Cable', 'value' => '10 m', 'verdict' => 'good'],
                    ['label' => 'Weight', 'value' => '12 kg', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Scheppach GS55 Electric Garden Shredder, 2400W, 45mm Capacity, 45L Bag',
                'price' => '£149.00',
                'rating' => 4.3,
                'reviews_count' => 171,
                'image' => 'https://m.media-amazon.com/images/I/6121G2QgyvL._AC_SL1500_.jpg',
                'alt_text' => 'Scheppach GS55 electric garden shredder',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08X4RZTQS?tag=ranked10-21',
                'summary' => 'The best-built blade shredder here: two reversible blades at 4200rpm, 45mm capacity and a 45L bag, at 4.3 stars.',
                'body' => "Scheppach is a German garden-machinery name rather than a marketplace brand, and this is the better-engineered version of the same idea as our top pick: a 2400W motor driving two reversible blades at 4200rpm, taking branches up to 45mm, with a 45 litre collection bag. Reversible blades matter over time — when one edge dulls you turn them round rather than buying replacements.

At 4.3 stars it also has the best score of any blade machine on this page. The trade against the Hyundai is money and evidence: GBP 149.00 against GBP 127.74, and 171 ratings against 609. If you shred every autumn and want the machine to last, the Scheppach is the one to stretch to; if this is an occasional job, the Hyundai does the same work for less.",
                'pros' => ['4.3 stars, the best score of any blade shredder here', 'Two reversible blades double the useful edge life', '45mm branch capacity at 4200rpm', 'German garden-machinery brand', '45L collection bag keeps the area tidy'],
                'contras' => ['GBP 149.00, dearer than the Hyundai', '171 ratings against the Hyundai 609', 'Loud, like all blade machines', 'Struggles with soft green waste'],
                'specs' => [
                    ['label' => 'Average score', 'value' => '4.3 stars', 'verdict' => 'good', 'note' => 'Best blade machine here.'],
                    ['label' => 'Blades', 'value' => 'Two, reversible', 'verdict' => 'good'],
                    ['label' => 'Branch capacity', 'value' => '45 mm', 'verdict' => 'good'],
                    ['label' => 'Collection', 'value' => '45 L bag', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£149.00', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'LawnMaster 2800W Quiet Garden Shredder with T-Drive and 60L Collection Box',
                'price' => '£169.99',
                'rating' => 4.3,
                'reviews_count' => 98,
                'image' => 'https://m.media-amazon.com/images/I/71R762DXU9L._AC_SL1500_.jpg',
                'alt_text' => 'LawnMaster 2800W quiet garden shredder',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BRQGVJJY?tag=ranked10-21',
                'summary' => 'The quiet one. A slow, high-torque cutting drum instead of fast blades, with a steel frame and a 60L box — the pick if neighbours are close.',
                'body' => "This is the other kind of machine, and for a lot of British gardens it is the right one. Instead of blades screaming at 4200rpm, a cutting drum turns slowly and crushes wood against a plate, which is dramatically quieter and pulls branches in by itself so you are not standing over it feeding constantly. T-Drive adjusts torque automatically to keep the drum turning when it meets a thick piece, which is what stops the stalling that plagues cheap shredders.

The build backs it up: a steel frame, large wheels and 24kg of weight, the heaviest here, plus the biggest collection box at 60 litres. Two honest limits. Roller machines dislike soft, wet, leafy material and will jam on it, so this is for woody prunings; and 24kg is a lot to lift, though the wheels handle flat ground fine.",
                'pros' => ['Quiet roller drum instead of a screaming blade', 'Self-feeding, so less standing over it', 'T-Drive keeps torque up and stops stalling', 'Steel frame and large wheels, 60L box, the biggest here', '4.3 stars, joint best on the page'],
                'contras' => ['Jams on soft wet leafy waste', '24kg, the heaviest here to lift', 'GBP 169.99', 'Only 98 ratings'],
                'specs' => [
                    ['label' => 'Type', 'value' => 'Quiet roller drum', 'verdict' => 'good', 'note' => 'The neighbour-friendly choice.'],
                    ['label' => 'Feeding', 'value' => 'Self-feeding', 'verdict' => 'good'],
                    ['label' => 'Collection', 'value' => '60 L box', 'verdict' => 'good', 'note' => 'The largest here.'],
                    ['label' => 'Build', 'value' => 'Steel frame, 24 kg', 'verdict' => 'neutral'],
                    ['label' => 'Green waste', 'value' => 'Poor', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'DOVAMAN GT10 Brushless Silent Impact Garden Shredder, 88dB, 6-Tooth Roller',
                'price' => '£209.97',
                'rating' => 4.4,
                'reviews_count' => 44,
                'image' => 'https://m.media-amazon.com/images/I/61LLvnnvuzL._AC_SL1500_.jpg',
                'alt_text' => 'DOVAMAN GT10 brushless silent garden shredder',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0H1QHL8TN?tag=ranked10-21',
                'summary' => 'The highest-rated shredder here at 4.4 stars, with a published 88dB no-load figure and an adjustable blade-to-baffle gap.',
                'body' => "The DOVAMAN is the only shredder on this page that publishes an actual noise figure — 88dB at no load — rather than just using the word quiet, and that alone makes it easier to judge. A six-tooth carbon steel roller blade pulls material in steadily, and a brushless motor with metal gearing should last longer and run cooler than the brushed motors elsewhere here.

Its cleverest touch is an adjustable control knob that sets the gap between blade and baffle, so you can open it up for thicker branches or close it down to get a finer mulch from thin prunings — proper control that fixed-gap machines do not offer. It is the best-scoring shredder here at 4.4 stars, on 44 ratings. The reservation is price: GBP 209.97 is nearly double the Hyundai, and the brand has no long history in UK garden tools.",
                'pros' => ['4.4 stars, the highest score on this page', 'Publishes a real noise figure, 88dB no-load', 'Adjustable blade-to-baffle gap sets mulch fineness', 'Brushless motor with metal gearing', 'Six-tooth roller feeds material steadily'],
                'contras' => ['GBP 209.97, nearly double the Hyundai', 'Only 44 ratings', 'No track record in UK garden tools', 'Roller design still dislikes wet green waste'],
                'specs' => [
                    ['label' => 'Average score', 'value' => '4.4 stars', 'verdict' => 'good', 'note' => 'The highest here.'],
                    ['label' => 'Noise', 'value' => '88 dB no-load, published', 'verdict' => 'good', 'note' => 'The only stated figure.'],
                    ['label' => 'Motor', 'value' => 'Brushless, metal gears', 'verdict' => 'good'],
                    ['label' => 'Mulch control', 'value' => 'Adjustable gap', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£209.97', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Hyundai Electric Garden Shredder 2800W, 45mm Throat, 178mm Disc, 9.3kg',
                'price' => '£98.99',
                'rating' => 3.9,
                'reviews_count' => 36,
                'image' => 'https://m.media-amazon.com/images/I/71hL+xgaIsL._AC_SL1500_.jpg',
                'alt_text' => 'Hyundai 2800W lightweight garden shredder',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F6TP2RXW?tag=ranked10-21',
                'summary' => 'The cheapest here at GBP 98.99, and the lightest at 9.3kg — the most powerful motor on the page in the smallest body.',
                'body' => "On paper this is the value pick: a 2800W motor, the joint most powerful here, driving a 178mm disc through a 45mm infeed throat, for GBP 98.99. It weighs 9.3kg, less than half the LawnMaster, so it is genuinely carried rather than wheeled, and it comes with a 45 litre bag and the same useful 10 metre cable as its bigger Hyundai sibling.

Two things hold it back. Its 3.9-star average is among the lowest on this page, and a 9.3kg machine with a big motor is a light body absorbing a lot of vibration, which is usually where the complaints in this category come from. With 36 ratings the picture is still forming. Buy it if budget and portability matter most; if you shred regularly, the 2400W Hyundai above has fifteen times the feedback for thirty pounds more.",
                'pros' => ['Cheapest shredder here at GBP 98.99', '2800W, the joint most powerful motor on the page', 'Only 9.3kg, genuinely portable', '45mm infeed throat and 178mm disc', '45L bag and a 10m cable included'],
                'contras' => ['3.9 stars, among the lowest here', 'Light body absorbs a lot of vibration', 'Only 36 ratings so far', 'Loud blade machine'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£98.99', 'verdict' => 'good', 'note' => 'The cheapest here.'],
                    ['label' => 'Weight', 'value' => '9.3 kg', 'verdict' => 'good', 'note' => 'The lightest on the page.'],
                    ['label' => 'Motor', 'value' => '2800W', 'verdict' => 'good'],
                    ['label' => 'Capacity', 'value' => '45 mm throat', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '36 at 3.9 stars', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'Bosch AXT Rapid 2200 Garden Shredder, Laser-Cut Reversible Blade, 40mm',
                'price' => '£179.00',
                'rating' => 3.9,
                'reviews_count' => 75,
                'image' => 'https://m.media-amazon.com/images/I/61geDP04dWL._AC_SL1500_.jpg',
                'alt_text' => 'Bosch AXT Rapid 2200 garden shredder',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CW2Z1CB9?tag=ranked10-21',
                'summary' => 'The famous name — but at GBP 179 it states the smallest branch capacity on this page, 40mm, and scores 3.9.',
                'body' => "Bosch's AXT Rapid is the shredder most people have heard of, and it is a properly made machine: a laser-cut reversible blade for clean cutting and long edge life, and OptiCut speed control that keeps it shredding through difficult loads without stalling. It is light, tidy and backed by a brand with real service support.

The numbers are where it gets awkward. It states a 40mm branch capacity — the smallest on this page — while costing GBP 179.00, when the Scheppach takes 45mm for GBP 149.00 and the 2800W Hyundai takes 45mm for GBP 98.99. Its 3.9-star average over 75 ratings is also below both. Buy it for the brand, the blade quality and the after-sales support; on capacity per pound, it is the weakest deal here.",
                'pros' => ['Laser-cut reversible blade, clean cutting and long edge life', 'OptiCut speed control resists stalling in heavy loads', 'Bosch service and spares support', 'Lightweight and tidy to store', 'Well-known, widely stocked machine'],
                'contras' => ['40mm capacity, the smallest stated on this page', 'GBP 179.00 while cheaper rivals take 45mm', '3.9 stars over 75 ratings', 'Loud, like all blade shredders'],
                'specs' => [
                    ['label' => 'Branch capacity', 'value' => '40 mm', 'verdict' => 'bad', 'note' => 'The smallest here, at a high price.'],
                    ['label' => 'Price', 'value' => '£179.00', 'verdict' => 'bad'],
                    ['label' => 'Blade', 'value' => 'Laser-cut, reversible', 'verdict' => 'good'],
                    ['label' => 'OptiCut', 'value' => 'Anti-stall control', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '75 at 3.9 stars', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Lazy-Shred Electric Garden Shredder, 2400W, 45mm Cut, 50L Collection Box',
                'price' => '£109.95',
                'rating' => 4.2,
                'reviews_count' => 11,
                'image' => 'https://m.media-amazon.com/images/I/51qcR+uEQNL._AC_SL1500_.jpg',
                'alt_text' => 'Lazy-Shred electric garden shredder with 50L box',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FM4528CR?tag=ranked10-21',
                'summary' => 'A rigid 50L collection box rather than a bag, 45mm capacity and 12.2kg, for GBP 109.95.',
                'body' => "The Lazy-Shred's practical advantage over the cheaper machines is the collection box: 50 litres of rigid plastic rather than a fabric bag, which stands up on its own while you load the hopper and tips out cleanly instead of collapsing mid-empty. It runs a 2400W motor with a 45mm maximum cut and weighs 12.2kg, so it is still easy to move.

At GBP 109.95 it undercuts everything except the 2800W Hyundai while offering more collection capacity than the 45L machines above it. The obvious caveat is evidence: 11 ratings at 4.2 stars is a very early picture, and Lazy-Shred has no track record to fall back on. As a well-specified, sensibly priced blade shredder it looks good; you are simply an early buyer.",
                'pros' => ['Rigid 50L box, easier to load against and tip out than a bag', '45mm maximum cut from a 2400W motor', '12.2kg, easy to move around the garden', 'GBP 109.95, cheaper than most here', 'Straightforward, well-specified machine'],
                'contras' => ['Only 11 ratings, a very early picture', 'No brand track record', 'Blade machine, so noisy', 'Struggles with soft green waste'],
                'specs' => [
                    ['label' => 'Collection', 'value' => '50 L rigid box', 'verdict' => 'good', 'note' => 'Better than a fabric bag.'],
                    ['label' => 'Capacity', 'value' => '45 mm', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£109.95', 'verdict' => 'good'],
                    ['label' => 'Weight', 'value' => '12.2 kg', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '11 at 4.2 stars', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'DEKOPRO Electric Garden Shredder 2500W, Double-Edged Blade, 3800rpm, 45mm',
                'price' => '£96.99',
                'rating' => 3.9,
                'reviews_count' => 10,
                'image' => 'https://m.media-amazon.com/images/I/61fHNgfQ3AL._AC_SL1500_.jpg',
                'alt_text' => 'DEKOPRO 2500W electric garden shredder',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GDXZ7C38?tag=ranked10-21',
                'summary' => 'The lowest price on the page at GBP 96.99, with a double-edged blade, 45mm capacity and a 10m cable.',
                'body' => "This is the budget end done reasonably: a 2500W high-torque motor at 3800rpm, a double-edged blade rather than the single edge on most cheap machines, a 45mm branch capacity and a 10 metre cable, for GBP 96.99. A safety cut-out is fitted, and the compact plastic body keeps it light to shift.

Two things put it here. Ten ratings is the smallest sample on the page, and its 3.9-star average is among the lowest, so there is very little to go on either way. And 3800rpm is the slowest blade speed here, which on an impact machine means it chops less aggressively than the 4200rpm Hyundai and Scheppach. If you want the cheapest capable shredder for an occasional tidy-up it is worth a look; for regular use, spend the extra thirty pounds on the proven Hyundai.",
                'pros' => ['Lowest price on the page at GBP 96.99', 'Double-edged blade, unusual at this price', '45mm branch capacity', '10m cable and a safety cut-out', 'Light, compact body'],
                'contras' => ['Only 10 ratings, the smallest sample here', '3.9 stars, among the lowest', '3800rpm, the slowest blade speed on the page', 'No brand history'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£96.99', 'verdict' => 'good', 'note' => 'The lowest here.'],
                    ['label' => 'Blade', 'value' => 'Double-edged', 'verdict' => 'good'],
                    ['label' => 'Speed', 'value' => '3800 rpm', 'verdict' => 'bad', 'note' => 'Slowest blade here.'],
                    ['label' => 'Capacity', 'value' => '45 mm', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '10 at 3.9 stars', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'Webb WEISWB Electric Impact Shredder 2500W, 4000rpm, Locking Collection Box',
                'price' => '£149.99',
                'rating' => 3.8,
                'reviews_count' => 16,
                'image' => 'https://m.media-amazon.com/images/I/618uPjZUgML._AC_SL1500_.jpg',
                'alt_text' => 'Webb WEISWB electric impact shredder',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F1GG2G5D?tag=ranked10-21',
                'summary' => 'A British garden-brand impact shredder with a safety-locking collection box — but the lowest score on this page.',
                'body' => "Webb is a long-standing British garden machinery name, and this is its impact shredder: steel blades at 4000rpm turning woody waste and leaves into a fine mulch for beds or compost, with a large on/off switch and a collection box that locks to the body so the machine cannot run with the box removed. That safety interlock is a sensible piece of design that not every rival has.

It is ninth for two reasons. Its 3.8-star average is the lowest on this page, on 16 ratings, and at GBP 149.99 it costs the same as the Scheppach, which scores 4.3 with ten times the feedback and takes 45mm branches. If you specifically want a British brand and the locking box, it is here; on the numbers there are better buys above it.",
                'pros' => ['Established British garden machinery brand', 'Collection box locks to the body as a safety interlock', 'Steel blades at 4000rpm produce a fine mulch', 'Large, simple on/off switch', 'Easy to move and store'],
                'contras' => ['3.8 stars, the lowest average on this page', 'Only 16 ratings', 'Same price as the far better-rated Scheppach', 'Loud impact machine'],
                'specs' => [
                    ['label' => 'Average score', 'value' => '3.8 stars', 'verdict' => 'bad', 'note' => 'The lowest here.'],
                    ['label' => 'Safety', 'value' => 'Locking box interlock', 'verdict' => 'good'],
                    ['label' => 'Speed', 'value' => '4000 rpm', 'verdict' => 'good'],
                    ['label' => 'Brand', 'value' => 'Webb, British', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£149.99', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Bosch UniversalShredder 2x18V-25 Cordless, Battery and Charger Not Included',
                'price' => '£229.98',
                'rating' => 4.0,
                'reviews_count' => 13,
                'image' => 'https://m.media-amazon.com/images/I/61KpZd8pq7L._AC_SL1500_.jpg',
                'alt_text' => 'Bosch UniversalShredder cordless garden shredder',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FJMKKT26?tag=ranked10-21',
                'summary' => 'The only cordless shredder here, on the Bosch 18V battery platform — but GBP 229.98 does not include the battery or charger.',
                'body' => "This is the only cordless machine in the comparison, and for a large garden with no outdoor socket that is a genuine advantage: no cable to trail, no extension lead, no working around a 10 metre radius. It runs two 18V batteries from Bosch's Power for All alliance, shared across 10-plus brands and 150-plus tools, so if you already own that kit the batteries are free. Extra-hardened reversible steel blades and OptiCut anti-stall control come across from the corded AXT range, with a wide chute and a prodder.

It is last on cost and evidence. At GBP 229.98 it is the most expensive product on this page, and that price excludes both the battery and the charger, so the true outlay is higher still unless you are already in the ecosystem. With 13 ratings there is almost nothing to go on. It makes sense for existing Bosch 18V owners with no outdoor power, and for very few others.",
                'pros' => ['The only cordless shredder here, no cable or extension lead', 'Runs on Bosch Power for All 18V batteries shared across 150+ tools', 'Extra-hardened reversible steel blades', 'OptiCut anti-stall control from the corded AXT range', 'Wide chute with a prodder for fast feeding'],
                'contras' => ['GBP 229.98, the most expensive here, and battery and charger are not included', 'Only 13 ratings', 'Runtime limited by battery capacity', 'Pointless unless you already own Bosch 18V kit'],
                'specs' => [
                    ['label' => 'Power', 'value' => 'Cordless 2x18V', 'verdict' => 'good', 'note' => 'The only cordless here.'],
                    ['label' => 'Battery included', 'value' => 'No, nor charger', 'verdict' => 'bad', 'note' => 'True cost is higher.'],
                    ['label' => 'Price', 'value' => '£229.98', 'verdict' => 'bad', 'note' => 'The dearest on the page.'],
                    ['label' => 'Blades', 'value' => 'Hardened, reversible', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '13 at 4.0 stars', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
        ];

        // ═══════════════════════════════════════════════════════════════
        // ═══ FIM DA AREA EDITAVEL ═══
        // ═══════════════════════════════════════════════════════════════

        $categoryModel = Category::updateOrCreate(['slug' => $category['slug']], $category);
        $articleModel = Article::updateOrCreate(['slug' => $article['slug']], array_merge($article, ['category_id' => $categoryModel->id]));
        $articleModel->products()->delete();
        foreach ($products as $produto) {
            $articleModel->products()->create($produto);
        }
        $this->command?->info("GardenShreddersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos).");
    }
}
