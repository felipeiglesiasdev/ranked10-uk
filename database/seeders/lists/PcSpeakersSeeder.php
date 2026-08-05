<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class PcSpeakersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE CAIXAS DE SOM PARA PC DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // FOCUS KEYWORD: best pc speakers
        // KEYWORDS SECUNDARIAS: best computer speakers / pc speakers for desktop /
        // best desktop speakers / computer speakers for pc / usb powered pc speakers /
        // pc sound bar for desktop / speakers for monitor / best budget pc speakers /
        // rgb pc speakers / led computer speakers / 2.1 pc speakers with subwoofer /
        // speakers for laptop / plug and play computer speakers
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home-office',                // SLUG DA CATEGORIA (URL)
            'name' => 'Home & Office',              // NOME EXIBIDO
            'description' => 'Kit to make working from home more comfortable and productive, ranked for UK buyers.', // DESCRICAO (MESMO TEXTO JA CADASTRADO, PARA NAO TROCAR A CADA SEED)
        ];

        $article = [
            'slug' => 'best-pc-speakers',                                        // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK" (SITE JA E UK)
            'title' => 'Best PC Speakers in 2026: 10 Desktop Sets Ranked and Tested', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best PC Speakers 2026: Top 10 Desktop Sets Ranked',  // TITLE DA ABA/GOOGLE (49 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best PC speakers on Amazon, comparing USB-powered desktop speakers, RGB sound bars and 2.1 sets with subwoofers on sound, controls and price.', // META DESCRIPTION (155 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best pc speakers',                               // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "Laptop and monitor speakers are almost always the weakest part of a desk setup, and the fix is cheaper than most people expect. The best PC speakers start at around £13, plug straight into a USB port with no drivers and no wall socket, and instantly make films, calls and games sound like they are coming from your desk rather than from inside a biscuit tin. We compared the top 10 best PC speakers available on Amazon, from tiny USB-powered pairs that hide under a monitor to RGB sound bars, Bluetooth-enabled desktop sets and a 2.1 system with a proper down-firing subwoofer, judging each on sound quality, connections, controls and price.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X
            'conclusion' => "Picking between the best PC speakers really comes down to your desk and your budget. If you just want something better than your monitor for under £20, a simple USB-powered stereo pair does the job with a single cable and no setup at all. If you want your desk to look the part, an RGB sound bar sits neatly under the monitor and takes up almost no space. And if you actually care about bass for films and games, stepping up to a 2.1 set with a subwoofer is the single biggest upgrade on this list. Whichever of the best PC speakers you choose, check two things before you buy: whether it needs a 3.5mm audio cable as well as USB power, and whether the volume knob is somewhere you can actually reach without moving your monitor.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => now(),                                             // DATA DE PUBLICACAO
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Amazon Basics USB-Powered Computer Speakers for Desktop or Laptop',       // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£12.69',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.2,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 17494,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/91C9kMCSVmL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'best pc speakers',                                                    // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://amzn.to/4wczQfB',                                       // LINK AFILIADO
                'summary' => "Joint-cheapest set on this list and one of the best PC speakers for anyone who just wants sound better than their monitor without any setup at all.", // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "If your only goal is to stop using your monitor's built-in speakers, this is the shortest route there. At £12.69 it ties for the cheapest set here, and it is one of the best PC speakers for people who want zero decisions to make: plug the USB into your computer for power, plug in the 3.5mm jack for sound, and it works with no drivers to install.

Everything is on one control on the front of the speakers, combining on/standby with the volume dial, so there is nothing to learn and nothing extra cluttering your desk. There is also a 3.5mm headphone jack built in, which is genuinely handy when you want to switch to headphones for a call without reaching round the back of your PC.

The numbers are modest and honest: 2.2 watts of total RMS power across the pair, with a frequency range from 103Hz to 20KHz. That means no real bass to speak of, so these are best thought of as a clarity upgrade for speech, video calls and YouTube rather than a way to feel explosions in games. At 8.1 x 7.1 x 13.4cm and 0.6kg, they tuck either side of a monitor without taking over the desk.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['Joint-cheapest set in this ranking', 'True plug-and-play, no drivers needed', 'Single control combines power and volume', 'Built-in 3.5mm headphone jack'], // PONTOS POSITIVOS
                'contras' => ['Just 2.2W RMS total, so very little bass', '103Hz bass floor is the highest on this list'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'SOULION R30 PC Sound Bar, RGB LED Lights, USB Powered, 3.5mm Aux',        // NOME (ENCURTADO)
                'price' => '£20.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 8473,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61Kaz03O1vL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'SOULION R30 PC Sound Bar, RGB LED Lights, USB Powered, 3.5mm Aux',    // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4bz7h4B',                                       // LINK AFILIADO
                'summary' => "A single sound bar instead of two separate boxes, with rainbow LED lighting on both sides and a 30-degree tilt that aims the sound at your face rather than your chest.", // TEXTO CURTO (CARD)
                'body' => "The R30 takes a different approach to most sets here: instead of two separate speakers either side of your monitor, it is one sound bar that sits under it. That suits cramped desks, and the 30-degree micro-inclined design tilts the drivers upwards so the audio is aimed at your ears rather than firing flat across the desk.

Two full-range drivers and SOULION's booster technology give it 6W of output, which the brand tunes for clarity at low volumes rather than sheer loudness. A breathable fabric layer covers the front to keep dust out of the drivers, and a single rotary knob handles volume while a separate small button on the back switches the RGB rainbow lighting on both sides on or off, so you can have the look without the light show during work hours.

Connection is the usual two-cable arrangement: USB for power, 3.5mm for audio, with no Bluetooth. It works with PCs, laptops, tablets and phones with a standard 3.5mm jack, but SOULION notes it is not compatible with iMacs, which is worth checking before you order.", // TEXTO SEO LONGO
                'pros' => ['Single bar design saves desk space', 'RGB lighting with a dedicated on/off button', '30-degree tilt aims audio at your ears', 'Over 8,400 customer ratings'], // PONTOS POSITIVOS
                'contras' => ['No Bluetooth, wired only', 'Not compatible with iMac'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'LENRUE G11 PC Speakers for Desktop, Touch Lights, USB-C/USB Powered',     // NOME (ENCURTADO)
                'price' => '£19.98',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.2,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 351,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71UkHoXsGUL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'LENRUE G11 PC Speakers for Desktop, Touch Lights, USB-C/USB Powered', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4fVyAaC',                                       // LINK AFILIADO
                'summary' => "Four amplifier horns and 10W of output for under £20, with touch-sensitive lighting and cables glued together to keep the desk tidy.", // TEXTO CURTO (CARD)
                'body' => "The G11's pitch is more drivers for your money: four amplifier IC horns rather than the single driver per side you get on the cheapest sets, which LENRUE tunes for distortion-free output at 10W. For films, games and music that translates into a fuller sound than the sub-£15 options here, without stepping up to a subwoofer set.

The lighting is the neatest touch. Instead of a fiddly button, you tap the speaker to turn the angular game-style lights on or off, and the volume knob sits on top where you can reach it without hunting behind the monitor. The cables are glued together into a single run to stop the usual tangle of USB and audio leads across your desk.

It is designed to sit directly under a monitor without stealing space, and a USB-C adapter is included alongside the standard USB, so it works with older and newer machines across Windows, macOS and ChromeOS. One caveat straight from LENRUE: use your PC's rear USB 3.0 and audio ports rather than the front-panel ones, which are not wired directly to the motherboard and can be unreliable.", // TEXTO SEO LONGO
                'pros' => ['Four amplifier horns and 10W output for under £20', 'Touch control for the lighting, no fiddly button', 'USB-C adapter included in the box', 'Cables bundled together to reduce desk clutter'], // PONTOS POSITIVOS
                'contras' => ['Only 351 ratings, the least proven set here', 'Needs rear motherboard ports to work reliably'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Creative Pebble V3 2.0 Desktop Speakers, USB-C Audio, Bluetooth 5.0, 8W RMS', // NOME (ENCURTADO)
                'price' => '£34.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 5976,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61aza8PGr+L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Creative Pebble V3 2.0 Desktop Speakers, USB-C Audio, Bluetooth 5.0, 8W RMS', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4wKVx7E',                                       // LINK AFILIADO
                'summary' => "The most flexible set here: one USB-C cable for both power and audio, plus Bluetooth 5.0 and a dialogue-enhancement mode that makes speech easier to follow.", // TEXTO CURTO (CARD)
                'body' => "The Pebble V3 is the set to pick if you want one cable and nothing else on your desk. It carries audio and power over a single USB-C connection, so unlike almost everything else here it does not need a separate 3.5mm lead, and a USB-C to USB-A converter is included for older machines. Creative's 2.25-inch custom-tuned full-range drivers make it around 50% louder than the previous generation, rated at 8W RMS with 16W peak, and a gain switch unlocks the louder mode when plugged into a 10W port.

Its most underrated feature is Clear Dialog audio processing, which lifts spoken word out of the mix on YouTube, films and TV without flattening the background audio or forcing you to turn everything up. If you spend a lot of time on calls or watching content with quiet dialogue, it makes a bigger difference day to day than raw wattage does.

Bluetooth 5.0 is built in too, so the same speakers can stream from your phone when you are away from the desk, and there is a 3.5mm aux input for anything analogue, though that cable is not supplied. The 45-degree elevated drivers aim sound straight at your ears, and a longer cable between the left and right units gives more freedom in where you place them.", // TEXTO SEO LONGO
                'pros' => ['Single USB-C cable carries both power and audio', 'Bluetooth 5.0 for streaming from a phone', 'Clear Dialog processing makes speech easier to follow', 'Gain switch for 8W RMS and 16W peak output'], // PONTOS POSITIVOS
                'contras' => ['Joint most expensive set in this ranking', 'Aux cable not included in the box'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'SOULION R40 PC Speakers, USB/USB-C Powered, Bluetooth Mode, RGB LED',     // NOME (ENCURTADO)
                'price' => '£22.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 2097,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/81ERv-egkJL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'SOULION R40 PC Speakers, USB/USB-C Powered, Bluetooth Mode, RGB LED', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4bzum77',                                       // LINK AFILIADO
                'summary' => "Bluetooth and single-cable USB audio for £12 less than the Creative, with rainbow lighting that remembers your last setting instead of resetting every time.", // TEXTO CURTO (CARD)
                'body' => "The R40 is SOULION's answer to the Creative Pebble V3, and it undercuts it by around £12 while keeping the two features that matter most: a single USB cable that carries both power and audio, and Bluetooth for streaming from a phone or tablet. Two 5W drivers give 10W total, a step up from the entry-level sets here.

Switching between USB and Bluetooth is handled by a dedicated mode button, and there are four physical buttons in total covering mode, lighting and volume up/down, so everything is adjustable by feel without opening any software. The rainbow LEDs on both sides have a memory function that recalls your last lighting choice, which sounds trivial until you have used a set that resets to full rainbow every time you boot.

The important limitation is the flip side of that single-cable design: there is no 3.5mm aux port at all, so it will not work with anything that only outputs analogue audio, and your PC has to support USB audio output. SOULION also notes it is not compatible with Xbox. If you need aux, the R30 above is the same brand's wired alternative.", // TEXTO SEO LONGO
                'pros' => ['Bluetooth plus single-cable USB audio for under £25', '10W total from two 5W drivers', 'Lighting remembers your last setting', 'Four physical buttons for tactile control'], // PONTOS POSITIVOS
                'contras' => ['No 3.5mm aux port at all', 'Not compatible with Xbox'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Logitech Z150 PC Speakers, Stereo, 3.5mm Input, Headphone Jack, UK Plug', // NOME (ENCURTADO)
                'price' => '£24.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 2463,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/716QkdUQOmL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Logitech Z150 PC Speakers, Stereo, 3.5mm Input, Headphone Jack, UK Plug', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4wIuyJW',                                       // LINK AFILIADO
                'summary' => "The established-brand pick: Logitech build quality, integrated controls on the right speaker and a headphone jack, though it needs a mains socket rather than USB.", // TEXTO CURTO (CARD)
                'body' => "The Z150 is the only Logitech set on this list, and it trades the USB-powered convenience of everything around it for mains power and the reassurance of a brand that has been making desktop speakers for decades. Two 5cm drivers deliver 3W RMS of stereo sound, with 6W peak, tuned for clarity rather than volume.

Controls are integrated into the right-hand speaker, combining power and volume into a single button so there is no separate control pod trailing across your desk, and there is a headphone jack on the same unit for switching to private listening instantly. The 3.5mm audio input also lets you connect more than one device and play audio from several sources, useful if you share the same speakers between a work laptop and a personal machine.

It ships with a UK plug, so unlike the USB-powered sets here it needs a free mains socket near your desk. In exchange you get a compact, robust build that Logitech pitches at PCs, TVs, phones and tablets alike, and a set that will not be limited by how much power your USB port can supply.", // TEXTO SEO LONGO
                'pros' => ['Trusted brand with a long track record in desktop audio', 'Power and volume integrated into the right speaker', 'Headphone jack built into the control speaker', 'Ships with a UK plug'], // PONTOS POSITIVOS
                'contras' => ['Needs a mains socket, not USB-powered', 'Just 3W RMS, the lowest rated output here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Creative Pebble Plus 2.1 Desktop Speakers with Down-Firing Subwoofer',    // NOME (ENCURTADO)
                'price' => '£34.99',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.5,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 4827,                                                             // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/51eLUwaKDwL._AC_SL1222_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Creative Pebble Plus 2.1 Desktop Speakers with Down-Firing Subwoofer', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4z1aAvp',                                       // LINK AFILIADO
                'summary' => "The highest-rated set on this list and the only one with a real subwoofer, which is the single biggest upgrade here if you actually want bass.", // TEXTO CURTO (CARD)
                'body' => "Every other set on this list is a 2.0 stereo pair. The Pebble Plus is the only 2.1 system, adding a standalone 4-inch down-firing ported subwoofer that sits under your desk, and it earns the highest rating here at 4.5 as a result. If you have ever felt that desktop speakers sound thin no matter how loud you push them, this is the fix: its 50Hz bass floor goes far deeper than the 80Hz to 103Hz of the cheaper sets.

The two satellites use mid-range drivers elevated at 45 degrees so they fire towards you rather than past you, and a High Gain Mode button pushes total output to 8W RMS when paired with a 5V 2A USB adapter, which is not included in the box. Without that adapter you still get the subwoofer, just with less headroom.

Power comes over USB and audio over a 3.5mm aux cable, so there is no wall socket needed for the speakers themselves and no Bluetooth. At £34.99 it is joint most expensive here alongside the Pebble V3, and the choice between the two is straightforward: V3 for connectivity and single-cable tidiness, Pebble Plus for bass.", // TEXTO SEO LONGO
                'pros' => ['Highest rating on this list at 4.5', 'Only set here with a dedicated subwoofer', '50Hz bass floor, far deeper than any 2.0 set here', '45-degree elevated drivers aim sound at you'], // PONTOS POSITIVOS
                'contras' => ['High Gain Mode needs a 5V 2A adapter that is not included', 'No Bluetooth, and the subwoofer needs floor or under-desk space'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Amazon Basics Stereo 2.0 Speakers for PC or Laptop, 3.5mm Aux, Silver',   // NOME (ENCURTADO)
                'price' => '£15.57',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.4,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 80121,                                                            // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/71dd41KyXmL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Amazon Basics Stereo 2.0 Speakers for PC or Laptop, 3.5mm Aux, Silver', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4fYO7qb',                                       // LINK AFILIADO
                'summary' => "By far the most reviewed set here with over 80,000 ratings, adding a bottom bass radiator and a brushed metal finish for £15.57.", // TEXTO CURTO (CARD)
                'body' => "With more than 80,000 ratings, this is comfortably the most reviewed set on the list, four times the count of anything else here, and its 4.4 average holds up under that volume of feedback. It is the step up from the black Amazon Basics pair at number one, and the differences are worth the extra £3.

The key upgrade is a bottom-mounted radiator that adds a springy low-end response the cheaper model cannot produce, dropping the bass floor from 103Hz to 80Hz. Output is still modest at 2.4W total RMS, so this is not a set for bass-heavy gaming, but voices and music sound noticeably less hollow.

It also looks better on a desk: a brushed silver metal finish with blue LED accents rather than plain black plastic, and a padded base that stops it sliding or scratching the desk. An in-line volume control keeps the adjustment within easy reach, and setup is the same driver-free plug-and-play as the rest of the USB-powered sets here.", // TEXTO SEO LONGO
                'pros' => ['Over 80,000 customer ratings, the most on this list', 'Bottom radiator adds noticeably more low end', 'Brushed metal finish with padded, non-slip base', 'In-line volume control within easy reach'], // PONTOS POSITIVOS
                'contras' => ['Still only 2.4W RMS total', 'Blue LED accents cannot be switched off'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Trust Orada 2.0 PC Speakers, 12W Peak, USB Powered, Illuminated Knob',    // NOME (ENCURTADO)
                'price' => '£12.69',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.2,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 364,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/81Uc3mEMc1L._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'Trust Orada 2.0 PC Speakers, 12W Peak, USB Powered, Illuminated Knob', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/3TDUtnm',                                       // LINK AFILIADO
                'summary' => "Joint-cheapest set here but rated at 6W RMS, nearly triple the Amazon Basics pairs, with a fabric front and an illuminated volume knob.", // TEXTO CURTO (CARD)
                'body' => "The Orada matches the Amazon Basics black pair on price at £12.69 but is rated far higher for output: 6W RMS with 12W peak, against 2.2W RMS. On paper that makes it the best power-per-pound pick on this list, and in practice it means more headroom before the sound starts to strain.

Trust has also spent more on how it looks and feels than most budget sets bother to. There is a fabric front rather than bare plastic grilles, and the volume knob is illuminated, so you can find it in a dim room without feeling around the desk. A headphone jack lets you switch straight to private listening for meetings without unplugging anything.

It is entirely USB-A powered with no mains adapter needed, and the compact satellite design is meant to fit on a desk, shelf or side table without dominating it. The one thing holding it back is track record: with 364 ratings it is one of the least reviewed sets here, so there is less long-term feedback than on the Amazon Basics or Creative options.", // TEXTO SEO LONGO
                'pros' => ['6W RMS from a joint-cheapest set, best power per pound here', 'Fabric front instead of bare plastic', 'Illuminated volume knob is easy to find', 'Headphone jack for instant private listening'], // PONTOS POSITIVOS
                'contras' => ['Only 364 ratings so far', 'Lowest rating on this list alongside two others at 4.2'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'OROW S206 Mini PC Speakers, 12W, Bass Diaphragms, USB Powered, Silver',   // NOME (ENCURTADO)
                'price' => '£13.20',                                                                 // PRECO (DA PLANILHA)
                'rating' => 4.3,                                                                     // NOTA (DA PLANILHA)
                'reviews_count' => 715,                                                              // Nº REVIEWS (DA PLANILHA)
                'image' => 'https://m.media-amazon.com/images/I/61CL7fI-XyL._AC_SL1500_.jpg',        // IMAGEM (DA PLANILHA)
                'alt_text' => 'OROW S206 Mini PC Speakers, 12W, Bass Diaphragms, USB Powered, Silver', // ALT = NOME DO PRODUTO
                'affiliate_link' => 'https://amzn.to/4pVYT4S',                                       // LINK AFILIADO
                'summary' => "The smallest set here at just 6 x 8 x 11cm, with two extra bass cones per speaker and unusually long cables for awkward desk layouts.", // TEXTO CURTO (CARD)
                'body' => "At roughly 6 x 8 x 11cm these are the most compact speakers on the list, aimed at desks where even the Amazon Basics pair feels bulky. OROW's answer to the usual thin sound of tiny speakers is to add two extra bass diaphragms per unit alongside the main driver, giving four diaphragms in total and a fuller low end than the size suggests, at 12W of rated output.

Cable length is a genuinely practical advantage here. You get a 1.6-metre USB power cable and two 1.3-metre audio cables, which is far more slack than most budget sets provide, so it works with a tower on the floor or a monitor on an arm without stretching. In-line controls put the volume on the cable rather than making you reach behind the speakers.

Compatibility is broad: OROW lists desktops, laptops, gaming consoles, MP3 players and projectors, anything with a 3.5mm output and a USB port for power. It is backed by a 1-year after-sales service, and with 715 ratings and a 4.3 average it is a reasonable, low-risk pick if desk space is your main constraint.", // TEXTO SEO LONGO
                'pros' => ['Smallest set on this list at around 6 x 8 x 11cm', 'Four diaphragms in total for more low end than the size suggests', 'Unusually long USB and audio cables', 'Works with consoles and projectors as well as PCs'], // PONTOS POSITIVOS
                'contras' => ['Only 715 ratings so far', 'Small drivers still limit real bass despite the extra cones'], // PONTOS NEGATIVOS
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
        $this->command?->info("PcSpeakersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
