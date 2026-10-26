{{-- resources/views/Siembras/create.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Siembra - GrowWise</title>
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
            --sombra-suave: 0 10px 30px rgba(0,0,0,0.1);
            --sombra-media: 0 15px 40px rgba(0,0,0,0.15);
            --transicion: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 40px 0;
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 40px;
            box-shadow: var(--sombra-media);
            border: 1px solid rgba(255,255,255,0.2);
            transition: var(--transicion);
            position: relative;
            overflow: hidden;
        }

        .form-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--verde-hoja), var(--naranja));
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .form-header h2 {
            color: var(--verde-hoja);
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 10px;
            transition: var(--transicion);
        }

        .form-header h2:hover {
            color: var(--naranja);
        }

        .form-header i {
            font-size: 4rem;
            color: var(--verde-menta);
            margin-bottom: 20px;
            transition: var(--transicion);
        }

        .form-header i:hover {
            transform: rotate(360deg) scale(1.1);
            color: var(--naranja);
        }

        .form-header p {
            color: #666;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            font-weight: 600;
            color: var(--verde-oscuro);
            margin-bottom: 8px;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        .form-label i {
            color: var(--naranja);
            margin-right: 8px;
            width: 20px;
        }

        .form-control, .form-select {
            border-radius: 15px;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            transition: var(--transicion);
            font-size: 0.95rem;
            background: white;
            width: 100%;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--verde-hoja);
            box-shadow: 0 0 0 0.2rem rgba(46,125,50,0.1);
            outline: none;
            transform: translateY(-2px);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .alert-info {
            background: rgba(100,181,246,0.1);
            color: var(--azul-cielo);
            border: 1px solid rgba(100,181,246,0.2);
            border-radius: 15px;
            padding: 15px;
        }

        .btn-crear-modulo {
            background: linear-gradient(135deg, var(--naranja), var(--naranja-oscuro));
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transicion);
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            border: none;
        }

        .btn-crear-modulo:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,152,0,0.3);
            color: white;
        }

        .btn-custom {
            padding: 15px 35px;
            border-radius: 50px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 1rem;
            transition: var(--transicion);
            position: relative;
            overflow: hidden;
            z-index: 1;
            border: none;
            text-decoration: none;
            display: inline-block;
        }

        .btn-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s ease;
            z-index: -1;
        }

        .btn-custom:hover::before {
            left: 100%;
        }

        .btn-guardar {
            background: linear-gradient(135deg, var(--verde-hoja), var(--verde-oscuro));
            color: white;
            box-shadow: 0 10px 20px rgba(46,125,50,0.3);
        }

        .btn-guardar:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(46,125,50,0.4);
            color: white;
        }

        .btn-cancelar {
            background: linear-gradient(135deg, #6c757d, #495057);
            color: white;
            box-shadow: 0 10px 20px rgba(108,117,125,0.3);
        }

        .btn-cancelar:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(108,117,125,0.4);
            color: white;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Modal */
        .modal-content {
            border-radius: 30px;
            border: none;
            box-shadow: var(--sombra-media);
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--verde-hoja), var(--verde-oscuro));
            color: white;
            border: none;
            padding: 20px 30px;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        .modal-body {
            padding: 30px;
        }

        .modal-footer {
            border: none;
            padding: 20px 30px;
        }

        .modulo-disponible {
            background: rgba(46,125,50,0.05);
            border-left: 4px solid var(--verde-hoja);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }
            .form-header h2 {
                font-size: 1.8rem;
            }
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-container" data-aos="fade-up" data-aos-duration="1000">
        <div class="form-header">
            <i class="fas fa-seedling"></i>
            <h2>Nueva Siembra</h2>
            <p>Registra una nueva siembra en tu huerto</p>
        </div>

        <form action="{{ route('siembras.store') }}" method="POST" id="formSiembra">
            @csrf

            <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                <label for="cultivo_id" class="form-label">
                    <i class="fas fa-seedling"></i>Cultivo
                </label>
                <select class="form-select @error('cultivo_id') is-invalid @enderror" id="cultivo_id" name="cultivo_id" required>
                    <option value="">Seleccione un cultivo</option>
                    @foreach($cultivos as $cultivo)
                        <option value="{{ $cultivo->id }}" {{ old('cultivo_id') == $cultivo->id ? 'selected' : '' }}>
                            {{ $cultivo->nombre }} ({{ $cultivo->tipo }})
                        </option>
                    @endforeach
                </select>
                @error('cultivo_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group" data-aos="fade-up" data-aos-delay="150">
                    <label for="modulo_id" class="form-label">
                        <i class="fas fa-layer-group"></i>Módulo
                    </label>

                    @if($modulos->isNotEmpty())
                        <div class="alert-info" style="padding: 10px; border-radius: 10px; margin-bottom: 15px;">
                            <i class="fas fa-info-circle me-2"></i>
                            Tus módulos disponibles: {{ $modulos->count() }}
                        </div>

                        <select class="form-select @error('modulo_id') is-invalid @enderror" id="modulo_id" name="modulo_id">
                            <option value="">Seleccione un módulo existente</option>
                            @foreach($modulos as $modulo)
                                <option value="{{ $modulo->id }}" {{ old('modulo_id') == $modulo->id ? 'selected' : '' }}>
                                    {{ $modulo->nombre }} @if($modulo->ubicacion) ({{ $modulo->ubicacion }}) @endif
                                </option>
                            @endforeach
                        </select>
                    @else
                        <div class="alert-warning" style="padding: 15px; border-radius: 15px; margin-bottom: 10px;">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            No tienes módulos registrados. Crea uno nuevo.
                        </div>
                    @endif

                    <button type="button" class="btn-crear-modulo" data-bs-toggle="modal" data-bs-target="#crearModuloModal">
                        <i class="fas fa-plus-circle me-2"></i>Crear nuevo módulo
                    </button>

                    @error('modulo_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" data-aos="fade-up" data-aos-delay="200">
                    <label for="charola" class="form-label">
                        <i class="fas fa-cube"></i>Charola
                    </label>
                    <input type="number"
                           class="form-control @error('charola') is-invalid @enderror"
                           id="charola"
                           name="charola"
                           value="{{ old('charola') }}"
                           required
                           min="1"
                           max="10"
                           placeholder="1-10">
                    @error('charola')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" data-aos="fade-up" data-aos-delay="250">
                    <label for="fecha_siembra" class="form-label">
                        <i class="fas fa-calendar-alt"></i>Fecha de Siembra
                    </label>
                    <input type="date"
                           class="form-control @error('fecha_siembra') is-invalid @enderror"
                           id="fecha_siembra"
                           name="fecha_siembra"
                           value="{{ old('fecha_siembra', date('Y-m-d')) }}"
                           required>
                    @error('fecha_siembra')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" data-aos="fade-up" data-aos-delay="300">
                    <label for="cantidad_semillas" class="form-label">
                        <i class="fas fa-seedling"></i>Cantidad de Semillas
                    </label>
                    <input type="number"
                           class="form-control @error('cantidad_semillas') is-invalid @enderror"
                           id="cantidad_semillas"
                           name="cantidad_semillas"
                           value="{{ old('cantidad_semillas') }}"
                           min="1"
                           placeholder="Ej: 10">
                    @error('cantidad_semillas')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group" data-aos="fade-up" data-aos-delay="350">
                <label for="observaciones" class="form-label">
                    <i class="fas fa-align-left"></i>Observaciones
                </label>
                <textarea class="form-control"
                          id="observaciones"
                          name="observaciones"
                          rows="4"
                          placeholder="Notas adicionales sobre la siembra...">{{ old('observaciones') }}</textarea>
            </div>

            <div class="d-flex justify-content-between mt-5" data-aos="fade-up" data-aos-delay="400">
                <a href="{{ route('siembras.index') }}" class="btn-custom btn-cancelar">
                    <i class="fas fa-times me-2"></i>Cancelar
                </a>
                <button type="submit" class="btn-custom btn-guardar">
                    <i class="fas fa-save me-2"></i>Registrar Siembra
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal para crear módulo (sin tipo de riego, será automático por defecto) -->
<div class="modal fade" id="crearModuloModal" tabindex="-1" aria-labelledby="crearModuloModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearModuloModalLabel">
                    <i class="fas fa-layer-group me-2"></i>Crear nuevo módulo
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nuevo_modulo_nombre" class="form-label">
                        <i class="fas fa-tag"></i>Nombre del módulo <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="nuevo_modulo_nombre" placeholder="Ej: Módulo 5" required>
                </div>

                <div class="form-group">
                    <label for="nuevo_modulo_ubicacion" class="form-label">
                        <i class="fas fa-map-marker-alt"></i>Ubicación
                    </label>
                    <input type="text" class="form-control" id="nuevo_modulo_ubicacion" placeholder="Ej: Terraza norte">
                </div>

                <div class="form-group">
                    <label for="nuevo_modulo_num_charolas" class="form-label">
                        <i class="fas fa-cubes"></i>Número de charolas
                    </label>
                    <input type="number" class="form-control" id="nuevo_modulo_num_charolas" value="4" min="1" max="10">
                </div>

                <div class="alert-info" style="padding: 10px; border-radius: 10px; margin-top: 10px;">
                    <i class="fas fa-info-circle me-2"></i>
                    El tipo de riego será <strong>Automático</strong> por defecto.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-custom btn-cancelar" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Cancelar
                </button>
                <button type="button" class="btn-custom btn-guardar" id="guardarModuloBtn">
                    <i class="fas fa-save me-2"></i>Crear módulo
                </button>
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

    // Manejar la creación del módulo desde el modal
    document.getElementById('guardarModuloBtn').addEventListener('click', function() {
        // Obtener valores del modal
        const nombre = document.getElementById('nuevo_modulo_nombre').value;
        const ubicacion = document.getElementById('nuevo_modulo_ubicacion').value;
        const numCharolas = document.getElementById('nuevo_modulo_num_charolas').value;

        // Validar campos requeridos
        if (!nombre) {
            alert('El nombre del módulo es requerido');
            return;
        }

        // Crear campos ocultos en el formulario principal
        const form = document.getElementById('formSiembra');

        // Eliminar campos ocultos existentes si los hay
        document.querySelectorAll('.campo-modulo-temp').forEach(el => el.remove());

        // Agregar nuevos campos ocultos
        const campos = [
            { name: 'nuevo_modulo_nombre', value: nombre },
            { name: 'nuevo_modulo_ubicacion', value: ubicacion },
            { name: 'nuevo_modulo_num_charolas', value: numCharolas }
        ];

        campos.forEach(campo => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = campo.name;
            input.value = campo.value;
            input.classList.add('campo-modulo-temp');
            form.appendChild(input);
        });

        // Limpiar el select de módulos para asegurar que no se envíe un valor
        const moduloSelect = document.getElementById('modulo_id');
        if (moduloSelect) {
            moduloSelect.value = '';
        }

        // Cerrar el modal
        bootstrap.Modal.getInstance(document.getElementById('crearModuloModal')).hide();

        // Mensaje de confirmación
        alert('Módulo "' + nombre + '" listo para crear. Completa el resto del formulario y guarda la siembra.');
    });
</script>
</body>
</html>
