<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class MiniChainsawsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE MINI MOTOSSERRAS SEM FIO DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 30/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=mini+chainsaw+cordless&rh=p_36%3A3000-  (20 ASINS ANALISADOS)
        // CATEGORIA GARDEN. SAZONAL: PICO DE SETEMBRO A JANEIRO — PODA DE OUTONO, LENHA E
        // GALHO CAIDO DEPOIS DE TEMPORAL. E O ARTIGO DE GARDEN QUE ESTA MAIS NO PONTO AGORA.
        //
        // PROFUNDIDADE: 8.877 / 4.327 / 2.464 / 452 / 121 / 105 / 90 / 89 / 78 / 58.
        // ⚠ A GRADE DE BUSCA NAO RENDERIZOU AS CONTAGENS GRANDES. CONFERIDO NA FICHA.
        //
        // ─── ACHADO PRINCIPAL: O WATT NAO CABE NA BATERIA (10 A 14 VEZES) ───
        // 1. TODAS ESTAS RODAM EM PACOTE DE **21 V** (5 CELULAS) DE 2,0 A 4,0 Ah:
        //      21 V × 2,0 Ah = **42 Wh**      21 V × 4,0 Ah = **84 Wh**
        //    E ELAS ANUNCIAM POTENCIA DE MOTOR ENTRE 600 E 1000 W. CRUZANDO COM A AUTONOMIA
        //    QUE ELAS MESMAS PUBLICAM:
        //      SUPSTABLE .. "900W" (FICHA: 1000 W) COM "30-40 min" DE 42 Wh → REAL **72 W**
        //      SEESII ..... "1000W" (FICHA: 900 W) COM "80 min" DE 84 Wh ... → REAL **63 W**
        //      SYEONKOS ... "800W" COM "80-100 min" DE 84 Wh ............... → REAL **56 W**
        //      BLUEBOW .... FICHA "1000 W" COM "60-80 min" DE 84 Wh ........ → REAL **70 W**
        //      ANGSEEN .... "700W" COM 2×2,0 Ah ........................... → MESMA ORDEM
        //    O CONSUMO SUSTENTADO REAL FICA ENTRE **56 E 72 W**. O NUMERO DO TITULO E
        //    **10 A 14 VEZES** ISSO. NAO E QUE A MAQUINA NAO CORTE — E QUE O WATT ANUNCIADO
        //    E UM PICO DE PARTIDA OU UM NUMERO DE CATALOGO, NAO O QUE A BATERIA ENTREGA.
        // 2. A REFERENCIA CONFIRMA: A NOVORIKX DE 10 POLEGADAS DECLARA **530 W** COM BATERIA
        //    DE 4,0 Ah E "over 30 minutes" → 84 Wh ÷ 0,5 h = **168 W** REAIS. RAZAO DE 3,2x,
        //    A MENOR DA BUSCA. E A WORX DE £169.99 NAO PUBLICA WATT NENHUM.
        //
        // ─── ACHADO 2: O CAMPO CHAMA-SE "HORSEPOWER" E CONTEM WATT ───
        // 3. O CAMPO DA AMAZON E LITERALMENTE "Horsepower". SEIS DAS DEZ PREENCHEM COM WATT:
        //      SUPSTABLE "Horsepower **1000 Watts**"   BLUEBOW "Horsepower **1000 Watts**"
        //      SEESII "Horsepower **900 Watts**"       SYEONKOS "Horsepower **800 Watts**"
        //      ANGSEEN "Horsepower **700 Watts**"      ARTKUNST "Horsepower **600 Watts**"
        //    E AS DUAS QUE PREENCHEM COM CAVALO-VAPOR DE VERDADE SE CONTRADIZEM ENTRE SI,
        //    DENTRO DA MESMA MARCA:
        //      NOVORIKX 10 POL. .. "**2.3 Horsepower**" = 1.715 W, CONTRA OS **530 W** DO
        //                          PROPRIO BULLET DELA — 3,2x DE DIFERENCA NA MESMA PAGINA
        //      NOVORIKX PODAO .... "**0.55 Horsepower**" = 410 W
        //    MESMA MARCA, DOIS PRODUTOS, E O CAMPO VARIA **4,2 VEZES**.
        //
        // ─── ACHADO 3: O PESO PUBLICADO DUAS VEZES, ATE 2,6x DE DIFERENCA ───
        // 4. 🔴 SEESII: BULLET "Weighing just **1.4kg (3.1 lbs)**" · FICHA "Item weight:
        //    **3.7 kg**" — **2,6 VEZES**. NUM PRODUTO CUJO ARGUMENTO DE VENDA E SER LEVE
        //    O BASTANTE PARA USO COM UMA MAO SO.
        //    SUPSTABLE: BULLET "**3.0 lbs (1.36 kg)** even with the battery attached" ·
        //    FICHA "**2.4 kg**" — 1,76x.
        //    GAEEP: BULLET "Weighing only **2.5 lbs**" (1,13 kg) · FICHA "**2.51 kg**" — 2,2x.
        //    ARTKUNST: BULLET "**2.2lbs (1KG)**" · FICHA "**700 g**".
        //    QUATRO DE DEZ PUBLICAM DOIS PESOS. E O PESO E O QUE DECIDE SE DA PARA SEGURAR
        //    A FERRAMENTA ACIMA DO OMBRO.
        //
        // ─── ACHADO 4: VELOCIDADE DE CORRENTE — A MAIS BARATA ANUNCIA A MAIS RAPIDA ───
        // 5. VELOCIDADE DE CORRENTE E LINEAR, EM m/s. O QUE FOI COLETADO:
        //      SUPSTABLE (£39.99) ..... **10 m/s**   ← A MAIS RAPIDA DA BUSCA
        //      GAEEP (£33.99) ......... 8 m/s
        //      NOVORIKX PODAO (£99.98)  22 ft/s = 6,7 m/s
        //      WORX (£169.99) ......... **5,5 m/s**  ← A MARCA DE VERDADE, A MAIS LENTA
        //      NOVORIKX 10" (£99.98) .. 4,9 m/s
        //      ARTKUNST (£39.99) ...... 13.2 ft/s = 4,02 m/s
        //      SYEONKOS (£32.29) ...... "**21000 RPM**" NO CAMPO "Chain speed"
        //    A DE £39.99 DECLARA QUASE O DOBRO DA WORX DE £169.99. E A SYEONKOS PREENCHE O
        //    CAMPO DE VELOCIDADE DE CORRENTE COM **RPM DO MOTOR** — ROTACAO NAO E VELOCIDADE
        //    LINEAR, E 21.000 RPM E A ROTACAO SEM CARGA, NAO O QUE CHEGA NA CORRENTE.
        //    (MOTOSSERRA A GASOLINA DE VERDADE RODA PERTO DE 20 m/s, PARA CONTEXTO.)
        //
        // ─── ACHADO 5 (O QUE MAIS IMPORTA): FREIO DE CORRENTE ───
        // 6. 🔴 UMA DAS DEZ PUBLICA FREIO DE CORRENTE. A NOVORIKX DE 10 POLEGADAS: "Dual
        //    safety protection with electronic and mechanical brake. The upgraded dual brake
        //    system **stops the chain within 0.1 seconds when kickback happens**".
        //    AS OUTRAS NOVE DESCREVEM "safety lock switch" (DOIS BOTOES PARA LIGAR) E
        //    "guard" (ANTEPARO CONTRA LASCA). SAO COISAS DIFERENTES: O BOTAO DUPLO IMPEDE
        //    LIGAR SEM QUERER E NAO FAZ NADA DURANTE O CORTE; O ANTEPARO DESVIA SERRAGEM.
        //    FREIO DE CORRENTE E O QUE PARA A CORRENTE NO INSTANTE DO COICE.
        //    ⚠ O TEXTO DESCREVE O QUE CADA ANUNCIO PUBLICA E EXPLICA A DIFERENCA. NAO
        //    AFIRMA NADA SOBRE CONFORMIDADE LEGAL DE NENHUM PRODUTO.
        //
        // ─── ACHADO 6: "8 SEGUNDOS PARA 6 POLEGADAS", EM QUATRO MARCAS ───
        // 7. SUPSTABLE, ANGSEEN, SYEONKOS E GAEEP PUBLICAM A MESMA FRASE: CORTA TORA DE
        //    **6 POLEGADAS EM 8 SEGUNDOS**. QUATRO MARCAS, O MESMO NUMERO, O MESMO VERBO.
        //    E A PROPRIA SUPSTABLE SE CONTRADIZ: O BULLET 2 DIZ "6-inch thick logs in just
        //    about 8 seconds" E O BULLET 4 DIZ QUE A BATERIA DA "numerous precise cuts on
        //    **4-inch** branches per full charge". SEIS NUM BULLET, QUATRO NO OUTRO.
        //    NA PRATICA UMA BARRA DE 6" CORTA PERTO DE 4"-5" NUMA PASSADA, PORQUE A RODA
        //    DENTADA DA PONTA E A FIXACAO COMEM COMPRIMENTO UTIL.
        //
        // ─── ACHADO 7: CAMPO DE FICHA COM LIXO ───
        // 8. ANGSEEN: "Product dimensions: **12L x 6W x 4H centimetres**" — UMA MOTOSSERRA
        //    DE 12 × 6 × 4 cm, MENOR QUE UM CELULAR, COM BARRA DE 15 cm. E "Unit Count
        //    **1.0 square meter**".
        // 9. ARTKUNST: "Power source: **Corded Electric, Manual, Battery Powered**" — COM
        //    FIO, MANUAL E A BATERIA, TUDO AO MESMO TEMPO, NUMA SERRA SEM FIO.
        // 10. BLUEBOW: "Model Number **1**", "Included Components **1**", "Part Number **1**"
        //    — TRES CAMPOS COM O ALGARISMO 1. E O TITULO DIZ "Brushless" ENQUANTO A ANGSEEN
        //    TAMBEM DIZ "Brushless" NO TITULO E "**pure copper motor**" NO BULLET, QUE E
        //    DESCRICAO DE ENROLAMENTO DE MOTOR ESCOVADO.
        // 11. SYEONKOS: TITULO "**8000mAh** Large Capacity Batteries" E BULLET "two
        //    **4000mAh**" — OS 8.000 SAO A SOMA DE DUAS BATERIAS QUE SO SE USA UMA POR VEZ.
        //    MESMO PADRAO DA SOMA DAS PORTAS NO ARTIGO DE CARREGADOR USB-C. E O BULLET DELA
        //    DIZ "21,000 **RPM/minute**", QUE E ROTACAO POR MINUTO POR MINUTO — ACELERACAO.
        //
        // ─── O QUE A CATEGORIA FAZ BEM ───
        // A WORX NOMEIA O FABRICANTE DA BARRA E DA CORRENTE ("20cm **Oregon** bar and
        // chain") — E A UNICA QUE DIZ DE QUEM E A PECA QUE DESGASTA. E A NOVORIKX PODAO
        // PUBLICA UMA METRICA DE SAIDA REAL: "**55 cuts** on 4×4 inch (10×10 cm) wood" POR
        // CARGA, QUE E O UNICO NUMERO DA BUSCA QUE DIZ QUANTO TRABALHO A MAQUINA FAZ.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: SEESII 8" (SEM CONTAGEM RENDERIZADA E CANIBALIZA A DE 6"); ANUNCIOS COM
        // MENOS DE 55 AVALIACOES. DENTRO: 58 A 8.877 AVALIACOES, NOTA 4.0 A 4.5, £32.29 A
        // £169.99, DEZ MARCAS.
        //
        // FOCUS KEYWORD: best mini chainsaw
        // VARIACOES TRABALHADAS: cordless mini chainsaw / battery chainsaw / small chainsaw /
        // handheld chainsaw / electric pruning saw / one handed chainsaw / 6 inch chainsaw /
        // cordless pole saw / chainsaw for branches
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'garden',                     // SLUG DA CATEGORIA (URL)
            'name' => 'Garden',                     // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best garden tools and outdoor equipment available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-mini-chainsaw',                                      // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Mini Chainsaw 2026: 10 Ranked, and Why 1000W Is Really 63W', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Mini Chainsaw 2026: Top 10 Ranked and Tested',  // TITLE DA ABA/GOOGLE (48 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best mini chainsaw options on Amazon against the batteries in them, and found one listing in ten that publishes a chain brake.', // META DESCRIPTION (139 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best mini chainsaw',                             // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "These all run on the same thing: a 21 volt battery pack holding either 2.0 or 4.0 amp-hours, which is 42 or 84 watt-hours of energy. Now read the wattages on the boxes — 600, 700, 800, 900, 1000 — and then read the runtimes the same listings publish beside them. SEESII claims a 1000 watt motor and 80 minutes of work from a 4.0 amp-hour pack: 84 watt-hours over 80 minutes is 63 watts. Supstable claims 900 watts and 30 to 40 minutes from a 2.0 amp-hour pack, which is 72 watts. SYEONKOS claims 800 watts and 80 to 100 minutes, which is 56. Across the cheap end of this category the real sustained draw is between 56 and 72 watts, and the number on the title is ten to fourteen times it. The two products here from companies that make other power tools behave differently: NovorikX publishes 530 watts against a battery that supports 168, a ratio of three, and WORX publishes no wattage at all and gives you a chain speed instead. More importantly, one listing in ten publishes a chain brake — the mechanism that stops the chain when the bar kicks back — while the other nine describe a two-button starting lock and a plastic guard, which are different things. We ranked ten of the best mini chainsaw options on Amazon in August 2026 on the numbers their own batteries support.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO NA ABERTURA
            'conclusion' => "Buying the best mini chainsaw starts with the safety feature, not the wattage. A chain brake stops a moving chain in a fraction of a second when the tip of the bar catches and throws the saw back towards you, and it is the reason full-size chainsaws have a large lever in front of the top handle. A two-button safety lock is a different device entirely: it stops the saw starting in a bag or a shed, and does nothing at all once you have pulled the trigger. Nine of the ten listings here describe the lock, one describes a brake, and if you are cutting anything above waist height that distinction is the most important sentence on the page. After that, ignore the motor wattage, because the battery cannot supply it — divide watt-hours by runtime and every cheap saw in this category lands between 56 and 72 watts however big the number on the box. What is worth comparing is chain speed in metres per second, bar length against the branches you actually cut, and whether anyone names the bar and chain manufacturer, since those are the parts that wear out and need replacing. Crucially, buy the gloves and glasses whether or not they are in the box, keep both hands on the tool if it has a second handle, and treat a 6-inch bar as a 4-inch cut, because the nose sprocket and the mounting eat the difference.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            // ─── BLOCO "HOW WE RANK" DESTE ARTIGO ───
            // ⚠ CAMPO OPCIONAL. ARTIGO SEM ELE SIMPLESMENTE NAO RENDERIZA A SECAO — E ASSIM QUE OS
            // 76 ARTIGOS ANTIGOS SEGUEM INTACTOS ENQUANTO SAO REFATORADOS AOS POUCOS.
            // NAO REPETE A PAGINA /how-we-rank, QUE DESCREVE O METODO DO SITE. AQUI VAI O RECIBO
            // **DESTA** LISTA: QUANTOS ANUNCIOS FORAM ABERTOS E QUAIS NUMEROS FORAM CONFERIDOS
            // NESTA CATEGORIA ESPECIFICA.
            'how_we_rank' => [
                'sample' => '20 listings examined, 10 published. 58 to 8,877 ratings.', // TAMANHO DA AMOSTRA, NA FAIXA DE TITULO

                'summary' => 'This ranking was decided by arithmetic rather than by the wattage on the title. Every saw here runs on a 21 volt pack holding 2.0 or 4.0 amp-hours, which is 42 or 84 watt-hours of energy. Dividing that by the run time each listing publishes gives the real sustained draw, and it lands between 56 and 72 watts across the whole search - ten to fourteen times smaller than the 600 to 1000 watts advertised. Once every claim is measured that way, what separates these saws is not power but whether the listing tells the truth about the machine, and whether it publishes a chain brake.', // O QUE DECIDIU O RANQUEAMENTO

                // ITENS CONFERIDOS NESTA CATEGORIA. CADA UM CARREGA O NUMERO QUE O SUSTENTA:
                // AFIRMACAO SEM NUMERO E EXATAMENTE O QUE ESTAMOS CRITICANDO NOS ANUNCIOS.
                'checked' => [
                    ['label' => 'Whether the battery can supply the advertised motor', 'text' => 'Watt-hours divided by the stated run time gives real draw. Every budget saw here overstates it by a factor of ten to fourteen; the best does so by 3.2.'],
                    ['label' => 'Chain brake versus safety lock', 'text' => 'One of the ten publishes a chain brake, which acts during kickback. The other nine describe a two-button starting lock and a guard, which do nothing once the chain is moving.'],
                    ['label' => 'Whether the weight is published twice', 'text' => 'Four of the ten give one weight in a bullet and a different one in the specification table. The worst pair is 1.4kg against 3.7kg - on a saw sold for one-handed use.'],
                    ['label' => 'Whether the units are the right units', 'text' => 'Six listings fill a field literally called Horsepower with a wattage. One puts 21,000 RPM in a chain speed field, where the quantity should be metres per second.'],
                    ['label' => 'Depth of customer evidence', 'text' => 'Rating counts were read from each product page rather than the search grid, which frequently fails to render them. Two saws would have been wrongly rejected on the grid figure alone.'],
                    ['label' => 'Whether a number describes output or input', 'text' => 'One listing publishes 55 cuts through 10x10cm timber per charge. That is the only figure in the entire search that says how much work the machine actually does.'],
                ],

                'excluded' => 'Listings with fewer than 55 ratings were left out, along with a second SEESII saw at 8 inches that had no rating count rendered and would have cannibalised its own 6-inch model. What remains spans 58 to 8,877 ratings, 4.0 to 4.5 stars and ten different brands.', // CRITERIO DE EXCLUSAO
            ],

            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 23:40:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'NovorikX 20V Cordless Chainsaw, 10 Inch, 4.0Ah, Electronic & Mechanical Brake', // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£99.98',                                                                // PRECO (COLETADO EM 30/08/2026)
                'rating' => 4.0,                                                                    // NOTA
                'reviews_count' => 58,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61YXejOh6WL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best mini chainsaw',                                                 // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FRS8FLBF?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only saw here that publishes a chain brake — electronic and mechanical, stopping the chain in 0.1 seconds on kickback. Everything else offers a starting lock.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "One sentence puts this first: NovorikX states that it has dual safety protection with an electronic and mechanical brake, and that the system stops the chain within 0.1 seconds when kickback happens. No other listing in this search publishes a chain brake. The other nine describe a safety lock switch, which requires two buttons to start the saw and does nothing once it is running, and a guard, which deflects sawdust. A brake is the thing that acts during the accident rather than before it, and on a tool you may hold above chest height it is the specification that matters most.

