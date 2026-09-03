<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class VideoDoorbellsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE VIDEO CAMPAINHAS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=video+doorbell&rh=p_36%3A2500-  (26 ASINS, 13 FICHAS ABERTAS)
        // CATEGORIA TECH. SAZONAL: EVERGREEN, PICO NO NATAL (SEGURANCA/ENTREGAS).
        //
        // PADRAO EDITORIAL NOVO (30/08): E UM TOP 10, NAO UM ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── DOIS EIXOS DE COMPRA (ENTRAM NA INTRO E NOS CARDS — MUDAM A COMPRA) ───
        //   1) ARMAZENAMENTO/ASSINATURA: TAPO, EUFY, BOIFUN, AOSU GRAVAM LOCAL (microSD/HUB) SEM MENSALIDADE.
        //      RING SO GRAVA NA NUVEM E EXIGE RING PROTECT PAGO — SEM ELE NAO SALVA NENHUM VIDEO. → RESSALVA FORTE.
        //   2) RESOLUCAO x ROTULO: "2K" APARECE EM SENSOR 3MP (TAPO D210, BOIFUN) E 5MP (TAPO TD23). AOSU CHAMA 5MP DE "3K".
        //      O NUMERO "K" NAO DIZ O SENSOR — OLHAR O MP. → ISSO MUDA A COMPRA (PAGA 5MP E LEVA 3MP).
        //
        // ─── POOL DE AVALIACAO COMPARTILHADO (PADRAO TAPO, IGUAL AO DAS CAMERAS INTERNAS) ───
        //   TAPO D210 (3MP, £44) e TD23 (5MP, £79.99) MOSTRARAM 4.853 CADA — MESMO POOL, SENSOR E PRECO DIFERENTES.
        //   TAPO TD20 (36) TEM POOL PROPRIO. SINALIZADO NO TEXTO.
        //
        // PROFUNDIDADE (FICHA): 6.131 / 4.853 / 4.853 / 3.266 / 3.120 / 1.946 / 1.695 / 779 / 36 / 21.
        // CORTE: RING+INDOOR BUNDLE (91), ACCFLYLIFE 2K (68), ZEERKEER 1080p (@3.6) — FRACOS/REDUNDANTES.
        //   COMBOS SO-AIR-FRYER NAO SE APLICAM AQUI. E340 DUAL-CAM (21) E TD20 (36) MANTIDOS COM FLAG POR OFERECEREM ALGO UNICO.
        //
        // FOCUS KEYWORD: best video doorbell
        // VARIACOES TRABALHADAS: video doorbell / wireless video doorbell / doorbell camera no subscription /
        // best wireless doorbell camera / ring alternative / battery video doorbell / video doorbell no monthly fee /
        // 2k video doorbell / smart doorbell camera
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DE "tech")
        ];

        $article = [
            'slug' => 'best-video-doorbell',                                          // SLUG DO ARTIGO (URL) - FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Video Doorbell 2026: 10 Wireless Doorbell Cameras Ranked', // TITULO / H1
            'meta_title' => 'Best Video Doorbell 2026: 10 Wireless Cameras Ranked',    // TITLE DA ABA/GOOGLE
            'meta_description' => 'The best video doorbell picks for UK homes, from Tapo and eufy to Ring. Ten wireless doorbell cameras compared on resolution, storage fees and price.', // META DESCRIPTION
            'focus_keyword' => 'best video doorbell',                                // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE

            'intro' => "If you want the short answer, the Tapo D210 is the best video doorbell for most homes: 4,853 ratings at 4.3 stars, a six-month battery, a chime in the box, and no monthly fee because it records to a microSD card, all for GBP 44. The cheapest strong option is the BOIFUN at GBP 44.99, which also charges no subscription.

Two things decide a video doorbell, and neither is the big number on the box. The first is storage. Most doorbells here record to a microSD card or a local hub for free, but the Ring stores video in the cloud and needs a paid Ring Protect subscription to save any recordings at all — without it you get live view and alerts but nothing saved. The second is resolution, where the labels mislead: 2K is used for both 3-megapixel and 5-megapixel sensors, and one brand calls its 5MP camera 3K, so check the megapixels rather than the K number. After that it comes down to field of view, how well the doorbell tells a real visitor from a passing car, and battery life. We compared ten wireless doorbell cameras on those points, plus customer ratings and price, and ranked them below.",

            'conclusion' => "For most homes the best video doorbell here is the Tapo D210: a trusted brand, thousands of happy owners, a chime included, and free local recording to a microSD card. If you want to spend as little as possible, the BOIFUN does the same with no subscription, and if you want the most-reviewed camera on the page, the eufy C30 stores footage locally too.

Before you buy, settle the subscription question. Every camera here except the Ring records for free to a card or a hub; the Ring is a fine doorbell, but budget for Ring Protect or you will not be able to save any video. If catching packages left on the ground matters, the dual-camera eufy E340 is built for it, and if you want the fewest false alerts, the radar-equipped aosu models are the ones to look at. And remember that the 2K or 3K on the box is marketing — the megapixel figure is what tells you the real resolution.",

            'author' => 'Felipe Iglesias',                                           // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-09-02 12:00:00',                                 // DATA FIXA — NAO USAR now()
        ];

        // ─── FICHA: good = MELHOR DA LISTA NO QUESITO, bad = PIOR, neutral = MEIO. COMPARA OS DEZ ENTRE SI. ───
        $products = [
            [
                'position' => 1,
                'name' => 'Tapo D210 Wireless Video Doorbell, 2K 3MP, 6-Month Battery, Chime Included',
                'price' => '£44.00',
                'rating' => 4.3,
                'reviews_count' => 4853,
                'image' => 'https://m.media-amazon.com/images/I/71iSBfIctZL._AC_SL1500_.jpg',
                'alt_text' => 'best video doorbell',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D6H1F86B?tag=ranked10-21',
                'summary' => 'The best video doorbell for most homes. A trusted brand at 4.3 stars, a chime in the box, a six-month battery and free microSD recording for GBP 44.',
                'body' => "This is first because it gets the fundamentals right for very little money. At GBP 44 with 4,853 ratings at 4.3 stars, the Tapo D210 comes from TP-Link, a brand people trust, and it includes the indoor chime that some rivals charge extra for. Crucially, it records to a microSD card of up to 512GB with no monthly fee, so unlike the Ring there is nothing more to pay to save your video.

The specification covers what matters: a 2K 3MP sensor with a 160-degree ultra-wide view that shows a caller head to toe, full-colour night vision with a spotlight, free AI detection that tells people from passing motion, and IP65 weatherproofing. The 6400mAh battery lasts around six months between charges, and Tapo Care cloud storage is there as an option if you prefer it.

One thing to know so you buy the right model: this is the 3MP version. Tapo also sells a 5MP doorbell, the TD23, which shares this listing's review pool but costs nearly twice as much. Both are labelled 2K, so if you want the sharper sensor, check you are buying the TD23 further down and not this one by mistake.",
                'pros' => ['4,853 ratings at 4.3 stars from a trusted brand', 'No monthly fee, records free to a microSD card up to 512GB', 'Indoor chime included in the box', '160-degree head-to-toe view and colour night vision', 'Around six months of battery, IP65 weatherproof'],
                'contras' => ['3MP sensor, not the sharper 5MP of the TD23', 'Shares its review pool with the pricier TD23', '2K label does not distinguish it from the 5MP model', 'Cloud storage is a paid extra if you want it'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '4,853 at 4.3 stars', 'verdict' => 'good', 'note' => 'Shared with the 5MP TD23.'],
                    ['label' => 'Storage', 'value' => 'microSD, no fee', 'verdict' => 'good', 'note' => 'Free local recording, no subscription.'],
                    ['label' => 'Resolution', 'value' => '2K, 3MP sensor', 'verdict' => 'neutral', 'note' => 'The 3MP version, not the 5MP.'],
                    ['label' => 'Field of view', 'value' => '160 degrees', 'verdict' => 'neutral'],
                    ['label' => 'Battery', 'value' => '6 months', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£44.00', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'eufy Video Doorbell C30 with Chime 2, 2K, Local Storage, No Monthly Fee',
                'price' => '£69.99',
                'rating' => 4.2,
                'reviews_count' => 6131,
                'image' => 'https://m.media-amazon.com/images/I/61co1UfN5lL._AC_SL1500_.jpg',
                'alt_text' => 'eufy C30 wireless video doorbell with chime',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FVX8KDD5?tag=ranked10-21',
                'summary' => 'The most-reviewed doorbell here, with 6,131 ratings. A well-known local-storage brand that keeps footage private and charges no subscription.',
                'body' => "With 6,131 ratings, the eufy C30 has more customer feedback than any other doorbell in this comparison, and eufy is the brand most associated with local, private storage. Footage is kept on a microSD card with no monthly fee, and the doorbell can also join a eufy HomeBase S380 if you want to expand into a wider camera system later. The Chime 2 is included.

It shoots 2K, offers real-time two-way talk and live video calls when someone presses the bell, and works with Alexa and Google. For buyers who specifically do not want their doorbell footage living on a company's cloud, eufy is the natural choice, and this is its mainstream model.

Two things hold it at second rather than first. Its 4.2-star average is a touch below the Tapo and BOIFUN, and at GBP 69.99 it costs more than the D210 for a broadly similar everyday experience. What you gain is the biggest review base on the page and eufy's local-first reputation.",
                'pros' => ['6,131 ratings, the most of any doorbell here', 'Local microSD storage, no monthly fee', 'Optional HomeBase S380 for a wider system', 'Chime 2 included, works with Alexa and Google', 'Live video calls when the bell is pressed'],
                'contras' => ['4.2 stars, slightly below the Tapo and BOIFUN', 'Dearer than the Tapo D210 for a similar experience', '2K without the megapixel stated as plainly as Tapo', 'HomeBase costs extra if you want it'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '6,131 at 4.2 stars', 'verdict' => 'good', 'note' => 'The most feedback on the page.'],
                    ['label' => 'Storage', 'value' => 'microSD, no fee', 'verdict' => 'good'],
                    ['label' => 'Ecosystem', 'value' => 'eufy HomeBase option', 'verdict' => 'good'],
                    ['label' => 'Resolution', 'value' => '2K', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£69.99', 'verdict' => 'neutral'],
                    ['label' => 'Average score', 'value' => '4.2 stars', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'BOIFUN 2K 3MP Video Doorbell, No Monthly Fee, 166 Degree View',
                'price' => '£44.99',
                'rating' => 4.4,
                'reviews_count' => 3120,
                'image' => 'https://m.media-amazon.com/images/I/71JJrzo3OBL._AC_SL1500_.jpg',
                'alt_text' => 'BOIFUN 2K wireless video doorbell camera',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G4M6J5Z2?tag=ranked10-21',
                'summary' => 'The best-value pick. The highest rating of the cheap doorbells at 4.4 stars, a 166-degree view and no monthly fee, for GBP 44.99.',
                'body' => "If value is the priority, the BOIFUN is the pick. At GBP 44.99 it has 3,120 ratings at 4.4 stars, which is the highest average of any budget doorbell here, and like the Tapo it charges no monthly fee, storing video locally. A 166-degree lens is a touch wider than the Tapo's 160, so you see a little more of the doorstep.

It covers the essentials well: 2K 3MP video, human detection to cut false alarms from cars and animals, real-time two-way audio, and easy five-minute installation with no wiring. It runs on 2.4GHz WiFi, which travels through walls better than 5GHz, and works with Alexa.

Its limits are the ones you expect from a smaller brand: no wider ecosystem to grow into, and a 3MP sensor rather than 5MP. But for a cheap, well-liked doorbell with no ongoing cost, it does everything most people need and beats the more famous names on price.",
                'pros' => ['4.4 stars, the highest of the budget doorbells', '3,120 ratings for GBP 44.99', 'No monthly fee, local storage', '166-degree view, slightly wider than the Tapo', 'Human detection and easy wire-free install'],
                'contras' => ['Smaller brand with no wider camera ecosystem', '3MP sensor rather than 5MP', '2.4GHz WiFi only', 'No indoor chime bundled on this model'],
                'specs' => [
                    ['label' => 'Average score', 'value' => '4.4 stars', 'verdict' => 'good', 'note' => 'Highest of the budget doorbells.'],
                    ['label' => 'Price', 'value' => '£44.99', 'verdict' => 'good'],
                    ['label' => 'Storage', 'value' => 'Local, no fee', 'verdict' => 'good'],
                    ['label' => 'Field of view', 'value' => '166 degrees', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '3,120', 'verdict' => 'neutral'],
                    ['label' => 'Resolution', 'value' => '2K, 3MP', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Ring Battery Video Doorbell (newest gen), 2K, 6x Zoom, Alexa',
                'price' => '£79.99',
                'rating' => 4.2,
                'reviews_count' => 3266,
                'image' => 'https://m.media-amazon.com/images/I/61qSmQP9nvL._AC_SL1500_.jpg',
                'alt_text' => 'Ring Battery Video Doorbell newest generation',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FHJ91JY5?tag=ranked10-21',
                'summary' => 'The famous name, with the smoothest Alexa integration. But it records only to the cloud, so it needs a paid Ring Protect subscription to save any video.',
                'body' => "Ring is the doorbell brand most people have heard of, and this newest generation is a polished product: Retinal 2K video with 6x zoom, true-colour night vision, two-way talk, privacy zones, and the best integration with Alexa of anything here — doorbell alerts on your Echo Dot and live video on an Echo Show. It has 3,266 ratings at 4.2 stars.

The reason it sits mid-table rather than higher is the running cost. Ring records only to the cloud, and to save any video — the 180-day history it advertises — you need a paid Ring Protect subscription. Without it you still get live view and motion alerts, but nothing is recorded, so if someone rings or a parcel is taken, there is no clip to look back at. Every other doorbell on this page saves video for free to a card or hub.

Buy the Ring if you are already in the Alexa and Ring ecosystem and are happy to pay the monthly fee for the slick app and cloud features. If you would rather never pay a subscription, the Tapo, eufy and BOIFUN above do the core job and keep your footage for nothing.",
                'pros' => ['The best-known brand with a very polished app', 'Retinal 2K with 6x zoom and colour night vision', 'The smoothest Alexa and Echo integration here', '3,266 ratings at 4.2 stars', 'Privacy zones and easy DIY install'],
                'contras' => ['Records only to the cloud, needs a paid Ring Protect subscription to save video', 'GBP 79.99 before the ongoing fee', 'No local card storage', 'Non-removable battery'],
                'specs' => [
                    ['label' => 'Storage', 'value' => 'Cloud, subscription', 'verdict' => 'bad', 'note' => 'Needs paid Ring Protect to save any video.'],
                    ['label' => 'Alexa', 'value' => 'Best-in-class', 'verdict' => 'good', 'note' => 'Slickest Echo integration here.'],
                    ['label' => 'Resolution', 'value' => '2K, 6x zoom', 'verdict' => 'neutral'],
                    ['label' => 'Customer ratings', 'value' => '3,266 at 4.2 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£79.99', 'verdict' => 'bad', 'note' => 'Plus the monthly fee.'],
                    ['label' => 'Battery', 'value' => 'Non-removable', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Tapo TD23 Video Doorbell, 2K 5MP, Removable Battery, No Monthly Fee',
                'price' => '£79.99',
                'rating' => 4.3,
                'reviews_count' => 4853,
                'image' => 'https://m.media-amazon.com/images/I/71IfcM0SOAL._AC_SL1500_.jpg',
                'alt_text' => 'Tapo TD23 2K 5MP video doorbell with removable battery',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G35TTT7T?tag=ranked10-21',
                'summary' => 'The sharper Tapo. A 5MP sensor, a removable battery and an anti-theft alarm, still with no monthly fee — but it shares the D210 review pool at nearly twice the price.',
                'body' => "This is the step up from our top pick for anyone who wants a sharper image. Where the D210 uses a 3MP sensor, the TD23 has a 5MP one with a starlight sensor for better colour night vision, a 160-degree 4:3 view that shows a visitor head to toe, and an anti-theft alarm that sounds if someone tries to prise it off. It keeps everything that makes Tapo good value: no monthly fee, microSD storage in the hub, and Alexa and Google support.

The removable, rechargeable battery is a practical touch — keep a spare charged and swap it in seconds rather than taking the whole doorbell down. It has the same 4.3-star rating as the D210.

Two things to weigh. It costs GBP 79.99, nearly double the D210, and it shares that model's review pool, so the rating reflects the range rather than this exact camera. Both are sold as 2K, so the only way to be sure you are getting the 5MP sensor is to buy this specific model. If the extra sharpness matters to you, it is worth the step up; if not, the D210 is the better value.",
                'pros' => ['5MP sensor, sharper than the 3MP D210', 'Removable battery you can hot-swap with a spare', 'Anti-theft alarm if someone tampers with it', 'No monthly fee, microSD storage', 'Starlight sensor for colour night vision'],
                'contras' => ['GBP 79.99, nearly double the D210', 'Shares the D210 review pool, so the rating is not model-specific', 'Both are labelled 2K, easy to confuse with the 3MP', 'microSD sits in a separate hub'],
                'specs' => [
                    ['label' => 'Resolution', 'value' => '2K, 5MP sensor', 'verdict' => 'good', 'note' => 'Sharper than the 3MP Tapo and BOIFUN.'],
                    ['label' => 'Battery', 'value' => 'Removable', 'verdict' => 'good', 'note' => 'Hot-swap with a charged spare.'],
                    ['label' => 'Storage', 'value' => 'microSD, no fee', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£79.99', 'verdict' => 'bad', 'note' => 'Nearly double the 3MP D210.'],
                    ['label' => 'Customer ratings', 'value' => '4,853 (shared)', 'verdict' => 'neutral', 'note' => 'Shared with the D210.'],
                    ['label' => 'Security', 'value' => 'Anti-theft alarm', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'aosu 2K Video Doorbell, Radar and PIR Detection, Local Storage',
                'price' => '£84.99',
                'rating' => 4.3,
                'reviews_count' => 1946,
                'image' => 'https://m.media-amazon.com/images/I/51M6ah70WYL._AC_SL1500_.jpg',
                'alt_text' => 'aosu 2K video doorbell with radar detection',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B23LR1RV?tag=ranked10-21',
                'summary' => 'The pick for the fewest false alerts. Radar plus PIR sensing targets real people rather than cars and shadows, with local storage and no fee.',
                'body' => "If nuisance notifications are what put you off a doorbell, the aosu is built for the problem. It pairs a radar sensor with a traditional PIR motion sensor and human detection, which together are far better at ignoring passing cars, moving shadows and next door's cat than a single PIR sensor. It has 1,946 ratings at 4.3 stars, stores footage locally on the aosuBase with no monthly fee, and offers a 166-degree view.

It runs on dual-band 2.4 and 5GHz WiFi, has 180-day battery life, and even includes a voice changer for answering the door when you are out. The two-way talk and Alexa and Google support are all present.

At GBP 84.99 it is dearer than the mainstream picks, and its 2K resolution is standard rather than the 5MP of the aosu 3K below. You are paying for the detection accuracy and the local hub, which is the right trade if false alerts are your main frustration; if they are not, cheaper doorbells cover the basics for less.",
                'pros' => ['Radar plus PIR sensing cuts false alerts sharply', '1,946 ratings at 4.3 stars', 'Local aosuBase storage, no monthly fee', 'Dual-band WiFi and 180-day battery', 'Voice changer and two-way talk'],
                'contras' => ['GBP 84.99, dearer than the mainstream picks', '2K rather than the 5MP aosu 3K below', 'Smaller brand than Ring or eufy', 'Hub-based storage adds a component'],
                'specs' => [
                    ['label' => 'Detection', 'value' => 'Radar plus PIR', 'verdict' => 'good', 'note' => 'Best false-alert control here.'],
                    ['label' => 'Storage', 'value' => 'Local hub, no fee', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '1,946 at 4.3 stars', 'verdict' => 'neutral'],
                    ['label' => 'Resolution', 'value' => '2K', 'verdict' => 'neutral'],
                    ['label' => 'Battery', 'value' => '180 days', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£84.99', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'BOIFUN 2K Video Doorbell, 180 Degree Head-to-Toe View, No Monthly Fee',
                'price' => '£49.99',
                'rating' => 4.4,
                'reviews_count' => 1695,
                'image' => 'https://m.media-amazon.com/images/I/71vop6voFKL._AC_SL1500_.jpg',
                'alt_text' => 'BOIFUN 2K video doorbell with 180 degree view',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F18M6S5W?tag=ranked10-21',
                'summary' => 'The widest view here. A 180-degree lens sees the whole doorstep from head to a parcel on the ground, at 4.4 stars with no subscription.',
                'body' => "This BOIFUN's stand-out is its field of view: at 180 degrees it is the widest lens in the comparison, so it captures a visitor from head to toe and a parcel left on the ground directly below, which narrower doorbells miss. At GBP 49.99 with 1,695 ratings at 4.4 stars and no monthly fee, it is a strong value pick if coverage is your priority.

It shoots 2K, uses AI human detection to keep alerts meaningful, supports two-way audio and installs in minutes without wiring. Like the other BOIFUN it stores video locally with no ongoing cost.

It sits below the cheaper BOIFUN mainly on price and review count, and it runs on 2.4GHz WiFi only. But if you have a tall porch or want to be sure you see deliveries on the doorstep, that extra-wide angle is a genuine reason to choose it over a 160-degree camera.",
                'pros' => ['180-degree view, the widest in this comparison', 'Sees a parcel on the ground below the door', '4.4 stars over 1,695 ratings', 'No monthly fee, local storage', 'AI human detection, wire-free install'],
                'contras' => ['Dearer than the cheaper 166-degree BOIFUN', 'Fewer ratings than that model', '2.4GHz WiFi only', 'A very wide lens can distort the edges'],
                'specs' => [
                    ['label' => 'Field of view', 'value' => '180 degrees', 'verdict' => 'good', 'note' => 'The widest here; sees the ground below.'],
                    ['label' => 'Average score', 'value' => '4.4 stars', 'verdict' => 'good'],
                    ['label' => 'Storage', 'value' => 'Local, no fee', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£49.99', 'verdict' => 'neutral'],
                    ['label' => 'Customer ratings', 'value' => '1,695', 'verdict' => 'neutral'],
                    ['label' => 'Resolution', 'value' => '2K', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'aosu 3K Video Doorbell, 5MP, Radar Detection, Local Storage',
                'price' => '£125.99',
                'rating' => 4.4,
                'reviews_count' => 779,
                'image' => 'https://m.media-amazon.com/images/I/61-dJkllNbL._AC_SL1500_.jpg',
                'alt_text' => 'aosu 3K 5MP video doorbell with radar detection',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B2CLTKJJ?tag=ranked10-21',
                'summary' => 'The sharpest image here, from a 5MP sensor aosu labels 3K, with radar detection and local storage. Premium, and a useful lesson in resolution labels.',
                'body' => "This is the highest-resolution doorbell in the comparison, using a 5MP sensor across seven glass lens elements for a noticeably crisper picture than the 2K cameras. It keeps the radar-plus-PIR detection of the cheaper aosu, adds 60 days of loop recording to a built-in 8GB hub with no monthly fee, and lasts 180 days per charge. It has 779 ratings at 4.4 stars.

It is also a neat illustration of the labelling problem in this category. aosu markets it as 3K and says it is 60 percent improved from 2K, but the real figure is the 5MP sensor — the same sensor class as the Tapo TD23 that is sold as 2K. The K number is marketing; the megapixels are the specification.

At GBP 125.99 it is one of the most expensive doorbells here, which is why it sits at eighth despite the sharp image and good detection. Buy it if you want the clearest picture and local storage and are willing to pay for it; for most doorsteps, a 2K camera is plenty.",
                'pros' => ['5MP sensor, the sharpest image in this comparison', 'Radar plus PIR detection for few false alerts', 'Local 8GB hub, 60-day loop recording, no fee', '180-day battery, dual-band WiFi', '4.4 star average'],
                'contras' => ['GBP 125.99, among the most expensive here', 'Marketed as 3K, which overstates the real 5MP spec', '779 ratings, a smaller sample than the mainstream picks', 'More camera than most doorsteps need'],
                'specs' => [
                    ['label' => 'Resolution', 'value' => '5MP (sold as 3K)', 'verdict' => 'good', 'note' => 'Sharpest here; the K label overstates it.'],
                    ['label' => 'Detection', 'value' => 'Radar plus PIR', 'verdict' => 'good'],
                    ['label' => 'Storage', 'value' => 'Local hub, no fee', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£125.99', 'verdict' => 'bad', 'note' => 'Among the most expensive here.'],
                    ['label' => 'Customer ratings', 'value' => '779 at 4.4 stars', 'verdict' => 'neutral'],
                    ['label' => 'Battery', 'value' => '180 days', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'eufy Video Doorbell E340, Dual Cameras, Wired or Battery, No Monthly Fee',
                'price' => '£127.98',
                'rating' => 4.6,
                'reviews_count' => 21,
                'image' => 'https://m.media-amazon.com/images/I/41ImaKKHd3L._AC_SL1500_.jpg',
                'alt_text' => 'eufy E340 dual camera video doorbell',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0G7YBYHGC?tag=ranked10-21',
                'summary' => 'The pick for parcels. A second, downward camera watches the ground so you see deliveries left at the door — but it is a new listing with few ratings so far.',
                'body' => "The E340 does something no other doorbell here can: it has two cameras. The main one faces out at visitors, while a second, downward-facing camera watches the ground right at your door, so a parcel left on the mat is always in view even when the courier does not hold it up to the lens. eufy calls this Delivery Guard, and for anyone who has lost a package it is a genuine reason to buy.

It stores footage on 8GB of built-in local storage with no subscription, offers colour night vision, runs wired or on a 6500mAh battery, and comes with the Chime 2. Its early rating is an excellent 4.6 stars.

The reason it is ninth is evidence: just 21 ratings, the second-smallest sample on the page, so that high score is an early signal rather than a settled verdict, and at GBP 127.98 it is one of the priciest here. If the dual-camera package view solves your specific problem and you are comfortable being an early buyer, nothing else here matches it; if you want a proven track record, choose the eufy C30 instead.",
                'pros' => ['Dual cameras, the only doorbell here that watches the ground for parcels', 'Local 8GB storage, no monthly fee', 'Wired or battery, colour night vision', 'Chime 2 included', '4.6 star early average'],
                'contras' => ['Only 21 ratings, an early sample not a settled verdict', 'GBP 127.98, among the most expensive here', 'A new listing without a long track record', 'More doorbell than most people need'],
                'specs' => [
                    ['label' => 'Cameras', 'value' => 'Dual, sees the ground', 'verdict' => 'good', 'note' => 'The only one here that watches for parcels.'],
                    ['label' => 'Customer ratings', 'value' => '21 at 4.6 stars', 'verdict' => 'bad', 'note' => 'Very small sample; early signal only.'],
                    ['label' => 'Storage', 'value' => 'Local, no fee', 'verdict' => 'good'],
                    ['label' => 'Power', 'value' => 'Wired or battery', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£127.98', 'verdict' => 'bad'],
                    ['label' => 'Resolution', 'value' => '2K', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Tapo TD20 2K Battery Video Doorbell, Solar-Ready, No Monthly Fee',
                'price' => '£34.99',
                'rating' => 4.4,
                'reviews_count' => 36,
                'image' => 'https://m.media-amazon.com/images/I/81OQIUi9hLL._AC_SL1500_.jpg',
                'alt_text' => 'Tapo TD20 2K battery video doorbell',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FTGL4BQ1?tag=ranked10-21',
                'summary' => 'The cheapest doorbell here at GBP 34.99, and the only one that takes a solar panel to keep itself charged. A newer listing with few ratings so far.',
                'body' => "The TD20 is the lowest price on the page at GBP 34.99, and it brings the Tapo essentials: 2K video, a 160-degree head-to-toe view, free AI detection with no fees, two-way audio and doorbell calls, and local microSD storage plus optional Tapo Care cloud. Its 5200mAh battery gives up to 180 days per charge.

Its own trick is solar support: pair it with a Tapo solar panel and the doorbell tops up its own battery, so in a sunny enough spot you may never have to take it down to charge. For a cheap, no-fee doorbell that mostly looks after itself, that is a real draw.

It is tenth for one reason: only 36 ratings so far, the smallest sample among the working doorbells here, so the 4.4-star score is an early signal rather than a settled one. If you want the cheapest Tapo and like the solar option, it is a lot of doorbell for the money; if you want the reassurance of thousands of reviews, the D210 at the top has them for ten pounds more.",
                'pros' => ['The cheapest doorbell here at GBP 34.99', 'Solar-panel support to keep itself charged', '2K, 160-degree view, free AI detection, no fee', 'Up to 180 days of battery per charge', 'Local microSD storage'],
                'contras' => ['Only 36 ratings, a small early sample', 'Solar panel is a separate purchase', 'Newer listing without a long track record', 'microSD needs buying separately'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£34.99', 'verdict' => 'good', 'note' => 'The cheapest doorbell on the page.'],
                    ['label' => 'Power', 'value' => 'Battery, solar-ready', 'verdict' => 'good', 'note' => 'The only solar option here.'],
                    ['label' => 'Customer ratings', 'value' => '36 at 4.4 stars', 'verdict' => 'bad', 'note' => 'Small early sample.'],
                    ['label' => 'Storage', 'value' => 'microSD, no fee', 'verdict' => 'good'],
                    ['label' => 'Resolution', 'value' => '2K', 'verdict' => 'neutral'],
                    ['label' => 'Battery', 'value' => '180 days', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
        ];

        // ═══════════════════════════════════════════════════════════════
        // ═══ FIM DA AREA EDITAVEL ═══
        // ═══════════════════════════════════════════════════════════════

        $categoryModel = Category::updateOrCreate(['slug' => $category['slug']], $category); // CRIA/ATUALIZA A CATEGORIA
        $articleModel = Article::updateOrCreate(['slug' => $article['slug']], array_merge($article, ['category_id' => $categoryModel->id])); // CRIA/ATUALIZA O ARTIGO
        $articleModel->products()->delete(); // REMOVE PRODUTOS ANTIGOS DESTE ARTIGO
        foreach ($products as $produto) { // PERCORRE A LISTA MANUAL
            $articleModel->products()->create($produto); // RECRIA CADA PRODUTO VINCULADO AO ARTIGO
        }
        $this->command?->info("VideoDoorbellsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
