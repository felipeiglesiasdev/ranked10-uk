<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class StandingDesksSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE MESAS DE ALTURA REGULAVEL DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // COLETA: AMAZON.CO.UK EM 27/08/2026, ENTREGA EM M4 6BD (MANCHESTER), BUSCA "electric standing desk" FILTRADA A PARTIR DE £120.
        //
        // ═══ ACHADOS DA COLETA (O DIFERENCIAL DO ARTIGO) ═══
        // 1. A ERGEAR DECLARA UM TAMANHO DE TAMPO NOS BULLETS E OUTRO NO TITULO — NOS DOIS ANUNCIOS, SOMANDO 9.884 AVALIACOES:
        //    B0FMK17V9T: TITULO E FICHA DIZEM 140x70cm, O BULLET 2 DIZ "measuring 100 cm x 60 cm".
        //    B0D9MFL7MM: TITULO E FICHA DIZEM 160x80cm, O BULLET 3 DIZ "Measuring 120cm by 60cm".
        //    E TEXTO PADRAO COPIADO ENTRE ANUNCIOS DA LINHA. TITULO E FICHA CONCORDAM, ENTAO O BULLET E QUE ESTA ERRADO.
        // 2. CAPACIDADE DE CARGA VARIA 2,4x E CORRE AO CONTRARIO DO TAMANHO DO TAMPO:
        //    DEVOKO 160x70 = 50kg · FLEXISPOT Q3 = 50kg · FLEXISPOT E1 = 60kg · ERGOMAKER = 65kg · VASAGLE = 70kg ·
        //    ERGEAR = 80kg · DESKTRONIC (MOTOR DUPLO) = 120kg. UMA MESA DE 160cm COM LIMITE DE 50kg E O CASO A OBSERVAR.
        // 3. VELOCIDADE DE SUBIDA VARIA 3,5x ONDE E INFORMADA: ERGOMAKER 14 mm/s CONTRA DESKTRONIC HOMEPRO 50 mm/s.
        //    A 14 mm/s, PERCORRER 45cm LEVA 32 SEGUNDOS; A 50 mm/s LEVA 9. MESA LENTA E MESA QUE O DONO PARA DE AJUSTAR.
        //    A MAIORIA DOS ANUNCIOS NAO INFORMA ESSE NUMERO.
        // 4. ALTURA MINIMA IMPORTA MAIS DO QUE PARECE: A FLEXISPOT E1 SO DESCE ATE 75cm, ACIMA DA ALTURA SENTADA NORMAL (~72cm).
        //    A DESKTRONIC HOMEPRO VAI DE 62 A 127cm, A MAIOR FAIXA DA LISTA.
        // 5. ARMADILHA DA ESTRUTURA AVULSA: A MAIDESITE (£128,99, 573 AVALIACOES) E SO O PE, SEM TAMPO — E O ANUNCIO INTEIRO
        //    TEM UM UNICO BULLET POINT. MESMO PADRAO DO "BARE TOOL" DOS SOPRADORES DE FOLHA.
        // 6. SO A DESKTRONIC DIZ "DUAL MOTOR". OS OUTROS DIZEM "PREMIUM MOTOR", "UPRATED MOTOR", "ROBUST MOTOR" SEM CONTAGEM.
        //    MOTOR DUPLO E O QUE SUSTENTA OS 120kg E OS 50 mm/s.
        //
        // ═══ CRITERIO DE CORTE ═══
        // EXCLUIDOS POR AMOSTRA INSUFICIENTE (<100 AVALIACOES): B0GWMNHF1L (6), B0H2DR4GLP (6), B0D2L8J1VX (2), B0FKTCHNMF (8),
        // B0GM4BWZNG (4), B0BLC26PKL (28), B0F7RBD3YQ (18), B0GJZK9DPV (24), B0F29JDZ7T (30), B0F181G2W6 (51), B0DZXYHCJB (54).
        // A VASAGLE APARECE EM VARIOS TAMANHOS COMPARTILHANDO AS MESMAS 635 AVALIACOES; USADO APENAS O 160x70 A £122,99.
        //
        // ═══ VARIACOES DE PALAVRA-CHAVE TRABALHADAS NO TEXTO ═══
        // best electric standing desk · electric standing desk on amazon · height adjustable desk · sit stand desk ·
        // best standing desk for home office · dual motor standing desk · adjustable height desk · stand up desk ·
        // best standing desk under 150 · standing desk frame
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home-office',                 // SLUG DA CATEGORIA (URL)
            'name' => 'Home & Office',               // NOME EXIBIDO
            'description' => 'Kit to make working from home more comfortable and productive, ranked for UK buyers.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-electric-standing-desk',                              // SLUG DO ARTIGO (URL) = PALAVRA-CHAVE EM formato-url
            'title' => 'Best Electric Standing Desk 2026: 10 Ranked on Load and Speed', // TITULO / H1 — CONTEM A PALAVRA-CHAVE
            'meta_title' => 'Best Electric Standing Desk 2026: Top 10 Ranked',     // TITLE DA ABA/GOOGLE (49 CHARS)
            'meta_description' => 'We ranked the best electric standing desk options on load capacity, motor count and lift speed. Load runs from 50kg to 120kg, and lift speed varies 3.5 times.', // META DESCRIPTION (~157 CHARS)
            'focus_keyword' => 'best electric standing desk',                     // PALAVRA-CHAVE PRINCIPAL — VIRA O ALT DO HERO
            'hero_image' => '',                                                   // SEM HERO MANUAL: A VIEW USA A FOTO DO PRODUTO #1 COMO IMAGEM SOCIAL
            'intro' => 'Every electric standing desk on Amazon looks the same in the photographs, so the listings compete on the wrong numbers. Memory presets and cable grommets are easy to advertise. Load capacity, motor count and lift speed are the three that actually decide whether you will still be using the thing in a year, and they are the three that get buried. In this guide the stated load ranges from 50kg to 120kg, and the widest 160cm desktops are often the ones rated lowest. Lift speed, where it is published at all, varies by three and a half times, which is the difference between a nine second change of position and a thirty-two second one. Only a single brand here admits how many motors it fits. We also found one manufacturer stating a completely different desktop size in its bullet points than in its own title, on two listings carrying nearly ten thousand ratings between them. So this ranking of the best electric standing desk options is built on the specification that survives scrutiny, not the one in the marketing copy.', // INTRO OTIMIZADA
            'conclusion' => 'The best electric standing desk for a home office is usually a single-motor model between £120 and £160, because above that price you are mostly paying for lift speed and load capacity that a normal desk setup never uses. That said, check the load rating against what you actually own before you order. Two 27 inch monitors on an arm, a desktop tower and a laptop dock will pass 40kg without much effort, which leaves very little headroom on a desk rated at 50kg. Check the minimum height too, not just the maximum, because a sit stand desk that only drops to 75cm has never really sat down. If your setup is heavy, or you expect to raise and lower it several times a day, a dual motor desk is the upgrade that matters, and it is the only feature in this category where the extra money buys measurably different hardware rather than a drawer and a USB port.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                        // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-27 13:00:00',                              // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'ErGear Electric Standing Desk 140 x 70cm, 4 Memory',                       // NOME
                'price' => '£139.99',                                                                // PRECO NA COLETA
                'rating' => 4.7,                                                                     // NOTA
                'reviews_count' => 7460,                                                             // Nº DE AVALIACOES (MAIOR AMOSTRA DA BUSCA INTEIRA)
                'image' => 'https://m.media-amazon.com/images/I/7197MPF2pmL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'ErGear electric standing desk 140 x 70cm in vintage wood finish',      // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FMK17V9T?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The best-evidenced desk in the category by a distance: 7,460 ratings at 4.7, with 80kg of load, four memory presets and a 72 to 118cm range for £139.99.', // TEXTO CURTO DO CARD
                'body' => 'No other height adjustable desk in this search is close on evidence. A sample of 7,460 ratings at 4.7 is more than twice the next largest, and for a product whose main failure mode is a motor or controller giving up after a year, that depth of feedback is the most valuable thing on the page.

