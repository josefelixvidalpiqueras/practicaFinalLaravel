<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VegaShop</title>
    <!-- Referenciamos el CDN de Bootstrap y cargamos su script -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Favicon para la pestaña del navegador -->
    <link rel="icon" href="./images/LogoVegaShop.png" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .img-round {
            max-width: 20px; /* Ajusta el tamaño máximo de la imagen */
            padding:0.1px;
            border-radius: 50%;
            overflow: hidden;
            border: 1.5px solid black;
            transition: 0.5s ease;
        }	
        .img-round:hover {
            scale: 2.5;
        }
        a {
            text-decoration: none;
            color: #343a40;
        }            
        table img {
            border: 1px solid white;
            transition: 0.75s ease;
        }
        table img:hover {
            scale: 5;
            transform: rotate(360deg) translateX(3px);
            border: 1px solid grey;
        }	
        .table-responsive {
            padding-bottom: 50px;
        }
        .card {
            border-radius: 10px;
        }
        .card-body {
            border-radius: 0px 0px 10px 10px;
        }
    </style>
</head>
<body class="antialiased bg-light">
    <!-- NAVBAR con enlaces -->
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="navbar-brand">
                <img class="img-round" src="./images/LogoVegaShop.png" alt="Logo VegaShop">
                <strong class="mt-1"> VegaShop</strong>
            </a>
            <!-- Boton toggler -->
            <button class="navbar-toggler" aria-label="Despliega Y Oculta El Menú De Navegación" type="button" value="botonCollapse" data-bs-toggle="collapse" data-bs-target="#navbar_plegable">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Enlaces -->
            <div class="collapse navbar-collapse" id="navbar_plegable">
                <ul class="navbar-nav mx-auto"> <!-- Utilizamos mx-auto para centrar los enlaces -->
                    <!-- Rutas centrales del navbar (Clientes sin cuenta) -->
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="col-auto btn btn-sm btn-light me-3 d-grid">Ofertas</a>
                    </li>   
                    <li class="nav-item">
                        <a href="{{ url('/detalles') }}" class="col-auto btn btn-sm btn-light me-3 d-grid">Camisetas</a>
                    </li>
                </ul>
                @if (Route::has('login'))
                    @auth
                        @if (auth()->user()->is_admin==1)
                            <!-- Rutas centrales del navbar (Administradores) -->
                            <a href="{{ url('/admin/home') }}" class="btn btn-sm btn-light ms-1 me-3 d-sm-none d-grid">Home</a>
                            <a href="{{ url('/admin/home') }}" class="btn btn-sm btn-light ms-1 me-3 d-none d-sm-block d-grid">Volver a mi Home</a>
                        @else
                            <!-- Rutas centrales del navbar (Clientes) -->
                            <a href="{{ url('/home') }}" class="btn btn-sm btn-light ms-1 me-3 d-sm-none d-grid">Home</a>
                            <a href="{{ url('/home') }}" class="btn btn-sm btn-light ms-1 me-3 d-none d-sm-block d-grid">Volver a mi Home</a>
                        @endif                    
                    @else
                        <!-- Botones Log in y Register -->
                        <a href="{{ route('login') }}" class="nav-link me-3 text-dark d-grid" style="font-size: 0.9em;">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link me-2 fw-light text-dark d-grid" style="font-size: 0.9em;">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>
    @yield('contenido')
</body>
</html>
