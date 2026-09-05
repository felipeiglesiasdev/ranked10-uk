<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
//
// COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// BUSCA: /s?k=bluetooth+speaker+portable+waterproof&rh=p_36%3A3000-
// CATEGORIA TECH. SAZONAL: DUPLA PONTA — VERAO/AR LIVRE E PRESENTE DE NATAL (SOBE A PARTIR DE OUTUBRO).
//
// ─── ACHADO QUE MUDA A COMPRA: O CAMPO "WATTS" NAO E UMA MEDIDA ───
//   PRECO QUASE CONSTANTE, NUMERO EXPLODINDO:
//     W-KING .... £37.99 ... spec "Speaker maximum output power: 60 Watts"
//     OHAYO ..... £38.99 ... spec "35 Watts"
//     JBL Go 5 .. £39.98 ... spec "4.8 Watts"
//   SPREAD DE PRECO: 39.98 - 37.99 = £1.99. SPREAD DE WATTS: 60 / 4.8 = 12,5x. MESMO DINHEIRO.
//   PROVA NA PROPRIA PAGINA (aritmetica dos dois campos do mesmo anuncio):
//     JBL Flip 7 ... 70 W / 3.63 V = 19,28 A
//     JBL Charge 6 . 180 W / 7.2 V = 25,0 A
//   W-KING ENTREGA O JOGO NO PROPRIO BULLET: "60W PEAK punchy bass and 30W crystal clear sound".
//   BOSE £109 PUBLICA 7.5 W — 24x MENOR QUE OS 180 DO CHARGE 6 (180 / 7.5 = 24 exato) — E SEGURA
//   4.7 COM 11.727 AVALIACOES. LOGO: O NUMERO E MARKETING. VAI NA INTRO.
//   ⚠ PROIBIDO INVERTER O ACHADO: NAO DIZER QUE O BOSE TOCA MAIS BAIXO NEM QUE O CHARGE 6 E MAIS ALTO.
//   O ACHADO E QUE O CAMPO NAO SUSTENTA COMPARACAO DE VOLUME EM DIRECAO NENHUMA.
//
// ─── SO 2 DE 10 FECHAM A CONTA COM OS PROPRIOS BULLETS ───
//   ANKER: bullet "12W of audio power" = spec "12 Watts". ✓
//   OHAYO: bullets "25W bass driver and 10W silk dome" = 25 + 10 = 35 = spec "35 Watts". ✓
//   (OHAYO NAO VAI PARA A PILHA DE LIXO: E A UNICA QUE MOSTRA A CONTA. AINDA E RATING DE DRIVER.)
//   OS OUTROS SETE (Flip 7, Bose, Charge 6, Sonos, Go 5, Marshall, Dewalt) NAO CITAM WATT EM BULLET NENHUM.
//   MARSHALL £219 E W-KING £37.99 PUBLICAM O MESMO 60 W. 219.00 / 37.99 = 5,77x DE PRECO PELO MESMO NUMERO.
//   ANKER £28.49 PUBLICA 12 W CONTRA OS 10 W DO SONOS £139. 139.00 / 28.49 = 4,88x PELO NUMERO MENOR.
//
// ─── EIXO 2: IP CODE — SO 5 DE 10 PUBLICAM, E OS TRES JBL NAO ESTAO ENTRE ELES ───
//   IP67 (poeira + imersao): SONOS, BOSE.
//   IPX7 (imersao, poeira NAO avaliada): ANKER, OHAYO.
//   IPX6 (jato/chuva, NAO imersao): W-KING → o mais fraco dos cinco codigos.
//   SEM CODIGO NENHUM: JBL Flip 7 (titulo diz "Waterproof"), JBL Charge 6 (titulo diz "Waterproof"),
//   JBL Go 5 (bullet "all the proofs: dust, water and drop"), MARSHALL ("poolside splashes"), DEWALT (nada).
//   ⚠ ANKER: bullet promete "IPX7 protection against rain, dust, snow" — o X do IPX7 e justamente poeira.
//
// ─── EIXO 3: HORAS DE BATERIA CORREM AO CONTRARIO DO PRECO ───
//   ANKER £28.49 = 24H (5.200mAh) / W-KING £37.99 = 24H / OHAYO £38.99 = 24H (6.600mAh)
//   CONTRA BOSE £109.00 = NENHUM NUMERO PUBLICADO / SONOS £139.00 = ate 10H.
//   ANKER = 2,4x as horas do Sonos por 20,5% do preco (28.49 / 139.00).
//   JBL Go 5 "ate 10H" E 8H + 2H DE PLAYTIME BOOST NO PROPRIO BULLET — "ate" empilhado em "ate".
//   ARITMETICA (limite superior generoso, tensao de celula e menor que a de carga):
//     ANKER 5.200mAh a 5 V = 26 Wh; 26 / 24h = 1,08 W medio (≈ 1/11 dos 12 W publicados).
//     OHAYO 6.600mAh a 5 V = 33 Wh; 33 / 24h = 1,38 W medio (≈ 1/25 dos 35 W publicados).
//
// ─── EIXO 4: CASCA x SISTEMA ───
//   SONOS: unico com Wi-Fi ("Connectivity technology: Bluetooth, Wi-Fi") + Automatic Trueplay. E o motivo
//   real dos £139 num aparelho de 10 W e 10 horas. MAS o campo "Material: Plastic or Metal" nao se decide.
//   JBL FLIP 7 £99 PUBLICA AURACAST NO CAMPO E NO TITULO; O CHARGE 6 £159 NAO PUBLICA (so "Bluetooth, USB").
//   W-KING E O UNICO COM AUX, CARTAO TF E NFC — 6 entradas no campo de conectividade, o mais completo da pagina.
//   ANKER: campo "Connectivity technology: Type C" — uma porta de carga, e Bluetooth nao aparece no campo.
//
// ─── EIXO 5: CAMPOS QUE NAO MEDEM NADA ───
//   FREQUENCY RESPONSE GUARDA PONTAS OPOSTAS: teto em Flip 7 "20 KHz", Charge 6 "20 KHz", Sonos "20 KHz",
//   Go 5 "19 KHz" (mesma marca, dois tetos); piso em Bose "40 Hz", Marshall "45 Hz", Anker "70 Hz",
//   OHAYO "80 Hz", W-KING "100 Hz". ORDENAR O CAMPO DA 20.000 / 40 = 500x DE DIFERENCA VAZIA.
//   DEWALT PUBLICA "4000 Microhertz" = 0,004 Hz = UM CICLO A CADA 250 SEGUNDOS (4 min 10 s).
//   "INPUT VOLTAGE" CARREGA TRES COISAS DIFERENTES: carga USB (Anker/Bose/OHAYO 5 V), celula interna
//   (Flip 7 3.63 V = 1 celula, Charge 6 7.2 V = 2 em serie) e plataforma de ferramenta (Dewalt 54 V).
//
// ─── DEWALT: O PIOR ANUNCIO DA PAGINA, £87.90 ───
//   BARE UNIT (sem bateria, sem carregador). "Included components: 1 x DeWalt Portable Radio" — radio, nao speaker.
//   3 DOS 4 BULLETS SAO DIMENSAO DE EMBALAGEM EM UNIDADES MISTAS: 26.8 cm, 15.6 cm e 405.0 mm (= 40.5 cm),
//   com grafia americana "centimeters" numa loja britanica. SEM IP, SEM HORAS, SEM PLAYTIME.
//   O MESMO 54 APARECE EM "54 Watts" E EM "54 Volts", E 54 V E O TOPO DA PLATAFORMA NO PROPRIO TITULO.
//   ⚠ PUBLICAR A COINCIDENCIA, NAO A EXPLICACAO (o "vazamento de campo" e inferencia, nao e checavel).
//
// ─── MARSHALL: MAIS CARO, PIOR NOTA, FICHA MAIS MAGRA ───
//   £219.00, 4.2 estrelas, 239 avaliacoes — menor nota E menor amostra do conjunto. 219.00 / 28.49 = 7,69x
//   o preco do Anker por meia estrela a menos. FICHA COM 4 CAMPOS: Brand, 60 Watts, 45 Hz e
//   "Mounting type: Tabletop" (campo de montagem num portatil). SEM conectividade, SEM IP, SEM bateria.
//   O "30+ hours" APARECE SO NO TITULO — nenhum bullet e nenhum campo repete o numero.
//   (SEM PISO DE AVALIACOES — ver memoria feedback-ranked10-no-review-floor. 239 entra reportado como amostra inicial.)
//
// PROFUNDIDADE (FICHA): 145.757 / 11.727 / 9.810 / 3.579 / 3.563 / 1.088 / 982 / 506 / 496 / 239.
// TOTAL 177.747. ANKER = 145.757 / 177.747 = 82,0% DE TODAS AS AVALIACOES DA PAGINA;
// OS OUTROS NOVE SOMAM 31.990, LOGO 145.757 / 31.990 = 4,56x.
// ⚠ NAO PUBLICAR "maior pool do site": RENPHO Elis 1 (SmartScalesSeeder) tem 330.489. O ANKER E 44% DISSO.
// ⚠ NAO INSINUAR POOL COMPARTILHADO ENTRE CHARGE 6 (3.579) E FLIP 7 (3.563): contagens diferem em 16,
//   pool compartilhado mostraria total identico. ASINs consecutivos lancados juntos, coincidencia de calendario.
// ⚠ NOTA DE COR APENAS: Flip 7 e Charge 6 repetem bullet identico ("drop from up to 1 meter"), grafia US;
//   e o campo de marca do Charge 6 le "JBL Harman" contra "JBL" nos outros dois (filtro de marca da Amazon).
//
// FOCUS KEYWORD: best bluetooth speaker
// VARIACOES: bluetooth speaker / portable bluetooth speaker / waterproof bluetooth speaker /
// best portable speaker / bluetooth speaker with long battery life / small bluetooth speaker /
// loud bluetooth speaker / outdoor bluetooth speaker / bluetooth speaker for the garden
// ═══════════════════════════════════════════════════════════════

