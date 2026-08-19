<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class PS5SsdSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE SSDs NVMe 2TB PARA PS5 DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // FOCUS KEYWORD: best 2tb ssd for ps5
        // KEYWORDS SECUNDARIAS: ps5 ssd / best ssd for ps5 / ps5 nvme ssd /
        // ps5 storage expansion / 2tb nvme ssd / m.2 ssd for ps5 /
        // ps5 ssd with heatsink / playstation 5 ssd / gen4 nvme ssd 2tb
        //
        // ANGULO: AS 10 UNIDADES PASSAM DO MINIMO DE 5.500 MB/s DE LEITURA QUE A SONY PEDE,
        // ENTAO VELOCIDADE NAO DIFERENCIA NADA. O QUE DIFERENCIA E O DISSIPADOR, QUE E
        // OBRIGATORIO NO PS5: 2 UNIDADES NAO TEM NENHUM, 3 TEM SO PAD/ADESIVO FINO, E SO 1
        // E LICENCIADA PELA SONY. E A UNIDADE COM O MAIOR NUMERO NA CAIXA (14.000 MB/s) E
        // JUSTAMENTE A QUE NAO DEVE ENTRAR NUM PS5 — E PCIe Gen5 PARA PC.
        //
        // REQUISITOS OFICIAIS DA SONY USADOS COMO CRITERIO:
        // M.2 NVMe (Key M) / PCIe Gen4 x4 / leitura sequencial recomendada >= 5.500 MB/s /
        // formato 2280 / estrutura de dissipacao OBRIGATORIA / espessura total maxima 11,25mm.
        //
        // INCONSISTENCIAS NAS LISTAGENS: ACER DECLARA FORMATO "2.5 Inches" (ERRADO, E M.2 2280);
        // SAMSUNG 990 PRO NAO LISTA PS5 EM "Compatible devices"; fanxiang Gen5 EXIGE PLACA-MAE
        // COM PCIe 5.0 NA PROPRIA DESCRICAO.
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MESMO TEXTO JA CADASTRADO)
        ];

        $article = [
            'slug' => 'best-2tb-ssd-for-ps5',                                    // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK" (SITE JA E UK)
            'title' => 'Best 2TB SSD for PS5 in 2026: 10 Ranked Against Sony’s Own Rules', // TITULO / H1 - CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best 2TB SSD for PS5 2026: Top 10 Ranked',           // TITLE DA ABA/GOOGLE (39 CHARS)
            'meta_description' => 'We ranked the best 2TB SSD for PS5 on Amazon against Sony’s own requirements: Gen4 speed, heatsink fit and which drives should not go near your console.', // META DESCRIPTION (152 CHARS)
            'focus_keyword' => 'best 2tb ssd for ps5',                           // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Every single drive on this page is fast enough for a PlayStation 5. Sony asks for PCIe Gen4 x4 with a sequential read speed of at least 5,500MB/s, and the slowest here manages 7,000MB/s — so the speed numbers plastered across these listings tell you almost nothing about which to buy. What actually decides it is the heatsink. Sony requires a cooling structure, and the console's M.2 bay allows a total thickness of just 11.25mm, so a drive that is too tall will not fit and a drive with no heatsink at all should not go in. Of the ten drives here, two ship with no heatsink whatsoever, three have only a thin thermal pad, and exactly one is officially licensed by Sony. There is also one with the biggest speed figure on the page that has no business being in a console at all. We ranked the best 2TB SSD for PS5 options on Amazon by whether they actually fit the console first, and by speed and price second.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X
            'conclusion' => "Choosing the best 2TB SSD for PS5 is simpler than the spec sheets make it look. Confirm three things and you cannot go wrong: it is PCIe Gen4 x4 in the M.2 2280 form factor, it reads at 5,500MB/s or faster, and it comes with a heatsink low enough to close the console's expansion cover. Every drive in this ranking clears the first two comfortably, which is why the heatsink is the deciding factor and why the drives without one sit low on this list despite being excellent in a PC. If you want zero risk and do not mind paying for it, the officially licensed WD_BLACK is the drive Sony itself tested. If you want the same certainty for less, the Crucial P310 is £45 cheaper and just as clearly labelled for the console. And if a listing quotes a speed that looks too good for the price, check the PCIe generation before you order — a Gen5 drive belongs in a PC, not a PlayStation.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => now(),                                             // DATA DE PUBLICACAO
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'WD_BLACK SN850P 2TB PS5 SSD, Officially Licensed, 7300MB/s, With Heatsink', // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£309.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 11321,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71m4ODJ7+DL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'best 2tb ssd for ps5',                                                // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://amzn.to/4hEBRh1',                                       // LINK AFILIADO
                'summary' => "The only officially licensed drive here, and the best 2TB SSD for PS5 if you want zero compatibility risk: Sony tested it, and the heatsink is shaped for the console's bay.", // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "This is the only drive in the ranking that Sony has officially tested and licensed for the PlayStation 5, and in a category where the main risk is buying something that does not fit, that removes the entire question. The heatsink is designed specifically for the PS5's M.2 slot, carries the PlayStation logo, and is dimensioned to close under the expansion cover without forcing.

Performance is at the top end regardless: 7,300MB/s read and 6,600MB/s write on the 2TB model, comfortably above Sony's 5,500MB/s recommendation, so games load as fast as anything else here. WD offers the same drive up to 8TB, which the listing frames as room for around 200 games.

The 11,321 ratings behind its 4.7 average make it the second most reviewed drive on this list, and every one of those buyers was almost certainly putting it in a console — unlike the general-purpose drives here, where the feedback is mostly from PC builders. At £309.99 it is the most expensive drive in the ranking, £44.99 more than the Crucial below it. What you are paying for is the licence and the guarantee that nothing about the fit is your problem. If that certainty is worth £45 to you, buy this and stop reading.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Only officially licensed PS5 drive on this list', 'Heatsink shaped specifically for the PS5 expansion bay', '11,321 ratings, almost all from console owners', '7,300MB/s read and 6,600MB/s write'], // PONTOS POSITIVOS
                'contras' => ['Most expensive drive here at £309.99', 'The licence premium buys certainty, not extra speed'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Crucial P310 2TB PS5 SSD, Gen4 NVMe with Heatsink, 7100MB/s',             // NOME (ENCURTADO)
                'price' => '£265.00',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 1621,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/51ZuYxUAmPL._AC_SL1080_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Crucial P310 2TB PS5 SSD, Gen4 NVMe with Heatsink, 7100MB/s',         // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4qmVQD2',                                       // LINK AFILIADO
                'summary' => "The value pick among the drives that are unambiguously PS5-ready: a proper heatsink and 7,100MB/s for £44.99 less than the licensed WD.", // TEXTO CURTO (CARD)
                'body' => "If the WD's official licence feels like a premium you would rather not pay, this is the drive to buy instead. Crucial sells it explicitly as a PS5 SSD, the heatsink version is the one listed here, and the product description states plainly that it is easy to install in a PlayStation 5. There is no ambiguity to resolve and no separate heatsink to source.

At 7,100MB/s it is 200MB/s slower on paper than the WD, a difference you will never perceive in a load screen, and 1,600MB/s above Sony's minimum. Crucial quotes nearly 20% faster bootups and gameplay against the previous generation, and backs the drive with a 5-year limited warranty.

Crucial is Micron's consumer brand, which means the flash inside is made by the same company that designs it — a meaningful thing in a category where several brands here simply buy NAND on the open market. With 1,621 ratings it has less feedback than the WD or the Samsung, but enough to be a known quantity. At £265.00 it saves you £44.99 against the licensed drive while answering the only question that actually matters in this category. For most people this is the sensible buy.", // TEXTO SEO LONGO
                'pros' => ['Sold explicitly as a PS5 drive with the heatsink included', '£44.99 cheaper than the licensed WD_BLACK', '7,100MB/s, well above Sony’s 5,500MB/s minimum', 'Crucial is Micron’s own brand, so the flash is first-party'], // PONTOS POSITIVOS
                'contras' => ['Not officially licensed, unlike the WD above', '1,621 ratings is a smaller sample than the top two brands'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Lexar EQ790 2TB SSD with Heatsink, Gen4 NVMe, 7000MB/s',                  // NOME (ENCURTADO)
                'price' => '£249.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 394,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/51Tqp2rPf6L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Lexar EQ790 2TB SSD with Heatsink, Gen4 NVMe, 7000MB/s',              // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4gr07B7',                                       // LINK AFILIADO
                'summary' => "The cheapest drive here with a proper integrated heatsink, at £249.99 — and a useful lesson sits at number nine, where the same drive without one costs £20 less.", // TEXTO CURTO (CARD)
                'body' => "At £249.99 this is the lowest-priced drive in the ranking that ships with a genuine integrated heatsink rather than a thermal pad or sticker. For a PS5 that is the specification that matters, and it is why this sits above several faster and cheaper drives.

Speeds are 7,000MB/s read and 5,000MB/s write. That read figure is the lowest on this list, though still 1,500MB/s clear of Sony's minimum, and the write speed is the one place it trails the pricier options meaningfully. Lexar highlights the heatsink's role directly: it prevents thermal throttling during long sessions, which is exactly the failure mode Sony's heatsink requirement exists to avoid. The drive is also quoted as using up to 40% less power than DRAM-cache Gen4 rivals, helped by HMB 3.0 and dynamic SLC cache instead of a dedicated DRAM chip.

Two caveats. With 394 ratings it has the second-smallest sample here, so long-term feedback is thin. And it is worth looking at number nine on this list before ordering: the identical EQ790 without the heatsink is £229.99. That £20 gap is the entire difference between a drive that drops straight into a PS5 and one that does not — which makes this the better buy of the pair, not the worse value.", // TEXTO SEO LONGO
                'pros' => ['Cheapest drive here with a true integrated heatsink', '4.7 average rating', 'Uses up to 40% less power than DRAM-cache rivals', '5-year product support'], // PONTOS POSITIVOS
                'contras' => ['5,000MB/s write is the slowest on this list', 'Only 394 ratings so far'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Acer Predator GM7 2TB SSD, Gen4 NVMe 2.0, 7200MB/s, Graphene Thermal Pad', // NOME (ENCURTADO)
                'price' => '£228.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.8,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 2456,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/51qIcFcKe7L._AC_SX679_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Acer Predator GM7 2TB SSD, Gen4 NVMe 2.0, 7200MB/s, Graphene Thermal Pad', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/45D3FuU',                                       // LINK AFILIADO
                'summary' => "The highest rated drive on this list at 4.8, and among the cheapest — but it has a graphene thermal pad rather than a heatsink, which is not the same thing.", // TEXTO CURTO (CARD)
                'body' => "On raw merit this drive is superb. Its 4.8 average across 2,456 ratings is the highest score on the list, it reads at 7,200MB/s and writes at 6,200MB/s — second only to the Samsung and the WD on write — and at £228.99 it is the second cheapest drive here. It uses PCIe 4.0 with the NVMe 2.0 protocol, Host Memory Buffer and SLC cache, and Acer names PS5 storage expansion directly in the description.

The reason it is not higher is thermal management. Acer describes an intelligent thermal control system and a graphene thermal pad, which is a thin conductive layer bonded to the drive, not a finned heatsink with mass to absorb heat. In a PC with case airflow that is usually adequate. Inside the sealed M.2 bay of a PS5, where Sony requires a cooling structure precisely because there is no airflow, it is a genuinely open question — and Acer does not claim it satisfies Sony's requirement.

One more thing worth knowing: this listing states the form factor as 2.5 inches, which is simply wrong for an M.2 2280 drive and suggests the specification fields were not filled in carefully. If you already own a compatible PS5 heatsink, this is arguably the best-value drive on the page. If you do not, budget for one or buy the Crucial.", // TEXTO SEO LONGO - HONESTO SOBRE A DIFERENCA PAD x DISSIPADOR
                'pros' => ['Highest rating on this list at 4.8 from 2,456 ratings', '7,200/6,200MB/s, among the fastest here', 'Second cheapest drive in the ranking', 'PCIe 4.0 with NVMe 2.0, HMB and SLC cache'], // PONTOS POSITIVOS
                'contras' => ['Graphene thermal pad, not a true heatsink for the PS5 bay', 'Listing states a 2.5in form factor, which is wrong for M.2 2280'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'BIWIN Black Opal NV7400 2TB SSD, Gen4x4, 7450MB/s, Graphene Aluminium Heatsink', // NOME (ENCURTADO)
                'price' => '£245.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 859,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/6137aQRmU7L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'BIWIN Black Opal NV7400 2TB SSD, Gen4x4, 7450MB/s, Graphene Aluminium Heatsink', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4xQcEVJ',                                       // LINK AFILIADO
                'summary' => "Joint fastest read speed on this list at 7,450MB/s and marked PS5 Ready, though its heatsink is a 0.5mm graphene layer rather than a finned block.", // TEXTO CURTO (CARD)
                'body' => "The NV7400 matches the Samsung 990 PRO for the fastest read speed in this ranking at 7,450MB/s, pairs it with 6,500MB/s write and up to 1,000K IOPS random performance, and costs £55 less than the Samsung. It is labelled PS5 Ready and uses 3D TLC NAND with a composite power management IC that BIWIN says improves efficiency and extends drive life.

Its thermal solution is a 0.5mm graphene aluminium heat sink. That is more substantial than a bare thermal pad and it is bonded rather than loose, but at half a millimetre it is a long way from the finned heatsinks on the WD and Crucial. It will keep the drive cooler than nothing at all; whether it satisfies Sony's requirement in a sealed bay is not something BIWIN commits to in writing.

BIWIN is an unfamiliar name to most UK buyers, though the company has manufactured storage components for other brands for decades — and notably, it is the same company behind the management software on the Acer Predator drive at number four. With 859 ratings the sample is moderate. Free Biwin Intelligence backup software is included. Good drive, genuine speed, but the heatsink question keeps it below the three unambiguous picks.", // TEXTO SEO LONGO
                'pros' => ['Joint fastest read here at 7,450MB/s', '£55 cheaper than the Samsung it matches on speed', 'Up to 1,000K IOPS random performance', 'Free backup software included'], // PONTOS POSITIVOS
                'contras' => ['0.5mm graphene layer rather than a finned heatsink', 'Little-known brand in the UK with 859 ratings'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Samsung 990 PRO 2TB NVMe SSD, Gen4, 7450MB/s Read, 6900MB/s Write (No Heatsink)', // NOME (ENCURTADO)
                'price' => '£300.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 12875,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71ByVZ1x2vL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung 990 PRO 2TB NVMe SSD, Gen4, 7450MB/s Read, 6900MB/s Write',   // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4crVhCg',                                       // LINK AFILIADO
                'summary' => "The best drive on this page on pure performance and the most reviewed by far — but this listing is the version without a heatsink, and it does not list PS5 as a compatible device.", // TEXTO CURTO (CARD)
                'body' => "Let us be clear about what this drive is: on specification it is the best on this page. 7,450MB/s read and 6,900MB/s write are the fastest figures here, endurance is rated at up to 1,200TB written, and its 12,875 ratings are the most of any drive in the ranking. In a PC, the 990 PRO is a benchmark product.

The problem is that this particular listing is the version without a heatsink. Samsung sells a separate 990 PRO with Heatsink model; this is not it. The description mentions a heat spreader and dynamic thermal guard, which is the thin thermal label and firmware throttling protection that every modern drive has — not a cooling structure of the sort Sony requires. Tellingly, the listing's own compatible devices field reads desktop, laptop and PC. PS5 is not among them.

That does not make it unusable in a console. It makes it an incomplete purchase: you would need to buy a compatible PS5 heatsink separately, typically £10 to £20, fit it yourself, and accept that the combined height must stay under 11.25mm. If you are comfortable doing that, you get the fastest drive here. If you want to open a box and drop it in, this is not the listing to order, and at £300.99 it is £35.99 more than the Crucial that comes ready to go.", // TEXTO SEO LONGO - EXPLICITO SOBRE A AUSENCIA DE DISSIPADOR
                'pros' => ['Fastest drive here: 7,450MB/s read, 6,900MB/s write', '12,875 ratings, the most on this list', 'Up to 1,200TB written endurance rating', 'Samsung Magician software for updates and tuning'], // PONTOS POSITIVOS
                'contras' => ['This listing has no heatsink; you must buy and fit one', 'PS5 is not listed among its compatible devices'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'fanxiang S770 2TB NVMe SSD with Heatsink and DRAM Cache, 7300MB/s',        // NOME (ENCURTADO)
                'price' => '£219.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.2,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 1495,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/51dFyqgeMpL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'fanxiang S770 2TB NVMe SSD with Heatsink and DRAM Cache, 7300MB/s',   // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/45W2LtP',                                       // LINK AFILIADO
                'summary' => "The cheapest drive on this list at £219.99, with a heatsink and a real DRAM cache — but the lowest rating here at 4.2.", // TEXTO CURTO (CARD)
                'body' => "At £219.99 this is the cheapest drive in the ranking, £9 below the Acer and £90 below the WD, and it does not achieve that by dropping the two things that matter. It ships with a heatsink, and it has a dedicated DRAM cache rather than relying on Host Memory Buffer — which is what several pricier drives here, including the Lexar and the Acer, do without.

DRAM cache matters for sustained performance. Drives using HMB borrow system memory to hold the mapping table; a drive with its own DRAM does not, which generally means more consistent behaviour under heavy sustained writes. Speeds are 7,300MB/s read and 5,400MB/s write, and fanxiang backs it with 5 years of after-sales support.

Two things hold it back. Its 4.2 average across 1,495 ratings is the lowest on this list, and it is the only drive here below 4.5 — with a sample large enough that the score is a real signal rather than noise. And the listing's compatible devices field names only desktop and laptop, even though the product name and description both reference PS5. It is not a bad drive, and the DRAM cache is a genuine advantage at the price, but the rating gap to the Acer at £9 more is hard to ignore.", // TEXTO SEO LONGO
                'pros' => ['Cheapest drive on this list at £219.99', 'Real DRAM cache rather than Host Memory Buffer', 'Heatsink included', '5-year after-sales support'], // PONTOS POSITIVOS
                'contras' => ['Lowest rating here at 4.2 from a meaningful 1,495 ratings', 'Compatible devices field omits PS5 despite the product name'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'SIX X7400 2TB NVMe M.2 SSD, Gen4x4, 7350MB/s, With Heatsink',             // NOME (ENCURTADO)
                'price' => '£289.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 647,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71wptFbys1L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'SIX X7400 2TB NVMe M.2 SSD, Gen4x4, 7350MB/s, With Heatsink',         // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4xcdBYD',                                       // LINK AFILIADO
                'summary' => "Ticks every PS5 box — Gen4x4, 7,350MB/s, heatsink included — but asks near-flagship money for an unknown brand with 647 ratings.", // TEXTO CURTO (CARD)
                'body' => "On paper the X7400 does everything right. It is PCIe Gen4x4, reads at 7,350MB/s, ships with a heatsink, lists PS5 among its compatible devices, and includes the screws and screwdriver you need for installation — a small courtesy that the premium brands often skip. A 5-year limited warranty backs it.

The difficulty is price positioning. At £289.99 it costs £24.99 more than the Crucial P310 and only £20 less than the officially licensed WD_BLACK, while SIX is a brand almost no UK buyer will have heard of and its 647 ratings are among the smaller samples here. In a category where the entire purchase decision turns on trusting that a component fits and lasts inside a sealed console bay, spending flagship money on an unknown quantity is a hard case to make.

If it were £180 the calculation would be different and the included installation kit would look like a genuine bonus. At £289.99 the Crucial is cheaper and better established, the WD is £20 more and carries Sony's own licence, and the Acer is £61 cheaper with a higher rating. It is a competent drive priced as though it were a famous one.", // TEXTO SEO LONGO
                'pros' => ['Meets every Sony requirement including a heatsink', '7,350MB/s read speed', 'Screws and screwdriver included for installation', '5-year limited warranty'], // PONTOS POSITIVOS
                'contras' => ['£289.99 for a brand almost nobody knows, with 647 ratings', 'Only £20 less than the officially licensed WD_BLACK'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Lexar EQ790 2TB SSD, Gen4 NVMe, 7000MB/s (No Heatsink)',                  // NOME (ENCURTADO)
                'price' => '£229.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 1639,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61OQ6pbX5NL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Lexar EQ790 2TB SSD, Gen4 NVMe, 7000MB/s',                            // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4x9i7XD',                                       // LINK AFILIADO
                'summary' => "The same drive as our number three pick, £20 cheaper because it has no heatsink — which is exactly the part a PS5 requires.", // TEXTO CURTO (CARD)
                'body' => "This is the clearest illustration on the page of the trap this category sets. It is the same Lexar EQ790 that sits at number three: identical PCIe Gen4 controller, identical 7,000MB/s read and 5,000MB/s write, identical HMB and SLC cache technologies, identical 5-year support. The only difference is that this version does not include the heatsink, and it costs £20 less.

For a laptop or a desktop with case airflow, that makes this the better buy of the pair and a perfectly sensible drive — it has more ratings than the heatsink version too, 1,639 against 394, so it is the more proven listing. Lexar lists PlayStation 5 among its compatible devices.

But for a PS5 specifically, buying this means buying an aftermarket heatsink separately, checking that the combined height clears 11.25mm, and fitting it yourself. A PS5-compatible heatsink typically costs £10 to £20, which erases most or all of the £20 saving and adds a step where you can get it wrong. Unless you already have a spare heatsink in a drawer, spend the extra £20 and take number three instead. Same drive, one less thing to solve.", // TEXTO SEO LONGO - EXPLICA A ARMADILHA
                'pros' => ['£20 cheaper than the heatsink version of the same drive', '1,639 ratings, four times the heatsink version', 'Lists PlayStation 5 among compatible devices', 'Excellent choice for a laptop or desktop'], // PONTOS POSITIVOS
                'contras' => ['No heatsink, which the PS5 requires', 'Buying one separately erases the £20 saving'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'fanxiang 2TB NVMe SSD, PCIe Gen5, M.2 2280, Up to 14000MB/s',             // NOME (ENCURTADO)
                'price' => '£235.93',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 39,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61YwckdHkML._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'fanxiang 2TB NVMe SSD, PCIe Gen5, M.2 2280, Up to 14000MB/s',         // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3UnGXV9',                                       // LINK AFILIADO
                'summary' => "The biggest speed figure on this page at 14,000MB/s — and the one drive here that should not go into a PS5. It is a PCIe Gen5 drive for PCs.", // TEXTO CURTO (CARD)
                'body' => "If you sort a search by speed, this comes out on top: 14,000MB/s read and 10,000MB/s write, nearly double anything else here, for £235.93. That is why it appears in PS5 searches, and why it is worth explaining rather than quietly leaving out.

It is a PCIe Gen5 drive. The PlayStation 5's expansion slot is PCIe Gen4, so a Gen5 drive cannot reach those speeds in a console even in principle — it would run at Gen4 rates at best. More importantly, fanxiang's own description states the requirement plainly: the motherboard must have an M.2 PCIe 5.0 interface. Its compatible devices field lists all-in-one computers, desktops and laptops. There is no mention of PS5 anywhere in the listing, unlike the same brand's S770 at number seven, which names the console explicitly.

Cooling is the other issue. Gen5 drives run considerably hotter than Gen4, and this one ships with a graphite dissipation sticker rather than a heatsink — a combination that is asking for trouble in a sealed console bay. With 39 ratings it is also the least proven drive on this page by a wide margin. For a modern PC with a Gen5 slot it may well be a bargain. For a PS5, the correct move is to scroll back to number one or two.", // TEXTO SEO LONGO - EXPLICITO: NAO E PARA PS5
                'pros' => ['Fastest headline speeds here at 14,000/10,000MB/s', 'Up to 1,400TBW endurance rating', 'DRAM cache with dynamic SLC caching', 'Genuinely good value for a Gen5 PC build'], // PONTOS POSITIVOS
                'contras' => ['PCIe Gen5 drive; the PS5 slot is Gen4 and PS5 is not listed', 'Graphite sticker rather than a heatsink, and only 39 ratings'], // PONTOS NEGATIVOS
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
        $this->command?->info("PS5SsdSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
