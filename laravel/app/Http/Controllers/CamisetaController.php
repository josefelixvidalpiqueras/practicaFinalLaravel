<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camiseta; /* Importamos el modelo Camiseta */
use Illuminate\Support\Facades\DB;  /* Importamos para poder usar este tipo de consultas con el QueryBuilder */


class CamisetaController extends Controller
{
    
    /* LÓGICA DE RUTAS PÚBLICAS DE LA TIENDA */

    /**
     * Función que muestra el listado de las primeras 8 camisetas en la blade 'welcome', ordenadas Descendentemente por DESCUENTO (8 mejores ofertas).
     * Las camisetas sin stock no se mostrarán en la tienda.
     * Los clientes (incluso sin autenticar) pueden verla.
     */
    public function welcome() {
        $camisetas = DB::table('camisetas')->where('stock', '<>', 0)->orderBy('descuento', 'DESC')->limit(8)->get(); /* Almacenamos la consulta que devuelve todos los campos de las 8 Camisetascon mayor descuento. */
        return view('welcome', compact('camisetas')); /* Ejecutamos la consulta al recargar la vista */
    }

    /**
     * Función que muestra el listado con todos los detalles de todas las camisetas en venta.
     * Las camisetas sin stock no se mostrarán en la Tienda.
     * Los clientes (incluso sin autenticar) pueden verla.
     * Esta función recibe el formulario con los filtros aplicables por el usuario para filtrar las camisetas por marca.
     */
    public function welcomeDetalles(Request $request) {
        // Obtener todas las camisetas
        $query = DB::table('camisetas')->where('stock', '<>', 0);
    
        // Aplicar filtro si se proporciona
        if ($request->has('marca')) {
            $marca = $request->input('marca');
            if ($marca != '') {
                $query->where('marca', $marca);
            }
        }
    
        // Obtener los resultados filtrados
        $camisetas = $query->get();
    
        // Pasar los resultados a la vista
        return view('welcome-detalles', compact('camisetas'));
    }

    /**
     * 
     * Función que muestra todos los detalles de la camiseta cuya imagen ha sido pinchada, dando la opción de añadir al carro en la nueva vista redirigida.
     * Los clientes (incluso sin autenticar) pueden verla.
     */
    public function welcomeElegida($id) {
        $camisetas = DB::table('camisetas')->where('id', $id)->get(); /* Almacenamos la consulta que devuelve todos los campos de las 8 Camisetascon mayor descuento. */
        return view('welcome-elegida', compact('camisetas')); /* Ejecutamos la consulta al recargar la vista */
    }    


    /* LÓGICA DE ADMINISTRADOR */
        
    /**
     * Función que muestra el listado de camisetas con las opciones extra del Administrador
     */
    public function camisetasIndex(){
        $camisetas = Camiseta::all(); /* Almacenamos la consulta que devuelve todos los campos de todas las Camisetas */
        return view('camisetas.index', compact('camisetas')); /* Ejecutamos la consulta al recargar la vista */
    }

    /**
     * Función que redirige a la vista del formulario de creación de camisetas.
     */
    public function camisetasCreate(){
        return view('camisetas.create');
    }

    /**
     * Función que recoge los campos introducidos en el formulario y crea una nueva Camiseta con ellos.
     */
    public function camisetasStore(Request $request){
        $newCamiseta = new Camiseta;
        $newCamiseta -> marca = $request -> input('marca');
        $newCamiseta -> modelo = $request -> input('modelo');
        $newCamiseta -> caracteristicas = $request -> input('caracteristicas');
        $newCamiseta -> precio = $request -> input('precio');
        $newCamiseta -> stock = $request -> input('stock');
        $newCamiseta -> descuento = $request -> input('descuento');

        // Verificamos si se ha enviado un archivo de imagen
        if ($request->hasFile('imagen')) {
            // Obtenemos el archivo de imagen de la solicitud
            $imagen = $request->file('imagen');
            
            // Verificamos si la imagen se cargó correctamente
            if ($imagen->isValid()) {
                // Generamos un nombre único para la imagen
                $nombreImagen = time().'.'.$imagen->getClientOriginalExtension();
                
                // Movemos la imagen a la ruta pertinente (en mi caso "images" es donde tengo todas mis imágenes en la carpeta public del proyecto)
                $imagen->move(public_path('images'), $nombreImagen);
                
                // Asignamos la ruta de la imagen al objeto de Camiseta
                $newCamiseta->imagen = 'images/'.$nombreImagen;
            }
        }

        $newCamiseta -> save(); /* Guardamos la nueva Camiseta en su tabla en la base de datos */    
        return redirect()->route('camisetas.index')->with('info', 'Camiseta insertada correctamente.'); /* Tras crear la camiseta redirigimos al usuario al listado de Camisetas */
    }

    /**
     * Función que borra la Camiseta de la base de datos (en realidad sólo deshabilita la camiseta poniendo el stock a 0).
     */
    public function camisetasDestroy($id){
        $camiseta = Camiseta::findOrFail($id); 
        $camiseta->stock = 0; // Establecer el stock a cero en lugar de eliminar la camiseta
        $camiseta->save(); // Guardar los cambios en la base de datos
        return redirect()->route('camisetas.index')->with('info', $camiseta->marca." ".$camiseta->modelo." ".' deshabilitada en tienda (stock a 0).');
    }
    
    /**
     * Función que recoge el 'id' de la camiseta a editar elegida en el formulario.
     */
    public function camisetasEdit($id){
        $camiseta = Camiseta::findOrFail($id);
        return view('camisetas.edit', compact('camiseta')); /* Redirigimos al usuario a la ruta de edit pasandole la camiseta recogida */
    }

    /**
     * Función con la lógica de actualizar los datos de la camiseta elegida en la base de datos.
     */
    public function camisetasUpdate(Request $request, $id){
        $camiseta = Camiseta::findOrFail($id);
        $camiseta -> marca = $request -> input('marca');
        $camiseta -> modelo = $request -> input('modelo');
        $camiseta -> caracteristicas = $request -> input('caracteristicas');
        $camiseta -> precio = $request -> input('precio');
        $camiseta -> stock = $request -> input('stock');
        $camiseta -> descuento = $request -> input('descuento');
        
        // Verificamos si se ha enviado un archivo de imagen
        if ($request->hasFile('imagen')) {
            // Validamos la imagen pasada desde el formulario
            $request->validate([
                'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Obtenemos el archivo de imagen de la solicitud
            $imagen = $request->file('imagen');

            // Verificamos si la imagen se ha cargado correctamente
            if ($imagen->isValid()) {
                // Generamos un nombre único para la imagen
                $nombreImagen = time().'.'.$imagen->getClientOriginalExtension();

                // Movemos la imagen a la ruta pertinente (en mi caso "images" en la carpeta public)
                $imagen->move(public_path('images'), $nombreImagen);

                // Asignamos la ruta de la imagen actualizada al objeto de Camiseta
                $camiseta->imagen = 'images/'.$nombreImagen;
            }
        }

        $camiseta -> save(); /* Guardamos los nuevos datos de la Camiseta en su tabla en la base de datos */    
        return redirect()->route('camisetas.index')->with('info', 'Camiseta actualizada correctamente.'); /* Tras actualizar la Camiseta redirigimos al usuario al listado de Camisetas */
    }
}