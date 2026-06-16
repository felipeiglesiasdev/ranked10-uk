<?php

namespace Database\Seeders;

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS
use Illuminate\Database\Console\Seeds\WithoutModelEvents; // DESATIVA EVENTOS DE MODEL DURANTE O SEED
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS
use Illuminate\Support\Str; // IMPORTA O HELPER STR PARA GERAR SLUGS

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents; // EVITA DISPARAR OBSERVERS/EVENTOS DURANTE O SEED

    // LISTAS DE PROS DE EXEMPLO (UMA COMBINACAO DIFERENTE POR POSICAO)
    private const PROS_POOL = [
        ['Excellent build quality', 'Great value for money', 'Easy to set up'],
        ['Very quiet operation', 'Energy efficient'],
        ['Compact design', 'Intuitive controls', 'Quick results'],
        ['Premium materials', 'Long warranty included'],
        ['Lightweight and portable', 'Easy to clean'],
        ['Powerful performance', 'Stylish modern look'],
        ['Generous capacity', 'Good safety features'],
        ['Reliable brand reputation', 'Simple maintenance'],
        ['Affordable price point', 'Decent accessories included'],
        ['Solid everyday performer', 'Widely available spare parts'],
    ];

    // LISTAS DE CONTRAS DE EXEMPLO (UMA COMBINACAO DIFERENTE POR POSICAO)
    private const CONTRAS_POOL = [
        ['Premium price tag'],
        ['Limited colour options', 'Slightly bulky'],
        ['Instructions could be clearer'],
        ['No smart features'],
        ['Shorter power cord than rivals'],
        ['Can be noisy at full power'],
        ['Accessories sold separately'],
        ['Takes up counter space'],
        ['Basic display'],
        ['Slower than premium rivals', 'Plastic feel in places'],
    ];

    public function run(): void // POPULA O BANCO COM DADOS DE EXEMPLO PARA TESTAR O SITE
    {
        $catalogue = [ // ESTRUTURA COMPLETA: CATEGORIA -> ARTIGOS -> NOMES DE PRODUTOS
            [
                'name' => 'Kitchen', // NOME DA CATEGORIA
                'description' => 'The best kitchen appliances and gadgets for UK homes, tested and ranked.', // DESCRICAO DA CATEGORIA
                'articles' => [ // ARTIGOS DA CATEGORIA
                    [
                        'title' => 'Top 10 Air Fryers UK 2025', // TITULO DO ARTIGO
                        'topic' => 'air fryer', // TOPICO USADO NOS TEXTOS
                        'brands' => ['Ninja', 'Tower', 'COSORI', 'Philips', 'Tefal', 'Russell Hobbs', 'Instant', 'Salter', 'Breville', 'Swan'], // MARCAS DOS 10 PRODUTOS
                    ],
                    [
                        'title' => 'Top 10 Coffee Machines UK 2025', // TITULO DO ARTIGO
                        'topic' => 'coffee machine', // TOPICO USADO NOS TEXTOS
                        'brands' => ['De\'Longhi', 'Sage', 'Nespresso', 'Tassimo', 'Lavazza', 'Melitta', 'Krups', 'Morphy Richards', 'Dualit', 'Smeg'], // MARCAS DOS 10 PRODUTOS
                    ],
                ],
            ],
            [
                'name' => 'Home & Garden', // NOME DA CATEGORIA
                'description' => 'Top-rated tools and essentials to keep your home and garden in shape.', // DESCRICAO DA CATEGORIA
                'articles' => [ // ARTIGOS DA CATEGORIA
                    [
                        'title' => 'Top 10 Cordless Lawn Mowers UK 2025', // TITULO DO ARTIGO
                        'topic' => 'cordless lawn mower', // TOPICO USADO NOS TEXTOS
                        'brands' => ['Bosch', 'Flymo', 'Worx', 'Gtech', 'Makita', 'Einhell', 'Ryobi', 'Black+Decker', 'Hyundai', 'Webb'], // MARCAS DOS 10 PRODUTOS
                    ],
                    [
                        'title' => 'Top 10 Robot Vacuum Cleaners UK 2025', // TITULO DO ARTIGO
                        'topic' => 'robot vacuum', // TOPICO USADO NOS TEXTOS
                        'brands' => ['iRobot', 'Eufy', 'Roborock', 'Shark', 'Ecovacs', 'Dreame', 'Samsung', 'Miele', 'Vactidy', 'Lefant'], // MARCAS DOS 10 PRODUTOS
                    ],
                ],
            ],
            [
                'name' => 'Pet Supplies', // NOME DA CATEGORIA
                'description' => 'Everything your furry friends need, ranked by quality and value.', // DESCRICAO DA CATEGORIA
                'articles' => [ // ARTIGOS DA CATEGORIA
                    [
                        'title' => 'Top 10 Dog Beds UK 2025', // TITULO DO ARTIGO
                        'topic' => 'dog bed', // TOPICO USADO NOS TEXTOS
                        'brands' => ['Silentnight', 'Scruffs', 'Danish Design', 'Bunty', 'PetFusion', 'Kong', 'Joules', 'RSPCA', 'Rosewood', 'Trixie'], // MARCAS DOS 10 PRODUTOS
                    ],
                    [
                        'title' => 'Top 10 Cat Litter Boxes UK 2025', // TITULO DO ARTIGO
                        'topic' => 'cat litter box', // TOPICO USADO NOS TEXTOS
                        'brands' => ['Catit', 'Modkat', 'PetSafe', 'Trixie', 'Savic', 'Ferplast', 'Curver', 'Omlet', 'Rosewood', 'CatCentre'], // MARCAS DOS 10 PRODUTOS
                    ],
                ],
            ],
        ];

        foreach ($catalogue as $categoryData) { // PERCORRE CADA CATEGORIA DO CATALOGO
            $category = Category::create([ // CRIA A CATEGORIA NO BANCO
                'slug' => Str::slug($categoryData['name']), // GERA O SLUG A PARTIR DO NOME
                'name' => $categoryData['name'], // NOME DA CATEGORIA
                'description' => $categoryData['description'], // DESCRICAO DA CATEGORIA
            ]);

            foreach ($categoryData['articles'] as $index => $articleData) { // PERCORRE OS ARTIGOS DA CATEGORIA
                $topic = $articleData['topic']; // TOPICO USADO PARA MONTAR OS TEXTOS

                $article = Article::create([ // CRIA O ARTIGO PUBLICADO NO BANCO
                    'category_id' => $category->id, // VINCULA O ARTIGO A CATEGORIA
                    'slug' => Str::slug($articleData['title']), // GERA O SLUG A PARTIR DO TITULO
                    'title' => $articleData['title'], // TITULO DO ARTIGO
                    'intro' => "Looking for the best {$topic} in the UK? We've compared dozens of models on performance, build quality, running costs and real customer feedback to bring you this definitive top 10. Whether you're after a premium pick or the best budget buy, our ranking below has an option for every home and every budget.", // INTRO DE EXEMPLO
                    'conclusion' => "Any of the ten picks above would be a solid choice, but for most UK buyers the number one spot offers the best balance of performance, reliability and value for money. If your budget is tighter, the mid-table options still deliver excellent results — just check the pros and cons to match the right {$topic} to your needs.", // CONCLUSAO DE EXEMPLO
                    'author' => 'Editorial Team', // AUTOR PADRAO
                    'published_at' => now()->subDays($index + 1), // PUBLICA COM DATAS ESCALONADAS PARA ORDENACAO
                ]);

                foreach ($articleData['brands'] as $position => $brand) { // PERCORRE AS 10 MARCAS DO ARTIGO
                    $rank = $position + 1; // POSICAO NO RANKING COMECANDO EM 1
                    Product::create([ // CRIA O PRODUTO VINCULADO AO ARTIGO
                        'article_id' => $article->id, // VINCULA O PRODUTO AO ARTIGO
                        'position' => $rank, // POSICAO DO PRODUTO NO RANKING
                        'name' => $brand.' '.Str::title($topic).' Series '.$rank, // NOME FICTICIO DO PRODUTO
                        'price' => '£'.number_format(39.99 + $position * 12, 2), // PRECO FICTICIO CRESCENTE EM LIBRAS
                        'rating' => round(4.9 - $position * 0.08, 1), // NOTA DECRESCENTE ENTRE 4.9 E ~4.2
                        'reviews_count' => 24000 - $position * 2100, // QUANTIDADE DE REVIEWS DECRESCENTE
                        'pros' => self::PROS_POOL[$position], // PROS DE EXEMPLO DA POSICAO
                        'contras' => self::CONTRAS_POOL[$position], // CONTRAS DE EXEMPLO DA POSICAO
                        'affiliate_link' => 'https://amazon.co.uk/dp/EXAMPLE?tag=ranked10-21', // LINK DE AFILIADO PLACEHOLDER
                        'image' => null, // SEM IMAGEM (O CARD MOSTRA O PLACEHOLDER SVG)
                        'summary' => "The {$brand} takes the number {$rank} spot in our {$topic} ranking. In our research it stood out for consistent results, sensible running costs and feedback from thousands of UK customers. It's well suited to everyday use, and while no product is perfect, the overall package here is hard to fault at this price point.", // RESUMO DE EXEMPLO DA REVIEW
                    ]);
                }
            }
        }
    }
}
