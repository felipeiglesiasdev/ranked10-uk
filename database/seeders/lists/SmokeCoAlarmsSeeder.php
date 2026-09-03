<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class SmokeCoAlarmsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE ALARMES DE FUMACA E MONOXIDO DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=carbon+monoxide+smoke+alarm&rh=p_36%3A1200-  (18 ASINS, 10 FICHAS ABERTAS)
        // CATEGORIA HOME. SAZONAL: PICO NO OUTONO/INVERNO (aquecimento ligado = risco de CO).
        //
        // ⚠⚠ PRODUTO DE SEGURANCA. REGRAS DESTE ARTIGO:
        //   - REPORTAR SO O QUE A FICHA PUBLICA. NAO AFIRMAR CONFORMIDADE LEGAL DE NENHUM PRODUTO.
        //   - NAO DAR INSTRUCAO DE INSTALACAO COMO SE FOSSE NORMA; MANDAR SEGUIR O FABRICANTE E A ORIENTACAO OFICIAL.
        //   - REGRA VARIA ENTRE INGLATERRA/ESCOCIA/GALES E ENTRE PROPRIETARIO E INQUILINO — SO MENCIONAR QUE VARIA.
        //
        // ─── ACHADO QUE MUDA A COMPRA ───
        //   O PRODUTO MAIS AVALIADO DA BUSCA (FireAngel FA6813, 8.477) NAO E COMBINADO: E SO DE CO E PORTATIL.
        //   MOTIVO PRATICO: ALARME DE FUMACA E DE CO PEDEM LUGARES DIFERENTES — CO PERTO DO APARELHO A COMBUSTAO
        //   (caldeira, lareira, fogao a gas), FUMACA NO CORREDOR/PATAMAR. O COMBINADO RESOLVE 2 EM 1 MAS OBRIGA
        //   A ESCOLHER UM LOCAL SO. → QUEM TEM CALDEIRA LONGE DO CORREDOR COSTUMA SAIR MELHOR COM 2 APARELHOS SEPARADOS.
        //
        // OUTRO EIXO: BATERIA SELADA DE 10 ANOS (nao troca, joga fora no fim) x PILHA SUBSTITUIVEL (mais barato, exige lembrar).
        // VOZ (Kidde, X-Sense) DIZ QUAL E O PERIGO — util de madrugada. DISPLAY DIGITAL (FA3322) MOSTRA NIVEL DE CO.
        //
        // PROFUNDIDADE (FICHA): 8.477 / 5.187 / 3.397 / 2.871 / 1.359 / 686 / 661 / 345 / 120 / 102.
        //
        // FOCUS KEYWORD: best carbon monoxide detector
        // VARIACOES: carbon monoxide detector / co alarm / smoke and carbon monoxide alarm / combined smoke alarm /
        // best co detector uk / 10 year battery alarm / portable carbon monoxide alarm / smoke alarm
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',
            'name' => 'Home',
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.',
        ];

        $article = [
            'slug' => 'best-carbon-monoxide-detector',
            'title' => 'Best Carbon Monoxide Detector 2026: 10 CO and Smoke Alarms Ranked',
            'meta_title' => 'Best Carbon Monoxide Detector 2026: 10 Alarms Ranked',
            'meta_description' => 'The best carbon monoxide detector picks for UK homes, from FireAngel to combined smoke alarms. Ten CO alarms compared on battery life, alerts and price.',
            'focus_keyword' => 'best carbon monoxide detector',

            'intro' => "If you want the short answer, the FireAngel FA6813 is the best carbon monoxide detector for most homes: 8,477 ratings at 4.7 stars, a 10-year sensor, replaceable AA batteries and a portable body you can stand beside a boiler or take away with you, for GBP 14.39. If you would rather cover smoke and CO in one unit, the Kidde 10SCO adds a voice alert that says which hazard it has found, for GBP 24.90.

Here is the thing worth knowing before you compare anything: the most-reviewed product in this search is not a combined alarm at all. It is a CO-only detector, and that is not an accident. Smoke and carbon monoxide want different places — CO alarms belong near whatever burns fuel, such as a boiler, gas fire, log burner or gas hob, while smoke alarms are normally placed on landings and hallways. A combined unit is convenient and covers both in one device, but it forces you to pick a single location for two jobs, so if your boiler is nowhere near your hallway, two separate alarms often work out better than one combined one. The other choice is the battery: a sealed 10-year unit is fitted and forgotten until you replace the whole alarm, while replaceable batteries cost less but rely on you remembering. Placement and testing should follow the manufacturer's instructions and current guidance for where you live, which differs between UK nations and between owners and tenants.",

            'conclusion' => "For most homes the best carbon monoxide detector here is the FireAngel FA6813: it has the most ratings and the highest score of anything on this page, it costs under fifteen pounds, and being portable means it can sit beside the boiler at home and travel to a holiday cottage or caravan, which is where a lot of CO incidents happen. If you want one device for both hazards, the Kidde 10SCO is the best-reviewed combined unit here and its voice alert tells you which danger it has detected rather than leaving you to work it out from beep patterns.

Two decisions worth making deliberately. First, sealed or replaceable: the FireAngel FA3820 and X-Sense SC07 come with 10-year sealed batteries you never touch, while the FA6813 and BLACK+DECKER take standard cells and cost less up front. Second, one unit or two: the FireAngel SB1-R and FA6813 set gives you a separate smoke alarm and CO alarm for GBP 22.99, which lets you put each one where it actually belongs. Whatever you buy, follow the maker's placement instructions and test it on the schedule they specify.",

            'author' => 'Felipe Iglesias',
            'published_at' => '2026-09-03 07:00:00',
        ];

        $products = [
            [
                'position' => 1,
                'name' => 'FireAngel FA6813 Portable Carbon Monoxide Detector, 10-Year Sensor, AA Batteries',
                'price' => '£14.39',
                'rating' => 4.7,
                'reviews_count' => 8477,
                'image' => 'https://m.media-amazon.com/images/I/518UE5bC7DL._AC_SL1500_.jpg',
                'alt_text' => 'best carbon monoxide detector',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CKWGSX22?tag=ranked10-21',
                'summary' => 'The best carbon monoxide detector here. 8,477 ratings at 4.7 stars, a 10-year sensor and a portable body, for GBP 14.39.',
                'body' => "This is both the most-reviewed and the best-scoring product on the page, and it is CO-only by design. An electrochemical sensor rated for 10 years does the detecting, two replaceable AA batteries do the powering, and the body works free-standing or on the included mounting bracket, so it can sit on a shelf beside a boiler rather than being fixed to a ceiling in the wrong room. That portability also makes it the one to throw in a bag for a caravan, boat or holiday cottage, which is exactly where unfamiliar appliances create risk.

A large test button checks it is working and doubles as a silencer for the low-battery chirp, and an amber flash warns when the cells need changing. At GBP 14.39 it is the cheapest way here to cover carbon monoxide properly.

It does not detect smoke, so it is not a substitute for a smoke alarm — pair it with one, or with the FireAngel set further down this page.",
                'pros' => ['8,477 ratings at 4.7 stars, the strongest evidence here', '10-year electrochemical sensor', 'Portable or wall-mounted, so it goes where the boiler is', 'Takes standard replaceable AA batteries', 'GBP 14.39, the cheapest CO cover on this page'],
                'contras' => ['Detects carbon monoxide only, not smoke', 'Batteries need replacing rather than being sealed for life', 'No digital display of CO level', 'Needs a separate smoke alarm alongside it'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '8,477 at 4.7 stars', 'verdict' => 'good', 'note' => 'The most, and best rated, here.'],
                    ['label' => 'Detects', 'value' => 'Carbon monoxide only', 'verdict' => 'neutral'],
                    ['label' => 'Sensor life', 'value' => '10 years', 'verdict' => 'good'],
                    ['label' => 'Power', 'value' => '2 x AA, replaceable', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£14.39', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Kidde 10SCO Combination Smoke and Carbon Monoxide Alarm with Voice Notification',
                'price' => '£24.90',
                'rating' => 4.5,
                'reviews_count' => 5187,
                'image' => 'https://m.media-amazon.com/images/I/61LK4mMjoJL._AC_SL1500_.jpg',
                'alt_text' => 'Kidde 10SCO combination smoke and carbon monoxide alarm',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00M1Q70K4?tag=ranked10-21',
                'summary' => 'The best combined alarm here. 5,187 ratings, and a voice alert that says which hazard it has detected instead of a beep you have to decode.',
                'body' => "If you want one device covering both hazards, this is the best-evidenced choice on the page with 5,187 ratings at 4.5 stars. Its most useful feature is the voice notification: instead of leaving you to work out from a beep pattern whether you are dealing with smoke or carbon monoxide, it tells you, which is worth a great deal at three in the morning when nobody is thinking clearly.

A hush button silences a cooking-related false alarm without disabling the unit, there is a test and reset button, and a peak level memory records the highest CO concentration detected, so you can see whether something happened while you were out.

Being combined, it can only be in one place, which is the compromise described above. Kidde is one of the established names in this market, and at GBP 24.90 the two-in-one convenience is fairly priced.",
                'pros' => ['5,187 ratings at 4.5 stars, best-reviewed combined unit here', 'Voice notification says which hazard it has found', 'Hush button silences a cooking false alarm', 'Peak level memory records the highest CO reading', 'Established Kidde brand'],
                'contras' => ['One location has to serve two different jobs', 'Dearer than a CO-only alarm', 'No digital CO display', '4.5 stars, below the FireAngel CO alarms'],
                'specs' => [
                    ['label' => 'Detects', 'value' => 'Smoke and CO', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '5,187 at 4.5 stars', 'verdict' => 'good'],
                    ['label' => 'Voice alert', 'value' => 'Yes', 'verdict' => 'good', 'note' => 'Names the hazard.'],
                    ['label' => 'Memory', 'value' => 'Peak CO level', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£24.90', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'FireAngel FA3820 Portable Carbon Monoxide Alarm, 10-Year Sealed Battery',
                'price' => '£22.00',
                'rating' => 4.6,
                'reviews_count' => 3397,
                'image' => 'https://m.media-amazon.com/images/I/51gt0uac51L._AC_SL1500_.jpg',
                'alt_text' => 'FireAngel FA3820 portable carbon monoxide alarm',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B9HC17ZG?tag=ranked10-21',
                'summary' => 'Fit and forget. A sealed, tamper-proof 10-year battery, plus a high-sensitivity mode that reacts if CO looks likely to climb.',
                'body' => "The FA3820 is the fit-and-forget version of the top pick. Its 10-year battery is sealed inside and tamper-proof, so there is nothing to replace, nothing to run flat and nothing a child or a curious tenant can remove — you fit it and it works until the whole unit reaches end of life. That single difference is why many landlords and letting agents prefer sealed alarms.

It adds an enhanced sensing mode that activates if the alarm predicts CO levels are likely to rise, and an alarm memory that tells you a CO event happened while you were out — useful, because carbon monoxide can build and disperse without anyone noticing.

With 3,397 ratings at 4.6 stars it is well proven. At GBP 22.00 it costs more than the FA6813, and you cannot extend its life with new batteries, so you are paying up front for ten years of not thinking about it.",
                'pros' => ['Sealed, tamper-proof 10-year battery, nothing to replace', 'Enhanced sensing mode reacts to rising CO', 'Alarm memory flags a CO event while you were out', '3,397 ratings at 4.6 stars', 'Portable or wall-mounted'],
                'contras' => ['GBP 22.00, more than the FA6813', 'Battery cannot be replaced to extend its life', 'Detects carbon monoxide only', 'No digital CO display'],
                'specs' => [
                    ['label' => 'Battery', 'value' => '10-year sealed', 'verdict' => 'good', 'note' => 'Tamper proof, fit and forget.'],
                    ['label' => 'Customer ratings', 'value' => '3,397 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Detects', 'value' => 'Carbon monoxide only', 'verdict' => 'neutral'],
                    ['label' => 'Extras', 'value' => 'Alarm memory', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£22.00', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'X-Sense SC07 Smoke and Carbon Monoxide Alarm, Built-in 10-Year Battery',
                'price' => '£25.07',
                'rating' => 4.6,
                'reviews_count' => 2871,
                'image' => 'https://m.media-amazon.com/images/I/71Js-XbYCHL._AC_SL1500_.jpg',
                'alt_text' => 'X-Sense SC07 smoke and carbon monoxide alarm',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B083W5HCG6?tag=ranked10-21',
                'summary' => 'A combined alarm with two separate sensors and a sealed 10-year battery, at 4.6 stars over 2,871 ratings.',
                'body' => "This is the sealed-battery combined alarm. It carries two distinct sensors — a photoelectric one for smoke and an electrochemical one for carbon monoxide — rather than trying to do both jobs with one element, and a built-in lithium battery powers it for ten years with nothing to change. A three-colour LED shows working status at a glance, which saves standing under it wondering whether the light means fine or faulty.

With 2,871 ratings at 4.6 stars it scores better than the Kidde, though on roughly half the sample.

Two notes. X-Sense states this model does not support interlinking, so it will not wire into a linked system where one alarm sounding triggers the others — worth checking against what your property needs. And as a combined unit it faces the same single-location compromise as the Kidde.",
                'pros' => ['Separate photoelectric smoke and electrochemical CO sensors', 'Built-in 10-year lithium battery, nothing to replace', '2,871 ratings at 4.6 stars', 'Three-colour LED shows status at a glance', 'Slim, tidy design'],
                'contras' => ['Does not support interlinking, per the maker', 'One location for two different jobs', 'Half the sample of the Kidde', 'Battery cannot be replaced'],
                'specs' => [
                    ['label' => 'Sensors', 'value' => 'Photoelectric + electrochemical', 'verdict' => 'good', 'note' => 'Two dedicated sensors.'],
                    ['label' => 'Battery', 'value' => '10-year sealed', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '2,871 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Interlink', 'value' => 'Not supported', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£25.07', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'FireAngel SCB10-R Combined Smoke and Carbon Monoxide Alarm, 10-Year Battery',
                'price' => '£29.97',
                'rating' => 4.5,
                'reviews_count' => 1359,
                'image' => 'https://m.media-amazon.com/images/I/515oeC+SdML._AC_SL1500_.jpg',
                'alt_text' => 'FireAngel SCB10-R combined smoke and carbon monoxide alarm',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07PRLXKHY?tag=ranked10-21',
                'summary' => 'FireAngel combined unit with optical sensing to cut nuisance alarms, distinct sounds for each hazard and a 10-year battery.',
                'body' => "FireAngel's combined alarm covers both hazards with a 10-year battery and, usefully, gives smoke and carbon monoxide distinct alarm sounds along with clear visual indicators, so you can tell the two apart without a voice chip. Its optical sensing technology is designed to reduce nuisance alarms, which is the single most common reason people disable a smoke alarm and never re-enable it — the toast problem.

FireAngel lists it as suitable for a landing, hallway, bedroom, living room or dining room, and it has 1,359 ratings at 4.5 stars.

At GBP 29.97 it is the most expensive combined alarm here, and its review count is well under half the Kidde's. Choose it if reducing false alarms is your priority and you trust the FireAngel name; otherwise the Kidde and X-Sense give you more evidence for less money.",
                'pros' => ['Optical sensing designed to cut nuisance alarms', 'Distinct alarm sounds for smoke and for CO', '10-year battery included', 'FireAngel, an established UK safety brand', 'Clear visual status indicators'],
                'contras' => ['GBP 29.97, the dearest combined alarm here', '1,359 ratings, under half the Kidde', 'One location for two jobs', 'No voice alert or digital display'],
                'specs' => [
                    ['label' => 'Detects', 'value' => 'Smoke and CO', 'verdict' => 'good'],
                    ['label' => 'Nuisance alarms', 'value' => 'Optical sensing', 'verdict' => 'good', 'note' => 'Aimed at the toast problem.'],
                    ['label' => 'Battery', 'value' => '10 years', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '1,359 at 4.5 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£29.97', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'FireAngel FA3322 Digital Carbon Monoxide Alarm with Humidity and Temperature',
                'price' => '£39.99',
                'rating' => 4.6,
                'reviews_count' => 686,
                'image' => 'https://m.media-amazon.com/images/I/51dGdS1tRoL._AC_SL1500_.jpg',
                'alt_text' => 'FireAngel FA3322 digital carbon monoxide alarm with display',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BS49NV76?tag=ranked10-21',
                'summary' => 'The one with a screen. A digital display plus temperature and humidity readings, and an early warning when low CO levels persist.',
                'body' => "Most CO alarms tell you nothing until they scream. The FA3322 has a digital display showing the reading, plus temperature and humidity, so it doubles as a room monitor and, more importantly, gives you information rather than a binary. Its low-level warning is the real feature: when it detects low CO levels sustained over a period, it gives an early alert rather than waiting for a concentration high enough to trigger a full alarm — which is how a slowly failing appliance tends to show itself.

A 10-year battery is sealed within, and it has 686 ratings at 4.6 stars.

At GBP 39.99 it is the most expensive alarm on this page and detects CO only, so it needs a smoke alarm alongside. Buy it if you want visibility of what is happening rather than just an alarm, particularly if you have an older boiler or a solid fuel fire.",
                'pros' => ['Digital display shows the actual CO reading', 'Early warning when low CO levels persist', 'Also reports temperature and humidity', 'Sealed 10-year battery', '4.6 stars over 686 ratings'],
                'contras' => ['GBP 39.99, the dearest alarm on this page', 'Detects carbon monoxide only', '686 ratings, a modest sample', 'Needs a separate smoke alarm'],
                'specs' => [
                    ['label' => 'Display', 'value' => 'Digital CO reading', 'verdict' => 'good', 'note' => 'Plus temperature and humidity.'],
                    ['label' => 'Early warning', 'value' => 'Sustained low CO', 'verdict' => 'good'],
                    ['label' => 'Battery', 'value' => '10-year sealed', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '686 at 4.6 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£39.99', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Dual Sensor Smoke and Carbon Monoxide Alarm with Digital Display, 85dB',
                'price' => '£19.99',
                'rating' => 4.5,
                'reviews_count' => 661,
                'image' => 'https://m.media-amazon.com/images/I/7164AgGCwdL._AC_SL1500_.jpg',
                'alt_text' => 'dual sensor smoke and carbon monoxide alarm with digital display',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GHPR4Y8C?tag=ranked10-21',
                'summary' => 'The cheapest combined alarm with a screen: independent photoelectric and electrochemical sensors, a digital CO readout and replaceable batteries, for GBP 19.99.',
                'body' => "This unbranded listing undercuts every named combined alarm here at GBP 19.99 while offering a specification that reads well: independent photoelectric and electrochemical sensors rather than one shared element, a digital display giving a real-time CO readout, an 85dB sounder and standard replaceable batteries so it keeps going without buying a new unit every ten years. Mounting kits are included and it is pitched at homes, garages, offices and motorhomes.

It has 661 ratings at 4.5 stars, a reasonable sample for a listing of this kind.

The reservation is the same as with any unbranded safety product: there is no established company behind it, no service history, and no way to know the next batch is identical to the one these reviewers bought. For a device whose whole job is to work in an emergency years from now, that is worth weighing against the ten pounds you save over the Kidde.",
                'pros' => ['Cheapest combined alarm here at GBP 19.99', 'Independent photoelectric and electrochemical sensors', 'Digital display with real-time CO readout', 'Replaceable batteries, no ten-year replacement cycle', '661 ratings at 4.5 stars'],
                'contras' => ['Unbranded, with no company track record', 'No service history for a safety device', 'Batteries rely on you remembering', 'One location for two jobs'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£19.99', 'verdict' => 'good', 'note' => 'Cheapest combined unit here.'],
                    ['label' => 'Sensors', 'value' => 'Two independent', 'verdict' => 'good'],
                    ['label' => 'Display', 'value' => 'Digital CO readout', 'verdict' => 'good'],
                    ['label' => 'Brand', 'value' => 'Unbranded listing', 'verdict' => 'bad'],
                    ['label' => 'Customer ratings', 'value' => '661 at 4.5 stars', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'X-Sense XP0A-SR Smoke and Carbon Monoxide Alarm with English Voice Alerts, 30mm Slim',
                'price' => '£23.98',
                'rating' => 4.6,
                'reviews_count' => 345,
                'image' => 'https://m.media-amazon.com/images/I/71yHkxNsncL._AC_SL1500_.jpg',
                'alt_text' => 'X-Sense XP0A-SR smoke and carbon monoxide alarm with voice alerts',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CSG17H65?tag=ranked10-21',
                'summary' => 'Voice alerts in English on a 30mm-thin body, with replaceable batteries — the discreet combined alarm.',
                'body' => "The XP0A-SR pairs the feature that makes the Kidde good — an English voice alert naming the hazard rather than a beep code — with a body only 30mm thick, so it sits far less obtrusively on a ceiling than the usual bulky disc. It uses replaceable batteries rather than a sealed cell, which keeps the running cost down over a decade.

It has 345 ratings at 4.6 stars, the best score among the voice-equipped alarms here.

Two caveats. X-Sense states this model does not support interlinking, so it will not join a linked system. And 345 ratings is a small sample next to the thousands behind the Kidde, so the score is promising rather than settled. Buy it if you want voice alerts in a discreet unit and are comfortable with a newer listing.",
                'pros' => ['English voice alerts name the hazard', 'Only 30mm thick, discreet on a ceiling', 'Replaceable battery keeps long-run cost down', '4.6 stars, best of the voice alarms here', 'Covers both smoke and CO'],
                'contras' => ['Does not support interlinking, per the maker', '345 ratings, a small sample', 'One location for two jobs', 'Batteries rely on you remembering'],
                'specs' => [
                    ['label' => 'Voice alerts', 'value' => 'English', 'verdict' => 'good'],
                    ['label' => 'Thickness', 'value' => '30 mm', 'verdict' => 'good', 'note' => 'The most discreet here.'],
                    ['label' => 'Customer ratings', 'value' => '345 at 4.6 stars', 'verdict' => 'bad'],
                    ['label' => 'Interlink', 'value' => 'Not supported', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£23.98', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'FireAngel SB1-R Smoke Alarm and FA6813 Carbon Monoxide Detector Set',
                'price' => '£22.99',
                'rating' => 4.6,
                'reviews_count' => 120,
                'image' => 'https://m.media-amazon.com/images/I/51Y4AVnspnL._AC_SL1500_.jpg',
                'alt_text' => 'FireAngel SB1-R smoke alarm and FA6813 carbon monoxide detector set',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FPMDWFJN?tag=ranked10-21',
                'summary' => 'Two alarms rather than one: a separate smoke alarm and CO detector for GBP 22.99, so each goes where it actually belongs.',
                'body' => "This set is the practical answer to the problem described at the top of this page. Instead of one combined unit compromising on location, you get a dedicated SB1-R smoke alarm for the hallway or landing and the FA6813 CO detector — our top pick — to sit by the boiler or fire, for GBP 22.99, which is less than most single combined alarms here.

The smoke alarm uses a sensing chamber that sees smoke as it enters, and takes a one-year replaceable battery, while the CO alarm runs on its own replaceable cells with a 10-year sensor.

It sits at ninth only on evidence: 120 ratings is one of the smallest samples on the page, because it is a recent bundle rather than a new product — the FA6813 inside it has 8,477 ratings of its own. Note the smoke alarm's one-year battery needs annual attention, unlike the sealed ten-year units above.",
                'pros' => ['Two dedicated alarms so each goes in the right place', 'Cheaper than most single combined units at GBP 22.99', 'Includes the FA6813, the best-reviewed alarm on this page', 'Smoke chamber sees smoke as it enters', 'Both units use replaceable batteries'],
                'contras' => ['Only 120 ratings as a bundle', 'Smoke alarm takes a one-year battery, needing annual attention', 'Two devices to test and maintain', 'No voice alerts or display'],
                'specs' => [
                    ['label' => 'Format', 'value' => 'Two separate alarms', 'verdict' => 'good', 'note' => 'Each in its correct place.'],
                    ['label' => 'Price', 'value' => '£22.99', 'verdict' => 'good'],
                    ['label' => 'Includes', 'value' => 'FA6813 CO alarm', 'verdict' => 'good'],
                    ['label' => 'Smoke battery', 'value' => '1 year replaceable', 'verdict' => 'bad'],
                    ['label' => 'Customer ratings', 'value' => '120 at 4.6 stars', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'BLACK+DECKER Carbon Monoxide Alarm with LCD Screen, 9V Replaceable Battery',
                'price' => '£12.99',
                'rating' => 4.7,
                'reviews_count' => 102,
                'image' => 'https://m.media-amazon.com/images/I/51+INCWc22L._AC_SL1500_.jpg',
                'alt_text' => 'BLACK+DECKER carbon monoxide alarm with LCD screen',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0H1HW4MZD?tag=ranked10-21',
                'summary' => 'The cheapest alarm here at GBP 12.99, with an LCD screen and a 10-year sensor running on a standard 9V battery.',
                'body' => "At GBP 12.99 this is the cheapest product on the page, and it is not stripped back: an electrochemical sensor with a stated 10-year life, an LCD screen showing the reading, an alarm memory that flashes red every four seconds after an event so you know something happened, and a standard 9V battery you can buy anywhere. It needs no wiring and works fixed to a wall or free-standing.

Its early rating is 4.7 stars, the joint highest here.

It is last for one reason: 102 ratings is the smallest sample on this page. For most products that would be a mild caution; for a device whose entire purpose is to work correctly during an emergency several years from now, a thin track record matters more than it would elsewhere. If you want a cheap second CO alarm for a spare room or a caravan, it looks like good value — for the main one, the FireAngel FA6813 costs GBP 1.40 more and has 8,477 ratings behind it.",
                'pros' => ['Cheapest alarm here at GBP 12.99', 'LCD screen shows the CO reading', 'Stated 10-year sensor life', 'Alarm memory flags a past CO event', 'Standard 9V battery, no wiring needed'],
                'contras' => ['Only 102 ratings, the smallest sample here', 'Thin track record for a safety device', 'Detects carbon monoxide only', 'Battery relies on you remembering'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£12.99', 'verdict' => 'good', 'note' => 'The cheapest here.'],
                    ['label' => 'Customer ratings', 'value' => '102 at 4.7 stars', 'verdict' => 'bad', 'note' => 'Smallest sample on the page.'],
                    ['label' => 'Display', 'value' => 'LCD reading', 'verdict' => 'good'],
                    ['label' => 'Sensor life', 'value' => '10 years stated', 'verdict' => 'good'],
                    ['label' => 'Power', 'value' => '9V replaceable', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
        ];

        // ═══════════════════════════════════════════════════════════════
        // ═══ FIM DA AREA EDITAVEL ═══
        // ═══════════════════════════════════════════════════════════════

        $categoryModel = Category::updateOrCreate(['slug' => $category['slug']], $category);
        $articleModel = Article::updateOrCreate(['slug' => $article['slug']], array_merge($article, ['category_id' => $categoryModel->id]));
        $articleModel->products()->delete();
        foreach ($products as $produto) {
            $articleModel->products()->create($produto);
        }
        $this->command?->info("SmokeCoAlarmsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos).");
    }
}
