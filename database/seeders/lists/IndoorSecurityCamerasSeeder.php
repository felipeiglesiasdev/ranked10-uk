<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class IndoorSecurityCamerasSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE CAMERAS DE SEGURANCA INTERNAS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=indoor+security+camera&rh=p_36%3A2000-  (20 ASINS EM 22 CARDS)
        // CATEGORIA TECH. VOLUME ENORME: OS DEZ ESCOLHIDOS SOMAM 470 MIL AVALIACOES.
        //
        // ─── ACHADO PRINCIPAL: "2K" NAO E 2K ───
        // 1. 2K/QHD SAO 2560 x 1440 PIXELS, OU 3,686 MEGAPIXELS. UM SENSOR DE 3 MP EM
        //    16:9 DA 2304 x 1296, QUE SAO 2,99 MP — 19% MENOS PIXEL QUE O PADRAO CUJO
        //    NOME ELE USA. SEIS DOS DEZ ANUNCIOS DIZEM "2K". O QUE CADA UM ENTREGA:
        //      TAPO C220 ...... "2K QHD (2560x1440)" + 4MP .... 3,69 MP ← UNICO COM PIXEL
        //      TAPO C211 ...... "2K 3MP", lente de 3 MP ....... 2,99 MP (19% MENOS)
        //      TAPO C210P2 .... "2K 3MP", lente de 3 MP ....... 2,99 MP
        //      IMOU DUAL ...... "2K+2K", 3 MP + 3 MP .......... DOIS SENSORES DE 3 MP
        //      EUFY E220 ...... "up to 2K", SEM MP ............ E 1080p NO HOMEKIT
        //      GNCC C2 ........ "2K pixels", SEM MP ........... SEM NUMERO NENHUM
        //      BLURAMS A31 .... "2K", SEM MP .................. SEM NUMERO NENHUM
        //    A TAPO C220 E A UNICA DAS DEZ QUE PUBLICA A RESOLUCAO EM PIXEL. E E A MESMA
        //    MARCA QUE, £2 MAIS BARATO, VENDE 3 MP TAMBEM COMO "2K".
        // 2. A MESMA MARCA, DUAS DEFINICOES. A TAPO C211 (£21.99) DIZ "3 Megapixel camera
        //    lens, which provides 2K ultra high definition resolution". A TAPO C220
        //    (£23.99) DIZ "1440p 2K 4MP QHD Resolution... 2K QHD resolution (2560x1440)".
        //    DUAS CAMERAS DA MESMA MARCA, £2 DE DIFERENCA, AS DUAS ROTULADAS 2K, COM UM
        //    MEGAPIXEL INTEIRO DE DIFERENCA ENTRE ELAS.
        // 3. O "4K 8MP" DA TAPO C250 ESTA CERTO: 3840 x 2160 SAO 8,29 MP. QUANDO A MARCA
        //    QUER SER PRECISA, ELA CONSEGUE.
        // 4. A IMOU SOMA O QUE NAO SE SOMA. O TITULO DIZ "2K+2K" E O BULLET EXPLICA:
        //    "a total of 6 million pixel dual-camera resolution: 3 million pixels fixed
        //    lens + 3 million pixels rotating lens". SAO DUAS IMAGENS DE 3 MP APONTANDO
        //    PARA LADOS DIFERENTES, NAO UMA DE 6 MP. RESOLUCAO DE CAMERAS SEPARADAS NAO
        //    SE ADICIONA.
        // 5. A EUFY ESCONDE A METADE IMPORTANTE ENTRE PARENTESES: "View every event in up
        //    to 2K clarity (1080P WHILE USING HOMEKIT)". O HOMEKIT E UMA DAS TRES
        //    INTEGRACOES QUE ELA ANUNCIA NO BULLET SEGUINTE, E USAR ELE CORTA A RESOLUCAO
        //    PARA UM QUARTO DOS PIXELS.
        //
        // ─── ACHADO SECUNDARIO: POOL DE AVALIACAO DE 167.976 ───
        // 6. A TAPO C211 (£21.99, 2K 3MP) E A TAPO C250 (£36.99, 4K 8MP) EXIBEM AS MESMAS
        //    167.976 AVALIACOES E A MESMA NOTA 4.6. RESOLUCOES DIFERENTES, PRECOS £15
        //    APARTADOS, UM UNICO CONJUNTO DE AVALIACOES — E E O MAIOR POOL QUE JA
        //    ENCONTRAMOS EM QUALQUER CATEGORIA, MAIOR QUE AS 23.177 DA LEVOIT.
        //
        // ─── OUTROS ACHADOS ───
        // 7. VISAO NOTURNA EM DUAS UNIDADES, AS VEZES NA MESMA FRASE:
        //      TAPO C211/C210P2 .. "30feet/10m"      (AS DUAS)
        //      TAPO C220 ......... TITULO DO BULLET DIZ "9 Meter", O CORPO DIZ "30 ft"
        //      TAPO C250 ......... "40 ft"            (SO PES)
        //      GNCC GC3 .......... "32ft"             (SO PES)
        //      GNCC C2 ........... "26ft"             (SO PES)
        //      IMOU .............. "15m(49ft)"
        //      BLURAMS / EUFY / ANONA .. NAO PUBLICAM
        //    TRES DAS DEZ NAO DIZEM ATE ONDE ENXERGAM NO ESCURO, QUE E O UNICO NUMERO QUE
        //    IMPORTA NUMA CAMERA DE SEGURANCA A NOITE.
        // 8. O CAMPO "Special feature" DE QUATRO ANUNCIOS DIZ "HD Resolution". HD SAO
        //    720p. ESTA ASSIM NA ANONA (QUE VENDE 4K), NA GNCC C2 (2K), NA GNCC GC3
        //    (1080p) E NA BLURAMS ("2K HD Resolution", DOIS PADROES NA MESMA LINHA).
        // 9. O CAMPO "Connectivity technology" DIZ "Wired" NA TAPO C250 E NA ANONA — AS
        //    DUAS SAO CAMERAS WI-FI, E A ANONA SE VENDE JUSTAMENTE POR TER WI-FI 6.
        // 10. A ANONA MANDA "say goodbye to 2K or 3K" NO PRIMEIRO BULLET E DECLARA "HD
        //    Resolution" NA TABELA. £122.35 POR QUATRO CAMERAS (£30.59 CADA) COM 1.150
        //    AVALIACOES.
        // 11. A GNCC GC3 E A UNICA DAS DEZ QUE ESCREVE "1080P" SEM TENTAR CHAMAR DE OUTRA
        //    COISA. E A CAMERA MAIS HONESTA DA LISTA E TEM A NOTA MAIS BAIXA (4.2),
        //    EMPATADA COM A BLURAMS E A GNCC C2.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: AS "window cameras" (OUTINPUT, W8, AKIYO, WANSVIEW), QUE SAO UM SUBTIPO
        // COLADO NO VIDRO E NAO COMPARAVEL; OS KITS EXTERNOS (WUUK, AOSU A £559.99);
        // TUDO COM MENOS DE 1.000 AVALIACOES.
        // TAPO APARECE QUATRO VEZES PORQUE OCUPA QUATRO DAS SEIS PRIMEIRAS POSICOES POR
        // VOLUME DE AVALIACAO E PORQUE A CONTRADICAO INTERNA DELA E A MATERIA.
        // DENTRO: NOTA DE 4.2 A 4.6, PRECO DE £16.99 A £122.35, SEIS MARCAS.
        //
        // FOCUS KEYWORD: best indoor security camera
        // VARIACOES TRABALHADAS: indoor security camera uk / 2k security camera /
        // pet camera / pan tilt camera / wifi camera no subscription /
        // baby monitor camera / cctv camera for home / night vision camera /
        // 4k indoor camera / security camera no monthly fee / what does 2k mean
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-indoor-security-camera',                                    // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Indoor Security Camera 2026: 10 Ranked on Real Resolution', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Indoor Security Camera 2026: Top 10 Compared',         // TITLE DA ABA/GOOGLE (49 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best indoor security camera options on Amazon by converting every 2K and 4K claim back into megapixels, comparing 10 models from £16.99.', // META DESCRIPTION (152 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best indoor security camera',                           // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Six of the ten cameras in this comparison are sold as 2K, and they do not mean the same thing by it. Proper 2K, the QHD standard, is 2560 by 1440 pixels — 3.69 megapixels. A 3 megapixel sensor in the same 16:9 shape gives 2304 by 1296, which is 19% fewer pixels while wearing the same label. Tapo demonstrates the whole problem inside its own range: the C211 at £21.99 says a 3 megapixel lens provides 2K resolution, and the C220 at £23.99 says 2K QHD resolution, 2560 by 1440, 4MP. Two pounds apart, both badged 2K, a full megapixel between them, and only one of them tells you the pixel dimensions. Elsewhere it gets stranger. Imou adds two 3 megapixel lenses pointing in different directions and calls the result 2K+2K. Eufy promises up to 2K and notes in brackets that it drops to 1080p on HomeKit, which is one of the three integrations it advertises. Two more say 2K and publish no number at all. Below we rank the best indoor security camera options on Amazon in August 2026 by converting every claim back into pixels.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "The best indoor security camera for you is the one whose listing you can check. Resolution is the specification the whole category advertises and the one it is loosest about, so ignore the 2K badge and look for megapixels or, better, pixel dimensions: 2560 by 1440 is real 2K, 3MP is 2304 by 1296 and about a fifth short of it, and 4K should always be 8MP. Then check the night vision distance, because a camera that cannot see across your living room after dark is not doing the job you bought it for, and three of these ten never state a range at all. Crucially, work out the storage before you order. Every camera here takes a microSD card and records locally for free, and every one also offers a cloud subscription; the difference between a £22 camera and a £22 camera plus a monthly fee for five years is substantial, and one listing here quietly makes remote playback of recorded events subscription-only. Finally, check the review count against the specific model rather than the brand: the cheapest camera on this page and one costing £15 more share an identical pool of 167,976 ratings despite having entirely different sensors.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                              // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 09:45:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Tapo C220 2K QHD Indoor Camera, 2560x1440, Pan/Tilt, AI Detection',       // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£23.99',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 55516,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71TiiEoeMAL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best indoor security camera',                                        // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CF2RRBW5?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best indoor security camera here because it is the only one of ten that publishes its resolution in pixels: 2560 by 1440, genuine QHD, for £23.99.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "One listing in this comparison prints the number that settles the argument, and this is it: 2K QHD resolution, 2560 by 1440. That is 3.69 megapixels of real detail, and it is £2 more than the same brand's C211, which calls a 3 megapixel sensor 2K and gives you 19% fewer pixels for the saving. When a camera is the thing you will squint at trying to read a face or a number plate through a window, that fifth of the image is the entire purchase.

