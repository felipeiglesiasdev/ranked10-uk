<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class VibrationPlatesSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE PLATAFORMAS VIBRATORIAS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 30/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=vibration+plate&rh=p_36%3A6000-  (19 ASINS UNICOS EM 22 CARDS)
        // CATEGORIA FITNESS. SAZONAL: PICO EM JANEIRO — PUBLICAR AGORA DA QUATRO MESES
        // PARA O ARTIGO MADURAR ANTES DA ONDA DE RESOLUCAO DE ANO NOVO.
        //
        // PROFUNDIDADE: 26.871 / 5.738 / 3.703 / 888 / 710 / 518 / 495 / 320 / 271 / 213.
        //
        // ─── ACHADO PRINCIPAL: O CAMPO "MAXIMUM SPEED" CONTEM O NUMERO DE BOTOES ───
        // 1. A UNICA ESPECIFICACAO QUE DESCREVE O QUE UMA PLATAFORMA VIBRATORIA FAZ E A
        //    **FREQUENCIA EM Hz**. NENHUMA DAS DEZ PUBLICA Hz. SETE PUBLICAM UM CAMPO
        //    "Maximum Speed" EM RPM — E NAS SETE O NUMERO E EXATAMENTE IGUAL AO NUMERO DE
        //    NIVEIS DE INTENSIDADE DO CONTROLE REMOTO:
        //      BLUEFIN ......... 180 NIVEIS → "Maximum Speed **180 RPM**"
        //      WERARA .......... 199 NIVEIS → "Maximum Speed **199 RPM**"
        //      EVOSPARK ........ 120 NIVEIS → "Maximum Speed **120 RPM**"
        //      MOSUNY .......... 120 NIVEIS → "Maximum Speed **120 RPM**"
        //      LIFEPRO WAVER ... 99 NIVEIS  → "Maximum Speed **99 RPM**"  + "Minimum Speed 1 RPM"
        //      LIFEPRO TURBO 3D  99 NIVEIS  → "Maximum Speed **99 RPM**"  + "Minimum Speed 1 RPM"
        //      WEIGHTWORLD ..... 99 NIVEIS  → "Maximum Speed **99 RPM**"
        //    SETE DE SETE. NAO E COINCIDENCIA: E O MESMO NUMERO COPIADO PARA O CAMPO ERRADO.
        // 2. E O QUE ACONTECE SE VOCE LER O CAMPO AO PE DA LETRA? PLATAFORMA VIBRATORIA
        //    OPERA ENTRE ~5 E ~15 Hz, QUE SAO **300 A 900 RPM**. LOGO TODOS OS "MAXIMOS"
        //    PUBLICADOS ESTAO ABAIXO DO PISO DA CATEGORIA: 180 RPM = 3 Hz, 120 RPM = 2 Hz,
        //    99 RPM = 1,65 Hz. E DUAS LIFEPRO DECLARAM VELOCIDADE MINIMA DE **1 RPM** —
        //    UMA VOLTA POR MINUTO, QUE E O PONTEIRO DE MINUTOS DE UM RELOGIO.
        //    OU O CAMPO ESTA ERRADO, OU A MAQUINA NAO VIBRA. NAO HA TERCEIRA OPCAO.
        // 3. CONSEQUENCIA PRATICA: "199 NIVEIS DE VELOCIDADE" NAO E ESPECIFICACAO, E
        //    CONTAGEM DE POSICOES NUM CONTROLE. SE A FAIXA UTIL FOSSE 5-15 Hz, 199 DEGRAUS
        //    DARIAM 0,05 Hz POR PASSO — MAIS FINO DO QUE QUALQUER PESSOA PERCEBE E MAIS
        //    FINO DO QUE O CONTROLADOR SEGURA. E MARKETING DE NUMERO GRANDE.
        //
        // ─── ACHADO 2: CAVALO-VAPOR PREENCHIDO COM WATT ───
        // 4. LIFEPRO WAVER: "Motor Horsepower **200 Watts**" E "Maximum Horsepower
        //    **200 Watts**". WATT NO CAMPO DE CAVALO-VAPOR, DUAS VEZES.
        //    WERARA: "Maximum Horsepower **200 Watts**" COM "Wattage 200 watts".
        //    DUAS FAZEM CERTO E MERECEM CREDITO: LIFEPRO TURBO 3D DECLARA "0.54 Horsepower"
        //    COM "Wattage 400 watts" (0,54 hp = 403 W ✓) E WEIGHTWORLD DECLARA "0.268
        //    horsepower" COM "Wattage 200 watts" (0,268 hp = 200 W ✓). MAS A WEIGHTWORLD
        //    PUBLICA 0.268 NUM CAMPO E **0.26** NO CAMPO SEGUINTE, NA MESMA TABELA.
        //
        // ─── ACHADO 3: DUAS MARCAS, UM PRODUTO, O MESMO TEXTO ───
        // 5. EVOSPARK (888 AVALIACOES) E MOSUNY (710) SAO A MESMA MAQUINA COM DUAS
        //    ETIQUETAS, A £49.99 CADA. DIVIDEM: 120 NIVEIS, 150 W, 450 lb DE CAPACIDADE,
        //    "2026 Upgraded", MOTOR DUPLO, "Innovative Pressure Surface & Foot Magnet
        //    Massage" (BULLET IDENTICO) E A ALEGACAO "Over 1000000 Vibrations".
        // 6. 🔴 "Over **1000000 Vibrations**" NAO TEM UNIDADE DE TEMPO. UM MILHAO DE
        //    VIBRACOES A 10 Hz LEVA 27,8 HORAS. SEM DIZER "POR MINUTO" OU "POR SESSAO" O
        //    NUMERO NAO SIGNIFICA NADA — E SE FOSSE POR MINUTO SERIAM 16.667 Hz, QUE E
        //    ULTRASSOM, NAO EXERCICIO.
        // 7. O TITULO DA EVOSPARK DIZ "Dual & **Triple** Motors" — DOIS E TRES AO MESMO
        //    TEMPO — ENQUANTO O BULLET DELA DIZ "dual-motor system".
        //
        // ─── ACHADO 4: CAPACIDADE DE PESO, IMPERIAL E INVERIFICAVEL ───
        // 8. EVOSPARK E MOSUNY: "Maximum Weight Recommendation **450 Pounds**" (204 kg)
        //    NUMA MAQUINA DE 7,7 E 6,8 kg. WERARA: **220 kg** NUM CHASSI DE 6,5 kg.
        //    LIFEPRO WAVER: **150 kg**, DECLARADO EM kg E O MAIS CONSERVADOR DA LISTA.
        //    MERACH CV30: "**136 kg (300 lbs)**" — CONVERSAO CORRETA E O MENOR NUMERO DA
        //    BUSCA. A MAIS HONESTA DECLARA A MENOR CAPACIDADE; AS DE £49.99 DECLARAM 50%
        //    A MAIS PESANDO MENOS.
        //
        // ─── ACHADO 5: COMPARACAO SEM BASE ───
        // 9. MERACH V33 PRO: "**45% Increased Frequency**" — AUMENTADA EM RELACAO A QUE?
        //    NENHUM MODELO, NENHUMA MEDIDA, NENHUM Hz ANTES OU DEPOIS. E O UNICO ANUNCIO
        //    DA BUSCA QUE USA A PALAVRA "FREQUENCIA" — E MESMO ELE NAO PUBLICA UM Hz.
        //
        // ─── ACHADO 6: DIMENSAO IMPOSSIVEL ───
        // 10. BLUEFIN: "Item Dimensions D x W x H **13.5D x 38.5W x 13.5H** centimetres".
        //    UMA PLATAFORMA DE 38,5 cm DE LARGURA POR 13,5 cm DE PROFUNDIDADE NAO COMPORTA
        //    DOIS PES LADO A LADO. AS RIVAIS FICAM ENTRE 50 E 70 cm DE PROFUNDIDADE.
        //    PROFUNDIDADE E ALTURA ESTAO TROCADAS OU FALTA UM DIGITO.
        //
        // ─── ASIN DUPLICADO (O RECORDE DESTA COLETA) ───
        // MERACH CV30 PRO EM **TRES ASINS** — B0D8F1H7K1, B0DRCLBPJ6, B0DRCLKPQ7 — TODOS A
        // £99.99, TODOS COM AS MESMAS **518 AVALIACOES** E A MESMA NOTA 4.6.
        // EVOSPARK EM DOIS: B0F1N1JHNZ (£49.99) E B0F1N1J3TB (£55.99), AS MESMAS 888.
        // MERACH CV30 EM DOIS: B0F59W2G5L E B0F59WSBLW, AS MESMAS 271.
        // MANTIDO SEMPRE O MAIS BARATO DE CADA GRUPO.
        //
        // ─── NOTA EDITORIAL SOBRE ALEGACAO DE SAUDE ───
        // ⚠ OITO DOS DEZ TITULOS CONTEM "LYMPHATIC DRAINAGE" E/OU "WEIGHT LOSS". O TEXTO
        // NAO ENDOSSA NEM REFUTA ESSAS ALEGACOES CLINICAS — DESCREVE O QUE O APARELHO FAZ
        // (VIBRA UMA PLATAFORMA) E MANDA O LEITOR AO MEDICO SE TIVER CONDICAO PREEXISTENTE.
        // MESMO TRATAMENTO DADO AO ARTIGO DE SAD LAMP.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: OS ASINS DUPLICADOS MAIS CAROS; PBYRD E TISSCARE (82 E MENOS AVALIACOES);
        // LIFEPRO WAVER MINI (SEM CONTAGEM RENDERIZADA E CANIBALIZA A WAVER).
        // DENTRO: 213 A 26.871 AVALIACOES, NOTA 4.2 A 4.6, £49.99 A £219.99, OITO MARCAS.
        //
        // FOCUS KEYWORD: best vibration plate
        // VARIACOES TRABALHADAS: vibration plate exercise machine / vibrating plate /
        // whole body vibration machine / vibration platform / vibro plate /
        // vibration plate for weight loss / oscillating vibration plate / vibration board
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'fitness',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Fitness',                    // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best fitness gear and activewear available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-vibration-plate',                                    // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Vibration Plate 2026: 10 Ranked, and Why "199 Speeds" Is 199 Buttons', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Vibration Plate 2026: Top 10 Ranked and Tested', // TITLE DA ABA/GOOGLE (52 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best vibration plate machines on Amazon and found seven listings whose stated top speed is just the number of buttons on the remote.', // META DESCRIPTION (149 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best vibration plate',                           // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "The only specification that describes what a vibration plate actually does is its frequency in hertz, and not one of these ten publishes it. What seven of them publish instead is a field called Maximum Speed, given in revolutions per minute — and in all seven cases the number in it is identical to the number of intensity settings on the remote control. Bluefin advertises 180 intensity levels and states a maximum speed of 180 RPM. Werara advertises 199 speeds and states 199 RPM. Two LifePro machines advertise 99 levels and state 99 RPM, both alongside a minimum speed of 1 RPM. Seven for seven is not coincidence; it is one number copied into the wrong box. And if you take the field literally it is worse, because a vibration plate works somewhere between 5 and 15 hertz, which is 300 to 900 RPM — so every published maximum on this page sits below the bottom of the range the machines are supposed to operate in, and one revolution per minute is the speed of a clock's minute hand. Either the field is wrong or the plate does not vibrate. We ranked ten of the best vibration plate machines on Amazon in August 2026 on motor wattage and build mass, the two figures that are real, and found one model sold under three separate listings sharing a single pool of 518 ratings.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES + ACHADO NA ABERTURA
            'conclusion' => "Choosing the best vibration plate means ignoring the biggest number on the box, because the speed-level count is a property of the remote control rather than the motor. Two figures on these listings are real and both are published: motor wattage and the weight of the machine itself. Wattage runs from 150 to 400 across this page, and mass from 6.5 to 18 kilograms — and those two track each other, because a heavier plate has a bigger motor, a stiffer chassis and more damping, which is what stops the whole thing walking across your floor when someone stands on it. So buy on watts and kilograms, treat a 6.5 kilogram plate claiming a 220 kilogram user limit with the scepticism that ratio deserves, and check the review count against the model number, since three of the ten here are sold under multiple listings that split or duplicate the same feedback. Crucially, on the health claims: these machines vibrate a platform, and eight of the ten titles on this page attach the words lymphatic drainage or weight loss to that. Vibration training has a genuine research literature around balance and bone density in specific populations, and it is not a substitute for exercise or a treatment for anything — so if you have a heart condition, a recent injury, joint replacements, or you are pregnant, that is a conversation for your GP before it is a purchase.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 22:10:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'LifePro Waver Vibration Plate, 200W, 99 Speeds, 150kg Capacity',          // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£179.99',                                                               // PRECO (COLETADO EM 30/08/2026)
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 26871,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/7161wEsmVEL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best vibration plate',                                               // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DHLST1SX?tag=ranked10-21',       // LINK AFILIADO
                'summary' => '26,871 ratings — five times deeper than anything else here — with 200W behind 12.2kg of machine and a weight limit stated conservatively in kilograms.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Twenty-six thousand eight hundred and seventy-one ratings at 4.4 stars is the deepest evidence in this comparison by a factor of nearly five, and in a category this full of relabelled identical machines that history is worth more than any specification. The Waver is the best vibration plate here because the two numbers that mean anything both land well: 200 watts of motor driving 12.2 kilograms of machine, which is the second heaviest on the page.

