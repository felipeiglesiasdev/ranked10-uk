<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class CordlessVacuumsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE ASPIRADORES VERTICAIS SEM FIO DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 30/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=cordless+vacuum+cleaner&rh=p_36%3A8000-  (20 ASINS ANALISADOS)
        // CATEGORIA HOME. SAZONAL: PICO DE SETEMBRO A DEZEMBRO (LAMA, CASA FECHADA E
        // VISITA DE NATAL). NAO CONFUNDIR COM O ARTIGO DE ASPIRADOR DE PELO DE PET, QUE E
        // OUTRA PALAVRA-CHAVE E OUTRO CONJUNTO DE PRODUTOS.
        //
        // PROFUNDIDADE: 887 / 824 / 818 / 722 / 689 / 689 / 542 / 441 / 342 / 256 / 215 / 123.
        //
        // ─── ACHADO PRINCIPAL: 55 kPa SAO 54% DE UM VACUO PERFEITO ───
        // 1. PRESSAO ATMOSFERICA AO NIVEL DO MAR E **101,325 kPa**. UM ASPIRADOR NAO PODE
        //    "SUGAR" MAIS DO QUE A DIFERENCA ENTRE A ATMOSFERA E O VACUO ABSOLUTO, ENTAO
        //    101,325 kPa E O TETO FISICO DE QUALQUER APARELHO. O QUE ESTA ANUNCIADO:
        //      ULTENIC U18 PRO ... **55 kPa** = 54,3% DE UM VACUO PERFEITO
        //      INTETURE .......... **55 kPa**
        //      B0GWQPCM9G ........ **55 kPa**
        //      FDUXUD ............ **50 kPa** NO TITULO E **55 kPa** NA FICHA (ACHADO 3)
        //      POWERFFY .......... **50 kPa** NO MODO MAXIMO (E PUBLICA A ESCADA — ACHADO 2)
        //      VACTECHPRO ........ **50 kPa**
        //      SHARK (x3) ........ **NAO PUBLICA kPa NENHUM**
        //      HOOVER ............ **NAO PUBLICA kPa NENHUM**
        //    AS QUATRO MAQUINAS DE MARCA COM HISTORIA NA CATEGORIA NAO PUBLICAM SUCCAO EM
        //    PASCAL. AS SEIS GENERICAS PUBLICAM, TODAS ENTRE 50 E 55 kPa. PARA COMPARAR:
        //    UM DYSON DE TOPO FICA PERTO DE 20-22 kPa E UM ASPIRADOR DE OFICINA DE 25 kPa.
        //
        // ─── ACHADO 2: A POWERFFY PUBLICA A ESCADA INTEIRA E DERRUBA O TITULO ───
        // 2. 🔴 A POWERFFY (£99.99, 256 AVALIACOES) E A UNICA DA BUSCA QUE PUBLICA OS TRES
        //    MODOS COM SUCCAO **E** AUTONOMIA:
        //      "three manual modes (**18/28/50KPa**)"
        //      "up to **65 mins in Eco** mode (**35 mins in Mid, 17 mins in Max**)"
        //    OU SEJA: OS 50 kPa DO TITULO DURAM **17 MINUTOS**. OS 65 MINUTOS DO TITULO
        //    ACONTECEM A **18 kPa**. O TITULO CASA A SUCCAO DO MODO MAXIMO COM A AUTONOMIA
        //    DO MODO ECONOMICO — DOIS NUMEROS DE DOIS ESTADOS DIFERENTES DA MESMA MAQUINA,
        //    APRESENTADOS COMO UM SO. E EXATAMENTE O PADRAO DA LAVADORA DE ALTA PRESSAO.
        // 3. E ELA PUBLICA A BATERIA: "high-density **8-cell 2500mAh** system". OITO CELULAS
        //    EM SERIE A 3,6 V DAO 28,8 V; 28,8 V × 2,5 Ah = **72 Wh**. LOGO:
        //      MODO MAXIMO: 72 Wh ÷ (17/60 h) = **254 W** DE CONSUMO REAL
        //      MODO ECO ...: 72 Wh ÷ (65/60 h) = **66 W**
        //    O ANUNCIO DIZ **600 W**. A BATERIA SO CONSEGUE ENTREGAR 254 W NO PICO — O NUMERO
        //    DO TITULO E 2,4 VEZES O QUE A MAQUINA PUXA DE VERDADE.
        // 4. A MESMA CONTA NA B0GWQPCM9G, QUE PUBLICA "6*4200mAh" E "80 mins (30 mins in Max)":
        //    SEIS CELULAS A 3,6 V = 21,6 V; × 4,2 Ah = 90,7 Wh.
        //      MAXIMO: 90,7 ÷ 0,5 h = **181 W**    ECO: 90,7 ÷ 1,33 h = **68 W**
        //    ANUNCIADO: **650 W**. E 3,6 VEZES O CONSUMO REAL DE PICO.
        //
        // ─── ACHADO 3: A HOOVER PUBLICA 200 W, E ISSO RESOLVE A CATEGORIA ───
        // 5. 🔴 A HOOVER — A MARCA QUE VIROU O VERBO "TO HOOVER" NO INGLES BRITANICO E QUE
        //    FAZ ASPIRADOR DESDE 1908 — ABRE O PRIMEIRO BULLET DELA COM "**200W POWERFUL
        //    SUCTION** & 3-SPEED MODES". DUZENTOS WATTS, NUMA MAQUINA DE £99.00 QUE DURA
        //    50 MINUTOS. AS GENERICAS DE £85.99 A £169.99 ANUNCIAM 600 E 650 W.
        //    E A CONTA DA POWERFFY MOSTRA POR QUE: 254 W E O TETO REAL DESTA CLASSE DE
        //    BATERIA. A HOOVER PUBLICA UM NUMERO DA MESMA ORDEM DE GRANDEZA DO QUE A FISICA
        //    PERMITE; AS OUTRAS PUBLICAM O TRIPLO.
        //
        // ─── ACHADO 4: DUAS POTENCIAS E DUAS SUCCOES NO MESMO ANUNCIO ───
        // 6. FDUXUD (824 AVALIACOES): TITULO "Cordless Vacuum Cleaner **600W 50Kpa**".
        //    BULLET 1: "features a **600W** brushless motor... Powerful **50kPa** Suction".
        //    CAMPO "Special feature": "►Upgraded **650W** Motor ►**55kPa** Cyclone Suction".
        //    QUATRO NUMEROS PARA DUAS ESPECIFICACOES, NA MESMA PAGINA.
        // 7. VACTECHPRO F02 (£85.99): O CABECALHO DO BULLET DIZ "【**600W** HyperCore Pro
        //    Brushless Motor System】" E O TEXTO DO MESMO BULLET DIZ "advanced HyperCore Pro
        //    **550W** brushless motor system". O TITULO DIZ 600W. MESMO BULLET, DOIS VALORES.
        //
        // ─── ACHADO 5: QUEM NAO PUBLICA NUMERO PUBLICA A CONDICAO ───
        // 8. A SHARK NAO DA kPa NEM WATT EM NENHUM DOS TRES MODELOS — MAS DA A AUTONOMIA COM
        //    A CONDICAO COMPLETA: "up to 60 minutes run-time (***In ECO power mode, with
        //    non-motorised tool***)". MODO **E** ACESSORIO. E A DIVULGACAO MAIS HONESTA DA
        //    BUSCA, E VEM DE QUEM NAO PRECISA DE NUMERO GRANDE PARA VENDER.
        // 9. A SHARK FREESTYLE MAX AINDA PUBLICA DIMENSAO COMPLETA E PESO: "H: 114cm, W:25cm,
        //    L:26cm, Weight: 3.2kg". E A UNICA DAS DEZ COM AS TRES MEDIDAS E A MASSA.
        //
        // ─── ACHADO 6: O DEPOSITO ANDA AO CONTRARIO DO PRECO ───
        // 10. CAPACIDADE DO COPO DE PO:
        //     SHARK STRATOS (£249) .... 0,7 L      SHARK POWERPROPET (£190) .. 0,7 L
        //     SHARK FREESTYLE (£110) .. 0,69 L     HOOVER (£99) .............. 0,7 L
        //     POWERFFY (£100) ......... 1,5 L      VACTECHPRO (£86) .......... 1,5 L
        //     ULTENIC (£140) .......... 1,6 L      FDUXUD / INTETURE / B0GWQPCM9G  1,8 L
        //     AS QUATRO DE MARCA FICAM TODAS EM ~0,7 L; AS GENERICAS TEM DE **2,1 A 2,6 VEZES**
        //     MAIS DEPOSITO. E UMA VANTAGEM REAL E MENSURAVEL DAS BARATAS, E MERECE SER DITA:
        //     E A DIFERENCA ENTRE ESVAZIAR UMA VEZ OU TRES NUMA CASA INTEIRA.
        //
        // ─── ACHADO 7: SPAM DE PALAVRA-CHAVE EM CAMPO DE ESPECIFICACAO ───
        // 11. INTETURE, NO CAMPO "Special feature": "★A Great Gift for **Christmas**★
        //     **Mother's Day**★**Father's Day**★**Birthday**★**Thanksgiving Day**". CAMPO DE
        //     ESPECIFICACAO TECNICA USADO COMO META TAG — MESMO PADRAO DA CASABREWS NO
        //     ARTIGO DE MAQUINA DE ESPRESSO. (E THANKSGIVING NEM E FERIADO BRITANICO.)
        // 12. POWERFFY POE O **E-MAIL DE SUPORTE** NO CAMPO DE RECURSOS ESPECIAIS:
        //     "support-uk@powerffy.com ➤2026 600W Brushless Motor ➤...".
        //
        // ─── RUIDO: O UNICO NUMERO QUE TODAS AS GENERICAS PUBLICAM E NENHUMA MARCA PUBLICA ─
        // ULTENIC 62 dB · FDUXUD 62 dB · POWERFFY 62 dB · B0GWQPCM9G 58 dB · INTETURE 68 dB.
        // SHARK E HOOVER: NADA. CURIOSO QUE A CATEGORIA INTEIRA MEDE RUIDO E NAO MEDE SUCCAO
        // DE FORMA COMPARAVEL — dB TEM NORMA, kPa DE ASPIRADOR NAO TEM METODO PUBLICADO.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: SHARK STRATOS PET PRO (B0F5X43L2H, 441) E SHARK POWERPRO (B0DSQZ6T9M, 689)
        // PARA NAO ENCHER A LISTA COM QUATRO SHARK; MODELOS ACIMA DE £350.
        // DENTRO: 123 A 887 AVALIACOES, NOTA 4.1 A 4.9, £85.99 A £249.00, OITO MARCAS.
        //
        // FOCUS KEYWORD: best cordless vacuum cleaner
        // VARIACOES TRABALHADAS: cordless stick vacuum / stick vacuum cleaner /
        // cordless vacuum for pet hair / lightweight vacuum / battery vacuum cleaner /
        // anti tangle vacuum / cordless hoover / handheld cordless vacuum
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "home", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-cordless-vacuum-cleaner',                            // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Cordless Vacuum Cleaner 2026: 10 Ranked, and Why 55kPa Is Half a Vacuum', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Cordless Vacuum Cleaner 2026: Top 10 Ranked',   // TITLE DA ABA/GOOGLE (48 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best cordless vacuum cleaner options on Amazon against the battery inside them, and found 600W machines that actually draw 254W.', // META DESCRIPTION (147 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best cordless vacuum cleaner',                   // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Atmospheric pressure is 101.325 kilopascals, and a vacuum cleaner cannot pull harder than the gap between that and nothing at all — so 101.325 kPa is the physical ceiling for any machine ever built. Six of these ten advertise 50 or 55 kPa, which is more than half a perfect vacuum from a two-kilogram stick running on batteries. The four made by companies that have been building vacuum cleaners for decades — three Sharks and a Hoover — publish no suction figure at all. One listing settles it by accident. Powerffy, at £99.99, publishes its full ladder: \"three manual modes (18/28/50KPa)\" and \"up to 65 mins in Eco mode (35 mins in Mid, 17 mins in Max)\". So the 50 kPa in its title lasts seventeen minutes, and the 65 minutes in its title happens at 18 kPa. It also publishes the battery — an 8-cell 2500mAh pack, which is 72 watt-hours — and 72 watt-hours over seventeen minutes is 254 watts, against the 600 watts on the box. Meanwhile Hoover, whose name is the British verb for this activity, opens its first bullet with \"200W POWERFUL SUCTION\". We ranked ten of the best cordless vacuum cleaner options on Amazon in August 2026 against the batteries inside them.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO NA ABERTURA
            'conclusion' => "The best cordless vacuum cleaner for your house is not the one with the biggest number, because the two headline numbers on most of these boxes describe two different machines. The wattage and the suction figure are measured on maximum power; the runtime is measured on eco. Put them together and a 600 watt machine claiming seventy minutes is telling you about seventeen minutes at 600 and seventy at a fraction of it, which is why the one brand here that publishes all three modes side by side is the most useful listing on the page. So work backwards from the battery instead: multiply the cell count by 3.6 volts and by the amp-hours to get watt-hours, divide by the runtime you actually want, and you have the real power available. Across this page that sum lands between 66 and 254 watts, which is the same order of magnitude as the 200 watts Hoover publishes and nowhere near the 650 the generics do. After that, two things genuinely differ and both are published honestly. Dust capacity: the four brand-name machines here all hold about 0.7 litres and the generics hold 1.5 to 1.8, which on a whole house is the difference between emptying once and emptying three times. And anti-tangle hardware, which is the feature that decides whether the machine still works in year two if anyone in the house has long hair.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 23:25:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Ultenic U18 Pro Cordless Vacuum Cleaner, 36V, 1.6L, 80 Min Runtime',      // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£139.99',                                                               // PRECO (COLETADO EM 30/08/2026)
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 887,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/714JNcBoj8L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best cordless vacuum cleaner',                                       // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G4VNL2W9?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The deepest review pool here at 887 and the joint-best rating, on the only generic that publishes its battery voltage rather than just a wattage.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Eight hundred and eighty-seven ratings at 4.7 stars is the best combination of depth and average in this comparison, and the hardware justifies it. The U18 Pro is the best cordless vacuum cleaner here for a normal house because of three things that are genuinely measurable: a 1.6 litre dust cup, more than double what any Shark on this page holds; a self-standing design that stays upright when you let go, which sounds trivial until you have propped a stick vacuum against a wall for the fiftieth time; and a folding wand with what Ultenic calls a 3/7 joint, which bends closer to the head than the usual halfway hinge and therefore reaches further under a sofa without you crouching.

