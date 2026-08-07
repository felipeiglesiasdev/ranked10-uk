<?php

namespace App\Http\Controllers;

use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (BLOCO DE MELHOR AVALIADOS DA CATEGORIA)
use Illuminate\View\View; // IMPORTA O TIPO DE RETORNO DAS VIEWS

class CategoryController extends Controller
{
    public function show(Category $category): View // EXIBE UMA CATEGORIA COM SEUS ARTIGOS, MELHORES PRODUTOS E AS DEMAIS CATEGORIAS
    {
        $articles = $category->articles() // PARTE DO RELACIONAMENTO DE ARTIGOS DA CATEGORIA
            ->publicados() // FILTRA APENAS ARTIGOS PUBLICADOS
            ->latest('published_at') // ORDENA DO MAIS RECENTE PARA O MAIS ANTIGO
            ->get(); // EXECUTA A CONSULTA

        $topProducts = Product::melhorAvaliados() // ORDENA PELA NOTA PONDERADA PELO VOLUME DE AVALIACOES
            ->whereHas('article', fn ($q) => $q->where('category_id', $category->id)) // RESTRINGE AOS PRODUTOS DOS ARTIGOS DESTA CATEGORIA
            ->with('article.category') // CARREGA ARTIGO E CATEGORIA PARA MONTAR O LINK INTERNO SEM N+1
            ->take(4) // LIMITA AOS 4 MELHORES DA CATEGORIA
            ->get(); // EXECUTA A CONSULTA

        $otherCategories = Category::withCount(['articles' => fn ($q) => $q->publicados()]) // CONTA SO OS ARTIGOS PUBLICADOS
            ->whereKeyNot($category->id) // EXCLUI A CATEGORIA ATUAL
            ->having('articles_count', '>', 0) // ESCONDE CATEGORIAS SEM NENHUM ARTIGO PUBLICADO
            ->orderBy('name') // ORDEM ALFABETICA
            ->get(); // EXECUTA A CONSULTA

        return view('categories.show', compact('category', 'articles', 'topProducts', 'otherCategories')); // RETORNA A VIEW DA CATEGORIA COM OS DADOS
    }
}
