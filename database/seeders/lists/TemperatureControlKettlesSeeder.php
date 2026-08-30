<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class TemperatureControlKettlesSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE CHALEIRAS COM CONTROLE DE TEMPERATURA DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=electric+kettle+temperature+control&rh=p_36%3A2500-  (20 ASINS)
        // CATEGORIA KITCHEN — COMISSAO DE 5%.
        //
        // ⚠ MODIFICADOR ESPECIFICO NO SLUG, DE PROPOSITO: "temperature control kettle" E
        // NAO "electric kettle". E A TATICA DO spruceup (12v-kettles, 1000w-microwaves) E
        // DO NOSSO CLUSTER DE microSD, QUE E O QUE COMPROVADAMENTE RANQUEIA.
        //
        // PROFUNDIDADE: 37.703 / 3.929 / 1.807 / 1.092 / 862 / 794 / 617 / 416 / 347 / 268 / 184.
        //
        // ─── ACHADO PRINCIPAL: "CUP" NAO E UNIDADE, DE NOVO ───
        // 1. MESMO PADRAO QUE ACHAMOS NAS PANELAS DE ARROZ, AGORA EM CHALEIRA. DEZ JARRAS,
        //    NOVE DELAS DE 1,7 L IDENTICOS, E O "cup" MUDA DE MARCA PARA MARCA:
        //      BOSCH MYMOMENT ... "boil one cup in under a minute. *cup is equal to 250ml"
        //                         ← DEFINE. 250 ml
        //      BEAR ............. "6-8 standard cups (250ml) per fill"  ← DEFINE. 250 ml
        //      NINJA ............ 1,7 L "enough for 7 cups" .......... = 243 ml
        //      OLVY ............. 1,7 L "7-8 cups" ................... = 213-243 ml
        //      BREVILLE SELECTA . 1,7 L "makes 6 to 8 cups" .......... = 213-283 ml
        //      RUSSELL HOBBS .... 1,7 L "up to six cups" ............. = **283 ml**
        //      BOSCH SKY / HADEN / COSORI / RHD: NAO PUBLICAM CONTAGEM DE CUP
        //    DA MESMA JARRA DE 1,7 LITRO SAI "SEIS CUPS" NA RUSSELL HOBBS E "SETE" NA NINJA.
        //    O cup VAI DE 213 A 283 ml — 33% DE VARIACAO. DUAS DAS DEZ DIZEM QUANTO E.
        //
        // ─── ACHADO 2: 3000 W NAO E RECURSO, E O TETO DA TOMADA ───
        // 2. PLUGUE BRITANICO E FUSIVEL DE 13 A; A REDE E 230 V. 13 × 230 = **2.990 W**.
        //    LOGO "3000W FAST BOIL" E O MAXIMO LEGAL, NAO UMA VANTAGEM COMPETITIVA:
        //      3000 W .. BOSCH MYMOMENT · NINJA · BREVILLE (3kW) · COSORI · RUSSELL HOBBS
        //      2200 W .. OLVY · BEAR
        //      1200 W .. RHD GOOSENECK (0,9 L)
        //      NAO PUBLICA .. BOSCH SKY (£104.99) E HADEN
        //    CINCO CHALEIRAS NA MESMA POTENCIA SAO CINCO CHALEIRAS COM A MESMA VELOCIDADE
        //    DE AQUECIMENTO PARA A MESMA AGUA. A DIFERENCA DE TEMPO SO PODE VIR DO VOLUME.
        //
        // ─── ACHADO 3: A CONTA DE FERVURA, E QUEM PASSA NELA ───
        // 3. AQUECER AGUA CUSTA 4.186 J POR kg POR °C. DE 20 °C A 100 °C:
        //      250 ml → 0,25 × 4186 × 80 = 83,7 kJ → A 3000 W SAO **28 SEGUNDOS** (AGUA SO)
        //      500 ml → 167,4 kJ → A 2200 W COM 90% DE RENDIMENTO SAO **85 SEGUNDOS**
        //      900 ml → 301,4 kJ → A 1200 W COM 90% SAO **279 SEGUNDOS = 4,7 MINUTOS**
        //    CONFERINDO AS ALEGACOES:
        //      BOSCH MYMOMENT: "one cup (250ml) in under a minute" A 3000 W ....... ✓ SOBRA
        //      NINJA: "1 cup in under 50 seconds" A 3000 W ....................... ✓ SOBRA
        //      BEAR: "boils 0.5L in just 2 minutes" A 2200 W (FISICA PEDE 85 s) .. ✓ MODESTA
        //      RHD: "3-5 minutes for a full kettle" A 1200 W E 0,9 L ............. ✓ EXATA
        //    NENHUMA MENTE NO TEMPO DE FERVURA. E RARO E MERECE SER DITO — A RHD ACERTA
        //    NA MOSCA (4,7 MIN CAI DENTRO DE 3-5) E A BEAR E ATE CONSERVADORA.
        //
        // ─── ACHADO 4: A BEAR PUBLICA DUAS POTENCIAS NO MESMO BULLET ───
        // 4. "【**2200W** RAPID BOIL TECHNOLOGY】 The powerful **1800W-2200W** heating
        //    element..." O TITULO DO BULLET DIZ 2200 E O CORPO DO MESMO BULLET DIZ UMA FAIXA
        //    DE 1800 A 2200. UMA RESISTENCIA TEM UMA POTENCIA.
        //
        // ─── ACHADO 5: PRECISAO DECLARADA QUE ANDA AO CONTRARIO DO PRECO ───
        // 5. COSORI (£94.99) DECLARA "±5°C accuracy". RHD (£64.99) DECLARA "±1°C/°F
        //    Temp. Accuracy" COM SENSOR NTC. A MAIS BARATA ANUNCIA PRECISAO CINCO VEZES
        //    MELHOR. NENHUMA DIZ COMO FOI MEDIDA NEM ONDE FICA O SENSOR — E SENSOR NA BASE
        //    LE A CHAPA, NAO A AGUA.
        //
        // ─── ACHADO 6: COMPARACAO CONTRA SI MESMA, DE NOVO ───
        // 6. RUSSELL HOBBS: "QUIET BOIL TECHNOLOGY - 75 percent quieter than a standard
        //    kettle (**compared to a Russell Hobbs kettle without Quiet Boil Technology**)".
        //    ALEM DE COMPARAR COM ELA MESMA, "75% MAIS SILENCIOSA" NAO MAPEIA PARA NADA:
        //    RUIDO SE MEDE EM dB, QUE E ESCALA LOGARITMICA. NENHUM dB APARECE NA PAGINA.
        //
        // ─── ACHADO 7: CAMPO DE FICHA COM LIXO ───
        // 7. OLVY: A TABELA DE ESPECIFICACAO TEM UMA LINHA "Customer Reviews 4.0 4.0 out of
        //    5 stars (416) 4.0 out of 5 stars" — O WIDGET DE AVALIACAO VAZOU PARA DENTRO DA
        //    FICHA TECNICA.
        // 8. COSORI: "Item Type Name: **Cosori**" — O CAMPO DE TIPO PREENCHIDO COM A MARCA.
        //    NINJA: "Item Type Name: **Ketle**" (SIC, SEM O T).
        //    BOSCH SKY: "Item Type Name: **Bosch Sky Kettle Black/Silver**" — O NOME
        //    COMERCIAL INTEIRO NO CAMPO DE TIPO.
        // 9. HADEN: "Since 1958, Haden have been the pioneers of kettle design" E "BRITISH
        //    INSPIRED" NO BULLET, "Country of Origin: **China**" NA FICHA. "INSPIRED" ESTA
        //    FAZENDO TRABALHO PESADO.
        //
        // ─── O CONTRASTE QUE FECHA O ARGUMENTO ───
        // A BOSCH MYMOMENT DE **£37.81** PUBLICA 3000 W E DEFINE O cup EM 250 ml.
        // A BOSCH SKY DE **£104.99** NAO PUBLICA POTENCIA NEM CONTAGEM DE cup.
        // MESMA MARCA, £67 DE DIFERENCA, E A BARATA INFORMA MAIS.
        //
        // ─── ASIN DUPLICADO ───
        // OLVY: B0FSF7VWLX (£32.99, 416 AVALIACOES) E B0FSF7N5NG (£34.99, 347) — MESMO
        // PRODUTO 1.7L/2200W, POOLS SEPARADOS. MANTIDO O MAIS BARATO E MAIS AVALIADO.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: O SEGUNDO ASIN DA OLVY; CHALEIRAS SEM CONTROLE DE TEMPERATURA QUE A BUSCA
        // MISTUROU; AIGOSTAR (4 AVALIACOES). DENTRO: 184 A 37.703 AVALIACOES, NOTA 4.0 A
        // 4.6, £25.49 A £104.99, DEZ MARCAS.
        //
        // FOCUS KEYWORD: best temperature control kettle
        // VARIACOES TRABALHADAS: variable temperature kettle / electric kettle with
        // temperature control / gooseneck kettle / smart kettle / fast boil kettle /
        // digital kettle / kettle for green tea / pour over kettle / 3000W kettle
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "kitchen", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-temperature-control-kettle',                          // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Temperature Control Kettle 2026: 10 Ranked, and Why a Cup Is Not a Cup', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Temperature Control Kettle 2026: Top 10 Ranked', // TITLE DA ABA/GOOGLE (50 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best temperature control kettle options on Amazon by the physics of boiling water, and found the same 1.7L jug sold as six cups and as seven.', // META DESCRIPTION (156 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best temperature control kettle',                // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Nine of these ten kettles hold exactly 1.7 litres, and they cannot agree on how many cups that is. Russell Hobbs says its 1.7 litre jug makes \"up to six cups\", which works out at 283 millilitres each. Ninja says its 1.7 litre jug is \"enough for 7 cups\", or 243 millilitres. Breville hedges at \"6 to 8\". Only two listings on the whole page say what they mean: Bosch defines it in a footnote as \"cup is equal to 250ml\", and Bear writes \"6-8 standard cups (250ml)\". The same water, sold in units that vary by a third. Meanwhile the wattage tells a story of its own, because a British plug is fused at 13 amps on a 230 volt supply, which caps any kettle at 2,990 watts — so the \"3000W fast boil\" on five of these boxes is not a feature anyone engineered, it is the wall socket's ceiling that all of them share. And the sharpest comparison here is inside one brand: Bosch's £37.81 kettle publishes its wattage and defines its cup, while Bosch's £104.99 kettle publishes neither. We ranked ten of the best temperature control kettle options on Amazon in August 2026 against the arithmetic of heating water, and found something rare — not one of them lies about boil time.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO NA ABERTURA
            'conclusion' => "Choosing the best temperature control kettle is unusually simple once you know that the headline numbers are mostly fixed by law and physics. Wattage is capped at just under 3,000 watts by the 13 amp plug, so every kettle at that figure heats the same water at the same rate and no brand can be meaningfully faster than another; the only real variables are how much water you put in and how much heat escapes through the jug. Capacity is almost always 1.7 litres, and the cup count printed beside it is a marketing unit rather than a measurement, so divide by 250 and use that. What actually differs, and what is worth paying for, is the temperature range and the hold function: 80°C for green tea, 90°C for a pour-over, and a hold that keeps the water there for half an hour so a second cup does not mean a second boil, which is where a variable temperature kettle earns back its price in electricity. By contrast, a double wall keeps the outside cool and the water hot but adds weight, and a gooseneck spout is worth having only if you brew filter coffee by hand. In practice, buy on temperature range, hold time and the honesty of the listing, and treat every cup count as an estimate.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 21:00:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Bosch MyMoment Infuse Cordless Kettle, 3000W, 1.7L, TWK3M123GB',          // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£37.81',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 617,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61DISBRXPpL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best temperature control kettle',                                    // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CJK15C17?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing here that both publishes its full 3000W and defines what it means by a cup — for £67 less than the Bosch that does neither.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "One footnote puts this first. The second bullet promises to \"boil one cup in under a minute*\", and the asterisk resolves to \"*cup is equal to 250ml\". That is the only unambiguous unit on this page apart from Bear's, and it lets you check the claim: 250 millilitres from 20°C to boiling needs 83.7 kilojoules, which at 3,000 watts takes 28 seconds for the water itself. Under a minute is comfortably true even after heating the jug and the element. Bosch has published a number, defined its terms, and told the truth.

