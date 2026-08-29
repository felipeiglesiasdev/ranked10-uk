<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class SolarSecurityLightsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE LUZES DE SEGURANCA SOLARES DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=solar+security+light+outdoor&rh=p_36%3A1500-  (57 ASINS EM 58 CARDS)
        // CATEGORIA GARDEN. SAZONAL: PICO DE OUTUBRO A JANEIRO (ANOITECER AS 16h NO REINO UNIDO).
        //
        // PROFUNDIDADE DE AVALIACAO CONFERIDA ANTES DE ESCOLHER A CATEGORIA:
        // 954 / 952 / 930 / 791 / 761 / 718 / 594 / 520 / 438 / 428 / 414 / 398 NA PRIMEIRA
        // PAGINA. PASSA COM FOLGA NO CRITERIO QUE REPROVOU ADEGA E AQUECEDOR DE PATIO
        // (AQUECEDOR DE PATIO FOI TESTADO NO MESMO DIA E TINHA SO 2 ANUNCIOS ACIMA DE 500).
        //
        // ─── ACHADO PRINCIPAL: O LUMEN NAO CABE NA BATERIA ───
        // 1. TRES ANUNCIOS PUBLICAM A CAPACIDADE DA BATERIA. COM ELA A CONTA FECHA SOZINHA,
        //    PORQUE ENERGIA ARMAZENADA = mAh × TENSAO, E LUZ CUSTA WATT.
        //      GEARLITE ... 2500 mAh (9,25 Wh) E ANUNCIA "3500LM" POR "15 HOURS"
        //      K KASONIC . 2200 mAh (8,14 Wh) E ANUNCIA "2500LM" COM MODO FIXO DE "4 HOURS"
        //      PHILIPS .... 1800 mAh (6,66 Wh) E ANUNCIA 1200 lm
        //      CZHHMART ... 1200 mAh (4,44 Wh) E ANUNCIA "8-12 HOURS" COM 248 LEDs
        //    3500 lm, MESMO A 150 lm/W (GENEROSO PARA LED BARATO), PEDEM 23,3 W. QUINZE HORAS
        //    DISSO SAO 350 Wh. A BATERIA GUARDA 9,25 Wh — 38 VEZES MENOS. OS MESMOS 9,25 Wh
        //    SUSTENTAM 23,3 W POR 24 MINUTOS. PARA DURAR AS 15 HORAS PROMETIDAS A LUMINARIA
        //    PODE GASTAR 0,62 W, QUE SAO CERCA DE 92 lm — 2,6% DO NUMERO DO TITULO.
        //    A K KASONIC TEM O MESMO PROBLEMA EM ESCALA MENOR: 2500 lm POR 4 HORAS PEDEM
        //    66,8 Wh DE UMA BATERIA DE 8,14 Wh (8,2x).
        // 2. A PHILIPS E A UNICA CUJA CONTA FECHA — E FECHA PORQUE ELA DIZ O QUE OMITE.
        //    O BULLET DECLARA OS TRES MODOS COM O PERCENTUAL: 100% POR 25 SEGUNDOS,
        //    10% POR 8-10 HORAS, OU 3% FIXO. 1200 lm A 10% SAO 0,8 W; 6,66 Wh ÷ 0,8 W =
        //    8,3 HORAS, EXATAMENTE A JANELA QUE ELA PROMETE. TODO O RESTO DA CATEGORIA
        //    ANUNCIA A NOITE INTEIRA NO BRILHO MAXIMO, QUE E O QUE NAO CABE.
        //
        // ─── ACHADO SECUNDARIO: LED NAO E LUMEN ───
        // 3. O NUMERO DE LEDs VIROU O ARGUMENTO DE VENDA E NAO MEDE NADA. RENDIMENTO
        //    DECLARADO, lm POR LED:
        //      PHILIPS .... 302 LEDs → 1200 lm = 3,97
        //      CLAONER .... 286 LEDs → 2500 lm = 8,74
        //      K KASONIC .. 286 LEDs → 2500 lm = 8,74  (MESMO PAR DA CLAONER)
        //      TECKNET .... 416 LEDs → 4200 lm = 10,10
        //      INTELAMP ... 108 LEDs → 1200 lm = 11,11
        //      MINPEA / CZHHMART: PUBLICAM O LED E NENHUM LUMEN
        //      GEARLITE / KOLPOP / VIGHEP: PUBLICAM LUMEN SEM LED, OU NADA
        //    A PHILIPS, UNICA COM LABORATORIO FOTOMETRICO, DECLARA O PIOR RENDIMENTO POR LED
        //    DA LISTA. A INTELAMP TIRA O MESMO 1200 lm DE 108 LEDs — 35% DOS CHIPS.
        //    A GEARLITE ESCREVE O CONTRA-ARGUMENTO NO PROPRIO ANUNCIO: "Unlike many other
        //    solar lights that rely on a larger number of LEDs, our design features a convex
        //    lens... delivering greater brightness while using fewer LEDs". ELA ESTA CERTA.
        //
        // ─── ACHADO 3: AREA COBERTA ANDA AO CONTRARIO DO LUMEN ───
        // 4. MINPEA ..... 226 LEDs, SEM LUMEN, 180° ....... 30 m²
        //    TECKNET .... 416 LEDs, 4200 lm, 300° ........ "376 ft2" = 34,9 m²
        //    INTELAMP ... 108 LEDs, 1200 lm, 270° ........ 70 m²
        //    K KASONIC .. 286 LEDs, 2500 lm .............. "1615 sq ft/150 m2"
        //    A LUMINARIA QUE ANUNCIA O MAIOR LUMEN DA LISTA ANUNCIA A MENOR AREA. A K KASONIC
        //    RECLAMA 4,3x A AREA DA TECKNET COM 60% DO LUMEN.
        //
        // ─── ACHADO 4: 27% DE CONVERSAO E O RECORDE MUNDIAL DE LABORATORIO ───
        // 5. TAXAS DE CONVERSAO PUBLICADAS: TECKNET 27% ("7% above average"), GEARLITE 27%,
        //    VIGHEP 22%, CZHHMART 22%, MINPEA 22%, KOLPOP 22%, K KASONIC 21%.
        //    MODULO MONOCRISTALINO COMERCIAL RODA ENTRE 20% E 23%; POLICRISTALINO, 15% A 18%;
        //    E O RECORDE DE LABORATORIO PARA CELULA DE SILICIO DE JUNCAO UNICA FICA PERTO DE
        //    27%. OU SEJA: DOIS ANUNCIOS DE MENOS DE £26 DECLARAM O RECORDE MUNDIAL, E A
        //    K KASONIC DECLARA 21% NUM PAINEL QUE ELA MESMA CHAMA DE POLICRISTALINO — ACIMA
        //    DO QUE POLICRISTALINO ATINGE. A PHILIPS NOMEIA O PAINEL (POLICRISTALINO) E NAO
        //    PUBLICA PERCENTUAL NENHUM.
        // 6. A GEARLITE E A UNICA QUE PUBLICA O TAMANHO DO PAINEL: 15,5 × 9 cm = 139,5 cm².
        //    A 27% E COM SOL DE PICO (1000 W/m²) ISSO DA 3,77 W. CARREGAR 9,25 Wh EXIGE
        //    2,5 HORAS DE SOL DE MEIO-DIA — E ELA PROMETE CARGA CHEIA "in just 3 hours".
        //    A PROMESSA SO FECHA SE O SOL DE MEIO-DIA DURAR TRES HORAS SEGUIDAS.
        //
        // ─── ACHADO 5: ALCANCE DO PIR ───
        // 7. GEARLITE 60 Ft (18,3 m) · PHILIPS 15 m · K KASONIC 25FT (7,6 m) · TECKNET 20ft
        //    (6,1 m) · MINPEA 10-17 FT (3-5,2 m). A GEARLITE DECLARA 3,5x A MEDIANA E 22%
        //    MAIS QUE A PHILIPS, QUE CUSTA £9 A MAIS. SENSOR PIR DESSA CLASSE FICA ENTRE
        //    8 E 12 m.
        //
        // ─── ACHADO 6: LIXO DE TRADUCAO E DE UNIDADE ───
        // 8. A CZHHMART DEIXOU ESPANHOL DENTRO DO BULLET EM INGLES: "Features a Panel solar
        //    de 22% de eficiencia y sensor de movimiento para mayor seguridad y ahorro
        //    energetico". ANUNCIO BRITANICO, TEXTO EM INGLES, FRASE EM ESPANHOL NO MEIO.
        // 9. A VIGHEP PROMETE "save hundreds of DOLLARS a year on electricity bills" NUMA
        //    LOJA BRITANICA, PARA UM APARELHO QUE CONSOME MENOS DE 1 W. MESMO A 1 W POR
        //    10 HORAS TODA NOITE SAO 3,65 kWh/ANO, OU CERCA DE 90 PENCE.
        // 10. IMPERIAL EM LOJA BRITANICA, EM SEIS DOS DEZ: "376 ft2" (TECKNET), "40 sq in"
        //    DE PAINEL (INTELAMP), "1615 sq ft/150 m2" E "25FT/7.6M" (K KASONIC),
        //    "10-17 FT" E "16.5Ft/5M" (MINPEA), "60Ft" (GEARLITE).
        //
        // ─── ASIN DUPLICADO ───
        // PHILIPS: B0F4KBS76R (£26.99) E B0F4KBNYVS (£46.99) — MESMO TITULO, AS MESMAS 718
        // AVALIACOES, £20 DE DIFERENCA. E B0F4KLJ12Q (£18.99) COM B0F4KN1LCR (£27.99) —
        // AS MESMAS 398. MANTIDO O MAIS BARATO DE CADA PAR, COMO SEMPRE.
        // CLAONER (930 AVALIACOES) E K KASONIC (520) NAO DIVIDEM POOL, MAS PUBLICAM O MESMO
        // PAR EXATO — 286 LEDs E 2500LM — A £29.99 E £16.99. MESMA FABRICA, DUAS ETIQUETAS.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: OS DOIS ASINS PHILIPS MAIS CAROS DOS PARES DUPLICADOS; TUDO ABAIXO DE 400
        // AVALIACOES; OS ANUNCIOS DE "DUMMY CAMERA" (CHIPARK), QUE VENDEM CAMERA FALSA COMO
        // RECURSO DE SEGURANCA. DENTRO: 414 A 954 AVALIACOES, NOTA DE 4.2 A 4.5, PRECO DE
        // £9.99 A £33.83, DEZ MARCAS DIFERENTES.
        //
        // FOCUS KEYWORD: best solar security lights
        // VARIACOES TRABALHADAS: solar security light / solar motion sensor lights outdoor /
        // solar floodlight / outdoor security light solar powered / PIR solar light /
        // solar wall lights outdoor / motion sensor security light / solar powered security
        // light / solar lights outdoor garden
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'garden',                     // SLUG DA CATEGORIA (URL)
            'name' => 'Garden',                     // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best garden tools and outdoor equipment available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-solar-security-lights',                              // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Solar Security Lights 2026: 10 Ranked, and Why 3500 Lumens Lasts 24 Minutes', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Solar Security Lights 2026: Top 10 Ranked',     // TITLE DA ABA/GOOGLE (47 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best solar security lights on Amazon by checking every lumen and runtime claim against the battery each seller publishes, from £9.99 to £33.83.', // META DESCRIPTION (159 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best solar security lights',                      // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Three of these listings publish the size of their battery, and that single number settles the whole category. GEARLITE sells a solar floodlight advertised as \"3500LM\" running for \"15 hours\", and states on the same page that it holds 2,500mAh — which is 9.25 watt-hours. Producing 3,500 lumens takes about 23 watts even from efficient chips, so fifteen hours of it needs 350 watt-hours. The battery holds thirty-eight times less than the claim requires; those 9.25 watt-hours actually run a 23 watt load for about twenty-four minutes. Meanwhile Philips, whose light is the only one on this page whose arithmetic closes, gets there by admitting what everyone else hides: its all-night mode runs at 10% brightness, and 1,200 lumens at 10% is 0.8 watts, which its 1,800mAh cell sustains for the 8 to 10 hours the listing promises. We ranked ten of the best solar security lights on Amazon in August 2026 on the light they can actually deliver until dawn, and flagged the seven listings whose headline number the battery cannot pay for.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO ARITMETICO NA ABERTURA
            'conclusion' => "The best solar security lights are chosen on two numbers that sellers rarely print together: the battery in milliamp-hours and the brightness in lumens. Multiply the milliamp-hours by 3.7 to get watt-hours, divide by the lumens over roughly 150, and you have the honest runtime at full brightness — for every light here it lands between twenty minutes and an hour. That is not a defect, because a motion sensor light is meant to fire in bursts; it is only a problem when the listing sells you a night of daylight instead. By contrast, LED count tells you nothing at all: Philips draws 1,200 lumens from 302 chips and intelamp draws the same 1,200 from 108, which means the number in the title measures how many were fitted, not how much light comes out. Crucially, watch the panel too — a solar powered security light lives on what its panel harvests in a British November, and only one of these ten publishes the panel size at all. So buy for a bright thirty-second burst on motion, a sensor range you can verify, and a panel you can angle at the low winter sun, and treat any promise of all-night full brightness as the arithmetic error it is.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 18:40:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Philips Solar Security Light, 302 LEDs, 1200lm, 3 Heads, PIR Sensor, IP65', // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£26.99',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 718,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81gRg4dtWSL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best solar security lights',                                         // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F4KBS76R?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing here whose runtime, battery and brightness agree with each other, because Philips publishes the percentage each mode actually runs at.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "This is the one solar security light on the page where you can check the promise against the hardware and watch it close. Philips publishes an 1,800mAh battery, which stores 6.66 watt-hours, and 1,200 lumens across 302 LEDs. Then it does the thing nobody else does: it states the brightness of each mode as a percentage. Motion-triggered full output lasts 25 seconds. The all-night mode runs at 10%, which is roughly 0.8 watts, and 6.66 watt-hours divided by 0.8 watts is 8.3 hours — precisely the \"8 to 10 hours\" the bullet claims. A third mode idles at 3% and jumps to full on motion.

Nothing else is remarkable, and that is the point. The sensor reaches 15 metres across a 180 degree arc, which is the longest verified range here and more than double what TECKNET and K KASONIC claim in feet. The three heads rotate 130 degrees, the colour temperature is a cold 7000K, and the panel is named honestly as polycrystalline with no conversion percentage attached — while two rivals under £26 claim 27%, which is the laboratory world record for a silicon cell.

Two cautions. At 4.2 stars it has the joint-lowest average in this comparison, and 302 LEDs producing 1,200 lumens works out at 3.97 lumens per chip, the worst ratio on the page — intelamp gets the same 1,200 from 108 LEDs. The chips are small and there are lots of them. Philips also sells this exact light twice: ASIN B0F4KBNYVS carries the same title and the same 718 ratings at £46.99. We have linked the £26.99 listing.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Publishes battery, LED count and the percentage each mode runs at', 'Runtime claim of 8-10 hours reconciles exactly with its 1,800mAh cell', '15 metre sensor range, the longest verified figure here', 'Names its panel type instead of claiming a record conversion rate', '718 ratings behind a real lighting brand'], // PONTOS POSITIVOS
                'contras' => ['4.2 stars, the joint-lowest average in this comparison', '3.97 lumens per LED, the worst ratio of any light here', 'Sold under a second ASIN at £46.99 with the same 718 ratings', 'All-night mode is 10% brightness, not the full 1,200 lumens'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'intelamp 3-Head Dual PIR Solar Security Light, 1200LM, LiFePO4, IP65',    // NOME (ENCURTADO)
                'price' => '£33.83',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 761,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71ctpidvdaL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'intelamp three-head solar security light with dual PIR sensors mounted on a wall', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BPRL2J8V?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best hardware here: a lithium iron phosphate cell, the largest panel on the page, and 1200 lumens from only 108 LEDs.', // TEXTO CURTO (CARD)
                'body' => "Two specifications separate this outdoor security light from everything below it, and both are about surviving a British winter. The first is the battery chemistry: lithium iron phosphate rather than the generic lithium-ion everyone else uses. LiFePO4 holds less energy per gram but takes several times more charge cycles and, more importantly here, keeps working when the temperature drops below freezing, which is exactly when a garden light in Manchester is asked to do its job. The second is the panel, quoted at 40 square inches — 258 square centimetres, nearly twice the 139.5 square centimetres of the only rival that publishes a panel size at all.

The light output is modest and honest. One thousand two hundred lumens from 108 LED chips is 11.1 lumens per chip, the best ratio on this page and nearly three times what Philips manages, which tells you these are fewer and larger emitters rather than a wall of tiny ones. Dual PIR sensors cover 180 degrees, the three heads pivot vertically and horizontally, and the listing claims three nights of standby in motion mode — a claim that is at least plausible for a light that only fires for 30 seconds at a time.

The imperial panel measurement is the odd note in a British listing, and it is not the only one: this light also has no published battery capacity, so the three-night claim cannot be checked the way GEARLITE's fifteen-hour claim can. At £33.83 it is also the most expensive light in this comparison, which for one unit rather than a two-pack asks a lot. What you are paying for is a cell that will still be charging in January.", // TEXTO SEO LONGO
                'pros' => ['LiFePO4 battery: far more cycles and works below freezing', 'Largest published panel here at 40 sq in (258 cm²)', '11.1 lumens per LED, the best ratio in this comparison', 'Dual PIR sensors across 180 degrees, not a single sensor', '4.5 stars from 761 ratings'], // PONTOS POSITIVOS
                'contras' => ['Most expensive here at £33.83, and it is a single unit', 'Publishes no battery capacity, so the 3-night claim cannot be checked', 'Panel size given in square inches on a British listing', '1200 lumens is mid-table on paper, even if it is honest'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'TECKNET 416 LED Solar Lights Outdoor Garden, 4200Lm, 300° Angle, IP66, 2 Pack', // NOME (ENCURTADO)
                'price' => '£24.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 954,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/91Smh7VItWL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'TECKNET 416 LED solar motion sensor light with three-sided illumination', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DQTZCHJY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The deepest review pool on the page at 954, an IP66 rating nobody else matches, and a 4200 lumen claim with no battery published to support it.', // TEXTO CURTO (CARD)
                'body' => "Nine hundred and fifty-four ratings at 4.5 stars is the strongest evidence in this comparison, and the hardware backs a good part of it. The IP66 rating is a step above the IP65 that eight of these ten carry, which matters because the difference is between resisting a jet of water and resisting only spray — relevant on a north-facing wall in a Manchester winter. Three-sided illumination across 300 degrees is wider than anything else here, and the 36-month warranty is the longest offered.

The headline is where it comes apart. Four thousand two hundred lumens is the largest claim in this comparison by 20%, and TECKNET publishes no battery capacity anywhere on the listing. Set it against the biggest cell anyone here does publish, GEARLITE's 2,500mAh or 9.25 watt-hours: 4,200 lumens draws roughly 28 watts, so that battery would empty in twenty minutes, against the \"10-12 hours\" this listing promises. Four hundred and sixteen LEDs producing 4,200 lumens is also 10.1 lumens per chip, two and a half times what Philips gets from the same class of emitter.

Two smaller things. The claimed 27% panel conversion, described as \"7% above average\", is the laboratory world record for single-junction silicon — on a £24.99 garden light. And the coverage figure runs backwards against everyone else: this is the brightest claim on the page and it covers \"376 ft2\", which is 34.9 square metres, while K KASONIC claims 150 square metres from 2,500 lumens. The brightest light here claims the smallest patch of ground.", // TEXTO SEO LONGO
                'pros' => ['954 ratings at 4.5, the deepest sample in this comparison', 'IP66, a genuine step above the IP65 most of these carry', '300 degree three-sided coverage, the widest here', 'Two units for £24.99 and a 36-month registered warranty', 'Flexible mounting by screw, tape or hanging'], // PONTOS POSITIVOS
                'contras' => ['4200 lumens claimed with no battery capacity published anywhere', 'Even the largest battery in this category would run that for 20 minutes', '27% panel conversion is the silicon laboratory world record', 'Claims the biggest lumen figure over the smallest area, 376 ft2', 'Coverage area printed in square feet on a UK listing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'CLAONER Solar Lights Outdoor, 286 LED 2500LM, Power Display, 3 Heads, 2 Pack', // NOME (ENCURTADO)
                'price' => '£29.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 930,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Pvn2Oq-iL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'CLAONER solar security light with battery power display and three adjustable heads', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G8JRSLKB?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only light here with a battery charge display on the housing, which is the single most useful feature in a category built on unverifiable runtime claims.', // TEXTO CURTO (CARD)
                'body' => "There is one genuinely good idea in this entire category and CLAONER has it: a real-time battery level indicator built into the housing. Every other listing on this page asks you to believe a runtime figure you have no way to test. This one lets you walk out in December, look at the light, and see whether the panel is keeping up. Coloured mode indicators do the same job for the setting — red for sensor, green for dim-to-bright, blue for constant medium — so you know what the light is doing without cycling through modes in the dark.

The specification is where it gets interesting. Two hundred and eighty-six LEDs producing 2,500 lumens is 8.74 lumens per chip. K KASONIC at number six publishes exactly the same pair — 286 LEDs, 2,500LM — for £16.99, which is £13 less. The two carry separate review pools (930 here against 520 there) so they are not the same listing sold twice, but the identical headline figures point at one factory and two badges. Neither publishes a lumen measurement method, and neither publishes what the 2,500 lumens costs in watts.

Three independently adjustable heads and an IP65 rating are standard for the money. What is not standard is that CLAONER makes no runtime claim at all in its bullets — no \"12 hours\", no \"all night\". Given what the arithmetic does to those claims elsewhere on this page, the silence is arguably the most honest thing on the listing.", // TEXTO SEO LONGO
                'pros' => ['Real battery level display on the housing, unique in this category', 'Coloured mode indicators so you can see the setting at a glance', 'Makes no unsupportable all-night runtime claim in its bullets', '930 ratings, the third deepest sample here', 'Three independently adjustable heads'], // PONTOS POSITIVOS
                'contras' => ['£29.99 for the same 286 LED / 2500LM pair K KASONIC sells at £16.99', 'No battery capacity, panel size or wattage published', '2500 lumens over 286 LEDs with no measurement method stated', '4.3 stars is mid-table for the price'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'vighep Solar Lights Outdoor Motion Sensor, IP65, 3 Modes, 6 Pack',        // NOME (ENCURTADO)
                'price' => '£19.98',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 952,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/811GH259B8L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'vighep compact solar wall lights with motion sensor, six pack',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CNPQSJ6L?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Six lights for £19.98 and 952 ratings behind them, from a listing that publishes no lumen figure, no LED count and no battery.', // TEXTO CURTO (CARD)
                'body' => "Three pounds thirty-three per light is the lowest cost per fitting in this comparison, and 952 ratings at 4.4 stars is the second deepest evidence on the page. For lighting a fence line, a side passage and a bin store at once — the actual job most people buy these for — six small units beat one bright one, because a solar wall light only ever illuminates what it points at. The 10cm body is deliberately small, and the listing is right that a compact unit with a proportionally large panel charges faster relative to what it stores.

What the listing does not do is publish a single measurable number. There is no lumen figure, no LED count, no battery capacity and no panel size. The only quantity in the whole set of bullets is a 22% conversion rate, which is plausible for a monocrystalline cell and unverifiable here. Where the others give you numbers that fail arithmetic, this one gives you nothing to check.

It also contains the strangest line collected across this category: a promise to \"save hundreds of dollars a year on electricity bills\". That is dollars, on a British storefront, for a device that draws well under a watt. Even running a full watt for ten hours every night of the year comes to 3.65 kilowatt-hours, which at current UK rates is about ninety pence. The lights are fine; the copy was written for a different country and a different product.", // TEXTO SEO LONGO
                'pros' => ['Six lights for £19.98, the lowest cost per fitting here', '952 ratings at 4.4, the second deepest sample in this comparison', 'Compact 10cm body with a large panel relative to its draw', 'Six units cover a fence line better than one bright floodlight', 'Three modes including the energy-saving sensor-only setting'], // PONTOS POSITIVOS
                'contras' => ['No lumens, no LED count, no battery capacity, no panel size', 'Promises savings of "hundreds of dollars a year" on a UK listing', 'A device drawing under a watt costs roughly 90p a year to run', 'Small units, so brightness per fitting is low'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'K KASONIC 2500LM Solar Motion Sensor Lights, 2200mAh, 4 Heads, 2 Pack with Remote', // NOME (ENCURTADO)
                'price' => '£16.99',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 520,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71PLVgRkmwL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'K KASONIC four-head solar motion sensor light with remote control',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CQQ9M63X?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The same 286 LED and 2500LM pair as the CLAONER above at £13 less, and one of only three listings honest enough to print its battery size.', // TEXTO CURTO (CARD)
                'body' => "Two things make this worth a place. It undercuts the CLAONER at number four by £13 while publishing an identical headline specification — 286 LEDs, 2,500LM — which is a strong hint that the same factory supplies both. And it publishes its battery: 2,200mAh, a disclosure only three of these ten make. Four adjustable heads and a remote control are more hardware than the price suggests.

Publishing the battery is also what undoes the marketing. Two thousand two hundred milliamp-hours is 8.14 watt-hours. Twenty-five hundred lumens needs roughly 17 watts even from efficient chips, so a full charge sustains full brightness for about twenty-nine minutes. The listing offers a \"permanent on\" mode \"for 4 hours at night\", which would take 67 watt-hours — eight times what the cell holds. Run the sum the other way and four hours of light from 8.14 watt-hours means about 2 watts, or roughly 300 lumens. That is a perfectly usable porch light. It is not 2,500 lumens.

The rest is ordinary and mostly reasonable. The panel is described as polycrystalline with a 21% conversion rate, which is above what polycrystalline silicon actually achieves — 21% is monocrystalline territory, and either the panel or the number is mislabelled. Coverage is quoted as \"1615 sq ft/150 m2\" and detection as \"25FT/7.6M\", both imperial-first on a British listing, though at least the conversions are correct.", // TEXTO SEO LONGO
                'pros' => ['£13 cheaper than the CLAONER with the same 286 LED / 2500LM spec', 'Publishes its battery capacity, which only three listings here do', 'Four adjustable heads plus a remote control at £16.99', '180 degree dual sensors with a 7.6 metre detection range', 'Correct metric conversions alongside the imperial figures'], // PONTOS POSITIVOS
                'contras' => ['2500 lumens from a 2200mAh cell lasts about 29 minutes, not 4 hours', 'The 4-hour mode would need eight times the energy the battery holds', '21% conversion claimed for a panel it calls polycrystalline', '4.2 stars, the joint-lowest average here, from 520 ratings'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'MinPea 226 LED Split Solar Security Lights, 5m Cable, Remote, IP65, 2 Pack', // NOME (ENCURTADO)
                'price' => '£19.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 594,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71n8W4LbILL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'MinPea split solar security light with separate panel and five metre cable', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C338L7WK?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A split design with a 5 metre cable, which solves the real problem with solar security lights: the wall you want lit is rarely the wall that gets sun.', // TEXTO CURTO (CARD)
                'body' => "The split panel is the argument for this one and it is a good argument. Every all-in-one solar floodlight has to be mounted where the sun is, which in a British garden is usually not where the intruder is. Separating the panel from the lamp with five metres of waterproof cable lets you put the light over a north-facing back door and the panel on the sunny gable end. In a country where December daylight in Manchester runs to seven and a half hours and most of it is overcast, that flexibility does more for real-world performance than any lumen figure.

The numbers are thin. Two hundred and twenty-six LEDs are advertised and no lumen figure is published anywhere, so the LED count is doing all the selling. Coverage is stated as 30 square metres, the smallest claim in this comparison — which, sitting next to TECKNET's 4,200 lumens over 34.9 square metres, mostly shows how little these area figures mean. The sensor is the weakest here at 10 to 17 feet, which is 3 to 5.2 metres; Philips reaches 15 metres.

At 4.4 stars from 594 ratings the evidence is solid, and a remote control at £19.99 for two units is generous. Note the listing still describes itself as \"2023's newly upgraded\" and quotes the same 22% conversion rate as three other brands on this page, which suggests the figure comes from a panel supplier's datasheet rather than from anyone's measurement.", // TEXTO SEO LONGO
                'pros' => ['Split panel with 5m cable, so the light and the sun can be in different places', 'The most useful design here for a shaded British back garden', 'Remote control included, two units for £19.99', '4.4 stars from 594 ratings', 'IP65 with a stated 1.8-2.5m installation height'], // PONTOS POSITIVOS
                'contras' => ['226 LEDs advertised and no lumen figure published at all', 'Weakest sensor here at 3-5.2 metres, against 15m for Philips', 'Claims the smallest coverage area of the ten, at 30 m²', 'Bullets still describe it as "2023\'s newly upgraded"'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Kolpop Solar Security Lights with Lens, Split Design, Remote, IP65, 2 Pack', // NOME (ENCURTADO)
                'price' => '£20.96',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 438,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71gCXSkoYzL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Kolpop split solar security light with convex lens and remote control', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F9YQ3S74?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The same split-panel layout as the MinPea above, with a lens instead of a LED count, and not one measurable figure in the entire listing.', // TEXTO CURTO (CARD)
                'body' => "Kolpop builds the same sensible thing as MinPea — panel separated from lamp, five metres of detachable cable, remote control, IP65 — and adds a convex lens to concentrate the beam, which the listing says gives ten metres of throw. Concentrating light with optics rather than adding chips is the correct engineering answer in this category, and it is the same approach GEARLITE uses at number ten. The bullets also include a genuine, useful troubleshooting section explaining why the light will not come on in daylight and how to check the connector alignment, which is more customer support than most of these listings attempt.

What is missing is everything you would measure it by. No lumens. No LED count. No battery capacity. No panel size. The only figure offered is a 22% conversion rate, the same number MinPea, vighep and CZHHMART all quote, and a claim of \"8-12 hours of continuous bright lighting\" attached to an \"extra-large capacity battery\" whose capacity is never stated. Given that the three listings on this page which do state their battery all fail that arithmetic badly, an unstated capacity behind an all-night claim is not reassuring.

At 4.2 stars from 438 ratings it has the shallowest review pool and joint-lowest average in this group, and at £20.96 it costs a pound more than the MinPea that does the same job with a published LED count and a stated coverage area.", // TEXTO SEO LONGO
                'pros' => ['Split panel with 5m detachable cable, same practical advantage as MinPea', 'Convex lens concentrates the beam instead of adding LED count', 'Remote control and three modes for £20.96 for two units', 'Listing includes real troubleshooting guidance, which is rare here'], // PONTOS POSITIVOS
                'contras' => ['No lumens, no LED count, no battery capacity and no panel size', 'Claims 8-12 hours from an "extra-large" battery it never quantifies', 'Costs more than the MinPea that publishes more of its specification', '4.2 stars from 438 ratings, the shallowest pool in this group'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'CZHHMART 248 LED Solar Security Light, 1200mAh, 270° Wide Angle, IP65',   // NOME (ENCURTADO)
                'price' => '£9.99',                                                                 // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 791,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71EZcpu-MJL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'CZHHMART 248 LED solar motion sensor light with 270 degree coverage', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DTP3M26S?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Ten pounds, 791 ratings, and a published 1200mAh battery that quietly reveals what 248 LEDs are really doing all night.', // TEXTO CURTO (CARD)
                'body' => "At £9.99 this is by some distance the cheapest way onto this page, and 791 ratings at 4.4 stars is better evidence than seven of the nine lights above it can show. It publishes its battery too — 1,200mAh — which puts it in the honest minority here, and the bullets are unusually specific about installation, recommending a mounting height of 3 to 5 metres and supplying screws, tape and a guide.

That published battery is also the most instructive number in this comparison. Twelve hundred milliamp-hours is 4.44 watt-hours. Spread across the \"8-12 hours\" of illumination the listing promises, that is 0.44 watts — call it 65 lumens on generous assumptions. Divided among the advertised 248 LEDs, each chip is receiving under two milliwatts. The LEDs are real and the light works; what the arithmetic shows is that 248 of them exist to make a number in the title, not to make light. Every listing on this page is doing the same thing. This is simply the only one cheap enough and open enough that you can prove it.

One oddity worth naming. The first bullet is written in English and then, mid-sentence, switches to Spanish: \"Features a Panel solar de 22% de eficiencia y sensor de movimiento para mayor seguridad y ahorro energetico\". An untranslated fragment sitting inside the headline feature of a British listing tells you how much attention the specification received before it was published.", // TEXTO SEO LONGO
                'pros' => ['£9.99, the cheapest light in this comparison by £7', '791 ratings at 4.4, deeper evidence than most of the lights above it', 'Publishes its 1200mAh battery, which most listings here refuse to do', '270 degree coverage and a stated 16ft sensor range', 'Specific installation guidance with a recommended 3-5m height'], // PONTOS POSITIVOS
                'contras' => ['1200mAh is 4.44Wh, which over 10 hours is under half a watt', 'That works out at under 2 milliwatts per advertised LED', 'First bullet switches from English into untranslated Spanish', 'No lumen figure published anywhere on the listing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'GEARLITE Solar Security Light, 3500LM, 2500mAh, 15.5x9cm Glass Panel, IP65', // NOME (ENCURTADO)
                'price' => '£17.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 414,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71+KaGdvB6L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'GEARLITE solar security light with glass solar panel and lens-focused LED', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DRG4XHJN?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The light that gave this article its headline: 3500 lumens for 15 hours from a battery holding 9.25 watt-hours, which is 38 times short.', // TEXTO CURTO (CARD)
                'body' => "This listing publishes more real engineering detail than any other in the category, and that is exactly why it finishes last. It states the panel size — 15.5 by 9 centimetres of glass rather than plastic — the conversion rate at 27%, and the battery at 2,500mAh, the largest here. It then claims 3,500 lumens and fifteen hours of illumination on one charge.

Work it through. Two thousand five hundred milliamp-hours at 3.7 volts is 9.25 watt-hours. Thirty-five hundred lumens, even at a generous 150 lumens per watt, draws about 23.3 watts. Fifteen hours at 23.3 watts is 350 watt-hours: thirty-eight times what the battery holds. Read the same figures the other way and 9.25 watt-hours runs a 23.3 watt load for twenty-four minutes, or sustains fifteen hours at 0.62 watts — roughly 92 lumens, about 2.6% of the headline. The charging claim is under the same strain: 139.5 square centimetres at 27% collects 3.77 watts in peak noon sun, so \"fully charge in just 3 hours\" needs 2.5 hours of midday-intensity sunlight in a row, which northern England does not reliably provide in November.

The 27% conversion figure is itself the laboratory world record for a single-junction silicon cell. And the sensor is quoted at 60 feet, which is 18.3 metres — three and a half times the median in this comparison and 22% beyond what Philips claims for a light costing £9 more.

None of which means it is a bad object. The glass panel genuinely resists the clouding that ruins cheap plastic ones after two winters, the lens-focused approach is sound, and 414 buyers rate it 4.4. Buy it as a well-built £17.99 motion light that fires a bright burst for half a minute. Buy it for 3,500 lumens until dawn and you are buying a number its own battery specification disproves.", // TEXTO SEO LONGO
                'pros' => ['Glass panel resists the clouding that kills cheap plastic ones', 'Publishes panel size, conversion rate and battery, which almost nobody does', 'Lens-focused optics rather than piling on LED count', '4.4 stars from 414 ratings', 'Cheapest of the single-unit floodlights here at £17.99'], // PONTOS POSITIVOS
                'contras' => ['3500 lumens for 15 hours needs 350Wh; the battery holds 9.25Wh', 'That is 38 times short, or about 24 minutes of real runtime', '27% panel conversion is the silicon laboratory world record', 'Claims a 60ft (18.3m) PIR range, 3.5x the median here', '"Fully charge in 3 hours" needs 2.5 hours of noon-intensity sun'], // PONTOS NEGATIVOS
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
        $this->command?->info("SolarSecurityLightsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
