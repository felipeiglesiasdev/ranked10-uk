<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class BreadMakersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE BREAD MAKERS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA FILTRADA: /s?k=bread+maker&rh=p_36%3A6000-  (19 ASINS UNICOS EM 22 CARDS)
        // CATEGORIA KITCHEN: 5% DE COMISSAO. TICKET ALTO: MEDIANA DE £93.
        //
        // ─── ACHADOS ───
        // 1. O TAMANHO DO PAO E A UNICA ESPECIFICACAO QUE IMPORTA NUMA MAQUINA DE PAO —
        //    E QUATRO DAS DEZ NAO PUBLICAM ESSE NUMERO EM LUGAR NENHUM DA FICHA. AS TRES
        //    PANASONIC (£119, £159 E £199) E A SAGE DE £249 NAO DIZEM QUANTOS GRAMAS SAI
        //    DO CESTO. SAO AS QUATRO MAIS CARAS DA LISTA.
        // 2. QUEM PUBLICA, PUBLICA EM UNIDADES INCOMPATIVEIS. A TABELA COLETADA:
        //      LAKELAND COMPACT ..... "1lb" NO TITULO, "Capacity: 454 g" NA TABELA
        //      KITCHENARM ........... 500 / 700 / 900 g
        //      TEFAL ................ 500 / 750 / 1000 g (SO NO RODAPE DE UM BULLET)
        //      RUSSELL HOBBS ........ "750g/1kg" NO BULLET, "Capacity: 0.9 Kilograms"
        //      TOWER ................ "2lb" SO NO TITULO, NENHUM GRAMA
        //      MORPHY RICHARDS ...... "3 loaf sizes", SEM UNIDADE NENHUMA
        //    A LAKELAND E A UNICA DAS DEZ QUE FAZ A CONVERSAO NA PROPRIA FICHA. E 454 g
        //    E 1lb EXATO — ELA ACERTOU.
        // 3. "2lb" NAO E "1kg". SAO 907 g. AS DUAS ETIQUETAS SAO VENDIDAS COMO A MESMA
        //    FAIXA E ESTAO 10% APARTADAS, E A KITCHENARM CHAMA 900 g DE TAMANHO GRANDE
        //    ENQUANTO A RUSSELL HOBBS CHAMA 900 g DE CAPACIDADE TOTAL DA MAQUINA E 1 kg
        //    DE TAMANHO GRANDE. TRES NUMEROS QUASE IGUAIS, TRES SIGNIFICADOS.
        // 4. A RUSSELL HOBBS SE CONTRADIZ NA MESMA PAGINA: O BULLET DIZ "Two Bread Sizes
        //    (750g/1kg)" E A TABELA DE ESPECIFICACAO DIZ "Capacity: 0.9 Kilograms". OU A
        //    MAQUINA FAZ UM PAO DE 1 kg OU NAO FAZ.
        // 5. A PANASONIC DETALHA O QUE HA DENTRO DA CONTAGEM DE PROGRAMAS, E E A UNICA
        //    QUE FAZ ISSO — MAS UMA DAS DUAS CONTAS NAO FECHA:
        //      SD-YR2550: "31 Programmes - 13 Bread, 4 Gluten Free, 7 Dough, 4 Sweet,
        //                  3 Manual"  →  13+4+7+4+3 = 31 ✓
        //      SD-B2510:  "21 Programmes - 9 Bread, 4 Gluten Free, 3 Dough, 4 Sweet"
        //                  →  9+4+3+4 = 20 ✗
        //    FALTA UM PROGRAMA NA PROPRIA DECOMPOSICAO DA PANASONIC. E, MESMO ONDE FECHA,
        //    SO 13 DOS 31 PROGRAMAS ASSAM UM PAO — O RESTO E MASSA, DOCE E GEELIA.
        // 6. A PANASONIC PUBLICA TRES CONJUNTOS DE DIMENSOES DIFERENTES PARA O QUE E
        //    VISIVELMENTE O MESMO CHASSI:
        //      SD-YR2550 ... 25,2 D x 40,8 W x 36,2 H
        //      SD-R2530 .... 25,2 D x 39,5 W x 36,2 H
        //      SD-B2510 .... 25,2 D x 36,2 W x 40,8 H  ← LARGURA E ALTURA TROCADAS
        //    OS TRES ANUNCIOS VENDEM "flush lid reducing the overall height". A B2510
        //    ENTAO DECLARA 40,8 cm DE ALTURA NUM APARELHO ANUNCIADO COMO BAIXO — E 40,8
        //    NAO PASSA NO VAO PADRAO ENTRE BANCADA E ARMARIO DE MUITAS COZINHAS.
        // 7. SO DUAS DAS DEZ PUBLICAM A POTENCIA: RUSSELL HOBBS 450 W E TOWER 550 W. O
        //    WATT DA RESISTENCIA E O QUE DECIDE A CROSTA, E OITO FABRICANTES OMITEM.
        // 8. O PESO E A ESPECIFICACAO SILENCIOSA DESTA CATEGORIA E VARIA 2x: DE 4,0 kg
        //    (RUSSELL HOBBS) A 7,99 kg (PANASONIC SD-R2530). MAQUINA DE PAO SOVA MASSA
        //    DENSA POR 20 A 30 MINUTOS; A MASSA DO PROPRIO APARELHO E O QUE IMPEDE ELE DE
        //    ANDAR PELA BANCADA. NENHUM ANUNCIO USA O PESO COMO ARGUMENTO — ELE APARECE
        //    SO NA LINHA DE FRETE.
        // 9. A MORPHY RICHARDS DECLARA "Material: Cool Touch". COOL TOUCH NAO E MATERIAL,
        //    E UM ACABAMENTO. E O CAMPO ONDE O COMPRADOR IRIA VER SE O CORPO E INOX OU
        //    PLASTICO. A TOWER, PARA CREDITO DELA, ESCREVE "Plastic" SEM RODEIO.
        // 10. A RUSSELL HOBBS LISTA OS DOZE PROGRAMAS DUAS VEZES NA MESMA PAGINA E AS
        //    DUAS LISTAS NAO BATEM: O BULLET TRAZ "Fastbake I" E "Fastbake II", O CAMPO
        //    DE SPECIAL FEATURES TROCA OS DOIS POR "Quick" E "Bake".
        // 11. A KITCHENARM ESCREVE "2-YEAR Product VVarranty" — W DIGITADO COMO DOIS V,
        //    PADRAO DE TEXTO COLADO PARA CONTORNAR FILTRO. TAMBEM NOMEIA "Teflon Coated
        //    Non-Stick Bread Pan", QUE E MARCA REGISTRADA E QUASE NINGUEM CITA.
        // 12. ASIN DUPLICADO: A PANASONIC SD-YR2540 (B094PHJDLH, £199.99, 817 AVALIACOES)
        //    E PRATICAMENTE A MESMA MAQUINA QUE A SD-YR2550 (£199.00, 1.009 AVALIACOES),
        //    COM 32 PROGRAMAS CONTRA 31 E UM PENNY DE DIFERENCA.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: A PANASONIC SD-YR2540, MANTIDA A SD-YR2550 QUE E MAIS BARATA E TEM MAIS
        // AVALIACOES; A AUCMA (BATEDEIRA, NAO MAQUINA DE PAO, POLUINDO A BUSCA); LAKELAND
        // BREAD MAKER PLUS (80 AVALIACOES), ANDREW JAMES (27), TRIUMPHKEY (32) E OS
        // ANUNCIOS SEM MARCA COM MENOS DE 250 AVALIACOES.
        // PANASONIC APARECE TRES VEZES PORQUE OCUPA A FAIXA DE £119 A £199 SOZINHA E
        // PORQUE AS TRES FICHAS SE CONTRADIZEM ENTRE SI, QUE E METADE DA MATERIA.
        // DENTRO: NOTA DE 4.2 A 4.6, PRECO DE £69.69 A £249.00, OITO MARCAS.
        //
        // FOCUS KEYWORD: best bread maker
        // VARIACOES TRABALHADAS: bread maker uk / breadmaker / bread machine /
        // 2lb bread maker / 1kg bread maker / gluten free bread maker /
        // panasonic bread maker / compact bread maker / bread maker with nut dispenser /
        // best bread maker for sourdough / small bread maker for one person
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "kitchen", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-bread-maker',                                          // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Bread Maker 2026: 10 Ranked on the Loaf Size They Hide', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Bread Maker 2026: Top 10 Ranked and Compared',    // TITLE DA ABA/GOOGLE (49 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best bread maker options on Amazon by loaf size, weight and published wattage, comparing 1lb to 1kg machines from £69.69 to £249.00.', // META DESCRIPTION (149 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best bread maker',                                 // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "A bread machine has one specification that decides whether you bought the right one: how big a loaf it makes. Four of the ten machines in this comparison do not publish that number anywhere on their listing — and they are the four most expensive, the three Panasonics and the £249 Sage. Of the six that do, no two use the same unit. Tower puts 2lb in the title and no grams anywhere; Morphy Richards offers three loaf sizes and never says what any of them weigh; Russell Hobbs claims 750g and 1kg in a bullet while its own specification table says the capacity is 0.9 kilograms. Only Lakeland does the conversion for you, listing 1lb in the title and 454g in the capacity field, which is exactly right. Meanwhile 2lb is 907 grams, not a kilo, so two machines sold as the same tier are 10% apart. Below we rank the best bread maker options on Amazon in August 2026 on loaf size, machine weight and published wattage — the three numbers this category treats as optional.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Picking the best bread maker is easier once you stop reading the programme count. Start with the loaf: 454g feeds one or two people for a day and goes stale before it is finished by anyone else, 750g is the standard household loaf, and 1kg is a batch you slice and freeze. If the listing will not tell you which of those you are buying, that is information in itself — and it is the premium end of this category that stays quietest, with three Panasonics and a Sage between them publishing not a single gram. Then weigh the machine. A breadmaker kneads stiff dough for twenty to thirty minutes and its own mass is the only thing stopping it travelling across the worktop; the range here runs from 4.0kg to 7.99kg, a two-fold spread that no manufacturer mentions because it appears only in the shipping field. By contrast, programmes are the number you can safely ignore. Panasonic is the only brand that itemises what its count contains, and its own breakdown shows just 13 of 31 programmes actually bake a loaf — the rest are dough, jam and cake. Crucially, one of those two breakdowns does not even add up: the 21 programmes on the SD-B2510 are listed as 9 bread, 4 gluten free, 3 dough and 4 sweet, which is 20.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                         // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 03:45:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Morphy Richards Fastbake Breadmaker, 12 Programmes, 3 Loaf Sizes',        // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£79.00',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 8144,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61oR+s6vrCL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best bread maker',                                                   // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00275FV5K?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best bread maker here on weight of evidence: 8,144 ratings, six times the next deepest sample, and 7.4kg of machine holding the dough still while it kneads.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Eight thousand one hundred and forty-four ratings at 4.4 stars is not a close call — it is six times the sample behind the Panasonic at number two and more than every other machine in this comparison combined. When a bread machine survives that many British kitchens at that average, the basic engineering is sound, and this one has been on sale long enough for the failures to have shown up.

