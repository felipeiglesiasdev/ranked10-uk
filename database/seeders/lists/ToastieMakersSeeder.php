<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class ToastieMakersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE SANDUICHEIRAS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=toastie+maker+sandwich&rh=p_36%3A1500-  (20 ASINS, 10 FICHAS ABERTAS)
        // CATEGORIA KITCHEN (COMISSAO 5%). SAZONAL: SOBE NO OUTONO/INVERNO (comida quente barata).
        //
        // PADRAO EDITORIAL (30/08): E UM TOP 10, NAO ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── EIXOS DE COMPRA ───
        //   PLACA CUT & SEAL (corta em 2 triangulos e sela a borda; recheio nao vaza) x PLACA CHATA/PANINI
        //     (aceita ciabatta, wrap, panini — mas nao sela).
        //   DEEP FILL = espaco para recheio grosso. PLACAS REMOVIVEIS = vao na maquina de lavar e trocam por waffle.
        //   CAPACIDADE 2 x 4 fatias. POTENCIA 750-900W (aquece mais rapido).
        //   MICRO-ONDAS (Morphy Richards Mico) = sem tomada, sem placa quente — outra categoria de uso.
        //   ⚠ FORA DA LISTA: GEORGE FOREMAN e grelhas de contato (outra categoria).
        //
        // ⚠ POOL COMPARTILHADO: BREVILLE DEEP FILL (B0943BT5GG) e ULTIMATE DEEP FILL (B08927TWYR) = 10.135 cada.
        //   SAO MODELOS DIFERENTES (o Ultimate tem placas removiveis + waffle) MAS DIVIDEM AVALIACAO. SINALIZADO.
        //
        // PROFUNDIDADE (FICHA): 14.891 / 10.135 / 10.135 / 5.887 / 5.613 / 4.590 / 3.398 / 3.055 / 1.197 / 1.035.
        //
        // FOCUS KEYWORD: best toastie maker
        // VARIACOES: toastie maker / sandwich toaster / deep fill toastie maker / panini press /
        // best sandwich maker uk / 4 slice toastie maker / cheese toastie machine / toastie maker removable plates
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',
            'name' => 'Kitchen',
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.',
        ];

        $article = [
            'slug' => 'best-toastie-maker',
            'title' => 'Best Toastie Maker 2026: 10 Sandwich Toasters Ranked',
            'meta_title' => 'Best Toastie Maker 2026: 10 Sandwich Toasters Ranked',
            'meta_description' => 'The best toastie maker picks for UK kitchens, from Breville deep fill to panini presses. Ten sandwich toasters compared on plates, capacity and price.',
            'focus_keyword' => 'best toastie maker',

            'intro' => "If you want the short answer, the Breville Sandwich and Panini Press is the best toastie maker for most kitchens: 14,891 ratings at 4.6 stars, flat plates that take paninis, ciabatta and crumpets as well as sliced bread, and room for three sandwiches at once, for GBP 28.99. If you only want classic sealed toasties, the Breville Deep Fill does that for GBP 19.12.

The choice comes down to the plates. Cut-and-seal plates press the sandwich into two triangles and crimp the edges shut, so molten cheese stays inside rather than running onto the element — that is the traditional British toastie. Flat plates, as on a panini press, take anything you can put between them, including baguettes, wraps and crumpets, but they do not seal, so a wet filling will escape. Deep fill simply means more room between the plates for a generous sandwich. After that, look for removable plates, which go in the dishwasher and often swap for waffle plates, and decide whether you need two slices or four. We compared ten on those points, plus ratings and price.",

            'conclusion' => "For most kitchens the best toastie maker here is the Breville Sandwich and Panini Press. Flat plates make it far more versatile than a sealed-toastie machine — paninis, ciabatta, tea cakes and crumpets all work — it fits three sandwiches, and it has the most reviews on the page. If you want the traditional sealed triangle, the Breville Deep Fill is under twenty pounds and does exactly that.

Decide on plates first, then cleaning. If you make toasties for a family, the Tower and the Global Gourmet both do four slices for around twenty-three pounds. If you hate scrubbing burnt cheese, pay for removable plates: the Breville Ultimate and the 3-in-1 Snack Maker take theirs out for the dishwasher and swap in waffle plates, which the fixed-plate machines cannot do. And if you want a toastie without another appliance on the worktop, the Morphy Richards Mico makes one in the microwave with nothing to plug in at all.",

            'author' => 'Felipe Iglesias',
            'published_at' => '2026-09-02 21:00:00',
        ];

        $products = [
            [
                'position' => 1,
                'name' => 'Breville Sandwich and Panini Press, 3-Slice, Flat Plates, Stainless Steel',
                'price' => '£28.99',
                'rating' => 4.6,
                'reviews_count' => 14891,
                'image' => 'https://m.media-amazon.com/images/I/71bvRM6t5OL._AC_SL1500_.jpg',
                'alt_text' => 'best toastie maker',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0048EJQBS?tag=ranked10-21',
                'summary' => 'The best toastie maker for most kitchens. 14,891 ratings at 4.6 stars, flat plates that take paninis and crumpets as well as toasties, and room for three.',
                'body' => "Fourteen thousand eight hundred and ninety-one ratings at 4.6 stars is both the largest and the best-scoring combination on this page, and the reason is versatility. Flat non-stick plates mean this is not limited to sliced bread: paninis, ciabatta, tea cakes, crumpets, pittas, flour tortillas and wraps all go in, so it earns its worktop space far more often than a sealed-toastie machine does.

The large plates hold up to three sandwiches at once, and a floating top plate rises to match whatever thickness you load, resting evenly on a thin sandwich or a stuffed ciabatta rather than crushing one and missing the other. It stands upright for storage, has a cool-touch handle and non-slip feet, and the aluminium plates wipe clean.

The one thing it will not do is seal. Without cut-and-seal ridges a very wet filling can escape at the edges, so if your idea of a toastie is a crimped triangle full of molten cheese, buy the Breville Deep Fill below instead. For everything else, this is the more useful machine.",
                'pros' => ['14,891 ratings at 4.6 stars, the best combination here', 'Flat plates take paninis, ciabatta, wraps and crumpets', 'Room for three sandwiches at once', 'Floating top plate adjusts to sandwich thickness', 'Stands upright, cool-touch handle, non-slip feet'],
                'contras' => ['Flat plates do not seal the edges', 'A very wet filling can escape', 'Plates are not removable for the dishwasher', 'No waffle plate option'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '14,891 at 4.6 stars', 'verdict' => 'good', 'note' => 'The most, and best rated, here.'],
                    ['label' => 'Plates', 'value' => 'Flat, panini style', 'verdict' => 'good', 'note' => 'Takes far more than sliced bread.'],
                    ['label' => 'Capacity', 'value' => '3 sandwiches', 'verdict' => 'good'],
                    ['label' => 'Top plate', 'value' => 'Floating', 'verdict' => 'good', 'note' => 'Adjusts to thickness.'],
                    ['label' => 'Cut and seal', 'value' => 'No', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£28.99', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Breville Deep Fill Toastie Maker, 2 Slice, Cut and Seal Plates',
                'price' => '£19.12',
                'rating' => 4.4,
                'reviews_count' => 10135,
                'image' => 'https://m.media-amazon.com/images/I/61btNyV+VSS._AC_SL1500_.jpg',
                'alt_text' => 'Breville Deep Fill toastie maker sandwich toaster',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0943BT5GG?tag=ranked10-21',
                'summary' => 'The classic sealed toastie, done properly and cheaply. Cut-and-seal deep fill plates for GBP 19.12, with 10,135 ratings.',
                'body' => "This is the machine most people picture when they say toastie maker. The cut-and-seal system slices the sandwich into two triangles and crimps the edges closed, so the cheese stays where it belongs instead of welding itself to the element, and the deep-fill plates leave room for a proper amount of filling rather than a mean smear.

Full-walled plates catch any overspill, a ready-to-cook indicator light tells you when it is hot enough rather than leaving you guessing, and it stands upright for storage with a cool-touch handle and cord wrap. At GBP 19.12 with 10,135 ratings at 4.4 stars, it is the cheapest way to a well-made sealed toastie.

Two things to know. The plates are fixed, so cleaning is a damp cloth on a warm machine rather than a dishwasher cycle. And it shares its rating pool with the pricier Ultimate model below, so the reviews describe both machines rather than this one alone.",
                'pros' => ['Cut and seal makes proper crimped triangles', 'Deep fill plates leave room for real fillings', '10,135 ratings at 4.4 stars for GBP 19.12', 'Ready-to-cook indicator light', 'Stands upright with cord wrap and cool-touch handle'],
                'contras' => ['Fixed plates, no dishwasher cleaning', 'Shares its rating pool with the Ultimate model', 'Two slices only', 'Sealed plates will not take ciabatta or wraps'],
                'specs' => [
                    ['label' => 'Plates', 'value' => 'Cut and seal, deep fill', 'verdict' => 'good', 'note' => 'The classic sealed triangle.'],
                    ['label' => 'Price', 'value' => '£19.12', 'verdict' => 'good', 'note' => 'Cheapest Breville here.'],
                    ['label' => 'Customer ratings', 'value' => '10,135 at 4.4 stars', 'verdict' => 'good', 'note' => 'Shared with the Ultimate.'],
                    ['label' => 'Removable plates', 'value' => 'No', 'verdict' => 'bad'],
                    ['label' => 'Capacity', 'value' => '2 slices', 'verdict' => 'neutral'],
                    ['label' => 'Indicator', 'value' => 'Ready-to-cook light', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Breville Ultimate Deep Fill Toastie Maker, Removable Plates, Waffle Option',
                'price' => '£29.00',
                'rating' => 4.4,
                'reviews_count' => 10135,
                'image' => 'https://m.media-amazon.com/images/I/91i5WqjbqTL._AC_SL1500_.jpg',
                'alt_text' => 'Breville Ultimate Deep Fill toastie maker with removable plates',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08927TWYR?tag=ranked10-21',
                'summary' => 'The one to buy if you hate scrubbing. Removable dishwasher-safe plates that swap for waffle plates, plus 20 percent more filling room.',
                'body' => "The Ultimate takes the standard Breville toastie maker and fixes its two weaknesses. The plates come out, so burnt-on cheese goes in the dishwasher instead of being scraped off a hot machine with a cloth, and they swap for waffle plates, turning the same appliance into a waffle maker. Breville also gives it 20 percent more filling space than its other toastie makers, which is the difference between a sandwich and a proper meal.

It keeps the cut-and-seal system for sealed triangles and the ready-to-cook indicator, stands upright for storage, and has 10,135 ratings at 4.4 stars.

At GBP 29.00 it costs around ten pounds more than the standard Deep Fill for the same toastie, so the question is simply whether removable plates and the waffle option are worth that to you. If you make toasties often, the cleaning alone justifies it; if you make them occasionally, the cheaper model above is the same sandwich.",
                'pros' => ['Removable plates go in the dishwasher', 'Plates swap to make waffles', '20 percent more filling room than other Breville toastie makers', 'Cut and seal for proper sealed triangles', '10,135 ratings at 4.4 stars'],
                'contras' => ['GBP 29.00, ten pounds more than the standard Deep Fill', 'Shares its rating pool with that cheaper model', 'Two slices only', 'Waffle plates may be a separate purchase depending on the bundle'],
                'specs' => [
                    ['label' => 'Removable plates', 'value' => 'Yes, dishwasher safe', 'verdict' => 'good', 'note' => 'The main reason to pay more.'],
                    ['label' => 'Waffle plates', 'value' => 'Swappable', 'verdict' => 'good'],
                    ['label' => 'Fill depth', 'value' => '20% more room', 'verdict' => 'good'],
                    ['label' => 'Plates', 'value' => 'Cut and seal', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '10,135 at 4.4 stars', 'verdict' => 'good', 'note' => 'Shared with the Deep Fill.'],
                    ['label' => 'Price', 'value' => '£29.00', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Tower Deep Fill Sandwich Maker, 4 Pocket Moulds, 900W, 3-Year Guarantee',
                'price' => '£23.99',
                'rating' => 4.5,
                'reviews_count' => 5613,
                'image' => 'https://m.media-amazon.com/images/I/61ROI+F++qL._AC_SL1500_.jpg',
                'alt_text' => 'Tower deep fill sandwich maker with four pockets',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01E4KFWE0?tag=ranked10-21',
                'summary' => 'Four extra-deep pockets for two big sandwiches at once, a fast 900W element and a three-year guarantee, at 4.5 stars for GBP 23.99.',
                'body' => "The Tower is the pick for feeding more than one person. Four extra-deep pocket moulds make two generously filled sandwiches in a go, and a 900W element gets it up to temperature quickly and keeps it there, so the second round does not come out pale. It has 5,613 ratings at 4.5 stars.

Automatic temperature control holds the heat steady rather than cycling wildly, the non-stick coating releases cleanly, and Tower backs it with a guarantee that extends to three years on registration — longer than most rivals here offer.

The trade-offs are the usual ones for this style: fixed plates that need wiping rather than washing, and sealed pockets that will not take a ciabatta or a wrap. But as a fast, generous, well-guaranteed family toastie maker at under twenty-five pounds, it is a strong buy.",
                'pros' => ['Four extra-deep pockets, two big sandwiches at once', '900W heats fast and recovers between rounds', '5,613 ratings at 4.5 stars', 'Guarantee extends to three years on registration', 'Automatic temperature control and good non-stick'],
                'contras' => ['Fixed plates, wipe clean only', 'Sealed pockets will not take ciabatta or wraps', 'Bulkier than a two-slice machine', 'No waffle option'],
                'specs' => [
                    ['label' => 'Capacity', 'value' => '4 deep pockets', 'verdict' => 'good', 'note' => 'Two large sandwiches at once.'],
                    ['label' => 'Power', 'value' => '900W', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '5,613 at 4.5 stars', 'verdict' => 'good'],
                    ['label' => 'Guarantee', 'value' => 'Up to 3 years', 'verdict' => 'good'],
                    ['label' => 'Removable plates', 'value' => 'No', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£23.99', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Global Gourmet 4 Slice Sandwich Toaster, Deep Fill, 900W',
                'price' => '£22.99',
                'rating' => 4.5,
                'reviews_count' => 4590,
                'image' => 'https://m.media-amazon.com/images/I/71mHw6Cun9L._AC_SL1500_.jpg',
                'alt_text' => 'Global Gourmet 4 slice deep fill sandwich toaster',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07HY37JZH?tag=ranked10-21',
                'summary' => 'Four slices for GBP 22.99 with deeper-than-standard plates and 900W, at 4.5 stars over 4,590 ratings.',
                'body' => "This Sensio Home machine covers the same ground as the Tower for a pound less: four slices, meaning two full sandwiches at a time, on plates deeper than the standard sandwich toaster so a decent filling actually fits. The 900W element heats quickly, and power and ready indicator lights tell you when to load it.

It has 4,590 ratings at 4.5 stars, a compact footprint for a four-slice machine, and a non-stick coating that lets the toasties lift out cleanly.

There is nothing exotic here — fixed plates, no waffle option, no removable parts — and it sits below the Tower mainly on review count and the shorter guarantee. As a straightforward, cheap, well-rated family toastie maker, though, it does exactly what it says.",
                'pros' => ['Four slices, two full sandwiches at once, for GBP 22.99', 'Deeper plates than a standard sandwich toaster', '900W for quick heating', '4,590 ratings at 4.5 stars', 'Compact footprint for a four-slice machine'],
                'contras' => ['Fixed plates, wipe clean only', 'Shorter guarantee than the Tower', 'No waffle or panini option', 'Lesser-known brand'],
                'specs' => [
                    ['label' => 'Capacity', 'value' => '4 slices', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£22.99', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '4,590 at 4.5 stars', 'verdict' => 'good'],
                    ['label' => 'Power', 'value' => '900W', 'verdict' => 'good'],
                    ['label' => 'Removable plates', 'value' => 'No', 'verdict' => 'bad'],
                    ['label' => 'Fill depth', 'value' => 'Deeper than standard', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'Morphy Richards Mico Microwave Toastie Maker, Silicone, No Plug Needed',
                'price' => '£23.97',
                'rating' => 4.5,
                'reviews_count' => 5887,
                'image' => 'https://m.media-amazon.com/images/I/51Pw1NwxzCL._AC_SL1500_.jpg',
                'alt_text' => 'Morphy Richards Mico microwave toastie maker',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0853WGHKC?tag=ranked10-21',
                'summary' => 'A toastie without an appliance. This silicone tray makes one in the microwave, so there is nothing to plug in, preheat or find worktop space for.',
                'body' => "The Mico is a genuinely different answer to the same problem. It is a silicone microwaveable tray with a non-stick grill plate inside, so you build the sandwich, close it, and microwave it — no plug, no preheating, no hot metal appliance taking up a cupboard. Morphy Richards calls the internal plate Heatwave technology, and it browns the bread rather than steaming it soft, which is the thing cheap microwave toastie gadgets usually get wrong.

For a student room, an office kitchen, a caravan or a small flat where worktop space is the binding constraint, that is the whole appeal, and it works for croissants, bagels and paninis too. It has 5,887 ratings at 4.5 stars and goes in the dishwasher.

Be realistic about what it is: a microwave will never crisp bread quite like a hot press, and it makes one toastie at a time. But it is the only product here that needs no socket and stores in a drawer.",
                'pros' => ['No plug, no preheating, no worktop appliance', 'Browns the bread rather than steaming it soft', 'Ideal for student rooms, offices and caravans', '5,887 ratings at 4.5 stars', 'Dishwasher safe and stores in a drawer'],
                'contras' => ['A microwave cannot crisp like a hot press', 'One toastie at a time', 'Results depend on your microwave wattage', 'Not a sealed cut-and-seal triangle'],
                'specs' => [
                    ['label' => 'Type', 'value' => 'Microwave, no plug', 'verdict' => 'good', 'note' => 'The only one here needing no socket.'],
                    ['label' => 'Customer ratings', 'value' => '5,887 at 4.5 stars', 'verdict' => 'good'],
                    ['label' => 'Storage', 'value' => 'Fits a drawer', 'verdict' => 'good'],
                    ['label' => 'Capacity', 'value' => 'One at a time', 'verdict' => 'bad'],
                    ['label' => 'Crisping', 'value' => 'Less than a hot press', 'verdict' => 'neutral'],
                    ['label' => 'Care', 'value' => 'Dishwasher safe', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Salter Sandwich Toaster, Deep Fill, Removable Non-Stick Plates, 900W',
                'price' => '£24.99',
                'rating' => 4.4,
                'reviews_count' => 3055,
                'image' => 'https://m.media-amazon.com/images/I/81tke2B9FiL._AC_SL1500_.jpg',
                'alt_text' => 'Salter sandwich toaster with removable plates',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01DDG99QS?tag=ranked10-21',
                'summary' => 'Removable deep-fill plates at a mid price. A familiar UK brand, 900W, two sandwiches at a time, for GBP 24.99.',
                'body' => "Salter is a name most British kitchens recognise, and this machine's selling point is removable plates at a price well under the Breville Ultimate. Being able to lift the plates out and wash them properly is the single biggest quality-of-life difference in a toastie maker, because melted cheese on a fixed plate is a genuinely annoying job.

It makes two deep-filled toasties at a time on 900W with automatic temperature control, so it holds heat between rounds, and it is compact enough for a small kitchen. It has 3,055 ratings at 4.4 stars.

It ranks below the Breville and Tower machines on review volume rather than features, and its 4.4-star average is solid rather than outstanding. If you want removable plates from a familiar brand without paying nearly thirty pounds, this is the sensible middle option.",
                'pros' => ['Removable non-stick plates, far easier to clean', 'Familiar Salter brand at GBP 24.99', '900W with automatic temperature control', 'Two deep-filled toasties at a time', '3,055 ratings at 4.4 stars'],
                'contras' => ['Fewer ratings than the Breville and Tower machines', '4.4 stars, mid-pack here', 'No waffle plate option', 'Two slices only'],
                'specs' => [
                    ['label' => 'Removable plates', 'value' => 'Yes', 'verdict' => 'good', 'note' => 'Cheaper than the Breville Ultimate.'],
                    ['label' => 'Brand', 'value' => 'Salter', 'verdict' => 'good'],
                    ['label' => 'Power', 'value' => '900W', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '3,055 at 4.4 stars', 'verdict' => 'neutral'],
                    ['label' => 'Capacity', 'value' => '2 sandwiches', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£24.99', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Quest Toastie Maker, 2 Slice, Non-Stick, Cool Touch Handle, 750W',
                'price' => '£15.99',
                'rating' => 4.1,
                'reviews_count' => 3398,
                'image' => 'https://m.media-amazon.com/images/I/71PFDr2LKAL._AC_SL1500_.jpg',
                'alt_text' => 'Quest 2 slice toastie maker',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07ML4CT31?tag=ranked10-21',
                'summary' => 'The cheapest here at GBP 15.99. A no-frills two-slice toastie maker with 3,398 ratings — but the lowest average on the page.',
                'body' => "At GBP 15.99 this is the cheapest machine in the comparison and it makes no pretence of being anything else: two slices, non-stick plates, four non-slip feet, a cool-touch handle and 750 watts. For a first flat, a student kitchen or a spare toastie maker for a caravan, it costs less than a takeaway sandwich lunch and does the job.

It has 3,398 ratings, a large sample for something this cheap, and Quest is an established UK budget appliance brand rather than an anonymous listing.

The number to weigh is the score: 4.1 stars is the lowest average on this page, and at 750W it is also the least powerful, so it heats more slowly and browns less evenly than the 900W machines. For a few pounds more the Breville Deep Fill has 10,135 ratings at 4.4. Buy the Quest only if the lowest possible price is the point.",
                'pros' => ['Cheapest toastie maker here at GBP 15.99', '3,398 ratings, a large sample for a budget machine', 'Established UK budget brand', 'Non-slip feet and cool-touch handle', 'Simple, small and easy to store'],
                'contras' => ['4.1 stars, the lowest average on this page', '750W, the least powerful here, so slower and less even', 'Fixed plates', 'Two slices only'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£15.99', 'verdict' => 'good', 'note' => 'The cheapest here.'],
                    ['label' => 'Average score', 'value' => '4.1 stars', 'verdict' => 'bad', 'note' => 'The lowest on this page.'],
                    ['label' => 'Power', 'value' => '750W', 'verdict' => 'bad', 'note' => 'The least powerful here.'],
                    ['label' => 'Customer ratings', 'value' => '3,398', 'verdict' => 'good'],
                    ['label' => 'Removable plates', 'value' => 'No', 'verdict' => 'bad'],
                    ['label' => 'Capacity', 'value' => '2 slices', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'Breville 3-in-1 Ultimate Snack Maker, Toastie, Waffle and Panini, Removable Plates',
                'price' => '£47.98',
                'rating' => 4.3,
                'reviews_count' => 1197,
                'image' => 'https://m.media-amazon.com/images/I/91dhELHYAOL._AC_SL1500_.jpg',
                'alt_text' => 'Breville 3-in-1 Ultimate Snack Maker',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C7J4LHS5?tag=ranked10-21',
                'summary' => 'Three machines in one: deep-fill toasties, waffles and paninis, with removable plates and an adjustable-height lid — at the highest price here.',
                'body' => "If you want one appliance instead of three, this is it. Three sets of removable plates turn it into a deep-fill toastie maker with cut-and-seal, a waffle maker and a panini press, so it covers both the sealed-triangle and the flat-plate styles that the rest of this page makes you choose between. An adjustable-height lid accommodates very thick sandwiches rather than squashing them.

The plates lift out for the dishwasher, there is a ready-to-cook indicator, and it has 1,197 ratings at 4.3 stars.

Two things put it at ninth. At GBP 47.98 it is by far the most expensive machine here — more than the Breville Panini Press and Deep Fill bought together — and its 4.3-star average is a shade below the simpler Breville machines, which is common with multi-function appliances. Buy it if you genuinely want waffles as well; if you only want toasties, the cheaper Brevilles do that job just as well.",
                'pros' => ['Three plate sets: toastie, waffle and panini', 'Covers both cut-and-seal and flat-plate styles', 'All plates removable and dishwasher safe', 'Adjustable-height lid for very thick sandwiches', 'Replaces three separate appliances'],
                'contras' => ['GBP 47.98, by far the dearest here', '4.3 stars, below the simpler Breville machines', 'Storing three plate sets takes cupboard space', 'Only 1,197 ratings'],
                'specs' => [
                    ['label' => 'Versatility', 'value' => '3 plate sets', 'verdict' => 'good', 'note' => 'Toastie, waffle and panini.'],
                    ['label' => 'Removable plates', 'value' => 'Yes, all sets', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£47.98', 'verdict' => 'bad', 'note' => 'The dearest here.'],
                    ['label' => 'Customer ratings', 'value' => '1,197 at 4.3 stars', 'verdict' => 'neutral'],
                    ['label' => 'Lid', 'value' => 'Adjustable height', 'verdict' => 'good'],
                    ['label' => 'Storage', 'value' => 'Three plate sets', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Quest 4 Slice Toastie Maker, Non-Stick, Locking Clip, Cool Touch Handle',
                'price' => '£25.99',
                'rating' => 4.3,
                'reviews_count' => 1035,
                'image' => 'https://m.media-amazon.com/images/I/81UsZi7pbfL._AC_SL1500_.jpg',
                'alt_text' => 'Quest 4 slice toastie maker',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B06XXDPQ5C?tag=ranked10-21',
                'summary' => 'A four-slice Quest with a locking clip and a slim 12.5cm depth for upright storage — but the smallest review count on the page.',
                'body' => "This is Quest's family machine: four slices of triangle toasties at once on non-stick plates, with a locking clip that holds the lid shut so a well-stuffed sandwich does not force it open mid-cook. At 12.5 x 29.5 x 35cm it is slim enough to stand on end in a cupboard rather than hogging a shelf.

The cool-touch handle and indicator lights cover the basics, and at GBP 25.99 it is priced against the Tower and Global Gourmet four-slice machines.

It is last for two reasons. Its 1,035 ratings are the smallest sample on this page, and at GBP 25.99 it costs more than both four-slice rivals above while scoring 4.3 against their 4.5. The locking clip and slim storage are genuinely useful touches, but unless those specifically appeal, the Tower or Global Gourmet give you more proven machines for less money.",
                'pros' => ['Four slices at once for a family', 'Locking clip keeps the lid shut on thick sandwiches', 'Slim 12.5cm depth stores upright', 'Cool-touch handle and indicator lights', 'Established UK budget brand'],
                'contras' => ['1,035 ratings, the smallest sample here', 'Dearer than the better-rated Tower and Global Gourmet', '4.3 stars, below both four-slice rivals', 'Fixed plates, wipe clean only'],
                'specs' => [
                    ['label' => 'Capacity', 'value' => '4 slices', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '1,035 at 4.3 stars', 'verdict' => 'bad', 'note' => 'Smallest sample here.'],
                    ['label' => 'Price', 'value' => '£25.99', 'verdict' => 'bad', 'note' => 'Dearer than better-rated rivals.'],
                    ['label' => 'Lid', 'value' => 'Locking clip', 'verdict' => 'good'],
                    ['label' => 'Storage', 'value' => 'Stands upright, slim', 'verdict' => 'good'],
                    ['label' => 'Removable plates', 'value' => 'No', 'verdict' => 'bad'],
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
        $this->command?->info("ToastieMakersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos).");
    }
}
