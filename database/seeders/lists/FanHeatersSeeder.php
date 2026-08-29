<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class FanHeatersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE AQUECEDORES A VENTILACAO DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCAS: /s?k=ceramic+fan+heater&rh=p_36%3A3000-  (14 ASINS)
        //         /s?k=fan+heater+2000w+electric&rh=p_36%3A2500-  (18 ASINS)
        // A SEGUNDA BUSCA FOI NECESSARIA PORQUE A DREO OCUPA 9 DOS 14 RESULTADOS DA
        // PRIMEIRA — A CATEGORIA E QUASE UMA MARCA SO NO AMAZON UK.
        // CATEGORIA HOME. SAZONAL: PICO ABSOLUTO DE OUTUBRO A JANEIRO.
        //
        // ─── ACHADO PRINCIPAL: WATT POR METRO QUADRADO ───
        // 1. AQUECIMENTO RESISTIVO NAO TEM MISTERIO: A POTENCIA ELETRICA VIRA CALOR NA
        //    RAZAO DE 1 PARA 1. UM APARELHO DE 2.000 W ENTREGA UM TERCO MAIS CALOR QUE UM
        //    DE 1.500 W, SEMPRE, INDEPENDENTE DE PTC, "Hyperamics", "heat funnel" OU
        //    "turbocharging". A REGRA BRITANICA DE DIMENSIONAMENTO E ~100 W POR m2 PARA
        //    COMODO MAL ISOLADO. A TABELA DO QUE OS ANUNCIOS DECLARAM:
        //      RUSSELL HOBBS .. 1.500 W / 15 m2 ......... 100 W/m2  ← REGRA EXATA
        //      PHILIPS ........ 2.000 W / 20 m2 ......... 100 W/m2  ← REGRA EXATA
        //      QEXREED ........ 2.000 W / 20 m2 ......... 100 W/m2  ← REGRA EXATA
        //      DREO 25" ....... NAO PUBLICA W / 9-25 m2 . EXIGIRIA 2.500 W
        //      DREO 30" ....... NAO PUBLICA W / 300 ft2 . EXIGIRIA 2.790 W
        //      PRO BREEZE ..... 2.000/1.300/900 W / SEM AREA
        //      YASHE .......... 1.800/900 W / SEM AREA
        //      DREO ATOM 316 .. 1.500 W / SEM AREA
        //    AS TRES MARCAS QUE PUBLICAM OS DOIS NUMEROS CAEM EXATAMENTE EM 100 W/m2. AS
        //    DUAS DREO QUE PUBLICAM AREA GRANDE NAO PUBLICAM POTENCIA NENHUMA — E AS
        //    AREAS QUE ELAS ANUNCIAM PRECISARIAM DE 2.500 E 2.790 W PARA VALER.
        // 2. ONDE A DREO PUBLICA POTENCIA, E 1.500 W. ESSE E O TETO DE UM CIRCUITO
        //    AMERICANO DE 15 A A 120 V, NAO DE UMA TOMADA BRITANICA DE 13 A A 240 V, QUE
        //    ENTREGA 3.120 W. ENTAO O TOPO DE LINHA DA DREO A £118.99 PROVAVELMENTE
        //    ENTREGA 25% MENOS CALOR QUE A PRO BREEZE DE £29.95, QUE E 2.000 W.
        //
        // ─── ACHADO SECUNDARIO: OS DECIBEIS DA DREO, DE NOVO ───
        // 3. A ORIENTACAO DA OMS PARA RUIDO NOTURNO DENTRO DE CASA E 30 dB, E UM QUARTO
        //    SILENCIOSO MEDE PERTO DISSO. A ESCADA DA PROPRIA DREO, TODA COM O MESMO
        //    "innovative airflow design":
        //      DREO OSCILANTE (£46.69) .... 40 dB
        //      DREO ATOM 316 (£49.99) ..... 34 dB
        //      DREO 25" (£109.99) ......... 25 dB
        //      DREO 30" (£118.99) ......... 25 dB
        //    OS DOIS MAIS CAROS AFIRMAM RODAR 5 dB ABAIXO DO SILENCIO DO COMODO ONDE
        //    ESTAO. E DENTRO DA MESMA MARCA, COM A MESMA TECNOLOGIA DECLARADA, O NUMERO
        //    CAI CONFORME O PRECO SOBE. A QEXREED DECLARA 37,5 dB — COM CASA DECIMAL, QUE
        //    E O QUE UMA MEDICAO REAL PRODUZ.
        //
        // ─── OUTROS ACHADOS ───
        // 4. A QEXREED VENDE O MESMO APARELHO EM DOIS ASINS COM A AREA EM UNIDADES
        //    DIFERENTES: B0DPKLLLV6 (£49.99, 1.887 AVALIACOES) DIZ "rooms around 20m2" E
        //    B0DPKJBNQD (£53.99, 933) DIZ "rooms of about 215ft2". 215 ft2 SAO 20,0 m2. O
        //    MESMO PRODUTO, A MESMA POTENCIA, OS MESMOS 37,5 dB, £4 DE DIFERENCA E DOIS
        //    POOLS DE AVALIACAO SEPARADOS.
        // 5. "ATE 50% DE ECONOMIA" APARECE EM DUAS MARCAS DIFERENTES: A PHILIPS ("the
        //    world's first electric heating range that uses AI... energy savings up to
        //    50%") E A DREO 30" ("up to 50% energy savings"). NUM APARELHO RESISTIVO NAO
        //    HA 50% PARA ECONOMIZAR — TODO WATT VIRA CALOR. A ECONOMIA VEM DO TERMOSTATO
        //    DESLIGAR, OU SEJA DE AQUECER MENOS, QUE E DIFERENTE DE AQUECER MELHOR.
        //    A QEXREED FAZ A MESMA COISA COM "improving heating efficiency by 30%".
        // 6. A PRO BREEZE E A UNICA QUE PUBLICA OS TRES DEGRAUS DE POTENCIA: 2.000 W
        //    (ALTO), 1.300 W (MEDIO) E 900 W (BAIXO). TODAS AS OUTRAS DIZEM "3 modos" SEM
        //    DIZER QUANTO WATT E CADA UM — E O MODO BAIXO E O QUE VOCE VAI USAR.
        // 7. A RUSSELL HOBBS TEM A FICHA MAIS COMPLETA DA LISTA E CUSTA £28.48: POTENCIA
        //    MAXIMA EM kW, AREA EM m2, FAIXA DE TEMPERATURA, DIMENSOES (26 x 17 x 13 cm),
        //    PESO (1,5 kg) E GARANTIA. E VENDIDA TAMBEM COMO B0DJ13X8TZ A £33.99 COM AS
        //    MESMAS 519 AVALIACOES — £5,51 DE DIFERENCA NO MESMO POOL.
        // 8. A TABELA DA DREO ATOM 316 — 10.260 AVALIACOES, A MAIS AVALIADA DA CATEGORIA —
        //    DECLARA "Form factor: pee". O CAMPO ESTA ASSIM NO ANUNCIO.
        // 9. A YASHE DECLARA "Bladeless" NO CAMPO DE CARACTERISTICAS DE UM AQUECEDOR COM
        //    VENTILADOR OSCILANTE DE 75 GRAUS. ELE TEM PA.
        // 10. A DREO ATOM 316 PROMETE "up to 200% farther reach than traditional heaters",
        //    SEM DIZER QUAL AQUECEDOR TRADICIONAL NEM COMO SE MEDE ALCANCE. A DREO 25"
        //    PROMETE "11.5 ft/s fast heat" — VELOCIDADE DE AR EM PES POR SEGUNDO NUMA
        //    LOJA BRITANICA.
        // 11. A PRO BREEZE PREENCHE O CAMPO "Colour" COM "White 2.0kw - Mini - Direct Heat
        //    + Lightweight". E ESPECIFICACAO DENTRO DO CAMPO DE COR.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: OS RADIADORES A OLEO QUE POLUEM A BUSCA (VONHAUS 5.3K, PRO BREEZE
        // OMNIWARM, PRO BREEZE 11 FINS) — SAO OUTRA CATEGORIA E JA TEMOS ARTIGO DELA;
        // O ASIN IRMAO DA RUSSELL HOBBS (MANTIDO O MAIS BARATO); DIMPLEX (40 AVALIACOES),
        // PELONIS (73), MBSM (20) E AS LISTAGENS SEM MARCA COM MENOS DE 500.
        // DREO APARECE QUATRO VEZES E QEXREED DUAS DE PROPOSITO: A DREO PORQUE OCUPA 9
        // DOS 14 RESULTADOS DA BUSCA PRINCIPAL, E A QEXREED PORQUE OS DOIS ANUNCIOS DELA
        // SAO O MESMO PRODUTO EM UNIDADES DIFERENTES, QUE E UM DOS ACHADOS.
        // DENTRO: NOTA DE 4.3 A 4.6, PRECO DE £28.48 A £118.99, SEIS MARCAS.
        //
        // FOCUS KEYWORD: best fan heater
        // VARIACOES TRABALHADAS: fan heater uk / ceramic fan heater /
        // electric space heater / 2000w fan heater / ptc heater /
        // portable heater for bedroom / low energy heater / quiet fan heater /
        // heater for large room / watts per square metre / oscillating heater
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "home", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-fan-heater',                                           // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Fan Heater 2026: 10 Ranked on Watts Per Square Metre', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Fan Heater 2026: Top 10 Ranked and Compared',     // TITLE DA ABA/GOOGLE (48 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best fan heater options on Amazon by watts against the room size they claim, comparing 1500W to 2000W models from £28.48 to £118.99.', // META DESCRIPTION (152 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best fan heater',                                  // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "There is no clever engineering in an electric heater. Every watt of electricity becomes a watt of heat, so a 2,000 watt machine puts out a third more warmth than a 1,500 watt one, and no amount of PTC ceramic, heat funnels or turbocharging changes that. What the clever engineering does change is where the heat goes and how quietly it gets there — which is worth paying for, but only after you have checked the watts. The British sizing rule is roughly 100 watts per square metre for an average room, and three brands here publish figures that land on it exactly: Russell Hobbs quotes 1.5kW for 15m2, Philips 2,000W for 20m2, QEXREED 2,000W for 20m2. Then there is Dreo, which owns nine of the fourteen results in the main search on Amazon UK. Its two most expensive heaters, at £109.99 and £118.99, advertise coverage of 25m2 and 300 square feet and publish no wattage at all — areas that would need 2,500 and 2,790 watts to meet the same standard. Where Dreo does state a figure it is 1,500 watts, which is the ceiling of an American 15 amp circuit rather than a British 13 amp one. Below we rank the best fan heater options on Amazon in August 2026 on the arithmetic.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "The best fan heater for a given room is decided before you read a single feature. Measure the space, multiply by 100 watts per square metre, and buy at least that many watts — 15m2 needs 1.5kW, 20m2 needs 2kW, and no thermostat, ECO mode or ceramic element will conjure heat that the plug is not supplying. If a listing gives you a room size and no wattage, treat the room size as decoration; if it gives you both and they divide to much less than 100, the maker is quoting a well-insulated new-build rather than a Victorian terrace. Meanwhile the features that genuinely matter once the watts are right are a real thermostat with a stated range, oscillation if the room is wider than it is deep, and a published low setting so you know what the machine draws when it is ticking over — only one brand here prints all three of its power steps. By contrast, be wary of any claim of energy savings from a resistive heater: two separate brands on this page promise up to 50%, and since every watt already becomes heat, the only saving available is heating less, which your thermostat was doing anyway.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                         // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 09:30:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Pro Breeze 2000W Mini Ceramic Fan Heater, 3 Heat Settings, Thermostat',   // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£29.95',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 2699,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71kwMLNdqvL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best fan heater',                                                    // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B089M8R6ZJ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best fan heater here on the only number that makes heat: 2,000W for £29.95, and the only listing that publishes all three of its power steps rather than just the top one.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Two thousand watts is the most heat any of these machines can produce, and this is the cheapest way to buy it by £4.04. That single fact outranks everything else on this page, because a heater is a resistor: the 2,000 watts going in come out as 2,000 watts of warmth, and the £118.99 tower at the bottom of this list does not publish a figure that beats it. At 2,699 ratings and 4.4 stars the record is solid.

