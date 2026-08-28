<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class PowerBanksSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE POWER BANKS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM M4 6BD (MANCHESTER), BUSCA "power bank" FILTRADA A PARTIR DE £20.
        //
        // ═══ ACHADOS DA COLETA (O DIFERENCIAL DO ARTIGO) ═══
        // 1. O mAh IMPRESSO NAO E O mAh QUE CHEGA NO CELULAR. A CELULA DE LITIO E DE 3,7V E A SAIDA USB E 5V.
        //    ENTAO 20.000mAh x 3,7V = 74Wh DE ENERGIA ARMAZENADA. A 5V ISSO SERIAM 14.800mAh TEORICOS, E DEPOIS DAS PERDAS
        //    DE CONVERSAO (TIPICAMENTE 85-90%) CHEGAM ~12.500-13.300mAh. OU SEJA, ~62-67% DO NUMERO DA CAIXA.
        //    NENHUM DOS 10 ANUNCIOS PUBLICA Wh. TODOS PUBLICAM SO mAh.
        // 2. A CONTAGEM DE CARGAS E O TESTE DE HONESTIDADE, E FUNCIONA:
        //    ANKER ZOLO DIZ "iPhone 15 up to 4 times or Samsung S24 3.79 times" — 3,79 E NUMERO DE CONTA, NAO DE MARKETING.
        //    UGREEN DIZ "iPhone 15 up to 5.2 times", "Galaxy S23 Ultra up to 3.6 times", "MacBook Pro 16 up to 1.3 times".
        //    CHARMAST DIZ "up to 2 full charges" PARA 10.000mAh. INIU 45W DIZ "4 charges for phones" PARA 20.000mAh.
        //    TODAS ESSAS CAEM EM 65-70% DO mAh IMPRESSO — EXATAMENTE O QUE A FISICA PREVE.
        // 3. QUEM DA NUMERO REDONDO E GRANDE QUEBRA A ARITMETICA:
        //    VEGER 30.000mAh ALEGA "up to 8 full charges for most smartphones" E O PROPRIO ANUNCIO CITA UM CELULAR DE 3.500mAh.
        //    8 x 3.500 = 28.000mAh ENTREGUES DE UM PACK DE 30.000mAh = 93% DE EFICIENCIA. IMPOSSIVEL. O REAL E ~5 A 5,5.
        //    O 27.000mAh DE 4 CABOS ALEGA "6-7 full charges" PARA iPhone 15/16/17 (3.349mAh): 27.000 x 0,65 / 3.349 = 5,2. INFLADO ~25%.
        //    E ESSE MESMO ANUNCIO USA A PALAVRA "genuine 27000mAh" — MESMO TIQUE DO "REAL 90kpa" DAS SELADORAS A VACUO.
        // 4. LIMITE DE 100Wh DE COMPANHIA AEREA (PADRAO AMPLAMENTE USADO PARA BAGAGEM DE MAO):
        //    10.000mAh = 37Wh · 20.000mAh = 74Wh · 25.000mAh = 92,5Wh · 27.000mAh = 99,9Wh (NO LIMITE) ·
        //    30.000mAh = 111Wh — ACIMA DO LIMITE. A VEGER DE 30.000mAh NAO MENCIONA ISSO EM LUGAR NENHUM.
        //    SO A INIU 45W CITA VIAGEM AEREA ("AIRPLANE-APPROVED"). CONFERIR SEMPRE COM A COMPANHIA.
        // 5. POTENCIA DE SAIDA VARIA 11x: BELKIN 15W · VEGER 20W · INIU 22,5W · JIGA 22,5W · ANKER ZOLO 30W · INIU 45W ·
        //    UGREEN 140W · ANKER 165W. E O QUE DECIDE SE CARREGA NOTEBOOK OU SO CELULAR.
        //
        // ═══ CRITERIO DE CORTE ═══
        // TODOS OS 10 TEM 2.600+ AVALIACOES. EXCLUIDOS OS DE AMOSTRA FINA: B0GGZ447T2 (162), B0G1H1H619 (467),
        // B0FWC6MZ76 (765), B0FWR7Y3G6 (792), B0GSZ4BPZN (753), B0GSZ5M56R (898).
        //
        // ═══ VARIACOES DE PALAVRA-CHAVE TRABALHADAS NO TEXTO ═══
        // best power bank · best power bank on amazon · portable charger · power bank 20000mAh ·
        // best power bank uk · fast charging power bank · power bank for iphone · laptop power bank ·
        // power bank with built in cable · best power bank for travel
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-power-bank',                                          // SLUG DO ARTIGO (URL) = PALAVRA-CHAVE EM formato-url
            'title' => 'Best Power Bank 2026: 10 Ranked on Real Delivered Capacity', // TITULO / H1 — CONTEM A PALAVRA-CHAVE
            'meta_title' => 'Best Power Bank 2026: Top 10 Ranked',                // TITLE DA ABA/GOOGLE (37 CHARS)
            'meta_description' => 'We ranked the best power bank options on the capacity that actually reaches your phone, which is about 65 percent of the mAh figure printed on the box.', // META DESCRIPTION (~152 CHARS)
            'focus_keyword' => 'best power bank',                                 // PALAVRA-CHAVE PRINCIPAL — VIRA O ALT DO HERO
            'hero_image' => '',                                                   // SEM HERO MANUAL: A VIEW USA A FOTO DO PRODUTO #1 COMO IMAGEM SOCIAL
            'intro' => 'A 20,000mAh power bank does not put 20,000mAh into your phone. It puts in roughly 13,000, and the reason is physics rather than fraud. The lithium cells inside are rated at 3.7 volts, but USB delivers at 5 volts, so the stored energy has to be stepped up before it leaves the case. Twenty thousand milliamp hours at 3.7V is 74 watt hours of energy, which at 5V works out at 14,800mAh before you account for conversion losses of ten to fifteen percent. Every power bank on this page is affected identically and none of the ten publishes a watt hour figure, so the printed mAh is the only number you get. The useful part is that the charge counts in the bullet points give the game away. Anker quotes 3.79 charges of a Samsung S24, UGREEN quotes 5.2 charges of an iPhone 15, and both land at roughly 65 to 70 percent of their printed capacity, exactly where the arithmetic says they should. One brand in this guide claims eight full charges from 30,000mAh, which its own listing cannot support. So we ranked the best power bank options on delivered capacity, output wattage and whether the claims survive a calculator.', // INTRO OTIMIZADA
            'conclusion' => 'The best power bank for most people is a 20,000mAh unit from a brand with a large review sample, because that size delivers around 13,000mAh to your devices, which is three to four phone charges, and it stays comfortably under the watt hour limits that matter for air travel. Before you buy, do two quick checks. Multiply the mAh by 0.65 to get the capacity you will actually receive, then divide by your phone battery to see how many charges that really is. And if you fly, multiply the mAh by 3.7 and divide by 1,000 to get watt hours: 20,000mAh is 74Wh, 27,000mAh is 99.9Wh, and 30,000mAh is 111Wh, which sits above the 100Wh threshold most airlines apply to cabin baggage, so check with your carrier before packing one. After capacity, output wattage is the specification that separates these: 15W to 22.5W charges phones, 30W to 45W charges them quickly, and you need 100W or more if you want to charge a laptop. Treat any listing promising a round, generous number of full charges with suspicion, and trust the ones quoting awkward decimals.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                        // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 13:30:00',                              // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'INIU Power Bank 20000mAh, 22.5W PD3.0 QC4.0',                              // NOME
                'price' => '£22.41',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 32329,                                                            // Nº DE AVALIACOES (MAIOR AMOSTRA DA BUSCA INTEIRA)
                'image' => 'https://m.media-amazon.com/images/I/51zEUDiOyYL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'INIU 20000mAh power bank in black with three charging ports',          // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07YPS5JC5?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'With 32,329 ratings at 4.6 this is the most reviewed power bank on Amazon UK, at £22.41, with a three-year warranty and USB-C in and out.', // TEXTO CURTO DO CARD
                'body' => 'Nothing else in this category comes close on evidence. A sample of 32,329 ratings at 4.6 is more than double the next largest, built up over years rather than a launch push, and for a product whose failure mode is a battery that quietly loses half its capacity in eighteen months, that depth of feedback is the most valuable thing on the page.

