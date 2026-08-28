<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class FoodDehydratorsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE DESIDRATADORES DE ALIMENTOS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA FILTRADA: /s?k=food+dehydrator&rh=p_36%3A3000-  (19 ASINS UNICOS)
        // CATEGORIA KITCHEN: COMISSAO DE 5% CONTRA 1-2% DE ELETRONICO. ESPEC PURA.
        //
        // ─── ACHADOS ───
        // 1. O ACHADO PRINCIPAL E DE SEGURANCA ALIMENTAR, NAO DE MARKETING. A ORIENTACAO
        //    DE FSA/USDA PARA CARNE SECA (JERKY) E LEVAR A CARNE A 71 °C PARA ELIMINAR
        //    PATOGENOS. CINCO DOS DEZ APARELHOS AQUI PARAM EM 70 °C — UM GRAU ABAIXO —
        //    E MESMO ASSIM ANUNCIAM CARNE: NEBULA (35-70, DIZ "from herbs to jerky"),
        //    AIGOSTAR (35-70), ANDREW JAMES (40-70, COM "Meat Dryer Machine" NO NOME),
        //    HOMCOM (40-70) E HOMETRONIX (35-70, COM "Meat Drying Machine" NO TITULO).
        //    CHEGAM AOS 71 °C: KWASYO (90), NUTRICHEF (82), SOUSVIDETOOLS (75), REEMIX
        //    (75). A MISTERCHEF NAO PUBLICA FAIXA DE TEMPERATURA NENHUMA.
        // 2. A ANDREW JAMES VENDE UM APARELHO DE CONVECCAO DE 550W COMO "FREEZE DRIER"
        //    NO PROPRIO NOME DO PRODUTO. LIOFILIZACAO EXIGE CAMARA DE VACUO E CONDENSADOR
        //    ABAIXO DE ZERO; LIOFILIZADOR DOMESTICO COMECA PERTO DE £2.000. UM
        //    DESIDRATADOR DE £45.04 NAO E UM LIOFILIZADOR. MESMA FAMILIA DO ACHADO DOS
        //    PROJETORES ("4K" QUE NAO E 4K NATIVO).
        // 3. A NUTRICHEF ESTA EM TRES ASINS COM O MESMO TITULO E O MESMO POOL DE 4.652
        //    AVALIACOES EM 4.4: B01DO0ZR7I (£46.99), B00VHLXAQC (£49.99) E B016VZYV6Q
        //    (£49.99). TRES PAGINAS, UM PRODUTO, £3 DE DIFERENCA.
        // 4. A AIGOSTAR ESTA EM DOIS ASINS COM O MESMO POOL DE 1.736 AVALIACOES
        //    (B0DM1CM2TX £59.99 E B0CXX77M36 £63.99) E OS DOIS DISCORDAM DA POTENCIA:
        //    O TITULO DE UM DIZ 240W E O BULLET DO OUTRO DIZ 380W — 58% DE DIFERENCA.
        //    A TABELA DE ESPECIFICACOES DO B0DM1CM2TX ESTA COMPLETAMENTE VAZIA.
        // 5. WATT POR BANDEJA VARIA 3,4x E NENHUM ANUNCIO PUBLICA A CONTA: HOMCOM
        //    245W/5 = 49 · HOMETRONIX 350W/7 = 50 · NUTRICHEF 250W/5 = 50 ·
        //    NEBULA E KWASYO 400W/6 = 67 · REEMIX 850W/10 = 85 · ANDREW JAMES 550W/6 = 92
        //    · SOUSVIDETOOLS 1000W/6 = 167. COMO SECAR E MOVER AR AQUECIDO ATRAVES DAS
        //    BANDEJAS, E ESSA RAZAO QUE DECIDE O RENDIMENTO, NAO A CONTAGEM DE BANDEJAS.
        // 6. A HOMETRONIX EMPILHA 7 BANDEJAS EM 350W, A RAZAO MAIS BAIXA DA LISTA JUNTO
        //    COM A HOMCOM, E VENDE ISSO COMO VANTAGEM ("7 TIER"). MAIS BANDEJA NA MESMA
        //    POTENCIA E MENOS CALOR POR BANDEJA, NAO MAIS CAPACIDADE UTIL.
        // 7. A HOMCOM E A UNICA QUE PUBLICA CARGA MAXIMA EM PESO (5 kg) E MEDIDA DE
        //    BANDEJA (3,5 x 31 x 23 cm). TODAS AS OUTRAS VENDEM "CAPACIDADE" SEM DIZER
        //    QUANTO CABE.
        // 8. A MISTERCHEF SE CHAMA "PROFESSIONAL" NO TITULO E NAO PUBLICA TEMPERATURA,
        //    TEMPORIZADOR NEM CARGA — SO POTENCIA E NUMERO DE BANDEJAS.
        // 9. A HOMETRONIX ABRE A LISTA DE BULLETS COM UMA ASPA ABERTA E NUNCA FECHADA.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: OS DOIS ASINS CLONES DA NUTRICHEF E O CLONE DA AIGOSTAR (MANTIDO SEMPRE
        // O MAIS BARATO DE CADA POOL); APARELHOS COM MENOS DE 40 AVALIACOES
        // (TRIUMPHKEY 23, OIYOCEMO 20, EMPERIAL 21, HOMCOM 6-TRAY 25).
        // DENTRO: NOTA DE 4.0 A 4.8, PRECO DE £34.99 A £149.99, DEZ MARCAS DIFERENTES.
        //
        // FOCUS KEYWORD: best food dehydrator
        // VARIACOES TRABALHADAS: food dehydrator machine / fruit dryer machine /
        // dehydrator for jerky / stainless steel food dehydrator / food dryer /
        // best dehydrator for fruit / meat dehydrator / dehydrator with timer /
        // 6 tray food dehydrator / food dehydrator with temperature control
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "kitchen", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-food-dehydrator',                                    // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Food Dehydrator 2026: 10 Ranked, and the 71C Problem', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Food Dehydrator 2026: Top 10 Ranked and Compared', // TITLE DA ABA/GOOGLE (54 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best food dehydrator machines on Amazon by temperature range, watts per tray and review history, from a £34.99 fruit dryer to a £149.99 10-tray.', // META DESCRIPTION (157 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best food dehydrator',                           // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "A food dehydrator is one of the few kitchen machines that genuinely pays for itself: it turns a glut of apples into a year of snacks and a cheap joint of beef into jerky that costs a fraction of the packet price. However, choosing one exposes a problem the listings would rather you did not notice. Food safety guidance for drying meat is to bring it to 71°C, and five of the ten machines in this comparison stop at 70°C — one degree short — while two of them carry the words meat dryer in the product name. We compared the best food dehydrator machines on Amazon in August 2026 on temperature range, watts per tray, review history and what each listing actually commits to in writing. Below is the ranking, including which models can legitimately make jerky, which are fruit dryers whatever the box says, and the £45 machine that describes itself as a freeze drier.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Choosing the best food dehydrator comes down to two numbers, and neither of them is the tray count. The first is maximum temperature: if you want to dry meat, you need a machine that reaches 71°C, which rules out half of this list regardless of what the marketing says. The second is watts divided by trays, because drying is the work of pushing heated air across a surface, and that ratio swings from 49 to 167 across these ten machines while no listing publishes it. By contrast, a seven-tier dehydrator running on 350W gives each tray less air than a five-tray unit on 245W, so more shelves can genuinely mean slower drying. Meanwhile, watch for the same food dryer sold under several product pages: NutriChef appears three times here and Aigostar twice, each set sharing one pool of reviews across different prices. If you only ever dry fruit and herbs, the cheap 70°C machines are perfectly good and you can stop reading at number five. If jerky is the reason you are buying a dehydrator at all, buy on the thermostat.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 14:20:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'NutriChef Food Dehydrator Machine, 5 Tray Electric Food Dryer, 82C',      // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£46.99',                                                                // PRECO (COLETADO EM 28/08/2026)
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 4652,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81XtVfGgOeL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best food dehydrator',                                               // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01DO0ZR7I?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best food dehydrator here on evidence and capability: 4,652 ratings, and one of only four machines that reaches the 71C needed to dry meat safely.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "The NutriChef wins this comparison on the two things that matter most. It has 4,652 ratings at 4.4 stars, the deepest review history of any food dehydrator machine in this price range, and it reaches 82°C, which puts it comfortably above the 71°C that food safety guidance sets for drying meat. Most of the cheaper machines here stop at 70°C, so if jerky is why you are buying a dehydrator, this is where the list effectively starts.

