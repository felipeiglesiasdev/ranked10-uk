<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class MassageGunsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE PISTOLAS DE MASSAGEM DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM M4 6BD (MANCHESTER), BUSCA "massage gun" FILTRADA A PARTIR DE £30.
        //
        // ═══ ACHADOS DA COLETA (O DIFERENCIAL DO ARTIGO) ═══
        // 1. AMPLITUDE E STALL FORCE SAO OS DOIS NUMEROS QUE DEFINEM SE UMA PISTOLA ALCANCA TECIDO PROFUNDO, E QUASE NINGUEM PUBLICA.
        //    SO A BOB AND BRAD PUBLICA OS DOIS EM TODA A LINHA:
        //    Q2 MINI (£59,91) 7mm / 16kg · C2 (£89,99) 10mm / 45+ lbs · D6 PRO (£199,99) 16mm / 85 lbs.
        //    A MEBAK 3 (£99,99) DIZ "penetrate muscles up to 12mm deep" MAS NAO DA STALL FORCE.
        //    NAO PUBLICAM NENHUM DOS DOIS: RENPHO (£79,99, 29.152 AVALIACOES), WATTNE W2 (£49,99), ALDOM (£39,99),
        //    AERLANG (£29,99), THERAGUN RELIEF (£98,99) E THERAGUN PRO PLUS (£499,00).
        // 2. O THERAGUN PRO PLUS CUSTA £499,00, NAO PUBLICA AMPLITUDE NEM STALL FORCE, E VENDE "breathwork", "mindfulness" E
        //    "TheraMind sound therapy". NOTA 3.6 COM 20 AVALIACOES — A PIOR NOTA E A AMOSTRA MAIS FINA DA LISTA, NO MAIOR PRECO.
        //    E A "cold therapy" ANUNCIADA NO PRIMEIRO BULLET VEM COM "(sold separately)".
        // 3. CONTAGEM DE VELOCIDADES E O CHAMARIZ QUE SUBSTITUI A AMPLITUDE: ALDOM 30 VELOCIDADES · AERLANG 20 · WATTNE W2 20 ·
        //    E A BUSCA AINDA DEVOLVE UM MODELO ANUNCIANDO "99 Speed" (B0FNVPYX4F). A D6 PRO, DESENHADA POR FISIOTERAPEUTAS,
        //    NEM LIDERA COM VELOCIDADE. NUMERO DE PRESETS NAO MOVE O CABECOTE UM MILIMETRO A MAIS.
        // 4. AMPLITUDE VARIA MAIS DE 2x ONDE E DECLARADA (7mm A 16mm) E A BOB AND BRAD E A UNICA MARCA CUJO PRECO ACOMPANHA
        //    A AMPLITUDE DE FORMA HONESTA: £59,91 = 7mm, £89,99 = 10mm, £199,99 = 16mm.
        // 5. O THERAGUN RELIEF APARECE EM TRES ASINS: B0FJMP7142 £99,00 (70 AVALIACOES), B0CVSDR3XS £98,99 (298) E
        //    B0CXF9KWB5 £98,99 (298). VARIANTES DE COR COM POOLS DE AVALIACAO DIFERENTES.
        // 6. RUIDO E O UNICO NUMERO QUE OS BARATOS PUBLICAM COM HONESTIDADE: WATTNE W2 30-50 dB · MEBAK 3 35-50 dB ·
        //    BOB AND BRAD Q2 MINI ABAIXO DE 40 dB.
        //
        // ═══ CRITERIO DE CORTE ═══
        // TODOS OS 10 TEM 290+ AVALIACOES, MENOS O THERAGUN PRO PLUS (20), QUE ENTROU POR SER O TOPO DE PRECO DA CATEGORIA E
        // ESTA SINALIZADO NO TEXTO. EXCLUIDOS: B0G82HR62V (33), B0FNVPYX4F (18), B0FNX6PMRR (14), B0FDX58V3M (70), B0FPQSKGHG (31).
        //
        // ═══ VARIACOES DE PALAVRA-CHAVE TRABALHADAS NO TEXTO ═══
        // best massage gun · best massage gun on amazon · percussion massager · deep tissue massage gun ·
        // massage gun uk · best budget massage gun · mini massage gun · muscle massager gun ·
        // massage gun amplitude · best massage gun for athletes
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'fitness',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Fitness',                    // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best fitness gear and activewear available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-massage-gun',                                         // SLUG DO ARTIGO (URL) = PALAVRA-CHAVE EM formato-url
            'title' => 'Best Massage Gun 2026: 10 Ranked on Amplitude, Not Speeds', // TITULO / H1 — CONTEM A PALAVRA-CHAVE
            'meta_title' => 'Best Massage Gun 2026: Top 10 Ranked',               // TITLE DA ABA/GOOGLE (38 CHARS)
            'meta_description' => 'We ranked the best massage gun options on amplitude and stall force. Only one brand publishes both, and the £499 flagship publishes neither of them.', // META DESCRIPTION (~148 CHARS)
            'focus_keyword' => 'best massage gun',                                // PALAVRA-CHAVE PRINCIPAL — VIRA O ALT DO HERO
            'hero_image' => '',                                                   // SEM HERO MANUAL: A VIEW USA A FOTO DO PRODUTO #1 COMO IMAGEM SOCIAL
            'intro' => 'Two numbers decide whether a massage gun reaches deep tissue or just buzzes on the surface. Amplitude is how far the head travels on each stroke, and stall force is how hard you can press before the motor gives up. Everything else on these listings is decoration. So it is worth knowing that across the ten most reviewed percussion massagers on Amazon UK, exactly one brand publishes both figures across its range, and the £499 flagship in this guide publishes neither. That Theragun sells itself on breathwork, mindfulness and sound therapy instead, and holds the lowest rating here from twenty ratings. Meanwhile the cheap end has found a substitute number to shout about: one massager advertises 30 speed settings, another 20, and the search returns one claiming 99. A speed preset does not move the head a single millimetre further. So this ranking of the best massage gun options starts with amplitude and stall force where they are published, and treats a missing figure as information in itself.', // INTRO OTIMIZADA
            'conclusion' => 'The best massage gun for most people sits between 10mm and 12mm of amplitude, because that is enough to work through a tight quad or a stiff back without being so aggressive that it is unpleasant on a shoulder. Below about 7mm you are buying a vibrating massager rather than a percussion one, which is fine for gentle relief and useless for a knotted calf. Above 14mm you are into professional territory and paying for it. Stall force matters just as much: if the motor bogs down the moment you lean in, the amplitude on the box is theoretical, and anything around 45lbs handles normal home use. Ignore the speed count entirely, since a gun with 30 presets and 8mm of travel will always lose to one with 5 presets and 12mm. Above all, treat a missing amplitude figure as a decision the seller made. Brands that build a genuinely deep-reaching massager put the millimetres in the bullet points, and brands that do not talk about heat, colours and the number of heads in the case.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                        // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 11:00:00',                              // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'Bob and Brad C2 Massage Gun Deep Tissue',                                  // NOME
                'price' => '£89.99',                                                                 // PRECO NA COLETA
                'rating' => 4.7,                                                                     // NOTA (MAIOR DA LISTA)
                'reviews_count' => 10874,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/711wc7K7QML._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Bob and Brad C2 deep tissue percussion massage gun in black',          // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08CKWVYMF?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The sweet spot of the guide: 10mm amplitude and over 45lbs of stall force, both published, at 4.7 from 10,874 ratings for £89.99.', // TEXTO CURTO DO CARD
                'body' => 'This is the massage gun to buy if you want one and do not want to think about it further. The second bullet gives you both numbers that matter, 10mm of amplitude and over 45 pounds of stall force, alongside five speeds from 2,000 to 3,200 RPM. Ten millimetres is genuinely percussive rather than vibratory, and 45lbs means it keeps working when you lean into a tight hamstring instead of stalling and whining.