The specification is well chosen for what most people actually need. Twenty thousand milliamp hours is 74 watt hours of stored energy, delivering somewhere around 13,000mAh to your devices, which is three to four full phone charges. The 22.5W output with PD3.0 and QC4.0 charges a modern phone to about 61 percent in half an hour, and there are three ports so you can share it. Crucially the USB-C port works as both input and output, which a surprising number of rivals still get wrong, and it will charge low-current devices like earbuds and a smartwatch that many power banks simply ignore.

The three-year INIU Care warranty is the longest in this guide and unusual at this price. Like every listing here it publishes no watt hour figure, and like every listing here the printed 20,000mAh is the cell rating rather than what reaches your phone. At £22.41 it is also the cheapest 20,000mAh unit from a brand with real evidence behind it.',
                'pros' => ['32,329 ratings at 4.6, by far the largest sample in the category', '£22.41, the cheapest well-evidenced 20,000mAh here', 'Three-year warranty, the longest in this guide', 'USB-C works as both input and output', 'Charges low-current devices like earbuds and watches'],
                'contras' => ['No watt hour figure published, like every rival here', '22.5W output is fine for phones but will not charge a laptop', 'No built-in cable, so you carry one', 'Charge count claims are given as percentages rather than a figure'],
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'Anker Zolo Power Bank 20,000mAh, 30W, Built-in USB-C Cable',               // NOME
                'price' => '£28.99',                                                                 // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 13574,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61QdifaoqpL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Anker Zolo 20000mAh power bank in black with built-in USB-C cable',    // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CZ9LH53B?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The most honest listing in the search: it quotes 3.79 charges of a Samsung S24, an awkward decimal that matches what the physics predicts almost exactly.', // TEXTO CURTO DO CARD
                'body' => 'Look at the first bullet point and you will find a number no marketing department would invent: 3.79 charges of a Samsung Galaxy S24. That decimal is the sound of someone actually dividing delivered capacity by battery size rather than rounding upwards, and it is why we trust this listing more than any other here. Run the same sum yourself and a 20,000mAh pack delivering around 65 percent of its rating gives you almost exactly that.

