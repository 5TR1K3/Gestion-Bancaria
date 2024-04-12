<?php

$sqlSolis = "SELECT COUNT(*) AS 'Total' FROM solicitud";
$solicitudes = $db->query($sqlSolis);
$cantSolis = $solicitudes->fetch_assoc();

$sqlMovimientos = "SELECT COUNT(*) AS 'Total' FROM movimientosbancarios";
$movimientos = $db->query($sqlMovimientos);
$cantMovi = $movimientos->fetch_assoc();

$sqlGerSuc = "SELECT COUNT(*) AS 'Total' FROM empleado WHERE ID_Rol = 6";
$gerSucursal = $db->query($sqlGerSuc);
$cantGerSuc = $gerSucursal->fetch_assoc();

$sqlSuc = "SELECT COUNT(*) AS 'Total' FROM sucursal";
$sucursales = $db->query($sqlSuc);
$cantSuc = $sucursales->fetch_assoc();

?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../../assets/css/style.header.css" />
    <link rel="stylesheet" href="../../assets/css/style.min.css" />
    <link rel="stylesheet" href="../../assets/css/normalize.css" />
    <link rel="stylesheet" href="../../assets/css/bootstrap-material-design.min.css" />
    <link rel="stylesheet" href="../../assets/css/all.css" />
    <link rel="stylesheet" href="../../assets/css/all.min.css" />
    <link rel="stylesheet" href="../../assets/css/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/css/fontawesome.min.css" />
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/bootstrap-material-design.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
</head>

<body>
    <?php include('../templates/header.php'); ?>
    <div class="full-box tile-container">

        <a href="#" class="tile">
            <div class="tile-tittle">Solicitudes</div>
            <div class="tile-icon">
                <i class="fa-solid fa-file-invoice"></i>
                <p><?php echo $cantSolis['Total']; ?> Registrados</p>
            </div>
        </a>

        <a href="#" class="tile">
            <div class="tile-tittle">Movimientos</div>
            <div class="tile-icon">
                <i class="fas fa-file-invoice-dollar fa-fw"></i>
                <p><?php echo $cantMovi['Total']; ?> Registrados</p>
            </div>
        </a>

        <a href="#" class="tile">
            <div class="tile-tittle">Gerentes</div>
            <div class="tile-icon">
                <i class="fas fa-user-secret fa-fw"></i>
                <p><?php echo $cantGerSuc['Total']; ?> Registrados</p>
            </div>
        </a>

        <a href="#" class="tile">
            <div class="tile-tittle">Empresa</div>
            <div class="tile-icon">
                <i class="fas fa-store-alt fa-fw"></i>
                <p><?php echo $cantSuc['Total']; ?> Registrados</p>
            </div>
        </a>

    </div>