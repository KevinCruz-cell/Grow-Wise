{{-- resources/views/Monitoreo/monitoreo.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoreo - GrowWise</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
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

        /* Tarjetas de monitoreo rápido */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: var(--sombra-suave);
            transition: var(--transicion);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid rgba(46,125,50,0.1);
        }

        .stat-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: var(--sombra-media);
        }

        .stat-info h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--verde-hoja);
            margin-bottom: 5px;
        }

        .stat-info p {
            color: #666;
            font-weight: 500;
            margin: 0;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--verde-menta), var(--verde-hoja));
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            transition: var(--transicion);
        }

        .stat-card:hover .stat-icon {
            transform: rotate(5deg) scale(1.1);
        }

        /* Gráficos */
        .charts-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 40px;
        }

        .chart-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: var(--sombra-suave);
            transition: var(--transicion);
        }

        .chart-card:hover {
            box-shadow: var(--sombra-media);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .chart-header h5 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--verde-hoja);
            margin: 0;
        }

        .chart-header i {
            color: var(--naranja);
            margin-right: 5px;
        }

        canvas {
            max-height: 200px;
            width: 100% !important;
        }

        /* Sensores por módulo */
        .sensores-section {
            margin-bottom: 40px;
        }

        .sensores-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .sensores-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--verde-hoja);
        }

        .sensores-header h2 i {
            margin-right: 10px;
            color: var(--naranja);
        }

        .sensores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
        }

        .sensor-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: var(--sombra-suave);
            transition: var(--transicion);
            border: 1px solid rgba(46,125,50,0.1);
        }

        .sensor-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--sombra-media);
        }

        .sensor-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .sensor-header h6 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--verde-oscuro);
            margin: 0;
        }

        .sensor-status {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #28a745;
            box-shadow: 0 0 10px #28a745;
        }

        .sensor-status.warning {
            background: var(--naranja);
            box-shadow: 0 0 10px var(--naranja);
        }

        .sensor-status.danger {
            background: #dc3545;
            box-shadow: 0 0 10px #dc3545;
        }

        .sensor-reading {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .sensor-reading span:first-child {
            color: #666;
            font-size: 0.9rem;
        }

        .sensor-reading span:last-child {
            font-weight: 700;
            color: var(--verde-hoja);
            font-size: 1.2rem;
        }

        .progress {
            height: 6px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .progress-bar {
            background: linear-gradient(90deg, var(--verde-menta), var(--verde-hoja));
            border-radius: 10px;
        }

        /* Tabla de lecturas recientes */
        .table-container {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: var(--sombra-suave);
            transition: var(--transicion);
        }

        .table-container:hover {
            box-shadow: var(--sombra-media);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .table-header h5 {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--verde-hoja);
            margin: 0;
        }

        .table-header i {
            margin-right: 10px;
            color: var(--naranja);
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 12px 10px;
            color: #666;
            font-weight: 600;
            border-bottom: 2px solid #f0f0f0;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #f0f0f0;
        }

        tr:hover {
            background: rgba(46,125,50,0.02);
        }

        /* Estado vacío */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: var(--sombra-suave);
        }

        .empty-state i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            color: #666;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #999;
            margin-bottom: 20px;
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
            .charts-row {
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
                <li><a href="{{ route('monitoreo.index') }}" class="active"><i class="fas fa-thermometer-half"></i> Monitoreo</a></li>
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
                <h1>Monitoreo Ambiental</h1>
                <p>Variables en tiempo real de tus cultivos</p>
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

        <!-- Tarjetas de resumen -->
        <div class="stats-grid">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="50">
                <div class="stat-info">
                    <h3>{{ $stats['temperatura']['valor'] ?? '23.5' }}°C</h3>
                    <p>Temperatura</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-thermometer-half"></i>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-info">
                    <h3>{{ $stats['humedad_ambiente']['valor'] ?? '65' }}%</h3>
                    <p>Humedad ambiente</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-tint"></i>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="150">
                <div class="stat-info">
                    <h3>{{ $stats['luz']['valor'] ?? '4200' }} lux</h3>
                    <p>Luz</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-sun"></i>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-info">
                    <h3>{{ $stats['ph']['valor'] ?? '7.2' }}</h3>
                    <p>pH del suelo</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-flask"></i>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="250">
                <div class="stat-info">
                    <h3>{{ $stats['nutrientes']['valor'] ?? '1200' }} ppm</h3>
                    <p>Nutrientes</p>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-leaf"></i>
                </div>
            </div>
        </div>

        <!-- Gráficos -->
        <div class="charts-row">
            <div class="chart-card" data-aos="fade-right" data-aos-delay="100">
                <div class="chart-header">
                    <h5><i class="fas fa-temperature-high"></i> Temperatura (°C) - Últimas 24h</h5>
                    <select class="form-select-sm" style="width: auto;" id="tempPeriod" onchange="cargarDatosTemperatura()">
                        <option value="24h" selected>Últimas 24h</option>
                        <option value="7d">Última semana</option>
                        <option value="30d">Último mes</option>
                    </select>
                </div>
                <canvas id="tempChart"></canvas>
            </div>
            <div class="chart-card" data-aos="fade-left" data-aos-delay="200">
                <div class="chart-header">
                    <h5><i class="fas fa-tint"></i> Humedad suelo (%) - Últimas 24h</h5>
                    <select class="form-select-sm" style="width: auto;" id="humedadPeriod" onchange="cargarDatosHumedad()">
                        <option value="24h" selected>Últimas 24h</option>
                        <option value="7d">Última semana</option>
                        <option value="30d">Último mes</option>
                    </select>
                </div>
                <canvas id="humedadChart"></canvas>
            </div>
        </div>

        <!-- Sensores por módulo -->
        <div class="sensores-section">
            <div class="sensores-header">
                <h2><i class="fas fa-microchip"></i> Sensores por Módulo</h2>
                <button class="btn-naranja btn-sm" onclick="window.location.reload()">
                    <i class="fas fa-sync-alt"></i> Actualizar
                </button>
            </div>

            @if($modulos->count() > 0)
                <div class="sensores-grid">
                    @foreach($modulos as $modulo)
                        @foreach($modulo->sensores as $sensor)
                            <div class="sensor-card" data-aos="zoom-in" data-aos-delay="50">
                                <div class="sensor-header">
                                    <h6>{{ $modulo->nombre }} - {{ $sensor->nombre }}</h6>
                                    @php
                                        $estado = 'success';
                                        if($sensor->tipo == 'Humedad' && $sensor->ultima_lectura < 30) $estado = 'danger';
                                        elseif($sensor->tipo == 'Humedad' && $sensor->ultima_lectura < 50) $estado = 'warning';
                                        elseif($sensor->tipo == 'Temperatura' && $sensor->ultima_lectura > 30) $estado = 'danger';
                                    @endphp
                                    <div class="sensor-status {{ $estado }}"></div>
                                </div>
                                <div class="sensor-reading">
                                    <span>{{ $sensor->tipo }}:</span>
                                    <span>{{ $sensor->ultima_lectura ?? '0' }}{{ $sensor->unidad }}</span>
                                </div>
                                <div class="progress">
                                    @php
                                        $porcentaje = $sensor->ultima_lectura ?? 0;
                                        if($sensor->tipo == 'Temperatura') $porcentaje = ($porcentaje / 40) * 100;
                                        if($sensor->tipo == 'Humedad') $porcentaje = $porcentaje;
                                        if($sensor->tipo == 'Luz') $porcentaje = ($porcentaje / 10000) * 100;
                                    @endphp
                                    <div class="progress-bar" style="width: {{ min($porcentaje, 100) }}%"></div>
                                </div>
                                <small class="text-muted">Última lectura: {{ $sensor->ultima_lectura_at ? $sensor->ultima_lectura_at->diffForHumans() : 'Nunca' }}</small>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-microchip"></i>
                    <h3>No hay sensores registrados</h3>
                    <p>Los sensores aparecerán aquí cuando estén configurados</p>
                </div>
            @endif
        </div>

        <!-- Lecturas recientes -->
        <div class="table-container" data-aos="fade-up" data-aos-delay="100">
            <div class="table-header">
                <h5><i class="fas fa-history"></i> Últimas lecturas registradas</h5>
                <a href="#" class="btn-outline-verde btn-sm">Ver histórico</a>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th>Fecha/Hora</th>
                        <th>Módulo</th>
                        <th>Sensor</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($lecturasRecientes as $lectura)
                        <tr>
                            <td>{{ $lectura->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $lectura->modulo_nombre }}</td>
                            <td>{{ $lectura->sensor_nombre }}</td>
                            <td>{{ $lectura->tipo }}</td>
                            <td>{{ $lectura->valor }}{{ $lectura->unidad }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <div class="empty-state">
                                    <i class="fas fa-chart-line"></i>
                                    <p>No hay lecturas registradas</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
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

    // Gráfico de temperatura
    let tempChart;
    const ctxTemp = document.getElementById('tempChart').getContext('2d');

    function cargarDatosTemperatura() {
        let periodo = document.getElementById('tempPeriod').value;

        // Aquí iría una llamada AJAX para obtener datos reales
        // Por ahora usamos datos de ejemplo
        let datos = {
            '24h': [22, 21, 20, 23, 26, 27, 25, 23],
            '7d': [21, 22, 23, 24, 25, 24, 23],
            '30d': [20, 21, 22, 23, 24, 25, 24, 23, 22, 21]
        };

        let labels = {
            '24h': ['00:00', '03:00', '06:00', '09:00', '12:00', '15:00', '18:00', '21:00'],
            '7d': ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
            '30d': ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4']
        };

        if (tempChart) tempChart.destroy();

        tempChart = new Chart(ctxTemp, {
            type: 'line',
            data: {
                labels: labels[periodo],
                datasets: [{
                    label: '°C',
                    data: datos[periodo],
                    borderColor: '#2E7D32',
                    backgroundColor: 'rgba(46,125,50,0.05)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#2E7D32',
                    pointBorderColor: '#fff',
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: false, grid: { color: 'rgba(0,0,0,0.03)' } } }
            }
        });
    }

    // Gráfico de humedad
    let humedadChart;
    const ctxHum = document.getElementById('humedadChart').getContext('2d');

    function cargarDatosHumedad() {
        let periodo = document.getElementById('humedadPeriod').value;

        let datos = {
            '24h': [70, 68, 65, 63, 60, 58, 62, 65],
            '7d': [65, 68, 70, 67, 64, 62, 60],
            '30d': [68, 70, 67, 65, 63, 62, 64, 66, 68, 70]
        };

        let labels = {
            '24h': ['00:00', '03:00', '06:00', '09:00', '12:00', '15:00', '18:00', '21:00'],
            '7d': ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
            '30d': ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4']
        };

        if (humedadChart) humedadChart.destroy();

        humedadChart = new Chart(ctxHum, {
            type: 'line',
            data: {
                labels: labels[periodo],
                datasets: [{
                    label: '%',
                    data: datos[periodo],
                    borderColor: '#FF9800',
                    backgroundColor: 'rgba(255,152,0,0.05)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#FF9800',
                    pointBorderColor: '#fff',
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: false, grid: { color: 'rgba(0,0,0,0.03)' } } }
            }
        });
    }

    // Inicializar gráficos
    cargarDatosTemperatura();
    cargarDatosHumedad();
</script>
</body>
</html>