Everything else is well judged for £23.99. Fifty-five thousand five hundred and sixteen ratings at 4.5 stars is the third deepest sample on this page. There is 360 degree horizontal and 114 degree vertical pan and tilt, AI detection separating people, pets, vehicles and baby crying rather than triggering on every shadow, two-way audio, a sound and light alarm to move an intruder along, and Alexa and Google support. Storage runs to a 512GB microSD recording 24/7 for free, with Tapo Care cloud as an option rather than a requirement.

Two things to note. The night vision bullet is headed 9 Meter and its body says 30 ft — the same distance in two units in one paragraph, which is the mildest version of a problem that runs through this whole category. And 4.5 stars is a tenth below the two Tapo models that share the 167,976-rating pool, so if you want the very best-reviewed camera on this page rather than the best-specified one, that is the C211 at number two.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['The only listing here that publishes pixel dimensions: 2560 x 1440', 'Genuine 3.69MP QHD for £2 more than the 3MP camera badged the same', '55,516 ratings at 4.5, the third deepest sample in this comparison', 'AI separates people, pets, vehicles and baby crying', '512GB local recording free, with cloud strictly optional'], // PONTOS POSITIVOS
                'contras' => ['Night vision quoted as 9 Meter in one line and 30 ft in the next', '4.5 stars is below the 4.6 of the two Tapo models above it on rating', 'Sound and light alarm is of limited use in a flat or shared house', 'Requires a microSD card that is not included'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Tapo C211 2K 3MP Pan/Tilt Indoor Camera, 360 Degree, Night Vision',       // NOME (ENCURTADO)
                'price' => '£21.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 167976,                                                          // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71SdDnZG9XL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tapo C211 pan and tilt indoor security camera in white',             // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CQHY41NY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most reviewed camera in the category at 167,976 ratings and the cheapest single unit here, sold as 2K on a 3 megapixel lens that is a fifth short of it.', // TEXTO CURTO (CARD)
                'body' => "One hundred and sixty-seven thousand nine hundred and seventy-six ratings at 4.6 stars is the largest body of evidence behind any product we have ranked in any category, and it costs £21.99. On weight of opinion alone this is the default answer, and for good reason: full 360 degree pan with 114 degree tilt, person and motion detection with tracking, baby cry detection, customisable detection zones and privacy zones, RTSP support for anyone running their own recording system, and free 24/7 local recording to a 512GB card.

The resolution is the caveat. The first bullet says a 4mm 3 megapixel lens provides 2K ultra high definition resolution. Three megapixels in 16:9 is 2304 by 1296; the QHD standard the 2K name comes from is 2560 by 1440, or 3.69 megapixels. So this is about 81% of the pixels the label implies, and Tapo's own C220 at number one proves the point by publishing the real dimensions two pounds higher up the range. For a wide room shot it is fine; for reading detail at distance it is not what you thought you bought.

The other thing worth knowing is the review pool. This ASIN and the £36.99 4K C250 at number three both display exactly 167,976 ratings and 4.6 stars. Those are different cameras with different sensors, and whatever those 167,976 people are describing, it is not specifically one or the other. The RTSP support and fixed IP address are genuinely unusual at this price and worth the entry on their own.", // TEXTO SEO LONGO
                'pros' => ['167,976 ratings at 4.6, the largest sample of any product we have ranked', '£21.99, the cheapest single camera in this comparison', 'RTSP protocol and fixed IP support for third-party recording systems', 'Customisable motion detection zones and privacy zones', 'Free 24/7 local recording to a 512GB microSD card'], // PONTOS POSITIVOS
                'contras' => ['3MP is 2304 x 1296, about 19% short of the 2K it is labelled', 'Shares its 167,976 ratings with a 4K camera costing £15 more', 'No pixel dimensions published anywhere on the listing', 'Night vision of 10m is the shortest of the Tapo models here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Tapo C250 4K 8MP Pan/Tilt Indoor Camera, AI Auto-Zoom Tracking',          // NOME (ENCURTADO)
                'price' => '£36.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 167976,                                                          // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71vW3nq-LxL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tapo C250 4K pan and tilt indoor security camera',                   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GP21ZGVJ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only genuine 4K camera here whose maths works — 8MP is exactly 3840 by 2160 — with the longest night vision on the page at 40 feet.', // TEXTO CURTO (CARD)
                'body' => "Four K UHD is 3840 by 2160 pixels, which is 8.29 megapixels, so a camera advertised as 4K 8MP is telling the truth. After a page spent unpicking what 2K means, that is worth saying plainly: when Tapo wants to be precise it can be, and this is the model where it is. Eight megapixels is more than double the pixels of the C220 at number one and nearly three times the C211 at number two, which is the difference between knowing someone was in the room and knowing who.

The AI auto-zoom tracking is the feature that uses those pixels well. Rather than simply following a moving figure, the camera zooms in as it tracks, so the recorded clip is a close view of a person rather than a distant shape crossing a wide frame — which is exactly what all those extra pixels are for. Night vision runs to 40 feet, the longest quoted in this comparison, and there is 360 degree pan with 114 degree tilt, human, pet and baby cry detection.

Two reservations. The 167,976 ratings shown here are the same 167,976 shown on the £21.99 C211, a camera with a completely different sensor, so treat the score as a verdict on Tapo rather than on this model. And the specification table gives the connectivity technology as Wired, which it is not — this is a Wi-Fi camera, and it is the same field error that appears on the Anona at the bottom of this page. Neither affects the hardware; both tell you how carefully the listings are maintained.", // TEXTO SEO LONGO
                'pros' => ['Genuine 4K: 8MP is exactly 3840 x 2160, and the label matches', '40 feet of night vision, the longest range in this comparison', 'AI auto-zoom tracking closes in on people rather than just following them', 'More than double the pixels of the number one camera for £13 more', '4.6 stars, the joint highest rating here'], // PONTOS POSITIVOS
                'contras' => ['Shares its 167,976 ratings with a 3MP camera costing £15 less', 'Specification lists connectivity as Wired on a Wi-Fi camera', 'Night vision distance given only in feet on a UK listing', '4K files fill a microSD card far faster than 2K ones'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'eufy Security Solo IndoorCam E220, 2K, Pan and Tilt, On-Device AI',       // NOME (ENCURTADO)
                'price' => '£37.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 9142,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61lK5IdCQPL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'eufy Security Solo IndoorCam E220 pan and tilt camera in white',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B086KZ8X6S?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only camera here with on-device AI and Apple HomeKit support, and the only listing honest enough to admit its 2K becomes 1080p when you use it.', // TEXTO CURTO (CARD)
                'body' => "Two things separate this from everything else on the page. The first is that the AI runs on the camera rather than in a data centre: the E220 decides locally whether it is looking at a person or a pet and only records when it is, so the footage that matters is not buried in hours of curtain movement, and the decision does not require your living room to be uploaded anywhere. The second is Apple HomeKit support, which no other camera here offers, alongside Google Assistant and Alexa.

The second bullet also contains the most useful parenthesis in this comparison: view every event in up to 2K clarity, 1080P while using HomeKit. That is a drop to a quarter of the pixels, disclosed in brackets, on the integration eufy leads with in the following bullet. Most brands would have left it out. Knowing it in advance is exactly what a buyer needs, and it is why this sits at four rather than lower.

Against it: at £37.99 this is among the more expensive single cameras here and 9,142 ratings at 4.4 stars is a good but not outstanding record. No megapixel figure or pixel dimension appears anywhere, so the 2K claim cannot be checked at all, and no night vision distance is published either — two of the three numbers that decide whether a camera works in the dark are simply absent. The 96 degree vertical tilt is also the narrowest of the pan-and-tilt models on this page.", // TEXTO SEO LONGO
                'pros' => ['On-device AI decides person or pet locally, without uploading footage', 'The only Apple HomeKit camera in this comparison', 'Discloses that resolution drops to 1080p on HomeKit, which rivals would omit', 'No monthly fee required for core functions', '9,142 ratings at 4.4 stars'], // PONTOS POSITIVOS
                'contras' => ['No megapixels or pixel dimensions published, so 2K cannot be checked', 'Resolution quartered to 1080p on the integration it leads with', 'No night vision distance published anywhere', '£37.99 is among the dearest single cameras on this page'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Tapo C210P2 2K 3MP Pan/Tilt Indoor Camera, 2-Pack, Privacy Zones',        // NOME (ENCURTADO)
                'price' => '£39.98',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 32037,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/615SL02p89L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tapo C210P2 twin pack pan and tilt indoor cameras in white',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CQHVX8K1?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Two cameras for £39.98, or £19.99 each, which makes this the cheapest way to cover two rooms — on the same 3MP sensor that Tapo labels 2K.', // TEXTO CURTO (CARD)
                'body' => "Nineteen pounds ninety-nine a camera is the lowest per-unit price in this comparison, and covering two rooms is usually the point — a single camera watches one doorway, and the second one is what turns a gadget into a system. Thirty-two thousand and thirty-seven ratings at 4.6 stars is the fourth deepest sample here and the rating is the joint highest.

Feature for feature it is the C211 at number two, twice: 360 degree pan and 114 degree tilt, person and motion detection with tracking, baby cry detection, two-way audio, multi-view so both feeds appear on one screen, Alexa and Google support, RTSP and fixed IP for third-party systems, free 24/7 local recording to a 512GB card, and a 30-day cloud trial you are not obliged to continue. Privacy zones let you black out a section of the frame permanently, which matters more with two cameras than one.

The resolution caveat is identical and worth repeating because the listing repeats it word for word: a 4mm 3 megapixel lens providing 2K resolution. Three megapixels is 2304 by 1296, not the 2560 by 1440 that 2K names, and the C220 at number one is the Tapo that gives you the real thing. If you want two rooms covered cheaply, buy this; if you want to read detail, buy two C220s for £47.98 and accept the £8 difference.", // TEXTO SEO LONGO
                'pros' => ['£19.99 per camera, the lowest per-unit price in this comparison', '32,037 ratings at 4.6, joint highest rating on this page', 'Multi-view shows both feeds on one screen', 'RTSP, fixed IP, privacy zones and free 24/7 local recording', '30-day cloud trial with no obligation to continue'], // PONTOS POSITIVOS
                'contras' => ['Same 3MP sensor labelled 2K, 19% short of QHD', 'Two C220s cost only £8 more and give genuine 2560 x 1440', 'No pixel dimensions published', 'Two cameras means two microSD cards, neither included'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'blurams A31 Pet Camera 2K, 360 Degree, Colour Night Vision',              // NOME (ENCURTADO)
                'price' => '£16.99',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 30320,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61vlKJywZbL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'blurams A31 pet camera in white with 360 degree rotation',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07YB8HZ8T?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest camera in the comparison at £16.99 with 30,320 ratings behind it, and a 2K claim with no megapixel figure attached anywhere.', // TEXTO CURTO (CARD)
                'body' => "Sixteen pounds ninety-nine is remarkable for a pan-and-tilt camera with 30,320 ratings behind it, and there is real specification in there: colour night vision rather than the black-and-white infrared most of this page offers, six infrared LEDs, motion tracking, two-way talk, dual-band Wi-Fi on both 2.4 and 5GHz, and a choice of microSD up to 256GB or cloud. Colour night vision genuinely helps — being able to tell a red coat from a black one is the difference between a useful clip and a grey blur.

What you cannot establish is the resolution. The listing says 2K in the title and 2K in the first bullet, the specification table says 2K HD Resolution — which pairs two different standards in one phrase, since HD is 720p — and no megapixel figure or pixel dimension appears anywhere. Given that 3MP cameras and 3.69MP cameras are both sold as 2K in this category, and that this is the cheapest of them by £5, the prudent assumption is the lower end.

The rating is the other reservation. Four point two stars across 30,320 ratings is the joint lowest average in this comparison, and on a sample that size it is a settled verdict rather than bad luck. Storage caps at 256GB against 512GB elsewhere here, which halves how long continuous recording lasts before it overwrites. Buy it as a cheap way to watch a dog, not as a security camera you will need to identify someone from.", // TEXTO SEO LONGO
                'pros' => ['£16.99, the cheapest camera in this comparison', 'Colour night vision rather than black and white infrared', '30,320 ratings, the fifth deepest sample here', 'Dual-band Wi-Fi on both 2.4 and 5GHz', 'Motion tracking and two-way talk at the lowest price on the page'], // PONTOS POSITIVOS
                'contras' => ['2K claimed with no megapixel or pixel figure anywhere on the listing', 'Specification field reads 2K HD Resolution, mixing two standards', '4.2 stars across 30,320 ratings, the joint lowest average here', 'MicroSD capped at 256GB against 512GB elsewhere'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'GNCC GC3 1080P Indoor Security Camera, 2-Pack, 32ft Night Vision',        // NOME (ENCURTADO)
                'price' => '£22.99',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 2077,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71FRT+P6hBL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'GNCC GC3 twin pack indoor security cameras in white',                // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FFSC2PHR?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only camera of ten that says 1080p and leaves it at that, which after a page of elastic 2K claims counts as the most honest listing here.', // TEXTO CURTO (CARD)
                'body' => "Every other camera in this comparison reaches for 2K, 3K or 4K. This one says 1080P, in the title and in the bullets, and does not try to dress it up. It is also the only listing that publishes both its resolution and its night vision range without hedging: 1080p, 32 feet, six infrared LEDs. In a category where the headline number is this unreliable, a manufacturer stating a modest specification accurately is worth more than one stating an impressive specification vaguely.

For £22.99 you get two cameras — £11.50 each, the lowest unit price on this page — with adhesive mounting as well as screws, motion and sound detection, two-way audio, sharing with up to three family members, and a 2m power cable. These are fixed cameras with manual angle adjustment rather than motorised pan and tilt, which is the main thing you give up.

Two things to weigh carefully. Four point two stars is the joint lowest average here, and the storage terms need reading: local recording to a 128GB card is free and covers 24/7 continuous capture, but remote playback of recorded events requires a paid cloud subscription after a 14-day trial. Live view, notifications and two-way audio stay free. That is a narrower free tier than Tapo or eufy offer, and on a two-camera system it is the kind of detail that turns a £22.99 purchase into a monthly bill. The specification field also reads HD Resolution, which is 720p rather than the 1080p the listing correctly claims elsewhere.", // TEXTO SEO LONGO
                'pros' => ['The only camera here that states 1080p plainly rather than claiming 2K', 'Publishes both resolution and a 32ft night vision range', '£11.50 per camera, the lowest unit price in this comparison', 'Adhesive or screw mounting, useful in rentals', 'Free 24/7 local recording and free live view, notifications and audio'], // PONTOS POSITIVOS
                'contras' => ['Remote playback of recordings needs a paid subscription after 14 days', 'Fixed lens with manual angle rather than motorised pan and tilt', '4.2 stars, the joint lowest average in this comparison', 'Specification field says HD Resolution, which is 720p not 1080p'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Imou Dual-Lens Indoor Camera, Two 3MP Lenses, 360 Degree, Siren',         // NOME (ENCURTADO)
                'price' => '£29.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 1254,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71+peRpu8RL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Imou dual-lens indoor security camera in white',                     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CP7GY5CS?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A genuinely clever two-lens design, advertised as 2K+2K and 6 million pixels, which is two 3MP images pointing different ways rather than one big one.', // TEXTO CURTO (CARD)
                'body' => "The engineering idea here is good and nobody else on this page has it. One fixed lens watches the area that matters continuously while a second, motorised lens patrols the rest of the room and tracks anything that moves, and the app shows both feeds at once. A single pan-and-tilt camera is always pointing away from something; two lenses genuinely removes that blind spot, and for a shop, a hallway or a room with two doors it is the right architecture.

The arithmetic on the box is not. The title says 2K+2K and the third bullet explains: a total of 6 million pixel dual-camera resolution, 3 million pixels fixed lens plus 3 million pixels rotating lens. Two 3 megapixel sensors aimed in different directions do not combine into a 6 megapixel image — you get two 3MP pictures, each of which is the same 2304 by 1296 that Tapo calls 2K and which falls 19% short of QHD. Adding the numbers together is the same move as a hi-fi quoting the total wattage of both channels.

Beyond that it is well equipped for £29.99: full colour night vision to 15 metres with 8x zoom, human, pet and sound detection with tracking, a siren and spotlight, dual-band Wi-Fi, and an all-day recording mode that drops to one frame a second between events to save 85% of the card. One thousand two hundred and fifty-four ratings at 4.3 stars is the second thinnest sample here, and the listing warns you to keep the camera within 3 metres of the router when connecting, which is an unusual constraint to disclose.", // TEXTO SEO LONGO
                'pros' => ['Two lenses remove the blind spot a single pan-and-tilt camera always has', 'Full colour night vision to 15 metres with 8x zoom', 'All-day recording mode saves 85% of card space between events', 'Siren and spotlight plus human, pet and sound detection', 'Publishes its megapixels per lens rather than hiding behind 2K'], // PONTOS POSITIVOS
                'contras' => ['2K+2K and 6 million pixels are two 3MP images, not one 6MP image', 'Each lens is 2304 x 1296, 19% short of true QHD', '1,254 ratings, the second thinnest sample in this comparison', 'Must be within 3 metres of the router during setup'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'GNCC C2 2K Indoor Camera, 2-Pack, Tape Mount, 26ft Night Vision',         // NOME (ENCURTADO)
                'price' => '£29.99',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 2592,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71HTkTDFTIL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'GNCC C2 indoor security camera twin pack in white',                  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CJR7ZJH4?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Claims 2K pixels without ever saying how many, has the shortest night vision here at 26 feet, and costs £7 more than the same brand honest 1080p twin pack.', // TEXTO CURTO (CARD)
                'body' => "The third bullet reads: with 2K pixels, the GNCC indoor camera can capture every detail in your room. That is the entire resolution disclosure — no megapixels, no dimensions, just the phrase 2K pixels, which is not a quantity. Given that this category applies the 2K label to sensors ranging from 2.99 to 3.69 megapixels, and that GNCC sells a 1080p twin pack for £7 less at number seven without pretending otherwise, the absence of a number here is conspicuous.

The camera is otherwise a reasonable budget twin pack. Adhesive tape mounting with no drilling, which is genuinely useful in a rental, motion and sound detection with real-time alerts through the Osaio app, two-way audio, multi-device viewing and sharing, and a choice of microSD up to 128GB or cloud. Two thousand five hundred and ninety-two ratings at 4.2 stars.

Three specifics count against it. Night vision reaches 26 feet, the shortest range published by anyone on this page, from six 850nm LEDs — that is roughly eight metres, which covers a bedroom but not a through lounge. It works only on 2.4GHz Wi-Fi, with 5GHz explicitly unsupported, which in a flat full of competing networks is a real limitation that the blurams at number six does not share. And the specification field describes it as HD Resolution, 720p, on a camera whose title says 2K — the third listing in this comparison to make that particular mistake.", // TEXTO SEO LONGO
                'pros' => ['Adhesive tape mounting with no drilling, useful in rentals', 'Two cameras for £29.99 with motion and sound detection', '2,592 ratings at 4.2 stars', 'Free local recording to microSD with cloud optional', 'Multi-device viewing and sharing through the Osaio app'], // PONTOS POSITIVOS
                'contras' => ['Claims 2K pixels with no megapixel or dimension figure anywhere', '26ft night vision, the shortest range published on this page', '2.4GHz Wi-Fi only, with 5GHz explicitly unsupported', 'Costs £7 more than the same brand honest 1080p twin pack'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Anona Pano 4K UHD Indoor Camera, 4-Pack, Wi-Fi 6, 8x Zoom',               // NOME (ENCURTADO)
                'price' => '£122.35',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 1150,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61Q14R38adL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Anona Pano 4K indoor dome security camera in white',                 // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FSY9BX4D?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Opens by telling you to say goodbye to 2K or 3K, and its own specification table gives the resolution as HD — which is 720p.', // TEXTO CURTO (CARD)
                'body' => "Four cameras with Wi-Fi 6 for £122.35 works out at £30.59 each, and on paper this is the most ambitious system in the comparison: 4K UHD with 8x zoom, 360 degree pan and 110 degree tilt with auto-tracking, AI person, pet and baby cry detection, dual-band Wi-Fi 6 for faster and more stable transmission across four simultaneous streams, AES-128 encrypted cloud or local microSD up to 512GB, and a privacy mode. Four point five stars across 1,150 ratings.

Wi-Fi 6 is the part that matters and is easy to overlook. Four cameras streaming at once is a genuine load on a home network, and 802.11ax handles multiple devices far better than the 2.4GHz-only radios two cameras on this page are limited to. If you actually want four rooms covered, this is the sensible architecture.

The listing undercuts itself twice, though, and both are in fields a buyer checks. The first bullet says 4K ultra-clear video and instructs you to say goodbye to 2K or 3K — and the specification table gives the special feature as HD Resolution, which is 720p, a ninth of the pixels. No megapixel figure appears anywhere to settle it, and no night vision distance is published either. The connectivity technology field then says Wired, on the camera whose headline feature is Wi-Fi 6. None of those three fields can be right, and at £122.35 with 1,150 ratings — the thinnest sample here — there is less accumulated experience to fall back on than anywhere else on this page.", // TEXTO SEO LONGO
                'pros' => ['Wi-Fi 6 genuinely helps with four cameras streaming at once', 'Four cameras for £122.35, or £30.59 each', '8x zoom with 360 degree pan and auto-tracking', 'AES-128 encrypted cloud or 512GB local storage', '4.5 stars across 1,150 ratings'], // PONTOS POSITIVOS
                'contras' => ['Advertises 4K while the specification field says HD Resolution, 720p', 'Connectivity field says Wired on a Wi-Fi 6 camera', 'No megapixel figure and no night vision distance published', '1,150 ratings, the thinnest sample in this comparison, at £122.35'], // PONTOS NEGATIVOS
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
        $this->command?->info("IndoorSecurityCamerasSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
