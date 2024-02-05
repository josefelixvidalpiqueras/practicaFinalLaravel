<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camiseta; /* Importamos el modelo Camiseta */
use Illuminate\Support\Facades\DB;  /* Importamos para poder usar este tipo de consultas con el QueryBuilder */


class CamisetaController extends Controller
{
    
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
     */
    public function welcomeDetalles() {
        $camisetas = DB::table('camisetas')->where('stock', '<>', 0)->get(); /* Almacenamos la consulta que devuelve todos los campos de las 8 Camisetascon mayor descuento. */
        return view('welcome-detalles', compact('camisetas')); /* Ejecutamos la consulta al recargar la vista */
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
        $newCamiseta -> imagen = $request -> input('imagen');
        $newCamiseta -> save(); /* Guardamos la nueva Camiseta en su tabla en la base de datos */    
        return redirect()->route('camisetas.index')->with('info', 'Camiseta insertada correctamente.'); /* Tras crear la camiseta redirigimos al usuario al listado de Camisetas */
    }

    /**
     * Función que borra la Camiseta de la base de datos.
     */
    public function camisetasDestroy($id){
        $camiseta = Camiseta::findOrFail($id); /* Busca la Camiseta con el id pasasdo por el botón de Eliminar o arroja un fallo */
        $camiseta -> delete();
        return redirect()->route('camisetas.index')->with('info', 'Camiseta eliminada con éxito.');
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
        $camiseta -> imagen = $request -> input('imagen');
        $camiseta -> save(); /* Guardamos los nuevos datos de la Camiseta en su tabla en la base de datos */    
        return redirect()->route('camisetas.index')->with('info', 'Camiseta actualizada correctamente.'); /* Tras actualizar la Camiseta redirigimos al usuario al listado de Camisetas */
    }
}