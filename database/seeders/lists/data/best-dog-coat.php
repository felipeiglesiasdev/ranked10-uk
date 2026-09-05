<?php

// ═══════════════════════════════════════════════════════════════
// ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
//
// COLETA: AMAZON.CO.UK EM 03/09/2026, ENTREGA EM MANCHESTER M4 6BD.
// BUSCA: /s?k=dog+coat+waterproof+winter&rh=p_36%3A1500-  (10 FICHAS)
// CATEGORIA PET SUPPLIES. SAZONAL: PICO AGORA — OUTONO/INVERNO BRITANICO, PASSEIO NO ESCURO.
//
// ─── ACHADO QUE VAI NA INTRO: A LETRA DO TAMANHO E KEYWORD, NAO MEDIDA ───
//   MILE HIGH LIFE B09DSGZWKM, VENDIDO COMO "X-SMALL":
//     Neck size:16 inches (40,64 cm) — UM POLEGAR INTEIRO MAIOR QUE OS 15 inches (38,1 cm)
//     PUBLICADOS PELO SPARK PAWS "L" (B0CSK92SHQ), PELO LELEPET "Medium" (B0CM8XDBRY),
//     PELO DOGOPAL "S" (B0BKQY7XSF) E PELO B0D2XTBWYR "Medium".
//     Minimum weight recommendation:20 Pounds = 9,07 kg — DENTRO DA PROPRIA FAIXA "L: 7-11kg"
//     DO SPARK PAWS. E O BULLET 4 DA MESMA FICHA PROMETE "small puppies".
//     Chest size:17 Inches CONTRA Neck 16 in = 1 POLEGADA DE DIFERENCA (Spark Paws: 6; DOGOPAL: 5).
//   → 15 inches APARECE EM 4 MARCAS E 3 LETRAS DE TAMANHO (S, Medium, L). E DEFAULT DE CATALOGO.
//
// ─── EIXO 1: MEDIDA CHECAVEL ───
//   SO A ANCOL B00EIC1O9C PUBLICA COMPRIMENTO DE COSTAS + FAIXA DE TORAX EM CM
//   (title/bullet: length 60cm, girth 72-88cm). SNUGGET B0DDX7G8QN E VICE: FAIXA NO NOME DO
//   TAMANHO (XS:Chest 38-42CM), SEM COMPRIMENTO. AS DUAS PUBLICAM SO O TETO NA SPEC TABLE
//   (Ancol Chest size:88 / Snugget Chest size:42) — QUEM FILTRA VE O LIMITE, NAO A FAIXA.
//   4 DE 10 NAO PUBLICAM TORAX NENHUM: AXCIMOND x2, B0D2XTBWYR, DRYROBE (as duas mais bem
//   avaliadas e a mais cara).
//   AXCIMOND: A FICHA INTEIRA DE TAMANHO E UMA LETRA. SEM neck, SEM chest, SEM peso.
//   DRYROBE bullet 4: "body circumference between stated range" — A FAIXA NUNCA E DITA.
//
// ─── EIXO 2: CAPA DE CHUVA x CASACO DE INVERNO ───
//   COM FORRO PUBLICADO (5): Ancol (fleece lining), Axcimond M, Axcimond L, B0D2XTBWYR
//   (inner lining + Special feature:Padded), Dryrobe (Material:Fleece).
//   SO GOLA QUENTE, CORPO SEM FORRO (1): Lelepet (thick soft fur collar).
//   SEM ISOLAMENTO NENHUM (4): Spark Paws, Mile High Life, DOGOPAL, Snugget.
//   SNUGGET VENDE "Winter" NO TITULO MAS O BULLET 2 DIZ "waterproof coating and waterproof
//   lining" — FORRO IMPERMEAVEL, NAO QUENTE.
//   B0D2XTBWYR: TITULO DIZ Waterproof, BULLET 1 DIZ water-resistant. SEM campo Water resistance.
//   DRYROBE: BULLET DIZ waterproof, Special feature DIZ Weather Resistant.
//   CAMPO "Water resistance level" SO EM 4 DE 10 (Axcimond x2, Spark Paws, Snugget) — O FILTRO
//   DA PROPRIA AMAZON ESCONDERIA 6, INCLUSIVE A ANCOL DE 12.010 AVALIACOES.
//
// ─── EIXO 3: VESTIR E ONDE VAI A GUIA ───
//   ACESSO A GUIA PUBLICADO EM 5: Ancol (zippered harness slot), Lelepet (leash hole),
//   Snugget (sturdy D-ring — UNICA QUE DISPENSA O PEITORAL), DOGOPAL (built-in harness hole),
//   B0D2XTBWYR (harness hole). NAO PUBLICADO: Spark Paws, Axcimond x2, Dryrobe.
//   MILE HIGH LIFE DIZ SO "dog hole", SEM DIZER PARA QUE SERVE.
//   FECHO: velcro (Lelepet, Mile High Life) x fivela/zip (Axcimond, Spark Paws, Snugget,
//   B0D2XTBWYR, Dryrobe) — FIVELA GANHA EM CAO ENTRE DOIS TAMANHOS.
//
// ─── EIXO 4: SER VISTO AS 16h ───
//   9 DE 10 PUBLICAM REFLETIVO. DOGOPAL B0BKQY7XSF E A UNICA EXCECAO: BULLET 2 OFERECE
//   "high visibility, bright colours". COR VIVA NAO E RETRORREFLETIVA NO FAROL.
//
// ⚠ POOL DE AVALIACOES COMPARTILHADO: AXCIMOND B0DDKFS2B4 (M, £22.99) E B0DDKG2FCV (L, £24.99)
//   TEM A MESMA IMAGEM (61UMeThcf1L), OS MESMOS BULLETS, 4.6 E AS MESMAS 449 AVALIACOES.
//   O PROPRIO BULLET 5 DIZ 6 TAMANHOS S a 3XL — AS 449 COBREM ATE SEIS VARIANTES.
//   E AS DUAS FICHAS SE CONTRADIZEM: M publica Special feature "Waterproof, Reflective,
//   Adjustable, Fleece Lining"; L publica so "Reflective". Theme da L VEM COM AS ASPAS DE
//   ESCAPE AINDA NO VALOR.
//
// ⚠ LIXO DE CATALOGO (nao muda a compra, mas entra no texto):
//   Ancol Neck size:86 centimetres CONTRA Chest size:88 Centimetres, e Minimum weight
//   recommendation:0.01 Kilograms = 10 GRAMAS. Lelepet Occasion:Christmas, New Year.
//   DOGOPAL Occasion:Birthday, Holiday. B0D2XTBWYR Theme:Animals.
//   "Minimum weight recommendation" E PISO, NUNCA TETO, E FALTA EM 4 DE 10.
//
// ⚠ COMPARACAO QUE SO EXISTE EM PAR: DOGOPAL "S" Chest 20 Inches (50,8 cm) com minimo 5 kg
//   CONTRA LELEPET "Medium" Chest 18 Inches (45,72 cm) com minimo 30 Pounds (13,61 kg).
//   O MEDIUM E 5,08 cm MAIS ESTREITO E ACEITA CAO 8,61 kg MAIS PESADO.
//
// ⚠ TRADUCAO AUTOMATICA: Lelepet bullet 2 "magic sticker fasteners" (velcro).
//   Mile High Life bullet 2 "adjustable velcro and dog hole".
//
// ⚠ CLAIM DO FABRICANTE SEM SPEC POR TRAS: Spark Paws "Breatheshield technology regulates
//   temperature" (ficha sem lining, fill ou Material). Snugget "cross design reduces stress".
//
// PRECOS: 16,19 / 19,99 / 20,99 / 22,99 / 22,99 / 24,99 / 24,99 / 28,99 / 31,99 / 45,00.
// PROFUNDIDADE (FICHA): 12.010 / 2.505 / 1.658 / 1.231 / 1.002 / 449 / 449 / 367 / 363 / 21.
//   TOTAL 20.055; 19.606 TIRANDO AS 449 CONTADAS DUAS VEZES. ANCOL = 12.010/19.606 = 61,3%.
//   ANCOL / DRYROBE = 12.010/21 = 572x A EVIDENCIA, POR 64,0% MENOS DINHEIRO.
// NOTAS: 4.2 / 4.2 / 4.3 / 4.4 / 4.5 / 4.5 / 4.5 / 4.6 / 4.6 / 4.7 — AMPLITUDE 0,5.
//   A MAIOR NOTA TEM 21 AVALIACOES; AS SEGUNDAS MAIORES SAO O POOL COMPARTILHADO.
// (SEM PISO DE AVALIACOES — ver memoria feedback-ranked10-no-review-floor. O de 21 entra pelo
//  que E: o unico vendido em durabilidade, e o numero baixo esta reportado no card.)
//
// FOCUS KEYWORD: best dog coat
// VARIACOES: dog coat / waterproof dog coat / winter dog coat / dog raincoat / fleece lined dog
// coat / dog jacket / warm dog coat / reflective dog coat / best dog coats
// ═══════════════════════════════════════════════════════════════

