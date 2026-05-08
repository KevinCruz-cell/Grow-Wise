<?php

namespace App\Observers;

use App\Models\Auditoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuditoriaObserver
{
    protected $oldValues = [];

    /**
     * Cuando se crea
     */
    public function created($model)
    {
        // Solo registrar si no es comando de consola
        if (app()->runningInConsole()) {
            return;
        }

        Auditoria::create([
            'usuario' => Auth::user()->nombre ?? Auth::user()->email ?? 'Sistema',
            'ip_address' => Request::ip(),
            'tipo_usuario' => 'web',
            'tabla_afectada' => $model->getTable(),
            'accion' => 'INSERT',
            'registro_id' => $model->id,
            'datos_nuevos' => json_encode($model->getAttributes()),
            'user_id' => Auth::id(),
            'fecha_cambio' => now(),
        ]);
    }

    /**
     * Antes de actualizar
     */
    public function updating($model)
    {
        $this->oldValues[spl_object_id($model)] = $model->getOriginal();
    }

    /**
     * Después de actualizar
     */
    public function updated($model)
    {
        if (app()->runningInConsole()) {
            return;
        }

        $old = $this->oldValues[spl_object_id($model)] ?? [];

        // Solo cambios reales
        $changes = $model->getChanges();

        // quitar updated_at
        unset($changes['updated_at']);

        // filtrar valores anteriores
        $before = array_intersect_key($old, $changes);

        if (empty($changes)) {
            return;
        }

        Auditoria::create([
            'usuario' => Auth::user()->nombre ?? Auth::user()->email ?? 'Sistema',
            'ip_address' => Request::ip(),
            'tipo_usuario' => 'web',
            'tabla_afectada' => $model->getTable(),
            'accion' => 'UPDATE',
            'registro_id' => $model->id,
            'datos_anteriores' => json_encode($before),
            'datos_nuevos' => json_encode($changes),
            'user_id' => Auth::id(),
            'fecha_cambio' => now(),
        ]);

        unset($this->oldValues[spl_object_id($model)]);
    }

    /**
     * Cuando se elimina
     */
    public function deleted($model)
    {
        if (app()->runningInConsole()) {
            return;
        }

        Auditoria::create([
            'usuario' => Auth::user()->nombre ?? Auth::user()->email ?? 'Sistema',
            'ip_address' => Request::ip(),
            'tipo_usuario' => 'web',
            'tabla_afectada' => $model->getTable(),
            'accion' => 'DELETE',
            'registro_id' => $model->id,
            'datos_anteriores' => json_encode($model->getAttributes()),
            'user_id' => Auth::id(),
            'fecha_cambio' => now(),
        ]);
    }
}
