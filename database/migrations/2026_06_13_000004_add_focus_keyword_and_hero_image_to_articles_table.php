<?php

use Illuminate\Database\Migrations\Migration; // IMPORTA A CLASSE BASE DE MIGRATION
use Illuminate\Database\Schema\Blueprint; // IMPORTA O BLUEPRINT PARA DEFINIR AS COLUNAS
use Illuminate\Support\Facades\Schema; // IMPORTA A FACADE SCHEMA PARA ALTERAR TABELAS

return new class extends Migration
{
    public function up(): void // ADICIONA OS CAMPOS DE SEO ON-PAGE NA TABELA ARTICLES
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('focus_keyword', 100)->nullable()->after('meta_description'); // PALAVRA-CHAVE PRINCIPAL (REPETE NO TEXTO, VIRA O ALT DA IMAGEM E DEVE ESTAR NO TITULO/DESC/URL)
            $table->string('hero_image', 512)->nullable()->after('focus_keyword'); // URL DA IMAGEM PRINCIPAL (HERO) NO CDN R2, EM WEBP
        });
    }

    public function down(): void // DESFAZ A MIGRATION REMOVENDO OS CAMPOS
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['focus_keyword', 'hero_image']); // REMOVE AS DUAS COLUNAS SE A MIGRATION FOR REVERTIDA
        });
    }
};
