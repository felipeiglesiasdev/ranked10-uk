<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class AutomaticCatFeedersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE ALIMENTADORES AUTOMATICOS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // COLETA: AMAZON.CO.UK EM 27/08/2026, ENTREGA EM M4 6BD (MANCHESTER), BUSCA "automatic cat feeder" FILTRADA A PARTIR DE £30.
        //
        // ═══ ACHADOS DA COLETA (O DIFERENCIAL DO ARTIGO) ═══
        // 1. "DUAL POWER SUPPLY" E VENDIDO COMO DESTAQUE E AS PILHAS NUNCA VEM NA CAIXA. E O UNICO RECURSO QUE IMPORTA DE VERDADE,
        //    PORQUE E O QUE ALIMENTA O GATO NUMA QUEDA DE ENERGIA COM A CASA VAZIA:
        //    SURE PETCARE (£114,99) — 4 PILHAS C, "not included" · BEMOONY (£39,99) — "Batteries are not included" ·
        //    YUPOSL (£31,99) — 3 PILHAS D, "Not Included" · FRIENHUND (£49,99) — 3 PILHAS D, "not Included" ·
        //    PETKIT CAMERA (£99,99) — 5 PILHAS AAA, "not included" · ONEISALL (£45,99) — MODO BATERIA, PILHAS NAO INCLUSAS.
        //    PILHA D E C SAO AS MAIS CARAS DO MERCADO. SO O PETLIBRO RESOLVE ISSO DE VERDADE, COM BATERIA DE LITIO INTEGRADA DE 30 DIAS.
        // 2. PRECO POR LITRO DE RESERVATORIO VARIA 5,3x:
        //    FRIENHUND 7L/£49,99 = £7,14/L · BEMOONY 5L/£39,99 = £8,00/L · ONEISALL 5L/£45,99 = £9,20/L ·
        //    YUPOSL 3L/£31,99 = £10,66/L · PETKIT WIFI 3L/£56,90 = £18,97/L · PETKIT CAMERA 3L/£99,99 = £33,33/L ·
        //    PETLIBRO 2L/£75,99 = £38,00/L.
        // 3. CONTRADICOES DE FICHA:
        //    BEMOONY: O TITULO DIZ "5L Food Dispenser" E O BULLET 4 DIZ "3L Capacity".
        //    CAT MATE 3-MEAL: O TITULO DIZ "170g per Bowl" E O BULLET 4 DIZ "400 g capacity".
        // 4. A BUSCA MISTURA TRES PRODUTOS QUE RESOLVEM PROBLEMAS DIFERENTES: DISPENSER DE RACAO SECA COM ROSCA (PETKIT, PETLIBRO,
        //    ONEISALL, FRIENHUND, BEMOONY, YUPOSL), BANDEJA GIRATORIA PARA COMIDA UMIDA COM GELO (CAT MATE) E ALIMENTADOR COM
        //    LEITOR DE MICROCHIP QUE SO ABRE PARA O GATO CERTO (SURE PETCARE). NAO SAO INTERCAMBIAVEIS.
        // 5. O PETKIT CAMERA E O UNICO QUE CONVERTE LITROS EM QUILOS: 3L = ~1,33kg DE RACAO. SERVE DE REGRA PARA TODA A LISTA,
        //    ~0,44kg POR LITRO — UTIL PORQUE TODOS ANUNCIAM VOLUME E NINGUEM ANUNCIA PESO.
        // 6. TAMANHO DE GRAO: O PETLIBRO ESPECIFICA "2-15mm Dry Kibble". E O UNICO QUE DIZ QUAL RACAO CABE, E ENTUPIMENTO DE ROSCA
        //    E A FALHA MAIS COMUM DA CATEGORIA.
        // 7. O CAT MATE 5-MEAL APARECE EM TRES ASINS: B01AUYLVU8 £39,99 (11.289 AVALIACOES), B0CRDX4NR2 £39,99 (132) E
        //    B0CRDVCCWG £54,99 (22). MESMO PRODUTO, £15 DE DIFERENCA. USADO O DE AMOSTRA MAIOR.
        //
        // ═══ CRITERIO DE CORTE ═══
        // TODOS OS 10 TEM 2.000+ AVALIACOES. EXCLUIDOS OS DE AMOSTRA FINA: B0FXLKYG7S (27), B0G8DPF7SC (22), B0H2V6LVB2 (15),
        // B0F674MDX2 (14), B0FBGHL78Y (33), B0GTXR1GZJ (156), B0GTXQXQX8 (151).
        //
        // ═══ VARIACOES DE PALAVRA-CHAVE TRABALHADAS NO TEXTO ═══
        // best automatic cat feeder · best automatic cat feeder on amazon · automatic pet feeder · cat food dispenser ·
        // timed cat feeder · automatic feeder for 2 cats · wifi cat feeder · automatic cat feeder with camera ·
        // microchip pet feeder · automatic cat feeder wet food
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'pet-supplies',                // SLUG DA CATEGORIA (URL)
            'name' => 'Pet Supplies',                // NOME EXIBIDO
            'description' => 'Everything your furry friends need, ranked by quality, comfort and value.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-automatic-cat-feeder',                                // SLUG DO ARTIGO (URL) = PALAVRA-CHAVE EM formato-url
            'title' => 'Best Automatic Cat Feeder 2026: 10 Ranked on Power Backup', // TITULO / H1 — CONTEM A PALAVRA-CHAVE
            'meta_title' => 'Best Automatic Cat Feeder 2026: Top 10 Ranked',       // TITLE DA ABA/GOOGLE (49 CHARS)
            'meta_description' => 'We ranked the best automatic cat feeder options on power backup, hopper size and portion accuracy. Six advertise battery backup and ship without batteries.', // META DESCRIPTION (~154 CHARS)
            'focus_keyword' => 'best automatic cat feeder',                       // PALAVRA-CHAVE PRINCIPAL — VIRA O ALT DO HERO
            'hero_image' => '',                                                   // SEM HERO MANUAL: A VIEW USA A FOTO DO PRODUTO #1 COMO IMAGEM SOCIAL
            'intro' => 'There is only one thing an automatic cat feeder absolutely has to do, and it is not send you a notification. It has to feed your cat while you are not there, including on the evening the power goes out. Almost every listing in this category understands that, which is why "dual power supply" and "battery backup during power cuts" appear near the top of the bullet points. What appears near the bottom, in every single case we checked, is that the batteries are not included. Six of the ten feeders in this guide advertise power-cut protection and none of them ships with the cells that provide it, and several want D or C batteries, the most expensive sizes on the shelf. Only one feeder here sidesteps the problem entirely with a built-in rechargeable battery, and it happens to be the smallest and most expensive per litre. So we ranked the best automatic cat feeder options on what keeps a cat fed: how the thing is powered, how much food the hopper really holds, how accurately it portions, and whether it can handle the food you actually buy.', // INTRO OTIMIZADA
            'conclusion' => 'The best automatic cat feeder for most homes is a 5L dry food dispenser with a mains adapter, a battery backup slot and no app requirement, because that combination fails in the fewest ways. Before you order, do three things. Buy the backup batteries at the same time, because the listing will not include them and a feeder with an empty battery compartment is just a bowl during a power cut. Check the food type, since a dry food auger cannot serve wet food and a wet food tray cannot hold a week of kibble, and the search results mix both freely. And translate the hopper volume into weight: roughly 0.44kg of kibble per litre, so a 3L feeder holds about 1.3kg, which is around two weeks for one adult cat. Beyond that, a camera is a comfort for you rather than a feature for the cat, and a microchip feeder is the only thing on this page that solves food stealing in a multi-cat house.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                        // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-27 17:00:00',                              // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'oneisall 5L Automatic Cat Feeder with Timer for 2 Cats',                   // NOME
                'price' => '£45.99',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA (MAIOR DA LISTA)
                'reviews_count' => 3553,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/718H01hvu3L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'oneisall 5L automatic cat feeder with two stainless steel bowls',      // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C5X2G933?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The best rated feeder here at 4.6 from 3,553 ratings, splitting 5L across two stainless bowls for two cats, and the only listing that states its portion size in grams.', // TEXTO CURTO DO CARD
                'body' => 'This wins because it answers the two questions that matter most in a multi-cat house and answers them precisely. It splits one 5L hopper into two separate stainless steel bowls, so the fast eater cannot stand over the slow one, and it states its portion size as approximately 7g rather than leaving you to guess. Every other feeder in this guide counts portions without telling you what a portion weighs, which makes it impossible to plan a daily ration.