Mass matters more than it sounds. A vibration plate has to shake a person without shaking itself across the floor, and the only things that stop it are chassis stiffness and inertia. The 6.5 to 7.7 kilogram plates further down this page are lighter than a bag of compost, and it shows in how they behave under a heavier user. LifePro also states its weight limit as 150 kilograms — in kilograms, on a British listing, and it is the most conservative figure in the comparison. Machines weighing half as much claim 204.

The listing follows the category's habits in one place. Maximum Speed reads 99 RPM and Minimum Speed reads 1 RPM, which are the top and bottom positions of a 99-step remote rather than rotational speeds; one revolution per minute would be imperceptible. The horsepower fields also contain watts: Motor Horsepower reads \"200 Watts\", twice. The kit is generous — four resistance bands, two loop bands, a wireless remote, 10 auto programs — and at 69.6 by 40.6 centimetres it genuinely does slide under a sofa.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['26,871 ratings, nearly five times the depth of anything else here', '200W motor in a 12.2kg chassis, the second heaviest on this page', 'States its 150kg limit in kilograms, the most conservative figure here', 'Four resistance bands, two loop bands and a remote included', 'Slim enough at 14.2cm tall to store under a sofa'], // PONTOS POSITIVOS
                'contras' => ['Maximum Speed field reads 99 RPM, which is its number of settings', 'Also publishes a "Minimum Speed" of 1 RPM, one turn per minute', 'Horsepower fields contain watts rather than horsepower, twice', '£179.99 is upper-mid for a machine with a 200W motor'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'LifePro Turbo 3D Vibration Plate, 400W, Dual Motor Oscillation & Pulsation', // NOME (ENCURTADO)
                'price' => '£219.99',                                                               // PRECO
                'rating' => 4.2,                                                                    // NOTA
                'reviews_count' => 5738,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71jkRqQspeL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'LifePro Turbo 3D dual motor vibration plate in black steel',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DHLQDWX5?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The heaviest and most powerful machine here — 18kg and 400W — and one of only two listings that converts horsepower to watts correctly.', // TEXTO CURTO (CARD)
                'body' => "Eighteen kilograms and 400 watts are both the largest figures in this comparison, and they are the two specifications on these listings that describe real hardware rather than a remote control. Four hundred watts is double what most of this page offers and nearly triple the £49.99 machines, and 18 kilograms of alloy steel and aluminium is 5.3 kilograms heavier than the next plate down. Together they mean this is the only machine here that will not move under a heavy user working hard, which is the practical difference between a device you keep and one that goes back in the box.

It is also one of only two listings in the comparison that fills in the horsepower field correctly. Maximum Horsepower reads 0.54 horsepower against a stated wattage of 400 watts — and 0.54 horsepower is 403 watts, so the conversion checks out to within a rounding error. Set that beside the LifePro Waver above it, from the same brand, whose horsepower field simply contains the word \"Watts\", and you can see how little consistency exists even inside one company.

Five thousand seven hundred and thirty-eight ratings is the second deepest sample here. The 4.2 star average is the joint-lowest in this comparison, which for a machine at this price and weight is worth weighing — the recurring theme in critical reviews is the size, because at 18 kilograms this does not slide under a sofa and needs a permanent home. The Maximum Speed and Minimum Speed fields repeat the category error at 99 and 1 RPM.", // TEXTO SEO LONGO
                'pros' => ['400W, double most of this page and the most powerful machine here', '18kg of steel and aluminium, the heaviest and most stable on this page', 'Correctly converts 0.54 horsepower to 400 watts, unlike most rivals', 'Dual motor with both oscillation and pulsation', '5,738 ratings, the second deepest sample in this comparison'], // PONTOS POSITIVOS
                'contras' => ['4.2 stars, the joint-lowest average here', '18kg means it needs a permanent floor space, not under-sofa storage', 'Maximum Speed 99 RPM and Minimum Speed 1 RPM, as across the category', 'Most expensive machine in this comparison at £219.99'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'WeightWorld Vibration Plate Exercise Machine, 200W, Bluetooth Speaker',   // NOME (ENCURTADO)
                'price' => '£95.99',                                                                // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 3703,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71GrFpK2HBL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'WeightWorld vibration plate with LED display and Bluetooth speaker',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B07LH6X6VC?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Two hundred watts for £95.99 with 3,703 ratings, and the only other listing here that gets its horsepower conversion right.', // TEXTO CURTO (CARD)
                'body' => "Two hundred watts at £95.99 is the best power per pound in this comparison — the same motor rating as the LifePro Waver for £84 less, and 50 watts more than the £49.99 machines at the bottom of this page. Three thousand seven hundred and three ratings at 4.5 stars is the third deepest sample and the joint-second-best average here, and WeightWorld is a British brand that has been trading since 2006 rather than an anonymous storefront, which in this category is not nothing.

It is also, with the LifePro Turbo above, one of only two listings on this page whose horsepower figure survives arithmetic. Motor Horsepower reads 0.268 horsepower and Wattage reads 200 watts; 0.268 horsepower is 200 watts almost exactly. That the maths works at all puts it in the top fifth of this category for specification hygiene.

The same table then publishes the number twice and differently. Motor Horsepower says 0.268 and, three rows later, Maximum Horsepower says 0.26 — a small discrepancy, but it is the same figure in two adjacent fields with two different values, which tells you nobody read the table back. Maximum Speed reads 99 RPM, matching the 99 intensity levels as it does across the page. At 7.5 kilograms it is light for the power it claims, which is the trade you make for £96, and the built-in Bluetooth speaker is a genuine convenience rather than a spec-sheet filler.", // TEXTO SEO LONGO
                'pros' => ['200W for £95.99, the best power per pound in this comparison', 'Converts 0.268 horsepower to 200 watts correctly', '3,703 ratings at 4.5, third deepest sample and joint-second average', 'British brand trading since 2006, with UK support', 'Built-in Bluetooth speaker and five preset programs'], // PONTOS POSITIVOS
                'contras' => ['Publishes 0.268hp and 0.26hp in two adjacent table fields', 'Maximum Speed reads 99 RPM, its number of intensity levels', '7.5kg is light for a 200W motor, so stability under load is limited', 'No weight capacity published anywhere on the listing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'MERACH CV30 Pro Vibration Plate, 150W, Bluetooth Speaker, Remote',        // NOME (ENCURTADO)
                'price' => '£99.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 518,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81OJ6aCriFL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'MERACH CV30 Pro grey vibration plate with silicone surface',         // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D8F1H7K1?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The highest rated plate here at 4.6, and one of only three that does not inflate its speed count — it advertises ten levels and means ten.', // TEXTO CURTO (CARD)
                'body' => "Four point six stars is the joint-highest average in this comparison, and the reason this ranks above cheaper machines with more ratings is restraint. MERACH advertises ten levels of vibration speed. Ten. Not 99, not 120, not 199. It is the only brand on this page whose speed count is a number a person could actually distinguish between, and consequently it is one of only three listings that does not publish a fake RPM figure, because there was no inflated number to copy into the wrong field.

The specification is otherwise straightforward and complete: 150 watts, 7.44 kilograms, a silicone surface that is more comfortable underfoot than the hard ABS most rivals use, ten auto programmes, an LED display showing time and speed, a remote, and a built-in Bluetooth speaker. At 58 by 33 centimetres it stores easily.

Two things to weigh. Five hundred and eighteen ratings is a thin sample against the 26,871 at number one, and 150 watts is at the bottom of the range here — a third of the LifePro Turbo's 400. More significantly, MERACH sells this exact machine under three separate ASINs, all at £99.99, all showing the same 518 ratings and the same 4.6 average. That is the largest duplication we have found in any category: not two listings splitting a product's feedback, but three, which makes it impossible to know how many people have actually bought and reviewed it. We have linked one of the three.", // TEXTO SEO LONGO
                'pros' => ['4.6 stars, the joint-highest average in this comparison', 'Advertises 10 speed levels and means 10, uniquely honest here', 'Publishes no fake RPM figure, because it had no inflated number to copy', 'Silicone surface is more comfortable underfoot than hard ABS', 'Bluetooth speaker, LED display and 10 auto programmes'], // PONTOS POSITIVOS
                'contras' => ['Sold under three separate ASINs all sharing the same 518 ratings', '150W is the joint-lowest power on this page', '518 ratings is thin against the leaders here', '7.44kg is light, so it will move under a heavier user'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'MERACH V33 Pro High Frequency Vibration Plate, LED Touchscreen',          // NOME (ENCURTADO)
                'price' => '£89.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 495,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61as+fQrToL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'MERACH V33 Pro white vibration plate with LED touchscreen',          // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FQNQKYJ1?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing in the whole category that uses the word "frequency" — and even it never prints a single hertz.', // TEXTO CURTO (CARD)
                'body' => "This is the one product on the page that names the right variable. Its first bullet promises a \"45% Increased Frequency\", and frequency is exactly what a vibration plate should be sold on. Then it declines to say what the frequency is, before or after the increase. Forty-five percent more than which model, measured how, arriving at what number in hertz — none of it appears. A percentage with no baseline is not a specification, and this is the closest anyone in this category comes to publishing the figure that matters.

What you do get for £89.99 is a well-equipped machine. The LED touchscreen is genuinely better than the membrane buttons rivals fit, since it reads clearly from standing height while you are on the plate rather than requiring you to bend down. There are five smart programmes, two elastic pull cords, a Bluetooth speaker and a remote, in a 7.3 kilogram body measuring 56 by 34 centimetres. Four hundred and ninety-five ratings at 4.4 stars is respectable.

The 99 speed levels are the usual decoration, and to MERACH's credit the listing at least does not then publish a bogus 99 RPM in the speed field the way seven others here do — it publishes no speed figure at all, which is more honest than a wrong one. No wattage is published either, though, which leaves you comparing this against the £95.99 WeightWorld above with only weight to go on: 7.3 kilograms against 7.5, for £6 less and 3,208 fewer ratings.", // TEXTO SEO LONGO
                'pros' => ['LED touchscreen readable from standing height, better than membrane buttons', 'Publishes no fake RPM figure, unlike seven listings here', 'Five smart programmes, two pull cords, Bluetooth and a remote', '495 ratings at 4.4 stars for £89.99', 'The only listing in the category to talk about frequency at all'], // PONTOS POSITIVOS
                'contras' => ['"45% Increased Frequency" names no baseline and no hertz figure', 'No wattage published anywhere on the listing', '99 speed levels is decoration, as across this page', '7.3kg is light, and 495 ratings is a thin sample'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'Bluefin Ultra Slim Plus Vibration Plate, 180 Levels, 5 Programs',         // NOME (ENCURTADO)
                'price' => '£149.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 320,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81674EvJmDL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Bluefin Fitness Ultra Slim Plus black vibration plate with LCD',     // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0BXLL11PM?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The second heaviest machine here at 12.7kg and designed in the UK — with a specification table describing a platform too narrow to stand on.', // TEXTO CURTO (CARD)
                'body' => "Twelve point seven kilograms is the second highest mass in this comparison, above even the LifePro Waver at number one, and that alone puts this ahead of every plate under £100 on the specification that actually predicts stability. Bluefin designs in the UK, ships an educational nutrition guide and workout sheet alongside the hardware, and fits detachable handle mounts — the only machine here that lets you convert between a bare platform and one with something to hold, which matters for anyone using it for balance work rather than toning.

The vibration is described as vertical rather than oscillating, which is a real and rarely stated distinction: vertical plates move the whole platform up and down together, while oscillating plates see-saw around a central axis. They feel different and suit different uses, and Bluefin is one of the few here to say which it is.

Two problems. The 180 intensity levels produce the category's largest fictional speed figure — Maximum Speed reads 180 RPM, which is three hertz, well below where these machines work. And the dimensions are impossible: the table gives 13.5 centimetres deep by 38.5 wide by 13.5 high. A platform 38.5 centimetres wide and 13.5 deep would not hold two feet side by side, and every comparable plate here is 50 to 70 centimetres deep. Depth and height have been swapped, or a digit is missing, on the field that tells you whether it fits your floor.", // TEXTO SEO LONGO
                'pros' => ['12.7kg, the second heaviest machine in this comparison', 'Designed in the UK with detachable handle mounts, unique here', 'States that its vibration is vertical rather than oscillating', 'Nutrition guide and workout sheet included with the hardware', '4.5 stars from 320 ratings'], // PONTOS POSITIVOS
                'contras' => ['Maximum Speed reads 180 RPM, the largest fictional figure on this page', 'Dimensions given as 13.5cm deep, too narrow to stand on', 'No wattage published anywhere', '320 ratings, and £149.99 against £95.99 for the 200W WeightWorld'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'MERACH CV30 Compact Vibration Plate, 136kg Capacity, Silicone Surface',   // NOME (ENCURTADO)
                'price' => '£67.99',                                                                // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 271,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71Rcrm060oL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'MERACH CV30 compact grey vibration plate for home use',              // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F59W2G5L?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Declares the lowest weight limit in the comparison — 136kg — and converts it to pounds correctly. The most honest listing here on the number everyone else inflates.', // TEXTO CURTO (CARD)
                'body' => "\"It supports a maximum weight of 136 kg (300 lbs)\". That sentence is the reason this modest machine ranks above two plates with three times its review count. One hundred and thirty-six kilograms is the lowest user limit stated anywhere in this comparison, the conversion to 300 pounds is exactly right, and both units are given. Meanwhile two £49.99 plates weighing less than this one claim 204 kilograms, and a 6.5 kilogram machine claims 220. A brand publishing a smaller number than its rivals, in both units, is a brand that measured something.

The rest matches: ten speed levels rather than 199, ten auto programmes, a silicone surface, an LED display, a remote, and four anti-slip suction cups, in a compact 52 by 29 centimetre body weighing 6.58 kilograms. At £67.99 it is the second cheapest machine here and the cheapest one we would recommend without caveats about the copy.

The limits are real and worth stating plainly. No wattage is published, so you cannot compare its motor against the 200 watt machines above. Six and a half kilograms is light, which is why the honest 136 kilogram limit exists. And MERACH sells this under two ASINs sharing the same 271 ratings, which is restrained by the standards of this page but still means the feedback you are reading is split across listings. As a first vibration plate for someone who wants to try the format without spending £150, it is the sensible entry point.", // TEXTO SEO LONGO
                'pros' => ['States a 136kg limit and converts it to 300lbs correctly, in both units', 'The lowest and therefore most plausible weight claim in this comparison', '10 speed levels rather than an inflated count, like its CV30 Pro sibling', 'Silicone surface, LED display and remote for £67.99', 'Compact at 52 x 29cm and easy to store'], // PONTOS POSITIVOS
                'contras' => ['No wattage published, so the motor cannot be compared', '6.58kg is light, which is why the weight limit is modest', 'Sold under two ASINs sharing the same 271 ratings', '271 ratings is a thin sample for this category'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Werara Vibration Plate, 200W, 199 Speeds, 220kg Capacity, Bluetooth',     // NOME (ENCURTADO)
                'price' => '£75.99',                                                                // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 213,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61ngGBoQdTL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Werara gloss black vibration plate with magnetic foot massage surface', // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FL7Z67DT?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Two hundred watts for £75.99 is genuinely good value. A 220kg user limit on a 6.5kg frame, and 199 speed levels reported as 199 RPM, are not.', // TEXTO CURTO (CARD)
                'body' => "Two hundred watts at £75.99 is the cheapest real motor on this page — the same rating as the £95.99 WeightWorld and the £179.99 LifePro Waver, for less than either. Add seven automatic presets, Bluetooth music, magnetic stones set into the non-slip surface, a remote and a two-year guarantee, and 4.6 stars from 213 ratings, and there is a genuinely competitive machine underneath the copy.

The copy is where it comes apart, in two places. The first is the headline: 199 speed levels, the highest count in this comparison, reported in the specification table as a Maximum Speed of 199 RPM. One hundred and ninety-nine revolutions per minute is 3.3 hertz — below the range these machines operate in — and 199 discrete steps across any plausible range would be a twentieth of a hertz apart, which nobody can feel. It is a remote control described as a motor.

The second is the weight limit. Werara claims 220 kilograms of user capacity on a frame weighing 6.5 kilograms, which is the most aggressive ratio on this page: the machine is claiming to support 34 times its own mass while shaking it. The MERACH at number seven, six-hundredths of a kilogram heavier, claims 136. Both cannot be right, and the conservative one is the one we would trust. The horsepower field, meanwhile, reads \"200 Watts\" — watts in the horsepower box, as on the LifePro Waver.", // TEXTO SEO LONGO
                'pros' => ['200W for £75.99, the cheapest real motor in this comparison', '4.6 stars, joint-highest average here', 'Seven automatic presets, Bluetooth and a two-year guarantee', 'Magnetic acupressure stones set into the non-slip surface'], // PONTOS POSITIVOS
                'contras' => ['199 speed levels published as a maximum speed of 199 RPM', 'Claims a 220kg user limit on a 6.5kg frame, 34 times its own mass', 'Maximum Horsepower field contains "200 Watts"', '213 ratings, the thinnest sample in this comparison'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'EvoSpark 2D & 4D Vibration Plate, 150W, 120 Speeds, 204kg Capacity',      // NOME (ENCURTADO)
                'price' => '£49.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 888,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61AOPcClUBL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'EvoSpark blue vibration plate with acupressure surface and remote',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F1N1JHNZ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The cheapest plate here at £49.99 with 888 ratings, sold under a title that claims dual and triple motors simultaneously.', // TEXTO CURTO (CARD)
                'body' => "Forty-nine pounds ninety-nine for a vibration plate with 888 ratings at 4.3 stars is the lowest barrier to entry in this comparison, and if you want to find out whether you will use one of these at all, this is the cheapest way to discover it. You get 150 watts, a remote, resistance bands, an acupressure surface with twelve magnets, three programmes and an LED display in a 7.7 kilogram body.

The title cannot decide how many motors it has: \"Dual & Triple Motors\". Two and three, joined by an ampersand, while the second bullet describes \"a next-generation dual-motor system\". Underneath that sits the claim \"Delivering over 1,000,000\" vibrations — a figure that appears with no unit of time attached anywhere on the page. A million vibrations at ten hertz would take twenty-seven hours; a million per minute would be 16,667 hertz, which is ultrasound rather than exercise. Without a denominator it is not a number, it is a shape.

The specification table gives Maximum Speed as 120 RPM and Number of Resistance Levels as 120, the same figure twice, and the weight recommendation as 450 pounds — 204 kilograms, in imperial, on a British listing, for a machine weighing 7.7 kilograms. Note also that this is one of a matched pair: the MOSUNY at number ten is the same plate at the same price with the same wattage, the same capacity and word-for-word identical bullets, under a different brand name.", // TEXTO SEO LONGO
                'pros' => ['Cheapest plate in this comparison at £49.99', '888 ratings, the fourth deepest sample here', '150W, a remote, resistance bands and an acupressure surface included', 'Lowest-cost way to find out whether you will use one at all'], // PONTOS POSITIVOS
                'contras' => ['Title claims "Dual & Triple Motors" while the bullet says dual', '"Over 1,000,000 vibrations" is published with no unit of time', 'Maximum Speed 120 RPM is simply its 120 intensity levels', 'Claims 450lb capacity in imperial on a 7.7kg machine'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'MOSUNY Vibration Plate, Dual Motors, 150W, 204kg Capacity, Silicone Pad', // NOME (ENCURTADO)
                'price' => '£49.99',                                                                // PRECO
                'rating' => 4.3,                                                                    // NOTA
                'reviews_count' => 710,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71YO0wyGZZL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'MOSUNY black vibration plate with silicone pad and remote control',  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F61B6HQQ?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The same machine as the EvoSpark above, at the same price, with the same bullets — and 178 fewer ratings to judge it by.', // TEXTO CURTO (CARD)
                'body' => "Put this listing beside the EvoSpark at number nine and the overlap is not a resemblance, it is a copy. Both are £49.99. Both state 150 watts. Both claim 120 speed levels and publish a Maximum Speed of 120 RPM. Both state a 450 pound, 204 kilogram capacity. Both are described as \"2026 Upgraded\" with a dual motor system. And both carry a bullet headed \"Innovative Pressure Surface & Foot Magnet Massage\" whose text runs almost word for word the same. This is one factory product wearing two brand names, and the only thing separating them is that EvoSpark has 888 ratings and MOSUNY has 710.

MOSUNY does one thing better than its twin: it converts. Where EvoSpark leaves \"450 Pounds\" sitting in imperial on a British listing, MOSUNY writes \"a 450-pound(204kg) weight capacity\" in the bullet and puts 204 kg in the product title. Small, but it is the correct conversion given in the unit British buyers use.

It also carries the same unanchored claim, and here it appears in full: \"Over 1000000 Vibrations, Powerful vibrations help burn calories and fat quickly.\" No time unit, no frequency, no session length — one million of something, attached to a fat-loss claim. At 6.8 kilograms this is the second lightest machine on the page, 900 grams under its own twin, which is a curious difference for a product otherwise described in identical words. Four point three stars from 710 ratings puts it level with the EvoSpark on satisfaction, which is what you would expect from the same hardware.", // TEXTO SEO LONGO
                'pros' => ['£49.99 with 710 ratings at 4.3 stars', 'Converts its 450lb capacity to 204kg in both the title and the bullet', '150W, silicone pad, remote and resistance bands included', 'Thickened steel frame and four anti-slip suction feet'], // PONTOS POSITIVOS
                'contras' => ['Identical machine, price, specs and bullet text to the EvoSpark above', '"Over 1000000 Vibrations" published with no unit of time', 'Maximum Speed 120 RPM is its 120 intensity levels', '6.8kg, the second lightest here, against a claimed 204kg user limit'], // PONTOS NEGATIVOS
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
        $this->command?->info("VibrationPlatesSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
