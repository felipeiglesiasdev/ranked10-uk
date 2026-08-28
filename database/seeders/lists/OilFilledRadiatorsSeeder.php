<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class OilFilledRadiatorsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE RADIADORES A OLEO DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM M4 6BD (MANCHESTER), BUSCA "oil filled radiator" FILTRADA A PARTIR DE £40.
        //
        // ═══ ACHADOS DA COLETA (O DIFERENCIAL DO ARTIGO) ═══
        // 1. O PONTO CENTRAL E FISICA, NAO MARKETING: TODO AQUECEDOR ELETRICO RESISTIVO CONVERTE 100% DA ELETRICIDADE EM CALOR.
        //    NAO EXISTE RADIADOR A OLEO "MAIS EFICIENTE" QUE OUTRO NA MESMA POTENCIA. UM DE 2500W ENTREGA 2500W DE CALOR E
        //    CUSTA 2500W x TARIFA, PONTO. A 25p/kWh: 2500W = 62,5p/h · 2300W = 57,5p/h · 2000W = 50p/h · 500W = 12,5p/h.
        //    O QUE ECONOMIZA E O TERMOSTATO (QUE DESLIGA O APARELHO) E O TIMER, NAO O DESENHO DAS ALETAS.
        //    MESMO ASSIM A VONHAUS CARIMBA "ENERGY EFFICIENT" NO BULLET 2 E "Energy Efficient" NO CAMPO SPECIAL FEATURE.
        // 2. ARMADILHA DO DE'LONGHI TRNS0505M (£68,99, 2.565 AVALIACOES, NOTA 4.5): O TITULO DIZ "Oil Filled Radiator" E O
        //    PRIMEIRO BULLET DIZ "500w heat output". E UM QUINTO DA POTENCIA DA VONHAUS DE £74,99, POR QUASE O MESMO PRECO.
        //    500W NAO AQUECE UM QUARTO BRITANICO NO INVERNO. O NUMERO ESTA LA, MAS SEM NENHUM CONTEXTO.
        // 3. A BUSCA DEVOLVE UM RADIADOR DE AQUECIMENTO CENTRAL: "ELEGANT 1800 x 452 mm Vertical Designer Radiator" (B01MF6UC3Y),
        //    £177,64 COM 1.300 AVALIACOES E NOTA 4.6. NAO LIGA NA TOMADA — VEM COM KIT DE FIXACAO NA PAREDE, SAIDA EM BTU E
        //    "Fully compatible with all UK" CENTRAL HEATING. PRECISA DE ENCANADOR. FICOU DE FORA DA LISTA.
        //    A BUSCA TAMBEM DEVOLVE UM DIMPLEX "Oil FREE Portable Radiator" (B0DL61VNHL) NUMA BUSCA POR "oil filled".
        // 4. ERROS DE FICHA:
        //    PUREMATE DECLARA TRES NIVEIS DE "1200W, 1300W, 2500W" — 100W DE DIFERENCA ENTRE DOIS DELES. QUASE CERTAMENTE
        //    DEVERIA SER 1000W E 1500W, QUE E O PADRAO DA CATEGORIA.
        //    DE'LONGHI DRAGON 4: OS BULLETS SAO HTML CRU RENDERIZADO COMO TEXTO — APARECEM "<ul>", "<li>" E "</ul>" NA LISTA.
        //    E O TAMANHO DE COMODO SAI COMO "60m₃", COM SUBSCRITO EM VEZ DE EXPOENTE.
        //    OYPLA: O TITULO DIZ 2500W E NENHUM DOS CINCO BULLETS TRAZ UM UNICO NUMERO.
        // 5. SO A RUSSELL HOBBS PUBLICA TAMANHO DE COMODO EM METROS QUADRADOS (20 m²). A DE'LONGHI DRAGON 4 DA EM METROS CUBICOS.
        //    TODO O RESTO NAO DIZ NADA SOBRE QUE AMBIENTE O APARELHO AQUECE.
        // 6. ASINS DUPLICADOS: VONHAUS 11-FIN EM B07FNKLKJB E B016C04Z3E, AMBOS £74,99 COM 5.3K AVALIACOES.
        //    BELACO EM B09MZDW551, B0BSCF3TS4 (AMBOS £49,99 COM 1K) E B0G2HR9JXH (£49,99 COM 80).
        //
        // ═══ CRITERIO DE CORTE ═══
        // TODOS OS 10 TEM 400+ AVALIACOES. EXCLUIDOS POR AMOSTRA FINA OU POR NAO SEREM AQUECEDOR ELETRICO PORTATIL:
        // B0D3M7Y5MD (86), B0G26T7X1G (80), B0FG715LKF (195), B0FM8J8PPQ (60), B0FG74K5G6 (60), B0G3LWG51X (45),
        // B01MF6UC3Y (AQUECIMENTO CENTRAL), B0DL61VNHL (OIL FREE).
        //
        // ═══ VARIACOES DE PALAVRA-CHAVE TRABALHADAS NO TEXTO ═══
        // best oil filled radiator · best oil filled radiator on amazon · electric radiator · portable electric heater ·
        // oil filled radiator uk · best electric heater for home · 2500W oil filled radiator · oil heater with timer ·
        // cheapest electric heater to run · plug in radiator
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best home and household products available in the UK.', // DESCRICAO
        ];

        $article = [
            'slug' => 'best-oil-filled-radiator',                                 // SLUG DO ARTIGO (URL) = PALAVRA-CHAVE EM formato-url
            'title' => 'Best Oil Filled Radiator 2026: 10 Ranked on Watts and Cost', // TITULO / H1 — CONTEM A PALAVRA-CHAVE
            'meta_title' => 'Best Oil Filled Radiator 2026: Top 10 Ranked',       // TITLE DA ABA/GOOGLE (44 CHARS)
            'meta_description' => 'We ranked the best oil filled radiator options on wattage and running cost. One popular model costs £68.99 and puts out 500W, a fifth of its £74.99 rival.', // META DESCRIPTION (~155 CHARS)
            'focus_keyword' => 'best oil filled radiator',                        // PALAVRA-CHAVE PRINCIPAL — VIRA O ALT DO HERO
            'hero_image' => '',                                                   // SEM HERO MANUAL: A VIEW USA A FOTO DO PRODUTO #1 COMO IMAGEM SOCIAL
            'intro' => 'Here is the thing the listings will not tell you about an oil filled radiator: there is no such thing as a more efficient one. Every electric resistance heater converts essentially all the electricity it draws into heat, so a 2500W radiator produces 2500W of warmth and costs 2500W times your tariff to run, whether it is the £47.99 model or the £129.00 one. That makes the ENERGY EFFICIENT stamped across several of these pages meaningless as a comparison, and it makes wattage the number that decides your bill. At 25p per kWh, 2500W costs about 62.5p an hour, 2000W about 50p, and one popular £68.99 model in this guide puts out just 500W. That last figure is not a typo and it appears in the first bullet point of a radiator with 2,565 ratings. The search also returns a plumbed central heating radiator that needs fitting by a professional. So we ranked the best oil filled radiator options on the things that genuinely differ: stated wattage, whether there is a timer to stop it running all night, and whether the listing tells you what size room it is for.', // INTRO OTIMIZADA
            'conclusion' => 'The best oil filled radiator for most rooms is a 2000W to 2500W model with a 24-hour timer, because the timer is the only feature on any of these machines that actually reduces what you spend. A thermostat cycles the heat off once the room is warm, and a timer stops the whole thing running through the night, and between them they matter far more than fin count or ThermoDynamic branding. Match the wattage to the room rather than buying the biggest number: 2000W suits a bedroom or a small living room, and 2500W a larger or draughtier space. Then check three things on the listing before you order. First, the wattage in the bullets, not just the title, because one radiator here quotes 500W. Second, whether it plugs in at all, because a central heating radiator that needs a plumber appears in this same search. And third, whether the listing gives any room size at all, since only one brand in this guide does.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                        // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 12:00:00',                              // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'VonHaus Oil Filled Radiator 11 Fins, 2500W, 24 Hour Timer',                // NOME
                'price' => '£74.99',                                                                 // PRECO NA COLETA
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 5313,                                                             // Nº DE AVALIACOES (MAIOR AMOSTRA DA BUSCA INTEIRA)
                'image' => 'https://m.media-amazon.com/images/I/71JYRrYLWUL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'VonHaus 11-fin oil filled radiator in black with digital timer',       // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07FNKLKJB?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The most reviewed radiator in the search with 5,313 ratings, and it publishes all three of its outputs: 1000W, 1500W and 2500W, with a 24-hour timer to control them.', // TEXTO CURTO DO CARD
                'body' => 'This is the sensible default. It states all three power levels rather than just the maximum, which matters because 1000W costs about 25p an hour to run against 62.5p for the full 2500W, and most of the time a bedroom only needs the lowest setting. The 24-hour timer is the feature that actually saves money on any electric heater, letting you warm a room before you get up and stop it running while you sleep, and it is missing from several cheaper radiators here.

The safety fundamentals are all present: automatic overheat shut-off, 45 degree tip-over protection, 360 degree wheels, a carry handle and a cable tidy on a 1.5m lead. Eleven fins spread the heat over a larger surface, which changes how quickly warmth reaches the far side of a room but not how much heat you get for your money.

That last point is worth stating plainly, because the listing does not. The second bullet is headed ENERGY EFFICIENT and the specification field lists Energy Efficient among the features, and neither means anything: every electric radiator turns essentially all its electricity into heat. What VonHaus is really selling is control over when and how much, which is genuine, and 5,313 ratings at 4.3 say it does that reliably. Note it appears under a second ASIN at the same price with the same ratings.',
                'pros' => ['5,313 ratings, the largest sample in this search', 'All three outputs published: 1000W, 1500W and 2500W', '24-hour timer, the feature that genuinely cuts running cost', 'Overheat shut-off and 45 degree tip-over protection', '360 degree wheels, carry handle and cable tidy'],
                'contras' => ['Marketed as energy efficient, which means nothing on a resistance heater', 'No room size given anywhere on the listing', 'Listed under two ASINs sharing the same ratings', '4.3 rating is mid-table for the category'],
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'PureMate Oil Filled Radiator 2500W, 11 Fin, 24-Hour Timer',                // NOME
                'price' => '£75.99',                                                                 // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 2586,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61ZnF+t1R4L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'PureMate 2500W 11-fin oil filled radiator in white with castors',      // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07KS9437J?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The best rated 2500W radiator here at 4.5, with a 24-hour timer and published dimensions. Its three power settings are listed as 1200W, 1300W and 2500W, which cannot be right.', // TEXTO CURTO DO CARD
                'body' => 'Rated 4.5 from 2,586 ratings, this is the highest scoring full-power radiator in the guide and it is only £1 more than the VonHaus. It has the same essentials, a 24-hour timer, a thermostat dial, four castors and a cable tidy, plus something almost nothing else here bothers with: it publishes its dimensions, 50 by 24 by 62cm. On a device that has to live in a corner of a room all winter, that is genuinely useful and its absence elsewhere is irritating.

The tall, slim vertical profile is the design argument. It occupies less floor area than a squat 11-fin radiator while presenting the same fin count, so it tucks behind a sofa or beside a desk more easily.

One number does not add up. The second bullet lists three power levels as 1200W, 1300W and 2500W. A hundred watts between two of three settings is not a meaningful difference and no manufacturer would design it that way; the category standard is 1000W, 1500W and 2500W, which is almost certainly what this is. It is a typo rather than a deception, but on a listing where wattage is the number that decides your electricity bill, it is the one thing you would want typed correctly.',
                'pros' => ['4.5 from 2,586 ratings, the best rated 2500W radiator here', '24-hour timer and thermostat dial', 'Publishes its dimensions, 50 x 24 x 62cm', 'Slim vertical profile takes less floor space', 'Four castors, carry handle and cable tidy'],
                'contras' => ['Power settings listed as 1200W, 1300W and 2500W, which cannot be correct', 'No room size given', 'No stated warranty length', 'Price fluctuates more than the VonHaus'],
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => "De'Longhi Dragon 4 TRD40820T Oil Filled Radiator, 2kW",                    // NOME
                'price' => '£129.00',                                                                // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA (MAIOR DA LISTA)
                'reviews_count' => 1973,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/51voxKM-tcL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => "De'Longhi Dragon 4 oil filled radiator in white, 2kW",                 // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00CA1T07G?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The highest rated radiator in the guide at 4.6, with a chimney-effect design, anti-frost setting and a 24-hour timer. It is also nearly twice the price of a 2500W rival.', // TEXTO CURTO DO CARD
                'body' => 'The Dragon 4 is the one radiator here where the design does something the others do not. Vents in the base draw cool air up through the fins in what De\'Longhi calls a chimney effect, so warm air circulates rather than simply radiating from the panel. That does not create extra heat, since 2kW is 2kW, but it does move the warmth around the room faster, which is why this heats a space more evenly than a flat 11-fin panel.

It is also the only radiator in this guide with an anti-frost setting, which switches the heater on automatically if the room drops near freezing. For a conservatory, a garage or a holiday cottage left empty in January, that is a genuinely valuable feature and nothing else here offers it. There is a 24-hour mechanical timer, three heat settings and a stated room size of up to 60 cubic metres. At 4.6 from 1,973 ratings it holds the best score in the guide.

Two things to note. At £129.00 it costs £54 more than the VonHaus while producing 2kW rather than 2.5kW, so you are paying for circulation and build, not output. And the listing itself is broken: the bullet points render raw HTML, with the tags for an unordered list appearing as visible text, and the room size prints as 60m with a subscript three instead of a superscript.',
                'pros' => ['4.6 from 1,973 ratings, the highest score here', 'Chimney-effect vents circulate warm air around the room', 'Anti-frost setting, unique in this guide', '24-hour mechanical timer and three heat settings', 'States a room size of up to 60 cubic metres'],
                'contras' => ['£129.00 for 2kW against £74.99 for a 2.5kW rival', 'Bullet points render raw HTML tags as visible text', 'Room size printed with a subscript rather than a superscript', 'Mechanical rather than digital timer'],
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'VonHaus Oil Filled Radiator 9 Fins, 2000W',                                // NOME
                'price' => '£54.99',                                                                 // PRECO NA COLETA
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 3426,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/610L9+fuCQL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'VonHaus 9-fin oil filled radiator in white with thermostat dial',      // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B075FRVVQM?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The 2000W VonHaus at £20 less than the 2500W version, with 3,426 ratings and outputs of 800W, 1200W and 2000W all published. No timer, though.', // TEXTO CURTO DO CARD
                'body' => 'For a bedroom or a home office this is arguably the better VonHaus. Two thousand watts is plenty for a normal room, it costs about 50p an hour at full power against 62.5p for the 2500W, and the entry setting of 800W runs at roughly 20p an hour, which is the setting you will actually leave it on once the room is warm. All three outputs are published, which remains more than most of this guide manages.

The build carries over from the bigger model: overheat shut-off, 45 degree tip-over protection, 360 degree wheels, carry handle, cable tidy. Nine fins rather than eleven means a smaller footprint, which suits a room where the radiator has to live beside a desk rather than in an alcove. It holds 4.3 from 3,426 ratings, the third largest sample here.

The omission is the timer. The 2500W model at number one has a 24-hour timer and this one has only a thermostat dial. Since the timer is the single feature that most reliably reduces what an electric heater costs you, that is a real difference rather than a cosmetic one, and it is worth thinking about before saving the £20. If you are disciplined about switching it off, this is the better value. If you are not, the timer will repay the difference in a winter.',
                'pros' => ['£20 less than the 2500W VonHaus', 'All three outputs published: 800W, 1200W and 2000W', '3,426 ratings at 4.3', 'Smaller nine-fin footprint for tighter spaces', 'Same overheat and tip-over protection as the larger model'],
                'contras' => ['No timer, only a thermostat dial', '2000W may be short for a large or draughty room', 'No room size stated', 'Also carries the meaningless energy efficient framing'],
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'Russell Hobbs Oil Filled Radiator 2000W, 9 Fin',                           // NOME
                'price' => '£52.00',                                                                 // PRECO NA COLETA
                'rating' => 4.0,                                                                     // NOTA
                'reviews_count' => 1189,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/81iG3aq84pL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Russell Hobbs 2000W nine-fin oil filled radiator in white',            // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07V3FPGPP?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only radiator in this guide to state a room size in square metres, at 20m². Two-year guarantee on registration, and three published outputs of 800W, 1.2kW and 2kW.', // TEXTO CURTO DO CARD
                'body' => 'One bullet point on this listing does something no other manufacturer in the search manages: it tells you what size room the heater is for. Twenty square metres, described as suitable for living rooms and double bedrooms. Every other radiator here leaves you to guess from fin count and wattage, and the De\'Longhi gives a figure in cubic metres that most people cannot picture. For a buyer trying to work out whether 2kW is enough for their front room, that single sentence is the most useful thing on any of these pages.

The rest is straightforward and honestly presented. Three heat settings at 800W, 1.2kW and 2kW, a variable thermostat, overheat and tip-over protection, castors, carry handles and a 1.45m cord. The guarantee runs to two years once you register, which is longer than most here offer.

The score is what holds it back. At 4.0 from 1,189 ratings it has the joint lowest rating in this guide, and unlike a thin sample that is enough feedback to be a real signal rather than noise. Nothing in the specification explains it, so treat it as a warning about consistency rather than design. If the room size figure is what you need and you can accept a mid-tier score, it is £22.99 cheaper than the 2500W VonHaus.',
                'pros' => ['States a 20m² room size, unique in this guide', 'Three outputs published: 800W, 1.2kW and 2kW', 'Two-year guarantee on registration', 'Variable thermostat with overheat and tip-over protection', 'Established British brand name'],
                'contras' => ['4.0 rating, joint lowest here from a meaningful sample', 'No timer at this price', 'Only nine fins for a 20m² claim', '1.45m cord is short for awkward socket positions'],
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'Pro Breeze Oil Filled Radiator 11 Fins, 2500W, 24 Hour Timer',             // NOME
                'price' => '£79.99',                                                                 // PRECO NA COLETA
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 977,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/711LWrSEQRL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Pro Breeze slim 11-fin oil filled radiator in white on castors',       // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07DJPKQYV?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A slim 2500W radiator with a 24-hour timer and all three outputs stated. It costs £5 more than the VonHaus with a fifth of the review sample behind it.', // TEXTO CURTO DO CARD
                'body' => 'Pro Breeze has built a decent reputation in home heating and this is a competent 2500W radiator. Eleven fins, three heat settings published as 1000W, 1500W and 2500W, a 24-hour timer, adjustable thermostat, tip-over switch, automatic thermal shut-off and four easy-roll wheels. The slim profile is aimed squarely at fitting under a desk or into a narrow gap, which is a real use case in a small home office.

Everything it offers, the VonHaus at number one also offers, for £5 less and with 5,313 ratings against 977. That is the whole argument. Both are 2500W with the same three steps, both have 24-hour timers, both have the same safety features, and both hold 4.3. When two products are functionally identical, the one with five times the feedback is the safer purchase.

The listing also leans on a claim worth pushing back on. The fourth bullet is headed Save On Energy Bills and describes the radiator as super affordable to run. At 2500W it costs about 62.5p an hour at 25p per kWh, exactly the same as any other 2500W heater, and there is nothing about oil-filled design that changes that. What genuinely saves money is the timer and the thermostat, both of which are here and both of which are on the cheaper VonHaus too.',
                'pros' => ['Three outputs published: 1000W, 1500W and 2500W', '24-hour timer and adjustable thermostat', 'Slim profile fits under a desk or in a narrow gap', 'Tip-over switch and automatic thermal shut-off', 'Four easy-roll wheels for moving between rooms'],
                'contras' => ['£5 more than an identical-spec VonHaus with five times the reviews', 'Save on energy bills claim does not survive the arithmetic', 'No room size stated', '977 ratings, a modest sample for the category'],
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'Belaco Oil Filled Radiator 11 Fins, 2500W',                                // NOME
                'price' => '£49.99',                                                                 // PRECO NA COLETA
                'rating' => 4.2,                                                                     // NOTA
                'reviews_count' => 1069,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61232tTzifL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Belaco 11-fin oil filled radiator in white, portable electric heater', // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09MZDW551?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A full 2500W across eleven fins for £49.99, with all three outputs stated. No timer, and the same model appears under three separate ASINs.', // TEXTO CURTO DO CARD
                'body' => 'This is the cheapest way to get eleven fins and a genuine 2500W in this guide, and the listing is clearer than its price suggests. All three settings are published, 800W, 1500W and 2500W, so you can work out your own running cost at each level: roughly 20p, 37.5p and 62.5p an hour at 25p per kWh. There is a thermostat, overheat cut-out, and the fan-free operation that makes oil radiators genuinely silent, which matters in a bedroom in a way it does not in a living room.

What you do not get is a timer. Against the VonHaus at number one that is a £25 saving in exchange for having to remember to switch it off, and over a winter of leaving it running overnight that saving can disappear in a single week.

The other thing to watch is the listings. Belaco sells what appears to be this same radiator under at least three ASINs, two at £49.99 with around a thousand ratings each and a third at £49.99 with eighty. Same price, wildly different amounts of evidence. Buy the one with the ratings behind it. At 4.2 the score is respectable rather than impressive, and there is no stated warranty length anywhere on the page.',
                'pros' => ['Full 2500W across eleven fins for £49.99', 'All three outputs published: 800W, 1500W and 2500W', 'Completely silent fan-free operation', 'Thermostat and overheat cut-out included', 'No installation, just plugs in'],
                'contras' => ['No timer, so nothing stops it running overnight', 'Sold under at least three ASINs with different review counts', 'No warranty length stated', 'No room size given'],
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'Oypla Electrical Oil Filled Radiator 2500W, 11 Fin',                       // NOME
                'price' => '£47.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 1047,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71wabqHYCwL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Oypla 2500W 11-fin portable oil filled radiator in white',             // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B017IXXPDK?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest 2500W radiator here at £47.99 with a respectable 4.4 rating, but its five bullet points do not contain a single number.', // TEXTO CURTO DO CARD
                'body' => 'At £47.99 for a 2500W eleven-fin radiator with 1,047 ratings at 4.4, the value case makes itself. The score is the second highest among the budget models here and the price is the lowest for full power, so if the job is simply to get a lot of heat into a cold room for under fifty pounds, this does it.

The listing, though, is remarkable for how little it says. Read the five bullet points and you will find Oil Filled Long Lasting Heat Output, Adjustable Temperature Control Settings, Multi Fin Efficient Heat Distribution, Portable With Wheels And Handle and Safe Reliable Heating Design. Not one of them contains a number. Not the wattage, which appears only in the title. Not the individual heat settings. Not the dimensions, the cable length, the fin count as a figure, the room size or the warranty. Even the fin count is described as multi fin rather than eleven.

That does not make it a bad radiator, and the rating suggests buyers are content. It does mean you are buying entirely on the title and the photographs, with no way to compare it against anything else on the page except price. Given that two rivals at £49.99 and £52.00 publish their individual power settings, the £2 saving buys you noticeably less information about what you are getting.',
                'pros' => ['£47.99, the cheapest 2500W radiator in this guide', '4.4 from 1,047 ratings, strong for a budget model', 'Eleven fins and adjustable temperature control', 'Castors and carry handle for moving between rooms', 'Overheat protection included'],
                'contras' => ['Not a single number appears in any of the five bullet points', 'Individual heat settings never published', 'No dimensions, cable length, room size or warranty stated', 'Fin count described only as multi fin in the bullets'],
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'Daewoo Oil Filled Portable Radiator 2000W with Thermostat',                // NOME
                'price' => '£42.74',                                                                 // PRECO NA COLETA (O MAIS BARATO DA LISTA)
                'rating' => 4.0,                                                                     // NOTA
                'reviews_count' => 412,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61CZT4q6rDL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Daewoo 2000W portable oil filled radiator in white with castors',      // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B018EQ1E5G?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest radiator in the guide at £42.74, and the only one with a three-year warranty. It also has the joint lowest rating and the thinnest sample.', // TEXTO CURTO DO CARD
                'body' => 'Two things stand out here. The first is the price: £42.74 for a 2000W oil filled radiator is the lowest entry point in this guide, and 2000W is enough for a bedroom or a small living room at roughly 50p an hour on full power. The second is the warranty, three years on registration, which is longer than anything else here and longer than most people expect at this price.

The specification is otherwise ordinary and honestly described. Three heat settings labelled low, medium and high with an adjustable thermostat, a tip-over safety switch, indicator lights on the power switches, four castors, a carry handle and cord storage. It is aimed, the listing says, at medium to large rooms including living spaces, bedrooms and home offices.

The reasons it sits at nine are evidence and detail. At 4.0 from 412 ratings it has the joint lowest score in this guide from the second thinnest sample, so there is less to go on than with the four-figure listings above. And while it names three heat settings, it never publishes what they are in watts, so you cannot work out what the low setting costs to run. Against the Russell Hobbs at £52.00, which publishes 800W, 1.2kW and 2kW and states a room size, the £9.26 saving costs you the two most useful numbers.',
                'pros' => ['£42.74, the cheapest radiator in this guide', 'Three-year warranty on registration, the longest here', 'Tip-over safety switch and indicator lights', 'Castors, carry handle and cord storage', '2000W suits a bedroom or small living room'],
                'contras' => ['4.0 rating from only 412 ratings', 'Heat settings named low, medium and high but never in watts', 'No timer', 'No room size or dimensions published'],
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => "De'Longhi TRNS0505M Oil Filled Radiator, 500W",                            // NOME
                'price' => '£68.99',                                                                 // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 2565,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/610lkd7dGoL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => "De'Longhi TRNS0505M compact oil filled radiator in white",             // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01M0UHYDT?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A well-made De\'Longhi at £68.99 that puts out 500 watts. That is a fifth of the heat of a £74.99 rival, and the figure appears once, in the first bullet, with no context.', // TEXTO CURTO DO CARD
                'body' => 'Read the first bullet point of this listing and it says, in full, 500w heat output. That is the entire specification of the heat this radiator produces, and it is a fifth of what the £74.99 VonHaus at number one delivers for £6 more. At 25p per kWh it costs about 12.5p an hour to run, which sounds appealing until you realise it is cheap because it is barely heating anything: 500W is roughly the output of a small towel rail.

None of that makes it a bad product. It is a genuine De\'Longhi with an adjustable room thermostat, anti-frost protection, overheat safety cut-out and large carry handles, it holds 4.5 from 2,565 ratings, and for the right job it is exactly right. That job is a small, enclosed space: a downstairs loo, a caravan, a study of a few square metres, or keeping a conservatory above freezing. Used that way it is quiet, cheap to run and effective.

The problem is that it appears in a search for oil filled radiators alongside 2500W machines at similar money, with nothing on the page to signal the difference except one figure in one bullet. Two and a half thousand people have bought it. Some of them will have been looking for something to heat a living room, and 500W will not do that on the coldest night of the year. Check the wattage before you check anything else, on this listing and every other one.',
                'pros' => ['Genuine De\'Longhi build with 2,565 ratings at 4.5', 'Adjustable room thermostat and anti-frost protection', 'Only about 12.5p an hour to run at full power', 'Compact and easy to move with large carry handles', 'Ideal for a very small or enclosed space'],
                'contras' => ['500W output, a fifth of a £74.99 rival costing £6 more', 'Nothing on the page contextualises how low that is', 'Will not heat a living room or a large bedroom', 'No timer and no room size guidance'],
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
