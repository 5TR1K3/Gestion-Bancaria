<section class="full-box page-content">
    <div class="container-fluid my-5">
        <div class="form-neon my-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h4><b>Retiros</b></h4>
                        <p>Historial de retiros realizados en sus cuentas bancarias.</p>
                    </div>
                    <div class="col-12 col-md-6">
                    </div>
                    <?php
                    if (isset($_SESSION['idCuentasAll'])) {
                        $cuentasAll = $_SESSION['idCuentasAll'];
                        $caracteres = str_split($cuentasAll);
                        $pCuenta = implode("", array_slice($caracteres, 0, 9));
                        $sCuenta = implode("", array_slice($caracteres, 9, 9));
                        $tCuenta = implode("", array_slice($caracteres, 18, 9));

                        $sql = "SELECT ID, ID_Tipo, ID_cuenta_origen, Fecha, Monto FROM movimientosbancarios WHERE ID_cuenta_origen IN ('$pCuenta','$sCuenta','$tCuenta') AND ID_Tipo = '2' ORDER BY Fecha ASC;";
                        $resultado = $db->query($sql);

                        if ($resultado->num_rows > 0) {
                            $datos = array();
                            while ($row = $resultado->fetch_assoc()) {
                                $tipo = 'Retiro';
                                $fecha = date('Y-m-d H:i:s', strtotime($row['Fecha']));
                                $datos[] = array(
                                    $row['ID'],
                                    $tipo,
                                    $row['ID_cuenta_origen'],
                                    $fecha,
                                    $row['Monto']
                                );
                            }

                            $resultado->close();

                            // Crear rango de meses desde la fecha más antigua hasta la fecha actual
                            $fechaMasAntigua = $datos[0][3];
                            $fechaActual = date('Y-m-d H:i:s');
                            $rangoMeses = array();
                            $fecha = new DateTime($fechaMasAntigua);
                            while ($fecha <= new DateTime($fechaActual)) {
                                $rangoMeses[] = $fecha->format('Y-m-d H:i:s');
                                $fecha->modify('+1 month');
                            }
                            ?>
                            <div class="col-12 col-md-4">
                                <?php
                                // Mostrar los filtros de fecha en el DataTable
                                echo '<select id="filtro-mes" class="form-select">';
                                foreach ($rangoMeses as $mes) {
                                    $mesFormat = date('F - Y', strtotime($mes));
                                    echo "<option value='$mes'>$mesFormat</option>";
                                }
                                echo '</select>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <br>
                        <?php
                            // Mostrar DataTable con los datos
                            echo '<table id="tabla-movimientos" class="table table-hover">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>Referencia</th>';
                            echo '<th>Tipo</th>';
                            echo '<th>Cuenta</th>';
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
                            echo '</tbody>';
                            echo '</table>';
                        } else {
                            // Mostrar DataTable sin los datos
                            $datos[] = array(
                                $row['ID'] = '',
                                $tipo = '',
                                $row['ID_cuenta_origen'] = '',
                                $fecha = '',
                                $row['Monto'] = ''
                            );

                            echo '<table id="tabla-movimientos" class="display table table-hover">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>Referencia</th>';
                            echo '<th>Tipo</th>';
                            echo '<th>Cuenta</th>';
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
                    var tablaMovimientos = new DataTable('#tabla-movimientos', {
                        searching: false,
                        language: {
                            "decimal": "",
                            "emptyTable": "No hay movimientos registrados",
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
                
                    $('#filtro-mes').on('change', function() {
                        var mesSeleccionado = $(this).val();
                        tablaMovimientos.column(4).search(mesSeleccionado).draw();
                    });
                });
            </script>
        </div>
    </div>
</section>