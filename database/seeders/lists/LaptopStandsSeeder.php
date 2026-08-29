<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class LaptopStandsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE SUPORTES DE NOTEBOOK DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=laptop+stand+for+desk&rh=p_36%3A2200-  (55 ASINS EM 60 CARDS)
        // CATEGORIA HOME & OFFICE. TICKET BAIXO, MEDIANA DE £25, MAS VOLUME ALTISSIMO:
        // OS DEZ ESCOLHIDOS SOMAM 80.000 AVALIACOES.
        //
        // ─── ACHADO PRINCIPAL: A ALTURA NAO CHEGA AO OLHO ───
        // 1. TODO SUPORTE DESTA CATEGORIA E VENDIDO COM A MESMA PROMESSA: LEVAR A TELA
        //    "to eye level" E CORRIGIR A POSTURA. A CONTA QUE NINGUEM MOSTRA: A ALTURA
        //    DO OLHO DE UM ADULTO SENTADO E DE 112 A 130 cm DO CHAO, UMA MESA BRITANICA
        //    TEM 72 A 75 cm E A TELA DE UM NOTEBOOK DE 14 POLEGADAS TEM ~19 cm DE ALTURA.
        //    ENTAO A BASE DO NOTEBOOK PRECISA SUBIR ENTRE 21 E 36 cm PARA O TOPO DA TELA
        //    FICAR NO OLHO. A TABELA DO QUE OS ANUNCIOS PUBLICAM:
        //      TOUNEE TELESCOPIC .. 5,3 a 53,3 cm (2.1" a 21") ...... CHEGA
        //      NULAXY PULL-OUT .... 3,0 a 50,8 cm (1.18" a 20") ..... CHEGA
        //      NEXSTAND K2 ........ 15 a 30 cm ...................... CHEGA NO LIMITE
        //      BABACOM ............ 18,7 a 25,1 cm (7.36" a 9.88") .. NO PISO DA FAIXA
        //      BOYATA B08R9V1HNQ .. 10 a 18,9 cm ................... NAO CHEGA
        //      BOYATA B07H89V3BB .. NAO PUBLICA
        //      URMUST ............. NAO PUBLICA
        //      NULAXY B077B9W343 .. NAO PUBLICA
        //      SOUNDANCE .......... NAO PUBLICA (MAS PROMETE "eye-level height")
        //      LAMICALL ........... NAO PUBLICA (MAS PROMETE "elevate to your eye level")
        //    CINCO DOS DEZ NAO PUBLICAM ALTURA NENHUMA, E QUATRO DESSES CINCO VENDEM O
        //    APARELHO PELA ALTURA MESMO ASSIM.
        // 2. O CASO DA BABACOM E O MELHOR ACHADO DA COLETA. O PRIMEIRO BULLET DIZ QUE AS
        //    OITO ALTURAS VAO "from 7.36\" to 9.88\" for the perfect eye level" E QUE "The
        //    maximum height is special for people who want to change to a STANDING
        //    posture". SAO 18,7 a 25,1 cm. O OLHO DE UM ADULTO EM PE ESTA A 150-165 cm
        //    DO CHAO; SOBRE UMA MESA DE 73 cm ISSO EXIGE DE 60 A 75 cm DE ELEVACAO. O
        //    SUPORTE ENTREGA 25,1 cm — FALTA UM FATOR DE TRES. E AS "8 ALTURAS
        //    AJUSTAVEIS" SE DISTRIBUEM EM 6,4 cm DE CURSO TOTAL, OU SEJA 8 MILIMETROS
        //    POR DEGRAU.
        // 3. QUEM PUBLICA A ALTURA PUBLICA EM POLEGADA NUMA LOJA BRITANICA. A NULAXY DIZ
        //    1.18" (QUE E EXATAMENTE 30 mm CONVERTIDO) E A TOUNEE DIZ 2.1". A NEXSTAND,
        //    QUE E DINAMARQUESA, E A UNICA QUE ESCREVE EM CENTIMETRO.
        //
        // ─── ACHADO SECUNDARIO: DUAS MARCAS, UM TEXTO SO ───
        // 4. A BOYATA (19.388 AVALIACOES) E A URMUST (17.568) — AS DUAS MAIS AVALIADAS DA
        //    BUSCA, MARCAS DIFERENTES, PRECOS DIFERENTES — RODAM O MESMO BULLET PALAVRA
        //    POR PALAVRA, INCLUSIVE O ERRO DE GRAMATICA:
        //      "...is made of high quality aluminum, and is designed to easily absorb and
        //       discharge heat. IT STAND ALSO HAS airflow perforations on its surface
        //       which is ideal to cool down your laptop by providing enhanced air flow
        //       (when compared to being placed flat on a table)."
        //    E REPETEM TAMBEM "4 antiskid silicone pads (on the bottom) help to keep the
        //    stand from sliding" E "protective hooks on each arm to prevent your laptop
        //    sliding towards you when in use". SAO 37.000 AVALIACOES EM CIMA DA MESMA
        //    FICHA DE PRODUTO COM DOIS NOMES.
        //
        // ─── OUTROS ACHADOS ───
        // 5. A CAPACIDADE DE CARGA VARIA 2,5x E DOIS NAO PUBLICAM:
        //      NULAXY (OS DOIS) E TOUNEE .. 10 kg (22 lbs)
        //      NEXSTAND ................... 9 kg
        //      BOYATA B08R9V1HNQ / LAMICALL / BABACOM .. 5 kg
        //      URMUST ..................... 4 kg (8.8 lbs)
        //      BOYATA B07H89V3BB E SOUNDANCE .. NAO PUBLICAM
        //    E TANTO A URMUST (4 kg) QUANTO A LAMICALL (5 kg) LISTAM "projectors" ENTRE
        //    OS DISPOSITIVOS COMPATIVEIS. A URMUST ACRESCENTA "Speakers".
        // 6. NOVE DOS DEZ DECLARAM COMPATIBILIDADE COMO "10-17 inches", QUE E A DIAGONAL
        //    DA TELA E NAO DIZ NADA SOBRE O ENCAIXE. A NEXSTAND E A UNICA QUE PUBLICA A
        //    MEDIDA QUE REALMENTE DECIDE SE CABE: "front edge less than 2.2cm". E TAMBEM
        //    A UNICA QUE PUBLICA O PROPRIO PESO (234 g).
        // 7. A SOUNDANCE SE CONTRADIZ: O TITULO DIZ 10-17" E O CAMPO DE COMPATIBILIDADE
        //    DA TABELA PARA EM 15.6". ELA TAMBEM SE VENDE POR SER "heavier than normal
        //    laptop risers made of lightweight aluminum alloy" SEM NUNCA DIZER DE QUE
        //    MATERIAL E, NEM QUANTO PESA.
        // 8. A BOYATA B07H89V3BB — A MAIS BEM AVALIADA DA CATEGORIA, 4.8 EM 19.388 — TEM
        //    UMA TABELA DE ESPECIFICACAO COM CINCO CAMPOS: MARCA, FORMATO, DISPOSITIVOS,
        //    COR E "Compatible phone models: All". NENHUMA DIMENSAO, NENHUM PESO, NENHUMA
        //    CARGA. O BULLET DELA AINDA CHAMA O SUPORTE DE "this tablet" E ESCREVE
        //    "improving user productively".
        // 9. A NULAXY B077B9W343 PROMETE "a 100% wobble-free typing experience". A NULAXY
        //    PULL-OUT DESCREVE O MATERIAL COMO "space grade aluminum", QUE NAO E UMA
        //    ESPECIFICACAO DE LIGA. A BOYATA B08R9V1HNQ TITULA UM BULLET COMO "EXCELLENT
        //    HEAT DIAAIPATION".
        // 10. POOL DE AVALIACAO COMPARTILHADO EM DUAS MARCAS: A NULAXY B077B9W343 (£22.99)
        //    E A B0953DZ3WX (£21.30) EXIBEM AS MESMAS 15.446; A LAMICALL B0FJ8CSGBB
        //    (£39.99) E A B0FJ8CJ2QT (£45.99) EXIBEM AS MESMAS 2.250, £6 DE DIFERENCA.
        // 11. TODOS OS DEZ VENDEM DISSIPACAO DE CALOR. NENHUM PUBLICA UM NUMERO — NEM
        //    GRAU, NEM PERCENTUAL, NEM CONDICAO DE TESTE. E A COMPARACAO E SEMPRE CONTRA
        //    "being placed flat on a table", QUE E O PIOR CASO POSSIVEL.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: A BUSCA E MUITO POLUIDA — SAIRAM MESAS DE PE (DESKTRONIC £399.99), BASES
        // DE MONITOR, BRACOS ARTICULADOS (HUANUO, WALI, VIVO, REDBAT), COOLERS (HAVIT
        // COM 39.9K), CONVERSORES SIT-STAND (BONTEC), MESAS DOBRAVEIS DE SOFA E SUPORTES
        // VERTICAIS DE TAMPA FECHADA (UGREEN COM 11.6K), QUE NAO ELEVAM TELA NENHUMA.
        // FORA TAMBEM OS ASINS IRMAOS DA NULAXY E DA LAMICALL, MANTIDO O MAIS BARATO DE
        // CADA POOL, E TUDO COM MENOS DE 1.500 AVALIACOES.
        // DENTRO: NOTA DE 4.6 A 4.8, PRECO DE £21.54 A £49.99, OITO MARCAS.
        //
        // FOCUS KEYWORD: best laptop stand
        // VARIACOES TRABALHADAS: laptop stand uk / adjustable laptop stand /
        // laptop riser / ergonomic laptop stand / laptop stand for desk /
        // foldable laptop stand / sit stand laptop stand / aluminium laptop stand /
        // laptop stand weight capacity / laptop stand height / laptop stand eye level
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home-office',                 // SLUG DA CATEGORIA (URL)
            'name' => 'Home & Office',               // NOME EXIBIDO
            'description' => 'Kit to make working from home more comfortable and productive, ranked for UK buyers.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-laptop-stand',                                          // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Laptop Stand 2026: 10 Ranked on Height They Actually Reach', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Laptop Stand 2026: Top 10 Ranked and Compared',    // TITLE DA ABA/GOOGLE (49 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best laptop stand options on Amazon by the lift they publish and the load they carry, comparing risers from £21.54 to £49.99.', // META DESCRIPTION (140 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best laptop stand',                                 // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Every laptop riser on Amazon is sold on the same promise — raise the screen to eye level and fix your posture — and half of them will not tell you how high they go. Here is the arithmetic they skip. A seated adult's eyes sit 112 to 130cm off the floor, a British desk is 72 to 75cm, and a 14-inch laptop screen is about 19cm tall, so the base of the machine needs to rise between 21 and 36cm before the top of the screen reaches your eyes. Five of the ten stands in this comparison publish no height figure at all, and four of those five still advertise eye-level positioning. The clearest case is Babacom, which states eight adjustable heights running from 7.36 to 9.88 inches — 18.7 to 25.1cm — and then says the maximum is for people who want to switch to standing. Standing eye level needs roughly 60 to 75cm of lift. It offers 25.1, and its eight settings are spread across 6.4cm, which is 8mm a step. Below we rank the best laptop stand options on Amazon in August 2026 on published lift, published load, and whether the listing was written about the product at all.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "The best laptop stand for you depends on one decision you should make before reading any listing: are you raising the screen so you can use an external keyboard, or are you propping the laptop up and typing on it anyway? If it is the first, you need 21 to 36cm of lift and only three stands here publish a range that reaches it, all of them telescopic. If it is the second, height barely matters — you cannot type on a keyboard at eye level — and what you actually want is 10 to 15cm of tilt, a stable base and enough load capacity for your machine, which the cheap folding risers do perfectly well. Crucially, check the load rating against the laptop you own: the figures here run from 4kg to 10kg, a 2.5-fold spread, and two listings do not publish one. And treat the cooling claims as decoration. All ten advertise heat dissipation, not one attaches a number to it, and every comparison is made against the laptop lying flat on a desk, which is the worst case available. Where a manufacturer publishes the lift in centimetres, the load in kilograms and the constraint that actually decides fit, it has measured its own product — and that is rarer in this category than the review counts suggest.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                          // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 04:00:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'NEXSTAND K2 Foldable Laptop Stand, 8 Heights 15-30cm, 9kg Load',          // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£24.99',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 3022,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51PLOyFBg9L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best laptop stand',                                                  // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01HHYQBB8?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best laptop stand here because it is the only listing that publishes everything: 15 to 30cm of lift in centimetres, 9kg load, 234g weight and the fit limit that actually matters.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Four numbers put this at number one, and each of them is missing from most rivals. The lift is 15 to 30cm across eight settings, published in centimetres rather than converted inches. The load capacity is 9kg. The stand itself weighs 234 grams. And the compatibility is given as any laptop 10 inches or larger with a front edge under 2.2cm thick — which is the dimension that decides whether a machine actually sits in the grips. Nine other listings here state compatibility as 10 to 17 inches, a screen diagonal that tells you nothing about fit.

