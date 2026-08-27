<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class CordlessLeafBlowersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE SOPRADORES DE FOLHAS A BATERIA DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // COLETA: AMAZON.CO.UK EM 27/08/2026, ENTREGA EM M4 6BD (MANCHESTER), BUSCA "cordless leaf blower" FILTRADA A PARTIR DE £40.
        //
        // ═══ ACHADOS DA COLETA (O DIFERENCIAL DO ARTIGO) ═══
        // 1. "990,000 RPM" E "900,000 RPM" NOS TITULOS DE DOIS ANUNCIOS DA MESMA MARCA (YUQUESEN), COM 1.339 E 399 AVALIACOES.
        //    E FICCAO: TURBINA DE AVIAO GIRA A ~15.000 RPM. O NUMERO NAO APARECE EM NENHUM BULLET, SO NO TITULO.
        // 2. SEIS UNIDADES DIFERENTES EM DEZ ANUNCIOS: CFM, m³/min, m³/h, km/h, MPH E RPM. CONVERTIDO PARA CFM:
        //    DEWALT 450 (PROFISSIONAL, £114) · KALAMOTTI 520 (£79,99) · YUQUESEN B09 700 (£59,99).
        // 3. RUIDO E O UNICO NUMERO COMPARAVEL: DEWALT 65 dB · RYOBI 78 dB · SEYVUM 80 dB · MAKITA 81,8 dB · BOSCH 94 dB.
        // 4. CONTRADICAO DE PESO NO PROPRIO ANUNCIO: KALAMOTTI DECLARA 2,3kg, 2,4kg E 3,67kg NA MESMA PAGINA.
        //    GLOWICA 2,4kg VS 3,88kg. YUQUESEN HASIDI "1.12 lbs" (0,51kg) VS 2,2kg. SEYVUM 20V "3.4 lbs" (1,54kg) VS 2,47kg.
        // 5. ARMADILHA DO "BARE TOOL": RYOBI, BOSCH, DEWALT E MAKITA VEM SEM BATERIA E SEM CARREGADOR.
        // 6. KALAMOTTI DECLARA "Voltage 60 Volts" NUMA FERRAMENTA DE £79,99. TODOS OS OUTROS SAO 18-21V.
        //
        // ═══ CRITERIO DE CORTE ═══
        // EXCLUIDOS POR AMOSTRA INSUFICIENTE (<40 AVALIACOES): B0GTVKMKYV (7), B0H7BV194K (6), B0CL9H2HLH (7), B0HC2Q5CSK (4),
        // B0FPFNWGGM (20), B0H74BLKZH (29). O KALAMOTTI ENTROU COM 54 AVALIACOES E ESTA SINALIZADO NO TEXTO.
        //
        // ═══ VARIACOES DE PALAVRA-CHAVE TRABALHADAS NO TEXTO ═══
        // best cordless leaf blower · best cordless leaf blower on amazon · battery leaf blower · battery powered leaf blower ·
        // garden blower · cordless leaf blower with battery and charger · lightweight cordless leaf blower · quiet leaf blower ·
        // leaf blower and vacuum · best cordless leaf blower for large garden · electric leaf blower cordless
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'garden',                     // SLUG DA CATEGORIA (URL)
            'name' => 'Garden',                     // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best garden tools and outdoor equipment available in the UK.', // DESCRICAO
        ];

        $article = [
            'slug' => 'best-cordless-leaf-blower',                               // SLUG DO ARTIGO (URL) = PALAVRA-CHAVE EM formato-url
            'title' => 'Best Cordless Leaf Blower 2026: 10 Ranked on Airflow, Not RPM', // TITULO / H1 — CONTEM A PALAVRA-CHAVE
            'meta_title' => 'Best Cordless Leaf Blower 2026: Top 10 Ranked',      // TITLE DA ABA/GOOGLE (50 CHARS)
            'meta_description' => 'We ranked the best cordless leaf blower models on air volume, noise and what is actually in the box, after finding two listings claiming 990,000 RPM.', // META DESCRIPTION (~152 CHARS)
            'focus_keyword' => 'best cordless leaf blower',                      // PALAVRA-CHAVE PRINCIPAL — VIRA O ALT DO HERO
            'hero_image' => '',                                                  // SEM HERO MANUAL: A VIEW USA A FOTO DO PRODUTO #1 COMO IMAGEM SOCIAL
            'intro' => 'Two of the ten listings we pulled for this guide advertise a cordless leaf blower that spins at 990,000 and 900,000 RPM. For comparison, a jet engine turbine runs at roughly 15,000. Neither number appears anywhere in the product description, only in the title, and yet between them those two listings carry more than 1,700 customer ratings. That is the state of the category right now. In practice, shopping for the best cordless leaf blower on Amazon means reading six different units of measurement across ten products, watching three budget models claim more airflow than a professional DEWALT costing twice as much, and finding four listings that cannot agree with themselves about how much the tool weighs. So we ranked every battery leaf blower here on the three things you can actually verify: air volume converted into one common unit, measured noise in decibels, and whether a battery and charger are in the box at all.', // INTRO OTIMIZADA
            'conclusion' => 'The best cordless leaf blower for most gardens is simply the one that gives you real numbers. Air volume, measured in CFM or cubic metres per minute, is what shifts wet leaves off a lawn. Air speed in miles per hour, by contrast, mostly makes noise, and RPM on a garden blower is pure marketing. Decibels are the most useful figure on any of these listings because they are the hardest to inflate, and here they range from 65 dB to 94 dB, which is the difference between a quiet leaf blower you can run on a Sunday morning and one your neighbours will remember. Above all, check the box contents twice before you order. Four of the ten models in this guide arrive with no battery and no charger, and the cheapest headline price in the entire search belongs to one of them. If you want a cordless leaf blower with battery and charger included, the mid-priced kits work out cheaper than the famous names once you add everything up.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-27 11:00:00',                             // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'DEWALT DCMBL562N 18V XR Brushless Blower',                                 // NOME
                'price' => '£114.00',                                                                // PRECO NA COLETA
                'rating' => 4.7,                                                                     // NOTA (MAIOR DA LISTA)
                'reviews_count' => 724,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71O39FadZiL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'DEWALT 18V XR brushless cordless leaf blower in black and yellow',     // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08HY3VBF7?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only battery leaf blower here that publishes a complete, internally consistent specification: 450 CFM, 200 km/h, a brushless motor and 65 dB, making it the quietest in the guide by 13 decibels.', // TEXTO CURTO DO CARD
                'body' => 'This is the reference point for the whole category, and the reason is not the badge on the side. It is the only listing in this guide where every published figure agrees with every other one. Air volume is given as 12.7 cubic metres per minute in the title and 450 CFM in the specification table, and those are simply the same number expressed twice. Air speed is 200 km/h. Noise is 65 dB. Weight is 3.2kg without a battery in the bullets and 3.2kg again in the table. Nothing here needs decoding.

The brushless motor matters more on a garden blower than on most tools, because a blower runs at full load for its entire duty cycle rather than in short bursts. Crucially, it is also what makes 65 dB possible. That is quieter than the Bosch further down by 29 decibels, which on a logarithmic scale works out at roughly eight times less perceived loudness. So if you clear leaves early on a weekend, that single number is worth more to you than any airflow claim on this page.

The obvious cost is that this is a bare tool. No battery, no charger, £114 to get started, and a DEWALT 18V XR battery and charger will add a good deal more on top. If you already own XR tools, then, it is the easy pick and the best cordless leaf blower here by some distance. If you do not, price the complete kit before you compare it with anything else in this list.',
                'pros' => ['450 CFM and 200 km/h, both published and consistent', '65 dB, the quietest blower in this guide by 13 dB', 'Brushless motor, better suited to continuous running', 'Variable speed trigger with lock-on function', '4.7 average, the highest rating here'],
                'contras' => ['Tool only: no battery and no charger included', 'Most expensive entry point once a battery is added', 'At 3.2kg it is heavier than the handheld budget models'],
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'RYOBI 18V ONE+ Blower OBL1820S',                                           // NOME
                'price' => '£49.50',                                                                 // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 4115,                                                             // Nº DE AVALIACOES (MAIOR AMOSTRA DA BUSCA INTEIRA)
                'image' => 'https://m.media-amazon.com/images/I/51TELPBF7wL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'RYOBI 18V ONE+ cordless leaf blower in hyper green and grey',          // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01LPCPBQ4?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'With 4,115 ratings at 4.5, this is the strongest evidence in the category by a wide margin. It states 245 km/h and 78 dB, and it is refreshingly honest about being a bare tool.', // TEXTO CURTO DO CARD
                'body' => 'Nothing else in this search comes close on evidence. A sample of 4,115 ratings at 4.5 is roughly three times the next best, and this battery powered leaf blower has been on sale long enough for those ratings to reflect tools that survived a few British winters rather than a few weeks.

The specification, meanwhile, is modest and honestly presented. Airflow is quoted as 245 km/h at the nozzle, which is faster than the DEWALT, and that is worth understanding rather than celebrating. Air speed and air volume are different things. A narrow nozzle raises speed while moving less total air, which works well for dry leaves on a hard path and poorly on a wet lawn. RYOBI publishes no CFM figure, so the honest answer is that we cannot tell you its air volume, and neither can the listing. At 1.6kg, however, it is the second lightest tool here, and 78 dB places it comfortably in the middle of the noise range.

The bullet that matters most is the fourth, and RYOBI states it plainly: sold as a bare tool, without battery or charger, compatible with the whole 18V ONE+ system. So if you already have ONE+ batteries in the shed, this is a £49.50 blower and an easy recommendation. If you do not, it is £49.50 plus a battery and charger, and the complete kits further down this list suddenly look far better value.',
                'pros' => ['4,115 ratings at 4.5, by far the largest sample in the category', 'Only 1.6kg, easy to use one-handed for long periods', '78 dB, quieter than the Bosch by 16 dB', 'Fits the entire 18V ONE+ battery range', 'Listing is upfront about being a bare tool'],
                'contras' => ['No battery or charger included', 'No air volume figure published, only nozzle speed', 'Single speed, with no variable control'],
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'SEYVUM 20V Cordless Leaf Blower with 2 x 2.0Ah Batteries',                 // NOME
                'price' => '£49.97',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 715,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/617cXfOic1L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'SEYVUM 20V cordless leaf blower kit with two batteries and charger',   // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FWK91HGD?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only budget option here that publishes a believable airflow figure, and it does so per speed setting: 140, 185 and 220 CFM. Two batteries and a charger are included for £49.97.', // TEXTO CURTO DO CARD
                'body' => 'This is the one budget listing in the search that reads as though somebody actually measured the product. Instead of a single heroic number, it gives airflow at each of the three speeds: 140 CFM, 185 CFM and 220 CFM. That is roughly half the DEWALT at the top setting, which is exactly what you would expect from a £49.97 tool, and the fact that it does not pretend otherwise is the strongest thing about it.

For the money, the kit is complete. You get two 2.0Ah batteries, a charger, two tube sections and an extension nozzle, with a stated 30 minutes of runtime on high and 55 on low. Noise is published at 80 dB. Set it against the RYOBI directly above at £49.50 and the comparison becomes the most important one on this page: this costs 47p more and includes the battery and charger that the RYOBI leaves out. For anyone not already invested in a battery platform, that makes it the best cordless leaf blower here on pure value.

One inconsistency is worth noting. The bullets describe it as 3.4 lbs with the battery fitted, which is about 1.54kg, while the specification table gives an item weight of 2.47kg. Both cannot be true. It is a smaller discrepancy than the ones further down this list, but it is there all the same.',
                'pros' => ['Airflow published per speed setting: 140, 185 and 220 CFM', 'Two batteries and a charger included for £49.97', 'Noise level published at 80 dB', '30 minutes of runtime on high, 55 minutes on low', 'Two tube lengths, for garden and for drying a car'],
                'contras' => ['Weight given as 3.4 lbs in the bullets and 2.47kg in the table', '220 CFM is roughly half the DEWALT at full speed', '2.0Ah batteries are small next to the 4.0Ah kits here'],
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'Makita DUB187Z 18V LXT Brushless Blower and Vacuum',                       // NOME
                'price' => '£146.99',                                                                // PRECO NA COLETA (O MAIS CARO DA LISTA)
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 1089,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71p-E-6KU6L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Makita DUB187Z 18V LXT cordless blower and vacuum in black and petrol', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BXHFGRWP?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A leaf blower and vacuum in one, with a collection bag included, running on the LXT battery platform. It is also a bare tool, and at 81.8 dB it is louder than the price suggests.', // TEXTO CURTO DO CARD
                'body' => 'The DUB187Z earns its place because it does the second half of the job. A blower gathers leaves into a pile; this then sucks that pile straight into a collection bag, which is the part most people underestimate until they have raked a wet lawn by hand. The brushless LXT motor and the Makita build are what the £146.99 is really buying, and 1,089 ratings at 4.4 suggest the hardware holds up.

Published airflow is 192 cubic metres per hour, which was the sixth unit of measurement we met in this search and works out at about 113 CFM. Read literally, that is a quarter of the DEWALT and half the SEYVUM, so it is almost certainly a vacuum-side figure rather than a blowing figure. The listing, however, never says which. This is the problem with the whole category in miniature: the number is published, it just cannot be compared with anything else.

It is the heaviest handheld here at 4kg before you add a battery, and 81.8 dB puts it near the loud end of the range. Like the DEWALT and the RYOBI, moreover, it is a body-only tool with no batteries and no charger. At £146.99, that makes it comfortably the most expensive way into this list.',
                'pros' => ['Blows and vacuums, with a collection bag included', 'Brushless LXT motor and genuine Makita build quality', '1,089 ratings at 4.4', 'Fits the entire 18V LXT battery range'],
                'contras' => ['No batteries or charger, at the highest price in the guide', 'Airflow quoted in cubic metres per hour, comparable to nothing else', '4kg before a battery, the heaviest handheld here', '81.8 dB, near the loud end of this list'],
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'SEYVUM 40V 3-in-1 Leaf Blower, Vacuum and Mulcher',                        // NOME
                'price' => '£127.47',                                                                // PRECO NA COLETA
                'rating' => 4.1,                                                                     // NOTA
                'reviews_count' => 1069,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71b3tri0X4L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'SEYVUM 40V three-in-one cordless leaf blower, vacuum and mulcher in yellow', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GC5T63SM?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Blows, vacuums and mulches into a 45L bag, with two 4.0Ah batteries and a charger in the box. It is the complete-kit answer to the Makita, and it costs £19 less.', // TEXTO CURTO DO CARD
                'body' => 'Where the Makita sells you a body and assumes you own the batteries, this arrives as everything you need: the tool, two 4.0Ah batteries, a charger, a 45 litre collection bag, wheels and a shoulder strap, for £19 less. If you do not already own an LXT or XR battery, that comparison is not close, and this becomes the obvious choice for a large garden.

The mulching function is the genuine addition. Shredding leaves as they are collected means the 45L bag holds several times more before it needs emptying, and what comes out the other end is compost material rather than whole leaves. Stated runtime is 20 minutes on high and 60 on low, which sounds realistic for a 40V system doing vacuum work.

Two caveats keep it at fifth, however. At 6.81kg it is by a distance the heaviest thing in this guide, which is why the wheels and shoulder strap are necessities rather than extras. This is a two-handed tool for a whole session, not something you grab for five minutes. In addition, at 4.1 it holds the lowest rating here from a solid sample of 1,069, which hints that the build is not up to Makita standards even though the feature list is longer.',
                'pros' => ['Blows, vacuums and mulches, with a 45L collection bag', 'Two 4.0Ah batteries and a charger included', 'Wheels and shoulder strap supplied in the box', '£19 less than the body-only Makita', '1,069 ratings, a solid sample'],
                'contras' => ['6.81kg, by far the heaviest tool in this guide', 'Lowest rating in the guide at 4.1', 'No airflow or noise figure published anywhere', 'Only 20 minutes of runtime on the high setting'],
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'Glowica Cordless Leaf Blower with 2 x 4.0Ah Batteries',                    // NOME
                'price' => '£89.98',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 185,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71HSPakm3+L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Glowica cordless leaf blower in blue and black with two batteries',    // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FGDDSJ85?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The best-equipped mid-price kit on the list: two 4.0Ah batteries, 120 minutes of runtime and 257 km/h claimed. It also states two different weights, 2.4kg and 3.88kg.', // TEXTO CURTO DO CARD
                'body' => 'On equipment alone this is the strongest mid-price option in the search. Two 4.0Ah batteries deliver a claimed 120 minutes on the low setting, four times what the SEYVUM 40V manages, and the box also holds a fast charger, a shoulder strap and an extension nozzle. It carries 4.6 from 185 ratings, the second highest score anywhere in this guide.

The claimed air speed is 257 km/h, which would make it faster than the DEWALT. As with every listing here that quotes speed on its own, though, treat that as a nozzle figure rather than a measure of how much air the tool actually moves, because no CFM or cubic metre figure is published alongside it. In a category where the top-rated professional tool publishes both numbers, quoting only the flattering one is a decision rather than an oversight.

Then there is the contradiction on weight. The fifth bullet says the blower weighs only 2.4kg including battery and tube. The specification table, by contrast, gives an item weight of 3.88 kg. That is a 1.6 times difference on the one figure that decides whether you can hold the thing at arm length for twenty minutes, and nothing on the listing tells you which is true.',
                'pros' => ['Two 4.0Ah batteries and a fast charger included', 'Up to 120 minutes of runtime on the low setting', '4.6 average, the second highest rating here', 'Shoulder strap and extension nozzle in the box', 'Battery level indicator in 25 percent steps'],
                'contras' => ['States 2.4kg in the bullets and 3.88kg in the specification table', 'Quotes air speed but publishes no air volume figure', 'No noise level published', 'Smallest review sample among the mid-price options'],
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'Bosch UniversalLeafBlower 18V-130',                                        // NOME
                'price' => '£43.99',                                                                 // PRECO NA COLETA (O MAIS BARATO DA LISTA)
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 1221,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61ztx+T7LiL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Bosch UniversalLeafBlower 18V-130 cordless leaf blower in green',      // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BTZXZP1H?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest branded blower here at £43.99 and the lightest at 1.3kg. However, it is rated at 94 dB, the loudest in this guide by 12 decibels, and it ships without a battery.', // TEXTO CURTO DO CARD
                'body' => 'Plenty of people buy this one simply because it is a Bosch at £43.99 with 1,221 ratings behind it, and on weight it is the easiest tool here to live with at just 1.3kg. Two-stage speed control is more than the RYOBI offers, and it fits the Bosch 18V system that many households already own for a cordless drill.

Then you reach the noise figure. The specification table gives 94 decibels. The DEWALT is 65, the RYOBI 78, the Makita 81.8. Because decibels are logarithmic, 94 against 65 works out at roughly eight times the perceived loudness, and 94 dB is the level at which sustained workplace exposure starts to require hearing protection under UK rules. For a garden blower most people run on a weekend morning in a terraced street, that is the single most important number on the listing. Tellingly, it sits buried in the specification table rather than in any bullet point.

It is also sold without a battery, which the title does state. So the £43.99 headline that makes it look like the bargain of the search is not the price of a working leaf blower at all. Add a Bosch 18V battery and charger and it ends up costing more than the complete SEYVUM kit at number three.',
                'pros' => ['Only 1.3kg, the lightest tool in this guide', 'Cheapest branded option at £43.99', 'Two-stage speed control', 'Fits the Bosch 18V household battery system', '1,221 ratings at 4.4'],
                'contras' => ['94 dB, the loudest blower here by 12 decibels', 'No battery or charger included', 'No airflow figure published at all', 'The noise rating appears only in the spec table, not the bullets'],
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'YUQUESEN B09-Ultra Cordless Leaf Blower, 5-Speed',                         // NOME
                'price' => '£59.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 1339,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71x1RPET+TL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'YUQUESEN cordless leaf blower in green with two batteries and charger', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GGWH5N3K?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The listing that advertises 990,000 RPM in its title. The number appears in no bullet point, and the 700 CFM it claims would beat a professional DEWALT costing twice as much.', // TEXTO CURTO DO CARD
                'body' => 'The title of this listing sells an electric leaf blower cordless model running at 990,000 RPM. For scale, a jet engine turbine spins at roughly 15,000 RPM, and a dental drill, one of the fastest rotating tools in ordinary use, reaches about 400,000. A rotor at 990,000 RPM would not clear your patio; it would disassemble itself. The number appears nowhere in the five bullet points, nowhere in the specification table and nowhere in the description. It exists only in the title, where its job is to catch a search.

The claims that do appear in the bullets are more interesting, because they can be checked. It states 700 CFM and 200 MPH. The DEWALT at number one, a brushless professional tool at £114, publishes 450 CFM and 200 km/h. So a £59.99 garden blower is claiming 55 percent more air volume and, once you convert 200 MPH into 322 km/h, 60 percent more air speed than a tool built for trade use. There is no version of that which holds up.

We have included it rather than quietly dropping it, because 1,339 people have rated it 4.4 and that means plenty of buyers are landing on this page. As a £59.99 kit with two batteries, a charger and five speeds, it may well be a perfectly serviceable garden tool. The specification, though, cannot be used to compare it with anything, and the same brand sells a second model at number nine whose numbers contradict this one outright.',
                'pros' => ['Two batteries, a charger and two extension nozzles included', 'Five speed settings', 'Rotating handle offers several grip angles', '1,339 ratings at 4.4'],
                'contras' => ['Advertises 990,000 RPM, a physically impossible figure', 'Claims 700 CFM, more than a professional DEWALT at twice the price', 'The RPM figure appears only in the title, in no bullet or spec', 'No noise level or verified weight published'],
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'YUQUESEN Hasidi Cordless Leaf Blower with 2 Batteries',                    // NOME
                'price' => '£69.99',                                                                 // PRECO NA COLETA
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 399,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71ZY47w115L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'YUQUESEN Hasidi cordless leaf blower in green with extension tubes',   // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GGX2LW8R?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Same brand, £10 more, and every number is worse: 900,000 RPM in the title, 450 CFM against 700, and a stated weight of 1.12 lbs sitting beside a spec table reading 2.2kg.', // TEXTO CURTO DO CARD
                'body' => 'Place this next to the blower at number eight and the category stops making sense. Same brand. This one costs £10 more at £69.99. Yet it advertises 900,000 RPM instead of 990,000, 450 CFM instead of 700, and 150 MPH instead of 200. Every headline figure is lower while the price is higher. Either the cheaper model is overstated or this one is, and a shopper comparing two products from the same seller has no way to work out which.

It then contradicts itself. The third bullet describes it as weighing just 1.12 lbs, which is 0.51kg, roughly a full water bottle, for a tool containing a motor, a battery and two extension tubes. The specification table, meanwhile, gives an item weight of 2.2kg. That is a factor of more than four between two numbers printed on the same page.

The 450 CFM claim deserves the same treatment as its sibling, because that is precisely the DEWALT figure, coming from a £69.99 tool with no brushless motor mentioned anywhere. What you are actually buying, judging only by the parts of the listing that are not in dispute, is a light handheld blower with two batteries, a charger, a storage bag and two tubes. As a £69.99 product that is reasonable enough. It is the numbers wrapped around it that are not.',
                'pros' => ['Two batteries, charger, storage bag and two tubes included', 'Genuinely light in the hand at 2.2kg', '399 ratings at 4.3'],
                'contras' => ['Advertises 900,000 RPM, another impossible figure', 'Costs £10 more than its sibling while claiming less airflow and less speed', 'States 1.12 lbs in a bullet and 2.2kg in the specification table', 'Claims the same 450 CFM as a professional DEWALT'],
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'Kalamotti Cordless Leaf Blower, 6-Speed Brushless',                        // NOME
                'price' => '£79.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 54,                                                               // Nº DE AVALIACOES (AMOSTRA PEQUENA — SINALIZADO NO TEXTO)
                'image' => 'https://m.media-amazon.com/images/I/71gmKnyyrUL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Kalamotti cordless leaf blower in green and black with two batteries', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D83WS3Z5?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Three different weights on a single page, 520 CFM claimed against a professional DEWALT at 450, a listed voltage of 60V on an £79.99 tool, and only 54 ratings behind all of it.', // TEXTO CURTO DO CARD
                'body' => 'This listing states the weight of the product three times and gets three different answers. The special features field says 2.3kg. The fifth bullet says 2.4kg including battery. The specification table says an item weight of 3.67kg. Those are not rounding differences, and the gap between the lightest and heaviest claim runs to 60 percent.

The rest of the figures are in similar shape. Airflow is given as 520.01 CFM, which is more than the brushless DEWALT at number one, from a tool costing £34 less with two batteries thrown in. Voltage, meanwhile, is listed as 60 Volts, while every other blower in this guide runs at 18V or 20V and the batteries it ships with are described as 4.0Ah. A genuine 60V garden system at £79.99, including two batteries and a charger, would be remarkable.

It may still be a decent lightweight cordless leaf blower. The brushless motor claim is plausible at this price in 2026, six speeds with stepless adjustment is a real feature, and 4.4 is a respectable score. All of it rests on 54 ratings, though, which is the thinnest sample in this guide by a wide margin and not nearly enough to separate a good product from a lucky first batch. Between that sample size and a specification sheet that disagrees with itself three ways, it finishes last.',
                'pros' => ['Brushless motor at a mid-budget price', 'Six speed settings, including stepless adjustment', 'Two 4.0Ah batteries and a fast charger included', 'Claimed 120 minutes of runtime on the low setting'],
                'contras' => ['States 2.3kg, 2.4kg and 3.67kg for its own weight on one page', 'Claims 520 CFM, more than a professional DEWALT costing £34 more', 'Listed as 60V while shipping 4.0Ah batteries at £79.99', 'Only 54 ratings, the thinnest sample in this guide'],
            ],
        ];

        // ═══════════════════════════════════════════════════════════════
        // ═══ FIM DA AREA EDITAVEL — NAO PRECISA MEXER ABAIXO ═══
        // ═══════════════════════════════════════════════════════════════

        $categoryModel = Category::updateOrCreate( // CRIA OU ATUALIZA A CATEGORIA PELO SLUG (NAO DUPLICA)
            ['slug' => $category['slug']], // CHAVE DE BUSCA: SLUG DA CATEGORIA
            $category, // DADOS A SEREM GRAVADOS/ATUALIZADOS
        );

        $articleModel = Article::updateOrCreate( // CRIA OU ATUALIZA O ARTIGO PELO SLUG (NAO DUPLICA)
            ['slug' => $article['slug']], // CHAVE DE BUSCA: SLUG DO ARTIGO
            array_merge($article, ['category_id' => $categoryModel->id]), // VINCULA O ARTIGO A CATEGORIA
        );

        $articleModel->products()->delete(); // REMOVE OS PRODUTOS ANTIGOS DESTE ARTIGO PARA REFLETIR EDICOES SEM DUPLICAR

        foreach ($products as $produto) { // PERCORRE A LISTA MANUAL DE PRODUTOS
            $articleModel->products()->create($produto); // RECRIA CADA PRODUTO VINCULADO AO ARTIGO
        }

        $this->command?->info(static::class.": 1 categoria, 1 artigo e ".count($products)." produtos."); // RESUMO DO QUE FOI POPULADO
        $this->command?->info("URL do artigo: /{$category['slug']}/{$article['slug']}"); // URL ONDE O ARTIGO FICA ACESSIVEL
    }
}
