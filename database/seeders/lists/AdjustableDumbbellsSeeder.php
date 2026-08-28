<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class AdjustableDumbbellsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE HALTERES AJUSTAVEIS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // COLETA: AMAZON.CO.UK EM 27/08/2026, ENTREGA EM M4 6BD (MANCHESTER), BUSCA "adjustable dumbbells" FILTRADA A PARTIR DE £80.
        //
        // ═══ ACHADOS DA COLETA (O DIFERENCIAL DO ARTIGO) ═══
        // 1. PAR OU UNIDADE: A PERGUNTA QUE DOBRA O PRECO E QUASE NINGUEM RESPONDE NO TITULO.
        //    SO TRES DOS DEZ ANUNCIOS DIZEM CLARAMENTE NOS BULLETS: BOWFLEX ("2-24 kg per dumbbell", "One single dumbbell"),
        //    POWERBLOCK ELITE ("Sold in Pairs") E EISENLINK ("NOTES - This is a single dumbbell").
        //    O BOWFLEX E O PRODUTO DE MAIOR NOTA DA BUSCA (4.7, 1.814 AVALIACOES) A £165,99 — E E UM HALTER SO. O PAR SAI £331,98.
        // 2. O CAMPO "ITEM WEIGHT" NAO SERVE DE CONFERENCIA, PORQUE TAMBEM NAO FECHA:
        //    DH FITLIFE DIZ "18kg Pair" E ITEM WEIGHT 36kg (BATE) · ATIVAFIT DIZ "30KG Pair / 2Pack" E ITEM WEIGHT 29,9kg (NAO BATE) ·
        //    POWERBLOCK SPORT DIZ "Supplied as a Pair" A 11kg POR MAO E ITEM WEIGHT 10,9kg (NAO BATE) ·
        //    LIFEPRO DIZ "11KG Pair" E ITEM WEIGHT 11,3kg (NAO BATE) · YAHEETECH TEM A TABELA DE ESPECIFICACOES COMPLETAMENTE VAZIA.
        // 3. LIFEPRO SE CONTRADIZ NO PROPRIO ANUNCIO: BULLET 2 DIZ "The 11KG Pair" E BULLET 5 DIZ "These home weights set Offer
        //    A 10kg Pair". E O MAXIMO E 11kg POR £138,22 — O PIOR CUSTO POR QUILO DA LISTA.
        // 4. EISENLINK: O TITULO DIZ "4-36kg Weight Set", MAS A VARIANTE VENDIDA E 4-20kg E O CAMPO COLOUR DIZ "Single Dumbbell 20kg".
        //    O MESMO PRODUTO APARECE EM OUTRO ASIN (B0BZHHCSFD) A £239,90 COM AS MESMAS 233 AVALIACOES — £110 DE DIFERENCA.
        // 5. ASINS DUPLICADOS COM PRECOS MUITO DIFERENTES E MESMA CONTAGEM DE AVALIACOES:
        //    SONGMICS 12.5/18/24KG: B0GX9MJSPQ £109,99 E B0GX93Z2PB £199,99, AMBOS COM 67 AVALIACOES (£90 DE DIFERENCA).
        //    ENTERSPORTS 10/20/40kg: B0GGCDJ6YT £104,54 E B0GXL2WHRR £186,98, AMBOS COM 25 AVALIACOES (£82 DE DIFERENCA).
        //    ENTERSPORTS 12/18/27KG: B0BZQ4J4B4 £144,99, B0F9PZPPGY £142,49 E B0D1P694JJ £209,99, TODOS COM 1.1K AVALIACOES.
        //    USADO SEMPRE O MAIS BARATO DE CADA GRUPO.
        // 6. NUMERO DE INCREMENTOS VARIA DE 5 A 16 E DECIDE A PROGRESSAO: LIFEPRO E ENTERSPORTS TEM 5 DEGRAUS (SALTOS DE ~2,5kg),
        //    POWERBLOCK ELITE TEM 16 E LISTA CADA UM. PESO MAXIMO VARIA DE 11kg (LIFEPRO) A 30kg (ATIVAFIT).
        // 7. ATIVAFIT VENDE EM kg NO TITULO MAS O MOSTRADOR E MARCADO SO EM LIBRAS: "Dial markings are in lb".
        // 8. PROIRON MOSTRA BANDEJAS DE NOGUEIRA NAS FOTOS E AVISA NO ULTIMO BULLET: "Wood trays are not included in the dumbbells set!".
        //
        // ═══ CRITERIO DE CORTE ═══
        // EXCLUIDOS POR AMOSTRA INSUFICIENTE (<100 AVALIACOES): B0G2611FTR (1), B0GX32BPJZ (4), B0FG1DYB4B (5), B0GKFPDWDY (6),
        // B0D96Y9W8Y (9), B0GD6J6T36 (12), B08WR6LXL2 (22), B0GGCDJ6YT (25), B0DMP1SYF4 (62), B0GX9MJSPQ (67).
        //
        // ═══ VARIACOES DE PALAVRA-CHAVE TRABALHADAS NO TEXTO ═══
        // best adjustable dumbbells · best adjustable dumbbells on amazon · adjustable dumbbell set · adjustable weights ·
        // quick dial dumbbells · adjustable dumbbells pair · home gym dumbbells · best adjustable dumbbells for home gym ·
        // space saving dumbbells · adjustable dumbbell set uk
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'fitness',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Fitness',                    // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best fitness gear and activewear available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-adjustable-dumbbells',                                // SLUG DO ARTIGO (URL) = PALAVRA-CHAVE EM formato-url
            'title' => 'Best Adjustable Dumbbells 2026: 10 Ranked, Pair or Single', // TITULO / H1 — CONTEM A PALAVRA-CHAVE
            'meta_title' => 'Best Adjustable Dumbbells 2026: Top 10 Ranked',       // TITLE DA ABA/GOOGLE (48 CHARS)
            'meta_description' => 'We ranked the best adjustable dumbbells on weight range, increments and whether you get one or two. The top-rated set at £165.99 is a single dumbbell.', // META DESCRIPTION (~152 CHARS)
            'focus_keyword' => 'best adjustable dumbbells',                       // PALAVRA-CHAVE PRINCIPAL — VIRA O ALT DO HERO
            'hero_image' => '',                                                   // SEM HERO MANUAL: A VIEW USA A FOTO DO PRODUTO #1 COMO IMAGEM SOCIAL
            'intro' => 'Before anything else, work out whether the price you are looking at buys one dumbbell or two, because in this category that single question routinely doubles the cost. The highest rated adjustable dumbbell set in the whole search, holding 4.7 from more than 1,800 ratings at £165.99, turns out to be one dumbbell: its own bullet points say 2 to 24 kg per dumbbell. A pair costs £331.98. Only three of the ten listings we pulled state this plainly anywhere, and the specification table is no help either, because on half of them the item weight does not match the pair they claim to be selling. On top of that, the same set often appears under several ASINs at wildly different prices, with one brand listing identical dumbbells at £129.90 and £239.90 while sharing a single pool of 233 ratings. So we ranked the best adjustable dumbbells on the three things that decide whether a set is worth buying: how much weight you get per hand, how many increments you can actually train through, and whether the listing tells you the truth about what arrives in the box.', // INTRO OTIMIZADA
            'conclusion' => 'The best adjustable dumbbells for a home gym are the ones whose numbers agree with each other, and there are fewer of those than you would expect. Start by settling the pair question, because a set advertised as a pair at £160 and a single dumbbell at £160 are separated by the entire value of the purchase. Then look at increments rather than the headline maximum. Five weight steps between 2kg and 12kg means jumps of two and a half kilos, which is far too coarse for progressive overload on smaller lifts like lateral raises, whereas twelve or sixteen steps gives you somewhere to go each week. Maximum weight matters less than people assume: 24 kg per hand covers most home training for years, and paying extra for a 30 kg ceiling you will not reach is a common mistake. Finally, if you find the same adjustable dumbbell set under two ASINs at different prices, check the review counts. When they match, it is the same product, and you should simply buy the cheaper listing.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                        // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-27 16:00:00',                              // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'DH FitLife 18KG Adjustable Dumbbells Set, Pair',                           // NOME
                'price' => '£164.99',                                                                // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 658,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/719igAdr2ZL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'DH FitLife 18kg adjustable dumbbell set pair with quick weight change', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CFHQR9N9?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only listing in this guide where every number agrees: an 18kg pair, a 36kg item weight that confirms it, twelve levels from 1.5kg, and a self-locking base.', // TEXTO CURTO DO CARD
                'body' => 'This wins because it is the one adjustable dumbbell set here you can verify without guessing. It says 18kg pair. The specification table gives an item weight of 36kg, which is exactly two 18kg dumbbells. Nothing on the page contradicts anything else on the page. In a category where half the listings claim a pair while quoting the weight of a single, that consistency is worth more than any feature.

