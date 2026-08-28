<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class CoffeeGrindersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE MOEDORES DE CAFE DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA FILTRADA: /s?k=burr+coffee+grinder&rh=p_36%3A3000-  (22 ASINS UNICOS)
        // CATEGORIA KITCHEN: 5% DE COMISSAO.
        //
        // ─── ACHADOS ───
        // 1. A CORRIDA DE "NIVEIS DE MOAGEM" DIVIDE SEMPRE A MESMA COISA. OS NIVEIS SAO
        //    ENCAIXES NUM COLAR QUE APROXIMA OU AFASTA AS DUAS MOS — E O CURSO TOTAL E
        //    FIXO PELA GEOMETRIA DA MO. IR DE 17 PARA 75 NIVEIS NAO AMPLIA A FAIXA,
        //    APENAS PARTE A MESMA FAIXA EM PEDACOS MENORES. ABAIXO DE CERTO TAMANHO DE
        //    PASSO, A DIFERENCA POR CLIQUE FICA MENOR QUE A PROPRIA REPETIBILIDADE DO
        //    APARELHO (FOLGA DO EIXO, RETENCAO, VARIACAO DO GRAO). A ESCALA COLETADA:
        //      KRUPS EXPERT / MOLINO ....... 17 NIVEIS
        //      SHARDOR ..................... 25 NIVEIS
        //      WANCLE / OUTIN FINO ......... 28 NIVEIS
        //      AMAZON BASICS ............... 30 NIVEIS
        //      DUALIT ...................... 35 NIVEIS
        //      OXO BREW (MANUAL) ........... 40 NIVEIS
        //      AOBOSI / AMZCHEF ............ 45 E 48 NIVEIS
        //      SHARDOR ..................... 51 NIVEIS
        //      AAOBOSI / SPECTOR ........... 60 NIVEIS
        //      AMZCHEF ..................... 75 NIVEIS
        // 2. A CONTAGEM DE NIVEIS CORRE AO CONTRARIO DA QUALIDADE DE CONSTRUCAO. A
        //    KRUPS, COM 17 NIVEIS, DECLARA "Material: Stainless Steel". A AMZCHEF, COM
        //    75, DECLARA "Material: Plastic". A DUALIT, COM 35 A £98.99, TAMBEM E
        //    PLASTICO. QUEM TEM MAIS NUMERO NO TITULO TEM MENOS METAL NA CAIXA.
        // 3. A KRUPS E A UNICA QUE EXPLICA O MECANISMO EM VEZ DE SO CONTAR: "17 settings
        //    adjust the distance between the two burrs". E EXATAMENTE ISSO QUE O AJUSTE
        //    FAZ, E DIZER ISSO DESMONTA A PROPRIA CORRIDA DE NUMEROS.
        // 4. AS DUAS UNICAS ESPECIFICACOES DE HARDWARE DE VERDADE APARECEM UMA VEZ CADA:
        //    A SHARDOR PUBLICA O DIAMETRO DA MO ("40-millimeter conical burrs") E A
        //    OUTIN FINO PUBLICA O GRAU DO ACO E A DUREZA ("420 stainless steel, HRC
        //    55-60"). DIAMETRO DECIDE VELOCIDADE E UNIFORMIDADE; DUREZA DECIDE QUANTO
        //    TEMPO A MO SEGURA O FIO. NENHUM DOS OUTROS OITO PUBLICA QUALQUER DOS DOIS.
        // 5. TIPO DE MO (PLANA x CONICA) MUDA O RESULTADO E QUASE NINGUEM DIZ QUAL TEM.
        //    DECLARAM PLANA: MOLINO E AMAZON BASICS. DECLARA CONICA: SHARDOR.
        //    OS OUTROS SETE SO ESCREVEM "BURR".
        // 6. A DE'LONGHI KG79, COM 8.800 AVALIACOES, TEM HTML CRU VAZANDO NOS BULLETS:
        //    O TEXTO EXIBIDO E LITERALMENTE "<li>Professional burr grinder</li>" E
        //    "<li>120 g coffee beans capacity</li>". ALGUEM COLOU MARCACAO NUM CAMPO
        //    QUE JA ENVOLVE EM <li>. E ELA NAO PUBLICA CONTAGEM DE NIVEIS NENHUMA.
        // 7. BUSCA POLUIDA: A SAGE BARISTA EXPRESS (£629.95) E A AIRMSEN (£209.99) SAO
        //    MAQUINAS DE ESPRESSO BEAN-TO-CUP, NAO MOEDORES, E APARECEM NA PRIMEIRA
        //    PAGINA DE "burr coffee grinder".
        // 8. A AMZCHEF DE 75 NIVEIS DECLARA RUIDO DE "60-75dB" — HONESTO, PORQUE MOEDOR
        //    E BARULHENTO MESMO. VALE O CONTRASTE COM AS CATEGORIAS ONDE 20 dB E
        //    ALEGADO PARA APARELHO COM BOMBA.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: MAQUINAS BEAN-TO-CUP; MOEDORES COM MENOS DE 70 AVALIACOES; O TERCEIRO
        // ASIN DA SHARDOR E DA AMZCHEF ALEM DOS DOIS MANTIDOS (QUE FORAM ESCOLHIDOS
        // JUSTAMENTE POR ESTAREM NAS PONTAS DA ESCALA DE NIVEIS).
        // DENTRO: NOTA DE 3.9 A 4.5, PRECO DE £34.19 A £179.99, OITO MARCAS.
        //
        // FOCUS KEYWORD: best burr coffee grinder
        // VARIACOES TRABALHADAS: electric coffee grinder / conical burr grinder /
        // coffee bean grinder / coffee grinder for espresso / flat burr grinder /
        // best coffee grinder for french press / adjustable coffee grinder /
        // stainless steel burr grinder / manual coffee grinder
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "kitchen", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-burr-coffee-grinder',                                // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Burr Coffee Grinder 2026: 10 Ranked, and Why 75 Settings Is Not Better Than 17', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Burr Coffee Grinder 2026: Top 10 Ranked',       // TITLE DA ABA/GOOGLE (46 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best burr coffee grinder options on Amazon by burr type, size and build rather than settings count, comparing grinders from £34 to £180.', // META DESCRIPTION (150 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best burr coffee grinder',                       // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Grind settings are the headline number in this category and they are close to meaningless. The settings on a burr grinder are detents on a collar that moves one burr nearer or further from the other, and the total distance that collar travels is fixed by the geometry of the burrs. Going from 17 settings to 75 does not widen the range from espresso to French press — it chops the identical range into smaller pieces. Past a certain point each click changes the gap by less than the machine's own mechanical repeatability, which means the difference between click 62 and click 63 is smaller than the difference between two runs on the same setting. Tellingly, the grinder in this comparison with 17 settings has a stainless steel body and the one with 75 is plastic. Below we rank the best burr coffee grinder options on Amazon in August 2026 on the things that genuinely change what lands in the basket: burr type, burr size, burr material and build.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "The best burr coffee grinder for you is chosen on three specifications, and the settings count is not among them. First, burr type: flat burrs produce a tighter particle distribution and suit filter and espresso, conical burrs run cooler and retain less, and only three of the ten listings here say which they fit. Second, burr diameter, because a larger burr grinds faster with less heat and more consistency — one listing in this entire comparison publishes it. Third, the body material, which is the honest proxy for everything you cannot see: a stainless steel grinder with 17 settings is a better machine than a plastic one with 75, and the pricing in this category quietly agrees. Meanwhile, if you are grinding for a cafetière or a drip machine, almost any burr grinder here will serve you and the cheapest sensible one is the right answer. If you are grinding for espresso, the step size near the fine end is what matters — but you will find that out from the burr size and build, not from a number on the front of the box.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 15:35:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Molino Electric Coffee Grinder, Flat Burr, 17 Grind Settings, Steel',     // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£37.99',                                                                // PRECO (COLETADO EM 28/08/2026)
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 5280,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/616VaBfirML._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best burr coffee grinder',                                           // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00R7HKAWC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best burr coffee grinder here on the specs that matter: a flat burr, a steel body and 17 settings, for £37.99 with 5,280 ratings behind it.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "This is the grinder that makes the argument for us. Molino states a professional flat grinding disc, 17 grind settings and a capacity dial for 2 to 12 cups, and the specification table gives the material as Steel. Thirty-seven pounds ninety-nine, 5,280 ratings, 4.4 stars.

