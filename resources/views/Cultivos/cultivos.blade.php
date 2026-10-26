{{-- resources/views/Cultivos/cultivos.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cultivos - GrowWise</title>
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

        .dropdown-item.text-danger:hover {
            background: rgba(220,53,69,0.1);
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

        /* Barra de herramientas */
        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .btn-primary-custom {
            background: var(--verde-hoja);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transicion);
            box-shadow: 0 5px 15px rgba(46,125,50,0.3);
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary-custom:hover {
            background: var(--verde-oscuro);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(46,125,50,0.4);
            color: white;
        }

        .filter-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filter-group select, .filter-group input {
            border: 2px solid #e0e0e0;
            border-radius: 50px;
            padding: 8px 20px;
            font-size: 0.9rem;
            outline: none;
            transition: var(--transicion);
        }

        .filter-group select:focus, .filter-group input:focus {
            border-color: var(--verde-hoja);
            box-shadow: 0 0 0 0.2rem rgba(46,125,50,0.1);
        }

        /* Tarjetas de cultivos */
        .cultivos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .cultivo-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: var(--sombra-suave);
            transition: var(--transicion);
            border: 1px solid rgba(46,125,50,0.1);
            position: relative;
            overflow: hidden;
        }

        .cultivo-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--sombra-media);
        }

        .cultivo-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--verde-hoja), var(--naranja));
            transform: scaleX(0);
            transition: transform 0.3s ease;
            transform-origin: left;
        }

        .cultivo-card:hover::before {
            transform: scaleX(1);
        }

        .cultivo-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .cultivo-nombre {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--verde-oscuro);
        }

        .cultivo-tipo {
            background: rgba(46,125,50,0.1);
            color: var(--verde-hoja);
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .cultivo-info {
            margin-bottom: 15px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
            color: #555;
            font-size: 0.95rem;
        }

        .info-item i {
            width: 20px;
            color: var(--verde-hoja);
        }

        .cultivo-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn-action {
            flex: 1;
            padding: 8px;
            border: 1px solid var(--verde-hoja);
            border-radius: 10px;
            background: transparent;
            color: var(--verde-hoja);
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transicion);
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-action:hover {
            background: var(--verde-hoja);
            color: white;
        }

        .btn-action.delete:hover {
            background: #dc3545;
            border-color: #dc3545;
        }

        /* Estado vacío */
        .empty-state {
            grid-column: 1 / -1;
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
            .toolbar {
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
                <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="fas fa-home"></i> Vista general</a></li>
                <li><a href="{{ route('cultivos.index') }}" class="{{ request()->routeIs('cultivos.*') ? 'active' : '' }}"><i class="fas fa-seedling"></i> Cultivos</a></li>
                <li><a href="{{ route('siembras.index') }}" class="{{ request()->routeIs('siembras.*') ? 'active' : '' }}"><i class="fas fa-sprout"></i> Siembras</a></li>
                <li><a href="{{ route('monitoreo.index') }}" class="{{ request()->routeIs('monitoreo.*') ? 'active' : '' }}"><i class="fas fa-thermometer-half"></i> Monitoreo</a></li>
                <li><a href="{{ route('alertas.index') }}" class="{{ request()->routeIs('alertas.*') ? 'active' : '' }}"><i class="fas fa-bell"></i> Alertas</a></li>
                <li><a href="{{ route('reportes.index') }}" class="{{ request()->routeIs('reportes.*') ? 'active' : '' }}"><i class="fas fa-file-alt"></i> Reportes</a></li>
                <li><a href="{{ route('cosechas.index') }}" class="{{ request()->routeIs('cosechas.*') ? 'active' : '' }}"><i class="fas fa-carrot"></i> Cosechas</a></li>
                <li><a href="{{ route('evaluaciones.index') }}" class="{{ request()->routeIs('evaluaciones.*') ? 'active' : '' }}"><i class="fas fa-chart-bar"></i> Evaluaciones</a></li>
                <li><a href="{{ route('configuracion.index') }}" class="{{ request()->routeIs('configuracion.*') ? 'active' : '' }}"><i class="fas fa-cog"></i> Configuración</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="dashboard-header" data-aos="fade-down" data-aos-duration="1000">
            <div class="header-title">
                <h1>Cultivos</h1>
                <p>Gestión de tus cultivos verticales</p>
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

        <!-- Toolbar -->
        <div class="toolbar" data-aos="fade-up" data-aos-delay="50">
            <a href="{{ route('cultivos.create') }}" class="btn-primary-custom"><i class="fas fa-plus me-2"></i>Nuevo cultivo</a>
            <div class="filter-group">
                <select id="tipoFilter" onchange="filtrarPorTipo()">
                    <option value="">Todos los tipos</option>
                    @php
                        $tipos = ['Hoja', 'Fruto', 'Aromática', 'Raíz', 'Otro'];
                    @endphp
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo }}" {{ request('tipo') == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                    @endforeach
                </select>
                <input type="text" id="searchInput" placeholder="Buscar cultivo..." onkeyup="buscarCultivos()">
            </div>
        </div>

        <!-- Grid de cultivos -->
        <div class="cultivos-grid" id="cultivosGrid">
            @forelse($cultivos as $cultivo)
                <div class="cultivo-card" data-nombre="{{ strtolower($cultivo->nombre) }}" data-tipo="{{ $cultivo->tipo }}" data-aos="fade-up" data-aos-delay="100">
                    <div class="cultivo-header">
                        <span class="cultivo-nombre">{{ $cultivo->nombre }}</span>
                        <span class="cultivo-tipo">{{ $cultivo->tipo }}</span>
                    </div>
                    <div class="cultivo-info">
                        <div class="info-item">
                            <i class="fas fa-thermometer-half"></i>
                            <span>Temperatura: {{ $cultivo->temperatura_optima_min ?? '?' }}-{{ $cultivo->temperatura_optima_max ?? '?' }}°C</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-tint"></i>
                            <span>Humedad: {{ $cultivo->humedad_optima_min ?? '?' }}-{{ $cultivo->humedad_optima_max ?? '?' }}%</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-sun"></i>
                            <span>Luz: {{ $cultivo->luz_optima_min ?? '?' }}-{{ $cultivo->luz_optima_max ?? '?' }} lux</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Cosecha: {{ $cultivo->dias_cosecha ?? '?' }} días</span>
                        </div>
                    </div>
                    <div class="cultivo-actions">
                        <a href="{{ route('cultivos.show', $cultivo->id) }}" class="btn-action"><i class="fas fa-eye"></i> Ver</a>
                        <a href="{{ route('cultivos.edit', $cultivo->id) }}" class="btn-action"><i class="fas fa-edit"></i> Editar</a>
                        <button class="btn-action delete" onclick="if(confirm('¿Eliminar este cultivo?')) { document.getElementById('delete-form-{{ $cultivo->id }}').submit(); }"><i class="fas fa-trash"></i></button>
                        <form id="delete-form-{{ $cultivo->id }}" action="{{ route('cultivos.destroy', $cultivo->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-seedling"></i>
                    <h3>No hay cultivos registrados</h3>
                    <p>Comienza agregando tu primer cultivo</p>
                    <a href="{{ route('cultivos.create') }}" class="btn-primary-custom">Agregar cultivo</a>
                </div>
            @endforelse
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

    // Función para filtrar por tipo
    function filtrarPorTipo() {
        let tipo = document.getElementById('tipoFilter').value;
        let cards = document.querySelectorAll('.cultivo-card');

        cards.forEach(card => {
            if (tipo === '' || card.dataset.tipo === tipo) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Función para buscar por nombre
    function buscarCultivos() {
        let searchTerm = document.getElementById('searchInput').value.toLowerCase();
        let cards = document.querySelectorAll('.cultivo-card');

        cards.forEach(card => {
            let nombre = card.dataset.nombre;
            if (nombre.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>
</body>
</html>
