{{-- resources/views/Configuracion/configuracion.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración - GrowWise</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --verde-hoja: #2E7D32;
            --verde-menta: #81C784;
            --verde-oscuro: #1B5E20;
            --tierra: #8D6E63;
            --naranja: #FF9800;
            --naranja-oscuro: #F57C00;
            --azul-cielo: #64B5F6;
            --fondo: #F8F9FA;
            --gris-oscuro: #2c3e50;
            --sombra-suave: 0 10px 30px rgba(0,0,0,0.1);
            --sombra-media: 0 15px 40px rgba(0,0,0,0.15);
            --transicion: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #333;
            overflow-x: hidden;
        }

        /* Dashboard layout */
        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: white;
            box-shadow: 2px 0 20px rgba(0,0,0,0.05);
            transition: var(--transicion);
            position: relative;
            z-index: 10;
        }

        .sidebar-header {
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(46,125,50,0.1);
        }

        .sidebar-header h3 {
            font-weight: 800;
            color: var(--verde-hoja);
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        .sidebar-header h3 i {
            color: var(--naranja);
            margin-right: 10px;
        }

        .sidebar-header p {
            color: #888;
            font-size: 0.9rem;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-menu ul {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 25px;
            color: #555;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            font-weight: 500;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: rgba(46,125,50,0.05);
            color: var(--verde-hoja);
            border-left-color: var(--verde-hoja);
            transform: translateX(5px);
        }

        .sidebar-menu a i {
            width: 30px;
            font-size: 1.3rem;
            margin-right: 10px;
            color: var(--verde-hoja);
        }

        /* Main content */
        .main-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        /* Header */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 20px 30px;
            border-radius: 20px;
            box-shadow: var(--sombra-suave);
            transition: var(--transicion);
        }

        .dashboard-header:hover {
            box-shadow: var(--sombra-media);
        }

        .header-title h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--verde-hoja);
            margin-bottom: 5px;
        }

        .header-title p {
            color: #666;
            font-size: 0.95rem;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification-badge {
            position: relative;
            font-size: 1.5rem;
            color: #666;
            transition: var(--transicion);
            text-decoration: none;
        }

        .notification-badge:hover {
            color: var(--naranja);
            transform: scale(1.1);
        }

        .notification-badge span {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--naranja);
            color: white;
            font-size: 0.7rem;
            padding: 2px 5px;
            border-radius: 10px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px 15px;
            border-radius: 50px;
            background: #f5f5f5;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-profile span {
            font-weight: 600;
        }

        /* Mensajes de alerta */
        .alert {
            border-radius: 50px;
            padding: 15px 25px;
            border: none;
            margin-bottom: 20px;
        }

        .alert-success {
            background: rgba(46,125,50,0.1);
            color: var(--verde-hoja);
            border: 1px solid rgba(46,125,50,0.2);
        }

        .alert-danger {
            background: rgba(220,53,69,0.1);
            color: #dc3545;
            border: 1px solid rgba(220,53,69,0.2);
        }

        /* Botones */
        .btn-naranja {
            background: linear-gradient(135deg, var(--naranja), var(--naranja-oscuro));
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transicion);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-naranja:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255,152,0,0.3);
            color: white;
        }

        .btn-outline-verde {
            background: transparent;
            border: 2px solid var(--verde-hoja);
            color: var(--verde-hoja);
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transicion);
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline-verde:hover {
            background: var(--verde-hoja);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46,125,50,0.3);
        }

        .btn-cerrar-sesion {
            background: #dc3545;
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: var(--transicion);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            box-shadow: 0 10px 20px rgba(220,53,69,0.3);
        }

        .btn-cerrar-sesion:hover {
            background: #b02a37;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(220,53,69,0.4);
            color: white;
        }

        /* Tarjetas de configuración */
        .settings-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .settings-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: var(--sombra-suave);
            transition: var(--transicion);
            border: 1px solid rgba(46,125,50,0.1);
        }

        .settings-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: var(--sombra-media);
        }

        .settings-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .settings-header i {
            font-size: 2rem;
            color: var(--verde-hoja);
            background: rgba(46,125,50,0.1);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
        }

        .settings-header h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--gris-oscuro);
            margin: 0;
        }

        .settings-body {
            padding-left: 65px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 500;
            color: #666;
            margin-bottom: 5px;
            display: block;
        }

        .form-control, .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            transition: var(--transicion);
            outline: none;
            background: white;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--verde-hoja);
            box-shadow: 0 0 0 3px rgba(46,125,50,0.1);
        }

        .form-check {
            margin-bottom: 10px;
        }

        .form-check-input:checked {
            background-color: var(--verde-hoja);
            border-color: var(--verde-hoja);
        }

        .btn-guardar {
            background: var(--verde-hoja);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transicion);
            width: 100%;
            margin-top: 10px;
        }

        .btn-guardar:hover {
            background: var(--verde-oscuro);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(46,125,50,0.3);
        }

        /* Botón de cerrar sesión al final */
        .logout-section {
            text-align: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid rgba(46,125,50,0.1);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .dashboard {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 20px;
            }
            .settings-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
<div class="dashboard">
    <!-- Sidebar -->
    <div class="sidebar" data-aos="fade-right" data-aos-duration="1000">
        <div class="sidebar-header">
            <h3><i class="fas fa-seedling"></i> GrowWise</h3>
            <p>Gestión Inteligente</p>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Vista general</a></li>
                <li><a href="{{ route('cultivos.index') }}"><i class="fas fa-seedling"></i> Cultivos</a></li>
                <li><a href="{{ route('siembras.index') }}"><i class="fas fa-sprout"></i> Siembras</a></li>
                <li><a href="{{ route('monitoreo.index') }}"><i class="fas fa-thermometer-half"></i> Monitoreo</a></li>
                <li><a href="{{ route('alertas.index') }}"><i class="fas fa-bell"></i> Alertas</a></li>
                <li><a href="{{ route('reportes.index') }}"><i class="fas fa-file-alt"></i> Reportes</a></li>
                <li><a href="{{ route('cosechas.index') }}"><i class="fas fa-carrot"></i> Cosechas</a></li>
                <li><a href="{{ route('evaluaciones.index') }}"><i class="fas fa-chart-bar"></i> Evaluaciones</a></li>
                <li><a href="{{ route('configuracion.index') }}" class="active"><i class="fas fa-cog"></i> Configuración</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="dashboard-header" data-aos="fade-down" data-aos-duration="1000">
            <div class="header-title">
                <h1>Configuración del Sistema</h1>
                <p>Ajusta los parámetros generales de tu huerto inteligente</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('alertas.index') }}" class="notification-badge">
                    <i class="fas fa-bell"></i>
                    @php
                        $alertasCount = \App\Models\Alerta::where('user_id', auth()->id())->where('estado', 'Pendiente')->count();
                    @endphp
                    @if($alertasCount > 0)
                        <span>{{ $alertasCount }}</span>
                    @endif
                </a>

                <!-- Perfil de usuario (solo visual, sin dropdown) -->
                <div class="user-profile">
                    <img src="{{ auth()->user()->avatar }}" alt="Profile">
                    <span>{{ auth()->user()->nombre }}</span>
                </div>
            </div>
        </div>

        <!-- Mensajes de sesión -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Tarjetas de configuración -->
        <div class="settings-grid">
            <!-- Configuración general -->
            <div class="settings-card" data-aos="fade-up" data-aos-delay="100">
                <div class="settings-header">
                    <i class="fas fa-sliders-h"></i>
                    <h3>Configuración general</h3>
                </div>
                <div class="settings-body">
                    <form action="{{ route('configuracion.general') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nombre del huerto</label>
                            <input type="text" class="form-control" name="nombre_huerto" value="{{ $config['general']['nombre_huerto'] ?? 'Mi Huerto GrowWise' }}">
                        </div>
                        <div class="form-group">
                            <label>Ubicación</label>
                            <input type="text" class="form-control" name="ubicacion" value="{{ $config['general']['ubicacion'] ?? 'Ciudad de México' }}">
                        </div>
                        <div class="form-group">
                            <label>Zona horaria</label>
                            <select class="form-select" name="zona_horaria">
                                <option value="America/Mexico_City" {{ ($config['general']['zona_horaria'] ?? '') == 'America/Mexico_City' ? 'selected' : '' }}>América/México City (GMT-6)</option>
                                <option value="America/New_York" {{ ($config['general']['zona_horaria'] ?? '') == 'America/New_York' ? 'selected' : '' }}>América/New York (GMT-5)</option>
                                <option value="Europe/Madrid" {{ ($config['general']['zona_horaria'] ?? '') == 'Europe/Madrid' ? 'selected' : '' }}>Europe/Madrid (GMT+1)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-guardar"><i class="fas fa-save me-2"></i>Guardar cambios</button>
                    </form>
                </div>
            </div>

            <!-- Configuración de monitoreo -->
            <div class="settings-card" data-aos="fade-up" data-aos-delay="200">
                <div class="settings-header">
                    <i class="fas fa-thermometer-half"></i>
                    <h3>Monitoreo ambiental</h3>
                </div>
                <div class="settings-body">
                    <form action="{{ route('configuracion.monitoreo') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Intervalo de medición</label>
                            <select class="form-select" name="intervalo_medicion">
                                <option value="15" {{ ($config['monitoreo']['intervalo_medicion'] ?? '') == 15 ? 'selected' : '' }}>Cada 15 minutos</option>
                                <option value="30" {{ ($config['monitoreo']['intervalo_medicion'] ?? '') == 30 ? 'selected' : '' }}>Cada 30 minutos</option>
                                <option value="60" {{ ($config['monitoreo']['intervalo_medicion'] ?? '') == 60 ? 'selected' : '' }}>Cada 1 hora</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkTemp" name="temperatura" value="1" {{ ($config['monitoreo']['temperatura'] ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="checkTemp">
                                Monitorear temperatura
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkHum" name="humedad" value="1" {{ ($config['monitoreo']['humedad'] ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="checkHum">
                                Monitorear humedad del suelo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkLight" name="luz" value="1" {{ ($config['monitoreo']['luz'] ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="checkLight">
                                Monitorear nivel de luz
                            </label>
                        </div>
                        <button type="submit" class="btn-guardar mt-3"><i class="fas fa-save me-2"></i>Guardar cambios</button>
                    </form>
                </div>
            </div>

            <!-- Configuración de alertas -->
            <div class="settings-card" data-aos="fade-up" data-aos-delay="300">
                <div class="settings-header">
                    <i class="fas fa-bell"></i>
                    <h3>Alertas y notificaciones</h3>
                </div>
                <div class="settings-body">
                    <form action="{{ route('configuracion.alertas') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Umbral de humedad baja</label>
                            <input type="number" class="form-control" name="umbral_humedad_baja" value="{{ $config['alertas']['umbral_humedad_baja'] ?? 30 }}" min="0" max="100">
                        </div>
                        <div class="form-group">
                            <label>Umbral de temperatura alta</label>
                            <input type="number" class="form-control" name="umbral_temperatura_alta" value="{{ $config['alertas']['umbral_temperatura_alta'] ?? 35 }}" min="0" max="50">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="alertEmail" name="email_notificaciones" value="1" {{ ($config['alertas']['email_notificaciones'] ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="alertEmail">
                                Recibir alertas por email
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="alertPush" name="push_notificaciones" value="1" {{ ($config['alertas']['push_notificaciones'] ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="alertPush">
                                Recibir notificaciones push
                            </label>
                        </div>
                        <button type="submit" class="btn-guardar mt-3"><i class="fas fa-save me-2"></i>Guardar cambios</button>
                    </form>
                </div>
            </div>

            <!-- Configuración de riego -->
            <div class="settings-card" data-aos="fade-up" data-aos-delay="400">
                <div class="settings-header">
                    <i class="fas fa-water"></i>
                    <h3>Riego automático</h3>
                </div>
                <div class="settings-body">
                    <form action="{{ route('configuracion.riego') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="riegoAuto" name="automatico" value="1" {{ ($config['riego']['automatico'] ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="riegoAuto">
                                Activar riego automático
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Hora de inicio</label>
                            <input type="time" class="form-control" name="hora_inicio" value="{{ $config['riego']['hora_inicio'] ?? '08:00' }}">
                        </div>
                        <div class="form-group">
                            <label>Duración (minutos)</label>
                            <input type="number" class="form-control" name="duracion" value="{{ $config['riego']['duracion'] ?? 10 }}" min="1" max="60">
                        </div>
                        <div class="form-group">
                            <label>Frecuencia</label>
                            <select class="form-select" name="frecuencia">
                                <option value="diario" {{ ($config['riego']['frecuencia'] ?? '') == 'diario' ? 'selected' : '' }}>Diario</option>
                                <option value="cada2" {{ ($config['riego']['frecuencia'] ?? '') == 'cada2' ? 'selected' : '' }}>Cada 2 días</option>
                                <option value="personalizado" {{ ($config['riego']['frecuencia'] ?? '') == 'personalizado' ? 'selected' : '' }}>Personalizado</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-guardar mt-3"><i class="fas fa-save me-2"></i>Guardar cambios</button>
                    </form>
                </div>
            </div>

            <!-- Configuración de perfil -->
            <div class="settings-card" data-aos="fade-up" data-aos-delay="500">
                <div class="settings-header">
                    <i class="fas fa-user"></i>
                    <h3>Perfil de usuario</h3>
                </div>
                <div class="settings-body">
                    <form action="{{ route('configuracion.perfil') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nombre" value="{{ auth()->user()->nombre }}">
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" class="form-control" name="apellido" value="{{ auth()->user()->apellido }}">
                        </div>
                        <div class="form-group">
                            <label>Correo electrónico</label>
                            <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="tel" class="form-control" name="telefono" value="{{ auth()->user()->telefono }}">
                        </div>
                        <button type="submit" class="btn-guardar"><i class="fas fa-save me-2"></i>Actualizar perfil</button>
                    </form>
                </div>
            </div>

            <!-- Configuración de seguridad -->
            <div class="settings-card" data-aos="fade-up" data-aos-delay="600">
                <div class="settings-header">
                    <i class="fas fa-lock"></i>
                    <h3>Seguridad</h3>
                </div>
                <div class="settings-body">
                    <form action="{{ route('configuracion.seguridad') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Contraseña actual</label>
                            <input type="password" class="form-control" name="password_actual" placeholder="••••••••">
                        </div>
                        <div class="form-group">
                            <label>Nueva contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="••••••••">
                        </div>
                        <div class="form-group">
                            <label>Confirmar contraseña</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="••••••••">
                        </div>
                        <button type="submit" class="btn-guardar"><i class="fas fa-save me-2"></i>Cambiar contraseña</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Botón de Cerrar Sesión -->
        <div class="logout-section" data-aos="fade-up" data-aos-delay="700">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-cerrar-sesion">
                    <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                </button>
            </form>
            <p class="text-muted mt-3" style="font-size: 0.9rem;">Al cerrar sesión volverás a la página principal</p>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });
</script>
</body>
</html>
