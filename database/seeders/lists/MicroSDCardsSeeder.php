<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class MicroSDCardsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE CARTOES MICROSD 256GB DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // FOCUS KEYWORD: best 256gb microsd cards
        // KEYWORDS SECUNDARIAS: best microsd card 256gb / 256gb microsd card /
        // best 256gb sd card / microsdxc 256gb / 256gb microsd card for android /
        // 256gb microsd card for switch / fastest 256gb microsd card /
        // 256gb microsd card for dash cam
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "tech")
        ];

        $article = [
            'slug' => 'best-256gb-microsd-cards',                                // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK" (SITE JA E UK)
            'title' => 'Best 256GB MicroSD Cards in 2026: 10 Cards Ranked and Tested', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best 256GB MicroSD Cards 2026: Top 10 Ranked & Tested', // TITLE DA ABA/GOOGLE (53 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best 256GB microSD cards on Amazon, comparing read speeds, app performance and durability for Android phones, cameras, dash cams and the Switch.', // META DESCRIPTION (158 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best 256gb microsd cards',                       // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => 'A 256GB microSD card is the sweet spot for most phones, cameras and handhelds: enough space for thousands of 4K clips and RAW photos without paying flagship prices for a 1TB card. The best 256GB microSD cards also carry A1 or A2 app-performance ratings, UHS-I U3 speed classes and read speeds well past 100MB/s, so they keep up with 4K recording and fast file transfers rather than just adding storage. We compared the top 10 best 256GB microSD cards available on Amazon on real-world speed, durability and price, from budget cards under £35 to premium picks built for 4K video and Nintendo Switch libraries.', // INTRO OTIMIZADA - FOCUS KEYWORD 2X
            'conclusion' => "Which of the best 256GB microSD cards suits you comes down to what you're recording and where the card is going. For a phone or tablet, an A1 or A2 rating matters more than raw sequential speed, since it governs how quickly apps load and update. For a 4K camera, action cam or drone, look for a V30 rating and a genuine 100MB/s-plus write speed so you never drop frames mid-recording. And if durability is the priority, every one of the best 256GB microSD cards on this list is waterproof, shockproof, temperature-resistant and X-ray-proof, so the card will usually outlast the phone or camera it's fitted to. Buy from a reputable listing, check it's genuinely rated for 256GB, and any of these will give you years of reliable storage.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-05 18:48:01', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'SanDisk Ultra 256GB microSD Card + Adapter, up to 150MB/s',               // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£34.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 175653,                                                           // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71ToeeMsOFL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'best 256gb microsd cards',                                            // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://amzn.to/3SjzSEt',                                       // LINK AFILIADO
                'summary' => "The most reviewed 256GB microSD card on Amazon by a huge margin, and one of the best 256GB microSD cards for everyday use in a phone or tablet at a genuinely affordable price.", // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "With more than 175,000 ratings, the SanDisk Ultra is not just the most reviewed 256GB microSD card on Amazon, it's one of the best 256GB microSD cards you can buy if your main use is an Android phone or tablet rather than a 4K camera. It's rated UHS-I, Class 10 and U1, with read speeds up to 150MB/s that make transferring photos and video off the card quick, without paying for write speeds a phone rarely pushes.

The A1 rating is the detail worth paying attention to: it means the card is specifically optimised for running apps directly from it, so games and apps installed to the SD card load and update faster than on a card without that certification. SanDisk's free Memory Zone app for Android also handles file management and backups from the card without needing a computer.

At £34.99 it's one of the cheapest cards on this list and by far the most proven, with a review count that dwarfs everything else here. It's a straightforward, safe choice if you just want reliable, fast-enough storage for a phone, tablet or basic camera.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Over 175,000 customer ratings, the most of any card here', 'A1-rated for faster app loading from the card', 'Cheapest card in this ranking', 'SanDisk Memory Zone app for easy file management'], // PONTOS POSITIVOS
                'contras' => ['150MB/s read speed trails the Extreme PRO and Lexar', 'No listed write speed, so less suited to demanding 4K video'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Amazon Basics microSDXC 256GB with Adapter, A2, U3, up to 100MB/s',       // NOME (ENCURTADO)
                'price' => '£49.82',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 25681,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61N69qnnvmL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Amazon Basics microSDXC 256GB with Adapter, A2, U3, up to 100MB/s',   // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4geGcWY',                                       // LINK AFILIADO
                'summary' => "An A2-rated card built for Android multitasking, backed by a real-world usable capacity guide and rugged enough for -10°C to 80°C.", // TEXTO CURTO (CARD)
                'body' => "Amazon's own card sits a step above basic storage thanks to its A2 certification, which covers not just app loading but responsive multitasking, so it holds up better than an A1 card when you're running several apps from it at once. UHS-I U3 speed class and up to 100MB/s read speeds make it capable of high-bitrate 4K recording and burst-mode photography without dropping frames.

It's built for rougher use than most cards here: Amazon rates it shock-resistant, IPX6 water-resistant, and safe from -10°C to +80°C, plus resistant to X-rays and magnetic fields, which suits it to dashcams and outdoor gear as well as a phone. It's also compatible with the original Nintendo Switch, though not the Switch 2.

One thing worth knowing before you buy: usable capacity is always a little under the labelled figure due to formatting overhead, so this 256GB card gives roughly 232GB of real-world space, a normal trait shared by every card on this list rather than something unique to Amazon Basics.", // TEXTO SEO LONGO
                'pros' => ['A2-rated for smooth multitasking, not just app loading', 'IPX6 water-resistant and rated -10°C to +80°C', 'UHS-I U3 speed class for 4K recording', 'Compatible with the original Nintendo Switch'], // PONTOS POSITIVOS
                'contras' => ['Not compatible with Nintendo Switch 2', 'Pricier than several faster-rated cards on this list'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'SanDisk 256GB Extreme PRO microSD Card + Adapter, up to 200MB/s',         // NOME (ENCURTADO)
                'price' => '£51.00',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 24571,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/615YdkNEs1L._AC_SL1000_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'SanDisk 256GB Extreme PRO microSD Card + Adapter, up to 200MB/s',     // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4xHuHxp',                                       // LINK AFILIADO
                'summary' => "The fastest card in this ranking: SanDisk's QuickFlow technology pushes read speeds to 200MB/s and write speeds to 140MB/s for anyone shooting serious 4K footage.", // TEXTO CURTO (CARD)
                'body' => "The Extreme PRO is built for people who actually need the speed a memory card can offer, not just the capacity. SanDisk's QuickFlow Technology drives read speeds up to 200MB/s, the fastest of any card in this list, so offloading a full card of 4K footage or RAW photos takes noticeably less time than on a standard UHS-I card.

Write speeds of up to 140MB/s matter just as much in practice: they're what let you shoot fast-action burst photography or 4K UHD video without the card becoming the bottleneck. It also carries an A2 rating, so app performance stays strong if you use it in a phone as well as a camera.

Like the rest of the SanDisk range here, it's shockproof, temperature-proof, waterproof and X-ray-proof, and SanDisk positions it specifically for outdoor adventures, weekend trips and sporting events where you can't afford to miss a frame while the card catches up.", // TEXTO SEO LONGO
                'pros' => ['Fastest read speed on this list at up to 200MB/s', 'Write speeds up to 140MB/s for serious 4K footage', 'A2-rated for strong app performance too', 'Shockproof, waterproof and X-ray-proof'], // PONTOS POSITIVOS
                'contras' => ['Among the pricier cards here for the capacity', 'Overkill if you only need it for a phone gallery'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Samsung EVO Select (2024) 256GB microSD Card + SD Adapter',               // NOME (ENCURTADO)
                'price' => '£70.39',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 4422,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61vtubIqy7L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung EVO Select (2024) 256GB microSD Card + SD Adapter',           // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4xqEHuI',                                       // LINK AFILIADO
                'summary' => "Samsung's 2024 EVO Select ties for the highest rating on this list, with six-way protection and enough speed for 15 hours of 4K UHD recording.", // TEXTO CURTO (CARD)
                'body' => "The 2024 EVO Select is Samsung's speed-optimised pick for smartphones and tablets, rated UHS-I U1 with read speeds up to 160MB/s, which Samsung positions specifically for 4K UHD and super slow-motion recording rather than just general storage.

256GB is enough for roughly 15 hours of 4K UHD video or around 135,000 photos, so it's built with content creators in mind as much as everyday phone storage. Samsung backs it with six-fold protection: waterproof, temperature-resistant, X-ray-proof, magnetic-resistant, fall-proof and wear-free, which is a longer list of durability claims than most rivals here list explicitly.

It ships with SD adapters for a number of different devices, so the same card works across a camera, laptop card reader or tablet without buying a separate adapter. It's the second most expensive card on this list, but it also shares the joint-highest rating with the Extreme PRO.", // TEXTO SEO LONGO
                'pros' => ['Joint-highest rating on this list at 4.7', 'Six-fold protection: waterproof, X-ray-proof, fall-proof and more', 'Up to 160MB/s read speed for 4K UHD recording', 'Ships with adapters for multiple devices'], // PONTOS POSITIVOS
                'contras' => ['Most expensive card in this ranking', 'Lower review count than the SanDisk and Integral cards'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Biwin MS100 256GB microSDXC Card, A1, V30, U3, up to 100MB/s',            // NOME (ENCURTADO)
                'price' => '£42.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 393,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/719UfP7zDHL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Biwin MS100 256GB microSDXC Card, A1, V30, U3, up to 100MB/s',        // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4fYoQMJ',                                       // LINK AFILIADO
                'summary' => "A less familiar brand backed by decades of storage manufacturing experience, with A1, V30 and U3 ratings covering phones, dash cams and security cameras alike.", // TEXTO CURTO (CARD)
                'body' => "Biwin is less of a household name than SanDisk or Samsung, but the company has been making storage and memory components for other manufacturers' devices for decades, and the MS100 is its own consumer-facing card. It's rated UHS-I U3 and V30, with read speeds up to 100MB/s aimed squarely at high-definition photo and video capture.

It's pitched as a genuine multi-device card rather than a phone-first one: Biwin lists smartphones, tablets, home security cameras and dash cams as target uses, and it's built to withstand harsh temperatures, dust, shock and X-rays for anyone using it outdoors or in a vehicle.

With fewer than 400 ratings, it has far less of a track record than the bigger brands on this list, so it's a reasonable pick if you want V30 video performance at a mid-range price, but it comes with less social proof behind it than the established names here.", // TEXTO SEO LONGO
                'pros' => ['V30 and U3 rated for reliable 4K video capture', 'Built for dash cams and security cameras, not just phones', 'Rated against harsh temperatures, dust, shock and X-rays', 'Backed by decades of storage manufacturing experience'], // PONTOS POSITIVOS
                'contras' => ['Under 400 ratings, far less proven than the big brands', 'Less recognised name than SanDisk, Samsung or Lexar'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Netac 256GB MicroSDXC Card, C10, U3, A1, V30, up to 100MB/s',             // NOME (ENCURTADO)
                'price' => '£33.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 12501,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61rjS-BsE8L._AC_SL1430_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Netac 256GB MicroSDXC Card, C10, U3, A1, V30, up to 100MB/s',         // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3Tu7fVz',                                       // LINK AFILIADO
                'summary' => "The cheapest card on this list at £33.99, with over 12,500 ratings and A1-rated app performance, though its write speed is the slowest here.", // TEXTO CURTO (CARD)
                'body' => "At £33.99 the Netac is the cheapest card in this ranking, and with over 12,500 ratings it has a solid track record for the price. It supports the UHS-I interface at speed class U1/V10, with read speeds up to 100MB/s, and carries an A1 rating good for 1,500 read IOPS and 500 write IOPS, which Netac says is enough for loading apps quickly and storing documents, photos and video.

It's built to survive rough handling: Netac lists it as shockproof, waterproof, temperature-proof and magnetic-proof, and specifically notes it will keep working after going through airport security X-ray scanners, a detail worth knowing if you travel often with a dash cam or drone.

The one figure that stands out against the rest of this list is its write speed, quoted at just 30MB/s. That's fine for everyday photos and phone storage, but it's the slowest write speed of any card here, so it's not the one to reach for if you're shooting continuous 4K footage.", // TEXTO SEO LONGO
                'pros' => ['Cheapest card in this ranking at £33.99', 'Over 12,500 customer ratings', 'A1-rated for fast app loading', 'Rated safe through airport security X-ray scanners'], // PONTOS POSITIVOS
                'contras' => ['Write speed of just 30MB/s, the slowest here', 'Not ideal for continuous 4K video recording'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Integral 256GB microSD Card Premium High Speed, U3, C10, A1',             // NOME (ENCURTADO)
                'price' => '£37.95',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 55023,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71OInoYCUfL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Integral 256GB microSD Card Premium High Speed, U3, C10, A1',         // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4fOGpP9',                                       // LINK AFILIADO
                'summary' => "The second most reviewed card on this list, backed by a brand that's sold over 50 million memory cards worldwide, with balanced 100MB/s read and 50MB/s write speeds.", // TEXTO CURTO (CARD)
                'body' => "Integral doesn't have the brand recognition of SanDisk or Samsung, but with over 55,000 ratings here and more than 50 million cards sold worldwide, it's a genuinely established name in memory cards rather than a newcomer. This card is rated UHS-I, U3 and Class 10, with up to 100MB/s read and 50MB/s write speeds, comfortably enough for seamless 4K UHD and Full HD video recording.

The A1 rating covers app performance, so it's a sensible choice for a phone or tablet where you want games and apps to load quickly from the card as well as store media. Integral also lists it as compatible with drones, action cameras and game consoles, not just phones.

It's rated water-resistant, shockproof, temperature-resistant and X-ray-proof, matching the durability claims of pricier cards on this list, and at £37.95 it undercuts most of them while carrying a stronger review count than all but the SanDisk Ultra.", // TEXTO SEO LONGO
                'pros' => ['Over 55,000 customer ratings, second only to the SanDisk Ultra', 'Over 50 million Integral cards sold worldwide', 'Balanced 100MB/s read and 50MB/s write speeds', 'Water-resistant, shockproof and X-ray-proof'], // PONTOS POSITIVOS
                'contras' => ['Less brand recognition than SanDisk or Samsung', 'Write speed trails the Extreme PRO for serious video work'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Gigastone 256GB High Endurance Pro Series microSD Card, up to 100MB/s',   // NOME (ENCURTADO)
                'price' => '£69.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 128,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/51JU7EjP4JL._AC_SL1000_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Gigastone 256GB High Endurance Pro Series microSD Card, up to 100MB/s', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4gcNgn0',                                       // LINK AFILIADO
                'summary' => "Built specifically for dash cams with named compatibility for REDTIGER, ROVE, VIOFO, Vantrue and Pruveeo, backed by a 5-year warranty.", // TEXTO CURTO (CARD)
                'body' => "Most cards on this list market themselves generically as suitable for dash cams among other devices; the Gigastone High Endurance Pro Series goes further and lists specific dash cam brands it's built to work with, including REDTIGER, ROVE, VIOFO, Vantrue, Pruveeo and Arifayz. That's a genuinely useful detail if constant overwrite-recording has chewed through cheaper cards before.

It's rated for up to 100MB/s read and 60MB/s write speeds with 4K Ultra HD recording and playback, and beyond dash cams it works as general storage for laptops, tablets, PCs, smartphones, cameras and e-readers. Gigastone rates it waterproof, shockproof, temperature-proof and X-ray-proof, the same durability checklist as the rest of this list.

The set comes with a Micro SD to SD adapter and a mini case included, and Gigastone backs it with a 5-year limited warranty. With only 128 ratings so far it's the least proven card here for its price, so it earns its place on endurance-focused specialisation rather than sheer popularity.", // TEXTO SEO LONGO
                'pros' => ['Named compatibility with popular dash cam brands', '60MB/s write speed for continuous overwrite recording', 'Includes an SD adapter and mini case', '5-year limited warranty'], // PONTOS POSITIVOS
                'contras' => ['Only 128 ratings, the least proven card here', 'One of the priciest cards on this list for the capacity'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Silicon Power 256GB Superior Pro microSDXC Card, U3, V30, A1',            // NOME (ENCURTADO)
                'price' => '£35.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.2,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 419,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71E69fqzfjL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Silicon Power 256GB Superior Pro microSDXC Card, U3, V30, A1',        // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4weeGxr',                                       // LINK AFILIADO
                'summary' => "A budget-friendly Nintendo Switch-compatible card with U3 and V30 ratings, backed by a 5-year warranty, though it has the lowest rating on this list.", // TEXTO CURTO (CARD)
                'body' => "The Superior Pro covers the same speed classes as most of the mid-range cards here, UHS Speed Class 3 and Video Speed Class 30, with quoted read and write speeds of up to 100MB/s and 80MB/s over a UHS-I interface. Silicon Power notes that speeds drop to up to 80MB/s read and 20MB/s write on devices that only support the older UHS-1 interface, so real-world performance depends partly on what you plug it into.

It's broadly compatible with smartphones, tablets, drones, action cameras and DSLRs, and Silicon Power specifically calls out Nintendo Switch compatibility as a budget-friendly way to add storage to the console. A 5-year limited manufacturer warranty backs the card.

At 4.2 it carries the lowest average rating on this list, and with only 419 ratings it's also one of the less-reviewed picks, so it's worth treating as a value option for a Switch or basic camera rather than a first choice for demanding 4K work.", // TEXTO SEO LONGO
                'pros' => ['Nintendo Switch compatible at a budget-friendly price', 'U3 and V30 rated for reliable video capture', '5-year limited manufacturer warranty', 'Broad compatibility including drones and DSLRs'], // PONTOS POSITIVOS
                'contras' => ['Lowest average rating on this list at 4.2', 'Speeds drop noticeably on older UHS-1-only devices'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Lexar Blue 256GB microSD Card, up to 160MB/s, A2, V30',                   // NOME (ENCURTADO)
                'price' => '£47.50',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 2967,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/51W2DMrDxeL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Lexar Blue 256GB microSD Card, up to 160MB/s, A2, V30',               // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4fRqW0Z',                                       // LINK AFILIADO
                'summary' => "An A2-rated card with 160MB/s read speeds and IPX7 waterproofing, well suited to gaming handhelds, drones and action cameras alike.", // TEXTO CURTO (CARD)
                'body' => "Lexar's Blue series pairs UHS-I performance with read speeds up to 160MB/s, matching the Samsung EVO Select for quick offloads of photos and video. The A2 rating adds fast, lag-free app loading on top of that raw speed, which Lexar pitches specifically at gaming consoles, tablets and portable gaming devices as well as phones.

It's built to handle Full-HD and 4K UHD video capture and playback without stutter, and Lexar lists drones, IP cameras and dash cams among its target uses alongside everyday smartphone storage. A 1.5-metre shock resistance rating, IPX7 waterproofing, temperature resistance and X-ray protection round out the durability claims.

With just under 3,000 ratings it sits in the middle of the pack for proof, more reviewed than the newer or dash-cam-focused cards here but well behind the biggest sellers. As an all-rounder that covers phones, handhelds and action cameras equally well, it's a solid closing pick for this list.", // TEXTO SEO LONGO
                'pros' => ['Up to 160MB/s read speed, matching pricier rivals', 'A2-rated for fast, lag-free app loading', 'IPX7 waterproof with 1.5m shock resistance', 'Well suited to gaming handhelds and drones alike'], // PONTOS POSITIVOS
                'contras' => ['Mid-pack review count next to the biggest sellers here', 'No standout durability or endurance claim beyond the basics'], // PONTOS NEGATIVOS
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
        $this->command?->info("MicroSDCardsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
