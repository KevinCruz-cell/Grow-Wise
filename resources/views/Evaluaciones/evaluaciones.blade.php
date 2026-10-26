{{-- resources/views/Evaluaciones/evaluaciones.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluaciones - GrowWise</title>
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

        /* Tarjetas de resumen */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
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
            font-size: 2rem;
            font-weight: 800;
            color: var(--verde-hoja);
            margin-bottom: 5px;
        }

        .stat-info p {
            color: #666;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .stat-info small {
            color: #999;
            font-size: 0.8rem;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--verde-menta), var(--verde-hoja));
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            transition: var(--transicion);
        }

        .stat-card:hover .stat-icon {
            transform: rotate(5deg) scale(1.1);
        }

        /* Panel de filtros */
        .filters-panel {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: var(--sombra-suave);
            transition: var(--transicion);
            margin-bottom: 30px;
        }

        .filters-panel:hover {
            box-shadow: var(--sombra-media);
        }

        .filters-panel h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--verde-hoja);
            margin-bottom: 20px;
        }

        .filters-panel h3 i {
            margin-right: 10px;
            color: var(--naranja);
        }

        .filter-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            align-items: end;
        }

        .filter-group label {
            font-weight: 500;
            margin-bottom: 5px;
            color: #666;
        }

        .filter-group select, .filter-group input {
            width: 100%;
            padding: 10px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            transition: var(--transicion);
            outline: none;
        }

        .filter-group select:focus, .filter-group input:focus {
            border-color: var(--verde-hoja);
            box-shadow: 0 0 0 3px rgba(46,125,50,0.1);
        }

        .filter-actions {
            display: flex;
            gap: 10px;
            align-items: center;
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

        .alert-info {
            background: rgba(100,181,246,0.1);
            color: var(--azul-cielo);
            border: 1px solid rgba(100,181,246,0.2);
        }

        /* Tabla de evaluaciones */
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
            flex-wrap: wrap;
            gap: 15px;
        }

        .table-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--verde-hoja);
            margin: 0;
        }

        .table-header h2 i {
            margin-right: 10px;
            color: var(--naranja);
        }

        .search-box {
            display: flex;
            align-items: center;
            background: #f5f5f5;
            border-radius: 50px;
            padding: 5px 5px 5px 20px;
            transition: var(--transicion);
        }

        .search-box:hover {
            background: #e9ecef;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .search-box input {
            border: none;
            background: transparent;
            outline: none;
            padding: 8px 10px;
            width: 200px;
        }

        .search-box button {
            background: var(--verde-hoja);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 8px 20px;
            transition: var(--transicion);
        }

        .search-box button:hover {
            background: var(--verde-oscuro);
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
            padding: 15px 10px;
            color: #666;
            font-weight: 600;
            border-bottom: 2px solid #f0f0f0;
        }

        td {
            padding: 15px 10px;
            border-bottom: 1px solid #f0f0f0;
            transition: var(--transicion);
        }

        tr {
            transition: var(--transicion);
        }

        tr:hover {
            background: rgba(46,125,50,0.02);
        }

        .badge-rendimiento {
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .badge-alto {
            background: rgba(46,125,50,0.1);
            color: var(--verde-hoja);
        }

        .badge-medio {
            background: rgba(255,152,0,0.1);
            color: var(--naranja-oscuro);
        }

        .badge-bajo {
            background: rgba(220,53,69,0.1);
            color: #dc3545;
        }

        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: var(--transicion);
            margin: 0 3px;
            border: none;
            text-decoration: none;
        }

        .action-btn.ver {
            background: var(--azul-cielo);
        }

        .action-btn.editar {
            background: var(--verde-hoja);
        }

        .action-btn.eliminar {
            background: #dc3545;
        }

        .action-btn:hover {
            transform: scale(1.15);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
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
            .main-content {
                padding: 20px;
            }
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
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
                <li><a href="{{ route('evaluaciones.index') }}" class="active"><i class="fas fa-chart-bar"></i> Evaluaciones</a></li>
                <li><a href="{{ route('configuracion.index') }}"><i class="fas fa-cog"></i> Configuración</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="dashboard-header" data-aos="fade-down" data-aos-duration="1000">
            <div class="header-title">
                <h1>Evaluaciones de Rendimiento</h1>
                <p>Analiza el rendimiento de tus siembras y cultivos</p>
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

                <!-- Perfil de usuario (solo visual) -->
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

        @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="fas fa-info-circle me-2"></i>{{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="50">
                <div class="stat-info">
                    <h3>{{ $stats['total'] }}</h3>
                    <p>Evaluaciones totales</p>
                    <small>Histórico</small>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-info">
                    <h3>{{ number_format($stats['promedio'], 1) }}</h3>
                    <p>Promedio rendimiento</p>
                    <small>/10</small>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="150">
                <div class="stat-info">
                    <h3>{{ $stats['pendientes'] }}</h3>
                    <p>Evaluaciones pendientes</p>
                    <small>Este mes</small>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-info">
                    <h3>{{ $stats['eficiencia'] ? round($stats['eficiencia']) . '%' : '0%' }}</h3>
                    <p>Eficiencia general</p>
                    <small>Excelente</small>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
        </div>

        <!-- Filtros -->
        <div class="filters-panel" data-aos="fade-up" data-aos-delay="100">
            <h3><i class="fas fa-sliders-h"></i> Filtrar evaluaciones</h3>
            <form action="{{ route('evaluaciones.index') }}" method="GET">
                <div class="filter-row">
                    <div class="filter-group">
                        <label>Cultivo</label>
                        <select name="cultivo">
                            <option value="">Todos</option>
                            @foreach($cultivos as $cultivo)
                                <option value="{{ $cultivo->id }}" {{ request('cultivo') == $cultivo->id ? 'selected' : '' }}>{{ $cultivo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Desde</label>
                        <input type="date" name="desde" value="{{ request('desde', now()->startOfMonth()->format('Y-m-d')) }}">
                    </div>
                    <div class="filter-group">
                        <label>Hasta</label>
                        <input type="date" name="hasta" value="{{ request('hasta', now()->format('Y-m-d')) }}">
                    </div>
                    <div class="filter-group">
                        <label>Rendimiento mínimo</label>
                        <select name="rendimiento_min">
                            <option value="">Todos</option>
                            <option value="8" {{ request('rendimiento_min') == 8 ? 'selected' : '' }}>Alto (8-10)</option>
                            <option value="5" {{ request('rendimiento_min') == 5 ? 'selected' : '' }}>Medio (5-7)</option>
                            <option value="0" {{ request('rendimiento_min') == 0 ? 'selected' : '' }}>Bajo (0-4)</option>
                        </select>
                    </div>
                    <div class="filter-actions">
                        <button type="submit" class="btn-naranja"><i class="fas fa-filter"></i> Aplicar</button>
                        <a href="{{ route('evaluaciones.index') }}" class="btn-outline-verde"><i class="fas fa-redo"></i> Limpiar</a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Tabla de evaluaciones -->
        <div class="table-container" data-aos="fade-up" data-aos-delay="200">
            <div class="table-header">
                <h2><i class="fas fa-chart-bar"></i> Listado de evaluaciones</h2>
                <div class="d-flex gap-3">
                    <div class="search-box">
                        <input type="text" id="searchInput" placeholder="Buscar evaluación..." onkeyup="buscarEvaluaciones()">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                    <a href="{{ route('evaluaciones.create') }}" class="btn-naranja">
                        <i class="fas fa-plus"></i> Nueva Evaluación
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="evaluacionesTable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cultivo</th>
                        <th>Siembra ID</th>
                        <th>Fecha evaluación</th>
                        <th>Rendimiento</th>
                        <th>Calificación</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($evaluaciones as $evaluacion)
                        <tr data-cultivo="{{ strtolower($evaluacion->siembra->cultivo->nombre ?? '') }}">
                            <td>#EV-{{ str_pad($evaluacion->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $evaluacion->siembra->cultivo->nombre ?? 'N/A' }}</td>
                            <td>#S-{{ str_pad($evaluacion->siembra_id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $evaluacion->fecha_evaluacion->format('d/m/Y') }}</td>
                            <td>
                                <span class="badge-rendimiento
                                    @if($evaluacion->rendimiento >= 8) badge-alto
                                    @elseif($evaluacion->rendimiento >= 5) badge-medio
                                    @else badge-bajo
                                    @endif">
                                    {{ $evaluacion->rendimiento >= 8 ? 'Alto' : ($evaluacion->rendimiento >= 5 ? 'Medio' : 'Bajo') }} ({{ $evaluacion->rendimiento }})
                                </span>
                            </td>
                            <td>{{ $evaluacion->rendimiento }}/10</td>
                            <td>{{ Str::limit($evaluacion->observaciones, 30) }}</td>
                            <td>
                                <a href="{{ route('evaluaciones.show', $evaluacion->id) }}" class="action-btn ver"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('evaluaciones.edit', $evaluacion->id) }}" class="action-btn editar"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('evaluaciones.destroy', $evaluacion->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Eliminar esta evaluación?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn eliminar"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <div class="empty-state">
                                    <i class="fas fa-chart-bar"></i>
                                    <h3>No hay evaluaciones registradas</h3>
                                    <p>Registra tu primera evaluación usando el botón "Nueva Evaluación"</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $evaluaciones->links() }}
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

    function buscarEvaluaciones() {
        let input = document.getElementById('searchInput');
        let filter = input.value.toLowerCase();
        let table = document.getElementById('evaluacionesTable');
        let tr = table.getElementsByTagName('tr');

        for (let i = 1; i < tr.length; i++) {
            let cultivo = tr[i].getAttribute('data-cultivo');
            if (cultivo && cultivo.includes(filter)) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
</script>
</body>
</html>
