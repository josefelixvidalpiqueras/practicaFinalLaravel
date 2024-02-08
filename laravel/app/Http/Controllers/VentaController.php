<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Camiseta; /* Importamos el modelo Camiseta */
use App\Models\Venta; /* Importamos el modelo Venta */
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
    public function carritoAdd($id, $precioVenta, $descuento, Request $request){

        // Obtener, por separado, los array actuales de IDs almacenadas en la sesión o inicializarlos si no existen, y del precio_venta y descuento_venta.
        $ids = $request->session()->get('ids', []);
        $precios = $request->session()->get('precios', []);
        $descuentos = $request->session()->get('descuentos', []);

        // Agregar la nueva ID al array, y los nuevos valores a recordar de la camiseta (precio_venta y descuento_venta)
        $ids[] = $id;
        $precios[] = $precioVenta;
        $descuentos[] = $descuento;

        // Almacenar el nuevo array en la sesión
        $request->session()->put('ids', $ids);
        $request->session()->put('precios', $precios);
        $request->session()->put('descuentos', $descuentos);


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
        // Obtenemos el array de IDs almacenadas en la sesión, asi como los array que recuerdan los precios de venta y descuentos de venta de cada camiseta.
        $ids = $request->session()->get('ids', []);
        $precios = $request->session()->get('precios', []);
        $descuentos = $request->session()->get('descuentos', []);

        // Buscamos la primera aparición del ID, precio_venta y descuento_venta en los array y los eliminamos (sólo la primera aparición, o borraría todas las unidades de esa camiseta del carrito)
        if (($key = array_search($id, $ids)) !== false) {
            unset($ids[$key]);
            unset($precios[$key]);
            unset($descuentos[$key]);
        }

        // Actualizamos los array de IDs precios y descuentos en la sesión
        $request->session()->put('ids', $ids);
        $request->session()->put('precios', $precios);
        $request->session()->put('descuentos', $descuentos);
    

        // Obtenemos la cantidad de camisetas actualmente en el carrito de compras (contamos los elementos del array de IDs)
        $cantidadCamisetas = count($ids);

        // Actualizamos la cantidad de camisetas en una variable de sesión (cantidad_camisetas)
        $request->session()->put('cantidad_camisetas', $cantidadCamisetas);

        // Redireccionamos al listado del carrito de compra actualizado
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

    /**
     * Método para realizar un pedido (compra).
     */
    public function realizarPedido(Request $request)
    {
        // Obtenemos los datos necesarios de las variables de sesión que hemos ido preparando.
        $ids = $request->session()->get('ids', []);
        $precios = $request->session()->get('precios', []);
        $descuentos = $request->session()->get('descuentos', []);
    
        // Obtenemos el ID del usuario autenticado
        $userId = Auth::id();

        // Verificamos si el carrito está vacío para informar al usuario.
        if (empty($ids)) {
            return redirect()->route('carrito.index')->with('warning', 'Añade alguna camiseta al carrito para realizar un pedido.');
        }
        
        // ME CALENTÉ Y NO ME ACORDÉ QUE LAS CAMISETAS EN STOCK NO SE MUESTRAN EN LA TIENDA, 
        // PERO PARA UN FUTURO YA ESTÁ HECHA LA COMPROBACIÓN DE NO RESTAR CON STOCK 0 EN LA BASE DE DATOS
        // Verificamos si hay suficiente stock para cada camiseta en el carrito
        foreach ($ids as $key => $id) {
            $camiseta = Camiseta::find($id);
            if (!$camiseta || $camiseta->stock <= 0) {
                // Si no hay suficiente stock, notificamos al usuario y redirigimos de vuelta al carrito
                return redirect()->route('carrito.index')->with('error', 'La camiseta ' . $camiseta->marca . ' - ' . $camiseta->modelo . ' no está disponible en stock.');
            }
        }
    
        // Recorremos los elementos del carrito y creamos una venta para cada camiseta en el mismo pedido.
        foreach ($ids as $key => $id) {
            // Creamos una nueva instancia de Venta
            $venta = new Venta();
            $venta->id_camiseta = $id;
            $venta->id_user = $userId;
            $venta->estado = 'Preparando';
            $venta->precio_venta = $precios[$key];
            $venta->descuento_venta = $descuentos[$key];
            $venta->save();

            // Restamos 1 al campo 'stock' de la camiseta (pero sólo si el stock es mayor a 0)
            $camiseta = Camiseta::find($id);
            if ($camiseta && $camiseta->stock > 0) {
                $camiseta->decrement('stock', 1);
            }
        }
    
        // Limpiamos la sesión después de realizar el pedido (para vaciar el carrito y no recordar los datos del pedido anterior)
        $request->session()->forget(['ids', 'precios', 'descuentos', 'cantidad_camisetas']);
    
        // Redirigimos al usuario de nuevo al carrito con el mensaje de pedido realizado con éxito
        return redirect()->route('carrito.index')->with('info', 'Compra realizada con éxito. Revise su historial de pedidos.');
    }


}
