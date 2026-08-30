<?php

use Illuminate\Database\Migrations\Migration; // IMPORTA A CLASSE BASE DE MIGRATION
use Illuminate\Database\Schema\Blueprint; // IMPORTA O BLUEPRINT PARA DEFINIR AS COLUNAS
use Illuminate\Support\Facades\Schema; // IMPORTA A FACADE SCHEMA

return new class extends Migration
{
    // ⚠ TODAS AS COLUNAS SAO NULAVEIS DE PROPOSITO.
    // OS 76 ARTIGOS JA PUBLICADOS CONTINUAM EXATAMENTE COMO ESTAO E AS VIEWS SIMPLESMENTE NAO
    // RENDERIZAM ESTES BLOCOS QUANDO ELES ESTAO VAZIOS. A ADOCAO E ARTIGO A ARTIGO, SEM
    // MIGRACAO DE CONTEUDO E SEM TRABALHO RETROATIVO OBRIGATORIO.
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // METODOLOGIA ESPECIFICA DESTA LISTA: O QUE FOI MEDIDO NESTA CATEGORIA, QUAL FOI O
            // CRITERIO DE CORTE E O QUE FICOU DE FORA. E DIFERENTE DA PAGINA /how-we-rank, QUE
            // DESCREVE O METODO DO SITE INTEIRO — ESTE CAMPO E O RECIBO DESTE ARTIGO.
            $table->json('how_we_rank')->nullable()->after('conclusion'); // BLOCO "HOW WE RANK" DO ARTIGO
        });

        Schema::table('products', function (Blueprint $table) {
            // FICHA TECNICA DO PRODUTO: OS NUMEROS QUE EXPLICAM POR QUE ELE ESTA NESTA POSICAO.
            // CADA LINHA CARREGA UM VEREDITO (good/bad/neutral) PARA O LEITOR ENXERGAR NUM RELANCE
            // O QUE PESOU A FAVOR E O QUE PESOU CONTRA, EM VEZ DE TER QUE LER TRES PARAGRAFOS.
            $table->json('specs')->nullable()->after('contras'); // TABELA DE CARACTERISTICAS

            // ⚠ TRECHOS DE AVALIACOES REAIS DE CLIENTES DA AMAZON.
            // ESTE CAMPO SO PODE CONTER TEXTO REALMENTE COLETADO DA FICHA DO PRODUTO, CITADO
            // LITERALMENTE E ATRIBUIDO. NUNCA GERAR, RESUMIR NEM "MELHORAR" UMA AVALIACAO: UMA
            // CITACAO INVENTADA E UM DEPOIMENTO FALSO, E DESTROI EXATAMENTE A CONFIANCA QUE O
            // BLOCO EXISTE PARA CONSTRUIR.
            $table->json('review_quotes')->nullable()->after('specs'); // CITACOES DE AVALIACOES REAIS
        });
    }

    public function down(): void // DESFAZ A MIGRATION REMOVENDO AS COLUNAS
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('how_we_rank'); // REMOVE O BLOCO DE METODOLOGIA
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['specs', 'review_quotes']); // REMOVE A FICHA E AS CITACOES
        });
    }
};
