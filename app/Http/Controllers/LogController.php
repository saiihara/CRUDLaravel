<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Routing\Controller;

class LogController extends Controller
{

    /**
     * Muestra todos los logs
     *
     * @return view
     */

    public function index()
    {
        $logs = Log::latest()->get();
        //latest coge los ultimos logs dependiendo del the created_at timestamp
        return view('log.log', compact('logs'));
    }

     /**
     * Borra el log especificado por la id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $log = Log::findOrFail($id);
        $log->delete();

        return redirect()->route('log.log')
            ->with('success', 'Registro de log eliminado exitosamente');
    }
}
