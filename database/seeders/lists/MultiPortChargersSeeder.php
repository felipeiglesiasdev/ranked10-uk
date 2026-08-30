<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class MultiPortChargersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE CARREGADORES USB-C MULTI-PORTA DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 30/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=usb+c+charger+multi+port+gan&rh=p_36%3A2000-  (18 ASINS ANALISADOS)
        // CATEGORIA TECH. SAZONAL: PICO EM SETEMBRO (VOLTA AS AULAS) E DEZEMBRO (PRESENTE).
        //
        // PROFUNDIDADE: 778 / 625 / 524 / 435 / 432 / 338 / 337 / 278 / 192 / 172 / 118 / 115.
        //
        // ─── ACHADO PRINCIPAL: O WATT DO TITULO E A SOMA DAS PORTAS ───
        // 1. O NUMERO GRANDE NA CAIXA NAO E O QUE O CARREGADOR ENTREGA DE UMA VEZ. E A SOMA
        //    DO MAXIMO INDIVIDUAL DE CADA PORTA — E **TRES ANUNCIOS IMPRIMEM A CONTA**:
        //      £25.99 "165W": "3 USB-C ports (**40W each**)... 3 USB-A ports (**15W each**)"
        //                     3×40 + 3×15 = 120 + 45 = **165** ✓ A SOMA ESTA NO BULLET
        //      £22.99 "200W": "a **100W** USB-C port... and **five additional 20W/18W**
        //                     USB-C ports"  →  100 + 5×20 = **200** ✓
        //      £35.99 "240W": "The USB-C1 port supports up to **140W** PD3.1 Single-Port
        //                     fast charging **when used alone**"
        //    NENHUM DOS TRES DIZ QUE O TOTAL SAI SIMULTANEAMENTE — PORQUE NAO SAI.
        // 2. E O ANUNCIO DE £22.99 ADMITE O MECANISMO NO BULLET SEGUINTE: O CHIP
        //    "**intelligently distributes power across all ports based on device needs**".
        //    O DE £21.99 CHAMA DE "intelligent power **Sharing**". COMPARTILHAR E
        //    EXATAMENTE O OPOSTO DE ENTREGAR A SOMA.
        // 3. AS MARCAS QUE COBRAM £54.99 DESCREVEM A MESMA ARQUITETURA COM PRECISAO:
        //      ANKER PRIME 200W: "When using **two** USB-C ports **simultaneously**, each
        //                        can provide up to 100W" → 2×100 = 200, O TOTAL ANUNCIADO ✓
        //      UGREEN 200W: "USB-C1/C2/C3 ports support up to 100W... **when used
        //                   individually**" ✓
        //    A DIFERENCA ENTRE £22 E £55 NAO E O NUMERO — E SE A CONDICAO ESTA ESCRITA.
        //
        // ─── ACHADO 2: A TENSAO E A CORRENTE DE SAIDA NAO MULTIPLICAM ───
        // 4. TENSAO × CORRENTE = POTENCIA. CONFERINDO OS CAMPOS DE SAIDA DAS FICHAS:
        //      ANKER 100W ...... 20 V × 5 A = **100 W** ✓ (UNICA QUE FECHA)
        //      BELKIN 70W ...... 20 V × 3,3 A = 66 W ≈ 70 ✓ (FECHA COM ARREDONDAMENTO)
        //      ANKER PRIME ..... "Output **Voltage 200 Volts**" ← O WATT NO CAMPO DE TENSAO
        //      UGREEN 200W ..... "Output **Voltage 100 Volts**" ← IDEM
        //      B0DPK2P1FY 200W . "Output Current **200 Amps**" **E** "Output Voltage
        //                        **200 Volts**" ← O WATT NOS DOIS CAMPOS
        //      B0DQ84VRCZ 365W . "Output Current **73 Amps**" ← 365 ÷ 5 V = 73. E ARITMETICA,
        //                        NAO MEDICAO: NENHUMA PORTA USB ENTREGA 73 A
        //      B0G1Y997P6 165W . 15 V × 3 A = 45 W, CONTRA 165 W ANUNCIADOS
        //    USB-C PD VAI ATE 48 V (EPR) E NORMALMENTE ATE 20 V. "200 VOLTS" E "200 AMPS"
        //    NUM CARREGADOR DE MESA NAO DESCREVEM NADA QUE EXISTA.
        //
        // ─── ACHADO 3: TRES NUMEROS PARA O MESMO PRODUTO ───
        // 5. B07CZZC3TX: O TITULO DIZ **260W**. O PRIMEIRO BULLET ABRE COM "【**26W** 6 PORT
        //    USB-C CHARGING STATION】:260W GaN Charging Station...". A TABELA DIZ
        //    "Wattage **220 watts**". TRES VALORES — 26, 220 E 260 — NA MESMA PAGINA.
        //    E ELE E O UNICO DA BUSCA QUE NEGA EXPLICITAMENTE O COMPARTILHAMENTO:
        //    "supports simultaneous charging for 6 gadgets **without power loss or speed
        //    drop**", O QUE PARA 260 W EXIGIRIA FONTE DE 260 W DE VERDADE.
        // 6. A MESMA FICHA DECLARA "Amperage **12 Amps**" DE ENTRADA. 12 A × 240 V = 2.880 W
        //    PARA ALIMENTAR UM CARREGADOR DE 260 W. E TAMBEM E MAIS QUE O FUSIVEL DE 13 A
        //    DO PLUGUE BRITANICO CONFORTAVELMENTE SUPORTA EM USO CONTINUO.
        //
        // ─── ACHADO 4: PLUGUE ERRADO EM LOJA BRITANICA (TERCEIRA VEZ) ───
        // 7. B0DQ84VRCZ (£21.99, 778 AVALIACOES): "Power Plug Type **Type F - 2 pin
        //    (German & Spanish)**". SCHUKO NAO ENTRA EM TOMADA BRITANICA.
        //    B0FKMNP16P: "Power Plug Type **Type G**" E, LOGO ABAIXO, "Compatible Power
        //    Plug Type **Type C**" — BRITANICO E EUROPEU NA MESMA TABELA.
        //    JA ACHAMOS ISSO NA TAPO P110 ("Schuko") E NA EXTENSAO MEROSS MSS425
        //    ("Type G" + "Type C"). E PADRAO DE CATALOGO, NAO ACIDENTE.
        //
        // ─── ACHADO 5: CONTAGEM DE PORTAS QUE NAO BATE ───
        // 8. B0G1Y997P6: O TITULO DIZ "**6 Ports**", O BULLET DETALHA 3 USB-C + 3 USB-A,
        //    E A TABELA DIZ "Total USB Ports **3**".
        // 9. UGREEN 200W: "Total USB **2.0** Ports 2" NUM CARREGADOR — QUE NAO TRANSFERE
        //    DADO NENHUM. B0FKMNP16P: "Total USB 2.0 Ports 4". CAMPO DE HUB DE DADOS
        //    PREENCHIDO NUMA FICHA DE FONTE DE ALIMENTACAO.
        // 10. BELKIN: "**Input Voltage 20 Volts**" NUM CARREGADOR DE PAREDE. ENTRADA DE
        //    REDE E 100-240 V AC; 20 V E A TENSAO DE **SAIDA**, REPETIDA NO CAMPO ERRADO.
        //
        // ─── ASIN DUPLICADO ───
        // B0FKMNP16P (£21.99) E B0GWZJ9H64 (£22.99): MESMO TITULO "200W 8-Port with LED
        // Display", AS MESMAS 435 AVALIACOES, MESMA NOTA 4.3. MANTIDO O MAIS BARATO.
        //
        // ─── O QUE VALE DIZER A FAVOR DA CATEGORIA ───
        // A BELKIN E A UNICA QUE PUBLICA TEMPO DE CARGA COM APARELHO NOMEADO: "iPhone 16
        // from 0-50% in **27 minutes**" E "MacBook Air from 0-50% in **41 minutes**". E A
        // ANKER DE £39.99 EXPLICA ATE O MODO DE BAIXA CORRENTE ("95W + 5W Low-Current Mode
        // when output remains at or below 5W for 1 minute"), QUE E O DETALHE QUE DECIDE SE
        // O CARREGADOR CONSEGUE CARREGAR UM FONE DE OUVIDO SEM DESLIGAR A PORTA.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: O ASIN DUPLICADO MAIS CARO; OS ANUNCIOS DE "800W" E "600W" (7 E 5
        // AVALIACOES) — NUMEROS AINDA MAIORES E AMOSTRA PEQUENA DEMAIS PARA ENTRAR;
        // TUDO ABAIXO DE 110 AVALIACOES. DENTRO: 115 A 778 AVALIACOES, NOTA 4.1 A 4.8,
        // £21.99 A £54.99, SETE MARCAS.
        //
        // FOCUS KEYWORD: best multi port USB C charger
        // VARIACOES TRABALHADAS: GaN charger / USB C charging station / multi port charger /
        // 100W USB C charger / desktop charger / fast charger plug / PD 3.1 charger /
        // USB charging hub / charger for MacBook and iPhone
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-multi-port-usb-c-charger',                           // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Multi Port USB C Charger 2026: 10 Ranked, and Why 165W Is 40+40+40+15+15+15', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Multi Port USB C Charger 2026: Top 10 Ranked',  // TITLE DA ABA/GOOGLE (50 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best multi port USB C charger options on Amazon and found three listings that print the addition behind their own headline wattage.', // META DESCRIPTION (149 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best multi port USB C charger',                  // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "The wattage on the box is the sum of what every port can do on its own, not what the charger delivers at once — and three of these listings print the addition for you. A £25.99 charger advertised as 165W explains in its own second bullet that it has \"3 USB-C ports (40W each)\" and \"3 USB-A ports (15W each)\": three forties and three fifteens is 165. A £22.99 charger badged 200W describes \"a 100W USB-C port for laptops and five additional 20W/18W USB-C ports\", which is 100 plus five twenties. A £35.99 charger badged 240W says its top port reaches 140W \"when used alone\". None of the three claims the total is simultaneous, and the £22.99 listing gives the game away in the very next bullet, where its chip \"intelligently distributes power across all ports based on device needs\". Distributing is the opposite of adding. Meanwhile Anker and UGREEN, at £54.99, describe exactly the same architecture accurately — Anker states that two USB-C ports can each give 100W simultaneously, which is precisely its advertised 200W, and UGREEN says 100W \"when used individually\". We ranked ten of the best multi port USB C charger options on Amazon in August 2026 on the power they will admit to delivering together, and found one listing declaring an output current of 73 amps.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO NA ABERTURA
            'conclusion' => "Buying the best multi port USB C charger comes down to one question the headline number will not answer: what happens when you plug in the second device. Every charger here shares a single internal supply, so the advertised total is an addition rather than a capability, and the specification that matters is the power available on the port you care about while everything else is connected. Work out what you actually need first — a modern laptop wants 65 to 100W, a phone or tablet 20 to 30W, earbuds and a watch under 10W — add those up honestly, and buy a charger whose stated simultaneous output covers it rather than one whose ports sum to a bigger figure. Two brands here write that condition into their bullets and charge about £55 for the privilege; the rest leave you to infer it. After that, check the output voltage and current fields against the wattage, because volts times amps is watts and only one listing on this page passes that test. Crucially, GaN is worth paying for on size and heat rather than power: gallium nitride switches faster than silicon, so the same output fits in a smaller, cooler brick, which is the difference between a charger that lives in a bag and one that lives on a desk. And check the plug type field, since one 778-review listing here describes a two-pin German Schuko plug on a British storefront.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 22:40:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Anker 100W USB C Charger, 3-Port GaN, Smart Display, Touch Control',      // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£39.99',                                                                // PRECO (COLETADO EM 30/08/2026)
                'rating' => 4.8,                                                                    // NOTA
                'reviews_count' => 524,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Oc5ZPHiaL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best multi port USB C charger',                                      // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FL2DR4TH?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing here whose output voltage and current multiply to its rated wattage: 20V times 5A is 100W. Highest rating in the comparison at 4.8.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Volts times amps is watts, and this is the only charger on the page where that sum works. The specification table gives an output voltage of 20 volts and an output current of 5 amps, which multiply to exactly the 100 watts on the label. Every other listing here has typed the wattage into the voltage field, or the current field, or both — one declares an output of 200 amps — so a charger whose three published figures agree with each other is doing something genuinely rare rather than something basic.

