<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class PortableSsdsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE SSDs PORTATEIS DE FORMA IDEMPOTENTE (NAO DUPLICA)
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        //
        // COLETA: AMAZON.CO.UK EM 29/08/2026, ENTREGA EM MANCHESTER M4 6BD.
        // BUSCA: /s?k=portable+ssd+external+1tb&rh=p_36%3A5000-  (20 ASINS EM 22 CARDS)
        // CATEGORIA TECH. TODOS OS DEZ SAO 1 TB, PARA COMPARAR PRECO DIRETO.
        //
        // ─── ACHADO PRINCIPAL: A VELOCIDADE NAO CABE NA INTERFACE ───
        // 1. UM SSD EXTERNO NUNCA E MAIS RAPIDO QUE O CABO. OS TETOS SAO FIXOS:
        //      USB 3.2 GEN 1 ..... 5 Gbps  → 500 MB/s TEORICO, ~450 REAL
        //      USB 3.2 GEN 2 ..... 10 Gbps → 1.212 MB/s TEORICO, ~1.050 REAL
        //      USB 3.2 GEN 2x2 ... 20 Gbps → 2.424 MB/s TEORICO, ~2.000 REAL
        //    (GEN 1 USA CODIFICACAO 8b/10b E OS DEMAIS 128b/132b, DAI A PERDA.)
        //    CRUZANDO A VELOCIDADE ANUNCIADA COM A INTERFACE QUE O PROPRIO ANUNCIO NOMEIA:
        //      SAMSUNG T9 ....... 2.000 MB/s · GEN 2x2 ... CABE ✓
        //      FIKWOT FP80 ...... 2.050 MB/s · GEN 2x2 ... CABE ✓
        //      SANDISK EXTREME .. 1.050 MB/s · (GEN 2) ... CABE ✓
        //      KINGSTON XS1000 .. 1.050 MB/s · GEN 2 ..... CABE ✓
        //      LEXAR ES3 ........ 1.050 MB/s · GEN 2 ..... CABE ✓
        //      SANDISK PORTABLE .. 800 MB/s · USB 3.2 .... CABE ✓
        //      BIWIN PD450 ........ 430 MB/s · GEN 1 ..... CABE ✓
        //      CRUCIAL X10 ...... 2.100 MB/s · "GEN2" .... 173% DO TETO TEORICO ✗
        //      FANXIANG PS2100 .. 2.000 MB/s · "GEN2" .... 165% DO TETO TEORICO ✗
        // 2. O CASO DA CRUCIAL E O MAIS IMPORTANTE PORQUE NAO E MARCA DE FUNDO DE QUINTAL.
        //    E A MICRON, UMA DAS TRES MAIORES FABRICANTES DE MEMORIA DO MUNDO, E O TITULO
        //    DELA DIZ "Up to 2100MB/s, USB-C 3.2 Gen2". OU O DRIVE E GEN 2x2 E O TITULO
        //    NOMEIA A GERACAO ERRADA, OU A VELOCIDADE NAO EXISTE. A FANXIANG COMETE O
        //    MESMO ERRO EXATO. QUANDO UMA FABRICANTE DE MEMORIA ERRA A PROPRIA
        //    NOMENCLATURA, O PROBLEMA E A NOMENCLATURA.
        // 3. E A NOMENCLATURA E O SEGUNDO ACHADO. GEN 1, GEN 2 E GEN 2x2 SAO 5, 10 E 20
        //    Gbps — UMA FAIXA DE 4x — E AS TRES SE CHAMAM "USB 3.2". A BIWIN VENDE UM
        //    DRIVE "USB 3.2" DE 430 MB/s E A SAMSUNG UM "USB 3.2" DE 2.000 MB/s. O NOME
        //    NAO INFORMA NADA SEM O SUFIXO.
        //
        // ─── ACHADO SECUNDARIO: O CAMPO "Hard disk interface" ESTA ERRADO EM TODOS ───
        // 4. NENHUM DOS DEZ POE A GERACAO USB NO CAMPO QUE DEVERIA TER ELA:
        //      SANDISK EXTREME .. "NVMe"    (BARRAMENTO INTERNO, NAO O EXTERNO)
        //      SAMSUNG T7 ....... "USB 3.0" (O TITULO DIZ GEN 2)
        //      BIWIN / FIKWOT ... "USB 3.0"
        //      CRUCIAL / KINGSTON "USB-C"   (E UM FORMATO DE PLUGUE, NAO UM PROTOCOLO —
        //                                   UMA PORTA USB-C RODA DE 480 Mbps A 40 Gbps)
        //      SAMSUNG T9 / SANDISK PORTABLE / LEXAR / FANXIANG .. "USB 3.2" SEM GERACAO
        //    E EXATAMENTE O CAMPO QUE UM COMPRADOR ABRE PARA RESOLVER A DUVIDA, E DEZ EM
        //    DEZ O DEIXAM INUTIL.
        //
        // ─── OUTROS ACHADOS ───
        // 5. A LEXAR E A UNICA DAS DEZ QUE AVISA QUE A VELOCIDADE DEPENDE DO SEU
        //    COMPUTADOR: "(Performance may be lower if not supporting USB 3.2 Gen 2 on Mac
        //    and other systems)". E A INFORMACAO MAIS UTIL DA CATEGORIA — UM DRIVE DE
        //    2.000 MB/s NUMA PORTA GEN 1 ENTREGA 450 — E SO ELA DIZ.
        // 6. A BIWIN AVISA QUE PODE MANDAR A VERSAO MAIS LENTA: "[Warm Note] This product
        //    has been upgraded (read speed up to 560MB/s...). Due to mixed FBA inventory,
        //    YOU MAY RECEIVE THE ORIGINAL 430MB/s VERSION. Both versions of speed are
        //    genuine". E UMA CANDURA RARA E TAMBEM UM RISCO DECLARADO: 30% DE DIFERENCA
        //    DE DESEMPENHO NO MESMO PRECO, DECIDIDA PELO ESTOQUE.
        // 7. A FICHA DA SAMSUNG T7 — 40.678 AVALIACOES, 4.7, A MAIOR NOTA DA BUSCA — TEM
        //    QUATRO BULLETS QUE SAO ROTULOS DE CAMPO COPIADOS: "Connectivity technology:
        //    Nein", "Compatible devices: desktop", "Security: password protection".
        //    "Nein" E ALEMAO PARA "NAO". E O CAMPO DE FORMATO DIZ "0.31 Inches".
        // 8. A SANDISK PORTABLE (11.060 AVALIACOES, £124.99) TEM EXATAMENTE UM BULLET, E
        //    ELE NAO CONTEM NENHUMA ESPECIFICACAO: "From SanDisk, a brand professional
        //    photographers trust to take on assignments". A VELOCIDADE DE 800 MB/s SO
        //    APARECE NO TITULO.
        // 9. NENHUM DOS DEZ PUBLICA VELOCIDADE DE ESCRITA SUSTENTADA. TODO SSD DE CONSUMO
        //    USA UM CACHE SLC QUE, QUANDO ENCHE, DERRUBA A ESCRITA PARA UMA FRACAO DO
        //    NUMERO ANUNCIADO — E ISSO ACONTECE JUSTAMENTE AO COPIAR OS ARQUIVOS GRANDES
        //    QUE FAZEM ALGUEM COMPRAR UM SSD PORTATIL. E O NUMERO QUE FALTA EM DEZ DE DEZ.
        // 10. A FIKWOT PROMETE SER "about 2-6 times higher than other portable ssds" E O
        //    PROPRIO BULLET E TRUNCADO NO MEIO DE UMA RESSALVA: "*Please note: Due to the
        //    l". TAMBEM DECLARA "Hard disk form factor: 10 Centimetres" E TEM 3.9 — A
        //    UNICA NOTA ABAIXO DE 4.0 DA LISTA.
        // 11. A BUSCA E POLUIDA POR DISCO RIGIDO: A MODUSTECH (2.800 AVALIACOES, £52.91) E
        //    A TOSHIBA CANVIO (12.500, £69.99) SAO HDD MECANICOS APARECENDO EM "portable
        //    ssd", E A ACER PREDATOR GM7 (2.400) E UM M.2 INTERNO, NAO PORTATIL.
        //
        // ─── CRITERIO DE CORTE ───
        // FORA: OS HDD E O M.2 INTERNO ACIMA; O SEGUNDO ASIN DA SANDISK EXTREME
        // (B0C59G4TLQ, 7.500 AVALIACOES) E O SEGUNDO DA LEXAR ES3 (B0F37WWYY4, 514);
        // BIWIN PR2000 (265), NETAC (39), EDILOCA (38), ACER PA100 (23).
        // DENTRO: NOTA DE 3.9 A 4.7, PRECO DE £113.99 A £185.00, OITO MARCAS, TODOS 1 TB.
        //
        // FOCUS KEYWORD: best portable ssd
        // VARIACOES TRABALHADAS: portable ssd uk / external ssd 1tb /
        // usb 3.2 gen 2 vs gen 2x2 / fastest portable ssd / ssd for ps5 /
        // portable ssd for mac / external solid state drive /
        // why is my external ssd slow / rugged portable ssd
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'tech',                       // SLUG DA CATEGORIA (URL)
            'name' => 'Tech',                       // NOME EXIBIDO
            'description' => 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.', // DESCRICAO (MANTIDA IGUAL A EXISTENTE)
        ];

        $article = [
            'slug' => 'best-portable-ssd',                                          // SLUG DO ARTIGO (URL) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'title' => 'Best Portable SSD 2026: 10 Ranked on Speeds That Fit the Cable', // TITULO / H1 - ATRATIVO PARA CLIQUE, CONTEM A FOCUS KEYWORD
            'meta_title' => 'Best Portable SSD 2026: Top 10 Ranked and Compared',    // TITLE DA ABA/GOOGLE (50 CHARS) - CONTEM A FOCUS KEYWORD, SEM "UK"
            'meta_description' => 'We ranked the best portable SSD options on Amazon by checking each speed claim against the USB generation it names, comparing 1TB drives from £113.99.', // META DESCRIPTION (151 CHARS) - CONTEM A FOCUS KEYWORD + KEYWORDS SECUNDARIAS
            'focus_keyword' => 'best portable ssd',                                 // PALAVRA-CHAVE PRINCIPAL - VIRA O ALT DO HERO/OG:IMAGE
            'intro' => "An external drive can never be faster than the cable it plugs into, and the ceilings are fixed. USB 3.2 Gen 1 carries 5 gigabits a second, which after protocol overhead is about 450 megabytes a second in practice. Gen 2 carries 10 gigabits, or roughly 1,050 MB/s. Gen 2x2 carries 20 gigabits, or roughly 2,000. All three are called USB 3.2, which is where the trouble starts — and two listings in this comparison advertise a speed their own named interface cannot carry. The Crucial X10 says up to 2,100 MB/s over USB-C 3.2 Gen2, and Gen 2 tops out at 1,212 MB/s even in theory, so the claim is 173% of a ceiling that physics sets. That is Micron, one of the three largest memory manufacturers on earth, and a no-name rival makes the identical error two rows down. Meanwhile the specification field labelled Hard disk interface, which is exactly where a buyer looks to settle this, says NVMe on one drive, USB 3.0 on three, and USB-C — a plug shape, not a protocol — on two more. Below we rank the best portable SSD options on Amazon in August 2026, all 1TB, by whether the number on the box fits the wire.", // INTRO OTIMIZADA - FOCUS KEYWORD 2X + VARIACOES
            'conclusion' => "Choosing the best portable SSD starts with your laptop, not the drive. Find out which USB generation your port actually supports, because a 2,000 MB/s drive in a Gen 1 socket delivers about 450 and the money is wasted — only one listing in this comparison warns you about that, and it is the one worth reading twice. Then match the drive: Gen 2 and around 1,050 MB/s is the sweet spot for almost everybody, Gen 2x2 and 2,000 MB/s is for video editors moving hours of 4K, and Gen 1 at 430 MB/s is not worth buying at these prices when £8 more buys twice the speed. Crucially, sanity-check the pairing yourself, because two drives here advertise speeds their stated interface cannot carry and one of them comes from a major memory manufacturer. And be aware of the number nobody publishes: every consumer SSD uses a fast SLC cache that empties into slower storage once it fills, so sustained write speed on a large transfer is a fraction of the headline — which is precisely the job you bought the drive for. Ten of ten listings here are silent on it.", // CONCLUSAO OTIMIZADA - FOCUS KEYWORD 2X + CONECTIVOS
            'author' => 'Felipe Iglesias',                                          // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => '2026-08-29 16:30:00', // DATA DE PUBLICACAO FIXA — NAO USAR now(): RE-RODAR O SEEDER RESETARIA A DATA
        ];

        $products = [
            [
                'position' => 1,                                                                    // POSICAO NO RANKING
                'name' => 'Samsung T9 Portable SSD 1TB, USB 3.2 Gen 2x2, 2000MB/s, 122g',            // NOME (ENCURTADO DO TITULO DA AMAZON)
                'price' => '£185.00',                                                               // PRECO (COLETADO EM 29/08/2026)
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 2134,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/81h4TB6W9YL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'best portable ssd',                                                  // ALT = FOCUS KEYWORD (PRODUTO #1 E O QUE APARECE NO HERO/OG:IMAGE)
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CGQ466W8?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The best portable SSD here because the arithmetic works: 2,000 MB/s over USB 3.2 Gen 2x2, which is the one interface on this page that can actually carry it.', // TEXTO CURTO (CARD) - FOCUS KEYWORD
                'body' => "Two thousand megabytes a second, over USB 3.2 Gen 2x2. Twenty gigabits a second is about 2,400 MB/s in theory and 2,000 to 2,100 in practice, so Samsung is claiming essentially the full capability of the interface it names and not a byte more. Two drives on this page claim similar speeds over Gen 2, which carries half the bandwidth. That is the difference between a specification and a number, and it is why this finishes first at 4.7 stars.

The rest of the listing is specified the way a company that expects to be held to it specifies things. One hundred and twenty-two grams. Eighty-eight by sixty by fourteen millimetres. Three metre drop resistance. A five-year limited warranty, the longest here. Two cables in the box, C-to-C and C-to-A, so it works with an older laptop out of the bag. And a Dynamic Thermal Guard, which matters more than it sounds — sustained transfers heat a drive until it throttles, and thermal management is the difference between 2,000 MB/s for ten seconds and 2,000 MB/s for a whole card dump.

Two things. At £185.00 this is the most expensive drive in the comparison by £34.09, and Gen 2x2 is only useful if your computer has a Gen 2x2 port — a fair number of laptops, including every Mac, do not, in which case you will get Gen 2 speeds and should buy a Gen 2 drive for £40 less. And the specification field gives the interface as USB 3.2 with no generation, which on the one listing that gets the pairing right is a shame.", // TEXTO SEO LONGO - FOCUS KEYWORD
                'pros' => ['2,000 MB/s over Gen 2x2, the only interface on this page that can carry it', 'Publishes weight, dimensions, drop rating and warranty in full', 'Five-year limited warranty, the longest in this comparison', 'Dynamic Thermal Guard to hold speed through long transfers', 'Both C-to-C and C-to-A cables included'], // PONTOS POSITIVOS
                'contras' => ['£185.00, the most expensive drive in this comparison', 'Gen 2x2 is wasted on a laptop without a Gen 2x2 port, including all Macs', 'Specification field gives the interface as USB 3.2 with no generation', 'No sustained write figure, like every drive here'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                                                    // POSICAO NO RANKING
                'name' => 'SanDisk Extreme Portable SSD 1TB, 1050MB/s Read, IP65, 3m Drop',          // NOME (ENCURTADO)
                'price' => '£150.91',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 80476,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61zuR3UMnWL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'SanDisk Extreme Portable SSD 1TB in black with carabiner loop',      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B08GTYFC37?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Eighty thousand ratings, more than every other drive on this page combined, on a 1,050 MB/s figure that sits exactly where a Gen 2 interface can deliver it.', // TEXTO CURTO (CARD)
                'body' => "Eighty thousand four hundred and seventy-six ratings at 4.6 stars is more evidence than every other drive in this comparison put together, and it has been earned over years rather than months. The speed claim is 1,050 MB/s read and 1,000 write, which is exactly what a USB 3.2 Gen 2 connection delivers in practice — no gap between the marketing and the wire.

What you are paying the premium for is the shell. IP65 dust and water resistance, three metre drop protection, a silicone exterior and a carabiner loop, which together make this the drive you put in a camera bag rather than a laptop sleeve. There is 256-bit AES hardware encryption with password protection, which is the right implementation — done on the drive rather than in software you have to remember to run.

Two things to note, both about the specification table rather than the product. The interface field says NVMe, which is the internal bus between the controller and the flash, not the external connection that determines the speed you experience; the number you actually need, the USB generation, appears nowhere. And the form factor field says 2.5 inches, which is the size of a laptop hard drive and not of this object. At £150.91 it is also £28.42 more than the Lexar at number three for the same 1,050 MB/s, and what that money buys is the ruggedising rather than the performance.", // TEXTO SEO LONGO
                'pros' => ['80,476 ratings, more than every other drive here combined', '1,050 MB/s read and 1,000 write, exactly what Gen 2 delivers', 'IP65 dust and water resistance with three metre drop protection', '256-bit AES hardware encryption done on the drive', 'Carabiner loop and silicone shell for camera bag use'], // PONTOS POSITIVOS
                'contras' => ['Interface field says NVMe, which is the internal bus not the USB link', 'Form factor field says 2.5 inches, which this is not', '£28.42 more than a drive here with the same speed', 'No USB generation stated anywhere in the specification'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                                                    // POSICAO NO RANKING
                'name' => 'Lexar ES3 Portable SSD 1TB, USB 3.2 Gen 2, 1050MB/s, 42g, 10.5mm',        // NOME (ENCURTADO)
                'price' => '£122.49',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 1634,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/51xD2RTskKL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Lexar ES3 ultra slim portable SSD 1TB',                              // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DFY3K6L9?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only listing of ten that tells you the speed depends on your computer, and the thinnest and lightest drive here at 42 grams and 10.5 millimetres.', // TEXTO CURTO (CARD)
                'body' => "In brackets at the end of the first bullet, Lexar writes the sentence this whole article exists to make: performance may be lower if not supporting USB 3.2 Gen 2 on Mac and other systems. That is the single most useful piece of information in the category. A drive is only as fast as the port it is plugged into, a great many laptops and every Mac without Thunderbolt run these drives below their rating, and nine listings on this page let you find that out for yourself after the money has changed hands.

The drive is also the most portable here by a distance: 42 grams and 10.5 millimetres thick, smaller than a credit card and thinner than a pencil, which for something that lives in a jacket pocket matters more than a hundred megabytes a second. The speed is 1,050 read and 1,000 write over Gen 2, which is the correct pairing, and there is 256-bit AES encryption through Lexar DataShield. At £122.49 it is £28.42 cheaper than the SanDisk above it for identical throughput.

Two caveats. There is no ruggedising at all — no IP rating, no drop protection, no silicone — so this is a drive for a pocket rather than a building site, and the SanDisk is what the extra money buys. And a final bullet notes that MagSafe is not available in this version, which implies a MagSafe variant exists; if you wanted to stick it to the back of an iPhone, check which one you are ordering.", // TEXTO SEO LONGO
                'pros' => ['The only listing that warns your port may cap the speed', '42g and 10.5mm, by far the most portable drive in this comparison', '1,050 read and 1,000 write over Gen 2, correctly paired', '256-bit AES encryption via Lexar DataShield', '£28.42 cheaper than the SanDisk for identical throughput'], // PONTOS POSITIVOS
                'contras' => ['No IP rating, drop protection or protective shell of any kind', 'A MagSafe variant exists and this is not it', '1,634 ratings is modest beside the two above it', 'Interface field says USB 3.2 with no generation'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                                                    // POSICAO NO RANKING
                'name' => 'Kingston XS1000 Portable SSD 1TB, USB 3.2 Gen 2, 1050MB/s',               // NOME (ENCURTADO)
                'price' => '£142.14',                                                               // PRECO
                'rating' => 4.6,                                                                    // NOTA
                'reviews_count' => 4558,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71NNxdF5D6L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Kingston XS1000 pocket-sized external SSD in black',                 // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0CCQB7BN7?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Four bullets, no marketing, and the only one here that bothers to warn you the rubber sleeves are sold separately — with the speed correctly paired to Gen 2.', // TEXTO CURTO (CARD)
                'body' => "The entire listing is four lines. Compact pocket-sized form factor. Speeds up to 1050MB/s with USB 3.2 Gen 2. Increased storage up to 2TB. Rubber sleeves are not included in the pack and are sold separately. That is it — no adjectives, no claims about photographers, and the speed stated next to the interface that produces it, which on this page counts as a virtue. Four thousand five hundred and fifty-eight ratings at 4.6 stars.

The fourth bullet deserves particular credit. Kingston sells protective sleeves for this drive, the product photography shows them, and rather than let you assume they are in the box the listing tells you they are not. That is the kind of small honesty that costs a manufacturer sales and is worth rewarding, and it is a pattern we keep finding: the listings that volunteer the awkward detail are usually the ones whose headline numbers also survive checking.

Two things hold it at four. At £142.14 it costs £19.65 more than the Lexar for the same 1,050 MB/s and without the Lexar's 42-gram body or its port warning, so on value it is beaten within its own speed class. And the specification field gives the interface as USB-C, which is a connector shape rather than a protocol — a USB-C port can run anywhere from 480 megabits to 40 gigabits a second, so the field tells a buyer nothing. The bullet gets it right; the table does not.", // TEXTO SEO LONGO
                'pros' => ['States 1,050 MB/s next to the Gen 2 interface that delivers it', 'Discloses that the rubber sleeves are sold separately', 'Four bullets with no marketing padding at all', '4,558 ratings at 4.6 stars', 'Pocket-sized with capacities up to 2TB'], // PONTOS POSITIVOS
                'contras' => ['£19.65 more than the Lexar for identical throughput', 'Interface field says USB-C, which is a plug shape not a protocol', 'No IP rating or drop protection published', 'No weight or dimensions given anywhere'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 5,                                                                    // POSICAO NO RANKING
                'name' => 'Samsung T7 Portable SSD 1TB, USB 3.2 Gen 2, AES 256-bit',                 // NOME (ENCURTADO)
                'price' => '£135.99',                                                               // PRECO
                'rating' => 4.7,                                                                    // NOTA
                'reviews_count' => 40678,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/A1sHjPpz6fL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Samsung T7 portable SSD 1TB in titanium grey',                       // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B087DFLF9S?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The joint highest rating in the search at 4.7 across 40,678 ratings, on a listing whose four bullets are copied field labels and one of which is in German.', // TEXTO CURTO (CARD)
                'body' => "Forty thousand six hundred and seventy-eight ratings at 4.7 stars is the second deepest sample here and the joint best average, and the T7 has been the default recommendation in this category for years. It is a proven drive with hardware AES 256-bit encryption and a good reputation for reliability.

Now read the bullets. There are four. Connectivity technology: Nein. Security: password protection. Compatible devices: desktop. Encryption: AES 256-bit hardware encryption. Three of the four are specification field labels pasted into the marketing section, and the first one answers the question with the German word for no. On the listing for one of the best-selling external drives in Britain, from the largest memory manufacturer in the world, the product description is a broken data dump.

The specification table then contradicts the title. The title says USB 3.2 Gen.2 — which is correct, and means about 1,050 MB/s. The interface field says USB 3.0, which is the old name for Gen 1 and half the bandwidth. A buyer checking the field rather than the title would conclude the drive is half as fast as it is. The form factor field says 0.31 inches, and no speed figure appears anywhere on the page at all. The hardware is excellent and the page describing it is the worst-maintained in this comparison.", // TEXTO SEO LONGO
                'pros' => ['40,678 ratings at 4.7, the joint best average in this comparison', 'Hardware AES 256-bit encryption with password protection', 'Long-established reliability record in this category', 'Genuine USB 3.2 Gen 2 performance of around 1,050 MB/s', '£135.99, cheaper than three slower or equal drives here'], // PONTOS POSITIVOS
                'contras' => ['Interface field says USB 3.0 while the title says Gen 2', 'Four bullets are copied field labels, one reading Connectivity technology: Nein', 'No read or write speed published anywhere on the listing', 'Form factor field reads 0.31 Inches'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 6,                                                                    // POSICAO NO RANKING
                'name' => 'SanDisk Portable SSD 1TB, 800MB/s Read, USB 3.2',                         // NOME (ENCURTADO)
                'price' => '£124.99',                                                               // PRECO
                'rating' => 4.5,                                                                    // NOTA
                'reviews_count' => 11060,                                                           // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/71bBCTIvIIL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'SanDisk Portable SSD 1TB in black',                                  // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0C5JQ68FY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Quotes 800 MB/s, comfortably below what its interface could carry, which is unusual and honest — and then supports it with exactly one bullet containing no specification.', // TEXTO CURTO (CARD)
                'body' => "Eight hundred megabytes a second is an interesting number because it is below the ceiling. A Gen 2 connection can carry 1,050, so SanDisk is quoting what this particular drive achieves rather than what the cable allows — the opposite of the two listings further down that quote more than their cable allows. On a page full of round maximum figures, an unremarkable 800 reads as a measurement. Eleven thousand and sixty ratings at 4.5 stars.

That is where the useful information ends. The listing has one bullet, and it is this: from SanDisk, a brand professional photographers trust to take on assignments. That is the entire product description. No dimensions, no weight, no encryption, no interface generation, no drop rating, no warranty, no write speed. The 800 MB/s appears only in the title, and the specification field says USB 3.2 with no suffix.

At £124.99 the value case is also awkward. The Lexar at number three is £2.50 cheaper and 250 MB/s faster; the Samsung T7 at number five is £11 more with four times the reviews and full encryption. What this drive has going for it is the SanDisk name, a genuinely large review sample and a speed claim that does not overreach. What it lacks is any reason, stated on the page, to choose it over the two either side of it — which for an 11,000-review product is a strange gap to leave.", // TEXTO SEO LONGO
                'pros' => ['800 MB/s is below the interface ceiling, which reads as a measurement', '11,060 ratings at 4.5 stars', 'SanDisk reliability record and support behind it', '£124.99, among the cheaper drives in this comparison', 'Simple plug-and-play with no software required'], // PONTOS POSITIVOS
                'contras' => ['One bullet on the whole listing, containing no specification at all', 'No dimensions, weight, encryption, warranty or write speed published', '250 MB/s slower than a drive here costing £2.50 less', 'Interface field says USB 3.2 with no generation'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 7,                                                                    // POSICAO NO RANKING
                'name' => 'Crucial X10 Portable SSD 1TB, 2100MB/s, IP65, Micron',                    // NOME (ENCURTADO)
                'price' => '£149.99',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 2450,                                                            // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/41rI1J9FcZL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Crucial X10 portable SSD in matte blue',                             // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0F3377JBN?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Advertises 2,100 MB/s over USB-C 3.2 Gen2 — a connection whose theoretical maximum is 1,212 — from Micron, one of the three largest memory makers in the world.', // TEXTO CURTO (CARD)
                'body' => "The title reads: up to 2100MB/s, USB-C 3.2 Gen2. USB 3.2 Gen 2 is a ten gigabit link. After the 128b/132b encoding it uses, the absolute theoretical maximum is 1,212 megabytes a second, and around 1,050 is what you see in practice. Two thousand one hundred is 173% of the theoretical ceiling of the interface named on the same line.

The likeliest explanation is not that Crucial is inventing a number but that the X10 is a Gen 2x2 drive and the title names the wrong generation — Gen 2x2 doubles the lanes to twenty gigabits and 2,100 fits it comfortably. Which is arguably worse, because it means Micron, a company that manufactures the flash inside half this page, cannot keep its own USB nomenclature straight on its own product listing. When the fanxiang at number nine makes the identical mistake, the fair conclusion is that the naming scheme is broken rather than that two companies are lying.

Beyond that it is a strong drive: IP65 dust and water resistance, three metre drop resistance, capacities to 8TB, a three-year warranty and 2,450 ratings at 4.4 stars. Two smaller notes. The specification interface field says USB-C, a plug shape rather than a protocol, so there is no second source on the page to resolve the contradiction. And the first bullet quantifies capacity in stored files, 500,000 4K photos and 133 4K videos, which is a friendlier unit than gigabytes and one nobody else here uses.", // TEXTO SEO LONGO
                'pros' => ['IP65 dust and water resistance with three metre drop protection', 'Capacities up to 8TB in the same range', 'Quantifies capacity in photos and videos rather than only gigabytes', 'Three-year Micron warranty with 2,450 ratings at 4.4 stars', 'Genuinely fast drive if your port is Gen 2x2'], // PONTOS POSITIVOS
                'contras' => ['Claims 2,100 MB/s over Gen 2, whose theoretical ceiling is 1,212', 'Either the speed or the named generation on the title must be wrong', 'Interface field says USB-C, so nothing on the page resolves it', '£149.99 for a claim a buyer cannot verify from the listing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 8,                                                                    // POSICAO NO RANKING
                'name' => 'Fikwot FP80 Portable SSD 1TB, USB 3.2 Gen2x2, 2050MB/s, Alloy Shell',     // NOME (ENCURTADO)
                'price' => '£119.99',                                                               // PRECO
                'rating' => 3.9,                                                                    // NOTA
                'reviews_count' => 547,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/518bmzjt2uL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'Fikwot FP80 portable SSD in grey alloy casing',                      // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0DBPQX92B?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'Pairs 2,050 MB/s with Gen 2x2 correctly, which is more than two better-known drives here manage — and carries the only rating below four stars on the page.', // TEXTO CURTO (CARD)
                'body' => "Give Fikwot its due first: 2,050 MB/s over USB 3.2 Gen2x2 is a correct pairing. Twenty gigabits carries it, the listing names the right generation, and that is more than Crucial and fanxiang manage at higher prices. At £119.99 this is also the second cheapest drive in the comparison and the cheapest that claims Gen 2x2 speeds, with an alloy shell chosen explicitly for heat dissipation — which matters on a 2,000 MB/s drive, because sustained transfers heat the controller until it throttles.

Then there is the rating. Three point nine stars across 547 ratings is the only average below four on this page, and every other drive here sits between 4.4 and 4.7. On a 547-rating sample that is a real signal rather than noise, and for a drive whose headline specification is correct it points at something other than speed — most likely reliability or thermal behaviour under load, which is exactly what an alloy shell is meant to address.

The listing has two smaller problems. The first bullet claims the drive is about 2 to 6 times faster than other portable SSDs and then stops mid-sentence in the middle of its own caveat: asterisk, please note, due to the l — the disclaimer is truncated and the reader never learns what the condition was. And the specification field says the interface is USB 3.0 while the title says Gen2x2, which are 5 and 20 gigabits respectively. The form factor field reads 10 Centimetres.", // TEXTO SEO LONGO
                'pros' => ['2,050 MB/s over Gen 2x2, a correct pairing two dearer drives get wrong', '£119.99, the cheapest Gen 2x2 drive in this comparison', 'Alloy shell chosen for heat dissipation on sustained transfers', 'Five-year or 512TBW limited service', 'Works with PS5, PS4 and iPhone 15 upwards'], // PONTOS POSITIVOS
                'contras' => ['3.9 stars, the only average below four in this comparison', 'First bullet truncates mid-word inside its own caveat', 'Interface field says USB 3.0 while the title says Gen2x2', 'Claims to be 2 to 6 times faster than other portable SSDs, none named'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 9,                                                                    // POSICAO NO RANKING
                'name' => 'fanxiang PS2100 Rugged Portable SSD 1TB, 2000MB/s, IP68',                 // NOME (ENCURTADO)
                'price' => '£126.99',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 366,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61TH7JsyI7L._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'fanxiang PS2100 rugged portable SSD in blue',                        // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0D2KRC5TY?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The same error as the Crucial, spelled out twice: 2,000 MB/s in the first bullet and a USB 3.2 Gen2 interface in the fourth, which cannot carry it.', // TEXTO CURTO (CARD)
                'body' => "Bullet one: sequential read speeds of up to 2000MB/s and write speeds of 1800MB/s. Bullet four: equipped with a USB 3.2 Gen2 interface. Those two sentences are on the same listing, four lines apart, and they contradict each other — Gen 2 is a ten gigabit link with a theoretical maximum of 1,212 MB/s, so the stated speed is 165% of what the stated interface can carry. The specification field says USB 3.2 with no generation, so nothing on the page resolves which claim is the real one.

As with the Crucial at number seven, the charitable and probably correct reading is that this is a Gen 2x2 drive whose listing names the wrong generation. The consequence for a buyer is the same either way: you cannot tell from the page whether you need a Gen 2x2 port to get the advertised speed, and if you plug it into a Gen 2 laptop expecting 2,000 MB/s you will get roughly half.

The hardware around the confusion is well specified. IP68 water and dust resistance is the highest rating in this comparison — a step above the IP65 on the SanDisk and the Crucial — with an aluminium housing, a reinforced frame, a silicone sleeve and a carabiner loop, backed by five years or 512TBW. At £126.99 that is a lot of ruggedising for the money. Three hundred and sixty-six ratings at 4.4 stars is the second thinnest sample here, so the record behind it is short.", // TEXTO SEO LONGO
                'pros' => ['IP68 water and dust resistance, the highest rating in this comparison', 'Aluminium housing with reinforced frame, silicone sleeve and carabiner', 'Five-year or 512TBW limited service', '£126.99 for genuinely rugged construction', 'Publishes write speed as well as read, at 1,800 MB/s'], // PONTOS POSITIVOS
                'contras' => ['Claims 2,000 MB/s and a Gen 2 interface in the same listing', 'Gen 2 tops out at 1,212 MB/s in theory, so the two cannot both be true', 'Specification field gives no USB generation to resolve it', '366 ratings, the second thinnest sample on this page'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 10,                                                                   // POSICAO NO RANKING
                'name' => 'BIWIN PD450 Portable SSD 1TB, USB 3.2 Gen1 5Gbps, 430MB/s',               // NOME (ENCURTADO)
                'price' => '£113.99',                                                               // PRECO
                'rating' => 4.4,                                                                    // NOTA
                'reviews_count' => 178,                                                             // Nº REVIEWS
                'image' => 'https://m.media-amazon.com/images/I/61OxfvswvdL._AC_SL1500_.jpg',       // IMAGEM
                'alt_text' => 'BIWIN PD450 pocket portable SSD 1TB',                                // ALT DESCRITIVO DA IMAGEM
                'affiliate_link' => 'https://www.amazon.co.uk/dp/B0FD9V3LJ8?tag=ranked10-21',       // LINK AFILIADO
                'summary' => 'The only drive here whose speed, interface and bandwidth all agree — 430 MB/s over Gen 1 at 5Gbps — and also the slowest by a factor of 2.4 at nearly the same price.', // TEXTO CURTO (CARD)
                'body' => "Read speeds up to 430 MB/s and write speeds of up to 400 MB/s, supported by a USB 3.2 Gen1 5Gbps interface. That sentence is the most complete and correct specification on this page: the speed, the generation and the raw bandwidth, all three stated together and all three consistent — Gen 1 carries five gigabits, which is about 450 MB/s in practice, and 430 fits inside it. Nobody else gives you all three.

The final bullet is more candid still. BIWIN notes that the product has been upgraded to 560 MB/s read, that due to mixed FBA inventory you may receive the original 430 MB/s version, and that both are genuine. A manufacturer telling you in advance that stock roulette decides whether you get a 30% faster drive is disclosure of a kind we have not seen in any other category — and it is also a real risk to weigh, because you cannot choose which one arrives.

The problem is the arithmetic against everything else here. Four hundred and thirty megabytes a second at £113.99, when £122.49 buys the Lexar at 1,050 — two and a half times the speed for £8.50 more. Gen 1 is the old USB 3.0 standard and there is no good reason to buy a new drive on it at this price. The honesty is genuine and worth acknowledging; the product it describes is the slowest in the comparison by a factor of 2.4, on 178 ratings, which is the thinnest sample here.", // TEXTO SEO LONGO
                'pros' => ['States speed, USB generation and raw bandwidth together, uniquely here', '430 MB/s over Gen 1 is an honest and achievable pairing', 'Warns that mixed stock may send the slower of two versions', 'Available in 500GB, 1TB and 2TB with a 2-in-1 USB-A and C connector', 'Broad compatibility including HarmonyOS, HyperOS and iOS'], // PONTOS POSITIVOS
                'contras' => ['430 MB/s is 2.4 times slower than a drive costing £8.50 more', 'Gen 1 is the old USB 3.0 standard, poor value at this price', 'You cannot choose whether you get the 430 or the 560 MB/s version', '178 ratings, the thinnest sample in this comparison'], // PONTOS NEGATIVOS
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
        $this->command?->info("PortableSsdsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
