<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class SoundbarsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE SOUNDBARS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=soundbar+for+tv&rh=p_36%3A6000-  (22 ASINS, 13 FICHAS ABERTAS)
        // CATEGORIA TECH. SAZONAL: PICO NO NATAL/BLACK FRIDAY.
        //
        // PADRAO EDITORIAL (30/08): E UM TOP 10, NAO ARTIGO DE ENGENHARIA. VER MiniChainsawsSeeder.
        //
        // ─── EIXOS DE COMPRA ───
        //   CANAIS: 2.0 (so barra) / 2.1 e 3.1 (com subwoofer) / 5.1 (satelites traseiros) / 3.1.2 (o ".2" = drivers p/ cima, Atmos).
        //   SUBWOOFER SEPARADO x TUDO-EM-UM (all-in-one cabe na estante; sub solto precisa de espaco/tomada).
        //   HDMI ARC x eARC: eARC e o que carrega Dolby Atmos sem compressao. ARC/optico so nao bastam p/ Atmos real.
        //   MODO DE DIALOGO/VOZ: o motivo #1 real de compra (nao entender a fala na TV). BOSE e ZVOX vendem por isso.
        //
        // ⚠ CAMPOS DE CATALOGO LIXO (NAO ENTRAM NA PROSA — SO AQUI, MATERIA-PRIMA DO ESTUDO):
        //   HISENSE HS214 "Frequency response: 5020000 KHz"; SONY HT-SF150 "900 KHz" e "25 Watts" numa barra de £98;
        //   ULTIMEA "Frequency response: 18 KHz". WATTAGE E QUASE SEMPRE PICO, NAO RMS — NAO COMPARAR MARCAS POR WATT.
        //
        // PROFUNDIDADE (FICHA): 2.999 / 2.925 / 2.091 / 1.549 / 1.161 / 917 / 507 / 208 / 172 / 146.
        // CORTE: LG US60T (57), ULTIMEA 2.1 £69.98 (43) — amostra fina demais.
        //
        // FOCUS KEYWORD: best soundbar
        // VARIACOES: soundbar / best soundbar uk / soundbar for tv / soundbar with subwoofer /
        // dolby atmos soundbar / cheap soundbar / soundbar for dialogue / all in one soundbar / hdmi arc soundbar
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',
            'name' => 'Tech',
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.',
        ];

        $article = [
            'slug' => 'best-soundbar',
            'title' => 'Best Soundbar 2026: 10 TV Soundbars Ranked and Compared',
            'meta_title' => 'Best Soundbar 2026: 10 TV Soundbars Ranked',
            'meta_description' => 'The best soundbar picks for UK living rooms, from Hisense and Sony to Bose and Sonos. Ten TV soundbars compared on channels, subwoofer and price.',
            'focus_keyword' => 'best soundbar',

            'intro' => "If you want the short answer, the Hisense HS214 is the best soundbar for most people: 2,999 ratings at 4.2 stars, a built-in subwoofer so there is no extra box to find space for, and a price of GBP 79. If dialogue is your problem rather than bass, the Bose TV Speaker at GBP 199 is built specifically to make speech clearer.

Three things decide which soundbar suits you. The first is channels: a 2.0 bar is a single speaker, a 2.1 or 3.1 adds a subwoofer for bass, a 5.1 adds rear speakers, and a number like 3.1.2 means two extra drivers firing upwards for Dolby Atmos height effects. The second is whether that subwoofer is separate or built in — a separate sub hits harder but needs floor space and a plug, while an all-in-one slides under the TV. The third is the connection: HDMI ARC is fine for everyday listening, but you need the newer eARC to carry full-quality Dolby Atmos. One thing to ignore is the wattage, because most of these figures are peak rather than continuous power and are not comparable between brands. We compared ten on those points, plus ratings and price.",

            'conclusion' => "For most living rooms the best soundbar here is the Hisense HS214: it is cheap, has the reviews behind it, and its built-in subwoofer means you are not hunting for a socket and a corner for a second box. If you want proper bass, the Hisense HS3100 adds a wireless subwoofer for only a little more, and the ULTIMEA 5.1 is the cheapest way into real Dolby Atmos over eARC.

Buy differently for a specific reason. If the problem is that you cannot make out what people are saying on television, the Bose TV Speaker and Bose Solo are built around dialogue clarity and do that better than anything else here. If you already own Sonos speakers, the Ray joins that system. And if you want Atmos height effects with upward-firing drivers, the Samsung Q600F is the one on this page that has them.",

            'author' => 'Felipe Iglesias',
            'published_at' => '2026-09-02 17:00:00',
        ];

        $products = [
            [
                'position' => 1,
                'name' => 'Hisense HS214 All-in-One Soundbar, 2.1ch, Built-in Subwoofer, HDMI ARC',
                'price' => '£79.00',
                'rating' => 4.2,
                'reviews_count' => 2999,
                'image' => 'https://m.media-amazon.com/images/I/51oPYhwszmS._AC_SL1500_.jpg',
                'alt_text' => 'best soundbar',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08DJ8P377?tag=ranked10-21',
                'summary' => 'The best soundbar for most people. A compact all-in-one with the subwoofer built in, 2,999 ratings and a GBP 79 price.',
                'body' => "Two thousand nine hundred and ninety-nine ratings makes this the most-reviewed soundbar in the comparison, and its appeal is simple: it is cheap, it is small, and the subwoofer is built into the bar itself. That last point matters more than the spec sheet suggests, because a separate sub needs floor space, a mains socket and a bit of cable management, and plenty of people simply do not have room for one under a wall-mounted TV.

Setup is one HDMI ARC cable to the TV, so the TV remote controls the volume, with optical, aux, USB and Bluetooth for everything else. It is Roku TV Ready if you have a Roku set, and the compact body fits on almost any stand.

At 4.2 stars it is rated slightly below the pricier bars here, and a built-in sub cannot move air like a separate one, so bass is present rather than powerful. But as a straight upgrade over thin TV speakers for under eighty pounds, nothing here beats it on value or evidence.",
                'pros' => ['2,999 ratings, the most-reviewed soundbar here', 'Subwoofer built in, no second box to place or plug in', 'One-cable HDMI ARC setup, TV remote controls volume', 'Bluetooth, optical, aux and USB inputs', 'Compact enough for almost any TV stand'],
                'contras' => ['Built-in sub cannot match a separate subwoofer for bass', '4.2 stars, below the pricier bars here', 'No Dolby Atmos', 'Stereo rather than a true centre channel for dialogue'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '2,999 at 4.2 stars', 'verdict' => 'good', 'note' => 'The most feedback here.'],
                    ['label' => 'Channels', 'value' => '2.1, sub built in', 'verdict' => 'good', 'note' => 'No separate box to house.'],
                    ['label' => 'Price', 'value' => '£79.00', 'verdict' => 'good'],
                    ['label' => 'Connection', 'value' => 'HDMI ARC', 'verdict' => 'neutral'],
                    ['label' => 'Dolby Atmos', 'value' => 'No', 'verdict' => 'neutral'],
                    ['label' => 'Size', 'value' => 'Compact', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 2,
                'name' => 'Hisense HS3100 3.1ch Soundbar with 6.5in Wireless Subwoofer',
                'price' => '£95.00',
                'rating' => 4.6,
                'reviews_count' => 917,
                'image' => 'https://m.media-amazon.com/images/I/51h6v0m3dyL._AC_SL1500_.jpg',
                'alt_text' => 'Hisense HS3100 3.1 soundbar with wireless subwoofer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D22SVP73?tag=ranked10-21',
                'summary' => 'The best value with real bass. A 3.1 channel bar with a 6.5-inch wireless subwoofer and a dedicated centre channel, at 4.6 stars for GBP 95.',
                'body' => "For sixteen pounds more than the all-in-one above, this adds the two things that most improve TV sound: a separate 6.5-inch wireless subwoofer for bass you can feel, and a dedicated centre channel, which is the speaker that handles dialogue. Six speakers across 3.1 channels with Dolby Digital Plus and DTS Virtual:X give it a genuinely wider soundstage than a single bar. It has 917 ratings at 4.6 stars, the joint highest rating on this page.

The subwoofer is wireless, so it needs a mains socket but no cable to the bar, and can go beside a sofa or behind a chair. There is a TV mode that pairs it more tightly with a Hisense television.

The only real cost is space: you now have a second box on the floor. If you can accommodate that, this is the best-sounding soundbar here for under a hundred pounds, and the step up from the HS214 is obvious the first time something explodes on screen.",
                'pros' => ['Separate 6.5-inch wireless subwoofer for real bass', 'Dedicated centre channel improves dialogue', '4.6 stars, the joint highest rating here', 'Dolby Digital Plus and DTS Virtual:X', 'Only GBP 16 more than the all-in-one HS214'],
                'contras' => ['Subwoofer needs floor space and a mains socket', '917 ratings, fewer than the HS214', 'No Dolby Atmos or eARC', 'Wattage figure is peak, not continuous'],
                'specs' => [
                    ['label' => 'Channels', 'value' => '3.1, wireless sub', 'verdict' => 'good', 'note' => 'Centre channel plus real bass.'],
                    ['label' => 'Average score', 'value' => '4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£95.00', 'verdict' => 'good'],
                    ['label' => 'Subwoofer', 'value' => '6.5in, wireless', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '917', 'verdict' => 'neutral'],
                    ['label' => 'Dolby Atmos', 'value' => 'No', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 3,
                'name' => 'Bose TV Speaker, Compact Soundbar with Dialogue Mode and Bluetooth',
                'price' => '£199.00',
                'rating' => 4.6,
                'reviews_count' => 1549,
                'image' => 'https://m.media-amazon.com/images/I/61syGjJDgeL._AC_SL1500_.jpg',
                'alt_text' => 'Bose TV Speaker compact soundbar',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B086KJM7FL?tag=ranked10-21',
                'summary' => 'The pick if you cannot follow the dialogue. Bose builds this around speech clarity rather than bass, at 4.6 stars over 1,549 ratings.',
                'body' => "Most people who buy a soundbar are not chasing cinema bass — they simply cannot make out what characters are saying. This Bose is designed for exactly that. Two angled full-range drivers widen the sound, and a dedicated dialogue mode lifts and clarifies speech rather than just raising the volume, which is the difference between hearing words and hearing noise. It has 1,549 ratings at 4.6 stars.

It is deliberately small, connects with a single optical cable, and streams over Bluetooth. There is no separate subwoofer to place, though Bose sells one if you later want more bass.

The catch is price: GBP 199 for a compact bar with no subwoofer, when the Hisense HS3100 gives you 3.1 channels and a sub for less than half that. You are paying for Bose's tuning and its dialogue processing. If speech clarity is the actual problem you are solving, that is money well spent; if you want explosions, it is not.",
                'pros' => ['Built around dialogue clarity, the real reason most people buy', '1,549 ratings at 4.6 stars', 'Two angled drivers for a wider, natural sound', 'Very compact, single optical cable setup', 'Bose quality and optional matching subwoofer'],
                'contras' => ['GBP 199 with no subwoofer included', 'Far less bass than cheaper 3.1 systems', 'Stereo only, no Atmos', 'Optical-first connection rather than HDMI eARC'],
                'specs' => [
                    ['label' => 'Dialogue mode', 'value' => 'Yes, core feature', 'verdict' => 'good', 'note' => 'The best here for speech clarity.'],
                    ['label' => 'Customer ratings', 'value' => '1,549 at 4.6 stars', 'verdict' => 'good'],
                    ['label' => 'Channels', 'value' => 'Stereo, no sub', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£199.00', 'verdict' => 'bad'],
                    ['label' => 'Size', 'value' => 'Very compact', 'verdict' => 'good'],
                    ['label' => 'Brand', 'value' => 'Bose', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 4,
                'name' => 'Sony HT-SF150 2ch Soundbar with Bluetooth and HDMI ARC',
                'price' => '£98.99',
                'rating' => 4.3,
                'reviews_count' => 2925,
                'image' => 'https://m.media-amazon.com/images/I/41aiZIcs7YL._AC_SL1500_.jpg',
                'alt_text' => 'Sony HT-SF150 2 channel soundbar',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B079DD19ZT?tag=ranked10-21',
                'summary' => 'A trusted brand with 2,925 ratings. A slim two-channel bar with S-Force surround processing and a bass reflex unit, for GBP 98.99.',
                'body' => "With 2,925 ratings at 4.3 stars, this is the second most-reviewed soundbar here and the pick if you want a familiar brand in a slim, simple package. Sony's S-Force front surround processing widens the stereo image to imitate surround sound from a single bar, and a built-in bass reflex unit gives it more low end than its slim body suggests.

Connection is one HDMI ARC cable, with Bluetooth for music from a phone. The soft-edged, low-profile design sits neatly in front of a TV without blocking the screen or the remote sensor.

Two things to weigh. It is a two-channel bar with no separate subwoofer, so at GBP 98.99 the Hisense HS3100 gives you a sub and a centre channel for less. And the catalogue entry lists an implausible 25 watts and a nonsense frequency figure, so judge it on the brand, the review count and the design rather than the numbers in the specification box.",
                'pros' => ['2,925 ratings at 4.3 stars, second most here', 'Trusted Sony brand and tuning', 'S-Force processing widens the stereo image', 'Slim design that will not block the screen', 'One-cable HDMI ARC plus Bluetooth'],
                'contras' => ['Two channels and no separate subwoofer at GBP 98.99', 'The Hisense HS3100 offers more for less', 'Catalogue specification figures are unreliable', 'No Atmos or eARC'],
                'specs' => [
                    ['label' => 'Customer ratings', 'value' => '2,925 at 4.3 stars', 'verdict' => 'good'],
                    ['label' => 'Channels', 'value' => '2.0, no sub', 'verdict' => 'bad'],
                    ['label' => 'Brand', 'value' => 'Sony', 'verdict' => 'good'],
                    ['label' => 'Design', 'value' => 'Slim, low profile', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£98.99', 'verdict' => 'neutral'],
                    ['label' => 'Connection', 'value' => 'HDMI ARC, Bluetooth', 'verdict' => 'neutral'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 5,
                'name' => 'ULTIMEA 5.1ch Dolby Atmos Soundbar with Subwoofer and Rear Speakers, HDMI eARC',
                'price' => '£149.99',
                'rating' => 4.6,
                'reviews_count' => 172,
                'image' => 'https://m.media-amazon.com/images/I/61lM8sq1lsL._AC_SL1500_.jpg',
                'alt_text' => 'ULTIMEA 5.1 channel Dolby Atmos soundbar system',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F7KB6W14?tag=ranked10-21',
                'summary' => 'The cheapest route to a real 5.1 Atmos system. Bar, subwoofer and rear speakers with HDMI eARC, for GBP 149.99.',
                'body' => "This is the most system for the money on the page: a full 5.1 setup with a soundbar, a wired wooden subwoofer and rear satellite speakers, supporting Dolby Atmos over HDMI eARC. That eARC connection matters, because it is the one that carries full-quality Atmos rather than the compressed version older ARC ports allow, and most bars at this price do not have it. Six drivers, a VoiceMX dialogue mode and BassMX bass processing round it out.

Rear speakers genuinely change how a film sounds — effects come from behind you rather than being simulated — and no other product here under GBP 200 includes them.

Its weakness is evidence and cabling. One hundred and seventy-two ratings is a small sample against the thousands behind the Hisense and Sony bars, ULTIMEA is a marketplace brand rather than an established name, and rear speakers mean running wires to the back of the room. If you want a true surround system cheaply and can live with those, it is excellent value.",
                'pros' => ['Full 5.1: bar, subwoofer and rear speakers included', 'HDMI eARC carries full-quality Dolby Atmos', 'Cheapest real surround system in this comparison', 'VoiceMX dialogue mode and BassMX bass processing', '4.6 star average'],
                'contras' => ['Only 172 ratings, a small sample', 'Rear speakers need cables run across the room', 'Marketplace brand without a long track record', 'Wired subwoofer rather than wireless'],
                'specs' => [
                    ['label' => 'Channels', 'value' => '5.1 with rears', 'verdict' => 'good', 'note' => 'The only true surround here.'],
                    ['label' => 'Dolby Atmos', 'value' => 'Yes, over eARC', 'verdict' => 'good', 'note' => 'eARC carries full-quality Atmos.'],
                    ['label' => 'Price', 'value' => '£149.99', 'verdict' => 'good'],
                    ['label' => 'Customer ratings', 'value' => '172 at 4.6 stars', 'verdict' => 'bad', 'note' => 'Small sample.'],
                    ['label' => 'Subwoofer', 'value' => 'Wired, wooden', 'verdict' => 'neutral'],
                    ['label' => 'Setup', 'value' => 'Rear cables needed', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 6,
                'name' => 'Bose Solo Soundbar Series 2, Bluetooth TV Speaker with Dialogue Mode',
                'price' => '£179.00',
                'rating' => 4.4,
                'reviews_count' => 2091,
                'image' => 'https://m.media-amazon.com/images/I/61amW9S4iuL._AC_SL1500_.jpg',
                'alt_text' => 'Bose Solo Soundbar Series 2',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D1CR2C3J?tag=ranked10-21',
                'summary' => 'The slimmest Bose here at under 7cm deep, with an improved dialogue mode and 2,091 ratings — a tidy upgrade for a small room.',
                'body' => "The Solo Series 2 is Bose's most compact bar, standing under seven centimetres tall so it slips in front of a television without covering the bottom of the screen. Like the TV Speaker it is built around clarity: an improved dialogue mode sharpens speech, and built-in Dolby decoding handles the soundtrack. It has 2,091 ratings at 4.4 stars, more feedback than the TV Speaker above.

It connects over optical and streams music over Bluetooth, and the updated grille and logo suit a modern living room.

Where it loses to its stablemate is sound staging: the TV Speaker's angled drivers spread the sound wider and it scores 4.6 to this 4.4. And at GBP 179 you are again paying Bose money for a bar with no subwoofer. Choose the Solo if space is very tight and you want Bose clarity; choose the TV Speaker if you want the better-sounding of the two.",
                'pros' => ['Under 7cm tall, will not block the screen', '2,091 ratings, more than the Bose TV Speaker', 'Improved dialogue mode for speech clarity', 'Built-in Dolby decoding, Bluetooth streaming', 'Simple single-cable optical setup'],
                'contras' => ['4.4 stars, below the Bose TV Speaker', 'No subwoofer at GBP 179', 'Narrower sound than the angled-driver TV Speaker', 'Optical rather than HDMI eARC'],
                'specs' => [
                    ['label' => 'Size', 'value' => 'Under 7cm tall', 'verdict' => 'good', 'note' => 'The slimmest here.'],
                    ['label' => 'Customer ratings', 'value' => '2,091 at 4.4 stars', 'verdict' => 'good'],
                    ['label' => 'Dialogue mode', 'value' => 'Yes, improved', 'verdict' => 'good'],
                    ['label' => 'Channels', 'value' => 'Stereo, no sub', 'verdict' => 'bad'],
                    ['label' => 'Price', 'value' => '£179.00', 'verdict' => 'bad'],
                    ['label' => 'Brand', 'value' => 'Bose', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 7,
                'name' => 'Amazon Fire TV Soundbar, 2.0 with DTS Virtual:X and Dolby Audio',
                'price' => '£119.99',
                'rating' => 4.2,
                'reviews_count' => 1161,
                'image' => 'https://m.media-amazon.com/images/I/41B+q9z2k8L._AC_SL1500_.jpg',
                'alt_text' => 'Amazon Fire TV Soundbar',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CWVZRMCX?tag=ranked10-21',
                'summary' => 'A neat, compact bar for a Fire TV household. Just over 60cm wide, DTS Virtual:X surround processing and a simple HDMI eARC connection.',
                'body' => "At just over 60 centimetres wide, this is one of the smallest bars here, designed to fit the entertainment units and smaller televisions where a full-width soundbar looks silly. Dual speakers with DTS Virtual:X and Dolby Audio processing widen the sound beyond the box, and it plugs in with the included HDMI cable to an eARC or ARC port. It has 1,161 ratings at 4.2 stars.

If your television is a Fire TV, it fits that ecosystem naturally, and Bluetooth streaming from a phone works for music.

It is mid-table because it is a 2.0 bar with no subwoofer at GBP 119.99, which is more than the Hisense HS3100 that includes one. Buy it for the compact size and the Fire TV tidiness rather than for outright sound, and if bass matters more than footprint, look at the Hisense instead.",
                'pros' => ['Just over 60cm wide, suits small TVs and units', '1,161 ratings at 4.2 stars', 'DTS Virtual:X and Dolby Audio processing', 'HDMI cable included, simple eARC/ARC setup', 'Neat fit for a Fire TV household'],
                'contras' => ['2.0 with no subwoofer at GBP 119.99', 'The Hisense HS3100 includes a sub for less', '4.2 stars, mid-pack here', 'Limited bass from the small cabinet'],
                'specs' => [
                    ['label' => 'Size', 'value' => 'Just over 60cm', 'verdict' => 'good', 'note' => 'Suits small TVs.'],
                    ['label' => 'Channels', 'value' => '2.0, no sub', 'verdict' => 'bad'],
                    ['label' => 'Customer ratings', 'value' => '1,161 at 4.2 stars', 'verdict' => 'neutral'],
                    ['label' => 'Processing', 'value' => 'DTS Virtual:X', 'verdict' => 'neutral'],
                    ['label' => 'Price', 'value' => '£119.99', 'verdict' => 'bad'],
                    ['label' => 'Connection', 'value' => 'HDMI, cable included', 'verdict' => 'good'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 8,
                'name' => 'Samsung Q-Series HW-Q600F 3.1.2ch Soundbar with Subwoofer, Dolby Atmos',
                'price' => '£219.99',
                'rating' => 4.7,
                'reviews_count' => 146,
                'image' => 'https://m.media-amazon.com/images/I/71cb50QHCiL._AC_SL1500_.jpg',
                'alt_text' => 'Samsung Q600F 3.1.2 Dolby Atmos soundbar with subwoofer',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DY1Z31MC?tag=ranked10-21',
                'summary' => 'The only bar here with upward-firing Atmos drivers. A 3.1.2 system with subwoofer, room calibration and Q-Symphony, at the highest rating on the page.',
                'body' => "The .2 in 3.1.2 is what sets this apart: two drivers that fire upwards, bouncing sound off the ceiling so Dolby Atmos height effects come from above you rather than being simulated. Add a separate subwoofer and a dedicated centre channel and it is the most complete single-box-plus-sub system here. SpaceFit Sound Pro measures your room and adapts the output, and Q-Symphony makes a Samsung TV's own speakers play along with the bar rather than switching off.

Its 4.7-star average is the highest on this page.

Two caveats. That average rests on only 146 ratings, so it is an early signal rather than a settled verdict, and at GBP 219.99 it is among the dearest here. But if you want genuine Atmos height from a tidy two-box system, and especially if you own a Samsung TV, nothing else in this comparison offers it.",
                'pros' => ['Upward-firing drivers for real Dolby Atmos height', '4.7 stars, the highest average on this page', 'Separate subwoofer plus a dedicated centre channel', 'SpaceFit room calibration adapts to your space', 'Q-Symphony uses a Samsung TV speakers alongside the bar'],
                'contras' => ['Only 146 ratings, an early sample', 'GBP 219.99, among the dearest here', 'Q-Symphony needs a compatible Samsung TV', 'Subwoofer needs floor space and a socket'],
                'specs' => [
                    ['label' => 'Channels', 'value' => '3.1.2 with height', 'verdict' => 'good', 'note' => 'The only upward-firing Atmos here.'],
                    ['label' => 'Average score', 'value' => '4.7 stars', 'verdict' => 'good', 'note' => 'Highest on the page.'],
                    ['label' => 'Customer ratings', 'value' => '146', 'verdict' => 'bad', 'note' => 'Early sample.'],
                    ['label' => 'Subwoofer', 'value' => 'Included', 'verdict' => 'good'],
                    ['label' => 'Calibration', 'value' => 'SpaceFit Sound Pro', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£219.99', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 9,
                'name' => 'Sonos Ray Compact Soundbar for TV and Music, WiFi',
                'price' => '£179.00',
                'rating' => 4.4,
                'reviews_count' => 507,
                'image' => 'https://m.media-amazon.com/images/I/31qbmx82CrL._AC_SL1500_.jpg',
                'alt_text' => 'Sonos Ray compact soundbar',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09ZYCBWYF?tag=ranked10-21',
                'summary' => 'The pick if you want a multi-room system. The Ray is the entry point to Sonos, so it can grow into whole-home audio later.',
                'body' => "The Ray is Sonos's smallest, cheapest soundbar, and the reason to choose it is not the bar alone but what it connects to. It joins the Sonos system over WiFi, so you can add speakers in other rooms, group them, and control everything from one app — and later add a Sonos sub or rear speakers to turn it into a surround system. If you want an audio setup that grows, this is the entry ticket.

All the acoustics face forward, so it works pushed into a TV cabinet where a bar with side or upward drivers would be muffled, and the anti-distortion tuning keeps dialogue clear at volume. It has 507 ratings at 4.4 stars.

Two things to know. The Ray connects by optical only, with no HDMI, so it will not do the ARC volume-sync tricks the other bars manage, and it has no subwoofer at GBP 179. Buy it as the first piece of a Sonos system, not as the best-value bar on the page.",
                'pros' => ['Entry point to the Sonos multi-room system', 'Can add a Sonos sub and rears later for surround', 'Forward-facing acoustics suit a cabinet or shelf', 'Anti-distortion tuning keeps dialogue clear', 'Excellent app and music streaming'],
                'contras' => ['Optical only, no HDMI ARC', 'No subwoofer at GBP 179', '507 ratings, a modest sample', 'Expansion pieces are expensive'],
                'specs' => [
                    ['label' => 'Ecosystem', 'value' => 'Sonos multi-room', 'verdict' => 'good', 'note' => 'Grows into whole-home audio.'],
                    ['label' => 'Connection', 'value' => 'Optical only, no HDMI', 'verdict' => 'bad'],
                    ['label' => 'Customer ratings', 'value' => '507 at 4.4 stars', 'verdict' => 'neutral'],
                    ['label' => 'Channels', 'value' => 'Stereo, no sub', 'verdict' => 'bad'],
                    ['label' => 'Placement', 'value' => 'Front-facing drivers', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£179.00', 'verdict' => 'bad'],
                ],
                'review_quotes' => [],
            ],
            [
                'position' => 10,
                'name' => 'Denon DHT-S218 Dolby Atmos Soundbar with Dual Built-in Subwoofers, eARC',
                'price' => '£249.00',
                'rating' => 4.2,
                'reviews_count' => 208,
                'image' => 'https://m.media-amazon.com/images/I/61hL6ij8f0L._AC_SL1500_.jpg',
                'alt_text' => 'Denon DHT-S218 Dolby Atmos soundbar',
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CYQHYF9Q?tag=ranked10-21',
                'summary' => 'Atmos without a separate subwoofer. Two down-firing subs are built into the bar, with 4K HDMI eARC — for people who want big sound and one box only.',
                'body' => "The Denon solves a specific problem: you want Dolby Atmos and proper bass, but you have nowhere to put a subwoofer. It builds two down-firing subwoofers into the bar itself, alongside dual mid-range drivers and tweeters, so a single unit delivers far more low end than the usual all-in-one. A 4K HDMI eARC socket passes video through to the TV and carries full-quality Atmos, and Bluetooth LE Audio handles music.

Denon is a serious audio name, and this is the most capable one-box bar in the comparison.

It is last on two counts. At GBP 249 it is the most expensive product here, and its 4.2 stars over 208 ratings is a middling score on a small sample — the Samsung above costs less and rates higher, if you can house its subwoofer. Choose the Denon specifically when a separate sub is impossible and you still want Atmos.",
                'pros' => ['Two subwoofers built into the bar, no separate box', 'Dolby Atmos over 4K HDMI eARC', 'Serious audio brand with proper driver array', 'Bluetooth LE Audio for music streaming', 'The most capable all-in-one here'],
                'contras' => ['GBP 249, the most expensive product on the page', '4.2 stars on only 208 ratings', 'The Samsung rates higher for less money', 'Built-in subs still cannot match a separate one'],
                'specs' => [
                    ['label' => 'Subwoofers', 'value' => 'Two, built in', 'verdict' => 'good', 'note' => 'Atmos and bass from one box.'],
                    ['label' => 'Dolby Atmos', 'value' => 'Yes, 4K eARC', 'verdict' => 'good'],
                    ['label' => 'Price', 'value' => '£249.00', 'verdict' => 'bad', 'note' => 'The dearest here.'],
                    ['label' => 'Customer ratings', 'value' => '208 at 4.2 stars', 'verdict' => 'bad'],
                    ['label' => 'Brand', 'value' => 'Denon', 'verdict' => 'good'],
                    ['label' => 'Video', 'value' => '4K passthrough', 'verdict' => 'good'],
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
        $this->command?->info("SoundbarsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos).");
    }
}
