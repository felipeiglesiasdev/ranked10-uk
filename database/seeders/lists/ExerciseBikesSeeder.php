<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class ExerciseBikesSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE BIKES ERGOMETRICAS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=exercise+bike+indoor&rh=p_36%3A10000-  (17 ASINS EM 20 CARDS)
        // CATEGORIA FITNESS. SAZONAL: SOBE DE OUTUBRO E EXPLODE EM JANEIRO.
        //
        // ─── ACHADO PRINCIPAL: O LIMITE DE PESO DO USUARIO NAO BATE ───
        // 1. NUMA BIKE ERGOMETRICA O PESO MAXIMO DO USUARIO E A ESPECIFICACAO DE
        //    SEGURANCA. TRES DAS DEZ PUBLICAM NA TABELA UM NUMERO QUE NAO TEM RELACAO COM
        //    O DO ANUNCIO, E UMA QUARTA SE CONTRADIZ:
        //      TOPUTURE B0HCZ486Z7 .. TITULO E BULLET: 350 lbs · TABELA: "56 Pounds"
        //      ACEFUTURE ............ BULLETS: NAO DIZ ····· TABELA: "20 Kilograms"
        //      MERACH ............... BULLET: 136 kg ······· TABELA: "350 Pounds" (158,8 kg)
        //      DMASUN B0F8QZTB13 .... TITULO: 350LBs ······· BULLET: "a load of 360LB"
        //    56 LIBRAS SAO 25 kg E 20 kg E UMA CRIANCA. O CAMPO "Maximum weight
        //    recommendation" E O QUE A AMAZON EXIBE NA CAIXA DE RESUMO DO PRODUTO, ENTAO
        //    E EXATAMENTE ONDE UM COMPRADOR MAIS PESADO VAI OLHAR.
        // 2. AS SEIS QUE ACERTAM MOSTRAM QUE DA PARA FAZER: BUREVER (160 KG NO TITULO E
        //    NA TABELA), WENOKER (160 kg / 353 lbs NOS DOIS), TOPUTURE 32-LEVEL (150 kg /
        //    330 lbs NOS DOIS), DMASUN B0F3XJWC93 (160KG/350LB), TOPUTURE 5-IN-1 (310 lbs
        //    / 140 kg) E YYFITT (120 kg).
        //
        // ─── ACHADO SECUNDARIO: "0-100%" NAO E UMA UNIDADE DE RESISTENCIA ───
        // 3. CINCO DAS DEZ ANUNCIAM "0-100% magnetic resistance". ISSO E UMA PORCENTAGEM
        //    DE UM MAXIMO QUE NINGUEM PUBLICA — E COMO VENDER UM AQUECEDOR DE "0 A 100%
        //    DE CALOR". A CARGA REAL DE UM FREIO MAGNETICO SE MEDE EM WATT A UMA CADENCIA
        //    DADA, E NENHUMA DAS DEZ PUBLICA ISSO. AS TRES ETIQUETAS EM USO:
        //      "0-100%" ....... DMASUN (x2), WENOKER, TOPUTURE B0HCZ486Z7, BUREVER
        //      "16-Level" ..... YYFITT, TOPUTURE 5-IN-1, ACEFUTURE
        //      "32-Level" ..... TOPUTURE B0GJ4TLZ6X (E ELETRONICA, VIA APP)
        //      NADA ........... MERACH
        //    UM NUMERO DE NIVEIS PELO MENOS SE CONTA. "0-100%" NAO SE COMPARA COM NADA.
        //
        // ─── ACHADO TERCIARIO: O VOLANTE, EM DUAS UNIDADES ───
        // 4. O PESO DO VOLANTE E O QUE DECIDE SE A PEDALADA E FLUIDA OU ENGASGADA, E
        //    QUATRO DAS DEZ NAO PUBLICAM. ENTRE AS QUE PUBLICAM:
        //      DMASUN B0F8QZTB13 ..... "Solid 15KG Flywheel"
        //      TOPUTURE B0HCZ486Z7 ... "15KG gravity flywheel"
        //      BUREVER ............... "15kg Flywheel"
        //      MERACH ................ "the 15 lbs flywheel"   ← 6,8 kg
        //      TOPUTURE 5-IN-1 ....... "6KG heavy flywheel"
        //    A MERACH USA O MESMO NUMERO 15 DAS OUTRAS TRES, EM LIBRA. SAO 6,8 kg CONTRA
        //    15 kg — MENOS DA METADE, NA MESMA FAIXA DE PRECO E NA MESMA PRATELEIRA.
        //
        // ─── OUTROS ACHADOS ───
        // 5. A MERACH DECLARA "Resistance mechanism: FRICTION" NA TABELA DE UMA BIKE
        //    VENDIDA COMO "Magnetic resistance" NO CAMPO DE CARACTERISTICAS ESPECIAIS.
        //    A DMASUN ATACA EXATAMENTE ISSO NO BULLET DELA: "compared with wool felt
        //    resistance bikes, our magnetic resistance exercise bikes... does not need to
        //    replace the brake pads". A DIFERENCA ENTRE OS DOIS SISTEMAS E O MOTIVO PELO
        //    QUAL SE PAGA MAIS.
        // 6. A WENOKER DECLARA "keeping noise levels below 15 dB". A ORIENTACAO DA OMS
        //    PARA RUIDO NOTURNO DENTRO DE CASA E 30 dB E A PROPRIA RESPIRACAO DE QUEM
        //    PEDALA PASSA DE 30. A ESCADA COLETADA: WENOKER 15 dB · TOPUTURE 5-IN-1 E
        //    32-LEVEL 20 dB · TOPUTURE B0HCZ486Z7 E BUREVER 25 dB · DMASUN, MERACH,
        //    YYFITT E ACEFUTURE NAO PUBLICAM NUMERO.
        // 7. A DMASUN B0F8QZTB13 DECLARA "Minimum height: 6.3 Feet" NA TABELA ENQUANTO O
        //    BULLET DIZ QUE A BIKE SERVE DE 4,6 A 6,3 PES. O CAMPO TRANSFORMOU O MAXIMO EM
        //    MINIMO — QUEM TEM 1,70 m LENDO A TABELA CONCLUI QUE E BAIXO DEMAIS. A MESMA
        //    FICHA DECLARA "Material: 1".
        // 8. AS DIMENSOES DA DMASUN TROCAM DE LUGAR ENTRE OS DOIS MODELOS: B0F3XJWC93 DIZ
        //    120D x 52W x 114H E B0F8QZTB13 DIZ 114D x 52W x 120H. OS MESMOS TRES NUMEROS
        //    COM D E H INVERTIDOS, O MESMO PADRAO QUE ACHAMOS NAS PANASONIC DE PAO.
        // 9. TRES FICHAS PUBLICAM A DIMENSAO DA CAIXA COMO SE FOSSE A DA BIKE MONTADA:
        //    WENOKER "95D x 76W x 19H cm" E TOPUTURE 5-IN-1 "104.5D x 56W x 11.5H cm".
        //    UMA BIKE DE 19 cm DE ALTURA NAO EXISTE.
        // 10. A YYFITT DECLARA "Resistance mechanism: resistance-bike-trainers" — UM SLUG
        //    DE CATALOGO NO LUGAR DO VALOR. E QUATRO BIKES A PEDAL DECLARAM "Power source:
        //    Battery Powered" (MERACH, YYFITT, TOPUTURE B0HCZ486Z7, ACEFUTURE E BUREVER);
        //    E A PILHA DO MOSTRADOR, NAO A FONTE DE ENERGIA DO APARELHO.
        // 11. POOL DE AVALIACAO COMPARTILHADO: DMASUN B0F3XJWC93 (£169.99) E B0F482QGGP
        //    (£159.99) COM 9.276 CADA; MERACH B0D9XM6LJC (£139.99) E B0D9XM6ZV7 (£189.99)
        //    COM 2.421 CADA — £50 DE DIFERENCA NO MESMO POOL.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: A PELOTON BIKE+ (£1.849,00 COM 4 AVALIACOES), QUE ESTA NUMA OUTRA
        // CATEGORIA DE PRECO; OS ASINS IRMAOS DA DMASUN E DA MERACH (MANTIDO UM DE CADA
        // POOL); MERACH RECUMBENT (45 AVALIACOES), TENBOOM (14) E TUDO ABAIXO DE 200.
        // TOPUTURE APARECE TRES VEZES PORQUE OS TRES MODELOS SAO CASOS DIFERENTES: UM
        // COERENTE, UM DOBRAVEL HONESTO SOBRE O VOLANTE DE 6 kg E UM COM "56 Pounds".
        // DENTRO: NOTA DE 4.5 A 4.8, PRECO DE £139.99 A £199.99, SETE MARCAS.
        //
        // FOCUS KEYWORD: best exercise bike
        // VARIACOES TRABALHADAS: exercise bike uk / spin bike / indoor cycling bike /
        // magnetic resistance exercise bike / folding exercise bike /
        // exercise bike for home / stationary bike / exercise bike flywheel weight /
        // quiet exercise bike / exercise bike weight capacity
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'fitness',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Fitness',                    // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best fitness gear and activewear available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-exercise-bike',                                         // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Exercise Bike 2026: 10 Ranked on the Weight Limit',     // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Exercise Bike 2026: Top 10 Ranked and Compared',   // TITLE DA ABA/GOOGLE (51 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best exercise bike options on Amazon by flywheel weight and whether the published user weight limit agrees with itself, from £139.99 to £199.99.', // META DESCRIPTION (159 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best exercise bike',                                // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "On an exercise bike the maximum user weight is the safety specification, and three of the ten in this comparison publish one in their specification table that bears no relation to the one in their marketing. Toputure advertises 350lbs in its title and its fifth bullet, and its specification field reads 56 Pounds. AceFuture never states a capacity in its bullets at all and its field reads 20 Kilograms. Merach says 136kg in a bullet and 350 Pounds — 158.8kg — in the table, a 23 kilogram gap. That field is the one Amazon shows in the product summary box, which is exactly where a heavier rider looks first. Meanwhile the number everybody advertises, 0-100% magnetic resistance, is not a specification: it is a percentage of a maximum nobody publishes, and five of these ten use it. The number that actually decides whether the pedal stroke feels smooth is the flywheel, and four bikes here do not give one — while Merach quotes 15 lbs and three rivals quote 15 kg, the same figure in units less than half apart. Below we rank the best exercise bike options on Amazon in August 2026 on the numbers that survive being read twice.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Picking the best exercise bike is mostly a matter of checking three numbers against each other before you look at anything else. Start with the weight limit, in the specification table rather than the title, and if the two disagree assume the listing was not checked and treat everything else on it with the same caution. Then the flywheel: 15kg is a genuinely smooth pedal stroke, 6kg is a folding bike you will feel notching under load, and 15 lbs is 6.8kg wearing a bigger number. Then the frame weight, which almost nobody advertises but every specification table carries — a 30kg bike does not move when you stand up to sprint and a 19kg one does. By contrast, ignore the resistance label completely. Nobody in this comparison publishes watts at a cadence, so 0-100% and 16-level and 32-level are three different ways of not telling you the same thing, and the only meaningful distinction is between a manual knob and an app-controlled electric brake, which one bike here has and discloses honestly needs mains power. Crucially, treat any noise claim below 30 decibels as decoration: that is the World Health Organization guideline for a quiet bedroom, and one bike here claims 15 while you are pedalling on it.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                          // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 11:00:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'DMASUN Upgraded Exercise Bike, 30.5kg Frame, 160kg Capacity, LCD',        // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£169.99',                                                               // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 9276,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71eooio8OdL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best exercise bike',                                                 // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F3XJWC93?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best exercise bike here on evidence — 9,276 ratings, more than three times the next deepest — with a 30.5kg frame and a weight limit that agrees with itself in both units.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Nine thousand two hundred and seventy-six ratings at 4.5 stars is more than three times the next deepest sample in this comparison, and the specification behind it holds up. The capacity is stated as 160KG/350LB in the bullets and 350 Pounds in the specification table, which are the same figure in two units — a low bar that three bikes on this page fail. The frame weighs 30.5kg, the heaviest here, and on an indoor bike that is the number that decides whether it stays put when you come out of the saddle: a 19kg folding frame moves and a 30kg one does not.

