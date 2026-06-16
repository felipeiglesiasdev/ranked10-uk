<?php

namespace App\Http\Controllers;

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use Illuminate\Http\Request; // IMPORTA O REQUEST PARA LER A QUERY STRING
use Illuminate\View\View; // IMPORTA O TIPO DE RETORNO DAS VIEWS

class SearchController extends Controller
{
    public function index(Request $request): View // EXIBE OS RESULTADOS DA BUSCA POR TITULO
    {
        $query = trim((string) $request->query('q', '')); // LE O TERMO ?q= DA QUERY STRING E REMOVE ESPACOS DAS PONTAS

        $articles = collect(); // COMECA COM UMA COLECAO VAZIA PARA O CASO DE BUSCA EM BRANCO
        if ($query !== '') { // SO CONSULTA O BANCO SE O USUARIO DIGITOU ALGO
            $articles = Article::publicados() // FILTRA APENAS ARTIGOS PUBLICADOS
                ->with('category') // CARREGA A CATEGORIA JUNTO PARA MONTAR OS LINKS
                ->where('title', 'LIKE', '%'.$query.'%') // BUSCA O TERMO EM QUALQUER PARTE DO TITULO
                ->latest('published_at') // ORDENA DO MAIS RECENTE PARA O MAIS ANTIGO
                ->get(); // EXECUTA A CONSULTA
        }

        return view('search', compact('query', 'articles')); // RETORNA A VIEW DE BUSCA COM O TERMO E OS RESULTADOS
    }
}
