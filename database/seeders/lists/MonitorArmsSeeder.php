<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class MonitorArmsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE BRACOS DE MONITOR DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA FILTRADA: /s?k=monitor+arm+desk+mount&rh=p_36%3A2000-  (18 ASINS UNICOS)
        // CATEGORIA HOME & OFFICE, QUE ERA A MAIS MAGRA DO SITE (3 ARTIGOS).
        //
        // ─── ACHADOS ───
        // 1. O NUMERO QUE DECIDE A COMPRA E O PESO MINIMO, E SO 4 DOS 10 PUBLICAM.
        //    BRACO DE MOLA A GAS TEM PISO DE CARGA: ABAIXO DELE A MOLA EMPURRA O
        //    MONITOR PARA CIMA E ELE NAO PARA ONDE VOCE DEIXA. PUBLICAM A FAIXA
        //    COMPLETA: INVISION MX200 (2-9 kg), INVISION MX450 (2-15 kg), GRIFEMA
        //    (2-9 kg) E VIVO (2-9 kg). SO DIZEM O MAXIMO: BONTEC (10 kg), ERGEAR
        //    (10 kg) E AMAZON BASICS (9,97 kg). AS DUAS HUANUO NAO TRAZEM O PESO
        //    NOS BULLETS CAPTURADOS.
        // 2. FAIXA DE POLEGADAS NAO E FAIXA DE PESO, E O ANUNCIO VENDE A PRIMEIRA.
        //    A BONTEC SIMPLES COBRE 13-32" A 10 kg E A BONTEC DUPLA COBRE 13-27"
        //    COM OS MESMOS 10 kg POR BRACO — MESMA CARGA, LIMITE DE TAMANHO
        //    DIFERENTE, PORQUE POLEGADA E GEOMETRIA E QUILO E MOLA. UM MONITOR DE
        //    32" PESA TIPICAMENTE 5-7 kg E UM DE 40" PASSA DOS 15 kg.
        // 3. O CAMPO "MAXIMUM TILT ANGLE" DA AMAZON CONTRADIZ OS PROPRIOS BULLETS.
        //    HUANUO DUPLA: BULLET DIZ -30° A +85° (115° DE CURSO) E A TABELA DIZ
        //    "Maximum tilt angle 35 Degrees". VIVO: A TABELA TRAZ DOIS VALORES NO
        //    MESMO CAMPO, "45 Degrees, 90 Degrees".
        // 4. MATERIAL TAMBEM SE CONTRADIZ DENTRO DA MESMA PAGINA. HUANUO SIMPLES:
        //    BULLET DIZ "aircraft-grade aluminium alloy" E A TABELA DIZ "Alloy Steel".
        //    AMAZON BASICS: A TABELA DIZ "Aluminium" E O BULLET 4 DIZ "made of
        //    durable steel". SAO METAIS DIFERENTES, COM RIGIDEZ DIFERENTE.
        // 5. "AVIATION/AIRCRAFT ALUMINIUM" APARECE NA HUANUO E NA ERGEAR. NAO EXISTE
        //    ESSA DESIGNACAO DE LIGA — E FRASE DE CATALOGO, NAO ESPECIFICACAO.
        //    MESMO TIQUE DE "genuine/real/TESTED" ANTES DE UM NUMERO.
        // 6. A VIVO ANUNCIA "Max 19.8 lbs" NO TITULO DE UM ANUNCIO BRITANICO E
        //    2-9 kg NO BULLET. O VALOR BATE (19,8 lb = 8,98 kg), MAS A UNIDADE E
        //    DE OUTRO MERCADO.
        // 7. A AMAZON BASICS PUBLICA 9,97 kg POR BRACO — NUMERO QUEBRADO PORQUE E
        //    22 lb CONVERTIDO. E, IRONICAMENTE, E O ANUNCIO MAIS COMPLETO DA LISTA:
        //    PESO, ESPESSURA DE MESA (2,03-9,9 cm), ALTURA (20-36 cm) E INCLINACAO
        //    (-15° A +85°), TUDO NOS BULLETS.
        // 8. A INVISION E A UNICA MARCA QUE COLOCA A FAIXA DE CARGA NO PROPRIO
        //    TITULO DO ANUNCIO ("Load Capacity from 2-9kg", "Tilts Extends 2-15kg").
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: ANUNCIOS COM MENOS DE 1.000 AVALIACOES; TERCEIRO E QUARTO ASINS DA
        // BONTEC E DA INVISION PARA NAO ENCHER A LISTA COM A MESMA MARCA (A BONTEC
        // TEM 6 ANUNCIOS NA GRADE E A INVISION 3, MAS AS CONTAGENS DE AVALIACAO SAO
        // DIFERENTES ENTRE ELES, ENTAO NAO HA POOL COMPARTILHADO AQUI).
        // DENTRO: NOTA DE 4.3 A 4.6, PRECO DE £20.38 A £39.98, SETE MARCAS.
        //
        // FOCUS KEYWORD: best monitor arm
        // VARIACOES TRABALHADAS: monitor arm desk mount / dual monitor arm /
        // single monitor arm / gas spring monitor arm / vesa desk mount /
        // monitor stand for desk / adjustable monitor arm / monitor mount /
        // best monitor arm for dual screens / desk clamp monitor arm
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home-office',                 // SLUG DA CATEGORIA (URL)
            'name' => 'Home & Office',               // NOME EXIBIDO
            'description' => 'Kit to make working from home more comfortable and productive, ranked for UK buyers.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-monitor-arm',                                        // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Monitor Arm 2026: 10 Ranked on Weight, Not Screen Size', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Monitor Arm 2026: Top 10 Desk Mounts Ranked',   // TITLE DA ABA/GOOGLE (48 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best monitor arm desk mounts on Amazon by weight range, VESA fit and build, comparing single and dual gas spring arms from £20 to £40.', // META DESCRIPTION (149 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best monitor arm',                               // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "A monitor arm is the cheapest upgrade that changes how a desk feels: the screen goes to eye level, the stand disappears, and you get back the square foot of desk it was sitting on. However, almost everyone buys one on the wrong number. Listings lead with a screen size range — 13 to 32 inches, 24 to 40 inches — because that is the figure shoppers recognise, when the specification that actually decides whether the arm holds your monitor is weight in kilograms. Worse, a gas spring monitor arm has a minimum as well as a maximum, and only four of the ten desk mounts in this comparison publish it. Load one below its floor and the spring pushes the screen upwards until it drifts to the top of its travel. We compared the best monitor arm options on Amazon in August 2026 on weight range, VESA fit, mounting options and build, and flagged every listing whose own specification table argues with its own bullet points.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "The best monitor arm for you is decided by two numbers on the back of your monitor, not by the inches on the front. Weigh the screen with the stand removed, then check it sits inside the arm's published range — including the minimum, because a gas spring monitor arm carrying less than its floor will float upward and refuse to stay put. After that, confirm the VESA pattern is 75x75 or 100x100, which every arm here supports, and measure your desk: the C-clamps in this comparison fit tops between roughly 10mm and 100mm, and a thick oak worktop will defeat some of them. By contrast, screen size range mostly tells you about clearance and the shape of the mounting plate, and it is the least useful number on the page. Meanwhile, treat the Amazon specification table with suspicion here: on two of these listings the stated maximum tilt angle contradicts the tilt range in the seller's own bullet points, and on two more the material field names a different metal from the marketing copy.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 14:35:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Invision MX200 Monitor Arm Desk Mount, 19-32 Inch, 2-9kg Gas Spring',     // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£28.74',                                                                // PRECO (COLETADO EM 28/08/2026)
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 9680,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71bfAetWJiL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best monitor arm',                                                   // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09963RQ6Y?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best monitor arm here because it puts the number that matters in its own title: a 2 to 9kg load range, minimum included, at 4.6 stars from 9,680 ratings.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Invision is the only brand in this comparison that writes the load range into the product title rather than burying it in a bullet, and the MX200 says 2 to 9kg. That lower figure is the one nobody else talks about. A gas spring arm is counterbalanced, so it is designed to hold a specific weight band: hang a 1.5kg 22 inch panel on an arm with a 2kg floor and the spring wins, lifting the screen to the top of its travel every time you let go.

