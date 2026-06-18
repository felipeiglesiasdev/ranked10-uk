<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('seo')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-slate-50 font-sans text-slate-800 antialiased">{{-- CORPO COM FLEX COLUNA PARA O FOOTER COLAR NO FIM --}}
    <x-utils.header-mobile :nav-categories="$navCategories" />{{-- HEADER PARA TELAS PEQUENAS (block md:hidden) --}}
    <x-utils.header-desktop :nav-categories="$navCategories" />{{-- HEADER PARA TELAS MEDIAS/GRANDES (hidden md:block) --}}
    <main class="flex-1">{{-- AREA PRINCIPAL QUE CRESCE PARA EMPURRAR O FOOTER --}}
        @yield('content'){{-- PONTO ONDE CADA VIEW INJETA SEU CONTEUDO --}}
    </main>
    <x-utils.footer />{{-- FOOTER UNICO E RESPONSIVO --}}
</body>
</html>
