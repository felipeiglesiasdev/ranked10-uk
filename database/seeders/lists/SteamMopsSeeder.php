<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class SteamMopsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE MOPS A VAPOR DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA FILTRADA: /s?k=steam+mop&rh=p_36%3A3000-  (20 ASINS UNICOS)
        // IRMAO DO ARTIGO best-spin-mops, MESMA CATEGORIA HOME.
        //
        // ─── ACHADOS ───
        // 1. "10-IN-1" E "12-IN-1" NAO SAO FUNCOES, SAO ACESSORIOS NA CAIXA — E OS
        //    PROPRIOS ANUNCIOS ENTREGAM ISSO. A NEO VENDE "10 in 1" NO TITULO E ESCREVE
        //    NA BULLET: "2 in 1 Mop & Handheld Function. 10PC Accessory Kit". DUAS
        //    FUNCOES, DEZ PECAS. A VYTRONIX FAZ IGUAL: "10-in-1" NO TITULO, "10 PIECE
        //    ACCESSORY KIT" NA BULLET. A PURSTEAM: "10in1" NO TITULO E "Steam Mop with
        //    10 Accessories" NO MESMO TITULO. A VAX E A UNICA HONESTA: CHAMA DE
        //    "9 Accessories" EM VEZ DE "9-in-1".
        // 2. A ESPECIFICACAO QUE DECIDE DESEMPENHO E A VAZAO DE VAPOR EM g/min, E SO
        //    UM DOS DEZ PUBLICA: A VONHAUS, COM "max 30g/min". TODOS OS OUTROS VENDEM
        //    WATTS, QUE E O QUE ENTRA, NAO O QUE SAI. DOIS APARELHOS DE 1500W PODEM
        //    ENTREGAR VAPOR MUITO DIFERENTE DEPENDENDO DA CALDEIRA E DO BICO.
        // 3. A RUSSELL HOBBS SE CONTRADIZ DUAS VEZES NA MESMA PAGINA. O TITULO DIZ
        //    "30-Second Heat-up, 15-Minute Run-Time"; A BULLET 1 DIZ "super quick 25
        //    second heat up time"; A BULLET 2 DIZ "up to 25 minute steam time".
        //    OS DOIS PARES ESTAO TROCADOS ENTRE SI (30/25 E 15/25).
        // 4. A MESMA RUSSELL HOBBS DECLARA "Volts: 100 - 120" NA BULLET — VOLTAGEM
        //    AMERICANA NUM ANUNCIO BRITANICO, ONDE A REDE E 230 V.
        // 5. A SHARK S8201UKCP DIZ TRES COISAS DIFERENTES SOBRE O QUE VEM NA CAIXA:
        //    O NOME DO PRODUTO DIZ "6 Gripping Pads", A BULLET 1 DIZ "Includes 6x
        //    Dirt Grip pads" E A BULLET 4 DIZ "4 machine-washable Dirt Grip pads
        //    (2 sets)". E O PESO: A BULLET DIZ 3kg E A TABELA DIZ 4,9kg.
        // 6. A SHARK E A UNICA MARCA QUE QUALIFICA A ALEGACAO DE 99,9% DE BACTERIAS,
        //    ESCREVENDO "(Sanitisation studies were conducted under controlled test
        //    conditions)". VILEDA E VYTRONIX PUBLICAM O MESMO 99,9% SEM QUALIFICACAO.
        // 7. TAMANHO DE TANQUE MAL APARECE, E QUANDO APARECE E PEQUENO: SHARK S1000
        //    375 ml, VONHAUS 350 ml, RUSSELL HOBBS 380 ml, VILEDA E NEO 400 ml. COM
        //    30 g/min, 400 ml DAO POUCO MAIS DE 13 MINUTOS DE VAPOR CONTINUO — O QUE
        //    EXPLICA POR QUE A CONTA DE "RUN-TIME" IMPORTA MAIS QUE A DE ACESSORIOS.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: APARELHOS COM MENOS DE 120 AVALIACOES (VARIOS LANCAMENTOS COM NOTA
        // 4.7-5.0 SOBRE 14 A 26 AVALIACOES); A DYSON PENCILWASH, COM 3.1 SOBRE 34.
        // A SHARK APARECE TRES VEZES PORQUE DOMINA A CATEGORIA NO REINO UNIDO, COMO A
        // VILEDA DOMINA OS MOPS COMUNS — CADA ASIN COM CONTAGEM PROPRIA, SEM POOL.
        // DENTRO: NOTA DE 3.9 A 4.6, PRECO DE £33.99 A £129.99, OITO MARCAS.
        //
        // FOCUS KEYWORD: best steam mop
        // VARIACOES TRABALHADAS: steam cleaner / floor steamer / steam mop for hard floors /
        // handheld steam cleaner / steam mop and handheld / best steam cleaner for floors /
        // upright steam mop / steam mop for laminate / chemical free floor cleaner
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "home", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-steam-mop',                                          // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Steam Mop 2026: 10 Ranked, and What 10-in-1 Really Means', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Steam Mop 2026: Top 10 Floor Steamers Ranked',  // TITLE DA ABA/GOOGLE (50 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best steam mop options on Amazon by tank size, heat-up time and real steam output, comparing floor steamers from £33.99 to £129.99.', // META DESCRIPTION (147 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best steam mop',                                 // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Half the steam mops on Amazon sell themselves as 10-in-1 or 12-in-1, and the number means something much smaller than it sounds. One listing in this comparison says 10 in 1 in its title and then explains, three lines down, that it has a 2 in 1 mop and handheld function with a 10-piece accessory kit. Two functions, ten bits of plastic. Another says 10-in-1 in the title and 10 PIECE ACCESSORY KIT in the bullets. It is the same claim every time, and only one brand here is honest enough to write nine accessories rather than 9-in-1. Meanwhile the specification that actually determines how well a floor steamer cleans — steam output in grams per minute — appears on exactly one of the ten listings we checked. Below we rank the best steam mop options on Amazon in August 2026 on tank size, heat-up time, cord length and what each manufacturer is prepared to put in writing.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Choosing the best steam mop is easier once you stop counting attachments. What decides whether the thing gets used every week is mundane: how long it takes to make steam, how long it keeps making it before the tank runs dry, and how far the cord reaches. Tanks in this category run between 350ml and 400ml, and at a typical 30 grams of steam a minute that is somewhere near a quarter of an hour of continuous cleaning — enough for a kitchen, not enough for a whole floor of the house without a refill. By contrast, the accessory kit is the part you use twice and then leave in the box. Meanwhile, treat the 99.9% of bacteria claim with the scepticism the one brand here that qualifies it clearly thinks it deserves: steam does sanitise, but only where it dwells long enough, which is not the same as passing a mop head over a floor at walking pace. And if a listing cannot agree with itself on whether its own heat-up time is 25 or 30 seconds, assume the rest of its numbers had the same amount of care applied.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 15:30:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Shark Steam Mop S1000UK, 375ml Tank, 1050W, Lightweight',                 // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£39.00',                                                                // PRECO (COLETADO EM 28/08/2026)
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 6538,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51lgpDWd1kL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best steam mop',                                                     // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07RZ22TS1?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best steam mop here because it is a steam mop and says so: 375ml, 1050W, 5.5m cord, 1.8kg, no accessory count in the title and no unqualified bacteria claim.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "The S1000 is the cheapest way to buy a floor steamer from a company that specialises in them, and the listing is a model of how this should be written. Shark publishes the tank at 375ml, the motor at 1050W, the cord at 5.5m, the weight at 1.8kg and lists exactly what is in the box: the mop, two Dirt Grip pads and a filling flask. No 10-in-1, no accessory count masquerading as a function count.

