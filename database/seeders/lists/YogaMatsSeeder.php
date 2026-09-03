<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class YogaMatsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE TAPETES DE YOGA DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=yoga+mat+non+slip&rh=p_36%3A1500-  (18 ASINS, 10 FICHAS ABERTAS)
        // CATEGORIA FITNESS. SAZONAL: PICO EM JANEIRO E NO OUTONO (volta pra dentro de casa).
        //
        // PADRAO EDITORIAL (30/08): E UM TOP 10, NAO ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── ACHADO QUE MUDA A COMPRA: GROSSURA NAO E "QUANTO MAIS MELHOR" ───
        //   4-6mm = ESTAVEL em pose de equilibrio em pe (pe sente o chao). 10-15mm = CONFORTO de joelho/coluna
        //   no chao, MAS BALANCA em pose de equilibrio. → YOGA EM PE PEDE FINO; PILATES/ABDOMINAL/JOELHO PEDE GROSSO.
        //   ESSA E A PERGUNTA FACTUAL DA CATEGORIA ("que espessura de tapete de yoga").
        //
        // MATERIAL: TPE (leve, barato, celula fechada, nao absorve suor) x NBR (grosso, macio, mais barato por mm)
        //   x BORRACHA NATURAL (grip de verdade com suor, pesado, caro, biodegradavel).
        //   LARGURA PADRAO 61cm — 66-68cm (PROIRON, Yogi Bare) e notavelmente mais confortavel p/ ombro largo.
        //
        // PROFUNDIDADE (FICHA): 7.756 / 7.708 / 3.481 / 2.425 / 2.228 / 1.766 / 1.677 / 1.014 / 1.008 / 35.
        //
        // FOCUS KEYWORD: best yoga mat
        // VARIACOES: yoga mat / non slip yoga mat / thick yoga mat / best yoga mat uk / exercise mat /
        // yoga mat for beginners / natural rubber yoga mat / pilates mat / 6mm yoga mat
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'fitness',
            'name' => 'Fitness',
            'description' => 'Research-led guides to the best fitness gear, from home gym kit to workout clothing.',
        ];

        $article = [
            'slug' => 'best-yoga-mat',
            'title' => 'Best Yoga Mat 2026: 10 Non-Slip Mats Ranked by Thickness and Grip',
            'meta_title' => 'Best Yoga Mat 2026: 10 Non-Slip Mats Ranked',
            'meta_description' => 'The best yoga mat picks for UK homes, from budget TPE to natural rubber. Ten non-slip mats compared on thickness, grip, width and price.',
            'focus_keyword' => 'best yoga mat',

            'intro' => "If you want the short answer, the PROIRON is the best yoga mat for most people: 7,756 ratings at 4.6 stars, an extra-wide 183 x 66cm surface, reinforced edges and a choice of 10mm or 15mm cushioning, for GBP 22.99. If you practise standing yoga rather than floor work, the 6mm YOGATI with printed alignment lines is the better shape of mat, and the Core Balance costs just GBP 13.59.

The number everyone gets wrong is thickness, because more is not better — it is a trade-off. A thick 10 to 15mm mat is lovely for kneeling, planks, sit-ups and anything where your joints press into the floor, but it wobbles under you in standing balance poses, because your foot sinks instead of feeling the ground. A thin 4 to 6mm mat is stable and connected for standing yoga but unforgiving on knees. So pick by what you actually do: floor work and Pilates want thick, standing yoga and balance work want thin. Material follows from that. TPE is light, cheap and does not absorb sweat; NBR gives the most cushioning per pound; and natural rubber grips best when you sweat, at the cost of weight and price. Width matters too — most mats are 61cm, and the 66 to 68cm ones here are noticeably more comfortable if you have broad shoulders.",

            'conclusion' => "For most people the best yoga mat here is the PROIRON: it has the most reviews on the page, it is wider than standard at 66cm, the reinforced edges resist the tearing that kills cheap mats, and at GBP 22.99 it is priced like a budget mat. If you mainly do standing yoga, buy the 6mm YOGATI instead — its alignment lines are genuinely useful when you are learning where your hands and feet should be — and if you just want a decent mat as cheaply as possible, the Core Balance is GBP 13.59.

Two upgrades worth the money in specific cases. If you sweat — hot yoga, or simply a warm room — a TPE mat will get slippery and the Yogi Bare natural rubber mat is the one that keeps grip when wet, which is what you are paying GBP 80 for. And if your knees are the limiting factor rather than your balance, the 10mm Amazon Basics or DH FitLife mats cost about twenty pounds and will do more for your practice than any amount of branding.",

            'author' => 'Felipe Iglesias',
            'published_at' => '2026-09-03 07:30:00',
        ];

        $products = [
            [
                'position' => 1,
                'name' => 'PROIRON NBR Yoga Mat, 10mm or 15mm, 183 x 66cm, Reinforced Edges',
                'price' => '£22.99',
                'rating' => 4.6,
                'reviews_count' => 7756,
                'image' => 'https://m.media-amazon.com/images/I/71RAQIj3FNL._AC_SL1500_.jpg',
                'alt_text' => 'best yoga mat',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CYBYXWF4?tag=ranked10-21',
                'summary' => 'The best yoga mat for most people. 7,756 ratings at 4.6 stars, extra-wide at 66cm, with reinforced edges and 10mm or 15mm cushioning.',
                'body' => "Two things put this first. It has the most ratings of any mat on the page at 7,756, scoring 4.6, and it is wider than standard: 183 x 66cm gives you five centimetres more than the usual 61cm mat, which is the difference between your hands landing on mat or on floor when you widen your stance. Reinforced edges are the other real feature, because a cheap mat almost always fails at the edge first, tearing where it gets rolled and stepped on.

At 1.1kg the weight helps it lie flat rather than curling at the corners, the surface is waterproof and wipes clean, and it is sold in 10mm and 15mm.

Be deliberate about that thickness. The 10mm is a good all-rounder; the 15mm is a floor-work mat and will feel unstable in standing balance poses. If your practice is mostly standing yoga, buy the 6mm YOGATI below instead.",
                'pros' => ['7,756 ratings at 4.6 stars, the most on this page', 'Extra-wide 183 x 66cm, more room than a standard mat', 'Reinforced edges resist the tearing that kills cheap mats', 'Weight keeps it flat instead of curling at the corners', 'Waterproof surface, wipes clean, GBP 22.99'],
                'contras' => ['15mm version wobbles in standing balance poses', 'NBR grips less than rubber once you sweat', 'Heavier to carry than a TPE mat', 'Bulky rolled up'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '7,756 at 4.6 stars', 'verdict' => 'good', 'note' => 'The most on this page.'],
                    ['label' => 'Size', 'value' => '183 x 66 cm', 'verdict' => 'good', 'note' => 'Wider than standard.'],
                    ['label' => 'Thickness', 'value' => '10 or 15 mm', 'verdict' => 'neutral', 'note' => 'Thick suits floor work, not balance.'],
                    ['label' => 'Edges', 'value' => 'Reinforced', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£22.99', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'YOGATI Yoga Mat with Alignment Lines, 6mm, Double-Sided Non-Slip',
                'price' => '£24.99',
                'rating' => 4.4,
                'reviews_count' => 7708,
                'image' => 'https://m.media-amazon.com/images/I/819cPiAoMuL._AC_SL1500_.jpg',
                'alt_text' => 'YOGATI yoga mat with alignment lines',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CJ39LHNX?tag=ranked10-21',
                'summary' => 'The best mat for actual yoga practice. 6mm for stability in standing poses, with printed alignment lines to place your hands and feet.',
                'body' => "This is the one to buy if you do yoga rather than floor exercises. At 6mm it is thick enough to protect your knees but thin enough that you feel the floor in standing poses, which is what keeps you steady in a balance. The printed alignment lines are the reason it has nearly eight thousand ratings: they show you where hands and feet should sit, which is genuinely helpful when you are learning and have no teacher correcting you.

Both faces are textured for grip, so it does not matter which way up it lands, and it comes with a carry strap.

Its 4.4-star average is a little below the PROIRON, and at GBP 24.99 it costs slightly more for less cushioning. That is the trade you are making: stability and guidance instead of padding. For Pilates or heavy floor work, buy thicker.",
                'pros' => ['6mm, the right thickness for standing yoga stability', 'Alignment lines help place hands and feet correctly', '7,708 ratings, second most on this page', 'Textured on both sides, no wrong way up', 'Carry strap included'],
                'contras' => ['4.4 stars, below the PROIRON', 'Less cushioning for kneeling and floor work', 'GBP 24.99, dearer than thicker rivals', 'Standard 61cm width'],
                'specs' => [
                    ['label' => 'Thickness', 'value' => '6 mm', 'verdict' => 'good', 'note' => 'Stable in standing poses.'],
                    ['label' => 'Alignment lines', 'value' => 'Printed', 'verdict' => 'good', 'note' => 'Useful when learning.'],
                    ['label' => 'Customer ratings', 'value' => '7,708 at 4.4 stars', 'verdict' => 'good'],
                    ['label' => 'Grip', 'value' => 'Textured both sides', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£24.99', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Core Balance TPE Exercise and Yoga Mat, Extra Wide, Double-Sided Texture',
                'price' => '£13.59',
                'rating' => 4.6,
                'reviews_count' => 2228,
                'image' => 'https://m.media-amazon.com/images/I/91S9Ke3XCeL._AC_SL1500_.jpg',
                'alt_text' => 'Core Balance TPE exercise and yoga mat',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07ZBH47PP?tag=ranked10-21',
                'summary' => 'The best value here at GBP 13.59, and rated 4.6. An extra-wide closed-cell TPE mat that does not absorb sweat.',
                'body' => "At GBP 13.59 this is the cheapest mat on the page and it still scores 4.6 over 2,228 ratings, which is a rare combination. It is closed-cell TPE, meaning the foam does not absorb sweat or odour the way an open-cell mat does — you wipe it and it is clean, which matters more than people expect after a few months of use.

It is extra-wide, textured on both faces for grip, light enough to roll up and carry with the included strap, and it splits the difference between a yoga mat and a general fitness mat.

If you want the cheapest capable mat, this is it. Spend more only for a specific reason: the PROIRON for width and reinforced edges, the YOGATI for alignment lines, or the Yogi Bare for grip when you sweat heavily.",
                'pros' => ['Cheapest mat here at GBP 13.59', '4.6 stars over 2,228 ratings', 'Closed-cell TPE does not absorb sweat or odour', 'Extra-wide with double-sided texture', 'Light, rolls up small, carry strap included'],
                'contras' => ['Less cushioning than the 10mm mats', 'TPE gets slippery with heavy sweat', 'Lighter build than the reinforced-edge mats', 'Plainer finish'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£13.59', 'verdict' => 'good', 'note' => 'The cheapest here.'],
                    ['label' => 'Customer ratings', 'value' => '2,228 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Material', 'value' => 'Closed-cell TPE', 'verdict' => 'good', 'note' => 'Does not absorb sweat.'],
                    ['label' => 'Width', 'value' => 'Extra wide', 'verdict' => 'good'],
                    ['label' => 'Grip', 'value' => 'Textured both sides', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Yogi Bare Paws Natural Rubber Yoga Mat, 4mm, 183 x 68cm, Sticky Grip',
                'price' => '£80.00',
                'rating' => 4.7,
                'reviews_count' => 1014,
                'image' => 'https://m.media-amazon.com/images/I/71W1RXlrTWL._AC_SL1500_.jpg',
                'alt_text' => 'Yogi Bare Paws natural rubber yoga mat',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FY2XT53S?tag=ranked10-21',
                'summary' => 'The best grip here, and the mat for hot yoga. Natural rubber with a sticky top layer that holds when you sweat, at 4.7 stars.',
                'body' => "Every foam mat on this page becomes slippery once your hands are wet, which is why serious practitioners buy rubber. The Yogi Bare has an ultra-sticky top layer over high-tensile natural rubber, and it keeps grip when you sweat — that is the entire reason for its price, and it is the only mat here that solves the problem. It has 1,014 ratings at 4.7 stars, the highest average on the page.

At 4mm it is firm rather than cushioned, which is deliberate: rubber gives support without sink, so standing poses are rock solid. It is 68cm wide, the widest here, has subtle alignment markers, and the rubber is sustainably sourced and biodegradable.

Two honest caveats. GBP 80 is nearly six times the Core Balance, and rubber mats are heavy and have a distinct smell when new that takes a few weeks to fade. Buy it for hot yoga or if you sweat; for a gentle home practice it is more mat than you need.",
                'pros' => ['Sticky natural rubber keeps grip when you sweat', '4.7 stars, the highest average on this page', 'Widest mat here at 68cm', 'Firm 4mm support, very stable in standing poses', 'Sustainably sourced, biodegradable rubber'],
                'contras' => ['GBP 80.00, by far the dearest here', 'Heavy to carry compared with TPE', 'Strong rubber smell when new', '4mm is hard on knees for floor work'],
                'specs' => [
                    ['label' => 'Grip', 'value' => 'Sticky natural rubber', 'verdict' => 'good', 'note' => 'The only mat here that grips wet.'],
                    ['label' => 'Average score', 'value' => '4.7 stars', 'verdict' => 'good', 'note' => 'Highest on the page.'],
                    ['label' => 'Size', 'value' => '183 x 68 cm', 'verdict' => 'good'],
                    ['label' => 'Thickness', 'value' => '4 mm, firm', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£80.00', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Yogii Yoga Mat, 6mm TPE, Rippled Non-Slip Base, Travel Friendly',
                'price' => '£18.99',
                'rating' => 4.4,
                'reviews_count' => 3481,
                'image' => 'https://m.media-amazon.com/images/I/91k+N8q0-pL._AC_SL1500_.jpg',
                'alt_text' => 'Yogii 6mm TPE yoga mat',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B9YR9HP4?tag=ranked10-21',
                'summary' => 'A well-reviewed 6mm TPE mat at GBP 18.99, with a rippled base that stops it sliding on hard floors.',
                'body' => "The Yogii covers the same ground as the YOGATI — 6mm TPE, the balanced thickness — for six pounds less, and has 3,481 ratings at 4.4 stars. Its distinguishing feature is the rippled underside, which is aimed squarely at the real problem on laminate and tile: the mat itself creeping across the floor while you move on it.

It is light and rolls up small enough to carry to a class, and the TPE is the usual closed-cell type that wipes clean.

It sits at fifth because it has no standout feature beyond that base — no alignment lines, no extra width, no reinforced edges — and its 4.4-star average is mid-pack. As a straightforward, cheap, well-proven 6mm mat, though, it does the job and the price is right.",
                'pros' => ['3,481 ratings at 4.4 stars for GBP 18.99', '6mm, the balanced thickness for mixed practice', 'Rippled base stops it creeping on hard floors', 'Light and packs down for classes', 'Closed-cell TPE, wipes clean'],
                'contras' => ['No alignment lines or extra width', '4.4 stars, mid-pack here', 'Standard 61cm width', 'TPE slips when wet'],
                'specs' => [
                    ['label' => 'Thickness', 'value' => '6 mm', 'verdict' => 'good'],
                    ['label' => 'Base', 'value' => 'Rippled, anti-creep', 'verdict' => 'good', 'note' => 'Helps on laminate and tile.'],
                    ['label' => 'Customer ratings', 'value' => '3,481 at 4.4 stars', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£18.99', 'verdict' => 'good'],
                    ['label' => 'Material', 'value' => 'TPE', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'ComFy Mat Premium TPE Yoga Mat with Waterproof Carry Bag',
                'price' => '£24.99',
                'rating' => 4.5,
                'reviews_count' => 2425,
                'image' => 'https://m.media-amazon.com/images/I/31L3o95BvHL._AC_SL1500_.jpg',
                'alt_text' => 'ComFy Mat premium TPE yoga mat with carry bag',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B088F41163?tag=ranked10-21',
                'summary' => 'A 4.5-star TPE mat that comes with a waterproof carry bag rather than a strap — the pick if you take a mat to classes.',
                'body' => "The ComFy Mat's advantage is what comes with it. Most mats include a thin elastic strap that lets the mat get dirty on one side and rain on the other; this one comes with a proper waterproof carry bag, which is what you want if the mat travels to a studio, a park or a gym rather than living rolled in a corner.

The mat itself is a solid premium TPE aimed at not slipping, tearing or flaking apart, made from eco-friendly material, and it has 2,425 ratings at 4.5 stars.

At GBP 24.99 it is priced against the YOGATI and above the very similar Yogii, and the mat alone would not justify that. Buy it for the bag if you carry your mat; if it stays at home, the Core Balance or Yogii give you the same practice for less.",
                'pros' => ['Waterproof carry bag included, not just a strap', '2,425 ratings at 4.5 stars', 'Premium TPE built to resist tearing and flaking', 'Eco-friendly material', 'Good pick if the mat travels to classes'],
                'contras' => ['GBP 24.99, dearer than very similar mats', 'The mat alone is unremarkable', 'Standard width', 'TPE slips with heavy sweat'],
                'specs' => [
                    ['label' => 'Carry bag', 'value' => 'Waterproof, included', 'verdict' => 'good', 'note' => 'Better than a bare strap.'],
                    ['label' => 'Customer ratings', 'value' => '2,425 at 4.5 stars', 'verdict' => 'good'],
                    ['label' => 'Material', 'value' => 'Premium TPE', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£24.99', 'verdict' => 'bad'],
                    ['label' => 'Width', 'value' => 'Standard', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'CAMBIVO Non-Slip TPE Yoga Mat, 6mm or 8mm, Tear-Resistant Inner Layer',
                'price' => '£22.78',
                'rating' => 4.4,
                'reviews_count' => 1766,
                'image' => 'https://m.media-amazon.com/images/I/81+4+WD4U4L._AC_SL1500_.jpg',
                'alt_text' => 'CAMBIVO non-slip TPE yoga mat',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08SLNVT61?tag=ranked10-21',
                'summary' => 'Sold in 6mm and 8mm so you can pick your compromise, with a tear-resistant inner layer and double-sided grip texture.',
                'body' => "CAMBIVO's useful move is offering the same mat in 6mm and 8mm. Given that thickness is the central trade-off in this category, being able to choose the middle ground — 8mm gives more knee protection than a 6mm without the wobble of a 15mm — is genuinely helpful, and the listing is clear about which is for what.

It uses high-density TPE foam with a tear-resistant inner layer for durability and a double-sided textured grip surface. It has 1,766 ratings at 4.4 stars.

It sits here because at GBP 22.78 it costs about the same as the far more reviewed PROIRON and YOGATI while scoring slightly lower. Choose it if 8mm is precisely the compromise you want; otherwise the mats above have more evidence behind them for the same money.",
                'pros' => ['Choice of 6mm or 8mm to suit your practice', '8mm is a good middle ground for mixed use', 'Tear-resistant inner layer for durability', 'Double-sided textured grip', 'High-density TPE cushioning'],
                'contras' => ['4.4 stars, below the top picks', 'Priced like better-reviewed mats', '1,766 ratings, fewer than the leaders', 'Standard width'],
                'specs' => [
                    ['label' => 'Thickness', 'value' => '6 or 8 mm', 'verdict' => 'good', 'note' => '8mm is a useful middle ground.'],
                    ['label' => 'Durability', 'value' => 'Tear-resistant layer', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '1,766 at 4.4 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£22.78', 'verdict' => 'neutral'],
                    ['label' => 'Grip', 'value' => 'Textured both sides', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Amazon Basics Yoga Mat, Extra Thick 10mm, 183 x 61cm, Carrying Strap',
                'price' => '£19.52',
                'rating' => 4.4,
                'reviews_count' => 1677,
                'image' => 'https://m.media-amazon.com/images/I/61MOuHsiTRL._AC_SL1500_.jpg',
                'alt_text' => 'Amazon Basics extra thick yoga mat',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CJJNSM9V?tag=ranked10-21',
                'summary' => 'A cheap 10mm mat for knees and floor work, with a moisture-resistant textured foam surface and a carry strap.',
                'body' => "If your problem is knees rather than balance, this is a straightforward answer at GBP 19.52. The 10mm construction gives real shock absorption for kneeling, planks and sit-ups, the textured foam is moisture-resistant, and at 183 x 61cm it is a standard full-length mat with elastic fasteners and a carry strap. It works indoors or outdoors, and it has 1,677 ratings at 4.4 stars.

Amazon's returns policy is a quiet advantage on a product where you only discover the thickness is wrong after a session or two.

It ranks eighth because it is plain: no reinforced edges, no extra width, no alignment lines, and at 10mm it will feel unstable in standing balance poses. For floor-based work at a low price, though, it does exactly what it claims.",
                'pros' => ['10mm cushioning for kneeling and floor work', 'GBP 19.52 with a carry strap and fasteners', 'Moisture-resistant textured foam', 'Standard full 183 x 61cm size', 'Easy returns if the thickness is wrong for you'],
                'contras' => ['Too thick for standing balance poses', 'No reinforced edges or extra width', '4.4 stars, mid-pack here', 'Plain, featureless mat'],
                'specs' => [
                    ['label' => 'Thickness', 'value' => '10 mm', 'verdict' => 'neutral', 'note' => 'Floor work, not balance.'],
                    ['label' => 'Size', 'value' => '183 x 61 cm', 'verdict' => 'neutral'],
                    ['label' => 'Customer ratings', 'value' => '1,677 at 4.4 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£19.52', 'verdict' => 'good'],
                    ['label' => 'Surface', 'value' => 'Moisture resistant', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'DH FitLife NBR Yoga Mat, 10mm, 183 x 61cm, Reinforced Edging',
                'price' => '£23.99',
                'rating' => 4.5,
                'reviews_count' => 1008,
                'image' => 'https://m.media-amazon.com/images/I/71fIjSdbHVL._AC_SL1500_.jpg',
                'alt_text' => 'DH FitLife 10mm NBR yoga mat',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B6W4WDRX?tag=ranked10-21',
                'summary' => 'A 10mm nitrile rubber mat with fully reinforced edging, built to resist tearing — the durable choice for floor work.',
                'body' => "This is the durability pick among the thick mats. It is made from nitrile butadiene rubber, which is denser and tougher than standard foam, and it is fully edged with a reinforced border — the specific failure point on cheap thick mats, where the foam splits and then peels. At 10mm it gives proper cushioning for floor exercises, and it works indoors or out. It has 1,008 ratings at 4.5 stars.

Its score is slightly better than the Amazon Basics at a similar thickness.

Two things keep it at ninth: GBP 23.99 is more than both the Amazon Basics 10mm and the PROIRON, which is wider and has five times the reviews, and like every thick mat it is the wrong choice for standing balance work. Buy it if you want a 10mm mat that will survive heavy use.",
                'pros' => ['Tough NBR construction, denser than standard foam', 'Fully reinforced edging resists tearing', '10mm cushioning for floor exercises', '4.5 stars over 1,008 ratings', 'Suitable for indoor and outdoor use'],
                'contras' => ['GBP 23.99, dearer than the wider PROIRON', 'Five times fewer reviews than the leaders', 'Too thick for standing balance poses', 'Standard 61cm width'],
                'specs' => [
                    ['label' => 'Material', 'value' => 'NBR, dense', 'verdict' => 'good'],
                    ['label' => 'Edging', 'value' => 'Fully reinforced', 'verdict' => 'good'],
                    ['label' => 'Thickness', 'value' => '10 mm', 'verdict' => 'neutral'],
                    ['label' => 'Customer ratings', 'value' => '1,008 at 4.5 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£23.99', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Les Mills MBX Dual-Sided Exercise Mat, 180 x 61cm, High-Density Eco-PVC',
                'price' => '£72.25',
                'rating' => 4.6,
                'reviews_count' => 35,
                'image' => 'https://m.media-amazon.com/images/I/61d5f3BDuSL._AC_SL1500_.jpg',
                'alt_text' => 'Les Mills MBX dual-sided exercise mat',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07B9K3LRY?tag=ranked10-21',
                'summary' => 'A dual-sided studio mat from a fitness brand, with one face for yoga and one for HIIT — but only 35 ratings.',
                'body' => "The MBX has two different surfaces on one mat: one side tuned for yoga and one for strength and HIIT work, so a single mat covers both a flowing practice and a session with weights on it. It is a dense, semi-closed-cell 5mm mat weighing 2.2kg, which is studio-grade heft that keeps it planted rather than sliding, and it wipes clean for bare feet. Les Mills notes it was named best training mat 2021 by a magazine lab test, which is a marketing citation rather than something we verified.

It has 35 ratings at 4.6 stars.

It is last for that reason. Thirty-five ratings is by far the smallest sample on this page, and at GBP 72.25 it is close to the Yogi Bare, which has thirty times the feedback and better grip when wet. Consider it if the dual-surface idea specifically fits how you train; otherwise there is more proven kit above.",
                'pros' => ['Two surfaces: one for yoga, one for HIIT and strength', 'Dense 2.2kg build stays planted during hard work', 'Semi-closed-cell surface, hygienic and easy to clean', 'Studio-grade quality from a known fitness brand', '4.6 star average'],
                'contras' => ['Only 35 ratings, by far the smallest sample here', 'GBP 72.25, close to the far better-proven Yogi Bare', 'Award citation is the brand marketing claim', 'Heavy to carry at 2.2kg'],
                'specs' => [
                    ['label' => 'Surfaces', 'value' => 'Dual sided', 'verdict' => 'good', 'note' => 'Yoga on one, HIIT on the other.'],
                    ['label' => 'Customer ratings', 'value' => '35 at 4.6 stars', 'verdict' => 'bad', 'note' => 'Smallest sample here.'],
                    ['label' => 'Weight', 'value' => '2.2 kg', 'verdict' => 'neutral', 'note' => 'Stays put, harder to carry.'],
                    ['label' => 'Size', 'value' => '180 x 61 x 0.5 cm', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£72.25', 'verdict' => 'bad'],
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
        $this->command?->info("YogaMatsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos).");
    }
}