The specification backs it up. The 80kg load rating is the second highest here and comfortably above the 50kg and 60kg you get on several rivals, the range of 72 to 118cm covers most users sitting and standing, and four memory presets is more than the two you get on the Devoko or the ERGOMAKER. Running noise is quoted below 50 dB and the frame is rated to 50,000 lift cycles. At £139.99 for a 140 x 70cm desktop, nothing here offers a better ratio of evidence to price.

One thing to ignore on the listing. The second bullet describes the work surface as measuring 100 cm x 60 cm, while the title, the product name and the specification table all say 140 x 70cm. This is boilerplate copied across the ErGear range rather than a description of this desk, and the same error appears on their 160 x 80cm model. Trust the title and the specification table, which agree with each other, and treat the bullet points as marketing text that nobody proofread.',
                'pros' => ['7,460 ratings at 4.7, by far the largest sample in the category', '80kg load capacity, well above most rivals at this price', 'Four memory presets, double what several competitors offer', '72 to 118cm range covers most users sitting and standing', 'Frame rated to 50,000 lift cycles'],
                'contras' => ['Bullet points state a 100 x 60cm desktop while the title says 140 x 70cm', 'Motor count is never stated, so assume single motor', 'No lift speed published', 'Splice board rather than a one-piece top'],
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'Desktronic HomeOne Dual Motor Standing Desk 120 x 60cm',                   // NOME
                'price' => '£299.99',                                                                // PRECO NA COLETA
                'rating' => 4.7,                                                                     // NOTA
                'reviews_count' => 3216,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71u5g5hGYQL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Desktronic HomeOne dual motor standing desk in white, 120 x 60cm',     // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B096H9PPDS?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only desk here that states its motor count, and the payoff is real: dual motors, 120kg of load and 30mm/s of lift, with a 25mm one-piece laminate top.', // TEXTO CURTO DO CARD
                'body' => 'Desktronic is the only brand in this guide that tells you how many motors it fits, and once you see what that buys, the silence from everyone else becomes conspicuous. Two motors lift 120kg here, which is fifty percent more than the 80kg ErGear and more than double the 50kg Devoko. They also share the work, so each one runs cooler and wears more slowly, which is the real durability argument for a dual motor standing desk rather than the marketing one.