The hardware backs it up. Thirty watts of output charges an iPhone 15 to 57 percent in half an hour, 20W input means the bank itself refills quickly, and the built-in USB-C cable is rated for 10,000 bends so you stop losing cables. ActiveShield 2.0 monitors temperature three million times a day and the cells carry CB certification to international safety standards, which almost nothing else in this search claims.

At £28.99 it costs £6.58 more than the INIU at number one, and the honest comparison is that you are buying the built-in cable, the extra 7.5W of output and the certification rather than more capacity. Both are 20,000mAh and both will deliver roughly 13,000mAh. The 18-month warranty is shorter than the INIU three years, which is the one place Anker loses.',
                'pros' => ['Quotes 3.79 charges, a precise figure that matches the physics', '30W output charges an iPhone 15 to 57 percent in 30 minutes', 'Built-in USB-C cable rated for 10,000 bends', 'ActiveShield 2.0 temperature monitoring and CB-certified cells', '13,574 ratings at 4.5'],
                'contras' => ['18-month warranty against three years from INIU', '£6.58 more than the INIU for the same capacity', 'Built-in cable is only 5.98 inches long', 'No watt hour figure published'],
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'Charmast Power Bank 10000mAh with 4 Built-in Cables',                      // NOME
                'price' => '£16.14',                                                                 // PRECO NA COLETA (O MAIS BARATO DA LISTA)
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 15550,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71+jab6WlVL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Charmast 10000mAh slim power bank with four built-in charging cables', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09WHPDB6C?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Four cables built in, six outputs, and an honest claim of two full phone charges from 10,000mAh. At £16.14 with 15,550 ratings it is the best small power bank here.', // TEXTO CURTO DO CARD
                'body' => 'The four integrated cables are the whole argument and they are a better one than they sound. Micro USB, USB-C and a Lightning-style connector are built into the body, plus a USB-A lead, so the commonest failure of a power bank, which is having it with you and the right cable at home, simply cannot happen. Add two USB-A ports and a USB-C port and it drives six devices at once, which is more than most units three times its capacity.

