<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class AndroidPhonesSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE SMARTPHONES ANDROID DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // FOCUS KEYWORD: best android phone
        // KEYWORDS SECUNDARIAS (VINDAS DE IMPRESSOES REAIS DO SEARCH CONSOLE):
        // best phones / android phones / best mobile phone / good android phones uk /
        // top 10 android phones uk / which android phone is the best / android mobile phones /
        // best mobile phones / best phone to buy in uk
        //
        // POR QUE O "UK" FICA AQUI (E EXCECAO A REGRA GERAL DO SITE): O SEARCH CONSOLE MOSTRA
        // IMPRESSOES REAIS EM CONSULTAS COM "uk" NESTA PAGINA. DADO CONCRETO GANHA DA REGRA.
        //
        // POR QUE A LISTA MUDOU: A VERSAO ANTERIOR ERA 7 SAMSUNG DE ENTRADA (7 DE 10 ABAIXO DE £150,
        // COM UM A40 DE 2019 E O MESMO A16 EM DUAS POSICOES). QUEM BUSCA "best android phone" QUER
        // O TOPO DE LINHA, ENTAO A PAGINA NAO RESPONDIA A CONSULTA E TRAVAVA ENTRE AS POSICOES 15-40.
        //
        // ATENCAO AO USAR AS FICHAS TECNICAS DESTAS LISTAGENS: VARIOS CAMPOS ESTAO ERRADOS
        // (PIXEL 10 PRO XL APARECE COMO "Tensor G2" E "60Hz"; S25 ULTRA COMO "Resolution 8k" E
        // "Snapdragon S5"; OS GALAXY TROCAM RAM POR ARMAZENAMENTO). O TEXTO NAO REPETE ESSES NUMEROS.
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO
        ];

        $article = [
            'slug' => 'best-android-phones-uk',                                  // SLUG DO ARTIGO (URL) - MANTIDO: JA TEM IMPRESSOES E TROCAR CUSTARIA O HISTORICO
            'title' => 'Best Android Phones UK 2026: The Top 10 Flagships, Ranked', // TITULO / H1 - PLURAL DE PROPOSITO: "phones" CONTEM O SINGULAR "best android phone" COMO PREFIXO, ENTAO COBRE AS DUAS CONSULTAS
            'meta_title' => 'Best Android Phones UK 2026: Top 10 Flagships Ranked', // TITLE DA ABA/GOOGLE (52 CHARS) - IDEM: COBRE "best android phone" E "android phones"
            'meta_description' => 'Which Android phone is the best? We ranked the top 10 Android mobile phones in the UK on camera, battery, chip and software support, from £429 to £1,899.', // META DESCRIPTION (153 CHARS) - ABRE COM A PERGUNTA EXATA QUE APARECE NO SEARCH CONSOLE
            'focus_keyword' => 'best android phone',                             // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Which Android phone is the best right now? The honest answer is that four of them are close, and the gap between them is smaller than the gap in price. Samsung owns the everything-included end with the Ultra line and its 200MP camera and S Pen. Google owns software, with seven years of updates and the best computational photography on any mobile phone. Xiaomi owns value, to the point where one phone here costs a third of an Ultra and outlasts it on battery. And foldables are their own category, brilliant and expensive in equal measure. We ranked the top 10 Android phones you can buy in the UK from £429 to £1,899, judged on camera, battery, chip, and how many years of updates you actually get — because the best Android phone is the one still worth using in four years, not just the one with the biggest spec sheet today.", // INTRO OTIMIZADA - FOCUS KEYWORD + RESPONDE A PERGUNTA DA BUSCA
            'conclusion' => "If you want a single answer, the best Android phone for most people buying today is a Samsung Ultra, because it is the only one that leaves nothing out: the best camera hardware, the S Pen, the biggest screen and a battery that lasts. If your priority is a phone that stays good, buy a Pixel — seven years of updates means a Pixel bought today is still getting new features and security patches in 2033, which no other Android maker matches. If you are spending your own money rather than chasing the top of the spec sheet, the POCO X8 Pro Max is the sharpest buy on this list by a wide margin, with a flagship chip and nearly double the battery of phones costing three times as much. And if you want a foldable, know that you are paying roughly £500 more for the format itself. One last thing worth doing before you order any of these mobile phones: check the listing is the UK version with a UK warranty, since several near-identical grey imports circulate at lower prices with no support behind them.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD + VOCABULARIO "mobile phones"
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => now(),                                             // DATA DE PUBLICACAO
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Samsung Galaxy S26 Ultra, 200MP Camera, 12GB + 512GB, Privacy Display',   // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£1,014.00',                                                              // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 84,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61Q6jISV8-L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'best android phone',                                                  // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://amzn.to/4gljqLU',                                       // LINK AFILIADO
                'summary' => "The best Android phone overall, and the strangest bargain here: the newest Ultra currently costs £335 less than the S25 Ultra it replaced.", // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Start with the thing that makes no sense on paper and works entirely in your favour. At the time of writing the S26 Ultra sells for £1,014 while the older S25 Ultra sitting below it costs £1,349 — the newer, faster phone is £335 cheaper than the one it replaced. That is unusual enough to be worth checking before you commit, but if the pricing holds it makes this the clearest buy in the ranking.

The hardware justifies the top spot on its own. It runs the Snapdragon 8 Elite Gen 5, the fastest chip in any phone on this list, with a redesigned vapour chamber Samsung says delivers 21% better thermal performance — which matters because sustained speed, not peak speed, is what you feel in long gaming sessions. The 200MP main camera has wider apertures and improved noise reduction for low light, and the frame is Armor Aluminium with Gorilla Glass and full water resistance.

Its genuinely novel feature is the Privacy Display, the first on a phone, which lets you hide the screen, individual notifications or whole apps from anyone looking over your shoulder. On a commute that is more useful day to day than most AI features. Super Fast Charging 3.0 refills the 5,000mAh battery quickly without cooking it. The one caveat is evidence rather than hardware: 84 ratings is a modest sample for a £1,000 purchase, and the S25 Ultra below has four times as many.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Currently £335 cheaper than the older S25 Ultra', 'Snapdragon 8 Elite Gen 5, the fastest chip here', '200MP camera with wider apertures for low light', "World's first privacy display on a phone"], // PONTOS POSITIVOS
                'contras' => ['Only 84 ratings so far for a £1,000 phone', 'The pricing anomaly may not last, so check before ordering'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Samsung Galaxy S25 Ultra, 200MP Camera, S Pen, 12GB + 512GB, Titanium',   // NOME (ENCURTADO)
                'price' => '£1,349.00',                                                              // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 363,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61AlcW8MYgL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung Galaxy S25 Ultra, 200MP Camera, S Pen, 12GB + 512GB, Titanium', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4znz5TG',                                       // LINK AFILIADO
                'summary' => "The highest rated phone on this list at 4.6 from 363 ratings, and the only one with a built-in S Pen — but it costs more than its own successor.", // TEXTO CURTO (CARD)
                'body' => "This is the proven Ultra. Its 4.6 average across 363 ratings is the strongest combination of score and sample size of any phone here, and if you would rather buy the model that thousands of people have already lived with than the newest one, this is that phone.

It is also the only phone in this ranking with a built-in S Pen. That sounds niche until you use it — handwritten notes, precise photo editing, signing documents and marking up screenshots all become genuinely quicker, and because the pen slots into the body there is nothing extra to carry or charge. The titanium frame keeps a 6.9-inch phone manageable, and the 200MP ProVisual Engine camera remains one of the best on any mobile phone.

The awkward part is the price. At £1,349 it currently costs £335 more than the S26 Ultra directly above it, which is newer, has a faster chip and adds the privacy display. Unless you specifically want the S Pen or you value the much larger review base, the newer phone is the better buy. Note too that this listing's specification fields are garbled — it lists 12GB under storage capacity and describes the display as 8K, neither of which is right; trust the product name, which is the 512GB model.", // TEXTO SEO LONGO - SINALIZA FICHA TECNICA ERRADA
                'pros' => ['Highest rating here at 4.6 from 363 ratings', 'Only phone on this list with a built-in S Pen', '200MP ProVisual Engine camera', 'Titanium frame with 3-year extended warranty'], // PONTOS POSITIVOS
                'contras' => ['Costs £335 more than the newer S26 Ultra above', 'Listing specs are garbled: storage and resolution fields are wrong'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Google Pixel 10 Pro, 6.3" Super Actua Display, Triple Camera, 128GB',     // NOME (ENCURTADO)
                'price' => '£799.00',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 896,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/616RT2pEACL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Google Pixel 10 Pro, 6.3" Super Actua Display, Triple Camera, 128GB', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4qJMC4h',                                       // LINK AFILIADO
                'summary' => "The most reviewed phone on this list with 896 ratings, and the one to buy if you want it to still be good in seven years.", // TEXTO CURTO (CARD)
                'body' => "With 896 ratings the Pixel 10 Pro has more customer feedback behind it than any other phone here, and it wins on the thing that quietly matters most: support length. Google commits to seven years of features and security updates through Pixel Drops. Buy this in 2026 and it is still receiving new features and patches in 2033 — no other Android manufacturer on this list comes close, and it changes the real cost of ownership more than any spec.

The camera is the other reason people buy Pixels. Google's approach leans on computational photography rather than raw hardware, which is why a Pixel often produces a better-looking photo than a phone with a bigger sensor, particularly in awkward mixed lighting. The triple rear system is paired with the most advanced version of Gemini on any phone, handling on-device AI tasks rather than sending everything to a server.

At 6.3 inches it is also the most pocketable flagship in this ranking, which is a genuine consideration when the Ultras and the XL are all approaching 7 inches. Battery is quoted at 24+ hours. Worth knowing: this listing's specification fields are unreliable — it names an older Tensor generation and a 60Hz refresh rate, neither of which matches the Pixel 10 Pro, whose own bullets describe the biggest chip upgrade Pixel has had.", // TEXTO SEO LONGO - SINALIZA FICHA TECNICA ERRADA
                'pros' => ['896 ratings, the most on this list', 'Seven years of updates, the longest support here', 'Best computational photography of any phone here', 'Most pocketable flagship at 6.3 inches'], // PONTOS POSITIVOS
                'contras' => ['128GB base storage is the smallest among the flagships here', 'Listing specs name the wrong chip and refresh rate'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Google Pixel 10 Pro XL, 6.8" Super Actua Display, Triple Camera, 256GB',  // NOME (ENCURTADO)
                'price' => '£949.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 784,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61T7d8lxk6L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Google Pixel 10 Pro XL, 6.8" Super Actua Display, Triple Camera, 256GB', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4bXUgSg',                                       // LINK AFILIADO
                'summary' => "The same Pixel formula on a 6.8in screen with double the storage, for £151 more — the pick if you watch and read more than you pocket.", // TEXTO CURTO (CARD)
                'body' => "The Pro XL is the Pixel 10 Pro scaled up, and the decision between them is genuinely simple: screen size and storage. You get 6.8 inches instead of 6.3, and 256GB instead of 128GB, for £151 more. If you read, watch or work on your phone a lot, or you shoot enough video that 128GB feels tight, the extra is well spent. If you want something that disappears into a pocket, take the smaller one.

Everything that makes the Pixel worth buying carries over unchanged. Seven years of features and security updates through Pixel Drops, the same triple rear camera system with Google's computational processing, the same deep Gemini integration, and a battery rated at 24+ hours that benefits from the physically larger body.

With 784 ratings it is the second most reviewed phone on this list, so the evidence base is strong. The same caveat applies as on the Pro: the specification fields in this listing are wrong in places, naming an older Tensor chip generation and a 60Hz refresh rate that do not match the actual product — the Pro XL runs a high refresh rate display and the current Tensor. Go by the product bullets and Google's own specification, not the Amazon spec table.", // TEXTO SEO LONGO
                'pros' => ['784 ratings, second most on this list', '256GB storage as standard, double the Pro', 'Seven years of updates through Pixel Drops', 'Larger 6.8in display suits video and reading'], // PONTOS POSITIVOS
                'contras' => ['£151 more than the Pro for screen size and storage', 'Amazon spec table lists the wrong chip and refresh rate'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Xiaomi POCO X8 Pro Max, Dimensity 9500s, 12GB + 512GB, 8500mAh',          // NOME (ENCURTADO)
                'price' => '£429.00',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 455,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61rOg35UEvL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Xiaomi POCO X8 Pro Max, Dimensity 9500s, 12GB + 512GB, 8500mAh',      // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4gfm3Pm',                                       // LINK AFILIADO
                'summary' => "The best value on this list by a distance: a flagship chip, 512GB and an 8,500mAh battery for £429 — a third of an Ultra, with nearly double the battery.", // TEXTO CURTO (CARD)
                'body' => "If you are spending your own money rather than chasing a badge, this is the phone to look at. It shares the highest rating on this list at 4.6, backed by 455 ratings, and it costs £429 — less than a third of the S25 Ultra and £186 less than the standard Galaxy S26.

The headline number is the battery. At 8,500mAh it is nearly double the 4,300mAh in the Galaxy S26 and comfortably the largest here, using a high silicon-carbon cell to fit that capacity without a brick of a phone. Xiaomi quotes two-day life, and 100W HyperCharge refills it quickly. For anyone whose real complaint about their current mobile phone is that it dies by evening, that single spec matters more than any camera comparison.

The rest is not budget hardware either. The Dimensity 9500s is a 3nm flagship chip with an all-big-core design, the 6.83-inch 1.5K AMOLED runs at 120Hz and peaks at 3,500 nits — brighter than most phones costing three times as much — and there is an ultrasonic fingerprint sensor, stereo speakers and Gorilla Glass 7i. The 50MP camera with OIS is good rather than class-leading, which is the honest trade: you give up the camera ceiling of a Pixel or an Ultra, and gain everything else.", // TEXTO SEO LONGO
                'pros' => ['8,500mAh battery, nearly double the Galaxy S26', 'Flagship 3nm Dimensity 9500s for £429', '120Hz 1.5K AMOLED peaking at 3,500 nits', 'Joint highest rating here at 4.6 from 455 ratings'], // PONTOS POSITIVOS
                'contras' => ['50MP camera cannot match the Pixel or Ultra ceiling', 'HyperOS is further from stock Android than Samsung or Google'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Samsung Galaxy S26, 6.3" Display, 50MP Camera, 12GB + 256GB',             // NOME (ENCURTADO)
                'price' => '£615.00',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 38,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61oY79ix91L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung Galaxy S26, 6.3" Display, 50MP Camera, 12GB + 256GB',         // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4gllTpE',                                       // LINK AFILIADO
                'summary' => "The compact Galaxy flagship at £615, with the newest Android and Samsung's cooling upgrades — but the smallest battery on this list.", // TEXTO CURTO (CARD)
                'body' => "The standard S26 is the entry point into Samsung's current flagship line, and it keeps most of what makes the Ultra good in a smaller, cheaper body. At 6.3 inches it is genuinely one-hand usable, it runs the newest version of Android here, and it carries the same Armor Aluminium and Gorilla Glass Victus 2 construction with water resistance.

Samsung has put real work into thermals: the redesigned vapour chamber is quoted at up to 29% better heat dissipation, which is the difference between a phone that throttles after twenty minutes of gaming and one that holds its speed. Photo Assist with Galaxy AI handles editing through natural language prompts, and the AP-driven image processing improves low-light video noticeably over the previous generation.

Two things hold it back on this list. The battery is 4,300mAh, the smallest of any phone here and barely half the POCO's 8,500mAh, which for a 2026 flagship is thin. And with 38 ratings it has the second-smallest sample in the ranking after the two foldables. It is a good phone, but at £615 it sits awkwardly between the POCO at £429, which beats it on battery and matches it on chip, and the Pixel 10 Pro at £799, which beats it on camera and updates.", // TEXTO SEO LONGO
                'pros' => ['Genuinely compact flagship at 6.3 inches', 'Newest Android version on this list', 'Vapour chamber gives up to 29% better heat dissipation', 'Armor Aluminium and Gorilla Glass Victus 2'], // PONTOS POSITIVOS
                'contras' => ['4,300mAh is the smallest battery on this list', 'Only 38 ratings, and squeezed between better-value rivals'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Xiaomi 17, Leica Summilux Lens, Snapdragon 8 Elite Gen 5, 12GB + 512GB',  // NOME (ENCURTADO)
                'price' => '£749.00',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 146,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61gPY6bAUuL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Xiaomi 17, Leica Summilux Lens, Snapdragon 8 Elite Gen 5, 12GB + 512GB', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4x8T46X',                                       // LINK AFILIADO
                'summary' => "Leica optics and the same flagship Snapdragon as the S26 Ultra, for £265 less — the enthusiast pick if you care about photography over brand.", // TEXTO CURTO (CARD)
                'body' => "The Xiaomi 17 runs the Snapdragon 8 Elite Gen 5, the same chip as the S26 Ultra at the top of this list, for £749 — £265 less. That alone makes it worth a look, but the reason to choose it specifically is the camera partnership.

The main lens is a Leica Summilux with a large f/1.67 aperture, paired with Xiaomi's Light Fusion 950 sensor. The wide aperture pulls in substantially more light than a typical phone lens, which shows up in low light and in the natural background separation you get on close subjects. Leica's involvement is in the optical design and the colour science, and Xiaomi's colour profiles are noticeably less aggressive than the saturated look Samsung defaults to — closer to what the scene actually looked like.

Battery is a healthy 6,330mAh with 100W wired and 50W wireless charging, and there is a 3-year warranty, longer than most. The reservations are software and evidence. HyperOS sits further from stock Android than One UI or Pixel's build, and Xiaomi does not publish an update commitment anywhere near Google's seven years. With 146 ratings the sample is moderate. Buy it for the camera and the chip at the price, not for long-term software support.", // TEXTO SEO LONGO
                'pros' => ['Same Snapdragon 8 Elite Gen 5 as the S26 Ultra, £265 cheaper', 'Leica Summilux lens with a bright f/1.67 aperture', '6,330mAh battery with 100W wired and 50W wireless', '3-year warranty included'], // PONTOS POSITIVOS
                'contras' => ['No published long-term update commitment like the Pixels', 'HyperOS is further from stock Android'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Google Pixel 10 Pro Fold, Foldable Display, Triple Camera, 256GB',        // NOME (ENCURTADO)
                'price' => '£1,556.96',                                                              // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 53,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/716coXbVsJL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Google Pixel 10 Pro Fold, Foldable Display, Triple Camera, 256GB',    // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3UHeCsZ',                                       // LINK AFILIADO
                'summary' => "The best-evidenced foldable here, and the one that answers the usual worry: Google rates the gearless hinge for about ten years of folding.", // TEXTO CURTO (CARD)
                'body' => "Foldables are a separate category rather than a better phone, and they carry a format premium — this costs roughly £600 more than the Pixel 10 Pro whose camera and software it shares. What you buy with that is a device that is a normal phone closed and a small tablet open, with Split Screen for genuine two-app multitasking and drag-and-drop between them.

The most common reason people avoid foldables is durability, and this is where the Pixel makes its case. The gearless hinge is rated for roughly ten years of folding and unfolding, and the whole device carries IP68 water and dust resistance — full ingress protection on a folding device was not a given until recently. That combination addresses the two things that killed early foldables.

It keeps the Pixel software story intact: Gemini throughout, the same camera processing, and the ability to review photos on the outer screen as you capture them, or prop the phone open for hands-free video. With 53 ratings it is far better evidenced than the two Samsung foldables below it, though still a small sample for a £1,556 purchase. If you genuinely want a folding phone, this is the sensible one on this list.", // TEXTO SEO LONGO
                'pros' => ['Hinge rated for roughly ten years of folding', 'IP68 water and dust resistance on a foldable', 'Same Pixel camera and Gemini software', 'Best evidenced foldable here at 53 ratings'], // PONTOS POSITIVOS
                'contras' => ['Around £600 more than the Pixel 10 Pro for the format alone', '53 ratings is still thin for a £1,556 phone'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Samsung Galaxy Z Flip8, 50MP FlexCam, 12GB + 512GB, Graphite',            // NOME (ENCURTADO)
                'price' => '£1,319.00',                                                              // PRECO (DA PLANILHA)
                'rating' => 5.0,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 1,                                                                // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61hVeoGGZ2L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung Galaxy Z Flip8, 50MP FlexCam, 12GB + 512GB, Graphite',        // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3U72j9g',                                       // LINK AFILIADO
                'summary' => "The clamshell foldable that folds down to pocket size, with a genuinely useful hands-free camera — but its 5.0 rating comes from a single review.", // TEXTO CURTO (CARD)
                'body' => "The Flip is the other kind of foldable: rather than opening into a tablet, it folds a normal-sized phone in half so it disappears into a small pocket or bag. For anyone who finds modern phones unwieldy, that is a real solution rather than a novelty, and the Flip8 is Samsung's thinnest and lightest yet at 8 grams under the Flip7, with a smoother Armor FlexHinge.

The folding form gives it one capability nothing else here has. The 50MP FlexCam works with the phone half-folded and standing on its own, so group photos and video calls happen hands-free without a tripod, and Super Steady detects the horizon to keep footage level even if the camera rotates. The FlexWindow outer screen shows calendar, fitness and email at a glance without opening the phone, and One UI 9 lets you run favourite apps directly on it.

The problem is evidence, and it is severe. A 5.0 average from exactly one rating tells you nothing at all — not about hinge wear, not about battery life, not about how the crease looks after six months. At £1,319 that is a lot of money to spend on an unknown. Samsung's Flip line has a track record behind it, but this specific model does not yet, so treat the rating as absent rather than perfect.", // TEXTO SEO LONGO - EXPLICITO SOBRE A AMOSTRA DE 1
                'pros' => ["Samsung's thinnest and lightest Flip yet", 'Hands-free FlexCam works half-folded with no tripod', 'FlexWindow shows key info without opening the phone', 'Folds to genuinely pocketable size'], // PONTOS POSITIVOS
                'contras' => ['The 5.0 rating comes from exactly one review', '£1,319 for a model with no real track record yet'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Samsung Galaxy Z Fold8 Ultra, 8" Display, 200MP Camera, 16GB + 256GB',    // NOME (ENCURTADO)
                'price' => '£1,899.00',                                                              // PRECO (DA PLANILHA)
                'rating' => 5.0,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 1,                                                                // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/713woWpiPpL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung Galaxy Z Fold8 Ultra, 8" Display, 200MP Camera, 16GB + 256GB', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3SnPFlN',                                       // LINK AFILIADO
                'summary' => "The most capable and most expensive phone here at £1,899: an 8-inch folding screen, 200MP camera and 16GB of RAM, on a single customer review.", // TEXTO CURTO (CARD)
                'body' => "On specification the Fold8 Ultra is the most powerful device in this ranking. The 8-inch inner display is the largest here by more than an inch, it carries 16GB of RAM — more than any other phone on this list — and it pairs a 200MP wide camera with an upgraded 50MP ultra-wide. A dual layer of titanium absorbs shock and strengthens the screen, and the display peaks at 3,000 nits, 15% brighter than the Fold7.

Where it earns its price is work. Two and three-way split views let you genuinely run multiple apps side by side rather than squinting at a phone-sized window, and the 5,000mAh battery is quoted at up to 27 hours of video, so the large screen does not come at the cost of making it to the evening. Now Nudge surfaces your likely next action, and transferring from an iPhone is handled by scanning a QR code.

The same warning applies here as to the Flip8, and more sharply because of the price. One rating is not evidence. At £1,899 this is the most expensive item in this ranking by £342, and there is currently no independent feedback on how the hinge, the crease or the battery hold up. If you want a large-format foldable and can wait, letting reviews accumulate for a few months costs you nothing.", // TEXTO SEO LONGO - EXPLICITO SOBRE A AMOSTRA DE 1
                'pros' => ['Largest screen here at 8 inches, plus 16GB of RAM', '200MP wide and upgraded 50MP ultra-wide cameras', 'Two and three-way split views for real multitasking', 'Up to 27 hours of video from 5,000mAh'], // PONTOS POSITIVOS
                'contras' => ['Most expensive phone here at £1,899, on a single review', 'No independent feedback yet on hinge or crease durability'], // PONTOS NEGATIVOS
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
        $this->command?->info("AndroidPhonesSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
