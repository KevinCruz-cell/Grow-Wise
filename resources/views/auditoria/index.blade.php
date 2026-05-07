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
            --verde-oscuro: #1B5E20;
            --naranja: #FF9800;
            --fondo: #F8F9FA;
            --sombra-suave: 0 10px 30px rgba(0,0,0,0.1);
            --transicion: all 0.3s ease;
        }

        body {
            background: var(--fondo);
            font-family: 'Poppins', sans-serif;
        }

        .dashboard {
            display: flex;
        }

        .sidebar {
            width: 250px;
            background: white;
            min-height: 100vh;
            box-shadow: var(--sombra-suave);
        }

        .sidebar h3 {
            padding: 20px;
            color: var(--verde-hoja);
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            color: #555;
        }

        .sidebar a:hover {
            background: rgba(46,125,50,0.1);
            color: var(--verde-hoja);
        }

        .main-content {
            flex: 1;
            padding: 30px;
        }

        .card-custom {
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: var(--sombra-suave);
        }

        .badge-create { background: #28a745; }
        .badge-update { background: #ffc107; color:black;}
        .badge-delete { background: #dc3545; }

        pre {
            font-size: 12px;
            background: #f4f4f4;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<div class="dashboard">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h3>SmartGarden</h3>
        <a href="#">Dashboard</a>
        <a href="#">Cultivos</a>
        <a href="#">Siembras</a>
        <a href="/auditoria" class="fw-bold">Bitácora</a>
    </div>

    <!-- CONTENIDO -->
    <div class="main-content">

        <h2 class="mb-4">Bitácora del Sistema</h2>

        <div class="card-custom">

            <table class="table table-hover">

                <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Acción</th>
                    <th>Tabla</th>
                    <th>Cambios</th>
                    <th>Fecha</th>
                </tr>
                </thead>

                <tbody>
                @forelse($logs as $log)
                    <tr>

                        <td>
                            {{ $log->user->nombre ?? 'Sistema' }}
                        </td>

                        <td>
                            @if($log->accion == 'create')
                                <span class="badge badge-create">Crear</span>
                            @elseif($log->accion == 'update')
                                <span class="badge badge-update">Actualizar</span>
                            @else
                                <span class="badge badge-delete">Eliminar</span>
                            @endif
                        </td>

                        <td>{{ $log->tabla }}</td>

                        <td>
                            <button class="btn btn-sm btn-primary" onclick="verDetalle({{ $log->id }})">
                                Ver cambios
                            </button>

                            <div id="data-{{ $log->id }}" style="display:none;">
                                <strong>ANTES:</strong>
                                <pre>{{ json_encode($log->antes, JSON_PRETTY_PRINT) }}</pre>

                                <strong>DESPUÉS:</strong>
                                <pre>{{ json_encode($log->despues, JSON_PRETTY_PRINT) }}</pre>
                            </div>
                        </td>

                        <td>{{ $log->created_at }}</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay registros</td>
                    </tr>
                @endforelse
                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- MODAL -->
<div class="modal fade" id="modalDetalle" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Detalle</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="contenidoModal"></div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function verDetalle(id){
        let contenido = document.getElementById('data-'+id).innerHTML;
        document.getElementById('contenidoModal').innerHTML = contenido;

        let modal = new bootstrap.Modal(document.getElementById('modalDetalle'));
        modal.show();
    }
</script>

</body>
</html>