The capacity claim is honest and worth noting because so few here are. Charmast says up to two full charges for an iPhone 11 through 14 or a Galaxy S23. Ten thousand milliamp hours is 37 watt hours, delivering roughly 6,500mAh, and a modern iPhone battery is a little over 3,200mAh. Two charges is exactly right, and a less scrupulous listing would have said three.

At 10,000mAh it is genuinely pocketable and comfortably under any airline watt hour threshold. The trade-offs are that you get half the capacity of the 20,000mAh units for £6.27 less, and the listing does not state an output wattage in its bullets, so treat this as a top-up bank for a day out rather than a fast charger. The LED percentage display and three-year warranty are welcome at £16.14.',
                'pros' => ['Four cables built in, so you can never forget one', 'Six outputs and three inputs for charging a whole family', 'Honest claim of two full phone charges from 10,000mAh', '£16.14 with 15,550 ratings at 4.5', 'Slim, pocketable and well under airline watt hour limits'],
                'contras' => ['Half the capacity of the 20,000mAh units for only £6.27 less', 'No output wattage stated in the bullets', 'Built-in cables cannot be replaced if one fails', 'Not a fast charger for modern flagship phones'],
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'INIU 45W Fast Charging Power Bank, 20000mAh',                              // NOME
                'price' => '£27.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 8563,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71vl4HvUaxL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'INIU 45W compact 20000mAh power bank with built-in braided cable',     // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DCZ82MGG?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only listing in the search that mentions air travel at all, and 30 percent smaller than a standard 20,000mAh unit, with 45W output and a nylon-braided built-in cable.', // TEXTO CURTO DO CARD
                'body' => 'Two things make this the travel pick. First, it is 30 percent smaller than a standard 20,000mAh pack, which INIU says makes it more compact than some 10,000mAh alternatives, and on a product you carry every day that matters more than another five watts. Second, and more usefully, it is the only listing among the ten we pulled that mentions aeroplanes at all, describing itself as airplane-approved.

That is worth explaining, because the rest of the category is silent on it. A 20,000mAh pack holds 74 watt hours, comfortably below the 100 watt hour threshold most airlines apply to cabin baggage. A 30,000mAh pack holds 111 watt hours and sits above it. INIU is the only brand here that seems to have noticed its customers fly, and while you should still confirm with your carrier, the fact it is mentioned is a small mark of a listing written by someone thinking about use rather than specifications.

Forty-five watts of PD output takes a phone to roughly 70 percent in 25 minutes and covers Samsung Super Fast Charging, and the claim of four phone charges from 20,000mAh is the arithmetically honest figure. The built-in cable is nylon braided and bi-directional. At 4.4 from 8,563 ratings it scores slightly below the cheaper INIU at number one, which is the main reason it is not higher.',
                'pros' => ['30 percent smaller than a standard 20,000mAh pack', 'Only listing here to mention air travel', '45W PD output, to 70 percent in 25 minutes', 'Bi-directional nylon-braided built-in cable', 'Three-year INIU Care warranty'],
                'contras' => ['4.4 rating, below the cheaper INIU at number one', '£5.58 more than the 22.5W INIU for the same capacity', 'Airplane-approved is a claim to verify with your airline', 'No watt hour figure published'],
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'UGREEN Nexode 140W 25000mAh Power Bank, 3-Port',                           // NOME
                'price' => '£49.99',                                                                 // PRECO NA COLETA
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 7488,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/514IrhlahlL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'UGREEN Nexode 140W 25000mAh power bank with digital display',          // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BJQ7F16T?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The laptop pick, with 140W output and precise charge counts: 5.2 iPhone 15 charges, 3.6 Galaxy S23 Ultra, 1.3 MacBook Pro 16. All three land where the physics says they should.', // TEXTO CURTO DO CARD
                'body' => 'If you want a power bank that charges a laptop rather than just topping up a phone, this is where the list actually starts. One hundred and forty watts over USB-C with PD 3.1 is enough to run a MacBook Pro 16 at close to mains speed, and the second port still delivers 65W, so a laptop and a phone can charge together without either dropping to a trickle.

UGREEN also passes the honesty test convincingly. It quotes 5.2 charges of an iPhone 15, 3.6 of a Galaxy S23 Ultra and 1.3 of a MacBook Pro 16. Those are calculated numbers with decimals, not round marketing figures, and running the sum on 25,000mAh at roughly 70 percent delivered capacity produces almost exactly 5.2 iPhone charges. When a brand publishes three separate figures that all reconcile, it has done the arithmetic.

Two practical points. At 25,000mAh it holds 92.5 watt hours, which is under the 100 watt hour airline threshold but not by much, so it is the largest pack here we would happily fly with. And at 513g it is heavy, though UGREEN is right that this is light for the class. The 4.3 rating is the joint lowest in this guide, which on 7,488 ratings is a real if modest signal.',
                'pros' => ['140W output, enough to charge a MacBook Pro 16 properly', 'Publishes three separate charge counts that all reconcile', '65W second port, so laptop and phone charge together', 'Recharges fully in about two hours with a 65W adapter', '92.5 watt hours, still under the usual airline threshold'],
                'contras' => ['4.3 rating, joint lowest in this guide', '513g is heavy to carry daily', '£49.99, more than double the INIU at number one', 'Overkill if you only ever charge a phone'],
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'Anker Power Bank 25,000mAh, 165W with Built-in Cables',                    // NOME
                'price' => '£69.99',                                                                 // PRECO NA COLETA (O MAIS CARO DA LISTA)
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 11494,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71jbS6q9P5L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Anker 25000mAh 165W power bank with dual built-in USB-C cables',       // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DCBB2YTR?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The most powerful unit here: three 100W USB-C ports, 165W total, two built-in cables including a retractable one, and 100W recharging. It is also £69.99.', // TEXTO CURTO DO CARD
                'body' => 'This is the power bank for someone who travels with a laptop, a tablet and a phone and does not want to think about any of them. Three USB-C ports each capable of 100W means you can run a MacBook and two other devices simultaneously without the shared-power throttling that spoils cheaper multi-port banks, and 165W total output is the highest in this guide by 25W.

The cable design is genuinely clever. One built-in USB-C cable extends to 2.3 feet and is rated for over 20,000 retractions, and the second doubles as a carrying strap, so the thing you use to charge is also the thing you use to hold it. With four devices connectable at once and 100W recharging that refills the bank itself quickly, it is the least fiddly large power bank here.

The cost is the price and the mass. At £69.99 it is £20 more than the UGREEN at number five for 25W more output, which is a poor rate of exchange unless you specifically need three 100W ports. It carries the same 92.5 watt hours as the UGREEN, so the same airline caveat applies. And with 11,494 ratings at 4.5 it is well evidenced, but Anker gives 18 months of warranty where INIU gives three years at a third of the price.',
                'pros' => ['Three 100W USB-C ports and 165W total output, the most here', 'Retractable built-in cable rated for 20,000 retractions', 'Second cable doubles as a carrying strap', '100W recharging refills the bank quickly', '11,494 ratings at 4.5'],
                'contras' => ['£69.99, the most expensive power bank in this guide', 'Only 25W more output than a rival costing £20 less', '18-month warranty', 'Heavy and bulky for everyday pocket use'],
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'JIGA Power Bank 27000mAh, 22.5W Fast Charging',                            // NOME
                'price' => '£24.99',                                                                 // PRECO NA COLETA
                'rating' => 4.2,                                                                     // NOTA
                'reviews_count' => 23973,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71pcQQQC9fL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'JIGA 27000mAh power bank in red with LED indicator and flashlight',    // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08LKDCFZN?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The second most reviewed power bank here with 23,973 ratings, and unusually conservative: it claims 3 to 5 phone charges from 27,000mAh when the sum allows about 5.', // TEXTO CURTO DO CARD
                'body' => 'With 23,973 ratings this has the second deepest evidence pool in the search, and the claim in its first bullet is the most conservative of any listing here: three to five iPhone top-ups, three to four for Samsung. Run the numbers and 27,000mAh delivering around 65 percent gives roughly 17,500mAh, which against a 3,349mAh iPhone battery is 5.2 charges. JIGA has quoted a range that starts well below what the pack can actually do, which in this category is remarkable restraint.