Everything else about it is deliberately simple. There is one dial, no menu system and no app, with 360 degree heat circulation moving air through five transparent trays so you can watch progress without opening the unit. NutriChef claims the process retains up to 97% of original nutrients, which is a marketing figure rather than a tested one, but the mechanism behind it — low heat over long periods rather than high heat quickly — is the correct approach.

One caution before you click. This exact machine is listed on Amazon three times: this ASIN at £46.99 and two others at £49.99, all with identical titles and all displaying the same 4,652 ratings and the same 4.4 average. It is one product with one review pool spread across three product pages, and the only difference is £3. We have linked the cheapest.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['4,652 ratings at 4.4, the deepest review history in this comparison', 'Reaches 82C, comfortably above the 71C line for drying meat', '360 degree heat circulation across five transparent trays', 'Single dial operation with no menus to learn', 'Cheapest of the three identical NutriChef listings'], // PONTOS POSITIVOS
                'contras' => ['Sold under three ASINs sharing one review pool at two different prices', 'Plastic trays rather than the stainless steel used further down this list', 'The 97% nutrient retention figure is marketing, not a published test'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Kwasyo Stainless Steel Food Dehydrator, 6 Tray, 30 to 90C, Keep Warm',    // NOME (ENCURTADO)
                'price' => '£81.59',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 320,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Dzy64zniL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Kwasyo stainless steel food dehydrator with six trays and LED control panel', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07M8QHX4X?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The widest temperature range in this comparison at 30 to 90C, which makes it the most capable meat dehydrator here without paying £128 for the commercial option.', // TEXTO CURTO (CARD)
                'body' => "Thirty to ninety degrees is the broadest thermostat range on this list, and it matters at both ends. The bottom of the range, 30°C, is low enough to dry herbs and delicate leaves without cooking off the volatile oils that give them flavour. The top, 90°C, is nineteen degrees clear of the 71°C food safety line for meat, which gives you genuine margin rather than the one-degree shortfall several rivals live with.

The build backs it up. Six removable stainless steel trays go in the dishwasher and will not hold onto the smell of last month's chilli the way plastic does, and the LED panel sets the timer anywhere from 0 to 24 hours in defined increments rather than by feel. A keep-warm function holds the finished batch at temperature, which sounds like a gimmick until you have started a run overnight and want it edible rather than reabsorbing moisture by breakfast.

The catch is evidence and price. Three hundred and twenty ratings is a thin sample next to the NutriChef at 4,652, and £81.59 is nearly double. Its 400W across six trays works out at 67 watts per tray, which is mid-table here, so the wide temperature range is what you are paying for rather than raw throughput.", // TEXTO SEO LONGO
                'pros' => ['30 to 90C, the widest temperature range in this comparison', 'Clears the 71C meat line by nineteen degrees', 'Six dishwasher-safe stainless steel trays that do not retain odours', 'Timer settable from 0 to 24 hours from an LED panel', 'Keep-warm function holds a finished batch at temperature'], // PONTOS POSITIVOS
                'contras' => ['Only 320 ratings, a thin sample beside the leaders here', 'Costs £81.59, nearly double the NutriChef', '67 watts per tray is mid-table, so throughput is unremarkable'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'SousVideTools Hendi 6-Tray Stainless Steel Food Dehydrator, 1000W',      // NOME (ENCURTADO)
                'price' => '£128.70',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 454,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61PaItpnesL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'SousVideTools Hendi six tray stainless steel food dehydrator with touch panel', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07MTQGLJ7?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest rated machine with a real sample at 4.6 from 454 ratings, and at 167 watts per tray it has more than three times the drying power per shelf of the budget units.', // TEXTO CURTO (CARD)
                'body' => "This is the semi-commercial option, and the specification shows it. One thousand watts spread across six stainless steel trays gives 167 watts per tray, which is more than three times what the cheapest machines here manage and the single biggest throughput advantage in this comparison. If you dry in volume — a whole tree's worth of apples, or batches of jerky rather than a snack — this is the machine that finishes while the others are still going.

The thermostat runs 35°C to 75°C in five degree increments with a timer to 24 hours, so it clears the 71°C meat line, though by a narrower margin than the Kwasyo. At 4.6 stars from 454 ratings it holds the best average of any machine here with a sample worth trusting, and Hendi is a catering brand rather than an Amazon marketplace name, which shows in the stainless construction throughout.

Two things to weigh. It is the second most expensive machine on this list at £128.70, and it is physically large at 45 x 32 x 31cm, so it is a cupboard appliance you get out rather than something that lives on a worktop. Note too that the listing describes it as suitable for a business kitchen, and the 1000W draw is real: run it for a long batch and you will notice it on the meter in a way the 245W units simply do not register.", // TEXTO SEO LONGO
                'pros' => ['4.6 stars from 454 ratings, the best average with a credible sample', '167 watts per tray, over three times the budget machines here', 'Reaches 75C, clearing the 71C line for drying meat', 'Thermostat adjusts in five degree increments rather than presets', 'Catering-grade stainless steel construction throughout'], // PONTOS POSITIVOS
                'contras' => ['Costs £128.70, the second most expensive machine in this ranking', 'Large 45 x 32 x 31cm footprint needs cupboard storage', '1000W draw is noticeable on long batches'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Nebula Food Dehydrator 400W with 6 Stainless Steel Trays, 48H Timer',    // NOME (ENCURTADO)
                'price' => '£89.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 735,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81wAeCdyv5L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Nebula 400W food dehydrator with six stainless steel trays and touch display', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BGSFQ766?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'A well-built stainless steel fruit dryer machine with a 48 hour timer and 735 ratings, but its 70C ceiling means it cannot dry meat to the safe temperature.', // TEXTO CURTO (CARD)
                'body' => "Judged as a fruit and herb dryer, the Nebula is very good. Six stainless steel trays go in the dishwasher, do not absorb odours and will outlast plastic; the touch panel sets temperature precisely and the timer runs to 48 hours, which is double what most rivals here offer and genuinely useful for dense items like tomato halves that need a long, low run. Seven hundred and thirty-five ratings at 4.4 is a solid, trustworthy sample.

The problem is the ceiling. Nebula publishes its range as 35°C to 70°C, and its own listing suggests using it for everything \"from herbs to jerky\". Jerky is the one thing on that list it cannot do to the recommended standard, because guidance for drying meat is to reach 71°C and this machine tops out one degree below. Nothing about the build is at fault — the thermostat simply does not go there.

At £89.99 it is also priced against the Kwasyo, which costs £8 less, is built from the same stainless steel and reaches 90°C. Unless the 48 hour timer specifically matters to you, that is a difficult comparison for the Nebula to win. Buy it if you dry fruit, vegetables, herbs and mushrooms, and buy something else if the plan involves meat.", // TEXTO SEO LONGO
                'pros' => ['Six dishwasher-safe stainless steel trays', '48 hour timer, double what most rivals here offer', '735 ratings at 4.4 from a credible sample', 'Precise digital thermostat via touch panel', 'BPA-free trays that do not retain flavours between batches'], // PONTOS POSITIVOS
                'contras' => ['Stops at 70C, one degree below the 71C guidance for drying meat', 'Listing suggests jerky despite that ceiling', 'Costs £8 more than a stainless rival that reaches 90C'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Aigostar 5 Tier Food Dehydrator with Fan Mode and LED Display',          // NOME (ENCURTADO)
                'price' => '£59.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 1736,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71SODAHaHxL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Aigostar five tier food dehydrator with fan mode and LED display panel', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DM1CM2TX?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only machine here with a heat-free fan mode, and the second deepest review history, but its listing cannot decide whether it draws 240W or 380W.', // TEXTO CURTO (CARD)
                'body' => "The fan mode is a real feature and nobody else in this comparison has it. It runs the circulation fan with the heating element off, which is how you handle anything that would be damaged by warmth — delicate herbs, flowers for drying, or finishing a batch that needs air rather than heat. Combined with a 35°C to 70°C thermostat on an LED panel and a stackable tray system that lets you vary the gap between shelves for tall items, it is a thoughtfully designed food dryer.

It carries 1,736 ratings at 4.3, the second deepest sample here, which is why it sits at number five despite what follows. Because the listing itself is a mess. Aigostar sells this machine under two ASINs, this one at £59.99 and another at £63.99, both showing the identical 1,736 ratings and 4.3 average. Worse, the two pages disagree on the specification: one title advertises 240W while this page's own bullet claims it \"harnesses 380W of drying power\". That is a 58% gap on the single number that determines how fast it dries.

The specification table on this ASIN, meanwhile, is entirely empty — no wattage, no dimensions, no material, nothing. For a machine with nearly two thousand ratings, that is a remarkable amount of missing information. And at 70°C it joins the group that cannot take meat to the safe temperature.", // TEXTO SEO LONGO
                'pros' => ['Heat-free fan mode, unique in this comparison', '1,736 ratings at 4.3, the second deepest sample here', 'Stackable trays with variable spacing for tall items', 'LED panel with precise temperature and timer control', 'Cheaper of the two identical Aigostar listings'], // PONTOS POSITIVOS
                'contras' => ['Listing claims 380W while the sibling ASIN advertises 240W', 'Specification table on this page is completely empty', 'Sold under two ASINs sharing one pool of 1,736 ratings', 'Stops at 70C, below the 71C guidance for drying meat'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'MisterChef Professional Food Dehydrator, 250W, 5 Trays, 2 Year Warranty', // NOME (ENCURTADO)
                'price' => '£34.99',                                                                // PRECO
                'rating' => 4.1,                                                                    // NOTA
                'reviews_count' => 1004,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/714Wwhx12UL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'MisterChef 250W food dehydrator with five transparent adjustable trays', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07HB6PZ1Z?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Joint cheapest food dryer here at £34.99 with a two year warranty and 1,004 ratings, though a listing calling itself professional publishes no temperature range at all.', // TEXTO CURTO (CARD)
                'body' => "As a way into dehydrating for under £35, this works. Five adjustable transparent trays let you see progress without lifting the lid, the trays space apart for taller items, and MisterChef backs the whole thing with a free two year warranty, which is longer cover than most of the machines above it in this ranking offer. With 1,004 ratings behind it there is enough history to know what you are getting.

What you are not getting is information. The listing calls the machine \"Professional\" in its own title and then publishes no temperature range, no timer specification and no maximum load. The specification table gives you a brand, a colour, 250 watts and the outside dimensions, and that is the entire technical description of a food dehydrator. You cannot tell from the page whether it will dry meat safely, because the page does not say how hot it gets.

The 4.1 average from a thousand ratings is the second lowest here, and at 250W across five trays it lands at 50 watts per tray, joint bottom of this comparison alongside the HOMCOM and the HomeTronix. Treat it as a fruit and herb dryer bought on price and warranty, judge it on the rating rather than the word professional, and do not plan jerky around it.", // TEXTO SEO LONGO
                'pros' => ['Joint cheapest machine in this comparison at £34.99', 'Free two year warranty, longer than most rivals here offer', '1,004 ratings give a usable sample at this price', 'Adjustable transparent trays let you watch progress and space tall items'], // PONTOS POSITIVOS
                'contras' => ['Publishes no temperature range, timer spec or maximum load', 'Calls itself Professional while documenting less than any rival here', '4.1 average is the second lowest in this ranking', '50 watts per tray is joint lowest here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Andrew James Digital Food Dehydrator, 550W, 6 Trays, 48H Timer',         // NOME (ENCURTADO)
                'price' => '£45.04',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 430,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81Czy2MzVmS._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Andrew James digital food dehydrator with six stackable trays and digital thermostat', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08QCX115N?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Good value at £45.04 for six trays and 92 watts per tray, but it is sold as a Freeze Drier and a Meat Dryer, and it is neither.', // TEXTO CURTO (CARD)
                'body' => "On price and power this is a reasonable buy. Five hundred and fifty watts across six stackable trays is 92 watts per tray, the second highest ratio in this comparison, and the trays adjust their spacing for taller items. A digital thermostat and a 48 hour timer put it ahead of the dial-operated budget machines, and Andrew James quotes running costs of around three pence an hour, which is a refreshingly concrete claim in a category full of vague ones. Four hundred and thirty ratings at 4.3 is a respectable sample.

The listing, however, makes two claims the machine cannot support. The product name includes the words \"Freeze Drier\". Freeze drying is a completely different process that requires a vacuum chamber and a condenser running below freezing to sublimate ice directly to vapour; domestic freeze driers start at roughly £2,000. This is a 550W convection dehydrator. It blows warm air. It is not a freeze drier at any price, let alone £45.04.

The name also promises a \"Meat Dryer Machine\", and the thermostat runs 40°C to 70°C. That is one degree short of the 71°C that food safety guidance sets for drying meat, so the second claim in the product name is undermined by the third specification in its own bullet list. As a fruit dryer at £45 with 92 watts per tray it is genuinely decent value, which is why it is still on this list — but buy it for what it is.", // TEXTO SEO LONGO
                'pros' => ['92 watts per tray, the second highest ratio in this comparison', 'Six stackable trays with adjustable spacing', 'Digital thermostat and 48 hour timer at a budget price', 'Publishes a concrete running cost of about 3p per hour', 'Costs £45.04, cheaper than every stainless steel rival here'], // PONTOS POSITIVOS
                'contras' => ['Sold as a Freeze Drier, which requires a vacuum chamber this machine does not have', 'Named a Meat Dryer Machine but stops at 70C, below the 71C guidance', 'Plastic trays rather than stainless at this price point'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'HOMCOM 5 Tier Food Dehydrator, 245W, Adjustable Temp and Timer',         // NOME (ENCURTADO)
                'price' => '£35.09',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 248,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71bPhxx2N6L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'HOMCOM five tier food dehydrator with adjustable temperature and timer', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B6TP43FD?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing in this comparison that tells you how much food actually fits: 5kg maximum load and a stated tray size, on the lowest power draw here.', // TEXTO CURTO (CARD)
                'body' => "Every other manufacturer in this comparison sells you a tray count and lets you guess what that means in food. HOMCOM publishes a maximum load of 5kg and gives the tray dimensions as 3.5 x 31 x 23cm, so you can work out before buying whether a batch of apples or a joint of beef will actually fit. It is a small piece of honesty and it is unique on this page.

The rest is a competent budget machine. Five stainless steel tiers, a temperature control running 40°C to 70°C with a timer, no assembly required out of the box, and a compact 25 x 32 x 26cm footprint that will live on a worktop rather than in a cupboard. At £35.09 with 248 ratings at 4.2 it is priced against the MisterChef and documents itself far better.

Two limits. At 245 watts it has the lowest power draw in this comparison, and across five trays that is 49 watts per tray, the lowest ratio here, so it will be slower than anything above it. And the 70°C ceiling puts it in the group that cannot dry meat to the recommended temperature, which is worth knowing given the 5kg load figure will tempt you towards big batches of something more ambitious than apple rings.", // TEXTO SEO LONGO
                'pros' => ['The only listing here that publishes a maximum load, at 5kg', 'Also publishes individual tray dimensions', 'Five stainless steel tiers at a £35.09 price point', 'Compact 25 x 32 x 26cm footprint suits a worktop', 'No assembly required out of the box'], // PONTOS POSITIVOS
                'contras' => ['49 watts per tray, the lowest ratio in this comparison', 'Stops at 70C, below the 71C guidance for drying meat', 'Only 248 ratings, a modest sample'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Reemix Food Dehydrator, 850W Rotating Dryer with 10 Stainless Trays',    // NOME (ENCURTADO)
                'price' => '£149.99',                                                               // PRECO
                'rating' => 4.8,                                                                    // NOTA
                'reviews_count' => 46,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/812F+Sf3omL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Reemix 850W rotating food dehydrator with ten stainless steel trays and LCD screen', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GC67NTJL?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most capable machine here on paper, with rotating trays and 850W across ten shelves, but 46 ratings is far too thin a sample for £149.99.', // TEXTO CURTO (CARD)
                'body' => "Rotating trays are the one genuine mechanical innovation in this category. Every other dehydrator here relies on a fan to push air evenly across static shelves, which never quite works — the tray nearest the element always finishes first and you end up rotating them by hand halfway through. The Reemix turns the stack instead, which is how commercial units solve the problem, and it does it across ten stainless steel trays on 850 watts.

The specification is the strongest on this page by a distance: 35°C to 75°C so it clears the 71°C meat line, a 48 hour timer, nine automatic presets, an LCD touch screen, an internal light so you can check progress without opening it, and a quoted 30dB motor. Eighty-five watts per tray puts it in the upper half despite spreading power across ten shelves rather than five or six.

The reason it sits at number nine rather than number one is evidence. Forty-six ratings is the thinnest sample in this comparison by a wide margin, and a 4.8 average across 46 buyers can still move a long way. At £149.99 it is also the most expensive machine here, £21 above the catering-grade Hendi that has ten times the review history. If you want ten trays and rotation and you are comfortable being an early buyer, the specification genuinely justifies the price. If you want proof, buy the machine at number three instead.", // TEXTO SEO LONGO
                'pros' => ['Rotating trays solve the uneven drying that static shelves suffer from', 'Ten stainless steel trays, the largest capacity in this comparison', '35 to 75C range clears the 71C line for drying meat', 'Nine presets, LCD touch screen, internal light and 48 hour timer', '85 watts per tray despite spreading power across ten shelves'], // PONTOS POSITIVOS
                'contras' => ['Only 46 ratings, by far the thinnest sample in this ranking', 'Most expensive machine here at £149.99', 'Costs £21 more than a catering brand with ten times the review history'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'HomeTronix Food Dehydrator, 7 Tier Fruit Dryer, 350W',                   // NOME (ENCURTADO)
                'price' => '£34.99',                                                                // PRECO
                'rating' => 4.0,                                                                    // NOTA
                'reviews_count' => 160,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61u93FgYnLL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'HomeTronix seven tier food dehydrator with transparent stackable trays', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CLQLPNSY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Seven tiers for £34.99 sounds like the best value here until you divide the 350 watts by the tray count and get the joint lowest power per shelf in the comparison.', // TEXTO CURTO (CARD)
                'body' => "Seven tiers at £34.99 is the headline, and it is the clearest example on this page of why tray count is the wrong thing to shop on. Drying is the work of moving heated air across a surface, so what determines how fast a machine works is power divided by shelves. HomeTronix spreads 350 watts across seven tiers, which is 50 watts per tray — joint lowest in this comparison, level with machines that have two fewer shelves. Loading all seven does not give you more capacity so much as a slower run.

There is a competent fruit dryer underneath. The transparent housing blocks light while letting you monitor progress, the thermostat runs 35°C to 70°C, and the stacking system means you can run fewer tiers when you have less to dry, which is the sensible way to use it. At 4.0 from 160 ratings it is the lowest rating in this ranking, and with that sample size it is a genuine signal rather than statistical noise.

The listing has the roughest edges here too. Its About This Item section opens with a quotation mark that is never closed, the copy is written in the promotional voice of a press release rather than a specification, and the product title advertises a \"Meat Drying Machine\" while the thermostat stops at 70°C — the same one-degree shortfall that disqualifies four other machines on this page from drying meat to the recommended standard.", // TEXTO SEO LONGO
                'pros' => ['Seven tiers, the second highest tray count here, for £34.99', 'Transparent housing blocks light while letting you check progress', 'Stackable system lets you run fewer tiers for smaller batches', 'Joint cheapest machine in this comparison'], // PONTOS POSITIVOS
                'contras' => ['50 watts per tray, joint lowest here despite having seven shelves', '4.0 from 160 ratings, the lowest rating in this ranking', 'Titled a Meat Drying Machine but stops at 70C', 'Listing copy opens with an unclosed quotation mark'], // PONTOS NEGATIVOS
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
        $this->command?->info("FoodDehydratorsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
