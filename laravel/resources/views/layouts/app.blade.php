<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon para la pestaña del navegador -->
    <link rel="icon" href="../images/LogoVegaShop.png" type="image/png">

    <title>VegaShop</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand me-5" href="{{ url('/') }}">
                    Ir a VegaShop
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <!-- Middle Side Of Navbar (Las opciones de navegación sólo aparecerán si hay un usuario logueado) -->
                @if (Route::has('login'))
                    @auth
                        <ul class="navbar-nav mx-auto">
                            
                            <!-- Si el usuario logueado es Administrador (se muestra el panel de Administrador) -->
                            <?php 
                                if (auth()->user()->is_admin==1) {
                            ?>
                                <div class="nav-item active">
                                    <a href="{{ url('/admin/home') }}" class="col-auto btn btn-sm btn-light ms-lg-5 me-3 d-grid">Home</a>
                                </div>
                                <div class="nav-item">
                                    <a href="{{ url('/admin/perfiles') }}" class="col-auto btn btn-sm btn-light me-3 d-grid">Perfil</a>
                                </div>
                                <div class="nav-item">
                                    <a href="{{ url('/admin/camisetas') }}" class="col-auto btn btn-sm btn-light me-3 d-grid">Camisetas</a>
                                </div>
                                <div class="nav-item">
                                    <a href="{{ url('/admin/historial') }}" class="col-auto btn btn-sm btn-light me-3 d-grid">Historial</a>
                                </div>
                                <div class="nav-item">
                                    <a href="{{ url('/admin/noticias') }}" class="col-auto btn btn-sm btn-light me-3 d-grid">Noticias</a>
                                </div>
                                <div class="nav-item">
                                    <a href="{{ url('/admin/cuentas') }}" class="col-auto btn btn-sm btn-light me-3 d-grid">Cuentas</a>
                                </div>
                            <!-- Si el usuario logueado es NO es Administrador (se muestra el panel de Cliente) -->        
                            <?php
                                } else {
                            ?>
                                <div class="nav-item">
                                    <a href="{{ url('/home') }}" class="col-auto btn btn-sm btn-light me-3 d-grid">Home</a>
                                </div>
                                <div class="nav-item">
                                    <a href="{{ url('/perfiles') }}" class="col-auto btn btn-sm btn-light me-3 d-grid">Perfil</a>
                                </div>
                                <div class="nav-item">
                                    <a href="{{ url('/historial') }}" class="col-auto btn btn-sm btn-light me-3 d-grid">Historial</a>
                                </div>
                            <?php    
                                }                    
                            ?>

                        </ul>
                    @endauth
                @endif
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
