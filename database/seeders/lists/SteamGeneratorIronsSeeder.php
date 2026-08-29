<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class SteamGeneratorIronsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE CENTRAIS DE VAPOR DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=steam+generator+iron&rh=p_36%3A8000-  (16 ASINS EM 22 CARDS)
        // CATEGORIA HOME. TICKET ALTO: MEDIANA DE £190, TETO DE £399.99.
        //
        // ─── ACHADO PRINCIPAL: O VAPOR ANUNCIADO NAO CABE NA TOMADA ───
        // 1. A CONTA E DIRETA E QUALQUER UM REFAZ. PARA TRANSFORMAR 1 g DE AGUA DE
        //    TORNEIRA A 20 °C EM VAPOR A 100 °C SAO NECESSARIOS 4,18 J/g/K x 80 K = 334 J
        //    DE CALOR SENSIVEL MAIS 2.260 J DE CALOR LATENTE = 2.594 J, OU ~2,6 kJ POR
        //    GRAMA. ENTAO O ORCAMENTO MAXIMO DE CADA APARELHO, A 100% DE EFICIENCIA:
        //      2.400 W ... 55 g/min
        //      2.600 W ... 60 g/min
        //      3.000 W ... 69 g/min
        //      3.120 W ... 72 g/min
        //    E O QUE OS ANUNCIOS DECLARAM DE VAPOR CONTINUO:
        //      TOWER 3000 W ................. 160 g/min ... 231% DO ORCAMENTO
        //      TEFAL PROEXPRESS 2600 W ...... 135 g/min ... 225%
        //      PHILIPS 6000 2400 W .......... 130 g/min ... 234%
        //      PHILIPS COMPACT 2400 W ....... 120 g/min ... 216%
        //      TEFAL ESPRESS 2400 W ......... 120 g/min ... 216%
        //      MORPHY RICHARDS 2400 W ....... 100 g/min ... 180%
        //      RUSSELL HOBBS 2600 W ......... 110 g/min ... 183%
        //    OS DEZ ESTAO ENTRE 180% E 234%. A REGULARIDADE E A PROVA: O QUE A INDUSTRIA
        //    CHAMA DE "g/min DE VAPOR" E VAZAO DE AGUA PELA BASE, NAO VAPOR SECO. PERTO
        //    DE METADE DO QUE SAI DA CHAPA E GOTA QUENTE, E E POR ISSO QUE A ROUPA SAI
        //    UMIDA. A PROPRIA PHILIPS VENDE A SOLUCAO SEM NOMEAR O PROBLEMA: "TurboPower
        //    engine CUTS DOWN ON THE WET SPOTS on your garments during ironing".
        // 2. O CASO DA TOWER E O MAIS EXTREMO E O MAIS FACIL DE CONFERIR PORQUE ELA POE A
        //    POTENCIA E O NUMERO NA MESMA FRASE: "a 160g/min output & 600g/min steam
        //    boost. Powered by a 3000W motor". 600 g/min EXIGEM 600 x 2.594 J / 60 s =
        //    25.940 W. O APARELHO PUXA 3.000 W. SAO 865% DA ENERGIA ELETRICA DISPONIVEL —
        //    MAIOR QUE OS 326% DA LAVADORA DE PRESSAO, QUE ERA O NOSSO RECORDE.
        //
        // ─── ACHADO SECUNDARIO: DUAS UNIDADES INCOMPATIVEIS NA MESMA PRATELEIRA ───
        // 3. O "steam boost" E PUBLICADO EM DUAS GRANDEZAS QUE NAO SE COMPARAM:
        //      EM GRAMA POR MINUTO (TAXA):  TEFAL PROEXPRESS 560 g/min · TEFAL EXPRESS
        //        VISION 500 g/min · TEFAL POWER PRO 360 g/min · TEFAL ESPRESS 280 g/min ·
        //        TOWER 600 g/min
        //      EM GRAMA (MASSA):  PHILIPS 8000 750 g · PHILIPS 7000 650 g · PHILIPS 6000
        //        600 g · PHILIPS COMPACT 400 g · MORPHY RICHARDS 310 g
        //    A TEFAL MEDE UMA VAZAO E A PHILIPS MEDE UMA QUANTIDADE. NA GONDOLA OS "750 g"
        //    DA PHILIPS E OS "560 g/min" DA TEFAL PARECEM O MESMO TIPO DE NUMERO E NAO SAO.
        // 4. A IRONIA E QUE A UNIDADE HONESTA PRODUZ O NUMERO MAIS ABSURDO. OS 560 g/min DA
        //    TEFAL PROEXPRESS EXIGEM 24.211 W NUM APARELHO DE 2.600 W (931%) — E VERIFICAVEL
        //    JUSTAMENTE PORQUE ELA DIZ "POR MINUTO". OS "750 g" DA PHILIPS NAO SAO
        //    VERIFICAVEIS PORQUE NAO TEM BASE DE TEMPO: SE FOR RAJADA UNICA, SAO 750 x
        //    2.594 J = 1.946 kJ, QUE A 3.120 W LEVAM 624 SEGUNDOS — 10,4 MINUTOS DE TOMADA
        //    INTEIRA PARA UM "BOOST". A UNIDADE VAGA ESCAPA DA CONFERENCIA.
        // 5. AS DUAS MAIS CARAS DA LISTA — PHILIPS 7000 (£299.99) E 8000 (£399.99) — NAO
        //    PUBLICAM VAPOR CONTINUO EM LUGAR NENHUM. SO O BOOST. O NUMERO QUE DESCREVE
        //    PASSAR ROUPA NORMALMENTE SOME EXATAMENTE NO TOPO DA FAIXA DE PRECO.
        //
        // ─── OUTROS ACHADOS ───
        // 6. A MORPHY RICHARDS SE CONTRADIZ TRES VEZES NA MESMA PAGINA:
        //      PRESSAO ... TITULO E BULLET DIZEM "6 Bar"; A TABELA DIZ "6.5 Bars"
        //      VAPOR ..... TITULO DIZ "200g Steam Output"; A TABELA DIZ "100g/min"
        //      TANQUE .... TITULO DIZ "1.3L Water Tank"; O BULLET 4 DIZ "1.8L Capacity"
        //    SAO 38% DE DIFERENCA NO TANQUE E 100% NO VAPOR, NUM PRODUTO DE £213.
        // 7. A RUSSELL HOBBS SE CONTRADIZ DENTRO DE UM UNICO BULLET: O TITULO DELE DIZ
        //    "Powerful 100g Steam Output" E O CORPO, NA LINHA SEGUINTE, DIZ "With a strong
        //    110g steam output". O TITULO DO ANUNCIO AINDA TRAZ "100g and min Continuous
        //    Steam", QUE E UM "/" PERDIDO NA DIGITACAO.
        // 8. O TEMPO DE TANQUE DESMENTE O VAPOR CONTINUO NA MESMA FICHA. A PHILIPS
        //    COMPACT PROMETE 1,5L PARA "up to 1.5 hours", OU SEJA 16,7 ml/min DE CONSUMO
        //    MEDIO, ENQUANTO ANUNCIA 120 g/min DE VAPOR CONTINUO. A 6000 PROMETE 1,8L PARA
        //    "up to 2 hours" = 15 ml/min CONTRA 130 g/min ANUNCIADOS. SAO 7 A 8 VEZES DE
        //    DIFERENCA ENTRE OS DOIS NUMEROS DA MESMA PAGINA. O DE AUTONOMIA E O REAL: A
        //    TAXA DE VAPOR SO VALE COM O GATILHO PRESSIONADO, O QUE E ~13% DO TEMPO.
        // 9. A ESCADA DE BAR E DEGRAU COMERCIAL, NAO TECNICO. A PHILIPS 6000 TIRA 8 BAR DE
        //    2.400 W E A 7000 TIRA 8,5 BAR DE 3.120 W — 30% MAIS POTENCIA PARA MEIO BAR. A
        //    8000 COBRA £100 A MAIS QUE A 7000 PELA MESMA POTENCIA DE 3.120 W, MEIO BAR E
        //    100 g DE BOOST. A FAIXA COMPLETA COLETADA: RUSSELL HOBBS 4,5 · TEFAL ESPRESS
        //    5,2 · MORPHY RICHARDS 6/6,5 · TEFAL EXPRESS VISION 7 · TEFAL PROEXPRESS 7,5 ·
        //    TOWER E PHILIPS 6000 8 · PHILIPS 7000 8,5 · PHILIPS 8000 9. A PHILIPS COMPACT,
        //    A MAIS AVALIADA DA CATEGORIA, NAO PUBLICA BAR NENHUM.
        // 10. A PHILIPS 7000 E A 8000 DECLARAM 3.120 W. UMA TOMADA BRITANICA DE 13 A A
        //    240 V ENTREGA EXATAMENTE 3.120 W. AS DUAS ESTAO ESPECIFICADAS NO LIMITE
        //    ABSOLUTO DO FUSIVEL, O QUE E LEGITIMO MAS SIGNIFICA QUE NAO DIVIDEM CIRCUITO
        //    COM NADA.
        // 11. POOL DE AVALIACAO COMPARTILHADO: A TEFAL PROEXPRESS PROTECT APARECE COMO
        //    B0BLP9X6L5 (£199.99) E B08XXYC9L8 (£229.00) COM AS MESMAS 1,3 MIL AVALIACOES,
        //    £29 DE DIFERENCA.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: O ASIN IRMAO DA TEFAL PROEXPRESS (MANTIDO O MAIS BARATO); A PHILIPS AZUR
        // 8000 (B0B7XC4NKZ), QUE E FERRO A VAPOR COMUM E NAO CENTRAL, POLUINDO A BUSCA;
        // LAKELAND (57 AVALIACOES), POLTI (23) E TEFAL POWER PRO COMPACT (8), POR AMOSTRA
        // FINA — A TEFAL POWER PRO ENTRA NO TEXTO SO PELOS "360g/min".
        // PHILIPS APARECE QUATRO VEZES E TEFAL TRES PORQUE AS DUAS OCUPAM A CATEGORIA
        // INTEIRA, E PORQUE A ESCADA 6000/7000/8000 DA PHILIPS E METADE DA MATERIA.
        // DENTRO: NOTA DE 4.0 A 4.6, PRECO DE £99.99 A £399.99, CINCO MARCAS.
        //
        // FOCUS KEYWORD: best steam generator iron
        // VARIACOES TRABALHADAS: steam generator iron uk / steam station /
        // best steam iron / steam generator with high pressure / 8 bar steam generator /
        // continuous steam output / steam generator iron large tank /
        // steam generator vs steam iron / g per minute steam / steam boost
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "home", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-steam-generator-iron',                                   // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Steam Generator Iron 2026: 10 Ranked on the Energy Budget', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Steam Generator Iron 2026: Top 10 Compared',        // TITLE DA ABA/GOOGLE (48 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best steam generator iron options on Amazon by checking the steam claims against the wattage, comparing 4.5 to 9 bar from £99.99 to £399.99.', // META DESCRIPTION (156 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best steam generator iron',                          // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Boiling water is one of the few kitchen and laundry claims you can check with a calculator. Turning one gram of 20°C tap water into steam at 100°C takes about 2.6 kilojoules — 334 joules to heat it and 2,260 to evaporate it — so a 2,400 watt appliance has the energy to make roughly 55 grams of steam a minute, and a 3,000 watt one about 69. Now read the listings. Philips quotes 120 and 130 grams a minute from 2,400 watt machines. Tefal quotes 135 from 2,600. Tower quotes 160 from 3,000, and in the same sentence a 600 grams per minute boost, which would need 25,940 watts from a plug that supplies 3,000 — 865% of the electricity going in. The numbers are not lies so much as mislabelled: what the industry calls grams of steam is water pushed through the soleplate, and a good half of it lands on your shirt as hot droplets rather than vapour. Philips even sells the cure without naming the disease, promising an engine that cuts down on the wet spots. Below we rank the best steam generator iron options on Amazon in August 2026 on what their own figures survive.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Choosing the best steam generator iron is mostly a matter of knowing which published number to trust. Bar pressure is real and it is the one worth paying for: it is what pushes steam through a folded seam rather than sitting on top of it, and the ladder here runs honestly from 4.5 bar at £99.99 to 9 bar at £399.99. Continuous steam in grams per minute is comparable between machines even though it overstates actual vapour by roughly double across the board, so use it to rank rather than to predict. The boost figure is the one to ignore entirely, because two brands measure it in incompatible units on the same shelf — Tefal in grams per minute and Philips in plain grams — and a mass with no time attached to it cannot be compared with anything. Crucially, check the tank runtime against the steam rate on the same listing, because it is the honest half of the pair: Philips promises 1.8 litres will last two hours, which is 15 millilitres a minute, on a machine advertising 130 grams a minute of steam. Both are true. One describes the trigger held down and the other describes ironing.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                           // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 09:00:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Tefal ProExpress Protect Steam Generator Iron, 7.5 Bar, 2600W, 1.8L',     // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£199.99',                                                               // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 1385,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71vybQdn6uL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best steam generator iron',                                          // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BLP9X6L5?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best steam generator iron here because it publishes everything in one unit: 7.5 bar, 135g/min continuous, 560g/min boost, 2600W and a 1.8L tank, all on one page.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Four point five stars across 1,385 ratings is the best combination of rating and sample depth in this comparison, and the listing behind it is the most complete. Pressure is 7.5 bar. Continuous steam is 135 grams a minute. The boost is 560 grams a minute. The motor is 2,600 watts and the removable tank holds 1.8 litres. Every figure a buyer would want to compare is there, in the same unit, on the same page — which sounds like a low bar until you find that the most-reviewed machine in this category publishes no pressure figure at all and the two most expensive publish no continuous steam rate.

