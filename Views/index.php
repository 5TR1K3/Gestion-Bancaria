<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" type="text/css" href="<//?php echo base_url; ?>Assets/css/main.css">
     Font-icon css
    <link rel="stylesheet" type="text/css" href="<//?php echo base_url; ?>Assets/css/font-awesome.min.css">-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="estiloLogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Iniciar | Sesión</title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>Bienvenido</h1>
        </div>
        <div class="login-box">
            <form method="post" action="" class="login-form" id="frmLogin" onsubmit="frmLogin(event);">
            <?php
            include "./Config/app/Conexion.php";
            include "./Controllers/LoginController.php";
            ?>
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Iniciar Sesión</h3>
                <div class="form-group">
                    <label class="control-label">USUARIO</label>
                    <input class="form-control" type="text" placeholder="Usuario" id="usuario" name="usuario" autofocus required>
                </div>
                <div class="form-group">
                    <label class="control-label">CONTRASEÑA</label>
                    <input class="form-control" type="password" placeholder="Contraseña" id="clave" name="password" required>
                </div>
                <div class="alert alert-danger d-none" role="alert" id="alerta">
                    
                </div>
                <div class="form-group btn-container">
                <input name="btningresar" class="btn" type="submit" value="INICIAR SESION">
                </div>
            </form>
        </div>
    </section>
    <!--Essential javascripts for application to work
    <script src="<//?php echo base_url; ?>Assets/js/jquery-3.6.0.min.js"></script>
    <script src="<//?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js"></script>
    <script src="<//?php echo base_url; ?>Assets/js/main.js"></script>
    The javascript plugin to display page loading on top
    <script src="<//?php echo base_url; ?>Assets/js/pace.min.js"></script>
    <script>
        const base_url = '<//?php echo base_url; ?>';
    </script>
    <script src="<//?php echo base_url; ?>Assets/js/login.js"></script>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>-->
</body>

</html>