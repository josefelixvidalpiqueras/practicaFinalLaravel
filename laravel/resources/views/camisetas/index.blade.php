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
                        <strong>ADMINISTRAR CAMISETAS</strong>
                        <a href="{{ route('camisetas.create') }}" class="btn btn-outline-light btn-sm float-end">Nueva Camiseta</a>
                    </div>
                    <div class="card-body col table-responsive bg-dark">
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
                                <th></th>
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
                                        <img class="ms-3" src="{{ asset($camiseta->imagen) }}" style="width:25px; border-radius:5px;" alt="Imagen de la camiseta">
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
                                    <td class="btn-group float-end">
                                        <a href="{{ route('camisetas.edit', $camiseta->id) }}" class="btn btn-outline-warning btn-sm border border-1 border-ligth">Editar</a>       
                                        <a href="javascript: document.getElementById('delete-{{$camiseta->id}}').submit()" class="btn btn-outline-danger btn-sm border border-1 border-ligth" style="border-radius: 0px 5px 5px 0px;">Eliminar</a>
                                        <form id="delete-{{$camiseta->id}}" action="{{ route('camisetas.destroy', $camiseta->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                        </form>
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
@endsection