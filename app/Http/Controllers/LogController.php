<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Routing\Controller;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::latest()->get();
        return view('log.log', compact('logs'));
    }

    public function destroy($id)
    {
        $log = Log::findOrFail($id);
        $log->delete();

        return redirect()->route('log.log')
            ->with('success', 'Registro de log eliminado exitosamente');
    }
}
