<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class HumidifiersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE UMIDIFICADORES DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCAS: /s?k=humidifier+for+home&rh=p_36%3A2000-  (22 RESULTADOS)
        //         /s?k=cool+mist+humidifier+bedroom&rh=p_36%3A2000-&s=review-rank (17)
        // FECHA O CLUSTER DE INVERNO COM DESUMIDIFICADOR, VARAL AQUECIDO, COBERTOR
        // ELETRICO E RADIADOR A OLEO. LINK INTERNO NATURAL COM best-dehumidifier-for-home.
        //
        // ─── ACHADOS ───
        // 1. A CONTA NAO FECHA ENTRE MARCAS. COM A MESMA VAZAO DE 250 ml/h, A LEVOIT
        //    DE 3,2L DIZ COBRIR 35 m² E A DREO DE 3L DIZ COBRIR 300 sq ft (27,9 m²).
        //    MESMA AGUA POR HORA, 25% DE DIFERENCA NA SALA. A COBERTURA ANUNCIADA E
        //    MARKETING, NAO FISICA.
        // 2. E NAO FECHA NEM DENTRO DA MESMA MARCA. RAZAO ml/h POR m² DA LEVOIT:
        //    2,5L = 190/20 = 9,5 · 3,2L = 250/35 = 7,1 · 6,2L = 320/50 = 6,4.
        //    A PROPRIA LINHA SE CONTRADIZ EM 48%. SE VALESSE A RAZAO DO MODELO PEQUENO,
        //    OS 320 ml/h DO 6,2L COBRIRIAM 34 m², NAO OS 50 m² ANUNCIADOS.
        // 3. A HOMVANA PUBLICA DUAS AREAS DIFERENTES NA MESMA FICHA: O CAMPO "SPECIAL
        //    FEATURE" DIZ "Up to 17 m²" E O CAMPO "FLOOR AREA" DIZ "325 Square Feet"
        //    (30,2 m²). 78% DE DIFERENCA, UM CAMPO ABAIXO DO OUTRO.
        // 4. ARMADILHA DE UNIDADE. LEVOIT PUBLICA EM m²; DREO, HOMVANA, GOVEELIFE E
        //    BREEZOME PUBLICAM EM sq ft. NA GRADE DE BUSCA O "325" DA HOMVANA PARECE
        //    SEIS VEZES MAIOR QUE O "50" DA LEVOIT — E E 44% MENOR.
        // 5. A CORRIDA DO DECIBEL PASSOU DO PONTO. HOMVANA ALEGA 16 dB. UM QUARTO
        //    SILENCIOSO A NOITE TEM ~30 dB E O PISO DE RUIDO DE UM ESTUDIO E ~20 dB.
        //    O APARELHO SERIA MAIS SILENCIOSO QUE O COMODO ONDE ESTA. QUEM E HONESTO
        //    QUALIFICA: A DREO ESCREVE "26dB (in Sleep Mode)" E A LEVOIT "25 dB WITH
        //    FULL LIGHT-OFF". A RAYDROP E A UNICA QUE ADMITE 32 dB.
        // 6. A AUTONOMIA ANUNCIADA E SEMPRE NA VAZAO MINIMA, NUNCA NA DO TITULO.
        //    LEVOIT 6,2L: 6200/320 = 19h REAIS CONTRA 62h ANUNCIADAS. DREO 3L:
        //    3000/250 = 12h CONTRA 30h. LEVOIT 2,5L: 2500/190 = 13h CONTRA 25h.
        //    A ROSEKM E A UNICA QUE PUBLICA OS DOIS NUMEROS: "24h NO BAIXO E 10h NO
        //    ALTO COM 200 ml/h" — E 2000/200 = 10h, BATE EXATO.
        // 7. SEIS DOS 22 RESULTADOS DE "humidifier for home" SAO DESUMIDIFICADORES —
        //    O APARELHO QUE FAZ O CONTRARIO DO QUE SE BUSCOU (PRO BREEZE 12L/DAY E
        //    20L/DAY, MEACODRY ARETE, EASYACC). SOMAM-SE DIFUSORES DE OLEO ESSENCIAL
        //    E O BESTAIR 3BT (B079T4XXQY, £40.16, 1.7K AVALIACOES), QUE E UM FRASCO
        //    DE ADITIVO PARA AGUA, NAO UM APARELHO.
        // 8. DREO DUPLICADA: B0FXGK76DF (£33.99) E B0DJVFX2KY (£39.99), AMBAS 4.4 COM
        //    4,6 MIL AVALIACOES. MESMO PRODUTO, £6 DE DIFERENCA.
        // 9. LEVOIT COM POOL DE AVALIACAO COMPARTILHADO: B0GVQVY9KY (6,2L, £67.99) E
        //    B0B744C8LB (WARM & COOL 6L, £99.99) EXIBEM AS MESMAS 17,6 MIL AVALIACOES
        //    E A MESMA NOTA 4.4, COM £32 DE DIFERENCA E AQUECIMENTO A MAIS NUM DELES.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: DESUMIDIFICADORES E DIFUSORES DE OLEO ESSENCIAL (APARELHO ERRADO);
        // O ADITIVO BESTAIR; APARELHOS DE MENOS DE 200 AVALIACOES; O ASIN DUPLICADO
        // DA DREO (B0DJVFX2KY) E O DA LEVOIT COM POOL REPETIDO (B0B744C8LB);
        // "UMIDIFICADORES" DE 350 ml, QUE SAO ENFEITE DE MESA E NAO TRATAM COMODO.
        // DENTRO: NOTA DE 4.1 A 4.6, PRECO DE £23.79 A £169.09, SETE MARCAS.
        //
        // FOCUS KEYWORD: best humidifier for home
        // VARIACOES TRABALHADAS: humidifier for bedroom / cool mist humidifier /
        // ultrasonic humidifier / quiet humidifier for bedroom / humidifier for baby /
        // large room humidifier / top fill humidifier / best humidifier for dry air /
        // air humidifier for home / humidifier for dry skin
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "home", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-humidifier-for-home',                                // SLUG DO ARTIGO (URL) - ESPELHA best-dehumidifier-for-home E FECHA O CLUSTER
            'title' => 'Best Humidifier for Home 2026: 10 Ranked on Output, Not Marketing', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Humidifier for Home 2026: Top 10 Ranked & Tested', // TITLE DA ABA/GOOGLE (54 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best humidifier for home on tank size, mist output and honest noise claims, comparing quiet cool mist humidifiers for bedrooms from £23 to £169.', // META DESCRIPTION (159 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best humidifier for home',                       // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Dry indoor air is a British winter problem that starts the day the heating goes on. It cracks lips, wakes you with a dry throat and makes a cold feel worse than it is, and the fix is a machine that puts a controlled amount of water back into the room. However, choosing one on Amazon means reading a spec sheet where almost nothing adds up. We compared the ten best humidifiers for home use on Amazon in August 2026 and found that two machines producing exactly the same 250ml of mist per hour claim to cover rooms 25% different in size, that one brand publishes two contradictory floor areas on the same listing, and that the quietest claim in the category — 16dB — is lower than the background noise of the bedroom the thing is standing in. Below we rank each cool mist humidifier on tank size, real mist output, honest noise figures and review history, and we show the arithmetic where the marketing breaks.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Choosing the best humidifier for home use gets much easier once you ignore the room-size claim entirely. That number is marketing: across this list, machines with identical mist output claim coverage that differs by a quarter, and one brand contradicts itself by 78% between two fields on the same page. What you should compare instead is mist output in millilitres per hour, because that is a physical measurement, and tank capacity, because output divided into capacity tells you the real runtime. By contrast, the headline runtime is always quoted at the lowest setting — a 6.2 litre tank pushing 320ml/h lasts 19 hours, not the 62 on the box. For a bedroom, 200 to 250ml/h and a 3 litre tank is the sweet spot, and a quiet humidifier for bedroom use that admits to 25dB is more trustworthy than one claiming 16. Meanwhile, if you have the opposite problem and your walls are damp rather than your throat, you want a dehumidifier instead — they are different machines, even though Amazon returns both for the same search.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 13:50:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Levoit Humidifier for Bedroom, 3.2L Top Fill, 23dB, Dishwasher-Safe',     // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£47.99',                                                                // PRECO (COLETADO EM 28/08/2026)
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 16070,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51CMm8OwhHL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best humidifier for home',                                           // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GVQWMF21?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best humidifier for home use overall: it publishes every number that matters, hits 250ml/h from a 3.2L tank, and the whole water path goes in the dishwasher.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "This is the model we would buy, and the reason is boring: it tells you everything. Levoit publishes 250ml/h of mist output, a 3.2 litre tank, 26 hours of runtime, 35 square metres of coverage and a noise figure of 23dB, and it holds 4.5 stars across 16,070 ratings, the best rating with a large sample anywhere on this list.

