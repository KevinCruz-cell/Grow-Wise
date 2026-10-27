{{-- resources/views/Cultivos/edit.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar {{ $cultivo->nombre }} - GrowWise</title>
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

        .form-control {
            border-radius: 15px;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            transition: var(--transicion);
            font-size: 0.95rem;
            background: white;
        }

        .form-control:focus {
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

        .btn-actualizar {
            background: linear-gradient(135deg, var(--verde-hoja), var(--verde-oscuro));
            color: white;
            box-shadow: 0 10px 20px rgba(46,125,50,0.3);
        }

        .btn-actualizar:hover {
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

        .btn-eliminar {
            background: linear-gradient(135deg, #dc3545, #b02a37);
            color: white;
            box-shadow: 0 10px 20px rgba(220,53,69,0.3);
            margin-left: 10px;
        }

        .btn-eliminar:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(220,53,69,0.4);
            color: white;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
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
            <i class="fas fa-edit"></i>
            <h2>Editar Cultivo</h2>
            <p>Modifica los datos de <strong style="color: var(--verde-hoja);">{{ $cultivo->nombre }}</strong></p>
        </div>

        <form action="{{ route('cultivos.update', $cultivo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                <label for="nombre" class="form-label">
                    <i class="fas fa-seedling"></i>Nombre del cultivo
                </label>
                <input type="text"
                       class="form-control @error('nombre') is-invalid @enderror"
                       id="nombre"
                       name="nombre"
                       value="{{ old('nombre', $cultivo->nombre) }}"
                       required
                       placeholder="Ej: Lechuga">
                @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" data-aos="fade-up" data-aos-delay="150">
                <label for="tipo" class="form-label">
                    <i class="fas fa-tag"></i>Tipo
                </label>
                <select class="form-control @error('tipo') is-invalid @enderror" id="tipo" name="tipo" required>
                    <option value="">Seleccione un tipo</option>
                    <option value="Hoja" {{ old('tipo', $cultivo->tipo) == 'Hoja' ? 'selected' : '' }}>Hoja</option>
                    <option value="Fruto" {{ old('tipo', $cultivo->tipo) == 'Fruto' ? 'selected' : '' }}>Fruto</option>
                    <option value="Aromática" {{ old('tipo', $cultivo->tipo) == 'Aromática' ? 'selected' : '' }}>Aromática</option>
                    <option value="Raíz" {{ old('tipo', $cultivo->tipo) == 'Raíz' ? 'selected' : '' }}>Raíz</option>
                    <option value="Otro" {{ old('tipo', $cultivo->tipo) == 'Otro' ? 'selected' : '' }}>Otro</option>
                </select>
                @error('tipo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" data-aos="fade-up" data-aos-delay="200">
                <label for="descripcion" class="form-label">
                    <i class="fas fa-align-left"></i>Descripción
                </label>
                <textarea class="form-control"
                          id="descripcion"
                          name="descripcion"
                          rows="4"
                          placeholder="Descripción del cultivo...">{{ old('descripcion', $cultivo->descripcion) }}</textarea>
            </div>

            <h5 class="mt-4 mb-3" style="color: var(--verde-hoja);" data-aos="fade-up" data-aos-delay="250">
                <i class="fas fa-chart-line me-2"></i>Parámetros óptimos de cultivo
            </h5>

            <div class="form-row">
                <div class="form-group" data-aos="fade-up" data-aos-delay="300">
                    <label for="temperatura_optima_min" class="form-label">
                        <i class="fas fa-thermometer-half"></i>Temperatura mínima (°C)
                    </label>
                    <input type="number" step="0.1" class="form-control" id="temperatura_optima_min" name="temperatura_optima_min" value="{{ old('temperatura_optima_min', $cultivo->temperatura_optima_min) }}" placeholder="15">
                </div>

                <div class="form-group" data-aos="fade-up" data-aos-delay="350">
                    <label for="temperatura_optima_max" class="form-label">
                        <i class="fas fa-thermometer-full"></i>Temperatura máxima (°C)
                    </label>
                    <input type="number" step="0.1" class="form-control" id="temperatura_optima_max" name="temperatura_optima_max" value="{{ old('temperatura_optima_max', $cultivo->temperatura_optima_max) }}" placeholder="25">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" data-aos="fade-up" data-aos-delay="400">
                    <label for="humedad_optima_min" class="form-label">
                        <i class="fas fa-tint"></i>Humedad mínima (%)
                    </label>
                    <input type="number" class="form-control" id="humedad_optima_min" name="humedad_optima_min" value="{{ old('humedad_optima_min', $cultivo->humedad_optima_min) }}" placeholder="60">
                </div>

                <div class="form-group" data-aos="fade-up" data-aos-delay="450">
                    <label for="humedad_optima_max" class="form-label">
                        <i class="fas fa-tint"></i>Humedad máxima (%)
                    </label>
                    <input type="number" class="form-control" id="humedad_optima_max" name="humedad_optima_max" value="{{ old('humedad_optima_max', $cultivo->humedad_optima_max) }}" placeholder="80">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" data-aos="fade-up" data-aos-delay="500">
                    <label for="luz_optima_min" class="form-label">
                        <i class="fas fa-sun"></i>Luz mínima (lux)
                    </label>
                    <input type="number" class="form-control" id="luz_optima_min" name="luz_optima_min" value="{{ old('luz_optima_min', $cultivo->luz_optima_min) }}" placeholder="3000">
                </div>

                <div class="form-group" data-aos="fade-up" data-aos-delay="550">
                    <label for="luz_optima_max" class="form-label">
                        <i class="fas fa-sun"></i>Luz máxima (lux)
                    </label>
                    <input type="number" class="form-control" id="luz_optima_max" name="luz_optima_max" value="{{ old('luz_optima_max', $cultivo->luz_optima_max) }}" placeholder="5000">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" data-aos="fade-up" data-aos-delay="600">
                    <label for="ph_optimo_min" class="form-label">
                        <i class="fas fa-flask"></i>pH mínimo
                    </label>
                    <input type="number" step="0.1" class="form-control" id="ph_optimo_min" name="ph_optimo_min" value="{{ old('ph_optimo_min', $cultivo->ph_optimo_min) }}" placeholder="6.0">
                </div>

                <div class="form-group" data-aos="fade-up" data-aos-delay="650">
                    <label for="ph_optimo_max" class="form-label">
                        <i class="fas fa-flask"></i>pH máximo
                    </label>
                    <input type="number" step="0.1" class="form-control" id="ph_optimo_max" name="ph_optimo_max" value="{{ old('ph_optimo_max', $cultivo->ph_optimo_max) }}" placeholder="7.0">
                </div>
            </div>

            <div class="form-group" data-aos="fade-up" data-aos-delay="700">
                <label for="dias_cosecha" class="form-label">
                    <i class="fas fa-calendar-alt"></i>Días hasta cosecha
                </label>
                <input type="number" class="form-control" id="dias_cosecha" name="dias_cosecha" value="{{ old('dias_cosecha', $cultivo->dias_cosecha) }}" placeholder="30">
            </div>

            <div class="d-flex justify-content-between align-items-center mt-5" data-aos="fade-up" data-aos-delay="800">
                <div>
                    <a href="{{ route('cultivos.index') }}" class="btn-custom btn-cancelar">
                        <i class="fas fa-times me-2"></i>Cancelar
                    </a>
                    <button type="button" class="btn-custom btn-eliminar" onclick="if(confirm('¿Estás seguro de eliminar este cultivo?')) { document.getElementById('delete-form').submit(); }">
                        <i class="fas fa-trash me-2"></i>Eliminar
                    </button>
                </div>
                <button type="submit" class="btn-custom btn-actualizar">
                    <i class="fas fa-save me-2"></i>Guardar Cambios
                </button>
            </div>
        </form>

        <form id="delete-form" action="{{ route('cultivos.destroy', $cultivo->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
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