The rest is well judged. Lift speed is 30mm/s, a touchscreen controller holds three memory presets, and USB plus USB-C ports are built into the desktop rather than clamped on afterwards. The 25mm European laminate is the thickest top in this guide, against 15mm and 16mm on the budget desks, and a thicker top is what stops the middle of a wide desk sagging under a monitor arm.

The catch is size for money. At £299.99 you get a 120 x 60cm desktop, which is the smallest surface of any complete desk in this guide, while the £122.99 VASAGLE gives you 160 x 70cm. You are buying engineering rather than acreage. If your desk carries two monitors on an arm plus a tower, that is the right trade. If it carries a laptop, it is not.',
                'pros' => ['Dual motors, the only stated motor count in this guide', '120kg load capacity, the highest here', '25mm one-piece laminate, the thickest top in the guide', '30mm/s lift with a touchscreen controller', 'Built-in USB and USB-C charging'],
                'contras' => ['Only 120 x 60cm of desktop for £299.99', 'Three memory presets rather than four', 'More than twice the price of desks with larger surfaces', 'No stated minimum height in the bullets'],
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'VASAGLE Electric Standing Desk 160 x 70cm, 4 Memory',                      // NOME
                'price' => '£122.99',                                                                // PRECO NA COLETA (O MAIS BARATO DA LISTA)
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 635,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71Ttkp+rwPL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'VASAGLE electric standing desk 160 x 70cm in rustic brown and black',  // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DL95ZSBL?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest desk in the guide at £122.99, and it still gives you the largest surface, four memory presets, 70kg of load and the quietest motor here at 48 dB.', // TEXTO CURTO DO CARD
                'body' => 'This is the desk that makes the mid-priced options look expensive. For £122.99, less than any other complete desk in this guide, you get a 160 x 70cm surface, which is a third larger than the £299.99 Desktronic, plus four memory presets, a 72 to 120cm range and a 70kg load rating that sits above the FLEXISPOT, the Devoko and the ERGOMAKER.

