<?php

namespace App\Http\Controllers;

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use Illuminate\View\View; // IMPORTA O TIPO DE RETORNO DAS VIEWS

class HomeController extends Controller
{
    public function index(): View // EXIBE A HOME COM CATEGORIAS E ARTIGOS EM DESTAQUE
    {
        $categories = Category::orderBy('name')->get(); // LISTA TODAS AS CATEGORIAS EM ORDEM ALFABETICA

        $featured = Article::publicados() // FILTRA APENAS ARTIGOS PUBLICADOS
            ->with('category') // CARREGA A CATEGORIA JUNTO PARA EVITAR N+1
            ->latest('published_at') // ORDENA DO MAIS RECENTE PARA O MAIS ANTIGO
            ->take(6) // LIMITA AOS 6 ULTIMOS PUBLICADOS
            ->get(); // EXECUTA A CONSULTA

        return view('home', compact('categories', 'featured')); // RETORNA A VIEW DA HOME COM OS DADOS
    }
}
