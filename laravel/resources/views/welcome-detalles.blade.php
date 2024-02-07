@extends('layouts.enlaces-tienda')
@section('contenido')
            
    <!-- Mostramos las camisetas de oferta a cualquier cliente que entre a la web (sin necesidad de estar autenticado) -->            
    <div class="container">
        <div class="row" style="margin-top: 30px;">
            <div class="col-auto mx-auto">                    
                <div class="card text-center">
                    <div class="card-header text-center" style="background-color: #F1F3F5; color: black; border-color: #343a40;">    
                        <strong>CAMISETAS EN VENTA</strong>
                    </div>
                    <div class="card-body col table-responsive bg-dark" style="padding-bottom: 43px;">
                        <!-- Mostraremos el listado de camisetas en formato tabla -->
                        <table class="table table-hover table-sm table-dark text white">
                            <thead>
                                <th class="fw-bold fst-italic">Marca</th>
                                <th class="fw-bold fst-italic">Precio</th>
                                <th class="fw-bold fst-italic">Desc</th>  
                                <th class="fw-bold fst-italic">Img</th>                                  
                                <th class="fw-bold fst-italic">Stock</th>
                            </thead>
                            <tbody>
                                @foreach($camisetas as $camiseta)
                                <tr>
                                    <td>
                                        {{ $camiseta->marca }}
                                    </td>
                                    <td>
                                        {{ $camiseta->precio }} <?php echo" €"; ?>
                                    </td>
                                    <td>
                                        {{ $camiseta->descuento }} <?php echo"%"; ?>
                                    </td>   
                                    <td>
                                        <a href="{{ route('welcome-elegida', $camiseta->id) }}"><img class="ms-3" src="{{ asset($camiseta->imagen) }}" style="width:25px; border-radius:5px; margin-right: 1px;"></a>
                                    </td>
                                    <td>
                                        {{ $camiseta->stock }} <?php echo" uds"; ?>
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