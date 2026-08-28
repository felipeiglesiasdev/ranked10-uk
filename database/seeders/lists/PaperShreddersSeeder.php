<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class PaperShreddersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE FRAGMENTADORAS DE PAPEL DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // COLETA: AMAZON.CO.UK EM 28/08/2026, ENTREGA EM M4 6BD (MANCHESTER), BUSCA "paper shredder" FILTRADA A PARTIR DE £40.
        //
        // ═══ ACHADOS DA COLETA (O DIFERENCIAL DO ARTIGO) ═══
        // 1. TODOS OS DEZ SAO P-4. DE £42,49 A £220,99, "CROSS-CUT" E "MICRO-CUT", O NIVEL DE SEGURANCA E O MESMO.
        //    A NORMA DIN 66399 DEFINE P-4 COMO PARTICULA DE ATE 160mm² COM LARGURA ATE 6mm — E UMA FAIXA LARGA, NAO UM NUMERO.
        //    AREA DA PARTICULA DECLARADA POR CADA UM:
        //    BONSAII 200-SHEET 4x12mm = 48mm² · BONSAII C266-B 5x12mm = 60mm² · BONSAII 12-SHEET MICRO 5x12mm = 60mm² ·
        //    BONSAII 12-SHEET CROSS 5x20mm = 100mm² · REXEL 4x28mm = 112mm² · BONSAII 18-SHEET 5x25mm = 125mm² ·
        //    WOLVERINE 4x35mm = 140mm² · VIDATECO 4x36mm = 144mm² · FELLOWES LX50 4x37mm = 148mm² ·
        //    FELLOWES FS-12C 4x40mm = 160mm² (NO LIMITE EXATO DA FAIXA).
        //    ISSO E 3,3x DE DIFERENCA DE AREA SOB O MESMO SELO. NENHUM DA LISTA E P-5.
        // 2. "MICRO-CUT" NAO E NIVEL DE SEGURANCA E NAO SIGNIFICA P-5. O BONSAII C266-B SE CHAMA "Micro-Cut" NO TITULO E
        //    "This cross-cut shredder" NO PROPRIO BULLET 6. O VIDATECO E "Mini Cut" NO TITULO E "Cross Cut, Micro Cut"
        //    NA TABELA DE ESPECIFICACOES — TRES NOMES PARA UM CORTE SO, NA MESMA PAGINA.
        // 3. TEMPO DE OPERACAO CONTINUA VARIA 12x E NAO ACOMPANHA O PRECO:
        //    5 MIN: VIDATECO (£42,49), BONSAII 12-SHEET MICRO (£49,99), FELLOWES LX50 (£49,99), BONSAII 12-SHEET CROSS (£50,99).
        //    10 MIN: REXEL (£134,99). 20 MIN: FELLOWES FS-12C (£82,99). 60 MIN: BONSAII C266-B (£89,99), BONSAII 18-SHEET
        //    (£118,98), WOLVERINE (£193,19), BONSAII 200-SHEET (£220,99).
        //    O DE £89,99 RODA 60 MINUTOS E O DE £134,99 RODA 10.
        // 4. O TEMPO DE RESFRIAMENTO E O NUMERO ESCONDIDO: BONSAII 12-SHEET MICRO RODA 5 MIN E PRECISA DE 40 MIN PARA ESFRIAR
        //    (CICLO DE 1:8). FELLOWES LX50 RODA 5 E ESFRIA 30. BONSAII 18-SHEET RODA 60 E ESFRIA 10.
        // 5. SO A FELLOWES PUBLICA CARGA DIARIA RECOMENDADA: LX50 = 60 FOLHAS E 5 CARTOES POR DIA; FS-12C = 500 FOLHAS E
        //    25 CARTOES POR DIA. E O NUMERO MAIS UTIL DA CATEGORIA E NINGUEM MAIS DA.
        // 6. RUIDO: WOLVERINE 54 dB · REXEL 55 dBA · BONSAII 200-SHEET ≤58 · BONSAII C266-B 60 · BONSAII 18-SHEET 62.
        // 7. ASINS DUPLICADOS: BONSAII 12-SHEET CROSS EM B09N991KVT (£50,99) E B0DRV13HMZ (£56,98), AMBOS COM 8.9K AVALIACOES.
        //    FELLOWES 9-SHEET EM B096KPKRJV E B0F9FYJY8C, AMBOS £49,99 COM 874 AVALIACOES.
        //    E DOIS AUTO-FEED SEM MARCA EM B0GWQFCWY1 (£152,98) E B0GWQK66Y9 (£108,37), AMBOS COM 43 AVALIACOES.
        // 8. A WOLVERINE DECLARA "Capacity 6 gallons" NA TABELA E "21 Litre" NOS BULLETS, NUMA LISTAGEM BRITANICA.
        //
        // ═══ CRITERIO DE CORTE ═══
        // TODOS OS 10 TEM 250+ AVALIACOES. EXCLUIDOS OS DE AMOSTRA FINA: B0GWQFCWY1 (43), B0GWQK66Y9 (43), B0DSC5GY6N (37),
        // B0GWV8R36X (24), B0CSFWYZJL (141).
        //
        // ═══ VARIACOES DE PALAVRA-CHAVE TRABALHADAS NO TEXTO ═══
        // best paper shredder · best paper shredder on amazon · cross cut shredder · micro cut shredder ·
        // best shredder for home office · heavy duty paper shredder · P-4 shredder · auto feed shredder ·
        // quiet paper shredder · document shredder uk
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home-office',                 // SLUG DA CATEGORIA (URL)
            'name' => 'Home & Office',               // NOME EXIBIDO
            'description' => 'Kit to make working from home more comfortable and productive, ranked for UK buyers.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-paper-shredder',                                      // SLUG DO ARTIGO (URL) = PALAVRA-CHAVE EM formato-url
            'title' => 'Best Paper Shredder 2026: 10 Ranked on Security and Run Time', // TITULO / H1 — CONTEM A PALAVRA-CHAVE
            'meta_title' => 'Best Paper Shredder 2026: Top 10 Ranked',            // TITLE DA ABA/GOOGLE (44 CHARS)
            'meta_description' => 'We ranked the best paper shredder options on particle size, run time and cooling. All ten are P-4, yet their shred particles vary by more than three times.', // META DESCRIPTION (~155 CHARS)
            'focus_keyword' => 'best paper shredder',                             // PALAVRA-CHAVE PRINCIPAL — VIRA O ALT DO HERO
            'hero_image' => '',                                                   // SEM HERO MANUAL: A VIEW USA A FOTO DO PRODUTO #1 COMO IMAGEM SOCIAL
            'intro' => 'Every paper shredder in this guide carries the same security rating, and that is the first thing worth knowing. From a £42.49 desktop model to a £220.99 auto-feed machine, cross-cut and micro-cut alike, all ten are P-4 under the DIN 66399 standard. What the badge does not tell you is that P-4 is a band rather than a number: it covers any particle up to 160 square millimetres, and the shredders here range from 48mm² to 160mm², a difference of more than three times under one label. Meanwhile "micro-cut" turns out to mean nothing in particular, since one machine calls itself micro-cut in its title and a cross-cut shredder in its own bullet points. The specification that genuinely separates these machines is not security at all. It is how long each one runs before it overheats, which ranges from five minutes to sixty, and how long it then needs to cool down, which one manufacturer quietly puts at forty minutes. So this ranking of the best paper shredder options is built on particle size, run time and duty cycle rather than on the badge everyone shares.', // INTRO OTIMIZADA
            'conclusion' => 'The best paper shredder for a home office is the one whose run time matches the job you actually have. If you shred a few envelopes a week, a five-minute machine is fine and you can spend £50. If you are clearing years of bank statements out of a filing cabinet, a five-minute machine with a forty-minute cool-down will turn one afternoon into three, and a sixty-minute model is worth the extra £40. Ignore the words cross-cut and micro-cut, because neither is a security standard, and look instead for the particle dimensions in millimetres: smaller area means more secure, and every machine here is P-4 whatever it calls itself. If you handle genuinely sensitive material you want P-5, which needs particles under 30mm² and roughly 2mm wide, and nothing in this search offers it. Finally, note that only one brand publishes a recommended daily duty, and the gap between its two models is 60 sheets a day against 500, which tells you more about what a shredder can take than any headline sheet count.', // CONCLUSAO OTIMIZADA
            'author' => 'Felipe Iglesias',                                        // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-28 09:00:00',                              // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                     // POSICAO NO RANKING
                'name' => 'Bonsaii C266-B 12-Sheet Micro-Cut Paper Shredder',                         // NOME
                'price' => '£89.99',                                                                 // PRECO NA COLETA
                'rating' => 4.7,                                                                     // NOTA (MAIOR DA LISTA)
                'reviews_count' => 823,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/614G80Csc8L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Bonsaii C266-B micro-cut paper shredder in black with 16L bin',        // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CNVD4S4B?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Sixty minutes of continuous shredding and 5x12mm particles for £89.99, the best combination of run time and cut size here. It rates 4.7, the highest in the guide.', // TEXTO CURTO DO CARD
                'body' => 'This is the machine that gets the balance right. Sixty minutes of continuous operation puts it alongside shredders costing twice as much, and it cuts to 5 x 12mm, which is 60 square millimetres, one of the two smallest particles in this guide. Paired with 12 sheets per pass and a 16 litre bin holding around 270 sheets, it will clear a drawer of old paperwork in one sitting rather than three.

