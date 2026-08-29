<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class RiceCookersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE PANELAS DE ARROZ DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=rice+cooker&rh=p_36%3A3000-  (14 ASINS UNICOS EM 18 CARDS)
        // CATEGORIA KITCHEN: 5% DE COMISSAO.
        //
        // ─── ACHADO PRINCIPAL: NINGUEM DIZ QUANTO E UM "CUP" ───
        // 1. A CAPACIDADE DE UMA PANELA DE ARROZ E ANUNCIADA EM "cups", E "cup" NAO E
        //    UMA UNIDADE. O PADRAO JAPONES DA CATEGORIA E O GO, DE 180 ml DE ARROZ CRU.
        //    O COPO AMERICANO SAO 237 ml. O COPO METRICO SAO 250 ml. A TABELA DO QUE OS
        //    DEZ ANUNCIOS DECLARAM, COM A DIVISAO FEITA POR NOS:
        //      YUM ASIA PANDA MINI .. 3,5 cups / 0,63 L .... 180 ml/cup  ← PADRAO
        //      YUM ASIA SAKURA ...... 8 cups / 1,5 L ....... 187 ml/cup
        //      YUM ASIA BAMBOO ...... 8 cups / 1,5 L ....... 187 ml/cup
        //      MORPHY RICHARDS ...... 8 cups / 1,5 L ....... 187 ml/cup
        //      MIDEA ................ 4 cups / 640 ml ...... 160 ml/cup  ← DECLARADO
        //      BEAR ................. 4 cups / 0,63 L ...... 157 ml/cup
        //      COSORI ............... 10 cups / 5 L ........ 500 ml/cup  ← VOLUME DA PANELA
        //      TEFAL ................ SEM CUP, "10 to 20 Portions" EM 1,8 L
        //      TRISTAR E M4Y ........ SEM CUP NENHUM
        //    DA 160 A 500 ml POR "cup". SAO 3,1x DE VARIACAO NUMA PALAVRA SO.
        // 2. A MIDEA E A UNICA DAS DEZ QUE ESCREVE O QUE ELA QUER DIZER: "4 cups(160ML/
        //    CUP) of uncooked white rice". UMA LINHA, ENTRE PARENTESES, E A CATEGORIA
        //    INTEIRA FICA MENSURAVEL. E, IRONICAMENTE, OS 160 ml DELA NAO SAO NEM O
        //    PADRAO JAPONES DE 180 — ATE QUEM DEFINE USA UM TERCEIRO VALOR.
        // 3. O CASO QUE FECHA O ARGUMENTO: TRES MAQUINAS COM A MESMA TIGELA DE ~0,63 L DE
        //    ARROZ CRU SAO ANUNCIADAS DE TRES JEITOS E A TRES PRECOS:
        //      YUM ASIA PANDA MINI .. "3.5 cup, 0.63 litre" ......... £99.90
        //      BEAR ................. "4 Cup 2L" ................... £49.98
        //      MIDEA ................ "4 Cup 2L" ................... £41.98
        //    NA PAGINA DE BUSCA A YUM ASIA PARECE UM TERCO DO TAMANHO DAS OUTRAS DUAS. E
        //    O MESMO VOLUME DE ARROZ.
        // 4. O "2L" DA BEAR E DA MIDEA E VOLUME COZIDO OU VOLUME DA PANELA, NAO
        //    CAPACIDADE DE ARROZ. A BEAR ESCREVE OS TRES NUMEROS NA MESMA PAGINA SEM
        //    PERCEBER: TITULO DIZ "4 Cup 2L", O BULLET DIZ "(0.63L raw / 2L cooked, about
        //    6 bowls)" E A TABELA DE ESPECIFICACAO DIZ "Capacity: 0.87 litres". TRES
        //    CAPACIDADES, UM PRODUTO.
        //
        // ─── OUTROS ACHADOS ───
        // 5. A M4Y SE CONTRADIZ ENTRE TITULO E TABELA: O TITULO DIZ "1.2 Litre" E A
        //    TABELA DIZ "Capacity: 1 litres". E O TITULO PROMETE "For 1-6 People" NUMA
        //    PANELA DE UM LITRO.
        // 6. A TEFAL SUBSTITUI O CUP POR OUTRA UNIDADE IGUALMENTE VAGA: 1,8 L QUE SERVEM
        //    "between 10-20 portions". E UMA FAIXA DE 2 PARA 1 — A PORCAO PODE SER 90 ml
        //    OU 180 ml DE ARROZ COZIDO, E OS DOIS EXTREMOS SAO DESCRITOS COMO A MESMA
        //    COISA. E O MESMO PADRAO QUE ACHAMOS NOS SOUP MAKERS.
        // 7. SO TRES DAS DEZ PUBLICAM POTENCIA: MORPHY RICHARDS 500 W, TEFAL 700 W E BEAR
        //    "350–420W" — QUE E UMA FAIXA, NAO UM NUMERO. AS TRES YUM ASIA, QUE SAO AS
        //    MAIS CARAS DA LISTA (£89.90 A £219.90), NAO PUBLICAM WATT EM LUGAR NENHUM.
        // 8. A MORPHY RICHARDS TEM A TABELA MAIS COMPLETA DA CATEGORIA: CAPACIDADE,
        //    POTENCIA, VOLTAGEM, PESO, MATERIAL, DIMENSOES E LAVA-LOUCAS. E CUSTA £37.00.
        //    A YUM ASIA BAMBOO, A £219.90, PUBLICA CAPACIDADE E DIMENSOES.
        // 9. A YUM ASIA PANDA MINI APARECE EM QUATRO ASINS (B07PQRBT5N, B0B431NHJ1,
        //    B0B42YN26Y, B0GJL9FD5M) TODOS A £99.90 COM AS MESMAS 9.860 AVALIACOES — O
        //    MAIOR NUMERO DE ASINS NO MESMO POOL QUE JA ENCONTRAMOS. A BEAR REPETE COM
        //    DOIS (BRANCO E AMARELO) EM 4.479.
        // 10. O CAMPO DE INSTRUCAO DE CUIDADO DA TRISTAR ESTA EM ALEMAO NUMA LOJA
        //    BRITANICA: "Mit feuchtem Tuch abwischen".
        // 11. A YUM ASIA BAMBOO CUSTA £80 A MAIS QUE A SAKURA PELA MESMA CAPACIDADE DE 8
        //    cups / 1,5 L. A DIFERENCA E AQUECIMENTO POR INDUCAO E UMA TIGELA DE 3 mm EM
        //    VEZ DE 2 mm. E £80 POR 1 MILIMETRO DE CERAMICA E UMA BOBINA.
        // 12. A COSORI SE VENDE COMO "17-in-1", QUE SAO 9 PRESETS DE ARROZ MAIS 8 FUNCOES.
        //    NENHUM DOS DOIS NUMEROS APARECE NA TABELA.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: OS TRES ASINS IRMAOS DA YUM ASIA PANDA MINI E O DA BEAR (MANTIDO UM DE
        // CADA POOL); YUM ASIA TSUKI (1.7K) E KUMO (742) PARA NAO DAR CINCO VAGAS A UMA
        // MARCA SO; NUTRIBULLET (121) E LOW SUGAR 2L (18) POR AMOSTRA FINA.
        // YUM ASIA APARECE TRES VEZES PORQUE OCUPA A FAIXA DE £89 A £220 SOZINHA E PORQUE
        // E A UNICA MARCA DA LISTA CUJA CONTA DE CUP FECHA EM TODOS OS MODELOS.
        // DENTRO: NOTA DE 4.3 A 4.6, PRECO DE £31.99 A £219.90, OITO MARCAS.
        //
        // FOCUS KEYWORD: best rice cooker
        // VARIACOES TRABALHADAS: rice cooker uk / small rice cooker /
        // fuzzy logic rice cooker / rice cooker cups / 8 cup rice cooker /
        // induction rice cooker / best rice cooker for one person /
        // rice cooker with steamer / japanese rice cooker / how much is a rice cup
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "kitchen", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-rice-cooker',                                          // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Rice Cooker 2026: 10 Ranked on What a Cup Actually Is', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Rice Cooker 2026: Top 10 Ranked and Compared',    // TITLE DA ABA/GOOGLE (49 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best rice cooker options on Amazon by working out what a cup means on each listing, comparing 0.63L to 5L machines from £31.99 to £219.90.', // META DESCRIPTION (155 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best rice cooker',                                 // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Rice cookers are sold in cups, and a cup is not a unit. The Japanese standard the category was built on is the gō, 180ml of uncooked rice; an American cup is 237ml and a metric one is 250ml. Divide the litres by the cups on each listing in this comparison and you get anything from 160ml to 500ml, a threefold spread hiding inside one word. Exactly one manufacturer of the ten says what it means: Midea writes \"4 cups(160ML/CUP) of uncooked white rice\" in its second bullet, and that single parenthesis makes the entire shelf measurable. Use it and something odd falls out. Three machines here hold roughly the same 0.63 litres of raw rice, and they are advertised as a 3.5 cup 0.63 litre cooker at £99.90, a 4 Cup 2L cooker at £49.98, and a 4 Cup 2L cooker at £41.98. On a search page the first looks a third the size of the other two. Below we rank the best rice cooker options on Amazon in August 2026 by converting every claim back into millilitres of dry rice.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Buying the best rice cooker starts with translating the box into a number you can act on. A cup of dry rice is 180ml and makes roughly two portions cooked, so a 3.5 cup machine feeds one to three people, an 8 cup machine feeds a family, and anything advertising a litre figure larger than about 1.5 is quoting the pot rather than the rice. When a listing gives you both cups and litres, divide one by the other: land near 180 and the maker is using the category standard, land near 500 and you are reading the bowl's total volume. Meanwhile the fuzzy logic label is worth more than it sounds — it means a temperature sensor and a multi-stage program rather than a thermostat that clicks off when the water boils away, and it is the difference between rice that is evenly cooked and rice that is crusted at the bottom. By contrast, induction heating is the upgrade to think hardest about, because the same brand charges £80 more for it at identical capacity. And check the wattage if you can find it: only three of these ten publish one at all, and the three most expensive machines on the page publish none.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                         // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 09:15:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Yum Asia Panda Mini Rice Cooker, 3.5 Cup 0.63L, Fuzzy Logic, Ceramic Bowl', // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£99.90',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 9860,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61KY77ISHZL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best rice cooker',                                                   // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07PQRBT5N?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best rice cooker here on evidence and on arithmetic: 9,860 ratings at 4.6, and 3.5 cups across 0.63 litres works out at exactly the 180ml Japanese standard.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Nine thousand eight hundred and sixty ratings at 4.6 stars is the deepest sample in this comparison by some distance, and the listing is one of only four whose capacity claim survives a division. Three and a half cups across 0.63 litres is 180ml a cup — the gō, the Japanese standard the whole category is built on. Yum Asia states both numbers in the title and they agree with each other, which sounds like the minimum and turns out to be unusual.