It is also the quietest desk here. The quoted 48 dB is the lowest figure published by any listing in this search, and on a desk you raise and lower several times a day in a room where other people are working, that is worth more than a drawer or a USB port. The storage pocket and the bag hook are small touches, but they are the sort of thing you use daily.

Two honest limitations. The review sample of 635 is modest next to the four-figure counts above it, and VASAGLE sells this desk across several sizes that all share the same rating pool, so the score is not specific to the 160 x 70cm version. And like almost everything here it does not state a motor count or a lift speed, so plan on single-motor performance. For a first standing desk on a budget, none of that outweighs what you get for the money.',
                'pros' => ['Cheapest desk in this guide at £122.99', '160 x 70cm, the joint-largest surface here', '48 dB, the quietest published figure in the guide', '70kg load, above several pricier rivals', 'Four memory presets, plus a storage pocket and hook'],
                'contras' => ['635 ratings, a smaller sample than the desks above it', 'Rating pool is shared across several VASAGLE sizes', 'No motor count or lift speed published', 'Engineered wood top rather than a thick laminate'],
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'FLEXISPOT E1 One-Piece Electric Standing Desk 100 x 60cm',                 // NOME
                'price' => '£129.99',                                                                // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 3239,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61Tq2+yNq2L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'FLEXISPOT E1 one-piece electric standing desk with maple top',         // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FVRTJ4K7?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The best-certified desk here, with IGR, CE and TÜV marks, 20,000 fatigue cycles and anti-collision. However, it only drops to 75cm and carries the second lowest load at 60kg.', // TEXTO CURTO DO CARD
                'body' => 'FLEXISPOT has been making lifting columns for twenty years, and this listing is the only one in the search that names its certifications: IGR, CE and TÜV, with 20,000 fatigue cycles behind the frame and a constant power supply system to guard against motor overheating. Anti-collision stops and reverses the top when it meets an obstacle, which matters if you have a drawer unit or a windowsill in the way. It also draws under 0.5W on standby, the only listing here that mentions standby power at all.

The problem is the height range. This desk goes from 75cm to 110cm, and 75cm is the issue rather than 110cm. A normal seated desk height is around 72cm, and lower for shorter users, so at its lowest setting this sit stand desk is still slightly too tall for many people to sit at comfortably. A height adjustable desk that cannot reach a proper sitting height has given away half its purpose, and no other desk in this guide has a floor that high.

Load is the other constraint at 60kg, the second lowest here, and the one-piece top is 16mm rather than the 25mm on the Desktronic. Balanced against that, 3,239 ratings at 4.5 and a genuinely engineered frame make it a sound buy for a lighter setup, provided you check that 75cm works for you.',
                'pros' => ['IGR, CE and TÜV certified, the only listing here to name them', '20,000 fatigue cycles and overheating protection', 'Anti-collision detection that stops and reverses', 'One-piece desktop rather than a splice board', '3,239 ratings at 4.5'],
                'contras' => ['Only drops to 75cm, above a normal seated desk height', '60kg load, the second lowest in this guide', '16mm top, thinner than the premium desks here', 'Smallest listed frame range of the complete desks'],
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'ErGear Electric Standing Desk 160 x 80cm, 4 Memory',                       // NOME
                'price' => '£139.94',                                                                // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 2424,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61opHg+VsYL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'ErGear electric standing desk 160 x 80cm in light wood finish',        // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D9MFL7MM?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The largest desktop in the guide at 160 x 80cm for £139.94, with 80kg of load and four memory presets. It repeats the same desktop size error as its smaller sibling.', // TEXTO CURTO DO CARD
                'body' => 'If floor space is not the constraint, this is the most desk per pound in the search. A 160 x 80cm surface is 12,800 square centimetres, more than twice the Desktronic HomeOne at £299.99, and it comes with the same 80kg load rating, the same four memory presets and the same 72 to 118cm range as the ErGear at number one, for 5p less.

