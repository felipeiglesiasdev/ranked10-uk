<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class ResistanceBandsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE FAIXAS ELASTICAS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=resistance+bands+set&rh=p_36%3A1500-  (19 ASINS EM 22 CARDS)
        // CATEGORIA FITNESS. SAZONAL: PICO EM JANEIRO.
        //
        // ─── ACHADO PRINCIPAL: "150 lbs" E UMA SOMA, NAO UMA FAIXA ───
        // 1. OS KITS DE TUBO COM ALCA SAO ANUNCIADOS POR UM NUMERO UNICO E GRANDE. A HPYGN
        //    ESCREVE A CONTA INTEIRA NO BULLET: "5 different resistance level 10lbs,
        //    20lbs, 30lbs, 40lbs and 50lbs... maximum resistance level of 150lbs".
        //    10+20+30+40+50 = 150. O NUMERO DO TITULO SO EXISTE SE VOCE ENGATAR OS CINCO
        //    TUBOS NO MESMO PAR DE ALCAS AO MESMO TEMPO. A PORTENTUM PUBLICA A MESMA
        //    TABELA EM DOIS SISTEMAS (4,5 / 9 / 13,5 / 18 / 22,5 kg = 10/20/30/40/50 lb).
        //    E NENHUM DOS TRES ANUNCIOS DE TUBO DIZ PARA QUANTO O MOSQUETAO OU A ANCORA DE
        //    PORTA FORAM DIMENSIONADOS — QUE E O QUE ARREBENTA PRIMEIRO.
        // 2. A COFOF, QUE E A MAIS AVALIADA DA BUSCA COM 5.289, ESTAMPA "Stackable up to
        //    150lbs" NO TITULO E NAO PUBLICA A RESISTENCIA DE NENHUMA DAS CINCO FAIXAS
        //    INDIVIDUALMENTE. SO A SOMA.
        //
        // ─── ACHADO SECUNDARIO: FORCA DE ELASTICO E FAIXA, NAO NUMERO ───
        // 3. A TENSAO DE UM ELASTICO SOBE COM O ALONGAMENTO. UMA FAIXA "DE 50 lb" ENTREGA
        //    50 lb ESTICADA POUCO E MUITO MAIS ESTICADA NO LIMITE. AS FAIXAS DE ARGOLA
        //    (PULL-UP) RECONHECEM ISSO E PUBLICAM INTERVALOS; OS KITS DE TUBO PUBLICAM UM
        //    NUMERO SO. O QUE FOI COLETADO:
        //      AMAZON BASICS .. 2,37-6,80 · 6,80-15,87 · 11,34-29,48 · 15,87-38,55 ·
        //                       22,68-56,70 kg   (= 5-15 · 15-35 · 25-65 · 35-85 ·
        //                       50-125 lb, CONVERSAO EXATA)
        //      FOKKY .......... 5-15 · 15-35 · 25-65 · 35-85 · 50-125 LBS
        //      NOONCRAZY ...... 8-15 · 15-35 · 25-65 · 35-85 · 50-125 LBS
        //      FITBEAST ....... 5-15 · 15-35 · 30-60 · 40-80 · 50-125 LB
        //      ZACRO .......... 15-25 · 20-35 · 30-50 · 40-80 · 50-125 · 60-170 lbs
        //      IRON CORE ...... 2-10 · 9-16 · 13-23 · 18-36 · 23-54 kg
        //      BIONIX ......... 15 lb (NUMERO UNICO) · 25-65 · 35-85 · 50-125 lb
        //      HPYGN / PORTENTUM / COFOF .. NUMERO UNICO POR TUBO, OU NADA
        //    NENHUMA DAS DEZ DIZ A QUE ALONGAMENTO O NUMERO SE APLICA. UMA FAIXA DE
        //    "50-125 lb" TEM 2,5x DE VARIACAO DENTRO DELA MESMA.
        // 4. UM SPEC, QUATRO MARCAS. AMAZON BASICS (EM kg COM DUAS CASAS), FOKKY E
        //    NOONCRAZY PUBLICAM PRATICAMENTE A MESMA TABELA DE CINCO INTERVALOS, E A
        //    FITBEAST DIFERE EM DOIS DEGRAUS. FOKKY E FITBEAST DAO O MESMO COMPRIMENTO DE
        //    ARGOLA: 208 cm. E O MESMO CONJUNTO DE FABRICA COM QUATRO ETIQUETAS.
        //
        // ─── ACHADO COM CONSEQUENCIA: A CONTRADICAO DE ALERGIA A LATEX ───
        // 5. A FOKKY ESCREVE NO TERCEIRO BULLET: "Especially suitable for people who are
        //    ALLERGIC TO LATEX". A TABELA DE ESPECIFICACAO DA MESMA PAGINA DECLARA
        //    "Material: NATURAL RUBBER". BORRACHA NATURAL E LATEX — E O MESMO MATERIAL.
        //    ALERGIA A LATEX DE BORRACHA NATURAL E REAL E PODE SER GRAVE, E ESSA E A UNICA
        //    CONTRADICAO QUE ACHAMOS EM QUALQUER CATEGORIA COM RISCO CLINICO DIRETO.
        //    A UNICA DA LISTA GENUINAMENTE SEM LATEX E A ZACRO, QUE E TPE — E ELA NAO FAZ
        //    NENHUMA ALEGACAO DE ALERGIA.
        //
        // ─── OUTROS ACHADOS ───
        // 6. A IRON CORE FITNESS ABRE COM "This 4-band set includes" E EM SEGUIDA NOMEIA
        //    CINCO CORES (Yellow, Red, Black, Purple, Green). O CAMPO DE COR DA TABELA DIZ
        //    "5 Set". SAO CINCO.
        // 7. A BIONIX PUBLICA TRES FAIXAS COMO INTERVALO E UMA COMO NUMERO SOLTO ("Red
        //    15lb"), E O CAMPO DE COR LISTA SO TRES CORES (Red, Black, Purple) ENQUANTO O
        //    BULLET DESCREVE QUATRO, INCLUINDO A VERDE.
        // 8. SO DUAS DAS DEZ PUBLICAM O COMPRIMENTO DA ARGOLA, QUE E O QUE DEFINE O
        //    ALONGAMENTO E PORTANTO A FORCA: FOKKY E FITBEAST COM 208 cm, E A IRON CORE
        //    COM "2 m around the full loop, or approximately 1 m when laid flat" — A UNICA
        //    QUE EXPLICA AS DUAS FORMAS DE MEDIR, QUE E ONDE A CONFUSAO MORA.
        // 9. A ZACRO E TPE E DIZ "stretching up to 3 times their original length"; TPE
        //    ESTICA MENOS E DEFORMA MAIS QUE LATEX NATURAL AO LONGO DO TEMPO, E ELA E A
        //    MAIS CARA DAS FAIXAS DE ARGOLA A £25.49. TAMBEM E A UNICA COM SEIS FAIXAS E
        //    COM UMA FAIXA DE 60-170 lb, A MAIOR DA BUSCA.
        // 10. A AMAZON BASICS E A UNICA QUE CITA CERTIFICACAO DE MATERIA-PRIMA: BORRACHA
        //    CERTIFICADA FSC (FSC N004130). E A UNICA CREDENCIAL DE TERCEIRO EM DEZ.
        // 11. A PORTENTUM PROMETE "10 years warranty" NUM PRODUTO DE £19.01 FEITO DE
        //    ELASTICO — MATERIAL QUE PERDE ELASTICIDADE POR OXIDACAO E LUZ MESMO SEM USO.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: O SUSPENSION TRAINER (B0C69M1FZN), QUE E OUTRO PRODUTO; AS FAIXAS DE
        // PEDAL COM ALCA (KUZARO, WOQQW), QUE SAO APARELHO DE REMO SENTADO; E TUDO ABAIXO
        // DE 300 AVALIACOES. A LISTA MISTURA DE PROPOSITO OS DOIS TIPOS — ARGOLA LONGA
        // PARA BARRA FIXA E TUBO COM ALCA — PORQUE OS DOIS SAO VENDIDOS EM LIBRA E QUEREM
        // DIZER COISAS DIFERENTES COM ELA, QUE E O ASSUNTO DO ARTIGO.
        // DENTRO: NOTA DE 4.3 A 4.6, PRECO DE £16.98 A £32.95, DEZ MARCAS.
        //
        // FOCUS KEYWORD: best resistance bands
        // VARIACOES TRABALHADAS: resistance bands uk / resistance bands set /
        // pull up assistance bands / resistance bands with handles /
        // exercise bands for home / latex free resistance bands /
        // resistance band lbs explained / loop bands / door anchor resistance bands
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'fitness',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Fitness',                    // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best fitness gear and activewear available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-resistance-bands',                                      // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Resistance Bands 2026: 10 Ranked on What the Pounds Mean', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Resistance Bands 2026: Top 10 Compared',           // TITLE DA ABA/GOOGLE (45 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best resistance bands on Amazon by what their pound ratings actually describe, comparing loop and tube sets from £16.98 to £32.95.', // META DESCRIPTION (150 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best resistance bands',                             // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Every set in this comparison is sold in pounds, and the pounds mean two completely different things depending on which kind you are looking at. On a tube set with handles, the headline is a sum: HPYGN spells it out in its own bullet, listing bands of 10, 20, 30, 40 and 50lbs and then a maximum of 150lbs, which you only reach by clipping all five tubes onto one pair of handles at once. On a loop band for pull-up assistance, the number is a range, because latex tension climbs as you stretch it — so a band labelled 50-125lb delivers 50 at modest stretch and 125 near its limit, a 2.5-fold spread inside one band, and not one listing here states the elongation either figure refers to. Then there is the set that publishes nothing at all: the most-reviewed product in the search prints Stackable up to 150lbs on the title and never gives an individual band a rating. Below we rank the best resistance bands on Amazon in August 2026 by what their numbers actually describe — and flag one listing whose latex-allergy claim contradicts its own material field.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "The best resistance bands for you depend on which of the two products you actually want, and the pound figure will not tell you. For assisted pull-ups and mobility work you want long loop bands, and there you should read the range rather than the top number: a 50-125lb band gives you 50lb of help at the bottom of the movement and 125 at the top, which is exactly the profile a pull-up needs. For general strength work at home you want tube bands with handles and a door anchor, and there the headline is a sum of the whole set, so a 150lb kit is really a 50lb band plus four lighter ones — buy it for the range of options, not the top figure. Crucially, check the loop length if you can find it, because force depends entirely on how far you stretch the band and only three listings here publish one; 208cm is the standard, and a set that does not say is a set you cannot compare. And if you have a latex allergy, read the material field rather than the marketing: natural rubber is latex, one listing here claims to suit latex-allergic users while declaring natural rubber in its own specification, and the only genuinely latex-free set on this page is the TPE one, which makes no allergy claim at all.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                          // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 16:00:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Amazon Basics Resistance Bands Set of 5, 2.37-56.70kg, FSC Rubber',       // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£19.99',                                                                // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 324,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61H987ceI9L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best resistance bands',                                              // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DNQ1BV41?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best resistance bands here for one reason: it publishes all five ranges in kilograms to two decimal places and never quotes a summed total anywhere.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Two point three seven to six point eight zero kilograms. Six point eight zero to fifteen point eight seven. Eleven point three four to twenty-nine point four eight. Fifteen point eight seven to thirty-eight point five five. Twenty-two point six eight to fifty-six point seven zero. That is every band in the set, as a range, in the unit a British buyer uses, to two decimal places — and there is no headline total anywhere on the listing. In a category where the biggest number on the box is usually five bands added together, that restraint is the whole reason this is first.

