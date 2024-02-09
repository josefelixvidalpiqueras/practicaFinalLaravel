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
                    <div class="card-body col table-responsive bg-dark">
                        <!-- Filtro aplicable por el usuario antes de reenviar el formulario con el filtro elegido (por defecto sin filtro aplicado) -->
                        <form method="GET" action="{{ route('welcome-detalles') }}">
                            <div class="mb-3">
                                <label for="marca" class="form-label text-light"><em>Filtrar por Marca:</em></label>
                                <select class="form-select" id="marca" name="marca">
                                    <option value="">Todas las Marcas</option>
                                    <option value="Nike">Nike</option>
                                    <option value="Adidas">Adidas</option>
                                    <option value="Vans">Vans</option>
                                    <option value="Puma">Puma</option>
                                    <!-- Agregar más opciones según las marcas disponibles -->
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mb-1">Aplicar Filtro</button>
                        </form>
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