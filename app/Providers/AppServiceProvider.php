<?php

namespace App\Providers;

use App\Models\Category; // IMPORTA O MODEL DE CATEGORIAS PARA O MENU
use Illuminate\Support\Facades\Schema; // IMPORTA A FACADE SCHEMA PARA CHECAR SE A TABELA EXISTE
use Illuminate\Support\Facades\View; // IMPORTA A FACADE VIEW PARA O VIEW COMPOSER
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.app', function ($view) { // COMPARTILHA AS CATEGORIAS COM O LAYOUT MESTRE PARA MONTAR O MENU
            $categories = Schema::hasTable('categories') // EVITA ERRO ANTES DAS MIGRATIONS RODAREM
                ? Category::with(['articles' => fn ($q) => $q->publicados()->latest('published_at')->with('products')]) // CARREGA ARTIGOS PUBLICADOS + PRODUTOS PARA O MEGA MENU
                    ->orderBy('name') // ORDENA AS CATEGORIAS POR NOME
                    ->get() // EXECUTA A CONSULTA
                : collect(); // COLECAO VAZIA SE A TABELA AINDA NAO EXISTE
            $view->with('navCategories', $categories); // INJETA A VARIAVEL NAVCATEGORIES NO LAYOUT
        });
    }
}
