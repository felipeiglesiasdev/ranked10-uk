<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class UsbCDockingStationsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE DOCKING STATIONS USB-C DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=usb+c+docking+station&rh=p_36%3A3000-  (21 ASINS ANALISADOS)
        // CATEGORIA HOME & OFFICE. SAZONAL: PICO EM SETEMBRO (VOLTA AO ESCRITORIO/UNI).
        //
        // PROFUNDIDADE: 37.028 / 3.058 / 968 / 801 / 324 / 288 / 233 / 160 / 159 / 114.
        //
        // ─── ACHADO PRINCIPAL: "DUAL 4K@60Hz" TEM UMA CONDICAO, E DOIS ANUNCIOS A DIZEM ──
        // 1. A CONTA DE BANDA E FECHADA E DA PARA CONFERIR:
        //    UM PAINEL 4K (3840×2160) A 60 Hz COM COR DE 8 BITS PEDE
        //    3840 × 2160 × 60 × 24 bits ≈ 11,9 Gbps DE PIXEL, OU ~12,5 Gbps COM OS
        //    INTERVALOS DE SINCRONISMO. **DOIS PAINEIS PEDEM ~25 Gbps.**
        //    O QUE O CABO OFERECE, EM DP ALT MODE:
        //      4 PISTAS HBR3 = 4 × 8,1 = 32,4 Gbps BRUTOS → **25,9 Gbps UTEIS**
        //        (DA PARA DOIS — MAS AI NAO SOBRA PISTA NENHUMA PARA DADO USB)
        //      2 PISTAS HBR3 = 16,2 Gbps BRUTOS → **12,96 Gbps UTEIS**
        //        (DA PARA **UM** 4K@60, E E ESSA A CONFIGURACAO DE QUALQUER DOCK QUE
        //         TAMBEM ENTREGUE PORTA USB DE 10 Gbps — QUE E O CASO DE TODAS AQUI)
        //    LOGO: DOIS MONITORES 4K A 60 Hz **E POR UM CABO SO** EXIGEM COMPRESSAO DSC
        //    NO LADO DO NOTEBOOK. SEM DSC, OU CAI PARA 30 Hz, OU CAI A RESOLUCAO.
        // 2. QUEM DIZ A CONDICAO:
        //    ANKER NANO ... "Enables up to dual 4K@60 Hz **when the host device's USB-C
        //                   port supports DP 1.4 with DSC 3:1**"  ← EXATO
        //    WAVLINK ...... "(under DP1.4 & DSC1.2)... Please confirm if your computer
        //                   supports DP1.4 & DSC1.2. **If not, the resolution will be
        //                   reduced**"  ← EXATO, E COM A CONSEQUENCIA
        //    ANKER 8-IN-1 . NAO PROMETE: "4K@30Hz on two displays **or** 4K@60Hz on a
        //                   single screen" ← A VERDADE SEGURA, E E O ANUNCIO COM 37.028
        //                   AVALIACOES DA BUSCA
        //    OS OUTROS SETE: "Dual 4K@60Hz" SECO, SEM CONDICAO NENHUMA.
        //
        // ─── ACHADO 2: macOS NAO FAZ MST, E TEM DOCK VENDIDA "FOR MACBOOK" COM MST ───
        // 3. macOS NUNCA SUPORTOU MST (MULTI-STREAM TRANSPORT). NUM MAC, ESTES DOCKS
        //    ESPELHAM OS DOIS MONITORES EM VEZ DE ESTENDER. TRES ANUNCIOS AVISAM:
        //      UGREEN 12-IN-1 .. "For macOS, the display on all external monitors will be
        //                        identical"
        //      UGREEN 7-IN-1 ... "If you are using a MacBook... we do not recommend this
        //                        docking station"
        //      ANKER NANO ...... "On macOS, both external monitors will display identical
        //                        content"
        //      WAVLINK ......... "Not compatible with MAC-OS products" (DUAS VEZES)
        // 4. 🔴 A NOVOO RM11 FAZ O OPOSTO: O TITULO DIZ "USB C Dock **for MacBook** and
        //    Other USBC Laptops" E O BULLET DIZ "the **MST function** gives you...".
        //    ELA VENDE PARA MAC O RECURSO QUE O MAC NAO TEM. E A CONTRADICAO MAIS DIRETA
        //    DA CATEGORIA — E ELA TEM 3.7 DE NOTA, A SEGUNDA PIOR DA LISTA.
        //
        // ─── ACHADO 3: A ANKER ERRA A UNIDADE NO PROPRIO CAMPO ───
        // 5. ANKER 8-IN-1 (37.028 AVALIACOES): "Data Transfer Rate **5120 Megabytes Per
        //    Second**". 5.120 MB/s SAO 40,96 Gbps — VELOCIDADE DE THUNDERBOLT 4 NUM HUB
        //    USB 3.0. O NUMERO CERTO E 5.120 **MEGABITS** POR SEGUNDO (= 5 Gbps, QUE E
        //    EXATAMENTE USB 3.0). ERRO DE FATOR 8, NO CAMPO DE VELOCIDADE.
        //    A ANKER NANO, DA MESMA MARCA, PREENCHE CERTO: "10 Gigabits Per Second".
        // 6. NOVOO RM11: "Data Transfer Rate **1 Gigabits Per Second**" — QUE E A
        //    VELOCIDADE DA PORTA ETHERNET, COLADA NO CAMPO DE TRANSFERENCIA DE DADOS.
        //
        // ─── ACHADO 4: LISTA DE PYTHON CRUA NA FICHA DA HP ───
        // 7. HP USB-C 120W DOCK G5 (£124.99): "Compatible Devices **['HP Laptops',
        //    'MacBook Computers', 'Other Notebooks']**" — COLCHETES E ASPAS SIMPLES, UMA
        //    LISTA DE CODIGO NAO SERIALIZADA, NA FICHA DE UM DOCK CORPORATIVO DE £125.
        //    E O MESMO ANUNCIO DIZ "Total USB Ports 5" E "**Number of Ports 2**".
        //
        // ─── ACHADO 5: SUPERLATIVO SEM DATA E SEM COMPARADOR NA DELL DE £154.99 ───
        // 8. DELL WD19S: "Boost your PC's power with ExpressCharge on the **World's most
        //    powerful USB-C dock**" E "the **World's first** modular dock". SEM ANO, SEM
        //    MODELO COMPARADO, SEM FONTE. E OS QUATRO BULLETS INTEIROS NAO TRAZEM UMA
        //    RESOLUCAO, UMA TAXA DE ATUALIZACAO NEM O NUMERO DE TELAS SUPORTADAS.
        //    ALEM DISSO O TITULO DIZ 130W E A TABELA DIZ "Wattage **90 watts**", E A
        //    MESMA TABELA DIZ "Total USB Ports 6" COM "Number of Ports 5".
        //
        // ─── ACHADO 6: A DELL D6000 RESOLVE O PROBLEMA POR OUTRO CAMINHO ───
        // 9. A D6000 USA **DISPLAYLINK**, QUE COMPRIME VIDEO EM SOFTWARE E MANDA COMO DADO
        //    USB. POR ISSO ELA CONSEGUE TRES TELAS 4K NUM LINK DE 5 Gbps E FUNCIONA EM
        //    macOS, ONDE MST NAO EXISTE. O PRECO E DRIVER OBRIGATORIO, CARGA DE CPU E
        //    ENGASGO EM VIDEO — E A NOTA 3.8 EM 288 AVALIACOES REFLETE ISSO. E A UNICA
        //    SOLUCAO TECNICAMENTE HONESTA PARA MAC COM VARIAS TELAS DIFERENTES.
        //
        // ─── ACHADO 7: CAMPO DE FICHA COM LIXO, EM SEIS DAS DEZ ───
        // 10. WAVLINK: "Hardware Interface **USB 2.0**" E "Minimum Required Operating
        //    System Version **Windows 7**" NUM DOCK USB-C DE 100W COM DP 1.4.
        //    NOVOO: "Colour **11 in 1**". UGREEN 12-IN-1: "Compatible Devices: MacBook,
        //    Dell, HP" COM "Minimum Required OS: **Windows 10, Windows 11**" — A FICHA
        //    LISTA MACBOOK COMO COMPATIVEL E EXIGE WINDOWS NA LINHA SEGUINTE.
        // 11. HP: "takes up only **5 x 5 inches** of space" — POLEGADA EM LOJA BRITANICA
        //    (A TABELA CONFIRMA 12,2 × 12,2 cm, QUE CONFERE).
        //
        // ─── SINAL DE NOTA BAIXA COM AMOSTRA GRANDE ───
        // UGREEN 14-IN-1 (£69.99): **3.6 DE NOTA EM 801 AVALIACOES**. E A PIOR COMBINACAO
        // DE NOTA E AMOSTRA DE TODAS AS CATEGORIAS COLETADAS ATE AGORA, E O ANUNCIO E O
        // UNICO DA UGREEN QUE NAO DECLARA SUPORTE A macOS.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: DOCKS THUNDERBOLT ACIMA DE £200; ADAPTADORES SIMPLES SEM PD; TUDO ABAIXO
        // DE 100 AVALIACOES. DENTRO: 114 A 37.028 AVALIACOES, NOTA 3.6 A 4.5, £23.09 A
        // £154.99, SEIS MARCAS.
        //
        // FOCUS KEYWORD: best USB C docking station
        // VARIACOES TRABALHADAS: USB C hub / laptop docking station / dual monitor dock /
        // triple display docking station / USB C dock for MacBook / DisplayLink dock /
        // 100W PD docking station / docking station dual HDMI / dual 4K docking station
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home-office',                // SLUG DA CATEGORIA (URL)
            'name' => 'Home & Office',              // NOME EXIBIDO
            'description' => 'Kit to make working from home more comfortable and productive, ranked for UK buyers.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-usb-c-docking-station',                              // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best USB C Docking Station 2026: 10 Ranked, and Why Dual 4K60 Has a Condition', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best USB C Docking Station 2026: Top 10 Ranked',     // TITLE DA ABA/GOOGLE (47 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best USB C docking station options on Amazon against the bandwidth a single cable actually carries, from £23.09 to £154.99.', // META DESCRIPTION (140 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best USB C docking station',                     // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Two 4K monitors at 60Hz need about 25 gigabits per second between them, and that is the number the whole category turns on. A 4K panel at 60Hz with 8-bit colour carries roughly 12.5 Gbps once you count the sync intervals, so two of them is 25. A USB-C cable running DisplayPort Alt Mode on all four lanes delivers 25.9 Gbps of usable bandwidth — just enough, except that a dock using all four lanes for video has none left for the 10 Gbps USB ports every listing here advertises. Split it the normal way, two lanes for video and two for data, and you get 12.96 Gbps: enough for exactly one 4K display at 60Hz. So dual 4K60 down a single cable requires DSC compression on the laptop, and two listings say so. Anker's Nano states it precisely — \"when the host device's USB-C port supports DP 1.4 with DSC 3:1\" — and WAVLINK adds what happens otherwise: \"if not, the resolution will be reduced\". Meanwhile Anker's other dock, the one with 37,028 ratings, simply declines to claim it and offers \"4K@30Hz on two displays or 4K@60Hz on a single screen\", which is the safe truth. The other seven print \"Dual 4K@60Hz\" with no condition attached. We ranked ten of the best USB C docking station options on Amazon in August 2026 on what the cable can carry, and flagged the one sold for MacBooks whose stated mechanism macOS has never supported.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO NA ABERTURA
            'conclusion' => "Choosing the best USB C docking station starts with a question about your laptop rather than the dock: does its USB-C port support DisplayPort 1.4 with DSC? If it does, dual 4K at 60Hz down one cable is real. If it does not — and many machines two or three years old do not — then the same dock gives you two screens at 30Hz, which is fine for spreadsheets and unpleasant for moving a mouse. Crucially, if you use a Mac, the answer changes entirely: macOS does not support MST, so a standard dock will mirror your two monitors rather than extend them no matter what the box says, and the only way around it is a DisplayLink dock like the Dell, which compresses video in software at the cost of drivers and some stutter. After that, three things matter and none of them is the port count in the product name. Power delivery first: a 100W dock reserves about 15W for itself, so your laptop sees 85W, and a 65W dock will slowly lose ground against a workstation under load. Data speed second, where 10 Gbps ports are worth the premium over 5. And build third, because an aluminium body dissipates the heat these things genuinely generate. By contrast, treat every unconditional dual 4K60 claim as a claim about a laptop the seller has never seen.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 21:15:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Anker PowerExpand 8-in-1 USB-C Dock, Dual HDMI, Ethernet, 85W PD',        // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£34.99',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 37028,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71S-NPBF-qL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best USB C docking station',                                         // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0874M3KW4?tag=ranked10-21',       // LINK AFILIADO
                'summary' => '37,028 ratings, and the only dock here that declines to claim dual 4K at 60Hz — because over this connection it is not possible.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Thirty-seven thousand and twenty-eight ratings at 4.5 stars is the deepest evidence in this comparison by a factor of twelve, and the first bullet explains why this is the best USB C docking station to buy without checking anything first. It promises \"4K@30Hz on two displays or a stunning 4K@60Hz on a single screen\". That is the physically correct statement for a dock that also gives you Ethernet, two USB-A ports and a card reader: those functions need lanes, and the lanes left over carry one 4K60 signal or two at 30Hz. Anker could have printed \"Dual 4K@60Hz\" like seven rivals here and relied on nobody checking. It did not.

