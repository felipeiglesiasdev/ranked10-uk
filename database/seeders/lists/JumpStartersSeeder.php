<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class JumpStartersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE ARRANCADORES DE BATERIA DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=car+jump+starter&rh=p_36%3A3000-  (20 ASINS, 10 FICHAS ABERTAS)
        // CATEGORIA TECH. SAZONAL: PICO NO INVERNO (BATERIA MORRE NO FRIO).
        //
        // PADRAO EDITORIAL (30/08): E UM TOP 10, NAO ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── ACHADO QUE MUDA A COMPRA: O NUMERO DE AMPERES NAO E COMPARAVEL ENTRE MARCAS ───
        //   A NOCO, LIDER DE MERCADO COM 126.359 AVALIACOES NO GB40, VENDE 500A / 1000A / 1250A / 2000A / 3000A.
        //   MARCAS DE MARKETPLACE DE £24-70 ANUNCIAM 4000A, 5000A, 6000A, 7000A, ATE 9000A.
        //   NENHUMA NORMA OBRIGA COMO MEDIR O "PEAK AMP", ENTAO O NUMERO GRANDE NAO SIGNIFICA MAIS FORCA.
        //   → COMPRAR PELO TAMANHO DE MOTOR DECLARADO (ex.: "ate 7.0L petrol / 5.5L diesel") E PELA AVALIACAO, NAO PELO "A".
        //   ISSO VAI NA INTRO E NOS CARDS (muda a compra).
        //
        // OUTRO EIXO: Wh/mAh REAL (WOLFBOX 88.8Wh, TREKURE 26.800mAh) DIZ QUANTAS PARTIDAS E QUANTO CARREGA CELULAR.
        // COMBO COM COMPRESSOR DE AR (POVASEE 150PSI) = 2 EM 1 PARA O PORTA-MALAS.
        //
        // PROFUNDIDADE (FICHA): 126.359 / 30.093 / 15.015 / 12.968 / 5.820 / 2.522 / 1.976 / 1.248 / 298 / 127.
        //
        // FOCUS KEYWORD: best jump starter
        // VARIACOES: jump starter / car jump starter / car battery booster / portable jump starter /
        // jump starter power pack / noco boost / jump starter with air compressor / 12v battery booster
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',
            'name' => 'Tech',
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.',
        ];

        $article = [
            'slug' => 'best-jump-starter',
            'title' => 'Best Jump Starter 2026: 10 Car Battery Boosters Ranked',
            'meta_title' => 'Best Jump Starter 2026: 10 Car Battery Boosters Ranked',
            'meta_description' => 'The best jump starter picks for UK drivers, from NOCO to budget power packs. Ten car battery boosters compared on engine size, capacity and price.',
            'focus_keyword' => 'best jump starter',

            'intro' => "If you want the short answer, the NOCO Boost GB40 is the best jump starter for most drivers: 126,359 ratings at 4.5 stars, enough power for most petrol and diesel cars, and spark-proof clamps that forgive a wiring mistake, for GBP 92.19. If that is more than you want to spend, the AstroAI B8 costs GBP 31.99, weighs 329g and still claims a 7.0 litre petrol engine.

One thing is worth knowing before you compare anything: ignore the peak amp number. NOCO, which has more customer reviews than every other brand here combined, rates its packs at 500 to 3000 amps, while marketplace units costing a third as much advertise 5000, 7000 and even 9000 amps. There is no enforced standard for measuring that figure, so a bigger number does not mean a stronger jump start. What you should compare instead is the largest engine the maker states it will start, the battery capacity in watt-hours or mAh, which tells you how many attempts and how much phone charging you get, and the safety features on the clamps. We ranked ten on those points below.",

            'conclusion' => "For most drivers the best jump starter here is the NOCO GB40. Nothing else on the page has anything close to its 126,000 ratings, its spark-proof and reverse-polarity protection means a wrong connection does not become a bang, and it doubles as a power bank and torch. If you drive a big diesel, step up to the GB70; if you want the fastest recharging and USB-C, the GBX45 is the one.

Below the big brand, buy on the stated engine size rather than the amp claim. The AstroAI B8 is remarkable value at GBP 31.99 for a pack that lives in a glovebox, the WOLFBOX has the biggest measured battery here at 88.8Wh, and the Povasee bundles a 150PSI tyre inflator so one box in the boot covers both a flat battery and a soft tyre. Whatever you choose, charge it every few months — a jump starter that has been flat in the boot since spring is no use in January.",

            'author' => 'Felipe Iglesias',
            'published_at' => '2026-09-02 18:00:00',
        ];

        $products = [
            [
                'position' => 1,
                'name' => 'NOCO Boost GB40 1000A UltraSafe Jump Starter Power Pack',
                'price' => '£92.19',
                'rating' => 4.5,
                'reviews_count' => 126359,
                'image' => 'https://m.media-amazon.com/images/I/71MaO3De-TL._AC_SL1500_.jpg',
                'alt_text' => 'best jump starter',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B015TKUPIC?tag=ranked10-21',
                'summary' => 'The best jump starter for most drivers. 126,359 ratings at 4.5 stars, spark-proof clamps, and enough power for most petrol and diesel cars.',
                'body' => "One hundred and twenty-six thousand ratings is a number no other product in this comparison approaches, and it is why the GB40 is first. NOCO is the established name in lithium jump starters, and this is its mainstream pack: 1000 peak amps, enough for the great majority of petrol engines and most smaller diesels, in a unit that fits in a glovebox.

The feature that matters most is UltraSafe: patented spark-proof technology and reverse-polarity protection, so if you clip the clamps on the wrong terminals in the dark and the rain, nothing sparks and nothing is damaged. That is worth real money on a device most people use once a year in bad conditions. It also works as a power bank for a phone and has a 100-lumen torch with seven modes, including emergency flashing.

The only argument against it is price: marketplace packs claiming five times the amps cost a third as much. But those amp numbers are not measured to any common standard, and none of those brands has a fraction of this track record.",
                'pros' => ['126,359 ratings at 4.5 stars, by far the most trusted here', 'Spark-proof and reverse-polarity protection', '1000A suits most petrol and smaller diesel engines', 'Doubles as a phone power bank', '100-lumen torch with seven modes including SOS'],
                'contras' => ['Dearer than marketplace packs claiming bigger numbers', '1000A is not enough for the largest diesels', 'No air compressor', 'Needs recharging every few months in storage'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '126,359 at 4.5 stars', 'verdict' => 'good', 'note' => 'The most of any product here.'],
                    ['label' => 'Rated output', 'value' => '1000A peak', 'verdict' => 'neutral', 'note' => 'Honest figure from the market leader.'],
                    ['label' => 'Safety', 'value' => 'Spark-proof, reverse polarity', 'verdict' => 'good'],
                    ['label' => 'Extras', 'value' => 'Power bank, 100lm torch', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£92.19', 'verdict' => 'neutral'],
                    ['label' => 'Brand', 'value' => 'NOCO', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'AstroAI B8 Car Jump Starter Power Pack, 7.0L Petrol / 5.5L Diesel, 329g',
                'price' => '£31.99',
                'rating' => 4.6,
                'reviews_count' => 1976,
                'image' => 'https://m.media-amazon.com/images/I/81nyNDZMyJL._AC_SL1500_.jpg',
                'alt_text' => 'AstroAI B8 compact car jump starter power pack',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FB2L7CCX?tag=ranked10-21',
                'summary' => 'The best value here. At GBP 31.99 and 329g it lives in a glovebox, and it states a 7.0 litre petrol engine — with 1,976 ratings at 4.6 stars.',
                'body' => "This is the pick if you want insurance against a flat battery without spending ninety pounds. At GBP 31.99 with 1,976 ratings at 4.6 stars, the AstroAI B8 weighs just 329 grams — lighter than a phone and a half — so it genuinely lives in the glovebox rather than the boot, and it states coverage up to a 7.0 litre petrol or 5.5 litre diesel engine, which is more than most cars on a British road.

AstroAI lists ten safety protections on the smart clamps, and it works as a power bank, a torch and more besides, which the listing calls five-in-one.

Two honest notes. This is a smaller battery than the NOCO packs, so you get fewer attempts before it needs charging, and AstroAI is a marketplace brand rather than an established automotive name. But at a third of the price with a four-figure review count and a good score, it is the sensible budget buy — just charge it a few times a year.",
                'pros' => ['GBP 31.99, the best value on the page', 'Only 329g, small enough for a glovebox', 'States up to 7.0L petrol and 5.5L diesel', '1,976 ratings at 4.6 stars', 'Ten safety protections, power bank and torch'],
                'contras' => ['Smaller battery than the NOCO packs, fewer attempts', 'Marketplace brand rather than an automotive name', 'No air compressor', 'Small clamps feel less rugged'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£31.99', 'verdict' => 'good', 'note' => 'The best value here.'],
                    ['label' => 'Weight', 'value' => '329 g', 'verdict' => 'good', 'note' => 'Fits a glovebox.'],
                    ['label' => 'Engine size', 'value' => '7.0L petrol, 5.5L diesel', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '1,976 at 4.6 stars', 'verdict' => 'neutral'],
                    ['label' => 'Safety', 'value' => '10 protections', 'verdict' => 'good'],
                    ['label' => 'Extras', 'value' => 'Power bank, torch', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'NOCO Boost GB70 2000A UltraSafe Jump Starter Power Pack',
                'price' => '£187.98',
                'rating' => 4.6,
                'reviews_count' => 30093,
                'image' => 'https://m.media-amazon.com/images/I/71Tk-77RvCL._AC_SL1500_.jpg',
                'alt_text' => 'NOCO Boost GB70 2000A jump starter',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B016UG6PWE?tag=ranked10-21',
                'summary' => 'The pick for big diesels, vans and 4x4s. Double the GB40 output at 2000A, with 30,093 ratings at 4.6 stars.',
                'body' => "If you drive a large diesel, a van, a pickup or a boat, the GB40 may not have the punch you need on a cold morning, and this is the NOCO to buy instead. At 2000 peak amps it doubles the output, and its 4.6-star average over 30,093 ratings makes it the best-rated NOCO here as well as the second most-reviewed product on the page.

It keeps everything that makes the range worth buying — spark-proof clamps, reverse-polarity protection, power bank output, and a brighter 400-lumen torch — in a heavier, more rugged body built for bigger jobs.

The catch is simply cost and size: GBP 187.98 is twice the GB40 and six times the budget packs, and it is a chunkier thing to store. If your car is an ordinary petrol hatchback, this is more jump starter than you need and the GB40 will do the job for half the money.",
                'pros' => ['2000A, double the GB40, for big diesels and vans', '30,093 ratings at 4.6 stars, the best-rated NOCO here', 'Spark-proof and reverse-polarity protection', 'Brighter 400-lumen torch', 'Rugged build for heavy use'],
                'contras' => ['GBP 187.98, twice the GB40', 'Larger and heavier to store', 'Overkill for an ordinary petrol car', 'No air compressor'],
                'specs' => [
                    ['label' => 'Rated output', 'value' => '2000A peak', 'verdict' => 'good', 'note' => 'For large diesels and vans.'],
                    ['label' => 'Customer ratings', 'value' => '30,093 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Torch', 'value' => '400 lumens', 'verdict' => 'good'],
                    ['label' => 'Safety', 'value' => 'Spark-proof, reverse polarity', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£187.98', 'verdict' => 'bad'],
                    ['label' => 'Size', 'value' => 'Large', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'NOCO Boost X GBX45 1250A Jump Starter, 60W USB-C, 48-Minute Recharge',
                'price' => '£118.18',
                'rating' => 4.5,
                'reviews_count' => 15015,
                'image' => 'https://m.media-amazon.com/images/I/8130-0fqEAS._AC_SL1500_.jpg',
                'alt_text' => 'NOCO Boost X GBX45 jump starter with USB-C',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0924V8SPC?tag=ranked10-21',
                'summary' => 'The modern NOCO. 1250A with 60W USB-C Power Delivery and a 48-minute recharge, so it is ready again fast — 15,015 ratings.',
                'body' => "The Boost X is NOCO's newer platform and its advantage is charging, in both directions. It recharges itself to full in 48 minutes over USB-C Power Delivery, where older packs take hours, and it puts out 60 watts over USB-C, enough to charge a laptop rather than just a phone. If the pack lives in the car and you want it topped up quickly after use, that is a genuine improvement.

Rated at 1250 amps it sits between the GB40 and GB70, with UltraSafe 2.0 spark-proof protection, improved thermal management, and a 60-second timer that conserves charge during a jump attempt. It has 15,015 ratings at 4.5 stars.

At GBP 118.18 it costs more than the GB40 for a similar amount of starting power, so buy it for the USB-C charging speed and the laptop-capable output rather than for extra grunt. If you do not care about either, the GB40 remains the value pick in the range.",
                'pros' => ['Recharges to full in 48 minutes over USB-C', '60W USB-C output charges a laptop, not just a phone', '1250A with UltraSafe 2.0 protection', '15,015 ratings at 4.5 stars', '60-second timer conserves charge during a jump'],
                'contras' => ['GBP 118.18, dearer than the GB40 for similar starting power', 'Only slightly more powerful than the GB40', 'No air compressor', 'USB-C charger not always included'],
                'specs' => [
                    ['label' => 'Recharge time', 'value' => '48 minutes', 'verdict' => 'good', 'note' => 'The fastest NOCO here.'],
                    ['label' => 'USB-C output', 'value' => '60W', 'verdict' => 'good', 'note' => 'Enough for a laptop.'],
                    ['label' => 'Rated output', 'value' => '1250A peak', 'verdict' => 'neutral'],
                    ['label' => 'Customer ratings', 'value' => '15,015 at 4.5 stars', 'verdict' => 'good'],
                    ['label' => 'Safety', 'value' => 'UltraSafe 2.0', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£118.18', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'NOCO Boost GB20 500A UltraSafe Jump Starter Power Pack',
                'price' => '£71.99',
                'rating' => 4.6,
                'reviews_count' => 12968,
                'image' => 'https://m.media-amazon.com/images/I/71D7nNV3H7L._AC_SL1500_.jpg',
                'alt_text' => 'NOCO Boost GB20 500A compact jump starter',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B015TKPT1A?tag=ranked10-21',
                'summary' => 'The cheapest way into NOCO, at GBP 71.99. 500A suits small petrol cars, motorbikes and garden machinery, with 12,968 ratings at 4.6 stars.',
                'body' => "The GB20 is the smallest NOCO, and it exists for smaller jobs: a city car, a motorbike, a ride-on mower or a boat with a modest petrol engine. At 500 peak amps it will not turn over a big diesel, but for a 1.0 to 1.6 litre petrol it is enough, and it brings the same spark-proof and reverse-polarity protection that makes the range worth buying. It has 12,968 ratings at 4.6 stars.

At GBP 71.99 it is the cheapest route to NOCO reliability, and it is the most pocketable pack in the range, with the same power bank and 100-lumen torch functions.

The obvious question is whether to spend twenty pounds more on the GB40 and double the amps, and for most drivers the answer is yes — car engines get harder to turn as batteries and weather age. Buy the GB20 specifically for a small petrol engine, a bike or garden machinery, not as a default family-car pack.",
                'pros' => ['Cheapest NOCO at GBP 71.99', '12,968 ratings at 4.6 stars', 'Same spark-proof and reverse-polarity protection', 'Very compact and pocketable', 'Ideal for small petrol cars, bikes and mowers'],
                'contras' => ['500A will not start a large diesel', 'The GB40 doubles the power for about GBP 20 more', 'Small battery, fewer attempts per charge', 'No air compressor'],
                'specs' => [
                    ['label' => 'Rated output', 'value' => '500A peak', 'verdict' => 'bad', 'note' => 'Small petrol engines and bikes only.'],
                    ['label' => 'Price', 'value' => '£71.99', 'verdict' => 'good', 'note' => 'The cheapest NOCO.'],
                    ['label' => 'Customer ratings', 'value' => '12,968 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Safety', 'value' => 'Spark-proof, reverse polarity', 'verdict' => 'good'],
                    ['label' => 'Size', 'value' => 'Very compact', 'verdict' => 'good'],
                    ['label' => 'Extras', 'value' => 'Power bank, torch', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'WOLFBOX MV24 Jump Starter Power Pack, 88.8Wh, 65W USB-C, LED Display',
                'price' => '£129.99',
                'rating' => 4.6,
                'reviews_count' => 5820,
                'image' => 'https://m.media-amazon.com/images/I/71AXBYZ3D0L._AC_SL1500_.jpg',
                'alt_text' => 'WOLFBOX MV24 jump starter with LED display',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CRRKRJ2S?tag=ranked10-21',
                'summary' => 'The biggest measured battery here at 88.8Wh, with 65W USB-C charging and a clear LED display. 5,820 ratings at 4.6 stars.',
                'body' => "Where most packs shout about amps, WOLFBOX publishes something more useful: an 88.8 watt-hour battery, the largest actual capacity stated on this page. That figure tells you what you really want to know — how many start attempts you get and how much it will charge your phone or laptop before it is empty. It has 5,820 ratings at 4.6 stars, the best evidence of any non-NOCO pack here.

A 65W USB-C in and out port means fast recharging and laptop charging, there is a QC3.0 USB-A port, and an HD LED display shows charge and status clearly rather than leaving you guessing from four little lights.

The reservation is the same as for all the marketplace brands: its headline 4000A claim is not comparable with NOCO's figures. Judge it on the 88.8Wh capacity, the display, the charging speed and the review count, all of which are strong for GBP 129.99.",
                'pros' => ['88.8Wh, the largest stated capacity here', '5,820 ratings at 4.6 stars, best of the non-NOCO packs', '65W USB-C in and out for fast recharge and laptops', 'Clear HD LED status display', 'QC3.0 USB-A port as well'],
                'contras' => ['4000A headline is not comparable with NOCO figures', 'GBP 129.99, dearer than the GB40', 'Larger than the pocket packs', 'No air compressor'],
                'specs' => [
                    ['label' => 'Battery capacity', 'value' => '88.8Wh', 'verdict' => 'good', 'note' => 'The largest stated here.'],
                    ['label' => 'Customer ratings', 'value' => '5,820 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'USB-C', 'value' => '65W in and out', 'verdict' => 'good'],
                    ['label' => 'Display', 'value' => 'HD LED', 'verdict' => 'good'],
                    ['label' => 'Amp claim', 'value' => '4000A, not comparable', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£129.99', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'GREPRO Jump Starter Power Pack, 7.0L Petrol / 5.0L Diesel, LCD Screen',
                'price' => '£32.99',
                'rating' => 4.6,
                'reviews_count' => 2522,
                'image' => 'https://m.media-amazon.com/images/I/71PyLl3wcgL._AC_SL1500_.jpg',
                'alt_text' => 'GREPRO compact jump starter with LCD screen',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BBV7KC7Z?tag=ranked10-21',
                'summary' => 'A cheap pack with an LCD screen and 2,522 ratings, covering up to 7.0 litre petrol. At GBP 32.99 it rivals the AstroAI for value.',
                'body' => "The GREPRO is the AstroAI's closest rival: GBP 32.99, 2,522 ratings at 4.6 stars, and stated coverage up to a 7.0 litre petrol or 5.0 litre diesel engine. It weighs about 0.68 pounds, so it too is a glovebox device rather than a boot one.

Its own advantage is the LCD screen, which shows remaining charge as a number rather than as a row of lights, so you know whether the pack in your car has enough left to be useful. Spark-proof smart clamps and thermal protection cover the safety side, and there is a bright torch built in.

It is here rather than higher because, like every budget pack, its amp claim is not comparable with the established brands, and it has no automotive track record. But with more ratings than the AstroAI at nearly the same price, it is an equally sensible cheap choice — pick whichever is cheaper on the day.",
                'pros' => ['2,522 ratings at 4.6 stars for GBP 32.99', 'LCD screen shows exact remaining charge', 'States 7.0L petrol and 5.0L diesel coverage', 'Very light at around 0.68 lb', 'Spark-proof smart clamps and thermal protection'],
                'contras' => ['Amp claim not comparable with NOCO', 'No automotive brand track record', 'Small battery, limited attempts per charge', 'No air compressor'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£32.99', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '2,522 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Display', 'value' => 'LCD charge readout', 'verdict' => 'good'],
                    ['label' => 'Engine size', 'value' => '7.0L petrol, 5.0L diesel', 'verdict' => 'good'],
                    ['label' => 'Weight', 'value' => 'About 0.68 lb', 'verdict' => 'good'],
                    ['label' => 'Amp claim', 'value' => 'Not comparable', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'TREKURE Jump Starter Power Pack, 26,800mAh, All Petrol / 12L Diesel',
                'price' => '£69.99',
                'rating' => 4.6,
                'reviews_count' => 1248,
                'image' => 'https://m.media-amazon.com/images/I/91w3klXEXwL._AC_SL1500_.jpg',
                'alt_text' => 'TREKURE jump starter power pack with jump leads',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FXB1T7F8?tag=ranked10-21',
                'summary' => 'A large 26,800mAh pack with a forced-start mode for deeply flat batteries, covering up to a 12 litre diesel, at GBP 69.99.',
                'body' => "This TREKURE is the mid-price pack for people who want plenty of capacity: 26,800mAh gives multiple start attempts and a lot of phone charging, and it states coverage for all petrol engines and diesels up to 12 litres, which reaches into van and light-truck territory. It has 1,248 ratings at 4.6 stars.

Its most useful feature is a forced-start mode. A jump starter normally refuses to fire if it detects no voltage at all in the car battery, which is exactly the situation you are in when a battery is completely dead; forced start overrides that, at the cost of requiring you to be sure the leads are the right way round. Three-mode emergency lighting is built in.

It sits at eighth because its 7000A headline is one of the least believable on the page, and TREKURE has no established history. Buy it for the 26,800mAh capacity and the forced-start function, and ignore the number on the front.",
                'pros' => ['26,800mAh, plenty of attempts and phone charging', 'Forced-start mode revives deeply flat batteries', 'States all petrol and up to 12L diesel', '1,248 ratings at 4.6 stars', 'Three-mode emergency lighting'],
                'contras' => ['7000A headline is not a comparable figure', 'Forced start needs care with lead polarity', 'No established brand history', 'Bulkier than the pocket packs'],
                'specs' => [
                    ['label' => 'Capacity', 'value' => '26,800mAh', 'verdict' => 'good', 'note' => 'Multiple attempts per charge.'],
                    ['label' => 'Forced start', 'value' => 'Yes', 'verdict' => 'good', 'note' => 'For a completely dead battery.'],
                    ['label' => 'Engine size', 'value' => 'All petrol, 12L diesel', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '1,248 at 4.6 stars', 'verdict' => 'neutral'],
                    ['label' => 'Amp claim', 'value' => 'Not comparable', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£69.99', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'Povasee Jump Starter with 150PSI Air Compressor, 10L Petrol / 8L Diesel',
                'price' => '£56.98',
                'rating' => 4.7,
                'reviews_count' => 298,
                'image' => 'https://m.media-amazon.com/images/I/71oov8YbFAL._AC_SL1500_.jpg',
                'alt_text' => 'Povasee jump starter with built-in tyre inflator',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GS93CPM4?tag=ranked10-21',
                'summary' => 'Two tools in one: a jump starter and a 150PSI tyre inflator with auto shut-off, so a single box in the boot covers a flat battery and a soft tyre.',
                'body' => "The two things most likely to strand you on a cold morning are a flat battery and a soft tyre, and this Povasee handles both. Alongside the jump starter it has a built-in air compressor rated at 150PSI with 35 litres per minute of airflow and an auto shut-off, so you preset a pressure and it stops there rather than you watching a gauge in the rain. It also has a 400-lumen light and works as a power bank.

At GBP 56.98 with 4.7 stars it is cheaper than buying a decent jump pack and a decent inflator separately, and the space saving in a boot is real.

Its weakness is evidence: 298 ratings is a small sample against the thousands and tens of thousands above it, and its 9000A headline is the least plausible number on this page. Buy it for the two-in-one convenience and the honest 150PSI compressor spec, not for the amp claim.",
                'pros' => ['Jump starter and 150PSI tyre inflator in one box', 'Auto shut-off inflation at a preset pressure', '35 L/min airflow, 400-lumen light, power bank', '4.7 star average, the joint highest here', 'Cheaper than buying both tools separately'],
                'contras' => ['Only 298 ratings, a small sample', '9000A headline is the least plausible on the page', 'Bulkier than a jump-only pack', 'Newer brand without a track record'],
                'specs' => [
                    ['label' => 'Air compressor', 'value' => '150PSI, auto shut-off', 'verdict' => 'good', 'note' => 'Two tools in one box.'],
                    ['label' => 'Average score', 'value' => '4.7 stars', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '298', 'verdict' => 'bad', 'note' => 'Small sample.'],
                    ['label' => 'Engine size', 'value' => '10L petrol, 8L diesel', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£56.98', 'verdict' => 'good'],
                    ['label' => 'Amp claim', 'value' => 'Not comparable', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'TOPDON JS3000A Car Jump Starter with Stop Spark Sensor',
                'price' => '£119.98',
                'rating' => 4.7,
                'reviews_count' => 127,
                'image' => 'https://m.media-amazon.com/images/I/81NCcS+x1DL._AC_SL1500_.jpg',
                'alt_text' => 'TOPDON JS3000A professional jump starter',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09XBF5VTR?tag=ranked10-21',
                'summary' => 'A professional-leaning pack from a diagnostics brand, with a stop-spark sensor and heavy-duty clamps — but the smallest review count here.',
                'body' => "TOPDON is better known for vehicle diagnostic tools than for jump packs, and the JS3000 is aimed at people who use one regularly rather than once a year. It has an innovative stop-spark sensor on the clamps, heavy-duty leads, a bright torch and a power bank, and TOPDON states it will start 99 percent of 12V vehicles.

For a workshop, a fleet van or anyone jump starting other people's cars often, the heavier clamps and cable are a genuine step up from the thin leads on the budget packs.

It is last for one reason: 127 ratings is the smallest sample in this comparison by a wide margin, so its excellent 4.7-star average is an early signal rather than a settled verdict, and at GBP 119.98 it costs more than the far better-proven NOCO GB40. Consider it if you specifically want the heavier-duty clamps; otherwise the NOCO is the safer spend.",
                'pros' => ['Stop-spark sensor and heavy-duty clamps and leads', 'From an established vehicle-diagnostics brand', 'States coverage of 99 percent of 12V vehicles', '4.7 star early average', 'Power bank and bright torch included'],
                'contras' => ['Only 127 ratings, the smallest sample here', 'GBP 119.98, more than the far better-proven GB40', 'Amp claim not comparable across brands', 'Heavier than glovebox packs'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '127 at 4.7 stars', 'verdict' => 'bad', 'note' => 'The smallest sample here.'],
                    ['label' => 'Clamps', 'value' => 'Heavy duty, stop spark', 'verdict' => 'good'],
                    ['label' => 'Brand', 'value' => 'TOPDON diagnostics', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£119.98', 'verdict' => 'bad'],
                    ['label' => 'Coverage', 'value' => '99% of 12V vehicles', 'verdict' => 'good'],
                    ['label' => 'Extras', 'value' => 'Power bank, torch', 'verdict' => 'neutral'],
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
        $this->command?->info("JumpStartersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos).");
    }
}
