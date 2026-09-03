<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class WinterDuvetsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE EDREDONS DE INVERNO DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=winter+duvet+13.5+tog&rh=p_36%3A2000-  (22 ASINS, 12 FICHAS ABERTAS)
        // CATEGORIA HOME. SAZONAL: PICO SETEMBRO-JANEIRO.
        //
        // PADRAO EDITORIAL (30/08): E UM TOP 10, NAO ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── EIXO DE COMPRA / PERGUNTA FACTUAL (TERRENO DE IA): "QUE TOG PARA O INVERNO?" ───
        //   4.5 verao / 10.5 outono-primavera / 13.5 padrao de inverno / 15 e 16.5 extra quente.
        //   ALL-SEASONS 3-in-1 = 4.5 + 10.5 abotoados = 15 tog (SILENTNIGHT). TOG E CALOR, NAO QUALIDADE/PESO.
        //   ENCHIMENTO: microfibra/hollowfibre (lavavel, barato, hipoalergenico) x pena+penugem de ganso (natural, casca de algodao, mais caro).
        //   COVERLESS (beeweed) = ja tem acabamento, dispensa capa.
        //
        // PROFUNDIDADE (FICHA): 25.274 / 20.064 / 14.547 / 6.741 / 3.301 / 2.579 / 1.399 / 795 / 760 / 530.
        // CORTE: PANDA BAMBOO (4 avaliacoes), SNUGGLEDOWN HOTEL (82) — amostra fina demais.
        // ⚠ SILENTNIGHT e SLUMBERDOWN vendem o mesmo modelo em varios tamanhos; os ASINs aqui sao modelos
        //   DIFERENTES (nao so cor/tamanho), cada um com seu pool. Tamanho citado e o do ASIN coletado.
        //
        // FOCUS KEYWORD: best winter duvet
        // VARIACOES: winter duvet / 13.5 tog duvet / warmest duvet / best duvet uk / hollowfibre duvet /
        // anti allergy duvet / goose feather duvet / all seasons duvet / 15 tog duvet / king size winter duvet
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',
            'name' => 'Home',
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.',
        ];

        $article = [
            'slug' => 'best-winter-duvet',
            'title' => 'Best Winter Duvet 2026: 10 Warm Duvets Ranked by Tog',
            'meta_title' => 'Best Winter Duvet 2026: 10 Warm Duvets Ranked by Tog',
            'meta_description' => 'The best winter duvet picks for UK beds, from Silentnight and Slumberdown to goose down. Ten duvets compared on tog, filling and price.',
            'focus_keyword' => 'best winter duvet',

            'intro' => "If you want the short answer, the Silentnight Warm & Cosy is the best winter duvet for most beds: 20,064 ratings at 4.7 stars, a 13.5 tog fill and a soft microfibre cover, for GBP 29.99. If you want to spend less, the Slumberdown Chilly Nights is GBP 21.00 and goes warmer still at 15 tog.

The number that decides everything is the tog rating, and it measures warmth, not quality or weight. As a rough guide: 4.5 tog is a summer duvet, 10.5 suits autumn and spring, 13.5 is the standard British winter duvet, and 15 or 16.5 tog is for a genuinely cold bedroom. After that it comes down to the filling. Microfibre and hollowfibre duvets are light, cheap, machine washable and hypoallergenic; goose feather and down is warmer for its weight and drapes better but costs more and needs more care. We compared ten winter duvets on tog, filling, care and price, and ranked them below.",

            'conclusion' => "For most bedrooms the best winter duvet here is the Silentnight Warm & Cosy: 13.5 tog is the right warmth for a normal British winter, it has more than 20,000 ratings at 4.7 stars, and it washes at home. If your room runs cold, step up to the 15 tog Slumberdown or the 16.5 tog Lancashire Bedding, and if you have allergies, the Silentnight Anti Allergy is the most-reviewed duvet on this page.

Two things worth deciding before you buy. First, do you want to buy one duvet or two: the Silentnight All Seasons gives you a 4.5 tog and a 10.5 tog that button together into 15 tog, so it covers the whole year in one purchase. Second, natural or synthetic: the goose feather and down is the most luxurious here and the warmest for its weight, but every synthetic duvet on this list is cheaper, machine washable and kinder to allergy sufferers.",

            'author' => 'Felipe Iglesias',
            'published_at' => '2026-09-02 16:00:00',
        ];

        $products = [
            [
                'position' => 1,
                'name' => 'Silentnight Warm & Cosy Duvet, 13.5 Tog, King Size',
                'price' => '£29.99',
                'rating' => 4.7,
                'reviews_count' => 20064,
                'image' => 'https://m.media-amazon.com/images/I/71vQZvP-F+L._AC_SL1500_.jpg',
                'alt_text' => 'best winter duvet',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01N1PC50C?tag=ranked10-21',
                'summary' => 'The best winter duvet for most beds. 13.5 tog, a soft microfibre cover and 20,064 ratings at 4.7 stars, made in the UK for GBP 29.99.',
                'body' => "Twenty thousand and sixty-four ratings at 4.7 stars is the strongest combination of volume and score on this page, and it comes on exactly the duvet most British bedrooms need: a 13.5 tog filled with fluffy hollowfibre under a soft-touch microfibre cover. That tog is the standard winter rating, warm enough for a cold night without leaving you throwing it off at 3am.

It is made in the UK, hypoallergenic, and both machine washable and tumble-dryer safe, which matters more than it sounds — a natural-filled duvet usually has to go to the dry cleaner. For under thirty pounds in king size, it is the easy default recommendation.

The only reasons to look elsewhere are if your room is genuinely freezing, where a 15 or 16.5 tog will serve you better, or if you want the drape and luxury of a natural filling.",
                'pros' => ['20,064 ratings at 4.7 stars, the best volume and score here', '13.5 tog, the standard warmth for a British winter', 'Soft microfibre cover over fluffy hollowfibre filling', 'Machine washable and tumble-dryer safe', 'Made in the UK, hypoallergenic'],
                'contras' => ['Not warm enough for a genuinely freezing room', 'Synthetic filling does not drape like down', 'Bulkier than a natural duvet of the same warmth', 'One tog rating only, no all-seasons option'],
                'specs' => [
                    ['label' => 'Tog', 'value' => '13.5', 'verdict' => 'good', 'note' => 'Standard British winter warmth.'],
                    ['label' => 'Customer ratings', 'value' => '20,064 at 4.7 stars', 'verdict' => 'good', 'note' => 'Best score-and-volume mix here.'],
                    ['label' => 'Filling', 'value' => 'Hollowfibre', 'verdict' => 'neutral'],
                    ['label' => 'Care', 'value' => 'Machine wash, tumble dry', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£29.99 (king)', 'verdict' => 'good'],
                    ['label' => 'Made in', 'value' => 'UK', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Slumberdown Chilly Nights 15 Tog Double Duvet',
                'price' => '£21.00',
                'rating' => 4.6,
                'reviews_count' => 14547,
                'image' => 'https://m.media-amazon.com/images/I/71K6ZycPnuL._AC_SL1500_.jpg',
                'alt_text' => 'Slumberdown Chilly Nights 15 tog winter duvet',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07XBPCK6J?tag=ranked10-21',
                'summary' => 'The best value here, and warmer than most. A 15 tog duvet with 14,547 ratings for GBP 21.00 — the pick for a cold bedroom on a budget.',
                'body' => "This is the cheapest duvet on the page and also one of the warmest, which is an unusual combination. At 15 tog it sits a step above the standard 13.5, so it suits a draughty bedroom, a loft conversion or anyone who simply feels the cold, and at GBP 21.00 with 14,547 ratings at 4.6 stars it is very hard to argue with.

It is generously filled with non-allergenic fibres under a soft-touch cover, made in the UK, machine washable, and backed by a two-year quality guarantee, which is more cover than most budget bedding gets.

The thing to be aware of is that 15 tog is genuinely warm. If your bedroom is well insulated or you run hot at night, this will be too much and the 13.5 tog options above and below will suit you better.",
                'pros' => ['Cheapest duvet here at GBP 21.00', '15 tog, warmer than the standard 13.5', '14,547 ratings at 4.6 stars', 'Made in the UK, machine washable, non-allergenic', 'Two-year quality guarantee'],
                'contras' => ['15 tog is too warm for a well-heated room', 'Synthetic fill, no natural drape', 'Double size on this listing', 'Bulky in the wardrobe in summer'],
                'specs' => [
                    ['label' => 'Tog', 'value' => '15', 'verdict' => 'good', 'note' => 'A step warmer than 13.5.'],
                    ['label' => 'Price', 'value' => '£21.00', 'verdict' => 'good', 'note' => 'The cheapest here.'],
                    ['label' => 'Customer ratings', 'value' => '14,547 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Filling', 'value' => 'Non-allergenic fibre', 'verdict' => 'neutral'],
                    ['label' => 'Care', 'value' => 'Machine washable', 'verdict' => 'good'],
                    ['label' => 'Guarantee', 'value' => '2 years', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Silentnight Anti Allergy Double Duvet, 13.5 Tog',
                'price' => '£22.99',
                'rating' => 4.6,
                'reviews_count' => 25274,
                'image' => 'https://m.media-amazon.com/images/I/71mD9mFq37L._AC_SL1500_.jpg',
                'alt_text' => 'Silentnight anti allergy 13.5 tog winter duvet',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01LXYBI02?tag=ranked10-21',
                'summary' => 'The most-reviewed duvet on the page with 25,274 ratings, and the pick for allergy sufferers thanks to treated anti-allergy, anti-bacterial fibres.',
                'body' => "No duvet here has more customer feedback: 25,274 ratings at 4.6 stars. Its reason to exist is the filling, which Silentnight treats with anti-allergy and anti-bacterial fibres and states is approved by the British Allergy Foundation, aimed at reducing the allergens that build up in bedding over time. If dust or bedding sets off hay-fever-like symptoms in your household, this is the duvet on the page built for that.

Otherwise it is a straightforward 13.5 tog winter duvet in a soft microfibre cover, machine washable, made in the UK with a two-year guarantee, at GBP 22.99.

Treat the allergy claim as what the maker publishes rather than a medical promise — a treated duvet can reduce allergens but is not a treatment for a diagnosed allergy, and if symptoms are serious it is worth speaking to a pharmacist or GP.",
                'pros' => ['25,274 ratings, the most of any duvet here', 'Anti-allergy and anti-bacterial treated fibres', '13.5 tog, the standard winter warmth', 'Machine washable, made in the UK', 'Two-year guarantee at GBP 22.99'],
                'contras' => ['Allergy treatment is a maker claim, not a medical remedy', '4.6 stars, just below the Warm & Cosy', 'Synthetic filling only', 'Double size on this listing'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '25,274 at 4.6 stars', 'verdict' => 'good', 'note' => 'The most on this page.'],
                    ['label' => 'Filling', 'value' => 'Anti-allergy treated', 'verdict' => 'good', 'note' => 'The pick for allergy sufferers.'],
                    ['label' => 'Tog', 'value' => '13.5', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£22.99', 'verdict' => 'good'],
                    ['label' => 'Care', 'value' => 'Machine washable', 'verdict' => 'good'],
                    ['label' => 'Guarantee', 'value' => '2 years', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Silentnight Hotel Collection 13.5 Tog Double Duvet',
                'price' => '£26.68',
                'rating' => 4.7,
                'reviews_count' => 6741,
                'image' => 'https://m.media-amazon.com/images/I/71oGHgxAjjL._AC_SL1500_.jpg',
                'alt_text' => 'Silentnight Hotel Collection 13.5 tog duvet',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01FMHF2OY?tag=ranked10-21',
                'summary' => 'The hotel-feel pick at 4.7 stars, with a generous plump fill and an unusually long five-year guarantee, for GBP 26.68.',
                'body' => "Silentnight's Hotel Collection aims at the plump, heavy-feeling duvet you get in a good hotel, and 6,741 ratings at 4.7 stars suggest it lands. It is a 13.5 tog duvet with a sumptuously soft cover and a generous fill that holds its loft rather than flattening after a few months, which is the usual complaint with cheap bedding.

The standout on paper is the guarantee: five years on the duvet, where most rivals here offer two. For a duvet costing GBP 26.68 that is a real signal about expected life.

It is machine washable at 40 degrees and made in the UK. There is nothing much against it beyond price — a few pounds more than the plainest Silentnight duvets — and the fact that, like the rest of the synthetic duvets here, it is bulkier than a natural filling of the same warmth.",
                'pros' => ['4.7 stars over 6,741 ratings', 'Plump hotel-style fill that holds its loft', 'Five-year guarantee, the longest here', 'Machine washable at 40 degrees, made in the UK', '13.5 tog, standard winter warmth'],
                'contras' => ['A few pounds more than the plainest Silentnight duvets', 'Bulkier than a natural duvet of the same tog', 'Synthetic filling', 'Double size on this listing'],
                'specs' => [
                    ['label' => 'Guarantee', 'value' => '5 years', 'verdict' => 'good', 'note' => 'The longest on this page.'],
                    ['label' => 'Average score', 'value' => '4.7 stars', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '6,741', 'verdict' => 'good'],
                    ['label' => 'Tog', 'value' => '13.5', 'verdict' => 'good'],
                    ['label' => 'Fill', 'value' => 'Generous, hotel style', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£26.68', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Slumberdown Feels Like Down King Size Duvet, 13.5 Tog',
                'price' => '£22.99',
                'rating' => 4.6,
                'reviews_count' => 3301,
                'image' => 'https://m.media-amazon.com/images/I/81K1hYS0KzL._AC_SL1500_.jpg',
                'alt_text' => 'Slumberdown Feels Like Down 13.5 tog king duvet',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B086FQV3L9?tag=ranked10-21',
                'summary' => 'A down-like feel without the price or the care requirements of real down. King size, 13.5 tog, 3,301 ratings, for GBP 22.99.',
                'body' => "This is the duvet for anyone who likes the soft, cloud-like feel of down but does not want to pay for it or hand-wash it. Slumberdown fills it with ultra-soft fibres designed to mimic down's softness while staying fully machine washable and non-allergenic, at 13.5 tog for winter, in a generous king size of 225 x 220cm for GBP 22.99.

With 3,301 ratings at 4.6 stars it is well proven, made in the UK, and comes with a two-year quality guarantee.

The honest limitation is that a down-alternative fibre still is not down: it does not drape around you or trap heat for its weight the way the goose feather and down duvet further down this list does. What you get instead is most of the softness for a third of the price and none of the dry-cleaning.",
                'pros' => ['Down-like softness with none of the care requirements', '3,301 ratings at 4.6 stars for GBP 22.99', 'Generous king size, 225 x 220cm', 'Fully machine washable and non-allergenic', 'Made in the UK with a two-year guarantee'],
                'contras' => ['Does not drape or insulate like real down', 'Bulkier than a natural duvet at the same tog', '4.6 stars, below the Silentnight picks', 'One tog rating only'],
                'specs' => [
                    ['label' => 'Feel', 'value' => 'Down-like fibre', 'verdict' => 'good'],
                    ['label' => 'Tog', 'value' => '13.5', 'verdict' => 'good'],
                    ['label' => 'Size', 'value' => 'King 225 x 220cm', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '3,301 at 4.6 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£22.99', 'verdict' => 'good'],
                    ['label' => 'Care', 'value' => 'Machine washable', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'Silentnight Deep Sleep 13.5 Tog King Size Duvet',
                'price' => '£22.99',
                'rating' => 4.7,
                'reviews_count' => 2579,
                'image' => 'https://m.media-amazon.com/images/I/71o8KmK1WML._AC_SL1500_.jpg',
                'alt_text' => 'Silentnight Deep Sleep 13.5 tog king duvet',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B075WZ4D4S?tag=ranked10-21',
                'summary' => 'A 4.7-star Silentnight king-size duvet at GBP 22.99 — the cheapest way into the brand at that rating.',
                'body' => "The Deep Sleep is Silentnight's plainly-named winter duvet and it does the job with no fuss: 13.5 tog, generously filled, hypoallergenic, machine washable and made in the UK, with 2,579 ratings at 4.7 stars. At GBP 22.99 in king size it is the cheapest route to a 4.7-star duvet on this page.

If you want a straightforward, warm, washable winter duvet from a name people trust and do not care about hotel-style plumpness, allergy treatments or all-season flexibility, this covers it and nothing more.

It sits below the Warm & Cosy simply on review volume, and below the Hotel Collection on guarantee length. Otherwise the differences between these Silentnight duvets are small, so buying whichever is cheapest in your bed size on the day is a perfectly sensible strategy.",
                'pros' => ['4.7 stars over 2,579 ratings', 'Cheapest 4.7-star duvet here at GBP 22.99', 'King size, 13.5 tog, generously filled', 'Hypoallergenic and machine washable', 'Made in the UK'],
                'contras' => ['Fewer ratings than the other Silentnight duvets', 'Shorter guarantee than the Hotel Collection', 'No allergy treatment or all-season option', 'Plain specification'],
                'specs' => [
                    ['label' => 'Average score', 'value' => '4.7 stars', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£22.99 (king)', 'verdict' => 'good'],
                    ['label' => 'Tog', 'value' => '13.5', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '2,579', 'verdict' => 'neutral'],
                    ['label' => 'Care', 'value' => 'Machine washable', 'verdict' => 'good'],
                    ['label' => 'Filling', 'value' => 'Microfibre', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Lancashire Bedding 16.5 Tog Winter Duvet, Hollowfibre Cotton Blend',
                'price' => '£44.99',
                'rating' => 4.6,
                'reviews_count' => 1399,
                'image' => 'https://m.media-amazon.com/images/I/71xd6d8XlaL._AC_SL1500_.jpg',
                'alt_text' => 'Lancashire Bedding 16.5 tog extra warm winter duvet',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01618U9SM?tag=ranked10-21',
                'summary' => 'The warmest duvet here at 16.5 tog. For a genuinely freezing bedroom, or for keeping the heating off a little longer.',
                'body' => "At 16.5 tog this is the warmest duvet in the comparison, three tog above the standard winter rating, and it exists for a specific situation: a bedroom that is genuinely cold. A draughty old house, an uninsulated loft room, or simply wanting to keep the heating turned down through the winter. It has 1,399 ratings at 4.6 stars.

The hollowfibre and cotton-blend construction is designed to hold heat while still breathing, with even stitching to stop the filling clumping into cold spots, and it comes in single through to super king. It is machine washable, which a duvet this thick very much needs to be.

Two caveats. It is GBP 44.99, double the price of the budget picks, and 16.5 tog is a lot of duvet: in a centrally heated modern bedroom it will be far too warm, and you will end up sleeping with a leg out. Buy it for a cold room, not as a default.",
                'pros' => ['16.5 tog, the warmest duvet in this comparison', 'Built for genuinely cold or draughty bedrooms', 'Even stitching to prevent cold spots', 'Available from single to super king', 'Machine washable despite the thickness'],
                'contras' => ['Far too warm for a well-heated bedroom', 'GBP 44.99, double the budget picks', 'Thick and bulky to store', 'Listing is padded with keyword phrases'],
                'specs' => [
                    ['label' => 'Tog', 'value' => '16.5', 'verdict' => 'good', 'note' => 'The warmest here; only for cold rooms.'],
                    ['label' => 'Filling', 'value' => 'Hollowfibre cotton blend', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '1,399 at 4.6 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£44.99', 'verdict' => 'bad'],
                    ['label' => 'Sizes', 'value' => 'Single to super king', 'verdict' => 'good'],
                    ['label' => 'Care', 'value' => 'Machine washable', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'YZTEX 13.5 Tog Goose Feather and Down Double Duvet, Cotton Shell',
                'price' => '£58.99',
                'rating' => 4.4,
                'reviews_count' => 795,
                'image' => 'https://m.media-amazon.com/images/I/71ily2iYKaL._AC_SL1500_.jpg',
                'alt_text' => 'YZTEX goose feather and down 13.5 tog duvet',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B095NQ5XLM?tag=ranked10-21',
                'summary' => 'The only natural-filled duvet here: 50% goose down and 50% goose feather in a cotton shell, for the drape and warmth-for-weight synthetics cannot match.',
                'body' => "If you want the way a real down duvet drapes over you rather than sitting on top like a quilt, this is the only option on the page. It is filled with 50 percent goose down and 50 percent goose feather in a 100 percent cotton, down-proof shell, at 13.5 tog, with box stitching and double-stitched sides to stop the filling migrating into corners. Natural down traps more heat for its weight, so it feels lighter than a synthetic duvet of the same warmth.

At GBP 58.99 with 795 ratings at 4.4 stars it is the most expensive duvet here and the least reviewed of the main picks, and the cotton shell makes it more breathable than microfibre.

Two real trade-offs. Natural fill generally needs professional cleaning rather than a home wash, and feather and down is not the right choice if anyone in the bed has a feather allergy — for them the treated Silentnight Anti Allergy is the safer buy.",
                'pros' => ['50% goose down and 50% goose feather, the only natural fill here', 'Drapes around you rather than sitting on top', 'Warmer for its weight than any synthetic here', 'Breathable 100% cotton down-proof shell', 'Box stitching stops the filling migrating'],
                'contras' => ['GBP 58.99, the most expensive duvet on the page', 'Usually needs professional cleaning, not a home wash', 'Not suitable if anyone has a feather allergy', '4.4 stars on 795 ratings, the lowest of the main picks'],
                'specs' => [
                    ['label' => 'Filling', 'value' => '50% down, 50% feather', 'verdict' => 'good', 'note' => 'The only natural fill here.'],
                    ['label' => 'Shell', 'value' => '100% cotton', 'verdict' => 'good'],
                    ['label' => 'Tog', 'value' => '13.5', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£58.99', 'verdict' => 'bad', 'note' => 'The dearest here.'],
                    ['label' => 'Care', 'value' => 'Professional cleaning', 'verdict' => 'bad'],
                    ['label' => 'Customer ratings', 'value' => '795 at 4.4 stars', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'Silentnight All Seasons 3 in 1 Duvet, 4.5 Tog and 10.5 Tog Combining to 15 Tog',
                'price' => '£47.75',
                'rating' => 4.6,
                'reviews_count' => 760,
                'image' => 'https://m.media-amazon.com/images/I/71Fa9tR8OnL._AC_SL1500_.jpg',
                'alt_text' => 'Silentnight All Seasons 3 in 1 duvet',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07D47WLYR?tag=ranked10-21',
                'summary' => 'Three duvets in one: a 4.5 tog for summer, a 10.5 tog for spring and autumn, and both together for a 15 tog winter duvet.',
                'body' => "This is the buy-once option. You get two duvets that fasten together: a 4.5 tog for summer, a 10.5 tog for spring and autumn, and clipped together they make 15 tog for the depth of winter. Instead of storing a spare duvet and swapping twice a year, you add or remove a layer, which is genuinely practical in a small flat.

It uses down-like Fibadown fibres in a quilted, box-stitched cover to keep the filling in place, is hypoallergenic and made in the UK, and carries a five-year guarantee. It has 760 ratings at 4.6 stars.

The catch is the price and the maths. At GBP 47.75 it costs more than two cheap single-tog duvets would, and clipped together two layers are bulkier than one 15 tog duvet. But if you want one purchase to cover the whole year, this is the only product here that does it.",
                'pros' => ['Covers the whole year: 4.5, 10.5 and 15 tog in one purchase', 'No spare duvet to store or swap seasonally', 'Down-like Fibadown fibres, box-stitched to stay put', 'Five-year guarantee, made in the UK', 'Hypoallergenic and washable'],
                'contras' => ['GBP 47.75, dearer than two cheap duvets', 'Two clipped layers are bulkier than one duvet', '760 ratings, a smaller sample here', 'Fastening the layers together takes a minute'],
                'specs' => [
                    ['label' => 'Tog', 'value' => '4.5 + 10.5 = 15', 'verdict' => 'good', 'note' => 'Three warmths from one purchase.'],
                    ['label' => 'Guarantee', 'value' => '5 years', 'verdict' => 'good'],
                    ['label' => 'Filling', 'value' => 'Fibadown, box stitched', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£47.75', 'verdict' => 'bad'],
                    ['label' => 'Customer ratings', 'value' => '760 at 4.6 stars', 'verdict' => 'neutral'],
                    ['label' => 'Bulk', 'value' => 'Two layers in winter', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'beeweed Coverless Double Duvet 13.5 Tog, 400 GSM, Reversible',
                'price' => '£38.99',
                'rating' => 4.4,
                'reviews_count' => 530,
                'image' => 'https://m.media-amazon.com/images/I/715lH8YPRsL._AC_SL1500_.jpg',
                'alt_text' => 'beeweed coverless 13.5 tog double duvet',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FJLTY8GX?tag=ranked10-21',
                'summary' => 'A coverless duvet: no cover to wrestle on, just wash the whole thing. Reversible, 13.5 tog, with two pillow shams included.',
                'body' => "A coverless duvet is finished on the outside, so there is no duvet cover to buy, change or fight your way into — you strip the bed and wash the duvet itself. For anyone who hates changing bedding, for children's rooms, or for a guest bed you want to reset quickly, that is a real convenience, and this one is reversible between two greys so you can flip it for a change of look.

It is 13.5 tog with a 100 percent microfibre shell and a 400 GSM fill, diamond box-stitched to keep the filling even, measures 200 x 200cm, and comes with two matching pillow shams. It has 530 ratings at 4.4 stars.

It is last mainly on evidence and price: the smallest review count here and GBP 38.99, more than a conventional duvet plus a cheap cover. Buy it for the convenience of never handling a duvet cover again, not to save money.",
                'pros' => ['No duvet cover needed, wash the whole thing', 'Reversible in two colours for a quick change of look', '13.5 tog with a 400 GSM diamond-stitched fill', 'Two matching pillow shams included', 'Ideal for children or a guest bed'],
                'contras' => ['530 ratings, the smallest sample here', 'GBP 38.99, more than a duvet plus a cheap cover', 'You cannot change the look with a new cover', 'Takes longer to dry than a cover alone'],
                'specs' => [
                    ['label' => 'Type', 'value' => 'Coverless', 'verdict' => 'good', 'note' => 'No duvet cover to change.'],
                    ['label' => 'Tog', 'value' => '13.5', 'verdict' => 'good'],
                    ['label' => 'Fill weight', 'value' => '400 GSM', 'verdict' => 'neutral'],
                    ['label' => 'Included', 'value' => '2 pillow shams', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '530 at 4.4 stars', 'verdict' => 'bad', 'note' => 'The smallest sample here.'],
                    ['label' => 'Price', 'value' => '£38.99', 'verdict' => 'neutral'],
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
        $this->command?->info("WinterDuvetsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos).");
    }
}
