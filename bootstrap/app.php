<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // MARCA AS PAGINAS PUBLICAS COMO CACHEAVEIS NA BORDA DA CLOUDFLARE.
        // TEM QUE SER prepend, NAO append: NA VOLTA DA PILHA O MIDDLEWARE MAIS EXTERNO E O ULTIMO A
        // TOCAR NA RESPOSTA. COM append ELE RODAVA ANTES DO AddQueuedCookiesToResponse, QUE ENTAO
        // RECOLOCAVA laravel-session E XSRF-TOKEN E A CLOUDFLARE VOLTAVA A RECUSAR O CACHE.
        $middleware->web(prepend: [
            \App\Http\Middleware\CachePublicPages::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );
    })->create();
