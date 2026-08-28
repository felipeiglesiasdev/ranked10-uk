<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class WindowVacuumsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE ASPIRADORES DE JANELA DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA FILTRADA: /s?k=window+vacuum+condensation&rh=p_36%3A2000-  (22 ASINS)
        // SAZONAL: A TEMPORADA DE CONDENSACAO BRITANICA VAI DE OUTUBRO A MARCO.
        // FECHA O CLUSTER DA UMIDADE COM best-dehumidifier-for-home E
        // best-humidifier-for-home.
        //
        // ─── ACHADOS ───
        // 1. TODO ANUNCIO VENDE AUTONOMIA EM MINUTOS, E O QUE LIMITA O TRABALHO E O
        //    TANQUE. UM ASPIRADOR DE JANELA PARA QUANDO O RESERVATORIO ENCHE, NAO
        //    QUANDO A BATERIA ACABA — E NUMA MANHA DE INVERNO COM CONDENSACAO EM TODA
        //    VIDRACA O TANQUE ENCHE MUITO ANTES. A COMPARACAO QUE PROVA:
        //      KARCHER WV 1 ... 20 min de bateria, tanque de 100 ml
        //      BELDRAY ........ 30 min de bateria, tanque de  60 ml
        //    A BELDRAY ANUNCIA 50% MAIS AUTONOMIA COM 40% MENOS TANQUE. NA PRATICA ELA
        //    PARA ANTES.
        // 2. E O TANQUE CORRE AO CONTRARIO DO PRECO. A TOWER, A MAIS BARATA DA LISTA A
        //    £22.99, TEM O MAIOR TANQUE: 150 ml. A KARCHER WV 2 PLUS N, A MAIS CARA A
        //    £62.99, NAO PUBLICA CAPACIDADE DE TANQUE EM BULLET NENHUM.
        // 3. TRES APARELHOS DECLARAM A MESMA BATERIA DE 2200 mAh E TRES AUTONOMIAS
        //    DIFERENTES: DMD COLLECTIVE 35 min, WINDOW VAC KIT 40 min, EAVE 45 min.
        //    MESMA CELULA, MESMO TIPO DE MOTOR, 29% DE VARIACAO NO NUMERO ANUNCIADO.
        //    O QUE MUDA E QUEM ESCREVEU O TEXTO.
        // 4. A BELDRAY DECLARA AS DIMENSOES COMO "18 cm (L) x 28 cm (W) x 315 cm (H)".
        //    TRES METROS E QUINZE DE ALTURA. FALTOU A VIRGULA — A PROPRIA TABELA DE
        //    ESPECIFICACOES DIZ 31,5 cm, ENTAO O BULLET E A TABELA SE CONTRADIZEM.
        // 5. A MESMA BELDRAY TEM O CAMPO "Style: Tank Top" NA FICHA. E VALOR DE
        //    CATEGORIA DE ROUPA NUM ASPIRADOR DE JANELA.
        // 6. A TOWER VENDE O MESMO MODELO T131001 EM TRES ASINS COM O MESMO POOL DE
        //    1.592 AVALIACOES E A MESMA NOTA 4.2, A £22.66, £22.99 E £24.98 — SO MUDA
        //    O SUFIXO DE COR (BLG, PL E SEM SUFIXO). MESMO PADRAO DA CATIT PIXI.
        // 7. O "WINDOW VAC KIT" ESTA EM DOIS ASINS COM AS MESMAS 329 AVALIACOES E A
        //    MESMA NOTA 4.5, A £38.98 E £39.99. A EAVE TEM DOIS ANUNCIOS QUASE IGUAIS
        //    (111 E 132 AVALIACOES) COM O MESMO TITULO DE 45 MINUTOS.
        // 8. A BOSCH MEDE EM JANELAS, NAO EM MINUTOS: "running time: approx. 35
        //    windows". E MAIS UTIL PARA O COMPRADOR E INCOMPARAVEL COM O RESTO DA
        //    CATEGORIA, QUE MEDE EM MINUTOS. A FICHA DELA AINDA TRAZ "Specific uses for
        //    product: Construction" E "Contains liquid contents: Yes".
        // 9. A CUBETECH ESCREVE QUE O TANQUE TEM "a generous water tank capacity" E
        //    NUNCA DIZ QUANTOS ML. NA MESMA BULLET SEGUINTE HA UM ERRO DE DIGITACAO,
        //    "SlimLine 17cm nozzle fro hard to reach".
        // 10. BUSCA POLUIDA: ROBOS LIMPA-VIDRO DE £69.99 A £424.99 APARECEM NA MESMA
        //    PAGINA, E O MOP A VAPOR NEO — QUE JA ESTA NA NOSSA LISTA DE MOPS A VAPOR —
        //    TAMBEM, PORQUE O TITULO DELE CONTEM "Window Washer".
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: ROBOS LIMPA-VIDRO (OUTRO PRODUTO, OUTRA FAIXA DE PRECO); OS ASINS
        // IRMAOS DA TOWER, DA EAVE E DO WINDOW VAC KIT (MANTIDO UM DE CADA POOL);
        // APARELHOS COM MENOS DE 130 AVALIACOES.
        // A KARCHER APARECE TRES VEZES PORQUE INVENTOU E DOMINA A CATEGORIA, E CADA
        // MODELO TEM CONTAGEM PROPRIA — NAO E POOL COMPARTILHADO.
        // DENTRO: NOTA DE 4.0 A 4.5, PRECO DE £22.99 A £62.99, OITO MARCAS.
        //
        // FOCUS KEYWORD: best window vacuum
        // VARIACOES TRABALHADAS: window vac / condensation removal vacuum /
        // cordless window cleaner / window vacuum for condensation / karcher window vac /
        // best window vac for condensation / handheld window cleaner / squeegee vacuum
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "home", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-window-vacuum',                                      // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Window Vacuum 2026: 10 Ranked on Tank Size, Not Runtime', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Window Vacuum 2026: Top 10 for Condensation',   // TITLE DA ABA/GOOGLE (48 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best window vacuum options on Amazon by water tank size rather than battery runtime, comparing condensation vacs from £22.99 to £62.99.', // META DESCRIPTION (149 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best window vacuum',                             // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Every window vacuum on Amazon is sold on battery runtime, and on a British winter morning that is the wrong number. These machines stop when the dirty water tank is full, not when the battery dies, and a house with condensation on every pane fills a small tank long before a charge runs down. The comparison that settles it sits within this ranking: the Kärcher WV 1 advertises 20 minutes of battery with a 100ml tank, while the Beldray advertises 30 minutes with a 60ml one. The Beldray promises half as much runtime again and gives you 40% less capacity, so it is the one that stops first. Worse, tank size runs backwards to price here — the cheapest machine on this page has the biggest reservoir at 150ml, and the most expensive does not publish a tank figure at all. Below we rank the best window vacuum options on Amazon in August 2026 on the specification that actually decides how many windows you finish.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "The best window vacuum for a British winter is chosen on three numbers and runtime is not the first of them. Start with the tank: 100ml is the sensible minimum and 150ml means you clear a whole floor of a house before emptying, while 60ml means a trip to the sink every few windows. Then the nozzle width, because a 28cm blade covers a pane in fewer passes than a 17cm one, and the machines that ship both are genuinely more useful — the narrow head is what gets into a window reveal or down the edge of a shower screen. Only then look at runtime, and treat the figure with scepticism: three machines in this comparison declare the identical 2200mAh battery and claim 35, 40 and 45 minutes from it. Meanwhile the practical advice that no listing gives you is to work top to bottom in overlapping vertical strokes and empty the tank before it reaches the fill line, because a full reservoir on a window vac finds its way back out through the seal and down your wall. If you are also running a dehumidifier, the vac deals with the water already on the glass and the dehumidifier stops it forming — they are the two halves of the same winter problem.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 15:50:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Tower T131001 Cordless Window Vac, 150ml Tank, 20W, 30 Min',              // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£22.99',                                                                // PRECO (COLETADO EM 28/08/2026)
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 1592,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51nAsForXuL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best window vacuum',                                                 // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CQ2YKVLC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best window vacuum here on the number that matters: a 150ml tank, the largest in this comparison, on the cheapest machine at £22.99.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "One hundred and fifty millilitres is half as much again as the next largest tank on this page, and it belongs to the cheapest machine in the comparison. That is not a coincidence worth celebrating so much as a demonstration of how little the category thinks about the spec: Tower has fitted a proper reservoir and priced the machine at £22.99, while the £62.99 Kärcher at number three does not print a tank figure anywhere in its bullets.

