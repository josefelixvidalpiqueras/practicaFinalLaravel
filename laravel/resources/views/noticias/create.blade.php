<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Referenciamos el CDN de Bootstrap y cargamos su script -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <title>Creando Nueva Noticia</title>
        <style type="text/css">		
            img {
                border: 1px solid white;
                transition: 1s ease;
            }
            img:hover {
                scale: 10;
                transform: rotate(360deg);
                border: 1px solid black;

            }	
            .card {
                border-radius: 10px;
            }
            .card-body {
                border-radius: 0px 0px 10px 10px;
            }
	    </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-auto mx-auto mt-5">
                    <div class="card">
                        <div class="card-header text-center bg-dark text-white">
                            <strong>NUEVA NOTICIA</strong>
                        </div>
                        <div class="card-body row">
                            <!-- Formulario de inserción de nueva noticia -->
                            <form action="{{ route('noticias.store') }}" method="POST" class="row" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-6">
                                    <label class="form-label" for="titular"><strong>Titular</strong></label>
                                    <input type="text" name="titular" id="titular" class="form-control bg-light" required>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="cuerpo"><strong>Cuerpo</strong></label>
                                    <input type="text" name="cuerpo" id="cuerpo" class="form-control bg-light" required>
                                </div>
                                <div class="form-group col-12 mt-3">
                                    <label class="form-label" for="imagen"><strong>Imagen</strong></label>
                                    <input class="form-control bg-light" type="file" name="imagen" id="imagen" required>
                                </div>

                                <div class="col-12" style="margin-top: 35px;">
                                    <div class="row justify-content-between">
                                        <button type="submit" class="btn btn-dark btn-sm col-5 mt-3 ms-3">Guardar</button>
                                        <a href="{{ route('noticias.index') }}" class="btn btn-secondary btn-sm float-end col-5 mt-3 me-3">Cancelar</a>
                                    </div>                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>