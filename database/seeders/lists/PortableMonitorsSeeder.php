<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class PortableMonitorsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE MONITORES PORTATEIS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=portable+monitor&rh=p_36%3A6000-  (20 ASINS EM 22 CARDS)
        // CATEGORIA HOME & OFFICE.
        //
        // ─── ACHADO PRINCIPAL: COBERTURA sRGB NAO PASSA DE 100% ───
        // 1. "% sRGB" E COBERTURA: A FRACAO DO GAMUT sRGB QUE O PAINEL CONSEGUE
        //    REPRODUZIR. POR DEFINICAO O TETO E 100% — NAO SE COBRE MAIS DO QUE TUDO. OS
        //    NUMEROS ACIMA DE 100 QUE APARECEM NESTA CATEGORIA SAO OUTRA MEDIDA: VOLUME
        //    OU AREA DE GAMUT EM RELACAO A sRGB, QUE DIZ QUE O PAINEL E MAIS AMPLO, NAO
        //    QUE ELE ACERTA A COR. E PIOR: UM PAINEL DE GAMUT AMPLO SEM MODO sRGB EXIBE
        //    CONTEUDO COMUM DE WEB E ESCRITORIO SATURADO DEMAIS. A TABELA COLETADA:
        //      COOLHOOD 15,6" .... 100% sRGB ..... TETO EXATO, UNICO CREDIVEL NO TOPO
        //      COCOPAR 15,6" ..... 85% sRGB ...... COBERTURA REAL, ABAIXO DE 100
        //      COCOPAR 18,5" ..... 120% sRGB ..... IMPOSSIVEL COMO COBERTURA
        //      UPERFECT 15,6" .... 125% sRGB
        //      UPERFECT 18,5" .... 145% sRGB ..... O MAIOR DA BUSCA
        //      ARZOPA (x2), ASUS, LENOVO, CUIUIC .. NAO PUBLICAM
        // 2. A COCOPAR USA AS DUAS MEDIDAS NA MESMA LINHA DE PRODUTO: 85% NO MODELO DE
        //    15,6" E 120% NO DE 18,5". E CHAMA OS 120% DE "120% sRGB COLOR ACCURACY",
        //    QUE E EXATAMENTE AO CONTRARIO — GAMUT MAIOR SEM CLAMP SIGNIFICA MENOS
        //    PRECISAO EM sRGB, NAO MAIS.
        // 3. A UPERFECT, CURIOSAMENTE, E A QUE ESCREVE CERTO: "reproduces 25% MORE
        //    COLOURS THAN the standard sRGB gamut". E A FRASE TECNICAMENTE CORRETA PARA
        //    OS 125% DELA — E MESMO ASSIM O TITULO DIZ "125% sRGB".
        //
        // ─── ACHADO SECUNDARIO: BRILHO, A ESPECIFICACAO QUE SOME ───
        // 4. NIT (cd/m2) DECIDE SE A TELA SERVE NUM TREM OU PERTO DE UMA JANELA, QUE E
        //    LITERALMENTE O CASO DE USO DE UM MONITOR PORTATIL. QUEM PUBLICA:
        //      UPERFECT 18,5" ... 600 nits  (E COMPARA: "outshines typical 300-nit")
        //      CUIUIC 15,6" ..... 400 cd/m2
        //      ARZOPA 2.5K ...... 350 NO TITULO E 400 NO BULLET  ← CONTRADICAO
        //      COCOPAR 18,5" .... 350 nits
        //      LENOVO L15 ....... 250 nits
        //      COCOPAR 15,6", UPERFECT 15,6", ARZOPA 15,6", ASUS, COOLHOOD .. NADA
        //    CINCO DOS DEZ NAO PUBLICAM BRILHO NENHUM. E A ARZOPA 2.5K DA DOIS VALORES
        //    DIFERENTES NA MESMA PAGINA, 14% APARTADOS.
        //
        // ─── OUTROS ACHADOS ───
        // 5. TEMPO DE RESPOSTA: A ARZOPA DECLARA 25 ms NO MODELO DE 15,6" E 26 ms NO
        //    2.5K, CONTRA 1 ms DA UPERFECT 18,5", 3 ms DE TRES MODELOS, 5 ms DA COCOPAR E
        //    DA ASUS E 6 ms DA LENOVO. SAO 8 A 26 VEZES MAIS LENTO QUE O RESTO DA LISTA —
        //    E OS DOIS ANUNCIOS DA ARZOPA TRAZEM "PS4/5 Xbox" NO TITULO.
        // 6. A COOLHOOD ESCREVE O AVISO MAIS UTIL DE TODA A CATEGORIA, E E A UNICA:
        //    "if your device's USB type C port is not USB 3.1 or Thunderbolt 3, then this
        //    USB C port will CHARGE POWER ONLY without transmitting any signal". ESSA E A
        //    CAUSA NUMERO UM DE UM MONITOR PORTATIL NAO FUNCIONAR, E NOVE ANUNCIOS
        //    PREFEREM NAO MENCIONAR. (A COCOPAR E A CUIUIC CHEGAM PERTO COM UMA NOTA
        //    SOBRE THUNDERBOLT, SEM EXPLICAR A CONSEQUENCIA.)
        // 7. A ASUS E A UNICA QUE DECLARA A DIFERENCA ENTRE PAINEL E AREA UTIL NO PROPRIO
        //    TITULO: "16 inch (15.6 inch viewable)". TODAS AS OUTRAS PUBLICAM UM NUMERO SO.
        // 8. A UPERFECT 18,5" DECLARA "Resolution: FHD ULTRA WIDE 1080p" COM "Aspect
        //    ratio: 16:9" NA MESMA TABELA. ULTRAWIDE E 21:9; 16:9 NAO E ULTRAWIDE. E
        //    VENDE UM LCD COMO "OLED-like Color" E "OLED-grade color performance".
        // 9. A COOLHOOD DECLARA "Screen surface description: Glossy" NA TABELA E NAO
        //    MENCIONA ISSO EM BULLET NENHUM. TELA BRILHANTE NUM MONITOR FEITO PARA USAR
        //    EM TREM E CAFE E O OPOSTO DO QUE SE QUER — TODOS OS OUTROS NOVE SAO MATTE OU
        //    ANTI-GLARE.
        // 10. POOL DE AVALIACAO COMPARTILHADO EM TRES MARCAS:
        //      COCOPAR 15,6" ... B0DHGK334H (£89.99) E B07ZLY26FW (£85.99), 6,1 MIL CADA
        //      UPERFECT 18,5" .. B0FXFR8NFD (£149.99) E B0FV8K6C9R (£129.99), 1,7 MIL
        //      COOLHOOD ........ B0CZNWKV25 (15,6", £55.99) E B0CZNWP1B8 (18,5", £119.99),
        //                        1,1 MIL CADA — TAMANHOS DE TELA DIFERENTES, MESMO POOL
        //    O CASO DA COOLHOOD E O MAIS GRAVE: SAO 15,6 E 18,5 POLEGADAS, £64 APARTADOS.
        // 11. A LENOVO PUBLICA A GARANTIA MAIS LONGA DA LISTA (3 ANOS), O PESO COM SUPORTE
        //    (1,7 kg), O BRILHO (250 nits) E DUAS CERTIFICACOES TUV RHEINLAND — E TEM A
        //    NOTA MAIS BAIXA DA LISTA, 4.2.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: OS "laptop screen extender" DE TELA TRIPLA (KEFEYA, B0H14D3WRQ), QUE SAO
        // OUTRO PRODUTO; O AMAZON BASICS DE 23,8" (MONITOR DE MESA POLUINDO A BUSCA); OS
        // ASINS IRMAOS DA COCOPAR, DA UPERFECT E DA COOLHOOD (MANTIDO UM DE CADA POOL);
        // MSI (79 AVALIACOES), UFYQL (140) E OS SEM MARCA COM MENOS DE 200.
        // DENTRO: NOTA DE 4.2 A 4.8, PRECO DE £49.99 A £149.99, OITO MARCAS.
        //
        // FOCUS KEYWORD: best portable monitor
        // VARIACOES TRABALHADAS: portable monitor uk / travel monitor /
        // second screen for laptop / usb c portable monitor /
        // 15.6 inch portable monitor / 18.5 inch portable monitor /
        // portable monitor for laptop / 2.5k portable monitor /
        // laptop screen extender / portable monitor brightness nits
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home-office',                 // SLUG DA CATEGORIA (URL)
            'name' => 'Home & Office',               // NOME EXIBIDO
            'description' => 'Kit to make working from home more comfortable and productive, ranked for UK buyers.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-portable-monitor',                                      // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Portable Monitor 2026: 10 Ranked on Colour and Brightness', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Portable Monitor 2026: Top 10 Compared',           // TITLE DA ABA/GOOGLE (44 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best portable monitor options on Amazon by checking the sRGB and brightness claims, comparing 15.6 to 18.5 inch screens from £49.99 to £149.99.', // META DESCRIPTION (158 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best portable monitor',                             // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "sRGB coverage is the percentage of a colour standard a screen can reproduce, so 100% is the ceiling — you cannot cover more than all of something. Yet this comparison contains monitors advertised at 120%, 125% and 145% sRGB. Those figures are not coverage; they are gamut volume, a different measurement that says the panel is wider than sRGB without saying whether it hits sRGB accurately. In practice a wide-gamut screen with no sRGB mode shows ordinary web pages and spreadsheets oversaturated, so the big number can mean worse colour, not better. Cocopar demonstrates the confusion inside one product line, quoting an honest 85% on its 15.6-inch model and 120% on its 18.5-inch — and calling the second one colour accuracy. Meanwhile the specification that actually decides whether you can use one of these on a train is brightness, and five of the ten publish no figure at all; a sixth says 350 nits in its title and 400 in its bullets. Below we rank the best portable monitor options on Amazon in August 2026 on the numbers that can be checked, and flag the ones that cannot.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Choosing the best portable monitor comes down to three numbers and one warning. Brightness first: 250 nits is a dim indoor screen, 350 is workable, and 400 or more is what you need beside a window or on a train, which is where a portable monitor spends its life — so treat a listing with no nit figure as a listing hiding a low one. Then colour: 100% sRGB is the highest honest coverage claim anyone can make, anything below it is a straightforward statement of a limitation, and anything above it is a different measurement being used to look like a bigger version of the same one. Then response time, which is buried in the specification table rather than the bullets and ranges from 1 millisecond to 26 across these ten — a 26ms panel will smear visibly on anything that moves, and two of them are sold for consoles. The warning is about the cable. A USB-C port only carries video if the host supports DisplayPort Alt Mode, and if yours does not the monitor will charge and show nothing; one listing here spells that out and nine do not. Check your laptop before you order, not after.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                          // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 10:00:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'cocopar 15.6 Inch Portable Monitor, 1080p, 85% sRGB, 670g, VESA',         // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£89.99',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.8,                                                                    // NOTA
                'reviews_count' => 6192,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71OeakpV5yL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best portable monitor',                                              // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DHGK334H?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best portable monitor here on evidence — 6,192 ratings at 4.8, the highest of both — and the only listing that publishes an sRGB figure below 100 and means it.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Six thousand one hundred and ninety-two ratings at 4.8 stars is the deepest sample and the highest average in this comparison, a combination nothing else here matches. It is also the listing that behaves as if the numbers will be checked: 85% sRGB, stated plainly in the title. Eighty-five per cent is a real coverage figure, it is below the 100% ceiling, and it tells you honestly that this panel does not quite reach the full sRGB gamut. Three monitors on this page quote 120%, 125% and 145%, none of which is a coverage figure at all.

