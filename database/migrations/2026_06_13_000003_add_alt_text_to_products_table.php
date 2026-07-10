<?php

use Illuminate\Database\Migrations\Migration; // IMPORTA A CLASSE BASE DE MIGRATION
use Illuminate\Database\Schema\Blueprint; // IMPORTA O BLUEPRINT PARA DEFINIR AS COLUNAS
use Illuminate\Support\Facades\Schema; // IMPORTA A FACADE SCHEMA PARA ALTERAR TABELAS

return new class extends Migration
{
    public function up(): void // ADICIONA A COLUNA DE TEXTO ALTERNATIVO DA IMAGEM
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('alt_text', 160)->nullable()->after('image'); // TEXTO ALT DESCRITIVO DA IMAGEM (SEO DE IMAGEM); FALLBACK = NOME DO PRODUTO
        });
    }

    public function down(): void // DESFAZ A MIGRATION REMOVENDO A COLUNA
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('alt_text'); // REMOVE A COLUNA ALT_TEXT SE A MIGRATION FOR REVERTIDA
        });
    }
};
