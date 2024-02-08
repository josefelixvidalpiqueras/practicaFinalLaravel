@extends('layouts.app')

@section('content')
    
    <style type="text/css">		
        img {
            border: 1px solid white;
            transition: 0.75s ease;
        }
        img:hover {
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
    <div class="container">
        <div class="row">
            <div class="col-auto mx-auto">
                <!-- Si existe algún mensaje de tipo 'info' lo mostramos dentro de un "alert" de Bootstrap -->
                @if(session('info'))
                    <div class="alert alert-success alert-dismissible fade show mb-2 text-center">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong><em>{{ session('info') }}</em></strong>
                    </div>                     
                @endif
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">
                        <strong>HISTORIAL DE PEDIDOS</strong>
                    </div>
                    <div class="card-body col table-responsive bg-dark">
                        <!-- Mostraremos el listado de datos del usuario en formato tabla -->
                        <table class="table table-hover table-sm table-dark text-white">
                            <thead class="text-center">
                                <th>Nº Pedido</th>
                                <th>Camiseta</th>
                                <th>Cliente</th>
                                <th>Estado</th>
                                <th>Precio Venta</th>
                                <th>Descuento Venta</th>
                                <th>Fecha</th>
                            </thead>
                            <tbody class="text-center">
                                @foreach($ventas as $venta)
                                <tr>
                                    <td>
                                        {{ $venta->id }}
                                    </td>
                                    <td>
                                        @php
                                            $camiseta = App\Models\Camiseta::findOrFail($venta->id_camiseta); /* Forma rápida de acceder a campos entre tablas relacionadas */
                                        @endphp
                                        {{ $camiseta->marca }} {{ $camiseta->modelo }}
                                    </td>
                                    <td>
                                        @php
                                            $usuario = App\Models\User::findOrFail($venta->id_user); /* Forma rápida de acceder a campos entre tablas relacionadas */
                                        @endphp
                                        {{ $usuario->nif }}
                                    </td>
                                    <td>
                                        {{ $venta->estado }}
                                    </td>
                                    <td>
                                        {{ $venta->precio_venta }} €
                                    </td>
                                    <td>
                                        {{ $venta->descuento_venta }} %
                                    </td>
                                    <td>
                                        {{ $venta->created_at }}
                                    </td>
                                    <td><a href="{{ route('historial.edit', $venta->id) }}" class="btn btn-outline-warning border-light btn-sm ms-2">Cambiar Estado</a></td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection