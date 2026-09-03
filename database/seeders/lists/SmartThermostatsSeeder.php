<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class SmartThermostatsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE TERMOSTATOS INTELIGENTES DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=smart+thermostat&rh=p_36%3A3000-  (24 ASINS ANALISADOS, 15 FICHAS ABERTAS)
        // CATEGORIA HOME. SAZONAL: PICO DE SETEMBRO A FEVEREIRO (INICIO DA TEMPORADA DE AQUECIMENTO).
        //
        // PADRAO EDITORIAL NOVO (30/08): E UM TOP 10, NAO UM ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── CORTE DE CATEGORIA ───
        // FOCO EM TERMOSTATO DE AMBIENTE/CALDEIRA (ROOM/BOILER), NAO EM VALVULA DE RADIADOR (TRV) —
        // TRV JA TEM ARTIGO PROPRIO (SmartRadiatorValvesSeeder). FORA DA LISTA:
        //   MEROSS MTS215 UNDERFLOOR (27 AVAL.) E WARMUP ELEMENT (12) — AMOSTRA FINA DEMAIS.
        //   REFOSS MTS200 SEGUNDO ASIN B0CDPTDQMG (42 AVAL.) — MESMO MODELO DO B0GMPGH4Q1 (285), MANTIDO O DE MAIS AVALIACAO.
        //   PACKS DE RADIADOR tado X TRIO — SAO TRV, NAO TERMOSTATO DE CALDEIRA.
        //
        // PROFUNDIDADE DE AVALIACAO CONFERIDA NA FICHA (A GRADE NAO RENDERIZA AS CONTAGENS):
        // 1.685 / 1.047 / 374 / 332 / 296 / 285 / 255 / 206 / 205 / 86.
        //
        // ─── O QUE SOBROU DA PESQUISA (E ONDE) — SO ENTRA NA PROSA O QUE MUDA A COMPRA ───
        //   COMPATIBILIDADE DE CALDEIRA (COMBI x CONVENCIONAL/SYSTEM) → E A DECISAO CENTRAL. VAI NA INTRO E EM CADA CARD.
        //   HUB SEPARADO: HIVE MINI DIZ "NO HIVE HUB INCLUDED" — PRECISA DE UM HUB A PARTE. → CONTRA, MUDA O PRECO REAL.
        //   ASSINATURA: tado "AI ASSIST"/"AUTO ASSIST" (£3.99/mes) DESTRAVA GEOFENCING AUTOMATICO E RELATORIOS. → CARD.
        //   LINHAS INCOMPATIVEIS ENTRE SI DO MESMO FABRICANTE: tado X x V3+, NETATMO "CONNECTED" x "ORIGINAL",
        //     HIVE COMBI x CONVENTIONAL. → RESSALVA DE COMPRA (COMPRE O CERTO PARA O SEU SISTEMA).
        // CORTADO PARA O ESTUDO DE DADOS (NAO MUDA A COMPRA): FICHA DA HONEYWELL T6 DIZ "Voltage: 5 Volts" NUM
        //   APARELHO 230V CABEADO; CAMPOS "Included components: 1" GENERICOS; UNIDADES MISTAS mm/cm ENTRE FICHAS.
        //
        // FOCUS KEYWORD: best smart thermostat
        // VARIACOES TRABALHADAS: smart thermostat / wifi thermostat / best wifi thermostat /
        // smart thermostat for combi boiler / smart heating control / thermostat with app /
        // energy saving thermostat / smart thermostat alexa / wireless room thermostat
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DE "home")
        ];

        $article = [
            'slug' => 'best-smart-thermostat',                                       // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Smart Thermostat 2026: 10 WiFi Heating Controls Ranked', // TITULO / H1 - RESPONDE A BUSCA
            'meta_title' => 'Best Smart Thermostat 2026: 10 WiFi Controls Ranked',    // TITLE DA ABA/GOOGLE
            'meta_description' => 'The best smart thermostat picks for UK homes, from tado and Hive to budget WiFi controls. Ten heating thermostats compared on ratings, features and price.', // META DESCRIPTION
            'focus_keyword' => 'best smart thermostat',                              // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE

            'intro' => "If you want the short answer, the tado° V3+ Starter Kit is the best smart thermostat for most homes: 4.5 stars, a trusted German brand, and the bridge, receiver and temperature sensor you need all in the box for GBP 55.90. Spend even less and the Refoss at GBP 45.99 does the core job — app control, scheduling and open-window detection — for the lowest price of any established option here.

A smart thermostat replaces the dial or timer on your wall so you can control your heating from your phone, set a schedule around when you are actually home, and let geofencing turn the heating down when everyone leaves. The one thing that decides which model you can buy is your boiler. Most WiFi thermostats here are built for combi boilers; a few also manage the hot water tank on a conventional or system setup; and none of them fit every home. We compared ten smart heating controls on customer ratings, boiler compatibility, whether they need a separate hub, and price, then ranked them below.",

            'conclusion' => "For most homes the best smart thermostat here is the tado° V3+. It has the highest rating of any established brand on the page, the kit already includes the bridge and wireless receiver you need, and at GBP 55.90 it costs about a third of the premium wired models. If your budget is tighter, the Refoss is the one to get — it connects straight to your WiFi with no hub to buy and still covers scheduling, voice control and open-window detection.

Two things decide the rest. First, your boiler: choose the Hive for Conventional Boilers if you have a separate hot water tank, and a combi model otherwise. Second, whether you already own a hub — the Hive Mini is cheaper up front but needs a Hive hub you may not have. If you would rather have the most-reviewed option and a thermostat that works with almost any fuel, the Netatmo has by far the most customer feedback in this comparison.",

            'author' => 'Felipe Iglesias',                                           // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-09-01 09:00:00',                                 // DATA FIXA — NAO USAR now()
        ];

        // ─── FICHA: good = MELHOR DA LISTA NO QUESITO, bad = PIOR, neutral = MEIO. COMPARA OS DEZ ENTRE SI. ───
        $products = [
            [
                'position' => 1,
                'name' => 'tado° Wireless Smart Thermostat V3+ Starter Kit, Hot Water Control',
                'price' => '£55.90',
                'rating' => 4.5,
                'reviews_count' => 296,
                'image' => 'https://m.media-amazon.com/images/I/31kdcQ7pQgL._AC_SL1500_.jpg',
                'alt_text' => 'best smart thermostat',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08LP1LS5T?tag=ranked10-21',
                'summary' => 'The best smart thermostat for most homes. A trusted brand at 4.5 stars, with the bridge, receiver and sensor all in the box for well under sixty pounds.',
                'body' => "At GBP 55.90 with 4.5 stars, this is the highest-rated thermostat from an established brand on the page, and the cheapest way into a name people recognise. The starter kit is complete: the wireless temperature sensor, the wireless receiver that wires to your boiler, and the internet bridge are all included, so there is nothing else to buy to get app control, schedules and hot water control on a combi boiler.

The everyday features are the ones you actually use: a heating boost button, a smart schedule per room, and a reminder to turn the heating down when you leave or a window is open. It works with Alexa, Google Assistant and Siri for voice control. One thing to know before you buy: the fully automatic version of geofencing and open-window response is tado's Auto Assist add-on at GBP 3.99 a month, so without it you turn the heating down from the reminder yourself rather than having it happen for you.

The other note is future compatibility. This is the V3+ generation, and tado's newer X range is a separate, non-interchangeable system, so if you later add tado radiator valves make sure they match this generation.",
                'pros' => ['4.5 stars, the highest rating from an established brand here', 'Complete kit: bridge, receiver and temperature sensor included', 'Cheapest big-brand smart thermostat in this comparison', 'Works with Alexa, Google Assistant and Siri', 'Per-room schedules and heating boost from the app'],
                'contras' => ['Fully automatic geofencing needs the GBP 3.99/month Auto Assist add-on', 'V3+ is a separate system from the newer tado X range', 'Combi and hot water only, not a conventional hot water tank on its own', '296 ratings is a mid-sized sample, not the largest here'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '296 at 4.5 stars', 'verdict' => 'good', 'note' => 'Joint highest rating on the page.'],
                    ['label' => 'Price', 'value' => '£55.90', 'verdict' => 'good', 'note' => 'The cheapest big-brand option here.'],
                    ['label' => 'In the box', 'value' => 'Bridge, receiver, sensor', 'verdict' => 'good', 'note' => 'A complete kit, nothing else to buy.'],
                    ['label' => 'Boiler type', 'value' => 'Combi and hot water', 'verdict' => 'neutral'],
                    ['label' => 'Hub needed', 'value' => 'No, bridge included', 'verdict' => 'good'],
                    ['label' => 'Voice control', 'value' => 'Alexa, Google, Siri', 'verdict' => 'neutral'],
                    ['label' => 'Full automation', 'value' => 'Auto Assist, £3.99/mo', 'verdict' => 'bad', 'note' => 'Automatic geofencing is a paid add-on.'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Refoss Smart Thermostat MTS200, Glass Touch, Hubless, HomeKit/Alexa/Google',
                'price' => '£45.99',
                'rating' => 4.2,
                'reviews_count' => 285,
                'image' => 'https://m.media-amazon.com/images/I/51IuVR19KoL._AC_SL1500_.jpg',
                'alt_text' => 'Refoss MTS200 smart wifi thermostat with glass touch panel',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GMPGH4Q1?tag=ranked10-21',
                'summary' => 'The best value here. Under fifty pounds, no hub to buy, and it still covers scheduling, voice control and open-window detection.',
                'body' => "This is the cheapest smart thermostat in the comparison that has a settled review count behind it — GBP 45.99 with 285 ratings at 4.2 stars. It connects straight to your home WiFi with no separate hub, so the price on the label is the price you pay, which is not true of the Hive Mini further down.

For the money it does more than you would expect. There is a seven-day schedule with up to eight periods a day, a dual-sensor system that reads both the room air and an external probe, open-window detection that pauses the heating when the temperature drops suddenly, and voice control through Apple HomeKit, Alexa and Google Home. It suits combi boilers and water-based underfloor heating.

The compromises are the ones you accept at this price: a smaller brand with no UK service line, a glass panel that shows fingerprints, and 4.2 stars rather than the 4.5 of the tado above. If you want a smart thermostat that simply works from your phone and costs as little as possible, this is the pick.",
                'pros' => ['Cheapest option here with a four-figure-scale review count', 'Hubless: connects straight to WiFi, no extra box to buy', 'Dual sensors, seven-day schedule and open-window detection', 'Works with Apple HomeKit, Alexa and Google Home', 'Suits combi boilers and water underfloor heating'],
                'contras' => ['Smaller brand with no UK phone support', '4.2 stars, below the tado and Hive picks', 'Glass touch panel shows fingerprints', 'Not for conventional boilers with a separate hot water tank'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£45.99', 'verdict' => 'good', 'note' => 'The cheapest established option here.'],
                    ['label' => 'Hub needed', 'value' => 'No, hubless', 'verdict' => 'good', 'note' => 'Connects direct to WiFi.'],
                    ['label' => 'Customer ratings', 'value' => '285 at 4.2 stars', 'verdict' => 'neutral'],
                    ['label' => 'Sensors', 'value' => 'Dual, room and probe', 'verdict' => 'good'],
                    ['label' => 'Boiler type', 'value' => 'Combi, underfloor', 'verdict' => 'neutral'],
                    ['label' => 'Voice control', 'value' => 'HomeKit, Alexa, Google', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Netatmo Smart Energy Saving Thermostat, Works with Most Boilers, NTH01-AMZ',
                'price' => '£95.36',
                'rating' => 4.1,
                'reviews_count' => 1685,
                'image' => 'https://m.media-amazon.com/images/I/71gArvVzhBL._AC_SL1500_.jpg',
                'alt_text' => 'Netatmo smart energy saving thermostat designed by Philippe Starck',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CC67PYHY?tag=ranked10-21',
                'summary' => 'By far the most-reviewed thermostat here, with 1,685 ratings, and the one that works with the widest range of boilers and fuels.',
                'body' => "One thousand six hundred and eighty-five ratings is more customer feedback than the next four thermostats on this page combined, so if a big, settled review count is what reassures you, this is the one to look at first. At 4.1 stars the average is a little below the tado and Hive picks, but it is built on a far larger sample.

Its real strength is compatibility. Netatmo states it works with most boiler types whatever the fuel — gas, electric, oil, wood or heat pump — which is broader than most rivals here, and it installs in under an hour. The Auto-Adapt feature reads the outdoor temperature and your home's insulation to reach the set temperature without overshooting, you get an energy-savings report in the app, and the Starck-designed unit ships with four colour strips so it blends into a wall.

One caveat matches the pattern across every brand here: the Netatmo Connected range is not compatible with the newer Netatmo Original range, so if you add radiator valves later, buy the matching generation. At GBP 95.36 it sits in the middle of the price range.",
                'pros' => ['1,685 ratings, by far the most customer feedback on the page', 'Works with most boilers and fuels, including heat pumps', 'Auto-Adapt uses outdoor temperature to avoid overshooting', 'Energy-savings report built into the app', 'Under an hour to install, Philippe Starck design'],
                'contras' => ['4.1 stars, the lowest average among the big brands here', 'Connected range does not mix with the newer Original range', 'Mid-range price for a heating-only controller', 'App leans on the Netatmo ecosystem for extra rooms'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '1,685 at 4.1 stars', 'verdict' => 'good', 'note' => 'The most feedback of any thermostat here.'],
                    ['label' => 'Boiler compatibility', 'value' => 'Most boilers and fuels', 'verdict' => 'good', 'note' => 'The widest compatibility in this list.'],
                    ['label' => 'Price', 'value' => '£95.36', 'verdict' => 'neutral'],
                    ['label' => 'Hub needed', 'value' => 'No, relay included', 'verdict' => 'good'],
                    ['label' => 'Voice control', 'value' => 'HomeKit, Alexa, Google', 'verdict' => 'neutral'],
                    ['label' => 'Average score', 'value' => '4.1 stars', 'verdict' => 'bad', 'note' => 'Lowest of the established brands.'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Honeywell Home T6 Wired Smart Thermostat, Touchscreen, Geofencing, Black',
                'price' => '£179.00',
                'rating' => 4.3,
                'reviews_count' => 1047,
                'image' => 'https://m.media-amazon.com/images/I/71ifeARzCGL._AC_SL1500_.jpg',
                'alt_text' => 'Honeywell Home T6 wired smart thermostat with black touchscreen',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01M3PQJVV?tag=ranked10-21',
                'summary' => 'The premium wired option, and the second most-reviewed here with 1,047 ratings. A proper touchscreen and a wide compatibility range, at the highest price on the page.',
                'body' => "If you want the most established heating brand and a proper wall unit rather than a small puck, the T6 is it. One thousand and forty-seven ratings at 4.3 stars is the second largest sample in the comparison, and Honeywell has made heating controls for decades, so the app and the hardware are both mature.

The large black touchscreen is easier to use on the wall than the button-only units here, and the T6 supports a wide 24-230V range of on/off and OpenTherm systems, including gas, combi boilers and heat pumps. Geofencing, seven-day or 5/2-day schedules with six periods a day, and AUTO/MAN/ECO/HOLIDAY modes are all there, with Alexa, Google and Apple HomeKit voice control.

The catch is price and installation. At GBP 179 it is the most expensive thermostat on this page by a clear margin, and being wired it is the one most likely to need an electrician if your current wiring does not match. For a combi boiler where you mainly want app control, the cheaper picks above do the same core job for a third of the money.",
                'pros' => ['1,047 ratings at 4.3 stars, the second largest sample here', 'Large touchscreen, easier to use on the wall than button pucks', 'Wide 24-230V compatibility including OpenTherm and heat pumps', 'Established heating brand with a mature app', 'Geofencing plus AUTO/MAN/ECO/HOLIDAY modes'],
                'contras' => ['GBP 179, the most expensive thermostat on the page', 'Wired install may need an electrician', 'Overkill if you only want app control on a combi', 'Overview field lists 5 Volts on a 230V wired unit'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '1,047 at 4.3 stars', 'verdict' => 'good', 'note' => 'Second most feedback here.'],
                    ['label' => 'Price', 'value' => '£179.00', 'verdict' => 'bad', 'note' => 'The most expensive on the page.'],
                    ['label' => 'Display', 'value' => 'Large touchscreen', 'verdict' => 'good', 'note' => 'The best on-wall screen here.'],
                    ['label' => 'Compatibility', 'value' => '24-230V, OpenTherm', 'verdict' => 'good'],
                    ['label' => 'Install', 'value' => 'Wired, may need a pro', 'verdict' => 'bad'],
                    ['label' => 'Voice control', 'value' => 'HomeKit, Alexa, Google', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Hive Smart Thermostat for Combi Boilers, Includes Nano 3 Hub, OpenTherm',
                'price' => '£149.00',
                'rating' => 4.4,
                'reviews_count' => 332,
                'image' => 'https://m.media-amazon.com/images/I/61AkK342CgL._AC_SL1500_.jpg',
                'alt_text' => 'Hive smart thermostat for combi boilers with Nano 3 hub',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DCGMD9KX?tag=ranked10-21',
                'summary' => 'The big UK smart-home brand, hub included, at 4.4 stars. The safe choice if you want a familiar name and a system you can grow.',
                'body' => "Hive is the smart-home brand most UK households already recognise, and this combi-boiler kit includes the new Nano 3 hub, so unlike the Hive Mini lower down there is nothing extra to buy. At 4.4 stars over 332 ratings it is one of the better-rated options here, and the ecosystem stretches to Hive lights, plugs and sensors if you want to expand later.

The features are the mainstream set done well: create up to six daily heating slots across seven days, adjust the temperature on the thermostat itself or in the app, automatic frost protection that fires below 7°C to protect your pipes, geolocation reminders, and voice control. The added OpenTherm support lets a compatible boiler modulate rather than simply switch on and off, which Hive says can cut gas use.

The two things to weigh are price and scope. At GBP 149 it costs far more than the tado and Refoss picks, and this version controls heating only on a combi boiler — if you have a conventional system with a hot water tank, you want the Hive for Conventional Boilers further down instead.",
                'pros' => ['Best-known UK smart-home brand, easy to expand', 'Nano 3 hub included, nothing extra to buy', '4.4 stars over 332 ratings', 'OpenTherm support for compatible boilers', 'Automatic frost protection below 7°C'],
                'contras' => ['GBP 149 is far more than the tado and Refoss picks', 'Combi and heating only, no hot water tank control', 'App leans you toward the wider Hive ecosystem', 'Cheaper models here do the core app control for less'],
                'specs' => [
                    ['label' => 'Brand', 'value' => 'Hive, hub included', 'verdict' => 'good', 'note' => 'Familiar UK brand, nothing extra to buy.'],
                    ['label' => 'Customer ratings', 'value' => '332 at 4.4 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£149.00', 'verdict' => 'bad', 'note' => 'Near the top of the price range.'],
                    ['label' => 'Boiler type', 'value' => 'Combi, heating only', 'verdict' => 'neutral'],
                    ['label' => 'Efficiency', 'value' => 'OpenTherm modulation', 'verdict' => 'good'],
                    ['label' => 'Frost protection', 'value' => 'Automatic below 7°C', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'tado° Wireless Smart Thermostat X Starter Kit, Matter and Thread, Bridge X',
                'price' => '£129.99',
                'rating' => 4.3,
                'reviews_count' => 255,
                'image' => 'https://m.media-amazon.com/images/I/61lbdil0OCL._AC_SL1500_.jpg',
                'alt_text' => 'tado X wireless smart thermostat starter kit with Bridge X',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D9QBPV51?tag=ranked10-21',
                'summary' => 'tado latest generation, built around Matter and Thread. The most future-proof pick here if you are building a wider smart home.',
                'body' => "This is tado's newest generation, and the reason to choose it over the cheaper V3+ at the top is the smart-home plumbing. The X range is built for Matter, the cross-brand standard, and the included Wireless Receiver X doubles as a Thread border router, so it can sit at the centre of a mixed smart home without extra hardware. If you already run HomeKit, SmartThings or a Matter setup, that matters.

Day to day it does everything the V3+ does — per-room schedules, geofencing, open-window detection without extra window sensors, and voice control through Alexa, Google and Siri — with a cleaner display. At 4.3 stars over 255 ratings it is well rated, if on a smaller sample than the older model simply because it is newer.

Two caveats. It costs more than twice the V3+, and the same subscription note applies: the biggest automatic energy savings sit behind tado's AI Assist add-on at GBP 3.99 a month. And as tado states plainly, X products do not mix with V3+ or older tado kit, so do not buy this to extend an existing V3+ system.",
                'pros' => ['Newest tado generation, built for Matter', 'Receiver doubles as a Thread border router, no extra hub', 'Per-room schedules, geofencing and open-window detection', 'Cleaner display than the V3+', 'Works with Alexa, Google and Siri'],
                'contras' => ['More than twice the price of the V3+ at the top', 'Biggest automatic savings need AI Assist at GBP 3.99/month', 'Does not mix with older tado V3+ hardware', '255 ratings, a smaller sample as it is a new model'],
                'specs' => [
                    ['label' => 'Smart-home standard', 'value' => 'Matter and Thread', 'verdict' => 'good', 'note' => 'The most future-proof kit here.'],
                    ['label' => 'Customer ratings', 'value' => '255 at 4.3 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£129.99', 'verdict' => 'bad', 'note' => 'Over twice the tado V3+.'],
                    ['label' => 'Hub needed', 'value' => 'No, Bridge X included', 'verdict' => 'good'],
                    ['label' => 'Boiler type', 'value' => 'Combi and hot water', 'verdict' => 'neutral'],
                    ['label' => 'Full automation', 'value' => 'AI Assist, £3.99/mo', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Meross Smart Room Thermostat MTS215B, Matter, Hubless, for Combi Boilers',
                'price' => '£59.99',
                'rating' => 4.2,
                'reviews_count' => 374,
                'image' => 'https://m.media-amazon.com/images/I/61yJx+8QEXL._AC_SL1500_.jpg',
                'alt_text' => 'Meross MTS215B smart room thermostat with Matter support',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F32CMSDS?tag=ranked10-21',
                'summary' => 'A cheap way into Matter. Hubless, works with Apple Home and SmartThings, and it has the most daily schedule periods of the budget picks.',
                'body' => "For GBP 59.99 this is the least expensive thermostat here that supports Matter, and it connects straight to your WiFi with no hub, so it is a genuinely cheap route into a modern, cross-brand smart home. At 4.2 stars over 374 ratings it has the most feedback of the sub-GBP-60 options in this comparison.

It is designed for combi boilers and wet underfloor heating, and it is generous with control: up to eight programmable periods a day, real-time energy reports, open-window detection, a child lock, a dimmable screen and memory recovery after a power cut. It works with Matter, Apple HomeKit, Siri, Alexa and Google Assistant, so it fits most ecosystems.

The limits are worth naming. Meross states clearly it is for water-based systems only, not hot water cylinders, showers or electric underfloor heating, so check your setup first. And like the other value brands here, it is a newer name without a UK service line behind it — the trade you make for the price.",
                'pros' => ['Cheapest Matter thermostat in this comparison', 'Hubless, works with Apple Home, Alexa, Google and SmartThings', 'Most feedback of the sub-GBP-60 picks, 374 ratings', 'Up to eight daily periods, energy reports and child lock', 'Dimmable screen and memory recovery after a power cut'],
                'contras' => ['Water-based combi systems only, not a hot water tank', '4.2 stars, mid-pack for the price', 'Newer brand with no UK phone support', 'Not for electric underfloor heating'],
                'specs' => [
                    ['label' => 'Smart-home standard', 'value' => 'Matter, hubless', 'verdict' => 'good', 'note' => 'Cheapest Matter option here.'],
                    ['label' => 'Price', 'value' => '£59.99', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '374 at 4.2 stars', 'verdict' => 'neutral', 'note' => 'Most feedback under GBP 60.'],
                    ['label' => 'Schedule', 'value' => '8 periods a day', 'verdict' => 'good', 'note' => 'The most daily periods here.'],
                    ['label' => 'Boiler type', 'value' => 'Combi, wet underfloor', 'verdict' => 'neutral'],
                    ['label' => 'Hub needed', 'value' => 'No', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Hive Smart Thermostat for Conventional Boilers, Heating and Hot Water, Nano 3 Hub',
                'price' => '£149.00',
                'rating' => 4.5,
                'reviews_count' => 205,
                'image' => 'https://m.media-amazon.com/images/I/61gYWremIvL._AC_SL1500_.jpg',
                'alt_text' => 'Hive smart thermostat for conventional boilers with heating and hot water control',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DCGLWHHV?tag=ranked10-21',
                'summary' => 'The one to buy if you have a hot water tank. Same 4.5-star Hive kit as the combi model, but it controls heating and hot water on a conventional system.',
                'body' => "Most smart thermostats on this page control heating only, which is fine for a combi boiler but not for the many UK homes that still run a conventional or system boiler with a separate hot water cylinder. This Hive kit is the answer for those homes: it controls both heating and hot water, with independent schedules for each, and it includes the Nano 3 hub.

At 4.5 stars over 205 ratings it is the joint highest-rated thermostat in the comparison. You get up to six daily slots for heating and hot water, a boost of up to six hours, automatic frost protection, holiday mode, geolocation and voice control, all through the familiar Hive app. The touchscreen and mirrored finish look the part on a wall.

The reasons it is not higher are price and scope. At GBP 149 it costs the same as the combi Hive and far more than the value picks, and it only makes sense if you actually have a hot water tank — on a combi boiler you are paying for a hot water channel you cannot use, and a cheaper model will serve you better.",
                'pros' => ['Controls heating and hot water on a conventional system', '4.5 stars, joint highest rating in this comparison', 'Nano 3 hub included, nothing extra to buy', 'Independent schedules plus a six-hour hot water boost', 'Familiar Hive app, frost protection and holiday mode'],
                'contras' => ['GBP 149, among the most expensive here', 'Only worth it if you have a separate hot water tank', 'Wasted hot water channel on a combi boiler', '205 ratings, a smaller sample than the combi Hive'],
                'specs' => [
                    ['label' => 'Boiler type', 'value' => 'Conventional, hot water', 'verdict' => 'good', 'note' => 'The pick for a hot water tank.'],
                    ['label' => 'Customer ratings', 'value' => '205 at 4.5 stars', 'verdict' => 'good', 'note' => 'Joint highest rating here.'],
                    ['label' => 'Price', 'value' => '£149.00', 'verdict' => 'bad'],
                    ['label' => 'Hub needed', 'value' => 'No, Nano 3 included', 'verdict' => 'good'],
                    ['label' => 'Hot water boost', 'value' => 'Up to 6 hours', 'verdict' => 'good'],
                    ['label' => 'Voice control', 'value' => 'Alexa and Google', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'Hive Thermostat Mini for Combi Boilers, OpenTherm (No Hub Included)',
                'price' => '£78.99',
                'rating' => 4.3,
                'reviews_count' => 206,
                'image' => 'https://m.media-amazon.com/images/I/61j1myaGUuL._AC_SL1500_.jpg',
                'alt_text' => 'Hive Thermostat Mini for combi boilers with mirrored finish',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DCGMDPB2?tag=ranked10-21',
                'summary' => 'The cheapest way into Hive, at 4.3 stars, but only if you already own a Hive hub. The headline price does not include the hub you need for app control.',
                'body' => "The Mini is the least expensive door into the Hive system, and the small mirrored unit looks smart on a wall. At 4.3 stars over 206 ratings it is well liked, and it brings OpenTherm modulation and automatic frost protection to a combi boiler.

The catch is the one thing the title puts in capitals: no Hive hub is included. Without a hub you get manual control on the thermostat itself and nothing else — the app, remote access, schedules, boost and holiday mode all need a Hive hub you either already own or must buy separately. That is why the real cost of this pick depends entirely on your situation.

If you already have Hive kit and a hub, this is a genuinely cheap way to add smart heating control and it earns its place. If you are starting from scratch, add the price of a hub and it stops being a bargain — at that point the combi Hive above, which includes the hub, or the cheaper hubless tado and Refoss picks make more sense.",
                'pros' => ['Cheapest entry into the Hive system', 'Well rated at 4.3 stars over 206 ratings', 'OpenTherm modulation and automatic frost protection', 'Compact mirrored unit that looks good on a wall', 'A bargain if you already own a Hive hub'],
                'contras' => ['No hub included, so app control needs a hub you buy separately', 'Manual control only out of the box', 'Not a saving from scratch once a hub is added', 'Combi and heating only'],
                'specs' => [
                    ['label' => 'Hub needed', 'value' => 'Yes, not included', 'verdict' => 'bad', 'note' => 'App control needs a Hive hub you buy separately.'],
                    ['label' => 'Price', 'value' => '£78.99', 'verdict' => 'neutral', 'note' => 'Before the cost of a hub.'],
                    ['label' => 'Customer ratings', 'value' => '206 at 4.3 stars', 'verdict' => 'neutral'],
                    ['label' => 'Boiler type', 'value' => 'Combi, heating only', 'verdict' => 'neutral'],
                    ['label' => 'Efficiency', 'value' => 'OpenTherm modulation', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'BEOK Smart Thermostat for Combi Boiler, 2 Wire, Tuya/Smart Life App',
                'price' => '£42.99',
                'rating' => 4.0,
                'reviews_count' => 86,
                'image' => 'https://m.media-amazon.com/images/I/61XbacAIt4L._AC_SL1500_.jpg',
                'alt_text' => 'BEOK 2 wire smart wifi thermostat with mirror finish',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FHW6PTPM?tag=ranked10-21',
                'summary' => 'The lowest price on the page and a simple two-wire fit, but the thinnest evidence here. A budget option through the Tuya/Smart Life app.',
                'body' => "At GBP 42.99 this is the cheapest thermostat in the comparison, and its two-wire design is one of the simpler fits for a gas or combi boiler. It runs through the widely used Tuya or Smart Life apps, so it drops into the same app many people already use for other budget smart devices, with Alexa and Google voice control on top.

You get the core smart features: a daily schedule with up to six temperatures a day, a child lock, shutdown memory, frost protection and temperature compensation. It is battery powered from three AA cells, which keeps installation simple but means you replace batteries rather than wiring in power.

It is last for one reason: evidence. Eighty-six ratings at 4.0 stars is the smallest sample and the lowest average on this page, so it is an early signal rather than a settled verdict, and BEOK is a smaller name than the brands above. For a few pounds more the Refoss at second place has more than three times the ratings. Buy this only if the lowest possible price and a simple two-wire fit matter more than a large review count.",
                'pros' => ['The lowest price on the page at GBP 42.99', 'Simple two-wire fit for gas and combi boilers', 'Uses the common Tuya/Smart Life app', 'Child lock, frost protection and shutdown memory', 'Alexa and Google voice control'],
                'contras' => ['86 ratings at 4.0, the thinnest evidence and lowest average here', 'Battery powered, so you replace AA cells', 'Smaller brand than the options above', 'Refoss costs a little more with over three times the ratings'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£42.99', 'verdict' => 'good', 'note' => 'The cheapest thermostat on the page.'],
                    ['label' => 'Customer ratings', 'value' => '86 at 4.0 stars', 'verdict' => 'bad', 'note' => 'The smallest sample and lowest average here.'],
                    ['label' => 'App', 'value' => 'Tuya / Smart Life', 'verdict' => 'neutral'],
                    ['label' => 'Fit', 'value' => 'Two-wire, battery', 'verdict' => 'neutral'],
                    ['label' => 'Boiler type', 'value' => 'Combi, gas', 'verdict' => 'neutral'],
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
        $this->command?->info("SmartThermostatsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
