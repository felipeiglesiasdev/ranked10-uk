<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class PortableBlendersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE PORTABLE BLENDERS DE FORMA IDEMPOTENTE
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // PARA CRIAR UMA NOVA LISTA, COPIE database/seeders/lists/_TemplateSeeder.php.example
        // ═══════════════════════════════════════════════════════════════

        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
// PARA RODAR SOMENTE ESTA LISTA: php artisan db:seed --class="Database\Seeders\Lists\PortableBlendersSeeder"

$category = [
    'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
    'name' => 'Kitchen',                    // NOME EXIBIDO
    'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO
];

$article = [
    'slug' => 'best-portable-blenders-uk',           // SLUG DO ARTIGO (URL)
    'title' => 'Best Portable Blenders UK',          // TITULO / H1
    'intro' => 'A good portable blender turns fresh fruit, ice and protein powder into a smooth drink in seconds, wherever you happen to be. Whether you want a pocket-sized cup for the gym, a USB-rechargeable model for travelling, or a more powerful unit for the kitchen worktop, there is something here for every routine and budget. We have compared ten of the most popular portable blenders available in the UK on blending power, battery life, capacity, ease of cleaning and value to help you pick the right one.', // INTRO
    'conclusion' => 'The best portable blender for you depends on how and where you plan to use it. Compact USB-rechargeable cups are ideal for the gym and travel, while higher-wattage models with multiple bottles suit busy households making several drinks a day. As a rule, look for BPA-free cups, a leak-proof lid with a sip spout, dishwasher-safe parts and enough power to handle ice if you enjoy frozen smoothies. Match those features to your daily routine and you will have a blender that earns its place on the worktop or in your bag.', // CONCLUSAO
    'author' => 'Editorial Team',
    'published_at' => now(),
];