It also does something no other brand in this comparison manages. Where Vileda and Vytronix print 99.9% of bacteria as a flat claim, Shark adds the qualification in brackets — sanitisation studies were conducted under controlled test conditions. That is the honest footnote, and it matters, because steam kills bacteria as a function of temperature and dwell time, and a mop head moving at walking pace does not dwell.

At 1.8kg it is the lightest machine here by a wide margin, which is the specification that decides whether a steam mop gets used weekly or lives in a cupboard. The compromises are real: no handheld detachment, no accessories, and a 375ml tank that is among the smaller ones on this page. If you want a machine that cleans hard floors well and nothing else, that is the correct set of compromises at £39.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Publishes tank, wattage, cord length, weight and box contents in full', 'The only brand here that qualifies its 99.9% bacteria claim', 'Lightest machine in this comparison at 1.8kg', 'Costs £39.00 from a brand that specialises in steam', '6,538 ratings at 4.4'], // PONTOS POSITIVOS
                'contras' => ['No handheld detachment and no accessories at all', '375ml tank is among the smallest here', 'Does not publish steam output in grams per minute', '5.5m cord is the shortest in this ranking'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'PurSteam 10-in-1 Steam Mop with Detachable Handheld Cleaner',             // NOME (ENCURTADO)
                'price' => '£59.49',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 51327,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61rcmM5F5PL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'PurSteam 10-in-1 steam mop with detachable handheld steam cleaner',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DBR44FGS?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'By far the most reviewed steam mop in this comparison at 51,327 ratings, and the detachable handheld is genuinely the most useful accessory in the category.', // TEXTO CURTO (CARD)
                'body' => "Fifty-one thousand ratings at 4.4 stars is an order of magnitude more evidence than most of this page, and it is the main reason to buy this over the Shark above it. The detachable handheld unit is also the one attachment in the whole 10-in-1 genre that earns its place: a steam mop that comes apart to do oven doors, shower grout, hobs and upholstery is doing a second job properly rather than pretending a plastic nozzle is a feature.

Heat-up is quoted at 30 seconds and the machine is sold on chemical-free cleaning across hardwood, tile, carpet and grout. For a household that wants one device to handle floors and the awkward jobs, this is the sensible pick, and the review count means you are not gambling.

The 10-in-1 branding is exactly what this article is about, and PurSteam gives the game away in its own title: Steam Mop with 10 Accessories. Ten accessories is precisely what it is, and calling that 10-in-1 is a marketing decision rather than a lie. It also does not publish a tank capacity or a steam output figure anywhere we could find, which is the norm here but still a gap on a £59.49 machine.", // TEXTO SEO LONGO
                'pros' => ['51,327 ratings at 4.4, ten times the sample of most rivals here', 'Detachable handheld is genuinely useful for ovens, grout and upholstery', '30 second heat-up time', 'Chemical-free cleaning across hard floors, carpet and grout'], // PONTOS POSITIVOS
                'contras' => ['10-in-1 is ten accessories, as its own title concedes', 'Publishes no tank capacity or steam output', 'Costs £20 more than the Shark for a heavier machine'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Shark Automatic Steam Mop S8201UKCP with Steam Blaster, 8m Cord',         // NOME (ENCURTADO)
                'price' => '£129.99',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 1064,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61VpOt4X1UL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Shark Automatic steam mop with steam blaster and gripping pads',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D6Z2C5VH?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest rated machine here at 4.6, with an 8 metre cord and rotating pads that scrub as well as steam — though the listing cannot decide if it ships four pads or six.', // TEXTO CURTO (CARD)
                'body' => "This is the machine that does the most work for you. The pads rotate as you push, so it scrubs and steams at the same time rather than relying on your arm, and the Steam Blaster mode fires an extra burst at a stain instead of making you go over it repeatedly. Three automatic steam settings adjust to the floor. At 4.6 stars it holds the best rating in this comparison.

The 8 metre cord is the specification worth paying for and nobody markets it properly. Every steam mop here has a cord, and the difference between 5.5 metres and 8 metres is the difference between unplugging twice while doing a kitchen and doing the whole ground floor from one socket. Combined with rotating pads, this is the machine for a house rather than a flat.

Two inconsistencies in the listing. The product name says 6 Gripping Pads and the first bullet says it includes 6 Dirt Grip pads, while the fourth bullet says 4 machine-washable Dirt Grip pads in 2 sets. And the weight is given as 3kg in the bullets and 4.9kg in the specification table. Neither error changes what the machine does, but on a £129.99 product it is worth knowing that nobody proofread the page.", // TEXTO SEO LONGO
                'pros' => ['4.6 stars, the highest rating in this comparison', '8 metre cord, the longest here by 2 metres', 'Rotating pads scrub and steam simultaneously', 'Steam Blaster mode for stubborn stains', 'Three automatic steam settings'], // PONTOS POSITIVOS
                'contras' => ['Listing says 6 pads in two places and 4 pads in another', 'Weight given as 3kg in the bullets and 4.9kg in the spec table', 'Costs £129.99, over three times the Shark S1000', 'Only 1,064 ratings for the price'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Vileda Steam Mop Plus, 400ml Tank, 6m Cord, Triangular Head',             // NOME (ENCURTADO)
                'price' => '£56.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 1638,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71d8-FQeO0L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Vileda Steam Mop Plus floor steamer with triangular head',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BG8P6CWR?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The largest tank in this comparison at 400ml with a 6 metre cord, from the brand that already dominates the ordinary mop aisle.', // TEXTO CURTO (CARD)
                'body' => "Vileda is the default name in British floor cleaning and this is its steam entry. The two numbers that matter are both good: a 400ml tank, joint largest on this page, and a 6 metre cord, which is half a metre longer than the Shark S1000 and enough for most rooms without re-plugging. Three heat settings let you drop the output on laminate, where too much steam is how people damage floors.

The triangular head is the design idea and it is a real one. A rectangular mop head cannot get into the corner where two skirting boards meet; a triangular one can, and on a kitchen with fitted units that is where the dirt actually accumulates. Vileda calls it the Corner Hero, which is marketing, but the geometry underneath is sound.

At £56.99 with 1,638 ratings at 4.4 it sits mid-table on both price and evidence. The one place it follows the category rather than leading it is the bacteria claim: Vileda prints killing up to 99.9% of bacteria without the controlled-conditions qualification Shark adds. The claim is probably true under laboratory dwell times and probably optimistic at mopping speed, which is exactly why the qualification exists.", // TEXTO SEO LONGO
                'pros' => ['400ml tank, joint largest in this comparison', '6 metre cord, longer than most machines at this price', 'Triangular head genuinely reaches into corners', 'Three heat settings to avoid over-steaming laminate', 'Established UK brand with pads easy to find'], // PONTOS POSITIVOS
                'contras' => ['Prints the 99.9% bacteria claim without any qualification', 'Publishes no steam output figure', 'Only 1,638 ratings against 6,538 for the cheaper Shark'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Shark Klik n Flip Automatic Steam Mop S6003UK, 1200W, 6m Cord',           // NOME (ENCURTADO)
                'price' => '£122.49',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 4838,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51H4uzA2S4L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Shark Klik n Flip automatic steam mop with double sided head',       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01N3930UF?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The double-sided head is the best solved problem in this category: flip it mid-clean and you get a fresh pad without touching a dirty one.', // TEXTO CURTO (CARD)
                'body' => "Everyone who has used a steam mop across a whole floor knows the moment the pad stops cleaning and starts redistributing. Shark's answer is mechanical rather than marketing: the head is double-sided, and a foot-operated flip presents a clean face without you bending down or handling a hot, dirty pad. It doubles the floor area you cover per pad change, and it is the single most useful feature on this page.

The rest is well specified: 1200W, a 6 metre cord, three automatic steam settings for different floor types, and two Dirt Grip pads with a filling flask in the box. At 4,838 ratings and 4.5 stars it is the best evidenced of the premium machines here.

At £122.49 it costs more than three times the S1000, and the honest question is whether flipping a pad is worth £83. For a flat, no. For a house with a lot of hard floor where you would otherwise stop mid-job to swap a pad by hand, it genuinely changes the chore. It is also worth noting the price gap to the S8201UKCP at number three is only £7.50, and that machine has rotating pads, a longer cord and a higher rating — if you are spending this much, look at both.", // TEXTO SEO LONGO
                'pros' => ['Double-sided flip head doubles the area covered per pad', 'Foot-operated, so no handling a hot dirty pad', '4,838 ratings at 4.5, best evidenced premium machine here', '1200W with three automatic steam settings', '6 metre cord'], // PONTOS POSITIVOS
                'contras' => ['Costs over three times the Shark S1000 for one mechanism', 'Only £7.50 cheaper than the better-rated S8201UKCP', 'No handheld detachment', 'No tank capacity published'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Vax Steam Clean Multi Steam Cleaner with 9 Accessories',                  // NOME (ENCURTADO)
                'price' => '£49.00',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 2622,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/619Ra5cQdeL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Vax Steam Clean Multi portable handheld and floor steam cleaner',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B013R60W0Q?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing in this comparison that calls its accessories accessories: 9 Accessories in the title, not 9-in-1. That honesty is the reason it is here.', // TEXTO CURTO (CARD)
                'body' => "Vax sells this as a steam cleaner with 9 accessories. Every competitor with the same box of parts sells it as 9-in-1 or 10-in-1. It is a small difference in wording and a large difference in what the buyer is being told, and in a category built on inflating an accessory count into a capability count, the brand that declines to do it deserves the recommendation.

The machine behind the honesty is a competent one: a 30 second heat-up, floor and handheld modes, and nine tools aimed at specific jobs rather than padding a number. Vax is an established British floor care brand with parts availability to match, which matters on a device with a boiler and a pump.

At 4.2 from 2,622 ratings it is not the highest rated here, and that is worth taking at face value with a sample that size — this is a machine people find useful rather than delightful. At £49 it sits between the budget upright mops and the Shark premium tier, and what you get for the money is versatility plus a listing you can actually believe. If the accessory kit is the reason you are buying a steam cleaner rather than a steam mop, buy this one.", // TEXTO SEO LONGO
                'pros' => ['Calls its accessories accessories rather than inflating them into 9-in-1', '30 second heat-up with floor and handheld modes', 'Established British brand with good parts availability', 'Nine tools aimed at specific jobs', '2,622 ratings'], // PONTOS POSITIVOS
                'contras' => ['4.2 average, mid-table on a substantial sample', 'Publishes no tank capacity or steam output', 'Less powerful than the 1500W machines at a similar price'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'VonHaus 10-in-1 Steam Mop, 1500W, 350ml Tank, 30g per Minute',            // NOME (ENCURTADO)
                'price' => '£44.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 126,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71ywEOGkFtL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'VonHaus 10-in-1 steam mop with detachable handheld cleaner',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GFB28C2S?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only machine in the entire comparison that publishes a steam output figure: max 30g/min. That single number tells you more than any accessory count.', // TEXTO CURTO (CARD)
                'body' => "Watts tell you what goes into a steam mop. Grams per minute tell you what comes out, and VonHaus is the only manufacturer on this page willing to print the second number: a maximum of 30 grams of steam per minute across three levels. Two machines rated at 1500W can deliver very different amounts of steam depending on the boiler and the nozzle, which is why the input figure everyone advertises is the less useful one.

That single figure also lets you do a calculation nobody else here enables. The tank holds 350ml. At 30 grams a minute on maximum, that is a shade under twelve minutes of continuous steam before a refill. Whether that is enough depends on your floor, but at least you can work it out rather than guess — and it puts the run-time claims elsewhere in this category in perspective.

The rest is the standard package: 1500W, detachable handheld, 180 degree swivel head, 7 metre cord, and yes, 10-in-1 branding for what is an accessory bundle. The reservation is evidence: 126 ratings at 4.4 is the thinnest sample in this comparison by a distance, and VonHaus is a house brand rather than a specialist. We have ranked it seventh on that basis, but the transparency deserves noting.", // TEXTO SEO LONGO
                'pros' => ['The only machine here that publishes steam output, at max 30g/min', '7 metre cord, second longest in this comparison', '1500W with three steam levels and a detachable handheld', 'Publishes the 350ml tank, so run time can be calculated', 'Costs £44.99'], // PONTOS POSITIVOS
                'contras' => ['126 ratings, the thinnest sample in this ranking', '350ml is the smallest tank here', 'Still uses 10-in-1 branding for an accessory bundle', 'House brand with no specialist steam pedigree'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Vytronix USM13 10-in-1 Upright Steam Cleaner Mop, 1300W',                 // NOME (ENCURTADO)
                'price' => '£39.99',                                                                // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 3594,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71RbSCzxUSL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Vytronix USM13 upright steam cleaner mop with triangular head',      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B4W9K3QG?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Cheap, well reviewed and completely typical of the category: 10-in-1 in the title, 10 PIECE ACCESSORY KIT in the bullets, and no output figure anywhere.', // TEXTO CURTO (CARD)
                'body' => "The Vytronix is a perfectly reasonable £39.99 steam mop with 3,594 ratings at 4.2 stars, 1300W of power and a triangular head for corners. If that is all you want, it does the job and enough people have said so.

It is in this ranking mainly because it demonstrates the pattern more cleanly than any other listing. The title reads 10-in-1 Multifunction. The bullets read 10 PIECE ACCESSORY KIT. Those are the same ten objects described two different ways on the same page, and the version in the title is the one that sells. Nothing here is untrue; it is simply an accessory count wearing a capability count's clothes, which is why we made it the theme of this article.

It also carries the unqualified 99.9% of bacteria line in its own title, where Shark adds the controlled-conditions footnote. At 4.2 from a substantial sample it lands where the budget uprights land, and at £39.99 it undercuts most of the page. Buy it if the price is the deciding factor and you want the accessories; buy the Shark S1000 for a pound less if you want a better-built machine that only does floors.", // TEXTO SEO LONGO
                'pros' => ['3,594 ratings at 4.2 for £39.99', '1300W with a triangular head for corners', 'Ten-piece accessory kit genuinely included', 'Upright format is easy to store'], // PONTOS POSITIVOS
                'contras' => ['10-in-1 in the title is the 10 PIECE ACCESSORY KIT in the bullets', 'Prints 99.9% of bacteria in the title with no qualification', 'No tank capacity or steam output published', 'Costs a pound more than the better-built Shark S1000'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Russell Hobbs Upright Steam Mop, 1.4kW, 380ml Tank',                      // NOME (ENCURTADO)
                'price' => '£34.99',                                                                // PRECO
                'rating' => 4.1,                                                                    // NOTA
                'reviews_count' => 14887,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/717xREmraFL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Russell Hobbs upright steam mop with 380ml water tank',              // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00VBE0OT6?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The second most reviewed machine here at 14,887 ratings, on a listing that gives two different heat-up times, two different run times and an American voltage.', // TEXTO CURTO (CARD)
                'body' => "Russell Hobbs is a familiar British name and 14,887 ratings is the second deepest sample on this page, so plenty of people have bought this and most are content. It is a 1.4kW upright with a 380ml tank and a two-year guarantee available on registration, at £34.99 the second cheapest machine here.

The listing, however, cannot keep its own numbers straight. The product title states a 30-Second Heat-up and a 15-Minute Run-Time. The first bullet states a super quick 25 second heat up time. The second bullet states up to 25 minute steam time. So the heat-up is either 25 or 30 seconds and the run time is either 15 or 25 minutes, and the two pairs look suspiciously like the values were transposed between fields. On a machine whose entire proposition is how fast it makes steam and how long it lasts, those are the only two numbers that matter and both are ambiguous.

The same bullet also declares Volts: 100 - 120. British mains is 230 volts. The machine sold here will of course be a UK unit, so this is a spec sheet copied from another market rather than a warning — but it is the third numerical error on one page. The 4.1 average, lowest but one in this comparison across nearly fifteen thousand buyers, is worth weighing against the price.", // TEXTO SEO LONGO
                'pros' => ['14,887 ratings, the second deepest sample in this comparison', 'Costs £34.99, the second cheapest machine here', '380ml tank, larger than the Shark S1000', 'Two-year guarantee available on registration', 'Familiar British brand'], // PONTOS POSITIVOS
                'contras' => ['Title says 30 second heat-up, bullet says 25 seconds', 'Title says 15 minute run time, bullet says 25 minutes', 'Bullet declares 100-120 volts on a 230 volt market', '4.1 average across nearly 15,000 buyers'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Neo 10-in-1 Hot Steam Mop Cleaner, 1500W, 400ml Tank',                    // NOME (ENCURTADO)
                'price' => '£33.99',                                                                // PRECO
                'rating' => 3.9,                                                                    // NOTA
                'reviews_count' => 3966,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61kcpycjcYL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Neo 10 in 1 hot steam mop cleaner with handheld function',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CYT865PN?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest machine here at £33.99, and the listing that states the point of this whole article in its own words: 2 in 1 function, 10PC accessory kit.', // TEXTO CURTO (CARD)
                'body' => "Read the second bullet of this listing and the entire 10-in-1 genre explains itself. The title says 10 in 1. The bullet says, verbatim, 2 in 1 Mop & Handheld Function. 10PC Accessory Kit Includes: Measuring Cup. Window / Glass Cleaner. Round Small Brass Brush. So the machine has two functions and ten pieces in the box, one of which is a measuring cup. Nobody has done anything dishonest — the information is right there — but the number that goes in the title is the ten, not the two.

Underneath it is the cheapest machine in the comparison at £33.99, with a 400ml tank that is joint largest here, 1500W, and a 30 second heat-up. On specification alone that is competitive with machines costing £20 more.

The rating is the problem. Three point nine from 3,966 ratings is the lowest average on this page, and with a sample approaching four thousand that is a signal rather than noise — this is a machine that a meaningful minority of buyers are unhappy with. The listing also includes an unusual instruction: allow proper time for the mop to heat and build steam, and do not attempt to use the product before it does. Buy it as the cheapest way to try steam cleaning, not as the best one.", // TEXTO SEO LONGO
                'pros' => ['Cheapest machine in this comparison at £33.99', '400ml tank, joint largest here', '1500W with a 30 second heat-up', 'Detachable handheld function included'], // PONTOS POSITIVOS
                'contras' => ['3.9 from 3,966 ratings, the lowest average in this ranking', 'Title says 10 in 1 while the bullet says 2 in 1 function with a 10-piece kit', 'One of the ten accessories is a measuring cup', 'No steam output figure published'], // PONTOS NEGATIVOS
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
        $this->command?->info("SteamMopsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
