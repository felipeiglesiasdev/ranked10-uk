<?php

use Illuminate\Database\Migrations\Migration; // IMPORTA A CLASSE BASE DE MIGRATION
use Illuminate\Database\Schema\Blueprint; // IMPORTA O BLUEPRINT PARA DEFINIR AS COLUNAS
use Illuminate\Support\Facades\Schema; // IMPORTA A FACADE SCHEMA PARA CRIAR/REMOVER TABELAS

return new class extends Migration
{
    public function up(): void // CRIA A TABELA DE COMENTARIOS (UGC SEM LOGIN)
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // CHAVE PRIMARIA AUTO INCREMENT
            $table->foreignId('article_id')->constrained()->cascadeOnDelete(); // FK PARA ARTICLES: APAGAR O ARTIGO APAGA OS COMENTARIOS
            $table->foreignId('parent_id')->nullable()->constrained('comments')->cascadeOnDelete(); // RESPOSTA A OUTRO COMENTARIO (1 NIVEL); NULO = COMENTARIO RAIZ
            $table->string('author_name', 60); // NOME EXIBIDO (SEM LOGIN, ENTAO E TEXTO LIVRE E CURTO)
            $table->string('author_email')->nullable(); // EMAIL OPCIONAL — NUNCA E RENDERIZADO NA PAGINA, SERVE SO PARA CONTATO/NOTIFICACAO FUTURA
            $table->text('body'); // TEXTO DO COMENTARIO (SEMPRE ESCAPADO NA EXIBICAO, NUNCA HTML CRU)
            $table->string('status', 20)->default('pending'); // pending | approved | spam — POLITICA HIBRIDA DE MODERACAO
            $table->string('held_reason')->nullable(); // POR QUE FICOU PENDENTE (APARECE NO php artisan comments:pending)
            $table->char('ip_hash', 64)->nullable(); // SHA-256 DO IP + APP_KEY: PERMITE DETECTAR ABUSO SEM GUARDAR IP EM CLARO (GDPR)
            $table->string('user_agent', 255)->nullable(); // USER AGENT TRUNCADO, SO PARA ANALISE DE SPAM
            $table->timestamps(); // CREATED_AT E UPDATED_AT

            $table->index(['article_id', 'status', 'created_at']); // INDICE DA CONSULTA DA PAGINA: COMENTARIOS APROVADOS DE UM ARTIGO EM ORDEM
            $table->index(['status', 'created_at']); // INDICE DA FILA DE MODERACAO (TODOS OS PENDENTES DO SITE)
            $table->index('ip_hash'); // INDICE PARA CHECAR REINCIDENCIA DO MESMO AUTOR
        });
    }

    public function down(): void // DESFAZ A MIGRATION REMOVENDO A TABELA
    {
        Schema::dropIfExists('comments'); // REMOVE A TABELA DE COMENTARIOS SE EXISTIR
    }
};
