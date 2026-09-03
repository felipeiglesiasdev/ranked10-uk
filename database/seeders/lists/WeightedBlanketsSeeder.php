<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class WeightedBlanketsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE COBERTORES PESADOS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=weighted+blanket&rh=p_36%3A2500-  (24 ASINS, 12 FICHAS ABERTAS)
        // CATEGORIA HOME. SAZONAL: SOBE NO OUTONO/INVERNO.
        //
        // PADRAO EDITORIAL NOVO (30/08): E UM TOP 10, NAO UM ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── CORTE DE CATEGORIA ───
        // A BUSCA VEM POLUIDA COM MANTA TERMICA ELETRICA, EDREDOM E LAP PAD. MANTIDO SO COBERTOR PESADO REAL.
        // FORA: DREAMLANDING LAP PAD (SO 2 AVALIACOES) — AMOSTRA FINA DEMAIS, E OUTRO FORMATO (COLO).
        //
        // ─── POOLS DE AVALIACAO COMPARTILHADOS (VARIANTES DE ASIN) — SINALIZADO NO TEXTO ───
        //   GOOD NITE 8kg (B0C6G4Z1PY) e 4kg (B0C6G6QQ6R): MESMO POOL 1.694, MESMA IMAGEM. MANTIDOS OS DOIS
        //     PORQUE O PESO MUDA A COMPRA (ESCOLHE-SE PELO PESO CORPORAL), MAS DITO QUE DIVIDEM AVALIACAO.
        //   BRENTFORDS TEDDY FLEECE NATURAL (B0DCVWSMT4) e BLUSH PINK (B08GM9FP5J): MESMO POOL 4.688. SO COR.
        //   SIVIO 120x180 (B0D1431TYY) e 150x200 (B0D14BYD5K): MESMO POOL 1.449. MANTIDO O MENOR/MAIS BARATO.
        //
        // ─── ALEGACOES DE SAUDE (REGRA: DESCREVER, NAO ENDOSSAR NEM REFUTAR) ───
        //   "PROVEN TO INCREASE SEROTONIN" (BRENTFORDS), "PROMOTE MELATONIN / HAPPINESS HORMONES" (VIVO),
        //   "REDUCES ANXIETY & STRESS" (SILENTNIGHT). TITULOS CITAM "AUTISM/SENSORY". NO TEXTO SO DIGO O QUE O
        //   COBERTOR FAZ (PRESSAO PROFUNDA E UNIFORME) E MANDO FALAR COM PROFISSIONAL. NAO E DISPOSITIVO MEDICO.
        //
        // ─── O QUE MUDA A COMPRA (ENTRA NO TEXTO) ───
        //   PESO ~8-12% DO PESO CORPORAL (GUIA DAS PROPRIAS FICHAS) → INTRO E CADA CARD.
        //   TECIDO: GLASS BEAD QUILTED (MAIS FRIO/FINO) x TEDDY FLEECE (MAIS QUENTE/FOFO) → INTRO.
        //   LAVAGEM: WINTHOME E SO LAVAGEM A MAO; OS OUTROS MAQUINA → CONTRA DA WINTHOME.
        //   DISCLAIMER "AGE 3+" NOS BRENTFORDS TEDDY FLEECE.
        //
        // PROFUNDIDADE (FICHA): 20.654 / 4.688 / 1.694 / 1.449 / 1.408 / 1.037 / 664 / 183.
        //
        // FOCUS KEYWORD: best weighted blanket
        // VARIACOES TRABALHADAS: weighted blanket for adults / heavy blanket / glass bead weighted blanket /
        // teddy fleece weighted blanket / best weighted blanket for sleep / weighted blanket for anxiety /
        // what weight weighted blanket / weighted blanket double / king size weighted blanket
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DE "home")
        ];

        $article = [
            'slug' => 'best-weighted-blanket',                                        // SLUG DO ARTIGO (URL) - FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Weighted Blanket 2026: 10 Ranked for Sleep and Calm',    // TITULO / H1
            'meta_title' => 'Best Weighted Blanket 2026: 10 Ranked for Sleep',        // TITLE DA ABA/GOOGLE
            'meta_description' => 'The best weighted blanket picks for UK adults, from glass-bead to teddy fleece. Ten heavy blankets compared on weight, fabric, ratings and price.', // META DESCRIPTION
            'focus_keyword' => 'best weighted blanket',                              // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE

            'intro' => "If you want the short answer, the Brentfords 10kg is the best weighted blanket for most adults: more than 20,000 customer ratings at 4.6 stars, a heavy 10kg fill, and a price of GBP 27.99 that undercuts almost everything here. If you would rather spend less or start lighter, the Good Nite at GBP 25.46 is the cheapest full-size blanket on the page and comes in several weights.

A weighted blanket is heavier than a normal duvet because it is filled with glass beads or padding, and the gentle, even pressure is what many people find calming as they fall asleep. The one number that decides which to buy is the weight. The common guidance on these listings is to pick a blanket around 8 to 12 percent of your body weight, so a 60kg adult lands near 6kg and an 80kg adult near 8kg. The other choice is fabric: thin glass-bead quilting sleeps cooler, while teddy fleece is warmer and plush for winter. We compared ten heavy blankets on weight, fabric, customer ratings and price, and ranked them below.

One note before the list. A weighted blanket is a comfort product, not a medical device. Several listings mention sleep, stress or anxiety; deep, even pressure is what the blanket actually provides, and if you have a diagnosed condition it is worth checking with a health professional first.",

            'conclusion' => "For most people the best weighted blanket here is the Brentfords 10kg. Nothing else on the page has anything like its 20,000-plus ratings, it is one of the cheapest, and a 10kg fill suits most adults. If 10kg sounds heavy, both Brentfords and the Good Nite come in lighter weights for less, so match the number to your body rather than to your bed.

After that it comes down to fabric and budget. Choose teddy fleece — the Brentfords Natural, the Viceroy or the blush-pink version — if you want something warm and plush for winter. Choose a glass-bead blanket like the Silentnight or Winthome if you sleep hot and want thinner quilting, and remember the Winthome is hand-wash only. Whichever you pick, the calm, settled feel these blankets are bought for comes from the weight being right, so that is the number to get correct.",

            'author' => 'Felipe Iglesias',                                           // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-09-01 12:00:00',                                 // DATA FIXA — NAO USAR now()
        ];

        // ─── FICHA: good = MELHOR DA LISTA NO QUESITO, bad = PIOR, neutral = MEIO. COMPARA OS DEZ ENTRE SI. ───
        $products = [
            [
                'position' => 1,
                'name' => 'Brentfords Weighted Blanket 10kg, King 150 x 200cm, Black',
                'price' => '£27.99',
                'rating' => 4.6,
                'reviews_count' => 20654,
                'image' => 'https://m.media-amazon.com/images/I/71M1ApnaxjL._AC_SL1500_.jpg',
                'alt_text' => 'best weighted blanket',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0HFSW97P1?tag=ranked10-21',
                'summary' => 'The best weighted blanket for most adults. More than 20,000 ratings at 4.6 stars, a heavy 10kg fill, and one of the lowest prices on the page.',
                'body' => "Twenty thousand six hundred and fifty-four ratings at 4.6 stars is why this is first. No other blanket in this comparison comes within a fraction of that much customer feedback, and for a product you sleep under every night, that many settled reviews is worth more than any single feature. That it also costs only GBP 27.99 makes it the clearest pick on the page.

The 10kg fill sits at the heavier end and suits most adults from around 80kg upward, spread across a 150 x 200cm king-size footprint that covers a double or king bed, or drapes over a sofa. The filling is certified non-toxic micro glass beads held in equally stitched pockets, so the weight stays even rather than sliding to one side, and the polyester cover is machine washable.

Two things to weigh. If you are lighter than about 75kg, 10kg may feel like too much — Brentfords and the Good Nite below both offer lighter weights. And the listing repeats the usual weighted-blanket wellness claims, including one about serotonin; treat those as marketing and buy it for the even, heavy pressure, which is the part that is real.",
                'pros' => ['20,654 ratings at 4.6 stars, by far the most trusted blanket here', 'GBP 27.99, one of the cheapest on the page', 'Heavy 10kg fill suits most adults over 80kg', 'Even glass-bead fill in stitched pockets, machine washable', 'Generous 150 x 200cm king-size footprint'],
                'contras' => ['10kg may be too heavy for adults under about 75kg', 'Plain polyester cover, less plush than teddy fleece', 'Listing repeats unproven serotonin wellness claims', 'One weight and size on this ASIN'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '20,654 at 4.6 stars', 'verdict' => 'good', 'note' => 'By far the most feedback in this comparison.'],
                    ['label' => 'Weight', 'value' => '10 kg', 'verdict' => 'neutral', 'note' => 'Heavier end, for adults over about 80kg.'],
                    ['label' => 'Price', 'value' => '£27.99', 'verdict' => 'good', 'note' => 'Among the cheapest here.'],
                    ['label' => 'Fill', 'value' => 'Micro glass beads', 'verdict' => 'neutral'],
                    ['label' => 'Size', 'value' => '150 x 200 cm king', 'verdict' => 'good'],
                    ['label' => 'Washing', 'value' => 'Machine washable', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Good Nite Weighted Blanket 8kg, Double, Grey (Glass Beads)',
                'price' => '£25.46',
                'rating' => 4.6,
                'reviews_count' => 1694,
                'image' => 'https://m.media-amazon.com/images/I/71THr5sSu0L._AC_SL1500_.jpg',
                'alt_text' => 'Good Nite 8kg weighted blanket in grey with glass bead fill',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C6G4Z1PY?tag=ranked10-21',
                'summary' => 'The best value here. The cheapest full-size weighted blanket on the page at GBP 25.46, well rated, and sold in a range of weights.',
                'body' => "At GBP 25.46 with 1,694 ratings at 4.6 stars, this is the cheapest full-size weighted blanket in the comparison that has a large, settled review count behind it. The 8kg version suits most adults in the 70 to 90kg range, and the glass-bead fill is held in quilted pockets so it spreads evenly and stays quiet when you move.

Good Nite leans on the same guidance as everyone else — pick a weight around 7 to 12 percent of your body weight — and offers several weights, which is the reason it works as a value pick: you can match the blanket to the person rather than settling for whatever is in stock. It is comfortable for reading or watching television as well as sleeping.

The one thing to know is that the different weights share the same product listing and the same pool of 1,694 ratings, so the 4kg version further down this page shows the same score. That is normal for these blankets, but it means the rating reflects the range as a whole rather than one specific weight. For the price, that is a small caveat.",
                'pros' => ['Cheapest full-size weighted blanket here with a large review count', '1,694 ratings at 4.6 stars', 'Sold in several weights, so you can match your body weight', 'Even glass-bead fill in quilted pockets', 'Comfortable for the sofa as well as the bed'],
                'contras' => ['All weights share one listing and one pool of ratings', 'Smaller brand with no UK service line', 'Grey polyester cover, not plush teddy fleece', 'Double rather than full king footprint'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£25.46', 'verdict' => 'good', 'note' => 'Cheapest full-size blanket here.'],
                    ['label' => 'Customer ratings', 'value' => '1,694 at 4.6 stars', 'verdict' => 'neutral', 'note' => 'Shared across all weights.'],
                    ['label' => 'Weight', 'value' => '8 kg', 'verdict' => 'neutral', 'note' => 'Also sold lighter and heavier.'],
                    ['label' => 'Fill', 'value' => 'Glass beads', 'verdict' => 'neutral'],
                    ['label' => 'Washing', 'value' => 'Machine washable', 'verdict' => 'good'],
                    ['label' => 'Weights offered', 'value' => 'Several', 'verdict' => 'good', 'note' => 'Match to body weight.'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Brentfords Teddy Fleece Weighted Blanket 8kg, King 150 x 200cm, Natural',
                'price' => '£29.99',
                'rating' => 4.6,
                'reviews_count' => 4688,
                'image' => 'https://m.media-amazon.com/images/I/81o3brxfDfL._AC_SL1500_.jpg',
                'alt_text' => 'Brentfords teddy fleece weighted blanket in natural cream',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DCVWSMT4?tag=ranked10-21',
                'summary' => 'The best warm, plush option. Soft teddy fleece over an 8kg glass-bead fill, with 4,688 ratings at 4.6 stars for GBP 29.99.',
                'body' => "This is the pick if you want a weighted blanket that is also cosy to the touch. Instead of a plain quilted cover it uses soft teddy fleece, which makes it far warmer and more inviting for winter than the glass-bead blankets, while the 8kg fill underneath gives the same even pressure. With 4,688 ratings at 4.6 stars it is the second most-reviewed blanket on the page after the Brentfords 10kg.

The 8kg weight suits most adults in the 70 to 90kg range, and the 150 x 200cm king footprint covers a double or king bed or a sofa. The filling is certified non-toxic micro glass beads in stitched pockets, and it comes in several colours, including the blush pink further down this list, which shares this same blanket and rating pool.

Two caveats. Teddy fleece is warm, which is exactly what you want in winter but can be too much for a hot sleeper in summer — for that, choose a thinner glass-bead blanket instead. And Brentfords marks this one suitable for ages three and up, so it is not for a cot or a very young child.",
                'pros' => ['Warm, plush teddy fleece cover, ideal for winter', '4,688 ratings at 4.6 stars, second most here', '8kg glass-bead fill suits most adults 70 to 90kg', 'Several colours on the same well-reviewed blanket', 'King 150 x 200cm footprint'],
                'contras' => ['Teddy fleece can be too warm for a hot summer sleeper', 'Marked for ages 3 and up, not for young children', 'Shares its rating pool with the other colours', 'Dearer than the plain glass-bead blankets'],
                'specs' => [
                    ['label' => 'Fabric', 'value' => 'Teddy fleece', 'verdict' => 'good', 'note' => 'The warmest, plushest cover here.'],
                    ['label' => 'Customer ratings', 'value' => '4,688 at 4.6 stars', 'verdict' => 'good', 'note' => 'Second most in this comparison.'],
                    ['label' => 'Weight', 'value' => '8 kg', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£29.99', 'verdict' => 'neutral'],
                    ['label' => 'Size', 'value' => '150 x 200 cm king', 'verdict' => 'good'],
                    ['label' => 'Best for', 'value' => 'Winter warmth', 'verdict' => 'neutral', 'note' => 'Too warm for some in summer.'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Silentnight Weighted Blanket 9kg, Wellbeing Collection, Grey',
                'price' => '£51.95',
                'rating' => 4.5,
                'reviews_count' => 1037,
                'image' => 'https://m.media-amazon.com/images/I/71ZdD004JJS._AC_SL1500_.jpg',
                'alt_text' => 'Silentnight 9kg weighted blanket in supersoft grey',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08LZPVCDS?tag=ranked10-21',
                'summary' => 'The trusted UK bedding brand. A breathable glass-bead blanket at 9kg or 6.8kg, with 1,037 ratings at 4.5 stars.',
                'body' => "Silentnight is one of the best-known bedding names in Britain, and for buyers who would rather have a familiar brand than a marketplace label, this is the pick. It has 1,037 ratings at 4.5 stars and comes in 6.8kg or 9kg, so you can choose by body weight — 9kg suits heavier adults, 6.8kg most others.

The design is a breathable quilted cover with undetectable weighted glass beads sewn into even pockets, which keeps the pressure spread out and the blanket relatively cool against thicker teddy-fleece options. Silentnight markets it as a wellbeing product for a calm, restful night; as with the rest of the page, the deep, even pressure is the real feature and the rest is framing.

The reason it is not higher is price. At GBP 51.95 it costs almost twice the Brentfords and Good Nite blankets above, which carry more reviews for less money. What you are paying extra for is the brand and the breathable finish, so it is worth it if those matter to you and less so if they do not.",
                'pros' => ['Trusted, familiar UK bedding brand', '1,037 ratings at 4.5 stars', 'Choice of 6.8kg or 9kg to match body weight', 'Breathable glass-bead quilting sleeps cooler than fleece', 'Even fill in sewn pockets'],
                'contras' => ['GBP 51.95, nearly double the top two picks', 'Fewer ratings than the cheaper Brentfords blankets', 'Wellbeing claims are marketing, not proven benefits', 'Only two weight options'],
                'specs' => [
                    ['label' => 'Brand', 'value' => 'Silentnight', 'verdict' => 'good', 'note' => 'Well-known UK bedding name.'],
                    ['label' => 'Customer ratings', 'value' => '1,037 at 4.5 stars', 'verdict' => 'neutral'],
                    ['label' => 'Weight', 'value' => '9 kg (or 6.8 kg)', 'verdict' => 'neutral'],
                    ['label' => 'Fill', 'value' => 'Glass beads, breathable', 'verdict' => 'good', 'note' => 'Cooler than teddy fleece.'],
                    ['label' => 'Price', 'value' => '£51.95', 'verdict' => 'bad', 'note' => 'Nearly double the top picks.'],
                    ['label' => 'Washing', 'value' => 'Machine washable', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Sivio Weighted Blanket 7kg, Reversible Sherpa Fleece, Grey 120 x 180cm',
                'price' => '£52.69',
                'rating' => 4.6,
                'reviews_count' => 1449,
                'image' => 'https://m.media-amazon.com/images/I/71whU5AGWoL._AC_SL1500_.jpg',
                'alt_text' => 'Sivio reversible sherpa fleece weighted blanket in grey',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D1431TYY?tag=ranked10-21',
                'summary' => 'A two-sided blanket: sherpa fleece one side, flannel the other, so it works warm or cool. 1,449 ratings at 4.6 stars.',
                'body' => "The Sivio is the most versatile blanket on temperature here because it is reversible: one side is warm sherpa fleece, the other a smoother flannel, so you can flip it depending on the season or how hot you sleep. With 1,449 ratings at 4.6 stars it is well liked, and the 7kg weight suits lighter and average-build adults.

The glass beads are locked into the quilting with a tighter sewing method than most, which Sivio makes a point of, and the reversible construction means it doubles as an ordinary throw over a sofa when you do not want the weight on a warm evening. It is offered in more than one size, including a larger 150 x 200cm version that shares this blanket's rating pool.

The catch is the same as the Silentnight: at GBP 52.69 it costs almost twice the top budget picks, and the 7kg weight is on the lighter side, so heavier adults who want a firm, pinned-down feel should size up or choose the Brentfords 10kg instead.",
                'pros' => ['Reversible: warm sherpa one side, cooler flannel the other', '1,449 ratings at 4.6 stars', 'Tighter bead-locking stitching keeps the fill even', 'Works as an ordinary throw when you want less weight', 'Offered in more than one size'],
                'contras' => ['GBP 52.69, nearly double the budget picks', '7kg is light for heavier adults', 'Sizes share one rating pool', '120 x 180cm base size is smaller than a king blanket'],
                'specs' => [
                    ['label' => 'Fabric', 'value' => 'Reversible sherpa/flannel', 'verdict' => 'good', 'note' => 'Warm or cool side, unique here.'],
                    ['label' => 'Customer ratings', 'value' => '1,449 at 4.6 stars', 'verdict' => 'neutral'],
                    ['label' => 'Weight', 'value' => '7 kg', 'verdict' => 'neutral', 'note' => 'Light end of the range.'],
                    ['label' => 'Price', 'value' => '£52.69', 'verdict' => 'bad'],
                    ['label' => 'Size', 'value' => '120 x 180 cm', 'verdict' => 'neutral'],
                    ['label' => 'Fill', 'value' => 'Locked glass beads', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'Viceroy Bedding Teddy Fleece Weighted Blanket 8kg, King, Silver Grey',
                'price' => '£29.99',
                'rating' => 4.6,
                'reviews_count' => 1408,
                'image' => 'https://m.media-amazon.com/images/I/91F2DwYYANL._AC_SL1500_.jpg',
                'alt_text' => 'Viceroy Bedding teddy fleece weighted blanket in silver grey',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B091378881?tag=ranked10-21',
                'summary' => 'A cheaper route to teddy fleece. Larger-than-average bead pockets for even weight, 1,408 ratings at 4.6 stars, GBP 29.99.',
                'body' => "If you like the warmth of teddy fleece but want an alternative to Brentfords, the Viceroy is the pick. It matches the price at GBP 29.99, uses the same soft teddy-fleece finish, and has 1,408 ratings at 4.6 stars. The listing is unusually clear, laying out the how-and-why in plain questions — how the pressure works, which weight to choose — rather than only selling points.

Its own point of difference is the quilting: Viceroy uses larger-than-average bead compartments, which it says spreads the weight more smoothly across the blanket. The 8kg king-size version suits most adults, and the silver-grey colour is more neutral than the natural or blush options from Brentfords.

It sits below the Brentfords teddy fleece mainly on evidence — 1,408 ratings against 4,688 — rather than on quality, and the two are close enough that colour and availability may decide it. As with any teddy-fleece blanket, it is warm, so a hot summer sleeper is better off with a glass-bead option.",
                'pros' => ['Teddy fleece warmth at the same price as Brentfords', 'Larger bead pockets for smoother weight distribution', '1,408 ratings at 4.6 stars', 'Clear, informative listing on weight choice', 'Neutral silver-grey colour'],
                'contras' => ['Fewer ratings than the Brentfords teddy fleece', 'Warm fleece, less suited to summer', 'Smaller brand than Silentnight', 'One main weight and colour on this ASIN'],
                'specs' => [
                    ['label' => 'Fabric', 'value' => 'Teddy fleece', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£29.99', 'verdict' => 'neutral', 'note' => 'Same as Brentfords fleece for less feedback.'],
                    ['label' => 'Customer ratings', 'value' => '1,408 at 4.6 stars', 'verdict' => 'neutral'],
                    ['label' => 'Bead pockets', 'value' => 'Larger than average', 'verdict' => 'good', 'note' => 'Smoother weight spread.'],
                    ['label' => 'Weight', 'value' => '8 kg', 'verdict' => 'neutral'],
                    ['label' => 'Size', 'value' => '150 x 200 cm king', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Winthome Weighted Blanket 8kg, Queen 150 x 200cm, Premium Glass Beads',
                'price' => '£54.99',
                'rating' => 4.5,
                'reviews_count' => 664,
                'image' => 'https://m.media-amazon.com/images/I/81YRLCNsIiL._AC_SL1500_.jpg',
                'alt_text' => 'Winthome 8kg weighted blanket in grey with premium glass beads',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DRVKMP37?tag=ranked10-21',
                'summary' => 'A premium glass-bead blanket at 8kg, well rated at 4.5 stars — but hand-wash only, which the cheaper picks are not.',
                'body' => "Winthome sits in the premium tier with the Silentnight and Sivio. It is an 8kg glass-bead blanket with a high-density, even fill and 664 ratings at 4.5 stars, sized at 150 x 200cm to cover a double or queen bed. The guidance it gives on weight — around 9 to 12 percent of your body weight — is on the firmer side, so it aims at people who want a definite, pinned-down feel.

The build quality is the selling point: eco-friendly high-density beads distributed evenly so there are no light or heavy patches, in a breathable quilted cover. For a buyer who found cheaper blankets too loosely filled, this is the sort of blanket that fixes that complaint.

Two reasons it lands at seventh. It is the joint most expensive here at GBP 54.99 with fewer ratings than the blankets above it, and, importantly, it is hand-wash or dry-clean only — every budget blanket on this page is machine washable, and for something that shares your bed that difference matters more than it first sounds.",
                'pros' => ['Dense, even premium glass-bead fill', '664 ratings at 4.5 stars', 'Fixes the loose-fill complaint of cheaper blankets', 'Breathable quilted cover, 150 x 200cm', 'Firm weight guidance for a pinned-down feel'],
                'contras' => ['Hand-wash or dry-clean only, unlike the machine-washable picks', 'GBP 54.99, the joint most expensive here', 'Fewer ratings than the blankets ranked above', 'Only one weight on this listing'],
                'specs' => [
                    ['label' => 'Fill quality', 'value' => 'Dense, even beads', 'verdict' => 'good', 'note' => 'The most evenly filled here.'],
                    ['label' => 'Washing', 'value' => 'Hand wash only', 'verdict' => 'bad', 'note' => 'The only blanket here not machine washable.'],
                    ['label' => 'Price', 'value' => '£54.99', 'verdict' => 'bad', 'note' => 'Joint most expensive.'],
                    ['label' => 'Customer ratings', 'value' => '664 at 4.5 stars', 'verdict' => 'neutral'],
                    ['label' => 'Weight', 'value' => '8 kg', 'verdict' => 'neutral'],
                    ['label' => 'Size', 'value' => '150 x 200 cm', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Vivo Technologies Teddy Fleece Weighted Blanket 6kg, 125 x 180cm, Dark Grey',
                'price' => '£25.99',
                'rating' => 4.6,
                'reviews_count' => 183,
                'image' => 'https://m.media-amazon.com/images/I/81s7Sy0nlUL._AC_SL1500_.jpg',
                'alt_text' => 'Vivo Technologies teddy fleece weighted blanket in dark grey',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FKMSKFB7?tag=ranked10-21',
                'summary' => 'A cheap 6kg teddy fleece blanket for lighter adults, well rated at 4.6 stars but on a much smaller sample than the picks above.',
                'body' => "This is a budget teddy-fleece blanket at a lighter 6kg, which makes it a sensible match for adults around 60 to 70kg who found 8 to 10kg too much. At GBP 25.99 it is one of the cheapest fleece blankets here, reversible, and rated 4.6 stars.

The 125 x 180cm size is a little smaller than the king blankets above, which suits a single bed or one person on a sofa rather than a shared double. As a warm, plush winter blanket at a low weight and price, it does the job.

The reason it is eighth is evidence. One hundred and eighty-three ratings is far fewer than the four-figure counts higher up, so while the score is good, it is a less settled one. The listing also reaches further than most into wellness claims about melatonin and happiness hormones — ignore those and judge it as what it is: a cheap, light, cosy blanket. For a firmer choice with far more reviews, the Good Nite or Brentfords blankets are the safer buy.",
                'pros' => ['Lighter 6kg suits adults around 60 to 70kg', 'GBP 25.99, one of the cheapest fleece blankets here', 'Warm, plush and reversible', '4.6 star average', 'Good for a single bed or the sofa'],
                'contras' => ['Only 183 ratings, a much smaller sample than the picks above', 'Reaches hard into unproven wellness claims', '125 x 180cm is small for a shared bed', 'Smaller, less established brand'],
                'specs' => [
                    ['label' => 'Weight', 'value' => '6 kg', 'verdict' => 'good', 'note' => 'The lightest full blanket here, for lighter adults.'],
                    ['label' => 'Price', 'value' => '£25.99', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '183 at 4.6 stars', 'verdict' => 'bad', 'note' => 'Smallest sample on the page.'],
                    ['label' => 'Fabric', 'value' => 'Teddy fleece', 'verdict' => 'neutral'],
                    ['label' => 'Size', 'value' => '125 x 180 cm', 'verdict' => 'neutral', 'note' => 'Single-bed size.'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'Good Nite Weighted Blanket 4kg, Single, Grey (Lightest Option)',
                'price' => '£25.93',
                'rating' => 4.6,
                'reviews_count' => 1694,
                'image' => 'https://m.media-amazon.com/images/I/71THr5sSu0L._AC_SL1500_.jpg',
                'alt_text' => 'Good Nite 4kg lightweight weighted blanket in grey',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C6G6QQ6R?tag=ranked10-21',
                'summary' => 'The lightest blanket here at 4kg, for smaller adults or easing into weighted bedding. Same well-rated Good Nite range as the 8kg above.',
                'body' => "This is the same Good Nite blanket as the budget pick at second place, in its lightest 4kg weight. It exists for two buyers: smaller or lighter adults for whom even 6kg is too much, and anyone who wants to ease into a weighted blanket gently rather than starting under a heavy one. At GBP 25.93 it is cheap, and it carries the same 4.6-star rating.

The glass-bead fill, quilted pockets and grey polyester cover are identical to the heavier version, just with less weight inside. A 4kg blanket gives a light, reassuring cover rather than the firm, pinned feel of the 8 or 10kg options, which is exactly right for some people and not enough for others.

Be clear on one point: this shares its listing and its 1,694 ratings with the 8kg version above, so the score is not specific to the 4kg. Choose it if you actively want the lightest weight; if you are an average-build adult after the classic weighted feel, the 8kg Good Nite or the Brentfords blankets are the better match.",
                'pros' => ['The lightest blanket here at 4kg, for smaller adults', 'A gentle way to ease into weighted bedding', 'GBP 25.93, cheap', 'Same 4.6-star Good Nite range as the 8kg', 'Even glass-bead fill, machine washable'],
                'contras' => ['4kg is too light for the classic pinned-down feel', 'Shares its listing and ratings with the 8kg version', 'Single size, not for a shared bed', 'Score is not specific to this weight'],
                'specs' => [
                    ['label' => 'Weight', 'value' => '4 kg', 'verdict' => 'neutral', 'note' => 'The lightest option in this comparison.'],
                    ['label' => 'Best for', 'value' => 'Lighter adults', 'verdict' => 'good', 'note' => 'Or easing into a weighted blanket.'],
                    ['label' => 'Price', 'value' => '£25.93', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '1,694 (shared)', 'verdict' => 'neutral', 'note' => 'Shared with the 8kg version.'],
                    ['label' => 'Fill', 'value' => 'Glass beads', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Brentfords Teddy Fleece Weighted Blanket 8kg, King, Blush Pink',
                'price' => '£28.99',
                'rating' => 4.6,
                'reviews_count' => 4688,
                'image' => 'https://m.media-amazon.com/images/I/812CdFuqW2L._AC_SL1500_.jpg',
                'alt_text' => 'Brentfords teddy fleece weighted blanket in blush pink',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08GM9FP5J?tag=ranked10-21',
                'summary' => 'The same 4,688-rated Brentfords teddy fleece blanket, in blush pink. On the list only because colour is a real reason people choose one blanket over another.',
                'body' => "There is no performance difference between this and the Brentfords teddy fleece at third place — it is the same 8kg, the same soft fleece, the same king 150 x 200cm size and the same pool of 4,688 ratings at 4.6 stars. The only thing that changes is the colour, blush pink instead of natural, and at GBP 28.99 it is a pound cheaper at the time of writing.

It earns a place because colour genuinely decides a purchase for a lot of buyers, especially when the blanket is bought as a gift, which these listings openly target. If the pink suits the room or the person better, this is the version to get, and you lose nothing by choosing it.

Treat this and the Natural at third place as one blanket in two colours rather than two separate products. Everything in that earlier entry applies here: warm and plush for winter, marked for ages three and up, and better swapped for a glass-bead blanket if you sleep hot.",
                'pros' => ['Identical well-reviewed Brentfords teddy fleece, in blush pink', '4,688 ratings at 4.6 stars', 'Warm, plush 8kg fleece for winter', 'A pound cheaper than the natural colour here', 'Popular as a gift'],
                'contras' => ['Identical to the natural version except colour', 'Shares that blanket rating pool', 'Warm fleece, less suited to summer', 'Marked for ages 3 and up'],
                'specs' => [
                    ['label' => 'Colour', 'value' => 'Blush pink', 'verdict' => 'neutral', 'note' => 'Same blanket as the natural version.'],
                    ['label' => 'Fabric', 'value' => 'Teddy fleece', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '4,688 (shared)', 'verdict' => 'good', 'note' => 'Shared with the natural colour.'],
                    ['label' => 'Weight', 'value' => '8 kg', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£28.99', 'verdict' => 'neutral'],
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
        $this->command?->info("WeightedBlanketsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
