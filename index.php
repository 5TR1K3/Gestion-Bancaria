<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BAS | Iniciar sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="wrapper">
        <form action="models/UsuarioModel.php" method="POST">
            <input type="hidden" name="op" value="iniciarsesion">
            <div class="title">
                <h2>Le damos la bienvenida a</h2><br>
                <div class="img">
                    <img src="assets/media/img/Logo_BAS_Color.png" alt="logo">
                </div>
                <h2>Banco de Agricultura Salvadoreño</h2>
            </div>
            <div class="input-box">
                <input type="email" name="correo" placeholder="Correo electrónico" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input name="clave" type="password" placeholder="Contraseña" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <a href="vistas/Usuario/forgot-password.php"> ¿Has olvidado tu contraseña?</a>
            </div>

            <button type="submit" class="btn">
                Ingresar
            </button>

            <div class="register-link">
                <p>¿No tienes una cuenta?
                    <a href="vistas/signup.php">Registrate</a>
                </p>
            </div>
        </form>
        <?php if (isset($_SESSION['message'])) { //Verficamos si la session posee mensajes para mostrar ?>
        <!-- Mensaje a mostrar -->
        <div style="font-size: 12px;" class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
            <?php $alerta =  $_SESSION['parameter'/*'message_type'*/]; /*$alerta = ucfirst($alerta);*/ ?>
            <strong><?= $alerta ?>:</strong> <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    </div>
    <!-- Fin del mensaje -->
    <?php session_unset(); /* Elimina el mensaje para no volverlo a mostrar si ya ha sido cerrado*/ }; ?>
</body>

</html>