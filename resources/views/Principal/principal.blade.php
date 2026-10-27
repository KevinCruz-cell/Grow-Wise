{{-- resources/views/principal.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrowWise - Cultivo Vertical Inteligente</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts para tipografía elegante -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- AOS (Animate On Scroll) para animaciones al hacer scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Variables y reset */
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
            overflow-x: hidden;
            color: #333;
        }

        /* Navbar mejorado con blur effect */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            padding: 15px 0;
            transition: var(--transicion);
        }

        .navbar.scrolled {
            padding: 10px 0;
            background: rgba(255, 255, 255, 0.98) !important;
            box-shadow: 0 5px 30px rgba(46, 125, 50, 0.1);
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--verde-hoja) !important;
            font-size: 1.8rem;
            letter-spacing: -0.5px;
            transition: var(--transicion);
        }

        .navbar-brand i {
            color: var(--naranja);
            margin-right: 8px;
            transform: rotate(0deg);
            transition: transform 0.5s ease;
        }

        .navbar-brand:hover i {
            transform: rotate(360deg);
        }

        .nav-link {
            font-weight: 500;
            color: #333 !important;
            margin: 0 10px;
            position: relative;
            padding: 5px 0 !important;
            transition: var(--transicion);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--verde-hoja), var(--naranja));
            transition: width 0.3s ease;
        }

        .nav-link:hover {
            color: var(--verde-hoja) !important;
        }

        .nav-link:hover::after {
            width: 80%;
        }

        /* Botones con efectos increíbles */
        .btn-custom {
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 0.9rem;
            transition: var(--transicion);
            position: relative;
            overflow: hidden;
            z-index: 1;
            border: none;
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
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

        .btn-naranja {
            background: linear-gradient(135deg, var(--naranja), var(--naranja-oscuro));
            color: white;
        }

        .btn-naranja:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(255, 152, 0, 0.3);
        }

        .btn-outline-light-custom {
            background: transparent;
            border: 2px solid white;
            color: white;
        }

        .btn-outline-light-custom:hover {
            background: white;
            color: var(--verde-hoja);
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(255,255,255,0.2);
        }

        /* Hero section con fondo animado y overlay */
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #1B5E20 0%, #2E7D32 50%, #81C784 100%);
            overflow: hidden;
            padding: 120px 0 80px;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80') center/cover;
            opacity: 0.2;
            animation: zoomBackground 20s infinite alternate;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 50%, rgba(46,125,50,0.3) 0%, transparent 50%);
        }

        @keyframes zoomBackground {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 20px;
            text-shadow: 2px 2px 20px rgba(0,0,0,0.3);
            animation: fadeInUp 1s ease;
        }

        .hero-subtitle {
            font-size: 1.8rem;
            font-weight: 400;
            margin-bottom: 30px;
            opacity: 0.9;
            animation: fadeInUp 1s ease 0.2s both;
        }

        .hero-text {
            font-size: 1.2rem;
            margin-bottom: 40px;
            opacity: 0.8;
            max-width: 600px;
            animation: fadeInUp 1s ease 0.4s both;
        }

        .hero-buttons {
            animation: fadeInUp 1s ease 0.6s both;
        }

        .hero-image {
            position: relative;
            z-index: 2;
            animation: float 6s ease-in-out infinite;
            filter: drop-shadow(0 20px 30px rgba(0,0,0,0.3));
            border-radius: 20px;
            overflow: hidden;
            transform: perspective(1000px) rotateY(-5deg);
            transition: transform 0.5s ease;
        }

        .hero-image:hover {
            transform: perspective(1000px) rotateY(0deg);
        }

        .hero-image img {
            width: 100%;
            border-radius: 20px;
            transition: transform 0.5s ease;
        }

        .hero-image:hover img {
            transform: scale(1.05);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotateY(-5deg); }
            50% { transform: translateY(-20px) rotateY(-5deg); }
        }

        /* Sección características */
        .features-section {
            padding: 100px 0;
            background: white;
            position: relative;
        }

        .section-title {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--verde-hoja);
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--verde-hoja), var(--naranja));
            border-radius: 2px;
        }

        .feature-card {
            background: white;
            border-radius: 30px;
            padding: 40px 30px;
            box-shadow: var(--sombra-suave);
            transition: var(--transicion);
            position: relative;
            overflow: hidden;
            z-index: 1;
            height: 100%;
            border: 1px solid rgba(46, 125, 50, 0.1);
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--verde-hoja), var(--naranja));
            transition: height 0.3s ease;
            z-index: -1;
        }

        .feature-card:hover {
            transform: translateY(-15px);
            box-shadow: var(--sombra-media);
        }

        .feature-card:hover::before {
            height: 100%;
            opacity: 0.05;
        }

        .feature-icon {
            font-size: 3.5rem;
            color: var(--verde-hoja);
            margin-bottom: 25px;
            transition: var(--transicion);
            display: inline-block;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.2) rotate(5deg);
            color: var(--naranja);
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--gris-oscuro);
        }

        .feature-text {
            color: #666;
            line-height: 1.7;
        }

        /* Estadísticas con contador animado */
        .stats-section {
            background: linear-gradient(135deg, var(--verde-oscuro), var(--verde-hoja));
            color: white;
            padding: 60px 0;
            position: relative;
            overflow: hidden;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 30s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .stat-item {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #fff, #e0e0e0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-label {
            font-size: 1.2rem;
            opacity: 0.9;
            letter-spacing: 1px;
        }

        /* CTA Section */
        .cta-section {
            padding: 80px 0;
            background: url('https://images.unsplash.com/photo-1464226184884-fa280b87c399?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80') fixed center/cover;
            position: relative;
            color: white;
            text-align: center;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(46, 125, 50, 0.85);
        }

        .cta-content {
            position: relative;
            z-index: 2;
        }

        .cta-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .cta-text {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 40px;
            opacity: 0.9;
        }

        .cta-button {
            background: white;
            color: var(--verde-hoja);
            border: none;
            padding: 15px 50px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.2rem;
            transition: var(--transicion);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            background: var(--naranja);
            color: white;
        }

        /* Footer */
        .footer {
            background: #1a2a2f;
            color: #aaa;
            padding: 60px 0 30px;
        }

        .footer h5 {
            color: white;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .footer a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: var(--verde-menta);
        }

        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin-right: 10px;
            transition: var(--transicion);
        }

        .social-icons a:hover {
            background: var(--verde-hoja);
            color: white;
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.05);
            padding-top: 30px;
            margin-top: 40px;
            text-align: center;
            color: #777;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .hero-subtitle {
                font-size: 1.3rem;
            }
            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fas fa-seedling"></i> GrowWise
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Registrarse</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 hero-content">
                <h1 class="hero-title" data-aos="fade-up" data-aos-duration="1000">CULTIVO VERTICAL INTELIGENTE</h1>
                <h2 class="hero-subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Tu huerto en casa, sin excusas</h2>
                <p class="hero-text" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">Cultiva tus propias hortalizas frescas en espacios reducidos. Monitoreo por ciclos cada 15 minutos, ideal para familias que quieren alimentos sanos y sostenibles.</p>
                <div class="hero-buttons" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                    <a href="{{route('register')}}" class="btn btn-custom btn-naranja me-3 mb-2">Comenzar Gratis <i class="fas fa-arrow-right ms-2"></i></a>
                    <a href="#caracteristicas" class="btn btn-custom btn-outline-light-custom mb-2">Ver características</a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="800">
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1586771107445-d3ca888129ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Cultivo vertical en casa" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de características -->
<section class="features-section" id="caracteristicas">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">¿Por qué GrowWise?</h2>
            <p class="lead text-muted">Todo lo que necesitas para cultivar en casa de forma sencilla y eficiente</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h5 class="feature-title">Cultivo vertical</h5>
                    <p class="feature-text">Aprovecha al máximo el espacio con nuestros módulos verticales, ideales para departamentos y casas pequeñas.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5 class="feature-title">Monitoreo por ciclos</h5>
                    <p class="feature-text">Cada 15 minutos, nuestro sistema verifica humedad, luz y nutrientes, y te avisa si algo necesita atención.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h5 class="feature-title">Enfoque familiar</h5>
                    <p class="feature-text">Diseñado para que padres e hijos cultiven juntos, aprendiendo sobre alimentación saludable y sostenibilidad.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de estadísticas (adaptada al cultivo vertical) -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="stat-item">
                    <div class="stat-number">+500</div>
                    <div class="stat-label">Módulos instalados</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Familias satisfechas</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Soporte y asesoría</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="400">
                <div class="stat-item">
                    <div class="stat-number">+30</div>
                    <div class="stat-label">Tipos de hortalizas</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h2 class="cta-title">¿Listo para cultivar en casa?</h2>
            <p class="cta-text">Únete a cientos de familias que ya disfrutan de hortalizas frescas, cultivadas por ellos mismos con la ayuda de GrowWise.</p>
            <a href="{{route('register')}}" class="btn cta-button">Comenzar ahora <i class="fas fa-rocket ms-2"></i></a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h5>GrowWise</h5>
                <p>Transformando hogares en huertos urbanos con tecnología accesible y sostenible.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4">
                <h5>Producto</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Características</a></li>
                    <li><a href="#">Precios</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Soporte</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 mb-4">
                <h5>Compañía</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Sobre nosotros</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="#">Carreras</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 mb-4">
                <h5>Contacto</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt me-2"></i> Av. Tecnología 123, Ciudad</li>
                    <li><i class="fas fa-phone me-2"></i> +123 456 7890</li>
                    <li><i class="fas fa-envelope me-2"></i> info@smartgarden.com</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} GrowWise. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Inicializar AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Cambiar estilo del navbar al hacer scroll
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>
</body>
</html>
