<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class SoupMakersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE SOUP MAKERS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA FILTRADA: /s?k=soup+maker&rh=p_36%3A3500-  (14 ASINS UNICOS EM 22 CARDS)
        // CATEGORIA KITCHEN: 5% DE COMISSAO. SAZONAL: PICO DE SETEMBRO A JANEIRO.
        //
        // ─── ACHADOS ───
        // 1. O NUMERO QUE DECIDE A COMPRA NAO E O LITRO, E O MILILITRO POR PORCAO — E
        //    UM SO ANUNCIO DOS DEZ PUBLICA ESSA CONTA. A HAMILTON BEACH ESCREVE, NO
        //    PROPRIO BULLET: "450ml for 4 portions, 250ml for 6 portions". COM ESSE
        //    NUMERO NA MAO DA PARA MEDIR TODO MUNDO. A TABELA QUE MONTAMOS:
        //      MORPHY RICHARDS CLASSIC 1,6L .. "up to six people" ..... 267 ml
        //      DAEWOO 2-IN-1 1,6L ............ "up to 6 portions" ..... 267 ml
        //      TOWER T12031 1,6L ............. "up to 6 portions" ..... 267 ml
        //      MORPHY RICHARDS COMPACT 1L .... "up to three servings" . 333 ml
        //      TEFAL EASY SOUP 1,2L .......... "up to four servings" .. 300 ml
        //      MORPHY RICHARDS 501022 1,6L ... "serve up to 4 people" . 400 ml
        //      HAMILTON BEACH 1,6L ........... 4 a 6 porcoes .......... 450 / 250 ml
        //    UMA LATA DE SOPA HEINZ NO REINO UNIDO TEM 400 g. ENTAO "SEIS PORCOES" DE
        //    UM APARELHO DE 1,6L SIGNIFICA DOIS TERCOS DE UMA LATA POR PESSOA.
        // 2. A CONTRADICAO MAIS DIRETA E INTERNA A UMA MARCA SO. A MORPHY RICHARDS VENDE
        //    A CLASSIC DE 1,6L COMO "up to six people" E A 501022, TAMBEM DE 1,6L, COMO
        //    "Serve up to 4 people". MESMA MARCA, MESMO LITRO, 50% DE DIFERENCA NO QUE
        //    A EMPRESA CHAMA DE PORCAO — 267 ml CONTRA 400 ml.
        // 3. A NINJA E A UNICA DAS DEZ QUE PUBLICA O LIMITE DE ENCHIMENTO A QUENTE:
        //    "Max fill: 1.7L Cold, 1.4L Hot". SAO 18% A MENOS QUANDO O APARELHO ESTA
        //    FAZENDO AQUILO QUE VOCE COMPROU ELE PARA FAZER. NENHUM OUTRO ANUNCIO
        //    RECONHECE QUE EXISTE UM SEGUNDO NUMERO — TODOS VENDEM UM LITRO SO. SE A
        //    MESMA MARGEM VALER PARA OS DEMAIS, UM "1,6L" ENTREGA PERTO DE 1,3L QUENTE,
        //    E AI AS "SEIS PORCOES" CAEM PARA 217 ml.
        // 4. A TOWER PUBLICA AS MESMAS DIMENSOES — 25,4 x 5,08 x 6,86 cm — PARA A T12031
        //    DE 1,6L E PARA A T12056 DE 1L. DUAS CAPACIDADES DIFERENTES, A MESMA CAIXA.
        //    E O VOLUME EXTERNO DESSA CAIXA E 885 cm3, OU SEJA 0,885 LITRO: MENOS DA
        //    METADE DO QUE A JARRA DE 1,6L DEVERIA SEGURAR POR DENTRO. 5,08 cm SAO
        //    EXATAMENTE 2 POLEGADAS E 6,86 cm SAO 2,7 — E CAMPO PREENCHIDO POR
        //    CONVERSAO AUTOMATICA, NAO POR MEDICAO.
        // 5. A NINJA SE CONTRADIZ NA PROPRIA PAGINA: O BULLET DIZ "H42cm x W38cm x
        //    D20cm" E A TABELA DE ESPECIFICACAO DIZ "21.5D x 20W x 45H centimetres".
        //    DEZOITO CENTIMETROS DE DIFERENCA NA LARGURA E TRES NA ALTURA, NO MESMO
        //    ANUNCIO — E LARGURA E O QUE DECIDE SE CABE DEBAIXO DO ARMARIO.
        // 6. A MORPHY RICHARDS SAUTE DIZ NO BULLET "lightweight aluminium pot" E NA
        //    TABELA "Material: Stainless Steel", QUE E TAMBEM O QUE ESTA NO TITULO.
        //    ALUMINIO E INOX AQUECEM E ARRANHAM DE FORMA DIFERENTE; NAO E DETALHE.
        //    A TOWER VIZION REPETE O ERRO AO CONTRARIO: BULLET DIZ JARRA DE TRITAN
        //    TRANSPARENTE, TABELA DIZ INOX, E O CAMPO "Colour" DELA E "1.6 Transparent".
        // 7. DUAS FICHAS DA MORPHY RICHARDS AFIRMAM QUE A LAMINA SERRATOR "stays sharper
        //    12 time longer than an ordinary blade". DOZE VEZES, SEM FONTE, SEM NORMA E
        //    COM O MESMO ERRO DE DIGITACAO NOS DOIS ANUNCIOS. A CLASSIC TAMBEM TRAZ
        //    "less than tweny five minutes" NO PROPRIO BULLET.
        // 8. METADE DAS FICHAS NAO PUBLICA A POTENCIA. ONDE PUBLICA, O WATT POR LITRO
        //    VAI DE 625 (MORPHY RICHARDS CLASSIC, DAEWOO, TOWER) A 900 (MORPHY RICHARDS
        //    COMPACT) — 44% DE VARIACAO. AQUI ISSO PESA MENOS QUE NUMA SLOW COOKER,
        //    PORQUE O APARELHO PRECISA FERVER E NAO MANTER, MAS E O QUE SEPARA 19 DE
        //    31 MINUTOS.
        // 9. ASINS DUPLICADOS DE NOVO: A NINJA FOODI APARECE COMO B07YF8YP5G (£180.00) E
        //    B0F29MHZCY (£179.99) COM AS MESMAS 4.325 AVALIACOES, E A HAMILTON BEACH
        //    COMO B0D62WS6X6 E B0F99S3YZY COM AS MESMAS 555 A £59.98.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: TOWER VIZION T12067 (94 AVALIACOES, 4.1 — A MENOR NOTA DA BUSCA) E TOWER
        // T12056 DE 1L (104 AVALIACOES), MANTIDA A T12031 QUE TEM 1.389 E CARREGA A
        // MESMA FICHA DE DIMENSOES; LAKELAND (16 AVALIACOES) E KEPLIN (75); OS ASINS
        // IRMAOS DA NINJA E DA HAMILTON BEACH, MANTIDO O MAIS BARATO DE CADA POOL.
        // MORPHY RICHARDS APARECE TRES VEZES PORQUE E A MARCA QUE CRIOU A CATEGORIA NO
        // REINO UNIDO E OCUPA TRES DAS SEIS PRIMEIRAS POSICOES DA BUSCA.
        // DENTRO: NOTA DE 4.3 A 4.8, PRECO DE £36.20 A £180.00, SEIS MARCAS.
        //
        // FOCUS KEYWORD: best soup maker
        // VARIACOES TRABALHADAS: soup maker uk / 1.6l soup maker / soup and smoothie
        // maker / morphy richards soup maker / compact soup maker / soup maker for one
        // person / best soup maker for families / soup maker with keep warm /
        // soup maker blender / how many portions in a soup maker
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "kitchen", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-soup-maker',                                          // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Soup Maker 2026: 10 Ranked on Millilitres Per Portion', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Soup Maker 2026: Top 10 Ranked and Compared',    // TITLE DA ABA/GOOGLE (49 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best soup maker options on Amazon by millilitres per portion rather than litres, comparing 1L to 1.75L machines from £36.20 to £180.00.', // META DESCRIPTION (152 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best soup maker',                                 // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Every soup maker listing sells you a litre and a portion count, and almost none of them will divide one by the other. Do it yourself and the category falls apart. Morphy Richards calls 1.6 litres six people on one model and four people on another — the same brand, the same capacity, and a 50% swing in what the word portion means. Only one machine in this comparison prints the actual millilitres: Hamilton Beach states 450ml for four servings or 250ml for six, and once you have that figure you can hold every other listing to it. A 400g tin of Heinz is the British benchmark for one bowl, so a 1.6L soup maker sold as feeding six is offering two-thirds of a tin each. Meanwhile Ninja is the only brand that admits the jug holds less when it is hot — 1.7 litres cold, 1.4 litres hot — an 18% drop that nobody else acknowledges exists. Below we rank the best soup maker options on Amazon in August 2026 on the arithmetic the listings leave out, and flag the fiction where we found it.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Choosing the best soup maker comes down to one sum the marketing never shows you: capacity divided by the number of people you actually feed. Decide what a bowl of soup is in your house first — 300ml is a light lunch, 400ml matches a tin, 450ml is a meal — then multiply. On that basis a 1.6L machine is an honest four-portion appliance and a generous three, not the six it is usually sold as, and a 1L compact soup maker is right for one or two people rather than the three it claims. Crucially, take another 15 to 20% off before you commit, because Ninja is the only manufacturer here willing to publish the hot fill limit and its own numbers show the jug shrinking from 1.7 litres to 1.4 the moment it starts cooking. By contrast, treat the programme count as noise: every machine on this page makes smooth soup and chunky soup, and the ten Auto-iQ settings on the most expensive model are mostly milkshakes. What is worth paying for is a sauté function, which lets you brown onions in the same jug, and a specification table you can trust — one brand here publishes external dimensions smaller than the jug it claims to contain, and another gives two different sets of dimensions on the same page.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                        // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 03:40:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Morphy Richards Classic Soup Maker 1.6L, 1000W, Smooth and Chunky',       // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£55.68',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 12392,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61qgeLgyxcL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best soup maker',                                                    // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00844D5FG?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best soup maker here on weight of evidence: 12,392 ratings, a stainless steel 1.6L jug and 1000W, at a price under half what the top-rated machine costs.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Twelve thousand three hundred and ninety-two ratings is more than double the next deepest sample in this comparison, and at 4.4 stars that verdict is settled in a way no other soup maker on this page can match. The machine behind it is deliberately plain: a 1.6 litre stainless steel jug, a 1000 watt element, a motorised blade and two programmes, smooth and chunky. There is no sauté, no steamer basket and no app.

