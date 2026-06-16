<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // IMPORTA A CLASSE BASE DOS MODELS
use Illuminate\Database\Eloquent\Relations\HasMany; // IMPORTA O TIPO DE RETORNO DO RELACIONAMENTO

class Category extends Model
{
    protected $fillable = ['slug', 'name', 'description']; // CAMPOS PERMITIDOS NO PREENCHIMENTO EM MASSA

    public function getRouteKeyName(): string // DEFINE O CAMPO USADO NO ROUTE MODEL BINDING
    {
        return 'slug'; // USA O SLUG EM VEZ DO ID NAS URLS
    }

    public function articles(): HasMany // RELACIONAMENTO: UMA CATEGORIA TEM MUITOS ARTIGOS
    {
        return $this->hasMany(Article::class); // RETORNA OS ARTIGOS VINCULADOS A ESTA CATEGORIA
    }
}