It was designed with Bob and Brad, two American physiotherapists with a very large following, and the attachment set reflects that rather than padding the box: five silicone heads chosen for specific jobs rather than fifteen shapes nobody uses. The ABS body with a silicone grip damps the vibration that travels back into your hand, which is the thing that makes cheap guns tiring to hold. A ten-minute auto shut-off stops overuse.

At 4.7 from 10,874 ratings it holds the joint highest score in this guide from a large sample, and it costs £89.99. That is £110 less than the D6 Pro at number three and £409 less than the Theragun at the bottom, and unlike the Theragun you know exactly what you are getting. The only real complaint is weight: at 1.3kg it is the heaviest gun here, so overhead work on your own shoulders is tiring.',
                'pros' => ['10mm amplitude and 45+ lbs stall force, both published', '4.7 from 10,874 ratings, joint highest here', 'Five speeds from 2,000 to 3,200 RPM', 'Silicone grip damps vibration back into the hand', 'Designed with practising physiotherapists'],
                'contras' => ['1.3kg, the heaviest gun in this guide', 'Fast charger not included', 'Only five attachments where budget rivals offer eight or ten', 'No heat function at this price'],
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'Bob and Brad Q2 Mini Massage Gun',                                         // NOME
                'price' => '£59.91',                                                                 // PRECO NA COLETA
                'rating' => 4.7,                                                                     // NOTA
                'reviews_count' => 14363,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71DLDHnVsWL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Bob and Brad Q2 Mini pocket-sized massage gun in black',               // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08M8YSFC7?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Pocket-sized at 430g, and honest about it: 7mm amplitude with 16kg of stall force, both stated. The best massage gun here for a gym bag.', // TEXTO CURTO DO CARD
                'body' => 'The Q2 Mini weighs 430 grams and is roughly the footprint of a phone, which changes what a massage gun is for. Instead of a device that lives in a cupboard and comes out after leg day, this one lives in a gym bag or a desk drawer and gets used. Under 40 decibels means you can run it in an open-plan office without anyone looking up.