The practical package is sensible for the money: two inputs including USB-C, three outputs, a four-plus-one segment LED indicator that tells you the state of charge properly rather than with four vague dots, a built-in torch, and 22.5W Quick Charge 4.0 output. At £24.99 that is a lot of capacity per pound.

Two things hold it at seven. The 4.2 rating is the lowest in this guide, and from nearly 24,000 ratings that is a real signal about consistency rather than statistical noise. And at 27,000mAh it holds 99.9 watt hours, which is fractionally under the 100 watt hour threshold most airlines apply, so it is technically fine to fly with but leaves you no margin at all if a carrier measures it differently. If you fly often, the 20,000mAh units at 74 watt hours are the safer choice.',
                'pros' => ['23,973 ratings, the second largest sample in this guide', 'Conservative charge claim of 3 to 5, below what the pack can do', '£24.99 for 27,000mAh, the most capacity per pound here', 'Five-segment LED indicator and built-in torch', 'Two inputs including USB-C'],
                'contras' => ['4.2 rating, the lowest in this guide from a very large sample', '99.9 watt hours leaves no margin against the 100Wh airline threshold', '22.5W output will not charge a laptop', 'No warranty length stated'],
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'Belkin BoostCharge 20000mAh Power Bank, 3-Port',                           // NOME
                'price' => '£21.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 5513,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/51XecW+EnKL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Belkin BoostCharge 20000mAh power bank in blue with three ports',      // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09NTNMXL8?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A recognised brand at £21.99 with a two-year warranty, expressing its capacity as 78 hours of extra battery life. Its 15W maximum output is the lowest in this guide.', // TEXTO CURTO DO CARD
                'body' => 'Belkin is a genuine accessory brand with retail presence and proper support, and at £21.99 with a two-year warranty this is the cheapest way to get that reassurance in a 20,000mAh pack. Three ports, one USB-C and two USB-A, cover a phone, a tablet and a pair of earbuds, a short cable is included, and it arrives pre-charged so it works out of the box.

It also describes its capacity differently from everything else here, quoting 78 hours of additional smartphone battery life rather than a number of charges. That is a softer unit and harder to check, since it depends entirely on what the phone is doing, but it is at least not an inflated charge count.

The problem is output. Fifteen watts maximum is the lowest figure in this guide by 7.5W, and less than half the Anker Zolo at number two which costs £7 more. In practice that means a modern phone charges at roughly conventional speed rather than fast, so a top-up that takes half an hour on the Anker will take appreciably longer here. For overnight use or a slow trickle in a bag it is irrelevant; for a quick boost before going out it is the whole difference. Buy this for the brand and the warranty, not the speed.',
                'pros' => ['Recognised brand with a two-year warranty', '£21.99 for 20,000mAh, competitively priced', 'Three ports and a cable included, pre-charged', 'Capacity quoted as hours rather than an inflated charge count', '5,513 ratings at 4.4'],
                'contras' => ['15W maximum output, the lowest in this guide', 'Less than half the output of the Anker Zolo for £7 less', '78 hours of battery life is a vague, uncheckable unit', 'No built-in cable'],
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'Power Bank 27000mAh with 4 Built-in Cables, 22.5W',                        // NOME
                'price' => '£27.99',                                                                 // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 5624,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/81RYWxudkvL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => '27000mAh power bank with four built-in cables and silicone lanyard',   // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GLNBPNRB?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Four built-in cables and 27,000mAh in a passport-sized body. It calls itself a genuine 27000mAh and claims 6 to 7 iPhone charges, which the arithmetic puts at about 5.2.', // TEXTO CURTO DO CARD
                'body' => 'On format this is appealing. Four integrated cables covering iPhone, Micro USB, USB-C and USB-A, plus two USB-A ports and a USB-C port for six devices at once, in a body 2.3cm thick and 11.6cm long that the listing compares to a passport. Add a silicone lanyard, 22.5W PD3.0 and QC4.0 charging, a stated six-layer safety system and a three-year warranty, and at £27.99 with 5,624 ratings at 4.5 it looks like strong value.