Everything else is sensibly plain. Six meals a day with one to 36 portions each gives genuinely fine control over a cat on a diet. The stainless bowls go in the dishwasher and avoid the chin irritation that plastic bowls cause. There is a triple freshness setup of safety lock, desiccant and sealing rotor, and the knob interface means no app, no account and no WiFi outage to worry about. At 5L for £45.99 it works out at £9.20 per litre, mid-table for value.

It supports mains and battery power, and like everything else here the batteries are not in the box, so add a set to your order. The 4.6 average is the highest of any feeder in this guide with a meaningful sample, which for a device that has to work unattended for a fortnight is the number we weight most heavily.',
                'pros' => ['4.6 from 3,553 ratings, the best score of the large samples here', 'Two separate stainless bowls fed from one 5L hopper', 'States its portion size in grams, unlike anything else here', 'Six meals a day with 1 to 36 portions each', 'Knob control, so no app or WiFi dependency'],
                'contras' => ['Backup batteries not included', 'Dry food only, like every hopper feeder here', 'No app means no remote feeding or logs', 'Two bowls sit close together on one unit'],
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'Sure Petcare SureFeed Microchip Pet Feeder with Sealed Lid',               // NOME
                'price' => '£114.99',                                                                // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 12984,                                                            // Nº DE AVALIACOES (MAIOR AMOSTRA DA BUSCA INTEIRA)
                'image' => 'https://m.media-amazon.com/images/I/61j3BDpQH4L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Sure Petcare SureFeed microchip pet feeder with sealed lid in white',  // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00O0UIPTY?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A different machine entirely: the lid opens only for the microchipped cat it recognises. With 12,984 ratings, it is the only answer here to food stealing and prescription diets.', // TEXTO CURTO DO CARD
                'body' => 'This is not a timer, and that is the point. The SureFeed reads your cat microchip and opens the lid only for the animal it recognises, storing up to 32 pet identities. If one cat is on a prescription or weight-control diet and another treats their bowl as a buffet, no scheduled feeder on this page solves that and this one does. It works with common identification chips and includes an RFID collar tag for cats that are not chipped.