return [
    'category' => 'tech',
    'slug' => 'best-bluetooth-speaker',
    'title' => 'Best Bluetooth Speaker 2026: 10 Portable Speakers Ranked',
    'meta_title' => 'Best Bluetooth Speaker 2026: 10 Portable Picks Ranked',
    'meta_description' => 'The best bluetooth speaker picks from GBP 28 to GBP 219. Ten portable waterproof speakers ranked on battery hours, IP rating and what the money buys.',
    'focus_keyword' => 'best bluetooth speaker',
    'published_at' => '2026-09-03 12:00:00',

    'intro' => "If you want the short answer, the soundcore Anker 2 is the best bluetooth speaker for most people: GBP 28.49, 145,757 ratings at 4.7 stars, a full IPX7 immersion rating and 24 hours of claimed playtime from a published 5,200mAh cell. It is also the cheapest speaker in this ranking. If you want the classic cylinder with a strap instead, the JBL Flip 7 at GBP 99.00 is the step up most buyers are really shopping for, and for a whole weekend away the Charge 6 claims 24 hours and charges your phone as well.

Then ignore the watts. Three portable speakers on this page sit within GBP 1.99 of each other, the W-KING at GBP 37.99, the OHAYO at GBP 38.99 and the JBL Go 5 at GBP 39.98, and their Amazon spec tables publish 60 Watts, 35 Watts and 4.8 Watts. Same money, a twelve-and-a-half-fold spread. The listings give the game away themselves: the JBL Flip 7 prints 70 Watts beside an input voltage of 3.63 Volts, which would need 19 amps, while the Charge 6 pairs 180 Watts with 7.2 Volts, which comes to 25. W-KING concedes it in its own bullet, \"60W PEAK punchy bass and 30W crystal clear sound\". And the GBP 109.00 Bose SoundLink Flex publishes 7.5 Watts, a figure twenty-four times smaller than the Charge 6, while holding 4.7 stars across 11,727 ratings. That number is marketing, not sound, in either direction. So buy a bluetooth speaker on the battery hours, on the IP code, and on whether you are getting a shell or a system.",

    'conclusion' => "For most people the best bluetooth speaker here is the soundcore Anker 2. It is the cheapest of the ten, it holds 145,757 of the 177,747 ratings in this ranking, eighty-two per cent of them, and it is the most internally consistent listing of the group: the 12W, the IPX7 and the 24 hours in its title all reappear in the bullets, with a published 5,200mAh battery behind the hours. For a bigger portable bluetooth speaker with a strap, the JBL Flip 7 at GBP 99.00 is the natural step up. For a beach day that turns into a campsite, the Charge 6 claims 24 hours and keeps a phone alive too.

Two buyers should turn this list upside down. If you already own DeWalt 10.8V to 54V batteries, the DCR011 goes straight to the top of your own shortlist, because it is the only speaker here that shares a charger with your drill. If your house already runs Sonos, the Roam 2 does the same, since the Wi-Fi half of it finally gets used. Under GBP 40 as a Christmas present, the JBL Go 5 is the nicer object in the hand than the W-KING or the OHAYO, even though the maker publishes the smallest output figure of the ten for it. And for a garden or poolside party, choose a waterproof bluetooth speaker on its published IP rating and its stated hours, then ignore the wattage completely: across these ten listings the same maximum-output field runs from 4.8 Watts to 180 Watts, so it measures nothing you can compare.",

    'products' => [
        [
            'soundcore Anker 2 Portable Bluetooth Speaker, 12W Stereo, IPX7, 24H',
            '£28.49', 4.7, 145757,
            'B01MTB55WH',
            '71jjggEx2XL',
            'best bluetooth speaker',
            'The best bluetooth speaker for most buyers. 145,757 ratings at 4.7 stars, full IPX7 immersion protection and 24 claimed hours from a 5,200mAh cell, for GBP 28.49.',
            "This is the speaker most people on this page have already bought. Its 145,757 ratings are 82 per cent of every rating in this ranking, and 4.56 times the other nine speakers put together, which sit at 31,990 between them. At 4.7 stars that is not an early signal, it is a settled one, and it comes attached to the cheapest product here at GBP 28.49.

What earns it the top spot, though, is not the wattage. It is that the listing agrees with itself. The title promises 12W, IPX7 and 24 hours, and every one of those three turns up again in the bullets, with the hours backed by a published 5,200mAh Li-ion battery. Almost nothing else in this group manages that. The IPX7 rating means the published code covers immersion rather than a light shower, and USB-C charging means one fewer cable in the bag.

The limits are honest ones. The frequency response field holds a bare 70 Hz with no upper figure, so nobody is promising you deep bass. There is no Wi-Fi, no Auracast and no powerbank to top up a phone. The connectivity field lists only Type C, which is a charging port rather than a wireless standard, and never actually names Bluetooth. And the dust wording is a stretch: the bullet claims protection against rain, dust, snow and spills, while the code the same listing publishes leaves the dust digit as an unrated X. Worth noting the arithmetic too, since 5,200mAh at the listing own 5 Volts is at most 26 Wh, which over 24 hours averages about 1.08 Watts, roughly a eleventh of the published 12.",
            ['145,757 ratings at 4.7 stars, 82 per cent of every rating here', 'GBP 28.49, the cheapest speaker in this ranking', 'IPX7, so the published code covers immersion and not just rain', '24 hours claimed, backed by a stated 5,200mAh battery', 'Title, bullets and spec table actually agree with one another'],
            ['The connectivity field names only Type C and never mentions Bluetooth', 'Frequency response published as a bare 70 Hz, with no upper figure', 'The bullet claims dust protection under a code whose dust digit is unrated', 'No Wi-Fi, no Auracast and no powerbank for your phone'],
            [
                'Customer ratings|145,757 at 4.7 stars|good|82 per cent of every rating here',
                'Price|£28.49|good|The cheapest of the ten',
                'Water rating|IPX7|good|Covers immersion, dust unrated',
                'Claimed playtime|24H from 5,200mAh|good|The hours have a battery figure behind them',
                'Maximum output field|12 Watts|neutral|Matches its own bullet, but not comparable between brands',
            ],
        ],
        [
            'JBL Flip 7 Portable Bluetooth Speaker, Waterproof, Auracast',
            '£99.00', 4.6, 3563,
            'B0DXKMXPXW',
            '61u8pR-exTL',
            'JBL Flip 7 portable bluetooth speaker with strap',
            'The step up most buyers are really after: the classic cylinder with a strap, up to 14 claimed hours and Auracast, at GBP 99.00.',
            "When GBP 28 does not feel like enough, this is the shape people picture. A cylinder you can clip to a rucksack, throw in a bag and stand on a table, with 3,563 ratings at 4.6 stars behind it. The listing claims up to 14 hours of playtime, says it survives a drop from a metre and a spell in the shower, and uses a PushLock system so a strap or carabiner clips on without a fiddle.

The interesting detail is Auracast, which appears both in the title and in the connectivity field, letting it pair with other Auracast speakers. Curiously, the dearer JBL Charge 6 at GBP 159.00 does not publish Auracast anywhere, listing only Bluetooth and USB. That is a difference in what the two pages state, not a claim about what either speaker can do, but if the feature matters to you, the cheaper JBL is the one that puts it in writing.

Two things to weigh. It costs three and a half times the Anker for ten fewer claimed hours, and despite Waterproof sitting in the title, no IP code appears anywhere on the listing, so there is no rating to hold anyone to. Its 70 Watts of maximum output sits in the spec table beside an input voltage of 3.63 Volts, which works out at 19 amps, and the frequency response is published as a single 20 KHz rather than a range. Buy it for the shape, the strap and the hours.",
            ['Up to 14 hours of playtime claimed, the second-longest figure here', 'Auracast published in both the title and the connectivity field', 'PushLock strap system, so it clips to a bag or a belt loop', 'The listing states a drop of up to one metre and use in the shower', '3,563 ratings at 4.6 stars'],
            ['No IP code published anywhere, though the title says Waterproof', 'Three and a half times the Anker price for ten fewer claimed hours', 'Publishes 70 Watts beside an input voltage of 3.63 Volts, which is 19 amps', 'Frequency response given as a single 20 KHz, not a range'],
            [
                'Claimed playtime|Up to 14 hours|good',
                'Connectivity|Auracast and Bluetooth|good|The dearer Charge 6 does not publish Auracast',
                'Customer ratings|3,563 at 4.6 stars|good',
                'Water rating|No IP code published|bad|The title still says Waterproof',
                'Price|£99.00|neutral',
            ],
        ],
        [
            'JBL Charge 6 Portable Bluetooth Speaker, 24H, Built-in Powerbank',
            '£159.00', 4.8, 3579,
            'B0DXKNBQS6',
            '71OAC2L15TL',
            'JBL Charge 6 portable bluetooth speaker with built-in powerbank',
            'The long-day speaker: up to 24 claimed hours, a built-in powerbank for your phone, and the joint-highest average here at 4.8 stars.',
            "If one speaker has to cover a beach afternoon, a campsite in the evening and the kitchen the next morning, this is the one that will not give up first. The listing claims up to 24 hours of playtime, and the built-in powerbank means it charges your phone as well, which on a long day outdoors is often the more useful of the two. A removable handle strap makes a fairly hefty object easier to carry. It also holds 4.8 stars across 3,579 ratings, the joint-highest average in this ranking.

That combination is genuinely rare here. Only this and the GBP 219.00 Marshall charge a phone at all, and the Marshall costs GBP 60 more with a much lower score. If you want an outdoor bluetooth speaker that outlasts the day rather than the playlist, this is the sensible pick.

It is third rather than first for two reasons. GBP 159.00 is a lot, and it is the bulkiest thing in this group to carry about. And its spec table is the clearest example of the wattage problem on the whole page: 180 Watts of maximum output, twenty-four times the 7.5 Watts Bose publishes for the SoundLink Flex, and 180 Watts against its own stated 7.2 Volts would draw 25 amps. Nothing on either listing explains how either figure was measured. Note as well that no IP code is published despite Waterproof in the title, and that the brand field reads JBL Harman rather than JBL, so an Amazon brand filter set to JBL may skip straight past it.",
            ['Up to 24 hours of playtime claimed', 'Built-in powerbank charges your phone from the speaker', '4.8 stars across 3,579 ratings, the joint-highest average here', 'Removable handle strap for carrying a large speaker', 'The one here built to cover a whole weekend'],
            ['GBP 159.00, and the bulkiest thing in this ranking to carry', 'Publishes 180 Watts, twenty-four times the figure Bose prints for the Flex', 'No IP code published, despite Waterproof in the title', 'The brand field reads JBL Harman, so a JBL filter may not show it'],
            [
                'Claimed playtime|Up to 24 hours|good',
                'Powerbank|Charges your phone|good|Only this and the Marshall do it here',
                'Customer ratings|3,579 at 4.8 stars|good|Joint-highest average here',
                'Maximum output field|180 Watts|bad|At its own 7.2 Volts that would be 25 amps',
                'Price|£159.00|bad',
            ],
        ],
        [
            'Bose SoundLink Flex Portable Bluetooth Speaker 2nd Gen, IP67, Bluetooth 5.3',
            '£109.00', 4.7, 11727,
            'B0D6WD2QSQ',
            '7192Qca-fUL',
            'Bose SoundLink Flex portable bluetooth speaker IP67',
            'The small one people rate most highly after the Anker: IP67 against dust and immersion, Bluetooth 5.3, and 11,727 ratings at 4.7 stars.',
            "This is the reputation buy, and the numbers that exist support it. Its 11,727 ratings at 4.7 stars make it the second-largest sample in this ranking after the Anker, and its IP67 rating is one of only two here that covers dust as well as immersion, the other being the Sonos. In an IPX code that first digit is an unrated X, so the two IP67 speakers are the only ones whose published code says anything about dust at all. Bluetooth 5.3 is among the newest versions stated on this page, and the body is far easier to carry than the Charge 6 for similar money.

Buy it if sound per square inch matters to you more than hours or headline figures. It is a small waterproof bluetooth speaker with a strong record and a rating that means something outdoors.

The frustration is the listing. It sells adjectives where the cheap speakers sell numbers, with bullets that read big bold sound, surprisingly powerful performance and battery life to match. Across five bullets there are exactly two numbers, IP67 and 5.3, and no playtime figure appears anywhere, in the bullets or the spec table. Meanwhile the GBP 28.49 Anker publishes 12W, IPX7, 24H and 5,200mAh in its own bullets. Its 7.5 Watts in the maximum-output field is the second-smallest of the ten, which given everything else on this page says far more about the field than about the speaker, but you are still buying on trust rather than on stated hours.",
            ['IP67, one of only two codes here that covers dust as well as immersion', '11,727 ratings at 4.7 stars, the second-largest sample in this ranking', 'Bluetooth 5.3, among the newest versions published here', 'Far easier to carry than the Charge 6 for similar money', 'A strong record for a small speaker used outdoors'],
            ['No playtime figure published anywhere, bullets or spec table', 'Five bullets contain only two numbers, IP67 and 5.3', 'GBP 109.00, and much of the case rests on the brand', 'The GBP 28.49 Anker publishes more hard figures than this listing does'],
            [
                'Water and dust rating|IP67|good|The dust digit is rated, unlike an IPX code',
                'Customer ratings|11,727 at 4.7 stars|good|Second-largest sample here',
                'Claimed playtime|Not published|bad|The battery bullet gives no number',
                'Bluetooth version|5.3|good',
                'Price|£109.00|neutral',
            ],
        ],
        [
            'W-KING Bluetooth Speaker, 60W MAX, IPX6, 24H, Bluetooth 5.0, NFC',
            '£37.99', 4.6, 9810,
            'B081RQP7B9',
            '71JiWw8Bb3L',
            'W-KING 60W portable bluetooth speaker with NFC and aux input',
            'Most ways in for the money: aux, TF card, NFC, USB and true wireless stereo pairing, plus 24 claimed hours, for GBP 37.99.',
            "No other listing here comes close on connectivity. The W-KING field reads auxiliary, TF card, Bluetooth 5.0, NFC, true wireless stereo pairing and USB, which is six entries, and it is the only speaker in this ranking that will take a cable or a memory card at all. For a garage, a workshop or anywhere an old phone or a laptop headphone socket is the actual source, that matters far more than any wattage figure. Add 24 hours of claimed playtime, two EQ modes and a built-in microphone, on 9,810 ratings at 4.6 stars, the third-largest sample here.

Its 60 Watts is also the most honest number on the page, because the maker admits what it is. The bullet reads 60W PEAK punchy bass and 30W crystal clear sound, while the spec table publishes only the 60. Peak, in other words, not continuous. Worth holding that beside the Marshall Middleton II, which costs GBP 219.00 and publishes exactly the same 60 Watts, 5.77 times the price for an identical number.

Two real caveats keep it at five. Its water rating is IPX6, not IPX7, which covers jets and heavy rain but not immersion, making it the weakest of the five published codes here and a step below the cheaper Anker. And Bluetooth 5.0 is the oldest version stated on this page, against 5.3 on the Bose and the OHAYO. The frequency response field, meanwhile, holds a bare 100 Hz with nothing above it.",
            ['Six connectivity entries: aux, TF card, Bluetooth 5.0, NFC, stereo pairing and USB', 'The only speaker here that takes a cable or a memory card', '24 hours of claimed playtime for GBP 37.99', '9,810 ratings at 4.6 stars, the third-largest sample here', 'Two EQ modes and a built-in microphone'],
            ['IPX6 covers jets and rain but not immersion, weaker than the cheaper Anker', 'Its own bullet concedes 60W PEAK alongside 30W, while the spec table shows only 60', 'Bluetooth 5.0, the oldest version published in this ranking', 'Frequency response given as a bare 100 Hz'],
            [
                'Connectivity|Aux, TF card, NFC, USB, Bluetooth 5.0, stereo pairing|good|The fullest field on the page',
                'Water rating|IPX6|neutral|Jets and rain, not immersion',
                'Customer ratings|9,810 at 4.6 stars|good',
                'Claimed playtime|24H|good',
                'Maximum output field|60 Watts|bad|The same figure the £219.00 Marshall publishes',
            ],
        ],
        [
            'JBL Go 5 Ultra-Portable Bluetooth Speaker, Waterproof, Edge Lighting',
            '£39.98', 4.8, 1088,
            'B0GPPRPRM5',
            '61XastPVD0L',
            'JBL Go 5 ultra-portable small bluetooth speaker',
            'The pocket speaker and the obvious Christmas present under GBP 40: 4.8 stars, ambient edge lighting and AirTouch pairing.',
            "This is the small bluetooth speaker you drop in a coat pocket, clip to a rucksack strap or leave on a shower shelf, and at GBP 39.98 with 4.8 stars from 1,088 ratings it is the easiest present in this ranking. The ambient edge lighting gives it something to show off in a shop window, and AirTouch pairing means bumping two of them together links them, which is a nice trick with a friend who owns one. From October onwards it is the obvious sub-GBP-40 gift here.

Read the battery bullet closely, though. The headline is up to 10 hours, and the same bullet spells out that this is up to 8 hours plus an extra 2 from Playtime Boost. That is an up to stacked on an up to, and it means the plain figure is 8, not the 10 that would have matched the Sonos Roam 2. The spec table has a similar wrinkle: it lists the audio output mode as Stereo, while the bullet explains that stereo happens when you bump two units together. One Go 5, by the listing own description, is not the stereo the field advertises.

Its 4.8 Watts is the smallest maximum-output figure of the ten, but on a page where that same field runs to 180 Watts on a listing that would need 25 amps to deliver it, that tells you nothing you can act on. Judge this one on its size instead: it is a personal speaker for a kitchen, a bathroom or a desk, not a party speaker for a garden. And the bullet promising dust, water and drop protection is not backed by any IP code on the page.",
            ['4.8 stars over 1,088 ratings, the joint-highest average here', 'GBP 39.98, small enough for a coat pocket or a shower shelf', 'Ambient edge lighting makes it an obvious gift under forty pounds', 'AirTouch pairing links two units by bumping them together', 'Genuinely pocketable in a way nothing else here is'],
            ['The up-to-10-hours is 8 hours plus 2 from Playtime Boost, by its own bullet', 'The spec table says Stereo, while the bullet says stereo needs two units', 'No IP code published, so the proofs are words rather than a rating', '1,088 ratings is still a young sample'],
            [
                'Customer ratings|1,088 at 4.8 stars|good|A young sample at the top average',
                'Claimed playtime|Up to 8 hours, 10 with Boost|neutral|Its own bullet splits the figure',
                'Water rating|No IP code published|bad|The bullet claims dust, water and drop',
                'Audio output field|Stereo|bad|The bullet says stereo means buying two',
                'Price|£39.98|good',
            ],
        ],
        [
            'Sonos Roam 2 Portable Waterproof Bluetooth Speaker, IP67, WiFi and Bluetooth',
            '£139.00', 4.6, 982,
            'B0D37BY6ZR',
            '61VnNvzHRxL',
            'Sonos Roam 2 portable waterproof bluetooth speaker with WiFi',
            'The specialist for a Sonos household: the only speaker here that publishes Wi-Fi as well as Bluetooth, on an IP67 rating.',
            "Everything else in this ranking is a shell. This is a system. The Sonos connectivity field is the only one on the page to name Wi-Fi alongside Bluetooth, which is what lets the Roam 2 sit inside an existing Sonos setup indoors and then travel outdoors on an IP67 rating that covers dust as well as immersion. Automatic Trueplay retunes it for each new environment, so it does not need setting up again every time it moves rooms. It holds 4.6 stars across 982 ratings.

If your house already runs Sonos, this is not really competing with the others here and the price stops looking odd. Buy it and the Wi-Fi half of what you paid for actually gets used.

Away from that, the case is hard. GBP 139.00 buys up to 10 hours, the shortest published playtime of the ten, against 24 hours claimed by three speakers costing under GBP 39. It publishes 10 Watts, a smaller figure than the 12 on the GBP 28.49 Anker, which is one more reminder of how little that field carries. And the material field reads Plastic or Metal, which on a GBP 139.00 spec table is a strange thing not to commit to. Against the Bose SoundLink Flex at GBP 109.00 with far more ratings, this only makes sense as part of a system.",
            ['The only speaker here that publishes Wi-Fi as well as Bluetooth', 'IP67, covering dust as well as immersion', 'Automatic Trueplay retunes the sound for each new environment', 'Compact and light for what it does', '4.6 stars across 982 ratings'],
            ['Up to 10 hours, the shortest published playtime in this ranking', 'GBP 139.00, and much of it goes unused outside a Sonos household', 'The material field reads Plastic or Metal, committing to neither', 'Publishes 10 Watts against the 12 on the GBP 28.49 Anker'],
            [
                'Connectivity|Bluetooth and Wi-Fi|good|The only Wi-Fi speaker here',
                'Water and dust rating|IP67|good',
                'Claimed playtime|Up to 10 hours|bad|The shortest published here',
                'Material field|Plastic or Metal|neutral|The listing does not say which',
                'Price|£139.00|bad',
            ],
        ],
        [
            'OHAYO Bluetooth Speaker with LED Light, 35W, IPX7, 6600mAh, Bluetooth 5.3',
            '£38.99', 4.6, 506,
            'B0DY1HGHD2',
            '71MzhKSIxGL',
            'OHAYO bluetooth speaker with LED light and IPX7 rating',
            'The lights-and-bass one for a bedroom or a party: IPX7, Bluetooth 5.3 and 24 claimed hours from 6,600mAh, at GBP 38.99.',
            "On paper this is the cheapest route to a 24-hour, IPX7, Bluetooth 5.3 speaker with six RGB light effects, and the 6,600mAh battery behind those hours is the largest capacity published in this ranking. For a teenager bedroom or a party in the garden, the pulsating flashes are the point rather than a gimmick, and 4.6 stars across 506 ratings is a respectable start.

It also does something no other listing here manages except the Anker: it shows its working. The bullets describe a 25W bass driver and a 10W silk dome, and 25 plus 10 is the 35 Watts the spec table publishes. That is still a driver rating rather than a measurement you could compare with another brand, but it is a number with a stated source, which is more than seven of these ten listings offer. Run the same arithmetic on the battery, though, and 6,600mAh at the listing own 5 Volts is at most 33 Wh, which over 24 hours averages about 1.38 Watts.

It sits at eight because of the sample and the sources. Its 506 ratings look thin beside the W-KING 9,810 at a pound less, and the W-KING also offers aux in, a card slot and NFC, none of which appear on the OHAYO listing. Every figure here comes from the maker, with nothing else on the page to test it against, and the brand is unfamiliar next to JBL, Bose and Sonos. On what it is, though, it is a lot of speaker for GBP 38.99.",
            ['IPX7 immersion rating for GBP 38.99', '24 hours claimed from a published 6,600mAh battery, the largest capacity here', 'Bluetooth 5.3, the newest version published in this ranking', 'Six RGB light effects and pulsating flashes for a party or a bedroom', 'The 35 Watts adds up from its own bullets, at 25W plus 10W'],
            ['506 ratings, against 9,810 for the W-KING at a pound less', 'No aux input or card slot published, unlike the W-KING', 'Every figure comes from the maker, with nothing on the page to check it against', 'An unfamiliar brand next to JBL, Bose and Sonos'],
            [
                'Water rating|IPX7|good|Immersion covered, dust unrated',
                'Claimed playtime|24 hours from 6,600mAh|good|The largest capacity published here',
                'Maximum output field|35 Watts|neutral|25W driver plus 10W dome, the arithmetic shown',
                'Customer ratings|506 at 4.6 stars|bad|An early sample',
                'Price|£38.99|good',
            ],
        ],
        [
            'Marshall Middleton II Bluetooth Portable Speaker, 30+ Hours, 360 True Stereophonic',
            '£219.00', 4.2, 239,
            'B0FBHTGL16',
            '71Jtv4PpxlL',
            'Marshall Middleton II portable bluetooth speaker',
            'The design object: over 30 claimed hours, 360-degree sound and a control knob, for GBP 219.00 and the lowest average here.',
            "Some people buy a speaker for the shelf as much as for the music, and this is that speaker. The title claims over 30 hours, which is the longest figure anyone publishes here, the sound is 360-degree True Stereophonic rather than a single forward face, it charges your phone like the Charge 6, and the multidirectional control knob for play, pause and skip is a genuinely nice thing to use. As a tabletop bluetooth speaker for a kitchen or a living room, it looks like nothing else in this ranking.

The trouble is everything you can check. At GBP 219.00 it is the most expensive speaker here, and at 4.2 stars it has the lowest average, on 239 ratings, the smallest sample in the group. That is 7.69 times the Anker price for half a star less. To be fair to it, 239 ratings on a second-generation model is an early sample rather than a verdict, and we do not exclude anything on review count. But the early buyers here are also the least happy ones, which is worth knowing before spending this much.

Its spec table is the thinnest on the page: four fields, being brand, 60 Watts, 45 Hz and mounting type tabletop, which is a curious field to publish on a portable speaker. There is no connectivity entry, no IP code and no battery figure at all. The 30 hours appears in the title and is repeated in no bullet and no spec field, while the bullets say only that it gives over a day of performance. Meanwhile the 60 Watts is the identical figure the GBP 37.99 W-KING publishes. The JBL Charge 6 charges phones too, claims 24 hours and costs GBP 60 less.",
            ['Over 30 hours claimed in the title, the longest figure published here', '360-degree True Stereophonic sound rather than one forward face', 'Charges your phone, which only this and the Charge 6 do here', 'A multidirectional control knob for play, pause and skip', 'The look, which for some buyers is the whole reason to buy'],
            ['4.2 stars, the lowest average here, on 239 ratings, the smallest sample', 'GBP 219.00, some 7.69 times the price of the Anker', 'A four-field spec table with no connectivity, IP or battery entry', 'The 30 hours appears only in the title, in no bullet and no spec field'],
            [
                'Customer ratings|239 at 4.2 stars|bad|Lowest average and smallest sample here',
                'Price|£219.00|bad|The dearest of the ten',
                'Claimed playtime|Over 30 hours|good|Stated in the title only',
                'Water rating|No IP code published|bad|A bullet mentions poolside splashes',
                'Mounting type field|Tabletop|neutral|An odd field to publish on a portable speaker',
            ],
        ],
        [
            'DeWalt DCR011-XJ Bluetooth Speaker 10.8-54V Li-ion, Bare Unit, Yellow',
            '£87.90', 4.7, 496,
            'B07HY4Z3KV',
            '61C1hrWwneL',
            'DeWalt DCR011 site bluetooth speaker bare unit',
            'A site speaker for a van already full of DeWalt batteries. Bare unit, so GBP 87.90 buys something that will not play until you add a pack.',
            "There is a real buyer for this, and if you are that buyer it moves straight to the top of your own list. It runs off any DeWalt 10.8V to 54V pack, so a tradesperson with a van full of them already has the power sorted, it shares a charger with the drill, and it is built to sit in dust and sawdust all day. It holds 4.7 stars across 496 ratings, which is a better average than the GBP 219.00 Marshall.

For everyone else, start with the word in the title: bare unit. There is no battery and no charger in the box, so GBP 87.90 buys an object that will not play a note until you add a pack, and nothing on the listing gives a playtime figure or an IP code either.

Then there is the listing itself, which is the weakest on this page by some distance. The frequency response field publishes 4000 Microhertz, which is 0.004 Hz, or one cycle every 250 seconds, roughly four minutes and ten seconds per wave. The included components field reads 1 x DeWalt Portable Radio, so the page cannot decide what it is selling. Three of the four bullets are packaging dimensions in mixed units, giving a height of 26.8 centimetres, a length of 15.6 centimetres and a width of 405.0 millimetres, which is 40.5 cm, with the American spelling of centimeters in a British shop. And the same 54 appears in both the watts field and the volts field, while 54V is the top of the battery platform named in its own title. Make of that coincidence what you will.",
            ['Runs off any DeWalt 10.8V to 54V pack you already own', 'Shares a charger with the rest of the DeWalt kit in the van', 'Built for dust and sawdust on a working site', '4.7 stars across 496 ratings, a better average than the Marshall', 'The sensible pick here if you already own the batteries'],
            ['A bare unit: no battery, no charger, so GBP 87.90 plays nothing on its own', 'Frequency response published as 4000 Microhertz, which is one cycle every four minutes', 'The included components field calls it a portable radio, not a speaker', 'Three of four bullets are package dimensions, two in centimetres and one in millimetres'],
            [
                'Battery|Not included, bare unit|bad|Runs on DeWalt 10.8V to 54V packs',
                'Included components|1 x DeWalt Portable Radio|bad|Its own field calls it a radio',
                'Frequency response field|4000 Microhertz|bad|0.004 Hz, one cycle every 250 seconds',
                'Customer ratings|496 at 4.7 stars|neutral',
                'Price|£87.90|bad|And that is before you add a battery',
            ],
        ],
    ],
];
