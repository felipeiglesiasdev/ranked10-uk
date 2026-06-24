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

        $author = collect(config('authors'))->firstWhere('name', $article->author); // BUSCA O PERFIL DO AUTOR PELO NOME (config/authors.php)

        $related = $this->relacionados($category, $article); // BUSCA OS ARTIGOS RELACIONADOS PARA ANCORAGEM DE LINKS

        return view('articles.show', compact('category', 'article', 'author', 'related')); // RETORNA A VIEW DO ARTIGO COM OS DADOS
    }

    private function relacionados(Category $category, Article $article) // MONTA ATE 3 ARTIGOS RELACIONADOS
    {
        $relacionados = Article::publicados() // COMECA PELOS ARTIGOS PUBLICADOS
            ->with('category') // CARREGA A CATEGORIA PARA MONTAR OS LINKS
            ->where('category_id', $category->id) // PRIORIZA ARTIGOS DA MESMA CATEGORIA
            ->whereKeyNot($article->id) // EXCLUI O PROPRIO ARTIGO ATUAL
            ->latest('published_at') // ORDENA DO MAIS RECENTE PARA O MAIS ANTIGO
            ->take(3) // LIMITA A 3 ARTIGOS
            ->get(); // EXECUTA A CONSULTA

        if ($relacionados->count() < 3) { // SE NAO COMPLETOU 3 DA MESMA CATEGORIA
            $complemento = Article::publicados() // BUSCA ARTIGOS DE OUTRAS CATEGORIAS PARA COMPLETAR
                ->with('category') // CARREGA A CATEGORIA
                ->where('category_id', '!=', $category->id) // DE CATEGORIAS DIFERENTES
                ->whereKeyNot($article->id) // EXCLUI O ARTIGO ATUAL POR SEGURANCA
                ->latest('published_at') // ORDENA DO MAIS RECENTE
                ->take(3 - $relacionados->count()) // PEGA APENAS O QUE FALTA PARA CHEGAR A 3
                ->get(); // EXECUTA A CONSULTA

            $relacionados = $relacionados->concat($complemento); // JUNTA OS DOIS CONJUNTOS
        }

        return $relacionados; // RETORNA A COLECAO DE RELACIONADOS
    }
}
