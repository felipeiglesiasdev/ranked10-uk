<?php

namespace App\Http\Controllers;

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use Illuminate\View\View; // IMPORTA O TIPO DE RETORNO DAS VIEWS

class ArticleController extends Controller
{
    public function show(Category $category, Article $article): View // EXIBE UM ARTIGO COMPLETO COM SEUS PRODUTOS
    {
        abort_unless($article->category_id === $category->id, 404); // GARANTE QUE O ARTIGO PERTENCE A CATEGORIA DA URL

        abort_unless($article->published_at && $article->published_at->isPast(), 404); // BLOQUEIA ACESSO A ARTIGOS NAO PUBLICADOS

        $article->load('products'); // CARREGA OS PRODUTOS DO ARTIGO (JA ORDENADOS POR POSITION NO RELACIONAMENTO)

        return view('articles.show', compact('category', 'article')); // RETORNA A VIEW DO ARTIGO COM OS DADOS
    }
}
