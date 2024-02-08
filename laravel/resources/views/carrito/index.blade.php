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
            <div class="col-auto col-md-10 mx-auto" style="margin-top: 30px;">
                <!-- Si existe algún mensaje de tipo 'info' lo mostramos dentro de un "alert" de Bootstrap -->
                @if(session('info'))
                    <div class="alert alert-success alert-dismissible fade show mb-2 text-center">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong><em>{{ session('info') }}</em></strong>
                    </div>                     
                @endif
                <!-- Si existe algún mensaje de tipo 'warning' lo mostramos dentro de un "alert" de Bootstrap -->
                @if(session('warning'))
                    <div class="alert alert-primary alert-dismissible fade show mb-2 text-center">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong><em>{{ session('warning') }}</em></strong>
                    </div>                     
                @endif
                <!-- Si existe algún mensaje de tipo 'error' lo mostramos dentro de un "alert" de Bootstrap -->
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mb-2 text-center">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong><em>{{ session('error') }}</em></strong>
                    </div>                     
                @endif
                <div class="card"  style="margin-bottom: 30px;">
                    <div class="card-header text-center" style="background-color: #F1F3F5; color: black; border-color: #343a40;">
                        <strong>MI CARRO DE COMPRA</strong>
                    </div>
                    <div class="card-body col table-responsive bg-dark text-white">
                        <!-- Mostraremos el listado de camisetas en formato tabla -->
                        <table class="table table-hover table-sm table-dark text-white">
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

                            <div class="col-auto ms-auto text-white mt-2 d-none d-md-block" style="margin-right: 80px; font-style: italic;">Descuentos aplicados *</div>
                            <!-- Botón que realiza el pedido (acción de comprar las camisetas del carrito) --> 
                            <a href="{{ route('carrito.realizarpedido') }}" class="col-10 mx-auto d-grid btn btn-light mt-2"><strong>Realizar pedido</strong></a>

                        </div>      
                        
                        <div class="row mt-3 ">
                            <div class="col-12 mt-3 text-center">
                                <strong class="bg-light text-dark p-1 pe-1" style="border-radius: 5px;"><em>Dirección de envío:</em></strong>&nbsp; {{ auth()->user()->direccion }}
                            </div>
                            <div class="col-3 offset-6 mt-3 text-end">
                                <input title="Contrareembolso" type="radio" id="efectivo" name="metodopago" value="tarjeta">
                                <label title="Contrareembolso" for="efectivo">Efectivo</label>
                            </div>
                            <div class="col-3 mt-3">
                                <input title="Pago con tarjeta" type="radio" id="tarjeta" name="metodopago" value="tarjeta">
                                <label title="Pago con tarjeta" for="tarjeta">Tarjeta</label>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection