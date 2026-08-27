<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class SelfCleaningLitterBoxesSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE CAIXAS DE AREIA AUTOLIMPANTES DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // COLETA: AMAZON.CO.UK EM 27/08/2026, ENTREGA EM M4 6BD (MANCHESTER), BUSCA "self cleaning litter box" FILTRADA A PARTIR DE £100.
        //
        // ═══ ACHADOS DA COLETA (O DIFERENCIAL DO ARTIGO) ═══
        // 1. A CONTAGEM DE "SAFETY SENSORS" NAO SIGNIFICA NADA E CORRE AO CONTRARIO DO PRECO:
        //    GIMARS (£155,19) DECLARA 12 · ELLENPENT (£161,47) DECLARA 11 · PETKIT PURA MAX 2 (£379,97) DECLARA 11 ·
        //    MEOWANT (£199,99) DECLARA 10 · NEAKASA (£299,99) DECLARA "SEIS INFRAVERMELHOS E QUATRO DE PESO" (=10) ·
        //    LITTER-ROBOT 4 (£699) NAO DECLARA NENHUM SENSOR EM NENHUM BULLET.
        //    NINGUEM DEFINE O QUE CONTA COMO "SENSOR". A CAIXA MAIS BARATA ALEGA MAIS SENSORES QUE A MAIS CARA.
        // 2. PETKIT PUROBOT CRYSTAL SE CONTRADIZ DENTRO DO MESMO BULLET: O TITULO DIZ "Triple-Layer Safety Sensor" E O CORPO
        //    DA MESMA FRASE DIZ "four precision infrared sensors". TRES OU QUATRO, NA MESMA LINHA.
        // 3. LITTER-ROBOT 4: £699, NOTA 3.8 — A MAIS BAIXA DA LISTA — COM APENAS 42 AVALIACOES, A AMOSTRA MAIS FINA.
        //    E A FICHA DECLARA "Item weight 1 kg" PARA UMA MAQUINA DE 68,6 x 56 x 75 cm. ERRO DE FICHA NO PRODUTO MAIS CARO.
        // 4. LIMITE DE PESO DO GATO CORRE AO CONTRARIO DO PRECO: PETKIT PURA MAX 2 (£379,97) ACEITA ATE 18 lbs (8,2kg);
        //    PETPIVOT (£173,88) ACEITA ATE 22 lbs (10kg); NEAKASA (£299,99) ACEITA ATE 15kg. A CAIXA DE £174 LEVA GATO MAIS PESADO
        //    QUE A DE £380.
        // 5. AMARRACAO DE CONSUMIVEL: A PETKIT PUROBOT CRYSTAL (£179,99) SO FUNCIONA COM AREIA DE CRISTAL DE SILICA E BANDEJAS
        //    DESCARTAVEIS DA PROPRIA PETKIT ("Do not use clumping clay, tofu, bentonite"). AS IRMAS DE £379,97 E £469,98 ACEITAM
        //    QUALQUER AREIA AGLOMERANTE. MESMA MARCA, POLITICA OPOSTA — E A BARATA E A QUE PRENDE.
        // 6. RUIDO TAMBEM CORRE AO CONTRARIO: GIMARS £155 ≤32 dB · PETPIVOT £174 <32 dB · PETKIT £380 35 dB ·
        //    MEOWANT £200 40 dB · NEAKASA £300 ≤50 dB.
        // 7. A GIMARS APARECE TRES VEZES NA BUSCA COM AS MESMAS 413 AVALIACOES A £155,19, £155,29 E £155,39 (ASINS
        //    B0FR9JVHC8, B0FR95LDC3, B0FR9JW9NV). USADO APENAS O MAIS BARATO.
        //
        // ═══ CRITERIO DE CORTE ═══
        // EXCLUIDOS POR AMOSTRA INSUFICIENTE (<40 AVALIACOES): B0GJCT8T2P (7), B0GKLPS8DD (7), B0H4P93DNP (4), B0H7X1D3NP (4),
        // B0H6S49YKJ (3), B0FMDL48LB (5), B0G6Y61D2F (3), B0GHDY6RFF (8), B0H7BRL6L4 (16), B0FZJ8L1DQ (12), B0H4PSNN98 (14).
        // O LITTER-ROBOT 4 ENTROU COM 42 AVALIACOES POR SER A REFERENCIA DE PRECO DA CATEGORIA, E ESTA SINALIZADO NO TEXTO.
        //
        // ═══ VARIACOES DE PALAVRA-CHAVE TRABALHADAS NO TEXTO ═══
        // best self cleaning litter box · self cleaning litter box on amazon · automatic cat litter tray · automatic litter box ·
        // self cleaning cat litter tray · best automatic litter box for multiple cats · robot litter box · smart litter box ·
        // open top self cleaning litter box · cat litter tray with app control
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'pet-supplies',                // SLUG DA CATEGORIA (URL)
            'name' => 'Pet Supplies',                // NOME EXIBIDO
            'description' => 'Everything your furry friends need, ranked by quality, comfort and value.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-self-cleaning-litter-box',                            // SLUG DO ARTIGO (URL) = PALAVRA-CHAVE EM formato-url
            'title' => 'Best Self Cleaning Litter Box 2026: 10 Ranked on Safety',  // TITULO / H1 — CONTEM A PALAVRA-CHAVE
            'meta_title' => 'Best Self Cleaning Litter Box 2026: Top 10 Ranked',   // TITLE DA ABA/GOOGLE (49 CHARS)
            'meta_description' => 'We ranked the best self cleaning litter box models on safety sensors, cat weight limits and litter lock-in. The cheapest claims 12 sensors; the £699 has none.', // META DESCRIPTION (~158 CHARS)
            'focus_keyword' => 'best self cleaning litter box',                   // PALAVRA-CHAVE PRINCIPAL — VIRA O ALT DO HERO
            'hero_image' => '',                                                   // SEM HERO MANUAL: A VIEW USA A FOTO DO PRODUTO #1 COMO IMAGEM SOCIAL
            'intro' => 'A self cleaning litter box is a motorised drum that your cat climbs inside, so the safety sensors are not a feature, they are the whole product. That makes what we found genuinely odd. The cheapest automatic cat litter tray in this guide, at £155.19, advertises twelve safety sensors. The most expensive, a £699 Litter-Robot 4, does not mention safety sensors in a single bullet point. One PETKIT listing manages to promise a triple-layer sensor system and four infrared sensors in the same sentence. Nowhere does any brand define what actually counts as a sensor. Meanwhile the cat weight limits run backwards against the price, and one model quietly locks you into buying the manufacturer own-brand litter forever. So we ranked the best self cleaning litter box options on the things that decide whether this is a good purchase: safety claims you can check, the weight of cat each drum will take, how long the waste bin really lasts, and whether you are free to use your own litter.', // INTRO OTIMIZADA
            'conclusion' => 'The best self cleaning litter box for most homes is a mid-priced open-top model from a brand with a large review sample, because that combination gives you the two things the marketing cannot: evidence and an escape route if your cat refuses to use it. Spending more does not reliably buy more safety, since the sensor counts run backwards against price and the £699 option here holds the lowest rating in the guide from the thinnest sample. Before you order any automatic litter box, check three numbers on the listing rather than the headline. First, the maximum cat weight, because it ranges from 8.2kg to 15kg and the cheaper trays often take the heavier cat. Second, the waste bin volume in litres, which is what really decides how often you are involved. Third, the litter type, because at least one popular smart litter box only works with the manufacturer own crystal litter and disposable trays, and that running cost never appears in the price you see today.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                        // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-27 12:00:00',                              // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'PETKIT PURA MAX 2 Self Cleaning Cat Litter Tray, 76L',                     // NOME
                'price' => '£379.97',                                                                // PRECO NA COLETA
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 4288,                                                             // Nº DE AVALIACOES (MAIOR AMOSTRA DA BUSCA INTEIRA)
                'image' => 'https://m.media-amazon.com/images/I/61Hpmzr3TAL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'PETKIT Pura Max 2 self cleaning cat litter tray in white, 76L capacity', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DCBLXNGB?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'With 4,288 ratings it carries more evidence than anything else in the category, and it publishes a full specification: 76L drum, 11 safety sensors, 35 dB and a 7L bin good for around 15 days.', // TEXTO CURTO DO CARD
                'body' => 'On evidence alone this wins the category comfortably. A sample of 4,288 ratings at 4.3 is nearly twice the next largest and roughly a hundred times the Litter-Robot at the bottom of this guide. For a product class where the main risk is a mechanism failing after eight months, that depth of feedback is worth more than any feature.

The specification is also the most complete here. You get a 76L interior, a 7L sealed waste bin that PETKIT rates at around 15 days hands-free for one cat, a quoted 35 dB running noise, and eleven safety sensors that pause the cycle when a cat enters the detection zone. Importantly, it takes any clumping litter, including clay, tofu, mixed and bentonite, so you are never tied to a particular brand. Given what we found further down this list, that freedom matters more than it sounds.

Two things to weigh before buying. The maximum cat weight is 18 lbs, about 8.2kg, which is lower than several trays here costing half as much, so very large breeds may be better served elsewhere. And at 13.8kg with a footprint of 63.5 x 54 x 55cm this is a substantial piece of furniture rather than something you tuck behind a door. The listing also warns against placing it on carpet, since that interferes with the sensors.',
                'pros' => ['4,288 ratings, by far the largest sample in the category', '11 safety sensors with a defined detection zone', 'Works with any clumping litter, so no brand lock-in', '7L sealed bin rated for about 15 days for one cat', 'Quiet at a quoted 35 dB'],
                'contras' => ['Maximum cat weight of 8.2kg, lower than cheaper trays here', 'Large footprint and 13.8kg to move', 'Cannot be placed on carpet without affecting the sensors', 'Nearly £380 before any accessories'],
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'Ellenpent Open-Top Self Cleaning Cat Litter Tray',                         // NOME
                'price' => '£161.47',                                                                // PRECO NA COLETA
                'rating' => 4.2,                                                                     // NOTA
                'reviews_count' => 1493,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71WlNgp6pML._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Ellenpent open-top self cleaning cat litter tray in white',            // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G3XV7ZKY?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The value pick: 1,493 ratings at 4.2, an open-top design that nervous cats accept faster, 11 sensors and a 9L waste bin, for less than half the price of the PETKIT above.', // TEXTO CURTO DO CARD
                'body' => 'This is where the money stops buying much. At £161.47 you get an open-top self cleaning litter box with eleven sensors, the same count PETKIT quotes on a tray costing £218 more, plus a 9L waste bin rated at around ten days for one cat. It holds 4.2 from 1,493 ratings, which is the second largest sample in this guide.

The open-top layout is the real argument for it. A closed drum is the single most common reason a cat refuses an automatic litter box, because the animal cannot see out while it is in there. An open top keeps sightlines clear, which is why it usually wins over cats moving across from a traditional tray, and it also makes the whole thing easier to inspect at a glance. The listing sensibly leans on this rather than on gadget features.

The deep clean function is a genuinely useful touch: switch it on in the app and the drum rotates half a turn thirty seconds after your cat leaves, covering the waste before the full cycle runs later. Infrared and weight sensors pause cleaning if a cat walks in. It arrives fully assembled, which for an 8kg machine is more welcome than it sounds. The main gap is that no noise figure is published anywhere.',
                'pros' => ['1,493 ratings at 4.2, the second largest sample here', 'Open-top design that cats usually accept faster', '11 sensors, matching a tray costing £218 more', '9L waste bin, around 10 days for one cat', 'Arrives fully assembled and ready to plug in'],
                'contras' => ['No noise level published anywhere on the listing', 'No stated maximum cat weight', 'Open top contains odour less well than a sealed drum'],
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'PETKIT Purobot Max 3 Automatic Cat Litter Tray, 76L',                      // NOME
                'price' => '£469.98',                                                                // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 1128,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61iTK9N1fZL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'PETKIT Purobot Max 3 automatic cat litter tray in white with wide opening', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GYW76MCY?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The Pura Max 2 with a wider 10.5 inch opening and a half-gear design that keeps the entrance open during every cycle. Better for large and senior cats, and £90 dearer.', // TEXTO CURTO DO CARD
                'body' => 'PETKIT positions this as the direct upgrade to the tray at number one, and for once the upgrade is mechanical rather than cosmetic. The opening is wider at 10.5 inches with a lower threshold, which helps short-legged breeds and older cats that struggle to climb. More importantly, the half-gear design keeps the entrance open throughout the cleaning cycle instead of sealing it, so a cat that wanders back mid-rotation is never shut out or shut in.

That is a better safety answer than counting sensors, and it is worth noting how differently it is expressed. Where the budget trays in this guide advertise a number, PETKIT here describes a mechanism. A design that physically cannot trap the cat does not depend on a sensor firing correctly, which is the more reassuring engineering position even though it makes for a weaker bullet point.

Everything else carries over from the Pura Max 2: the 76L interior, universal clumping litter compatibility, the sealed bin with the N50 odour eliminator, and per-cat identification by weight in the app. It rates 4.4 from 1,128 ratings, marginally the better score. Whether the wider opening is worth £90 depends entirely on your cat. For an ordinary adult cat that already uses a covered tray, it is not.',
                'pros' => ['Wider 10.5 inch opening with a low threshold', 'Half-gear design keeps the entrance open during cleaning', '4.4 from 1,128 ratings, the better score of the two PETKIT drums', 'Works with any clumping litter', 'Per-cat weight identification in the app'],
                'contras' => ['£90 more than the Pura Max 2 for the same 76L interior', 'Heaviest unit in the guide at 14.2kg', 'Safety described as multi-layer with no sensor count given', 'Still needs a hard floor rather than carpet'],
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'Gimars Open Top Self Cleaning Litter Box, XXL',                            // NOME
                'price' => '£155.19',                                                                // PRECO NA COLETA (O MAIS BARATO DA LISTA)
                'rating' => 4.1,                                                                     // NOTA
                'reviews_count' => 413,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71X3aKu7FfL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Gimars open top self cleaning cat litter box in champagne with wide entry', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FR9JVHC8?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest automatic litter box here at £155.19, and the one advertising the most safety sensors: twelve. It also has the widest entry at 37cm and the quietest claim at 32 dB.', // TEXTO CURTO DO CARD
                'body' => 'This is the listing that makes the sensor arithmetic collapse. At £155.19 it is the cheapest tray in this guide, and it advertises twelve intelligent sensors: interior infrared, waste bin infrared, entry radar and precision weight sensing. The £699 Litter-Robot at the bottom of this page mentions no sensors at all. Either twelve sensors are not worth £544, or the number does not mean what a shopper assumes it means. We think it is the second, and no brand in this category defines what counts as one.

Judged on the things that are harder to invent, it holds up well. The 37cm entry is the widest here, which suits large and senior cats. The 8L sealed bin is rated at around twelve days. The quoted noise is 32 dB or under, the lowest claim in the guide. It takes cats from 1.5 to 10kg, a heavier limit than the £379.97 PETKIT.

One caution about the search results rather than the product. Gimars lists this same box three times under separate ASINs at £155.19, £155.29 and £155.39, all showing the same 413 ratings. They are the same tray. We have linked the cheapest, but if you go looking yourself, do not mistake three listings for three products or assume the pricier one is a better model.',
                'pros' => ['Cheapest automatic cat litter tray in this guide at £155.19', 'Widest entry here at 37cm, good for large and senior cats', 'Takes cats up to 10kg, more than the £379.97 PETKIT', '8L sealed bin rated at around 12 days', 'Quietest claim in the guide at 32 dB or under'],
                'contras' => ['Advertises 12 sensors with no definition of what counts as one', 'Listed three times under different ASINs at nearly identical prices', 'Smaller review sample than the trays above it', 'Lowest rating of the open-top designs at 4.1'],
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'Devoko 90L Self Cleaning Cat Litter Tray for Multi Cats',                  // NOME
                'price' => '£179.99',                                                                // PRECO NA COLETA
                'rating' => 4.2,                                                                     // NOTA
                'reviews_count' => 675,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71V6clv---L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Devoko 90L self cleaning cat litter tray in white for multiple cats',  // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FMRB7Z2S?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The largest interior in the guide at 90L, with an 8.5L drawer rated at 10 to 14 days and a sensor system combining motion radar, infrared and bio-radar.', // TEXTO CURTO DO CARD
                'body' => 'If you have more than one cat, interior volume is the specification that matters most, and at 90L this is the roomiest drum in the guide by a clear margin over the 76L PETKIT trays. The 8.5L waste drawer is rated at ten to fourteen days for a single cat, which in a two-cat house realistically means emptying it weekly rather than daily.

