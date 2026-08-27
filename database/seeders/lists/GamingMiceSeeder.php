<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class GamingMiceSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE MOUSES GAMER DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // COLETA: AMAZON.CO.UK EM 27/08/2026, ENTREGA EM M4 6BD (MANCHESTER), BUSCA "gaming mouse" FILTRADA A PARTIR DE £25.
        //
        // ═══ ACHADOS DA COLETA (O DIFERENCIAL DO ARTIGO) ═══
        // 1. DPI INFLACIONADO — MESMO PADRAO DOS "30.000 LUMENS" DO ARTIGO DE PROJETORES:
        //    LOGITECH G PRO X SUPERLIGHT 2 SE 44.000 DPI · CORSAIR SABRE v2 PRO 33.000 · RAZER BASILISK V3 26.000 ·
        //    LOGITECH G502 25.600 · CORSAIR NIGHTSWORD 18.000 · RAZER DEATHADDER V2 X 14.000 · LOGITECH G305 12.000.
        //    A ARITMETICA: A 44.000 DPI, UMA POLEGADA DE MOVIMENTO MOVE O CURSOR 44.000 PIXELS. UM MONITOR 4K TEM 3.840 DE LARGURA.
        //    UMA POLEGADA ATRAVESSARIA A TELA 11,5 VEZES. JOGADOR COMPETITIVO USA 400-1.600 DPI.
        // 2. A CONTRAPROVA ESTA NA PROPRIA BUSCA: O REDRAGON M908 (8.603 AVALIACOES) ANUNCIA "12.400 DPI" MAS LISTA OS PRESETS
        //    QUE REALMENTE ENTREGA — 500/1000/2000/3000/6200. NENHUM PASSA DE 6.200.
        // 3. OS DOIS MOUSES MAIS AVALIADOS DA BUSCA SAO OS DOIS MAIS BARATOS: G502 HERO (39.101 AVALIACOES, £26,99) E
        //    G305 (23.820, £25,49) — 62.921 AVALIACOES SOMADAS. O DE 33.000 DPI CUSTA £89,97 E TEM 297 AVALIACOES COM NOTA 4.2.
        // 4. PESO VARIA 3,9x E QUASE NINGUEM LIDERA COM ELE: CORSAIR SABRE v2 PRO 36g CONTRA CORSAIR NIGHTSWORD ATE 141g.
        //    PARA FPS, PESO DECIDE MAIS QUE DPI.
        // 5. CORSAIR VENDE O SABRE v2 PRO A £89,97 COM O AVISO "Note: iCUE support coming soon" — O PROPRIO SOFTWARE DE
        //    CONFIGURACAO DA CORSAIR AINDA NAO SUPORTA O MOUSE.
        // 6. O "8.000Hz" TEM LETRA MIUDA NOS DOIS LADOS: NA CORSAIR, "dependent on CPU specifications"; NA LOGITECH,
        //    EXIGE O "PRO LIGHTSPEED wireless receiver (sold separately)".
        // 7. RAZER DEATHADDER V2 X: O TITULO DIZ "235 Hours of Battery Life" E O BULLET 3 DIZ "up to 240* hours".
        // 8. ASINS DUPLICADOS NA BUSCA: G305 EM B07CGPZ3ZQ (£25,49) E B07CGNP3RH (£27,99), MESMAS 23.8K AVALIACOES;
        //    BASILISK V3 EM B097F8H1MC (£37,59) E B0FL2RBW99 (£37,89), MESMAS 9.9K. USADO SEMPRE O MAIS BARATO.
        //    A BUSCA AINDA DEVOLVE UM COMBO DE TECLADO+MOUSE (B09D9RP5WS) QUE NAO E MOUSE GAMER. FICOU DE FORA.
        //
        // ═══ CRITERIO DE CORTE ═══
        // EXCLUIDOS POR AMOSTRA INSUFICIENTE (<250 AVALIACOES): B0H4MN8K6W (22), B0FGXK9B1K (58), B0G39LB3WN (95),
        // B0F2FC4VBB (106), B0DBZGCQHX (160). O SABRE v2 PRO ENTROU COM 297 POR SER O CASO CENTRAL DO ARTIGO.
        //
        // ═══ VARIACOES DE PALAVRA-CHAVE TRABALHADAS NO TEXTO ═══
        // best gaming mouse · best gaming mouse on amazon · wireless gaming mouse · best budget gaming mouse ·
        // lightweight gaming mouse · best gaming mouse for fps · ergonomic gaming mouse · wired gaming mouse ·
        // best gaming mouse under 30 · gaming mouse with programmable buttons
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                        // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                        // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-gaming-mouse',                                        // SLUG DO ARTIGO (URL) = PALAVRA-CHAVE EM formato-url
            'title' => 'Best Gaming Mouse 2026: 10 Ranked on Weight, Not DPI',     // TITULO / H1 — CONTEM A PALAVRA-CHAVE
            'meta_title' => 'Best Gaming Mouse 2026: Top 10 Ranked',              // TITLE DA ABA/GOOGLE (40 CHARS)
            'meta_description' => 'We ranked the best gaming mouse options on weight, switches and evidence rather than DPI. One claims 44,000 DPI; nobody can use more than about 3,200.', // META DESCRIPTION (~154 CHARS)
            'focus_keyword' => 'best gaming mouse',                               // PALAVRA-CHAVE PRINCIPAL — VIRA O ALT DO HERO
            'hero_image' => '',                                                   // SEM HERO MANUAL: A VIEW USA A FOTO DO PRODUTO #1 COMO IMAGEM SOCIAL
            'intro' => 'The headline number on every gaming mouse is the one number you should ignore. In this guide the sensors range from 12,000 DPI to 44,000 DPI, and here is what 44,000 means in practice: moving the mouse one inch would move the cursor 44,000 pixels, while a 4K monitor is only 3,840 pixels wide. One inch of hand movement would cross the whole screen more than eleven times. Competitive players actually play between 400 and 1,600 DPI, and the most convincing proof sits inside this very search. The Redragon at number four advertises 12,400 DPI in its title, then lists the five presets it genuinely ships with, and the highest of them is 6,200. So we ranked the best gaming mouse options on the specifications that change how a mouse feels: weight, which varies almost four times across this list, switch type and rated lifespan, button count, battery life where it applies, and the depth of real customer evidence behind each one.', // INTRO OTIMIZADA
            'conclusion' => 'The best gaming mouse for almost everyone is a well-made £26 to £40 mouse from a brand with tens of thousands of ratings, because the specification that decides how a mouse plays is weight and shape, and neither improves as the DPI number climbs. Work out your grip first. A claw or fingertip grip wants something light, ideally under 70g, while a palm grip on a large hand wants a contoured ergonomic body and will not mind 100g. After that, look at the switches and their rated click count, because that is the part that fails first on a mouse used for hours a day. Treat 8,000Hz polling claims with care, since one here needs a receiver sold separately and another depends on your CPU. And remember what the review counts are telling you: the two most bought gaming mice on Amazon UK are also two of the cheapest, with more than sixty thousand ratings between them, while the mouse advertising 33,000 DPI costs three times as much and has fewer than three hundred.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                        // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-27 14:00:00',                              // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'Logitech G502 HERO Wired Gaming Mouse',                                    // NOME
                'price' => '£26.99',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 39101,                                                            // Nº DE AVALIACOES (MAIOR AMOSTRA DE TODO O SITE)
                'image' => 'https://m.media-amazon.com/images/I/61mpMH5TzkL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Logitech G502 HERO wired gaming mouse in black with RGB lighting',     // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07GS6ZB7T?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'With 39,101 ratings at 4.6 this is the most reviewed gaming mouse on Amazon UK, and it costs £26.99. Eleven programmable buttons, adjustable weights and a 1000Hz report rate.', // TEXTO CURTO DO CARD
                'body' => 'Nothing else in this category is close on evidence. A sample of 39,101 ratings at 4.6 is bigger than the next four mice in this guide put together, and it has been on sale long enough that those ratings describe mice that survived years of daily use rather than a launch week. For £26.99, that is the strongest combination of price and proof anywhere in this search.

