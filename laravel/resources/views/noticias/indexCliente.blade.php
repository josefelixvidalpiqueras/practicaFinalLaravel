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
                <!-- Si existe algún mensaje de tipo 'info' lo mostramos dentro de un "alert" de Bootstrap -->
                @if(session('info'))
                    <div class="alert alert-success alert-dismissible fade show mb-2 text-center">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong><em>{{ session('info') }}</em></strong>
                    </div>                     
                @endif
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">
                        <strong style="margin-left: 100px;">NOTICIAS</strong>
                    </div>
                    <div class="card-body col table-responsive bg-dark text-white">
                        <!-- Mostraremos el listado de noticias -->
                        @foreach($noticias as $noticia)
                            <div class="text-center">
                                <img class="ms-3 mt-2 mb-2" src="{{ asset($noticia->imagen) }}" style="width:250px; border-radius:5px;" alt="Imagen de la camiseta">
                            </div>
                            <h1>
                                {{ $noticia->titular }}
                            </h1>                            
                            <p>
                                {{ $noticia->cuerpo }}
                            </p>
                            <hr class="text-white   ">
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection