<?php
session_start();
include('../conexion/db.php');
include('../utils/FuncionesGlobales.php');

if (isset($_POST['op'])) {

    $op = $_POST['op'];



} else if (isset($_GET['op'])) {

    $op = $_GET['op'];

    if ($op == 'NuevaCuentaBancaria') {

        if (isset($_SESSION['dui'])) {
            $dui = $_SESSION['dui'];
            $saldo = 0;

            //-----------------------------------------------------------------------
            //Procedemos a crear una cuenta que ira anexada al usuario, pero primero generaremos un ID Unico

            //1- Primero obtenermos todos los números de cuenta existentes
            $sqlIdCuentasBanca = "SELECT ID_Cuenta FROM cuentabancaria";
            $resultIdCuentasBanca = $db->query($sqlIdCuentasBanca);

            $datosIdCuentasBanca = []; //Almacenaremos los datos acá

            while ($row = $resultIdCuentasBanca->fetch_assoc()) { //Ciclo para recorrer los datos obtenido y almacenarlos
                $datosIdCuentasBanca[] = $row['ID_Cuenta'];
            }
                
            $resultIdCuentasBanca->close();

            //2- Proceso de creación de un nuevo ID
            $nuevoIdCuentaBanca = generarNuevaCadena($datosIdCuentasBanca); //Almacenamos la cadena de 9 dígitos retornada de la función.

            //3- Registraremos la nueva cuenta para el usuario recién creado
            $sqlNewCuentaBancaria = "INSERT INTO cuentabancaria(ID_Cuenta, DUI_Usuario, Saldo) VALUES (?,?,?)";
            $sentenceNewCuentaBancaria = $db->prepare($sqlNewCuentaBancaria);
            $sentenceNewCuentaBancaria->bind_param("ssi", $nuevoIdCuentaBanca, $dui, $saldo);
            $sentenceNewCuentaBancaria->execute();

            //Verificamos el registro
            //echo '<p style="margin: 15px 0;">Se inserto ' . $sentenceNewCuentaBancaria->affected_rows . ' nueva cuenta bancaria</p>';
            $sentenceNewCuentaBancaria->close();

            header('Location: /DSS02L/Banco/vistas/Usuario/Home.php');
        } else {
            header('Location: /DSS02L/Banco/vistas/General/formdui.php');
        }
    }
}
