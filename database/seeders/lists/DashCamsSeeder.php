<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class DashCamsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE DASH CAMS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA FILTRADA: /s?k=dash+cam+front+and+rear&rh=p_36%3A3000-  (21 ASINS UNICOS)
        //
        // ─── ACHADOS ───
        // 1. QUEM TEM 4K DE VERDADE DIZ O NOME DO SENSOR. QUEM NAO TEM SO ESCREVE 4K.
        //    NOMEIAM O SENSOR (SONY STARVIS 2): REDTIGER £119.99 E GKU D600 PRO MAX
        //    £74.98. NAO NOMEIAM SENSOR NENHUM E MESMO ASSIM VENDEM "4K": ROVE £42.48,
        //    GKU D600 £54.99 E WOLFANG £34.99. A ORSKEY CITA "Sony Sensor" SEM MODELO —
        //    E O EQUIVALENTE DO "AVIATION ALUMINIUM" DOS BRACOS DE MONITOR.
        // 2. "4K+1080P" NAO E UMA CAMERA 4K, SAO DUAS CAMERAS. A DA FRENTE GRAVA EM 4K
        //    E A DE TRAS EM 1080P, MAS O TITULO VENDE O NUMERO MAIOR. O ROVE, COM
        //    36.583 AVALIACOES, PIORA ISSO NO BULLET: DIZ GRAVAR "up to 4K 1080P
        //    resolution", QUE NAO E RESOLUCAO NENHUMA. O 70mai E O UNICO QUE SEPARA
        //    DIREITO NA TABELA: "4K (front), 1080p (rear)".
        // 3. A SSONTONG VENDE 2.5K NO TITULO E EM TODOS OS BULLETS, E A TABELA DE
        //    ESPECIFICACOES DIZ "Video capture resolution 1080p". O NUMERO QUE VENDE
        //    O PRODUTO E O NUMERO DA FICHA NAO SAO O MESMO.
        // 4. A IIWEY DESCREVE NOS BULLETS 1080P+1080P+1080P+1080P NOS QUATRO CANAIS,
        //    E A TABELA DIZ "1080p, 1440p". OS 1440p NAO APARECEM EM BULLET NENHUM.
        // 5. A REDTIGER ANUNCIA 128GB DE CARTAO NO TITULO E LISTA "64G Card" NO CAMPO
        //    DE COMPONENTES INCLUSOS. O CAMPO "Model name" DELA E "Delantera y
        //    Trasera" — ESPANHOL PARA FRENTE E TRAS, NUM ANUNCIO BRITANICO.
        // 6. SUPERCAPACITOR CONTRA BATERIA DE LITIO E A ESPECIFICACAO QUE DECIDE SE O
        //    APARELHO SOBREVIVE A UM PARA-BRISA BRITANICO, E SO 4 DOS 10 DIZEM QUAL
        //    USAM: REDTIGER, GKU PRO MAX, IIWEY E 70mai. BATERIA DE LITIO INCHA E
        //    FALHA NO CALOR DE VERAO SOBRE O PAINEL. O 70mai E O UNICO QUE PUBLICA A
        //    FAIXA (-10 A 60 °C) E A CONTAGEM DE CICLOS (500.000+).
        // 7. O CONTRASTE QUE FECHA O ARGUMENTO: A NEXTBASE, MARCA BRITANICA
        //    ESTABELECIDA, COBRA £119.99 POR UMA 222XR QUE ELA DECLARA COMO 1080p.
        //    NA MESMA PAGINA DE BUSCA HA "4K" POR £34.99. UMA DAS DUAS NAO ESTA
        //    DESCREVENDO O SENSOR QUE TEM DENTRO.
        // 8. A GKU D600 PRO MAX E A UNICA QUE AVISA QUE O CARTAO NAO VEM INCLUSO E
        //    QUE E PRECISO U3/V30 OU SUPERIOR. AS OUTRAS INCLUEM CARTAO SEM DIZER A
        //    CLASSE — CARTAO LENTO PERDE QUADRO EM GRAVACAO CONTINUA.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: ANUNCIOS COM MENOS DE 700 AVALIACOES (INCLUSIVE TRES "NEW ON AMAZON"
        // COM NOTA 5.0 DE 9 A 17 AVALIACOES); A NEXTBASE 222x, MANTIDA SO A 222XR
        // PARA NAO REPETIR A MARCA.
        // DENTRO: NOTA DE 4.0 A 4.5, PRECO DE £34.99 A £141.99, NOVE MARCAS.
        //
        // FOCUS KEYWORD: best dash cam
        // VARIACOES TRABALHADAS: dash cam front and rear / 4k dash cam /
        // car camera / dashcam with parking mode / dash cam with gps /
        // best dash cam for cars / dual dash cam / dash cam with wifi /
        // front and rear car camera / dash cam with night vision
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-dash-cam',                                           // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Dash Cam 2026: 10 Ranked, and Which 4K Is Actually 4K', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Dash Cam 2026: Top 10 Front and Rear Cameras', // TITLE DA ABA/GOOGLE (47 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best dash cam options on Amazon by sensor, real resolution and power type, comparing front and rear car cameras from £34.99 to £141.99.', // META DESCRIPTION (150 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best dash cam',                                  // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "There is one question worth asking about any dash cam, and the listings are built to stop you asking it: which image sensor is inside? We went through 21 front and rear car cameras on Amazon in August 2026 and the pattern was immediate. Every camera that names its sensor costs £74.98 or more. Every camera that simply prints 4K in the title and names nothing costs £54.99 or less. Meanwhile Nextbase, the established British brand, charges £119.99 for a dash cam it openly describes as 1080p — on the same results page as a £34.99 unit selling itself as 4K. One of those two is not describing the hardware it ships. Below we rank the best dash cam options on real specification rather than headline numbers, covering what 4K plus 1080P actually means, why supercapacitor versus lithium battery matters more than resolution on a British windscreen, and the three listings whose own specification tables contradict their own titles.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Buying the best dash cam is mostly a matter of refusing to shop on the headline number. Start with the sensor: a camera that names a Sony STARVIS 2 is telling you something checkable, while one that prints 4K and names nothing is telling you what its marketing department decided. Next, read 4K plus 1080P for what it is — two cameras, the front one at the higher resolution and the rear one at 1080p — because the number in the title describes half the product. Then check the power source, which almost nobody mentions: a supercapacitor survives a dashboard that hits 60°C in July and −5°C in January, and a lithium battery in the same place swells and eventually stops holding charge. By contrast, resolution beyond about 1440p buys you less than you would think, because a number plate is legible or it is not, and lens aperture and night-vision processing decide that more often than pixel count. Finally, if a listing includes a memory card without stating its speed class, budget for a U3 or V30 replacement: a slow card drops frames during continuous recording, which is the one moment a dash cam has a job to do.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 14:50:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'GKU D600 Pro Max 4K Dash Cam Front and Rear, STARVIS 2, Supercapacitor',  // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£74.98',                                                                // PRECO (COLETADO EM 28/08/2026)
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 1752,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71ZbKpCKTyL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best dash cam',                                                      // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GXJKK21H?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best dash cam here on documentation: it names the STARVIS 2 sensor, confirms a supercapacitor rather than a battery, and is the only listing that admits no memory card is included.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "This is the listing that answers the questions the rest avoid. GKU names the image sensor as a Sony STARVIS 2, states plainly that the front camera records 3840x2160 and the rear records 1080p rather than hiding behind a combined figure, and confirms the camera runs on a supercapacitor instead of a lithium battery. At £74.98 with 4.5 stars from 1,752 ratings, it is the cheapest camera in this comparison that tells you what is actually inside it.

