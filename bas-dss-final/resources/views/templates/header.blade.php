        <script>
            function actualizarReloj() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var respuesta = JSON.parse(this.responseText);
                        var hora = respuesta.datetime.split("T")[1].split(":");
                        var horas = hora[0];
                        var minutos = hora[1];
                        var segundos = hora[2].split(".")[0];

                        // Obtener la fecha actual
                        var fechaActual = new Date();
                        var dia = fechaActual.getDate();
                        var mes = fechaActual.getMonth() + 1; // Los meses van de 0 a 11, por eso se suma 1
                        var año = fechaActual.getFullYear();
                        var fechaFormateada = dia + "/" + mes + "/" + año;

                        document.getElementById("reloj").innerHTML = "Hora:&nbsp;&nbsp;&nbsp;" + horas + ":" + minutos + ":" + segundos + "&nbsp;&nbsp;|&nbsp;&nbsp;" + fechaFormateada;
                    }
                };
                xhttp.open("GET", "http://worldtimeapi.org/api/timezone/America/El_Salvador", true);
                xhttp.send();
            }
            setInterval(actualizarReloj, 1000);
        </script>
        <div class="barra">
            <div class="logo">
                <a href="../Usuario/Home.php">
                    <img class="img-fluid" src="../../assets/media/img/BAS.png" alt="logo">
                </a>
            </div>
            <div class="bienvenida">
                <div class="datos">
                    <?php
                    date_default_timezone_set('America/El_Salvador');
                    $hora_actual = date("H:i:s");
                    list($hora, $minutos, $segundos) = explode(":", $hora_actual);

                    $hora = intval($hora);
                    $minutos = intval($minutos);
                    $segundos = intval($segundos);

                    $saludo;

                    if ($hora >= 4 && $hora < 12) {
                        $saludo = "Buenos días";
                    } elseif ($hora == 12 && $minutos == 0 && $segundos == 0) {
                        $saludo = "Buenas tardes";
                    } elseif ($hora >= 12 && $hora < 18) {
                        $saludo = "Buenas tardes";
                    } elseif ($hora == 18 && $minutos <= 19 && $segundos <= 59) {
                        $saludo = "Buenas tardes";
                    } else {
                        $saludo = "Buenas noches";
                    }
                    ?>
                    <h5><b><?php echo $saludo; ?>,&nbsp;<?php echo $_SESSION['nombre'] ?></b></h5>
                    <div id="reloj"></div>
                </div>
            </div>
            <div class="control">
                <a class="profile" href="../Usuario/Perfil.php">
                    <i class='bx bxs-user-detail'></i>
                </a>
            </div>
            <div class="control">
                <a class="exit" href="../../models/UsuarioModel.php?op=logout">
                    <p>Salir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <i class='bx bx-exit'></i>
                </a>
            </div>
        </div>