The bullets are equally careful. Anker states 100 watts \"on any USB-C port\" rather than on a specific one, and explains the low-current behaviour that decides whether the thing can charge earbuds: after a minute at or below 5 watts, a port drops into a 95W + 5W mode so small devices are not being pushed at laptop voltages. That is the detail that stops a charger cutting out on a pair of AirPods, and nobody else here mentions it.

Four point eight stars is the highest average in this comparison, from 524 ratings. At 69 by 55 by 34 millimetres with a folding plug it is genuinely pocketable, and the display showing live temperature and per-port output is useful rather than decorative. The honest limitation is scope: 100 watts across three ports is a laptop and a phone, or three phones — not a desk of six devices. If you need six, the Anker Prime at number two is the same company's answer and costs £15 more.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['The only listing here whose 20V x 5A output fields multiply to its 100W rating', 'States 100W on any USB-C port, not just one privileged port', 'Explains its 95W + 5W low-current mode for earbuds and watches', '4.8 stars, the highest average in this comparison', 'Folding plug and a 69 x 55 x 34mm body that fits a coat pocket'], // PONTOS POSITIVOS
                'contras' => ['100W total is a laptop plus a phone, not a six-device desk', 'Three ports where rivals at this price offer six or eight', '£39.99 is dear per port against the £21.99 stations here', 'No USB-A port for older cables'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Anker Prime 200W 6-Port GaN Charging Station, Dual 100W USB-C',           // NOME (ENCURTADO)
                'price' => '£54.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 625,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/712oJFMAcLL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Anker Prime 200W six port GaN charging station on a desk',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D59JNQ9F?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'States that two USB-C ports each deliver 100W at the same time — 2 x 100 is exactly its advertised 200W, which almost nothing else here can say.', // TEXTO CURTO (CARD)
                'body' => "\"When using two USB-C ports simultaneously, each can provide up to 100W of power.\" That sentence is why this ranks second and why it costs £54.99 rather than £22.99. Two hundred watts is the advertised total, and Anker names the exact configuration in which you receive all of it: two laptops, two hundred watts, at once. Charge two 14-inch MacBook Pros to half in 28 minutes, as the listing puts it. Every unbranded 200W station on this page reaches the same number by adding up six ports that cannot run together.

Six hundred and twenty-five ratings at 4.6 stars is the second deepest sample here. The build is a 563 gram desktop block with a proper AC cord rather than a wall wart, MultiProtect and ActiveShield 3.0 temperature monitoring, and a 24-month warranty — double the 12 months most of this category offers and six months longer than Anker's own smaller charger.

One field lets it down and it is the same one that trips almost everyone here: Output Voltage reads \"200 Volts\". Two hundred volts is the wattage pasted into the voltage box; USB-C Power Delivery runs at 5, 9, 15, 20 and, in extended range, up to 48 volts, and a 200 volt output would be a mains supply rather than a charger. Anker gets the physics right in the sentences a buyer reads and wrong in the field a filter reads, which is the pattern across this entire page.", // TEXTO SEO LONGO
                'pros' => ['States that two USB-C ports deliver 100W each simultaneously', 'Its advertised 200W is genuinely achievable in a named configuration', '625 ratings at 4.6, the second deepest sample in this comparison', '24-month warranty, double most of this category', 'Proper desktop block with an AC cord and active temperature monitoring'], // PONTOS POSITIVOS
                'contras' => ['Output Voltage field reads "200 Volts", the wattage in the wrong box', '£54.99, the joint most expensive charger here', '563g and mains-corded, so it is a desk fixture not a travel charger', 'Only two of its six ports reach 100W'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'UGREEN 200W 8-Port USB C GaN Charging Station with Stand',                // NOME (ENCURTADO)
                'price' => '£54.99',                                                                // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 338,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51PpIM8WXVL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'UGREEN 200W eight port USB C GaN charging station with stand',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DL5FT193?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Eight ports and 200W, with the crucial three words attached: its 100W ports do 100W "when used individually".', // TEXTO CURTO (CARD)
                'body' => "Three words rescue this listing from the category's central problem. UGREEN says the USB-C1, C2 and C3 ports \"support up to 100W of high-efficiency ultra-fast charging when used individually\". Not when used together — individually. It is the honest version of the sentence the £22.99 stations decline to write, and it lets you plan: one laptop at full speed, or several devices sharing the same 200 watt budget between them.

Eight ports — six USB-C and two USB-A — is the highest count in this comparison, and the included stand keeps the block upright so the cables leave from one edge rather than sprawling. Three hundred and thirty-eight ratings at 4.7 stars is the second-highest average here, and GaNInfinity is UGREEN's own gallium nitride implementation with the usual overheat, overcharge and short-circuit protection. It charges a 16-inch MacBook Pro from flat to 41% in half an hour on a single port.

Two fields miss. Output Voltage reads \"100 Volts\", which is the port wattage in the voltage box — the identical error Anker makes one place above, with a different number. And the table lists \"Total USB 2.0 Ports: 2\", which is a data-hub field on a device that transfers no data at all; the same field appears on two other listings here. Wattage is given as \"200\" with no unit. At £54.99 this and the Anker Prime are the joint dearest chargers on the page, and between them the choice is eight ports against a longer warranty.", // TEXTO SEO LONGO
                'pros' => ['Says 100W applies "when used individually", the honest qualifier', 'Eight ports, the highest count in this comparison', '4.7 stars from 338 ratings, second-best average here', 'Included stand keeps cables leaving from one edge', 'Charges a 16-inch MacBook Pro to 41% in 30 minutes on one port'], // PONTOS POSITIVOS
                'contras' => ['Output Voltage field reads "100 Volts", the port wattage in the wrong box', 'Lists "Total USB 2.0 Ports: 2" on a device that carries no data', 'Wattage given as "200" with no unit', '£54.99, joint most expensive here, and not portable'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Belkin BoostCharge Pro 70W 3-Port GaN USB C Charger with Travel Adapters', // NOME (ENCURTADO)
                'price' => '£35.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 337,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51jLqjbZu9L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Belkin BoostCharge Pro 70W three port GaN charger with travel kit',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FK587ZZ6?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing here that publishes charge times with named devices — iPhone 16 to 50% in 27 minutes, MacBook Air in 41.', // TEXTO CURTO (CARD)
                'body' => "Every charger on this page advertises speed and one publishes it. Belkin states that this takes an iPhone 16 from flat to 50% in 27 minutes and a MacBook Air from flat to 50% in 41 minutes — named devices, stated percentages, stated times. That is a claim you can hold the product to, which is a different thing from a wattage you cannot check, and it is the reason a 70 watt charger ranks above several 200 watt ones here.

Seventy watts across two USB-C ports and one USB-A is modest by this page's standards and honest by any. It supports USB-C PD 3.1 and PPS, which is the protocol Samsung phones need for their fastest charging and which several bigger-numbered rivals here do not mention. The travel adapter kit in the box is the practical differentiator: this is a charger designed to leave the country with you, and at £35.99 that is a fair price for a Belkin.

The output fields nearly work: 20 volts times 3.3 amps is 66 watts against a 70 watt rating, which is within rounding. The input field does not — Input Voltage reads \"20 Volts\", and a wall charger takes 100 to 240 volts of AC from the socket. Twenty volts is its output, entered a second time in the wrong row. Three hundred and thirty-seven ratings at 4.4 stars is the lowest average of the branded chargers here, and 70 watts will charge a MacBook Air properly but will not keep a 16-inch Pro topped up under load.", // TEXTO SEO LONGO
                'pros' => ['The only listing here with charge times for named devices', 'Output fields nearly reconcile: 20V x 3.3A against a 70W rating', 'PD 3.1 and PPS support, which Samsung phones need for full speed', 'Travel adapter kit included, so it works abroad', 'Belkin warranty and UK support'], // PONTOS POSITIVOS
                'contras' => ['Input Voltage field reads "20 Volts" for a 100-240V AC wall charger', '70W will not sustain a 16-inch MacBook Pro under load', '4.4 stars, the lowest average of the branded chargers here', 'Three ports at £35.99 against six for £22.99 elsewhere'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Sefitopher 240W 6-Port USB C Charging Station, PD 3.1 140W Single Port',  // NOME (ENCURTADO)
                'price' => '£35.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 115,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61DnR6+4tyL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Sefitopher 240W six port USB C charging station in black',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GSZL143J?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only unbranded station here that writes the condition down: 140W on its top port "when used alone".', // TEXTO CURTO (CARD)
                'body' => "Among the seven unbranded chargers in this search, this is the one that tells you the truth about its own headline. The second bullet reads: \"The USB-C1 port supports up to 140W PD3.1 Single-Port fast charging when used alone.\" Single-port, when used alone. Those five words are what separate a specification from a slogan, and they mean you know exactly what you are buying: 140 watts for one demanding laptop, or 240 watts nominally spread across six devices that will each get a fraction.

One hundred and forty watts of PD 3.1 is also genuinely useful and rare. Most chargers on this page top out at 100 watts, which is the old PD 3.0 ceiling; 140 watts is what a 16-inch MacBook Pro or a gaming laptop actually wants, and it is the reason to consider this over the Anker Prime at £19 more. The first bullet lists the port ladder — 140W, 65W, 45W, 20W and 10W — so you can see how the budget is carved up rather than guessing.

At 186 grams for six ports it is light for a desktop station. The reservations are evidence and brand: 115 ratings is the thinnest sample in this comparison, Sefitopher has no service history in the UK, and the specification table publishes no wattage, no voltage and no current at all — the port figures exist only in the bullets, so an Amazon filter search would find nothing to compare. Four point four stars is respectable but early.", // TEXTO SEO LONGO
                'pros' => ['States 140W applies "when used alone", the honest qualifier', '140W PD 3.1 is enough for a 16-inch MacBook Pro or gaming laptop', 'Publishes the full port ladder: 140W, 65W, 45W, 20W and 10W', 'Only 186g for a six-port station', 'Cheaper than the Anker Prime by £19 with a higher peak port'], // PONTOS POSITIVOS
                'contras' => ['115 ratings, the thinnest sample in this comparison', 'Spec table publishes no wattage, voltage or current at all', 'No UK service history behind the brand', '240W total is still the sum of six ports, not a simultaneous figure'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => '165W 6-Port USB-C Charging Station, 3x 40W USB-C + 3x 15W USB-A',         // NOME (ENCURTADO)
                'price' => '£25.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 172,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/5161xnHcZUL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Six port 165W USB-C charging station for home and travel',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G1Y997P6?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The listing that shows the whole category its own working: three ports at 40W plus three at 15W is exactly the 165W in the title.', // TEXTO CURTO (CARD)
                'body' => "This listing is the clearest illustration in the search of how the headline number is built, and it is entirely unintentional. The first bullet promises \"a total power of 165W\". The second bullet then itemises the hardware: \"3 USB-C ports (40W each)\" and \"3 USB-A ports (15W each)\". Three forties is 120, three fifteens is 45, and 120 plus 45 is 165. The number in the product title is the arithmetic sum of six ports running flat out simultaneously — which is precisely what a shared internal supply cannot do, and what the fourth bullet quietly concedes when it describes a \"smart chip\" that \"automatically detects and optimizes the charging power for each device\".

Being able to see the sum is actually useful, and it is why this ranks above the listings that hide it. Forty watts per USB-C port is the real number to buy on: enough for a phone, a tablet, a Nintendo Switch or a MacBook Air at reduced speed, and not enough for a working laptop. If your desk is four phones and a tablet, £25.99 for six ports is good value and the 40 watt ceiling will never bother you.

The specification table is a mess. Total USB Ports reads 3 on a charger the title sells as six ports. Output Voltage reads 15 volts and Output Current 3 amps, which multiply to 45 watts rather than 165. And at 120 grams it is genuinely light. One hundred and seventy-two ratings at 4.5 stars is a decent average on a thin sample.", // TEXTO SEO LONGO
                'pros' => ['Publishes the per-port breakdown, so you can see the real 40W ceiling', '£25.99 for six ports is strong value for a phone-and-tablet desk', '40W per USB-C port handles phones, tablets and a Switch comfortably', '4.5 stars from 172 ratings', 'Very light at 120g'], // PONTOS POSITIVOS
                'contras' => ['Its 165W headline is 3x40 plus 3x15, added up from its own bullet', 'Spec table says "Total USB Ports 3" on a six-port charger', 'Output fields give 15V x 3A, which is 45W not 165W', '40W maximum per port will not run a working laptop'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'YSYFAD 200W 8-Port USB C Charging Station with LED Display, GaN',         // NOME (ENCURTADO)
                'price' => '£21.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 435,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51Ckt8CwHRL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'YSYFAD 200W eight port USB charging station with LED display',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FKMNP16P?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Eight ports and an LED display for £21.99 — with a table listing a British plug and a European plug for the same product.', // TEXTO CURTO (CARD)
                'body' => "Twenty-one pounds ninety-nine for eight ports with a live LED readout of current and voltage is the cheapest way onto this page, and 435 ratings at 4.3 stars means enough people have bought it for the average to mean something. Four USB-C PD ports and four USB-A QC 3.0 ports covers a household's worth of cables, PPS support is present for Samsung devices, and the 1.2 metre detachable mains lead means the block can sit behind a monitor rather than hanging off a wall socket.

The wattage is described more carefully than most: \"combined total of 200W\", which at least uses the word combined. It is still an addition rather than a simultaneous figure, and the listing never says what any individual port delivers, so you cannot work out whether your laptop will get 100 watts or 20.

Two table fields contradict each other on the most basic question of all. Power Plug Type reads \"Type G\" — the British three-pin — and two rows below, Compatible Power Plug Type reads \"Type C\", the European two-pin that will not fit a UK socket. One of them describes what arrives in the box and the other describes nothing you can use here. The same table also lists \"Total USB 2.0 Ports: 4\" on a charger that carries no data. Note too that this exact product is sold under a second ASIN at £22.99 with the same 435 ratings and the same 4.3 average; we have linked the cheaper one.", // TEXTO SEO LONGO
                'pros' => ['Eight ports with a live LED current and voltage display for £21.99', '435 ratings at 4.3 stars, a reasonable sample at this price', 'Uses the word "combined" for its total, which most rivals avoid', 'PPS support and a 1.2m detachable mains lead'], // PONTOS POSITIVOS
                'contras' => ['Table gives Power Plug Type G and Compatible Power Plug Type C', 'Never states what any individual port actually delivers', 'Lists "Total USB 2.0 Ports: 4" on a device that carries no data', 'Sold under a second ASIN at £22.99 with the same 435 ratings'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => '200W 6-Port USB C Charging Station, PD 100W 65W 45W 20W 18W, GaN III',    // NOME (ENCURTADO)
                'price' => '£22.99',                                                                // PRECO
                'rating' => 4.1,                                                                    // NOTA
                'reviews_count' => 432,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61xXJuG2E3L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Six port 200W GaN III USB C charging station with detachable plug',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DPK2P1FY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Prints its own sum — one 100W port plus five 20W ports — and then declares an output current of 200 amps.', // TEXTO CURTO (CARD)
                'body' => "The first bullet does the addition in front of you: \"a 100W USB-C port for laptops (compatible with PPS 45W fast charging) and five additional 20W/18W USB-C ports\". One hundred plus five twenties is two hundred, and there is the number in the title. The third bullet then explains the mechanism that makes the sum impossible, describing a chip that \"intelligently distributes power across all ports based on device needs\". A charger cannot both distribute a fixed budget and deliver every port's maximum at once, and this listing says it does both, two bullets apart.

Underneath the arithmetic there is a usable product. A genuine 100 watt port will run a MacBook Pro, five 20 watt ports will fast-charge phones and tablets, PPS support covers Samsung, and 208 grams with a detachable 1.5 metre lead makes it portable enough for a bag. At £22.99 with 432 ratings it is the cheapest route to a real 100 watt laptop port on this page.

The specification table produces the two most impossible fields in this collection. Output Current reads \"200 Amps\" and Output Voltage reads \"200 Volts\" — the wattage entered into both, giving a device that supposedly delivers 200 amps from a socket fused at 13, at a voltage nearly ten times what USB-C Power Delivery permits. Four point one stars is the joint-lowest average in this comparison, and the recurring complaint in critical reviews is exactly what the arithmetic predicts: the ports slow down when several are in use.", // TEXTO SEO LONGO
                'pros' => ['A genuine 100W port for a laptop at the cheapest price on this page', 'Publishes the full port ladder so you can see what each one gives', 'PPS support for Samsung fast charging', '208g with a detachable 1.5m lead, portable for a bag', '432 ratings at £22.99'], // PONTOS POSITIVOS
                'contras' => ['Output Current reads "200 Amps" and Output Voltage "200 Volts"', 'Advertises the sum of its ports while describing a chip that shares power', '4.1 stars, joint-lowest average here, with reviews citing slowdowns', 'Five of the six ports are capped at 20W'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => '365W 6-Port USB C Charger with LED Display, 4x USB-C + 2x USB-A',         // NOME (ENCURTADO)
                'price' => '£21.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 778,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61X8K-CxuxL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Six port 365W USB C charger with LED display and adjustable brightness', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DQ84VRCZ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The largest wattage claim in the search, on the listing that declares an output current of 73 amps — which is 365 divided by five.', // TEXTO CURTO (CARD)
                'body' => "Three hundred and sixty-five watts is the biggest number on this page and it belongs to the second cheapest product. The listing describes it as a \"combined total of 365W of power and intelligent power Sharing up to 6 devices\", which contains its own contradiction: sharing is what a supply does when it cannot meet the sum of demands. The real specification is in the next clause — 100 watts from the first, second or third USB-C port — so this is a 100 watt charger with five more sockets attached.

Then the specification table produces the single most revealing field of this collection. Output Current reads \"73 Amps\". Three hundred and sixty-five divided by five is 73, so somebody has taken the fictional total wattage, divided it by USB's legacy 5 volt rail, and entered the result as a measured current. No USB port delivers 73 amps; the connector is rated at 5 amps and would vaporise long before. It is not a lie so much as a calculation performed on a number that was never real.

Seven hundred and seventy-eight ratings at 4.3 stars is the deepest sample in this comparison, which tells you the hardware works well enough as a 100 watt charger with a nice display. The plug field is the last problem: Power Plug Type reads \"Type F - 2 pin (German & Spanish)\", the round Schuko connector that does not fit a British socket. We have now found the wrong plug type declared on a UK listing three times across this project, on a Tapo smart plug, a Meross extension lead and here.", // TEXTO SEO LONGO
                'pros' => ['778 ratings, the deepest sample in this comparison', '100W available from any of the first three USB-C ports', 'High-resolution LED display shows current, voltage and power per port', 'Cheapest six-port station here at £21.99 with a detachable lead'], // PONTOS POSITIVOS
                'contras' => ['Output Current field reads "73 Amps", which is 365W divided by 5V', '365W is a sum the listing itself calls "power Sharing"', 'Power Plug Type declared as a German Schuko two-pin on a UK listing', 'Input rated at 3.33A, which at 240V is more than twice what 365W needs'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => '260W GaN Charging Station, 6-Port USB-C, Compact Desktop Charger',        // NOME (ENCURTADO)
                'price' => '£26.99',                                                                // PRECO
                'rating' => 4.1,                                                                    // NOTA
                'reviews_count' => 278,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61h8Yg10FIL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Compact 260W six port GaN desktop charging station with UK plug',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07CZZC3TX?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Publishes three different wattages for itself — 26W in the bullet header, 260W in the title, 220W in the table — and denies that its ports share power at all.', // TEXTO CURTO (CARD)
                'body' => "The product title says 260W. The specification table says \"Wattage 220 watts\". And the first bullet opens with the header \"【26W 6 PORT USB-C CHARGING STATION】\" before continuing \"260W GaN Charging Station features 6 independent USB-C ports\". Twenty-six, two hundred and twenty, and two hundred and sixty, for one product, on one page. Whichever is right, two of them are not, and there is nothing on the listing to tell you which.

More striking is what it claims about simultaneous use. Alone among the ten, this listing explicitly denies power sharing: it \"supports simultaneous charging for 6 gadgets without power loss or speed drop\". Every other charger here either says the total is combined, or names the condition under which a port reaches its maximum, or quietly describes a chip that redistributes power. This one promises all six ports at full output at once, which for a 260 watt device would require a genuine 260 watt supply in a £26.99 compact block.

The input figures do not support it. Amperage and Current Rating both read 12 amps, and 12 amps at 240 volts is 2,880 watts — eleven times the output it claims, and close to the limit of the 13 amp fuse in a British plug. The bullets are otherwise reasonable: a standard UK plug is included, heat dissipation is discussed sensibly, and 278 ratings at 4.1 stars suggests it functions. It finishes last because it is the only listing here that makes a promise none of its own numbers support.", // TEXTO SEO LONGO
                'pros' => ['Six independent USB-C ports with a standard UK plug fitted', 'Sensible discussion of heat dissipation and long-load operation', '278 ratings at 4.1 stars', 'Compact desktop block that replaces several single chargers'], // PONTOS POSITIVOS
                'contras' => ['Publishes 26W, 220W and 260W for itself on the same page', 'The only listing here claiming six ports at full output with no speed drop', 'Input rated 12A, which at 240V is 2,880W for a 260W charger', '4.1 stars, joint-lowest average in this comparison'], // PONTOS NEGATIVOS
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
        $this->command?->info("MultiPortChargersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