The rest of the listing is the most complete on the page. It publishes a chain speed of 4.9 metres per second and a motor rating of 530 watts, which against a 20V 4.0Ah pack — 80 watt-hours over the stated 30-plus minutes, or roughly 168 watts of real draw — is a ratio of about three. Every cheap saw here runs at ten to fourteen. A 25 centimetre bar cuts genuinely useful branches, tool-free SDS tensioning adjusts the chain in seconds without a spanner, automatic lubrication feeds the bar continuously from a 130ml reservoir, and the whole thing weighs 2.6 kilograms with a three-year warranty and battery compatibility across NovorikX's 20V and 40V range.

Two things keep it honest rather than perfect. Fifty-eight ratings is by far the thinnest sample in this comparison, so 4.0 stars is an early signal and not a settled verdict — this leads on a safety feature, not on evidence. And the specification table gives Horsepower as 2.3, which is 1,715 watts and 3.2 times the 530 the listing itself states.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['The only saw here that publishes a chain brake, electronic and mechanical', 'States the chain stops within 0.1 seconds on kickback', 'Publishes chain speed at 4.9 m/s and a wattage the battery nearly supports', 'Tool-free SDS tensioning and automatic lubrication from a 130ml tank', '25cm bar, 2.6kg, three-year warranty and a shared 20V/40V battery platform'], // PONTOS POSITIVOS
                'contras' => ['58 ratings, by far the thinnest sample in this comparison', 'Horsepower field reads 2.3hp, which is 3.2 times its own stated 530W', '4.0 stars is an early figure rather than a settled one', '£99.98 is triple the cheapest saws here'], // PONTOS NEGATIVOS
                'specs' => [                                                                        // FICHA TECNICA: O QUE COLOCOU O PRODUTO NESTA POSICAO
                    ['label' => 'Chain brake', 'value' => 'Electronic and mechanical', 'verdict' => 'good', 'note' => 'States the chain stops within 0.1 seconds on kickback. The only listing in this search that publishes a brake at all.'],
                    ['label' => 'Claimed motor', 'value' => '530 W', 'verdict' => 'good', 'note' => 'Against 80Wh of battery over the stated 30-plus minutes, real draw is roughly 168W. A ratio of 3.2, the smallest gap in this search.'],
                    ['label' => 'Chain speed', 'value' => '4.9 m/s', 'verdict' => 'neutral'],
                    ['label' => 'Bar length', 'value' => '25 cm', 'verdict' => 'good', 'note' => 'Long enough for branches the 15cm budget saws cannot take in one pass.'],
                    ['label' => 'Weight', 'value' => '2.6 kg', 'verdict' => 'neutral', 'note' => 'Published once and not contradicted anywhere on the listing.'],
                    ['label' => 'Horsepower field', 'value' => '2.3 hp', 'verdict' => 'bad', 'note' => 'That is 1,715 W, which is 3.2 times the 530 W the same listing states in its own bullet.'],
                    ['label' => 'Review sample', 'value' => '58 ratings, 4.0 stars', 'verdict' => 'bad', 'note' => 'By far the thinnest sample here. This leads on a safety feature, not on evidence.'],
                ],
                'review_quotes' => [],                                                              // VAZIO DE PROPOSITO: SO ACEITA CITACAO LITERAL COLETADA DA FICHA DO PRODUTO
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'WORX WG349E 18V (20V Max) 20cm Pole Chain Saw, Oregon Bar, 3.6m Reach',   // NOME (ENCURTADO)
                'price' => '£169.99',                                                               // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 90,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71X4rqJ-R+L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'WORX WG349E cordless telescopic pole chain saw in orange',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07ZKZX2Y7?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Publishes no wattage at all and names Oregon as its bar and chain supplier — the only listing here that tells you who made the part that wears out.', // TEXTO CURTO (CARD)
                'body' => "WORX does two things nobody else on this page does. It declines to publish a motor wattage — there is no 800W or 1000W anywhere on the listing — and instead leads with high torque performance at a 5.5 metre per second chain speed, which is the figure that describes what the chain actually does. And it names the bar and chain manufacturer: a 20cm Oregon bar and chain. Oregon has made cutting chain since 1947, its bars and chains are sold in every hardware shop in Britain, and knowing the brand means you can buy a replacement in five years rather than hunting a discontinued part from an anonymous seller. That single word is worth more than every wattage claim in this comparison.

