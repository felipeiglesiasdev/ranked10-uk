<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder; // IMPORTA O BUILDER PARA TIPAR OS SCOPES
use Illuminate\Database\Eloquent\Model; // IMPORTA A CLASSE BASE DOS MODELS
use Illuminate\Database\Eloquent\Relations\BelongsTo; // IMPORTA O TIPO DE RETORNO DO BELONGSTO

class Product extends Model
{
    protected $fillable = ['article_id', 'position', 'name', 'price', 'rating', 'reviews_count', 'pros', 'contras', 'affiliate_link', 'image', 'alt_text', 'summary', 'body']; // CAMPOS PERMITIDOS NO PREENCHIMENTO EM MASSA (BODY = TEXTO SEO LONGO; ALT_TEXT = ALT DA IMAGEM)

    protected $casts = ['pros' => 'array', 'contras' => 'array']; // CONVERTE AS COLUNAS JSON PARA ARRAYS PHP AUTOMATICAMENTE

    public function article(): BelongsTo // RELACIONAMENTO: O PRODUTO PERTENCE A UM ARTIGO
    {
        return $this->belongsTo(Article::class); // RETORNA O ARTIGO DONO DO PRODUTO
    }

    public function getUrlAttribute(): ?string // URL INTERNA DO PRODUTO = ARTIGO + ANCORA DA POSICAO (USADA NOS BLOCOS DE LINKS INTERNOS)
    {
        $article = $this->article; // ARTIGO DONO DO PRODUTO
        if (! $article || ! $article->category) { // SEM ARTIGO OU CATEGORIA NAO HA COMO MONTAR A ROTA
            return null; // RETORNA NULO PARA A VIEW SIMPLESMENTE NAO LINKAR
        }
        return route('article', [$article->category, $article]).'#product-'.$this->position; // LINK PROFUNDO DIRETO NO CARD DO PRODUTO
    }

    public function scopeMelhorAvaliados(Builder $query, int $votosMinimos = 500): Builder // ORDENA POR NOTA PONDERADA PELO VOLUME DE AVALIACOES
    {
        // POR QUE PONDERAR: ORDENAR SO POR rating COLOCA UM 5.0 COM 1 AVALIACAO NA FRENTE DE UM 4.7 COM 175.000.
        // A FORMULA BAYESIANA ABAIXO (MESMA IDEIA DO RANKING DO IMDB) PUXA NOTAS COM POUCA AMOSTRA PARA A MEDIA GERAL,
        // ENTAO SO SOBE QUEM TEM NOTA ALTA *E* VOLUME DE AVALIACOES SUFICIENTE PARA SUSTENTA-LA.
        $mediaGeral = (float) (static::query()->whereNotNull('rating')->avg('rating') ?: 4.5); // MEDIA DE TODAS AS NOTAS DO SITE (FALLBACK 4.5)

        return $query
            ->whereNotNull('rating') // IGNORA PRODUTOS SEM NOTA
            ->where('reviews_count', '>', 0) // IGNORA PRODUTOS SEM NENHUMA AVALIACAO
            ->whereHas('article', fn (Builder $q) => $q->publicados()) // SO PRODUTOS DE ARTIGOS JA PUBLICADOS
            ->selectRaw('products.*, ((reviews_count / (reviews_count + ?)) * rating) + ((? / (reviews_count + ?)) * ?) as nota_ponderada', [$votosMinimos, $votosMinimos, $votosMinimos, $mediaGeral]) // CALCULA A NOTA PONDERADA NO BANCO
            ->orderByDesc('nota_ponderada') // MELHOR NOTA PONDERADA PRIMEIRO
            ->orderByDesc('reviews_count'); // DESEMPATA PELO VOLUME DE AVALIACOES
    }
}
