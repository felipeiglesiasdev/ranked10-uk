<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class WorkoutTankTopsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE REGATAS DE TREINO FEMININAS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // KEYWORDS ALVO: best workout tank tops / workout tanks for women / cropped workout top /
        // best workout tanks women's / best athletic tank tops / tank top workout shirts /
        // sleeveless gym shirts / womens white workout tank / workout tops
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'fitness',                    // SLUG DA CATEGORIA (URL) - TROQUE AQUI SE QUISER OUTRA CATEGORIA
            'name' => 'Fitness',                    // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best fitness gear and activewear available in the UK.', // DESCRICAO
        ];

        $article = [
            'slug' => 'best-workout-tank-tops-women-uk',                         // SLUG DO ARTIGO (URL)
            'title' => 'Best Workout Tank Tops for Women UK',                    // TITULO / H1
            'meta_title' => 'Best Workout Tank Tops for Women UK 2026: Top 10 Ranked', // TITLE DA ABA/GOOGLE (55 CHARS)
            'meta_description' => 'We ranked the 10 best workout tank tops for women in the UK: cropped, racerback and mesh-back gym vests compared on fabric, fit, breathability and price.', // META DESCRIPTION (~152 CHARS)
            'intro' => 'The right tank top can quietly transform a session. Get it wrong and you spend the whole class tugging at a strap or peeling damp cotton off your back; get it right and you forget you are wearing it. The best workout tank tops for women balance four things: a fabric that moves sweat away instead of soaking it up, an armhole cut that lets your shoulders travel, a hem that stays put when you bend, and a price that does not sting when you need three of them in the wash. We compared ten of the most popular workout tanks for women on Amazon UK, from a £5 athletic vest to a racerback three-pack with more than fifty thousand ratings, covering cropped workout tops, mesh-back sleeveless gym shirts and everyday tanks that double as gym layers.', // INTRO OTIMIZADA
            'conclusion' => 'There is no single winner among the best athletic tank tops, because a top for heavy lifting is not the same as one for a summer run. If you train hard and want proven kit, a racerback in technical stretch fabric with flatlock seams is the safest buy. If you run outdoors in summer, prioritise quick-dry polyester and, ideally, UPF sun protection. If you want a cropped workout top, expect to show some midriff and choose a sports bra you are happy to have on display. And if you simply want a womens white workout tank that also works under a blazer, a multipack of soft, breathable everyday tanks will stretch further than one technical top. Buy for the session you actually do most often, and check the size chart before you order: several of these run UK-specific.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => now(),                                             // DATA DE PUBLICACAO
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'BQTQ Square Neck Tank Tops, 5-Pack, Sleeveless Vest Tops',                // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£30.11',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.0,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 4704,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71yVgLvXT6L._AC_SX342_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'BQTQ five pack of square neck sleeveless tank tops in five colours',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/3SWtQJU',                                       // LINK AFILIADO
                'summary' => 'Five square-neck tanks for roughly £6 each, in black, white, grey, coffee and army green — the easiest way to fill a drawer with tops that work in the gym and out of it.', // TEXTO CURTO (CARD)
                'body' => 'This BQTQ multipack is the practical choice rather than the technical one. You get five square-neck sleeveless tops in black, white, grey, coffee and army green, which works out at around six pounds per top and means you always have a clean one ready. If you have been hunting for a womens white workout tank that does not cost fifteen pounds on its own, this is the cheapest sensible route to it.

The fabric is 95 per cent viscose with 5 per cent spandex: soft, highly elastic, breathable and moisture-wicking, with a square neckline that BQTQ pitches as more flattering than a plain crew. It stretches and it breathes, but it is worth being clear that this is a comfortable everyday fabric rather than the technical polyester you get in a purpose-built gym tank.

That makes it a layering and light-training top rather than a heavy-lifting one. BQTQ positions it exactly that way, pairing it with jeans for daily wear and with leggings for workouts, and the five plain colours go with almost anything. Sizes run S to XXL, and BQTQ specifically asks you to check the size table before ordering.', // TEXTO SEO LONGO
                'pros' => ['Five tops for about £6 each', 'Includes black and white staples', 'Soft 95% viscose with 5% spandex stretch', 'Square neck works in and out of the gym'], // PONTOS POSITIVOS
                'contras' => ['Lowest rating here at 4.0', 'Viscose blend, not a technical performance fabric'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'SUUKSESS Halter Tank Top with Built-in Bra, Ribbed V-Neck',               // NOME (ENCURTADO)
                'price' => '£17.45',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 221,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/612wcKsmEGL._AC_SX342_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'SUUKSESS ribbed halter tank top with built-in bra and open back',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/4wyoVgP',                                       // LINK AFILIADO
                'summary' => 'A ribbed halter with a genuine built-in bra: removable padding, a double-layered chest and medium support, so you can skip a separate sports bra for lighter sessions.', // TEXTO CURTO (CARD)
                'body' => 'The appeal here is simple: one layer instead of two. The SUUKSESS halter has a proper built-in bra with removable padding and a double-layered chest panel that holds its shape, giving medium support and coverage, and SUUKSESS states it is not see-through. For yoga, pilates, a walk or a warm day, that means you can leave the sports bra in the drawer.

It is cut as a slim-fit sleeveless top with a ribbed V-neck, a halter neck and an open back, so it reads as a lifestyle piece as much as a training one. The fabric is a premium cotton blend with four-way stretch, which SUUKSESS describes as soft and breathable enough for all-day comfort.

Two things to check before you buy. First, medium support means exactly that: it is well suited to low-impact work, not to running or high-intensity intervals where you want a dedicated sports bra. Second, the sizing is mapped explicitly to UK sizes, with XS as a UK 6, S a UK 8, M a UK 10, L a UK 12 and XL a UK 14, so use that chart rather than guessing from a US label.', // TEXTO SEO LONGO
                'pros' => ['Built-in bra with removable padding', 'Double-layered chest holds its shape', 'Four-way stretch cotton blend', 'Clear UK size mapping'], // PONTOS POSITIVOS
                'contras' => ['Medium support only, so not for running or HIIT', 'Only 221 ratings so far'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'Zeagoo V-Neck Cami Tank Top, Spaghetti Strap, Loose Fit',                 // NOME (ENCURTADO)
                'price' => '£10.90',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 228,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/710osvyrPBL._AC_SX342_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Zeagoo loose fit V neck cami tank top with spaghetti straps',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/4eUNjU0',                                       // LINK AFILIADO
                'summary' => 'A featherweight loose cami with a V-neck and open back that Zeagoo pitches for yoga, running and badminton as much as for the beach.', // TEXTO CURTO (CARD)
                'body' => 'Not every session needs technical kit. The Zeagoo is a lightweight, stretchy cami in a soft, skin-friendly fabric that Zeagoo describes as breathable and cool enough that you do not end up sweaty in it, which is the whole point in a British heatwave.

The cut is the draw: delicate spaghetti straps, a flattering V-neckline, a loose body and an open back. That makes it airy on a mat and easy to move in, and Zeagoo lists yoga, running and badminton alongside the beach and the office as places it belongs. Worn alone it is a summer top; layered under a blazer or a cardigan it carries into autumn.

Be realistic about what those thin straps can do. There is no built-in support and the loose fit means it will move around, so this is a low-impact and lifestyle tank rather than something for heavy training. Zeagoo also advises checking the size chart and sizing up if you want the fully relaxed look.', // TEXTO SEO LONGO
                'pros' => ['Lightweight, breathable and cool for summer', 'Loose fit with an open back', 'Doubles as a layering piece under a blazer', 'Under £11'], // PONTOS POSITIVOS
                'contras' => ['Spaghetti straps offer no support', 'Best for yoga and low-impact rather than the gym floor'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'Fruit of the Loom Ladies Valueweight Athletic Vest',                      // NOME (ENCURTADO)
                'price' => '£5.45',                                                                  // PRECO (DA PLANILHA)
                'rating' => 4.1,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 584,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61HIxAvZMUL._AC_SX385_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Fruit of the Loom ladies fit sleeveless athletic vest tank top',      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/4w2MyhS',                                       // LINK AFILIADO
                'summary' => 'At £5.45 this is the cheapest tank here by some distance: a plain, feminine-fit athletic vest from a brand everyone already owns something from.', // TEXTO CURTO (CARD)
                'body' => 'Sometimes you just need a vest. The Fruit of the Loom Valueweight athletic vest costs less than a coffee and a pastry, and it does the obvious things properly: a feminine fit with side seams rather than a boxy unisex cut, and neck and armhole binding in the same colour as the body so it looks finished rather than cheap.

It is built as a printable blank, which explains the one unusual spec on the listing: a higher mesh density for better printing results. If you run a club, a class or a small brand, that is exactly what you want. The fabric weight is 160 grams per square metre in white and 165 in the coloured versions, so it is a mid-weight vest rather than a flimsy one.

What you do not get is technical performance. The listing does not state a fabric composition, and there is no mention of moisture-wicking, mesh panels or four-way stretch. Treat it as a gym-bag basic, a summer layer or a print-ready blank, not as a top for a heavy sweat session.', // TEXTO SEO LONGO
                'pros' => ['By far the cheapest at £5.45', 'Feminine fit with proper side seams', 'Neck and armholes bound in matching colour', 'Ideal blank for printing club or class kit'], // PONTOS POSITIVOS
                'contras' => ['No stated fabric composition or moisture-wicking', 'A basic blank rather than a performance top'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'Cropped Workout Tank Top, Mesh Fabric, Loose Fit Gym Vest',               // NOME (ENCURTADO)
                'price' => '£14.00',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.2,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 654,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/614OkRkqz7L._AC_SX342_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Cropped sleeveless mesh workout tank top with roomy armholes',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/4h2Q1rN',                                       // LINK AFILIADO
                'summary' => 'The cropped workout top of the group: an airy mesh blend with deliberately roomy armholes, cut short and loose so nothing clings when you lift.', // TEXTO CURTO (CARD)
                'body' => 'If you have been searching for a cropped workout top rather than a full-length vest, this is the one in our list built for it. The cut is short and loose, so it skims rather than clings, and the deliberately roomy armhole opens up the shoulder and shows off the back while giving you free movement overhead.

The fabric does the work. It is a mesh blend of 52 per cent nylon, 42 per cent polyester and 6 per cent spandex, which the maker describes as soft, stretchy and breathable. Mesh plus a loose cut means air keeps moving over your skin, which is why this style has become the default for hot studios and summer sessions.

It is pitched at exercise, yoga, running, the gym and any other type of workout, and it works just as well over a sports bra on a hot walk. Two honest caveats: a cropped, roomy-armhole design means your sports bra is part of the outfit whether you planned it or not, and the maker asks you to check the size chart before ordering.', // TEXTO SEO LONGO
                'pros' => ['Genuine cropped cut for hot sessions', 'Breathable mesh with 6% spandex stretch', 'Roomy armholes for full overhead movement', 'Loose fit that does not cling'], // PONTOS POSITIVOS
                'contras' => ['Cropped length will not suit everyone', 'Open armholes put your sports bra on show'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'Mesh Back Gym Tank Top, Quick-Dry, Loose Fit Sportswear',                 // NOME (ENCURTADO)
                'price' => '£11.66',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 141,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71NFlSUQTIL._AC_SX342_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Loose fit sleeveless gym top with breathable mesh back panel',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/44lAonW',                                       // LINK AFILIADO
                'summary' => 'A mesh back panel puts ventilation exactly where you sweat most, making this one of the better-value sleeveless gym shirts for HIIT and hot rooms.', // TEXTO CURTO (CARD)
                'body' => 'Most sleeveless gym shirts cool your arms and forget your back. This one does not: an airy mesh panel runs across the back to pull heat out during the parts of a session where you are bent over a bench or a mat, which is precisely where a solid polyester top turns into a sauna.

The fabric is a 92 per cent polyester and 8 per cent elastane blend, which the maker positions for stretch, softness and durability, and it is moisture-wicking and fast-drying. In practice that means sweat moves off your skin and the top does not stay heavy for the rest of the class. It is pitched at running, yoga, HIIT and weight training, and the lightweight fabric makes it a sensible pick for summer training indoors or out.

The silhouette is relaxed rather than compressive, which flatters most shapes and gives you a full range of motion, and it pairs with any leggings or shorts you already own. It is a strong package for under twelve pounds, though with only 141 ratings it is less proven than the big sellers here, and a loose cut inevitably gives you less hold than a fitted tank.', // TEXTO SEO LONGO
                'pros' => ['Mesh back panel where you sweat most', '92% polyester with 8% elastane for stretch', 'Quick-dry and moisture-wicking', 'Under £12'], // PONTOS POSITIVOS
                'contras' => ['Only 141 ratings so far', 'Loose fit gives less hold than a fitted tank'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'Urban Classics Ladies Asymmetric One-Shoulder Tank Top',                  // NOME (ENCURTADO)
                'price' => '£15.06',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.2,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 260,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61IlzL3fl7L._AC_SY445_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Urban Classics asymmetric one shoulder tank top in black',            // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/3R8Pg66',                                       // LINK AFILIADO
                'summary' => 'The style pick: a single-strap asymmetric top from a streetwear label, made to be worn as a base layer for training or for the street.', // TEXTO CURTO (CARD)
                'body' => 'Urban Classics is a streetwear label, and the Lady Asymmetric Top (model TB2608) reads that way. It is cut with a single support on the right shoulder, leaving the left bare, which is a deliberate design statement rather than a performance feature.

Urban Classics itself describes it as a women\'s sports top that works as a base for streetwear or for sport, and that dual purpose is the honest way to think about it. Over a sports bra it is a training top; under a jacket it is an outfit. It comes in black and white, the two colours that go with everything.

The one specification worth knowing is the low elastane content, which gives a slight stretch feel rather than the four-way stretch of a technical tank. Combined with the asymmetric cut, that makes it better suited to lifting, walking and studio work than to running, where a single strap and limited stretch are not what you want.', // TEXTO SEO LONGO
                'pros' => ['Distinctive asymmetric single-strap cut', 'Works as streetwear and as a training base layer', 'Available in black and white', 'Established streetwear brand'], // PONTOS POSITIVOS
                'contras' => ['Low elastane content means limited stretch', 'Single strap suits studio work more than running'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'icyzone Racerback Workout Tank Tops, 3-Pack, Tech Stretch',               // NOME (ENCURTADO)
                'price' => '£29.17',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 51918,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/812q0QnOrEL._AC_SX342_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'icyzone three pack of heathered racerback workout tank tops',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/4vRODgf',                                       // LINK AFILIADO
                'summary' => 'The most trusted pick by a mile: more than fifty thousand ratings for a three-pack of racerback tanks in tech stretch fabric with chafe-reducing flatlock seams.', // TEXTO CURTO (CARD)
                'body' => 'Nothing else in this ranking comes close on evidence. The icyzone racerback has gathered more than fifty-one thousand customer ratings at a 4.4 average, which makes it the most road-tested option among the best workout tanks for women you can buy on Amazon UK. When that many people keep buying the same tank, the fit is usually right.

It is a proper training garment. You get a three-pack of heathered racerback tanks in tech stretch fabric, with a crew neck, a printed tag at the back neck instead of a scratchy label, and flatlock seams that minimise chafing. The hem and rim are firmly sewn, which is the difference between a tank that survives fifty washes and one that curls at the edge after ten. The racerback cut keeps the straps clear of your shoulders under a barbell or a backpack.

icyzone pitches it at everything from yoga and CrossFit to spinning, training, running and hiking, and three tops means you can train three times before laundry day. Sizing is mapped to UK equivalents, from XS at UK 4-6 through to XXL at UK 18-20, and icyzone flags that the fit is slightly tight, so size up if you prefer a relaxed cut.', // TEXTO SEO LONGO
                'pros' => ['Over 51,000 customer ratings', 'Flatlock seams minimise chafing', 'Racerback keeps straps clear under a bar', 'Three tops in the pack'], // PONTOS POSITIVOS
                'contras' => ['Runs slightly tight, so size up for a relaxed fit', 'Sold only as a three-pack'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'PINSPARK Sports Tank Top, UPF 50+, Quick-Dry, Tag-Free',                  // NOME (ENCURTADO)
                'price' => '£15.16',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 80,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61w13D9XofL._AC_SY445_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'PINSPARK relaxed fit sleeveless sports tank top with curved hem',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/4h6zpzn',                                       // LINK AFILIADO
                'summary' => 'The highest-rated top in our list at 4.7, and the only one with UPF 50+ sun protection — the pick for outdoor running and summer training.', // TEXTO CURTO (CARD)
                'body' => 'This PINSPARK holds the best score in the ranking, a 4.7 average, and it earns it with one feature nothing else here offers: UPF 50+ sun protection that blocks harmful UVA and UVB rays. If you run, cycle or train outdoors through a British summer, that turns a tank top into kit rather than just clothing.

The fabric is 95 per cent polyester with 5 per cent spandex, so it is quick-drying, soft and stretchy against the skin, and it keeps you dry through a session. PINSPARK has also gone tag-free, heat-pressing the care information under the inner collar so there is nothing to rub raw on a long run. The cut is relaxed and hip-length with a curved hem, which gives coverage when you bend without adding bulk.

It is also the most thoughtfully made top here. The fabric is ISCC PLUS certified sustainable, containing recycled and bio-based materials, and it is machine washable without losing its shape. The only real caveat is exposure: with 80 ratings it is far less proven than the icyzone, and the relaxed hip-length cut is not the fitted gym silhouette some people are after.', // TEXTO SEO LONGO
                'pros' => ['Highest rating here at 4.7', 'UPF 50+ blocks UVA and UVB rays', 'Tag-free heat-pressed collar prevents chafing', 'ISCC PLUS certified sustainable fabric'], // PONTOS POSITIVOS
                'contras' => ['Only 80 ratings so far', 'Relaxed hip-length cut is not a fitted gym look'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'PINSPARK Open Back Workout Tank Top, Racerback Yoga Vest',                // NOME (ENCURTADO)
                'price' => '£12.89',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.0,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 32,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/81lLCb2LxoL._AC_SX342_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'PINSPARK open cross back sleeveless workout tank top',                // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://amzn.to/3TqUTx6',                                       // LINK AFILIADO
                'summary' => 'A cross-back cut designed to skim rather than cling, with large armholes and a banded neckline made for layering over a sports bra.', // TEXTO CURTO (CARD)
                'body' => 'The last of our tank top workout shirts leans on one idea: the open cross-back. PINSPARK designs it to skim over the torso and slim the silhouette without restricting your body shape, and the crossed straps sit clear of the shoulders in the same way a racerback does.

The detailing is sensible for training. Large armholes and a sleeveless cut give full mobility overhead, a curved hem adds coverage when you fold forward, and the banded crew neckline keeps its shape rather than stretching out. PINSPARK explicitly designs it to layer over a sports bra, which is how most people will wear it.

The fabric is 100 per cent polyester: comfortable against the skin and breathable, and easy to throw in the wash after fitness, yoga, running, cycling or tennis. That also means there is no elastane in the blend, so you get less give than the stretch-blend tops higher up this list, and with just 32 ratings it is the least proven top in the ranking.', // TEXTO SEO LONGO
                'pros' => ['Open cross-back keeps straps off the shoulders', 'Large armholes for full overhead movement', 'Curved hem gives extra coverage', 'Designed to layer over a sports bra'], // PONTOS POSITIVOS
                'contras' => ['100% polyester with no elastane, so less stretch', 'Only 32 ratings, the least proven here'], // PONTOS NEGATIVOS
            ],
        ];

        // ═══════════════════════════════════════════════════════════════
        // ═══ FIM DA AREA EDITAVEL ═══
        // ═══════════════════════════════════════════════════════════════

        $categoryModel = Category::updateOrCreate(['slug' => $category['slug']], $category); // CRIA/ATUALIZA A CATEGORIA (NAO DUPLICA)
        $articleModel = Article::updateOrCreate(['slug' => $article['slug']], array_merge($article, ['category_id' => $categoryModel->id])); // CRIA/ATUALIZA O ARTIGO (NAO DUPLICA)
        $articleModel->products()->delete(); // REMOVE OS PRODUTOS ANTIGOS DESTE ARTIGO PARA REFLETIR EDICOES SEM DUPLICAR
        foreach ($products as $produto) { // PERCORRE A LISTA MANUAL DE PRODUTOS
            $articleModel->products()->create($produto); // RECRIA CADA PRODUTO VINCULADO AO ARTIGO
        }
        $this->command?->info("WorkoutTankTopsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
