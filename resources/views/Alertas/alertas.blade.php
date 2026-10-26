{{-- resources/views/Alertas/alertas.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alertas - GrowWise</title>
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

        /* Filtros */
        .filtros-card {
            background: white;
            border-radius: 20px;
            padding: 20px 25px;
            box-shadow: var(--sombra-suave);
            transition: var(--transicion);
            margin-bottom: 30px;
        }

        .filtros-card:hover {
            box-shadow: var(--sombra-media);
        }

        .filtros-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
            justify-content: space-between;
        }

        .filtros-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .filtro-select {
            padding: 8px 20px;
            border-radius: 50px;
            border: 1px solid #e0e0e0;
            background: #f5f5f5;
            font-size: 0.9rem;
            transition: var(--transicion);
            cursor: pointer;
        }

        .filtro-select:hover {
            border-color: var(--verde-hoja);
            background: white;
        }

        .filtro-select:focus {
            outline: none;
            border-color: var(--verde-hoja);
            box-shadow: 0 0 0 3px rgba(46,125,50,0.1);
        }

        /* Tabla de alertas */
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

        .badge-alerta {
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }

        .badge-critica, .badge-alta {
            background: rgba(220,53,69,0.1);
            color: #dc3545;
        }

        .badge-media {
            background: rgba(255,152,0,0.1);
            color: var(--naranja-oscuro);
        }

        .badge-baja {
            background: rgba(46,125,50,0.1);
            color: var(--verde-hoja);
        }

        .badge-pendiente {
            background: rgba(255,152,0,0.1);
            color: var(--naranja-oscuro);
        }

        .badge-resuelta {
            background: rgba(46,125,50,0.1);
            color: var(--verde-hoja);
        }

        .badge-ignorada {
            background: rgba(108,117,125,0.1);
            color: #6c757d;
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

        .action-btn.resolver {
            background: var(--verde-hoja);
        }

        .action-btn.ignorar {
            background: #6c757d;
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
            .filtros-grid {
                flex-direction: column;
                align-items: stretch;
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
                <li><a href="{{ route('alertas.index') }}" class="active"><i class="fas fa-bell"></i> Alertas</a></li>
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
                <h1>Alertas y Notificaciones</h1>
                <p>Monitorea los eventos importantes de tu cultivo</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('alertas.index') }}" class="notification-badge">
                    <i class="fas fa-bell"></i>
                    @if($stats['pendientes'] > 0)
                        <span>{{ $stats['pendientes'] }}</span>
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

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="50">
                <div class="stat-info">
                    <h3>{{ $stats['pendientes'] }}</h3>
                    <p>Pendientes</p>
                    <small>Requieren atención</small>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-info">
                    <h3>{{ $stats['resueltas_hoy'] }}</h3>
                    <p>Resueltas (hoy)</p>
                    <small>Últimas 24h</small>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="150">
                <div class="stat-info">
                    <h3>{{ $stats['criticas'] }}</h3>
                    <p>Críticas</p>
                    <small>Alta prioridad</small>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-bell"></i>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-info">
                    <h3>{{ $stats['total_mes'] }}</h3>
                    <p>Total (mes)</p>
                    <small>Histórico</small>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-history"></i>
                </div>
            </div>
        </div>

        <!-- Filtros -->
        <div class="filtros-card" data-aos="fade-up" data-aos-delay="100">
            <div class="filtros-grid">
                <div class="filtros-group">
                    <select class="filtro-select" id="estadoFilter" onchange="filtrarAlertas()">
                        <option value="">Todas las alertas</option>
                        <option value="Pendiente">Pendientes</option>
                        <option value="Resuelta">Resueltas</option>
                        <option value="Ignorada">Ignoradas</option>
                    </select>
                    <select class="filtro-select" id="prioridadFilter" onchange="filtrarAlertas()">
                        <option value="">Todas las prioridades</option>
                        <option value="Crítica">Críticas</option>
                        <option value="Alta">Altas</option>
                        <option value="Media">Medias</option>
                        <option value="Baja">Bajas</option>
                    </select>
                    <select class="filtro-select" id="moduloFilter" onchange="filtrarAlertas()">
                        <option value="">Todos los módulos</option>
                        @foreach($modulos ?? [] as $modulo)
                            <option value="{{ $modulo->id }}">{{ $modulo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn-naranja" onclick="filtrarAlertas()">
                    <i class="fas fa-filter"></i> Filtrar
                </button>
            </div>
        </div>

        <!-- Tabla de alertas -->
        <div class="table-container" data-aos="fade-up" data-aos-delay="200">
            <div class="table-header">
                <h2><i class="fas fa-list"></i> Listado de Alertas</h2>
                <div>
                    <form action="{{ route('alertas.marcar-todas') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-naranja" onclick="return confirm('¿Marcar todas las alertas como leídas?')">
                            <i class="fas fa-check-double"></i> Marcar todas como leídas
                        </button>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table id="alertasTable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Mensaje</th>
                        <th>Módulo</th>
                        <th>Prioridad</th>
                        <th>Fecha/Hora</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($alertas as $alerta)
                        <tr data-estado="{{ $alerta->estado }}" data-prioridad="{{ $alerta->prioridad }}" data-modulo="{{ $alerta->modulo_id }}">
                            <td>#{{ str_pad($alerta->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>
                                @if($alerta->tipo == 'humedad_baja' || $alerta->tipo == 'Humedad')
                                    <i class="fas fa-tint" style="color: var(--azul-cielo);"></i> Humedad
                                @elseif($alerta->tipo == 'luz_insuficiente' || $alerta->tipo == 'Luz')
                                    <i class="fas fa-sun" style="color: var(--naranja);"></i> Luz
                                @elseif($alerta->tipo == 'temperatura_alta' || $alerta->tipo == 'Temperatura')
                                    <i class="fas fa-thermometer-half" style="color: #dc3545;"></i> Temperatura
                                @elseif($alerta->tipo == 'ph_bajo' || $alerta->tipo == 'pH')
                                    <i class="fas fa-flask" style="color: var(--verde-hoja);"></i> pH
                                @else
                                    <i class="fas fa-exclamation-triangle" style="color: var(--naranja);"></i> {{ $alerta->tipo }}
                                @endif
                            </td>
                            <td>{{ $alerta->mensaje }}</td>
                            <td>{{ $alerta->modulo->nombre ?? 'General' }}</td>
                            <td>
                                <span class="badge-alerta
                                    @if($alerta->prioridad == 'Crítica' || $alerta->prioridad == 'Alta') badge-critica
                                    @elseif($alerta->prioridad == 'Media') badge-media
                                    @else badge-baja
                                    @endif">
                                    {{ $alerta->prioridad }}
                                </span>
                            </td>
                            <td>{{ $alerta->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <span class="badge-alerta
                                    @if($alerta->estado == 'Pendiente') badge-pendiente
                                    @elseif($alerta->estado == 'Resuelta') badge-resuelta
                                    @else badge-ignorada
                                    @endif">
                                    {{ $alerta->estado }}
                                </span>
                            </td>
                            <td>
                                <a href="#" class="action-btn ver" onclick="verAlerta({{ $alerta->id }})"><i class="fas fa-eye"></i></a>

                                @if($alerta->estado == 'Pendiente')
                                    <form action="{{ route('alertas.resolver', $alerta->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="action-btn resolver"><i class="fas fa-check"></i></button>
                                    </form>
                                @endif

                                <form action="{{ route('alertas.destroy', $alerta->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Eliminar esta alerta?')">
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
                                    <i class="fas fa-bell-slash"></i>
                                    <h3>No hay alertas registradas</h3>
                                    <p>Las alertas aparecerán aquí cuando ocurran eventos importantes</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $alertas->links() }}
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

    function verAlerta(id) {
        // Aquí puedes implementar un modal para ver detalles
        alert('Ver detalles de alerta #' + id);
    }

    function filtrarAlertas() {
        let estado = document.getElementById('estadoFilter').value;
        let prioridad = document.getElementById('prioridadFilter').value;
        let modulo = document.getElementById('moduloFilter').value;
        let filas = document.querySelectorAll('#alertasTable tbody tr');

        filas.forEach(fila => {
            let mostrar = true;

            if (estado && fila.dataset.estado !== estado) mostrar = false;
            if (prioridad && fila.dataset.prioridad !== prioridad) mostrar = false;
            if (modulo && fila.dataset.modulo !== modulo) mostrar = false;

            fila.style.display = mostrar ? '' : 'none';
        });
    }
</script>
</body>
</html>
