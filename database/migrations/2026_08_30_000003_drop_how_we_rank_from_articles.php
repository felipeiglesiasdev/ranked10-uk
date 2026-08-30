<?php

use Illuminate\Database\Migrations\Migration; // IMPORTA A CLASSE BASE DE MIGRATION
use Illuminate\Database\Schema\Blueprint; // IMPORTA O BLUEPRINT PARA DEFINIR AS COLUNAS
use Illuminate\Support\Facades\Schema; // IMPORTA A FACADE SCHEMA

// REMOVE O CAMPO how_we_rank.
//
// A SECAO "How we rank" DENTRO DO ARTIGO FOI DESCARTADA POR DECISAO DO FELIPE EM 30/08/2026,
// JUNTO COM A PAGINA /how-we-rank. ELA EXPLICAVA A METODOLOGIA ANTES DA LISTA, E A DIRECAO DO
// PROJETO E OUTRA: **E UM TOP 10, O LEITOR VEIO ESCOLHER E COMPRAR.**
//
// ⚠ SO O how_we_rank SAI. AS COLUNAS specs E review_quotes, CRIADAS NA MESMA MIGRATION ANTERIOR,
// CONTINUAM — A FICHA COMPARATIVA E AS CITACOES DE AVALIACAO SERVEM AO TOP 10 E FORAM PEDIDAS.
return new class extends Migration
{
    public function up(): void // REMOVE A COLUNA
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('how_we_rank'); // REMOVE O BLOCO DE METODOLOGIA POR ARTIGO
        });
    }

    public function down(): void // RECRIA A COLUNA VAZIA (O CONTEUDO NAO VOLTA, ELE VIVIA NO SEEDER)
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->json('how_we_rank')->nullable()->after('conclusion'); // MESMA DEFINICAO DA MIGRATION QUE A CRIOU
        });
    }
};
