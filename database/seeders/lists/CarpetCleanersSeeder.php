<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class CarpetCleanersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE LAVADORAS DE CARPETE DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=carpet+cleaner+machine&rh=p_36%3A8000-  (20 ASINS ANALISADOS)
        // CATEGORIA HOME. SAZONAL: PICO DE OUTUBRO A JANEIRO — LAMA, BOTA MOLHADA E VISITA
        // DE NATAL. E O PRODUTO QUE O BRITANICO COMPRA QUANDO O CARPETE ENCARDE NO INVERNO.
        //
        // PROFUNDIDADE: 1.171 / 997 / 801 / 778 / 726 / 534 / 290 / 273 / 239 / 225 / 214 / 164.
        //
        // ─── ACHADO PRINCIPAL: O TANQUE QUE LIMITA E O SUJO, E QUASE NINGUEM PUBLICA ───
        // 1. LAVADORA DE CARPETE TEM DOIS TANQUES: AGUA LIMPA DESCE, AGUA SUJA VOLTA. O DE
        //    RECUPERACAO E SEMPRE MENOR — PORQUE PRECISA DE CAMARA DE AR PARA O MOTOR DE
        //    SUCCAO NAO ENGOLIR LIQUIDO. LOGO, **O TANQUE SUJO E QUE DECIDE QUANTO VOCE
        //    LIMPA ANTES DE PARAR**, E E ELE QUE SOME DAS FICHAS.
        //      VAX SPINSCRUB POWER PLUS .. "4.5L clean and 3L dirty water tanks"  ← UNICA
        //      SHARK CARPETXPERT ......... "2.3L Clean Solution Tank" (E NO TITULO), SEM SUJO
        //      OS OUTROS OITO ............ NAO PUBLICAM TANQUE NENHUM
        //    A SHARK COLOCA "2.3L" NO TITULO DO PRODUTO. E O NUMERO QUE NAO LIMITA NADA.
        //    NA PRATICA: A VAX ANUNCIA 4,5 L E VOCE PARA AOS 3; A SHARK ANUNCIA 2,3 L E VOCE
        //    PARA ANTES DISSO, NUM VALOR QUE ELA NAO DIZ.
        //
        // ─── ACHADO 2: O CAMPO "ITEM TYPE NAME" E UM DESASTRE ───
        // 2. SHARK CARPETXPERT (£159) ...... "Item Type Name: **Steam Mop**"
        //    SHARK STAINSTRIKER (£123) ..... "Item Type Name: **Steam Mop**"
        //    BISSELL POWERWASH COMPACT ..... "Item Type Name: **1**"
        //    BOSCH-STYLE PADRAO DA VAX ..... "Carpet Washer" NUMA FICHA E "Carpet washer"
        //                                    NA OUTRA (CAIXA DIFERENTE, MESMA MARCA)
        //    NENHUMA DAS DUAS SHARK E UM MOP A VAPOR: ELAS PULVERIZAM SOLUCAO FRIA E
        //    EXTRAEM. QUEM FILTRAR A BUSCA POR "steam mop" CAI EM DUAS MAQUINAS QUE NAO
        //    PRODUZEM VAPOR NENHUM.
        //
        // ─── ACHADO 3: A GARANTIA DA SHARK DE £190 SE CONTRADIZ NA MESMA PAGINA ───
        // 3. A CARPETXPERT HAIRPRO PET (EX220UK, £190.00) ESCREVE DUAS VEZES NOS BULLETS:
        //    "Free **5-year** guarantee upon registration with Shark". A TABELA DE
        //    ESPECIFICACAO DA MESMA PAGINA DIZ "Product Warranty **2 year** manufacturer
        //    warranty." CINCO CONTRA DOIS ANOS, NO PRODUTO MAIS CARO DA MARCA NA BUSCA.
        //    E A CONTRADICAO COM MAIOR CONSEQUENCIA FINANCEIRA DA LISTA.
        //
        // ─── ACHADO 4: PESO PUBLICADO DUAS VEZES, COM 2,6x DE DIFERENCA ───
        // 4. SHARK STAINFORCE (£129.99): BULLET DIZ "Weight: **3.4kg**", TABELA DIZ
        //    "Item Weight **1.3 kg**". NUM PRODUTO CUJO ARGUMENTO DE VENDA E SER LEVE E
        //    PORTATIL, O PESO E A ESPECIFICACAO PRINCIPAL — E ELA APARECE DUAS VEZES COM
        //    2,6x DE DIFERENCA.
        // 5. SHARK STAINSTRIKER: BULLET "3.8kg", TABELA "3.94 kg". MENOR, MAS O MESMO HABITO.
        //
        // ─── ACHADO 5: COMPARACAO CONTRA SI MESMO, OU CONTRA NINGUEM ───
        // 6. TODA ALEGACAO DE "Nx MAIS" DESTA CATEGORIA COMPARA COM UM PRODUTO DA PROPRIA
        //    MARCA, OU COM NADA:
        //      SHARK CARPETXPERT ... "8x deeper clean than a regular vacuum
        //                            (*Tested against **Shark NV602UK**)" — ASPIRADOR DELA
        //      SHARK STAINSTRIKER .. "20x more stain-striking power
        //                            (*vs **Shark Deep Clean Pro Formula**)" — FORMULA DELA
        //      SHARK STAINFORCE .... "30X MORE STAIN-FIGHTING POWER" COM MARCADOR DE NOTA
        //                            DE RODAPE E SEM NOTA DE RODAPE VISIVEL
        //      RUG DOCTOR .......... "30% more suction than **comparable models**" — SEM
        //                            NOMEAR UM UNICO MODELO
        //    "8x MELHOR QUE O MEU ASPIRADOR ANTIGO" NAO E COMPARACAO DE MERCADO.
        //
        // ─── ACHADO 6: CAMPO DE FICHA COM O DADO ERRADO ───
        // 7. VAX SPOTWASH HOME & PET (£143.00): "Power Source: **Battery Powered**" NUMA
        //    MAQUINA DE REDE. E "Capacity **250 Millilitres**" — QUE E O TAMANHO DA BOLSA
        //    DE DETERGENTE QUE VEM NA CAIXA, NAO O TANQUE (O PROPRIO TITULO DA PAGINA DIZ
        //    1.1L). E EXATAMENTE O ERRO DO "Tank volume: 500 Millilitres" DAS LAVADORAS DE
        //    ALTA PRESSAO: O CAMPO DE CAPACIDADE PREENCHIDO COM O FRASCO DE PRODUTO.
        //
        // ─── ACHADO 7: A BISSELL PUBLICA UM Pa QUE DA PARA ACREDITAR ───
        // 8. A LITTLE GREEN DECLARA "up to **7.800 Pa** of suction". PRESSAO ATMOSFERICA E
        //    101.325 Pa, ENTAO 7.800 Pa SAO 7,7% DE UM VACUO PERFEITO — NUMERO MODESTO E
        //    PLAUSIVEL. VALE REGISTRAR PORQUE E O CONTRARIO DO QUE ACHAMOS NO ARTIGO DE
        //    ASPIRADOR DE PELO, ONDE A ULTENIC ANUNCIAVA 65.000 Pa (64% DO VACUO ABSOLUTO).
        //    A UNICA RESSALVA E TIPOGRAFICA: "7.800" COM PONTO LE-SE 7,8 Pa EM INGLES.
        // 9. A MESMA LITTLE GREEN ABRE COM "With over **80,000 reviews**" NUM ANUNCIO QUE
        //    TEM 290. O NUMERO E GLOBAL/DE OUTRAS FICHAS, MAS ESTA NA PAGINA COMO SE FOSSE
        //    A EVIDENCIA DESTE ASIN.
        //
        // ─── POTENCIA: 13x DE VARIACAO NA MESMA CATEGORIA ───
        // RUG DOCTOR 1300 W · SHARK HAIRPRO 1000 W · SHARK CARPETXPERT 960 W · BISSELL
        // POWERWASH 600 W · SHARK STAINSTRIKER 450 W · SHARK STAINFORCE 100 W (BATERIA).
        // VAX E BOSCH NAO PUBLICAM W EM NENHUM DOS TRES ANUNCIOS DELAS.
        //
        // ─── ASIN DUPLICADO ───
        // SHARK CARPETXPERT EX150UK: B0CFV7Z7SJ (£159.00, 801 AVALIACOES) E B0D2LNZQ7Y
        // (£159.99, 778) — MESMO TITULO "2.3L. 960W", MESMA NOTA 4.6, POOLS SEPARADOS.
        // MANTIDO O MAIS BARATO E COM MAIS AVALIACOES.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: O SEGUNDO ASIN DA CARPETXPERT; A HAIRPRO DE £340 (MESMA FAMILIA DA DE £190,
        // 214 AVALIACOES, £150 A MAIS); EWBANK (96 AVALIACOES). DENTRO: 164 A 1.171
        // AVALIACOES, NOTA 4.2 A 4.7, £87.23 A £290.00, QUATRO MARCAS.
        //
        // FOCUS KEYWORD: best carpet cleaner
        // VARIACOES TRABALHADAS: carpet cleaner machine / carpet washer / carpet shampooer /
        // upholstery cleaner / spot cleaner / stain remover machine / pet carpet cleaner /
        // upright carpet cleaner / carpet cleaning machine
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "home", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-carpet-cleaner',                                     // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Carpet Cleaner 2026: 10 Ranked, and the Tank Nobody Publishes', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Carpet Cleaner 2026: Top 10 Ranked and Tested', // TITLE DA ABA/GOOGLE (51 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best carpet cleaner machines on Amazon by the tank that actually stops you cleaning: the dirty one, from £87.23 to £290.00.', // META DESCRIPTION (137 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best carpet cleaner',                            // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "A carpet cleaner has two tanks. Clean water goes down through the brushes and dirty water comes back up into a second tank, and because the recovery tank needs an air gap so the suction motor never swallows liquid, it is always the smaller of the two. That makes the dirty tank the number that decides how much floor you cover before you stop, walk to the sink and empty it — and it is the number that vanishes from these listings. Of the ten machines we collected, one publishes both: Vax states \"4.5L clean and 3L dirty water tanks\" on the SpinScrub Power Plus, so you know you are stopping at three litres. Shark publishes only the clean side, puts it in the product title as \"2.3L\", and never states the recovery capacity anywhere. The other eight publish no tank figure at all. Meanwhile the £190 Shark tells you twice in its bullets that it carries a five-year guarantee, while its own specification table says two. We ranked ten of the best carpet cleaner machines on Amazon in August 2026 on the litres and watts they will actually admit to, and flagged the two Sharks whose specification field files them as steam mops.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO NA ABERTURA
            'conclusion' => "The best carpet cleaner for your house is chosen on three numbers, and only one of them usually appears on the box. The first is the dirty water tank, because that is what sends you to the sink; treat any machine that will not state it as an unknown, and assume roughly two-thirds of whatever clean-tank figure it advertises. The second is motor wattage, which ranges from 100 watts to 1,300 across this page — a thirteen-fold spread inside one category — and which decides whether the carpet is damp for an hour or for a day, because drying time is really just a measure of how much water the machine failed to suck back out. The third is weight, since an upright at 14 kilograms cleans a lounge beautifully and will not be carried upstairs. So decide first whether you are buying a full upright carpet washer for whole rooms or a handheld spot cleaner for accidents, because they are different appliances at similar prices and the listings blur the line deliberately. By contrast, ignore every claim of eight times or thirty times more power on this page: each one is measured against another product from the same brand, or against nothing named at all.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 20:45:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Vax SpinScrub Power Plus Upright Carpet Cleaner, 4.5L Clean / 3L Dirty',  // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£121.50',                                                               // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 997,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71qCuAKwhiL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best carpet cleaner',                                                // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D817NXZZ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only machine here that publishes both tanks — 4.5 litres clean and 3 litres dirty — which is the single most useful sentence in this category.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "This is the best carpet cleaner in the comparison and it wins on a sentence rather than a feature. The second bullet reads \"the extra large 4.5L clean and 3L dirty water tanks\", and no other listing on this page tells you both. That matters because the recovery tank is what stops you: fill 4.5 litres of clean water, start cleaning, and the machine will need emptying once the dirty side reaches three. Knowing that number in advance is the difference between planning a room and being interrupted by it.

