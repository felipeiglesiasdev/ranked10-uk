<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class DogClippersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE MAQUINAS DE TOSA DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCAS: /s?k=dog+clippers+grooming&rh=p_36%3A2500-  (14 ASINS)
        //         /s?k=pet+hair+clippers+quiet+cordless&rh=p_36%3A2500-  (16 ASINS)
        // A SEGUNDA BUSCA FOI NECESSARIA PORQUE A ONEISALL OCUPA 8 DOS 18 RESULTADOS DA
        // PRIMEIRA — E O MESMO PADRAO DE MONOCULTURA DA DREO EM AQUECEDOR E DA TAPO EM
        // CAMERA. CATEGORIA PET SUPPLIES.
        //
        // ─── ACHADO PRINCIPAL: O TAMANHO DO PENTE, QUE E O CORTE ───
        // 1. UMA MAQUINA DE TOSA FAZ UMA COISA: DEIXA O PELO NUM COMPRIMENTO. QUEM DECIDE
        //    ESSE COMPRIMENTO E O JOGO DE PENTES, E CINCO DAS DEZ NAO PUBLICAM UM UNICO
        //    TAMANHO. A TABELA:
        //      FUZZYFIX ......... 8 PENTES DE 1/8" A 1" ...... 3,2 a 25,4 mm
        //      WAHL ............. FAIXA DE 3 A 25 mm + ALAVANCA DE 0,8 A 1,8 mm
        //      ONEISALL 75K ..... 6 PENTES: 3/6/9/12/15/18 mm
        //      UNIBONO .......... 4 PENTES: 3/6/9/12 mm + ESTREITO + DETALHE
        //      ONEISALL GATO .... 4 GUIAS: 3/6/9/12 mm
        //      GOOAD B0C5M5YV71 . SO O BOTAO DE AJUSTE 0,8 a 2,0 mm, SEM PENTE
        //      GOOAD B0C4DVRVP5 . "4 PCS limit combs", SEM TAMANHO
        //      ONEISALL B0BB6G4JMD .. "8 Guide Combs", SEM TAMANHO
        //      ONEISALL B0D54DTTCB .. "versatile sizes", SEM TAMANHO
        //      ONEISALL B09QFRN3D5 .. NAO MENCIONA PENTE NENHUM
        //    AS DUAS QUE CHEGAM A 25 mm SAO AS DUAS MAIS CARAS. UM GOLDEN OU UM CAVAPOO NO
        //    INVERNO PRECISA DE 20 mm PARA CIMA, E A MAIORIA DOS KITS PARA EM 12 mm — OU
        //    SEJA, NAO DA PARA APARAR, SO PARA RASPAR.
        //
        // ─── ACHADO SECUNDARIO: MAIS RPM E PIOR, NAO MELHOR ───
        // 2. O ANUNCIO MAIS BARATO DA LISTA ANUNCIA MAIS ROTACAO QUE O MAIS CARO:
        //      UNIBONO (£29.99) .......... 7.000 RPM
        //      ONEISALL (£37.99 E £44.59)  6.800 RPM
        //      FUZZYFIX (£129.98) ........ 2.500 / 3.000 RPM, MOTOR BRUSHLESS
        //      GOOAD, WAHL, ONEISALL 75K . NAO PUBLICAM
        //    MOTOR BRUSHLESS TROCA VELOCIDADE POR TORQUE, E TORQUE E O QUE ATRAVESSA UM
        //    PELO EMBOLADO. ROTACAO ALTA E O QUE UM MOTOR PEQUENO E BARATO CONSEGUE
        //    ENTREGAR FACIL. O NUMERO GRANDE E O NUMERO DE QUEM TEM MENOS MAQUINA.
        // 3. O MESMO VALE PARA O RUIDO, E DE NOVO AO CONTRARIO DO QUE SE ESPERA:
        //      FUZZYFIX (£129.98) ... 65 dB  ← O MAIS ALTO E O MAIS CARO
        //      GOOAD (x2) ........... < 60 dB
        //      ONEISALL (x3) E UNIBONO  55 dB
        //      ONEISALL B0BB6G4JMD .. < 50 dB
        //      ONEISALL 75K ......... "reduces noise by 17%", SEM NUMERO E SEM BASE
        //      WAHL ................. NAO PUBLICA
        //    AO CONTRARIO DOS AQUECEDORES E DOS PURIFICADORES, ESSES NUMEROS SAO TODOS
        //    PLAUSIVEIS — 50 A 65 dB E O QUE UMA TOSADORA FAZ MESMO. O PROBLEMA E OUTRO:
        //    A ONEISALL PUBLICA 55 dB EM TRES MODELOS, MENOS DE 50 NUM QUARTO, TODOS COM
        //    O MESMO SELO "Low Noise", E NO CAMPEAO DE VENDAS DELA (75.453 AVALIACOES)
        //    TROCA O DECIBEL POR UMA PORCENTAGEM SEM REFERENCIA.
        //
        // ─── OUTROS ACHADOS ───
        // 4. A ONEISALL DE 75.453 AVALIACOES DECLARA DOIS MATERIAIS DE LAMINA NA MESMA
        //    TABELA: "Material: ceramic blade" E "Blade material: Stainless Steel".
        //    CERAMICA CONTRA INOX E A DECISAO DE COMPRA CENTRAL DA CATEGORIA — CERAMICA
        //    ESQUENTA MENOS, INOX DURA MAIS — E OS DOIS CAMPOS DA MESMA PAGINA DISCORDAM.
        // 5. TRES ASINS DA ONEISALL EXIBEM AS MESMAS 24.280 AVALIACOES: B09QFRN3D5
        //    (£37.99), B0D541RBCN (£38.82) E B0BB6G4JMD (£52.99). SAO £15,00 DE INTERVALO
        //    NUM UNICO POOL. A GOOAD REPETE COM B0C5M5YV71 E B0BM4GQV73 (5.255 CADA).
        // 6. A WAHL DECLARA "Item dimensions L x W x H: 6 x 6 x 6 millimetres" — UM CUBO
        //    DE SEIS MILIMETROS — E "Material: Pet" NO CAMPO DE MATERIAL. E, IRONICAMENTE,
        //    E A FICHA COM A MELHOR INFORMACAO UTIL DA LISTA: FAIXA DE CORTE EM MILIMETRO,
        //    LAMINA DE ACO ALTO CARBONO AUTO-AFIANTE E OPCAO DE USO COM FIO.
        // 7. A FUZZYFIX PUBLICA OS PENTES EM POLEGADA FRACIONARIA (1/8, 1/4, 3/8, 1/2,
        //    5/8, 3/4, 7/8, 1) NUMA LOJA BRITANICA ONDE TODO O RESTO DA CATEGORIA USA
        //    MILIMETRO. E O TITULO DIZ "Dog Clippers Professional" ENQUANTO DOIS BULLETS
        //    CHAMAM O APARELHO DE "pet grooming SCISSORS" — E TOSADORA, NAO TESOURA.
        // 8. A GOOAD B0C5M5YV71 E A UNICA DAS DEZ QUE PUBLICA A CONTAGEM DE DENTES DA
        //    LAMINA: "33-tooth titanium blade... surpassing the standard 24 or 26-tooth
        //    blades". MAIS DENTE SIGNIFICA CORTE MAIS FINO E MENOS PUXAO, E E UMA
        //    ESPECIFICACAO REAL QUE NINGUEM MAIS OFERECE.
        // 9. DUAS FICHAS DECLARAM "Target audience: Unisex-Adults" NUMA MAQUINA DE TOSAR
        //    CACHORRO (ONEISALL B09QFRN3D5 E GOOAD B0C4DVRVP5). A ONEISALL DE 75K ACERTA:
        //    "Pet Owners (Dogs, Cats)".
        // 10. A ONEISALL DE 75K DECLARA "Item dimensions: 10 x 8 x 2 centimetres" — E A
        //    CAIXA, NAO A MAQUINA; OS OUTROS MODELOS DA MESMA MARCA DECLARAM 18 x 5 x 4,
        //    QUE E O TAMANHO DE UMA TOSADORA DE VERDADE.
        // 11. A CLASSIFICACAO DE AGUA VARIA E QUASE NINGUEM COMPARA: IPX7 NA ONEISALL
        //    B09QFRN3D5, B0BB6G4JMD E B0D54DTTCB E NA UNIBONO; IPX6 NA ONEISALL DE GATO;
        //    NENHUMA NA WAHL, NA FUZZYFIX E NAS DUAS GOOAD. IPX7 AGUENTA IMERSAO, IPX6 SO
        //    JATO — E LAVAR A CABECA DE CORTE DEBAIXO DA TORNEIRA E O ARGUMENTO DE VENDA.
        // 12. A BUSCA E POLUIDA POR MAQUINA DE CORTAR CABELO HUMANO: A WAHL COLOUR PRO
        //    "Family Friendly Hair Clipper" (B09QL7KWCK, 3.800 AVALIACOES, £37.99) APARECE
        //    NA BUSCA DE TOSADORA E TEM NOME QUASE IDENTICO AO MODELO PET DA MESMA MARCA.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: A WAHL DE CABELO HUMANO E OS DEMAIS CORTADORES HUMANOS; O ASIN IRMAO DA
        // GOOAD E O TERCEIRO DA ONEISALL (MANTIDOS DOIS DO POOL DE 24.280 PORQUE OS £15
        // DE INTERVALO SAO UM DOS ACHADOS); MINE PROFESSIONAL A5 (£199.00, SEM AVALIACAO
        // VISIVEL), GIMARS (178), E TUDO ABAIXO DE 500.
        // ONEISALL APARECE CINCO VEZES PORQUE OCUPA QUASE METADE DA BUSCA E PORQUE AS
        // CONTRADICOES INTERNAS DELA SAO METADE DA MATERIA.
        // DENTRO: NOTA DE 4.2 A 4.5, PRECO DE £25.49 A £129.98, CINCO MARCAS.
        //
        // FOCUS KEYWORD: best dog clippers
        // VARIACOES TRABALHADAS: dog clippers uk / pet grooming kit /
        // cordless dog clippers / quiet dog clippers / dog clippers for thick coats /
        // dog grooming clippers for matted hair / cat clippers /
        // professional dog clippers / dog clipper guide comb sizes / clipper blade mm
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'pet-supplies',               // SLUG DA CATEGORIA (URL)
            'name' => 'Pet Supplies',               // NOME EXIBIDO
            'description' => 'Everything your furry friends need, ranked by quality, comfort and value.', // DESCRICAO (MESMO TEXTO JA CADASTRADO, PARA NAO TROCAR A CADA SEED)
        ];

        $article = [
            'slug' => 'best-dog-clippers',                                          // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Dog Clippers 2026: 10 Ranked on Comb Sizes and Torque', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Dog Clippers 2026: Top 10 Ranked and Compared',    // TITLE DA ABA/GOOGLE (50 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best dog clippers on Amazon by the guide comb lengths they publish and the motor speed they boast about, comparing kits from £25.49 to £129.98.', // META DESCRIPTION (158 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best dog clippers',                                 // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "A clipper does one thing: it leaves the coat at a length, and the guide combs decide which length. Five of the ten kits in this comparison do not publish a single comb size. Two of them talk about their combs at length — metal rather than plastic, eight of them, versatile sizes — without ever naming a millimetre. That matters because most of these kits stop at 12mm, and a cavapoo or a golden retriever going into a British winter wants 20mm or more; a 12mm kit does not trim a dog, it shaves one. Only the two most expensive here reach 25mm. Meanwhile the number the cheap end shouts about is motor speed, and it runs backwards: the £29.99 clipper advertises 7,000 RPM, the £37.99 one 6,800, and the £129.98 brushless professional runs at 2,500 to 3,000. Brushless motors trade speed for torque, and torque is what gets through a matted coat — high RPM is what a small cheap motor finds easy. Below we rank the best dog clippers on Amazon in August 2026 on the two numbers that decide the haircut, and flag the listings that leave them out.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Choosing the best dog clippers starts with your dog's coat, not the motor. Work out the length you actually want to leave — 3 to 6mm is a summer shave, 9 to 12mm is a tidy-up, 18 to 25mm is a winter trim on a doodle or a retriever — then buy a kit that publishes a comb at that size. If the listing will not name its comb lengths, and five here do not, you are buying a haircut you cannot specify. Then look at the motor the other way round from how it is sold: 6,800 or 7,000 RPM from a brushed motor is a fast blade with little behind it, while 2,500 to 3,000 RPM from a brushless one is slower and will not stall in a matted patch. Crucially, decide between ceramic and stainless blades before you order, because ceramic runs cooler against the skin and stainless lasts longer — and one listing here, the single best-selling clipper in the category, names both in two different fields of the same specification table. Finally, check the waterproof rating if you intend to rinse the head: IPX7 survives immersion, IPX6 only survives a jet, and three of these ten publish neither.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                          // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 11:15:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'oneisall Dog Clippers Low Noise, 6 Combs 3-18mm, 380g, Grooming Kit',     // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£29.99',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 75453,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71ntBUTlBLL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best dog clippers',                                                  // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01HRSZRXM?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best dog clippers here on evidence by an enormous margin — 75,453 ratings — and one of only five listings that names every comb size it ships with.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Seventy-five thousand four hundred and fifty-three ratings is the largest body of evidence behind any product in any category we have ranked, and it costs £29.99. At 4.4 stars that is not a rave, but a decade of British dog owners have bought this and most of them were satisfied, which on a tool you use on a nervous animal counts for a great deal.

It also does the thing this article is about. The second bullet lists all six guide combs by size: 3, 6, 9, 12, 15 and 18mm. That is a real range — 3mm for paws and sanitary trims, 18mm for a winter length on a curly coat — and five listings on this page name no comb size at all. At 380g it is among the lightest here, which matters over a forty-minute groom, the head detaches for rinsing, and it runs while charging, which nothing else on this page offers.

Two things to know. The specification table names two different blade materials in two adjacent fields: Material says ceramic blade and Blade material says Stainless Steel. Ceramic runs cooler on the skin and stainless holds an edge longer, so that is the central buying decision in this category left unanswered on the best-selling listing in it. And the noise claim is a percentage rather than a figure — a silent motor that reduces noise by 17%, with no baseline given, on a page where four rival oneisall models all quote decibels. The item dimensions of 10 x 8 x 2cm describe the box, not the clipper.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['75,453 ratings, the largest sample of any product we have ranked', 'Names all six comb sizes: 3, 6, 9, 12, 15 and 18mm', '380g, among the lightest in this comparison for long grooms', 'Runs while charging, which nothing else on this page does', 'Detachable head rinses clean, at £29.99'], // PONTOS POSITIVOS
                'contras' => ['Specification names ceramic blade in one field and stainless steel in another', 'Noise given as 17% quieter with no baseline and no decibel figure', 'No RPM published and no waterproof rating', 'Item dimensions describe the box rather than the clipper'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Wahl Colour Pro Pet Clipper, 3-25mm Combs, Corded or Cordless',           // NOME (ENCURTADO)
                'price' => '£49.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 669,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71HP5zXEdPL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Wahl Colour Pro rechargeable dog and pet clipper in black',          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BGJ8QBRC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Reaches 25mm where most of this page stops at 12, adds a 0.8 to 1.8mm taper lever, and is the only clipper here you can plug in when the battery dies.', // TEXTO CURTO (CARD)
                'body' => "Wahl has been making clippers since 1919 and it shows in which numbers the listing bothers to give you. The comb set covers 3mm to 25mm, the widest published range on this page bar one, and there is a taper lever on the side that moves the blade continuously between 0.8mm and 1.8mm — so you can blend rather than step between comb sizes, which is the difference between a haircut and a set of terraces. The blades are precision-ground high carbon steel and self-sharpening.

The feature nobody else here has is the cord. Cordless gives 120 minutes, and when that runs out you plug it in and carry on, rather than abandoning a half-clipped dog for two hours. On a big double-coated breed that is not a luxury.

Two reservations, and one is just funny. The specification table gives the item dimensions as 6 x 6 x 6 millimetres and the material as Pet, neither of which describes anything. More substantively, there is no decibel figure, no RPM and no waterproof rating anywhere, so on three specifications this page does report, Wahl says nothing — the bullets are about cutting lengths and coat types instead, which is a defensible choice but leaves gaps. And 669 ratings at 4.3 stars is the second thinnest sample and the second lowest average here, which for the oldest brand in the category is a modest showing at £49.99.", // TEXTO SEO LONGO
                'pros' => ['Comb range of 3 to 25mm, wide enough for a winter trim on a doodle', 'Taper lever blends continuously from 0.8 to 1.8mm', 'The only clipper here that runs corded when the battery dies', 'Self-sharpening precision-ground high carbon steel blades', '120 minutes cordless from a brand making clippers since 1919'], // PONTOS POSITIVOS
                'contras' => ['No decibel figure, no RPM and no waterproof rating published', 'Specification gives item dimensions as 6 x 6 x 6 millimetres', 'Material field on the specification table reads Pet', '669 ratings at 4.3, the second lowest average in this comparison'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'FuzzyFix Professional Dog Clippers, Brushless 2500-3000 RPM, 8 Metal Combs', // NOME (ENCURTADO)
                'price' => '£129.98',                                                               // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 514,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Bblhu5ARL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'FuzzyFix professional cordless dog clippers in blue',                // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DDTP8NBQ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The professional one, and the proof that the RPM race runs backwards: a brushless motor at 2,500 to 3,000 RPM against 7,000 from clippers costing a quarter as much.', // TEXTO CURTO (CARD)
                'body' => "This listing is the reason the intro of this article says what it says. FuzzyFix is the most expensive clipper here at £129.98, it is the one aimed at professional groomers, and it runs at 2,500 RPM on its low speed and 3,000 on its high — less than half the 6,800 and 7,000 RPM that the £29.99 and £37.99 clippers advertise as a headline. That is not a weaker machine. It is a brushless motor trading speed for torque, and the second half of the first bullet says so plainly: when it meets thicker hair, the cutting power intelligently increases. A brushed motor at 7,000 RPM stalls in a matted patch; this one bites.

The comb set is the best here too: eight metal guides from 1/8 inch to a full inch, which is 3.2mm to 25.4mm, plus a #10 blade, 55ml of blade oil and a storage box. At 386g with an ergonomic body it is built for a groomer doing several dogs a day, and the battery is quoted at four hours continuous.

Three marks against. Four point two stars across 514 ratings is the lowest average and one of the thinner samples in this comparison, which at £129.98 is a real hesitation. The combs are published in fractional inches on a British store where the entire rest of the category uses millimetres. And two bullets call the product pet grooming scissors when it is a clipper — the honest 65dB noise figure, the highest and most credible on this page, deserved better copy around it.", // TEXTO SEO LONGO
                'pros' => ['Brushless motor at 2,500 and 3,000 RPM, torque rather than speed', 'Eight metal combs from 3.2mm to 25.4mm, the fullest set here', 'Publishes 65dB, the highest and most credible noise figure on this page', '386g ergonomic body with four hours of continuous runtime', 'Includes a #10 blade, blade oil and a storage box'], // PONTOS POSITIVOS
                'contras' => ['4.2 stars across 514 ratings, the lowest average in this comparison', '£129.98, more than four times the cheapest kit here', 'Comb sizes published in fractional inches on a UK listing', 'Two bullets describe the clipper as pet grooming scissors'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'oneisall Dog Clippers with Metal Combs, 6800 RPM, 55dB, IPX7',            // NOME (ENCURTADO)
                'price' => '£44.59',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 3131,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Eu0nNjdfL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'oneisall dog clippers with metal guide combs in silver',             // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D54DTTCB?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Metal guide combs instead of plastic is a genuine upgrade that stops combs snapping and marking the coat — and the listing never says what sizes they are.', // TEXTO CURTO (CARD)
                'body' => "The first bullet makes a good argument. Plastic guide combs deform under pressure, snap at the teeth and leave tell-tale tracks in the coat; metal ones hold their shape and last. Anyone who has had a comb flex mid-stroke and gouge a line down a dog's back knows this is real, and metal combs at £44.59 is fair value. There is 6,800 RPM, a 2,000mAh battery giving four hours, IPX7 so the whole head goes under the tap, 55dB, and 3,131 ratings at 4.4 stars.

The listing then spends five bullets on those combs — durable, precise, gentle on sensitive skin, versatile sizes adapting to diverse hair lengths — and never states a single size. Not one millimetre figure appears anywhere on the page. You are being sold combs on the strength of what they are made of while the thing they determine, the length of the haircut, is left blank.

Two smaller notes. The target audience field is unusually useful for once, naming actual breeds: poodle, bichon frise, cocker spaniel, pomeranian, samoyed, golden retriever — those are exactly the coats a home groomer struggles with, and it is more helpful than thick hair. And at 576g this is on the heavier side of the page; the oneisall at number one is 380g and the Wahl is 258g, which over a long groom on a wriggling dog is a difference you feel in your wrist.", // TEXTO SEO LONGO
                'pros' => ['Metal guide combs that will not deform, snap or mark the coat', '6,800 RPM with a 2,000mAh battery giving four hours cordless', 'IPX7 rating, so the head can be rinsed under running water', 'Names the breeds it suits rather than just saying thick hair', '3,131 ratings at 4.4 stars'], // PONTOS POSITIVOS
                'contras' => ['Five bullets about the combs and not one comb size in millimetres', '576g, noticeably heavier than the 380g and 258g options here', '6,800 RPM from a brushed motor will stall in a matted patch', '£44.59 is £14.60 more than the same brand best-seller'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Gooad Pet Grooming Clippers with Paw Trimmer, 33-Tooth Titanium Blade',   // NOME (ENCURTADO)
                'price' => '£25.49',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 5255,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/7115opuzq+L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Gooad pet grooming clippers with paw trimmer in blue',               // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C5M5YV71?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest kit here at £25.49, and the only listing of ten that publishes the blade tooth count — 33 against the 24 or 26 it says most rivals use.', // TEXTO CURTO (CARD)
                'body' => "Twenty-five pounds forty-nine is the lowest price in this comparison and 5,255 ratings at 4.4 stars is the third deepest sample, which is already a strong combination. What earns it a place above better-known names is the third bullet: a 33-tooth titanium blade, explicitly compared against the standard 24 or 26-tooth blades most pet clippers use. Nobody else on this page publishes a tooth count at all, and it is a genuine specification — more teeth means each one takes less hair, which means a finer finish and less pulling on a dog that hates being groomed.

The kit is two blades, wide for body work and narrow for paws, face and ears, on a 2,200mAh battery giving 250 minutes from a three hour charge — the longest runtime here. There is a 0.8 to 2.0mm fine tuning knob for close work and a three-speed motor, and the noise is quoted at under 60dB, which is a plausible number rather than a flattering one.

The gap is the same as elsewhere. No guide comb sizes are published — only the fine tuning knob range, which covers 0.8 to 2.0mm and is a shaving length, not a trimming one. So while the blade specification is the best disclosed on this page, what length the kit will actually leave a coat at is not stated. The blade material fields also read titanium and ceramic together, describing the fixed and moving blades respectively, which is correct but easy to misread as one blade being both.", // TEXTO SEO LONGO
                'pros' => ['The only listing here that publishes a blade tooth count, at 33', '£25.49, the cheapest kit in this comparison', '250 minutes of runtime from a 2,200mAh battery, the longest here', 'Two blades: wide for the body, narrow for paws, face and ears', '5,255 ratings at 4.4 stars with a plausible sub-60dB claim'], // PONTOS POSITIVOS
                'contras' => ['No guide comb sizes published anywhere', 'Fine tuning knob covers 0.8 to 2.0mm, a shaving rather than trimming range', 'No RPM figure and no waterproof rating', 'Sold under a second Gooad ASIN with the same 5,255 ratings'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'oneisall Dog Clippers for Thick Coats, 6800 RPM, 55dB, 240 Minutes',      // NOME (ENCURTADO)
                'price' => '£37.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 24280,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71H1fgRM3BL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'oneisall dog clippers for thick coats in silver',                    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09QFRN3D5?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The second deepest sample here at 24,280 ratings and the highest rating of the oneisall range, with steel blades for matted coats and no comb sizes at all.', // TEXTO CURTO (CARD)
                'body' => "Twenty-four thousand two hundred and eighty ratings at 4.5 stars is the second deepest sample in this comparison and the best average oneisall achieves anywhere in it. The pitch is specific and sensible: stainless steel metal blades rather than ceramic, because on thick and matted hair a harder blade is firmer and faster and pulls less. That is the right argument for the right coat, and 6,800 RPM with a 2,000mAh battery gives 240 minutes cordless from a two hour charge.

The build is well specified for £37.99. IPX7 means the whole body goes under the tap, there is a travel lock so it cannot start in a bag, USB charging, and at 311g it is the second lightest clipper on this page. Fifty-five decibels is published rather than implied.

Two things. Not one guide comb is mentioned in any of the five bullets, so a kit sold for thick coats does not tell you what lengths it can leave — and the oneisall at number one, from the same brand and £8 cheaper, lists all six of its combs by size. And this ASIN shares its 24,280 ratings with two other oneisall listings, one at £38.82 and one at £52.99, a fifteen pound spread across a single pool; this is the cheapest of the three, which is the reason it is the one listed here. The target audience field also reads Unisex-Adults, on a dog clipper.", // TEXTO SEO LONGO
                'pros' => ['24,280 ratings at 4.5, the best oneisall average in this comparison', 'Stainless steel blades, firmer than ceramic on matted coats', '240 minutes cordless with IPX7 and a travel lock', '311g, the second lightest clipper on this page', 'Publishes 55dB and 6,800 RPM rather than adjectives'], // PONTOS POSITIVOS
                'contras' => ['No guide combs mentioned anywhere in the listing', 'Shares its 24,280 ratings with listings at £38.82 and £52.99', '6,800 RPM from a brushed motor is speed rather than torque', 'Target audience field reads Unisex-Adults on a dog clipper'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'oneisall Cat Clippers for Matted Fur, 5 Speed, 55dB, LCD, IPX6',          // NOME (ENCURTADO)
                'price' => '£30.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 5508,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71AxAw-qOhL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'oneisall cat clippers for matted fur in green',                      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09SCM6RW1?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only clipper here designed around cats rather than dogs, with five speeds and an LCD charge readout — and the only one rated IPX6 rather than IPX7.', // TEXTO CURTO (CARD)
                'body' => "Cats are not small dogs. Their skin is thinner and looser, they tolerate noise and vibration far worse, and a matted long-haired cat is one of the harder grooming jobs there is. This is the only clipper in the comparison built around that: five speed settings so you can start slow on a nervous animal and step up, 55dB, and a blade geometry oneisall describes as designed for matted fur specifically. Five thousand five hundred and eight ratings at 4.5 stars.

It also publishes what it ships — four guards at 3, 6, 9 and 12mm, plus scissors, comb, brush and USB charger — which puts it in the honest half of this page, and the LCD showing remaining charge is more useful than it sounds when you are halfway through a cat that has finally stopped struggling.

Two limitations. The waterproof rating is IPX6, not the IPX7 that three other oneisall models here carry: IPX6 survives a jet of water and IPX7 survives immersion, so you can rinse this under a running tap but should not drop the head in a bowl. And the comb set stops at 12mm, which for a cat is fine — nobody leaves a cat at 18mm — but means this is not a substitute for a dog kit if you have both. Two hours of runtime from a 1.5 hour charge is also the shortest on this page, against four hours from several rivals.", // TEXTO SEO LONGO
                'pros' => ['Built for cats specifically, with five speeds for a nervous animal', 'Publishes all four guard sizes: 3, 6, 9 and 12mm', 'LCD shows remaining charge rather than a single indicator light', '5,508 ratings at 4.5 stars', '55dB published, with scissors, comb and brush in the kit'], // PONTOS POSITIVOS
                'contras' => ['IPX6 rather than the IPX7 on three sibling models', 'Two hours of runtime, the shortest in this comparison', 'Combs stop at 12mm, so not a substitute for a dog kit', 'No RPM figure published'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'unibono Pet Grooming Kit, 7000 RPM, 4 Heads with Nail Grinder, IPX7',     // NOME (ENCURTADO)
                'price' => '£29.99',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 3708,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71WWJz6OIIL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'unibono pet grooming clipper kit in white with detachable heads',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F8HMLK3J?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Four interchangeable heads including a nail grinder make it the most complete kit at £29.99, and it advertises the highest RPM on the page, which is not the compliment it sounds.', // TEXTO CURTO (CARD)
                'body' => "Four cutter heads on one body — standard, narrow, detail and a nail grinder — swapped with one pull and one push. That is the most versatile arrangement in this comparison for the money, and the nail grinder is the piece that matters: nail trimming is the job most owners outsource because clippers risk the quick, and a grinder takes the tip down gradually instead. Add 40mm titanium ceramic blades, IPX7, six guide combs with the four standard ones named at 3, 6, 9 and 12mm, a spare standard blade, scissors and a steel comb, and £29.99 buys a lot of kit.

The headline specification is the problem, or rather what it implies. Seven thousand RPM is the highest figure on this page, higher than the 6,800 of two oneisall models and more than double the 3,000 of the £129.98 brushless professional at number three. Speed from a small brushed motor is cheap to achieve and is not what cuts through a mat; torque is. Read 7,000 RPM as a marketing number rather than a capability.

Two other notes. Four point two stars is the joint lowest average in this comparison across a substantial 3,708 ratings, which is a settled verdict rather than noise. And the noise claim is written as about 55dp, a typo for dB, on the bullet where the figure is meant to reassure you about a frightened animal.", // TEXTO SEO LONGO
                'pros' => ['Four interchangeable heads including a genuine nail grinder', 'Names its four standard comb sizes: 3, 6, 9 and 12mm', 'IPX7 waterproof with a spare standard blade included', 'Titanium ceramic 40mm blades at £29.99', '3,708 ratings with scissors and a steel comb in the kit'], // PONTOS POSITIVOS
                'contras' => ['7,000 RPM is the highest here and from a brushed motor, which is speed not torque', '4.2 stars, the joint lowest average in this comparison', 'Noise figure written as 55dp rather than dB', 'Combs stop at 12mm, too short for a winter trim on a large breed'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'oneisall 3-in-1 Dog Clippers and Paw Trimmer, Under 50dB, 8 Combs',       // NOME (ENCURTADO)
                'price' => '£52.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 24280,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71TkVI6AlZL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'oneisall 3-in-1 dog clippers and paw trimmer kit',                   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BB6G4JMD?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The same 24,280 review pool as the £37.99 model at number six, for fifteen pounds more, with eight guide combs whose sizes are never stated.', // TEXTO CURTO (CARD)
                'body' => "What you get for the extra fifteen pounds over the oneisall at number six is a second device: a dedicated paw trimmer with two blades for feet, eyes, ears and face, alongside the full-size clipper. That is a real addition — the areas around a dog's eyes and pads are where a full-size clipper is clumsy and where most home grooms go wrong — and the trimmer has its own two hour battery against the clipper's four.

It is also the quietest claim on this page at under 50dB, described as quieter than a normal conversation, which is accurate and is a genuine point in its favour for an anxious dog. IPX7, a travel lock, and 736g for the whole kit.

The reason it sits at nine is arithmetic. This ASIN displays 24,280 ratings at 4.5 stars, and so does the £37.99 listing at number six, and so does a third oneisall at £38.82. One pool, three prices, fifteen pounds between the cheapest and this one, and no way from the reviews to tell which product those 24,280 people actually bought. The sixth bullet then promises eight guide combs for customised lengths and the following sentence describes them only as multiple plastic guide combs — no sizes, and plastic, on the same page where the same brand at number four sells metal combs as the upgrade worth paying for.", // TEXTO SEO LONGO
                'pros' => ['Includes a separate two-blade paw trimmer for feet, eyes, ears and face', 'Under 50dB, the quietest published claim in this comparison', 'Four hours on the clipper and two on the trimmer from 2,000mAh', 'IPX7 waterproof with a travel lock on both devices', '4.5 stars, the joint highest rating here'], // PONTOS POSITIVOS
                'contras' => ['Shares its 24,280 ratings with listings at £37.99 and £38.82', 'Eight guide combs promised with no sizes given anywhere', 'Combs are plastic, which the same brand elsewhere calls the weak point', '736g for the kit, the heaviest in this comparison'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Gooad Dog Clippers Grooming Kit with Paw Trimmer and Nail Grinder',       // NOME (ENCURTADO)
                'price' => '£37.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 1143,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71RGMtYbyRL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Gooad dog clippers grooming kit in gold with paw trimmer',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C4DVRVP5?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A complete eleven-piece kit with clipper, paw trimmer and nail grinder, on a listing that lists every item in the box and not one comb size.', // TEXTO CURTO (CARD)
                'body' => "The first bullet is an inventory: one clipper, one paw trimmer, one small blade, one nail grinder head, four limit combs, one steel comb, scissors, two chargers, a cleaning brush and blade oil. For £37.99 that is the most items of any kit here, and unlike most three-in-one sets it includes the oil, which is the consumable that decides whether the blade still cuts in year two. The battery is 2,200mAh giving three hours on the clipper and two on the trimmer.

The blades are the same titanium fixed and ceramic moving combination as the cheaper Gooad at number five, which is a good pairing — titanium holds an edge and ceramic runs cool — and the noise is quoted at under 60dB, another plausible figure rather than a flattering one. One thousand one hundred and forty-three ratings at 4.4 stars.

Two things put it last. That opening inventory counts four limit combs and never says what sizes they are, so the most itemised listing on the page still omits the one measurement that determines the haircut — and the sibling Gooad at number five, which costs £12.50 less and has nearly five times the ratings, does not publish them either. At 721g the kit is the second heaviest here, and the target audience field reads Unisex-Adults, which is the second listing in this comparison to describe a dog clipper as being for adults of unspecified gender.", // TEXTO SEO LONGO
                'pros' => ['Eleven-piece kit including clipper, paw trimmer, nail grinder and blade oil', 'Titanium fixed and ceramic moving blades, a sound pairing', '2,200mAh giving three hours on the clipper and two on the trimmer', 'Under 60dB, a plausible rather than flattering noise claim', '1,143 ratings at 4.4 stars'], // PONTOS POSITIVOS
                'contras' => ['Lists four limit combs and never states a single size', '£12.50 more than the sibling Gooad with a fifth of the ratings', '721g, the second heaviest kit in this comparison', 'Target audience field reads Unisex-Adults on a dog clipper'], // PONTOS NEGATIVOS
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
        $this->command?->info("DogClippersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
