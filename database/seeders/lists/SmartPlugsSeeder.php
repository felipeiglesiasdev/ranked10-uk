<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class SmartPlugsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE TOMADAS INTELIGENTES DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=smart+plug+energy+monitoring&rh=p_36%3A1200-  (26 ASINS ANALISADOS)
        // CATEGORIA TECH. SAZONAL: PICO DE OUTUBRO A JANEIRO — CONTA DE LUZ DE INVERNO E
        // LUZ DE NATAL SAO OS DOIS GATILHOS DE COMPRA DESTA CATEGORIA NO REINO UNIDO.
        //
        // PROFUNDIDADE: 38.347 / 18.125 / 2.173 / 1.593 / 1.567 / 1.485 / 1.212 / 1.206 /
        // 1.042 / 163. A SEGUNDA CATEGORIA MAIS PROFUNDA JA COLETADA, DEPOIS DE ESPRESSO.
        //
        // ─── ACHADO PRINCIPAL: MESMOS 13 A, TRES TENSOES, 260 W DE DIFERENCA ───
        // 1. TODA TOMADA INTELIGENTE BRITANICA DECLARA 13 A, QUE E O FUSIVEL DO PLUGUE UK.
        //    POTENCIA = TENSAO × CORRENTE, ENTAO O WATT MAXIMO SAI DA TENSAO — E ELAS NAO
        //    CONCORDAM SOBRE QUAL E A TENSAO DA REDE BRITANICA:
        //      TAPO P110 (38.347 AVAL.) .. "Operating Voltage **220 Volts**" → 2.860 W
        //      ANTELA (2.173) ............ "Operating Voltage **220 Volts**" → 2.860 W
        //      MEROSS MSS315 (1.042) ..... "Voltage **230 Volts (AC)**" ..... → 2.990 W
        //      MEROSS MSS425 (1.212) ..... "Voltage **230 Volts**" .......... → 2.990 W
        //      MEROSS MSS305 (1.206) ..... "Voltage **240 Volts**" + BULLET
        //                                  "up to 13A, **3120W**" .......... → 3.120 W
        //      TCP (1.485) ............... "Operating Voltage **240 Volts (AC)**" → 3.120 W
        //      TAPO TP11 (18.125) ........ "Voltage **240 Volts (AC)**" ..... → 3.120 W
        //      EIGHTREE (x2) ............. DECLARA 13 A E **NENHUMA TENSAO**
        //    A REDE BRITANICA E **230 V NOMINAL** DESDE A HARMONIZACAO EUROPEIA DE 1995
        //    (FAIXA DE 216,2 A 253 V). LOGO O MESMO RELE DE 13 A E VENDIDO COMO 2.860 W NUMA
        //    PAGINA E 3.120 W EM OUTRA — **260 W DE DIFERENCA** SOBRE A MESMA PECA.
        // 2. E AS MARCAS SE CONTRADIZEM SOZINHAS: A TP-LINK PUBLICA **220 V NA P110 E 240 V
        //    NA TP11**. A MEROSS PUBLICA **230 V EM DOIS PRODUTOS E 240 V NUM TERCEIRO**.
        //    MESMO FABRICANTE, MESMA LOJA, MESMA REDE ELETRICA.
        // 3. SO A MEROSS MSS305 FAZ A MULTIPLICACAO NA FRENTE DO CLIENTE: "13A, 3120W".
        //    13 × 240 = 3.120 ✓ — A CONTA FECHA, MAS COM A TENSAO ANTIGA DE 240 V.
        //
        // ─── ACHADO 2: NINGUEM PUBLICA A PRECISAO DO MEDIDOR ───
        // 4. DEZ PRODUTOS VENDIDOS COMO "ENERGY MONITORING", E **ZERO** PUBLICAM A TOLERANCIA
        //    DA MEDICAO. NEM ±1%, NEM ±5%, NEM CLASSE DE MEDIDOR. E UM APARELHO CUJA FUNCAO
        //    DECLARADA E MEDIR, VENDIDO PARA GENTE QUE QUER CALCULAR CONTA DE LUZ, E A
        //    ESPECIFICACAO QUE DEFINE SE A MEDIDA SERVE PARA ALGUMA COISA NAO EXISTE EM
        //    NENHUMA DAS DEZ FICHAS. VARIAS AINDA OFERECEM INSERIR A TARIFA PARA "ESTIMAR A
        //    CONTA" — UMA ESTIMATIVA COM ERRO DESCONHECIDO.
        // 5. A TAPO P110 AINDA DIZ QUE MONITORA "the average power consumption of the load
        //    **for one hour**" — JANELA DE MEDIA DE UMA HORA, QUE ESCONDE PICO DE PARTIDA.
        //
        // ─── ACHADO 3: CARGA INDUTIVA, E SO UMA MARCA AVISA ───
        // 6. RELE DE 13 A E 13 A **RESISTIVO**. MOTOR E COMPRESSOR PUXAM 6 A 8 VEZES A
        //    CORRENTE NOMINAL NA PARTIDA, E E ISSO QUE SOLDA O CONTATO DO RELE. A TAPO E A
        //    UNICA DAS DEZ QUE AVISA: "Avoid plugging in appliances with a motor/compressor
        //    higher than **1/6HP**, such as an air conditioner". 1/6 HP SAO ~124 W — OU SEJA,
        //    O LIMITE REAL PARA CARGA COM MOTOR E 4% DOS 3.120 W ANUNCIADOS. NENHUMA DAS
        //    OUTRAS NOVE MENCIONA O ASSUNTO, E VARIAS SUGEREM AQUECEDOR NOS BULLETS.
        //
        // ─── ACHADO 4: TEXTO DE TEMPLATE CRU NA FICHA, COM ASPAS ABERTAS ───
        // 7. TAPO P110: "Switch Type **Wall Outlet\" or \"Receptacle**" E "Circuit Type
        //    **series\" or \"parallel**". SAO AS DUAS OPCOES DO TEMPLATE, COM AS ASPAS DE
        //    ESCAPE AINDA NO MEIO, NA FICHA DA TOMADA MAIS AVALIADA DO REINO UNIDO.
        //    EIGHTREE 5GHz: "Actuator Type **Hinge Lever\" or \"Push Button**". MESMO PADRAO.
        // 8. 🔴 TAPO P110: "Connector Type **Schuko**". SCHUKO E O PLUGUE REDONDO DE DOIS
        //    PINOS DA EUROPA CONTINENTAL, QUE **NAO ENTRA** NUMA TOMADA BRITANICA. NUM
        //    ANUNCIO BRITANICO DE UM PLUGUE TIPO G, COM 38.347 AVALIACOES.
        // 9. MEROSS MSS425 (EXTENSAO): A MESMA TABELA DIZ "Power Plug Type **Type G**" E,
        //    DUAS LINHAS DEPOIS, "Plug Type **Type C**". TYPE G E O BRITANICO; TYPE C E O
        //    EUROPEU DE DOIS PINOS.
        // 10. ANTELA: "Mounting Type **Through Hole Mount**" E "Terminal **Through Hole**" —
        //    TERMOS DE SOLDAGEM DE PLACA, NUM APARELHO QUE SE ESPETA NA PAREDE. E
        //    "Operation Mode **ON-OFF-ON**", QUE E CHAVE DE TRES POSICOES.
        // 11. TCP: "Operation Mode **Manual**" NUMA TOMADA WI-FI, "Terminal **Screw**" NUM
        //    PLUGUE MOLDADO, E "Number of Positions **4**" (QUE E O TAMANHO DO PACOTE).
        // 12. TAPO TP11: "Number of Packs **24**" COM "Unit Count **4.0 count**" — NUM
        //    PACOTE DE QUATRO.
        // 13. EIGHTREE ALEXA: "Number Of Wires **4**". PLUGUE BRITANICO TEM TRES (FASE,
        //    NEUTRO E TERRA). ELA ACERTA, PORE, NO QUE IMPORTA: DECLARA **BS1363 E UKCA**,
        //    QUE SAO A NORMA E A MARCACAO CERTAS — E E A UNICA QUE CITA A NORMA.
        //
        // ─── ACHADO 5: A EXTENSAO PEDE MAIS DO QUE O PROPRIO FUSIVEL DA ───
        // 14. MEROSS MSS425: "Total output **3250W MAX**". A 230 V ISSO SAO **14,1 A** — E O
        //    PLUGUE DA PROPRIA EXTENSAO E FUSIVEL DE 13 A. O NUMERO SO FECHA A 250 V, QUE E
        //    O TOPO ABSOLUTO DA FAIXA E NAO A TENSAO NOMINAL. NA PRATICA O FUSIVEL ABRE
        //    ANTES DOS 3.250 W ANUNCIADOS.
        //
        // ─── ACHADO 6: MATTER QUE NAO E MATTER EM TODO LUGAR ───
        // 15. TAPO P110M: "For Matter 1.3 Energy Monitoring Supportive... **currently works
        //    with SmartThings and Home Assistant only**". OU SEJA, A FUNCAO DE MEDICAO VIA
        //    MATTER NAO FUNCIONA NO APPLE HOME NEM NO GOOGLE HOME — QUE SAO DUAS DAS QUATRO
        //    PLATAFORMAS QUE LIDERAM O PROPRIO PADRAO MATTER. DISSE NO ANUNCIO, O QUE E
        //    CORRETO, MAS E O PRODUTO MAIS CARO POR TOMADA DA LISTA.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: OS ASINS IRMAOS DE 1 E 4 UNIDADES DOS MESMOS MODELOS (TAPO P110 4-PACK,
        // MEROSS MSS305 1 E 4-PACK, EIGHTREE REPETIDOS) — MANTIDO UM POR MODELO, O DE MELHOR
        // PRECO POR TOMADA; TUDO ABAIXO DE 150 AVALIACOES (THIRDREALITY 27, TAPSIN 90).
        // DENTRO: 163 A 38.347 AVALIACOES, NOTA 4.2 A 4.7, £15.97 A £49.99, SEIS MARCAS.
        //
        // FOCUS KEYWORD: best smart plug
        // VARIACOES TRABALHADAS: smart plug with energy monitoring / wifi plug /
        // alexa smart plug / smart socket UK / smart plug timer / matter smart plug /
        // energy monitoring plug / plug that works with alexa / 13A smart plug
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-smart-plug',                                         // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Smart Plug 2026: 10 Ranked, and Why 13 Amps Means Three Different Wattages', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Smart Plug 2026: Top 10 Energy Monitors Ranked', // TITLE DA ABA/GOOGLE (50 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best smart plug options on Amazon and found the same 13A relay sold as 2,860W and as 3,120W, from £15.97 to £49.99.', // META DESCRIPTION (129 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best smart plug',                                // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Every smart plug sold in Britain is rated at 13 amps, because that is the fuse in a UK plug. Watts are volts times amps, so the maximum load follows directly from the mains voltage — and these listings cannot agree on what the mains voltage is. TP-Link's Tapo P110, the most-reviewed smart plug in the country with 38,347 ratings, states \"Operating Voltage 220 Volts\". TP-Link's own Tapo TP11, on the same storefront, states 240. Meross publishes 230 volts on two products and 240 on a third, where it helpfully does the multiplication in a bullet: \"up to 13A, 3120W\". British mains has been 230 volts nominal since the European harmonisation of 1995. So the same 13 amp relay is advertised as handling 2,860 watts on one page and 3,120 on another, a spread of 260 watts, and two manufacturers disagree with themselves. Meanwhile all ten of these are sold on energy monitoring and not one publishes the accuracy of its meter — no tolerance, no measurement class, nothing — while several invite you to type in your electricity tariff and estimate your bill from it. We ranked ten of the best smart plug options on Amazon in August 2026, and found that only one brand warns you about the load that actually destroys these things.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO NA ABERTURA
            'conclusion' => "The best smart plug for most people is the cheapest one from a brand that will still be running its servers in five years, because a smart plug is a relay and a radio and the hardware barely differs between them. What does differ is worth knowing. First, the load: a relay rated 13 amps is rated 13 amps resistive, and motors and compressors draw six to eight times their running current at start-up, which is what welds relay contacts shut — Tapo is alone here in warning you, and its limit for motor loads is a sixth of a horsepower, about 124 watts, or 4% of the headline figure. So use these for lamps, heaters, chargers and Christmas lights; do not use them for fridges, dehumidifiers or air conditioners. Second, the energy monitoring is uncalibrated: it is genuinely useful for spotting that the tumble dryer costs more than you thought, and it is not a billing-grade meter, so treat the pounds-and-pence estimate as a comparison rather than a number. Third, almost all of these need 2.4GHz Wi-Fi, which matters if your router hides that band behind a combined network name. Crucially, buy in multipacks — the price per plug roughly halves — and check the voltage the listing claims, because a brand that cannot state the national grid voltage correctly has told you something about how carefully the rest of the page was written.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 21:30:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Tapo P110 Smart Plug with Energy Monitoring, Max 13A, 2-Pack',            // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£15.97',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 38347,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71GrOPjfU-L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best smart plug',                                                    // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B831STBX?tag=ranked10-21',       // LINK AFILIADO
                'summary' => '38,347 ratings, £8 a plug, and the only listing in the category that tells you which appliances will destroy the relay inside it.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Thirty-eight thousand three hundred and forty-seven ratings at 4.6 stars is the deepest evidence in this comparison by more than double, and at £15.97 for two this is also the cheapest way to a plug from a company with a real cloud service behind it. The Tapo app is the most polished here, energy history is genuinely readable, remote access and scheduling work without a hub, and device sharing lets a household control the same plugs from separate phones.

The reason it is the best smart plug on this page is a warning nobody else prints. The final bullet says: \"Avoid plugging in appliances with a motor/compressor higher than 1/6HP, such as an air conditioner.\" That is the specification that matters most and it is the one the category ignores. A relay rated 13 amps is rated for resistive loads; motors and compressors draw six to eight times their running current at the instant they start, and that surge is what fuses relay contacts together so the plug never switches off again. One sixth of a horsepower is about 124 watts — so the real limit for anything with a motor is 4% of the headline wattage. Nine other listings say nothing, and several suggest heaters and appliances in their bullets.

The specification table is a different story. Connector Type reads \"Schuko\", which is the round two-pin continental European plug that physically will not fit a British socket. Switch Type reads \"Wall Outlet\" or \"Receptacle\" and Circuit Type reads \"series\" or \"parallel\" — raw template options with the escape quotes still in them. And Operating Voltage says 220 volts, where TP-Link's own TP11 says 240.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['38,347 ratings at 4.6, more than double the next deepest sample here', 'The only listing that warns about motor and compressor loads', '£7.99 per plug, the joint cheapest in this comparison', 'Best app in the category, with readable energy history', 'No hub required, works with Alexa and Google Assistant'], // PONTOS POSITIVOS
                'contras' => ['Connector Type field says "Schuko", a plug that will not fit a UK socket', 'Two spec fields contain raw template text with escape quotes intact', 'States 220V where TP-Link\'s own TP11 states 240V', 'Energy monitoring averages over one hour, hiding start-up peaks'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Tapo TP11 Compact Smart Plug with Energy Monitoring, 4-Pack',             // NOME (ENCURTADO)
                'price' => '£31.96',                                                                // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 18125,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71I-ZJnzQrL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tapo TP11 compact smart plug four pack in white',                    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GWFLLS6M?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest rating in the category backed by 18,125 ratings, a three-year warranty, and the correct plug type in its specification table.', // TEXTO CURTO (CARD)
                'body' => "Four point seven stars from 18,125 ratings is the best combination of average and sample size on this page, and the TP11 is the plug to buy if you want four of them. At £7.99 each it matches the P110's price per unit while being physically smaller, which is the practical difference: a compact body does not block the second socket on a double wall plate, and anyone who has fitted two fat smart plugs side by side knows that is the failure mode of the format.

The specification table is also cleaner than its stablemate's. Plug Type reads \"Type G\", which is correct for Britain, where the P110 says Schuko. The warranty is three years, the longest in this comparison, and the country of origin is stated. Away Mode is a real addition over the P110: it switches connected lamps on and off at varying times to make an empty house look occupied, which is a security feature rather than a convenience one.

Two notes. The voltage field says 240 volts against the P110's 220, from the same manufacturer — the 260 watt discrepancy in the headline of this article is TP-Link disagreeing with itself. And the pack fields do not add up: Number of Packs reads 24 while Unit Count reads 4.0, on a product sold as a four-pack. You receive four. It also inherits the category-wide silence on measurement accuracy: the energy monitor lets you enter your electricity rate to estimate bills, with no stated tolerance on the underlying reading.", // TEXTO SEO LONGO
                'pros' => ['4.7 stars from 18,125, the best average-and-sample combination here', 'Compact body does not block the adjacent socket on a double plate', 'Plug Type field correctly reads Type G, unlike the P110', 'Three-year warranty, the longest in this comparison', 'Away Mode varies lamp timings to make a house look occupied'], // PONTOS POSITIVOS
                'contras' => ['States 240V where TP-Link\'s own P110 states 220V', 'Number of Packs field reads 24 on a four-pack', 'No stated accuracy for the energy meter, like every plug here', 'No warning about motor loads, unlike the P110'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Meross MSS305 Mini Smart Plug with Energy Monitoring, 13A 3120W, 2-Pack', // NOME (ENCURTADO)
                'price' => '£16.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 1206,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71MRfKDfSKL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Meross MSS305 mini smart plug with energy monitoring, two pack',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CGC6235V?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing that does the multiplication in front of you — 13A, 3120W — and the only one that keeps working when your internet goes down.', // TEXTO CURTO (CARD)
                'body' => "Two things make this the most technically honest listing in the category. The first is that it shows its working: \"This WiFi plug can handle a load of up to 13A, 3120W\". Thirteen amps at 240 volts is exactly 3,120 watts, so the arithmetic is right, and stating both numbers together lets a reader check it rather than trust it. Every table field matches too — 240 volts, 13 amps, Type G, three wires, three poles — which sounds like a low bar until you read the nine listings around it.

The second is local control. If your router loses its internet connection, devices on the same network can still be controlled from the Meross app over the LAN. Almost every rival here becomes a dumb plug the moment the broadband drops, which for anything on a schedule — heating, lights, an aquarium — is exactly when you notice. Bluetooth pairing also makes setup faster than the Wi-Fi-only dance most of these require.

The caveats are proportionate. One thousand two hundred and six ratings is respectable but a thirtieth of the Tapo's sample, so long-term reliability is less well proven. It runs on 2.4GHz Wi-Fi only, which means splitting your network bands if your router combines them. And the 240 volt figure, while it makes the arithmetic consistent, uses the pre-1995 nominal voltage — at Britain's actual 230 volts the true ceiling is 2,990 watts. Showing the working is worth something, but the number it works from is a decade out of date, and the EIGHTREE below shows the same sum done at the right voltage.", // TEXTO SEO LONGO
                'pros' => ['Publishes 13A and 3120W together, and the multiplication is correct', 'Plug Type, poles and wires all correct for a British socket', 'Local LAN control keeps working when the internet drops', 'Bluetooth pairing makes setup faster than Wi-Fi-only rivals', '£8.50 per plug with 1,206 ratings at 4.6'], // PONTOS POSITIVOS
                'contras' => ['Uses 240V, the pre-1995 nominal, so the real ceiling is 2,990W', '1,206 ratings is a thirtieth of the Tapo P110\'s sample', '2.4GHz Wi-Fi only, so combined-band routers need splitting', 'No accuracy figure for the energy meter'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'EIGHTREE 5GHz Smart Plug with Energy Monitoring, Max 13A, 4-Pack',        // NOME (ENCURTADO)
                'price' => '£34.99',                                                                // PRECO (ATUALIZADO 04/09/2026: CAIU DE £39.99)
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 1596,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61f+gdLJhbL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'EIGHTREE 5GHz smart plug four pack with energy monitoring',          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C5N2NV1G?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only 5GHz smart plug here, which solves the single most common setup problem in the category.', // TEXTO CURTO (CARD)
                'body' => "Nine of the ten plugs in this comparison require 2.4GHz Wi-Fi, and the most common complaint across all of their review sections is setup failing because the buyer's router broadcasts a single combined network name and the plug cannot find the right band. The usual workaround is to log into the router, split the bands, pair the plug, then put it back — which is a genuine obstacle for a £10 device. This one connects over 5GHz instead, and for anyone with a modern mesh system that hides band selection entirely, that removes the problem rather than working around it.

One thousand five hundred and ninety-six ratings at 4.6 stars is solid evidence, and four plugs for £34.99 is £8.75 each, a unit price Amazon prints on the listing itself. Response times over 5GHz are genuinely lower, which you notice on voice commands, and the plug supports Alexa and Google Home without a hub.

The trade-off is range, and the listing does not mention it. Five gigahertz carries more data but penetrates walls far worse than 2.4, which is why almost every smart home device in the world uses the lower band — a plug behind a sofa two floors from the router may connect worse than a 2.4GHz rival would. The specification table also carries the same raw template text found on the Tapo: Actuator Type reads \"Hinge Lever\" or \"Push Button\", quotes and all, and Mounting Type reads \"Wall Mount\" for something that plugs in. Its electrical figures, though, repay a look. The table gives 13 amps and 2,990 watts, and EIGHTREE's own comparison chart gives a rated voltage of AC 230V. Thirteen amps at 230 volts is 2,990 watts exactly, so this is a listing that publishes the finished multiplication and uses Britain's real voltage to do it — where the Tapo P110 multiplies the same 13 amps by 220 to reach 2,860 and the Meross MSS305 uses 240 to reach 3,120.", // TEXTO SEO LONGO
                'pros' => ['The only 5GHz plug here, removing the commonest setup problem', 'Rates itself at 230V, Britain\'s real voltage, and publishes 2,990W to match', '13A and 2,990W given together, and the multiplication is correct', '1,596 ratings at 4.6 stars', 'Four plugs for £34.99 with no hub required'], // PONTOS POSITIVOS
                'contras' => ['5GHz penetrates walls far worse than 2.4GHz, and the listing never says so', '£8.75 a socket, against £7.99 from either Tapo multipack', 'Actuator Type field contains raw template text with escape quotes', 'Mounting Type says "Wall Mount" for a plug-in device that the same table calls "Plug In"'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'TCP Smart Plug UK WiFi Socket, Alexa, Google Home, Siri, 4-Pack',         // NOME (ENCURTADO)
                'price' => '£44.00',                                                                // PRECO (ATUALIZADO 05/09/2026: SUBIU DE £37.50)
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 1489,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51Cy0igbGEL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'TCP smart plug UK WiFi socket four pack in white',                   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B7XCQ5Z5?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A manual switch on the body and Siri Shortcuts support — two things the more popular plugs here leave out.', // TEXTO CURTO (CARD)
                'body' => "The physical button is the reason to buy this one. Most smart plugs assume you will always have a phone, and when the app is slow, the Wi-Fi is down or a guest wants the lamp on, a plug you cannot operate by hand is an obstacle rather than a convenience. TCP puts a manual switch on the body, so the plug behaves like a socket when you want it to and like a smart device when you do not. It is a small design decision that changes how a household actually lives with these.

The other differentiator is Siri Shortcuts, which brings Apple voice control without requiring the Matter hub that the Meross and Tapo Matter models further down this page need. Combined with Alexa and Google Home support and no hub requirement of any kind, this is the most broadly compatible plug here for the money. One thousand four hundred and eighty-nine ratings at 4.6 stars is strong, and TCP is a British lighting brand rather than an anonymous seller, which matters for the app still existing in three years.

At £11.00 per plug it is among the dearer options here, and the specification table continues the category's habits. Operation Mode reads \"Manual\" for a Wi-Fi controlled device, Terminal reads \"Screw\" on a moulded plug with no screws in it, Mounting Type reads \"No Mount\", and Number of Positions reads 4 — which is the pack quantity in a field describing switch positions. It does at least publish a voltage, 240 volts AC, though like every 240 volt claim here that is the pre-harmonisation figure.", // TEXTO SEO LONGO
                'pros' => ['Manual switch on the body, so it works without a phone or Wi-Fi', 'Siri Shortcuts support with no Matter hub required', 'Alexa and Google Home too, the widest compatibility here without a hub', 'British lighting brand rather than an anonymous seller', '1,489 ratings at 4.6 stars'], // PONTOS POSITIVOS
                'contras' => ['Operation Mode field says "Manual" for a Wi-Fi plug', 'Terminal field says "Screw" on a moulded plug', 'Number of Positions field contains the pack size', '£11.00 per plug, the dearest four-pack on this page'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'EIGHTREE Alexa Smart Plug with Energy Monitor, BS1363, 4-Pack',           // NOME (ENCURTADO)
                'price' => '£27.99',                                                                // PRECO (ATUALIZADO 05/09/2026: SUBIU DE £24.99)
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 1568,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61KugOhVppL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'EIGHTREE Alexa smart plug with energy monitor, four pack',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CJBGXPD8?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Among the cheapest four-packs here at £7.00 a plug, and the only listing in the category that names the British safety standard it is built to.', // TEXTO CURTO (CARD)
                'body' => "Seven pounds per plug is the lowest price in this comparison, and 1,568 ratings at 4.6 stars means it is not cheap for the usual reason. The compact body is designed specifically not to block the second socket on a UK double plate, it runs on the Smart Life app which also controls thousands of other own-brand devices, and it does energy monitoring with cost estimation, timers, countdowns and cycle modes.

More interesting is a single line in the specification table: \"Specification Met: BS1363, UKCA\". BS 1363 is the British Standard for 13 amp plugs and sockets, and UKCA is the post-Brexit conformity marking. Not one other listing on this page names the standard it is built to. Given that everything here carries mains voltage into a device left plugged in unattended for years, an anonymous brand citing the correct standard by number is worth more than a familiar logo that does not.

The same table then says Number Of Wires: 4. A British plug has three — live, neutral and earth — and a fourth would have nowhere to go. It also gives Plug Type as \"ELECTRICAL\" and Connector Type as \"Quick Connect\", neither of which describes anything. No voltage is published, so as with EIGHTREE's 5GHz model the 13 amp rating cannot be turned into watts. And like eight of the ten here, it needs 2.4GHz Wi-Fi, which is the thing its own 5GHz sibling at number four exists to avoid.", // TEXTO SEO LONGO
                'pros' => ['£7.00 per plug, the cheapest in this comparison', 'The only listing that names its safety standard: BS1363 and UKCA', '1,568 ratings at 4.6 stars', 'Compact body that leaves the adjacent socket usable', 'Smart Life app also controls thousands of other devices'], // PONTOS POSITIVOS
                'contras' => ['Spec table says four wires, where a UK plug has three', 'Plug Type field reads "ELECTRICAL" and Connector Type "Quick Connect"', 'No voltage published, so 13A cannot be converted to watts', '2.4GHz Wi-Fi only, unlike EIGHTREE\'s own 5GHz model'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Meross MSS315 Matter Smart Plug Mini with Energy Monitoring, 4-Pack',     // NOME (ENCURTADO)
                'price' => '£49.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 1048,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61HFtyyPWZL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Meross MSS315 Matter smart plug mini four pack in white',            // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CNVHBCR3?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most complete compatibility disclosure in the category — it lists the exact OS versions and hubs you need before you buy.', // TEXTO CURTO (CARD)
                'body' => "Two of the five bullets on this listing are spent telling you what you need before it will work, and that is a compliment. For Apple: iOS or iPadOS 16.1 or later, a 2.4GHz connection, and a hub such as an Apple TV 4K second or third generation, or a HomePod Mini. For Android: 8.1 or later, 2.4GHz, and a hub such as a SmartThings v3, an Echo fourth generation or a Nest Hub second generation. Matter devices need a hub and most listings mention it in passing if at all. This one names the models.

Matter itself is the reason to pay the premium. A Matter plug talks to Apple Home, Google Home, Alexa and SmartThings through one standard rather than through a manufacturer's cloud, which means it keeps working if Meross changes its app or its business, and it works locally rather than routing commands through a server in another country. For a device you will leave in a wall for a decade, that is a real form of insurance. Offline control works too.

The cost is the price: £12.50 per plug is the most expensive in this comparison, roughly half as much again as the EIGHTREE at £8.75, and 4.3 stars is the second-lowest average here — Matter setups are fiddlier and the reviews reflect it. It publishes 230 volts, the correct British nominal figure, which puts it in the minority on this page that gets the voltage right at all, though Plug Type reads \"wall plug\", which is not a plug type.", // TEXTO SEO LONGO
                'pros' => ['Names the exact OS versions and hub models required, uniquely here', 'Matter keeps working independently of the manufacturer\'s cloud', 'Publishes 230V, the correct UK nominal voltage, unlike most here', 'Local and offline control, and works across all four platforms', '1,048 ratings behind it'], // PONTOS POSITIVOS
                'contras' => ['£12.50 per plug, the most expensive in this comparison', '4.3 stars, the second-lowest average here', 'Needs a hub, which the cheaper Wi-Fi plugs do not', 'Plug Type field reads "wall plug", which is not a plug type'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'ANTELA Smart Plug with Energy Monitoring, 13A, 2.4GHz WiFi, 4-Pack',      // NOME (ENCURTADO)
                'price' => '£25.49',                                                                // PRECO (ATUALIZADO 05/09/2026: CAIU DE £29.99)
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 2176,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61cfI4FcU5L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'ANTELA smart plug four pack with energy monitoring',                 // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09VP5KNWM?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Group control across multiple plugs and 2,176 ratings, on a spec sheet that describes a wall socket using circuit-board soldering terms.', // TEXTO CURTO (CARD)
                'body' => "Group control is the feature that justifies buying four of these rather than four of something else. Rather than switching plugs one at a time, you assign them to a room and turn the lot off with one command — every lamp in the living room, or every device on standby before bed. On a four-pack that is the difference between a novelty and an actual system, and it works through the Smart Life app with no hub or subscription. Two thousand one hundred and seventy-six ratings at 4.4 stars is the third deepest sample in this comparison.

The energy monitoring is presented better than most: consumption over time as a graph rather than a running total, which is what actually reveals that the dehumidifier is costing more than the fridge. At £6.37 per plug it is competitively priced, and it supports Alexa and Google Home.

The specification table is where it slips furthest of any listing here. Mounting Type reads \"Through Hole Mount\" and Terminal reads \"Through Hole\" — both are circuit-board soldering terms describing components with legs pushed through a printed board, applied to a device that pushes into a wall socket. Operation Mode reads \"ON-OFF-ON\", which describes a three-position toggle switch; a smart plug has two states. And Operating Voltage reads 220 volts, ten below the British nominal, which puts its true ceiling at 2,860 watts rather than the 2,990 the grid actually supports.", // TEXTO SEO LONGO
                'pros' => ['Group control switches a whole room of plugs with one command', 'Energy use shown as a graph over time, not just a running total', '2,176 ratings at 4.4, the third deepest sample here', '£6.37 per plug with no hub or subscription needed'], // PONTOS POSITIVOS
                'contras' => ['Mounting Type and Terminal fields use circuit-board soldering terms', 'Operation Mode reads "ON-OFF-ON", a three-position switch', 'States 220V, giving a ceiling of 2,860W rather than 2,990W', '2.4GHz Wi-Fi only, and no accuracy figure for the meter'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Meross MSS425 Smart Extension Lead, 4 UK Sockets, 4 USB, Apple Home',     // NOME (ENCURTADO)
                'price' => '£34.99',                                                                // PRECO (ATUALIZADO 05/09/2026: SUBIU DE £29.74)
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 1212,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61JAGT90GmL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Meross MSS425 smart extension lead with four UK sockets and USB ports', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08JG232D8?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Four individually switched sockets in one lead, on a listing whose table gives two different plug types and a total load above its own fuse.', // TEXTO CURTO (CARD)
                'body' => "Four individually controlled sockets in a single extension lead is a genuinely different product from four separate plugs, and for one specific job it is much better: a television stack, a desk, or a Christmas tree where several things live behind the same piece of furniture. Each socket switches independently by app or voice, the four USB-A ports share a 20 watt output and switch as a group, and it wall-mounts. Apple HomeKit support is included alongside Alexa and Google, and 1,212 ratings at 4.2 stars is reasonable.

Two problems keep it near the bottom. The first is arithmetic with a safety edge: the listing claims \"Total output 3250W MAX\". At Britain's nominal 230 volts, 3,250 watts requires 14.1 amps — and the extension lead's own plug is fused at 13. The figure only works if you assume 250 volts, the absolute top of the permitted supply range rather than the nominal. In practice the fuse in the plug opens before you reach the advertised maximum, so the number describes a condition the product cannot sustain.

The second is the plug type, given twice and differently. Power Plug Type reads \"Type G\", the British three-pin. Two rows below, Plug Type reads \"Type C\", the European two-pin. One of those rows describes what you plug into the wall and the other describes nothing that ships in the box. Meross gets the voltage right at 230, which makes the 3,250 watt claim harder to explain rather than easier.", // TEXTO SEO LONGO
                'pros' => ['Four individually switched sockets in one lead, unique here', 'Four USB-A ports sharing 20W, switched as a group', 'Apple HomeKit as well as Alexa and Google Home', 'Wall-mountable, and 1,212 ratings at 4.2 stars', 'Publishes 230V, the correct UK nominal voltage'], // PONTOS POSITIVOS
                'contras' => ['Claims 3250W total, which needs 14.1A through a 13A fuse at 230V', 'Table gives Power Plug Type as G and Plug Type as C on the same page', '4.2 stars, the lowest average in this comparison', 'USB ports switch only as a group, not individually'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Tapo P110M Matter Smart Plug with Energy Monitoring, 4-Pack',             // NOME (ENCURTADO)
                'price' => '£38.99',                                                                // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 165,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/714D4So474L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tapo P110M Matter smart plug four pack in white',                    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DQL38QCY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A Matter plug whose Matter energy monitoring works with SmartThings and Home Assistant only — not with Apple Home or Google, who help run Matter.', // TEXTO CURTO (CARD)
                'body' => "The first bullet is unusually candid and it is the reason this finishes last. \"For Matter 1.3 Energy Monitoring Supportive, update both your Tapo P110M and Matter Hub to the latest firmware — currently works with SmartThings and Home Assistant only.\" Read that carefully: the energy monitoring, which is the entire premise of the product and the thing its price premium buys, does not function over Matter with Apple Home or Google Home. Those are two of the four platforms that jointly created and govern the Matter standard. Buy this expecting to see consumption data in Apple Home and you will not, and TP-Link deserves credit for saying so on the page rather than in a support article.

Everything else about it is good. Four point seven stars is the joint-highest average in this comparison, though from only 165 ratings — the thinnest sample here by a factor of six. The flame-retardant polycarbonate housing and the automatic shut-off when consumption exceeds a threshold you set are real safety features that no other plug on this page offers, and the threshold cut-off in particular is a sensible protection for a heater left unattended.

At £9.75 per plug it costs more than the standard P110 and delivers less in the platforms most people use, which is an unusual place for a newer model to land. If you run Home Assistant or SmartThings, this is the best plug on this page and the ranking should be reversed for you. If you run Apple Home or Google Home, buy the P110 at number one for £8 a plug and use TP-Link's own app.", // TEXTO SEO LONGO
                'pros' => ['4.7 stars, joint-highest average in this comparison', 'Automatic shut-off when consumption passes a threshold you set', 'Flame-retardant polycarbonate housing', 'The right choice if you run Home Assistant or SmartThings', 'States its Matter limitations openly on the listing'], // PONTOS POSITIVOS
                'contras' => ['Matter energy monitoring works only with SmartThings and Home Assistant', 'No Matter energy data in Apple Home or Google Home', '165 ratings, the thinnest sample here by a factor of six', '£9.75 per plug against £7.99 for the far better proven P110'], // PONTOS NEGATIVOS
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
        $this->command?->info("SmartPlugsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
