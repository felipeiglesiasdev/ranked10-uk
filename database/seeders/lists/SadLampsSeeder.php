<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class SadLampsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE LUMINARIAS DE FOTOTERAPIA (SAD) DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=SAD+light+therapy+lamp&rh=p_36%3A2000-  (30 ASINS ANALISADOS)
        // CATEGORIA HOME. SAZONAL: PICO DE SETEMBRO A MARCO — OS SINTOMAS DE SAD COMECAM
        // ENTRE SETEMBRO E NOVEMBRO NO REINO UNIDO. E O MELHOR MOMENTO DO ANO PARA PUBLICAR.
        //
        // ⚠ FICOU EM "home" E NAO NUMA CATEGORIA NOVA DE SAUDE. CRIAR A 8ª CATEGORIA
        // (HEALTH & BEAUTY) E DECISAO DO FELIPE — REGISTRADA NO HANDOFF COMO PENDENTE PARA
        // A ESCOVA DE DENTES ELETRICA. AQUI E UMA LUMINARIA, E JA TEMOS "led-desk-lamp".
        //
        // PROFUNDIDADE DE AVALIACAO CONFERIDA ANTES DE ESCOLHER:
        // 915 / 745 / 696 / 500 / 497 / 403 / 383 / 374 / 369 / 346 / 252 / 215 / 214 / 203.
        //
        // ─── ACHADO PRINCIPAL: LUX SEM DISTANCIA NAO E MEDIDA ───
        // 1. LUX E ILUMINANCIA — LUMEN POR METRO QUADRADO NA SUPERFICIE QUE RECEBE A LUZ.
        //    CAI COM O QUADRADO DA DISTANCIA. LOGO, "10.000 lux" SEM DIZER A QUE DISTANCIA
        //    NAO E UMA ESPECIFICACAO: E UM NUMERO INFALSIFICAVEL. DAS DEZ, UMA SO PUBLICA
        //    A DISTANCIA:
        //      LUMIE MINI ... "provides 10,000 lux at a distance of 12cm"  ← UNICA
        //    E PUBLICAR ISSO REVELA O TAMANHO DO PROBLEMA. A 12 cm SAO 10.000 lux; A 24 cm
        //    SAO 2.500; A 50 cm (DISTANCIA REAL DE MESA) SAO 10.000 × (12/50)² = 576 lux.
        //    5,8% DO NUMERO DA CAIXA. O PROTOCOLO CLINICO PEDE 10.000 lux NO OLHO POR 30
        //    MINUTOS — OU SEJA, EXIGE QUE VOCE SENTE A DOZE CENTIMETROS DA LUMINARIA.
        //
        // ─── ACHADO 2: UM ANUNCIO PUBLICOU O LUMEN E DERRUBOU A CATEGORIA INTEIRA ───
        // 2. O ASIN B0F3J4QVR4 (£29.74, 403 AVALIACOES) E O UNICO DA BUSCA QUE PREENCHE O
        //    CAMPO "Light Output Maximum": **1000 Lumens**. E ELE ANUNCIA 10.000 lux.
        //    10.000 lux = 10.000 lumens POR METRO QUADRADO. UMA LUMINARIA QUE EMITE 1.000
        //    LUMENS NO TOTAL SO PRODUZ 10.000 lux SOBRE 0,1 m² — E SO SE NENHUM LUMEN SE
        //    PERDER. E UM OVO QUE ILUMINA EM 360°, ENTAO METADE DA LUZ VAI PARA A PAREDE:
        //    SOBRAM ~500 lm DO SEU LADO, QUE A 10.000 lux COBREM 0,05 m² — UM QUADRADO DE
        //    22 cm. A 50 cm DE DISTANCIA A LUMINARIA ILUMINA MUITO MAIS AREA QUE ISSO.
        // 3. O MESMO ANUNCIO PUBLICA O CAMPO "Wattage" DUAS VEZES NA MESMA TABELA, COM
        //    VALORES DIFERENTES: "Wattage 16 Watts" E "Wattage 24 watts".
        //
        // ─── ACHADO 3: A POTENCIA E O TETO, E ELA ESTA PUBLICADA ───
        // 4. LED BOM FAZ 100-120 lm/W. LOGO A POTENCIA DECLARADA LIMITA O LUMEN TOTAL:
        //      CAROMOLLY ....... 24 W → ~2.400-2.880 lm  ANUNCIA "2000-10000 Lux"
        //      HAPPY SUNLIGHT .. 20 W → ~2.000-2.400 lm  ANUNCIA 10.000 Lux
        //      B0CZ43VVK3 ...... 15 W → ~1.500-1.800 lm  ANUNCIA **15.000 Lux**
        //      LASTAR .......... 12 W → ~1.200-1.440 lm  ANUNCIA 10.000 Lux
        //      B0F3J4QVR4 ...... 16/24 W → PUBLICA 1.000 lm  ANUNCIA 10.000 Lux
        //      ULIGHTOWN ....... ALIMENTACAO "USB"        ANUNCIA 10.000 Lux
        //      LUMIE / BEURER / DURONIC / EASYSLEEP: NAO PUBLICAM WATT
        //    A QUE ANUNCIA O MAIOR NUMERO (15.000 lux) TEM A SEGUNDA MENOR POTENCIA DAS QUE
        //    PUBLICAM. NAO E CONTRADICAO DIRETA — E O SINAL DE QUE O NUMERO NAO FOI MEDIDO.
        //
        // ─── ACHADO 4: A GEOMETRIA DECIDE, E NINGUEM FALA DELA ───
        // 5. TRES DAS DEZ SAO LUMINARIAS DE 360° (CAROMOLLY, ULIGHTOWN, B0F3J4QVR4). PARA
        //    FOTOTERAPIA ISSO E O FORMATO ERRADO POR DEFINICAO: O QUE IMPORTA E lux NO OLHO,
        //    E UM EMISSOR DE 360° MANDA A MAIOR PARTE DO FLUXO PARA A PAREDE. AS QUATRO
        //    PRIMEIRAS COLOCACOES SAO PAINEIS CHATOS, QUE E O FORMATO USADO EM ESTUDO
        //    CLINICO. A BEURER PUBLICA A AREA EMISSORA — "surface area of 20cm x 20cm" —
        //    E E A UNICA ALEM DA LUMIE A DAR UM DADO GEOMETRICO QUALQUER.
        //
        // ─── ACHADO 5: A DURONIC TROCA A UNIDADE NUM PRODUTO COM CERTIFICADO MEDICO ───
        // 6. A FICHA DA DURONIC DIZ: "Medically certified 93/42/EEC - gives intensity of
        //    **10,000 LUMENS** as recommended by medical professionals". LUMEN E FLUXO
        //    TOTAL; LUX E ILUMINANCIA. SAO GRANDEZAS DIFERENTES. A RECOMENDACAO CLINICA E
        //    EM LUX. TROCAR A UNIDADE NO CAMPO QUE CITA A DIRETIVA DE DISPOSITIVO MEDICO E
        //    O ERRO MAIS CARO DA LISTA.
        // 7. A MESMA DURONIC SE CHAMA SADT2 NO TITULO E SADV1 TRES VEZES NOS BULLETS. E
        //    PUBLICA DOIS TAMANHOS: O BULLET DIZ "Size: 34 x 9 x 43 cm" E A TABELA DIZ
        //    "2D x 15W x 26H centimetres". NENHUM EIXO BATE.
        //
        // ─── ACHADO 6: TEMPERATURA DE COR INVERTIDA ───
        // 8. A HAPPY SUNLIGHT ROTULA AS TRES TEMPERATURAS AO CONTRARIO: "White Light
        //    (2800-3000K)" E "Warm Light(5500-5700K)". 2800K E LUZ QUENTE E 5700K E LUZ FRIA
        //    DE DIA — OS NOMES ESTAO TROCADOS ENTRE SI. E PARA FOTOTERAPIA A TEMPERATURA
        //    IMPORTA: O EFEITO CIRCADIANO VEM DA LUZ AZUL, QUE ESTA NO EXTREMO FRIO.
        //
        // ─── ACHADO 7: CAMPO DE CATALOGO PREENCHIDO COM LIXO ───
        // 9. TODAS SAO PAINEIS DE LED INTEGRADO, SEM LAMPADA TROCAVEL. MESMO ASSIM A FICHA
        //    DECLARA SOQUETE E FORMATO DE BULBO: HAPPY SUNLIGHT "Bulb Base E27 / A19",
        //    ULIGHTOWN "E10 / B10", EASYSLEEP "Flanged / ED17", BEURER "G13 / G40",
        //    DURONIC "Prong / A19". NENHUMA DELAS TEM SOQUETE.
        // 10. A BEURER TAMBEM SE CONTRADIZ NO TAMANHO: O BULLET DESCREVE UMA SUPERFICIE
        //    EMISSORA DE 20 cm × 20 cm E A TABELA DECLARA O PRODUTO INTEIRO COMO
        //    "6D x 20W x 2.4H centimetres". UM CORPO DE 2,4 cm DE ALTURA NAO COMPORTA UMA
        //    FACE DE 20 cm.
        // 11. IMPERIAL EM LOJA BRITANICA: EASYSLEEP DA O TAMANHO SO EM POLEGADA
        //    ("9.7 inch*6.9inch*0.7 inch") E A LASTAR TAMBEM ("5.3 × 4.7 × 2.0 inches").
        //
        // ─── ASIN DUPLICADO ───
        // B0CZ43VVK3 (£26.99) E B0G1SR6NPN (£43.99): MESMO TITULO "15000 Lux", AS MESMAS
        // 745 AVALIACOES, MESMA NOTA 4.3, £17 DE DIFERENCA. MANTIDO O MAIS BARATO.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: PAINEIS DE LUZ VERMELHA/INFRAVERMELHA (RENPHO, NEBULA), QUE SAO OUTRO
        // PRODUTO E OUTRA ALEGACAO; O ASIN CARO DO PAR DUPLICADO; TUDO ABAIXO DE 200
        // AVALIACOES. DENTRO: 214 A 915 AVALIACOES, NOTA 4.3 A 4.6, £22.99 A £67.99.
        //
        // ⚠ NOTA EDITORIAL: SAD E UMA CONDICAO CLINICA. O TEXTO NAO DA CONSELHO MEDICO E
        // MANDA FALAR COM O MEDICO — COMO A PROPRIA DURONIC FAZ NO ANUNCIO DELA.
        //
        // FOCUS KEYWORD: best SAD lamp
        // VARIACOES TRABALHADAS: SAD light therapy lamp / light therapy lamp /
        // daylight lamp / sun lamp / 10000 lux lamp / seasonal affective disorder lamp /
        // winter blues light / SAD light box / bright light therapy
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "home", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-sad-lamp',                                           // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best SAD Lamp 2026: 10 Ranked, and Why 10,000 Lux Means 12 Centimetres', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best SAD Lamp 2026: Top 10 Light Therapy Lamps Ranked', // TITLE DA ABA/GOOGLE (54 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best SAD lamp options on Amazon by the one number nine of ten refuse to publish: the distance at which they actually deliver 10,000 lux.', // META DESCRIPTION (152 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best SAD lamp',                                  // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Lux is not brightness. It is lumens landing on a surface, and it falls with the square of the distance — so a lux figure without a distance attached is not a specification, it is a number that cannot be checked. Of the ten light therapy lamps we collected, exactly one publishes the distance. Lumie states that its Mini \"provides 10,000 lux at a distance of 12cm\", and stating it reveals what everybody else is hiding: at 24 centimetres that same lamp delivers 2,500 lux, and at the 50 centimetres you would actually sit from a desk lamp it delivers 576 — under 6% of the headline. Meanwhile one listing let something slip that settles the argument for the whole category: it fills in the Light Output field with 1,000 lumens, and then claims 10,000 lux. Ten thousand lux means ten thousand lumens per square metre, so a thousand lumens can only produce it across a tenth of a square metre with nothing lost anywhere — and that lamp radiates in every direction. We ranked ten of the best SAD lamp options on Amazon in August 2026 on emitting area, published distance and the wattage that caps what they can physically emit, and flagged the medically certified one that quotes its intensity in the wrong unit entirely.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO ARITMETICO NA ABERTURA
            'conclusion' => "The best SAD lamp for you is decided by geometry, not by the number on the box. Because illuminance falls with the square of distance, a big flat panel you can sit 30 centimetres from beats a small bright one you have to press your face against, and it beats a decorative 360-degree globe outright — a lamp that radiates in all directions is throwing most of its output at your wall, and your wall does not have a circadian rhythm. So look for three things in that order: the largest emitting face you can live with, a published distance for whatever lux figure is claimed, and a colour temperature at the cool end, because the circadian effect comes from the blue part of the spectrum. By contrast, treat the headline lux as marketing until someone tells you where it was measured, and treat wattage as the ceiling it really is — no lamp drawing 12 watts is delivering daylight to a room. Crucially, none of this is medical advice: seasonal affective disorder is a real depressive illness, standard light therapy protocols specify 10,000 lux at the eye for around 30 minutes each morning, and if winter genuinely flattens you, that is a conversation to have with your GP rather than with a product listing.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 20:05:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Lumie Mini Compact Light Therapy Lamp, 10,000 lux',                       // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£49.99',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 252,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51roeu1EmML._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best SAD lamp',                                                      // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CRHXQ3BB?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only lamp in this comparison that publishes the distance its 10,000 lux is measured at. That single sentence is worth more than every other spec on this page.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "One sentence puts this at the top: \"Lumie Mini provides 10,000 lux at a distance of 12cm\". Nine other listings quote a lux figure and none of them says where it was taken, which makes those numbers unfalsifiable rather than merely optimistic. Lumie is a British company that has been building light therapy products for three decades and sells into a regulated market, and the willingness to attach a distance is what regulation looks like in practice.

