<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class SmartRadiatorValvesSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE VALVULAS TERMOSTATICAS INTELIGENTES DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 30/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=smart+radiator+valve+thermostat&rh=p_36%3A3000-  (20 ASINS)
        // CATEGORIA HOME. SAZONAL: PICO DE SETEMBRO A NOVEMBRO — E O PRODUTO QUE O
        // BRITANICO COMPRA QUANDO LIGA O AQUECIMENTO PELA PRIMEIRA VEZ NO ANO. PUBLICAR
        // AGORA PEGA A JANELA INTEIRA.
        //
        // PROFUNDIDADE: 935 / 830 / 780 / 720 / 643 / 524 / 469 / 261 / 253 / 145 / 132 / 95.
        //
        // ─── ACHADO PRINCIPAL: O PRECO POR VALVULA, E O PACK QUE SAI MAIS CARO ───
        // 1. VALVULA TERMOSTATICA SE COMPRA POR RADIADOR, NAO POR UNIDADE — UMA CASA
        //    BRITANICA TIPICA TEM DE 8 A 12. ENTAO O NUMERO QUE DECIDE E **£ POR VALVULA**,
        //    E ELE VARIA 2,6 VEZES NA MESMA BUSCA:
        //      SONOFF TRVZB 6-PACK .. £133.80 ÷ 6 = **£22.30**  ← MAIS BARATA
        //      SONOFF TRVZB 4-PACK .. £103.97 ÷ 4 = £25.99
        //      HONEYWELL HR27 ....... £39.05 (E NAO E INTELIGENTE — VER ACHADO 4)
        //      EVE THERMO AVULSA .... £48.02
        //      DRAYTON WISER ........ £49.00
        //      tado° X TRIO ......... £161.49 ÷ 3 = £53.83
        //      tado° X AVULSA ....... £56.43
        //      EVE THERMO 4-PACK .... £234.95 ÷ 4 = **£58.74**  ← MAIS CARA
        //      BOSCH ................ £74.99
        //    NUMA CASA DE DEZ RADIADORES ISSO E £223 CONTRA £587. MESMO TRABALHO.
        // 2. 🔴 O PACK DE 4 DA EVE CUSTA **MAIS POR VALVULA** QUE A AVULSA DA PROPRIA EVE:
        //      QUATRO AVULSAS ... 4 × £48.02 = **£192.08**
        //      O PACK DE QUATRO . **£234.95**
        //    COMPRAR O MULTIPACK CUSTA **£42.87 A MAIS** QUE COMPRAR QUATRO UNIDADES
        //    SEPARADAS DO MESMO PRODUTO, NA MESMA LOJA, NO MESMO DIA. E O INVERSO EXATO DO
        //    QUE UM MULTIPACK EXISTE PARA FAZER.
        // 3. AS OUTRAS DUAS MARCAS COM MULTIPACK VAO NA DIRECAO CERTA, MAS DE LEVE:
        //    SONOFF DESCE DE £25.99 (4) PARA £22.30 (6). tado° DESCE DE £56.43 PARA £53.83
        //    — UMA ECONOMIA DE **£2.60 POR VALVULA**, OU £7.80 NO TRIO INTEIRO.
        //
        // ─── ACHADO 2: A CENTRAL QUE NINGUEM SOMA ───
        // 4. QUASE NENHUMA DESTAS FUNCIONA SOZINHA. O CUSTO REAL E VALVULAS + PONTE:
        //      tado° X ....... "requires the **Bridge X (not included)** or another Thread
        //                      border router"
        //      EVE THERMO .... "**req. Thread Border Router**" (NO PROPRIO TITULO) — APPLE
        //                      TV 4K, HOMEPOD, ECHO 4ª GER OU SMARTTHINGS v3
        //      DRAYTON WISER . "only designed to work alongside an existing Wiser Smart
        //                      Heating System **with a Wiser Heat Hub**" — NO 1º BULLET
        //      SONOFF ........ "it requires a **SONOFF Zigbee 3.0 hub**, such as ZBBridge-P,
        //                      ZBBridge-U, NSPanel Pro, iHost"
        //      TP-LINK KASA .. HUB PROPRIO
        //      BOSCH ......... CONTROLADOR BOSCH **OU** MATTER SEM CONTROLADOR — E A UNICA
        //                      QUE OFERECE OS DOIS CAMINHOS
        //      HONEYWELL ..... NAO PRECISA DE NADA, PORQUE NAO E INTELIGENTE
        //    AS QUATRO QUE DIZEM ISSO NO PRIMEIRO OU NO TITULO (DRAYTON, EVE, SONOFF, tado°)
        //    MERECEM CREDITO: E A DIVULGACAO QUE FALTA EM METADE DAS CATEGORIAS QUE COLETO.
        //
        // ─── ACHADO 3: "22 PERCENT" SEM FONTE ───
        // 5. tado° ABRE OS DOIS ANUNCIOS COM "users save an average of **22 percent** in
        //    energy". SEM ESTUDO, SEM METODOLOGIA, SEM LINHA DE BASE, SEM DIZER CONTRA O
        //    QUE — CASA SEM TERMOSTATO NENHUM? COM TRV MECANICA? COM PROGRAMADOR CENTRAL?
        //    E O UNICO NUMERO DE ECONOMIA PUBLICADO NA BUSCA INTEIRA, E E INVERIFICAVEL.
        //    AS OUTRAS NOVE FALAM DE "save energy" SEM NUMERO — O QUE E MENOS UTIL E MAIS
        //    HONESTO.
        //
        // ─── ACHADO 4: UMA VALVULA NAO-INTELIGENTE NUMA BUSCA POR INTELIGENTE ───
        // 6. 🔴 A HONEYWELL HOME HR27 (£39.05) APARECE NA BUSCA DE "smart radiator valve",
        //    TEM "Smart Radiator Thermostat Valve" NO TITULO — E O 5º BULLET DELA DIZ
        //    "Simple to Use: **No app or wifi required**". NAO E UMA VALVULA INTELIGENTE:
        //    E UMA TRV PROGRAMAVEL, COM RELOGIO E BOTAO, SEM RADIO NENHUM. NAO CONVERSA
        //    COM APP, NAO TEM GEOFENCING, NAO SE AGRUPA POR COMODO.
        //    E TEM A **PIOR NOTA DA LISTA: 3.4 EM 261 AVALIACOES** — AMOSTRA GRANDE O
        //    BASTANTE PARA SER SINAL, E A EXPLICACAO MAIS PROVAVEL E GENTE COMPRANDO
        //    ESPERANDO CONTROLE PELO CELULAR.
        //
        // ─── ACHADO 5: CAMPO DE FICHA COM LIXO ───
        // 7. tado° (NOS DOIS ANUNCIOS): "**Screen Size 10.4 Centimetres**" — TELA DE 10,4 cm
        //    NUMA VALVULA DE RADIADOR, QUE E TAMANHO DE CELULAR. E "**Voltage 24 Volts**"
        //    NUM APARELHO A BATERIA RECARREGAVEL.
        // 8. HONEYWELL: "**Voltage 230 Volts**" NUMA VALVULA A PILHA, "Connectivity
        //    Technology **Wired**" NUMA QUE NAO TEM FIO, E "Specific Uses For Product:
        //    **Amateur**".
        // 9. DRAYTON WISER: "Connectivity Technology **Wi-Fi**" — A WISER FALA **ZIGBEE**
        //    COM O HUB, E E O HUB QUE TEM WI-FI. E "Temperature Control Type **Manual**"
        //    NUM TERMOSTATO PROGRAMAVEL POR APP.
        // 10. SONOFF 6-PACK: "Display Type **Non**". O 4-PACK DA MESMA MARCA DIZ "LED".
        //    MESMO PRODUTO, DUAS RESPOSTAS.
        // 11. TP-LINK KASA: "Connectivity Technology **Wi-Fi**" NUMA VALVULA QUE FALA COM
        //    UM HUB PROPRIETARIO, NAO COM O ROTEADOR.
        //
        // ─── O QUE A CATEGORIA FAZ BEM ───
        // A tado° X USA **BATERIA RECARREGAVEL POR USB-C**, "fully charged in around 2 hours
        // ... required only 1x per season" — E A UNICA QUE RESOLVE O PROBLEMA REAL DESTES
        // APARELHOS, QUE E TROCAR PILHA AA EM DOZE RADIADORES. A EVE PUBLICA "**No Eve
        // cloud, no registration, no tracking. Local communication without cloud
        // dependency**", FEITA NA ALEMANHA — E A UNICA COM ARGUMENTO DE PRIVACIDADE REAL.
        // E A SONOFF PUBLICA ABERTURA DE VALVULA DE 0% A 100% **COM PRECISAO DE 1%**, QUE E
        // A ESPECIFICACAO MAIS TECNICA DA BUSCA INTEIRA.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: HIVE 5-PACK (95 AVALIACOES) E AQARA W600 (32); TERMOSTATOS DE PAREDE, QUE
        // SAO OUTRO PRODUTO (tado° WIRELESS SMART THERMOSTAT X, WARMUP, HEATMISER).
        // DENTRO: 132 A 935 AVALIACOES, NOTA 3.4 A 4.4, £39.05 A £234.95, SETE MARCAS.
        //
        // FOCUS KEYWORD: best smart radiator valve
        // VARIACOES TRABALHADAS: smart TRV / thermostatic radiator valve / smart heating
        // controls / radiator thermostat / zoned heating / smart heating valve /
        // Matter radiator valve / Zigbee TRV / room by room heating control
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "home", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-smart-radiator-valve',                               // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Smart Radiator Valve 2026: 10 Ranked, and the Multipack That Costs More', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Smart Radiator Valve 2026: Top 10 Ranked',      // TITLE DA ABA/GOOGLE (46 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best smart radiator valve options on Amazon by price per radiator, and found a four-pack that costs £42.87 more than four singles.', // META DESCRIPTION (146 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best smart radiator valve',                      // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "You do not buy one of these, you buy one per radiator, and a typical British house has eight to twelve. That makes price per valve the number that decides everything, and across this single search it varies by a factor of 2.6: SONOFF works out at £22.30 a valve in a six-pack, while Eve works out at £58.74 in a four-pack. Over ten radiators that is £223 against £587 for the same job. The Eve figure is the striking one, because Eve also sells the identical valve on its own for £48.02 — so four singles cost £192.08 and the four-pack costs £234.95, which means buying the multipack costs £42.87 more than buying four of the same thing separately, in the same shop, on the same day. That is the exact inverse of what a multipack is for. Meanwhile almost none of these work alone: tado needs a Bridge X, Eve needs a Thread border router, Drayton needs a Wiser Heat Hub and SONOFF needs a Zigbee hub, none of which is in the price. We ranked ten of the best smart radiator valve options on Amazon in August 2026 by what it actually costs to heat a house room by room, and found one product in a smart valve search whose own fifth bullet reads \"No app or wifi required\".", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO NA ABERTURA
            'conclusion' => "Choosing the best smart radiator valve is a whole-house decision priced one radiator at a time, so start by counting your radiators and multiplying. That single sum reorders this page completely, and it is worth checking the multipack against the singles before you add to basket, because on this evidence you cannot assume the bigger box is the better deal. Then add the hub, since only one valve here works without some kind of bridge and none of them include it. After that, three things separate them in use. Batteries first: most take two AAs that need changing across every radiator in the house once a year, and exactly one uses a rechargeable cell you top up over USB-C once a season, which on twelve radiators is the difference between a chore and a task. Ecosystem second — Matter and Thread valves will outlive their manufacturer's app in a way proprietary ones will not, and one brand here runs entirely locally with no cloud account at all. And valve compatibility third, because these screw onto the pin your existing radiator already has; most fit around 90% of British valves and ship adaptors for the common exceptions, so check yours before ordering twelve of anything. Crucially, treat energy-saving percentages with suspicion: one brand claims 22% and names no study, and the other nine claim nothing at all.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 23:10:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'SONOFF Zigbee Thermostatic Radiator Valve TRVZB, Pack of 6',              // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£133.80',                                                               // PRECO (COLETADO EM 30/08/2026)
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 935,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61D6YrXsLwL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best smart radiator valve',                                          // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0H3HHQ75L?tag=ranked10-21',       // LINK AFILIADO
                'summary' => '£22.30 per radiator is less than half what most of this page charges, backed by the deepest review pool here and a 1% valve position readout.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Twenty-two pounds thirty a radiator is what makes this the best smart radiator valve for anyone doing a whole house. Six valves for £133.80 undercuts the Eve four-pack by £36.44 per unit, which across ten radiators is a £364 difference for a job both products do identically. Nine hundred and thirty-five ratings at 4.2 stars is also the deepest evidence in this comparison, so the price is not buying you an unknown.