The sensor matters more than the resolution. STARVIS 2 is a back-illuminated Sony line designed for low light, which is the condition a British dash cam spends most of the winter working in: a 4K frame from a poor sensor at dusk is a large picture of nothing useful, while a good sensor at 1440p will read a number plate. Supporting hardware is strong too, with 5.8GHz WiFi 6 for fast transfers, built-in GPS stamping speed and location, voice control across nine commands and three parking modes.

The detail that most recommends it is a warning rather than a feature. GKU states that no microSD card is included and that you should fit a U3 or V30 high-endurance card. Most rivals here bundle a card and never mention its speed class, which matters because a slow card drops frames during continuous recording. Being told to buy a proper card is more useful than being given a bad one.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Names the Sony STARVIS 2 sensor rather than just printing 4K', 'States the front and rear resolutions separately and honestly', 'Confirmed supercapacitor rather than a lithium battery', 'Warns that no card is included and specifies U3 or V30', '5.8GHz WiFi 6, built-in GPS and nine voice commands'], // PONTOS POSITIVOS
                'contras' => ['No memory card in the box, so budget for a high-endurance one', '1,752 ratings is a thinner sample than the cheaper cameras here', 'Costs more than double the entry-level cameras in this comparison'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'REDTIGER F7N 4K Dash Cam Front and Rear, Touch Screen, GPS, STARVIS 2',   // NOME (ENCURTADO)
                'price' => '£119.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 6619,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71xYmXWkXFL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'REDTIGER F7N 4K dash cam front and rear with touch screen and GPS',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C6YBHKJ5?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The deepest review history of any properly specified camera here, at 6,619 ratings, with both resolutions published and a supercapacitor rated from -20C to 70C.', // TEXTO CURTO (CARD)
                'body' => "REDTIGER combines the specification of the camera above with four times the review history. The Amazon specification table lists the video capture resolution as 3840 x 2160, 1920 x 1080 — both figures, side by side, which is the correct way to describe a two-camera system and something only two listings in this comparison manage. The sensor is a STARVIS 2, there is a 3.18 inch touch screen, built-in GPS logs speed and location on every clip, and 5.8GHz WiFi moves footage to a phone quickly enough to email an insurer from the roadside.

The supercapacitor is specified with numbers rather than adjectives: REDTIGER quotes operation from −20°C to 70°C, which brackets a British dashboard in both directions. That is the range that matters, because the failure mode of a lithium dash cam is not dramatic — it simply stops holding enough charge to close the file cleanly, and you find out when you need the footage.

Two things stop it taking first place. At £119.99 it costs £45 more than the GKU above for a very similar core specification. And the listing contradicts itself on what is in the box: the title advertises a 128GB card while the included components field lists a 64G Card. It is a small thing next to the rest of the page, but it is the same category of error this ranking exists to flag. The model name field, incidentally, reads Delantera y Trasera, Spanish for front and rear, on a British listing.", // TEXTO SEO LONGO
                'pros' => ['6,619 ratings at 4.5, the deepest sample of any fully specified camera here', 'Specification table publishes both front and rear resolutions', 'Names the STARVIS 2 sensor', 'Supercapacitor rated from -20C to 70C', 'Built-in GPS, 3.18 inch touch screen and 5.8GHz WiFi'], // PONTOS POSITIVOS
                'contras' => ['Title advertises a 128GB card while the components field says 64GB', 'Costs £45 more than a comparable camera in this ranking', 'Model name field is in Spanish on a UK listing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'ROVE 4K and 1080P Dual Dash Cam Front and Rear, 3 Inch IPS, 32GB Card',   // NOME (ENCURTADO)
                'price' => '£42.48',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 36583,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71l9OHdfAQL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'ROVE dual dash cam front and rear with 3 inch IPS screen',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GYRMYBYP?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'By far the most reviewed car camera in this comparison at 36,583 ratings, and the clearest example of how the 4K claim is written to be misread.', // TEXTO CURTO (CARD)
                'body' => "Thirty-six and a half thousand ratings at 4.3 stars is an enormous amount of evidence, and it is why this camera sits third rather than lower. For £42.48 you get a two-camera system with a 3 inch IPS screen, a 170 degree field of view, WDR, 24 hour parking mode, WiFi app control and a 32GB card in the box, backed by a 12 month warranty that extends to 24 with registration. As a first dash cam bought on price, plenty of people are clearly happy with it.

The listing is also the best available illustration of the central problem in this category. Its first bullet claims the cameras record videos up to 4K 1080P resolution. That is not a resolution. What it means is that the front camera is rated 4K and the rear camera is 1080p, which the specification table then flattens into a single line reading 4K (3840 x 2160 pixels) with no indication that only one of the two lenses reaches it. A shopper skimming the page comes away believing they are buying two 4K cameras.

No image sensor is named anywhere on the listing, and there is no mention of whether the camera runs on a supercapacitor or a lithium battery. At this price the answer is almost certainly a battery, which is worth knowing before it spends a July on a dashboard. Buy it for the review count and the price; do not buy it believing the rear camera matches the front.", // TEXTO SEO LONGO
                'pros' => ['36,583 ratings at 4.3, the deepest evidence in this comparison', 'Costs £42.48 with a 32GB card, 3 inch IPS screen and WiFi included', '170 degree field of view with WDR and 24 hour parking mode', '12 month warranty extendable to 24 months on registration'], // PONTOS POSITIVOS
                'contras' => ['Bullet claims recording up to 4K 1080P resolution, which is not a resolution', 'Spec table gives a single 4K figure for a system whose rear camera is 1080p', 'Names no image sensor anywhere on the listing', 'Does not say whether it uses a supercapacitor or a lithium battery'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => '70mai A800SE Dash Cam Front and Rear, 4K and 1080P, GPS, 128GB Card',     // NOME (ENCURTADO)
                'price' => '£141.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 1011,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71K3O1pTsPL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => '70mai A800SE 4K dash cam front and rear with GPS and 128GB card',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FC68MRZC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing in this comparison whose specification table splits the two cameras properly, and the only one that publishes a cycle count for its supercapacitor.', // TEXTO CURTO (CARD)
                'body' => "Read the specification table on this listing and it says, simply, 4K (front), 1080p (rear). That is the entire problem in this category solved in seven words, and 70mai is the only manufacturer here that writes it that way. The front camera is a genuine 3840x2160 with an F1.55 aperture and a 140 degree field of view, the rear is 1080p and rotates, and there is a 128GB card in the box.

The supercapacitor is documented with the precision the rest of the field lacks. Rather than claiming extreme temperature resistance, 70mai publishes an operating range of −10°C to 60°C and a rating of over 500,000 charge cycles. A number you can check beats an adjective you cannot, and this is the only camera here offering one. Built-in GPS and WiFi complete a specification that is difficult to fault.

The reason it is fourth is money and evidence. At £141.99 it is the most expensive camera in this comparison, £22 above the REDTIGER and nearly £70 above the GKU that names the same class of sensor. And 1,011 ratings, while enough to be meaningful, is a sixth of the REDTIGER sample. The 140 degree field of view is also narrower than the 170 degrees most rivals here claim, which in practice trades some peripheral coverage for less distortion at the edges of the frame — a defensible engineering choice, but one worth knowing about.", // TEXTO SEO LONGO
                'pros' => ['Specification table splits front 4K and rear 1080p explicitly', 'Publishes supercapacitor range of -10C to 60C and 500,000+ cycles', 'F1.55 aperture on the front camera, the widest quoted here', '128GB card included in the box', 'Built-in GPS and WiFi from an established dash cam brand'], // PONTOS POSITIVOS
                'contras' => ['Most expensive camera in this comparison at £141.99', '140 degree field of view is narrower than most rivals here', '1,011 ratings is a sixth of the sample behind the REDTIGER'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'GKU D600 4K Dash Cam Front and Rear, 5GHz WiFi, 64GB Card Included',      // NOME (ENCURTADO)
                'price' => '£54.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 8677,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71qGMFd-93L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'GKU D600 4K dash cam front and rear with 5GHz WiFi and 64GB card',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CT8PGZHW?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The mid-price GKU with 8,677 ratings and a genuinely complete accessory kit, but unlike its Pro Max sibling it names no sensor at all.', // TEXTO CURTO (CARD)
                'body' => "The D600 is the volume seller in GKU's range and the accessory kit is the most complete in this comparison: a 64GB card, a USB-C cigarette charger with a three metre lead, a six metre rear camera cable, a trim removal tool, five cable clips, two adhesive pads and two electrostatic films. For anyone who intends to route the cable properly around a windscreen rather than leave it dangling, that box saves a separate order.

Specification-wise it does the basics without argument: 2160p front and 1080p rear stated in the bullets, 5GHz WiFi, 170 degree field of view, two distinct parking modes including time-lapse, and voice prompts confirming what the camera is doing. At 4.3 stars from 8,677 ratings it has the second deepest sample here.

What it does not do is name its sensor, and that omission is more conspicuous because GKU names a STARVIS 2 on the Pro Max at number one. The same brand, the same product family, and the sensor appears on one listing and not the other. Reading the two pages side by side is the clearest demonstration available that when a manufacturer has a sensor worth naming, it names it. At £54.99 this is a decent camera and a genuinely good kit; it is not the same hardware as the £74.98 model, and the listing quietly declines to say so.", // TEXTO SEO LONGO
                'pros' => ['8,677 ratings at 4.3, the second deepest sample in this comparison', 'Most complete accessory kit here, including trim tool and cable clips', '64GB card, 3m USB-C charger and 6m rear camera cable in the box', 'Two parking modes including time-lapse', 'Bullets state front and rear resolutions separately'], // PONTOS POSITIVOS
                'contras' => ['Names no image sensor, unlike the Pro Max from the same brand', 'Does not state whether it uses a supercapacitor or a battery', 'Bundled card has no stated speed class'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'ORSKEY S900 Dash Cam Front and Rear, 1080P Full HD, Sony Sensor',         // NOME (ENCURTADO)
                'price' => '£39.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 11796,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61AAVUwg7YL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'ORSKEY S900 dash cam front and rear in 1080p with dual lens',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B083RS6D32?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most honest budget camera here: it says 1080p in the title, in the bullets and in the spec table, and 11,796 buyers have rated it 4.3.', // TEXTO CURTO (CARD)
                'body' => "There is something to be said for a listing that makes no attempt to inflate itself. ORSKEY sells this as a 1080p Full HD front and rear camera, the specification table says 1080p, and the bullets say the same. Nothing on the page invites you to believe the hardware is better than it is, which after an afternoon reading dash cam listings is genuinely refreshing. At £39.99 with 11,796 ratings at 4.3 stars, it is the third most reviewed camera in this comparison.

The hardware is competent for the money. Both cameras use a 170 degree wide angle lens, there is an F1.8 aperture on the front for night driving, and the feature set covers loop recording, G-sensor, parking monitoring, motion detection and HDR. A card is included. For a driver who wants footage that establishes what happened rather than a legible number plate at distance, 1080p at both ends is often enough.

The one place it reaches is the sensor claim. The bullet says the camera carries a super high quality Sony Sensor which has better night vision than any other sensors, and no model number appears anywhere. Sony makes image sensors ranging from excellent to ordinary, so a Sony sensor with no designation tells you approximately nothing, and the superlative that follows cannot be tested. It is the same move as naming a metal without naming the alloy. Connectivity is USB rather than WiFi, so getting footage off it means a cable or a card reader.", // TEXTO SEO LONGO
                'pros' => ['11,796 ratings at 4.3, the third deepest sample here', 'Title, bullets and specification table all agree on 1080p', 'F1.8 aperture and 170 degree lens on both cameras', 'Loop recording, G-sensor, parking monitor, motion detection and HDR', 'Costs £39.99 with a card included'], // PONTOS POSITIVOS
                'contras' => ['Claims a Sony sensor without giving any model number', 'Claims better night vision than any other sensor, which cannot be checked', 'USB rather than WiFi, so no wireless transfer to a phone', 'No supercapacitor or battery type stated'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Nextbase 222XR Dash Cam Front and Rear, 1080p Full HD, 140 Degree',       // NOME (ENCURTADO)
                'price' => '£119.99',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 1355,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/5155+aiB1rL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Nextbase 222XR dash cam front and rear in 1080p with Click and Go mount', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0943X67HC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A British brand charging £119.99 for a camera it plainly calls 1080p, on a page where unbranded 4K sells for £34.99. That contrast is the most useful thing on this list.', // TEXTO CURTO (CARD)
                'body' => "Nextbase is the established name in British dash cams, sold through Halfords and Currys as well as Amazon, and the 222XR is its front-and-rear model. It records 1080p at 30 frames per second through a 6G lens with a 140 degree view, uses the Click and Go PRO magnetic mount that lets you lift the camera off the screen in one movement, and includes intelligent parking mode that wakes on impact.

The specification looks modest until you put it next to the rest of this page. Nextbase charges £119.99 and says 1080p. Three cameras in this comparison say 4K and cost between £34.99 and £54.99. Either Nextbase is charging a very large premium for a brand name, or the cheap 4K cameras are not shipping the sensor their titles imply. Both explanations cannot be equally true, and the fact that the two cameras here which do name a Sony STARVIS 2 both cost more than £74 points strongly in one direction.

What you get for the money is the ecosystem rather than the pixel count: the magnetic mount, the accessory range, UK-based support, and a company that will still exist to honour a warranty. What you do not get is a competitive specification, and 1,355 ratings at 4.4 is a modest sample for a brand this size. If you want maximum hardware per pound, buy elsewhere on this list. If you want the camera your insurer has heard of, this is it.", // TEXTO SEO LONGO
                'pros' => ['Established British brand with UK support and a proper accessory range', 'Click and Go PRO magnetic mount removes the camera in one movement', 'States 1080p plainly in title, bullets and specification table', '6G lens with 140 degree view and intelligent parking mode'], // PONTOS POSITIVOS
                'contras' => ['Costs £119.99 for 1080p while rivals here claim 4K for a third of that', 'No sensor named and no supercapacitor mentioned', '1,355 ratings is a modest sample for a brand of this size', '140 degree field of view is the joint narrowest in this comparison'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'IIWEY N5 4 Channel Dash Cam, 360 Degree View, Supercapacitor',            // NOME (ENCURTADO)
                'price' => '£109.99',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 3824,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71I1HFlHTjL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'IIWEY N5 four channel dash cam covering front rear inside and sides', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DRC5T6ZH?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only four-channel camera here, covering front, rear, inside and both sides, with a supercapacitor and 3,824 ratings, though its spec table quotes a resolution no bullet mentions.', // TEXTO CURTO (CARD)
                'body' => "Four channels is a genuinely different proposition from everything else on this page. The N5 records front, rear, cabin interior and both sides simultaneously, which covers the two situations a conventional dash cam misses entirely: someone reversing into your door in a car park, and anything that happens inside the vehicle. For private hire and delivery drivers that is not a luxury, and eight infrared lamps handle the interior at night.

IIWEY also does the important things right. The listing confirms a supercapacitor and explicitly states there is no battery, which is the correct choice for a camera that will sit through British summers, and there is a 3 inch IPS screen and 5GHz WiFi. At 4.4 stars from 3,824 ratings the evidence is solid for a product this specialised.

The inconsistency is in the numbers. Every bullet describes the system as 1080P plus 1080P plus 1080P plus 1080P, four channels at Full HD, while the Amazon specification table lists the video capture resolution as 1080p, 1440p. No bullet anywhere mentions 1440p, and there is no explanation of which channel might reach it. Given that spreading four simultaneous streams across one processor is exactly where a cheap camera would cut corners, the resolution of each channel is the number that most needs to be unambiguous, and here it is not.", // TEXTO SEO LONGO
                'pros' => ['Four channels covering front, rear, interior and both sides', 'Confirms a supercapacitor and states there is no battery', 'Eight infrared lamps for interior night recording', '3,824 ratings at 4.4 for a specialised product', '3 inch IPS screen with 5GHz WiFi'], // PONTOS POSITIVOS
                'contras' => ['Spec table lists 1440p while every bullet describes four 1080p channels', 'No image sensor named', 'Costs £109.99, and four channels means four cables to route'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'ssontong A16W Dash Cam Front and Rear, 2.5K QHD, 64GB Card, WiFi',        // NOME (ENCURTADO)
                'price' => '£54.39',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 783,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71eAMReRy0L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'ssontong A16W dash cam front and rear with WiFi app control',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CDLCYC23?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Sold as 2.5K in the title and in every bullet, while its own Amazon specification table gives the video capture resolution as 1080p.', // TEXTO CURTO (CARD)
                'body' => "The A16W is a reasonable mid-price camera on paper: a 2.5K front and 1080p rear pairing with WiFi app control, a 64GB card in the box, support for cards up to 256GB, a six-layer optical lens, loop recording, G-sensor and parking mode. At 4.4 stars from 783 ratings, buyers are broadly satisfied, and ssontong makes the fair point that many rivals ship a 720p rear camera where this one is 1080p.

The problem is that the page cannot agree with itself on the headline. The product title says 2.5K QHD. The first bullet says 2.5K. The Amazon specification table says, in the video capture resolution field, 1080p. Those are not two ways of describing the same thing: 2.5K is 2560x1440 and 1080p is 1920x1080, roughly 1.8 times the pixels apart. The number that sells the camera and the number in its own specification field are different numbers, and nothing on the page reconciles them.

The sensor is described only as a high-resolution CMOS sensor, which is a category rather than a component — every digital camera ever made has a CMOS or CCD sensor. There is no mention of supercapacitor or battery. It may well be a perfectly good camera at £54.39, but you cannot establish that from the listing, and when a page disagrees with itself on the single most prominent specification, the safe assumption is the lower number.", // TEXTO SEO LONGO
                'pros' => ['1080p rear camera where many rivals at this price ship 720p', '64GB card included with support for cards up to 256GB', 'Six-layer optical lens with WiFi app control', '4.4 stars from 783 ratings'], // PONTOS POSITIVOS
                'contras' => ['Title and bullets say 2.5K while the spec table says 1080p', 'Sensor described only as a high-resolution CMOS sensor', 'No supercapacitor or battery type stated', '783 ratings is the thinnest sample in this comparison'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'WOLFANG WD03 4K Dash Cam Front and Rear, WiFi, 170 Degree',               // NOME (ENCURTADO)
                'price' => '£34.99',                                                                // PRECO
                'rating' => 4.0,                                                                    // NOTA
                'reviews_count' => 1209,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61QiFO0KV0L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'WOLFANG WD03 4K dash cam front and rear with WiFi and 170 degree lens', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D632989Y?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest camera advertising 4K in this comparison at £34.99, with the lowest rating here and no sensor, no card and no power type stated.', // TEXTO CURTO (CARD)
                'body' => "At £34.99 the WD03 is the cheapest camera in this comparison and the clearest test of the question this article is built around. It advertises 4K in the title, the specification table says 2160p, and the bullets promise 4K 2160P at 30 frames per second on the front with 1080P on the rear. It also names no image sensor, gives no indication of whether it runs on a supercapacitor or a lithium battery, and includes no memory card.

Put that beside the Nextbase at number seven, which costs £119.99 and describes itself as 1080p, and beside the two cameras here that name a Sony STARVIS 2 and cost £74.98 and £119.99. Three manufacturers with something specific to say charge between three and four times as much as one with nothing specific to say. That is not proof that the WD03 upscales rather than captures 4K, but it is the strongest inference the available evidence supports.

The rating adds to the picture. Four point zero from 1,209 ratings is the lowest average in this comparison, and a large enough sample to be a signal rather than noise. WOLFANG does offer a 12 month warranty extendable to 36 with registration, which is the longest cover here, and the listing is upfront that a hardwire kit is required for parking mode and is not included. If £34.99 is the budget, this is a working dash cam; just do not choose it over the 1080p cameras here on the strength of the number in its title.", // TEXTO SEO LONGO
                'pros' => ['Cheapest camera in this comparison at £34.99', 'Warranty extendable to 36 months on registration, the longest here', 'States clearly that the hardwire kit for parking mode is not included', '170 degree wide angle with WiFi app control'], // PONTOS POSITIVOS
                'contras' => ['4.0 from 1,209 ratings, the lowest average in this ranking', 'Names no image sensor while selling itself on a 4K title', 'No memory card included and no card speed class specified', 'Does not state whether it uses a supercapacitor or a lithium battery'], // PONTOS NEGATIVOS
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
        $this->command?->info("DashCamsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
