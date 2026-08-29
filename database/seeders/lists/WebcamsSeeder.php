<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class WebcamsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE WEBCAMS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=webcam+for+pc&rh=p_36%3A2000-  (18 ASINS UNICOS EM 22 CARDS)
        // CATEGORIA HOME & OFFICE.
        //
        // ─── ACHADO PRINCIPAL: A ABERTURA ESTA NA TABELA E NUNCA NO ANUNCIO ───
        // 1. NUM ESCRITORIO BRITANICO EM NOVEMBRO O QUE DECIDE SE VOCE APARECE BEM NAO E
        //    RESOLUCAO, E QUANTA LUZ A LENTE DEIXA ENTRAR. LUZ CAPTADA E INVERSAMENTE
        //    PROPORCIONAL AO QUADRADO DO NUMERO f. A TABELA COLETADA, TODA DO CAMPO
        //    "Maximum aperture" QUE NENHUM BULLET MENCIONA:
        //      UGREEN 4K ......... f/1.8 .... 1,00x (REFERENCIA)
        //      ANKER C200 ........ f/2.0 .... 0,81x
        //      UGREEN 2K ......... f/2.2 .... 0,67x
        //      EMEET C960 ........ f/2.8 .... 0,41x
        //      AOC (AS DUAS) ..... f/3.0 .... 0,36x
        //      EMEET NOVA ........ f/3.3 .... 0,30x
        //      EMEET C950 ........ f/4.0 .... 0,20x
        //      LOGITECH C920 ..... "3.5 Millimetres" — UNIDADE ERRADA, f NAO E mm
        //      OBSBOT ............ NAO PUBLICA
        //    ENTRE f/1.8 E f/4.0 SAO (4,0/1,8)² = 4,9 VEZES MAIS LUZ. A UGREEN DE £29.95
        //    ENTRA COM QUASE CINCO VEZES MAIS LUZ QUE A EMEET DE £27.76, E NENHUMA DAS
        //    DUAS FALA DISSO EM BULLET NENHUM — AS DUAS FALAM DE "auto light correction",
        //    QUE E SOFTWARE PUXANDO GANHO E, PORTANTO, RUIDO.
        //
        // ─── ACHADO SECUNDARIO: "4K" QUE NAO E 4K ───
        // 2. A AOC B0FPQW34HP (£29.99, 3.815 AVALIACOES) SE CHAMA "4K Webcam" NO TITULO,
        //    DIZ "4K UHD Video Calling... 4k at 30fps" NO PRIMEIRO BULLET E DECLARA
        //    "Video capture resolution: 1080p" NA PROPRIA TABELA DE ESPECIFICACAO. UM
        //    QUARTO DOS PIXELS. A MESMA FICHA DECLARA SENSOR "CCD" (TECNOLOGIA FORA DE
        //    WEBCAM HA MAIS DE UMA DECADA; TODAS AS OUTRAS SAO CMOS) E "Flash memory
        //    type: CompactFlash" NUMA CAMERA SEM SLOT DE CARTAO. O BULLET DIZ 90° DE FOV
        //    E O TITULO DA PAGINA DIZ 99°.
        // 3. A AOC AC410 (£41.64) VENDE "4K/60fps" NO TITULO E O SEGUNDO BULLET EXPLICA:
        //    "1080P @ 60FPS". OS 60 QUADROS SAO DE 1080p, NAO DE 4K. O TITULO SOLDA O
        //    MELHOR NUMERO DE DOIS MODOS DIFERENTES NUMA ESPECIFICACAO SO. PARA CREDITO
        //    DELA, E A UNICA DA LISTA QUE NOMEIA O SENSOR: SONY IMX363, QUE E UMA PECA
        //    REAL E CONFERIVEL — O MESMO PADRAO QUE ACHAMOS NAS DASH CAMS.
        // 4. A EMEET E A MAIS HONESTA E ESCONDE ISSO NUM "Note:" NO FIM DO BULLET: "Video
        //    resolution DEFAULTS TO 1080P; Switch to 4K via built-in camera software or
        //    APPs like PotPlayer/OBS". OU SEJA, NO ZOOM, NO TEAMS E NO GOOGLE MEET — QUE
        //    E PARA O QUE A CAMERA E COMPRADA — ELA ENTREGA 1080p. A C950 REPETE A NOTA.
        // 5. DUAS DAS DEZ DECLARAM "USB 2.0" (EMEET NOVA E EMEET C950). USB 2.0 SAO
        //    480 Mbps. E BANDA SUFICIENTE PARA 1080p COMPRIMIDO E APERTADA PARA 4K30 —
        //    O QUE FECHA COM A NOTA DE RODAPE DELAS SOBRE O PADRAO SER 1080p.
        //
        // ─── ACHADO TERCIARIO: O TAMANHO DO SENSOR, PUBLICADO UMA VEZ ───
        // 6. A OBSBOT E A UNICA DAS DEZ QUE PUBLICA O TAMANHO DO SENSOR: 1/2 POLEGADA.
        //    UM SENSOR DE 1/2" TEM PERTO DE QUATRO VEZES A AREA DO SENSOR DE ~1/4" QUE
        //    EQUIPA UMA WEBCAM DE £25 A £30, E AREA DE SENSOR E A RESPOSTA REAL PARA
        //    "POR QUE MINHA WEBCAM 4K FICA GRANULADA". E POR ISSO QUE ELA CUSTA £149.00.
        //    OITO ANUNCIOS DIZEM SO "CMOS", QUE E COMO DIZER QUE O CARRO TEM MOTOR.
        //
        // ─── OUTROS ACHADOS ───
        // 7. O CAMPO "Maximum focal length" E LIXO EM SETE DAS DEZ. UMA LENTE DE WEBCAM
        //    TEM DE 3 A 5 mm. O QUE ESTA PUBLICADO:
        //      LOGITECH C920 .... 3,67 mm ✓      UGREEN 4K ..... 4,25 ✓
        //      ANKER ............ 30 mm ✗        AOC (AS DUAS) . 30 ✗
        //      UGREEN 2K ........ 105,0 ✗        EMEET C950 .... 1000 mm ✗
        //      EMEET NOVA ....... 3000 mm ✗      EMEET C960 .... 3600 mm ✗
        //    3.600 MILIMETROS SAO 3,6 METROS DE DISTANCIA FOCAL — TELEOBJETIVA DE
        //    FOTOGRAFIA DE FAUNA SELVAGEM, NUM APARELHO DE £24.99 PRESO NUM MONITOR.
        // 8. O CAMPO "Screen size" APARECE PREENCHIDO EM CINCO WEBCAMS, QUE NAO TEM TELA:
        //    EMEET C960 1,97" · ANKER 2,7" · AOC 1" · EMEET NOVA E C950 3,8" · UGREEN
        //    "81 Millimetres" E "81.00". E "Flash memory type: SDHC, SDXC" APARECE EM
        //    QUATRO CAMERAS SEM SLOT DE CARTAO.
        // 9. A EMEET NOVA DECLARA "Video capture resolution: NOVA 4K" — O NOME COMERCIAL
        //    DO PRODUTO DENTRO DO CAMPO DE RESOLUCAO.
        // 10. A ANKER E A UNICA QUE OFERECE FOV AJUSTAVEL — 65°, 78° OU 95° POR SOFTWARE.
        //    FOV E O QUE DECIDE SE A COZINHA ENTRA NO ENQUADRAMENTO, E TODAS AS OUTRAS
        //    SAO FIXAS: LOGITECH 78° · AOC AC410 75° · EMEET NOVA E C950 73° · EMEET C960
        //    90° · AOC £29.99 90° OU 99° CONFORME ONDE SE LE.
        // 11. A EMEET NOVA E EXEMPLAR NUMA COISA QUE NINGUEM MAIS FAZ: DIZ O QUE A CAMERA
        //    NAO FAZ. "does not support facial tracking, closing autofocus, or adjusting
        //    FOV", E DA A FAIXA DE FOCO EM 7,9 A 118 POLEGADAS. LIMITACAO PUBLICADA VALE
        //    MAIS QUE RECURSO PROMETIDO.
        // 12. A LOGITECH C920 APARECE TAMBEM COMO C920S (B07MM4V7NR, £42.49) COM 10.400
        //    AVALIACOES PROPRIAS — SAO POOLS SEPARADOS, NAO COMPARTILHADOS, E A DIFERENCA
        //    E UMA TAMPA DE PRIVACIDADE FISICA POR £0,50 A MENOS.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: OBSBOT TINY 2 (£249.00) E TINY 3 LITE (£169.00), PARA NAO DAR TRES VAGAS A
        // UMA LINHA DE PTZ QUE JA ESTA REPRESENTADA; LOGITECH BRIO 4K (333 AVALIACOES A
        // £93.30) E BRIO 100 (1,6 MIL); ACER (240, 241 E 328) E OS SEM MARCA COM MENOS DE
        // 150. AOC E EMEET APARECEM DUAS E TRES VEZES PORQUE AS FICHAS DELAS SE
        // CONTRADIZEM ENTRE SI, QUE E METADE DA MATERIA.
        // DENTRO: NOTA DE 4.0 A 4.6, PRECO DE £24.99 A £149.00, SEIS MARCAS.
        //
        // FOCUS KEYWORD: best webcam
        // VARIACOES TRABALHADAS: webcam uk / webcam for pc / 4k webcam / 1080p webcam /
        // webcam with microphone / webcam for zoom and teams / webcam aperture /
        // best webcam for low light / usb webcam / webcam field of view
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home-office',                 // SLUG DA CATEGORIA (URL)
            'name' => 'Home & Office',               // NOME EXIBIDO
            'description' => 'Kit to make working from home more comfortable and productive, ranked for UK buyers.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-webcam',                                                // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Webcam 2026: 10 Ranked on Aperture, Not Megapixels',    // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Webcam 2026: Top 10 Ranked and Compared',          // TITLE DA ABA/GOOGLE (46 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best webcam options on Amazon by aperture and sensor rather than the 4K badge, comparing f/1.8 to f/4.0 models from £24.99 to £149.00.', // META DESCRIPTION (152 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best webcam',                                       // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "In a British home office in November, the thing that decides whether you look like a person or a smudge is not resolution. It is how much light the lens lets through, and light gathered falls off with the square of the f-number. Every listing in this comparison publishes that figure and not one of them mentions it in a bullet: the apertures here run from f/1.8 to f/4.0, which is a 4.9-fold difference in light, and the widest belongs to a £29.95 camera while the narrowest belongs to a £27.76 one. Both sell themselves on automatic light correction instead, which is software raising the gain and, with it, the noise. Meanwhile the number everybody does shout about is the least reliable on the page. One camera badged 4K in its title declares 1080p in its own specification field. Another sells 4K/60fps and admits in its second bullet that the 60fps is at 1080p. Two more are USB 2.0 and note quietly that they default to 1080p unless you drive them through OBS. Below we rank the best webcam options on Amazon in August 2026 on aperture, sensor and field of view — the three specifications that actually change the picture.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "The best webcam for you is chosen from the specification table, not the title. Start with aperture: f/1.8 to f/2.0 is a camera that will cope with a grey afternoon and an overhead bulb, f/3.0 and above will lean on software gain and give you a grainy, washed picture in exactly the conditions you bought it for. Then field of view, which decides how much of your room is in shot — 65 to 78 degrees keeps the frame on you, 90 degrees and up brings in the kitchen behind you, and only one camera here lets you change it. Then, if the budget stretches, sensor size, which is the honest answer to why a £149 camera looks better than a £29 one at the same resolution and which exactly one listing publishes. By contrast, treat 4K as a tiebreaker rather than a requirement: Zoom, Teams and Google Meet negotiate 1080p or lower on most calls regardless of what the camera can do, two brands here say so in their own footnotes, and a 1080p sensor with a wide aperture will beat a 4K sensor behind a narrow one every time the light is poor. The camera with the most reviews on this page is 1080p, and so is the best-rated one.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                          // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 14:00:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Logitech C920 HD Pro Webcam, 1080p 30fps, 78 Degree FOV, Glass Lens',     // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£42.99',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 10722,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/610wQYbaVmL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best webcam',                                                        // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B006A2Q81M?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best webcam here on the combination that matters: 4.6 stars across 10,722 ratings, a five-element glass lens, and an honest 1080p badge in a category selling imaginary 4K.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Four point six stars across 10,722 ratings is the strongest combination of rating and depth on this page, and the C920 has held that position for over a decade by getting the parts right rather than the numbers big. The lens is five-element glass, not the plastic stack in most of this comparison, and glass is what stops the softness at the edges of frame that makes cheap webcams look like they were shot through a window. Field of view is 78 degrees, which frames a person and a chair rather than the whole room.

It is 1080p at 30fps and Logitech says so plainly in the first bullet. In a category where a £29.99 camera calls itself 4K and declares 1080p in its own specification table, a manufacturer stating its actual resolution is doing something the rest of this page is not. Autofocus is proper HD autofocus with light correction, there are two microphones for stereo, and it is certified for Chromebook as well as Windows, macOS, Android and Xbox.

Two things. The specification gives the maximum aperture as 3.5 Millimetres, which is the wrong unit — an f-number is a ratio, not a length — so the one figure this article says you should check is unusable on the listing with the best reputation. And there is no privacy shutter; the C920S at £42.49 is the same camera with one fitted, carrying its own separate pool of 10,400 ratings, and for fifty pence less it is arguably the better buy.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['4.6 stars across 10,722 ratings, the best combination on this page', 'Five-element glass lens rather than a plastic stack', 'States 1080p honestly instead of claiming an imaginary 4K', '78 degree field of view frames a person rather than the room', 'The only plausible focal length published here at 3.67mm'], // PONTOS POSITIVOS
                'contras' => ['Aperture given as 3.5 Millimetres, which is the wrong unit entirely', 'No privacy shutter, unlike the C920S at £0.50 less', '1080p only, if you genuinely need 4K for recording', 'Sensor technology field simply reads Other'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'UGREEN 4K/30fps Webcam, f/1.8 Aperture, 8MP Sensor, Auto Light',          // NOME (ENCURTADO)
                'price' => '£29.95',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 2229,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61WcCOrW5DL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'UGREEN 4K webcam with privacy cover',                                // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DT9MMZTL?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The widest aperture in this comparison at f/1.8, which gathers nearly five times the light of the narrowest — and it is the second cheapest 4K camera on the page.', // TEXTO CURTO (CARD)
                'body' => "Buried in the specification table is the best number on this page: maximum aperture f/1.8. Nothing else here is wider. Against the f/4.0 of the EMEET C950, which costs £2.19 less, that is (4.0 divided by 1.8) squared — 4.9 times as much light reaching the sensor. On a video call at four in the afternoon in January, with one ceiling light on, that is the difference between a picture and an apology. UGREEN never mentions it in a bullet; it sells auto light correction instead, which is the software fix for the problem a wide aperture solves in hardware.

The rest is consistent. It states an 8MP sensor, and 8MP is exactly what 4K needs — 3840 by 2160 is 8.29 megapixels — so unlike several rivals the resolution claim has a sensor behind it. Autofocus uses a stepper motor with an infrared rangefinder rather than contrast hunting, there is a detachable privacy cover, dual noise-cancelling mics, and 2,229 ratings at 4.5 stars. The published focal length of 4.25 is one of only two on this page that a webcam lens could physically have.

Two caveats. Thirty frames per second at 4K is the cap, so this is not a camera for fast movement. And the field of view is not published anywhere — no degrees in the title, the bullets or the table — which on the specification that decides whether your kitchen is in shot is a real omission. The screen size field reads 81 Millimetres on a camera with no screen.", // TEXTO SEO LONGO
                'pros' => ['f/1.8, the widest aperture here and 4.9x the light of the narrowest', '8MP sensor, which is exactly what genuine 4K requires', 'Stepper motor and infrared rangefinder autofocus rather than contrast hunting', 'Focal length of 4.25 is one of only two plausible figures on this page', '£29.95 with a detachable privacy cover and dual mics'], // PONTOS POSITIVOS
                'contras' => ['No field of view published anywhere on the listing', '30fps cap at 4K, so not suited to fast movement', 'Never mentions the aperture that is its best feature', 'Screen size field reads 81 Millimetres on a camera with no screen'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Anker PowerConf C200 2K Webcam, f/2.0, Switchable 65/78/95 Degree FOV',   // NOME (ENCURTADO)
                'price' => '£45.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 9314,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61x85jnqUUL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Anker PowerConf C200 2K webcam with privacy cover',                  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09MFMTMPD?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only camera here that lets you change the field of view — 65, 78 or 95 degrees — plus f/2.0 and 9,314 ratings, on a sensible 2K rather than a doubtful 4K.', // TEXTO CURTO (CARD)
                'body' => "Field of view is the specification most people discover they care about only after the first call, when a colleague mentions the washing. Every other camera in this comparison has one fixed angle. This one has three — 65, 78 and 95 degrees, switched in the AnkerWork software — so the same camera frames a head and shoulders for a job interview and a whole desk for a demo. Nobody else on this page offers that, and it is worth more day to day than the difference between 2K and 4K.

It is also the second widest aperture here at f/2.0, which Anker actually does mention: the fourth bullet says the larger aperture size captures more light so you look bright without a ring light. That is the correct argument, made in the correct place, and it is the only bullet in the entire comparison that connects aperture to how you will look. There is a built-in privacy cover, AI noise cancellation on dual mics, and 9,314 ratings at 4.4 stars — the second deepest sample here.

Two things to weigh. At £45.99 it is the most expensive camera on this page outside the £149 PTZ unit, and it is 2K rather than 4K — 2560 by 1440 against 3840 by 2160 — which for video calls is the right call and for recording is a limitation. And the specification table gives the maximum focal length as 30 Millimetres, roughly seven times what a webcam lens actually is, so the field-by-field carelessness that runs through this category reaches Anker too.", // TEXTO SEO LONGO
                'pros' => ['Switchable 65, 78 or 95 degree field of view, unique in this comparison', 'f/2.0, the second widest aperture here, and the only listing that explains why', '9,314 ratings at 4.4 stars, the second deepest sample on this page', 'Built-in sliding privacy cover and AI noise cancellation', '2K is an honest claim rather than a doubtful 4K'], // PONTOS POSITIVOS
                'contras' => ['£45.99, the dearest here outside the £149 PTZ camera', '2K rather than 4K, which limits it for recording', 'Focal length published as 30 Millimetres, about seven times reality', 'Field of view changes need the AnkerWork software installed'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'AOC AC410 4K Webcam, Sony IMX363 Sensor, PDAF, 75 Degree FOV',            // NOME (ENCURTADO)
                'price' => '£41.64',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 149,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61-Y0+Yj7sL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'AOC AC410 4K webcam with privacy shutter and tripod',                // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GSV1RYPV?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing of ten that names its sensor — a Sony IMX363 — which is a real part number you can look up, though the 4K/60fps in the title is really 1080p at 60.', // TEXTO CURTO (CARD)
                'body' => "Sony IMX363. That is a specific, checkable component with a published datasheet, and AOC putting it in the first bullet is the single most useful disclosure in this comparison — it is the same behaviour we found among dash cams, where the models with genuine 4K were the ones willing to name the chip. Eight other listings here say CMOS and stop, which tells you as much as saying a car has an engine.

The rest of the specification is thoughtfully chosen for a home office rather than a spec sheet. Seventy-five degrees of field of view is deliberately narrow, and AOC explains why: it crops out the clutter behind you rather than including it. There is phase detection autofocus, which locks rather than hunting when you hold a document up, a physical privacy shutter, dual mics rated to three metres, a USB-A to C adapter and a desktop tripod in the box.

Two things stop it going higher. The title says 4K/60fps and the second bullet says 1080P @ 60FPS — the 60 frames belong to 1080p, not to 4K, and welding the best number from two different modes into one headline is exactly what this article is about. And 149 ratings is by far the thinnest sample on this page, so the 4.4 stars rest on very few people. The aperture is a middling f/3.0, which is where the wider-aperture cameras above it pull ahead in poor light despite the better sensor.", // TEXTO SEO LONGO
                'pros' => ['Names the Sony IMX363 sensor, the only listing here to identify its chip', '75 degree field of view deliberately crops out background clutter', 'Phase detection autofocus locks instead of hunting on documents', 'Physical privacy shutter, USB-A to C adapter and tripod included', 'Dual microphones rated to three metres'], // PONTOS POSITIVOS
                'contras' => ['Title says 4K/60fps, the bullet says the 60fps is at 1080p', '149 ratings, by far the thinnest sample in this comparison', 'f/3.0 aperture is middling, behind three cheaper cameras here', 'Focal length published as 30, which no webcam lens is'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'EMEET C960 1080P Webcam, f/2.8, 90 Degree FOV, Dual Mics',                // NOME (ENCURTADO)
                'price' => '£24.99',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 32182,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61-K2lXmHQL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'EMEET C960 1080p webcam with privacy cover',                         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07M6Y7355?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most reviewed webcam in the category at 32,182 ratings and the cheapest here at £24.99, honestly badged 1080p, with a 90 degree view that shows your room.', // TEXTO CURTO (CARD)
                'body' => "Thirty-two thousand one hundred and eighty-two ratings is more than three times the next deepest sample on this page, and it costs £24.99. That is the argument, and for a great many people it is enough of one. It is a straightforward 1080p camera with a 5-layer anti-glare lens, two omnidirectional noise-reducing microphones, a sliding privacy cover, a foldable clip that also takes a tripod, and unusually broad compatibility including Linux, Android TV and, oddly specifically, the Switch 2.

The aperture is f/2.8, which puts it fourth on this page — better than both AOCs and both other EMEETs, and well behind the f/1.8 UGREEN. In a well-lit room that will not matter; in a dim one it will.

Three things to weigh. The field of view is 90 degrees, which EMEET sells as accommodating more participants and which in a home office means your bookshelves, your door and whoever walks through it are all in shot — for one person at a desk, the 75 and 78 degree cameras above frame better. Four point two stars is the lowest average among the deeply-reviewed cameras here, and on 32,182 ratings that is settled rather than noisy. And the specification table gives the maximum focal length as 3600 Millimetres, which is 3.6 metres — a wildlife telephoto lens, on a £24.99 camera clipped to a monitor.", // TEXTO SEO LONGO
                'pros' => ['32,182 ratings, more than three times the next deepest sample here', '£24.99, the joint cheapest camera in this comparison', 'Honestly badged 1080p rather than claiming 4K', 'f/2.8 aperture, ahead of five cameras on this page including both AOCs', 'Works with Linux and Android TV as well as Windows and macOS'], // PONTOS POSITIVOS
                'contras' => ['4.2 stars, the lowest average among the well-reviewed cameras here', '90 degree field of view puts your whole room in shot', 'Focal length published as 3600 Millimetres, or 3.6 metres', 'Flash memory type field lists SDHC and SDXC on a camera with no card slot'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'OBSBOT Tiny 2 Lite 4K PTZ Webcam, 1/2 Inch Sensor, AI Tracking',          // NOME (ENCURTADO)
                'price' => '£149.00',                                                               // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 1958,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51WarvcFlCL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'OBSBOT Tiny 2 Lite AI tracking PTZ webcam on gimbal',                // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CZ6XY78Y?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing here that publishes a sensor size — 1/2 inch, roughly four times the area of a budget webcam — which is the honest answer to why cheap 4K looks grainy.', // TEXTO CURTO (CARD)
                'body' => "One half inch. That figure, in the second bullet, is the most informative number in this comparison after the apertures, and OBSBOT is alone in giving it. A 1/2 inch sensor has around four times the light-collecting area of the roughly quarter-inch sensors in a £25 to £30 webcam, and sensor area is the real reason two cameras at the same resolution look nothing alike. If you have ever wondered why your 4K webcam is grainy while a phone camera at the same resolution is not, this is the answer, and £149.00 is what it costs.

What the money also buys is motion. A two-axis gimbal pans 300 degrees and tilts 180, with AI tracking in full-body, upper-body and close-up modes, preset positions that store their own tracking behaviour, and gesture control — an open palm locks tracking onto you, a raised finger zooms. For teaching, demonstrating at a whiteboard or presenting while moving, nothing else on this page can follow you at all.

Three reservations. At £149.00 it is five times the median price here. The specification table is nearly empty — no aperture, no focal length, no field of view, and the media type field reads NOT Available, Rely on Your PC/Mac — so the sensor size is all you get. And 4.3 stars across 1,958 ratings is mid-table, which for a camera at this price suggests the gimbal and software add failure modes a fixed camera does not have.", // TEXTO SEO LONGO
                'pros' => ['The only listing here that publishes a sensor size, at 1/2 inch', 'Roughly four times the sensor area of a budget webcam', 'Two-axis gimbal with 300 degree pan and AI subject tracking', 'Gesture control and preset positions with per-preset tracking modes', '60fps and HDR with 1,958 ratings behind it'], // PONTOS POSITIVOS
                'contras' => ['£149.00, five times the median price in this comparison', 'No aperture, focal length or field of view published anywhere', 'Media type field reads NOT Available, Rely on Your PC/Mac', '4.3 stars is mid-table for the most expensive camera here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'UGREEN 2K/30fps Webcam, f/2.2, 4MP CMOS Sensor, Privacy Cover',           // NOME (ENCURTADO)
                'price' => '£24.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 2515,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61IMUq6CKQL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'UGREEN 2K webcam with removable privacy cover',                      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DGXFNVLD?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'States a 4-megapixel sensor for 2K, which is arithmetically correct where most of this page rounds up, and holds a respectable f/2.2 for £24.99.', // TEXTO CURTO (CARD)
                'body' => "Two K is 2560 by 1440, which is 3.69 megapixels, so a listing describing a 4-megapixel sensor is telling you the truth with a sensible rounding. That sounds like faint praise until you read the rest of this page, where a camera badged 4K declares 1080p in its own table. UGREEN says 2K, says 30fps, says 4MP, and all three agree.

At £24.99 it is the joint cheapest camera in the comparison and the aperture is f/2.2, third widest here and ahead of everything above £29.95 except the Anker. For a well-lit desk that is a genuinely good combination, and the dual microphone system captures stereo rather than the mono most cheap cameras deliver. There is a removable privacy cover and 2,515 ratings at 4.3 stars.

Two gaps and one oddity. No field of view is published, which is the same omission as its 4K sibling at number two and remains the specification you most want on a camera that will sit in your living room. There is no autofocus mentioned anywhere, which at this price usually means fixed focus — fine for a face at arm's length, poor for holding a document up. And the specification gives the maximum focal length as 105.0 with no unit, which is not a number any webcam lens has in millimetres or anything else; the sibling model manages a plausible 4.25 in the same field.", // TEXTO SEO LONGO
                'pros' => ['4MP stated for 2K, which is arithmetically correct', 'f/2.2, third widest aperture in this comparison', '£24.99, joint cheapest camera here', 'Dual microphones capturing stereo rather than mono', 'Removable privacy cover with 2,515 ratings at 4.3 stars'], // PONTOS POSITIVOS
                'contras' => ['No field of view published anywhere on the listing', 'No autofocus mentioned, which usually means fixed focus', 'Focal length given as 105.0 with no unit', '2K rather than 4K, if you need the resolution for recording'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'EMEET NOVA 4K Webcam, PDAF, 73 Degree FOV, USB 2.0',                      // NOME (ENCURTADO)
                'price' => '£37.98',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 2256,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61bCeQBjUwL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'EMEET NOVA 4K webcam with adjustable stand',                         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CY2C7H6S?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most honest listing in the comparison and the one that gives away the category: it admits the resolution defaults to 1080p and that the camera is USB 2.0.', // TEXTO CURTO (CARD)
                'body' => "Read to the end of the first bullet and EMEET tells you what nobody else will. Note: video resolution defaults to 1080P; switch to 4K via built-in camera software or apps like PotPlayer or OBS. In other words, in Zoom, Teams and Google Meet — which is what almost everybody buys a webcam for — this 4K camera gives you 1080p, and getting the 4K out of it means driving it through recording software. The fourth bullet then states it is a USB 2.0 device, which is 480 megabits a second: enough for compressed 1080p, tight for 4K30. The two facts fit together, and between them they explain most of the disappointment in this whole category.

EMEET goes further in a direction almost no manufacturer does: it publishes what the camera cannot do. No facial tracking, no way to disable autofocus, no adjustable field of view, autofocus limited to a range of 7.9 to 118 inches. A published limitation is worth more than a promised feature, and 2,256 ratings at 4.5 stars is the joint second best average here.

The reasons it sits at eight are physical. The aperture is f/3.3, second narrowest on the page, so in poor light it will be beaten by cameras costing £8 less. The field of view is a fixed 73 degrees, which is well judged for one person but cannot be changed. And the specification table records the video capture resolution as Nova 4K — the product's own marketing name pasted into the resolution field.", // TEXTO SEO LONGO
                'pros' => ['Admits the resolution defaults to 1080p outside recording software', 'States plainly that it is a USB 2.0 device', 'Publishes what the camera cannot do, which nobody else here does', 'PDAF autofocus with a stated 7.9 to 118 inch range', '4.5 stars across 2,256 ratings with a fixed 73 degree framing'], // PONTOS POSITIVOS
                'contras' => ['f/3.3 aperture, second narrowest in this comparison', 'USB 2.0 bandwidth is tight for 4K at 30fps', 'Resolution field in the specification reads Nova 4K', 'Focal length published as 3000 Millimetres'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'AOC 4K Webcam with Microphone, Privacy Cover, USB-A and USB-C',           // NOME (ENCURTADO)
                'price' => '£29.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 3815,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61t2DDONFfL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'AOC 4K webcam with privacy cover and swivel mount',                  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FPQW34HP?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Titled a 4K webcam, described as 4K in its first bullet, and declaring 1080p in its own specification table — a quarter of the pixels, on the best-rated listing here.', // TEXTO CURTO (CARD)
                'body' => "This is the clearest single contradiction we found in the category. The title says 4K Webcam. The first bullet says 4K UHD Video Calling and 4k at 30fps. The specification table on the same page says Video capture resolution: 1080p. Those are 8.29 megapixels and 2.07 megapixels — a quarter of the pixels — and there is no way from the listing to tell which is true.

It is worth being fair about the rest, because 3,815 people have rated this 4.6 stars, the joint highest average on the page. It is £29.99, there is a sliding physical privacy cover, a USB-A to USB-C adapter in the box, 180 degree tilt and 360 degree swivel, and a noise-cancelling microphone. Most buyers are clearly happy, and the camera is very likely a competent 1080p unit — which at £29.99 is a fair thing to be.

Three more fields undermine the page rather than the product. The sensor technology is given as CCD, a technology that disappeared from consumer webcams more than a decade ago and which every other camera here correctly lists as CMOS. The flash memory type is CompactFlash, on a camera with no card slot. And the field of view is 90 degrees in the first bullet while the page title says 99 degrees. The aperture is f/3.0, mid-table. If you want a £30 webcam this may well serve you; just do not buy it expecting 4K, because its own specification says you are not getting it.", // TEXTO SEO LONGO
                'pros' => ['4.6 stars across 3,815 ratings, the joint highest average here', '£29.99 with a sliding physical privacy cover', 'USB-A to USB-C adapter included for modern laptops', '180 degree tilt and 360 degree swivel mount', 'Noise-cancelling microphone and automatic light correction'], // PONTOS POSITIVOS
                'contras' => ['Sold as 4K while its own specification says 1080p', 'Sensor technology listed as CCD, which no modern webcam uses', 'Flash memory type given as CompactFlash on a camera with no card slot', 'Field of view is 90 degrees in the bullet and 99 in the page title'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'EMEET C950 4K Webcam, 8MP, PDAF, 73 Degree FOV, USB 2.0',                 // NOME (ENCURTADO)
                'price' => '£27.76',                                                                // PRECO
                'rating' => 4.0,                                                                    // NOTA
                'reviews_count' => 1026,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/611Ge42MkLL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'EMEET C950 4K webcam with flexible bracket',                         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D7VD5SMS?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The narrowest aperture in the comparison at f/4.0 — roughly a fifth of the light the £29.95 UGREEN gathers — attached to the lowest rating on the page.', // TEXTO CURTO (CARD)
                'body' => "Maximum aperture: 4 f. That is the narrowest figure on this page and it is the reason this camera finishes last. Against the f/1.8 of the UGREEN at number two, which costs £2.19 more, it gathers roughly a fifth of the light — (4.0 divided by 1.8) squared is 4.9 — and the first bullet nonetheless describes the camera as an excellent solution for scenarios requiring low-light performance. A narrow aperture is precisely the wrong hardware for that claim, and the software correction that has to compensate is what produces the grain.

The specification is otherwise reasonable. Eight megapixels is the right sensor count for 4K, PDAF gives fast, stable focus, the 73 degree field of view frames one person cleanly, the bracket articulates 15 degrees forward and 90 back for high and low desk angles, and EMEET repeats its honest note that the resolution depends on the software you drive it with. It is USB 2.0, stated plainly in the fourth bullet, and the compatibility list is the longest here.

Four point zero stars across 1,026 ratings is the lowest average in this comparison, and given the aperture that is not surprising — people buy a 4K webcam expecting to look better and find they look darker. The focal length field reads 1000 Millimetres, the screen size 3.8 inches on a camera with no screen, and the flash memory type SDHC and SDXC on one with no card slot. The hardware may be honest about its resolution; it is the light it lets in that lets it down.", // TEXTO SEO LONGO
                'pros' => ['8 megapixels, the correct sensor count for genuine 4K', 'PDAF autofocus for fast, stable locking on faces and documents', '73 degree field of view frames one person without the room', 'Bracket articulates 15 degrees forward and 90 back', 'Repeats the honest note that resolution depends on your software'], // PONTOS POSITIVOS
                'contras' => ['f/4.0, the narrowest aperture here and a fifth the light of the widest', 'Sold for low-light performance on the worst aperture on this page', '4.0 stars, the lowest average in this comparison', 'Focal length field reads 1000 Millimetres'], // PONTOS NEGATIVOS
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
        $this->command?->info("WebcamsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
