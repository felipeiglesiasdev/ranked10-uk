<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class ToastersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE TORRADEIRAS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=toaster&rh=p_36%3A2000-  (22 ASINS, 13 FICHAS ABERTAS)
        // CATEGORIA KITCHEN (COMISSAO 5%). SAZONAL: EVERGREEN.
        //
        // PADRAO EDITORIAL NOVO (30/08): E UM TOP 10, NAO UM ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── EIXOS DE COMPRA ───
        //   SLOTS: 2 (casal/espaco) x 4 (familia/lote). FORMATO DA RANHURA:
        //     WIDE PADRAO (pao grosso/bagel) x LONG SLOT (fatia inteira de bloomer/artesanal deitada — ARENDO)
        //     x DEEP CHASSIS (torra a fatia alta ate o topo, sem faixa pálida — BREVILLE EDGE).
        //   HIGH LIFT (tira muffin/crumpet sem queimar o dedo), LIFT & LOOK (espia sem cancelar).
        //   CONTROLE DUPLO INDEPENDENTE (BREVILLE ZEN 4 fatias: torra 2 e deixa 2). POTENCIA 850W (lento) -> 1700W (rapido).
        //
        // ─── ALEGACAO A ATRIBUIR (NAO AFIRMAR) ───
        //   RUSSELL HOBBS SE DIZ "UK's No.1 Toaster Brand" (rodape de pesquisa de mercado). NO TEXTO: "a Russell Hobbs diz que...".
        //   ARENDO 4.0 (nota mais baixa da lista) — SINALIZAR.
        //
        // PROFUNDIDADE (FICHA): 8.717 / 6.831 / 4.520 / 3.474 / 2.302 / 1.251 / 1.091 / 835 / 833 / 684.
        // CORTE: BOSCH STYLINE (81 — premium mas amostra fina), SANDWICH/TOASTIE MAKERS (outra categoria), TESSLUX/HAKKA (@3.0-4.0 / nichos).
        //
        // FOCUS KEYWORD: best toaster
        // VARIACOES TRABALHADAS: toaster / best toaster uk / 2 slice toaster / 4 slice toaster /
        // long slot toaster / best 4 slice toaster / toaster with wide slots / russell hobbs toaster / breville toaster
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DE "kitchen")
        ];

        $article = [
            'slug' => 'best-toaster',                                                 // SLUG DO ARTIGO (URL) - FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Toaster 2026: 10 Two- and Four-Slice Toasters Ranked',   // TITULO / H1
            'meta_title' => 'Best Toaster 2026: 10 Two and Four-Slice Ranked',        // TITLE DA ABA/GOOGLE
            'meta_description' => 'The best toaster picks for UK kitchens, from Breville and Russell Hobbs to long-slot models. Ten toasters compared on slots, browning and price.', // META DESCRIPTION
            'focus_keyword' => 'best toaster',                                       // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE

            'intro' => "If you want the short answer, the Breville Bold is the best toaster for most people: 8,717 ratings at 4.3 stars, high-lift wide slots and illuminated controls, for GBP 22.99. If you want a four-slice toaster on a budget, the Amazon Basics does four slices with seven shade settings for the same GBP 22.99.

The first choice is how many slots. A two-slice toaster suits couples and small kitchens; a four-slice is better for families or batch breakfasts, though it takes more worktop. The second is the slot shape, and it matters more than people expect. Standard wide slots take thick bread and bagels; a long-slot toaster fits a whole slice of bloomer or an artisan loaf lengthways; and a deep-chassis model toasts tall slices right to the top so there is no pale strip. Beyond that, look for a high-lift lever to retrieve muffins safely, the number of browning levels, and the wattage, which sets how fast it toasts. We compared ten two- and four-slice toasters on those points, plus customer ratings and price, and ranked them below.",

            'conclusion' => "For most kitchens the best toaster here is the Breville Bold: it has the most reviews on the page, high-lift wide slots that handle everything from thin toast to bagels, and it costs under twenty-five pounds. If you toast for a family, the Amazon Basics is the cheapest four-slice, and the Morphy Richards and Tefal are dependable four-slice steps up.

Match the slots to the bread you actually eat. If you buy bloomers or artisan loaves, the long-slot Arendo fits a whole slice; if your bread is tall, the Breville Edge toasts it right to the top rather than leaving a pale strip. And if you often want just two slices done while the other two stay untouched, the Breville Zen's independent controls do exactly that. For plain sliced bread, any of the two-slice picks here does the job well for the money.",

            'author' => 'Felipe Iglesias',                                           // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-09-03 13:30:00',                                 // DATA FIXA — NAO USAR now()
        ];

        // ─── FICHA: good = MELHOR DA LISTA NO QUESITO, bad = PIOR, neutral = MEIO. COMPARA OS DEZ ENTRE SI. ───
        $products = [
            [
                'position' => 1,
                'name' => 'Breville Bold 2 Slice Toaster, High-Lift, Wide Slots, Illuminated',
                'price' => '£22.99',
                'rating' => 4.3,
                'reviews_count' => 8717,
                'image' => 'https://m.media-amazon.com/images/I/81uT56MoLjL._AC_SL1500_.jpg',
                'alt_text' => 'best toaster',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0943695ZZ?tag=ranked10-21',
                'summary' => 'The best toaster for most people. High-lift wide slots, illuminated controls and the most reviews here at 8,717, for GBP 22.99.',
                'body' => "Eight thousand seven hundred and seventeen ratings at 4.3 stars is the most customer feedback of any toaster in this comparison, and the Breville Bold earns it by getting the everyday things right for under twenty-five pounds. Variable-width slots take both thin sliced bread and thick-cut or bagels, a high-lift lever raises small items like crumpets clear so you do not burn your fingers, and a lift-and-look function lets you check the colour mid-cycle without cancelling.

The rest is the sensible standard set: variable browning, defrost, reheat and mid-cycle cancel, a removable crumb tray and a non-slip base, with illuminated controls that are easy to use in a dim morning kitchen.

There is little to fault at the price. It is a two-slice toaster, so a busy family may want four slots, and at this money the body is plastic rather than the brushed steel of dearer models. But for a well-made, well-liked two-slice toaster that does everything most people need, it is the pick, and nothing here has more reviews behind it.",
                'pros' => ['8,717 ratings at 4.3 stars, the most in this comparison', 'High-lift lever raises crumpets and muffins clear', 'Variable-width slots for thin bread, thick-cut or bagels', 'Lift and look, defrost, reheat and cancel', 'GBP 22.99 with illuminated controls'],
                'contras' => ['Two slots, so not for a big family breakfast', 'Plastic body rather than brushed steel', 'No bagel-specific mode', 'Standard slots, not long or deep-chassis'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '8,717 at 4.3 stars', 'verdict' => 'good', 'note' => 'The most feedback here.'],
                    ['label' => 'Slots', 'value' => '2, variable width', 'verdict' => 'neutral'],
                    ['label' => 'High lift', 'value' => 'Yes', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£22.99', 'verdict' => 'good'],
                    ['label' => 'Extras', 'value' => 'Lift & look, defrost, reheat', 'verdict' => 'good'],
                    ['label' => 'Body', 'value' => 'Plastic', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Russell Hobbs Inspire 2 Slice Toaster, Extra-Wide Slots, High Lift',
                'price' => '£36.89',
                'rating' => 4.4,
                'reviews_count' => 6831,
                'image' => 'https://m.media-amazon.com/images/I/71sxAUB2ZkL._AC_SL1500_.jpg',
                'alt_text' => 'Russell Hobbs Inspire 2 slice toaster',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07RMHRP1P?tag=ranked10-21',
                'summary' => 'The best-rated of the heavily reviewed toasters. Extra-wide slots and high lift from a brand Russell Hobbs says is the UK number one, at 4.4 stars.',
                'body' => "The Inspire is the pick if you want a two-slice toaster with a slightly nicer finish and the reassurance of a big, high-scoring review base: 6,831 ratings at 4.4 stars, the best rating among the heavily reviewed toasters here. Russell Hobbs says it is the UK's number-one toaster brand, and the Inspire is a well-rounded example, with extra-wide slots, a high-lift feature and a blue LED illumination that lights the controls as it toasts.

Six browning levels, defrost, reheat and cancel cover the functions, and a two-year guarantee extends to three if you register within 28 days, which is more cover than most give.

At GBP 36.89 it costs more than the Breville Bold, and it is a 1050W two-slice, so it is not the fastest here. What you gain is the higher rating, the extra-wide slots and the longer guarantee. If those matter to you, it is the better two-slice; if value is everything, the Bold above does the core job for a third less.",
                'pros' => ['6,831 ratings at 4.4 stars, the best-rated deep-reviewed toaster', 'Extra-wide slots and high lift', 'Three-year guarantee with registration', 'Blue LED illuminated controls', 'From the brand Russell Hobbs calls the UK number one'],
                'contras' => ['GBP 36.89, dearer than the Breville Bold', '1050W, not the fastest here', 'Two slots only', 'Feature set similar to cheaper toasters'],
                'specs' => [
                    ['label' => 'Average score', 'value' => '4.4 stars', 'verdict' => 'good', 'note' => 'Best of the deep-reviewed toasters.'],
                    ['label' => 'Customer ratings', 'value' => '6,831', 'verdict' => 'good'],
                    ['label' => 'Slots', 'value' => '2, extra wide', 'verdict' => 'good'],
                    ['label' => 'Guarantee', 'value' => '3 years with reg', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£36.89', 'verdict' => 'neutral'],
                    ['label' => 'Power', 'value' => '1050W', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Russell Hobbs 2 Slice Toaster with Perfectoast, Wide Slots, Stainless',
                'price' => '£24.99',
                'rating' => 4.3,
                'reviews_count' => 4520,
                'image' => 'https://m.media-amazon.com/images/I/81Mr8di8BmL._AC_SL1500_.jpg',
                'alt_text' => 'Russell Hobbs 2 slice toaster with Perfectoast technology',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07DPP4FGM?tag=ranked10-21',
                'summary' => 'The value pick from the big brand. A stainless two-slice toaster with even-toasting technology and 4,520 ratings, for GBP 24.99.',
                'body' => "This Russell Hobbs is the cheap way into the brand, and it adds one genuinely useful thing over the plainest budget toasters: Perfectoast technology, which the maker says improves how evenly the two slices brown, a common complaint with cheap toasters. At GBP 24.99 with 4,520 ratings at 4.3 stars, it is a lot of trusted toaster for the money.

It has wide slots, six browning levels, a lift-and-look feature, a frozen-bread setting and cancel, in a brushed and polished stainless body that looks smarter than the plastic budget models.

It is a two-slice, 850W toaster, so it is on the slower side and only does two slices at a time. And as with all these, the browning is only as even as any toaster manages, whatever the technology name. But for a stainless-finished toaster from the UK's best-known brand at under twenty-five pounds, with even-toasting as its selling point, it is a solid value choice below the pricier Inspire.",
                'pros' => ['4,520 ratings at 4.3 stars for GBP 24.99', 'Perfectoast technology for more even browning', 'Brushed stainless body, smarter than plastic', 'Wide slots, six browning levels, lift and look', 'Trusted Russell Hobbs brand'],
                'contras' => ['850W, one of the slower toasters here', 'Two slots only', 'Even toasting is still relative, whatever the name', 'Fewer features than the pricier Inspire'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£24.99', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '4,520 at 4.3 stars', 'verdict' => 'good'],
                    ['label' => 'Even toasting', 'value' => 'Perfectoast', 'verdict' => 'good'],
                    ['label' => 'Body', 'value' => 'Stainless steel', 'verdict' => 'good'],
                    ['label' => 'Power', 'value' => '850W', 'verdict' => 'bad', 'note' => 'One of the slower here.'],
                    ['label' => 'Slots', 'value' => '2, wide', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Arendo Frukost 4 Slice Long-Slot Toaster with Warming Rack',
                'price' => '£46.85',
                'rating' => 4.0,
                'reviews_count' => 3474,
                'image' => 'https://m.media-amazon.com/images/I/8117ylucEkL._AC_SL1500_.jpg',
                'alt_text' => 'Arendo Frukost 4 slice long slot toaster',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08Y4YTMZ5?tag=ranked10-21',
                'summary' => 'The long-slot pick. Two long slots take whole bloomer or artisan slices lengthways, with a warming rack and 3,474 ratings — though at a lower 4.0 average.',
                'body' => "If you buy bloomers, sourdough or other loaves whose slices do not fit a normal square slot, this is the toaster to look at. Instead of four square holes, the Arendo has two long slots, so a whole long slice lies flat and toasts evenly end to end, and you can fit four ordinary slices or two large ones. It has 3,474 ratings, a large sample, and comes with a warming rack for rolls and a remaining-time display.

The double-wall housing stays cooler to the touch, and it has six browning levels, defrost, reheat, cancel and automatic bread centring.

Two honest points. Its 4.0-star average is the lowest on this page, so it divides opinion more than the others, typically on browning evenness across the long slot. And at GBP 46.85 it is one of the pricier toasters here. But no other toaster in this comparison fits a full artisan slice the way a long-slot does, so if that is your bread, it is the one built for it.",
                'pros' => ['Long slots fit whole bloomer or artisan slices lengthways', '3,474 ratings, a large sample', 'Warming rack and remaining-time display', 'Cool double-wall housing, auto bread centring', 'Six browning levels, defrost and reheat'],
                'contras' => ['4.0 stars, the lowest average on the page', 'GBP 46.85, one of the pricier toasters here', 'Browning across a long slot divides opinion', 'Larger footprint than a square four-slice'],
                'specs' => [
                    ['label' => 'Slot type', 'value' => 'Long slot', 'verdict' => 'good', 'note' => 'Fits a whole artisan slice.'],
                    ['label' => 'Customer ratings', 'value' => '3,474 at 4.0 stars', 'verdict' => 'bad', 'note' => 'Lowest average here.'],
                    ['label' => 'Capacity', 'value' => '4 slices', 'verdict' => 'good'],
                    ['label' => 'Extras', 'value' => 'Warming rack, timer', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£46.85', 'verdict' => 'bad'],
                    ['label' => 'Housing', 'value' => 'Cool double wall', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Breville Edge Deep Chassis 2 Slice Toaster, Toasts Tall Slices to the Top',
                'price' => '£31.99',
                'rating' => 4.4,
                'reviews_count' => 2302,
                'image' => 'https://m.media-amazon.com/images/I/71Cj1Yc2pOL._AC_SL1500_.jpg',
                'alt_text' => 'Breville Edge deep chassis 2 slice toaster',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0942XL6KG?tag=ranked10-21',
                'summary' => 'The pick for tall bread. A deep-chassis two-slice toaster that toasts a large slice right to the top, in brushed steel, at 4.4 stars.',
                'body' => "The Edge solves a specific, familiar annoyance: on most toasters a tall slice of bread ends up with a pale, untoasted strip along the top because the slot is not deep enough. Breville designed this one with a deep chassis specifically to toast tall slices all the way to the top, so a big slice comes out evenly done edge to edge. It has 2,302 ratings at 4.4 stars.

It keeps the good Breville features — variable-width slots for thin or thick bread, a high-lift lever, lift and look, defrost, reheat and cancel — in a brushed stainless body with a textured rim that looks smart on a worktop.

At GBP 31.99 it costs a little more than the plain two-slice toasters, and it is still only two slots. But if you regularly toast tall or large slices and hate the untoasted strip, it is the two-slice toaster built to fix that, and its rating and review count are both strong.",
                'pros' => ['Deep chassis toasts tall slices right to the top', '2,302 ratings at 4.4 stars', 'Variable-width slots, high lift, lift and look', 'Brushed stainless steel finish', 'Solves the pale-strip problem of shallow slots'],
                'contras' => ['GBP 31.99, dearer than plain two-slice toasters', 'Two slots only', 'No four-slice option in this model', 'No bagel-specific mode'],
                'specs' => [
                    ['label' => 'Slot type', 'value' => 'Deep chassis', 'verdict' => 'good', 'note' => 'Toasts tall slices to the top.'],
                    ['label' => 'Customer ratings', 'value' => '2,302 at 4.4 stars', 'verdict' => 'good'],
                    ['label' => 'High lift', 'value' => 'Yes', 'verdict' => 'good'],
                    ['label' => 'Body', 'value' => 'Brushed stainless', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£31.99', 'verdict' => 'neutral'],
                    ['label' => 'Slots', 'value' => '2, variable width', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'Morphy Richards Illumination 4 Slice Toaster, 7 Settings, Variable Width',
                'price' => '£39.93',
                'rating' => 4.4,
                'reviews_count' => 1251,
                'image' => 'https://m.media-amazon.com/images/I/715a5B9Pg0L._AC_SL1500_.jpg',
                'alt_text' => 'Morphy Richards Illumination 4 slice toaster',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B092R27Z8Q?tag=ranked10-21',
                'summary' => 'A well-rated four-slice toaster with variable-width slots and seven browning settings, at 4.4 stars for GBP 39.93.',
                'body' => "For a four-slice toaster from an established brand, the Morphy Richards Illumination is a strong, well-rounded choice: 1,251 ratings at 4.4 stars, four slots to toast a family's breakfast at once, and variable-width slots that handle bread, bagels, waffles or English muffins. Seven browning settings give fine control over the shade.

It has a removable crumb tray, integrated cord storage to keep the worktop tidy, and a blue illumination while toasting, in a titanium finish that suits most kitchens.

It sits mid-table because, as a four-slice, it costs more and takes more space than the two-slice picks, and it uses a single browning control for all four slots rather than the independent pairs of the Breville Zen below. But for a dependable, good-looking four-slice toaster at around forty pounds, it is an easy recommendation.",
                'pros' => ['Four slots for a family breakfast at once', '1,251 ratings at 4.4 stars', 'Variable-width slots for bagels, waffles and muffins', 'Seven browning settings, removable crumb tray', 'Cord storage and a tidy titanium finish'],
                'contras' => ['Single browning control for all four slots', 'Costs and takes more space than a two-slice', 'No long-slot or deep-chassis design', '1500W split across four slots'],
                'specs' => [
                    ['label' => 'Capacity', 'value' => '4 slices', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '1,251 at 4.4 stars', 'verdict' => 'good'],
                    ['label' => 'Browning', 'value' => '7 settings', 'verdict' => 'good'],
                    ['label' => 'Slots', 'value' => 'Variable width', 'verdict' => 'good'],
                    ['label' => 'Controls', 'value' => 'Single for all four', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£39.93', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Tefal Loft 4 Slice Toaster, 7 Browning Levels, 1700W, High-Lift',
                'price' => '£39.00',
                'rating' => 4.3,
                'reviews_count' => 1091,
                'image' => 'https://m.media-amazon.com/images/I/71MEhcabvbL._AC_SL1500_.jpg',
                'alt_text' => 'Tefal Loft 4 slice toaster in white',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08BPPLGYB?tag=ranked10-21',
                'summary' => 'The fastest four-slice here at 1700W, with high-lift self-centring racks and seven browning levels, at 4.3 stars for GBP 39.',
                'body' => "The Tefal Loft is the four-slice pick if you want speed and even placement. At 1700W it is the most powerful toaster in this comparison, so it browns faster than the 1500W four-slice models, and its self-centring racks hold each slice in the middle of the slot for more even toasting on both sides. It has 1,091 ratings at 4.3 stars.

Wide slots take bagels, artisan breads and thick slices, a high-lift lever retrieves English muffins and crumpets safely, and it has the usual defrost, reheat and cancel functions with a removable crumb tray. The fluted, glossy design is a genuine style piece rather than a plain box.

It ranks just below the Morphy Richards on rating, but its higher wattage and self-centring racks are real advantages if speed and even toasting matter to you. For a fast, good-looking four-slice at GBP 39, it is a strong option.",
                'pros' => ['1700W, the fastest toaster in this comparison', 'Self-centring racks for even toasting', 'Wide slots for bagels, artisan bread and thick slices', 'High lift, defrost, reheat and cancel', 'Distinctive fluted design'],
                'contras' => ['4.3 stars, just below the Morphy Richards', 'Single browning control across the pairs', 'Four-slice footprint', 'Plastic body'],
                'specs' => [
                    ['label' => 'Power', 'value' => '1700W', 'verdict' => 'good', 'note' => 'The fastest here.'],
                    ['label' => 'Racks', 'value' => 'Self-centring', 'verdict' => 'good', 'note' => 'Even toasting both sides.'],
                    ['label' => 'Capacity', 'value' => '4 slices', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '1,091 at 4.3 stars', 'verdict' => 'neutral'],
                    ['label' => 'Slots', 'value' => 'Wide', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£39.00', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Amazon Basics 4 Slice Toaster, 7 Shade Settings, Extra-Wide Slots',
                'price' => '£22.99',
                'rating' => 4.4,
                'reviews_count' => 833,
                'image' => 'https://m.media-amazon.com/images/I/71SHagRmavL._AC_SL1500_.jpg',
                'alt_text' => 'Amazon Basics 4 slice toaster',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D2L3J4J2?tag=ranked10-21',
                'summary' => 'The cheapest four-slice here at GBP 22.99. Extra-wide slots, seven shade settings and a defrosting rack, at 4.4 stars.',
                'body' => "If you want four slots at the lowest price, this is it. At GBP 22.99 the Amazon Basics four-slice costs the same as many two-slice toasters, yet toasts twice as much at once, with 833 ratings at 4.4 stars. The extra-wide slots, about 14 by 3.8cm, take thick bread and bagels comfortably, and seven shade settings give proper control over the colour.

It includes a removable warming rack that sits above the slots for heating rolls or croissants, dedicated defrost, reheat and cancel buttons, and a removable crumb tray at the back for easy cleaning.

For the money it is hard to argue with: it does the core four-slice job well and cheaply. The trade is that it is a plainer, unbranded appliance without the finish or the longer guarantees of the Morphy Richards or Tefal, and 1500W is split across four slots so it is not the fastest. But as the cheapest capable four-slice here, it is the value pick for a family.",
                'pros' => ['Cheapest four-slice here at GBP 22.99', 'Extra-wide slots for thick bread and bagels', 'Seven shade settings, 833 ratings at 4.4 stars', 'Removable warming rack for rolls and croissants', 'Defrost, reheat and a removable crumb tray'],
                'contras' => ['Plainer finish than the branded four-slice toasters', 'Shorter guarantee than Morphy Richards or Tefal', '1500W across four slots, not the fastest', 'Single browning control'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£22.99', 'verdict' => 'good', 'note' => 'The cheapest four-slice here.'],
                    ['label' => 'Capacity', 'value' => '4 slices', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '833 at 4.4 stars', 'verdict' => 'neutral'],
                    ['label' => 'Slots', 'value' => 'Extra wide', 'verdict' => 'good'],
                    ['label' => 'Extras', 'value' => 'Warming rack, defrost', 'verdict' => 'good'],
                    ['label' => 'Finish', 'value' => 'Plain', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'Breville Zen 4 Slice Toaster, Independent Dual Controls, High Lift',
                'price' => '£40.99',
                'rating' => 4.4,
                'reviews_count' => 835,
                'image' => 'https://m.media-amazon.com/images/I/71btsFTrWXL._AC_SL1500_.jpg',
                'alt_text' => 'Breville Zen 4 slice toaster with independent controls',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D2J1M9W4?tag=ranked10-21',
                'summary' => 'The four-slice pick for households who toast different amounts. Independent dual controls let you toast two slices while leaving the others off, at 4.4 stars.',
                'body' => "The Zen's stand-out feature is its independent dual controls: the four slots are split into two pairs, each with its own browning dial and lever, so you can toast just two slices while the other two stay off, or do two light and two dark at the same time. For a household where people want different amounts or shades, that is genuinely useful and saves energy over running all four for one person. It has 835 ratings at 4.4 stars.

It keeps the Breville features you would expect: variable-width slots for thin or thick bread, a high-lift lever, lift and look, defrost, reheat and cancel, in a gloss finish with chrome accents.

At GBP 40.99 it is one of the dearer four-slice toasters, and it is a plastic body. But no other four-slice here lets you run half the toaster on its own, so if you are as often making toast for one as for four, the Zen is the smart pick.",
                'pros' => ['Independent dual controls: toast two slices, leave two off', 'Two separate shade dials for different browning at once', '835 ratings at 4.4 stars', 'Variable-width slots, high lift, lift and look', 'Saves energy toasting for one'],
                'contras' => ['GBP 40.99, one of the dearer four-slice toasters', 'Plastic body', 'More than a single-household toaster needs', 'No long-slot or deep-chassis design'],
                'specs' => [
                    ['label' => 'Controls', 'value' => 'Independent dual', 'verdict' => 'good', 'note' => 'Run half the toaster alone.'],
                    ['label' => 'Capacity', 'value' => '4 slices', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '835 at 4.4 stars', 'verdict' => 'good'],
                    ['label' => 'High lift', 'value' => 'Yes', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£40.99', 'verdict' => 'bad'],
                    ['label' => 'Body', 'value' => 'Plastic', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Russell Hobbs Groove 2 Slice Toaster, Extra-Wide Slots, 3-Year Guarantee',
                'price' => '£27.93',
                'rating' => 4.4,
                'reviews_count' => 684,
                'image' => 'https://m.media-amazon.com/images/I/61Sq0+nM4EL._AC_SL1500_.jpg',
                'alt_text' => 'Russell Hobbs Groove 2 slice toaster',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B2DKSJRW?tag=ranked10-21',
                'summary' => 'A stylish two-slice toaster with extra-wide slots and a three-year guarantee, at 4.4 stars for GBP 27.93 — on a smaller review count than the picks above.',
                'body' => "The Groove is a good-looking two-slice toaster with a 3D-textured body and gold-coloured accents, aimed at people who want their toaster to look the part on the worktop. It has 684 ratings at 4.4 stars, extra-wide slots for thick bread and bagels, a blue illuminating indicator, and frozen, reheat and cancel functions, for GBP 27.93.

Like the other Russell Hobbs models, it comes with a two-year guarantee that extends to three years if you register within 28 days, which is generous cover for a mid-priced toaster.

It ranks last mainly on evidence: 684 ratings is the smallest sample on this page, though a healthy score. Its features are broadly those of the cheaper Russell Hobbs two-slice above, so you are largely paying a little extra for the styling. If the look matters to you and you want the long guarantee, it is a pleasant choice; if not, the Breville Bold or the cheaper Russell Hobbs give you more reviews for less.",
                'pros' => ['Stylish 3D-textured body with gold accents', 'Extra-wide slots for thick bread and bagels', 'Three-year guarantee with registration', 'Blue illuminating indicator, 4.4 star rating', 'Frozen, reheat and cancel functions'],
                'contras' => ['684 ratings, the smallest sample on the page', 'Features similar to the cheaper Russell Hobbs two-slice', 'Paying partly for the styling', 'Two slots only'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '684 at 4.4 stars', 'verdict' => 'bad', 'note' => 'The smallest sample here.'],
                    ['label' => 'Slots', 'value' => '2, extra wide', 'verdict' => 'good'],
                    ['label' => 'Guarantee', 'value' => '3 years with reg', 'verdict' => 'good'],
                    ['label' => 'Design', 'value' => 'Textured, gold accents', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£27.93', 'verdict' => 'neutral'],
                    ['label' => 'Power', 'value' => '850W', 'verdict' => 'bad'],
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
        $this->command?->info("ToastersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
