<?php
session_start();
if (!isset($_SESSION['rol'])) header('Location: /Gestion-Bancaria/vistas/Errores/Error404.php');


switch ($_SESSION['rol']) {
    case 'Gerente General':
        header('Location: /Gestion-Bancaria/vistas/GerenteGeneral/Menu.php');
        break;
    case 'Gerente Sucursal':
        include('../templates/header.php');
        echo '<h1>Soy Gerente Sucursal</h1>';
        break;
    case 'Cajero':
        include('../templates/header.php');

        break;
    case 'Dependiente del banco':
        include('../templates/header.php');
        echo '<h1>Soy Dependiente</h1>';
        break;
    case 'Cliente':
        header('Location: /Gestion-Bancaria/vistas/Usuario/Home.php');
        break;

    default:
        echo "Variable no contemplada";
        break;
}
?>