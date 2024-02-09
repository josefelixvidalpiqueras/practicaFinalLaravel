@extends('layouts.app')

@section('content')
    
    <style type="text/css">		
        img {
            border: 1px solid white;
            transition: 0.75s ease;
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
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">
                        <strong style="margin-left: 100px;">NOTICIAS</strong>
                        <a href="{{ route('camisetas.create') }}" class="btn btn-outline-light btn-sm float-end">Nueva Noticia</a>
                    </div>
                    <div class="card-body col table-responsive bg-dark">
                        <!-- Mostraremos el listado de camisetas en formato tabla -->
                        <table class="table table-hover table-sm table-dark text-white text-center">
                            @foreach($noticias as $noticia)
                                <th class="fs-3" colspan="2">{{ $noticia->titular }}</th>
                                <tr>
                                    <td>
                                        {{ $noticia->cuerpo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="ms-3 mt-2 mb-2" src="{{ asset($noticia->imagen) }}" style="width:250px; border-radius:5px;" alt="Imagen de la camiseta">
                                    </td>
                                </tr>
                                @endforeach 
                                <hr>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection