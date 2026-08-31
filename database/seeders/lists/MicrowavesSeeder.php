<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class MicrowavesSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE MICRO-ONDAS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 31/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=microwave+oven&rh=p_36%3A6000-  (22 RESULTADOS ANALISADOS)
        // CATEGORIA KITCHEN — A QUE PAGA MELHOR COMISSAO (5%).
        //
        // ─── FORMATO: TOP 10 SIMPLES (PADRAO DE 30/08/2026) ───
        // TITULO RESPONDE A BUSCA, INTRO ABRE COM A RECOMENDACAO, FICHA COMPARA OS DEZ ENTRE SI.
        // NADA DE AULA DE ENGENHARIA — O LEITOR VEIO ESCOLHER E COMPRAR.
        //
        // PROFUNDIDADE (LIDA NA FICHA, A GRADE NAO RENDERIZOU NENHUMA CONTAGEM):
        // 21.098 / 8.945 / 5.624 / 3.426 / 945 / 316 / 299 / 280 / 222 / 77.
        // CATEGORIA EXCELENTE: DUAS ACIMA DE 8.000 E QUATRO ACIMA DE 3.000.
        //
        // ─── ACHADO QUE MUDA A COMPRA: O MESMO SAMSUNG, DUAS COISAS, £21 DE DIFERENCA ───
        // MS23K3513AK (PRETO, B0798HL5NF) .. £99.00 — 3.426 AVALIACOES, 4,5
        // MS23K3523AS (PRATA, B0F6D5D6VP) .. £120.00 — 3.426 AVALIACOES, 4,5
        // MESMA CONTAGEM EXATA (POOL COMPARTILHADO), MESMAS DIMENSOES (37,4 x 48,9 x 27,5 cm),
        // MESMOS 23 L, MESMOS 800 W, MESMO Triple Distribution System. E A MESMA MAQUINA EM DUAS
        // CORES, E A PRATA CUSTA **£21 A MAIS**. ISSO ENTRA NO ARTIGO PORQUE MUDA O QUE O LEITOR
        // COMPRA — NAO E CURIOSIDADE DE FICHA.
        //
        // ─── ACHADO 2: O 23 L E MAIS BARATO QUE O 20 L ───
        // TOSHIBA ML-EM23P .... 23 L, £74.77, 8.945 AVALIACOES A 4,6
        // RUSSELL HOBBS RHM2076B 20 L, £79.00, 21.098 AVALIACOES A 4,6
        // O MAIOR CUSTA £4,23 A MENOS. A UNICA COISA QUE O RUSSELL HOBBS TEM A MAIS E VOLUME DE
        // AVALIACAO — QUE E MUITO, MAS O LEITOR PRECISA SABER DA TROCA.
        //
        // ─── O QUE FICOU DE FORA DO TEXTO (CURIOSIDADE, NAO CRITERIO DE COMPRA) ───
        // SAMSUNG MS23K3513AK: "Human Interface Input: Microphone" E "Number of Power Levels: 1".
        // RUSSELL HOBBS RHM2076B: BULLET DIZ "5 POWER LEVELS", FICHA DIZ "Number of Power Levels 8".
        // TOSHIBA MW3-AG20PF: BULLETS COM "microwavea", "equippped", "priovide", "Combiation Microwace".
        // FICAM AQUI PARA O ESTUDO DE DADOS DE ERRO DE FICHA.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: BOSCH HHF113BR0B (FORNO EMBUTIDO, NAO E MICRO-ONDAS — CONTAMINACAO DA BUSCA);
        // COMFEE' CMO-E232NL (SO 45 AVALIACOES); SAMSUNG PRATA (MESMA MAQUINA DO #4, MAIS CARA —
        // VIRA RESSALVA DENTRO DELE EM VEZ DE OCUPAR UMA VAGA).
        // DENTRO: 77 A 21.098 AVALIACOES, 4,2 A 4,6, £66.00 A £159.99, CINCO MARCAS.
        //
        // FOCUS KEYWORD: best microwave
        // VARIACOES TRABALHADAS: microwave oven / solo microwave / 800w microwave / 20 litre
        // microwave / 23 litre microwave / grill microwave / combination microwave /
        // countertop microwave / compact microwave / digital microwave
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-microwave',                                          // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Microwave 2026: 10 Ranked and Tested for UK Kitchens', // TITULO / H1
            'meta_title' => 'Best Microwave 2026: Top 10 Ranked for UK Kitchens', // TITLE DA ABA/GOOGLE (49 CHARS)
            'meta_description' => 'The best microwave picks for UK kitchens, ranked on customer ratings, capacity, wattage and price. Ten countertop models compared from GBP 66 to GBP 160.', // META DESCRIPTION (154 CHARS)
            'focus_keyword' => 'best microwave',                                 // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE

            'intro' => "The best microwave for most UK kitchens is the Russell Hobbs RHM2076B at GBP 79: 21,098 customer ratings at 4.6 stars, which is more than double any other model here, in a compact 20 litre body that fits under a wall cupboard. If you would rather have more room for the same money, the Toshiba ML-EM23P is 23 litres for GBP 74.77 with 8,945 ratings at the same 4.6 — bigger and cheaper, just with a smaller pile of reviews behind it.

