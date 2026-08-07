<?php

namespace App\Http\Controllers;

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use App\Models\Product; // IMPORTA O MODEL DE PRODUTOS (BLOCO DE MELHOR AVALIADOS)
use Illuminate\View\View; // IMPORTA O TIPO DE RETORNO DAS VIEWS

class HomeController extends Controller
{
    public function index(): View // EXIBE A HOME COM CATEGORIAS, ULTIMOS GUIAS E PRODUTOS MELHOR AVALIADOS
    {
        $categories = Category::withCount(['articles' => fn ($q) => $q->publicados()]) // CONTA SO OS ARTIGOS PUBLICADOS DE CADA CATEGORIA
            ->orderBy('name') // LISTA AS CATEGORIAS EM ORDEM ALFABETICA
            ->get(); // EXECUTA A CONSULTA

        $featured = Article::publicados() // FILTRA APENAS ARTIGOS PUBLICADOS
            ->with('category') // CARREGA A CATEGORIA JUNTO PARA EVITAR N+1
            ->latest('published_at') // ORDENA DO MAIS RECENTE PARA O MAIS ANTIGO
            ->take(6) // LIMITA AOS 6 ULTIMOS PUBLICADOS
            ->get(); // EXECUTA A CONSULTA

        $topProducts = Product::melhorAvaliados() // ORDENA PELA NOTA PONDERADA PELO VOLUME DE AVALIACOES
            ->with('article.category') // CARREGA ARTIGO E CATEGORIA PARA MONTAR O LINK INTERNO SEM N+1
            ->take(8) // LIMITA AOS 8 MELHORES
            ->get(); // EXECUTA A CONSULTA

        return view('home', compact('categories', 'featured', 'topProducts')); // RETORNA A VIEW DA HOME COM OS DADOS
    }
}
