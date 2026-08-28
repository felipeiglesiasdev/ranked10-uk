<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class SmartScalesSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE BALANCAS INTELIGENTES DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA FILTRADA: /s?k=smart+scales+body+fat&rh=p_36%3A1500-  (24 ASINS UNICOS)
        //
        // ─── ACHADOS ───
        // 1. A CONTAGEM DE "METRICAS" NAO E CAPACIDADE, E MARKETING. UMA BALANCA DE
        //    4 ELETRODOS MEDE UMA COISA SO: A IMPEDANCIA ENTRE OS DOIS PES. TUDO O
        //    RESTO — GORDURA, MASSA MUSCULAR, MASSA OSSEA, GORDURA VISCERAL, PROTEINA,
        //    "IDADE METABOLICA" — E DERIVADO DESSA UNICA LEITURA MAIS ALTURA, IDADE E
        //    SEXO, ATRAVES DE UMA FORMULA DE REGRESSAO. ENTAO 13 METRICAS E 58 METRICAS
        //    SAEM EXATAMENTE DA MESMA MEDICAO. E SO QUANTAS CONTAS O APP RESOLVE MOSTRAR.
        // 2. A ESCADA DE METRICAS CORRE AO CONTRARIO DA COMPETENCIA TECNICA:
        //      INBODY (MARCA CLINICA, £249.99) ......  3 METRICAS
        //      WITHINGS BODY SMART (£69.00) .........  8 METRICAS
        //      RENPHO ELIS / ETEKCITY (£15-18) ...... 13 METRICAS
        //      B0CXPD9KMQ (£69.99) .................. 28 METRICAS
        //      GE COM ALCAS (£79.99) ................ 50 METRICAS
        //      B0F6NC98D3 (£59.99) .................. 58 METRICAS
        //    A INBODY E A MARCA USADA EM ACADEMIA E PESQUISA. ELA COBRA O MAIS CARO DA
        //    LISTA PARA ENTREGAR TRES NUMEROS, E TEM A PIOR NOTA (3.8). QUEM ENTENDE DE
        //    BIOIMPEDANCIA PROMETE MENOS.
        // 3. O QUE E ESPECIFICACAO DE VERDADE E A CONTAGEM DE ELETRODOS, E QUASE
        //    NINGUEM EXPLICA. COM 4 ELETRODOS (PE A PE) A CORRENTE SOBE POR UMA PERNA E
        //    DESCE PELA OUTRA, SEM NUNCA ATRAVESSAR O TRONCO — ENTAO GORDURA ABDOMINAL
        //    E INFERIDA, NAO MEDIDA. COM 8 ELETRODOS (ALCAS + PLATAFORMA) EXISTE UM
        //    CAMINHO MAO-PE QUE CRUZA O TRONCO, E AI SIM HA DADO SEGMENTAR.
        //    DECLARAM 4 ELETRODOS: RENPHO ELIS, ETEKCITY, B08839L43J.
        //    DECLARAM 8 ELETRODOS: GE COM ALCAS, B0CXPD9KMQ, INBODY, WITHINGS BODY SCAN.
        // 4. O UNICO AVISO HONESTO DA CATEGORIA ESTA ENTERRADO NA QUARTA BULLET DA GE:
        //    "The data provided by this product's BIA technology is intended solely for
        //    long-term trend tracking and should not be considered equivalent [a medicao
        //    clinica]". E a mesma GE que vende "50 BODY COMPOSITION METRICS" na bullet 2.
        // 5. "IDADE METABOLICA" NAO E MEDIDA CLINICA NENHUMA. NAO EXISTE DEFINICAO
        //    PADRONIZADA NEM VALOR DE REFERENCIA; E UM NUMERO INVENTADO PELO APP A
        //    PARTIR DA MESMA IMPEDANCIA.
        // 6. A FICHA DA WITHINGS BODY SMART TRAZ O CAMPO "Special feature" EM POLONES:
        //    "Analiza składu ciała, automatyczne rozpoznawanie" — NUM ANUNCIO BRITANICO.
        // 7. A RENPHO ELIS TEM 330.489 AVALIACOES A £17.79. E O PRODUTO MAIS AVALIADO
        //    QUE JA ENTROU EM QUALQUER LISTA DESTE SITE, POR UMA MARGEM ENORME.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: OS DEMAIS ASINS DA ARBOLEAF (CINCO NA GRADE) E DA GE, PARA NAO ENCHER A
        // LISTA COM AS MESMAS MARCAS; APARELHOS COM MENOS DE 500 AVALIACOES.
        // DENTRO: NOTA DE 3.8 A 4.6, PRECO DE £15.88 A £249.99, OITO MARCAS.
        //
        // FOCUS KEYWORD: best smart scales
        // VARIACOES TRABALHADAS: body fat scales / smart bathroom scales /
        // body composition scale / scales for body weight and fat / bmi scales /
        // digital bathroom scales / smart scales with app / bioimpedance scale
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'fitness',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Fitness',                    // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best fitness gear and activewear available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-smart-scales',                                       // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Smart Scales 2026: 10 Ranked, and Why 58 Metrics Means Nothing', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Smart Scales 2026: Top 10 Body Fat Scales Ranked', // TITLE DA ABA/GOOGLE (54 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best smart scales on Amazon by what they actually measure, comparing 4 and 8 electrode body fat scales from £15.88 to £249.99.', // META DESCRIPTION (142 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best smart scales',                              // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Every set of smart scales on Amazon sells itself on a number: 13 body metrics, 28 metrics, 50 metrics, 58 metrics. That number is the least useful thing on the page. A bathroom scale with four electrodes measures exactly one thing — the electrical impedance between your two feet — and every other figure it reports is calculated from that single reading plus your height, age and sex. Thirteen metrics and fifty-eight metrics come from identical hardware doing identical work; the difference is how many sums the app chooses to display. What does change between machines is the electrode count, and almost no listing explains why. Below we rank the best smart scales on Amazon in August 2026 on what they genuinely measure, and we start from an uncomfortable observation: the clinical brand in this comparison charges the most, reports the fewest numbers, and has the lowest rating on the page.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Buying the best smart scales comes down to being honest about what you want them for. If the answer is tracking a trend — am I heavier or lighter than last month, is the body fat figure drifting the right way — then a £16 four-electrode scale does that as well as an £80 one, because both are running the same measurement through similar maths and both are consistent with themselves even when they are not accurate in absolute terms. By contrast, if you want a body fat percentage you could quote to a doctor, no bathroom scale will give you one, and the manufacturer that says so most clearly is the one selling the most expensive device here. Meanwhile, ignore the metric count entirely and check the electrode count instead: four electrodes never pass current through your torso, so abdominal fat is estimated rather than measured, while eight electrodes with handles do cross it and produce genuinely segmental data. Finally, weigh yourself at the same time of day, in the same state of hydration, because a body fat scale that swings three points between morning and evening has not measured a change in you — it has measured how much water you drank.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 15:25:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'RENPHO Elis 1 Smart Scales, 13 Body Metrics, 4 Electrodes, 180kg',        // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£17.79',                                                                // PRECO (COLETADO EM 28/08/2026)
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 330489,                                                          // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/41851EPYH6L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best smart scales',                                                  // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01N1UX8RW?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best smart scales for almost everyone: 330,489 ratings at 4.6 for £17.79, and it is open about having four electrodes rather than pretending otherwise.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Three hundred and thirty thousand ratings is not a review count, it is a census. The RENPHO Elis 1 is the most reviewed product we have ranked in any category on this site, by an enormous margin, and it holds 4.6 stars across all of them. At £17.79 the question is not whether it is good value but whether anything above it is worth the difference.

