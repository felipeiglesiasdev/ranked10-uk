<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class MicroSD64Seeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE CARTOES MICROSD 64GB DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // FOCUS KEYWORD: best 64gb microsd card
        // KEYWORDS SECUNDARIAS: best micro sd card 64gb / 64gb micro sd card /
        // microsdxc 64gb / 64gb memory card / 64gb card for switch /
        // 64gb card for gopro / micro sd card for dash cam / 64gb card for drone /
        // cheap microsd card / 64gb tf card
        //
        // ANGULO PROPRIO (TERCEIRO DO CLUSTER, PRECISA SER DIFERENTE DOS OUTROS DOIS):
        // 256GB usa A1 x A2 e capacidade para 4K. 128GB usa a dispersao de preco DENTRO da capacidade.
        // AQUI O EIXO E A COMPARACAO ENTRE CAPACIDADES: NO MESMO MODELO, O 128GB CUSTA SO £4 A £9,38
        // A MAIS E DOBRA O ESPACO. ENTAO A PERGUNTA HONESTA E "QUANDO 64GB AINDA FAZ SENTIDO?".
        // ISSO TAMBEM MANDA TRAFEGO INTERNO PARA O ARTIGO DE 128GB, QUE TEM COMISSAO MAIOR.
        //
        // ATENCAO A INCONSISTENCIAS NAS LISTAGENS:
        // - NETAC: O TITULO DIZ "U3 ... V30" MAS O PROPRIO BULLET DIZ "speed Class U1/V10". CONTRADICAO.
        // - SANDISK HIGH ENDURANCE: ESTE 64GB DIZ 20.000 HORAS ENQUANTO O 128GB DIZ 10.000. ESTRANHO,
        //   PORQUE CARTAO MAIOR COSTUMA DURAR MAIS. O TEXTO CITA O NUMERO DA LISTAGEM E SINALIZA A DUVIDA.
        // - KOOTION: BULLET FALA EM "32 GB micro SD card" NO MEIO DA DESCRICAO DO 64GB (TEXTO DE FAMILIA).
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MESMO TEXTO JA CADASTRADO)
        ];

        $article = [
            'slug' => 'best-64gb-microsd-cards',                                 // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK" (SITE JA E UK)
            'title' => 'Best 64GB MicroSD Cards in 2026: 10 Ranked, and When 128GB Wins', // TITULO / H1 - PLURAL CONTEM O SINGULAR COMO PREFIXO
            'meta_title' => 'Best 64GB MicroSD Cards 2026: Top 10 Ranked',        // TITLE DA ABA/GOOGLE (43 CHARS)
            'meta_description' => 'We ranked the best 64GB microSD card options on Amazon on speed, endurance and price per GB — plus when to pay £4 more for 128GB instead.', // META DESCRIPTION (137 CHARS)
            'focus_keyword' => 'best 64gb microsd card',                         // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Before you buy a 64GB card, do one quick check, because it will save you money surprisingly often. Take the SanDisk Ultra: £18.99 at 64GB, £22.99 at 128GB. That is £4 for twice the storage. The Extreme is £20.99 against £27.99, so £7 for double. Across every model that appears in both sizes, 64GB works out 40% to 65% worse per gigabyte. So the honest way to pick the best 64GB microSD card is to first ask whether you should be buying 64GB at all — and there are three good reasons you might be. Your device caps out at 64GB, which many older phones, dash cams and cheaper action cameras do. You are buying several cards and the unit price matters more than the capacity. Or you genuinely will not fill it. If any of those apply, this ranking covers the top 10 64GB cards on Amazon on read and write speed, app rating, endurance and price per gigabyte.", // INTRO OTIMIZADA - FOCUS KEYWORD + ANGULO PROPRIO
            'conclusion' => "Picking the best 64GB microSD card follows the same rule as any capacity: match the card to the device, not to the biggest number on the packet. For a phone, the A1 or A2 app rating decides how quickly apps open from the card, and read speed barely matters. For a camera, drone or action cam, write speed and a V30 rating are what stop frames dropping mid-recording, and write speed is the figure most listings omit entirely. For a dash cam or security camera, buy an endurance-rated card and ignore speed almost completely, because those devices overwrite the same card day after day until a normal card gives out. And keep the price check in mind: if your device accepts 128GB, the same model usually costs only a few pounds more and doubles what you get, which is why our 128GB guide is worth a look before you order.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + LINK INTERNO CONTEXTUAL
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-19 19:39:58', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'SanDisk 64GB Extreme microSD + Adapter, 170MB/s Read, 80MB/s Write, A2, V30', // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£20.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 11157,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71PYMjzwsVL._AC_SX679_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'best 64gb microsd card',                                              // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://amzn.to/4bXcWS9',                                       // LINK AFILIADO
                'summary' => "The best 64GB microSD card overall: the only one here with A2, V30 and U3 together, plus a stated 80MB/s write speed and 11,157 ratings.", // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "If you want one answer without weighing trade-offs, this is it. The Extreme is the only card in this ranking that carries every rating that matters at once: A2 for app performance, V30 for sustained video, U3 for speed class, and it publishes both speeds rather than just the flattering one — 170MB/s read and 80MB/s write.

Write speed is the specification that separates a camera card from a phone card, and it is the one most listings leave out. Of the ten cards here, six state a write figure; this has the second highest of them. That is what determines whether an action camera or drone keeps recording 4K cleanly instead of stalling.

The A2 rating is the other reason it leads. A1 covers basic app loading; A2 demands much higher random read and write performance, which is what you notice when apps installed on the card open and update. SanDisk's QuickFlow Technology handles the fast offload, though note the listing's caveat that top speeds need SanDisk's own PRO-READER, sold separately. At £20.99 it is £0.328 per gigabyte — and worth knowing that the 128GB version of this exact card is £27.99, so £7 more doubles your storage if your device takes it.", // TEXTO SEO LONGO - FOCUS KEYWORD + COMPARACAO DE CAPACIDADE
                'pros' => ['Only card here with A2, V30 and U3 together', 'Publishes both speeds: 170MB/s read and 80MB/s write', '11,157 ratings behind a 4.6 average', 'QuickFlow Technology for fast offload'], // PONTOS POSITIVOS
                'contras' => ['The 128GB version is only £7 more for double the space', 'Top read speed needs SanDisk’s own reader, sold separately'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'SanDisk 64GB Ultra microSD + Adapter, up to 140MB/s Read, A1',            // NOME (ENCURTADO)
                'price' => '£18.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 176535,                                                           // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71vUw2k+k6L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'SanDisk 64GB Ultra microSD + Adapter, up to 140MB/s Read, A1',        // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3S3hQq5',                                       // LINK AFILIADO
                'summary' => "176,535 ratings — the most reviewed card in this ranking by a mile — and the obvious default if it is going into a phone.", // TEXTO CURTO (CARD)
                'body' => "With 176,535 ratings this is the most reviewed product in the whole ranking, and that matters more than any single specification. A card with that much feedback behind it has no hidden failure mode left to discover.

It is built for phones and tablets and the specification is honest about that. The A1 rating optimises it for app loading and everyday Android use, and transfer speeds are quoted at up to 140MB/s in the title and 150MB/s in the description — a small inconsistency in SanDisk's own listing, so treat 140MB/s as the safe figure. What it does not carry is U3 or V30, and no write speed is published, so this is not the card for sustained 4K.

The Memory Zone app is genuinely useful in an Android phone: browse files, run automatic backups and shift content off internal storage to free up space, all without a computer. At £18.99 it is the cheapest SanDisk here. Do the capacity check though — the 128GB version of this same card is £22.99, which is £4 more for twice the storage and the single clearest example of why 64GB often does not add up.", // TEXTO SEO LONGO - SINALIZA INCONSISTENCIA DE VELOCIDADE
                'pros' => ['176,535 ratings, the most on this list', 'A1-rated for fast app loading on Android', 'Memory Zone app manages files with no computer needed', 'Cheapest SanDisk card here'], // PONTOS POSITIVOS
                'contras' => ['The 128GB version is just £4 more for double the space', 'No U3, V30 or published write speed'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'PNY Pro Elite 64GB microSDXC, 100MB/s Read, 90MB/s Write, A1, V30, U3',   // NOME (ENCURTADO)
                'price' => '£16.49',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 3976,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/51s5MP0RbAL._AC_SL1000_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'PNY Pro Elite 64GB microSDXC, 100MB/s Read, 90MB/s Write, A1, V30, U3', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4gqy98p',                                       // LINK AFILIADO
                'summary' => "The surprise of this list: a 90MB/s write speed, the fastest here, on a card costing £16.49 — cheaper than both SanDisks above it.", // TEXTO CURTO (CARD)
                'body' => "This is the card that makes the ranking interesting. At £16.49 it undercuts both SanDisks, yet its 90MB/s write speed is the highest published figure on this entire list — ahead of the Extreme's 80MB/s, and more than double the 35MB/s of the Gigastone cards that cost twice as much.

For anyone buying a card for a camera, drone or action cam, that is the number that counts. Write speed governs whether footage records cleanly; read speed only affects how quickly you copy it off afterwards. PNY pairs it with V30 and U3 video speed classes, so the sustained-write guarantee is there in writing, plus A1 for app performance and an SD adapter in the box.

Where it gives ground is read speed and brand familiarity. At 100MB/s read it is well behind the Extreme's 170MB/s, so offloading a full card takes noticeably longer, and A1 rather than A2 means slightly weaker app performance if you run software from it. PNY is also less of a household name in the UK than SanDisk or Samsung, though 3,976 ratings at 4.6 is a reasonable track record. For value per specification, nothing else here comes close.", // TEXTO SEO LONGO
                'pros' => ['Fastest write speed on this list at 90MB/s', 'Cheaper than both SanDisk cards above it', 'V30 and U3 rated with A1 app performance', 'SD adapter included'], // PONTOS POSITIVOS
                'contras' => ['100MB/s read is well behind the SanDisk Extreme', 'A1 rather than A2 for app performance'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'SanDisk 64GB High Endurance microSD + Adapter, U3, V30',                 // NOME (ENCURTADO)
                'price' => '£25.47',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 9724,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/51oJCDI5HbL._AC_SL1200_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'SanDisk 64GB High Endurance microSD + Adapter, U3, V30',              // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4xgpVXS',                                       // LINK AFILIADO
                'summary' => "The highest rated card here at 4.7, and the only right answer for a dash cam — where a standard card will quietly wear out and fail.", // TEXTO CURTO (CARD)
                'body' => "A dash cam or home security camera records in a continuous loop, overwriting the same card thousands of times over. Standard microSD cards are not built for that duty cycle and they fail — usually without warning, so you find out when you need the footage and it is not there. This card exists for exactly that job, and its 4.7 average across 9,724 ratings is the best score-and-sample combination in this ranking.

SanDisk rates it for continuous recording and pairs that with Class 10, U3 and V30, so it still handles Full HD and 4K capture properly rather than trading all its performance for longevity. Build is the usual SanDisk standard: temperature-proof, waterproof, shockproof and X-ray-proof.

One figure to treat with care. This 64GB listing quotes up to 20,000 hours of recording, while SanDisk's own 128GB High Endurance listing quotes 10,000 hours — which is backwards, since a larger card normally spreads writes further and lasts longer. One of the two numbers looks wrong, so take the endurance claim as directional rather than exact. At £25.47 it is dearer than faster cards here, but for a device that records all day every day it is the only sensible pick on this list.", // TEXTO SEO LONGO - SINALIZA A INCONSISTENCIA DE HORAS
                'pros' => ['Highest rating here at 4.7 from 9,724 ratings', 'Built for continuous overwriting in dash cams', 'Still V30 and U3 rated for 4K capture', 'Temperature, water, shock and X-ray proof'], // PONTOS POSITIVOS
                'contras' => ['Endurance hours conflict with SanDisk’s own 128GB listing', 'Wasted money outside a continuously recording device'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Netac 64GB MicroSDXC, 100MB/s Read, 30MB/s Write, A1',                   // NOME (ENCURTADO)
                'price' => '£13.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 12544,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61CDT0-CCiL._AC_SL1430_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Netac 64GB MicroSDXC, 100MB/s Read, 30MB/s Write, A1',                // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4yaBeAX',                                       // LINK AFILIADO
                'summary' => "The best-reviewed budget card here: 12,544 ratings at £13.99, with A1 app performance and a stated write speed.", // TEXTO CURTO (CARD)
                'body' => "At £13.99 with 12,544 ratings, this is the strongest combination of low price and real evidence on the list. It is the second cheapest card here and has more feedback behind it than every card above it except the SanDisk Ultra.

It publishes both figures — 100MB/s read and 30MB/s write — which is more honesty than several pricier cards manage, and carries an A1 rating that Netac quantifies as 1,500 read IOPS and 500 write IOPS. Durability claims cover shock, water, temperature, X-ray and magnets, and Netac makes the practical point that it survives airport security scanners, which matters if you travel with a drone or action camera.

One contradiction needs flagging before you buy. The product title lists U3 and V30, but Netac's own description says the card is 'speed Class U1/V10' — two very different guarantees. U1/V10 means a 10MB/s sustained write floor; U3/V30 means 30MB/s. The 30MB/s write figure quoted elsewhere in the listing suggests the truth sits at the V30 end, but with the listing contradicting itself, treat this as a Full HD card rather than a guaranteed 4K one.", // TEXTO SEO LONGO - SINALIZA A CONTRADICAO U3/V30 x U1/V10
                'pros' => ['12,544 ratings at just £13.99', 'Publishes both read and write speeds', 'A1 rating quantified at 1,500 read IOPS', 'Rated to survive airport X-ray scanners'], // PONTOS POSITIVOS
                'contras' => ['Listing contradicts itself: title says U3/V30, description says U1/V10', '30MB/s write is modest for 4K recording'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Biwin MS100 64GB MicroSDXC, A1, V30, U3, up to 100MB/s',                 // NOME (ENCURTADO)
                'price' => '£15.49',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 458,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61MRKxKYRNL._AC_SX679_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Biwin MS100 64GB MicroSDXC, A1, V30, U3, up to 100MB/s',              // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3SjT7xB',                                       // LINK AFILIADO
                'summary' => "Clean U3 and V30 ratings with no contradictions in the listing, aimed at dash cams and security cameras as much as phones.", // TEXTO CURTO (CARD)
                'body' => "The MS100 does something the Netac above it does not: it states U3 and V30 consistently throughout the listing, with no contradiction between the title and the description. For a card you intend to use for 4K, that clarity is worth more than a pound or two of price difference.

Biwin is an unfamiliar name to most UK buyers, but the company has spent decades manufacturing storage and memory components that end up inside other brands' devices, and the MS100 is its own consumer-facing card. Read speed is 100MB/s, and it is positioned explicitly for smartphones, tablets, home security cameras and dash cams rather than being sold as a phone card that might cope with a camera.

Environmental protection covers harsh temperatures, dust, shock and X-rays. The limitation is evidence: 458 ratings is the second-smallest sample on this list, so there is far less long-term feedback than on the SanDisk and Netac cards. At £15.49 it sits between the budget options and the SanDisks, and it is a reasonable pick if you want the V30 guarantee stated plainly without paying SanDisk prices.", // TEXTO SEO LONGO
                'pros' => ['U3 and V30 stated consistently, unlike the Netac', 'Explicitly built for dash cams and security cameras', 'Rated against temperature, dust, shock and X-rays', 'Backed by decades of storage manufacturing'], // PONTOS POSITIVOS
                'contras' => ['Only 458 ratings, the second-smallest sample here', 'No write speed published'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'KOOTION 64GB Micro SD Card, 80MB/s Read, 20MB/s Write, U1, Class 10',    // NOME (ENCURTADO)
                'price' => '£13.59',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 10457,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61B-R2+rKQS._AC_SL1500_.jpg',       // IMAGEM (DA PLANILHA)
                'alt_text' => 'KOOTION 64GB Micro SD Card, 80MB/s Read, 20MB/s Write, U1, Class 10', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4wzS5LW',                                       // LINK AFILIADO
                'summary' => "The cheapest card here at £13.59 with 10,457 ratings, but also the slowest — and the only one rated below 4.5.", // TEXTO CURTO (CARD)
                'body' => "At £13.59 this is the cheapest card in the ranking, and with 10,457 ratings it is far from unproven. If all you need is somewhere to keep photos, music and documents on a phone or tablet, it does that job for less than anything else here.

Be clear about what you are giving up, though. At 80MB/s read and 20MB/s write it is the slowest card on this list in both directions — the write speed is less than a quarter of the PNY's 90MB/s. It carries U1 and Class 10 only, with no U3, no V30 and no A rating, so 4K recording is not guaranteed and app performance from the card will be noticeably slower. KOOTION markets it for GoPros and drones in the title, but the speed classes do not back that up for 4K.

Its 4.3 average is the lowest here, and it is the only card in the ranking below 4.5. One detail suggesting the listing is copied across the product family: a bullet in the middle of this 64GB description refers to 'the 32 GB micro SD card' and its FAT32 formatting. For basic storage at the lowest price it is fine. For anything that records video, spend the extra £2.90 on the Netac.", // TEXTO SEO LONGO - SINALIZA TEXTO DE FAMILIA E VELOCIDADE BAIXA
                'pros' => ['Cheapest card on this list at £13.59', '10,457 ratings, so far from untested', 'Publishes both read and write speeds', 'Fine for photos, music and documents'], // PONTOS POSITIVOS
                'contras' => ['Slowest here at 80/20MB/s, with no U3, V30 or A rating', 'Lowest rating on this list at 4.3'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Gigastone 64GB TLC High Endurance Pro, 95MB/s, A1, V30, U3',             // NOME (ENCURTADO)
                'price' => '£29.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 98,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71ayiuyV8gL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Gigastone 64GB TLC High Endurance Pro, 95MB/s, A1, V30, U3',          // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3UHipXi',                                       // LINK AFILIADO
                'summary' => "An endurance card with named dash cam compatibility and a 5-year warranty, but it costs £4.52 more than the far better proven SanDisk equivalent.", // TEXTO CURTO (CARD)
                'body' => "Gigastone takes a useful approach to the endurance category: rather than saying a card suits dash cams generally, it names the brands it is built to work with, including REDTIGER, Rove, VIOFO, Vantrue, Pruveeo and Arifayz. If you own one of those and have burned through cards before, that specificity is reassuring.

The specification is decent for the job. Read and write run at 95 and 35MB/s, with A1, V30 and U3 ratings, so 4K capture is covered, and the TLC flash is the part doing the endurance work. It ships with an SD adapter and a mini case, and carries a 5-year limited warranty, longer than most cards here offer.

The problem is the comparison sitting four places above it. The SanDisk High Endurance does the same job for £25.47 — £4.52 less — with a 4.7 rating from 9,724 ratings against this card's 4.4 from 98. That is a hundred-fold difference in evidence for less money. Unless you specifically want the named dash cam compatibility or the 5-year warranty, the SanDisk is the safer buy at every level.", // TEXTO SEO LONGO
                'pros' => ['Names specific dash cam brands it works with', '5-year limited warranty, the longest here', 'A1, V30 and U3 rated with TLC flash', 'Includes SD adapter and mini case'], // PONTOS POSITIVOS
                'contras' => ['£4.52 more than the SanDisk High Endurance', 'Only 98 ratings against the SanDisk’s 9,724'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Samsung EVO Plus 64GB MicroSDXC + SD Adapter, UHS-I U1, 160MB/s',        // NOME (ENCURTADO)
                'price' => '£32.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 183,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/41qRmY-mrDL._AC_SY300_SX300_QL70_ML2_.jpg', // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung EVO Plus 64GB MicroSDXC + SD Adapter, UHS-I U1, 160MB/s',     // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4wGhkN0',                                       // LINK AFILIADO
                'summary' => "Samsung's six-way protection and a 4.7 rating, but it is U1 only at £32.99 — nearly £12 more than a faster, better-rated SanDisk.", // TEXTO CURTO (CARD)
                'body' => "There is nothing wrong with the card itself. Samsung's six-way protection covers water, extreme temperatures, X-rays, magnets, drops and wearout, transfer speed is quoted at up to 160MB/s, an SD adapter is included, and the 4.7 average is the joint highest here.

The difficulty is what it costs relative to what it offers. At £32.99 it is the second most expensive card on this list, £0.515 per gigabyte, yet it carries only a UHS-I U1 speed class — the same basic tier as the £13.59 KOOTION, and two steps below the U3/V30 of cards costing half as much. No write speed is published at all. For £20.99 the SanDisk Extreme gives you A2, V30, U3 and a stated 80MB/s write.

Its 183 ratings are also the smallest sample in the ranking, which is unusual for a Samsung card and suggests this particular listing is not the one most buyers are choosing. The listing also notes performance varies by capacity and quotes availability up to 1TB, so the 160MB/s figure may describe larger cards in the family rather than this 64GB one. Buy Samsung by all means, but check the PRO range rather than this listing.", // TEXTO SEO LONGO
                'pros' => ['Joint highest rating here at 4.7', 'Samsung six-way protection with SD adapter', 'Wide device compatibility including consoles and drones', 'Established brand'], // PONTOS POSITIVOS
                'contras' => ['U1 only at £32.99, while £20.99 buys A2, V30 and U3', 'Only 183 ratings, the smallest sample on this list'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Gigastone 64GB 4K Camera Pro, 95MB/s Read, 35MB/s Write, A2, V30, U3',   // NOME (ENCURTADO)
                'price' => '£39.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 1794,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71X2-uxJmqL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Gigastone 64GB 4K Camera Pro, 95MB/s Read, 35MB/s Write, A2, V30, U3', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4wGZZTY',                                       // LINK AFILIADO
                'summary' => "The most expensive card here at £39.99 and among the slowest — included because the comparison it invites is the most useful thing on this page.", // TEXTO CURTO (CARD)
                'body' => "This card has real merits. It is A2 rated for app performance, V30 and U3 for video, explicitly compatible with Nintendo Switch, GoPro, DJI drones and Wyze cameras, and Gigastone backs it with a 5-year limited warranty that includes free data recovery — a genuinely unusual inclusion that no other card here offers.

But the arithmetic is hard to defend. At £39.99 it is the most expensive card in this ranking at £0.625 per gigabyte, nearly three times the KOOTION and almost double the SanDisk Extreme. For that money you get 95MB/s read and 35MB/s write. The SanDisk Extreme, at £20.99, delivers 170MB/s read and 80MB/s write with the same A2, V30 and U3 ratings — nearly twice the read speed and more than twice the write, for £19 less.

Put the capacity comparison alongside it and it looks worse still: £39.99 here buys 64GB, while £39.99 in our 128GB guide buys the Samsung PRO Plus with 180MB/s read, 130MB/s write and double the storage. The free data recovery is worth something if you shoot irreplaceable footage. Everything else about this card is beaten by cheaper options on this same page.", // TEXTO SEO LONGO - HONESTO: ESTA NA LISTA COMO REFERENCIA DE COMPARACAO
                'pros' => ['A2, V30 and U3 rated with named device compatibility', '5-year warranty including free data recovery', '1,794 ratings behind a 4.5 average', 'Works with Switch, GoPro, DJI and Wyze'], // PONTOS POSITIVOS
                'contras' => ['Most expensive here at £0.625 per GB, almost double the Extreme', 'Slower on both read and write than cards costing half as much'], // PONTOS NEGATIVOS
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
        $this->command?->info("MicroSD64Seeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
