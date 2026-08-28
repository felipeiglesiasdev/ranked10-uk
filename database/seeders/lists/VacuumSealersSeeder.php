<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class VacuumSealersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE SELADORAS A VACUO DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM M4 6BD (MANCHESTER), BUSCA "vacuum sealer" FILTRADA A PARTIR DE £25.
        //
        // ═══ ACHADOS DA COLETA (O DIFERENCIAL DO ARTIGO) ═══
        // 1. AS DUAS MARCAS DOMINANTES MEDEM COISAS DIFERENTES E NAO HA CONVERSAO ENTRE ELAS:
        //    MESLIESE ANUNCIA kPa (PROFUNDIDADE DO VACUO): 85, 90 E 95.
        //    BONSENKITCHEN ANUNCIA L/min (VAZAO DA BOMBA): 8 E 15.
        //    UM COMPRADOR NAO CONSEGUE COMPARAR "95kPa" COM "15 L/min" DE JEITO NENHUM. SO A MESLIESE B0CGRM161Z DA OS DOIS
        //    (95kPa E 20 L/min) E A FRESKO NAO DA NENHUM DOS DOIS.
        // 2. O TETO FISICO: A PRESSAO ATMOSFERICA AO NIVEL DO MAR E ~101,3 kPa. ENTAO "95kPa" ALEGA 94% DE UM VACUO PERFEITO
        //    NUM SACO PLASTICO COM BOMBA DE DIAFRAGMA DOMESTICA. E NAO EXISTE NORMA QUE DIGA COMO MEDIR — CADA MARCA MEDE COMO QUER.
        // 3. A MESLIESE SE CONTRADIZ SOZINHA E O PRECO CORRE AO CONTRARIO DO NUMERO:
        //    B0BXSKHL8D £84,93 (7.514 AVALIACOES) ALEGA 90kPa/120W · B0CGRM161Z £84,99 (2.036) ALEGA 95kPa/140W ·
        //    B0GR4G9PBD £99,99 (95) ALEGA 85kPa/120W. A MAIS CARA ALEGA A MENOR SUCCAO.
        //    E A DE £84,93 ESCREVE "TESTED 90Kpa" E "REAL 90kpa" EM DOIS BULLETS DIFERENTES — INSISTIR QUE O NUMERO E REAL
        //    E EM SI UM SINTOMA DA CATEGORIA.
        // 4. ANYBEAR (£52,24) E MESLIESE 85kPa (£99,99) USAM O MESMO TEXTO DE ANUNCIO, PALAVRA POR PALAVRA:
        //    "The [MARCA] vacuum sealer boasts [X] watts of high power to achieve a rapid vacuum speed of [Y] seconds.
        //     The upgraded copper core pump ensures corrosion resistance..."
        //    E O MESMO BULLET DE GARANTIA: "【5 Year Warranty and Satisfied Service】You will receive 1 x vacuum sealer machine,
        //    2 x vacuum bag rolls..." SO MUDAM MARCA (Anybear/Mesliese), POTENCIA (100W/120W), TEMPO (6-12s/6-18s) E kPa (90/85).
        //    E A MESMA MAQUINA DE FABRICA COM DOIS ROTULOS E NUMEROS DIGITADOS NO MESMO MOLDE — E A MAIS BARATA ALEGA MAIS SUCCAO
        //    COM MENOS WATTS.
        // 5. POTENCIA E O UNICO NUMERO COMUM E COMPARAVEL: 100W (ANYBEAR) · 120W (MESLIESE 85kPa E 6in1, BONSENKITCHEN 4 MODES) ·
        //    125W (BONSENKITCHEN 5 MODES) · 140W (MESLIESE 95kPa, FRESKO).
        // 6. A FRESKO (£69,99, 1.784 AVALIACOES) E A UNICA QUE VENDE MECANISMO EM VEZ DE NUMERO: CAMARA DUPLA COM DETECCAO DE
        //    PARTICAO, BARRA DE SOLDA DE 5mm E GARANTIA DE 3 ANOS. NENHUM kPa, NENHUM L/min.
        // 7. LARGURA DA BARRA DE SOLDA E O QUE DECIDE SE O SACO VAZA COM LIQUIDO, E QUASE NINGUEM PUBLICA:
        //    FRESKO 5mm · ANYBEAR 5mm (COM TIRA DE 12mm) · MESLIESE 85kPa BARRA DE 11,8 POLEGADAS DE COMPRIMENTO (NAO LARGURA).
        //
        // ═══ CRITERIO DE CORTE ═══
        // EXCLUIDOS POR AMOSTRA FINA: B0HBBCBM3Z (28), B0G2GN9KDZ (45), B0H7SJLB3S (15), B0H297F6T8 (2), B073XKXRQ6 (17),
        // B0H5JNH8QL (69), B0FDX3Q81X (82), B0H6X11QQD (122). A ANYBEAR (135) E A MESLIESE 85kPa (95) ENTRARAM POR SEREM
        // O PAR QUE REVELA O TEMPLATE COMPARTILHADO, E ESTAO SINALIZADAS NO TEXTO.
        //
        // ═══ VARIACOES DE PALAVRA-CHAVE TRABALHADAS NO TEXTO ═══
        // best vacuum sealer · best vacuum sealer on amazon · food vacuum sealer · vacuum sealer machine uk ·
        // vacuum sealer for sous vide · best food sealer for freezing · handheld vacuum sealer ·
        // vacuum sealer with bag cutter · cheap vacuum sealer · vacuum packing machine
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-vacuum-sealer',                                       // SLUG DO ARTIGO (URL) = PALAVRA-CHAVE EM formato-url
            'title' => 'Best Vacuum Sealer 2026: 10 Ranked on Specs That Compare', // TITULO / H1 — CONTEM A PALAVRA-CHAVE
            'meta_title' => 'Best Vacuum Sealer 2026: Top 10 Ranked',             // TITLE DA ABA/GOOGLE (40 CHARS)
            'meta_description' => 'We ranked the best vacuum sealer options after finding the two big brands quote different units, and one £52 machine claims more suction than a £99.99 one.', // META DESCRIPTION (~155 CHARS)
            'focus_keyword' => 'best vacuum sealer',                              // PALAVRA-CHAVE PRINCIPAL — VIRA O ALT DO HERO
            'hero_image' => '',                                                   // SEM HERO MANUAL: A VIEW USA A FOTO DO PRODUTO #1 COMO IMAGEM SOCIAL
            'intro' => 'You cannot compare most vacuum sealers against each other, and that is not an accident. The two brands that dominate this category quote entirely different units: Mesliese advertises suction in kPa, at 85, 90 and 95, while Bonsenkitchen advertises it in litres per minute, at 8 and 15. Those measure different things, kPa being how deep a vacuum the pump pulls and litres per minute being how fast it moves air, and there is no conversion between them. A third brand publishes neither. It gets stranger inside a single brand: Mesliese sells a £84.99 machine claiming 95kPa and a £99.99 machine claiming 85kPa, so the more expensive one advertises less suction. And a £52.24 Anybear turns out to use the same advertising copy as that £99.99 Mesliese, word for word, with only the brand name, the wattage and the kPa figure swapped. For context, atmospheric pressure at sea level is about 101.3 kPa, so a 95kPa claim is asserting 94 percent of a perfect laboratory vacuum from a domestic kitchen pump, and no standard governs how any of these brands measure it. So this guide ranks the best vacuum sealer options on evidence, warranty and the mechanical details that can actually be checked.', // INTRO OTIMIZADA
            'conclusion' => 'The best vacuum sealer for a home kitchen is the one with the deepest review sample and a warranty you can hold the seller to, because the headline suction figure is close to useless as a comparison. If you want to compare anyway, use wattage, which every listing publishes and which at least measures the same thing across brands: these run from 100W to 140W. Then look at the seal bar rather than the pump, since a 5mm wide sealing strip is what stops a bag of marinade leaking in the freezer and only a couple of listings mention theirs. Decide early whether you need a full-size machine or a handheld one, because a cordless sealer with reusable bags suits leftovers and fridge organisation while a heat-seal machine with a bag roll and a built-in cutter is what you want for batch freezing and sous vide. And treat identical wording across two brands as what it is: the same factory machine with different numbers typed into the same template.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                        // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 13:00:00',                              // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'Mesliese VS6601s 6-in-1 Vacuum Sealer, 90kPa',                             // NOME
                'price' => '£84.93',                                                                 // PRECO NA COLETA
                'rating' => 4.7,                                                                     // NOTA
                'reviews_count' => 7514,                                                             // Nº DE AVALIACOES (MAIOR AMOSTRA DA BUSCA INTEIRA)
                'image' => 'https://m.media-amazon.com/images/I/71wUu-LdQiL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Mesliese VS6601s stainless steel vacuum sealer with dry and moist modes', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BXSKHL8D?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'With 7,514 ratings at 4.7 this has more evidence behind it than everything else here combined, in a stainless steel body with dry, moist, normal and soft modes.', // TEXTO CURTO DO CARD
                'body' => 'Evidence decides this one. A sample of 7,514 ratings at 4.7 is nearly four times the next largest in the search, and for a kitchen appliance whose failure mode is a pump that weakens after a year, that depth of feedback is worth more than any number on the box. The stainless steel surface and smooth curved vacuum chamber also solve a real annoyance, since the usual complaint with cheap sealers is food residue trapped in the corners of the chamber where you cannot reach it.

