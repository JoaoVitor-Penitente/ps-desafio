<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/footer.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/categorias.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/busca.css') }}" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    <header class="header">
        <img class="logo"src="/thunder clothing.svg" alt="logo">
        @include('layouts.navbars.navs.navProdutos')
        
    </header>
    <main>
        @include('layouts.categorias')
        @yield ('content')
    </main>
    <footer class="footer">
        @include('layouts.footers.FooterProdutos')
    </footer>
    <script src="https://kit.fontawesome.com/ebd2d0bd98.js" crossorigin="anonymous"></script>
</body>
</html>