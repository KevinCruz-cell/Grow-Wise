<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\User;
use Illuminate\Http\Request;

class AuditoriaController extends Controller
{
    public function index(Request $request)
    {


        $query = Auditoria::with('user');

        // Filtros
        if ($request->filled('tabla')) {
            $query->where('tabla', $request->tabla);
        }

        if ($request->filled('accion')) {
            $query->where('accion', $request->accion);
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $logs = $query->latest()->paginate(10);

        // Para dropdown de usuarios
        $users = User::all();

        return view('auditoria.index', compact('logs', 'users'));
    }
}
