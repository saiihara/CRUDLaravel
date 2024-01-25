<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

use App\Models\Phone;
use App\Models\Tienda;
use App\Models\Log as LogModel;

class PhoneController extends Controller{

    /**
     * Muestra la vista de la portada o página de inicio.
     *
     * view Vista de la portada o inicio.
     */

    public function portada(){
        return view('inicio');
    }

    
    /////////////////////
    // MOSTRAR FUNCION ///////
    ///////////////////

    /**
     * Muestra la vista de móviles con sus tiendas y realiza una búsqueda si se proporciona un término de búsqueda.
     *
     * @param  Request  $request Datos de la solicitud HTTP.
     * @return view Vista que muestra los móviles con sus tiendas.
     */

    public function composiciones(Request $request)
    {
        $phones = Phone::with('tienda')->get();
        $busqueda = $request->input('buscar');
        $tiendas = Tienda::all();
    
        return view('moviles')->with('phones', $phones)->with('busqueda', $busqueda)->with('tiendas', $tiendas);
    }


    /////////////////////
    // ALMACENAR FUNCION ///////
    ///////////////////

    /**
     * Muestra el formulario de inserción con la lista de todas las tiendas.
     *
     * @return view Vista que muestra el formulario de inserción con la lista de tiendas.
     */

    public function crear(){
        $tiendas = Tienda::all(); //coger todas las tiendas
        return view('insertar', ['tiendas' => $tiendas]); //pasarlas a la vista
    }

    /**
     * Muestra el formulario de inserción con la lista de todas las tiendas.
     *
     * @return view Vista que muestra el formulario de inserción con la lista de tiendas.
     */

        public function insertar()
        {
            $tiendas = Tienda::all();
            return view('insertar', ['tiendas' => $tiendas]);
        }
        

    /**
     * Almacena un nuevo móvil en la base de datos.
     *
     * @param  Request  $request Datos del formulario de inserción.
     * @return route Redirige a la lista de móviles después de la inserción.
     */
    public function almacenar(Request $request)
    {
        Phone::create([
            'modelo' => $request->input('model'),
            'tienda_id' => $request->input('tienda_id'),
            'lanzamiento' => $request->input('launch'),
            'pantalla' => $request->input('screen'),
            'precio' => $request->input('price'),
        ]);

        // Registro en el log
        LogModel::create([
            'accion' => 'almacenar',
            'tabla_afectada' => 'phones',
            'detalle' => 'Se ha almacenado un nuevo móvil',
        ]);

        return redirect()->route('phones');
    }


      /////////////////////
    // EDITAR FUNCION ///////
    ///////////////////

    /**
     * Muestra el formulario de edición para un teléfono específico.
     *
     * @param  int  $id ID del teléfono que se va a editar.
     * @return view Vista que muestra el formulario de edición con la información del teléfono y la lista de tiendas.
     */

    public function editar($id){

        //Obtener un móvil específico por su ID
        $telefono = DB::table('phones')->where('id', $id)->first();
        $tiendas = Tienda::all(); //TODAS LAS TIENDAS
        return view('editar', ['phone' => $telefono, 'tiendas' => $tiendas]); //pasar tiendas a la vista
    }
    

       /////////////////////
    // ACTUALIZAR MOVIL FUNCION ///////
    ///////////////////

        /**
     * Actualiza la información de un teléfono según su ID.
     *
     * @param  Request  $request Datos actualizados del teléfono.
     * @param  int  $id ID del teléfono que se va a actualizar.
     * @return route Redirige a la lista de teléfonos después de la actualización.
     */

     public function actualizar(Request $request, $id)
     {
         $telefono = Phone::findOrFail($id);
 
         $telefono->update([
             'modelo' => $request->input('model'),
             'tienda_id' => $request->input('tienda_id'),
             'lanzamiento' => $request->input('launch'),
             'pantalla' => $request->input('screen'),
             'precio' => $request->input('price'),
         ]);
 
         // Registro en el log
         LogModel::create([
             'accion' => 'actualizar',
             'tabla_afectada' => 'phones',
             'detalle' => 'Se ha actualizado el móvil con ID ' . $id,
         ]);
 
         return redirect()->route('phones');
     }

        // $logData = [
        //     'action' => 'actualizar',
        //     'phone_id' => $id,
        //     'updated_data' => $request->all(),
        //     'original_data' => $telefono,
        // ];

        // $this->addToLog($logData);

    

         /////////////////////
    // ELIMINAR FUNCION ///////
    ///////////////////

    /**
     * Elimina un teléfono según su ID.
     *
     * @param  int  $id ID del teléfono que se va a eliminar.
     * @return route Redirige a la lista de teléfonos después de la eliminación.
     */

     public function eliminar($id)
     {
         $telefono = Phone::findOrFail($id);
 
         $telefono->delete();
 
         // Registro en el log
         LogModel::create([
             'accion' => 'eliminar',
             'tabla_afectada' => 'phones',
             'detalle' => 'Se ha eliminado el móvil con ID ' . $id,
         ]);
 
         return redirect()->route('phones');
     }







    
    
}