The safety description is more interesting than most because it names technologies instead of counting them: motion radar, infrared sensors and bio-radar, plus a mechanical anti-pinch mechanism. That is a more useful thing to tell a buyer than a number, although like everyone else here Devoko never explains how the three layers interact or which one takes priority. It takes cats from 1.5 to 10kg.

Three cleaning modes, automatic, timed and manual, cover most routines, and the modular split design means the inner bucket, waste container and mat all come out and go under the tap. That is a bigger deal than it sounds on a machine that will eventually need a proper clean. The listing carries a summer temperature warning about odour, which is candid, and no noise figure is published.',
                'pros' => ['90L interior, the largest in this guide', '8.5L waste drawer rated at 10 to 14 days', 'Names its sensor technologies rather than just counting them', 'Takes cats up to 10kg', 'Inner bucket, waste bin and mat are all washable'],
                'contras' => ['No noise level published', 'No sensor count given, so it cannot be compared directly', 'Bulky at 11.8kg and 58.5cm tall', 'Listing warns about odour in warm weather'],
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'PETKIT Purobot Crystal Self Cleaning Litter Tray with Camera',             // NOME
                'price' => '£179.99',                                                                // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA (MAIOR DA LISTA)
                'reviews_count' => 456,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71W5oMe9MKL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'PETKIT Purobot Crystal open-top litter tray in grey with AI camera',   // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FPQ8GPB5?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The highest rated tray here at 4.5, with an AI camera and night vision. However, it only works with PETKIT crystal litter and disposable trays, which is a running cost the price does not show.', // TEXTO CURTO DO CARD
                'body' => 'This holds the best score in the guide, 4.5 from 456 ratings, and the hardware explains why. A 210 degree wide-angle AI camera with infrared night vision recognises each cat, tracks toileting frequency and waste weight, and pushes alerts to your phone. For an owner monitoring a cat with kidney or urinary problems, that is genuinely useful rather than a gimmick, and the 18cm entrance suits senior animals.

The catch is in the fourth bullet, and it is the most important sentence on the whole listing. This tray is designed exclusively for non-clumping silica crystal litter, and PETKIT states plainly that clumping clay, tofu and bentonite must not be used. You also swap in a fresh PETKIT disposable tray rather than emptying a bin. So the £179.99 is an entry fee, not the cost of ownership, and you are committed to one supplier for as long as you own it. Its own stablemates at numbers one and three take any clumping litter you like.

The safety wording is the other thing worth flagging. The bullet headline promises a triple-layer safety sensor, and the sentence immediately beneath it says the box is equipped with four precision infrared sensors. Three or four, in the same breath. It is a small thing, but on a machine that rotates with a cat nearby it is exactly the number you would want the manufacturer to be sure about.',
                'pros' => ['Highest rating in this guide at 4.5', 'AI camera with 210 degree lens and night vision', 'Per-cat recognition with waste weight tracking', 'Low 18cm entrance suits senior and short-legged cats', 'Lightest unit here at 5.65kg'],
                'contras' => ['Crystal silica litter only, so no clumping clay, tofu or bentonite', 'Needs PETKIT disposable trays, an ongoing cost not in the price', 'Says triple-layer sensor and four sensors in the same bullet', 'Open design contains odour less well than the sealed PETKIT drums'],
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'Neakasa M1 Plus Lite Open Top Self-Cleaning Litter Tray',                  // NOME
                'price' => '£299.99',                                                                // PRECO NA COLETA
                'rating' => 4.0,                                                                     // NOTA
                'reviews_count' => 400,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71zxxK4WTBL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Neakasa M1 Plus Lite open top self-cleaning cat litter tray in white', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DG59SQ5P?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Takes the heaviest cats in the guide at up to 15kg, with a mechanical rotation limiter plus six infrared and four weight sensors. At 50 dB, though, it is also the loudest here.', // TEXTO CURTO DO CARD
                'body' => 'Neakasa describes its safety system better than anyone else in this search, and it is worth quoting properly: a mechanical gear that physically limits rotation to prevent pinching, backed by six infrared and four weight sensors. Naming the split between infrared and weight sensing, and putting a mechanical stop behind both, is a more honest answer than a single headline number, and it is the reason this sits above trays with better ratings.

