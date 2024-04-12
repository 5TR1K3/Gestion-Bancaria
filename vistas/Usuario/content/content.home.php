		<section class="full-box page-content">
			<div class="container-fluid my-5">
				<h3>Resumen bancario</h3>
				<p>En esta sección se muestran sus cuentas bancarias y las cuales puede consultar sus movieminetos(depósitos, transacciones, retiros).</p>
				<div class="form-neon my-4">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12 col-md-6">
								<h4><i class="fa-solid fa-sack-dollar" style="color: var(--color-three);"></i><b> &nbsp; Cuentas Bancarias</b></h4>
								<p style="margin-left: 45px;"><?php echo $_SESSION['nombre']; ?></p>
							</div>
							<div class="col-12 col-md-6">
								<?php
								if ($selectCuentas->num_rows < 3) {
								?>
								<a href="../../models/CuentasBancoModels.php?op=NuevaCuentaBancaria" style="float: right;"><button type="button" class="btn btn-raised btn-info btn-sm"><i class="fa-solid fa-plus"></i> &nbsp;Nueva cuenta</button></a>	
								<?php
								}
								?>
							</div>
						</div>
					</div>
					
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">N° de Cuenta</th>
								<th scope="col">Saldo</th>
								<th scope="col">Ver</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$totalSaldo = 0.00;

							while ($resultCuentas = $selectCuentas->fetch_assoc()) {
								echo "\n									<tr>\n										<td>" . $resultCuentas['ID_Cuenta'] . "</td>\n									<td>" . $resultCuentas['Saldo'] . " USD</td>\n									<td><a href=\"Cuenta.php?id=" . $resultCuentas['ID_Cuenta'] . "\"><i style=\"font-size: 20px;\" class=\"fa-solid fa-eye\"></i></a></td>\n									</tr>" ;
								$totalSaldo += $resultCuentas['Saldo'];
							}

							$selectCuentas->close();
							?>
						</tbody>
					</table>
				</div>
				<div class="form-neon my-4">
					<h5><b>Saldo total en cuentas bancarias: <?php echo number_format($totalSaldo, 2); ?> USD</b></h5>
				</div>
			</div>
		</section>