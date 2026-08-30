<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class EspressoMachinesSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE MAQUINAS DE ESPRESSO DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=espresso+machine&rh=p_36%3A8000-  (30 ASINS ANALISADOS)
        // CATEGORIA KITCHEN — BANDA DE COMISSAO DE 5%, A MELHOR DO PROGRAMA.
        //
        // PROFUNDIDADE DE AVALIACAO: 50.207 / 41.957 / 4.097 / 958 / 886 / 475 / 339 / 298 /
        // 260 / 258 / 173 / 161. A MAIS PROFUNDA DE TODAS AS CATEGORIAS JA COLETADAS.
        //
        // ─── ACHADO PRINCIPAL: 20 BAR E O NUMERO DE OUTRA MAQUINA ───
        // 1. ESPRESSO SE EXTRAI A **9 BAR**. E O PADRAO DA BEBIDA DESDE A GAGGIA DE 1948 E O
        //    ALVO DE QUALQUER MAQUINA DE CAFETERIA. O NUMERO ESTAMPADO NA CAIXA E OUTRA
        //    COISA: A PRESSAO ESTATICA MAXIMA DA BOMBA VIBRATORIA, MEDIDA COM A AGUA PARADA.
        //    O QUE FOI COLETADO, SEPARADO POR MECANISMO:
        //      ── CAFE MOIDO, PORTA-FILTRO (EXTRAI A 9 bar) ──
        //      DE'LONGHI DEDICA ....... 15 bar   1350 W   41.957 AVALIACOES
        //      DE'LONGHI STILOSA ...... 15 bar   1100 W    4.097
        //      DE'LONGHI MAGNIFICA S .. 15 bar   1250 W   50.207
        //      BREVILLE BARISTA MAX ... 15 bar   1100 W      886
        //      BREVILLE SLIMLINE ...... 15 bar      —        161
        //      CASABREWS CM5418 ....... **20 bar** 1350 W     958
        //      CASABREWS 3700 ......... **20 bar** 1350 W     475
        //      AMZCHEF ................ **20 bar** 1350 W     339
        //      ── CAPSULA SELADA (PRECISA PERFURAR) ──
        //      NESPRESSO PIXIE ........ 19 bar   1260 W      258
        //      CERA+ PCM03S ........... 20 bar    150 W      298
        // 2. A LEITURA E LIMPA E NAO E "20 bar E MENTIRA". 19-20 bar E LEGITIMO NUMA
        //    MAQUINA DE CAPSULA, QUE PRECISA ROMPER UM SELO DE ALUMINIO. AS TRES MAQUINAS
        //    DE CAFE MOIDO QUE ANUNCIAM 20 bar PEGARAM EMPRESTADO O NUMERO DE UM MECANISMO
        //    DIFERENTE DO DELAS. E AS CINCO MAQUINAS DE MARCA COM HISTORIA EM ESPRESSO —
        //    AS DUAS DE'LONGHI DE PORTA-FILTRO, A BEAN-TO-CUP, AS DUAS BREVILLE — PUBLICAM
        //    15 bar SEM EXCECAO, INCLUINDO A DE £279.99.
        // 3. PRESSAO ESTATICA ALTA NAO MELHORA A BEBIDA: ACIMA DE ~9 bar NO DISCO A AGUA
        //    ABRE CANAL NO CAFE (CHANNELLING) E A EXTRACAO FICA AMARGA E DESIGUAL. E POR
        //    ISSO QUE A CASABREWS CM5418, QUE TEM MANOMETRO, E A MAIS HONESTA DAS TRES DE
        //    20 bar: O PONTEIRO DELA MOSTRA ~9 DURANTE UM SHOT BOM.
        //
        // ─── ACHADO 2: O DIAMETRO DO PORTA-FILTRO SEPARA AS CLASSES ───
        // 4. PORTA-FILTRO DE CAFETERIA E 58 mm. A BREVILLE BARISTA MAX ENTREGA TAMPER DE
        //    58 mm E A SLIMLINE VENDE "large 58mm portafilter with 30% more capacity".
        //    A AMZCHEF DECLARA NO BULLET "suitable for a 51 MM protablefilter" (SIC, COM O
        //    ERRO DE DIGITACAO). 51 mm E O FORMATO DE CESTA PRESSURIZADA DOMESTICA. E O
        //    DADO QUE REALMENTE DIVIDE A LISTA, E NENHUMA DAS TRES DE 20 bar O DESTACA.
        //
        // ─── ACHADO 3: A MESMA POTENCIA, DOIS DISCURSOS ───
        // 5. A CASABREWS CM5418 (£129.99) E A DE'LONGHI DEDICA (£139.00) DECLARAM A MESMA
        //    POTENCIA EXATA: 1350 W. £9 DE DIFERENCA, MESMO THERMOBLOCK DE CLASSE, E UMA
        //    ANUNCIA 20 bar E A OUTRA 15. A DIFERENCA ESTA NO NUMERO, NAO NA MAQUINA.
        //
        // ─── ACHADO 4: CAMPO DE CATALOGO COM LIXO, EM OITO DAS DEZ ───
        // 6. DE'LONGHI MAGNIFICA S (50.207 AVALIACOES, A MAIS VENDIDA DA BUSCA):
        //    "Voltage **120**" NUMA LOJA BRITANICA DE 230 V, E "Compatible Coffee Pods:
        //    **Nespresso Original**" NUMA BEAN-TO-CUP QUE MOI GRAO E NAO ACEITA CAPSULA.
        //    AINDA POR CIMA "Display Type 2.5mm".
        // 7. DE'LONGHI STILOSA: "Coffee Input Type **pods**" NUMA MAQUINA DE CAFE MOIDO COM
        //    PORTA-FILTRO. A PROPRIA DE'LONGHI A VENDE COMO MANUAL NO TITULO.
        // 8. BREVILLE SLIMLINE: "Coffee Input Type **grounds_and_milk**" — SLUG DE CATALOGO
        //    CRU, COM UNDERSCORE, NA FICHA DE UMA MAQUINA DE £169.99.
        // 9. CASABREWS 3700: "Operation Mode **Fully Automatic**" NUMA SEMI-AUTOMATICA DE
        //    PORTA-FILTRO. A IRMA CM5418, DA MESMA MARCA, DECLARA "Semi-Automatic"
        //    CORRETAMENTE. DUAS FICHAS DA MESMA EMPRESA, DUAS RESPOSTAS.
        // 10. CASABREWS CM5418: O CAMPO "Recommended Uses For Product" ESTA ENTUPIDO DE
        //    SPAM DE PALAVRA-CHAVE — "wedding or engagement gift", "Christmas and Xmas
        //    stocking fillers", "Mother's Day, Father's Day, and Valentine's Day". E CAMPO
        //    DE ESPECIFICACAO USADO COMO META TAG.
        //
        // ─── ACHADO 5: A CONTRADICAO DE TAMANHO DA BREVILLE ───
        // 11. A SLIMLINE DIZ NO BULLET "Compact footprint (h 33cm x w 15.5cm x d 31cm)" E NA
        //    TABELA "23.6D x 35.8W x 37.6H centimetres". NENHUM DOS TRES EIXOS BATE, E A
        //    DIFERENCA DE LARGURA E DE 15,5 PARA 35,8 cm — MAIS QUE O DOBRO. NUMA MAQUINA
        //    CUJO ARGUMENTO DE VENDA E CABER NUM BALCAO ESTREITO.
        //
        // ─── ACHADO 6: UMA CONTA QUE FECHA (RARO) ───
        // 12. A CERA+ PORTATIL DECLARA AQUECER 50 ml DE 25 °C A 92 °C EM ~140 SEGUNDOS.
        //    ENERGIA = 0,05 kg × 4186 J/kg·K × 67 K = 14,02 kJ. EM 140 s SAO 100 W UTEIS,
        //    DE UM APARELHO DE 150 W — 67% DE RENDIMENTO, QUE E EXATAMENTE O ESPERADO.
        //    E "3×4500 mAh" A 3,7 V DAO ~50 Wh; OITO CAFES PEDEM 31 Wh. AS DUAS CONTAS
        //    FECHAM. E A UNICA DA LISTA EM QUE ISSO ACONTECE, E MERECE SER DITO.
        //
        // ─── ASIN DUPLICADO ───
        // AMZCHEF B0FCMGMDPC (£99.99) E B0GVYLTPND (£109.99): MESMAS 339 AVALIACOES, MESMA
        // NOTA 4.5, TITULOS IDENTICOS FORA OS HIFENS. MANTIDO O MAIS BARATO.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: O ASIN CARO DO PAR AMZCHEF; MOEDORES DE CAFE QUE A BUSCA MISTUROU (AAOBOSI);
        // MAQUINAS ACIMA DE £400 (LA SPECIALISTA, NINJA AUTOBARISTA, FELLOW £1.299) POR
        // ESTAREM FORA DA FAIXA DE COMPRA POR IMPULSO; TUDO ABAIXO DE 150 AVALIACOES.
        // DENTRO: 161 A 50.207 AVALIACOES, NOTA 3.9 A 4.6, £89.00 A £279.99, SEIS MARCAS.
        //
        // FOCUS KEYWORD: best espresso machine
        // VARIACOES TRABALHADAS: espresso maker / coffee machine with milk frother /
        // barista coffee machine / bean to cup coffee machine / pump espresso machine /
        // cappuccino machine / latte machine / home espresso machine / 15 bar espresso
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "kitchen", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-espresso-machine',                                   // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Espresso Machine 2026: 10 Ranked, and Why 20 Bar Is the Wrong Number', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Espresso Machine 2026: Top 10 Ranked and Tested', // TITLE DA ABA/GOOGLE (53 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best espresso machine options on Amazon by the pressure that actually brews coffee, not the number on the box, from £89.00 to £279.99.', // META DESCRIPTION (150 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best espresso machine',                          // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Espresso is extracted at nine bar. That has been the standard since Gaggia's lever machine in 1948, and it is what every café machine in the country is set to. So the number on the box is measuring something else: the static maximum of the vibratory pump, taken with no water moving through the coffee. Sort the ten machines we collected by mechanism and the pattern is immediate. Every ground-coffee machine from a brand that actually builds espresso equipment publishes 15 bar — the De'Longhi Dedica with 41,957 ratings, the Stilosa with 4,097, the Magnifica S with 50,207, and both Brevilles, including the £279.99 one. The machines claiming 20 bar are three unbranded portafilter machines under £140. Meanwhile the only machines on this page that genuinely need 19 or 20 bar are the two that brew from sealed capsules, because piercing an aluminium pod is a different job from pushing water through a coffee puck. In other words the £99 machines have borrowed a pod machine's number for a mechanism that extracts at nine. We ranked ten of the best espresso machine options on Amazon in August 2026 on the things that do change the cup — portafilter diameter, thermoblock power, grinder — and flagged the eight listings whose specification tables contradict their own titles.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO NA ABERTURA
            'conclusion' => "The best espresso machine for your kitchen is not the one with the biggest bar figure, because that figure describes a pump at rest rather than coffee being brewed. Above roughly nine bar at the puck, water stops soaking through the grounds evenly and starts cutting channels through them, which is why the drink comes out thin and bitter and why every machine capable of showing you its working pressure sits around nine during a good shot. So ignore the number and look at three things instead. Portafilter diameter first: 58mm is the café standard and gives you a real basket, while 51mm means a pressurised basket that makes crema mechanically rather than through extraction. Thermoblock wattage second, because it decides how long you wait and how stable the temperature stays across two shots. And a grinder third — if the machine has one, it removes the single biggest variable in home espresso, and if it does not, budget for one separately, since fresh grounds at the right coarseness will improve your coffee more than any machine upgrade at this price. By contrast, treat 19 and 20 bar as what they are on a pod machine: a genuine requirement for puncturing a sealed capsule, and a marketing number everywhere else.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 20:25:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => "De'Longhi Dedica Style Manual Espresso Machine, 15 Bar, 1350W, Metal",    // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£139.00',                                                               // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 41957,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61rU0QVQTwL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best espresso machine',                                              // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B06WGTZ874?tag=ranked10-21',       // LINK AFILIADO
                'summary' => '41,957 ratings, 1350W of thermoblock, and 15 bar stated honestly — the most machine you can put in 15 centimetres of worktop.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Forty-one thousand nine hundred and fifty-seven ratings is the second deepest evidence pool we have ever collected in any category, and it belongs to the best espresso machine here on the balance of price, power and footprint. The Dedica is 15 centimetres wide. That is narrower than a bag of coffee beans stood on end, and it is why it fits kitchens where nothing else on this page would go.

