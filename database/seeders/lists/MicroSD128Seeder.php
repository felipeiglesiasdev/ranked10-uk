<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class MicroSD128Seeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE CARTOES MICROSD 128GB DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // FOCUS KEYWORD: best 128gb microsd card
        // KEYWORDS SECUNDARIAS: best micro sd card 128gb / 128gb micro sd card /
        // microsdxc 128gb / 128gb memory card / best microsd card for phone /
        // 128gb card for switch / micro sd card for dash cam / fastest 128gb microsd card /
        // 128gb card for gopro / 128gb card for drone
        //
        // ANGULO PROPRIO (PARA NAO DUPLICAR O ARTIGO DE 256GB): AQUI O EIXO E O PRECO POR GB.
        // A LISTA VAI DE £17,81 A £65,00 PELA MESMA CAPACIDADE — 3,65x DE DIFERENCA — ENTAO A
        // PERGUNTA QUE O TEXTO RESPONDE E "PELO QUE VOCE ESTA PAGANDO, JA QUE O ESPACO E IGUAL".
        // O ARTIGO DE 256GB USA OUTRO EIXO (A1 x A2, V30, CAPACIDADE PARA 4K).
        //
        // ATENCAO A DUAS INCONSISTENCIAS NAS LISTAGENS DA SAMSUNG:
        // - PRO PLUS DIZ "128GB PARA ATE 30 HORAS DE 4K" E EVO SELECT DIZ "128GB PARA 7,5 HORAS".
        //   O NUMERO REALISTA PARA 4K EM 128GB E ~7,5h; O DE 30h VEM DA VARIANTE DE 512GB.
        // - EVO PLUS CITA "ATE 512GB" E "207.159 FOTOS", QUE SAO DA FAMILIA, NAO DESTE CARTAO.
        // O TEXTO NAO REPETE ESSES NUMEROS INFLADOS.
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MESMO TEXTO JA CADASTRADO)
        ];

        $article = [
            'slug' => 'best-128gb-microsd-cards',                                // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK" (SITE JA E UK)
            'title' => 'Best 128GB MicroSD Cards in 2026: 10 Ranked by Price per GB', // TITULO / H1 - PLURAL CONTEM O SINGULAR "best 128gb microsd card" COMO PREFIXO
            'meta_title' => 'Best 128GB MicroSD Cards 2026: Top 10 Ranked',       // TITLE DA ABA/GOOGLE (46 CHARS)
            'meta_description' => 'We ranked the best 128GB microSD card options on Amazon, comparing read and write speeds, app ratings and price per GB for phones, cameras and dash cams.', // META DESCRIPTION (153 CHARS)
            'focus_keyword' => 'best 128gb microsd card',                        // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Here is the thing nobody tells you about buying a 128GB microSD card: the cheapest one on this list costs £17.81 and the most expensive costs £65.00, and both hold exactly the same amount. That is a 3.65x price difference for identical storage, which means you are not paying for space at all — you are paying for how fast data moves on and off the card, and how long it survives being written to. Get that trade right and the best 128GB microSD card for you might be the cheap one. Get it wrong and you will pay £65 for a card that is slower than a £28 one. We ranked the top 10 128GB microSD cards on Amazon on read and write speed, app performance rating, endurance and price per gigabyte, so you can see exactly what the extra money buys.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + ANGULO PROPRIO
            'conclusion' => "Choosing the best 128GB microSD card comes down to matching the card to the device rather than buying the fastest one you can afford. For a phone or tablet, an A1 or A2 rating matters more than headline read speed, because that rating governs how quickly apps open and update from the card. For a camera, drone or anything shooting 4K, the number to check is write speed and a V30 rating, since that is what stops frames dropping mid-recording — and note that write speed is the figure most listings quietly leave out. For a dash cam or security camera, ignore speed almost entirely and buy an endurance-rated card, because those devices overwrite the same card continuously and a standard card will fail early. And if you are simply expanding a phone's storage, the cheapest well-reviewed card on this list will do the job perfectly well. If 128GB is not enough, the same logic applies one size up in our 256GB guide.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + MENCAO AO ARTIGO IRMAO
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-19 19:22:13', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'SanDisk 128GB Extreme microSDXC + Adapter, 190MB/s, A2, V30, U3',        // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£27.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 100395,                                                           // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71etcRZF-JL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'best 128gb microsd card',                                             // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://amzn.to/4xsDdk9',                                       // LINK AFILIADO
                'summary' => "The best 128GB microSD card overall: A2, V30 and a genuine 90MB/s write speed for £27.99, backed by more than 100,000 ratings.", // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "This is the card to buy if you only want one answer. At £27.99 it sits in the middle of this list on price, but it is the only card here that combines every rating that matters: A2 for app performance, V30 for sustained video, U3 for speed class, and 190MB/s read with a stated 90MB/s write.

That write speed is the reason it beats cards costing £17 more. Most listings shout about read speed, which only affects how fast you copy files off the card, and quietly omit write speed, which is what determines whether a camera drops frames while recording 4K. Of the ten cards here, only four state a write figure at all, and this is the cheapest of them.

The A2 rating is the other differentiator. A1 covers basic app loading; A2 requires substantially higher random read and write performance, which is what you feel when apps installed on the card open and update. Combined with SanDisk QuickFlow Technology for offload speeds and RescuePro Deluxe file recovery software, it is a genuinely complete package. It is temperature-proof, waterproof, shockproof and X-ray-proof, and with 100,395 ratings behind a 4.7 average it is the second most reviewed card on this list. At £0.219 per gigabyte it is not the cheapest, but it is the best value once you account for what you actually get.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Only card here with A2, V30 and U3 together', 'States a real 90MB/s write speed, unlike most rivals', '100,395 ratings behind a 4.7 average', 'Includes RescuePro Deluxe recovery software'], // PONTOS POSITIVOS
                'contras' => ['£10 more than the cheapest card on this list', 'Overkill if you only need phone storage'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'SanDisk 128GB Ultra microSDXC + Adapter, 140MB/s, A1, Class 10, U1',     // NOME (ENCURTADO)
                'price' => '£22.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 176351,                                                           // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71ur8MxJu2L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'SanDisk 128GB Ultra microSDXC + Adapter, 140MB/s, A1, Class 10, U1',  // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4cP390G',                                       // LINK AFILIADO
                'summary' => "The most reviewed memory card on this list by a wide margin — 176,351 ratings — and the sensible default if the card is going into a phone.", // TEXTO CURTO (CARD)
                'body' => "With 176,351 ratings, this is not just the most reviewed card in this ranking, it is one of the most reviewed products of any kind we have covered. That volume of feedback is worth something on its own: whatever failure modes this card has, they would have surfaced by now.

It is built for phones and tablets rather than cameras, and the specification reflects that honestly. The A1 rating optimises it for app loading and general Android use, transfer speeds reach 140MB/s, and it carries Class 10 and U1 ratings which cover Full HD video comfortably. What it does not carry is U3 or V30, so it is not the card for sustained 4K recording, and no write speed is published.

SanDisk's Memory Zone app is a genuine convenience if you are using it in an Android phone, letting you browse files, back up automatically and move content off internal storage to free up space, without a computer. At £22.99, or £0.180 per gigabyte, it is the cheapest card here from a major brand, and for the very common job of simply giving a phone more room it does everything needed. Step up to the Extreme above only if you also shoot video.", // TEXTO SEO LONGO
                'pros' => ['176,351 ratings, by far the most on this list', 'A1-rated for fast app loading on Android', 'Cheapest major-brand card here at £22.99', 'Memory Zone app manages files without a computer'], // PONTOS POSITIVOS
                'contras' => ['No U3 or V30 rating, so not for sustained 4K', 'No published write speed'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Samsung PRO Ultimate 128GB microSD, 200MB/s Read, 130MB/s Write, U3',    // NOME (ENCURTADO)
                'price' => '£46.96',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 2947,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61Ws5FG31KL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung PRO Ultimate 128GB microSD, 200MB/s Read, 130MB/s Write, U3', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3U79e2d',                                       // LINK AFILIADO
                'summary' => "The fastest write speed here at 130MB/s, which is the number that actually matters for 4K video, drones and action cameras.", // TEXTO CURTO (CARD)
                'body' => "If you are buying for a camera rather than a phone, this is the card to look at. Its 130MB/s write speed is the joint fastest on this list, and write speed is the specification that decides whether a camera can keep recording 4K without dropping frames or stalling. Read speed of 200MB/s is also near the top here, so offloading footage afterwards is quick.

Samsung positions it for drones, action cameras, 360° cameras and phones, and backs it with six-way protection: waterproof, temperature-resistant, X-ray-proof, magnet-resistant, drop-proof and wear-free. An SD adapter is included for camera bodies and card readers that take full-size cards.

At £46.96 it is the second most expensive card here, working out at £0.367 per gigabyte — more than double the Integral further down. That premium is defensible if you shoot video, and hard to justify if you do not. Worth noting for anyone comparing Samsung's range: this card is faster than the EVO Select at the bottom of this list while costing £18 less, so read the model name carefully rather than assuming a higher price means a better card.", // TEXTO SEO LONGO
                'pros' => ['Joint fastest write speed here at 130MB/s', '200MB/s read for quick footage offload', 'Six-way protection with SD adapter included', 'Faster and cheaper than the EVO Select'], // PONTOS POSITIVOS
                'contras' => ['£0.367 per GB, more than double the Integral', 'Only 2,947 ratings compared with SanDisk’s six figures'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Integral 128GB microSD Premium High Speed, 100MB/s Read, 50MB/s Write, U3', // NOME (ENCURTADO)
                'price' => '£17.81',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 55068,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71I2lLYhCTL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Integral 128GB microSD Premium High Speed, 100MB/s Read, 50MB/s Write, U3', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/45Cdsl2',                                       // LINK AFILIADO
                'summary' => "The cheapest card on this list at £17.81 and the best price per gigabyte, yet it still carries U3 and states a real write speed.", // TEXTO CURTO (CARD)
                'body' => "At £17.81 this is the cheapest card in the ranking and works out at £0.139 per gigabyte, roughly a third of what the Samsung EVO Select costs for exactly the same storage. What makes it more than just cheap is that it does not cut the specifications that matter most.

It is rated UHS-I, U3 and Class 10, which covers 4K UHD recording, and unlike most cards here it publishes both figures: 100MB/s read and 50MB/s write. That write speed is modest next to the Samsung PRO cards, but it is real and stated, and it is enough for 4K at standard bitrates. The A1 rating covers app performance for phone use.

Integral is not a household name in the UK the way SanDisk and Samsung are, but the company has sold over 50 million memory cards, and the 55,068 ratings here are the third largest sample on this list — more than every Samsung card combined. It is water-resistant, shock-proof, temperature-resistant and X-ray-proof like the pricier options. If your priority is maximum storage for minimum money and you are not shooting professional video, this is the rational choice.", // TEXTO SEO LONGO
                'pros' => ['Cheapest here at £17.81, or £0.139 per GB', '55,068 ratings, more than all Samsung cards here combined', 'U3 rated with a stated 50MB/s write speed', 'Same durability ratings as cards costing three times more'], // PONTOS POSITIVOS
                'contras' => ['50MB/s write is the slowest of the cards that publish one', 'Less familiar brand than SanDisk or Samsung'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Samsung PRO Plus 128GB microSD, 180MB/s Read, 130MB/s Write, USB Reader Included', // NOME (ENCURTADO)
                'price' => '£39.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 5821,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61D5Vm5bseL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung PRO Plus 128GB microSD, 180MB/s Read, 130MB/s Write, USB Reader Included', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4ztl3jt',                                       // LINK AFILIADO
                'summary' => "Nearly the write speed of the PRO Ultimate for £7 less, and the only card here that includes a USB 3.0 card reader in the box.", // TEXTO CURTO (CARD)
                'body' => "The PRO Plus sits just below the PRO Ultimate in Samsung's range and undercuts it by £6.97 while matching its 130MB/s write speed. Read speed drops from 200MB/s to 180MB/s, which affects how quickly you copy files off the card and nothing else. For most people that is a sensible trade.

Its genuinely useful extra is in the box: a USB 3.0 card reader is included. Every other card here either includes only an SD adapter or nothing at all, and a decent reader costs £8 to £15 separately — which effectively closes most of the price gap to the cheaper cards. If you regularly move footage to a laptop, that matters more than the 20MB/s of read speed you gave up.

Samsung quotes seven-fold protection here rather than the six on its other cards, adding shock-proofing to the usual list. One number in the listing needs a caveat: it claims 128GB gives up to 30 hours of 4K recording, while Samsung's own EVO Select listing says 128GB gives 7.5 hours. The 7.5-hour figure is the realistic one for 4K; the 30-hour claim appears to come from the 512GB variant.", // TEXTO SEO LONGO - SINALIZA A INCONSISTENCIA DA SAMSUNG
                'pros' => ['Matches the PRO Ultimate’s 130MB/s write for £7 less', 'Only card here that includes a USB 3.0 reader', 'Seven-fold protection, the most on this list', '5,821 ratings behind it'], // PONTOS POSITIVOS
                'contras' => ['Listing claims 30 hours of 4K on 128GB; the realistic figure is nearer 7.5', '180MB/s read is slower than the PRO Ultimate'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'SanDisk 128GB High Endurance microSDXC for Dash Cams and IP Cameras',    // NOME (ENCURTADO)
                'price' => '£32.00',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 37243,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/51+e7-JlQ4L._AC_SL1200_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'SanDisk 128GB High Endurance microSDXC for Dash Cams and IP Cameras', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4zmEI4t',                                       // LINK AFILIADO
                'summary' => "The only endurance-rated card here, and the right answer for a dash cam or security camera — where a normal card will wear out and fail.", // TEXTO CURTO (CARD)
                'body' => "This card exists to solve a problem the other nine do not address. A dash cam or security camera records in a continuous loop, overwriting the same card thousands of times, and a standard microSD card is not designed for that duty cycle. They fail — usually silently, so you only discover it when you need the footage.

SanDisk rates this one for up to 10,000 hours of Full HD recording, which is the endurance specification rather than a speed claim. It is built with the same environmental protection as the rest of the range — temperature-proof, waterproof, shockproof and X-ray-proof — and carries Class 10, U3 and V30 ratings, so it handles Full HD and 4K capture properly.

At £32.00 it costs more than the faster SanDisk Extreme at number one, and on paper it looks worse: 100MB/s read against 190MB/s. That comparison misses the point. You are not buying speed, you are buying the ability to survive being written to constantly for years. If the card is going into a phone or a camera you use occasionally, buy something else on this list. If it is going into a dash cam, buy this and do not think about it again.", // TEXTO SEO LONGO
                'pros' => ['Rated for up to 10,000 hours of continuous recording', 'The only endurance-rated card on this list', 'V30 and U3 so it still handles 4K capture', '37,243 ratings behind it'], // PONTOS POSITIVOS
                'contras' => ['Slower and dearer than the SanDisk Extreme at #1', 'Wasted money if not used in a continuously recording device'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Lexar Silver Plus 128GB microSD, up to 205MB/s Read, UHS-I',              // NOME (ENCURTADO)
                'price' => '£44.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 5622,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71tgLTd4z9L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Lexar Silver Plus 128GB microSD, up to 205MB/s Read, UHS-I',          // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4gkk3We',                                       // LINK AFILIADO
                'summary' => "The highest read speed on this list at 205MB/s and a 4.7 rating from 5,622 buyers — but the listing publishes almost nothing else.", // TEXTO CURTO (CARD)
                'body' => "On the one figure Lexar does publish, this card leads the list: 205MB/s read is the fastest here, ahead of the Samsung PRO Ultimate's 200MB/s and the SanDisk Extreme's 190MB/s. Its 4.7 average across 5,622 ratings is also among the stronger combinations of score and sample size in this ranking.

The difficulty is everything the listing leaves out. Unlike every other card here, it has no product description at all — just a handful of specification fields. There is no write speed, no A1 or A2 app performance rating, no U3 or V30 video speed class, and no durability claims. For a card that costs £44.99, or £0.351 per gigabyte, that is a lot of unanswered questions.

Read speed alone tells you how fast you can copy files off the card and nothing about whether it can sustain 4K recording or run apps well. Without a stated write speed or video speed class, it is impossible to recommend this over the SanDisk Extreme, which costs £17 less and publishes every one of those figures. If Lexar's specifications matter to you, check them on Lexar's own site before ordering rather than relying on this listing.", // TEXTO SEO LONGO - HONESTO SOBRE A LISTAGEM INCOMPLETA
                'pros' => ['Highest read speed on this list at 205MB/s', '4.7 average from 5,622 ratings', 'Established memory card brand', 'microSDXC with UHS-I interface'], // PONTOS POSITIVOS
                'contras' => ['Listing publishes no write speed, app rating or video speed class', '£17 more than the better-specified SanDisk Extreme'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'SanDisk Ultra Go 128GB microSD + Adapter, up to 150MB/s Read',            // NOME (ENCURTADO)
                'price' => '£22.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 1457,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71UkwcNaIvL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'SanDisk Ultra Go 128GB microSD + Adapter, up to 150MB/s Read',        // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4ztEqsF',                                       // LINK AFILIADO
                'summary' => "The same £22.99 as the SanDisk Ultra with 10MB/s more read speed, but roughly 175,000 fewer ratings behind it.", // TEXTO CURTO (CARD)
                'body' => "This is the awkward one. The Ultra Go costs exactly the same as the standard SanDisk Ultra at number two, £22.99, and is marginally faster on paper at 150MB/s read against 140MB/s. It also holds a slightly higher 4.7 average. On those numbers alone it looks like the better buy.

The catch is evidence. The standard Ultra has 176,351 ratings; this has 1,457. That is not a small difference in confidence, it is two orders of magnitude, and at an identical price there is no reason to take the less proven option for 10MB/s of read speed you will never notice.

The card itself is perfectly sensible for its intended job: expanding storage in Android phones, tablets, Chromebooks and Windows laptops, with the SanDisk Memory Zone app for organising photos and running automatic backups. SanDisk notes that the 150MB/s figure requires its own MobileMate USB 3.0 reader, sold separately, which is a caveat worth knowing before you assume you will see that speed. Like the standard Ultra, no write speed, U3 or V30 rating is published, so it is a phone card rather than a camera card.", // TEXTO SEO LONGO
                'pros' => ['10MB/s faster read than the standard Ultra at the same price', '4.7 average rating', 'Works across phones, tablets, Chromebooks and laptops', 'Memory Zone app included'], // PONTOS POSITIVOS
                'contras' => ['1,457 ratings against the standard Ultra’s 176,351', 'Top read speed needs SanDisk’s own reader, sold separately'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Samsung EVO Plus 128GB microSD + Adapter, UHS-I U3, 160MB/s',             // NOME (ENCURTADO)
                'price' => '£42.37',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 1517,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/41LYqLC+UmL._AC_SL1000_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung EVO Plus 128GB microSD + Adapter, UHS-I U3, 160MB/s',         // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4ghs1Rf',                                       // LINK AFILIADO
                'summary' => "A capable U3 card with Samsung's six-way protection, but it is beaten on speed, price and review count by other cards on this list.", // TEXTO CURTO (CARD)
                'body' => "There is nothing wrong with the EVO Plus. It is UHS-I U3 rated with 160MB/s transfer speed, suitable for 4K UHD and super slow motion recording, and it carries Samsung's six-way protection: waterproof, temperature-resistant, X-ray-proof, magnet-resistant, drop-proof and wear-free. An SD adapter is included and the 4.7 average is as high as anything here.

The problem is where it sits. At £42.37 it costs £14 more than the SanDisk Extreme at number one, which is faster on read, publishes a write speed the EVO Plus does not, and adds A2 app performance. It also costs £2.38 more than Samsung's own PRO Plus, which is faster on both read and write and throws in a USB card reader. Whichever direction you look, something on this list does the same job better for similar money.

Its 1,517 ratings are also among the smallest samples here. One thing to watch in the listing: it references storage up to 512GB and a 207,159-photo capacity, both of which describe the larger cards in the family rather than this 128GB model — a common pattern in Samsung's listings, and a reason to read the figures against the capacity you are actually buying.", // TEXTO SEO LONGO - SINALIZA NUMEROS DA FAMILIA, NAO DO CARTAO
                'pros' => ['U3 rated for 4K UHD and slow motion', 'Samsung six-way protection with SD adapter', '4.7 average rating', 'Established brand with wide device compatibility'], // PONTOS POSITIVOS
                'contras' => ['£14 more than the faster, better-specified SanDisk Extreme', 'Listing quotes 512GB family figures rather than this card’s'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Samsung EVO Select (2024) 128GB microSD + Adapter, UHS-I U3, 160MB/s',    // NOME (ENCURTADO)
                'price' => '£65.00',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.7,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 4853,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61lbHaW6Y7L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Samsung EVO Select (2024) 128GB microSD + Adapter, UHS-I U3, 160MB/s', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4xVCyrf',                                       // LINK AFILIADO
                'summary' => "The most expensive card here at £65.00 — and slower than Samsung's own PRO Ultimate, which costs £18 less. Included as a warning, not a recommendation.", // TEXTO CURTO (CARD)
                'body' => "This card is on the list because it is one of the most popular 128GB cards on Amazon, and because the comparison it invites is the single most useful thing in this guide.

At £65.00 it is the most expensive card here, working out at £0.508 per gigabyte — 3.65 times what the Integral costs for exactly the same 128GB. What does the extra buy? A 160MB/s transfer speed, UHS-I U3, six-way protection and an SD adapter. Now look at the Samsung PRO Ultimate at number three: £46.96, 200MB/s read, 130MB/s write, the same six-way protection, the same adapter. It is faster in every published dimension and costs £18.04 less, from the same manufacturer.

The 4.7 rating across 4,853 ratings is genuine, and there is nothing defective about the card. Samsung's naming simply does not signal price and performance in the order you would expect, and EVO Select carries a premium that its specification does not support. If you want a Samsung card, buy the PRO Ultimate or the PRO Plus. If you want the best value at this capacity, buy the Integral. This is the one to walk past — which is exactly why it is worth knowing about.", // TEXTO SEO LONGO - HONESTO: ESTA NA LISTA COMO ALERTA
                'pros' => ['4.7 average from 4,853 ratings', 'U3 rated with six-way protection', 'Includes SD adapters for multiple devices', 'Widely stocked and easy to find'], // PONTOS POSITIVOS
                'contras' => ['Most expensive here at £0.508 per GB, 3.65x the Integral', 'Slower than Samsung’s own PRO Ultimate, which costs £18 less'], // PONTOS NEGATIVOS
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
        $this->command?->info("MicroSD128Seeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
