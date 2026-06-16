<?php

use Illuminate\Database\Migrations\Migration; // IMPORTA A CLASSE BASE DE MIGRATION
use Illuminate\Database\Schema\Blueprint; // IMPORTA O BLUEPRINT PARA DEFINIR AS COLUNAS
use Illuminate\Support\Facades\Schema; // IMPORTA A FACADE SCHEMA PARA CRIAR/REMOVER TABELAS

return new class extends Migration
{
    public function up(): void // CRIA A TABELA DE CATEGORIAS
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // CHAVE PRIMARIA AUTO INCREMENT
            $table->string('slug')->unique(); // SLUG UNICO USADO NA URL
            $table->string('name'); // NOME DA CATEGORIA EXIBIDO NO SITE
            $table->text('description')->nullable(); // DESCRICAO OPCIONAL DA CATEGORIA
            $table->timestamps(); // COLUNAS CREATED_AT E UPDATED_AT
        });
    }

    public function down(): void // DESFAZ A MIGRATION REMOVENDO A TABELA
    {
        Schema::dropIfExists('categories'); // REMOVE A TABELA DE CATEGORIAS SE EXISTIR
    }
};
