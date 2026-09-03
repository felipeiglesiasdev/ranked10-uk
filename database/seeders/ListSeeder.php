<?php

namespace Database\Seeders; // NAMESPACE PADRAO DOS SEEDERS

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

// ═══════════════════════════════════════════════════════════════════════════
// ═══ SEEDER GENERICO DE LISTAS — LE database/seeders/lists/data/*.php ═══
//
// POR QUE ISTO EXISTE: MEDIDO EM 03/09/2026 SOBRE 11 SEEDERS (358 KB), 45% DO ARQUIVO ERA
// ANDAIME — 26,9% DE BOILERPLATE/SINTAXE E 18,1% DE LINHAS DE specs. TEXTO DE VERDADE
// (body + intro + conclusion) ERA SO 14,3%. ESTE SEEDER TIRA O ANDAIME DA MAO: CADA ARTIGO
// NOVO VIRA **UM ARQUIVO DE DADOS**, QUASE 100% CONTEUDO EDITAVEL.
//
// ⚠ OS SEEDERS ANTIGOS EM lists/*.php CONTINUAM VALENDO E NAO PRECISAM SER MIGRADOS.
//   OS DOIS FORMATOS CONVIVEM. ESTE AQUI E SO PARA ARTIGO NOVO.
//
// ⚠ NAO PRECISA MAIS REGISTRAR ARTIGO NO DatabaseSeeder: ELE ACHA O ARQUIVO SOZINHO.
//
// ─── FORMATO DO ARQUIVO DE DADOS (database/seeders/lists/data/<slug>.php) ───
//   return [
//     'category' => 'garden',                  // SO O SLUG — nome e descricao vem do mapa abaixo
//     'slug' => 'best-x', 'title' => '...', 'meta_title' => '...', 'meta_description' => '...',
//     'focus_keyword' => '...', 'published_at' => '2026-09-03 08:30:00',
//     'intro' => '...', 'conclusion' => '...',
//     'products' => [
//       [
//         'Nome do produto',                    // 0 NOME
//         '£127.74', 4.0, 609,                  // 1 PRECO  2 NOTA  3 Nº AVALIACOES
//         'B08XY3ZWLZ',                         // 4 ASIN — o link de afiliado e montado com a tag
//         '71wdVvw8OrL',                        // 5 ID DA IMAGEM — a URL _AC_SL1500_ e montada
//         'alt text',                           // 6 ALT (o do produto #1 tem que ser a focus keyword)
//         'summary...',                         // 7 FRASE DO CARD
//         'body...',                            // 8 TEXTO (3 PARAGRAFOS)
//         ['pro', 'pro', ...],                  // 9 PROS (4-5)
//         ['contra', ...],                      // 10 CONTRAS (3-4)
//         ['Label|Valor|good|Nota opcional', 'Label|Valor|neutral'], // 11 SPECS (5-6, nota opcional)
//       ],
//     ],
//   ];
//
// VERDICTS ACEITOS EM SPECS: good | neutral | bad.
// ═══════════════════════════════════════════════════════════════════════════

class ListSeeder extends Seeder
{
    private const TAG = 'ranked10-21'; // TAG DE ASSOCIADOS — MONTA O LINK A PARTIR DO ASIN

    private const AUTHOR = 'Felipe Iglesias'; // AUTOR PADRAO — TEM QUE BATER COM config/authors.php

    // MAPA CANONICO DAS CATEGORIAS. O ARQUIVO DE DADOS PASSA SO O SLUG, ENTAO E IMPOSSIVEL
    // SOBRESCREVER A DESCRICAO DE UMA CATEGORIA POR ENGANO (ERRO POSSIVEL NO FORMATO ANTIGO).
    private const CATEGORIES = [
        'fitness' => ['Fitness', 'Research-led guides to the best fitness gear, from home gym kit to workout clothing.'],
        'garden' => ['Garden', 'Independent, research-led buying guides to the best garden tools and outdoor equipment available in the UK.'],
        'home' => ['Home', 'Honest, research-led buying guides for the best home and cooling gadgets available in the UK.'],
        'home-office' => ['Home & Office', 'Kit to make working from home more comfortable and productive, ranked for UK buyers.'],
        'kitchen' => ['Kitchen', 'Honest, research-led buying guides for the best kitchen gadgets and appliances available in the UK.'],
        'pet-supplies' => ['Pet Supplies', 'Everything your furry friends need, ranked by quality, comfort and value.'],
        'tech' => ['Tech', 'Independent, research-led buying guides to the best phones, gadgets and tech available in the UK.'],
    ];

    public function run(): void // PERCORRE OS ARQUIVOS DE DADOS E POPULA CADA LISTA DE FORMA IDEMPOTENTE
    {
        $files = glob(database_path('seeders/lists/data/*.php')); // ACHA TODOS OS ARQUIVOS DE DADOS
        sort($files); // ORDEM ESTAVEL ENTRE MAQUINAS

        foreach ($files as $file) {
            $this->seedOne($file, require $file); // CARREGA O ARRAY E SEMEIA
        }
    }

