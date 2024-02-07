<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Referenciamos el CDN de Bootstrap y cargamos su script -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <title>Editando Camiseta</title>
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
                            <strong>EDITAR CAMISETA</strong>
                        </div>
                        <div class="card-body row">
                            <!-- Formulario de inserción de nueva camiseta -->
                            <form action="{{ route('camisetas.update', $camiseta->id) }}" method="POST" class="row">
                            @method('put')    
                            @csrf
                                <div class="form-group col-6">
                                    <label class="form-label" for="marca"><strong>Marca</strong></label>
                                    <input type="text" name="marca" value="{{ $camiseta->marca }}" id="marca" class="form-control bg-light">
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="modelo"><strong>Modelo</strong></label>
                                    <input type="text" name="modelo" value="{{ $camiseta->modelo }}" id="modelo" class="form-control bg-light">
                                </div>
                                <div class="form-group col-6 mt-3">
                                    <label class="form-label" for="caracteristicas"><strong>Características</strong></label>
                                    <input type="text" name="caracteristicas" value="{{ $camiseta->caracteristicas }}" id="caracteristicas" class="form-control bg-light">
                                </div>
                                <div class="form-group col-6 mt-3">
                                    <label class="form-label" for="precio"><strong>Precio</strong></label>
                                    <input type="number" step="0.01" min="0" name="precio" value="{{ $camiseta->precio }}" id="precio" class="form-control bg-light">
                                </div>
                                <div class="form-group col-6 mt-3">
                                    <label class="form-label" for="stock"><strong>Stock</strong></label>
                                    <input type="text" name="stock" value="{{ $camiseta->stock }}" id="stock" class="form-control bg-light">
                                </div>
                                <div class="form-group col-6 mt-3">
                                    <label class="form-label" for="descuento"><strong>Descuento</strong></label>
                                    <input type="number" min="0" max="100" name="descuento"  value="{{ $camiseta->descuento }}" id="descuento" class="form-control bg-light">
                                </div>
                                <div class="form-group col-6 mt-3">
                                    <label class="form-label" for="imagen"><strong>Imagen</strong></label>
                                    <input type="text" name="imagen" value="{{ $camiseta->imagen }}" id="imagen" class="form-control bg-light">
                                </div>

                                <div class="col-6" style="margin-top: 35px;">
                                    <div class="row justify-content-between">
                                        <button type="submit" class="btn btn-dark btn-sm col-5 mt-3 ms-3">Guardar</button>
                                        <a href="{{ route('camisetas.index') }}" class="btn btn-secondary btn-sm float-end col-5 mt-3 me-3">Cancelar</a>
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