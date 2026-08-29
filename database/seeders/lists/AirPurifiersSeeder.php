<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class AirPurifiersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE PURIFICADORES DE AR DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA FILTRADA: /s?k=air+purifier&rh=p_36%3A7000-  (20 ASINS UNICOS EM 22 CARDS)
        // CATEGORIA HOME. SAZONAL: PICO NO INVERNO (CASA FECHADA) E NA PRIMAVERA (POLEN).
        //
        // ─── ACHADO PRINCIPAL: O m2 DO ANUNCIO E UMA TROCA DE AR POR HORA ───
        // 1. O NUMERO REAL DE UM PURIFICADOR E O CADR (m3/h). O m2 DO TITULO E UMA
        //    DIVISAO DO CADR POR UMA ALTURA DE PE-DIREITO E POR UM NUMERO DE TROCAS DE
        //    AR POR HORA (ACH) QUE NENHUM FABRICANTE PUBLICA. DUAS MARCAS ESCREVEM A
        //    FORMULA SEM PERCEBER O QUE ESTAO ENTREGANDO:
        //      LEVOIT CORE 300S: "Purifies rooms up to 108m2 ONCE PER HOUR or 54m2
        //                         twice per hour" — CADR 258 m3/h
        //      LEVOIT CORE 600S: "as large as 296m2 (CADR: 711 m3/h) ONCE PER HOUR
        //                         and 148m2 twice per hour"
        //      MORENTO HY4866:   "with a CADR of up to 300 m3/h, ONE AIR CHANGE PER
        //                         HOUR can be completed for rooms up to 1076 ft2 or
        //                         100 m2"
        //    ENTAO O NUMERO GRANDE DO TITULO E A AREA QUE O APARELHO FILTRA UMA VEZ
        //    POR HORA. A ORIENTACAO ACEITA PARA ALERGIA E ASMA E DE 4 A 5 TROCAS POR
        //    HORA. O CORE 300S DE "108 m2" COBRE 22 m2 A 5 ACH.
        // 2. A CONTA DA LEVOIT E CONSISTENTE DEMAIS PARA SER COINCIDENCIA. m2 DIVIDIDO
        //    POR CADR EM TRES MODELOS: 108/258 = 0,419 · 296/711 = 0,416 · 80/187 =
        //    0,428 · 294/697 = 0,422. TODOS SAO 1/2,4 — OU SEJA, PE-DIREITO DE 2,4 m E
        //    EXATAMENTE UMA TROCA POR HORA.
        // 3. E CADA MARCA USA UM PE-DIREITO DIFERENTE SEM DIZER QUAL. A LEVOIT USA
        //    2,39 m. A MORENTO USA 3,0 m (300 m3/h ÷ 100 m2). AS DUAS CHAMAM O
        //    RESULTADO DE "uma troca por hora".
        // 4. TABELA DE ACH REAL QUE MONTAMOS, TODA A 2,4 m DE PE-DIREITO:
        //      BOSCH AIR 4000 ...... 300 m3/h / 62,5 m2 ...... 2,00 ACH  ← MAIS HONESTO
        //      BLUEAIR 3250i ....... ~230 m3/h / 48 m2 ....... 2,00 ACH
        //      PHILIPS 600 ......... 170 m3/h / 39 m2 ........ 1,82 ACH
        //      WINIX 5500-2 ........ 390 m3/h / 99 m2 ........ 1,64 ACH
        //      COWAY AIRMEGA JET ... 402 m3/h / 104 m2 ....... 1,61 ACH
        //      PHILIPS 3200 ........ 520 m3/h / 135 m2 ....... 1,61 ACH
        //      LEVOIT CORE 300S .... 258 m3/h / 108 m2 ....... 1,00 ACH
        //      LEVOIT CORE 600S .... 697 m3/h / 294 m2 ....... 0,99 ACH
        //      MOOKA ............... NAO PUBLICA / 204 m2 .... NAO CALCULAVEL
        //      LEVOIT CORE 200S .... NAO PUBLICA / 64 m2 ..... NAO CALCULAVEL
        //    NENHUM DOS DEZ CHEGA A 2,5 ACH NA AREA QUE ANUNCIA. NENHUM.
        // 5. A COWAY E A UNICA QUE DA OS DOIS NUMEROS NO MESMO BULLET: "designed for
        //    rooms up to 104 m2 and can clean spaces up to 43 m2 in just 15 minutes".
        //    43 m2 EM 15 MINUTOS SAO EXATAMENTE 4 TROCAS POR HORA. ENTAO A PROPRIA
        //    COWAY DIZ QUE A AREA UTIL E 43 m2 E VENDE 104 NO TITULO.
        //
        // ─── ACHADO SECUNDARIO: OS DECIBEIS SAO IMPOSSIVEIS ───
        // 6. A OMS RECOMENDA ATE 30 dB DE RUIDO NOTURNO DENTRO DE CASA, E UM QUARTO
        //    SILENCIOSO A NOITE MEDE PERTO DISSO. AS DECLARACOES COLETADAS:
        //      PHILIPS 3200 ..... 15 dB(A)  ← LIMIAR DE AUDICAO HUMANA
        //      BLUEAIR 3250i .... 18 dB  (MAS COM SELO QUIET MARK, CERTIFICACAO REAL)
        //      PHILIPS 600 ...... 19 dB  (COM NOTA DE RODAPE)
        //      MOOKA / COWAY .... 20 dB
        //      LEVOIT / MORENTO . 24 dB
        //      BOSCH ............ < 25 dB(A)
        //      WINIX ............ 27,4 dB  ← UNICO NUMERO COM DECIMAL
        //    CINCO DOS DEZ AFIRMAM RODAR MAIS SILENCIOSOS QUE O QUARTO ONDE ESTAO. 15 dB
        //    E RUIDO DE FUNDO DE ESTUDIO DE GRAVACAO. SO A WINIX PUBLICA UM NUMERO COM
        //    CASA DECIMAL, QUE E O QUE UMA MEDICAO REAL PRODUZ, E SO A BLUEAIR APOIA O
        //    DELA NUM CERTIFICADOR INDEPENDENTE.
        //
        // ─── OUTROS ACHADOS ───
        // 7. POOL DE AVALIACAO COMPARTILHADO, O MAIOR QUE JA ENCONTRAMOS: CORE 200S
        //    (£79.99), CORE 300S (£127.47) E CORE 600S (£299.99) EXIBEM AS MESMAS
        //    23.177 AVALIACOES E A MESMA NOTA 4.6. TRES PRODUTOS, £220 DE DIFERENCA
        //    ENTRE O MAIS BARATO E O MAIS CARO, UM UNICO CONJUNTO DE AVALIACOES.
        // 8. A PHILIPS 600 SE CONTRADIZ NO TITULO: "Covers 44m2" NO TITULO CONTRA
        //    "purifiers rooms up to 39 m2" NO PRIMEIRO BULLET. 13% DE DIFERENCA. O
        //    BULLET AINDA ESCREVE "purifiers" COMO VERBO.
        // 9. A LEVOIT CORE 600S TAMBEM SE CONTRADIZ: TITULO DIZ 294 m2 E CADR 697 m3/h,
        //    BULLET DIZ 296 m2 E CADR 711 m3/h. DOIS CADR NA MESMA PAGINA. E O BULLET
        //    ESCREVE "Most Pow?rful" COM UM PONTO DE INTERROGACAO NO LUGAR DO "e".
        // 10. A CORE 200S NAO PUBLICA CADR EM LUGAR NENHUM E QUALIFICA O PROPRIO HEPA:
        //    "HEPA-grade WHILE OPERATING IN SLEEP MODE, as tested by an independent
        //    lab". A CLASSIFICACAO HEPA VALE SO NA VELOCIDADE MAIS BAIXA.
        // 11. A MOOKA E A UNICA QUE MEDE EM PES QUADRADOS NUMA LOJA BRITANICA: "2200
        //    Ft2", QUE SAO 204 m2. NAO PUBLICA CADR NENHUM. E AS CERTIFICACOES QUE CITA
        //    — CARB, ETL, DOE — SAO TODAS NORTE-AMERICANAS; NENHUMA BRITANICA OU
        //    EUROPEIA. ELA TAMBEM TRAZ UM DIFUSOR DE OLEO ESSENCIAL DENTRO DE UM
        //    APARELHO VENDIDO PARA REMOVER COMPOSTOS ORGANICOS VOLATEIS DO AR.
        // 12. A PHILIPS 3200 DECLARA "99.97% of particles up to 0.003 microns", OU SEJA
        //    3 NANOMETROS, E "The most efficient air purifier in the market" COM NOTA
        //    DE RODAPE NA 600. A WINIX E A COWAY SAO AS UNICAS QUE CITAM CERTIFICADOR
        //    DE ALERGIA NOMEADO (ALLERGY UK), E A WINIX E A UNICA QUE CITA A AHAM, QUE
        //    E JUSTAMENTE O ORGAO QUE DEFINE COMO SE MEDE CADR.
        // 13. A BLUEAIR NAO PUBLICA CADR, MAS PUBLICA TEMPO: "48m2 in 30 minutes or
        //    20m2 in 12.5 minutes on high". AS DUAS CONTAS DAO 230 m3/h — E INTERNAMENTE
        //    CONSISTENTE, E E MAIS UTIL QUE UM CADR SOLTO.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: LEVOIT CORE 600S E CORE 300 (NAO-S), PARA NAO DAR CINCO VAGAS A UMA
        // MARCA SO — O 600S APARECE NO TEXTO PORQUE E ELE QUE FECHA O POOL DE 23.177;
        // DREO (194 E 1 AVALIACAO), TENKER (90), AEG (98), BLUEAIR SIGNATURE (29),
        // PHILIPS 900 (236) E PHILIPS 1000i (227) POR AMOSTRA FINA; WINIX 5300-2 (108),
        // QUE E A 5500-2 COM MENOS AVALIACOES E £9 MAIS CARA NO MESMO CADR DE 390.
        // DENTRO: NOTA DE 4.2 A 4.6, PRECO DE £79.96 A £249.00, OITO MARCAS.
        //
        // FOCUS KEYWORD: best air purifier
        // VARIACOES TRABALHADAS: air purifier uk / hepa air purifier /
        // air purifier for bedroom / air purifier for allergies / cadr air purifier /
        // air purifier for pets / quiet air purifier / air purifier for large room /
        // h13 hepa filter / best air purifier for hay fever / air changes per hour
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'home',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Home',                       // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.', // DESCRICAO (MESMO TEXTO DOS OUTROS SEEDERS DA CATEGORIA "home", PARA NAO FICAR TROCANDO A CADA SEED)
        ];

        $article = [
            'slug' => 'best-air-purifier',                                         // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Air Purifier 2026: 10 Ranked on Real Air Changes',     // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Air Purifier 2026: Top 10 Ranked and Compared',   // TITLE DA ABA/GOOGLE (50 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best air purifier options on Amazon by air changes per hour rather than the coverage claim, comparing CADR from 170 to 697 cubic metres.', // META DESCRIPTION (155 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best air purifier',                                // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "The square metre figure on an air purifier box is not a room size. It is the CADR divided by a ceiling height and a number of air changes per hour that the manufacturer chooses and does not print. Two brands here give the game away in their own words: Levoit says its Core 300S \"purifies rooms up to 108m2 once per hour\", and Morento says its 300 m3/h unit completes \"one air change per hour\" for rooms up to 100m2. Once per hour is the whole trick. For hay fever, asthma or pet dander the accepted target is four to five air changes an hour, which means that 108m2 headline is really about 22m2 of usable coverage. Run the arithmetic across all ten machines in this comparison and not one of them manages even 2.1 air changes per hour over the area it advertises, while the best of them — Bosch and Blueair — reach exactly 2.0. Meanwhile five of the ten claim to run quieter than the room they sit in, with Philips quoting 15 dB against a World Health Organization night-time guideline of 30. Below we rank the best air purifier options on Amazon in August 2026 by the numbers that survive being checked.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Buying the best air purifier for your home takes one calculation and one act of scepticism. The calculation: take the CADR in cubic metres per hour, divide it by your room area times 2.4, and you have the air changes per hour you will actually get. Aim for four if anyone in the house has allergies or asthma, two if you simply want cleaner air, and ignore the coverage figure on the box entirely — every machine in this comparison overstates it, and the Levoit models overstate it by a factor of four to five because their headline is a single air change per hour by construction. The scepticism is for the noise figure. A quiet British bedroom at night sits around 30 dB, so any purifier claiming 15, 18 or 19 dB is quoting a laboratory number from an anechoic chamber, not something you could measure at home; Winix quoting 27.4 dB and Blueair backing 18 dB with a Quiet Mark certificate are the only two behaving like the number will be checked. Crucially, if a listing publishes no CADR at all — and two of these do not, including one claiming to cover 204 square metres — there is no way to compare it with anything, and you should read that silence as an answer. The best air purifier on this page is the one whose maker was willing to be measured.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                         // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 03:50:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Winix 5500-2 Air Purifier, CADR 390 m3/h, 4-Stage Filtration, PlasmaWave', // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£159.00',                                                               // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 27486,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71tPovUFpEL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best air purifier',                                                  // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B01D8DAYII?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best air purifier here on every axis we can check: 27,486 ratings, the only AHAM certification on the page, and the only noise figure quoted to a decimal place.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Twenty-seven thousand four hundred and eighty-six ratings at 4.6 stars is the deepest evidence in this comparison, and unusually it is matched by the quality of the listing. Winix publishes a CADR of 390 cubic metres per hour, states power draw at both ends of the range at 3W in sleep and 23W on high, and is the only brand here that names AHAM — the American Home Appliance Manufacturers association, which is the body that defines how CADR is measured in the first place. It also carries Allergy UK and ECARF certification.

On the arithmetic this article is built around, 390 m3/h across the advertised 99 square metres works out at 1.64 air changes per hour with a 2.4 metre ceiling. That is well short of the four you want for allergies, but it is 64% better than the Levoit machines that quote exactly one, and if you size it to a 30 square metre living room instead you get 5.4 air changes an hour, which is genuinely in the therapeutic range. The four-stage filtration is a mesh pre-filter, activated carbon and a true HEPA rated at 99.999% down to 0.1 microns, plus the optional PlasmaWave ioniser you can switch off.

Two notes. The noise figure of 27.4 dB is the only one on this page with a decimal, which is what a real measurement looks like, and at 6.7kg with a 59.9cm height this is a substantial floor-standing unit rather than a desk object. Its own claim that it purifies a 20 square metre area in under five minutes does not survive the same arithmetic — 20 square metres is 48 cubic metres, and 390 m3/h clears that in about seven and a half minutes.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['27,486 ratings at 4.6, the deepest sample in this comparison', 'The only listing here that names AHAM, the body defining CADR testing', 'Allergy UK and ECARF certified, with the CADR published in full', '27.4 dB is the only noise figure here quoted to a decimal place', 'Publishes power draw at both ends: 3W sleep, 23W high'], // PONTOS POSITIVOS
                'contras' => ['1.64 air changes per hour across the 99 square metres it advertises', 'Its own five-minute claim for 20 square metres works out at about seven', '6.7kg and 60cm tall, the second largest machine here', 'PlasmaWave is an ioniser and worth switching off if you are sensitive'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'Levoit Core 300S Smart HEPA Air Purifier, CADR 258 m3/h, PM2.5 Sensor',   // NOME (ENCURTADO)
                'price' => '£127.47',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 23177,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61Jg-0ZzHmL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Levoit Core 300S smart HEPA air purifier in milky white',            // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FDWK7YL2?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The machine that hands you the formula: Levoit states in its own bullet that 108 square metres is one air change per hour, and 54 square metres is two.', // TEXTO CURTO (CARD)
                'body' => "This listing is the most useful document in the whole category, because Levoit writes down what every other brand leaves implicit. The third bullet reads: purifies rooms up to 108 square metres once per hour or 54 square metres twice per hour, CADR 258 cubic metres per hour. There it is. The number on the front of the box is the area the machine can filter one single time in an hour, and the brand will tell you so if you read to the end of the sentence.

Extend the sequence and 27 square metres is four changes an hour, which is the level at which an air purifier actually helps someone with hay fever or asthma rather than simply running. So this is an excellent bedroom or home office machine and a poor open-plan living room one, whatever the 108 on the title suggests. What you get for £127.47 is a genuine PM2.5 laser sensor with a real-time readout on the unit and in the VeSync app, auto mode that responds to it, three-stage filtration, and a choice of four replacement filter types including pet allergy and mould. At 3kg and 36cm tall it is small enough to sit on a bedside table.

Two things to know before you buy. The 23,177 ratings shown here are the same 23,177 shown on the £79.99 Core 200S and the £299.99 Core 600S — one review pool across three products and a £220 price spread, so the 4.6 stars tell you about Levoit rather than about this model. And the bullet text is set in Unicode mathematical bold characters rather than plain text, a formatting workaround that renders as gibberish to a screen reader.", // TEXTO SEO LONGO
                'pros' => ['States its own coverage formula: 108 square metres is one air change per hour', 'CADR of 258 m3/h published clearly in the title', 'Real PM2.5 laser sensor with a readout on the unit and in the app', 'Four filter variants including pet allergy, toxin absorber and mould', '3kg and 36cm tall, small enough for a bedside table'], // PONTOS POSITIVOS
                'contras' => ['The 108 square metre headline is one air change per hour, not four', 'Shares its 23,177 ratings with two other Levoit models £220 apart', 'Bullet text uses Unicode bold characters that break screen readers', 'No published noise figure on this model, unlike its cheaper sibling'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Bosch Air 4000 Air Purifier, CADR 300 m3/h, 3-in-1 Filter, 62.5 m2',      // NOME (ENCURTADO)
                'price' => '£189.99',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 700,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61fNKwH4T6L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Bosch Air 4000 air purifier in white',                               // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0B5D7H7VP?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The most conservative coverage claim in this comparison: 300 m3/h over 62.5 square metres is two full air changes an hour, twice what the Levoit models offer.', // TEXTO CURTO (CARD)
                'body' => "Bosch quotes a CADR of 300 cubic metres per hour and a coverage of 62.5 square metres. Divide one by the other with a 2.4 metre ceiling and you get 2.00 air changes per hour — the highest ratio of any machine on this page, tied with Blueair, and exactly double what Levoit offers. The 62.5 is also the only coverage figure in this comparison that is not a round number, which is what a calculation looks like rather than a marketing decision.

That single fact is why a machine with 700 ratings sits above several with tens of thousands. Everything else is competent rather than exciting: a three-in-one filter combining pre-filter, HEPA layer and activated carbon, an automatic mode that adjusts to both air quality and room size, quiet mode under 25 dB(A) with the lights off, and a 5.8kg 50cm tower in plain white that will not embarrass a living room. It is rated 4.6 stars, joint highest here.

The reservations are price and disclosure. At £189.99 it costs more than the Winix that has forty times the ratings and a 30% higher CADR, and Bosch publishes no power consumption and no filter life. It is also worth reading the brand carefully: the specification lists this as Bosch Thermotechnik, the heating division, rather than the appliance business most people picture. None of that changes the arithmetic, which is the reason it is here — of ten manufacturers, Bosch is the one whose advertised room size you could actually live in.", // TEXTO SEO LONGO
                'pros' => ['2.00 air changes per hour over its advertised area, the best ratio here', 'The only coverage figure in this comparison that is not a round number', 'CADR published plainly at 300 m3/h in the first bullet', 'Auto mode adjusts to room size as well as air quality', '4.6 stars, joint highest rating on this page'], // PONTOS POSITIVOS
                'contras' => ['£189.99 for 700 ratings against £159.00 for 27,486 at number one', 'No power consumption or filter life published', 'Quiet mode given only as under 25 dB(A) with no measured figure', 'Sold by Bosch Thermotechnik rather than the home appliance division'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Coway Airmega Jet HEPA Air Purifier, CADR 402 m3/h, Allergy UK Approved', // NOME (ENCURTADO)
                'price' => '£189.99',                                                               // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 434,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71xDqIV-mjL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Coway Airmega Jet air purifier in silver',                           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08Z13YT8Q?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing that publishes both numbers in one sentence: 104 square metres for the title and 43 square metres in fifteen minutes, which is four air changes an hour.', // TEXTO CURTO (CARD)
                'body' => "Read Coway's third bullet twice. It says the unit has a CADR of 402 cubic metres per hour, is designed for rooms up to 104 square metres, and can clean spaces up to 43 square metres in just 15 minutes. Those are two completely different claims about the same machine, and the second one is the honest version: 43 square metres cleaned in a quarter of an hour is four air changes per hour, exactly the level allergy guidance asks for. Coway has printed both the marketing figure and the therapeutic figure side by side, and it is the only brand here that does.

The rest justifies the price. It is the heaviest and tallest machine in this comparison at 8.7kg and 71.7cm, and the MegaJet directional airflow genuinely does something a static purifier cannot — Focus mode throws a concentrated column of filtered air at one spot, which is what you want next to a bed or a desk, while Wide mode spreads it. The filtration is rated at 99.999% down to 0.01 microns, filter life is up to twelve months, and it carries the Allergy UK Seal of Approval and a three-year warranty.

The weaknesses are the rating and the sample. Four point two stars across 434 ratings is the lowest average in this comparison, which at £189.99 is a real reservation, and Coway is not a household name in Britain the way Bosch or Philips is. The 20 dB sleep figure is also in the implausible band — a fan moving 402 cubic metres per hour is not running below the noise floor of the bedroom it stands in.", // TEXTO SEO LONGO
                'pros' => ['Publishes the honest number: 43 square metres in 15 minutes is four air changes', 'CADR of 402 m3/h, the second highest in this comparison', 'Allergy UK Seal of Approval and a three-year warranty', 'MegaJet directional airflow with focused and wide modes', '8.7kg and 71.7cm, the most substantial build on this page'], // PONTOS POSITIVOS
                'contras' => ['4.2 stars is the lowest average in this comparison, at £189.99', '434 ratings is a thin sample for the price', 'Title coverage of 104 square metres is 1.6 air changes, not four', '20 dB sleep claim is below the noise floor of a real bedroom'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Blueair Blue Max 3250i Smart WiFi Air Purifier, HEPASilent, Quiet Mark',  // NOME (ENCURTADO)
                'price' => '£128.99',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 364,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71fQwJsdPDL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Blueair Blue Max 3250i smart air purifier in Stockholm Fog grey',    // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08KPHK3NG?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Publishes no CADR at all, but gives two times-to-clean that both work out at 230 m3/h — and it is the only quiet claim here backed by an independent certifier.', // TEXTO CURTO (CARD)
                'body' => "Blueair does something contrary and, on reflection, better than its rivals. It publishes no CADR figure anywhere. Instead the last bullet says the machine purifies up to 48 square metres in 30 minutes, or 20 square metres in 12.5 minutes on high. Work both of those back and they give the same answer, 230 cubic metres per hour, which means the claims are internally consistent and that 48 square metre headline is two full air changes per hour — the joint best ratio on this page with Bosch. Time to clean is also more useful to a buyer than an abstract CADR, because it is the thing you actually experience.

The 18 dB claim would normally go in the sceptical pile with Philips at 15 and Coway at 20. Here it does not, because Blueair is the only brand in the comparison that has had the figure certified by Quiet Mark, an independent noise certification scheme run by the UK Noise Abatement Society. A number somebody else signed off is worth more than a number somebody printed. The HEPASilent combination filter pairs mechanical filtration with an electrostatic charge, which is what lets it move air at lower fan speed.

Against it: 364 ratings is a thin sample, the 3.39kg body is light, and the brand claim of being the most awarded air purifier in the UK is footnoted to awards it counted itself between 2019 and 2023. Forty-eight square metres is also the smallest advertised coverage here, which is a point in its favour on honesty and a limit on where you can use it.", // TEXTO SEO LONGO
                'pros' => ['2.00 air changes per hour over its advertised area, joint best here', 'Two independent time-to-clean claims that agree with each other', '18 dB certified by Quiet Mark, the only third-party noise validation here', 'HEPASilent electrostatic filtration moves air at lower fan speed', 'Smallest coverage claim on the page, which is a mark of restraint'], // PONTOS POSITIVOS
                'contras' => ['No CADR published anywhere, so it must be reverse-engineered', '364 ratings is one of the thinnest samples in this comparison', 'Most awarded brand claim is footnoted to awards counted by Blueair', 'At 3.39kg and 48cm it is a light unit for £128.99'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Levoit Core 200S Smart HEPA Air Purifier, 64 m2 Coverage, 24 dB',         // NOME (ENCURTADO)
                'price' => '£79.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 23177,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71+NAmpVbSL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Levoit Core 200S smart HEPA air purifier in white',                  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CMQPZC72?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest smart purifier here at £79.99, but it publishes no CADR and qualifies its own HEPA rating to sleep mode only.', // TEXTO CURTO (CARD)
                'body' => "At £79.99 with app and voice control, a 2, 4 and 8 hour timer, a night light and a 24 dB sleep mode, this is the easiest way into a connected purifier, and for a small bedroom it is enough machine. Applying Levoit's own published formula from the Core 300S — coverage equals CADR times 0.42 — the 64 square metre claim implies a CADR of about 154 cubic metres per hour, which over a typical 12 square metre bedroom is more than five air changes an hour. Sized correctly it works.

But the listing itself is the weakest of the three Levoits. It publishes no CADR figure at all, in the title, the bullets or the specification, so you have to derive it from a sister product. And the second bullet qualifies the central claim in a way worth reading slowly: HEPA-grade \"while operating in Sleep Mode, as tested by an independent lab\". Sleep mode is the lowest fan speed. The filtration classification is being asserted at the setting that moves the least air, which is not how anyone uses a purifier during the day.

There is one more thing. The 23,177 ratings and 4.6 stars on this page are identical to those on the Core 300S at number two and on the £299.99 Core 600S — three separate products across a £220 price range sharing a single review pool. Whatever those reviews describe, it is not specifically this machine. The bullet copy also ends mid-thought with the words \"avoid sleep disruptionpollutants\", two words run together with the sentence unfinished.", // TEXTO SEO LONGO
                'pros' => ['£79.99, the cheapest smart purifier in this comparison', 'App and voice control with Alexa and Google Assistant at the entry price', '24 dB sleep mode with a dimmable display and a night light', '3kg and 32cm tall, the smallest unit here', 'Timer with 2, 4 and 8 hour options'], // PONTOS POSITIVOS
                'contras' => ['No CADR published anywhere on the listing', 'HEPA-grade claim qualified to sleep mode only, the lowest fan speed', 'Shares its 23,177 ratings with two Levoit models up to £299.99', 'Bullet copy ends with two words run together and no full stop'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Philips 600 Series Air Purifier, CADR 170 m3/h, NanoProtect HEPA, 12W',   // NOME (ENCURTADO)
                'price' => '£79.96',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 813,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61t6MejPtpL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Philips 600 Series compact air purifier in silk beige',              // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BX4LB7HL?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The lowest power draw here at 12 watts, and the only machine whose title and first bullet disagree about how big a room it covers: 44 square metres against 39.', // TEXTO CURTO (CARD)
                'body' => "Twelve watts at maximum is a remarkable figure. It is roughly half what the Winix draws on high and a third of what the Philips 3200 uses, and over a year of continuous running that is the difference between a few pounds and a noticeable line on the bill. Philips achieves it with NanoProtect HEPA, which adds an electrostatic charge to the mechanical filter so the fan can move less air for the same capture, and at 2.2kg this is the lightest machine in the comparison.

The published CADR is 170 cubic metres per hour. Against the 39 square metres in the first bullet that is 1.82 air changes an hour, third best on this page; against the 44 square metres in the title it is 1.61. Which brings us to the problem. The title says covers 44 square metres. The first bullet says thoroughly purifies rooms up to 39 square metres. Those are the same machine on the same page, 13% apart, and the bullet also uses \"purifiers\" as a verb. For a room of about 20 square metres — a normal British bedroom — 170 m3/h gives 3.5 air changes an hour, which is close to therapeutic, so the honest recommendation is to treat this as a bedroom unit and ignore both headline numbers.

Two further claims deserve marking. Philips advertises 99.97% particle removal at 0.003 microns, which is three nanometres, an extraordinary size to make a filtration claim about, and it appends a footnote. And the 19 dB sleep figure is in the implausible band, below the ambient noise of the room it would be in.", // TEXTO SEO LONGO
                'pros' => ['12W maximum draw, less than half the next most efficient machine here', '2.2kg, the lightest unit in this comparison', 'CADR of 170 m3/h published plainly', '1.82 air changes per hour against the coverage in its own bullet', 'App control and filter monitoring at under £80'], // PONTOS POSITIVOS
                'contras' => ['Title says 44 square metres, first bullet says 39 on the same page', '99.97% at 0.003 microns is a three-nanometre filtration claim', '19 dB sleep figure sits below the noise floor of a real bedroom', 'Lowest CADR in this comparison at 170 m3/h'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Morento HY4866-WF Smart Air Purifier, CADR 300 m3/h, Plus 2 HEPA Filters', // NOME (ENCURTADO)
                'price' => '£87.54',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 1556,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81eI5ittWKL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Morento smart air purifier in white with dual air intake',           // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CMTMJ5TV?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Says the quiet part out loud — 300 m3/h gives one air change per hour over 100 square metres — and quietly assumes a three metre ceiling to get there.', // TEXTO CURTO (CARD)
                'body' => "Morento states the formula as explicitly as Levoit does: with a CADR of up to 300 cubic metres per hour, one air change per hour can be completed for rooms up to 1076 square feet or 100 square metres. Two brands admitting the same thing in the same category is what turns a suspicion into a finding. It also reveals something Levoit hides: Morento is assuming a three metre ceiling, because 100 square metres times three is exactly 300 cubic metres. Levoit's numbers imply 2.39 metres. Both call the result one air change per hour, and neither prints the ceiling height, so the same phrase means different things depending on who wrote it. Very few British homes have three metre ceilings.

The machine is a decent mid-budget proposition. Three hundred cubic metres per hour is the same CADR as the Bosch at number three for less than half the money, there is a dual air intake so the filter works from both sides, real Wi-Fi with the Havaworks app, Alexa and Google support, a filter life display, and two spare HEPA filters in the box — which at typical replacement prices is most of a year of running included.

The reservations are the coverage claim and the brand. One hundred square metres is one air change an hour at a ceiling height most people do not have; at a realistic 2.4 metres over a 25 square metre room you get five changes an hour, which is where this machine belongs. Morento has 1,556 ratings at 4.3 stars, a reasonable but unremarkable record, and the listing prints replacement filter ASINs in a bullet, which is a small sign of a seller managing a catalogue rather than a product.", // TEXTO SEO LONGO
                'pros' => ['States plainly that its coverage figure is one air change per hour', 'CADR of 300 m3/h, matching the Bosch for less than half the price', 'Two spare HEPA filters included, most of a year of running', 'Dual air intake filters from both sides of the unit', 'Wi-Fi app, Alexa and Google support at £87.54'], // PONTOS POSITIVOS
                'contras' => ['Its 100 square metre claim assumes a three metre ceiling', 'One air change per hour is a quarter of what allergy guidance asks for', 'Under 24 dB claim with no independent certification', '1,556 ratings at 4.3, mid-table on both counts'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'Philips 3200 Series Air Purifier, CADR 520 m3/h, NanoProtect HEPA, 36W',  // NOME (ENCURTADO)
                'price' => '£249.00',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 376,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51KwSBZnHHL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Philips 3200 Series air purifier in silver and arctic white',        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D9FM7FMT?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The second highest CADR here at 520 m3/h and ECARF allergy certification, undermined by a 15 dB noise claim that is close to the threshold of human hearing.', // TEXTO CURTO (CARD)
                'body' => "On raw capability this is one of the two strongest machines in the comparison. Five hundred and twenty cubic metres per hour is beaten only by the Levoit Core 600S, and unlike that unit Philips backs it with ECARF certification for allergy sufferers and a specific, checkable claim: purifies 20 square metres in less than six minutes. Run the numbers and that is right — 48 cubic metres at 520 m3/h takes five and a half minutes. When a manufacturer gives you a claim that survives arithmetic, that is worth saying.

The 135 square metre coverage does not survive it in the same way. At a 2.4 metre ceiling that is 1.61 air changes per hour, mid-table here, and for allergy relief you would use this in a room of around 55 square metres rather than 135. Thirty-six watts at maximum is honest and reasonable for the airflow, the three-layer NanoProtect filtration is genuine, and 6.22kg on a 52cm body is a solid piece of hardware.

What holds it at nine is the noise claim and the price. Philips says the SilentWings fan design is \"as quiet as 15 dB(A)\", which is not a figure that means anything in a home — 15 dB is the noise floor of a professional recording studio and roughly the threshold of human hearing, and the World Health Organization night guideline for a bedroom is 30. Whatever was measured, it was not measured in a room. At £249.00 this is the most expensive machine here with 376 ratings, and the £159.00 Winix delivers 75% of the airflow with seventy times the evidence behind it.", // TEXTO SEO LONGO
                'pros' => ['CADR of 520 m3/h, the second highest in this comparison', 'ECARF certified for allergy sufferers, with a checkable six-minute claim', '36W maximum draw is modest for the airflow it produces', 'Three-layer NanoProtect HEPA and carbon filtration', '6.22kg on a 52cm body, properly built'], // PONTOS POSITIVOS
                'contras' => ['15 dB(A) claim is around the threshold of human hearing', '£249.00, the most expensive machine here, for 376 ratings', '135 square metre coverage is 1.61 air changes per hour', 'Also claims 99.97% capture at 0.003 microns, a three-nanometre particle'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'Mooka H13 HEPA Air Purifier, 2200 Square Feet Coverage, Washable Pre-Filter', // NOME (ENCURTADO)
                'price' => '£89.97',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 5325,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81dn-0nNc5L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Mooka H13 HEPA air purifier in white with PM2.5 display',            // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CXJ97TV1?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only purifier on a British listing measuring rooms in square feet, with no CADR published anywhere and an essential oil diffuser built into an air cleaner.', // TEXTO CURTO (CARD)
                'body' => "Five thousand three hundred and twenty-five ratings at 4.5 stars is a genuinely good record, and there is real hardware here: a washable pre-filter that saves money over the life of the machine, a PM2.5 sensor with a numeric display, four fan speeds, a child lock, a 2000-hour filter reminder and a stated consumption of 0.63 kWh per 24 hours at maximum. It is £89.97, and plenty of buyers are happy.

The listing is the problem. It claims to clean up to 2200 square feet per hour — on Amazon.co.uk, where nobody has described a room in square feet since decimalisation. That is 204 square metres, the second largest coverage claim on this page, from a 3.04kg unit costing under ninety pounds. And there is no CADR anywhere in the title, the bullets or the specification table, so the claim cannot be checked against anything. Every other machine here that advertises a large area at least tells you the airflow behind it. Its stated 0.63 kWh over 24 hours works out at about 26 watts average, and the Winix produces 390 cubic metres per hour on 23 watts, so a similar order of airflow would give roughly 0.6 air changes per hour across 204 square metres.

Two smaller flags. The certifications named are CARB, ETL and DOE — Californian, American and American respectively, with no UK or EU mark cited on a British listing. And the unit includes an aromatherapy pad for essential oils, in a machine whose activated carbon filter is sold on its ability to remove volatile organic compounds from the air. Adding scent to air you are paying to strip of scent is a genuine contradiction, not a quibble.", // TEXTO SEO LONGO
                'pros' => ['5,325 ratings at 4.5 stars, the third deepest sample here', 'Washable pre-filter reduces the running cost over the filter life', 'PM2.5 sensor with a numeric readout and auto mode at £89.97', 'Publishes consumption as 0.63 kWh per 24 hours at maximum', 'Child lock, four speeds and a 2000-hour filter reminder'], // PONTOS POSITIVOS
                'contras' => ['Coverage given as 2200 square feet on a British listing, with no CADR at all', '204 square metres from a 3.04kg unit under £90 does not survive checking', 'Certifications cited are CARB, ETL and DOE, none of them UK or EU', 'Built-in essential oil diffuser inside a machine sold to remove VOCs'], // PONTOS NEGATIVOS
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
        $this->command?->info("AirPurifiersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
