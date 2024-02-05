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
            <div class="col-md-12">
                <!-- Si existe algún mensaje de tipo 'info' lo mostramos dentro de un "alert" de Bootstrap -->
                @if(session('info'))
                    <div class="alert alert-success alert-dismissible fade show mb-2 text-center">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong><em>{{ session('info') }}</em></strong>
                    </div>                     
                @endif
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">
                        <strong>MI PERFIL</strong>
                        <a href="{{ route('perfiles.editCliente', auth()->user()->id) }}" class="btn btn-outline-light btn-sm float-end">Modificar Perfil</a>
                    </div>
                    <div class="card-body col table-responsive bg-dark">
                        <!-- Mostraremos el listado de camisetas en formato tabla -->
                        <table class="table table-hover table-sm table-dark text white">
                            <thead>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Contraseña</th>
                                <th>NIF</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        ****
                                    </td>
                                    <td>
                                        {{ $user->nif }}
                                    </td>
                                    <td>
                                        {{ $user->direccion }}
                                    </td>
                                    <td>
                                        {{ $user->telefono }}
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