The six modes are more useful than the count suggests. Dry and Moist change how long the pump runs before the seal fires, which is what stops juices being pulled into the machine. Normal and Soft change the suction strength, and Soft is what you use for anything crushable, bread, pastry or soft fruit, that a single-setting sealer would flatten. It handles 20 continuous seals, which covers a batch-freezing session without a cool-down.

On the suction number, read it with the scepticism the category has earned. Mesliese states a maximum of 90kPa and then, in a separate bullet, calls it "TESTED 90Kpa" and "REAL 90kpa". Insisting twice that a figure is genuine is a curious thing to need to do, and there is no independent standard for measuring it anyway. Judge this on the 7,514 ratings, not the kilopascals.',
                'pros' => ['7,514 ratings at 4.7, by far the largest sample in the category', 'Dry, Moist, Normal and Soft modes, so soft foods survive', 'Stainless steel body with a smooth chamber that wipes clean', 'Handles 20 continuous seals without cooling', 'Specified for UK 220-240V in its first bullet'],
                'contras' => ['States 90kPa and then insists twice that it is real', 'No litres-per-minute figure, so no speed comparison', 'No seal bar width published', 'Manual operation rather than automatic'],
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'Bonsenkitchen Vacuum Sealer Machine, 15L/Min',                             // NOME
                'price' => '£79.99',                                                                 // PRECO NA COLETA
                'rating' => 4.7,                                                                     // NOTA
                'reviews_count' => 385,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71e3RbiQLFL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Bonsenkitchen vacuum sealer machine in black with built-in cutter',    // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D9NGHPC1?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The fastest machine here on the one figure Bonsenkitchen does publish: 15 litres per minute, or 50 bags in 20 minutes, with a three-year warranty behind it.', // TEXTO CURTO DO CARD
                'body' => 'This is the machine for anyone who buys meat in bulk or batch-cooks at the weekend, because Bonsenkitchen quotes the specification that actually predicts how long you will stand at the counter. Fifteen litres per minute, from four vacuum pumps, translated into something you can picture: 50 bags in 20 minutes. That is roughly 24 seconds per bag including handling, and it is the only throughput claim in the search expressed in a way you can plan around.

