<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class FootSpasSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE ESCALDA-PES / FOOT SPAS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=foot+spa+massager&rh=p_36%3A2000-  (24 ASINS, 14 FICHAS ABERTAS)
        // CATEGORIA HOME. SAZONAL: SOBE NO OUTONO/INVERNO (CONFORTO/PES FRIOS).
        //
        // PADRAO EDITORIAL NOVO (30/08): E UM TOP 10, NAO UM ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── EIXOS DE COMPRA ───
        //   AGUA x SECO: FOOT BATH (ENCHE, AQUECE, BOLHA, ROLO) x MASSAGEADOR ELETRICO SECO (AMASSA SEM AGUA — MEDCURSOR, CUPILO).
        //   AQUECIMENTO REAL x "KEEP WARM": RENPHO/HANGSUN/COMFIER/BEINILAI AQUECEM AGUA FRIA E MANTEM (PTC/termostato);
        //     HOMEDICS SO "KEEP WARM" (VOCE POE AGUA QUENTE DA CHALEIRA). → FLAG, MUDA A COMPRA.
        //   ROLO MOTORIZADO (AUTO) x ROLO MANUAL (VOCE ROLA O PE). COLAPSAVEL P/ GUARDAR (COMFIER, BEINILAI).
        //
        // ─── SAUDE (REGRA: DESCREVER, NAO ENDOSSAR) ───
        //   FICHAS CITAM "IMPROVE SLEEP", "PLANTAR FASCIITIS", "CIRCULATION". NO TEXTO: RELAXAMENTO/CONFORTO.
        //   NOTA DE SEGURANCA REAL: DIABETES/NEUROPATIA + AGUA QUENTE = RISCO DE QUEIMADURA SEM SENTIR. VAI NA INTRO.
        //
        // PROFUNDIDADE (FICHA): 68.073 / 7.515 / 6.205 / 3.741 / 3.118 / 2.805 / 1.876 / 1.536 / 215 / 98.
        // ⚠ RENPHO B08112FV3X (marrom) e B095WBRPH6 (preto) DIVIDEM O POOL 68.073 (SO COR) — MANTIDO SO UM.
        // CORTE: EPSOM GENERICOS (5 e 7 AVAL.), JHJ (7), COMFIER SHIATSU (59) — AMOSTRA FINA DEMAIS.
        //   CIRCULATION/EMS BOOSTERS (MEDIC, HOMEDICS FOOT FLOW) FORA: SAO APARELHO DE ALEGACAO MEDICA, NAO FOOT SPA.
        //
        // FOCUS KEYWORD: best foot spa
        // VARIACOES TRABALHADAS: foot spa / foot spa massager / foot bath massager / heated foot spa /
        // foot massager / collapsible foot spa / foot spa with rollers / foot bath / best foot spa uk
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DE "home")
        ];

        $article = [
            'slug' => 'best-foot-spa',                                                // SLUG DO ARTIGO (URL) - FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Foot Spa 2026: 10 Foot Bath and Massagers Ranked',       // TITULO / H1
            'meta_title' => 'Best Foot Spa 2026: 10 Foot Bath Massagers Ranked',      // TITLE DA ABA/GOOGLE
            'meta_description' => 'The best foot spa picks for UK homes, from RENPHO and Revlon to collapsible and dry massagers. Ten foot baths compared on heat, rollers and price.', // META DESCRIPTION
            'focus_keyword' => 'best foot spa',                                      // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE

            'intro' => "If you want the short answer, the RENPHO Foot Spa and Massager is the best foot spa for most people: an extraordinary 68,073 ratings at 4.3 stars, motorised rollers, bubbles and a heater that warms the water and holds the temperature, for GBP 89.99. If you would rather spend far less, the Revlon Pediprep at GBP 27.99 has 7,515 ratings and does the soak-and-pedicure basics well.

The first thing to decide is water or no water. Most picks here are foot baths: you fill them, and heat, bubbles and rollers work on your feet while you soak, which is the classic relaxing foot spa. A couple, like the Medcursor, are dry electric massagers that knead your soles with no water at all, so there is nothing to fill or empty. The second thing to check on a foot bath is the heater: some, like the RENPHO, actively warm cold water and keep it warm, while cheaper ones only slow the water cooling down, so you top them up from the kettle. We compared ten on heating, rollers, size and price, and ranked them below.

One safety note first. A heated foot spa is a comfort product, not a medical treatment. If you have diabetes, neuropathy or reduced feeling in your feet, warm water can scald without you noticing, so check the temperature carefully or speak to a health professional before using one.",

            'conclusion' => "For most people the best foot spa here is the RENPHO: it has more customer feedback than almost any home gadget we have ranked, it actively heats the water rather than just keeping it warm, and the motorised rollers do the work for you. If you only want a simple, cheap soak, the Revlon or the Homedics cost around thirty pounds, though be aware the Homedics keeps water warm rather than heating it from cold.

After that, match the machine to your bathroom and your feet. If storage is tight, the collapsible COMFIER or Beinilai fold away to a fraction of the size. If you would rather not deal with water at all, the Medcursor or CuPiLo knead your feet dry. And whichever you choose, a foot spa with an active heater and its own thermostat stays pleasant far longer than one you have to keep refilling from the kettle.",

            'author' => 'Felipe Iglesias',                                           // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-09-03 09:00:00',                                 // DATA FIXA — NAO USAR now()
        ];

        // ─── FICHA: good = MELHOR DA LISTA NO QUESITO, bad = PIOR, neutral = MEIO. COMPARA OS DEZ ENTRE SI. ───
        $products = [
            [
                'position' => 1,
                'name' => 'RENPHO Foot Spa and Massager with Heater, Motorised Rollers, Bubbles',
                'price' => '£89.99',
                'rating' => 4.3,
                'reviews_count' => 68073,
                'image' => 'https://m.media-amazon.com/images/I/71fT6MLGH7L._AC_SL1500_.jpg',
                'alt_text' => 'best foot spa',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08112FV3X?tag=ranked10-21',
                'summary' => 'The best foot spa for most people. More than 68,000 ratings at 4.3 stars, motorised rollers, bubbles, and a heater that actually warms cold water and holds it.',
                'body' => "Sixty-eight thousand ratings at 4.3 stars is a figure almost no home gadget reaches, and it is why this is first. That much settled feedback on a single foot spa tells you it does what it claims, and what it claims is the full experience: a PTC heater that warms cold water and holds a set temperature, three automatic massage modes with motorised rollers that work your feet for you, and bubble jets, all with a timer.

Practical touches lift it above the cheaper baths. It has wheels and a handle so you can move it full without carrying a tub of water, the temperature is adjustable across three levels, and at 48cm wide it fits larger feet comfortably. RENPHO frames it as daily relaxation for tired feet, which is the honest description.

At GBP 89.99 it is one of the pricier baths here, and it is a large item to store. But it is the only one that combines active heating, powered rollers and this weight of positive feedback, so for most people it is worth the extra over the simple soak-only tubs.",
                'pros' => ['68,073 ratings at 4.3 stars, by far the most here', 'PTC heater warms cold water and holds the temperature', 'Motorised rollers with three automatic massage modes', 'Wheels and a handle, so you move it without carrying water', 'Bubble jets, timer and a wide tub for larger feet'],
                'contras' => ['GBP 89.99, one of the pricier baths here', 'A large item to store', 'Heavier than the simple soak tubs at 3.7kg', 'More machine than a basic soak needs'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '68,073 at 4.3 stars', 'verdict' => 'good', 'note' => 'By far the most feedback here.'],
                    ['label' => 'Heating', 'value' => 'Active PTC heater', 'verdict' => 'good', 'note' => 'Warms cold water and holds it.'],
                    ['label' => 'Rollers', 'value' => 'Motorised, 3 modes', 'verdict' => 'good', 'note' => 'Powered, not manual.'],
                    ['label' => 'Bubbles', 'value' => 'Yes', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£89.99', 'verdict' => 'bad'],
                    ['label' => 'Portability', 'value' => 'Wheels and handle', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Revlon Pediprep Foot Spa, Pumice and Rolling Massage, Pedicure Kit',
                'price' => '£27.99',
                'rating' => 4.4,
                'reviews_count' => 7515,
                'image' => 'https://m.media-amazon.com/images/I/519IDu1Y9WL._AC_SL1500_.jpg',
                'alt_text' => 'Revlon Pediprep foot spa with pedicure attachments',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0168KA3NO?tag=ranked10-21',
                'summary' => 'The best value here. A trusted brand at GBP 27.99 with 7,515 ratings, a pumice and rolling-massage attachment, and a pedicure kit for tidy nails.',
                'body' => "For a simple, cheap soak from a name people know, the Revlon Pediprep is the pick. At GBP 27.99 with 7,515 ratings at 4.4 stars, it is the best-value foot spa on the page, and it is aimed squarely at pedicures: it comes with two removable attachments, a pumice stone to soften hard skin and a mechanical rolling massage to revive tired feet, plus a small pedicure kit for nails.

It has an accunode basin, a heel pad, a foot rest and splash guard, and a waterproof control you can nudge with a toe. It is a compact, light unit at under a kilogram, so it is easy to store and get out.

The trade for the low price is that it is a basic soaker rather than a heated spa: it keeps water warm rather than actively heating it, and the massage is manual rather than motorised. But if you want an affordable way to soak, soften and tidy your feet from a brand with thousands of happy owners, nothing here beats it on value.",
                'pros' => ['7,515 ratings at 4.4 stars for GBP 27.99, the best value here', 'Trusted Revlon brand', 'Pumice and rolling-massage attachments plus a pedicure kit', 'Compact and light, easy to store', 'Toe-touch waterproof control'],
                'contras' => ['Keeps water warm rather than heating from cold', 'Manual massage, not motorised rollers', 'Small unit, less roomy than the RENPHO', 'Basic soaker rather than a full spa'],
                'specs' => [
                    ['label' => 'Price', 'value' => '£27.99', 'verdict' => 'good', 'note' => 'The best value here.'],
                    ['label' => 'Customer ratings', 'value' => '7,515 at 4.4 stars', 'verdict' => 'good'],
                    ['label' => 'Heating', 'value' => 'Keep warm only', 'verdict' => 'bad', 'note' => 'Does not heat cold water.'],
                    ['label' => 'Attachments', 'value' => 'Pumice, roller, kit', 'verdict' => 'good'],
                    ['label' => 'Rollers', 'value' => 'Manual', 'verdict' => 'neutral'],
                    ['label' => 'Size', 'value' => 'Compact', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Sensio Spa Heated Foot Spa with Bubbles and Removable Rollers',
                'price' => '£32.99',
                'rating' => 4.3,
                'reviews_count' => 6205,
                'image' => 'https://m.media-amazon.com/images/I/71L14tBP8RL._AC_SL1500_.jpg',
                'alt_text' => 'Sensio Spa heated foot spa with removable rollers',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0764G4633?tag=ranked10-21',
                'summary' => 'A cheap, well-liked soak with heat, bubbles and removable rollers. 6,205 ratings at 4.3 stars for GBP 32.99.',
                'body' => "The Sensio sits just above the Homedics as a simple, affordable heated soak, and it is popular for good reason: 6,205 ratings at 4.3 stars, a gentle heat setting, soft bubbles and built-in rollers that work the arches, heels and soles as you soak. At GBP 32.99 it is one of the cheapest baths here that includes rollers.

The rollers are removable, so you can lift them out for a plain soak or use them to massage as you go, and an easy dial control keeps it simple. A stable base and a wipe-clean surface make it practical for regular use before trimming nails or applying cream.

Like the other budget tubs, its heat setting is there to keep water comfortable rather than to warm it hard from cold, so start with warm water. But for a cheap, cheerful, well-reviewed foot bath with rollers, it is a strong choice a few pounds up from the very cheapest.",
                'pros' => ['6,205 ratings at 4.3 stars for GBP 32.99', 'Heat, bubbles and removable rollers on a budget', 'Rollers lift out for a plain soak', 'Simple dial control, stable non-slip base', 'Wipe-clean surface'],
                'contras' => ['Gentle heat rather than strong heating from cold', 'Rollers are manual', 'Basic feature set', 'Smaller brand than Revlon or Homedics'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '6,205 at 4.3 stars', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£32.99', 'verdict' => 'good'],
                    ['label' => 'Rollers', 'value' => 'Removable, manual', 'verdict' => 'good'],
                    ['label' => 'Bubbles', 'value' => 'Yes', 'verdict' => 'neutral'],
                    ['label' => 'Heating', 'value' => 'Gentle keep-warm', 'verdict' => 'neutral'],
                    ['label' => 'Base', 'value' => 'Non-slip', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Homedics Bubblemate Foot Spa, Bubbles and Keep-Warm',
                'price' => '£32.00',
                'rating' => 4.2,
                'reviews_count' => 3741,
                'image' => 'https://m.media-amazon.com/images/I/61FkwW24KkL._AC_SL1500_.jpg',
                'alt_text' => 'Homedics Bubblemate foot spa in white and purple',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07FS2YGB2?tag=ranked10-21',
                'summary' => 'A trusted-brand budget soak with bubble jets, massage nodes and a pumice stone — but it keeps water warm rather than heating it, so fill it from the kettle.',
                'body' => "Homedics is a well-known wellness brand, and the Bubblemate is its cheap, cheerful foot bath. At GBP 32 with 3,741 ratings at 4.2 stars, it gives you soothing bubble jets, massage nodes and a pumice stone in a light, easy-to-store tub, with a toe-touch button so you do not have to bend to switch the bubbles on.

It is designed to be shared across a family, fits both small and large feet, and works with your own bath salts.

The one thing to be clear about is the heat. Homedics is explicit that this is a keep-warm design: you add warm water from the tap or kettle and it slows the cooling, rather than heating cold water itself. That is fine if you do not mind boiling the kettle first, but if you want a spa that heats on its own, the RENPHO or Hangsun do, and this one does not. For a cheap branded bubble soak, though, it is a sound buy.",
                'pros' => ['Trusted Homedics brand, 3,741 ratings at 4.2 stars', 'Bubble jets, massage nodes and a pumice stone for GBP 32', 'Toe-touch control, no bending', 'Light and easy to store, fits all foot sizes', 'Works with your own bath salts'],
                'contras' => ['Keep-warm only, does not heat cold water', 'You must fill it from the tap or kettle', 'Manual massage nodes rather than rollers', 'Lowest rating of the well-reviewed baths here'],
                'specs' => [
                    ['label' => 'Heating', 'value' => 'Keep warm only', 'verdict' => 'bad', 'note' => 'Add warm water yourself; it does not heat.'],
                    ['label' => 'Brand', 'value' => 'Homedics', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '3,741 at 4.2 stars', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£32.00', 'verdict' => 'good'],
                    ['label' => 'Massage', 'value' => 'Nodes and pumice', 'verdict' => 'neutral'],
                    ['label' => 'Control', 'value' => 'Toe-touch', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'Medcursor Foot Massager with Heat, Deep Kneading (No Water)',
                'price' => '£65.99',
                'rating' => 4.4,
                'reviews_count' => 3118,
                'image' => 'https://m.media-amazon.com/images/I/81Dix7ZYmjL._AC_SL1500_.jpg',
                'alt_text' => 'Medcursor dry electric foot massager with heat',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08Z8GZGZY?tag=ranked10-21',
                'summary' => 'The best no-water option. A dry electric massager that deep-kneads your soles and heels with heat, so there is nothing to fill or empty. 3,118 ratings at 4.4 stars.',
                'body' => "If the faff of filling and emptying a foot bath puts you off, this is the answer. The Medcursor is a dry electric massager: you slide your feet into two openings and it kneads the soles, heels and toes with rotating nodes, with a heat function and two intensity levels, no water involved. At GBP 65.99 with 3,118 ratings at 4.4 stars, it is the best-reviewed dry massager here.

It works on the same idea as a professional foot massage rather than a soak, and the zippered foot covers detach for cleaning, which keeps it hygienic if more than one person uses it. You can combine deep kneading, heat and the two intensities to suit how tired your feet are.

It is a different product from the baths above rather than a better or worse one — some people want a warm soak, others want a firm knead. If you want the massage without the water, or you want relief for tired soles at a desk, this is the pick. As with all of these, treat any talk of plantar or muscle relief as comfort, not medical treatment.",
                'pros' => ['No water to fill or empty, kneads feet dry', '3,118 ratings at 4.4 stars, the best dry massager here', 'Deep kneading with heat and two intensity levels', 'Zippered covers detach for cleaning', 'Good for tired soles at a desk'],
                'contras' => ['Not a soak, so no warm-water relaxation', 'Fixed foot openings suit a limited shoe-size range', 'Dearer than the budget baths', 'Comfort device, not a medical treatment'],
                'specs' => [
                    ['label' => 'Type', 'value' => 'Dry massager, no water', 'verdict' => 'good', 'note' => 'Nothing to fill or empty.'],
                    ['label' => 'Customer ratings', 'value' => '3,118 at 4.4 stars', 'verdict' => 'good', 'note' => 'Best dry massager here.'],
                    ['label' => 'Massage', 'value' => 'Deep kneading + heat', 'verdict' => 'good'],
                    ['label' => 'Intensity', 'value' => 'Two levels', 'verdict' => 'neutral'],
                    ['label' => 'Hygiene', 'value' => 'Washable covers', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£65.99', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'COMFIER Heated Foot Spa, Collapsible, Vibration, Bubbles, Red Light',
                'price' => '£54.99',
                'rating' => 4.3,
                'reviews_count' => 2805,
                'image' => 'https://m.media-amazon.com/images/I/71+k8S-jc6L._AC_SL1500_.jpg',
                'alt_text' => 'COMFIER collapsible heated foot spa',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0GCF317WL?tag=ranked10-21',
                'summary' => 'The best pick for small spaces. A heated foot spa that folds down for storage, with intelligent temperature control, vibration, bubbles and a long timer.',
                'body' => "A foot bath you cannot store is a foot bath you stop using, and the COMFIER solves that: it collapses down to a fraction of its height so it slides into a cupboard between soaks. It is not a stripped-back unit either — it has intelligent temperature control that actively heats and holds the water, vibration, bubbles, massage rollers and a timer you can set from 10 to 60 minutes. It has 2,805 ratings at 4.3 stars.

The active heater puts it a clear step above the keep-warm budget tubs: you fill it with cold water and it warms it, so there is no kettle involved. The red light is a comfort feature rather than a medical one.

At GBP 54.99 it costs more than the simple soakers, but you are paying for the folding design and the real heater together, which no cheaper bath here offers. If storage is your main obstacle to owning a foot spa, this is the one to buy.",
                'pros' => ['Collapses down for easy storage, ideal for small homes', 'Active temperature control heats and holds the water', 'Vibration, bubbles, rollers and a 10 to 60 minute timer', '2,805 ratings at 4.3 stars', 'No kettle needed, unlike the budget tubs'],
                'contras' => ['Dearer than the simple soak tubs', 'Red light is comfort, not a proven benefit', 'Folding tub is a little less rigid than a solid one', 'Mid-sized capacity'],
                'specs' => [
                    ['label' => 'Storage', 'value' => 'Collapsible', 'verdict' => 'good', 'note' => 'Folds down for a cupboard.'],
                    ['label' => 'Heating', 'value' => 'Active, thermostatic', 'verdict' => 'good', 'note' => 'Heats cold water, no kettle.'],
                    ['label' => 'Customer ratings', 'value' => '2,805 at 4.3 stars', 'verdict' => 'neutral'],
                    ['label' => 'Extras', 'value' => 'Vibration, bubbles, rollers', 'verdict' => 'good'],
                    ['label' => 'Timer', 'value' => '10 to 60 min', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£54.99', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Hangsun FM660 Large Foot Spa with Heater, 14 Rollers, Herb Box',
                'price' => '£49.99',
                'rating' => 4.3,
                'reviews_count' => 1876,
                'image' => 'https://m.media-amazon.com/images/I/61dVqFREzxL._AC_SL1500_.jpg',
                'alt_text' => 'Hangsun large foot spa with rollers and herb box',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01JG5JZ46?tag=ranked10-21',
                'summary' => 'A roomy heated foot bath with 14 rollers and a herb box for adding bath salts or herbs to the soak. 1,876 ratings at 4.3 stars.',
                'body' => "The Hangsun is the pick if you want a large, well-featured heated bath without paying RENPHO money. It has a built-in heater that warms water from cold in minutes and holds the temperature, bubbling jets, and 14 massage rollers to work your reflex zones as you soak. It has 1,876 ratings at 4.3 stars for GBP 49.99.

Its own touch is a medicine box: a small compartment you can fill with herbs or bath salts so they infuse the water during the soak, which is a nice extra if you like a scented or salted bath. Overheat protection covers the safety side, and the spacious tub suits larger feet.

It sits here rather than higher on review count alone — fewer than the cheaper Sensio and Homedics — not on features, where it actually beats them with its active heater. If you want a genuine heated bath with rollers and room to spare, at a mid price, it is a strong middle option.",
                'pros' => ['Active heater warms cold water and holds it', '14 massage rollers and bubbling jets', 'Herb box for infusing salts or herbs into the soak', 'Spacious tub for larger feet, 1,876 ratings at 4.3 stars', 'Overheat protection'],
                'contras' => ['Fewer ratings than the cheaper Sensio and Homedics', 'Rollers are manual', 'Large to store', 'Mid-range price'],
                'specs' => [
                    ['label' => 'Heating', 'value' => 'Active heater', 'verdict' => 'good', 'note' => 'Warms cold water and holds it.'],
                    ['label' => 'Rollers', 'value' => '14, manual', 'verdict' => 'good'],
                    ['label' => 'Herb box', 'value' => 'Yes', 'verdict' => 'good', 'note' => 'Infuse salts or herbs.'],
                    ['label' => 'Customer ratings', 'value' => '1,876 at 4.3 stars', 'verdict' => 'neutral'],
                    ['label' => 'Size', 'value' => 'Large tub', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£49.99', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Beinilai Collapsible Foot Spa, Touch Screen, Six Rollers, Heater',
                'price' => '£37.94',
                'rating' => 4.2,
                'reviews_count' => 1536,
                'image' => 'https://m.media-amazon.com/images/I/710G4bbqbaL._AC_SL1500_.jpg',
                'alt_text' => 'Beinilai collapsible foot spa with touch screen',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DBZK9NLX?tag=ranked10-21',
                'summary' => 'A cheaper folding foot spa than the COMFIER. Heats cold water, folds flat for storage, and has a large touch screen, for GBP 37.94.',
                'body' => "The Beinilai is the budget way to get a folding, actively heated foot bath. It folds down to save space like the COMFIER, but costs less at GBP 37.94, and it still heats cold water to a temperature you set rather than just keeping it warm. A large touch screen handles the controls, and it has six massage rollers, bubbles, vibration and a red light. It has 1,536 ratings at 4.2 stars.

For a home short on storage that also does not want to spend COMFIER money, it hits a useful middle: the fold-away design and the real heater together, at a lower price.

It ranks below the COMFIER on rating and on the polish of its heating and controls, and its 4.2-star average is a shade lower. But if you want a collapsible heated spa for under forty pounds, this is the pick, and the touch screen makes it easy to use.",
                'pros' => ['Folds flat for storage, like the COMFIER but cheaper', 'Heats cold water to a set temperature', 'Large touch screen, six rollers, bubbles and vibration', '1,536 ratings at 4.2 stars for GBP 37.94', 'Carry handle and support bar'],
                'contras' => ['4.2 stars, a shade below the COMFIER', 'Less polished heating and controls than pricier baths', 'Rollers are manual', 'Folding tub is less rigid than a solid one'],
                'specs' => [
                    ['label' => 'Storage', 'value' => 'Collapsible', 'verdict' => 'good'],
                    ['label' => 'Heating', 'value' => 'Active, thermostatic', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£37.94', 'verdict' => 'good', 'note' => 'Cheaper than the COMFIER.'],
                    ['label' => 'Control', 'value' => 'Touch screen', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '1,536 at 4.2 stars', 'verdict' => 'neutral'],
                    ['label' => 'Rollers', 'value' => 'Six, manual', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'CuPiLo Foot Massager with Heat, Shiatsu Rollers, Washable Sleeves (No Water)',
                'price' => '£116.99',
                'rating' => 4.5,
                'reviews_count' => 215,
                'image' => 'https://m.media-amazon.com/images/I/81XRAo51ZHL._AC_SL1500_.jpg',
                'alt_text' => 'CuPiLo dry shiatsu foot massager with heat',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DWVXM7QZ?tag=ranked10-21',
                'summary' => 'A premium dry shiatsu massager with strong heat, three roller intensities, a remote and washable sleeves. The most capable no-water option, at the highest price here.',
                'body' => "The CuPiLo is the upmarket dry massager: no water, three independent roller intensities, fast heat, a remote control and detachable washable foot sleeves. It has 215 ratings at 4.5 stars, the highest average of the dry massagers here, for GBP 116.99. If you want a firm, professional-feeling foot massage rather than a soak, this is the most capable machine on the page.

The heat comes on quickly and the three intensities let you go from a gentle warm-up to a deep knead, with a 15 to 30 minute timer. The washable sleeves keep it hygienic if the whole household uses it, and the remote means you do not have to lean forward to change settings.

Two things hold it at ninth. At GBP 116.99 it is the most expensive product in the comparison, and its 215 ratings are a far smaller sample than the baths above, so the excellent score is less settled than theirs. But if a strong dry massage is exactly what you want and the budget stretches, nothing else here matches its intensity and finish.",
                'pros' => ['Most capable dry massager here, three roller intensities', 'Strong, fast heat and a 15 to 30 minute timer', 'Remote control and detachable washable sleeves', '4.5 stars, the highest of the dry massagers', 'No water to fill or empty'],
                'contras' => ['GBP 116.99, the most expensive product here', 'Only 215 ratings, a smaller sample than the baths', 'Fixed foot pockets suit a limited size range', 'Comfort device, not a medical treatment'],
                'specs' => [
                    ['label' => 'Type', 'value' => 'Dry massager, no water', 'verdict' => 'good'],
                    ['label' => 'Intensity', 'value' => 'Three roller levels', 'verdict' => 'good', 'note' => 'More than the Medcursor.'],
                    ['label' => 'Average score', 'value' => '4.5 stars', 'verdict' => 'good', 'note' => 'Highest of the dry massagers.'],
                    ['label' => 'Price', 'value' => '£116.99', 'verdict' => 'bad', 'note' => 'The most expensive here.'],
                    ['label' => 'Customer ratings', 'value' => '215', 'verdict' => 'neutral'],
                    ['label' => 'Extras', 'value' => 'Remote, washable sleeves', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Beinilai Collapsible Foot Spa with Remote, Red Light, Pedicure Attachments',
                'price' => '£39.99',
                'rating' => 4.3,
                'reviews_count' => 98,
                'image' => 'https://m.media-amazon.com/images/I/71YE0f1SB6L._AC_SL1500_.jpg',
                'alt_text' => 'Beinilai collapsible foot spa with remote control',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FSKR4SHK?tag=ranked10-21',
                'summary' => 'A folding heated foot spa you control by remote, with three pedicure attachments — but on a much smaller review count than the picks above.',
                'body' => "This second Beinilai is the folding foot spa for people who do not want to bend to the controls: it comes with a remote, so you change the heat, bubbles and red light without leaning over the tub. It also folds flat for storage and includes three removable pedicure attachments and a pedicure kit, combining heating, bubble jets and rollers for GBP 39.99.

For a household where reaching down to a control is awkward, the remote is a genuinely useful feature that few foot spas here offer, and the collapsible design keeps storage easy.

It is tenth for one reason: evidence. Ninety-eight ratings at 4.3 stars is a much smaller sample than the thousands behind the picks above, so it is a reasonable but less proven choice. If the remote and the folding design together solve your specific problems, it is worth considering; if you want the reassurance of a big review count, the touch-screen Beinilai or the COMFIER are the safer folding options.",
                'pros' => ['Remote control, so no bending to the tub', 'Folds flat for storage', 'Three pedicure attachments and a kit included', 'Heating, bubbles, rollers and red light', 'Cheaper than the COMFIER'],
                'contras' => ['Only 98 ratings, a small sample versus the picks above', 'Less proven than the touch-screen Beinilai', 'Rollers are manual', 'Newer, less established listing'],
                'specs' => [
                    ['label' => 'Control', 'value' => 'Remote', 'verdict' => 'good', 'note' => 'No bending to the tub.'],
                    ['label' => 'Storage', 'value' => 'Collapsible', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '98 at 4.3 stars', 'verdict' => 'bad', 'note' => 'Small sample versus the picks above.'],
                    ['label' => 'Heating', 'value' => 'Active', 'verdict' => 'good'],
                    ['label' => 'Attachments', 'value' => '3 pedicure', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£39.99', 'verdict' => 'neutral'],
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
        $this->command?->info("FootSpasSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