The hardware still holds up. The HERO sensor runs to 25,600 DPI with no smoothing, filtering or acceleration, which is the phrase that actually matters, far more than the ceiling itself. There are eleven programmable buttons, a dual-mode scroll wheel that switches between ratcheted and free-spinning, and five 3.6g weights so you can tune the feel. The mechanical button tension system with springs and pivots is what gives it the crisp click people keep coming back for.

It is wired, and at around 121g it is a heavy mouse by 2026 standards, roughly three times the 36g Corsair at the bottom of this list. For a palm grip and a large hand that weight reads as solid rather than sluggish, and the cable removes any battery question. For a fingertip grip or a light-mouse FPS player, look at the G PRO X SUPERLIGHT 2 SE at number five instead.',
                'pros' => ['39,101 ratings at 4.6, the largest sample in the whole category', '£26.99, a third of the price of the flagships here', 'Eleven programmable buttons and a dual-mode scroll wheel', 'Five 3.6g weights for tuning the balance', 'Sensor stated with no smoothing, filtering or acceleration'],
                'contras' => ['Heavy at around 121g, wrong for a fingertip grip', 'Wired only, with no wireless version at this price', 'Large body suits big hands better than small ones'],
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'Logitech G305 LIGHTSPEED Wireless Gaming Mouse',                           // NOME
                'price' => '£25.49',                                                                 // PRECO NA COLETA (O MAIS BARATO DA LISTA)
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 23820,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/51sg9BLSMTL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Logitech G305 LIGHTSPEED wireless gaming mouse in black',              // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07CGPZ3ZQ?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest mouse here at £25.49, and it is wireless with 23,820 ratings at 4.6. It runs 250 hours on a single AA battery and weighs just 96g.', // TEXTO CURTO DO CARD
                'body' => 'This is the mouse that makes the expensive wireless options hard to justify. It is £25.49, it uses proper LIGHTSPEED wireless with a 1ms report rate rather than generic 2.4GHz, and 23,820 people have rated it 4.6. That is the second largest sample in this guide and it belongs to the cheapest product in it.

