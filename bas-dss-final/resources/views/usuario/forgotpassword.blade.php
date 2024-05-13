<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/all.css')}}" />
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.signup.css')}}">
</head>

<body>
    <div class="barra">
        <div class="logo">
            <img src="{{asset('media/img/Logo_BAS.png')}}" alt="logo">
        </div>
        <div class="salir">
            <a href="{{route('index')}}">
                <p>Salir</p>
                <i class="fa-sharp fa-solid fa-right-from-bracket" style="top: -48px;"></i>
            </a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container text-start">
        <div class="row justify-content-center">
            <div class="col-8 col-auto">
                <form action="" method="POST">
                    <input type="hidden" name="op" value="forgotpass">
                    <div class="row justify-content-center">
                        <div class="col-8 col-auto">
                            <div class="form-group">
                                <label for="correo">Correo electrónico</label>
                                <div class="input-group">
                                    <input type="email" id="correo" name="correo" class="form-control" required style="border: 2px solid #5d9beadb;">
                                </div>
                            </div>
                        </div>
                        <div class="col-2 col-auto">
                            <button class="btn btn-success" type="submit" style="margin-top: 24px;">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6 col-auto">
                <br>
                <?php if (isset($_SESSION['message'])) { //Verficamos si la session posee mensajes para mostrar ?>
                <!-- Mensaje a mostrar -->
                    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                        <?php $alerta =  $_SESSION['parameter'/*'message_type'*/]; /*$alerta = ucfirst($alerta);*/ ?>
                        <strong><?= $alerta ?>:</strong> <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                <!-- Fin del mensaje -->
                <?php session_unset(); /* Elimina el mensaje para no volverlo a mostrar si ya ha sido cerrado*/ }; ?>
            </div>
        </div>
    </div>

</body>

</html>