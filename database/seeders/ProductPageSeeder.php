<?php

namespace Database\Seeders; // NAMESPACE PADRAO DOS SEEDERS

use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

// ═══════════════════════════════════════════════════════════════════════════
// ═══ PAGINAS PROPRIAS DE PRODUTO — LE database/seeders/products/*.php ═══
//
// CADA ARQUIVO LIBERA A PAGINA DE **UM** PRODUTO. O PRODUTO E ENCONTRADO PELO ASIN
// DENTRO DO ARTIGO INFORMADO, ENTAO O ARQUIVO NAO PRECISA SABER DE ID NENHUM.
//
// ⚠ E OPT-IN E REVERSIVEL: SEM ARQUIVO, O PRODUTO NAO TEM slug, NAO TEM PAGINA E O
//   RANKING NAO MOSTRA LINK NENHUM. APAGAR O slug DESLIGA A PAGINA SEM APAGAR NADA.
//
// ⚠ REGRA ABSOLUTA DAS CITACOES (review_quotes): TEXTO COPIADO LITERALMENTE DE UMA
//   AVALIACAO PUBLICADA NA FICHA. NUNCA GERAR, RESUMIR NEM TRADUZIR. VER O COMENTARIO
//   NO TOPO DE resources/views/components/product-reviews.blade.php.
//
// ─── FORMATO DO ARQUIVO ───
//   return [
//     'article' => 'best-jump-starter',        // SLUG DO ARTIGO DONO
//     'asin' => 'B015TKUPIC',                  // ASIN DO PRODUTO DENTRO DAQUELE ARTIGO
//     'slug' => 'noco-boost-gb40',             // SEGMENTO DA URL: /{cat}/{artigo}/{slug}
//     'meta_title' => '...', 'meta_description' => '...',
//     'page_intro' => "Paragrafo um.\n\nParagrafo dois.",   // 1 A 2 PARAGRAFOS, NADA EXAGERADO
//     'harvested_at' => '2026-09-03 14:00:00', // QUANDO OS DADOS FORAM COLETADOS
//     'rating_breakdown' => [5 => 78, 4 => 12, 3 => 4, 2 => 2, 1 => 4],  // PORCENTAGENS
//     'tech_specs' => ['Brand|NOCO', 'Item weight|1.06 kg'],             // 'Label|Value'
//     'faq' => ['Pergunta?|Resposta.'],                                  // 'Q|A'
//     'review_quotes' => [ ['text' => '...', 'author' => '...', 'rating' => 5, 'verified' => true] ],
//   ];
// ═══════════════════════════════════════════════════════════════════════════

class ProductPageSeeder extends Seeder
{
    public function run(): void // PERCORRE OS ARQUIVOS E LIBERA CADA PAGINA DE PRODUTO
    {
        $files = glob(database_path('seeders/products/*.php')); // ACHA TODOS OS ARQUIVOS DE PAGINA
        sort($files); // ORDEM ESTAVEL ENTRE MAQUINAS

        foreach ($files as $file) {
            $this->liberaUm($file, require $file); // CARREGA O ARRAY E APLICA
        }
    }

    private function liberaUm(string $file, array $d): void // APLICA UM ARQUIVO A UM PRODUTO
    {
        $nome = basename($file); // NOME DO ARQUIVO, USADO NAS MENSAGENS

        $product = Product::whereHas('article', fn ($q) => $q->where('slug', $d['article'])) // O PRODUTO TEM QUE ESTAR NO ARTIGO INFORMADO
            ->where('affiliate_link', 'like', '%/dp/'.$d['asin'].'%') // ENCONTRADO PELO ASIN DENTRO DO LINK DE AFILIADO
            ->first(); // PEGA O PRIMEIRO (ASIN NAO SE REPETE DENTRO DE UM ARTIGO)

        if (! $product) { // NAO ACHOU: NAO ESCREVE NADA E AVISA ALTO
            $this->command?->error("  {$nome}: nao achei o ASIN {$d['asin']} no artigo {$d['article']}. PULADO.");

            return; // SAI SEM TOCAR NO BANCO
        }

        $jaTinha = filled($product->slug); // ⚠ DETECTA SE A PAGINA JA EXISTIA, PARA NAO SOBRESCREVER SEM AVISO

        $product->update([
            'slug' => $d['slug'],
            'meta_title' => $d['meta_title'],
            'meta_description' => $d['meta_description'],
            'page_intro' => $d['page_intro'],
            'rating_breakdown' => $d['rating_breakdown'] ?? null,
            'tech_specs' => $this->pares($d['tech_specs'] ?? [], 'label', 'value'), // EXPANDE 'Label|Value'
            'faq' => $this->pares($d['faq'] ?? [], 'q', 'a'), // EXPANDE 'Pergunta|Resposta'
            'review_quotes' => $d['review_quotes'] ?? [], // CITACOES LITERAIS, JA NO FORMATO DO COMPONENTE
            'harvested_at' => $d['harvested_at'] ?? null,
        ]);

        // ─── VALIDACAO: O QUE EU CONFERIRIA NA MAO DEPOIS ───
        $avisos = [];
        if (mb_strlen((string) $d['meta_title']) > 60) {
            $avisos[] = 'meta_title='.mb_strlen($d['meta_title']).' (>60)';
        }
        if (mb_strlen((string) $d['meta_description']) > 160) {
            $avisos[] = 'meta_description='.mb_strlen($d['meta_description']).' (>160)';
        }
        if (! str_contains(mb_strtolower($d['meta_title']), mb_strtolower(explode(' ', trim($product->name))[0]))) {
            $avisos[] = 'meta_title nao cita a marca do produto'; // O PEDIDO FOI: NOME DO PRODUTO EM TUDO
        }
        $soma = array_sum($d['rating_breakdown'] ?? []); // A DISTRIBUICAO E EM PORCENTAGEM
        if ($soma > 0 && ($soma < 97 || $soma > 103)) { // ARREDONDAMENTO DA AMAZON RARAMENTE FECHA EXATO EM 100
            $avisos[] = "rating_breakdown soma {$soma}% (esperado ~100)";
        }
        if (count($d['review_quotes'] ?? []) < 1) {
            $avisos[] = 'sem citacao de cliente';
        }

        $marca = $jaTinha ? '[ATUALIZADO]' : '[nova]'; // AVISA SE A PAGINA JA EXISTIA
        $linha = "  {$marca} {$product->page_url}";
        $avisos === []
            ? $this->command?->info($linha)
            : $this->command?->warn($linha.' ⚠ '.implode(' | ', $avisos));
    }

    private function pares(array $linhas, string $chaveA, string $chaveB): array // CONVERTE 'A|B' NO ARRAY QUE A VIEW ESPERA
    {
        return array_values(array_filter(array_map(function (string $linha) use ($chaveA, $chaveB) {
            $p = array_map('trim', explode('|', $linha, 2)); // QUEBRA NO PRIMEIRO PIPE: O VALOR PODE CONTER PIPE

            return [$chaveA => $p[0] ?? '', $chaveB => $p[1] ?? ''];
        }, $linhas), fn ($par) => $par[$chaveA] !== '')); // DESCARTA LINHA SEM ROTULO
    }
}