return [
    'category' => 'pet-supplies',
    'slug' => 'best-dog-coat',
    'title' => 'Best Dog Coat 2026: 10 Waterproof Winter Coats Ranked',
    'meta_title' => 'Best Dog Coat 2026: 10 Waterproof Winter Coats',
    'meta_description' => 'The best dog coat picks for British winter walks. Ten waterproof and fleece-lined dog coats compared on real sizing, warmth and reflective detail.',
    'focus_keyword' => 'best dog coat',
    'published_at' => '2026-09-03 11:00:00',

    'intro' => "If you want the short answer, the Ancol Muddy Paws Stormguard is the best dog coat for most dogs: GBP 16.19, 12,010 ratings at 4.5 stars, a waterproof outer surface over a cosy fleece lining, and a girth range you can actually measure against — 72cm to 88cm on this XL. If your dog measures up as a medium, the fleece-lined Axcimond winter jacket at GBP 22.99 is the value alternative.

Then ignore the size letter on the label, because on this page it is a keyword rather than a measurement. The Mile High Life raincoat is sold as an X-Small, yet it publishes a neck size of 16 inches — a full inch bigger than the 15 inches printed by the Spark Paws Large, the Lelepet Medium and the DOGOPAL Small — and a minimum weight recommendation of 20 Pounds, which is 9.07kg, a figure that sits inside Spark Paws own band for a Large, 7 to 11kg. The fourth bullet on that same listing then promises it suits small puppies. So measure your dog first: chest girth behind the front legs, neck, and back length from collar to tail base. After that, three things decide the buy. Whether there is a fleece or padded lining under the waterproof layer, because a breathable raincoat does nothing on a cold dry January morning. Whether the lead has somewhere to go — a harness slot or a built-in D-ring — instead of running under the coat. And how much reflective material sits on the collar and sides, which is what car headlights catch on a four o'clock walk in December.",

    'conclusion' => "For most households the best dog coat here stays the Ancol Muddy Paws Stormguard. It is the cheapest coat on the page at GBP 16.19, it carries about 61 per cent of every rating across these ten listings, and it is one of only five that publishes a lining as well as a waterproof surface, so it covers both British winter problems rather than one. It is also the only listing that prints a back length and a chest girth range together, which is the difference between a coat that fits and a coat that goes back. If your dog is a medium and you want the highest score, the fleece-lined Axcimond at GBP 22.99 is the sensible second call.

Buy differently for shape, weather and hardware. A short-coated dog — a whippet or a greyhound — needs the lining more than the shell, so stay with numbers one, two and five and skip the raincoats entirely. If your walks are wet rather than cold, the full-coverage Spark Paws at four is the most thorough waterproof dog coat here. If your dog wears a harness, only the Ancol with its zippered slot and the Snugget with its built-in D-ring publish a proper answer, and only the Snugget removes the harness altogether. A dog that falls between two sizes is far better served by the adjustable buckles and straps on three, four and six than by the velcro-only coats at eight and ten. And if the coat will be dragged through hedges and hosed down twice a week, the GBP 45.00 Dryrobe is the only one sold on toughness — thin review sample and all.",

    'products' => [
        [
            'Ancol Muddy Paws Stormguard Coat, Chocolate, XL, 60cm Length, 72-88cm Girth',
            '£16.19', 4.5, 12010,
            'B00EIC1O9C',
            '61GghbaukkL',
            'best dog coat',
            'The best dog coat for most buyers at GBP 16.19: a waterproof surface over a fleece lining, a measurable 72-88cm girth range, and 12,010 ratings.',
            "Most of the evidence on this page sits on the cheapest coat here. The Ancol Muddy Paws Stormguard costs GBP 16.19 and carries 12,010 ratings at 4.5 stars, which is roughly 61 per cent of every rating across these ten listings and 572 times as many as the GBP 45.00 Dryrobe further down. Crucially it also does both winter jobs at once: the bullets publish a waterproof surface over a cosy fleece lining, where four of the coats here are rain shells with no insulation published at all.

It is also the only listing of the ten that gives you both a back length and a chest girth range to measure a dog against — 60cm long, to fit a girth of 72cm to 88cm on this XL. Everything else here publishes a single number or a letter. There is a zippered harness slot so the lead clips through the coat rather than dragging underneath it, reflective edges for a dark walk, a chest protector to keep the front of the dog clean and dry, and elasticated neck and leg straps.

Ignore its spec table completely. It lists an 86cm neck against an 88cm chest, which is not the shape of any dog, and a minimum weight recommendation of 0.01 kilograms, which is ten grams. Use the 72-88cm girth from the bullets instead. Two other honest notes: this is a coat rather than a suit, so the belly stays uncovered, and Ancol never fills in the water resistance field that Amazon own waterproof filter reads from, despite the waterproofing being in bullet two.",
            ['GBP 16.19, the cheapest coat on this page', '12,010 ratings at 4.5 stars, about 61 per cent of all ratings here', 'Waterproof surface AND a fleece lining, not one or the other', 'The only listing publishing a back length and a girth range together', 'Zippered harness slot, reflective edges and a chest protector'],
            ['Spec table is catalogue junk: 86cm neck against an 88cm chest', 'Minimum weight recommendation reads 0.01 kilograms, or ten grams', 'A coat, not a suit, so the belly stays uncovered', 'No water resistance field, so filters would hide it'],
            [
                'Customer ratings|12,010 at 4.5 stars|good|About 61 per cent of all ratings here',
                'Price|£16.19|good|The cheapest on this page',
                'Fit guide|Chest 72-88 cm, length 60 cm|good|From the bullets, not the spec table',
                'Lining|Fleece under a waterproof surface|good',
                'Spec table|Neck 86 cm against chest 88 cm|bad|Ignore it and measure instead',
            ],
        ],
        [
            'Axcimond Waterproof Dog Coat Winter Jacket, Fleece Lined, Reflective, Size M',
            '£22.99', 4.6, 449,
            'B0DDKFS2B4',
            '61UMeThcf1L',
            'Axcimond fleece lined waterproof winter dog coat',
            'The value winter coat at GBP 22.99: waterproof outer, fleece lining, warm collar and reflective strips, at the joint highest score on the page.',
            "At 4.6 stars this is the joint highest-rated coat on the page, and GBP 22.99 buys the whole winter package rather than half of it: a waterproof outer, a fleece lining, a warm collar and reflective strips on both the collar and the body. It pulls over the head and fastens with a single chest-strap buckle, which is quicker on a wriggling dog than four velcro tabs, and the range runs from S to 3XL so most dogs are covered.

The catch is the sizing disclosure. Its spec table publishes the letter M and nothing else — no neck size, no chest size, no minimum weight. That is the entire fit information on the page, so you are buying off the maker chart rather than a number you can check. Measure your dog before you order and read that chart carefully, because there is nothing here to fall back on.

Read the review count carefully too. Those 449 ratings are shared with the size L listing at number nine: same photograph, same bullets, same score, one pool of feedback shown twice rather than two coats with 449 reviews each. The listing own bullet also says the coat comes in six sizes, so the 449 spans up to six variants rather than describing the medium you are buying. Treat it as a single 449-rating product, which is still a fair sample at this price.",
            ['4.6 stars, the joint highest score on this page', 'Waterproof outer, fleece lining and a warm collar together', 'Reflective strips on the collar and the body', 'Pullover with one chest-strap buckle, quick on a fidgety dog', 'GBP 22.99, and six sizes from S to 3XL'],
            ['Spec table publishes only the letter M, no neck, chest or weight', 'The 449 ratings are shared with the size L listing at number nine', 'Those ratings span up to six size variants', 'No lead opening or harness slot published'],
            [
                'Average score|4.6 stars|good|Joint highest here',
                'Lining|Fleece, with a warm collar|good',
                'Price|£22.99|good',
                'Published sizing|Size M and nothing more|bad|No neck, chest or weight figure',
                'Customer ratings|449, shared with the size L|neutral|One pool shown twice',
            ],
        ],
        [
            'Snugget Waterproof Dog Coat with Harness Built In, Alloy Zip, Winter',
            '£20.99', 4.3, 367,
            'B0DDX7G8QN',
            '61+7vKdTuWL',
            'Snugget waterproof dog coat with built-in harness D-ring',
            'Coat and harness in one. A built-in D-ring, an alloy back zip and chest sizes published in centimetres, for GBP 20.99.',
            "This is the different idea on the shelf, and for some households the better one. A sturdy D-ring is built into the coat, so you stop layering a harness under a jacket every morning — it is the only coat here that removes the harness altogether rather than making room for one. An alloy zip runs along the back with an elastic belly panel, and the seams are described as strengthened.

It also has the most honest sizing here after the Ancol. The chest range is published in centimetres in the size name itself, 38 to 42cm on this XS, and bullet one tells you to measure chest, neck and back length before ordering rather than guessing from a letter. At GBP 20.99 it is the second cheapest coat on the page, and it is one of only four here that fills in the water resistance field.

Two things to weigh. The title sells winter, but the bullets publish a waterproof coating and a waterproof lining, with no fleece, padding or fill mentioned anywhere — this keeps a dog dry, not warm. And at 4.3 from 367 ratings it holds the second lowest score in this group. A D-ring sewn into a coat also puts any pulling through the coat seams instead of a proper harness, so it suits a dog that walks on a loose lead. The claim that the cross design reduces stress is the maker own wording, with no published figure behind it.",
            ['Built-in D-ring, the only coat here that replaces the harness', 'Chest range published in centimetres by size, 38-42cm on this XS', 'Bullet one tells you to measure chest, neck and back length', 'Alloy back zip, elastic belly panel and strengthened seams', 'GBP 20.99, the second cheapest here'],
            ['No fleece, padding or fill published, so it is a dry coat not a warm one', '4.3 from 367 ratings, the second lowest score here', 'A coat D-ring puts pulling through the seams, not a harness', 'Spec table shows a 30cm neck against a 42cm chest'],
            [
                'Lead attachment|Built-in D-ring|good|The only one here',
                'Fit guide|Chest 38-42 cm on this XS|good|Published as a range',
                'Price|£20.99|good|Second cheapest here',
                'Insulation|None published|bad|Waterproof lining, not a warm one',
                'Customer ratings|367 at 4.3 stars|neutral|Second lowest score here',
            ],
        ],
        [
            'Spark Paws Dog Raincoat, Waterproof and Windproof, Full Coverage',
            '£28.99', 4.5, 1658,
            'B0CSK92SHQ',
            '41KiDg5GIYL',
            'Spark Paws full coverage waterproof dog raincoat',
            'The wet-weather specialist: full-body waterproof and windproof coverage with side buckles, a neck wrap and a hind-leg toggle.',
            "If your problem is rain rather than cold, this is the most thorough answer on the page. The listing describes full-body coverage, waterproof and windproof, with an adjustable neck wrap to keep the neck dry, side buckles, reflective detailing and a toggle at the hind legs so the dog can relieve itself without soaking the coat. 4.5 stars from 1,658 ratings is a solid, unremarkable record.

It is one of only four listings here that populates the water resistance field, so it is among the few that survive Amazon own waterproof filter. The Breatheshield temperature claim in bullet three, however, is the maker own wording on a listing that publishes no lining, no fill and no material field, so read it as a claim rather than a tested figure.

Two reasons it sits fourth rather than higher. At GBP 28.99 there is no insulation published at all, so it adds nothing on a cold dry January morning — this is a second coat, not the only coat. And the sizing mixes units inside a single table: the size field reads L: 7-11kg while the measurements are a 15-inch neck and a 21-inch chest. A Large that tops out at 11kg is what most owners would call a small dog. On the other hand, that 6-inch gap between neck and chest is the most believable pair of measurements on the page. Check the chart twice, then buy.",
            ['Full-body waterproof and windproof coverage', 'Adjustable neck wrap, side buckles and a hind-leg toggle', '1,658 ratings at 4.5 stars', 'One of only four listings to publish a water resistance level', 'Neck 15 in against chest 21 in, the most believable pair here'],
            ['No lining, fill or material published, so no warmth on a dry cold day', 'GBP 28.99, the third dearest here', 'Size L is quoted as 7-11kg, which most owners would call small', 'No harness slot or lead opening published'],
            [
                'Coverage|Full body, waterproof and windproof|good',
                'Adjustment|Side buckles, neck wrap, hind-leg toggle|good',
                'Customer ratings|1,658 at 4.5 stars|good',
                'Insulation|None published|bad|A raincoat, not a winter coat',
                'Price|£28.99|bad|Third dearest here',
            ],
        ],
        [
            'Dryrobe Dog Coat, Extra Small, Black Camo and Pink, Fleece Lined',
            '£45.00', 4.7, 21,
            'B0CQK6Q7ZP',
            '71U6hw5gaWL',
            'Dryrobe fleece lined waterproof dog coat',
            'The buy-it-once option at GBP 45.00: fleece inner, waterproof windproof outer, reflective piping and the best score on the page.',
            "This is the one coat here bought for durability rather than price. A fleece inner lining sits under a waterproof and windproof outer, and the bullets sell it explicitly on wear and tear rather than on comfort, with reflective piping and six sizes with adjustable straps. At 4.7 it holds the best score on the page.

It is also the only listing that sizes by body length, up to 31cm on this extra small, which is a far easier measurement to take on a fidgety dog than a chest girth. Useful, but incomplete: bullet four then says the body circumference should fall between the stated range without ever stating it, and the listing publishes no neck size, no chest size and no minimum weight. That is the whole fit disclosure on a GBP 45.00 coat.

Three honest caveats. That 4.7 rests on 21 ratings, an early sample and no more, where the Ancol at number one has 572 times as much feedback for 64 per cent less money. The spec table also softens its own bullet: where bullet one says waterproof, the special feature field says weather resistant. And no harness slot or lead opening is published anywhere, so if your dog wears a harness under the coat, check that before ordering.",
            ['4.7 stars, the highest score on this page', 'Fleece inner lining under a waterproof and windproof outer', 'Sold on toughness and wear and tear, not on price', 'Sizes by body length in centimetres, easier to measure than girth', 'Reflective piping, six sizes with adjustable straps'],
            ['Only 21 ratings, by far the smallest sample here', 'The girth range the sizing bullet refers to is never stated', 'Special feature says weather resistant where the bullet says waterproof', 'No harness slot or lead opening published'],
            [
                'Average score|4.7 stars|good|The highest here',
                'Customer ratings|21|bad|The smallest sample on this page',
                'Build|Fleece inner, waterproof windproof outer|good',
                'Fit guide|Body length up to 31 cm|neutral|The girth range is never stated',
                'Price|£45.00|bad|Nearly three times the Ancol',
            ],
        ],
        [
            'Medium Dog Coat, High Fleece Collar, Padded, Adjustable Buckles',
            '£24.99', 4.4, 1002,
            'B0D2XTBWYR',
            '71dNx7SR9SL',
            'padded dog coat with high fleece neck collar',
            'The warmest neck here: a high fleece collar over a padded body, with belly buckles, reflective stripes and a harness hole.',
            "Most coats leave the throat bare, which is exactly where a short-coated dog feels the wind first. This one puts a high fleece collar there, over a padded outer and an inner lining, and fastens with adjustable buckles on the belly rather than velcro, which copes far better with a dog that falls between two sizes. There are reflective stripes, a harness hole and six sizes from S to 3XL, for GBP 24.99 with 1,002 ratings at 4.4 stars.

The wording is the problem. The title says waterproof; bullet one says the outer layer is water-resistant fabric. Those are not the same promise, and the listing never fills in the water resistance field that would settle it. For a warm dog coat expected to survive a British December, that is a genuine step down from the Ancol and the Axcimond above it.

The spec table gives a 15-inch neck and no chest measurement whatsoever, which is the single number you most need before ordering. That 15-inch neck also turns up on three other brands here, across sizes S, Medium and Large, which marks it as a catalogue default rather than a measurement of this coat. The theme field, meanwhile, reads Animals, on a dog coat.",
            ['High fleece neck collar, the warmest throat on this page', 'Padded outer with an inner lining published', 'Adjustable belly buckles suit a dog between two sizes', 'Reflective stripes and a harness hole', 'Six sizes from S to 3XL, 1,002 ratings at 4.4 stars'],
            ['Title says waterproof, bullet one says water-resistant', 'No water resistance level published to settle it', 'Publishes a 15-inch neck and no chest measurement at all', 'The same 15-inch neck appears on three other brands here'],
            [
                'Collar|High fleece neck collar|good|The warmest neck here',
                'Fastening|Adjustable belly buckles|good',
                'Customer ratings|1,002 at 4.4 stars|neutral',
                'Water resistance|Title says waterproof, bullet says water-resistant|bad',
                'Published sizing|Neck 15 inches, no chest figure|bad',
            ],
        ],
        [
            'DOGOPAL Dog Raincoat, Lightweight, Collar and Harness Compatible',
            '£22.99', 4.2, 1231,
            'B0BKQY7XSF',
            '81L5tmyM+pL',
            'DOGOPAL lightweight waterproof dog raincoat',
            'A bright shoulder-season rain shell with adjustable chest and leg straps and a built-in harness hole, backed by 1,231 ratings.',
            "A simple, light rain layer in deliberately bright colours, with adjustable chest and leg straps, a built-in harness hole and stated compatibility with both a collar and a harness. 1,231 ratings is a real sample. For a thick-coated dog that overheats in anything padded, a shell like this is often all that is wanted in October.

It is the only coat of the ten that publishes no reflective element at all. The listing offers high visibility through bright colour instead, and bright colour is not the same thing as retroreflective material caught in a headlight at half past four in the afternoon. Every other coat here publishes a reflective strip, edge or piping, so this is the one to think twice about for dark lanes.

Price is the other reason it sits here. No lining is published anywhere, so it is an autumn shower coat rather than a winter one, yet it costs GBP 22.99 — exactly the same as the fleece-lined Axcimond at number two. The sizing is imperial again, a 15-inch neck and a 20-inch chest on a size S with a 5kg minimum, and that chest is two full inches wider than the Lelepet Medium below while claiming a minimum weight 8.6kg lighter. The occasion field, on a raincoat, reads Birthday, Holiday.",
            ['Built-in harness hole, compatible with a collar and a harness', 'Adjustable chest and leg straps', '1,231 ratings, a real sample', 'Lightweight shell suits a thick-coated dog that overheats', 'Publishes both a neck and a chest measurement'],
            ['The only coat here with no reflective element published', '4.2 stars, the joint lowest score on this page', 'No lining published, so it is a shower coat not a winter coat', 'Chest 20 inches on a size S, wider than a rival Medium'],
            [
                'Lead access|Built-in harness hole|good|Collar and harness compatible',
                'Visibility|Bright colours, no reflective element|bad|The only one here without',
                'Average score|4.2 stars|bad|Joint lowest here',
                'Insulation|None published|bad',
                'Price|£22.99|neutral|The same as the fleece-lined Axcimond',
            ],
        ],
        [
            'Lelepet Warm Waterproof Winter Dog Coat for Medium Dogs, Fur Collar',
            '£31.99', 4.5, 363,
            'B0CM8XDBRY',
            '61IMX5pjXiL',
            'Lelepet warm waterproof winter dog coat with fur collar',
            'The plush one: a thick fur collar over windproof waterproof polyester, with reflective strips, a leash hole and ten colours.',
            "The most comfort-led coat here. A thick soft fur collar sits over windproof, waterproof polyester, with high-visibility reflective strips, a leash hole, six sizes and ten colours to choose from. It fastens with velcro tabs along the back, which is the quickest system of all on a dog that will not stand still, and 4.5 stars is a respectable score.

Be clear about what that fur collar is and is not. It is a collar, not a lining or a fill — the bullets publish no lined body at all, so this is a shell with a warm neck rather than a fleece-lined winter coat like the Axcimond or the Dryrobe. Worth knowing before paying GBP 31.99, the second highest price on the page, on only 363 ratings.

The sizing then argues with itself. This Medium publishes an 18-inch chest, about 46cm, with a minimum weight recommendation of 30 Pounds, near 13.6kg — and a 13.6kg dog does not fit a 46cm chest. The DOGOPAL Small above it publishes a chest two inches wider at a minimum weight 8.6kg lighter. Velcro also clogs with fur and loses grip across a winter, the occasion field reads Christmas, New Year on a functional waterproof, and bullet two calls the velcro magic sticker fasteners, which is a fair signal of how carefully the rest was written.",
            ['Thick soft fur collar, warm at the throat', 'Windproof and waterproof polyester shell', 'High-visibility reflective strips and a leash hole', 'Velcro tabs are the fastest fastening here on a restless dog', 'Six sizes from S to 3XL and ten colours'],
            ['No lined body published, only a warm collar', 'GBP 31.99, the second dearest here, on only 363 ratings', 'Medium publishes an 18-inch chest with a 30 lb minimum weight', 'Velcro clogs with fur and loses grip over a winter'],
            [
                'Collar|Thick soft fur|good',
                'Fastening|Velcro tabs along the back|neutral|Fast, but clogs with fur',
                'Published sizing|Chest 18 inches with a 30 lb minimum|bad|About 46 cm for a 13.6 kg dog',
                'Price|£31.99|bad|Second dearest here',
                'Customer ratings|363 at 4.5 stars|neutral',
            ],
        ],
        [
            'Axcimond Waterproof Dog Coat Winter Jacket, Fleece Lined, Reflective, Size L',
            '£24.99', 4.6, 449,
            'B0DDKG2FCV',
            '61UMeThcf1L',
            'Axcimond fleece lined winter dog coat in size large',
            'The same jacket as number two, sized L for GBP 24.99 — but the same 449 ratings counted a second time.',
            "If your dog measures up as a large, this is the listing that fits, and on its merits as a coat it is a strong buy. It is the same fleece-lined, waterproof, reflective jacket that finished second, with the same warm collar, the same reflective strips and the same pullover chest-strap buckle, for GBP 24.99.

It sits down here because it brings no independent evidence of its own. Same photograph, same bullets, same 4.6 stars and the same 449 ratings counted a second time. The size step costs GBP 2.00 over the medium at number two, and between them the two listings look like 898 ratings when there are 449.

The two listings also disagree about what the coat is. The medium publishes a special feature of waterproof, reflective, adjustable and fleece lining; this one publishes reflective alone, dropping the waterproofing, the adjustability and the lining from its own feature list. Its theme field is unedited template text with the escape quotes still in the published value. Same coat, worse listing — and, as on the medium, the entire sizing disclosure is a single letter.",
            ['The same fleece-lined waterproof jacket as number two', 'Warm collar, reflective strips and a chest-strap buckle', '4.6 stars, joint highest score on this page', 'The size that actually fits a large dog', 'GBP 24.99, only GBP 2.00 over the medium'],
            ['The 449 ratings are the medium listing pool counted again', 'Special feature drops waterproof, adjustable and fleece lining', 'Theme field is unedited template text', 'Spec table publishes the letter L and nothing else'],
            [
                'Coat itself|The same jacket as number two|good',
                'Price|£24.99|neutral|GBP 2.00 over the size M',
                'Customer ratings|449, the same pool as the M|bad|Counted a second time',
                'Special feature|Reflective only|bad|The M listing also claims waterproof and fleece lining',
                'Spec table|Theme left as template text|bad|It publishes Activity" or "Outdoor',
            ],
        ],
        [
            'Mile High Life Dog Raincoat, Adjustable Waterproof, Lightweight',
            '£19.99', 4.2, 2505,
            'B09DSGZWKM',
            '51Qnvvmf8vL',
            'Mile High Life lightweight adjustable waterproof dog raincoat',
            'The cheapest light raincoat here at GBP 19.99, with 2,505 ratings — and the least trustworthy sizing on the page.',
            "GBP 19.99 buys a lightweight, breathable waterproof with velcro adjustment and a reflective stripe for night visibility, backed by 2,505 ratings, the second largest sample in this group. For summer showers, or a heavy-coated dog that will not tolerate anything lined, it still earns a place on the page.

It is last for three specific reasons, and the sizing is the first. This is sold as an X-Small, yet it publishes a minimum weight recommendation of 20 Pounds. That is 9.07kg, a figure that sits inside the Spark Paws band for a Large, 7 to 11kg. Its 16-inch neck is a full inch bigger than the 15 inches printed by the Spark Paws Large, the Lelepet Medium and the DOGOPAL Small, and it sits just one inch under its own 17-inch chest, where Spark Paws leaves six inches between the two. Bullet four then promises the coat supports all sizes from small puppies upwards, on a listing whose own spec sets a 9.07kg floor.

The other two reasons are simpler. 4.2 is the joint lowest rating here despite the big sample, and no lining, fill or padding is published anywhere, so this dog raincoat does nothing on a cold dry British morning. Velcro fastening also weakens as fur works into it, and bullet two mentions a dog hole without ever saying what the hole is for. If you buy it, buy it as a shower coat and measure the dog yourself.",
            ['GBP 19.99, the second cheapest coat on this page', '2,505 ratings, the second largest sample here', 'Lightweight and breathable, good for a dog that overheats', 'Reflective stripe published for night visibility', 'Velcro adjustment is quick to fit'],
            ['X-Small carries a minimum weight recommendation of 20 lb, or 9.07kg', 'Bullet four promises small puppies on that same listing', 'Neck 16 inches against a 17-inch chest, one inch apart', 'No lining published, so it is no use in winter'],
            [
                'Customer ratings|2,505 at 4.2 stars|neutral|Big sample, joint lowest score',
                'Price|£19.99|good|Second cheapest here',
                'Published sizing|X-Small with a 20 lb minimum|bad|That is 9.07 kg',
                'Measurements|Neck 16 inches against chest 17 inches|bad|One inch apart',
                'Insulation|None published|bad|A shower coat, not a winter coat',
            ],
        ],
    ],
];
