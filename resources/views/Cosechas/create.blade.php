{{-- resources/views/Cosechas/create.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Cosecha - GrowWise</title>
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
            max-width: 700px;
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

        .alert-warning {
            background: rgba(255,152,0,0.1);
            color: var(--naranja-oscuro);
            border: 1px solid rgba(255,152,0,0.2);
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .alert-warning a {
            color: var(--naranja-oscuro);
            font-weight: 600;
            text-decoration: underline;
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
            <i class="fas fa-carrot"></i>
            <h2>Nueva Cosecha</h2>
            <p>Registra una nueva cosecha en tu huerto</p>
        </div>

        <form action="{{ route('cosechas.store') }}" method="POST">
            @csrf

            <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                <label for="siembra_id" class="form-label">
                    <i class="fas fa-seedling"></i>Siembra a cosechar
                </label>
                <select class="form-select @error('siembra_id') is-invalid @enderror" id="siembra_id" name="siembra_id" required>
                    <option value="">Seleccione una siembra</option>
                    @foreach($siembras as $siembra)
                        <option value="{{ $siembra->id }}" {{ old('siembra_id') == $siembra->id ? 'selected' : '' }}>
                            {{ $siembra->cultivo->nombre }} - Módulo {{ $siembra->modulo->nombre }} (Charola {{ $siembra->charola }}) - {{ $siembra->fecha_siembra->format('d/m/Y') }}
                        </option>
                    @endforeach
                </select>
                @error('siembra_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if($siembras->isEmpty())
                    <div class="alert-warning" style="margin-top: 10px;">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        No hay siembras activas disponibles para cosechar.
                        <a href="{{ route('siembras.create') }}">Crea una siembra primero</a>.
                    </div>
                @endif
            </div>

            <div class="form-row">
                <div class="form-group" data-aos="fade-up" data-aos-delay="150">
                    <label for="fecha_cosecha" class="form-label">
                        <i class="fas fa-calendar-alt"></i>Fecha de Cosecha
                    </label>
                    <input type="date"
                           class="form-control @error('fecha_cosecha') is-invalid @enderror"
                           id="fecha_cosecha"
                           name="fecha_cosecha"
                           value="{{ old('fecha_cosecha', date('Y-m-d')) }}"
                           required>
                    @error('fecha_cosecha')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" data-aos="fade-up" data-aos-delay="200">
                    <label for="cantidad_kg" class="form-label">
                        <i class="fas fa-weight-scale"></i>Cantidad (kg)
                    </label>
                    <input type="number"
                           class="form-control @error('cantidad_kg') is-invalid @enderror"
                           id="cantidad_kg"
                           name="cantidad_kg"
                           value="{{ old('cantidad_kg') }}"
                           required
                           min="0.1"
                           step="0.1"
                           placeholder="Ej: 2.5">
                    @error('cantidad_kg')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group" data-aos="fade-up" data-aos-delay="250">
                <label for="calidad" class="form-label">
                    <i class="fas fa-star"></i>Calidad
                </label>
                <select class="form-select @error('calidad') is-invalid @enderror" id="calidad" name="calidad" required>
                    <option value="">Seleccione la calidad</option>
                    <option value="Excelente" {{ old('calidad') == 'Excelente' ? 'selected' : '' }}>Excelente</option>
                    <option value="Buena" {{ old('calidad') == 'Buena' ? 'selected' : '' }}>Buena</option>
                    <option value="Regular" {{ old('calidad') == 'Regular' ? 'selected' : '' }}>Regular</option>
                    <option value="Mala" {{ old('calidad') == 'Mala' ? 'selected' : '' }}>Mala</option>
                </select>
                @error('calidad')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" data-aos="fade-up" data-aos-delay="300">
                <label for="observaciones" class="form-label">
                    <i class="fas fa-align-left"></i>Observaciones
                </label>
                <textarea class="form-control"
                          id="observaciones"
                          name="observaciones"
                          rows="4"
                          placeholder="Notas adicionales sobre la cosecha...">{{ old('observaciones') }}</textarea>
            </div>

            <div class="d-flex justify-content-between mt-5" data-aos="fade-up" data-aos-delay="350">
                <a href="{{ route('cosechas.index') }}" class="btn-custom btn-cancelar">
                    <i class="fas fa-times me-2"></i>Cancelar
                </a>
                <button type="submit" class="btn-custom btn-guardar" @if($siembras->isEmpty()) disabled style="opacity: 0.5; cursor: not-allowed;" @endif>
                    <i class="fas fa-save me-2"></i>Registrar Cosecha
                </button>
            </div>
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