Then you check the claim. The second bullet promises six to seven full charges for an iPhone 15, 16 or 17. Those phones carry batteries of roughly 3,350 to 3,600mAh. A 27,000mAh pack delivers around 17,500mAh once the 3.7 volt cells have been stepped up to 5 volts and conversion losses taken, so the honest figure is a little over five charges. Six to seven overstates it by roughly a quarter, and the JIGA at number seven, with the same capacity and a much larger review sample, quotes three to five.

The other tell is a single word. The bullet describes it as a genuine 27000mAh power bank. Manufacturers reach for words like genuine and real when a category has a credibility problem, and inserting one here does not make the charge count add up. The hardware looks good; the number does not.',
                'pros' => ['Four built-in cables plus three ports, six devices at once', 'Passport-sized at 2.3cm thick despite 27,000mAh', '22.5W PD3.0 and QC4.0 charging', 'Three-year warranty and silicone lanyard included', '5,624 ratings at 4.5'],
                'contras' => ['Claims 6 to 7 iPhone charges when the arithmetic gives about 5.2', 'Uses the word genuine, a tell rather than a specification', '99.9 watt hours leaves no margin against airline limits', 'Built-in cables cannot be replaced individually'],
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'VEGER Power Bank 30000mAh, 20W PD Fast Charging',                          // NOME
                'price' => '£26.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 2601,                                                             // Nº DE AVALIACOES (AMOSTRA MAIS FINA — SINALIZADO NO TEXTO)
                'image' => 'https://m.media-amazon.com/images/I/61hznibJlrL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'VEGER 30000mAh power bank in black with LED digital display',          // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CB497HTR?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The largest capacity here at 30,000mAh, claiming up to 8 full phone charges. Its own listing gives the numbers that make that impossible, and 111 watt hours is over the usual airline limit.', // TEXTO CURTO DO CARD
                'body' => 'This listing supplies everything needed to check its own headline claim, which is unusual and not to its advantage. The first bullet promises up to eight full charges for most smartphones. The third bullet describes charging a 3,500mAh phone. Eight charges of a 3,500mAh battery is 28,000mAh delivered, from a pack rated at 30,000mAh, which would require 93 percent efficiency from a 3.7 volt cell feeding a 5 volt output. The real figure, once the voltage step-up and conversion losses are accounted for, is closer to five, maybe five and a half.

The second issue matters more if you travel. Thirty thousand milliamp hours at 3.7 volts is 111 watt hours, which sits above the 100 watt hour threshold most airlines apply to power banks in cabin baggage. Nothing on this listing mentions that, and a device bought specifically for long journeys is exactly the one you might not be allowed to take on the plane. Check with your carrier before flying with any pack this size.

None of which makes the hardware bad. Four outputs and two inputs, 20W PD and QC 3.0, a proper LED percentage display, 617g for the capacity, and 4.4 from 2,601 ratings. As a bank that lives in a car or a rucksack for camping it is decent value at £26.99. It is the claims wrapped around it, and the watt hours nobody mentions, that put it last.',
                'pros' => ['30,000mAh, the largest capacity in this guide', 'Four outputs and two inputs for charging four devices at once', 'LED digital display showing exact remaining percentage', '£26.99, cheap for the capacity', 'Good choice for a car, camping or off-grid use'],
                'contras' => ['Claims 8 full charges when its own figures allow about 5', '111 watt hours, above the 100Wh threshold most airlines apply', 'Nothing on the listing mentions the air travel limit', '2,601 ratings, the thinnest sample in this guide'],
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