Convert them and you find 5-15, 15-35, 25-65, 35-85 and 50-125lb, which is the same ladder three other brands on this page publish. That is useful in itself: it tells you these sets share a factory specification, and that paying more does not buy more resistance. What Amazon Basics adds is the only third-party credential in the comparison — FSC-certified rubber, certificate N004130 — which speaks to where the latex came from rather than how strong it is, but is more than anyone else offers.

Two reservations. Three hundred and twenty-four ratings is by far the thinnest sample here, against 5,289 for the most-reviewed set, so the 4.6 stars rest on relatively few people. And the listing gives no loop length, so while you know the force range you cannot work out the stretch it applies at — the same gap that affects seven of these ten. There are no handles, door anchor or ankle straps either; this is five bands and nothing else.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Publishes all five ranges in kilograms to two decimal places', 'Quotes no summed total anywhere, unlike the tube sets here', 'FSC-certified rubber, the only third-party credential in this comparison', '4.6 stars, joint highest rating on this page', '100% natural rubber with colour-coded progression'], // PONTOS POSITIVOS
                'contras' => ['324 ratings, by far the thinnest sample in this comparison', 'No loop length published, so the stretch behind the figures is unknown', 'Bands only: no handles, door anchor or ankle straps', 'Same factory ranges as three cheaper sets on this page'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'FitBeast Pull Up Assistance Bands, 5 Levels 5-125lb, 208cm Loops',        // NOME (ENCURTADO)
                'price' => '£19.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 4180,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/713+d0l38zL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'FitBeast pull up assistance resistance bands set',                   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B087CSNDRT?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The deepest sample among the loop sets at 4,180 ratings, publishing both the five force ranges and the one figure that makes them meaningful: a 208cm loop.', // TEXTO CURTO (CARD)
                'body' => "Four thousand one hundred and eighty ratings at 4.6 stars is the deepest evidence behind any loop band set on this page, and the first bullet does two things almost nobody else manages. It gives the five bands as ranges — 5-15, 15-35, 30-60, 40-80 and 50-125lb — and it gives the loop length, 208cm. That second number is what makes the first usable. Band force is a function of how far you stretch it, so a rating without a length is a rating without a reference; knowing the loop is 208cm tells you roughly where in the range you will be sitting for a given exercise.

For assisted pull-ups the range structure is exactly right. Hanging at the bottom of the movement the band is at full stretch and gives you the top of its range; as you pull up and it slackens, the assistance falls away and you finish under your own power. A single-number rating cannot describe that, which is why the tube sets further down this page are the wrong tool for the job.

Two caveats. Grip pads are included, which matter more than they sound when a 125lb band is compressing your palm against a bar. But the material is natural latex with no allergy alternative in the range, and FitBeast quotes durability as supporting 3 to 4 times stretching without stating how many cycles — latex perishes with light and oxygen regardless of use. And the top band, at 50-125lb, is the same top band Fokky, nooncrazy and Amazon Basics all publish.", // TEXTO SEO LONGO
                'pros' => ['4,180 ratings at 4.6, the deepest loop band sample in this comparison', 'Publishes all five force ranges rather than a single summed figure', 'Gives the 208cm loop length, which only two others here do', 'Grip pads included, useful with the heavier bands', 'Range structure suits assisted pull-ups exactly'], // PONTOS POSITIVOS
                'contras' => ['Natural latex with no allergy-safe alternative in the range', 'Durability quoted as 3 to 4 times stretch with no cycle count', 'No door anchor rating published for the included buckle', 'Same 50-125lb top band as three other sets on this page'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Iron Core Fitness Pull Up Bands, 2-54kg, 2m Loop, Workout Guide',         // NOME (ENCURTADO)
                'price' => '£32.95',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 2378,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81BlBuuozML._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Iron Core Fitness pull up assistance bands in five colours',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B082P722ZY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing that explains both ways of measuring a loop — 2m around, 1m laid flat — which is where most of the confusion in this category comes from.', // TEXTO CURTO (CARD)
                'body' => "Ask two people how long a resistance band is and you will get two answers, because a loop can be measured around its circumference or laid flat, and the two differ by a factor of two. Iron Core Fitness is the only listing in this comparison that gives both: each band measures 2m around the full loop, or approximately 1m when laid flat. That single sentence resolves the ambiguity that makes every other length figure on this page uncertain — FitBeast and Fokky both say 208cm without saying which way they measured.

The ranges are published in kilograms rather than pounds, which for a British buyer is the right unit: 2-10, 9-16, 13-23, 18-36 and 23-54kg. Those top out at about 119lb, lower than the 125lb everyone else claims, and the honest reading is that Iron Core is quoting a narrower, more conservative band of the same curve. Two thousand three hundred and seventy-eight ratings at 4.6 stars, an instruction guide, an e-book and workout videos.

Two things. At £32.95 this is the most expensive set here by £7.46, and what the money buys is the documentation and the measuring honesty rather than more rubber — at 410g for five bands it is the lightest set in the comparison. And the first bullet opens with This 4-band set includes and then names five colours, while the specification field says 5 Set. It is five bands. On a listing this careful about lengths, the miscount is a surprise.", // TEXTO SEO LONGO
                'pros' => ['The only listing that gives loop length both around and laid flat', 'Ranges published in kilograms, the right unit for a UK buyer', 'Conservative 23-54kg top band rather than the usual 125lb claim', 'Instruction guide, e-book and workout videos included', '2,378 ratings at 4.6 stars'], // PONTOS POSITIVOS
                'contras' => ['£32.95, the most expensive set in this comparison by £7.46', 'Opens with 4-band set and then lists five bands', '410g for five bands, the lightest set here', 'No handles, ankle straps or door anchor included'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'nooncrazy Resistance Bands Set 8-125lb, 14.5cm Handles, Steel Carabiners', // NOME (ENCURTADO)
                'price' => '£19.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 2365,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81hnikckP7L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'nooncrazy resistance bands set with foam handles and door anchor',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09KN6KDZJ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing that publishes the hardware dimensions — 14.5cm handles, 0.5cm foam, thickened steel carabiners — which is what actually fails on a band set.', // TEXTO CURTO (CARD)
                'body' => "Bands rarely break. Carabiners, handles and door anchors do, and nooncrazy is the only manufacturer in this comparison that treats them as specifications rather than accessories: handles extended to 14.5cm, protective foam thickened to 0.5cm, and improved thick stainless steel carabiners described as more sturdy and less fragile. On a set whose headline claim assumes you might clip several bands to one handle, the hardware is the part that decides whether the claim is safe, and nobody else even mentions it.

The five ranges are published properly — 8-15, 15-35, 25-65, 35-85 and 50-125lb, colour coded from extra-light yellow to extra-strong green — and 2,365 ratings at 4.6 stars is a solid record for £19.99. The kit includes two foam handles, a door anchor and a protective cover.

Two things to note. The bullet describing five resistance levels then says you can switch between the four levels at any time, which is a small proofreading slip on the number of bands. And the fifth bullet warns that the instruction manual is English not guaranteed, which is an unusually candid disclosure and worth knowing if you are relying on the guide rather than the internet. The ranges themselves are, once again, the same factory ladder as Amazon Basics and Fokky, differing only in the floor of the lightest band.", // TEXTO SEO LONGO
                'pros' => ['The only listing that publishes handle, foam and carabiner specifications', '14.5cm handles with 0.5cm foam and thickened steel carabiners', 'All five ranges published from 8-15lb to 50-125lb', '2,365 ratings at 4.6 stars for £19.99', 'Door anchor, protective cover and carry bag included'], // PONTOS POSITIVOS
                'contras' => ['One bullet says five levels and then refers to four levels', 'Manual explicitly stated as English not guaranteed', 'No loop length published', 'Same factory range ladder as three other sets here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'PORTENTUM Resistance Bands Kit, 12 Pieces, 4.5-22.5kg Tubes',             // NOME (ENCURTADO)
                'price' => '£19.01',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 3599,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71WjWOMzgmL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'PORTENTUM 12-piece resistance bands kit with handles and anklets',   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BR8JHGSP?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best of the tube sets because it publishes every band in both kilograms and pounds — which is also how you can see that its 150lb headline is those five numbers added up.', // TEXTO CURTO (CARD)
                'body' => "The ninth bullet is the useful one: Black 22.5kg / 50lbs, Blue 18kg / 40lbs, Red 13.5kg / 30lbs, Green 9kg / 20lbs, Yellow 4.5kg / 10lbs. Every band, in both units, correctly converted. That is the most complete disclosure any tube set on this page manages, and it is also, once you add the column up, the proof of what the title means: 10 plus 20 plus 30 plus 40 plus 50 is exactly the 150lb in the headline. PORTENTUM is not hiding the arithmetic, it is publishing it — which is why it ranks above the two tube sets that do not.

The kit is twelve pieces: five tubes, two handles, two ankle straps, a door anchor, a bag and a manual, for £19.01 with 3,599 ratings at 4.6 stars — the second deepest sample here. For general home strength work that is a sensible amount of equipment.

Two reservations, one of them odd. The third bullet promises a 10 years warranty on a product made of latex, a material that oxidises and perishes with light exposure whether or not you use it; no band set lasts a decade in practice, and a warranty that long on a consumable is a claim rather than a commitment. And reaching the advertised 150lb means clipping all five tubes to one pair of handles simultaneously, and PORTENTUM does not state what the handles or the door anchor are rated to carry — which is the specification you would actually want before trying it.", // TEXTO SEO LONGO
                'pros' => ['Publishes every band in both kilograms and pounds, correctly converted', 'The most complete disclosure of any tube set in this comparison', '12-piece kit with handles, ankle straps, door anchor and bag', '3,599 ratings at 4.6 stars, the second deepest sample here', '£19.01, among the cheapest complete kits on this page'], // PONTOS POSITIVOS
                'contras' => ['The 150lb headline is the five bands added together, not one band', 'No load rating published for the handles or door anchor', '10-year warranty on a latex product that perishes with light and age', 'Single figures per tube rather than the ranges the loop sets give'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'HPYGN Resistance Bands Set, 5 Tubes 10-50lbs, Door Anchor, Ankle Straps', // NOME (ENCURTADO)
                'price' => '£19.97',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 2951,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81bDXpV3atL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'HPYGN resistance bands set with handles and door anchor',            // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08J8DZD5S?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The listing that gives the whole category away: it names all five tubes at 10, 20, 30, 40 and 50lbs and then states a maximum of 150lbs in the same sentence.', // TEXTO CURTO (CARD)
                'body' => "Bullet four is the clearest sentence in this comparison. The set comes with five different resistance levels — 10lbs, 20lbs, 30lbs, 40lbs and 50lbs — and you can use the bands independently or in any combination with a maximum resistance level of 150lbs. There is the arithmetic, written out by the manufacturer: the number on the front of the box is the sum of everything in it. HPYGN deserves credit for saying so, and any buyer reading that sentence knows exactly what they are getting, which is a 50lb band and four lighter ones.

At £19.97 with 2,951 ratings at 4.5 stars, the kit is the standard five tubes, two cushioned handles, two ankle straps, a door anchor, a training poster, a bag and a guide. The tubes are described as double layered, and the handles as sweatproof and non-slip, which on a set you will be gripping hard matters.

Two things. Like every tube set here, it publishes single figures rather than ranges, so there is no indication of the stretch at which a tube delivers its rated pull — and unlike the loop sets, no length is given either, so both halves of the calculation are missing. And the second bullet describes the material as 100% natural latex and then as extra thick high-grade silicon in the same sentence; latex and silicone are different polymers, and the material field settles on Natural Rubber, which is latex.", // TEXTO SEO LONGO
                'pros' => ['States plainly that the 150lb maximum is the five tubes combined', 'Names all five tube ratings individually', 'Complete kit: handles, ankle straps, door anchor, poster, bag and guide', '2,951 ratings at 4.5 stars', 'Double-layered tubes with sweatproof non-slip handles'], // PONTOS POSITIVOS
                'contras' => ['Single figures per tube with no stretch reference and no length', 'One bullet calls the material both natural latex and high-grade silicon', 'No load rating for the handles that all five tubes would clip to', 'No individual band ranges, unlike every loop set here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Zacro Pull Up Bands Set, 6 Levels 15-170lb, TPE Latex-Free',              // NOME (ENCURTADO)
                'price' => '£25.49',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 2733,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71mMDn2m6SL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Zacro six-level TPE pull up resistance bands set',                   // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CHMJSDWR?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only genuinely latex-free set on this page and the only one with six bands, topping out at 60-170lb — and it makes no allergy claim at all, unlike one that is not latex-free.', // TEXTO CURTO (CARD)
                'body' => "Thermoplastic elastomer rather than natural rubber. That makes this the only set in the comparison that a person with a latex allergy can use, and Zacro never says so — while the Fokky at number ten, which is natural rubber, explicitly advertises itself as suitable for people allergic to latex. The brand that has the safe material stays quiet and the brand that does not makes the claim, which is worth knowing before you shop this category.

Six bands rather than five, published as ranges: 15-25, 20-35, 30-50, 40-80, 50-125 and 60-170lb. That top band is the strongest published figure in the search and genuinely extends what the set can do — for a heavier user starting assisted pull-ups, 170lb of help at full stretch is the difference between attempting the movement and not. Zacro also states the intended user range, 90lb to 300lb-plus, which nobody else does.

Two things to weigh. TPE is not latex and behaves differently: it stretches less far, Zacro quotes three times original length against the three to four times the latex sets claim, and over time it takes a permanent set more readily. And 4.3 stars is the lowest average in this comparison across 2,733 ratings, which is a settled figure rather than noise — the likeliest explanation is exactly that material difference, since TPE bands feel less lively than latex ones. At £25.49 it is also the second most expensive set here.", // TEXTO SEO LONGO
                'pros' => ['TPE rather than natural rubber, the only latex-free set here', 'Six bands with ranges published from 15-25lb up to 60-170lb', '60-170lb top band, the strongest published figure in the search', 'States an intended user weight range of 90 to 300-plus pounds', 'Door anchor, training poster and storage bag included'], // PONTOS POSITIVOS
                'contras' => ['4.3 stars, the lowest average in this comparison', 'TPE stretches less and takes a permanent set more readily than latex', '£25.49, the second most expensive set on this page', 'Never advertises the latex-free property that is its real advantage'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Bionix Long Resistance Bands, Pull Up Band Set, 15-125lb',                // NOME (ENCURTADO)
                'price' => '£16.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 1490,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71foPWY4jcL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Bionix long resistance pull up band set',                            // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08B68JC66?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The joint cheapest set here at £16.99 with 4.6 stars, on a listing that gives three of its four bands as ranges and the fourth as a bare number.', // TEXTO CURTO (CARD)
                'body' => "Sixteen pounds ninety-nine is the joint lowest price in this comparison and 1,490 ratings at 4.6 stars is a good record for it. The set covers pull-up assistance, calisthenics and general resistance work, and unlike the pure loop sets it also ships with handles, a door anchor and a carry bag, so it does both jobs this article distinguishes between — long loops for the bar, handles for everything else.

The band ratings are where the listing wobbles. Three of the four are given as proper ranges — Black 25-65lb, Purple 35-85lb, Green 50-125lb — and the fourth is given as Red 15lb, a bare number with no range at all. Every other loop set on this page publishes a range for every band, precisely because a single number cannot describe a spring. Whether the red band is 5-15 or 15-25 is unresolvable from the listing, and it is the band a beginner would start on.

The specification field then compounds it: the colour list reads Red, Black, Purple — three colours — while the bullet describes four bands including the green. So the page cannot agree on how many bands are in the box. At 700g the set is light, which is consistent with four bands rather than five, but a buyer should not have to weigh the parcel to find out. Everything else here is competent and, at this price, good value.", // TEXTO SEO LONGO
                'pros' => ['£16.99, joint cheapest set in this comparison', '4.6 stars across 1,490 ratings', 'Includes handles and a door anchor as well as long loop bands', 'Three of four bands published as proper ranges', 'Covers both pull-up assistance and handle-based strength work'], // PONTOS POSITIVOS
                'contras' => ['The red band is given as a bare 15lb with no range', 'Colour field lists three colours while the bullet describes four bands', 'No loop length published', 'Four bands rather than the five most sets here provide'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'COFOF Resistance Bands Set with Handles, Stackable to 150lbs',            // NOME (ENCURTADO)
                'price' => '£19.59',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 5289,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81ibLqKRHWL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'COFOF stackable resistance bands set with handles and ankle straps', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DDK8TJWL?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most reviewed set in the search at 5,289 ratings, and the only one of ten that publishes a stackable total without ever rating a single individual band.', // TEXTO CURTO (CARD)
                'body' => "Five thousand two hundred and eighty-nine ratings at 4.5 stars is the deepest sample in this comparison by a clear margin, and at £19.59 the kit is complete: five latex tubes, two cushioned handles, two ankle straps, a door anchor, a training poster, a bag and a guide, with heavy-duty carabiners and reinforced links. A great many people have bought this and been happy, and there is no reason to think the hardware is poor.

The listing is the problem, and it is a simple one. The title says Stackable up to 150lbs. The second bullet says the bands can be used alone or stacked in any combination. And nowhere on the page — not in the title, the five bullets or the specification table — is any individual band given a resistance figure. The rival tube sets at numbers five and six both list their tubes at 10, 20, 30, 40 and 50lbs; COFOF publishes only the sum.

That matters practically rather than pedantically. You will spend almost all of your training on one or two tubes, not five, so the individual ratings are the numbers you use every session and the total is the number you use never. Buying this set means finding out what each band does by trying it. The listing also claims the latex tube has a service life 70% longer than TPE and stretchability increased by 3 times, both without a test, a standard or a comparison product named.", // TEXTO SEO LONGO
                'pros' => ['5,289 ratings, the deepest sample in this comparison by a clear margin', 'Complete kit with handles, ankle straps, door anchor, poster and bag', 'Heavy-duty carabiners and reinforced links specified', '£19.59 with 100% natural latex tubes', '4.5 stars across a very large sample'], // PONTOS POSITIVOS
                'contras' => ['Publishes no resistance figure for any individual band, only the 150lb total', 'The number you use every session is the one the listing omits', 'Claims 70% longer life than TPE with no test or standard cited', 'Claims stretchability increased by 3 times against no named product'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Fokky Resistance Bands Set, 5 Levels 5-125lb, 208cm, Door Anchor',        // NOME (ENCURTADO)
                'price' => '£16.98',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 1322,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/7175tJWAwpL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Fokky five-level resistance bands set with door anchor and handles', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D1CK25B8?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Advertises itself as especially suitable for people who are allergic to latex, and its own specification field declares the material as natural rubber — which is latex.', // TEXTO CURTO (CARD)
                'body' => "The third bullet says the bands are especially suitable for people who are allergic to latex. The specification table on the same page says Material: Natural Rubber. Natural rubber and latex are the same material — natural rubber latex is what the allergy is to, and it is the proteins in it that cause the reaction. This is the only contradiction we have found in any category with a direct clinical consequence: somebody with a diagnosed latex allergy, reading the bullet and buying accordingly, would be handling the exact material they are avoiding.

The rest of the listing is unremarkable and reasonably good value. Five bands published as ranges — 5-15, 15-35, 25-65, 35-85 and 50-125lb — the same ladder as Amazon Basics and nooncrazy, and one of only three sets here that gives the loop length, at 208cm. There are handles and a door anchor, it costs £16.98, and 1,322 ratings sit at 4.5 stars.

None of that is in dispute, and buyers without a latex allergy will very likely find it fine. But the specification a buyer needs most from this particular listing is the one it gets wrong, and it gets it wrong in the direction that could hurt someone. If you are shopping for latex-free bands, the Zacro at number seven is TPE and is the only genuinely latex-free set on this page — and, in the pattern this article keeps finding, it is the one that never mentions allergies at all.", // TEXTO SEO LONGO
                'pros' => ['Publishes all five ranges from 5-15lb to 50-125lb', 'Gives the 208cm loop length, which only two others here do', '£16.98, joint cheapest set in this comparison', 'Handles, door anchor and carry bag included', '1,322 ratings at 4.5 stars'], // PONTOS POSITIVOS
                'contras' => ['Claims to suit latex-allergic users while listing natural rubber as the material', 'Natural rubber is latex, so the claim points the wrong way for a real allergy', 'Same factory range ladder as three other sets on this page', 'No load rating for the door anchor or handles'], // PONTOS NEGATIVOS
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
        $this->command?->info("ResistanceBandsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
