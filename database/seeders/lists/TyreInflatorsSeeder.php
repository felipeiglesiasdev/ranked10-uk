<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class TyreInflatorsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE COMPRESSORES/CALIBRADORES DE PNEU DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=tyre+inflator+cordless&rh=p_36%3A2000-  (20 ASINS, 10 FICHAS ABERTAS)
        // CATEGORIA TECH. SAZONAL: SOBE NO INVERNO (frio baixa a pressao) E ANTES DAS FERIAS.
        //
        // PADRAO EDITORIAL (30/08): E UM TOP 10, NAO ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── EIXOS DE COMPRA ───
        //   ALIMENTACAO: BATERIA (sem fio, vai na mala/porta-luvas) x 12V DA TOMADA DO CARRO (nunca descarrega, mais forte)
        //     x DUPLO (AstroAI H2 Pro: com e sem fio) x PLATAFORMA DE FERRAMENTA (WORX 20V usa a bateria que voce ja tem).
        //   TODOS DIZEM 150PSI — E O TETO, NAO O USO. PNEU DE CARRO USA ~32-36 PSI. O QUE IMPORTA E TEMPO POR PNEU E
        //     PRECISAO DO MANOMETRO (WOLFBOX declara ±1 PSI; a maioria nao declara precisao nenhuma).
        //   AUTO SHUT-OFF (predefine a pressao e ele para sozinho) E O RECURSO QUE MAIS MUDA O USO NO FRIO/CHUVA.
        //   CAPACIDADE DA BATERIA (6000mAh, 2x2600mAh) = QUANTOS PNEUS POR CARGA.
        //
        // PROFUNDIDADE (FICHA): 3.311 / 2.686 / 1.981 / 1.116 / 967 / 885 / 734 / 366 / 109 / 51.
        //
        // FOCUS KEYWORD: best tyre inflator
        // VARIACOES: tyre inflator / cordless tyre inflator / car tyre pump / portable air compressor /
        // 12v tyre inflator / tyre inflator with gauge / bike pump car / best car air compressor uk
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',
            'name' => 'Tech',
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.',
        ];

        $article = [
            'slug' => 'best-tyre-inflator',
            'title' => 'Best Tyre Inflator 2026: 10 Car Air Compressors Ranked',
            'meta_title' => 'Best Tyre Inflator 2026: 10 Car Air Compressors Ranked',
            'meta_description' => 'The best tyre inflator picks for UK drivers, from AstroAI and RING to cordless mini pumps. Ten car air compressors compared on power, gauge and price.',
            'focus_keyword' => 'best tyre inflator',

            'intro' => "If you want the short answer, the AstroAI H2 Pro is the best tyre inflator for most drivers: 3,311 ratings at 4.5 stars, and it runs either cordless from its own battery or corded from the car's 12V socket, so it never leaves you stuck with a flat pump and a flat tyre. If you want to spend as little as possible, the DoMor cordless pump is GBP 23.88 and rated 4.7 stars.

Almost every inflator here advertises 150PSI, and that number tells you very little, because a car tyre runs at roughly 32 to 36 PSI — the 150 is a ceiling, not a working figure. What actually separates them is how they are powered, how long they take per tyre, and whether you can trust the gauge. Cordless pumps live in the glovebox and are quick to grab; 12V corded models plug into the car socket and never run out of charge; and one here runs off a cordless tool battery you may already own. Look for auto shut-off, which lets you preset a pressure and walk away rather than crouching in the rain watching a dial. We ranked ten on those points below.",

            'conclusion' => "For most drivers the best tyre inflator here is the AstroAI H2 Pro. Running either cordless or from the 12V socket covers both situations — a quick top-up on the drive and a longer job at the roadside with no charge left — and it has more reviews than anything else on the page. If you want the fastest, the Fanttik X9 Pro does a compact car tyre in about a minute, and if you would rather buy a UK motoring brand, the RING is the familiar name.

Two things to decide. First, cordless or corded: a battery pump is far more convenient but needs charging every few months, while a 12V model like the Amazon Basics is slower to set up but always works and pushes more air. Second, how much you care about the gauge: only the WOLFBOX publishes an accuracy figure, at plus or minus 1 PSI, and if you are setting pressures precisely rather than just topping up a soft tyre, that is the number worth paying for.",

            'author' => 'Felipe Iglesias',
            'published_at' => '2026-09-02 19:00:00',
        ];

        $products = [
            [
                'position' => 1,
                'name' => 'AstroAI H2 Pro Tyre Inflator, Corded and Cordless, 150PSI',
                'price' => '£39.97',
                'rating' => 4.5,
                'reviews_count' => 3311,
                'image' => 'https://m.media-amazon.com/images/I/71yWSeTLEUL._AC_SL1500_.jpg',
                'alt_text' => 'best tyre inflator',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GGGTLJ9F?tag=ranked10-21',
                'summary' => 'The best tyre inflator for most drivers. It works cordless from its battery or corded from the 12V socket, with 3,311 ratings at 4.5 stars.',
                'body' => "This is first because it removes the one real flaw of a cordless pump. A battery inflator is wonderfully convenient until the day you need it and find the battery flat; the H2 Pro also plugs into the car's 12V socket, so it simply keeps working. With 3,311 ratings at 4.5 stars it is also the most-reviewed inflator in this comparison.

AstroAI claims three times faster inflation than its previous model and an extended runtime, with an LED display, preset pressure and auto shut-off so you can set 34 PSI and let it stop by itself. There is a built-in storage compartment for the nozzles, which sounds trivial until you have lost the presta adapter in a boot.

Its 4.5-star average is a touch below some rivals here, and it is not the fastest single pump on the page. But as the one inflator that covers both power sources with a large, settled review base, it is the sensible default.",
                'pros' => ['Runs cordless or corded from the 12V socket, so never unusable', '3,311 ratings at 4.5 stars, the most here', 'Preset pressure with auto shut-off', 'LED display and built-in nozzle storage', 'AstroAI claims three times faster inflation than before'],
                'contras' => ['4.5 stars, slightly below the best-rated here', 'Not the fastest pump on the page', 'Bulkier than the smallest cordless pumps', 'No published gauge accuracy figure'],
                'specs' => [
                    ['label' => 'Power', 'value' => 'Cordless and 12V corded', 'verdict' => 'good', 'note' => 'The only dual-power pick here.'],
                    ['label' => 'Customer ratings', 'value' => '3,311 at 4.5 stars', 'verdict' => 'good', 'note' => 'The most feedback here.'],
                    ['label' => 'Auto shut-off', 'value' => 'Yes, preset pressure', 'verdict' => 'good'],
                    ['label' => 'Max pressure', 'value' => '150 PSI', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£39.97', 'verdict' => 'neutral'],
                    ['label' => 'Storage', 'value' => 'Built-in nozzle box', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Fanttik X9 Pro Cordless Tyre Inflator, 1-Minute Inflation, 150PSI',
                'price' => '£42.85',
                'rating' => 4.6,
                'reviews_count' => 2686,
                'image' => 'https://m.media-amazon.com/images/I/61c4D21Ri0L._AC_SL1500_.jpg',
                'alt_text' => 'Fanttik X9 Pro cordless tyre inflator',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CJDZVDJN?tag=ranked10-21',
                'summary' => 'The fastest here: about a minute to refill a compact car tyre, with a 2.5Ah battery and integrated hose. 2,686 ratings at 4.6 stars.',
                'body' => "Speed is what you notice when you are kneeling by a wheel in the cold, and the Fanttik is the quickest pump in this comparison: Fanttik states about one minute to refill a compact car tyre. A 7.4V 2.5Ah battery gives it the grunt and the runtime to do several tyres, and there is no separate hose to attach because it is built into the body, so you unscrew, connect and go.

Four intelligent modes plus a custom setting cover car, bike, ball and motorcycle pressures with auto-stop at your chosen figure, and there is an accessory storage slot so the needle and adapters stay with the pump. It has 2,686 ratings at 4.6 stars.

The trade-off against the top pick is that it is cordless only, so if the battery is flat it is a paperweight until charged. Charge it a couple of times a year and that will not happen; if you would rather not have to remember, the AstroAI above covers you either way.",
                'pros' => ['About one minute per compact car tyre, the fastest here', '2,686 ratings at 4.6 stars', 'Hose integrated into the body, nothing to attach', 'Four preset modes plus custom, with auto-stop', 'Accessory storage slot built in'],
                'contras' => ['Cordless only, useless if the battery is flat', 'Slower on larger 4x4 or van tyres', 'Dearer than the budget cordless pumps', 'No published gauge accuracy figure'],
                'specs' => [
                    ['label' => 'Speed', 'value' => '~1 min per car tyre', 'verdict' => 'good', 'note' => 'The fastest here.'],
                    ['label' => 'Customer ratings', 'value' => '2,686 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Battery', 'value' => '7.4V 2.5Ah', 'verdict' => 'good'],
                    ['label' => 'Power', 'value' => 'Cordless only', 'verdict' => 'bad'],
                    ['label' => 'Modes', 'value' => '4 presets plus custom', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£42.85', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'RING TYREINFLATE GO 2 Cordless Rechargeable Tyre Inflator',
                'price' => '£29.66',
                'rating' => 4.2,
                'reviews_count' => 1981,
                'image' => 'https://m.media-amazon.com/images/I/715tH6BsF5L._AC_SL1500_.jpg',
                'alt_text' => 'RING TYREINFLATE GO 2 cordless tyre inflator',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08ZSR8N5P?tag=ranked10-21',
                'summary' => 'The familiar UK motoring brand. Ring Automotive has supplied British drivers for decades, and this cordless model has 1,981 ratings for GBP 29.66.',
                'body' => "Ring Automotive is a name British drivers know from motor factors and accessory shelves rather than from a marketplace listing, and for a lot of buyers that matters when the product's job is to work once a year in an emergency. The TYREINFLATE GO 2 is its cordless model: rechargeable with an internal power bank, a digital gauge for checking as well as inflating, and adapters for bikes, balls and sports gear. It has 1,981 ratings at 4.2 stars for GBP 29.66.

Being cordless with a built-in power bank means it can charge a phone in a pinch, and it is compact enough for a door pocket.

Its 4.2-star average is the joint lowest on this page, which is the honest caveat: it is a dependable brand but not the best-rated pump here, and it is slower than the Fanttik. Buy it because you want a known UK motoring brand at a fair price; buy the AstroAI or Fanttik if performance and rating matter more than the badge.",
                'pros' => ['Established UK motoring brand, Ring Automotive', '1,981 ratings and a fair GBP 29.66 price', 'Cordless with an internal power bank for a phone', 'Digital gauge checks as well as inflates', 'Adapters for bikes, balls and sports equipment'],
                'contras' => ['4.2 stars, the joint lowest average here', 'Slower than the Fanttik and AstroAI', 'Cordless only', 'Basic feature set for the money'],
                'specs' => [
                    ['label' => 'Brand', 'value' => 'Ring Automotive', 'verdict' => 'good', 'note' => 'Familiar UK motoring name.'],
                    ['label' => 'Customer ratings', 'value' => '1,981 at 4.2 stars', 'verdict' => 'bad', 'note' => 'Joint lowest average here.'],
                    ['label' => 'Power', 'value' => 'Cordless rechargeable', 'verdict' => 'neutral'],
                    ['label' => 'Extras', 'value' => 'Power bank, digital gauge', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£29.66', 'verdict' => 'good'],
                    ['label' => 'Speed', 'value' => 'Moderate', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Amazon Basics 12V Dual-Cylinder Air Compressor with 5m Hose',
                'price' => '£44.60',
                'rating' => 4.2,
                'reviews_count' => 1116,
                'image' => 'https://m.media-amazon.com/images/I/81QKKNeDPeL._AC_SL1500_.jpg',
                'alt_text' => 'Amazon Basics 12V dual cylinder air compressor',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B074DD3NS5?tag=ranked10-21',
                'summary' => 'The heavy-duty option. A dual-cylinder 12V compressor that clamps to the battery, with a 5-metre hose that reaches every wheel from one position.',
                'body' => "This is a different class of machine from the pocket pumps. A dual-cylinder compressor moves far more air than a single-cylinder mini pump, it connects directly to the car battery with heavy-duty clamps rather than through the cigarette-lighter socket, and its 5-metre coiled hose reaches all four wheels without moving the unit. For a van, a 4x4, a caravan or a trailer, that is a real advantage.

It has a digital display with auto shut-off, an LED work light, a carry case and adapters for balls and inflatables, at GBP 44.60 with 1,116 ratings.

The trade-offs are portability and convenience. It is bulky, it takes a minute to set up with battery clamps, and it must be run with the vehicle nearby. Its 4.2-star average is joint lowest here too. Buy it for big tyres and serious use; for topping up a hatchback on the drive, a cordless pump is far less faff.",
                'pros' => ['Dual cylinder moves much more air than mini pumps', 'Connects straight to the battery, never runs out of charge', '5-metre hose reaches all four wheels from one spot', 'Digital display with auto shut-off and LED work light', 'Carry case and adapters included'],
                'contras' => ['Bulky and slower to set up than a cordless pump', 'Needs battery clamps, not just the 12V socket', '4.2 stars, joint lowest here', 'Overkill for topping up a small car'],
                'specs' => [
                    ['label' => 'Type', 'value' => 'Dual cylinder, 12V', 'verdict' => 'good', 'note' => 'Far more airflow than mini pumps.'],
                    ['label' => 'Hose', 'value' => '5 m coiled', 'verdict' => 'good', 'note' => 'Reaches every wheel.'],
                    ['label' => 'Power', 'value' => 'Battery clamps', 'verdict' => 'neutral', 'note' => 'Never runs flat, but slower to rig.'],
                    ['label' => 'Customer ratings', 'value' => '1,116 at 4.2 stars', 'verdict' => 'bad'],
                    ['label' => 'Portability', 'value' => 'Bulky', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£44.60', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Lamicall Cordless Tyre Inflator, 6000mAh Battery, 150PSI',
                'price' => '£41.99',
                'rating' => 4.7,
                'reviews_count' => 734,
                'image' => 'https://m.media-amazon.com/images/I/61HodKK0ijL._AC_SL1500_.jpg',
                'alt_text' => 'Lamicall cordless tyre inflator with 6000mAh battery',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FDWQRBVB?tag=ranked10-21',
                'summary' => 'The best-rated inflator here at 4.7 stars, with a large 6000mAh battery for more tyres per charge and a clear digital gauge.',
                'body' => "At 4.7 stars the Lamicall has the highest average of any inflator in this comparison, and its main hardware advantage is battery size: 6000mAh is a large cell for a pump this small, which means more tyres per charge and less worry about whether it still has enough left after sitting in the boot since spring.

It is genuinely compact at 162 x 66 x 50mm, has a large digital screen with a preset pressure and auto shut-off, and charges over USB, so the same cable that charges your phone tops it up. It also doubles as an emergency light.

It sits at fifth on evidence rather than quality: 734 ratings is a solid but much smaller sample than the three thousand behind the AstroAI. If you want the best-scoring pump and the biggest battery in a pocket size, it is an excellent choice; if you want the most-proven, the AstroAI and Fanttik have far more reviews.",
                'pros' => ['4.7 stars, the highest average in this comparison', '6000mAh battery, more tyres per charge', 'Compact at 162 x 66 x 50mm', 'Large digital screen with preset and auto shut-off', 'Charges over USB, doubles as an emergency light'],
                'contras' => ['734 ratings, a smaller sample than the top picks', 'Cordless only', 'Dearer than the budget cordless pumps', 'No published gauge accuracy'],
                'specs' => [
                    ['label' => 'Average score', 'value' => '4.7 stars', 'verdict' => 'good', 'note' => 'The highest here.'],
                    ['label' => 'Battery', 'value' => '6000mAh', 'verdict' => 'good', 'note' => 'Large for a pocket pump.'],
                    ['label' => 'Size', 'value' => '162 x 66 x 50 mm', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '734', 'verdict' => 'neutral'],
                    ['label' => 'Auto shut-off', 'value' => 'Yes', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£41.99', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'Lamicall Tyre Inflator, 5x Faster Inflation, Aluminium Cylinder, 150PSI',
                'price' => '£45.99',
                'rating' => 4.6,
                'reviews_count' => 885,
                'image' => 'https://m.media-amazon.com/images/I/71gBcSbjN4L._AC_SL1500_.jpg',
                'alt_text' => 'Lamicall fast inflation tyre inflator with dual display',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FDWVYHLY?tag=ranked10-21',
                'summary' => 'Lamicall faster model, with a full-aluminium cylinder for quicker inflation and a dual-value display showing target and current pressure together.',
                'body' => "This is the quicker of the two Lamicall pumps, built around a high-precision full-aluminium cylinder that the brand says inflates five times faster than its basic model. Aluminium also sheds heat better than plastic, which matters because small compressors get hot doing four tyres in a row.

Its neatest touch is the dual-value display: it shows the pressure you are aiming for and the current pressure at the same time, so you can watch progress rather than guessing, with auto shut-off at the target. It is slim at 160 x 46 x 68mm, has a power bank output and an emergency light, and has 885 ratings at 4.6 stars.

At GBP 45.99 it is the dearest of the pocket pumps here, which is the main mark against it, and like its sibling it is cordless only. If speed and a clear display matter more than saving a few pounds, it is the better Lamicall of the two.",
                'pros' => ['Full-aluminium cylinder for faster inflation and better cooling', 'Dual-value display shows target and current pressure together', '885 ratings at 4.6 stars', 'Slim 160 x 46 x 68mm body', 'Power bank output and emergency light'],
                'contras' => ['GBP 45.99, the dearest pocket pump here', 'Cordless only', 'Fewer ratings than the top picks', 'Smaller battery than the 6000mAh sibling'],
                'specs' => [
                    ['label' => 'Cylinder', 'value' => 'Full aluminium', 'verdict' => 'good', 'note' => 'Faster and cooler running.'],
                    ['label' => 'Display', 'value' => 'Dual value', 'verdict' => 'good', 'note' => 'Target and current at once.'],
                    ['label' => 'Customer ratings', 'value' => '885 at 4.6 stars', 'verdict' => 'neutral'],
                    ['label' => 'Size', 'value' => '160 x 46 x 68 mm', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£45.99', 'verdict' => 'bad'],
                    ['label' => 'Power', 'value' => 'Cordless only', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Cordless and Corded Tyre Inflator, 6000mAh, 12V, 150PSI, 4 Modes',
                'price' => '£29.99',
                'rating' => 4.6,
                'reviews_count' => 967,
                'image' => 'https://m.media-amazon.com/images/I/71v37z5JXdL._AC_SL1500_.jpg',
                'alt_text' => 'Cordless and corded 12V tyre inflator with digital display',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F6BFC9HP?tag=ranked10-21',
                'summary' => 'Dual power like the top pick, for ten pounds less. A 6000mAh battery plus a 12V lead, four modes and auto shut-off, at GBP 29.99.',
                'body' => "This unbranded pump copies the feature that puts the AstroAI at the top of this page — it runs both from its own 6000mAh battery and from the car's 12V socket — and charges GBP 29.99 instead of GBP 39.97. It has four inflation modes for car, bike, motorcycle and ball, a preset pressure with auto shut-off, a digital display, and a three-mode LED torch.

With 967 ratings at 4.6 stars it is better rated than the AstroAI, if on under a third of the sample.

The reason it is not higher is exactly that: it is a marketplace listing without a brand behind it, so there is no service history, no warranty you would want to rely on, and no way to know whether the model on sale next month is the same one these reviewers bought. If you want dual power at the lowest price and are comfortable with that, it is good value; if you want the same feature from a name with three times the feedback, pay the extra for the AstroAI.",
                'pros' => ['Runs cordless or from the 12V socket, like the top pick', 'GBP 29.99, ten pounds less than the AstroAI', '6000mAh battery and four inflation modes', 'Preset pressure with auto shut-off', '4.6 stars over 967 ratings'],
                'contras' => ['Unbranded marketplace listing with no service history', 'Under a third of the AstroAI review count', 'Warranty support uncertain', 'No published gauge accuracy'],
                'specs' => [
                    ['label' => 'Power', 'value' => 'Cordless and 12V', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£29.99', 'verdict' => 'good', 'note' => 'Dual power at a low price.'],
                    ['label' => 'Battery', 'value' => '6000mAh', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '967 at 4.6 stars', 'verdict' => 'neutral'],
                    ['label' => 'Brand', 'value' => 'Unbranded listing', 'verdict' => 'bad'],
                    ['label' => 'Modes', 'value' => '4 with auto shut-off', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'DoMor Cordless Tyre Inflator, 6000mAh, 25L/Min, 5 Modes, 150PSI',
                'price' => '£23.88',
                'rating' => 4.7,
                'reviews_count' => 366,
                'image' => 'https://m.media-amazon.com/images/I/71ShP5t7GhL._AC_SL1500_.jpg',
                'alt_text' => 'DoMor cordless tyre inflator with LCD display',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G2L6XX11?tag=ranked10-21',
                'summary' => 'The cheapest here at GBP 23.88, and rated 4.7 stars. A 6000mAh cordless pump with five modes and 25 litres per minute of airflow.',
                'body' => "At GBP 23.88 this is the cheapest inflator on the page, and it is not a stripped-back one: a 6000mAh rechargeable battery, five modes covering car, motorcycle, bike, ball and a manual setting, 25 litres per minute of airflow, an LCD display with preset pressure and auto shut-off, and a three-mode LED torch. It has 366 ratings at 4.7 stars.

For someone who simply wants a pump in the boot for the occasional soft tyre and does not want to spend forty pounds on it, this covers the job properly rather than cutting corners.

It sits at eighth purely on evidence. Three hundred and sixty-six ratings is a decent but modest sample against the thousands above, and like the other unbranded pumps there is no company behind it if something fails in a year. As a cheap, capable spare-in-the-boot pump, though, it is the value pick.",
                'pros' => ['Cheapest inflator here at GBP 23.88', '4.7 star average, joint highest on the page', '6000mAh battery and 25 L/min airflow', 'Five modes with preset pressure and auto shut-off', 'LCD display and three-mode LED torch'],
                'contras' => ['366 ratings, a modest sample', 'Unbranded, no service or warranty history', 'Cordless only', 'Slower than the Fanttik on a car tyre'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£23.88', 'verdict' => 'good', 'note' => 'The cheapest here.'],
                    ['label' => 'Average score', 'value' => '4.7 stars', 'verdict' => 'good'],
                    ['label' => 'Battery', 'value' => '6000mAh', 'verdict' => 'good'],
                    ['label' => 'Airflow', 'value' => '25 L/min', 'verdict' => 'neutral'],
                    ['label' => 'Customer ratings', 'value' => '366', 'verdict' => 'bad'],
                    ['label' => 'Modes', 'value' => '5 with auto shut-off', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'WORX 20V Cordless Tyre Inflator WX092, PowerShare Battery Platform',
                'price' => '£119.99',
                'rating' => 4.6,
                'reviews_count' => 109,
                'image' => 'https://m.media-amazon.com/images/I/715tS35RHqS._AC_SL1500_.jpg',
                'alt_text' => 'WORX 20V cordless tyre inflator air pump',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09GM7DV11?tag=ranked10-21',
                'summary' => 'The pick if you already own WORX tools. It runs on the same 20V PowerShare batteries as the rest of the range, so there is no separate cell to keep charged.',
                'body' => "The WORX makes sense for one specific buyer: someone who already has WORX 20V or 40V tools in the shed. It runs on the same PowerShare batteries, so the pump shares a charged cell with your drill or hedge trimmer and there is never a dedicated inflator battery quietly going flat in the boot. It is a four-in-one: inflator, tyre pressure monitor, work light and deflator.

It reaches 150PSI, has a digital LED gauge with a preset PSI, and the build quality is what you would expect from a power-tool brand rather than a marketplace pump. It has 109 ratings at 4.6 stars.

Two clear caveats: at GBP 119.99 it is by far the most expensive inflator here, and that price often does not include a battery, so factor one in if you do not own WORX kit. Its 109 ratings are also the second smallest sample on the page. Buy it only if you are already in the PowerShare ecosystem.",
                'pros' => ['Runs on WORX 20V and 40V PowerShare batteries you may own', 'No dedicated inflator battery to keep charged', 'Four in one: inflate, monitor, deflate and work light', 'Power-tool build quality with a digital preset gauge', '4.6 star average'],
                'contras' => ['GBP 119.99, by far the most expensive here', 'Battery often not included at that price', 'Only 109 ratings', 'Pointless unless you own WORX tools'],
                'specs' => [
                    ['label' => 'Battery platform', 'value' => 'WORX 20V PowerShare', 'verdict' => 'good', 'note' => 'Shares cells with your tools.'],
                    ['label' => 'Price', 'value' => '£119.99', 'verdict' => 'bad', 'note' => 'The dearest here.'],
                    ['label' => 'Customer ratings', 'value' => '109 at 4.6 stars', 'verdict' => 'bad'],
                    ['label' => 'Functions', 'value' => '4 in 1, inc. deflate', 'verdict' => 'good'],
                    ['label' => 'Build', 'value' => 'Power-tool grade', 'verdict' => 'good'],
                    ['label' => 'Battery included', 'value' => 'Often not', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'WOLFBOX HyperFlow19 Tyre Inflator, Twin Battery, Gauge Accurate to +/-1 PSI',
                'price' => '£49.99',
                'rating' => 4.6,
                'reviews_count' => 51,
                'image' => 'https://m.media-amazon.com/images/I/71CCNh8wvtL._AC_SL1500_.jpg',
                'alt_text' => 'WOLFBOX HyperFlow19 cordless tyre inflator',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GYCW93BD?tag=ranked10-21',
                'summary' => 'The only inflator here that publishes a gauge accuracy figure, at plus or minus 1 PSI, with twin cells rated for nine tyres per charge.',
                'body' => "Every pump on this page has a digital gauge, and exactly one of them tells you how accurate it is: WOLFBOX states plus or minus 1 PSI. If you set tyre pressures properly rather than just topping up something visibly soft, that published figure is worth more than another mode or a brighter torch, because a gauge that reads three PSI high is worse than useless.

The rest is well specified too: twin 2600mAh cells that WOLFBOX says inflate up to nine tyres per charge, a 150PSI motor that does a 195/65R15 car tyre in about a minute, automatic shut-off, and a palm-sized body weighing about a pound that lives in a glovebox.

It is last only because of evidence. Fifty-one ratings is the smallest sample in this comparison by some way, so its 4.6 average is an early signal, and at GBP 49.99 it is priced above better-proven pumps. If gauge accuracy is your priority and you are comfortable being an early buyer, nothing else here publishes the number.",
                'pros' => ['Publishes gauge accuracy at plus or minus 1 PSI, unique here', 'Twin 2600mAh cells, up to nine tyres per charge', 'About one minute for a 195/65R15 car tyre', 'Automatic shut-off at the preset pressure', 'Palm-sized and glovebox friendly at about 1 lb'],
                'contras' => ['Only 51 ratings, the smallest sample here', 'GBP 49.99, above better-proven pumps', 'Cordless only', 'New listing without a track record'],
                'specs' => [
                    ['label' => 'Gauge accuracy', 'value' => '+/-1 PSI, published', 'verdict' => 'good', 'note' => 'The only one here that states it.'],
                    ['label' => 'Battery', 'value' => 'Twin 2600mAh', 'verdict' => 'good', 'note' => 'Up to nine tyres per charge.'],
                    ['label' => 'Speed', 'value' => '~1 min per car tyre', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '51 at 4.6 stars', 'verdict' => 'bad', 'note' => 'The smallest sample here.'],
                    ['label' => 'Price', 'value' => '£49.99', 'verdict' => 'bad'],
                    ['label' => 'Size', 'value' => 'Palm sized, ~1 lb', 'verdict' => 'good'],
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
        $this->command?->info("TyreInflatorsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos).");
    }
}
