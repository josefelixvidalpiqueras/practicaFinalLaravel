<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Referenciamos el CDN de Bootstrap y cargamos su script -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- Favicon para la pestaña del navegador -->
        <link rel="icon" href="./images/LogoVegaShop.png" type="image/png">

        <title>VegaShop</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .img-round {
                padding:1px;
                border-radius: 50%;
                overflow: hidden;
                border: 2px solid #343a40;
                transition: 0.5s ease;
            }	
            .img-round:hover {
                scale: 1.1;
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
        <div class="navbar row bg-white" style="height: 54px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.09);">
            @if (Route::has('login'))
                @auth
                    <?php 
                        if (auth()->user()->is_admin==1) {
                    ?>
                            <a class="col-auto me-auto ms-5" href=""><img class="img-round" src="./images/LogoVegaShop.png" alt="Logo VegaShop" style="width: 40px;"><strong> VegaShop</strong></a>
                            <a href="{{ url('/admin/home') }}" class="col-auto btn btn-sm btn-light ms-1 me-5 d-sm-none">Home</a>
                            <a href="{{ url('/admin/home') }}" class="col-auto btn btn-sm btn-light ms-1 me-5 d-none d-sm-block">Volver a mi Home</a>
                            
                    <?php
                        } else {
                    ?>
                            <a class="col-auto me-auto ms-5" href=""><img class="img-round" src="./images/LogoVegaShop.png" alt="Logo VegaShop" style="width: 40px;"><strong> VegaShop</strong></a>
                            <a href="{{ url('/home') }}" class="col-auto btn btn-sm btn-light ms-1 me-5 d-sm-none">Home</a>
                            <a href="{{ url('/home') }}" class="col-auto btn btn-sm btn-light ms-1 me-5 d-none d-sm-block">Volver a mi Home</a>
                    <?php    
                        }                    
                    ?>                   
                @else
                    <a class="col-auto me-auto ms-5" href="{{ url('/') }}"><img class="img-round" src="./images/LogoVegaShop.png" alt="Logo VegaShop" style="width: 40px;"><strong> VegaShop</strong></a>

                    <a href="{{ route('login') }}" class="col-auto btn btn-sm btn-light ms-auto me-2">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="col-auto btn btn-sm btn-light ms-1 me-5">Register</a>
                    @endif
                @endauth
            @endif
        </div>
            
        <!-- Mostramos las camisetas de oferta a cualquier cliente que entre a la web (sin necesidad de estar autenticado) -->            
        <div class="container">
            <div class="row" style="margin-top: 30px;">
                <div class="col-md-12">                    
                    <div class="card">
                        <div class="card-header text-center" style="background-color: #F1F3F5; color: black; border-color: #343a40;">    
                            <strong>CAMISETAS EN OFERTA</strong>
                        </div>
                        <div class="card-body col table-responsive bg-dark" style="padding-bottom: 40px;">
                            <!-- Mostraremos el listado de camisetas en formato tabla -->
                            <table class="table table-hover table-sm table-dark text white">
                                <thead>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Características</th>
                                    <th>Imagen</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Descuento</th>                                    
                                </thead>
                                <tbody>
                                    @foreach($camisetas as $camiseta)
                                    <tr>
                                        <td>
                                            {{ $camiseta->marca }}
                                        </td>
                                        <td>
                                            {{ $camiseta->modelo }}
                                        </td>
                                        <td>
                                            {{ $camiseta->caracteristicas }}
                                        </td>
                                        <td>
                                            <img class="ms-3" src="{{ asset($camiseta->imagen) }}" title="{{ $camiseta->imagen }}" style="width:25px; border-radius:5px;">
                                        </td>
                                        <td>
                                            {{ $camiseta->precio }} <?php echo" €"; ?>
                                        </td>
                                        <td>
                                            {{ $camiseta->stock }} <?php echo" uds"; ?>
                                        </td>
                                        <td>
                                            {{ $camiseta->descuento }} <?php echo"%"; ?>
                                        </td>                                        
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                

    </body>
</html>
