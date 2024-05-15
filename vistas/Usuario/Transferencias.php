<?php
session_start();
include('../../conexion/db.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAS | Movimientos</title>
    <!-- Bootstrap V5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- General Styles -->
    <link rel="stylesheet" href="../../assets/css/style.header.css" />
    <link rel="stylesheet" href="../../assets/css/style.min.css" />
    <!-- Normalize V8.0.1 -->
    <link rel="stylesheet" href="../../assets/css/normalize.css">
    <!-- Bootstrap Material Design V4.0 -->
    <link rel="stylesheet" href="../../assets/css/bootstrap-material-design.min.css">
    <!-- Font Awesome V6.1 -->
    <link rel="stylesheet" href="../../assets/css/all.css" />
    <link rel="stylesheet" href="../../assets/css/all.min.css" />
    <link rel="stylesheet" href="../../assets/css/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/css/fontawesome.min.css" />
    <!-- Sweet Alerts V8.13.0 CSS file -->
    <link rel="stylesheet" href="../../assets/css/sweetalert2.min.css">
    <!-- Sweet Alert V8.13.0 JS file-->
    <script src="../../assets/js/sweetalert2.min.js"></script>
    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <link rel="stylesheet" href="../../assets/css/jquery.mCustomScrollbar.css">
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
</head>

<body>
    <!-- Main container -->
    <main class="full-box main-container">
        <?php
        include('../templates/header.php');
        include('menu.php');
        include('content/content.transferencias.php');
        ?>
    </main>
    <?php include('footer-script.php');
include('../templates/footer.php');
?>

</body>

</html>