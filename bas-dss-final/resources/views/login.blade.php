<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BAS | Iniciar sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

    <div class="wrapper">
        <form action="{{route('usuario.login')}}" method="POST" >
        @csrf
            <div class="title">
                <h2>Le damos la bienvenida a</h2><br>
                <div class="img">
                    <img src="{{asset('media/img/Logo_BAS_Color.png')}}" alt="logo">
                </div>
                <h2>Banco de Agricultura Salvadoreño</h2>
            </div>
            <div class="input-box">
                <input type="text" name="cuenta" placeholder="Usuario o Correo electrónico" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="password" name="clave" placeholder="Contraseña" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <a href="{{route('usuario.forgotpassword')}}"> ¿Has olvidado tu contraseña?</a>
            </div>

            <button type="submit" class="btn">
                Ingresar
            </button>

            <div class="register-link">
                <p>¿No tienes una cuenta?
                    <a href="{{route('signup')}}">Registrate</a>
                </p>
            </div>
        </form>
        <!-- Mensaje a mostrar -->
        @if (session('status'))
        <div style="font-size: 12px;" class="alert alert-{{ session('status')['level'] }} alert-dismissible fade show" role="alert">
            <strong>{{ session('status')['parameter'] }}:</strong> {{ session('status')['message'] }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
        @endif
    </div>
</body>
</html>