The 65mm alloy lifting frame is wider than the 60mm columns on the Devoko, which helps at full extension where a wide top is most likely to wobble, and the 15mm spliced worktop is standard for this price. Quoted noise is 55 dB or under, which is the loudest figure of the desks that publish one, so it is a touch noisier than the VASAGLE at 48 dB. It holds 4.5 from 2,424 ratings, the third largest sample here.

The listing repeats the size error we flagged at number one, and this is what confirms it is boilerplate rather than a one-off typo. The title and the specification table both say 160 x 80cm. The third bullet says the desktop measures 120cm by 60cm. Two ErGear listings, two different wrong sizes in the bullets, nearly ten thousand ratings between them. The desks are almost certainly the advertised size, but nothing in the bullet points of either listing can be relied on.',
                'pros' => ['160 x 80cm, the largest desktop in this guide', '80kg load capacity for £139.94', 'Wider 65mm alloy lifting columns', 'Four memory presets and an LED control panel', '2,424 ratings at 4.5'],
                'contras' => ['Bullet points state a 120 x 60cm desktop while the title says 160 x 80cm', '55 dB, the loudest published noise figure here', 'Needs a lot of floor space at 160cm wide', 'No motor count or lift speed given'],
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'Desktronic HomePro Dual Motor Standing Desk 140 x 70cm',                   // NOME
                'price' => '£399.99',                                                                // PRECO NA COLETA (O MAIS CARO DA LISTA)
                'rating' => 4.7,                                                                     // NOTA
                'reviews_count' => 916,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71VFKPYbgZL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Desktronic HomePro dual motor standing desk in black and walnut',      // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BHTSNRD1?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The fastest and most adjustable desk here: 50mm/s, full travel in under six seconds, and a 62 to 127cm range that no other desk in this guide comes near.', // TEXTO CURTO DO CARD
                'body' => 'Two numbers justify this desk and both are about movement. It lifts at 50mm/s, reaching your preferred height in under six seconds, which is three and a half times the ERGOMAKER at 14mm/s and nearly double its own HomeOne sibling. That sounds like a detail until you own a slow desk, at which point you simply stop changing position, and a stand up desk you never raise is an expensive ordinary desk.

The second number is the range: 62cm to 127cm. Nothing else here goes below 72cm or above 120cm. That 62cm floor makes it one of the few desks on Amazon that genuinely suits a shorter user sitting down, and the 127cm ceiling suits someone well over six feet standing up. If a couple of very different heights share the desk, this is the one that actually fits both, and the three memory presets make switching painless.

