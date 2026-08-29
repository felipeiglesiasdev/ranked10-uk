<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class SlowCookersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE SLOW COOKERS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA FILTRADA: /s?k=slow+cooker&rh=p_36%3A2500-  (19 ASINS UNICOS)
        // CATEGORIA KITCHEN: 5% DE COMISSAO. SAZONAL: PICO DE OUTUBRO A FEVEREIRO.
        //
        // ─── ACHADOS ───
        // 1. WATT POR LITRO E A ESPECIFICACAO QUE DECIDE QUANTO TEMPO O "LOW" LEVA DE
        //    VERDADE, E NENHUM ANUNCIO PUBLICA A CONTA. A TABELA COLETADA:
        //      MORPHY RICHARDS 6,5L .... 163 W = 25,1 W/L  ← MENOR
        //      HAMILTON BEACH 6,5L ..... 240 W = 36,9 W/L
        //      MORPHY RICHARDS 3,5L .... 153 W = 43,7 W/L
        //      CROCK-POT LIFT&SERVE 5L . 220 W = 44,0 W/L
        //      TOWER CAVALETTO 6,5L .... 300 W = 46,2 W/L
        //      CROCK-POT 6,5L .......... 300 W = 46,2 W/L
        //      CROCK-POT DIGITAL 3,5L .. 200 W = 57,1 W/L
        //      SWAN RETRO / NORDIC 3,5L. 200 W = 57,1 W/L  ← MAIOR
        //    SAO 2,3x DE VARIACAO. E DENTRO DA MESMA CAPACIDADE DE 6,5L A DIFERENCA E
        //    DE 84%: 163 W NA MORPHY RICHARDS CONTRA 300 W NA TOWER E NA CROCK-POT.
        // 2. O CASO MAIS GRITANTE E INTERNO A UMA MARCA SO. A MORPHY RICHARDS DE 6,5L
        //    RODA EM 163 W — APENAS 10 W A MAIS QUE A PROPRIA 3,5L, QUE RODA EM 153 W —
        //    PARA QUASE O DOBRO DO VOLUME. O TRABALHO DE UM SLOW COOKER E SEGURAR UMA
        //    MASSA GRANDE ENTRE 80 E 95 °C POR OITO HORAS; A MESMA RESISTENCIA NUMA
        //    PANELA DO DOBRO DO TAMANHO DEMORA MUITO MAIS PARA CHEGAR LA E SOFRE MAIS
        //    NUMA COZINHA FRIA DE INVERNO.
        // 3. CAPACIDADE ANUNCIADA NAO E CAPACIDADE UTIL. O PROPRIO MANUAL DE TODO SLOW
        //    COOKER MANDA ENCHER ENTRE METADE E TRES QUARTOS DA PANELA — ENTAO UM DE
        //    6,5L COMPORTA PERTO DE 4L DE COMIDA. NENHUM ANUNCIO DIZ ISSO.
        // 4. A CROCK-POT E A UNICA QUE TRADUZ LITRO EM PESSOA NO PROPRIO TITULO:
        //    "3.5 L (3-4 People)" E "6.5 L (8+ People)". A HAMILTON BEACH FAZ NO BULLET
        //    ("Feeds 6-8 people"). AS DEMAIS VENDEM SO O LITRO.
        // 5. DOIS PRODUTOS CROCK-POT DIFERENTES EXIBEM O MESMO POOL DE 6.891 AVALIACOES:
        //    O LIFT AND SERVE DE 5L (£45.99) E O DIGITAL DE 3,5L (£34.99). CAPACIDADE
        //    DIFERENTE, TAMPA DIFERENTE, £11 DE DIFERENCA, MESMA CONTAGEM E MESMA NOTA.
        // 6. A NINJA FOODI POSSIBLECOOKER ESTA EM DOIS ASINS COM AS MESMAS 1.741
        //    AVALIACOES A £119.99 (B0CFYMZF81) E £159.99 (B0FV98HRTW) — £40 DE
        //    DIFERENCA NO MESMO POOL, A MAIOR QUE JA ENCONTRAMOS EM QUALQUER CATEGORIA.
        //    A TOWER CAVALETTO REPETE O PADRAO COM 4.225 AVALIACOES A £34.95 E £34.99, E
        //    A MORPHY RICHARDS ACCENTS 3,5L COM 166 AVALIACOES EM DOIS ASINS A £39.99.
        // 7. A HAMILTON BEACH VENDE 240 W COMO "Energy-Efficient Design". DENTRO DA
        //    CATEGORIA ISSO E AO CONTRARIO: MAIS WATT NO MESMO VOLUME SIGNIFICA CHEGAR
        //    A TEMPERATURA MAIS RAPIDO E SEGURAR MELHOR. TODO SLOW COOKER E EFICIENTE
        //    COMPARADO A UM FORNO; USAR ISSO PARA VENDER O NUMERO DE WATT CONFUNDE AS
        //    DUAS COISAS.
        // 8. A FICHA DA SWAN NORDIC DECLARA "Material: Wood" NUM APARELHO ELETRICO DE
        //    COZINHA. E O ACABAMENTO DA ALCA, NAO A PANELA.
        // 9. BUSCA POLUIDA: A RUSSELL HOBBS SATISFRY (AIR FRYER) E A GOOD-TO-GO
        //    (MULTICOOKER) APARECEM NA PRIMEIRA PAGINA DE "slow cooker".
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: AIR FRYERS E MULTICOOKERS QUE NAO SAO SLOW COOKER; OS ASINS IRMAOS DA
        // TOWER, DA NINJA E DA MORPHY RICHARDS ACCENTS (MANTIDO O MAIS BARATO DE CADA
        // POOL); APARELHOS COM MENOS DE 1.000 AVALIACOES.
        // CROCK-POT E MORPHY RICHARDS APARECEM TRES E DUAS VEZES PORQUE DOMINAM A
        // CATEGORIA NO REINO UNIDO — A CROCK-POT LITERALMENTE INVENTOU O PRODUTO.
        // DENTRO: NOTA DE 4.5 A 4.7, PRECO DE £31.99 A £119.99, SETE MARCAS.
        //
        // FOCUS KEYWORD: best slow cooker
        // VARIACOES TRABALHADAS: slow cooker uk / crock pot / 6.5l slow cooker /
        // 3.5l slow cooker / digital slow cooker / sear and stew slow cooker /
        // best slow cooker for families / slow cooker with timer / ceramic slow cooker
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "kitchen", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-slow-cooker',                                        // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Slow Cooker 2026: 10 Ranked on Watts Per Litre',     // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Slow Cooker 2026: Top 10 Ranked and Compared',  // TITLE DA ABA/GOOGLE (51 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best slow cooker options on Amazon by watts per litre and real usable capacity, comparing 3.5L to 8L models from £31.99 to £119.99.', // META DESCRIPTION (147 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best slow cooker',                               // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Slow cooker listings give you two numbers — litres and watts — and never the one that connects them. Watts divided by litres is what decides how long low actually takes, because the job of a slow cooker is to bring a large mass of cold food up to somewhere between 80 and 95°C and hold it there for eight hours. Across the ten machines in this comparison that ratio runs from 25 to 57 watts per litre, a 2.3-fold spread, and the most striking case sits inside a single brand: Morphy Richards fits a 163 watt element to its 6.5 litre pot and a 153 watt element to its 3.5 litre one. Ten watts more, for nearly double the volume. Meanwhile the capacity on the box is the pot's total volume, not what you can put in it — every manufacturer's own manual says fill between half and three-quarters, so a 6.5 litre cooker holds around four litres of dinner. Below we rank the best slow cooker options on Amazon in August 2026 on the arithmetic the listings leave out.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Choosing the best slow cooker starts with dividing one published number by the other. Take the wattage, divide it by the litres, and anything above about 40 watts per litre will reach temperature in a sensible time and hold it through a cold January kitchen; anything near 25 will take most of the morning to get going, which matters if you load it at eight and want to eat at six. Then adjust the capacity down: the figure on the box is the pot brim-full, and you should fill between half and three-quarters, so buy roughly a third larger than the volume of food you actually cook. Crock-Pot is the only brand here that does that translation for you, printing 3 to 4 people on its 3.5 litre and 8 or more on its 6.5. By contrast, treat the number of heat settings as noise — every machine here has low, high and warm, and that is all a slow cooker needs. And check the review count against the model you are looking at rather than the brand, because two different Crock-Pot cookers on this page share one pool of 6,891 ratings, and a Ninja appears twice at £40 apart with the same 1,741.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 03:30:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Morphy Richards 3.5L Sear and Stew Slow Cooker, Hob Proof Pot, 153W',     // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£38.00',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 14078,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81w-LHKeDkL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best slow cooker',                                                   // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07B6MZW9F?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best slow cooker here by evidence and by design: 14,078 ratings at 4.7, and a hob-proof pot that lets you brown the meat in the same dish you cook it in.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Fourteen thousand ratings at 4.7 stars is the deepest evidence in this comparison by some margin, and Amazon marks it as the top-rated product in the category. The reason people keep it and rate it well is the pot: it is shatter-resistant aluminium and hob proof, which means you sear the meat directly in it on the stove and then drop the same pot into the base.

