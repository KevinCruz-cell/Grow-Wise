<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bitácora - SmartGarden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --verde-hoja: #2E7D32;
            --verde-menta: #81C784;
            --naranja: #FF9800;
            --fondo: #F8F9FA;
        }

        body {
            background: var(--fondo);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .dashboard { display: flex; }

        .sidebar {
            width: 260px;
            background: white;
            min-height: 100vh;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
        }

        .sidebar h3 {
            padding: 20px;
            color: var(--verde-hoja);
            font-weight: bold;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            color: #555;
            transition: all 0.3s;
        }

        .sidebar a:hover {
            background: rgba(46,125,50,0.1);
            color: var(--verde-hoja);
            padding-left: 28px;
        }

        .main-content {
            flex: 1;
            padding: 30px;
        }

        .card-custom {
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .filtros-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .ip-badge {
            font-family: monospace;
            background: #e9ecef;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 500;
        }

        pre {
            font-size: 11px;
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 12px;
            border-radius: 8px;
            overflow-x: auto;
            max-height: 300px;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(46,125,50,0.05);
            cursor: pointer;
        }

        .badge-db { background: #6c757d; }
        .badge-web { background: #17a2b8; }
        .badge-sistema { background: #fd7e14; }

        .fecha-cell {
            font-size: 12px;
            white-space: nowrap;
        }
    </style>
</head>
<body>

<div class="dashboard">
    <!-- SIDEBAR -->
    <div class="sidebar">
        <h3>🌱 SmartGarden</h3>
        <a href="#">📊 Dashboard</a>
        <a href="#">🌿 Cultivos</a>
        <a href="#">🌾 Siembras</a>
        <a href="/auditoria" class="fw-bold text-success">📋 Bitácora</a>
        <a href="#">⚙️ Configuración</a>
        <hr>
        <a href="#">👤 Mi Perfil</a>
        <a href="#">🚪 Cerrar Sesión</a>
    </div>

    <!-- CONTENIDO -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>📋 Bitácora del Sistema</h2>
            <div>
                <span class="badge bg-info me-2">🌐 Web: {{ $logs->where('tipo_usuario', 'web')->count() }}</span>
                <span class="badge bg-secondary me-2">🗄️ BD: {{ $logs->where('tipo_usuario', 'db')->count() }}</span>
                <span class="badge bg-warning">⚙️ Sistema: {{ $logs->where('tipo_usuario', 'sistema')->count() }}</span>
            </div>
        </div>

        <!-- Debug: Mostrar total de registros -->
        <div class="alert alert-info">
            📊 Total registros en auditoría: <strong>{{ $logs->total() }}</strong>
        </div>

        <!-- FILTROS -->
        <div class="filtros-card">
            <form method="GET" action="{{ route('auditoria.index') }}" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">📁 Tabla</label>
                    <select name="tabla" class="form-select">
                        <option value="">Todas</option>
                        @foreach($tablas as $tabla)
                            <option value="{{ $tabla }}" {{ request('tabla') == $tabla ? 'selected' : '' }}>
                                {{ $tabla }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">⚡ Acción</label>
                    <select name="accion" class="form-select">
                        <option value="">Todas</option>
                        <option value="INSERT" {{ request('accion') == 'INSERT' ? 'selected' : '' }}>Insertar</option>
                        <option value="UPDATE" {{ request('accion') == 'UPDATE' ? 'selected' : '' }}>Actualizar</option>
                        <option value="DELETE" {{ request('accion') == 'DELETE' ? 'selected' : '' }}>Eliminar</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">👥 Tipo Usuario</label>
                    <select name="tipo_usuario" class="form-select">
                        <option value="">Todos</option>
                        @foreach($tipos_usuario as $key => $label)
                            <option value="{{ $key }}" {{ request('tipo_usuario') == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">👤 Buscar Usuario</label>
                    <input type="text" name="usuario" class="form-control"
                           placeholder="Perla, Nat, usuario@email.com..."
                           value="{{ request('usuario') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">📡 IP Address</label>
                    <input type="text" name="ip" class="form-control"
                           placeholder="192.168.1.1"
                           value="{{ request('ip') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">📅 Fecha Desde</label>
                    <input type="date" name="fecha_desde" class="form-control"
                           value="{{ request('fecha_desde') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">📅 Fecha Hasta</label>
                    <input type="date" name="fecha_hasta" class="form-control"
                           value="{{ request('fecha_hasta') }}">
                </div>

                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-success me-2">
                        🔍 Filtrar
                    </button>
                    <a href="{{ route('auditoria.index') }}" class="btn btn-secondary">
                        🗑️ Limpiar
                    </a>
                </div>
            </form>
        </div>

        <!-- TABLA DE AUDITORÍA -->
        <div class="card-custom">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                    <tr>
                        <th>👤 Usuario</th>
                        <th>🔌 Tipo</th>
                        <th>📡 IP</th>
                        <th>⚡ Acción</th>
                        <th>📁 Tabla</th>
                        <th>🆔 ID</th>
                        <th>📅 Fecha/Hora</th>
                        <th>📝 Detalle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($logs as $log)
                        <tr onclick="verDetalle({{ $log->id }})" style="cursor: pointer;">
                            <td>
                                <strong>{{ $log->usuario }}</strong>
                {{-- Eliminamos la relación con user porque es stdClass --}}
            </div>
            <td>
                @php
                    $tipoClase = match($log->tipo_usuario ?? 'sistema') {
                        'web' => 'badge-web',
                        'db' => 'badge-db',
                        'sistema' => 'badge-sistema',
                        default => 'bg-secondary'
                    };
                    $tipoTexto = match($log->tipo_usuario ?? 'sistema') {
                        'web' => '🌐 Web',
                        'db' => '🗄️ Base Datos',
                        'sistema' => '⚙️ Sistema',
                        default => '❓ Desconocido'
                    };
                @endphp
                <span class="badge {{ $tipoClase }}">{{ $tipoTexto }}</span>
        </div>
        <td>
                                <span class="ip-badge">
                                    🌍 {{ $log->ip_address ?? '127.0.0.1' }}
                                </span>
    </div>
    <td>
        @if($log->accion == 'INSERT')
            <span class="badge bg-success">➕ Insertar</span>
        @elseif($log->accion == 'UPDATE')
            <span class="badge bg-warning text-dark">✏️ Actualizar</span>
        @elseif($log->accion == 'DELETE')
            <span class="badge bg-danger">🗑️ Eliminar</span>
        @else
            <span class="badge bg-secondary">{{ $log->accion }}</span>
    @endif
</div>
<td><code>{{ $log->tabla_afectada }}</code> </div>
<td>{{ $log->registro_id ?? '-' }} </div>
<td class="fecha-cell">
    @if(isset($log->fecha_cambio) && $log->fecha_cambio)
        {{ date('d/m/Y H:i:s', strtotime($log->fecha_cambio)) }}
    @else
        <span class="text-muted">Sin fecha</span>
        @endif
        </div>
<td>
    <button class="btn btn-sm btn-outline-primary" onclick="event.stopPropagation(); verDetalle({{ $log->id }})">
        👁️ Ver
    </button>
    </div>
    </div>
    @empty
        <tr>
<td colspan="8" class="text-center py-5">
    📭 No hay registros de auditoría para los filtros seleccionados
    </div>
    </div>
    @endforelse
    </tbody>
    </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            Mostrando {{ $logs->firstItem() ?? 0 }} a {{ $logs->lastItem() ?? 0 }} de {{ $logs->total() }} registros
        </div>
        <div>
            {{ $logs->links() }}
        </div>
    </div>
    </div>
    </div>
    </div>

    <!-- MODAL DE DETALLE -->
    <div class="modal fade" id="modalDetalle" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">
                        📋 Detalle del Cambio
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="contenidoModal">
                    <div class="text-center py-5">
                        <div class="spinner-border text-success" role="status"></div>
                        <p class="mt-2">Cargando detalles...</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let modalInstance;

        function verDetalle(id) {
            const modalElement = document.getElementById('modalDetalle');
            modalInstance = new bootstrap.Modal(modalElement);
            modalInstance.show();

            document.getElementById('contenidoModal').innerHTML = `
            <div class="text-center py-5">
                <div class="spinner-border text-success" role="status"></div>
                <p class="mt-2">Cargando detalles...</p>
            </div>
        `;

            $.ajax({
                url: '/auditoria/' + id,
                method: 'GET',
                success: function(data) {
                    let html = `
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <strong>📌 Información General</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <tr><th>Usuario:</th><td>${data.usuario}${data.user_web ? ' (' + data.user_web + ')' : ''}</div></div>
                                        <tr><th>Tipo:</th><td>${data.tipo_usuario === 'web' ? '🌐 Web' : (data.tipo_usuario === 'db' ? '🗄️ Base Datos' : '⚙️ Sistema')}</div></div>
                                        <tr><th>IP Origen:</th><td><code>${data.ip_address || '127.0.0.1'}</code></div></div>
                                        <tr><th>Tabla:</th><td><code>${data.tabla_afectada}</code></div></div>
                                        <tr><th>Acción:</th><td>${data.accion}</div></div>
                                        <tr><th>ID Registro:</th><td>${data.registro_id || '-'}</div></div>
                                        <tr><th>Fecha/Hora:</th><td>${data.fecha_cambio || 'Sin fecha'}</div></div>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <strong>🔧 Información Técnica</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <tr><th>User Agent:</th><td><small>${data.user_agent || 'N/A'}</small></div></div>
                                        <tr><th>ID Auditoría:</th><td>#${data.id}</div></div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                    if (data.datos_anteriores && Object.keys(data.datos_anteriores).length > 0) {
                        html += `
                        <div class="card mb-3">
                            <div class="card-header bg-warning">
                                <strong>🟡 VALORES ANTERIORES</strong>
                            </div>
                            <div class="card-body">
                                <pre>${JSON.stringify(data.datos_anteriores, null, 2)}</pre>
                            </div>
                        </div>
                    `;
                    }

                    if (data.datos_nuevos && Object.keys(data.datos_nuevos).length > 0) {
                        html += `
                        <div class="card mb-3">
                            <div class="card-header bg-success text-white">
                                <strong>🟢 VALORES NUEVOS</strong>
                            </div>
                            <div class="card-body">
                                <pre>${JSON.stringify(data.datos_nuevos, null, 2)}</pre>
                            </div>
                        </div>
                    `;
                    }

                    document.getElementById('contenidoModal').innerHTML = html;
                },
                error: function(xhr) {
                    document.getElementById('contenidoModal').innerHTML = `
                    <div class="alert alert-danger">
                        ❌ Error al cargar los detalles: ${xhr.status}
                    </div>
                `;
                }
            });
        }
    </script>

</body>
</html>