It is also £399.99, the most expensive thing in this guide by £100, for a 140 x 70cm top that the ErGear matches for £139.99. The 25mm European laminate and the dual motors are real, and 916 ratings at 4.7 say the build holds up. But you are paying roughly £260 over the ErGear for speed, range and a thicker top, and most people will not use any of the three hard enough to notice.',
                'pros' => ['50mm/s lift, full travel in under six seconds', '62 to 127cm range, by far the widest in this guide', 'Dual motors with a stated motor count', '25mm European laminate one-piece top', '4.7 from 916 ratings'],
                'contras' => ['£399.99, the most expensive desk in this guide', 'Same 140 x 70cm top as a desk costing £260 less', 'No published load capacity in the bullets', 'Three memory presets rather than four'],
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'ERGOMAKER Electric Standing Desk 160 x 70cm',                              // NOME
                'price' => '£159.99',                                                                // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 874,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71E0sSPkPFL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'ERGOMAKER electric standing desk 160 x 70cm with rustic brown top',    // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D9GR4D3D?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The best warranty in the guide at five years on the frame, plus a childproof lock. The trade-off is the slowest published lift speed here at 14mm/s.', // TEXTO CURTO DO CARD
                'body' => 'ERGOMAKER is the only brand in this search to publish a proper warranty structure: five years on the frame, two years on the motor, handset and power adapter, and lifetime technical support. Everyone else here offers either nothing or a single year. On a product with moving parts and an electronic controller, that is the most meaningful reassurance on the page and the main reason to consider it over the cheaper VASAGLE.

The childproof lock is the other genuinely useful feature, and it is rarer than it should be. A desk that can be raised by a toddler pressing a button is a desk that can trap fingers or tip a monitor, and only this desk and the FLEXISPOT Q3 mention a lock at all.

The cost is speed. At 14mm/s this is the slowest desk here by a wide margin, and the arithmetic is unforgiving: moving through its full 45cm of travel takes around 32 seconds, against nine on the Desktronic HomePro. Half a minute of standing there waiting, several times a day, is exactly how a sit stand desk quietly turns into a fixed one. Load is also modest at 65kg, and you only get two memory presets against four on the ErGear and VASAGLE. At £159.99 it costs £37 more than the VASAGLE for a warranty and a lock.',
                'pros' => ['Five-year frame warranty, the longest in this guide', 'Two years on the motor, handset and adapter', 'Childproof lock against accidental adjustment', '160 x 70cm surface for £159.99', 'Quiet at under 50 dB'],
                'contras' => ['14mm/s lift, the slowest published speed here by far', 'Around 32 seconds for full travel, against 9 on the fastest', 'Only two memory presets', '65kg load, below the ErGear and VASAGLE'],
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'Devoko Electric Standing Desk 160 x 70cm, 2 Memory',                       // NOME
                'price' => '£133.99',                                                                // PRECO NA COLETA
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 3372,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/51ODb3VbkYL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Devoko electric standing desk 160 x 70cm in white',                    // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BW6RPBCX?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A large 160 x 70cm desk with 3,372 ratings behind it, but the load rating is 50kg, the joint lowest in this guide, on one of the widest tops.', // TEXTO CURTO DO CARD
                'body' => 'The sample here is excellent. With 3,372 ratings at 4.3, this is the second most reviewed desk in the search, and the hardware reads well on paper: 60mm industrial alloy columns, a 15mm desktop, wide T-shaped feet for stability at full height, anti-collision that pauses and rebounds by 2cm, and a claimed thirty minute assembly.

The number that gives us pause is the load rating. Devoko states 50kg, which is the joint lowest in this guide, and it is carrying a 160 x 70cm top, one of the largest. That combination is the one to think about hardest, because a wide desk invites you to fill it. Two 27 inch monitors on a dual arm come to roughly 15 to 20kg with the arm, a mid-tower PC is 10 to 15kg, and a laptop, dock, speakers and a monitor riser take you past 40kg without trying. At that point you are running a 50kg desk near its ceiling every day.