The battery approach is the clever part. Instead of a rechargeable cell that degrades after a few hundred cycles, it takes a single AA and runs for 250 hours of continuous play, or up to nine months in Endurance mode. There is no charging cable to remember and no battery health to worry about in three years, which for a lot of people is a better answer than the 88-hour rechargeable in the mouse at number five. At 3.4 oz, about 96g, it is also lighter than the G502 HERO.

Its sensor tops out at 12,000 DPI, the lowest figure in this guide, and that is worth sitting with for a moment. It is the second most reviewed gaming mouse on Amazon UK, at the highest rating tier here, with the lowest maximum DPI of anything on this page. If the number mattered the way the marketing implies, that could not be true. What you do give up is buttons, with six against eleven on the G502, and there is no RGB at all.',
                'pros' => ['£25.49, the cheapest mouse in this guide', '23,820 ratings at 4.6, second largest sample here', 'True LIGHTSPEED wireless with a 1ms report rate', '250 hours of play on one AA, up to 9 months in Endurance mode', 'Light at around 96g with no charging cable to manage'],
                'contras' => ['12,000 DPI ceiling, the lowest in this guide', 'Only six buttons against eleven on the G502 HERO', 'No RGB lighting at all', 'Small body may feel cramped for large hands'],
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'Razer Basilisk V3 Wired Gaming Mouse',                                     // NOME
                'price' => '£37.59',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 9923,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61AcT0ZuO3L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Razer Basilisk V3 wired gaming mouse in black with Chroma RGB',        // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B097F8H1MC?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The best scroll wheel in the guide and optical switches rated to 70 million clicks at 0.2ms. Notably, its bullet points never mention DPI once.', // TEXTO CURTO DO CARD
                'body' => 'The Basilisk V3 is the one listing here that sells itself on how the mouse works rather than on a sensor number, and the omission is telling. Across all five bullet points there is no DPI figure at all. Instead Razer talks about the HyperScroll tilt wheel, the eleven programmable buttons, the thumb rest, and optical switches rated at 0.2ms actuation for up to 70 million clicks. Those are the things you feel.

