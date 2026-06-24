<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class PortableBlendersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE PORTABLE BLENDERS DE FORMA IDEMPOTENTE
    {
        // ═══════════════════════════════════════════════════════════════
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══
        // PARA CRIAR UMA NOVA LISTA, COPIE database/seeders/lists/_TemplateSeeder.php.example
        // ═══════════════════════════════════════════════════════════════

        $category = [
            'slug' => 'kitchen',                    // SLUG DA CATEGORIA (URL)
            'name' => 'Kitchen',                    // NOME EXIBIDO
            'description' => 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.', // DESCRICAO
        ];

        $article = [
            'slug' => 'best-portable-blenders-uk',           // SLUG DO ARTIGO (URL)
            'title' => 'Best Portable Blenders UK',          // TITULO / H1
            'intro' => 'Portable blenders have become a kitchen staple for anyone who wants a fresh smoothie at the gym, in the office or on a morning commute. We have compared the most popular cordless models available in the UK, weighing up blending power, battery life, capacity and value so you can find the right one for your routine. Here are our top picks.', // INTRO
            'conclusion' => 'The best portable blender for you comes down to how you plan to use it. If you want trusted blending power and thousands of happy customers behind your purchase, the Ninja range is hard to beat, while the ZHENMI offers a larger capacity at a lower price for those on a tighter budget. Whichever you choose, look for a leak-proof lid, a USB-C rechargeable battery and dishwasher-safe parts to make daily use as easy as possible.', // CONCLUSAO
            'author' => 'Felipe Iglesias',                   // AUTOR DO ARTIGO (DEVE BATER COM config/authors.php)
            'published_at' => now(),                         // DATA DE PUBLICACAO
        ];

        $products = [
            [
                'position' => 1,                                          // POSICAO NO RANKING
                'name' => 'Ninja Blast Max Portable Blender 2-Pack, 570ml', // NOME (DA API)
                'price' => '£129.95',                                     // PRECO (DA API)
                'rating' => 4.8,                                          // NOTA (DA API)
                'reviews_count' => 58,                                    // Nº REVIEWS (DA API)
                'image' => 'https://m.media-amazon.com/images/I/61CvzRSh5TL._AC_SL1400_.jpg', // IMAGEM (DA API)
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21', // LINK AFILIADO (TROCAR DEPOIS)
                'summary' => 'Ninja\'s most powerful cordless blender, sold here as a two-pack. Crushes ice and frozen fruit in seconds with three one-touch blending modes.', // TEXTO CURTO (CARD)
                'body' => 'The Ninja Blast Max is the most powerful portable blender in Ninja\'s cordless range, and this bundle includes two units in a Lavender and Silver finish. With a stronger motor than the original Blast, it powers through ice and frozen ingredients in seconds, making it a strong choice for protein shakes and frozen smoothies on the go.

Each 570ml cup uses a twist-and-go design with a leak-proof lid, sip spout and carry handle, so you can blend and drink from the same cup wherever you are. Three blending functions, including Crush, Smoothie and a Manual Blend mode, give you control over the texture of every drink.

At £129.95 for two, this bundle is best suited to households where more than one person wants their own blender, or anyone who likes the idea of keeping one at home and one at work. The parts are dishwasher safe and Ninja offers a two-year guarantee on registration.', // TEXTO SEO LONGO (FORA DO CARD)
                'pros' => ['Most powerful motor in the Ninja Blast range', 'Three one-touch blending functions', 'Leak-proof lid with sip spout', 'Two-year guarantee on registration'], // PONTOS POSITIVOS
                'contras' => ['Premium price for a portable blender', 'Two-pack may be more than a single user needs'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 2,                                          // POSICAO NO RANKING
                'name' => 'Ninja Blast Portable Blender, 530ml, Denim Blue (BC151UKNV)', // NOME (DA API)
                'price' => '£39',                                         // PRECO (DA API)
                'rating' => 4.4,                                          // NOTA (DA API)
                'reviews_count' => 4271,                                  // Nº REVIEWS (DA API)
                'image' => null,                                          // SEM IMAGEM AINDA - MOSTRA PLACEHOLDER
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21', // LINK AFILIADO
                'summary' => 'Ninja\'s most compact and quietest cordless blender. A USB-C rechargeable mini blender that handles ice and frozen fruit with ease.', // TEXTO CURTO (CARD)
                'body' => 'The Ninja Blast in Denim Blue is the brand\'s most compact and quietest portable blender, and with over four thousand customer ratings it is also one of the most popular cordless models in the UK. The stainless steel BlastBlade assembly crushes ice and frozen fruit to deliver genuinely smooth drinks rather than the lumpy results some smaller blenders produce.

The 530ml BPA-free cup features a leak-proof lid with a sip spout and a comfortable carry handle, making it easy to blend and drink in the same cup at the gym, in the park or at your desk. Blade and cup covers are included for safe storage in a bag.

A single USB-C charge delivers more than ten blends and up to two hours of battery life, with a full charge taking around two hours. At £39 it sits at a far more accessible price point than the Max bundle, and the lid and cup are top-rack dishwasher safe. Ninja includes a two-year guarantee on registration for UK and ROI customers.', // TEXTO SEO LONGO (FORA DO CARD)
                'pros' => ['Compact and quiet design', 'Over 4,000 customer ratings', 'More than 10 blends per charge', 'Affordable price point'], // PONTOS POSITIVOS
                'contras' => ['Smaller 530ml capacity', 'Single colour in this listing'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 3,                                          // POSICAO NO RANKING
                'name' => 'ZHENMI Portable Blender, 980ml, Cordless (Purple)', // NOME (DA API)
                'price' => '£35.99',                                      // PRECO (DA API)
                'rating' => 4.0,                                          // NOTA (DA API)
                'reviews_count' => 71,                                    // Nº REVIEWS (DA API)
                'image' => 'https://m.media-amazon.com/images/I/41ZPnQxf2lL._AC_.jpg', // IMAGEM (DA API)
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21', // LINK AFILIADO
                'summary' => 'A larger-capacity budget option with an 18,000RPM motor and eight stainless steel blades. The 980ml Tritan jug suits personal or family use.', // TEXTO CURTO (CARD)
                'body' => 'The ZHENMI portable blender stands out in this list for its larger 980ml capacity, making it a sensible pick for families or anyone who wants to blend more than a single serving at a time. A high-speed 18,000RPM motor paired with eight stainless steel blades turns ice, fruit, nuts and vegetables into smooth drinks in around thirty seconds.

The BPA-free Tritan jug is durable and odour resistant, and at just 0.9kg the whole unit is light enough to drop into a gym bag, backpack or car cup holder. A leak-proof lid with sip spout helps prevent spills when you are out and about, and an LED indicator shows remaining battery so you are not caught out mid-blend.

Charging is handled over USB-C in two to three hours, with up to twenty cycles per full charge. All removable parts are dishwasher safe, and the food-grade materials are free from harmful chemicals. At £35.99 it is the most affordable option here and a useful alternative to the Ninja models for budget-conscious buyers.', // TEXTO SEO LONGO (FORA DO CARD)
                'pros' => ['Large 980ml capacity', 'Most affordable in this list', 'Up to 20 blends per charge', 'Dishwasher-safe parts'], // PONTOS POSITIVOS
                'contras' => ['Lower average rating than the Ninja models', 'Fewer customer reviews so far'], // PONTOS NEGATIVOS
            ],
            [
                'position' => 4,                                          // POSICAO NO RANKING
                'name' => 'Ninja 700W Slim Blender & Smoothie Maker, 2x 470ml (QB3001UKS)', // NOME (DA API)
                'price' => '£49.99',                                      // PRECO (DA API)
                'rating' => 4.7,                                          // NOTA (DA API)
                'reviews_count' => 5738,                                  // Nº REVIEWS (DA API)
                'image' => 'https://m.media-amazon.com/images/I/616E1sfbwHL._AC_SL1500_.jpg', // IMAGEM (DA API)
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21', // LINK AFILIADO
                'summary' => 'A mains-powered single-serve blender with a 700W motor and the highest review count in our list. Blends directly in the 470ml to-go cup.', // TEXTO CURTO (CARD)
                'body' => 'Strictly speaking the Ninja 700W Slim is a mains-powered personal blender rather than a cordless one, but with more than five thousand customer ratings and an excellent 4.7 average it earns its place for anyone who blends mostly at home and wants reliable performance.

The 700W power pod uses Ninja\'s blade technology to handle whole fruits and vegetables, nuts, seeds and ice with a simple push-to-blend action. You blend directly in the 470ml cup, then swap on a spout lid to take your smoothie with you, and the bundle includes two cups and two lids so a second drink is always ready to go.

All removable parts are dishwasher safe and the cups are BPA-free. At £49.99 it is keenly priced for the performance on offer, and Ninja provides a two-year guarantee on registration for UK and ROI customers. If counter space and a plug are not an issue, it is one of the most dependable options in this guide.', // TEXTO SEO LONGO (FORA DO CARD)
                'pros' => ['Powerful 700W motor', 'Highest review count in this list', 'Comes with two cups and lids', 'Excellent 4.7 average rating'], // PONTOS POSITIVOS
                'contras' => ['Mains-powered, not cordless', 'Less portable than the others'], // PONTOS NEGATIVOS
            ],
        ];

        // ═══════════════════════════════════════════════════════════════
        // ═══ FIM DA AREA EDITAVEL ═══
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

        // INFORMA O RESULTADO NO TERMINAL (SO QUANDO RODADO COM SAIDA DE CONSOLE)
        $this->command?->info("PortableBlendersSeeder: 1 categoria, 1 artigo e ".count($products)." produtos."); // RESUMO DO QUE FOI POPULADO
        $this->command?->info("URL do artigo: /{$category['slug']}/{$article['slug']}"); // URL ONDE O ARTIGO FICA ACESSIVEL
    }
}