It also takes the largest cats here. The stated limit is 15kg, against 8.2kg for the £379.97 PETKIT and 10kg for most of the budget trays. For a Maine Coon or a large Ragdoll that is the difference between a working litter box and an expensive ornament. The 7.17L litter chamber and 11L waste bin together give a claimed fourteen days hands-free, the longest interval in the guide.

Two things hold it back. The quoted noise is 50 dB or under, which is the loudest figure published by any tray here and roughly fifteen decibels above the budget open-tops, so a bedroom is probably out. And at 4.0 from 400 ratings it has the second lowest score in this guide while costing £300, which is a lot of money for a tray that rates below the £161.47 Ellenpent.',
                'pros' => ['Takes cats up to 15kg, by far the highest limit here', 'Mechanical rotation limiter plus six infrared and four weight sensors', 'Up to 14 days hands-free, the longest interval in the guide', 'Open-top design with four cleaning modes', '30-day free returns and exchanges'],
                'contras' => ['50 dB, the loudest published figure in this guide', '4.0 rating, below trays costing half as much', '£299.99 with a modest 400-rating sample', 'Leak rate quoted as under 5 percent rather than zero'],
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'PetPivot Top Opening Self-Cleaning Cat Litter Tray',                       // NOME
                'price' => '£173.88',                                                                // PRECO NA COLETA
                'rating' => 3.9,                                                                     // NOTA
                'reviews_count' => 748,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/51f-N4T5vdL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'PetPivot top opening self-cleaning cat litter tray in white',          // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DRS96KMB?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only tray here with no app, no Wi-Fi and no camera, which is deliberate. It takes cats up to 22 lbs and runs under 32 dB, but its 3.9 rating is among the lowest in the guide.', // TEXTO CURTO DO CARD
                'body' => 'Every other automatic litter box in this guide wants to be on your home network. This one refuses, and says so in the third bullet: no app, no Wi-Fi connection, no camera, just plug and play. For anyone uneasy about a connected camera in the house, or simply tired of another account and another set of notifications, that is a feature rather than an omission, and it removes a whole category of things that can stop working.

The physical specification is competitive. It takes cats up to 22 lbs, about 10kg, which is more than the £379.97 PETKIT allows. The 10L waste box is the second largest here. Running noise is quoted at under 32 dB, matching the quietest claim in the guide, and cleaning starts 70 seconds after the cat leaves. The open-top design keeps sightlines clear.

The rating is the problem. At 3.9 from 748 ratings it sits joint lowest among the trays with a meaningful sample, and unlike the Litter-Robot that sample is large enough to be believed. A 3.9 from 748 people is a real signal, not noise, and it suggests the mechanism or the odour control does not hold up for a meaningful minority of buyers. The safety description does not help either: multiple smart sensors, with no count and no technology named.',
                'pros' => ['No app, Wi-Fi or camera required, works straight out of the box', 'Takes cats up to 10kg, more than the £379.97 PETKIT', '10L waste box, the second largest in this guide', 'Quiet at under 32 dB', 'Both automatic and manual modes'],
                'contras' => ['3.9 rating from a large 748-rating sample, a real signal', 'Safety described only as multiple smart sensors, with no count', 'No app means no usage or weight tracking at all', 'Narrowest footprint here at 41.5cm may feel tight for large cats'],
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'MeoWant Self Cleaning Cat Litter Tray for Multiple Cats',                  // NOME
                'price' => '£199.99',                                                                // PRECO NA COLETA
                'rating' => 3.9,                                                                     // NOTA
                'reviews_count' => 2243,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71WmXsQnmVL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'MeoWant self cleaning cat litter tray in white for multiple cats',     // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B87Q6Y2V?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The second largest review sample in the guide at 2,243, and that is exactly why its 3.9 rating carries weight. Supports up to six cats with 10 sensors and a 4.8 inch low entry.', // TEXTO CURTO DO CARD
                'body' => 'This is the listing where sample size cuts the other way. With 2,243 ratings, MeoWant has the second deepest pool of feedback in this guide, and it averages 3.9. A 3.9 from forty people tells you very little. A 3.9 from more than two thousand tells you that a consistent share of buyers have had a consistent problem, and that is a stronger signal than a 5.0 from a handful of early reviewers.