Thirty centimetres of lift lands inside the 21 to 36cm range you need to bring the top of a 14-inch screen to seated eye level, so the ergonomic claim is one the product can meet. Eight steps across 15cm is 1.9cm a setting, which is a useful increment rather than a rounding error. At 234g it folds flat and genuinely lives in a laptop bag, which is the argument for a hinged plastic stand over a machined aluminium one.

The trade-offs are honest ones. It is glass-fibre reinforced plastic rather than metal, so it looks utilitarian next to the anodised aluminium risers, and there is some flex if you type hard directly on the laptop. Three thousand and twenty-two ratings at 4.6 stars is a solid record but the shallowest of the top four here. And the minimum height of 15cm means it does not collapse to a low tilt, so it is a raise-the-screen-and-use-a-keyboard stand rather than a typing wedge.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Publishes lift as 15 to 30cm in centimetres, over eight settings', 'The only listing that gives the real fit limit: front edge under 2.2cm', 'Load capacity stated as 9kg and its own weight as 234g', 'Folds to 234g and fits a laptop bag, the most portable stand here', '30cm reaches seated eye level for a 14-inch screen'], // PONTOS POSITIVOS
                'contras' => ['Reinforced plastic rather than aluminium, with some flex when typing', 'Minimum height of 15cm, so it will not sit as a low typing wedge', '3,022 ratings is the thinnest sample among the top four here', 'Utilitarian looks beside the machined aluminium alternatives'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'BoYata Aluminium Adjustable Laptop Stand, 0-90 Degree, Foldable',         // NOME (ENCURTADO)
                'price' => '£32.99',                                                                // PRECO
                'rating' => 4.8,                                                                    // NOTA
                'reviews_count' => 19388,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51Ow4vD7ZhS._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'BoYata aluminium adjustable laptop stand in silver',                 // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07H89V3BB?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest rated stand in the category at 4.8 across 19,388 ratings, and a specification table with five fields, none of which is a measurement.', // TEXTO CURTO (CARD)
                'body' => "Nineteen thousand three hundred and eighty-eight ratings at 4.8 stars is the strongest combination of depth and average anywhere in this comparison, and it is not close. Whatever the listing does or does not say, a great many people have bought this and been happy. The Z-type aluminium frame adjusts continuously from 0 to 90 degrees rather than through fixed steps, four silicone pads grip the desk, and hooks on each arm stop the laptop sliding towards you — which on a steeply angled stand is the failure that matters.

Then you look for a number. The specification table has five fields: brand, form factor, compatible devices, colour, and compatible phone models, which reads \"All\". There is no height, no maximum load, no weight and no footprint anywhere on the page. For a product whose third bullet says the design is good for adjusting an ideal height, that is the one omission you would not expect. It is also, at £32.99, the second most expensive fixed-angle riser here.

Two smaller things worth seeing. The second bullet describes the aluminium construction as allowing \"this tablet to bring the best in style\", and the third promises to improve \"user productively\" — copy that has not been read back. And the cooling bullet is identical, word for word including the phrase \"It stand also has airflow perforations on its surface\", to the one on the urmust stand at number seven. Two different brands with 37,000 ratings between them are running the same product description with the same grammatical error.", // TEXTO SEO LONGO
                'pros' => ['4.8 stars across 19,388 ratings, the best record in the category', 'Continuous 0 to 90 degree adjustment rather than fixed steps', 'Aluminium frame with four silicone desk pads and arm hooks', 'Folds flat for storage and travel', 'Widely stocked and long established, so support is straightforward'], // PONTOS POSITIVOS
                'contras' => ['No height, load, weight or footprint published anywhere on the listing', 'Cooling bullet is word for word identical to the urmust listing', 'Bullet copy refers to the stand as a tablet and mentions user productively', '£32.99 for a folding riser with no published specification'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'tounee Telescopic Laptop Stand, 360 Swivel Base, 5.3-53.3cm, 10kg',       // NOME (ENCURTADO)
                'price' => '£49.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 4178,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61BilDos9dL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'tounee telescopic laptop stand with 360 degree swivel base in grey', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09Y8B81F7?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The tallest stand in this comparison and one of only two whose published range genuinely supports standing work: 2.1 to 21 inches, or 5.3 to 53.3cm.', // TEXTO CURTO (CARD)
                'body' => "Fifty-three centimetres of lift is what a sit-to-stand claim actually requires, and this is the only stand here that publishes it. The telescopic column runs from 5.3cm at its lowest to 53.3cm at full extension, so it works as a flat typing wedge in the morning and, with a laptop on top of a 73cm desk, puts the screen at roughly 1.3 metres for standing work in the afternoon. That is a genuine sit-stand converter in a footprint the size of a dinner plate.

The base rotates through 360 degrees on a turntable, which is more useful than it sounds when you need to show a colleague something without moving the whole setup, and two pivot joints rather than one make the arm noticeably more rigid at height. Load capacity is published at 10kg, joint highest here, and the build is aluminium alloy with a large weighted base.

Two reservations. At £49.99 this is the most expensive stand in the comparison, roughly double the median, though it is doing a job the £22 risers cannot attempt. And the listing has the compatible-phone-models field filled with a 400-character list of iPhone and iPad models, from the iPhone X to the iPad Pro 12.9, for a laptop stand — the sort of catalogue padding that suggests the specification fields were populated in bulk rather than for this product. Four thousand one hundred and seventy-eight ratings at 4.6 stars is a good record.", // TEXTO SEO LONGO
                'pros' => ['5.3 to 53.3cm of lift, the tallest published range in this comparison', 'Genuinely supports standing work, not just a raised seated position', '360 degree swivel base and twin pivot joints for rigidity at height', '10kg load capacity, joint highest here', '4,178 ratings at 4.6 stars'], // PONTOS POSITIVOS
                'contras' => ['£49.99, the most expensive stand in this comparison', 'Height published in inches rather than centimetres on a UK listing', 'Compatible phone models field is a 400-character list of iPhones', 'Large base takes more desk space than a folding riser'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Nulaxy Pull-Out Height Adjustable Laptop Stand, 3-50.8cm, 10kg',          // NOME (ENCURTADO)
                'price' => '£40.99',                                                                // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 6140,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51jdrPkjZvL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Nulaxy pull-out height adjustable laptop stand in grey',             // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07YTHMM3B?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Nine pounds cheaper than the tounee and reaching almost as high — 1.18 to 20 inches — with the same 10kg load and its own weight published at 1.25kg.', // TEXTO CURTO (CARD)
                'body' => "This does the same job as the telescopic stand above it for nine pounds less and with more ratings behind it: 6,140 at 4.7 stars, the second deepest sample here. The pull-out column runs from 1.18 to 20 inches, which is 3.0 to 50.8cm, so it drops almost completely flat and extends to just under standing height. Load capacity is 10kg, joint highest in this comparison, and Nulaxy publishes the stand's own weight at 1.25kg — one of only two listings here that does.

At its lowest setting it is a nearly flat wedge you can type on directly; at 30cm it puts a 14-inch screen at seated eye level; at full extension it is a standing converter. Very few stands cover that whole span, and the unique aluminium shaft with a carry hole means it still folds and travels.

Where it loses to the tounee is the base. There is no swivel, and a single-column pull-out with a smaller footprint is less settled at full height than a twin-pivot arm on a weighted turntable — at 50cm you will feel it move if you knock the desk. The height is also published only in inches, and the copy describes the material as \"space grade aluminum\", which is not a grade of anything; the useful figure, that it weighs 1.25kg and holds 10kg, is right beside it and would have done the job on its own.", // TEXTO SEO LONGO
                'pros' => ['3.0 to 50.8cm of lift, from a flat wedge to standing height', '10kg load capacity with its own weight published at 1.25kg', '6,140 ratings at 4.7 stars, the second deepest sample here', 'Nine pounds cheaper than the only taller stand in this comparison', 'Folds with a carry hole for travel'], // PONTOS POSITIVOS
                'contras' => ['No swivel base, and less settled than a twin-pivot arm at full height', 'Height published in inches on a UK listing', 'Material described as space grade aluminium, which is not a grade', 'Single column means a smaller footprint and more movement at 50cm'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'BoYata Height Adjustable Laptop Riser, 10-18.9cm, 5kg, 10-17 Inch',       // NOME (ENCURTADO)
                'price' => '£29.99',                                                                // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 8369,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71PEHOM7IaL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'BoYata height adjustable laptop riser in black with U-shaped base',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08R9V1HNQ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Publishes its lift honestly at 10 to 18.9cm, which is why you can see it falls short of eye level — the other BoYata on this page simply does not say.', // TEXTO CURTO (CARD)
                'body' => "Eight thousand three hundred and sixty-nine ratings at 4.7 stars, and a listing that tells you what the product does. The height adjusts continuously from 10 to 18.9cm using a threaded collar on the support rod, the two baseplates are 3mm metal, and the load capacity is 5kg. The U-shaped upper structure reduces contact with the laptop base for airflow, and there are rubber pads top and bottom plus hooks at the front edge.

Being told the range is what lets you judge it. Eighteen point nine centimetres is short of the 21 to 36cm that brings a 14-inch screen to seated eye level, so this raises the machine to a comfortable typing angle rather than to your eyes. That is a perfectly good thing for a stand to do — most people type on the laptop rather than adding an external keyboard, and you cannot type at eye level — but it is not the ergonomic transformation the third bullet describes. The stand costs £29.99, and the telescopic models that do reach eye level are £40.99 and £49.99.

Two small notes. The listing spells one of its own bullet headings \"EXCELLENT HEAT DIAAIPATION\". And the compatibility is given as 10 to 17 inches in the title while the fifth bullet says the same, which is fine, but a 17-inch laptop on a 5kg limit and a single central rod is optimistic — a 17-inch gaming machine can weigh 3.5kg before you touch it, and the leverage on a single column is considerable.", // TEXTO SEO LONGO
                'pros' => ['Publishes the lift honestly as 10 to 18.9cm, continuously adjustable', 'Load capacity stated at 5kg with 3mm metal baseplates', '8,369 ratings at 4.7 stars', 'U-shaped upper structure for airflow with front hooks and rubber pads', 'Threaded collar holds the height without a locking pin'], // PONTOS POSITIVOS
                'contras' => ['18.9cm maximum falls short of seated eye level for a 14-inch screen', '5kg limit is optimistic for the 17-inch laptops it advertises', 'Single central column gives noticeable leverage with a heavy machine', 'One bullet heading is misspelled as HEAT DIAAIPATION'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Nulaxy Ergonomic Dual Foldable Laptop Stand, 10kg Load, 10-16 Inch',      // NOME (ENCURTADO)
                'price' => '£22.99',                                                                // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 15446,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61jtA8kHq9L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Nulaxy ergonomic dual foldable laptop stand in silver',              // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B077B9W343?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best value folding riser here: 15,446 ratings at 4.7 and a 10kg load capacity, which is double what most stands at this price will carry.', // TEXTO CURTO (CARD)
                'body' => "Twenty-two pounds ninety-nine for a dual-rod aluminium riser rated to 10kg, with 15,446 ratings at 4.7 stars behind it, is the strongest value proposition in the comparison. The load figure matters more than it looks: the urmust at number seven costs two pounds more and carries 4kg, and both the Lamicall and the Babacom stop at 5kg. If you have a 16-inch MacBook Pro, a chunky gaming laptop, or you type firmly on the machine itself, that headroom is the difference between a stand that stays put and one that creeps.

The dual-support rod is the reason it can. Most folding risers at this price use a single hinge and put all the load through one joint; two rods spread it and cut the side-to-side movement that makes cheap stands feel disposable. The geometric heat-vent panel and the anti-slip silicone are standard for the category, and it folds completely flat.

What is missing is the height. Nulaxy publishes no lift figure at all — not in the title, the bullets or the specification — while the first bullet promises to elevate your laptop to the perfect eye level. On the evidence of the photographs this is a low-to-mid riser in the same class as the BoYata above it, so read the eye-level claim the same way. The second bullet also promises \"a 100% wobble-free typing experience\", which is an absolute nobody can deliver on a folding stand. And this ASIN shares its 15,446 ratings with a near-identical Nulaxy listing selling at £21.30.", // TEXTO SEO LONGO
                'pros' => ['10kg load capacity, double what most stands at this price carry', '15,446 ratings at 4.7 stars for £22.99', 'Dual support rods spread the load and cut side-to-side movement', 'Folds completely flat for a bag', 'Compatibility stated as 10 to 16 inches rather than an optimistic 17'], // PONTOS POSITIVOS
                'contras' => ['No height figure published despite an eye-level claim in bullet one', 'Promises a 100% wobble-free typing experience, which is an absolute', 'Shares its 15,446 ratings with a near-identical listing at £21.30', 'No published weight or folded dimensions'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'urmust Adjustable Laptop Stand, 0-90 Degree, 4kg Load, 10-15.6 Inch',     // NOME (ENCURTADO)
                'price' => '£24.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 17568,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Mb0gXdTTL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'urmust adjustable aluminium laptop stand in black',                  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B081YXWDTQ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The second most reviewed stand in the category, running the same product copy as the most reviewed one — and carrying the lowest load limit here at 4kg.', // TEXTO CURTO (CARD)
                'body' => "Seventeen thousand five hundred and sixty-eight ratings at 4.6 stars makes this the second most reviewed laptop stand in the search, and it is a perfectly serviceable aluminium riser: continuous adjustment from 0 to 90 degrees, four anti-skid silicone pads, protective hooks on each arm, a handle hole for carrying, and a folded profile that goes in a bag.

The thing worth knowing is what it shares with number two. Its cooling bullet is identical, word for word, to BoYata's — \"is made of high quality aluminum, and is designed to easily absorb and discharge heat. It stand also has airflow perforations on its surface which is ideal to cool down your laptop\" — including the broken grammar in the second sentence. So are the silicone-pad and protective-hook sentences. Two brands, two ASINs, two prices, 37,000 ratings between them, and one piece of product copy. That does not make either stand bad, but it tells you that neither description was written about the specific object in the box.

The specification is where it falls behind. The load limit is 8.8 lbs, or 4kg, the lowest in this comparison and less than half the Nulaxy at number six for two pounds more. A 16-inch MacBook Pro plus its case is already halfway there. Compatibility stops at 15.6 inches, no height is published anywhere, the form factor field reads \"Tower\" for a flat folding riser, and the compatible-devices field lists projectors and speakers on a stand rated for four kilograms.", // TEXTO SEO LONGO
                'pros' => ['17,568 ratings at 4.6 stars, the second deepest sample in the category', 'Continuous 0 to 90 degree adjustment in aluminium', 'Publishes its load limit, which two stands here do not', 'Handle hole and flat fold make it genuinely portable', 'Four anti-skid pads and arm hooks at £24.99'], // PONTOS POSITIVOS
                'contras' => ['4kg load limit, the lowest in this comparison', 'Cooling and stability bullets are word for word identical to BoYata', 'No height published despite selling on posture improvement', 'Lists projectors and speakers as compatible on a 4kg stand'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Lamicall 360 Degree Rotatable Aluminium Laptop Stand, 5kg, 10-17.3 Inch', // NOME (ENCURTADO)
                'price' => '£39.99',                                                                // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 2250,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71u98d+y0AL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Lamicall rotatable aluminium laptop stand in silver',                // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FJ8CSGBB?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A well made all-metal rotating riser, but £39.99 buys no published height, a 5kg limit, and a review pool shared with a £45.99 version of itself.', // TEXTO CURTO (CARD)
                'body' => "The rotating mechanism is the reason to consider this. It is all-metal rather than a plastic bearing, and the movement is smooth enough that you can turn the screen towards a colleague one-handed without lifting anything — on a shared desk or in a client meeting that is a real convenience, and Lamicall builds it better than the cheaper rotating stands here. The base is enlarged and weighted aluminium, the edges are finished properly, and at 4.7 stars across 2,250 ratings the reception is good.

At £39.99 it needs to be. That is the third highest price in this comparison, and for it you get a 5kg load limit, half what the £22.99 Nulaxy carries, and no height figure of any kind — the fourth bullet promises to \"elevate the laptop screen to your eye level\" and never says by how much. It also advertises compatibility to 17.3 inches on that 5kg limit, and lists projectors among the compatible devices.

One more thing to check before buying. This ASIN shows 2,250 ratings at 4.7 stars, and so does a second Lamicall listing for the same stand priced at £45.99. Six pounds apart, one review pool. Whichever you are shown first, look for the other before you order — and given that the £22.99 Nulaxy at number six has nearly seven times the ratings and twice the load capacity, the rotation is the only thing here you are paying the premium for.", // TEXTO SEO LONGO
                'pros' => ['All-metal rotating mechanism rather than a plastic bearing', 'Smooth one-handed 360 degree rotation for shared desks', 'Enlarged weighted aluminium base with properly finished edges', '4.7 stars across 2,250 ratings', 'Load capacity published at 5kg'], // PONTOS POSITIVOS
                'contras' => ['£39.99 with no height figure published anywhere', '5kg limit is half the £22.99 stand at number six', 'Shares its 2,250 ratings with a £45.99 listing for the same stand', 'Advertises 17.3-inch compatibility and projectors on a 5kg limit'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'SOUNDANCE 360 Rotating Laptop Stand, Adjustable Riser, 10-17 Inch',       // NOME (ENCURTADO)
                'price' => '£21.54',                                                                // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 2467,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71yKG3UWqUL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'SOUNDANCE 360 rotating laptop stand in pink',                        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BYN249P7?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest stand here at £21.54 with a rotating base, but the title says it fits 17-inch laptops and its own specification table stops at 15.6.', // TEXTO CURTO (CARD)
                'body' => "A 360-degree rotating base for £21.54 is genuinely good value — the Lamicall at number eight charges £18.45 more for the same function — and 2,467 ratings at 4.7 stars say it works. The base is deliberately heavy, and SOUNDANCE makes a fair point that a weightier stand wobbles less than the featherweight aluminium ones; the upgraded joint screws hold the angle rather than drifting, which is the usual failure on cheap adjustable risers. The hollow upper section gives the same airflow as everything else here.

Three gaps, though, and they are the three that matter. The title says the stand fits laptops from 10 to 17 inches. The compatible-devices field in its own specification table lists sizes ending at 15.6 inches. Those cannot both be right, and it is a 17-inch owner who needs to know. There is no load capacity published anywhere, which on a stand whose whole selling point is being heavy and stable is an odd omission — the two figures go together. And there is no height either, while the fourth bullet promises \"the eye-level height of your laptop prevents neck pain\".

The material is the fourth. The listing says it is made of high-quality metal and that it is heavier than risers made of lightweight aluminium alloy, without ever saying which metal or how heavy. Steel, zinc alloy and thicker aluminium all behave differently on a desk and cost different amounts to make, and this is the one field where you would find out.", // TEXTO SEO LONGO
                'pros' => ['£21.54, the cheapest stand in this comparison, with a rotating base', '2,467 ratings at 4.7 stars', 'Deliberately heavy base resists the wobble that afflicts light risers', 'Upgraded joint screws hold the set angle rather than drifting', 'Costs £18.45 less than the other rotating stand here'], // PONTOS POSITIVOS
                'contras' => ['Title says 10 to 17 inches, the specification table stops at 15.6', 'No load capacity published on a stand sold on its stability', 'No height published despite an explicit eye-level claim', 'Material described only as high-quality metal, never named'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Babacom 8-Height Aluminium Laptop Riser, 18.7-25.1cm, 5kg, 10-16 Inch',   // NOME (ENCURTADO)
                'price' => '£23.99',                                                                // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 1749,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61binaLLreL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Babacom 8-height adjustable aluminium laptop riser in black',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BKSJC6VS?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Eight height settings spread across 6.4cm — eight millimetres a step — and the top one is described as the setting for switching to a standing posture.', // TEXTO CURTO (CARD)
                'body' => "Credit first: Babacom publishes its height range, which puts it ahead of half this page. The first bullet states eight settings running from 7.36 to 9.88 inches, or 18.7 to 25.1cm, with a safety lock on the lifting mechanism, 3mm metal baseplates, an 11 lb (5kg) capacity and a 15-degree tilt the company says it tested repeatedly. It is a well-built little riser and 1,749 ratings at 4.7 stars agree.

The problem is what the same bullet claims for that range. Eight settings across 18.7 to 25.1cm is 6.4cm of total travel — 8mm per step, which is about the thickness of a pound coin and a half. And the sentence that follows reads: the maximum height is special for people who want to change to a standing posture because of the discomfort caused by long sitting in the office. An adult standing has their eyes 150 to 165cm off the floor. Put a laptop on a 73cm desk and you need somewhere between 60 and 75cm of lift to work standing up. This stand offers 25.1cm at full extension, which is short by a factor of about three, and there is no version of standing at a desk in which a 25cm riser is the answer.

Read the range for what it is and the product is fine. Eighteen point seven to 25.1cm is a good seated typing height for a laptop you use directly, better than the 10 to 18.9cm BoYata for a taller person, and the eight-step lock is more repeatable than a friction collar. It is the standing claim, and the eight settings inside six centimetres, that belong in this article.", // TEXTO SEO LONGO
                'pros' => ['Publishes the full height range, which five stands here do not', '18.7 to 25.1cm suits a taller person typing directly on the laptop', 'Safety lock on the lifting mechanism and 3mm metal baseplates', '15-degree tilt with load capacity published at 5kg', '1,749 ratings at 4.7 stars for £23.99'], // PONTOS POSITIVOS
                'contras' => ['Maximum of 25.1cm sold as a setting for standing work, which needs 60 to 75cm', 'Eight height settings spread across 6.4cm, or 8mm per step', 'Height published in inches on a UK listing', '1,749 ratings is the thinnest sample in this comparison'], // PONTOS NEGATIVOS
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
        $this->command?->info("LaptopStandsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