The rest is unremarkable in the good way. Eighty-five watts of pass-through charging from a 100W supply, gigabit Ethernet, microSD and SD, an aluminium body that spreads the heat these chips produce, and an 18-month warranty. It is a hub rather than a desk dock — no external power brick, nothing to mount — which is why it works as a laptop bag item as much as a desk fixture.

The one blemish is in the specification table, and it is a unit error of the kind that runs through this whole category: Data Transfer Rate reads \"5120 Megabytes Per Second\". Five thousand one hundred and twenty megabytes per second is 40.96 gigabits, which is Thunderbolt 4 territory and not what this is. The intended figure is 5,120 megabits — 5 Gbps, exactly USB 3.0. A factor of eight, in the field describing speed, on Anker's most-reviewed product. Anker's own Nano dock at number two fills the same field in correctly.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['37,028 ratings at 4.5, twelve times the depth of anything else here', 'States 4K@30Hz for dual and 4K@60Hz for single, which is the truth', '85W pass-through charging from a 100W supply', 'Aluminium body that actually dissipates heat', 'Gigabit Ethernet plus SD and microSD for £34.99'], // PONTOS POSITIVOS
                'contras' => ['Data Transfer Rate field says 5120 MB/s, eight times the real 5 Gbps', 'Dual displays run at 30Hz, which is uncomfortable for mouse movement', 'USB-A ports are 5 Gbps where rivals here offer 10', 'No external power brick, so it draws everything from the laptop'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Anker Nano 8-in-1 USB-C Docking Station, Dual 4K@60Hz, 10Gbps, 85W',      // NOME (ENCURTADO)
                'price' => '£28.49',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 233,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71tEVIoa2UL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Anker Nano 8-in-1 USB C docking station in grey aluminium',          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GWH4ZZ7T?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most precisely worded listing in the category: it names the exact laptop capability its dual 4K@60Hz claim depends on, then names the macOS limit too.', // TEXTO CURTO (CARD)
                'body' => "One sentence earns this place: \"Enables up to dual 4K@60 Hz when the host device's USB-C port supports DP 1.4 with DSC 3:1.\" That is the complete and correct condition. Display Stream Compression at three to one is what squeezes 25 gigabits of video into the 13 the cable can spare once the USB ports are fed, and whether your laptop can do it is a property of your laptop, not the dock. Every other listing that claims dual 4K60 without this sentence is making a promise about hardware it has never seen.

It goes further and names the other limit too: \"On macOS, both external monitors will display identical content.\" That is the MST restriction that makes most of this category useless for extended desktops on a Mac, stated plainly rather than buried. Between those two sentences the listing tells you everything you need to decide, which is more than the £154.99 Dell manages in four bullets.

The hardware matches the honesty. Every USB port runs at 10 Gbps — twice the Anker above — the upstream plug is 10 Gbps too, there is 85W pass-through from a 100W input with the usual 15W reserved for the dock, and the specification table correctly reads \"Data Transfer Rate 10 Gigabits Per Second\". At £28.49 it is £6.50 cheaper than the 8-in-1 with better data speeds. What keeps it off the top is evidence: 233 ratings against 37,028, on a newer product with no long-term track record, and at 20 by 10 by 30 millimetres it is small enough that heat has nowhere to go under sustained load.", // TEXTO SEO LONGO
                'pros' => ['Names the exact condition for dual 4K@60Hz: DP 1.4 with DSC 3:1', 'Also states the macOS mirroring limitation plainly', 'Every USB port runs at 10 Gbps, twice the Anker 8-in-1', 'Spec table fills the data rate field correctly, unlike its sibling', '£28.49, cheaper than the 8-in-1 with better specifications'], // PONTOS POSITIVOS
                'contras' => ['233 ratings against 37,028 for the Anker above', 'Very small body, so heat has little surface to escape through', 'Dual 4K@60Hz still depends entirely on your laptop supporting DSC', 'No external power input, unlike the business docks here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'UGREEN Revodok Pro 7-in-1 USB C Dock, Dual 4K@60Hz HDMI, 10Gbps',         // NOME (ENCURTADO)
                'price' => '£25.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 3058,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71SczwjMTML._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'UGREEN Revodok Pro 7-in-1 USB C docking station in black aluminium', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D1XSKZRJ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest dock here with 3,058 ratings behind it, and the only sub-£30 listing that tells MacBook owners not to buy it.', // TEXTO CURTO (CARD)
                'body' => "Twenty-five pounds ninety-nine for four 10 Gbps ports, dual HDMI and 85W charging is the best price-to-specification ratio on this page, and 3,058 ratings at 4.3 stars is the second deepest evidence here. The aluminium body and four-layer protection circuit are the sort of thing a brand only bothers with once it has had returns, and the status indicator light means you can see whether the dock has power without unplugging anything.

Where it earns real credit is a warning against its own sale. The second bullet reads: \"If you are using a MacBook and want to connect dual monitors with different displays, we do not recommend this docking station.\" Very few listings anywhere tell a category of buyer to look elsewhere, and this one does it in the bullet that advertises the dual display feature. It also states the power arithmetic honestly — 100W in, 85W to the laptop, 15W reserved to run the hub — which is a subtraction most brands leave you to discover.

The claim it does make unconditionally is the dual 4K@60Hz in the product name, with no mention of DSC anywhere. On a laptop with DisplayPort 1.4 and DSC support that is achievable; on an older machine you will get 30Hz and no warning was given. Set against Anker's Nano at £2.50 more, which states the condition explicitly, this is the same hardware with one sentence missing. The USB-C data ports also carry a limitation worth knowing: they move data only, and will not charge a phone or drive a third display.", // TEXTO SEO LONGO
                'pros' => ['Cheapest dock in this comparison at £25.99 with four 10 Gbps ports', '3,058 ratings at 4.3, the second deepest sample here', 'Explicitly tells MacBook users with dual displays not to buy it', 'States the 100W in / 85W out / 15W reserved arithmetic honestly', 'Aluminium body with a four-layer protection circuit'], // PONTOS POSITIVOS
                'contras' => ['Claims dual 4K@60Hz with no mention of the DSC requirement', 'USB-C data ports do not charge devices or carry video', 'Only 7 ports, the fewest of the multi-display docks here', 'No Ethernet, unlike both Ankers above'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'UGREEN Revodok Pro 12-in-1 Docking Station, Triple Display, 2 HDMI + DP', // NOME (ENCURTADO)
                'price' => '£39.98',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 968,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71d0IbXoCxL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'UGREEN Revodok Pro 12-in-1 triple display docking station in space grey', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DRP1F6R7?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Three displays and a 4K@120Hz DisplayPort for £39.98, on a spec sheet that lists MacBook as compatible and Windows as required.', // TEXTO CURTO (CARD)
                'body' => "For under £40 this is a lot of dock: two 4K HDMI outputs, a DisplayPort that will drive a single screen at 4K and 120Hz or 8K at 30Hz, two 10 Gbps USB-C data ports, two USB-A, gigabit Ethernet, an audio jack and 100W power input. The 120Hz DisplayPort is the specification worth having — high-refresh output from a hub is rare at this price, and it is the one connection here that will satisfy anyone who games between meetings. Nine hundred and sixty-eight ratings at 4.2 stars is solid mid-table evidence.

UGREEN is consistent about the macOS limit, and repeats the warning found on its cheaper model: \"For macOS, the display on all external monitors will be identical.\" It also flags that only the DisplayPort supports high refresh rates, so the two HDMI outputs are 60Hz devices. Both notes are the sort of detail that stops a return.

The specification table then contradicts itself in a way that matters for exactly the buyers being warned. Compatible Devices lists \"MacBook, Dell, HP, Smartphones, Cameras\", and two rows down Minimum Required Operating System Version reads \"Windows 10, Windows 11\". One field says Macs are supported and the next says Windows is required, on a listing whose bullets separately explain a macOS restriction. All three statements are trying to describe the same thing and none of them agrees with the others. The dock does work on a Mac — it just mirrors — but nobody reading the table would know that.", // TEXTO SEO LONGO
                'pros' => ['Triple display output with a 4K@120Hz DisplayPort for £39.98', 'High refresh rate output is rare at this price', 'Warns clearly that macOS will mirror rather than extend', 'Two 10 Gbps USB-C plus two USB-A, Ethernet and audio', '968 ratings at 4.2 stars'], // PONTOS POSITIVOS
                'contras' => ['Spec table lists MacBook as compatible and Windows 10/11 as required', 'The two HDMI outputs are 60Hz only, unlike the DisplayPort', 'USB-C data ports carry neither power nor video', 'Triple 4K claim carries no DSC condition'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'WAVLINK 12-in-1 USB C Docking Station, Dual HDMI + DP, 100W PD',          // NOME (ENCURTADO)
                'price' => '£36.66',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 160,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71gR6VR1MtL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'WAVLINK 12-in-1 USB C docking station in silver with dual HDMI',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F295JRS5?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing that states the DSC requirement and what happens if your laptop lacks it — and then describes itself as USB 2.0 in the spec table.', // TEXTO CURTO (CARD)
                'body' => "This listing contains the most complete technical disclosure in the category. It qualifies its display claim with \"(under DP1.4 & DSC1.2)\", and then, in the final bullet, spells out the consequence: \"Please confirm if your computer supports DP1.4 & DSC1.2. If not, the resolution will be reduced.\" Anker's Nano names the condition; WAVLINK names the condition and the penalty. It also states twice, in two separate bullets, that the dock is not compatible with macOS at all — no ambiguity, no mirroring caveat to misread.

The specification behind it is generous: dual HDMI plus DisplayPort, and the DP will run a single display at 3840x2160 and 144Hz, which is the highest refresh rate on this page. Two USB 3.0 and two USB 2.0 ports, gigabit Ethernet, SD and TF slots, separate audio and microphone jacks, and 85W of the 100W input going to the laptop. Twelve functions in a metal enclosure for £36.66.

Two things hold it back. The evidence is thin at 160 ratings, the second smallest sample here, from a brand with little UK presence. And the specification table undoes some of the goodwill the bullets earn: Hardware Interface reads \"USB 2.0\" and Minimum Required Operating System Version reads \"Windows 7\", on a USB-C dock running DisplayPort 1.4 with 100W power delivery. Windows 7 has been out of support since 2020 and USB 2.0 is 480 megabits. Whoever wrote the bullets understood the product; whoever filled the table did not.", // TEXTO SEO LONGO
                'pros' => ['States the DSC requirement and what happens without it, uniquely here', 'Says twice and unambiguously that it does not work with macOS', '144Hz single-display output, the highest refresh rate on this page', 'Twelve functions including separate audio and mic jacks, in metal', '85W laptop charging from a 100W input'], // PONTOS POSITIVOS
                'contras' => ['Spec table calls a USB-C DP 1.4 dock "USB 2.0"', 'Lists Windows 7 as the minimum operating system in 2026', '160 ratings, the second thinnest sample in this comparison', 'No macOS support at all, not even mirrored'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Dell D6000 USB-C Triple Docking Station, DisplayLink, Three 4K Displays', // NOME (ENCURTADO)
                'price' => '£59.99',                                                                // PRECO
                'rating' => 3.8,                                                                    // NOTA
                'reviews_count' => 288,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61s1+8VdIvL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Dell D6000 USB-C triple docking station in black',                   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08BLRH22B?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only dock here that solves the bandwidth problem properly rather than working around it — and the only real answer for a Mac with two different screens.', // TEXTO CURTO (CARD)
                'body' => "Every other dock on this page is limited by how much video a USB-C cable can carry. This one is not, because DisplayLink does something different: it compresses the video in software on the computer and sends it as ordinary USB data, then a chip in the dock decompresses it and drives the monitors. That is why a 5 Gbps link can feed three 4K displays or a single 5K one, and — the part that matters most — why this works properly on macOS, where MST does not exist and every dock above will mirror your screens instead of extending them.

If you use a MacBook and want two different things on two different monitors, this is effectively the only technology on this page that does it. That is a narrow but real recommendation, and it is why a dock rated 3.8 stars sits at number six rather than last.

The cost of the approach is why it is rated 3.8 from 288 ratings. DisplayLink needs a driver installed and kept updated, it uses processor time to compress the video, and under load — full-screen video, fast scrolling, anything with motion — it stutters in a way a direct DisplayPort connection never does. It also charges the laptop at only 65 watts, the lowest figure here, despite shipping with a 130 watt power adapter, so a workstation-class machine under load will slowly drain. Buy it for what it uniquely does. Do not buy it expecting a native connection.", // TEXTO SEO LONGO
                'pros' => ['DisplayLink drives three 4K screens or one 5K over a 5 Gbps link', 'The only dock here that truly extends displays on macOS', 'Works with USB-C and older USB 3.0 laptops alike', 'Four USB 3.0 ports, gigabit Ethernet and a Kensington slot', 'Ships with its own 130W power adapter'], // PONTOS POSITIVOS
                'contras' => ['3.8 stars from 288 ratings, the second lowest average here', 'DisplayLink needs drivers and uses CPU time to compress video', 'Stutters under motion in a way a native connection does not', 'Charges the laptop at only 65W, the lowest figure on this page'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'HP USB-C 120W Dock G5, Three Displays, Managed Business Dock',            // NOME (ENCURTADO)
                'price' => '£124.99',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 159,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71e3eCr9sVL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'HP USB-C 120W Dock G5 compact business docking station in black',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B1DHSXLK?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A serious managed business dock at 4.4 stars, whose compatibility field contains a raw programming list complete with square brackets.', // TEXTO CURTO (CARD)
                'body' => "This is a different class of object from the £25 hubs above it, and the difference is management rather than ports. PXE Boot lets IT install an operating system over the network through the dock, LAN/WLAN switching hands the connection over automatically when you plug in, Wake-on-LAN and MAC Address Pass-Through let a fleet be woken and identified remotely, and the eTag electronic asset tag means a company can inventory its docks by serial number without visiting a desk. None of that matters at home. All of it matters if you are buying forty of them.

The build follows: 120 watts of power delivery, three display outputs, 680 grams of metal that stays put on a desk, a footprint HP describes as 5 by 5 inches — imperial on a British listing, though the table's 12.2 by 12.2 centimetres agrees with it. Four point four stars from 159 ratings is the second-highest average on this page.

The specification table is where a £124.99 corporate product falls over. Compatible Devices reads, verbatim, \"['HP Laptops', 'MacBook Computers', 'Other Notebooks']\" — square brackets, single quotes, comma-separated: an unserialised programming list pasted straight into a customer-facing field. And two rows apart the table gives Total USB Ports as 5 and Number of Ports as 2. A docking station exists to provide ports; the field counting them says two. For a home buyer none of this is worth £90 over the Anker, and the management features are the entire justification.", // TEXTO SEO LONGO
                'pros' => ['Genuine fleet management: PXE Boot, WoL, MAC pass-through, eTag', '120W power delivery, the highest in this comparison', 'Three display outputs from a 680g metal body that stays put', '4.4 stars, the second-highest average here', 'Works with non-HP laptops despite the branding'], // PONTOS POSITIVOS
                'contras' => ['Compatibility field contains a raw code list: [\'HP Laptops\', ...]', 'Says Total USB Ports 5 and Number of Ports 2 in the same table', '£124.99 buys management features a home user will never use', 'Footprint quoted in inches on a UK listing, and only 159 ratings'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Dell WD19S Dock, USB-C, DisplayPort, HDMI, 6 USB Ports, 130W',            // NOME (ENCURTADO)
                'price' => '£154.99',                                                               // PRECO
                'rating' => 4.0,                                                                    // NOTA
                'reviews_count' => 324,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51+J-96ZiWL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Dell WD19S modular USB-C docking station in black',                  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08XNH3BR6?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most expensive dock here, sold on being the "World\'s most powerful" with no comparator, no date and not one resolution figure in any bullet.', // TEXTO CURTO (CARD)
                'body' => "Three hundred and twenty-four ratings at 4.0 stars and a modular design that Dell will sell you upgrade modules for is a reasonable proposition for a business buying into a platform. Six USB ports, DisplayPort and HDMI, gigabit Ethernet, a 130 watt supply, single-firmware management across the dock range and three years of spare part availability in the EU. If your company runs Dell laptops, this is the dock that matches them and gets driver support for years.

Read the four bullets, though, and notice what is not in them. There is no resolution figure. No refresh rate. No statement of how many displays it supports, or at what quality. No mention of DSC, MST, DisplayLink or any of the things that determine whether it will do what you want. Four bullets on a £154.99 product and not one number describing the display output — which is what a docking station is for.

What is there instead is superlative. \"Boost your PC's power with ExpressCharge on the World's most powerful USB-C dock\" and \"the World's first modular dock with upgradeable power and connectivity.\" No date, no comparator, no source, and no way to check either claim; the HP dock two places above delivers 120W against this one's 90W to the laptop. Which brings up the last inconsistency: the title says 130W, the specification table says \"Wattage 90 watts\" — the first is the power supply and the second is what reaches the laptop, but the page never says so. The same table gives Total USB Ports as 6 and Number of Ports as 5.", // TEXTO SEO LONGO
                'pros' => ['Modular design with upgradeable power and connectivity modules', 'Single firmware across the Dell dock range, valuable for IT fleets', 'Three years of EU spare part availability', '324 ratings and long-term driver support for Dell hardware', 'Six USB ports plus DisplayPort, HDMI and gigabit Ethernet'], // PONTOS POSITIVOS
                'contras' => ['Not one resolution, refresh rate or display count in any bullet', 'Claims "World\'s most powerful USB-C dock" with no comparator or date', 'Title says 130W while the spec table says 90 watts', 'Most expensive dock here at £154.99 and only 4.0 stars'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'UGREEN 14-in-1 Docking Station, Triple 4K Display, 2 HDMI + DP, 100W',    // NOME (ENCURTADO)
                'price' => '£69.99',                                                                // PRECO
                'rating' => 3.6,                                                                    // NOTA
                'reviews_count' => 801,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61ME3pKNiyL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'UGREEN 14-in-1 triple 4K display docking station in grey',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DYTVVLH4?tag=ranked10-21',       // LINK AFILIADO
                'summary' => '3.6 stars from 801 ratings is the worst rating-and-sample combination we have collected in any category. The specification is not the problem.', // TEXTO CURTO (CARD)
                'body' => "On paper this is the most capable dock in the comparison. Fourteen functions: two 4K HDMI outputs, a DisplayPort that will drive 8K at 30Hz or 4K at 120Hz, a 100W upstream port, a 27W USB-C output, two 10 Gbps USB-C data ports, two USB-A, SD and TF card slots reading at 170 MB/s, gigabit Ethernet and a 3.5mm jack. It has its own 24 volt power input, so it is a desk dock rather than a bag hub, and it is honest about the power budget: the 100W upstream and the 27W output share a combined 100 watts.

Then look at the rating. Three point six stars from 801 ratings is the lowest average across every category we have collected, and 801 is a large enough sample that it is a finding rather than noise. Our editorial rule is to flag exactly this pattern — a low average with a big sample says something a specification sheet cannot. The critical reviews centre on displays dropping out and the dock needing to be re-plugged, which is consistent with a device attempting triple 4K output near the bandwidth ceiling.

It is also the only UGREEN listing here that does not mention macOS at all. Its two cheaper siblings both carry the mirroring warning; this one lists \"Windows 10 and 11\" as its compatibility and says nothing about Macs either way. At £69.99 it costs £30 more than the 12-in-1 at number four, which has 968 ratings at 4.2 stars and the same display outputs bar the extra card reader and audio jack. Within one brand, on one page, the cheaper dock is rated six-tenths of a star higher.", // TEXTO SEO LONGO
                'pros' => ['Fourteen functions, the most complete port set in this comparison', 'DisplayPort supports 8K@30Hz or 4K@120Hz on a single display', 'Own 24V power input, so it does not tax the laptop', 'Honest about the shared 100W power budget across two ports', '170 MB/s SD and TF card slots'], // PONTOS POSITIVOS
                'contras' => ['3.6 stars from 801 ratings, the worst rating-to-sample ratio we have collected', 'Reviews report displays dropping out and needing re-plugging', 'The only UGREEN here that says nothing about macOS at all', '£30 more than the 12-in-1 sibling rated 0.6 stars higher'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'NOVOO RM11 11-in-1 USB C Docking Station, Dual HDMI, VGA, 100W PD',       // NOME (ENCURTADO)
                'price' => '£23.09',                                                                // PRECO
                'rating' => 3.7,                                                                    // NOTA
                'reviews_count' => 114,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71jbi9+VatL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'NOVOO RM11 11-in-1 USB C docking station in aluminium',              // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DCVH9LBH?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Sold in its title as a dock "for MacBook", and sold in its bullets on the MST function — which macOS has never supported.', // TEXTO CURTO (CARD)
                'body' => "The contradiction here is the sharpest in the category, and it is between the title and the bullets of the same listing. The product name ends \"USB C Dock for MacBook and Other USBC Laptops\". The fourth bullet sells the multi-display capability with \"the MST function gives you\" a second screen. Multi-Stream Transport is the DisplayPort mechanism that splits one signal into two independent displays — and macOS has never implemented it, on any version, on any Mac. A MacBook connected to this dock will mirror the same image on both monitors. The listing is advertising a MacBook dock whose stated mechanism does not work on a MacBook.

Three other UGREEN and Anker listings on this page state that limitation plainly, and one of them, UGREEN's Revodok Pro, actively recommends that MacBook users buy something else. That is the standard being missed here, not an obscure technicality.

At £23.09 this is the cheapest dock in the comparison and the specification reads well — eleven ports including dual HDMI, VGA for older projectors, gigabit Ethernet, four USB ports and 100W power delivery in a 140 gram aluminium body. The rating tells the other story: 3.7 stars from 114 ratings, the thinnest sample and second-lowest average here. The table adds a familiar error, giving Data Transfer Rate as \"1 Gigabits Per Second\", which is the Ethernet port's speed pasted into the field describing USB throughput, and listing Colour as \"11 in 1\".", // TEXTO SEO LONGO
                'pros' => ['Cheapest dock in this comparison at £23.09', 'Eleven ports including VGA, useful for older meeting room projectors', '100W power delivery and gigabit Ethernet', 'Light 140g aluminium body'], // PONTOS POSITIVOS
                'contras' => ['Titled a dock "for MacBook" while selling MST, which macOS never supported', 'A MacBook will mirror rather than extend, contrary to the listing', '3.7 stars from 114 ratings, the thinnest sample here', 'Data Transfer Rate field contains the Ethernet speed, and Colour reads "11 in 1"'], // PONTOS NEGATIVOS
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
        $this->command?->info("UsbCDockingStationsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
