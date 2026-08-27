<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class ElectricBlanketsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE COBERTORES ELETRICOS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // COLETA: AMAZON.CO.UK EM 27/08/2026, ENTREGA EM M4 6BD (MANCHESTER), BUSCA "electric blanket" FILTRADA A PARTIR DE £20.
        //
        // ═══ ACHADOS DA COLETA (O DIFERENCIAL DO ARTIGO) ═══
        // 1. "SINGLE" E "DOUBLE" NAO SIGNIFICAM O TAMANHO DA CAMA. O CAMPEAO DE VENDAS DA CATEGORIA E O PIOR CASO:
        //    SILENTNIGHT SINGLE (36.823 AVALIACOES) MEDE 135x120cm — COLCHAO SINGLE BRITANICO E 190x90cm. FICA 55cm CURTO E 30cm LARGO.
        //    SILENTNIGHT DOUBLE MEDE 137x150cm — COLCHAO DOUBLE E 190x137cm. FICA 40cm CURTO; O PROPRIO ANUNCIO DIZ QUE ELE
        //    "sits neatly away from the edges". NAO CHEGA NOS PES.
        //    DREAMCATCHER DOUBLE (£33,98, £4 MAIS BARATO QUE O SILENTNIGHT DOUBLE) MEDE 193x137cm E COBRE O COLCHAO INTEIRO.
        //    HOMEFRONT KING: 152x203cm COM SAIA ELASTICA DE 20-40cm. DREAMLAND KING: 200x150cm.
        // 2. CUSTO DE ENERGIA: A MESMA MARCA SE CONTRADIZ. DREAMLAND DIZ "1p per hour" NO SNUGGLE UP E "1p per NIGHT" NO KING BAMBOO.
        //    SE A NOITE TEM 8 HORAS, SAO 8x DE DIFERENCA. SILENTNIGHT TAMBEM DIZ "from just 1p per hour*" COM ASTERISCO SEM DESTINO.
        //    NENHUM DOS 10 ANUNCIOS INFORMA A POTENCIA EM WATTS — O UNICO NUMERO QUE PERMITIRIA CONFERIR QUALQUER UMA DESSAS CONTAS.
        //    A 25p/kWh, 1p/HORA = 40W. 1p/NOITE (8h) = 5W, IMPOSSIVEL PARA UM UNDERBLANKET KING SIZE.
        // 3. CERTIFICACAO: SO A SLUMBERDOWN (A MAIS BARATA, £21,80) CITA "BEAB approved", QUE E A MARCA BRITANICA DA CATEGORIA.
        //    HOMEFRONT CITA UKCA/CE + RoHS · COSI HOME CITA CE · MIA&COCO CITA ETL (MARCA NORTE-AMERICANA, NAO BRITANICA) ·
        //    SILENTNIGHT, DREAMCATCHER, DREAMLAND E MONHOUSE NAO CITAM NENHUMA.
        // 4. A BUSCA MISTURA DOIS PRODUTOS QUE NAO SE SUBSTITUEM: UNDERBLANKET (VAI SOB O LENCOL, VOCE DORME EM CIMA) E
        //    HEATED THROW (VAI SOBRE VOCE NO SOFA). OS ANUNCIOS DE THROW FALAM EM SOFA; OS DE UNDERBLANKET, EM COLCHAO.
        // 5. AJUSTES DE CALOR VARIAM DE 3 A 10. HOMEFRONT E O UNICO COM ZONAS SEPARADAS: 9 NIVEIS PARA O CORPO E 9 PARA OS PES.
        // 6. TEMPERATURA DE LAVAGEM VARIA: 30°C (HOMEFRONT) E 40°C (DREAMCATCHER, SLUMBERDOWN). SO A MIA&COCO PUBLICA A FAIXA
        //    REAL DE TEMPERATURA DO PRODUTO: 25°C A 53°C.
        // 7. ASINS DUPLICADOS NA BUSCA: COSI HOME EM B0C58SHZDN (335 AVALIACOES) E B07FF6B5F9 (5.794), MESMO PRECO £42,49 —
        //    USADO O DE AMOSTRA MAIOR. SILENTNIGHT SINGLE (B00L67CZ9U) E KING (B0GHZGPWMK) COMPARTILHAM AS MESMAS 36.8K AVALIACOES.
        //
        // ═══ CRITERIO DE CORTE ═══
        // TODOS OS 10 TEM 1.900+ AVALIACOES, MENOS O DREAMLAND KING BAMBOO (301), QUE ENTROU POR SER O TOPO DE PRECO DA
        // CATEGORIA E ESTA SINALIZADO NO TEXTO. EXCLUIDOS OS DE AMOSTRA FINA: B0G261WJJF (23), B0FSQ9KLVV (87), B0FGQ3ZCWG (88).
        //
        // ═══ VARIACOES DE PALAVRA-CHAVE TRABALHADAS NO TEXTO ═══
        // best electric blanket · best electric blanket on amazon · heated underblanket · electric underblanket · heated throw ·
        // electric throw blanket · best heated blanket · electric blanket double · electric blanket single ·
        // energy efficient electric blanket · heated mattress cover
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best home and household products available in the UK.', // DESCRICAO
        ];

        $article = [
            'slug' => 'best-electric-blanket',                                    // SLUG DO ARTIGO (URL) = PALAVRA-CHAVE EM formato-url
            'title' => 'Best Electric Blanket 2026: 10 Ranked on Size and Safety', // TITULO / H1 — CONTEM A PALAVRA-CHAVE
            'meta_title' => 'Best Electric Blanket 2026: Top 10 Ranked',           // TITLE DA ABA/GOOGLE (43 CHARS)
            'meta_description' => 'We ranked the best electric blanket options on real size, heat settings and safety marks. The top seller measures 137x150cm on a 190cm double mattress.', // META DESCRIPTION (~152 CHARS)
            'focus_keyword' => 'best electric blanket',                           // PALAVRA-CHAVE PRINCIPAL — VIRA O ALT DO HERO
            'hero_image' => '',                                                   // SEM HERO MANUAL: A VIEW USA A FOTO DO PRODUTO #1 COMO IMAGEM SOCIAL
            'intro' => 'On an electric blanket, the word "double" does not tell you the size of the blanket. It tells you the size of the bed the manufacturer had in mind, and those are frequently not the same thing. The best-selling heated underblanket on Amazon UK, with more than 36,000 ratings behind it, measures 137cm by 150cm. A UK double mattress is 190cm long. That blanket stops roughly 40cm short of your feet, and its own listing says so, in the gentlest possible words: it "sits neatly away from the edges". Meanwhile a rival double at £4 less covers the full 193cm. Running cost claims are just as slippery, since one brand advertises 1p per hour on one product and 1p per night on another, and not a single listing in this guide states its wattage. So we ranked the best electric blanket options on the things you can actually check: real measured size against a real mattress, number of heat settings, which safety mark is named, and whether the thing is designed to be slept on at all.', // INTRO OTIMIZADA
            'conclusion' => 'The best electric blanket for most people is a fully fitted heated underblanket that matches your actual mattress measurements, not the size word on the box. Get a tape measure out first: a UK single is 190 x 90cm, a double is 190 x 137cm, and a king is 203 x 152cm, and several blankets sold under those names are considerably smaller. After size, the decisions get simpler. Dual controls are worth the money if two of you share the bed and disagree about warmth. Three heat settings is enough for a bed you sleep in; ten settings matters more on a throw you sit under while awake. And keep the two product types straight, because they are not interchangeable: an underblanket goes beneath your sheet and is built to be slept on, while a heated throw goes over you on the sofa and its listing will usually describe sofa use rather than overnight use. If you plan to leave it on while you sleep, check the manual says that is intended, and favour a blanket that names its safety approval rather than one that stays quiet about it.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                        // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-27 15:00:00',                              // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'Dreamcatcher Double Electric Blanket, Fully Fitted, Dual Control',         // NOME
                'price' => '£33.98',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 6143,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71bJi6nOSxL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Dreamcatcher double fully fitted electric underblanket in white',      // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01I4A47UQ?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only mid-price double here that actually covers a double mattress: 193 x 137cm fully fitted, with dual controls and overheat protection, for £4 less than the market leader.', // TEXTO CURTO DO CARD
                'body' => 'This wins on the one specification the category keeps fudging. At 193 x 137cm it matches a UK double mattress properly, with a fully elasticated fitted skirt that holds it in place all night instead of rucking up into a ridge under your hip. Compare that with the Silentnight double further down this list, which measures 137 x 150cm and costs £4 more, and the choice becomes straightforward.

The rest is well specified for £33.98. Two controllers mean each side of the bed sets its own warmth, which removes the most common argument couples have about a heated underblanket. Three heat settings is enough for sleeping, since anything hotter than the middle setting tends to wake you up rather than settle you. The controllers and cable detach fully so the blanket machine washes at 40 degrees, and the listing names overheat protection along with a 2.3m cable, which is long enough to reach a socket behind most headboards.

It holds 4.4 from 6,143 ratings, a large and mature sample. The listing does not name a specific safety approval mark, which the Slumberdown at number two does, and it does not state a wattage, which nothing in this guide does. Neither point outweighs being the correctly sized double at a fair price.',
                'pros' => ['193 x 137cm, genuinely fits a UK double mattress', 'Fully fitted elasticated skirt keeps it flat all night', 'Two controllers for independent sides of the bed', 'Machine washable at 40 degrees with detachable cable', '6,143 ratings at 4.4'],
                'contras' => ['Does not name a specific safety approval mark', 'Only three heat settings', 'No wattage published, so the running cost cannot be checked'],
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'Slumberdown Sleepy Nights Electric Blanket, Small Single',                 // NOME
                'price' => '£21.80',                                                                 // PRECO NA COLETA (O MAIS BARATO DA LISTA)
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 2686,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71eYpvl8lDL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Slumberdown Sleepy Nights small single heated underblanket in white',  // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FTZNW466?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest blanket here at £21.80, and the only one of the ten that names BEAB approval, the British safety mark for electric blankets.', // TEXTO CURTO DO CARD
                'body' => 'Across all ten listings we pulled, exactly one names BEAB approval, and it is the cheapest product in the guide. That is worth pausing on. BEAB is the British safety mark that has been associated with electric blankets in the UK for decades, and it is the approval a buyer would most expect to see mentioned on this particular product. Homefront names UKCA and CE, Cosi Home names CE, Mia and Coco names ETL, which is a North American mark rather than a British one, and four listings name nothing at all.

Beyond that, this is a sensibly plain heated underblanket. Three heat settings, elasticated straps to hold it on the mattress, a detachable controller so it machine washes at 40 degrees, and a two-year guarantee. The listing also carries the useful warning that it must be completely dry before use, which is exactly the sort of instruction that gets skipped.

It is a small single, so it is the wrong blanket for a double bed and the listing does not publish its measurements in the bullets, which is the one thing we would want it to fix. Check the size on the product page against your mattress before ordering. At £21.80 with 2,686 ratings at 4.3, though, it is the least you can spend on an energy efficient electric blanket from a recognised bedding brand.',
                'pros' => ['Only blanket in this guide to name BEAB approval', 'Cheapest here at £21.80', 'Two-year guarantee', 'Machine washable at 40 degrees, detachable controller', 'Elasticated straps hold it to the mattress'],
                'contras' => ['Small single only, wrong for a double bed', 'Measurements not published in the bullet points', 'Three heat settings and a single controller', 'No wattage stated'],
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'Homefront King Size Dual Control Heated Mattress Cover',                   // NOME
                'price' => '£84.99',                                                                 // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 6155,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71aTwmjuGhL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Homefront king size dual control fleece heated mattress cover in white', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B002U0H9KC?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The most thoroughly specified blanket in the guide: a true 152 x 203cm king fit, a 20 to 40cm deep skirt, separate 9-level body and foot heating per side, and named UKCA and CE approval.', // TEXTO CURTO DO CARD
                'body' => 'This is what a properly written electric blanket listing looks like. It states the mattress it fits, 152 x 203cm UK king size. It states how deep a mattress the elasticated skirt will stretch over, 20 to 40cm, which is the measurement that decides whether it stays put on a thick pocket-sprung mattress. It names UKCA and CE testing plus RoHS compliance. It gives the wash temperature, 30 degrees. Nothing here requires guesswork.

The heating is also the most sophisticated in this guide. Each side has its own controller with nine body heat settings, nine separate foot heat settings and ten timer options. Separating body and feet is genuinely useful rather than a spec-sheet flourish, because cold feet and an overheated back is the normal complaint with a single-zone blanket, and this is the only product here that addresses it.

At £84.99 it is the third most expensive item in the guide, and for a single sleeper the value case is weak against the £33.98 Dreamcatcher. For a couple sharing a king bed, where one person runs cold and the other does not, the dual zones and the correct deep fit justify the money. It holds 4.5 from 6,155 ratings, the strongest score of the large-sample products here.',
                'pros' => ['True 152 x 203cm king fit with a 20 to 40cm deep skirt', 'Nine body and nine foot heat settings on each side', 'Ten timer options per controller', 'Names UKCA, CE and RoHS compliance', '4.5 from 6,155 ratings, the best of the large samples'],
                'contras' => ['£84.99, expensive for a single sleeper', 'Washes at 30 degrees rather than 40', 'No wattage or running cost figure given', 'King size only, so no smaller option on this listing'],
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'Silentnight Comfort Control Electric Blanket, Single',                     // NOME
                'price' => '£31.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 36823,                                                            // Nº DE AVALIACOES (MAIOR AMOSTRA DA BUSCA INTEIRA)
                'image' => 'https://m.media-amazon.com/images/I/71OXQzPltHL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Silentnight Comfort Control single heated underblanket with digital controller', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00L67CZ9U?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'By far the most reviewed electric blanket in the UK, with 36,823 ratings and a 3-year guarantee. Read the dimensions before you buy: it is 135 x 120cm, on a mattress that is 190 x 90cm.', // TEXTO CURTO DO CARD
                'body' => 'This is the default purchase in the category and there are good reasons for that. A sample of 36,823 ratings at 4.4 dwarfs everything else here, the three-year manufacturer guarantee is the longest in this guide, and the pinsonic channel construction that holds the heating wires in place is a real engineering answer to the wire-bunching that ruins cheaper blankets. Four heat settings, a digital controller, fast heat up, machine washable. As a piece of hardware it deserves its sales.

The dimension is the thing to understand before you order. It measures 135 x 120cm. A UK single mattress is 190 x 90cm. So this blanket is 55cm shorter than the bed and 30cm wider than it, which means it is not a fitted cover at all but a torso pad that warms the middle of the mattress. The listing describes this positively, saying the blanket "sits neatly away" from the edges, and for a lot of buyers that is genuinely fine, because the warmth you want is under your back rather than under your feet. It is simply not what most people picture when they buy a single electric blanket.

The running cost line is the other thing to read carefully. It promises warmth "from just 1p per hour" with an asterisk, and no wattage appears anywhere on the page, so there is no way to check the claim or work out what it would cost on your own tariff.',
                'pros' => ['36,823 ratings at 4.4, the largest sample in the category', 'Three-year manufacturer guarantee, the longest here', 'Pinsonic channels hold the heating wires in place', 'Four heat settings with a digital controller', 'Elasticated straps and fully machine washable'],
                'contras' => ['135 x 120cm on a 190 x 90cm single mattress, so it is a torso pad', 'The 1p per hour claim has an asterisk and no wattage behind it', 'No safety approval mark named on the listing', 'Rating pool appears shared with other Silentnight sizes'],
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'Mia&Coco Electric Heated Throw Blanket, 180 x 130cm',                      // NOME
                'price' => '£25.49',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 11131,                                                            // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/8161NrJxalL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Mia and Coco flannel sherpa electric heated throw blanket in blue',    // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09JK19Z64?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The best value heated throw here at £25.49, with 11,131 ratings and the only listing in the guide that publishes its actual temperature range: 25°C to 53°C across ten levels.', // TEXTO CURTO DO CARD
                'body' => 'Note the category change: this is a heated throw, not an underblanket. It goes over you on the sofa rather than under your sheet, and at 180 x 130cm in flannel with a sherpa backing it is large enough to cover two adults on a settee. If you have been comparing it against the fitted underblankets above, you are comparing two different products.

On its own terms it is the value pick of the throws. It costs £25.49, holds 4.4 from 11,131 ratings, and it does something no other listing in this guide manages: it publishes the actual temperature range the product reaches, 25°C to 53°C, across ten levels. Everywhere else you get a count of settings with no idea what any of them mean. There is also a nine-hour auto-off timer with hourly steps, and the cord detaches for machine washing.

Two caveats. The safety mark named is ETL, which is a North American certification rather than a British one, and no UKCA, CE or BEAB approval is mentioned. And because it is a throw rather than an underblanket, check the manual before using it overnight in bed, since throws are designed for use while you are awake and sitting under them. As a sofa blanket for winter evenings, at this price and with this much feedback behind it, it is hard to beat.',
                'pros' => ['£25.49 with 11,131 ratings at 4.4', 'Publishes its real temperature range, 25°C to 53°C', 'Ten heat levels and a nine-hour auto-off timer', 'Large 180 x 130cm flannel and sherpa construction', 'Detachable cord for machine washing'],
                'contras' => ['Names ETL, a North American mark, rather than a UK approval', 'A throw, so not designed the same way as a blanket you sleep on', 'No wattage or running cost figure', 'Sherpa backing takes a long time to dry after washing'],
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'Cosi Home Luxury Heated Throw, Extra Large 160 x 130cm',                   // NOME
                'price' => '£42.49',                                                                 // PRECO NA COLETA
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 5794,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/81CvOeZwKbL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Cosi Home luxury micro fleece heated throw blanket in grey',           // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07FF6B5F9?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A double-sided micro fleece throw with ten heat settings, a ten-hour timer and named CE compliance. It costs £17 more than the Mia and Coco and is 20cm shorter.', // TEXTO CURTO DO CARD
                'body' => 'Cosi Home has built a solid reputation in heated throws and 5,794 ratings at 4.3 reflect that. The micro fleece is double-sided and noticeably plusher than the budget throws, the digital remote is well designed with large soft-touch buttons and a screen, and the ten-hour programmable timer with automatic cut-off is the longest timer in this guide, which matters if you routinely fall asleep under it.

It also names its compliance properly, stating CE conformity for UK and European standards alongside an overheat protection system. Among the throws here that puts it ahead of the Mia and Coco, which names only the North American ETL mark, and it is the sort of detail worth paying something for on a product that runs unattended.

The awkward comparison is size against price. At 160 x 130cm it is 20cm shorter than the £25.49 Mia and Coco while costing £17 more, so the extra money buys fabric quality, the remote and the CE marking rather than coverage. The listing also appears twice on Amazon under different ASINs at the same £42.49, one carrying 5,794 ratings and the other only 335, so make sure you are looking at the well-reviewed one before you order.',
                'pros' => ['Double-sided micro fleece, the plushest throw fabric here', 'Ten heat settings and a ten-hour timer with auto cut-off', 'Names CE compliance and overheat protection', 'Digital remote with a screen and large buttons', 'Fully machine washable with detachable cable'],
                'contras' => ['£17 more than the Mia and Coco while being 20cm shorter', 'Sold under two ASINs at the same price with very different review counts', 'A throw, so check the manual before overnight use', 'No wattage published'],
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'Silentnight Dual Control Electric Blanket, Double',                        // NOME
                'price' => '£37.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 4621,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/717sWWmte0L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Silentnight dual control double heated underblanket with two controllers', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0777K6KK7?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Dual controls and the Silentnight build quality, but it measures 137 x 150cm on a mattress that is 190cm long, and it costs £4 more than a rival that covers the whole bed.', // TEXTO CURTO DO CARD
                'body' => 'Everything good about the Silentnight at number four applies here as well: pinsonic channels holding the wires in place, a built-in auto shut off, elasticated fitting straps, machine washable, and a three-year manufacturer guarantee that nothing else in this guide matches. Adding two controllers so each side of the bed sets its own warmth is exactly what a double should do, and 4,621 ratings at 4.4 say buyers are broadly happy.

The measurement is the reason it sits at seven rather than near the top. It is 137 x 150cm. A UK double mattress is 190 x 137cm. The width is right and the length is 40cm short, so it warms from your shoulders to somewhere around your knees and then stops. The listing frames this as a feature, explaining that the blanket "sits neatly away from the edges to ensure it remains" in place, which is true but is not the same as covering your bed.

Put it next to the Dreamcatcher at number one and the comparison is uncomfortable. That blanket is 193 x 137cm, covers the entire mattress, also has dual controls and overheat protection, and costs £33.98 against £37.99 here. You are paying £4 more for a shorter blanket, and buying the longer guarantee and the better-known name.',
                'pros' => ['Two controllers for independent sides of the bed', 'Three-year manufacturer guarantee, longest in this guide', 'Pinsonic channels prevent the heating wires bunching', 'Built-in auto shut off and elasticated straps', '4,621 ratings at 4.4'],
                'contras' => ['137 x 150cm on a 190cm double mattress, 40cm short of the foot', '£4 more than a rival that covers the whole mattress', 'Only three heat settings against four on the single version', 'The 1p per hour claim carries an asterisk and no wattage'],
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'Dreamland King Bamboo Electric Blanket, 200 x 150cm',                      // NOME
                'price' => '£139.99',                                                                // PRECO NA COLETA (O MAIS CARO DA LISTA)
                'rating' => 4.6,                                                                     // NOTA (MAIOR DA LISTA)
                'reviews_count' => 301,                                                              // Nº DE AVALIACOES (AMOSTRA PEQUENA — SINALIZADO NO TEXTO)
                'image' => 'https://m.media-amazon.com/images/I/71oRDoTm5QL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Dreamland king size bamboo electric underblanket in white',            // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DJC45TRX?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The highest rated blanket here at 4.6, in breathable bamboo with dual LED controls and 5-minute heat up. It is also £139.99, and its running cost claim contradicts the same brand own throw.', // TEXTO CURTO DO CARD
                'body' => 'The bamboo construction is the reason to consider this over a cheaper fleece underblanket, and it is not marketing. Bamboo fibre breathes and moves moisture far better than polyester fleece, which is the difference between waking up warm and waking up clammy, and it suits sensitive skin. At 200 x 150cm it is a proper king fit, the two detachable LED controllers give each side six temperature settings, and Intelliheat brings it up to temperature in about five minutes. It holds 4.6, the best score in this guide.

Two things keep it at eighth. The first is evidence: 301 ratings is a fraction of the 6,155 behind the Homefront king at number three, which costs £55 less and offers nine body and nine foot settings per side rather than six. On a product whose failure mode is an electrical fault after two winters, that gap in feedback matters.

The second is the running cost claim, and it is the clearest contradiction we found in this category. This listing says the blanket costs "as little as 1p per night to run". Dreamland own Snuggle Up throw, at number nine below, says it "runs for as little as 1p per hour". Those cannot both describe the same kind of arithmetic: if a night is eight hours, they are eight times apart. Neither product states a wattage, so there is no way to reconcile them. For reference, 1p an hour at 25p per kWh implies about 40W, while 1p a night over eight hours would imply 5W, which is not plausible for a king size heated underblanket.',
                'pros' => ['Breathable bamboo, better than fleece for moisture and sensitive skin', 'True 200 x 150cm king size fit', 'Two detachable LED controllers with six settings each', 'Five-minute heat up with Intelliheat', '4.6, the highest rating in this guide'],
                'contras' => ['£139.99, by far the most expensive blanket here', 'Only 301 ratings, the thinnest sample in this guide', 'Claims 1p per night while the same brand claims 1p per hour elsewhere', 'Six heat settings against eighteen zones on a cheaper king'],
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'Dreamland Snuggle Up Electric Throw, Velvet',                              // NOME
                'price' => '£69.00',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 2052,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71n9tsFYhwL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Dreamland Snuggle Up velvet electric heated throw in navy blue',       // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09WF8QDFM?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A plush velvet throw that heats in five minutes and is both machine washable and tumble dryable, which is rare here. At £69 it costs nearly three times the Mia and Coco.', // TEXTO CURTO DO CARD
                'body' => 'This is the premium heated throw of the guide and it feels like it. Velvet plush rather than fleece, Intelliheat bringing it to temperature in five minutes, six heat settings, and a timer offering one, three or nine hour auto-shutoff. The detail that quietly matters most is that it is tumble dryable as well as machine washable. Almost every other blanket here has to be air dried, which in a British winter means it is out of action for two days after every wash.

It is also the product that sits on the other side of the Dreamland running cost contradiction. Here the claim is that the throw "runs for as little as 1p per hour", while the same brand king underblanket at number eight claims 1p per night. Both figures come from a brand that publishes no wattage on either product, so neither can be checked. Treat both as marketing rather than as a number you can budget against.

The harder question is price. At £69 it costs £43.51 more than the Mia and Coco throw at number five, which is larger at 180 x 130cm, has five times the review count and publishes its actual temperature range. What you get for the difference is the velvet, the faster heat up and the tumble drying. That is a real upgrade, just not a £43.51 one for most people.',
                'pros' => ['Velvet plush, the nicest fabric among the throws here', 'Five-minute heat up with Intelliheat', 'Tumble dryable as well as machine washable, rare in this guide', 'Timer with 1, 3 and 9-hour auto-shutoff', '2,052 ratings at 4.4'],
                'contras' => ['£69, nearly three times the price of a larger throw here', 'Claims 1p per hour while the same brand claims 1p per night elsewhere', 'Only six heat settings at this price', 'No safety approval mark named'],
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'MONHOUSE Premium Soft Fleece Heated Under Blanket, Double',                 // NOME
                'price' => '£21.99',                                                                 // PRECO NA COLETA
                'rating' => 4.1,                                                                     // NOTA (MENOR DA LISTA)
                'reviews_count' => 1972,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/81yFkXd4zZL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'MONHOUSE premium soft fleece heated underblanket in white',            // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09BG1NW3S?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A double heated underblanket for £21.99 with overheat protection and dryer-safe fabric, but the listing never states a single measurement and it holds the lowest rating here.', // TEXTO CURTO DO CARD
                'body' => 'At £21.99 for a double this is the cheapest way into a heated underblanket at that size, and the basics are covered: three heat settings, overheat protection with automatic shut off, a detachable controller, and fabric that is both machine washable and dryer safe, which puts it ahead of most of this guide on practicality.

The problem is that the listing tells you almost nothing you can check. It describes the blanket as "a great size, ensuring that you are fully covered head-to-toe" and never gives a single measurement anywhere in the bullet points or the specification table. In a category where the market leader sells a double that stops 40cm short of your feet, "a great size" is not an answer. It also names no safety approval, no wattage, no wash temperature and no guarantee period.

At 4.1 from 1,972 ratings it holds the lowest score in this guide from a sample large enough to take seriously, which fits the pattern of a product that is fine rather than good. If your budget is genuinely £22 and you need a double, it will warm your bed. If you can stretch to £33.98, the Dreamcatcher at number one publishes every number this one omits and rates a third of a point higher.',
                'pros' => ['£21.99 for a double, the cheapest double here', 'Machine washable and dryer safe, unusual in this guide', 'Overheat protection with automatic shut off', 'Detachable controller and cable', '1,972 ratings behind it'],
                'contras' => ['No measurements given anywhere on the listing', 'Lowest rating in this guide at 4.1', 'No safety approval, wattage, wash temperature or guarantee stated', 'Describes its size only as covering you head to toe'],
            ],
        ];

        // ═══════════════════════════════════════════════════════════════
        // ═══ FIM DA AREA EDITAVEL — NAO PRECISA MEXER ABAIXO ═══
        // ═══════════════════════════════════════════════════════════════

        $categoryModel = Category::updateOrCreate( // CRIA OU ATUALIZA A CATEGORIA PELO SLUG (NAO DUPLICA)
            ['slug' => $category['slug']], // CHAVE DE BUSCA: SLUG DA CATEGORIA
            $category, // DADOS A SEREM GRAVADOS/ATUALIZADOS
        );

        $articleModel = Article::updateOrCreate( // CRIA OU ATUALIZA O ARTIGO PELO SLUG (NAO DUPLICA)
            ['slug' => $article['slug']], // CHAVE DE BUSCA: SLUG DO ARTIGO
            array_merge($article, ['category_id' => $categoryModel->id]), // VINCULA O ARTIGO A CATEGORIA
        );

        $articleModel->products()->delete(); // REMOVE OS PRODUTOS ANTIGOS DESTE ARTIGO PARA REFLETIR EDICOES SEM DUPLICAR

        foreach ($products as $produto) { // PERCORRE A LISTA MANUAL DE PRODUTOS
            $articleModel->products()->create($produto); // RECRIA CADA PRODUTO VINCULADO AO ARTIGO
        }

        $this->command?->info(static::class.": 1 categoria, 1 artigo e ".count($products)." produtos."); // RESUMO DO QUE FOI POPULADO
        $this->command?->info("URL do artigo: /{$category['slug']}/{$article['slug']}"); // URL ONDE O ARTIGO FICA ACESSIVEL
    }
}