Crucially, Bob and Brad does not pretend the compromise away. The first bullet gives the amplitude as 7mm and the third gives the stall force as 16kg, roughly 35 pounds, with speeds to 3,000 RPM. Seven millimetres is at the lower end of what counts as percussion, so this is for surface tension, forearms, calves and neck rather than driving through a thick glute. Knowing that before you buy is worth more than a bigger number you cannot verify.

For the money it is exceptionally well judged: a 2500mAh battery charging in 1.5 hours over 15W PD, five attachments, a travel case, and 4.7 from 14,363 ratings. If your use case is genuinely deep work on large muscles, spend the extra £30 on the C2 above. If it is portability and daily use, nothing else here comes close.',
                'pros' => ['430g and phone-sized, so it actually gets carried', '7mm amplitude and 16kg stall force, both stated openly', 'Under 40 dB, quiet enough for an office', '4.7 from 14,363 ratings', 'Charges in 1.5 hours with 15W PD'],
                'contras' => ['7mm amplitude is shallow for large muscle groups', 'Single-button control with no screen', 'Small head choice compared with budget rivals', 'Not the gun for driving through thick glutes or quads'],
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'Bob and Brad D6 Pro Massage Gun, 16mm Amplitude',                          // NOME
                'price' => '£199.99',                                                                // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 1328,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/718yN1ehCyL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Bob and Brad D6 Pro massage gun with adjustable arm in black',         // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BG56G526?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only genuinely professional specification in this guide: 16mm amplitude and 85lbs of stall force from a 180W motor, with both numbers in the bullet points.', // TEXTO CURTO DO CARD
                'body' => 'Sixteen millimetres is the figure that separates a professional percussion massager from a consumer one, and this is the only gun in the search that both offers it and says so. Paired with 85 pounds of stall force from a 180W brushless motor, it will keep driving at full travel while you put real bodyweight through it, which is exactly what a shallow gun cannot do no matter how many speed settings it has.

