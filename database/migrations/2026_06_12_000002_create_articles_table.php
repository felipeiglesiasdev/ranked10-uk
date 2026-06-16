<?php

use Illuminate\Database\Migrations\Migration; // IMPORTA A CLASSE BASE DE MIGRATION
use Illuminate\Database\Schema\Blueprint; // IMPORTA O BLUEPRINT PARA DEFINIR AS COLUNAS
use Illuminate\Support\Facades\Schema; // IMPORTA A FACADE SCHEMA PARA CRIAR/REMOVER TABELAS

return new class extends Migration
{
    public function up(): void // CRIA A TABELA DE ARTIGOS
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // CHAVE PRIMARIA AUTO INCREMENT
            $table->foreignId('category_id')->constrained('categories'); // FK PARA A TABELA CATEGORIES
            $table->string('slug')->unique(); // SLUG UNICO USADO NA URL
            $table->string('title'); // TITULO DO ARTIGO
            $table->text('intro'); // TEXTO DE INTRODUCAO DO ARTIGO
            $table->text('conclusion'); // TEXTO DE CONCLUSAO DO ARTIGO
            $table->string('author')->default('Editorial Team'); // AUTOR DO ARTIGO COM VALOR PADRAO
            $table->timestamp('published_at')->nullable(); // DATA DE PUBLICACAO (NULA = RASCUNHO)
            $table->timestamps(); // COLUNAS CREATED_AT E UPDATED_AT
        });
    }

    public function down(): void // DESFAZ A MIGRATION REMOVENDO A TABELA
    {
        Schema::dropIfExists('articles'); // REMOVE A TABELA DE ARTIGOS SE EXISTIR
    }
};