What lifts it above the other 2,000 watt machines is the second bullet. Pro Breeze publishes all three power settings — 2,000W high, 1,300W medium, 900W low — and nobody else here does. Every rival advertises three modes and tells you what only the highest one draws, which is backwards, because the low setting is the one that runs for six hours while you work. Knowing it is 900 watts rather than a mystery lets you actually estimate a running cost. There is an adjustable thermostat that cuts the element when the room reaches temperature, a fan-only mode for summer, overheat and tip-over protection.

The compromises are what £29.95 buys. There is no oscillation, so it heats a cone in front of it rather than a room, no remote, no timer and no digital display — you set a dial. It is a desk and small-room heater rather than a living-room one. The listing also puts specification into the wrong field, giving the colour as \"White 2.0kw - Mini - Direct Heat + Lightweight\", and the first bullet claims ceramic heats more efficiently than an oil radiator, which is not true of any resistive element: both are 100% efficient, the ceramic one simply gets there faster.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['2,000W for £29.95, the cheapest full-power heater in this comparison', 'The only listing that publishes all three power steps: 2000W, 1300W, 900W', 'Adjustable thermostat with a fan-only mode for summer', '2,699 ratings at 4.4 stars', 'Overheat and tip-over protection at the entry price'], // PONTOS POSITIVOS
                'contras' => ['No oscillation, so it heats a cone rather than a room', 'No remote, no timer and no digital display', 'Claims ceramic is more efficient than an oil radiator, which it is not', 'Colour field on the listing contains specification text'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Russell Hobbs RHCH2002G Oscillating Ceramic Heater, 1.5kW, 15m2',         // NOME (ENCURTADO)
                'price' => '£28.48',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 519,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71O2PerezrL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Russell Hobbs oscillating ceramic fan heater in black and gold',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DHXY9TK6?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing in the comparison where the wattage and the room size are both published and divide to exactly the 100 watts per square metre a British room needs.', // TEXTO CURTO (CARD)
                'body' => "One and a half kilowatts, for rooms up to 15 square metres. Those two figures are in the first and fifth bullets of the same listing and they divide to exactly 100 watts per square metre, which is the rule of thumb for heating an averagely insulated British room. No other brand here does the buyer that courtesy at this price, and two of the machines below advertise areas without ever stating the power that would have to fill them.

The rest of the specification is the fullest in the comparison and it costs £28.48. Temperature adjustable from 5 to 36°C, four modes with a genuine ECO setting, oscillation, a 24-hour auto-on and auto-off timer, touch controls and a remote, tip-over and overheat protection, dimensions given as 26 x 17 x 13cm and weight as 1.5kg, and a two-year guarantee on registration. Publishing dimensions and weight on a portable heater matters more than it sounds: it tells you whether it will sit on a desk or has to go on the floor.

Two things keep it second. Five hundred and nineteen ratings is a modest sample next to the thousands behind the machines above and below it, so 4.4 stars is less settled. And 1,500 watts is 1,500 watts: at 15 square metres this is a bedroom and home-office heater, and if your living room is 20 or 25 square metres you need the 2,000 watt Pro Breeze or QEXREED instead, whatever the oscillation does. It is also sold under a second ASIN at £33.99 with the same 519 ratings, so check both before ordering.", // TEXTO SEO LONGO
                'pros' => ['Publishes 1.5kW and 15m2 together, dividing to exactly 100 watts per m2', 'Fullest specification here: power, area, temperature range, dimensions, weight', '£28.48, the cheapest heater in this comparison', 'Oscillation, remote, touch controls and a 24-hour timer', 'Two-year guarantee on registration'], // PONTOS POSITIVOS
                'contras' => ['1,500W limits it to about 15m2, so not a living room heater', '519 ratings is a modest sample beside its rivals here', 'Sold under a second ASIN at £33.99 with the same review pool', 'Low and ECO settings not given a wattage'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Dreo Atom 316 Ceramic Fan Heater, 1500W PTC, Remote, 12H Timer',          // NOME (ENCURTADO)
                'price' => '£49.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 10260,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81QSN7iGGQL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Dreo Atom 316 ceramic fan heater in gold',                           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C9D4KL9D?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most reviewed heater in the category by a wide margin, 10,260 ratings at 4.6, and one of the two Dreo models here honest enough to print its 1,500 watts.', // TEXTO CURTO (CARD)
                'body' => "Ten thousand two hundred and sixty ratings at 4.6 stars is the deepest and highest-rated combination in this comparison, and it is not close — the next best sample is 7,628 at 4.5. Dreo has built the Atom 316 into the default answer on Amazon UK and the reception says the machine deserves a lot of that. It publishes 1,500 watts, which two of the four Dreo models here do not, and the thermostat is the best specified on the page: 5 to 35°C in 1°C steps driven by an NTC chipset, rather than the coarse dial most rivals use.

The safety and convenience list is genuinely long. Tilt-detection rather than a simple tip switch, V0 flame-retardant housing, overheat protection, a reinforced plug, child lock, mute, memory, a 12-hour timer, three modes and a remote. Noise is quoted at 34dB, which is a figure a real fan could produce and is by some distance the most credible number in Dreo's own range.

Two caveats. Fifteen hundred watts is 25% less heat than the £29.95 Pro Breeze, and Dreo publishes no room size for this model at all, so you are buying warmth without either half of the sizing calculation being offered. And the second bullet promises \"up to 200% farther reach than traditional heaters\" without naming a traditional heater or defining reach. On a lighter note, the specification table gives the form factor as \"pee\" — on the listing with more ratings than any other in the category.", // TEXTO SEO LONGO
                'pros' => ['10,260 ratings at 4.6, the deepest and best-rated record in this comparison', 'Publishes its 1,500W rating, unlike Dreo flagship models', 'Thermostat adjustable 5 to 35°C in 1°C steps via an NTC chipset', '34dB is the most credible noise figure in the Dreo range', 'Tilt detection, child lock, mute, memory and a 12-hour timer'], // PONTOS POSITIVOS
                'contras' => ['1,500W is 25% less heat than a heater here costing £20 less', 'No room size published, so neither half of the sizing sum is offered', 'Claims 200% farther reach with no baseline and no definition', 'Specification table gives the form factor as pee'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'QEXREED 2000W PTC Fan Heater, 90 Degree Oscillation, 20m2, 37.5dB',       // NOME (ENCURTADO)
                'price' => '£49.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 1887,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71plnXdnvQL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'QEXREED 2000W PTC electric fan heater in black',                     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DPKLLLV6?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Two thousand watts for 20 square metres is the sizing rule done correctly, and 37.5dB is one of only two noise claims here quoted to a decimal place.', // TEXTO CURTO (CARD)
                'body' => "Two thousand watts, effective in rooms around 20 square metres. That is 100 watts per square metre, the same ratio Russell Hobbs and Philips arrive at, and it is the mark of a manufacturer who worked out the answer rather than picking an impressive-sounding area. For £49.99 you also get 90 degree oscillation, a genuine thermostat holding 15 to 35°C in ECO mode, four modes including natural wind, a 1 to 24 hour timer, remote control, adjustable screen brightness and V0 fireproof housing. One thousand eight hundred and eighty-seven ratings at 4.4 stars.

The noise figure deserves credit too. Thirty-seven point five decibels is specific, has a decimal, and sits above the 30dB of a quiet bedroom rather than implausibly below it — which is more than can be said for the two Dreo towers further down this page claiming 25.

Two things to mark. The first bullet claims the PTC element and turbocharging improve \"heating efficiency by 30%\", and a resistive heater is already converting all of its electricity into heat, so there is no 30% to find; what the design can genuinely do is move that heat around the room faster, which is a real benefit described with the wrong word. And this exact heater is sold under a second QEXREED listing at £53.99 with its own separate pool of 933 ratings, where the same 20 square metres is written as 215 square feet. Same machine, same watts, same decibels, two units and two review pools.", // TEXTO SEO LONGO
                'pros' => ['2,000W for 20m2, exactly the 100 watts per square metre sizing rule', '37.5dB quoted to a decimal, a credible measured figure', '90 degree oscillation with a 15 to 35°C thermostat in ECO mode', '1 to 24 hour timer, remote and adjustable screen brightness', '1,887 ratings at 4.4 stars for £49.99'], // PONTOS POSITIVOS
                'contras' => ['Claims 30% better heating efficiency from an already 100% efficient element', 'Same heater sold under a second ASIN at £53.99 with its own review pool', 'Low and ECO settings not given a wattage', 'Unbranded product name with no model number in the title'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Philips Tower Electric Heater 5000 Series, 2000W, 20m2, App Control',     // NOME (ENCURTADO)
                'price' => '£88.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 459,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61YIgyNEkFL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Philips Tower Electric Heater 5000 Series in black and dark grey',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CCPNS29G?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only heater here with app scheduling, sized correctly at 2000W for 20m2, and the source of the least defensible claim on the page: 50% energy savings from AI.', // TEXTO CURTO (CARD)
                'body' => "Philips gets the sizing right — 2,000 watts, rooms up to 20 square metres, the same 100 watts per square metre as the two machines above it — and adds the one feature nobody else in this comparison offers: proper app control through Philips Air+, so the heater can be scheduled, monitored and switched on from outside the house. For a home office you leave cold overnight and want warm at eight, that is worth something real. There is 60 degree oscillation, a temperature display, four heat modes, five safety features including a VDE-certified plug, and two-second heat-up.

Then there is the third bullet: the world's first electric heating range that uses AI, delivering energy savings up to 50%, with a footnote. A fan heater turns every watt it draws into heat; there is no conversion loss to recover and therefore no efficiency to improve. Any saving comes from running the element for less time, which is what a thermostat has done since the 1930s. Dreo makes precisely the same 50% claim on its £118.99 tower further down this page, which suggests a marketing convention rather than a measurement.

At £88.99 with 459 ratings the value case is also hard. The QEXREED above it is the same 2,000 watts over the same 20 square metres with four times the review sample for £39 less, and the £29.95 Pro Breeze produces identical heat. You are paying for the app, the brand and the tower form factor, and 4.3 stars is the joint lowest average in this comparison.", // TEXTO SEO LONGO
                'pros' => ['2,000W for 20m2, correctly sized at 100 watts per square metre', 'Genuine app scheduling and remote monitoring via Philips Air+', '60 degree oscillation with a temperature display and four modes', 'VDE-certified safety plug among five listed safety features', 'Two-second heat-up'], // PONTOS POSITIVOS
                'contras' => ['Claims up to 50% energy savings from a 100% efficient resistive element', '£88.99 against £49.99 for the same watts and area at number four', '459 ratings, one of the thinner samples here', '4.3 stars is the joint lowest average in this comparison'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Dreo Oscillating Ceramic Space Heater, 1500W PTC, 70 Degree, 40dB',       // NOME (ENCURTADO)
                'price' => '£46.69',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 5341,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81I77QvfnHL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Dreo oscillating ceramic space heater in silver',                    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09W9DTMDL?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most honest noise claim in the Dreo range at 40dB, plus the only washable filter in this comparison, on a 1,500W machine with 5,341 ratings.', // TEXTO CURTO (CARD)
                'body' => "Five thousand three hundred and forty-one ratings at 4.5 stars makes this the third deepest sample here, and it is the Dreo whose listing reads most like a description of a physical object. The noise figure is 40dB. That is above the 30dB of a quiet room, it is what a small fan moving air actually sounds like, and it is 15dB higher than the two Dreo towers at the bottom of this page claim while using the same technology. In a category where implausible quiet is the default claim, printing 40 is the honest thing to do.

It is 1,500 watts of PTC ceramic in a 26.2cm body, with 70 degree oscillation on a trackball system, a 3 to 35°C electronic thermostat, an LED display, four modes including ECO and fan-only, and a 1 to 12 hour timer. The feature nobody else here offers is a removable washable filter — heaters pull dust through themselves all winter and then bake it, which is where the burnt smell comes from, and being able to rinse the filter is a genuinely useful thing.

The reservations are the same two that apply across the range. Fifteen hundred watts is a bedroom rating, 25% below the 2,000 watt machines above it, and no room size is published anywhere so you cannot check what Dreo thinks it will heat. And at £46.69 it costs £16.74 more than a 2,000 watt Pro Breeze while producing less heat — you are buying oscillation, the thermostat, the remote and the filter, all of which are real, with warmth as the thing you give up.", // TEXTO SEO LONGO
                'pros' => ['40dB is the most credible noise claim of any Dreo model in this comparison', 'Removable washable filter, the only one on this page', '5,341 ratings at 4.5, the third deepest sample here', '70 degree oscillation with a 3 to 35°C electronic thermostat', 'Compact 26.2cm body with a hidden carry handle'], // PONTOS POSITIVOS
                'contras' => ['1,500W, a quarter less heat than the £29.95 machine at number one', 'No room size published anywhere on the listing', '£46.69 for less heat than heaters costing £17 less', 'Low and ECO modes not given a wattage'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'YASHE 1800W Ceramic Fan Heater, 75 Degree Oscillation, 24H Timer',        // NOME (ENCURTADO)
                'price' => '£33.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 709,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71wtpPW+jqL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'YASHE 1800W ceramic tower fan heater in black',                      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D963J5FJ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Publishes both of its power levels — 1800W high and 900W low — which only one other listing here does, on a tower with 75 degree oscillation for £33.99.', // TEXTO CURTO (CARD)
                'body' => "Eighteen hundred watts sits between the 1,500 watt bedroom heaters and the 2,000 watt room heaters, and at £33.99 that is a sensible place to be — enough for around 18 square metres on the standard sizing rule, in a tower with 75 degree oscillation, the widest sweep in this comparison. YASHE also publishes its low setting at 900 watts, which apart from Pro Breeze nobody else on this page bothers to do, and the ECO mode switches between the two automatically against a 10 to 35°C thermostat.

The rest is well equipped for the money: a 24-hour timer, digital touch controls, a remote, fan-only mode, overheat and tip-over cutouts. Seven hundred and nine ratings at 4.3 stars is a reasonable if unremarkable record.

Two things to note before buying. The specification table lists the special features as including \"Bladeless\", on a heater whose second bullet describes a 75 degree swinging fan; it has a blade, and bladeless is a specific design this is not. And no room size is published, so the 1,800 watts is the only guide you have — which, to be fair, is the number that matters, and more than the two Dreo towers below it offer. At 4.3 stars this is the joint lowest average here, and the brand has no track record in the UK beyond this listing, so the two-year expectation you would have of Russell Hobbs or Philips does not apply.", // TEXTO SEO LONGO
                'pros' => ['Publishes both power levels: 1,800W high and 900W low', '75 degree oscillation, the widest sweep in this comparison', '1,800W for £33.99, more heat per pound than anything above it bar Pro Breeze', '24-hour timer, remote, digital touch controls and a 10 to 35°C thermostat', 'ECO mode switches between the two published power levels'], // PONTOS POSITIVOS
                'contras' => ['Specification lists Bladeless on a heater with an oscillating fan', 'No room size published anywhere', '4.3 stars is the joint lowest average in this comparison', 'No UK track record behind the brand beyond this listing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Dreo 25 Inch Oscillating Tower Heater, 25dB, 9-25m2, Remote',             // NOME (ENCURTADO)
                'price' => '£109.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 7628,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/616vluUPEzL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Dreo 25 inch oscillating tower fan heater in silver',                // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B096ZZS5HL?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Advertises 25 square metres of coverage and 25 decibels of noise, and publishes no wattage — the two claims would need 2,500W and a room quieter than silence.', // TEXTO CURTO (CARD)
                'body' => "Seven thousand six hundred and twenty-eight ratings at 4.5 stars is the second deepest sample in this comparison, so this tower clearly satisfies most people who buy it. It is a proper piece of hardware: a 25 inch column with 70 degree oscillation, four heat modes, a dedicated thermal sensor holding 5 to 35°C to 1°C, V0 flame retardant construction, 45 degree tip-over protection, reinforced plug and child lock.

The two headline numbers are the problem, and they are the two on the front of the box. Coverage is given as 9 to 25 square metres. At the standard 100 watts per square metre, 25 square metres needs 2,500 watts — more than the 2,000 watt maximum of anything here and beyond what Dreo states anywhere on the page, because no wattage appears in the title, the bullets or the specification table. Dreo publishes 1,500 watts on its cheaper models; if this is the same, the honest coverage is around 15 square metres, not 25.

The second is the noise. Twenty-five decibels is below the 30dB the World Health Organization uses as a night-time guideline for a bedroom, which means the heater claims to be quieter than the silence of the room it stands in. The same brand quotes 40dB for the oscillating model at number six and 34dB for the Atom at number three, using the same described airflow technology; the number falls as the price rises. The listing also quotes airflow as \"11.5 ft/s\", in feet per second, on a British store.", // TEXTO SEO LONGO
                'pros' => ['7,628 ratings at 4.5, the second deepest sample in this comparison', 'Dedicated thermal sensor holding 5 to 35°C to 1°C precision', '70 degree oscillation on a 25 inch column, good for wide rooms', 'V0 flame retardant build with 45 degree tip-over protection and child lock', 'Four heat modes plus a summer fan mode'], // PONTOS POSITIVOS
                'contras' => ['No wattage published in the title, bullets or specification table', '25m2 coverage would need 2,500W, more than any machine here provides', '25dB claim is below the noise floor of a quiet bedroom', 'Airflow quoted in feet per second on a UK listing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'QEXREED 2000W PTC Tower Heater, 215 Square Feet, ECO Mode, Remote',       // NOME (ENCURTADO)
                'price' => '£53.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 933,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71VbjvgIObL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'QEXREED 2000W PTC tower heater in black with remote',                // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DPKJBNQD?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The same heater as number four, from the same brand, at £4 more, with the identical coverage written as 215 square feet instead of 20 square metres.', // TEXTO CURTO (CARD)
                'body' => "Read this listing beside the QEXREED at number four and the two are the same machine. Two thousand watts of PTC. Ninety degree oscillation. Thirty-seven point five decibels. ECO mode holding 15 to 35°C. A 1 to 24 hour timer, remote control, hidden handle, V0 flame-retardant body, CE certification, 24-hour auto power-off. Even the marketing language matches, both promising heating efficiency improved by 30% and coverage expanded by 30%.

One thing differs, and it is the unit. Number four says the heater is effective in rooms around 20m2. This one says it warms rooms of about 215ft2. Two hundred and fifteen square feet is 20.0 square metres. Same area, same appliance, expressed in imperial on a British store where nobody measures a bedroom in square feet — and, incidentally, the larger-sounding number.

The consequence for a buyer is the review pool. This ASIN carries 933 ratings at 4.5 stars; the other carries 1,887 at 4.4. Between them they represent 2,820 people describing the same heater, split across two listings so that neither shows the full picture, and priced £4.00 apart. On the specification alone this is a good heater and 2,000 watts over 20 square metres is correctly sized. It sits at nine because there is no reason to pay £53.99 for it when the identical unit is £49.99 one entry up, with twice the evidence attached.", // TEXTO SEO LONGO
                'pros' => ['2,000W over 20 square metres, correctly sized at 100 watts per m2', '37.5dB quoted to a decimal place, a credible measured figure', '90 degree oscillation, ECO thermostat and a 1 to 24 hour timer', 'CE certified with V0 flame-retardant construction', '4.5 stars across 933 ratings'], // PONTOS POSITIVOS
                'contras' => ['Identical to the £49.99 QEXREED at number four, for £4.00 more', 'Coverage written as 215 square feet on a UK listing', 'Splits 2,820 reviews of one heater across two listings', 'Repeats the 30% efficiency claim on a 100% efficient element'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Dreo 30 Inch Tower Heater, 120 Degree Oscillation, 25dB, 300 Sq Ft',      // NOME (ENCURTADO)
                'price' => '£118.99',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 1508,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71rnvy-3exL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Dreo 30 inch tower space heater in silver',                          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D9Q2PL86?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most expensive heater here at £118.99, advertising 300 square feet and 25 decibels and 50% energy savings, and publishing no wattage to support any of them.', // TEXTO CURTO (CARD)
                'body' => "The hardware is the most substantial in the comparison. A 30 inch column with a 308mm PTC element, oscillation adjustable across 30, 60, 90 and 120 degrees — the widest sweep on this page by 45 degrees — nine comfort levels split into five heat and three fan, a 1 to 12 hour timer, and eight listed safety protections including cool-touch housing, thermal insulated wiring and CE certification. One thousand five hundred and eight ratings at 4.4 stars.

Three claims sit on top of it and none can be checked. Coverage is given as 300 square feet, which is 27.9 square metres and would need around 2,790 watts on the standard sizing rule; no wattage appears anywhere on the listing. Noise is given as 25 decibels, five below the World Health Organization night-time guideline for a bedroom, from a machine with a 308mm element and a fan pushing air across a 120 degree arc. And the fourth bullet promises \"up to 50% energy savings\" from controllable silicon technology, on an appliance that already converts 100% of its electricity into heat — the same claim Philips makes at number five, from a different technology, to the same precise figure.

At £118.99 this is four times the price of the £29.95 Pro Breeze at number one, which publishes 2,000 watts and therefore produces demonstrably more heat. What the extra £89.04 buys is the tower shape, the 120 degree sweep, the nine levels and the remote — all real, all worth something in a wide living room, and none of them warmth. If you want this form factor, buy it knowing that is the trade.", // TEXTO SEO LONGO
                'pros' => ['120 degree oscillation, the widest sweep in this comparison', '308mm PTC element in the most substantial build on this page', 'Nine comfort levels across five heat and three fan settings', 'Eight safety protections including cool-touch housing and CE certification', '1,508 ratings at 4.4 stars'], // PONTOS POSITIVOS
                'contras' => ['No wattage published, on the most expensive heater in this comparison', '300 square feet of coverage would need around 2,790W', '25dB claim is below the noise floor of a quiet bedroom', 'Promises up to 50% energy savings from a 100% efficient element'], // PONTOS NEGATIVOS
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
        $this->command?->info("FanHeatersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