The kettle behind the footnote is straightforward and well made. Three thousand watts is the legal maximum a 13 amp British plug allows, so nothing on this page heats faster. It holds 1.7 litres, has cup indicators moulded into the window so you can actually fill 250 millilitres rather than guessing, a removable limescale filter, one-touch lid opening, cord storage and a triple safety system with automatic shut-off and boil-dry protection.

The honest caveat is that this is Bosch's simple kettle, not its clever one. There is no variable temperature selector, no hold function and no digital display — it boils, and it boils quickly. If you want 80°C for green tea you need the Ninja at number two or the Bosch Sky further down. What you get for £37.81 is the fastest heating physics permits, an accurate description of itself, and 617 ratings at 4.5 stars behind it. In a category where the £104.99 model from the same brand publishes neither its power nor its capacity in cups, that is worth more than it sounds.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['The only listing here to define its cup in a checkable footnote: 250ml', '3000W, the maximum a 13A British plug permits', 'Cup indicators in the window so you can fill precisely', 'Cheapest 3kW kettle in this comparison at £37.81', 'Removable limescale filter and triple safety system'], // PONTOS POSITIVOS
                'contras' => ['No variable temperature control, despite the category', 'No hold-warm function and no digital display', 'Plastic body where most rivals here use stainless steel', 'Only one temperature: boiling'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Ninja Perfect Temperature Kettle KT200UK, 3000W, 6 Presets, Hold Temp',   // NOME (ENCURTADO)
                'price' => '£69.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 1807,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61YxN0fy4QL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Ninja Perfect Temperature kettle in matte black with digital display', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09KM4H1VL?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best variable temperature kettle here: 3000W, six presets from 60°C, a 30-minute hold, and 1,807 ratings at the highest average on the page.', // TEXTO CURTO (CARD)
                'body' => "Four point six stars from 1,807 ratings is the highest average in this comparison and the third deepest sample, and the specification explains why. Six presets from 60°C to 100°C cover every drink that cares — 60 for baby formula, 80 for green tea, 90 for pour-over coffee, 100 for builder's tea — and the digital display shows the water climbing in real time rather than making you trust a light. Hold Temp keeps the selected temperature for 30 minutes, which is the feature that actually saves money: a second cup within half an hour costs nothing instead of a second full boil.

The claims check out. \"Quickly boil 1 cup in under 50 seconds\" at 3,000 watts is well within physics, which needs about 28 seconds for 250 millilitres of water alone. And Ninja's cup is consistent with itself: 1.7 litres described as \"enough for 7 cups\" works out at 243 millilitres, close to the 250 that Bosch and Bear define explicitly. It never states the figure, which is the one thing keeping it off the top spot, but at least its two numbers agree.

At £69.99 it costs £32 more than the Bosch at number one and buys you the entire temperature-control feature set, which for anyone drinking green tea or making coffee by hand is the whole point of the category. The specification table lists Item Type Name as \"Ketle\", missing a T — a small thing, but it is the same class of unchecked field that runs through every listing on this page. Total weight is a light 1.24kg and the base swivels 360 degrees.", // TEXTO SEO LONGO
                'pros' => ['4.6 stars from 1,807 ratings, the highest average in this comparison', 'Six presets from 60°C to 100°C with a real-time digital read-out', '30-minute Hold Temp, which removes the cost of a second boil', '3000W, matching the fastest kettles here', 'Its cup count of 243ml agrees with the brands that define theirs'], // PONTOS POSITIVOS
                'contras' => ['Never states what it means by a cup, unlike Bosch and Bear', '£69.99 is £32 more than the Bosch at number one', 'Spec table spells its own product type "Ketle"', 'Hold Temp caps at 30 minutes where cheaper rivals offer hours'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Cosori Kettle, 3000W, 1.7L, ±5°C Control, Plastic-Free Water Contact',    // NOME (ENCURTADO)
                'price' => '£94.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 37703,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61v1eavFCVL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Cosori stainless steel temperature control kettle in premium silver', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0H45FH22R?tag=ranked10-21',       // LINK AFILIADO
                'summary' => '37,703 ratings — nine times deeper than anything else here — and the only kettle where no plastic touches the water at any point.', // TEXTO CURTO (CARD)
                'body' => "Thirty-seven thousand seven hundred and three ratings is not merely the deepest evidence on this page, it is nine times deeper than the next kettle down. At that sample size 4.3 stars is a settled fact rather than an early impression, and it tells you this is a good kettle that some people find expensive.

The specification most worth the money is the one in the title: no plastic contacts the water. The interior is 304 stainless steel throughout, including the parts most kettles quietly make from moulded plastic — the lid underside, the spout filter housing and the level window. Anyone who has noticed a plastic taste in the first cup from a new kettle knows why that matters, and it is the only kettle here that eliminates it entirely rather than claiming BPA-free plastic. Three thousand watts, 1.7 litres, 40°C to 100°C in steps, a 60-minute keep-warm that doubles the Ninja's, two lid opening angles, and the ability to switch between Celsius and Fahrenheit or mute the beeps.

Two things to weigh. The accuracy claim is ±5°C, and the RHD gooseneck at number four claims ±1°C for £30 less — neither says where the sensor sits, and a sensor in the base reads the hot plate rather than the water, so treat both figures as unverified. And the specification table gives Item Type Name as \"Cosori\", the brand name filled into the field for the product category, which is the same unchecked-field habit found on eight of these ten listings. At £94.99 it is the second most expensive kettle here.", // TEXTO SEO LONGO
                'pros' => ['37,703 ratings, nine times the depth of anything else in this comparison', 'No plastic touches the water anywhere, unique on this page', '60-minute keep-warm, double the Ninja\'s 30', '3000W with a 40°C to 100°C range', 'Switchable °C/°F and mutable alert sounds'], // PONTOS POSITIVOS
                'contras' => ['±5°C accuracy against ±1°C claimed by a kettle £30 cheaper', 'Neither brand says where the temperature sensor actually sits', 'Item Type Name field filled with the brand name, "Cosori"', '£94.99, the second most expensive kettle here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'RHD 0.9L Electric Gooseneck Kettle, 1200W, ±1°C, LCD Display',            // NOME (ENCURTADO)
                'price' => '£64.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 3929,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71r28YctYbL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'RHD gooseneck electric kettle in matt black with LCD temperature display', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CPJ447NZ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only kettle here whose boil-time claim lands exactly where the arithmetic puts it — and the only gooseneck, for pour-over coffee.', // TEXTO CURTO (CARD)
                'body' => "We check the numbers on every listing we collect, and this one is precisely right. RHD states that \"it only takes 3-5 minutes to bring a full electric kettle with 1200 watts power to a boil\". Heating 0.9 litres from 20°C to 100°C requires 301 kilojoules; at 1,200 watts with the roughly 90% efficiency a kettle achieves, that is 279 seconds, or 4.7 minutes. The claim brackets the true figure and does not flatter it. Given that the rest of this page rounds everything in its own favour, a small brand publishing a slightly pessimistic number deserves the credit.

The gooseneck is the reason to buy it. A narrow swan-neck spout pours a thin, controllable stream, which is what filter coffee and pour-over brewing need and what a normal kettle spout cannot do — dumping water fast disturbs the coffee bed and the extraction goes uneven. Combined with real-time temperature on the LCD, a rotary knob rather than presets, and a keep-warm you can set anywhere from one to 24 hours, this is a brewing tool rather than a tea kettle. Three thousand nine hundred and twenty-nine ratings at 4.3 stars is the second deepest sample here.

Two limitations follow from the design. The capacity is 0.9 litres, roughly half of everything else on this page, so it makes three or four cups rather than seven — fine for coffee, awkward for a family. And 1,200 watts is the lowest power here by a thousand watts, which is why boiling takes nearly five minutes rather than under two. The ±1°C accuracy claim is five times better than Cosori's and, like Cosori's, comes with no explanation of how it was measured.", // TEXTO SEO LONGO
                'pros' => ['Its boil-time claim matches the arithmetic exactly, at 4.7 minutes', 'The only gooseneck spout here, essential for pour-over coffee', 'Keep-warm adjustable from 1 to 24 hours, the longest on this page', 'Real-time LCD temperature and a rotary dial rather than presets', '3,929 ratings, the second deepest sample in this comparison'], // PONTOS POSITIVOS
                'contras' => ['0.9 litres, around half the capacity of everything else here', '1200W is the lowest power here, so a full boil takes nearly 5 minutes', '±1°C accuracy claimed with no measurement method given', 'Too small for a household making tea for four'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Breville Selecta Temperature Select Kettle, 3kW, 1.7L, 5 Settings VKT159', // NOME (ENCURTADO)
                'price' => '£54.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 1092,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81AlvJWK4GL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Breville Selecta brushed stainless steel temperature select kettle',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0891QG1L3?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Five temperature settings and a concealed 3kW element for £54.99, with a temperature tracker that exists specifically to stop you reboiling.', // TEXTO CURTO (CARD)
                'body' => "The energy-saving temperature tracker is the feature worth naming, because it addresses the most common waste in a British kitchen: boiling a full kettle, forgetting it, and boiling it again twenty minutes later. The tracker shows the water cooling so you can see it is still at 85°C and pour rather than reboil. Given that a full 1.7 litre boil costs around 158 watt-hours, and a household doing it needlessly twice a day wastes over 100 kilowatt-hours a year, that is a real saving rather than a marketing one.

Five temperature settings cover black, green, white and oolong tea plus coffee, the element is concealed so limescale does not build on an exposed coil and cleaning is a wipe rather than a scrub, and the brushed stainless steel body avoids the plastic-taste problem without the Cosori's price. Three kilowatts is the standard maximum, the base rotates 360 degrees, the lid lifts off completely and there is cord storage underneath. One thousand and ninety-two ratings at 4.3 stars is the fourth deepest sample here.

The cup arithmetic is where this listing joins the pattern. \"1.7L capacity makes 6 to 8 cups\" spans 213 to 283 millilitres per cup — a 33% range inside a single sentence, from a jug whose capacity is fixed. It is the widest hedge on this page, and it sits next to a precise 3kW figure, which shows the problem is not that these brands cannot measure things. It is that nobody has decided what a cup is. At £54.99 it undercuts the Ninja by £15 while giving up the hold function and a preset.", // TEXTO SEO LONGO
                'pros' => ['Temperature tracker actively discourages reboiling, saving real money', 'Five temperature settings for £54.99, undercutting the Ninja by £15', 'Concealed element resists limescale and wipes clean', 'Brushed stainless steel body with no plastic taste', '1,092 ratings at 4.3 stars'], // PONTOS POSITIVOS
                'contras' => ['"6 to 8 cups" from a fixed 1.7L spans 213ml to 283ml per cup', 'No hold-warm function, unlike the Ninja and Cosori', 'One fewer preset than the Ninja at £15 more', 'No real-time temperature read-out during heating'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Bear Variable Temperature Electric Kettle, 1.7L, 6 Settings, Keep Warm',  // NOME (ENCURTADO)
                'price' => '£25.49',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 268,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51CNJniOQwL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Bear variable temperature electric kettle in black with digital display', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G1YDXY61?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest kettle here at £25.49, and one of only two that says what a cup is — on a listing that gives two different wattages in one sentence.', // TEXTO CURTO (CARD)
                'body' => "Twenty-five pounds forty-nine for six temperature presets from 45°C to 100°C, three brewing modes and an indefinite keep-warm is the best feature-per-pound on this page by a distance. The three modes are genuinely thought through: Instant Boil goes straight to 100°C, Custom Warmth holds your chosen temperature indefinitely rather than for a fixed 30 minutes, and Boil & Hold boils first and then cools to your target, which is the correct way to prepare water for delicate teas because boiling drives off dissolved gases that make green tea taste flat.

It is also one of only two listings on this page that defines its unit. \"Generously sized to serve 6-8 standard cups (250ml) per fill\" — and 1.7 litres divided by 250 millilitres is 6.8 cups, so the range brackets the truth. The boil claim is conservative too: 0.5 litres in two minutes at 2,200 watts, where the physics allows about 85 seconds. A cheap kettle underselling itself is not something we see often.

Then the same bullet contradicts itself. Its heading reads \"【2200W RAPID BOIL TECHNOLOGY】\" and the sentence underneath describes \"the powerful 1800W-2200W heating element\". A heating element has one power rating; publishing a headline figure and then a range that starts 400 watts lower means the 2200 is a best case. At 2,200 watts rather than 3,000 this is already the slower class of kettle, and if the true figure is 1,800 it is slower again. With 268 ratings at 4.2 stars it also has the second thinnest evidence here.", // TEXTO SEO LONGO
                'pros' => ['Cheapest kettle in this comparison at £25.49', 'One of only two listings that defines a cup as 250ml', 'Boil & Hold cools boiled water to target, correct for green tea', 'Keep-warm holds indefinitely rather than for a fixed 30 minutes', 'Its 2-minute half-litre claim is conservative against the physics'], // PONTOS POSITIVOS
                'contras' => ['Same bullet says 2200W in the heading and 1800W-2200W in the text', '2200W is slower than the five 3kW kettles on this page', '268 ratings, the second thinnest sample here', '4.2 stars, below the average of this comparison'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Haden Richmond Kettle 1.7L Variable Temperature, Brushed Stainless Steel', // NOME (ENCURTADO)
                'price' => '£33.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 794,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71SvhwbOJvL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Haden Richmond variable temperature kettle in brushed stainless steel', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B084ZP6W41?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best looking kettle here and the only one with a matching toaster and microwave — from a listing that publishes no wattage at all.', // TEXTO CURTO (CARD)
                'body' => "Haden sells a kitchen rather than a kettle, and that is a legitimate thing to want. The Richmond collection includes a matching toaster and microwave in the same brushed steel and glass, and if a coordinated worktop matters to you, nothing else on this page offers it. Seven hundred and ninety-four ratings at 4.3 stars means plenty of people have bought it and been happy. The 360 degree swivel base, light-up touch controls, fully removable lid and washable filter are all sensible, and four keep-warm temperatures at 70, 80, 90 and 100°C cover the drinks that matter.

What the listing never mentions is how much power it draws. There is no wattage figure anywhere in the bullets or the specification table, which in a category where the range runs from 1,200 to 3,000 watts is the single most useful omission — it is the number that decides whether you wait one minute or four. Given that most 1.7 litre glass-and-steel kettles at this price are 2,200 to 3,000 watts, it is probably fine, but the page will not tell you.

There is also a small piece of positioning worth reading carefully. The second bullet says \"BRITISH INSPIRED. Since 1958, Haden have been the pioneers of kettle design and engineering\" — while the specification table gives Country of Origin as China. The heritage is real and the design is done here; the word doing the work is \"inspired\". At £33.99 it is £8 dearer than the Bear and cheaper than everything above it, and you are buying the finish.", // TEXTO SEO LONGO
                'pros' => ['The best-looking kettle here, with a matching toaster and microwave', '794 ratings at 4.3 stars', 'Four keep-warm temperatures at 70, 80, 90 and 100°C', '360-degree swivel base with light-up touch controls', 'Fully removable lid and washable filter'], // PONTOS POSITIVOS
                'contras' => ['No wattage published anywhere, the number that decides boil time', 'Sells "BRITISH INSPIRED" heritage while the origin field says China', 'No cup count published either', 'No hold-warm duration stated for any of the four temperatures'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Russell Hobbs Digital Temperature Kettle, 3000W, 1.7L, Quiet Boil',       // NOME (ENCURTADO)
                'price' => '£39.99',                                                                // PRECO
                'rating' => 4.1,                                                                    // NOTA
                'reviews_count' => 184,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61oFp2RLNUL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Russell Hobbs brushed stainless steel digital temperature kettle',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B9HC8NTN?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Publishes the biggest cup on the page at 283ml, and claims to be 75% quieter than a kettle it also makes.', // TEXTO CURTO (CARD)
                'body' => "Three thousand watts, a 60 to 100°C digital range, a precision pour spout and a 360 degree base for £39.99 is a fair specification from a brand most British kitchens already own something from. The three-year guarantee, once you register, is the longest here bar none, and quiet operation is a genuine benefit in an open-plan kitchen where the kettle competes with conversation.

The cup arithmetic is the widest miss in this comparison. \"Can make up to six cups with its 1.7L jug\" works out at 283 millilitres per cup — the largest cup on this page, and 40 millilitres more than the Ninja pours from an identical 1.7 litre jug. Neither brand is wrong, because neither has agreed to anything: the same water is six cups here and seven there, and if you are choosing a kettle by how many drinks it makes, those two listings are describing the same object in units that differ by 16%.

The noise claim needs unpicking too. \"75 percent quieter than a standard kettle\" carries a parenthesis reading \"compared to a Russell Hobbs kettle without Quiet Boil Technology\" — so the benchmark is another Russell Hobbs. And percentages do not describe loudness anyway: sound is measured in decibels on a logarithmic scale, so \"75% quieter\" has no defined meaning, and no decibel figure appears anywhere on the page. At 4.1 stars from 184 ratings this also has the thinnest sample and the second-lowest average here.", // TEXTO SEO LONGO
                'pros' => ['3000W with a 60-100°C digital range for £39.99', 'Three-year guarantee on registration, the longest in this comparison', 'Genuinely quieter in use, which matters in an open-plan kitchen', 'Precision pour spout and 360-degree base', 'Familiar brand with easy UK service'], // PONTOS POSITIVOS
                'contras' => ['Calls 283ml a cup, the largest on this page from a standard 1.7L jug', 'The same jug is "six cups" here and "7 cups" for Ninja', '"75% quieter" is benchmarked against another Russell Hobbs kettle', 'Noise is measured in decibels and no dB figure is given anywhere', '184 ratings, the thinnest sample in this comparison'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Bosch Sky Variable Temperature Cordless Kettle, 1.7L, TWK7203GB',         // NOME (ENCURTADO)
                'price' => '£104.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 862,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/6103-4b-eGL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Bosch Sky variable temperature cordless kettle in black and silver',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0716G4TSQ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most expensive kettle here at £104.99, from the same brand as the £37.81 model at number one — and it publishes neither its wattage nor its cup count.', // TEXTO CURTO (CARD)
                'body' => "This is a lovely object and an awkward comparison. The double-walled stainless steel jug keeps water hot for far longer than a single wall while the outside stays cool enough to touch, which matters in a house with small children. Seven temperature settings from 70°C to boiling are selected by sliding a finger across the base station rather than pressing buttons, the keep-warm holds for 30 minutes, and the enclosed element and limescale filter make cleaning simple. Eight hundred and sixty-two ratings at 4.5 stars is a strong result.

The problem is what the page does not say, and who is not saying it. There is no wattage anywhere in the bullets or the specification table, and no cup count. Bosch's own MyMoment at number one, which costs £67.18 less, publishes 3,000 watts in three separate places and defines a cup as 250 millilitres in a footnote. The same company, on the same storefront, discloses more about its cheapest kettle than its most expensive one — and wattage on a double-walled kettle is exactly the figure a buyer needs, because the insulation that keeps water hot also slows the heat getting in.

At £104.99 it also has to be judged against the Ninja at £69.99, which has six presets against seven, a 30-minute hold against 30, 3,000 stated watts against an unstated figure, more than twice the ratings and a higher average, for £35 less. The Bosch answer is the double wall and the sliding touch base, both of which are genuinely nicer to live with. Whether that is worth £35 and an undisclosed wattage is the whole decision. The Item Type Name field, incidentally, contains \"Bosch Sky Kettle Black/Silver\".", // TEXTO SEO LONGO
                'pros' => ['Double-walled: water stays hot longer and the outside stays cool', 'Seven temperature settings from 70°C selected by sliding touch', '4.5 stars from 862 ratings', '30-minute keep-warm and an enclosed element for easy cleaning', 'Safest kettle here for a house with small children'], // PONTOS POSITIVOS
                'contras' => ['No wattage published, while Bosch\'s £37.81 model states 3000W three times', 'No cup count published either', '£104.99 against £69.99 for a Ninja with more ratings and a higher score', 'Item Type Name field contains the full commercial product name'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Olvy 1.7L Electric Kettle with Temperature Control, 2200W, Double Wall',  // NOME (ENCURTADO)
                'price' => '£32.99',                                                                // PRECO
                'rating' => 4.0,                                                                    // NOTA
                'reviews_count' => 416,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71OJ9rInL3L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Olvy double wall electric kettle with temperature control in white',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FSF7VWLX?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A two-hour keep-warm and a double wall for £32.99, on the only listing here whose specification table has the review widget pasted into it.', // TEXTO CURTO (CARD)
                'body' => "The two-hour keep-warm is genuinely the longest fixed hold in this comparison outside the RHD's adjustable timer, and four times what the Ninja and the Bosch Sky offer. Combined with a double-walled stainless steel body that both retains heat and stays cool to touch, this is well specified for £32.99: five presets at 40, 70, 80, 90 and 100°C, auto shut-off, boil-dry protection, an anti-scale filter and a 360 degree base. Four hundred and sixteen ratings is a reasonable sample.

Two things put it last. The first is the rating: 4.0 stars is the lowest average on this page, and in a category where seven of ten sit at 4.3 or above, a full third of a star is a real signal rather than noise. The second is that 2,200 watts puts it in the slower class alongside the Bear, and it costs £7.50 more than the Bear for one fewer preset.

The listing also contains the single strangest field we collected across this category. Inside the product specification table, between the model number and the wattage, sits a row reading \"Customer Reviews 4.0 4.0 out of 5 stars (416) 4.0 out of 5 stars\" — the review widget has leaked into the technical specification, star rating repeated three times, inside the table a buyer reads to compare products. And Olvy sells the same kettle twice: ASIN B0FSF7N5NG carries the same 1.7 litre, 2200W specification at £34.99 with its own separate pool of 347 ratings. We have linked the cheaper listing with the deeper pool, but the two together mean neither page shows you what buyers really think of this kettle.", // TEXTO SEO LONGO
                'pros' => ['Two-hour keep-warm, four times the Ninja and Bosch Sky', 'Double-walled stainless steel that stays cool to touch', 'Five presets from 40°C for £32.99', 'Auto shut-off, boil-dry protection and anti-scale filter', '416 ratings is a reasonable sample for the price'], // PONTOS POSITIVOS
                'contras' => ['4.0 stars, the lowest average in this comparison', 'Spec table contains a pasted review widget as a technical row', 'Sold under a second ASIN at £34.99 with a separate 347-rating pool', '2200W puts it in the slower class, and it costs more than the Bear'], // PONTOS NEGATIVOS
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
        $this->command?->info("TemperatureControlKettlesSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