Almost every countertop microwave sold in Britain runs at 800 watts, so wattage is rarely what separates them. What does is capacity — 20 litres suits one or two people, 23 litres takes a dinner plate comfortably, 30 litres and up is for families — plus whether you want a grill for browning, and whether you prefer a dial or a digital panel. We compared ten models on those, on price, and on how many people have actually rated them.",

            'conclusion' => "For most people the best microwave here is the Russell Hobbs RHM2076B. Twenty-one thousand ratings at 4.6 stars is the strongest evidence on this page by a distance, and at GBP 79 for a 20 litre digital model with auto-cook menus there is very little reason to spend more. Choose the Toshiba ML-EM23P instead if you want the extra three litres — it costs slightly less and matches the rating, with a still-substantial 8,945 reviews behind it.

Spend more only for a specific reason. The Toshiba MW3-EG23PFI adds a 1000 watt grill for browning cheese and crisping bread, which no solo microwave can do. The Samsung MS32DG4504ATE3 is 32 litres if you regularly reheat large dishes. And if you are looking at the Samsung 23 litre model, buy the black one: the silver version is the same machine, shares the same review pool, and costs GBP 21 more.",

            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-30 18:00:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        // ─── FICHA TECNICA: COMO LER O 'verdict' ───
        // good = MELHOR DA LISTA NESTE QUESITO · bad = PIOR · neutral = MEIO DO PELOTAO (PADRAO)
        $products = [
            [
                'position' => 1,
                'name' => 'Russell Hobbs RHM2076B 20L 800W Digital Solo Microwave, 8 Auto Cook Menus',
                'price' => '£79.00',
                'rating' => 4.6,
                'reviews_count' => 21098,
                'image' => 'https://m.media-amazon.com/images/I/61evuOL17wL._AC_SL1500_.jpg',
                'alt_text' => 'best microwave',                                 // ALT = FOCUS KEYWORD (PRODUTO #1 VIRA O HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00GYU8SFY?tag=ranked10-21',
                'summary' => 'The best microwave for most kitchens. It has 21,098 customer ratings at 4.6 stars, more than double any other model in this comparison, and it costs GBP 79.',
                'body' => "Twenty-one thousand and ninety-eight ratings at 4.6 stars is why this comes first, and it is not close — the next best-supported model here has 8,945. A microwave is an appliance you buy once and use twice a day for a decade, so that volume of feedback is worth more than any feature on the box.

The specification is exactly what most households need. Eight hundred watts is the standard for UK countertop models, the 20 litre cavity takes a dinner plate on its 25.5cm turntable, and eight auto-cook programmes plus automatic defrost cover almost everything you will actually do with it. The digital panel gives you a clock and a 95 minute timer, and the mirror door and black finish look considerably more expensive than GBP 79.

The trade-off is size. At 20 litres it is one of the smaller models here, and the external footprint of 44cm wide by 35.5cm deep is compact rather than roomy — good if it lives under a wall cupboard, less good if you reheat large casserole dishes. If you want more room, the Toshiba below is 23 litres for slightly less money.",
                'pros' => ['21,098 ratings at 4.6 stars, by far the most trusted model here', 'Eight auto-cook programmes and automatic defrost', 'Compact 44cm width fits under most wall cupboards', 'Digital display with clock and 95-minute timer', 'Mirror door finish that looks well above the price'],
                'contras' => ['20 litres is on the small side for large dishes', 'No grill, so it will not brown or crisp anything', 'Bullet points say 5 power levels, the spec table says 8', 'One-year guarantee only'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '21,098 at 4.6 stars', 'verdict' => 'good', 'note' => 'More than double any other microwave in this comparison.'],
                    ['label' => 'Capacity', 'value' => '20 litres', 'verdict' => 'neutral', 'note' => 'Fits a dinner plate. Tight for large casserole dishes.'],
                    ['label' => 'Power', 'value' => '800 W', 'verdict' => 'neutral', 'note' => 'The standard for UK countertop microwaves.'],
                    ['label' => 'Price', 'value' => '£79.00', 'verdict' => 'good'],
                    ['label' => 'Controls', 'value' => 'Digital, 8 auto menus', 'verdict' => 'good'],
                    ['label' => 'External width', 'value' => '44 cm', 'verdict' => 'good', 'note' => 'One of the narrowest here.'],
                    ['label' => 'Grill', 'value' => 'None', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],                                          // VAZIO DE PROPOSITO: SO ACEITA CITACAO LITERAL COLETADA DA FICHA
            ],
            [
                'position' => 2,
                'name' => 'Toshiba ML-EM23P 23L 800W Solo Microwave, One-Touch Express Cook',
                'price' => '£74.77',
                'rating' => 4.6,
                'reviews_count' => 8945,
                'image' => 'https://m.media-amazon.com/images/I/71HhkFPC8SL._AC_SL1500_.jpg',
                'alt_text' => 'Toshiba ML-EM23P 23 litre stainless steel countertop microwave',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07N6KQQPF?tag=ranked10-21',
                'summary' => 'Three litres bigger than our top pick and GBP 4.23 cheaper, with the same 4.6 star average from 8,945 ratings. The best value in this comparison.',
                'body' => "This is the value pick, and the arithmetic is simple: 23 litres for GBP 74.77 against 20 litres for GBP 79.00, at the same 4.6 star average. You get more usable space for less money. The only thing our top pick has over it is the size of the review pile — 21,098 against 8,945 — and 8,945 is still an enormous sample by any normal standard.

Those extra three litres are genuinely useful. The 31.4cm wide interior takes a full dinner plate with room around the edge, which matters because a plate that catches on the cavity wall stops the turntable and leaves you with a cold middle. Express Cook starts instantly at anything from one second to six minutes with one touch, defrost works by weight or by time, and the five-blade fan makes it noticeably quieter than most — Toshiba pitches that at parents with a sleeping baby, which is a fair use for it.

There is no grill, so browning and crisping are out, and the one-year guarantee is standard rather than generous. At this price neither is a real complaint.",
                'pros' => ['23 litres for less than the 20 litre models here', '8,945 ratings at 4.6 stars', 'One-touch Express Cook from 1 second to 6 minutes', 'Five-blade fan makes it quieter than most', 'Defrost by weight or by time'],
                'contras' => ['No grill function', 'Fewer ratings than the Russell Hobbs above it', 'One-year guarantee', '48.5cm wide, so it needs more counter space'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '8,945 at 4.6 stars', 'verdict' => 'good', 'note' => 'Second most in this comparison.'],
                    ['label' => 'Capacity', 'value' => '23 litres', 'verdict' => 'good', 'note' => 'Three litres more than our top pick, for less money.'],
                    ['label' => 'Price', 'value' => '£74.77', 'verdict' => 'good', 'note' => 'The cheapest well-reviewed model here.'],
                    ['label' => 'Power', 'value' => '800 W', 'verdict' => 'neutral'],
                    ['label' => 'Noise', 'value' => 'Five-blade fan', 'verdict' => 'good'],
                    ['label' => 'Grill', 'value' => 'None', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Toshiba MW3-EG23PFI 23L Grill Microwave, 900W with 1000W Grill',
                'price' => '£114.99',
                'rating' => 4.6,
                'reviews_count' => 5624,
                'image' => 'https://m.media-amazon.com/images/I/61rGvYk09oL._AC_SL1500_.jpg',
                'alt_text' => 'Toshiba 23 litre black mirror grill microwave with digital display',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0H1WQXCTB?tag=ranked10-21',
                'summary' => 'Buy this one if you want browning. The 1000W grill crisps and colours food, which no solo microwave on this page can do, and it is backed by 5,624 ratings.',
                'body' => "A solo microwave heats food; it cannot brown it. If you want melted cheese that goes golden, a crisp top on a shepherd's pie or bread that toasts rather than steams, you need a grill element, and this is the best-supported grill model here with 5,624 ratings at 4.6 stars.

It runs at 900 watts for microwaving — a step up from the 800 watts almost everything else here uses — with a separate 1000 watt grill and two combination modes that run both together, so food cooks through and browns at the same time without preheating. There are 11 power levels, 20 auto menus, a Chef Defrost setting that buzzes to remind you to turn the food, and a +30 second express button. The 23 litre cavity takes a 10 inch pizza.

At GBP 114.99 it is GBP 40 more than the solo Toshiba above, which is the price of the grill. If you will not use it, do not pay it — a grill you never switch on is the most expensive feature in any kitchen.",
                'pros' => ['1000W grill for browning and crisping, plus two combination modes', '900W microwave power, above the 800W standard here', '5,624 ratings at 4.6 stars', '20 auto menus and 11 power levels', 'Chef Defrost buzzes to remind you to turn the food'],
                'contras' => ['GBP 40 more than the solo Toshiba for the grill alone', 'Mirror front shows fingerprints', 'Bigger footprint at 46.9cm wide', 'Overkill if you only ever reheat'],
                'specs' => [
                    ['label' => 'Grill', 'value' => '1000 W, 2 combi modes', 'verdict' => 'good', 'note' => 'Browning is the one thing a solo microwave cannot do.'],
                    ['label' => 'Power', 'value' => '900 W', 'verdict' => 'good', 'note' => 'Above the 800W standard in this comparison.'],
                    ['label' => 'Customer ratings', 'value' => '5,624 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Capacity', 'value' => '23 litres', 'verdict' => 'good', 'note' => 'Takes a 10 inch pizza.'],
                    ['label' => 'Price', 'value' => '£114.99', 'verdict' => 'neutral', 'note' => 'About £40 of that is the grill.'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Samsung MS23K3513AK 23L 800W Solo Microwave, Triple Distribution System',
                'price' => '£99.00',
                'rating' => 4.5,
                'reviews_count' => 3426,
                'image' => 'https://m.media-amazon.com/images/I/610zbeFKBRL._AC_SL1500_.jpg',
                'alt_text' => 'Samsung MS23K3513AK 23 litre black solo microwave',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0798HL5NF?tag=ranked10-21',
                'summary' => 'A well-made 23 litre Samsung with a ceramic interior that wipes clean. Buy the black one — the identical silver version costs GBP 21 more.',
                'body' => "Samsung's Triple Distribution System fires microwaves in three directions instead of one, which is their answer to the cold-centre problem every microwave owner knows. Three thousand four hundred and twenty-six ratings at 4.5 stars say it works well enough. There are 15 auto-cook programmes, a quick defrost that calculates time from food type and weight, a deodorisation cycle for when last night's fish is still in the air, and an eco mode that kills the standby display.

The ceramic enamel interior is the part worth paying for. It wipes clean without scrubbing and does not scratch or stain the way painted cavities do, which on an appliance you will own for ten years is a real difference rather than a marketing line.

One thing to check before you click buy. Samsung sells this same microwave in silver as the MS23K3523AS for GBP 120.00. Same 23 litres, same 800 watts, same 37.4 by 48.9 by 27.5 centimetres, same Triple Distribution System — and the two listings share the same 3,426 ratings at 4.5 stars, because they are the same machine. Unless you specifically want silver, the black one saves you GBP 21.",
                'pros' => ['Ceramic enamel interior wipes clean and resists staining', 'Triple Distribution System for more even heating', '3,426 ratings at 4.5 stars', '15 auto-cook programmes and weight-based quick defrost', 'Deodorisation cycle and eco standby mode'],
                'contras' => ['GBP 21 more than the Toshiba 23 litre for a lower rating', 'The identical silver model is listed at GBP 120', 'No grill', 'Spec table lists "Number of Power Levels 1" and input as "Microphone"'],
                'specs' => [
                    ['label' => 'Interior', 'value' => 'Ceramic enamel', 'verdict' => 'good', 'note' => 'Wipes clean without scrubbing, unlike painted cavities.'],
                    ['label' => 'Customer ratings', 'value' => '3,426 at 4.5 stars', 'verdict' => 'neutral'],
                    ['label' => 'Capacity', 'value' => '23 litres', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£99.00', 'verdict' => 'neutral', 'note' => 'The silver version of this same machine is £120.'],
                    ['label' => 'Power', 'value' => '800 W', 'verdict' => 'neutral'],
                    ['label' => 'Auto programmes', 'value' => '15', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Russell Hobbs RHMM827SS 20L 800W Manual Microwave, Dial Control',
                'price' => '£66.00',
                'rating' => 4.5,
                'reviews_count' => 945,
                'image' => 'https://m.media-amazon.com/images/I/711XKNg+MvL._AC_SL1500_.jpg',
                'alt_text' => 'Russell Hobbs stainless steel 20 litre manual dial microwave',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CQ2Y79L9?tag=ranked10-21',
                'summary' => 'The cheapest microwave here at GBP 66, with two dials instead of a keypad. If you want to turn a knob and walk away, this is the one.',
                'body' => "Not everybody wants a touch panel. Two dials — one for power, one for time — is faster for the thing you actually do ninety per cent of the time, which is heating something for two minutes, and there is nothing to go wrong with them. At GBP 66 this is the cheapest microwave in the comparison and it has 945 ratings at 4.5 stars behind it.

You get 800 watts, five power levels, a 35 minute timer, automatic defrost, an internal light and a turntable that takes plates up to 10.5 inches. The stainless steel finish and 45.6cm width make it a sensible fit for a small kitchen or a rented flat, and it is the obvious choice for a student house or a second microwave in a garage or utility room.

What you give up is convenience. There is no clock, no auto-cook programmes and no digital display, so you set everything by hand. For some people that is the point.",
                'pros' => ['Cheapest microwave in this comparison at GBP 66', 'Two dials, nothing to learn and nothing to break', '945 ratings at 4.5 stars', 'Turntable takes plates up to 10.5 inches', 'Stainless steel finish at a budget price'],
                'contras' => ['No clock, no digital display, no auto-cook menus', '20 litres, the smaller size in this list', 'Far fewer ratings than the models above', 'No grill'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£66.00', 'verdict' => 'good', 'note' => 'The cheapest microwave in this comparison.'],
                    ['label' => 'Controls', 'value' => 'Two manual dials', 'verdict' => 'neutral', 'note' => 'Faster to use, but no clock or auto menus.'],
                    ['label' => 'Customer ratings', 'value' => '945 at 4.5 stars', 'verdict' => 'neutral'],
                    ['label' => 'Capacity', 'value' => '20 litres', 'verdict' => 'neutral'],
                    ['label' => 'Power', 'value' => '800 W', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'Toshiba MW3-AG20PF 20L 800W Grill Microwave, Mirror Door',
                'price' => '£89.99',
                'rating' => 4.6,
                'reviews_count' => 316,
                'image' => 'https://m.media-amazon.com/images/I/61987KNHE0L._AC_SL1500_.jpg',
                'alt_text' => 'Toshiba 20 litre black mirror microwave with grill function',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F9968B45?tag=ranked10-21',
                'summary' => 'A grill microwave in a compact 20 litre body, GBP 25 cheaper than the 23 litre grill model, for kitchens where counter space is the constraint.',
                'body' => "This is the grill microwave for small kitchens. You get the same 1000 watt grill element and combination cooking as the Toshiba at third place, but in a 20 litre cabinet that is 44cm wide rather than 46.9cm, and for GBP 25 less. If your worktop gap is fixed and you still want to brown food, this solves it.

Eight hundred watts of microwave power, five power levels, eight auto menus, defrost by weight or time and a digital clock cover the basics. The mirror door finish matches the more expensive model and looks smarter than the price suggests.

The reason it sits at sixth rather than higher is the sample. Three hundred and sixteen ratings at 4.6 stars is a good average but a thin base compared with the thousands behind the models above, and the listing itself is carelessly written — there are four obvious typos in the first three bullet points. That does not affect the microwave, but it does tell you how much attention the seller pays.",
                'pros' => ['1000W grill and combination cooking in a compact 20 litre body', 'GBP 25 cheaper than the 23 litre grill model', '4.6 star average', '44cm width fits tighter worktops', 'Eight auto menus and a digital clock'],
                'contras' => ['Only 316 ratings', '20 litres limits what fits under the grill', 'Several typos in the product listing', 'More expensive than better-reviewed solo models'],
                'specs' => [
                    ['label' => 'Grill', 'value' => '1000 W, combi cooking', 'verdict' => 'good'],
                    ['label' => 'External width', 'value' => '44 cm', 'verdict' => 'good', 'note' => 'The narrowest grill microwave here.'],
                    ['label' => 'Customer ratings', 'value' => '316 at 4.6 stars', 'verdict' => 'bad', 'note' => 'Thin base next to the thousands above.'],
                    ['label' => 'Capacity', 'value' => '20 litres', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£89.99', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Samsung MS32DG4504ATE3 32L 1000W Solo Microwave, Stainless Steel',
                'price' => '£130.00',
                'rating' => 4.4,
                'reviews_count' => 299,
                'image' => 'https://m.media-amazon.com/images/I/61L5n3A9jAL._AC_SL1500_.jpg',
                'alt_text' => 'Samsung 32 litre stainless steel solo microwave',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D228W59L?tag=ranked10-21',
                'summary' => 'The biggest microwave here at 32 litres and the most powerful at 1000W. Buy it if you reheat large dishes for a family rather than plates for one.',
                'body' => "Thirty-two litres is half again the size of the 20 litre models at the top of this page, and 1000 watts is the highest microwave power in the comparison. Together that means a large lasagne dish fits and heats through in noticeably less time — which is the whole argument for this microwave and the only reason to pay GBP 130 for it.

It carries the same Samsung features as the 23 litre model: Triple Distribution System for even heating, ceramic enamel interior that wipes clean, 15 auto-cook programmes, power defrost by weight and a deodorisation cycle. Build quality is a clear step up from the budget end of this list.

Two caveats, and they are both about size and evidence. At 51.7cm wide and 42.4cm deep it needs real worktop space, and at 14.6 kilograms it is not something you shuffle around casually. And 299 ratings at 4.4 stars is both the thinner sample and the lower average among the well-known brands here.",
                'pros' => ['32 litres, comfortably the largest capacity in this comparison', '1000W, the highest microwave power here', 'Ceramic enamel interior and Triple Distribution System', '15 auto-cook programmes and power defrost', 'Deodorisation cycle'],
                'contras' => ['51.7cm wide and 42.4cm deep, it needs serious counter space', '14.6kg', 'Only 299 ratings at 4.4 stars', 'GBP 130 is the second highest price here'],
                'specs' => [
                    ['label' => 'Capacity', 'value' => '32 litres', 'verdict' => 'good', 'note' => 'The largest in this comparison by nine litres.'],
                    ['label' => 'Power', 'value' => '1000 W', 'verdict' => 'good', 'note' => 'The highest microwave power here.'],
                    ['label' => 'Footprint', 'value' => '51.7 x 42.4 cm', 'verdict' => 'bad', 'note' => 'The largest external size here.'],
                    ['label' => 'Customer ratings', 'value' => '299 at 4.4 stars', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£130.00', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Hisense H23MOBSD1HUK 23L 800W Microwave, Touch Controls',
                'price' => '£69.00',
                'rating' => 4.2,
                'reviews_count' => 280,
                'image' => 'https://m.media-amazon.com/images/I/618vb6k7w+L._AC_SL1500_.jpg',
                'alt_text' => 'Hisense 23 litre black microwave with digital touch controls',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DJ8T3RN9?tag=ranked10-21',
                'summary' => 'A 23 litre digital microwave for GBP 69, with the largest turntable in this comparison at 28.5cm. Fewer ratings and a lower average than the models above.',
                'body' => "Sixty-nine pounds for 23 litres with digital touch controls is good value on paper, and the 28.5 centimetre turntable is the largest in this comparison — that is the measurement that decides whether a big dinner plate spins freely or catches on the cavity wall and leaves you with a cold middle.

You get 800 watts, automatic defrost, a timer and automatic programmes, from a brand with a real UK presence in televisions and white goods rather than an anonymous seller.

It sits at eighth because the evidence is weaker than the price advantage. Two hundred and eighty ratings at 4.2 stars is the lowest average of any established brand on this page, and for five pounds more the Toshiba at second place has 8,945 ratings at 4.6. When the gap in feedback is that large and the gap in price is that small, the safer purchase is obvious.",
                'pros' => ['23 litres for GBP 69', '28.5cm turntable, the largest here', 'Digital touch controls and automatic programmes', 'Established brand with UK service'],
                'contras' => ['4.2 stars, the lowest average among the known brands here', 'Only 280 ratings', 'The Toshiba at GBP 74.77 has 32 times the ratings', 'No grill'],
                'specs' => [
                    ['label' => 'Turntable', 'value' => '28.5 cm', 'verdict' => 'good', 'note' => 'The largest in this comparison.'],
                    ['label' => 'Capacity', 'value' => '23 litres', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£69.00', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '280 at 4.2 stars', 'verdict' => 'bad', 'note' => 'Lowest average of the established brands here.'],
                    ['label' => 'Power', 'value' => '800 W', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'Panasonic NN-E27JWMBBQ 20L 800W Compact Microwave, White',
                'price' => '£84.99',
                'rating' => 4.5,
                'reviews_count' => 222,
                'image' => 'https://m.media-amazon.com/images/I/71WGWux5SKL._AC_SL1500_.jpg',
                'alt_text' => 'Panasonic NN-E27JWMBBQ 20 litre white compact microwave',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FLDXLSDN?tag=ranked10-21',
                'summary' => 'One of the few white microwaves still sold, and the shallowest here at 33cm deep. Worth it if your worktop is narrow or your kitchen is not black or steel.',
                'body' => "Almost every microwave sold now is black or stainless steel, so if your kitchen is white this is one of the few options that will not stick out. More usefully, at 33 centimetres deep it is the shallowest model in this comparison — on a standard 60cm worktop that leaves real room behind it, and it will not overhang a narrow counter.

Panasonic build quality is a genuine reason to consider it. You get 800 watts, five power levels, nine sensor-driven auto programmes that work out timing from weight or portion, a 30 second quick-start button, a child lock and a 255mm turntable in a stain-resistant acrylic cavity.

Two hundred and twenty-two ratings at 4.5 stars is a respectable average from a thin sample, and at GBP 84.99 you are paying about GBP 10 more than the Toshiba at second place for a smaller cavity. You are buying the colour, the depth and the badge.",
                'pros' => ['White finish, rare in current microwaves', '33cm deep, the shallowest model here', 'Nine sensor auto programmes that calculate from weight', 'Stain-resistant acrylic cavity and child lock', 'Panasonic build quality'],
                'contras' => ['Only 222 ratings', '20 litres for GBP 84.99, more than larger models here', 'No grill', 'Cheaper 23 litre options have far more feedback'],
                'specs' => [
                    ['label' => 'Depth', 'value' => '33 cm', 'verdict' => 'good', 'note' => 'The shallowest microwave in this comparison.'],
                    ['label' => 'Colour', 'value' => 'White', 'verdict' => 'good', 'note' => 'One of the few white models still sold.'],
                    ['label' => 'Customer ratings', 'value' => '222 at 4.5 stars', 'verdict' => 'bad'],
                    ['label' => 'Capacity', 'value' => '20 litres', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£84.99', 'verdict' => 'bad', 'note' => 'More than larger, better-reviewed models here.'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Panasonic NN-GD37QSBPQ 29L 1000W Grill Microwave, Combination Cooking',
                'price' => '£159.99',
                'rating' => 4.2,
                'reviews_count' => 77,
                'image' => 'https://m.media-amazon.com/images/I/71eXMfA+ufL._AC_SL1500_.jpg',
                'alt_text' => 'Panasonic NN-GD37QSBPQ 29 litre stainless steel grill microwave',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DZXNFPYM?tag=ranked10-21',
                'summary' => 'Big, powerful and well specified — 29 litres, 1000W and a 1000W grill — but with only 77 ratings behind it and the highest price in this comparison.',
                'body' => "On specification this is the most capable microwave on the page. Twenty-nine litres with a 330mm wide interior takes large trays and pots, 1000 watts of microwave power matches the biggest Samsung, and a three-level 1000 watt grill plus combination cooking browns food without preheating. Eighteen auto programmes cover reheating, defrosting, fresh vegetables and frozen pizza. Packaging is plastic-free, which is a small thing done properly.

It is last for one reason and it is the same reason every time: evidence. Seventy-seven ratings is by far the smallest sample here, and 4.2 stars from 77 people is an early signal rather than a verdict. This is a recent model that has not yet been in enough kitchens for long enough.

At GBP 159.99 it is also the most expensive microwave in this comparison, more than double our top pick. If you want a big grill microwave from a name you trust and you are comfortable being an early buyer, it is a reasonable choice. If you want certainty, everything above it has more of it.",
                'pros' => ['29 litres with a 330mm wide interior for large trays', '1000W microwave plus a three-level 1000W grill', 'Combination cooking with no preheating', '18 auto programmes including fresh vegetables and frozen pizza', 'Plastic-free, recyclable packaging'],
                'contras' => ['Only 77 ratings, the smallest sample on this page', 'GBP 159.99, the most expensive here by GBP 30', '4.2 stars is an early figure, not a settled one', 'Double the price of the top pick'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '77 at 4.2 stars', 'verdict' => 'bad', 'note' => 'By far the smallest sample in this comparison.'],
                    ['label' => 'Capacity', 'value' => '29 litres', 'verdict' => 'good', 'note' => '330mm wide interior for large trays.'],
                    ['label' => 'Power', 'value' => '1000 W + 1000 W grill', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£159.99', 'verdict' => 'bad', 'note' => 'The most expensive here, double the top pick.'],
                    ['label' => 'Auto programmes', 'value' => '18', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
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
        $this->command?->info("MicrowavesSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
