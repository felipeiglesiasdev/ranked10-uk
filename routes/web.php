<?php

use App\Http\Controllers\ArticleController; // IMPORTA O CONTROLLER DE ARTIGOS
use App\Http\Controllers\CategoryController; // IMPORTA O CONTROLLER DE CATEGORIAS
use App\Http\Controllers\CommentController; // IMPORTA O CONTROLLER DE COMENTARIOS
use App\Http\Controllers\HomeController; // IMPORTA O CONTROLLER DA HOME
use App\Http\Controllers\NavigationController; // IMPORTA O CONTROLLER DO MEGA MENU (JSON)
use App\Http\Controllers\PageController; // IMPORTA O CONTROLLER DAS PAGINAS INSTITUCIONAIS (E-E-A-T)
use App\Http\Controllers\SearchController; // IMPORTA O CONTROLLER DE BUSCA
use App\Http\Controllers\SitemapController; // IMPORTA O CONTROLLER DO SITEMAP
use Illuminate\Support\Facades\Route; // IMPORTA A FACADE DE ROTAS

Route::get('/', [HomeController::class, 'index'])->name('home'); // ROTA DA PAGINA INICIAL
Route::get('/sitemap.xml', [SitemapController::class, 'index']); // ROTA DO SITEMAP XML PARA OS BUSCADORES
Route::get('/search', [SearchController::class, 'index'])->name('search'); // ROTA DA BUSCA POR TITULO
Route::view('/privacy-policy', 'pages.privacy')->name('privacy'); // ROTA DA POLITICA DE PRIVACIDADE (FIXA, ANTES DO CATCH-ALL DE CATEGORIA)

// ─── MEGA MENU ASSINCRONO ───
// O CONTEUDO DOS PAINEIS NAO VAI MAIS NO HTML DE TODA PAGINA (ERAM 91 KB, 81% DA PAGINA DE
// PRIVACIDADE). ELE VEM DAQUI, NUMA UNICA REQUISICAO, NA PRIMEIRA INTENCAO DE ABRIR O MENU.
Route::get('/nav/menu', [NavigationController::class, 'menu'])->name('nav.menu'); // JSON COM OS PAINEIS DE TODAS AS CATEGORIAS

// ─── PAGINAS DE AUTORIDADE (E-E-A-T) ───
// ⚠ TODAS FICAM ANTES DO CATCH-ALL /{category:slug}, SENAO SERIAM ENGOLIDAS POR ELE E DARIAM 404.
Route::get('/about', [PageController::class, 'about'])->name('about'); // SOBRE O ranked10 (QUEM SOMOS, COMO NOS SUSTENTAMOS)
Route::get('/author/{slug}', [PageController::class, 'author'])->name('author'); // PAGINA PESSOAL DO AUTOR (SINAL DE AUTORIA REAL)

// ─── COMENTARIOS (UGC SEM LOGIN) ───
// ⚠ ESTAS SAO AS PRIMEIRAS ROTAS DO SITE QUE NAO SAO GET SIMPLES. O RESTO DO ranked10 CONTINUA
// 100% ESTATICO E SEM SESSAO; SO O FORMULARIO DE COMENTARIO USA CSRF.
Route::get('/comments/token', [CommentController::class, 'token'])->name('comments.token'); // TOKEN CSRF FRESCO PARA O FORMULARIO (FICA ANTES DO CATCH-ALL DE CATEGORIA)
Route::post('/{category:slug}/{article:slug}/comments', [CommentController::class, 'store'])->name('comments.store'); // ENVIO DE UM COMENTARIO NOVO

// REDIRECTS 301 DE SLUGS ANTIGOS (SEMPRE ANTES DO CATCH-ALL, PARA NAO PERDER SEO DE URLS JA INDEXADAS)
Route::redirect('/home/best-portable-fans-uk', '/home/best-handheld-fans', 301); // SLUG ANTIGO DO ARTIGO DE VENTILADORES PORTATEIS

Route::get('/{category:slug}', [CategoryController::class, 'show'])->name('category'); // ROTA DA CATEGORIA (FICA POR ULTIMO PARA NAO CONFLITAR COM ROTAS FIXAS)
Route::get('/{category:slug}/{article:slug}', [ArticleController::class, 'show'])->name('article'); // ROTA DO ARTIGO DENTRO DA CATEGORIA