The engineering is sound too. Twelve weight levels from 1.5kg to 18kg per hand gives you increments of roughly 1.5kg, which is fine enough for genuine progression on smaller lifts rather than the two-and-a-half kilo leaps you get on the five-step sets further down. The self-locking base is the standout safety detail: the dumbbell can only be lifted out once every plate is properly attached, so you cannot accidentally pick up a half-latched handle mid-session. Each plate also has its own lock.

The cast iron plates are waterproof-coated and the handle is ergonomic and non-slip. DH FitLife is a German company based in Hamburg with a named support operation, which matters on a product where a broken locking mechanism turns the whole thing into scrap. At £164.99 for 36kg of adjustable weight with 658 ratings at 4.6, it is the soundest buy on this page.',
                'pros' => ['18kg pair confirmed by a 36kg item weight, the only consistent listing here', 'Twelve levels from 1.5kg, fine enough for real progression', 'Self-locking base prevents lifting a half-latched handle', 'Individual locks on each weight plate', 'Named German manufacturer with a support operation'],
                'contras' => ['18kg per hand may be outgrown by stronger lifters', 'Cast iron plates are bulkier than moulded ones', '658 ratings, a smaller sample than the top sellers here'],
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'Bowflex SelectTech Adjustable Dumbbell, 2-24kg',                           // NOME
                'price' => '£165.99',                                                                // PRECO NA COLETA
                'rating' => 4.7,                                                                     // NOTA (MAIOR DA LISTA)
                'reviews_count' => 1814,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71uh+zSZ+ZL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Bowflex SelectTech adjustable dumbbell with quick dial weight selection', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B078HDGG7H?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The highest rated product in the category at 4.7 from 1,814 ratings, with 15 increments from 2 to 24kg. Read carefully: that is per dumbbell, and £165.99 buys one.', // TEXTO CURTO DO CARD
                'body' => 'The hardware deserves its 4.7. Fifteen increments between 2kg and 24kg is the finest adjustment of any quick dial set in this guide, the moulded plate coating genuinely cuts the clang that makes home lifting unpopular with neighbours, and the dial mechanism is the one everybody else has been copying for a decade. If you want one dumbbell that covers everything from a warm-up lateral raise to a heavy row, this is the reference.