The practical design is good too. A bag-mouth clamp holds the bag flat so it does not wrinkle when the lid closes, which is the commonest cause of a failed seal, and there is an easy-lock handle, a built-in cutter and internal bag-roll storage so the whole thing lives as one object rather than a machine plus a drawer of accessories. Five modes cover vac and seal, pulse, seal only, extended seal for moist food and an accessory port for containers.

Two caveats. The three-year quality commitment is among the better warranties here, but 385 ratings is a modest sample next to the four-figure counts elsewhere in this guide. And like every Bonsenkitchen listing, there is no kPa figure at all, so if you have been comparing this against a 95kPa machine, you have not been comparing anything.',
                'pros' => ['15 litres per minute, and 50 bags in 20 minutes, a usable throughput figure', 'Four vacuum pumps for sustained batch sealing', 'Bag-mouth clamp prevents the wrinkles that cause failed seals', 'Three-year quality commitment', 'Built-in cutter and internal bag roll storage'],
                'contras' => ['385 ratings, a modest sample for the price', 'No kPa figure published, so no comparison with Mesliese', 'No wattage stated on the listing', 'Manual operation mode'],
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'FRESKO Automatic Vacuum Sealer Machine, 140W',                             // NOME
                'price' => '£69.99',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 1784,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71Cgbo0ljvL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'FRESKO automatic vacuum sealer in black with dual chamber design',     // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DQ7K5ZZ6?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only listing here that sells mechanism instead of a suction number: a dual-chamber design, a 5mm wide sealing strip and a three-year guarantee, with no kPa claim at all.', // TEXTO CURTO DO CARD
                'body' => 'FRESKO does something no other brand in this search does. It publishes no kPa figure and no litres per minute, and instead describes how the machine works. The dual-chamber design with intelligent partition detection means the vacuum area evacuates while the sealing area seals, so the process is genuinely automatic rather than a two-button dance. Given that neither kPa nor L/min is measured to any standard here, describing the mechanism is arguably the more honest approach.