On a British winter morning that difference is the whole experience. Condensation on a double-glazed unit yields roughly 20 to 30ml per pane in a bad week, so 150ml gets you through five or six windows before a trip to the sink, where 60ml gets you two. Thirty minutes of runtime on a 20W motor is more than enough to empty that tank several times over.

The 4.2 average across 1,592 ratings is the lowest of the top four here, and it is the honest counterweight — this is a value brand, not a precision instrument, and the build reflects the price. Note too that Tower sells this exact model under three ASINs with colour suffixes, all showing the same 1,592 ratings and the same 4.2, at £22.66, £22.99 and £24.98. Same machine, same review pool, three prices. Check all three before you click; we have linked the middle one.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['150ml tank, the largest in this comparison by 50%', 'Cheapest machine here at £22.99', '30 minute runtime on a 20W motor, ample for the tank', 'Publishes tank, runtime, wattage and charge time'], // PONTOS POSITIVOS
                'contras' => ['4.2 average, the lowest of the leading machines here', 'Sold under three ASINs sharing one pool of 1,592 ratings', '3 hour charge for 30 minutes of use', 'Value-brand build rather than a precision tool'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Karcher WV 1 Cordless Window Vac, 100ml Tank, 20 Min, 0.5kg',             // NOME (ENCURTADO)
                'price' => '£29.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 2696,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51SvaAPQRtL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Karcher WV 1 cordless window vac with 100ml dirty water tank',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CH3JRYX1?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The one Karcher that publishes its tank capacity — 100ml — and the lightest machine here at 0.5kg, which matters more than it sounds on an upstairs window.', // TEXTO CURTO (CARD)
                'body' => "Kärcher invented this category and the WV 1 is where its range starts. The specification is honest and complete in a way the rest of the Kärcher line here is not: a 100ml dirty water tank, 20 minutes of battery, and a weight of just 0.5kg. It is the only Kärcher on this page that puts a tank figure in its bullets at all.

Half a kilogram is the number people underestimate. A window vac is used at arm's length, above shoulder height, repeatedly — and the difference between 500g and the 924g Bosch is felt in your forearm by the fourth window. For anyone doing a whole house of condensation on a January morning, light beats powerful.

The 20 minute runtime is the shortest in this comparison and it looks like a weakness until you do the arithmetic. Twenty minutes is plenty to fill a 100ml tank two or three times over, which is more windows than most people clean in a session. Compare it with the Beldray at number ten, which sells 30 minutes and holds 60ml: the Beldray runs longer and stops sooner. Kärcher has sized the battery to the tank rather than to the marketing, and at £29.99 with 2,696 ratings at 4.4 it is the sensible default.", // TEXTO SEO LONGO
                'pros' => ['Publishes a 100ml tank, unlike the pricier Karcher models here', 'Lightest machine in this comparison at 0.5kg', 'Battery sized sensibly to the tank rather than to the marketing', '2,696 ratings at 4.4', 'LED battery status display'], // PONTOS POSITIVOS
                'contras' => ['20 minute runtime is the shortest here on paper', 'Single nozzle, with no narrow head for tight reveals', 'Costs £7 more than the Tower for 50ml less tank'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Karcher WV 2 Plus N Cordless Window Vac, 35 Min, 2 Nozzles',              // NOME (ENCURTADO)
                'price' => '£62.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 10051,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/41cI7cM7znL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Karcher WV 2 Plus N cordless window vac with two suction nozzles',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CH3J2YHX?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'By far the most reviewed window vac on Amazon at 10,051 ratings, with two nozzles and a full cleaning kit — but it never tells you how big the tank is.', // TEXTO CURTO (CARD)
                'body' => "Ten thousand and fifty-one ratings at 4.5 stars is four times the evidence of anything else in this comparison, and it is the reason this machine sits third despite what follows. When ten thousand British households have bought the same window vac and settled on 4.5, the product works.

The package is the most complete here. Two suction nozzles cover both large panes and narrow reveals, there is a spray bottle with a microfibre cloth and 20ml of window cleaner concentrate so you can start the moment it arrives, and the LED battery display tells you where you stand rather than leaving you to guess. Thirty-five minutes of runtime is joint longest among the branded machines.

What Kärcher does not do on this listing is state the tank capacity, in any bullet, anywhere. That is a strange omission from the brand that publishes 100ml on its own entry-level WV 1, and it is the reason a £22.99 Tower outranks a £62.99 Kärcher in this article. If you are buying for a house with serious condensation, the number you need is the one this listing leaves out. Buy it for the evidence, the two nozzles and the kit; do not assume the tank scales with the price, because on this page it does the opposite.", // TEXTO SEO LONGO
                'pros' => ['10,051 ratings at 4.5, four times the evidence of anything else here', 'Two suction nozzles for wide panes and narrow reveals', 'Spray bottle, microfibre cloth and cleaner concentrate included', '35 minute runtime with an LED battery display'], // PONTOS POSITIVOS
                'contras' => ['Never states the tank capacity anywhere in its bullets', 'Costs £62.99, nearly three times the Tower', 'Kärcher publishes a tank figure on its cheaper WV 1 but not here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'DMD Collective Cordless Window Vac, 100ml Tank, 28cm Nozzle',             // NOME (ENCURTADO)
                'price' => '£24.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 143,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61dv7daoHZL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'DMD Collective cordless window vac with 28cm rubber lip nozzle',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DJD8FHHB?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best specified budget machine here: 100ml tank, 28cm nozzle, 35 minutes and the exact battery all published, for £24.99.', // TEXTO CURTO (CARD)
                'body' => "This listing does what almost none of the cheap ones manage: it tells you everything. One hundred millilitre tank, 28cm rubber-lip nozzle, 35 minute runtime, and the battery specified precisely as 3.7V 2200mAh lithium-ion. For £24.99 from a brand nobody has heard of, that is a page written by somebody who understood the product.

The 28cm nozzle is the practical highlight. Blade width decides how many passes a pane takes, and 28cm is the full-size head that Kärcher fits to its more expensive machines. On a standard double-glazed unit that is two strokes rather than four, which over a whole house is the difference between a job and a chore.

The catch is evidence. One hundred and forty-three ratings at 4.4 is the second thinnest sample in this comparison, and with a new brand there is no history to fall back on — no way to know whether the seal lasts a season or three. It is also the machine that reveals the battery finding: it declares the same 2200mAh cell as two other units on this page and claims 35 minutes, where they claim 40 and 45 from identical hardware. DMD's is the most conservative of the three, which by the logic of this whole article is a point in its favour.", // TEXTO SEO LONGO
                'pros' => ['Publishes tank, nozzle width, runtime and exact battery spec', '100ml tank and a full-width 28cm nozzle for £24.99', 'The most conservative runtime claim of the three 2200mAh machines', '4.4 rating on its first 143 buyers'], // PONTOS POSITIVOS
                'contras' => ['143 ratings, the second thinnest sample here', 'New brand with no track record on seal or battery life', 'Single nozzle, no narrow head included'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Bosch GlassVAC Cordless Window Vac, Rated for 35 Windows',                // NOME (ENCURTADO)
                'price' => '£52.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 1944,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61bE4IKoW8L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Bosch GlassVAC cordless window vacuum with wiper blade technology',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07BH34JTM?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only machine here that quotes its runtime in windows rather than minutes — approximately 35 of them — which is more useful and completely incomparable.', // TEXTO CURTO (CARD)
                'body' => "Bosch has done something quietly sensible and quietly unhelpful at the same time. Instead of quoting minutes, the GlassVAC is rated for approximately 35 windows per charge. That is genuinely the number a buyer wants — nobody cleans windows by the clock — and it is also impossible to compare with the nine other machines on this page, all of which quote minutes.

The blade is the reason to consider it. Bosch says the wiper technology comes from its automotive division, which is not marketing froth: Bosch is one of the largest windscreen wiper manufacturers in the world, and a wiper blade that clears a windscreen at 70mph will clear a bathroom mirror. Blade quality is what separates a streak-free finish from a smeared one, and this is the only listing here that can point at genuine pedigree.

Two caveats. At 924g it is nearly twice the weight of the Kärcher WV 1, which you feel on upstairs windows. And the specification table is careless in the way this whole category is careless — it lists Specific uses for product as Construction and ticks Contains liquid contents as Yes, neither of which describes a domestic window vac. At £52.99 with 1,944 ratings at 4.4, you are paying for the blade and the badge.", // TEXTO SEO LONGO
                'pros' => ['Rates runtime in windows, which is what buyers actually want to know', 'Wiper blade technology from Bosch automotive, with real pedigree', '1,944 ratings at 4.4', 'LED battery display and a solid, well-built feel'], // PONTOS POSITIVOS
                'contras' => ['Runtime in windows cannot be compared with any rival here', '924g, nearly twice the weight of the Karcher WV 1', 'Specification table lists it under Construction uses', 'Publishes no tank capacity'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Karcher WV 2 Plus Cordless Window Vac, 280mm Nozzle, 35 Min',             // NOME (ENCURTADO)
                'price' => '£44.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 1004,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61KVj4bO8NL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Karcher WV 2 Plus cordless window vac with 280mm suction nozzle',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CH3GNNFS?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The middle Karcher, and the only one that publishes its nozzle width: 280mm, the full-size blade, with the spray bottle and cloth kit included.', // TEXTO CURTO (CARD)
                'body' => "Two hundred and eighty millimetres. That is the number this listing gives you that the others in the Kärcher range do not, and it is worth having: nozzle width decides how many passes a pane takes, and 280mm is the full-size head rather than the narrow one. On a standard window that is two strokes instead of three or four.

The rest is the familiar Kärcher package at a sensible point in the range. Thirty-five minutes of battery, the LED status display, and the spray bottle with microfibre cloth and 20ml of concentrate so the machine is usable the moment it comes out of the box. At £44.99 with 1,004 ratings at 4.4 it sits between the entry WV 1 and the heavily reviewed WV 2 Plus N.

The honest question is what the £15 over the WV 1 buys. You get 15 more minutes of runtime, a wider published nozzle and the cleaning kit; you lose the published tank capacity, because like the WV 2 Plus N this listing never states it. Given that the tank is the limiting factor rather than the battery, that is a strange trade to be offered. If the wider blade matters to you — large windows, patio doors, a conservatory — take it. If you have ordinary domestic windows, the WV 1 at number two does the same job for £15 less.", // TEXTO SEO LONGO
                'pros' => ['Publishes a 280mm nozzle width, the full-size blade', '35 minute runtime, joint longest among the branded machines', 'Spray bottle, microfibre cloth and concentrate included', 'LED battery status display', '1,004 ratings at 4.4'], // PONTOS POSITIVOS
                'contras' => ['Does not publish tank capacity, unlike the cheaper WV 1', 'Costs £15 more than the WV 1 for a wider blade and more battery', 'Battery gain is irrelevant if the tank is the limit'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'CubeTECH CTWV2 Cordless Window Vac with 28cm and 17cm Nozzles',           // NOME (ENCURTADO)
                'price' => '£29.95',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 2073,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61DS3F9VLIL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'CubeTECH CTWV2 cordless window vac with wide and slimline nozzles',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CCSDRKLJ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Both nozzle widths in the box for £29.95 with 2,073 ratings, but it describes its tank as generous and never says how many millilitres that is.', // TEXTO CURTO (CARD)
                'body' => "Two nozzles for under £30 is a genuinely good offer. The 28cm head does full panes in two passes and the 17cm SlimLine gets into window reveals, down the side of a shower screen and along the glazing bars of a Victorian sash — the places where a wide blade simply cannot reach. Kärcher charges £62.99 for a machine with two heads; CubeTECH charges £29.95, and 2,073 buyers have rated it 4.3.

The battery is rechargeable lithium and the machine is a straightforward, unfussy design that does the job.

What it will not tell you is the one thing this article is about. The first bullet says the CTWV2 boasts a generous water tank capacity, enabling continuous cleaning without interruption — and then never gives a figure. Generous is not a specification. On a page where the tank runs from 60ml to 150ml, a manufacturer choosing an adjective over a number is choosing not to be compared. The same bullet block contains a typo, offering the SlimLine nozzle fro hard to reach areas, which tells you roughly how much the copy was checked.", // TEXTO SEO LONGO
                'pros' => ['Both 28cm and 17cm nozzles included for £29.95', 'Narrow head reaches reveals, shower screens and glazing bars', '2,073 ratings at 4.3', 'Half the price of the two-nozzle Karcher'], // PONTOS POSITIVOS
                'contras' => ['Describes the tank as generous and never gives a millilitre figure', 'Typo in the bullet copy (nozzle fro hard to reach)', 'No runtime figure published either'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Window Vac Cleaner Kit with 17cm and 28cm Nozzles, 2200mAh, 40 Min',      // NOME (ENCURTADO)
                'price' => '£39.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 329,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61MhXzyU72L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Cordless window vac kit with 17cm and 28cm suction nozzles',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FBV2LQWX?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Dual nozzles and a published 2 kPa suction figure, but it claims 40 minutes from the same 2200mAh battery another machine here rates at 35.', // TEXTO CURTO (CARD)
                'body' => "This kit publishes something almost nobody else does: a suction figure, at 2 kPa. Suction is what lifts water off glass rather than smearing it, and having a number attached is more than the Kärcher, Bosch or Tower listings offer. Add both a 28cm and a 17cm nozzle and 4.5 stars from 329 ratings, and on paper it is a strong package for £39.99.

Then look at the battery. It declares 2200mAh and claims 40 minutes of runtime. The DMD Collective at number four declares 3.7V 2200mAh and claims 35 minutes. The EAVE at number nine declares 2200mAh and claims 45 minutes. Three machines, one commodity battery cell, three different answers spanning 29%. Motors in this class draw broadly the same current, so the honest conclusion is that at least two of those three numbers are estimates written by marketing rather than measured on a bench.

It also has a twin. A second listing carries an almost identical title, the same 329 ratings and the same 4.5 average, at £38.98 — a pound cheaper for the same product and the same review pool. We have linked this one because it was the one that surfaced first; check both, buy whichever is cheaper on the day, and take the 40 minute claim as a ceiling rather than a promise.", // TEXTO SEO LONGO
                'pros' => ['Publishes a 2 kPa suction figure, which almost nobody here does', 'Both 28cm and 17cm nozzles included', '4.5 stars from 329 ratings', 'States the battery capacity explicitly'], // PONTOS POSITIVOS
                'contras' => ['Claims 40 minutes from the same 2200mAh battery a rival rates at 35', 'Sold under two ASINs sharing 329 ratings, £1.01 apart', 'No tank capacity published', 'Only 329 ratings'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'EAVE Window Vac Set, 2 kPa Suction, 2200mAh, 45 Min Claimed',             // NOME (ENCURTADO)
                'price' => '£29.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 132,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71iH+8dokXL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'EAVE handheld window vacuum set with squeegee head',                 // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G3X1NYM4?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The longest runtime claim in the comparison at 45 minutes, from exactly the same 2200mAh battery two other machines here rate at 35 and 40.', // TEXTO CURTO (CARD)
                'body' => "Forty-five minutes is the highest runtime figure on this page and it comes from a 2200mAh battery — the same capacity the DMD Collective rates at 35 minutes and the Window Vac Kit rates at 40. Three machines, one battery size, three answers. Since a window vac motor is a small fan and a pump drawing broadly similar current across this whole price bracket, that spread is not engineering; it is copywriting.

That is the reason this sits ninth rather than higher, because the rest of it is fine. Two kilopascals of suction is published, which several better-known brands do not manage, and 4.4 stars from 132 ratings is a reasonable start for a new listing at £29.99.

EAVE also has a near-twin on Amazon: a second listing with the same 45 minute title at £30.59 with 111 ratings against this one's 132. Not quite the shared-pool situation seen elsewhere on this page, but close enough that you should check both before buying. Given the choice at this price, the DMD Collective at number four costs £5 less, publishes a 100ml tank and a 28cm nozzle, and makes the most conservative battery claim of the three — which after a day of reading these listings is the quality we have learned to reward.", // TEXTO SEO LONGO
                'pros' => ['Publishes a 2 kPa suction figure', '4.4 stars from 132 ratings at £29.99', 'Supplied as a set rather than a bare unit'], // PONTOS POSITIVOS
                'contras' => ['Claims 45 minutes from the battery a rival rates at 35', 'Publishes no tank capacity', 'A near-identical second listing sits at £30.59 with 111 ratings', '132 ratings is the thinnest sample here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Beldray Window Vac, 60ml Tank, 30 Minutes, Condensation Removal',         // NOME (ENCURTADO)
                'price' => '£27.95',                                                                // PRECO
                'rating' => 4.0,                                                                    // NOTA
                'reviews_count' => 5602,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51dP78wSptL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Beldray cordless window vac for condensation removal in turquoise',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B079GW8FQ1?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The second most reviewed vac here at 5,602 ratings, and the machine that proves the point of this article: 30 minutes of battery emptying into a 60ml tank.', // TEXTO CURTO (CARD)
                'body' => "Beldray sells this on 30 minutes of runtime, prints it in the title, and gives the machine a 60ml tank — the smallest in this comparison by 40%. Its own bullet claims that with a generous 60 ml capacity you can cover every window in your home without refilling. Sixty millilitres is about four tablespoons. On a January morning with condensation on every pane, that is two or three windows, and then a walk to the sink.

Put it beside the Kärcher WV 1 at number two, which advertises 20 minutes and holds 100ml, and the whole runtime-versus-tank argument resolves itself. The Beldray runs 50% longer and stops sooner, because the limit was never the battery.

Two other things on the page are worth noting. The bullets give the dimensions as 18cm long by 28cm wide by 315cm high — three metres and fifteen centimetres tall, a decimal point away from the 31.5cm its own specification table states. And the specification field for Style reads Tank Top, which is a clothing category value that has found its way onto a window vacuum. At 4.0 from 5,602 ratings this is also the lowest rating in the comparison across the second largest sample, which given the tank size is not surprising.", // TEXTO SEO LONGO
                'pros' => ['5,602 ratings, the second deepest sample in this comparison', 'Publishes its tank capacity honestly, even though it is small', 'Costs £27.95 and weighs 900g', 'Widely available on the high street as well as online'], // PONTOS POSITIVOS
                'contras' => ['60ml tank, the smallest here by 40%, behind a 30 minute battery', 'Bullet gives the height as 315cm where its own spec table says 31.5cm', 'Specification field lists the Style as Tank Top', '4.0 from 5,602 ratings, the lowest average in this ranking'], // PONTOS NEGATIVOS
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
        $this->command?->info("WindowVacuumsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