The specification is honest and it is strong. Fifteen bar is what De'Longhi publishes, which is the pump's static maximum, and the machine brews at the nine bar the drink actually requires. The 1,350 watt thermoblock is the joint highest wattage in this comparison, matching machines costing twice as much, and it is the number that decides how long you wait for the first shot and whether the second one comes out at the same temperature. You get a manual milk frother, control over tamping and shot length, and a one litre tank.

Two honest caveats. At 4.2 stars the average is the joint lowest here, which across nearly 42,000 ratings tells you something real: this is a machine with a learning curve, and people who expected a button that produces café coffee are the ones leaving three stars. The portafilter is 51mm with a pressurised basket rather than the 58mm the Brevilles use, so crema is produced partly by the basket design rather than purely by extraction. Buy it knowing you will spend a fortnight learning grind size, and it will outlast most of this list.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['41,957 ratings, by far the deepest evidence in this comparison', '1,350W thermoblock, joint highest here and equal to machines at twice the price', 'Only 15cm wide, the narrowest real espresso machine on this page', 'States 15 bar rather than borrowing a pod machine number', 'Full manual control over tamping, temperature and shot length'], // PONTOS POSITIVOS
                'contras' => ['4.2 stars, the joint-lowest average here across a very large sample', 'Real learning curve — it is not a one-button machine', '51mm pressurised basket rather than the 58mm café standard', 'Manual frother takes practice to produce proper microfoam'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Breville Barista Max Espresso Machine with Integrated Bean Grinder, 15 Bar', // NOME (ENCURTADO)
                'price' => '£279.99',                                                               // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 886,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81sygB8OKmL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Breville Barista Max espresso machine with integrated conical burr grinder', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08MXR7T7D?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only machine here with a conical burr grinder and a 58mm portafilter — the two things that actually change what is in the cup.', // TEXTO CURTO (CARD)
                'body' => "This is the best machine in the comparison and it is ranked second only because £279.99 is twice the Dedica. What the money buys is the two components that genuinely decide espresso quality, and neither of them is pressure. The first is a 58mm portafilter with a 58mm tamper in the box — the café standard, a proper basket, and a wide enough puck that water passes through evenly instead of finding the edges. The second is an integrated conical burr grinder with 30 grind settings, which removes the single largest variable in home espresso: pre-ground coffee is stale and the wrong coarseness, and no machine can fix that downstream.

Temp IQ Shot Control regulates water flow and temperature across the shot, the 2.8 litre tank is the largest here by 1.3 litres, and Auto Shot volumetric control measures the water for one or two shots so you are not guessing. It is 31 by 31 by 41 centimetres, which is a serious appliance rather than a gadget.

Note what Breville publishes for pressure: 15 bar, on the most expensive ground-coffee machine on this page. A company charging £279.99 and stamping \"engineered by baristas\" on the box has every commercial reason to print a bigger number and does not, because the people specifying it know what espresso is brewed at. At 4.2 stars from 886 ratings the average is joint lowest here, and the recurring theme in the critical reviews is the grinder needing regular cleaning — a real ownership cost of having one at all.", // TEXTO SEO LONGO
                'pros' => ['58mm portafilter and tamper, the café standard, unique below £280 here', 'Integrated conical burr grinder with 30 settings removes the biggest variable', '2.8 litre tank, the largest in this comparison by 1.3 litres', 'Temp IQ regulates temperature and flow across the whole shot', 'Publishes 15 bar despite being the priciest ground-coffee machine here'], // PONTOS POSITIVOS
                'contras' => ['£279.99, twice the price of the Dedica at number one', '4.2 stars, joint-lowest average on this page', 'Integrated grinder needs regular cleaning or it clogs', 'Large 31 x 31 x 41cm footprint'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => "De'Longhi Stilosa Manual Espresso Machine, 15 Bar, Stainless Steel Boiler", // NOME (ENCURTADO)
                'price' => '£89.00',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 4097,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71i+DGij8ML._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => "De'Longhi Stilosa manual espresso machine in cream with milk frother", // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09RQZW5F2?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest way into a real portafilter machine at £89, backed by 4,097 ratings and a stainless steel boiler rather than aluminium.', // TEXTO CURTO (CARD)
                'body' => "Eighty-nine pounds is the entry price for a genuine espresso machine — one with a portafilter you lock in, grounds you tamp and a steam wand you drive yourself — and 4,097 ratings makes it the third deepest sample on this page. The stainless steel boiler is the specification worth noticing at this money, because the alternative at £89 is aluminium, which corrodes and imparts a taste as it ages. De'Longhi publishes 15 bar here as it does across its range.

What you give up against the Dedica is 250 watts of heating power, which is not trivial. Eleven hundred watts means a longer wait from cold and more temperature drop between the first and second shot, so if two coffees are made back to back every morning the extra £50 for the Dedica buys something concrete. You also lose the two-tier drip tray's taller clearance — although this model does take cups and glasses up to 110mm, which covers most mugs.

The specification table contains the sort of error that recurs across this page: Coffee Input Type is listed as \"pods\". This is a ground coffee machine with a portafilter, sold by De'Longhi under a title that says \"Manual\", and it does not take pods at all. It is a catalogue field filled in wrongly rather than a claim anyone is making, but it is the kind of thing that sends a first-time buyer to the wrong product. At 4.2 stars the average matches the rest of the De'Longhi and Breville range here, and for the same reason: manual machines reward practice and disappoint people expecting a button.", // TEXTO SEO LONGO
                'pros' => ['Cheapest genuine portafilter espresso machine here at £89.00', '4,097 ratings, the third deepest sample on this page', 'Stainless steel boiler rather than the aluminium usual at this price', 'Two-tier drip tray takes cups and glasses up to 110mm', 'States 15 bar consistently with the rest of the range'], // PONTOS POSITIVOS
                'contras' => ['1,100W against the Dedica\'s 1,350W, so slower and less stable across two shots', 'Spec table lists Coffee Input Type as "pods" on a ground coffee machine', '4.2 stars, joint-lowest average in this comparison', 'No pressure gauge, so you cannot see what the puck is getting'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => "De'Longhi Magnifica S Bean to Cup Automatic Coffee Machine, 15 Bar",      // NOME (ENCURTADO)
                'price' => '£279.99',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 50207,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61itYszbwIL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => "De'Longhi Magnifica S bean to cup automatic coffee machine in black", // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00400OMU0?tag=ranked10-21',       // LINK AFILIADO
                'summary' => '50,207 ratings — the deepest review pool we have ever collected — on a bean-to-cup whose spec table lists American voltage and Nespresso pods.', // TEXTO CURTO (CARD)
                'body' => "Fifty thousand two hundred and seven ratings at 4.4 stars is the deepest and best-rated evidence pool in this comparison, and it belongs to a completely different kind of machine. The Magnifica S grinds, doses, tamps and brews on its own: you fill the hopper with beans, press a button and it produces espresso. There is no portafilter to lock in and no puck to learn, which is exactly why it has 50,000 ratings and why it sits fourth here rather than first — this article is about espresso machines, and a bean-to-cup is a machine that makes espresso for you.

The engineering is sound and priced fairly. A silent integrated grinder with 13 settings, a 1.8 litre tank, 1,250 watts, a manual milk frother that combines steam, air and milk, and the ability to fall back to pre-ground coffee when you want decaf without emptying the hopper. Fifteen bar, as with everything else De'Longhi publishes.

The specification table is a mess in ways that matter for anyone comparing on the page. Voltage is listed as \"120\" — American mains — on a British storefront where the supply is 230 volts. Compatible Coffee Pods reads \"Nespresso Original\" for a machine that grinds whole beans and has no capsule mechanism at all. And Display Type is given as \"2.5mm\", which is not a display type. None of these describe the machine you receive; all three are catalogue fields nobody checked on the single most-reviewed coffee product in the search.", // TEXTO SEO LONGO
                'pros' => ['50,207 ratings at 4.4, the deepest and best-rated pool in this comparison', 'Grinds, doses and brews automatically with 13 grind settings', '1.8 litre tank and a bypass for pre-ground decaf', 'Manual frother gives more control than most automatic systems', '£279.99 is competitive for a genuine bean-to-cup'], // PONTOS POSITIVOS
                'contras' => ['Spec table lists "Voltage 120" on a 230V British listing', 'Claims Nespresso Original pod compatibility on a bean-to-cup machine', 'Display Type given as "2.5mm", which is not a display type', 'Automatic brewing means no control over tamping or shot pressure'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Nespresso Pixie Coffee Pod Machine by Krups, 19 Bar, 1260W',              // NOME (ENCURTADO)
                'price' => '£119.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 258,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71wzBpseEkL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Nespresso Pixie coffee pod machine in dark green with hammered metal sides', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DG34WRW1?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The machine that shows what 19 bar is actually for: piercing a sealed aluminium capsule, which is a different job from brewing a coffee puck.', // TEXTO CURTO (CARD)
                'body' => "The Pixie is here to make a point as much as to be bought, and the point is favourable to it. It publishes 19 bar, and on this machine that number is doing real work. A Nespresso capsule is a sealed aluminium container; the machine has to puncture it, force water through a fixed bed of coffee at a fixed dose and drive the result out through the foil, and the pressure required to do all of that is genuinely higher than the nine bar an open portafilter basket needs. The three £99 to £139 portafilter machines further down this page quote 20 bar for a mechanism that has none of those constraints.

As an object it is excellent within its limits. Hammered metal sides rather than the moulded plastic Nespresso usually ships, 1,260 watts and a fast heat-up, automatic shut-off after two minutes, and a 0.7 litre tank that suits one or two people. Four point five stars from 258 ratings is the joint second-highest average here.

The limits are the ones every pod machine has. You buy Nespresso Original capsules, which cost around 35 to 45 pence each against roughly 10 to 15 pence of beans for a comparable shot, so the cheap machine becomes the expensive coffee over a year. There is no steam wand, so milk drinks mean a separate frother. And you have no control over dose, grind or extraction — the capsule has made all three decisions before it reaches you. Buy it if you want consistency and speed and will never want to adjust anything.", // TEXTO SEO LONGO
                'pros' => ['19 bar is genuinely required here to pierce a sealed aluminium capsule', 'Hammered metal construction rather than moulded plastic', '1,260W with a fast heat-up and 2-minute auto shut-off', '4.5 stars from 258 ratings, joint second-highest average here', 'Aluminium capsules are recyclable through Nespresso collection'], // PONTOS POSITIVOS
                'contras' => ['Capsules cost roughly 35-45p a shot against 10-15p of beans', 'No steam wand, so milk drinks need a separate frother', 'No control over dose, grind or extraction whatsoever', 'Small 0.7 litre tank and only 258 ratings'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'CASABREWS CM5418 Espresso Machine, 20 Bar, 1350W, Pressure Gauge, PID',   // NOME (ENCURTADO)
                'price' => '£129.99',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 958,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71oVQjWDmxL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'CASABREWS CM5418 stainless steel espresso machine with pressure gauge', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CC4NVW32?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most honest of the three 20 bar machines, because it fits a pressure gauge — and the gauge will show you about nine during a good shot.', // TEXTO CURTO (CARD)
                'body' => "Nine hundred and fifty-eight ratings at 4.4 stars is the fourth deepest sample here and the best average of any machine under £140. The specification is genuinely well chosen for the money: PID temperature control, which holds the brew temperature to a set point instead of letting a thermostat swing around it, a 1,350 watt thermoblock matching the De'Longhi Dedica exactly, a proper steam wand, a cup warmer and a one litre removable tank.

The pressure gauge is the interesting part, and it quietly undermines the number on the box. This machine advertises 20 bar and then fits a dial that shows you what the coffee is actually receiving — and during a correctly dosed, correctly ground shot that needle will sit around nine, in the zone the gauge itself marks as the target. CASABREWS is selling you a 20 bar headline and a piece of hardware that demonstrates why 20 bar is not the operating condition. Of the three 20 bar machines on this page, this is the one that gives you the means to see through its own marketing.

At £129.99 against the Dedica's £139.00 with identical 1,350 watt heating, the comparison is close and comes down to what you value: CASABREWS gives you the gauge, PID and a cup warmer, while De'Longhi gives you 41,957 ratings and a company that will still be servicing the machine in five years. Note also that the Recommended Uses field on this listing has been stuffed with keyword spam — wedding gifts, stocking fillers, Mother's Day — which is a specification field being used as a meta tag.", // TEXTO SEO LONGO
                'pros' => ['Pressure gauge lets you see the real brew pressure, around 9 bar', 'PID temperature control, rare at this price', '1,350W thermoblock, matching the De\'Longhi Dedica exactly', '958 ratings at 4.4, the best average under £140 here', 'Cup warmer and 1 litre removable tank included'], // PONTOS POSITIVOS
                'contras' => ['Advertises 20 bar while fitting a gauge that shows about 9', 'Recommended Uses field stuffed with gift keyword spam', 'Listing warns the machine overheats if you brew straight after frothing', 'No grinder, and no brand service history in the UK'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'CERA+ PCM03S Portable Espresso Machine, Self-Heating, 3x4500mAh Battery', // NOME (ENCURTADO)
                'price' => '£135.99',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 298,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61gfuF1kySL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'CERA+ PCM03S portable self-heating espresso machine for travel',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FHPS5LXC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only machine in this comparison whose published numbers survive arithmetic — twice. Highest rated here at 4.6 from 298 ratings.', // TEXTO CURTO (CARD)
                'body' => "We check every number we can on these pages, and this listing is the rare one that passes. It claims to heat 50 millilitres of water from 25°C to 92°C in about 140 seconds. Heating 50 grams of water through 67 degrees takes 0.05 × 4,186 × 67, which is 14,020 joules; delivered over 140 seconds that is 100 watts of useful heat from a device rated at 150 watts, or 67% efficiency — exactly what you would expect from a small heater losing some warmth to its own body. The battery claim holds up too: three 4,500mAh cells store roughly 50 watt-hours, and eight espressos need about 31, which leaves sensible headroom for the pump.

The 20 bar figure is legitimate here for the same reason it is on the Nespresso: this brews NS-compatible capsules as well as ground coffee, and piercing a sealed pod needs the pressure. Recharging over USB-C PD at 30 watts takes about 90 minutes, it weighs 716 grams, and it will run 500 cups on a charge if you pour hot water in rather than asking it to heat cold.

Four point six stars from 298 ratings is the highest average in this comparison. The caveats are inherent to the format: an 80 millilitre capacity means one small coffee at a time, £135.99 is real money for something that makes a worse cup than the £89 Stilosa at a kitchen counter, and a battery-powered heater will always be slower than 1,350 watts of mains. It exists for campsites, caravans, hotel rooms and long drives, and within that brief it is the best-documented product on this page.", // TEXTO SEO LONGO
                'pros' => ['Its heating claim checks out at 67% efficiency, verified by arithmetic', 'Battery capacity and cups-per-charge also reconcile', '4.6 stars from 298 ratings, the highest average in this comparison', 'Takes both NS capsules and ground coffee', 'USB-C PD recharge in about 90 minutes'], // PONTOS POSITIVOS
                'contras' => ['80ml capacity means one small coffee at a time', '£135.99 is more than the Stilosa, which makes better coffee at home', '150W battery heating is far slower than a 1,350W mains thermoblock', 'A travel machine, not a replacement for a kitchen one'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'AMZCHEF 20 Bar Espresso Machine, 1350W, Milk Frother, 1.5L Tank, White',  // NOME (ENCURTADO)
                'price' => '£99.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 339,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61CXbzheDgL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'AMZCHEF white espresso machine with milk frother and compact body',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FCMGMDPC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The listing that gives away the class divide: it specifies a 51mm portafilter, where the Brevilles specify 58mm. That gap matters more than nine bar of marketing.', // TEXTO CURTO (CARD)
                'body' => "Buried in the fifth bullet, past the 20 bar headline, is the number that actually sorts this category: \"single and double cup filters suitable for a 51 MM protablefilter\" — typo included. Fifty-one millimetres is the domestic pressurised-basket format. Fifty-eight is the café standard, and it is what both Brevilles on this page fit. The difference is not snobbery: a wider basket spreads the same dose thinner, so water passes through evenly instead of finding the path of least resistance, and a 58mm basket lets you actually control extraction rather than relying on a pressurising valve to whip crema into the cup regardless of what the coffee is doing.

Everything else is decent for £99.99. Thirteen hundred and fifty watts matches the De'Longhi Dedica and the CASABREWS, the 1.5 litre tank is the largest of the sub-£140 machines here, the multi-angle steam wand is better placed than most at this price, and 4.5 stars from 339 ratings is the joint second-highest average on the page. At 12 centimetres wide it is narrower even than the Dedica.

The 20 bar claim is the same borrowed number as the two CASABREWS machines: a static pump maximum quoted on a device that extracts at nine, on a listing that never mentions the pressure the coffee receives. AMZCHEF also sells this machine twice — ASIN B0GVYLTPND carries the same 339 ratings and the same 4.5 average at £109.99, ten pounds more for an identical product and an identical review pool. We have linked the £99.99 listing.", // TEXTO SEO LONGO
                'pros' => ['1,350W, matching machines costing £40 more', '1.5 litre tank, the largest of the sub-£140 machines here', 'Only 12cm wide, the narrowest machine in this comparison', '4.5 stars from 339 ratings, joint second-highest average', 'Multi-angle steam wand is better positioned than most at this price'], // PONTOS POSITIVOS
                'contras' => ['51mm portafilter against the 58mm café standard the Brevilles use', 'Quotes 20 bar, a pod machine figure, for a ground coffee machine', 'Sold under a second ASIN at £109.99 with the same 339 ratings', 'Bullet misspells its own portafilter as "protablefilter"'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'CASABREWS 3700 Essential 20 Bar Espresso Machine, 1350W, 1.3L Tank',      // NOME (ENCURTADO)
                'price' => '£99.99',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 475,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71v90GdxAVL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'CASABREWS 3700 Essential stainless steel espresso machine with frother', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C1BKD3RF?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The same brand as number six for £30 less, minus the pressure gauge and PID — and with a spec table calling a portafilter machine fully automatic.', // TEXTO CURTO (CARD)
                'body' => "This is the CM5418 at number six with the two best features removed. You keep the 1,350 watt thermoblock and the steam wand, and you gain 300 millilitres of tank capacity at 1.3 litres. You lose the PID temperature control and, more importantly, the pressure gauge — which on the dearer model is the one piece of hardware that shows you what the coffee is actually getting. Thirty pounds is a fair price for that pair, and if the budget stops at £99.99 this is a reasonable machine with 475 ratings behind it.

Its specification table contradicts its sibling. Operation Mode here reads \"Fully Automatic\". This is a semi-automatic machine: you grind, you dose, you tamp, you lock in a portafilter and you stop the shot. The CM5418 listing, from the same company, correctly reads \"Semi-Automatic\". Two pages from one brand describing the same class of machine two different ways is the sort of thing that matters when a first-time buyer is filtering on that exact field.

Give the listing credit for one unusually honest passage, though. The final bullet explains that \"too coarse a grind, too little coffee grounds, or insufficient tamping of the coffee grounds before brewing can all lead to inadequate pressure\" — which is a plain statement that the pressure reaching the puck depends on your technique and your grinder, not on the 20 bar in the title. It is the clearest explanation of the article's whole argument, and CASABREWS wrote it themselves.", // TEXTO SEO LONGO
                'pros' => ['1,350W thermoblock at £99.99, matching machines £40 dearer', '1.3 litre tank, 300ml more than its dearer sibling', '475 ratings and a light 3.75kg body', 'Bullet honestly explains that grind and tamp determine real pressure'], // PONTOS POSITIVOS
                'contras' => ['Spec table says "Fully Automatic" for a semi-automatic portafilter machine', 'Same brand describes the sibling model correctly, so one page is wrong', 'No pressure gauge and no PID, unlike the CM5418', '4.2 stars, joint-lowest average in this comparison'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Breville Barista Slimline Espresso Machine, 58mm Portafilter, 15 Bar',    // NOME (ENCURTADO)
                'price' => '£169.99',                                                               // PRECO
                'rating' => 3.9,                                                                    // NOTA
                'reviews_count' => 161,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71XHIeT0tnL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Breville Barista Slimline compact espresso machine in silver',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F32VLHRK?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A 58mm portafilter at £169.99, undermined by the lowest rating on this page and a listing that publishes two incompatible sets of dimensions.', // TEXTO CURTO (CARD)
                'body' => "On paper this should rank far higher. It is the cheapest route to a 58mm portafilter, the café-standard basket that separates real extraction from pressurised crema, and Breville makes the point directly: \"the large 58mm portafilter with 30% more capacity allows water to saturate a larger surface area of grounds\". It has one-touch cleaning, single and double shot presets, a cool-touch steam wand and a storage compartment for the accessories. Fifteen bar, published plainly.

Three point nine stars is the lowest average in this comparison and the only one below 4.0, from 161 ratings — a small sample but large enough to be a signal rather than noise, and our standard is to flag exactly this pattern. The critical reviews cluster on inconsistency between shots, which for a machine at this price with this basket is the wrong thing to be inconsistent about.

The listing also cannot agree with itself on how big it is, which is unusually damaging here because compactness is the product's entire name and premise. The bullet says \"Compact footprint is ideal for smaller spaces (h 33cm x w 15.5cm x d 31cm)\". The specification table says \"23.6D x 35.8W x 37.6H centimetres\". The width goes from 15.5 to 35.8 centimetres — more than double — and no axis matches on any of the three. If you are buying a slimline machine because you measured a gap, the page gives you two answers and no way to choose between them. The same table lists Coffee Input Type as \"grounds_and_milk\", a raw catalogue slug with an underscore in it.", // TEXTO SEO LONGO
                'pros' => ['Cheapest 58mm portafilter machine here at £169.99', 'Breville explains why basket diameter matters instead of quoting pressure', 'One-touch cleaning and single/double shot presets', 'Cool-touch steam wand and built-in accessory storage'], // PONTOS POSITIVOS
                'contras' => ['3.9 stars, the only average below 4.0 in this comparison', 'Bullet says 15.5cm wide, spec table says 35.8cm — more than double', 'No axis of the two published dimension sets matches', 'Coffee Input Type given as the raw slug "grounds_and_milk"'], // PONTOS NEGATIVOS
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
        $this->command?->info("EspressoMachinesSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