The number it does publish is the one that matters most in practice. The sealing strip is 5mm wide, which is roughly double the typical budget machine, and seal width is what decides whether a bag of stew or marinade holds in the freezer or weeps through the weld. A narrow strip is the single commonest reason home vacuum bags fail, and only two listings in this entire guide mention theirs.

There is a Pulse-Vac button for delicate items and an extended seal button for wet foods, a built-in cutter and bag storage, an automatic locking lid that needs no pressure, and a three-year guarantee. At £69.99 with 1,784 ratings at 4.6 it is the best-evidenced machine under £75 here. The main gap is that with no suction figure at all you are trusting the design description entirely.',
                'pros' => ['5mm wide sealing strip, the detail that stops freezer bags leaking', 'Dual-chamber design with automatic partition detection', 'Three-year guarantee', 'Pulse-Vac and extended seal buttons for delicate and wet foods', '1,784 ratings at 4.6, strongest evidence under £75'],
                'contras' => ['Publishes neither kPa nor litres per minute', 'You are trusting the mechanism description rather than a figure', 'Larger footprint at 39cm long', 'Only 10 pre-cut bags in the starter kit'],
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'Mesliese Vacuum Sealer 95kPa 140W, 20L/min',                               // NOME
                'price' => '£84.99',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 2036,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71hSjLdDWGL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Mesliese 95kPa vacuum sealer in grey stainless steel with LED display', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CGRM161Z?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only machine in the search to publish both units, 95kPa and 20 litres per minute, with double heat sealing strips and ETL certification.', // TEXTO CURTO DO CARD
                'body' => 'This is the one listing that lets you compare across the whole category, because it gives both numbers: 95kPa for vacuum depth and 20 litres per minute for pump speed, from a 140W motor, sealing in 3 to 8 seconds. Twenty litres per minute is a third faster than the Bonsenkitchen at number two, and having both figures on one page is what makes them meaningful rather than decorative.

The double heat sealing strip is the standout feature. Two welds rather than one is genuine insurance for marinades and moist food, where a single seal can fail and deflate a bag halfway through a month in the freezer. The aluminium alloy cutter is a real improvement on the flimsy plastic blades most machines ship with, the LED display counts down the remaining cycle so you know when it has finished, and ETL certification means it has been independently tested to UK and US safety standards, which almost nothing else here claims.

The reservation is the 95kPa figure itself, and it is a brand-level problem rather than a fault with this machine. Mesliese sells three sealers claiming 85, 90 and 95kPa, and the £99.99 model claims the lowest of the three. When the numbers from one brand run backwards against its own prices, the sensible response is to buy on the 2,036 ratings, the double seal and the ETL mark instead.',
                'pros' => ['Publishes both 95kPa and 20 litres per minute, unique here', 'Double heat sealing strips for moist food and marinades', 'ETL certified to UK and US safety standards', 'Aluminium alloy cutter rather than plastic', 'LED countdown display and one-hand lock handle'],
                'contras' => ['The 95kPa claim sits oddly against the brand own 85kPa model at £99.99', 'No standard governs how kPa is measured in this category', '2.95kg and 40.6cm long, the bulkiest machine here', '12 modes is more than anyone will use'],
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'Bonsenkitchen Vacuum Sealer, 5 Modes, 8L/Min',                             // NOME
                'price' => '£42.49',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 1042,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/710fniGdyIL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Bonsenkitchen five-mode vacuum sealer in silver with built-in cutter',  // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DQ83PLFB?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A 125W stainless machine with a 13.4 inch built-in cutter for £42.49, publishing 8 litres per minute. That is half the flow of its own bigger sibling.', // TEXTO CURTO DO CARD
                'body' => 'For £42.49 this covers the essentials properly and it is honest about where it sits. Eight litres per minute from a 125W pump is roughly half the flow of the £79.99 Bonsenkitchen at number two, and the listing says so plainly rather than rounding it up into something more flattering. For sealing a few bags at a time, eight litres a minute is entirely adequate; for fifty bags on a Sunday afternoon it will feel slow.

