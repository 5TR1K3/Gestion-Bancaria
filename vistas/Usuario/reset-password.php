<?php
session_start();
$dui;
$nombre;

if (!isset($_SESSION['dui']) && !isset($_SESSION['nombre'])) {
    header('Location: /DSS02L/Banco/vistas/Errores/error-password.php');
} else {
    $dui = $_SESSION['dui'];
    $nombre = $_SESSION['nombre'];
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Restablecer contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>

    <div class="wrapper">
        <form id="resetPasswordForm" action="../../models/UsuarioModel.php" method="POST">
            <input type="hidden" name="op" value="resetpass">
            <input type="hidden" name="dui" value="<?php echo $dui; ?>">
            <div class="title">
                <h2>Hola! <b><?php echo $nombre; ?></b></h2>
                <p style="text-align: center;">Ingresa tu nueva contraseña y no la compartas con nadie.</p>
            </div>
            <div class="input-box">
                <input id="clave" name="clave" type="password" placeholder="Nueva contraseña" required>
            </div>

            <div class="input-box">
                <input id="confirmacion" name="confirmacion" type="password" placeholder="Confirmar contraseña" required>
                <p id="message" style="text-align: center; margin: 15px 0 20px;"></p>
            </div>

            <button type="submit" class="btn btn-success">
                Restablecer
            </button>
        </form>
    </div>
    <?php session_unset(); ?>
    <script>
        // Obtener los elementos de los campos de contraseña y confirmación
        const claveInput = document.getElementById('clave');
        const confirmacionInput = document.getElementById('confirmacion');
        const message = document.getElementById('message');

        // Función para verificar si las contraseñas coinciden
        function checkPasswordMatch() {
            if (claveInput.value !== confirmacionInput.value) {
                message.textContent = 'Las contraseñas no coinciden';
                message.style.color = 'red';
            } else {
                message.textContent = 'Las contraseñas coinciden';
                message.style.color = 'green';
            }
        }

        // Evento de input para verificar la coincidencia de contraseñas
        claveInput.addEventListener('input', checkPasswordMatch);
        confirmacionInput.addEventListener('input', checkPasswordMatch);

        // Evento de envío del formulario
        document.getElementById('resetPasswordForm').addEventListener('submit', function(event) {
            if (claveInput.value !== confirmacionInput.value) {
                event.preventDefault(); // Prevenir el envío del formulario si las contraseñas no coinciden
            }
        });
    </script>
</body>

</html>