The machine is a proper fuzzy logic cooker rather than a thermostat in a pot. Seven cooking phases with digital control and 3D surround heating, separate programmes for white, short grain and sushi, brown rice and quick cook, plus steam, porridge, slow cook and cake. The bowl is a 5-layer 2mm ceramic-coated insert with printed water lines, and there is a 24-hour timer, keep warm and a 10-minute countdown so you know when to start the rest of dinner. Two-year warranty, detachable UK plug.

Two things to weigh. At £99.90 for 0.63 litres of rice it is expensive per unit of capacity — the Bear and the Midea further down this page hold the same amount for half the money, which is exactly the point the intro makes about how differently the same bowl gets advertised. And this exact machine sells under four separate ASINs, all at £99.90, all showing the same 9,860 ratings, which is the largest single review pool spread across the most listings we have found in any category. Whichever one Amazon shows you, it is the same cooker.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['9,860 ratings at 4.6, the deepest sample in this comparison', 'Cups and litres agree: 3.5 cups over 0.63L is the 180ml Japanese standard', 'True fuzzy logic with seven cooking phases and a temperature sensor', '5-layer 2mm ceramic bowl with printed water lines and a full accessory set', '24-hour timer, keep warm and a 10-minute countdown'], // PONTOS POSITIVOS
                'contras' => ['£99.90 for the same 0.63L of raw rice that £41.98 buys elsewhere', 'Sold under four ASINs all sharing the same 9,860 ratings', 'No wattage published anywhere on the listing', '0.63L suits one to three people and no more'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Morphy Richards Rice Cooker 471001, 1.5L 8 Cups, 500W, Glass Lid',        // NOME (ENCURTADO)
                'price' => '£37.00',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 2027,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61hnuWOtl8L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Morphy Richards 1.5 litre rice cooker in black with glass lid',      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F99YD6DJ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most complete specification table in the category — capacity, wattage, voltage, weight, material and dimensions — attached to the cheapest 8 cup machine here.', // TEXTO CURTO (CARD)
                'body' => "Thirty-seven pounds buys 1.5 litres and 8 cups, which divides to 187ml a cup and puts Morphy Richards in the honest half of this comparison alongside the three Yum Asia machines that cost between £53 and £183 more. Two thousand and twenty-seven ratings at 4.4 stars is the fourth deepest sample here, and it is family-sized: 8 cups of dry rice is enough for six to eight people.

What makes it the value pick is the specification table, which is the fullest in the category by a wide margin. Capacity 1.5 litres, wattage 500 watts, voltage 240, weight 1.84kg, material stainless steel, dimensions, dishwasher safe. Three of the ten listings here publish a wattage at all, and the two most expensive machines on this page publish nothing beyond capacity and dimensions. Five hundred watts across 1.5 litres is modest, which means a longer cook than a 700 watt pot but gentler heat at the base.

The compromises are real but predictable at the price. There is no fuzzy logic — this is a one-button cooker with a thermostat that switches to keep warm when the water has gone, so brown rice and sushi rice get the same treatment as long grain. The inner pot is non-stick aluminium rather than ceramic, which will wear faster. And keep warm is quoted at up to two hours rather than the ten or twelve a fuzzy logic machine manages. For plain white rice, four times a week, none of that matters.", // TEXTO SEO LONGO
                'pros' => ['The fullest specification table in this comparison, wattage included', '8 cups over 1.5 litres divides to 187ml, the category standard', '£37.00, the cheapest 8 cup machine on this page', 'Glass lid lets you watch without releasing steam', '2,027 ratings at 4.4 stars'], // PONTOS POSITIVOS
                'contras' => ['No fuzzy logic, so every rice type gets the same programme', 'Non-stick aluminium bowl rather than ceramic', 'Keep warm quoted at two hours against ten or more on fuzzy logic models', '500W is the lowest published wattage here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Yum Asia Sakura Rice Cooker, 8 Cup 1.5L, Fuzzy Logic, Ceramic Bowl',      // NOME (ENCURTADO)
                'price' => '£139.90',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 5681,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61xMGzlt8qL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Yum Asia Sakura rice cooker in black and silver with LED display',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B075WWQY2Y?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The family version of the machine at number one: 8 cups over 1.5 litres, twelve programmes, and 5,681 ratings at 4.6 — the second deepest sample in the category.', // TEXTO CURTO (CARD)
                'body' => "If the Panda Mini is right for one to three people, this is the same engineering scaled to one to eight. Eight cups across 1.5 litres is 187ml a cup, consistent with the rest of the Yum Asia range and with the Japanese standard, and 5,681 ratings at 4.6 stars is the second deepest sample in this comparison. Yum Asia calls it the flagship and the review record supports the claim.

The programme list is the widest here: six rice functions covering white, long grain, short grain, sushi and brown, plus six multicook settings including steam, porridge, casserole, soup, cake, yoghurt and tahdig — the crisp Persian rice crust, which almost no Western machine attempts. The bowl is the same 5-layer 2mm ceramic as the Panda Mini with a stainless inner lid, and the accessory set runs to a steam basket, measuring cup, spatula, spatula holder and soup ladle. Two-year warranty.

Two caveats, both about price rather than performance. One hundred and thirty-nine pounds ninety is £102.90 more than the Morphy Richards at number two for the same 8 cups and 1.5 litres; what you are buying is fuzzy logic, the ceramic bowl and the programme range, which is a real upgrade but a large premium. And like every Yum Asia machine here, the listing publishes no wattage — on a cooker where the heating profile is the entire selling proposition, that is a strange omission from an otherwise detailed page.", // TEXTO SEO LONGO
                'pros' => ['5,681 ratings at 4.6, the second deepest sample in this comparison', '8 cups over 1.5 litres divides to 187ml, consistent with the standard', 'Twelve programmes including tahdig, yoghurt and casserole', '5-layer 2mm ceramic bowl with a stainless steel inner lid', 'Full accessory set and a two-year warranty'], // PONTOS POSITIVOS
                'contras' => ['£102.90 more than the Morphy Richards for the same 8 cups and 1.5L', 'No wattage published anywhere on the listing', 'At 41 x 32cm it has the largest footprint in this comparison', 'Award claims cite magazines rather than a testing standard'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Tristar RK-6144BS Stainless Steel Rice Cooker, 1L, Keep Warm, Steam Tray', // NOME (ENCURTADO)
                'price' => '£31.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 6931,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71GGwU1j39L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tristar stainless steel 1 litre rice cooker with steam tray',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GGRXJQYL?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest machine here at £31.99 with the third deepest sample, and the only listing that sidesteps the cup problem entirely by quoting litres and nothing else.', // TEXTO CURTO (CARD)
                'body' => "Six thousand nine hundred and thirty-one ratings at 4.4 stars for £31.99 is the strongest value proposition in this comparison, and there is something quietly sensible about the listing: it never mentions cups. The capacity is one litre, stated in the title and the specification table and nowhere contradicted. In a category where the headline unit varies threefold between brands, refusing to use it is a defensible position.

What you get is a plain thermostatic cooker in a stainless steel housing with a keep-warm function and a steam tray, and that is the whole list. No fuzzy logic, no programmes, no timer, no display. You put rice and water in, press the lever, and it switches to warm when the water has boiled off. For plain long grain rice this works, has worked since the 1950s, and nearly seven thousand people have found it acceptable.

Three things to know. One litre of pot volume is roughly 0.4 litres of dry rice, so this is a two to four person machine despite sounding larger than the 0.63 litre Yum Asia — which is the cup problem in reverse, with litres this time. No wattage is published. And the product care field on the listing reads \"Mit feuchtem Tuch abwischen\", German for wipe with a damp cloth, left untranslated on a British page — a small sign that the listing was ported rather than written, which is also why the bullet copy reads like it was generated: relaxed mealtime routines, steady serving rhythms, calm evening cooking.", // TEXTO SEO LONGO
                'pros' => ['£31.99, the cheapest machine in this comparison', '6,931 ratings at 4.4, the third deepest sample here', 'Quotes litres only and never uses the ambiguous cup unit', 'Stainless steel housing with a steam tray included', 'Simple thermostatic operation with very little to fail'], // PONTOS POSITIVOS
                'contras' => ['One litre of pot is roughly 0.4L of dry rice, smaller than it sounds', 'No fuzzy logic, timer, display or programmes of any kind', 'No wattage published', 'Product care field is in German on a UK listing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Midea Small Rice Cooker, 4 Cup 160ml, 9-in-1 Multicooker, Anti-Spill',    // NOME (ENCURTADO)
                'price' => '£41.98',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 251,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61wKszqeRoL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Midea small rice cooker in silver with digital display',             // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DHZDD6HB?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing of ten that defines its own unit — 4 cups at 160ml per cup — which is the single line that makes the rest of this category comparable.', // TEXTO CURTO (CARD)
                'body' => "This machine earns its place with a parenthesis. The second bullet reads: 4 cups(160ML/CUP) of uncooked white rice. Nine other manufacturers on this page sell you a cup and leave you to guess, and Midea simply says what it means. Once you have that number the whole shelf becomes measurable, including the discovery that the £99.90 Yum Asia at number one holds the same 640 millilitres of dry rice as this £41.98 one.

It is worth noting the number is not the Japanese 180ml either. Midea has picked 160, which is a third value in a category that already had at least two — so even the one brand doing the right thing is not using the standard. That is less a criticism than a measure of how loose the unit has become.

The cooker itself is good for the money: six stages of temperature control through an NTC probe, which is fuzzy logic in all but name, programmes for white rice, brown rice, porridge, mixed rice, steam, soup and stew, a 30 minute quick rice cycle, an anti-spill sensor that stops porridge climbing out of the pot, a 24-hour delay and keep warm. Four point six stars is the joint highest rating here. The reservation is the sample: 251 ratings is the thinnest in this comparison, so that 4.6 rests on relatively few people, and the title still says 4 Cup 2L, with the 2L being the pot rather than the rice.", // TEXTO SEO LONGO
                'pros' => ['The only listing here that states what a cup means, at 160ml', 'NTC temperature probe with six cooking stages at £41.98', 'Anti-spill sensor, 30 minute quick rice and a 24-hour delay timer', '4.6 stars, joint highest rating in this comparison', 'Holds the same dry rice as a machine here costing £99.90'], // PONTOS POSITIVOS
                'contras' => ['251 ratings, the thinnest sample in this comparison', 'Its 160ml cup is not the 180ml Japanese standard either', 'Title still advertises 2L, which is the pot rather than the rice', 'No wattage published'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Tefal Cool Touch Rice Cooker, 1.8L, 700W, Cool Wall Body',                // NOME (ENCURTADO)
                'price' => '£39.00',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 2111,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71WMTVN87BL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tefal Cool Touch 1.8 litre rice cooker in black',                    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00843M2TW?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The largest pot here at 1.8 litres and the highest published wattage at 700W, sold as serving between 10 and 20 portions — a range of two to one.', // TEXTO CURTO (CARD)
                'body' => "One point eight litres is the biggest pot in this comparison and 700 watts is the highest wattage anyone here publishes, so on the two figures that are actually comparable this is the most capable machine on the page for £39.00. Two thousand one hundred and eleven ratings at 4.3 stars is a solid record. The cool wall body is the feature in the name and it is a genuine one: the outer casing stays touchable during cooking, which matters if the cooker lives on a worktop where children reach.

Tefal also avoids the cup entirely, which would be a point in its favour if it had not replaced the vague unit with an equally vague one. The fourth bullet says the 1.8 litre capacity serves between 10 and 20 portions. That is a two-to-one range on the number a buyer is actually trying to establish; a portion is either 90 millilitres of cooked rice or 180, and the listing treats both as the same answer. It is the same pattern we found across soup makers, where the same litre was sold as feeding four people by one brand and six by another.

The rest is straightforward. Two settings, cook and keep warm, with no fuzzy logic and no timer. The bowl is removable, non-stick and dishwasher safe, which is unusual — most rice cooker pots are hand wash. Non-slip feet, a plastic handle for carrying, a measuring cup, serving spoon and steam basket in the box. At 31.5 x 31cm it takes real worktop space for a machine with two buttons.", // TEXTO SEO LONGO
                'pros' => ['1.8 litres, the largest pot capacity in this comparison', '700W, the highest wattage published by anyone here', 'Dishwasher safe removable bowl, rare in this category', 'Cool wall body stays touchable during cooking', '2,111 ratings at 4.3 stars for £39.00'], // PONTOS POSITIVOS
                'contras' => ['Capacity described as 10 to 20 portions, a two-to-one range', 'No fuzzy logic, no timer and only two settings', '31.5 x 31cm footprint for a two-button machine', '4.3 stars is the joint lowest rating in this comparison'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Bear Small Rice Cooker, 4 Cup, 6-in-1 Multifunctional with Steamer',      // NOME (ENCURTADO)
                'price' => '£49.98',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 4479,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51+IxLsJF9L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Bear small rice cooker in white with steamer basket',                // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CNP5LW3T?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A capable little cooker with 4,479 ratings, and three different capacities on one page: 2L in the title, 0.63L raw in the bullets, 0.87L in the specification table.', // TEXTO CURTO (CARD)
                'body' => "Four thousand four hundred and seventy-nine ratings at 4.3 stars puts this among the best-evidenced machines in the comparison, and the specification is genuinely good for £49.98: an NTC temperature probe driving seven cooking stages, six functions covering white rice, brown rice, porridge, soup and steaming, a removable non-stick pot and detachable lid, a steamer basket, and quoted cook times of 35 to 49 minutes for white rice and 65 to 90 for brown. Publishing the cook times at all is more than most here manage.

The capacity is where it comes apart, and it does so three ways on a single page. The title says 4 Cup 2L. The first bullet says 4 cups of uncooked rice, then adds in brackets 0.63L raw and 2L cooked. The specification table says 0.87 litres. Those are three different answers to one question, and the 2L in the title — the number a buyer scanning search results actually sees — is the cooked volume, which no rival uses.

Put it beside the Yum Asia Panda Mini at number one and the effect is clear: both hold 0.63 litres of dry rice, one is advertised as 0.63 litre and the other as 2L, and the second costs half as much. Neither is lying. They have simply chosen different halves of the same appliance to put on the box. The listing also quotes power as 350 to 420 watts, a range rather than a figure, and sets its bullets in emoji.", // TEXTO SEO LONGO
                'pros' => ['4,479 ratings at 4.3, among the deepest samples in this comparison', 'NTC probe with seven cooking stages at £49.98', 'Publishes actual cook times: 35 to 49 minutes white, 65 to 90 brown', 'Six functions with a steamer basket and detachable lid', 'Same dry rice capacity as a machine here costing £99.90'], // PONTOS POSITIVOS
                'contras' => ['Three capacities on one page: 2L, 0.63L raw and 0.87L', 'Title advertises the cooked volume, which no rival does', 'Wattage given as a 350 to 420W range rather than a figure', '4.3 stars is the joint lowest rating here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Yum Asia Bamboo Rice Cooker, Induction Heating, 8 Cup 1.5L, 3mm Bowl',    // NOME (ENCURTADO)
                'price' => '£219.90',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 1402,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71CWUHyv9iL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Yum Asia Bamboo induction rice cooker in champagne rose and black',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07T95GW9S?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only induction machine in the comparison, and £80 more than the same brand at the same 8 cups and 1.5 litres for a coil and one extra millimetre of ceramic.', // TEXTO CURTO (CARD)
                'body' => "Induction heating is a real technical difference. A conventional rice cooker warms a plate under the bowl and the heat travels up through the base; an induction cooker makes the bowl itself the heating element, so the sides heat too and the temperature can be changed quickly rather than coasting. For brown rice and GABA cycles, where the grain is held at precise temperatures for germination before cooking, that control matters. This is the only machine in the comparison that has it, and 1,402 ratings at 4.6 stars say it works.

The programme list is the deepest here: white, long grain, short grain, sushi, brown, GABA and a Yumami setting, plus steam, porridge, slow cook, cake and tahdig, with a 24-hour timer. The bowl is 5-layer ceramic at 3mm rather than the 2mm on the cheaper models.

The problem is the arithmetic against its own sibling. The Sakura at number three is 8 cups, 1.5 litres, the same fuzzy logic family, the same ceramic coating, £139.90 and 5,681 ratings. This is 8 cups, 1.5 litres, £219.90 and 1,402 ratings. Eighty pounds buys you an induction coil, one extra millimetre of bowl and two more programmes, at the cost of four times less review evidence. Induction is worth paying something for if you cook brown rice weekly; it is a difficult case to make if you cook white rice, and Yum Asia still publishes no wattage on a machine sold entirely on how it applies heat.", // TEXTO SEO LONGO
                'pros' => ['The only induction heating machine in this comparison', 'Widest programme list here, including GABA and tahdig', '5-layer 3mm ceramic bowl, thicker than the rest of the range', '8 cups over 1.5 litres, consistent with the 180ml standard', '4.6 stars across 1,402 ratings'], // PONTOS POSITIVOS
                'contras' => ['£80 more than the Sakura for the same 8 cups and 1.5 litres', '1,402 ratings against 5,681 for the cheaper sibling', 'No wattage published on a cooker sold on how it applies heat', '£219.90 is more than five times the cheapest capable machine here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Cosori Rice Cooker 5L, 10 Cups, Ceramic Coated Pot, 17-in-1',             // NOME (ENCURTADO)
                'price' => '£88.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 277,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71v-+vp3uFL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Cosori 5 litre rice cooker in black with ceramic coated pot',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BZY2HGW1?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Advertised as 5L and 10 cups, which divides to 500ml a cup — nearly three times the standard, because the 5 litres is the pot rather than the rice.', // TEXTO CURTO (CARD)
                'body' => "Take the two headline numbers on this listing and divide one by the other. Five litres over ten cups is 500 millilitres a cup, against the 180 that the Yum Asia and Morphy Richards machines work out at and the 160 that Midea publishes explicitly. Nothing here is untrue — the pot really does hold five litres and it really does take ten cups of rice — but the two figures describe different things, and on a shelf next to a machine advertised as 1.5 litres and 8 cups, this one reads as three times the size for two extra cups of rice.

The cooker is well specified. Fuzzy logic with seven-step temperature control, nine rice presets covering white, sushi, brown and three grain settings, eight further functions including steam, slow cook and sauté, a delay timer, keep warm, and a 1000 watt quick rice cycle. The pot is ceramic coated and the whole thing carries a BBC Good Food recommendation, which is quoted with an actual test description rather than just a logo — worth more than the magazine name-checks elsewhere in this comparison.

Two reservations beyond the arithmetic. Two hundred and seventy-seven ratings is the second thinnest sample here, so the 4.6 stars are provisional at £88.99. And the 17-in-1 branding is nine presets plus eight functions added together, neither of which appears in the specification table — the same programme-count inflation we found across bread makers, where Panasonic was the only brand willing to itemise what its headline number contained.", // TEXTO SEO LONGO
                'pros' => ['Fuzzy logic with seven-step control and nine rice presets', 'Ceramic coated pot with sauté and slow cook functions', 'BBC Good Food recommendation quoted with the actual test description', '1000W quick rice cycle, the highest power figure mentioned here', '4.6 stars, joint highest rating in this comparison'], // PONTOS POSITIVOS
                'contras' => ['5L over 10 cups is 500ml a cup, nearly three times the standard', 'The 5 litre headline is the pot volume, not the rice capacity', '277 ratings, the second thinnest sample here, at £88.99', '17-in-1 is nine presets plus eight functions, itemised nowhere'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'M4Y Rice Cooker, Slow Cooker and Steamer, Delay Timer, Keep Warm',        // NOME (ENCURTADO)
                'price' => '£39.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 679,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61d2QYm+xqL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'M4Y rice cooker and slow cooker with digital display',               // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08NH9TTYQ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A genuine three-in-one with a 15-hour delay timer, on a listing whose title says 1.2 litres and whose specification table says 1, for one to six people.', // TEXTO CURTO (CARD)
                'body' => "The combination here is unusual and worth something. As well as three rice settings — white, brown and quick — this runs as a slow cooker with genuine high and low settings, up to ten hours on low and five on high, and as a steamer, with a 15-hour delay timer on top. Most machines in this comparison that claim multicooker functions are running the rice programme with a different label; a real low setting held for ten hours is a different capability, and at £39.99 with 679 ratings at 4.4 stars it is fairly priced for it.

The listing is the problem. The title says 1.2 Litre. The specification table says Capacity: 1 litres. Those cannot both be right, and on the number that decides whether the machine feeds your household it is the one field you needed. The title then claims the cooker serves 1 to 6 people from that litre, which even at the generous reading is optimistic — a litre of pot is around 0.4 litres of dry rice, comfortably four portions and not six.

The copy around it does not help. Seven bullets, each opened with an emoji, running to phrases like immerse yourself in a world of freshness and vitality and let its intuitive features inspire your inner chef. Two of the seven contain no specification at all. Buried in the fourth is a genuine oddity: the heading advertises a 12 minute count down and the body then describes a 15-hour delay timer, two unrelated features sharing one line. The hardware deserves a better page than this.", // TEXTO SEO LONGO
                'pros' => ['Genuine slow cooker settings: ten hours on low, five on high', 'Three rice programmes plus steaming and a sauté workaround', '15-hour delay timer, the longest in this comparison', '679 ratings at 4.4 stars for £39.99', 'British three pin plug listed explicitly in the specification'], // PONTOS POSITIVOS
                'contras' => ['Title says 1.2 litres, specification table says 1 litre', 'Claims to serve 1 to 6 people from around 0.4L of dry rice', 'Two of seven bullets contain no specification at all', 'One bullet heading and its body describe two unrelated timers'], // PONTOS NEGATIVOS
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
        $this->command?->info("RiceCookersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