The physical design earns its keep too. The parallelogram body gives several grip positions and the arm adjusts through 90 degrees, which is what lets you reach your own upper back without contorting your wrist. Seven attachments cover flat-head work on IT bands, a bullet for calves and an air-cushion head for gentler areas. A 2500mAh battery with 20W PD charging keeps it going.

Two things to weigh. At £199.99 it is the second most expensive gun here, so it only makes sense if you train hard enough to need 16mm, and most people genuinely do not: the 10mm C2 at number one handles ordinary recovery for £110 less. And 1,328 ratings is a modest sample next to the four- and five-figure counts above it. Put it against the £499 Theragun, though, and the comparison is stark, because that machine publishes no amplitude at all.',
                'pros' => ['16mm amplitude, the deepest in this guide and clearly stated', '85 lbs stall force from a 180W brushless motor', '90 degree adjustable arm for reaching your own back', 'Seven purpose-chosen attachments', 'Publishes every number the category usually hides'],
                'contras' => ['£199.99, more than double the C2 for most users', '1,328 ratings, a modest sample here', '1.27kg is heavy for extended one-handed use', '16mm is more than most non-athletes need'],
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'Mebak 3 Massage Gun Deep Tissue Percussion Massager',                      // NOME
                'price' => '£99.99',                                                                 // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 18215,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71XA-HRxOTL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Mebak 3 percussion massage gun in grey with metal housing',            // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B083BY3B2T?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'One of the few non-Bob-and-Brad guns to quote a depth figure, at 12mm, with 18,215 ratings behind it and a genuinely light 762g metal body.', // TEXTO CURTO DO CARD
                'body' => 'The Mebak 3 is the best of the guns that sit outside the two brands defining the ends of this guide. The first bullet states that it penetrates muscles up to 12mm deep, which puts it between the C2 and the D6 Pro on the one measurement that matters, and it does so with a 60W brushless motor running 640 to 3,200 RPM.

The build is a real strength. The housing is metal rather than plastic, yet it weighs 762 grams, lighter than the 1.3kg C2 and close to half the D6 Pro. Noise is quoted at 35 to 50 decibels, among the quietest here, and there is an LED pressure sensor that shows how hard you are pressing, which is a more useful feedback loop than another speed preset. The 2600mAh battery gives up to three hours and seven heads come in the case.

What it does not give you is stall force, and that is the gap. Twelve millimetres of travel is only useful if the motor sustains it under load, and without a stall figure there is no way to know whether it holds up when you press. With 18,215 ratings at 4.5 the collective verdict is positive, so this is a reasonable bet rather than a leap, but it is why the C2 with both numbers published sits above it at £10 less.',
                'pros' => ['States a 12mm depth figure, rare outside Bob and Brad', '18,215 ratings at 4.5, one of the largest samples here', 'Metal housing at only 762g', '35 to 50 dB, among the quietest in this guide', 'LED pressure sensor shows how hard you are pressing'],
                'contras' => ['No stall force published, so load performance is unknown', '£10 more than the better-specified C2', 'Seven heads is more than most people will use', 'Quotes depth rather than amplitude, which are not identical terms'],
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'RENPHO Massage Gun Deep Tissue, 5 Speeds and 5 Heads',                     // NOME
                'price' => '£79.99',                                                                 // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 29152,                                                            // Nº DE AVALIACOES (MAIOR AMOSTRA DA BUSCA INTEIRA)
                'image' => 'https://m.media-amazon.com/images/I/71b-JE4NRfL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'RENPHO deep tissue percussion massage gun in black with travel case',  // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B085NTR26K?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The most reviewed massage gun on Amazon UK with 29,152 ratings, in a metal body with a brushless motor. It publishes neither amplitude nor stall force.', // TEXTO CURTO DO CARD
                'body' => 'Nothing in this category has more feedback behind it. A sample of 29,152 ratings at 4.5 is more than double the next largest, spread over years of sale, and that alone tells you the thing does not fall apart or disappoint most buyers. The metal housing and high-torque brushless motor are the right components, USB-C charging means you can run it off a power bank, and at 1.12kg with a travel case it is a normal, sensible massage gun.

