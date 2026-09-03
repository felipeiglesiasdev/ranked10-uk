<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class MultiCookersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE MULTICOOKERS / PANELAS DE PRESSAO ELETRICAS DE FORMA IDEMPOTENTE
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=multi+cooker&rh=p_36%3A3500-  (22 ASINS, 13 FICHAS ABERTAS)
        // CATEGORIA KITCHEN (COMISSAO 5%). SAZONAL: SOBE NO OUTONO/INVERNO (SOPA, ENSOPADO, BATCH COOK).
        //
        // PADRAO EDITORIAL NOVO (30/08): E UM TOP 10, NAO UM ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── EIXO DE COMPRA CENTRAL: PRESSAO x NAO-PRESSAO ───
        // "MULTI COOKER" COBRE DUAS MAQUINAS DIFERENTES:
        //   COM PRESSAO (SELA, ~70% MAIS RAPIDO, ESTILO INSTANT POT): NINJA FOODI, COSORI, MIDEA, QUEST, NINJA HYPERHEAT.
        //   SEM PRESSAO (POTE ABERTO, SEAR/SLOW/STEAM/ROAST): MORPHY RICHARDS, RUSSELL HOBBS, DREW&COLE.
        // ISSO E A DECISAO DO LEITOR — VAI NA INTRO E EM CADA CARD DIZENDO SE PRESSURIZA OU NAO.
        //
        // ─── O QUE MUDA A COMPRA ───
        //   SO A NINJA FAZ AIR FRY / CRISP (TENDERCRISP). CAPACIDADE 5L (CASAL) ATE 8L (FAMILIA GRANDE).
        //   COATING CERAMICO PFAS-FREE (NINJA HYPERHEAT, COSORI) x ANTIADERENTE COMUM.
        //   "X-in-1" E MARKETING (FUNCOES SE SOBREPOEM). NAO PESAR.
        //
        // PROFUNDIDADE (FICHA): 14.080 / 4.900 / 3.851 / 2.856 / 2.216 / 1.114 / 400 / 400 / 101 / 49 / 40.
        // ⚠ OS DOIS MIDEA (6L B08JKPPNW7 e 8L B0CSW318V3) MOSTRARAM 400 CADA — PROVAVEL POOL/FAMILIA COMPARTILHADA;
        //   MANTIDOS OS DOIS POR CAPACIDADE DIFERENTE (6L VALOR x 8L FAMILIA GRANDE).
        //
        // ─── CORTE ───
        //   INSTANT POT: OS ASINS NA GRADE ESTAVAM FRACOS — PLUS 5.7L (49 AVAL. @4.0) E 3.8L (19 AVAL.).
        //   A MARCA E ICONICA MAS ESTES ANUNCIOS NAO TEM PROFUNDIDADE NEM NOTA PARA RANQUEAR. FORA DA LISTA.
        //   COMBOS SO-AIR-FRYER (NINJA SPEEDI, RUSSELL HOBBS SATISFRY, NINJA COMBI) SAO OUTRA CATEGORIA (AIR FRYER).
        //
        // FOCUS KEYWORD: best multi cooker
        // VARIACOES TRABALHADAS: multi cooker / electric pressure cooker / best electric pressure cooker /
        // ninja foodi / instant pot alternative / multi cooker vs pressure cooker / one pot cooker /
        // 9-in-1 multi cooker / family multi cooker / pressure cooker slow cooker
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DE "kitchen")
        ];

        $article = [
            'slug' => 'best-multi-cooker',                                            // SLUG DO ARTIGO (URL) - FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Multi Cooker 2026: 10 Pressure and Multi Cookers Ranked', // TITULO / H1
            'meta_title' => 'Best Multi Cooker 2026: 10 Pressure Cookers Ranked',      // TITLE DA ABA/GOOGLE
            'meta_description' => 'The best multi cooker picks for UK kitchens, from Ninja and Cosori to budget pressure cookers. Ten multi cookers compared on capacity, functions and price.', // META DESCRIPTION
            'focus_keyword' => 'best multi cooker',                                  // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE

            'intro' => "If you want the short answer, the Ninja Foodi MAX 9-in-1 is the best multi cooker for most people: it pressure cooks and air-fries in one pot, has 4,900 ratings at 4.7 stars, and a large 7.5L capacity. If you want the same idea for less, the Cosori 5.7L pressure cooker does the core jobs at 4.7 stars for GBP 75.99.

The words multi cooker cover two different machines, and knowing which you want is the whole decision. Some, like the Ninja, Cosori and Midea here, are electric pressure cookers: they seal and cook up to 70 percent faster, which is what people usually mean when they compare one to an Instant Pot. Others, like the popular Morphy Richards and Russell Hobbs, are open multicookers that sear, slow cook, steam and roast but do not build pressure. After that it comes down to capacity, from 5L for a couple up to 8L for a big family, and how many of the fashionable one-touch functions you will actually use. We compared ten on those points, plus customer ratings and price, and ranked them below.",

            'conclusion' => "For most kitchens the best multi cooker here is the Ninja Foodi MAX. It is the one that genuinely does the most — pressure cook to save time, then swap the lid to air-fry and crisp — and it has the reviews to back it. If that is more than you need, the Cosori is the value pressure cooker to buy, and the Midea 6L is cheaper still.

Decide on pressure first. If you want fast, sealed, one-pot cooking, choose the Ninja, Cosori or Midea. If you would rather have a big, simple pot that sears, slow cooks and steams without a pressure lid to manage, the Morphy Richards has more happy owners than anything else on this page, and the Russell Hobbs does the same for under fifty pounds. Match the capacity to how many you cook for, and treat the in-one numbers as marketing rather than a real count of what each can do.",

            'author' => 'Felipe Iglesias',                                           // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-09-02 09:00:00',                                 // DATA FIXA — NAO USAR now()
        ];

        // ─── FICHA: good = MELHOR DA LISTA NO QUESITO, bad = PIOR, neutral = MEIO. COMPARA OS DEZ ENTRE SI. ───
        $products = [
            [
                'position' => 1,
                'name' => 'Ninja Foodi MAX 9-in-1 Multi Cooker 7.5L, Pressure Cook and Air Fry, OP500UK',
                'price' => '£199.00',
                'rating' => 4.7,
                'reviews_count' => 4900,
                'image' => 'https://m.media-amazon.com/images/I/71lZy-UXhUL._AC_SL1500_.jpg',
                'alt_text' => 'best multi cooker',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07YF9Y74S?tag=ranked10-21',
                'summary' => 'The best multi cooker for most people. It pressure cooks to save time, then swaps to a crisping lid to air-fry, with 4,900 ratings at 4.7 stars.',
                'body' => "This is the machine that made the category, and it is first because it genuinely does the most. It pressure cooks up to 70 percent faster than the hob, then, with a swap of the lid, air-fries and crisps using Ninja's TenderCrisp technology, so you can braise a joint under pressure and finish it with a crackling top in the same pot. Nine functions cover pressure cook, air fry, slow cook, steam, bake, sear, grill, yoghurt and dehydrate.

The 7.5L capacity feeds up to six people, the non-stick pot and parts are dishwasher safe, and 4,900 ratings at 4.7 stars is by far the strongest evidence of any true multi cooker on this page. A two-year guarantee on registration backs it.

The catch is price and size. At GBP 199 it is one of the most expensive here, and at nearly 10kg with a tall lid it takes real cupboard space. If you will not use the air-frying, you are paying for a feature you do not need — the Cosori below pressure cooks just as well for a third of the price.",
                'pros' => ['Pressure cooks and then air-fries and crisps in one pot', '4,900 ratings at 4.7 stars, the most of any pressure cooker here', 'Large 7.5L capacity feeds up to six', 'Nine genuinely different functions', 'Dishwasher-safe pot and parts, two-year guarantee'],
                'contras' => ['GBP 199, among the most expensive on the page', 'Large and heavy to store', 'You pay for air-frying you may not use', 'A pressure-only cooker costs far less'],
                'specs' => [
                    ['label' => 'Cooking type', 'value' => 'Pressure and air fry', 'verdict' => 'good', 'note' => 'The only cookers here that crisp are the Ninjas.'],
                    ['label' => 'Customer ratings', 'value' => '4,900 at 4.7 stars', 'verdict' => 'good', 'note' => 'Most of any true multi cooker here.'],
                    ['label' => 'Capacity', 'value' => '7.5 litres', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£199.00', 'verdict' => 'bad'],
                    ['label' => 'Power', 'value' => '1760 watts', 'verdict' => 'neutral'],
                    ['label' => 'Guarantee', 'value' => '2 years', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Cosori Electric Pressure Multi Cooker 5.7L, 9-in-1, Ceramic PFAS-Free',
                'price' => '£75.99',
                'rating' => 4.7,
                'reviews_count' => 1114,
                'image' => 'https://m.media-amazon.com/images/I/61xrQfJAKsL._AC_SL1500_.jpg',
                'alt_text' => 'Cosori electric pressure multi cooker with ceramic coating',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C6DXNQ79?tag=ranked10-21',
                'summary' => 'The best value pressure cooker. It does the core one-pot jobs at 4.7 stars for GBP 75.99, with a ceramic, PFAS-free pot.',
                'body' => "If you want fast, sealed pressure cooking without paying for air-frying, this is the pick. At GBP 75.99 with 1,114 ratings at 4.7 stars, it matches the Ninja on customer satisfaction for a third of the price, pressure cooking up to 70 percent faster and doubling as a slow cooker, steamer, rice cooker, sauté pan and more across nine functions.

Its stand-out is the pot itself: an aluminium cooking pot with a ceramic, hard, non-stick coating that Cosori makes PFAS-free, which matters to buyers avoiding older non-stick chemistry. The stainless housing resists fingerprints, the lid and pot are dishwasher friendly, and it comes with a rice paddle, measuring cup, steam rack and ladle, plus a recipe book and app.

The compromises against the Ninja are that it does not crisp or air-fry, and the 5.7L capacity, while enough for most families, is smaller than the 7.5L Foodi. For a straightforward, well-rated, well-equipped pressure cooker at a fair price, it is the one to beat.",
                'pros' => ['Matches the Ninja at 4.7 stars for a third of the price', 'Ceramic, PFAS-free non-stick pot', 'Nine functions including slow cook, steam and sauté', 'Full accessory kit, recipe book and app included', 'Fingerprint-resistant stainless housing'],
                'contras' => ['Does not air-fry or crisp like the Ninja', '5.7L is smaller than the 7.5L Foodi', 'Fewer ratings than the Morphy Richards or Ninja', 'App account needed for the in-app recipes'],
                'specs' => [
                    ['label' => 'Cooking type', 'value' => 'Pressure cooker', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£75.99', 'verdict' => 'good', 'note' => 'A third of the Ninja for the same rating.'],
                    ['label' => 'Customer ratings', 'value' => '1,114 at 4.7 stars', 'verdict' => 'neutral'],
                    ['label' => 'Pot', 'value' => 'Ceramic, PFAS-free', 'verdict' => 'good'],
                    ['label' => 'Capacity', 'value' => '5.7 litres', 'verdict' => 'neutral'],
                    ['label' => 'Power', 'value' => '1100 watts', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Morphy Richards 10-in-1 Multicooker 6.5L, Sear, Roast, Slow Cook (No Pressure)',
                'price' => '£89.99',
                'rating' => 4.7,
                'reviews_count' => 14080,
                'image' => 'https://m.media-amazon.com/images/I/61xXMOeIWnL._AC_SL1500_.jpg',
                'alt_text' => 'Morphy Richards 10-in-1 multicooker in matte black',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DJPDJLHG?tag=ranked10-21',
                'summary' => 'The most-reviewed cooker here by far, with 14,080 ratings. A big, simple pot that sears, roasts and slow cooks — but it does not pressure cook.',
                'body' => "With 14,080 ratings at 4.7 stars, this has more happy owners than any other cooker on the page, and it is the one to buy if you do not want a pressure cooker at all. It is a large 6.5L open multicooker that sears, fries, slow cooks on high or low, roasts, steams, cooks rice and keeps warm from an LED panel, and the pot lifts out and goes straight to the table.

The appeal is simplicity. There is no pressure lid to lock, seal or vent — you cook the way you would in a big pan or slow cooker, just with the heat and timing handled for you. The aluminium non-stick pot, glass lid, spoon and steam rack are dishwasher safe, and at 1350W it browns properly rather than just warming.

The one thing to be clear about before you buy: it does not build pressure, so it will not give you the 70-percent-faster cooking of the Ninja, Cosori or Midea. If fast one-pot cooking is the point, choose one of those. If you want a versatile, hugely popular pot for slow, everyday cooking, this is the safest bet on the page.",
                'pros' => ['14,080 ratings at 4.7 stars, by far the most here', 'Large 6.5L pot, lifts out to serve at the table', 'Sears, roasts, slow cooks and steams with real browning heat', 'Simple to use, no pressure lid to manage', 'Dishwasher-safe pot, lid and accessories'],
                'contras' => ['Does not pressure cook, so no fast sealed cooking', 'No air-frying or crisping', 'Glass lid rather than a sealing pressure lid', 'The ten functions overlap, as with all these cookers'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '14,080 at 4.7 stars', 'verdict' => 'good', 'note' => 'By far the most in this comparison.'],
                    ['label' => 'Cooking type', 'value' => 'Open, no pressure', 'verdict' => 'bad', 'note' => 'Will not cook faster under pressure.'],
                    ['label' => 'Capacity', 'value' => '6.5 litres', 'verdict' => 'good'],
                    ['label' => 'Power', 'value' => '1350 watts', 'verdict' => 'good', 'note' => 'Enough heat to brown properly.'],
                    ['label' => 'Price', 'value' => '£89.99', 'verdict' => 'neutral'],
                    ['label' => 'Serving', 'value' => 'Pot lifts to table', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Ninja Foodi MAX 15-in-1 SmartLid Multi-Cooker 7.5L, Digital Probe, OL750UK',
                'price' => '£269.00',
                'rating' => 4.5,
                'reviews_count' => 2856,
                'image' => 'https://m.media-amazon.com/images/I/61D00UI4VnL._AC_SL1500_.jpg',
                'alt_text' => 'Ninja Foodi MAX 15-in-1 SmartLid multi-cooker with digital probe',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09C873WR9?tag=ranked10-21',
                'summary' => 'The most capable machine here, with a single SmartLid for pressure and air-frying and a digital cooking probe — at the highest price on the page.',
                'body' => "This is the top of the Ninja range and the most capable cooker in the comparison. Its SmartLid combines pressure cooking and air-frying under one lid rather than two, so you do not swap lids as you do on the OP500 at the top, and it adds a digital cooking probe that monitors the temperature inside a joint and tells you when it is done. Fifteen functions cover pressure, air fry, grill, bake, dehydrate, prove, sear, steam, slow cook, yoghurt and more.

The 7.5L pot fits a 3kg roast or 1.8kg of chips, a two-tier rack lets you cook layers at once, and 2,856 ratings at 4.7 average put it among the better-evidenced cookers here. Ninja quotes energy savings against a conventional oven for the same dishes.

Two reasons it is not higher. At GBP 269 it is the most expensive cooker on the page, and at 15kg it is a serious lump of counter and cupboard space. It earns its place if you want the probe and the single-lid convenience; if you do not, the OP500 above or the Cosori do the core cooking for much less.",
                'pros' => ['Single SmartLid does pressure and air fry, no lid swapping', 'Digital probe cooks a joint to temperature automatically', '15 functions and a two-tier rack for layered cooking', '2,856 ratings at 4.7 stars', 'Large 7.5L capacity, fits a 3kg roast'],
                'contras' => ['GBP 269, the most expensive cooker here', 'Very large and heavy at 15kg', 'More cooker than most households need', 'The 15 functions overlap heavily'],
                'specs' => [
                    ['label' => 'Cooking type', 'value' => 'Pressure and air fry', 'verdict' => 'good', 'note' => 'One SmartLid does both.'],
                    ['label' => 'Probe', 'value' => 'Digital, built in', 'verdict' => 'good', 'note' => 'The only cooker here with one.'],
                    ['label' => 'Price', 'value' => '£269.00', 'verdict' => 'bad', 'note' => 'The most expensive on the page.'],
                    ['label' => 'Customer ratings', 'value' => '2,856 at 4.5 stars', 'verdict' => 'neutral'],
                    ['label' => 'Capacity', 'value' => '7.5 litres', 'verdict' => 'good'],
                    ['label' => 'Weight', 'value' => '15 kg', 'verdict' => 'bad', 'note' => 'Heaviest here to store.'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Drew&Cole CleverChef 14-in-1 Multi Cooker 5L (No Pressure)',
                'price' => '£64.99',
                'rating' => 4.4,
                'reviews_count' => 3851,
                'image' => 'https://m.media-amazon.com/images/I/51YaABoyiwL._AC_SL1500_.jpg',
                'alt_text' => 'Drew and Cole CleverChef 14-in-1 multi cooker in charcoal',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07F2N1QTM?tag=ranked10-21',
                'summary' => 'A well-liked budget batch cooker with 3,851 ratings. It stews, roasts, slow cooks and even proves bread — but like the Morphy Richards, it does not pressure cook.',
                'body' => "For batch cooking on a budget, the CleverChef is a strong option: GBP 64.99, a 5L pot, and 3,851 ratings at 4.4 stars. It has 17 preset programmes covering steam, stew, soup, roast, poach, bread proving, bake, rice and slow cook, so it covers most of what a family kitchen throws at it in one non-stick pot that wipes clean.

Like the Morphy Richards and Russell Hobbs, it is an open multicooker rather than a pressure cooker, so it is simple to use and there is no sealing lid to manage. At 860W it leans towards gentle, slow cooking rather than fast browning, which suits stews and soups.

It sits here rather than higher because its 4.4-star average is a touch below the top picks and its lower wattage means it is slower to get going than the 1350W Morphy Richards. Note that the inner bowl must sit directly on the heating plate to work, a common source of confused reviews. For cheap, generous batch cooking, it is good value.",
                'pros' => ['3,851 ratings at 4.4 stars for GBP 64.99', '17 presets including bread proving and soup', '5L non-stick pot, wipes clean, dishwasher safe', 'Simple open cooker, no pressure lid to manage', 'Good for stews, soups and slow cooking'],
                'contras' => ['Does not pressure cook', '860W is low, so slower to heat than the Morphy Richards', '4.4 stars, just below the top picks', 'Bowl must sit directly on the plate or it will not heat'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '3,851 at 4.4 stars', 'verdict' => 'good'],
                    ['label' => 'Cooking type', 'value' => 'Open, no pressure', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£64.99', 'verdict' => 'good'],
                    ['label' => 'Capacity', 'value' => '5 litres', 'verdict' => 'neutral'],
                    ['label' => 'Power', 'value' => '860 watts', 'verdict' => 'bad', 'note' => 'Lowest here, slow to heat.'],
                    ['label' => 'Presets', 'value' => '17', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'Russell Hobbs Good-to-Go 6.5L Electric Multicooker, 8 Functions (No Pressure)',
                'price' => '£48.93',
                'rating' => 4.4,
                'reviews_count' => 2216,
                'image' => 'https://m.media-amazon.com/images/I/61DP5SRa4rL._AC_SL1500_.jpg',
                'alt_text' => 'Russell Hobbs Good-to-Go electric multicooker in black',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B096Y9XNLF?tag=ranked10-21',
                'summary' => 'The cheapest cooker here with a big review count. A 6.5L open multicooker for under fifty pounds, with a removable control panel so the pot goes to the table.',
                'body' => "At GBP 48.93 this is the cheapest cooker in the comparison that has a large, settled review count behind it — 2,216 ratings at 4.4 stars. It is a generous 6.5L open multicooker with eight functions: sear, roast, soup, slow cook and more, in a durable cast aluminium pot that takes wear well and lifts straight to the table.

Its neat idea is a removable control panel, so once the food is cooked you detach the electronics and carry the pot to the table like a casserole dish, which is genuinely handy for serving. A three-year guarantee on registration is more than most budget cookers offer.

Two things to weigh. It does not pressure cook, and at 750W it is the gentlest heater here, so it is built for slow, unhurried cooking rather than fast browning or searing. As a big, cheap, simple family pot for stews and slow-cooked meals, it is excellent value; if you want speed or pressure, look to the Midea or Cosori.",
                'pros' => ['Cheapest cooker here with a large review count', '2,216 ratings at 4.4 stars for under GBP 50', 'Generous 6.5L cast aluminium pot', 'Removable control panel, pot goes to the table', 'Three-year guarantee on registration'],
                'contras' => ['Does not pressure cook', '750W is the lowest wattage here, slow to heat', 'Built for slow cooking, not fast browning', '4.4 stars, below the top picks'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£48.93', 'verdict' => 'good', 'note' => 'Cheapest with a big review count.'],
                    ['label' => 'Customer ratings', 'value' => '2,216 at 4.4 stars', 'verdict' => 'neutral'],
                    ['label' => 'Cooking type', 'value' => 'Open, no pressure', 'verdict' => 'bad'],
                    ['label' => 'Capacity', 'value' => '6.5 litres', 'verdict' => 'good'],
                    ['label' => 'Power', 'value' => '750 watts', 'verdict' => 'bad', 'note' => 'Lowest here.'],
                    ['label' => 'Serving', 'value' => 'Removable panel', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Midea Electric Pressure Cooker 6L, 9-in-1, 14 Presets, 80kPa',
                'price' => '£67.98',
                'rating' => 4.5,
                'reviews_count' => 400,
                'image' => 'https://m.media-amazon.com/images/I/61QqGDlubtL._AC_SL1500_.jpg',
                'alt_text' => 'Midea 6L electric pressure cooker in matt black',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08JKPPNW7?tag=ranked10-21',
                'summary' => 'A cheaper pressure cooker than the Cosori, at GBP 67.98. A 6L family size with a high 80kPa pressure system and a 10-layer safety design.',
                'body' => "If you want a genuine pressure cooker for less than the Cosori, the Midea 6L is the pick. It runs an 80kPa high-pressure system that Midea says cooks up to 70 percent faster, with 14 one-touch presets across nine roles including slow cook, steam, rice, sauté and yoghurt, and a 6L pot that suits family meals and batch cooking. It has 400 ratings at 4.5 stars.

Safety is well covered with a ten-layer system — auto pressure release, a lid lock and overheat protection — and a 24-hour delay start lets you have dinner ready when you get in. The kit includes the inner pot, steam rack, measuring cup, ladle and spoon.

It ranks below the Cosori mainly on evidence and finish: a smaller review count and a slightly lower rating, and the ceramic PFAS-free pot of the Cosori is a nicer surface than the standard non-stick here. For a straightforward, cheaper pressure cooker with a proper safety design, it is a sensible buy, and the larger 8L version below suits bigger households.",
                'pros' => ['A true pressure cooker for less than the Cosori', '80kPa high-pressure system, 14 presets', '6L family capacity with a full accessory kit', 'Ten-layer safety system and 24-hour delay start', '4.5 star average'],
                'contras' => ['Only 400 ratings, fewer than the top picks', 'Standard non-stick pot rather than ceramic', 'No air-frying or crisping', 'Presets overlap, as on all these cookers'],
                'specs' => [
                    ['label' => 'Cooking type', 'value' => 'Pressure cooker', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£67.98', 'verdict' => 'good', 'note' => 'Cheaper than the Cosori.'],
                    ['label' => 'Capacity', 'value' => '6 litres', 'verdict' => 'neutral'],
                    ['label' => 'Customer ratings', 'value' => '400 at 4.5 stars', 'verdict' => 'neutral'],
                    ['label' => 'Safety', 'value' => '10-layer system', 'verdict' => 'good'],
                    ['label' => 'Power', 'value' => '1200 watts', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Midea Electric Pressure Cooker 8L, 9-in-1, 14 Presets (Large Capacity)',
                'price' => '£91.99',
                'rating' => 4.5,
                'reviews_count' => 400,
                'image' => 'https://m.media-amazon.com/images/I/61Rvwbyc09L._AC_SL1500_.jpg',
                'alt_text' => 'Midea 8L large capacity electric pressure cooker',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CSW318V3?tag=ranked10-21',
                'summary' => 'The biggest cooker here at 8L. The same Midea pressure system as the 6L, sized up for large families and serious batch cooking.',
                'body' => "This is the pick for a large household or anyone who batch cooks in bulk. At 8L it is the biggest-capacity cooker in the comparison, giving you room for a large joint, a full pot of stew or several days of meal prep in one go, and it works as a pressure cooker, rice cooker, steamer, yoghurt maker, slow cooker and sauté pan across nine roles with 12 to 16 presets.

It carries the same 4.5-star rating and Midea's ten-safety-feature design, with a 24-hour delay timer and a full accessory kit. The stainless build looks smart, and for the extra capacity over the 6L the price rise to GBP 91.99 is modest.

The considerations are the same as the 6L plus one: it is a large appliance to store, so only size up if you will use the capacity, because an 8L cooker holding a small meal wastes energy heating the extra space. Its rating pool sits close to the 6L Midea, so treat the two as siblings and choose purely on the capacity you need.",
                'pros' => ['8L, the largest capacity in this comparison', 'Same pressure system and safety design as the 6L', 'Room for a big joint or bulk batch cooking', '4.5 star average, 24-hour delay timer', 'Modest price step up for the extra size'],
                'contras' => ['A large appliance to store', 'Wasteful if you cook small meals in it', 'Rating pool sits close to the 6L sibling', 'Standard non-stick rather than ceramic'],
                'specs' => [
                    ['label' => 'Capacity', 'value' => '8 litres', 'verdict' => 'good', 'note' => 'The largest here, for big families.'],
                    ['label' => 'Cooking type', 'value' => 'Pressure cooker', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£91.99', 'verdict' => 'neutral'],
                    ['label' => 'Customer ratings', 'value' => '400 at 4.5 stars', 'verdict' => 'neutral', 'note' => 'Close to the 6L Midea.'],
                    ['label' => 'Safety', 'value' => '10-layer system', 'verdict' => 'good'],
                    ['label' => 'Power', 'value' => '1200 watts', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'Quest 63009 Electric Pressure Cooker 6L, 12-in-1',
                'price' => '£62.99',
                'rating' => 4.4,
                'reviews_count' => 101,
                'image' => 'https://m.media-amazon.com/images/I/714s1SMCu0L._AC_SL1500_.jpg',
                'alt_text' => 'Quest 63009 electric pressure cooker in stainless steel',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DQY5MRFD?tag=ranked10-21',
                'summary' => 'A simple, cheap 6L pressure cooker with 12 presets. It does the core pressure jobs, but on a much smaller review count than the picks above.',
                'body' => "The Quest is a straightforward budget pressure cooker: a 6L stainless housing, 12 one-touch presets, an adjustable 40 to 120°C range and a 12-hour timer, for GBP 62.99. It locks and seals like the other pressure cookers here and comes with a measuring cup, spoon, steam rack and recipe book, so it does the essential fast one-pot cooking without frills.

For someone who wants pressure cooking cheaply and does not care about brand or extras, it covers the basics competently, and Quest is an established UK maker of budget kitchen appliances.

It sits at ninth for one reason: evidence. One hundred and one ratings at 4.4 stars is a much smaller and slightly lower-scored sample than the Cosori or Midea, so it is a reasonable but less proven choice. For a few pounds more, the Midea 6L has four times the ratings and a higher score, which is why it ranks above this one.",
                'pros' => ['Simple 6L pressure cooker for GBP 62.99', '12 presets and an adjustable temperature range', 'Locks and seals for fast one-pot cooking', 'Accessories and recipe book included', 'Established UK budget appliance brand'],
                'contras' => ['101 ratings, a much smaller sample than the picks above', '4.4 stars, below the Midea and Cosori', 'No standout feature over cheaper rivals', 'Basic non-stick pot'],
                'specs' => [
                    ['label' => 'Cooking type', 'value' => 'Pressure cooker', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '101 at 4.4 stars', 'verdict' => 'bad', 'note' => 'Small sample versus the Midea and Cosori.'],
                    ['label' => 'Price', 'value' => '£62.99', 'verdict' => 'neutral'],
                    ['label' => 'Capacity', 'value' => '6 litres', 'verdict' => 'neutral'],
                    ['label' => 'Presets', 'value' => '12', 'verdict' => 'neutral'],
                    ['label' => 'Power', 'value' => '1000 watts', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Ninja HyperHeat 9-in-1 Pressure Cooker 6L, PC201UK',
                'price' => '£169.99',
                'rating' => 4.9,
                'reviews_count' => 40,
                'image' => 'https://m.media-amazon.com/images/I/61S7Rqx7DgL._AC_SL1500_.jpg',
                'alt_text' => 'Ninja HyperHeat 9-in-1 pressure cooker in black',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G72VNL39?tag=ranked10-21',
                'summary' => 'Ninja newest pressure-only cooker, with a ceramic PFAS-free pot and the highest rating here — but on only 40 ratings so far.',
                'body' => "This is Ninja's newest dedicated pressure cooker, a 6L model that keeps the brand's build quality but drops the air-frying to focus on fast pressure cooking, slow cooking, searing, rice, steam and yoghurt across nine functions. The cooking pot has a ceramic PFAS-free coating and is dishwasher safe, and a two-year guarantee comes with registration.

For a buyer who wants Ninja reliability and a modern ceramic pot but does not need the crisping lid, it is a tidy, well-built machine, and its early rating is excellent.

The reason it is tenth is simply evidence. Forty ratings is the smallest sample on the page by a wide margin, so the 4.9-star average, however good, is an early signal rather than a settled verdict, and at GBP 169.99 it costs far more than the Cosori while doing much the same pressure cooking. If you want a Ninja and are happy to be an early buyer, it is a strong machine; if you want a proven track record, the Cosori or Midea are the safer pressure-cooker buys.",
                'pros' => ['Ninja build quality with a ceramic, PFAS-free pot', 'Nine functions focused on pressure and slow cooking', '4.9 star early average, the highest here', 'Dishwasher-safe pot, two-year guarantee', 'A tidy 6L size'],
                'contras' => ['Only 40 ratings, the smallest sample on the page', 'GBP 169.99, far more than the Cosori for similar pressure cooking', 'No air-frying, unlike the other Ninjas', 'A new listing without a settled verdict'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '40 at 4.9 stars', 'verdict' => 'bad', 'note' => 'The smallest sample here; early signal only.'],
                    ['label' => 'Cooking type', 'value' => 'Pressure cooker', 'verdict' => 'good'],
                    ['label' => 'Pot', 'value' => 'Ceramic, PFAS-free', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£169.99', 'verdict' => 'bad', 'note' => 'Dear for pressure-only cooking.'],
                    ['label' => 'Capacity', 'value' => '6 litres', 'verdict' => 'neutral'],
                    ['label' => 'Guarantee', 'value' => '2 years', 'verdict' => 'good'],
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
        $this->command?->info("MultiCookersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
