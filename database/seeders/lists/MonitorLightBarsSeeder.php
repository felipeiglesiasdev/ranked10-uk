<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class MonitorLightBarsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE BARRAS DE LUZ DE MONITOR DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 30/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=monitor+light+bar&rh=p_36%3A2000-  (22 ASINS ANALISADOS)
        // CATEGORIA HOME & OFFICE. SAZONAL: PICO EM SETEMBRO (VOLTA AO ESCRITORIO E A
        // UNIVERSIDADE) E DE NOVEMBRO A JANEIRO, QUANDO ESCURECE AS 16h NO REINO UNIDO.
        //
        // PROFUNDIDADE: 4.504 / 1.261 / 1.189 / 850 / 774 / 536 / 448 / 421 / 407 / 363.
        //
        // ─── ACHADO PRINCIPAL: LUX SEM AREA NAO E MEDIDA (DE NOVO) ───
        // 1. MESMA FISICA DO ARTIGO DE SAD LAMP: LUX E ILUMINANCIA, LUMEN POR METRO
        //    QUADRADO NA SUPERFICIE. UM NUMERO DE LUX SEM DIZER **SOBRE QUE AREA** OU **A
        //    QUE DISTANCIA** NAO PODE SER CONFERIDO. O QUE FOI COLETADO:
        //      BENQ SCREENBAR PRO .. "over **1000lx central** brightness and a **500lx
        //                            range within 85*50cm**"  ← UNICA COM AREA
        //      BENQ SCREENBAR ...... "will illuminate to **500 lux**... Adjust the light
        //                            level from **230 lux to 955 lux**" + CITA A NORMA
        //      YEELIGHT ............ "**1500Lux**" NO TITULO. SEM AREA, SEM DISTANCIA,
        //                            **E SEM POTENCIA PUBLICADA EM LUGAR NENHUM**
        //      QUNTIS (x4) ......... "Max **900Lux**" EM QUATRO ANUNCIOS DIFERENTES
        //      BENQ HALO 2 (£149) .. NAO PUBLICA LUX NENHUM
        //      OOWOLF / LALILED .... NAO PUBLICAM LUX NENHUM
        //    UMA EM DEZ PUBLICA A AREA. E ELA COBRA £119.
        // 2. A YEELIGHT DE **£25.47** ESTAMPA 1500 lux NO TITULO — 50% ACIMA DO QUE O
        //    CARRO-CHEFE DA BENQ DECLARA NO CENTRO — E NAO PUBLICA WATT. SEM AREA E SEM
        //    POTENCIA, O NUMERO PODE SER VERDADE SOBRE CINCO CENTIMETROS QUADRADOS.
        //
        // ─── ACHADO 2: A CATEGORIA INTEIRA TEM O MESMO TETO DE POTENCIA ───
        // 3. ESTAS BARRAS SAO ALIMENTADAS POR USB. USB-A ENTREGA 5 V × 1 A = **5 W**, E A
        //    OOWOLF DIZ ISSO NA CARA: "Please use a **5V/1A** power supply or the USB port
        //    on the back of the monitor". POTENCIAS PUBLICADAS:
        //      BENQ SCREENBAR 5 W · BENQ SCREENBAR PRO 5 W · BENQ HALO 2 5 W · OOWOLF 5 W
        //      LALILED 7 W · QUNTIS (TODAS AS QUATRO) 7,5 W · YEELIGHT: NAO PUBLICA
        //    OU SEJA: A BARRA DE **£23.99** E A DE **£149.00** OPERAM COM O MESMO ORCAMENTO
        //    DE ENERGIA. 5 W DE LED BOM SAO ~550 LUMENS NO TOTAL. O QUE £125 A MAIS COMPRA
        //    NAO E MAIS LUZ — E OPTICA ASSIMETRICA, SENSOR E CONFORMIDADE COM NORMA.
        //
        // ─── ACHADO 3: A QUNTIS DECLARA 900 LUX COM QUATRO CONTAGENS DE LED ───
        // 4. QUATRO ANUNCIOS QUNTIS NA MESMA BUSCA, TODOS "Max 900Lux", TODOS 7,5 W:
        //      51cm B0CR1H394H .. BULLET "84 LEDs" · TABELA "Number of Lights **144**"
        //      51cm B0D6YM1N39 .. BULLET "84 LEDs" · TABELA "Number of Lights **2**"
        //      41cm B0CKQS1V8D .. BULLET "84 LEDs" · TABELA "84" ✓
        //      41cm B0GL7M99NB .. BULLET "76 LEDs" · TABELA "76" ✓
        //    O MESMO BRILHO DECLARADO SAI DE 76 LEDs NUMA BARRA E DE 84 NA OUTRA, E A
        //    TABELA RESPONDE 84, 144, 76 E **2** PARA O MESMO CAMPO. "Number of Lights: 2"
        //    NUMA BARRA DE 84 LEDs E O CAMPO MAIS ERRADO DA COLETA.
        // 5. A QUNTIS OPERA PELO MENOS OITO ANUNCIOS QUASE IDENTICOS NESTA BUSCA (40cm,
        //    41cm, 41cm CURVA, 51cm, 51cm CURVA, 66cm, WIRELESS, AUTO-DIMMING), COM POOLS
        //    DE AVALIACAO SEPARADOS DE 850 / 774 / 421 / 407 / 125 / 41. E O MESMO PADRAO
        //    DA OLSEN & SMITH NOS BAUS DE JARDIM, EM ESCALA MAIOR. POR ISSO QUATRO DELAS
        //    ESTAO NESTA LISTA: E O QUE O COMPRADOR REALMENTE ENCONTRA NA BUSCA.
        //
        // ─── ACHADO 4: SOQUETE DE LAMPADA EM BARRA DE LED INTEGRADO, EM SETE DE DEZ ───
        // 6. NENHUMA DESTAS TEM LAMPADA TROCAVEL. MESMO ASSIM A FICHA DECLARA SOQUETE E
        //    FORMATO DE BULBO:
        //      BENQ SCREENBAR ..... "Bulb Base **E26**" · "Bulb Shape Size **T6 1/2**"
        //      BENQ SCREENBAR PRO . "Bulb Base **BA21D**" · "Bulb Shape Size **T**"
        //      QUNTIS 51cm (x2) ... "E27" · "B17" / "T"
        //      QUNTIS 41cm ........ "E27" · "T8"
        //      OOWOLF ............. "E26" · "A19"
        //      LALILED ............ "E27" · "B10"
        //    A BENQ, QUE E A MARCA DE REFERENCIA E COBRA £89 A £149, COMETE O MESMO ERRO.
        //
        // ─── ACHADO 5: O COMPRIMENTO DA BARRA APARECE NUM EIXO DIFERENTE EM CADA FICHA ──
        // 7. QUNTIS 51cm ...... "44D x 33W x 5H"  (LARGURA 33 cm NUMA BARRA DE 51 cm)
        //    QUNTIS 51cm RGB .. "45D x 32W x 5H"
        //    QUNTIS 41cm ...... "**2D** x 40W x **2H**"
        //    QUNTIS 41cm CURVA  "40D x 15W x 3H"
        //    OOWOLF 16" (41cm)  "**44D** x 12W x 6H"
        //    LALILED 42,5cm ... "5D x 13.9W x **42.5H**"  (COMPRIMENTO NA ALTURA)
        //    O NUMERO QUE IMPORTA — O COMPRIMENTO — CAI EM D, W OU H CONFORME O ANUNCIO.
        //
        // ─── O QUE A CATEGORIA FAZ BEM: CRI E NORMA DE LUZ AZUL ───
        // 8. CINCO PUBLICAM CRI: BENQ >95, QUNTIS >95, OOWOLF ≥95, YEELIGHT Ra95,
        //    LALILED **>85** — E A LALILED, A MAIS BARATA, E A UNICA QUE PUBLICA UM NUMERO
        //    MENOR QUE 95, O QUE E MAIS CRIVEL QUE CINCO MARCAS EMPATADAS NO MESMO 95.
        // 9. QUNTIS E YEELIGHT CITAM "**RG0**" (GRUPO ISENTO DA IEC 62471, RISCO
        //    FOTOBIOLOGICO). A BENQ VAI ALEM E CITA **IEEE PAR1789** (CINTILACAO) E
        //    **IEC/TR 62778** (RISCO DE LUZ AZUL). SAO NORMAS REAIS, E A BENQ E A UNICA
        //    QUE CITA A DE CINTILACAO — QUE E A QUE CAUSA DOR DE CABECA.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: LUMINARIAS DE MESA QUE A BUSCA MISTUROU (NEATFI, HONEYWELL, AMAZLIT,
        // LITONES); FITA DE TV (GOVEE); QUNTIS 66cm (41 AVALIACOES) E 40cm AUTO-DIM (125).
        // DENTRO: 363 A 4.504 AVALIACOES, NOTA 4.2 A 4.7, £23.99 A £149.00, SEIS MARCAS.
        //
        // FOCUS KEYWORD: best monitor light bar
        // VARIACOES TRABALHADAS: screen bar / monitor lamp / computer monitor light /
        // desk light bar / e-reading light / monitor light with backlight /
        // curved monitor light bar / USB monitor light / screen light bar
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home-office',                // SLUG DA CATEGORIA (URL)
            'name' => 'Home & Office',              // NOME EXIBIDO
            'description' => 'Kit to make working from home more comfortable and productive, ranked for UK buyers.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-monitor-light-bar',                                  // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Monitor Light Bar 2026: 10 Ranked, and Why Lux Without an Area Is Nothing', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Monitor Light Bar 2026: Top 10 Ranked',         // TITLE DA ABA/GOOGLE (43 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best monitor light bar options on Amazon and found one listing in ten that says over what area its lux figure holds, from £23.99 to £149.', // META DESCRIPTION (155 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best monitor light bar',                         // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Lux measures light landing on a surface, so a lux figure only means something if you are told what surface. Exactly one of these ten listings tells you. BenQ's ScreenBar Pro states \"over 1000lx central brightness and a 500lx range within 85*50cm\" — a number and the area it holds across — and it costs £119. Yeelight puts \"1500Lux\" in its product title at £25.47, publishes no area, no distance, and no wattage anywhere on the page. Quntis prints \"Max 900Lux\" across four different bars in the same search. Three listings, including BenQ's own £149 flagship, publish no illuminance figure at all. Meanwhile the thing nobody mentions is that every bar here runs off a USB port, and OOWOLF says the quiet part out loud in its final bullet: \"Please use a 5V/1A power supply\". Five volts at one amp is five watts, which is what BenQ's £89 bar, BenQ's £119 bar, BenQ's £149 bar and the £27.99 OOWOLF all declare — so the cheapest and dearest products on this page work from the same energy budget, and the extra £125 buys optics, sensors and standards compliance rather than more light. We ranked ten of the best monitor light bar options on Amazon in August 2026, and found one brand claiming the same 900 lux from 76 LEDs on one bar and 84 on another, with its own specification table answering 84, 144, 76 and 2.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO NA ABERTURA
            'conclusion' => "The best monitor light bar for you is not the one with the biggest lux number, because a lux number without an area attached cannot be wrong and therefore cannot be right either. Since every bar in this category draws five to seven and a half watts from a USB port, they all emit roughly the same total light — somewhere around 500 to 800 lumens — and what separates them is entirely where that light goes. That is the case for asymmetric optics: a bar that throws its output forward and down at a controlled angle lights your keyboard without bouncing off the screen, and a bar that scatters puts reflections in your eyeline all evening. So buy on three things. Beam control first, because it is the only real difference. Colour rendering second, where a stated CRI above 90 means colours on your desk look like themselves. And length third, matched to your monitor rather than maximised — a 41cm bar suits a 24 inch screen and a 51cm bar a 27 to 32 inch one, though you will have to work out which dimension field on the listing actually contains the length, since it lands in depth, width or height depending on who wrote the page. Crucially, check the review count against the exact model, because one brand here runs at least eight near-identical listings and splits its feedback across all of them.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 22:25:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'BenQ ScreenBar Monitor Light Bar, 5W, Auto Dimming, 230-955 Lux',         // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£89.00',                                                                // PRECO (COLETADO EM 30/08/2026)
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 4504,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/41nI6sm+OKS._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best monitor light bar',                                             // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0785D93KD?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Publishes its full brightness range in lux, names the standard it meets, and has 4,504 ratings at 4.7 — the deepest and best-rated evidence here.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Four thousand five hundred and four ratings at 4.7 stars is the deepest and joint-best-rated evidence in this comparison, and the listing behind it is the most complete. BenQ states that auto-dimming targets 500 lux, that manual adjustment runs from 230 lux to 955 lux, and — unusually for any lighting product we have collected — it names the standard that 500 lux figure complies with. A range rather than a single flattering maximum is what a measurement looks like.