Seven and a half bar is genuinely useful. Pressure is what drives steam into a folded cotton seam instead of leaving it sitting on the surface, and it is the specification that separates a steam station from a plug-in iron. There is a smart thermostat that removes the fabric dial, an AutoClean soleplate, a removable calc collector, and Tefal commits to spare parts for fifteen years with 6,200 approved repairers — the only repairability promise anyone here makes.

The consistency also exposes it, which is only fair. Five hundred and sixty grams a minute needs 24,211 watts to produce as vapour; the machine draws 2,600, so the figure is 931% of the electricity going in and describes water throughput rather than steam. That number is checkable precisely because Tefal says per minute. Philips writes 750 grams with no time attached and escapes the same arithmetic. Note also that the identical machine sells under a second ASIN at £229.00 with the same 1.3 thousand ratings.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Publishes bar, continuous steam, boost, wattage and tank in one place', '7.5 bar with 135g/min continuous, the second highest continuous rate here', 'Both steam figures given in the same unit, so they can be compared', '1.8L removable tank, joint largest in this comparison', '15-year spare parts commitment, the only repairability promise on this page'], // PONTOS POSITIVOS
                'contras' => ['560g/min boost would need 24,211W from a 2,600W machine', 'Sold under a second ASIN at £229.00 with the same review pool', '1,385 ratings is less than a third of the deepest sample here', 'Boost figure describes water throughput, not vapour'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Philips PerfectCare Compact Steam Generator Iron, 2400W, 400g Boost',     // NOME (ENCURTADO)
                'price' => '£186.00',                                                               // PRECO
                'rating' => 4.1,                                                                    // NOTA
                'reviews_count' => 4318,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71+5W1vLRYL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Philips PerfectCare Compact steam generator iron in burgundy and white', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B088R9JXR8?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The deepest sample in the category by a factor of two, and the machine whose own tank runtime quietly contradicts its own steam rate by a factor of seven.', // TEXTO CURTO (CARD)
                'body' => "Four thousand three hundred and eighteen ratings is more than double the next deepest sample here, so whatever this machine does, it does it at scale. OptimalTemp is the reason people buy it: there is no fabric dial, the iron holds one temperature that Philips guarantees will not scorch silk or linen, and for anyone who has ever melted a shirt collar that is worth real money. Continuous steam is 120 grams a minute, the boost is 400 grams, the tank is 1.5 litres, and the base is small enough to sit on an ironing board rather than beside it.

There is a useful piece of arithmetic buried in this listing. Philips says the 1.5 litre tank gives up to 1.5 hours of continuous ironing. That is 16.7 millilitres a minute. It also says the machine produces 120 grams a minute of steam. Both figures are on the same page and they are seven times apart, because the steam rate applies only while the trigger is held and the runtime figure describes actual ironing — you press the button perhaps one minute in seven. It is the runtime number that tells you how often you will be refilling.

Two things hold it at second. Four point one stars is the joint lowest average in this comparison, and on a sample this large that is a settled verdict rather than noise; the complaints in a category like this are usually leaks and spitting, which is what a 2,400 watt boiler pushing 120 grams a minute of half-condensed water will do. And Philips publishes no bar pressure at all for this model, on a page where every rival from £99.99 upwards does.", // TEXTO SEO LONGO
                'pros' => ['4,318 ratings, more than double the next deepest sample in this comparison', 'OptimalTemp removes the fabric dial with a no-scorch guarantee', 'Publishes continuous steam and boost separately with distinct units', '1.5L tank quoted at up to 1.5 hours, the longest runtime here', 'Compact base fits on the ironing board rather than beside it'], // PONTOS POSITIVOS
                'contras' => ['4.1 stars is the joint lowest average in this comparison', 'No bar pressure published anywhere, unlike every rival above £99.99', 'Tank runtime implies 16.7ml a minute against an advertised 120g/min', '120g/min at 2,400W is 216% of the energy available to make steam'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Morphy Richards Power Steam Elite Plus, 2400W, Ceramic Soleplate',        // NOME (ENCURTADO)
                'price' => '£213.00',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 2002,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71cl9vx8JLL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Morphy Richards Power Steam Elite Plus steam generator iron in black and red', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01N1M0FBB?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Strong evidence at 2,002 ratings and 4.4 stars, attached to a listing that contradicts itself three separate times: on pressure, on steam output and on tank size.', // TEXTO CURTO (CARD)
                'body' => "Two thousand and two ratings at 4.4 stars is the second best evidence in this comparison, and the hardware is well specified: a ceramic non-stick soleplate, AutoClean that Morphy Richards says removes the need for filter cartridges entirely, a detachable tank with a dry-tank alert, vertical steaming for hanging curtains, a two-metre cord and a ten-minute auto shut-off. Warm-up is two to three minutes. As a machine it is a sensible mid-range buy.

As a document it falls apart three times over. On pressure, the title and the second bullet both say 6 bar while the specification table says 6.5 bars. On steam, the title says 200g steam output while the specification table says 100g/min steam rate — a factor of two. On the tank, the title says 1.3L water tank and the fourth bullet says 1.8L capacity, a 38% difference on the number that decides how often you stop to refill. Three fields, three answers, one page, £213.

Which one to believe? The 100 grams a minute is the more plausible of the two steam figures, because 200 g/min from a 2,400 watt element would be 360% of the energy available and even by this category's standards that is a stretch. The 6.5 bar in the specification table is probably right for the same reason specification tables usually are: they are populated from the engineering sheet while titles are written by marketing. On the tank, the safest assumption is the smaller one. None of that should be the buyer's job.", // TEXTO SEO LONGO
                'pros' => ['2,002 ratings at 4.4 stars, the second deepest sample here', 'AutoClean removes the need for filter cartridges entirely', 'Ceramic non-stick soleplate with vertical steaming', 'Detachable tank with a dry-tank alert and 10-minute auto shut-off', 'Two to three minute warm-up'], // PONTOS POSITIVOS
                'contras' => ['Title says 6 bar, specification table says 6.5 bars', 'Title says 200g steam output, specification table says 100g/min', 'Title says a 1.3L tank, bullet four says 1.8L capacity', '£213 for a 2,400W machine with a lower rating than cheaper rivals'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Tefal Express Vision Steam Generator Iron, 7 Bar, 1.8L, Tip Light',       // NOME (ENCURTADO)
                'price' => '£149.99',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 266,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51LY3484SfL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tefal Express Vision steam generator iron in black and grey',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FJYFPG51?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Seven bar and a 1.8 litre tank for £149.99, plus the only genuinely novel feature in the category: a light in the nose of the iron that shows up hidden creases.', // TEXTO CURTO (CARD)
                'body' => "Fifty pounds less than the Tefal at number one buys you half a bar less pressure, the same 1.8 litre tank, 130 grams a minute of continuous steam against 135, and a 500 grams a minute boost against 560. On any reading that is a small step down for a meaningful saving, and it makes this the value pick of the high-pressure machines here.

The tip light is the reason it is worth singling out. A small LED in the nose of the iron throws light across the fabric directly ahead of the soleplate, and creases that are invisible under a ceiling lamp show up as shadows. It sounds like a gimmick and it is the one feature in this entire comparison that does something no rival does — ironing is done in the evening, in rooms lit from above and behind you, and the shadow you cast on your own work is a real problem. Tefal also carries over the smart thermostat, the anti-scale system with a removable collector, and the 15-year repairability commitment.

Two caveats, both about evidence rather than engineering. Two hundred and sixty-six ratings is a thin sample, so the 4.4 stars are encouraging rather than settled — this is a recent model and there is no long record behind it. And the listing does not publish a wattage anywhere, in the title, the bullets or the specification table, which on a page where the whole question is whether the steam figures fit the power supply is the one omission that matters. Every other machine here states its watts.", // TEXTO SEO LONGO
                'pros' => ['7 bar with a 1.8L tank for £149.99, the value pick at this pressure', 'Tip light reveals creases hidden by overhead lighting, unique here', '130g/min continuous steam, third highest in this comparison', 'Smart thermostat, removable calc collector and 15-year repairability', 'Both steam figures published in the same unit'], // PONTOS POSITIVOS
                'contras' => ['No wattage published anywhere on the listing', '266 ratings is a thin sample for a recent model', '500g/min boost is the same unchecked class of figure as its rivals', 'Half a bar below the ProExpress for a machine in the same family'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Russell Hobbs SteamPower Steam Generator Iron, 2600W, 4.5 Bar, 1.3L',     // NOME (ENCURTADO)
                'price' => '£99.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 1792,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/713ksy6CXuL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Russell Hobbs SteamPower steam generator iron in purple and white',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B079G4MX2J?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only machine here under £100, and the lowest pressure claim in the comparison at 4.5 bar — which on this page counts as restraint rather than weakness.', // TEXTO CURTO (CARD)
                'body' => "Ninety-nine pounds ninety-nine is £34 below anything else in this comparison, and 1,792 ratings at 4.3 stars is the third deepest sample. For that you get 2,600 watts, a 1.3 litre tank, three steam settings, a ceramic soleplate, dual carry handles, auto shut-off, and a 60 second heat-up which is the fastest quoted here. If you iron a couple of shirts twice a week rather than working through a basket every Sunday, this is the right amount of machine.

Four and a half bar is the lowest pressure figure on this page and Russell Hobbs does not dress it up. In a category where the number climbs to 9, that restraint is worth noting: pressure is the specification that actually does the work, and a brand quoting 4.5 is quoting something it can probably deliver. You will feel the difference on heavy cotton and thick seams, where a 7 bar machine pushes steam through and this one works the surface. On shirts, bedding and school uniform it is fine.

The listing has one small mess in it. The first bullet is headed \"Powerful 100g Steam Output\" and its very next sentence says \"With a strong 110g steam output\" — two different figures in two consecutive lines of the same bullet. The product title compounds it with \"100g and min Continuous Steam\", which is a slash lost somewhere between the spreadsheet and the page. Neither is a large error, but on the specification that describes what the appliance produces, getting it right twice in a row should not be difficult.", // TEXTO SEO LONGO
                'pros' => ['£99.99, the only machine here under £100 and £34 below the next', '1,792 ratings at 4.3, the third deepest sample in this comparison', '60 second heat-up, the fastest quoted on this page', 'Publishes 4.5 bar honestly rather than inflating it', 'Dual carry handles, three steam settings and a ceramic soleplate'], // PONTOS POSITIVOS
                'contras' => ['One bullet says 100g in the heading and 110g in the next sentence', 'Title reads 100g and min Continuous Steam, missing a slash', '4.5 bar will struggle on heavy cotton and thick seams', '1.3L tank is the smallest in this comparison'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Tefal Espress Steam Iron Station, 5.2 Bar, 2400W, 1.4L, Xpress Glide',    // NOME (ENCURTADO)
                'price' => '£134.00',                                                               // PRECO
                'rating' => 4.0,                                                                    // NOTA
                'reviews_count' => 1619,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71buMT7uVaL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tefal Espress steam iron station in blue and white',                 // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08H1MQXKH?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A compact station with a base smaller than a sheet of A4, but 4.0 stars across 1,619 ratings is the joint lowest average in this comparison.', // TEXTO CURTO (CARD)
                'body' => "Tefal describes the base as smaller than a sheet of A4 paper, and that is the argument for this machine. A steam generator is a big object that lives on an ironing board or under the stairs, and the difference between one that fits beside the iron and one that needs its own shelf is the difference between using it and not. Everything else is mid-table and honestly stated: 5.2 bar pump pressure, 120 grams a minute continuous, a 280 grams a minute boost, a 1.4 litre tank, 2,400 watts, two minute heat-up and an eco mode.

Like the rest of the Tefal range it puts both steam figures in the same unit, which makes them comparable to each other and to the ProExpress at number one. Against that machine you are giving up 2.3 bar and half the boost for £66, which is a reasonable trade if your ironing is shirts rather than duvet covers.

The rating is why it sits at six rather than four. Four point zero across 1,619 ratings is the joint lowest average in the comparison, and unlike the Philips Compact — which shares that 4.0-to-4.1 band but has two and a half times the sample and a genuine no-scorch guarantee behind it — there is no standout feature here that offsets it. A compact footprint is a real benefit, but 1,619 people arriving at four stars on a £134 appliance is the clearest signal on this page that something about living with it disappoints.", // TEXTO SEO LONGO
                'pros' => ['Base smaller than a sheet of A4, the most compact station here', 'Publishes 5.2 bar, 120g/min continuous and 280g/min boost in one unit', 'Two minute heat-up with an eco mode', 'Calc Clear anti-limescale system and Xpress Glide soleplate', '1,619 ratings, a solid sample'], // PONTOS POSITIVOS
                'contras' => ['4.0 stars, the joint lowest average in this comparison', '5.2 bar is second lowest here, at £34 more than the 4.5 bar machine', '1.4L tank is small for the price band', 'No standout feature to offset the rating, unlike the Philips Compact'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Philips PerfectCare 6000 Series Steam Generator Iron, 8 Bar, 1.8L',       // NOME (ENCURTADO)
                'price' => '£274.99',                                                               // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 337,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71crBVfrHJL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Philips PerfectCare 6000 Series steam generator iron in black',      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09Q5YPDNR?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Eight bar from a 2,400 watt machine, and a two-hour tank runtime that implies 15 millilitres a minute against an advertised 130 grams a minute of steam.', // TEXTO CURTO (CARD)
                'body' => "This is the most interesting listing in the comparison for anyone who likes checking numbers against each other. Philips publishes four figures here: 8 bar of pressure, 130 grams a minute of continuous steam, a 600 gram boost, and a 1.8 litre tank giving up to 2 hours of continuous ironing. Take the last two together and the machine consumes 15 millilitres a minute in normal use. Take the third and it produces 130 grams a minute. Those are eight and a half times apart, and both are correct: the steam rate is what leaves the soleplate with the trigger held, and the runtime is what happens when you iron, which involves rather more moving the shirt around than pressing the button.

The eight bar is the headline and it is a genuine step up from the mid-range — enough pressure to drive steam through a folded cotton seam. It also arrives from a 2,400 watt element, which is worth knowing, because the 7000 Series above it draws 3,120 watts and manages 8.5. Pressure comes from the pump rather than the heater, so more watts do not automatically buy more bar, and the Philips ladder is priced as though they do.

At £274.99 with 337 ratings, though, it is hard to argue for over the £199.99 Tefal that has four times the sample, 7.5 bar and a larger published feature set. What you are paying for is OptimalTemp — the no-dial, no-scorch guarantee — and a 1.8 litre tank quoted at two hours, which is the longest runtime in the comparison. If never having to think about fabric settings again is worth £75 to you, that is the case.", // TEXTO SEO LONGO
                'pros' => ['8 bar from a 2,400W element, high pressure without the top-tier draw', '1.8L tank quoted at up to 2 hours, the longest runtime here', 'OptimalTemp no-scorch guarantee with no fabric dial', 'Publishes pressure, continuous steam, boost and runtime together', '130g/min continuous, joint third highest in this comparison'], // PONTOS POSITIVOS
                'contras' => ['£274.99 for 337 ratings, against £199.99 for 1,385 at number one', 'Runtime implies 15ml a minute against an advertised 130g/min', '4.3 stars is mid-table on a premium-priced machine', 'Boost quoted as 600 grams with no time base, so it cannot be compared'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Philips PerfectCare 7000 Series Steam Generator Iron, 8.5 Bar, 3120W',    // NOME (ENCURTADO)
                'price' => '£299.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 449,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71v9Aq-VdkL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Philips PerfectCare 7000 Series steam generator iron in deep black', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DTZ1C4WT?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A motion sensor that releases steam only while the iron is moving is a real idea, but this is the cheaper of the two machines here that publish no continuous steam rate at all.', // TEXTO CURTO (CARD)
                'body' => "The AI motion sensor is the genuine innovation in this comparison. The iron detects when it is being moved across fabric and releases steam automatically, and stops when you stop — which means no trigger to hold, no steam pooling under a stationary soleplate, and less water going into the shirt in the place you have paused. Given that everything in this article is about how much of the advertised steam arrives as hot water, an automatic system that only steams while you are moving is addressing the actual problem rather than the number on the box.

It draws 3,120 watts, which is exactly what a 13 amp plug delivers at 240 volts, so this is a machine specified to the absolute limit of a domestic socket and should not share a circuit with a kettle. Pressure is 8.5 bar, the tank is 1.5 litres quoted at an hour, and there is the Easy De-Calc collector with light and audio prompts. Four point five stars across 449 ratings is good.

What it does not publish is the continuous steam rate. Not in the title, not in the bullets, not in the specification. Only a 650 gram boost, a mass with no time attached, which cannot be compared with the 135 grams a minute on the Tefal or the 160 on the Tower. The 6000 Series below it, from the same brand and £25 cheaper, publishes 130 grams a minute quite happily. Losing the comparable figure precisely as you climb into the top of the range is a pattern, and the 8000 Series repeats it.", // TEXTO SEO LONGO
                'pros' => ['AI motion sensor steams only while the iron is moving, unique here', '8.5 bar, the second highest pressure in this comparison', '3,120W, the joint most powerful machine on this page', 'Easy De-Calc collector with light and audio prompts', '4.5 stars across 449 ratings'], // PONTOS POSITIVOS
                'contras' => ['No continuous steam rate published anywhere on the listing', '650g boost has no time base, so it compares with nothing', '£299.99 and £25 more than the 6000, which does publish the figure', 'At 3,120W it uses the full capacity of a 13 amp socket'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Tower T22030GLD Steam Generator Iron, 3000W, 8 Bar, Dual Tank',           // NOME (ENCURTADO)
                'price' => '£179.00',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 115,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81vRuGvU7iL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Tower steam generator iron in black and gold with dual water tank',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F4RSFT8T?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The dirty-water tank is a genuinely good idea, and the same bullet claims a 600g/min boost from a 3000W motor — 865% of the electricity going in.', // TEXTO CURTO (CARD)
                'body' => "The dual tank is a real piece of design. One litre of clean water goes in, and a separate 500ml reservoir collects the limescale-laden water the system flushes out, so the scale ends up somewhere you empty rather than somewhere that clogs. Every other machine here handles limescale with a collector cartridge or a self-clean cycle; a physical dirty-water tank you can see filling is more honest and easier to maintain. Eight bar and 3,000 watts are strong figures for £179.00, and the One Temp system removes the fabric dial.

The first bullet is also the most checkable claim we found in any category this year, because Tower puts the power and the output in the same sentence: a 160g/min output and 600g/min steam boost, powered by a 3000W motor. Six hundred grams of water a minute turned into steam needs 600 times 2,594 joules, delivered in sixty seconds — 25,940 watts. The machine draws 3,000. That is 865% of the electricity going in, and it beats the 326% we found on a pressure washer earlier this year. The 160 grams a minute continuous is 231% by the same arithmetic, which is roughly where the whole category sits.

Beyond the numbers, two reservations. One hundred and fifteen ratings is the second thinnest sample in this comparison, so the 4.4 stars are provisional. And the AI limescale system that flushes automatically is a good idea attached to a claim — that pollutants are \"instantly removed\" — with nothing behind it. The dual tank stands on its own; it did not need the language.", // TEXTO SEO LONGO
                'pros' => ['Separate 500ml dirty-water tank collects flushed limescale visibly', '8 bar and 3,000W for £179.00, strong specification for the price', 'One Temp system removes the fabric dial', '1.5L total dual-tank capacity with a detachable clean side', 'Three-year guarantee with registration'], // PONTOS POSITIVOS
                'contras' => ['600g/min boost from a 3,000W motor is 865% of the electricity supplied', '160g/min continuous is 231% of the same budget, the highest claim here', '115 ratings, the second thinnest sample in this comparison', 'One litre of usable clean water despite a 1.5L headline'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Philips PerfectCare 8000 Series Steam Generator Iron, 9 Bar, 3120W',      // NOME (ENCURTADO)
                'price' => '£399.99',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 47,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71EFIYpXESL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Philips PerfectCare 8000 Series steam generator iron in grey',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FK5S8CRW?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest pressure and the highest price here, with 47 ratings behind it and a 750 gram boost that would take ten minutes of the entire plug to produce.', // TEXTO CURTO (CARD)
                'body' => "Nine bar is the highest pressure figure in this comparison and it comes with the same 3,120 watt motor, AI motion sensor, OptimalTemp guarantee and Easy De-Calc system as the 7000 Series. The build is the best here, the foldable handle with a secure lock makes it the easiest to store, and 4.6 stars is the highest average on this page. If money is not the constraint, this is the most capable machine in the comparison.

The problem is what £399.99 buys against the £299.99 model directly beneath it. Both draw 3,120 watts. Both have the motion sensor, both have OptimalTemp, both have Easy De-Calc. The differences are half a bar of pressure, a hundred grams of boost, and a tank that is 100ml smaller — the 8000 holds 1.4 litres against the 7000's 1.5, both quoted at an hour. One hundred pounds for half a bar and a smaller tank is a difficult sentence to write.

Then there is the boost. Seven hundred and fifty grams, with no time base given, which makes it the largest and least checkable number in the category. Read as a single burst it needs 750 times 2,594 joules, or 1,946 kilojoules, which at 3,120 watts takes 624 seconds — ten and a half minutes of the entire socket's output, which is not a boost. Read as a rate it would need 32 kilowatts. Neither reading works, and because Philips does not say which it means, neither can be disproved. Forty-seven ratings is also the thinnest sample here by a wide margin, so the 4.6 stars rest on very few people.", // TEXTO SEO LONGO
                'pros' => ['9 bar, the highest pressure in this comparison', '4.6 stars, the highest average on this page', 'AI motion sensor, OptimalTemp and Easy De-Calc all included', 'Foldable handle with a secure lock, the easiest here to store', 'Best build quality in the comparison'], // PONTOS POSITIVOS
                'contras' => ['£399.99 buys half a bar and a smaller tank over the £299.99 model', '750g boost has no time base and works out at 10.4 minutes of full power', '47 ratings, by far the thinnest sample in this comparison', 'No continuous steam rate published, like the 7000 Series'], // PONTOS NEGATIVOS
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
        $this->command?->info("SteamGeneratorIronsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