    private function seedOne(string $file, array $d): void // SEMEIA UM ARTIGO E VALIDA O QUE ANTES EU CONFERIA NA MAO
    {
        $name = basename($file); // NOME DO ARQUIVO, USADO NAS MENSAGENS DE ERRO
        $avisos = []; // ACUMULA OS PROBLEMAS ENCONTRADOS PARA IMPRIMIR NO FIM

        if (! isset(self::CATEGORIES[$d['category'] ?? ''])) { // CATEGORIA DESCONHECIDA E ERRO FATAL: PARA ANTES DE ESCREVER
            $this->command?->error("  {$name}: categoria '".($d['category'] ?? '')."' nao existe no mapa. PULADO.");

            return; // NAO ESCREVE NADA
        }

        [$catName, $catDesc] = self::CATEGORIES[$d['category']]; // NOME E DESCRICAO CANONICOS DA CATEGORIA
        $categoria = Category::updateOrCreate(['slug' => $d['category']], ['slug' => $d['category'], 'name' => $catName, 'description' => $catDesc]); // CRIA/ATUALIZA A CATEGORIA

        $jaExistia = Article::where('slug', $d['slug'])->exists(); // ⚠ DETECTA COLISAO DE SLUG ANTES DE GRAVAR

        $artigo = Article::updateOrCreate(['slug' => $d['slug']], [ // CRIA/ATUALIZA O ARTIGO (NAO DUPLICA)
            'category_id' => $categoria->id,
            'slug' => $d['slug'],
            'title' => $d['title'],
            'meta_title' => $d['meta_title'],
            'meta_description' => $d['meta_description'],
            'focus_keyword' => $d['focus_keyword'],
            'intro' => $d['intro'],
            'conclusion' => $d['conclusion'],
            'author' => $d['author'] ?? self::AUTHOR,
            'published_at' => $d['published_at'], // SEMPRE STRING FIXA, NUNCA now()
        ]);

        $artigo->products()->delete(); // LIMPA OS PRODUTOS ANTES DE REGRAVAR (MANTEM A LISTA EXATA DO ARQUIVO)

        foreach (array_values($d['products']) as $i => $p) { // GRAVA OS PRODUTOS NA ORDEM DO ARQUIVO
            $artigo->products()->create([
                'position' => $i + 1, // POSICAO VEM DO INDICE: NAO PRECISA ESCREVER
                'name' => $p[0],
                'price' => $p[1],
                'rating' => $p[2],
                'reviews_count' => $p[3],
                'affiliate_link' => 'https://www.amazon.co.uk/dp/'.$p[4].'?tag='.self::TAG, // MONTADO DO ASIN: TAG NUNCA FALTA
                'image' => 'https://m.media-amazon.com/images/I/'.$p[5].'._AC_SL1500_.jpg', // MONTADO DO ID DA IMAGEM
                'alt_text' => $p[6],
                'summary' => $p[7],
                'body' => $p[8],
                'pros' => $p[9],
                'contras' => $p[10],
                'specs' => $this->specs($p[11] ?? []), // EXPANDE A NOTACAO COM BARRA
                'review_quotes' => $p[12] ?? [],
            ]);
        }

        // ─── VALIDACAO AUTOMATICA: SUBSTITUI A QUERY DE VERIFICACAO QUE EU RODAVA NA MAO ───
        $produtos = $artigo->products()->get(); // RELE O QUE FOI GRAVADO
        $n = $produtos->count();
        if ($n !== 10) {
            $avisos[] = "produtos={$n} (esperado 10)";
        }
        if (($mt = mb_strlen($d['meta_title'])) > 60) {
            $avisos[] = "meta_title={$mt} (>60)"; // mb_strlen: o £ tem 2 bytes
        }
        if (($md = mb_strlen($d['meta_description'])) > 160) {
            $avisos[] = "meta_description={$md} (>160)";
        }
        if (empty($d['focus_keyword'])) {
            $avisos[] = 'sem focus_keyword';
        }
        if (strtotime($d['published_at']) > time()) {
            $avisos[] = 'published_at no futuro (o ArticleController devolve 404)';
        }
        if ($produtos->whereNull('alt_text')->count() || $produtos->where('alt_text', '')->count()) {
            $avisos[] = 'produto sem alt_text';
        }
        if (($primeiro = $produtos->firstWhere('position', 1)) && $primeiro->alt_text !== $d['focus_keyword']) {
            $avisos[] = 'alt_text do #1 nao e a focus keyword (vira o og:image)';
        }
        $asins = $produtos->map(fn ($x) => substr($x->affiliate_link, strpos($x->affiliate_link, '/dp/') + 4, 10));
        if (($dup = $asins->duplicates()->count()) > 0) {
            $avisos[] = "ASIN duplicado x{$dup}";
        }

        $marca = $jaExistia ? '[ATUALIZADO]' : '[novo]'; // ⚠ AVISA SE O SLUG JA EXISTIA — PEGA SOBRESCRITA ACIDENTAL
        $linha = "  {$marca} /{$d['category']}/{$d['slug']} ({$n} produtos)";
        $avisos === []
            ? $this->command?->info($linha)
            : $this->command?->warn($linha.' ⚠ '.implode(' | ', $avisos));
    }

    private function specs(array $linhas): array // CONVERTE 'Label|Valor|good|Nota' NO ARRAY QUE A VIEW ESPERA
    {
        return array_map(function (string $linha) {
            $p = array_map('trim', explode('|', $linha)); // QUEBRA NOS PIPES E LIMPA ESPACOS

            return array_filter([
                'label' => $p[0] ?? '',
                'value' => $p[1] ?? '',
                'verdict' => $p[2] ?? 'neutral', // PADRAO NEUTRO SE NAO DECLARADO
                'note' => $p[3] ?? null, // NOTA E OPCIONAL: SAI DO ARRAY SE NAO EXISTIR
            ], fn ($v) => $v !== null && $v !== '');
        }, $linhas);
    }
}
