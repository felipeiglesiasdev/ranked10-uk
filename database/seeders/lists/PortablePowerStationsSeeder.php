<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class PortablePowerStationsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE ESTACOES DE ENERGIA PORTATEIS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=portable+power+station&rh=p_36%3A6000-  (22 ASINS, 15 FICHAS ABERTAS)
        // CATEGORIA TECH. SAZONAL: SOBE NO OUTONO/INVERNO (QUEDAS DE ENERGIA) E NO VERAO (CAMPING).
        //
        // PADRAO EDITORIAL NOVO (30/08): E UM TOP 10, NAO UM ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── EIXO DE COMPRA / TERRENO DE IA (Wh x W É A PERGUNTA FACTUAL) ───
        //   Wh = CAPACIDADE (QUANTO GUARDA / POR QUANTO TEMPO RODA). W = SAIDA (O QUE LIGA DE UMA VEZ).
        //   CHALEIRA 1000W PRECISA DE ESTACAO >=1000W, NAO IMPORTA A CAPACIDADE. → INTRO E CARDS.
        //   QUIMICA: TODAS AS 10 SAO LiFePO4 (~3.000-4.000 CICLOS / 10 ANOS) — A CATEGORIA AMADURECEU. DIZER ISSO.
        //   AC x DC: ANKER C200 DC e AFERIY NAO TEM TOMADA 3 PINOS (SO USB/DC). NAO LIGAM LAMPADA/CHALEIRA. → FLAG FORTE.
        //   mAh NOS PEQUENOS ("31000mAh/99.2Wh", "90000mAh") E MARKETING — Wh COMPARA DE VERDADE. → NOTA.
        //   GRECELL: FICHA MANDA "NAO PASSAR DE 500W". UPS (ANKER 10ms, JACKERY 20ms) PARA CPAP/PC.
        //
        // PROFUNDIDADE (FICHA): 1.856 / 1.451 / 944 / 348 / 327 / 201 / 197 / 138 / 82 / 36.
        // CORTE: VTOMAN 828Wh (16), ELECAENTA (nota 5.0 amostra minima), POWKEY/SINKEU/REXHAN (@3.8-3.9).
        //
        // FOCUS KEYWORD: best portable power station
        // VARIACOES TRABALHADAS: portable power station / solar generator / power station for camping /
        // power station for home backup / lifepo4 power station / portable power station for power cuts /
        // battery generator / best power station uk / power station 1000w
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DE "tech")
        ];

        $article = [
            'slug' => 'best-portable-power-station',                                  // SLUG DO ARTIGO (URL) - FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Portable Power Station 2026: 10 Ranked by Capacity and Output', // TITULO / H1
            'meta_title' => 'Best Portable Power Station 2026: Top 10 Ranked',         // TITLE DA ABA/GOOGLE
            'meta_description' => 'The best portable power station picks for UK camping and power cuts, from Anker and Jackery to EcoFlow. Ten LiFePO4 units compared on capacity and output.', // META DESCRIPTION
            'focus_keyword' => 'best portable power station',                        // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE

            'intro' => "If you want the short answer, the Anker SOLIX C300 is the best portable power station for most people: 1,856 ratings at 4.7 stars, a 288Wh LiFePO4 battery, 300W of output and seven ports, for GBP 189. If you only need to keep phones and a laptop going, the Anker C200 DC costs GBP 119 — but read its entry first, because it has no three-pin plug socket.

Two numbers decide a power station, and it is worth being clear on the difference. Watt-hours (Wh) is how much energy it stores, which is roughly how long it will run your kit. Watts (W) is the output, the most it can power at once, so a 1000W kettle needs a station rated at 1000W or more whatever its capacity. Beyond that, check the battery chemistry: every unit here uses LiFePO4, which lasts around ten years and thousands of charges rather than the few hundred of older lithium batteries, so this is a category that has genuinely improved. We compared ten on capacity, output, ports and price, from a palm-sized 99Wh camping unit to a 2048Wh home backup, and ranked them below.",

            'conclusion' => "For most people the best portable power station here is the Anker SOLIX C300: enough capacity and output for a camping trip or to keep phones, a router and a lamp going through a power cut, from the brand with by far the most reviews on the page. If you want to run bigger appliances or back up your home, step up to the Anker C1000 or the Jackery 1000, both of which have the 1000W-plus output a kettle or fridge needs.

Two things to settle before you buy. First, do you need a mains plug at all? The cheapest units here, the Anker C200 DC and the AFERIY, have no three-pin socket, so they only charge USB and DC devices — fine for phones and laptops, useless for a lamp or a kettle. Second, match the output in watts to the appliance you most want to run, then the watt-hours to how long you need it. Ignore the mAh figures on the small models; watt-hours is the number that compares like for like.",

            'author' => 'Felipe Iglesias',                                           // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-09-02 15:00:00',                                 // DATA FIXA — NAO USAR now()
        ];

        // ─── FICHA: good = MELHOR DA LISTA NO QUESITO, bad = PIOR, neutral = MEIO. COMPARA OS DEZ ENTRE SI. ───
        $products = [
            [
                'position' => 1,
                'name' => 'Anker SOLIX C300 Portable Power Station, 288Wh LiFePO4, 300W, 7 Ports',
                'price' => '£189.00',
                'rating' => 4.7,
                'reviews_count' => 1856,
                'image' => 'https://m.media-amazon.com/images/I/71tMUfAsZcL._AC_SL1500_.jpg',
                'alt_text' => 'best portable power station',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D62GMQ3F?tag=ranked10-21',
                'summary' => 'The best portable power station for most people. 1,856 ratings at 4.7 stars, a 288Wh LiFePO4 battery, 300W output and seven ports for GBP 189.',
                'body' => "With 1,856 ratings at 4.7 stars, the Anker SOLIX C300 has by far the most customer feedback of any power station in this comparison, and it hits the sweet spot on size and price. A 288Wh LiFePO4 battery and 300W output (600W surge) is enough to keep phones, a tablet, a laptop, a router and a lamp running through a power cut, or to power a camping trip, and it does it from seven ports including two three-pin AC sockets, a car socket and multiple USB-C and USB-A.

The LiFePO4 cells are rated for 3,000 cycles and a ten-year life, it recharges to 80 percent in about 50 minutes from the wall, takes a solar panel, and runs at a quiet 25dB. At 15 percent smaller than similar units it is genuinely carryable.

The one thing to understand is what it is not: with 300W of output it will not run a kettle, a hairdryer or anything that draws more than 300 watts. For those you need one of the 1000W-plus stations below. But for keeping your essential small electronics alive, it is the best-value, best-reviewed choice on the page.",
                'pros' => ['1,856 ratings at 4.7 stars, by far the most here', 'LiFePO4 cells rated for 3,000 cycles and ten years', '288Wh and 300W, enough for phones, laptop, router and a lamp', 'Seven ports including two AC sockets, plus solar input', 'Recharges to 80 percent in about 50 minutes, quiet 25dB'],
                'contras' => ['300W output will not run a kettle or hairdryer', '288Wh is a small capacity for long outages', 'Carry strap sold separately', 'For big appliances you need a 1000W-plus unit'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '1,856 at 4.7 stars', 'verdict' => 'good', 'note' => 'By far the most feedback here.'],
                    ['label' => 'Capacity', 'value' => '288Wh', 'verdict' => 'neutral'],
                    ['label' => 'Output', 'value' => '300W (600W surge)', 'verdict' => 'neutral', 'note' => 'Small electronics, not a kettle.'],
                    ['label' => 'Battery', 'value' => 'LiFePO4, 3,000 cycles', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£189.00', 'verdict' => 'good'],
                    ['label' => 'Ports', 'value' => '7, incl. 2 AC', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Anker SOLIX C1000 Gen 2 Power Station, 1024Wh, 2000W, 9 Ports, UPS',
                'price' => '£599.00',
                'rating' => 4.7,
                'reviews_count' => 1451,
                'image' => 'https://m.media-amazon.com/images/I/71RZuHJnezL._AC_SL1500_.jpg',
                'alt_text' => 'Anker SOLIX C1000 Gen 2 power station for home backup',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FN7MSY4L?tag=ranked10-21',
                'summary' => 'The best home-backup pick. 1024Wh and a big 2000W output run real appliances, with a 10ms UPS switchover and a 49-minute recharge, at 4.7 stars.',
                'body' => "This is the one to buy if you want to run proper appliances or back up your home rather than just charge gadgets. The 2000W output (3000W peak) handles a kettle, a microwave or a fridge, and the 1024Wh battery gives meaningful run time, across nine ports. With 1,451 ratings at 4.7 stars it is the best-reviewed large station here.

Two features make it a genuine home-backup unit. It recharges from empty in 49 minutes, so you can top it up fast between outages, and it has a sub-10ms UPS switchover, which means a computer, a router or a CPAP machine plugged through it keeps running without a flicker when the mains drops. Anker rates the LiFePO4 cells for 4,000 cycles and a decade of daily use, and the app schedules charging.

At GBP 599 it is a serious purchase, and at 11.3kg it is heavy to carry far. But watt for watt and cycle for cycle it is the most capable mainstream station on the page, and the obvious step up from the C300 when 300W is not enough.",
                'pros' => ['2000W output runs a kettle, microwave or fridge', '1,451 ratings at 4.7 stars, the most of the large stations', 'Sub-10ms UPS keeps a PC or CPAP running through an outage', 'Recharges fully in 49 minutes', 'LiFePO4 rated for 4,000 cycles and ten years'],
                'contras' => ['GBP 599 is a serious outlay', '11.3kg is heavy to carry far', '1024Wh still empties under a sustained heavy load', 'More power than a camper needs'],
                'specs' => [
                    ['label' => 'Output', 'value' => '2000W (3000W peak)', 'verdict' => 'good', 'note' => 'Runs real appliances.'],
                    ['label' => 'Capacity', 'value' => '1024Wh', 'verdict' => 'good'],
                    ['label' => 'UPS switchover', 'value' => 'Under 10ms', 'verdict' => 'good', 'note' => 'Best for a PC or CPAP.'],
                    ['label' => 'Recharge', 'value' => '49 minutes', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '1,451 at 4.7 stars', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£599.00', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Anker SOLIX C200 DC, 192Wh, 200W, USB and DC Only (No Mains Socket)',
                'price' => '£119.00',
                'rating' => 4.6,
                'reviews_count' => 944,
                'image' => 'https://m.media-amazon.com/images/I/71Ouu2A29eL._AC_SL1500_.jpg',
                'alt_text' => 'Anker SOLIX C200 DC power bank style power station',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D62P85ZR?tag=ranked10-21',
                'summary' => 'The cheapest here at GBP 119, and well-reviewed — but it has no three-pin plug. It charges USB and DC devices only, so it is really a very large power bank.',
                'body' => "At GBP 119 with 944 ratings at 4.6 stars, the Anker C200 DC is the cheapest station in the comparison with a strong review count, and its 192Wh LiFePO4 battery and 140W two-way USB-C make it superb for keeping phones, tablets and laptops charged for days on a trip. It recharges to 80 percent in 1.3 hours and takes solar.

But there is one thing you must know before buying, and it is why the DC is in the name: it has no three-pin mains socket. It powers USB and DC devices only, so it will charge everything with a USB or car-style plug, but it cannot run a lamp, a kettle, a fan or anything with a normal UK plug. For laptops and phones it is brilliant value; for household appliances it is the wrong tool entirely.

If your only need is to keep personal electronics topped up off-grid, this beats every AC station here on price and portability. If you might ever want to plug in something with a three-pin plug, spend a little more on the C300 above, which has real AC sockets.",
                'pros' => ['Cheapest here with a big review count, 944 at 4.6 stars', 'LiFePO4, 3,000 cycles, 192Wh for days of phone and laptop charging', '140W two-way USB-C, recharges to 80 percent in 1.3 hours', 'Small and light, takes solar', 'Excellent value for personal electronics'],
                'contras' => ['No three-pin mains socket, USB and DC only', 'Cannot run a lamp, kettle, fan or anything with a UK plug', '192Wh is a small capacity', 'Really a large power bank rather than an AC station'],
                'specs' => [
                    ['label' => 'AC socket', 'value' => 'None, DC only', 'verdict' => 'bad', 'note' => 'No three-pin plug; USB and DC devices only.'],
                    ['label' => 'Price', 'value' => '£119.00', 'verdict' => 'good', 'note' => 'Cheapest here.'],
                    ['label' => 'Customer ratings', 'value' => '944 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Capacity', 'value' => '192Wh', 'verdict' => 'neutral'],
                    ['label' => 'Battery', 'value' => 'LiFePO4, 3,000 cycles', 'verdict' => 'good'],
                    ['label' => 'USB-C', 'value' => '140W two-way', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Jackery Explorer 1000 v2, 1070Wh LiFePO4, 1500W (3000W Surge)',
                'price' => '£499.00',
                'rating' => 4.7,
                'reviews_count' => 348,
                'image' => 'https://m.media-amazon.com/images/I/611qy50cHdL._AC_SL1500_.jpg',
                'alt_text' => 'Jackery Explorer 1000 v2 portable power station',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DB1T34X5?tag=ranked10-21',
                'summary' => 'The popular 1kWh Jackery. 1070Wh and 1500W run most appliances, it recharges in an hour, and it costs a hundred pounds less than the Anker C1000.',
                'body' => "Jackery is the best-known name in portable power, and the Explorer 1000 v2 is its mainstream 1kWh model. A 1070Wh LiFePO4 battery with 1500W output and a 3000W surge runs air conditioners, kettles and most home appliances, from six ports including two pure sine wave AC sockets, and it recharges fully in an hour. It has 348 ratings at 4.7 stars and a five-year support promise.

Against the Anker C1000 above, it is a hundred pounds cheaper and a little lighter at 10.8kg, with a broadly similar capacity. The Anker edges it on outright output and its faster UPS switchover, but for a camper or as a general-purpose backup the Jackery does the same core job for less, from a brand with a long track record.

Its lower review count than the Anker stations is simply because this is a newer v2 listing rather than a reflection of quality; the 4.7 average is excellent. If you want a trusted 1kWh station and want to save some money, this is the pick.",
                'pros' => ['1500W output and 3000W surge run most home appliances', '1070Wh LiFePO4, recharges fully in an hour', 'A hundred pounds cheaper than the Anker C1000', 'Two pure sine wave AC sockets, five-year support', 'Trusted Jackery brand at 4.7 stars'],
                'contras' => ['Fewer ratings than the Anker stations, as it is a newer listing', 'Lower output and slower UPS than the Anker C1000', '10.8kg to carry', 'GBP 499 is still a large outlay'],
                'specs' => [
                    ['label' => 'Output', 'value' => '1500W (3000W surge)', 'verdict' => 'good'],
                    ['label' => 'Capacity', 'value' => '1070Wh', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£499.00', 'verdict' => 'neutral', 'note' => 'Cheaper than the Anker C1000.'],
                    ['label' => 'Recharge', 'value' => '1 hour', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '348 at 4.7 stars', 'verdict' => 'neutral'],
                    ['label' => 'Battery', 'value' => 'LiFePO4', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Jackery Explorer 240 v2, 256Wh, 300W, 3.5kg Lightweight',
                'price' => '£189.00',
                'rating' => 4.5,
                'reviews_count' => 327,
                'image' => 'https://m.media-amazon.com/images/I/81uk4phu-hL._AC_SL1500_.jpg',
                'alt_text' => 'Jackery Explorer 240 v2 lightweight power station',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CYPKY7NQ?tag=ranked10-21',
                'summary' => 'The lightest AC station here at 3.5kg. A 256Wh Jackery with a three-pin socket and five ports, ideal for camping when weight matters.',
                'body' => "If you want a proper power station with a mains socket but the lightest one you can get, this is it. At just 3.5kg the Explorer 240 v2 is the easiest station here to carry to a campsite or a picnic, and unlike the DC-only units it does have a three-pin AC socket alongside a 100W USB-C PD port, five ports in total. It has 327 ratings at 4.5 stars.

A 256Wh battery and 300W output put it in the same class as the Anker C300 for what it can run — phones, laptops, a small light, a fan — and it fast-charges in an hour with app control over WiFi or Bluetooth. Jackery certifies it to IEC and UL safety standards and backs it with five years of support.

It sits below the Anker C300 mainly on review count and rating, and its lower output means, like the C300, it is not for kettles. But for the specific job of lightweight, carry-anywhere power with a real plug, it is the neatest option on the page.",
                'pros' => ['Just 3.5kg, the lightest AC station here', 'Has a three-pin socket, unlike the DC-only units', '256Wh and 300W for phones, laptop, light and a fan', 'Fast-charges in an hour, app control', 'Trusted Jackery brand with five-year support'],
                'contras' => ['300W output will not run a kettle', '256Wh is a small capacity', 'Fewer ratings and lower rating than the Anker C300', 'Similar price to better-reviewed rivals'],
                'specs' => [
                    ['label' => 'Weight', 'value' => '3.5 kg', 'verdict' => 'good', 'note' => 'The lightest AC station here.'],
                    ['label' => 'AC socket', 'value' => 'Yes, three-pin', 'verdict' => 'good'],
                    ['label' => 'Capacity', 'value' => '256Wh', 'verdict' => 'neutral'],
                    ['label' => 'Output', 'value' => '300W', 'verdict' => 'neutral'],
                    ['label' => 'Customer ratings', 'value' => '327 at 4.5 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£189.00', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'GRECELL 500W Power Station, 519Wh, 10 Ports, 2 AC Sockets',
                'price' => '£217.59',
                'rating' => 4.6,
                'reviews_count' => 201,
                'image' => 'https://m.media-amazon.com/images/I/71c7+O9FgfL._AC_SL1500_.jpg',
                'alt_text' => 'GRECELL 519Wh portable power station with ten ports',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CR6BTNWL?tag=ranked10-21',
                'summary' => 'A well-priced mid-size unit: 519Wh, two three-pin sockets and ten ports for GBP 217.59 — as long as you respect its 500W output ceiling.',
                'body' => "The GRECELL fills the gap between the small 300W stations and the big 1000W-plus units. A 519Wh battery with two pure sine wave AC sockets and ten ports in total lets you keep a lot of devices going at once, and at 6.4kg it is still portable. It has 201 ratings at 4.6 stars for GBP 217.59, which is good value for the capacity.

The number to respect is the output: 500W (1000W peak), and GRECELL states plainly that you should not run devices rated above 500W on it. That covers laptops, lights, a small TV, a CPAP or a fan comfortably, but rules out kettles and hairdryers, so it is a mid-power unit rather than a home-backup one.

It ranks here on evidence and brand: a smaller review count than the Anker and Jackery stations, and a less established name. But if you want more capacity and ports than the 300W units without paying for a full 1000W station, it is a sensible middle option.",
                'pros' => ['519Wh and ten ports, including two AC sockets', 'Good value at GBP 217.59, 4.6 stars', 'Portable at 6.4kg', 'Pure sine wave AC, expandable, takes solar', 'More capacity and ports than the 300W units'],
                'contras' => ['500W output ceiling, no kettles or hairdryers', '201 ratings, fewer than the big brands', 'Smaller, less established brand', 'Li-ion-class run time between the small and large tiers'],
                'specs' => [
                    ['label' => 'Output', 'value' => '500W (1000W peak)', 'verdict' => 'neutral', 'note' => 'Do not exceed 500W devices.'],
                    ['label' => 'Capacity', 'value' => '519Wh', 'verdict' => 'neutral'],
                    ['label' => 'Ports', 'value' => '10, incl. 2 AC', 'verdict' => 'good', 'note' => 'The most ports here.'],
                    ['label' => 'Price', 'value' => '£217.59', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '201 at 4.6 stars', 'verdict' => 'neutral'],
                    ['label' => 'Weight', 'value' => '6.4 kg', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'DJI Power 1000 V2, 1024Wh LFP, 37-Minute Recharge, 26dB Quiet',
                'price' => '£458.99',
                'rating' => 4.6,
                'reviews_count' => 197,
                'image' => 'https://m.media-amazon.com/images/I/61RETVhswGL._AC_SL1500_.jpg',
                'alt_text' => 'DJI Power 1000 V2 portable power station',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FC6M4HPX?tag=ranked10-21',
                'summary' => 'The quietest and fastest-charging 1kWh unit. A 1024Wh DJI that runs most appliances, recharges to 80 percent in 37 minutes and runs as low as 26dB.',
                'body' => "DJI, better known for drones, makes an unusually refined 1kWh station. The Power 1000 V2 has a 1024Wh LFP battery and enough output to run 99 percent of home appliances, and its two stand-out numbers are speed and quiet: it recharges to 80 percent in 37 minutes, the fastest here, and runs as low as 26dB, so it will not keep you awake in a tent or a bedroom overnight. It has 197 ratings at 4.6 stars.

It also has dual 140W USB-C ports, 280W between them, which is more USB-C power than most stations offer and useful if you charge two laptops. An intelligent battery management system and sub-nano coating cover the safety side, and it costs less than the Anker C1000 while sitting in the same capacity class.

It is seventh rather than higher on review count alone — 197 ratings is a smaller sample than the Anker and Jackery stations — not on any weakness. If quiet running and the fastest recharge matter to you, it is the most refined 1kWh unit on the page.",
                'pros' => ['Recharges to 80 percent in 37 minutes, the fastest here', 'As quiet as 26dB, best for a tent or bedroom', '1024Wh LFP, runs most home appliances', 'Dual 140W USB-C ports, 280W total', 'Cheaper than the Anker C1000'],
                'contras' => ['197 ratings, a smaller sample than the big brands', 'DJI is newer to power stations than Anker or Jackery', 'A serious outlay at GBP 458.99', 'Heavy, like all 1kWh units'],
                'specs' => [
                    ['label' => 'Recharge', 'value' => '37 min to 80%', 'verdict' => 'good', 'note' => 'The fastest here.'],
                    ['label' => 'Noise', 'value' => 'From 26dB', 'verdict' => 'good', 'note' => 'The quietest here.'],
                    ['label' => 'Capacity', 'value' => '1024Wh', 'verdict' => 'good'],
                    ['label' => 'USB-C', 'value' => 'Dual 140W', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '197 at 4.6 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£458.99', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'VTOMAN Jump 2200 Power Station, 1548Wh, 2200W, Car Jump-Start',
                'price' => '£559.99',
                'rating' => 4.3,
                'reviews_count' => 138,
                'image' => 'https://m.media-amazon.com/images/I/71zWuI-eBML._AC_SL1500_.jpg',
                'alt_text' => 'VTOMAN Jump 2200 power station with car jump-start',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FZRML16J?tag=ranked10-21',
                'summary' => 'A big 1548Wh station that also jump-starts a car. 2200W output, expandable to nearly 3kWh, with jumper cables in the box — a genuinely different tool.',
                'body' => "The VTOMAN does something none of the others here can: it doubles as a car jump-starter. Along with a 1548Wh LiFePO4 battery and 2200W of pure sine wave output, it comes with a proper jumper cable set, so the same box that backs up your home or powers a campsite can also revive a flat car battery on the drive. For anyone who wants one device to cover both jobs, that is a real reason to choose it.

The 2200W output runs kettles and most appliances, its LifeBMS system carries more than ten protections, and the capacity expands to 2236Wh with an add-on battery. It has 138 ratings at 4.3 stars.

It is eighth because its 4.3-star average is the lowest of the mid and large stations here and its review count is modest, so it is a slightly less settled choice than the Anker or Jackery units at a similar price. But if the jump-start feature solves a second problem for you, nothing else on the page offers it.",
                'pros' => ['Doubles as a car jump-starter, with cables included', '2200W output runs kettles and most appliances', '1548Wh, expandable to 2236Wh', 'LifeBMS with 10-plus protections', 'One device for home backup, camping and the car'],
                'contras' => ['4.3 stars, the lowest of the mid and large stations here', 'Only 138 ratings', 'Smaller brand than Anker or Jackery', 'Heavy, like all large stations'],
                'specs' => [
                    ['label' => 'Extra function', 'value' => 'Car jump-starter', 'verdict' => 'good', 'note' => 'The only one here that jump-starts a car.'],
                    ['label' => 'Output', 'value' => '2200W', 'verdict' => 'good'],
                    ['label' => 'Capacity', 'value' => '1548Wh, expandable', 'verdict' => 'good'],
                    ['label' => 'Average score', 'value' => '4.3 stars', 'verdict' => 'bad', 'note' => 'Lowest of the larger units here.'],
                    ['label' => 'Customer ratings', 'value' => '138', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£559.99', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'AFERIY 99.2Wh Portable Power Station, 100W, LiFePO4, Palm-Sized',
                'price' => '£69.99',
                'rating' => 4.4,
                'reviews_count' => 82,
                'image' => 'https://m.media-amazon.com/images/I/51mvfZFN6UL._AC_SL1500_.jpg',
                'alt_text' => 'AFERIY 99Wh palm-sized portable power station',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F18LDSTD?tag=ranked10-21',
                'summary' => 'The cheapest here at GBP 69.99 and small enough to fly with. A 99Wh LiFePO4 unit for topping up phones and small devices — but USB and DC only.',
                'body' => "At GBP 69.99 the AFERIY is the cheapest station in the comparison and, at 99.2Wh, small enough to meet airline carry-on limits, which is genuinely useful if you travel. It uses LiFePO4 cells rated for 2,000-plus cycles, charges four ways, and comes with a built-in extension cable and a USB-C adapter, making it a tidy little top-up unit for phones, cameras and small devices.

Its 100W output and USB and DC outputs mean, like the Anker C200 DC, it has no three-pin mains socket. The 31000mAh headline is the same 99.2Wh expressed as a power-bank number; watt-hours is the figure to compare, and 99Wh is small, so this is a device-charger rather than an appliance-runner.

It is ninth on both size and evidence: the smallest capacity here and only 82 ratings. But if you want the cheapest, most travel-friendly LiFePO4 power pack for keeping personal electronics alive, it does that one job well for very little money.",
                'pros' => ['Cheapest here at GBP 69.99', 'Palm-sized and meets airline carry-on limits', 'LiFePO4 rated for 2,000-plus cycles', 'Four charging methods, cable and adapter included', 'Good for topping up phones, cameras and small devices'],
                'contras' => ['No three-pin socket, USB and DC only', 'Only 99Wh, the smallest capacity here', 'Just 82 ratings', '31000mAh headline is a power-bank number, not extra capacity'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£69.99', 'verdict' => 'good', 'note' => 'The cheapest here.'],
                    ['label' => 'Capacity', 'value' => '99.2Wh', 'verdict' => 'bad', 'note' => 'The smallest here.'],
                    ['label' => 'AC socket', 'value' => 'None, DC only', 'verdict' => 'bad'],
                    ['label' => 'Battery', 'value' => 'LiFePO4, 2,000+ cycles', 'verdict' => 'good'],
                    ['label' => 'Portability', 'value' => 'Airline carry-on', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '82 at 4.4 stars', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'EcoFlow DELTA 3 Max Plus, 2048Wh LiFePO4, 3000W, Expandable to 10kWh',
                'price' => '£1,399.00',
                'rating' => 4.4,
                'reviews_count' => 36,
                'image' => 'https://m.media-amazon.com/images/I/61ppUjXhIYL._AC_SL1500_.jpg',
                'alt_text' => 'EcoFlow DELTA 3 Max Plus large home backup power station',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FXFLZHVD?tag=ranked10-21',
                'summary' => 'The biggest here: 2048Wh, 3000W output and expandable to 10kWh for whole-home backup. A powerful flagship, but a new listing with few ratings so far.',
                'body' => "This is the most powerful station in the comparison and the closest thing here to whole-home backup. A 2048Wh LiFePO4 battery with 3000W of rated output (6000W surge and X-Boost) runs 99 percent of appliances at once, and the capacity expands to 10kWh with extra batteries, so it can scale from a long power cut to running much of a house. It recharges to 80 percent in 47 minutes across five charging methods and is app-controlled.

For someone planning serious backup — a home office through a long outage, a caravan lived in, or off-grid use — this is the right class of device, and EcoFlow is one of the leading names in it.

Two reasons it is tenth. At GBP 1,399 and 23.4kg it is by far the most expensive and heaviest unit here, more than most households need, and it is a new listing with only 36 ratings, so the 4.4-star score is an early signal rather than a settled verdict. If you genuinely need 2kWh and expandability, it delivers; for everything short of that, the Anker C1000 or Jackery 1000 cost far less and are far better proven.",
                'pros' => ['2048Wh and 3000W, runs almost anything, closest to whole-home backup', 'Expandable to 10kWh with extra batteries', 'Recharges to 80 percent in 47 minutes, five charging methods', 'LiFePO4 built for a decade of use', 'From EcoFlow, a leading backup brand'],
                'contras' => ['GBP 1,399, by far the most expensive here', '23.4kg, the heaviest unit on the page', 'Only 36 ratings, an early sample', 'Far more capacity than most households need'],
                'specs' => [
                    ['label' => 'Capacity', 'value' => '2048Wh, to 10kWh', 'verdict' => 'good', 'note' => 'The largest and expandable.'],
                    ['label' => 'Output', 'value' => '3000W (6000W surge)', 'verdict' => 'good', 'note' => 'The highest here.'],
                    ['label' => 'Price', 'value' => '£1,399.00', 'verdict' => 'bad', 'note' => 'The most expensive here.'],
                    ['label' => 'Weight', 'value' => '23.4 kg', 'verdict' => 'bad'],
                    ['label' => 'Customer ratings', 'value' => '36 at 4.4 stars', 'verdict' => 'bad', 'note' => 'Small early sample.'],
                    ['label' => 'Battery', 'value' => 'LiFePO4', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
        ];

        // ═══════════════════════════════════════════════════════════════
        // ═══ FIM DA AREA EDITAVEL ═══
        // ═══════════════════════════════════════════════════════════════

        $categoryModel = Category::updateOrCreate(['slug' => $category['slug']], $category); // CRIA/ATUALIZA A CATEGORIA
        $articleModel = Article::updateOrCreate(['slug' => $article['slug']], array_merge($article, ['category_id' => $categoryModel->id])); // CRIA/ATUALIZA O ARTIGO
        $articleModel->products()->delete(); // REMOVE PRODUTOS ANTIGOS DESTE ARTIGO
        foreach ($products as $produto) { // PERCORRE A LISTA MANUAL
            $articleModel->products()->create($produto); // RECRIA CADA PRODUTO VINCULADO AO ARTIGO
        }
        $this->command?->info("PortablePowerStationsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