The scroll wheel deserves the attention it gets. It free-spins until you stop it, which is genuinely useful for long documents and inventory screens, then switches to a ratcheted tactile mode for weapon cycling where you need to count clicks. No other mouse in this guide offers both modes, and once you have used it, going back to a fixed wheel is a real downgrade.

The optical switches are the other reason to pick this over the G502 HERO. Optical actuation removes the mechanical debounce that eventually produces double-clicking on worn mechanical switches, which is the single most common way a heavily used gaming mouse dies. At £37.59 with 9,923 ratings at 4.6 it costs £10.60 more than the Logitech and buys a better wheel and switches that should outlast it. The eleven RGB zones are the part you can safely ignore.',
                'pros' => ['HyperScroll wheel with both free-spin and tactile modes', 'Optical switches at 0.2ms, rated to 70 million clicks', 'Eleven programmable buttons including a multi-function trigger', '9,923 ratings at 4.6', 'Ergonomic shape with a proper thumb rest'],
                'contras' => ['Wired only at this price', 'Heavier than the light FPS mice here', 'Eleven RGB zones add cost without adding performance', 'Advanced features need Razer Synapse installed'],
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'Redragon M908 Impact MMO Gaming Mouse, 18 Buttons',                        // NOME
                'price' => '£28.03',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 8603,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61kI0PIuXVL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Redragon M908 Impact MMO gaming mouse with 12 side buttons and RGB',   // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07FK9PKSM?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Twelve side buttons for MMO players at £28.03, and the only listing here honest enough to publish the DPI presets it actually ships: 500, 1000, 2000, 3000 and 6200.', // TEXTO CURTO DO CARD
                'body' => 'For anyone playing an MMO or anything with a large hotbar, a twelve-button side panel changes how you play far more than any sensor upgrade, and this is the cheapest credible way to get one. There are eighteen programmable buttons in total, five onboard memory profiles each with its own indicator colour, and an eight-piece weight tuning set. At £28.03 with 8,603 ratings at 4.4, it is remarkable value for a specialist shape.

It is also the most honest listing in this guide, and that is why it sits this high. The title advertises a maximum of 12,400 DPI, then the first bullet does something nobody else here does: it lists the five DPI levels the mouse actually cycles through, which are 500, 1000, 2000, 3000 and 6200. Every one of those is a sensitivity a real person might use, and the highest is barely a seventh of the 44,000 DPI headline on the mouse at number five. Redragon is quietly telling you what the ceiling is for, which is the specification sheet, not your hand.

The compromises are what you expect at this price. Build quality is plastic rather than premium, the software is dated and Windows-only, and at 4.4 the rating sits below the three mice above it. The shape is also large and heavily contoured, so it suits a palm grip and nothing else.',
                'pros' => ['Twelve side buttons and eighteen programmable in total', 'Publishes its real DPI presets: 500, 1000, 2000, 3000 and 6200', 'Five onboard profiles with colour identification', 'Eight-piece weight tuning set included', '8,603 ratings at 4.4 for £28.03'],
                'contras' => ['Plastic build that feels its price', 'Dated Windows-only configuration software', 'Large contoured shape only suits a palm grip', 'Lowest rating of the sub-£30 mice here'],
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'Logitech G PRO X SUPERLIGHT 2 SE Wireless Gaming Mouse',                   // NOME
                'price' => '£79.99',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 580,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/51FVxk5spcL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Logitech G PRO X SUPERLIGHT 2 SE wireless gaming mouse in black',      // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F1YS92S2?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A genuine 60g competitive mouse with 88 hours of battery and hybrid optical-mechanical switches. Its 44,000 DPI headline is meaningless, and the 8kHz receiver is sold separately.', // TEXTO CURTO DO CARD
                'body' => 'If you play FPS seriously, this is the mouse on this page that will change your aim, and the reason is 60 grams. That is half the G502 HERO at number one, and moving 60g rather than 121g across a mousepad for three hours is a completely different physical experience. The LIGHTFORCE hybrid optical-mechanical switches give you an optical actuation with a mechanical click feel, the PTFE feet glide properly out of the box, and 88 hours of battery over USB-C means you charge it weekly rather than nightly.

