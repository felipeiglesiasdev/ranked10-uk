<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class StandMixersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE BATEDEIRAS PLANETARIAS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=stand+mixer&rh=p_36%3A6000-  (21 ASINS ANALISADOS)
        // CATEGORIA KITCHEN — COMISSAO DE 5%. SAZONAL: PICO DE OUTUBRO A DEZEMBRO
        // (TEMPORADA DE ASSAR NO REINO UNIDO + PRESENTE DE NATAL DE TICKET ALTO).
        //
        // PROFUNDIDADE: 3.930 / 3.164 / 1.107 / 882 / 851 / 499 / 426 / 149 / 141 / 105.
        //
        // ─── ACHADO PRINCIPAL: O WATT NAO AMASSA PAO; O PESO AMASSA ───
        // 1. TODAS ANUNCIAM WATT. WATT E O QUE ENTRA NA TOMADA, NAO O QUE CHEGA NO GANCHO.
        //    O QUE AMASSA MASSA DURA E **TORQUE**, E TORQUE VEM DE REDUCAO — ENGRENAGEM
        //    PESADA, EIXO GROSSO, CARCACA FUNDIDA. POR ISSO O PESO DA MAQUINA E O MELHOR
        //    INDICADOR DISPONIVEL, E ELE ESTA PUBLICADO EM TODAS AS FICHAS:
        //      KENWOOD kMIX ...... £199.00  1000 W  **10,9 kg**  = 92 W/kg   3.164 AVAL.
        //      KITCHENAID ARTISAN  £366.99  **300 W**  **10,4 kg** = **29 W/kg**   882
        //      KENWOOD KVL4100W .. £259.90  1200 W   7,66 kg  = 157 W/kg     499
        //      BOSCH SERIE 2 ..... £200.00   900 W    6,9 kg  = 130 W/kg     149
        //      KENWOOD KHC30 ..... £99.99   SEM W     6,36 kg = —          1.107
        //      VOSPEED 9-IN-1 .... £83.99  **1500 W**  5,16 kg = **291 W/kg**   105
        //      SALTER MARINO ..... £74.99   1200 W    5,15 kg = 233 W/kg     426
        //      AUCMA ............. £89.99   1400 W    **4,7 kg** = **298 W/kg** 3.930
        //      VOSPEED 1000W ..... £79.99   1000 W    4,68 kg = 214 W/kg     851
        // 2. A LEITURA: A KITCHENAID PUXA **300 W** E PESA **10,4 kg**. A AUCMA PUXA
        //    **1.400 W** E PESA **4,7 kg**. A MAQUINA MAIS CARA DA LISTA TEM UM QUINTO DA
        //    POTENCIA DECLARADA E MAIS QUE O DOBRO DA MASSA. NAO E CONTRADICAO — E A
        //    DIFERENCA ENTRE MOTOR LENTO DE ALTO TORQUE COM CAIXA DE ENGRENAGEM FUNDIDA E
        //    MOTOR UNIVERSAL DE ALTA ROTACAO REDUZIDO POR POUCO. O WATT QUE SOBRA VIRA
        //    CALOR E RUIDO.
        // 3. A CORRELACAO FECHA NA PIOR NOTA DA LISTA: A VOSPEED 9-IN-1 TEM O **MAIOR WATT
        //    (1500)** E A **MENOR NOTA (3.9)**. AS DUAS MAIS PESADAS (kMIX 10,9 kg E
        //    KITCHENAID 10,4 kg) TEM 4.5 E 4.6.
        //
        // ─── ACHADO 2: SO A BOSCH PUBLICA O QUE A MAQUINA PROCESSA ───
        // 4. LITRO DE TIGELA NAO MEDE CAPACIDADE DE MASSA — MASSA E DENSA E O LIMITE E
        //    TORQUE, NAO VOLUME. A BOSCH E A UNICA MARCA DAS DEZ QUE PUBLICA UMA
        //    ESPECIFICACAO DE **SAIDA**, NOS DOIS MODELOS: "up to **2.4 kg of cake mixture**
        //    and **1.7 kg of yeast dough**". E O NUMERO QUE O COMPRADOR PRECISA, E NENHUMA
        //    DAS OUTRAS OITO O DA. A CREATIONLINE AINDA PREENCHE O CAMPO "Capacity" COM
        //    "**2.4 Kilograms**" EM VEZ DE LITROS — TECNICAMENTE MAIS UTIL QUE TODOS OS
        //    LITROS DA PAGINA, E INCONSISTENTE COM ELES.
        //
        // ─── ACHADO 3: A BOSCH SERIE 2 DECLARA DUAS POTENCIAS NA MESMA FRASE ───
        // 5. "COMPACT **700W** STAND MIXER: The Bosch Serie 2 kitchen machine features a
        //    powerful **900W** motor". SETECENTOS E NOVECENTOS NA MESMA LINHA. A TABELA
        //    CONFIRMA 900 W. E A UNICA DA LISTA FABRICADA NA EUROPA (**ESLOVENIA**).
        //
        // ─── ACHADO 4: RUIDO VENDIDO COMO SILENCIO ───
        // 6. VOSPEED 1000W: "Low Noise... The sound is less than **76 decibel** under any
        //    speed, your old grandma won't even notice when kitchen mixer is working".
        //    AUCMA: "Low noise level **≤75dB**". SETENTA E CINCO A SETENTA E SEIS DECIBEIS
        //    E MAIS ALTO QUE UM ASPIRADOR DOMESTICO (~70 dB) E PROXIMO DE RUA MOVIMENTADA.
        //    AS DUAS PUBLICAM O NUMERO QUE DESMENTE O ADJETIVO — O QUE E, PERVERSAMENTE,
        //    MAIS HONESTO QUE AS SEIS QUE NAO PUBLICAM dB NENHUM.
        //
        // ─── ACHADO 5: A AUCMA PUBLICA A CAIXA DE ENGRENAGEM, E ISSO E RARO ───
        // 7. A AUCMA (3.930 AVALIACOES, A MAIS PROFUNDA DA BUSCA) DECLARA NO CAMPO DE
        //    RECURSOS: "**Full metal gears + ball bearing + belt structure**". E A UNICA
        //    MAQUINA ABAIXO DE £100 QUE DIZ DO QUE E FEITA A TRANSMISSAO. ENGRENAGEM DE
        //    METAL CONTRA ENGRENAGEM DE NYLON E EXATAMENTE A DIFERENCA QUE DECIDE SE A
        //    MAQUINA SOBREVIVE A MASSA DE PAO — E NENHUMA DAS OUTRAS SETE BARATAS MENCIONA.
        //
        // ─── ACHADO 6: TENSAO OUTRA VEZ, NA MESMA LOJA ───
        // 8. 240 V: KITCHENAID, VOSPEED 1000W, BOSCH SERIE 2, BOSCH CREATIONLINE.
        //    220 V: KENWOOD KVL4100W, SALTER MARINO, VOSPEED 9-IN-1.
        //    SEM TENSAO: AUCMA, KENWOOD kMIX, KENWOOD KHC30.
        //    A REDE BRITANICA E 230 V NOMINAL. A KENWOOD PUBLICA 220 V NUM MODELO E NADA
        //    EM DOIS OUTROS. (MESMO PADRAO QUE ACHAMOS NAS TOMADAS INTELIGENTES.)
        //
        // ─── ACHADO 7: CAMPO DE FICHA COM LIXO ───
        // 9. VOSPEED 1000W: "Model Name: **e**" — UMA LETRA NO CAMPO DE NOME DO MODELO. E O
        //    TITULO DIZ "4.5L+5L Bowls" ENQUANTO A TABELA DIZ "Capacity: **4.73 litres**" —
        //    NEM 4,5 NEM 5.
        // 10. KENWOOD KVL4100W: "Product Warranty **1.**" — UM PONTO FINAL, SEM UNIDADE.
        // 11. KITCHENAID: "Number of Items **5**" NUMA CAIXA COM UMA BATEDEIRA (E QUATRO
        //    ACESSORIOS). E "Country of Origin: **China**" — CORRETO PARA O MERCADO EUROPEU,
        //    MAS VALE DIZER, PORQUE MUITO COMPRADOR ASSUME OHIO.
        // 12. KENWOOD KHC30 (£99.99, 1.107 AVALIACOES): NAO PUBLICA **POTENCIA NEM CAPACIDADE
        //    DE TIGELA** EM LUGAR NENHUM. E O CAMPO "Manufacturer" DIZ **De'Longhi**, QUE E
        //    DONA DA KENWOOD — CORRETO, MAS E A UNICA FICHA QUE ENTREGA ISSO.
        //
        // ─── ASIN DUPLICADO ───
        // VOSPEED 1000W: B0963MKTG5 E B0DPPYD6GR — MESMO TITULO, MESMO PRECO £79.99, AS
        // MESMAS 851 AVALIACOES E A MESMA NOTA 4.4. MANTIDO UM.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: O ASIN DUPLICADO DA VOSPEED; SALTER RETRO (24) E ALCHEMY (41), DMD (47),
        // KITCHEN IN THE BOX (71 CADA) POR AMOSTRA FINA; ONILAB (AGITADOR DE LABORATORIO,
        // £519, FORA DA CATEGORIA). DENTRO: 105 A 3.930 AVALIACOES, NOTA 3.9 A 4.6,
        // £74.99 A £366.99, SEIS MARCAS.
        //
        // FOCUS KEYWORD: best stand mixer
        // VARIACOES TRABALHADAS: food mixer / kitchen mixer / cake mixer / planetary mixer /
        // stand mixer for bread dough / electric mixer with bowl / baking mixer /
        // dough mixer / tilt head stand mixer
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "kitchen", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-stand-mixer',                                        // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Stand Mixer 2026: 10 Ranked, and Why 300 Watts Beats 1,500', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Stand Mixer 2026: Top 10 Ranked and Compared',  // TITLE DA ABA/GOOGLE (50 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best stand mixer options on Amazon by the specification that predicts kneading power, and it is not wattage, from £74.99 to £366.99.', // META DESCRIPTION (146 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best stand mixer',                               // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "The most expensive stand mixer on this page draws 300 watts. The cheapest one that outguns it on paper draws 1,400. KitchenAid's Artisan is listed at 300 watts and 10.4 kilograms; the £89.99 Aucma is listed at 1,400 watts and 4.7 kilograms. That is a fifth of the power in more than twice the mass, and it is the whole story of this category. Watts measure what goes into the plug, not what arrives at the dough hook. Stiff bread dough is defeated by torque, and torque comes from reduction — heavy gearing, a thick shaft, a cast housing — which is exactly what makes a mixer weigh 10 kilograms instead of 5. A high-revving universal motor can advertise 1,500 watts and turn most of them into heat and noise. Run the ratio across all ten and it sorts the page perfectly: the two heaviest machines here, Kenwood's kMix at 10.9 kilograms and the KitchenAid at 10.4, use 92 and 29 watts per kilogram and score 4.5 and 4.6 stars. The mixer advertising the highest wattage on the page, 1,500 in a 5.16 kilogram body, has the lowest rating at 3.9. We ranked ten of the best stand mixer options on Amazon in August 2026 on mass, gearing and the one output figure only Bosch bothers to publish.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO NA ABERTURA
            'conclusion' => "The best stand mixer for you depends on whether you make bread. If you bake cakes, whip cream and mix batter, almost anything here will do it and you should buy on bowl size and price, because those jobs need speed rather than force. If you knead dough, the calculation changes completely and the number to use is weight. A mixer that weighs ten kilograms is carrying a cast metal gearbox; one that weighs under five is carrying a fast motor and a plastic housing, and the wattage on the box tells you which by inverting: the light machines advertise the big numbers precisely because input power is all they have to sell. Crucially, look for an output figure rather than an input one — Bosch is the only brand on this page that states what its machines actually process, at 2.4 kilograms of cake mixture or 1.7 kilograms of yeast dough, and a bowl measured in litres tells you nothing about that because dough is dense and the limit is the gearbox, not the volume. So check the weight, check whether anyone will tell you what the gears are made of, and treat decibel claims sceptically when the number published beside the word \"quiet\" is 76. In practice, a heavy 1,000 watt machine will outlast and outwork a light 1,500 watt one, and cost less to run while doing it.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 21:45:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Kenwood kMix KMX754CR Stand Mixer, 1000W, 5L Glass Bowl, Cream',          // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£199.00',                                                               // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 3164,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71RXCa4njjL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best stand mixer',                                                   // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B072175L1X?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The heaviest machine in this comparison at 10.9kg, which is 500g more gearbox than the KitchenAid for £168 less.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Ten point nine kilograms is the highest figure on this page, and in a planetary mixer that mass is not packaging — it is the cast housing and the gear train that turn motor speed into the torque a dough hook needs. The kMix weighs half a kilogram more than the KitchenAid Artisan and costs £167.99 less, which makes it the best stand mixer here on the specification that actually predicts kneading. Three thousand one hundred and sixty-four ratings at 4.5 stars is the second deepest sample in the comparison.

