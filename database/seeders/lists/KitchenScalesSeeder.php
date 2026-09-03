<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class KitchenScalesSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE BALANCAS DE COZINHA DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=digital+kitchen+scales&rh=p_36%3A800-  (22 ASINS, 13 FICHAS ABERTAS)
        // CATEGORIA KITCHEN (COMISSAO 5%). SAZONAL: EVERGREEN, SOBE NO NATAL/EPOCA DE BOLOS.
        //
        // PADRAO EDITORIAL NOVO (30/08): E UM TOP 10, NAO UM ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── EIXO DE COMPRA (TERRENO SPEC-DRIVEN, IGUAL AO CLUSTER DE MICROSD) ───
        //   CAPACIDADE: 3kg (SALTER ARC) / 5kg / 10kg / 15kg. GRADUACAO: 1g (DIA A DIA) / 0.1g / 0.01g (CAFE, ESPECIARIA).
        //   ENERGIA: PILHA x USB-C RECARREGAVEL. EXTRAS: TIGELA, A PROVA DAGUA, DISPLAY QUE PUXA (OXO), APP (COSORI).
        //
        // ─── O QUE MUDA A COMPRA (ENTRA NO TEXTO) ───
        //   SALTER ARC SO VAI ATE 3kg — UMA TIGELA CHEIA DE FARINHA+LIQUIDO PASSA DISSO. → CONTRA.
        //   OXO £55 x ACCUWEIGHT £8: O UNICO DIFERENCIAL QUE JUSTIFICA E O DISPLAY QUE PUXA (NAO SOME SOB TIGELA GRANDE).
        //   0.01g SO NA PLATAFORMA MENOR DA DIYIFE DUAL; A PLATAFORMA GRANDE E 1g. EXPLICAR.
        //   COSORI: O VALOR E CONTAGEM DE CALORIA/NUTRIENTE VIA BASE UK + AI SCAN, NAO SO PESAR. CUSTA MAIS.
        //
        // PROFUNDIDADE (FICHA): 38.286 / 30.993 / 23.112 / 10.161 / 8.555 / 1.444 / 685 / 274 / 227 / 93.
        // CORTE: GRAM PRES DUAL 0.01g (36 AVAL.) — DIYIFE DUAL (93) TEM MAIS E E MAIS BARATA NO MESMO PAPEL.
        //        SALTER BRITISH BAKES 10kg (110) — REDUNDANTE COM OS DOIS SALTER MAIS AVALIADOS.
        //
        // ⚠ FICHA DA DIYIFE 15kg RECH. TROUXE UM BULLET "[BLOCKED: Cookie/query string data]" — IGNORADO.
        //
        // FOCUS KEYWORD: best kitchen scales
        // VARIACOES TRABALHADAS: digital kitchen scales / best digital kitchen scales / food scale /
        // cooking scales / baking scales / kitchen scales with bowl / 0.01g kitchen scale /
        // rechargeable kitchen scales / kitchen scales 15kg / kitchen scales tare
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DE "kitchen")
        ];

        $article = [
            'slug' => 'best-kitchen-scales',                                          // SLUG DO ARTIGO (URL) - FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Kitchen Scales 2026: 10 Digital Food Scales Ranked',      // TITULO / H1
            'meta_title' => 'Best Kitchen Scales 2026: 10 Digital Scales Ranked',      // TITLE DA ABA/GOOGLE
            'meta_description' => 'The best kitchen scales for UK baking, from Salter and OXO to budget and 0.01g precision picks. Ten food scales compared on capacity, accuracy and price.', // META DESCRIPTION
            'focus_keyword' => 'best kitchen scales',                                // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE

            'intro' => "If you want the short answer, the ACCUWEIGHT 201 is the best kitchen scales for most people: more than 38,000 customer ratings at 4.5 stars, a 5kg capacity with 1g steps, and a price of just GBP 7.99. If you would rather buy a name you know, the Salter 1036 does the same job on a stainless steel platform with over 30,000 ratings for GBP 15.

Digital kitchen scales all cover the basics — weigh to the gram, zero out the bowl with a tare button, and switch between grams and ounces — so the choice comes down to three things. Capacity is how much they weigh at once, from 3kg for light baking up to 15kg for big batches. Graduation is how fine they read: 1g is right for everyday cooking, while 0.1g or 0.01g matters for coffee, spices and yeast. And power is either replaceable batteries or a USB-C rechargeable cell. We compared ten food scales on those three, plus customer ratings and price, and ranked them below.",

            'conclusion' => "For everyday cooking and baking the best kitchen scales here are the ACCUWEIGHT 201. Nothing else on the page has close to its 38,000 ratings, it weighs to the gram up to 5kg, and it costs under eight pounds. If you would rather have a trusted brand, either Salter does the same for a little more, though the Arc tops out at 3kg, so choose the 1036 if you weigh heavier batches.

Spend more only for a specific reason. The OXO earns its higher price with a pull-out display you can still read under a large bowl. Choose the waterproof Diyife if you want to rinse the scale under the tap, the NUTRI FIT if you want a bowl included, or a rechargeable model if you are tired of buying batteries. And if you weigh coffee or spices, the 0.01g dual-platform Diyife reads far finer than any 1g scale here, as long as you are comfortable with its smaller review count.",

            'author' => 'Felipe Iglesias',                                           // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-09-01 15:00:00',                                 // DATA FIXA — NAO USAR now()
        ];

        // ─── FICHA: good = MELHOR DA LISTA NO QUESITO, bad = PIOR, neutral = MEIO. COMPARA OS DEZ ENTRE SI. ───
        $products = [
            [
                'position' => 1,
                'name' => 'ACCUWEIGHT 201 Digital Kitchen Scales, 5kg/1g, Tempered Glass',
                'price' => '£7.99',
                'rating' => 4.5,
                'reviews_count' => 38286,
                'image' => 'https://m.media-amazon.com/images/I/41R2vghvorL._AC_SL1500_.jpg',
                'alt_text' => 'best kitchen scales',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07KC3HPVN?tag=ranked10-21',
                'summary' => 'The best kitchen scales for most people. More than 38,000 ratings at 4.5 stars, a 5kg capacity to the gram, and the lowest price on the page.',
                'body' => "Thirty-eight thousand two hundred and eighty-six ratings at 4.5 stars is why this is first. No other scale in this comparison has anything close to that much customer feedback, and it is also the cheapest here at GBP 7.99, which makes it the obvious starting point for anyone who just wants accurate weights for everyday cooking and baking.

It covers everything you actually use: a 5kg capacity in 1g steps, four precision sensors, a tare and auto-zero button to cancel out the weight of a bowl, unit switching between grams, pounds and ounces, and a backlit LCD. The tempered glass platform wipes clean, and the batteries are included so it works out of the box.

The limits are the ones you accept at this price. Five kilograms is plenty for most recipes but not for the biggest batch cooking, and 1g is the everyday standard rather than the fine resolution you would want for coffee or spices. For those, look further down the list; for normal cooking, this is all the scale most kitchens need.",
                'pros' => ['38,286 ratings at 4.5 stars, by far the most trusted scale here', 'GBP 7.99, the cheapest on the page', '5kg capacity in 1g steps, right for everyday cooking', 'Four sensors, tare, backlit display and unit switching', 'Batteries included, works straight away'],
                'contras' => ['1g steps, not the fine resolution for coffee or spices', '5kg capacity, below the 15kg batch scales here', 'Battery powered rather than rechargeable', 'Glass platform shows fingerprints'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '38,286 at 4.5 stars', 'verdict' => 'good', 'note' => 'By far the most feedback in this comparison.'],
                    ['label' => 'Price', 'value' => '£7.99', 'verdict' => 'good', 'note' => 'The cheapest scale here.'],
                    ['label' => 'Capacity', 'value' => '5 kg', 'verdict' => 'neutral'],
                    ['label' => 'Graduation', 'value' => '1 g', 'verdict' => 'neutral', 'note' => 'Everyday standard.'],
                    ['label' => 'Power', 'value' => 'Battery, included', 'verdict' => 'neutral'],
                    ['label' => 'Platform', 'value' => 'Tempered glass', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Salter 1036 Digital Kitchen Scale, 5kg, Stainless Steel Disc, Add & Weigh',
                'price' => '£15.00',
                'rating' => 4.5,
                'reviews_count' => 30993,
                'image' => 'https://m.media-amazon.com/images/I/71o6B9CWV7L._AC_SL1500_.jpg',
                'alt_text' => 'Salter 1036 digital kitchen scale with stainless steel disc platform',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B000ZNM51O?tag=ranked10-21',
                'summary' => 'The trusted-brand pick. Salter has made scales for generations; this one has 30,993 ratings, a stainless disc that holds any bowl, and add-and-weigh.',
                'body' => "If you would rather buy a name that has been in British kitchens for generations, this is the pick. Salter is the best-known scale brand in the UK, and the 1036 backs the reputation with 30,993 ratings at 4.5 stars, second only to the ACCUWEIGHT for feedback on this page.

The design is well thought out. The stainless steel disc platform holds most mixing bowls while leaving the display visible, the add-and-weigh function lets you tip several ingredients into the same bowl and zero between each, and it switches between metric and imperial. Capacity is 5kg in 1g steps, the everyday standard, and the slim body stores flat in a drawer.

At GBP 15 it costs roughly twice the ACCUWEIGHT for a similar specification, so you are paying for the brand, the stainless platform and the reassurance of a long track record. For many buyers that is worth it; if the budget is the priority, the scale above does the same core job for less.",
                'pros' => ['Best-known UK scale brand with a long track record', '30,993 ratings at 4.5 stars, second most here', 'Stainless disc platform holds a bowl without hiding the display', 'Add-and-weigh for multiple ingredients in one bowl', 'Metric and imperial, slim to store'],
                'contras' => ['Around twice the price of the ACCUWEIGHT for a similar spec', '5kg capacity and 1g steps, the everyday standard', 'Battery powered', 'No fine resolution for coffee or spices'],
                'specs' => [
                    ['label' => 'Brand', 'value' => 'Salter', 'verdict' => 'good', 'note' => 'The best-known UK scale name.'],
                    ['label' => 'Customer ratings', 'value' => '30,993 at 4.5 stars', 'verdict' => 'good', 'note' => 'Second most here.'],
                    ['label' => 'Capacity', 'value' => '5 kg', 'verdict' => 'neutral'],
                    ['label' => 'Platform', 'value' => 'Stainless disc', 'verdict' => 'good', 'note' => 'Holds a bowl, display stays visible.'],
                    ['label' => 'Price', 'value' => '£15.00', 'verdict' => 'neutral'],
                    ['label' => 'Graduation', 'value' => '1 g', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Salter Arc Digital Kitchen Scale, 3kg, Add & Weigh, Gloss Black',
                'price' => '£10.00',
                'rating' => 4.5,
                'reviews_count' => 23112,
                'image' => 'https://m.media-amazon.com/images/I/81eemIqaSfL._AC_SL1500_.jpg',
                'alt_text' => 'Salter Arc digital kitchen scale in gloss black',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00140VYEG?tag=ranked10-21',
                'summary' => 'A cheaper Salter with 23,112 ratings. The same trusted brand for GBP 10, with one catch: it only weighs up to 3kg.',
                'body' => "The Arc is the way to get Salter reliability for less. At GBP 10 it undercuts the 1036 above, comes with 23,112 ratings at 4.5 stars, and keeps the add-and-weigh function so you can measure several ingredients into one bowl and zero between each. The gloss black body is compact and the battery is included, so it works straight away.

For light, everyday baking — biscuits, a single cake, weighing pasta or rice — it is more than enough, and the brand name and huge review count make it a safe, cheap choice.

The one thing to check before you buy is capacity. The Arc tops out at 3kg, which is lower than every other scale in this comparison. A full mixing bowl of flour and liquid for a large bake can pass 3kg, and once you exceed the limit the scale simply will not read, so if you cook in big batches choose the 1036 or one of the 10 to 15kg scales instead.",
                'pros' => ['Salter brand and 23,112 ratings for GBP 10', 'Add-and-weigh for several ingredients in one bowl', 'Compact gloss body, battery included', '4.5 star average on a huge sample', 'A cheap, safe everyday choice'],
                'contras' => ['3kg capacity, the lowest here, a full bake can exceed it', '1g steps, no fine resolution', 'Battery powered', 'Smaller platform than the stainless-disc 1036'],
                'specs' => [
                    ['label' => 'Capacity', 'value' => '3 kg', 'verdict' => 'bad', 'note' => 'The lowest here; a big bake can exceed it.'],
                    ['label' => 'Brand', 'value' => 'Salter', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '23,112 at 4.5 stars', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£10.00', 'verdict' => 'good'],
                    ['label' => 'Graduation', 'value' => '1 g', 'verdict' => 'neutral'],
                    ['label' => 'Feature', 'value' => 'Add and weigh', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Vitafit Digital Kitchen Scales 15kg/1g, Large LED Display',
                'price' => '£9.99',
                'rating' => 4.6,
                'reviews_count' => 10161,
                'image' => 'https://m.media-amazon.com/images/I/51kW4Xl5KyL._AC_SL1500_.jpg',
                'alt_text' => 'Vitafit 15kg digital kitchen scales with large LED display',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08SGBS7RQ?tag=ranked10-21',
                'summary' => 'The high-capacity budget pick. A 15kg scale with a bright LED display and 10,161 ratings at 4.6 stars, for under a tenner.',
                'body' => "This is the scale to buy if you cook in bigger batches. Where most of the picks above stop at 5kg, the Vitafit weighs up to 15kg in 1g steps, so a full stockpot, a large tray bake or a big batch of dough all stay within range. At GBP 9.99 with 10,161 ratings at 4.6 stars, it is the highest-rated of the very cheap scales here.

The display is its other strength: a large, bright LED that stays crisp in a dim kitchen, with a tare button, auto-off to save the battery, and unit switching. Vitafit says it has made scales since 2001, which shows in a listing that reads more plainly than most.

The trade for the capacity is resolution at the bottom end. A 15kg scale is not the one to weigh a couple of grams of yeast on precisely, so if you also want fine measurements, pair it with a 0.01g scale or choose one of the precision picks below. For everyday cooking where you sometimes weigh a lot, it is excellent value.",
                'pros' => ['15kg capacity, triple the 5kg scales, for big batches', '10,161 ratings at 4.6 stars, highest-rated cheap scale here', 'Bright, large LED display', 'Tare, auto-off and unit switching', 'Under GBP 10'],
                'contras' => ['A 15kg scale is less ideal for weighing a few grams precisely', '1g steps, no fine resolution', 'Battery powered', 'Capacity marketed imperial-first as 33lb'],
                'specs' => [
                    ['label' => 'Capacity', 'value' => '15 kg', 'verdict' => 'good', 'note' => 'The joint highest here, for big batches.'],
                    ['label' => 'Customer ratings', 'value' => '10,161 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£9.99', 'verdict' => 'good'],
                    ['label' => 'Display', 'value' => 'Large LED', 'verdict' => 'good'],
                    ['label' => 'Graduation', 'value' => '1 g', 'verdict' => 'neutral'],
                    ['label' => 'Power', 'value' => 'Battery', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'OXO Good Grips 5kg Stainless Steel Food Scale, Pull-Out Display',
                'price' => '£55.00',
                'rating' => 4.7,
                'reviews_count' => 8555,
                'image' => 'https://m.media-amazon.com/images/I/41sS0WI3j3L._AC_SL1500_.jpg',
                'alt_text' => 'OXO Good Grips stainless steel food scale with pull-out display',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B079D9B82W?tag=ranked10-21',
                'summary' => 'The premium pick, and the highest-rated scale here with a large review count. Its pull-out display solves the one real annoyance: the screen hiding under a big bowl.',
                'body' => "At GBP 55 the OXO costs several times more than the budget scales, so it needs a real reason, and it has one: the display pulls out from under the platform on a small arm. On every other scale here, set a wide bowl or plate on top and it hides the numbers; the OXO slides the screen clear so you can always read the weight. If you regularly weigh in large bowls, that alone is why people pay for it.

The rest is the quality you expect at the price. It has 8,555 ratings at 4.7 stars, the highest average of any well-reviewed scale on this page, a 5kg capacity from 2g in 1g steps, a zero function, a capacity meter that shows how much weight is left, and a stainless platform that lifts off to clean. OXO also backs it with its Better Guarantee.

The only real drawback is the price, and it is a big one against a GBP 8 scale that weighs just as accurately. Buy the OXO for the pull-out display and the build; if you never weigh in bowls big enough to hide a normal display, you do not need it.",
                'pros' => ['Pull-out display stays readable under a large bowl', '8,555 ratings at 4.7 stars, the highest average of the well-reviewed scales', '5kg capacity in 1g steps, weighs from 2g', 'Capacity meter shows remaining range', 'Stainless platform lifts off, backed by OXO guarantee'],
                'contras' => ['GBP 55, several times the price of accurate budget scales', '5kg capacity, same as scales costing a seventh as much', 'No fine sub-gram resolution', 'Uses four AAA batteries'],
                'specs' => [
                    ['label' => 'Display', 'value' => 'Pull-out', 'verdict' => 'good', 'note' => 'Stays readable under a big bowl, unique here.'],
                    ['label' => 'Customer ratings', 'value' => '8,555 at 4.7 stars', 'verdict' => 'good', 'note' => 'Highest average of the well-reviewed scales.'],
                    ['label' => 'Price', 'value' => '£55.00', 'verdict' => 'bad', 'note' => 'The most expensive on the page.'],
                    ['label' => 'Capacity', 'value' => '5 kg from 2 g', 'verdict' => 'neutral'],
                    ['label' => 'Build', 'value' => 'Stainless, guarantee', 'verdict' => 'good'],
                    ['label' => 'Graduation', 'value' => '1 g', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'Diyife Waterproof Kitchen Scales, IP67, 0.1g/10kg, USB-C Rechargeable',
                'price' => '£15.19',
                'rating' => 4.6,
                'reviews_count' => 1444,
                'image' => 'https://m.media-amazon.com/images/I/71rZbGBrdoL._AC_SL1500_.jpg',
                'alt_text' => 'Diyife waterproof IP67 rechargeable kitchen scale',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F9NNBN9D?tag=ranked10-21',
                'summary' => 'The one you can rinse under the tap. IP67 waterproof, 0.1g resolution up to 10kg, USB-C rechargeable, with 1,444 ratings at 4.6 stars.',
                'body' => "Two features make this Diyife stand out from the 1g crowd. First, it is fully waterproof to IP67, so you can weigh wet or sticky ingredients and then rinse the whole scale under the tap rather than wiping around a screen — a genuine convenience for anyone who cooks with dough, marinades or raw meat. Second, it reads to 0.1g up to a 10kg capacity, ten times finer than the everyday scales above while still handling big weights.

It charges over USB-C, so there are no batteries to replace, has an adjustable-brightness LCD, ten measuring units, a standby timer and a wall-mount hook to hang it away. At GBP 15.19 with 1,444 ratings at 4.6 stars, it is well proven for a scale with this much going on.

It sits here rather than higher only because it is a smaller brand than Salter or OXO and has a four-figure review count rather than a five-figure one. On features for the money, it is one of the strongest picks on the page.",
                'pros' => ['IP67 waterproof, rinse the whole scale under the tap', '0.1g resolution up to a 10kg capacity', 'USB-C rechargeable, no batteries to buy', '1,444 ratings at 4.6 stars', 'Ten units, adjustable display and a wall-mount hook'],
                'contras' => ['Smaller brand than Salter or OXO', 'Four-figure review count, not five-figure', '0.1g rather than the finer 0.01g of the precision pick', 'Rechargeable cell eventually ages'],
                'specs' => [
                    ['label' => 'Waterproof', 'value' => 'IP67, washable', 'verdict' => 'good', 'note' => 'The only scale here you can rinse under the tap.'],
                    ['label' => 'Graduation', 'value' => '0.1 g', 'verdict' => 'good', 'note' => 'Ten times finer than the 1g scales.'],
                    ['label' => 'Capacity', 'value' => '10 kg', 'verdict' => 'good'],
                    ['label' => 'Power', 'value' => 'USB-C rechargeable', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '1,444 at 4.6 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£15.19', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'NUTRI FIT Digital Food Scale with 2L Removable Bowl, 5kg/1g',
                'price' => '£10.99',
                'rating' => 4.7,
                'reviews_count' => 685,
                'image' => 'https://m.media-amazon.com/images/I/71GKD8TkGjL._AC_SL1500_.jpg',
                'alt_text' => 'NUTRI FIT digital food scale with 2 litre removable bowl',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DBQDMMMW?tag=ranked10-21',
                'summary' => 'A scale with a bowl included. The 2L removable bowl saves hunting for a container, and it measures liquids in millilitres too. 685 ratings at 4.7 stars.',
                'body' => "Most scales are a flat platform and you supply your own bowl. This NUTRI FIT comes with a 2-litre bowl that clips on and lifts off, so you have a container ready for flour, rice or liquids without reaching into a cupboard, and it stores neatly with the bowl inverted over the scale. At GBP 10.99 with 685 ratings at 4.7 stars, it is a well-liked, tidy option.

It weighs up to 5kg in 1g steps and, usefully, converts to volume — millilitres and fluid ounces as well as grams and pounds — so you can measure water or milk by volume in the bowl. The large LCD is easy to read, the tare and auto-zero handle the bowl weight, and the batteries come pre-installed.

The bowl is the whole point, so judge it on that: if you like having a dedicated container, this is a neat all-in-one for little money. If you already own bowls you prefer, a flat scale with a bigger review count, like the ACCUWEIGHT or Salter, is the safer buy.",
                'pros' => ['2L removable bowl included, no separate container needed', 'Measures volume in ml and fl oz as well as weight', '685 ratings at 4.7 stars', 'Stores tidily with the bowl inverted over it', 'Batteries pre-installed'],
                'contras' => ['Fewer ratings than the flat scales above', '5kg capacity in 1g steps, everyday standard', 'The bowl adds bulk if you already own containers', 'Battery powered'],
                'specs' => [
                    ['label' => 'Bowl', 'value' => '2L, removable', 'verdict' => 'good', 'note' => 'Container included, unlike flat scales.'],
                    ['label' => 'Customer ratings', 'value' => '685 at 4.7 stars', 'verdict' => 'neutral'],
                    ['label' => 'Volume mode', 'value' => 'ml and fl oz', 'verdict' => 'good'],
                    ['label' => 'Capacity', 'value' => '5 kg', 'verdict' => 'neutral'],
                    ['label' => 'Graduation', 'value' => '1 g', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£10.99', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Diyife 15kg/1g Rechargeable Digital Kitchen Scales, USB-C',
                'price' => '£10.99',
                'rating' => 4.7,
                'reviews_count' => 274,
                'image' => 'https://m.media-amazon.com/images/I/71X78HHW6hL._AC_SL1500_.jpg',
                'alt_text' => 'Diyife 15kg rechargeable USB-C digital kitchen scales',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F4K7BQYN?tag=ranked10-21',
                'summary' => 'A rechargeable 15kg scale for GBP 10.99. Charge it over USB-C instead of buying batteries, with a big capacity and a 4.7-star average.',
                'body' => "This is the pick if buying batteries annoys you. It charges over USB-C and Diyife says a single charge lasts up to three months of normal use, so for the price of a cable you stop feeding it coin cells and AAAs. At GBP 10.99 with 274 ratings at 4.7 stars, it is a cheap, well-rated way to go battery-free.

The specification is generous for the money: a 15kg capacity in 1g steps, so it handles big batches like the Vitafit, a 304 stainless steel platform that wipes clean, a blue backlit LCD, five-unit conversion and a two-year warranty. It is a genuine everyday workhorse that happens to recharge.

It ranks here rather than higher purely on evidence — 274 ratings is a smaller sample than the scales above, so the excellent 4.7 average is a strong early signal rather than a settled one. If the rechargeable convenience appeals and you are comfortable with a newer listing, it is very good value.",
                'pros' => ['USB-C rechargeable, up to three months per charge', '15kg capacity in 1g steps, handles big batches', '304 stainless platform, backlit display, five units', '4.7 star average and a two-year warranty', 'GBP 10.99'],
                'contras' => ['274 ratings, a smaller sample than the scales above', '1g steps, no fine resolution', 'Rechargeable cell ages over years', 'Newer, less established listing'],
                'specs' => [
                    ['label' => 'Power', 'value' => 'USB-C rechargeable', 'verdict' => 'good', 'note' => 'Up to three months per charge.'],
                    ['label' => 'Capacity', 'value' => '15 kg', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '274 at 4.7 stars', 'verdict' => 'bad', 'note' => 'Smaller sample than the picks above.'],
                    ['label' => 'Graduation', 'value' => '1 g', 'verdict' => 'neutral'],
                    ['label' => 'Warranty', 'value' => '2 years', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£10.99', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'Cosori Smart Kitchen Food Scale, App with UK Food Database, USB-C',
                'price' => '£42.49',
                'rating' => 4.4,
                'reviews_count' => 227,
                'image' => 'https://m.media-amazon.com/images/I/71KNyfvz3eL._AC_SL1500_.jpg',
                'alt_text' => 'Cosori smart kitchen food scale with app and colour display',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GVDZ5D8Q?tag=ranked10-21',
                'summary' => 'A scale for calorie counting, not just cooking. It links to an app with a UK food database and tracks 19 nutrients, with an AI meal scan and offline presets.',
                'body' => "The Cosori is a different kind of purchase from the rest of this list. It weighs food to the gram like any scale, but its real job is tracking what you eat: it pairs with an app that has a UK food database of generic, branded, supermarket and restaurant items, works out 19 nutrients including calories, and even has an AI meal scan for logging food you did not weigh. If you are counting calories or macros, that turns weighing into logging in one step.

It weighs 3g to 5000g in 1g increments on a 304 stainless surface, has a clear colour display, charges over USB-C with an 800mAh cell, and stores up to 50 presets so you can weigh common foods offline and sync later. It supports seven units including separate millilitre modes for water and milk.

At GBP 42.49 it is expensive for a 5kg scale, and 227 ratings at 4.4 stars is a smaller, slightly lower-scored sample than the kitchen workhorses above. Buy it for the nutrition tracking; if you only want to weigh ingredients, a cheaper scale does that just as well.",
                'pros' => ['App with a UK food database and 19-nutrient tracking', 'AI meal scan and 50 offline presets', 'Colour display, USB-C rechargeable', 'Turns weighing into calorie logging in one step', '304 stainless surface, seven units'],
                'contras' => ['GBP 42.49, expensive for a 5kg scale', '227 ratings at 4.4, a smaller and lower sample here', 'Much of the value depends on using the app', 'Overkill if you only want to weigh food'],
                'specs' => [
                    ['label' => 'Smart features', 'value' => 'App, UK food database', 'verdict' => 'good', 'note' => 'Calorie and nutrient tracking, unique here.'],
                    ['label' => 'Price', 'value' => '£42.49', 'verdict' => 'bad', 'note' => 'Expensive for a 5kg scale.'],
                    ['label' => 'Customer ratings', 'value' => '227 at 4.4 stars', 'verdict' => 'bad'],
                    ['label' => 'Capacity', 'value' => '5 kg', 'verdict' => 'neutral'],
                    ['label' => 'Power', 'value' => 'USB-C rechargeable', 'verdict' => 'good'],
                    ['label' => 'Graduation', 'value' => '1 g', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Diyife Dual Platform Kitchen Scale, 500g/0.01g and 15kg/1g',
                'price' => '£19.99',
                'rating' => 4.8,
                'reviews_count' => 93,
                'image' => 'https://m.media-amazon.com/images/I/61TXVE3OLbL._AC_SL1500_.jpg',
                'alt_text' => 'Diyife dual platform kitchen scale with 0.01g precision',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FQTRGXZN?tag=ranked10-21',
                'summary' => 'Two scales in one. A 500g/0.01g mini platform for coffee, spices and yeast, plus a 15kg/1g main platform for everything else. Highest rated here, on a small sample.',
                'body' => "This is the pick for anyone who weighs coffee, spices or yeast, where a gram either way changes the result. It has two platforms: a small one that reads 0.01g up to 500g, fine enough for a single coffee dose or a pinch of a spice blend, and a large one that reads 1g up to 15kg for ordinary cooking and big batches. No 1g scale on this page can do the fine end.

For 0.01g accuracy you use the small platform; the large one is 1g, so it is worth being clear which surface does which job. It also has an accumulation function that adds successive weights together, seven units, a backlit LCD and a shatterproof glass and stainless build. At GBP 19.99 it is cheap for a genuine precision scale.

The reason it is tenth rather than higher is evidence. Ninety-three ratings is the smallest sample on this page, so the excellent 4.8-star average is an early signal rather than a settled verdict. If you specifically want fine resolution and are comfortable with a newer listing, it does something none of the more-reviewed scales here can.",
                'pros' => ['0.01g on the mini platform, unmatched by any 1g scale here', 'Second 15kg/1g platform covers big batches too', 'Accumulation function adds successive weights', 'Seven units, backlit display, cheap for a precision scale', '4.8 star average, the highest here'],
                'contras' => ['93 ratings, the smallest sample on the page', '0.01g only on the small platform, the large one is 1g', 'Newer listing without a long track record', 'Two platforms take more counter space'],
                'specs' => [
                    ['label' => 'Fine graduation', 'value' => '0.01 g to 500 g', 'verdict' => 'good', 'note' => 'The finest resolution in this comparison.'],
                    ['label' => 'Main platform', 'value' => '15 kg / 1 g', 'verdict' => 'good', 'note' => 'Big-batch capacity as well.'],
                    ['label' => 'Customer ratings', 'value' => '93 at 4.8 stars', 'verdict' => 'bad', 'note' => 'The smallest sample here.'],
                    ['label' => 'Price', 'value' => '£19.99', 'verdict' => 'neutral', 'note' => 'Cheap for a precision scale.'],
                    ['label' => 'Feature', 'value' => 'Accumulation, 7 units', 'verdict' => 'good'],
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
        $this->command?->info("KitchenScalesSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
