<?php

// session_start();
if (!empty($_POST["btningresar"])){
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
       $Usuario =$_POST["usuario"];
       $password =$_POST["password"];
       $Sql=$conexion ->query("select * from usuario where Correo ='$Usuario' and contrasenia='$password'");
       if($datos=$Sql->fetch_object()) {
        $_SESSION["Correo"]=$datos->Correo;
        
		
		
        header("location:mainPage.php");

		
       }else{
        echo "<div class='alert alert-danger'>Acceso denegado";
       }
    }else {
        echo "Campos vacios";
    }
}
?>