The rest of the package is Kenwood's usual competence with a better bowl. Five litres of glass rather than steel means you can watch a meringue come together, which sounds cosmetic until you are trying to judge stiff peaks through a splash guard. The unique fold function runs the beater slowly and intermittently for enriched doughs like brioche, where ordinary low speed knocks the air out. There are the standard K-beater, balloon whisk and dough hook, over ten optional attachments including pasta rollers and a meat grinder, and everything is dishwasher safe.

The listing publishes 1,000 watts and no voltage, which puts it in the majority here — three of the ten omit voltage entirely. It also gives no dough capacity, a figure only Bosch supplies anywhere on this page, so the five litre bowl has to stand in for it. At £199 it is mid-priced in a field running from £74.99 to £366.99, and it is the point on that curve where the metal stops being replaced by plastic.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['10.9kg, the heaviest mixer here and the best proxy for real gearing', '£167.99 cheaper than the KitchenAid with more mass', '3,164 ratings at 4.5, the second deepest sample in this comparison', 'Glass bowl lets you judge meringue and batter without lifting the head', 'Fold function for brioche and enriched doughs, unique here'], // PONTOS POSITIVOS
                'contras' => ['No dough capacity published, unlike either Bosch', 'No voltage stated anywhere on the listing', 'Glass bowl is heavier and more fragile than steel', '5 litre bowl is smaller than the Kenwood KVL and the Aucma'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'KitchenAid Artisan 5KSM125 Stand Mixer, 300W, 4.8L, 10 Speeds',           // NOME (ENCURTADO)
                'price' => '£366.99',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 882,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Ivfg15OxL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'KitchenAid Artisan stand mixer in almond cream with stainless bowl',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07KFNGSYD?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The machine that proves the argument: 300 watts, 10.4 kilograms, 4.6 stars, and the highest price on the page.', // TEXTO CURTO (CARD)
                'body' => "Three hundred watts is the lowest figure in this comparison by 600, and it belongs to the most expensive and best-rated mixer on the page. That pairing is the entire case against reading wattage as power. KitchenAid uses a slow, high-torque motor driving through a heavy metal gear train, which is why the machine weighs 10.4 kilograms and why it will knead a stiff dough that stalls a 1,500 watt machine weighing half as much. The watts you do not see are the ones a cheap universal motor spends on heat and noise.

The other thing £366.99 buys is a thirty-year design. The hub on the front accepts a large ecosystem of attachments — pasta rollers, grain mills, spiralizers, meat grinders — that fit Artisans made decades apart, and there is a serious second-hand market because these get repaired rather than replaced. The 4.8 litre stainless bowl, ten speeds, dough hook, whisk and flat beater are all included, and the warranty is five years, the longest here.

The reasons it does not take first place are money and evidence. It costs £167.99 more than the Kenwood kMix, which weighs half a kilo more and carries three and a half times the ratings, and 882 ratings at 4.6 stars is good rather than overwhelming for a product this famous. Two footnotes from the specification table: Number of Items reads 5, which is one mixer and four accessories rather than five mixers, and Country of Origin is China — accurate for the European Artisan, and worth stating because many buyers assume Ohio.", // TEXTO SEO LONGO
                'pros' => ['300W and 10.4kg, the clearest demonstration of torque over wattage here', '4.6 stars, the joint-highest average in this comparison', 'Five-year warranty, the longest on this page', 'Attachment hub compatible across decades of Artisan models', 'Genuinely repairable, with a strong second-hand market'], // PONTOS POSITIVOS
                'contras' => ['£366.99, the most expensive mixer here by £107', 'The Kenwood kMix weighs more and costs £167.99 less', '4.8 litre bowl is among the smaller ones on this page', 'Made in China despite the American branding, and 10.4kg to lift'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Aucma Stand Mixer, 1400W, 6.2L Bowl, Full Metal Gears, 6 Speeds',         // NOME (ENCURTADO)
                'price' => '£89.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 3930,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/517Gonxyq2L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Aucma stand mixer in black with 6.2 litre stainless steel bowl',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B089275QB7?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The deepest review pool on the page at 3,930, and the only mixer under £100 that tells you what its gearbox is made of.', // TEXTO CURTO (CARD)
                'body' => "Three thousand nine hundred and thirty ratings at 4.6 stars is the deepest and joint-best-rated evidence in this comparison, and one line in the specification explains why it deserves it: \"Full metal gears + ball bearing + belt structure\". That is the only disclosure of transmission construction anywhere on this page below £199, and it is the difference that matters. Nylon gears are what fail first in cheap mixers, usually on the third or fourth bread dough, and a brand willing to say its gears are metal is telling you something the seven other budget listings will not.

At £89.99 the 6.2 litre bowl is also the largest here, with two handles and a one-piece splash guard, and there is an overheat cut-out driven by an internal temperature sensor. Six speeds plus pulse, anti-slip suction feet, and a blue power indicator.

Where it lands in the argument of this article is instructive. Fourteen hundred watts in a 4.7 kilogram body is 298 watts per kilogram — the highest ratio on this page, and the opposite end of the scale from the KitchenAid's 29. So expect it to be loud and to work harder for the same result, and Aucma is honest enough to publish the consequence: \"Low noise level ≤75dB\". Seventy-five decibels is louder than a domestic vacuum cleaner. Publishing a number that undercuts your own adjective is more useful than the six listings here that claim quietness with no figure at all. No voltage is published.", // TEXTO SEO LONGO
                'pros' => ['3,930 ratings at 4.6, the deepest and joint-best rated here', 'The only sub-£100 mixer that states its gears are metal, with ball bearings', 'Largest bowl in this comparison at 6.2 litres, with two handles', 'Overheat cut-out driven by an internal temperature sensor', '£89.99 for a specification that reads like a £150 machine'], // PONTOS POSITIVOS
                'contras' => ['4.7kg, the lightest machine here, at 298 watts per kilogram', 'Publishes "≤75dB" beside the words "low noise" — louder than a vacuum', 'No voltage published anywhere on the listing', 'No dough capacity figure, so 6.2 litres has to stand in for it'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Kenwood KVL4100W Stand Mixer, 1200W, 6.7L Bowl, Electronic Speed Control', // NOME (ENCURTADO)
                'price' => '£259.90',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 499,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/41PV1xCaMUL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Kenwood KVL4100W white stand mixer with 6.7 litre bowl',             // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0725FZD9M?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The biggest bowl here at 6.7 litres and the machine to buy if you make pizza dough in quantity — for £61 more than the kMix and 3.2kg less.', // TEXTO CURTO (CARD)
                'body' => "Six point seven litres is the largest bowl in this comparison by half a litre, and Kenwood is explicit about who it is for: \"larger batches and heavier pizza dough or rye bread loads\". Rye is the correct test to name, because it is the dough that punishes a weak mixer hardest — low gluten, high hydration, and it grabs the hook rather than sliding off it. Over 25 optional attachments make this the most expandable machine on the page, and electronic speed control holds the set speed as the dough stiffens rather than letting it sag.

At 7.66 kilograms and 1,200 watts it sits in the middle of the mass table, which puts it behind the kMix on the metric this article cares about while costing £60.90 more. What the money buys over the kMix is the bigger bowl and the wider attachment range rather than more gearing, so it is the right choice for volume and the wrong one for value. Four hundred and ninety-nine ratings at 4.5 stars is a mid-table sample, a sixth of what the kMix carries.

Two listing notes. The specification table gives Voltage as 220 volts, where Kenwood's own kMix publishes none and Britain's grid is 230 — the same inconsistency we found across smart plugs, from a brand that ought to know. And Product Warranty reads \"1.\", a numeral and a full stop with no unit attached, on a £259.90 appliance. Kenwood's actual UK cover is longer than that field suggests, which makes the field worse than useless.", // TEXTO SEO LONGO
                'pros' => ['6.7 litre bowl, the largest in this comparison', 'Named for heavy pizza and rye doughs, the hardest test of a mixer', 'Over 25 optional attachments, the widest ecosystem here after KitchenAid', 'Electronic speed control holds speed as dough stiffens', '4.5 stars from 499 ratings'], // PONTOS POSITIVOS
                'contras' => ['7.66kg against the kMix\'s 10.9kg, for £60.90 more', 'Product Warranty field contains only "1."', 'States 220V where the UK grid is 230V nominal', '499 ratings is a sixth of the kMix\'s sample'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Bosch CreationLine MUM58259GB Stand Mixer, 1000W, 3.9L, 7-in-1',          // NOME (ENCURTADO)
                'price' => '£199.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 141,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/713+LnoJ6wL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Bosch CreationLine stand mixer in white and silver with accessories', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D4QXBCPG?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only brand on this page that publishes what the machine can actually process: 2.4kg of cake mixture, 1.7kg of yeast dough.', // TEXTO CURTO (CARD)
                'body' => "Every other listing here tells you how many litres its bowl holds. Bosch tells you what the machine will process: \"up to 2.4 kg of cake mixture or 1.7 kg of yeast dough\". That is an output specification rather than an input one, and it is the number a baker actually needs, because dough is dense and the limit on a stand mixer is the gearbox rather than the volume. A 6.2 litre bowl full of bread dough would stop most machines on this page long before it was full; Bosch is the only brand willing to say where its own limit is. The Capacity field goes further and reads \"2.4 Kilograms\" instead of litres — inconsistent with every rival, and more useful than all of them.

The rest is a genuinely versatile kitchen machine rather than just a mixer. Twelve accessories including a blender and a juicer, 3D PlanetaryMixing that reaches the bowl wall properly, seven speeds plus pulse, a whisk, stirrer and kneading hook, all dishwasher safe. One thousand watts and a 3.9 litre bowl.

The reservations are size and sample. Three point nine litres is the second smallest bowl here, so the 1.7 kilogram dough limit is a real ceiling rather than a theoretical one — that is roughly two large loaves. And 141 ratings is the second thinnest evidence on this page, though 4.5 stars is solid. The bullets also print the dough figure as \"2 .4 kg\", with a stray space before the decimal, twice. Small, but it is in the one number that distinguishes this listing from every other.", // TEXTO SEO LONGO
                'pros' => ['The only listing here that publishes a real output figure in kilograms', 'States 2.4kg cake mixture and 1.7kg yeast dough capacity plainly', 'Twelve accessories including a blender and juicer', '3D PlanetaryMixing reaches the bowl wall properly', '4.5 stars and a genuine multi-function kitchen machine'], // PONTOS POSITIVOS
                'contras' => ['3.9 litre bowl, the second smallest in this comparison', '1.7kg dough limit is roughly two large loaves', '141 ratings, the second thinnest sample here', 'Prints its headline figure as "2 .4 kg" with a stray space, twice'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Kenwood KHC30 Stand Mixer, Electronic Speed Control, Planetary Mixing',   // NOME (ENCURTADO)
                'price' => '£99.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 1107,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/717sQ0ca-iL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Kenwood KHC30 compact white stand mixer with splash guard',          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GK9LFQW9?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A real Kenwood for £99.99 with 1,107 ratings, from a listing that publishes neither its wattage nor its bowl capacity.', // TEXTO CURTO (CARD)
                'body' => "This is the cheapest way to a Kenwood, and the features it does describe are the right ones. Electronic speed control \"automatically maintains the selected speed even with heavy doughs\" — which is the correct engineering answer to the problem this whole article is about, because holding speed under load is what a torque-limited machine cannot do. Soft start reduces the flour cloud at the beginning, the splash guard has a feed chute so you can add ingredients without stopping, and a safety interlock prevents operation unless the covers are fitted. One thousand one hundred and seven ratings at 4.4 stars is the third deepest sample here.

At 6.36 kilograms it sits mid-table on mass, above every sub-£90 machine on this page and below the Bosch Serie 2. For £99.99 that is a reasonable amount of metal, and Kenwood's service network in Britain is a real advantage over the anonymous brands at similar money.

What the listing will not tell you is remarkable given everything else it explains. There is no wattage anywhere in the bullets or the specification table, and no bowl capacity either — two figures every other product on this page publishes, and the two most basic questions anyone asks about a mixer. It is the only listing here missing both. One incidental disclosure: the Manufacturer field reads \"De'Longhi\", which is accurate — De'Longhi has owned Kenwood since 2001 — and no other Kenwood listing on this page mentions it.", // TEXTO SEO LONGO
                'pros' => ['Cheapest genuine Kenwood here at £99.99 with UK service behind it', 'Electronic speed control holds speed as the dough stiffens', 'Soft start and a safety interlock on the covers', '1,107 ratings at 4.4, the third deepest sample here', '6.36kg, more mass than any cheaper machine on this page'], // PONTOS POSITIVOS
                'contras' => ['Publishes no wattage anywhere, uniquely on this page', 'Publishes no bowl capacity either', 'Fewest attachments of any Kenwood here', '4.4 stars is mid-table for the brand'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Bosch Series 2 MUMS2VM40G Stand Mixer, 900W, 3.8L, 7-in-1',               // NOME (ENCURTADO)
                'price' => '£200.00',                                                               // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 149,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81h1ZcY7YtL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Bosch Series 2 stand mixer in black and silver with attachments',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C3D6G55V?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only mixer here made in Europe, and the only one that gives two different wattages inside a single sentence.', // TEXTO CURTO (CARD)
                'body' => "Slovenia is the country of origin, which makes this the only machine on this page not built in China, and for anyone who weighs that in a purchase it is worth knowing. The package is generous: a meat mincer, blender, citrus press and a shredder attachment with four stainless discs are all in the box alongside the whisk, stirrer and kneading hook, which is why Bosch calls it seven-in-one rather than a mixer. At 6.9 kilograms it carries more mass than anything cheaper here, and like its CreationLine sibling it publishes a real output figure: 2.4 kilograms of cake mixture, 1.7 kilograms of yeast dough.

The first bullet cannot decide how powerful it is. It opens \"COMPACT 700W STAND MIXER\" and then, in the same sentence, describes \"a powerful 900W motor\". The specification table says 900 watts, so that is almost certainly right and the 700 is a leftover from a different model — but it is the headline of the headline bullet, and it is wrong by 200 watts on a £200 appliance.

The bigger reservation is what £200 buys. The bowl is 3.8 litres, the smallest in this comparison, and the machine costs £110.01 more than the Aucma which has 6.2 litres and 3,930 ratings against this one's 149. The attachments justify some of that gap if you will genuinely use a mincer and a juicer; if you want a mixer, the money is better spent on mass elsewhere on this page. Four point three stars is the second-lowest average here.", // TEXTO SEO LONGO
                'pros' => ['The only mixer here made in Europe, in Slovenia', 'Publishes real output: 2.4kg cake mixture, 1.7kg yeast dough', 'Mincer, blender, citrus press and shredder with four discs included', '6.9kg, more mass than anything cheaper on this page', 'Two-year manufacturer warranty'], // PONTOS POSITIVOS
                'contras' => ['First bullet says 700W and 900W in the same sentence', '3.8 litre bowl, the smallest in this comparison, for £200.00', '149 ratings against 3,930 for the £89.99 Aucma', '4.3 stars, the second-lowest average here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Salter Marino Baking Stand Mixer, 1200W, 5L Bowl, 6 Speeds with Pulse',   // NOME (ENCURTADO)
                'price' => '£74.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 426,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71+31U82sOL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Salter Marino blue grey stand mixer with 5 litre stainless bowl',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CBS8X8HW?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest mixer here at £74.99 with a three-year warranty — the longest cover of any machine under £200 on this page.', // TEXTO CURTO (CARD)
                'body' => "Seventy-four pounds ninety-nine is the lowest price in this comparison and the three-year warranty is the surprise: only the KitchenAid, at nearly five times the money, offers longer. For a category where the usual budget cover is one or two years, a British homeware brand backing a £75 mixer for three is a meaningful signal about expected failure rates, and it is worth more than most of the specifications on the page.

You get a 5 litre stainless bowl, six speeds plus a pulse function, a removable splash guard and the standard three tools, in a blue-grey finish that matches the rest of Salter's Marino range if a coordinated kitchen matters to you. Four hundred and twenty-six ratings at 4.4 stars is respectable mid-table evidence.

The physics puts it where it sits. Twelve hundred watts in a 5.15 kilogram body is 233 watts per kilogram, eight times the KitchenAid's ratio, and that tells you this is a fast motor in a light housing rather than a geared machine in a heavy one. It will beat batter and whip cream perfectly well — most of what a home mixer does needs speed, not force — and it will struggle where the heavy machines do not, which is repeated stiff bread dough. Nothing on the listing describes the gear material, and unlike the Aucma at number three, Salter does not claim metal gears. The specification table also gives 220 volts, ten below the British nominal.", // TEXTO SEO LONGO
                'pros' => ['Cheapest mixer in this comparison at £74.99', 'Three-year warranty, longest of anything under £200 here', '5 litre stainless bowl with six speeds and a pulse function', '426 ratings at 4.4 stars', 'Matches the rest of the Salter Marino range'], // PONTOS POSITIVOS
                'contras' => ['1200W in a 5.15kg body: 233 watts per kilogram, eight times the KitchenAid', 'Says nothing about gear material, unlike the Aucma at similar money', 'States 220V where the UK grid is 230V nominal', 'Will handle batter well and stiff bread dough poorly'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Vospeed Stand Mixer, 1000W, 4.5L + 5L Bowls, 8 Speeds, Tilt-Head',        // NOME (ENCURTADO)
                'price' => '£79.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 851,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71gIF0C83GL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Vospeed black stand mixer with two nested stainless steel bowls',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0963MKTG5?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Two nested bowls for £79.99 and 851 ratings, on a listing that publishes three different capacities and calls 76 decibels quiet.', // TEXTO CURTO (CARD)
                'body' => "Two bowls is a genuinely good idea that nothing else here offers. A 4.5 litre and a 5 litre bowl nest inside each other, so you can whip egg whites in one while a batter waits in the other without washing up mid-recipe — the single most annoying interruption in baking. Eight speeds, four silicone suction cups that keep the machine still on a worktop, and a tilt head for access. Eight hundred and fifty-one ratings at 4.4 stars is decent evidence.

The listing cannot agree with itself on how much it holds. The title says \"4.5L+5L Bowls\". The specification table says \"Capacity: 4.73 litres\" — a figure that matches neither bowl, and looks like an average of the two. The Model Name field, meanwhile, contains the single letter \"e\".

Then there is the noise claim, which is the most self-defeating sentence collected in this category: \"Low Noise: The sound is less than 76 decibel under any speed, your old grandma won't even notice when kitchen mixer is working.\" Seventy-six decibels is louder than a domestic vacuum cleaner, roughly the level of a busy street, and it is being offered as evidence of quietness alongside a claim about an elderly relative not hearing it. At 4.68 kilograms this is the lightest machine on the page, which is consistent with both the noise and the 214 watts per kilogram. Note also that Vospeed sells this twice: ASIN B0DPPYD6GR carries the same title, the same £79.99 and the same 851 ratings.", // TEXTO SEO LONGO
                'pros' => ['Two nested bowls, 4.5L and 5L, unique in this comparison', 'Avoids washing up mid-recipe when a batter and a meringue overlap', 'Eight speeds and four silicone suction feet for stability', '851 ratings at 4.4 stars for £79.99'], // PONTOS POSITIVOS
                'contras' => ['Title says 4.5L+5L while the table says 4.73 litres, matching neither', 'Calls 76 decibels "low noise" — louder than a vacuum cleaner', 'Model Name field contains the single letter "e"', '4.68kg, the lightest machine here, and sold under a second identical ASIN'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Vospeed 9-in-1 Stand Mixer, 1500W, 5.5L Bowl, Meat Grinder, Pasta Maker', // NOME (ENCURTADO)
                'price' => '£83.99',                                                                // PRECO
                'rating' => 3.9,                                                                    // NOTA
                'reviews_count' => 105,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71jwW11NPGL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Vospeed 9-in-1 white stand mixer with meat grinder and pasta attachments', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F9F3SG8B?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest wattage on this page and the lowest rating on this page, in the same machine. That is the argument of this article in one product.', // TEXTO CURTO (CARD)
                'body' => "One thousand five hundred watts is the largest figure in this comparison, five times the KitchenAid's 300. Three point nine stars is the lowest rating in this comparison, the only average below 4.0, and our editorial rule is to flag exactly that. The two facts sit on the same listing, and the machine weighs 5.16 kilograms — 291 watts per kilogram against the KitchenAid's 29. If you wanted a single product to demonstrate that input wattage does not predict how well a stand mixer works, this is it.

There is a real offer underneath. Nine functions for £83.99 is a lot: beyond the dough hook, beater and whisk you get a meat grinder with a sausage stuffer, a pasta maker and cookie cutters, plus a 5.5 litre stainless bowl and ten speeds with a sensible published mapping — 1 to 3 for yeast dough, 4 to 6 for batter, 7 to 10 for cream. Everything including the grinder parts is dishwasher safe, and the motor is described as pure copper.

The problem is that attachments multiply the demands on the very component that mass would protect. A meat grinder puts sustained torque through the same gearbox that a 5.16 kilogram machine has to fit inside, and grinding meat is a harder continuous load than kneading. One hundred and five ratings is the thinnest sample here, so 3.9 stars is an early signal rather than a settled verdict — but it is a signal pointing the same way as the arithmetic. The specification table also gives 220 volts, and 1,500 watts at 220 volts draws 6.8 amps, which is fine for a plug and hard on a light gearbox.", // TEXTO SEO LONGO
                'pros' => ['Nine functions for £83.99, including meat grinder and pasta maker', '5.5 litre bowl and ten speeds with a published speed-to-task mapping', 'All attachments including the grinder are dishwasher safe', 'Cheapest route to a mixer that also grinds and makes pasta'], // PONTOS POSITIVOS
                'contras' => ['3.9 stars, the only average below 4.0 in this comparison', '1500W in a 5.16kg body: 291 watts per kilogram, ten times the KitchenAid', 'Attachments load the same gearbox that the light build has to fit', '105 ratings, the thinnest sample here'], // PONTOS NEGATIVOS
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
        $this->command?->info("StandMixersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
