<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditoriaController extends Controller
{
    public function index(Request $request)
    {
        // Obtener TODOS los registros sin filtros primero para diagnosticar
        $query = DB::table('auditoria_cambios')
            ->orderBy('id', 'desc');
        // No usar where para ver todos

        // Aplicar filtros solo si se seleccionan
        if ($request->filled('tabla')) {
            $query->where('tabla_afectada', $request->tabla);
        }

        if ($request->filled('accion')) {
            $query->where('accion', $request->accion);
        }

        if ($request->filled('usuario')) {
            $query->where('usuario', 'LIKE', '%' . $request->usuario . '%');
        }

        $logs = $query->paginate(20)->appends($request->all());

        // Para debugging - mostrar en consola si hay registros
        \Log::info('Total registros encontrados: ' . $logs->total());

        // Obtener listas para filtros
        $tablas = DB::table('auditoria_cambios')
            ->distinct()
            ->pluck('tabla_afectada');

        $usuarios_db = DB::table('auditoria_cambios')
            ->distinct()
            ->pluck('usuario');

        $usuarios_web = User::all();
        $tipos_usuario = ['web' => '🌐 Web', 'db' => '🗄️ Base Datos', 'sistema' => '⚙️ Sistema'];

        return view('auditoria.index', compact('logs', 'tablas', 'usuarios_db', 'usuarios_web', 'tipos_usuario'));
    }

    public function show($id)
    {
        $log = DB::table('auditoria_cambios')->where('id', $id)->first();

        if (!$log) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        return response()->json([
            'id' => $log->id,
            'usuario' => $log->usuario,
            'tipo_usuario' => $log->tipo_usuario ?? 'sistema',
            'ip_address' => $log->ip_address ?? '127.0.0.1',
            'tabla_afectada' => $log->tabla_afectada,
            'accion' => $log->accion,
            'registro_id' => $log->registro_id,
            'datos_anteriores' => json_decode($log->datos_anteriores, true),
            'datos_nuevos' => json_decode($log->datos_nuevos, true),
            'user_agent' => $log->user_agent ?? null,
            'fecha_cambio' => $log->fecha_cambio ? date('d/m/Y H:i:s', strtotime($log->fecha_cambio)) : null
        ]);
    }
}
