<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder; // IMPORTA O BUILDER PARA TIPAR O SCOPE
use Illuminate\Database\Eloquent\Model; // IMPORTA A CLASSE BASE DOS MODELS
use Illuminate\Database\Eloquent\Relations\BelongsTo; // IMPORTA O TIPO DE RETORNO DO BELONGSTO
use Illuminate\Database\Eloquent\Relations\HasMany; // IMPORTA O TIPO DE RETORNO DO HASMANY

class Article extends Model
{
    protected $fillable = ['category_id', 'slug', 'title', 'meta_title', 'meta_description', 'focus_keyword', 'hero_image', 'intro', 'conclusion', 'how_we_rank', 'author', 'published_at']; // CAMPOS PERMITIDOS NO PREENCHIMENTO EM MASSA (META_*, FOCUS_KEYWORD E HERO_IMAGE SAO OS CAMPOS DE SEO)

    protected $casts = ['published_at' => 'datetime', 'how_we_rank' => 'array']; // PUBLISHED_AT VIRA CARBON; HOW_WE_RANK VIRA ARRAY PHP AUTOMATICAMENTE

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

    public function comments(): HasMany // RELACIONAMENTO: UM ARTIGO TEM MUITOS COMENTARIOS (EM QUALQUER STATUS)
    {
        return $this->hasMany(Comment::class); // RETORNA TODOS OS COMENTARIOS, INCLUSIVE OS PENDENTES E OS MARCADOS COMO SPAM
    }

    public function comentariosPublicados(): HasMany // RELACIONAMENTO: SO O QUE APARECE NA PAGINA
    {
        // SO COMENTARIOS APROVADOS E DE PRIMEIRO NIVEL. AS RESPOSTAS VEM PELO RELACIONAMENTO replies()
        // DE CADA UM, ENTAO A VIEW NUNCA PRECISA MONTAR A ARVORE NA MAO.
        return $this->hasMany(Comment::class)->where('status', Comment::APROVADO)->whereNull('parent_id')->latest(); // MAIS NOVOS PRIMEIRO
    }

    public function scopePublicados(Builder $query): Builder // SCOPE QUE FILTRA APENAS ARTIGOS JA PUBLICADOS
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now()); // EXIGE DATA DE PUBLICACAO PREENCHIDA E NO PASSADO
    }
}