The specification is complete in a way that is rare here. Contrast 1000:1, response 5ms, refresh 60Hz, power draw 8 watts, weight 670g, 4mm at the thinnest point, two full-featured USB-C ports plus mini HDMI, and two VESA holes for mounting. It supports power pass-through so a single cable can run the monitor and charge the laptop, and the listing is careful to note the host must support Thunderbolt 3/4 or USB 3.1 Type-C DP Alt Mode.

Two things it does not tell you. There is no brightness figure anywhere — no nits in the title, the bullets or the specification table — which on a screen designed to be used away from a desk is the most important omission possible. And this exact monitor sells under a second cocopar ASIN at £85.99 with the same 6.1 thousand ratings, so it is worth checking both listings before ordering. At 60Hz and 5ms it is a work screen rather than a gaming one, which the honest 85% figure rather implies anyway.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['6,192 ratings at 4.8, the deepest sample and highest rating here', '85% sRGB is a real coverage figure, honestly below the 100% ceiling', 'Full specification: 1000:1, 5ms, 60Hz, 8W, 670g, 4mm thin', 'Two full-featured USB-C ports plus mini HDMI and power pass-through', 'VESA mountable with a 90 degree adjustable kickstand'], // PONTOS POSITIVOS
                'contras' => ['No brightness figure published anywhere on the listing', 'Sold under a second cocopar ASIN at £85.99 with the same review pool', '85% sRGB means visibly less colour range than a 100% panel', '60Hz and 5ms make it a work screen rather than a gaming one'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'UPERFECT 15.6 Inch Portable Monitor, 2000:1 Contrast, 3ms, USB-C',        // NOME (ENCURTADO)
                'price' => '£53.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 5023,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61Y7neu1yfL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'UPERFECT 15.6 inch portable monitor with kickstand',                 // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C9HYX4G7?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Twice the contrast ratio of most of this page at 2000:1, and the only brand that describes its above-100% colour figure correctly, as more colours than sRGB rather than coverage.', // TEXTO CURTO (CARD)
                'body' => "Two thousand to one contrast is double what the cocopar above it, the ASUS and the Lenovo manage, and on a portable monitor it is more noticeable than any of the resolution numbers — blacks that are actually dark rather than dark grey change how a screen looks in a dim train carriage far more than a few percent of colour gamut. Add 3ms response, a 15.6-inch IPS panel and 5,023 ratings at 4.6 stars, and £53.99 starts to look like the value pick of the comparison.

The colour claim deserves credit for its wording. The title says 125% sRGB, which as a coverage figure is impossible, but the third bullet explains what is actually meant: this monitor reproduces 25% more colours than the standard sRGB gamut. That is the technically correct description of gamut volume, and UPERFECT is the only brand here to give it. Bear in mind what it implies in practice — a wide-gamut panel without an sRGB clamp shows normal web content oversaturated, so this is a screen for looking at photographs rather than for matching colours accurately.

Two omissions. No brightness figure appears anywhere, the same gap as at number one, and on a monitor sold for portability that keeps recurring. And the listing notes at the end that no power plug is supplied, framed as an environmental choice; a single USB-C cable from a laptop will run it, but if your laptop port cannot supply enough power you will need a plug you do not have.", // TEXTO SEO LONGO
                'pros' => ['2000:1 contrast, double most of this comparison', '3ms response, among the fastest here', '5,023 ratings at 4.6 stars for £53.99', 'The only brand that words its above-100% colour figure correctly', 'Single USB-C cable for power and video, plus mini HDMI'], // PONTOS POSITIVOS
                'contras' => ['No brightness figure published anywhere', 'Title still says 125% sRGB, which is not a coverage figure', 'No power plug supplied in the box', 'Wide gamut with no sRGB mode oversaturates ordinary web content'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'COOLHOOD 15.6 Inch Portable Monitor, 100% sRGB, 2000:1, Smart Cover',     // NOME (ENCURTADO)
                'price' => '£55.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 1194,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71wrm4r4OoL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'COOLHOOD 15.6 inch portable monitor with smart cover stand',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CZNWKV25?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only 100% sRGB claim here — the highest figure anyone can honestly make — and the only listing that warns you your USB-C port might not carry video at all.', // TEXTO CURTO (CARD)
                'body' => "One hundred per cent sRGB is the ceiling, and this is the only monitor in the comparison that claims exactly it rather than a number that cannot mean coverage. Paired with 2000:1 contrast and 3ms response, that is a genuinely strong colour specification for £55.99, and 1,194 ratings at 4.6 stars support it.

More valuable still is the second bullet, which contains the single most useful sentence in this entire category: if your device's USB type C port is not USB 3.1 or Thunderbolt 3, then this USB C port will charge power only without transmitting any signal. That is the number one reason a portable monitor arrives and does not work — the host laptop's USB-C port does not support DisplayPort Alt Mode — and COOLHOOD is the only one of ten that spells out the consequence rather than burying a Thunderbolt reference in a compatibility list. If you are shopping this category, check your laptop's port against that sentence before you order anything on this page.

Two reservations, and one is physical. The specification table gives the screen surface as Glossy, and no bullet mentions it. Every other monitor in this comparison is matte or anti-glare, and a glossy panel on a screen designed for trains, cafes and hotel rooms will mirror every light behind you. There is also no brightness figure, so the two specifications that decide outdoor and bright-room usability are one missing and one working against you. The PU magnetic cover doubling as a stand is neat but offers only two fixed angles.", // TEXTO SEO LONGO
                'pros' => ['100% sRGB, the highest honest coverage claim anyone here makes', 'The only listing that explains USB-C DP Alt Mode and what happens without it', '2000:1 contrast with 3ms response for £55.99', 'Built-in dual speakers and a 3.5mm audio output', 'Magnetic PU cover doubles as a stand'], // PONTOS POSITIVOS
                'contras' => ['Screen surface listed as Glossy, the only one here that is not matte', 'No brightness figure published anywhere', 'Cover-stand gives only two fixed viewing angles', 'Shares its 1,194 ratings with an 18.5-inch COOLHOOD at £119.99'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'cocopar 18.5 Inch Portable Monitor, 100Hz, 350 nits, 1080p, 1kg',         // NOME (ENCURTADO)
                'price' => '£142.49',                                                               // PRECO
                'rating' => 4.8,                                                                    // NOTA
                'reviews_count' => 2671,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81kfr9CRW-L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'cocopar 18.5 inch portable monitor with kickstand',                  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DT6TJLWN?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The biggest screen here at 18.5 inches with 100Hz and a published 350 nits, from the same brand that quotes an honest 85% sRGB one model down and 120% on this one.', // TEXTO CURTO (CARD)
                'body' => "Eighteen and a half inches is nearly three inches more diagonal than the 15.6-inch panels that make up most of this category, and for spreadsheet work or a second code window that is a real difference — while still weighing 2.2 pounds and measuring 0.17 inches at the thinnest point. Add 100Hz refresh, 3ms response, 1200:1 contrast, two USB-C ports and an HDMI, four VESA holes and a 180 degree kickstand, and 2,671 ratings at 4.8 stars, and this is the most capable screen in the comparison.

It also publishes 350 nits, which puts it in the useful half of the page: five of these ten give no brightness figure at all, and 350 is enough for a bright office though not for direct sun.

Which makes the colour claim the more disappointing. Cocopar quotes 120% sRGB here and calls it colour accuracy, while quoting 85% sRGB on the 15.6-inch model at number one. Those are two different measurements presented as the same one, in the same brand's range: 85% is coverage of sRGB, 120% is gamut volume against sRGB, and describing the second as accuracy is precisely backwards — a panel with a gamut 20% wider than sRGB and no sRGB clamp renders ordinary content oversaturated. At £142.49 this is also the second most expensive monitor here, and 100Hz is only useful if the host can drive it, which over a single USB-C cable at 1080p most modern laptops can.", // TEXTO SEO LONGO
                'pros' => ['18.5 inches, the largest screen in this comparison, at 1kg', '100Hz refresh with 3ms response, the fastest combination here at this size', 'Publishes 350 nits, which half this page does not', '4.8 stars across 2,671 ratings', 'Four VESA holes, 180 degree kickstand, two USB-C and HDMI'], // PONTOS POSITIVOS
                'contras' => ['Quotes 120% sRGB and calls it colour accuracy, which is backwards', 'Same brand quotes an honest 85% coverage one model down', '£142.49, the second most expensive monitor in this comparison', '1080p across 18.5 inches is a lower pixel density than the 15.6-inch panels'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'CUIUIC 15.6 Inch Portable Monitor, 400 cd/m2, HDR, 0.6kg, 2-Year',        // NOME (ENCURTADO)
                'price' => '£49.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 2512,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71lUhiAGCzL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'CUIUIC 15.6 inch portable monitor with leather case stand',          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G29LWB6D?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest monitor here at £49.99 and the only 15.6-inch one that publishes its brightness — 400 cd/m2, the second highest figure on the page.', // TEXTO CURTO (CARD)
                'body' => "Four hundred candelas per square metre, printed in the first bullet. Of the seven 15.6 and 16-inch monitors in this comparison, this is the only one that tells you how bright the screen is, and 400 nits is the second highest figure anywhere on the page — enough to work beside a window, and the exact threshold at which the DisplayHDR 400 tier begins, which makes the HDR claim in the second bullet defensible rather than decorative. It costs £49.99, the least of any monitor here.

At 0.6kg it is also the lightest, and the non-magnetic leather case attaches permanently to the back as a stand with an anti-slip silicone base, which is a more stable arrangement than a fold-out cover. There is mini HDMI and USB-C, a memory function that restores your brightness and volume on power-up, and a two-year warranty. Two thousand five hundred and twelve ratings.

The gaps are in the specification table rather than the marketing. No contrast ratio, no response time and no refresh rate are published, which are three of the four numbers you would use to compare it with anything else here, and no sRGB figure either. Four point three stars is also the second lowest average in this comparison. The honest reading is that CUIUIC has published the one specification that matters most for portable use and stayed quiet about the rest — which is still better than the reverse, and is why it sits at five rather than lower.", // TEXTO SEO LONGO
                'pros' => ['400 cd/m2 published, the only 15.6-inch monitor here to state brightness', '£49.99, the cheapest monitor in this comparison', '0.6kg, the lightest screen on this page', 'Leather case stand with an anti-slip silicone base', 'Memory function restores settings on power-up, plus a two-year warranty'], // PONTOS POSITIVOS
                'contras' => ['No contrast ratio, response time or refresh rate published', 'No sRGB figure of any kind', '4.3 stars, the second lowest average in this comparison', 'Unbranded listing with no model number in the title'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'ASUS ZenScreen MB169CK, 16 Inch Panel, 15.6 Inch Viewable, USB-C',        // NOME (ENCURTADO)
                'price' => '£81.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 356,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81Dm7lfe3zL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'ASUS ZenScreen MB169CK portable USB monitor with kickstand',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DT4NRV5Z?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing in the comparison that admits the difference between panel size and viewable area, printing 16 inch and 15.6 inch viewable in the same title.', // TEXTO CURTO (CARD)
                'body' => "Every other monitor on this page gives you one screen size. ASUS gives you two, in the title: 16 inch, 15.6 inch viewable. Panels are cut larger than the area you actually see, and the gap is normally quietly absorbed into the marketing figure; ASUS printing both is the kind of small honesty that tells you how the rest of the specification was compiled. It also means that when a no-name 15.6-inch monitor sits beside this one, they are the same viewable size.

The build reflects a brand with a monitor business behind it. Anti-glare IPS, dual USB-C plus mini HDMI, TÜV Rheinland certification for both flicker-free operation and low blue light — an independent mark rather than a self-declared eye-care mode — an automatic orientation sensor that flips the display between landscape and portrait, a 360 degree kickstand and an embedded tripod socket on the rear, which no other monitor here offers and is genuinely useful for presenting.

Two things hold it at six. Three hundred and fifty-six ratings is the joint thinnest sample in this comparison, which for a major brand is a little surprising and means the 4.4 stars rest on relatively few people. And ASUS publishes no brightness figure, no contrast beyond 1000:1 and no sRGB percentage, so on the two specifications this article is about it says nothing at all — which is more defensible than saying something wrong, but leaves you buying on the badge.", // TEXTO SEO LONGO
                'pros' => ['The only listing that publishes both panel size and viewable size', 'TÜV Rheinland certified flicker-free and low blue light, independently marked', 'Automatic landscape and portrait orientation sensing', 'Embedded tripod socket plus a 360 degree kickstand, unique here', 'Dual USB-C and mini HDMI from a brand with a real monitor business'], // PONTOS POSITIVOS
                'contras' => ['No brightness figure published', 'No sRGB coverage figure published', '356 ratings, the joint thinnest sample in this comparison', '1000:1 contrast, half what two cheaper monitors here offer'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'UPERFECT 18.5 Inch NxtLED Portable Monitor, 600 nits, 120Hz, 1ms',        // NOME (ENCURTADO)
                'price' => '£149.99',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 1753,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71A8VRd-fWL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'UPERFECT 18.5 inch NxtLED portable monitor',                         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FXFR8NFD?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Six hundred nits is the brightest screen here by 200, and 1ms the fastest, on a listing that also claims 145% sRGB and OLED-grade colour from an LCD.', // TEXTO CURTO (CARD)
                'body' => "Six hundred nits is a serious number. It is 50% brighter than the next brightest screen in this comparison and more than double the Lenovo, and UPERFECT makes the comparison explicitly, noting that typical portable monitors run at 300. For a screen you will use on a train seat by a window, or on a garden table, that is the specification that decides whether the thing is usable at all. Pair it with 120Hz, 1ms response and 2000:1 contrast and the panel is the strongest on this page on every measurement it publishes.

It also discloses something almost nobody does: the blue light reduction works on the 415 to 455 nanometre band at the backlight rather than by tinting the image in software, which is the difference between a genuine hardware measure and a yellow filter. That is a real specification with a real number.

The marketing around it is where the trouble is. One hundred and forty-five per cent sRGB is the largest such claim in the comparison and it is not a coverage figure; OLED-like Color and OLED-grade color performance are being claimed for an LCD, which is a category difference rather than a degree; and the specification table gives the resolution as FHD Ultra Wide 1080p while listing the aspect ratio as 16:9, when ultrawide means 21:9. At £149.99 this is the most expensive monitor here, 4.4 stars is mid-table, and it shares its 1,753 ratings with a £129.99 UPERFECT listing for what appears to be the same screen.", // TEXTO SEO LONGO
                'pros' => ['600 nits, 50% brighter than anything else in this comparison', '120Hz with 1ms response, the fastest panel here', '2000:1 contrast on an 18.5-inch screen', 'Hardware blue light reduction specified at 415 to 455nm', 'Publishes a claimed 50,000 hour panel life'], // PONTOS POSITIVOS
                'contras' => ['145% sRGB is the largest non-coverage figure on this page', 'Claims OLED-grade colour performance from an LCD panel', 'Specification says FHD Ultra Wide with a 16:9 aspect ratio', '£149.99, the most expensive here, sharing its ratings with a £129.99 listing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'ARZOPA A1 15.6 Inch Portable Monitor, 1080p IPS, 1.63lb, Kickstand',      // NOME (ENCURTADO)
                'price' => '£79.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 2627,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71PlahfB7tL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'ARZOPA A1 15.6 inch portable monitor with built-in kickstand',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CJCCDV65?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Popular and well rated at 2,627 ratings, with a 25 millisecond response time buried in the specification table and PS4/5 and Xbox in the title.', // TEXTO CURTO (CARD)
                'body' => "Two thousand six hundred and twenty-seven ratings at 4.5 stars is a solid record, and the physical design is the best-judged part: 1.63 pounds is roughly half the weight of a laptop the same size, the top edge is 0.2 inches thick, and the kickstand is built in rather than being a folding cover, so it adjusts continuously and does not fall over. For carrying in the same bag as a laptop every day, that matters more than most specifications.

Then you open the specification table. Response time: 25 milliseconds. Every other monitor in this comparison is between 1 and 6, and 25ms means a moving image leaves a visible trail behind it — the panel simply cannot change state fast enough. The title advertises compatibility with PS3, PS4, PS5, Xbox and Switch. It will display those consoles, but anything moving quickly on screen will smear, and the listing puts the number in the one place a buyer scanning bullets will not look.

The rest is mid-table or below. Contrast is 800:1, the lowest in this comparison, on a page where two £55 monitors offer 2000:1. Power draw is a modest 6 watts. And there is no brightness figure and no sRGB figure anywhere, so of the four numbers that distinguish these screens, ARZOPA publishes one good one, one bad one and omits two. At £79.99 it costs £26 more than the UPERFECT at number two, which is faster, higher contrast and better rated.", // TEXTO SEO LONGO
                'pros' => ['2,627 ratings at 4.5 stars', '1.63lb, roughly half the weight of a same-size laptop', 'Built-in continuously adjustable kickstand rather than a folding cover', '6 watts, the lowest power draw in this comparison', 'USB-C and mini HDMI with three display modes'], // PONTOS POSITIVOS
                'contras' => ['25ms response time, four times slower than anything else here', 'Sold for PS4, PS5 and Xbox despite that response time', '800:1 contrast, the lowest in this comparison', 'No brightness and no sRGB figure published'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Lenovo L15 15.6 Inch Portable Monitor, 250 nits, TUV Certified, 3-Year',  // NOME (ENCURTADO)
                'price' => '£119.85',                                                               // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 360,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71x7IheNH7L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Lenovo L15 15.6 inch portable monitor with stand',                   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09CZ591ZV?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A three-year warranty and a published 250 nits, which is honest and also the dimmest screen in this comparison, at £119.85 with the lowest rating here.', // TEXTO CURTO (CARD)
                'body' => "Lenovo publishes the things a business buyer checks: 250 nits of brightness, 1.7kg with the stand, 9.5 watts, 1000:1 contrast, 6ms response, TÜV Rheinland certification for low blue light and flicker-free operation, VESA 100mm mounting, a Kensington security slot, and a three-year warranty — the longest on this page by a year. A cable and a sleeve are in the box. For a company buying twenty of these for a hybrid workforce, that list is the whole argument, and the Kensington slot alone rules out most of this page.

Two hundred and fifty nits is the honest part and the problem. It is a real published figure where five monitors here give none, and it is also the dimmest screen in the comparison — 150 nits below the CUIUIC at number five, which costs £69.86 less, and 350 below the UPERFECT at number seven. On a desk indoors it is fine. On a train in daylight, which is what portable monitors are for, 250 nits is where you start angling the screen away from the window.

The rating is the other difficulty. Four point two stars across 360 ratings is the lowest average in this comparison, from the most established brand on the page, at £119.85 — more than double the UPERFECT at number two which is rated 4.6 across 5,023. You are buying the warranty, the certifications and the security slot, and paying a considerable premium for them against panels that measure better on every published specification.", // TEXTO SEO LONGO
                'pros' => ['Three-year warranty, the longest in this comparison', 'Publishes brightness, weight with stand, power draw and contrast', 'TÜV Rheinland certified low blue light and flicker-free', 'VESA 100mm mount and a Kensington security slot, unique here', 'Cable and protective sleeve included in the box'], // PONTOS POSITIVOS
                'contras' => ['250 nits is the dimmest screen in this comparison', '4.2 stars, the lowest average on this page', '£119.85 for specifications that £53.99 monitors here beat', '360 ratings, the joint thinnest sample in this comparison'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'ARZOPA Z1RC 2.5K Portable Monitor, 16 Inch 2560x1600, 16:10',             // NOME (ENCURTADO)
                'price' => '£109.98',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 608,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Kyb26DewL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'ARZOPA Z1RC 2.5K 16 inch portable monitor in 16:10',                 // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CJC93CH9?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only high-resolution screen here at 2560 by 1600 in a useful 16:10 shape, undone by a 26 millisecond response and a brightness figure that changes between the title and the bullets.', // TEXTO CURTO (CARD)
                'body' => "This is the only monitor in the comparison that is not 1920 by 1080. Two thousand five hundred and sixty by 1600 across 16 inches is 189 pixels per inch against 141 on a 15.6-inch 1080p panel, and the 16:10 aspect ratio gives you noticeably more vertical space for spreadsheets, documents and code than 16:9 does. For text work that combination is the most useful thing on this page, and at 1.46 pounds and 0.36 inches thick it is no heavier for it.

Two numbers spoil it. The specification table gives the response time as 26 milliseconds, the slowest in this comparison and marginally worse than ARZOPA's own 15.6-inch model at number eight; on a screen sold in a title mentioning PS4, PS5 and Xbox, that is the wrong figure to be worst at. And the brightness is given twice and differently: 350nits in the title, 400nits in the first bullet. Those are 14% apart on the specification that decides whether the screen works in daylight, and there is no way to tell from the listing which is right.

The rest is reasonable. Twelve hundred to one contrast, 12 watts, USB-C and mini HDMI, plug and play with no software. Six hundred and eight ratings at 4.4 stars is a thin but acceptable sample. If you want the resolution and you work with static text, the response time will not trouble you and this is the sharpest screen here; if anything on it will move, look at the 1ms and 3ms panels above instead.", // TEXTO SEO LONGO
                'pros' => ['2560 x 1600, the only high-resolution screen in this comparison', '16:10 aspect ratio gives real extra vertical space for documents and code', '189 pixels per inch against 141 on the 1080p panels here', '1.46lb and 0.36 inches thick despite the larger 16-inch panel', 'Plug and play over USB-C or mini HDMI with no software'], // PONTOS POSITIVOS
                'contras' => ['26ms response time, the slowest in this comparison', 'Brightness given as 350 nits in the title and 400 in the bullets', 'Sold for consoles despite the response time', '608 ratings at £109.98, a thin sample for the price'], // PONTOS NEGATIVOS
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
        $this->command?->info("PortableMonitorsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