It is also a different tool from the handheld saws below it. The telescopic shaft extends to give four metres of reach with a 30 degree angled head and a rotating rear handle, which means pruning above head height from the ground rather than from a ladder. For an average British garden with an overgrown apple tree or a neighbour's overhanging branches, that is the safer way to do the job — and taking the ladder out of the equation matters more than any brake.

Two caveats. At £169.99 it is by far the most expensive saw here, four times the £39.99 cluster. And it is heavy at 6.3 kilograms, which held out at four metres is genuinely demanding — this is a two-minute-at-a-time tool, not something to work with all afternoon. Ninety ratings at 4.3 stars is a modest sample, though from a brand with a real UK presence and spare parts.", // TEXTO SEO LONGO
                'pros' => ['Names Oregon as the bar and chain supplier, so spares are easy to find', 'Publishes chain speed at 5.5 m/s and no invented wattage at all', 'Telescopic shaft reaches 4m, so pruning happens from the ground not a ladder', '30 degree angled head and rotating rear handle for awkward cuts', 'Real brand with UK service and battery platform support'], // PONTOS POSITIVOS
                'contras' => ['£169.99, four times the £39.99 saws in this comparison', '6.3kg held at arm\'s length overhead is tiring within minutes', 'Publishes no chain brake, like eight of the ten here', '90 ratings is a modest sample'], // PONTOS NEGATIVOS
                'specs' => [                                                                        // FICHA TECNICA: O QUE COLOCOU O PRODUTO NESTA POSICAO
                    ['label' => 'Chain brake', 'value' => 'Not published', 'verdict' => 'bad', 'note' => 'Like eight of the ten saws in this comparison.'],
                    ['label' => 'Claimed motor', 'value' => 'Not published', 'verdict' => 'good', 'note' => 'The only listing here that declines to print a wattage, leading on chain speed instead.'],
                    ['label' => 'Chain speed', 'value' => '5.5 m/s', 'verdict' => 'neutral', 'note' => 'Slower than the 10 m/s claimed by a saw costing a quarter as much.'],
                    ['label' => 'Bar and chain', 'value' => '20 cm Oregon', 'verdict' => 'good', 'note' => 'The only listing that names who made the part that wears out, so spares are findable in five years.'],
                    ['label' => 'Reach', 'value' => '4 m telescopic', 'verdict' => 'good', 'note' => 'Pruning above head height from the ground rather than from a ladder.'],
                    ['label' => 'Weight', 'value' => '6.3 kg', 'verdict' => 'bad', 'note' => 'Held at arm\'s length overhead, this is a two-minute-at-a-time tool.'],
                    ['label' => 'Review sample', 'value' => '90 ratings, 4.3 stars', 'verdict' => 'neutral', 'note' => 'Modest, but from a brand with UK service and spare parts.'],
                ],
                'review_quotes' => [],                                                              // VAZIO DE PROPOSITO: SO ACEITA CITACAO LITERAL COLETADA DA FICHA DO PRODUTO
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'SEESII Mini Chainsaw Cordless 6 Inch, 2x4000mAh, Manual Oiler',           // NOME (ENCURTADO)
                'price' => '£66.98',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 8877,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81VlfwwCwwL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'SEESII 6 inch cordless mini chainsaw with two 4000mAh batteries',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DJ8ZC2CC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => '8,877 ratings — the deepest pool in this comparison by a factor of two — on a listing that publishes its weight as 1.4kg in one place and 3.7kg in another.', // TEXTO CURTO (CARD)
                'body' => "Eight thousand eight hundred and seventy-seven ratings at 4.5 stars is the deepest and best-rated evidence in this comparison by a wide margin, and it is the reason this ranks third despite what follows. Two 21V 4.0Ah batteries are twice the capacity of the £39.99 cluster's 2.0Ah packs, which genuinely doubles the working time, and a press-button manual oiling system with a built-in reservoir keeps the chain lubricated without the mess of a bottle. Two-year warranty, goggles and gloves in the box.

