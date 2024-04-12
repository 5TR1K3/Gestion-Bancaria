<?php
session_start();
include('../../conexion/db.php');
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAS | Inicio</title>
    <!-- General Styles -->
    <link rel="stylesheet" href="../../assets/css/style.header.css" />
</head>
<body>
	
	<!-- Main container -->
	<main class="full-box main-container">
		<?php
        include('../templates/header.php');
        include('menu.php');
        include('content/content.home.php');
        ?>
	</main>
    <?php include('footer-script.php');
include('../templates/footer.php');
?>