Flat burrs are the specification worth understanding. They shear beans between two parallel rings rather than crushing them through a cone, which produces a tighter particle size distribution — more grounds at the size you asked for and fewer fines and boulders. That is the thing that actually changes how the coffee tastes, and only three of the ten listings in this comparison bother to say which type they fit.

Seventeen settings sounds meagre next to the seventy-five on the AMZCHEF further down this page, and that is the point of ranking it first. Both machines move one burr across a fixed range; this one divides that range into seventeen usefully distinct steps and puts the money into a metal body and a flat burr instead. For cafetière, drip and moka pot it is all the adjustment anyone needs. If you pull espresso and want finer control at the fine end, look at the SHARDOR at number six, which publishes its burr diameter.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Flat burr, which gives a tighter particle distribution than a cone', 'Specification table gives the material as Steel, not plastic', '5,280 ratings at 4.4 for £37.99', 'Capacity dial for 2 to 12 cups', 'One of only three listings here that states its burr type'], // PONTOS POSITIVOS
                'contras' => ['17 settings is coarse stepping if you are dialling in espresso', 'Does not publish burr diameter or motor wattage', 'No burr material stated, only the body'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => "De'Longhi KG79 Burr Coffee Grinder, 120g Hopper, Cup Selector",           // NOME (ENCURTADO)
                'price' => '£51.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 8800,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71ZEzseTFbL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => "De'Longhi KG79 burr coffee grinder in black with cup selector dial",  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B002OHDBQC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most reviewed grinder in this comparison at 8,800 ratings, from a name people trust, on a listing that is literally displaying its own HTML.', // TEXTO CURTO (CARD)
                'body' => "Eight thousand eight hundred ratings at 4.4 stars makes this the safest purchase on the page by weight of evidence, and De'Longhi is a brand most British kitchens already contain. The design is sensible: a 120g bean hopper, separate dials for cup count and grind coarseness, and soft-touch controls, which means you set how many cups you want and walk away rather than holding a button and guessing.

It is a genuine burr grinder rather than a blade one, which at £51.99 is the main thing to establish. Blade grinders chop at random and produce dust and chunks in the same batch; burr grinders crush to a set gap. Everything else in this article is about degrees of burr quality, and this clears the bar.

The listing itself is a mess in a specific and funny way. Its bullet points display raw markup as text: the first bullet reads, literally, less-than li greater-than Professional burr grinder less-than slash li greater-than, and the second does the same around 120 g coffee beans capacity. Somebody pasted HTML into a field that already wraps each line in a list tag. It is cosmetic, but on the most reviewed grinder in the category it has apparently been there long enough for nobody to care. More substantively, the listing never states how many grind settings the machine has, nor the burr type, nor the material of anything except the plastic body.", // TEXTO SEO LONGO
                'pros' => ['8,800 ratings at 4.4, the deepest evidence in this comparison', 'Separate dials for cup count and coarseness, so it runs unattended', '120g bean hopper', "De'Longhi brand support and easy parts availability"], // PONTOS POSITIVOS
                'contras' => ['Bullet points display raw HTML markup as visible text', 'Never states the grind settings count, burr type or burr material', 'Specification table gives the material as Plastic', 'Costs £14 more than the flat-burr Molino'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Krups Expert Electric Burr Coffee Grinder, 17 Settings, 225g Hopper',     // NOME (ENCURTADO)
                'price' => '£54.00',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 3047,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71kjwSb1OyL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Krups Expert electric burr coffee grinder in stainless steel',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0002H2IOM?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing in the comparison that explains what a grind setting actually is — and, not coincidentally, the one with the fewest of them and a stainless steel body.', // TEXTO CURTO (CARD)
                'body' => "Read the first bullet: 17 settings adjust the distance between the two burrs for a fine or coarse result. That single sentence is the most useful thing written on any of the ten listings we read, because it tells you what the number means. Every other manufacturer prints a settings count and lets you infer that more is better; Krups explains the mechanism, and once you understand it the arms race stops making sense.

The build matches the honesty. The specification table gives the material as Stainless Steel, where the 75-setting AMZCHEF and the £98.99 Dualit both say Plastic. The hopper holds 225g, the largest here, and the cup selector runs from 2 to 12 with automatic shut-off when the dose is done.

The 4.2 average across 3,047 ratings is the lowest of the three grinders above it, and worth weighing. Krups grinders of this generation have a reputation for being loud and for static making grounds cling to the container — both real, both common to the whole category, and neither fatal. At £54 you are paying a £16 premium over the Molino for a metal body, a bigger hopper and a manufacturer willing to tell you how its own product works.", // TEXTO SEO LONGO
                'pros' => ['The only listing that explains what a grind setting physically adjusts', 'Stainless steel body where rivals at higher prices use plastic', '225g bean hopper, the largest in this comparison', 'Automatic shut-off on the selected cup count', '3,047 ratings'], // PONTOS POSITIVOS
                'contras' => ['4.2 average, the lowest of the top three here', 'Known for being loud and for static cling in the grounds container', 'Does not state burr type or diameter', 'Costs £16 more than the Molino'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Wancle Electric Burr Coffee Grinder, 28 Grind Settings, 2-12 Cups',       // NOME (ENCURTADO)
                'price' => '£36.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 3139,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71SREaAIifL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Wancle electric burr coffee grinder with 28 grind settings',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CP5GGQXW?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest electric burr grinder here with a real review history: £36.99, 3,139 ratings and on-demand control for 2 to 12 cups.', // TEXTO CURTO (CARD)
                'body' => "Thirty-six pounds ninety-nine is the entry price for a competent electric burr grinder, and Wancle has 3,139 ratings at 4.4 stars saying it clears that bar. Twenty-eight settings, on-demand grinding for 2 to 12 cups, and a low-noise claim that the company sensibly does not attach a decibel figure to.

For anyone moving off pre-ground coffee or off a blade grinder, this is the sensible first purchase and the difference in the cup will be larger than any upgrade from here. Consistent particle size is what changes extraction, and any burr grinder gives you that; the refinements above it are refinements.

The specification table gives the material as Plastic, and the listing does not say whether the burrs are flat or conical, what they are made of, or how large they are. That is the norm at this price rather than a specific failing, but it does mean you are buying on the review count. Twenty-eight settings sits mid-scale in this comparison, which by the argument of this article makes it neither better nor worse than the 17 on the Molino — the same range, more finely chopped, on a plastic body instead of a steel one.", // TEXTO SEO LONGO
                'pros' => ['Cheapest electric burr grinder here with a substantial review history', '3,139 ratings at 4.4', 'On-demand control for 2 to 12 cups', 'Does not attach a fake decibel figure to its quiet claim'], // PONTOS POSITIVOS
                'contras' => ['Plastic body', 'Does not state burr type, material or diameter', '28 settings divide the same range as the Molino 17, no more'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'AMZCHEF Burr Coffee Grinder, 48 Settings, Stainless Steel, LCD Touch',    // NOME (ENCURTADO)
                'price' => '£89.70',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 961,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71ikCZNdHWL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'AMZCHEF burr coffee grinder with LCD touch panel and portafilter holder', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D25LW82T?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The espresso-focused pick: stainless steel, an LCD dosing panel and a portafilter holder in the box, so it grinds straight into the basket.', // TEXTO CURTO (CARD)
                'body' => "This is the machine on the page aimed squarely at someone with an espresso machine. It ships with a portafilter holder and a pad, so the grinder doses directly into the basket rather than into a cup you then tip and lose half of, and an LCD touch panel sets the dose by time. The specification table gives the material as Stainless Steel.

Grinding into the portafilter matters more than it sounds. Every transfer loses grounds and adds mess, and a grinder that cannot hold a portafilter turns a two-minute routine into a five-minute one with a chore at the end. Among the sub-£100 grinders here, this is the only one that solves it.

Forty-eight settings is a lot, and by the argument of this article most of them are between other settings rather than beyond them. But the fine end is where espresso lives, and finer stepping genuinely is more useful there than it is for a cafetière — so of all the high-count grinders here, this is the one where the count is at least pointed at a real use. At £89.70 with 961 ratings at 4.4, it is well evidenced for the price without being the deepest sample here.", // TEXTO SEO LONGO
                'pros' => ['Portafilter holder included, so it doses straight into the basket', 'Stainless steel body at under £100', 'LCD touch panel for timed dosing', '961 ratings at 4.4', 'Fine stepping is genuinely more useful for espresso than for filter'], // PONTOS POSITIVOS
                'contras' => ['Costs £89.70, more than double the Molino', 'Does not publish burr type or diameter', '48 settings still divide the same fixed range'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'SHARDOR Conical Burr Coffee Grinder, 40mm Stainless Burrs, 51 Settings',  // NOME (ENCURTADO)
                'price' => '£67.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 161,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71SQjUCJj-L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'SHARDOR conical burr coffee grinder with touch screen and 40mm burrs', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C9HMXR1J?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only grinder in this comparison that publishes its burr diameter: 40mm stainless steel conical burrs. That number tells you more than fifty-one settings do.', // TEXTO CURTO (CARD)
                'body' => "Forty millimetres. That is the number to take away from this listing, and SHARDOR is the only manufacturer in this comparison that prints it. Burr diameter is the specification that decides how a grinder actually behaves: a larger burr passes beans through with fewer rotations, which means less heat into the grounds, less time in the chamber and a more consistent particle size. Forty millimetres is a proper mid-range burr rather than the small ones typically fitted at this price.

It also tells you the burrs are stainless steel and that they are conical, which is two more facts than seven of the ten listings here provide. Conical burrs retain fewer grounds between doses and run quieter than flat ones, at the cost of a slightly wider particle spread. There is a touch screen for dose control.

The reservation is evidence. One hundred and sixty-one ratings at 4.3 is the second thinnest sample in this comparison, so the specification is doing the persuading rather than the review history. At £67.99 it sits between the budget machines and the AMZCHEF espresso setup. If you want the most burr for your money and are comfortable buying on specification rather than crowd, this is the one. The 51 settings, as ever, divide the same span the 17-setting Krups divides — ignore them and buy it for the 40mm.", // TEXTO SEO LONGO
                'pros' => ['The only listing here that publishes burr diameter, at 40mm', 'States that the burrs are stainless steel and conical', 'Conical burrs retain fewer grounds between doses', 'Touch screen dose control', 'Stainless steel body'], // PONTOS POSITIVOS
                'contras' => ['161 ratings, the second thinnest sample in this comparison', '51 settings is marketing rather than capability', 'Conical burrs give a slightly wider particle spread than flat'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'OutIn Fino Portable Electric Coffee Grinder, 420 Steel Burr, Battery',    // NOME (ENCURTADO)
                'price' => '£179.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 550,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/610aCugoVfL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'OutIn Fino portable electric coffee grinder with battery and dosing cup', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DNJBSMW6?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most technically specific listing in the category: 420 stainless steel burrs at HRC 55-60 hardness, in a 690g battery-powered grinder for travel.', // TEXTO CURTO (CARD)
                'body' => "Nobody else in this comparison publishes a steel grade, and nobody else publishes a hardness figure. OutIn does both: the burrs are 420 stainless steel at HRC 55 to 60 on the Rockwell scale. That matters because burr hardness is what determines how long the cutting edges stay sharp, and a soft burr rounds off and starts crushing rather than cutting within a couple of years of daily use. HRC 55-60 is genuine knife-steel territory.

The format is the other reason it exists. At 690g with a fast-charge battery and a detachable dosing cup, this is a grinder for a campsite, a hotel room or an office drawer — the whole point being fresh grounds where there is no socket. The heptagonal burr geometry is unusual and OutIn says it is for grind consistency; we would treat that claim as unverified, unlike the steel grade, which is checkable.

It is also £179.99, by far the most expensive machine on this page and roughly five times the Molino. You are paying for portability and for materials transparency, not for a better grind at your kitchen counter — a mains grinder at half the price will match or beat it at home. At 4.5 from 550 ratings the evidence is decent. Buy it if you actually travel with coffee; if the grinder will live on a worktop, buy almost anything else here.", // TEXTO SEO LONGO
                'pros' => ['Publishes both the steel grade (420) and the hardness (HRC 55-60)', 'Battery powered and only 690g, genuinely portable', 'Detachable dosing cup, auto-stop and clog protection', '4.5 stars from 550 ratings', 'Materials transparency unmatched in this comparison'], // PONTOS POSITIVOS
                'contras' => ['Costs £179.99, roughly five times the Molino', 'A mains grinder at half the price will match it at home', 'The heptagonal burr claim is not independently verifiable', '28 settings, mid-scale, on the most expensive machine here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'AMZCHEF Electric Coffee Grinder, 75 Grind Settings, Anti-Static',         // NOME (ENCURTADO)
                'price' => '£79.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 262,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/712f1So1y9L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'AMZCHEF electric coffee grinder with 75 grind settings and anti-static technology', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GGH1VWSW?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The settings champion at 75, on a plastic body, at £79.99 — and the clearest illustration on this page that the number and the build move in opposite directions.', // TEXTO CURTO (CARD)
                'body' => "Seventy-five grind settings is the highest count in this comparison and it is the reason this grinder is here. The Krups at number three has seventeen. Both machines move one burr across a range fixed by the burr geometry; this one simply has more detents along the way. Somewhere past thirty or so, the change per click drops below what the machine can hold repeatably from one dose to the next, and the extra clicks become decoration.

The specification table settles the argument in one line: Material, Plastic. The 17-setting Krups is stainless steel and costs £25.99 less. That is the whole thesis of this article printed on two Amazon listings.

There is a competent grinder underneath and two of its claims are worth crediting. AMZCHEF quotes retention of 0.1 to 0.2 grams per grind, which is a genuinely good figure and the sort of specific, checkable number the rest of the category avoids. And it quotes noise at 60 to 75dB, which is honest — grinders are loud, and after a week of reading appliance listings claiming 20dB for machines with pumps, a manufacturer admitting to 75 is a small pleasure. At 262 ratings the sample is thin for £79.99.", // TEXTO SEO LONGO
                'pros' => ['Publishes retention of just 0.1 to 0.2 grams per grind', 'Honest 60-75dB noise figure rather than a fictional low number', 'Anti-static technology to reduce grounds clinging', '4.3 stars from its first 262 buyers'], // PONTOS POSITIVOS
                'contras' => ['Plastic body at £79.99, where the £54 Krups is stainless steel', '75 settings divide the same fixed range as 17 settings do', '262 ratings is a thin sample for the price', 'Publishes no burr type, diameter or material'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Dualit Burr Coffee Grinder, 35 Settings, Removable Stainless Burrs',      // NOME (ENCURTADO)
                'price' => '£98.99',                                                                // PRECO
                'rating' => 4.0,                                                                    // NOTA
                'reviews_count' => 74,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61o6BraAzqL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Dualit burr coffee grinder with removable stainless steel burrs',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CRZ9CVWQ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Removable burrs are a genuinely good idea nobody else here offers, but at £98.99 with a plastic body and 74 ratings it is asking a lot on brand alone.', // TEXTO CURTO (CARD)
                'body' => "The feature worth having is the removable stainless steel burrs. Every burr grinder accumulates old grounds and oils in the chamber, and those oils go rancid and taint everything ground afterwards. Most grinders make you attack this with a brush through a gap; Dualit lets you take the burrs out and clean properly. On a machine you keep for years, that is a real advantage and no other listing here offers it.

Dualit is also a British brand with a genuine manufacturing history, and 35 settings with adjustable portion control is a sensible, unshowy specification that sits sanely in the middle of the range.

Two things make it hard to recommend at £98.99. The specification table gives the material as Plastic, which at this price and against a £54 stainless Krups is difficult to justify. And 4.0 from 74 ratings is both the joint lowest rating and one of the thinnest samples in the comparison — with a sample that small a 4.0 could move in either direction, but it is not the number you want to see on the second most expensive grinder on the page. Buy it for the removable burrs if long-term cleanliness is your priority; otherwise the Krups and the SHARDOR both offer more machine for less money.", // TEXTO SEO LONGO
                'pros' => ['Removable stainless steel burrs, unique in this comparison', 'Proper cleaning access prevents rancid oils tainting future grinds', 'Adjustable portion control with 35 settings', 'Established British brand'], // PONTOS POSITIVOS
                'contras' => ['Plastic body at £98.99, against a stainless steel Krups at £54', '4.0 from just 74 ratings, joint lowest average here', 'Second most expensive grinder in this ranking', 'Does not state burr type or diameter'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Amazon Basics Electric Burr Coffee Grinder, Flat Burr, 30 Settings',      // NOME (ENCURTADO)
                'price' => '£34.19',                                                                // PRECO
                'rating' => 3.9,                                                                    // NOTA
                'reviews_count' => 75,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61jkjVAJH5L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Amazon Basics electric burr coffee grinder in black with 30 settings', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DRBTP3DY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest grinder here at £34.19 and one of only three that names its burr type, but a 3.9 average is the lowest in the comparison.', // TEXTO CURTO (CARD)
                'body' => "Amazon Basics does one thing right that most of this category does not: it names the mechanism. The first bullet says flat burr grinding mechanism, which puts it alongside the Molino at number one and the SHARDOR at number six as the only listings here that tell you what is actually inside. Thirty settings, from fine for espresso to coarse for a cafetière, and a mixed plastic and stainless steel construction.

At £34.19 it is the cheapest machine on the page, undercutting the Wancle by £2.80 and the Molino by £3.80, and it comes with Amazon's own returns handling, which is worth something on a device with a motor.

The rating is why it is last. Three point nine from 75 ratings is the lowest average in this comparison, and while 75 is a thin sample, an own-brand product with Amazon's placement advantages should be gathering reviews faster and settling higher than this. Given that the Molino sits £3.80 away with a flat burr, a steel body and 5,280 ratings at 4.4, there is no scenario where this is the better buy unless it is heavily discounted. Included because it names its burr type, which most of the field will not do at any price.", // TEXTO SEO LONGO
                'pros' => ['Names its flat burr mechanism, which most of this category avoids', 'Cheapest grinder in this comparison at £34.19', '30 settings covering espresso through to cafetière', 'Amazon own-brand returns handling'], // PONTOS POSITIVOS
                'contras' => ['3.9 from 75 ratings, the lowest average in this ranking', 'Thin sample for an own-brand product with prime placement', 'Only £3.80 cheaper than a steel-bodied grinder with 5,280 ratings', 'Mixed plastic and steel construction'], // PONTOS NEGATIVOS
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
        $this->command?->info("CoffeeGrindersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