The number that matters and nobody advertises is 7.4 kilograms. Kneading bread dough is the heaviest mechanical job any countertop appliance does, twenty to thirty minutes of a motor dragging a paddle through something with the consistency of putty, and the machine either has the mass to sit still or it walks. At 7.4kg this is the fourth heaviest here and only 100 grams lighter than the £199 Panasonic. The Fastbake programme turns out a loaf in fifty minutes, the quickest in this comparison, and there is a 13-hour delay timer, three crust settings and a keep warm.

Two things stop it being a clean win. It offers three loaf sizes and never states what any of them weigh — not in pounds, not in grams, not in the title, bullets or specification table. And the material field reads \"Cool Touch\", which is a surface treatment, not a material; it is the one field where you would find out whether the body is steel or plastic, and it has been used for something else.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['8,144 ratings at 4.4, six times the next deepest sample here', '7.4kg of mass keeps it still through the kneading cycle', 'Fastbake produces a loaf in 50 minutes, the quickest quoted here', '12 programmes including sourdough, gluten free, pizza dough and jam', '13-hour delay timer with keep warm, at £79.00'], // PONTOS POSITIVOS
                'contras' => ['Three loaf sizes advertised and not one of them given a weight', 'Material field reads Cool Touch, which is a finish rather than a material', 'No wattage published anywhere on the listing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Panasonic SD-YR2550 Bread Maker, Yeast and Nut Dispenser, 31 Programmes', // NOME (ENCURTADO)
                'price' => '£199.00',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 1009,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71ii3WZjzmL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Panasonic SD-YR2550 bread maker in silver with yeast dispenser',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B093T7F1YP?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only brand here that itemises what its programme count contains — and its own breakdown shows just 13 of the 31 programmes actually bake a loaf.', // TEXTO CURTO (CARD)
                'body' => "Every manufacturer in this category sells a programme count and leaves you to imagine what is inside it. Panasonic is the only one that opens the box: 31 programmes, being 13 bread, 4 gluten free, 7 dough, 4 sweet and 3 manual. Those figures add to 31, which is more than can be said for the same brand at number five. It also means fewer than half the programmes bake bread, and knowing that is worth more than the headline number.

The hardware is the reason this is the machine to buy if the budget stretches. The automatic yeast dispenser drops the yeast into the pan at the right moment in the mixing cycle so it never sits in the water, which is the single most common reason a home loaf fails to rise; there is a separate raisin and nut dispenser; and dual temperature sensors read both the room and the interior so the fermentation time adjusts to a cold January kitchen rather than assuming one temperature all year. At 7.5kg it is heavy enough to sit still, and the flush-lid horizontal design keeps the height to 36.2cm.

Against it: £199.00 is the second highest price here for a machine with 1,009 ratings, and Panasonic does not publish a loaf size anywhere — not in grams, not in pounds. It is also worth knowing that the nearly identical SD-YR2540 sells for £199.99 with 32 programmes and 817 ratings, and that Panasonic gives three different dimension sets across its three models on this page, one of which has the width and height transposed.", // TEXTO SEO LONGO
                'pros' => ['The only listing here that itemises its programme count, and it adds up', 'Automatic yeast dispenser keeps yeast out of the water until mixing', 'Dual temperature sensors adjust fermentation to room temperature', '7.5kg, second heaviest here, with a 36.2cm flush-lid height', 'Separate raisin and nut dispenser and a sourdough cup included'], // PONTOS POSITIVOS
                'contras' => ['No loaf size published in grams or pounds anywhere on the listing', '£199.00 for 1,009 ratings, against £79.00 for 8,144 at number one', 'Only 13 of the 31 programmes actually bake a loaf', 'Near-identical SD-YR2540 sells alongside it at £199.99'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Tower T11003 2lb Digital Bread Maker, 12 Programs, 550W',                 // NOME (ENCURTADO)
                'price' => '£69.69',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 1350,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51mP-NFFbrL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tower T11003 2lb digital bread maker in black',                      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07YL823KG?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest machine here and one of only two that publishes its wattage — 550W, the highest figure anyone in this comparison is willing to print.', // TEXTO CURTO (CARD)
                'body' => "At £69.69 this is the least expensive bread maker in the comparison, and it is also one of only two out of ten that tells you how much power the element draws. Five hundred and fifty watts is the highest published figure here, a hundred more than the Russell Hobbs, and wattage is what browns a crust — a machine that cannot get the outside of the loaf hot enough produces pale bread whatever the crust setting says. That Tower prints the number at all puts it ahead of eight rivals including every Panasonic.

It is a straightforward 2lb machine with 12 programmes, three crust settings, a 13-hour delay timer, a 60-minute fast bake and a 60-minute keep warm, backed by 1,350 ratings at 4.3 stars and a three-year guarantee with registration. The specification table is complete: 24.9 x 36.2 x 29.4cm, 4.1kg, 240 volts.

The 4.1kg is the catch, and it is the second lightest machine on this page. A bread maker doing a wholemeal knead is fighting a stiff dough, and four kilos is not much to anchor it — expect it to shuffle on a smooth worktop and give it room from the edge. Tower is also honest enough to record the material as Plastic, which no other brand here admits to, and while that is to its credit it does tell you what the body is. The 2lb in the title is never converted, so for the record that is 907 grams, not a kilogram.", // TEXTO SEO LONGO
                'pros' => ['550W published, the highest wattage figure anyone here prints', 'Cheapest machine in this comparison at £69.69', 'Complete specification table: dimensions, weight, voltage and power', '1,350 ratings at 4.3 with a three-year guarantee on registration', 'Honest enough to record the body material as plastic'], // PONTOS POSITIVOS
                'contras' => ['4.1kg is the second lightest here and will move during a stiff knead', 'Plastic body at a time when rivals at the same price use steel', '2lb in the title is never converted, and 2lb is 907g rather than 1kg', '60-minute fast bake is slower than the 50 minutes at number one'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'KitchenArm 29-in-1 Smart Bread Maker, 500g 700g 900g, Stainless Steel',   // NOME (ENCURTADO)
                'price' => '£97.34',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 238,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51cJkfzMqLL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'KitchenArm 29-in-1 stainless steel bread maker with LCD display',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F47BK133?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest rated machine here at 4.6, and the only one that puts all three loaf sizes in grams in the title where you cannot miss them.', // TEXTO CURTO (CARD)
                'body' => "Four point six stars is the best average in this comparison, and the listing behind it does something no premium brand here manages: it states the loaf sizes in grams, in the title, in the bullets, and in the same unit throughout — 500g, 700g and 900g. It also itemises the programme count the way Panasonic does, as 21 bread menus, 7 non-bread menus and one fully programmable cycle, which adds up correctly to 29.

The programmable menu is the genuine feature. Menu 29 lets you set the duration of each individual stage — knead, rest, rise, bake — rather than picking a preset, which is the difference between a machine that makes the bread it was designed for and one that makes the bread in your recipe book. For sourdough in particular, where the rise depends on your starter rather than a factory assumption, that control is the whole game. There are 77 recipes included and a UK 230V build with a three-pin plug.

Two reservations, and one of them is about the listing rather than the machine. At 238 ratings this is the second thinnest sample here, so 4.6 stars is encouraging rather than settled. And at 4.35kg it is the third lightest machine on the page, which for something advertising a 900g loaf is not much ballast. The copy also contains \"2-YEAR Product VVarranty\", with the W typed as two Vs — a small thing, but the kind of substitution that usually means text was pasted to get past a filter, and it sits alongside a direct naming of Teflon as the pan coating that most brands are careful to describe generically.", // TEXTO SEO LONGO
                'pros' => ['4.6 stars, the highest rating in this comparison', 'All three loaf sizes published in grams: 500g, 700g and 900g', 'Programme count itemised and correct: 21 bread, 7 non-bread, 1 custom', 'Menu 29 lets you set knead, rest, rise and bake times individually', '77 recipes included and a proper UK 230V three-pin build'], // PONTOS POSITIVOS
                'contras' => ['238 ratings, the second thinnest sample on this page', '4.35kg is light for a machine making a 900g loaf', 'Bullet text contains VVarranty with the W typed as two Vs', 'Pan coating named as Teflon rather than described generically'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Panasonic SD-B2510 Bread Maker, 21 Programmes, Dual Temperature Sensors', // NOME (ENCURTADO)
                'price' => '£119.00',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 900,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51Gsbhf8CHL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Panasonic SD-B2510 automatic bread maker in white',                  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08YNTMC49?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest way into Panasonic dual temperature sensors, but its own programme breakdown adds up to 20 and the box says 21.', // TEXTO CURTO (CARD)
                'body' => "This is the entry point to the Panasonic range and it keeps the feature that actually separates the brand: two temperature sensors, one reading the room and one reading the interior, so the machine lengthens the rise on a cold morning and shortens it on a warm one. Bread dough is far more sensitive to ambient temperature than most people expect, and a fixed-timing machine is guessing. At £119.00 with 900 ratings at 4.5 stars it undercuts the SD-YR2550 by eighty pounds.

What you give up is the yeast dispenser, the sourdough programmes and ten of the presets, and what you gain is the same 4 gluten-free modes and the same flush-lid design. At 6.5kg it is the lightest of the three Panasonics but still comfortably heavier than everything below it here except the Tefal.

Now the arithmetic. The bullet reads \"21 Automatic Programmes- 9 Bread, 4 Gluten Free, 3 Dough, 4 Sweet\". Nine plus four plus three plus four is twenty. The same brand gets the sum right on the SD-YR2550 further up this page, so this is a missing line rather than a system, but it is the second time in one comparison that Panasonic has published a number nobody checked. The dimensions are the third: this listing gives 25.2D x 36.2W x 40.8H, while the SD-YR2550 gives 25.2D x 40.8W x 36.2H — the same three figures with width and height swapped, on two machines whose selling point is a flush lid that reduces the overall height. Forty point eight centimetres tall would not clear the gap under many British wall cabinets, so it matters which way round it is.", // TEXTO SEO LONGO
                'pros' => ['Dual temperature sensors adjust the rise to your kitchen, not a fixed timing', 'Eighty pounds cheaper than the SD-YR2550 with the same sensor system', '6.5kg, heavier than six of the ten machines here', '4 dedicated gluten-free modes', '900 ratings at 4.5 stars'], // PONTOS POSITIVOS
                'contras' => ['Programme breakdown given as 9+4+3+4, which is 20 and not the 21 claimed', 'Dimensions appear to have width and height transposed against the sister model', 'No loaf size published in grams or pounds', 'No yeast dispenser and no sourdough programme at this price'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Russell Hobbs Electric Bread Maker 27260, 12 Programs, 450W',             // NOME (ENCURTADO)
                'price' => '£69.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 728,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51fmtI+iJ2L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Russell Hobbs electric bread maker in white with digital display',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C66HFLGT?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most complete specification table in this comparison, which is exactly why you can catch it contradicting itself: 1kg in the bullets, 0.9kg in the table.', // TEXTO CURTO (CARD)
                'body' => "Russell Hobbs publishes more of its own numbers than anyone else on this page — model number, dimensions, weight, capacity, wattage, voltage, material and a full programme list are all there in the specification table, at a time when three Panasonics and a Sage between them manage none of it. That transparency is genuinely worth something, and it is also what makes the error visible. The bullets advertise \"Two Bread Sizes (750g/1kg)\". The capacity field says 0.9 kilograms. Those cannot both be true, and the difference between a 900g and a 1kg loaf is a slice and a half.

There is a second, smaller version of the same problem. The twelve programmes are listed twice on the page and the two lists do not match: the bullet gives Fastbake I and Fastbake II, while the special features field replaces them with Quick and Bake. Same count, different contents.

As a machine at £69.99 it is a sensible buy. Four hundred and fifty watts is published, which only one other brand here does, and a 10-minute power cut-off memory means a brief outage does not ruin the loaf. There is a 13-hour delay timer, three crust settings, an hour of keep warm, and a two-year guarantee extended to three on registration. The reservation is physical: at 4.0kg this is the lightest machine in the comparison, lighter even than the plastic-bodied Tower, and a wholemeal knead will move it.", // TEXTO SEO LONGO
                'pros' => ['The most complete specification table of the ten, including wattage', '450W published, one of only two brands here to state power draw', '10-minute power cut-off memory protects the loaf through a brief outage', 'Two-year guarantee extended to three on registration, at £69.99', 'Programme list published in full rather than as a headline count'], // PONTOS POSITIVOS
                'contras' => ['Bullets claim a 1kg loaf, the capacity field says 0.9kg', '4.0kg is the lightest machine in this comparison', 'Two different lists of the same twelve programmes on one page', '450W is the lowest published wattage here, which limits crust browning'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Tefal Pain and Delices Bread Maker, 20 Programs, 15-Hour Delay',          // NOME (ENCURTADO)
                'price' => '£89.00',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 863,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71nxu9x3syL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tefal Pain and Delices bread maker in black and stainless steel',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B098B5N9S1?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing here that quotes a baking time for each loaf size separately — 1hr 27 for 500g, 1hr 38 for 1000g — though it buries it in a footnote.', // TEXTO CURTO (CARD)
                'body' => "Read the fifth bullet to the end and Tefal does something no rival manages: it gives a rapid bake time per loaf size. Five hundred grams in one hour twenty-seven, 750g in one hour thirty-two, 1000g in one hour thirty-eight. That is the only place in the whole comparison where a manufacturer connects the size of the loaf to the time it takes, and it is also, incidentally, the only place Tefal states its loaf sizes at all — in an asterisked footnote under a claim about baking a loaf in under 90 minutes.

The rest of the package is unusually broad. Twenty programmes covering bread, pasta and pizza dough, dedicated gluten-free settings, jam, and a dairy function that comes with a 1L pot and a cottage cheese filter, which is an odd inclusion but a real one. A 15-hour delay timer is the longest here, there are three loaf sizes and three crust settings, and the body is genuine stainless steel at 5.2kg.

The rating is the problem. Four point two stars across 863 ratings is the joint lowest average in this comparison, shared with the Lakeland and the £249 Sage, and unlike those two it is not explained by an unusual design or a premium price. A machine trying to be a breadmaker, a pasta maker and a cheese press is spreading the engineering thin, and the reviews appear to reflect that. Meanwhile the crucial 90-minute claim in the bullet is contradicted by the footnote directly beneath it, where every one of the three quoted times is over an hour and a half.", // TEXTO SEO LONGO
                'pros' => ['The only listing here that publishes a bake time for each loaf size', '15-hour delay timer, the longest in this comparison', '20 programmes including pasta and pizza dough plus a dairy function', 'Genuine stainless steel body at 5.2kg', 'Includes a 1L dairy pot, cottage cheese filter and recipe book'], // PONTOS POSITIVOS
                'contras' => ['4.2 stars is the joint lowest rating in this comparison', 'Loaf sizes appear only in a footnote, never in the specification table', 'Under 90 minutes is contradicted by its own footnote of 87 to 98 minutes', 'No wattage published'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Panasonic SD-R2530 Bread Maker, Nut Dispenser, 30 Programmes',            // NOME (ENCURTADO)
                'price' => '£159.00',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 585,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71gZ2kHCUSL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Panasonic SD-R2530 automatic bread maker in black with nut dispenser', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B093X1L2PC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'At 7.99kg this is the heaviest and steadiest machine on the page, but £159 buys one fewer programme than the £199 model and one more than the £119 one.', // TEXTO CURTO (CARD)
                'body' => "Seven point nine nine kilograms makes this the heaviest bread maker in the comparison, and for the one job a breadmaker does badly when it is light — kneading a stiff wholemeal or rye dough without travelling — that is the specification to want. It sits on the worktop and stays there. It carries the Panasonic dual temperature sensors, an automatic raisin and nut dispenser, 30 programmes including four gluten-free modes, and a 13-hour timer, with 585 ratings at 4.5 stars.

The difficulty is where it lands in Panasonic's own range. It costs £159.00. The SD-B2510 below it costs £119.00 and has 21 programmes and the same sensors. The SD-YR2550 above it costs £199.00 and adds the yeast dispenser — the feature that genuinely changes how reliably a loaf rises — plus sourdough support and one extra programme. This machine is forty pounds more than the cheap one for nine programmes you may never use, and forty pounds less than the good one for the absence of the dispenser that matters.

It also inherits the family problems. No loaf size is published in any unit. And its dimensions are given as 25.2D x 39.5W x 36.2H, a third distinct set from the same brand on this page, differing from the SD-YR2550 by 1.3cm of width on what appears to be the same chassis. When three listings from one manufacturer give three different widths, the safe assumption is that none of them was measured for this listing.", // TEXTO SEO LONGO
                'pros' => ['7.99kg, the heaviest and steadiest machine in this comparison', 'Panasonic dual temperature sensors adjust the rise to room temperature', 'Automatic raisin and nut dispenser included', '30 programmes with four dedicated gluten-free modes', '4.5 stars across 585 ratings'], // PONTOS POSITIVOS
                'contras' => ['£40 more than the SD-B2510 for programmes rather than capability', '£40 less than the SD-YR2550 but without the yeast dispenser', 'No loaf size published in grams or pounds', 'A third different dimension set from the same brand on this page'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Lakeland Compact 1lb Daily Loaf Bread Maker, 11 Settings',                // NOME (ENCURTADO)
                'price' => '£69.99',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 603,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/31LypAv5WtL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Lakeland compact 1lb daily loaf bread maker in white',               // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B009WNNAPS?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing of ten that converts its own loaf size: 1lb in the title, 454g in the capacity field, which is exactly right. Also the smallest machine here.', // TEXTO CURTO (CARD)
                'body' => "This machine is on the list for one line in its specification table. Capacity: 454 g. One pound is 453.6 grams, so Lakeland has rounded correctly and, alone among ten manufacturers, has told a British buyer what its imperial headline actually means. Tower puts 2lb in a title and stops. Morphy Richards says three sizes and stops. Panasonic and Sage say nothing at all. Lakeland does the conversion, in the field where you would look for it.

The machine it describes is deliberately small: a 1lb daily loaf, eleven pre-installed settings including crusty, gluten free, wholemeal and French, a knead-only function for pizza dough and rolls, and a 25 x 21.5 x 31cm footprint that is the narrowest here by a clear margin. If you are one or two people, a 1lb loaf eaten the day it is baked is the honest use case for a bread machine, and a 1kg machine is a way of making stale bread in bulk. Lakeland also offers a one-year returns window on proof of purchase.

Two things put it at nine rather than higher. Four point two stars across 603 ratings is the joint lowest average in this comparison, and unusually for a compact appliance it weighs 4.75kg, which is respectable, but there is no wattage published and only eleven programmes, the fewest here. It is also £69.99 for a 1lb machine when £69.69 buys a 2lb one from Tower — you are paying a small premium for the smaller loaf, which is the right trade only if you genuinely want it.", // TEXTO SEO LONGO
                'pros' => ['The only listing here that converts its loaf size: 1lb stated as 454g', 'Smallest footprint in this comparison at 25 x 21.5cm', '1lb daily loaf is the right size for one or two people', '4.75kg, heavier than three larger machines on this page', 'One-year returns window from Lakeland on proof of purchase'], // PONTOS POSITIVOS
                'contras' => ['4.2 stars is the joint lowest rating in this comparison', 'Eleven programmes, the fewest of the ten', 'No wattage published', 'Costs the same as 2lb machines despite making half the loaf'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Sage Custom Loaf Bread Maker, Collapsible Blade, Brushed Stainless Steel', // NOME (ENCURTADO)
                'price' => '£249.00',                                                               // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 273,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61qtfqQQsjL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Sage Custom Loaf bread maker in brushed stainless steel',            // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0197TBLC0?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The collapsible kneading blade is the one genuinely new idea in this category, but £249.00 buys the lowest rating and the second thinnest sample here.', // TEXTO CURTO (CARD)
                'body' => "Every bread machine leaves a hole in the bottom of the loaf where the kneading paddle was, and every owner learns to dig it out with a fork. Sage is the only manufacturer here that has engineered a fix: the blade folds flat into the base of the pan when the kneading finishes and before the bake begins, so the dough rises over it and the loaf comes out whole. There are nine custom settings you can name and store, an automatic fruit and nut dispenser, and sixty minutes of backup power that carries the programme through a cut.

At 7.8kg with a brushed stainless steel body it is the second heaviest machine here and easily the best built. If you bake several times a week and the paddle hole genuinely annoys you, this is the machine that solves it.

Everything else argues against it. Two hundred and forty-nine pounds is three and a half times the cheapest machine on this page and £50 more than the Panasonic that has four times the ratings. Those ratings — 273 at 4.2 stars — are the second thinnest sample and the joint lowest average in the comparison, which is an uncomfortable combination at this price. And for £249.00 Sage publishes no loaf size, in any unit, anywhere on the listing: not in the title, not in the bullets, not in the specification table. The most expensive bread maker here will not tell you how much bread it makes.", // TEXTO SEO LONGO
                'pros' => ['Collapsible kneading blade leaves no hole in the bottom of the loaf', '7.8kg brushed stainless steel, the best built machine here', 'Nine custom programmes you can create, name and store', '60 minutes of backup power protects the bake through an outage', 'Automatic fruit and nut dispenser'], // PONTOS POSITIVOS
                'contras' => ['£249.00, three and a half times the cheapest machine in this comparison', 'No loaf size published in any unit anywhere on the listing', '4.2 stars across 273 ratings, the joint lowest average here', 'No wattage published either, at the highest price on the page'], // PONTOS NEGATIVOS
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
        $this->command?->info("BreadMakersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