Now the two pieces of small print. The 44,000 DPI figure is the largest number in this guide and it is pure specification-sheet theatre, since the professionals this mouse is built for compete between 400 and 1,600 DPI. More usefully, the bullet about 8kHz polling ends with three important words: the PRO LIGHTSPEED wireless receiver needed to reach it is sold separately. Out of the box this is a 1kHz mouse, exactly like the £25.49 G305, and the listing also notes that the sensor claims were tested on a specific Logitech mousepad.

At £79.99 with only 580 ratings it is also the least proven Logitech here by a wide margin. Buy it for the 60g weight and the switches, which are real and excellent. Do not buy it for the sensor number or the polling rate, because one is unusable and the other costs extra.',
                'pros' => ['60g, genuinely light enough to change how you aim', 'LIGHTFORCE hybrid optical-mechanical switches', '88-hour battery over USB-C', 'Zero-additive PTFE feet that glide well from new', '4.6 rating from the pro-focused design'],
                'contras' => ['8kHz polling needs a receiver sold separately', '44,000 DPI is far beyond anything usable', 'Only 580 ratings, the thinnest Logitech sample here', 'Five buttons only, and £53 more than the G502 HERO'],
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'Razer Basilisk V3 X HyperSpeed Wireless Gaming Mouse',                     // NOME
                'price' => '£47.69',                                                                 // PRECO NA COLETA
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 2203,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71jvxQ6NoqL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Razer Basilisk V3 X HyperSpeed wireless gaming mouse in black',        // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BT4VRZGV?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The best battery life here by a distance: 285 hours on HyperSpeed wireless and up to 535 on Bluetooth, with the proven Basilisk shape and nine controls.', // TEXTO CURTO DO CARD
                'body' => 'This takes the Basilisk shape people already like and cuts the cable, with the longest battery figures in this guide by a wide margin. Razer quotes 285 hours on 2.4GHz HyperSpeed and up to 535 hours on Bluetooth, against 240 for the DeathAdder and 88 for the Logitech SUPERLIGHT. Having both radios also makes it a sensible mouse to share between a gaming PC and a work laptop, switching modes rather than swapping devices.

The switches are mechanical Gen-2 with gold-plated contacts rated to 60 million clicks, which is a step down from the 70 million optical switches on the wired Basilisk V3 at number three but still generous. The 18K optical sensor is a more modest, more honest number than most of this list, and nine customisable controls covers everything short of an MMO hotbar.

Two things keep it at sixth. At 4.3 it holds the joint lowest rating in this guide from a decent 2,203-rating sample, which is a real signal rather than noise. And at £47.69 it costs £10 more than the wired Basilisk V3 while giving you fewer buttons, mechanical rather than optical switches and no HyperScroll wheel. Wireless is the only thing the extra money buys, so it comes down to how much the cable bothers you.',
                'pros' => ['285 hours on HyperSpeed wireless, 535 on Bluetooth', 'Both 2.4GHz and Bluetooth, so it works with a laptop too', 'Proven ergonomic Basilisk shape', 'Gen-2 mechanical switches rated to 60 million clicks', '2,203 ratings behind it'],
                'contras' => ['4.3, the joint lowest rating in this guide', '£10 more than the wired V3 for fewer buttons', 'No HyperScroll wheel, unlike the wired version', 'Mechanical rather than optical switches'],
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'Razer DeathAdder V2 X HyperSpeed Wireless Gaming Mouse',                   // NOME
                'price' => '£39.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 1336,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61HIJnrPojL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Razer DeathAdder V2 X HyperSpeed wireless ergonomic gaming mouse',     // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09DQ4NF15?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The most copied ergonomic shape in gaming, now wireless for £39.99 with 240 hours of battery. Its own title and bullets disagree on that figure by five hours.', // TEXTO CURTO DO CARD
                'body' => 'The DeathAdder shape is the reference ergonomic right-handed body that half this category imitates, and Razer says over thirteen million people have bought one. If you use a palm grip and have never got on with a symmetrical mouse, this is the shape to try, and £39.99 for a wireless version with dual radios is fair.