The second thing it does that the hopper feeders cannot is wet food. The sealed lid keeps a bowl of wet food fresh and covered between visits, keeps flies off it and keeps the smell in, which is the difference between leaving wet food out and simply not being able to. With 12,984 ratings at 4.4 it also carries by far the deepest evidence in this search, and a three-year warranty behind it.

It runs entirely on batteries, four C cells, quoted at up to six months, and true to form for this category they are not included. On the other hand a feeder with no mains lead has no power cut to survive, so the battery dependency is a design choice rather than an oversight. Note that it holds one meal at a time, so it does not feed a cat for a week while you are away.',
                'pros' => ['Opens only for the microchipped cat it recognises, up to 32 IDs', 'Works with wet food, which no hopper feeder here does', '12,984 ratings, the largest sample in the category', 'Three-year warranty, the longest here', 'RFID collar tag included for unchipped cats'],
                'contras' => ['Four C cell batteries not included', 'Holds one meal, so it cannot feed a cat for a week alone', 'No timer, so it does not schedule meals', '£114.99, the second most expensive here'],
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'Cat Mate 5-Meal Automatic Pet Feeder, 330g per Bowl',                      // NOME
                'price' => '£39.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 11289,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71yk55raAML._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Cat Mate 5-meal automatic pet feeder with rotating tray and ice packs', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01AUYLVU8?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The wet food answer, with 11,289 ratings behind it: five sealed compartments of 330g each, twin ice packs, a digital timer and no app or WiFi anywhere near it.', // TEXTO CURTO DO CARD
                'body' => 'If your cat eats wet food, most of this page is irrelevant to you and this is where to start. A rotating tray holds five separate 330g compartments, each sealed until its scheduled time, with two ice packs underneath to keep them cool through the day. That covers a long working day comfortably and a weekend away at a push, which is exactly the gap a wet food owner needs to fill.