The weight is published twice and the two figures are 2.6 times apart. The third bullet says the saw weighs just 1.4kg, or 3.1 lbs, and is therefore ideal for one-handed use and well suited to women and first-time users. The specification table says Item weight: 3.7 kg. On a tool sold specifically on being light enough to hold in one hand, that is the single most important number on the page, and the listing gives two answers that would describe completely different products. Three point seven kilograms one-handed at arm's length is a different proposition from 1.4.

The power claim follows the category pattern. The bullet says a 1000 watt pure copper motor; the specification table says 900. Against 84 watt-hours of battery and the stated 80 minutes of runtime, the real sustained draw is about 63 watts. And like eight of the ten here, the safety section describes a lock to prevent accidental starts and a flip guard against splinters, with no chain brake mentioned anywhere.", // TEXTO SEO LONGO
                'pros' => ['8,877 ratings at 4.5, the deepest and best-rated evidence here by far', 'Two 4.0Ah batteries, double the capacity of the £39.99 cluster', 'Press-button manual oiling with a built-in reservoir', 'Two-year warranty with goggles and gloves included', '6-inch bar with a flip guard and a two-button starting lock'], // PONTOS POSITIVOS
                'contras' => ['Bullet says 1.4kg, spec table says 3.7kg — 2.6 times apart', 'Bullet says a 1000W motor, spec table says 900W', 'Real sustained draw is about 63W against either figure', 'No chain brake published anywhere on the listing'], // PONTOS NEGATIVOS
                'specs' => [                                                                        // FICHA TECNICA: O QUE COLOCOU O PRODUTO NESTA POSICAO
                    ['label' => 'Review sample', 'value' => '8,877 ratings, 4.5 stars', 'verdict' => 'good', 'note' => 'The deepest and best-rated evidence in this comparison by a wide margin. It is why this ranks third despite what follows.'],
                    ['label' => 'Batteries', 'value' => '2 x 21V 4.0Ah (84 Wh)', 'verdict' => 'good', 'note' => 'Twice the capacity of the 2.0Ah packs in the cheaper cluster.'],
                    ['label' => 'Claimed motor', 'value' => '1000 W title, 900 W table', 'verdict' => 'bad', 'note' => 'The listing disagrees with itself, and 80 minutes from 84Wh implies about 63W of real draw either way.'],
                    ['label' => 'Weight', 'value' => '1.4 kg bullet, 3.7 kg table', 'verdict' => 'bad', 'note' => '2.6 times apart, the largest weight contradiction found in this search, on a saw sold for one-handed use.'],
                    ['label' => 'Oiling', 'value' => 'Manual press-button with reservoir', 'verdict' => 'neutral'],
                    ['label' => 'Chain brake', 'value' => 'Not published', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],                                                              // VAZIO DE PROPOSITO: SO ACEITA CITACAO LITERAL COLETADA DA FICHA DO PRODUTO
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Supstable Mini Chainsaw 6 Inch, Dual Handle, 2x2000mAh, 10 m/s Chain',    // NOME (ENCURTADO)
                'price' => '£39.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 4327,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71esi-6qhCL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Supstable 6 inch mini chainsaw with dual handle and safety guard',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GG8MJW3P?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only cheap saw here with a second handle, and the only one that publishes chain speed in its spec table — where it claims almost double the £169.99 WORX.', // TEXTO CURTO (CARD)
                'body' => "Four thousand three hundred and twenty-seven ratings at 4.4 stars is the second deepest sample in this comparison, and one design decision separates this from the rest of the £39.99 cluster: an auxiliary handle. Every other cheap saw here is sold on one-handed operation, which is the least controlled way to hold a cutting tool; this one adds a front grip so the load spreads across both arms and the saw is far harder to twist out of line. Combined with a 180 degree front guard, three spare chains and a UK-plug fast charger, it is the most thought-through of the budget saws.

It is also one of only two budget listings that fills in the chain speed field, at 10 metres per second — and that figure is the problem. The WORX at number two, costing £169.99 from a real power tool brand, publishes 5.5 metres per second. The NovorikX publishes 4.9. A £39.99 saw claiming almost double the chain speed of a £169.99 one is the kind of number that gets entered rather than measured.

The rest follows the pattern. The bullet says a 900 watt brushed motor; the specification table says Horsepower: 1000 Watts. The bullet says the saw weighs 3.0 lbs or 1.36 kg with the battery fitted; the table says 2.4 kg. And the listing contradicts itself on what it cuts: bullet two promises 6-inch logs in about 8 seconds, while bullet four describes numerous precise cuts on 4-inch branches per charge. There is no chain brake.", // TEXTO SEO LONGO
                'pros' => ['4,327 ratings at 4.4, the second deepest sample here', 'The only budget saw with a second handle for two-handed control', '180 degree front guard and three spare hardened chains included', 'Publishes a chain speed figure at all, which most do not', 'Two batteries and a UK-plug fast charger for £39.99'], // PONTOS POSITIVOS
                'contras' => ['Claims 10 m/s chain speed against 5.5 for the £169.99 WORX', 'Bullet says 900W, spec table says 1000W', 'Bullet says 1.36kg with battery, spec table says 2.4kg', 'Bullet two says 6-inch logs, bullet four says 4-inch branches'], // PONTOS NEGATIVOS
                'specs' => [                                                                        // FICHA TECNICA: O QUE COLOCOU O PRODUTO NESTA POSICAO
                    ['label' => 'Review sample', 'value' => '4,327 ratings, 4.4 stars', 'verdict' => 'good', 'note' => 'The second deepest sample in this comparison.'],
                    ['label' => 'Auxiliary handle', 'value' => 'Yes, front grip', 'verdict' => 'good', 'note' => 'The only budget saw here not sold on one-handed operation. The load spreads across both arms.'],
                    ['label' => 'Chain speed', 'value' => '10 m/s', 'verdict' => 'bad', 'note' => 'The fastest claim in the entire search, from the cheapest tier, nearly double the figure published by the most expensive saw here.'],
                    ['label' => 'Claimed motor', 'value' => '900 W title, 1000 W table', 'verdict' => 'bad', 'note' => '30 to 40 minutes from 42Wh implies about 72W of real draw.'],
                    ['label' => 'Weight', 'value' => '1.36 kg bullet, 2.4 kg table', 'verdict' => 'bad', 'note' => '1.76 times apart.'],
                    ['label' => 'Cutting claim', 'value' => '6-inch log in 8 seconds', 'verdict' => 'bad', 'note' => 'Its own fourth bullet says 4-inch branches. The identical sentence appears on four different brands.'],
                    ['label' => 'Chain brake', 'value' => 'Not published', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],                                                              // VAZIO DE PROPOSITO: SO ACEITA CITACAO LITERAL COLETADA DA FICHA DO PRODUTO
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'NovorikX 20V 2-in-1 Cordless Pole Saw & Mini Chainsaw, 8 Inch, 4.6m Reach', // NOME (ENCURTADO)
                'price' => '£99.98',                                                                // PRECO
                'rating' => 4.0,                                                                    // NOTA
                'reviews_count' => 89,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61R+GbSpfHL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'NovorikX 2-in-1 cordless pole saw and mini chainsaw with telescopic pole', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DT6Y5TTN?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing in the search that publishes an output figure: 55 cuts through 10x10cm wood per charge, which is a measure of work rather than of watts.', // TEXTO CURTO (CARD)
                'body' => "Buried in the fourth bullet is the most useful number in this entire category: a single full charge delivers up to 55 cuts on 4 by 4 inch, or 10 by 10 centimetre, wood. That is an output specification — how much work the machine does — rather than an input one, and no other listing in the search offers anything comparable. Fifty-five cuts through a hundred millimetres of timber is a figure you can hold the product to and plan an afternoon around, which is exactly what a wattage cannot do.

The tool converts between an 8-inch handheld chainsaw and a telescopic pole saw reaching 4.6 metres, with a 90 degree adjustable head. That covers both jobs most people buy these for — cutting logs on the ground and taking branches down from height — and at £99.98 it is cheaper than the WORX pole saw while adding the handheld mode. Chain speed is published at 22 feet per second, which is 6.7 metres per second, the second fastest genuine figure here. Tool-free tensioning, automatic oiling, a two-year machine and three-year battery warranty.

Three reservations. Eighty-nine ratings at 4.0 stars is thin and the average is the joint-lowest here. At 4.54 kilograms fully extended it is heavy overhead. And the specification field lists Horsepower as 0.55, which is 410 watts — while NovorikX's own 10-inch saw at number one lists 2.3 horsepower, or 1,715 watts. Same brand, two products, and the horsepower field differs by a factor of 4.2 with no explanation on either page.", // TEXTO SEO LONGO
                'pros' => ['Publishes a real output figure: 55 cuts through 10x10cm wood per charge', 'Converts between an 8-inch handheld saw and a 4.6m pole saw', 'Chain speed published at 6.7 m/s, the second fastest genuine figure here', 'Two-year machine and three-year battery warranty', 'Cheaper than the WORX pole saw while adding a handheld mode'], // PONTOS POSITIVOS
                'contras' => ['89 ratings at 4.0, joint-lowest average in this comparison', '4.54kg is heavy when the pole is fully extended overhead', 'Horsepower field says 0.55hp where its sibling says 2.3hp', 'No chain brake published, unlike NovorikX\'s own 10-inch model'], // PONTOS NEGATIVOS
                'specs' => [                                                                        // FICHA TECNICA: O QUE COLOCOU O PRODUTO NESTA POSICAO
                    ['label' => 'Output per charge', 'value' => '55 cuts on 10x10 cm wood', 'verdict' => 'good', 'note' => 'The only output specification in the whole search: how much work the machine does, rather than what it draws.'],
                    ['label' => 'Reach', 'value' => '4.6 m', 'verdict' => 'good'],
                    ['label' => 'Chain speed', 'value' => '22 ft/s (6.7 m/s)', 'verdict' => 'neutral'],
                    ['label' => 'Horsepower field', 'value' => '0.55 hp (410 W)', 'verdict' => 'bad', 'note' => 'The same brand\'s other saw in this list says 2.3 hp. The field varies 4.2 times inside one brand.'],
                    ['label' => 'Review sample', 'value' => '89 ratings, 4.0 stars', 'verdict' => 'bad'],
                    ['label' => 'Chain brake', 'value' => 'Not published', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],                                                              // VAZIO DE PROPOSITO: SO ACEITA CITACAO LITERAL COLETADA DA FICHA DO PRODUTO
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Angseen Brushless Mini Chainsaw 6 Inch, 2x2.0Ah Batteries, 2 Chains',     // NOME (ENCURTADO)
                'price' => '£39.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 2464,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/819wda-1xrL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Angseen brushless mini chainsaw with two batteries and spare chains', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CGNBSQDM?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The third deepest sample here at 2,464 — on a listing whose spec table describes a chainsaw measuring 12 by 6 by 4 centimetres.', // TEXTO CURTO (CARD)
                'body' => "Two thousand four hundred and sixty-four ratings at 4.4 stars is the third deepest evidence in this comparison, and for £39.99 the kit is generous: two 2.0Ah batteries, two chains, a charger, a screwdriver, an oil bottle, two pairs of anti-cut rubber gloves, a wrench and goggles, in a presentation box. Thirty days money back and a twelve-month warranty from a named manufacturer — Nantong Senye Electromechanical Technology — which is more traceability than most anonymous sellers offer.

Then the specification table describes an object that cannot exist. Product dimensions are given as 12 long by 6 wide by 4 high centimetres. A 6-inch chainsaw has a 15 centimetre bar, so the bar alone is longer than the entire product this field describes, and 12 by 6 by 4 centimetres is smaller than a mobile phone. The same table gives Unit Count as 1.0 square meter, which is an area for a tool sold by the piece.

Two smaller things. The title says Brushless Mini Chainsaw while the second bullet describes a 700 watt high-power pure copper motor — pure copper describes windings and is the phrase used for brushed motors, so the two statements pull in opposite directions and the listing never resolves it. And the 8-second claim for a 6-inch log appears here word for word as it does on three other brands in this search. Item weight is given as 816 grams, which would make it the lightest saw on the page by 200 grams. There is no chain brake.", // TEXTO SEO LONGO
                'pros' => ['2,464 ratings at 4.4, the third deepest sample in this comparison', 'Generous kit: two batteries, two chains, gloves, goggles and tools', 'Named manufacturer rather than an anonymous seller', '30-day money back with a twelve-month warranty', '£39.99 with a presentation box and full accessory set'], // PONTOS POSITIVOS
                'contras' => ['Spec table gives dimensions of 12 x 6 x 4cm for a saw with a 15cm bar', 'Unit Count field reads "1.0 square meter"', 'Title says Brushless while the bullet describes a pure copper motor', 'No chain brake, and the same 8-second claim as three rival brands'], // PONTOS NEGATIVOS
                'specs' => [                                                                        // FICHA TECNICA: O QUE COLOCOU O PRODUTO NESTA POSICAO
                    ['label' => 'Review sample', 'value' => '2,464 ratings, 4.4 stars', 'verdict' => 'good', 'note' => 'The third deepest evidence in this comparison.'],
                    ['label' => 'Manufacturer', 'value' => 'Nantong Senye Electromechanical Technology', 'verdict' => 'good', 'note' => 'Named, which is more traceability than most anonymous sellers offer.'],
                    ['label' => 'Claimed motor', 'value' => '700 W', 'verdict' => 'bad', 'note' => 'Against two 2.0Ah packs, the same order of overstatement as the rest of the budget cluster.'],
                    ['label' => 'Product dimensions field', 'value' => '12 x 6 x 4 cm', 'verdict' => 'bad', 'note' => 'Smaller than a mobile phone, for a saw with a 15cm bar.'],
                    ['label' => 'Unit count field', 'value' => '1.0 square metre', 'verdict' => 'bad', 'note' => 'A unit of area, for a chainsaw.'],
                    ['label' => 'Motor description', 'value' => 'Brushless in the title, pure copper in the bullet', 'verdict' => 'bad', 'note' => 'Pure copper winding is how brushed motors are usually sold.'],
                    ['label' => 'Chain brake', 'value' => 'Not published', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],                                                              // VAZIO DE PROPOSITO: SO ACEITA CITACAO LITERAL COLETADA DA FICHA DO PRODUTO
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'GAEEP Mini Chainsaw Cordless 6 Inch, 2x3000mAh, 8 m/s, Auto Oiler',       // NOME (ENCURTADO)
                'price' => '£33.99',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 121,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81f0uMmpBrL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'GAEEP 6 inch cordless mini chainsaw with two batteries and charger',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FW4RB3CZ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'One of only two budget saws with automatic chain oiling and a published chain speed — and its two stated weights are 2.2 times apart.', // TEXTO CURTO (CARD)
                'body' => "Automatic chain lubrication is the feature worth having here and most of the £39.99 cluster does not offer it. A chain running dry on a bar wears both parts quickly and cuts badly, and a system that feeds oil continuously while you work removes the one maintenance step people forget. Combined with tool-free chain tensioning, two 3000mAh batteries giving a stated 60 minutes, a dual-switch starting lock, a debris guard and a hand guard, £33.99 buys a well-equipped saw.

It also publishes a chain speed of 8 metres per second in the product overview, which puts it between the Supstable's implausible 10 and the WORX's 5.5. Only three budget listings in this search publish that figure at all.

The weight is the problem, and it is the same problem the SEESII has. The third bullet says the saw weighs only 2.5 lbs, which is 1.13 kilograms, and is therefore suitable for one-handed use by women and seniors. The specification table says Item weight: 2.51 kg. Somebody has taken the pounds figure and written it into the kilogram field, and the result is that the listing advertises a saw weighing 1.13 kilos and ships one weighing 2.51 — more than double, on the specification a first-time buyer cares about most. One hundred and twenty-one ratings at 4.2 stars is a modest sample, and the 8-second claim for a 6-inch log appears here too. There is no chain brake.", // TEXTO SEO LONGO
                'pros' => ['Automatic chain lubrication, which most of the budget cluster lacks', 'Publishes a chain speed of 8 m/s, between the WORX and the Supstable', 'Tool-free chain tensioning and two 3000mAh batteries', 'Dual-switch starting lock, debris guard and hand guard', 'Cheapest saw here with auto oiling, at £33.99'], // PONTOS POSITIVOS
                'contras' => ['Bullet says 2.5 lbs (1.13kg), spec table says 2.51kg — 2.2x apart', 'The pounds figure appears to have been written into the kilogram field', '121 ratings is a modest sample', 'No chain brake, and the same 8-second cutting claim as three rivals'], // PONTOS NEGATIVOS
                'specs' => [                                                                        // FICHA TECNICA: O QUE COLOCOU O PRODUTO NESTA POSICAO
                    ['label' => 'Chain speed', 'value' => '8 m/s', 'verdict' => 'neutral'],
                    ['label' => 'Oiling', 'value' => 'Automatic', 'verdict' => 'good', 'note' => 'Feeds the bar continuously rather than needing a button press.'],
                    ['label' => 'Weight', 'value' => '1.13 kg bullet, 2.51 kg table', 'verdict' => 'bad', 'note' => '2.2 times apart.'],
                    ['label' => 'Cutting claim', 'value' => '6-inch log in 8 seconds', 'verdict' => 'bad', 'note' => 'The same sentence published by three other brands in this search.'],
                    ['label' => 'Review sample', 'value' => '121 ratings, 4.2 stars', 'verdict' => 'bad'],
                    ['label' => 'Chain brake', 'value' => 'Not published', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],                                                              // VAZIO DE PROPOSITO: SO ACEITA CITACAO LITERAL COLETADA DA FICHA DO PRODUTO
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Bluebow Brushless Mini Chainsaw 6 Inch, 2x4000mAh, Oiler System',         // NOME (ENCURTADO)
                'price' => '£69.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 105,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81LGRMB6rfL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Bluebow brushless mini chainsaw with oiler system and two batteries', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FM8SBX23?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Two 4000mAh batteries and a proper oiler for £69.99, on a listing whose model number, part number and included components are all the numeral 1.', // TEXTO CURTO (CARD)
                'body' => "For £69.99 the hardware is reasonable: two 21V 4.0Ah batteries rather than the 2.0Ah packs the cheap cluster ships, giving a stated 60 to 80 minutes of cutting; a press-fill oiler system that lubricates the whole chain from a reservoir; two spare chains; and goggles and anti-slip gloves in the box. At 1.98 kilograms in the specification table it is genuinely one of the lighter saws here, and the table and the bullets do not contradict each other on weight, which puts it ahead of four rivals on that alone.

The claims are percentages without baselines. The brushless motor is said to deliver 50% greater durability and boost energy efficiency by 20%, and the oiler is said to give 30% faster cutting speeds and twice the chain life. Greater than what, more efficient than what, faster than what — none of the four is answered, and a percentage with no comparator is a shape rather than a number.

The specification table is unusually careless even for this category. Model Number reads 1. Part Number reads 1. Included Components reads 1. Three separate fields, each containing the numeral one, on a product that ships a saw, two batteries, a charger, two chains, a brush, goggles and gloves. And the Horsepower field reads 1000 Watts, which against 84 watt-hours of battery over the stated 60 to 80 minutes works out at about 70 watts of real sustained draw. One hundred and five ratings at 4.4 stars is a thin sample. No chain brake is mentioned.", // TEXTO SEO LONGO
                'pros' => ['Two 4.0Ah batteries where most of the budget cluster ships 2.0Ah', 'Press-fill oiler system lubricating the whole chain from a reservoir', '1.98kg in the spec table, with no contradicting weight in the bullets', 'Two spare chains, goggles and anti-slip gloves included', '4.4 stars and a complete ready-to-use kit'], // PONTOS POSITIVOS
                'contras' => ['Model Number, Part Number and Included Components all read "1"', 'Four separate percentage claims with no baseline named for any of them', 'Horsepower field says 1000 Watts against about 70W of real draw', '105 ratings, and no chain brake published'], // PONTOS NEGATIVOS
                'specs' => [                                                                        // FICHA TECNICA: O QUE COLOCOU O PRODUTO NESTA POSICAO
                    ['label' => 'Claimed motor', 'value' => '1000 W (spec table)', 'verdict' => 'bad', 'note' => '60 to 80 minutes from 84Wh implies about 70W of real draw. A ratio of roughly 14.'],
                    ['label' => 'Batteries', 'value' => '2 x 4.0Ah', 'verdict' => 'neutral'],
                    ['label' => 'Model Number field', 'value' => '1', 'verdict' => 'bad', 'note' => 'Model Number, Included Components and Part Number all contain the digit 1.'],
                    ['label' => 'Review sample', 'value' => '105 ratings, 4.4 stars', 'verdict' => 'bad'],
                    ['label' => 'Chain brake', 'value' => 'Not published', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],                                                              // VAZIO DE PROPOSITO: SO ACEITA CITACAO LITERAL COLETADA DA FICHA DO PRODUTO
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'ARTKUNST 6 Inch Mini Electric Chainsaw, 21V, 2 Batteries, 4" and 6" Chains', // NOME (ENCURTADO)
                'price' => '£39.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 452,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71IArKX7g7L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'ARTKUNST mini electric chainsaw with two batteries and tool case',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09X93FZV5?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only saw here that ships two bar lengths, and the only one whose spec table calls a cordless battery tool corded, manual and battery powered at once.', // TEXTO CURTO (CARD)
                'body' => "Two bar sizes in one box is genuinely useful and unique on this page. ARTKUNST supplies both a 6-inch chain and a 4-inch chain with its own guide plate, so you can fit the shorter bar for close pruning where a longer one would foul, and the longer one for firewood. For £39.99 with two 21V 2000mAh batteries, a tool case, gloves and goggles, that is a lot of kit.

It is also unusually specific about what it is. The listing publishes the battery voltage and capacity plainly — 21 volts, 2000mAh — which is what lets you do the arithmetic on every claim in this article, and it states a chain speed of 13.2 feet per second, or 4.02 metres per second. That is the slowest figure published by any budget saw here and, being slower than the WORX and the NovorikX, it is also the most believable. Four hundred and fifty-two ratings at 4.4 stars is a reasonable sample.

Three problems. The specification table gives Power source as Corded Electric, Manual, Battery Powered — three power sources at once for a saw that has one, and neither corded nor manual describes anything in the box. The weight appears twice and disagrees: the third bullet says 2.2 lbs, which is 1 kilogram, while the table says 700 grams. And the Horsepower field reads 600 Watts, which against 42 watt-hours of battery and the stated 40 to 60 minutes is roughly 50 watts of real draw. There is no chain brake; the listing lists six safety features and every one is a guard, a button or an item of protective equipment.", // TEXTO SEO LONGO
                'pros' => ['Ships both a 6-inch and a 4-inch chain with guide plate, unique here', 'Publishes battery voltage and capacity plainly at 21V and 2000mAh', 'Its 4.02 m/s chain speed is the most believable budget figure on the page', '452 ratings at 4.4 stars with a tool case, gloves and goggles', 'Two batteries charging in 1.5 to 2 hours for £39.99'], // PONTOS POSITIVOS
                'contras' => ['Power source field reads "Corded Electric, Manual, Battery Powered"', 'Bullet says 1kg, spec table says 700g', 'Horsepower field says 600 Watts against about 50W of real draw', 'All six listed safety features are guards, buttons or PPE, not a brake'], // PONTOS NEGATIVOS
                'specs' => [                                                                        // FICHA TECNICA: O QUE COLOCOU O PRODUTO NESTA POSICAO
                    ['label' => 'Chains supplied', 'value' => '6-inch and 4-inch with guide plate', 'verdict' => 'good', 'note' => 'Unique in this search. The 4-inch chain suits precise work the 6-inch cannot do.'],
                    ['label' => 'Battery', 'value' => '21V 2000mAh, stated plainly', 'verdict' => 'good', 'note' => 'Publishing voltage and capacity is what makes the arithmetic in this article possible.'],
                    ['label' => 'Chain speed', 'value' => '13.2 ft/s (4.02 m/s)', 'verdict' => 'good', 'note' => 'The slowest figure published by any budget saw here, and therefore the most believable.'],
                    ['label' => 'Power source field', 'value' => 'Corded Electric, Manual, Battery Powered', 'verdict' => 'bad', 'note' => 'Three power sources at once, for a saw that has one.'],
                    ['label' => 'Weight', 'value' => '1 kg bullet, 700 g table', 'verdict' => 'bad'],
                    ['label' => 'Horsepower field', 'value' => '600 Watts', 'verdict' => 'bad', 'note' => 'Against 42Wh and the stated 40 to 60 minutes, real draw is roughly 50W.'],
                    ['label' => 'Review sample', 'value' => '452 ratings, 4.4 stars', 'verdict' => 'neutral'],
                    ['label' => 'Chain brake', 'value' => 'Not published', 'verdict' => 'bad', 'note' => 'The listing names six safety features and every one is a guard, a button or protective equipment.'],
                ],
                'review_quotes' => [],                                                              // VAZIO DE PROPOSITO: SO ACEITA CITACAO LITERAL COLETADA DA FICHA DO PRODUTO
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'SYEONKOS Mini Chainsaw Cordless 6 Inch, 2x4000mAh, 2 Chains',             // NOME (ENCURTADO)
                'price' => '£32.29',                                                                // PRECO
                'rating' => 4.1,                                                                    // NOTA
                'reviews_count' => 78,                                                              // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71iV6IGyBnL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'SYEONKOS 6 inch cordless mini chainsaw with two large batteries',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F21H45J9?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest saw here at £32.29, with 8000mAh in the title that turns out to be two 4000mAh batteries added together, and motor RPM in the chain speed field.', // TEXTO CURTO (CARD)
                'body' => "Thirty-two pounds twenty-nine is the lowest price in this comparison and the kit is the usual budget set: two batteries, two chains, a safety lock requiring two buttons, a blade guard, a handle guard and goggles. The specification table gives the weight as 1.1 kilograms and no bullet contradicts it, which — remarkably — makes this one of only four listings here whose weight you can trust.

The title advertises 8000mAh Large Capacity Batteries. The third bullet explains that this means two 4000mAh batteries. Eight thousand is the sum of two packs you can only use one at a time, which is the same arithmetic we found across USB-C chargers advertising the sum of their ports: a real specification presented at double its useful value. One battery is 84 watt-hours, and the stated 80 to 100 minutes of uninterrupted work from it implies about 56 watts of sustained draw — against the 800 watt motor in the first bullet, a ratio of fourteen, the largest gap in this search.

The chain speed field contains 21000 RPM. Revolutions per minute is a rotational figure and chain speed is linear, measured in metres per second, so the field holds the wrong quantity entirely — and 21,000 RPM is a motor's no-load speed, not what reaches the chain through the sprocket. The bullet compounds it by writing 21,000 RPM/minute, which is revolutions per minute per minute, a rate of acceleration. And the bullet headed High Power Brushless Motor describes an 800 watt pure copper motor, which is how brushed motors are usually sold. Seventy-eight ratings at 4.1 stars is a thin sample and the second-lowest average here. No chain brake.", // TEXTO SEO LONGO
                'pros' => ['Cheapest saw in this comparison at £32.29', 'Weight of 1.1kg is stated once and not contradicted anywhere', 'Two batteries and two chains included with guards and goggles', 'Two-button safety lock preventing accidental starts'], // PONTOS POSITIVOS
                'contras' => ['"8000mAh" in the title is two 4000mAh batteries added together', 'Chain speed field contains 21000 RPM, which is not a chain speed', 'Bullet writes "21,000 RPM/minute", which is an acceleration', '800W claimed against about 56W of real draw, the biggest gap here'], // PONTOS NEGATIVOS
                'specs' => [                                                                        // FICHA TECNICA: O QUE COLOCOU O PRODUTO NESTA POSICAO
                    ['label' => 'Price', 'value' => 'The cheapest here', 'verdict' => 'good', 'note' => 'Lowest price in this comparison.'],
                    ['label' => 'Weight', 'value' => '1.1 kg', 'verdict' => 'good', 'note' => 'Stated once and contradicted nowhere, one of only four listings here whose weight you can trust.'],
                    ['label' => 'Battery claim', 'value' => '8000mAh in the title', 'verdict' => 'bad', 'note' => 'Its own bullet explains this is two 4000mAh batteries, and you can only use one at a time.'],
                    ['label' => 'Chain speed field', 'value' => '21000 RPM', 'verdict' => 'bad', 'note' => 'RPM is rotational; chain speed is linear, in m/s. The field holds the wrong quantity entirely.'],
                    ['label' => 'Claimed motor', 'value' => '800 W', 'verdict' => 'bad', 'note' => '80 to 100 minutes from 84Wh implies about 56W of real draw. A ratio of 14, the largest gap in this search.'],
                    ['label' => 'Review sample', 'value' => '78 ratings, 4.1 stars', 'verdict' => 'bad', 'note' => 'A thin sample and the second-lowest average here.'],
                    ['label' => 'Chain brake', 'value' => 'Not published', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],                                                              // VAZIO DE PROPOSITO: SO ACEITA CITACAO LITERAL COLETADA DA FICHA DO PRODUTO
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
        $this->command?->info("MiniChainsawsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