The feature list is not the issue. Ten high-precision sensors, self-test and remote alarm, app tracking for up to six cats, a 4.8 inch low entry that suits older animals, an automatic odour-control cover and a quoted 40 dB motor. The 57.6L interior is smaller than the 76L and 90L trays above, though it still handles a normal adult cat comfortably, and the stated range is 3.3 to 18 lbs.

At £199.99 it is priced in the middle of this guide while rating below the £161.47 Ellenpent and the £155.19 Gimars, both of which have fewer but perfectly adequate samples. Unless the six-cat tracking is something you specifically need, the trays above deliver more for less.',
                'pros' => ['2,243 ratings, the second largest sample in this guide', 'Tracks up to six cats individually in the app', '4.8 inch low entry, friendly to senior and short-legged cats', '10 sensors with self-test and remote alarm', 'Automatic odour-control cover'],
                'contras' => ['3.9 average from a very large sample, which makes it credible', 'Smaller 57.6L interior than the trays above it', 'Maximum cat weight of 8.2kg, matching the most restrictive here', 'Costs more than better-rated trays in this guide'],
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'Litter-Robot 4 Automatic Self-Cleaning Cat Litter Box',                    // NOME
                'price' => '£699.00',                                                                // PRECO NA COLETA (O MAIS CARO DA LISTA)
                'rating' => 3.8,                                                                     // NOTA (MENOR DA LISTA)
                'reviews_count' => 42,                                                               // Nº DE AVALIACOES (AMOSTRA MAIS FINA — SINALIZADO NO TEXTO)
                'image' => 'https://m.media-amazon.com/images/I/61ceOIoeBfL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Litter-Robot 4 automatic self-cleaning cat litter box in black',       // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CFTCG4B8?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The most famous robot litter box and the most expensive at £699, yet it holds the lowest rating in this guide from just 42 ratings, and its bullets never mention a safety sensor.', // TEXTO CURTO DO CARD
                'body' => 'The Litter-Robot is the name most people have heard, it is genuinely well engineered, and Whisker has been building these for twenty years with a two-year warranty behind them. None of that is in dispute. What is in dispute is whether it is worth £699 on this particular listing, and the data here says no.

It rates 3.8, the lowest score in this guide, from 42 ratings, the thinnest sample by a factor of ten. That combination is the hardest kind to read. Forty-two people is not enough to condemn a product, but it is also nowhere near enough to justify spending £544 more than the Gimars at number four, and every tray above it has between ten and a hundred times more feedback behind it.

Then there is what the listing does not say. Across all five bullet points, on a motorised drum a cat climbs inside, there is no mention of a safety sensor, an anti-pinch mechanism or a detection zone. Trays here costing a fifth of the price advertise twelve. The specification table also lists an item weight of 1 kg for a machine measuring 68.6 by 56 by 75 centimetres, which is plainly an error and does nothing for confidence in the rest of the page. Buy it for the build and the warranty if you want to, but not because the listing has made the case.',
                'pros' => ['Genuine sifting mechanism from a long-established manufacturer', 'Two-year WhiskerCare warranty, the longest here', 'Works with any clumping litter', 'App tracks waste level, litter level and cat weight', 'Included step and fence reduce litter tracking'],
                'contras' => ['£699, more than four times the cheapest tray in this guide', 'Lowest rating here at 3.8, from only 42 ratings', 'No safety sensor or anti-pinch claim in any bullet point', 'Specification table lists the item weight as 1 kg, which is wrong'],
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
