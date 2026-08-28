<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class Smart4kProjectorSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE PROJETORES SMART 4K DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // FOCUS KEYWORD: smart 4k projector
        // KEYWORDS SECUNDARIAS: 4k mini projector / smart tv projector 4k
        //
        // NOTA EDITORIAL IMPORTANTE: NENHUM PRODUTO DESTA LISTA E 4K NATIVO.
        // TODOS SAO 1080P NATIVO COM "4K SUPPORT" (DECODIFICAM 4K E EXIBEM EM 1080P).
        // VARIAS LISTAGENS ADMITEM ISSO NA PROPRIA DESCRICAO. O TEXTO EXPLICA A DIFERENCA
        // EM VEZ DE REPETIR "4K" COMO SE FOSSE RESOLUCAO REAL.
        // BRILHO: SO ANSI LUMENS E COMPARAVEL. ALEGACOES DE 30000/38000 "LUMENS" SAO INFLADAS.
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MESMO TEXTO JA CADASTRADO)
        ];

        $article = [
            'slug' => 'best-smart-4k-projector',                                 // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK" (SITE JA E UK)
            'title' => 'Best Smart 4K Projector in 2026: 10 Ranked, and What 4K Really Means', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Smart 4K Projector 2026: Top 10 Ranked & Tested', // TITLE DA ABA/GOOGLE (52 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best smart 4K projector options on Amazon by real ANSI brightness, comparing built-in Google TV, auto focus and what 4K support actually means.', // META DESCRIPTION (157 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'smart 4k projector',                             // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Before you spend a penny, there is one thing worth knowing about every smart 4K projector in this price range, including all ten here: none of them are native 4K. They are native 1080p panels that accept and decode a 4K signal, then display it at 1080p, which the industry calls \"4K supported\". Several of the listings below admit this in their own small print. That does not make them bad, and a good 1080p projector on a 100-inch wall looks superb, but it does mean the number to compare is brightness, not resolution. The second thing to know is that brightness claims of \"30,000 lumens\" are marketing, and only ANSI lumens is a measured, comparable standard. We ranked the top 10 smart 4K projector options on Amazon by the specifications that actually differ: real ANSI brightness, which streaming system is built in, and whether Netflix is properly licensed or bolted on.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + ENQUADRAMENTO HONESTO
            'conclusion' => "Choosing a smart 4K projector comes down to three honest questions. First, how dark is the room: under about 1,000 ANSI lumens you are committed to watching after dark with the curtains shut, while 2,000 ANSI and up starts to cope with a dim living room in the evening. Second, which streaming system do you want, because an official Google TV projector gets properly licensed Netflix, Disney+ and Prime Video with a system that keeps getting updates, while a generic Android build can lose app support over time. Third, ignore the resolution badge entirely, since every projector at this price is 1080p native and the picture difference between them comes from brightness, contrast and lens quality instead. Get those right and any smart 4K projector on this list will give you a genuinely cinematic 100-inch picture for a fraction of what an equivalent TV costs.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-06 22:54:25', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'WiMiUS P62 PRO Smart Projector, 1400 ANSI, Native 1080p, WiFi 6, 36W Dolby Audio', // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£209.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 6282,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/81IdYIIyiAL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'smart 4k projector',                                                  // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://amzn.to/4gicEHS',                                       // LINK AFILIADO
                'summary' => "The most reviewed smart 4K projector on this list by a mile, with 6,282 ratings, licensed Netflix and a genuine 1400 ANSI lumens behind the marketing figures.", // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "With 6,282 ratings behind a 4.7 average, the WiMiUS P62 PRO has more review evidence than the rest of this list combined, and it is the smart 4K projector to pick if you want the safest bet rather than the brightest or cheapest.

The licensing matters more than it sounds. WiMiUS states the projector is officially licensed for its streaming apps, so Netflix runs properly rather than hitting the HDCP black-screen problem that plagues projectors running unofficial app builds. Prime Video and YouTube are built in alongside an app store and browser, so no Fire Stick is needed. Audio is a genuine strength too, with 36W speakers, Dolby Audio and HDMI ARC for lossless passthrough to a soundbar.

On brightness, read the listing carefully. It quotes both \"38000 Lumen\" and \"true 1400 ANSI lumens\" in the same breath, and only the second figure means anything: 1400 ANSI is solidly mid-pack here, fine for a dark room or evening viewing but not a daylight projector. Resolution is native 1080p with 4K decoding, which WiMiUS concedes directly with the note that 4K support implies 1080p display of 4K content. Auto focus, auto keystone, obstacle avoidance and auto screen fit all work from any angle, and WiFi 6 with two-way Bluetooth 5.2 rounds it off. A 3-year repair guarantee is included.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['6,282 ratings, by far the most on this list', 'Officially licensed apps, so Netflix works without black screens', '36W speakers with Dolby Audio and HDMI ARC', '3-year repair guarantee with lifetime technical support'], // PONTOS POSITIVOS
                'contras' => ['Native 1080p, not true 4K, as the listing itself concedes', 'The 38,000 lumen figure is marketing; the real number is 1400 ANSI'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Android 14 Smart Mini Projector, Native 1080p, 300 ANSI, WiFi 6, Under 30dB', // NOME (ENCURTADO)
                'price' => '£89.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.9,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 132,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71pFrdjqiWL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Android 14 Smart Mini Projector, Native 1080p, 300 ANSI, WiFi 6, Under 30dB', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4hkKHQP',                                       // LINK AFILIADO
                'summary' => "The cheapest 4K mini projector here at £89.99 and the quietest at under 30dB, but at 300 ANSI lumens it is strictly a lights-off, after-dark machine.", // TEXTO CURTO (CARD)
                'body' => "At £89.99 this is the cheapest way onto this list, and it is a genuinely capable little unit for the money: native 1080p with 4K decoding, Android 14 with its own app store, WiFi 6 and Bluetooth 5.2, automatic 4-point keystone and a 360-degree adjustable bracket for projecting onto walls, ceilings or the inside of a tent.

Its quietest-in-class fan is a real advantage that spec sheets usually bury. At under 30dB it is far less intrusive during quiet dialogue scenes than most budget projectors, which typically sit closer to 40dB and become the loudest thing in the room between explosions.

The catch is brightness, and it is a big one. At 300 ANSI lumens this is one of the dimmest units here, and the manufacturer is upfront about it, recommending use at night or in dim surroundings. That is honest, but it means blackout curtains are not optional and daytime viewing is off the table. Running Android 14 rather than official Google TV also means Netflix and Disney+ support depends on unofficial app builds, which can break with updates. As a bedroom-ceiling or camping 4k mini projector for under £90 it makes sense; as a main living-room screen it does not.", // TEXTO SEO LONGO
                'pros' => ['Cheapest projector on this list at £89.99', 'Quietest here at under 30dB', 'Android 14 with its own app store and WiFi 6', '360-degree bracket for wall, ceiling or tent'], // PONTOS POSITIVOS
                'contras' => ['Only 300 ANSI lumens, so needs a fully darkened room', 'Generic Android rather than licensed Google TV, so app support can break'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'AMEELA Smart Projector, Netflix Included, Auto Focus, Dolby Audio, WiFi 6', // NOME (ENCURTADO)
                'price' => '£129.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 478,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61ZPMzdlCwL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'AMEELA Smart Projector, Netflix Included, Auto Focus, Dolby Audio, WiFi 6', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4hjQC8Q',                                       // LINK AFILIADO
                'summary' => "Licensed Netflix and a 200-inch maximum image for £129.99, with 478 ratings behind it, though the listing never states an ANSI brightness figure.", // TEXTO CURTO (CARD)
                'body' => "The AMEELA sits in the sweet spot between the £90 budget units and the £250-plus Google TV models, and its main draw is a proper built-in app store with Netflix, Prime Video and YouTube included as licensed apps, so there is no copyright workaround or TV stick needed. With 478 ratings behind a 4.5 average it has a reasonable track record.

The automatic setup is thorough for the price, combining auto focus, auto keystone, obstacle avoidance and screen alignment using displacement gyroscope technology, all resolving in a few seconds. The 120-degree hovering stand with 360-degree horizontal rotation is more flexible than a fixed body, and it will throw up to a 200-inch image with 50% to 100% zoom. Glass lenses rather than plastic help with edge sharpness. Dolby Audio, WiFi 6 and two-way Bluetooth 5.2 cover the rest.

The reason it does not rank higher is transparency on brightness. The listing headlines \"30000 Lumens\", which is not a real measurement, and nowhere does it state an ANSI figure, which is the only comparable standard. Without that number there is no way to know how it stacks up against the 1400 ANSI WiMiUS at number one or the 2200 ANSI models further down, so assume it is dimmer than the units that do publish a figure and plan on watching with the lights off.", // TEXTO SEO LONGO - APONTA A FALTA DO DADO ANSI
                'pros' => ['Licensed Netflix, Prime Video and YouTube built in', '478 ratings behind a 4.5 average', 'Glass lenses and up to a 200-inch image', 'Flexible 120-degree hovering stand'], // PONTOS POSITIVOS
                'contras' => ['No ANSI lumens figure published, so brightness is unverifiable', 'The 30,000 lumens headline is not a real measurement'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'PUTRIMS Smart Mini Projector, Native 1080p, 330° Rotatable, Short Throw, 860g', // NOME (ENCURTADO)
                'price' => '£115.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 257,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/812AWd5qlQL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'PUTRIMS Smart Mini Projector, Native 1080p, 330° Rotatable, Short Throw, 860g', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4wagJTi',                                       // LINK AFILIADO
                'summary' => "The most portable pick here at 860g and roughly iPad-sized, with a short throw that puts a 100-inch image on the wall from just 8.6ft.", // TEXTO CURTO (CARD)
                'body' => "If you actually intend to carry your projector around, this is the one to look at. At 860 grams and roughly the footprint of an iPad, it slips into a backpack in a way none of the heavier units here do, and its 1.19:1 short throw ratio means it only needs 8.6 feet to fill a 100-inch screen, which matters enormously in a small British living room where you cannot get 12 feet back from the wall.

The setup automation is fast, with auto focus, 6D keystone, obstacle avoidance and screen fit resolving in about three seconds, plus manual 4-point keystone and 50-100% zoom if you want to fine-tune. It runs the Play Store with Netflix, Disney+, Prime Video and YouTube, has HDMI ARC and CEC, two-way Bluetooth 5.4, and a 330-degree rotatable stand with a standard 1/4-inch screw mount for tripods.

Two caveats. As with the AMEELA, the listing headlines \"30000Lumen\" without ever quoting an ANSI figure, so its real brightness is unknown and should be assumed modest. Separately, the listing advertises 1,000+ free live TV channels with \"no TV licence required\", which is misleading in the UK: watching or recording live TV on any channel or device requires a TV Licence regardless of how the channel is delivered, so do not treat that claim as legal advice. On-demand streaming outside BBC iPlayer is a different matter.", // TEXTO SEO LONGO - ALERTA SOBRE ALEGACAO DE TV LICENCE
                'pros' => ['Most portable here at 860g, roughly iPad-sized', 'Short throw fills 100 inches from just 8.6ft', 'Play Store with Netflix, Disney+ and Prime Video', 'HDMI ARC/CEC and two-way Bluetooth 5.4'], // PONTOS POSITIVOS
                'contras' => ['No ANSI lumens figure published, so brightness is unverifiable', 'Its "no TV licence required" claim is misleading for UK live TV'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'TOPTRO X9 Pro Smart Projector, VIDAA OS, 2200 ANSI, 40W Speakers, Voice Control', // NOME (ENCURTADO)
                'price' => '£349.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.8,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 266,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/718XznNuHBL._AC_SL1323_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'TOPTRO X9 Pro Smart Projector, VIDAA OS, 2200 ANSI, 40W Speakers, Voice Control', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4hjXcMu',                                       // LINK AFILIADO
                'summary' => "The most complete living-room package here: 2200 ANSI, 40W speakers, and a VIDAA system that pre-loads UK apps like ITVX, Channel 4 and My5.", // TEXTO CURTO (CARD)
                'body' => "This is the most expensive projector on the list at £349.99 and the one that comes closest to replacing a television outright. It runs VIDAA rather than Android or Google TV, and the UK relevance is the standout detail: it recommends and pre-loads local apps including ITVX, Channel 4, My5, Now and Pluto TV, alongside Netflix, Prime Video and YouTube, which is far more useful here than a projector defaulting to a US app selection.

The hardware backs it up. 2200 ANSI lumens is the joint second brightest here, enough to hold up in a room with moderate lighting rather than requiring total darkness, and it pairs native 1080p and 4K decoding with a 130% NTSC gamut and HDR10. Audio is 2x20W dual-cavity speakers with Dolby, which genuinely removes the need for a separate soundbar. VIDAA is also certified under GDPR, CCPA and COPPA and does not collect user data or push targeted ads, which is a rare thing to be able to say about a smart TV platform.

Everything else is well covered: AirPlay, Apple HomeKit compatibility, voice control from remote or phone, full auto focus and 6D keystone in about three seconds, and a 3-year replacement warranty. Its 4.8 average across 266 ratings is the second highest score on this list. The only real objection is price, at nearly four times the cheapest unit here.", // TEXTO SEO LONGO
                'pros' => ['Pre-loads UK apps: ITVX, Channel 4, My5, Now', '2200 ANSI copes with moderate room lighting', '2x20W Dolby speakers remove the need for a soundbar', 'AirPlay and Apple HomeKit support, plus GDPR-certified OS'], // PONTOS POSITIVOS
                'contras' => ['Most expensive projector on this list at £349.99', 'VIDAA has a smaller app library than Google TV'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'KOGATA GC357B Smart Projector, 1200 ANSI, MTK9660, WiFi 6, Bluetooth 5.3', // NOME (ENCURTADO)
                'price' => '£170.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 5.0,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 176,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71edmr0BZgL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'KOGATA GC357B Smart Projector, 1200 ANSI, MTK9660, WiFi 6, Bluetooth 5.3', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4wagW92',                                       // LINK AFILIADO
                'summary' => "Publishes a real 1200 ANSI figure and a named MTK9660 chipset with 2+8GB memory, and carries a perfect 5.0 average across 176 ratings.", // TEXTO CURTO (CARD)
                'body' => "The KOGATA is one of the more technically transparent listings in this category, which counts for a lot here. It publishes a real 1200 ANSI lumens figure rather than an invented one, names its MTK9660 chipset, and states its 2+8GB memory configuration, so you can actually judge what you are buying instead of guessing from adjectives.

That hardware supports smooth 4K decoding to a native 1080p panel, with AI picture optimisation, HDR10+ and high-transmittance lenses. Setup covers auto focus, 6D keystone, obstacle avoidance and screen alignment, with 100-50% zoom and a maximum image size of 300 inches. WiFi 6 and dual-mode Bluetooth 5.3 handle connectivity, HDMI eARC supports external speakers, and the listing emphasises efficient heat dissipation and low-noise operation for long sessions.

Worth flagging on the rating: a perfect 5.0 average across 176 ratings is statistically unusual, since genuine products at that volume almost always pick up at least a few critical reviews. That is not evidence of anything on its own, but it is worth reading recent reviews yourself rather than taking the headline score at face value. On specification and price at £170.99 it remains a sensible mid-range choice, sitting between the dim budget units and the £250-plus Google TV models.", // TEXTO SEO LONGO - NOTA FACTUAL SOBRE 5.0 COM 176 REVIEWS
                'pros' => ['Publishes a real 1200 ANSI figure rather than an inflated one', 'Names its MTK9660 chipset and 2+8GB memory', 'HDMI eARC and WiFi 6 with dual-mode Bluetooth 5.3', 'Up to a 300-inch image with low-noise operation'], // PONTOS POSITIVOS
                'contras' => ['A perfect 5.0 across 176 ratings is statistically unusual', 'Runs a generic system rather than official Google TV'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'DESS C5 Pro Smart Projector, Official Google TV, 2200 ANSI, Hidden Stand', // NOME (ENCURTADO)
                'price' => '£254.15',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.0,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 52,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71dgoSJnvxL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'DESS C5 Pro Smart Projector, Official Google TV, 2200 ANSI, Hidden Stand', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/45JOf83',                                       // LINK AFILIADO
                'summary' => "Official Google TV plus 2200 ANSI and a built-in tilting stand, with a UK plug included, though it holds the lowest rating on this list at 4.0.", // TEXTO CURTO (CARD)
                'body' => "The C5 Pro pairs two things that rarely appear together at this price: official licensed Google TV, giving properly certified Netflix, Prime Video, YouTube and Disney+ across 10,000+ apps, and 2200 ANSI lumens, which is bright enough for genuine use in ambient light rather than only after dark.

The built-in stand is a smarter piece of design than it sounds. Instead of balancing the projector on books or buying a tripod, a patented concealed stand tilts the unit up to 15 degrees, letting you align a large image at eye level on any wall while keeping the whole thing stable and tidy. Setup is automatic across focus, keystone, screen alignment and obstacle avoidance, resolving in about three seconds, and WiFi 6 with Bluetooth 5.3 keeps streaming and gaming latency low. It ships with a UK plug, which is not a given in this category.

The reservation is its rating. At 4.0 across 52 ratings it is the lowest-scoring projector on this list, and while 52 reviews is a small sample, a 4.0 from a product with this specification suggests some buyers are hitting problems the spec sheet does not reveal. Given the price sits above several better-rated options here, it is worth reading through recent reviews before committing.", // TEXTO SEO LONGO - HONESTO SOBRE A NOTA MAIS BAIXA
                'pros' => ['Official licensed Google TV with certified Netflix and Disney+', '2200 ANSI works in ambient light', 'Built-in tilting stand replaces a tripod', 'Ships with a UK plug'], // PONTOS POSITIVOS
                'contras' => ['Lowest rating on this list at 4.0', 'Costs more than several better-rated projectors here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'WiMiUS G2 Smart Projector, Google TV 14, 2500 ANSI, MEMC, 40W Dolby Audio', // NOME (ENCURTADO)
                'price' => '£297.49',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 428,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71LAAO5s6NL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'WiMiUS G2 Smart Projector, Google TV 14, 2500 ANSI, MEMC, 40W Dolby Audio', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4xnstCO',                                       // LINK AFILIADO
                'summary' => "The brightest projector on this list at 2500 ANSI, running official Google TV 14 with MEMC motion smoothing that makes it the pick for live sport.", // TEXTO CURTO (CARD)
                'body' => "If you want the best all-round smart tv projector 4K option here and can stretch to £297, this is it. At 2500 ANSI lumens it is the brightest unit on the list, enough to watch with the curtains not fully drawn, and it runs official Google TV 14 with 2+32GB of memory, so Netflix, Prime Video and Disney+ are properly certified and UK apps like ITVX and Channel 4 run natively.

MEMC is the feature that separates it from everything else here. By interpolating frames it smooths motion to 60fps, which makes a visible difference to football and motorsport where fast pans on a lesser projector turn into a blur. Combined with WiFi 6 for low latency, it doubles as a capable gaming projector via HDMI 2.1. The MT9660 processor handles real-time AI image optimisation across a claimed 98% of the NTSC gamut, with HDR10 support.

Audio is 40W of Dolby with a bass radiator, the most powerful on this list, plus two-way Bluetooth 5.4 and HDMI CEC/ARC. Practical extras are unusually well thought through: Google Assistant voice search, a Kids Mode with PIN lock and screen-time management, and a one-click dust removal function to stop black spots developing on the image over time. With 428 ratings behind a 4.6 average, the evidence base is solid too.", // TEXTO SEO LONGO
                'pros' => ['Brightest on this list at 2500 ANSI lumens', 'Official Google TV 14 with 2+32GB memory', 'MEMC motion smoothing, ideal for live sport', '40W Dolby Audio with bass radiator, the loudest here'], // PONTOS POSITIVOS
                'contras' => ['Second most expensive projector on this list', 'Still native 1080p despite the 4K badge'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'X7 Smart Projector, Android 14, 2000 ANSI, 180° Rotation, Air Mouse Remote', // NOME (ENCURTADO)
                'price' => '£239.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.2,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 114,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71DIFiCQNZL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'X7 Smart Projector, Android 14, 2000 ANSI, 180° Rotation, Air Mouse Remote', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4fQIlqs',                                       // LINK AFILIADO
                'summary' => "2000 ANSI and a 180° rotating body built for ceiling projection, with an air mouse remote and a claimed 100,000-hour lamp life.", // TEXTO CURTO (CARD)
                'body' => "The X7's defining feature is the 180-degree rotating body, which makes it the most practical unit here for projecting onto a bedroom ceiling. Most projectors need awkward propping or a proper ceiling mount to do that; this one just rotates. Paired with a short 1.08:1 throw ratio it covers 60 to 200 inches, which suits small rooms, flats and student accommodation.

Brightness is a solid 2000 ANSI with an 18,000:1 contrast ratio, putting it in the upper half of this list and making it usable in a dimly lit room. The Android 14 build opens the Play Store for 10,000+ apps and 800+ free live channels, and the included remote is better than most: it combines a voice assistant with an air mouse function so you can point a cursor rather than nudging through a grid, which makes typing search terms far less painful.

Lamp life is quoted at 100,000 hours, which at four hours a night would be several decades, so treat it as a durability claim rather than a meaningful number. The brand also offers a smartphone app with a full QWERTY keyboard, touchpad and air mouse. At £239.99 with a 4.2 average across 114 ratings, it is competent but sits awkwardly close in price to the better-rated, brighter and officially Google TV-equipped options at numbers seven and eight.", // TEXTO SEO LONGO
                'pros' => ['180° rotation makes ceiling projection genuinely easy', '2000 ANSI with an 18,000:1 contrast ratio', 'Air mouse remote makes searching far easier', 'Short 1.08:1 throw suits small rooms and flats'], // PONTOS POSITIVOS
                'contras' => ['Generic Android 14 rather than licensed Google TV', 'Priced close to brighter, better-rated rivals here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Aurzen EAZZE D1G Smart Mini Projector, Official Google TV, True 200 ANSI', // NOME (ENCURTADO)
                'price' => '£169.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 469,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71Q5CeM8j-L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Aurzen EAZZE D1G Smart Mini Projector, Official Google TV, True 200 ANSI', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4cpBIud',                                       // LINK AFILIADO
                'summary' => "The most honest listing in this entire category: Aurzen states a true 200 ANSI lumens and calls out rivals for inflating figures, but 200 ANSI is genuinely dim.", // TEXTO CURTO (CARD)
                'body' => "Aurzen does something no other manufacturer on this list does: it states plainly that it measures brightness to the ANSI standard under ISO/IEC 21118, quotes a true 200 ANSI lumens, and explicitly calls out competitors for presenting the same class of output as \"18,000 lumens\" or inflated ANSI figures. Given how much invented brightness marketing appears elsewhere in this ranking, that transparency deserves credit.

It also has the best streaming credentials of any budget unit here. Official Google TV brings 10,000+ apps including fully certified Netflix, Disney+ and Hulu, plus 800+ free channels, Google Assistant, Google Cast, multi-account profiles and a Child Mode. Auto focus, ±45° 4-point keystone, obstacle avoidance and screen alignment all work automatically, and dual 8W speakers with Dolby Audio handle sound. With 469 ratings it has the third largest review base on this list.

The honesty cuts both ways though. 200 ANSI lumens really is dim, the lowest figure here, and Aurzen recommends the D1G for images up to 100 inches rather than the 200 and 300-inch claims made elsewhere, which is a more realistic limit. This is a projector for a properly dark bedroom or a tent, not a living room with any light in it. Buy it for the honest specification and the official Google TV, not for brightness.", // TEXTO SEO LONGO - VALORIZA A TRANSPARENCIA MAS E CLARO SOBRE O BRILHO BAIXO
                'pros' => ['The only listing here that states a verified ANSI measurement standard', 'Official Google TV with certified Netflix, Disney+ and Hulu', '469 ratings, the third largest sample on this list', 'Google Assistant, Cast, profiles and Child Mode'], // PONTOS POSITIVOS
                'contras' => ['200 ANSI is the dimmest on this list, dark rooms only', 'Realistic maximum image is 100 inches, not 200 or 300'], // PONTOS NEGATIVOS
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
        $this->command?->info("Smart4kProjectorSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
