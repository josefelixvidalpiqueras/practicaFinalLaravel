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
                        <strong>ADMINISTRAR CUENTAS</strong>
                    </div>
                    <div class="card-body col table-responsive bg-dark">
                        <!-- Mostraremos el listado de cuentas de usuario en formato tabla -->
                        <table class="table table-hover table-sm table-dark text white">
                            <thead>
                                <th>NIF</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Cuenta</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->nif }}
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td class="d-grid">
                                        <?php
                                            if ($user->activo==0) {
                                        ?>
                                                <a href="{{ route('cuentas.update', $user->id) }}" class="btn btn-outline-success btn-sm border border-1 border-ligth">Activar</a>       
                                        <?php
                                            } else {
                                        ?>
                                                <a href="{{ route('cuentas.update', $user->id) }}" class="btn btn-outline-warning btn-sm border border-1 border-ligth">Desactivar</a>       
                                        <?php
                                            }
                                        ?>
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