The build punches above the price. A stainless steel panel rather than painted plastic, a 13.4 inch built-in cutter that handles a full-width roll, internal storage for the external hose and connectors so nothing goes missing in a drawer, and a bag slide for feeding the roll. Five modes cover vac and seal, pulse, seal only, extended seal and the accessory port.

The score is where it sits mid-table. At 4.4 from 1,042 ratings it is respectable rather than strong, matching the cheaper Bonsenkitchen at number seven exactly. And at 2.53kg it is heavier than the £34.99 model by a kilogram, which is the stainless panel doing its work. If you want a Bonsenkitchen and do not need the throughput of the bigger machine, this is the sensible middle.',
                'pros' => ['Publishes 8 litres per minute and 125W honestly', 'Stainless steel panel at a budget price', '13.4 inch built-in cutter for full-width rolls', 'Internal storage for hose and connectors', 'Five modes including extended seal for wet food'],
                'contras' => ['8 L/min is half the flow of the £79.99 model', '4.4 rating, mid-table for this guide', 'No kPa figure for cross-brand comparison', 'No warranty length stated'],
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'Anybear Vacuum Sealer Machine, 90kPa 100W',                                // NOME
                'price' => '£52.24',                                                                 // PRECO NA COLETA
                'rating' => 4.9,                                                                     // NOTA (MAIOR DA LISTA)
                'reviews_count' => 135,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71DfsOIDUoL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Anybear vacuum sealer machine with wide heat seal and LED display',    // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0H331BJ24?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A 5mm wide seal, a five-year warranty and a 4.9 rating for £52.24. Its advertising copy is also word-for-word identical to a £99.99 Mesliese, with the numbers swapped.', // TEXTO CURTO DO CARD
                'body' => 'On its own merits this is a well-equipped machine. A 5mm widened heat sealing line on a 12mm strip is the same seal width as the FRESKO at number three and double what most budget sealers offer, there is an 11.8 inch built-in cutter with internal roll storage, an LED countdown with error display, dry, moist, pulse and seal-only modes, and a five-year warranty that is the longest in this guide. It holds 4.9, the highest rating here, though from only 135 ratings.

Now the thing we found. Put this listing beside the £99.99 Mesliese at number ten and the copy is the same document. Anybear: the machine "boasts 100 watts of high power to achieve a rapid vacuum speed of 6-12 seconds. The upgraded copper core pump ensures corrosion resistance". Mesliese: it "boasts 120 watts of high power to achieve a rapid vacuum speed of 6-18 seconds. The upgraded copper core pump ensures corrosion resistance". The warranty bullets match too, down to the bag dimensions in inches. Brand name, wattage, seal time and kPa figure are swapped; everything else is identical.

