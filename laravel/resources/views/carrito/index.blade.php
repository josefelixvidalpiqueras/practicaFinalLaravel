@extends('layouts.enlaces-tienda')
@section('contenido')
    
    <style type="text/css">		
        img {
            border-radius: 10px;
            width: 45px;
            border: 1px solid white;
            transition: 0.75s ease;
        }
        img:hover {
           scale: 1.1;
           border: 1px solid grey;
        }	
        .table-responsive {
            padding-bottom: 55px;
        }
        .card {
            border-radius: 10px;
        }
        .card-body {
            border-radius: 0px 0px 10px 10px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-auto mx-auto" style="margin-top: 30px;">
            
                <div class="card"  style="margin-bottom: 250px;">
                    <div class="card-header text-center" style="background-color: #F1F3F5; color: black; border-color: #343a40;">
                        <strong>MI CARRO DE COMPRA</strong>
                    </div>
                    <div class="card-body col table-responsive bg-dark text-white">
                        <!-- Mostraremos el listado de camisetas en formato tabla -->
                        <table class="table table-hover table-sm table-dark text white">
                            <thead>
                                <tr>
                                    
                                </tr>                                
                            </thead>
                            <tbody>
                                <div class="row">
                                    <div class="col-3 mb-3 fw-bold fst-italic">Marca</div>
                                    <div class="col-3 mb-3 fw-bold fst-italic">Tipo</div>
                                    <div class="col-3 mb-3 fw-bold fst-italic">TShirt</div>
                                    <div class="col-3 mb-3 fw-bold fst-italic">PVP Final</div>
                                    

                                    @foreach ($ids as $id)
                                
                                            <!-- Obtener la información de la camiseta correspondiente al ID -->
                                            @php
                                                $camiseta = App\Models\Camiseta::find($id);
                                            @endphp

                                            <!-- Si existe la camiseta con ese ID la mostramos (si no un mensaje de error de camiseta no encontrada) -->
                                            @if ($camiseta)

                                                <div class="col-3 mb-3">
                                                    {{ $camiseta->marca }}
                                                </div>
                                                <div class="col-3 mb-3">
                                                    {{ $camiseta->modelo }}
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <img src="{{ $camiseta->imagen }}" alt="Imagen de la camiseta">&emsp; 
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <!-- Precio final del producto (2 decimales) Y a si derecha... -->
                                                    <!-- ... Botón que quita la camiseta del carrito de compras (la saca del array de IDs almacenado en sesión) --> 
                                                    {{ number_format(($camiseta->precio-($camiseta->precio*$camiseta->descuento/100)), 2) }}€ <a href="{{ route('carrito.drop', $id) }}" class="btn btn-sm btn-danger">X</a> 
                                                </div>                                               
                                      
                                            @else
                                                <div class="col-12 mb-3">Camiseta no encontrada</div>
                                            @endif
                                
                                    @endforeach
                                </div>
                            </tbody>
                        </table>
                        <hr>
                        <div class="row text-end d-grid">
                            
                            <div class="col-3 offset-8 offset-md-7">
                                @php
                                    // Inicializamos la variable $sumaTotalPedido
                                    $sumaTotalPedido = 0;
                                @endphp

                                @foreach ($ids as $id)
                                    <!-- Obtener la información de la camiseta correspondiente al ID -->
                                    @php
                                        $camiseta = App\Models\Camiseta::find($id);
                                    @endphp

                                    <!-- Si existe la camiseta con ese ID, sumamos su precio final al total -->
                                    @if ($camiseta)
                                        @php
                                            // Calculamos el precio final del producto
                                            $precioFinalProducto = $camiseta->precio - ($camiseta->precio * $camiseta->descuento / 100);
                                            // Sumamos el precio final del producto al total
                                            $sumaTotalPedido += $precioFinalProducto;
                                        @endphp
                                    @endif
                                @endforeach

                                <!-- Mostramos el total del pedido -->
                                {{ number_format($sumaTotalPedido, 2) }}€
                            </div>

                            <!-- Botón que realiza el pedido (acción de comprar las camisetas del carrito) --> 
                            <a href="" class="col-10 mx-auto d-grid btn btn-light mt-2"><strong>Realizar pedido</strong></a>

                        </div>                      

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection