<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class PressureWashersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE LAVADORAS DE ALTA PRESSAO DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA FILTRADA: /s?k=pressure+washer&rh=p_36%3A6000-  (19 ASINS UNICOS)
        //
        // ─── ACHADOS ───
        // 1. O ACHADO E DE FISICA E DA PARA CONFERIR COM UMA CONTA. A POTENCIA
        //    HIDRAULICA DE UMA LAVADORA E: WATTS = bar × (L/h) ÷ 36. ESSE NUMERO NAO
        //    PODE PASSAR DA POTENCIA DO MOTOR, PORQUE NAO SE TIRA MAIS ENERGIA DO QUE
        //    SE POE. RODANDO A CONTA NOS DEZ:
        //      BOSCH EASYAQUATAK 120: 120×350/36 = 1.167 W (motor 1500 W = 78%)
        //      BOSCH UNIVERSALAQUATAK 135: 135×450/36 = 1.688 W (motor 1900 W = 89%)
        //      KARCHER K3 CLASSIC HOME: 120×380/36 = 1.267 W
        //      KARCHER K4 FLEX: 130×420/36 = 1.517 W
        //      KARCHER K7 COMFORT: 180×550/36 = 2.750 W
        //      WORX NITRO (BATERIA): 56×220/36 = 342 W
        //      AMAZON BASICS: 145×500/36 = 2.014 W (motor 2200 W = 92%)
        //      ETOOLAB: 345×680/36 = 6.516 W (motor 2000 W = 326% ← IMPOSSIVEL)
        //    TODA MAQUINA REAL CAI ENTRE 78% E 92% DO MOTOR, QUE E O RENDIMENTO
        //    ESPERADO DE UMA BOMBA. A ETOOLAB PEDE TRES VEZES E MEIA MAIS ENERGIA DO
        //    QUE ENTRA NA TOMADA.
        // 2. O CONTRASTE QUE FECHA O ARGUMENTO: A KARCHER, TOPO DE LINHA, COBRA
        //    £459.99 PELA K7 E DECLARA 180 bar. NA MESMA PAGINA DE BUSCA A ETOOLAB
        //    COBRA £119.99 E DECLARA 345 bar. QUEM TEM BOMBA DE VERDADE PARA EM 180.
        // 3. A AMAZON BASICS ERRA A UNIDADE NA PROPRIA FICHA: O TITULO DIZ "Max 145
        //    Bar" E O CAMPO DE ESPECIFICACAO DIZ "Maximum pressure 145 Pound per
        //    Square Inch". 145 bar SAO 2.103 PSI; 145 PSI SAO 10 bar. MESMO NUMERO,
        //    UNIDADE TROCADA, 14,5x DE DIFERENCA — NA MARCA PROPRIA DA AMAZON.
        // 4. A FOTING PUBLICA TRES PRESSOES E DUAS VAZOES NA MESMA PAGINA: TITULO DIZ
        //    "180bar, 450 l/h" E A FICHA DIZ "2103 Pound per Square Inch" (QUE SAO
        //    145 bar) COM "420 Litres Per Hour". NENHUM DOS DOIS PARES BATE.
        // 5. A BOSCH EASYAQUATAK 120 SE CONTRADIZ: O BULLET DIZ "100 bar" E O CAMPO
        //    DE ESPECIFICACAO DIZ "120 Bars" — E O MODELO SE CHAMA 120.
        // 6. O CAMPO "TANK VOLUME" E LIXO NA CATEGORIA INTEIRA, COM TRES ERROS
        //    DIFERENTES: A BOSCH POE A VAZAO ALI ("350 Litres", "410 Litres" — E
        //    LAVADORA NAO TEM TANQUE); A FOTING E A AMAZON BASICS POEM O FRASCO DE
        //    DETERGENTE ("500 Millilitres", "300 Millilitres"); A VONHAUS POE 6,5 L,
        //    QUE E O MESMO 6,5 DA VAZAO EM L/min, REPETIDO NO CAMPO ERRADO.
        // 7. UNIDADES MISTURADAS NO MESMO CAMPO DA MESMA LOJA: BOSCH E KARCHER K4
        //    PUBLICAM EM "Bars"; KARCHER K3, K7, ETOOLAB, FOTING E AMAZON BASICS
        //    PUBLICAM EM PSI. QUEM COMPARA "120" COM "2610" NAO TEM COMO SABER QUE O
        //    SEGUNDO SAO 180 bar.
        // 8. A KARCHER K3 CLASSIC HOME DECLARA "1740.46 Pound per Square Inch" — DUAS
        //    CASAS DECIMAIS NUM VALOR CONVERTIDO. E CONVERSAO AUTOMATICA DE 120 bar,
        //    NAO MEDICAO.
        // 9. A VONHAUS NAO PUBLICA PRESSAO NENHUMA, E PUBLICA A VAZAO EM L/min
        //    ENQUANTO TODO O RESTO DA CATEGORIA USA L/h.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: O ASIN IRMAO DA FOTING (B0G13DZVYQ, £94.97, MESMAS 138 AVALIACOES DO
        // B0GVJFZCRP, £84.98 — MESMO POOL, £10 DE DIFERENCA, MANTIDO O MAIS BARATO);
        // OS DEMAIS KARCHER K2, PARA NAO ENCHER A LISTA COM UMA MARCA SO.
        // DENTRO: NOTA DE 4.0 A 4.7, PRECO DE £64.99 A £459.99, SETE MARCAS.
        //
        // FOCUS KEYWORD: best pressure washer
        // VARIACOES TRABALHADAS: jet washer / power washer / electric pressure washer /
        // patio cleaner / best pressure washer for cars / cordless pressure washer /
        // pressure washer with hose reel / karcher pressure washer / bar pressure washer
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'garden',                     // SLUG DA CATEGORIA (URL)
            'name' => 'Garden',                     // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best garden tools and outdoor equipment available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-pressure-washer',                                    // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Pressure Washer 2026: 10 Ranked, and Why 345 Bar Is Impossible', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Pressure Washer 2026: Top 10 Ranked and Tested', // TITLE DA ABA/GOOGLE (52 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best pressure washer options on Amazon by real cleaning power, checking every bar and flow claim against the motor, from £64.99 to £459.99.', // META DESCRIPTION (156 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best pressure washer',                           // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Pressure washer listings are the easiest place on Amazon to catch a lie, because the physics is simple enough to check on a phone. The hydraulic power a machine produces is its pressure in bar multiplied by its flow in litres per hour, divided by 36 — and that number cannot exceed the motor driving it, because nothing takes more energy out than you put in. We ran that sum on ten of the best pressure washer options on Amazon in August 2026. Every credible machine landed between 78% and 92% of its motor rating, which is what a real pump achieves. One landed at 326%. Meanwhile Kärcher, whose flagship costs £459.99, claims 180 bar on the same results page where a £119.99 unbranded unit claims 345. Below we rank them on cleaning power that survives arithmetic, and flag the four listings whose own specification tables contradict their own titles.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "The best pressure washer for you is decided by two numbers multiplied together, not by the biggest one on the box. Pressure alone strips paint but covers nothing; flow alone rinses but does not lift; the product of the two is what actually cleans, and it is capped by the motor. So take the bar figure, multiply it by the flow in litres per hour, divide by 36, and compare that with the wattage: anything above roughly 90% is being generous with itself, and anything above 100% is fiction. By contrast, the machines from brands with a reputation to lose all sit in the same honest band, which is why a £459.99 Kärcher claims half the pressure of a £119.99 stranger. Meanwhile, check which unit the specification field is using before you compare anything — half this category publishes bar and half publishes PSI, and one listing manages to print the same number in both. For most British patios and a car on the weekend, around 1,700 hydraulic watts is plenty, and you can buy that for under £100.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 15:20:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Bosch UniversalAquatak 135 Pressure Washer, 1900W, 135 Bar, 450 l/h',     // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£98.00',                                                                // PRECO (COLETADO EM 28/08/2026)
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 3029,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61uuH5NUspL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best pressure washer',                                               // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B06XRWS76H?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best pressure washer here on real cleaning power per pound: 1,688 hydraulic watts from an honest 135 bar and 450 l/h, for £98.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Run the arithmetic on this jet washer and it comes out exactly where a well engineered machine should. One hundred and thirty-five bar multiplied by 450 litres per hour, divided by 36, is 1,688 watts of hydraulic power from a 1,900 watt motor — 89% efficiency. That is close to the physical ceiling for a pump, and it means Bosch is quoting figures the machine can genuinely produce simultaneously rather than two unrelated maximums.

For a British patio that number is the one that matters. It is more cleaning power than the Kärcher K4 at number four, which costs £71 more, and it comes with a 7 metre high-pressure hose, a 3-in-1 nozzle that switches between fan and pencil jet by twisting, a detergent nozzle with a 450ml bottle and an inlet water filter that stops grit reaching the pump. The filter is the part people discover they needed after their first machine dies.

At 4.4 stars from 3,029 ratings it has the second deepest review history in this comparison. The one place the listing slips is the Tank volume field, which reads 410 Litres — a pressure washer has no tank, and that number is a mangled version of the flow rate. It is a data-entry error rather than a claim, but it is the same field that is wrong on six of the ten machines here.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['1,688 hydraulic watts, the best cleaning power per pound here', 'Figures reconcile at 89% of the motor rating, so both are real', '7 metre hose, the longest of the sub-£100 machines', 'Inlet water filter protects the pump from grit', '3,029 ratings at 4.4'], // PONTOS POSITIVOS
                'contras' => ['Tank volume field says 410 Litres, which is not a real specification', 'Heavier than the EasyAquatak at 6.55kg', 'No hose reel, so the 7 metres has to be coiled by hand'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Bosch EasyAquatak 120 Pressure Washer, 1500W, 350 l/h, Home and Car Kit', // NOME (ENCURTADO)
                'price' => '£82.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 4383,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71zBK2Tr40L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Bosch EasyAquatak 120 pressure washer with home and car cleaning kit', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B088KSGGGR?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most reviewed pressure washer in this comparison at 4,383 ratings, and the one that arrives with a patio cleaner in the box.', // TEXTO CURTO (CARD)
                'body' => "Four thousand three hundred and eighty-three ratings at 4.5 stars is the deepest evidence on this page, and the Amazon Edition bundle is the reason to pick it over the model above. It ships with the 250 patio cleaner attachment, a wash brush, the high-pressure gun, lance, 5 metre hose and a variable fan jet nozzle. Buying the patio cleaner separately costs around £30, which effectively makes this the cheapest way into a Bosch.

The arithmetic holds up: 120 bar at 350 litres per hour is 1,167 hydraulic watts from a 1,500 watt motor, or 78% — the most conservative ratio in this comparison and a sign Bosch is quoting a pressure the pump sustains rather than a peak it touches. It is genuinely less machine than the UniversalAquatak, and that shows in the flow rate more than the pressure.

The listing does contradict itself on the headline number, though. The first bullet says the machine produces 100 bar; the specification table says 120 Bars; and the model is named EasyAquatak 120. Two of those three agree, so 120 is almost certainly right, but a listing that cannot state its own model number consistently is worth noticing. The Tank volume field, as with its sibling, contains 350 Litres — the flow rate in the wrong box.", // TEXTO SEO LONGO
                'pros' => ['4,383 ratings at 4.5, the deepest sample in this comparison', 'Patio cleaner and wash brush included, worth about £30 alone', 'Conservative 78% motor-to-hydraulic ratio suggests sustained figures', 'Light at 5.1kg and easy to carry to the car', 'Cheapest Bosch here at £82.99'], // PONTOS POSITIVOS
                'contras' => ['Bullet says 100 bar while the spec table and the model name say 120', 'Tank volume field contains the flow rate, not a tank', '350 l/h is the lowest flow of the corded machines here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Karcher K3 Classic Home Pressure Washer, 120 Bar, 380 l/h',               // NOME (ENCURTADO)
                'price' => '£134.76',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 829,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61tmjDGU4iL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Karcher K3 Classic Home pressure washer with water filter',          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CNQ5MJLR?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest rated machine here with a real sample, at 4.6 from 829 ratings, and the lightest corded unit in the comparison at 4.15kg.', // TEXTO CURTO (CARD)
                'body' => "Kärcher is the name most British households reach for, and the K3 Classic Home is the point in its range where the price stops being silly. It produces 120 bar at 380 litres per hour, which works out at 1,267 hydraulic watts, and it holds 4.6 stars across 829 ratings — the best rating with a credible sample anywhere on this page.

What you are paying the premium for is not power. At £134.76 it costs £36 more than the Bosch at number one while producing 25% less cleaning power. What you get instead is the ecosystem: Kärcher accessories are stocked in every garden centre and hardware shop in the country, the T-series patio heads fit without adapters, and replacement hoses and lances are trivially findable in five years when an unbranded machine has become landfill. It also weighs 4.15kg, the lightest corded washer here, and includes a water filter.

One small oddity worth pointing at, because it says something about how these listings are built: the specification field reads 1740.46 Pound per Square Inch. Nobody measures a pump to two decimal places. That is 120 bar run through an automatic unit converter, which is also why this listing publishes PSI while the Kärcher K4 two places below publishes Bars. Same brand, same marketplace, two different units in the same field.", // TEXTO SEO LONGO
                'pros' => ['4.6 stars from 829 ratings, the best rating with a real sample here', 'Lightest corded machine in this comparison at 4.15kg', 'Accessories stocked in every UK garden centre and hardware shop', 'Water filter included to protect the pump', '6 metre hose'], // PONTOS POSITIVOS
                'contras' => ['Costs £36 more than the Bosch for 25% less cleaning power', 'Pressure published as 1740.46 PSI, an auto-converted figure', 'Same brand publishes bar on one model and PSI on another'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Karcher K4 Power Control Flex Pressure Washer, 130 Bar, 420 l/h',         // NOME (ENCURTADO)
                'price' => '£169.00',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 359,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/616VuNq-XYL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Karcher K4 Power Control Flex pressure washer with 8 metre hose',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DQLBCQ99?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The step up that is actually worth taking within the Kärcher range: 1,517 hydraulic watts, 30 m2/h coverage and an 8 metre hose.', // TEXTO CURTO (CARD)
                'body' => "If you are committed to Kärcher, this is where the money starts buying machine rather than badge. The K4 Power Control Flex delivers 130 bar at 420 litres per hour, which is 1,517 hydraulic watts, and Kärcher publishes a coverage figure of 30 square metres per hour — the sort of number that actually helps you decide whether a driveway is a morning or an afternoon.

Power Control is the feature that distinguishes it: the gun has a display and a dial that sets the pressure for the surface you are on, so you are not swapping nozzles between the car, the decking and the block paving. The Flex hose is genuinely more pliable than the standard one and 8 metres long, which on a British terrace is the difference between moving the machine twice and moving it four times.

Two honest caveats. At £169 it costs £71 more than the Bosch at number one while producing 10% less cleaning power, so this is a purchase about convenience and brand support rather than output. And at 15.5kg it is nearly four times the weight of the K3 above it, which matters if it lives up a step in a shed. The specification field here reads 130 Bars, in bar, unlike the K3 and K7 which both publish PSI.", // TEXTO SEO LONGO
                'pros' => ['1,517 hydraulic watts, more output than any Kärcher below it here', 'Power Control gun sets pressure by surface without changing nozzles', '8 metre Flex hose, the longest on a mid-range machine here', 'Kärcher publishes a 30 m2/h coverage figure', 'Water filter included'], // PONTOS POSITIVOS
                'contras' => ['Costs £71 more than the Bosch for 10% less cleaning power', 'Heavy at 15.5kg', 'Only 359 ratings for a machine at this price'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'VonHaus Pressure Washer 1600W, Portable, 6.5 l/min',                      // NOME (ENCURTADO)
                'price' => '£64.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 625,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71LgRhA7WML._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'VonHaus 1600W portable pressure washer with accessories',            // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09YJ386XW?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest machine here at £64.99 with 625 ratings behind it, but it is the only listing in the comparison that publishes no pressure figure at all.', // TEXTO CURTO (CARD)
                'body' => "Sixty-five pounds is the entry point to this category and VonHaus has 625 ratings at 4.5 stars, which is more evidence than four of the more expensive machines on this page. It is a 1,600 watt portable unit with a 5 metre hose that comes with accessories in the box, and for washing a car and hosing down a patio a few times a summer it will do the job.

The problem is that you cannot work out what it does. VonHaus publishes a flow rate of 6.5 litres per minute — which is 390 litres per hour, competitive with the Bosch machines — and then publishes no pressure figure anywhere on the listing. Without bar, the multiplication that tells you the cleaning power is impossible, and pressure is the half of the equation that separates lifting moss from rinsing dust.

The specification table also contains the clearest copy error in the comparison. The Tank volume field reads 6.5 Litres. The flow rate is 6.5 litres per minute. The same number has been pasted into a second field with a different unit, and a pressure washer does not have a 6.5 litre tank. It is also the only machine here quoting flow in litres per minute while the rest of the category uses litres per hour, so even the number it does publish takes converting before it can be compared.", // TEXTO SEO LONGO
                'pros' => ['Cheapest machine in this comparison at £64.99', '625 ratings at 4.5, more evidence than several pricier rivals', 'Flow of 6.5 l/min is 390 l/h, competitive with machines costing more', 'Accessories included and light at 5.6kg'], // PONTOS POSITIVOS
                'contras' => ['Publishes no pressure figure at all, so cleaning power cannot be calculated', 'Tank volume field repeats the flow number with a different unit', 'Quotes flow in l/min while the whole category uses l/h', 'Only a 5 metre hose'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'WORX WG633E Nitro 20V Cordless Pressure Washer, 56 Bar, Brushless',       // NOME (ENCURTADO)
                'price' => '£131.75',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 567,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71z8n2dM7qL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'WORX WG633E Nitro 20V brushless cordless pressure washer',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BW14H8ML?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only cordless machine here, and the only one honest enough to publish a modest 56 bar rather than pretend a battery can match the mains.', // TEXTO CURTO (CARD)
                'body' => "A 20 volt battery cannot do what a 1,900 watt mains motor does, and WORX does not pretend otherwise. The Nitro publishes 56 bar and 220 litres per hour, which is 342 hydraulic watts — about a fifth of the Bosch at number one. Printing that number on a product page next to rivals claiming 345 bar takes a certain amount of nerve, and it is the strongest reason to trust everything else on the listing.

What the battery buys is not power, it is reach. This machine will clean a bike at a trailhead, rinse a dog in a field, wash a caravan on a pitch and clean garden furniture at the end of the garden without an extension lead crossing a lawn. It draws from a bucket or a water butt rather than needing a tap, which is the actual point of cordless. The brushless motor and IPX7 rating are the right engineering for a tool that will be used in the wet and stored damp.

At £131.75 it costs more than machines with five times the output, which is the cordless tax and is only worth paying if the cord is genuinely your problem. It weighs 4.11kg. If your patio has a socket within reach, buy any of the five machines above it instead; if it does not, this is the only entry on this page that can help you.", // TEXTO SEO LONGO
                'pros' => ['The only cordless machine in this comparison', 'Publishes an honest 56 bar rather than an inflated headline', 'Draws from a bucket or water butt, no tap required', 'Brushless motor and IPX7 rating suit wet, damp storage', '567 ratings at 4.5'], // PONTOS POSITIVOS
                'contras' => ['342 hydraulic watts, about a fifth of the corded machines here', 'Costs £131.75, more than far more powerful corded units', 'Battery runtime limits a long session'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Karcher K7 Comfort Premium Pressure Washer, 180 Bar, 550 l/h, Hose Reel', // NOME (ENCURTADO)
                'price' => '£459.99',                                                               // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 56,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/610NoQYi1nL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Karcher K7 Comfort Premium pressure washer with hose reel',          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GCDT3ZTW?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most powerful machine here at 2,750 hydraulic watts, and the single most useful reference point on this page: £459.99 buys 180 bar.', // TEXTO CURTO (CARD)
                'body' => "This is the top of the domestic Kärcher range and it produces 180 bar at 550 litres per hour, which is 2,750 hydraulic watts — 63% more cleaning power than anything else in this comparison. It covers 60 square metres an hour, has a 10 metre hose on an integrated reel, and weighs 18.8kg because a pump that does this has to be built like one.

Its real value to this article, though, is as a yardstick. Kärcher is a German engineering company with a reputation that took eighty years to build and could be damaged by one round of trading standards attention. It charges £459.99 and declares 180 bar. Two entries below, an unbranded machine charges £119.99 and declares 345 bar. If 345 bar were achievable from a domestic plug socket, Kärcher would be selling it, because Kärcher would rather have your £459.99 than not.

Whether you should buy it is a different question. For a domestic patio, 2,750 hydraulic watts is more than the surface needs and the extra pressure will strip the sand from block paving joints if you are careless. It makes sense for a large driveway, a farm yard or someone who cleans several vehicles a week. With 56 ratings, the sample is also thin for the money — though at this end of the market that reflects volume, not doubt.", // TEXTO SEO LONGO
                'pros' => ['2,750 hydraulic watts, 63% more than anything else in this ranking', '60 m2/h coverage, published by the manufacturer', '10 metre hose on an integrated reel', 'Built by a brand with a reputation staked on its numbers', '4.7 stars'], // PONTOS POSITIVOS
                'contras' => ['Costs £459.99, more than the next five machines here combined', 'Heavy at 18.8kg', 'Enough pressure to strip sand from block paving joints if misused', 'Only 56 ratings'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Amazon Basics Corded Pressure Washer, 2200W, 500 l/h',                    // NOME (ENCURTADO)
                'price' => '£83.95',                                                                // PRECO
                'rating' => 4.0,                                                                    // NOTA
                'reviews_count' => 32,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Z4w6JXu+L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Amazon Basics corded pressure washer in green',                      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B49TCV8Q?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The strongest motor under £100 at 2200W, on a listing that manages to state the same number in two different units and be wrong by 14.5 times.', // TEXTO CURTO (CARD)
                'body' => "On the numbers in the title this is a lot of machine for £83.95: 2,200 watts, 145 bar and 500 litres per hour, which multiplies out to 2,014 hydraulic watts — second only to the £459.99 Kärcher in this comparison. At 92% of the motor rating it is an optimistic ratio, but not an impossible one.

Then you open the specification table. The Maximum pressure field reads 145 Pound per Square Inch. The title says 145 Bar. These are not the same claim: 145 bar converts to 2,103 PSI, while 145 PSI converts to 10 bar. Somebody typed the bar figure into the PSI field, and the result is a listing that simultaneously claims a machine capable of stripping a driveway and one weaker than a garden hose with a thumb over it. The 14.5-fold gap is the largest single contradiction we found in this category, and it is on Amazon's own-brand product.

The rating deserves attention too. Four point zero from 32 ratings is the lowest average in this comparison, and while 32 is a thin sample, an own-brand product with Amazon's distribution should be gathering reviews faster than this. The Tank volume field, for the record, reads 300 Millilitres — that is the detergent bottle. Buy it for the motor if you are comfortable being an early adopter; do not buy it because the specification table told you anything.", // TEXTO SEO LONGO
                'pros' => ['2,200 watt motor, the most powerful under £100 here', '500 l/h flow, the second highest in this comparison', 'Amazon own-brand returns and support', 'Costs £83.95'], // PONTOS POSITIVOS
                'contras' => ['Title says 145 Bar while the spec field says 145 PSI, a 14.5x gap', '4.0 from 32 ratings, the lowest average in this ranking', 'Tank volume field contains the detergent bottle size', 'Heavy at 10.8kg for the price bracket'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'FOTING Pressure Washer with Hose Reel, Foam Cannon and 6-in-1 Nozzle',    // NOME (ENCURTADO)
                'price' => '£84.98',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 138,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71KUvuyaDwL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'FOTING pressure washer with hose reel and foam cannon',              // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GVJFZCRP?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A hose reel and foam cannon for £84.98, on a listing that publishes two different pressures and two different flow rates for the same machine.', // TEXTO CURTO (CARD)
                'body' => "The kit is the appeal here. For £84.98 you get an integrated hose reel, which is a feature the £169 Kärcher does not have, a foam cannon for washing a car properly rather than smearing it, and a 6-in-1 adjustable nozzle. At 4.4 stars from 138 ratings the early evidence is reasonable.

The listing simply cannot agree with itself on what the machine does. The title states 180 bar and 450 litres per hour. The specification table states 2103 Pound per Square Inch, which is 145 bar, and 420 litres per hour. Neither pair matches: the pressure is out by 35 bar and the flow by 30 litres per hour, and there is nothing on the page to indicate which set describes the object in the box. Using the lower, more conservative pair, the machine produces 1,692 hydraulic watts, which would put it level with the Bosch at number one.

It is also sold twice. A second listing carries an almost identical title, the same 138 ratings and the same 4.4 average, at £94.97 — the same product and the same review pool, ten pounds apart. We have linked the cheaper of the two. The Tank volume field, following the pattern of this entire category, reads 500 Millilitres and describes the detergent bottle.", // TEXTO SEO LONGO
                'pros' => ['Integrated hose reel, which the £169 Kärcher does not have', 'Foam cannon and 6-in-1 adjustable nozzle included', 'Even on its conservative figures it makes about 1,692 hydraulic watts', 'Costs £84.98, and we linked the cheaper of its two listings'], // PONTOS POSITIVOS
                'contras' => ['Title says 180 bar and 450 l/h while the spec table says 145 bar and 420 l/h', 'Sold under two ASINs sharing one pool of 138 ratings, £10 apart', 'Tank volume field contains the detergent bottle size', 'Only 138 ratings and no brand history in the UK'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'ETOOLAB Pressure Washer 2000W with 4 Wheels and Foam Cannon',             // NOME (ENCURTADO)
                'price' => '£119.99',                                                               // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 48,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61mnW5-1nOL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'ETOOLAB 2000W pressure washer with four wheels and brass nozzles',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0H7K8S69M?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The machine that gave this article its headline: 345 bar and 680 l/h from a 2000W motor would need 6,516 watts of hydraulic power. That is 326% of what goes in.', // TEXTO CURTO (CARD)
                'body' => "Take the numbers on this listing at face value and work them through. Three hundred and forty-five bar multiplied by 680 litres per hour, divided by 36, is 6,516 watts of hydraulic power. The motor is 2,000 watts. To deliver those figures simultaneously the pump would have to be 326% efficient, which is to say it would have to create energy. Every other machine in this comparison lands between 78% and 92%, which is the honest range for a pump, and Kärcher's £459.99 flagship stops at 180 bar.

To be precise about what is and is not being claimed: the specification table says 5000 Pound per Square Inch, which converts to 344.7 bar, so at least the listing is internally consistent. The likely explanation is that 345 bar is a burst or stall figure measured with the trigger closed and no water moving, while 680 l/h is measured with the trigger open and no pressure — two unrelated maximums presented as one machine. That is not illegal, but it is not a specification either.

There is a real product underneath. Four lockable wheels are genuinely useful on a driveway, the four quick-connect brass nozzles at 0, 15, 25 and 40 degrees are better hardware than the plastic ones most rivals ship, and 48 buyers have rated it 4.7. Judge it as a well-equipped 2,000 watt washer that will perform somewhere near the Amazon Basics at number eight, and it is decent value. Judge it on 345 bar and you are buying a number that cannot exist.", // TEXTO SEO LONGO
                'pros' => ['Four lockable wheels, genuinely useful on a driveway', 'Four quick-connect brass nozzles rather than plastic', 'Foam cannon included', '4.7 stars from its first 48 buyers'], // PONTOS POSITIVOS
                'contras' => ['345 bar at 680 l/h needs 6,516 hydraulic watts from a 2,000 watt motor', 'That is 326% efficiency, which is physically impossible', 'The two headline figures cannot be produced at the same time', 'Only 48 ratings and no UK brand history'], // PONTOS NEGATIVOS
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
        $this->command?->info("PressureWashersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
