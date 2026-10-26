{{-- resources/views/Siembras/show.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Siembra - GrowWise</title>
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

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 40px 0;
        }

        .detail-container {
            max-width: 900px;
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

        .detail-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .detail-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--verde-hoja), var(--naranja));
        }

        .detail-header {
            border-bottom: 2px solid rgba(46,125,50,0.1);
            padding-bottom: 25px;
            margin-bottom: 30px;
            position: relative;
        }

        .detail-title {
            color: var(--verde-hoja);
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 10px;
            transition: var(--transicion);
        }

        .detail-title:hover {
            color: var(--naranja);
        }

        .detail-badge {
            background: linear-gradient(135deg, var(--verde-menta), var(--verde-hoja));
            color: white;
            padding: 8px 25px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            display: inline-block;
            box-shadow: 0 5px 15px rgba(46,125,50,0.3);
        }

        .header-icon {
            font-size: 5rem;
            color: var(--verde-menta);
            transition: var(--transicion);
            filter: drop-shadow(0 10px 20px rgba(46,125,50,0.3));
        }

        .header-icon:hover {
            transform: rotate(360deg) scale(1.1);
            color: var(--naranja);
        }

        .info-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: var(--sombra-suave);
            transition: var(--transicion);
            border: 1px solid rgba(46,125,50,0.1);
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .info-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--sombra-media);
            border-color: var(--verde-hoja);
        }

        .info-card::before {
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

        .info-card:hover::before {
            transform: scaleX(1);
        }

        .info-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--verde-menta), var(--verde-hoja));
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-bottom: 15px;
            transition: var(--transicion);
        }

        .info-card:hover .info-icon {
            transform: scale(1.1) rotate(5deg);
            background: linear-gradient(135deg, var(--naranja), var(--naranja-oscuro));
        }

        .info-label {
            color: #888;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .info-value {
            color: var(--verde-oscuro);
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0;
        }

        .estado-badge {
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            display: inline-block;
        }

        .estado-activa {
            background: rgba(46,125,50,0.15);
            color: var(--verde-oscuro);
            border: 1px solid var(--verde-hoja);
        }

        .estado-completada {
            background: rgba(255,152,0,0.15);
            color: var(--naranja-oscuro);
            border: 1px solid var(--naranja);
        }

        .estado-problema {
            background: rgba(220,53,69,0.15);
            color: #dc3545;
            border: 1px solid #dc3545;
        }

        .estado-cancelada {
            background: rgba(108,117,125,0.15);
            color: #6c757d;
            border: 1px solid #6c757d;
        }

        .observaciones-card {
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
            border-radius: 20px;
            padding: 30px;
            margin-top: 30px;
            border-left: 5px solid var(--verde-hoja);
            box-shadow: var(--sombra-suave);
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

        .btn-editar {
            background: linear-gradient(135deg, var(--naranja), var(--naranja-oscuro));
            color: white;
            box-shadow: 0 10px 20px rgba(255,152,0,0.3);
        }

        .btn-editar:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(255,152,0,0.4);
            color: white;
        }

        .btn-volver {
            background: linear-gradient(135deg, #6c757d, #495057);
            color: white;
            box-shadow: 0 10px 20px rgba(108,117,125,0.3);
        }

        .btn-volver:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(108,117,125,0.4);
            color: white;
        }

        .progress {
            height: 10px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .progress-bar {
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .detail-container {
                padding: 20px;
            }
            .detail-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="detail-container" data-aos="fade-up" data-aos-duration="1000">
        <div class="detail-header d-flex justify-content-between align-items-center">
            <div>
                <h1 class="detail-title" data-aos="fade-right" data-aos-delay="200">
                    Siembra #{{ str_pad($siembra->id, 3, '0', STR_PAD_LEFT) }}
                </h1>
                <span class="detail-badge" data-aos="fade-right" data-aos-delay="300">
                    <i class="fas fa-calendar-alt me-2"></i>{{ $siembra->fecha_siembra->format('d/m/Y') }}
                </span>
            </div>
            <i class="fas fa-sprout header-icon" data-aos="zoom-in" data-aos-delay="400"></i>
        </div>

        <div class="row g-4">
            <!-- Cultivo -->
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <div class="info-label">Cultivo</div>
                    <div class="info-value">{{ $siembra->cultivo->nombre }}</div>
                    <small class="text-muted">{{ $siembra->cultivo->tipo }}</small>
                </div>
            </div>

            <!-- Módulo y Charola -->
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="250">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="info-label">Ubicación</div>
                    <div class="info-value">{{ $siembra->modulo->nombre ?? 'Sin módulo' }}</div>
                    <small class="text-muted">Charola {{ $siembra->charola }}</small>
                </div>
            </div>

            <!-- Estado -->
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="info-label">Estado</div>
                    <div class="info-value">
                        <span class="estado-badge
                            @if($siembra->estado == 'Activa') estado-activa
                            @elseif($siembra->estado == 'Completada') estado-completada
                            @elseif($siembra->estado == 'Problema') estado-problema
                            @else estado-cancelada
                            @endif">
                            {{ $siembra->estado }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Semillas -->
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="350">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <div class="info-label">Semillas</div>
                    <div class="info-value">{{ $siembra->cantidad_semillas ?? 'N/A' }}</div>
                    <small class="text-muted">unidades</small>
                </div>
            </div>

            <!-- Fecha estimada cosecha -->
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="info-label">Cosecha estimada</div>
                    <div class="info-value">
                        {{ $siembra->fecha_estimada_cosecha ? $siembra->fecha_estimada_cosecha->format('d/m/Y') : 'No definida' }}
                    </div>
                    @if($siembra->fecha_estimada_cosecha)
                        <small class="text-muted">
                            @php
                                $diasRestantes = now()->diffInDays($siembra->fecha_estimada_cosecha, false);
                            @endphp
                            @if($diasRestantes > 0)
                                Faltan {{ $diasRestantes }} días
                            @elseif($diasRestantes == 0)
                                ¡Hoy es el día!
                            @else
                                {{ abs($diasRestantes) }} días de retraso
                            @endif
                        </small>
                    @endif
                </div>
            </div>

            <!-- Progreso -->
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="450">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="info-label">Progreso</div>
                    <div class="info-value">{{ $siembra->progreso }}%</div>
                    <div class="progress mt-2">
                        <div class="progress-bar
                            @if($siembra->estado == 'Problema') bg-danger
                            @elseif($siembra->estado == 'Completada') bg-warning
                            @else bg-success
                            @endif"
                             style="width: {{ $siembra->progreso }}%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($siembra->observaciones)
            <div class="observaciones-card" data-aos="fade-up" data-aos-delay="500">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-align-left me-3" style="color: var(--verde-hoja); font-size: 1.5rem;"></i>
                    <h5 style="color: var(--verde-hoja); margin: 0;">Observaciones</h5>
                </div>
                <p style="color: #666; font-size: 1.1rem; line-height: 1.8;">{{ $siembra->observaciones }}</p>
            </div>
        @endif

        <!-- Sección de cosecha si existe -->
        @if($siembra->cosecha)
            <div class="alert-info" style="padding: 20px; border-radius: 15px; margin-top: 30px;" data-aos="fade-up" data-aos-delay="550">
                <div class="d-flex align-items-center">
                    <i class="fas fa-carrot fa-2x me-3" style="color: var(--naranja);"></i>
                    <div>
                        <h5 style="color: var(--verde-hoja); margin-bottom: 5px;">Cosecha registrada</h5>
                        <p class="mb-0">
                            <strong>{{ $siembra->cosecha->cantidad_kg }} kg</strong> •
                            Calidad: {{ $siembra->cosecha->calidad }} •
                            Fecha: {{ $siembra->cosecha->fecha_cosecha->format('d/m/Y') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Sección de evaluación si existe -->
        @if($siembra->evaluacion)
            <div class="alert-warning" style="padding: 20px; border-radius: 15px; margin-top: 15px;" data-aos="fade-up" data-aos-delay="600">
                <div class="d-flex align-items-center">
                    <i class="fas fa-star fa-2x me-3" style="color: var(--naranja);"></i>
                    <div>
                        <h5 style="color: var(--verde-hoja); margin-bottom: 5px;">Evaluación de rendimiento</h5>
                        <p class="mb-0">
                            <strong>{{ $siembra->evaluacion->rendimiento }}/10</strong> •
                            Eficiencia: {{ $siembra->evaluacion->eficiencia ?? 'N/A' }}% •
                            Fecha: {{ $siembra->evaluacion->fecha_evaluacion->format('d/m/Y') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <div class="d-flex justify-content-between mt-5" data-aos="fade-up" data-aos-delay="650">
            <a href="{{ route('siembras.index') }}" class="btn-custom btn-volver">
                <i class="fas fa-arrow-left me-2"></i>Volver a Siembras
            </a>
            <a href="{{ route('siembras.edit', $siembra->id) }}" class="btn-custom btn-editar">
                <i class="fas fa-edit me-2"></i>Editar Siembra
            </a>
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
</script>
</body>
</html>
