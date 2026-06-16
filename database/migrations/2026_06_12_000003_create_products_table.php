<?php

use Illuminate\Database\Migrations\Migration; // IMPORTA A CLASSE BASE DE MIGRATION
use Illuminate\Database\Schema\Blueprint; // IMPORTA O BLUEPRINT PARA DEFINIR AS COLUNAS
use Illuminate\Support\Facades\Schema; // IMPORTA A FACADE SCHEMA PARA CRIAR/REMOVER TABELAS

return new class extends Migration
{
    public function up(): void // CRIA A TABELA DE PRODUTOS
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // CHAVE PRIMARIA AUTO INCREMENT
            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade'); // FK PARA ARTICLES COM EXCLUSAO EM CASCATA
            $table->integer('position'); // POSICAO DO PRODUTO NO RANKING (1 A 10)
            $table->string('name'); // NOME DO PRODUTO
            $table->string('price'); // PRECO FORMATADO COMO TEXTO (EX: £79.99)
            $table->decimal('rating', 2, 1)->nullable(); // NOTA MEDIA DO PRODUTO (EX: 4.7)
            $table->integer('reviews_count')->default(0); // QUANTIDADE DE AVALIACOES NA AMAZON
            $table->json('pros'); // LISTA DE PONTOS POSITIVOS EM JSON
            $table->json('contras'); // LISTA DE PONTOS NEGATIVOS EM JSON
            $table->text('affiliate_link'); // LINK DE AFILIADO DA AMAZON
            $table->text('image')->nullable(); // URL DA IMAGEM DO PRODUTO
            $table->text('summary'); // TEXTO DA REVIEW INDIVIDUAL DO PRODUTO
            $table->timestamps(); // COLUNAS CREATED_AT E UPDATED_AT
        });
    }

    public function down(): void // DESFAZ A MIGRATION REMOVENDO A TABELA
    {
        Schema::dropIfExists('products'); // REMOVE A TABELA DE PRODUTOS SE EXISTIR
    }
};
