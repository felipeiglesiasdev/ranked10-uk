<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class CatTreesSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE ARRANHADORES/TORRES PARA GATOS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=cat+tree+tower&rh=p_36%3A3000-  (18 ASINS, 10 FICHAS ABERTAS)
        // CATEGORIA PET SUPPLIES. SAZONAL: SOBE NO INVERNO (gato dentro de casa) E NO NATAL.
        //
        // PADRAO EDITORIAL (30/08): E UM TOP 10, NAO ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── EIXOS DE COMPRA ───
        //   ALTURA 76cm (gatinho/idoso) -> 98cm -> 139-151cm (padrao) -> 180-213cm (XL) -> chao-teto (ajustavel).
        //   TAMANHO DA PLATAFORMA E LARGURA DO POLEIRO: gato grande/gordo precisa de perch largo (Feandrea 45x30cm)
        //     e condo maior (Globlazer 45x30x30cm). CARGA DECLARADA (Yaheetech: condo ate 10kg).
        //   BASE E ESTABILIDADE: base larga + fixacao na parede. TORRE ALTA COM BASE ESTREITA TOMBA.
        //   SISAL x CARPETE nos postes. FSC/E1 (Yaheetech, Amazon Basics) = material certificado.
        //   ⚠ IDADE/MOBILIDADE: degraus curtos (30-40cm entre niveis, Feandrea) importam p/ gato velho ou gordo.
        //
        // PROFUNDIDADE (FICHA): 13.290 / 12.435 / 10.473 / 6.161 / 5.828 / 2.377 / 1.556 / 1.521 / 378 / 137.
        // ⚠ FEANDREA TEM 3 MODELOS AQUI (143cm, 206cm XL, perch largo) COM POOLS SEPARADOS — NAO SAO VARIANTE.
        //
        // FOCUS KEYWORD: best cat tree
        // VARIACOES: cat tree / cat tower / cat tree for large cats / tall cat tree / cat scratching post tower /
        // floor to ceiling cat tree / cat tree uk / kitten cat tree / cat condo
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'pet-supplies',
            'name' => 'Pet Supplies',
            'description' => 'Everything your furry friends need, ranked by quality, comfort and value.',
        ];

        $article = [
            'slug' => 'best-cat-tree',
            'title' => 'Best Cat Tree 2026: 10 Cat Towers Ranked by Size and Stability',
            'meta_title' => 'Best Cat Tree 2026: 10 Cat Towers Ranked',
            'meta_description' => 'The best cat tree picks for UK homes, from Feandrea to floor-to-ceiling towers. Ten cat towers compared on height, perch size and stability.',
            'focus_keyword' => 'best cat tree',

            'intro' => "If you want the short answer, the Feandrea 143cm is the best cat tree for most homes: 13,290 ratings at 4.7 stars, two perches, a cave and a hammock, and a sensible height that suits an average adult cat, for GBP 32.99. If you have a big cat, the Feandrea with the widened 45 x 30cm perch is the one to buy instead.

Three things decide whether a cat tree gets used or ignored. The first is height, and taller is not automatically better: 139 to 151cm suits most adult cats, 180cm and up is for confident climbers, and a kitten or an older cat with stiff joints does better on a low tower with short steps between levels. The second is the size of the platforms — a large or heavy cat simply will not fold onto a small perch, however tall the tree is. The third is stability, which is what actually stops a cat abandoning it: a wide base, a reinforced bottom and, on tall towers, fixing to the wall. We compared ten on those points, plus scratching posts, materials and price.",

            'conclusion' => "For most homes the best cat tree here is the Feandrea 143cm. It has the most reviews of any tower on this page, it packs in perches, a cave, a hammock and scratching posts at a sensible height, and it costs about thirty pounds. If your cat is large or heavy, spend the extra few pounds on the Feandrea with the widened perch, and if you want maximum climbing, the 206cm XL has short 30 to 40cm gaps between levels so cats can actually get up it.

Match the tree to the cat, not the room. A kitten or an elderly cat is better served by the small Taoqimiao or the Amazon Basics than by a tower it cannot climb, while a household of several cats wants the Yaheetech, which has seven levels and condos rated to 10kg each. And on any tall tower, use the wall fixing: a 200cm tower with a cat launching off the top platform needs to be anchored, and that single step is the difference between a tree your cat trusts and one it avoids.",

            'author' => 'Felipe Iglesias',
            'published_at' => '2026-09-03 06:00:00',
        ];

        $products = [
            [
                'position' => 1,
                'name' => 'Feandrea Cat Tree Tower 143cm, 2 Perches, Cave, Hammock, 4 Scratching Posts',
                'price' => '£32.99',
                'rating' => 4.7,
                'reviews_count' => 13290,
                'image' => 'https://m.media-amazon.com/images/I/71rmdPmFpuL._AC_SL1500_.jpg',
                'alt_text' => 'best cat tree',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08XTMNMMZ?tag=ranked10-21',
                'summary' => 'The best cat tree for most homes. 13,290 ratings at 4.7 stars, two perches, a cave and a hammock at a sensible 143cm, for GBP 32.99.',
                'body' => "Thirteen thousand two hundred and ninety ratings at 4.7 stars is the largest and best-scoring combination on this page, and the tree behind it is well judged rather than showy. At 143cm it is tall enough for a cat to survey a room from above without being so tall that it dominates a lounge or needs serious anchoring, and it packs in the things cats actually use: two top perches, an enclosed cave, a soft hammock, four sisal scratching posts and two hanging pompoms with bells.

A climbing step on the side makes it easy to get up, which matters more than people expect — a tree a cat has to leap onto gets used far less than one with an obvious route.

Assembly is the usual flat-pack job with labelled parts and an Allen key. At GBP 32.99 there is very little to criticise; if your cat is unusually large, the widened-perch Feandrea below is the better fit, and if you want a real climbing frame, the 206cm XL gives you more levels for twenty pounds more.",
                'pros' => ['13,290 ratings at 4.7 stars, the best combination here', 'Two perches, a cave and a hammock in one tower', '143cm suits most adult cats without dominating a room', 'Climbing step makes the route up obvious', 'Four sisal scratching posts and pompoms, for GBP 32.99'],
                'contras' => ['Perches are standard size, tight for a very large cat', 'Not tall enough for a determined climber', 'Flat-pack assembly required', 'Plush covering picks up hair'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '13,290 at 4.7 stars', 'verdict' => 'good', 'note' => 'The most on this page.'],
                    ['label' => 'Height', 'value' => '143 cm', 'verdict' => 'good', 'note' => 'Suits most adult cats.'],
                    ['label' => 'Features', 'value' => '2 perches, cave, hammock', 'verdict' => 'good'],
                    ['label' => 'Scratching posts', 'value' => '4, sisal', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£32.99', 'verdict' => 'good'],
                    ['label' => 'Access', 'value' => 'Climbing step', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Feandrea Cat Tree with Widened 45 x 30cm Perch for Large Cats',
                'price' => '£35.99',
                'rating' => 4.7,
                'reviews_count' => 10473,
                'image' => 'https://m.media-amazon.com/images/I/81r4xxy9BNL._AC_SL1500_.jpg',
                'alt_text' => 'Feandrea cat tree with widened perch for large cats',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07QL5B313?tag=ranked10-21',
                'summary' => 'The pick for big cats. A widened 45 x 30cm perch and a two-door cave, so a large or heavy cat actually fits, at 4.7 stars.',
                'body' => "Most cat trees are built for an average cat, and owners of Maine Coons, British Shorthairs and generally chunky cats know the result: the cat sits with its legs hanging off a perch designed for something smaller and eventually stops bothering. This Feandrea fixes that with a widened 45 x 30cm perch that a big cat can properly settle on, and it has 10,473 ratings at 4.7 stars.

The cave has two doors, which sounds like a detail but matters for a larger cat that does not want to reverse out of a dead end, and the scratching ramp doubles as a ladder, giving a gentler route up than a vertical post for a heavy animal.

At GBP 35.99 it is three pounds more than the standard 143cm model, which is nothing if your cat is the size that needs it. If your cat is average-sized, you gain nothing from the extra width and the cheaper model above is the better buy.",
                'pros' => ['Widened 45 x 30cm perch fits large and heavy cats', '10,473 ratings at 4.7 stars', 'Two-door cave, easier for a big cat to use', 'Scratching ramp doubles as a gentle ladder', 'Only a few pounds more than the standard model'],
                'contras' => ['No advantage for an average-sized cat', 'Still a mid-height tower, not a climbing frame', 'Flat-pack assembly', 'Light grey plush shows dirt'],
                'specs' => [
                    ['label' => 'Perch size', 'value' => '45 x 30 cm widened', 'verdict' => 'good', 'note' => 'Built for large cats.'],
                    ['label' => 'Customer ratings', 'value' => '10,473 at 4.7 stars', 'verdict' => 'good'],
                    ['label' => 'Cave', 'value' => 'Two doors', 'verdict' => 'good'],
                    ['label' => 'Access', 'value' => 'Scratching ramp ladder', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£35.99', 'verdict' => 'good'],
                    ['label' => 'Best for', 'value' => 'Big or heavy cats', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Feandrea Cat Tree 206cm XL, 5 Levels, 13 Scratching Posts, Hammock',
                'price' => '£54.38',
                'rating' => 4.7,
                'reviews_count' => 12435,
                'image' => 'https://m.media-amazon.com/images/I/71Bhbp+34vL._AC_SL1500_.jpg',
                'alt_text' => 'Feandrea 206cm XL cat tree tower',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08MQG7WQL?tag=ranked10-21',
                'summary' => 'The proper climbing tower. 206cm and five levels, with short 30 to 40cm steps between them so cats can actually get to the top.',
                'body' => "If your cat wants height, this is the one. At 206cm over five levels it is a genuine climbing structure rather than a tall post, and the detail that makes it work is the spacing: Feandrea keeps 30 to 40cm between levels, short enough that a cat steps up rather than having to jump, which is what stops most tall towers being used above the second platform. It has 12,435 ratings at 4.7 stars.

There are 14 scratching zones spread across the levels, two padded perches, two caves, two pompoms and a hammock, so several cats can use it at once without arguing.

Stability is handled with a large base and a reinforced bottom, and it should be fixed to the wall — at this height that is not optional. At GBP 54.38 it costs more than the mid-height trees, and it needs a corner where a two-metre tower makes sense, which not every living room has.",
                'pros' => ['206cm over five levels, a real climbing structure', 'Short 30 to 40cm steps so cats can walk up, not leap', '12,435 ratings at 4.7 stars', '14 scratching zones, two caves, two perches and a hammock', 'Large base with reinforced bottom'],
                'contras' => ['Two metres tall, dominates most rooms', 'Must be fixed to the wall at this height', 'GBP 54.38, dearer than the mid-height trees', 'Big flat-pack to assemble'],
                'specs' => [
                    ['label' => 'Height', 'value' => '206 cm, 5 levels', 'verdict' => 'good', 'note' => 'A genuine climbing tower.'],
                    ['label' => 'Step spacing', 'value' => '30 to 40 cm', 'verdict' => 'good', 'note' => 'Cats step up rather than jump.'],
                    ['label' => 'Customer ratings', 'value' => '12,435 at 4.7 stars', 'verdict' => 'good'],
                    ['label' => 'Scratching zones', 'value' => '14', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£54.38', 'verdict' => 'neutral'],
                    ['label' => 'Wall fixing', 'value' => 'Needed', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Yaheetech 139cm Cat Tree, 7 Levels, 2 Condos to 10kg, FSC Certified',
                'price' => '£32.98',
                'rating' => 4.6,
                'reviews_count' => 6161,
                'image' => 'https://m.media-amazon.com/images/I/81PT8p9g8zL._AC_SL1500_.jpg',
                'alt_text' => 'Yaheetech 139cm cat tree with condos',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08LGXRW95?tag=ranked10-21',
                'summary' => 'The pick for several cats. Seven levels, three perches and two condos each rated to 10kg, on a compact 49 x 49cm base.',
                'body' => "This is the tower to buy for a multi-cat household. Seven levels, three perches and two condos give enough separate spots that cats are not forced to share, and Yaheetech states each condo takes up to 10kg — a published load figure, which most cat tree listings do not give you at all. It has 6,161 ratings at 4.6 stars.

Its other strength is footprint. A 49 x 49cm base keeps it out of the way in a small flat while an anti-toppling fixing handles the stability, and it is built from FSC-certified, E1-compliant board, so the materials are documented rather than anonymous chipboard.

At GBP 32.98 it costs the same as the Feandrea 143cm, so the choice is really about layout: the Feandrea has bigger, more comfortable individual spots, while the Yaheetech has more of them in a smaller footprint. For one cat, buy the Feandrea; for three, buy this.",
                'pros' => ['Seven levels and two condos, room for several cats', 'Published 10kg load rating per condo', 'Compact 49 x 49cm base for small flats', 'FSC-certified, E1-compliant materials', '6,161 ratings at 4.6 stars'],
                'contras' => ['Individual platforms are smaller than the Feandrea', 'Narrow base means anti-toppling fixing matters', 'Less plush than the Feandrea trees', 'Busy structure in a small room'],
                'specs' => [
                    ['label' => 'Levels', 'value' => '7, plus 2 condos', 'verdict' => 'good', 'note' => 'Best here for several cats.'],
                    ['label' => 'Load rating', 'value' => '10 kg per condo', 'verdict' => 'good', 'note' => 'Few listings publish this.'],
                    ['label' => 'Footprint', 'value' => '49 x 49 cm base', 'verdict' => 'good'],
                    ['label' => 'Materials', 'value' => 'FSC, E1 compliant', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '6,161 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Height', 'value' => '139 cm', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Amazon Basics Multi-Level Cat Activity Tower, 76.6cm, FSC Certified',
                'price' => '£30.30',
                'rating' => 4.5,
                'reviews_count' => 5828,
                'image' => 'https://m.media-amazon.com/images/I/81Tbk+pceXL._AC_SL1500_.jpg',
                'alt_text' => 'Amazon Basics multi-level cat activity tower',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DRY2WTWV?tag=ranked10-21',
                'summary' => 'A low, space-smart tower for kittens, older cats and small flats, with a condo and hammock and FSC-certified materials.',
                'body' => "At 76.6cm this is the shortest tower on the page, and that is the point. A kitten still learning to climb, or an older cat with stiff joints, is far better served by a low tower it can use confidently than by a two-metre structure it looks at from the floor. It is also the obvious choice where floor space and ceiling height are tight.

It packs a condo, a hammock and scratching posts into that small frame, uses FSC-certified materials with a documented certificate number, and has a reinforced base for stability. With 5,828 ratings at 4.5 stars it is well proven.

The trade is obvious: an active adult cat will outgrow it quickly and want the height the taller trees offer. Buy it as a first tower for a kitten, as a gentler option for an elderly cat, or as a second scratching spot in another room.",
                'pros' => ['Low 76.6cm height suits kittens and older cats', 'Condo, hammock and scratching posts in a small frame', 'FSC-certified materials with a stated certificate number', 'Reinforced base for stability', '5,828 ratings at 4.5 stars'],
                'contras' => ['Too small for an active adult climber', 'No high vantage point', 'Cats often outgrow it within a year', '4.5 stars, below the Feandrea trees'],
                'specs' => [
                    ['label' => 'Height', 'value' => '76.6 cm', 'verdict' => 'neutral', 'note' => 'Best for kittens and older cats.'],
                    ['label' => 'Customer ratings', 'value' => '5,828 at 4.5 stars', 'verdict' => 'good'],
                    ['label' => 'Materials', 'value' => 'FSC certified', 'verdict' => 'good'],
                    ['label' => 'Features', 'value' => 'Condo and hammock', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£30.30', 'verdict' => 'neutral'],
                    ['label' => 'Footprint', 'value' => 'Small', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'HOMIDEC Cat Tree 151cm, 2 Perches, 2 Condos, Sturdy Chipboard Columns',
                'price' => '£39.99',
                'rating' => 4.5,
                'reviews_count' => 2377,
                'image' => 'https://m.media-amazon.com/images/I/71b6aC2sGLL._AC_SL1500_.jpg',
                'alt_text' => 'HOMIDEC 151cm cat tree tower',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09PNKGPGK?tag=ranked10-21',
                'summary' => 'A solid mid-height alternative at 151cm, with two padded perches and two cosy houses, at 4.5 stars over 2,377 ratings.',
                'body' => "The HOMIDEC covers the same ground as the Feandrea 143cm with a little more height at 151cm and a slightly different layout: two padded top perches and two enclosed houses rather than one cave and a hammock, which suits cats that prefer to hide rather than lounge in the open.

It is built on sturdy chipboard columns with a 48 x 48cm base, and has 2,377 ratings at 4.5 stars.

It sits below the Feandrea and Yaheetech trees because it costs seven pounds more than either while having a quarter of the reviews and a slightly lower score. It is a perfectly good tower — buy it if the two-house layout suits your cats better, or if it is discounted below the Feandrea on the day.",
                'pros' => ['151cm with two padded perches and two enclosed houses', 'Good for cats that prefer to hide rather than lounge', 'Sturdy chipboard columns and a 48 x 48cm base', '2,377 ratings at 4.5 stars', 'Straightforward assembly'],
                'contras' => ['GBP 39.99, dearer than better-reviewed rivals', 'A quarter of the reviews of the Feandrea trees', '4.5 stars, below the top picks', 'Nothing it does that the cheaper trees do not'],
                'specs' => [
                    ['label' => 'Height', 'value' => '151 cm', 'verdict' => 'good'],
                    ['label' => 'Layout', 'value' => '2 perches, 2 houses', 'verdict' => 'good', 'note' => 'Suits cats that like to hide.'],
                    ['label' => 'Customer ratings', 'value' => '2,377 at 4.5 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£39.99', 'verdict' => 'bad', 'note' => 'Dearer than better-rated rivals.'],
                    ['label' => 'Base', 'value' => '48 x 48 cm', 'verdict' => 'neutral'],
                    ['label' => 'Build', 'value' => 'Chipboard columns', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Taoqimiao Cat Tree 180cm, 2 Perches, Hanging Basket, Hammock',
                'price' => '£75.99',
                'rating' => 4.6,
                'reviews_count' => 1556,
                'image' => 'https://m.media-amazon.com/images/I/71mzTc3ymrL._AC_SL1500_.jpg',
                'alt_text' => 'Taoqimiao 180cm large cat tree',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CRDD8CFR?tag=ranked10-21',
                'summary' => 'A tall 180cm tower with a hanging basket as well as perches and a hammock, at 4.6 stars — but priced well above the Feandrea XL.',
                'body' => "The Taoqimiao is a well-made tall tower at 180cm, and its distinguishing feature is the hanging basket, which swings gently and is the spot a lot of cats end up choosing over a flat perch. Alongside it there are two perches, a house and a hammock, plus a removable plush ball toy, so there is plenty of variety in one structure. It has 1,556 ratings at 4.6 stars.

Taoqimiao makes a point of the structure being designed for stability, and the soft, easy-to-clean covering is a step above basic carpet.

The problem is value. At GBP 75.99 it costs twenty-one pounds more than the Feandrea 206cm XL, which is taller, has more levels and eight times the reviews. Choose the Taoqimiao if you specifically want the hanging basket and prefer its looks; on the numbers, the Feandrea XL is the better buy.",
                'pros' => ['180cm tall with a hanging basket cats tend to favour', 'Two perches, a house and a hammock as well', '4.6 stars over 1,556 ratings', 'Soft, easy-to-clean covering', 'Structure designed around stability'],
                'contras' => ['GBP 75.99, well above the taller Feandrea XL', 'Eight times fewer reviews than that rival', 'Heavy to move once built', 'Needs wall fixing at this height'],
                'specs' => [
                    ['label' => 'Height', 'value' => '180 cm', 'verdict' => 'good'],
                    ['label' => 'Hanging basket', 'value' => 'Yes', 'verdict' => 'good', 'note' => 'A favourite spot for many cats.'],
                    ['label' => 'Customer ratings', 'value' => '1,556 at 4.6 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£75.99', 'verdict' => 'bad', 'note' => 'Dearer than the taller Feandrea XL.'],
                    ['label' => 'Covering', 'value' => 'Soft, wipeable', 'verdict' => 'good'],
                    ['label' => 'Features', 'value' => 'Perches, house, hammock', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Taoqimiao Cat Tree 98cm, Small Tower for Kittens and Smaller Cats',
                'price' => '£33.99',
                'rating' => 4.5,
                'reviews_count' => 1521,
                'image' => 'https://m.media-amazon.com/images/I/71Ic71i4Q9L._AC_SL1500_.jpg',
                'alt_text' => 'Taoqimiao 98cm small cat tree for kittens',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CSXWDXP1?tag=ranked10-21',
                'summary' => 'A compact 98cm tower designed for kittens and small to medium cats, with a condo, adjustable basket and a luxurious perch.',
                'body' => "This sits between the very low Amazon Basics tower and the full-height trees: at 98cm it gives a kitten or a small adult cat somewhere to climb and survey the room without being a structure they cannot manage. It has a condo, an adjustable basket and a padded top perch, with a reinforced base for stability and a stuffed ball with bells to get play started.

With 1,521 ratings at 4.5 stars it is well proven, and the flannel covering is soft and easy to keep clean.

It ranks here because at GBP 33.99 it costs about the same as the taller, far more reviewed Feandrea 143cm, so it only makes sense if you specifically want a smaller tower. For a growing kitten that will be a full-sized cat within a year, buying the taller tree now is usually the better spend.",
                'pros' => ['98cm suits kittens and small to medium cats', 'Condo, adjustable basket and padded perch', 'Reinforced base for stability', '1,521 ratings at 4.5 stars', 'Soft flannel covering, easy to clean'],
                'contras' => ['Costs about the same as the much taller Feandrea 143cm', 'A growing kitten will outgrow it', 'Fewer features than full-height trees', '4.5 stars, below the Feandrea towers'],
                'specs' => [
                    ['label' => 'Height', 'value' => '98 cm', 'verdict' => 'neutral', 'note' => 'For kittens and smaller cats.'],
                    ['label' => 'Customer ratings', 'value' => '1,521 at 4.5 stars', 'verdict' => 'neutral'],
                    ['label' => 'Features', 'value' => 'Condo, basket, perch', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£33.99', 'verdict' => 'bad', 'note' => 'Same price as much taller trees.'],
                    ['label' => 'Base', 'value' => 'Reinforced', 'verdict' => 'good'],
                    ['label' => 'Covering', 'value' => 'Flannel', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'Globlazer F83 Cat Tree Tower 213cm, Two 45 x 30cm Condos for Large Cats',
                'price' => '£84.99',
                'rating' => 4.7,
                'reviews_count' => 378,
                'image' => 'https://m.media-amazon.com/images/I/81LNGiTGwQL._AC_SL1500_.jpg',
                'alt_text' => 'Globlazer F83 213cm cat tree for large cats',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GGFC4FL7?tag=ranked10-21',
                'summary' => 'The tallest here at 213cm, with two roomy 45 x 30 x 30cm condos sized for heavy cats and an extra-large padded platform.',
                'body' => "At 213cm this is the tallest tower in the comparison, and unusually it is built for big cats rather than just tall rooms: two condos measuring 45 x 30 x 30cm are genuinely roomy for a heavy cat, and the extra-large padded platform gives a full-sized animal somewhere to sprawl rather than perch. With multiple lounging spots spread up the frame, several large cats can use it at once. It has 378 ratings at 4.7 stars.

For a household with Maine Coons, Ragdolls or simply several substantial cats, that combination of height and platform size is hard to find.

Two things keep it at ninth. At GBP 84.99 it is one of the dearest trees here, and 378 ratings is a modest sample next to the ten-thousand-plus behind the Feandrea towers. It also needs both space and a wall fixing — at over two metres, anchoring is essential.",
                'pros' => ['213cm, the tallest tower in this comparison', 'Two roomy 45 x 30 x 30cm condos for heavy cats', 'Extra-large padded lounging platform', 'Multiple spots so several big cats can use it', '4.7 star average'],
                'contras' => ['GBP 84.99, among the dearest here', '378 ratings, a modest sample', 'Needs serious space and a wall fixing', 'Large, heavy flat-pack to build'],
                'specs' => [
                    ['label' => 'Height', 'value' => '213 cm', 'verdict' => 'good', 'note' => 'The tallest here.'],
                    ['label' => 'Condo size', 'value' => '45 x 30 x 30 cm', 'verdict' => 'good', 'note' => 'Sized for heavy cats.'],
                    ['label' => 'Customer ratings', 'value' => '378 at 4.7 stars', 'verdict' => 'bad', 'note' => 'Modest sample.'],
                    ['label' => 'Price', 'value' => '£84.99', 'verdict' => 'bad'],
                    ['label' => 'Wall fixing', 'value' => 'Essential', 'verdict' => 'neutral'],
                    ['label' => 'Best for', 'value' => 'Several large cats', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'FUKUMARU Floor to Ceiling Cat Tree, 6 Levels, Adjustable 6-10ft',
                'price' => '£88.35',
                'rating' => 4.5,
                'reviews_count' => 137,
                'image' => 'https://m.media-amazon.com/images/I/51LX40GI0QL._AC_SL1500_.jpg',
                'alt_text' => 'FUKUMARU floor to ceiling adjustable cat tree',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F5V4V918?tag=ranked10-21',
                'summary' => 'A floor-to-ceiling design that braces against the ceiling for stability and adjusts from 6 to 10 feet — the most space-efficient tower here.',
                'body' => "This is a different kind of cat tree. Instead of standing free on a wide base, it braces between the floor and the ceiling, adjustable from roughly 6 to 10 feet to fit your room. That does two things: it is far more stable than a tall free-standing tower, because it is wedged in place rather than balanced, and it uses almost no floor space, running up a wall instead of occupying a corner.

Six levels give plenty of climbing, the main structure is rubber wood plywood rather than chipboard, and it is designed to be easy to wipe down. It has 137 ratings at 4.5 stars.

Two caveats. At GBP 88.35 it is the most expensive tower on this page, and 137 ratings is the smallest sample here by a wide margin. It also depends on your ceiling: a plasterboard or sloped ceiling may not give the bracing it needs. If you have the right room and want climbing height without losing floor space, nothing else here does the same job.",
                'pros' => ['Braces floor to ceiling, far more stable than a tall free-standing tower', 'Uses almost no floor space', 'Adjustable from about 6 to 10 feet', 'Six levels of climbing, rubber wood plywood build', 'Easy to wipe clean'],
                'contras' => ['GBP 88.35, the most expensive tower here', 'Only 137 ratings, the smallest sample', 'Needs a suitable solid, level ceiling', 'Fiddlier to install than a free-standing tree'],
                'specs' => [
                    ['label' => 'Type', 'value' => 'Floor to ceiling', 'verdict' => 'good', 'note' => 'Braced, not balanced.'],
                    ['label' => 'Height', 'value' => 'Adjustable 6-10 ft', 'verdict' => 'good'],
                    ['label' => 'Floor space', 'value' => 'Minimal', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '137 at 4.5 stars', 'verdict' => 'bad', 'note' => 'Smallest sample here.'],
                    ['label' => 'Price', 'value' => '£88.35', 'verdict' => 'bad', 'note' => 'The dearest here.'],
                    ['label' => 'Ceiling', 'value' => 'Must suit bracing', 'verdict' => 'neutral'],
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
        $this->command?->info("CatTreesSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos).");
    }
}
