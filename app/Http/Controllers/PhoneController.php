<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

use App\Models\Phone;
use App\Models\Tienda;

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

    public function actualizar(Request $request, $id){
       //id de la url
    $telefono = DB::table('phones')->where('id', $id)->first();

    // Actualizar el móvil con tienda en la base de datos
    DB::table('phones')->where('id', $id)->update([
        'modelo' => $request->input('model'),
        'tienda_id' => $request->input('tienda_id'), 
        'lanzamiento' => $request->input('launch'),
        'pantalla' => $request->input('screen'),
        'precio' => $request->input('price'),
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
        $telefono = DB::table('phones')->where('id', $id)->first();
        //first devuelve el primer resultado de la consulta

        DB::table('phones')->where('id', $id)->delete();

        // $logData = [
        //     'action' => 'eliminar',
        //     'phone_id' => $id,
        //     'deleted_data' => $telefono,
        // ];

        // $this->addToLog($logData);

        return redirect()->route('phones');
    }







      /////////////////////
    // LOG FUNCIONES ///////
    ///////////////////

    //AÑADIR AL LOG
//     private function addToLog($logData)
//     {
//          //Obtener el array de logs desde la sesión o un array vacío si no existe

//         $logs = Session::get('log_messages', []);
    
//         //Definir mensajes de acción para cada tipo de operación

//         $actionMessages = [

//             'almacenar' => $this->getLogMessage('Se guardó', $logData, 'phone_data'),
//             'actualizar' => $this->getLogMessage('Se actualizó', $logData, 'updated_data'),
//             'eliminar' => $this->getLogMessage('Se eliminó', $logData, 'deleted_data'),
//         ];
    
//         //Verificar si logData es un array y contiene la clave dataKey con un modelo
//         if (is_array($logData)) {
//             $action = isset($logData['action']) ? $logData['action'] : null;
//         } else {
            
//             $action = is_object($logData) ? (property_exists($logData, 'action') ? $logData->action : null) : null;
//         }
    
//         //Obtener el mensaje personalizado para la acción actual
//         $customMessage = isset($actionMessages[$action]) ? $actionMessages[$action] : null;
    
//         // Agregar el mensaje al array de logs si existe
//         if ($customMessage) {
//             $logs[] = $customMessage;
//             Session::put('log_messages', $logs);
//         }
//     }
    
//     //Función para construir el mensaje del log
//     private function getLogMessage($actionText, $logData, $dataKey)
// {
//     $modelValue = '';

//      // Verificar si logData es un array y contiene la clave dataKey con un modelo

//     if (is_array($logData) && isset($logData[$dataKey]) && is_array($logData[$dataKey]) && isset($logData[$dataKey]['model'])) {
//         //Si logData es un array y tiene la clave dataKey y model, construir el mensaje
//         $modelValue = $logData[$dataKey]['model'];
//     } elseif (is_object($logData) && property_exists($logData, $dataKey) && is_object($logData->$dataKey) && property_exists($logData->$dataKey, 'model')) {
//         //Si logData es un objeto y tiene la propiedad dataKey y model, construir el mensaje
//         $modelValue = $logData->$dataKey->model;
//     }

//     // Construir el mensaje final
//     if ($modelValue) {
//         return $actionText.' el móvil "'.$modelValue.'" en la base de datos';
//     } else {
//         return 'Error al registrar el log de '.$actionText;
//     }
// }

    
    
}
