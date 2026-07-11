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
        // KEYWORDS ALVO: good android phones / most durable phone / new android phones /
        // best smartphone for seniors / best android phone right now / best samsung mobile /
        // best android phones 2026
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL) - TROQUE AQUI SE QUISER 'mobile-phones' OU OUTRA
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO
        ];

        $article = [
            'slug' => 'best-android-phones-uk',                                  // SLUG DO ARTIGO (URL)
            'title' => 'Best Android Phones UK',                                 // TITULO / H1
            'meta_title' => 'Best Android Phones UK 2026: Top 10 Samsung & Pixel', // TITLE DA ABA/GOOGLE (52 CHARS)
            'meta_description' => 'The best Android phones in the UK for 2026, from a £118 Samsung Galaxy to the Google Pixel 10 flagship. Compared on screen, cameras, battery and software support.', // META DESCRIPTION (~160 CHARS)
            'intro' => 'Android is where the choice is. Whether you want the best Samsung mobile for under £150, a Google Pixel with years of updates, or simply a good Android phone that will not let a parent or grandparent down, there is a device here for you. For this guide we focused on what actually matters day to day: a bright screen, a camera that copes with real life, a battery that lasts, and how many years of software updates you get, because that is what keeps a phone secure and usable long after you buy it. Below are ten of the most popular Android phones on Amazon UK for 2026, from budget Samsung Galaxy models to premium Pixels, with an honest look at what each one really offers.', // INTRO OTIMIZADA
            'conclusion' => 'Picking the best Android phone right now depends entirely on your budget and what you need it for. If you want maximum value, the Samsung Galaxy A16 gives you a big AMOLED screen and six years of updates for around £120, which also makes it one of the best smartphones for seniors thanks to that large, clear display. If you can spend more and want the most durable phone with the longest support, the Google Pixel 10 and 10a lead on software, with seven years of updates and Google\'s AI features. And if you just want a dependable everyday Samsung, the A17 and A26 sit comfortably in the middle. Whichever you choose, check the exact model, storage and whether it is 4G or 5G before you buy, because several of these come in near-identical variants.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => now(),                                             // DATA DE PUBLICACAO
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'Samsung Galaxy A16 4G, 6.7" Super AMOLED, 128GB (Blue Black)',            // NOME (ENCURTADO)
                'price' => '£122.30',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 915,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61nl8o9BpDL._AC_SY450_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung Galaxy A16 4G in Blue Black, front and back',                 // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/4eRdqes',                                       // LINK AFILIADO
                'summary' => 'Our top all-rounder: a 6.7-inch Super AMOLED screen, four cameras and, remarkably for the price, six years of software updates — all for around £120.', // TEXTO CURTO (CARD)
                'body' => 'The Samsung Galaxy A16 4G is the phone most people should look at first, and it is the reason it tops our list. For around £120 you get a large 6.7-inch Super AMOLED display, the same panel technology Samsung uses on far pricier phones, so colours are vivid and text is sharp. That big, bright screen also makes it one of the best smartphones for seniors, where legibility matters more than raw power.

The camera setup is generous for a budget phone: a 50MP main sensor, a 5MP ultra-wide for landscapes, a 2MP macro for close-ups and a 13MP front camera for selfies. Performance comes from an upgraded 2.4GHz processor with 4G connectivity, which Samsung says handles streaming and casual games without lag.

The headline, though, is longevity. Samsung promises six years of OS upgrades, which is extraordinary at this price and means the A16 stays secure and current long after cheaper rivals stop receiving patches. It also ships with a three-year manufacturer extended warranty. The box includes a USB-C charging cable and a SIM ejection pin.', // TEXTO SEO LONGO
                'pros' => ['Six years of OS updates, rare at this price', 'Large 6.7-inch Super AMOLED screen', '50MP main camera in a four-camera setup', 'Three-year extended warranty'], // PONTOS POSITIVOS
                'contras' => ['4G only, no 5G', 'Budget processor for heavy gaming'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'Blackview WAVE 9C, Android 15, 64GB + microSD, 5000mAh (Unlocked)',       // NOME (ENCURTADO)
                'price' => '£135.41',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.1,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 164,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71Z9JKJeJNL._AC_SY450_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Blackview WAVE 9C unlocked Android smartphone',                       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/44nnd62',                                       // LINK AFILIADO
                'summary' => 'A well-equipped budget alternative running Android 15, with a 5000mAh battery, expandable storage and face plus fingerprint unlock — but read the small print on its specs.', // TEXTO CURTO (CARD)
                'body' => 'The Blackview WAVE 9C is the non-Samsung wildcard here, and it packs a lot of features into a sub-£140 unlocked phone. It runs the latest Android 15 with a 5000mAh battery and 10W charging, unlocks with either face recognition or a fingerprint, and takes a dedicated microSD card alongside dual SIMs, so you can expand the 64GB of internal storage generously. It even bundles a 32GB card and a stand case in the box.

Its listed 12GB of RAM is worth understanding: that figure is 4GB of physical memory plus up to 8GB of "dynamic expansion" that borrows from storage, rather than 12GB of true RAM. The camera is similarly modest, and Blackview\'s own text describes a 16MP rear and 8MP front sensor. Blackview backs it with a two-year warranty and UK-based support.

One important clarification before you buy: despite "5G" appearing in the title, the supported cellular bands Blackview lists are GSM, 3G and 4G LTE only, so this is a 4G phone (the "5G" refers to 5GHz Wi-Fi). It is a capable budget device, but at a similar price the Galaxy A16 offers longer software support and Samsung\'s screen.', // TEXTO SEO LONGO
                'pros' => ['Latest Android 15 out of the box', '5000mAh battery with face and fingerprint unlock', 'Dedicated microSD slot plus a bundled 32GB card', 'Two-year warranty with UK support'], // PONTOS POSITIVOS
                'contras' => ['"12GB RAM" is 4GB physical plus virtual expansion', '4G LTE only despite "5G" in the title', 'Fewer reviews than the Samsung models'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'Samsung Galaxy A16 4G, 6.7" Super AMOLED, 128GB (Light Green)',           // NOME (ENCURTADO)
                'price' => '£117.91',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 915,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61rtHmU30yL._AC_SY450_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung Galaxy A16 4G in Light Green, front and back',                // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/44oaeAU',                                       // LINK AFILIADO
                'summary' => 'The same top-rated Galaxy A16, this time in Light Green and a few pounds cheaper — identical specs, so pick whichever colour and price suits you.', // TEXTO CURTO (CARD)
                'body' => 'This is the same Samsung Galaxy A16 4G that tops our ranking, offered in a Light Green finish and, at the time of writing, a little cheaper at around £118. Everything that makes the number-one pick so good applies here: the 6.7-inch Super AMOLED display, the 50MP-led four-camera system, the 2.4GHz processor and, crucially, six years of Samsung OS updates.

Because it is the same device, the choice between this and our top pick comes down to two things only: colour and whatever the live price happens to be on the day. If you prefer a lighter finish or this variant is cheaper when you look, buy this one with confidence.

It carries the same three-year manufacturer extended warranty and ships with a USB-C cable and SIM tool. For anyone who found the Blue Black sold out or pricier, this is simply the identical phone in a different jacket.', // TEXTO SEO LONGO
                'pros' => ['Identical A16 specs in a Light Green finish', 'Often a few pounds cheaper than the Blue Black', 'Six years of OS updates', 'Three-year extended warranty'], // PONTOS POSITIVOS
                'contras' => ['Same phone as our number one pick', '4G only, no 5G'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'Samsung Galaxy A05, Dual SIM, 64GB, 4GB RAM (Black)',                     // NOME (ENCURTADO)
                'price' => '£81.71',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 991,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/512lExVtgrL._AC_SY450_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung Galaxy A05 dual SIM smartphone in black',                     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/4wuKVJo',                                       // LINK AFILIADO
                'summary' => 'The cheapest Samsung here at around £82: a dual-SIM Galaxy A05 with 64GB storage and 4GB of RAM, for a genuine brand-name phone on a tight budget.', // TEXTO CURTO (CARD)
                'body' => 'If your budget is firmly under £100 and you want a Samsung, the Galaxy A05 is the entry point. At roughly £82 it is the most affordable phone in this ranking, and it still gives you a genuine, branded, dual-SIM handset with 64GB of storage and 4GB of RAM rather than an unknown name.

The product listing itself is very sparse, so we will not pretend to detail specs it does not confirm. What we can say is what the model is: a dual-LTE (4G) Galaxy A05 in black, a well-established budget line that has earned a solid 4.3 rating across nearly a thousand buyers.

Think of it as a dependable first smartphone, a spare, or a simple everyday phone for someone who mainly calls, messages and browses. If you want a larger screen, more cameras and longer software support, spending a little more on the A16 is the smarter long-term buy.', // TEXTO SEO LONGO
                'pros' => ['Cheapest phone in this list at around £82', 'Genuine branded Samsung, not an unknown name', 'Dual SIM with 64GB storage', 'Strong 4.3 rating from nearly 1,000 buyers'], // PONTOS POSITIVOS
                'contras' => ['Very limited information on the listing', 'Entry-level specs and 4G only'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'Samsung Galaxy A17 (A175F), 6.7" 90Hz AMOLED, 128GB, Dual SIM (Black)',   // NOME (ENCURTADO)
                'price' => '£137.86',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 127,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61Ni-LageEL._AC_SY450_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung Galaxy A17 smartphone in black',                              // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/3RwlZlU',                                       // LINK AFILIADO
                'summary' => 'A step up from the A16 with a smoother 90Hz AMOLED screen, a 50MP triple camera and a 5000mAh battery, running on Samsung\'s own Exynos chip.', // TEXTO CURTO (CARD)
                'body' => 'The Galaxy A17 (model A175F) is the natural upgrade if you like the A16 but want a smoother experience. Its 6.7-inch Super AMOLED display adds a 90Hz refresh rate, so scrolling and animations feel noticeably slicker, at a Full HD-class 1080x2220 resolution.

The camera is a familiar but capable triple setup: a 50MP main sensor joined by 5MP and 2MP supporting lenses, with a 13MP camera up front for selfies. Inside sits a Samsung Exynos octa-core processor with 4GB of RAM, and storage is expandable up to 2TB via microSD. A 5000mAh battery with USB-C fast charging keeps it going through the day, and it runs Android 14 with dual-SIM support and a full set of sensors.

At around £138 it costs a touch more than the A16 while adding that 90Hz screen and a bigger battery. With only 127 ratings it is newer and less proven than the A16, but it is a sensible mid-budget Samsung for anyone who wants a smoother display.', // TEXTO SEO LONGO
                'pros' => ['Smoother 90Hz Super AMOLED display', '50MP triple camera with 13MP selfie', '5000mAh battery with USB-C fast charging', 'Storage expandable up to 2TB'], // PONTOS POSITIVOS
                'contras' => ['Only 4GB of RAM', 'Fewer reviews than the A16'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'Samsung Galaxy A26 5G, 6.7" Super AMOLED FHD+, 8GB + 256GB (Black)',      // NOME (ENCURTADO)
                'price' => '£212.36',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 211,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61cONUaJzlL._AC_SY879_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung Galaxy A26 5G smartphone in black',                           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/4b6ySdh',                                       // LINK AFILIADO
                'summary' => 'The best-specified Samsung here: 5G, 8GB of RAM, a huge 256GB of storage and Android 15, for buyers who want headroom without going flagship.', // TEXTO CURTO (CARD)
                'body' => 'The Galaxy A26 5G is where this list moves from budget to genuine mid-range, and it is the most capable Samsung in the ranking. It pairs a 6.7-inch Super AMOLED FHD+ display with 5G connectivity, 8GB of RAM and a generous 256GB of internal storage, so it has far more headroom for apps, multitasking and photos than the 4GB budget models above it.

It runs Android 15 and carries a triple rear camera with 50MP, 8MP and 2MP sensors. That combination of more memory, more storage and 5G is what you are paying the extra for at around £212.

For anyone who keeps a phone for years, uses it heavily, or simply wants 5G and space that will not fill up quickly, the A26 is the sweet spot of this list: still clearly a value Samsung, but without the compromises of the cheapest models. If money is tighter, the A16 and A17 remain the smarter buys.', // TEXTO SEO LONGO
                'pros' => ['5G connectivity', 'Generous 8GB RAM and 256GB storage', '6.7-inch Super AMOLED FHD+ screen', 'Latest Android 15'], // PONTOS POSITIVOS
                'contras' => ['Most expensive Samsung here at around £212', 'Not a flagship processor'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'Google Pixel 10, 6.3" Actua Display, Triple Camera, 128GB (Obsidian)',    // NOME (ENCURTADO)
                'price' => '£583.70',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 904,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/614Qf9iukZL._AC_SX569_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Google Pixel 10 smartphone in Obsidian',                              // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/4bf06hG',                                       // LINK AFILIADO
                'summary' => 'The flagship of the group: a premium, ultra-durable Pixel with a new telephoto lens, 20x Super Res Zoom, Google\'s Gemini AI and seven years of updates.', // TEXTO CURTO (CARD)
                'body' => 'The Google Pixel 10 is the premium pick here and the phone to buy if you want the best Android experience rather than the best value. It centres on a 6.3-inch Actua display and an advanced triple rear camera, headlined by an all-new telephoto lens with 20x Super Res Zoom for getting close without losing detail.

It is built around Gemini, Google\'s AI assistant, which powers a lot of the software cleverness, and Google describes the design as premium and ultra-durable, so it should survive daily life better than the budget models above. Battery life is quoted at 24 or more hours.

The reason it earns a place despite the £580-plus price is support: Google promises seven years of new features and security updates, the longest in this list, which makes it arguably the most durable phone here in the sense that matters most — how long it stays safe and current. If that longevity and camera quality justify the outlay for you, it is the best Android phone right now in this group.', // TEXTO SEO LONGO
                'pros' => ['Seven years of updates, the longest here', 'New telephoto lens with 20x Super Res Zoom', 'Built around Google Gemini AI', 'Premium, ultra-durable design'], // PONTOS POSITIVOS
                'contras' => ['By far the most expensive at over £580', '128GB storage is modest for a flagship'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'Google Pixel 10a, 30+ Hour Battery, Gemini, 128GB (Obsidian)',            // NOME (ENCURTADO)
                'price' => '£454.13',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 288,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/610ZiBxq7bL._AC_SX569_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Google Pixel 10a smartphone in Obsidian',                             // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/3SUF15Z',                                       // LINK AFILIADO
                'summary' => 'The cheaper Pixel: the same seven years of updates and Gemini AI as the Pixel 10, plus 30+ hour battery and satellite SOS, for around £130 less.', // TEXTO CURTO (CARD)
                'body' => 'The Google Pixel 10a is the value route into the Pixel family, and at around £454 it undercuts the Pixel 10 while keeping the things that make a Pixel special. Chief among them is software: it comes with seven years of OS and security updates, plus new and upgraded features through Pixel Drops, so it stays current for longer than almost anything else you can buy.

Battery life is a genuine strength, quoted at 30 or more hours with fast charging, and it leans heavily on Google\'s AI: Gemini handles day-to-day tasks, and the Photos app makes advanced edits like removing objects or changing backgrounds in a few taps. A standout safety feature is satellite connectivity for emergency services when you have no mobile or Wi-Fi signal, which can share your location with contacts.

It earns the highest Pixel rating in our list at 4.5. If you want most of the Pixel 10\'s experience, including that seven-year support promise, but would rather not pay flagship money, the 10a is the smarter Pixel for most people.', // TEXTO SEO LONGO
                'pros' => ['Seven years of OS and security updates', '30+ hour battery with fast charging', 'Satellite SOS for emergencies with no signal', 'Around £130 cheaper than the Pixel 10'], // PONTOS POSITIVOS
                'contras' => ['Still a premium price at around £454', 'Fewer reviews than the Pixel 10'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'Samsung Galaxy A40, 5.9" FHD+, Dual SIM, 64GB (Black)',                   // NOME (ENCURTADO)
                'price' => '£82.88',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 1300,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71RWK7bf3kL._AC_SL1500_.jpg',        // IMAGEM CORRETA DO GALAXY A40 (SUBSTITUI A FOTO ERRADA DA PLANILHA)
                'alt_text' => 'Samsung Galaxy A40 dual SIM smartphone in black',                     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/44VjLzz',                                       // LINK AFILIADO
                'summary' => 'A compact 5.9-inch Samsung with a rear fingerprint scanner and dual SIM — one of the smaller, more pocketable options here, though it is an older model.', // TEXTO CURTO (CARD)
                'body' => 'The Galaxy A40 stands out for one reason in a sea of 6.7-inch phones: at 5.9 inches it is genuinely compact and easy to use one-handed, which suits anyone who finds today\'s large phones unwieldy. It pairs an Infinity-U FHD+ display with a rear fingerprint scanner and dual-SIM support, and it has racked up a strong 4.3 rating across 1,300 buyers, the most reviews of any phone in this list.

The camera details on the listing focus on a 5MP ultra-wide, and the battery is a 3100mAh cell with 15W fast charging. The box is well stocked, including a UK travel adapter, a USB-C cable and earphones, with around 49GB of usable storage from the 64GB total.

Be aware that the A40 is an older model rather than a current release, so its battery is smaller and its software support shorter than the newer phones above. It is best viewed as a compact, affordable everyday phone from a trusted brand rather than a long-term investment.', // TEXTO SEO LONGO
                'pros' => ['Compact 5.9-inch size, easy one-handed use', 'Rear fingerprint scanner and dual SIM', 'Most reviews in this list at 1,300', 'Generous box with adapter and earphones'], // PONTOS POSITIVOS
                'contras' => ['An older model with a smaller 3100mAh battery', 'Shorter software support than newer phones'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'Samsung Galaxy A17 5G (2025), 128GB, Dual SIM, NFC (Black)',              // NOME (ENCURTADO)
                'price' => '£134.25',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 840,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/41UmQEIF68L._AC_SY300_SX300_QL70_ML2_.jpg', // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung Galaxy A17 5G smartphone in black',                           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/4gx9n8i',                                       // LINK AFILIADO
                'summary' => 'The 5G version of the A17: an unlocked 2025 model with 128GB storage, dual SIM and NFC for contactless payments, at a budget-friendly price.', // TEXTO CURTO (CARD)
                'body' => 'Rounding out the list is the Samsung Galaxy A17 5G, a 2025 model and the more future-proof sibling of the A175F at number five. The key difference is in the name: this one adds 5G connectivity, so it is ready for faster mobile data where the 4G models are not.

It comes unlocked with 128GB of storage, 4GB of RAM, dual-SIM support and NFC, which means you can use contactless payments like Google Pay, a feature not all budget phones include. Samsung also flags built-in AI features on this model.

The listing itself is light on further detail, so we have stuck to what is confirmed rather than guessing at specs. If you want a current, affordable Samsung that is 5G-ready and supports contactless payments, this is the one to pick over the 4G A17. Just double-check you are buying the 5G version, as the A17 name is shared with the 4G model earlier in this list.', // TEXTO SEO LONGO
                'pros' => ['5G ready, unlike the 4G A17', 'NFC for contactless payments', '128GB storage and dual SIM', 'Current 2025 model with a strong 4.4 rating'], // PONTOS POSITIVOS
                'contras' => ['Sparse specifications on the listing', 'Shares the A17 name with the different 4G model'], // PONTOS NEGATIVOS
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
