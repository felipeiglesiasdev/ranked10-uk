<?php

namespace App\Http\Controllers;

use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use Illuminate\View\View; // IMPORTA O TIPO DE RETORNO DAS VIEWS

class CategoryController extends Controller
{
    public function show(Category $category): View // EXIBE UMA CATEGORIA COM SEUS ARTIGOS PUBLICADOS
    {
        $articles = $category->articles() // PARTE DO RELACIONAMENTO DE ARTIGOS DA CATEGORIA
            ->publicados() // FILTRA APENAS ARTIGOS PUBLICADOS
            ->latest('published_at') // ORDENA DO MAIS RECENTE PARA O MAIS ANTIGO
            ->get(); // EXECUTA A CONSULTA

        return view('categories.show', compact('category', 'articles')); // RETORNA A VIEW DA CATEGORIA COM OS DADOS
    }
}