That points to one factory supplying both brands, which is unremarkable in itself. What is remarkable is the direction of the numbers: the £52.24 machine claims 90kPa from 100W while the £99.99 one claims 85kPa from 120W. Less power, deeper vacuum, half the price. At least one of those figures was chosen rather than measured, and this is the cheaper of the two.',
                'pros' => ['5mm widened heat seal on a 12mm strip, genuinely wide', 'Five-year warranty, the longest in this guide', '4.9 rating, the highest here', '11.8 inch built-in cutter and internal roll storage', 'Half the price of the near-identical Mesliese'],
                'contras' => ['Advertising copy is identical to a £99.99 Mesliese with numbers swapped', 'Claims deeper vacuum than that machine from 20W less power', 'Only 135 ratings, a thin sample', 'No litres-per-minute figure'],
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'Bonsenkitchen Vacuum Sealer, 4 Modes, 120W',                               // NOME
                'price' => '£34.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 1723,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61il2ela8AL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Bonsenkitchen compact four-mode vacuum sealer in silver',              // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FSQ2LYV2?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest full-size sealer here with a real sample behind it, at £34.99 with 1,723 ratings. It publishes no suction figure of any kind.', // TEXTO CURTO DO CARD
                'body' => 'At £34.99 with 1,723 ratings at 4.4, this is the entry point into full-size vacuum sealing without gambling on a listing with forty reviews. It weighs 1.47kg, roughly half the bigger machines here, so it stores in a cupboard rather than living on a worktop, and the internal green baffle is a genuinely helpful touch: it shows you exactly where the bag mouth has to sit, which removes the guesswork that causes most first-week failures.

Four modes cover the useful ground, vac and seal for dry goods, pulse for anything you might crush, seal only, and an external hose for containers and jars. The sous vide kit thinking is sensible, with five bags, a suction hose and two pump connections in the box, so you can start immediately.

What you do not get is any number describing suction. Not kPa, not litres per minute, just a reference to Globefish technology for high-speed continuous working. On a £34.99 machine that is arguably fair enough, since the money buys mechanism rather than performance, but it does mean this cannot be compared with anything else on this page except by price and rating. Both of those are decent, and it is £7.50 less than its five-mode sibling above.',
                'pros' => ['£34.99 with 1,723 ratings at 4.4, the cheapest credible full-size option', 'Only 1.47kg, easy to store in a cupboard', 'Internal green baffle shows exactly where to place the bag', 'External hose and two pump connections included', 'Four modes including pulse for delicate items'],
                'contras' => ['No kPa or litres-per-minute figure published at all', 'Plastic body rather than stainless', 'No built-in cutter or bag roll storage', 'Only five bags in the starter kit'],
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'GIRAFFYCO Handheld Vacuum Sealer Set with 30 Reusable Bags',               // NOME
                'price' => '£32.99',                                                                 // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 768,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71ictJ4GCXL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'GIRAFFYCO cordless handheld vacuum sealer with reusable bags',         // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FH69WJ7R?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A different machine entirely: cordless, 60kPa, and it comes with 30 reusable bags rather than a heat-seal roll, so there is no consumable to keep buying.', // TEXTO CURTO DO CARD
                'body' => 'This solves a different problem from everything else on this page and it is worth understanding before you compare prices. There is no heat sealing here. Instead a cordless handheld unit draws air out through a valve on a reusable zip-style bag, so the same 30 bags get washed and used again indefinitely. That removes the running cost that every other machine here carries, since heat-seal rolls are a consumable you replace forever.

The kit is generous: 30 bags in three sizes, ten each of small, medium and large, plus a foldable drying rack for washing them and a charging cable. The 1200mAh battery charges in about two hours, and a transparent water tank acts as a buffer so liquid pulled from the bag does not reach the motor, though GIRAFFYCO is clear the machine itself is not waterproof.

The trade-off is depth of vacuum and durability of seal. At 60kPa it pulls the weakest vacuum in this guide, and a valve on a reusable bag will never hold as long as a heat weld, so this is for fridge organisation, leftovers, opened packets and short-term freezing rather than the six-month steak storage a heat-seal machine gives you. For that job, at £32.99 with 768 ratings, it is genuinely good.',
                'pros' => ['No consumable bags to keep buying, the 30 supplied are reusable', 'Cordless with a 1200mAh battery, charges in about two hours', '30 bags in three sizes plus a drying rack included', 'Water tank buffer protects the motor from liquid', '768 ratings at 4.5'],
                'contras' => ['60kPa, the weakest suction figure in this guide', 'Valve seals do not hold as long as heat welds', 'Not waterproof, per its own listing', 'Wrong tool for long-term freezer storage or sous vide'],
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'Hilifix 5-in-1 Food Vacuum Sealer Machine, 65kPa',                         // NOME
                'price' => '£26.99',                                                                 // PRECO NA COLETA (O MAIS BARATO DA LISTA)
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 266,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71ceSGsYf6L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Hilifix five-in-one automatic food vacuum sealer machine',             // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CQ4ZX1FG?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest heat-seal machine here at £26.99, and unusually honest about it: 65kPa, a figure well below the 90 and 95 everyone else claims.', // TEXTO CURTO DO CARD
                'body' => 'There is something refreshing about this listing. In a category where nearly every machine claims 90 or 95kPa, Hilifix states 65kPa on a £26.99 sealer. That is a modest, plausible figure for a small pump at this price, and quoting it rather than rounding up to 90 is a small act of honesty that most of this page does not manage.

