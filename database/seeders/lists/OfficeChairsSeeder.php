<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class OfficeChairsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE CADEIRAS DE ESCRITORIO (CATEGORIA HOME & OFFICE)
    {
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══

        $category = [
            'slug' => 'home-office',                                             // SLUG DA CATEGORIA (URL)
            'name' => 'Home & Office',                                           // NOME EXIBIDO
            'description' => 'Kit to make working from home more comfortable and productive, ranked for UK buyers.', // DESCRICAO
        ];

        $article = [
            'slug' => 'best-office-chairs-uk',                                   // SLUG DO ARTIGO (URL)
            'title' => 'Best Office Chairs UK',                                  // TITULO / H1
            'intro' => 'A supportive office chair is the single best upgrade for anyone working from home. We compared the best office chairs in the UK on back support, adjustability and build quality, with a pick for every budget from entry-level to premium ergonomic.', // INTRO
            'conclusion' => 'If your budget allows, a fully ergonomic mesh chair pays for itself in comfort over long days. For tighter budgets, a mid-range chair with adjustable lumbar support and armrests covers the essentials.', // CONCLUSAO
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => now(),                                             // DATA DE PUBLICACAO
        ];

        $products = [
            [
                'position' => 1, 'name' => 'Herman Miller Aeron Ergonomic Chair', 'price' => '£1,329.00', 'rating' => 4.9, 'reviews_count' => 4380, 'image' => null,
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21',
                'summary' => 'The benchmark ergonomic chair: breathable mesh, superb posture support and a 12-year warranty.',
                'body' => "The Herman Miller Aeron remains the chair every other office chair is measured against. The breathable mesh keeps you cool, the PostureFit support cradles your lower back, and almost everything adjusts to your body.\n\nIt is a serious investment, but the 12-year warranty and legendary durability make it the best office chair for full-time home workers who sit all day.",
                'pros' => ['Outstanding back support', 'Breathable all-mesh design', '12-year warranty'], 'contras' => ['Very expensive', 'Firm for some users'],
            ],
            [
                'position' => 2, 'name' => 'Sihoo M57 Ergonomic Office Chair', 'price' => '£169.99', 'rating' => 4.6, 'reviews_count' => 13920, 'image' => null,
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21',
                'summary' => 'The best value ergonomic chair: adjustable lumbar support and headrest at a fraction of premium prices.',
                'body' => "The Sihoo M57 delivers most of what makes premium chairs comfortable for a fraction of the price. You get adjustable lumbar support, a height-adjustable headrest and a breathable mesh back.\n\nIt is the best office chair on a budget for anyone who wants proper ergonomic support without spending four figures.",
                'pros' => ['Adjustable lumbar and headrest', 'Excellent value', 'Breathable mesh back'], 'contras' => ['Armrests less refined', 'Assembly takes time'],
            ],
            [
                'position' => 3, 'name' => 'Secretlab TITAN Evo Office Chair', 'price' => '£549.00', 'rating' => 4.7, 'reviews_count' => 8650, 'image' => null,
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21',
                'summary' => 'A premium padded chair with firm support and integrated lumbar — great for long gaming and work sessions.',
                'body' => "The Secretlab TITAN Evo blends the padded comfort of a gaming chair with genuinely supportive ergonomics, including a built-in adjustable lumbar system.\n\nThe cold-cure foam is firm and supportive rather than soft and sagging, making it a strong all-rounder for people who work and game from the same seat.",
                'pros' => ['Built-in lumbar support', 'Firm, durable foam', 'Premium materials'], 'contras' => ['Pricey', 'Bulky footprint'],
            ],
            [
                'position' => 4, 'name' => 'Songmics OBG24 Mesh Office Chair', 'price' => '£79.99', 'rating' => 4.4, 'reviews_count' => 16340, 'image' => null,
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21',
                'summary' => 'A simple, comfortable entry-level mesh chair — the best cheap pick for occasional desk work.',
                'body' => "The Songmics OBG24 is the sensible entry point if you only need a chair for occasional desk work. The mesh back keeps you cool and the basics — height, tilt and padded seat — are all covered.\n\nIt lacks the fine adjustability of pricier chairs, but for the money it is a comfortable, no-fuss everyday seat.",
                'pros' => ['Very affordable', 'Cool mesh back', 'Easy to assemble'], 'contras' => ['Limited adjustability', 'Basic armrests'],
            ],
        ];

        // ═══ FIM DA AREA EDITAVEL ═══

        $categoryModel = Category::updateOrCreate(['slug' => $category['slug']], $category); // CRIA/ATUALIZA A CATEGORIA (NAO DUPLICA)
        $articleModel = Article::updateOrCreate(['slug' => $article['slug']], array_merge($article, ['category_id' => $categoryModel->id])); // CRIA/ATUALIZA O ARTIGO (NAO DUPLICA)
        $articleModel->products()->delete(); // REMOVE OS PRODUTOS ANTIGOS DESTE ARTIGO PARA REFLETIR EDICOES
        foreach ($products as $produto) { // PERCORRE A LISTA MANUAL DE PRODUTOS
            $articleModel->products()->create($produto); // RECRIA CADA PRODUTO VINCULADO AO ARTIGO
        }
        $this->command?->info("OfficeChairsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