It then names two more standards that nobody else here mentions: IEEE PAR1789, which governs flicker, and IEC/TR 62778, which governs blue light hazard. Flicker is the one that matters for headaches, and BenQ is the only brand on this page that addresses it. Add CRI above 95, an asymmetric optical design that stops the light reaching the screen, a built-in ambient light sensor, 2700K to 6500K colour adjustment and a sand-blasted aluminium body, and £89 buys a genuinely engineered object rather than an LED strip on a clamp.

Two caveats. The patented clamp fits monitors 1 to 3 centimetres thick, which is narrower than the 0.43 to 6 centimetre range of BenQ's own Halo 2, so measure your bezel before ordering. And the specification table repeats the category's silliest habit: Bulb Base reads \"E26\" and Bulb Shape Size reads \"T6 1/2\" on a sealed LED bar with no socket and no removable bulb. That BenQ, at £89, fills those fields as carelessly as a £24 seller is worth noting, even though nothing about the product depends on it.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Publishes a full 230-955 lux range, not a single flattering maximum', 'Names the standard its 500 lux auto-dim target complies with', 'Only bar here citing IEEE PAR1789 for flicker and IEC/TR 62778 for blue light', '4,504 ratings at 4.7, the deepest and joint-best rated here', 'CRI above 95 with asymmetric optics and an ambient light sensor'], // PONTOS POSITIVOS
                'contras' => ['Clamp fits only 1-3cm bezels, narrower than BenQ\'s own Halo 2', 'Does not state the area its lux figures hold across, unlike the Pro', 'Spec table lists an E26 bulb base on a sealed LED bar', '£89 against £24-£31 for bars with similar CRI claims'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'BenQ ScreenBar Pro, 5W, 1000lx Central, 500lx over 85x50cm, Motion Sensor', // NOME (ENCURTADO)
                'price' => '£119.00',                                                               // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 1261,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51FB1nRWx-L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'BenQ ScreenBar Pro monitor light bar with motion sensor',            // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CZ9P1QW9?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing in the entire category that says over what area its lux figure holds — and that single sentence is why it ranks above bars with more ratings.', // TEXTO CURTO (CARD)
                'body' => "One sentence separates this from every other product on the page: \"over 1000lx central brightness and a 500lx range within 85*50cm\". That is an illuminance figure with the area it covers, which is the complete specification, and no other listing in this search provides it. Everyone else prints a lux number floating free — 1500, 900, 500 — leaving you unable to tell whether it describes your whole desk or a coin-sized spot directly beneath the bar. Eighty-five by fifty centimetres is most of a desk, and 500 lux across it is the level office lighting standards ask for.

The other addition over the standard ScreenBar is an ultrasonic motion sensor that detects you within about 60 centimetres, switching the bar on as you sit down and off five minutes after you leave. On a device you will use daily for years that is more useful than it sounds, and it is genuinely rare — the only other presence detection here is on BenQ's dearer Halo 2. ASYM-Light optics, USB-C power, a clamp fitting 0.43 to 6.5 centimetre bezels and 1000R to 1800R curves round it out.

It ranks second rather than first on evidence and price. One thousand two hundred and sixty-one ratings is a quarter of the standard ScreenBar's sample, and £119 is £30 more for a bar with the same 5 watt power budget. The specification table also gives Bulb Base as \"BA21D\" and Bulb Shape Size as \"T\", which describe a bayonet lamp this product does not contain.", // TEXTO SEO LONGO
                'pros' => ['The only listing in this category that publishes lux with its area', '500 lux across 85x50cm is a genuine, checkable desk-lighting figure', 'Ultrasonic presence sensor switches it on and off automatically', 'Fits a wide 0.43-6.5cm bezel range and curved monitors', '4.7 stars from 1,261 ratings'], // PONTOS POSITIVOS
                'contras' => ['£119, thirty pounds more than the ScreenBar for the same 5W budget', '1,261 ratings, a quarter of the standard ScreenBar\'s sample', 'Spec table lists a BA21D bayonet base on a sealed LED bar', 'Motion sensor can trip on movement from elsewhere in a room'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Quntis 41cm Curved Monitor Light Bar, 7.5W, 84 LED, Backlight, Remote',   // NOME (ENCURTADO)
                'price' => '£43.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 774,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51Ynd09+JsL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Quntis 41cm curved monitor light bar with rear ambient backlight',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CKQS1V8D?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best value here: 7.5W, a rear ambient backlight and CRI>95 for £43.99 — and the only Quntis whose LED count is the same in the bullet and the table.', // TEXTO CURTO (CARD)
                'body' => "Seven and a half watts is 50% more power than any BenQ on this page, and at £43.99 this costs half what the ScreenBar does. The dual light source is the reason to want it: as well as the front bar lighting your keyboard, a rear ambient backlight washes the wall behind the monitor, which reduces the contrast between a bright screen and a dark room. That contrast is the actual cause of most evening eye strain, and BenQ only offers a backlight on its £149 model.

Quntis publishes CRI above 95, cites the RG0 photobiological exemption rating, quotes light uniformity of 0.6 or better and describes a 45 degree asymmetric design. The 2.4GHz wireless remote has buttons that glow faintly when the bar is off, which is a small, thoughtful touch. Four hundred and eighty-four ratings would be respectable; 774 at 4.6 stars is the second-best average in this comparison.

It earns its place over its own siblings on one detail: it is the only Quntis on this page whose LED count agrees with itself. The bullet says 84 LEDs and the specification table says 84. The 51cm model at number nine says 84 in the bullet and 144 in the table; the 51cm RGB at number ten says 84 and 2. On the brightness claim Quntis is silent here — the sibling listings say \"Max 900Lux\" and this one gives only \"500-1000lum\", which mixes lumens into a sentence its relatives write in lux. Dimensions read \"2D x 40W x 2H\", which is at least the right shape for a bar.", // TEXTO SEO LONGO
                'pros' => ['7.5W, 50% more power than any BenQ here, for £43.99', 'Rear ambient backlight, which BenQ only offers at £149', 'The only Quntis here whose LED count matches between bullet and table', 'CRI above 95, RG0 rating and stated light uniformity', '774 ratings at 4.6, the second-best average in this comparison'], // PONTOS POSITIVOS
                'contras' => ['Quotes "500-1000lum" where its siblings quote lux, mixing the units', 'No lux figure and no area published', 'Spec table lists an E27 bulb base and a T8 tube shape', 'Quntis splits its feedback across at least eight similar listings'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'BenQ ScreenBar Halo 2, 5W, Front & Back Light, Wireless Dial, Auto On/Off', // NOME (ENCURTADO)
                'price' => '£149.00',                                                               // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 1189,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/515oRcF6eqL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'BenQ ScreenBar Halo 2 with front and back lighting and wireless dial', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DK59YKRS?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most expensive bar here and the best hardware — from the only BenQ listing that publishes no lux figure at all.', // TEXTO CURTO (CARD)
                'body' => "The Halo 2 is the most complete piece of hardware in this comparison. It lights both forward onto the desk and backward onto the wall, at an 18 degree anti-glare angle that BenQ calls ASYM-Light; it detects your presence and switches itself on and off; it auto-dims to ambient conditions; and it is driven by a wireless dial with its own display showing the exact brightness and colour temperature values, charged over USB and lasting about three months. The clamp handles bezels from 0.43 to 6 centimetres and curves from 1000R to 1800R, which is the widest compatibility here.

The wireless dial deserves particular mention because it solves a real irritation. Touch controls on the bar itself mean reaching over your monitor and nudging it every time you change brightness; a dial that sits by your mouse with a numeric readout turns a fiddle into a glance.

What is missing is the number. This is the only BenQ listing on the page that publishes no illuminance figure whatsoever — no lux at the centre, no range, no area — despite the two cheaper BenQ bars both doing so and the Pro publishing the best disclosure in the category. At £149 it is £60 dearer than the ScreenBar and £30 dearer than the Pro, and it asks you to spend that on the strength of features rather than measurements. It is also 5 watts, like every other BenQ here.", // TEXTO SEO LONGO
                'pros' => ['Front and rear lighting with an 18 degree anti-glare angle', 'Wireless dial with a numeric display, charged over USB, lasts 3 months', 'Presence detection plus ambient auto-dimming', 'Widest compatibility here: 0.43-6cm bezels, 1000R-1800R curves', '4.7 stars from 1,189 ratings'], // PONTOS POSITIVOS
                'contras' => ['The only BenQ here that publishes no lux figure at all', '£149, the most expensive bar in this comparison', 'Still a 5W USB device, like the £27.99 OOWOLF', 'Spec table gives the bulb shape as "54SMD", which is not a bulb'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Quntis 41cm Curved Monitor Light Bar, 76 LED, 900 Lux, Wireless Remote',  // NOME (ENCURTADO)
                'price' => '£30.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 421,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51UkNBCjhSL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Quntis 41cm curved monitor light bar with wireless remote control',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GL7M99NB?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Claims the same 900 lux as its 84-LED siblings using 76 LEDs, for £13 less — which tells you what the LED count is worth.', // TEXTO CURTO (CARD)
                'body' => "This bar makes the category's central point better than any criticism could. Quntis sells four monitor light bars in this search, all rated 7.5 watts, all advertising \"Max 900Lux\". This one produces that figure from 76 LEDs; the three others produce it from 84. Thirteen pounds cheaper than the 41cm at number three and twenty pounds cheaper than the 51cm models, from the same brand, with the same claimed brightness and eight fewer diodes — which is a clear demonstration that the LED count in these titles is a marketing number rather than a measure of output. Total light comes from watts, and the watts are identical.

As a product it is well specified and the cheapest way into the brand's ASYM-Light optics. Forty-five degree targeted beam control, a 2.4GHz wireless remote that will drive several bars at once if you run a multi-monitor desk, stepless dimming, memory function, RG0 blue light rating and a patented weighted sliding clip that works on curves of 1000R or greater. The metal body weighs 584 grams. Four hundred and twenty-one ratings at 4.4 stars is a solid mid-table sample.

The specification table is, for once, internally consistent: the bullet says 76 LEDs and the table says 76. The dimensions are the usual muddle — \"40D x 15W x 3H\" for a bar sold as 41 centimetres, so the length has landed in the depth field. And no area accompanies the 900 lux, so like eight of the ten here the headline figure cannot be checked against anything.", // TEXTO SEO LONGO
                'pros' => ['Same claimed 900 lux as its 84-LED siblings, for £13 less', 'LED count agrees between the bullet and the specification table', 'One remote drives multiple bars, useful on a multi-monitor desk', '45 degree targeted optics and RG0 blue light rating', 'Metal body and a weighted sliding clip for curved monitors'], // PONTOS POSITIVOS
                'contras' => ['900 lux published with no area, like eight of the ten here', 'Length appears in the depth field: "40D x 15W x 3H" for a 41cm bar', 'No rear backlight, unlike the dearer Quntis models', '421 ratings, split from the brand\'s other seven listings'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'OOWOLF 16" Monitor Light Bar, 5W, 84 LED, CRI≥95, Backlight, Remote',     // NOME (ENCURTADO)
                'price' => '£27.99',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 448,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51BHNwvzcdL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'OOWOLF 16 inch monitor light bar with silicone mount and backlight',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B5D6L3K1?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The listing that gives the category away: it tells you to use a 5V/1A supply, which is the five-watt ceiling every bar here shares.', // TEXTO CURTO (CARD)
                'body' => "The most useful sentence on this page is OOWOLF's last one: \"Please use a 5V/1A power supply or the USB port on the back of the monitor\". Five volts at one amp is five watts, and that is the entire energy budget of this product — the same five watts BenQ declares on bars costing £89, £119 and £149. Once you know that, the pricing of this category makes sense: nobody is selling you more light, because the USB port will not supply it. They are selling you where the light goes and how carefully it was measured.

For £27.99 you get a genuinely competitive specification. CRI of 95 or above, matching BenQ's claim, which means colours on your desk render properly. Eighty-four LEDs, an asymmetric optical design radiating down and forward only, a rear ambient backlight that the £89 BenQ does not have, independent control of front and back lighting, three colour temperatures, 10% to 100% dimming and a remote. The silicone mount is heavy enough to sit on curved monitors without a clamp mechanism, and it weighs only 350 grams.

Four point two stars is the lowest average in this comparison, from 448 ratings, and that is the honest reason it sits sixth rather than third. No lux or lumen figure appears anywhere, so there is nothing to check the brightness against. And the specification table repeats the category habit with a \"Bulb Base E26\" and an \"A19\" bulb shape — the shape of a standard household screw-in bulb — on a sealed 84-LED bar.", // TEXTO SEO LONGO
                'pros' => ['States its 5V/1A power requirement, revealing the category\'s 5W ceiling', 'CRI of 95 or above, matching BenQ, for £27.99', 'Rear ambient backlight that the £89 BenQ does not offer', 'Front and back lights controlled independently', 'Silicone mount needs no clamp and weighs just 350g'], // PONTOS POSITIVOS
                'contras' => ['4.2 stars, the lowest average in this comparison', 'No lux or lumen figure published anywhere', 'Spec table lists an E26 base and A19 household bulb shape', 'Dimensions give 44cm depth for a bar sold as 16 inches'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Yeelight Monitor Light Bar 42cm, 1500 Lux, Ra95, 78 LED, Full Metal',     // NOME (ENCURTADO)
                'price' => '£25.47',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 363,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61fKsazNv-L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Yeelight 42cm monitor light bar with full metal body and touch control', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GHQVTF81?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Puts 1500 lux in its title — 50% more than BenQ claims at the centre — while publishing no area, no distance and no wattage at all.', // TEXTO CURTO (CARD)
                'body' => "One thousand five hundred lux is the largest illuminance claim in this comparison, and it appears in the product title of the second cheapest bar on the page. BenQ's £119 ScreenBar Pro, the only product here that publishes an area, claims over 1000 lux at the centre. This claims half again as much for £93.53 less, and it does so without stating an area, a distance, or — uniquely among the eight listings that publish any power figure — a wattage. There is no number anywhere on the page against which the 1500 can be sanity-checked, which is precisely what makes it unfalsifiable rather than false.

Judged on what it does publish, it is decent. A colour rendering index of Ra95 matches BenQ and OOWOLF, 78 LED beads sit in a genuinely full-metal body weighing 245 grams — the lightest here — and stepless dimming runs alongside 2700K to 6500K colour temperature adjustment. It cites the RG0 photobiological exemption, and the retractable clip handles monitors from 0.3 to 1.4 inches thick, which is imperial on a British listing but converts to a usable 0.8 to 3.6 centimetres.

At £25.47 with 363 ratings at 4.3 stars this is a reasonable purchase and a poor listing. Buy it for the metal build and the Ra95, which are stated plainly and are worth having at this money. Do not buy it because it says 1500 lux, because that number is doing no work: no rival publishes a comparable figure with an area either, so it cannot even be compared like for like.", // TEXTO SEO LONGO
                'pros' => ['Ra95 colour rendering, matching bars costing three times as much', 'Genuine full-metal body at just 245g, the lightest here', 'Stepless dimming across 2700K-6500K with touch control', 'RG0 photobiological exemption rating cited', '£25.47 with 363 ratings at 4.3 stars'], // PONTOS POSITIVOS
                'contras' => ['Claims 1500 lux in the title with no area and no distance', 'The only listing here that publishes no wattage at all', 'Clip thickness given in inches on a British listing', 'No rear backlight, which cheaper rivals here include'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Laliled Monitor Light Bar, 7W, CRI>85, 3 Colour Temperatures, 1h Timer',  // NOME (ENCURTADO)
                'price' => '£23.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 536,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71dGx6aiPhL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Laliled dimmable monitor light bar for curved screens with touch control', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CZRX3FS1?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest bar here, and the only one that publishes a colour rendering index below 95 — which is the most believable number on the page.', // TEXTO CURTO (CARD)
                'body' => "Five brands in this comparison publish a colour rendering index and four of them say 95 or better. Laliled says \"greater than 85\". It is the lowest CRI claim on the page and, for that reason, the most credible one: a genuine CRI above 95 requires a specific phosphor mix that costs money, and four separate budget brands landing on the identical figure is the pattern of a number copied from a supplier's marketing sheet rather than measured. Eighty-five is a perfectly respectable index for desk work and it is the sort of thing a seller states when they have looked at the datasheet.

At £23.99 this is the cheapest bar in the comparison and it does the fundamentals. Asymmetric optics radiating down and forward only, three colour temperatures at 2900K, 4100K and 6200K, touch dimming, a clip with 180 degrees of adjustment and a light head with 90 degrees, fitting monitors 1 to 5 centimetres thick. Seven watts is above BenQ's five. Five hundred and thirty-six ratings at 4.3 stars is the fourth deepest sample here.

The one feature nobody else offers is a one-hour timer that prompts you to take a break, which is a small idea aimed at the actual problem these products are sold to solve. Against that: no lux figure, no lumen figure, no backlight, and dimensions reading \"5D x 13.9W x 42.5H\" — the 42.5 centimetre length of the bar has been entered as its height. And Bulb Base reads E27 with a B10 candle bulb shape, on a sealed LED strip.", // TEXTO SEO LONGO
                'pros' => ['Cheapest bar in this comparison at £23.99', 'Publishes CRI>85, the only sub-95 figure here and the most credible', '7W, above BenQ\'s 5W across all three of its models', 'One-hour break timer, unique on this page', '536 ratings at 4.3 stars and a 180 degree adjustable clip'], // PONTOS POSITIVOS
                'contras' => ['No lux or lumen figure published anywhere', 'Dimensions put the 42.5cm bar length in the height field', 'Spec table lists an E27 base and a B10 candle bulb shape', 'No rear ambient backlight at this price, unlike OOWOLF'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Quntis 51cm Curved Monitor Lamp Bar, 7.5W, 900 Lux, Backlight, Remote',   // NOME (ENCURTADO)
                'price' => '£50.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 850,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61cbO+mNV6L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Quntis 51cm curved monitor lamp bar with dual light source',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CR1H394H?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most reviewed Quntis here at 850, on a listing whose title says 84 LEDs and whose specification table says 144.', // TEXTO CURTO (CARD)
                'body' => "Eight hundred and fifty ratings at 4.4 stars is the fourth deepest sample in this comparison, and at 51 centimetres this is the right length for a 27 to 32 inch monitor where the 41cm bars leave the edges of the desk dark. The dual light source design gives you a front bar and a rear ambient wash, four colour temperatures, a 2.4GHz remote, stepless dimming, CRI above 95, an RG0 rating and a patented sliding clip with space to mount a webcam alongside it. Seven and a half watts is the highest power figure on this page.

Then it publishes its own LED count three times and gets two different answers. The product title says 84 LED. The second bullet says \"84 upgrade LEDs\". The specification table says \"Number of Lights: 144\". Sixty diodes is not a rounding error, and on a product whose headline specification is its brightness, the count of light sources is not a trivial field.

The brightness claim itself is the same \"Max 900Lux\" that appears on three other Quntis bars in this search, two of which have different LED counts, and it is published with no area. The same bullet also offers \"a brightness of 500-1000lum\" — lumens and lux in one sentence for the same claim, though they measure different things: lumens is total output, lux is what lands on the desk. Dimensions read \"44D x 33W x 5H\" for a bar sold as 51 centimetres, so no field contains the actual length.", // TEXTO SEO LONGO
                'pros' => ['850 ratings at 4.4, the fourth deepest sample in this comparison', '51cm suits a 27-32 inch monitor, where 41cm bars leave edges dark', '7.5W, the joint-highest power on this page', 'Front bar plus rear ambient backlight and four colour temperatures', 'Clip has room to mount a webcam alongside the bar'], // PONTOS POSITIVOS
                'contras' => ['Title and bullet say 84 LEDs; the spec table says 144', 'Quotes "500-1000lum" and "Max 900Lux" in one sentence for one claim', 'No field contains the 51cm length: dimensions read 44 x 33 x 5cm', 'Spec table lists an E27 base and B17 bulb shape'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Quntis 51cm Curved Monitor Light Bar with RGB Backlight, 7.5W, 84 LED',   // NOME (ENCURTADO)
                'price' => '£50.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 407,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81Atfdm-8NL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Quntis 51cm curved monitor light bar with RGB gaming backlight',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D6YM1N39?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The same price and specification as the bar above it, with RGB added and half the ratings — and a table declaring it has two lights.', // TEXTO CURTO (CARD)
                'body' => "This is the number nine bar with colour added. Same 51 centimetre length, same £50.99, same 7.5 watts, same 84 LEDs in the bullet, same CRI above 95, same RG0 rating, same 45 degree asymmetric optics, same 2.4GHz remote, same dual light source. What you gain is fifteen dynamic RGB lighting effects on the rear ambient light, aimed at gaming desks, where the argument for coloured backlighting is aesthetic rather than ergonomic. What you lose is 443 ratings: this listing has 407 where its twin has 850, which is Quntis splitting one product's feedback across two pages.

That splitting is the reason four Quntis bars appear in this ranking. The brand runs at least eight near-identical listings in this single search — 40cm, 41cm, 41cm curved, 51cm, 51cm curved, 66cm, a wireless version and an auto-dimming version — with separate review pools of 850, 774, 421, 407, 125 and 41. Nobody comparing them can tell how many people have actually bought a Quntis light bar, because the answer is distributed across pages that describe substantially the same object.

The specification table then produces the single most wrong field of this collection. Number of Lights reads 2. The bullet on the same page says 84 upgrade LEDs, the title says 84 LED, and the sibling listing says 144. Four Quntis listings, one claimed brightness of 900 lux, and four different answers to how many diodes produce it: 84, 144, 76 and 2. The dimensions, for completeness, read \"45D x 32W x 5H\" for a 51 centimetre bar.", // TEXTO SEO LONGO
                'pros' => ['Fifteen RGB backlight effects for a gaming desk', 'Same 7.5W, CRI>95 and 45 degree optics as its higher-ranked twin', '51cm length suits 17 to 32 inch monitors', '4.4 stars from 407 ratings'], // PONTOS POSITIVOS
                'contras' => ['Spec table says "Number of Lights: 2" on an 84-LED bar', 'Identical price and specification to the bar above with half the ratings', 'Quntis splits its feedback across at least eight near-identical listings', 'No field contains the 51cm length, and 900 lux comes with no area'], // PONTOS NEGATIVOS
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
        $this->command?->info("MonitorLightBarsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