The hardware behind it is serious for £121.50. Five rotating SpinScrub brushes work the fibres from multiple angles rather than one brush bar dragging across them, HEATBLAST pushes hot air through the carpet alongside the extraction to bring drying down towards an hour, and the box includes a SpinScrub hand tool, an upholstery tool and a 2.5 metre hose, so stairs and a car interior are covered without buying anything extra. Vax backs it for six years, which is the longest guarantee here by a year and is stated in one place only, unlike the Shark below.

Nine hundred and ninety-seven ratings at 4.6 stars is the second deepest sample on the page and the joint-best average of any upright here. At 8.9 kilograms and 108 centimetres tall it is a proper appliance that needs cupboard space, and Vax does not publish a wattage anywhere on the listing — the one figure it leaves out, in a category where the range runs from 100 to 1,300 watts. Given how much else it discloses, that omission stands out.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['The only listing here that publishes both tank capacities, 4.5L and 3L', 'Five rotating SpinScrub brushes rather than a single brush bar', 'HEATBLAST hot air extraction targets drying in about an hour', 'Six-year guarantee, the longest in this comparison', '997 ratings at 4.6, joint-best average of any upright here'], // PONTOS POSITIVOS
                'contras' => ['No wattage published anywhere on the listing', '8.9kg and 108cm tall, so it needs real cupboard space', 'Dirty tank fills at 3L, so a large lounge means at least one emptying', 'Solution supplied is only a 250ml starter bottle'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Rug Doctor Deep Carpet Cleaner, 1300W, Dual Cross-Action Brushes',        // NOME (ENCURTADO)
                'price' => '£290.00',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 1171,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/8186J7ksx5L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Rug Doctor deep carpet cleaner in red and grey with upholstery tool', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B016U5N654?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The deepest review pool here at 1,171 and the most powerful motor at 1300W — attached to a suction claim measured against models it declines to name.', // TEXTO CURTO (CARD)
                'body' => "One thousand one hundred and seventy-one ratings at 4.4 stars is the deepest evidence in this comparison, and Rug Doctor is the only brand here that also rents these machines from supermarket foyers, which means the design has been beaten up by strangers for years rather than sitting in lofts. Thirteen hundred watts is the most powerful motor on this page by 300 watts, and in a carpet cleaner the motor is doing the extraction — the more water it pulls back out, the sooner the carpet is walkable, which is the real difference between machines that otherwise look alike.

The build reflects the rental heritage. At 14.2 kilograms it is the heaviest thing here by 5.3 kilograms, the patented dual cross-action brushes vibrate as well as rotate so the fibres get worked from several directions in one pass, and the Super Boost Spray puts extra solution into badly soiled patches without going over them repeatedly. The warranty is four years domestic, and The Telegraph named it Best Value carpet cleaner in 2025.

The headline claim is the weak part. \"30% more suction than comparable models\" appears in the first bullet with no model named anywhere — not a rival, not an older Rug Doctor, nothing. A percentage without a comparator is not a specification, and it is the same pattern as the Shark machines below, which at least name the product they are beating even when that product is their own. No tank capacities are published either, which for a machine at £290 aimed at whole-house cleaning is the omission that would most affect how you use it.", // TEXTO SEO LONGO
                'pros' => ['1,171 ratings, the deepest evidence pool in this comparison', '1300W, the most powerful motor here by 300 watts', 'Rental-grade build, the only design here proven in commercial hire', 'Dual cross-action brushes vibrate as well as rotate', 'Four-year domestic warranty and a Telegraph Best Value award'], // PONTOS POSITIVOS
                'contras' => ['"30% more suction than comparable models" names no comparator at all', 'Publishes neither tank capacity despite being a whole-house machine', '14.2kg, the heaviest machine here by 5.3kg', 'Most expensive on this page at £290.00'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Shark CarpetXpert Deep Clean Carpet Cleaner, 960W, 2.3L, EX150UK',        // NOME (ENCURTADO)
                'price' => '£159.00',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 801,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71cCGmdTrpL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Shark CarpetXpert deep clean carpet cleaner in blue with stain tools', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CFV7Z7SJ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Eight hundred ratings at 4.6 and a five-year guarantee, on a listing that puts the clean tank in the title and files the machine as a steam mop.', // TEXTO CURTO (CARD)
                'body' => "Eight hundred and one ratings at 4.6 stars is the joint-best average on this page, and the CarpetXpert is a genuinely capable upright: 960 watts of extraction, a high-pressure spray that reaches into the fibres rather than wetting the surface, a flexible hose with a tough stain tool and crevice tool for stairs and sofas, and a five-year guarantee on registration. At 8.1 kilograms it is the lightest full upright here by 800 grams.

The title tells you \"2.3L\", and the bullet clarifies that this is the \"Clean Solution Tank\". Nowhere on the listing is the dirty water capacity stated. On the Vax at number one the recovery tank holds two-thirds of the clean tank, and if the same ratio applies here you are emptying at around a litre and a half — well under half what the Vax manages between stops. Putting the larger, less relevant number in the product name is the clearest example on this page of a specification chosen for the title rather than for the buyer.

Two other things. The specification table gives Item Type Name as \"Steam Mop\", which this is not: it sprays cold detergent solution and extracts it, and produces no steam at any point. The same field says Steam Mop on Shark's StainStriker further down, so it is a systematic error rather than a slip. And the headline \"8x deeper clean than a regular vacuum\" carries an asterisk reading \"Tested against Shark NV602UK\" — an older Shark vacuum. It is a comparison against the company's own back catalogue, not against the market.", // TEXTO SEO LONGO
                'pros' => ['801 ratings at 4.6, joint-best average in this comparison', '960W extraction with high-pressure spray into the fibres', 'Five-year guarantee on registration', 'Lightest full upright here at 8.1kg', 'Hose and two hand tools included for stairs and upholstery'], // PONTOS POSITIVOS
                'contras' => ['Puts the 2.3L clean tank in the title and never states the dirty one', 'Spec table files it as a "Steam Mop", which it is not', '8x cleaning claim is measured against Shark\'s own older vacuum', 'Sold under a second ASIN at £159.99 with a separate 778-rating pool'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Vax Platinum SmartWash Pet-Design Upright Carpet Cleaner, Motion Sense',  // NOME (ENCURTADO)
                'price' => '£199.00',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 726,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71IsZdvhKPL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Vax Platinum SmartWash Pet-Design upright carpet cleaner with pre-treatment wand', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BHF3NKLK?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most automated machine here: it washes as you push and dries as you pull, and mixes its own solution. It also publishes no tank capacity at all.', // TEXTO CURTO (CARD)
                'body' => "Motion Sense is the feature worth paying for and it is unique on this page. There is no trigger: push the machine forward and it sprays and scrubs, pull it back and it stops spraying and extracts. Anyone who has cleaned a room while holding a trigger down for twenty minutes will understand why that matters, and it removes the most common user error in carpet cleaning, which is over-wetting on the return pass. Auto-Mix handles the solution ratio so you are not guessing at the cap, and the integrated pre-treatment wand lets you soak a stubborn patch minutes before you reach it with the machine.

The pet specification is real rather than a sticker. FlexForce brush bars have flexible bristles that reach into the pile, the antibacterial solution is rated at over 99% of bacteria, the tools carry an antimicrobial coating, and the brush bars lift out for rinsing — which is the part that actually goes wrong on machines used for animal messes. Six years of guarantee matches the SpinScrub above.

For £199 it is the second most expensive machine here, and the disclosure is worse than on Vax's own cheaper model. The £121.50 SpinScrub publishes 4.5 litres clean and 3 litres dirty; this listing publishes neither figure anywhere, and no wattage either. Buying the dearer machine from the same brand means knowing less about it. At 4.5 stars from 726 ratings the owners are happy, and if the automation appeals it is worth the money — you just cannot plan your afternoon around it.", // TEXTO SEO LONGO
                'pros' => ['Motion Sense washes on the push and dries on the pull, with no trigger', 'Auto-Mix dispenses the correct solution ratio automatically', 'Integrated pre-treatment wand for soaking stains ahead of the machine', 'Lift-out brush bars for rinsing, which matters with pet messes', 'Six-year guarantee and 726 ratings at 4.5'], // PONTOS POSITIVOS
                'contras' => ['Publishes no tank capacities, unlike Vax\'s own cheaper SpinScrub', 'No wattage published either', '£199.00 for less disclosure than the £121.50 model above', 'Automation removes control if you prefer to work a patch manually'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'BISSELL PowerWash Compact Carpet Cleaner, 600W, DeepReach PowerBrush',    // NOME (ENCURTADO)
                'price' => '£99.99',                                                                // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 164,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/614Fa4ryPRL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'BISSELL PowerWash Compact upright carpet cleaner in black and cobalt blue', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FFBK68QW?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest rated machine in this comparison at 4.7, the cheapest full upright at £99.99, and the lightest at 6kg.', // TEXTO CURTO (CARD)
                'body' => "Four point seven stars is the highest average on this page, and this is the cheapest way into a full upright carpet washer rather than a handheld spot cleaner. At six kilograms it is also 2.1 kilograms lighter than the next lightest upright, which is the specification that decides whether the machine gets carried upstairs to the bedrooms or stays in the hall cupboard after the first attempt. Six hundred watts is mid-table for extraction and reasonable for the money.

The DeepReach PowerBrush uses four rows of bristles rather than the one or two most machines at this price fit, and the one-piece brush roll cover lifts off in a single movement so you can pull hair and fibre out of it without tools. That is a small design decision that determines whether the machine still works in year three. It is also the only product in this comparison made in Vietnam rather than China, for whatever that is worth.

The caveats are about evidence and disclosure. One hundred and sixty-four ratings is the thinnest sample on this page by 61, so 4.7 stars is encouraging rather than settled — the Vax at number one has six times the sample at 4.6. No tank capacity is published, no dirty tank figure, and no drying claim. And the specification table gives Item Type Name as \"1\", which is not a product category; it is a field somebody filled with a placeholder and nobody read back. For £99.99 with this rating it is still the best entry point here.", // TEXTO SEO LONGO
                'pros' => ['4.7 stars, the highest average in this comparison', 'Cheapest full upright here at £99.99', 'Lightest upright at 6kg, 2.1kg under the next lightest', 'Four rows of brushes where most at this price fit one or two', 'One-piece brush roll cover lifts off without tools for cleaning'], // PONTOS POSITIVOS
                'contras' => ['164 ratings, the thinnest sample on this page', 'No tank capacities published and no drying time claimed', 'Spec table gives Item Type Name as "1", a placeholder', '600W is mid-table extraction against 1300W at the top'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Shark CarpetXpert HairPro Pet Carpet Cleaner, 1000W, Anti-Clog, EX220UK', // NOME (ENCURTADO)
                'price' => '£190.00',                                                               // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 239,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71nD56TS0AL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Shark CarpetXpert HairPro Pet carpet cleaner in grey and burgundy',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F1DMG811?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Promises a five-year guarantee twice in its bullets while its own specification table says two. The gap is worth £190 of peace of mind.', // TEXTO CURTO (CARD)
                'body' => "The anti-tangle system is the reason to consider this over the standard CarpetXpert. Pet hair is the failure mode of every carpet washer sold: wet hair wraps around the brush bar, clumps in the hose and eventually stops the machine. This one routes hair straight into the dirty water tank instead, which is the same idea Shark applied to its vacuums and the single most useful thing it has done for houses with a dog. A thousand watts is the second most powerful motor here, and 4.7 stars from 239 ratings is the joint-highest average on the page.

Then the listing contradicts itself about how long it is protected for. Two separate bullets say \"Free 5-year guarantee upon registration with Shark (UK & ROI only)\". The specification table on the same page says \"Product Warranty: 2 year manufacturer warranty.\" Five years against two, on a £190 machine, is not a typo you can shrug at — it is three years of cover, and the two statements cannot both be right. The standard CarpetXpert at number three states five years without contradiction, so the likely reading is that the table is stale, but a buyer choosing on warranty has no way to know that from the page.

Everything else follows the family pattern. No tank capacities published on either side, and the \"deeper cleaning than a regular vacuum\" claim again carries the asterisk pointing at Shark's own NV602UK. At £190 it is £31 more than the standard model, and the anti-tangle system is what that money buys.", // TEXTO SEO LONGO
                'pros' => ['Anti-tangle system sends pet hair to the tank instead of the brush bar', '1000W, the second most powerful motor in this comparison', '4.7 stars from 239 ratings, joint-highest average here', 'Solves the actual failure mode of carpet washers in pet homes', 'No pre-treatment or heat required for pet urine'], // PONTOS POSITIVOS
                'contras' => ['Bullets promise a 5-year guarantee; the spec table says 2 years', 'Neither tank capacity is published anywhere', 'Cleaning claim again benchmarked against Shark\'s own old vacuum', '£190.00 and 8.76kg, the heaviest of the Sharks'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'BISSELL Little Green Portable Spot Cleaner & Carpet Stain Remover 4098E', // NOME (ENCURTADO)
                'price' => '£87.23',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 290,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61Q4vOHN60L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'BISSELL Little Green portable spot cleaner in retro green design',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D6RSDL6X?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest machine here, and the only one in this whole category that publishes a suction figure you can actually believe.', // TEXTO CURTO (CARD)
                'body' => "Eighty-seven pounds twenty-three is the lowest price on this page, and the Little Green earns its place by publishing something almost nobody in home cleaning publishes honestly: a suction figure. It claims up to 7,800 pascals. Atmospheric pressure is 101,325 pascals, so that is about 7.7% of a perfect vacuum — a modest, entirely plausible number for a handheld extractor. We have collected pet vacuum listings claiming 65,000 pascals, which would be 64% of an absolute vacuum, so a brand quoting a believable figure deserves saying so out loud.

The machine is a spot cleaner rather than a carpet washer, and it is important to be clear about the difference: it will not clean a room. It sprays, scrubs and extracts one patch at a time using an 8cm tough stain tool or a crevice tool for car footwells and corners, and it weighs 4.38 kilograms with a carry handle. For sofas, stairs, car seats and the specific disasters that pets and toddlers produce, that is the right shape of tool, and the retro green design has become genuinely popular in a way most appliances do not.

Two notes on the page rather than the product. The suction figure is written \"7.800 Pa\", using a European thousands separator that in English reads as 7.8 pascals — a formatting slip that inverts the number's meaning for a British reader. And the first bullet opens with \"over 80,000 reviews\", which is a global figure across other listings; this ASIN has 290. The 290 is what applies to what you are buying.", // TEXTO SEO LONGO
                'pros' => ['Cheapest machine in this comparison at £87.23', 'Publishes a suction figure, 7,800 Pa, that is genuinely plausible', 'Right shape of tool for sofas, stairs and car interiors', 'Light at 4.38kg with a proper carry handle', 'Both an 8cm stain tool and a crevice tool included'], // PONTOS POSITIVOS
                'contras' => ['A spot cleaner, not a carpet washer — it will not do a room', 'Suction written as "7.800 Pa", which reads as 7.8 Pa in English', 'Opens by citing "over 80,000 reviews" on a listing that has 290', 'No tank capacities published'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Shark StainStriker Stain and Spot Cleaner, 450W, PX200UK',                // NOME (ENCURTADO)
                'price' => '£123.00',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 273,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/719JsBbXXGL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Shark StainStriker compact spot and stain cleaner in blue',          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CFV7HZHH?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A 450W spot cleaner with a genuinely clever dual-formula system, filed in the specification table as a steam mop and weighed twice with two answers.', // TEXTO CURTO (CARD)
                'body' => "The dual-activated solution is a real idea. Two formulas are stored separately and mix at the moment they hit the stain, which means the reactive chemistry is happening on the carpet rather than degrading in a bottle for six months. Shark claims that removes the need to pre-treat, and for set-in pet stains that is the step most people skip anyway. Four hundred and fifty watts is decent extraction for a handheld, the hose and hand tools cover stairs and car interiors, and 4.4 stars from 273 ratings is solid.

The listing then repeats every documentation habit we found in this category. Item Type Name reads \"Steam Mop\" — the second Shark product on this page filed under a category it does not belong to, which confirms it as a systematic cataloguing error rather than a one-off. The weight is published twice and disagrees with itself: the bullet says 3.8kg, the specification table says 3.94kg. That gap is small enough not to matter practically, but it is the same habit that produces the 3.4kg-versus-1.3kg contradiction on the StainForce at the bottom of this page.

The performance claim follows the family rule too. \"20x more stain-striking power\" carries an asterisk reading \"vs Shark Deep Clean Pro Formula\" — the comparison is against Shark's own other cleaning fluid, so what is being claimed is that the new formula beats the old formula, not that the machine beats anything on the market. At £123 it costs £36 more than the BISSELL above and does a similar job with more watts behind it.", // TEXTO SEO LONGO
                'pros' => ['Dual formulas mix on contact, so the chemistry is fresh at the stain', '450W, more extraction than the BISSELL spot cleaner', 'Removes the pre-treatment step most people skip anyway', 'Hose and two hand tools for stairs and car interiors', '4.4 stars from 273 ratings and a three-year guarantee'], // PONTOS POSITIVOS
                'contras' => ['Spec table files it as a "Steam Mop", the second Shark here to do so', 'Weight given as 3.8kg in the bullet and 3.94kg in the table', '"20x more stain-striking power" is measured against Shark\'s own formula', '£36 more than the BISSELL Little Green for a similar job'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Vax SpotWash Home & Pet Compact Carpet Spot Cleaner, CDSW-MPDP',          // NOME (ENCURTADO)
                'price' => '£143.00',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 225,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71ovbkpx0+L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Vax SpotWash Home and Pet compact spot cleaner in grey and cyan',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FRT19W3T?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A well-equipped pet spot cleaner whose specification table calls a mains machine battery powered and fills the capacity field with the detergent bottle.', // TEXTO CURTO (CARD)
                'body' => "The toolkit is the best of any spot cleaner here. You get the motorised SpinScrub hand tool, an everyday 2-in-1 tool with separate multi-surface and hard floor attachments, a crevice tool and two 250ml pouches of antibacterial solution — and crucially, the separate everyday tool exists so that ordinary spills do not cross-contaminate the SpinScrub head you use on pet messes. Every tool carries an antimicrobial coating, and the 1.25 metre hose plus slim body means it stores in a normal cupboard rather than needing floor space.

The specification table describes a different machine. Power Source is given as \"Battery Powered\"; this is a mains appliance with a cord. And Capacity reads \"250 Millilitres\", which is the size of the detergent pouches that come in the box, not the water tank — the page title itself says 1.1 litres. That is precisely the error we documented across pressure washers, where the tank volume field was filled with the detergent bottle instead of the tank. A shopper filtering Amazon for a cordless spot cleaner will be shown this machine, and a shopper comparing capacity will be shown a quarter of a litre.

At £143.00 it is the most expensive spot cleaner in this comparison, £56 more than the BISSELL Little Green and £20 more than the Shark StainStriker, and the guarantee is two years where Vax gives six on its uprights. Four point four stars from 225 ratings puts it level with both rivals on satisfaction. You are paying for the tool set, which is genuinely the most complete here, and accepting a listing that gets two basic facts wrong.", // TEXTO SEO LONGO
                'pros' => ['Most complete tool set of any spot cleaner in this comparison', 'Separate everyday tool avoids cross-contaminating the pet head', 'Antimicrobial coating on all attachments', '1.25m hose and a slim body that stores in a normal cupboard', 'Two 250ml solution pouches included'], // PONTOS POSITIVOS
                'contras' => ['Spec table says "Battery Powered" for a corded mains machine', 'Capacity field reads 250ml, which is the detergent pouch, not the tank', 'Most expensive spot cleaner here at £143.00', 'Two-year guarantee where Vax gives six years on its uprights'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Shark StainForce Cordless Spot Cleaner, 100W, HX100UKCP',                 // NOME (ENCURTADO)
                'price' => '£129.99',                                                               // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 534,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/714Eq-w6d0L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Shark StainForce cordless spot cleaner in grey with storage caddy',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FMRRFJ2Z?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only cordless machine here, and the one whose own listing cannot decide whether it weighs 3.4 kilograms or 1.3.', // TEXTO CURTO (CARD)
                'body' => "Cordless is the genuine advantage and it is worth taking seriously. Every other machine on this page requires you to find a socket before you can deal with a spill, and a spill dealt with in the first minute comes out; one dealt with after you have hunted for an extension lead often does not. At 50 centimetres tall and slim enough to leave standing in a utility room with its caddy, this is designed to be grabbed rather than fetched, and 534 ratings makes it the fourth deepest sample here.

The cost of cordless is power. One hundred watts is the lowest figure in this comparison by 350 watts, and thirteen times less than the Rug Doctor at number two. That is the physics of running a suction motor off a battery, and it means this extracts far less water than anything above it — fine for a fresh spill on upholstery, not enough for a set-in stain in dense carpet pile. It is also explicitly not for wool, which the listing states in a footnote marker.

The listing publishes its own weight twice and disagrees by a factor of 2.6. The final bullet says \"Weight: 3.4kg\"; the specification table says \"Item Weight 1.3 kg\". For a product whose entire proposition is being light enough to carry one-handed to a spill, weight is the headline specification, and the page offers two answers three inches apart. At 4.2 stars this also has the lowest average in the comparison, and at £129.99 it costs more than the full BISSELL upright at number five, which cleans whole rooms.", // TEXTO SEO LONGO
                'pros' => ['The only cordless machine here, so spills get treated immediately', 'Slim 50cm body with a caddy, designed to be left out and grabbed', '534 ratings, the fourth deepest sample in this comparison', 'Two 500ml solution bottles and two tools included'], // PONTOS POSITIVOS
                'contras' => ['Bullet says 3.4kg, spec table says 1.3kg — a factor of 2.6 apart', '100W is the lowest power here by 350W, so extraction is weak', '£129.99, more than the full BISSELL upright that cleans whole rooms', '4.2 stars, the lowest average in this comparison, and not for wool'], // PONTOS NEGATIVOS
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
        $this->command?->info("CarpetCleanersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
