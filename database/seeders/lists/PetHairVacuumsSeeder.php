<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class PetHairVacuumsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE ASPIRADORES PARA PELO DE PET DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=handheld+vacuum+pet+hair&rh=p_36%3A3000-  (20 ASINS EM 22 CARDS)
        // CATEGORIA PET SUPPLIES. A BUSCA MISTURA PORTATIL DE MAO E VERTICAL SEM FIO;
        // MANTIVEMOS OS DOIS PORQUE A ALEGACAO DE Pa ATRAVESSA AS DUAS FORMAS.
        //
        // ─── ACHADO PRINCIPAL: A CORRIDA DE Pa SO EXISTE ENTRE OS SEM MARCA ───
        // 1. A PRESSAO ATMOSFERICA AO NIVEL DO MAR E 101.325 Pa. ESSE E O TETO ABSOLUTO
        //    DE SUCCAO DE QUALQUER APARELHO: UM VACUO PERFEITO NA ENTRADA DA A UMA
        //    DIFERENCA DE 101 kPa E NADA MAIS. A TABELA DO QUE OS ANUNCIOS DECLARAM:
        //      ULTENIC ...... 65.000 Pa (£115.99) .... 64% DE UM VACUO PERFEITO
        //      UNINELL ...... 50.000 Pa EM TURBO (£118.98)
        //      BULELINK ..... 50.000 NO TITULO / 45.000 NO BULLET (£119.99)
        //      BOTATIO ...... 35.000 Pa (£35.99)
        //      LYIAZSOY ..... 27.000 / 18.000 / 9.000 Pa POR MARCHA (£33.99)
        //      RELIDOL ...... 8.000 Pa (£33.98)
        //      SHARK (x2), BISSELL, VYTRONIX .. NAO PUBLICAM Pa NENHUM
        //    A DIVISAO E TOTAL. AS QUATRO MARCAS ESTABELECIDAS DE ASPIRADOR NAO ENTRAM NA
        //    DISPUTA; TODAS AS SEIS QUE PUBLICAM Pa DE CINCO DIGITOS SAO SEM MARCA.
        // 2. Pa E SUCCAO SELADA: A PRESSAO MEDIDA COM A ENTRADA BLOQUEADA, OU SEJA COM
        //    FLUXO DE AR ZERO. E O NUMERO MAIS FACIL DE INFLAR PORQUE NAO DIZ NADA SOBRE
        //    VAZAO (L/s) NEM SOBRE AIR WATTS, QUE E O QUE ARRANCA PELO DE CARPETE. UM
        //    MOTOR PEQUENO COM BOCAL ESTREITO PRODUZ Pa ALTO E MOVE QUASE NENHUM AR.
        //    NENHUMA DAS DEZ PUBLICA VAZAO OU AIR WATTS.
        // 3. A RELIDOL E A ANCORA DA REALIDADE. £33.98, FORMATO DE MAO, E DECLARA "suction
        //    power up to 8Kpa". AS VIZINHAS DE PRECO E TAMANHO IDENTICOS DECLARAM 27.000,
        //    35.000 Pa. E A LYIAZSOY, A £33.99, PUBLICA A ESCADA COMPLETA E A PRIMEIRA
        //    MARCHA DELA E 9.000 Pa — PRATICAMENTE O MESMO NUMERO DA RELIDOL. OS DOIS
        //    APARELHOS MAIS BARATOS CONCORDAM SOBRE O QUE UM PORTATIL ENTREGA DE VERDADE;
        //    A DIFERENCA E QUE UM SO PUBLICA O TETO.
        // 4. A LYIAZSOY FAZ O QUE NINGUEM MAIS FAZ: DA Pa POR MARCHA COM AUTONOMIA.
        //    "first gear 9000PA... 30-35 minutes, second gear 18000PA... 25 minutes,
        //    third gear can reach 27000PA and can be used for about 15 minutes". ENTAO OS
        //    27.000 DO TITULO DURAM 15 MINUTOS. E A UNICA FICHA DA CATEGORIA QUE LIGA
        //    SUCCAO A TEMPO.
        //
        // ─── ACHADO SECUNDARIO: A BULELINK INFLA QUATRO NUMEROS DE UMA VEZ ───
        // 5. ENTRE O TITULO E O CORPO DO MESMO ANUNCIO (7.361 AVALIACOES):
        //      POTENCIA .. TITULO "600W" ...... BULLET E TABELA "550W"
        //      SUCCAO .... TITULO "50kPa" ..... BULLET E TABELA "45Kpa"
        //      AUTONOMIA . TITULO "70Mins" .... BULLET E TABELA "65 minutes"
        //      RESERVATORIO TITULO "1.8L" ..... BULLET "one-touch 1.6L dust tank"
        //    QUATRO ESPECIFICACOES, QUATRO INFLACOES, TODAS NA MESMA DIRECAO. E O CASO
        //    MAIS LIMPO DE TITULO-CONTRA-CORPO QUE JA ENCONTRAMOS EM QUALQUER CATEGORIA.
        //
        // ─── OUTROS ACHADOS ───
        // 6. ROTACAO DE MOTOR VIRA FANTASIA NO FIM BARATO. A BOTATIO DECLARA MOTOR QUE
        //    GIRA "up to 90,000 revolutions per minute" NUM APARELHO DE £35.99, E A
        //    LYIAZSOY DECLARA QUE O SOPRO CHEGA A "220,000RPM times per minute" — QUE
        //    ALEM DE SER UM NUMERO IMPOSSIVEL PARA ELETRODOMESTICO DE CONSUMO E UMA
        //    UNIDADE DUPLICADA ("rotacoes por minuto vezes por minuto").
        // 7. AS MARCAS ESTABELECIDAS PUBLICAM O QUE INCOMODA. A SHARK WANDVAC DECLARA
        //    "UP TO 8 MINUTES RUN-TIME" E A BISSELL DECLARA 18 MINUTOS — NUMEROS
        //    DESFAVORAVEIS QUE NENHUM ANUNCIO SEM MARCA IMPRIMIRIA. A BISSELL AINDA DA
        //    14,4 V, 0,65 L E 68 dB, E A VYTRONIX DA 22,2 V, 40 MIN EM ECO, 0,5 L, 2,3 kg
        //    E AS DIMENSOES. NENHUMA DAS QUATRO DIZ UMA PALAVRA SOBRE Pa.
        // 8. A SHARK CH951, A MAIS AVALIADA DA BUSCA COM 11.535, NAO PUBLICA Pa, NEM
        //    AUTONOMIA, NEM POTENCIA, NEM CAPACIDADE. PUBLICA "two ultra-powerful cyclonic
        //    air streams" E O PESO EM LIBRAS ("only 2.8 lbs") NUMA LOJA BRITANICA — E O
        //    ULTIMO BULLET AVISA QUE E PRODUTO IMPORTADO COM TERMOS SEPARADOS.
        // 9. A SHARK WANDVAC DA DOIS PESOS: "lightweight (700g)" NO PRIMEIRO BULLET E
        //    "In Use Weight 593g" NO QUINTO.
        // 10. A ULTENIC DIZ QUE 60 MINUTOS EM MODO ECO BASTAM PARA LIMPAR UMA CASA DE
        //    "2,200 sq ft" — 204 m2, EM PES QUADRADOS, NUMA LOJA BRITANICA. E TEM 4.2, A
        //    MENOR NOTA DA LISTA, EMPATADA COM A SHARK CH951.
        // 11. A UNINELL E A UNICA QUE QUALIFICA O PROPRIO NUMERO: "up to 50kPa of powerful
        //    suction IN TURBO MODE", E DEPOIS DIZ QUE OS 70 MINUTOS SAO "in Hardfloor
        //    mode". OS DOIS PICOS NAO ACONTECEM AO MESMO TEMPO, E ELA DIZ ISSO.
        // 12. A BULELINK E A UNINELL DESCREVEM A MESMA ESCOVA COM AS MESMAS PALAVRAS —
        //    "V-shaped roller brush", "comb teeth", REDUCAO DE EMBOLAMENTO DE 95% — E AS
        //    DUAS DECLARAM BATERIA DE 8 CELULAS. E O MESMO APARELHO OEM COM DUAS MARCAS.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: TUDO ABAIXO DE 400 AVALIACOES (VAX HANDVAC 57, SHARK POWERBOOST 33, BSOON
        // 18, E OS SEM MARCA COM 15 A 48); O SEGUNDO ASIN DA SHARK CH951 (B0GX1MHH3F,
        // 7.300 AVALIACOES, MESMO MODELO EM OUTRA COR) PARA NAO DAR TRES VAGAS A SHARK.
        // DENTRO: NOTA DE 4.2 A 4.6, PRECO DE £33.98 A £119.99, NOVE MARCAS.
        //
        // FOCUS KEYWORD: best pet hair vacuum
        // VARIACOES TRABALHADAS: pet hair vacuum uk / handheld vacuum for pet hair /
        // cordless vacuum for pet hair / vacuum suction kpa explained /
        // best vacuum for dog hair / car vacuum pet hair / anti tangle brush vacuum /
        // cordless stick vacuum pet / handheld hoover
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'pet-supplies',               // SLUG DA CATEGORIA (URL)
            'name' => 'Pet Supplies',               // NOME EXIBIDO
            'description' => 'Everything your furry friends need, ranked by quality, comfort and value.', // DESCRICAO (MESMO TEXTO JA CADASTRADO, PARA NAO TROCAR A CADA SEED)
        ];

        $article = [
            'slug' => 'best-pet-hair-vacuum',                                       // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Pet Hair Vacuum 2026: 10 Ranked on Suction You Can Check', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Pet Hair Vacuum 2026: Top 10 Compared',            // FALTAM 43 CHARS - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best pet hair vacuum options on Amazon by checking the kPa claims against atmospheric pressure, comparing models from £33.98 to £119.99.', // META DESCRIPTION (152 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best pet hair vacuum',                              // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Atmospheric pressure at sea level is 101,325 pascals, and that is the ceiling on what any vacuum can pull: a perfect vacuum at the nozzle gives you a difference of 101 kPa and not one pascal more. So when a £115.99 cordless stick advertises 65 kPa, it is claiming 64% of a perfect vacuum, and when a £35.99 handheld advertises 35,000 Pa it is claiming more sealed suction than a mains cylinder cleaner. Then look at who is making these claims. Shark, Bissell and Vytronix — the four established vacuum brands in this comparison — publish voltage, runtime, dust capacity and decibels, and not one of them prints a pascal figure at all. Every five-figure suction number on this page comes from a listing with no brand behind it. The most useful number we found is the smallest: a £33.98 handheld quietly states 8 kPa, and the £33.99 one next to it publishes a full ladder of 9,000, 18,000 and 27,000 Pa with the runtime for each. Below we rank the best pet hair vacuum options on Amazon in August 2026 on what survives being checked against physics.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Buying the best pet hair vacuum means ignoring the biggest number on the box. Pascals measure sealed suction, taken with the nozzle blocked and no air moving, which is why it is the easiest figure to inflate and the one least related to lifting hair out of a carpet — that job needs airflow and a brush, and nobody on this page publishes an airflow figure at all. Judge instead on three things you can verify: a motorised brush head, because a plain nozzle slides over embedded hair while a spinning brush drags it out; runtime at the setting you will actually use, which the honest listings state and the rest bury; and dust capacity, because pet hair fills a bin faster than dust does and a 0.5 litre cup on a Labrador household means emptying it mid-room. Crucially, treat a missing pascal figure as a good sign rather than a gap. The four brands here with a real vacuum business behind them all decline to quote one, and the one listing whose figure looks honest quotes 8 kPa — a number no marketing department would choose, which is rather the point.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                          // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 16:15:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Shark CH951 UltraCyclone Pet Pro Plus Handheld Vacuum, Self-Cleaning Brush', // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£74.84',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 11535,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71RZ0xA0fmL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best pet hair vacuum',                                               // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08559H8W2?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best pet hair vacuum here on the feature that actually does the work: a self-cleaning motorised brush that strips hair off its own bristles, backed by 11,535 ratings.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Eleven thousand five hundred and thirty-five ratings is more than the next four listings combined, and the reason people keep this one is in the second bullet: a detachable self-cleaning Pet Power Brush that eliminates hair wrap from the brushroll itself. Every pet owner who has owned a vacuum knows the failure — the brush bar becomes a solid rope of hair within a fortnight and you spend Sunday cutting it off with scissors. A brushroll designed to shed its own wrap is worth more than any suction figure, and it is why this sits first.

It is also the clearest example of the pattern this article is about. Shark publishes no pascal figure, no wattage, no runtime and no dust capacity. What it publishes is two cyclonic air streams, an XL dust cup and a 2.8 lb weight. A company with a real vacuum business and a warranty department does not print a five-digit suction number, and four of the ten listings here behave the same way while the other six advertise between 8,000 and 65,000 Pa.

Two things to weigh. Four point two stars is the joint lowest average in this comparison, and on 11,535 ratings that is settled — the common complaints on handhelds of this type are runtime and bin size, neither of which Shark states. And the weight is given in pounds on a British listing, with the final bullet noting this is an international product sold from abroad with separate terms, so check the plug and the guarantee before ordering.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['11,535 ratings, more than the next four listings combined', 'Self-cleaning Pet Power Brush strips hair wrap off its own brushroll', 'Twin cyclonic separation with a washable filter and XL dust cup', 'Publishes no inflated pascal figure, unlike six listings here', '2.8 lb in the hand with crevice and scrubbing tools included'], // PONTOS POSITIVOS
                'contras' => ['4.2 stars, the joint lowest average in this comparison', 'No runtime, dust capacity or wattage published anywhere', 'Weight given in pounds on a UK listing', 'Sold as an international product with separate terms'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Bissell Pet Hair Eraser 2278N, 14.4V, 18 Minutes, 0.65L, 68dB',           // NOME (ENCURTADO)
                'price' => '£94.74',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 1291,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Wq-fVrzlL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Bissell Pet Hair Eraser cordless handheld vacuum',                   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0957QNC6T?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest rated vacuum here at 4.6, publishing voltage, runtime, capacity and decibels — four real figures — and not a single pascal.', // TEXTO CURTO (CARD)
                'body' => "Fourteen point four volts. Eighteen minutes. Nought point six five litres. Sixty-eight decibels. Those four numbers are on the listing, they are all specific, and none of them flatters the product — eighteen minutes is a short runtime and Bissell prints it anyway. That is what a specification looks like when a company expects to answer for it, and it is the opposite of the 65,000 Pa further down this page.

The motorised rotary brush is the working part, as it is on the Shark above: a spinning brush drags embedded hair out of upholstery where a plain nozzle just glides over it. There is three-stage filtration with a HEPA element, a crevice tool and an upholstery tool, and a large easy-empty bin. Four point six stars across 1,291 ratings is the best average in this comparison.

Two reservations. At £94.74 this is the second most expensive machine here and £19.90 more than the Shark with nine times the reviews. And 0.65 litres is a small bin for a shedding dog — the practical limit on a handheld is not battery but capacity, and on a Labrador in spring you will empty it more than once per sofa. Eighteen minutes is honest but it is still eighteen minutes; this is a spot-cleaning tool for stairs, car seats and upholstery rather than something you clean a whole house with.", // TEXTO SEO LONGO
                'pros' => ['4.6 stars across 1,291 ratings, the best average in this comparison', 'Publishes voltage, runtime, capacity and decibels, all four specific', 'Motorised rotary brush pulls embedded hair out of upholstery', 'Three-stage filtration with a HEPA element', 'States 18 minutes honestly rather than hiding the runtime'], // PONTOS POSITIVOS
                'contras' => ['£94.74, the second most expensive machine in this comparison', '0.65L bin fills quickly on a heavily shedding dog', '18 minutes limits it to spot cleaning rather than whole rooms', 'No suction figure of any kind, if you want one to compare'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'UNINELL UV5 Cordless Stick Vacuum, 580W, 50kPa Turbo, 70 Minutes',        // NOME (ENCURTADO)
                'price' => '£118.98',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 2920,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71JcB8kGDWL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'UNINELL UV5 cordless stick vacuum for pet hair',                     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DQX1KQ2W?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing here that qualifies both its headline numbers — 50kPa in turbo mode, 70 minutes in hardfloor mode — instead of implying you get them together.', // TEXTO CURTO (CARD)
                'body' => "Read the first and third bullets carefully and UNINELL does something the rest of this category does not: it attaches each peak figure to the mode that produces it. Up to 50kPa of suction in Turbo mode. Up to 70 minutes of runtime in Hardfloor mode. Those are different settings, they cannot happen simultaneously, and saying so is the difference between a specification and a boast. Fifty thousand pascals is still half of atmospheric pressure and should be read with the scepticism this whole article recommends, but the qualification is genuine and nobody else offers it.

The hardware is the best-equipped stick here. A V-shaped anti-tangle roller with comb teeth and rubber strips, four LED headlights, a removable 8-cell battery you can swap for a second, a seven-stage filter, a self-standing body so it does not fall over when you pause, and an LED touchscreen showing mode, battery and blockage alerts. Four point six stars across 2,920 ratings is the joint best average in this comparison.

Two things. At £118.98 it is the most expensive machine on this page, and the 0.7 litre dust cup is small for a stick vacuum — the Bulelink at number seven gives 1.6 litres. And the listing is unusually candid in a way worth noting: a bracketed warning in the fourth bullet explains that the trigger only turns the machine on and off, and mode changes must be made on the touchscreen, which is the sort of ergonomic detail buyers normally discover on day two.", // TEXTO SEO LONGO
                'pros' => ['Qualifies 50kPa as turbo mode and 70 minutes as hardfloor mode', '4.6 stars across 2,920 ratings, joint best average here', 'Removable 8-cell battery, swappable for a second', 'V-shaped anti-tangle roller with comb teeth and four LED headlights', 'Self-standing with an LED touchscreen and blockage alerts'], // PONTOS POSITIVOS
                'contras' => ['£118.98, the most expensive machine in this comparison', '0.7L dust cup is small for a stick vacuum', '50kPa is still half of atmospheric pressure and should be read sceptically', 'Mode changes need the touchscreen, not the trigger'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'VYTRONIX EBCV6 3-in-1 Cordless Vacuum, 22.2V, 40 Minutes, 0.5L, 2.3kg',   // NOME (ENCURTADO)
                'price' => '£59.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 2604,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61LpkdoZx7L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'VYTRONIX 3-in-1 cordless stick and handheld vacuum',                 // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DJPLRBW6?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest stick vacuum here at £59.99, publishing voltage, runtime, capacity, weight and dimensions — and closing with a bullet that says no frills, no gimmicks.', // TEXTO CURTO (CARD)
                'body' => "Twenty-two point two volts, up to 40 minutes in ECO mode, a 0.5 litre bin, 2.3kg, and dimensions of 110 x 23.5 x 22cm. Every figure a buyer needs to decide whether this fits their house and their arm, published plainly, at £59.99 — roughly half what the two sticks above it cost. The last bullet says: we keep it straightforward, no frills, no gimmicks, just effective appliances. On a page where a rival claims a motor spinning at 90,000 rpm, that reads less like marketing and more like a position.

It converts between a floor stick and a detachable handheld with a 2-in-1 crevice and dusting tool, which for pet hair is the right architecture — floors with the wand, stairs and sofa with the handheld. There is a one-click bin release, a wall mount, and a boost mode for tougher work. Two thousand six hundred and four ratings at 4.3 stars.

Two limits, both of them consequences of the price. There is no motorised brush head, which is the feature the Shark and the Bissell above it are ranked for, and on embedded carpet hair a passive floor head is measurably worse — this will lift surface hair well and struggle with what is woven in. And 0.5 litres is the smallest bin on this page, so a full house clean means emptying it. Charge time is three to four hours for 40 minutes of ECO running, which is a poor ratio if you clean daily.", // TEXTO SEO LONGO
                'pros' => ['Publishes voltage, runtime, capacity, weight and full dimensions', '£59.99, the cheapest stick vacuum in this comparison', 'Converts between floor stick and detachable handheld', 'No pascal claim and an explicit no-gimmicks position', '2,604 ratings at 4.3 stars with a wall mount included'], // PONTOS POSITIVOS
                'contras' => ['No motorised brush head, so embedded carpet hair is a struggle', '0.5L bin, the smallest in this comparison', 'Three to four hours of charging for 40 minutes in ECO', '40 minutes is the ECO figure, not the boost figure'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Shark WandVac 1.0 WV200UK Handheld Vacuum, 700g, 8 Minutes',              // NOME (ENCURTADO)
                'price' => '£89.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 4945,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/617Ef2XzxnL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Shark WandVac 1.0 cordless handheld vacuum in grey',                 // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07H5XMVGD?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Publishes a runtime of up to 8 minutes, which is the least flattering number on this entire page and exactly the kind of figure the pascal-quoting listings never print.', // TEXTO CURTO (CARD)
                'body' => "Up to 8 minutes run-time. That is bullet three, in capitals, on a £89.99 product, and it is worth pausing on because no listing in the bottom half of this page would ever print it. Shark's argument is that the WandVac lives on a charging base on the worktop and is grabbed for thirty seconds at a time — crumbs, a litter tray spill, the passenger footwell — so eight minutes of continuous running is not the constraint it looks like. Whether you accept that depends on how you clean, but the honesty is the point.

At 700g it is the lightest machine in this comparison by a wide margin, which for one-handed use above shoulder height or inside a car genuinely matters. It comes with a duster crevice tool and a multi-surface pet tool, has a HEPA filter, and the charging base is designed to be left out rather than hidden. Four thousand nine hundred and forty-five ratings at 4.4 stars, with a two-year guarantee on registration.

Three things against it. Eight minutes is eight minutes however it is framed, and for a full sofa on a shedding dog it is not enough. There is no motorised brush, only a pet tool, so it is a suction-and-nozzle device on embedded hair. And the listing gives two weights — 700g in the first bullet, an in-use weight of 593g in the fifth — which is a small inconsistency on the specification the whole product is sold on.", // TEXTO SEO LONGO
                'pros' => ['Publishes an 8-minute runtime, the least flattering figure on this page', '700g, by far the lightest machine in this comparison', 'Charging base designed to live on the worktop for grab-and-go use', 'HEPA filter with duster crevice and multi-surface pet tools', '4,945 ratings at 4.4 stars with a two-year guarantee'], // PONTOS POSITIVOS
                'contras' => ['8 minutes is genuinely short for a sofa or a car interior', 'No motorised brush, only a passive pet tool', 'Two different weights given: 700g and 593g in use', '£89.99 for a spot-cleaning tool with a small bin'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Lyiazsoy Handheld Car Vacuum, 9000/18000/27000Pa by Gear, 6000mAh',       // NOME (ENCURTADO)
                'price' => '£33.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 1442,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71f9ErI1--L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Lyiazsoy cordless handheld car vacuum in gold and black',            // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F9W71RQQ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing in the category that gives suction per speed setting with the runtime for each — which shows the 27,000Pa headline lasts fifteen minutes.', // TEXTO CURTO (CARD)
                'body' => "The second bullet is the most useful paragraph in this comparison. First gear, 9000Pa, about 30 to 35 minutes. Second gear, 18000Pa, about 25 minutes. Third gear, 27000Pa, about 15 minutes. Three settings, three suction figures, three runtimes, all published together. Every other listing that quotes a pascal number quotes only the highest one and says nothing about how long it lasts, which makes the number useless; Lyiazsoy shows the whole curve and lets you see that the headline figure on the title is a fifteen-minute setting.

There is a second thing hidden in that ladder. The first gear is 9,000 Pa — almost exactly the 8 kPa that the RELIDOL at number eight publishes as its only figure. Two of the cheapest handhelds on this page, from different brands, agree on what a device this size actually delivers at a sustainable setting. That agreement is worth more than any of the five-figure claims above it.

The rest is a competent £33.99 car vacuum: a 6000mAh battery, USB-C charging, a brushless motor, four functions including blowing and inflating, a washable HEPA filter and a power display. Two caveats. The third bullet claims the blower reaches 220,000RPM times per minute, which is both an impossible figure for a consumer motor and a duplicated unit. And with no motorised brush this remains a nozzle-and-suction tool, better for car seats and crevices than for hair woven into a carpet.", // TEXTO SEO LONGO
                'pros' => ['The only listing that gives suction per gear with runtime for each', 'Shows the 27,000Pa headline is a 15-minute setting', 'Its 9,000Pa first gear matches the honest figure from a rival brand', '6000mAh battery with USB-C charging and a power display', 'Four functions including blowing and inflating, at £33.99'], // PONTOS POSITIVOS
                'contras' => ['Claims a blower speed of 220,000RPM times per minute, a duplicated unit', 'No motorised brush, so embedded carpet hair is beyond it', 'Even the 9,000Pa first gear is modest for upholstery', 'No dust capacity published'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Bulelink Cordless Stick Vacuum, 550W, 45kPa, 65 Minutes, 1.6L',           // NOME (ENCURTADO)
                'price' => '£119.99',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 7361,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71UKuTuX71L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Bulelink cordless stick vacuum with OLED touch screen',              // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F13KXRG8?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Four specifications inflated between the title and the body of the same listing: 600W against 550W, 50kPa against 45, 70 minutes against 65, and 1.8L against 1.6.', // TEXTO CURTO (CARD)
                'body' => "This is the cleanest example of title-versus-body inflation we have found in any category, and it happens four times on one page. The title says 600W, 50kPa, 70Mins and 1.8L. The first bullet says 550W and 45Kpa. The second bullet says 65 minutes. The fourth bullet says a one-touch 1.6L dust tank. And the specification table agrees with the bullets, not the title: 550 W brushless motor, 45 Kpa, 65 minutes. Four numbers, four inflations, every one in the same direction, on a listing with 7,361 ratings.

Judged on the bullets rather than the title it is a good machine and the reason the rating is 4.4. Five hundred and fifty watts brushless, a genuine 1.6 litre bin which is the largest here, eight layers of filtration, a V-shaped anti-tangle roller with comb teeth, 270-degree rotating slotted brushes, LED lighting, a full-colour display and a self-standing body. Under 62 decibels is published, and 30 minutes at maximum suction against 65 at minimum is a useful pair of figures.

Two notes. Forty-five thousand pascals is still 44% of atmospheric pressure and belongs in the sceptical column with the rest. And the V-shaped roller, the comb teeth, the 95% tangle reduction and the 8-cell battery are described in almost the same words on the UNINELL at number three — these are the same OEM machine wearing two brands, which is worth knowing when one is £1.01 dearer than the other.", // TEXTO SEO LONGO
                'pros' => ['1.6L dust bin, the largest in this comparison', 'Publishes 30 minutes at maximum and 65 at minimum, a useful pair', '550W brushless with eight layers of filtration and under 62dB', 'V-shaped anti-tangle roller with 270-degree rotating side brushes', '7,361 ratings at 4.4 stars'], // PONTOS POSITIVOS
                'contras' => ['Title says 600W, 50kPa, 70 minutes and 1.8L; the body says 550, 45, 65 and 1.6', 'All four discrepancies inflate in the same direction', '45kPa is still 44% of atmospheric pressure', 'Appears to be the same OEM machine as the UNINELL at number three'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'RELIDOL Handheld Cordless Vacuum, 8kPa, 1800mAh, 1.25lb',                 // NOME (ENCURTADO)
                'price' => '£33.98',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 1417,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61GBh8aiNYL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'RELIDOL portable rechargeable mini handheld vacuum',                 // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0H2LPPQ39?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Publishes 8kPa where identically sized rivals at the same price claim 27,000 and 35,000 — which is almost certainly the honest number, and is also a weak one.', // TEXTO CURTO (CARD)
                'body' => "Suction power up to 8Kpa. That is what RELIDOL states, at £33.98, for a cordless handheld weighing 1.25lb with an 1800mAh battery. Two listings on this page at £33.99 and £35.99, in the same form factor and the same price bracket, claim 27,000 and 35,000 pascals. They cannot all be measuring the same thing, and the physics says the small number is the plausible one: a battery handheld of this size and power draw produces single-digit kilopascals, and the Lyiazsoy at number six independently confirms it by publishing 9,000 Pa as its own sustainable first gear.

So RELIDOL is the honest listing on this page, and that is exactly why it sits at eight rather than higher. Eight kilopascals is a modest amount of suction. It will lift surface hair from a car seat, crumbs from a sofa cushion and litter from a hard floor, and it will not pull dog hair out of a woven carpet — nothing at this price will, including the ones claiming four times the figure. Twenty to twenty-five minutes of runtime from a three to four hour charge, three nozzle attachments, and under 78 decibels, which is loud but stated.

Two gaps. No dust capacity is published, which on a handheld is the specification that decides how often you stop. And the weight is given in pounds on a UK listing, at 1.25lb — 567 grams — which is genuinely light and would have read better in grams. Buy it knowing what 8kPa is, and it will not disappoint you; buy the 35,000Pa one expecting four times as much and it will.", // TEXTO SEO LONGO
                'pros' => ['Publishes 8kPa, almost certainly the honest figure in its class', 'Independently corroborated by a rival brand publishing 9,000Pa', '1.25lb, among the lightest handhelds in this comparison', 'Three nozzle attachments covering crevices, brush and wide mouth', '20 to 25 minutes of runtime with 1,417 ratings at 4.3 stars'], // PONTOS POSITIVOS
                'contras' => ['8kPa is modest and will not lift hair woven into carpet', 'No dust capacity published anywhere', 'Under 78dB is loud, though at least it is stated', 'Weight given in pounds on a UK listing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Ultenic Cordless Stick Vacuum, 600W, 65kPa, 60 Minutes, Flex Tube',       // NOME (ENCURTADO)
                'price' => '£115.99',                                                               // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 681,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61JqTuqhQXL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Ultenic cordless stick vacuum with flexible tube',                   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GGR9GCK6?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Sixty-five thousand pascals is the largest suction claim in the search and 64% of a perfect vacuum, on the machine with the joint lowest rating here.', // TEXTO CURTO (CARD)
                'body' => "Sixty-five kilopascals. Atmospheric pressure is 101.3, so this listing is claiming just under two-thirds of the theoretical maximum any vacuum on earth can achieve, from a 600W battery stick costing £115.99. For scale, a mains-powered cylinder cleaner typically manages 20 to 30 kPa. The claim is qualified as turbo mode, which helps, but the figure is the largest in the search by 15 kPa and should be treated as a marketing number rather than a measurement.

The engineering underneath is genuinely interesting. The flex tube is the standout: press a button and the wand bends, so you clean under a sofa or a bed without kneeling, and it straightens automatically when lifted. Anyone who has crouched to reach under furniture will recognise the value, and no other machine here offers it. There is also a V-shaped anti-tangle roller, a GreenEye headlight for spotting dust in shadow, a 1.5 litre bin, a removable battery and a live time-remaining display.

Three things hold it at nine. Four point two stars across 681 ratings is the joint lowest average and the second thinnest sample in this comparison. The runtime claim is 60 minutes in Eco mode, which Ultenic says will clean a 2,200 sq ft home — square feet, on a British listing, describing a 204 square metre house that very few UK buyers live in. And the fifth bullet opens with a question mark where an emoji failed to render, which is a small sign of how carefully the page was assembled.", // TEXTO SEO LONGO
                'pros' => ['Flex tube bends at the press of a button to clean under furniture', '1.5L bin, the second largest in this comparison', 'V-shaped anti-tangle roller with a GreenEye dust-spotting headlight', 'Removable battery with a live time-remaining display', 'Qualifies the 65kPa figure as turbo mode'], // PONTOS POSITIVOS
                'contras' => ['65kPa is 64% of a perfect vacuum, the largest claim in the search', '4.2 stars across 681 ratings, joint lowest average and a thin sample', 'Quotes coverage as 2,200 sq ft on a UK listing', 'Sixty-minute runtime is the Eco figure, not the turbo one'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'botatio Handheld Vacuum, 35000Pa, 4-in-1, HD Display, 8000mAh',           // NOME (ENCURTADO)
                'price' => '£35.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 408,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71udiyqJLqL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'botatio 4-in-1 handheld car vacuum in orange',                       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GL1GZZCY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Claims 35,000Pa and a motor spinning at 90,000 revolutions per minute, from a £35.99 handheld — against 8,000Pa published by an identically sized rival.', // TEXTO CURTO (CARD)
                'body' => "Two numbers in the first bullet decide where this finishes. Thirty-five thousand pascals of suction, and a brushless motor spinning at up to 90,000 revolutions per minute, in a handheld costing £35.99. Put the first beside the RELIDOL at number eight, which is the same size, the same price and publishes 8,000 Pa, and one of the two is describing a different quantity. Put the second beside the fact that 90,000 rpm is in the territory of flagship engineering in machines costing ten times as much, and the claim does not survive contact with the price tag. The bullet then adds that the vacuum is 80% more powerful than conventional models, without naming a conventional model.

Everything else about it is a reasonable budget car vacuum. Four functions — vacuum, blow, inflate and vacuum-seal — an 8000mAh battery with USB-C and a two hour charge, a snap-open bin you empty without touching the contents, two washable HEPA filters with a metal cover, an LED ring showing charge, and a work light. Four hundred and eight ratings at 4.4 stars is a thin but positive record.

The practical advice is the same as for every handheld here. With no motorised brush it lifts loose hair and misses what is woven in, and the real difference between this and the RELIDOL is not four times the suction, it is a bigger battery and more attachments. Buy it for the 4-in-1 functions and the inflator, which are genuinely useful in a car, rather than for the number on the front.", // TEXTO SEO LONGO
                'pros' => ['Four functions including a genuinely useful inflator for car tyres and beds', '8000mAh battery with USB-C and a two-hour charge', 'Two washable HEPA filters with a metal filter cover', 'Snap-open bin empties without touching the contents', '4.4 stars with an LED charge ring and a work light'], // PONTOS POSITIVOS
                'contras' => ['Claims 35,000Pa against 8,000Pa from an identical-size rival at the same price', 'Claims a motor speed of 90,000 rpm on a £35.99 handheld', 'Says it is 80% more powerful than conventional models, none named', '408 ratings, the thinnest sample in this comparison'], // PONTOS NEGATIVOS
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
        $this->command?->info("PetHairVacuumsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