The design philosophy is refreshingly old fashioned. There is a digital timer with button controls, no app, no account, no WiFi and nothing to reconnect after a router reboot. For a device whose entire job is to be reliable while you are absent, removing the internet from the failure list is a feature rather than a limitation, and 11,289 ratings at 4.4 suggest it holds up. The tray and lid are dishwasher safe and BPA free, and the lid is tamper resistant against a determined paw.

Two things to check before ordering. It is battery operated, and as with everything here you should assume you are buying the batteries separately. And Cat Mate lists this same 5-meal feeder under at least three ASINs, at £39.99 with 11,289 ratings, £39.99 with 132, and £54.99 with 22. They are the same feeder in different colours, so buy the one with the evidence behind it and do not pay the extra £15.',
                'pros' => ['Five sealed 330g compartments, ideal for wet food', 'Twin ice packs included to keep meals cool', 'No app or WiFi, so nothing to reconnect', '11,289 ratings at 4.4', 'Dishwasher-safe BPA-free tray and lid'],
                'contras' => ['Batteries not included', 'Five meals is the hard limit, so no week-long trips', 'Sold under three ASINs, one of them £15 dearer', 'Ice packs need refreezing between uses'],
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'Frienhund 7L Automatic Cat Feeder for 2 Cats with App Control',            // NOME
                'price' => '£49.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 3848,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61nnRAlwZZL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Frienhund 7L automatic cat feeder with two bowls and app control',     // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F53Y6CVJ?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The biggest hopper here at 7L and the best value per litre at £7.14, feeding two bowls placed 47.5cm apart, with dual-band WiFi and Alexa support.', // TEXTO CURTO DO CARD
                'body' => 'On raw capacity for money nothing here comes close. Seven litres holds roughly 2.55kg of kibble, which is weeks of food for one cat or a comfortable fortnight for two, and at £49.99 that works out at £7.14 per litre against £38.00 for the PETLIBRO at the bottom of this list. If the point of a cat food dispenser is not refilling it constantly, this is the one that delivers.

The two-bowl setup is thought through rather than bolted on. The bowls sit 47.5cm apart on separate leads, so each cat eats in its own space instead of shoulder to shoulder, and there is a slow feeding mode that spreads a portion out for cats that bolt their food and bring it back up. Dual-band WiFi covering both 2.4GHz and 5GHz is genuinely useful, since most budget feeders are 2.4GHz only and will not see a modern router without splitting the bands. Alexa support handles hands-free treats.

The usual caveat applies and it applies twice over here. The DC 5V adapter runs it day to day, and the backup is three D cell batteries, which are the priciest size and, as ever, not included. Buy them with the feeder. The one-year warranty is shorter than the Sure Petcare three-year, and thirty meals a day is far more scheduling than any cat needs.',
                'pros' => ['7L hopper, the largest here, at £7.14 per litre', 'Two bowls placed 47.5cm apart on separate leads', 'Dual-band WiFi, both 2.4GHz and 5GHz', 'Slow feeding mode for cats that bolt their food', 'Alexa support and 3,848 ratings at 4.4'],
                'contras' => ['Three D cell batteries for backup, not included', 'One-year warranty only', 'Needs the Smart Life app and an account', 'Dry food only'],
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'Yuposl 3L Automatic Cat Feeder with Timer and Anti-Jam',                   // NOME
                'price' => '£31.99',                                                                 // PRECO NA COLETA (O MAIS BARATO DA LISTA)
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 4395,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61Cd4fnesYL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Yuposl 3L automatic cat feeder with LCD timer and stainless bowl',     // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F93L6WRN?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest feeder here at £31.99, and the one with the longest battery figure: 180 days on three D cells, with an LCD timer and no WiFi to fall over.', // TEXTO CURTO DO CARD
                'body' => 'At £31.99 this is the least you can spend on a timed cat feeder with a real review sample behind it, and what you give up is mostly connectivity you may not want. There is no WiFi and no phone pairing. You set one to six meals a day on an LCD screen with buttons, and that is the whole interaction. For a device that has to work while you are on a plane, fewer moving parts is an argument in its favour.