The specification is straightforward and, crucially, honest about its hardware: four high-sensitivity electrodes, four load cells, weight in 0.05kg increments up to 180kg, and 13 body metrics through the RENPHO app with unlimited user profiles so a household shares one scale. Four electrodes means foot-to-foot measurement, which is the standard for every bathroom scale under £60 and the reason the abdominal figures are estimates.

The 13 metrics are not 13 measurements. Body fat, muscle mass, bone mass, visceral fat, protein and the rest all come from one impedance reading run through a formula with your height, age and sex. That is not a criticism of RENPHO specifically — it is true of every scale here — but it does mean the £79.99 machine advertising 50 metrics is not doing four times the work. Buy this, weigh yourself at the same time each morning, and track the direction rather than the absolute number.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['330,489 ratings at 4.6, the deepest evidence of any product we have ranked', 'Costs £17.79, a fraction of the machines above it', 'States its four-electrode hardware plainly', '0.05kg increments up to 180kg with auto calibration', 'Unlimited user profiles on one scale'], // PONTOS POSITIVOS
                'contras' => ['Four electrodes, so current never crosses the torso and abdominal figures are estimated', 'The 13 metrics come from one impedance reading, not 13 measurements', 'App account required to see anything beyond weight'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Withings Body Smart Scale, 8 Metrics, Wi-Fi and Bluetooth',               // NOME (ENCURTADO)
                'price' => '£69.00',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 38883,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61SP6h2s0AL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Withings Body Smart scale with touchscreen display',                 // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C3JNJPZ7?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The scale to buy if you want the data to survive: Wi-Fi rather than Bluetooth, 38,883 ratings, and a restrained 8 metrics from a company that could easily claim 50.', // TEXTO CURTO (CARD)
                'body' => "Withings is a French medical device company rather than a marketplace brand, and the restraint shows. The Body Smart reports 8 metrics. The £79.99 GE further down this list reports 50 from hardware of the same family. Withings could print a bigger number tomorrow by having its app divide the same impedance reading more ways, and it does not, which is the single best reason to trust the eight it does give you.

The practical advantage over the cheap scales is Wi-Fi. Bluetooth scales only record a reading if your phone is nearby, unlocked and the app has been opened recently enough to reconnect — which is why people abandon them. This syncs on its own the moment you step off, so the history builds whether or not you remember to care. The touchscreen display and the Withings Health Mate app are both several classes above what £20 buys.

At 4.3 from 38,883 ratings the sample is the second deepest here, though the average sits below the £17.79 RENPHO. It costs £51 more, and for that you are buying reliable syncing, a company likely to still support the app in five years, and eight numbers instead of thirteen. One oddity: the Amazon specification table lists this product's Special feature in Polish, on a British listing.", // TEXTO SEO LONGO
                'pros' => ['Wi-Fi syncing, so readings record without your phone present', 'Reports a restrained 8 metrics from a medical device company', '38,883 ratings at 4.3', 'Touchscreen display and a genuinely good companion app', 'Tracks visceral fat and water percentage over time'], // PONTOS POSITIVOS
                'contras' => ['Costs £51 more than the RENPHO for the same class of measurement', 'Specification field is written in Polish on a UK listing', '4.3 average is below several cheaper scales here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Etekcity Smart Scales, 13 Body Composition Metrics, 4 Sensors',           // NOME (ENCURTADO)
                'price' => '£15.88',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 55503,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61PNi04zGnL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Etekcity smart bathroom scales with app and 13 body metrics',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D7MND7CB?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest scale in this comparison at £15.88, with 55,503 ratings, and functionally the same machine as the £17.79 leader.', // TEXTO CURTO (CARD)
                'body' => "Etekcity and RENPHO are close cousins in this market and the products reflect it: four high-precision sensors, 13 metrics through a free app, 0.05kg increments, a tempered glass platform. At £15.88 it is the least expensive way onto this page and 55,503 ratings at 4.4 stars is more evidence than every product below it combined.

The comparison with the RENPHO at number one is instructive precisely because it is so close. Same electrode arrangement, same metric count, same measurement principle, £1.91 apart. What separates them is review depth — 330,489 against 55,503 — and two tenths of a star. Neither difference is large enough to matter much, and if this one is on offer when the RENPHO is not, buy it without hesitation.

The thing to understand before you buy either is what 13 metrics actually is. The scale passes a tiny current between your feet and measures how much the tissue resists it; fat, muscle and water conduct differently, so one impedance figure plus your stated height, age and sex feeds a regression formula that outputs everything else. It is genuinely useful for direction of travel. It is not a measurement of your body fat percentage in the sense a DEXA scan would give you, and no scale at any price on this page is.", // TEXTO SEO LONGO
                'pros' => ['Cheapest scale in this comparison at £15.88', '55,503 ratings at 4.4', 'Same measurement hardware as scales costing four times more', '0.05kg increments on a tempered glass platform', 'Free app with no subscription'], // PONTOS POSITIVOS
                'contras' => ['Four-electrode measurement, so no torso path and no segmental data', 'Bluetooth only, so the phone must be present to record', 'Two tenths of a star below the RENPHO on a fifth of the sample'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Smart Scales with App and Bluetooth, 4 Electrodes, High Precision',       // NOME (ENCURTADO)
                'price' => '£29.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 31635,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/41owV6L0qEL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Smart bathroom scales with app and four sensitive electrodes',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08839L43J?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Joint highest rated here at 4.6 across 31,635 ratings, and one of only three listings that states its electrode count where a buyer will see it.', // TEXTO CURTO (CARD)
                'body' => "This scale shares the top rating in the comparison with the RENPHO, at 4.6 stars, and does it across 31,635 ratings, which is a serious sample. The first bullet is unusually specific for an unbranded product: four high-precision sensors and four sensitive electrodes, stated plainly rather than buried.

That specificity is worth rewarding. The electrode count is the one hardware fact that genuinely differentiates these machines, and most listings at this price either omit it or bury it behind a metric count. Knowing you are buying a four-electrode scale tells you exactly what you are getting: consistent foot-to-foot impedance, reliable for trends, estimated rather than measured for anything above the waist.

At £29.99 it sits between the £16 pair above it and the £70 machines below, and the honest question is what the extra £12 over the Etekcity buys. On the evidence, two tenths of a star and a slightly better build. That is a reasonable trade if you want a scale that feels solid underfoot, and no trade at all if you only care about the number. It is Bluetooth rather than Wi-Fi, so readings need your phone nearby to record.", // TEXTO SEO LONGO
                'pros' => ['4.6 stars from 31,635 ratings, joint highest average here', 'States both sensor and electrode counts in the first bullet', 'Solid build for the money', 'Works with unlimited user profiles'], // PONTOS POSITIVOS
                'contras' => ['Costs £12 more than the Etekcity for the same measurement principle', 'Bluetooth only, no automatic syncing', 'No named brand behind it for long-term app support'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'INSMART Bluetooth Smart Body Fat Scales with App',                        // NOME (ENCURTADO)
                'price' => '£21.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 33351,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/412mkp+9W8L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'INSMART Bluetooth smart body fat scales with tempered glass platform', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07Q9PS28M?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A 6mm toughened glass platform and 33,351 ratings for £21.99, sitting squarely in the middle of the budget group on every measure.', // TEXTO CURTO (CARD)
                'body' => "INSMART has been selling this scale long enough to gather 33,351 ratings at 4.4 stars, which puts it third for review depth in this comparison. The platform is 6mm toughened glass with 0.05kg increments, and the app covers the usual body composition set.

There is not much to separate it from the three scales above it, and that is the honest assessment rather than a criticism. The budget end of this category is a commodity: four electrodes, four load cells, a Bluetooth chip and an app, assembled by a handful of factories and sold under a dozen names. The differences that survive scrutiny are the size of the platform, the quality of the glass, how well the app is maintained, and the review count.

On those, INSMART does fine. The 6mm glass is thicker than some rivals use and matters if anyone in the house is near the 180kg limit. The £21.99 price sits between the £16 pair and the £29.99 above it without a clear reason to prefer it to either. Buy it if it is discounted below the Etekcity; otherwise the scales above have either more evidence or a better rating for similar money.", // TEXTO SEO LONGO
                'pros' => ['33,351 ratings at 4.4, third deepest sample here', '6mm toughened glass platform, thicker than several rivals', '0.05kg increments up to 180kg', 'Established seller with a maintained app'], // PONTOS POSITIVOS
                'contras' => ['Nothing meaningfully distinguishes it from cheaper scales here', 'Four electrodes with no torso measurement path', 'Bluetooth only'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Healthkeep Smart Body Fat Scale, 13 Metrics, 26x26cm',                    // NOME (ENCURTADO)
                'price' => '£22.49',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 12118,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61jZ6wmJLoL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Healthkeep smart body fat scale with 13 body composition metrics',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F7XCMSGY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A compact 26 by 26cm scale with 12,118 ratings at 4.5, and the same 13 metrics the £15.88 Etekcity delivers.', // TEXTO CURTO (CARD)
                'body' => "The differentiator here is size, and it cuts both ways. At 26 by 26cm this is one of the smaller platforms in the comparison, which is genuinely useful in a cramped bathroom where a scale has to live behind a door or under a basin. It is less useful if you have large feet, because a smaller platform means less room to stand consistently, and standing in a slightly different place changes the impedance path and therefore the reading.

Everything else is the standard budget package done competently: 13 metrics, 180kg capacity, iOS and Android app, 12,118 ratings at 4.5 stars. That rating is a tenth above the Etekcity and INSMART, on a smaller but still substantial sample.

At £22.49 it costs £6.61 more than the Etekcity for the same metric count and the same measurement principle. The honest reason to choose it is the footprint. If your bathroom has room for a full-size scale, the cheaper options above give you more platform and more review history for less money, and none of the three will tell you anything different about your body.", // TEXTO SEO LONGO
                'pros' => ['12,118 ratings at 4.5, a tenth above the other budget scales', 'Compact 26 by 26cm footprint suits small bathrooms', '180kg capacity with iOS and Android support', '13 metrics, matching scales costing more'], // PONTOS POSITIVOS
                'contras' => ['Small platform makes consistent foot placement harder', 'Costs £6.61 more than the Etekcity for identical capability', 'Four electrodes, Bluetooth only'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'GE Smart Scale with Handles, 8-Electrode Segmental BIA, 50 Metrics',      // NOME (ENCURTADO)
                'price' => '£79.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 7343,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/41DyVuGu77L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'GE smart scale with handles and eight electrode segmental analysis', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FH1MLMY8?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best value 8-electrode scale here, with genuine segmental measurement — and the only listing in the comparison that admits what BIA cannot do.', // TEXTO CURTO (CARD)
                'body' => "This is where the hardware genuinely changes. The GE uses eight electrodes across a platform and a pair of retractable handles, running dual-frequency segmental BIA. Because current travels hand-to-foot as well as foot-to-foot, it passes through the torso, which is the region every four-electrode scale can only estimate. If you want a trunk figure that is measured rather than inferred, this is the cheapest honest route to one at £79.99.

It also contains the single most creditable sentence we found across ten listings, and it is hidden in the fourth bullet: the data from this BIA technology is intended solely for long-term trend tracking and should not be considered equivalent to clinical measurement. That is exactly right, it applies to every scale on this page, and GE is the only manufacturer here willing to print it.

The irony is that the same listing sells 50 body composition metrics two bullets earlier. Fifty numbers from one segmental impedance sweep is still fifty derived figures, and the honest disclaimer and the inflated metric count sit four lines apart on the same page. Seven of them show on the LED display, which is the number that actually matters day to day. At 4.3 from 7,343 ratings it is well evidenced for the price bracket.", // TEXTO SEO LONGO
                'pros' => ['Eight electrodes with handles, so current genuinely crosses the torso', 'Dual-frequency segmental BIA at £79.99, the cheapest here', 'Prints an honest disclaimer about what BIA can and cannot do', '7 key metrics on the display, not just in the app', '7,343 ratings at 4.3'], // PONTOS POSITIVOS
                'contras' => ['Advertises 50 metrics two bullets above its own accuracy disclaimer', 'Costs over four times the RENPHO for a difference most users will not act on', 'Handles make it bulkier to store than a plain platform'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Withings Body Scan, Segmental BIA Scale with 6-Lead ECG',                 // NOME (ENCURTADO)
                'price' => '£249.00',                                                               // PRECO
                'rating' => 4.1,                                                                    // NOTA
                'reviews_count' => 8814,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/7119U5RIieL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Withings Body Scan segmental BIA scale with six lead ECG',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CZTL6Q5G?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only scale here that measures something a bathroom scale normally cannot: a 6-lead ECG with atrial fibrillation detection, alongside segmental body composition.', // TEXTO CURTO (CARD)
                'body' => "Everything else in this comparison is a scale that estimates body composition. This is a scale with a medical instrument in it. The Body Scan takes a 6-lead electrocardiogram through the handle and platform electrodes and screens for atrial fibrillation, which is a genuine clinical function and the reason the price is £249. AFib is common, frequently symptomless, and materially raises stroke risk — a device that flags it while you weigh yourself is doing something no metric count can imitate.

The body composition side is segmental, using the same eight-electrode principle as the GE but with Withings' calibration behind it, and it syncs over Wi-Fi so the record builds itself. With 8,814 ratings it has real evidence behind it, unusual at this price.

The 4.1 average is the thing to understand before buying. Devices that promise medical-adjacent capability collect disappointed reviews from people who expected certainty and got a screening tool, and the ECG feature has had regulatory availability differences between markets that have frustrated buyers. Read recent reviews for your region before committing. As a body composition scale it is not four times better than the GE; the ECG is what you are paying for, and only you can decide whether that is worth £169 more.", // TEXTO SEO LONGO
                'pros' => ['6-lead ECG with atrial fibrillation detection, unique in this comparison', 'Segmental BIA through eight electrodes with handles', 'Wi-Fi syncing and the Withings Health Mate ecosystem', '8,814 ratings, substantial for a £249 device'], // PONTOS POSITIVOS
                'contras' => ['4.1 average, low for the price', 'ECG availability has varied by market and frustrated some buyers', 'Costs £169 more than the GE for similar body composition data', 'Screening tool, not a diagnostic device'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Smart Scales with 8 Electrodes and Voice Prompt, 28 Metrics, 180kg',      // NOME (ENCURTADO)
                'price' => '£69.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 3447,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71xVOcRnmAL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Smart scale with eight electrodes and voice prompt for body composition', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CXPD9KMQ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Eight-electrode measurement for £69.99, £10 below the GE, but with half the review history and no accuracy disclaimer anywhere on the page.', // TEXTO CURTO (CARD)
                'body' => "This is the budget route into eight-electrode measurement. At £69.99 it undercuts the GE by £10 while offering the same fundamental advantage: handles that create a hand-to-foot current path through the torso, which is what separates measured trunk data from estimated trunk data. It reports 28 metrics, has a voice prompt function and handles up to 180kg.

At 4.4 stars from 3,447 ratings the evidence is adequate rather than strong — less than half the GE's sample, and a fraction of the budget scales above. For an unbranded product at £70 that is worth weighing, because the thing most likely to fail on any of these scales is not the hardware but the app, and an unbranded app is the one most likely to stop being updated.

The voice prompt is a genuinely thoughtful inclusion that nobody markets properly: it reads your weight aloud, which matters for anyone who cannot easily bend to read a display. Set against that, the listing makes no attempt anywhere to explain the limits of what BIA measures — the GE at number seven does, for £10 more. Given the choice, we would spend the extra tenner on the machine whose manufacturer is willing to tell you what it cannot do.", // TEXTO SEO LONGO
                'pros' => ['Eight electrodes with handles for £69.99, the cheapest here', 'Voice prompt reads the weight aloud, genuinely useful for some users', '28 metrics and 180kg capacity', '3,447 ratings at 4.4'], // PONTOS POSITIVOS
                'contras' => ['Less than half the review history of the GE for £10 less', 'No accuracy disclaimer anywhere on the listing', 'Unbranded, so long-term app support is uncertain'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'InBody H20N Full Body Composition Analyser Scale',                        // NOME (ENCURTADO)
                'price' => '£249.99',                                                               // PRECO
                'rating' => 3.8,                                                                    // NOTA
                'reviews_count' => 531,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/21x-NdBnIJL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'InBody H20N full body composition analyser scale with handle electrodes', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07QR8SYP1?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The clinical brand in this comparison, and the most instructive entry on the page: it costs the most, reports three numbers, and has the lowest rating here.', // TEXTO CURTO (CARD)
                'body' => "InBody is the body composition brand you meet in gyms, physiotherapy clinics and research papers. Its commercial analysers are the reference standard against which cheap scales are validated. The H20N is its domestic model, and what it chooses to report is the whole argument of this article: weight, body fat percentage, and skeletal muscle mass. Three numbers, for £249.99.

It uses handle-bar electrodes so the measurement crosses the whole body rather than travelling foot to foot, and InBody says so explicitly in its second bullet — that most body fat scales cannot do this. You enter your height with a dial rather than through an app, which tells you something about the design priorities: this is an instrument, not a lifestyle product.

Then look at the rating. Three point eight from 531 ratings is the lowest average in this comparison, below a £15.88 scale. There is a lesson in that. The company that refuses to invent forty extra metrics, refuses to report a metabolic age, and gives you three defensible figures instead of fifty derived ones is the company whose customers feel short-changed. We are ranking it last because at £249.99 with a 3.8 average it is genuinely hard to recommend to most buyers. But the reason it reports so little is that it knows what bioimpedance can honestly support, and every scale above it is dividing the same signal more ways.", // TEXTO SEO LONGO
                'pros' => ['The clinical body composition brand used in gyms and research', 'Handle electrodes measure across the whole body, not foot to foot', 'Reports only figures bioimpedance can defensibly support', 'Height entered by dial, no app account required to use it'], // PONTOS POSITIVOS
                'contras' => ['3.8 from 531 ratings, the lowest average in this comparison', 'Costs £249.99 for three metrics', 'Only 531 ratings, the thinnest sample here', 'No app-driven extras that buyers at this price expect'], // PONTOS NEGATIVOS
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
        $this->command?->info("SmartScalesSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
