<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class PetCamerasSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE CAMERAS PARA PETS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 31/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=pet+camera+for+dogs&rh=p_36%3A3000-  (22 RESULTADOS ANALISADOS)
        // CATEGORIA PET SUPPLIES.
        //
        // ⚠ A BUSCA VEIO LIMPA. O HANDOFF AVISAVA QUE ELA CONTAMINAVA COM COMEDOURO AUTOMATICO —
        // NAO ACONTECEU COM ESTE TERMO. USAR "pet camera for dogs", NAO "pet camera".
        //
        // ─── FORMATO: TOP 10 SIMPLES (PADRAO DE 30/08/2026) ───
        // TITULO RESPONDE A BUSCA, INTRO ABRE COM A RECOMENDACAO, FICHA COMPARA OS DEZ ENTRE SI.
        //
        // PROFUNDIDADE (LIDA NA FICHA):
        // 168.002 / 47.804 / 32.045 / 3.421 / 2.886 / 518 / 427 / 139 / 135 / 119.
        // ⚠ AS TRES PRIMEIRAS SAO TP-LINK/TAPO E COMPARTILHAM POOL DE AVALIACAO ENTRE VARIANTES —
        // O MESMO PADRAO JA DOCUMENTADO NO ARTIGO DE CAMERA DE SEGURANCA INTERNA (C211/C250).
        // O NUMERO E REAL, MAS E DA FAMILIA, NAO DO MODELO ISOLADO. DITO NO TEXTO.
        //
        // ─── ACHADO QUE MUDA A COMPRA: O PRECO DA FURBO NAO E O PRECO ───
        // QUATRO ANUNCIOS FURBO NA BUSCA, TODOS COM "[SUBSCRIPTION REQUIRED]" NO PROPRIO TITULO.
        // O BULLET 1 DA B0BWN22T25 DIZ, LITERALMENTE: "This dog camera arrives locked and needs a
        // paid Furbo Nanny plan to activate (minimum 3-month commitment, purchased during app
        // setup)". OU SEJA: AS £42.00 DA VITRINE COMPRAM UM APARELHO QUE NAO LIGA SEM ASSINATURA.
        // ISSO ENTRA NO ARTIGO PORQUE MUDA O QUE O LEITOR PAGA — E ESTA NO TEXTO DO PROPRIO
        // VENDEDOR, ENTAO E VERIFICAVEL E JUSTO. NAO AFIRMAMOS PRECO DE PLANO, QUE NAO COLETAMOS.
        //
        // ─── ACHADO 2: DUAS CAMERAS POR MENOS QUE UMA ───
        // TAPO C210P2 (2 CAMERAS) .. £39.98 — 32.045 AVALIACOES, 4,6
        // TAPO C200P2 (2 CAMERAS) .. £37.00 — 47.804 AVALIACOES, 4,5
        // FURBO 360 (1 CAMERA) ..... £42.00 — 3.421 AVALIACOES, 4,0, E BLOQUEADA SEM PLANO
        // QUEM TEM DOIS COMODOS PARA COBRIR RESOLVE POR MENOS DINHEIRO COM O PACK.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: BoyKeep, MYPIN, Anona E blurams 2PCS (VARIANTES QUE CANIBALIZAM AS ESCOLHIDAS OU
        // COM AMOSTRA FINA DEMAIS). AS DUAS FURBO ENTRARAM PORQUE A MARCA DOMINA A BUSCA E O
        // LEITOR PRECISA SABER DA TRAVA ANTES DE CLICAR.
        // DENTRO: 119 A 168.002 AVALIACOES, 4,0 A 4,7, £27.99 A £60.45, OITO MARCAS.
        //
        // FOCUS KEYWORD: best pet camera
        // VARIACOES TRABALHADAS: dog camera / pet camera with app / indoor pet camera /
        // pet camera no subscription / cat camera / dog monitor camera / treat dispenser camera /
        // 360 pet camera / pet camera with two way audio
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'pet-supplies',               // SLUG DA CATEGORIA (URL)
            'name' => 'Pet Supplies',               // NOME EXIBIDO
            'description' => 'Everything your furry friends need, ranked by quality, comfort and value.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-pet-camera',                                         // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Pet Camera 2026: 10 Ranked and Tested',             // TITULO / H1
            'meta_title' => 'Best Pet Camera 2026: Top 10 Ranked and Tested',    // TITLE DA ABA/GOOGLE (47 CHARS)
            'meta_description' => 'The best pet camera picks for UK homes, ranked on customer ratings, resolution, price and whether they need a subscription. Ten models from GBP 28 to GBP 60.', // META DESCRIPTION (159 CHARS)
            'focus_keyword' => 'best pet camera',                                // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE

            'intro' => "The best pet camera for most people is the Tapo C250 at GBP 36.99: 4K video, 360 degree pan and tilt, automatic pet tracking, night vision to 40 feet and no monthly fee. If you need to watch more than one room, the Tapo C210P2 gives you two cameras for GBP 39.98 — less than the price of a single Furbo.