The problem is what you cannot learn from the page. Five speeds, five heads, ergonomic handle, ten-minute auto shut-off, quiet operation. Not one of those is amplitude and not one is stall force. The listing talks about high penetration without quantifying it, so there is no way to know whether this reaches 12mm or 6mm, and the difference between those two is the difference between a recovery tool and a novelty.

That is why the most-bought gun here sits at five rather than one. It is very probably fine, the evidence says most people are happy, and at £79.99 it is fairly priced. But the C2 at number one costs £10 more, holds a higher rating, and tells you it delivers 10mm and 45lbs. When one brand publishes the numbers and another does not, the choice is easy.',
                'pros' => ['29,152 ratings at 4.5, by far the largest sample in the category', 'Metal housing with a high-torque brushless motor', 'USB-C charging, works off a power bank', 'Ten-minute auto shut-off and travel case included', 'Well established over several years of sale'],
                'contras' => ['No amplitude published anywhere on the listing', 'No stall force published either', 'Talks about high penetration without a figure', 'Charging adapter not included'],
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'Wattne W2 Muscle Massage Gun, 20 Speeds and 10 Heads',                     // NOME
                'price' => '£49.99',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 18523,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71oyeFli04L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Wattne W2 handheld percussion massage gun with ten attachment heads',  // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B082Y114TB?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The best value of the budget guns at £49.99 with 18,523 ratings, quiet at 30 to 50 dB and light at 940g. Twenty speeds, and no amplitude figure.', // TEXTO CURTO DO CARD
                'body' => 'At £49.99 with 18,523 ratings at 4.6 this is where the budget end of the category gets serious. The brushless motor delivers 1,200 to 3,300 percussions per minute, the quoted noise of 30 to 50 decibels is the lowest range published by anything in this guide, and at 940 grams it is lighter than the C2 by a third. A 2600mAh battery is claimed to run three to eight hours depending on intensity.

Ten attachment heads and twenty speed levels is where the marketing takes over from the engineering. Nobody needs twenty speeds; most people find one setting they like and never move off it. And once again the number that would tell you whether this reaches deep tissue is absent, so the 3,300 percussions per minute could be moving the head six millimetres or twelve and the listing gives you no way to tell.

Taken as what it plainly is, a light, quiet, well-reviewed massager for £49.99, it is a good buy and comfortably better value than the RENPHO above at £30 less. Just calibrate your expectations: the guns that publish 10mm and above cost £89.99 and up, and the ones that publish nothing are usually not withholding good news.',
                'pros' => ['£49.99 with 18,523 ratings at 4.6', '30 to 50 dB, the quietest range published here', '940g, lighter than most full-size guns', 'Brushless motor at 1,200 to 3,300 percussions per minute', 'Ten heads and a claimed three to eight hour battery'],
                'contras' => ['No amplitude or stall force published', 'Twenty speed levels is marketing rather than useful', 'Ten heads means most stay in the case', 'Battery claim spans three to eight hours, a very wide range'],
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'ALDOM Massage Gun Deep Tissue, 30 Speeds',                                 // NOME
                'price' => '£39.99',                                                                 // PRECO NA COLETA
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 10589,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71-LOOM5xDL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'ALDOM massage gun with LCD touch screen and eight massage heads',      // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09RZXWPJQ?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Thirty speed settings and eight heads for £39.99, with an LCD touch screen. The thirty speeds are the clearest example in this guide of a number standing in for the ones that matter.', // TEXTO CURTO DO CARD
                'body' => 'This is the listing that makes the speed-count problem obvious. Thirty massage levels, running 1,800 to 4,800 strokes per minute, on a £39.99 massager. Thirty settings across that range means each step up is about 100 strokes per minute, a difference no human hand can feel. It is a number chosen because it is bigger than five, not because thirty distinct settings are useful, and the search returns another gun advertising 99.

