<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class HandWarmersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE AQUECEDORES DE MAO RECARREGAVEIS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=rechargeable+hand+warmer&rh=p_36%3A1000-  (24 ASINS, 12 FICHAS ABERTAS)
        // CATEGORIA HOME. SAZONAL: FORTE NO OUTONO/INVERNO (NATAL/PRESENTE).
        //
        // PADRAO EDITORIAL NOVO (30/08): E UM TOP 10, NAO UM ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── EIXOS DE COMPRA / TERRENO DE IA ───
        //   UNIDADE UNICA GRANDE (mais quente, mais tempo, melhor power bank — OCOOPA UT3 10000mAh) x 2-PACK (um por mao).
        //   mAh = TEMPO DE CALOR. "10000mAh 2-pack" = 2x5000, NAO 10000 CADA — COMPARAR POR UNIDADE. (padrao "soma bateria no titulo").
        //   TEMP MAXIMA 50-60C, 3-4 NIVEIS. DOBRA COMO POWER BANK (UT3, UT2S, WARMCO).
        //   SLIM (cabe na luva — UT5 Nano 14mm). DUPLA FACE (UT3, DuoHeat).
        //   SEGURANCA: ESQUENTAM DE VERDADE; NAO ENCOSTAR NO MAX NA PELE MUITO TEMPO; CUIDADO SE POUCA SENSIBILIDADE. RECARREGAR A CADA 2 MESES SE PARADO (Li-ion).
        //
        // PROFUNDIDADE (FICHA): 3.912 / 2.925 / 2.886 / 2.228 / 2.223 / 1.710 / 1.349 / 624 / 384 / 278.
        // ⚠ OCOOPA UT5 NANO (B0FHKYW91D) e UT5 NANO SMART TEMP (B0FHWCNXML) SAO IRMAOS QUASE IGUAIS — MANTIDO SO UM.
        // CORTE: LUVAS AQUECIDAS (Minthouz etc.) SAO OUTRA CATEGORIA. HEAT PAD (B0DR5FM1JH) MANTIDO COMO FORMATO DISTINTO (cinta/costas + bolso de mao).
        //
        // FOCUS KEYWORD: best hand warmer
        // VARIACOES TRABALHADAS: hand warmer / rechargeable hand warmer / electric hand warmer /
        // best rechargeable hand warmers / reusable hand warmer / usb hand warmer / hand warmer power bank /
        // hand warmers uk / hand warmer 2 pack
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DE "home")
        ];

        $article = [
            'slug' => 'best-hand-warmer',                                             // SLUG DO ARTIGO (URL) - FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Hand Warmer 2026: 10 Rechargeable Hand Warmers Ranked',   // TITULO / H1
            'meta_title' => 'Best Hand Warmer 2026: 10 Rechargeable Warmers Ranked',   // TITLE DA ABA/GOOGLE
            'meta_description' => 'The best hand warmer picks for UK winters, from OCOOPA to budget 2-packs. Ten rechargeable electric hand warmers compared on capacity, heat and price.', // META DESCRIPTION
            'focus_keyword' => 'best hand warmer',                                   // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE

            'intro' => "If you want the short answer, the OUTJUT 6000mAh 2-pack is the best hand warmer for most people: 3,912 ratings at 4.6 stars, and because it is a pair you get a warmer for each hand, all for GBP 18.99. The cheapest strong option is the Gaiatop 2-pack at GBP 11.29, which also warms both hands.

Two choices decide which to buy. The first is one big warmer or a pair. A single high-capacity unit like the OCOOPA UT3 gets hotter, lasts longer and makes a better phone power bank, while a 2-pack gives you one for each hand, which is what most cold hands actually want. The second is capacity, measured in mAh, which sets how long the warmth lasts before recharging. Watch the marketing here: a 10000mAh 2-pack is two 5000mAh units, not 10000mAh each, so compare per warmer. Beyond that, look at the maximum temperature, usually 50 to 60°C, and whether it doubles as a power bank. We compared ten on capacity, heat, run time and price, and ranked them below.

One safety note. These get genuinely hot. Do not hold one against bare skin on the highest setting for a long time, and take extra care if you have reduced feeling in your hands.",

            'conclusion' => "For most people the best hand warmer here is the OUTJUT 2-pack: it has more reviews than anything else on the page, it is well priced, and a pair means a warmer in each pocket. If you want to spend as little as possible, the Gaiatop 2-pack does the same for around eleven pounds.

Choose differently for a specific reason. If you want one powerful unit that also charges your phone and runs all day, the OCOOPA UT3 is the pick, and it gets the hottest here. If you slip your warmer inside gloves, the ultra-slim OCOOPA UT5 Nano is the one that fits. And if it is your back or waist you want to warm rather than your hands, the heated pad at the bottom is a different tool built for exactly that. Whatever you choose, more mAh per warmer means longer warmth, so compare the capacity of a single unit, not the pair added together.",

            'author' => 'Felipe Iglesias',                                           // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-09-03 13:00:00',                                 // DATA FIXA — NAO USAR now()
        ];

        // ─── FICHA: good = MELHOR DA LISTA NO QUESITO, bad = PIOR, neutral = MEIO. COMPARA OS DEZ ENTRE SI. ───
        $products = [
            [
                'position' => 1,
                'name' => 'OUTJUT Rechargeable Hand Warmers 2 Pack, 6000mAh, 3 Heat Modes',
                'price' => '£18.99',
                'rating' => 4.6,
                'reviews_count' => 3912,
                'image' => 'https://m.media-amazon.com/images/I/71klC5jPWSL._AC_SL1500_.jpg',
                'alt_text' => 'best hand warmer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CHJ83DNH?tag=ranked10-21',
                'summary' => 'The best hand warmer for most people. A pair, so you warm both hands at once, with 3,912 ratings at 4.6 stars for GBP 18.99.',
                'body' => "Three thousand nine hundred and twelve ratings at 4.6 stars is the most customer feedback of any hand warmer in this comparison, and it comes on the format most people actually want: a 2-pack, so you have a warmer for each hand rather than passing one between cold fingers. At GBP 18.99 that is good value, and the two units snap together magnetically into a single block when you want to carry them as one.

Each unit holds a 3000mAh battery (6000mAh across the pair), heats in about two seconds and offers three heat settings, in a slim aluminium body that slides into a coat pocket. Split them apart and one hand each stays warm on a walk, a touchline or a commute.

There is little to fault at the price. The per-unit capacity is middling rather than large, so run time is good rather than all-day, and these do not double as a phone power bank the way the bigger single units do. But for the simple job of keeping both hands warm, backed by the biggest review count here, it is the pick.",
                'pros' => ['3,912 ratings at 4.6 stars, the most in this comparison', 'A 2-pack, so both hands stay warm at once', 'Magnetic units snap together to carry as one', '2-second heating and three heat settings', 'Slim aluminium body for GBP 18.99'],
                'contras' => ['3000mAh per unit is middling for run time', 'Does not work as a phone power bank', 'Not as hot as the 60°C units here', 'No smart temperature control'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '3,912 at 4.6 stars', 'verdict' => 'good', 'note' => 'The most feedback here.'],
                    ['label' => 'Format', 'value' => '2-pack, one per hand', 'verdict' => 'good'],
                    ['label' => 'Capacity', 'value' => '3000mAh each', 'verdict' => 'neutral'],
                    ['label' => 'Heat settings', 'value' => 'Three', 'verdict' => 'neutral'],
                    ['label' => 'Power bank', 'value' => 'No', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£18.99', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Gaiatop Rechargeable Hand Warmers 2 Pack, Magnetic, Avocado',
                'price' => '£11.29',
                'rating' => 4.6,
                'reviews_count' => 2886,
                'image' => 'https://m.media-amazon.com/images/I/61RhcOmnYKL._AC_SL1500_.jpg',
                'alt_text' => 'Gaiatop avocado rechargeable hand warmers 2 pack',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CCXLWWT2?tag=ranked10-21',
                'summary' => 'The best value here. A well-liked 2-pack at GBP 11.29, so both hands stay warm for the price of one warmer elsewhere.',
                'body' => "At GBP 11.29 with 2,886 ratings at 4.6 stars, the Gaiatop is the cheapest strong option on the page, and like the OUTJUT it is a pair, so you get a warmer for each hand for less than most single units cost. The avocado shape is a gimmick, but a harmless one, and the magnetic halves work together or separately.

Each holds a 2000mAh battery, heats within about three seconds and has three settings from roughly 55 to 65°C, with a clear indicator light for the remaining charge and current level. It is small and light, and it makes an easy, cheap gift.

The trade for the low price is run time: at 2000mAh per unit you get roughly three to four hours from each on a charge, less than the bigger warmers here, so it suits a walk or a match rather than a whole day out. But for two warm hands at the lowest sensible price, nothing here beats it.",
                'pros' => ['Cheapest strong option here at GBP 11.29', '2,886 ratings at 4.6 stars', 'A 2-pack, both hands warm', 'Heats in about three seconds, three heat levels', 'Clear charge and level indicator'],
                'contras' => ['2000mAh per unit, so only three to four hours each', 'Small capacity for a long day out', 'Novelty avocado styling will not suit everyone', 'No power-bank function'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£11.29', 'verdict' => 'good', 'note' => 'Cheapest strong option here.'],
                    ['label' => 'Customer ratings', 'value' => '2,886 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Format', 'value' => '2-pack, one per hand', 'verdict' => 'good'],
                    ['label' => 'Capacity', 'value' => '2000mAh each', 'verdict' => 'bad', 'note' => 'Smallest here, 3 to 4 hours.'],
                    ['label' => 'Heat settings', 'value' => 'Three', 'verdict' => 'neutral'],
                    ['label' => 'Power bank', 'value' => 'No', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'OCOOPA UT3 PRO 10000mAh Hand Warmer, Double-Sided, Max 58°C, Power Bank',
                'price' => '£29.99',
                'rating' => 4.2,
                'reviews_count' => 2925,
                'image' => 'https://m.media-amazon.com/images/I/61d9MPJiIUL._AC_SL1500_.jpg',
                'alt_text' => 'OCOOPA UT3 PRO 10000mAh double-sided hand warmer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CBX155FP?tag=ranked10-21',
                'summary' => 'The most powerful single unit. A 10000mAh double-sided warmer that gets the hottest here, lasts up to 15 hours, and doubles as a phone power bank.',
                'body' => "If you want one serious warmer rather than a pair, this is it. The OCOOPA UT3 packs a 10000mAh battery, twice the capacity of a whole 2-pack in a single unit, and uses it to run up to 15 hours, reach the highest temperature here at 58°C, and heat both faces at once so whichever way you hold it your hand is warm. It has 2,925 ratings at 4.2 stars.

Because the battery is so large, it doubles as a proper USB power bank, enough to top up a phone in the cold, which none of the small 2-packs can meaningfully do. Four heat levels and three-second heating round it out, and OCOOPA is the best-known brand in the category.

Two things to weigh. At GBP 29.99 it is the most expensive pocket warmer here, and it is one unit, so it warms one hand at a time unless you buy two. Its 4.2-star average is also a touch below the 4.6 of the value 2-packs. But for the hottest, longest-lasting warmer that is also a power bank, it is the standout single.",
                'pros' => ['10000mAh, the biggest capacity here, up to 15 hours', 'Hottest here at 58°C, double-sided heating', 'Doubles as a proper phone power bank', 'Four heat levels, three-second heating', 'OCOOPA, the best-known brand'],
                'contras' => ['GBP 29.99, the most expensive pocket warmer here', 'One unit, so one hand at a time', '4.2 stars, below the value 2-packs', 'Heavier than the slim warmers'],
                'specs' => [
                    ['label' => 'Capacity', 'value' => '10000mAh', 'verdict' => 'good', 'note' => 'The biggest here, up to 15 hours.'],
                    ['label' => 'Max temperature', 'value' => '58°C', 'verdict' => 'good', 'note' => 'The hottest here.'],
                    ['label' => 'Power bank', 'value' => 'Yes, charges a phone', 'verdict' => 'good'],
                    ['label' => 'Heating', 'value' => 'Double-sided', 'verdict' => 'good'],
                    ['label' => 'Format', 'value' => 'Single unit', 'verdict' => 'neutral', 'note' => 'One hand at a time.'],
                    ['label' => 'Price', 'value' => '£29.99', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Lepwings Rechargeable Hand Warmers 2 Pack, 6000mAh, 35-58°C',
                'price' => '£18.99',
                'rating' => 4.6,
                'reviews_count' => 2228,
                'image' => 'https://m.media-amazon.com/images/I/81w+bKFWRJL._AC_SL1500_.jpg',
                'alt_text' => 'Lepwings 6000mAh rechargeable hand warmers 2 pack',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CG98CH4D?tag=ranked10-21',
                'summary' => 'A 2-pack with the longest total warmth here — up to 20 hours across both units — at 4.6 stars for GBP 18.99.',
                'body' => "The Lepwings is a close rival to the OUTJUT at the same GBP 18.99: a 2-pack at 4.6 stars, 2,228 ratings, and a warmer for each hand. Its edge is run time. Lepwings quotes up to 20 hours of warmth across the two units, which is the most total warmth of any 2-pack here, useful for a long day outdoors where you switch between them.

Each is very light at 72g and 1.8cm thick, with adjustable temperatures from 35 to 58°C and three-second heating, and the curved flat body sits comfortably in the palm. The two snap together to carry as one.

It sits just below the OUTJUT on review count rather than on features, and, like the other value 2-packs, it does not function as a phone power bank. But if long total run time from a 2-pack matters most, this is the one to pick, and the wide 35 to 58°C range lets you dial the heat down to make a charge last even longer.",
                'pros' => ['Up to 20 hours total warmth, the most of any 2-pack here', '2,228 ratings at 4.6 stars for GBP 18.99', 'Very light at 72g each, slim 1.8cm', 'Wide 35 to 58°C range to stretch the charge', 'Magnetic units carry as one'],
                'contras' => ['Fewer ratings than the OUTJUT', 'No phone power-bank function', 'Smaller brand than OCOOPA', 'Max temperature just below the UT3'],
                'specs' => [
                    ['label' => 'Run time', 'value' => 'Up to 20h total', 'verdict' => 'good', 'note' => 'Most of any 2-pack here.'],
                    ['label' => 'Customer ratings', 'value' => '2,228 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Format', 'value' => '2-pack, one per hand', 'verdict' => 'good'],
                    ['label' => 'Temperature', 'value' => '35 to 58°C', 'verdict' => 'good', 'note' => 'Wide range to save charge.'],
                    ['label' => 'Price', 'value' => '£18.99', 'verdict' => 'good'],
                    ['label' => 'Power bank', 'value' => 'No', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'OCOOPA UT5 Nano Hand Warmers 2 Pack, Ultra-Slim 14mm, USB-C',
                'price' => '£14.99',
                'rating' => 4.6,
                'reviews_count' => 2223,
                'image' => 'https://m.media-amazon.com/images/I/71ogtpHn1UL._AC_SL1500_.jpg',
                'alt_text' => 'OCOOPA UT5 Nano ultra-slim hand warmers 2 pack',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FHKYW91D?tag=ranked10-21',
                'summary' => 'The slimmest here. At just 14mm thick, this OCOOPA 2-pack fits inside gloves or a small pocket, at 4.6 stars for GBP 14.99.',
                'body' => "The UT5 Nano is the one to buy if you want a warmer you barely notice. At 0.59 inches, about 14mm, thick and under 50g each, these are slim enough to slip inside a glove or a shirt pocket where the chunkier warmers will not fit. As a 2-pack from OCOOPA at 4.6 stars over 2,223 ratings, for GBP 14.99, it pairs the brand name with a low price.

It heats in two seconds, has three adjustable levels, gives around seven hours from each unit and charges over USB-C, with UL certification for safety. The collaboration artwork editions make it a tidy gift.

The trade for the slimness is capacity: a thin body holds a smaller battery than the chunky UT3, so it will not double as a power bank and does not get quite as hot. But if the thing that stops you using a hand warmer is that it is too bulky for your gloves or pockets, this solves exactly that, and it is cheap.",
                'pros' => ['Just 14mm thick, fits inside gloves or a small pocket', 'OCOOPA brand, 2,223 ratings at 4.6 stars', 'Around seven hours per unit, USB-C, UL certified', 'A 2-pack for GBP 14.99', 'Very light at under 50g each'],
                'contras' => ['Slim body holds a smaller battery', 'Does not work as a phone power bank', 'Not as hot as the UT3', 'Three levels rather than four'],
                'specs' => [
                    ['label' => 'Thickness', 'value' => '14mm, ultra-slim', 'verdict' => 'good', 'note' => 'Fits inside gloves.'],
                    ['label' => 'Customer ratings', 'value' => '2,223 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Format', 'value' => '2-pack, one per hand', 'verdict' => 'good'],
                    ['label' => 'Run time', 'value' => '~7 hours each', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£14.99', 'verdict' => 'good'],
                    ['label' => 'Power bank', 'value' => 'No', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'OCOOPA UT5 DuoHeat Hand Warmer, Double-Sided, 37-52°C, 3 Levels',
                'price' => '£19.54',
                'rating' => 4.5,
                'reviews_count' => 1710,
                'image' => 'https://m.media-amazon.com/images/I/71UMvWt5y7L._AC_SL1500_.jpg',
                'alt_text' => 'OCOOPA UT5 DuoHeat double-sided hand warmer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FHHG23TP?tag=ranked10-21',
                'summary' => 'A slim OCOOPA that heats both sides for full-palm warmth, with UL-certified batteries, at 4.5 stars for GBP 19.54.',
                'body' => "The DuoHeat is the pick if you want double-sided heating in a slim, pocket-friendly warmer. Where most slim units heat one face, this one warms both, so your whole palm and fingers get heat whichever way you hold it, and it still weighs just 67g and is 0.6 inches thick. It has 1,710 ratings at 4.5 stars.

It heats in three seconds, has three levels from 37 to 52°C, and uses UL-certified batteries in a durable ABS shell, with OCOOPA's usual tidy gift packaging. As a 2-in-1, the halves work together or apart.

It sits below the UT5 Nano mainly on review count, and its 52°C maximum is a little cooler than the hottest units here, which some people will prefer as gentler and safer against the skin. If full-palm warmth from a slim OCOOPA is what you want, this is the model, though the plain Nano above is cheaper if you do not need both sides heated.",
                'pros' => ['Double-sided heating for full-palm warmth', 'Slim and light at 67g, 0.6 inches thick', '1,710 ratings at 4.5 stars, UL-certified batteries', 'Heats in three seconds, three levels', 'OCOOPA brand and packaging'],
                'contras' => ['52°C maximum is cooler than the hottest here', 'Dearer than the plain UT5 Nano', 'Fewer ratings than the Nano', 'No power-bank function'],
                'specs' => [
                    ['label' => 'Heating', 'value' => 'Double-sided', 'verdict' => 'good', 'note' => 'Full-palm warmth.'],
                    ['label' => 'Customer ratings', 'value' => '1,710 at 4.5 stars', 'verdict' => 'neutral'],
                    ['label' => 'Temperature', 'value' => '37 to 52°C', 'verdict' => 'neutral', 'note' => 'Gentler than the 58°C units.'],
                    ['label' => 'Weight', 'value' => '67g, slim', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£19.54', 'verdict' => 'neutral'],
                    ['label' => 'Power bank', 'value' => 'No', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'OCOOPA UT2S Magnetic Hand Warmers 2 Pack, 5000mAh Each, USB-C Power Bank',
                'price' => '£25.49',
                'rating' => 4.2,
                'reviews_count' => 1349,
                'image' => 'https://m.media-amazon.com/images/I/81RgRupm5jL._AC_SL1500_.jpg',
                'alt_text' => 'OCOOPA UT2S magnetic hand warmers with power bank',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B7XJSBQ3?tag=ranked10-21',
                'summary' => 'A 2-pack where each unit is also a USB-C power bank. 5000mAh per warmer, four heat levels, up to eight hours each, at GBP 25.49.',
                'body' => "The UT2S bridges the two formats: it is a 2-pack, so both hands stay warm, but each unit carries a large 5000mAh battery and works as a USB-C and USB-A power bank in its own right. That means two hand warmers that can also charge your phone, which none of the cheaper 2-packs manage. It has 1,349 ratings at 4.2 stars.

Four heat levels, two-second heating and up to eight hours of warmth per unit on low make it flexible, and the two snap together magnetically to carry as a single block or a chunky power bank.

Two reasons it sits here. At GBP 25.49 it is one of the pricier options, and its 4.2-star average is below the 4.6 of the value 2-packs. But if you specifically want a pair of warmers that double as power banks, so you are covered for cold hands and a flat phone on the same trip, it is the one that does both.",
                'pros' => ['A 2-pack where each unit is also a USB-C power bank', '5000mAh per warmer, up to eight hours each', 'Four heat levels, two-second heating', 'Magnetic units carry as one block', 'Warms both hands and charges a phone'],
                'contras' => ['GBP 25.49, one of the pricier options', '4.2 stars, below the value 2-packs', 'Heavier than the slim warmers', 'Overkill if you do not need a power bank'],
                'specs' => [
                    ['label' => 'Power bank', 'value' => 'Each unit charges a phone', 'verdict' => 'good', 'note' => 'Rare on a 2-pack.'],
                    ['label' => 'Capacity', 'value' => '5000mAh each', 'verdict' => 'good'],
                    ['label' => 'Format', 'value' => '2-pack, one per hand', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '1,349 at 4.2 stars', 'verdict' => 'neutral'],
                    ['label' => 'Run time', 'value' => 'Up to 8h each', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£25.49', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Rechargeable Hand Warmers 2 Pack, 2x4000mAh, Magnetic, up to 60°C',
                'price' => '£12.99',
                'rating' => 4.5,
                'reviews_count' => 624,
                'image' => 'https://m.media-amazon.com/images/I/617OCVdJ9eL._AC_SL1500_.jpg',
                'alt_text' => 'Magnetic rechargeable hand warmers 2 pack up to 60 degrees',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FPFN847J?tag=ranked10-21',
                'summary' => 'A cheap 2-pack with larger 4000mAh units and a hot 60°C top setting, for GBP 12.99 — but on a smaller review count than the picks above.',
                'body' => "This 2-pack undercuts most rivals at GBP 12.99 while giving you more battery than the cheapest options: 4000mAh per unit, larger than the Gaiatop's 2000mAh, so each warmer runs longer between charges. It reaches a hot 60°C at the top of its three levels (45, 55 and 60°C), heats fast, and the magnetic halves join together or split for one hand each.

Dual USB-C charging and a flame-retardant ABS and aluminium build cover the practical side, and it makes a cheap winter gift.

It ranks here on evidence rather than specification: 624 ratings at 4.5 stars is a smaller, if still solid, sample than the thousands behind the OUTJUT, Gaiatop and Lepwings. The listing also sensibly reminds you to recharge it every couple of months if unused, which is good practice for any lithium warmer. For a cheap 2-pack with bigger batteries and a hot top setting, it is worth a look.",
                'pros' => ['4000mAh per unit, larger than the cheapest 2-packs', 'Hot 60°C top setting, three levels', 'GBP 12.99, cheap for the capacity', 'Dual USB-C charging, magnetic design', 'Warms both hands'],
                'contras' => ['624 ratings, a smaller sample than the picks above', 'Unbranded marketplace listing', 'No power-bank function', '60°C can be too hot against bare skin'],
                'specs' => [
                    ['label' => 'Capacity', 'value' => '4000mAh each', 'verdict' => 'good', 'note' => 'Larger than the cheap 2-packs.'],
                    ['label' => 'Price', 'value' => '£12.99', 'verdict' => 'good'],
                    ['label' => 'Max temperature', 'value' => '60°C', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '624 at 4.5 stars', 'verdict' => 'bad', 'note' => 'Smaller sample than the top picks.'],
                    ['label' => 'Format', 'value' => '2-pack, one per hand', 'verdict' => 'good'],
                    ['label' => 'Power bank', 'value' => 'No', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'Warmco Hand Warmers 2 Pack, 5000mAh Each, 9 Hours, Power Bank',
                'price' => '£19.99',
                'rating' => 4.2,
                'reviews_count' => 278,
                'image' => 'https://m.media-amazon.com/images/I/61nwUdstD9L._AC_SL1500_.jpg',
                'alt_text' => 'Warmco 2 pack hand warmers with power bank function',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DCMSGW7W?tag=ranked10-21',
                'summary' => 'A 2-pack with 5000mAh units, up to nine hours each and a power-bank function, for GBP 19.99 — cheaper than the OCOOPA UT2S but less proven.',
                'body' => "The Warmco covers the same idea as the OCOOPA UT2S for less money: two 5000mAh units that each run up to nine hours, double as a USB-C power bank, and snap together magnetically. Three heat levels reach up to 58°C, it heats in about ten seconds, and it includes overheat protection. At GBP 19.99 it undercuts the OCOOPA on price.

For a pair of higher-capacity warmers that can also charge a phone, without paying OCOOPA money, it is a reasonable option, and the aluminium build feels solid.

The reason it is ninth is evidence and finish: 278 ratings at 4.2 stars is the smaller end of the samples here, and it heats a touch slower than the two-second units above. If the price difference against the UT2S matters and you do not mind a less established name, it does the same job; if you want the reassurance of thousands of reviews, spend up or choose one of the value 2-packs.",
                'pros' => ['5000mAh per unit, up to nine hours each', 'Doubles as a USB-C power bank', 'Cheaper than the OCOOPA UT2S at GBP 19.99', 'Magnetic, solid aluminium build', 'Overheat protection'],
                'contras' => ['278 ratings, one of the smaller samples here', 'Ten-second heating, slower than the best', '4.2 stars, below the value 2-packs', 'Less established brand'],
                'specs' => [
                    ['label' => 'Capacity', 'value' => '5000mAh each', 'verdict' => 'good'],
                    ['label' => 'Power bank', 'value' => 'Yes', 'verdict' => 'good'],
                    ['label' => 'Run time', 'value' => 'Up to 9h each', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '278 at 4.2 stars', 'verdict' => 'bad', 'note' => 'Smaller sample here.'],
                    ['label' => 'Heating', 'value' => '~10 seconds', 'verdict' => 'neutral', 'note' => 'Slower than the two-second units.'],
                    ['label' => 'Price', 'value' => '£19.99', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Heated Pad with Hand Pocket, Waist Wrap, 10 Heat Levels 40-60°C, Timers',
                'price' => '£24.99',
                'rating' => 4.5,
                'reviews_count' => 384,
                'image' => 'https://m.media-amazon.com/images/I/71tS-7N7fmL._AC_SL1500_.jpg',
                'alt_text' => 'Heated pad with hand pocket and waist wrap',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DR5FM1JH?tag=ranked10-21',
                'summary' => 'A different tool: a heated pad that wraps around your waist or back and has a built-in hand pocket. For warming more than your hands.',
                'body' => "This is on the list for anyone who searches for a hand warmer when what they really want is to warm their back, waist or middle. It is a fleece-covered heated pad with a hook-and-loop wrap, so it fastens around your waist or lies across your back, shoulders or calves, with a built-in pocket to warm your hands at the same time. It has 384 ratings at 4.5 stars for GBP 24.99.

Ten heat levels from 40 to 60°C and 0.5, 1, 1.5 and 2-hour timers give it far finer control than any pocket warmer here, and the plush fleece is comfortable against the skin for long sessions at a desk or on the sofa.

Be clear that it is a different product: it is larger, wraps around the body rather than sitting in a pocket, and is built for broad, steady warmth over an area rather than portable pocket heat. But if aching hands are only part of the problem and you also want your back or waist warmed, this does both, which no pocket warmer here can.",
                'pros' => ['Warms your back or waist as well as your hands', 'Built-in hand pocket, plush fleece cover', '10 heat levels and four timers for fine control', 'Wraps and fastens around the body', '4.5 stars over 384 ratings'],
                'contras' => ['A different, larger product, not a pocket warmer', 'Less portable than the pocket units', '384 ratings, a smaller sample', 'Built for area warmth, not carrying in a coat'],
                'specs' => [
                    ['label' => 'Type', 'value' => 'Wrap pad + hand pocket', 'verdict' => 'neutral', 'note' => 'Not a pocket hand warmer.'],
                    ['label' => 'Heat levels', 'value' => '10, 40 to 60°C', 'verdict' => 'good', 'note' => 'The finest control here.'],
                    ['label' => 'Timers', 'value' => '0.5 to 2 hours', 'verdict' => 'good'],
                    ['label' => 'Coverage', 'value' => 'Waist, back, hands', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '384 at 4.5 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£24.99', 'verdict' => 'neutral'],
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
        $this->command?->info("HandWarmersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
