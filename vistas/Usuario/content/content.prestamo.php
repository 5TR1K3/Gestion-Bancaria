<section class="full-box page-content">
    <div class="container-fluid my-5">
        <div class="form-neon my-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h4><b>Préstamos</b></h4>
                        <p>Consulta todas las solicitudes financieras tramitadas.</p>
                    </div>
                    <div class="col-12 col-md-6">
                    </div>
                    <?php
                    if (isset($_GET['id'])) {
                        $dui = $_GET['id'];

                        $sql = "SELECT s.*, p.* FROM solicitud s JOIN préstamo p ON s.ID = p.ID_Solicitud WHERE s.Asunto = 'Solicitud de préstamo' AND p.DUI_Usuario = '$dui' ORDER BY p.FechaSolicitud ASC";
                        $resultado = $db->query($sql);

                        if ($resultado->num_rows > 0) {
                            $datos = array();
                            while ($row = $resultado->fetch_assoc()) {
                                
                                $fechaSolicitud = date('Y-m-d H:i:s', strtotime($row['FechaSolicitud']));
                                $fechaPlazoPago = date('Y-m-d H:i:s', strtotime($row['PlazoPago']));
                                $fechaAproRecha = '';
                                if ($row['FechaAprobacionRechazo'] != NULL) {
                                    $fechaAproRecha = date('Y-m-d H:i:s', strtotime($row['FechaAprobacionRechazo']));
                                } else {
                                    $fechaAproRecha = 'No se ha revisado.';
                                }
                                $datos[] = array(
                                    $row['ID_Solicitud'],
                                    $row['Asunto'],
                                    $fechaSolicitud,
                                    $row['ID_Empleado'],
                                    $row['Monto'],
                                    $row['CuotaMensual'],
                                    $row['TasaInteres'],
                                    $fechaPlazoPago,
                                    $row['Estado'],
                                    $fechaAproRecha
                                );
                            }

                            $resultado->close();
                            ?>
                        </div>
                    </div>
                    <br>
                        <?php
                            // Mostrar DataTable con los datos
                            echo '<table id="tabla-prestamo" class="table table-hover">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>Referencia</th>';
                            echo '<th>Asunto</th>';
                            echo '<th>Fecha Generada</th>';
                            echo '<th>Código Empleado</th>';
                            echo '<th>Monto</th>';
                            echo '<th>Cuota Mensual</th>';
                            echo '<th>Cuota Tasa Interes</th>';
                            echo '<th>Plazo Pago</th>';
                            echo '<th>Estado</th>';
                            echo '<th>Fecha Aprobación/Rechazo</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            foreach ($datos as $dato) {
                                echo '<tr>';
                                foreach ($dato as $valor) {
                                    echo "<td>$valor</td>";
                                }
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            echo '</table>';
                        } else {
                            // Mostrar DataTable sin los datos
                            $datos[] = array(
                                $row['ID_Solicitud'] = '',
                                $row['Asunto'] = '',
                                $fechaSolicitud = '',
                                $row['ID_Empleado'] = '',
                                $row['Monto'],
                                $row['CuotaMensual'] = '',
                                $row['TasaInteres'] = '',
                                $fechaPlazoPago = '',
                                $row['Estado'] = '',
                                $fechaAproRecha = ''
                            );

                            echo '<table id="tabla-prestamo" class="display table table-hover">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>Referencia</th>';
                            echo '<th>Tipo</th>';
                            echo '<th>Cuenta Origen</th>';
                            echo '<th>Cuenta Destino</th>';
                            echo '<th>Fecha</th>';
                            echo '<th>Monto</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            foreach ($datos as $dato) {
                                echo '<tr>';
                                foreach ($dato as $valor) {
                                    echo "<td>$valor</td>";
                                }
                                echo '</tr>';
                            }
                            echo '</tr>';
                            echo '</tbody>';
                            echo '</table>';
                        }
                    } else {
                        echo 'Un error(Que raro)';
                    }
                ?>
            </div>
            <script>
                $(document).ready(function() {
                    var tablaPrestamos = new DataTable('#tabla-prestamo', {
                        searching: false,
                        scrollX: true,
                        language: {
                            "decimal": "",
                            "emptyTable": "No hay prestamos registrados",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                            "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                            "infoFiltered": "(filtrado de _MAX_ total entradas)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ entradas",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "zeroRecords": "No se encontraron registros coincidentes",
                            "paginate": {
                                "first": "Primero",
                                "last": "Último",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            },
                            "aria": {
                                "sortAscending": ": activar para ordenar la columna ascendente",
                                "sortDescending": ": activar para ordenar la columna descendente"
                            }
                        }
                    });
                });
            </script>
        </div>
    </div>
</section>