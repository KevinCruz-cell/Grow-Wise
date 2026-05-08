<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CultivoController;
use App\Http\Controllers\SiembraController;
use App\Http\Controllers\MonitoreoController;
use App\Http\Controllers\AlertaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\CosechaController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\AuditoriaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Ruta principal - Página de bienvenida
Route::get('/', function () {
    return view('Principal.principal');
})->name('home');


Route::get('/prueba', function () {
    return view('prueba');
})->name('home');


// ===========================================
// RUTAS DE AUTENTICACIÓN (PÚBLICAS)
// ===========================================
Route::get('/sesion', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/sesion', [LoginController::class, 'login']);
Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/registro', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ===========================================
// RUTAS PROTEGIDAS (REQUIEREN AUTENTICACIÓN)
// ===========================================
Route::middleware(['auth'])->group(function () {

    // Dashboard - Vista principal
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Módulo: Cultivos
    Route::get('/cultivos', [CultivoController::class, 'index'])->name('cultivos.index');
    Route::get('/cultivos/crear', [CultivoController::class, 'create'])->name('cultivos.create');
    Route::post('/cultivos', [CultivoController::class, 'store'])->name('cultivos.store');
    Route::get('/cultivos/{cultivo}', [CultivoController::class, 'show'])->name('cultivos.show');
    Route::get('/cultivos/{cultivo}/editar', [CultivoController::class, 'edit'])->name('cultivos.edit');
    Route::put('/cultivos/{cultivo}', [CultivoController::class, 'update'])->name('cultivos.update');
    Route::delete('/cultivos/{cultivo}', [CultivoController::class, 'destroy'])->name('cultivos.destroy');

    // Módulo: Siembras
    Route::get('/siembras', [SiembraController::class, 'index'])->name('siembras.index');
    Route::get('/siembras/crear', [SiembraController::class, 'create'])->name('siembras.create');
    Route::post('/siembras', [SiembraController::class, 'store'])->name('siembras.store');
    Route::get('/siembras/{siembra}', [SiembraController::class, 'show'])->name('siembras.show');
    Route::get('/siembras/{siembra}/editar', [SiembraController::class, 'edit'])->name('siembras.edit');
    Route::put('/siembras/{siembra}', [SiembraController::class, 'update'])->name('siembras.update');
    Route::delete('/siembras/{siembra}', [SiembraController::class, 'destroy'])->name('siembras.destroy');

    // Módulo: Monitoreo
    Route::get('/monitoreo', [MonitoreoController::class, 'index'])->name('monitoreo.index');
    Route::post('/monitoreo/actualizar', [MonitoreoController::class, 'actualizar'])->name('monitoreo.actualizar');

    // Módulo: Alertas
    Route::get('/alertas', [AlertaController::class, 'index'])->name('alertas.index');
    Route::post('/alertas/{alerta}/resolver', [AlertaController::class, 'resolver'])->name('alertas.resolver');
    Route::post('/alertas/marcar-todas', [AlertaController::class, 'marcarTodasComoLeidas'])->name('alertas.marcar-todas');

    // Módulo: Reportes
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
    Route::get('/reportes/generar', [ReporteController::class, 'generar'])->name('reportes.generar');
    Route::get('/reportes/{reporte}/descargar', [ReporteController::class, 'descargar'])->name('reportes.descargar');
    Route::get('/reportes/{reporte}/pdf', [ReporteController::class, 'verPdf'])->name('reportes.ver-pdf');
    Route::delete('/reportes/{reporte}', [ReporteController::class, 'destroy'])->name('reportes.destroy');

    // Módulo: Cosechas
    Route::get('/cosechas', [CosechaController::class, 'index'])->name('cosechas.index');
    Route::get('/cosechas/crear', [CosechaController::class, 'create'])->name('cosechas.create');
    Route::post('/cosechas', [CosechaController::class, 'store'])->name('cosechas.store');
    Route::get('/cosechas/{cosecha}', [CosechaController::class, 'show'])->name('cosechas.show');
    Route::get('/cosechas/{cosecha}/editar', [CosechaController::class, 'edit'])->name('cosechas.edit');
    Route::put('/cosechas/{cosecha}', [CosechaController::class, 'update'])->name('cosechas.update');
    Route::delete('/cosechas/{cosecha}', [CosechaController::class, 'destroy'])->name('cosechas.destroy');

    // Módulo: Evaluaciones
    Route::get('/evaluaciones', [EvaluacionController::class, 'index'])->name('evaluaciones.index');
    Route::get('/evaluaciones/crear', [EvaluacionController::class, 'create'])->name('evaluaciones.create');
    Route::post('/evaluaciones', [EvaluacionController::class, 'store'])->name('evaluaciones.store');
    Route::get('/evaluaciones/{evaluacion}', [EvaluacionController::class, 'show'])->name('evaluaciones.show');
    Route::get('/evaluaciones/{evaluacion}/editar', [EvaluacionController::class, 'edit'])->name('evaluaciones.edit');
    Route::put('/evaluaciones/{evaluacion}', [EvaluacionController::class, 'update'])->name('evaluaciones.update');
    Route::delete('/evaluaciones/{evaluacion}', [EvaluacionController::class, 'destroy'])->name('evaluaciones.destroy');

    // Módulo: Configuración
    Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion.index');
    Route::put('/configuracion/general', [ConfiguracionController::class, 'updateGeneral'])->name('configuracion.general');
    Route::put('/configuracion/monitoreo', [ConfiguracionController::class, 'updateMonitoreo'])->name('configuracion.monitoreo');
    Route::put('/configuracion/alertas', [ConfiguracionController::class, 'updateAlertas'])->name('configuracion.alertas');
    Route::put('/configuracion/riego', [ConfiguracionController::class, 'updateRiego'])->name('configuracion.riego');
    Route::put('/configuracion/perfil', [ConfiguracionController::class, 'updatePerfil'])->name('configuracion.perfil');
    Route::put('/configuracion/seguridad', [ConfiguracionController::class, 'updateSeguridad'])->name('configuracion.seguridad');

    // routes/web.php
    Route::get('/auditoria', [App\Http\Controllers\AuditoriaController::class, 'index'])->name('auditoria.index');
    Route::get('/auditoria/{id}', [App\Http\Controllers\AuditoriaController::class, 'show']);

});