For the money the feature set is reasonable. Fully automatic vacuum and seal operation, five modes covering food, dry, moist and pulse, an external pumping function with a separate port for containers and jars, and a lid that lifts off for cleaning, which matters because this is where liquid ends up. Ten heat-seal bags are included and Hilifix says the design has been through 20,000 test cycles.

The limits are what you would expect at £26.99. Sixty-five kilopascals removes noticeably less air than the mid-range machines, so bags will look softer and food will not keep as long in the freezer. There is no built-in cutter or roll storage, so you are buying pre-cut bags. And 266 ratings at 4.3 is the weakest combination of sample and score among the heat-seal machines here. As a first vacuum sealer to find out whether you will actually use one, it is a sensible amount to risk.',
                'pros' => ['£26.99, the cheapest heat-seal machine in this guide', 'Quotes a plausible 65kPa rather than an inflated figure', 'Fully automatic operation with five modes', 'External pumping port for containers and jars', 'Lift-off lid makes cleaning straightforward'],
                'contras' => ['65kPa removes less air, so shorter freezer life', 'No built-in cutter or bag roll storage', '266 ratings at 4.3, the weakest evidence among heat-seal machines', 'Only ten bags in the box'],
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'Mesliese Vacuum Sealer Machine, 85kPa 120W',                               // NOME
                'price' => '£99.99',                                                                 // PRECO NA COLETA (O MAIS CARO DA LISTA)
                'rating' => 5.0,                                                                     // NOTA
                'reviews_count' => 95,                                                               // Nº DE AVALIACOES (AMOSTRA MAIS FINA — SINALIZADO NO TEXTO)
                'image' => 'https://m.media-amazon.com/images/I/41qetKvcPsL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Mesliese 85kPa stainless steel vacuum sealer with dry and moist modes', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GR4G9PBD?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The most expensive machine here at £99.99, claiming the lowest suction of any Mesliese at 85kPa, on 95 ratings. Its copy also matches a £52.24 rival exactly.', // TEXTO CURTO DO CARD
                'body' => 'Taken alone this is a decent machine. An 11.8 inch upgraded sealing strip is long enough for wide bags, the copper core pump is a better component than the aluminium alternatives, there is a built-in cutter with internal roll storage, dry and moist automatic modes, and a five-year warranty. Mesliese also notes it works with bags from other brands, which is worth knowing since some machines are fussy about bag thickness. It holds 5.0, though from 95 ratings.

The problem is everything around it. At £99.99 it is the most expensive sealer in this guide, and it claims 85kPa, the lowest figure of the three Mesliese machines here. The £84.93 model claims 90kPa and the £84.99 model claims 95kPa with a faster 140W pump and a double seal. So within one brand, on one page of search results, paying £15 more buys you a lower headline number and less power.

Then there is the copy. The wording of its power bullet and its warranty bullet is identical to the £52.24 Anybear at number six, with only the brand, the wattage, the seal time and the kPa figure changed. The same factory is very likely making both, which is normal. Choosing different numbers for the same template is what makes the figures hard to take seriously, and it is why this finishes last despite a perfect rating from a very small sample.',
                'pros' => ['11.8 inch sealing strip, long enough for wide bags', 'Copper core pump for corrosion and heat resistance', 'Five-year warranty', 'Works with bags from other brands', 'Built-in cutter with internal roll storage'],
                'contras' => ['£99.99 while claiming less suction than the brand own £84.93 model', 'Copy is identical to a £52.24 Anybear with the numbers swapped', 'Only 95 ratings, the thinnest sample in this guide', '120W against 140W on a cheaper Mesliese'],
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