Battery life is the standout number. Three D-size alkaline cells are quoted at more than 180 days, the longest figure in this guide, and because it can run on batteries alone you can put it anywhere in the house rather than near a socket. The catch is the one this whole guide is about: the batteries are not included, and three D cells will add several pounds to a £31.99 purchase.

The 3L hopper holds around 1.3kg of kibble, roughly ten days for one cat, and the spring-lock lid plus silicone sealing rotor are aimed squarely at cats that have learned to headbutt a feeder. Anti-jam is claimed rather than specified, which matters because auger jams are the most common failure in this category, and unlike the PETLIBRO this listing does not tell you what kibble sizes it accepts.',
                'pros' => ['£31.99, the cheapest feeder in this guide', 'Over 180 days on three D cells, the longest battery claim here', 'No WiFi or app needed, so nothing to reconnect', 'Spring-lock lid and silicone sealing rotor against tampering', '4,395 ratings at 4.4'],
                'contras' => ['Three D cell batteries not included', '3L holds only about 1.3kg, some ten days for one cat', 'No kibble size range given, so jamming is a risk', 'No app, so no remote feeding or logs'],
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'PETKIT YUMSHARE SOLO Automatic Cat Feeder with 1080P Camera',              // NOME
                'price' => '£99.99',                                                                 // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 2032,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61Rc8NJi3xL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'PETKIT YUMSHARE SOLO automatic cat feeder with 1080p camera and bowl', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CCXXTX2K?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A 1080p camera with night vision, two-way audio and AI pet tracking on a 3L feeder. It is also the only listing here that converts its litres into kilograms.', // TEXTO CURTO DO CARD
                'body' => 'If being away from the cat is the part you find hard, this is the feeder that addresses it. A 1080p camera with a 140 degree lens and night vision streams free live video, AI tracking follows the cat around the frame, and two-way audio lets you talk to them. You can record a 20 second meal call that plays at feeding time, which sounds silly until you have used it to get a nervous cat to eat while you are away.

It is also the most honest listing in the guide on capacity. PETKIT states that its 3L hopper holds about 1.33kg of food and lasts an adult cat roughly half a month. Nobody else does this arithmetic, and it gives you the conversion for the whole category: about 0.44kg of kibble per litre. Apply that to the 7L Frienhund and you get 2.5kg or so; apply it to the 2L PETLIBRO and you get under a kilo.

The costs are the price and the backup. At £99.99 for 3L it works out at £33.33 per litre, nearly five times the Frienhund, and the camera is the entire reason for that gap. The power backup is five AAA batteries, not included, which is at least a cheaper size than the D cells elsewhere. Portion control is 1 to 5 portions per meal, coarser than the oneisall at number one.',
                'pros' => ['1080p camera with night vision and 140 degree lens', 'Two-way audio and a 20 second recorded meal call', 'States its capacity in kilograms, not just litres', 'Anti-blockage dispensing with a triple fresh-lock system', '4.5 from 2,032 ratings'],
                'contras' => ['Five AAA backup batteries not included', '£33.33 per litre, nearly five times the Frienhund', 'Only 1 to 5 portions per meal', 'Indoor use and dry food only'],
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'BEMOONY Automatic Cat and Dog Feeder, 5L Dual Power',                      // NOME
                'price' => '£39.99',                                                                 // PRECO NA COLETA
                'rating' => 4.2,                                                                     // NOTA
                'reviews_count' => 6140,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/610R+SRZaoL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'BEMOONY 5L automatic cat and dog feeder with double lock lid',         // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CNXCD1W6?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Good value at £8.00 per litre with a double-lock lid and a 10 second voice recording. Its own title says 5L while its own fourth bullet says 3L.', // TEXTO CURTO DO CARD
                'body' => 'With 6,140 ratings this is one of the better evidenced budget feeders, and the hardware choices are sensible. A double-lock lid resists a cat that has worked out where the food lives, a ten second voice recording calls them to the bowl, and dual power means it keeps running through a cut. At £39.99 for a 5L hopper that is £8.00 per litre, the second best value in this guide.

