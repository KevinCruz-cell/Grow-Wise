{{-- resources/views/Register/registro.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - GrowWise</title>
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
            --transicion: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--fondo);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        /* Fondo de hortalizas */
        .register-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1597362925123-77861d3fbac7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
            z-index: -1;
        }

        .register-background::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
        }

        /* Tarjeta de registro */
        .register-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            box-shadow: var(--sombra-suave);
            padding: 40px;
            max-width: 500px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transicion);
            position: relative;
            z-index: 2;
        }

        .register-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-header h2 {
            color: var(--verde-hoja);
            font-weight: 700;
            font-size: 2rem;
        }

        .register-header p {
            color: #666;
            font-size: 0.95rem;
        }

        .form-control {
            border-radius: 50px;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            transition: var(--transicion);
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: var(--verde-hoja);
            box-shadow: 0 0 0 0.2rem rgba(46, 125, 50, 0.25);
            outline: none;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 5px;
            margin-left: 15px;
        }

        .btn-register {
            background: linear-gradient(135deg, var(--verde-hoja), var(--verde-oscuro));
            color: white;
            border: none;
            border-radius: 50px;
            padding: 14px 30px;
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: var(--transicion);
            width: 100%;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-register::before {
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

        .btn-register:hover::before {
            left: 100%;
        }

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(46, 125, 50, 0.4);
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            font-size: 0.95rem;
        }

        .login-link a {
            color: var(--verde-hoja);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }

        .login-link a:hover {
            color: var(--naranja);
            text-decoration: underline;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo i {
            font-size: 3rem;
            color: var(--verde-hoja);
            background: rgba(255,255,255,0.9);
            width: 80px;
            height: 80px;
            line-height: 80px;
            border-radius: 50%;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .alert-danger {
            border-radius: 50px;
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
            padding: 12px 20px;
            margin-bottom: 20px;
        }

        @media (max-width: 576px) {
            .register-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
<div class="register-background"></div>

<div class="register-card" data-aos="fade-up" data-aos-duration="1000">
    <div class="logo">
        <i class="fas fa-seedling"></i>
    </div>
    <div class="register-header">
        <h2>Crear cuenta</h2>
        <p>Únete a la familia GrowWise y comienza a cultivar</p>
    </div>

    {{-- Mostrar errores de validación --}}
    @if($errors->any())
        <div class="alert-danger mb-4">
            <i class="fas fa-exclamation-circle me-2"></i>
            <strong>Por favor corrige los siguientes errores:</strong>
            <ul class="mt-2 mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ej. Juan" required autocomplete="given-name">
                @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old('apellido') }}" placeholder="Ej. Pérez" required autocomplete="family-name">
                @error('apellido')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="correo@ejemplo.com" required autocomplete="email">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de contraseña con anti-autocompletado -->
            <div class="col-12">
                <label for="password" class="form-label">Contraseña</label>
                <div style="position: relative;">
                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           id="password"
                           name="password"
                           placeholder=""
                           required
                           autocomplete="new-password"
                           readonly
                           onfocus="this.removeAttribute('readonly')"
                           value="">
                </div>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de confirmación con anti-autocompletado -->
            <div class="col-12">
                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                <div style="position: relative;">
                    <input type="password"
                           class="form-control"
                           id="password_confirmation"
                           name="password_confirmation"
                           placeholder=""
                           required
                           autocomplete="new-password"
                           readonly
                           onfocus="this.removeAttribute('readonly')"
                           value="">
                </div>
            </div>
        </div>

        <!-- Script para limpiar campos al cargar -->
        <script>
            (function() {
                window.addEventListener('load', function() {
                    // Limpiar campo de contraseña
                    var passwordField = document.getElementById('password');
                    if (passwordField) {
                        passwordField.value = '';
                    }

                    // Limpiar campo de confirmación
                    var confirmField = document.getElementById('password_confirmation');
                    if (confirmField) {
                        confirmField.value = '';
                    }
                });

                // También limpiar cuando el usuario haga clic
                document.getElementById('password')?.addEventListener('click', function() {
                    this.value = '';
                });

                document.getElementById('password_confirmation')?.addEventListener('click', function() {
                    this.value = '';
                });
            })();
        </script>

        <button type="submit" class="btn btn-register mt-4">
            Registrarse <i class="fas fa-arrow-right ms-2"></i>
        </button>
    </form>

    <div class="login-link">
        ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
