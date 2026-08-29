<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class GardenStorageBoxesSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE BAUS DE JARDIM DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=garden+storage+box&rh=p_36%3A4000-  (59 ASINS EM 60 CARDS)
        // CATEGORIA GARDEN. SAZONAL: PICO EM SETEMBRO/OUTUBRO, QUANDO O BRITANICO GUARDA
        // ALMOFADA DE MOVEL DE JARDIM ANTES DO INVERNO. NAO E ITEM DE PRIMAVERA.
        //
        // PROFUNDIDADE DE AVALIACAO CONFERIDA ANTES DE ESCOLHER:
        // 13.299 / 2.492 / 2.046 / 933 / 799 / 749 / 521 / 512 / 482 / 423 / 414 / 407.
        //
        // ─── ACHADO PRINCIPAL: O LITRO DO ROTULO NAO E O LITRO DA CAIXA ───
        // 1. ESTA E UMA CATEGORIA ONDE A CONTA E MULTIPLICACAO SIMPLES: COMPRIMENTO ×
        //    LARGURA × ALTURA INTERNOS, EM cm, DIVIDIDO POR 1000, DA O LITRO REAL. A KETER
        //    E A UNICA MARCA QUE PUBLICA MEDIDA INTERNA EM TODOS OS ANUNCIOS — E POR ISSO
        //    E A UNICA AUDITAVEL. EM TRES DAS QUATRO CAIXAS DELA A AUDITORIA FALHA:
        //      MARVEL+ "270L" .. INTERNO 114,4 × 40 × 51,2 .... = 234,3 L  (−13%)
        //      WESTWOOD "570L" . INTERNO 142,4 × 62,6 × 57,9 .. = 516,1 L  (−9%)
        //      XXL "870L" ...... INTERNO 136,2 × 28,8 × 77,8 .. = 305,2 L  (−65%)
        //      KENTWOOD "190L" . INTERNO 81,6 × 44,6 × 56,6 ... = 206,0 L  (+8%, HONESTA)
        // 2. O CASO DA XXL DE £219 E ERRO DE DIGITACAO, NAO EXAGERO: O BULLET ESCREVE
        //    "inner approximately 136,2 x 28.8 x 77,8 cm" — DUAS VIRGULAS DECIMAIS DE
        //    PADRAO ALEMAO NUM ANUNCIO EM INGLES, E O 28.8 DO MEIO. SE FOSSE 82,8, A CONTA
        //    DARIA 877 L E BATERIA COM O ROTULO. O DIGITO TRANSPOSTO ESTA NO ANUNCIO DA
        //    CAIXA MAIS CARA DA BUSCA.
        // 3. O CONTRASTE QUE FECHA O ARGUMENTO: A CHARLES BENTLEY VENDE UMA CAIXA CHAMADA
        //    "490L" CUJAS MEDIDAS INTERNAS PUBLICADAS (143,3 × 57,9 × 61,3) DAO 508,6 L.
        //    ELA SE SUBESTIMA EM 19 LITROS. A KENTWOOD FAZ O MESMO: 190 NO ROTULO, 206 NA
        //    CONTA. AS DUAS QUE ERRAM PARA MENOS SAO AS DUAS MAIS BARATAS DA LISTA.
        //
        // ─── ACHADO 2: A UNIDADE ERRADA NO CAMPO "STORAGE VOLUME" ───
        // 4. A VONHAUS DECLARA NA FICHA "Storage Volume 3057.45 CUBIC METRES". TRES MIL
        //    METROS CUBICOS SAO O VOLUME DE UM GALPAO — CERCA DE 11.300 DESTAS CAIXAS.
        //    E DA PARA VER DE ONDE VEIO: AS MEDIDAS EXTERNAS DELA, 109 × 51 × 55 cm, DAO
        //    305.745 cm³. ALGUEM DIGITOU 305745 E DESLOCOU A VIRGULA DUAS CASAS. O CAMPO
        //    CERTO SERIA 0,27 m³.
        // 5. A VONHAUS TAMBEM DECLARA "Maximum Weight Recommendation 270 Kilograms" — O
        //    MESMO NUMERO DO LITRO DO NOME. CAPACIDADE E CARGA NAO SAO A MESMA GRANDEZA.
        //
        // ─── ACHADO 3: A MESMA CAIXA COM DUAS ETIQUETAS ───
        // 6. VONHAUS 270L E OLSEN & SMITH 270L PUBLICAM O MESMO EXTERNO EXATO: 109 × 51 ×
        //    55 cm. MESMO MOLDE, £69.99 CONTRA £49.99 — £20 DE DIFERENCA. A OLSEN & SMITH
        //    AINDA PUBLICA O INTERNO (104,7 × 49 × 53,1 = 272,4 L), QUE FECHA COM O ROTULO;
        //    A VONHAUS NAO PUBLICA INTERNO NENHUM.
        // 7. A OLSEN & SMITH APARECE NA BUSCA COM QUATRO ANUNCIOS DE 270L QUASE IDENTICOS
        //    (B09VL2XDND £49.99 / B09VL5W26N £47.99 / B0GN9VC5YG £48.99 / OUTRO), COM POOLS
        //    DE AVALIACAO SEPARADOS. MANTIDO UM SO.
        //
        // ─── ACHADO 4: A CONTRADICAO ENTRE AS DUAS FONTES, NA MESMA PAGINA ───
        // 8. A OLSEN & SMITH ESCREVE NO BULLET "External: 109 x 51 x 55cm | Internal:
        //    104.7 x 49 x 53.1cm | Capacity: 270L" — E A TABELA DE ESPECIFICACAO DA MESMA
        //    PAGINA DIZ "Item Dimensions 43L x 78W x 56H centimetres", QUE DAO 187,8 L.
        //    NENHUM DOS TRES EIXOS BATE COM O BULLET. E O PADRAO DE SEMPRE: TABELA CONTRA
        //    "ABOUT THIS ITEM", NA MESMA FICHA.
        //
        // ─── ACHADO 5: GALAO NUMA LOJA BRITANICA ───
        // 9. A AMAZON BASICS CHAMA A CAIXA DE "375 Litre" NO TITULO E PREENCHE OS DOIS
        //    CAMPOS DE CAPACIDADE DA TABELA COM "99 GALLONS". NAO HA UM LITRO NA FICHA.
        //    A CONVERSAO ESTA CERTA (99 GAL US = 374,7 L), MAS E A MARCA PROPRIA DA AMAZON
        //    PUBLICANDO GALAO AMERICANO PARA O COMPRADOR BRITANICO.
        // 10. A KETER MARVEL+ FAZ METADE DISSO: O BULLET DIZ "71G capacity" (71 GALOES =
        //    268,8 L) NUM ANUNCIO CUJO NOME E "270L". A DURAMAX E A UNICA QUE FAZ CERTO,
        //    PUBLICANDO "416 Litre/ 110 Gallons" — 416 L SAO 109,9 GALOES, CONFERE.
        // 11. A WESTWOOD PUBLICA QUATRO CONJUNTOS DE MEDIDA NUM BULLET SO, INTERNO E
        //    EXTERNO EM POLEGADA E EM cm. OS DOIS INTERNOS BATEM ENTRE SI (516,1 L E
        //    516,7 L) — E NENHUM DOS DOIS BATE COM OS 570 DO NOME.
        // 12. A KETER MARVEL+ DECLARA NA TABELA "Maximum Weight Recommendation 219.99
        //    Kilograms". DUAS CASAS DECIMAIS NUM LIMITE DE CARGA E CONVERSAO AUTOMATICA
        //    (DE 485 lb), NAO MEDICAO. MESMO SINAL DO "1740.46 PSI" DA KARCHER.
        //
        // ─── QUEM NAO PUBLICA MEDIDA INTERNA NENHUMA ───
        // AMAZON BASICS, VONHAUS, URBN GARDEN E DURAMAX — QUATRO DOS DEZ. NESSES O LITRO
        // DO ROTULO E INVERIFICAVEL POR DEFINICAO. A URBN GARDEN E A MAIS APERTADA DAS
        // QUATRO: EXTERNO 118 × 57 × 59 = 396,8 L PARA UM ROTULO DE 350 L, OU 88% DO
        // VOLUME EXTERNO VIRANDO ESPACO UTIL — POSSIVEL SO COM PAREDE MUITO FINA.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: TUDO QUE E GALPAO/SHED E NAO BAU (AOXUN METAL, KETER STORE IT OUT NOVA E
        // PRO, OLSEN & SMITH 775L/880L); OS TRES ASINS EXTRAS DE 270L DA OLSEN & SMITH;
        // ANUNCIOS COM MENOS DE 170 AVALIACOES. DENTRO: 177 A 13.299 AVALIACOES, NOTA DE
        // 4.3 A 4.6, PRECO DE £45.21 A £219.00, OITO MARCAS.
        //
        // FOCUS KEYWORD: best garden storage box
        // VARIACOES TRABALHADAS: outdoor storage box / deck box / plastic garden storage /
        // cushion storage box / garden storage chest / lockable outdoor storage /
        // patio storage box / waterproof garden storage / storage bench
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'garden',                     // SLUG DA CATEGORIA (URL)
            'name' => 'Garden',                     // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best garden tools and outdoor equipment available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-garden-storage-box',                                 // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Garden Storage Box 2026: 10 Ranked, and Why a 270L Box Holds 234 Litres', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Garden Storage Box 2026: Top 10 Ranked',        // TITLE DA ABA/GOOGLE (44 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best garden storage box options on Amazon by multiplying out every internal dimension the sellers publish, from £45.21 to £219.00.', // META DESCRIPTION (146 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best garden storage box',                        // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Keter publishes the internal dimensions of every box it sells, which makes it the only brand in this category you can actually audit — and on three of its four boxes here, the audit fails. The Marvel+ 270L states internal dimensions of 114.4 by 40 by 51.2 centimetres. Multiply those together and divide by a thousand and you get 234 litres, not 270. The Westwood 570L comes to 516. The £219 XXL, advertised at 870 litres, publishes inner dimensions that multiply out to 305, because the middle figure reads 28.8cm where it should almost certainly read 82.8. Meanwhile Charles Bentley sells a chest badged 490L whose own published internal measurements come to 509 litres — it undersells itself by nineteen. We ran that multiplication across ten of the best garden storage box listings on Amazon in August 2026, ranked them on the litres that survive it, and named the four that publish no internal dimension at all.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO ARITMETICO NA ABERTURA
            'conclusion' => "Choosing the best garden storage box comes down to one sum the seller has already given you, if they gave you anything: internal length times width times height in centimetres, divided by a thousand, is the litre figure that matters. Anything else — the number in the product name, the gallons in the specification field, the external footprint — describes the object rather than the space inside it, and on this page the gap between the two ran from a flattering 13% to an outright typing error. Crucially, a brand that publishes internal dimensions is telling you something even when its own arithmetic misses, because it can be checked at all; four of these ten publish nothing you could test. By contrast, the two boxes here that quote a smaller number than their measurements support are also two of the three cheapest, which is not a coincidence so much as a reminder of who feels the need to round upwards. In practice, measure the cushions you actually want to put away, add a third for the awkward shapes, and buy an outdoor storage box whose published internal dimensions clear that figure — then treat the name on the lid as marketing, because that is what it is.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 19:10:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Charles Bentley 490L Plastic Garden Storage Box Chest, Grey',             // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£89.99',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 933,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51DHeVmoqBL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best garden storage box',                                            // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07Z1YPMCW?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only box here that undersells itself: badged 490L, and its own published internal dimensions come to 509 litres. Best price per real litre on the page.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "This is the best garden storage box in the comparison for the simple reason that its numbers are conservative. The listing publishes internal dimensions of 143.3 by 57.9 by 61.3 centimetres. Multiplied out, that is 508.6 litres inside a chest sold as a 490L. Every other box on this page that publishes internal measurements at all either matches its label or falls short of it; this one beats its own claim by nineteen litres. At £89.99 that works out at 17.7 pence per real litre, the lowest figure here and well under half what the Keter XXL asks.

