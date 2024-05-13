        <!-- Nav lateral -->
        <section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
					<ul>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fa-solid fa-sack-dollar"></i> &nbsp; Cuentas &nbsp;&nbsp;&nbsp; <span class="item-count"><?php echo $cantCuentas['TotalCuentas']; $cuentas->close();?></span><i class="fas fa-chevron-down"></i></a>
							<ul>
								<?php

								$sqlSelectCuentas = "SELECT ID_Cuenta, Saldo FROM cuentabancaria WHERE DUI_Usuario = '$dui'";
								$selectCuentas = $db->query($sqlSelectCuentas);
								$_SESSION['idCuentasAll'] = '';

								while ($resultCuentas = $selectCuentas->fetch_assoc()) {
									$_SESSION['idCuentasAll'] .= $resultCuentas['ID_Cuenta'];
									echo "\n									<li>\n										<a href=\"cuenta.php?id=" . $resultCuentas['ID_Cuenta'] . "\"><i class=\"fa-solid fa-piggy-bank\"></i> &nbsp; " . $resultCuentas['ID_Cuenta'] . "</a>\n									</li>" ;
								}

								$selectCuentas->data_seek(0);
								?>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fa-solid fa-money-bill-transfer"></i> &nbsp; Movimientos <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="Depositos.php"><i class="fa-solid fa-right-to-bracket"></i> &nbsp; Depósitos</a>
								</li>
								<li>
									<a href="Transferencias.php"><i class="fa-solid fa-right-left"></i> &nbsp; Transferencias</a>
								</li>
								<li>
									<a href="Retiros.php"><i class="fa-solid fa-right-from-bracket"></i> &nbsp; Retiros</a>
								</li>
							</ul>
						</li>

						<li>
							<?php

							$sqlPrestamos = "SELECT COUNT(*) AS 'TotalSolicitudes' FROM solicitud s JOIN préstamo p ON s.ID = p.ID_Solicitud WHERE p.DUI_Usuario = '$dui'";
							$prestamos = $db->query($sqlPrestamos);
							$cantPrestamos = $prestamos->fetch_assoc();

							?>
							<a href="Prestamos.php?id=<?php echo $_SESSION['dui']; ?>"><i class="fas fa-file-invoice-dollar fa-fw"></i> &nbsp; Préstamos &nbsp;&nbsp;&nbsp; <span class="item-count"><?php echo $cantPrestamos['TotalSolicitudes']; $prestamos->close();?></span></a>
						</li>
					</ul>
				</nav>
			</div>
		</section>