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
            select {
                background-color: #343a40;
            }
            option {
                background-color: #343a40; 
                color: white;
                font-size: 1.3em;
            }
	    </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-auto mx-auto mt-5">
                    <div class="card">
                        <div class="card-header text-center bg-dark text-white">
                            <strong>EDITAR ESTADO</strong>
                        </div>
                        <div class="card-body row">
                            <!-- Formulario de edición de la camiseta seleccionada -->
                            <form action="{{ route('historial.update', ['id' => $venta->id]) }}" method="POST" class="row">
                            @method('put')    
                            @csrf
                                <div class="form-group col-6">
                                    <label class="form-label" for="id"><strong>Nº Pedido</strong></label>
                                    <input type="text" name="id" value="{{ $venta->id }}" id="id" class="form-control bg-light" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="estado"><strong>Estado⤵</strong></label>
                                    <select class="form-control" id="estado" name="estado">
                                        <option class="form-label" value="Preparando">Preparando</option><span></span>
                                        <option value="En envío">En envío</option>
                                        <option value="Entregado">Entregado</option>
                                    </select>
                                </div>                             

                                <div class="col-12" style="margin-top: 35px;">
                                    <div class="row justify-content-between">
                                        <button type="submit" class="btn btn-dark btn-sm col-5 mt-3 ms-3">Guardar</button>
                                        <a href="{{ route('historial.index') }}" class="btn btn-secondary btn-sm float-end col-5 mt-3 me-3">Cancelar</a>
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