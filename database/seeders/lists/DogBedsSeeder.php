<?php

namespace Database\Seeders\Lists; // NAMESPACE DOS SEEDERS DE LISTA

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (USADO VIA RELACIONAMENTO DO ARTIGO)
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class DogBedsSeeder extends Seeder
{
    public function run(): void // POPULA A LISTA DE CAMAS PARA CACHORRO (CATEGORIA PET SUPPLIES)
    {
        // ═══ EDITE AQUI: DADOS DA LISTA MANUAL ═══

        $category = [
            'slug' => 'pet-supplies',                                            // SLUG DA CATEGORIA (URL)
            'name' => 'Pet Supplies',                                            // NOME EXIBIDO
            'description' => 'Everything your furry friends need, ranked by quality, comfort and value.', // DESCRICAO
        ];

        $article = [
            'slug' => 'best-dog-beds-uk',                                        // SLUG DO ARTIGO (URL)
            'title' => 'Best Dog Beds UK',                                       // TITULO / H1
            'intro' => 'A good dog bed keeps your pet comfortable and supports their joints as they age. We compared the best dog beds in the UK on comfort, durability and how easy they are to wash, with options for every size and budget.', // INTRO
            'conclusion' => 'For most dogs an orthopaedic foam bed offers the best long-term comfort, while a washable bolster bed is the easier everyday choice. Match the size to your dog and prioritise a removable, machine-washable cover.', // CONCLUSAO
            'author' => 'Felipe Iglesias',                                       // AUTOR (DEVE BATER COM config/authors.php)
            'published_at' => now()->subDay(),                                   // DATA DE PUBLICACAO
        ];

        $products = [
            [
                'position' => 1, 'name' => 'Silentnight Orthopaedic Memory Foam Dog Bed', 'price' => '£44.99', 'rating' => 4.8, 'reviews_count' => 9120, 'image' => null,
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21',
                'summary' => 'Our top pick: a memory-foam base that supports joints, with a removable, machine-washable cover.',
                'body' => "The Silentnight orthopaedic bed tops our list because it pairs genuine joint support with everyday practicality. The memory-foam base relieves pressure on older dogs' hips and elbows, making it the best dog bed for senior dogs we tested.\n\nThe cover unzips and goes straight in the machine, and the non-slip base keeps it in place on hard floors. It comes in several sizes to suit most breeds.",
                'pros' => ['Supportive memory foam', 'Machine-washable cover', 'Non-slip base'], 'contras' => ['Foam has a slight initial smell', 'Not chew-proof'],
            ],
            [
                'position' => 2, 'name' => 'Scruffs Expedition Memory Foam Bolster Bed', 'price' => '£39.99', 'rating' => 4.7, 'reviews_count' => 6740, 'image' => null,
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21',
                'summary' => 'A cosy bolster bed with raised sides for dogs that like to lean or curl up while they sleep.',
                'body' => "The Scruffs Expedition adds raised bolster sides that give dogs something to lean against, which anxious or curl-up sleepers love.\n\nA water-resistant base protects against the odd accident and the whole thing is machine washable. It strikes a good balance between comfort and price for medium breeds.",
                'pros' => ['Comfy raised bolsters', 'Water-resistant base', 'Good value'], 'contras' => ['Bolsters flatten over time', 'Runs slightly small'],
            ],
            [
                'position' => 3, 'name' => 'Bunty Tough Waterproof Dog Bed', 'price' => '£24.99', 'rating' => 4.5, 'reviews_count' => 11280, 'image' => null,
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21',
                'summary' => 'A hard-wearing waterproof bed that is the best budget pick for muddy paws and outdoor dogs.',
                'body' => "The Bunty Tough is built for mucky, active dogs. The waterproof outer wipes clean in seconds and shrugs off mud, making it ideal for utility rooms and porches.\n\nIt is the most affordable bed in our list and the fabric resists scratching and digging better than most at this price.",
                'pros' => ['Fully waterproof', 'Very affordable', 'Hard-wearing fabric'], 'contras' => ['Less plush than foam beds', 'Basic styling'],
            ],
            [
                'position' => 4, 'name' => 'PetFusion Ultimate Orthopaedic Dog Bed', 'price' => '£89.99', 'rating' => 4.7, 'reviews_count' => 5210, 'image' => null,
                'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21',
                'summary' => 'A premium solid-foam bed with a water-resistant, tear-resistant cover — the best for large breeds.',
                'body' => "The PetFusion Ultimate is the premium choice, with a thick solid memory-foam base rather than chopped filling, so it keeps its shape under heavy dogs.\n\nThe cover is both water and tear resistant and removes for washing. It is the best dog bed for large breeds if your budget stretches to it.",
                'pros' => ['Solid foam keeps its shape', 'Tear-resistant cover', 'Great for big dogs'], 'contras' => ['Expensive', 'Heavy to move'],
            ],
        ];

        // ═══ FIM DA AREA EDITAVEL ═══

        $categoryModel = Category::updateOrCreate(['slug' => $category['slug']], $category); // CRIA/ATUALIZA A CATEGORIA (NAO DUPLICA)
        $articleModel = Article::updateOrCreate(['slug' => $article['slug']], array_merge($article, ['category_id' => $categoryModel->id])); // CRIA/ATUALIZA O ARTIGO (NAO DUPLICA)
        $articleModel->products()->delete(); // REMOVE OS PRODUTOS ANTIGOS DESTE ARTIGO PARA REFLETIR EDICOES
        foreach ($products as $produto) { // PERCORRE A LISTA MANUAL DE PRODUTOS
            $articleModel->products()->create($produto); // RECRIA CADA PRODUTO VINCULADO AO ARTIGO
        }
        $this->command?->info("DogBedsSeeder: /{$category['slug']}/{$article['slug']} (".count($products)." produtos)."); // RESUMO
    }
}