Read what the disclosure actually means before you buy, because it is not flattering to the category either. Illuminance obeys the inverse square law, so 10,000 lux at 12 centimetres becomes 2,500 lux at 24 centimetres and roughly 576 lux at 50 centimetres. Standard bright light therapy protocols call for 10,000 lux at the eye for around half an hour, which with this lamp means genuinely sitting a hand's width from it — propped beside a cereal bowl, not across a desk. That is a real constraint, and it applies just as hard to every rival here; the difference is that Lumie tells you.

It is small and it is meant to be. At 9.4 by 16.3 by 22.5 centimetres and 910 grams it travels to an office or a university library, and 4.6 stars from 252 ratings is the joint-highest average in this group. There is no timer, no colour temperature switching and no remote, which is why cheaper lamps outspec it on paper. What you are paying for is the one number that matters being an honest one.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['The only lamp here that publishes the distance for its 10,000 lux', 'British brand with three decades in regulated light therapy', '4.6 stars, the joint-highest average in this comparison', 'Compact enough at 910g to take to an office or library', 'Simple one-button operation with no menu to learn'], // PONTOS POSITIVOS
                'contras' => ['10,000 lux only at 12cm, which means sitting very close', 'No timer, no colour temperature options and no remote', 'Small emitting face compared with the flat panels below', '£49.99 buys far more features from the unbranded lamps'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Beurer TL45 Perfect Day Daylight Therapy Lamp, 10,000 lux, 3 Settings',   // NOME (ENCURTADO)
                'price' => '£67.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 214,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71g9w2K5iML._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Beurer TL45 daylight therapy lamp with three light settings',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08FP6VD2G?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing here that publishes its emitting area, and the only one that grades lux against colour temperature instead of quoting one number.', // TEXTO CURTO (CARD)
                'body' => "Beurer is a German medical device manufacturer, and the listing reads like one. Instead of a single headline number it publishes a ladder: 10,000 lux for the therapy setting, 7,000 lux at 5,000K for the active setting, and 3,000 lux at 3,000K for the relax setting. Three claims that decline together in a way that is physically coherent — warmer light, less of it — which is the opposite of how the rest of this category writes copy.

It also publishes the one geometric fact that decides whether a light therapy lamp works: a light-emitting surface of 20 by 20 centimetres. Emitting area is what lets you sit further back and still receive the same illuminance, because the same lumens arrive spread over a wider cone. Four hundred square centimetres is the largest face in this comparison after the Duronic panel, and it is why this lamp is usable at a normal desk distance where the small lamps are not.

Two blemishes. The specification table describes the whole product as \"6D x 20W x 2.4H centimetres\" — a body 2.4 centimetres tall cannot contain a 20 centimetre emitting face, so one of those two figures is wrong, most likely a depth and height swapped in the catalogue. And the same table lists a G13 bulb base and a G40 bulb shape for what is an integrated LED panel with no removable bulb at all. At £67.99 it is the most expensive lamp here, and 214 ratings is the thinnest sample, though 4.6 stars matches the best on the page.", // TEXTO SEO LONGO
                'pros' => ['Publishes its emitting area: a 20cm x 20cm light surface', 'Grades lux against colour temperature across three settings, not one number', 'German medical device manufacturer with a regulatory obligation', 'Large face means it works at a real desk distance', '4.6 stars, joint-highest average here'], // PONTOS POSITIVOS
                'contras' => ['Spec table says the whole lamp is 2.4cm tall, which cannot hold a 20cm face', 'Lists a G13 bulb base for an integrated LED panel with no bulb', 'Most expensive lamp in this comparison at £67.99', '214 ratings, the thinnest sample on this page'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Duronic SADT2 SAD Light Therapy Lamp Box, Medically CE Certified',        // NOME (ENCURTADO)
                'price' => '£29.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 369,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61XnwEmeJYL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Duronic SADT2 SAD light therapy lamp box with folding stand',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B06XXWN9QW?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The biggest emitting panel here and the only one carrying a medical device certification — on a listing that quotes its intensity in lumens instead of lux.', // TEXTO CURTO (CARD)
                'body' => "This is the largest light box in the comparison and the cheapest way to get a genuinely big emitting face. The bullets give the size as 34 by 9 by 43 centimetres, which is a panel you can sit in front of rather than lean into, and it comes with a folding stand and wall fixings. It is also the only lamp here that cites a medical device certification by number, 93/42/EEC, and the only listing that tells you to talk to your doctor — which for a product aimed at a depressive illness is the right instinct.

Then it quotes the wrong unit. The specification field reads \"gives intensity of 10,000 lumens as recommended by medical professionals\". Lumens measure total light output; lux measures how much of it lands on a surface. The clinical recommendation is expressed in lux, at the eye, and swapping the unit in the same sentence that invokes the medical directive is the most consequential error on this page. It is almost certainly sloppiness rather than deception — the lamp is sold everywhere as 10,000 lux — but it is exactly the kind of error a certified device should not make.

The listing also cannot settle on which product it is. The title says SADT2; the bullets say SADV1 three separate times. And it publishes two incompatible sizes: 34 by 9 by 43 centimetres in the bullets against \"2D x 15W x 26H centimetres\" in the table. At £29.99 with 369 ratings at 4.6 stars the object is good value and well liked. The page describing it needed one more read.", // TEXTO SEO LONGO
                'pros' => ['Largest emitting panel here at a stated 34 x 43cm, for £29.99', 'Only listing citing a medical device certification by number', 'Folding stand plus wall fixings included', 'The only one that tells you to consult a doctor', '4.6 stars from 369 ratings'], // PONTOS POSITIVOS
                'contras' => ['Quotes "10,000 lumens" where the clinical figure is 10,000 lux', 'Title says SADT2 while the bullets say SADV1 three times', 'Publishes two sizes: 34 x 9 x 43cm and 2 x 15 x 26cm', 'No colour temperature or brightness adjustment'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Easysleep 10000 Lux LED Light Therapy Lamp, 7 Timers, 10 Brightness Levels', // NOME (ENCURTADO)
                'price' => '£22.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 696,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51dkLQDAzvL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Easysleep 10000 lux LED light therapy lamp with flexible placement', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08N149XTD?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest flat panel here at £22.99, with 696 ratings behind it and a 17.5 by 24.6cm face that beats every decorative lamp below.', // TEXTO CURTO (CARD)
                'body' => "Twenty-two pounds ninety-nine for a flat panel measuring 17.5 by 24.6 centimetres is the best value in this comparison, and 696 ratings at 4.4 stars is the third deepest evidence here. The shape is the whole argument. A 430 square centimetre emitting face puts it behind only the Duronic and the Beurer, and well ahead of the three globe-shaped lamps at the bottom of this page, because light therapy is about how much light reaches your eye and a flat panel points all of it at you.

The practical touches are sensible rather than clever. Seven timer settings run from 10 to 60 minutes plus continuous, ten brightness levels give finer control than the four or five most rivals offer, and it either stands on a desk or hangs on a wall, which matters if your morning happens at a kitchen counter rather than a desk. It weighs 254 grams, the lightest thing here by a wide margin.

The listing publishes nothing you can verify. No wattage, no distance for the 10,000 lux, no emitting area stated as such — the panel size has to be inferred from the product dimensions, and those are given in inches first (\"9.7 inch*6.9inch*0.7 inch\") on a British storefront. The specification table describes a \"Flanged\" bulb base and an \"ED17\" bulb shape, neither of which exists on an integrated LED panel. Judge it on the size of the face, which you can measure, rather than on the lux, which you cannot.", // TEXTO SEO LONGO
                'pros' => ['Cheapest flat panel here at £22.99 with a 17.5 x 24.6cm face', '696 ratings at 4.4, the third deepest sample on this page', '10 brightness levels, finer control than the 4-5 most rivals offer', 'Stands on a desk or hangs on a wall', 'Very light at 254g'], // PONTOS POSITIVOS
                'contras' => ['No wattage, no distance and no emitting area published', 'Dimensions given in inches first on a UK listing', 'Spec table lists a flanged bulb base for an integrated LED panel', 'No colour temperature adjustment'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'SAD Lamp 15000 Lux Light Therapy, 3 Colour Temperatures, 6 Timers',       // NOME (ENCURTADO)
                'price' => '£26.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 745,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51x4z1bdHUL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Square SAD light therapy lamp with touch control and rotating stand', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CZ43VVK3?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A good 19 by 16cm panel and 745 ratings, attached to the largest lux claim in the category from the second-lowest wattage that publishes one.', // TEXTO CURTO (CARD)
                'body' => "The hardware is competitive. A 190 by 160 millimetre emitting face is the fourth largest here, the 180 degree rotating stand and hanging holes make it genuinely flexible, and the air-cooled chip that holds the surface under 36°C is a real feature on a panel meant to run for an hour a day. Seven hundred and forty-five ratings at 4.3 stars is the second deepest sample in this comparison.

The number on the title does not survive contact with the specification table. It advertises 15,000 lux, the largest claim in the category by 50%, and the table gives the wattage as 15 watts. Good LEDs manage 100 to 120 lumens per watt, so 15 watts puts a ceiling of roughly 1,800 lumens on everything this lamp can emit. Fifteen thousand lux means 15,000 lumens per square metre, so the entire output of the lamp, with nothing lost, would cover about 0.12 of a square metre — which is roughly the area of its own front panel. In other words the claim is not impossible; it is simply measured at the glass, where nobody sits. Twenty centimetres back it is a quarter of that, and at desk distance a small fraction.

It is also sold twice. ASIN B0G1SR6NPN carries the same title, the same 745 ratings and the same 4.3 average at £43.99 — seventeen pounds more for the identical product and the identical review pool. We have linked the £26.99 listing. Bought as a well-made 15 watt panel with a rotating stand it is good value; bought for 15,000 lux it is a number taken with a meter pressed against the lamp.", // TEXTO SEO LONGO
                'pros' => ['Good 19 x 16cm emitting face, fourth largest in this comparison', '745 ratings at 4.3, the second deepest sample here', 'Air-cooled chip keeps the surface under 36°C', '180 degree rotating stand plus hanging holes', 'Six timer settings and five brightness levels for £26.99'], // PONTOS POSITIVOS
                'contras' => ['15,000 lux claimed from a lamp the table rates at 15 watts', '15W caps total output near 1,800 lumens, so the figure is a contact reading', 'Sold under a second ASIN at £43.99 with the same 745 ratings', 'No distance published for any lux figure'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Lastar SAD Lamp, 10,000 Lux, 4 Colour Temperatures, 60 LEDs, 12W',        // NOME (ENCURTADO)
                'price' => '£32.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 500,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/41rQr5w6j4L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Lastar compact SAD lamp with four colour temperatures on a desk',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0H5K355P6?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Publishes its wattage and LED count honestly — 12W across 60 LEDs — which is exactly what makes the 10,000 lux claim hard to believe.', // TEXTO CURTO (CARD)
                'body' => "Credit where it is due: this listing publishes more of its own specification than most of the page. Twelve watts, 60 LEDs, four colour temperatures from 1600K to 6500K, five brightness levels from 5% to 100%, and a stated physical size. That is a genuinely useful colour range — 1600K is candlelight and 6500K is overcast daylight — and for a desk object at £32.99 with 500 ratings at 4.5 stars it is a tidy piece of design.

The disclosure works against the headline. Twelve watts is the lowest published wattage in this comparison, and at 100 to 120 lumens per watt that caps the lamp's entire output somewhere around 1,200 to 1,440 lumens. It is also the smallest lamp here, measuring 5.3 by 4.7 inches, or about 13.5 by 12 centimetres — an emitting face of roughly 160 square centimetres against the Beurer's 400. Small face plus low wattage is the combination that forces you closest to the lamp, and no distance is published for the 10,000 lux.

The other thing to note is what this actually is. With four colour temperatures spanning candlelight to daylight, a memory function and a compact footprint, it is a very good adjustable desk lamp that is also sold as light therapy. If the four temperatures are what appeal to you, that is a perfectly good reason to buy it — just do not expect a 12 watt lamp the size of a paperback to deliver clinical illuminance at arm's length.", // TEXTO SEO LONGO
                'pros' => ['Publishes wattage, LED count and physical size, unlike most here', 'Four colour temperatures from 1600K to 6500K, the widest range on this page', 'Five brightness levels down to 5% for evening use', '4.5 stars from 500 ratings', 'Compact enough for a crowded desk at £32.99'], // PONTOS POSITIVOS
                'contras' => ['12W is the lowest published wattage here, capping output near 1,400 lumens', 'Smallest emitting face in this comparison at roughly 13.5 x 12cm', 'No distance published for the 10,000 lux claim', 'Size quoted in inches on a British listing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Happy Sunlight SAD Lamp, 10000 Lux, 210° Rotation, 3 Colour Temperatures', // NOME (ENCURTADO)
                'price' => '£29.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 374,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61vwo62JxhL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Happy Sunlight SAD lamp with 210 degree rotating head',              // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CB2Y8DRX?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing that mentions a distance at all, and the only one whose three colour temperature labels are printed the wrong way round.', // TEXTO CURTO (CARD)
                'body' => "This lamp does something no other unbranded listing here manages: it names a distance. \"Kindly note keep a safe distance of more than 15cm and not look directly at the light when using.\" That is a safety minimum rather than the distance the 10,000 lux was measured at, so it does not solve the problem this article is about — but it is the only acknowledgement anywhere on the page that distance is a variable. At 20 watts it also has the second highest published wattage here, which is the ceiling that matters, and the 210 degree rotating head is genuinely useful for aiming light at your face rather than your keyboard.

The colour temperature labels are printed backwards. The listing offers \"White Light(2800-3000K)\", \"Natural Light(4000-4200K)\" and \"Warm Light(5500-5700K)\". Two thousand eight hundred kelvin is warm light — it is the colour of a filament bulb — and 5,700K is cool daylight. The first and third labels have been swapped. For a light therapy lamp this is not cosmetic: the circadian effect that light therapy relies on comes from the blue end of the spectrum, so the setting you want in the morning is the one labelled \"Warm\" here, and the one labelled \"White\" is the one to avoid.

Elsewhere the table claims an E27 bulb base and an A19 bulb shape for an integrated LED lamp with no socket in it, and the 950 gram weight is the heaviest here for one of the smaller bodies. At 4.6 stars from 374 ratings owners are happy, and at £29.99 with 20 watts behind it there is more light on offer than several lamps ranked above it. It loses ground on a small face and labels you cannot trust.", // TEXTO SEO LONGO
                'pros' => ['20W, the second highest published wattage in this comparison', 'The only unbranded listing that mentions a viewing distance at all', '210 degree rotating head aims light at your face, not the desk', '4.6 stars from 374 ratings', 'Stepless dimming as well as five preset levels'], // PONTOS POSITIVOS
                'contras' => ['Colour temperature labels are swapped: 2800K called "White", 5700K called "Warm"', 'The mislabelling matters because the circadian effect comes from blue light', 'Claims an E27 bulb base on a lamp with no socket', 'Small 10 x 5 x 15cm body and no distance for the 10,000 lux'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Caromolly SAD Light Therapy Lamp, 2000-10000 Lux, 360°, Remote, 24W',     // NOME (ENCURTADO)
                'price' => '£31.44',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 915,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71kU-oIC0jL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Caromolly 360 degree SAD light therapy lamp with wooden base',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DDCVKKLR?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The deepest review pool on the page at 915 and the highest published wattage at 24W — spent on a 360 degree shape that sends most of it at your wall.', // TEXTO CURTO (CARD)
                'body' => "Nine hundred and fifteen ratings at 4.5 stars is the strongest evidence in this comparison, and 24 watts is the highest published wattage here, which means this lamp emits more total light than anything else on the page. It is also the nicest object: a wooden base, a 30 centimetre column, four timer settings, three colour temperatures and a remote that works from across the room. As a bedside lamp that happens to be very bright, it is easy to see why people like it.

The shape is the problem, and it is a problem no amount of wattage solves. This is a 360 degree emitter, and light therapy is measured as illuminance at the eye. A lamp that radiates in every direction is by definition sending most of its output somewhere other than your face — a column emitting evenly all round delivers only the fraction of its flux that happens to point at you. The 24 watts that ought to be an advantage over the Beurer's flat panel is spent lighting the room instead. That is a fine thing for a lamp to do. It is the wrong thing for a light therapy lamp to do.

The listing hedges the headline too. The title says \"2000-10000 Lux\" and the first bullet says \"10,000 lux(max)\", which is at least honest about being a maximum, though still with no distance. And the specification table cannot count its own LEDs: the features field says \"302 Led Beads\" while the Number of Lights field says 304. Two numbers, one lamp, same table.", // TEXTO SEO LONGO
                'pros' => ['915 ratings at 4.5, the deepest evidence in this comparison', '24W, the highest published wattage on this page', 'Genuinely attractive object with a wooden base and remote', 'Says "10,000 lux (max)" rather than presenting it as constant', 'Four timers and three colour temperatures for £31.44'], // PONTOS POSITIVOS
                'contras' => ['360 degree emitter sends most of its light away from your face', 'Wrong geometry for a therapy lamp regardless of how much power it has', 'Spec table says 302 LED beads in one field and 304 in another', 'No distance published for the lux figure'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'ULIGHTOWN SAD Lamp, 10000 Lux, 360° Field, 3 Colour Temperatures',        // NOME (ENCURTADO)
                'price' => '£32.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 497,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/611GKOAnw5L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'ULIGHTOWN oval SAD lamp with 360 degree light field',                // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CFX8S4M6?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A 360 degree lamp claiming 10,000 lux, on a listing whose power source field says USB — which caps the whole argument at a few watts.', // TEXTO CURTO (CARD)
                'body' => "The same geometric objection as the Caromolly above applies here, and this listing adds a second one. Its specification table gives the Power and Plug Description as \"USB\". USB power is bounded: a standard USB-A port supplies 2.5 watts, USB 3.0 supplies 4.5, and even USB-C at 5 volts and 3 amps tops out at 15. Whichever of those it is, it sits at or below the lowest wattage anyone else on this page publishes, and it is being asked to produce the same 10,000 lux as a 24 watt lamp. No wattage figure appears anywhere on the listing to resolve it.

Set against that, the product itself is pleasant and well reviewed. Four hundred and ninety-seven ratings at 4.4 stars, three colour temperatures from 2700K to 6000K, four brightness levels, four timer options from 10 to 90 minutes and a memory function. The oval body is 16 by 16 by 22 centimetres and looks like a designed object rather than a medical appliance, which for something you will have on a desk from October to March is worth something.

The bullets are also more careful than most: the lamp is described as delivering \"up to 10,000 lux intensity\", and one bullet explicitly tells you to adjust brightness \"according to distance, environment and light sensitivity\" — an acknowledgement that distance changes the result, from a listing that then never states one. The table rounds out the pattern with an E10 bulb base and a B10 bulb shape on an integrated LED lamp.", // TEXTO SEO LONGO
                'pros' => ['497 ratings at 4.4 stars', 'Three colour temperatures and four timer settings up to 90 minutes', 'Acknowledges in its own bullets that distance changes the result', 'Attractive oval design that suits a desk from October to March'], // PONTOS POSITIVOS
                'contras' => ['360 degree emitter, the wrong geometry for light therapy', 'Power source listed as USB, which caps output at a few watts', 'No wattage published anywhere to resolve the 10,000 lux claim', 'Claims an E10 bulb base on a lamp with no socket'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Egg-Shape SAD Lamp, 10000 Lux, 360°, Remote, 3 Colour Temperatures',      // NOME (ENCURTADO)
                'price' => '£29.74',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 403,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81siWfTe5kL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Egg shaped 360 degree SAD light therapy lamp in light wood grain',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F3J4QVR4?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The listing that settled this article: it publishes a maximum light output of 1,000 lumens, and claims 10,000 lux from it.', // TEXTO CURTO (CARD)
                'body' => "This is the only listing in the entire search that fills in Amazon's Light Output Maximum field, and the figure it enters is 1,000 lumens. It also claims 10,000 lux. Those two numbers cannot both describe the same lamp in any useful way. Ten thousand lux means ten thousand lumens landing on every square metre of the illuminated surface, so a lamp whose total emission is a thousand lumens can only reach that figure across a tenth of a square metre — and that is with perfect optics and nothing lost. This is an egg that emits in all directions, so roughly half the flux leaves on the side facing away from you. The realistic 500 lumens reaching your side covers about 0.05 square metres at 10,000 lux, a patch 22 centimetres square, while the lamp at any normal sitting distance is illuminating far more area than that.

The same table publishes the Wattage field twice, with different values: \"Wattage 16 Watts\" and, four rows later, \"Wattage 24 watts\". A lamp has one power draw. Neither figure reconciles with 1,000 lumens either, since 16 watts of decent LED should produce closer to 1,700.

None of this makes it a bad lamp. Four hundred and three buyers rate it 4.4, the wood grain finish is attractive, and the specification is otherwise generous: three colour temperatures at 2700K, 4000K and 6500K, five brightness levels, a remote and four timer settings up to 90 minutes. Bought as a 1,000 lumen mood light it is a pleasant object at £29.74. Bought as light therapy it publishes, in its own specification table, the number that shows the headline cannot be right.", // TEXTO SEO LONGO
                'pros' => ['The only listing here that publishes its total light output at all', 'Three colour temperatures, five brightness levels, remote and four timers', 'Attractive wood grain finish for £29.74', '403 ratings at 4.4 stars'], // PONTOS POSITIVOS
                'contras' => ['Publishes 1,000 lumens maximum output and claims 10,000 lux', '1,000 lumens can only make 10,000 lux across 0.1 square metres', 'The Wattage field appears twice with different values, 16W and 24W', '360 degree egg shape sends half the output away from you'], // PONTOS NEGATIVOS
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
        $this->command?->info("SadLampsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