The rest of the specification is straightforward and well chosen for a British desk. It covers 19 to 32 inch screens on VESA 75x75 or 100x100, height adjusts without tools, and the arm tilts, swivels, rotates and extends. Construction is aluminium alloy and SPCC steel rather than the single-material builds further down this list, and the spec table gives 85 degrees of tilt, which matches the marketing rather than contradicting it — a lower bar than it should be, but two arms here fail it.

At £28.74 with 4.6 stars from 9,680 ratings it has both the best average and one of the deepest samples in this comparison. It is not the cheapest desk mount here and it does not take the largest screens, but it is the one where the listing tells you the truth in the fewest clicks.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Publishes the full 2 to 9kg load range in the product title', '4.6 stars from 9,680 ratings, best average with a deep sample here', 'Aluminium alloy and SPCC steel construction', 'Tool-free height adjustment with tilt, swivel, rotate and extend', 'Specification table agrees with the marketing copy on tilt'], // PONTOS POSITIVOS
                'contras' => ['Starts at 19 inches, so it is not aimed at small secondary screens', '9kg ceiling rules out the heaviest 32 inch panels', 'Costs more than the £21 single arms further down this list'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'BONTEC Dual Monitor Arm Desk Mount, 13-27 Inch, 10kg Per Arm',           // NOME (ENCURTADO)
                'price' => '£25.98',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 38849,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61drYovHjqL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'BONTEC dual monitor arm desk mount holding two screens on a clamp base', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01MR397OH?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most reviewed desk mount in this comparison by a distance, at 38,849 ratings, and the cheapest credible way to get two screens off the desk.', // TEXTO CURTO (CARD)
                'body' => "Thirty-eight thousand ratings is an unusual amount of evidence for a £25.98 accessory, and it holds 4.5 stars across all of them. That combination is the single strongest signal in this comparison. As a dual monitor arm it does the important things properly: 10kg per arm, VESA 75x75 and 100x100, 90 degrees of tilt either way, 180 degrees of swivel and full 360 degree rotation so either screen can go portrait.

Mounting is where cheap arms usually fail and this one does not. You get both a C-clamp that takes desk tops from 10mm to 100mm and a grommet base for bolting through, which between them cover almost every desk in a British home office, including the thick worktops that defeat arms with a shorter clamp throw. Height adjusts through 430mm of travel.

The number to check before buying is the screen size, not the weight. BONTEC rates this for 13 to 27 inch panels while rating its single arm — same 10kg capacity — for 13 to 32 inches. The weight rating is identical; what changes is the geometry, because two 32 inch screens side by side on one clamp would foul each other and load the desk edge badly. If you run 32 inch monitors, this is not the arm, however reassuring the review count is.", // TEXTO SEO LONGO
                'pros' => ['38,849 ratings at 4.5, by far the deepest evidence in this comparison', '10kg per arm, the joint highest load in the dual arms here', 'Both C-clamp (10-100mm) and grommet base included', '430mm of height travel and full 360 degree rotation', 'Costs £25.98 for two screens, cheaper than most single arms here'], // PONTOS POSITIVOS
                'contras' => ['Rated to 27 inches while BONTEC rates its single arm to 32 at the same 10kg', 'No minimum load published, so light panels may drift upward', 'Steel build is heavier to handle during assembly than the aluminium arms'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Amazon Basics Dual Monitor Stand, 13-27 Inch, 9.97kg Per Arm',           // NOME (ENCURTADO)
                'price' => '£22.03',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 8730,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61iCHzxR8aL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Amazon Basics dual monitor stand with height adjustable arm and cable organiser', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B076B3Q8JR?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most completely documented listing in this comparison: weight, desk thickness, height range and tilt angles all published, for £22.03.', // TEXTO CURTO (CARD)
                'body' => "If you want to know what you are buying before it arrives, this is the listing to read. Amazon Basics publishes the load at 9.97kg per arm, the desk thickness it clamps to at 2.03 to 9.9cm, the height range at 20 to 36cm and the tilt at −15 to +85 degrees. Nothing else on this page commits to that many numbers, and it costs £22.03.

The odd precision is a clue to its origin: 9.97kg is 22 pounds converted, and 2.03cm is an inch. This is a US product specification translated into metric for the UK listing, which is harmless but explains why the figures look like they came off a calculator. Detachable VESA plates cover 75x75 and 100x100, cable management runs through the arms, and all the hardware is in the box.

Two caveats keep it at number three. The specification table describes the movement type as simply \"Tilt\" while the bullets promise 360 degree rotation and a full range of motion, and the material field says aluminium while the fourth bullet says the stand is \"made of durable steel\". Those are the sort of internal contradictions that make it hard to know which claim was written by someone holding the product. At 4.4 stars from 8,730 ratings it is also the lowest average of the three arms above it.", // TEXTO SEO LONGO
                'pros' => ['Publishes weight, desk thickness, height range and tilt angles in full', '9.97kg per arm, effectively matching the 10kg rivals', 'Fits desks from 2.03cm to 9.9cm thick', 'Detachable VESA plates and integrated cable management', 'Cheapest dual arm in this comparison at £22.03'], // PONTOS POSITIVOS
                'contras' => ['Specification table lists movement as Tilt only while bullets promise full motion', 'Material field says aluminium while the bullets say durable steel', 'No minimum load published', '4.4 average is below the arms ranked above it'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'HUANUO Dual Monitor Stand, 13-32 Inch, Aluminium Die-Cast Frame',        // NOME (ENCURTADO)
                'price' => '£39.98',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 11988,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61jRe20vDBL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'HUANUO dual monitor stand for two screens with die-cast aluminium arms', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07ZNGT8K4?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only dual monitor arm here rated to 32 inches, with 4.6 stars from 11,988 ratings, but its spec table claims a third of the tilt range its own bullets promise.', // TEXTO CURTO (CARD)
                'body' => "This is the dual arm to buy if your screens are larger than 27 inches, because it is the only one in this comparison rated to 32 and it is built for it: high-grade aluminium die-casting on an alloy frame rather than the folded steel used at the cheaper end. HUANUO claims it holds position at any angle without readjustment, which is the practical test of whether a dual mount is worth having, and 11,988 buyers have left it at 4.6 stars.

Installation is three steps — clamp the base, attach the VESA plates, hang the screens — with a choice of C-clamp or grommet, and HUANUO says the arrangement recovers over 80% of the desk space two standard stands would occupy. There is a five year spare part availability commitment on the listing, which is rare at this price and worth more than most of the marketing around it.

The listing contradicts itself on the one spec people check. The bullets describe a tilt range from −30 to +85 degrees, which is 115 degrees of total travel. The Amazon specification table on the same page states \"Maximum tilt angle 35 Degrees\". Both cannot be right, and there is no way to tell from the page which one describes the product in the box. At £39.98 it is also the most expensive arm in this comparison.", // TEXTO SEO LONGO
                'pros' => ['4.6 stars from 11,988 ratings', 'The only dual arm here rated for screens up to 32 inches', 'Die-cast aluminium and alloy frame rather than folded steel', 'Five year spare part availability stated on the listing', 'Holds position at any angle without extra adjustment'], // PONTOS POSITIVOS
                'contras' => ['Spec table says 35 degrees maximum tilt while the bullets claim -30 to +85', 'Most expensive arm in this comparison at £39.98', 'No load range in kilograms published in the bullets'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'BONTEC Single Monitor Arm Desk Mount, 13-32 Inch, 10kg Steel',           // NOME (ENCURTADO)
                'price' => '£21.97',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 11037,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61XIYCrIxeL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'BONTEC single monitor arm desk mount in steel with 360 degree rotation', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01MZ70QJB?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best value single monitor arm here: 10kg of capacity, 13 to 32 inch range and 11,037 ratings, for £21.97.', // TEXTO CURTO (CARD)
                'body' => "For most people buying their first monitor arm, this is the sensible default. Steel construction rated to 10kg covers essentially every mainstream monitor up to 32 inches, the movement is the full set — 90 degrees of tilt, 180 of swivel, 360 of rotation for portrait mode — and it costs £21.97 with 11,037 ratings at 4.5 stars behind it.

The mounting options are the same pair BONTEC uses across its range and they are generous: a desk clamp for tops from 10mm to 100mm thick, or a grommet base for holes from 10mm to 80mm in diameter. That 100mm clamp capacity is worth checking against rivals, because a chunky solid wood or butcher block desk will defeat arms that stop at 60mm or 80mm.

It is worth noticing what this arm proves about the category. BONTEC rates this single arm for 13 to 32 inch screens at 10kg, and rates its dual arm at number two for 13 to 27 inch screens at the same 10kg per arm. Identical load, different size limit, from the same brand — which is the clearest available demonstration that the inch range describes geometry and clearance rather than strength. Like most arms here it publishes no minimum load, so a very light panel may not hold its height.", // TEXTO SEO LONGO
                'pros' => ['11,037 ratings at 4.5 for £21.97', '10kg capacity across a 13 to 32 inch range', 'Desk clamp handles tops from 10mm up to a full 100mm', 'Grommet base included for bolt-through installation', 'Full 90 degree tilt, 180 swivel and 360 rotation'], // PONTOS POSITIVOS
                'contras' => ['No minimum load published, so light screens may drift upward', 'Steel rather than aluminium, so it is heavier to fit', 'Mechanical spring rather than the gas spring used by the Invision arms'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Invision MX450 Monitor Arm, 24-40 Inch, 2-15kg Gas Spring',              // NOME (ENCURTADO)
                'price' => '£37.97',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 7783,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71R6k57jDqL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Invision MX450 monitor arm for large screens up to 40 inches on a desk clamp', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08B8X4KBV?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only arm here that will take an ultrawide or a 40 inch panel, rated 2 to 15kg, and the highest load capacity in this comparison by 5kg.', // TEXTO CURTO (CARD)
                'body' => "Everything else on this page tops out around 9 or 10kg, which is fine for a 27 inch monitor and not fine for a 38 inch ultrawide. The MX450 is rated 2 to 15kg across 24 to 40 inch screens, and that 15kg ceiling is 50% more than anything else in this comparison. If you have a large curved panel that has been sitting on its factory stand because nothing would take it, this is the arm.

Like its smaller sibling it uses a gas spring rather than a mechanical tension spring, which is what makes a heavy screen feel weightless when you reposition it, and Invision again publishes the minimum as well as the maximum. The frame is reinforced streamline die-cast alloy, there are two installation methods for different desks, and at 4.6 stars from 7,783 ratings the evidence is strong.

Two things to weigh. At £37.97 it is the second most expensive arm here, and the 24 inch lower bound means it is deliberately not a general-purpose mount — putting a 24 inch screen on a 15kg gas spring works, but the arm is physically large and will look out of proportion on a small desk. Buy it for the screen you actually have, and if that screen is under 24 inches, buy the MX200 at number one instead.", // TEXTO SEO LONGO
                'pros' => ['Rated 2 to 15kg, 50% more capacity than anything else here', 'Takes screens from 24 up to 40 inches, including ultrawides', 'Gas spring makes heavy panels feel weightless to reposition', 'Publishes both the minimum and maximum load in the title', '4.6 stars from 7,783 ratings'], // PONTOS POSITIVOS
                'contras' => ['Second most expensive arm in this comparison at £37.97', 'Physically large and out of proportion on a small desk', 'Lower bound of 24 inches makes it unsuitable for secondary screens'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'HUANUO Single Monitor Arm Desk Mount, 13-32 Inch, Tool Free Height',     // NOME (ENCURTADO)
                'price' => '£29.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 15232,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61fxnkY3-5L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'HUANUO single monitor arm desk mount with tool free height adjustment', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07T3KCQ94?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The second most reviewed arm here at 15,232 ratings, with a genuinely safer three-stage assembly, but its listing cannot decide whether it is made of aluminium or steel.', // TEXTO CURTO (CARD)
                'body' => "The assembly design is the best thing about this arm and it is the sort of detail that only shows up after a company has handled a lot of returns. Instead of a one-piece VESA mount that leaves you holding a monitor and a bracket at the same time, HUANUO splits installation into three stages so the screen is never taking your full attention and your weight at once. With 15,232 ratings at 4.5 stars it is the second most reviewed product in this comparison.

Movement is generous — tilt from +80 to −30 degrees, 180 degrees of swivel, 360 of rotation — and it takes 13 to 32 inch screens on either a clamp or a grommet. Like the dual version it carries a five year spare part availability commitment, which suggests HUANUO expects to still be supporting it in half a decade.

The materials claim is where it comes apart. The first bullet says the arm is \"made from aircraft-grade aluminium alloy, which is stronger than iron made\". The Amazon specification table on the same page gives the material as Alloy Steel. Those are different metals with different stiffness and different failure behaviour, and the page states both. Worth adding that \"aircraft-grade aluminium\" is not a real designation — there is no such grade — so the one material claim the listing makes with confidence is the one that means nothing. At £29.99 it is also £8 more than the BONTEC single at number five.", // TEXTO SEO LONGO
                'pros' => ['15,232 ratings at 4.5, the second deepest sample here', 'Three-stage assembly is genuinely safer than one-piece VESA mounts', 'Tilt from +80 to -30 degrees with 180 swivel and 360 rotation', 'Five year spare part availability stated on the listing', 'Takes 13 to 32 inch screens on clamp or grommet'], // PONTOS POSITIVOS
                'contras' => ['Bullet says aircraft-grade aluminium while the spec table says Alloy Steel', 'Aircraft-grade aluminium is not an actual alloy designation', 'Costs £8 more than a comparable single arm here', 'No load range in kilograms in the bullet copy'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'GRIFEMA GB2003-1 Single Monitor Arm, 13-32 Inch, 2-9kg Gas Spring',      // NOME (ENCURTADO)
                'price' => '£20.38',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 5347,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61JHp8LwjuL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'GRIFEMA GB2003-1 single monitor arm with gas spring and desk clamp', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BY7QST59?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest arm in this comparison at £20.38, and one of only four that publishes a minimum load as well as a maximum.', // TEXTO CURTO (CARD)
                'body' => "Twenty pounds and thirty-eight pence buys a gas spring arm that tells you its full working range: 2 to 9kg, printed in the listing's own highlight field rather than hidden in the small print. Given that the central problem in this category is manufacturers publishing only a maximum, a budget arm doing the right thing deserves the credit.

The specification is otherwise conventional and sound. It fits 13 to 32 inch screens on VESA 75x75 or 100x100, height adjusts across 160 to 420mm, and it takes either a C-clamp or a grommet mount with the tools included. Construction is high-strength steel with an anti-scratch finish, and unusually for this list the bullet copy and the specification table agree with each other on the material.

The reason it sits at number eight rather than higher is the rating. Four point three from 5,347 ratings is the lowest average in this comparison, and with a sample that size it is a real signal rather than statistical noise. It is not a bad arm — the specification is honest and the price is the lowest here — but 5,000 buyers have collectively rated it below every other product on this page.", // TEXTO SEO LONGO
                'pros' => ['Cheapest arm in this comparison at £20.38', 'Publishes the full 2 to 9kg range including the minimum', 'Height adjusts across 160 to 420mm', 'Bullet copy and specification table agree on the material', 'C-clamp and grommet mounting with tools included'], // PONTOS POSITIVOS
                'contras' => ['4.3 from 5,347 ratings, the lowest average in this ranking', '9kg ceiling is below the 10kg arms at a similar price', 'Steel build is heavier to handle than the aluminium alternatives'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'VIVO Single Monitor Stand, 17-32 Inch, 2-9kg, 3 Year Warranty',          // NOME (ENCURTADO)
                'price' => '£24.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 2716,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71fkiOKmycL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'VIVO single monitor stand with mechanical articulating arm and open VESA plate', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01NH0HTM5?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only arm here with a three year manufacturer warranty, and it publishes a 2 to 9kg range, though its title quotes the limit in pounds on a UK listing.', // TEXTO CURTO (CARD)
                'body' => "A three year manufacturer warranty with named tech support is the longest cover in this comparison, and on a mechanical arm — where the tension spring is the part that eventually softens — that is worth more than it would be on a passive bracket. VIVO also publishes the working range properly, at 2 to 9kg for flat and curved screens between 13 and 32 inches, and it holds a screen suspended at any position rather than sagging over time.

Movement runs to +90 and −45 degrees of tilt, 180 degrees of swivel and 360 of rotation, with cable management running through the top and bottom of the arm. The open VESA plate makes it easier to line up the mounting holes on a heavy screen than a closed plate does. It clamps to desks up to 8.3cm thick or bolts through a grommet.

Two blemishes. The Amazon specification table puts two values in the maximum tilt angle field, \"45 Degrees, 90 Degrees\", which is the field doing the same job twice rather than answering the question. And the product title advertises \"Max 19.8 lbs\" on a British listing, which converts to 8.98kg and matches the bullet, but leaves a UK shopper converting pounds in their head at the moment they are trying to compare arms. At 2,716 ratings the sample is the second thinnest here.", // TEXTO SEO LONGO
                'pros' => ['Three year manufacturer warranty, the longest cover in this comparison', 'Publishes the full 2 to 9kg working range', 'Open VESA plate makes lining up a heavy screen easier', 'Cable management routed through top and bottom of the arm', 'Holds position at any height rather than sagging'], // PONTOS POSITIVOS
                'contras' => ['Title quotes the load as Max 19.8 lbs on a UK listing', 'Spec table gives two different values in the maximum tilt field', 'Clamps to desks only up to 8.3cm, less than the 10cm rivals', '2,716 ratings is the second thinnest sample here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'ErGear Single Monitor Arm, 13-34 Inch, 10kg, Aviation Aluminium',        // NOME (ENCURTADO)
                'price' => '£20.89',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 1319,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/613fnr3bjSL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'ErGear single monitor arm desk mount in aluminium with C-clamp base', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C7KPNP7T?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The widest screen range here at 13 to 34 inches for £20.89, and the only arm that publishes a spring cycle test, but the thinnest review sample in the comparison.', // TEXTO CURTO (CARD)
                'body' => "ErGear quotes something no other listing here does: the spring has been cycle-tested more than 20,000 times. Whether or not you take the figure at face value, it is at least a claim about durability that could in principle be checked, which puts it ahead of the general run of adjectives in this category. The arm holds up to 10kg across a 13 to 34 inch range, the widest span in this comparison, and costs £20.89.

Movement is the most generous here on paper: tilt from −35 to +90 degrees, swivel from −90 to +90, and 360 degree rotation, with a C-clamp and grommet base both in the box and an assembly the listing claims is manageable for a teenager. The specification table and the bullets agree that the material is aluminium, which is more than can be said for two other listings on this page.

Two reservations put it last. At 1,319 ratings it has the thinnest sample in this comparison by some margin, so the 4.5 average is the least settled figure here. And the marketing leans on \"aviation aluminum\", the same non-existent grade designation HUANUO uses — there is no aviation or aircraft aluminium standard, and a phrase that sounds like a specification while meaning nothing is exactly what this ranking exists to flag. As a cheap arm for a large screen it is a reasonable buy; just do not read the metal claim as data.", // TEXTO SEO LONGO
                'pros' => ['Widest screen range in this comparison at 13 to 34 inches', '10kg capacity for £20.89, among the cheapest here', 'Publishes a spring cycle test figure of over 20,000 cycles', 'Tilt from -35 to +90 and swivel from -90 to +90 degrees', 'Specification table and bullets agree that the material is aluminium'], // PONTOS POSITIVOS
                'contras' => ['1,319 ratings, the thinnest sample in this ranking', 'Marketing relies on aviation aluminium, which is not a real grade', 'No minimum load published despite being sold for large screens'], // PONTOS NEGATIVOS
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
        $this->command?->info("MonitorArmsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
