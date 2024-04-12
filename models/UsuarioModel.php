<?php
session_start();
include('../conexion/db.php');
include('../utils/FuncionesGlobales.php');

if (isset($_POST['op'])) {

    $op = $_POST['op'];

    if ($op == 'iniciarsesion') {

        if (isset($_POST['correo']) && isset($_POST['clave'])) {

            $correo = $_POST['correo'];
            $clave = $_POST['clave'];

            $sql = "SELECT p.ID, p.DUI, p.PrimerNombre, p.SegundoNombre, p.PrimerApellido, p.SegundoApellido, u.Contrasenia, u.Verificado, u.EstadoUsuario, e.ID AS 'ID_Empleado', r.Rol, e.Estado, e.ID_Sucursal FROM empleado e JOIN persona p ON e.ID_Persona = p.ID JOIN usuario u ON p.ID = u.ID_Persona JOIN rol r ON e.ID_Rol = r.ID WHERE u.Correo = '$correo'";
            $result = $db->query($sql);

            if ($result->num_rows == 1) {
                $datos = $result->fetch_assoc();

                if ($clave == $datos['Contrasenia']) {

                    $_SESSION['id'] = $datos['ID'];
                    $_SESSION['nombre'] = $datos['PrimerNombre'] . ' ' . $datos['SegundoNombre'] . ' ' . $datos['PrimerApellido'] . ' ' . $datos['SegundoApellido'];
                    $_SESSION['rol'] = $datos['Rol'];
                    $_SESSION['dui'] = $datos['DUI'];
                    
                    $db->close();

                    header('Location: /Gestion-Bancaria/vistas/General/Inicio.php');
                } else {
                    
                    $db->close();

                    $_SESSION['parameter'] = 'Error';
                    $_SESSION['message'] = "Credenciales no validas.\nContraseña incorrecta. Vuelve a intentarlo o haz clic en \"¿Haz olvidado tu contraseña?\"";
                    $_SESSION['message_type'] = 'danger';

                    header("Location: /Gestion-Bancaria/index.php");
                }
                
            } else {
                $sql = "SELECT p.ID, p.DUI, p.PrimerNombre, p.SegundoNombre, p.PrimerApellido, p.SegundoApellido, u.Contrasenia, u.Verificado, u.EstadoUsuario FROM usuario u JOIN persona p ON u.ID_Persona = p.ID WHERE u.Correo = '$correo'";
                $result = $db->query($sql);

                if ($result->num_rows == 1) {
                    $datos = $result->fetch_assoc();

                    if ($clave == $datos['Contrasenia']) {

                        $_SESSION['id'] = $datos['ID'];
                        $_SESSION['nombre'] = $datos['PrimerNombre'] . ' ' . $datos['SegundoNombre'] . ' ' . $datos['PrimerApellido'] . ' ' . $datos['SegundoApellido'];
                        $_SESSION['dui'] = $datos['DUI'];
                        $_SESSION['rol'] = "Cliente";
                        
                        $db->close();

                        header('Location: /Gestion-Bancaria/vistas/General/Inicio.php');
                    } else {

                        $db->close();

                        $_SESSION['parameter'] = 'Error';
                        $_SESSION['message'] = "Credenciales no validas.\nContraseña incorrecta. Vuelve a intentarlo o haz clic en \"¿Haz olvidado tu contraseña?\"";
                        $_SESSION['message_type'] = 'danger';

                        header("Location: /Gestion-Bancaria/index.php");
                    }
                } else {

                    $db->close();

                    $_SESSION['parameter'] = 'Error';
                    $_SESSION['message'] = "Credenciales no validas.\nCorreo no registrado, vuelva a intentarlo o haz clic en \"Registrate\"";
                    $_SESSION['message_type'] = 'danger';

                    header("Location: /Gestion-Bancaria/index.php"); 
                }
            }
        } else {
            echo "Por favor, completa el formulario de inicio de sesión. (Raro que pase)";
        }
    }

    if ($op == 'registraruser') {
        
        //Validamos si el usuario completo el formulario de registro en línea
        if (isset($_POST['pnombre']) && isset($_POST['snombre']) && isset($_POST['papellido']) && isset($_POST['sapellido']) && isset($_POST['snombre']) && isset($_POST['direccion']) && isset($_POST['dui']) && isset($_POST['sueldo']) && isset($_POST['correo']) && isset($_POST['clave'])) {

            //asignamos parámetros a sus correspondientes variables
            $pnombre = $_POST['pnombre'];
            $snombre = $_POST['snombre'];
            $papellido = $_POST['papellido'];
            $sapellido = $_POST['sapellido'];
            $direccion = $_POST['direccion'];
            $dui = $_POST['dui'];
            
            //Verificamos si el usuario (con DUI y Correo) ya se encuentran registrados
            $sqlObtenerUsuario = "SELECT ID FROM persona WHERE DUI = '$dui'";
            $resultObtenerUser = $db->query($sqlObtenerUsuario);

            if ($resultObtenerUser->num_rows >= 1) {

                $db->close();

                $_SESSION['parameter'] = 'Información';
                $_SESSION['message'] = "El usuario ya se encuentra registrado.\nInicia sesion o haz clic en \"¿Haz olvidado tu contraseña?\".";
                $_SESSION['message_type'] = 'info';

                header("Location: /Gestion-Bancaria/index.php");
            } else {
                //-----------------------------------------------------------------------
                //Aplicamos formato de primera letra mayúscula para los nombres y apellidos
                $pnombre = mb_convert_case($pnombre, MB_CASE_TITLE, 'UTF-8');
                $snombre = mb_convert_case($snombre, MB_CASE_TITLE, 'UTF-8');
                $papellido = mb_convert_case($papellido, MB_CASE_TITLE, 'UTF-8');
                $sapellido = mb_convert_case($sapellido, MB_CASE_TITLE, 'UTF-8');
                //Aplicamos formato solo mayúscula para direcciones
                $direccion = mb_strtoupper($direccion, 'UTF-8');
                //registramos a la persona natural
                $sqlPersona = "INSERT INTO persona(PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido, Direccion, DUI) VALUES (?,?,?,?,?,?)";
                $sentenciaPersona = $db->prepare($sqlPersona);
                $sentenciaPersona->bind_param("ssssss", $pnombre, $snombre, $papellido, $sapellido, $direccion, $dui);
                $sentenciaPersona->execute();

                //Verificamos el registro
                //echo '<p style="margin: 15px 0;">Se inserto ' . $sentenciaPersona->affected_rows . ' persona.</p>';
                $sentenciaPersona->close();
                //-----------------------------------------------------------------------

                //-----------------------------------------------------------------------
                //Recuperamos el registro anteriormente insertado
                $sqlSelectPers = "SELECT ID FROM persona WHERE DUI = '$dui'";
                $resultSelectPers = $db->query($sqlSelectPers);
                $datosSelectPers = $resultSelectPers->fetch_assoc();

                //Obtenemos el ID
                //echo '<p style="margin: 15px 0;">Este es el ID de la persona registrada: ' . $datosSelectPers['ID'] . '</p>';

                //Almacenamos parámetros del POST anterior y el parámetro obtenido de la consulta
                $id = $datosSelectPers['ID'];
                $sueldo = $_POST['sueldo'];
                $correo = $_POST['correo'];
                $clave = $_POST['clave'];

                //Extra
                $verificado = 'Si';
                $estado = 'Activo';
                $saldo = 0;
                
                $resultSelectPers->close();

                //Realizamos nuevo registro para crear un usuario
                $sqlUser = "INSERT INTO usuario(DUI, ID_Persona, Sueldo, Correo, Contrasenia, Verificado, EstadoUsuario) VALUES (?,?,?,?,?,?,?)";
                $sentenciaUser = $db->prepare($sqlUser);
                $sentenciaUser->bind_param("sisssss", $dui, $id, $sueldo, $correo, $clave, $verificado, $estado);
                $sentenciaUser->execute();

                //Verificamos el registro
                //echo '<p style="margin: 15px 0;">Se inserto ' . $sentenciaUser->affected_rows . ' usuario</p>';
                $sentenciaUser->close();

                //echo '<p style="margin: 15px 0;">USUARIO CREADO SATISFACTORIAMENTE!</p>';
                //-----------------------------------------------------------------------

                //-----------------------------------------------------------------------
                //Procedemos a crear una cuenta que ira anexada al usuario, pero primero generaremos un ID Unico

                //1- Primero obtenermos todos números de cuenta existentes
                $sqlCuentasBanca = "SELECT ID_Cuenta FROM cuentabancaria";
                $resultCuentasBanca = $db->query($sqlCuentasBanca);

                $datosCuentasBanca = []; //Almacenaremos los datos acá

                while ($row = $resultCuentasBanca->fetch_assoc()) { //Ciclo para recorrer los datos obtenido y almacenarlos
                    $datosCuentasBanca[] = $row['ID_Cuenta'];
                }
                
                $resultCuentasBanca->close();

                //2- Proceso de creación de un nuevo ID
                $nuevoIdCuenta = generarNuevaCadena($datosCuentasBanca); //Almacenamos la cadena de 9 dígitos retornada de la función.

                //3- Registraremos la nueva cuenta para el usuario recién creado
                $sqlNuevaCuentaBancaria = "INSERT INTO cuentabancaria(ID_Cuenta, DUI_Usuario, Saldo) VALUES (?,?,?)";
                $sentenciaNuevaCuentaBancaria = $db->prepare($sqlNuevaCuentaBancaria);
                $sentenciaNuevaCuentaBancaria->bind_param("ssi", $nuevoIdCuenta, $dui, $saldo);
                $sentenciaNuevaCuentaBancaria->execute();

                //Verificamos el registro
                //echo '<p style="margin: 15px 0;">Se inserto ' . $sentenciaNuevaCuentaBancaria->affected_rows . ' nueva cuenta bancaria</p>';
                $sentenciaNuevaCuentaBancaria->close();

                //echo '<p style="margin: 15px 0;">CUENTA BANCARIA CREADA SATISFACTORIAMENTE!</p>';
                //-----------------------------------------------------------------------
                header('Location: /Gestion-Bancaria/vistas/General/exito-crearusuario.php');
            }
        }
    }

    if ($op == 'forgotpass') {

        if (isset($_POST['correo'])) {
            $correo = $_POST['correo'];

            $sql = "SELECT u.DUI, p.PrimerNombre, p.PrimerApellido FROM usuario u JOIN persona p ON u.ID_Persona = p.ID WHERE u.Correo = '$correo'";
            $result = $db->query($sql);

            if ($result->num_rows == 1) {
                $datos = $result->fetch_assoc();

                $_SESSION['dui'] = $datos['DUI'];
                $_SESSION['nombre'] = $datos['PrimerNombre'] . ' ' . $datos['PrimerApellido'];

                $db->close();

                header('Location: /Gestion-Bancaria/vistas/Usuario/reset-password.php');
            } else {
                
                $db->close();

                $_SESSION['parameter'] = 'Error';
                $_SESSION['message'] = "$correo\nNo se encuentra registrado.";
                $_SESSION['message_type'] = 'danger';

                header("Location: /Gestion-Bancaria/vistas/Usuario/forgot-password.php");
            }

        }
    }

    if ($op == 'resetpass') {

        if (isset($_POST['dui']) && isset($_POST['clave'])) {
            $dui = $_POST['dui'];
            $clave = $_POST['clave'];

            $sql = "UPDATE usuario SET Contrasenia = '$clave' WHERE DUI = '$dui'";
            $result = $db->query($sql);

            $filasAfectadas = $db->affected_rows;

            $db->close();

            if ($filasAfectadas >= 1) {
                header('Location: /Gestion-Bancaria/vistas/General/exito-password.php');
            } else {
                header("Location: /Gestion-Bancaria/vistas/Errores/error-password.php");
            }

        }
    }

    if ($op == 'updatecliente') {

        if (isset($_POST['pnombre']) && isset($_POST['snombre']) && isset($_POST['papellido']) && isset($_POST['sapellido']) && isset($_POST['direccion']) && isset($_POST['dui']) && isset($_POST['correo'])) {

            $dui = trim($_POST['dui']);
            $correo = trim($_POST['correo']);

            $pnombre = trim($_POST['pnombre']);
            $pnombre = mb_convert_case($pnombre, MB_CASE_TITLE, 'UTF-8');

            $snombre = trim($_POST['snombre']);
            $snombre = mb_convert_case($snombre, MB_CASE_TITLE, 'UTF-8');

            $papellido = trim($_POST['papellido']);
            $papellido = mb_convert_case($papellido, MB_CASE_TITLE, 'UTF-8');

            $sapellido = trim($_POST['sapellido']);
            $sapellido = mb_convert_case($sapellido, MB_CASE_TITLE, 'UTF-8');

            $direccion = trim($_POST['direccion']);
            $direccion = mb_strtoupper($direccion, 'UTF-8');

            $sql = "UPDATE persona SET PrimerNombre = '$pnombre', SegundoNombre = '$snombre', PrimerApellido = '$papellido', SegundoApellido = '$sapellido', Direccion = '$direccion' WHERE DUI = '$dui'";
            $result = $db->query($sql);

            $filasAfectadas = $db->affected_rows;

            if ($filasAfectadas >= 1) {
                $_SESSION['parameter'] = 'Exito';
                $_SESSION['message'] = "Usuario actualizado exitosamente.";
                $_SESSION['message_type'] = 'success';

                $db->close();

                header("Location: /Gestion-Bancaria/vistas/Usuario/Perfil.php");
            } else {
                $_SESSION['parameter'] = 'Error';
                $_SESSION['message'] = "Error al guardar lo cambios. Intentelo de nuevo.";
                $_SESSION['message_type'] = 'danger';

                $db->close();

                header("Location: /Gestion-Bancaria/vistas/Usuario/Perfil.php");
            }
        }
    }

} else if (isset($_GET['op'])) {

    $op = $_GET['op'];

    if ($op == 'logout') {
        session_unset();
        header('Location: /Gestion-Bancaria/index.php');
    }
}
