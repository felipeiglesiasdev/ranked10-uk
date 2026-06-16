<?php

namespace App\Http\Controllers;

use App\Models\Article; // IMPORTA O MODEL DE ARTIGOS
use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS
use Illuminate\Http\Response; // IMPORTA O TIPO DE RETORNO DA RESPOSTA XML

class SitemapController extends Controller
{
    public function index(): Response // GERA O SITEMAP.XML COM HOME, CATEGORIAS E ARTIGOS
    {
        $urls = []; // INICIALIZA A LISTA DE URLS DO SITEMAP

        $urls[] = ['loc' => route('home'), 'lastmod' => now()->toAtomString()]; // ADICIONA A HOME COMO PRIMEIRA URL

        foreach (Category::all() as $category) { // PERCORRE TODAS AS CATEGORIAS
            $urls[] = [ // ADICIONA A URL DA CATEGORIA NO SITEMAP
                'loc' => route('category', $category), // MONTA A URL USANDO O SLUG DA CATEGORIA
                'lastmod' => $category->updated_at?->toAtomString(), // USA A DATA DE ATUALIZACAO COMO LASTMOD
            ];
        }

        foreach (Article::publicados()->with('category')->get() as $article) { // PERCORRE TODOS OS ARTIGOS PUBLICADOS
            $urls[] = [ // ADICIONA A URL DO ARTIGO NO SITEMAP
                'loc' => route('article', [$article->category, $article]), // MONTA A URL CATEGORIA/ARTIGO PELOS SLUGS
                'lastmod' => $article->updated_at?->toAtomString(), // USA A DATA DE ATUALIZACAO COMO LASTMOD
            ];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n"; // ABRE O DOCUMENTO XML
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n"; // ABRE O URLSET COM O NAMESPACE PADRAO
        foreach ($urls as $url) { // PERCORRE CADA URL COLETADA
            $xml .= "  <url>\n"; // ABRE O BLOCO DA URL
            $xml .= '    <loc>'.e($url['loc'])."</loc>\n"; // ESCREVE A LOCALIZACAO ESCAPADA
            if (! empty($url['lastmod'])) { // SO ESCREVE LASTMOD SE A DATA EXISTIR
                $xml .= '    <lastmod>'.e($url['lastmod'])."</lastmod>\n"; // ESCREVE A DATA DA ULTIMA MODIFICACAO
            }
            $xml .= "  </url>\n"; // FECHA O BLOCO DA URL
        }
        $xml .= '</urlset>'; // FECHA O URLSET

        return response($xml, 200)->header('Content-Type', 'application/xml'); // RETORNA O XML COM O CONTENT-TYPE CORRETO
    }
}
