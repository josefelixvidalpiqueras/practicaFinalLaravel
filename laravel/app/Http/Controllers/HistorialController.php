<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta; /* Importamos el modelo Venta */
use Illuminate\Support\Facades\DB;  /* Importamos para poder usar este tipo de consultas con el QueryBuilder */

class HistorialController extends Controller
{
    
    /* ADMINISTRADOR */
    /**
     * Función que consulta todos los pedidos de la historia de la tienda y devuelve la consulta al redireccionar 
     * al usuario a la vista del listado del historial. Los pedidos están ordenados Descendientemente por id para
     * que aparezcan primero en la lista los pedidos más recientes.
     */
    public function historialIndex() {
        $ventas = DB::table('ventas')->orderBy('id','DESC')->get(); /* Consulta de todos los pedidos de la historia de de la tienda */
        return view('historial.index', compact('ventas'));
    }

    /**
     * Función que lista la camiseta del pedido elegido por parte del Administrador al pulsar el botón para editar el estado.
     */
    public function historialEdit($id) {
        $venta = Venta::findOrFail($id);
        return view('historial.edit', compact('venta'));
    }

    /**
     * Función que cambia el estado del pedido al elegido por parte del Administrador en la ruta de edición.
     */
    public function historialUpdate(Request $request, $id) {
        $venta = Venta::findOrFail($id);
        $venta -> estado = $request -> input('estado');
        $venta -> save(); /* Guardamos el nuevo estado de la venta en su tabla en la base de datos */    
        return redirect()->route('historial.index')->with('info', 'Estado del pedido Nº '.$id.' cambiado a "'.$venta->estado.'".');
    }

    /* CLIENTE */
    /**
     * Función que muestra el lisado con el historial de pedidos del usuario CLIENTE logueado.
     */
    public function historialClienteIndex() {
        $ventas = DB::table('ventas')->where('id_user', auth()->user()->id)->get(); /* Consulta de todos los pedidos de del usuario logueado en la tienda */
        return view('historial.indexCliente', compact('ventas'));
    }
    
}