That single feature removes the step most people skip. Browning meat before slow cooking is where the flavour comes from, and when it means dirtying a separate frying pan most cooks decide the stew will be fine without it. Sear and Stew makes it one pot from start to finish, and it is the difference between a slow cooker that gets used weekly and one that lives in a cupboard.

On the arithmetic this article is about, it lands well: 153 watts across 3.5 litres is 43.7 watts per litre, which is comfortably in the range that gets a cold pot up to temperature in a reasonable time. The 3.5 litre size is right for two to four people, and remembering the half-to-three-quarters fill rule, that is roughly two to two and a half litres of actual food. Aluminium conducts heat faster than ceramic but is less forgiving of scorching at the edges, which is the trade you make for the hob-proof pot.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['14,078 ratings at 4.7, by far the deepest evidence here', 'Hob-proof pot lets you sear and slow cook in the same dish', '43.7 watts per litre, comfortably in the effective range', 'Publishes wattage, capacity, dimensions and weight in full', 'Dishwasher safe at £38.00'], // PONTOS POSITIVOS
                'contras' => ['Aluminium pot scorches more readily at the edges than ceramic', '3.5 litres is roughly 2 to 2.5 litres of usable capacity', 'No timer or programmable countdown'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Crock-Pot Digital Slow Cooker 3.5L, 200W, 20 Hour Timer',                 // NOME (ENCURTADO)
                'price' => '£34.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 6891,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81hDv7kP-KL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Crock-Pot digital slow cooker 3.5 litre with programmable timer',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C6XXJKHV?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best power-to-volume ratio here at 57 watts per litre, with a proper 20 hour timer, from the brand that invented the product — and it tells you how many people it feeds.', // TEXTO CURTO (CARD)
                'body' => "Two hundred watts across 3.5 litres is 57.1 watts per litre, the highest ratio in this comparison and more than double the Morphy Richards 6.5 litre further down this page. In practice that means a cold pot of stew reaches temperature quickly and holds it without struggling, which is the whole job.

The timer is the other reason to choose it. Programmable between 30 minutes and 20 hours with an automatic switch to keep warm means you set it in the morning and it manages itself, rather than cooking until you get home whenever that is. Combined with digital controls and a removable oven-safe bowl that goes straight to the table, it is the most complete small slow cooker here.

Crock-Pot also does something no other brand except Hamilton Beach bothers with: it translates litres into people, printing 3.5 L (3-4 People) in the title. That is genuinely useful, because litres are a measure of the empty pot and people are what you are actually shopping for. One thing to check before you buy: this listing and the Crock-Pot Lift and Serve at number six both display the identical 6,891 ratings, despite being different capacities at different prices. The reviews you are reading may not all be about the machine in front of you.", // TEXTO SEO LONGO
                'pros' => ['57.1 watts per litre, the best power-to-volume ratio in this comparison', 'Programmable timer from 30 minutes to 20 hours with auto keep warm', 'Translates capacity into people in the title', 'Oven-safe ceramic bowl serves straight to the table', 'From the brand that invented the slow cooker'], // PONTOS POSITIVOS
                'contras' => ['Shares its 6,891 ratings with a different Crock-Pot model at £45.99', '3.5 litres is around 2 to 2.5 litres of usable capacity', 'Ceramic bowl at 4.04kg is heavy to lift when full'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Tower Cavaletto 6.5L Slow Cooker, 300W, Cool Touch Handles',              // NOME (ENCURTADO)
                'price' => '£34.95',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 4225,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71ktFPEqjzL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tower Cavaletto 6.5 litre slow cooker in grey and rose gold',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BHWC6F4Q?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best large slow cooker here on the numbers: 300 watts across 6.5 litres, which is 84% more power than the Morphy Richards of the same size, for £34.95.', // TEXTO CURTO (CARD)
                'body' => "If you want a big slow cooker, this is the one whose arithmetic works. Three hundred watts across 6.5 litres is 46.2 watts per litre — the best ratio of any large machine in this comparison and 84% more power than the Morphy Richards 6.5 litre, which runs the same volume on 163 watts. On a big pot of cold stew loaded at eight in the morning, that difference is the difference between eating at six and eating at eight.

For £34.95 it is also the cheapest 6.5 litre here bar one. Three heat settings, cool touch handles that matter on a pot this size, and a stainless steel body in the Cavaletto styling that Tower has built a whole range around. Four thousand two hundred and twenty-five ratings at 4.6 is solid evidence.

Two things to know. Six and a half litres sounds enormous and is: filled to the recommended three-quarters that is about 4.8 litres of food, which is genuinely eight-plus portions and too much for most households on a normal weeknight. And Tower sells this under two ASINs at £34.95 and £34.99 with the same 4,225 ratings and the same 4.6 average — a four pence difference on an identical machine and an identical review pool, which is the sort of thing that happens when colour variants become separate products.", // TEXTO SEO LONGO
                'pros' => ['46.2 watts per litre, the best ratio of any large cooker here', '84% more power than the Morphy Richards of the same capacity', 'Costs £34.95, cheaper than most 3.5 litre machines', 'Cool touch handles, which matter on a 6.5 litre pot', '4,225 ratings at 4.6'], // PONTOS POSITIVOS
                'contras' => ['6.5 litres filled correctly is about 4.8 litres, too much for most weeknights', 'Sold under two ASINs sharing 4,225 ratings, four pence apart', 'No timer, only three heat settings'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Hamilton Beach 6.5L Slow Cooker, 240W, Oven-Safe Ceramic Bowl',           // NOME (ENCURTADO)
                'price' => '£37.98',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 4846,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61dqhlbKtyL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Hamilton Beach 6.5 litre family slow cooker with ceramic bowl',      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C8B91591?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A 6.5 litre with an oven-safe ceramic bowl and 4,846 ratings, which tells you it feeds 6 to 8 people — though it sells its 240 watts as energy efficiency, which is backwards.', // TEXTO CURTO (CARD)
                'body' => "Hamilton Beach does the useful translation: this listing says the machine feeds 6 to 8 people rather than leaving you to work out what 6.5 litres means at a dinner table. It also fits an oven-safe ceramic bowl, so you can brown a joint under the grill before or after slow cooking without moving it to another dish, and the whole thing is dishwasher safe.

At 240 watts across 6.5 litres it lands at 36.9 watts per litre — mid-table, below the Tower at number three but comfortably above the Morphy Richards 6.5 litre. With 4,846 ratings at 4.6, the evidence is good.

The framing on the wattage is worth pushing back on. The listing sells 240W as an Energy-Efficient Design, and within this category that gets the logic backwards. Every slow cooker is efficient compared with running an oven for eight hours — that is the point of the appliance. Within the category, more watts on the same volume means reaching temperature faster and holding it better in a cold kitchen, so a lower wattage is a performance compromise dressed as a virtue. Hamilton Beach is not the worst offender here; the machine with the lowest wattage per litre in this comparison does not mention efficiency at all.", // TEXTO SEO LONGO
                'pros' => ['States that it feeds 6 to 8 people rather than only quoting litres', 'Oven-safe ceramic bowl for browning without changing dish', '36.9 watts per litre, comfortably above the weakest 6.5L here', '4,846 ratings at 4.6', 'Dishwasher safe throughout'], // PONTOS POSITIVOS
                'contras' => ['Sells 240W as energy efficiency, which inverts what watts mean here', 'Lower power per litre than the cheaper Tower', '42.2cm wide, the largest footprint in this comparison'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Morphy Richards 6.5L Slow Cooker, Ceramic Pot, 163W, 3 Settings',         // NOME (ENCURTADO)
                'price' => '£36.36',                                                                // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 7832,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61a+hB7RrDL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Morphy Richards 6.5 litre slow cooker with brushed steel finish',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B087GTFVJF?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The second most reviewed cooker here at 7,832 ratings and 4.7, and the machine that gave this article its headline: 6.5 litres on 163 watts.', // TEXTO CURTO (CARD)
                'body' => "Seven thousand eight hundred and thirty-two ratings at 4.7 stars is the second best combination of rating and sample size in this comparison, and at £36.36 for a 6.5 litre with a ceramic pot and toughened glass lid it is obviously good value. Plenty of people are happy with it and we are not going to pretend otherwise.

But it is also the clearest example of the specification this article is about. One hundred and sixty-three watts across 6.5 litres is 25.1 watts per litre, the lowest in this comparison by a distance. Put it next to the same brand's 3.5 litre model at number one, which uses 153 watts: Morphy Richards has added ten watts and nearly doubled the volume. Against the Tower at number three, which puts 300 watts into an identical 6.5 litres, this machine has 46% less power moving the same mass of food.

What that means in a kitchen is time. Morphy Richards states low at 6 to 12 hours, medium at 4 to 10 and high at 3 to 8 — note how wide those windows are, and that the top of each range is where a full, cold pot on a January morning will land. If you batch cook at the weekend and are not in a hurry, none of this matters and the 4.7 rating is telling you so. If you load it before work and want to eat when you get in, buy the Tower.", // TEXTO SEO LONGO
                'pros' => ['7,832 ratings at 4.7, second best evidence in this comparison', 'Ceramic pot and toughened glass lid at £36.36', 'Publishes wattage, capacity, dimensions and weight in full', 'Dishwasher safe with an easy-clean brushed steel body'], // PONTOS POSITIVOS
                'contras' => ['25.1 watts per litre, the lowest ratio in this ranking by a distance', 'Only 10W more than the same brand 3.5L, for nearly double the volume', 'Cooking windows are wide (low is quoted as 6 to 12 hours)', 'No timer'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Crock-Pot Lift and Serve Digital Slow Cooker 5L, 220W, Hinged Lid',       // NOME (ENCURTADO)
                'price' => '£45.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 6891,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81a+7SKni-L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Crock-Pot Lift and Serve digital slow cooker with hinged lid',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07DHML8R3?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The hinged lid is the best-solved small problem in this category, and 5 litres at 220 watts is a sensible middle size — but it shares its review pool with a different model.', // TEXTO CURTO (CARD)
                'body' => "Anyone who has served from a slow cooker knows the problem: you lift the lid, it is streaming with condensate, and there is nowhere to put it that is not a worktop or a tea towel. Crock-Pot has hinged it. The lid swings back and stays attached, dripping into the pot rather than onto the counter, and that is a genuinely well-solved everyday annoyance that no other machine here addresses.

Five litres is also the most sensible capacity in this comparison and almost nobody offers it. It sits between the 3.5 litre that is too small for a family joint and the 6.5 litre that is too big for a weeknight, and filled to three-quarters it holds around 3.75 litres — a proper family meal with leftovers. At 220 watts that is 44 watts per litre, a good ratio. A programmable countdown timer completes it.

The catch is the review count, and it is the reason this sits sixth rather than second. The listing displays 6,891 ratings — the identical figure shown on the Crock-Pot Digital 3.5L at number two, which is a different capacity, a different lid and £11 cheaper. Two distinct products sharing one pool means you cannot tell which machine the reviews describe, and on a £45.99 purchase that matters.", // TEXTO SEO LONGO
                'pros' => ['Hinged lid solves the dripping-lid problem nobody else addresses', '5 litres is the most practical family capacity here and rare', '44 watts per litre with a programmable countdown timer', 'Ceramic bowl, dishwasher safe'], // PONTOS POSITIVOS
                'contras' => ['Shares its 6,891 ratings with a different Crock-Pot model', 'Most expensive non-Ninja machine here at £45.99', 'Hinged lid cannot be removed for cleaning as easily as a loose one'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Crock-Pot 6.5L Slow Cooker, 300W, Removable Ceramic Bowl',                // NOME (ENCURTADO)
                'price' => '£31.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 2626,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81wa9sg55pL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Crock-Pot 6.5 litre slow cooker with removable ceramic bowl',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B007XEJ40S?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest machine in this comparison at £31.99, and a 6.5 litre with the full 300 watts — the same power as the Tower for £2.96 less.', // TEXTO CURTO (CARD)
                'body' => "Thirty-one pounds ninety-nine for a 6.5 litre Crock-Pot with a 300 watt element is the best raw value on this page. That is 46.2 watts per litre, identical to the Tower at number three and 84% more power than the Morphy Richards 6.5 litre, from the brand that created the category in the first place.

It also does the translation properly: the title reads 6.5 L (8+ People), which tells a shopper what the litres mean without having to guess. Removable easy-clean ceramic bowl, three settings, and nothing else — this is the plain, unfussy version of the appliance.

Two and a half thousand ratings at 4.6 is a smaller sample than the machines above it, which is the only real reason it sits seventh rather than higher. It has no timer and no digital control, so it cooks until you switch it off, and there is no keep-warm automation. If you are home when the food is ready, that costs you nothing. If you are not, spend the extra on the Digital at number two or the Lift and Serve at number six. As with every 6.5 litre here, remember that filling it correctly means around 4.8 litres of food, which is more than most households cook at once.", // TEXTO SEO LONGO
                'pros' => ['Cheapest machine in this comparison at £31.99', '46.2 watts per litre, matching the best large cooker here', 'States 8+ People in the title rather than only litres', 'Removable easy-clean ceramic bowl from the original brand'], // PONTOS POSITIVOS
                'contras' => ['No timer and no automatic keep warm', '2,626 ratings, a smaller sample than the leaders here', '6.5 litres correctly filled is about 4.8 litres, too much for most weeknights'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Swan Retro 3.5L Slow Cooker, 200W, Removable Ceramic Pot',                // NOME (ENCURTADO)
                'price' => '£34.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 4100,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61bvDRREgvS._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Swan Retro 3.5 litre slow cooker with removable ceramic inner pot',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01MG81CHA?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Ties for the best power-to-volume ratio in the comparison at 57 watts per litre, in a retro stainless body that a lot of people buy for the kitchen it sits in.', // TEXTO CURTO (CARD)
                'body' => "Two hundred watts across 3.5 litres puts this level with the Crock-Pot Digital at the top of the power-to-volume table, at 57.1 watts per litre. For a small cooker that means it comes up to temperature briskly and holds it without labouring, which is exactly what you want from a machine this size.

The rest of the appeal is honest and worth stating plainly: people buy the Swan Retro because of how it looks. The range is designed around a 1950s aesthetic and matches a kettle and toaster that a lot of British kitchens already have, and a slow cooker that lives on the worktop rather than in a cupboard is a slow cooker that gets used. Four thousand one hundred ratings at 4.6 says the substance holds up.

Practically it is a removable ceramic inner pot, three temperature settings and a keep warm function, in a stainless steel body — no timer, no digital display. At £34.99 it costs the same as the Crock-Pot Digital at number two, which has the identical power ratio plus a 20 hour programmable timer, so on specification alone the Crock-Pot wins. Buy this one if the kitchen it goes into matters to you, which is a perfectly good reason.", // TEXTO SEO LONGO
                'pros' => ['57.1 watts per litre, joint best ratio in this comparison', 'Retro styling matches the wider Swan kitchen range', 'Removable ceramic pot with keep warm function', '4,100 ratings at 4.6'], // PONTOS POSITIVOS
                'contras' => ['Same price as a Crock-Pot with the same ratio plus a 20 hour timer', 'No timer or digital control', '3.5 litres is around 2 to 2.5 litres of usable capacity'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Ninja Foodi PossibleCooker 8-in-1, 8L, 1200W, Removable Pot',             // NOME (ENCURTADO)
                'price' => '£119.99',                                                               // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 1741,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61a7U0fRkHL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Ninja Foodi PossibleCooker 8 litre multicooker in sea salt grey',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CFYMZF81?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Not really a slow cooker: 1200 watts across 8 litres makes it a multicooker that also slow cooks, and it appears twice on Amazon at £40 apart.', // TEXTO CURTO (CARD)
                'body' => "Twelve hundred watts is not a slow cooker wattage. It is roughly four times the most powerful dedicated machine on this page, and it exists because the PossibleCooker is a multicooker that sears, braises, bakes, steams and keeps warm as well as slow cooking — eight functions, hence the name. Judged against the other nine entries here it is a different appliance that happens to include this one.

As that appliance it is very good. Four point seven stars from 1,741 ratings, an 8 litre pot that genuinely handles a joint for a crowd, and a removable pot that goes from hob to oven to table. If you have counter space for one thing and want it to do everything, this is the honest recommendation on this page.

Two caveats. It costs £119.99, more than three times the median here, and you are paying for seven functions you may not use — a dedicated slow cooker at £35 does the slow cooking part just as well. And Ninja lists it twice: this ASIN at £119.99 and another at £159.99, both showing the same 1,741 ratings and the same 4.7 average. A forty pound spread on an identical product and an identical review pool is the largest we have found in any category, and it is worth checking both before you buy anything Ninja.", // TEXTO SEO LONGO
                'pros' => ['4.7 stars from 1,741 ratings', '8 functions including sear, braise, bake and steam', '8 litre capacity, the largest here, with a hob and oven safe pot', 'Replaces several appliances if counter space is tight'], // PONTOS POSITIVOS
                'contras' => ['Sold at £119.99 and £159.99 under two ASINs with the same 1,741 ratings', 'Costs over three times the median machine here', '1200W is a multicooker rating, not comparable with the others', 'Seven of the eight functions are irrelevant if you want a slow cooker'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Swan Nordic 3.5L Slow Cooker, 200W, Up to 4 Portions',                    // NOME (ENCURTADO)
                'price' => '£34.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 1173,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71YqInZPRuL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Swan Nordic 3.5 litre slow cooker in white with wooden handle trim', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08YRQQG8K?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The same 200W and 3.5L as the Swan Retro in a Scandinavian finish, and the only listing here whose specification table claims the appliance is made of wood.', // TEXTO CURTO (CARD)
                'body' => "Mechanically this is the Swan Retro at number eight wearing different clothes: 3.5 litres, 200 watts, three temperature settings, removable dishwasher-safe ceramic pot and a glass lid. Fifty-seven watts per litre is the joint best ratio in this comparison, so the cooking side is not in question.

What differs is the styling. The Nordic range is matte white with pale wooden accents rather than 1950s chrome, and Swan is aiming it at kitchens where the Retro would look out of place. It also does the translation this category mostly avoids, stating up to 4 portions rather than leaving 3.5 litres to be interpreted.

Two things put it last. At 1,173 ratings and 4.5 stars it has the thinnest sample and the lowest average on this page — not bad figures, just the weakest here, and it costs exactly the same as the Retro which has three and a half times the reviews. And the specification table gives the material as Wood. A mains-powered cooking appliance is not made of wood; that is the handle trim, and it is in the field a buyer would check to find out whether the pot is ceramic or aluminium. It is a small error, but it is on the one field that was supposed to answer a real question.", // TEXTO SEO LONGO
                'pros' => ['57.1 watts per litre, joint best ratio in this comparison', 'States up to 4 portions rather than only quoting litres', 'Removable dishwasher-safe ceramic pot', 'Scandinavian styling for kitchens the Retro would not suit'], // PONTOS POSITIVOS
                'contras' => ['Specification table lists the material as Wood', '1,173 ratings at 4.5, the thinnest sample and lowest rating here', 'Same price as the Swan Retro, which has 3.5 times the reviews', 'No timer'], // PONTOS NEGATIVOS
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
        $this->command?->info("SlowCookersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
