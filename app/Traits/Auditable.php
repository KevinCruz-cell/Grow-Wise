<?php

namespace App\Traits;

use App\Models\AuditoriaCambio;
use Illuminate\Support\Facades\Auth;

trait Auditable
{
    protected static function bootAuditable()
    {
        static::created(function ($model) {
            self::registrarAuditoria($model, 'INSERT', null, $model->toArray());
        });

        static::updated(function ($model) {
            self::registrarAuditoria($model, 'UPDATE', $model->getOriginal(), $model->getChanges());
        });

        static::deleted(function ($model) {
            self::registrarAuditoria($model, 'DELETE', $model->toArray(), null);
        });
    }

    protected static function registrarAuditoria($model, $accion, $antes, $despues)
    {
        AuditoriaCambio::create([
            'usuario' => auth()->user()->nombre ?? 'Sistema',
            'ip_address' => request()->ip(),
            'tipo_usuario' => auth()->check() ? 'web' : 'sistema',
            'tabla_afectada' => $model->getTable(),
            'accion' => $accion,
            'registro_id' => $model->id,
            'datos_anteriores' => $antes,
            'datos_nuevos' => $despues,
            'user_agent' => request()->userAgent(),
        ]);
    }
}