That plainness is the argument for it. At 625 watts per litre it sits mid-table on heating power, which translates to soup in a little over twenty minutes, and the one-button operation means the failure modes are few. It is the machine you buy when you want soup twice a week for years rather than a gadget that also makes milkshakes, and the review count suggests a lot of British kitchens reached the same conclusion.

Two things in the listing deserve flagging. It promises soup for up to six people from 1.6 litres, which works out at 267ml a head — Hamilton Beach, the only brand here that publishes the millilitres, calls 250ml a six-portion serving and 450ml a four-portion one, so treat this as a four-bowl machine. And the bullet advertising it contains a plain typo, offering soup in \"less than tweny five minutes\". Neither changes what the appliance does, but the six-person claim will change what you buy if you take it literally.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['12,392 ratings at 4.4, more than double the next deepest sample here', 'Publishes wattage, capacity and material in full', '1000W across 1.6 litres is 625 watts per litre, soup in around 22 minutes', 'Stainless steel jug and body rather than coated aluminium', 'Costs less than a third of the top-rated machine on this page'], // PONTOS POSITIVOS
                'contras' => ['Six-person claim is 267ml a bowl, two-thirds of a tin of soup', 'Only two programmes: no sauté, no keep warm', 'Bullet text contains an uncorrected typo on the cooking time'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Daewoo 2-in-1 Soup Maker and Smoothie Blender 1.6L, 1000W',               // NOME (ENCURTADO)
                'price' => '£36.20',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 4388,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71m24318vkL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Daewoo 2-in-1 stainless steel soup maker and smoothie blender',      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07T5VRZGX?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest machine here at £36.20 and one of only four that publishes a full specification table, including the auto shut-off that half this category omits.', // TEXTO CURTO (CARD)
                'body' => "At £36.20 this is the least expensive soup maker in the comparison by nearly four pounds, and it gives up remarkably little to get there. The jug is 1.6 litres of stainless steel, the element is 1000 watts, the same 625 watts per litre as the Morphy Richards Classic that costs twenty pounds more, and there are 4,388 ratings at 4.3 stars behind it.

What earns it second place is the specification table rather than the price. Daewoo publishes dimensions of 26 x 18.5 x 36cm, a weight of 2.58kg, the wattage, the capacity and — unusually — a straight yes on auto shut-off, a field several rivals here either leave blank or answer no. It also lists dry burning prevention and an interlocking lid. Meanwhile the three-year warranty is the longest offered by any machine on this page other than Tower.

The catch is the same portion fiction as everywhere else: the title advertises up to six portions from 1.6 litres, which is 267ml a bowl. The listing also loads fourteen separate claims into the special features field, from jam making to keep warm, without a single number attached to any of them. And at 4.3 stars it shares the lowest rating in this comparison, so while the sample is large enough to trust, the verdict it delivers is good rather than excellent.", // TEXTO SEO LONGO
                'pros' => ['Cheapest here at £36.20, with 4,388 ratings behind it', '1000W across 1.6 litres, identical heating to machines costing £20 more', 'Publishes dimensions, weight, wattage and auto shut-off in full', 'Three-year warranty and dry burning prevention', 'Auto stir and overspill spout at the entry price'], // PONTOS NEGATIVOS
                'contras' => ['Six-portion claim is 267ml a bowl', '4.3 stars is the joint lowest rating on this page', 'Fourteen features listed with no measurement attached to any of them'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Ninja Foodi Blender and Soup Maker HB150UK, 1.7L Glass Jug, 1000W',       // NOME (ENCURTADO)
                'price' => '£180.00',                                                               // PRECO
                'rating' => 4.8,                                                                    // NOTA
                'reviews_count' => 4325,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61UtvOaP4EL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Ninja Foodi soup maker and blender with heat resistant glass jug',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07YF8YP5G?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing of ten that publishes a hot fill limit — 1.7L cold, 1.4L hot — and the only one rated 4.8, but it costs three times the median machine here.', // TEXTO CURTO (CARD)
                'body' => "This is the best-rated soup maker on the page, 4.8 stars across 4,325 ratings, and it is also the only one that tells you the truth about capacity. Buried in the fifth bullet is a line no competitor prints: max fill 1.7 litres cold, 1.4 litres hot. That is an 18% reduction the moment the heating element comes on, and there is no reason to think the other nine jugs behave differently — they simply do not say. Ninja publishing it is the single most useful piece of information in this whole comparison.

The hardware justifies part of the price. It is a genuine hot-and-cold blender rather than a heated jug with a blade: a heat-resistant glass jug with non-stick coating, a tamper for thick mixtures, auto-stir, a dedicated cleaning programme and ten Auto-iQ presets alongside six manual settings. If you also want a blender, this replaces two appliances, and 1000 watts across a 1.4 litre hot fill is 714 watts per litre, the second highest here.

However, £180 is three times the median price on this page and five times the cheapest. It also contradicts itself on size: the bullets give H42 x W38 x D20cm while the specification table says 21.5D x 20W x 45H — eighteen centimetres apart on width, which is exactly the measurement that decides whether it fits under a wall cabinet. And the same machine sells under a second ASIN at £179.99 with the identical 4,325 ratings.", // TEXTO SEO LONGO
                'pros' => ['4.8 stars across 4,325 ratings, the highest rated machine here', 'The only listing that publishes a hot fill limit: 1.7L cold, 1.4L hot', 'Genuine hot and cold blender with tamper, auto-stir and cleaning programme', 'Heat-resistant glass jug rather than coated aluminium', '714 watts per litre on the hot fill, second highest in this comparison'], // PONTOS POSITIVOS
                'contras' => ['£180.00 is three times the median price on this page', 'Bullets say H42 x W38 x D20cm, the specification table says 21.5D x 20W x 45H', 'Sold under a second ASIN at £179.99 with the same 4,325 ratings', 'Ten Auto-iQ programmes, of which four are cold drinks'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Morphy Richards Compact Soup Maker 1L, 900W, LED Countdown',              // NOME (ENCURTADO)
                'price' => '£44.00',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 8588,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/711DgSh4zkL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Morphy Richards compact 1 litre soup maker in black and stainless steel', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07CH612JQ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The right soup maker for one or two people, and at 900 watts across a single litre it has the highest heating density here: smooth soup in under 19 minutes.', // TEXTO CURTO (CARD)
                'body' => "Nearly everything in this category is built around a 1.6 litre jug, which is too much soup for a household of one or two and means reheating on day three. This compact soup maker holds a litre, and 8,588 ratings say the smaller size is the right call for a lot of people. It is the second deepest sample on the page.

The interesting number is the one nobody advertises as a ratio. Nine hundred watts across one litre is 900 watts per litre, the highest heating density in this comparison and 44% above the 1.6 litre machines, which is why Morphy Richards can quote smooth soup in under 19 minutes and chunky in under 31. Less water to bring to the boil, the same class of element. The specification table is also one of the most complete here, listing dimensions of 21.3 x 15.7 x 22.7cm, a weight of 1.71kg, the voltage and four programmes including smoothie and a separate blend setting.

Two caveats. The listing claims three servings from one litre, which is 333ml a head — more honest than the six-portion claims elsewhere, but still short of the 450ml Hamilton Beach uses for a proper bowl, so read it as two servings and a small third. And the specification table answers no to auto shut-off, one of only two machines here to do so, which matters more on a compact jug that boils dry faster.", // TEXTO SEO LONGO
                'pros' => ['900 watts per litre, the highest heating density in this comparison', 'Smooth soup in under 19 minutes, the fastest quoted time here', '8,588 ratings, the second deepest sample on this page', 'Right capacity for one or two people rather than a 1.6L family jug', 'Full specification table: dimensions, weight, voltage and wattage'], // PONTOS POSITIVOS
                'contras' => ['Specification table answers no to auto shut-off', 'Three servings from one litre is 333ml a bowl', 'Non-stick coated jug rather than bare stainless steel', '4.3 stars is the joint lowest rating here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Morphy Richards Sauté and Soup Maker 1.6L, 4 Settings, Pause Function',   // NOME (ENCURTADO)
                'price' => '£78.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 3885,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61CmFunm-UL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Morphy Richards saute and soup maker with glass lid and LED panel',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00XMK2GD4?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The sauté function is the one feature here that changes how the soup tastes, but the listing cannot decide whether the pot is aluminium or stainless steel.', // TEXTO CURTO (CARD)
                'body' => "Softening onions, garlic and celery in fat before any liquid goes in is where most of the flavour in a soup comes from, and it is the step a heated jug forces you to skip or to do in a separate frying pan. This machine sautés in the jug, then cooks and blends in the same vessel, and it is the only appliance in this comparison that does. At 4.5 stars across 3,885 ratings the reception is among the best here.

There are four settings — smooth, chunky, compote and a blend-pause that lets you check the texture and carry on — plus a glass lid so you can watch it, an LED panel and a detachable cord. Morphy Richards quotes twenty-one minutes for soup, which is at the fast end of the field.

Where it loses ground is the specification. The bullet describes a \"lightweight aluminium pot\" that is non-stick coated; the specification table and the product title both say stainless steel. Those are different metals with different scratch tolerance and different behaviour when you are frying at the bottom of a narrow jug, and on a machine whose whole point is sautéing, that is the one field you needed answered. The dimensions are given as 22.4L x 17W centimetres with no height at all, no wattage is published anywhere, and the listing repeats the unsourced claim that the Serrator blade \"stays sharper 12 time longer than an ordinary blade\" — twelve times, no standard cited, typo included.", // TEXTO SEO LONGO
                'pros' => ['The only machine here that sautés, cooks and blends in one jug', '4.5 stars across 3,885 ratings', 'Blend-pause lets you check texture and continue', 'Twenty-one minutes to soup, among the fastest quoted here', 'Glass lid and detachable power cord'], // PONTOS POSITIVOS
                'contras' => ['Bullet says aluminium pot, title and specification table say stainless steel', 'No wattage published anywhere on the listing', 'Dimensions given as 22.4 x 17cm with no height', 'Unsourced claim that the blade stays sharp 12 times longer'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Tefal Easy Soup and Smoothie Maker 1.2L, 1000W, 5 Programs',              // NOME (ENCURTADO)
                'price' => '£79.84',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 3869,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61+1kpXfSZL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tefal Easy Soup 1.2 litre soup and smoothie maker in white and stainless steel', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00QVKMPVA?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Double insulation and a 40-minute keep warm are genuinely rare here, but £79.84 for 1.2 litres is the second worst price per litre in this comparison.', // TEXTO CURTO (CARD)
                'body' => "Tefal is the only brand in this comparison that treats heat retention as a specification rather than an afterthought. The Easy Soup has a double-insulated body and a keep warm function that holds serving temperature for a stated forty minutes — a number, not an adjective, which puts it ahead of the several machines here that list keep warm as a feature and say nothing about how long it lasts. There are 3,869 ratings at 4.5 stars, joint second-best average on the page.

The rest is competent and honest. Five hot and cold programmes covering smooth soup, chunky soup, compote and smoothie; four stainless steel blades set into the lid rather than the base, which makes the jug easier to clean out; a full dimension set of 23.4 x 22.4 x 39.6cm; and 1000 watts across 1.2 litres, or 833 watts per litre, the second highest heating density here. Tefal also quotes four servings from that 1.2 litres, which is 300ml a bowl — the most restrained portion claim of any brand in this comparison bar Hamilton Beach.

The problem is arithmetic of a different kind. At £79.84 for 1.2 litres you are paying £66.53 per litre of capacity, against £22.63 for the Daewoo. Unless the insulation and the forty-minute hold matter to you specifically, two machines above it do the same job for less than half. The colour field also reads \"White & Stianless Steel\", which is a small thing but sits on a listing at nearly eighty pounds.", // TEXTO SEO LONGO
                'pros' => ['Keep warm quoted as a specific 40 minutes, not just listed as a feature', 'Double-insulated body, the only one here that specifies insulation', '833 watts per litre, second highest heating density in this comparison', 'Four servings from 1.2 litres is 300ml, an honest portion claim', '3,869 ratings at 4.5 stars'], // PONTOS POSITIVOS
                'contras' => ['£66.53 per litre of capacity, nearly three times the Daewoo', '1.2 litres is small for the price band it sits in', 'Blades mounted in the lid limit how full you can load the jug', 'Colour field on the listing is misspelled'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Hamilton Beach 3-in-1 Soup Maker 1.6L, Auto-Stir and Overspill Sensor',   // NOME (ENCURTADO)
                'price' => '£59.98',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 555,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61YGCVfxvqL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Hamilton Beach 3-in-1 soup maker with angled digital display',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D62WS6X6?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing of ten that publishes millilitres per portion — 450ml for four, 250ml for six — which is the number the rest of this category refuses to print.', // TEXTO CURTO (CARD)
                'body' => "This machine is on the list because of one sentence in its second bullet: 4 to 6 servings per jug, \"450ml for 4 portions, 250ml for 6 portions\". Nine other manufacturers sell you a portion count and leave you to guess what a portion is. Hamilton Beach shows the working, and in doing so hands you the yardstick that measures everybody else — including the Morphy Richards Classic at number one, whose six-person claim turns out to be 267ml a bowl.

The appliance itself is a solid mid-price 1.6 litre unit: stainless steel jug, auto-stir, an overspill sensor, a one-touch angled digital display that you can actually read from standing height, and soup in thirty minutes or less. The dimensions are published in full at 20 x 20 x 29.2cm and 2.3kg, and at 20cm square it has the smallest footprint of any 1.6 litre machine here.

Two things keep it at seven. There are only 555 ratings, the second thinnest sample on this page, so the 4.4 average is less settled than the figures above it. No wattage appears anywhere in the listing, which means you cannot calculate the watts per litre that separates a nineteen-minute machine from a thirty-one-minute one — and thirty minutes or less is the slowest quoted time here. The listing is also hand-wash only, and the same product appears under a second ASIN with the identical 555 ratings.", // TEXTO SEO LONGO
                'pros' => ['The only listing here that publishes millilitres per portion', 'Smallest footprint of any 1.6 litre machine here at 20 x 20cm', 'Auto-stir plus a genuine overspill sensor', 'Angled digital display readable from standing height', 'Full dimensions and weight published'], // PONTOS POSITIVOS
                'contras' => ['555 ratings, the second thinnest sample on this page', 'No wattage published, so heating density cannot be checked', 'Thirty minutes or less is the slowest quoted cooking time here', 'Hand wash only, and sold under a second ASIN with the same review pool'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Morphy Richards Soup Maker 1.6L Dual Programme, Serrator Blade',          // NOME (ENCURTADO)
                'price' => '£57.25',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 2309,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71wOH2Ux3uL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Morphy Richards 1.6 litre dual programme soup maker in brushed steel', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07D1CG3LZ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Notable mainly for contradicting its own brand: this is 1.6L sold as four people, while the Morphy Richards at number one calls the same 1.6L six people.', // TEXTO CURTO (CARD)
                'body' => "Put this listing next to the Morphy Richards Classic at number one and you have the clearest evidence in this comparison that portion claims are written by marketing rather than measured. Both machines hold 1.6 litres. The Classic says up to six people. This one says serve up to 4 people. Same brand, same year, same capacity, and a 50% difference in what the company considers a bowl of soup — 267ml against 400ml. The 400ml figure is the credible one; it matches a tin.

As a machine it sits between the two Morphy Richards models above it. Smooth soup in twenty-one minutes and chunky in twenty-eight, a keep warm function, an LED countdown, an easy clean cycle, a brushed stainless steel body, a detachable cord and an add-to function for dropping in ingredients partway through. At £57.25 with 2,309 ratings at 4.4 stars, it is fairly priced for what it is.

The listing quality is the reason it is not higher. No wattage is published, so there is no way to work out the heating density. One bullet refers to \"the 16L Soup maker\", a missing decimal point that would make this a bath rather than an appliance. And it repeats the Serrator blade claim word for word from the sauté model — sharper for twelve times longer than a standard blade, no standard named, same typo. When three fields on one page are wrong, the field you actually needed is the one you should assume is wrong too.", // TEXTO SEO LONGO
                'pros' => ['States 4 people from 1.6 litres, the most realistic portion claim from this brand', 'Smooth soup in 21 minutes, chunky in 28', 'Keep warm, easy clean cycle and an add-to function', 'Brushed stainless steel body with detachable cord', '2,309 ratings at 4.4 stars'], // PONTOS POSITIVOS
                'contras' => ['Directly contradicts the same brand at number one on what 1.6L feeds', 'No wattage published anywhere', 'One bullet calls it a 16L soup maker', 'Repeats the unsourced 12-times-sharper blade claim'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Tower Soup and Smoothie Maker T12031, 1.6L, 1000W, Stainless Steel',      // NOME (ENCURTADO)
                'price' => '£39.95',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 1389,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51b9wqPmQaL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tower T12031 stainless steel soup and smoothie maker',               // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B077QG7L67?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Cheap, well warrantied and 1000W across 1.6L — but the published external dimensions describe a box smaller than the jug it is supposed to contain.', // TEXTO CURTO (CARD)
                'body' => "The hardware here is fine and the price is good. A 1.6 litre stainless steel jug, stainless blades, 1000 watts, the same 625 watts per litre as machines costing twenty pounds more, 1,389 ratings at 4.3 stars, and a three-year guarantee subject to registration. At £39.95 it is the second cheapest soup maker in this comparison.

Then you read the specification table. Tower gives the product dimensions as 25.4 x 5.08 x 6.86cm. Multiply those out and the entire external volume of the appliance is 885 cubic centimetres — 0.885 of a litre, barely half of the 1.6 litres the jug is meant to hold internally. It is not a rounding error or a packed-flat measurement either: 5.08cm is exactly two inches and 6.86cm is exactly 2.7 inches, so the field was converted from somewhere rather than measured.

Crucially, the same three numbers appear on Tower's 1L T12056, a different appliance with a different capacity. One dimension field, copy-pasted across two products, neither of which it fits. That leaves a buyer with no way to know whether this machine clears a wall cabinet, which for a jug appliance around 30 to 40cm tall is the thing you most need to check. Everything else about the listing is unremarkable, including the standard six-portion claim from 1.6 litres — 267ml a bowl — and an auto shut-off field answered no.", // TEXTO SEO LONGO
                'pros' => ['£39.95, the second cheapest machine in this comparison', '1000W across 1.6 litres, 625 watts per litre', 'Three-year guarantee with registration, the longest offered here', 'Stainless steel jug and blade', '1,389 ratings at 4.3 stars'], // PONTOS POSITIVOS
                'contras' => ['Published dimensions total 885cm3, half the volume of the jug inside', 'Identical dimensions published for Tower 1L model, so neither can be right', 'Auto shut-off answered no in the specification table', 'Six-portion claim from 1.6 litres is 267ml a bowl'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Tefal PerfectMix Cook Soup Maker and Blender, 1.75L Glass Jug, 1400W',    // NOME (ENCURTADO)
                'price' => '£107.10',                                                               // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 477,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61Ovx6KFGOL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tefal PerfectMix Cook soup maker and blender with glass jug',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BQ3Z16HM?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The largest jug and the most powerful motor here, but £107.10 buys the thinnest review sample on the page and the lowest rating of any machine over £100.', // TEXTO CURTO (CARD)
                'body' => "On paper this outguns everything else in the comparison. A 1.75 litre heatproof glass jug is the largest capacity here, 1400 watts is the strongest motor, and there is a steamer basket for fish and vegetables that turns it into a third appliance. Tefal claims the Powelix blades deliver results up to 30 percent faster, and there are ten automatic programmes — four cold, six hot.

The trouble is what you are buying that with. At £107.10 it is the second most expensive machine here, and it carries 477 ratings, the thinnest sample on the page, at 4.3 stars — the joint lowest average in the comparison. Every machine above it either has a deeper sample, a better rating, or costs substantially less. Meanwhile 1400 watts across 1.75 litres is 800 watts per litre, which is high but below the 900 of the £44 Morphy Richards compact, so the extra power is buying capacity rather than speed.

The listing also does the two things this category does constantly. It quotes no portion figure at all, so the largest jug here is the one you can least easily translate into bowls. And it advertises a cleaning programme that \"kills 99.99 percent of bacteria\", a laundry-detergent number attached to an appliance that boils its contents for twenty minutes as a matter of routine.", // TEXTO SEO LONGO
                'pros' => ['1.75 litres, the largest capacity in this comparison', '1400W is the most powerful motor here', 'Heatproof glass jug rather than metal or coated aluminium', 'Steamer basket accessory for fish, vegetables and baby food', 'Ten automatic programmes including six hot'], // PONTOS POSITIVOS
                'contras' => ['477 ratings, the thinnest sample on this page, at £107.10', '4.3 stars is the joint lowest rating in this comparison', '800 watts per litre, below the £44 compact machine at number four', 'No portion figure published for the largest jug here'], // PONTOS NEGATIVOS
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
        $this->command?->info("SoupMakersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
