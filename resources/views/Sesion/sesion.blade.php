{{-- resources/views/Sesion/sesion.blade.php --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - GrowWise</title>
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
        .login-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
            z-index: -1;
        }

        .login-background::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
        }

        /* Tarjeta de login */
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            box-shadow: var(--sombra-suave);
            padding: 40px;
            max-width: 450px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transicion);
            position: relative;
            z-index: 2;
        }

        .login-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h2 {
            color: var(--verde-hoja);
            font-weight: 700;
            font-size: 2rem;
        }

        .login-header p {
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

        .btn-login {
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
            margin-top: 20px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-login::before {
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

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(46, 125, 50, 0.4);
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            font-size: 0.95rem;
        }

        .register-link a {
            color: var(--verde-hoja);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }

        .register-link a:hover {
            color: var(--naranja);
            text-decoration: underline;
        }

        .forgot-password {
            text-align: right;
            margin-top: 10px;
            font-size: 0.9rem;
        }

        .forgot-password a {
            color: #666;
            text-decoration: none;
            transition: color 0.3s;
        }

        .forgot-password a:hover {
            color: var(--naranja);
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

        /* Checkbox personalizado */
        .form-check-input:checked {
            background-color: var(--verde-hoja);
            border-color: var(--verde-hoja);
        }

        /* Mensajes de error */
        .alert-danger {
            border-radius: 50px;
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
            padding: 12px 20px;
            margin-bottom: 20px;
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
<div class="login-background"></div>

<div class="login-card" data-aos="fade-up" data-aos-duration="1000">
    <div class="logo">
        <i class="fas fa-seedling"></i>
    </div>
    <div class="login-header">
        <h2>Bienvenido de nuevo</h2>
        <p>Inicia sesión para acceder a tu huerto virtual</p>
    </div>

    {{-- Mostrar errores de autenticación --}}
    @if($errors->any())
        <div class="alert-danger">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ $errors->first() }}
        </div>
    @endif

    {{-- Mostrar mensaje de éxito después de registro --}}
    @if(session('success'))
        <div class="alert-success" style="border-radius: 50px; background-color: rgba(46, 125, 50, 0.1); color: var(--verde-hoja); border: 1px solid rgba(46, 125, 50, 0.2); padding: 12px 20px; margin-bottom: 20px;">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Campo de email con autocomplete -->
        <div class="mb-4">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   id="email"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="correo@ejemplo.com"
                   required
                   autofocus
                   autocomplete="email">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo de contraseña con múltiples atributos anti-autocompletado -->
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <div style="position: relative;">
                <input type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       id="password"
                       name="password"
                       placeholder=""
                       required
                       autocomplete="new-password"  <!-- Cambiado de 'off' a 'new-password' -->
            </div>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Script adicional para limpiar el campo -->
        <script>
            (function() {
                // Limpiar campo de contraseña al cargar la página
                window.addEventListener('load', function() {
                    var passwordField = document.getElementById('password');
                    if (passwordField) {
                        passwordField.value = '';
                    }
                });

                // También limpiar cuando el usuario haga clic en el campo
                document.getElementById('password')?.addEventListener('click', function() {
                    this.value = '';
                });
            })();
        </script>

        <div class="d-flex justify-content-between align-items-center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Recordarme
                </label>
            </div>
            <!-- Sección de olvidé contraseña eliminada temporalmente -->
        </div>

        <button type="submit" class="btn btn-login">
            Iniciar sesión <i class="fas fa-arrow-right ms-2"></i>
        </button>
    </form>

    <div class="register-link">
        ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate gratis</a>
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
