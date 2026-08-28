<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class DeskLampsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE LUMINARIAS DE MESA DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA FILTRADA: /s?k=led+desk+lamp&rh=p_36%3A2000-  (22 ASINS UNICOS)
        // CATEGORIA HOME & OFFICE.
        //
        // ─── ACHADOS ───
        // 1. TODO MUNDO VENDE LUMEN, QUE NAO DESCREVE A SUA MESA. LUMEN E A LUZ TOTAL
        //    EMITIDA EM TODAS AS DIRECOES; O QUE IMPORTA NUMA LUMINARIA DE TRABALHO E
        //    LUX, QUE E QUANTA LUZ CHEGA NA SUPERFICIE (LUMEN POR m²). UMA LUMINARIA DE
        //    2.200 LUMENS MAL DIRECIONADA ENTREGA MENOS LUX NO PAPEL QUE UMA DE 800 BEM
        //    APONTADA. UMA UNICA DAS DEZ PUBLICA LUX: A DAYLIGHT LUMI, COM 4.000 LUX.
        // 2. CRI E A OUTRA ESPECIFICACAO AUSENTE. O INDICE DE REPRODUCAO DE COR VAI DE
        //    0 A 100 E DIZ O QUANTO AS CORES APARECEM COMO SAO: ABAIXO DE 80 A COR FICA
        //    LAVADA, E 90+ E O QUE SE PRECISA PARA COSTURA, ARTE, MAQUIAGEM OU EDICAO
        //    DE FOTO. DE NOVO SO A DAYLIGHT PUBLICA: 95+ CRI. AS OUTRAS NOVE NAO CITAM
        //    O NUMERO — DUAS DIZEM "FULL SPECTRUM", QUE E A ALEGACAO DE CRI SEM O CRI.
        // 3. "EYE-CARING" / "EYE PROTECTION" APARECE EM QUASE TODOS OS TITULOS E NAO E
        //    ESPECIFICACAO NENHUMA. AS METRICAS REAIS DE CONFORTO VISUAL SAO CINTILACAO
        //    (FLICKER) E OFUSCAMENTO (UGR), E NENHUM ANUNCIO PUBLICA VALOR PARA
        //    QUALQUER DAS DUAS — SO O ADJETIVO.
        // 4. TRES ANUNCIOS FAZEM ALEGACAO TECNICA VERIFICAVEL, E VALE PREMIAR:
        //    - DAYLIGHT LUMI: 4.000 lux, 6000K, 95+ CRI, flicker-free e anti-glare;
        //    - LEPOWER: "RG0 Certified", QUE E O GRUPO DE RISCO 0 DA IEC 62471, A NORMA
        //      DE SEGURANCA FOTOBIOLOGICA — GRUPO ISENTO, A MELHOR CLASSIFICACAO;
        //    - HONEYWELL HWT-H01: NOMEIA O LED ("Bridgelux Vesta Thrive full-spectrum"),
        //      QUE E FABRICANTE E LINHA REAIS, EM VEZ DE "LED DE ALTA QUALIDADE".
        // 5. TEMPERATURA DE COR E PUBLICADA POR QUASE TODOS (2700K A 6500K) E E A UNICA
        //    ESPECIFICACAO DE LUZ QUE A CATEGORIA TRATA DIREITO. PARA TRABALHO, 4000K A
        //    5000K E A FAIXA UTIL; 6500K E LUZ DE ESCRITORIO E 2700K E LUZ DE SALA.
        // 6. ERROS DE DIGITACAO NOS TITULOS DE DOIS DOS MAIS BEM AVALIADOS: A LITONES,
        //    COM NOTA 4.8, ESCREVE "Vedio Call" NO TITULO; E A SKYLEO ESCREVE "Timmer &
        //    Memory Function". NAO MUDA O PRODUTO, MAS DIZ QUEM REVISOU A PAGINA.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: LUMINARIAS DE CHAO E BARRAS DE LUZ PARA LASH/ESTUDIO, QUE NAO SAO
        // LUMINARIA DE MESA; ANUNCIOS COM MENOS DE 500 AVALIACOES.
        // DENTRO: NOTA DE 4.1 A 4.8, PRECO DE £20.94 A £119.95, DEZ MARCAS DIFERENTES.
        //
        // FOCUS KEYWORD: best led desk lamp
        // VARIACOES TRABALHADAS: desk lamp for home office / dimmable desk lamp /
        // task light / desk light with usb / eye caring desk lamp / study lamp /
        // adjustable desk lamp / led table lamp / desk lamp with colour temperature
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home-office',                 // SLUG DA CATEGORIA (URL)
            'name' => 'Home & Office',               // NOME EXIBIDO
            'description' => 'Kit to make working from home more comfortable and productive, ranked for UK buyers.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-led-desk-lamp',                                      // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best LED Desk Lamp 2026: 10 Ranked, and Why Lumens Are the Wrong Number', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best LED Desk Lamp 2026: Top 10 Task Lights Ranked', // TITLE DA ABA/GOOGLE (49 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best LED desk lamp options on Amazon by lux, CRI and colour temperature rather than lumens, comparing task lights from £20.94 to £119.95.', // META DESCRIPTION (152 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best led desk lamp',                             // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Nine of the ten lamps in this comparison sell themselves on lumens, and lumens do not describe your desk. A lumen figure is the total light a lamp throws in every direction at once. What you actually need to know is lux — how much of that light lands on the paper in front of you — and lux depends on how well the lamp focuses and how high it sits, not just on how much it emits. A well-aimed 800 lumen lamp can put more light on a page than a badly aimed 2,200 lumen one. Exactly one listing out of the twenty-two we looked at publishes a lux figure. The same listing is the only one that publishes CRI, the number that tells you whether colours look right under it. Meanwhile eye-caring appears in most of the titles on this page and is not a specification at all. Below we rank the best LED desk lamp options on Amazon in August 2026 on the numbers that describe light rather than the ones that describe marketing.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Buying the best LED desk lamp is easier when you know which three numbers to look for and which one to ignore. Ignore lumens. Look for lux at a stated distance, because that is the only figure that describes light arriving where you work, and if a listing does not give one, judge brightness by the dimming range and the size of the panel instead — a wide panel spreads light across a desk where a small bright head puts a hot spot in the middle of it. Look for CRI if you do anything where colour matters: sewing, painting, makeup, photo editing, or checking whether a shirt is navy or black at seven in the morning. Below 80 those jobs get harder and only one lamp here tells you where it sits. And look at colour temperature, which this category does handle properly: 4000K to 5000K is the useful working range, 6500K is office-strip light, and 2700K is for winding down rather than concentrating. By contrast, treat eye-caring as decoration. The genuine eye-comfort measures are flicker and glare, and no listing in this comparison publishes a figure for either — the closest anyone comes is one lamp citing a photobiological safety certification, which is at least a real standard with a real name.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 15:40:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Daylight Lumi LED Desk Lamp, 4000 Lux, 6000K, 95+ CRI',                   // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£101.06',                                                               // PRECO (COLETADO EM 28/08/2026)
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 576,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/614dln8pt5L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best led desk lamp',                                                 // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09KBMHCCC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best LED desk lamp here and the only one that publishes the two numbers that matter: 4,000 lux at the surface and 95+ CRI for accurate colour.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Out of twenty-two listings we read, this is the only one that tells you how much light reaches your desk rather than how much leaves the bulb. Four thousand lux is a genuinely bright task light — for context, a well-lit office is around 500 lux and detailed craft work wants 1,000 or more — and quoting it at all puts Daylight in a category of one here.

The 95+ CRI is the other reason to buy it. Colour Rendering Index measures how faithfully a light source shows colour against daylight, and it is the specification that separates a lamp you can sew, paint, do nails or edit photographs under from one that makes navy look black. Ninety-five is professional territory. Nine other lamps on this page do not mention CRI at all, and two of them say full spectrum instead, which is the claim without the number.

It also states 6000K daylight colour temperature, and describes the LED as flicker-free and anti-glare. At £101.06 it is the second most expensive lamp here and it is a specialist product from a company that makes lighting for crafts and close work rather than a general homeware brand. With 576 ratings at 4.5 the evidence is adequate rather than overwhelming. If you do any work where colour accuracy matters, stop reading here and buy it; if you just need light on a keyboard, the lamps below cost a quarter as much.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['The only lamp here that publishes a lux figure, at 4,000 lux', 'The only lamp here that publishes CRI, at 95+', 'States 6000K colour temperature, flicker-free and anti-glare', 'Made by a specialist craft lighting company', 'Flexible arm and pivoting head'], // PONTOS POSITIVOS
                'contras' => ['Costs £101.06, four to five times most of this comparison', '576 ratings is a modest sample', '6000K only, with no warmer setting for evening use'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'LEPOWER LED Desk Lamp, 800LM, 12W, RG0 Certified Panel',                  // NOME (ENCURTADO)
                'price' => '£26.34',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 2928,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/615hrNlXuXL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'LEPOWER LED desk lamp with wide panel and RG0 certified beads',      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BKT611XR?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best value here: 2,928 ratings at 4.6 for £26.34, and the only budget lamp citing an actual safety standard rather than the word eye-caring.', // TEXTO CURTO (CARD)
                'body' => "LEPOWER does something almost nobody else in this comparison does: it names a standard. The listing says RG0 Certified, which refers to Risk Group 0 under IEC 62471, the international standard for photobiological safety of lamps. Risk Group 0 is the exempt category — no photobiological hazard under normal use. That is a real classification with a real test behind it, and it is worth infinitely more than the word eye-caring, which appears on most of the titles on this page and means nothing.

The other genuinely useful feature is the panel width. LEPOWER says the panel is 200% wider than a typical desk lamp, and panel size is the specification that decides whether light spreads across a working area or lands as a bright circle you keep moving your book into. On a lamp at this price, a wide panel does more for usable light than another few hundred lumens.

Eight hundred lumens and 12W puts it in the middle of the field on raw output, and at £26.34 with 2,928 ratings at 4.6 stars it is the best combination of price, evidence and rating in this comparison. Like everything except the Daylight, it publishes no lux figure and no CRI, so you cannot know how much light lands on the desk or how colours will look. For general work at a keyboard, it is the one we would buy.", // TEXTO SEO LONGO
                'pros' => ['Cites RG0 under IEC 62471, a real photobiological safety standard', 'Panel 200% wider than typical, so light spreads instead of spotting', '2,928 ratings at 4.6 for £26.34', 'Best combination of price, rating and evidence here'], // PONTOS POSITIVOS
                'contras' => ['Publishes no lux figure and no CRI', '800 lumens is mid-table output', 'No flicker or glare figure despite the eye-caring framing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Plug-in LED Desk Lamp with Dual USB Ports, 1400LM, 5 Colour Modes',       // NOME (ENCURTADO)
                'price' => '£28.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 9498,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61YnIuJPCJL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Plug-in LED desk lamp with dual USB charging ports and night light',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DP7GQZS3?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most reviewed lamp in this comparison at 9,498 ratings, with USB-C and USB-A charging built into the base and a 2700K to 6500K range.', // TEXTO CURTO (CARD)
                'body' => "Nine and a half thousand ratings at 4.5 stars makes this the safest buy on the page by weight of evidence, and the reason people keep buying it is the base. Both a USB-C and a USB-A port at 5V 2A means the lamp replaces a charger as well as a light, which on a desk with one accessible socket is worth more than a specification.

The lighting is well thought out for a general-purpose lamp. Five colour modes run from 2700K warm white to 6500K cool white, covering evening reading through to daytime work, and the dimming is stepless via a rotary dial rather than stepped through fixed levels — much better for actually finding the brightness you want. There is a memory function, a 30 minute timer and a soft base night light.

Fourteen hundred lumens is a strong figure for £28.99 and the second highest here after the Neatfi. As with almost everything in this comparison, the listing gives you no lux and no CRI, so the 1400 lumens tells you the lamp is bright but not how much of that brightness arrives where you need it. Buy it for the charging ports and the colour range, which are real and useful, rather than for the lumen count.", // TEXTO SEO LONGO
                'pros' => ['9,498 ratings at 4.5, the deepest evidence in this comparison', 'USB-C and USB-A charging ports built into the base', '2700K to 6500K range covering evening and daytime use', 'Stepless rotary dimming rather than fixed levels', 'Memory function, 30 minute timer and base night light'], // PONTOS POSITIVOS
                'contras' => ['Publishes no lux figure and no CRI', 'Plug-in only, so it needs a socket within reach', 'Eye-caring claim with no flicker or glare figure behind it'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Neatfi XL LED Desk Lamp, 2200 Lumens, 24W, Dimmable Task Light',          // NOME (ENCURTADO)
                'price' => '£119.95',                                                               // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 609,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51JiQbWNioS._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Neatfi XL 2200 lumen LED desk lamp for craft and workbench use',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BV646L77?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The brightest lamp here at 2,200 lumens from 24W, and the highest rated of the premium options at 4.7, though it publishes no lux or CRI either.', // TEXTO CURTO (CARD)
                'body' => "Two thousand two hundred lumens is the highest output in this comparison by 800 lumens, and 24W is the highest draw — the two figures reconcile at roughly 92 lumens per watt, which is a sensible efficiency for a good LED panel and suggests the numbers are real rather than rounded up. Neatfi builds this for workbench and craft use, where you want a large area lit evenly rather than a focused pool.

At 4.7 stars from 609 ratings it is the best rated of the lamps above £50 here, and glare-free is claimed for the diffusion rather than the beads, which on a panel this bright matters — 2,200 lumens undiffused at close range is genuinely uncomfortable.

The comparison with the Daylight Lumi at number one is the interesting one, because they are close in price and aimed at similar users. Neatfi gives you more raw light; Daylight tells you how much of it lands on the surface and how accurate the colour will be. For a workbench where you need to see, the Neatfi is excellent. For close colour work where you need to see correctly, the 95+ CRI on the Daylight is the specification that decides it, and Neatfi does not publish a CRI figure at all.", // TEXTO SEO LONGO
                'pros' => ['2,200 lumens, the highest output in this comparison', '92 lumens per watt suggests honest, unrounded figures', '4.7 stars, best rated lamp above £50 here', 'Large panel suits workbench and craft use', 'Glare-free diffusion on a genuinely bright panel'], // PONTOS POSITIVOS
                'contras' => ['Costs £119.95, the most expensive lamp in this ranking', 'Publishes no CRI, so colour accuracy is unknown', 'No lux figure despite being sold for detail work', '609 ratings is a modest sample at this price'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Honeywell HWT-H01 LED Desk Lamp, Bridgelux LED, 3 Colour Temperatures',   // NOME (ENCURTADO)
                'price' => '£37.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 2286,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/41Qrj3lFSAL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Honeywell HWT-H01 foldable LED desk lamp in white',                  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C276T1S3?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only lamp here that names its actual LED — Bridgelux Vesta Thrive — rather than describing it as high quality, plus stepless dimming and three colour temperatures.', // TEXTO CURTO (CARD)
                'body' => "Every lamp in this comparison claims a good LED. Honeywell is the only one that says which LED: Bridgelux Vesta Thrive, a named full-spectrum line from a named American LED manufacturer. That is a checkable claim, and in a category where the standard practice is an adjective, naming your supplier is a meaningful signal about what is inside.

The rest is a well-judged general-purpose lamp. Three colour temperatures — 3000K warm white, 4000K natural and a cooler setting — cover the useful range, the dimming is stepless rather than stepped, and it folds flat, which matters if the desk is also a dining table. Honeywell is a licensed brand rather than the industrial giant itself, but the licensing does come with quality expectations attached.

At £37.99 with 2,286 ratings at 4.5 it sits in the upper-middle of this comparison on both price and evidence. Named LED aside, it follows the category on the things that matter most: no lux figure, no CRI number despite the full-spectrum framing, and eye protection in the title with nothing measurable behind it. Full spectrum is the CRI claim without the CRI, and it appears here and on the JKSWT below.", // TEXTO SEO LONGO
                'pros' => ['Names the actual LED (Bridgelux Vesta Thrive) rather than an adjective', 'Three colour temperatures from 3000K to cool white', 'Stepless dimming and a foldable design', '2,286 ratings at 4.5', 'Licensed brand with quality expectations attached'], // PONTOS POSITIVOS
                'contras' => ['Says full spectrum but never gives a CRI number', 'No lux figure', 'Costs £11.65 more than the better-rated LEPOWER'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'JKSWT LED Desk Lamp, 72 Beads, 5 Modes, 9 Brightness Levels',             // NOME (ENCURTADO)
                'price' => '£30.59',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 5261,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/518ZdXV5m9L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'JKSWT LED desk lamp with 72 light beads and adjustable arm',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08TQS1NQS?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The second most reviewed lamp here at 5,261 ratings, with 72 light beads spread across a wide panel and 45 combinations of mode and brightness.', // TEXTO CURTO (CARD)
                'body' => "Seventy-two LED beads is a useful thing to know, because bead count on a panel of a given size tells you about how evenly the light is spread. A handful of very bright beads produces hot spots and hard shadows; seventy-two smaller ones across a wide bar produces something closer to soft, shadowless light, which is why JKSWT frames it as no shadow. Five lighting modes across nine brightness levels gives forty-five combinations, which is more granularity than most people will use but no bad thing.

At 5,261 ratings and 4.6 stars it is the second best evidenced lamp in this comparison and one of the highest rated, at £30.59. For general desk work that is a strong position.

The claim to be careful with is full spectrum. Like the Honeywell above, JKSWT uses the phrase and then never gives a CRI figure, which is the number full spectrum is gesturing at. A light can be described as full spectrum with a CRI of 82 or a CRI of 97 and the phrase covers both — one is fine for typing and the other is fine for painting. Since neither lamp publishes the number, treat the phrase as a description of intent rather than a specification. The no flicker claim is similarly unquantified.", // TEXTO SEO LONGO
                'pros' => ['5,261 ratings at 4.6, second deepest sample here', '72 beads across a wide panel for softer, more even light', 'Five modes across nine brightness levels', 'Costs £30.59'], // PONTOS POSITIVOS
                'contras' => ['Says full spectrum without ever giving a CRI figure', 'No flicker percentage behind the no flicker claim', 'No lux figure published'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Lepro LED Desk Lamp, 800lm, UKCA Certified Adapter, Elevated Post',       // NOME (ENCURTADO)
                'price' => '£20.94',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 3134,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/41+hW7xQigL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Lepro 800 lumen LED desk lamp with elevated post and power adapter', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08MJY1CY8?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest lamp here at £20.94 with 3,134 ratings, and the only one that makes a point of including a UKCA certified UK power adapter.', // TEXTO CURTO (CARD)
                'body' => "Twenty pounds ninety-four for a lamp with 3,134 ratings at 4.6 stars is the best raw value on this page, and Lepro has spotted something most sellers ignore: it includes a UKCA certified UK power adapter and says so. A surprising number of desk lamps sold here ship with a two-pin plug or a generic adapter, and the buyer discovers it on the doorstep. Making the certified adapter a selling point is a small thing that says the seller has thought about the market it is selling into.

The elevated post is the other design decision worth noting. Raising the light source above the desk widens the pool of light it casts, which is the same principle as LEPOWER's wide panel approached from a different direction — you cannot change the lumens, so you change the geometry.

Eight hundred lumens with five brightness levels is a modest but perfectly adequate output for reading and screen work. Like eight of the ten lamps here it publishes no lux and no CRI, and the eye-care framing has nothing measurable attached. For a spare room, a student desk or a second lamp, it is difficult to argue with at this price.", // TEXTO SEO LONGO
                'pros' => ['Cheapest lamp in this comparison at £20.94', '3,134 ratings at 4.6', 'Includes a UKCA certified UK power adapter and says so', 'Elevated post widens the pool of light cast'], // PONTOS POSITIVOS
                'contras' => ['800 lumens is a modest output', 'No lux figure and no CRI', 'Eye-care claim with nothing measurable behind it'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Lastar LED Desk Lamp, 12W, Gooseneck, USB Charging Port',                 // NOME (ENCURTADO)
                'price' => '£25.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 3782,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51kn6DWgUxL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Lastar LED desk lamp with flexible gooseneck and USB charging port',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09P17GRYY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A 360 degree gooseneck with a weighted base and a USB port for £25.99, with 3,782 ratings — the most flexible positioning in this comparison.', // TEXTO CURTO (CARD)
                'body' => "The gooseneck is the point. Rigid-arm lamps position in two or three joints; a 360 degree flexible neck goes wherever you push it and stays there, which matters if the lamp has to serve a desk, a bedside table and occasionally a sewing machine. The weighted base is the necessary companion — a flexible neck on a light base tips over the first time you extend it fully, and Lastar has got that right.

With 3,782 ratings at 4.6 stars it is well evidenced, and at £25.99 with a USB charging port built in it competes directly with the LEPOWER at number two and the plug-in lamp at number three.

Where it falls behind those two is specification. LEPOWER cites a real photobiological standard; the plug-in lamp gives you a 2700K to 6500K range and dual USB-C and USB-A. Lastar gives you 12W, a USB port and flexibility, without a lumen figure in the bullets we could find, let alone lux or CRI. It is a good lamp bought on its rating and its articulation rather than on what it tells you about the light. For a bedside or a shared desk where the lamp moves around, the gooseneck earns its place.", // TEXTO SEO LONGO
                'pros' => ['360 degree gooseneck with a properly weighted base', '3,782 ratings at 4.6', 'USB charging port included at £25.99', 'The most flexible positioning in this comparison'], // PONTOS POSITIVOS
                'contras' => ['Bullets do not state a lumen figure, let alone lux or CRI', 'Single USB-A port where rivals offer USB-C too', 'Gooseneck sags over time on cheaper units'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'LitONES LED Desk Lamp, 1200LM, 30 Lighting Modes, Metal Swing Arm',       // NOME (ENCURTADO)
                'price' => '£53.25',                                                                // PRECO
                'rating' => 4.8,                                                                    // NOTA
                'reviews_count' => 803,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71bsih1Q6jL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'LitONES LED desk lamp with metal swing arm for video calls',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CZMPX2PW?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest rated lamp in the whole comparison at 4.8, built for video calls as well as desk work, with a metal swing arm and 1,200 lumens.', // TEXTO CURTO (CARD)
                'body' => "Four point eight stars is the highest rating on this page and it comes from 803 ratings, which is enough to take seriously. The angle LitONES has found is video calls: the lamp is designed to light your face as well as your desk, with three colour temperatures from 3000K and thirty lighting modes, which for anyone who spends the working day on camera is a genuine use case that no other lamp here addresses.

The metal swing arm is the other reason for the price. Most lamps in this comparison use plastic arms; a metal swing arm holds position under its own weight for years rather than gradually drooping, and it is the component most likely to determine whether the lamp is still usable in five years.

Two things to weigh. At £53.25 it is double the LEPOWER at number two, and what you are buying is the arm, the video-call lighting and the 4.8 rating rather than more measurable light — 1,200 lumens is mid-table and, as with everything except the Daylight, there is no lux or CRI figure. And the title contains a typo: it advertises the lamp for Vedio Call. Nothing about a misspelling changes how a lamp performs, but on the highest rated product in the category it is a reminder of how little of the copy on these pages gets checked.", // TEXTO SEO LONGO
                'pros' => ['4.8 stars, the highest rating in this comparison', 'Metal swing arm holds position far better than plastic', 'Designed to light your face for video calls, unique here', 'Three colour temperatures and 30 lighting modes', 'Glare-free and flicker-free framing'], // PONTOS POSITIVOS
                'contras' => ['Costs £53.25, double the better-value LEPOWER', 'Title misspells Video as Vedio', '1,200 lumens is mid-table for the price', 'No lux figure and no CRI'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'SKYLEO LED Desk Lamp, 12W, 5 Colour Modes, 11 Brightness Levels',         // NOME (ENCURTADO)
                'price' => '£21.36',                                                                // PRECO
                'rating' => 4.1,                                                                    // NOTA
                'reviews_count' => 2626,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81BmsA+gTML._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'SKYLEO LED desk lamp with adjustable swing arm and timer',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D1DLY4H4?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Fifty-five combinations of colour mode and brightness for £21.36, but a 4.1 average across 2,626 ratings is the lowest in this comparison.', // TEXTO CURTO (CARD)
                'body' => "Five colour modes multiplied by eleven brightness levels gives fifty-five settings, which is the most granular control on this page, and at £21.36 it is within pennies of the cheapest. There is an adjustable swing arm, a timer and a memory function that returns to your last setting rather than defaulting to full brightness every time you switch it on.

On paper that is a lot of lamp for the money, and 2,626 people have bought it and left a rating.

The rating is the problem, and it is why this sits last. Four point one is the lowest average in this comparison, and with a sample of 2,626 that is a real signal rather than a run of bad luck — a meaningful minority of buyers are not satisfied. Set against the Lepro at number seven, which costs £0.42 less and holds 4.6 from 3,134 ratings, there is no obvious reason to choose this one. Like most of the field it publishes no lux and no CRI, and its own title contains a spelling error, advertising a Timmer & Memory Function. Fifty-five settings and a misspelled timer is a fair summary of what this category prioritises.", // TEXTO SEO LONGO
                'pros' => ['55 combinations of colour mode and brightness, the most granular here', 'Adjustable swing arm with timer and memory function', 'Costs £21.36', '2,626 ratings gives a usable sample'], // PONTOS POSITIVOS
                'contras' => ['4.1 from 2,626 ratings, the lowest average in this ranking', 'Costs more than the Lepro, which rates half a star higher', 'Title misspells Timer as Timmer', 'No lux figure and no CRI'], // PONTOS NEGATIVOS
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
        $this->command?->info("DeskLampsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