It also gives you only two memory presets, against four on the ErGear and VASAGLE at similar money, and at 4.3 it holds the lowest rating of any complete desk in this guide. It is not a bad desk, and the review count says most buyers are happy. It is simply outclassed at its own price by the desks above it.',
                'pros' => ['3,372 ratings, the second largest sample in this guide', '160 x 70cm surface for £133.99', '60mm industrial alloy lifting columns', 'Anti-collision that pauses and rebounds by 2cm', 'Around 30 minutes to assemble'],
                'contras' => ['50kg load rating, the joint lowest here, on a 160cm top', 'Only two memory presets at this price', '4.3, the lowest rating of the complete desks in this guide', 'No motor count or lift speed published'],
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'FLEXISPOT Q3 Standing Desk with Drawer and USB-C, 120 x 60cm',             // NOME
                'price' => '£203.99',                                                                // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 625,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61pdGGKAjuL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'FLEXISPOT Q3 standing desk in maple with integrated drawer',           // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0H33T41H9?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A built-in drawer, USB-C charging and a child lock, assembled in about fifteen minutes. It is £204 for a 120 x 60cm top rated at just 50kg.', // TEXTO CURTO DO CARD
                'body' => 'The Q3 is the tidiest desk in this guide, and for a small room that counts. The pull-out drawer is integrated into the desktop rather than bolted underneath, so it does not eat knee room, and it takes the stationery and cables that otherwise live in a pile. USB-C charging is built in, there is a child lock, four memory presets, anti-collision, and FLEXISPOT quotes a fifteen minute assembly in three steps, which is the fastest claim here.

What it does not give you is desk. At 120 x 60cm this is the joint smallest surface in the guide, matching the Desktronic HomeOne, and it costs £203.99 against £122.99 for a VASAGLE with a third more space. The load rating is 50kg, joint lowest here, which is a slightly awkward figure on a desk aimed at people who want their peripherals organised on it.

At 4.6 from 625 ratings the feedback is good, and if the drawer and the USB-C port solve a real problem in your setup then the premium is defensible. Judged purely on the numbers this guide ranks by, load and speed, it is mid-table hardware at an upper-mid price, and the lift speed is not published at all.',
                'pros' => ['Integrated pull-out drawer that does not reduce knee room', 'USB-C fast charging built into the desktop', 'Child lock and anti-collision protection', 'Four memory presets', 'Assembly in about fifteen minutes'],
                'contras' => ['£203.99 for a 120 x 60cm top, the joint smallest here', '50kg load rating, joint lowest in this guide', 'No lift speed or motor count published', 'Costs £81 more than a larger VASAGLE'],
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'MAIDeSITe Two-Stage Electric Standing Desk Frame',                         // NOME
                'price' => '£128.99',                                                                // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 573,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61xK7ZStPgL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'MAIDeSITe two-stage electric standing desk frame in black, no desktop', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08CNB7H23?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Not a desk. This is the frame only, with no desktop, at £128.99, and the entire listing carries a single bullet point.', // TEXTO CURTO DO CARD
                'body' => 'This is the standing desk equivalent of a bare power tool, and it is easy to miss. At £128.99 it sits in the search results next to complete desks at £122.99 and £133.99, but what arrives is a pair of motorised legs. You supply the desktop, which needs to be between 100 and 180cm wide and 50 to 80cm deep, and either buy one separately or reuse a top you already own.

For the right buyer that is genuinely the best option on this page. If you already have a solid wood or laminate top you like, or you want a desk deeper and thicker than anything sold as a complete unit, a frame is the sensible purchase, and this one has the widest adjustment range in the search at 72 to 120cm with a width range of 96 to 160cm. It holds 4.6 from 573 ratings.

Two things put it last. It is a two-stage frame rather than three-stage, which means fewer telescoping segments, a narrower usable range and generally less rigidity at full height than the three-stage frames sold at similar money. And the listing itself is close to empty: one bullet point, no load capacity, no lift speed, no motor count, no noise figure. For a product where the frame is the entire purchase, that is remarkably little to go on.',
                'pros' => ['Widest adjustment range in the search at 72 to 120cm', 'Frame width adjusts from 96 to 160cm to fit most tops', 'Ideal if you already own a desktop you want to keep', 'Heavy-duty steel with memory panel', '4.6 from 573 ratings'],
                'contras' => ['Frame only, with no desktop included at £128.99', 'The entire listing has a single bullet point', 'Two-stage rather than three-stage, so less rigid at full height', 'No load capacity, lift speed or motor count published'],
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
