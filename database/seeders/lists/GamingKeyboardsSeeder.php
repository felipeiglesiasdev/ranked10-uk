<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class GamingKeyboardsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE TECLADOS GAMER DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // FOCUS KEYWORD: best gaming keyboard
        // KEYWORDS SECUNDARIAS: gaming keyboard / razer keyboard / best mechanical keyboard /
        // wireless gaming keyboard / steelseries keyboard / good gaming keyboard /
        // steel series apex pro / cool gaming keyboard / logitech mechanical keyboard /
        // wireless mechanical keyboard / mechanical gaming keyboard
        //
        // NOTA EDITORIAL: O EIXO DO ARTIGO E O TIPO DE SWITCH (MAGNETICO/HALL EFFECT COM RAPID
        // TRIGGER x MECANICO COMUM), QUE E O QUE REALMENTE SEPARA UM TECLADO GAMER DE 2026 DE UM
        // MECANICO NORMAL — E NAO O RGB, QUE TODAS AS LISTAGENS REPETEM.
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MESMO TEXTO JA CADASTRADO)
        ];

        $article = [
            'slug' => 'best-gaming-keyboard',                                    // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK" (SITE JA E UK)
            'title' => 'Best Gaming Keyboard in 2026: 10 Ranked, from £80 to £160', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Gaming Keyboard 2026: Top 10 Ranked & Tested',  // TITLE DA ABA/GOOGLE (49 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best gaming keyboard picks on Amazon, comparing magnetic rapid-trigger switches, wireless mechanical boards and layouts from 60% to full size.', // META DESCRIPTION (156 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best gaming keyboard',                           // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Every keyboard on this page has RGB lighting, so ignore it — it tells you nothing. What actually separates the best gaming keyboard options in 2026 is the switch underneath the keycap. Two boards here use magnetic Hall effect switches, where you set how far a key travels before it registers and it resets the instant you lift off, which is the feature competitive players actually pay for. The rest use traditional mechanical switches, which are excellent to type on but fire at a fixed depth. Get that choice right and everything else — 60% or full size, wired or wireless, clicky or linear — is preference. We compared the top 10 gaming keyboards on Amazon, from a £79 full-size wireless board to a £159 magnetic flagship, and the best gaming keyboard for you depends far more on which of those two camps you land in than on the price.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X
            'conclusion' => "Choosing the best gaming keyboard is really three decisions in order. First, switch type: if you play competitive shooters, a magnetic Hall effect board with rapid trigger is a genuine mechanical advantage and worth the premium; if you play anything else, a good mechanical board will serve you better per pound and feel nicer to type on. Second, size: full size keeps the number pad, TKL drops it to free up mouse space, 75% and 96% squeeze the extra keys into a smaller frame, and 60% strips out the function row entirely — measure your desk before deciding this is cool rather than cramped. Third, wired or wireless: modern 2.4GHz wireless is fast enough that latency is no longer the argument it once was, so it comes down to whether you want to charge another device. One last thing worth checking on any of the best gaming keyboard options here: confirm you are buying the UK layout, because a US board puts the Enter key and the £ symbol in the wrong place and is the single most common reason these get returned.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-19 14:27:13', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'SteelSeries Apex Pro TKL Gen 3, OmniPoint 3.0 Magnetic Switches, OLED Display', // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£159.98',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 202,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71p431T5T-L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'best gaming keyboard',                                                // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://amzn.to/4695gJ0',                                       // LINK AFILIADO
                'summary' => "The most capable board here and our pick for the best gaming keyboard overall: magnetic switches adjustable from 0.1mm to 4.0mm, plus an OLED screen for changing settings without leaving the game.", // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "The Apex Pro TKL is the most complete gaming keyboard on this list, and the reason is its OmniPoint 3.0 analog magnetic switches. Instead of a fixed actuation point, you choose across 40 levels from 0.1mm to 4.0mm — a hair-trigger for movement keys, deeper for keys you do not want to hit by accident. Bottom-out force is 45g, on the light side, which suits fast repeated presses.

Three features build on that, and SteelSeries is the only brand offering all three together. Rapid Trigger resets a key the moment you release it, so counter-strafing registers instantly rather than waiting for the key to rise past a fixed point. Rapid Tap snaps to your most recent keypress, which matters when you roll from A to D without fully lifting. Protection Mode, which is patent pending, raises the actuation on keys adjacent to the ones you use most, cutting accidental presses — no more firing an ultimate by catching the wrong key.

The OLED display is more useful than it sounds: settings are changed on the keyboard itself and stored onboard, so profiles follow the board to another machine and you never alt-tab out of a match to adjust something. Build is PBT keycaps over a USB-C connection with a wrist rest and volume roller included. At £159.98 it is the most expensive here by £40, and with 202 ratings it is also among the better-evidenced.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Actuation adjustable across 40 levels from 0.1mm to 4.0mm', 'Only board here with Rapid Trigger, Rapid Tap and Protection Mode', 'OLED screen changes settings without leaving the game', 'PBT keycaps and wrist rest included'], // PONTOS POSITIVOS
                'contras' => ['Most expensive keyboard on this list at £159.98', 'Wired only, with no wireless option'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Corsair VANGUARD 96, 96% Layout, MLX Plasma Linear, 8000Hz, LCD Screen',  // NOME (ENCURTADO)
                'price' => '£119.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 24,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/715UJPIhZbL._AC_SX679_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Corsair VANGUARD 96, 96% Layout, MLX Plasma Linear, 8000Hz, LCD Screen', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4zGryzE',                                       // LINK AFILIADO
                'summary' => "Full keyboard functionality in roughly TKL footprint, with a 1.9in colour LCD and Stream Deck integration — but Corsair's own software does not support it yet.", // TEXTO CURTO (CARD)
                'body' => "The 96% layout is the clever part here. You keep the number pad, the arrow keys and the function row, but the gaps between key clusters are removed, so the board takes up roughly the desk space of a tenkeyless. For anyone who needs a number pad but wants room to swing a mouse, that is the best of both worlds and it is a layout very few keyboards offer.

On top of that sits a 1.9-inch full-colour LCD screen for animations, images or system stats, six programmable G-keys, a rotary dial, and Elgato Virtual Stream Deck integration so those G-keys can trigger stream actions directly. Polling runs at 8,000Hz, eight times the 1,000Hz standard, and the MLX Plasma linear switches are paired with SOCD Flashtap for cleaner opposing-direction inputs. A keycap puller is in the box, and the switches are hot-swappable.

There is one caveat that Corsair states plainly in its own listing and that you should weigh seriously: iCUE support is described as coming soon. iCUE is Corsair's configuration software, so until it lands, customising the LCD, the G-keys and the lighting is limited. On a keyboard whose headline features are all software-driven, that is a real gap. With 24 ratings there is also little long-term feedback yet.", // TEXTO SEO LONGO - SINALIZA A FALTA DE SUPORTE DO iCUE
                'pros' => ['96% layout keeps the number pad in a TKL-sized frame', '1.9in colour LCD with Stream Deck integration', '8,000Hz polling and hot-swappable switches', 'Six programmable G-keys and a rotary dial'], // PONTOS POSITIVOS
                'contras' => ['Corsair lists iCUE software support as still coming soon', 'Only 24 ratings so far'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Razer BlackWidow V4 X, Green Clicky Switches, 7 Macro Keys, Chroma RGB',  // NOME (ENCURTADO)
                'price' => '£110.49',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 16,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71qoXjgRb-L._AC_SX425_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Razer BlackWidow V4 X, Green Clicky Switches, 7 Macro Keys, Chroma RGB', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4zvowy8',                                       // LINK AFILIADO
                'summary' => "A loud, satisfying clicky board with seven macro keys — but this listing is the US layout, which is a real problem for UK buyers.", // TEXTO CURTO (CARD)
                'body' => "Start with the thing most likely to catch you out: this particular listing is the US layout, and it is the only keyboard on this list that is. Every other board here is UK QWERTY. A US layout has a wide horizontal Enter key instead of the tall UK one, no £ symbol in its usual place, and the @ and \" swapped. If you touch-type on a UK board it will fight you every day, and it is the single most common reason keyboards get returned. Check for a UK variant of the BlackWidow V4 X before ordering this one.

Set that aside and it is a well-made clicky board. Razer Green switches actuate at 1.9mm with 50g of force and are deliberately loud and tactile — the classic mechanical typewriter feel, satisfying for typing and terrible for a shared room or an open mic. Seven dedicated macro keys sit down the left edge for abilities and rotations, and there is a multi-function roller plus separate media keys.

Razer has also addressed the usual complaint about cheaper mechanical boards sounding hollow, adding sound-dampening foam under the circuit board and lubricated stabilisers, so the acoustics are tighter than the price suggests. Doubleshot ABS keycaps and per-key Chroma RGB round it out. With 16 ratings, the sample here is small.", // TEXTO SEO LONGO - ALERTA DE LAYOUT US
                'pros' => ['Loud, tactile Razer Green clicky switches', 'Seven dedicated macro keys plus media controls', 'Sound-dampening foam and lubricated stabilisers', 'Per-key Chroma RGB across 16.8 million colours'], // PONTOS POSITIVOS
                'contras' => ['This listing is US layout, not UK — check before ordering', 'Clicky switches are too loud for shared rooms or streaming'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Corsair K70 PRO TKL, MGX Hyperdrive Magnetic Switches, Rapid Trigger, 8000Hz', // NOME (ENCURTADO)
                'price' => '£109.99',                                                                // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 60,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71fNkOCHWhL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Corsair K70 PRO TKL, MGX Hyperdrive Magnetic Switches, Rapid Trigger, 8000Hz', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4qzFJ5h',                                       // LINK AFILIADO
                'summary' => "The cheapest way into magnetic switches with rapid trigger, at £50 less than the SteelSeries — the value pick if you want the competitive tech.", // TEXTO CURTO (CARD)
                'body' => "If the Apex Pro at number one makes sense to you but £159.98 does not, this is the answer. The K70 PRO TKL uses Corsair's MGX Hyperdrive Hall effect magnetic switches, so you get the same category of technology — adjustable actuation and rapid trigger — for £109.99, a £50 saving.

Actuation adjusts per key from 0.4mm to 3.6mm in 0.1mm steps. That range is slightly narrower at both ends than the SteelSeries, which goes from 0.1mm to 4.0mm, but the practical middle is the same and few people use the extremes. Rapid Trigger changes actuation and reset dynamically so movement keys reset the moment you lift. There is also dual actuation, letting one key trigger two different actions at different depths — useful for combos. Polling is 8,000Hz and the switches are pre-lubricated with a double-rail structure rated to 150 million keystrokes.

The tenkeyless layout drops the number pad for mouse room, which is the standard competitive choice. One detail from the small print worth knowing: only the primary keys use the MGX Hyperdrive magnetic switches — function keys and other non-primary keys use standard MLX switches, so the adjustable actuation does not cover the whole board. At 4.6 across 60 ratings it is the joint highest-rated keyboard here.", // TEXTO SEO LONGO - SINALIZA QUE NEM TODAS AS TECLAS SAO MAGNETICAS
                'pros' => ['Magnetic switches and rapid trigger for £50 less than the SteelSeries', 'Per-key actuation from 0.4mm to 3.6mm in 0.1mm steps', 'Dual actuation fires two actions from one key', 'Joint highest rating here at 4.6'], // PONTOS POSITIVOS
                'contras' => ['Only primary keys are magnetic; the rest use standard MLX switches', 'Wired only, and no wrist rest included'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Razer Huntsman Mini, 60% Compact, Linear Optical Switches, PBT Keycaps',  // NOME (ENCURTADO)
                'price' => '£99.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.6,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 2844,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/714iT-YVHvL._AC_SX679_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Razer Huntsman Mini, 60% Compact, Linear Optical Switches, PBT Keycaps', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4ghgwI6',                                       // LINK AFILIADO
                'summary' => "By far the most reviewed board here with 2,844 ratings, and the most proven pick on this list: a 60% Razer keyboard with fast optical switches and UK layout.", // TEXTO CURTO (CARD)
                'body' => "With 2,844 ratings, the Huntsman Mini has more customer feedback behind it than every other keyboard on this list combined, and it holds 4.6 across that sample. If you want the safest purchase here rather than the newest technology, this is it.

The switches are Razer's linear optical design, which register with a beam of light rather than a physical metal contact. That means fewer moving parts, less friction and no debounce delay, so actuation is faster than a comparable mechanical switch and the switch lasts longer. Linear means smooth all the way down with no bump, which most competitive players prefer over clicky.

The 60% form factor is the thing to think hardest about. It removes the function row, arrow keys and number pad entirely, reaching those through a function layer instead. That frees a lot of desk space for low-sensitivity mouse movement and makes it genuinely portable for LAN events, but if you use F-keys or arrows constantly for work it will frustrate you. Doubleshot PBT keycaps with side-printed secondary functions will not go shiny, onboard memory stores five profiles without software, and the USB-C cable detaches for transport. It is UK layout, unlike the BlackWidow above.", // TEXTO SEO LONGO
                'pros' => ['2,844 ratings, by far the most proven board here', 'Optical switches are faster and last longer than mechanical', 'Doubleshot PBT keycaps that never go shiny', 'Onboard memory for five profiles, no software needed'], // PONTOS POSITIVOS
                'contras' => ['60% layout drops function row, arrows and number pad', 'Fixed actuation, so no rapid trigger'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'EPOMAKER Galaxy100 Lite, Aluminium Case, 8000mAh, Tri-Mode Wireless, QMK/VIA', // NOME (ENCURTADO)
                'price' => '£93.49',                                                                 // PRECO (DA PLANILHA)
                'rating' => 3.8,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 103,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/616djVYs2sL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'EPOMAKER Galaxy100 Lite, Aluminium Case, 8000mAh, Tri-Mode Wireless, QMK/VIA', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4i0WKTV',                                       // LINK AFILIADO
                'summary' => "A gasket-mounted aluminium board built for typing feel rather than gaming speed, and the only one here rated below 4.0.", // TEXTO CURTO (CARD)
                'body' => "This is the enthusiast keyboard of the group, and it is aimed at a different buyer than most of this list. A CNC aluminium case, gasket mounting, five internal dampening layers of Poron, IXPE, EMDP and PET, and factory-lubed linear switches all serve one goal: the deep, muted typing sound that keyboard enthusiasts call thocky. If you spend as much time writing as gaming, that matters more day to day than rapid trigger does.

It is also the most flexible board here for customisation. QMK/VIA support means you can remap any key, build macros and create layers in software that runs in a browser, and the hot-swappable PCB takes 3-pin and 5-pin switches without soldering. Connectivity is tri-mode — 2.4GHz, Bluetooth and USB-C — with an 8,000mAh battery, and it works across Windows, Mac and Android.

The reason it sits at number six is its rating. At 3.8 from 103 ratings it is the only board on this list below 4.0, and unlike the entries here resting on 16 to 25 reviews, that figure comes from a large enough sample to take seriously. Enthusiast boards often trade convenience for character, but a sub-4.0 average across a hundred buyers is worth reading the recent reviews about before committing.", // TEXTO SEO LONGO - HONESTO SOBRE A NOTA ABAIXO DE 4.0
                'pros' => ['Aluminium gasket build with five dampening layers', 'QMK/VIA programmable with a hot-swappable PCB', 'Tri-mode wireless with an 8,000mAh battery', 'Works across Windows, Mac and Android'], // PONTOS POSITIVOS
                'contras' => ['Lowest rating on this list at 3.8, from a meaningful 103 ratings', 'Built for typing feel rather than competitive gaming speed'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Logitech G515 LIGHTSPEED TKL, Low Profile, Wireless, GL Tactile Switches', // NOME (ENCURTADO)
                'price' => '£89.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 101,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61xbaNrej9L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Logitech G515 LIGHTSPEED TKL, Low Profile, Wireless, GL Tactile Switches', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3U8SR5d',                                       // LINK AFILIADO
                'summary' => "The best wireless gaming keyboard here for a tidy desk: low-profile, tenkeyless, tri-mode, with a 1ms report rate that pairs to the same dongle as a Logitech mouse.", // TEXTO CURTO (CARD)
                'body' => "The G515 is the most desk-friendly board on this list. It combines a low-profile chassis with a tenkeyless layout, so it is both shorter and narrower than almost everything else here, and the metal top plate keeps it feeling solid rather than hollow despite the slim frame.

LIGHTSPEED is Logitech's own 2.4GHz wireless, and it delivers a 1ms report rate — fast enough that wireless latency is no longer a real argument against it for gaming. The genuinely useful trick is 2:1 pairing: a compatible Logitech mouse shares the same USB receiver, so two devices occupy one port instead of two. Bluetooth and wired USB are also available, making three connection modes in total.

Switches are low-profile GL Brown tactiles, factory-lubed, giving a definite bump at actuation without the noise of a clicky switch — a sensible middle ground for a shared space. Doubleshot PBT keycaps with an anti-oil finish resist shine, and KEYCONTROL allows up to 15 functions programmed per key. Battery life is quoted at 36 hours of continuous play with RGB on, which means charging roughly weekly for most people — the usual trade for wireless with lighting. At 4.5 across 101 ratings it has a reasonable track record.", // TEXTO SEO LONGO
                'pros' => ['Low-profile TKL takes the least desk space here', '1ms LIGHTSPEED wireless, plus Bluetooth and wired', 'Shares one USB receiver with a Logitech mouse', 'Doubleshot PBT keycaps with anti-oil finish'], // PONTOS POSITIVOS
                'contras' => ['36 hours of battery means charging about weekly with RGB on', 'Low-profile switches feel shallow if you are used to full-height'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'RK ROYAL KLUDGE S98 Wireless Mechanical Keyboard with Display and Knob',   // NOME (ENCURTADO)
                'price' => '£89.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 25,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61W1eCKiJQL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'RK ROYAL KLUDGE S98 Wireless Mechanical Keyboard with Display and Knob', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/45wqS1V',                                       // LINK AFILIADO
                'summary' => "A 98% wireless board with a display screen and control knob for £89.99, plus five dampening layers that RK claims cut noise by 80%.", // TEXTO CURTO (CARD)
                'body' => "The S98 packs a surprising amount into £89.99. It has a small display showing custom GIFs, the date, connection mode, Windows or Mac layout and battery status, plus a rotary knob that adjusts volume, connection mode, backlight brightness and RGB effects depending on how you press it. Those are features that normally appear on boards costing significantly more, like the Corsair at number two.

Acoustically it is well-specified for the money: two thick sound-absorbing foams, an IXPE switch dampener, a PET sounding pad and a silicone dampener, which RK says cuts noise by 80% and removes 20% of the hollow sound cheap boards suffer from. The top-mounted construction gives a firmer, more consistent typing feel than a cheap tray mount. It is hot-swappable with 3-pin and 5-pin support, and RK offers pre-lubed linear, tactile and silent switch options.

Connectivity covers Bluetooth 5.0, 2.4GHz and USB-C, and it works with PCs, laptops, tablets and consoles. The near-full 98% layout keeps the number pad in a compact frame. The main reservation is evidence: with 25 ratings there is not much long-term feedback yet, particularly around how the display and battery hold up over time.", // TEXTO SEO LONGO
                'pros' => ['Display screen and control knob at £89.99', 'Five dampening layers for a quieter, less hollow sound', 'Hot-swappable with linear, tactile and silent options', 'Tri-mode wireless across PC, tablet and console'], // PONTOS POSITIVOS
                'contras' => ['Only 25 ratings so far', 'Less known brand than Razer, Corsair or Logitech'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Corsair K65 PLUS WIRELESS 75%, MLX Fusion Tactile, Hot-Swappable, PBT',   // NOME (ENCURTADO)
                'price' => '£89.00',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 20,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/710xuVyJTBL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Corsair K65 PLUS WIRELESS 75%, MLX Fusion Tactile, Hot-Swappable, PBT', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4xj0qoD',                                       // LINK AFILIADO
                'summary' => "A 75% wireless Corsair with dual-layer sound dampening and hot-swappable tactile switches, at the point where compact meets practical.", // TEXTO CURTO (CARD)
                'body' => "The 75% layout is arguably the smartest compromise on this list. It keeps the function row and the arrow keys — the two things people miss most on a 60% board like the Huntsman Mini — while dropping the number pad and tightening the spacing. For most gamers that is everything they actually use, in a frame that leaves plenty of mouse room.

Corsair's MLX Fusion switches are tactile and pre-lubricated from the factory, so there is a defined bump at actuation without the rattle cheaper tactiles have, and dual-layer sound dampening keeps the acoustics tight. The PCB is hot-swappable, so if you decide you prefer linears later you can change them without soldering. Doubleshot PBT keycaps give per-key RGB shine-through while resisting the greasy shine that ABS develops.

Wireless covers low-latency 2.4GHz and Bluetooth, with USB-C wired as the third option, and Corsair encrypts the wireless connection with AES. At £89.00 it undercuts most of the wired boards higher up this list. The caveat is the same as several here: 20 ratings is a thin sample, so there is limited feedback on battery life and long-term switch feel.", // TEXTO SEO LONGO
                'pros' => ['75% layout keeps function row and arrows without the number pad', 'Pre-lubed tactile switches with dual-layer dampening', 'Hot-swappable PCB and doubleshot PBT keycaps', 'AES-encrypted 2.4GHz plus Bluetooth and wired'], // PONTOS POSITIVOS
                'contras' => ['Only 20 ratings so far', 'No display, knob or wrist rest at this price'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'EPOMAKER TH108 V2 PRO Full Size, 10000mAh, Screen and Knob, Hot-Swappable', // NOME (ENCURTADO)
                'price' => '£79.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 50,                                                               // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61SpadRdqSL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'EPOMAKER TH108 V2 PRO Full Size, 10000mAh, Screen and Knob, Hot-Swappable', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4qJrECB',                                       // LINK AFILIADO
                'summary' => "The cheapest board here at £79.99 and the only full-size wireless one, with a 10,000mAh battery quoted at up to 200 hours.", // TEXTO CURTO (CARD)
                'body' => "If you want a full 104-key layout with a proper number pad and no cable, this is the only option on the list, and at £79.99 it is also the cheapest board here. The 10,000mAh battery is the largest of any keyboard in this ranking by some margin, and EPOMAKER quotes up to 200 hours of continuous use — roughly five times the Logitech's 36 hours, which changes charging from a weekly chore to a monthly one.

It carries the same enthusiast construction as its sibling at number six: gasket mounting with PORON, latex, IXPE, silicone and foam layers for a cushioned, deep-sounding typing feel, plus factory-lubed and tuned switches. It weighs over 1kg, so it stays put during frantic play. A screen and rotary knob handle backlight settings, GIFs and volume, and the browser-based software handles macros, remapping and screen customisation without installing anything.

For gaming specifically, the numbers are honest rather than headline-grabbing: 1,000Hz polling and 2ms latency. That is standard rather than fast — the Corsair boards here run 8,000Hz — and there is no rapid trigger or adjustable actuation. Tri-mode connectivity covers 2.4GHz, Bluetooth and wired across PC, laptop, phone and tablet, with dedicated Mac modifier legends on the PBT keycaps. With 50 ratings at 4.5, it is reasonably well received.", // TEXTO SEO LONGO
                'pros' => ['Cheapest board here at £79.99 and the only full-size wireless', '10,000mAh battery quoted at up to 200 hours', 'Gasket build with five dampening layers and lubed switches', 'Screen, knob and browser-based software with no install'], // PONTOS POSITIVOS
                'contras' => ['1,000Hz polling and 2ms latency, standard rather than fast', 'No rapid trigger or adjustable actuation'], // PONTOS NEGATIVOS
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
        $this->command?->info("GamingKeyboardsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