The construction earns the price too. It is polypropylene reinforced with steel rather than plain resin, the lid runs on aluminium sliding lifts instead of a gas strut that will eventually fail, and the moulded handles are on both ends so two people can shift it. External dimensions are 146.4 by 61 by 64.4 centimetres, which is a long, low footprint that sits neatly against a fence rather than dominating a small patio. The padlock hasp is integrated rather than bolted on.

Nine hundred and thirty-three ratings at 4.3 stars is the fourth deepest evidence in this group and comfortably enough to trust. The average is the joint-lowest here, and the usual complaint in a chest this size is flex in the lid when it is used as a seat — the listing makes no seating claim, which is consistent. The instruction to keep it on level ground and empty it before moving is unglamorous but honest advice that half these listings omit.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Published internal dimensions come to 509 litres against a 490L label', '17.7p per real litre, the best value on this page', 'Polypropylene with steel reinforcement, not plain resin', 'Aluminium sliding lid lifts rather than a gas strut that can fail', '933 ratings and moulded handles at both ends'], // PONTOS POSITIVOS
                'contras' => ['4.3 stars, the joint-lowest average in this comparison', 'Makes no claim to take a sitter, unlike the Keter boxes', 'Long 146.4cm footprint needs a full fence run', 'No gas piston, so the lid has to be held on windy days'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Keter Marvel+ 270L Outdoor Garden Storage Box, 65% Recycled, Graphite',   // NOME (ENCURTADO)
                'price' => '£56.24',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 13299,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71IVmrLvTHL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Keter Marvel+ 270L graphite wood effect garden storage box',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B079M6X4RY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => '13,299 ratings, five times deeper than anything else here — and internal dimensions that multiply out to 234 litres rather than the 270 on the lid.', // TEXTO CURTO (CARD)
                'body' => "Thirteen thousand two hundred and ninety-nine ratings at 4.5 stars is not merely the deepest evidence on this page, it is five times deeper than the next box down. When a plastic chest has survived that many British winters in that many gardens at that average, the material question is settled: the 65% recycled resin does not fade, crack or go chalky, and Keter backs it for two years. It seats two adults, weighs 6.37kg empty so one person can reposition it, and the built-in handles are moulded rather than screwed.

The capacity is where you should adjust expectations. Keter publishes internal dimensions of 114.4 by 40 by 51.2 centimetres, which comes to 234.3 litres — 13% below the 270 on the label. The listing hedges the same figure a second way in its bullets, quoting \"71G capacity\", and 71 US gallons is 268.8 litres, so the page carries two capacity claims that disagree with its own measurements. The 40 centimetre internal depth is the number that will actually bite: it is the shallowest here by 4.6cm, and a standard garden furniture cushion is a tight fit on its side.

One smaller tell in the specification table. Maximum weight recommendation is given as \"219.99 Kilograms\" — two decimal places on a load limit is a machine converting 485 pounds, not an engineer measuring anything. It is the same signature as the pressure washer that publishes 1740.46 PSI. Harmless in itself, but it tells you which numbers on the page were typed and which were generated.", // TEXTO SEO LONGO
                'pros' => ['13,299 ratings at 4.5, five times the depth of anything else here', 'Cheapest route into Keter at £56.24 with a 2 year warranty', '65% recycled resin that is fade-free and needs no maintenance', 'Light at 6.37kg, so one person can move it empty', 'Comfortably seats two adults'], // PONTOS POSITIVOS
                'contras' => ['Internal dimensions multiply out to 234 litres, not 270', 'Bullets also quote "71G", which is 268.8 litres, disagreeing again', '40cm internal depth is the shallowest here, awkward for cushions', 'Weight limit given as "219.99 Kilograms", a converted figure'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Duramax Cedargrain Durabox 416 Litre Outdoor Deck Box with Gas Cylinder', // NOME (ENCURTADO)
                'price' => '£83.52',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 2046,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81QHM6VZiuL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Duramax Cedargrain Durabox 416 litre plastic deck box in dark brown', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B085JJDZWD?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing here that publishes both units correctly: 416 litres and 110 gallons, which is exactly what 416 litres is.', // TEXTO CURTO (CARD)
                'body' => "In a category where the specification fields are a mess, this one is clean. The title reads \"416 Litre/ 110 Gallons\", and 416 litres is 109.9 US gallons — the conversion is right, both units are present, and neither contradicts the other. Set that beside the Amazon Basics box below, which fills both of its capacity fields with \"99 gallons\" and never states a litre at all, and you can see how low the bar is here and how easily it is cleared.

The hardware is the strongest in the middle of this list. A gas cylinder holds the lid open, which matters more than it sounds when you are lifting cushions out one-handed in the rain, and the lid is rated to 220 kilograms, so it is a genuine bench rather than a chest you are told not to sit on. It assembles without tools, weighs 14kg, and the UV-resistant PP resin carries a woodgrain texture that reads better than the wicker moulding on the Amazon Basics.

What it does not publish is internal dimensions. External is 129.5 by 70 by 62.5 centimetres, which is 566.6 litres of outside volume, so the 416 litre claim implies walls thick enough to swallow 27% of the box — plausible for a genuine double-wall construction and consistent with its 14kg weight, but not verifiable the way the Keter and Charles Bentley figures are. At 4.3 stars from 2,046 ratings the evidence is the third deepest here.", // TEXTO SEO LONGO
                'pros' => ['Publishes litres and gallons, and the conversion is actually correct', 'Gas cylinder holds the lid open, unique below £100 here', 'Lid rated to 220kg, so it works as a real bench', 'Assembles with no tools at all', '2,046 ratings, the third deepest sample in this group'], // PONTOS POSITIVOS
                'contras' => ['No internal dimensions published, so 416 litres cannot be checked', 'External volume is 567 litres, implying 27% lost to the walls', '4.3 stars is the joint-lowest average on this page', 'Gas struts are the part most likely to need replacing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Keter Westwood 570L Outdoor Garden Storage Box, 75% Recycled, Brown',     // NOME (ENCURTADO)
                'price' => '£154.25',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 2492,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/814m9huyaIL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Keter Westwood 570L brown wood panel effect garden storage box',      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B081B8YTP9?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest rated large box here at 4.6 from 2,492, with a piston lid and 516 real litres behind a 570 litre label.', // TEXTO CURTO (CARD)
                'body' => "Four point six stars from 2,492 ratings is the best combination of average and depth on this page, and the piston-assisted lid is the reason people keep it. A hydraulic strut on a lid this size turns a two-handed job into a one-handed one, and it stops the wind slamming 155 centimetres of resin onto your fingers. Seventy-five percent recycled content is the highest here, the wood panel effect is convincing at two paces, and it takes a padlock.

The capacity claim needs the same discount as the rest of the Keter range. Published internal dimensions are 142.4 by 62.6 by 57.9 centimetres, which is 516.1 litres against a 570L badge — a 9% overstatement, the mildest of the three Keter misses on this page. What is unusual is that the listing publishes the same measurements twice, in inches and in centimetres, inside one bullet: 56.10 by 24.65 by 22.80 inches works out at 516.7 litres, so the two systems agree with each other to within a litre. Both of them disagree with the name on the box.

At £154.25 it is the second most expensive here and costs 30 pence per real litre, against 17.7p for the Charles Bentley. What the money buys is the piston, the 62.6cm internal depth — the deepest on this page and the one dimension that decides whether bulky cushions go in flat — and a brand with 2,492 people vouching for how it looks after three winters.", // TEXTO SEO LONGO
                'pros' => ['4.6 stars from 2,492, the best average-and-depth combination here', 'Hydraulic piston lid, genuinely useful at this size', '62.6cm internal depth, the deepest in this comparison', '75% recycled content, the highest on this page', 'Publishes internal and external dimensions in both unit systems'], // PONTOS POSITIVOS
                'contras' => ['Internal dimensions come to 516 litres against a 570L label', '30p per real litre, nearly double the Charles Bentley', 'Four separate dimension sets crammed into a single bullet', '155cm wide, so it needs a long clear run of wall'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Keter Signature 190L Kentwood Garden Storage Box, DecoCoat, Rosewood',    // NOME (ENCURTADO)
                'price' => '£45.21',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 312,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/714ZaPWlgwL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Keter Signature Kentwood 190L rosewood outdoor storage box',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FW5PZP34?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest box here at £45.21, the only Keter whose arithmetic beats its own label, and the one that fits a balcony.', // TEXTO CURTO (CARD)
                'body' => "The Kentwood is the exception in Keter's range and the reason it ranks here despite the thinnest review pool among the Keters. Its published internal dimensions are 81.6 by 44.6 by 56.6 centimetres, which multiply out to 206 litres against a 190L name. It is one of only two boxes on this page that claim less than they measure, and the other is the Charles Bentley at number one.

At 82.3 centimetres wide externally it is also the only genuinely small option here, which matters more than the litre count for a lot of buyers. A flat or a terrace with a two-metre balcony cannot take the 155cm Westwood or the 146cm Charles Bentley; this fits beside a door and still swallows a set of cushions, wellingtons and a bag of compost. Keter rates it as a seat and a side table, and the DecoCoat composite finish is a step up from the plain resin on the Marvel+ — it is UV protected and fade-free rather than simply weatherproof.

The caveats are proportionate. Three hundred and twelve ratings is the second thinnest sample on this page, and it is a recent listing, so there is no three-winter track record behind it yet — though 4.6 stars is the joint-highest average here. At £45.21 for 206 real litres it works out at 21.9 pence per litre, second only to the Charles Bentley, which is a genuinely good rate for the smallest box in the group.", // TEXTO SEO LONGO
                'pros' => ['Internal dimensions come to 206 litres against a 190L label', 'Cheapest box here at £45.21 and 21.9p per real litre', 'Only compact option: 82.3cm wide, fits a balcony or narrow terrace', '4.6 stars, the joint-highest average in this comparison', 'DecoCoat composite finish, UV protected and fade-free'], // PONTOS POSITIVOS
                'contras' => ['312 ratings, the second thinnest sample on this page', 'Recent listing with no long-term weathering record yet', '190 litres is too small for a full set of garden furniture cushions', 'Rosewood finish is the only colour offered'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Amazon Basics 375 Litre Garden Storage Box with Lockable Lid, Brown',     // NOME (ENCURTADO)
                'price' => '£79.20',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 799,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71sNkWPh2bL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Amazon Basics 375 litre brown wicker effect garden deck box',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B9SC9695?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A solid 19.5kg double-wall chest whose capacity fields both read "99 gallons" — on a British listing that never states a litre anywhere in its specification.', // TEXTO CURTO (CARD)
                'body' => "The box itself is better than its listing. At 19.5 kilograms it is the heaviest here by 5.5kg, and in plastic garden storage weight is the closest proxy for wall thickness there is — this is double-wall resin with moulded lid hinges rather than the pinned hinges that snap after a season. Water runs off the domed lid instead of pooling, the wicker moulding hides scuffs better than a flat finish, and 799 ratings at 4.4 stars is respectable evidence.

The specification is where Amazon's own brand slips. The title says \"375 Litre\". Both capacity fields in the specification table say \"99 gallons\", and there is no litre figure in the table at all. The conversion is correct — 99 US gallons is 374.7 litres — but this is Amazon's house brand publishing American gallons to British shoppers as the only stated measure of how much the box holds. No internal dimensions are given anywhere, so the 375 litres cannot be checked; external is 122 by 63 by 61 centimetres, or 468.8 litres, which makes the claim plausible for genuine double-wall but unverifiable.

At £79.20 for an unverifiable 375 litres it is 21.1 pence per claimed litre, which looks competitive until you notice that figure is the only one on this page that has not been through the multiplication. Buy it for the build weight and the lock, not for the number on the label.", // TEXTO SEO LONGO
                'pros' => ['Heaviest box here at 19.5kg, a good proxy for wall thickness', 'Genuine double-wall resin with moulded rather than pinned hinges', 'Domed lid sheds water instead of pooling it', '799 ratings at 4.4 stars', 'Lockable lid and a wicker finish that hides scuffs'], // PONTOS POSITIVOS
                'contras' => ['Both capacity fields read "99 gallons" with no litre figure in the table', 'US gallons as the only stated measure on a UK listing', 'No internal dimensions published, so 375 litres is unverifiable', 'Heavy enough at 19.5kg that moving it empty is a two-person job'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Olsen & Smith 270L Lockable Waterproof Cushion Storage Box & Bench',      // NOME (ENCURTADO)
                'price' => '£49.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 414,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61h7ucYvZLL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Olsen and Smith 270L lockable cushion storage box and bench seat',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09VL2XDND?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The bullet publishes internal dimensions that reconcile perfectly at 272 litres. The specification table on the same page publishes numbers that come to 188.', // TEXTO CURTO (CARD)
                'body' => "Read the fifth bullet and this is one of the most honest listings on the page: \"External: 109 x 51 x 55cm | Internal: 104.7 x 49 x 53.1cm | Capacity: 270L\". Multiply the internal figures and you get 272.4 litres. The label is accurate to within two litres, which only two other boxes here manage.

Then read the specification table on the same page, which states \"Item Dimensions 43L x 78W x 56H centimetres\". Those come to 187.8 litres, and not one of the three axes matches the bullet — not 109, not 51, not 55. The same listing publishes two external dimension sets that share no number at all. This is the pattern that shows up in nearly every category we collect: the table and the \"About this item\" section are maintained by different people and neither checks the other. Here the bullet is almost certainly right, since 109 by 51 by 55 externally is exactly consistent with a 272 litre interior.

As an object it is a light 5.6kg cushion chest that doubles as a bench rated to 100 kilograms, which is one adult rather than the two the Keters take. At £49.99 for a verifiable 272 litres it is 18.4 pence per real litre, second only to the Charles Bentley. Worth noting that Olsen & Smith run four near-identical 270L listings on this search, at £47.99, £48.99 and £49.99, each with its own separate pool of ratings — this is the one with the deepest pool.", // TEXTO SEO LONGO
                'pros' => ['Bullet internal dimensions reconcile to 272 litres against a 270L label', '18.4p per real litre, second best value on this page', 'Light at 5.6kg and takes a padlock', 'Rated as a bench seat to 100kg', '414 ratings at 4.4 stars'], // PONTOS POSITIVOS
                'contras' => ['Spec table says 43 x 78 x 56cm, which is 188 litres and matches nothing', 'Two external dimension sets on one page sharing no figure', 'Bench rating of 100kg is one adult, not two', 'Sold across four near-identical listings with separate review pools'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'VonHaus 270L Garden Storage Box, Weatherproof Plastic, Lockable, Grey',   // NOME (ENCURTADO)
                'price' => '£69.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 521,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71XsTeDGFgL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'VonHaus 270L grey weatherproof garden storage box with sliding bar hinge', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09B27LQM8?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The same 109 x 51 x 55cm shell as the Olsen & Smith above at £20 more, with a specification field claiming a storage volume of 3,057 cubic metres.', // TEXTO CURTO (CARD)
                'body' => "The external dimensions on this listing are 109 by 51 by 55 centimetres. Those are, to the centimetre, the external dimensions Olsen & Smith publishes for its 270L box at number seven — same mould, same capacity claim, £20 apart. VonHaus charges £69.99 where Olsen & Smith charges £49.99, and unlike its twin it publishes no internal dimensions at all, so the 270 litres cannot be checked from this page.

The specification table then produces the single strangest field collected in this category. Storage Volume reads \"3057.45 Cubic Metres\". Three thousand cubic metres is the volume of a small warehouse, roughly eleven thousand of these boxes. The origin is visible in the digits: 109 times 51 times 55 is 305,745 cubic centimetres, and somebody has moved the decimal point two places and relabelled the unit. The correct entry would be 0.27 cubic metres. In the same table the maximum weight recommendation is given as 270 kilograms — the same number as the litres, which is capacity and load treated as though they were one quantity.

None of this makes it a bad chest. The additional base support bar is a real structural improvement over the Olsen & Smith, the two sliding bar hinges genuinely stop the lid slamming, and at 4.8kg it is easy to reposition. Five hundred and twenty-one ratings at 4.3 stars is solid. But you are paying a £20 brand premium over an identically sized box that publishes more of its specification and gets more of it right.", // TEXTO SEO LONGO
                'pros' => ['Base support bar, a real structural improvement over its twin', 'Two sliding bar hinges make the lid slam-proof', 'Light at 4.8kg and lockable', '521 ratings at 4.3 stars and a UK brand established since 2009'], // PONTOS POSITIVOS
                'contras' => ['Storage Volume field reads "3057.45 Cubic Metres" instead of 0.27', 'Same 109 x 51 x 55cm shell as the £49.99 Olsen & Smith', 'Publishes no internal dimensions, so 270 litres is unverifiable', 'Weight limit and capacity both given as 270, which cannot both be right'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'URBN GARDEN 350L Heavy Duty Garden Storage Box with Wheels, Anthracite',  // NOME (ENCURTADO)
                'price' => '£57.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 177,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71LExQVKeYL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'URBN GARDEN 350L anthracite garden storage box with wheels and lockable lid', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D1GHR7KP?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only box here with wheels, and the tightest capacity claim on the page: 350 litres from a shell whose external volume is 397.', // TEXTO CURTO (CARD)
                'body' => "Wheels are the argument for this one and they are a better argument than the ranking suggests. Every other box on this page has to be emptied and lifted to move it; this one tilts and rolls, which means you can pull it out to sweep behind it or shift it under cover before a storm without unpacking the cushions first. Combined with the lockable lid and the anthracite finish that does not show algae the way pale grey does, it is a practical object.

The capacity is the tightest claim in this comparison. External dimensions are 118 by 57 by 59 centimetres, which is 396.8 litres of outside volume, and the box is sold as 350 litres. That means 88% of the external volume is being counted as usable space, and no internal dimensions are published to support it. For comparison, the Keter Marvel+ turns 297 litres of external volume into 234 of internal, or 79%, and that is with thin single-wall resin. Eighty-eight percent is achievable only with very thin walls and a lid that is genuinely flat inside, and this listing has a domed lid.

One hundred and seventy-seven ratings is by a distance the thinnest sample here — the next lowest is 312 — and there is no way to test a capacity claim on a box that publishes no internal measurement. At 4.3 stars the early feedback is fine. Buy it because it rolls, and treat 350 litres as an upper bound rather than a figure.", // TEXTO SEO LONGO
                'pros' => ['The only box here with wheels, so it moves without being emptied', 'Lockable lid and an anthracite finish that hides algae', 'Publishes external dimensions clearly at 118 x 57 x 59cm', '£57.99 for a claimed 350 litres is competitive on paper'], // PONTOS POSITIVOS
                'contras' => ['350 litres from a 397 litre external shell means 88% usable, which is very tight', 'No internal dimensions published anywhere on the listing', '177 ratings, by far the thinnest sample in this comparison', 'Domed lid makes the 88% figure harder still to believe'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Keter 870L XXL Deck Storage Box with Gas Lift, Anthracite',               // NOME (ENCURTADO)
                'price' => '£219.00',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 423,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/414IJS0HazL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Keter 870L XXL anthracite deck storage box with gas lift lid',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07B9YYN8X?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most expensive box in the comparison, and the one whose published inner dimensions multiply out to 305 litres rather than 870.', // TEXTO CURTO (CARD)
                'body' => "This is the largest garden storage box here and the only one that will genuinely swallow a full four-piece set of furniture cushions with room over. External dimensions are 147 by 83 by 86 centimetres — 1,049 litres of outside volume — and a gas lift handles a lid that size properly. At 4.5 stars from 423 ratings the owners are happy, and nothing below is a complaint about the object.

The listing cannot state its own interior. The second bullet reads \"inner approximately 136,2 x 28.8 x 77,8 cm\", and there are two problems packed into that string. The first is formatting: two of the three figures use a comma as the decimal separator in the German style while the middle one uses a point, inside an English-language listing. The second is arithmetic. Multiply those three numbers and you get 305.2 litres, against an 870 litre name — a shortfall of 65%. Replace the 28.8 with 82.8 and the sum comes to 877 litres, which matches the label almost exactly, so the near-certain explanation is a transposed digit rather than a wild claim. That is reassuring about the box and unflattering about the listing: the most expensive product in this search has a typing error in the only measurement that describes what you are buying.

At £219 it is 25.2 pence per labelled litre, which is not unreasonable for this size, though the Charles Bentley delivers verified litres at 17.7p. What you are paying the premium for is a gas lift on a very large lid, the anthracite finish, and Keter's weathering record — and you are buying an 870 litre figure that the page's own numbers do not produce.", // TEXTO SEO LONGO
                'pros' => ['Genuinely the largest box here, at 1,049 litres of external volume', 'Gas lift, which is essential on a lid this size', 'Takes a full set of four-piece furniture cushions with room over', '4.5 stars from 423 ratings and Keter UV resistance', 'Lockable, with the padlock sold separately'], // PONTOS POSITIVOS
                'contras' => ['Published inner dimensions multiply out to 305 litres, not 870', 'The middle figure reads 28.8cm where 82.8cm would match the label', 'Mixes comma and point decimal separators in one measurement', 'Most expensive here at £219.00 and 25.2p per labelled litre'], // PONTOS NEGATIVOS
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
        $this->command?->info("GardenStorageBoxesSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
