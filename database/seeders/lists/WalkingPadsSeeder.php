<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class WalkingPadsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE WALKING PADS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=under+desk+treadmill+walking+pad&rh=p_36%3A12000-  (20 ASINS)
        // CATEGORIA FITNESS. SAZONAL: SOBE DE OUTUBRO E EXPLODE EM JANEIRO.
        //
        // ─── ACHADO PRINCIPAL: A VELOCIDADE E VENDIDA, A ESTEIRA E ESCONDIDA ───
        // 1. UMA PASSADA DE CAMINHADA A 6 km/h MEDE PERTO DE 80 cm. UMA PASSADA DE
        //    CORRIDA A 12 km/h MEDE PERTO DE 1,30 m, E A 16 km/h PERTO DE 1,50 m. ENTAO
        //    O COMPRIMENTO DA ESTEIRA E O QUE DECIDE ATE QUE VELOCIDADE A MAQUINA PODE
        //    SER USADA. A TABELA QUE MONTAMOS, CRUZANDO OS DOIS NUMEROS:
        //      WALKINGPAD P1 ....... 120 x 41,5 cm .... 6 km/h   ← COERENTE
        //      UREVO SPACEWALK ..... 100 x 40 cm ...... 6 km/h   ← COERENTE
        //      MERACH .............. 42 cm de largura . 6 km/h   (COMPRIMENTO OMITIDO)
        //      VANNECT ............. 100 x 40 cm ...... 10 km/h
        //      HOMETRO ............. 97 x 39 cm ....... 12 km/h
        //      SUPERUN ............. 95 x 38 cm ....... 12 km/h
        //      TOPUTURE ............ 104 x 42 cm ...... 16 km/h  ← PIOR CASO
        //      WALKINGPAD Z1 ....... NAO PUBLICA ...... 6 km/h
        //      UREVO 2-IN-1 ........ NAO PUBLICA ...... 10 km/h
        //      DEERRUN ............. NAO PUBLICA ...... NAO PUBLICA
        //    O PADRAO E EXATAMENTE INVERTIDO: A MAQUINA COM A ESTEIRA MAIS LONGA (120 cm)
        //    E A QUE TEM A MENOR VELOCIDADE MAXIMA, E A DE 16 km/h RODA NUMA ESTEIRA DE
        //    104 cm. A WALKINGPAD, QUE CRIOU A CATEGORIA E TEM 60 PATENTES, PUBLICA A
        //    ESTEIRA MAIS LONGA E TRAVA EM 6 km/h. QUEM VENDE VELOCIDADE DE CORRIDA
        //    RODA EM 95 A 104 cm.
        // 2. A LARGURA E A OUTRA METADE. 38 cm (SUPERUN) E 39 cm (HOMETRO) SAO ESTREITOS
        //    ATE PARA CAMINHAR — O PE OSCILA LATERALMENTE E NAO HA MARGEM DE ERRO. A
        //    MERACH ADMITE ISSO SEM QUERER AO ESCREVER QUE OS 42 cm DELA SAO LARGOS
        //    "vs. standard 35cm".
        //
        // ─── ACHADO SECUNDARIO: A POTENCIA EM HP NAO CABE NA TOMADA ───
        // 3. 1 HP = 745,7 W. UMA TOMADA BRITANICA DE 13 A A 230 V ENTREGA NO MAXIMO
        //    2.990 W. AS DECLARACOES COLETADAS, CONVERTIDAS:
        //      VANNECT (TABELA) ... 10 HP ... 7.457 W  ← 2,5x A TOMADA INTEIRA
        //      MERACH ............. 3,5 HP .. 2.610 W
        //      SUPERUN ............ 3 HP .... 2.237 W  (ELA MESMA PUBLICA EM WATT)
        //      TOPUTURE/HOMETRO/DEERRUN . 2,5 HP . 1.864 W
        //      VANNECT (TITULO) ... 2,75 HP . 2.050 W
        //      WALKINGPAD Z1 ...... 2 HP .... 1.491 W  ← MENOR DECLARACAO
        //      WALKINGPAD P1 E OS DOIS UREVO: NAO DECLARAM HP NENHUM
        //    UM WALKING PAD REAL PUXA DE 300 A 500 W. TODOS ESSES NUMEROS SAO PICO DE
        //    BLOQUEIO, NAO REGIME CONTINUO, E NINGUEM PUBLICA A POTENCIA CONTINUA (CHP),
        //    QUE E A UNICA COMPARAVEL.
        // 4. O CASO DA VANNECT E O MELHOR ACHADO DA COLETA. O TITULO DIZ 2.75HP. A
        //    TABELA DE ESPECIFICACAO DA MESMA PAGINA DIZ "Maximum horsepower: 10
        //    Horsepower". SAO 7.457 W NUMA TOMADA QUE ENTREGA 2.990 W — E A PROPRIA
        //    FICHA SE CONTRADIZ POR UM FATOR DE 3,6.
        //
        // ─── OUTROS ACHADOS ───
        // 5. A MERACH DECLARA "Maximum speed: 6 mph" NA TABELA E "6km/h sprints" NOS
        //    BULLETS. 6 mph SAO 9,7 km/h — 60% DE DIFERENCA NO MESMO ANUNCIO. ELA AINDA
        //    CHAMA 6 km/h DE "sprint" E DE "marathon training" (6 km/h E CAMINHADA
        //    RAPIDA), DECLARA "25dB Silent" PARA UM MOTOR DE 3,5 HP — ABAIXO DO RUIDO DE
        //    FUNDO DE UM QUARTO — E LISTA O MATERIAL COMO ABS (PLASTICO) NUM APARELHO
        //    VENDIDO COMO "Industrial-grade steel frame" PARA 400 lbs. AS DIMENSOES
        //    TAMBEM NAO BATEM: TABELA 64 x 131 x 20 cm, BULLET 128 x 57 x 16 cm.
        // 6. A UREVO 2-IN-1 DIZ NO BULLET "weight 21.9 Kg" E NA TABELA "Item weight: 17
        //    kg" — 4,9 kg DE DIFERENCA. E E A UNICA DA LISTA COM NOTA ABAIXO DE 4.0: SAO
        //    3.9 EM 921 AVALIACOES, AMOSTRA GRANDE O BASTANTE PARA SER LEVADA A SERIO.
        // 7. A TOPUTURE ESCREVE "TWO-YEARS W*arranty" E "C*ontact Seller" COM ASTERISCO
        //    NO MEIO DA PALAVRA, O MESMO PADRAO DE TEXTO COLADO PARA CONTORNAR FILTRO
        //    QUE ACHAMOS NA KITCHENARM. E GRAFA A PROPRIA MARCA DE DUAS FORMAS NO MESMO
        //    BLOCO: TOPUTURE E TOPOTURE. TAMBEM PROMETE "increase fitness and fat
        //    burning efficiency by 70%", SEM FONTE.
        // 8. A VANNECT ABRE O ANUNCIO COM UM PEDIDO DE DESCULPAS: O PRIMEIRO BULLET DIZ
        //    QUE A ESTEIRA "may result in traces at the joints" E QUE, APESAR DISSO, E
        //    NOVA. O CAMPO "Product grade" DELA E "5". E O BULLET DE ARMAZENAMENTO DIZ
        //    QUE O APARELHO "measures only 50.5*11.6*12.5CM" — UMA MAQUINA DE 116 cm.
        // 9. A UREVO SPACEWALK LITE PREENCHE "Target audience: Treadmill". O PUBLICO-ALVO
        //    DECLARADO E "esteira".
        // 10. CAPACIDADE EM LIBRAS NUMA LOJA BRITANICA DE NOVO: MERACH 400 lbs, VANNECT
        //    330 lbs. A DEERRUN E A UNICA QUE LIDERA COM QUILO — "136KG (300 lbs)" — E A
        //    CONVERSAO DELA ESTA CERTA.
        // 11. A WALKINGPAD Z1 DECLARA "less than 45 decibels", QUE E UM NUMERO PLAUSIVEL
        //    PARA UM MOTOR SOB CARGA. A MERACH DECLARA 25 dB E A SUPERUN 55 dB. AS TRES
        //    NAO PODEM ESTAR TODAS CERTAS.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: TUDO COM MENOS DE 100 AVALIACOES — GEOTECH (3 AVALIACOES, MAS ANUNCIA
        // 4HP E 20% DE INCLINACAO), MJWW (11), UI SCREEN (22), 6-IN-1 (35), MAHROLE (44),
        // SQUATZ (65) — QUE E QUASE METADE DA BUSCA E DIZ ALGO SOBRE A CATEGORIA.
        // DENTRO: NOTA DE 3.9 A 4.8, PRECO DE £127.49 A £289.00, NOVE MARCAS. A UREVO
        // APARECE DUAS VEZES PORQUE OS DOIS MODELOS SAO OPOSTOS: UM COERENTE E BEM
        // AVALIADO, O OUTRO COM A PIOR NOTA DA LISTA.
        //
        // FOCUS KEYWORD: best walking pad
        // VARIACOES TRABALHADAS: walking pad uk / under desk treadmill /
        // walking pad treadmill / foldable treadmill / walking pad with incline /
        // under desk treadmill for home office / walking pad for small spaces /
        // quiet treadmill / walking pad max speed / treadmill belt size
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'fitness',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Fitness',                    // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best fitness gear and activewear available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-walking-pad',                                           // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Walking Pad 2026: 10 Ranked on Belt Length vs Speed',   // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Walking Pad 2026: Top 10 Ranked and Compared',     // TITLE DA ABA/GOOGLE (49 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best walking pad options on Amazon by belt length against top speed, comparing under desk treadmills from £127.49 to £289.00.', // META DESCRIPTION (146 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best walking pad',                                  // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Two numbers decide whether an under desk treadmill is safe to use at the speed it advertises, and listings only ever push one of them. A walking stride at 6 km/h covers around 80cm. A running stride at 12 km/h covers around 1.3 metres, and at 16 km/h closer to 1.5. So the belt length sets the ceiling — and across the ten machines here the relationship runs exactly backwards. WalkingPad, the brand that created the category and holds sixty patents, publishes the longest belt in this comparison at 120cm and caps its top speed at 6 km/h. The machine advertising 16 km/h runs on 104cm. Two more selling 12 km/h run on 95cm and 97cm, narrower than a bath towel is long. Meanwhile three machines publish no belt dimension at all, and one publishes neither belt nor top speed. Horsepower is the other fiction: one listing claims 2.75HP in its title and 10 horsepower in its own specification table, which is 7,457 watts from a socket that delivers 2,990. Below we rank the best walking pad options on Amazon in August 2026 on belt geometry first and marketing second.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "The best walking pad for you is decided by a measurement most listings will not give you. Work out the fastest you will realistically go, then check the belt is long enough for that stride: 100cm is fine up to about 6 km/h, you want 120cm before you jog at 8, and nothing in this price bracket has the deck to run at 12 or 16 whatever the display goes up to. Belt width matters just as much and gets even less attention — 40cm is the practical floor for walking and the 38cm and 39cm decks here are tighter than that. By contrast, ignore horsepower completely. Every figure in this comparison is a peak rating rather than continuous output, nobody publishes the CHP that would let you compare them, and the arithmetic gives the game away: the highest claim on this page is 10 horsepower, or 7,457 watts, from a machine that plugs into a 13 amp socket rated for 2,990. Crucially, treat a missing specification as a specification. When a manufacturer publishes the belt size and then caps the speed at 6 km/h, it has measured its own product; when it advertises 16 km/h and never mentions the deck, it is selling a number on a display.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                          // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 03:55:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'WalkingPad P1 Folding Treadmill, 120 x 41.5cm Belt, 0.5-6 km/h',          // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£289.00',                                                               // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 1002,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61KsrkS7C3L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best walking pad',                                                   // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09789DHP3?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best walking pad here because of what it refuses to claim: the longest belt in this comparison at 120cm, a 6 km/h ceiling, and no horsepower figure at all.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "One thousand and two ratings makes this the deepest sample in the category, and the specification behind them is the most internally honest on this page. The running board is 120 x 41.5cm, the longest belt in the comparison by 16cm, and the top speed is 6 km/h. Those two numbers agree with each other: a brisk walking stride is about 80cm, so 120cm of belt gives you real margin front and back. WalkingPad could have printed a higher number on the display. It did not, and it is the only brand here whose deck could actually justify one.

