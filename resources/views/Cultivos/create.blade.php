{{-- resources/views/Cultivos/create.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Cultivo - GrowWise</title>
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
            --transicion: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--fondo);
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
            transition: var(--transicion);
            border-left: 4px solid transparent;
            font-weight: 500;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: rgba(46,125,50,0.05);
            color: var(--verde-hoja);
            border-left-color: var(--verde-hoja);
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

        .dropdown-menu {
            border: none;
            box-shadow: var(--sombra-media);
            border-radius: 15px;
            padding: 10px 0;
            margin-top: 10px;
        }

        .dropdown-item {
            padding: 10px 20px;
            transition: var(--transicion);
        }

        .dropdown-item:hover {
            background: rgba(46,125,50,0.05);
            color: var(--verde-hoja);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 5px 15px;
            border-radius: 50px;
            transition: var(--transicion);
            background: #f5f5f5;
        }

        .user-profile:hover {
            background: #e0e0e0;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .user-profile:hover img {
            transform: scale(1.1);
        }

        .user-profile span {
            font-weight: 600;
        }

        /* Formulario */
        .form-container {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--sombra-suave);
            max-width: 800px;
            margin: 0 auto;
        }

        .form-container:hover {
            box-shadow: var(--sombra-media);
        }

        .form-header {
            margin-bottom: 30px;
            text-align: center;
        }

        .form-header h2 {
            color: var(--verde-hoja);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #666;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: var(--gris-oscuro);
            margin-bottom: 8px;
            display: block;
        }

        .form-label i {
            color: var(--naranja);
            margin-right: 8px;
            width: 20px;
        }

        .form-control, .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            transition: var(--transicion);
            font-size: 0.95rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--verde-hoja);
            box-shadow: 0 0 0 0.2rem rgba(46,125,50,0.1);
            outline: none;
        }

        .btn-guardar {
            background: var(--verde-hoja);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transicion);
            box-shadow: 0 5px 15px rgba(46,125,50,0.3);
            text-decoration: none;
            display: inline-block;
        }

        .btn-guardar:hover {
            background: var(--verde-oscuro);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(46,125,50,0.4);
            color: white;
        }

        .btn-cancelar {
            background: #6c757d;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transicion);
            text-decoration: none;
            display: inline-block;
        }

        .btn-cancelar:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108,117,125,0.3);
            color: white;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
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
                <li><a href="{{ route('cultivos.index') }}" class="active"><i class="fas fa-seedling"></i> Cultivos</a></li>
                <li><a href="{{ route('siembras.index') }}"><i class="fas fa-sprout"></i> Siembras</a></li>
                <li><a href="{{ route('monitoreo.index') }}"><i class="fas fa-thermometer-half"></i> Monitoreo</a></li>
                <li><a href="{{ route('alertas.index') }}"><i class="fas fa-bell"></i> Alertas</a></li>
                <li><a href="{{ route('reportes.index') }}"><i class="fas fa-file-alt"></i> Reportes</a></li>
                <li><a href="{{ route('cosechas.index') }}"><i class="fas fa-carrot"></i> Cosechas</a></li>
                <li><a href="{{ route('evaluaciones.index') }}"><i class="fas fa-chart-bar"></i> Evaluaciones</a></li>
                <li><a href="{{ route('configuracion.index') }}"><i class="fas fa-cog"></i> Configuración</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="dashboard-header" data-aos="fade-down" data-aos-duration="1000">
            <div class="header-title">
                <h1>Nuevo Cultivo</h1>
                <p>Agrega un nuevo tipo de cultivo a tu catálogo</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('alertas.index') }}" class="notification-badge">
                    <i class="fas fa-bell"></i>
                    <span>3</span>
                </a>

                <!-- Dropdown de usuario -->
                <div class="dropdown">
                    <div class="user-profile dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ auth()->user()->avatar }}" alt="Profile">
                        <span>{{ auth()->user()->nombre }}</span>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('configuracion.index') }}"><i class="fas fa-user me-2"></i>Mi Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

        <!-- Formulario -->
        <div class="form-container" data-aos="fade-up" data-aos-duration="1000">
            <div class="form-header">
                <h2><i class="fas fa-seedling me-2" style="color: var(--naranja);"></i> Registrar nuevo cultivo</h2>
                <p>Completa los datos del cultivo que deseas agregar</p>
            </div>

            <form action="{{ route('cultivos.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nombre" class="form-label">
                        <i class="fas fa-tag"></i>Nombre del cultivo
                    </label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Lechuga, Tomate, Albahaca" required>
                </div>

                <div class="form-group">
                    <label for="tipo" class="form-label">
                        <i class="fas fa-layer-group"></i>Tipo de cultivo
                    </label>
                    <select class="form-select" id="tipo" name="tipo" required>
                        <option value="">Selecciona un tipo</option>
                        <option value="Hoja">Hoja</option>
                        <option value="Fruto">Fruto</option>
                        <option value="Aromática">Aromática</option>
                        <option value="Raíz">Raíz</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="descripcion" class="form-label">
                        <i class="fas fa-align-left"></i>Descripción (opcional)
                    </label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Describe las características del cultivo...">{{ old('descripcion') }}</textarea>
                </div>

                <h5 class="mt-4 mb-3" style="color: var(--verde-hoja);">
                    <i class="fas fa-chart-line me-2"></i>Parámetros óptimos de cultivo
                </h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="temperatura_optima_min" class="form-label">
                            <i class="fas fa-thermometer-half"></i>Temperatura mínima (°C)
                        </label>
                        <input type="number" step="0.1" class="form-control" id="temperatura_optima_min" name="temperatura_optima_min" value="{{ old('temperatura_optima_min') }}" placeholder="Ej: 15">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="temperatura_optima_max" class="form-label">
                            <i class="fas fa-thermometer-full"></i>Temperatura máxima (°C)
                        </label>
                        <input type="number" step="0.1" class="form-control" id="temperatura_optima_max" name="temperatura_optima_max" value="{{ old('temperatura_optima_max') }}" placeholder="Ej: 25">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="humedad_optima_min" class="form-label">
                            <i class="fas fa-tint"></i>Humedad mínima (%)
                        </label>
                        <input type="number" class="form-control" id="humedad_optima_min" name="humedad_optima_min" value="{{ old('humedad_optima_min') }}" placeholder="Ej: 60" min="0" max="100">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="humedad_optima_max" class="form-label">
                            <i class="fas fa-tint"></i>Humedad máxima (%)
                        </label>
                        <input type="number" class="form-control" id="humedad_optima_max" name="humedad_optima_max" value="{{ old('humedad_optima_max') }}" placeholder="Ej: 80" min="0" max="100">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="luz_optima_min" class="form-label">
                            <i class="fas fa-sun"></i>Luz mínima (lux)
                        </label>
                        <input type="number" class="form-control" id="luz_optima_min" name="luz_optima_min" value="{{ old('luz_optima_min') }}" placeholder="Ej: 3000">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="luz_optima_max" class="form-label">
                            <i class="fas fa-sun"></i>Luz máxima (lux)
                        </label>
                        <input type="number" class="form-control" id="luz_optima_max" name="luz_optima_max" value="{{ old('luz_optima_max') }}" placeholder="Ej: 5000">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="ph_optimo_min" class="form-label">
                            <i class="fas fa-flask"></i>pH mínimo
                        </label>
                        <input type="number" step="0.1" class="form-control" id="ph_optimo_min" name="ph_optimo_min" value="{{ old('ph_optimo_min') }}" placeholder="Ej: 6.0" min="0" max="14">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="ph_optimo_max" class="form-label">
                            <i class="fas fa-flask"></i>pH máximo
                        </label>
                        <input type="number" step="0.1" class="form-control" id="ph_optimo_max" name="ph_optimo_max" value="{{ old('ph_optimo_max') }}" placeholder="Ej: 7.0" min="0" max="14">
                    </div>
                </div>

                <div class="form-group">
                    <label for="dias_cosecha" class="form-label">
                        <i class="fas fa-calendar-alt"></i>Días hasta cosecha
                    </label>
                    <input type="number" class="form-control" id="dias_cosecha" name="dias_cosecha" value="{{ old('dias_cosecha') }}" placeholder="Ej: 30" min="1">
                </div>

                <div class="form-actions">
                    <a href="{{ route('cultivos.index') }}" class="btn-cancelar">
                        <i class="fas fa-times me-2"></i>Cancelar
                    </a>
                    <button type="submit" class="btn-guardar">
                        <i class="fas fa-save me-2"></i>Guardar Cultivo
                    </button>
                </div>
            </form>
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