Sixty decibels makes it quieter than the 18-sheet Bonsaii at number three, and it takes CDs, credit cards, mail, staples and clips without you sorting them first. Auto start and stop, manual reverse, overheat and overload protection, and a cut-out when the bin is removed are all present. Wheels make it movable, which matters more than it sounds for a machine you want out of sight most of the time.

One wrinkle to note, because it is the theme of this whole category. The title sells a Micro-Cut shredder and the second bullet correctly identifies it as P-4 High Security. Then the sixth bullet describes the same machine as "This cross-cut shredder". Both descriptions point to the same P-4 rating, so nothing about the security is in doubt, but it is a neat illustration that micro-cut and cross-cut are marketing words rather than standards.',
                'pros' => ['60 minutes of continuous run time at £89.99', '5 x 12mm particles, joint smallest cut area in this guide', '4.7 rating, the highest here', '16L bin holding around 270 sheets, with a viewing window', 'Takes CDs, cards, staples and clips without sorting'],
                'contras' => ['Calls itself micro-cut in the title and cross-cut in bullet six', 'Still P-4, not P-5, despite the micro-cut name', '12 sheets per pass is mid-table', 'No published daily duty recommendation'],
            ],
            [
                'position' => 2,                                                                     // POSICAO NO RANKING
                'name' => 'Fellowes FS-12C 12-Sheet Cross-Cut Paper Shredder',                        // NOME
                'price' => '£82.99',                                                                 // PRECO NA COLETA
                'rating' => 4.1,                                                                     // NOTA
                'reviews_count' => 637,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61tvqpTLkRL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Fellowes FS-12C cross-cut paper shredder in white with 19L bin',       // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09R4KQP4W?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The only brand here that publishes a daily duty figure, and this one is rated for 500 sheets a day. Twenty minutes of run time, a five-year cutter warranty and UK phone support.', // TEXTO CURTO DO CARD
                'body' => 'Fellowes does something no other manufacturer in this search bothers with, and it is the single most useful number on any of these pages. It publishes a recommended daily duty: 500 sheets and 25 credit cards per day for this model. Sheet capacity per pass tells you how thick a stack you can feed. Daily duty tells you whether the machine is built to do that repeatedly, which is what actually determines whether it survives a filing cabinet clear-out.

The rest is solidly specified. Twenty minutes of continuous shredding sits comfortably above the five-minute budget machines, the 19 litre pull-out bin is generous, and there is a patented safety lock that deactivates the shredder against accidental starts, which is worth having in a house with children. The warranty is the best in this guide at five years on the cutters and two on the machine, backed by a UK phone line rather than an email form.

Two marks against it. The cut is 4 x 40mm, which is 160 square millimetres, sitting exactly on the upper limit of what P-4 permits and making it the coarsest shred in this guide. And it holds 4.1 from 637 ratings, the joint lowest score here. If security is your priority rather than throughput, the Bonsaii above cuts particles a third of the size for £7 more.',
                'pros' => ['Publishes a 500 sheets per day duty rating, unique in this search', '20 minutes of continuous run time', 'Five-year cutter warranty and two-year machine warranty', 'Patented safety lock against accidental starts', 'UK phone support line'],
                'contras' => ['4 x 40mm particles, the coarsest cut in this guide', '4.1 rating, joint lowest here', 'Sits exactly at the upper limit of the P-4 band', 'Amazon exclusive, so no price comparison elsewhere'],
            ],
            [
                'position' => 3,                                                                     // POSICAO NO RANKING
                'name' => 'Bonsaii 18-Sheet Cross-Cut Heavy Duty Paper Shredder',                     // NOME
                'price' => '£118.98',                                                                // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 10476,                                                            // Nº DE AVALIACOES (MAIOR AMOSTRA DA BUSCA INTEIRA)
                'image' => 'https://m.media-amazon.com/images/I/71E1W-DNv0L._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Bonsaii 18-sheet cross-cut heavy duty paper shredder with 23L bin',    // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B00IOFD08C?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'With 10,476 ratings this is the most bought shredder in the search, and the best duty cycle here: 60 minutes of running against only 10 minutes of cooling.', // TEXTO CURTO DO CARD
                'body' => 'Evidence is the argument for this one. A sample of 10,476 ratings at 4.5 is bigger than everything else on this page put together, and for a machine with a motor and a cooling system that has to survive years of intermittent use, that depth of feedback carries real weight.

The duty cycle is the specification that justifies the price. Sixty minutes of continuous shredding followed by only ten minutes of cooling is the best ratio in this guide by a wide margin, against the £49.99 Bonsaii further down that runs five minutes and then needs forty. In practical terms this machine works for an hour, rests while you make a cup of tea, and works again. It also takes 18 sheets per pass, the joint highest here, and the 23 litre bin holds more than 400 sheets.

The compromises are cut size and noise. At 5 x 25mm the particles are 125 square millimetres, which is P-4 but towards the coarser end, and notably this listing is one of the few that does not state a P level at all. At 62 decibels it is also the loudest machine in the guide, eight decibels above the Wolverine. Four castors help you push it somewhere else while it runs.',
                'pros' => ['10,476 ratings at 4.5, by far the largest sample here', '60 minutes running against only 10 minutes cooling', '18 sheets per pass, joint highest in this guide', '23L bin holding over 400 sheets', 'Four castors for easy repositioning'],
                'contras' => ['62 dB, the loudest shredder in this guide', '5 x 25mm particles, coarser than the machines above', 'The listing never states a P security level', 'Bulkier than the desktop models here'],
            ],
            [
                'position' => 4,                                                                     // POSICAO NO RANKING
                'name' => 'Fellowes LX50 9-Sheet Cross-Cut Paper Shredder',                           // NOME
                'price' => '£49.99',                                                                 // PRECO NA COLETA
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 874,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/611kuT9DceL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Fellowes LX50 nine-sheet cross-cut paper shredder in black',           // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B096KPKRJV?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A well-built £49.99 shredder with a three-year warranty and a safety lock. Fellowes is honest that it is rated for 60 sheets a day and needs 30 minutes to cool after five.', // TEXTO CURTO DO CARD
                'body' => 'The LX50 is the machine to buy if you shred a handful of envelopes and statements each week and want something that will still work in five years. The build is proper Fellowes, there is a patented safety lock that deactivates the unit so a curious child cannot start it, the 17 litre bin lifts off cleanly, and the warranty runs to three years once you register, which is the second longest in this guide.

What makes this listing genuinely useful is that Fellowes tells you the limits rather than hiding them. The recommended daily duty is 60 sheets and five credit cards. The run time is five minutes, followed by a thirty minute cool-down, and that is stated in the second bullet rather than buried. Compare that with the FS-12C at number two, from the same manufacturer, rated at 500 sheets a day, and you can see exactly what the extra £33 buys.

The consequence is that this is a light-duty machine and should be bought as one. Nine sheets per pass and a five-minute run make a large clear-out genuinely slow going: five minutes of work then half an hour of waiting. The cut is 4 x 37mm, or 148 square millimetres, towards the coarse end of P-4. For weekly household paperwork it is excellent value at 4.6 from 874 ratings.',
                'pros' => ['Three-year warranty when registered, second longest here', 'Publishes its daily duty honestly at 60 sheets', 'Patented safety lock against accidental starts', '17L lift-off bin and compact under-desk size', '4.6 from 874 ratings'],
                'contras' => ['Five minutes of running needs 30 minutes of cooling', 'Only nine sheets per pass', '4 x 37mm particles, towards the coarse end of P-4', 'Rated for just 60 sheets a day'],
            ],
            [
                'position' => 5,                                                                     // POSICAO NO RANKING
                'name' => 'Bonsaii 200-Sheet Auto-Feed Micro-Cut Paper Shredder',                     // NOME
                'price' => '£220.99',                                                                // PRECO NA COLETA (O MAIS CARO DA LISTA)
                'rating' => 4.6,                                                                     // NOTA
                'reviews_count' => 662,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61uuVloTQwL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Bonsaii 200-sheet auto-feed micro-cut paper shredder with 31L bin',    // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DK2W5LNW?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Load 200 sheets, close the lid and walk away. It also produces the smallest particles in this guide at 4x12mm, though it is still rated P-4 like everything else here.', // TEXTO CURTO DO CARD
                'body' => 'Auto-feed changes what a shredder is for. Instead of standing over the machine feeding it twelve sheets at a time, you drop 200 sheets into the tray, close the lid and leave the room. For anyone with years of accumulated paperwork rather than a weekly envelope habit, that is the difference between a chore and a background task, and it is the reason to spend £220.99.

It also cuts the smallest particles here, 4 x 12mm, which works out at 48 square millimetres, roughly a third of the area produced by the Fellowes FS-12C. It is still labelled P-4, because P-4 stretches all the way to 160mm², which is the clearest single illustration of why the badge is not a substitute for reading the dimensions. Sixty minutes of auto-feed running with a cooling time of twenty minutes or less, a 31 litre bin with a full-bin alert, low-power standby after ten minutes idle, and 58 decibels round it out. Twelve lubricant sheets are included, which matters because auto-feed machines need lubricating more than manual ones.

The manual slot takes only 12 sheets at a time with a 30 minute run, so treat that as a secondary route for cards and stapled bundles. At £220.99 it is the most expensive machine here by £28, and 662 ratings is a modest sample for that money.',
                'pros' => ['200-sheet auto-feed tray, so you can load it and walk away', '4 x 12mm particles, the smallest cut area in this guide', '31L bin with a full-bin alert', '60 minutes auto-feed running, 20 minutes cooling', 'Twelve lubricant sheets included'],
                'contras' => ['£220.99, the most expensive shredder here', 'Still P-4 despite the smallest particles in the guide', 'Manual slot takes only 12 sheets', '662 ratings is a modest sample at this price'],
            ],
            [
                'position' => 6,                                                                     // POSICAO NO RANKING
                'name' => 'Bonsaii 12-Sheet Cross-Cut Heavy Duty Paper Shredder',                     // NOME
                'price' => '£50.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 8902,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61ffgGVMpzL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Bonsaii 12-sheet cross-cut paper shredder in black and white',         // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09N991KVT?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The second most reviewed shredder here with 8,902 ratings, cutting 5x20mm at £50.99. Five minutes of run time makes it a weekly machine rather than a clear-out machine.', // TEXTO CURTO DO CARD
                'body' => 'For £50.99 this covers the basics with a very large sample behind it. It states its P-4 level up front, cuts 12 sheets into 5 x 20mm pieces, which at 100 square millimetres is meaningfully finer than either Fellowes here, and takes credit cards, staples and clips. The 21 litre bin has a lift-off head and a transparent window, and the whole thing measures 32 x 20 x 46.5cm so it disappears under a desk.

Auto start and stop with manual reverse handles the jams, and overheat protection is present. At 8,902 ratings and 4.4 it is the second best evidenced machine in this guide, which for a budget shredder is reassuring in a way that a 4.8 from 40 people would not be.

The five-minute run time is the limitation and it is the thing to be honest with yourself about before buying. Five minutes of shredding is perhaps a hundred sheets, after which the machine needs to rest. If your shredding is a weekly stack of junk mail, that is entirely sufficient and you have saved £39 against the C266-B at number one. If you are working through a filing cabinet, you will find yourself waiting far more than shredding. Note also that Bonsaii lists this same shredder under a second ASIN at £56.98, sharing these ratings, so buy the cheaper page.',
                'pros' => ['8,902 ratings at 4.4, second largest sample here', 'States P-4 clearly with 5 x 20mm particles', 'Finer cut than either Fellowes in this guide', 'Compact 32 x 20 x 46.5cm footprint', '21L bin with lift-off head'],
                'contras' => ['Only five minutes of continuous run time', 'Listed under a second ASIN at £56.98 with the same ratings', 'No cooling time stated in the bullets', 'No published daily duty figure'],
            ],
            [
                'position' => 7,                                                                     // POSICAO NO RANKING
                'name' => 'WOLVERINE SD9113 18-Sheet Cross-Cut Paper Shredder',                       // NOME
                'price' => '£193.19',                                                                // PRECO NA COLETA
                'rating' => 4.5,                                                                     // NOTA
                'reviews_count' => 1647,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/71PwsK7FTvL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'WOLVERINE SD9113 cross-cut paper shredder in black with 21L bin',      // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B085HN95YZ?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The quietest machine in the guide at 54 decibels, with 60 minutes of run time and UKCA certification. At £193.19 it costs more than double the Bonsaii that matches its run time.', // TEXTO CURTO DO CARD
                'body' => 'Noise is the case for the Wolverine. At 54 decibels it is the quietest shredder in this guide, eight decibels below the Bonsaii C266-B and a full eight below the 18-sheet Bonsaii at 62. If your shredder lives in a room where someone else is working or a baby sleeps nearby, that gap is genuinely audible rather than a spec-sheet nicety, and it comes alongside a full sixty minutes of continuous running.

It is also the only listing here to name UKCA certification specifically, which is the British conformity mark, and it handles 18 sheets per pass plus CDs and credit cards. The jam reverse system detects and clears blockages automatically rather than needing a manual switch.

The problem is the price against what else it does. At £193.19 it costs £103 more than the Bonsaii C266-B at number one, which matches its sixty-minute run time and cuts 5 x 12mm particles against the Wolverine 4 x 35mm. That is 60 square millimetres versus 140, so you are paying more than double for a coarser shred, buying quiet and build rather than security. The warranty is one year, the shortest in this guide. The specification table also lists the bin as 6 gallons while the bullets say 21 litres, which is an odd unit to find on a UK listing.',
                'pros' => ['54 dB, the quietest shredder in this guide', '60 minutes of continuous run time', '18 sheets per pass plus CDs and credit cards', 'Names UKCA certification specifically', 'Automatic jam detection and reverse'],
                'contras' => ['£193.19 for a coarser 4 x 35mm cut than a £89.99 rival', 'One-year warranty, the shortest here', 'Bin listed as 6 gallons in the table and 21 litres in the bullets', 'Most expensive way to get a 60 minute run time'],
            ],
            [
                'position' => 8,                                                                     // POSICAO NO RANKING
                'name' => 'Vidateco 10-Sheet Paper Shredder, 15L Bin',                                // NOME
                'price' => '£42.49',                                                                 // PRECO NA COLETA (O MAIS BARATO DA LISTA)
                'rating' => 4.3,                                                                     // NOTA
                'reviews_count' => 4292,                                                             // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/61pd5EBRLoL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Vidateco ten-sheet paper shredder in black with lift-out bin',         // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B09VPDNKP7?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'The cheapest shredder here at £42.49 with 4,292 ratings, and no lubricant needed. It manages to describe its cut three different ways on one page.', // TEXTO CURTO DO CARD
                'body' => 'At £42.49 with 4,292 ratings behind it, this is the sensible floor for a household shredder that is not a toy. It takes 10 sheets into 4 x 36mm particles and correctly names the DIN P-4 standard, the anti-jam cutter and three-mode auto/off/reverse switch cover the basics, and the 15 litre bin lifts out with a carry handle. The maintenance-free design needs no lubricant oil, which removes a recurring cost and a job most people forget anyway.

The cut description is where it becomes a case study for this whole guide. The product title calls it a Mini Cut shredder. The first bullet calls it P-4 high security with 4 x 36mm particles. The specification table lists the cut type as "Cross Cut, Micro Cut", both at once. Three different descriptions of one set of blades, on one page. The particle dimensions are the only part of that which means anything, and at 144 square millimetres this is towards the coarse end of P-4.

The five-minute run time and 10-sheet capacity make it a light-duty machine, and it sits at eight here rather than higher because at £49.99 the Fellowes LX50 adds a three-year warranty, a safety lock and a published duty rating for £7.50 more.',
                'pros' => ['£42.49, the cheapest shredder in this guide', '4,292 ratings at 4.3', 'No lubricant oil needed, removing a running cost', 'Names the DIN P-4 standard explicitly', '15L lift-out bin with a carry handle'],
                'contras' => ['Described as Mini Cut, Cross Cut and Micro Cut on the same page', '4 x 36mm particles, towards the coarse end of P-4', 'Five-minute run time and only 10 sheets per pass', 'No cooling time or daily duty published'],
            ],
            [
                'position' => 9,                                                                     // POSICAO NO RANKING
                'name' => 'Bonsaii 12-Sheet Micro-Cut Paper Shredder, P-4',                           // NOME
                'price' => '£49.99',                                                                 // PRECO NA COLETA
                'rating' => 4.4,                                                                     // NOTA
                'reviews_count' => 355,                                                              // Nº DE AVALIACOES
                'image' => 'https://m.media-amazon.com/images/I/51zy5ax8kxL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Bonsaii 12-sheet micro-cut paper shredder in white with 21L bin',      // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DRV1LWLR?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'Fine 5x12mm particles for £49.99, which looks like the bargain of the guide until you read bullet three: five minutes of shredding needs forty minutes of cooling.', // TEXTO CURTO DO CARD
                'body' => 'On paper this is the value pick. It produces 5 x 12mm particles, 60 square millimetres, matching the £89.99 C266-B at number one and finer than machines costing four times as much, and it does it for £49.99 with a 21 litre lift-off bin, an overheat indicator and a cut-out when the head is removed.

Then you reach the third bullet. Five minutes of continuous shredding, followed by forty minutes of cooling. That is a duty cycle of one to eight, the worst in this guide by some distance, and it changes what this machine can realistically do. Five minutes of shredding is perhaps a hundred sheets. If you have a thousand sheets to destroy, that is ten cycles, and with the cooling time you are looking at seven and a half hours of elapsed time to do roughly forty-five minutes of work. The 18-sheet Bonsaii at number three does sixty minutes of work for ten minutes of rest.

So this is a machine for a small, regular habit rather than a project. If you shred the week post every Sunday, the cool-down never comes up and you have the finest cut in the guide for £49.99. If you bought it to clear a filing cabinet, you have bought the wrong one, and the number that tells you so sits in the middle of the bullet list rather than the title.',
                'pros' => ['5 x 12mm particles, joint finest cut in this guide', '£49.99, among the cheapest here', 'States its P-4 level and particle size clearly', '21L lift-off bin with viewing window', 'Head-removal cut-out and overheat indicator'],
                'contras' => ['Five minutes of running needs 40 minutes of cooling, a 1:8 duty cycle', 'Only 355 ratings, a thin sample', 'Impractical for large clear-outs despite the fine cut', 'Micro-cut name still only earns a P-4 rating'],
            ],
            [
                'position' => 10,                                                                    // POSICAO NO RANKING
                'name' => 'Rexel Optimum Auto Feed+ 50 Sheet Paper Shredder',                         // NOME
                'price' => '£134.99',                                                                // PRECO NA COLETA
                'rating' => 4.1,                                                                     // NOTA
                'reviews_count' => 260,                                                              // Nº DE AVALIACOES (AMOSTRA MAIS FINA — SINALIZADO NO TEXTO)
                'image' => 'https://m.media-amazon.com/images/I/71u+LfeUXwL._AC_SL1500_.jpg',        // IMAGEM DO PRODUTO
                'alt_text' => 'Rexel Optimum Auto Feed+ 50 sheet paper shredder in black',            // ALT DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08QSMST8M?tag=ranked10-21',        // LINK DE AFILIADO MONTADO PELO ASIN
                'summary' => 'A 50-sheet auto-feed tray from a proper UK office brand, but only ten minutes of run time for £134.99, and the lowest rating here from the thinnest sample.', // TEXTO CURTO DO CARD
                'body' => 'Rexel is a serious office brand and the Optimum Auto Feed+ has the right idea: drop 50 sheets in the tray, close the lid and let it work, with a six-sheet manual slot for anything that needs feeding by hand. Touch controls, anti-jam technology, a 20 litre pull-out bin and 55 decibels make it a tidy desk-side machine, and it cuts 4 x 28mm particles at 112 square millimetres, finer than either Fellowes here.

The run time is what undoes it. Ten minutes of continuous operation, on a machine whose entire selling point is that it works unattended. An auto-feed tray holding 50 sheets that stops after ten minutes is a strange combination, because the whole reason to buy auto-feed is to walk away from a large pile. Compare it with the Bonsaii 200-sheet at number five, which costs £86 more but takes four times the load and runs for sixty minutes, or with the £89.99 C266-B which also runs for sixty.

It also holds 4.1 from 260 ratings, the joint lowest score in this guide from the thinnest sample. Nothing there suggests a specific fault, and 260 is enough to be indicative rather than noise, but at £134.99 it is difficult to argue for against better-evidenced machines that do more.',
                'pros' => ['50-sheet auto-feed tray plus a six-sheet manual slot', '4 x 28mm particles, finer than either Fellowes here', '55 dBA, among the quieter machines in this guide', 'Established UK office brand with touch controls', '20L pull-out bin and anti-jam technology'],
                'contras' => ['Only ten minutes of run time on an auto-feed machine', '£134.99 for less capability than a £89.99 rival', '4.1 rating, joint lowest in this guide', '260 ratings, the thinnest sample here'],
            ],
        ];

        // ═══════════════════════════════════════════════════════════════
        // ═══ FIM DA AREA EDITAVEL — NAO PRECISA MEXER ABAIXO ═══
        // ═══════════════════════════════════════════════════════════════

        $categoryModel = Category::updateOrCreate( // CRIA OU ATUALIZA A CATEGORIA PELO SLUG (NAO DUPLICA)
            ['slug' => $category['slug']], // CHAVE DE BUSCA: SLUG DA CATEGORIA
            $category, // DADOS A SEREM GRAVADOS/ATUALIZADOS
        );

        $articleModel = Article::updateOrCreate( // CRIA OU ATUALIZA O ARTIGO PELO SLUG (NAO DUPLICA)
            ['slug' => $article['slug']], // CHAVE DE BUSCA: SLUG DO ARTIGO
            array_merge($article, ['category_id' => $categoryModel->id]), // VINCULA O ARTIGO A CATEGORIA
        );

        $articleModel->products()->delete(); // REMOVE OS PRODUTOS ANTIGOS DESTE ARTIGO PARA REFLETIR EDICOES SEM DUPLICAR

        foreach ($products as $produto) { // PERCORRE A LISTA MANUAL DE PRODUTOS
            $articleModel->products()->create($produto); // RECRIA CADA PRODUTO VINCULADO AO ARTIGO
        }

        $this->command?->info(static::class.": 1 categoria, 1 artigo e ".count($products)." produtos."); // RESUMO DO QUE FOI POPULADO
        $this->command?->info("URL do artigo: /{$category['slug']}/{$article['slug']}"); // URL ONDE O ARTIGO FICA ACESSIVEL
    }
}