The specification is deliberately modest and better for it. A 14,000 DPI sensor is a quarter of the Logitech flagship and entirely sufficient, seven programmable buttons cover normal play, and the Gen-2 mechanical switches with gold-plated contacts are rated to 60 million clicks. Battery is quoted at 240 hours on HyperSpeed and 580 on Bluetooth, second only to the Basilisk V3 X here.

One small inconsistency worth noting, because it is the kind of thing this guide exists to catch. The product title advertises 235 hours of battery life. The third bullet on the same page says up to 240 hours. Five hours out of 240 changes nothing about whether you should buy it, but a listing that cannot keep its own headline figure straight is a reminder to check the numbers rather than trust them. There is also no RGB and no charging dock at this price.',
                'pros' => ['The reference ergonomic shape for palm grips', 'Dual radios, HyperSpeed 2.4GHz and Bluetooth', '240 hours of battery on 2.4GHz, 580 on Bluetooth', 'Gen-2 mechanical switches rated to 60 million clicks', 'Sensible 14,000 DPI sensor rather than an inflated one'],
                'contras' => ['Title says 235 hours of battery, the bullets say 240', 'Only seven buttons', 'Right-handed shape only', 'No RGB and no dock at this price'],
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'Logitech G502 X PLUS Lightspeed Wireless RGB Gaming Mouse',                // NOME
                'price' => '£84.99',                                                                 // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 2541,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61sLuO6LiAL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Logitech G502 X PLUS Lightspeed wireless gaming mouse with RGB',       // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07W7MJ46M?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The wireless G502 with LIGHTFORCE hybrid switches and the same HERO 25K sensor. It costs £58 more than the wired G502 HERO and rates slightly lower.', // TEXTO CURTO DO CARD
                'body' => 'This is the G502 without the cable, and it is a good mouse. The LIGHTFORCE hybrid optical-mechanical switches are the same generation as the ones in the SUPERLIGHT 2 at number five, LIGHTSPEED wireless is quoted at 68 percent faster response than the previous protocol, and the HERO 25K sensor is the same silicon as the £26.99 wired version.

That last point is the problem. Put the two G502 listings side by side and the sensor is identical, the shape is broadly the same, and the button layout is comparable. The wired G502 HERO costs £26.99 and has 39,101 ratings at 4.6. This costs £84.99 and has 2,541 ratings at 4.5. You are paying £58, more than three times the price of the original, to remove a cable and gain better switches and eight-LED RGB.

For some people that is worth it, particularly if desk clutter genuinely bothers you or the switch upgrade matters for a mouse you will use daily for years. But it is the clearest example in this guide of the wireless premium in this category, and it rates fractionally below the cheap one it replaces. If the cable does not bother you, the money is better spent elsewhere.',
                'pros' => ['LIGHTFORCE hybrid optical-mechanical switches', 'LIGHTSPEED wireless, 68 percent faster than the previous protocol', 'Same proven HERO 25K sensor as the wired G502', 'Battery optimisation through active play detection', '2,541 ratings at 4.5'],
                'contras' => ['£58 more than the wired G502 HERO for the same sensor', 'Rates 4.5 against 4.6 for the far cheaper wired version', 'Fifteen times fewer ratings than the original G502 HERO', 'Still a heavy mouse despite the price'],
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'Corsair NIGHTSWORD RGB Tunable Wired Gaming Mouse',                        // NOME
                'price' => '£59.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 1537,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61a0KNfNNNL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Corsair NIGHTSWORD RGB tunable wired gaming mouse in black',           // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07RJ1678R?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The heaviest mouse here by design, tunable from 119g to 141g across 120 configurations, with a sensor adjustable in single DPI steps rather than fixed presets.', // TEXTO CURTO DO CARD
                'body' => 'The NIGHTSWORD is built on a premise the rest of this list rejects, which is that heavier is better. It adjusts between 119g and 141g using two sets of weights across six mounting points, giving 120 possible configurations, and Corsair software detects the centre of gravity in real time so you can balance it front to back as well as by mass. Its maximum weight is almost four times the 36g of the Corsair at number ten, from the same manufacturer.

