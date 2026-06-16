<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder; // IMPORTA O BUILDER PARA TIPAR O SCOPE
use Illuminate\Database\Eloquent\Model; // IMPORTA A CLASSE BASE DOS MODELS
use Illuminate\Database\Eloquent\Relations\BelongsTo; // IMPORTA O TIPO DE RETORNO DO BELONGSTO
use Illuminate\Database\Eloquent\Relations\HasMany; // IMPORTA O TIPO DE RETORNO DO HASMANY

class Article extends Model
{
    protected $fillable = ['category_id', 'slug', 'title', 'intro', 'conclusion', 'author', 'published_at']; // CAMPOS PERMITIDOS NO PREENCHIMENTO EM MASSA

    protected $casts = ['published_at' => 'datetime']; // CONVERTE PUBLISHED_AT PARA OBJETO CARBON

    public function getRouteKeyName(): string // DEFINE O CAMPO USADO NO ROUTE MODEL BINDING
    {
        return 'slug'; // USA O SLUG EM VEZ DO ID NAS URLS
    }

    public function category(): BelongsTo // RELACIONAMENTO: O ARTIGO PERTENCE A UMA CATEGORIA
    {
        return $this->belongsTo(Category::class); // RETORNA A CATEGORIA DONA DO ARTIGO
    }

    public function products(): HasMany // RELACIONAMENTO: UM ARTIGO TEM MUITOS PRODUTOS
    {
        return $this->hasMany(Product::class)->orderBy('position'); // RETORNA OS PRODUTOS SEMPRE ORDENADOS PELA POSICAO NO RANKING
    }

    public function scopePublicados(Builder $query): Builder // SCOPE QUE FILTRA APENAS ARTIGOS JA PUBLICADOS
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now()); // EXIGE DATA DE PUBLICACAO PREENCHIDA E NO PASSADO
    }
}