Except the capacity is in dispute with itself. The product title sells a 5L Food Dispenser. The fourth bullet point, on the same page, says 3L Capacity and that this will provide food for fifteen days. Those are not the same feeder. Using the conversion from the PETKIT listing, 5L holds roughly 2.2kg and 3L holds roughly 1.3kg, so the difference is about a week of food for one cat. There is no way to tell from the page which figure describes what arrives.

The listing is also written entirely from the cat point of view, in the voice of a pet describing what mum does, which is a stylistic choice rather than a fault but does mean the actual specifications are thin on the ground. Backup batteries are, inevitably, not included. At 4.2 it holds one of the lower scores here, though from a big enough sample to be believed.',
                'pros' => ['£8.00 per litre, second best value in this guide', 'Double-lock lid against determined cats', 'Ten second voice recording plays at mealtimes', 'Dual power supply with battery backup', '6,140 ratings behind it'],
                'contras' => ['Title says 5L while the fourth bullet says 3L', 'Backup batteries not included', 'Listing written in the voice of the cat, with few real specs', '4.2 rating, among the lower scores here'],
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'PETKIT FreshElement Solo 3L WiFi Automatic Cat Feeder',                    // NOME
                'price' => '£56.90',                                                                 // PRECO NA COLETA
                'rating' => 4.1,                                                                     // NOTA
                'reviews_count' => 3730,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61t50Zo3tHL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'PETKIT FreshElement Solo WiFi automatic cat feeder with steel bowl',   // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B4DVJHF5?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Designed around the British damp, with an airtight tank, sealing ring and desiccant box, plus an anti-clog chute. At £18.97 per litre it is dear for 3L, and it rates 4.1.', // TEXTO CURTO DO CARD
                'body' => 'PETKIT makes a point that nobody else in this search bothers with, which is that the UK is humid and kibble goes soft. The response is an airtight storage container, an enhanced sealing ring, an enclosed food outlet and a built-in desiccant box. Anyone who has tipped a week-old hopper of chewy biscuits into the bin will recognise the problem, and the sealing here is the most thorough on this page.

The anti-clog work is the other sensible engineering. A widened food chute and an upgraded dispensing system target the auger jam, which is the single most common way these feeders fail and the reason a cat comes home to an empty bowl. The 304 stainless steel bowl avoids the plastic-related chin irritation that catches out a lot of cats, and app scheduling covers remote feeding.

Two things hold it back. At £56.90 for 3L this is £18.97 per litre, more than twice the Frienhund, and you are paying for sealing and app control rather than capacity. And it holds 4.1 from 3,730 ratings, the joint lowest score in this guide from a sample large enough to take seriously. The feeder is well thought out on paper; the feedback suggests execution is less consistent than the design.',
                'pros' => ['Airtight tank, sealing ring and desiccant box for damp climates', 'Widened anti-clog chute targeting auger jams', '304 stainless steel bowl to avoid chin irritation', 'Battery backup for power cuts', 'App scheduling and remote feeding'],
                'contras' => ['4.1 from 3,730 ratings, joint lowest score here', '£18.97 per litre, more than twice the Frienhund', 'Backup batteries not included', 'Only 3L, around ten days for one cat'],
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'Cat Mate 3-Meal Automatic Pet Feeder, 170g per Bowl',                      // NOME
                'price' => '£34.99',                                                                 // PRECO NA COLETA
                'rating' => 4.2,                                                                     // NOTA
                'reviews_count' => 4778,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71ba9WTZbxL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Cat Mate 3-meal automatic pet feeder with rotating tray and ice pack', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01MXDFB28?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The smaller Cat Mate, with three compartments instead of five for £5 less. Its title says 170g per bowl and its fourth bullet says a 400g capacity.', // TEXTO CURTO DO CARD
                'body' => 'Everything good about the Cat Mate 5-Meal at number three applies here in miniature: a digital timer with no app or WiFi, wet or dry food, an ice pack to keep meals cool, dishwasher safe parts, and 4,778 ratings behind it. If your cat needs two or three meals across a working day rather than five across a weekend, the smaller tray takes up noticeably less floor space.