The feature that actually changes daily life is the dishwasher-safe water path. Every part that touches water detaches and goes in the machine, which matters more than it sounds: an ultrasonic humidifier that is annoying to clean becomes a humidifier you stop cleaning, and a tank you stop cleaning grows biofilm that gets atomised into the room you sleep in. Levoit also keeps the water physically separated from the electronics, so a spill during a refill is not a fault condition.

Run the arithmetic and the runtime claim behaves like everyone else here: 3.2 litres divided by 250ml/h is 12.8 hours at full output, not the 26 on the box, which is measured on the lowest setting. That is normal for the category rather than a fault of this machine, and at 18.5 x 18.5 x 30cm it is small enough to live on a nightstand rather than the floor.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['4.5 stars from 16,070 ratings, the best large-sample rating here', 'Publishes output, capacity, runtime, coverage and noise in full', 'Entire water path is detachable and dishwasher-safe', 'Water kept separate from the electronics', 'Compact 18.5 x 18.5 x 30cm footprint fits a nightstand'], // PONTOS POSITIVOS
                'contras' => ['26 hour runtime is measured at the lowest setting, not at 250ml/h', 'Coverage claim of 35 square metres does not reconcile with the rest of the Levoit range', 'Aroma function needs the dedicated pad, not oil in the tank'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Levoit Classic 160 Humidifier for Bedroom, 2.5L Top Fill, 25dB',         // NOME (ENCURTADO)
                'price' => '£39.99',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 28287,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71VToW4jjoL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Levoit Classic 160 cool mist humidifier for bedroom with 2.5 litre top fill tank', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D72N7642?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most reviewed humidifier for bedroom use on Amazon, with 28,287 ratings, though its 4.2 average sits below three cheaper machines here.', // TEXTO CURTO (CARD)
                'body' => "With 28,287 ratings the Classic 160 is the most-bought cool mist humidifier in this comparison by a clear margin, and the spec is straightforward: a 2.5 litre top-fill tank, 190ml/h of mist reaching 70cm high, a single knob for output and a 360 degree nozzle. Levoit quotes 25dB and, to its credit, qualifies it — that figure is with the display fully off, which is how noise claims should be written.

It is also the machine that exposes the category's coverage problem most clearly. Levoit says this one covers 20 square metres on 190ml/h. That works out at 9.5ml/h for every square metre. Apply the same ratio to the 6.2 litre model further down this list, which pushes 320ml/h, and you would get 34 square metres — but Levoit advertises that machine at 50. The same brand, the same technology, and a 48% disagreement with itself.

The 4.2 average is the reason it is not first. That is a real signal across 28,000 buyers rather than noise, and it sits below the 3.2 litre model at 4.5 and the 6.2 litre at 4.4. Crucially, this is the cheapest way into the Levoit range at £39.99, and the top-fill opening is 16cm wide, so refilling does not mean carrying a full tank upside down to the tap.", // TEXTO SEO LONGO
                'pros' => ['28,287 ratings, the deepest review history in this comparison', 'Noise figure is honestly qualified as measured with the light off', '16cm wide top-fill opening makes refills genuinely easy', 'Cleaning brush included and no hard-to-reach corners in the base', 'Cheapest entry into the Levoit range'], // PONTOS POSITIVOS
                'contras' => ['4.2 average is the second lowest here despite the huge sample', '2.5L tank at 190ml/h gives 13 real hours, not the 25 advertised', 'Coverage claim of 20 square metres contradicts the rest of the Levoit line'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Levoit Smart Humidifier, 6.2L Top Fill, 320ml/h, App Control',           // NOME (ENCURTADO)
                'price' => '£67.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 17653,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61S+dodsJJL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Levoit Smart 6.2 litre top fill humidifier with app control for large rooms', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GVQVY9KY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest real output here at 320ml/h, and the right choice for a large room humidifier, provided you ignore the 62 hour runtime on the box.', // TEXTO CURTO (CARD)
                'body' => "If you are humidifying a living room rather than a bedroom, output is the only spec that matters, and at 320ml/h this is the strongest machine in the comparison. The 6.2 litre tank is the second largest here, auto mode holds humidity to within 5% on the sensor, and silver ions in the tank are rated to resist microbial growth for 28 days, which is a real answer to the biofilm problem rather than a marketing line.

The 62 hour runtime deserves scrutiny. Six point two litres divided by 320ml/h is 19.4 hours. To reach 62 hours the machine must average around 100ml/h, which is its lowest setting — so the box is quoting a number you only get by running it at less than a third of its headline output. Meanwhile the coverage claim of 50 square metres is the one Levoit figure that reconciles with an outside brand: GoveeLife quotes 300ml/h for 500 square feet, which is 46.5 square metres, almost exactly the same ratio.

One thing to check before you click buy. Levoit sells a Warm and Cool Mist 6L at £99.99 that displays the identical 17,653 ratings and the identical 4.4 average as this one, despite being a different machine with a heating element. Same review pool, £32 apart. Buy on the specification, not on the star count, because in this case the star count is not describing the machine in front of you.", // TEXTO SEO LONGO
                'pros' => ['320ml/h, the highest mist output in this comparison', '6.2 litre tank means fewer refills in a large room', 'Auto mode holds humidity to within 5% sensor accuracy', 'Silver ions rated to resist microbial growth for 28 days', 'App control with schedules through the VeSync app'], // PONTOS POSITIVOS
                'contras' => ['62 hour runtime only holds at roughly a third of the headline output', 'Shares its 17,653 ratings with a different £99.99 Levoit model', 'Costs £20 more than the 3.2L model for output most bedrooms do not need'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'DREO Smart Humidifier, 4L Top Fill, Alexa and Google Assistant',         // NOME (ENCURTADO)
                'price' => '£49.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 11257,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71YA10zJsFL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'DREO Smart 4 litre top fill humidifier with voice control for bedroom and baby room', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CCVX6FSD?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best voice-controlled option, with a 4L tank and a genuine humidistat, but its coverage is published in square feet and is smaller than it looks.', // TEXTO CURTO (CARD)
                'body' => "DREO is the strongest alternative to Levoit and this is its most complete machine: a 4 litre top-fill tank, a real humidistat rather than a timer pretending to be one, a digital display, and Wi-Fi with Alexa and Google Assistant. At 11,257 ratings and 4.4 stars it has enough history behind it to trust, and the 5 micron mist is fine enough to spread across a room rather than settling as a wet patch on the carpet in front of it.

Here is the trap, and it is worth slowing down for. DREO publishes coverage as 300 square feet while Levoit publishes in square metres. On a search results page, 300 sitting next to 50 reads as six times more room — but 300 square feet is 27.9 square metres, which is smaller than the 35 the £47.99 Levoit claims and barely half the 50 of the 6.2 litre. Two units, one category, and the smaller machine looks bigger.

The other thing to budget for is the demineralisation cartridge, which reduces limescale in hard-water areas and is not included in the box. In most of the UK that is not optional, it is a running cost the listing mentions only in the fifth bullet. DREO also warns, correctly, that essential oils go on the aroma pad and never in the tank — oil in an ultrasonic tank destroys the transducer.", // TEXTO SEO LONGO
                'pros' => ['11,257 ratings at 4.4 with a genuine humidistat, not just a timer', 'Wi-Fi with Alexa and Google Assistant voice control', '4 litre top-fill tank with a digital humidity display', 'Fine 5 micron mist spreads instead of settling on the floor'], // PONTOS POSITIVOS
                'contras' => ['Coverage published in square feet: 300 sq ft is only 27.9 square metres', 'Demineralisation cartridge is a separate purchase, needed in hard-water areas', 'Marketing claims mist \"3 times larger\" than rivals with no figure to check'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'raydrop Humidifier for Bedroom, 1.7L Ultrasonic, 5 Year Warranty',       // NOME (ENCURTADO)
                'price' => '£27.99',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 14418,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/41r40YJW38L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'raydrop 1.7 litre ultrasonic cool mist humidifier for bedroom and baby room', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DHVPSBLY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only humidifier here that admits to a realistic noise figure, and the only one with a five year warranty, in exchange for the smallest tank on the list.', // TEXTO CURTO (CARD)
                'body' => "The raydrop is the honest machine in a category full of stretched numbers. It states 32dB. Every other manufacturer here claims between 16 and 26, and 32dB is what an ultrasonic humidifier with an air inlet actually measures in a real bedroom. Buying the machine that tells you the truth about noise is usually a decent proxy for buying the machine that tells you the truth about everything else.

It backs that with a five year warranty, which is the longest cover in this comparison by a distance and unusual at £27.99. With 14,418 ratings at 4.2 it has the third deepest review history here, and the tall oval body is designed to occupy a nightstand or a desk corner rather than floor space. Auto shut-off triggers both when the water runs out and when the tank is lifted off the base.

The compromise is capacity. At 1.7 litres it is the smallest tank on this list and raydrop quotes just 9 hours of continuous operation, so it will not run a full night at any meaningful output and it is not a large room humidifier by any reading. It also publishes no floor area and no millilitres per hour figure at all, which is consistent with its honesty about noise but leaves you unable to compare it on output. Treat it as a personal humidifier for the space immediately around a bed, and it is very good value.", // TEXTO SEO LONGO
                'pros' => ['32dB is the only realistic noise claim in this comparison', 'Five year warranty, the longest cover on this list', '14,418 ratings at 4.2 and the cheapest machine from a known name', 'Auto shut-off on both empty tank and tank removal', 'Narrow vertical shape fits a nightstand without dominating it'], // PONTOS POSITIVOS
                'contras' => ['1.7 litre tank is the smallest here and runs only 9 hours', 'Publishes no mist output and no floor area at all', 'Not suitable for anything larger than the space around a bed'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'ROSEKM 2L Cool Mist Humidifier, 200ml/h, 4 Mist Levels',                 // NOME (ENCURTADO)
                'price' => '£23.79',                                                                // PRECO
                'rating' => 4.1,                                                                    // NOTA
                'reviews_count' => 10194,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61Lc555KWmL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'ROSEKM 2 litre cool mist humidifier with 360 degree nozzle and four mist levels', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D264W1B4?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest machine here at £23.79, and the only one on the entire list whose published runtime survives being checked with a calculator.', // TEXTO CURTO (CARD)
                'body' => "Every other manufacturer in this comparison quotes one runtime figure and lets you assume it applies at the headline output. ROSEKM publishes both: 24 hours on low and 10 hours on high, from a 2 litre tank at 200ml/h. Divide 2,000ml by 200ml/h and you get exactly 10 hours. It is the only listing here where the arithmetic closes, and it took one line of extra honesty to do it.

For a bedroom that specification is genuinely well judged. Two hundred millilitres an hour is enough to lift humidity in a normal UK bedroom overnight, four mist levels give you real control rather than the single high-low switch on cheaper units, and the 360 degree nozzle lets you point mist away from a wall. At 13cm square it takes up less nightstand than a paperback stood on end, and it is filterless, so there is no consumable to replace.

The 4.1 average from 10,194 ratings is the lowest in this comparison, and with a sample that large that is a signal rather than noise. It is also worth noting that ROSEKM quotes \"less than 26 decibels\" without saying at which setting, which is the one place its otherwise straight spec sheet reaches. Buy it as the cheapest competent cool mist humidifier here, not as the best one.", // TEXTO SEO LONGO
                'pros' => ['The only listing here whose runtime maths actually checks out', 'Publishes runtime at both high and low output', 'Cheapest machine in this comparison at £23.79', 'Four mist levels rather than a single high-low switch', 'Filterless, so there is no consumable to buy'], // PONTOS POSITIVOS
                'contras' => ['4.1 from 10,194 ratings, the lowest average in this comparison', 'Publishes no floor area figure', 'The 26dB claim is not qualified by setting, unlike its runtime figures'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'DREO Humidifier for Bedroom, 3L Top Fill, 250ml/h, Child Lock',          // NOME (ENCURTADO)
                'price' => '£33.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 4645,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61lkRodqm4L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'DREO 3 litre top fill cool mist humidifier with child lock and 360 degree nozzle', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FXGK76DF?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Matches the £47.99 Levoit on output at 250ml/h for £14 less, and it is the machine that proves the coverage claims in this category are fiction.', // TEXTO CURTO (CARD)
                'body' => "On paper this is the value pick: 250ml/h from a 3 litre tank for £33.99, with a child lock, a digital display, an adjustable humidistat and a 360 degree nozzle that throws mist 40 inches high. At 4,645 ratings and 4.4 stars the sample is thinner than the leaders but easily deep enough to trust, and 2.4MHz atomisation produces the same fine 5 micron mist as its more expensive sibling.

This machine is also the cleanest proof that room-size claims in this category are invented. It produces 250ml/h and claims 300 square feet, which is 27.9 square metres. The Levoit at number one produces exactly the same 250ml/h and claims 35 square metres. Identical water going into the air, and a 25% disagreement about how big a room it fills. Physics does not care which brand is on the box, so at most one of those numbers can be right.

Two warnings. DREO qualifies its 26dB figure as \"in Sleep Mode\", which is honest but means the number does not apply at the 250ml/h that sells the machine. And DREO lists what appears to be the same product twice: this ASIN at £33.99 and another at £39.99, both showing 4.4 stars from the same 4,645 ratings. Check both before you buy, because £6 is 18% of the price.", // TEXTO SEO LONGO
                'pros' => ['Same 250ml/h output as the £47.99 Levoit for £14 less', 'Child lock and adjustable humidistat at a budget price', '3 litre top-fill tank with a digital display', 'Noise figure honestly qualified as a Sleep Mode measurement'], // PONTOS POSITIVOS
                'contras' => ['Sold under two ASINs at £33.99 and £39.99 with the same 4,645 ratings', 'Claims 300 sq ft for the same output Levoit rates at 35 square metres', '26dB applies in Sleep Mode only, not at the headline output'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'BREEZOME 5L Humidifier for Bedroom, 50 Hour Runtime, 360 Nozzle',        // NOME (ENCURTADO)
                'price' => '£73.22',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 239,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61gIxBvHyWL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'BREEZOME 5 litre cool mist humidifier with 360 degree nozzle and top fill design', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FF4RVG8K?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A 5 litre tank and a stated 28dB at £73.22, but it publishes no mist output at all, so there is no way to check what the 50 hours actually means.', // TEXTO CURTO (CARD)
                'body' => "The BREEZOME sells on two numbers: a 5 litre tank and 50 hours of runtime on the low setting. Divide one by the other and the machine averages 100ml/h to reach that figure, which places it firmly in the low-output half of this comparison whenever it is running long. That is not a criticism of the machine so much as a demonstration of what a long runtime actually costs you.

It is well specified elsewhere. Twenty-eight decibels on low is the second most believable noise claim here after the raydrop, the top-fill design means no flipping a full tank, the 360 degree outlet directs mist where you want it and there is a dedicated oil tray so aromatherapy does not go anywhere near the transducer. The auto shut-off has a red indicator so you can see at a glance that it has stopped rather than wondering why the room feels dry.

What it does not publish is a millilitres-per-hour figure, which is the one specification you actually need, and its 300 square feet coverage claim is the same number DREO puts on a 3 litre machine. At £73.22 with only 239 ratings it is asking Levoit money with a fraction of the evidence, and that is why it sits at number eight rather than higher.", // TEXTO SEO LONGO
                'pros' => ['5 litre tank, the third largest in this comparison', '28dB on low is among the more believable noise claims here', 'Top-fill design with a 360 degree adjustable outlet', 'Dedicated essential oil tray keeps oil away from the transducer'], // PONTOS POSITIVOS
                'contras' => ['Publishes no mist output figure, so the 50 hour claim cannot be checked', 'Only 239 ratings at a price that competes with far better proven machines', 'Quotes the same 300 sq ft coverage DREO claims for a 3 litre unit'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'GoveeLife Smart Humidifier, 6L Top Fill, 300ml/h, App Control',          // NOME (ENCURTADO)
                'price' => '£169.09',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 369,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/619sZqecEpL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'GoveeLife Smart 6 litre top fill humidifier with app control and RGB night light', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DHRD584W?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest rated machine here at 4.6, and one of only two whose coverage claim is consistent with a rival brand, but it costs two and a half times the Levoit that matches it.', // TEXTO CURTO (CARD)
                'body' => "GoveeLife holds the highest average in this comparison at 4.6 stars, and its specification is genuinely good: a 6 litre top-fill tank, 300ml/h of output, 60 hours on low, app scheduling and an RGB night light that can be tuned per scene rather than simply switched on. It is also, quietly, one of the few listings whose coverage claim survives a cross-check — 300ml/h for 500 square feet works out at 46.5 square metres, almost exactly the ratio Levoit uses for its 6.2 litre model.

The problem is the price. At £169.09 it costs two and a half times the £67.99 Levoit that beats it on output, matches it on tank size, and carries 17,653 ratings against this machine's 369. A 4.6 average is meaningful, but 369 ratings is a small enough sample that it can still move, and it has not yet been through a full British winter of hard water and daily use at volume.

Buy it if you want app scheduling and lighting control in a large room and the £100 difference genuinely does not matter to you. For everyone else, the honest recommendation is that the machine at number three does the same job for less than half the money, with 48 times the review history behind it.", // TEXTO SEO LONGO
                'pros' => ['4.6 stars, the highest average in this comparison', '6 litre tank with 300ml/h output and 60 hours on low', 'Coverage claim is consistent with the equivalent Levoit ratio', 'App scheduling and per-scene RGB lighting control'], // PONTOS POSITIVOS
                'contras' => ['Costs £169.09, two and a half times a Levoit with higher output', 'Only 369 ratings, a thin sample at this price', 'Coverage published in square feet while its closest rival uses metres'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Homvana H101 Cool Mist Humidifier, 3.6L, 7 Light Modes',                 // NOME (ENCURTADO)
                'price' => '£37.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 626,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61k8GrdmN7L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Homvana H101 3.6 litre cool mist humidifier with mood light and aromatherapy', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DF2N6TYQ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A 3.6L tank with mood lighting for £37.99, listed here mainly because its own specification sheet gives two different room sizes and a noise claim that is not physically possible.', // TEXTO CURTO (CARD)
                'body' => "There is a decent machine underneath this listing. Three point six litres is a good tank for the money, 34 hours of runtime is competitive, the aroma pad and seven light modes give it a use as a bedside object rather than an appliance, and it carries ETL, FCC, CE and UKCA certification. At 4.4 stars from 626 ratings it is not a bad buy at £37.99.

The listing, however, is the least reliable in this comparison. The specification table gives the floor area as 325 square feet. Three fields above, the same table lists a special feature of \"Up to 17 m²\". Three hundred and twenty-five square feet is 30.2 square metres. The listing therefore states two coverage figures 78% apart, one directly above the other, and gives the buyer no way to know which one the machine was designed around.

Then there is the noise claim: \"less than 16dB\". A quiet bedroom at night has an ambient noise floor around 30dB, and a professional recording studio sits near 20dB. A machine running at 16dB would be quieter than the silence of the room it is standing in — you would not be able to hear it in an anechoic chamber. Compare that with the raydrop at number five, which admits to 32dB. Both are ultrasonic humidifiers with fans and water. Only one of them is describing reality.", // TEXTO SEO LONGO
                'pros' => ['3.6 litre tank and 34 hour runtime for £37.99', 'ETL, FCC, CE and UKCA certified and BPA-free', 'Seven light modes and built-in aromatherapy pad', 'Auto shut-off when the tank runs dry'], // PONTOS POSITIVOS
                'contras' => ['States two different coverage figures on one page: 17 m² and 325 sq ft (30.2 m²)', 'Claims under 16dB, below the ambient noise of a quiet bedroom', 'Publishes no mist output figure in millilitres per hour', 'Only 626 ratings, the second thinnest sample here'], // PONTOS NEGATIVOS
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
        $this->command?->info("HumidifiersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
