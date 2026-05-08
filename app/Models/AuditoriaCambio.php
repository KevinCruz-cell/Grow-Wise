<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditoriaCambio extends Model
{
    protected $table = 'auditoria_cambios';

    protected $fillable = [
        'usuario', 'ip_address', 'tipo_usuario', 'tabla_afectada',
        'accion', 'registro_id', 'datos_anteriores', 'datos_nuevos', 'user_agent'
    ];

    protected $casts = [
        'datos_anteriores' => 'array',
        'datos_nuevos' => 'array',
    ];

    // Relación con usuario web (si existe)
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario', 'nombre');
    }

    // Obtener ícono según tipo de usuario
    public function getIconoAttribute()
    {
        return match($this->tipo_usuario) {
            'web' => '🌐',
            'db' => '🗄️',
            'sistema' => '⚙️',
            default => '👤',
        };
    }
}
