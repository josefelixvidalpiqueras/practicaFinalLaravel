<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VegaShop</title>
        <!-- Referenciamos el CDN de Bootstrap y cargamos su script -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- CDN iconos Bootstrap5 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
        <!-- Favicon para la pestaña del navegador -->
        <link rel="icon" href="./images/LogoVegaShop.png" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                padding-top:60px;
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
            table td img {
                border: 1px solid white;
                transition: 0.75s ease;
            }
            table td img:hover {
                scale: 5;
                transform: rotate(360deg) translateX(3px);
                border: 1px solid grey;
            }	
            th img {
                border: 2px solid white;
                transition: 0.5s ease;
            }
            th img:hover {
                border: 2px solid grey;
                transition: 0.5s ease;
                scale: 1.05;
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
            footer {
                padding-top: 10px;
            }
        </style>
    </head>
    <body class="antialiased bg-light">
        <!-- NAVBAR con enlaces -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
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
                                <!-- Botón carrito Administrador logueado -->
                                <a class="me-3" href="" title="Carro de compras">
                                    <button class="btn btn-outline-secondary me-3 position-relative" title="Carro de compras" type="button">
                                        <i class="bi bi-cart4" style="color: black;"></i>
                                        <span class="badge rounded-pill bg-black position-absolute top-0 start-100 translate-middle fw-light border badge-sm" style="font-size: 0.6rem; padding: 0.2rem 0.4rem;">0</span>
                                    </button>
                                </a>
                                <a href="{{ url('/admin/home') }}" class="btn btn-sm btn-light ms-1 me-3 d-sm-none d-grid">Home</a>
                                <a href="{{ url('/admin/home') }}" class="btn btn-sm btn-light ms-1 me-3 d-none d-sm-block d-grid">Volver a mi Home</a>
                            @else
                                <!-- Botón carrito Cliente logueado -->
                                <a class="me-3" href="" title="Carro de compras">
                                    <button class="btn btn-outline-secondary me-3 position-relative" title="Carro de compras" type="button">
                                        <i class="bi bi-cart4" style="color: black;"></i>
                                        <span class="badge rounded-pill bg-black position-absolute top-0 start-100 translate-middle fw-light border badge-sm" style="font-size: 0.6rem; padding: 0.2rem 0.4rem;">0</span>
                                    </button>
                                </a>
                                <a href="{{ url('/home') }}" class="btn btn-sm btn-light ms-1 me-3 d-sm-none d-grid">Home</a>
                                <a href="{{ url('/home') }}" class="btn btn-sm btn-light ms-1 me-3 d-none d-sm-block d-grid">Volver a mi Home</a>
                            @endif                    
                        @else
                            <!-- Botón carrito sin estar logueado (te redirige al login antes de la lógica) -->
                            <a class="me-3" href="" title="Carro de compras">
                                <button class="btn btn-outline-secondary me-3 position-relative" title="Carro de compras" type="button">
                                    <i class="bi bi-cart4" style="color: black;"></i>
                                    <span class="badge rounded-pill bg-black position-absolute top-0 start-100 translate-middle fw-light border badge-sm" style="font-size: 0.6rem; padding: 0.2rem 0.4rem;">0</span>
                                </button>
                            </a>
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

        <!-- FOOTER con redes sociales -->
        <footer class="container-fluid d-xxl-none pb-3">
            <div class="row">
                
                <div class="row mt-4 justify-content-center">

                    <div class="mt-b text-center">
                        <a class="ms-5 ms-md-4" href="https://www.instagram.com/josefelixvidalpiqueras/" title="Instagram" target="_blank"><button value="insta1" aria-label="Abre El Perfil De Istagram Del Autor" class="btn btn-outline-secondary me-3 position-relative" data-bs-toggle="tooltip" data-bs-placement="top" title="INSTAGRAM" type="button"><i class="bi bi-instagram" style="color: black;"></i><span class="badge rounded-pill bg-black position-absolute top-0 start-100 translate-middle border">+99</span></button></a>
                        <a class="ms-md-5" href="https://twitter.com" title="Twitter" target="_blank"><button value="twit1" aria-label="Abre El Perfil De Twitter X Del Autor" class="btn btn-outline-secondary me-3 position-relative" data-bs-toggle="tooltip" data-bs-placement="top" title="TWITTER" type="button"><i class="bi bi-twitter-x" style="color: black;"></i><span class="badge rounded-pill bg-black position-absolute top-0 start-100 translate-middle border">+99</span></button></a>
                        <a class="ms-md-5" href="https://www.facebook.com/josefelix.vidalpiqueras/" title="Facebook" target="_blank"><button value="face1" aria-label="Abre El Perfil De Facebook Del Autor" class="btn btn-outline-secondary me-3 position-relative" data-bs-toggle="tooltip" data-bs-placement="top" title="FACEBOOK" type="button"><i class="bi bi-facebook" style="color: black;"></i><span class="badge rounded-pill bg-black position-absolute top-0 start-100 translate-middle border">+99</span></button></a>
                    </div>

                    <div class="col-12 d-none d-lg-block text-center mt-3" style="font-family: sans-serif;">
                        <em>Ctra. De Mula, 37 – Alguazas. 30560 – Murcia </em>|<em> Tlfn: 654 950 001 </em>|<em> vegashop@ces-vegamedia.es</em>
                    </div>

                </div>	

            </div>		
        </footer>  

        <!-- FOOTER PARA DISPOSITIVOS MUY GRANDES -->
		<div class="d-none d-xxl-block" style="margin-top: 300px;"><p></p></div>
		<footer class="container-fluid fixed-bottom d-none d-xxl-block" style="height: 100px;">
			<div class="row">
				
				<div class="col-8 mt-3 d-none d-lg-block text-center" style="font-family: sans-serif;">
					<em>Ctra. De Mula, 37 – Alguazas. 30560 – Murcia </em>|<em> Tlfn: 654 950 001 </em>|<em> vegashop@ces-vegamedia.es</em>
				</div>
					
				<div class="col-3 mt-2 text-center">
					<a class="ms-5 ms-md-4" href="https://www.instagram.com/josefelixvidalpiqueras/" title="Instagram" target="_blank"><button value="insta1" aria-label="Abre El Perfil De Istagram Del Autor" class="btn btn-outline-secondary me-3 position-relative" data-bs-toggle="tooltip" data-bs-placement="top" title="INSTAGRAM" type="button"><i class="bi bi-instagram" style="color: black;"></i><span class="badge rounded-pill bg-black position-absolute top-0 start-100 translate-middle border">+99</span></button></a>
					<a class="ms-md-5" href="https://twitter.com" title="Twitter" target="_blank"><button value="twit1" aria-label="Abre El Perfil De Twitter X Del Autor" class="btn btn-outline-secondary me-3 position-relative" data-bs-toggle="tooltip" data-bs-placement="top" title="TWITTER" type="button"><i class="bi bi-twitter" style="color: black;"></i><span class="badge rounded-pill bg-black position-absolute top-0 start-100 translate-middle border">+99</span></button></a>
					<a class="ms-md-5" href="https://www.facebook.com/josefelix.vidalpiqueras/" title="Facebook" target="_blank"><button value="face1" aria-label="Abre El Perfil De Facebook Del Autor" class="btn btn-outline-secondary me-3 position-relative" data-bs-toggle="tooltip" data-bs-placement="top" title="FACEBOOK" type="button"><i class="bi bi-facebook" style="color: black;"></i><span class="badge rounded-pill bg-black position-absolute top-0 start-100 translate-middle border">+99</span></button></a>
				</div>
				
				<div class="row mt-4 justify-content-center">
					
				</div>	

			</div>		
		</footer> 
        
    </body>
</html>
