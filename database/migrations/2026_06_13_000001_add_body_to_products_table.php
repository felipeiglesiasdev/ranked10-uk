<?php

use Illuminate\Database\Migrations\Migration; // IMPORTA A CLASSE BASE DE MIGRATION
use Illuminate\Database\Schema\Blueprint; // IMPORTA O BLUEPRINT PARA DEFINIR AS COLUNAS
use Illuminate\Support\Facades\Schema; // IMPORTA A FACADE SCHEMA PARA ALTERAR TABELAS

return new class extends Migration
{
    public function up(): void // ADICIONA A COLUNA BODY NA TABELA PRODUCTS
    {
        Schema::table('products', function (Blueprint $table) {
            $table->longText('body')->nullable()->after('summary'); // TEXTO SEO LONGO EXIBIDO ABAIXO DO CARD DO PRODUTO
        });
    }

    public function down(): void // DESFAZ A MIGRATION REMOVENDO A COLUNA BODY
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('body'); // REMOVE A COLUNA BODY SE A MIGRATION FOR REVERTIDA
        });
    }
};
