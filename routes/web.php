<?php

use App\Http\Controllers\ArticleController; // IMPORTA O CONTROLLER DE ARTIGOS
use App\Http\Controllers\CategoryController; // IMPORTA O CONTROLLER DE CATEGORIAS
use App\Http\Controllers\HomeController; // IMPORTA O CONTROLLER DA HOME
use App\Http\Controllers\SearchController; // IMPORTA O CONTROLLER DE BUSCA
use App\Http\Controllers\SitemapController; // IMPORTA O CONTROLLER DO SITEMAP
use Illuminate\Support\Facades\Route; // IMPORTA A FACADE DE ROTAS

Route::get('/', [HomeController::class, 'index'])->name('home'); // ROTA DA PAGINA INICIAL
Route::get('/sitemap.xml', [SitemapController::class, 'index']); // ROTA DO SITEMAP XML PARA OS BUSCADORES
Route::get('/search', [SearchController::class, 'index'])->name('search'); // ROTA DA BUSCA POR TITULO
Route::view('/privacy-policy', 'pages.privacy')->name('privacy'); // ROTA DA POLITICA DE PRIVACIDADE (FIXA, ANTES DO CATCH-ALL DE CATEGORIA)

Route::get('/{category:slug}', [CategoryController::class, 'show'])->name('category'); // ROTA DA CATEGORIA (FICA POR ULTIMO PARA NAO CONFLITAR COM ROTAS FIXAS)
Route::get('/{category:slug}/{article:slug}', [ArticleController::class, 'show'])->name('article'); // ROTA DO ARTIGO DENTRO DA CATEGORIA
