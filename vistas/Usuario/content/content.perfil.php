        <?php
        $sqlSelecInfoPer = "SELECT p.*, u.Correo FROM persona p JOIN usuario u ON p.ID = u.ID_Persona WHERE p.DUI = '$dui'";
        $selectInfoPer = $db->query($sqlSelecInfoPer);
        $infoPersona = $selectInfoPer->fetch_assoc();
        ?>
        <section class="full-box page-content">
            <div class="container-fluid my-5">
                <form action="../../models/UsuarioModel.php" class="form-neon" method="POST">
                    <input type="hidden" name="op" value="updatecliente">
                    <fieldset>
                        <legend><i class="fa-regular fa-address-card"></i> &nbsp; Información personal</legend>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="pnombre" class="bmd-label-floating">Primer nombre</label>
                                        <input type="text" pattern="[a-zA-zàèìòùÀÈÌÒÙäëïöüÄËÏÖÜáéíóúÁÉÍÓÚñÑ ]{1,70}" class="form-control" name="pnombre" id="pnombre" maxlength="70" value="<?php echo $infoPersona['PrimerNombre'] ?>">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="snombre" class="bmd-label-floating">Segundo nombre</label>
                                        <input type="text" pattern="[a-zA-zàèìòùÀÈÌÒÙäëïöüÄËÏÖÜáéíóúÁÉÍÓÚñÑ ]{1,70}" class="form-control" name="snombre" id="snombre" maxlength="70" value="<?php echo $infoPersona['SegundoNombre'] ?>">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="papellido" class="bmd-label-floating">Primer apellido</label>
                                        <input type="text" pattern="[a-zA-zàèìòùÀÈÌÒÙäëïöüÄËÏÖÜáéíóúÁÉÍÓÚñÑ ]{1,70}" class="form-control" name="papellido" id="papellido" maxlength="70" value="<?php echo $infoPersona['PrimerApellido'] ?>">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="sapellido" class="bmd-label-floating">Segundo apellido</label>
                                        <input type="text" pattern="[a-zA-zàèìòùÀÈÌÒÙäëïöüÄËÏÖÜáéíóúÁÉÍÓÚñÑ ]{1,70}" class="form-control" name="sapellido" id="sapellido" maxlength="70" value="<?php echo $infoPersona['SegundoApellido'] ?>">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="dui" class="bmd-label-floating">DUI</label>
                                        <input type="text" pattern="[0-9]{1,9}" class="form-control" name="dui" id="dui" maxlength="9" value="<?php echo $infoPersona['DUI'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="correo" class="bmd-label-floating">Correo</label>
                                        <input type="email" class="form-control" name="correo" id="correo" maxlength="70" value="<?php echo $infoPersona['Correo'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="direccion" class="bmd-label-floating">Dirección</label>
                                        <input type="text" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ .,;-_#]{1,190}" class="form-control" name="direccion" id="direccion" maxlength="200" value="<?php echo $infoPersona['Direccion'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['message'])) { //Verficamos si la session posee mensajes para mostrar ?>
                            <!-- Mensaje a mostrar -->
                            <div style="font-size: 12px;" class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                                <?php $alerta =  $_SESSION['parameter'/*'message_type'*/]; /*$alerta = ucfirst($alerta);*/ ?>
                                <strong><?= $alerta ?>:</strong> <?= $_SESSION['message'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        <?php unset($_SESSION['parameter']); unset($_SESSION['message']); unset($_SESSION['message_type']); /* Elimina el mensaje para no volverlo a mostrar si ya ha sido cerrado*/ }; ?>
                    </fieldset>
                    <br><br><br>
                    <p class="text-center" style="margin-top: 40px;">
                        <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
                    </p>
                </form>

            </div>
            <?php

            if ($_SESSION['rol'] != "Cliente") {
                include('content.empleado.php');
            }

            ?>
        </section>