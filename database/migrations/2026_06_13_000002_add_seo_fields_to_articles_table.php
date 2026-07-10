<?php

use Illuminate\Database\Migrations\Migration; // IMPORTA A CLASSE BASE DE MIGRATION
use Illuminate\Database\Schema\Blueprint; // IMPORTA O BLUEPRINT PARA DEFINIR AS COLUNAS
use Illuminate\Support\Facades\Schema; // IMPORTA A FACADE SCHEMA PARA ALTERAR TABELAS

return new class extends Migration
{
    public function up(): void // ADICIONA OS CAMPOS DE SEO NA TABELA ARTICLES
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('meta_title', 70)->nullable()->after('title'); // TITLE DA ABA/GOOGLE (PODE DIFERIR DO H1)
            $table->string('meta_description', 180)->nullable()->after('meta_title'); // META DESCRIPTION DA BUSCA
        });
    }

    public function down(): void // DESFAZ A MIGRATION REMOVENDO OS CAMPOS DE SEO
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['meta_title', 'meta_description']); // REMOVE AS DUAS COLUNAS SE A MIGRATION FOR REVERTIDA
        });
    }
};
