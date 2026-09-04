<?php

use Illuminate\Database\Migrations\Migration; // IMPORTA A CLASSE BASE DAS MIGRATIONS
use Illuminate\Database\Schema\Blueprint; // IMPORTA O BLUEPRINT DE TABELA
use Illuminate\Support\Facades\Schema; // IMPORTA A FACADE DE SCHEMA

// ═══════════════════════════════════════════════════════════════════════════
// PAGINA PROPRIA DE PRODUTO
//
// CADA PRODUTO DE UM RANKING PODE GANHAR UMA PAGINA EM
//   /{categoria}/{artigo}/{produto}
//
// ⚠ E OPT-IN: A PAGINA SO EXISTE — E O LINK "Read our full review" SO APARECE NO
//   RANKING — QUANDO O PRODUTO TEM slug PREENCHIDO. PRODUTO SEM slug SEGUE EXATAMENTE
//   COMO ESTAVA. ISSO PERMITE LIBERAR PRODUTO A PRODUTO SEM MEXER NOS OUTROS 1.049.
//
// COMENTARIOS: A TABELA comments GANHA product_id NULO. COMENTARIO DE ARTIGO CONTINUA
//   COM product_id NULO; COMENTARIO DE PAGINA DE PRODUTO GRAVA OS DOIS (article_id DO
//   ARTIGO DONO + product_id). ASSIM NENHUMA COLUNA EXISTENTE VIRA NULLABLE E OS
//   COMENTARIOS JA GRAVADOS CONTINUAM VALIDOS.
// ═══════════════════════════════════════════════════════════════════════════

return new class extends Migration
{
    public function up(): void // ADICIONA OS CAMPOS DA PAGINA DE PRODUTO
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug', 191)->nullable()->after('position'); // SLUG DA PAGINA — NULO SIGNIFICA "SEM PAGINA"
            $table->string('meta_title')->nullable()->after('slug'); // TITULO SEO DA PAGINA DO PRODUTO
            $table->string('meta_description')->nullable()->after('meta_title'); // META DESCRIPTION DA PAGINA DO PRODUTO
            $table->text('page_intro')->nullable()->after('meta_description'); // 1 A 2 PARAGRAFOS SOBRE O PRODUTO (NADA EXAGERADO)
            $table->json('rating_breakdown')->nullable()->after('review_quotes'); // DISTRIBUICAO DAS AVALIACOES: {"5":78,"4":12,...} EM PORCENTAGEM
            $table->json('tech_specs')->nullable()->after('rating_breakdown'); // FICHA TECNICA DA AMAZON (label/value), SEPARADA DA specs EDITORIAL
            $table->json('faq')->nullable()->after('tech_specs'); // PERGUNTAS FREQUENTES DA PAGINA: [{"q":"...","a":"..."}]
            $table->timestamp('harvested_at')->nullable()->after('faq'); // QUANDO OS DADOS FORAM COLETADOS NA AMAZON (SAI NO AVISO DE ORIGEM)

            $table->unique('slug'); // O SLUG E A CHAVE DA URL: NAO PODE REPETIR
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreignId('product_id')->nullable()->after('article_id')->constrained()->cascadeOnDelete(); // NULO = COMENTARIO DO ARTIGO; PREENCHIDO = COMENTARIO DA PAGINA DO PRODUTO
        });
    }

    public function down(): void // DESFAZ NA ORDEM INVERSA
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['product_id']); // REMOVE A CHAVE ESTRANGEIRA ANTES DA COLUNA
            $table->dropColumn('product_id'); // REMOVE A COLUNA
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique(['slug']); // REMOVE O INDICE UNICO ANTES DA COLUNA
            $table->dropColumn(['slug', 'meta_title', 'meta_description', 'page_intro', 'rating_breakdown', 'tech_specs', 'faq', 'harvested_at']); // REMOVE OS CAMPOS DA PAGINA
        });
    }
};
