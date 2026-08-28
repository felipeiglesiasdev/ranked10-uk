<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class PortableFansSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE VENTILADORES PORTATEIS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // FOCUS KEYWORD: best handheld fans
        // KEYWORDS SECUNDARIAS: portable handheld / portable hand fan / neck fan amazon /
        // portable handheld fan / portable neck fan amazon / best personal fan /
        // best travel portable hand fan
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO
        ];

        $article = [
            'slug' => 'best-handheld-fans',                                      // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK" (SITE JA E UK)
            'title' => 'Best Handheld Fans in 2026: 10 Portable Picks Tested and Ranked', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Handheld Fans 2026: Top 10 Ranked & Tested',     // TITLE DA ABA/GOOGLE (47 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best handheld fans on Amazon for 2026, comparing portable neck fans, handheld turbo fans and personal fans on airflow, battery life and price.', // META DESCRIPTION (156 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best handheld fans',                             // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => 'When a British summer finally turns hot, the best handheld fans are the fastest way to cool down wherever you happen to be. They now pack turbo motors, 5000mAh batteries and LED displays into something that fits in a pocket, and most work three ways at once: as a handheld fan, as a small desk fan, and as a neck fan when you need your hands free. We compared the top 10 best handheld fans available on Amazon on airflow, battery life, noise and price, from a budget pick under £12 to a 15000mAh turbo model that also charges your phone.', // INTRO OTIMIZADA - FOCUS KEYWORD 2X
            'conclusion' => 'The best handheld fans all come down to where you will use them. For everyday carry, a 5000mAh foldable fan gives you a full day of cooling for well under £20. If you want raw power, a handheld turbo fan with 100-level speed control and a storm setting will cut through a heatwave. And if you would rather not hold anything at all, a personal fan neck design worn on a lanyard keeps you cool hands-free on the commute. Whichever of the best handheld fans you pick, look for a clear battery display, USB-C charging and enough speed settings to drop the airflow right down when you want to sleep.', // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-07-11 06:14:01', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'Jsdoin Handheld Fan, 5 Speeds, 5000mAh Foldable Desk & Neck Fan (Pink)',  // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£16.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 14911,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61QGLxrYY+L._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'best handheld fans',                                                  // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://amzn.to/4gTabEC',                                       // LINK AFILIADO
                'summary' => 'The most reviewed fan in our list by a wide margin, and one of the best handheld fans for anyone spending under £20: five helical blades, five speeds and a 5000mAh battery that runs for 8 to 15 hours, plus a removable grille that doubles as an aromatherapy holder.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => 'With close to fifteen thousand ratings, the Jsdoin is comfortably the most popular fan in this ranking, and it is one of the best handheld fans for most people looking to spend under £20. Its five helical blades are designed to mimic the air outlet of an aircraft engine, producing a strong, high-pressure stream of cool air rather than a lazy breeze. Five speeds take you from a sleeping wind up to a super-strong setting, and holding the button for three seconds switches it off.

Battery life is the reason it keeps selling. The built-in 5000mAh cell runs for 8 to 15 hours depending on the speed you choose, and it charges from any USB device, so a laptop or power bank will top it up on the move. Jsdoin claims around 20 per cent more runtime than a typical handheld fan in this class.

The clever touch is the detachable grille: twist it counter-clockwise and it comes away for cleaning, and it holds the aromatherapy tablets that come in the box, so you can add a few drops of essential oil and scent the air as you cool down. The fan folds at 90 degrees, weighs 190 grams and ships with a lanyard and a base, which means it works as a handheld fan, hangs round your neck, or sits on a desk as a small portable fan.', // TEXTO SEO LONGO
                'pros' => ['Nearly 15,000 customer ratings', 'Five speeds from sleeping wind to super strong', '5000mAh battery lasts 8-15 hours', 'Detachable grille with aromatherapy holder'], // PONTOS POSITIVOS
                'contras' => ['Only listed in pink', 'Airflow is focused rather than wide'],          // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => '3-in-1 Handheld, Neck & Desk Fan, 100-Level Turbo, 5000mAh',              // NOME (ENCURTADO)
                'price' => '£13.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 138,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61qnpwEHjxL._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => '3-in-1 Handheld, Neck & Desk Fan, 100-Level Turbo, 5000mAh',           // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4vbFRZp',                                       // LINK AFILIADO
                'summary' => 'The cheapest way into stepless speed control: a 173g 3-in-1 fan with 1-100 speeds, a 5000mAh battery and up to 12 hours of runtime.', // TEXTO CURTO (CARD)
                'body' => 'This 3-in-1 model is the most affordable route to genuinely flexible cooling. Hold it as a handheld fan, clip on the supplied lanyard to wear it as a personal fan neck style, or fold it into a mini desk fan for the tabletop. That makes it well suited to theme parks, commuting, camping, sports days and the office.

What sets it apart at this price is 1-100 stepless speed control, rather than the three or four fixed settings most budget fans offer. Five blades and a high-speed brushless motor push it to 13,500 RPM and 10m/s of airflow, yet the whole thing weighs only 173 grams with a 16cm body, so it disappears into a bag or a coat pocket.

The 5000mAh battery gives up to 12 hours on speed 1, dropping to roughly 10 hours at speed 25, 8 hours at speed 50, 6 hours at speed 75 and about 5 hours flat out at speed 100. USB-C fast charging refills it in around three hours, and a clear LED display shows both battery level and current speed. It is backed by 24 months of product support, though with only 138 ratings so far it is less proven than the big sellers here.', // TEXTO SEO LONGO
                'pros' => ['Lowest price for stepless 1-100 control', '3-in-1 handheld, neck and desk use', 'Only 173g with a 16cm body', 'USB-C full charge in about 3 hours'], // PONTOS POSITIVOS
                'contras' => ['Only 138 ratings so far', 'Runtime falls to about 5 hours at speed 100'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'Trusway Handheld Turbo Fan, 1-100 Speeds, 5000mAh, 4-in-1 (Black)',       // NOME (ENCURTADO)
                'price' => '£16.00',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 276,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61cPZV9rn1L._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Trusway Handheld Turbo Fan, 1-100 Speeds, 5000mAh, 4-in-1 (Black)',    // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4wfVwrE',                                       // LINK AFILIADO
                'summary' => 'The quietest pick here: a 4-in-1 handheld turbo fan running under 30 decibels, with 15+ hours of runtime and both fixed gears and 1-100 stepless control.', // TEXTO CURTO (CARD)
                'body' => 'The Trusway earns the highest rating in this list, and its headline trick is doing a lot of work quietly. Seven upgraded spiral blades keep it below 30 decibels while still spinning up to 10,000 RPM, delivering a cool breeze within three seconds. At 208 grams it is easy to hold for long stretches, which is what you want from a handheld turbo fan you carry all day.

Runtime is excellent. The 5000mAh battery gives more than 15 hours of continuous use depending on the speed, it accepts universal USB charging, and a full charge takes only three hours. That is enough to remove the power anxiety that comes with cheaper fans fading by mid-afternoon.

Speed control is unusually thorough. A short tap steps through six fixed gears at 1, 20, 40, 60, 80 and 100, while a long press unlocks continuous 1-100 fine tuning. It folds and adjusts through 180 degrees, and a sturdy metal clip lets it attach to a backpack or tent, giving four ways to use it: desk, handheld, neck and clip-on. The LED screen shows real-time battery and wind speed.', // TEXTO SEO LONGO
                'pros' => ['Runs below 30 decibels', 'Highest rated fan in this list', '5000mAh gives over 15 hours', '4-in-1 with metal clip and 180-degree tilt'], // PONTOS POSITIVOS
                'contras' => ['Only 276 ratings so far', 'Fixed gears jump in steps of 20 unless you long-press'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'Handheld Fan, 6000mAh, 5 Speeds, 14H Runtime, 3-in-1 Foldable',           // NOME (ENCURTADO)
                'price' => '£11.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 20,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/51reuJ2b-iL._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Handheld Fan, 6000mAh, 5 Speeds, 14H Runtime, 3-in-1 Foldable',        // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4wm4mUL',                                       // LINK AFILIADO
                'summary' => 'The largest battery for the money: a 6000mAh 3-in-1 fan under £12 that runs for up to 14 hours and charges over USB-C in three hours.', // TEXTO CURTO (CARD)
                'body' => 'If you judge a small portable fan purely on battery per pound, this one wins. For under twelve pounds you get a 6000mAh cell, the biggest of any fan in this ranking apart from the 15000mAh turbo model, and it delivers 5 to 14 hours of cooling depending on the speed you choose.

It is a genuine 3-in-1: hold it, fold it flat to stand as a desktop fan, or attach the adjustable lanyard and wear it as a neck fan. The motor spins between 3,000 and 6,000 RPM for an airflow speed of 5.5 to 7.5m/s across five levels, which is plenty for a desk or a warm bedroom, even if it will not match the turbo models further down this list.

A 5V/2A USB-C cable is supplied and a full charge takes about three hours, while the LED display keeps you informed of remaining battery and current speed so you are never guessing. The catch is that it is new: with only 20 ratings so far, there is far less long-term feedback than on the big sellers.', // TEXTO SEO LONGO
                'pros' => ['Biggest battery under £12 at 6000mAh', 'Up to 14 hours of runtime', '3-in-1 handheld, desk and neck use', 'USB-C cable included'], // PONTOS POSITIVOS
                'contras' => ['Only 20 ratings so far', 'Top speed of 6,000 RPM trails the turbo models'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'JISULIFE Handheld Turbo Fan, 16H, 4000mAh, 5 Speeds (Brown)',             // NOME (ENCURTADO)
                'price' => '£22.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 11615,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61g9VYRdAyL._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'JISULIFE Handheld Turbo Fan, 16H, 4000mAh, 5 Speeds (Brown)',          // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/44EKzUG',                                       // LINK AFILIADO
                'summary' => 'The brand-name pick: two patented vortex technologies drive a genuinely different airflow, backed by more than eleven thousand ratings.', // TEXTO CURTO (CARD)
                'body' => 'JISULIFE is the name most people think of when they think handheld turbo fan, and the Turbo Fan backs that reputation with two vortex patents, Air Turbo and Air Jet. The airflow is accelerated and compressed through an air-duct turbine, which makes the wind stronger and, JISULIFE argues, closer to a natural breeze than the flat blast of a standard fan.

Five turbo gears are cycled with a short press of the power button, running from 3,300 rpm at the low end up to 6,100 rpm at the top, with a long press at any gear to switch it off. That 6,100 rpm figure translates to 4.8m/s of wind, and the high-performance motor and optimised air duct are tuned to raise wind power while keeping noise down.

The 4000mAh battery is twice the size of a normal hand fan and gives 3 to 16 hours of cooling depending on the speed, refilling in about three hours from a wall socket, power bank, laptop or any USB port. A lanyard and an anti-slip mat on the base mean it works as a handheld fan outdoors and a small desk fan indoors. Note that unlike several rivals here it is not designed to be worn as a neck fan.', // TEXTO SEO LONGO
                'pros' => ['Two patented vortex airflow technologies', 'Over 11,000 customer ratings', '3-16 hours from a 4000mAh battery', 'Anti-slip base for desk use'], // PONTOS POSITIVOS
                'contras' => ['Handheld and desk only, not a neck fan', 'Smaller 4000mAh battery than 5000mAh rivals'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => '3-in-1 Foldable Neck & Desk Fan, 4000mAh, 14 Hrs, USB-C',                 // NOME (ENCURTADO)
                'price' => '£18.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.0,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 65,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71Pv3DsMRnL._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => '3-in-1 Foldable Neck & Desk Fan, 4000mAh, 14 Hrs, USB-C',              // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/44c6W3H',                                       // LINK AFILIADO
                'summary' => 'The best neck fan on Amazon in our list: 178g, worn on a lanyard, with a dual-layer airflow design that spreads the breeze instead of blasting one spot.', // TEXTO CURTO (CARD)
                'body' => 'If you want an amazon neck fan rather than something you have to hold, this is the one to look at. It measures just 45 x 55 x 168mm and weighs 178 grams, so it slips into a pocket, and the included lanyard turns it into a personal fan neck setup that leaves both hands free on a commute or at an outdoor event. Fold it up instead and it stands as a small desk fan.

The airflow design is what separates it from cheaper neck fans. A dual-layer arrangement pairs five 47mm high-speed blades with outer vertical grilles and inner spiral guide vanes, producing smooth, even, wide-coverage cooling rather than a narrow, harsh jet aimed at one part of your face.

Power comes from a 4000mAh battery giving 4 to 14 hours depending on the setting, with up to 14 hours on the lowest speed. An HD digital display shows the wind speed from 1 to 100, and a short press toggles between 1, 25, 50, 75 and 100 so you are not tapping endlessly. USB-C charging fills it in around 2.5 hours from a laptop, power bank or car charger. Its 4.0 average, from only 65 ratings, is the lowest score here.', // TEXTO SEO LONGO
                'pros' => ['Excellent hands-free neck fan at 178g', 'Dual-layer airflow spreads the breeze widely', 'Up to 14 hours on the lowest speed', 'Fast USB-C charge in about 2.5 hours'], // PONTOS POSITIVOS
                'contras' => ['Lowest rating here at 4.0 from 65 ratings', '4000mAh battery is smaller than 5000mAh rivals'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'Portable Handheld Turbo Fan, 15000mAh, 100 Speeds, 50H, USB-C Output',    // NOME (ENCURTADO)
                'price' => '£23.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 66,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/710aSqwP5gL._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Portable Handheld Turbo Fan, 15000mAh, 100 Speeds, 50H, USB-C Output', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4fgJf0f',                                       // LINK AFILIADO
                'summary' => 'The powerhouse: 15m/s of airflow, a huge 15000mAh battery good for up to 50 hours, and a built-in USB-C plug that charges your phone.', // TEXTO CURTO (CARD)
                'body' => 'This is the handheld turbo fan for people who want no compromises on power. A brushless motor and a turbo-focused air duct push wind speed up to 15m/s at as much as 25,000 RPM, with 100-level control so you can move from a soft breeze to a serious blast with precision. It is built for queues, outdoor events, humid commutes and hot-flush moments.

The battery is the real headline. At 15000mAh it is more than triple most rivals here, and it will run for up to 50 hours on speed 1, so you can plan a full weekend away without hunting for a socket. In practice that figure drops sharply as you climb the speed range, but even at higher settings it comfortably outlasts everything else in this ranking.

Its standout extra is a tethered Type-C plug with 5V/2A output, which means the fan doubles as a small power bank: plug in a phone or earbuds directly, with no separate cable to find, and keep the airflow running while it charges. A clear display shows speed and battery status, the body folds down for pockets and bags, it stands on a surface for hands-free breaks, and a lanyard makes it easier to carry in a crowd.', // TEXTO SEO LONGO
                'pros' => ['Enormous 15000mAh battery, up to 50 hours', 'Up to 15m/s airflow with 100-level control', 'Built-in USB-C output charges your phone', 'Folds flat and stands on a desk'], // PONTOS POSITIVOS
                'contras' => ['The 50-hour figure only applies at speed 1', 'Only 66 ratings so far'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'Funme Handheld Fan, 100 Speeds, Storm Mode, 4000mAh, 23H (White)',        // NOME (ENCURTADO)
                'price' => '£24.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 39,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61SEqBv0NLL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Funme Handheld Fan, 100 Speeds, Storm Mode, 4000mAh, 23H (White)',    // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4ykiccf',                                       // LINK AFILIADO
                'summary' => 'The nicest thing to actually use: an aluminium scroll wheel gives 100 speeds under one thumb, and a double-click unleashes a 7m/s storm mode.', // TEXTO CURTO (CARD)
                'body' => 'Most portable fans make you tap a button repeatedly. The Funme replaces that with an aluminium scroll wheel that glides from a whisper-soft breeze to powerful cooling across 100 levels, so you can land on exactly the airflow you want instead of choosing between too weak and too strong. Roll it back to zero and the fan switches off. It is designed for single-handed use, which matters when the other hand is holding a phone, a coffee or a suitcase.

Double-click the wheel and Storm mode kicks in, unleashing 7m/s of airflow to cut through sticky, humid heat in seconds, which is exactly what you want in a packed commute or a stuffy office. Worth knowing before you buy: Storm mode automatically disables once the battery drops below 30 per cent.

The 4000mAh battery covers 2.5 to 23 hours per charge depending on how hard you push it, and a precise LED display shows the remaining battery percentage and the current speed. Rated at 42 decibels, it is engineered to stay unobtrusive at lower speeds for open-plan offices, libraries or reading in bed. At 214 grams it is lighter than most water bottles, with a one-piece body, an anti-slip metal wheel and a wrist strap.', // TEXTO SEO LONGO
                'pros' => ['Aluminium scroll wheel with 100 speeds', 'Storm mode delivers 7m/s of airflow', 'Up to 23 hours from a 4000mAh battery', 'Solid one-piece build with wrist strap'], // PONTOS POSITIVOS
                'contras' => ['Storm mode cuts out below 30% battery', 'Most expensive non-misting fan here, with only 39 ratings'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'Rainberg Handheld Fan, 5000mAh, 5 Speeds, 90-Degree Adjustable (White)',  // NOME (ENCURTADO)
                'price' => '£11.69',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 384,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/51yrflVweKL._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Rainberg Handheld Fan, 5000mAh, 5 Speeds, 90-Degree Adjustable (White)', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3SKapnw',                                       // LINK AFILIADO
                'summary' => 'The cheapest fan in the list at £11.69, and still a 5000mAh three-way fan with a quiet copper motor and a head that tilts 90 degrees.', // TEXTO CURTO (CARD)
                'body' => 'At £11.69 the Rainberg is the lowest-priced pick here, yet it does not feel stripped back. A quiet copper motor drives five wind settings that run from a sleep mode up to strong circulation, and an LED display keeps you across the battery percentage and current speed, which is not a given at this price.

The 5000mAh rechargeable battery matches fans costing half as much again, providing 8 to 15 hours of continuous operation from a USB charge, with Rainberg claiming around 20 per cent longer runtime than a standard portable fan.

Its most useful trick is the 90-degree adjustable head on a stable base, which turns the fan into a desk fan or even a phone holder while you work. A neck cord is in the box for hands-free use, alongside a detachable stand, a USB cable, an instruction manual and an aromatherapy ring, and the detachable grille makes cleaning simple. As a do-everything small portable fan for the price of two coffees, it is very hard to argue with.', // TEXTO SEO LONGO
                'pros' => ['Cheapest fan in this ranking', '5000mAh gives 8-15 hours of cooling', '90-degree head doubles as a desk stand and phone holder', 'Neck cord and aromatherapy ring included'], // PONTOS POSITIVOS
                'contras' => ['Five fixed speeds, no stepless control', 'Some bundled extras may go unused'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'HandFan Portable Misting Fan, Rechargeable Water Mist Fan, Foldable',     // NOME (ENCURTADO)
                'price' => '£24.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 8631,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61lcSc09hgL._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'HandFan Portable Misting Fan, Rechargeable Water Mist Fan, Foldable',  // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4eGS2Zj',                                       // LINK AFILIADO
                'summary' => 'The only misting fan here: it sprays a fine water mist alongside the airflow, which makes it the pick for the beach, festivals and genuinely brutal heat.', // TEXTO CURTO (CARD)
                'body' => 'The HandFan does something none of the other portable fans in this list can. Alongside the airflow it sprays a fine water mist at 2.0ml per minute from a 34ml tank, giving 22 to 50 minutes of misting per fill. That evaporative cooling makes a real difference in direct sun, which is why it has racked up more than eight thousand ratings from beach, festival and travel users.

As a fan on its own it is straightforward but effective, with three motor speeds at 2,500, 3,300 and 4,200 RPM producing wind speeds of 8.2, 11 and 13.4 feet per second. The 2000mAh battery is the smallest here, delivering 3 to 10 hours of use, and it refills over Type-C in around 3.5 hours.

It folds from 8.6 inches tall down to 4.7, weighs 6.5 ounces, and comes with a 50ml water bottle, a metal clip, a USB-C cable and a hand strap. One important caveat from the manufacturer: fill it with tap water or mineral water only, never purified or distilled water.', // TEXTO SEO LONGO
                'pros' => ['Adds a cooling water mist, unique in this list', 'Over 8,600 customer ratings', 'Folds down small and clips to a bag', 'Type-C charging with a bottle and clip included'], // PONTOS POSITIVOS
                'contras' => ['Smallest battery here at 2000mAh', 'A tank of water lasts only 22-50 minutes', 'Must not be filled with purified or distilled water'], // PONTOS NEGATIVOS
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
        $this->command?->info("PortableFansSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
