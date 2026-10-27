{{-- resources/views/Siembras/siembras.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siembras - GrowWise</title>
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

        .btn-verde {
            background: linear-gradient(135deg, var(--verde-hoja), var(--verde-oscuro));
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

        .btn-verde:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(46,125,50,0.3);
            color: white;
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

        /* Tabla de siembras */
        .table-container {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: var(--sombra-suave);
            transition: var(--transicion);
            margin-top: 30px;
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

        .badge-estado {
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }

        .badge-activa {
            background: rgba(46,125,50,0.1);
            color: var(--verde-hoja);
        }

        .badge-cosechada {
            background: rgba(255,152,0,0.1);
            color: var(--naranja-oscuro);
        }

        .badge-problema {
            background: rgba(220,53,69,0.1);
            color: #dc3545;
        }

        .badge-cancelada {
            background: rgba(108,117,125,0.1);
            color: #6c757d;
        }

        .progress {
            height: 8px;
            width: 100px;
            border-radius: 10px;
            background: #f0f0f0;
        }

        .progress-bar {
            border-radius: 10px;
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
                <li><a href="{{ route('siembras.index') }}" class="active"><i class="fas fa-sprout"></i> Siembras</a></li>
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
                <h1>Control de Siembras</h1>
                <p>Gestiona todas tus siembras activas e históricas</p>
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
                    <h3>{{ $stats['activas'] ?? 0 }}</h3>
                    <p>Siembras activas</p>
                    <small>En crecimiento</small>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-sprout"></i>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-info">
                    <h3>{{ $stats['total'] ?? 0 }}</h3>
                    <p>Siembras totales</p>
                    <small>Histórico</small>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-history"></i>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="150">
                <div class="stat-info">
                    <h3>{{ $stats['por_cosechar'] ?? 0 }}</h3>
                    <p>Por cosechar</p>
                    <small>Próximos 15 días</small>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-info">
                    <h3>{{ $stats['con_problemas'] ?? 0 }}</h3>
                    <p>Con problemas</p>
                    <small>Revisar</small>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
            </div>
        </div>

        <!-- Tabla de siembras -->
        <div class="table-container" data-aos="fade-up" data-aos-delay="100">
            <div class="table-header">
                <h2><i class="fas fa-sprout"></i> Listado de Siembras</h2>
                <div class="d-flex gap-3">
                    <div class="search-box">
                        <input type="text" id="searchInput" placeholder="Buscar siembra..." onkeyup="buscarSiembras()">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                    <a href="{{ route('siembras.create') }}" class="btn-naranja">
                        <i class="fas fa-plus"></i> Nueva Siembra
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="siembrasTable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cultivo</th>
                        <th>Fecha Siembra</th>
                        <th>Módulo</th>
                        <th>Estado</th>
                        <th>Progreso</th>
                        <th>Fecha Estimada Cosecha</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($siembras as $siembra)
                        <tr data-cultivo="{{ strtolower($siembra->cultivo->nombre) }}">
                            <td>#{{ str_pad($siembra->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $siembra->cultivo->nombre }}</td>
                            <td>{{ $siembra->fecha_siembra->format('d/m/Y') }}</td>
                            <td>{{ $siembra->modulo->nombre ?? 'Sin módulo' }}</td>
                            <td>
                                <span class="badge-estado
                                    @if($siembra->estado == 'Activa') badge-activa
                                    @elseif($siembra->estado == 'Completada') badge-cosechada
                                    @elseif($siembra->estado == 'Problema') badge-problema
                                    @else badge-cancelada
                                    @endif">
                                    {{ $siembra->estado }}
                                </span>
                            </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar
                                        @if($siembra->estado == 'Problema') bg-danger
                                        @elseif($siembra->estado == 'Completada') bg-warning
                                        @else bg-success
                                        @endif"
                                         style="width: {{ $siembra->progreso }}%">
                                    </div>
                                </div>
                            </td>
                            <td>{{ $siembra->fecha_estimada_cosecha ? $siembra->fecha_estimada_cosecha->format('d/m/Y') : 'N/A' }}</td>
                            <td>
                                <a href="{{ route('siembras.show', $siembra->id) }}" class="action-btn ver"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('siembras.edit', $siembra->id) }}" class="action-btn editar"><i class="fas fa-edit"></i></a>
                                <button class="action-btn eliminar" onclick="if(confirm('¿Eliminar esta siembra?')) { document.getElementById('delete-form-{{ $siembra->id }}').submit(); }"><i class="fas fa-trash"></i></button>
                                <form id="delete-form-{{ $siembra->id }}" action="{{ route('siembras.destroy', $siembra->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <div class="empty-state">
                                    <i class="fas fa-seedling"></i>
                                    <h3>No hay siembras registradas</h3>
                                    <p>Comienza agregando tu primera siembra</p>
                                    <a href="{{ route('siembras.create') }}" class="btn-verde">Agregar Siembra</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $siembras->links() }}
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

    // Función para buscar siembras
    function buscarSiembras() {
        let input = document.getElementById('searchInput');
        let filter = input.value.toLowerCase();
        let table = document.getElementById('siembrasTable');
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