The thing to be clear about is what £165.99 buys. The first bullet says 2 to 24 kg per dumbbell. The third says one single dumbbell replaces 15 traditional dumbbells. The item weight is 25kg. This is one dumbbell, and to train with a pair you will spend £331.98, which changes the comparison with everything else on this page completely. To Bowflex credit the wording is there in plain English, but the title reads "Adjustable Dumbbells" in the plural and lists five model numbers, so it is easy to skim past.

Judged as a single dumbbell it is excellent and reasonably priced. Judged as a pair it becomes the second most expensive option in this guide, ahead of everything except the POWERBLOCK Elite. Decide which of those you are buying before you compare it with the DH FitLife above.',
                'pros' => ['4.7 from 1,814 ratings, the best score in the category', 'Fifteen increments from 2kg to 24kg, the finest adjustment here', 'Moulded plate coating keeps noise down for flats', 'The original quick dial mechanism, well proven', 'JRNY app integration for guided sessions'],
                'contras' => ['£165.99 buys one dumbbell, so a pair is £331.98', 'The plural title makes the single unit easy to miss', 'No stand or storage tray included at this price', 'Bulky compared with block-style sets at the same weight'],
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'POWERBLOCK Elite EXP Adjustable Dumbbells, Sold in Pairs',                 // NOME
                'price' => '£399.00',                                                                // PRECO NA COLETA (O MAIS CARO DA LISTA)
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 2561,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/81yF5CpdlLL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'POWERBLOCK Elite EXP adjustable dumbbells pair in black block design', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00A21NRNO?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only listing here that both says "Sold in Pairs" in its title and lists all sixteen increments individually. A five-year warranty and expansion kits to 90 lb per hand.', // TEXTO CURTO DO CARD
                'body' => 'POWERBLOCK does the two things this category is worst at. It puts "Sold in Pairs" directly in the product title, removing the single most expensive ambiguity a buyer faces here. Then it lists every increment individually rather than quoting a count: 2.5, 5, 7.5, 10, 15, 17.5, 20, 25, 27.5, 30, 35, 37.5, 40, 45, 47.5 and 50 lb per hand. That transparency lets you see something the others hide, which is that the steps are not even. There are 2.5 lb gaps low down and 5 lb gaps in the middle, so progression is finer where you need it and coarser where you do not.

