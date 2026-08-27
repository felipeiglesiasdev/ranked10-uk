<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class DehumidifiersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE DESUMIDIFICADORES DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // FOCUS KEYWORD: best dehumidifier for home
        // KEYWORDS SECUNDARIAS: best dehumidifier / dehumidifier for damp /
        // dehumidifier for condensation / quiet dehumidifier / dehumidifier for bedroom /
        // laundry drying dehumidifier / low energy dehumidifier / 20l dehumidifier /
        // best dehumidifier uk / dehumidifier for mould
        //
        // ANGULO: O CAMPO "Floor area" DA FICHA DA AMAZON E INUTILIZAVEL NESTA CATEGORIA.
        // A MESMA EXTRACAO DE 12L/DIA APARECE COMO 1, 1,5, 162 E 2.000 PES QUADRADOS EM
        // LISTAGENS DIFERENTES — VARIACAO DE 2.000x. AS UNIDADES TAMBEM SE MISTURAM
        // (sq ft x m²) E A CAPACIDADE APARECE EM LITROS E EM PINTS. ENTAO O TEXTO ENSINA
        // A DIMENSIONAR PELO PAR EXTRACAO + TANQUE, QUE SAO CONFIAVEIS.
        //
        // DADOS COLETADOS DIRETO DA AMAZON UK (ENTREGA MANCHESTER M4 6BD), DA TABELA DE
        // ESPECIFICACOES E DO "ABOUT THIS ITEM" DE CADA PAGINA DE PRODUTO.
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO JA CADASTRADO)
        ];

        $article = [
            'slug' => 'best-dehumidifier-for-home',                              // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD
            'title' => 'Best Dehumidifier for Home in 2026: 10 Ranked by Extraction and Running Cost', // TITULO / H1 - CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Dehumidifier for Home 2026: Top 10 Ranked',     // TITLE DA ABA/GOOGLE (45 CHARS)
            'meta_description' => 'We ranked the best dehumidifier for home options on Amazon by extraction rate, tank size and running cost — and found half the listings give impossible room sizes.', // META DESCRIPTION (159 CHARS)
            'focus_keyword' => 'best dehumidifier for home',                     // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "There is one number you would naturally use to pick a dehumidifier, and on Amazon it is broken. The spec table on every listing has a \"floor area\" field, and across the ten units here the same 12 litres per day of extraction is listed as covering 1 square foot, 1.5 square feet, 162 square feet and 2,000 square feet. That is a 2,000-fold spread for identical performance. Some listings switch to square metres, and two quote capacity in pints rather than litres. So the honest way to choose the best dehumidifier for home use is to ignore that field entirely and read two numbers that are reliable: extraction in litres per day, which tells you how much moisture it pulls, and tank size, which tells you how often you empty it. We ranked the top 10 dehumidifiers on Amazon from £85 to £170 on those two figures, plus running cost per hour and noise, because a machine that runs all winter is judged on the electricity bill as much as the damp.", // INTRO OTIMIZADA - FOCUS KEYWORD + ANGULO PROPRIO
            'conclusion' => "Picking the best dehumidifier for home use comes down to matching extraction to the problem and tank size to your patience. For one damp bedroom or a bathroom, 12 litres a day is plenty and the cheaper units here do the job. For a whole flat, persistent condensation or drying laundry indoors through winter, step up to 20 litres, because an undersized unit simply runs constantly and costs more to achieve less. Then look at the tank: a 25L/day machine with a 1.9L tank will need emptying several times a day at full tilt, which is why a big extraction figure paired with a small tank is a worse buy than the numbers suggest. Running cost matters more here than in almost any other appliance, since a dehumidifier may run for months — the difference between 5p and 7p per hour is roughly £15 across a British winter. And ignore the floor area field on the listing; if the seller cannot decide whether their machine covers one square foot or two thousand, it is not a number to plan around.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => now(),                                             // DATA DE PUBLICACAO
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Pro Breeze 12L/Day Dehumidifier, Which? Best Buy, 1.8L Tank, Under 38dB', // NOME (ENCURTADO)
                'price' => '£114.74',                                                                // PRECO (DA AMAZON UK, ENTREGA MANCHESTER)
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 5662,                                                             // Nº REVIEWS EXATO
                'image' => 'https://m.media-amazon.com/images/I/81krQcv8CpL._AC_SL1500_.jpg',        // IMAGEM PRINCIPAL EM ALTA
                'alt_text' => 'best dehumidifier for home',                                          // ALT = FOCUS KEYWORD (PRODUTO #1 = HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B073XNK45P?tag=ranked10-21',        // LINK AFILIADO
                'summary' => "The best dehumidifier for home use overall: a Which? Best Buy with more customer ratings than the rest of this list combined, running at 7p an hour and under 38dB.", // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "With 5,662 ratings this has more customer feedback behind it than every other unit on this page put together, and it holds the Which? Best Buy award for dehumidifiers in 2025. Which? described it as quiet enough that it should not bother you if you are working at home with it running nearby — which matters more than it sounds, because a dehumidifier is not something you switch on for an hour.

The numbers behind that are solid. It extracts 12 litres a day into a 1.8L tank, runs at under 38dB, and Pro Breeze puts the running cost as low as 7p per hour. Over a British winter that is the figure that decides whether you leave it on. The humidity sensor lets you set a target between 30% and 80% and shuts the unit off once it gets there, so it is not running pointlessly at 3am.

Three operating modes cover auto, continuous and sleep, there is a 24-hour timer, and a removable hose gives continuous drainage if you would rather not empty the tank at all. Four wheels are included. The one thing to weigh is capacity: 12 litres a day suits one damp room or a small flat. If you are fighting condensation across a whole house or drying laundry indoors regularly, the 20L Pro Breeze at number three is the better fit.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Which? Best Buy 2025 for dehumidifiers', '5,662 ratings, the most on this list by far', 'Runs from 7p per hour', 'Under 38dB, quiet enough to work beside'], // PONTOS POSITIVOS
                'contras' => ['1.8L tank is small if you run it continuously', '12L/day is not enough for a whole house'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Devola 12L/Day Low Energy Dehumidifier, Which? Great Value, 36dB',        // NOME (ENCURTADO)
                'price' => '£139.80',                                                                // PRECO
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 886,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61FF1WySsxL._AC_SL1500_.jpg',        // IMAGEM
                'alt_text' => 'Devola 12L/Day Low Energy Dehumidifier, Which? Great Value, 36dB',    // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09FXYHCC9?tag=ranked10-21',        // LINK AFILIADO
                'summary' => "The cheapest to run and the quietest here: 5p per hour and 36dB, with two independent awards and the only unit that still works at 5°C.", // TEXTO CURTO (CARD)
                'body' => "If the machine is going to run through a British winter, this is the one that costs least to do it. Devola quotes 5p per hour based on 24p/kWh, the lowest published figure on this list, and at 36dB it is also the quietest at full speed. Against the Pro Breeze at number one, those 2p an hour work out at roughly £15 over a winter of heavy use.

It carries two independent endorsements rather than one: Which? named it a Great Value dehumidifier in November 2025, and it is approved by the Good Housekeeping Institute for 2026. Extraction is 12 litres a day into a 2L tank, with a drainage hose included for continuous running, four castors and a carry handle. It weighs 10.5kg and measures 47 x 25.5 x 22cm.

The specification that sets it apart is temperature. Devola states it extracts effectively down to 5°C, which most compressor dehumidifiers struggle with — and an unheated garage, conservatory or hallway in January is exactly where damp forms. Worth knowing about the listing itself: its spec table gives the floor area as 1 square foot, which is obviously wrong for a 12L machine and a good illustration of why that field is worth ignoring.", // TEXTO SEO LONGO - SINALIZA O ERRO DA FICHA
                'pros' => ['Cheapest to run here at 5p per hour', 'Quietest on this list at 36dB', 'Which? Great Value plus Good Housekeeping approval', 'Still extracts at temperatures as low as 5°C'], // PONTOS POSITIVOS
                'contras' => ['£25 more than the Pro Breeze for the same 12L extraction', 'Its listing gives the floor area as 1 square foot'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Pro Breeze 20L/Day Compressor Dehumidifier, Which? Best Buy, 5.5L Tank',  // NOME (ENCURTADO)
                'price' => '£161.49',                                                                // PRECO
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 2515,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61w+1I8jPRL._AC_SL1500_.jpg',        // IMAGEM
                'alt_text' => 'Pro Breeze 20L/Day Compressor Dehumidifier, Which? Best Buy, 5.5L Tank', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C62J7S74?tag=ranked10-21',        // LINK AFILIADO
                'summary' => "The pick for a whole flat or serious damp: 20 litres a day into a 5.5L tank, a second Which? Best Buy, and the only unit here that works well in cold rooms.", // TEXTO CURTO (CARD)
                'body' => "This is the step up when one room is not the problem. It extracts 20 litres a day and, crucially, pairs that with a 5.5L tank — the second largest here — so the extra capacity does not turn into emptying it three times a day. Pro Breeze rates it for rooms up to 325 square feet.

It is the second Which? Best Buy on this list, and the citation is worth reading: Which? noted that unlike many refrigerant models it works reasonably well in colder rooms too. That is the standard weakness of compressor dehumidifiers, and it is precisely the condition — a cold, unheated room in winter — where damp actually appears.

Five operating modes cover strong, natural, ventilation, continuous and laundry, and the laundry mode is claimed to extract up to 600% more water than the previous generation. A carbon filter tackles musty odours alongside a washable dust filter, and an auto-swing louvre rotates 120 degrees to circulate air rather than drying one corner of the room. There is a child lock and a sleep mode that kills the lights. At £161.49 it is the third most expensive here, but per litre of extraction it is better value than the 12L units above it.", // TEXTO SEO LONGO
                'pros' => ['Second Which? Best Buy on this list', '5.5L tank matches its 20L extraction properly', 'Works reasonably well in cold rooms', 'Carbon filter and 120° auto-swing louvre'], // PONTOS POSITIVOS
                'contras' => ['£46 more than the 12L version', 'At 60.8cm tall it is the largest unit here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'KNKA 16L/Day Quiet Dehumidifier, 260W, 3L Tank, Sleep Mode',              // NOME (ENCURTADO)
                'price' => '£139.99',                                                                // PRECO
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 1980,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/619cdHuOH1L._AC_SL1500_.jpg',        // IMAGEM
                'alt_text' => 'KNKA 16L/Day Quiet Dehumidifier, 260W, 3L Tank, Sleep Mode',          // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FKLX55JG?tag=ranked10-21',        // LINK AFILIADO
                'summary' => "The middle ground nobody else occupies: 16 litres a day at 6p an hour, with the third largest review base on this list.", // TEXTO CURTO (CARD)
                'body' => "Almost every dehumidifier sold is 12L or 20L, which forces a choice between not quite enough and more than you need. The KNKA sits at 16 litres a day, and for a two-bedroom flat with condensation on the windows that is often exactly right.

With 1,980 ratings it has the third largest sample on this list, behind only the two Pro Breeze units. It draws a maximum of 260W and KNKA puts the running cost at £0.06 per hour, which sits between the Devola's 5p and the Pro Breeze's 7p. The 3L tank is proportionate to the extraction, and KNKA rates it for 35 square metres, roughly 375 square feet.

Physically it is unusual: at 48 x 28 x 20cm it is wide and shallow rather than tall, and KNKA points out it takes up less floor space than a sheet of A4. A removable soft handle makes it easier to carry between rooms than the wheeled units here. Sleep mode turns off all the indicator lights, which matters in a bedroom. Note one small inconsistency in the listing: the title mentions a 3.3L tank while the spec table says 3 litres.", // TEXTO SEO LONGO - SINALIZA INCONSISTENCIA
                'pros' => ['16L/day fills the gap between 12L and 20L units', '1,980 ratings, third most on this list', '6p per hour from a 260W maximum draw', 'Smallest footprint here, less than an A4 sheet'], // PONTOS POSITIVOS
                'contras' => ['Listing says 3.3L tank in the title and 3L in the specs', 'No independent award unlike the units above'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Honeywell 12L/Day Dehumidifier, Good Housekeeping Approved, 2.5L Tank',   // NOME (ENCURTADO)
                'price' => '£159.50',                                                                // PRECO
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 772,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51w78RFrFcL._AC_SL1500_.jpg',        // IMAGEM
                'alt_text' => 'Honeywell 12L/Day Dehumidifier, Good Housekeeping Approved, 2.5L Tank', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CHS9N5BX?tag=ranked10-21',        // LINK AFILIADO
                'summary' => "A recognised brand with Good Housekeeping approval and 5p per hour running cost, but it is the loudest unit here and the priciest 12L machine on the list.", // TEXTO CURTO (CARD)
                'body' => "Honeywell is the most recognisable name in this ranking, and the unit is approved by the Good Housekeeping Institute for 2025. It matches the Devola on running cost at 5p per hour, calculated at 25p/kWh, and its 2.5L tank is larger than both 12L units above it, so it needs emptying less often.

Four operating modes include a one-click laundry drying mode that Honeywell positions as a cheaper alternative to a tumble dryer, using higher fan speed for airflow. There is a 24-hour timer, a filter cleaning alert, auto defrost and auto restart, plus a carry handle and four castors. Honeywell suggests it suits a two to three bedroom house or flat.

Two things keep it at number five. It is the loudest unit here by its own figures: 40dB normally, rising to 42.5dB in laundry mode, against 36dB for the Devola and under 38dB for the Pro Breeze. In a bedroom that gap is audible. And at £159.50 it is the most expensive 12L machine on this list, £44.76 more than the Pro Breeze that carries a stronger award and seven times the reviews. Its spec table also lists the floor area as 1.5 square feet, another example of that field being unusable.", // TEXTO SEO LONGO
                'pros' => ['Good Housekeeping Institute approved for 2025', '5p per hour running cost', '2.5L tank, largest of the 12L units here', 'Filter cleaning alert, auto defrost and auto restart'], // PONTOS POSITIVOS
                'contras' => ['Loudest here at 40dB, rising to 42.5dB on laundry mode', 'Most expensive 12L unit on this list at £159.50'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Hangsun 20L/Day Dehumidifier, 4.5L Tank, Three Modes, Child Lock',        // NOME (ENCURTADO)
                'price' => '£139.99',                                                                // PRECO
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 444,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51eiGqR86IL._AC_SL1500_.jpg',        // IMAGEM
                'alt_text' => 'Hangsun 20L/Day Dehumidifier, 4.5L Tank, Three Modes, Child Lock',    // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C9TCFNL9?tag=ranked10-21',        // LINK AFILIADO
                'summary' => "The cheapest way to 20 litres a day at £139.99, with a 4.5L tank and a colour-coded humidity indicator that tells you the situation at a glance.", // TEXTO CURTO (CARD)
                'body' => "If you need 20 litres of extraction and £161 for the Pro Breeze is more than you want to spend, this does the same daily volume for £21.50 less. The 4.5L tank is only a litre smaller, it covers the same 325 square feet, and its 4.6 average is the joint highest rating on this list.

The feature worth having is the colour-coded humidity indicator. Rather than making you interpret a percentage, the LED shows blue below 45%, green in the optimal 45-65% band and red above 65%. For anyone who is not going to learn what a healthy humidity level is, that turns the machine into something you can actually act on. The target humidity is adjustable from 30% to 80%.

Three modes cover auto, continuous laundry and sleep, with sleep running at under 41dB. Two fan speeds, a 24-hour timer, auto defrost to stop collected water freezing, a removable washable filter, 360-degree wheels and a child lock round it out. The reservation is evidence: 444 ratings is respectable but a fraction of the Pro Breeze units, and there is no independent award behind it.", // TEXTO SEO LONGO
                'pros' => ['Cheapest 20L/day unit here at £139.99', 'Joint highest rating on this list at 4.6', 'Colour-coded humidity indicator is genuinely useful', 'Auto defrost and child lock included'], // PONTOS POSITIVOS
                'contras' => ['444 ratings against the Pro Breeze 20L’s 2,515', 'Sleep mode at under 41dB is louder than the quietest here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'PureMate 20L/Day Dehumidifier, 6.5L Tank, Which? Highest Scoring',        // NOME (ENCURTADO)
                'price' => '£169.99',                                                                // PRECO
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 259,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51BlcsGce4L._AC_SL1500_.jpg',        // IMAGEM
                'alt_text' => 'PureMate 20L/Day Dehumidifier, 6.5L Tank, Which? Highest Scoring',    // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C9YR76G9?tag=ranked10-21',        // LINK AFILIADO
                'summary' => "Which? called this the highest-scoring dehumidifier it has tested, and it has the joint largest tank here at 6.5L — but it is also the most expensive on the list.", // TEXTO CURTO (CARD)
                'body' => "The endorsement on this one is the strongest in the ranking. PureMate quotes Which? directly: this is the highest-scoring dehumidifier they have tested, and if you want a fantastic refrigerant dehumidifier, look no further. That is a stronger claim than a Best Buy badge, which several units here also hold.

The hardware supports it. A 6.5L tank is the joint largest on this page, so at 20 litres a day you are emptying it roughly once every eight hours rather than constantly, and continuous drainage is available if you would rather never touch it. PureMate rates it for 30 square metres. The humidity sensor is paired with both an LED readout and a three-light indicator system, and four castors clip on or off depending on whether you want it to roll.

Two things place it at seven rather than higher. At £169.99 it is the most expensive unit in this ranking, £8.50 above the Pro Breeze 20L that holds a Which? Best Buy and has ten times the customer feedback. And with 259 ratings its own sample is among the smallest here, so the Which? verdict is doing most of the work. If you trust Which? over crowd data, move it up your own list.", // TEXTO SEO LONGO
                'pros' => ['Which? calls it the highest-scoring dehumidifier they have tested', 'Joint largest tank here at 6.5L', '4.6 rating, joint highest on this list', 'Removable castors and three-light humidity indicator'], // PONTOS POSITIVOS
                'contras' => ['Most expensive unit on this list at £169.99', 'Only 259 ratings, among the smallest samples here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'HumiZap 12L/Day Compressor Dehumidifier, Ultra Quiet Under 36dB',         // NOME (ENCURTADO)
                'price' => '£85.48',                                                                 // PRECO
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 675,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/6119WtQKjqL._AC_SL1500_.jpg',        // IMAGEM
                'alt_text' => 'HumiZap 12L/Day Compressor Dehumidifier, Ultra Quiet Under 36dB',     // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C8JT1SZ8?tag=ranked10-21',        // LINK AFILIADO
                'summary' => "The cheapest unit here at £85.48 and among the quietest at under 36dB, but its 1.6L tank is the smallest on the list.", // TEXTO CURTO (CARD)
                'body' => "At £85.48 this is the cheapest dehumidifier in the ranking, £29.26 below the Pro Breeze at number one, and with 675 ratings it is better evidenced than several units costing twice as much. For a single damp bedroom on a tight budget it is a sensible entry point.

It extracts 12 litres a day and runs at under 36dB, matching the Devola as the quietest here, with a night mode on top. Three modes include a dedicated laundry drying setting, there are three fan speeds rather than the two most units here offer, and it moves 108m³ of air per hour. Castors and hidden side handles make it easy to shift between rooms.

The compromise is the tank. At 1.6 litres it is the smallest on this list, which means that at full extraction you would be emptying it roughly seven times a day — so in practice this is a unit you set up with the continuous drainage hose near a drain, not one you carry around. Its bullets say it covers 15m², while its spec table claims 2,000 square feet, which is about 186m². The bullets are the believable figure, and the gap between the two is a good reason to treat that spec field as noise.", // TEXTO SEO LONGO - SINALIZA O ERRO
                'pros' => ['Cheapest unit on this list at £85.48', 'Under 36dB, joint quietest here', '675 ratings, better evidenced than pricier rivals', 'Three fan speeds and a dedicated laundry mode'], // PONTOS POSITIVOS
                'contras' => ['1.6L tank is the smallest here, needing frequent emptying', 'Listing claims 2,000 sq ft while its own bullets say 15m²'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'AEOCKY 25L/Day Compact Dehumidifier, Inverter Compressor, 1.9L Tank',     // NOME (ENCURTADO)
                'price' => '£119.98',                                                                // PRECO
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 247,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51zYfzrHn2L._AC_SL1500_.jpg',        // IMAGEM
                'alt_text' => 'AEOCKY 25L/Day Compact Dehumidifier, Inverter Compressor, 1.9L Tank', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FSLK3DD9?tag=ranked10-21',        // LINK AFILIADO
                'summary' => "The most extraction here for the money — 25 litres a day for £119.98 — but a 1.9L tank that is badly mismatched to that capacity.", // TEXTO CURTO (CARD)
                'body' => "On the headline figure this is the best value on the page: 25 litres a day is the highest extraction in the ranking, and £119.98 is below the price of most 20L units here. It uses a brushless DC inverter motor and a high-efficiency piston compressor, which is more advanced than the fixed-speed compressors in the cheaper units, and AEOCKY rates it for 50 square metres.

The problem is the pairing. A 25L/day machine with a 1.9L tank would need emptying roughly thirteen times a day if it ever hit its rated extraction. Compare that with the Pro Breeze 20L, which pairs slightly less capacity with a 5.5L tank, or the PureMate at 6.5L. Continuous drainage solves it, but only if you have somewhere to run the hose — otherwise the extraction figure is theoretical.

Two smaller points. The castor wheels are not pre-installed, which AEOCKY frames as flexibility but does mean assembly. And at 11.2kg it is the heaviest unit here despite the compact 26.7 x 20.4 x 43.2cm frame. With 247 ratings the evidence base is the second smallest on this list. Buy it if you can plumb it to a drain; skip it if you cannot.", // TEXTO SEO LONGO
                'pros' => ['Highest extraction here at 25L/day for £119.98', 'Brushless DC inverter motor and piston compressor', 'Rated for 50m², the largest area here', 'Compact frame for its capacity'], // PONTOS POSITIVOS
                'contras' => ['1.9L tank is badly undersized for 25L/day extraction', 'Wheels are not pre-installed and it weighs 11.2kg'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Nyxi 20L/Day Dehumidifier, XL 6.5L Tank, Touch Control',                  // NOME (ENCURTADO)
                'price' => '£144.93',                                                                // PRECO
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 415,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61QohF88X1L._AC_SL1500_.jpg',        // IMAGEM
                'alt_text' => 'Nyxi 20L/Day Dehumidifier, XL 6.5L Tank, Touch Control',              // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CX5C84BX?tag=ranked10-21',        // LINK AFILIADO
                'summary' => "A 6.5L tank and touch controls at a fair price, but the lowest rating on this list and the most confused spec table of the ten.", // TEXTO CURTO (CARD)
                'body' => "There is a decent machine here. The 6.5L tank is joint largest on this page, paired with 20 litres a day of extraction, so the capacity and the tank are properly matched — the opposite of the AEOCKY above it. A touch control panel replaces physical buttons, a three-colour humidity lamp shows the situation at a glance, and there is a timer, continuous drainage, a washable filter, castors and a carry handle.

What holds it back is a combination of rating and clarity. At 4.3 it is the lowest score on this list, the only one below 4.4, and that comes from 415 ratings — enough to be a real signal rather than noise.

Its spec table is also the most confused of the ten. Capacity is given as 50 pints, roughly 28 litres, while the product is sold as 20L/day. Floor area is listed as 4,500 square feet, about 418 square metres, which would be a small warehouse rather than a home. The bullets themselves say 20-30m², or 250 to 360 square feet, which is the credible number. None of that means the machine is bad, but when a listing cannot agree with itself on capacity or coverage, it is fair to weigh the other nine first.", // TEXTO SEO LONGO - HONESTO SOBRE A FICHA CONFUSA
                'pros' => ['6.5L tank properly matched to 20L/day extraction', 'Touch controls with a three-colour humidity lamp', 'Continuous drainage and washable filter', 'Castors and carry handle included'], // PONTOS POSITIVOS
                'contras' => ['Lowest rating here at 4.3 from a meaningful 415 ratings', 'Spec table says 50 pints and 4,500 sq ft; the bullets say 20L and 20-30m²'], // PONTOS NEGATIVOS
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
        $this->command?->info("DehumidifiersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
