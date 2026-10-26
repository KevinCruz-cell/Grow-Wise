{{-- resources/views/Cultivos/show.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $cultivo->nombre }} - GrowWise</title>
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
            font-size: 3rem;
            font-weight: 800;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.05);
            margin-bottom: 10px;
            transition: var(--transicion);
        }

        .detail-title:hover {
            color: var(--naranja);
            transform: scale(1.02);
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

        .info-unit {
            color: #999;
            font-size: 0.9rem;
            font-weight: 400;
        }

        .descripcion-card {
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
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

        .estado-badge {
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            display: inline-block;
        }

        .estado-activo {
            background: rgba(46,125,50,0.15);
            color: var(--verde-oscuro);
            border: 1px solid var(--verde-hoja);
        }

        .estado-inactivo {
            background: rgba(108,117,125,0.15);
            color: #6c757d;
            border: 1px solid #6c757d;
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
                <h1 class="detail-title" data-aos="fade-right" data-aos-delay="200">{{ $cultivo->nombre }}</h1>
                <span class="detail-badge" data-aos="fade-right" data-aos-delay="300">
                        <i class="fas fa-tag me-2"></i>{{ $cultivo->tipo }}
                    </span>
            </div>
            <i class="fas fa-seedling header-icon" data-aos="zoom-in" data-aos-delay="400"></i>
        </div>

        @if($cultivo->descripcion)
            <div class="descripcion-card" data-aos="fade-up" data-aos-delay="200">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-align-left me-3" style="color: var(--verde-hoja); font-size: 1.5rem;"></i>
                    <h5 style="color: var(--verde-hoja); margin: 0;">Descripción</h5>
                </div>
                <p style="color: #666; font-size: 1.1rem; line-height: 1.8;">{{ $cultivo->descripcion }}</p>
            </div>
        @endif

        <div class="row g-4">
            <!-- Temperatura -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-thermometer-half"></i>
                    </div>
                    <div class="info-label">Temperatura óptima</div>
                    <div class="info-value">
                        @if($cultivo->temperatura_optima_min && $cultivo->temperatura_optima_max)
                            {{ $cultivo->temperatura_optima_min }}°C - {{ $cultivo->temperatura_optima_max }}°C
                        @else
                            <span class="text-muted">No especificado</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Humedad -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-tint"></i>
                    </div>
                    <div class="info-label">Humedad óptima</div>
                    <div class="info-value">
                        @if($cultivo->humedad_optima_min && $cultivo->humedad_optima_max)
                            {{ $cultivo->humedad_optima_min }}% - {{ $cultivo->humedad_optima_max }}%
                        @else
                            <span class="text-muted">No especificado</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Luz -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="350">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-sun"></i>
                    </div>
                    <div class="info-label">Luz óptima</div>
                    <div class="info-value">
                        @if($cultivo->luz_optima_min && $cultivo->luz_optima_max)
                            {{ $cultivo->luz_optima_min }} lux - {{ $cultivo->luz_optima_max }} lux
                        @else
                            <span class="text-muted">No especificado</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- pH -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <div class="info-label">pH óptimo</div>
                    <div class="info-value">
                        @if($cultivo->ph_optimo_min && $cultivo->ph_optimo_max)
                            {{ $cultivo->ph_optimo_min }} - {{ $cultivo->ph_optimo_max }}
                        @else
                            <span class="text-muted">No especificado</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Días cosecha -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="450">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="info-label">Días hasta cosecha</div>
                    <div class="info-value">
                        @if($cultivo->dias_cosecha)
                            {{ $cultivo->dias_cosecha }} <span class="info-unit">días</span>
                        @else
                            <span class="text-muted">No especificado</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Estado -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="info-label">Estado</div>
                    <div class="info-value">
                        @if($cultivo->activo)
                            <span class="estado-badge estado-activo">
                                    <i class="fas fa-check-circle me-2"></i>Activo
                                </span>
                        @else
                            <span class="estado-badge estado-inactivo">
                                    <i class="fas fa-times-circle me-2"></i>Inactivo
                                </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-5" data-aos="fade-up" data-aos-delay="550">
            <a href="{{ route('cultivos.index') }}" class="btn-custom btn-volver">
                <i class="fas fa-arrow-left me-2"></i>Volver a Cultivos
            </a>
            <a href="{{ route('cultivos.edit', $cultivo->id) }}" class="btn-custom btn-editar">
                <i class="fas fa-edit me-2"></i>Editar Cultivo
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