$products = [
    [
        'position' => 1,
        'name' => 'Personal Blender [Upgraded], Portable Blender for Shakes & Smoothies, USB Rechargeable, 6 Stainless Steel Blades',
        'price' => '£19.99',
        'rating' => 5.0,
        'reviews_count' => 21,
        'image' => 'https://m.media-amazon.com/images/I/71QzWi7pAbL._AC_SL1500_.jpg',
        'affiliate_link' => 'https://amzn.to/4uTHcE4',
        'summary' => 'A budget-friendly USB-rechargeable mini blender with a 22,000 RPM motor and six stainless steel blades, built for shakes and smoothies on the go.',
        'body' => 'This upgraded personal blender is one of the most affordable ways to get into portable blending, pairing a high-speed motor that spins up to 22,000 times per minute with six stainless steel blades to break down fruit and make smooth shakes. At just 480g and with a 380ml capacity, it is genuinely pocket-friendly and easy to drop into a gym bag or work rucksack.

The 1800mAh battery delivers around ten to twelve blends per charge and tops up over a waterproof USB-C port, with the cable included. A one-button operation keeps things simple, and a self-cleaning mode means you just add water, press, and rinse. Every part is BPA-free, which is reassuring for daily use.

It is best understood as a light-duty blender for single servings rather than a worktop workhorse, so it suits soft fruit, protein shakes and pre-cut ingredients more than heavy ice crushing. For the price, it is a sensible first portable blender for students, commuters and gym-goers.',
        'pros' => ['Very affordable', 'Lightweight and genuinely portable at 480g', 'USB rechargeable with self-cleaning mode', 'BPA-free parts'],
        'contras' => ['Small 380ml capacity', 'Very few customer reviews so far'],
    ],
    [
        'position' => 2,
        'name' => 'Portable Blender, Personal Blender USB Rechargeable for Shakes & Smoothies, 6 Blades',
        'price' => '£16.99',
        'rating' => 5.0,
        'reviews_count' => 17,
        'image' => 'https://m.media-amazon.com/images/I/612Vl1vNVlL._AC_SL1200_.jpg',
        'affiliate_link' => 'https://amzn.to/44sKTFW',
        'summary' => 'The cheapest blender in our guide, with a magnetic safety switch, six 304 stainless steel blades and a detachable cup that is easy to clean.',
        'body' => 'If your priority is keeping costs down, this personal blender is the lowest-priced option in our list and still covers the essentials. It uses six 304 stainless steel blades driven by a pure copper motor to turn fruit and vegetables into smoothies in around a minute, and the makers say a full charge yields 13 to 15 cups before you need to plug it back in.

A nice touch is the magnetic induction switch, which only allows the blender to run when the cup and base are correctly aligned, adding a layer of safety. The cup is detachable for easy rinsing, and the built-in battery charges from any USB source such as a laptop, power bank or phone charger in three to four hours.

As with most budget cups, it is happiest with soft ingredients and small pieces rather than large frozen chunks or hard nuts. For an everyday smoothie or protein shake on a tight budget, though, it is hard to argue with the price.',
        'pros' => ['Lowest price in this guide', 'Magnetic safety switch', '13–15 cups per full charge', 'Detachable cup is easy to clean'],
        'contras' => ['Not suited to hard or large frozen ingredients', 'Very small review count'],
    ],
    [
        'position' => 3,
        'name' => 'nutribullet Flex 591ml Portable Blender with Spout Lid, USB-C, BPA-Free Cup, Purple (NBP013VT)',
        'price' => '£103.99',
        'rating' => 4.6,
        'reviews_count' => 10296,
        'image' => 'https://m.media-amazon.com/images/I/619kxH78nvL._AC_SL1500_.jpg',
        'affiliate_link' => 'https://amzn.to/4y1R6q6',
        'summary' => 'A premium portable blender from a trusted brand, with a large 591ml Tritan cup, detachable motor base and more than 10,000 customer ratings behind it.',
        'body' => 'The NutriBullet Flex is the most established name in this guide, and with over ten thousand customer ratings at a strong 4.6 average it is the safe choice for anyone who wants a portable blender from a brand they recognise. The headline feature is a detachable motor base that cuts the weight by around half once you have finished blending, so the part you actually carry and drink from is much lighter.

The 591ml graduated Tritan cup is a generous size for a portable model, and the 100W motor with four stainless steel blades handles frozen fruit and cold drinks comfortably. A leak-proof travel lid with a carry handle makes it easy to take with you, and the LED battery indicator shows you at a glance how many of its 15-plus 30-second cycles remain before a USB-C recharge.

Cleaning is straightforward thanks to dishwasher-safe removable blades and bowl, or a quick blend of soapy water. It is the priciest option here, but the build quality, capacity and review history justify the premium for many buyers.',
        'pros' => ['Trusted brand with 10,000+ ratings', 'Large 591ml Tritan cup', 'Detachable base is lighter to carry', 'Dishwasher-safe blades and bowl'],
        'contras' => ['Most expensive in this guide', 'Modest 100W motor for the price'],
    ],
    [
        'position' => 4,
        'name' => 'Ninja Blast Portable Blender, 530ml, Leakproof Lid & Sip Spout, Cordless, Black (BC151UKBK)',
        'price' => '£36.99',
        'rating' => 4.4,
        'reviews_count' => 4293,
        'image' => 'https://m.media-amazon.com/images/I/61vBPSO71LL._AC_SL1400_.jpg',
        'affiliate_link' => 'https://amzn.to/4w7soCD',
        'summary' => 'Ninja\'s compact and quiet cordless blender, with a stainless steel BlastBlade for ice, a leak-proof sip lid and thousands of positive reviews.',
        'body' => 'The Ninja Blast brings a well-known kitchen brand to the portable category, and with more than four thousand ratings it is one of the most popular cordless models in the UK. Ninja describes it as its most compact and quietest blender, and the stainless steel BlastBlade assembly is designed to crush ice and frozen fruit into genuinely smooth drinks rather than the slushy results cheaper cups can produce.

The 530ml BPA-free cup comes with a leak-proof lid, sip spout and a comfortable carry handle, so you can blend and drink from the same container at the gym, the office or the park. Blade and cup covers are included for hygienic storage in a bag, which is a thoughtful detail for commuters.

A USB-C rechargeable base delivers more than ten blends and up to two hours of battery life, with a full charge taking around two hours. The lid and cup are top-rack dishwasher safe, and Ninja offers a two-year guarantee on registration for UK and ROI customers, adding peace of mind at a mid-range price.',
        'pros' => ['Trusted Ninja brand', 'Crushes ice well for its size', 'Leak-proof lid with sip spout and covers', 'Two-year guarantee on registration'],
        'contras' => ['Slightly lower average rating than some rivals', 'Around 10 blends per charge'],
    ],
    [
        'position' => 5,
        'name' => 'Ninja Blast Max Portable Blender, 570ml, 3x Blend Functions, Cordless, Navy (BC251UKNV)',
        'price' => '£65.50',
        'rating' => 4.5,
        'reviews_count' => 213,
        'image' => 'https://m.media-amazon.com/images/I/61ABnGWWjXL._AC_SL1500_.jpg',
        'affiliate_link' => 'https://amzn.to/43XIcMr',
        'summary' => 'The more powerful big brother of the Ninja Blast, with three blending functions, a bigger 570ml cup and up to 25 blends per charge.',
        'body' => 'The Ninja Blast Max sits a step above the standard Blast, with a more powerful motor that shaves ice and crushes frozen ingredients in seconds. It is the most capable Ninja cordless blender here, and the upgrade shows in both performance and battery life.

Where the regular Blast keeps things simple, the Max adds three one-touch blending functions, including dedicated Crush and Smoothie modes plus a Manual Blend option, giving you more control over texture. The 570ml twist-and-go cup is slightly larger too, with a leak-proof lid, sip spout and carry handle for drinking on the move.

Battery life is a real highlight, with up to 25 blends on a single charge, comfortably more than most rivals in this guide. At £65.50 it is a mid-to-premium choice, but for anyone who blends frozen fruit and ice regularly and wants Ninja reliability without stepping up to the priciest option, it strikes a sensible balance.',
        'pros' => ['More powerful motor than standard Blast', 'Three blending functions for texture control', 'Up to 25 blends per charge', 'Larger 570ml cup'],
        'contras' => ['Pricier than the standard Ninja Blast', 'Fewer reviews than the original model'],
    ],
    [
        'position' => 6,
        'name' => 'H-Duka Smoothie Blender, 25,000 RPM, with 37oz/32oz/23oz Cups, 2-in-1 Blender & Grinder',
        'price' => '£67.45',
        'rating' => 4.6,
        'reviews_count' => 52,
        'image' => 'https://m.media-amazon.com/images/I/71C0CXmum6L._AC_SL1500_.jpg',
        'affiliate_link' => 'https://amzn.to/4gBpWjk',
        'summary' => 'A powerful 1200W 2-in-1 blender and grinder with three cups, reaching 25,000 RPM for ice, frozen fruit and even nut butters.',
        'body' => 'The H-Duka is the most powerful unit in this guide, with a 1200W motor reaching up to 25,000 RPM. That puts it closer to a compact countertop blender than a pocket cup, making it the pick for anyone who wants to crush ice, frozen fruit and nuts with ease and get consistently smooth results for daily smoothies, protein shakes or homemade nut butters.

Its standout feature is a 2-in-1 system: a six-blade stainless steel assembly for blending and a separate two-blade attachment for grinding coffee, spices and nuts. Three BPA-free cups in 37oz, 32oz and 23oz sizes cover everything from family batches to single servings, and the set includes two travel lids and a resealable lid for storage and on-the-go use.

Safety and stability are well considered, with a lock-to-run design, leak-resistant base, non-slip suction cups and ventilation to protect the motor. All cups are dishwasher safe, and a self-clean function makes maintenance painless. Note that this is a corded model, so it trades true cordless portability for serious blending power.',
        'pros' => ['Most powerful motor here at 1200W / 25,000 RPM', '2-in-1 blending and grinding system', 'Three cup sizes plus travel and storage lids', 'Dishwasher-safe cups'],
        'contras' => ['Corded, so less portable', 'Bulkier than pocket-style cups'],
    ],
    [
        'position' => 7,
        'name' => 'La Reveuse Smoothie Blender Personal Size with 2 BPA-Free Travel Bottles (550ml), 300W, Silver',
        'price' => '£27.99',
        'rating' => 4.4,
        'reviews_count' => 3603,
        'image' => 'https://m.media-amazon.com/images/I/71ibHGEsG0L._AC_SL1500_.jpg',
        'affiliate_link' => 'https://amzn.to/4al4T0J',
        'summary' => 'A well-reviewed corded personal blender with two 550ml travel bottles, a 300W motor and a simple press-and-twist operation.',
        'body' => 'The La Reveuse is a popular corded personal blender with over three and a half thousand ratings, offering a dependable middle ground between pocket cups and full countertop machines. Its 300W motor and four-leaf stainless steel blade are strong enough to handle fruit and vegetables for smoothies, shakes, baby formula and morning protein drinks.

Operation could not be simpler: press down and twist the bottle to lock it into place for continuous blending, then unlock to stop. The set includes two 550ml BPA-free bottles with leak-proof lids, so two members of the household can each have their own, or you can prepare a second drink in advance and store it for later.

Compact enough to tuck into a cabinet or drawer, it suits home and office use and makes a practical gift. Because it is mains-powered rather than rechargeable, it is best for people who blend in one place rather than truly on the move, but the low price and strong review history make it excellent value.',
        'pros' => ['Strong review history at this price', 'Two 550ml BPA-free travel bottles', 'Simple press-and-twist operation', 'Compact for storage'],
        'contras' => ['Corded, not rechargeable', 'Modest 300W power for tough ingredients'],
    ],
    [
        'position' => 8,
        'name' => 'Qxmcov Blender Smoothie Maker, 500W, Mini Personal Blender with 2 BPA-Free Bottles (600ml)',
        'price' => '£35.99',
        'rating' => 4.6,
        'reviews_count' => 1468,
        'image' => 'https://m.media-amazon.com/images/I/71Zhe3vY3QL._AC_SL1500_.jpg',
        'affiliate_link' => 'https://amzn.to/4xNAX7i',
        'summary' => 'A 500W copper-motor blender reaching 22,000 RPM, supplied with two 600ml travel bottles and a strong 4.6 rating from over 1,400 buyers.',
        'body' => 'The Qxmcov blender balances power, portability and price well, which helps explain its strong 4.6 average from more than fourteen hundred ratings. An upgraded all-copper turbo motor delivers 500W and speeds up to 22,000 RPM, paired with four thickened 304 stainless steel cross blades to blend baby food, fruit, vegetables, smoothies and milkshakes, and even chop herbs and peppers.

You get two 600ml BPA-free travel bottles that fit most car cup holders, designed to be shatterproof and easy to grip for cycling, camping or the daily commute. One-touch operation keeps it intuitive: press and hold to blend, release to stop. Every detachable part, including blades and bottles, is dishwasher safe, while the stainless steel body wipes clean easily.

Safety features include food-grade silicone rings to reduce leaks, overheat protection on the motor, a ventilation system and non-slip pads for stable blending. It only runs when a bottle is locked in place. For a mid-priced portable blender with two bottles and reassuring reviews, it is a strong all-rounder.',
        'pros' => ['Strong 4.6 rating from 1,400+ buyers', '500W copper motor at 22,000 RPM', 'Two 600ml travel bottles included', 'Dishwasher-safe parts and overheat protection'],
        'contras' => ['Mains-powered design', 'Plastic bottles rather than glass'],
    ],
    [
        'position' => 9,
        'name' => 'TENKER Portable Mini Blender, 850W, with 2x 650ml Bottles, 2 To-Go Lids and 300ml Grinder',
        'price' => '£31.89',
        'rating' => 4.1,
        'reviews_count' => 278,
        'image' => 'https://m.media-amazon.com/images/I/71P5CxAEoML._AC_SL1500_.jpg',
        'affiliate_link' => 'https://amzn.to/4v4JIHS',
        'summary' => 'A high-wattage 850W mini blender bundle with two large 650ml bottles, a separate grinder cup and six-blade stainless steel assembly.',
        'body' => 'The TENKER stands out for packing a lot into a budget price, headlined by a peak 850W copper turbo motor running at 23,000 RPM. That power, combined with a detachable six-leaf 304 stainless steel blade, lets it crush ice and frozen ingredients and turn tough foods into smoothies and shakes in around ten seconds.

The bundle is generous: two BPA-free 650ml bottles, the largest cups in this guide, plus two to-go lids and portable hooks for carrying to the office, gym or car. There is also a 300ml grinding cup with flat blades for coffee beans, nuts and spices, adding useful versatility for anyone who wants more than just smoothies.

Sensible safety touches include a press-to-run cup, a cooling fan to dissipate heat and four non-slip silicone pads for stability, and all cups and lids are dishwasher safe. Its review average is a little lower than some rivals here, but for large-capacity bottles plus a grinder at this price, it offers a lot of flexibility.',
        'pros' => ['High 850W peak power', 'Largest bottles here at 2x 650ml', 'Includes a separate grinder cup', 'Dishwasher-safe cups and lids'],
        'contras' => ['Lowest average rating in this guide', 'Bulky with two large bottles'],
    ],
    [
        'position' => 10,
        'name' => 'Personal Blender [Upgraded], Portable Blender for Shakes & Smoothies, USB Rechargeable, 12 Stainless Steel Blades',
        'price' => '£19.99',
        'rating' => 5.0,
        'reviews_count' => 21,
        'image' => 'https://m.media-amazon.com/images/I/716YmWOfNxL._AC_SL1500_.jpg',
        'affiliate_link' => 'https://amzn.to/4vovhPz',
        'summary' => 'A compact USB-rechargeable cup with a 12-blade design and self-cleaning mode, aimed at smoothies and shakes for the gym, office or travel.',
        'body' => 'This SIXNEA personal blender rounds off the guide with a 12-blade take on the affordable portable cup. The high-performance motor spins up to 22,000 times per minute, and the makers position the higher blade count as a way to break ingredients down more finely for smoother shakes and smoothies.

At 380ml and 480g, it is squarely a single-serve, take-anywhere design, easy to carry to the gym, office or on a trip and small enough to keep a prepared drink in the fridge. The 1800mAh battery gives roughly ten to twelve uses per charge through a waterproof USB-C port, and a one-button self-cleaning mode means you simply add water and let it rinse itself.

All parts are BPA-free for safe daily drinking. Like other cups in this class, it is best with soft fruit and pre-cut ingredients rather than heavy ice loads. For a low-cost, genuinely portable blender with a self-clean function, it is an easy everyday option.',
        'pros' => ['Affordable', '12-blade design for finer blending', 'Self-cleaning mode', 'USB-C rechargeable and BPA-free'],
        'contras' => ['Small 380ml single-serve capacity', 'Very few reviews so far'],
    ],
];
// ═══ FIM DA AREA EDITAVEL ═══

        // ═══════════════════════════════════════════════════════════════
        // ═══ FIM DA AREA EDITAVEL ═══
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

        // INFORMA O RESULTADO NO TERMINAL (SO QUANDO RODADO COM SAIDA DE CONSOLE)
        $this->command?->info("PortableBlendersSeeder: 1 categoria, 1 artigo e ".count($products)." produtos."); // RESUMO DO QUE FOI POPULADO
        $this->command?->info("URL do artigo: /{$category['slug']}/{$article['slug']}"); // URL ONDE O ARTIGO FICA ACESSIVEL
    }
}