The rest is sensibly plain. Belt-driven magnetic resistance with no brake pads to replace, an LCD tracking time, speed, distance, calories and odometer, a tablet tray, four-way seat and two-way handlebar adjustment for riders from 140 to 193cm, transport wheels, and 70% pre-assembly with a claimed 30 minute build. DMASUN offers 36 months of replacement parts, the longest parts commitment on this page.

Two gaps. There is no flywheel weight published anywhere on this listing, which on a spin bike is the specification that determines how the pedal stroke feels — DMASUN publishes 15kg on its other model further down this page, so the omission here is odd. And the resistance is quoted as 0-100, a percentage of a maximum that is never stated. It is also worth knowing that the same bike sells under a second DMASUN ASIN at £159.99 with the same 9,276 ratings, so check both listings before ordering.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['9,276 ratings at 4.5, more than three times the next deepest sample here', 'Weight limit consistent at 160kg and 350lb across bullets and specification', '30.5kg frame, the heaviest and steadiest in this comparison', '36 months of replacement parts, the longest commitment on this page', 'Belt-driven magnetic resistance with no brake pads to wear out'], // PONTOS POSITIVOS
                'contras' => ['No flywheel weight published, unlike the same brand model at number four', 'Resistance quoted as 0-100 with no maximum stated', 'Sold under a second DMASUN ASIN at £159.99 with the same review pool', 'No noise figure published'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Burever Exercise Bike, 15kg Flywheel, 160kg Capacity, Dumbbell Rack',     // NOME (ENCURTADO)
                'price' => '£189.99',                                                               // PRECO
                'rating' => 4.8,                                                                    // NOTA
                'reviews_count' => 224,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81Ql-pOO4GL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Burever indoor exercise bike with dumbbell rack',                    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G4K72P72?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing here that puts the flywheel weight and the user weight limit in the title and then repeats both correctly in the specification table.', // TEXTO CURTO (CARD)
                'body' => "Read the title: 15kg Flywheel, 160KG Weight Capacity. Then read the specification table: Maximum weight recommendation, 160 Kilograms. Both numbers, in the same unit, in both places. After a page spent finding bikes that claim 350lbs in a title and 56 in a field, a manufacturer that simply states its two most important figures and states them once is worth putting near the top, and 4.8 stars is the joint highest rating here.

Fifteen kilograms of flywheel is the real specification. It is what carries the pedal through the dead spot at the top and bottom of each stroke, and it is the difference between a ride that feels like a road bike and one that feels like a stiff hinge. Only three bikes in this comparison publish 15kg, and this is the cheapest of them by nothing much but the only one that leads with it. Carbon steel frame at 27kg, under 25 decibels quoted — a plausible figure rather than an impossible one — Fitshow, Zwift and Kinomap support, a heart rate readout, a dumbbell rack and two bottle holders, and 80% pre-assembly.

Two reservations. Two hundred and twenty-four ratings is the second thinnest sample in this comparison, so the 4.8 rests on relatively few people and there is no long record behind Burever as a brand in the UK. And the resistance is the usual 0-100%, so on that specification it is no better informed than anything else here. The specification also lists the power source as Battery Powered, which describes the display rather than the bike.", // TEXTO SEO LONGO
                'pros' => ['Flywheel weight and user capacity both in the title and both correct in the table', '15kg flywheel, the heaviest published in this comparison', '4.8 stars, the joint highest rating here', 'Under 25dB is a plausible noise claim rather than an impossible one', '27kg carbon steel frame with a dumbbell rack and heart rate readout'], // PONTOS POSITIVOS
                'contras' => ['224 ratings, the second thinnest sample in this comparison', 'Resistance given as 0-100% with no maximum stated', 'No UK track record behind the brand', 'Power source field says Battery Powered on a pedal-driven bike'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Wenoker Exercise Bike, 160kg Capacity, Belt Drive, App Compatible',       // NOME (ENCURTADO)
                'price' => '£159.99',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 1739,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61uqVa83+rL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Wenoker indoor exercise bike in blue and black',                     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0H2Z28FFT?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Capacity stated as 160kg and 353lbs in the bullets and 160 Kilograms in the table — and a claim that the bike runs below 15 decibels while you pedal it.', // TEXTO CURTO (CARD)
                'body' => "One thousand seven hundred and thirty-nine ratings at 4.6 stars, £159.99, and a weight limit that is right in three places: 160 kg and approximately 353 lbs in the bullets, 160 Kilograms in the specification table. It also has the widest rider range in this comparison, accommodating 142cm to 195cm, which for a household with a 4'8\" and a 6'5\" in it is genuinely the deciding feature. Two-year warranty, 80% pre-assembled, Zwift and Kinomap support.

The noise claim is where it stops being sensible. Wenoker says the belt drive keeps noise levels below 15 dB. Fifteen decibels is roughly the threshold of human hearing and the noise floor of a recording studio; the World Health Organization uses 30 dB as its guideline for a quiet bedroom, and a person breathing hard on a bike is comfortably above that on their own. Whatever was measured, it was not a bike being ridden. The Burever above it claims 25 dB and the two Toputures claim 20 and 25, all of which are also optimistic but at least sit in the range a machine could occupy.

Two other things. No flywheel weight is published, so the smoothness of the ride is unknown before you buy, and the resistance is another 0-100%. And the specification gives the product dimensions as 95D x 76W x 19H centimetres — 19 centimetres tall, which is the boxed depth rather than a bike you could sit on. The Toputure at number seven makes the same mistake with 11.5cm.", // TEXTO SEO LONGO
                'pros' => ['Weight limit correct in three places: 160kg, 353lbs and the table', 'Fits riders from 142cm to 195cm, the widest range in this comparison', '1,739 ratings at 4.6 stars for £159.99', 'Two-year warranty with 80% pre-assembly', 'Zwift and Kinomap support with an LCD and tablet holder'], // PONTOS POSITIVOS
                'contras' => ['Claims noise below 15dB, around the threshold of human hearing', 'No flywheel weight published anywhere', 'Product dimensions given as 19cm tall, which is the box not the bike', 'Resistance quoted as 0-100% with no maximum'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'DMASUN 8715C Spin Bike, 15kg Flywheel, 3.5mm Steel, App Control',         // NOME (ENCURTADO)
                'price' => '£159.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 2919,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71-VZTgWXSL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'DMASUN 8715C spin bike in black and blue',                           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F8QZTB13?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A 15kg flywheel and a frame thickened from 2.0mm to 3.5mm, on a listing whose table says the minimum rider height is 6.3 feet and whose material is 1.', // TEXTO CURTO (CARD)
                'body' => "Two thousand nine hundred and nineteen ratings at 4.5 stars and £159.99 buys the specification the bike at number one leaves out: a full-filled solid 15kg flywheel, stated in the special features field. That is the heaviest class of flywheel in this comparison and it is what makes the pedal stroke carry rather than stall. DMASUN also does something unusually specific in the third bullet, telling you the frame steel was thickened from 2.0mm to 3.5mm over the previous version — a real engineering figure, not an adjective. Bluetooth to Kinomap, three years of replacement parts, 29kg assembled.

The listing then falls apart in the specification table. The minimum height field reads 6.3 Feet, while the sixth bullet says the bike accommodates riders from 4.6 ft to 6.3 ft — the field has turned the maximum into the minimum, so a 5'6\" buyer reading the summary box concludes they are too short for it. The material field reads 1. And the capacity is given as 350LBs in the title and a load of 360LB in the third bullet, ten pounds apart on the same page.

There is a dimensional oddity too. This listing gives 114D x 52W x 120H centimetres and the DMASUN at number one gives 120D x 52W x 114H — the same three numbers with depth and height swapped between two bikes from one brand. None of it changes the hardware, which on the evidence of 2,919 ratings is sound. It does tell you the fields were populated rather than checked.", // TEXTO SEO LONGO
                'pros' => ['15kg solid flywheel published, the heaviest class in this comparison', 'Frame steel specified as thickened from 2.0mm to 3.5mm, a real figure', '2,919 ratings at 4.5 stars for £159.99', 'Three years of replacement parts and Kinomap connectivity', 'Emergency brake button and four-way seat adjustment'], // PONTOS POSITIVOS
                'contras' => ['Specification says minimum rider height is 6.3 feet, which is the maximum', 'Title says 350LBs capacity, the bullet says 360LB', 'Material field on the specification table reads 1', 'Dimensions have depth and height swapped against the sister model'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Toputure Exercise Bike, 32-Level Electric Magnetic Resistance, App',      // NOME (ENCURTADO)
                'price' => '£199.99',                                                               // PRECO
                'rating' => 4.8,                                                                    // NOTA
                'reviews_count' => 217,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81r2bIQn2BL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Toputure exercise bike with touchscreen LCD in yellow',              // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GJ4TLZ6X?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only bike here with app-controlled electric resistance in countable levels rather than a percentage, and it tells you upfront that the feature needs mains power.', // TEXTO CURTO (CARD)
                'body' => "Thirty-two levels of electric magnetic resistance, adjusted from your phone. That is a different thing from the knob every other bike on this page uses, and it matters for the reason the resistance section of this article exists: 32 levels is a countable, repeatable scale, so a workout at level 18 today is the same load as level 18 next week. A percentage dial is not repeatable, and app-driven training plans on Zwift or Kinomap can actually change the load for you rather than telling you to turn something.

Toputure is also straight about the cost of that. The first bullet notes in brackets that the smart resistance requires mains power, gives the cable length as 1.9 metres, and suggests a power bank if there is no socket nearby. A manufacturer volunteering the awkward consequence of its own headline feature is rare enough to say out loud. The capacity is consistent too, 150kg in the bullet and 330 Pounds in the table, which is the same figure. Four point eight stars is the joint highest here.

Two things hold it at five. Two hundred and seventeen ratings is the thinnest sample in this comparison, so the rating is provisional. And no flywheel weight appears anywhere — on a bike whose entire argument is precision of resistance, the mass that smooths the stroke goes unmentioned, and at 21.3kg the whole machine is nine kilos lighter than the DMASUN at number one, which suggests the flywheel is not a heavy one. The sub-20dB claim is in the same optimistic band as the rest of this page.", // TEXTO SEO LONGO
                'pros' => ['32 countable resistance levels rather than an uncountable percentage', 'App-controlled electric brake, the only one in this comparison', 'Discloses that the smart resistance needs mains power and gives the cable length', 'Capacity consistent at 150kg and 330lbs across bullet and table', '4.8 stars, joint highest rating on this page'], // PONTOS POSITIVOS
                'contras' => ['217 ratings, the thinnest sample in this comparison', 'No flywheel weight published anywhere', '21.3kg frame, nine kilos lighter than the steadiest bike here', 'Needs a socket for the feature it is sold on'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'MERACH Exercise Bike, Dual-Triangle Frame, Zwift and Kinomap',            // NOME (ENCURTADO)
                'price' => '£139.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 2421,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71oQNQMRlZL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'MERACH indoor exercise bike in blue',                                // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D9XM6LJC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest bike here at £139.99, with a 15 lbs flywheel where rivals quote 15 kg, and a specification table that calls its magnetic resistance friction.', // TEXTO CURTO (CARD)
                'body' => "One hundred and thirty-nine pounds ninety-nine is the lowest price in this comparison and 2,421 ratings at 4.5 stars is a solid record. The dual-triangle frame is genuinely well braced, the belt drive is quiet, the app is free with real class content and works alongside Kinomap and Zwift, and the seat and handlebar adjustment covers 142 to 188cm. As a first indoor bike it is a reasonable amount of machine for the money.

Two entries in the listing deserve reading closely. The fifth bullet says the 15 lbs flywheel. Fifteen pounds is 6.8 kilograms. Three other bikes on this page publish 15kg flywheels, and at a glance across a search results page the two claims look identical — this one is less than half the mass, which is the difference between a stroke that carries and one you have to keep pushing. And the specification table gives the resistance mechanism as Friction, while the special features field on the same page says magnetic resistance. Those are different systems: friction uses a felt pad that wears out and squeaks, magnetic uses a contactless brake. The DMASUN listings attack exactly that difference as a selling point.

Whichever is true, one field is wrong, and it is the field describing the mechanism you are paying for. The capacity has the same problem: 136kg in the bullet, 350 Pounds in the table, which is 158.8kg. And the identical bike sells under a second MERACH ASIN at £189.99 with the same 2,421 ratings, £50 apart.", // TEXTO SEO LONGO
                'pros' => ['£139.99, the cheapest bike in this comparison', '2,421 ratings at 4.5 stars', 'Dual-triangle frame with a quiet multi-slot belt drive', 'Free app classes alongside Kinomap and Zwift support', 'Fits riders from 142cm to 188cm with 12-month warranty'], // PONTOS POSITIVOS
                'contras' => ['15 lbs flywheel is 6.8kg, less than half the 15kg rivals publish', 'Specification says Friction on a bike sold as magnetic resistance', 'Capacity given as 136kg in a bullet and 350 Pounds in the table', 'Sold under a second ASIN at £189.99 with the same review pool'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Toputure 5-in-1 Folding Exercise Bike, 6kg Flywheel, 16 Levels',          // NOME (ENCURTADO)
                'price' => '£179.99',                                                               // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 652,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81nfn0-aohL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Toputure 5-in-1 folding exercise bike in green',                     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FXGGMRB2?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Publishes a 6kg flywheel rather than hiding it, which is honest and also tells you exactly what a folding bike gives up against a 30kg fixed frame.', // TEXTO CURTO (CARD)
                'body' => "Six kilograms. Toputure prints it in the second bullet, next to the 16 resistance levels, and it is the most useful disclosure on this page after the weight limits. A folding exercise bike cannot carry a 15kg flywheel — the whole point is that it weighs 19.1kg and goes behind a door — and saying so plainly lets you decide whether that trade is the right one. It usually is, for a flat or a spare room that is also a spare room. Expect the stroke to feel notchier under load than the fixed-frame bikes above.

For the money it is well equipped: five modes covering upright, racing, recumbent, arm resistance and leg stretching, 16 countable magnetic levels, an ergonomic backrest, Bluetooth to Kinomap, Zwift and FitShow, a 310lb capacity that matches the 140kg in the same bullet, and a 24-month warranty with free replacement parts. Six hundred and fifty-two ratings at 4.7 stars is a good record for a recent model, and 85% pre-assembly means a claimed twenty minute build.

Two marks against, both small. The sub-20dB noise claim is below the 30dB of a quiet room and should be read as marketing. And the specification gives the product dimensions as 104.5D x 56W x 11.5H centimetres — eleven and a half centimetres tall, which is the folded or boxed depth rather than a bike. Wenoker at number three makes the same error with 19cm. Neither affects what arrives, but on a folding bike the folded dimensions are a specification buyers actively want, and publishing them in the assembled field wastes the chance to give it.", // TEXTO SEO LONGO
                'pros' => ['Publishes the 6kg flywheel plainly rather than omitting it', '16 countable resistance levels instead of a percentage', 'Five riding modes including recumbent and arm resistance', 'Capacity consistent at 310lbs and 140kg, and 19.1kg to move and fold', '4.7 stars across 652 ratings with a 24-month warranty'], // PONTOS POSITIVOS
                'contras' => ['6kg flywheel gives a notchier stroke than the 15kg fixed-frame bikes', 'Claims noise below 20dB, under the level of a quiet room', 'Product dimensions given as 11.5cm tall, which is the folded depth', '19.1kg frame will move more than a 30kg one during a standing sprint'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'YYFITT 2-in-1 Folding Exercise Bike, XXL Backrest, 16 Levels, 120kg',     // NOME (ENCURTADO)
                'price' => '£169.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 1874,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61jOaO04+FL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'YYFITT 2-in-1 folding exercise bike with backrest',                  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B086MHC6CX?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Converts between upright and semi-recumbent, which genuinely suits older or less mobile riders, on a listing whose resistance mechanism field reads resistance-bike-trainers.', // TEXTO CURTO (CARD)
                'body' => "The reason to buy this one is the frame geometry. It adjusts between upright and semi-recumbent, and the fifth bullet is honest about who that is for: people who are short or older and find swinging a leg over a spin bike difficult. Add the largest backrest in the comparison, adjustable in both height and angle, and a luminous display readable in a dark room, and this is the bike for someone rebuilding fitness rather than chasing a Zwift time. One thousand eight hundred and seventy-four ratings at 4.5 stars.

Sixteen magnetic levels, two tension arm bands for upper body work, foldable, 21kg, and a 120kg capacity that is stated consistently in the bullet and the specification table. It fits riders with a leg length from 65cm, which is a more useful measure for a recumbent position than overall height and nobody else here gives it.

What it does not do is publish anything about the resistance hardware. There is no flywheel weight, no noise figure, and the resistance mechanism field in the specification table reads resistance-bike-trainers, which is a catalogue slug rather than a value — the field that should say magnetic or friction says the name of the product category. A 120kg limit is also the lowest in this comparison by 20kg, which for a bike aimed at less mobile riders is worth checking against your own figure before ordering. The power source field says Battery Powered, describing the display rather than the bike, as it does on four other listings here.", // TEXTO SEO LONGO
                'pros' => ['Converts between upright and semi-recumbent for less mobile riders', 'Largest backrest here, adjustable in both height and angle', '120kg capacity stated consistently in bullet and specification table', 'Publishes minimum leg length of 65cm, which nobody else does', '1,874 ratings at 4.5 stars with arm resistance bands included'], // PONTOS POSITIVOS
                'contras' => ['Resistance mechanism field reads resistance-bike-trainers, a catalogue slug', 'No flywheel weight and no noise figure published', '120kg capacity is the lowest in this comparison by 20kg', '21kg frame is light for standing work, though that is not its purpose'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Toputure Spin Bike, 15kg Flywheel, 0-100% Resistance, Heart Rate',        // NOME (ENCURTADO)
                'price' => '£189.99',                                                               // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 564,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81mFe0Rf5KL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Toputure spin bike in black and orange with LCD display',            // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0HCZ486Z7?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A 15kg flywheel and a 350lb capacity in the title, and a specification field that gives the maximum user weight as 56 Pounds.', // TEXTO CURTO (CARD)
                'body' => "The hardware here is good. A 15kg gravity flywheel puts it in the heaviest class in this comparison, the magnetic belt drive is quoted at under 25 decibels, the frame is reinforced steel at 25.4kg, there is Bluetooth to Fitshow, Zwift and Kinomap, heart rate on the display, four-way seat and bidirectional handlebar adjustment for riders from 155 to 195cm, and 564 ratings at 4.7 stars. On specification alone it belongs in the top half of this page.

It is at nine because of one field. The title says 350lbs Weight Capacity. The fifth bullet says the reinforced steel frame supports up to 350 lbs. The specification table says Maximum weight recommendation: 56 Pounds. Fifty-six pounds is 25 kilograms. That figure appears in the product summary box Amazon shows above the fold, which is the first place a heavier rider will look and the last place you would want a decimal point or a transposition to land. Nothing else on the page supports it, so the hardware is almost certainly the 350lb machine the rest of the listing describes — but a buyer cannot know that from the listing, and on an exercise bike the load rating is the safety specification rather than a feature.

The AceFuture at number ten has the same class of error with 20 Kilograms, and the Merach at number six disagrees with itself by 23kg. Three of ten. If you buy this, buy it on the 350lb figure and keep the listing screenshot.", // TEXTO SEO LONGO
                'pros' => ['15kg gravity flywheel, the heaviest class in this comparison', 'Under 25dB is a plausible noise figure for a belt drive', '25.4kg reinforced steel frame with heart rate on the display', 'Fitshow, Zwift and Kinomap support with a 24-month warranty', '4.7 stars across 564 ratings'], // PONTOS POSITIVOS
                'contras' => ['Specification table gives the maximum user weight as 56 Pounds', 'Title and bullets say 350lbs, so one of the two is badly wrong', 'Resistance quoted as 0-100% with no maximum stated', 'Power source field says Battery Powered on a pedal-driven bike'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'AceFuture 4-in-1 Folding Exercise Bike, 16 Levels, Arm and Leg Bands',    // NOME (ENCURTADO)
                'price' => '£169.98',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 389,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/614eiRBN1EL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'AceFuture 4-in-1 folding exercise bike in grey',                     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09N23TKXC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Nine bullets describing a three-position folding bike, none of which mentions a user weight limit — and a specification field that gives it as 20 Kilograms.', // TEXTO CURTO (CARD)
                'body' => "The three-position frame is a real idea and better executed than most: upright, semi-recumbent and fully recumbent, with eight seat height settings and two seat angles, a supportive backrest, arm and leg resistance bands, 16 magnetic levels, a large LCD, a tablet holder and a fold-flat design with transport wheels. At 20kg and £169.98 with 389 ratings at 4.5 stars, it is a sensible machine for a small room and a rider who wants options.

Now count the bullets. There are nine, more than any other listing in this comparison, and not one of them states how much the bike can carry. The specification table fills the gap with Maximum weight recommendation: 20 Kilograms. Twenty kilograms is the weight of the bike itself. Whatever the real figure is — and comparable folding bikes here are rated at 120 to 140kg — the listing does not contain it, and the one field that purports to is describing something else entirely.

That is the whole reason it sits last. Nothing else here is objectionable: the resistance is given as 16 countable levels rather than a percentage, the assembly instructions and video are called out, and the fold is genuine. But a buyer over 20 kilograms — which is every adult — cannot establish from this page whether the bike is rated for them, and on the specification that matters most for safety the listing is simply silent in nine places and wrong in the tenth. No flywheel weight and no noise figure are published either.", // TEXTO SEO LONGO
                'pros' => ['Three frame positions: upright, semi-recumbent and fully recumbent', '16 countable magnetic levels rather than a percentage', 'Eight seat height settings and two angles with a supportive backrest', 'Arm and leg resistance bands included for a full-body workout', 'Folds flat with transport wheels at 20kg'], // PONTOS POSITIVOS
                'contras' => ['Specification gives the maximum user weight as 20 Kilograms', 'None of its nine bullets states a weight capacity at all', 'No flywheel weight and no noise figure published', 'Power source field says Battery Powered on a pedal-driven bike'], // PONTOS NEGATIVOS
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
        $this->command?->info("ExerciseBikesSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
