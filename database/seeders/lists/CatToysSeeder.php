<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class CatToysSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE BRINQUEDOS PARA GATOS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // FOCUS KEYWORD: best cat toys
        // KEYWORDS SECUNDARIAS: cat toys for indoor cats / interactive cat toys /
        // catnip toys / best cat toys for indoor cats / cat toys amazon / kitten toys /
        // cat wand toy / electric cat toy / cat treat puzzle / cat puzzle feeder /
        // best interactive cat toys / automatic cat toy / cat teaser toy /
        // toys for bored cats / cat toys for cats that get bored
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'pet-supplies',               // SLUG DA CATEGORIA (URL)
            'name' => 'Pet Supplies',               // NOME EXIBIDO
            'description' => 'Everything your furry friends need, ranked by quality, comfort and value.', // DESCRICAO (MESMO TEXTO JA CADASTRADO, PARA NAO TROCAR A CADA SEED)
        ];

        $article = [
            'slug' => 'best-cat-toys',                                           // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK" (SITE JA E UK)
            'title' => 'Best Cat Toys in 2026: 10 Picks Cats Actually Play With', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Cat Toys 2026: Top 10 Ranked for Indoor Cats',  // TITLE DA ABA/GOOGLE (49 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best cat toys on Amazon: catnip toys, interactive wands, electric toys and treat puzzles, compared on play value, durability and price.', // META DESCRIPTION (149 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best cat toys',                                  // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Every cat owner has a drawer of ignored toys, which is why the best cat toys are the ones that work with a cat's instincts rather than against them. Cats hunt in short, intense bursts, so a toy that can be batted, stalked, pounced on or worked at for a food reward will hold their attention far longer than anything that just looks good in the packet. We compared the top 10 best cat toys available on Amazon across the four types that actually earn their keep: catnip toys, feather and plush prey toys, interactive electric toys for indoor cats left alone during the day, and treat puzzles that make a cat think for its food. Prices run from £3.30 to £24.35, and the cheapest toy here is far from the worst.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X
            'conclusion' => "The most useful thing to know before buying any of the best cat toys is that no single toy suits every cat. Around one cat in three does not respond to catnip at all, since the reaction is hereditary, so if the first catnip mouse is ignored the answer is a feather or a puzzle rather than stronger catnip. Kittens and young cats usually want fast chase toys, while older or overweight cats often do better with a treat puzzle that rewards patience instead of sprinting. It is also worth rotating toys in and out of a cupboard every couple of weeks, because a toy that has been out of sight comes back interesting. Two practical safety notes that apply across the best cat toys here: supervise play with anything containing small parts, feathers or string, and check toys regularly for chew damage, replacing them once they start coming apart.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-06 16:41:06', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Yeowww Banana Catnip Cat Toy, 100% Organic American Catnip',              // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£6.77',                                                                  // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 29576,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71tCA70bNcL._AC_SX679_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'best cat toys',                                                       // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://amzn.to/4fHLASh',                                       // LINK AFILIADO
                'summary' => "The most reviewed toy on this list by a mile, and one of the best cat toys for pure catnip potency: no filler, just organic catnip in a banana cats can kick.", // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "With nearly 30,000 ratings, the Yeowww Banana is the most reviewed toy in this ranking by a huge margin, and it has earned that following on one simple decision: it contains no stuffing at all. Where most catnip toys pad themselves out with polyester or cotton wadding and add a pinch of catnip, this is filled with nothing but organically grown American catnip, which is why cats that shrug at supermarket catnip mice tend to react to this one.

The banana shape is not just a gimmick. It is long enough for a cat to grab with the front paws and rabbit-kick with the back legs, which is the natural killing motion cats use on prey, and that makes it one of the best cat toys for burning off energy rather than just being sniffed and abandoned. It is equally good for batting across a wooden floor and tossing in the air.

The outer fabric is heavy-duty cotton twill rather than thin felt, so it stands up to claws and teeth better than most, and it is coloured with natural non-toxic dyes that are safe for a cat to chew and lick. Worth remembering before you order: catnip response is hereditary and roughly a third of cats simply do not have it, so if your cat has ignored catnip before, one of the feather or puzzle toys further down this list is the safer bet.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Nearly 30,000 customer ratings, the most on this list', 'Filled with pure catnip, no polyester or cotton filler', 'Shape suits grabbing and rabbit-kicking', 'Heavy-duty cotton twill with non-toxic dyes'], // PONTOS POSITIVOS
                'contras' => ['Useless for the roughly 1 in 3 cats immune to catnip', 'Potency fades over months once opened'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Petface Freddie Fox Plush Cat Toy Filled with Catnip',                    // NOME (ENCURTADO)
                'price' => '£6.31',                                                                  // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 1146,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/51tgwgdExzL._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Petface Freddie Fox Plush Cat Toy Filled with Catnip',                // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4hiPliq',                                       // LINK AFILIADO
                'summary' => "A soft plush fox with natural catnip inside, sized for pouncing and cuddling rather than kicking, from a familiar UK pet brand.", // TEXTO CURTO (CARD)
                'body' => "Where the Yeowww banana is a firm, kickable toy, the Freddie Fox is the softer alternative: a plush body filled with natural catnip that cats tend to pounce on, carry around and then settle down with. For cats that like to sleep next to a toy as much as attack it, that difference matters more than the price gap.

Petface is a well-established UK pet brand, and this is one of its steadier sellers with over 1,100 ratings behind a 4.4 average. The catnip inside encourages the initial interest, and the plush build gives a cat something to grip and wrestle once the catnip novelty settles down, which helps it stay in rotation rather than being sniffed once and forgotten.

Petface is unusually direct in its own listing about durability, noting that the toy is strong but not indestructible and will eventually suffer chew damage. That is sensible advice for any plush cat toy: supervise play, check it over regularly for split seams, and replace it once the stuffing starts coming out, since loose filling is the real hazard rather than the fabric itself.", // TEXTO SEO LONGO
                'pros' => ['Soft plush build suits pouncing and carrying', 'Filled with natural catnip', 'Over 1,100 ratings from an established UK brand', 'Cheaper than most catnip toys here'], // PONTOS POSITIVOS
                'contras' => ['Plush seams will not survive a determined chewer', 'Needs replacing once stuffing starts to escape'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Yeowww Stinkies Sardines Organic Catnip Cat Toys, Pack of 3',             // NOME (ENCURTADO)
                'price' => '£15.14',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 2158,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71u-TDGYoOL._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Yeowww Stinkies Sardines Organic Catnip Cat Toys, Pack of 3',         // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4q2Hd7N',                                       // LINK AFILIADO
                'summary' => "The highest rated toy on this list at 4.7: three pure-catnip sardines, small enough to bat under furniture and sized right for a cat's mouth.", // TEXTO CURTO (CARD)
                'body' => "These are the same pure-catnip construction as the Yeowww banana at number one, in a smaller, more tossable format, and they hold the highest rating on this entire list at 4.7 across more than 2,100 reviews. Each sardine is 7.5cm long, which is about mouse-sized, so cats pick them up and carry them in a way they cannot with a larger toy.

Like the banana, there is no cotton or polyester inside, just organically grown American catmint, and the outer fabric is heavy-duty cotton coloured with vegetable or soy-based dyes. The pack of three is the practical part: cats routinely bat small toys under the sofa and lose interest once they vanish, so having spares in a drawer keeps at least one in circulation.

They work equally well for indoor and outdoor cats, and the small size makes them ideal for the batting-and-chasing game across hard floors. The obvious downside is cost per toy, since £15.14 for three works out dearer than most single toys here, and as with any catnip toy they do nothing for a cat that lacks the catnip gene.", // TEXTO SEO LONGO
                'pros' => ['Highest rating on this list at 4.7', 'Pack of three, so losing one under the sofa is not fatal', 'Pure organic catnip with no filler', 'Mouse-sized at 7.5cm for carrying and tossing'], // PONTOS POSITIVOS
                'contras' => ['Most expensive catnip option here at £15.14', 'Small enough to disappear under furniture'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Petface Feather Tail Mice Plush Cat Toy, Pack of 2',                      // NOME (ENCURTADO)
                'price' => '£6.69',                                                                  // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 558,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/416Nh6qd2HL._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Petface Feather Tail Mice Plush Cat Toy, Pack of 2',                  // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4xmCXCD',                                       // LINK AFILIADO
                'summary' => "The pick for cats that ignore catnip: two plush mice with fluttering feather tails that trigger the hunting response through movement instead.", // TEXTO CURTO (CARD)
                'body' => "If your cat is one of the third that does not react to catnip, this is where to start. The Feather Tail Mice work on movement rather than scent: the feather tails flutter and drag unpredictably as the mouse is batted across the floor, and that erratic motion is what triggers a cat's stalk-and-pounce response.

You get two mice in the pack, which is sensible given how readily small toys go missing, and the mouse shape and size make them easy for a cat to carry in its mouth, an important part of the hunting sequence that a ball cannot satisfy. Petface pitches them for both indoor and outdoor play, and they work equally well thrown for a cat to chase or left out for solo play.

The feathers are also the weak point, and worth being clear about. They will be pulled out eventually by any enthusiastic cat, and loose feathers are a swallowing risk, so this is a toy to supervise and to check over regularly. Petface says as much in its own listing, advising owners to examine the toy for wear and replace it once damage could become a hazard.", // TEXTO SEO LONGO
                'pros' => ['Works on movement, so no catnip needed', 'Two mice per pack', 'Mouse size and shape suit carrying and pouncing', 'Suitable for indoor and outdoor cats'], // PONTOS POSITIVOS
                'contras' => ['Feathers pull out and are a swallowing risk if left unsupervised', 'Less durable than a solid catnip toy'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Petface Glitter Balls Cat Toy, Lightweight Sparkle Balls, Pack of 3',     // NOME (ENCURTADO)
                'price' => '£5.27',                                                                  // PRECO (DA PLANILHA)
                'rating' => 4.0,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 70,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71wC8omO5vL._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Petface Glitter Balls Cat Toy, Lightweight Sparkle Balls, Pack of 3', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/456Myl0',                                       // LINK AFILIADO
                'summary' => "Three lightweight sparkle balls for solo play: cheap, easy to throw, and light enough for a cat to send skidding across a hard floor on its own.", // TEXTO CURTO (CARD)
                'body' => "Sometimes the simplest toy is the one that gets used most. These glitter balls are soft and extremely light, which is exactly the point: a cat can send one skidding across laminate or tile with a single paw swipe and then chase it down without any human involvement, making them one of the better options for solo play while you are busy.

The sparkle finish catches the light as they roll, which keeps a cat's eye on them, and the three-pack means you can leave one out, keep one in reserve and accept that a third will end up permanently under the fridge. At £5.27 for three they are the cheapest per-toy option on this list.

The two caveats are worth knowing. They are best on hard floors, since a lightweight ball barely moves on carpet, and this is the least reviewed toy on this list at just 70 ratings with a 4.0 average, the joint lowest score here among the well-regarded options. As with every soft toy, Petface advises supervising play and replacing them once chew damage appears.", // TEXTO SEO LONGO
                'pros' => ['Cheapest per toy on this list at £5.27 for three', 'Light enough for genuine solo play', 'Sparkle finish keeps a cat visually engaged', 'Nothing to charge, break or lose interest in'], // PONTOS POSITIVOS
                'contras' => ['Barely moves on carpet, needs hard floors', 'Only 70 ratings and a 4.0 average'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Petface Light Up Disco Ball Cat Toy, Colour Changing Lights, 3.5cm',      // NOME (ENCURTADO)
                'price' => '£3.30',                                                                  // PRECO (DA PLANILHA)
                'rating' => 4.2,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 342,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/51WoaUj1gML._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Petface Light Up Disco Ball Cat Toy, Colour Changing Lights, 3.5cm',  // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4bBpbnb',                                       // LINK AFILIADO
                'summary' => "The cheapest toy on this list at £3.30, and the one that works best after dark: a 3.5cm ball with colour-changing lights that activate as it rolls.", // TEXTO CURTO (CARD)
                'body' => "At £3.30 this is the cheapest toy in the ranking, and it solves a specific problem the others do not: cats are crepuscular, meaning they are naturally most active at dawn and dusk, which is exactly when a plain ball becomes hard for them to track and easy for you to trip over.

The colour-changing lights inside the 3.5cm ball give a cat something to lock onto in low light, and because the light effects change as the ball moves, it rewards the batting motion with a visible response. That feedback loop is what keeps a cat coming back to it rather than losing interest after one swipe.

With 342 ratings behind a 4.2 average it is a modest but reasonable performer, and the low price makes it an easy addition alongside a main toy rather than a purchase to agonise over. Two things to keep in mind: at 3.5cm it is small, so it is not suitable for a cat that tries to swallow toys, and it is a sealed electronic item, meaning that once the internal battery is done the toy is finished rather than replaceable.", // TEXTO SEO LONGO
                'pros' => ['Cheapest toy on this list at £3.30', 'Lights make it trackable at dawn and dusk when cats are most active', 'Light effects respond to movement, rewarding play', 'No setup or charging needed'], // PONTOS POSITIVOS
                'contras' => ['Sealed battery, so the toy is disposable once it dies', 'Small at 3.5cm, not for cats that swallow toys'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => '7-in-1 Rechargeable Interactive Cat Toy Wand, 5 Patterns, 3 Light Modes', // NOME (ENCURTADO)
                'price' => '£11.75',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 397,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/715vifH8b7L._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => '7-in-1 Rechargeable Interactive Cat Toy Wand, 5 Patterns, 3 Light Modes', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/45ankSM',                                       // LINK AFILIADO
                'summary' => "A pocket-sized rechargeable pointer that projects five shapes, not just a red dot, with a USB charge instead of the usual endless button cells.", // TEXTO CURTO (CARD)
                'body' => "This is a laser-style pointer with more thought behind it than most. Instead of a single red dot it projects five different patterns, including a mouse, a butterfly and a star, and a black gear on the head switches between red, purple and white modes. The white setting doubles as an emergency torch, and the aluminium alloy body with a metal clip is small enough to live in a pocket, so it is always to hand when the cat starts pestering.

Charging is over USB directly, which is a genuine practical upgrade over the coin cells most pointers eat through, and the three modes are switched by sliding rather than holding a button down. With 397 ratings behind a 4.5 average it is among the better rated interactive toys here.

One important piece of advice that applies to every pointer toy, this one included: cats can become frustrated by a light they can never physically catch, since the hunting sequence never resolves in a capture. Behaviourists generally recommend finishing every laser session by landing the dot on a real toy or a few treats, so the cat gets to actually catch something. And as with any pointer, never shine it into a cat's eyes or anyone else's.", // TEXTO SEO LONGO - CONSELHO DE COMPORTAMENTO FELINO, DIFERENCIAL EDITORIAL
                'pros' => ['Five projected patterns rather than a single red dot', 'USB rechargeable instead of disposable coin cells', 'Aluminium body with a clip, small enough to pocket', 'White mode doubles as an emergency torch'], // PONTOS POSITIVOS
                'contras' => ['Pointer toys can frustrate cats unless you end on a real catch', 'Must never be shone into eyes'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Toozey Electric Hide and Seek Cat Toy, 3 Feathers, Remote Control',       // NOME (ENCURTADO)
                'price' => '£24.35',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 401,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71lOCmv4aTL._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Toozey Electric Hide and Seek Cat Toy, 3 Feathers, Remote Control',   // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4ghmzgU',                                       // LINK AFILIADO
                'summary' => "The one to buy for a cat left alone all day: a feather appears and vanishes under a blanket at random, and it runs itself with no human needed.", // TEXTO CURTO (CARD)
                'body' => "This is the most expensive toy on the list at £24.35, and the only one designed to entertain a cat with nobody in the house. A feather darts out from beneath a fabric cover and disappears again at unpredictable intervals, mimicking prey hiding under leaves, which is a far stronger trigger for most cats than a toy that simply moves in a straight line.

The practical details are what justify the price. Multiple modes and speeds let you match a bold cat that wants a fast chase or a cautious one that needs slower movement, LED lights draw even timid cats in, and there is a remote control if you would rather drive it yourself. Crucially, it manages its own sessions: after 10 minutes it pauses into standby until a cat touches it again, and if nothing happens for 5 hours it switches off entirely, so it neither runs the battery flat nor pesters a cat that has had enough. Three interchangeable feathers come in the box for when one gets destroyed.

Two limitations from the manufacturer are worth heeding. Do not use it on plush carpet, where it can jam, and charge it only with a standard charger, since a fast charger above 7.2V can kill the battery. The top rod is flexible wire and may bend with heavy pulling, though it can be removed and straightened.", // TEXTO SEO LONGO
                'pros' => ['Genuinely entertains a cat home alone', 'Unpredictable hide-and-seek motion beats simple movement', 'Auto standby after 10 minutes and auto off after 5 hours', 'Three spare feathers and a remote control included'], // PONTOS POSITIVOS
                'contras' => ['Most expensive toy on this list at £24.35', 'Jams on plush carpet and needs a standard charger, not a fast one'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Gamrong Cat Fetch Toy Set, 1 Launcher and 10 Flying Propellers',          // NOME (ENCURTADO)
                'price' => '£5.65',                                                                  // PRECO (DA PLANILHA)
                'rating' => 3.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 261,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61PIe3ML7LL._AC_SX425_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Gamrong Cat Fetch Toy Set, 1 Launcher and 10 Flying Propellers',      // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4q4yq5p',                                       // LINK AFILIADO
                'summary' => "The lowest rated toy on this list at 3.6: a launcher that fires spinning propellers for a cat to chase, fun in principle but divisive in practice.", // TEXTO CURTO (CARD)
                'body' => "The idea behind this one is genuinely appealing. You clip a propeller onto the launcher, wind it three to five turns clockwise, press the trigger, and it spins off across the room for the cat to chase down. Ten propellers come in the set alongside the launcher, all in lightweight ABS plastic, and for a cat that loves a fast horizontal chase it can be a lot of fun for very little money.

In practice it divides owners more than anything else on this list. Its 3.6 average across 261 ratings is the lowest score here, and unlike the low-rated entries elsewhere in our rankings that figure comes from a large enough sample to take seriously rather than a handful of reviews. Common themes in that feedback are propellers that fly less reliably than expected and a mechanism that some cats lose interest in once the novelty passes.

There is also a safety point that deserves stating plainly. Small propellers are exactly the sort of loose part a cat can chew or swallow, so this is a supervised-play toy that should be packed away afterwards rather than left out. Note too that Amazon lists it as an international product sold from abroad, so terms, labelling and instructions may differ from a UK-sourced item.", // TEXTO SEO LONGO - HONESTO SOBRE A NOTA BAIXA E SOBRE O RISCO DAS PECAS PEQUENAS
                'pros' => ['Ten propellers included for £5.65', 'Fast horizontal chase suits high-energy cats', 'Nothing to charge or replace batteries in', 'Lightweight ABS that resists deforming'], // PONTOS POSITIVOS
                'contras' => ['Lowest rating on this list at 3.6 from 261 ratings', 'Small loose propellers are a chewing and swallowing risk, so supervise play'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Nina Ottosson by Catstages Buggin Out Puzzle & Play Cat Treat Puzzle',    // NOME (ENCURTADO)
                'price' => '£13.64',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 7319,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/718VplhnmcL._AC_SY450_.jpg',         // IMAGEM (DA PLANILHA)
                'alt_text' => 'Nina Ottosson by Catstages Buggin Out Puzzle & Play Cat Treat Puzzle', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3TDUzvf',                                       // LINK AFILIADO
                'summary' => "The second most reviewed pick here and the only one that feeds as well as entertains: 16 hidden compartments that make a cat work for its food.", // TEXTO CURTO (CARD)
                'body' => "This is the odd one out on the list, and arguably the most useful toy on it. Rather than mimicking prey, the Buggin' Out puzzle hides treats or dry food across 16 compartments that a cat has to work out how to reach, tapping into foraging instincts that chase toys leave completely untouched. With 7,319 ratings it is the second most reviewed product here, behind only the Yeowww banana.

Its real value is as a replacement for the food bowl rather than an occasional game. Cats that bolt their food from a bowl eat far more slowly when they have to solve for each mouthful, and for indoor cats prone to putting on weight or getting bored, spreading a normal daily portion across the puzzle turns feeding time into fifteen minutes of mental work. It is one of the few toys here that genuinely suits older, less athletic or overweight cats.

Practically it is well designed for a household: the materials are BPA, PVC and phthalate free, and there are no removable parts at all, which means nothing to lose under the sofa, nothing small enough to swallow, and a puzzle you can simply wipe or rinse clean. Nina Ottosson is the established name in this category, and this is the entry-level design in the range, so it suits a cat new to puzzle feeding.", // TEXTO SEO LONGO
                'pros' => ['7,319 ratings, second most reviewed on this list', 'Replaces the food bowl to slow down fast eaters', 'No removable parts, so nothing to lose or swallow', 'BPA, PVC and phthalate free and easy to clean'], // PONTOS POSITIVOS
                'contras' => ['Needs treats or food to work, unlike every other toy here', 'Some cats give up if not introduced gradually'], // PONTOS NEGATIVOS
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
        $this->command?->info("CatToysSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
