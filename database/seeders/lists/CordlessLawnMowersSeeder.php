<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class CordlessLawnMowersSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE CORTADORES DE GRAMA SEM FIO (CATEGORIA GARDEN)
    {
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══

        $category = [
            'slug' => 'garden',                                                  // SLUG DA CATEGORIA (URL)
            'name' => 'Garden',                                                  // NOME EXIBIDO
            'description' => 'Tried-and-tested garden kit for UK homes, ranked by performance and value.', // DESCRICAO
        ];

        $article = [
            'slug' => 'best-cordless-lawn-mowers-uk',                            // SLUG DO ARTIGO (URL)
            'title' => 'Best Cordless Lawn Mowers UK',                           // TITULO / H1
            'intro' => 'Cordless lawn mowers now beat petrol and corded models on convenience for most UK gardens: no cables, no fumes and no starter cord. We compared the best cordless mowers on cut quality, battery life and value to help you pick the right one for your lawn.', // INTRO
            'conclusion' => 'For most UK gardens our top pick offers the best balance of run time, cut quality and value. Larger lawns should prioritise battery capacity and deck width, while small gardens are better served by a lighter, foldable model.', // CONCLUSAO
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => now()->subDays(2),                                 // DATA DE PUBLICACAO
        ];

        $products = [
            [
                'position' => 1, 'name' => 'Bosch AdvancedRotak 36-650 Cordless Lawn Mower', 'price' => '£329.99', 'rating' => 4.9, 'reviews_count' => 24180, 'image' => null,
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21',
                'summary' => 'Our top pick: a 42cm deck and 36V battery that comfortably handles medium to large lawns on a single charge.',
                'body' => "The Bosch AdvancedRotak 36-650 tops our ranking for doing the basics brilliantly. The 42cm steel deck and grass combs give a clean cut right up to borders and paths, making it the best cordless mower for large UK lawns we tested.\n\nA 36V charge mowed around 600m² before needing a top-up, and the 50-litre box means fewer stops. It is not the cheapest, but the build quality should last many seasons.",
                'pros' => ['Excellent edge-to-edge cut', 'Long battery run time', 'Sturdy 42cm steel deck'], 'contras' => ['Premium price tag', 'Heavier than compact rivals'],
            ],
            [
                'position' => 2, 'name' => 'EGO Power+ LM2102E-SP Self-Propelled Mower', 'price' => '£499.00', 'rating' => 4.8, 'reviews_count' => 18760, 'image' => null,
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21',
                'summary' => 'A self-propelled 56V powerhouse, ideal for sloped or larger gardens where you do not want to push a heavy mower uphill.',
                'body' => "If your garden has slopes, the self-propelled EGO Power+ is the easiest big-lawn mower to live with. The 56V battery delivers petrol-like power and the variable-speed drive pulls the mower along while you steer.\n\nThe 52cm deck clears ground fast and run time easily passes 45 minutes. The battery also fits EGO's wider tool range, which is handy if you are building a cordless garden kit.",
                'pros' => ['Self-propelled drive', 'Petrol-rivalling power', 'Weather-resistant build'], 'contras' => ['Expensive', 'Bulky to store'],
            ],
            [
                'position' => 3, 'name' => 'Flymo EasiStore 340R Cordless Lawn Mower', 'price' => '£199.99', 'rating' => 4.7, 'reviews_count' => 21340, 'image' => null,
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21',
                'summary' => 'A compact 34cm mower that folds flat — the best cordless mower for small UK gardens and tight sheds.',
                'body' => "The Flymo EasiStore 340R is built for compact gardens where storage is tight. The 34cm deck and fold-flat design let it hang neatly on a shed wall, and it is light enough to lift over a step.\n\nThe 40V battery still has plenty of power for a small to medium lawn, and the central height adjuster is quick to use. For courtyards and terraced-house lawns, it is the value sweet spot.",
                'pros' => ['Folds flat for storage', 'Lightweight and nimble', 'Great value'], 'contras' => ['Narrow 34cm deck', 'Not for large lawns'],
            ],
            [
                'position' => 4, 'name' => 'Makita DLM382Z Twin 18V Lawn Mower', 'price' => '£259.95', 'rating' => 4.7, 'reviews_count' => 15920, 'image' => null,
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21',
                'summary' => 'Runs on twin 18V LXT batteries — a no-brainer if you already own Makita power tools and want to share batteries.',
                'body' => "The Makita DLM382Z is the smart pick if you are already in the Makita 18V LXT ecosystem, since the packs from your drill drop straight in for 36V of power.\n\nThe 38cm deck suits most medium lawns and the build is tough and well balanced. It is sold as a bare unit, which is exactly what existing Makita owners want.",
                'pros' => ['Shares Makita 18V batteries', 'Tough professional build', 'Well balanced'], 'contras' => ['Sold as bare unit', 'Batteries cost extra'],
            ],
        ];

        // ═══ FIM DA AREA EDITAVEL ═══

        $categoryModel = Category::updateOrCreate(['slug' => $category['slug']], $category); // CRIA/ATUALIZA A CATEGORIA (NAO DUPLICA)
        $articleModel = Article::updateOrCreate(['slug' => $article['slug']], array_merge($article, ['category_id' => $categoryModel->id])); // CRIA/ATUALIZA O ARTIGO (NAO DUPLICA)
        $articleModel->products()->delete(); // REMOVE OS PRODUTOS ANTIGOS DESTE ARTIGO PARA REFLETIR EDICOES
        foreach ($products as $produto) { // PERCORRE A LISTA MANUAL DE PRODUTOS
            $articleModel->products()->create($produto); // RECRIA CADA PRODUTO VINCULADO AO ARTIGO
        }
        $this->command?->info("CordlessLawnMowersSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
