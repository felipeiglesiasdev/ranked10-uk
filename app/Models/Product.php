<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // IMPORTA A CLASSE BASE DOS MODELS
use Illuminate\Database\Eloquent\Relations\BelongsTo; // IMPORTA O TIPO DE RETORNO DO BELONGSTO

class Product extends Model
{
    protected $fillable = ['article_id', 'position', 'name', 'price', 'rating', 'reviews_count', 'pros', 'contras', 'affiliate_link', 'image', 'summary']; // CAMPOS PERMITIDOS NO PREENCHIMENTO EM MASSA

    protected $casts = ['pros' => 'array', 'contras' => 'array']; // CONVERTE AS COLUNAS JSON PARA ARRAYS PHP AUTOMATICAMENTE

    public function article(): BelongsTo // RELACIONAMENTO: O PRODUTO PERTENCE A UM ARTIGO
    {
        return $this->belongsTo(Article::class); // RETORNA O ARTIGO DONO DO PRODUTO
    }
}
