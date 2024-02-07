<?php

namespace App\Http\Controllers;
use App\Models\Camiseta; /* Importamos el modelo Camiseta */
use Illuminate\Support\Facades\DB;  /* Importamos para poder usar este tipo de consultas con el QueryBuilder */

use Illuminate\Http\Request;

class VentaController extends Controller
{

    /**
     * Función que crea un array de variables de sesión en cada ejecución (si éste todavía no existe) y añade el nuevo id de la camiseta añadida al carrito.
     * Laravel está configurado por defecto (en el fichero "config/session.php") para que las variables de sesión duren 120 minutos. Por ello, el carro de compra
     * se mantendrá en memoria durante ese tiempo. Para cambiar esto, modificar en dicho fichero el parámetro 'expire_on_close' => true, para que solo duren mientras el
     * navegador no se cierre, que es lo que yo he hecho para la práctica.
     */
    public function carritoAdd($id, Request $request){

        // Obtener el array actual de IDs almacenadas en la sesión o inicializarlo si no existe
        $ids = $request->session()->get('ids', []);

        // Agregar la nueva ID al array
        $ids[] = $id;

        // Almacenar el nuevo array en la sesión
        $request->session()->put('ids', $ids);

        // Obtenemos la cantidad de camisetas actualmente en el carrito de compras (contamos los elementos del array de IDs)
        $cantidadCamisetas = count($ids);

        // Almacenar la cantidad de camisetas en una variable de sesión (cantidad_camisetas)
        $request->session()->put('cantidad_camisetas', $cantidadCamisetas);

        // Redireccionar al listado del carrito de compra actualizado
        return redirect()->route('carrito.index');
    }

    /**
     * Función que quita la camiseta del carrito de compras (la saca del array de IDs almacenado en sesión).
     * La función se lanza al pulsar el botón "X" del carrito de compras (pasandole el "id" a borrar).
     */
    public function carritoDrop($id, Request $request){
        // Obtenemos el array de IDs almacenadas en la sesión
        $ids = $request->session()->get('ids', []);

        // Eliminamos el ID especificado del array
        $ids = array_diff($ids, [$id]);

        // Actualizamos el array de IDs en la sesión
        $request->session()->put('ids', $ids);

        // Obtenemos la cantidad de camisetas actualmente en el carrito de compras (contamos los elementos del array de IDs)
        $cantidadCamisetas = count($ids);

        // Actualizamos la cantidad de camisetas en una variable de sesión (cantidad_camisetas)
        $request->session()->put('cantidad_camisetas', $cantidadCamisetas);

        // Redireccionar al listado del carrito de compra actualizado
        return redirect()->route('carrito.index');
    }
    

    /**
     * Funcion que muestra la vista actualizada del carrito de compras teniendo encuenta la cantidad de camisetas del carrito en todo momento.
     */
    public function carritoIndex(Request $request){
        // Obtener la cantidad de camisetas en el carrito de compras accediendo a la variable de sesión que creamos previamente en la función "carritoAdd".
        $cantidadCamisetas = $request->session()->get('cantidad_camisetas', 0);

        // Obtenemos el array de IDs almacenadas en la sesión
        $ids = $request->session()->get('ids', []);

        // Pasamos el array de IDs a la vista para mostrar sus camisetas asociadas en un listado
        return view('carrito.index', ['ids' => $ids]);
    }

}