The block format is the other differentiator. Instead of a long bar with plates on each end, the weight sits in a compact cage roughly 12 by 6 by 6 inches, so it does not sweep your shins on lunges and it stores in a fraction of the floor space. The magnetic polypropylene pin changes weight in a couple of seconds.

Two caveats. At £399 it is by a distance the most expensive item in this guide, though remember that is a genuine pair. And the expansion kits that take it to 70 or 90 lb per hand are sold separately, so the headline expandability costs more again. The five-year warranty, the longest here, and 2,561 ratings at 4.6 make the case for the money.',
                'pros' => ['States "Sold in Pairs" in the title, unlike almost everything here', 'All sixteen increments listed individually rather than counted', 'Compact block shape stores in minimal floor space', 'Five-year warranty, the longest in this guide', '2,561 ratings at 4.6'],
                'contras' => ['£399, the most expensive option here', 'Expansion kits to 70 or 90 lb are sold separately', 'Increments are uneven, with 5 lb gaps in the mid range', 'Block shape feels unfamiliar if you are used to a bar'],
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'ATIVAFIT Adjustable Dumbbells 30KG Pair, 12 Settings',                     // NOME
                'price' => '£314.49',                                                                // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 6446,                                                             // Nº DE AVALIACOES (MAIOR AMOSTRA DA BUSCA INTEIRA)
                'image' => 'https://m.media-amazon.com/images/I/719hByJ6z1L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'ATIVAFIT adjustable dumbbells pair with chromed steel plates and dial', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B7L5R8BZ?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The most reviewed adjustable dumbbell set on Amazon UK, with 6,446 ratings and the highest ceiling here at 30kg per hand. The dial is marked only in pounds.', // TEXTO CURTO DO CARD
                'body' => 'With 6,446 ratings at 4.5 this has more feedback behind it than anything else in the category, and it offers the heaviest ceiling in this guide at 30kg per hand across twelve settings. For a lifter who already presses reasonably heavy and does not want to outgrow a set within a year, that headroom is the main argument, and the chromed steel build with a double safety lock feels appropriately solid.

Two details are worth knowing before you order. The first is small but daily: the dial is marked in pounds only, running 11 lb to 66 lb, on a set sold in the UK with kilograms in the title. Every session involves a small conversion, or memorising which pound number corresponds to your working weight. The listing states this openly, which is more than most manage, but it is an odd choice for a British listing.

The second is the pair question again. The title says Pair and the colour field says 2Pack, which is reassuring, but the specification table gives an item weight of 29.9kg. That is the weight of one 30kg dumbbell, not two. We think this is Amazon per-unit shipping weight rather than a claim about contents, and the title is explicit, but it is another example of why the specification table cannot be used as a check in this category. At £314.49 it is expensive, and the DH FitLife gives you a verifiable pair for £150 less.',
                'pros' => ['6,446 ratings, the largest sample in the category', '30kg per hand, the highest ceiling in this guide', 'Twelve settings with a double safety lock', 'Chromed steel construction with a textured non-slip handle', 'Title and colour field both state a pair'],
                'contras' => ['Dial markings are in pounds only on a kilogram listing', 'Item weight of 29.9kg matches one dumbbell, not two', '£314.49, nearly twice the DH FitLife for a similar job', 'Only twelve settings across a wide 5 to 30kg range'],
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'POWERBLOCK Sport 24 Adjustable Dumbbells, Pair',                           // NOME
                'price' => '£179.00',                                                                // PRECO NA COLETA
                'rating' => 4.7,                                                                     // NOTA
                'reviews_count' => 556,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61HYWZgJyBL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'POWERBLOCK Sport 24 adjustable dumbbells pair in grey block design',   // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B082MK23WG?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The compact POWERBLOCK at half the Elite price, supplied as a pair with eight levels to 11kg per hand. Its Amazon title is, unhelpfully, just "Power Block".', // TEXTO CURTO DO CARD
                'body' => 'This is the entry point into the POWERBLOCK block design and it inherits what makes the Elite good: a compact cage rather than a long bar, so it clears your legs on lunges and stores in almost no space, and the same clear listing style. The bullets spell out all eight weights per hand in both kilograms and pounds, 1.5, 2.5, 4, 5.5, 7, 8, 9.5 and 11kg, and state plainly that it is supplied as a pair. That is more useful information than most listings in this guide manage in five bullets.

The limitation is the ceiling. Eleven kilos per hand is enough for lateral raises, curls and lighter accessory work, and it will run out quickly on rows, presses and goblet squats. If you already train, treat this as a supplementary set rather than your only weights. If you are starting from nothing, it will do a year of work before you need more.

Two oddities. The Amazon title for this ASIN is literally "Power Block", with no model, weight or quantity, which is why it is easy to miss in the search results despite holding 4.7 from 556 ratings. And the item weight is listed as 10.9kg, which again matches one dumbbell rather than the pair the bullets promise. The bullets are the reliable part here.',
                'pros' => ['Supplied as a pair, stated explicitly in the bullets', 'All eight weights listed in both kg and lb', 'Compact block design clears your legs and stores small', '4.7 from 556 ratings', 'Half the price of the POWERBLOCK Elite'],
                'contras' => ['Only 11kg per hand, outgrown quickly on bigger lifts', 'Amazon title is just "Power Block", with no specification', 'Item weight of 10.9kg matches one dumbbell, not a pair', 'Eight increments is fewer than the sets above'],
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'Yaheetech Adjustable Dumbbells Pair, 2.5-24kg',                            // NOME
                'price' => '£159.99',                                                                // PRECO NA COLETA
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 424,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71xq4eNv-jL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Yaheetech adjustable dumbbells pair with quick dial and storage tray', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0H4G1QJNM?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A 2.5 to 24kg pair with a dual-lock plate system and a docking tray, for £6 less than a single Bowflex. Its specification table, however, is completely empty.', // TEXTO CURTO DO CARD
                'body' => 'On the numbers it publishes, this is strong value. A pair covering 2.5kg to 24kg per hand with a single dial puts it in the same weight class as the Bowflex at number two, for £159.99 against £165.99 for one Bowflex dumbbell. The dual-lock mechanism secures each plate twice and only releases them when the dumbbell is docked in its tray, which is the same safety principle as the DH FitLife at number one and a genuinely good design.

The problem is what it does not publish. The specification table on this listing is entirely empty: no brand row, no item weight, no material, nothing. So the one crude check available in this category, comparing the stated item weight against the claimed pair, cannot be applied here at all. The bullets say pair and the title says pair, which is probably that, but there is no second source on the page to confirm it against.

At 4.3 from 424 ratings it also holds the joint lowest score in this guide. Nothing in the feedback pattern suggests a specific fault, and 424 is a reasonable sample, but combined with the empty specification table it is enough to keep it below the sets that document themselves properly. Worth buying if the price gap matters to you; worth checking the delivered weight when it arrives.',
                'pros' => ['2.5 to 24kg per hand as a pair for £159.99', 'Dual-lock plates that only release when docked', 'One-second dial adjustment via internal linkage', 'Textured TPR handle for grip when sweaty', 'Replaces fifteen fixed dumbbells'],
                'contras' => ['Specification table is completely empty, so nothing can be cross-checked', 'Joint lowest rating in this guide at 4.3', 'No stated item weight to confirm the pair claim', 'No warranty length given'],
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'EnterSports 12kg Adjustable Dumbbells Pair, 5 Weights',                    // NOME
                'price' => '£144.99',                                                                // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 1137,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61BVm1g6LpL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'EnterSports 12kg adjustable dumbbells pair with silicon steel plates', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BZQ4J4B4?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A 12kg pair with one-second adjustment and an unusually honest listing that admits the plates wobble slightly. Only five weight steps, though, in jumps of about 2.5kg.', // TEXTO CURTO DO CARD
                'body' => 'EnterSports does something almost nobody does in this category, which is to tell you about a drawback before you find it yourself. Its seventh bullet reads that adjustable dumbbells will have a slight plate wobble and that this is a normal phenomenon, then explains the barb design used to contain it. Every adjustable dumbbell has some play in the plates. This is the only listing here willing to say so, and that candour is worth trusting.

The design is sensible: silicon steel plates, an electroplated non-slip handle, a click that confirms the weight has engaged, and adjustment in about a second by turning the handle on the base. Item weight is 20kg against a claimed 12kg pair, which is at least in the right territory rather than matching a single.

The limitation is granularity. This variant gives you five weights only: 2, 4.5, 7, 9.5 and 12kg. Those are jumps of roughly two and a half kilos, which is a large step when you are adding weight to a lateral raise or a curl, and it means long plateaus where the next setting is simply too heavy. Note too that the title advertises 12kg, 18KG and 27KG, which are separate and pricier variants on the same page, and this listing appears under at least three ASINs between £142.49 and £209.99, all sharing the same 1,137 ratings.',
                'pros' => ['Openly states that plate wobble is normal, unlike any rival here', 'One-second adjustment with an audible confirmation click', '1,137 ratings at 4.6', 'Item weight of 20kg is consistent with a pair', 'One-year warranty with 30-day free returns'],
                'contras' => ['Only five weight steps, in jumps of about 2.5kg', '12kg per hand is a low ceiling for £144.99', 'Sold under at least three ASINs from £142.49 to £209.99', 'Title advertises 18KG and 27KG variants that cost more'],
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'PROIRON 20kg Adjustable Steel Dumbbell with Walnut Handle',                 // NOME
                'price' => '£89.99',                                                                 // PRECO NA COLETA (O MAIS BARATO DA LISTA)
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 411,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/91dwuTjbFjL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'PROIRON 20kg adjustable steel dumbbell with solid walnut wood grip',   // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01N1RDG88?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest entry here at £89.99 for 20kg, in steel with a walnut grip. It is a spinlock design rather than quick dial, and the walnut trays in the photos are not included.', // TEXTO CURTO DO CARD
                'body' => 'At £89.99 for 20kg this is by far the cheapest way onto this page, and the build is genuinely attractive: solid steel with a walnut wood grip and a double anti-loose spinlock collar. The item weight of 20kg matches the stated 20kg exactly, so what you are buying is unambiguous, which is more than can be said for several sets costing three times as much.

The mechanism is the trade-off, and it is a significant one. This is a spinlock dumbbell, meaning you unscrew a collar, slide plates on or off by hand, and screw it back. Changing weight takes perhaps thirty to sixty seconds rather than the one or two seconds a quick dial set needs. For a slow strength session with long rests that is tolerable. For circuits, supersets or anything where you change weight between exercises, it will quietly ruin the workout, and it is the main reason quick dial sets cost more.