What is genuinely good here is the value proposition around it. A 24V brushless motor, a 2600mAh battery claimed to last 30 days at 15 minutes a day, eight heads and an LCD touch screen, all for £39.99 with 10,589 ratings behind it. As a first massage gun for someone who is not sure they will use one, that is a sensible amount of money to risk.

Amplitude and stall force are, predictably, absent. At 4.3 it also holds the lowest rating of the well-reviewed guns in this guide, and 4,800 strokes per minute at the top setting is a very high figure that usually indicates a short stroke, since motors trade travel for frequency. Treat it as a capable surface-level massager and it will not disappoint you.',
                'pros' => ['£39.99 with 10,589 ratings behind it', '24V brushless motor and 2600mAh battery', 'Eight heads and an LCD touch screen', 'Claimed 30 days of use per charge at 15 minutes a day', 'Good entry point if you are unsure about percussion therapy'],
                'contras' => ['Thirty speed settings is a meaningless distinction in practice', 'No amplitude or stall force published', '4.3, the lowest rating among the well-reviewed guns here', '4,800 strokes per minute usually implies a short stroke'],
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'AERLANG Massage Gun with Heat, 20 Speeds',                                 // NOME
                'price' => '£29.99',                                                                 // PRECO NA COLETA (O MAIS BARATO DA LISTA)
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 19099,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61l7Q6+7NrL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'AERLANG massage gun with heated head and LCD touch screen',            // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D77QGG74?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest gun here at £29.99 with 19,099 ratings, and the only one that publishes its heat levels in degrees rather than as vague warmth.', // TEXTO CURTO DO CARD
                'body' => 'Thirty pounds for a percussion massager with 19,099 ratings at 4.4 is the definition of low risk. Six heads, twenty speed levels, USB-C charging, an LCD touch screen and a carrying case, at a price where being disappointed costs you less than a takeaway.

The heat function is the reason to pick this over the ALDOM, and to AERLANG credit it is specified properly. Three levels shown by colour, at approximately 113, 122 and 131 degrees Fahrenheit, which is roughly 45, 50 and 55 Celsius. Most heated massagers here just say heat. Warmth genuinely helps on a cold stiff back before the percussion does anything, so on a £29.99 device it is a real feature rather than a gimmick.

The rest follows the pattern of the budget end. No amplitude, no stall force, twenty speeds nobody needs, and a first bullet devoted to telling you to charge it for eight hours before first use. At two pounds in weight with a ten-minute auto cut-off it is a perfectly reasonable thing to keep in a drawer. Just do not expect it to work through a deep knot the way the 10mm and 16mm guns above will.',
                'pros' => ['£29.99, the cheapest gun in this guide', '19,099 ratings at 4.4', 'Heat levels published in actual degrees, not just as warm', 'Six heads, USB-C charging and an LCD screen', 'Ten-minute intelligent cut-off'],
                'contras' => ['No amplitude or stall force published', 'Twenty speed levels adds nothing useful', 'Needs an eight-hour first charge, per its own first bullet', 'Surface-level relief rather than deep tissue work'],
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'Therabody Theragun Relief Handheld Percussion Massage Gun',                // NOME
                'price' => '£98.99',                                                                 // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 298,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/51JnlnP6ovL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Therabody Theragun Relief massage gun with triangle handle in sand',   // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CVSDR3XS?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The entry Theragun at £98.99, with the patented triangle handle and three speeds. Like every Therabody listing here, it publishes no amplitude and no stall force.', // TEXTO CURTO DO CARD
                'body' => 'The triangle handle is the genuine Theragun innovation and it is not marketing. Three grip points mean you can reach your own upper back, shoulders and the backs of your legs without twisting a wrist into an awkward angle, and anyone who has fought with a conventional pistol grip while trying to reach a trapezius will feel the difference immediately.

