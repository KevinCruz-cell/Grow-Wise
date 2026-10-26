<?php

namespace App\Http\Controllers;

use App\Models\Siembra;
use App\Models\Cultivo;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class SiembraController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $siembras = Siembra::with(['cultivo', 'modulo'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $stats = [
            'activas' => Siembra::where('user_id', $user->id)->where('estado', 'Activa')->count(),
            'total' => Siembra::where('user_id', $user->id)->count(),
            'por_cosechar' => Siembra::where('user_id', $user->id)
                ->where('estado', 'Activa')
                ->whereNotNull('fecha_estimada_cosecha')
                ->where('fecha_estimada_cosecha', '<=', now()->addDays(15))
                ->count(),
            'con_problemas' => Siembra::where('user_id', $user->id)->where('estado', 'Problema')->count(),
        ];

        return view('Siembras.siembras', compact('siembras', 'stats'));
    }

    public function create()
    {
        $cultivos = Cultivo::all();
        // Obtener los módulos del usuario actual
        $modulos = Modulo::where('user_id', auth()->id())->get();

        // Para debug (puedes eliminar esto después)
        // dd($modulos); // Verifica que aquí aparecen tus 4 módulos

        return view('Siembras.create', compact('cultivos', 'modulos'));
    }

    public function store(Request $request)
    {
        // Validar campos de siembra
        $request->validate([
            'cultivo_id' => 'required|exists:cultivos,id',
            'modulo_id' => 'nullable|exists:modulos,id',
            'charola' => 'required|integer|min:1|max:10',
            'fecha_siembra' => 'required|date',
            'cantidad_semillas' => 'nullable|integer|min:1',
            'observaciones' => 'nullable|string',
        ]);

        // Verificar si viene un módulo existente o hay que crear uno nuevo
        if ($request->has('modulo_id') && !empty($request->modulo_id)) {
            // Usar módulo existente
            $modulo_id = $request->modulo_id;
        } elseif ($request->has('nuevo_modulo_nombre') && !empty($request->nuevo_modulo_nombre)) {
            // Crear nuevo módulo (siempre con tipo_riego = 'Automático')
            $modulo = Modulo::create([
                'user_id' => auth()->id(),
                'nombre' => $request->nuevo_modulo_nombre,
                'ubicacion' => $request->nuevo_modulo_ubicacion ?? 'Sin ubicación',
                'num_charolas' => $request->nuevo_modulo_num_charolas ?? 4,
                'tipo_riego' => 'Automático', // Siempre automático
                'activo' => true,
            ]);

            $modulo_id = $modulo->id;
        } else {
            return back()->withErrors(['modulo' => 'Debes seleccionar un módulo o crear uno nuevo'])->withInput();
        }

        // Verificar que la charola esté disponible en el módulo seleccionado
        $modulo = Modulo::find($modulo_id);
        if (!$modulo->charolaDisponible($request->charola)) {
            return back()->withErrors(['charola' => 'La charola seleccionada ya tiene una siembra activa'])->withInput();
        }

        // Crear la siembra
        Siembra::create([
            'user_id' => auth()->id(),
            'cultivo_id' => $request->cultivo_id,
            'modulo_id' => $modulo_id,
            'charola' => $request->charola,
            'fecha_siembra' => $request->fecha_siembra,
            'cantidad_semillas' => $request->cantidad_semillas,
            'observaciones' => $request->observaciones,
            'estado' => 'Activa'
        ]);

        return redirect()->route('siembras.index')->with('success', 'Siembra registrada correctamente');
    }

    public function show(string $id)
    {
        $siembra = Siembra::with(['cultivo', 'modulo', 'cosecha', 'evaluacion'])
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return view('Siembras.show', compact('siembra'));
    }

    public function edit(string $id)
    {
        $siembra = Siembra::where('user_id', auth()->id())->findOrFail($id);
        $cultivos = Cultivo::all();
        $modulos = Modulo::where('user_id', auth()->id())->get();

        return view('Siembras.edit', compact('siembra', 'cultivos', 'modulos'));
    }

    public function update(Request $request, string $id)
    {
        $siembra = Siembra::where('user_id', auth()->id())->findOrFail($id);

        $request->validate([
            'cultivo_id' => 'required|exists:cultivos,id',
            'modulo_id' => 'required|exists:modulos,id',
            'charola' => 'required|integer|min:1|max:10',
            'fecha_siembra' => 'required|date',
            'estado' => 'required|in:Activa,Completada,Problema,Cancelada',
            'observaciones' => 'nullable|string',
        ]);

        // Si cambia de módulo o charola, verificar disponibilidad
        if ($siembra->modulo_id != $request->modulo_id || $siembra->charola != $request->charola) {
            $modulo = Modulo::find($request->modulo_id);
            if (!$modulo->charolaDisponible($request->charola)) {
                return back()->withErrors(['charola' => 'La charola seleccionada ya tiene una siembra activa'])->withInput();
            }
        }

        $siembra->update($request->all());

        return redirect()->route('siembras.index')->with('success', 'Siembra actualizada correctamente');
    }

    public function destroy(string $id)
    {
        try {
            $siembra = Siembra::where('user_id', auth()->id())->findOrFail($id);

            if ($siembra->cosecha) {
                return redirect()->route('siembras.index')
                    ->with('error', 'No se puede eliminar la siembra porque tiene una cosecha asociada.');
            }

            if ($siembra->evaluacion) {
                return redirect()->route('siembras.index')
                    ->with('error', 'No se puede eliminar la siembra porque tiene una evaluación asociada.');
            }

            $siembra->delete();

            return redirect()->route('siembras.index')
                ->with('success', 'Siembra eliminada correctamente');

        } catch (QueryException $e) {
            return redirect()->route('siembras.index')
                ->with('error', 'Error al eliminar la siembra.');
        }
    }
}