The other thing to catch is in the last bullet: the walnut trays that appear throughout the product photography are not included in the set. That is stated, but it is stated fifth, after four bullets that describe how good the trays look. Read the listing to the end before ordering.',
                'pros' => ['£89.99 for 20kg, the cheapest option in this guide', 'Item weight matches the stated weight exactly, so no ambiguity', 'Solid steel with a walnut wood grip', 'Double anti-loose spinlock collar', '411 ratings at 4.3'],
                'contras' => ['Spinlock design takes 30 to 60 seconds per weight change', 'The walnut trays shown in the photos are not included', 'Single dumbbell, so a pair is £179.98', 'Loose plates need somewhere to live between sets'],
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'Eisenlink Adjustable Dumbbell 4-20kg, Single, 2kg Increments',             // NOME
                'price' => '£129.90',                                                                // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 233,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61Q0u4iBJXL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Eisenlink square adjustable dumbbell in alloy steel with anti-slip handle', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BZHH5GWL?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only listing here that states "This is a single dumbbell" in its bullets, which is admirable. Its title still advertises 4-36kg while the product sold is 4-20kg.', // TEXTO CURTO DO CARD
                'body' => 'Credit where it is due. The fifth bullet opens with the words this is a single dumbbell, making Eisenlink one of only three brands in this guide to answer the pair question inside the listing text rather than leaving buyers to work it out. The colour field agrees, reading Single Dumbbell 20kg, and the item weight of 20kg confirms it. On the specific thing this category gets most wrong, this listing is honest.

Unfortunately the headline is not. The product title advertises an Adjustable Dumbbell 4-36kg Weight Set, while the variant actually sold here is 4-20kg. Nine weight stages with 2kg increments across that range is respectable granularity, and the square-bodied design needs no base at all, which is genuinely useful because you can set it down anywhere rather than hunting for a docking tray. But a title promising 36kg on a 20kg product is the kind of thing that sends the wrong set to the wrong buyer.

There is one more thing to watch. The same product appears under a second ASIN at £239.90, sharing this listing 233 ratings. That is £110 between two pages for what the review pool says is the same item. Whatever you decide about the dumbbell itself, buy it from the cheaper page.',
                'pros' => ['States "This is a single dumbbell" plainly in the bullets', 'Nine stages with 2kg increments across 4 to 20kg', 'Square body needs no base, so it can be set down anywhere', 'Snap-fit plates that cannot fall off mid-exercise', 'One-year quality assurance'],
                'contras' => ['Title advertises 4-36kg while this variant is 4-20kg', 'Listed again under another ASIN at £239.90 with the same ratings', '£129.90 for a single 20kg dumbbell is poor value against the DH FitLife pair', 'Only 233 ratings'],
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'Lifepro Adjustable Dumbbells, Quick-Adjust, 11kg',                         // NOME
                'price' => '£138.22',                                                                // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 3073,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71kSlMpPOCL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Lifepro quick-adjust adjustable dumbbells in black and blue',          // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DJFXHGRZ?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A well-reviewed set that maxes out at 11kg for £138.22, and calls itself an 11KG Pair in one bullet and a 10kg Pair in another.', // TEXTO CURTO DO CARD
                'body' => 'The reason this finishes last is not build quality. With 3,073 ratings at 4.6 the feedback is strong, the alloy steel plates are rubber coated with a no-roll head, and the quick-change mechanism does what it says. Plenty of buyers are happy with it.

The reason is what you get for the money. The maximum is 11kg, across five settings of 2.2, 4.4, 6.6, 8.8 and 11kg. That is the lowest ceiling in this guide by some distance, and it costs £138.22, which is £8 less than an EnterSports pair reaching 12kg and only £27 less than a DH FitLife pair reaching 18kg per hand with twelve levels. Anyone who trains with any consistency will be at the top setting within a few months and have nowhere to go.

The listing also cannot decide what it is selling. The second bullet describes it as the 11KG Pair. The fifth describes the same product as a 10kg Pair. The item weight is 11.3kg, which is what one 11kg dumbbell weighs rather than two. Three numbers on one page and no way to reconcile them. Given that the entire difficulty in this category is working out whether you are buying one dumbbell or two, a listing that contradicts itself twice on exactly that point is the one to walk away from.',
                'pros' => ['3,073 ratings at 4.6, a large and positive sample', 'Rubber coated plates with a no-roll head', 'Quick-change mechanism rather than spinlock', 'Compact and easy to store'],
                'contras' => ['Maximum of 11kg, the lowest ceiling in this guide', 'Calls itself an 11KG Pair in one bullet and a 10kg Pair in another', 'Item weight of 11.3kg matches a single dumbbell', 'Only five weight settings for £138.22'],
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