There is a real argument for it. A heavier mouse is steadier for slow, precise tracking, which suits MOBA and strategy play and anyone who finds ultralight mice twitchy. The Pixart PMW3391 sensor is also the most sensibly specified in this guide, adjustable in single DPI steps rather than jumping between coarse presets, which is genuinely more useful than a bigger ceiling. Ten programmable buttons and pro-sports-inspired rubber grips round it out.

The reasons it sits ninth are price and direction of travel. At £59.99 it costs more than twice the G502 HERO while offering fewer buttons and no wireless, and the category has moved decisively towards light mice since it launched. Its 1,537 ratings at 4.4 are solid but modest. Buy it if you have tried light mice and disliked them; otherwise the mice above it are better value.',
                'pros' => ['Tunable from 119g to 141g across 120 configurations', 'Software detects the centre of gravity in real time', 'Sensor adjustable in single DPI steps, not coarse presets', 'Ten programmable buttons', 'Contoured shape with high-grip rubber sides'],
                'contras' => ['Heaviest mouse in this guide at up to 141g', '£59.99 and still wired', 'Fewer buttons than the £28.03 Redragon', 'Design predates the shift towards ultralight mice'],
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'Corsair SABRE v2 PRO Ultralight FPS Wireless Gaming Mouse',                // NOME
                'price' => '£89.97',                                                                 // PRECO NA COLETA (O MAIS CARO DA LISTA)
                'rating' => 4.2,                                                                     // NOTA (MENOR DA LISTA)
                'reviews_count' => 297,                                                              // Nº DE AVALIACOES (AMOSTRA MAIS FINA — SINALIZADO NO TEXTO)
                'image' => 'https://m.media-amazon.com/images/I/418yO4A7XdL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Corsair SABRE v2 PRO ultralight wireless FPS gaming mouse in black',   // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FPDBK2M6?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The lightest mouse here at 36g and the loudest specification: 33,000 DPI and 8,000Hz polling. It also ships with a note saying Corsair own software does not support it yet.', // TEXTO CURTO DO CARD
                'body' => 'At 36 grams this is the lightest mouse in the guide, a third of the G502 HERO, and for competitive FPS that is the specification that actually matters. The mechanical switches are rated to 100 million clicks, the highest figure here, and 70 hours of wireless battery is respectable for something this small. On paper it is a serious esports tool.

Then you read the listing properly. The MARKSMAN S sensor is quoted at 33,000 DPI, a number no human can use, since one inch of movement at that sensitivity would cross a 4K screen more than eight times. The 8,000Hz hyper-polling headline carries an asterisk explaining it depends on your CPU specifications, so the flagship feature is conditional on hardware Corsair cannot see. And the final bullet on the page reads, in full, "Note: iCUE support coming soon". That is Corsair telling you that its own configuration software does not yet support this £89.97 mouse, which means DPI stages, lighting and button remapping are not available in the way buyers will expect.

It rates 4.2 from 297 ratings, the lowest score and the thinnest sample in this guide, on the highest price. The 36g shell is genuinely excellent hardware. But between the unusable sensor headline, the conditional polling rate and software that has not shipped, this is a product being sold ahead of itself, and there is no reason to be the person who funds the wait.',
                'pros' => ['36g, the lightest mouse in this guide by a wide margin', 'Switches rated to 100 million clicks, the highest here', '70 hours of wireless battery for an ultralight shell', 'Genuine FPS-focused design and shape'],
                'contras' => ['Ships with a note that iCUE software support is still coming', '33,000 DPI is far beyond anything usable', '8,000Hz polling depends on your CPU, per the listing', 'Lowest rating here at 4.2, from only 297 ratings, at the highest price'],
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