The specification behind it is the most technical in the search. SONOFF publishes valve opening from 0% to 100% \"with an accuracy of 1%\", which is the only figure anywhere on this page describing what the actuator actually does rather than what the app looks like. Six months of stored history gives daily, weekly and monthly heating consumption, open-window detection shuts the valve while you ventilate, and Zigbee 3.0 means it works with Home Assistant through Zigbee2MQTT — the escape route that matters if you would rather not depend on anyone's cloud.

Two honest costs. It needs a SONOFF Zigbee 3.0 hub, and the listing names the acceptable ones — ZBBridge-P, ZBBridge-U, NSPanel Pro, iHost — which is more disclosure than most, but it is another £25 to £30 that is not in the £133.80. And this is the enthusiast option: eWeLink and Zigbee2MQTT are a different proposition from opening the Hive app. The specification table also says \"Display Type: Non\" here while SONOFF's own four-pack listing says LED, for the same valve.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['£22.30 per radiator, less than half the dearest valve on this page', '935 ratings at 4.2, the deepest evidence in this comparison', 'Publishes valve opening from 0-100% with 1% accuracy, uniquely here', 'Six months of stored heating consumption history', 'Home Assistant and Zigbee2MQTT support, so no cloud dependency'], // PONTOS POSITIVOS
                'contras' => ['Needs a SONOFF Zigbee 3.0 hub, another £25-30 not in the price', 'eWeLink and Zigbee2MQTT suit enthusiasts more than casual users', 'Spec table says "Display Type: Non" where the 4-pack says LED', 'Six valves is more than a small flat needs'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Drayton Wiser Smart Heating TRV Radiator Valve, Single Unit',             // NOME (ENCURTADO)
                'price' => '£49.00',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 720,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/41iYBFtEoYL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Drayton Wiser smart heating TRV radiator valve in white',            // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B075GNG6QF?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest rated valve here at 4.4, and the only listing that opens its first bullet by telling you what else you have to own.', // TEXTO CURTO (CARD)
                'body' => "The first thing this listing says is what it needs: \"This radiator thermostat is only designed to work alongside an existing Wiser Smart Heating System with a Wiser Heat Hub.\" Not in the small print, not in bullet five — the opening sentence. In a category where the hub requirement is the single biggest hidden cost, leading with it is the most useful thing a seller on this page does, and it is why Drayton ranks second despite costing more than twice the SONOFF per valve.

Four point four stars from 720 ratings is the highest average in this comparison. Drayton is Schneider Electric's British heating brand, sold through plumbers' merchants as well as Amazon, which means an installer can service it and it will still be supported in ten years. The system scales to 32 valves across 16 rooms, so you can start with one radiator and grow, and it works with 90% of existing valve bodies with a Danfoss RA adaptor included in every box — the compatibility detail that decides whether the thing screws on at all. Open-window detection and a twist-top manual override are both present.

The reservations are cost and one field. Forty-nine pounds a valve makes ten radiators £490 before the hub, which is £267 more than the SONOFF equivalent. And the specification table lists Connectivity Technology as Wi-Fi, which is wrong: Wiser valves speak Zigbee to the Heat Hub, and it is the hub that has the Wi-Fi. Temperature Control Type also reads \"Manual\" for an app-scheduled thermostat.", // TEXTO SEO LONGO
                'pros' => ['4.4 stars from 720 ratings, the highest average in this comparison', 'States the Wiser Heat Hub requirement in its opening sentence', 'Scales to 32 valves across 16 rooms, so you can start with one', 'Fits 90% of existing valves with a Danfoss RA adaptor in every box', 'Schneider Electric brand, serviceable through plumbers merchants'], // PONTOS POSITIVOS
                'contras' => ['£49 a valve is £267 more than SONOFF across ten radiators', 'Useless without a Wiser Heat Hub, which is sold separately', 'Spec table says Wi-Fi where the valve actually speaks Zigbee', 'Temperature Control Type field reads "Manual"'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'tado° Smart Radiator Thermostat X, Matter and Thread, USB-C Rechargeable', // NOME (ENCURTADO)
                'price' => '£56.43',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 830,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Cwa-fBc7L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'tado Smart Radiator Thermostat X with touch display on a radiator',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CWPGN3YG?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only valve here with a rechargeable battery — USB-C, twice a year — which on twelve radiators is the difference between a chore and a task.', // TEXTO CURTO (CARD)
                'body' => "Batteries are the unglamorous reason people abandon smart heating. Most of these valves take two AA cells that go flat across a whole house at roughly the same time, which means finding twelve sets and a screwdriver on a cold evening. The tado° X uses a removable rechargeable cell instead: \"fully charged in around 2 hours using a standard USB-C cable (required only 1x per season)\". Once or twice a year, on a cable you already own, with no batteries to buy. It is the only product on this page that solves the actual long-term annoyance of owning these, and it is worth more than most of the app features in this category.

The rest is modern and well built. Matter over Thread rather than a proprietary protocol means it will outlive tado's own app, there is a proper touch display on the valve for anyone in the room who does not want to find a phone, and the included adapter fits almost every radiator valve with a metal nut rather than the plastic one that cracks. Eight hundred and thirty ratings at 4.2 stars is the second deepest sample here.

Two things to weigh. It needs a Bridge X, or another Thread border router, and neither is included. And the first bullet claims users \"save an average of 22 percent in energy\" — the only savings figure published anywhere in this search, with no study, no methodology and no statement of what it is 22% better than. The specification table also lists a \"Screen Size 10.4 Centimetres\", which is a phone-sized display on a radiator valve, and 24 volts on a battery device.", // TEXTO SEO LONGO
                'pros' => ['USB-C rechargeable battery, charged once a season, unique on this page', 'No AA batteries to buy or change across a whole house', 'Matter over Thread, so it outlives the manufacturer\'s own app', 'Touch display on the valve itself for control without a phone', '830 ratings at 4.2 and a metal fitting nut rather than plastic'], // PONTOS POSITIVOS
                'contras' => ['Needs a Bridge X or another Thread border router, not included', 'Claims a 22% energy saving with no study or baseline named', 'Spec table lists a 10.4cm screen size on a radiator valve', '£56.43 a valve, the dearest single unit here after Bosch'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'SONOFF Zigbee Thermostatic Radiator Valve TRVZB, Pack of 4',              // NOME (ENCURTADO)
                'price' => '£103.97',                                                               // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 524,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61HC3ZJiDaL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'SONOFF Zigbee thermostatic radiator valve TRVZB four pack',          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CL9K8Y69?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The same valve as number one in a smaller box, at £25.99 each — and unlike Eve, SONOFF actually charges less per unit for the bigger pack.', // TEXTO CURTO (CARD)
                'body' => "This is the identical TRVZB valve sold at number one, in a four-pack rather than a six, and the two listings together demonstrate what a multipack is supposed to do. Four valves at £103.97 is £25.99 each; six at £133.80 is £22.30 each. Buying more units lowers the price per unit by £3.69, which is the ordinary and expected direction of travel — and it is worth stating plainly because Eve, at number nine, moves the other way.

Four is also the right number for a lot of British homes. A two-bedroom flat with a living room, a kitchen, a bathroom and two bedrooms does not need six valves, and paying £30 for two you will not fit is not a saving. Five hundred and twenty-four ratings at 4.2 stars matches its six-pack sibling exactly on average.

Everything else is the same: Zigbee 3.0 requiring a SONOFF hub, which this listing names in its fourth bullet with the specific models that work; 0% to 100% valve opening with 1% accuracy; six months of consumption history; open-window detection; Home Assistant support through Zigbee2MQTT. It is the same enthusiast proposition, and the same caveat applies — this is a system you will configure rather than an appliance you will unbox. One small inconsistency across the two SONOFF listings: this one gives Display Type as LED, the six-pack gives \"Non\", for a valve that has the same display in both boxes.", // TEXTO SEO LONGO
                'pros' => ['£25.99 a valve, second cheapest per radiator in this comparison', 'The pack size actually reduces the unit price, unlike Eve', 'Four valves suits a flat better than six, with no waste', 'Names the exact SONOFF hubs that work in its fourth bullet', 'Same 1% valve accuracy and six-month history as the six-pack'], // PONTOS POSITIVOS
                'contras' => ['Needs a SONOFF Zigbee 3.0 hub, sold separately', '£3.69 more per valve than the six-pack of the same product', 'Display Type field disagrees with SONOFF\'s own other listing', 'Enthusiast setup rather than a plug-and-play appliance'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Eve Thermo Matter Smart Radiator Valve, Single, No Cloud Account',        // NOME (ENCURTADO)
                'price' => '£48.02',                                                                // PRECO
                'rating' => 3.9,                                                                    // NOTA
                'reviews_count' => 132,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71y97LO4uSL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Eve Thermo Matter smart radiator valve with LED display',            // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DNMV7NXR?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only valve here that runs entirely locally — no cloud, no account, no tracking — and £10.72 cheaper per unit than Eve\'s own four-pack.', // TEXTO CURTO (CARD)
                'body' => "\"No Eve cloud, no registration, no tracking. Local communication without cloud dependency.\" No other listing in this search makes that claim, and for a device that knows when your house is empty it is a substantive one. Everything runs over Thread on your own network, through your own hub, with nothing routed via a company server — so there is no account to be breached, no service to be discontinued, and no subscription that could appear later. Made in Germany, and Matter-certified so it works across Apple Home, SmartThings, Alexa and Google Home rather than one of them.

At £48.02 it is also, absurdly, cheaper per valve than Eve's own four-pack at £58.74. If you want four Eve valves, buy four of these and save £42.87 over the boxed set.

The listing is admirably specific about what you need: iOS 18.1 or Android 8.1 or later, plus a Thread border router, and it names them — Apple TV 4K second or third generation, HomePod or HomePod mini, SmartThings Hub v3, Echo fourth generation or Echo Hub. That is the clearest hub disclosure on this page.

Two reservations keep it fifth. One hundred and thirty-two ratings is the thinnest sample here, and 3.9 stars is the second lowest average — Matter and Thread setups are genuinely fiddlier than a proprietary app, and the reviews reflect the pairing rather than the valve. If you already own an Apple TV or an Echo, that friction is much lower.", // TEXTO SEO LONGO
                'pros' => ['Runs entirely locally: no cloud, no account, no tracking, no subscription', '£10.72 cheaper per valve than Eve\'s own four-pack', 'Matter certified across Apple Home, SmartThings, Alexa and Google', 'Names the exact hubs and OS versions required', 'Made in Germany with a proper touch and app control'], // PONTOS POSITIVOS
                'contras' => ['132 ratings, the thinnest sample in this comparison', '3.9 stars, the second lowest average here', 'Needs a Thread border router, which is an extra purchase if you have none', 'Matter pairing is fiddlier than a single-brand app'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'TP-Link Kasa KE100 Smart Radiator Valve with Geofencing',                 // NOME (ENCURTADO)
                'price' => '£89.97',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 469,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/610ubDP7b-L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'TP-Link Kasa KE100 smart radiator thermostat valve in white',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0H3HJM5W7?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only valve here with free geofencing and support for a separate room sensor — so it heats the room rather than the radiator.', // TEXTO CURTO (CARD)
                'body' => "Two features here are genuinely better ideas than anything else on this page. The first is external temperature sensor support: pair a Tapo T310 or T315 and the valve regulates on the temperature where you sit rather than the air six inches above a hot radiator. That is the fundamental design flaw of every thermostatic valve ever made, and TP-Link is the only brand in this search that offers a fix for it. The second is window and door sensor integration through the Tapo T110, which shuts the heating and enables frost protection when a window actually opens rather than guessing from a temperature drop.

Geofencing is included at no charge — the house warms as you approach and cools as you leave — which several competitors treat as a premium feature. Group control lets you drive several radiators in one large room as a single zone, and TP-Link's Kasa and Tapo ecosystem is large enough that the sensors are cheap and easy to find. Four hundred and sixty-nine ratings at 4.2 stars is a solid mid-table sample.

The cost is real: £89.97 for this pack is the second highest price on the page after the Eve four-pack, and like everything else here it needs a hub. The specification table gives Connectivity Technology as Wi-Fi, which is not right — the KE100 talks to a TP-Link hub over its own low-power radio, and it is the hub that carries Wi-Fi. The distinction matters because it determines whether the valve works when your broadband drops.", // TEXTO SEO LONGO
                'pros' => ['External temperature sensor support fixes the core flaw of radiator valves', 'Window and door sensor integration through Tapo T110', 'Geofencing included free, which rivals charge for', 'Group control for multiple radiators in one large room', '469 ratings at 4.2 with a large accessory ecosystem'], // PONTOS POSITIVOS
                'contras' => ['£89.97 is the second highest price on this page', 'Requires a TP-Link hub, sold separately', 'Spec table says Wi-Fi where the valve uses a proprietary radio', 'The useful sensors are additional purchases on top'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Bosch Smart Home Radiator Thermostat II [+M], Matter or Bosch Controller', // NOME (ENCURTADO)
                'price' => '£74.99',                                                                // PRECO
                'rating' => 4.1,                                                                    // NOTA
                'reviews_count' => 145,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61U+usN3SCL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Bosch Smart Home radiator thermostat II in white on a radiator',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DHGSL6FC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only valve here you can run two ways: inside Bosch\'s own system, or on Matter with no Bosch controller at all.', // TEXTO CURTO (CARD)
                'body' => "Every other valve on this page locks you into one route. This one gives you two, and lets you pick at installation: \"Can be integrated into your Bosch Smart Home system with the Bosch Smart Home controller or used in a Matter system without the controller; this can be selected during installation.\" That is a genuine hedge against the risk this whole category carries — that you fit twelve valves and the manufacturer discontinues the app three years later. If Bosch walks away, the Matter path still works with an Apple TV or an Echo.

It is a Bosch, which shows in the details: two AA batteries are included rather than sold separately, the body is 132 grams of ABS with a backlit display, and it combines with a Bosch room thermostat so several radiators in one room regulate against a single measured temperature rather than fighting each other. Control works on the device, through the app, on a schedule, or by voice.

Two things hold it back. Seventy-four pounds ninety-nine a valve is the highest single-unit price in this comparison — £26 more than the Eve, and £52.69 more per radiator than the SONOFF, which over ten radiators is £527. And 145 ratings at 4.1 stars is a thin sample for a product at this price. The specification table gives Voltage as 3 volts, which is correct for two AA cells in series and is, notably, one of the few voltage fields on this page that is not simply wrong.", // TEXTO SEO LONGO
                'pros' => ['Runs on Bosch\'s own system or on Matter with no Bosch controller at all', 'Hedges against the manufacturer discontinuing its app', 'Two AA batteries included rather than sold separately', 'Combines with a Bosch room thermostat so radiators do not fight', 'One of the few listings here whose voltage field is correct'], // PONTOS POSITIVOS
                'contras' => ['£74.99, the highest single-unit price in this comparison', '£52.69 more per radiator than the SONOFF equivalent', '145 ratings is a thin sample at this price', 'Full functionality still points towards buying into Bosch Smart Home'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'tado° Smart Radiator Thermostat X Trio Pack, Three Valves',               // NOME (ENCURTADO)
                'price' => '£161.49',                                                               // PRECO
                'rating' => 4.0,                                                                    // NOTA
                'reviews_count' => 780,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71F4+eetjyL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'tado Smart Radiator Thermostat X trio pack of three valves',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CWPDXWHP?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Three tado° X valves in one box, saving you £2.60 each against buying them separately — which is £7.80 across the whole pack.', // TEXTO CURTO (CARD)
                'body' => "The Trio Pack is three of the tado° X valves ranked third on this page, and the reason to know about it is the arithmetic rather than the product. One hundred and sixty-one pounds forty-nine divided by three is £53.83 a valve, against £56.43 for a single. The saving is £2.60 per valve, or £7.80 across the box — a 4.6% discount for committing to three units at once. That is not nothing, but it is a long way from the reduction most buyers assume a multipack delivers, and it is worth checking against the single-unit price on the day rather than assuming.

Everything good about the tado° X applies here in triplicate: the USB-C rechargeable battery charged once a season, Matter over Thread so it survives the app, the touch display, the metal fitting nut, and the adapter that fits almost every British radiator valve. Seven hundred and eighty ratings at 4.0 stars is the third deepest sample here.

Two caveats beyond price. The average is 4.0 against the single unit's 4.2 across a comparable sample, which is a small but real gap from the same product in a different box. And this listing repeats both of the single's problems: the unsourced claim that users \"save an average of 22 percent in energy\", and a specification table declaring a 10.4 centimetre screen and 24 volts on a rechargeable battery device. You still need a Bridge X or another Thread border router, and three valves is exactly enough for a living room, a bedroom and a bathroom.", // TEXTO SEO LONGO
                'pros' => ['Three valves in one box with the season-long USB-C rechargeable battery', 'Matter over Thread across all three units', '780 ratings at 4.0, the third deepest sample here', 'Three valves covers a living room, a bedroom and a bathroom', 'Same metal fitting nut and universal adapter as the single'], // PONTOS POSITIVOS
                'contras' => ['Saves only £2.60 per valve against buying singles, or £7.80 in total', '4.0 stars against 4.2 for the same valve sold individually', 'Repeats the unsourced 22% energy saving claim', 'Still needs a Bridge X, and still lists a 10.4cm screen size'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Eve Thermo Matter Smart Radiator Valve, Pack of 4',                       // NOME (ENCURTADO)
                'price' => '£234.95',                                                               // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 643,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/711DIYd95bL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Eve Thermo Matter smart radiator valve four pack',                   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DNQT8FTD?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The four-pack costs £42.87 more than four of the same valve bought singly. That is the arithmetic, and it is why the best Eve product here is the single unit.', // TEXTO CURTO (CARD)
                'body' => "Two hundred and thirty-four pounds ninety-five for four valves is £58.74 each. Eve sells the identical valve on its own, on the same storefront, for £48.02. Four singles therefore cost £192.08, and the four-pack costs £234.95 — so the multipack carries a £42.87 penalty, or £10.72 per valve, for the convenience of one box instead of four. Multipacks exist to make units cheaper. This one makes them 22% dearer, and nothing on the listing explains why.

The product itself is the same excellent thing ranked fifth: fully local operation with no Eve cloud, no account and no tracking; Matter and Thread so it works across Apple Home, SmartThings, Alexa and Google Home; heating by schedule or presence; a pause for ventilation; touch controls on the valve. Made in Germany. Six hundred and forty-three ratings at 4.2 stars is actually a better average and a much deeper sample than the single listing's 3.9 from 132, which is the one argument in the four-pack's favour — more people have bought this box and been happier.

So the honest recommendation splits. If you want four Eve valves, buy four singles and keep the £42.87. If the deeper review pool matters more to you than the money, this is the listing those 643 people are describing. Either way you need a Thread border router, and the listing names them precisely — Apple TV 4K, HomePod, HomePod mini, SmartThings Hub v3, Echo fourth generation or Echo Hub — which remains the clearest hub disclosure on this page.", // TEXTO SEO LONGO
                'pros' => ['643 ratings at 4.2, a deeper and better-rated pool than the single listing', 'Same fully local operation with no cloud, account or tracking', 'Matter and Thread across all four platforms', 'Names the exact hubs and OS versions needed', 'Made in Germany with no subscription of any kind'], // PONTOS POSITIVOS
                'contras' => ['£58.74 per valve against £48.02 for the same valve bought singly', 'The four-pack costs £42.87 more than four singles', 'Most expensive product on this page at £234.95', 'Still needs a Thread border router that is not included'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Honeywell Home HR27 Programmable Thermostatic Radiator Valve',            // NOME (ENCURTADO)
                'price' => '£39.05',                                                                // PRECO
                'rating' => 3.4,                                                                    // NOTA
                'reviews_count' => 261,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61VujzdEJ2L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Honeywell Home HR27 programmable radiator thermostat with LCD',      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CGJF1LSX?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Sold under the words "Smart Radiator Thermostat Valve", with a fifth bullet reading "No app or wifi required". It is a clock, not a smart device.', // TEXTO CURTO (CARD)
                'body' => "This appears in a search for smart radiator valves, its title contains the words \"Smart Radiator Thermostat Valve\", and its fifth bullet says: \"Simple to Use: No app or wifi required.\" Both statements are on the same page and only one of them describes the product. The HR27 is a programmable thermostatic radiator valve — a clock and a temperature dial in a battery-powered head. It has no radio of any kind. It cannot be controlled from a phone, it does not know when you leave the house, it cannot be grouped with other radiators, and it will not appear in Alexa, Apple Home or anything else.

Judged as what it is, it is competent and there is a real case for it. Six switching points a day, 5°C to 30°C in precise steps, separate programming for each day of the week, a large LCD that rotates to read correctly whether the valve points left or right, and compatibility with Honeywell Home, Danfoss, MNG and Heimeier valve bodies. If you want one bedroom to warm at seven and cool at nine and you never want to open an app, £39.05 buys exactly that with no hub and no ongoing anything.

Three point four stars from 261 ratings is the lowest average in this comparison by half a star, and the sample is large enough to be a signal. The most likely explanation is the one this entry opens with: people bought a product listed among smart valves, expecting phone control, and received a programmable dial. The specification table adds to the confusion with \"Voltage 230 Volts\" on a battery device, \"Connectivity Technology: Wired\" on one with no wires, and a Specific Uses field reading \"Amateur\".", // TEXTO SEO LONGO
                'pros' => ['No hub, no app, no account and nothing to configure', 'Six switching points a day with separate programming per weekday', 'Large LCD that rotates to suit a left or right-facing valve', 'Fits Honeywell Home, Danfoss, MNG and Heimeier valve bodies', 'Cheapest way to schedule one radiator, at £39.05'], // PONTOS POSITIVOS
                'contras' => ['Titled a smart valve while its own bullet says "No app or wifi required"', 'No radio at all: no phone control, no grouping, no voice assistants', '3.4 stars from 261 ratings, the lowest average here by half a star', 'Spec table says 230 Volts and "Wired" on a battery-powered valve'], // PONTOS NEGATIVOS
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
        $this->command?->info("SmartRadiatorValvesSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