The arithmetic on the page does not work, though. The product title advertises 170g per bowl, so three bowls would be 510g in total. The fourth bullet says the feeder has a 400 g capacity and that this supports generous meal portions. Those two numbers cannot both describe the same tray, and for anyone weighing out a cat daily ration, that is exactly the figure they need to be sure of.

The value question is the other one. At £34.99 for three meals against £39.99 for five, the bigger model costs £5 more and gives you two extra compartments plus a second ice pack. Unless space is genuinely tight, the 5-Meal is the better buy, which is why this sits at nine. Batteries, as everywhere in this guide, are your problem rather than the manufacturer.',
                'pros' => ['Digital timer with no app or WiFi requirement', 'Takes wet or dry food, unlike the hopper feeders', 'Ice pack included to keep meals cool', 'Compact tray for tight spaces', '4,778 ratings at 4.2'],
                'contras' => ['Title says 170g per bowl, the bullets say 400g capacity', 'Only £5 cheaper than the 5-Meal version', 'Three meals is a short window for time away', 'Batteries not included'],
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'PETLIBRO Air Cordless WiFi Automatic Cat Feeder, 2L',                      // NOME
                'price' => '£75.99',                                                                 // PRECO NA COLETA
                'rating' => 4.1,                                                                     // NOTA (MENOR DA LISTA)
                'reviews_count' => 7934,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61lZR6uYSpL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'PETLIBRO Air cordless wifi automatic cat feeder in white, 2 litre',   // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CHRFDZWZ?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only feeder here that actually solves the battery problem, with a built-in 30-day lithium cell and no cord at all. It is also 2L for £75.99, the worst value per litre in the guide.', // TEXTO CURTO DO CARD
                'body' => 'Give PETLIBRO credit for the thing this whole guide is about. Every other feeder here advertises battery backup and then leaves you to buy the batteries. This one has a rechargeable lithium cell built in, quoted at 30 days, charges over USB-C and runs with no cord attached at all. There is no power cut to survive because there is no mains dependency, and low battery and low food alerts push to your phone before either becomes a problem. It is the correct answer to the category weakness.

It is also the only listing here that tells you what kibble it accepts, 2mm to 15mm, which is the specification that determines whether your particular food jams the auger. Given that jamming is the commonest failure mode in this category, publishing that range is more useful than any app feature, and nobody else does it.

Then the numbers turn. The hopper is 2L, which by the PETKIT conversion is under a kilo of food, so roughly a week for one cat before a refill. At £75.99 that is £38.00 per litre, more than five times the Frienhund at number four. And it holds 4.1 from 7,934 ratings, the joint lowest score in this guide from the second largest sample, which is a real signal rather than noise. Good idea, right diagnosis, and the least food per pound on this page.',
                'pros' => ['Built-in 30-day rechargeable battery, so no batteries to buy', 'Genuinely cordless, with USB-C charging', 'States its kibble size range, 2mm to 15mm', 'Low battery and low food alerts to your phone', 'Up to 10 meals a day with 5-user family sharing'],
                'contras' => ['4.1 from 7,934 ratings, joint lowest score here', '£38.00 per litre, more than five times the Frienhund', 'Only 2L, under a kilo of food, about a week for one cat', 'Needs the PETLIBRO app and an account'],
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
