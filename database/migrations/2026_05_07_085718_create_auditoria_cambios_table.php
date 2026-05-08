<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_create_auditoria_cambios_table.php
    public function up()
    {
        Schema::create('auditoria_cambios', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->string('ip_address', 45);
            $table->enum('tipo_usuario', ['web', 'db', 'sistema'])->default('web');
            $table->string('tabla_afectada');
            $table->enum('accion', ['INSERT', 'UPDATE', 'DELETE']);
            $table->unsignedBigInteger('registro_id')->nullable();
            $table->json('datos_anteriores')->nullable();
            $table->json('datos_nuevos')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditoria_cambios');
    }
};