It also declines to quote horsepower anywhere, which in a category where a rival claims ten of them is a sign of a company that expects to be checked. What it does publish is complete: 28kg, aluminium alloy frame, 143.2 x 54.7 x 12.9cm unfolded and 82.2 x 54.7 x 12.9cm folded, a 57mm platform height that is the lowest here, and a shock-absorbing board. Auto mode uses sensors to match your pace rather than making you fiddle with a remote, and there is a child lock, a KS Fit app and no assembly.

The reservations are price and rating. At £289.00 this is the most expensive machine in the comparison, and 4.2 stars is joint lowest among the ones above 4.0, which for a category leader is a modest verdict. At 28kg it is also the heaviest thing here to shift under a sofa, and the bullet describing it as lightweight is doing some work. The one-year warranty is standard rather than generous.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['120 x 41.5cm belt, the longest deck in this comparison', 'Speed capped at 6 km/h, consistent with the belt it publishes', 'Claims no horsepower figure at all, unlike every rival here', '1,002 ratings, the deepest sample on this page', '57mm platform height and full folded dimensions published'], // PONTOS POSITIVOS
                'contras' => ['£289.00, the most expensive machine in this comparison', '4.2 stars is a modest average for the category leader', '28kg is the heaviest unit here to move and store', 'One-year warranty only'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'WalkingPad Z1 Under Desk Treadmill, 180 Degree Fold, 6 km/h, 110kg',      // NOME (ENCURTADO)
                'price' => '£269.00',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 307,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61hj1YkFX+L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'WalkingPad Z1 foldable under desk treadmill in off-black',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G8DHGSWL?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Declares 2 horsepower, the lowest claim on this page, and under 45 decibels — the only noise figure here that a running motor could actually produce.', // TEXTO CURTO (CARD)
                'body' => "The Z1 folds through 180 degrees, so a 142.5cm machine becomes something you slide upright behind a door rather than flat under a bed. That is the reason to buy it over the P1, along with the 23kg weight that makes the fold worth doing and a 110kg user capacity stated in kilograms rather than pounds.

What puts it second is the restraint in the numbers. It declares 2 horsepower, the lowest figure anyone here admits to and roughly 1,491 watts, in a comparison where a rival claims ten. It quotes under 45 decibels, which for a brushless motor under load is a figure you could actually measure in a room — the Merach further down this page claims 25dB from a motor it calls a beast, which is quieter than the room it would be standing in. And like the P1 it caps at 6 km/h, which is the speed a machine of this footprint is for.

Two things to weigh. The material is listed as ABS, meaning the visible body is plastic, where the P1 is aluminium — and the Z1 costs only twenty pounds less. And the belt dimensions are not published at all, only the 142.5 x 56cm overall footprint, so unlike its sibling you cannot check the deck against the speed. Three hundred and seven ratings at 4.4 stars is a decent but shallow record next to the P1, though the 4.4 is the better average of the two.", // TEXTO SEO LONGO
                'pros' => ['180 degree fold stores upright rather than flat, unique here', 'Declares 2HP, the lowest and most plausible power claim on this page', 'Under 45dB is a noise figure a loaded motor could genuinely produce', 'User capacity stated as 110kg rather than in pounds', '23kg with 4.4 stars, the better average of the two WalkingPads'], // PONTOS POSITIVOS
                'contras' => ['Body material listed as ABS plastic, against aluminium on the P1', 'Belt dimensions not published, only the overall footprint', '£269.00 is only £20 less than the better specified P1', '307 ratings is a thin sample beside the P1'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Urevo SpaceWalk Lite Walking Pad, 100 x 40cm Belt, 1-6 km/h',             // NOME (ENCURTADO)
                'price' => '£199.00',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 229,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61eDs-U+EaL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Urevo SpaceWalk Lite walking pad in black',                          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BX6FFC54?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Publishes the belt at 100 x 40cm and the speed at 1-6 km/h, which is the only pair of numbers on this page besides the P1 that make sense together.', // TEXTO CURTO (CARD)
                'body' => "Third place goes to a machine that does almost nothing interesting, which in this category is the compliment it sounds like. The belt is 100 x 40cm. The speed range is 1 to 6 km/h. The overall size is 121 x 53 x 12.4cm and it weighs 16kg, the lightest here. There is no incline, no handrail, no Bluetooth speaker and no horsepower claim. Every number Urevo prints is one you could check with a tape measure, and none of them contradicts another.

For the actual job — walking at 2 to 4 km/h under a desk for two hours while you work — that is the correct set of features. One hundred centimetres of belt at 6 km/h gives you adequate margin for a walking stride, forty centimetres of width is the practical minimum and the same as the WalkingPad P1, and 16kg means you can genuinely move it alone. The display covers speed, time, distance, steps and calories, and the remote clips magnetically to the side.

Two marks against. At £199.00 it is expensive for what it is: the DeerRun at number five costs £71.51 less and adds an incline. And the specification table has been filled in carelessly — the recommended uses field reads \"Treadmill for Home Office\" and the target audience field reads simply \"Treadmill\", which is the machine, not the person. Two hundred and twenty-nine ratings at 4.5 stars is a solid if unremarkable record.", // TEXTO SEO LONGO
                'pros' => ['Belt published at 100 x 40cm and speed capped at 6 km/h to match', '16kg, the lightest machine in this comparison', 'No horsepower claim and no unverifiable numbers anywhere', '4.5 stars, above the two WalkingPads', 'Low 12.4cm profile slides under a sofa easily'], // PONTOS POSITIVOS
                'contras' => ['£199.00 is steep beside a £127.49 machine with an incline', 'Target audience field in the specification table reads Treadmill', 'No incline, no handrail and no app of its own', '229 ratings is a thin sample'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'HomeTro 4-in-1 Walking Pad, 97 x 39cm Belt, 9% Incline, 1-12 km/h',       // NOME (ENCURTADO)
                'price' => '£179.99',                                                               // PRECO
                'rating' => 4.8,                                                                    // NOTA
                'reviews_count' => 307,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61Za0IMtFrL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'HomeTro folding walking pad with handle in black and red',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GR95FKLT?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest rated machine here at 4.8, and one of the few that publishes the belt — which is how you can see 12 km/h will not fit on 97cm of it.', // TEXTO CURTO (CARD)
                'body' => "Four point eight stars across 307 ratings is the best average in this comparison by a clear margin, and there is a genuinely thoughtful piece of engineering behind it that nobody else here mentions: a side lubrication port. Treadmill belts need silicone under them every few months, and on most walking pads that means unbolting the deck. A port turns a job into a squirt, and it is the difference between a machine that still runs smoothly in year three and one that starts juddering.

The rest is a well-equipped mid-price package. Nine per cent manual incline, dual LED displays, app connectivity with route videos, a mute mode, six silicone shock absorbers and two cushioning pads under a five-layer belt, an alloy frame, and 21.8kg folding to 127 x 59 x 13cm. HomeTro also publishes the belt at 97 x 39cm, which puts it in the honest half of this page.

That published belt is also the problem. The advertised range runs to 12 km/h, and a running stride at 12 km/h is around 1.3 metres against 97cm of deck and 39cm of width. Below 6 km/h this is an excellent walking pad; above that you are running on a surface that does not have room for the stride, with a handle rather than full rails to catch you. Read the top speed as a specification the machine can technically reach rather than one you should use, and the 4.8 stars make more sense — most owners are walking.", // TEXTO SEO LONGO
                'pros' => ['4.8 stars across 307 ratings, the highest average in this comparison', 'Side lubrication port, a maintenance feature nobody else here offers', 'Publishes the belt at 97 x 39cm rather than only the footprint', '9% incline, six shock absorbers and a five-layer belt at £179.99', '21.8kg folding to 13cm, easy to store'], // PONTOS POSITIVOS
                'contras' => ['12 km/h advertised on a 97cm belt that cannot fit a running stride', '39cm belt width is below the practical minimum for comfortable walking', 'Handle rather than full handrails at running speeds', 'Bullet text uses emoji as numbering, which reads badly to screen readers'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'DeerRun Walking Pad with 6% Incline, 136kg Capacity, 2.5HP',              // NOME (ENCURTADO)
                'price' => '£127.49',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 174,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61yZd7djpQL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'DeerRun walking pad with incline in matt black',                     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DNMG624C?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest machine here at £127.49 and the only one that leads with kilograms — 136KG (300 lbs) — but it publishes no top speed anywhere at all.', // TEXTO CURTO (CARD)
                'body' => "At £127.49 this is the least expensive walking pad in the comparison and it still includes a 6% manual incline, PitPat app connectivity, a remote and an LED display. It is 109 x 50 x 10cm and 20kg, which is a genuinely small footprint, and the 10cm height is the second lowest here. Four point five stars across 174 ratings is respectable.

DeerRun also does the one small thing this category consistently gets wrong. Every rival quoting a user capacity does it in pounds — 400 lbs on the Merach, 330 lbs on the Vannect — on a British listing. DeerRun writes 136KG and then puts 300 lbs in brackets, which is the correct conversion and the right way round. It is a small courtesy that tells you somebody read the listing before publishing it.

The gap is large, though. No maximum speed is published in the title, the bullets or the specification table. On a treadmill, speed is the primary specification; a listing that omits it is asking you to buy a machine without knowing whether it walks at 4 km/h or runs at 10. The belt dimensions are missing too, so both halves of the calculation this article is about are unavailable. And the 2.5HP claim — about 1,864 watts — is offered without a wattage or a continuous rating, like everyone else here. Buy it as a cheap walking pad and it will very likely be fine; just understand you are buying it blind on the two numbers that matter.", // TEXTO SEO LONGO
                'pros' => ['£127.49, the cheapest machine in this comparison', 'The only listing that leads with kilograms and converts correctly', '6% incline and app connectivity at the entry price', '109 x 50 x 10cm and 20kg, the second lowest profile here', '4.5 stars across 174 ratings'], // PONTOS POSITIVOS
                'contras' => ['No maximum speed published anywhere on the listing', 'Belt dimensions not published either', '2.5HP quoted with no wattage and no continuous rating', '174 ratings is one of the thinner samples here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Toputure 6-in-1 Folding Treadmill, 104 x 42cm Belt, 12% Incline, 16 km/h', // NOME (ENCURTADO)
                'price' => '£254.99',                                                               // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 351,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Oy3t6yO8L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Toputure folding treadmill with incline in black and yellow',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G815Z5HQ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most equipped machine on the page, with heart rate grips, a Bluetooth speaker and a 12% incline — and 16 km/h advertised on 104cm of belt.', // TEXTO CURTO (CARD)
                'body' => "This is the most machine on the page for the money. A three-stage incline at 1%, 6% and 12%, heart rate sensors in the side grips, a Bluetooth speaker, dual LED displays, app control, eight shock-absorbing pads, and a quick-release that converts a 133cm flat walking pad into a 125cm upright treadmill with a console. At 35.4kg it is the heaviest here and the carbon steel frame feels it. Four point seven stars across 351 ratings is the second best average in this comparison.

The published belt is 104 x 42cm. The published top speed is 16 km/h. A stride at 16 km/h is roughly a metre and a half, which is 44cm longer than the entire deck, and at that pace a mistimed footfall goes off the back of the belt rather than onto it. Twelve per cent incline at 16 km/h on 104cm is not a workout, it is a mechanism for falling over. Used at 4 to 8 km/h with the console up, this is a good machine; the top third of its speed range exists to win a comparison table.

Three smaller flags. The listing promises to \"increase fitness and fat burning efficiency by 70%\", a figure with no source and no definition. The warranty bullet reads \"TWO-YEARS W*arranty\" and the support line reads \"C*ontact Seller\", with asterisks inserted into ordinary words — the pattern of text pasted to slip past a filter. And the brand is spelled TOPUTURE in one sentence and TOPOTURE in the next, in the same bullet.", // TEXTO SEO LONGO
                'pros' => ['4.7 stars across 351 ratings, the second best average here', 'Three-stage incline at 1%, 6% and 12%, the widest range on this page', 'Heart rate grips, Bluetooth speaker and dual LED displays', 'Converts from flat walking pad to upright treadmill with a console', '35.4kg carbon steel, the most substantial build in this comparison'], // PONTOS POSITIVOS
                'contras' => ['16 km/h on a 104cm belt, the worst speed to deck mismatch here', 'Claims a 70% increase in fat burning efficiency with no source', 'Warranty and support text written with asterisks inside the words', 'Brand spelled two different ways within the same bullet block'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Vannect 4-in-1 Walking Pad, 100 x 40cm Belt, 9% Incline, 1-10 km/h',      // NOME (ENCURTADO)
                'price' => '£139.99',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 220,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61SJcFmVLkL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Vannect 4-in-1 walking pad with incline in black and blue',          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FPLSGKPB?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Says 2.75HP in the title and 10 horsepower in its own specification table — 7,457 watts from a socket rated for 2,990.', // TEXTO CURTO (CARD)
                'body' => "The single most striking number we found in this category is in this listing, and it is in the specification table rather than the marketing. Maximum horsepower: 10 Horsepower. Ten horsepower is 7,457 watts. A British 13 amp socket at 230 volts delivers 2,990 watts at absolute maximum, so this figure is two and a half times what the plug can supply — and it contradicts the machine's own title, which says 2.75HP, by a factor of 3.6. Somebody typed a number into a form and nobody checked it, which is the honest reading; but it sits in the field a buyer would use to compare motors.

Underneath that the machine is decent value at £139.99. The belt is published at 100 x 40cm, matching the Urevo at number three, there is a 9% manual incline, twelve HIIT programmes, eight silicone shock absorbers, a five-layer belt and a magnetic remote, and it weighs 22kg. Four point six stars across 220 ratings is the third best average here.

Two more oddities are worth naming. The very first bullet on the listing is an apology, explaining that the belt \"may result in traces at the joints\" and reassuring you it is new — leading with a defect disclaimer is unusual. The product grade field simply reads 5. And the storage bullet says the machine measures only 50.5 x 11.6 x 12.5cm, which describes a shoebox rather than the 116cm appliance in the specification table above it. As with the horsepower, the numbers here are not connected to anything.", // TEXTO SEO LONGO
                'pros' => ['Belt published at 100 x 40cm, matching machines costing £60 more', '4.6 stars across 220 ratings', '9% incline and twelve HIIT programmes at £139.99', 'Eight silicone shock absorbers under a five-layer belt', '22kg with a magnetic remote and full assembly out of the box'], // PONTOS POSITIVOS
                'contras' => ['Specification table claims 10 horsepower, or 7,457 watts', 'Title says 2.75HP, a 3.6-fold contradiction on the same page', 'First bullet is a disclaimer about marks on the belt seam', 'Storage dimensions given as 50.5 x 11.6 x 12.5cm for a 116cm machine'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Merach Heavy Duty Walking Pad, 42cm Belt, 12% Auto Incline, 400lb',       // NOME (ENCURTADO)
                'price' => '£239.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 107,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/718gnQuq4pL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Merach heavy duty walking pad treadmill with auto incline in black', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DSB7FQ8G?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Auto incline and a 42cm belt are real advantages, but the specification says 6 mph while the bullets say 6 km/h, and 25dB is claimed from a 3.5HP motor.', // TEXTO CURTO (CARD)
                'body' => "Two things here are genuinely better than the competition. The incline is motorised and remote-controlled across 0 to 12%, where every other incline on this page is a manual flap you lift by hand, and the belt is 42cm wide, the widest published figure in the comparison — Merach even makes the point that the standard is 35cm, which is a useful admission about the rest of the category. At 31kg with auto incline and a 400lb capacity it is built for heavier users, which is a real and underserved need.

The listing around those facts is a mess. The specification table gives the maximum speed as 6 mph. The bullets give it as 6 km/h. Those are 9.7 and 6.0 kilometres per hour respectively, a 60% difference on one page, and the bullets then describe 6 km/h as \"sprints\" and recommend the machine for \"marathon training\" — 6 km/h is a brisk walk. The motor is called a 3.5HP brushless beast, which is 2,610 watts, and in the same sentence it is said to run at 25dB, which is quieter than the ambient noise of an empty room. The material field says ABS, meaning plastic, on a machine sold on its industrial-grade steel frame. And the dimensions appear twice and disagree: 64 x 131 x 20cm in the table, 128 x 57 x 16cm in the bullets.

One hundred and seven ratings at 4.5 stars is the thinnest sample in this comparison, and the belt length — as opposed to width — is never given.", // TEXTO SEO LONGO
                'pros' => ['Motorised remote-controlled incline, the only auto incline here', '42cm belt width, the widest published figure in this comparison', '400lb capacity and a 31kg frame built for heavier users', 'Six-layer belt with multi-zone cushioning', '4.5 stars across its ratings'], // PONTOS POSITIVOS
                'contras' => ['Specification says 6 mph, bullets say 6 km/h, a 60% difference', 'Calls 6 km/h a sprint and recommends it for marathon training', 'Claims 25dB from a motor it describes as a 3.5HP beast', 'Material listed as ABS plastic on an industrial-grade steel frame claim'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Superun Walking Pad Raceable, 95 x 38cm Belt, 6% Incline, 6/12 km/h',     // NOME (ENCURTADO)
                'price' => '£159.99',                                                               // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 330,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71YEL6Vrg9L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Superun walking pad with handrails and incline in black',            // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GXFBW16V?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing that converts its horsepower into watts — 2237W — and the smallest deck in the comparison at 95 x 38cm, running to 12 km/h.', // TEXTO CURTO (CARD)
                'body' => "Superun deserves credit for one thing no rival does: it publishes the motor in watts. The second bullet says a high-performance 2237W motor, and 2237 watts is exactly three horsepower, so at least the conversion is honest. It is still a peak figure rather than a continuous one — 2,237 watts drawn constantly is 75% of everything a 13 amp socket can supply, from a machine costing £159.99 — but printing the watts is more useful than printing HP, because watts are what the plug has to deliver.

The machine has side handrails, which genuinely matter if you intend to go faster than a walk, a 6% manual incline, gamified app connectivity with online events, and 22.9kg on an alloy steel frame. It comes fully assembled. Three hundred and thirty ratings is a reasonable sample.

The deck is where it falls down. Ninety-five by thirty-eight centimetres is the smallest running surface in this comparison in both directions — five centimetres shorter than the next shortest and two narrower than anything else that publishes a figure. The advertised range goes to 12 km/h. A running stride at that speed is around 1.3 metres, on a 95cm belt, 38cm wide. Superun calls it \"Raceable\" and describes high-speed runs, and the handrails are an acknowledgement of what that combination feels like. Four point two stars is joint lowest among the machines here rated above 4.0, and the claimed 55dB is at least a number a running motor could produce.", // TEXTO SEO LONGO
                'pros' => ['The only listing here that publishes the motor in watts, at 2237W', 'Side handrails, useful at anything above walking pace', '6% manual incline and gamified app with online events', 'Fully assembled out of the box at 22.9kg', '330 ratings, a reasonable sample for this category'], // PONTOS POSITIVOS
                'contras' => ['95 x 38cm is the smallest deck in this comparison in both directions', '12 km/h advertised on a belt 35cm shorter than the stride needs', '2237W is a peak figure, three quarters of a 13 amp socket', '4.2 stars is at the bottom of the machines rated above 4.0 here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Urevo 2-in-1 Walking Pad with Handle, Foldable, 6 and 10 km/h Modes',     // NOME (ENCURTADO)
                'price' => '£189.97',                                                               // PRECO
                'rating' => 3.9,                                                                    // NOTA
                'reviews_count' => 921,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Qk-XjvMXL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Urevo 2-in-1 foldable walking pad with handle in black and yellow',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D6YRDTPW?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only machine here rated below four stars, and the sample is large enough to mean it: 3.9 across 921 ratings, with the listing disagreeing with itself on weight.', // TEXTO CURTO (CARD)
                'body' => "This is included because 921 ratings is the second deepest sample in the comparison and the verdict they deliver is one you should see. Three point nine stars is the only average below four on this page, and unlike the thin 100-to-300 rating samples elsewhere here, 921 is enough that the number is not noise. Every other machine in this comparison is rated between 4.2 and 4.8.

The proposition is reasonable on paper. A handrail folds up so the same unit works as a 6 km/h walking pad under a desk and a 10 km/h treadmill with something to hold, there is Zwift and Kinomap compatibility alongside Urevo's own app, the frame is alloy steel with a five-layer belt and two rubber shock pads, and it is £189.97.

But the listing does not hold together, and neither half of the belt calculation is available. Urevo publishes no belt dimensions, only a 130 x 58cm footprint, while advertising 10 km/h. And it gives two different weights: the fourth bullet says 21.9kg, the specification table says 17kg — 4.9 kilograms apart, on the same page, for the same product. Weight is what tells you whether you can lift it onto its side alone, and it is also a rough proxy for how solid a treadmill feels underfoot at speed. When a manufacturer cannot agree with itself on how heavy its machine is, the 3.9 stars start to look less like bad luck.", // TEXTO SEO LONGO
                'pros' => ['921 ratings, the second deepest sample in this comparison', 'Folding handrail converts it between a 6 km/h pad and a 10 km/h treadmill', 'Compatible with Zwift and Kinomap as well as the Urevo app', 'Alloy steel frame with a five-layer belt and dual shock pads', 'Magnetic remote that stores on the machine'], // PONTOS POSITIVOS
                'contras' => ['3.9 stars, the only average below four here, across a large sample', 'Bullet says 21.9kg, specification table says 17kg', 'No belt dimensions published while advertising 10 km/h', 'Costs more than three better rated machines on this page'], // PONTOS NEGATIVOS
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
        $this->command?->info("WalkingPadsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
