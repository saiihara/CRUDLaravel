<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tienda;
use App\Http\Controllers\LogController;

use App\Models\Log;

class TiendaController extends Controller
{

  /**
     * Instancia la clase Log 
     *
     * 
     */

    private $logController;

    public function __construct(LogController $logController)
    {
        $this->logController = $logController;
    }

    public function actualizarLog(Request $request, $id)
    {
        // Tu lógica de actualización...

        // Registrar en el log
        $this->logController->store('actualizar', 'tiendas');

        return redirect()->route('tiendas.index');
    }

    /**
     * Muestra la lista de todas las tiendas.
     *
     * @return view Vista que muestra la lista de tiendas.
     */

    public function index(){
        $tiendas = Tienda::all(); 
        return view('tienda.tienda', ['tiendas' => $tiendas]);
    }


     /**
     * Recibe como parámetro la tienda a editar desde la url 
     * 
     * @param ID tienda
     * return view
     */

   
    public function editar($id){
        try {
            //se busca a una tienda por su id, si se encuentra, se asigna a la variable tienda y si no, lo captura el catch
            $tienda = Tienda::findOrFail($id);
            //si hay exito que vaya a la vista
            return view('tienda.editarTienda', ['tienda' => $tienda]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    

    /**
     * Muestra una tienda sola
     * 
     * @param int ID tienda
     * return view o route Redirige a la vista de una tienda
     */

    public function show($id){

    //busca una tienda por su id
    // ( si no encuentra la tienda será null)
    $tienda = Tienda::find($id);
    
    // \Log::info('Tienda: ' . print_r($tienda, true));
    

    //si no existe la tienda
    if (!$tienda) {
        //se reridije a la vista y se pone un mensaje de error
        return redirect()->route('tiendas.index')->with('error', 'Tienda not found');
    }
    
    //si hay exito
    return view('tienda.show', ['tienda' => $tienda]);
}

    

    /**
     * Actualiza la información de una tienda específica.
     *
     * @param  Request $request Objeto de solicitud que contiene los datos actualizados.
     * @param  int $id_tienda
     * @return route Redirige a la lista de tiendas después de la actualización.
     */
    public function actualizar(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'localizacion' => 'required',
            'cid' => 'required',
            'numero_trabajadores' => 'required|integer',
        ]);
    
        // Encontrar la tienda por su ID
        $tienda = Tienda::findOrFail($id); 
    
        // Guardar los datos actualizados de la tienda
        $tienda->update([
            'nombre' => $request->input('nombre'),
            'localizacion' => $request->input('localizacion'),
            'cid' => $request->input('cid'),
            'numero_trabajadores' => $request->input('numero_trabajadores'),
        ]);
    
        // Crear un registro de log
        Log::create([
            'accion' => 'actualizar',
            'tabla_afectada' => 'tiendas',
            'detalle' => 'Se ha actualizado la tienda ' . $tienda->nombre . ' (' . $tienda->id . ')',
        ]);
    
        // Redirigir a la página de índice de tiendas
        return redirect()->route('tiendas.index');
    }


    /**
     * Muestra el formulario para añadir una nueva tienda.
     * 
     * @return view
     */

    public function crear()
    {
        return view('tienda.añadirTienda');
    }

    /**
     * Almacena una nueva tienda en la base de datos.
     *
     * @param Request $request Objeto de solicitud que contiene los datos actualizados.
     * @return route Redirige a la lista de tiendas después de guardar la nueva tienda
     */

     public function guardar(Request $request)
     {
         $request->validate([
             'nombre' => 'required',
             'localizacion' => 'required',
             'cid' => 'required',
             'numero_trabajadores' => 'required|integer',
         ]);
 
         Tienda::create([
             'nombre' => $request->input('nombre'),
             'localizacion' => $request->input('localizacion'),
             'cid' => $request->input('cid'),
             'numero_trabajadores' => $request->input('numero_trabajadores'),
         ]);
 
         // Crear registro en el log
         Log::create([
             'accion' => 'crear',
             'tabla_afectada' => 'tiendas',
             'detalle' => 'Se ha creado una nueva tienda',
         ]);
 
         return redirect()->route('tiendas.index');
     }

    /**
     * Elimina una tienda específica de la base de datos.
     *
     * @param  int $id_tienda
     * @return route Redirige a la lista de tiendas después de eliminar la tienda.
     */

    public function eliminar($id)
    {
        Tienda::findOrFail($id)->delete(); 

        // Crear registro en el log
        Log::create([
            'accion' => 'eliminar',
            'tabla_afectada' => 'tiendas',
            'detalle' => 'Se ha eliminado la tienda con ID ' . $id,
        ]);

        return redirect()->route('tiendas.index');
    }



    /**
     * Muestra la información detallada de una tienda en particular desde la vista de móviles.
     *
     * @param  int $id_tienda
     * @return view Vista de detalles de la tienda.
     */

    public function verTienda($id)
    {
        $tienda = Tienda::findOrFail($id);
        return view('tienda.verTienda', ['tienda' => $tienda]);
    }

}
