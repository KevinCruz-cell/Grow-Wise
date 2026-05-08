<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $table = 'auditoria_cambios';

    // DECLARAR QUE NO USA TIMESTAMPS AUTOMÁTICOS
    public $timestamps = false;

    // Especificar la columna de fecha (opcional pero útil)
    const CREATED_AT = 'fecha_cambio';
    const UPDATED_AT = null;

    protected $fillable = [
        'usuario',
        'ip_address',
        'tipo_usuario',
        'tabla_afectada',
        'accion',
        'registro_id',
        'datos_anteriores',
        'datos_nuevos',
        'user_agent',
        'user_id'
    ];

    protected $casts = [
        'datos_anteriores' => 'array',
        'datos_nuevos' => 'array',
    ];

    // Método para ordenar por fecha_cambio (en lugar de created_at)
    public function scopeLatest($query)
    {
        return $query->orderBy('fecha_cambio', 'desc');
    }

    // Accesor para fecha
    public function getCreatedAtAttribute($value)
    {
        // Esto evita errores cuando se llama a created_at
        return $this->fecha_cambio;
    }
}
