<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class HandMixersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE BATEDEIRAS DE MAO DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=electric+hand+mixer&rh=p_36%3A1500-  (20 ASINS, 11 FICHAS ABERTAS)
        // CATEGORIA KITCHEN (COMISSAO 5%). SAZONAL: SOBE NA EPOCA DE BOLOS/NATAL.
        //
        // PADRAO EDITORIAL (30/08): E UM TOP 10, NAO ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── EIXOS DE COMPRA ───
        //   POTENCIA 300-450W (massa pesada precisa de 400W+), NUMERO DE VELOCIDADES + TURBO,
        //   ACESSORIOS (batedores + ganchos de massa; alguns trazem batedor de arame/balao),
        //   INOX x CROMADO, LAVAVEL NA MAQUINA, BOTAO DE EJETAR, CAIXA DE ARMAZENAMENTO.
        //   ⚠ NAO CONFUNDIR COM MIXER DE MAO (hand blender) — FORA DA LISTA: FRESKO, BRAUN MULTIQUICK, VOSPEED (batedeira planetaria).
        //
        // ⚠ POOLS COMPARTILHADOS (VARIANTES): KENWOOD B0829FF68Q e B0828CKSFC = 6.547 (mesmo QuickMix 450W, cor/embalagem).
        //   BOSCH B073GW3MFH (MFQ2420, 400W) e B00XW7GYHQ (MFQ3030, 350W) = 2.440 (mesma familia CleverMixx). SINALIZADO NO TEXTO.
        //
        // PROFUNDIDADE (FICHA): 12.281 / 6.914 / 6.547 / 2.440 / 2.440 / 2.086 / 386 / 359 / 19 / 17.
        //
        // FOCUS KEYWORD: best hand mixer
        // VARIACOES: hand mixer / electric whisk / best electric hand mixer uk / hand mixer for baking /
        // 5 speed hand mixer / hand mixer with dough hooks / kenwood hand mixer / cheap hand mixer
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',
            'name' => 'Kitchen',
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.',
        ];

        $article = [
            'slug' => 'best-hand-mixer',
            'title' => 'Best Hand Mixer 2026: 10 Electric Whisks Ranked for Baking',
            'meta_title' => 'Best Hand Mixer 2026: 10 Electric Whisks Ranked',
            'meta_description' => 'The best hand mixer picks for UK baking, from Kenwood and Bosch to budget whisks. Ten electric hand mixers compared on power, speeds and price.',
            'focus_keyword' => 'best hand mixer',

            'intro' => "If you want the short answer, the Kenwood QuickMix is the best hand mixer for most kitchens: a 450W motor, five speeds plus turbo, stainless steel beaters and dough hooks, and 6,547 ratings at 4.6 stars for GBP 28.50. If you want to spend less, the VonShef costs GBP 19.99 and has 6,914 ratings at 4.5 stars.

Three things separate a hand mixer that lasts from one that struggles. The first is power: 300W is fine for cream and cake batter, but bread dough and stiff icing want 400W or more, or the motor labours and gets hot. The second is what comes in the box — beaters whip and mix, dough hooks knead, and a balloon whisk aerates, so check you get the attachments for what you actually bake. The third is the small stuff that decides whether you enjoy using it: an eject button so you are not wrestling beaters out, dishwasher-safe attachments, and somewhere to store the parts so they do not scatter through a drawer. We compared ten on those points, plus ratings and price.",

            'conclusion' => "For most bakers the best hand mixer here is the Kenwood QuickMix: 450W is enough for dough as well as cake batter, the stainless attachments do not bend, and it comes from a brand that has been making kitchen machines for decades. If money is tight, the VonShef and the Lord Eagle both cost around twenty pounds and have thousands of happy owners between them.

Choose differently for a specific reason. If noise matters — an early-morning baker in a flat — the quieter Bosch CleverMixx or the KitchenAid's soft-start motor are the ones to look at, since a cheap mixer at full speed is genuinely loud. If you mostly whip cream and egg whites rather than knead, a 300W model is plenty and you can save the money. And whatever you buy, check the attachments are dishwasher safe, because scraping stiff buttercream out of a beater by hand is the fastest way to stop using a mixer at all.",

            'author' => 'Felipe Iglesias',
            'published_at' => '2026-09-02 20:00:00',
        ];

        $products = [
            [
                'position' => 1,
                'name' => 'Kenwood QuickMix Hand Mixer, 450W, 5 Speeds plus Turbo, Stainless Attachments',
                'price' => '£28.50',
                'rating' => 4.6,
                'reviews_count' => 6547,
                'image' => 'https://m.media-amazon.com/images/I/615eOP6X7KL._AC_SL1500_.jpg',
                'alt_text' => 'best hand mixer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0828CKSFC?tag=ranked10-21',
                'summary' => 'The best hand mixer for most kitchens. 450W with five speeds and turbo, stainless beaters and dough hooks, and 6,547 ratings at 4.6 stars.',
                'body' => "This is first because it has the right power and the right attachments from a brand that has been making kitchen machines in Britain for generations. The 450W motor sits at the top of what hand mixers offer, so it handles stiff bread dough and thick icing rather than whining and heating up, and five speeds plus a turbo button give you fine control from a gentle fold to full whipping. It has 6,547 ratings at 4.6 stars, the best rating of any well-reviewed mixer here.

Both the beaters and the kneaders are stainless steel rather than thin chrome-plated wire, so they do not bend on heavy mixtures, and they detach for the dishwasher. The body is compact enough to live in a drawer rather than needing a cupboard shelf.

There is very little against it at GBP 28.50. Kenwood sells this same 450W mixer under more than one listing and colour, and they share this pool of 6,547 ratings, so buy whichever version is cheaper on the day — the machine is the same.",
                'pros' => ['450W handles bread dough and stiff icing, not just cake batter', '6,547 ratings at 4.6 stars, best rated of the popular mixers', 'Stainless steel beaters and dough hooks that do not bend', 'Five speeds plus turbo for fine control', 'Compact enough for a drawer, dishwasher-safe attachments'],
                'contras' => ['Dearer than the twenty-pound budget mixers', 'No balloon whisk in the box', 'Sold under several listings sharing one rating pool', 'Louder than the Bosch and KitchenAid at full speed'],
                'specs' => [
                    ['label' => 'Power', 'value' => '450W', 'verdict' => 'good', 'note' => 'Enough for bread dough.'],
                    ['label' => 'Customer ratings', 'value' => '6,547 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Attachments', 'value' => 'Stainless beaters + hooks', 'verdict' => 'good'],
                    ['label' => 'Speeds', 'value' => '5 plus turbo', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£28.50', 'verdict' => 'neutral'],
                    ['label' => 'Brand', 'value' => 'Kenwood', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'VonShef Hand Mixer Electric Whisk, 300W, 5 Speeds, 3-in-1 Attachments',
                'price' => '£19.99',
                'rating' => 4.5,
                'reviews_count' => 6914,
                'image' => 'https://m.media-amazon.com/images/I/713SjB+PiGL._AC_SL1500_.jpg',
                'alt_text' => 'VonShef electric hand mixer whisk',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B008XJNEU8?tag=ranked10-21',
                'summary' => 'The best value here. 6,914 ratings at 4.5 stars for GBP 19.99, with beaters, dough hooks and a balloon whisk in the box.',
                'body' => "At GBP 19.99 with 6,914 ratings at 4.5 stars, the VonShef is the value pick and, unusually at this price, it is a genuine three-in-one: it comes with stainless steel beaters for cake mixes, dough hooks for kneading, and a balloon whisk for cream and egg whites, which most budget mixers leave out.

Five speeds cover the range, the attachments release at the push of a button and go in the dishwasher, and the stainless-and-black finish looks better than the price suggests.

The compromise is power. At 300W it is happy with cake batter, cream and light mixtures but will work harder than the 450W Kenwood on stiff bread dough, so if kneading is a regular job rather than an occasional one, spend the extra. For everything else, this is a lot of mixer for twenty pounds.",
                'pros' => ['6,914 ratings at 4.5 stars for GBP 19.99', 'Beaters, dough hooks and a balloon whisk all included', 'Five speeds with a quick-release eject button', 'Dishwasher-safe stainless attachments', 'Smart stainless and black finish'],
                'contras' => ['300W struggles more than 450W on stiff dough', 'Less established brand than Kenwood or Bosch', 'No storage case', 'Noisier at top speed'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£19.99', 'verdict' => 'good', 'note' => 'Best value here.'],
                    ['label' => 'Customer ratings', 'value' => '6,914 at 4.5 stars', 'verdict' => 'good'],
                    ['label' => 'Attachments', 'value' => 'Beaters, hooks, whisk', 'verdict' => 'good', 'note' => 'Balloon whisk is rare at this price.'],
                    ['label' => 'Power', 'value' => '300W', 'verdict' => 'bad', 'note' => 'Light work rather than heavy dough.'],
                    ['label' => 'Speeds', 'value' => '5', 'verdict' => 'neutral'],
                    ['label' => 'Care', 'value' => 'Dishwasher safe', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Lord Eagle 400W Hand Mixer Electric Whisk, 5 Speeds, Turbo, 5 Attachments',
                'price' => '£19.99',
                'rating' => 4.4,
                'reviews_count' => 12281,
                'image' => 'https://m.media-amazon.com/images/I/713fYIkGAZL._AC_SL1500_.jpg',
                'alt_text' => 'Lord Eagle 400W hand mixer electric whisk',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08LGG9CDN?tag=ranked10-21',
                'summary' => 'The most-reviewed mixer on the page with 12,281 ratings, and 400W for GBP 19.99 — more power than the other budget picks.',
                'body' => "Twelve thousand two hundred and eighty-one ratings is more customer feedback than any other hand mixer in this comparison, and the specification behind it is strong for twenty pounds: a 400W copper motor, five speeds plus turbo, and five stainless steel attachments including two dough hooks and two beaters.

The 400W matters, because it puts this within reach of dough work that the 300W budget mixers find hard, at the same price. There is a low-speed first gear designed to stop flour and icing sugar flying out of the bowl when you start, which is a small thing you appreciate every single time.

It sits third rather than first because its 4.4-star average is a little below the Kenwood and VonShef, and Lord Eagle is a marketplace brand with no service network. On raw evidence and power per pound, though, it is hard to beat.",
                'pros' => ['12,281 ratings, by far the most on this page', '400W for GBP 19.99, more power than rival budget mixers', 'Five stainless attachments including two dough hooks', 'Low-speed start stops flour clouds', 'Five speeds plus turbo, dishwasher safe'],
                'contras' => ['4.4 stars, below the Kenwood and VonShef', 'Marketplace brand with no service network', 'No balloon whisk', 'Plastic body feels cheaper than the branded mixers'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '12,281 at 4.4 stars', 'verdict' => 'good', 'note' => 'The most on this page.'],
                    ['label' => 'Power', 'value' => '400W', 'verdict' => 'good', 'note' => 'More than rival budget mixers.'],
                    ['label' => 'Price', 'value' => '£19.99', 'verdict' => 'good'],
                    ['label' => 'Attachments', 'value' => '5 stainless pieces', 'verdict' => 'good'],
                    ['label' => 'Soft start', 'value' => 'Low first speed', 'verdict' => 'good'],
                    ['label' => 'Brand', 'value' => 'Marketplace', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Bosch CleverMixx MFQ3030 Hand Mixer, Quiet 350W Motor, 5 Speeds',
                'price' => '£21.99',
                'rating' => 4.4,
                'reviews_count' => 2440,
                'image' => 'https://m.media-amazon.com/images/I/61J84TTlQeL._AC_SL1500_.jpg',
                'alt_text' => 'Bosch CleverMixx MFQ3030 hand mixer in white',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00XW7GYHQ?tag=ranked10-21',
                'summary' => 'The quiet one. Bosch build quality and a deliberately quieter 350W motor, for GBP 21.99 — the pick for early-morning baking in a flat.',
                'body' => "Hand mixers are loud, and if you bake early, late, or in a flat with thin walls, that matters more than another fifty watts. Bosch designs the CleverMixx around a quieter 350W motor, and it is noticeably less shrill than the budget mixers at full speed while still handling cake mixes and light doughs.

You also get German build quality at a British budget price: stainless steel kneading hooks and heavy-duty beaters, five speed settings, and a body that feels solid rather than hollow. It has 2,440 ratings at 4.4 stars for GBP 21.99.

Two things to note. At 350W it is not the mixer for heavy bread dough — the Kenwood is. And Bosch sells several CleverMixx models that share this pool of ratings, including the 400W MFQ2420 further down, so check which wattage you are actually buying rather than assuming the reviews are for one specific machine.",
                'pros' => ['Quieter motor than the budget mixers, good for early baking', 'Bosch build quality at GBP 21.99', 'Stainless kneading hooks and heavy-duty beaters', '2,440 ratings at 4.4 stars', 'Solid body, five speed settings'],
                'contras' => ['350W is light for heavy bread dough', 'Shares its rating pool with other CleverMixx models', 'No balloon whisk or storage case', 'Fewer speeds than the six-speed rivals'],
                'specs' => [
                    ['label' => 'Noise', 'value' => 'Quieter motor', 'verdict' => 'good', 'note' => 'The calmest of the cheap mixers.'],
                    ['label' => 'Power', 'value' => '350W', 'verdict' => 'neutral'],
                    ['label' => 'Customer ratings', 'value' => '2,440 at 4.4 stars', 'verdict' => 'neutral', 'note' => 'Shared across CleverMixx models.'],
                    ['label' => 'Price', 'value' => '£21.99', 'verdict' => 'good'],
                    ['label' => 'Build', 'value' => 'Bosch, solid', 'verdict' => 'good'],
                    ['label' => 'Attachments', 'value' => 'Stainless hooks + beaters', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Russell Hobbs Desire Hand Mixer, 350W, 5 Speeds, Base Stand',
                'price' => '£21.93',
                'rating' => 4.3,
                'reviews_count' => 2086,
                'image' => 'https://m.media-amazon.com/images/I/51E4BmEb0bL._AC_SL1500_.jpg',
                'alt_text' => 'Russell Hobbs Desire electric hand mixer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07RPN2ZKC?tag=ranked10-21',
                'summary' => 'A familiar UK brand at GBP 21.93, with a base stand so it sits upright on the worktop and a three-year guarantee on registration.',
                'body' => "Russell Hobbs is the brand most likely to already be on a British worktop, and the Desire is its mainstream hand mixer: 350W, five speeds plus turbo, and two chrome-plated beaters and two dough hooks that all go in the dishwasher. It has 2,086 ratings at 4.3 stars.

Its practical touch is the base stand: the mixer stands upright on its own rather than lying on its side dripping batter, which sounds trivial until you are mid-recipe with sticky hands. There is an eject button for swapping attachments, and the guarantee runs to three years if you register online, which is longer than most rivals here offer.

It ranks mid-table because 4.3 stars is the lowest average of the well-reviewed mixers on this page and the beaters are chrome-plated rather than solid stainless, so they are a little more prone to bending on stiff mixtures. For a familiar brand with a long guarantee at a low price, though, it is a reasonable buy.",
                'pros' => ['Familiar Russell Hobbs brand at GBP 21.93', 'Base stand keeps it upright on the worktop', 'Three-year guarantee with online registration', 'Dishwasher-safe beaters and dough hooks', 'Eject button for quick attachment changes'],
                'contras' => ['4.3 stars, lowest of the well-reviewed mixers here', 'Chrome-plated rather than solid stainless beaters', '350W is light for heavy dough', 'No balloon whisk'],
                'specs' => [
                    ['label' => 'Brand', 'value' => 'Russell Hobbs', 'verdict' => 'good'],
                    ['label' => 'Guarantee', 'value' => '3 years with reg', 'verdict' => 'good'],
                    ['label' => 'Storage', 'value' => 'Stands upright', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '2,086 at 4.3 stars', 'verdict' => 'bad'],
                    ['label' => 'Power', 'value' => '350W', 'verdict' => 'neutral'],
                    ['label' => 'Beaters', 'value' => 'Chrome plated', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'Bosch CleverMixx MFQ2420 Hand Mixer, 400W, 4 Speeds, Stainless Steel',
                'price' => '£36.99',
                'rating' => 4.4,
                'reviews_count' => 2440,
                'image' => 'https://m.media-amazon.com/images/I/61WMjjqnfqL._AC_SL1500_.jpg',
                'alt_text' => 'Bosch CleverMixx MFQ2420 hand mixer in black',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B073GW3MFH?tag=ranked10-21',
                'summary' => 'The more powerful CleverMixx at 400W, in a black and stainless finish. Same Bosch build, more grunt for dough than the MFQ3030.',
                'body' => "This is the step up within Bosch's CleverMixx range: 400 watts instead of 350, which is the difference between coping with a stiff dough and fighting it. The stainless steel kneading hooks and heavy-duty beaters are the same quality items, and the black and stainless finish looks smarter on a worktop than the white model.

Four speed settings cover the usual range, and Bosch's build feels a class above the twenty-pound marketplace mixers in the hand.

Two caveats keep it here. At GBP 36.99 it is the most expensive mainstream mixer on this page, noticeably more than the 450W Kenwood that outperforms it on paper, and it shares its 2,440 ratings with the cheaper MFQ3030, so the reviews describe the family rather than this exact model. Buy it if you want Bosch specifically and prefer the finish; otherwise the Kenwood gives you more power for less.",
                'pros' => ['400W, more capable on dough than the MFQ3030', 'Bosch build quality and stainless attachments', 'Smart black and stainless finish', '4.4 star average', 'Heavy-duty beaters that resist bending'],
                'contras' => ['GBP 36.99, dearer than the more powerful Kenwood', 'Shares its rating pool with the cheaper MFQ3030', 'Only four speed settings', 'No balloon whisk or case'],
                'specs' => [
                    ['label' => 'Power', 'value' => '400W', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£36.99', 'verdict' => 'bad', 'note' => 'Dearer than the 450W Kenwood.'],
                    ['label' => 'Customer ratings', 'value' => '2,440 at 4.4 stars', 'verdict' => 'neutral', 'note' => 'Shared with the MFQ3030.'],
                    ['label' => 'Speeds', 'value' => '4', 'verdict' => 'bad'],
                    ['label' => 'Build', 'value' => 'Bosch, stainless', 'verdict' => 'good'],
                    ['label' => 'Finish', 'value' => 'Black and steel', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'SHARDOR Hand Mixer, 400W Copper Motor, 6 Speeds, Snap-On Storage Case',
                'price' => '£22.79',
                'rating' => 4.5,
                'reviews_count' => 386,
                'image' => 'https://m.media-amazon.com/images/I/61b4RySvA7L._AC_SL1500_.jpg',
                'alt_text' => 'SHARDOR hand mixer with storage case',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DCBXXZT3?tag=ranked10-21',
                'summary' => 'Six speeds, a 400W copper motor and a snap-on case that keeps the attachments together, for GBP 22.79 at 4.5 stars.',
                'body' => "The SHARDOR's best idea is the snap-on storage case. Hand mixer attachments are exactly the kind of thing that migrate to the back of a drawer and turn up bent, and a case that clips to the mixer keeps the five stainless pieces — two dough hooks, two beaters and a whisk — together with the machine.

The specification is good for GBP 22.79: a 400W copper motor, six speeds plus turbo, which is more steps than most rivals, and a deliberately slow first gear so dry ingredients stay in the bowl when you start. It has 386 ratings at 4.5 stars.

It sits at seventh purely on evidence. Three hundred and eighty-six ratings is a fraction of the thousands behind the mixers above, and SHARDOR is not a name with a service history. If you want six speeds, 400W and tidy storage at a low price, it delivers; if you want a settled verdict, buy higher up the page.",
                'pros' => ['Snap-on case keeps all five attachments with the mixer', '400W copper motor with six speeds plus turbo', 'Slow first gear stops dry ingredients flying out', '4.5 stars, good for the price', 'Includes a whisk as well as beaters and hooks'],
                'contras' => ['386 ratings, a small sample against the leaders', 'No brand service history', 'Plastic body', 'Turbo is loud'],
                'specs' => [
                    ['label' => 'Storage', 'value' => 'Snap-on case', 'verdict' => 'good', 'note' => 'Keeps attachments together.'],
                    ['label' => 'Power', 'value' => '400W copper', 'verdict' => 'good'],
                    ['label' => 'Speeds', 'value' => '6 plus turbo', 'verdict' => 'good', 'note' => 'The most steps here.'],
                    ['label' => 'Customer ratings', 'value' => '386 at 4.5 stars', 'verdict' => 'bad'],
                    ['label' => 'Attachments', 'value' => '5 stainless pieces', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£22.79', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Bosch CleverMixx Styline MFQ4020 Hand Mixer, 450W, Aerating Ball Whisks',
                'price' => '£36.99',
                'rating' => 4.5,
                'reviews_count' => 359,
                'image' => 'https://m.media-amazon.com/images/I/618G7wtfEaL._AC_SL1500_.jpg',
                'alt_text' => 'Bosch Styline MFQ4020 hand mixer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00XW7GYQ2?tag=ranked10-21',
                'summary' => 'The best whisking here. Bosch fits little balls to the whisks to force more air into the mixture, on a 450W motor, for lighter cream and meringue.',
                'body' => "The Styline is the mixer for anyone who mostly whips rather than kneads. Bosch fits small balls to the whisk wires, which break up the mixture and drive more air into it, so cream and egg whites come up lighter and faster than with plain beaters — a genuine mechanical difference rather than a marketing line.

It pairs that with a 450W motor, the joint most powerful on this page, stainless steel dough hooks for when you do knead, five speeds, and a soft-touch handle that keeps a secure grip at high speed. It has 359 ratings at 4.5 stars.

Two things hold it at eighth: GBP 36.99 makes it joint dearest here, and 359 ratings is a small sample compared with the thousands above. If lighter meringue and quicker cream matter to you and you want Bosch quality, it is the specialist pick.",
                'pros' => ['Ball-fitted whisks aerate cream and egg whites faster', '450W, joint most powerful on this page', 'Stainless steel dough hooks included', 'Soft-touch handle, secure at high speed', '4.5 star average'],
                'contras' => ['GBP 36.99, joint dearest here', '359 ratings, a small sample', 'Overkill if you never whip', 'No storage case'],
                'specs' => [
                    ['label' => 'Whisks', 'value' => 'Ball-fitted, aerating', 'verdict' => 'good', 'note' => 'Lighter cream and meringue.'],
                    ['label' => 'Power', 'value' => '450W', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '359 at 4.5 stars', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£36.99', 'verdict' => 'bad'],
                    ['label' => 'Build', 'value' => 'Bosch Styline', 'verdict' => 'good'],
                    ['label' => 'Speeds', 'value' => '5', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'KitchenAid 9-Speed Hand Mixer, 85W Quiet DC Motor, Soft Start, 6 Accessories',
                'price' => '£109.99',
                'rating' => 4.3,
                'reviews_count' => 19,
                'image' => 'https://m.media-amazon.com/images/I/71rgbxPXEuL._AC_SL1500_.jpg',
                'alt_text' => 'KitchenAid 9-speed hand mixer with accessories',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G6MLLJQ3?tag=ranked10-21',
                'summary' => 'The premium option: nine speeds, a quiet DC motor and soft start that stops flour clouds, with six accessories and a storage bag.',
                'body' => "KitchenAid's hand mixer is built differently from the rest of this page. It uses a quiet DC motor rated at 85W — a figure that looks tiny next to a 450W universal motor but is not comparable, because DC motors deliver torque far more efficiently — with soft start technology that ramps up gently so flour and sugar stay in the bowl. Nine speeds give finer control than anything else here, and six stainless accessories including a mixing rod cover every job, with a cotton storage bag.

For a keen baker who uses a mixer several times a week and hates noise, it is the nicest of these machines to use.

Two clear caveats. At GBP 109.99 it costs more than three of the mixers above combined, and with only 19 ratings it has the smallest sample on this page by far, so the 4.3-star score is an early signal rather than a verdict. Buy it for the soft start, the quiet running and the KitchenAid name; the Kenwood does the core job for a quarter of the money.",
                'pros' => ['Nine speeds, the finest control here', 'Soft start prevents flour clouds and splashes', 'Quiet DC motor, good for early or late baking', 'Six stainless accessories plus a storage bag', 'KitchenAid build and finish'],
                'contras' => ['GBP 109.99, by far the most expensive here', 'Only 19 ratings, the smallest sample on the page', 'The 85W figure is not comparable with rival wattages', 'Far more mixer than occasional bakers need'],
                'specs' => [
                    ['label' => 'Speeds', 'value' => '9', 'verdict' => 'good', 'note' => 'The finest control here.'],
                    ['label' => 'Soft start', 'value' => 'Yes', 'verdict' => 'good'],
                    ['label' => 'Noise', 'value' => 'Quiet DC motor', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£109.99', 'verdict' => 'bad', 'note' => 'The dearest here by far.'],
                    ['label' => 'Customer ratings', 'value' => '19 at 4.3 stars', 'verdict' => 'bad', 'note' => 'Smallest sample here.'],
                    ['label' => 'Accessories', 'value' => '6 plus storage bag', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Amazon Basics 6-Speed Hand Mixer, 400W, Turbo, Snap-On Storage Case',
                'price' => '£18.05',
                'rating' => 4.8,
                'reviews_count' => 17,
                'image' => 'https://m.media-amazon.com/images/I/61qcAjR1NAL._AC_SL1500_.jpg',
                'alt_text' => 'Amazon Basics 6-speed hand mixer with storage case',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DRZSCFC8?tag=ranked10-21',
                'summary' => 'The cheapest here at GBP 18.05, with 400W, six speeds and a snap-on case — but only 17 ratings so far.',
                'body' => "On specification this is remarkable for the money: GBP 18.05 buys a 400W motor, six speeds with turbo, stainless beaters, dough hooks and a whisk, a quick-release button and a snap-on storage case that keeps the attachments with the mixer. That is the same feature list as mixers costing five pounds more, from a brand with Amazon's returns behind it.

Its early rating is an excellent 4.8 stars.

It is last for one reason only, and it is a big one: 17 ratings. That is the smallest sample in this comparison, so the score tells you almost nothing yet — a handful of happy buyers is not evidence that a motor lasts three years of weekly baking. If you want the cheapest capable mixer and are comfortable being an early buyer with easy returns, it looks like good value; if you want proof, the VonShef and Lord Eagle cost about the same with thousands of ratings behind them.",
                'pros' => ['Cheapest mixer here at GBP 18.05', '400W with six speeds and turbo', 'Beaters, dough hooks and whisk plus a snap-on case', 'Quick-release button for attachments', 'Amazon returns and support behind it'],
                'contras' => ['Only 17 ratings, by far the smallest sample here', 'Score is too early to mean much', 'No track record for motor longevity', 'Plastic body'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£18.05', 'verdict' => 'good', 'note' => 'The cheapest here.'],
                    ['label' => 'Customer ratings', 'value' => '17 at 4.8 stars', 'verdict' => 'bad', 'note' => 'Far too small a sample to rely on.'],
                    ['label' => 'Power', 'value' => '400W', 'verdict' => 'good'],
                    ['label' => 'Speeds', 'value' => '6 plus turbo', 'verdict' => 'good'],
                    ['label' => 'Storage', 'value' => 'Snap-on case', 'verdict' => 'good'],
                    ['label' => 'Attachments', 'value' => 'Beaters, hooks, whisk', 'verdict' => 'good'],
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
        $this->command?->info("HandMixersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos).");
    }
}