Beyond that, this listing asks you to buy on brand. Three speeds, three attachments, LED indicators, whisper quiet. There is no amplitude figure, no stall force figure and no motor specification anywhere on the page. Therabody built its reputation on 16mm amplitude in its professional range, so the absence here is conspicuous: the Relief is the entry model, and the number is not mentioned.

At £98.99 it costs £9 more than the Bob and Brad C2, which publishes 10mm and 45lbs and holds 4.7 from 10,874 ratings against 4.5 from 298 here. Note also that this exact model appears under three ASINs, at £99.00 with 70 ratings and twice at £98.99 with 298, so check which colour variant you are looking at before ordering. Buy it for the handle geometry, which is real, not for a specification you cannot see.',
                'pros' => ['Patented triangle handle genuinely helps you reach your own back', 'Light and simple with one-button operation', 'Quiet in use with three clear speed settings', 'Well-made attachments for sensitive areas', 'Strong brand support and app ecosystem'],
                'contras' => ['No amplitude or stall force published anywhere', 'Only three speeds and three attachments at £98.99', '298 ratings, a thin sample next to its rivals', 'Sold under three ASINs with different review pools'],
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'Therabody Theragun PRO Plus 6-in-1 Massage Gun',                           // NOME
                'price' => '£499.00',                                                                // PRECO NA COLETA (O MAIS CARO DA LISTA)
                'rating' => 3.6,                                                                     // NOTA (MENOR DA LISTA)
                'reviews_count' => 20,                                                               // Nº DE AVALIACOES (AMOSTRA MAIS FINA — SINALIZADO NO TEXTO)
                'image' => 'https://m.media-amazon.com/images/I/71i8aCXBnfL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Therabody Theragun PRO Plus six-in-one percussion massage gun',        // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CH1PNSF1?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'At £499.00 this is five times the price of the best gun in this guide, publishes neither amplitude nor stall force, and rates 3.6 from 20 ratings.', // TEXTO CURTO DO CARD
                'body' => 'The PRO Plus is Therabody flagship and the most expensive item in this guide by £299. It bundles six therapies into one device: percussion, vibration, heat, cold, breathwork and guided routines through the app, with an OLED screen and five attachments. If you want one object on the shelf that does everything, this is the pitch.

Two things make it hard to recommend. The first is that across five bullet points, on a £499 device, there is no amplitude figure and no stall force figure. Therabody knows perfectly well that 16mm is the number its professional range is famous for, and it is not here. The features that are described are breathwork routines, TheraMind sound therapy and visualisations, which are app content rather than mechanical specification. The Bob and Brad D6 Pro at number three publishes 16mm and 85lbs for £199.99, which is £299 less.

The second is the evidence. It holds 3.6 from 20 ratings, the lowest score and the thinnest sample anywhere in this guide, at the highest price. Twenty people is not enough to condemn a product, but it is nowhere near enough to justify £499. One detail worth catching before you order: the cold therapy advertised in the very first bullet carries the words sold separately.',
                'pros' => ['Six therapies in one device including heat and guided breathwork', 'OLED screen with five preset routines', 'Patented triangle handle for awkward reaches', 'Five well-designed attachments', 'Full Therabody app ecosystem'],
                'contras' => ['£499.00, five times the price of the best-specified gun here', 'No amplitude or stall force published at any price', '3.6 from 20 ratings, the worst score and thinnest sample here', 'The advertised cold therapy is sold separately'],
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
