<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class GarmentSteamersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE VAPORIZADORES DE ROUPA DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=garment+steamer+clothes&rh=p_36%3A2000-  (18 ASINS, 10 FICHAS ABERTAS)
        // CATEGORIA HOME. SAZONAL: EVERGREEN, PICO EM EPOCA DE FESTA/VIAGEM.
        //
        // PADRAO EDITORIAL (30/08): E UM TOP 10, NAO ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── EIXOS DE COMPRA ───
        //   MAO (portatil, viagem, 100-300ml, 15-45s p/ aquecer) x VERTICAL/UPRIGHT (tanque 3L, 2200W, uso continuo).
        //   VAZAO g/min (20-30 g/min nos de mao) = quanto vapor sai. TANQUE ml = quanto tempo antes de reencher.
        //   SOLEPLATE AQUECIDA (Philips 5000, Tefal AeroSteam) = pode encostar no tecido, tipo ferro leve.
        //   ⚠ JA TEMOS best-steam-generator-iron (central de vapor). AQUI E VAPORIZADOR: alisa na vertical, no cabide, sem tabua.
        //   ALEGACAO "MATA 99,9% DAS BACTERIAS" APARECE EM QUASE TODOS — REPORTAR COMO ALEGACAO DO FABRICANTE, NAO AFIRMAR.
        //
        // ⚠ POOL COMPARTILHADO: SWAN SI12022N (B08B8XQG8B) e SI12020N (B078GQPS1Q) = 9.794 cada. MODELOS DIFERENTES,
        //   MESMO POOL (SI12022N: painel ceramico, 300ml, 25g/min; SI12020N: escova removivel, 250ml, cabo 1,9m). SINALIZADO.
        //
        // PROFUNDIDADE (FICHA): 12.533 / 9.794 / 9.794 / 2.170 / 1.767 / 1.611 / 1.144 / 1.053 / 245 / 237.
        //
        // FOCUS KEYWORD: best clothes steamer
        // VARIACOES: garment steamer / clothes steamer / handheld steamer / travel steamer /
        // best clothes steamer uk / upright garment steamer / steamer for clothes no ironing board
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',
            'name' => 'Home',
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.',
        ];

        $article = [
            'slug' => 'best-clothes-steamer',
            'title' => 'Best Clothes Steamer 2026: 10 Garment Steamers Ranked',
            'meta_title' => 'Best Clothes Steamer 2026: 10 Garment Steamers Ranked',
            'meta_description' => 'The best clothes steamer picks for UK homes, from handheld travel models to upright steamers. Ten garment steamers compared on steam rate, tank and price.',
            'focus_keyword' => 'best clothes steamer',

            'intro' => "If you want the short answer, the BEAUTURAL handheld is the best clothes steamer for most people: 12,533 ratings at 4.3 stars, a large 260ml tank, a ceramic plate that glides over fabric, and anti-leak design so it works held at any angle, for GBP 23.99. If you want a familiar high-street brand for about the same money, the Swan is GBP 22.99.

A garment steamer does a different job from an iron: it relaxes creases out of fabric hanging on a hanger, so there is no ironing board, and it handles things an iron struggles with, like suit jackets, curtains still on the rail, and pleats. Two numbers matter. The steam rate in grams per minute, usually 20 to 30 on a handheld, tells you how fast it works. The tank size, from 100ml to 300ml on handhelds, tells you how long before you refill — and on a big session that is the difference between one fill and four. The other choice is format: a handheld is cheap, portable and fine for a few garments, while an upright with a 2 to 3 litre tank is for people steaming a wardrobe at a time. Note also that nearly every listing here claims to kill 99.9 percent of bacteria; that is the maker's claim rather than something we tested.",

            'conclusion' => "For most homes the best clothes steamer here is the BEAUTURAL: it has by far the most reviews on the page, its 260ml tank is bigger than most rivals, and the anti-leak design means you can use it horizontally on a collar without dripping water down the garment. The Swan is the value alternative from a name you will recognise.

Buy differently for two reasons. If you steam a lot at once — a market stall, a wardrobe refresh, curtains — a handheld will frustrate you and the SA BI upright with its 3 litre tank is the right class of machine. And if you want something closer to ironing, the Philips 5000 and the Tefal AeroSteam both have heated plates you can press against the fabric, which gets sharper results on shirt collars and cuffs than steam alone. For travel, the smaller Philips 3000 folds down and heats in 30 seconds.",

            'author' => 'Felipe Iglesias',
            'published_at' => '2026-09-03 06:30:00',
        ];

        $products = [
            [
                'position' => 1,
                'name' => 'BEAUTURAL Handheld Clothes Steamer, 1200W, 260ml Tank, Ceramic Plate',
                'price' => '£23.99',
                'rating' => 4.3,
                'reviews_count' => 12533,
                'image' => 'https://m.media-amazon.com/images/I/61l2-cDpClL._AC_SL1500_.jpg',
                'alt_text' => 'best clothes steamer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01MTYPC1H?tag=ranked10-21',
                'summary' => 'The best clothes steamer for most people. 12,533 ratings, a large 260ml tank, and an anti-leak design that works held at any angle.',
                'body' => "Twelve thousand five hundred and thirty-three ratings is more than double any other steamer on this page, and the design earns it. The 260ml tank is larger than most handhelds, so you steam several garments before refilling, and the anti-leak construction means it works held horizontally as well as vertically — which matters the moment you tilt it to do a collar or a cuff and a cheaper steamer dribbles water onto the shirt.

A thermostatic ceramic plate lets it glide over fabric rather than catching, a lock button gives continuous steam without holding the trigger, and it shuts off automatically if the water runs low or it sits idle for eight minutes.

At GBP 23.99 with 1200W it is not the most powerful steamer here, and its 4.3-star average is solid rather than outstanding. But for a handheld that does the everyday job reliably at a low price, nothing else on the page has this weight of evidence behind it.",
                'pros' => ['12,533 ratings, more than double any rival here', 'Large 260ml tank, fewer refills', 'Anti-leak: works horizontally as well as vertically', 'Ceramic plate glides over fabric', 'Continuous steam lock and automatic shut-off'],
                'contras' => ['1200W, less powerful than the 1500-1700W models', '4.3 stars, solid rather than outstanding', 'No heated soleplate for pressing', 'Handheld only, not for big sessions'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '12,533 at 4.3 stars', 'verdict' => 'good', 'note' => 'Double any rival here.'],
                    ['label' => 'Tank', 'value' => '260 ml', 'verdict' => 'good', 'note' => 'Larger than most handhelds.'],
                    ['label' => 'Anti-leak', 'value' => 'Any angle', 'verdict' => 'good'],
                    ['label' => 'Power', 'value' => '1200W', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£23.99', 'verdict' => 'good'],
                    ['label' => 'Safety', 'value' => 'Auto shut-off', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Swan SI12022N Garment Steamer, 1500W, 300ml, Ceramic Coated Panel',
                'price' => '£22.99',
                'rating' => 4.2,
                'reviews_count' => 9794,
                'image' => 'https://m.media-amazon.com/images/I/61Rz50Jd0kL._AC_SL1500_.jpg',
                'alt_text' => 'Swan SI12022N portable garment steamer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08B8XQG8B?tag=ranked10-21',
                'summary' => 'The value pick from a familiar brand. The biggest handheld tank here at 300ml, 1500W and a 25g/min steam rate, for GBP 22.99.',
                'body' => "Swan is a name most British buyers know from the high street, and this steamer backs it with the best raw specification of the cheap handhelds: 1500W, a 25 gram per minute steam rate and a 300ml tank, the largest of any handheld on this page. More power and more water means fewer pauses on a pile of shirts.

A ceramic-coated steam panel is gentler on fabric than bare metal, there is a lock function for continuous steam, and Swan makes the usual claim about removing bacteria and odours, which is worth treating as marketing rather than a tested result.

Its 4.2-star average is the lowest of the well-reviewed steamers here, which is the honest mark against it, and it shares its 9,794 ratings with the SI12020N model further down, so the score covers both machines. At GBP 22.99 with this tank and power, it remains excellent value.",
                'pros' => ['300ml tank, the largest handheld here', '1500W with a 25g/min steam rate', 'Familiar Swan brand at GBP 22.99', 'Ceramic-coated panel, gentle on fabric', 'Continuous steam lock function'],
                'contras' => ['4.2 stars, lowest of the well-reviewed steamers', 'Shares its rating pool with the SI12020N', 'Heavier once the big tank is full', 'Bacteria claim is unverified marketing'],
                'specs' => [
                    ['label' => 'Tank', 'value' => '300 ml', 'verdict' => 'good', 'note' => 'The largest handheld tank here.'],
                    ['label' => 'Power', 'value' => '1500W, 25 g/min', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£22.99', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '9,794 at 4.2 stars', 'verdict' => 'neutral', 'note' => 'Shared with the SI12020N.'],
                    ['label' => 'Panel', 'value' => 'Ceramic coated', 'verdict' => 'good'],
                    ['label' => 'Brand', 'value' => 'Swan', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Philips Garment Steamer 5000 Series, 24 g/min, Heated Plate, Dual Tanks',
                'price' => '£55.98',
                'rating' => 4.3,
                'reviews_count' => 1053,
                'image' => 'https://m.media-amazon.com/images/I/51aGPi1E8aL._AC_SL1500_.jpg',
                'alt_text' => 'Philips 5000 series handheld garment steamer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D4ZJQ3W8?tag=ranked10-21',
                'summary' => 'The closest thing to ironing without a board. An actively heated plate you can press against fabric, 24g/min steam, and two tanks totalling 320ml.',
                'body' => "Steam alone relaxes creases; pressing sharpens them. The Philips 5000 has an actively heated metal plate, so you can press it against the garment like a light iron while steaming, which gets far crisper results on collars, cuffs and shirt plackets than a plain steamer manages. Philips states it is safe on delicate fabrics with no burns, and there is a pointed tip for getting into tricky areas.

It produces up to 24 grams of steam a minute, is ready in 35 seconds, and comes with two detachable tanks, 120ml and an extra 200ml, plus a mat and a glove pouch. Eco and Max settings let you dial the output down for lighter fabrics. It has 1,053 ratings at 4.3 stars.

At GBP 55.98 it is more than twice the price of the top two picks, which is the main reservation. Buy it if you want ironing-quality results without an ironing board; if you only want creases relaxed out of a jumper, the cheaper handhelds do that.",
                'pros' => ['Actively heated plate presses as it steams, near-iron results', '24 g/min steam, ready in 35 seconds', 'Two tanks, 120ml plus an extra 200ml', 'Eco and Max settings plus a precision tip', 'Mat and glove pouch included'],
                'contras' => ['GBP 55.98, over twice the top picks', '1,053 ratings, far fewer than the budget steamers', 'Heavier than a plain handheld', 'Bacteria claim is the maker figure'],
                'specs' => [
                    ['label' => 'Heated plate', 'value' => 'Yes, press as you steam', 'verdict' => 'good', 'note' => 'Sharper than steam alone.'],
                    ['label' => 'Steam rate', 'value' => '24 g/min', 'verdict' => 'good'],
                    ['label' => 'Tanks', 'value' => '120ml + 200ml', 'verdict' => 'good'],
                    ['label' => 'Heat-up', 'value' => '35 seconds', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£55.98', 'verdict' => 'bad'],
                    ['label' => 'Customer ratings', 'value' => '1,053 at 4.3 stars', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Tefal Pure Pop Slim Handheld Clothes Steamer, 20 g/min, Reversible Pad',
                'price' => '£46.93',
                'rating' => 4.3,
                'reviews_count' => 2170,
                'image' => 'https://m.media-amazon.com/images/I/71xE9DCCEqL._AC_SL1500_.jpg',
                'alt_text' => 'Tefal Pure Pop slim handheld clothes steamer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BX71T5JH?tag=ranked10-21',
                'summary' => 'The best travel steamer. Ultra-slim, heats in 15 seconds, and its reversible pad has a velvet side for delicates and a lint side for brushing.',
                'body' => "The Pure Pop is built around being small and quick. It heats in 15 seconds — the fastest on this page — delivers 20 grams of steam a minute, and its ultra-slim body packs into a case easily, which is exactly what you want for a suit or a dress that has been folded in a bag.

Its cleverest feature is the reversible pad: one side is velvet for gently steaming delicate fabrics, the other is a lint remover for brushing off hair and fluff, so one accessory covers two jobs travellers actually have. It works vertically or horizontally, and it comes with a travel pouch. It has 2,170 ratings at 4.3 stars.

The catch is price. At GBP 46.93 it costs twice the BEAUTURAL and Swan for a smaller tank and lower steam rate, so you are paying for Tefal's build, the 15-second heat-up and the slim form. For frequent travellers that is a fair trade; for steaming at home, the cheaper handhelds do more per fill.",
                'pros' => ['Heats in 15 seconds, the fastest here', 'Ultra-slim and light, genuinely packable', 'Reversible pad: velvet for delicates, lint side for brushing', 'Works vertically or horizontally', 'Travel pouch included, trusted Tefal brand'],
                'contras' => ['GBP 46.93, twice the price of the top picks', 'Smaller tank than the budget handhelds', '20 g/min, lower than the Swan and Philips', 'Frequent refills on a big session'],
                'specs' => [
                    ['label' => 'Heat-up', 'value' => '15 seconds', 'verdict' => 'good', 'note' => 'The fastest on this page.'],
                    ['label' => 'Portability', 'value' => 'Ultra-slim, pouch', 'verdict' => 'good', 'note' => 'The best travel pick.'],
                    ['label' => 'Pad', 'value' => 'Velvet and lint sides', 'verdict' => 'good'],
                    ['label' => 'Steam rate', 'value' => '20 g/min', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£46.93', 'verdict' => 'bad'],
                    ['label' => 'Customer ratings', 'value' => '2,170 at 4.3 stars', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Russell Hobbs Steam Genie Handheld Clothes Steamer, 1600W, 200ml',
                'price' => '£25.00',
                'rating' => 4.1,
                'reviews_count' => 1767,
                'image' => 'https://m.media-amazon.com/images/I/61BWBTMja9L._AC_SL1500_.jpg',
                'alt_text' => 'Russell Hobbs Steam Genie handheld clothes steamer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B2DQVVZS?tag=ranked10-21',
                'summary' => 'A familiar UK brand at GBP 25.00, with 1600W, a 20g steam output and a guarantee that runs to three years on registration.',
                'body' => "The Steam Genie is Russell Hobbs's straightforward handheld: 1600W, a 20 gram steam output, a 200ml tank and a 45-second heat-up, aimed at freshening clothes on the hanger without an ironing board. For buyers who prefer a familiar British brand to a marketplace name at the same price, that is the appeal.

The guarantee is the standout on paper: two years as standard and a third year if you register online, which is longer cover than most steamers here offer at any price.

Two things keep it mid-table. Its 4.1-star average is the lowest on this page, and at 200ml the tank is smaller than the BEAUTURAL and Swan, so you refill more often for the same pile of shirts. It is a reasonable buy for the brand and the guarantee, but the two picks above give you more steamer for the money.",
                'pros' => ['Familiar Russell Hobbs brand at GBP 25.00', '1600W with a 20g steam output', 'Three-year guarantee with online registration', '45-second heat-up, no ironing board needed', '1,767 ratings'],
                'contras' => ['4.1 stars, the lowest average on this page', '200ml tank, smaller than the top picks', 'More refills on a big session', 'Bacteria claim is the maker figure'],
                'specs' => [
                    ['label' => 'Brand', 'value' => 'Russell Hobbs', 'verdict' => 'good'],
                    ['label' => 'Guarantee', 'value' => 'Up to 3 years', 'verdict' => 'good', 'note' => 'The longest cover here.'],
                    ['label' => 'Average score', 'value' => '4.1 stars', 'verdict' => 'bad', 'note' => 'The lowest on this page.'],
                    ['label' => 'Tank', 'value' => '200 ml', 'verdict' => 'neutral'],
                    ['label' => 'Power', 'value' => '1600W', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£25.00', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'Russell Hobbs Steam Genie 2in1 Steamer with Ironing Option, Ceramic Soleplate',
                'price' => '£41.25',
                'rating' => 4.2,
                'reviews_count' => 1611,
                'image' => 'https://m.media-amazon.com/images/I/615g2bCdiwL._AC_SL1500_.jpg',
                'alt_text' => 'Russell Hobbs Steam Genie 2in1 steamer and iron',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B2DMM78J?tag=ranked10-21',
                'summary' => 'A steamer and a small iron in one, with a ceramic soleplate, three attachments and a one-minute heat-up, for GBP 41.25.',
                'body' => "This is the two-in-one answer for people who do not want both a steamer and an iron in the cupboard. It steams garments on the hanger like a normal handheld, and its ceramic soleplate lets you use it as a compact iron on a flat surface, with even heat distribution and a smooth glide. Three attachments cover different fabrics.

It is ready in about a minute, has a 150ml removable tank and roughly ten minutes of steam time, at 1400 to 1700W. It has 1,611 ratings at 4.2 stars.

Two caveats. The 150ml tank is the smallest of the mainstream handhelds here, so ten minutes of steaming is genuinely the limit before a refill, and at GBP 41.25 it costs well above the plain Steam Genie. Buy it if replacing an iron as well as adding a steamer is the point; if you already own an iron, the cheaper handhelds make more sense.",
                'pros' => ['Steamer and compact iron in one appliance', 'Ceramic soleplate for even heat and smooth glide', 'Three attachments for different fabrics', 'Ready in about a minute, removable tank', 'Saves owning two appliances'],
                'contras' => ['150ml tank, the smallest mainstream one here', 'About ten minutes of steam before refilling', 'GBP 41.25, well above the plain Steam Genie', '4.2 stars, mid-pack'],
                'specs' => [
                    ['label' => 'Two in one', 'value' => 'Steamer and iron', 'verdict' => 'good', 'note' => 'Replaces both appliances.'],
                    ['label' => 'Soleplate', 'value' => 'Ceramic', 'verdict' => 'good'],
                    ['label' => 'Tank', 'value' => '150 ml', 'verdict' => 'bad', 'note' => 'Smallest mainstream tank here.'],
                    ['label' => 'Steam time', 'value' => 'About 10 minutes', 'verdict' => 'bad'],
                    ['label' => 'Customer ratings', 'value' => '1,611 at 4.2 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£41.25', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Philips Garment Steamer 3000 Series, 1000W, 20 g/min, Foldable for Travel',
                'price' => '£37.97',
                'rating' => 4.1,
                'reviews_count' => 1144,
                'image' => 'https://m.media-amazon.com/images/I/41Voc6M7HCL._AC_SL1500_.jpg',
                'alt_text' => 'Philips 3000 series foldable travel garment steamer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CCPHQJ5X?tag=ranked10-21',
                'summary' => 'A foldable Philips for travel: ready in 30 seconds, 20g/min, with a detachable 100ml tank and a body that packs flat.',
                'body' => "The 3000 Series is Philips's compact travel steamer. It folds down so it takes very little room in a case, is ready to use in 30 seconds, and delivers up to 20 grams of steam a minute from 1000 watts, with a detachable 100ml tank that is easy to fill in a hotel bathroom.

Philips states it is safe on all ironable fabrics, and the compact, lightweight body is the whole point — it is designed to travel rather than to work through a laundry pile.

Two things keep it here. The 100ml tank is the smallest on this page, so home use means constant refilling, and its 4.1-star average is joint lowest. At GBP 37.97 it also costs more than the Tefal Pure Pop's nearest rivals while heating half as fast. Buy it specifically for the fold-flat packing; for anything else, look higher up the page.",
                'pros' => ['Folds flat, genuinely packable for travel', 'Ready in 30 seconds', 'Detachable 100ml tank, easy to fill anywhere', 'Philips brand, safe on all ironable fabrics', '20 g/min continuous steam'],
                'contras' => ['100ml tank, the smallest here, constant refilling at home', '4.1 stars, joint lowest average on the page', 'GBP 37.97 for 1000W', 'Slower to heat than the Tefal Pure Pop'],
                'specs' => [
                    ['label' => 'Portability', 'value' => 'Folds flat', 'verdict' => 'good'],
                    ['label' => 'Tank', 'value' => '100 ml', 'verdict' => 'bad', 'note' => 'The smallest here.'],
                    ['label' => 'Heat-up', 'value' => '30 seconds', 'verdict' => 'good'],
                    ['label' => 'Average score', 'value' => '4.1 stars', 'verdict' => 'bad'],
                    ['label' => 'Power', 'value' => '1000W', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£37.97', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Swan SI12020N Handheld Garment Steamer, 250ml, Removable Fabric Brush, 1.9m Cable',
                'price' => '£22.99',
                'rating' => 4.2,
                'reviews_count' => 9794,
                'image' => 'https://m.media-amazon.com/images/I/6127+34+WUL._AC_SL1500_.jpg',
                'alt_text' => 'Swan SI12020N handheld garment steamer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B078GQPS1Q?tag=ranked10-21',
                'summary' => 'The other Swan: a 250ml tank giving 20 minutes of continuous steam, a removable fabric brush and an extra-long 1.9m cable.',
                'body' => "This is Swan's other handheld, and the differences from the SI12022N above are worth knowing: a 250ml tank that Swan rates at 20 minutes of continuous steam, a removable fabric brush for lifting the nap on heavier cloth, and an extra-long 1.9 metre power cable, which matters more than it sounds when you are steaming a curtain and the nearest socket is across the room.

It is lightweight and compact for travel, and carries the same two-year guarantee with an optional extension.

Two notes. It shares its 9,794 ratings with the SI12022N, so the score describes both machines rather than this one, and the ceramic panel of that model is a slightly better surface. At the same GBP 22.99, pick this one for the long cable and the brush, or the SI12022N for the bigger tank and ceramic plate.",
                'pros' => ['250ml tank rated for 20 minutes of continuous steam', 'Removable fabric brush for heavier cloth', 'Extra-long 1.9m cable reaches curtains and far corners', 'Lightweight and compact for travel', 'Same low GBP 22.99 price'],
                'contras' => ['Shares its rating pool with the SI12022N', 'No ceramic panel, unlike its sibling', '4.2 stars, low for this page', 'Smaller tank than the SI12022N'],
                'specs' => [
                    ['label' => 'Tank', 'value' => '250 ml, 20 min steam', 'verdict' => 'good'],
                    ['label' => 'Cable', 'value' => '1.9 m', 'verdict' => 'good', 'note' => 'Reaches curtains easily.'],
                    ['label' => 'Brush', 'value' => 'Removable fabric brush', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '9,794 at 4.2 stars', 'verdict' => 'neutral', 'note' => 'Shared with the SI12022N.'],
                    ['label' => 'Panel', 'value' => 'No ceramic coating', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£22.99', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'SA BI Professional Upright Garment Steamer, 2200W, 3 Litre Tank',
                'price' => '£149.90',
                'rating' => 4.2,
                'reviews_count' => 245,
                'image' => 'https://m.media-amazon.com/images/I/71Sho9GQO6L._AC_SL1500_.jpg',
                'alt_text' => 'SA BI professional upright garment steamer with 3 litre tank',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08G1HNYVR?tag=ranked10-21',
                'summary' => 'The only upright here. A 2200W professional steamer with a 3 litre tank for steaming a whole wardrobe, curtains or stock without refilling.',
                'body' => "Every other steamer on this page is a handheld, and if you steam more than a few garments at a time, they will all frustrate you: the tank empties, you refill, you wait. The SA BI is the other class of machine — an upright with a 3 litre tank and a 2200W boiler, on a stand with a hanger, so you work through a wardrobe, a set of curtains or a rail of stock in one go.

It works at any angle, has a step rotary switch to match the output to different fabrics, and is genuinely a different tool rather than a bigger version of a handheld.

Two things put it at ninth. At GBP 149.90 it is by far the most expensive product here, and 245 ratings is a small sample. It also needs floor space and takes longer to set up than grabbing a handheld. Buy it if you regularly steam in volume; for a few shirts a week it is entirely the wrong machine.",
                'pros' => ['3 litre tank, steam a wardrobe without refilling', '2200W boiler, far more output than any handheld', 'Upright stand with hanger for hands-free work', 'Rotary switch matches output to fabric', 'Works at any angle'],
                'contras' => ['GBP 149.90, by far the dearest here', 'Only 245 ratings, a small sample', 'Needs floor space and set-up time', 'Wrong tool for a few shirts a week'],
                'specs' => [
                    ['label' => 'Type', 'value' => 'Upright, 3L tank', 'verdict' => 'good', 'note' => 'The only volume machine here.'],
                    ['label' => 'Power', 'value' => '2200W', 'verdict' => 'good', 'note' => 'The most on this page.'],
                    ['label' => 'Price', 'value' => '£149.90', 'verdict' => 'bad', 'note' => 'The dearest here.'],
                    ['label' => 'Customer ratings', 'value' => '245 at 4.2 stars', 'verdict' => 'bad'],
                    ['label' => 'Setup', 'value' => 'Stand, floor space', 'verdict' => 'bad'],
                    ['label' => 'Fabric control', 'value' => 'Rotary switch', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Tefal AeroSteam Handheld Clothes Steamer with Optiflow Suction Technology',
                'price' => '£114.99',
                'rating' => 4.3,
                'reviews_count' => 237,
                'image' => 'https://m.media-amazon.com/images/I/61M7atw4QnL._AC_SL1500_.jpg',
                'alt_text' => 'Tefal AeroSteam handheld clothes steamer with suction',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F2J4S6CD?tag=ranked10-21',
                'summary' => 'The most advanced handheld here: suction pulls the fabric flat against a heated soleplate, so one pass gets iron-like results without a board.',
                'body' => "The AeroSteam does something no other steamer on this page attempts. Tefal's patented Optiflow technology combines steam with suction, pulling the hanging garment flat against a heated soleplate so the fabric is held taut as it is pressed — which is what an ironing board normally does. Tefal claims iron-like results in a single stroke and up to 50 percent faster steaming than traditional handhelds, with three power modes and a mono-temp soleplate.

For anyone who wants genuinely crisp shirts but has no room for a board, it is the most interesting product in the comparison.

Two things place it last. At GBP 114.99 it is the most expensive handheld here by a wide margin, and 237 ratings is one of the smallest samples on the page, so the 4.3-star score is not yet settled. Tefal's own supporting numbers are footnoted marketing claims rather than independent tests. If the suction idea appeals and the budget stretches, it is genuinely novel; if not, the Philips 5000 gives you a heated plate for half the price.",
                'pros' => ['Suction holds fabric taut, no ironing board needed', 'Heated soleplate for near-iron sharpness', 'Tefal claims up to 50 percent faster steaming', 'Three power modes for different fabrics', 'The most advanced handheld in this comparison'],
                'contras' => ['GBP 114.99, the dearest handheld here by far', 'Only 237 ratings, an unsettled score', 'Performance claims are footnoted marketing', 'Heavier and bulkier than a plain handheld'],
                'specs' => [
                    ['label' => 'Technology', 'value' => 'Steam plus suction', 'verdict' => 'good', 'note' => 'Unique on this page.'],
                    ['label' => 'Soleplate', 'value' => 'Heated', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£114.99', 'verdict' => 'bad', 'note' => 'Dearest handheld here.'],
                    ['label' => 'Customer ratings', 'value' => '237 at 4.3 stars', 'verdict' => 'bad'],
                    ['label' => 'Modes', 'value' => '3 power settings', 'verdict' => 'good'],
                    ['label' => 'Claims', 'value' => 'Footnoted marketing', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
        ];

        // ═══════════════════════════════════════════════════════════════
        // ═══ FIM DA AREA EDITAVEL ═══
        // ═══════════════════════════════════════════════════════════════

        $categoryModel = Category::updateOrCreate(['slug' => $category['slug']], $category);
        $articleModel = Article::updateOrCreate(['slug' => $article['slug']], array_merge($article, ['category_id' => $categoryModel->id]));
        $articleModel->products()->delete();
        foreach ($products as $produto) {
            $articleModel->products()->create($produto);
        }
        $this->command?->info("GarmentSteamersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos).");
    }
}