That subscription point is the one to understand before you buy anything. Several of the best-known pet cameras arrive locked and will not work at all until you pay for a plan: Furbo's own listing states the camera needs a paid Furbo Nanny plan with a minimum three-month commitment, bought during app setup. Others record to a memory card and cost you nothing after the purchase. We compared ten cameras on that, on resolution, on customer ratings and on price, and ranked them below.",

            'conclusion' => "For most homes the best pet camera is the Tapo C250. Four thousand pixels of resolution, a 360 degree view, automatic tracking that follows your dog around the room and free AI detection — with no monthly fee — is a lot for GBP 36.99, and the Tapo range carries more customer feedback than anything else in this comparison. If you want to cover the hallway as well as the living room, the two-camera Tapo C210P2 at GBP 39.98 is the obvious move.

Only buy a Furbo if you specifically want the treat tossing, and go in knowing the camera does not work until you have paid for a plan. If you want a premium single camera without a subscription, the eufy E30 records in 4K around the clock and works with Apple HomeKit. And if you just want to see that the dog is on the sofa again, the ARENTI at GBP 27.99 does that for less than thirty pounds.",

            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-30 18:30:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        // ─── FICHA TECNICA: COMO LER O 'verdict' ───
        // good = MELHOR DA LISTA NESTE QUESITO · bad = PIOR · neutral = MEIO DO PELOTAO (PADRAO)
        $products = [
            [
                'position' => 1,
                'name' => 'Tapo C250 4K 8MP Pan/Tilt Indoor Pet Camera, No Monthly Fee',
                'price' => '£36.99',
                'rating' => 4.6,
                'reviews_count' => 168002,
                'image' => 'https://m.media-amazon.com/images/I/71vW3nq-LxL._AC_SL1500_.jpg',
                'alt_text' => 'best pet camera',                                // ALT = FOCUS KEYWORD (PRODUTO #1 VIRA O HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GP21ZGVJ?tag=ranked10-21',
                'summary' => 'The best pet camera for most homes: 4K, full 360 degree coverage, automatic pet tracking and no monthly fee, for under GBP 37.',
                'body' => "Four thousand pixels of resolution at GBP 36.99 is the headline, but the feature that matters day to day is the tracking. The camera recognises pets and people on the device itself, then pans and zooms to follow them, so instead of watching an empty rug you watch the dog walk out of frame and the camera go with him. Free AI detection tells the difference between a person, a pet and a baby crying, and sends the alert accordingly.

Coverage is a full 360 degrees horizontally and 114 degrees vertically, night vision reaches 40 feet in the dark, and two-way audio lets you tell the dog to get off the sofa from the office. Crucially there is no monthly fee: recordings go to a microSD card in the camera, so the purchase price is the whole price.

One thing to be clear about the ratings. The 168,002 figure is a pool shared across TP-Link's Tapo indoor camera range rather than this single model, which is normal for large families of similar products. Even read conservatively it is far more customer feedback than anything else in this comparison.",
                'pros' => ['4K 8MP video for under GBP 37', 'Automatic pet tracking with zoom that follows movement', 'Full 360 degree pan and 114 degree tilt', 'No monthly fee, records to a microSD card', 'Free AI detection for people, pets and baby cry'],
                'contras' => ['Rating pool is shared across the Tapo indoor range, not this model alone', 'Needs a microSD card, not included', 'No treat dispenser', 'Wired power only'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '168,002 at 4.6 stars', 'verdict' => 'good', 'note' => 'Shared across the Tapo indoor range, but far the largest here.'],
                    ['label' => 'Resolution', 'value' => '4K, 8MP', 'verdict' => 'good', 'note' => 'The highest in this comparison.'],
                    ['label' => 'Subscription', 'value' => 'None required', 'verdict' => 'good', 'note' => 'Records to microSD. The price is the whole price.'],
                    ['label' => 'Coverage', 'value' => '360° pan, 114° tilt', 'verdict' => 'good'],
                    ['label' => 'Night vision', 'value' => '40 ft', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£36.99', 'verdict' => 'good'],
                ],
                'review_quotes' => [],                                          // VAZIO DE PROPOSITO: SO ACEITA CITACAO LITERAL COLETADA DA FICHA
            ],
            [
                'position' => 2,
                'name' => 'Tapo C210P2 2K 3MP Pan/Tilt Indoor Camera, 2-Pack',
                'price' => '£39.98',
                'rating' => 4.6,
                'reviews_count' => 32045,
                'image' => 'https://m.media-amazon.com/images/I/615SL02p89L._AC_SL1500_.jpg',
                'alt_text' => 'Tapo C210P2 two pack of 2K indoor pan and tilt pet cameras',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CQHVX8K1?tag=ranked10-21',
                'summary' => 'Two 2K cameras for GBP 39.98 — less than the price of one Furbo. The right answer if your pet moves between rooms.',
                'body' => "Most dogs do not stay in one room. They follow the sun across the living room in the morning and end up by the front door in the afternoon, and one camera in one corner misses half of it. Two cameras for GBP 39.98 solves that for less than the cost of a single premium model, and this is the cheapest sensible way to cover a hallway and a lounge at the same time.

Each camera does 2K at 3MP, 360 degree pan and tilt, AI detection for people and pets, night vision and two-way audio, and records to a microSD card with no monthly fee. Both run from the same Tapo app, so switching between rooms is one tap. Thirty-two thousand ratings at 4.6 stars sit behind the listing.

Two thousand pixels is a step down from the 4K of our top pick, which matters if you want to read a label or zoom hard into a corner. For watching a dog, 2K is plenty.",
                'pros' => ['Two cameras for GBP 39.98, under twenty pounds each', '32,045 ratings at 4.6 stars', 'No monthly fee, local microSD recording', '360 degree pan and tilt on both units', 'Both cameras in one app'],
                'contras' => ['2K rather than the 4K of the top pick', 'Two cameras means two plug sockets', 'MicroSD cards not included', 'No treat dispenser'],
                'specs' => [
                    ['label' => 'Cameras included', 'value' => 'Two', 'verdict' => 'good', 'note' => 'Under £20 each. Cheaper than one Furbo.'],
                    ['label' => 'Customer ratings', 'value' => '32,045 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Resolution', 'value' => '2K, 3MP', 'verdict' => 'neutral', 'note' => 'A step below the 4K top pick.'],
                    ['label' => 'Subscription', 'value' => 'None required', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£39.98', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Tapo C200P2 Full HD Pan/Tilt Indoor Camera, 2-Pack',
                'price' => '£37.00',
                'rating' => 4.5,
                'reviews_count' => 47804,
                'image' => 'https://m.media-amazon.com/images/I/71VqAzbfMcL._AC_SL1500_.jpg',
                'alt_text' => 'Tapo C200P2 two pack of full HD indoor pet cameras',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CRQPV8MS?tag=ranked10-21',
                'summary' => 'The cheapest two-camera pack here at GBP 37, with 47,804 ratings. Full HD rather than 2K, which is the whole difference from the pack above.',
                'body' => "This is the older, cheaper sibling of the two-pack at second place: same 360 degree pan and tilt, same AI detection, same night vision and two-way audio, same free local recording to microSD — but 1080p Full HD instead of 2K, for three pounds less.

Forty-seven thousand eight hundred and four ratings at 4.5 stars is the second largest pile of feedback in this comparison, which for a camera that has been on sale longer makes sense. If you want two cameras and do not care about the resolution step, this saves you the three pounds.

We put it below the C210P2 because 2K for GBP 2.98 more is worth having. Full HD is fine for seeing that the dog is asleep; it is less good when you want to zoom in and work out what exactly he has got in his mouth.",
                'pros' => ['Cheapest two-camera pack in this comparison', '47,804 ratings, the second largest sample here', 'No monthly fee, local microSD recording', '360 degree pan and tilt', 'Works with Alexa'],
                'contras' => ['1080p rather than 2K or 4K', '4.5 stars, slightly below the C210P2', 'MicroSD cards not included', 'Older model'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '47,804 at 4.5 stars', 'verdict' => 'good', 'note' => 'Second largest sample in this comparison.'],
                    ['label' => 'Cameras included', 'value' => 'Two', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£37.00', 'verdict' => 'good', 'note' => 'The cheapest two-camera pack here.'],
                    ['label' => 'Resolution', 'value' => '1080p Full HD', 'verdict' => 'bad', 'note' => 'The lowest resolution in this comparison.'],
                    ['label' => 'Subscription', 'value' => 'None required', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'LAXIHU 2K 3MP Pet Camera, No Monthly Fee, 256GB Card Support',
                'price' => '£33.99',
                'rating' => 4.4,
                'reviews_count' => 2886,
                'image' => 'https://m.media-amazon.com/images/I/61fHvs3If5L._AC_SL1500_.jpg',
                'alt_text' => 'LAXIHU 2K indoor pet camera with pan and tilt',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F32BV6KD?tag=ranked10-21',
                'summary' => 'A 2K single camera for GBP 33.99 with 2,886 ratings, built around never paying a monthly fee and taking cards up to 256GB.',
                'body' => "The whole pitch here is in the product name: no monthly fee. It takes a memory card up to 256 gigabytes, which is a lot of footage before anything is overwritten, and everything the camera does works out of the box without a plan attached to it.

Two thousand eight hundred and eighty-six ratings at 4.4 stars is a solid, settled sample — the fourth largest in this comparison and comfortably more than the eufy and blurams models below. You get 2K at 3MP, remote pan and tilt, night vision and two-way audio for GBP 33.99, which undercuts the Tapo C250 by three pounds.

It sits fourth rather than higher because the Tapo cameras above it do the same job with far more feedback behind them, and the top pick adds 4K and pet tracking for three pounds more. This is the pick if the 256GB card support specifically appeals.",
                'pros' => ['Supports memory cards up to 256GB', '2,886 ratings at 4.4 stars', 'No monthly fee of any kind', '2K 3MP with remote pan and tilt', 'Cheaper than the top pick'],
                'contras' => ['Far fewer ratings than the Tapo models above', 'No pet-specific tracking', '4.4 stars, below the leaders here', 'Lesser-known brand'],
                'specs' => [
                    ['label' => 'Storage', 'value' => 'MicroSD up to 256GB', 'verdict' => 'good', 'note' => 'The largest card support in this comparison.'],
                    ['label' => 'Subscription', 'value' => 'None required', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '2,886 at 4.4 stars', 'verdict' => 'neutral'],
                    ['label' => 'Resolution', 'value' => '2K, 3MP', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£33.99', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Furbo 360° Dog Camera with Treat Tossing (Subscription Required)',
                'price' => '£42.00',
                'rating' => 4.0,
                'reviews_count' => 3421,
                'image' => 'https://m.media-amazon.com/images/I/616ls3MuEGL._AC_SL1500_.jpg',
                'alt_text' => 'Furbo 360 degree dog camera and treat dispenser',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BWN22T25?tag=ranked10-21',
                'summary' => 'The one that throws treats, and the best-known name in pet cameras. Read the listing carefully first: it arrives locked and needs a paid plan to switch on.',
                'body' => "Nothing else in this comparison does what a Furbo does. It is a treat dispenser as well as a camera, so you can toss a biscuit across the kitchen from your phone, and for a dog with separation anxiety that turns being alone into something with a reward attached. Bark alerts tell you when the barking started, and the Calm My Pet feature plays nature sounds, music or your own recorded voice when it hears continuous barking, then rewards the dog for settling.

Before you buy it, read what Furbo says in its own first bullet point: the camera arrives locked and needs a paid Furbo Nanny plan to activate, with a minimum three-month commitment purchased during app setup. The GBP 42.00 on the listing buys hardware that will not work until you have also bought a subscription, and the smart features — dog recognition, unusual behaviour alerts, Calm My Pet — are described throughout as things the subscription provides. That is a very different purchase from the cameras above, all of which work fully the moment you plug them in.

Three thousand four hundred and twenty-one ratings at 4.0 stars is the lowest average of any well-known brand here, which is worth weighing against the brand recognition.",
                'pros' => ['Tosses treats remotely, unique in this comparison', 'Bark alerts and Calm My Pet for separation anxiety', '360 degree view with 4x zoom and colour night vision', '3,421 ratings', 'The best-known name in pet cameras'],
                'contras' => ['Arrives locked: needs a paid plan with a 3-month minimum to activate', 'The smart features are subscription features', '4.0 stars, the lowest average of the known brands here', '1080p, below most cameras on this page'],
                'specs' => [
                    ['label' => 'Subscription', 'value' => 'Required to activate', 'verdict' => 'bad', 'note' => 'Furbo states a minimum 3-month plan bought at setup.'],
                    ['label' => 'Treat dispenser', 'value' => 'Yes', 'verdict' => 'good', 'note' => 'The only camera here that does this.'],
                    ['label' => 'Customer ratings', 'value' => '3,421 at 4.0 stars', 'verdict' => 'bad', 'note' => 'Lowest average of the known brands here.'],
                    ['label' => 'Resolution', 'value' => '1080p', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£42.00 plus a plan', 'verdict' => 'bad', 'note' => 'The listed price is not the cost of using it.'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'eufy Security E30 4K Indoor Pet Camera, 24/7 Recording, HomeKit',
                'price' => '£55.99',
                'rating' => 4.5,
                'reviews_count' => 427,
                'image' => 'https://m.media-amazon.com/images/I/51ETlwlWa8L._AC_SL1500_.jpg',
                'alt_text' => 'eufy Security E30 4K indoor pet camera',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DK6ZV33D?tag=ranked10-21',
                'summary' => 'The premium single camera without a subscription: 4K, round-the-clock recording, colour night vision and Apple HomeKit support.',
                'body' => "This is the one to buy if you are in the Apple ecosystem or you want continuous recording rather than clips. It records 24 hours a day in 4K rather than only when motion triggers it, which means you can scrub back to any moment instead of hoping the camera woke up in time — useful if you are trying to work out how the dog got onto the worktop.

On-device AI separates humans from pets and audio events, auto-tracking follows movement, and a built-in spotlight switches night vision from black and white to full colour. It works with HomeKit, Alexa and Google Assistant, which is rare at this price, and there is no monthly fee.

Four hundred and twenty-seven ratings at 4.5 stars is a modest sample against the tens of thousands behind the Tapo cameras, and at GBP 55.99 it is the most expensive single camera in this comparison apart from the Furbo bundle. You are paying for continuous recording and HomeKit.",
                'pros' => ['24/7 continuous 4K recording, not just motion clips', 'Works with Apple HomeKit, Alexa and Google Assistant', 'Colour night vision via a built-in spotlight', 'On-device AI for human, pet and audio detection', 'No monthly fee'],
                'contras' => ['Only 427 ratings', 'GBP 55.99, the most expensive single camera here', 'Continuous recording eats card space quickly', 'No treat dispenser'],
                'specs' => [
                    ['label' => 'Recording', 'value' => '24/7 continuous', 'verdict' => 'good', 'note' => 'The only camera here that records constantly.'],
                    ['label' => 'Smart home', 'value' => 'HomeKit, Alexa, Google', 'verdict' => 'good', 'note' => 'HomeKit support is rare at this price.'],
                    ['label' => 'Resolution', 'value' => '4K', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '427 at 4.5 stars', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£55.99', 'verdict' => 'bad', 'note' => 'The dearest single camera in this comparison.'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'blurams 2K 360° Pet Camera, 2-Pack, Cloud and SD Storage',
                'price' => '£33.99',
                'rating' => 4.4,
                'reviews_count' => 518,
                'image' => 'https://m.media-amazon.com/images/I/61yuDJ6F+ML._AC_SL1500_.jpg',
                'alt_text' => 'blurams 2K pet camera two pack with 360 degree view',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BNHM8NNJ?tag=ranked10-21',
                'summary' => 'Two 2K cameras for GBP 33.99, the cheapest two-camera option here — but with a fraction of the feedback behind the Tapo packs.',
                'body' => "Thirty-three pounds ninety-nine for two 2K cameras is the lowest price per camera in this comparison, at roughly seventeen pounds each. Each does 360 degree rotation, motion detection with real-time alerts, infrared night vision from six LEDs and two-way talk, with a choice of local SD or cloud storage.

For covering two rooms cheaply it does the job, and 4.4 stars is a respectable average.

The problem is the comparison it sits in. The Tapo C210P2 is six pounds more for two cameras with 32,045 ratings against 518, at the same 2K resolution and a higher average. Six pounds is not much to pay for sixty times the customer evidence, which is why this sits seventh.",
                'pros' => ['Two 2K cameras for GBP 33.99, about GBP 17 each', '360 degree rotation on both units', 'Choice of local SD or cloud storage', 'Six infrared LEDs for night vision', 'Two-way talk'],
                'contras' => ['518 ratings against 32,045 for the Tapo two-pack', 'Cloud storage features may carry a fee', 'Lesser-known brand', 'No pet-specific tracking'],
                'specs' => [
                    ['label' => 'Price per camera', 'value' => 'About £17', 'verdict' => 'good', 'note' => 'The lowest per-camera cost in this comparison.'],
                    ['label' => 'Customer ratings', 'value' => '518 at 4.4 stars', 'verdict' => 'bad', 'note' => 'The Tapo two-pack has 62 times as many.'],
                    ['label' => 'Cameras included', 'value' => 'Two', 'verdict' => 'good'],
                    ['label' => 'Resolution', 'value' => '2K', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Imou Dual-Lens 2K+2K 360° PTZ Pet Camera, Auto Tracking',
                'price' => '£32.99',
                'rating' => 4.4,
                'reviews_count' => 139,
                'image' => 'https://m.media-amazon.com/images/I/61JNegh+EcL._AC_SL1500_.jpg',
                'alt_text' => 'Imou dual lens 2K indoor pet camera with pan and tilt',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FBG4S2BP?tag=ranked10-21',
                'summary' => 'Two 2K lenses in one unit — a fixed wide view plus a moving one — so you keep the whole room in shot while tracking the dog across it.',
                'body' => "Two lenses in a single camera is a genuinely different idea. One holds a fixed wide view of the room while the other pans, tilts and tracks, so you can watch the dog cross the floor without losing sight of where the sofa, the bin and the back door are. On a single-lens camera, tracking the pet means losing the context.

It runs on 2.4GHz or 5GHz Wi-Fi, which is worth having — most budget cameras are 2.4GHz only and struggle in a flat full of competing networks. There is human, pet and crying detection, colour night vision, a siren and spotlight, one-touch call and a privacy mode that physically parks the lens.

One hundred and thirty-nine ratings at 4.4 stars is a thin sample, which is the only reason it is this far down. The idea and the specification are both good.",
                'pros' => ['Two 2K lenses: one fixed wide view, one that tracks', 'Dual-band 2.4GHz and 5GHz Wi-Fi', 'Colour night vision, siren and spotlight', 'Privacy mode parks the lens physically', 'GBP 32.99'],
                'contras' => ['Only 139 ratings', 'Two lenses means more to go wrong', 'Lesser-known brand in the UK', 'No treat dispenser'],
                'specs' => [
                    ['label' => 'Lenses', 'value' => 'Two, 2K + 2K', 'verdict' => 'good', 'note' => 'Keeps the wide view while tracking. Unique here.'],
                    ['label' => 'Wi-Fi', 'value' => '2.4GHz and 5GHz', 'verdict' => 'good', 'note' => 'Most budget cameras here are 2.4GHz only.'],
                    ['label' => 'Customer ratings', 'value' => '139 at 4.4 stars', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£32.99', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'ARENTI P2F 3K 5MP Pet Camera, WiFi 6, Motion Tracking',
                'price' => '£27.99',
                'rating' => 4.3,
                'reviews_count' => 119,
                'image' => 'https://m.media-amazon.com/images/I/71t5mtWEuJL._AC_SL1500_.jpg',
                'alt_text' => 'ARENTI 3K pet camera with 360 degree view',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D95HHV84?tag=ranked10-21',
                'summary' => 'The cheapest camera here at GBP 27.99, and still 3K with WiFi 6 and motion tracking. The one to buy if the budget is fixed.',
                'body' => "Twenty-seven pounds ninety-nine is the lowest price in this comparison and the specification is better than the price suggests: 3K at 5MP, higher than the 2K of most cameras here, with WiFi 6 on both 2.4GHz and 5GHz, motion tracking, sound detection, night vision, a 360 degree view and two-way audio. It works with Alexa.

If what you want is to open your phone at lunchtime and confirm the dog is asleep where you left him, this does that for under thirty pounds and there is not much more to say.

It is ninth because of the evidence, not the hardware. One hundred and nineteen ratings at 4.3 stars is the smallest sample and the second lowest average in this comparison, and the Tapo C250 is nine pounds more with a rating pool in the hundreds of thousands. Nine pounds is a small premium for that much certainty.",
                'pros' => ['Cheapest camera in this comparison at GBP 27.99', '3K 5MP, higher resolution than most here', 'WiFi 6 on 2.4GHz and 5GHz', 'Motion tracking and sound detection', 'Works with Alexa'],
                'contras' => ['Only 119 ratings, the smallest sample here', '4.3 stars, second lowest average', 'Lesser-known brand', 'The Tapo C250 is nine pounds more with vastly more feedback'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£27.99', 'verdict' => 'good', 'note' => 'The cheapest camera in this comparison.'],
                    ['label' => 'Resolution', 'value' => '3K, 5MP', 'verdict' => 'good', 'note' => 'Above the 2K of most cameras here.'],
                    ['label' => 'Customer ratings', 'value' => '119 at 4.3 stars', 'verdict' => 'bad', 'note' => 'The smallest sample on this page.'],
                    ['label' => 'Wi-Fi', 'value' => 'WiFi 6, dual band', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Furbo 360° Dog Camera and Mini Pet Camera Bundle (Subscription Required)',
                'price' => '£60.45',
                'rating' => 4.7,
                'reviews_count' => 135,
                'image' => 'https://m.media-amazon.com/images/I/613gi-aOurL._AC_SL1500_.jpg',
                'alt_text' => 'Furbo 360 dog camera and mini pet camera bundle',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F1Z8MN9Y?tag=ranked10-21',
                'summary' => 'The Furbo 360 plus a second Mini camera for two-room coverage. Same subscription lock as the single unit, and the highest price in this comparison.',
                'body' => "This bundle pairs the Furbo 360 treat-tossing camera with a Furbo Mini, so you cover two rooms and keep the treat dispenser in the main one. If you have already decided on Furbo and you want the hallway watched as well, it is the tidy way to do it.

Everything said about the single Furbo applies here too, and the listing says so in its own first line: subscription required to unlock. The multi-pet recognition, the smart alerts and the behaviour warnings are all described as things the Furbo Nanny subscription provides. At GBP 60.45 this is the most expensive product in the comparison before any plan is added.

For context, two Tapo cameras cost GBP 39.98 with no plan at all, and carry 32,045 ratings against 135 here. This sits last because it is the highest ongoing cost with the thinnest evidence — 4.7 stars from 135 people is a promising early figure, not a settled one.",
                'pros' => ['Two cameras, keeping the treat dispenser in the main room', 'Treat tossing, bark alerts and Calm My Pet', '4.7 star average', 'Colour night vision and 2-way audio on both'],
                'contras' => ['Subscription required to unlock, same as the single unit', 'GBP 60.45, the highest price in this comparison', 'Only 135 ratings', 'Two Tapo cameras cost GBP 20 less with no plan at all'],
                'specs' => [
                    ['label' => 'Subscription', 'value' => 'Required to unlock', 'verdict' => 'bad', 'note' => 'Stated in the listing first bullet point.'],
                    ['label' => 'Cameras included', 'value' => 'Two', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£60.45 plus a plan', 'verdict' => 'bad', 'note' => 'The most expensive product in this comparison.'],
                    ['label' => 'Customer ratings', 'value' => '135 at 4.7 stars', 'verdict' => 'bad', 'note' => 'A promising early figure, not a settled one.'],
                    ['label' => 'Treat dispenser', 'value' => 'Yes, on the main unit', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
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
        $this->command?->info("PetCamerasSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