It is also the only generic on this page that publishes a battery voltage — 36 volts DC — rather than leaving you with a wattage and no way to check it. The multi-cyclonic separation keeps the HEPA filter cleaner for longer, which is the mechanism that actually preserves suction over months, and the V-shaped anti-tangle roller with anti-static filaments addresses the failure mode that kills these machines in houses with long hair. Sixty-two decibels is quiet for the class.

The headline numbers deserve the usual scepticism. Fifty-five kilopascals is 54% of a perfect vacuum, and the 600 watt motor rating sits against a battery that, on the arithmetic the Powerffy listing at number three makes possible, can sustain roughly 250 watts at best. The 80 minute runtime is an eco-mode figure and Ultenic does not publish the maximum-mode equivalent, which is the one omission that keeps this from being the honest listing as well as the best-liked one.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['887 ratings at 4.7, the best depth-and-average combination here', '1.6 litre dust cup, more than double any Shark on this page', 'The only generic that publishes a battery voltage, at 36V DC', 'Self-standing, and a 3/7 folding wand that reaches further under furniture', 'Multi-cyclonic separation keeps the HEPA filter clean, preserving suction'], // PONTOS POSITIVOS
                'contras' => ['Claims 55 kPa, which is 54% of a perfect vacuum', '600W rating against a battery that can sustain roughly 250W', 'Publishes only the eco runtime, not the maximum-mode figure', '£139.99 is dear for a generic against the £99 Hoover'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Hoover HF1Max Pet Cordless Vacuum Cleaner, 200W, 3 Speeds, 50 Min',       // NOME (ENCURTADO)
                'price' => '£99.00',                                                                // PRECO
                'rating' => 4.1,                                                                    // NOTA
                'reviews_count' => 542,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Lqsree5-L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Hoover HF1Max Pet cordless stick vacuum cleaner in black',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GQYM1LRD?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Opens its first bullet with "200W POWERFUL SUCTION" — the only wattage on this page in the same order of magnitude as what a battery can actually deliver.', // TEXTO CURTO (CARD)
                'body' => "Two hundred watts. That is the first number in the first bullet of this listing, from the company whose name became the British verb for vacuuming and which has been making these since 1908. Every generic on this page claims 600 or 650 watts at a similar or lower price. The Powerffy listing at number three lets you check who is right: it publishes an 8-cell 2500mAh battery, which is 72 watt-hours, and a maximum-mode runtime of 17 minutes, which works out at 254 watts of actual draw. Two hundred watts is the same order of magnitude as physics allows. Six hundred is not.

For £99 the specification is honest and sufficient. Three genuine speed modes — eco, standard and turbo — a detachable battery you can charge on or off the machine, a 50 minute runtime, an anti-hair-wrap nozzle, LED headlights, double-edge cleaning that reaches along skirting boards, and a park-anywhere upright stand. The 0.7 litre bin is the standard brand-name size and small next to the generics.

Four point one stars from 542 ratings is the lowest average in this comparison and it is the honest reason this is second rather than first. Hoover has had a difficult decade in cordless, and the critical reviews cluster on build plastics and battery life over time rather than on suction. Buy it because the numbers on the page are real and the brand is serviceable in Britain; do not buy it expecting Shark's construction.", // TEXTO SEO LONGO
                'pros' => ['Publishes 200W, the only credible wattage figure on this page', 'Three real speed modes with a detachable, separately chargeable battery', 'Anti-hair-wrap nozzle and double-edge cleaning for skirting boards', '£99.00 from a brand with UK service and spare parts', 'Park-anywhere upright stand and LED headlights'], // PONTOS POSITIVOS
                'contras' => ['4.1 stars, the lowest average in this comparison', 'Reviews cluster on build plastics and long-term battery life', '0.7 litre bin against 1.5-1.8 litres on the generics', 'Publishes no suction figure at all, so nothing to compare on'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Powerffy Cordless Vacuum Cleaner, 18/28/50kPa, 65/35/17 Min, 1.5L',       // NOME (ENCURTADO)
                'price' => '£99.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 256,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71uqC5qweQL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Powerffy purple cordless stick vacuum with internal dust scraper',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GS5YJ1NL?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing in the search that publishes suction and runtime for all three modes — which is what proves the headline pairs a max figure with an eco one.', // TEXTO CURTO (CARD)
                'body' => "This is the most useful listing on the page and it did not mean to be. Powerffy publishes what everyone else hides: \"three manual modes (18/28/50KPa)\" and \"up to 65 mins in Eco mode (35 mins in Mid, 17 mins in Max)\". Line those up and the marketing collapses honestly. The 50 kilopascals in the title is the Max figure and it lasts seventeen minutes. The 65 minutes in the title is the Eco figure and it happens at 18 kilopascals. Neither is a lie; together in a title they describe a machine that does not exist.

It goes further and publishes the battery: \"high-density 8-cell 2500mAh system\". Eight cells in series at 3.6 volts is 28.8 volts, and 28.8 volts times 2.5 amp-hours is 72 watt-hours. Seventy-two watt-hours over seventeen minutes is 254 watts of real draw at maximum, against the 600 watts advertised. Every other generic on this page has the same class of battery and the same physics; this is simply the one that gave you the numbers to work it out.

As a product at £99.99 it is well judged: a 1.5 litre bin, an internal ring scraper that strips hair off the filter at the press of a button rather than by hand, a one-metre hose for cars and ceilings, self-standing, and 62 decibels. Two hundred and fifty-six ratings at 4.5 stars is a mid-sized but healthy sample. The specification field, less impressively, opens with the company's support email address.", // TEXTO SEO LONGO
                'pros' => ['Publishes suction and runtime for all three modes, uniquely here', 'Publishes its 8-cell 2500mAh battery so the real draw can be calculated', '1.5 litre bin and an internal scraper that cleans the filter by button', 'One-metre hose, self-standing, 62dB, for £99.99', '4.5 stars from 256 ratings'], // PONTOS POSITIVOS
                'contras' => ['Title pairs the Max suction with the Eco runtime, as the rest do', '600W advertised against about 254W the battery can actually sustain', '50 kPa is 49% of a perfect vacuum and lasts 17 minutes', 'Support email address published inside the special features field'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Shark Stratos Cordless Stick Vacuum Pet Pro, Anti Hair Wrap Plus',        // NOME (ENCURTADO)
                'price' => '£249.00',                                                               // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 722,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61kL5SbutML._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Shark Stratos cordless stick vacuum cleaner in charcoal and brass',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B42QJL5B?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Publishes no suction number and no wattage — and states its runtime with the mode and the tool attached, which is the most complete disclosure in the search.', // TEXTO CURTO (CARD)
                'body' => "\"Enjoy up to 60 minutes run-time* and charge the removable battery on or off the vacuum (*In ECO power mode, with non-motorised tool).\" That footnote is the most honest sentence collected across this entire category. Every generic on this page publishes a runtime; this is the only listing that tells you both the power mode and the attachment it was measured with, which are the two variables that change the answer most. Shark publishes no kilopascal figure and no wattage anywhere, which in a search full of 55 kPa claims reads as a company declining to join in.

What £249 buys instead is engineering you can see. Anti Hair Wrap Plus actively strips hair off the brush-roll while you clean rather than asking you to cut it off with scissors, which is the single biggest long-term failure mode in a house with pets or long hair. Clean Sense IQ senses dirt and raises power automatically, so the machine spends most of its life in a lower mode and the battery lasts. The DuoClean floorhead runs two motorised brush-rolls at once for carpet and hard floor together. Five-year guarantee, two years on the battery.

Two real caveats. At £249 it is two and a half times the Hoover, and the 0.7 litre dust cup is the smallest class on this page — a third of what the £99.99 Powerffy holds, so you will empty it three times where the generic empties once. Four point three stars from 722 ratings is solid rather than outstanding for the money.", // TEXTO SEO LONGO
                'pros' => ['States its runtime with both the power mode and the tool used', 'Publishes no invented kPa or wattage figure at all', 'Anti Hair Wrap Plus strips hair off the roller as you clean', 'Clean Sense IQ raises power only when it detects dirt, preserving battery', 'Five-year guarantee, two years on the battery'], // PONTOS POSITIVOS
                'contras' => ['£249.00, two and a half times the Hoover at number two', '0.7 litre bin, a third of the capacity of the £99.99 Powerffy', '4.3 stars is mid-table for the most expensive machine here', 'Nothing published to compare suction against rivals'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'FDUXUD Cordless Vacuum Cleaner, 70 Min Eco / 25 Min Max, 1.8L, OLED',     // NOME (ENCURTADO)
                'price' => '£119.99',                                                               // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 824,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71ui53zH+hL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'FDUXUD purple cordless stick vacuum with OLED touchscreen',          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GK6Q2WC4?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Publishes both runtimes honestly — 70 minutes eco, 25 minutes max — on a page that gives four different numbers for its own motor and suction.', // TEXTO CURTO (CARD)
                'body' => "Eight hundred and twenty-four ratings at 4.7 stars is the joint-best average here on the second deepest sample, and the second bullet does something rare: \"70 minutes of battery life at its lowest power setting, perfect for everyday whole-house cleaning (high suction mode: 25 minutes)\". Both ends of the range, in one sentence, with the conditions named. Combined with the published 8x2500mAh battery — 72 watt-hours — that gives a genuine maximum draw of about 173 watts, and it makes this one of only three listings on the page you can actually audit.

The hardware is generous for £119.99: a 1.8 litre dust cup, the joint largest here and two and a half times any Shark; an eight-layer filtration system down to 0.3 microns; a V-shaped anti-tangle roller; an OLED touchscreen; a telescopic tube; and a genuinely useful \"Hurricane\" boost mode for one-off heavy patches. Sixty-two decibels.

The listing cannot agree with itself on the two numbers it leads with. The title says 600W and 50kPa. The first bullet says 600W and 50kPa. The Special Feature field says \"Upgraded 650W Motor\" and \"55kPa Cyclone Suction Power\". Four figures for two specifications, on one page, and no indication which describes the machine in the box. Given that both pairs are inflated against the 173 watts the battery supports, the discrepancy matters less than the habit it reveals — but a buyer filtering on wattage is being shown two different products.", // TEXTO SEO LONGO
                'pros' => ['Publishes both the 70-minute eco and 25-minute max runtimes', 'Publishes its 8x2500mAh battery, so the real draw can be checked', '1.8 litre dust cup, joint largest here and 2.5x any Shark', '824 ratings at 4.7, joint-best average in this comparison', 'OLED touchscreen, telescopic tube and 8-layer filtration for £119.99'], // PONTOS POSITIVOS
                'contras' => ['Title says 600W/50kPa while the spec field says 650W/55kPa', 'Four different figures for two specifications on one page', 'Both wattage claims exceed the ~173W the battery can sustain', 'Battery takes 4-5 hours to recharge'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Shark PowerProPet Cordless Stick Vacuum, Reveal Technology, IZ381UKT',    // NOME (ENCURTADO)
                'price' => '£189.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 689,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51c-en+EGNL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Shark PowerProPet cordless stick vacuum in electric blue',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GX7C5FGG?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'FloorDetect changes power automatically between carpet and hard floor, and Reveal lights up dirt you cannot see. No invented numbers anywhere.', // TEXTO CURTO (CARD)
                'body' => "Two features here are worth the premium over a generic and neither is a number. FloorDetect senses whether it is on carpet or hard floor and adjusts power without being told, which matters because the single biggest waste of battery in a cordless vacuum is running carpet power across a kitchen. Reveal Technology throws a low-angle light across the floor that shows up fine dust and dried pet accidents you would otherwise walk past — it sounds like a gimmick and it is the feature owners mention most.

Six hundred and eighty-nine ratings at 4.5 stars is a strong sample, Flexology bends the wand to reach under furniture and folds it for storage, and the five-year guarantee is the longest on this page along with the other Sharks. The pet accessory set is included rather than sold separately.

As with every Shark here, no suction figure and no wattage are published anywhere, which is a deliberate absence rather than an oversight. The special features field mentions a 50-minute runtime without stating the mode, which is less complete than the Stratos above it. And the 0.7 litre dust cup is the recurring brand-name limitation: at £189.99 you are getting a bin under half the size of a £99.99 Powerffy's. For a flat that is irrelevant; for a four-bedroom house with a dog it means two trips to the bin per clean.", // TEXTO SEO LONGO
                'pros' => ['FloorDetect adjusts power automatically between carpet and hard floor', 'Reveal Technology lights up fine dust and dried accidents you cannot see', '689 ratings at 4.5 stars with a five-year guarantee', 'Flexology bends to reach under furniture and folds for storage', 'Pet tool set included rather than sold separately'], // PONTOS POSITIVOS
                'contras' => ['0.7 litre bin at £189.99, under half the £99.99 Powerffy\'s', 'States a 50-minute runtime without naming the power mode', 'No suction or wattage figure published anywhere', 'Only two power levels against three on cheaper rivals'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'INTETURE Cordless Vacuum Cleaner, 1.8L, 70 Min Eco, Wall Mount, 4 Modes', // NOME (ENCURTADO)
                'price' => '£109.99',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 818,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81KngZPgYgL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'INTETURE grey cordless stick vacuum with wall mounted charging dock', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FVSVBX6L?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Four power modes including a genuine auto mode, a 1.8L bin and a three-year plan for £109.99 — with Thanksgiving listed among its technical features.', // TEXTO CURTO (CARD)
                'body' => "Eight hundred and eighteen ratings at 4.4 stars is the third deepest sample here, and the specification is strong for £109.99. Four modes rather than the usual three, including an AUTO setting that raises suction when the head crosses onto carpet, which is the same idea as Shark's FloorDetect at £80 less. A 1.8 litre dust cup, joint largest on this page. A wall-mounted dock that charges the machine without plugging anything in. And a green LED in the floorhead rather than white, which genuinely shows up dust better against a dark floor because of how the light rakes across it.

The support offer is unusually generous: a three-year protection plan, 30-day returns and 24/7 contact, from a brand with no UK history. Sixty-eight decibels is the loudest machine in this comparison by six decibels, which on a logarithmic scale is a noticeable difference.

Two things pull it down. The 650 watt motor and 55 kilopascal suction are the standard inflated pair, and unlike FDUXUD or Powerffy this listing publishes only the eco runtime — \"up to 70 minutes in energy-saving ECO mode\" — with no maximum-mode figure to check it against. And the Special Feature field, which exists to hold technical specifications, contains: \"★A Great Gift for Christmas★Mother's Day★Father's Day★Birthday★Thanksgiving Day\". Thanksgiving is not a British holiday, and none of those are features.", // TEXTO SEO LONGO
                'pros' => ['Four modes including an auto setting that detects carpet, unusual at £109.99', '1.8 litre dust cup, joint largest in this comparison', '818 ratings at 4.4 with a three-year protection plan', 'Wall-mounted dock charges without plugging the machine in', 'Green LED floorhead shows dust better than white against dark floors'], // PONTOS POSITIVOS
                'contras' => ['68dB, the loudest machine in this comparison by six decibels', 'Publishes only the eco runtime, with no maximum-mode figure', '650W and 55kPa are the standard inflated pair', 'Special Feature field lists Christmas, Mother\'s Day and Thanksgiving'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Shark Freestyle Max Cordless Upright Vacuum, 3.2kg, 5 Year Guarantee',    // NOME (ENCURTADO)
                'price' => '£109.99',                                                               // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 342,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51rBuHHLfAL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Shark Freestyle Max cordless upright vacuum cleaner in beige',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FN8C6GJY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only machine here that publishes all three dimensions and its weight — and the cheapest way to a five-year Shark guarantee.', // TEXTO CURTO (CARD)
                'body' => "One hundred and nine pounds ninety-nine is the cheapest route to a Shark with a five-year guarantee, and the final bullet contains something no other listing on this page manages: \"Dimensions: H: 114cm, W:25cm, L:26cm, Weight: 3.2kg\". Height, width, length and mass, all four, in one sentence. Nine other listings leave you guessing whether the thing fits in your cupboard.

It is a simpler machine than the Stratos and honest about it. Two speeds rather than four, washable filters rather than HEPA, a hands-free dust cup that empties at the touch of a button without you putting a hand near it, and a charging dock included. Shark's pitch is anti-clog reliability rather than features, and for a small flat or a second machine for upstairs that is a reasonable proposition at this money.

Three limitations. Three point two kilograms is the heaviest machine in this comparison, which for a stick vacuum you hold at arm's length to do stairs is the wrong end of the scale — the Ultenic and the generics sit closer to 3. The 0.69 litre dust cup is the smallest here outright. And 342 ratings at 4.3 stars is the thinnest sample of the three Sharks. Like its siblings it publishes no suction figure and no wattage, which remains the right call editorially even though it leaves nothing to compare.", // TEXTO SEO LONGO
                'pros' => ['The only listing here publishing all three dimensions and the weight', 'Cheapest route to a five-year Shark guarantee at £109.99', 'Hands-free dust cup empties at a button press', 'Charging dock included, and washable filters', 'Anti-clog design aimed at long-term reliability rather than features'], // PONTOS POSITIVOS
                'contras' => ['3.2kg, the heaviest machine in this comparison', '0.69 litre dust cup, the smallest here outright', 'Only two speeds, against three or four on cheaper rivals', '342 ratings, the thinnest sample of the three Sharks'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Cordless Vacuum Cleaner 6x4200mAh, 80 Min Eco / 30 Min Max, 1.8L, 58dB',  // NOME (ENCURTADO)
                'price' => '£169.99',                                                               // PRECO
                'rating' => 4.9,                                                                    // NOTA
                'reviews_count' => 123,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71hNB8ZvPoL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Gold cordless stick vacuum cleaner with smart LED display',          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GWQPCM9G?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The quietest machine here at 58dB and the biggest battery at 6x4200mAh — which is also the number that shows the 650W claim is 3.6 times too high.', // TEXTO CURTO (CARD)
                'body' => "Two published numbers make this listing worth reading. The first is noise: 58 decibels is the quietest in this comparison by four, and on a logarithmic scale that is a real difference in a flat. The second is the battery: \"a 6*4200mAh removable battery\", which is six cells at 4.2 amp-hours. Six cells in series at 3.6 volts is 21.6 volts, and 21.6 times 4.2 is 90.7 watt-hours — the largest energy store on this page.

It also publishes both runtimes: \"up to 80 mins of fade-free runtime (30 mins in Max mode)\". Divide 90.7 watt-hours by half an hour and the maximum real draw is 181 watts; divide by 80 minutes and eco mode is 68 watts. The listing advertises 650 watts, which is 3.6 times what its own published battery can sustain. As with the Powerffy, the arithmetic is only possible because the seller was generous with the specification.

For the money the rest is good: a 1.8 litre dust cup, an auto mode that detects floor type, a one-metre hose for cars and ceilings, eight-layer filtration and a 3 kilogram body with full dimensions published. What holds it back is evidence and price. One hundred and twenty-three ratings is the thinnest sample here, a 4.9 average on that few is not yet settled, and £169.99 is £70 more than the Powerffy and £30 more than the far better-evidenced Ultenic for no advantage the numbers can demonstrate.", // TEXTO SEO LONGO
                'pros' => ['58dB, the quietest machine in this comparison by four decibels', 'Largest battery here at 6x4200mAh, roughly 90 watt-hours', 'Publishes both the 80-minute eco and 30-minute max runtimes', '1.8 litre bin, auto floor detection and a one-metre hose', 'Full dimensions and 3kg weight published'], // PONTOS POSITIVOS
                'contras' => ['123 ratings, the thinnest sample in this comparison', '650W claimed against about 181W its own battery can sustain', '£169.99 is £30 more than the Ultenic with a seventh of the reviews', '55 kPa is 54% of a perfect vacuum'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'VACTechPro F02 Ultra Cordless Vacuum Cleaner, 1.5L, 70 Min, 3.8kg',       // NOME (ENCURTADO)
                'price' => '£85.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 215,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61lKZc+g0IL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'VACTechPro F02 Ultra red cordless stick vacuum cleaner',             // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0H2JD9BF6?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest machine here at £85.99, on a listing whose bullet heading says 600W and whose bullet text says 550W.', // TEXTO CURTO (CARD)
                'body' => "Eighty-five pounds ninety-nine is the lowest price in this comparison and the specification is competitive for it: a 1.5 litre dust cup, more than double any Shark here; an eight-layer filtration system with multivortex separation; a V-shaped anti-tangle brush with a comb structure; and an LED touchscreen with nine monitoring alerts including charging errors and temperature warnings, which is more diagnostic feedback than machines at three times the price offer.

The problem is that the listing cannot state its own motor power consistently, and the two figures are eight words apart. The bullet heading reads \"【600W HyperCore Pro Brushless Motor System】\". The sentence immediately beneath it reads \"equipped with an advanced HyperCore Pro 550W brushless motor system\". The product title says 600W. Three statements, two numbers, one bullet. It is the same habit found on the Bosch stand mixer that opened with \"COMPACT 700W\" and described \"a powerful 900W motor\" in the same sentence, and on the vibration plate whose heading said 2200W above a body describing an 1800W-2200W element.

Neither figure survives contact with the battery anyway — this is the same cell class as the Powerffy, which sustains about 254 watts at maximum. Four point three stars from 215 ratings is a reasonable but modest sample, and at 3.8 kilograms this is the heaviest machine on the page, which for a stick vacuum used above shoulder height is the specification that will actually annoy you.", // TEXTO SEO LONGO
                'pros' => ['Cheapest machine in this comparison at £85.99', '1.5 litre dust cup, more than double any Shark on this page', 'Nine monitoring alerts including charging and temperature warnings', 'Eight-layer filtration with multivortex separation', 'V-shaped anti-tangle brush with a comb structure'], // PONTOS POSITIVOS
                'contras' => ['Bullet heading says 600W, its own text says 550W, title says 600W', '3.8kg, the heaviest machine in this comparison', 'Neither wattage figure is supported by this class of battery', '215 ratings and no published runtime breakdown by mode'], // PONTOS NEGATIVOS
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
        $this->command?->info("CordlessVacuumsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
