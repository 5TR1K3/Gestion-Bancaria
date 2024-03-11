START TRANSACTION;
/*Creacion de la base de datos*/
CREATE DATABASE bd_agricultura_sv;
USE bd_agricultura_sv;
/*DLL*/

/*Creacion de tablas*/
DROP TABLE IF EXISTS `rolUsuarios`;
CREATE TABLE IF NOT EXISTS `rolUsuarios` (
`PK_rolUsuario` INT NOT NULL AUTO_INCREMENT,
`nombreRol` VARCHAR(30) NOT NULL,
`descripcionRol` VARCHAR(80) NULL,
PRIMARY KEY (`PK_rolUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
`PK_idSucursal` INT NOT NULL AUTO_INCREMENT,
`ubicacionSucursal` VARCHAR(80) NOT NULL,
`telefonoSucursal` VARCHAR(9) NOT NULL,
PRIMARY KEY (`PK_idSucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
`PK_idUsuario` VARCHAR(40) NOT NULL,
`nombre` VARCHAR(50) NOT NULL,
`apellido` VARCHAR(50) NOT NULL,
`correo` VARCHAR(120) NOT NULL,
`password_Usuario` VARCHAR(50) NOT NULL,
`estado_Usuarios` BOOLEAN NOT NULL,
`telefonoUsuario` VARCHAR(9) NOT NULL,
`sueldo` DECIMAL(10,2) NOT NULL,
`FK_idSucursal` INT NOT NULL,
`FK_rolUsuario` INT NOT NULL,
PRIMARY KEY (`PK_idUsuario`),
KEY `FK_idSucursal` (`FK_idSucursal`),
KEY `FK_rolUsuario` (`FK_rolUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

DROP TABLE IF EXISTS `empleadosSucursal`;
CREATE TABLE IF NOT EXISTS `empleadosSucursal` (
`PK_idEmpleado` INT NOT NULL AUTO_INCREMENT,
`RolAprobado` BOOLEAN NOT NULL,
`estadoEmpleado` BOOLEAN NOT NULL,
`FK_idUsuario` VARCHAR(40) NOT NULL,
PRIMARY KEY (`PK_idEmpleado`),
KEY `FK_idUsuario` (`FK_idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

DROP TABLE IF EXISTS `tipoDeCuenta`;
CREATE TABLE IF NOT EXISTS `tipoDeCuenta` (
`PK_idTipoDeCuenta` INT NOT NULL AUTO_INCREMENT,
`descripcionTipoDeCuenta` VARCHAR(100) NOT NULL,
PRIMARY KEY (`PK_idTipoDeCuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

DROP TABLE IF EXISTS `cuentas`;
CREATE TABLE IF NOT EXISTS `cuentas` (
`PK_idCuenta` VARCHAR(40) NOT NULL,
`fechaDeCreacion` DATETIME NOT NULL,
`saldoCuenta` DECIMAL(10,2) NOT NULL,
`FK_idtipoDeCuenta` INT NOT NULL,
`FK_idUsuario` VARCHAR(40) NOT NULL,
PRIMARY KEY (`PK_idCuenta`),
KEY `FK_idtipoDeCuenta` (`FK_idtipoDeCuenta`),
KEY `FK_idUsuario` (`FK_idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

DROP TABLE IF EXISTS `tipoMovimiento`;
CREATE TABLE IF NOT EXISTS `tipoMovimiento` (
`PK_idTipoMovimiento` INT NOT NULL AUTO_INCREMENT,
`descripcionTipoMovimiento` VARCHAR(60) NOT NULL,
PRIMARY KEY (`PK_idTipoMovimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

DROP TABLE IF EXISTS `estadoMovimiento`;
CREATE TABLE IF NOT EXISTS `estadoMovimiento` (
`PK_idEstadoMovimiento` INT NOT NULL AUTO_INCREMENT,
`descripcionEstadoMovimiento` VARCHAR(60) NOT NULL,
PRIMARY KEY (`PK_idEstadoMovimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

DROP TABLE IF EXISTS `movimientos`;
CREATE TABLE IF NOT EXISTS `movimientos` (
`PK_idMovimiento` INT NOT NULL AUTO_INCREMENT,
`fechaMovimiento` DATETIME NOT NULL,
`montoDelMovimiento` DECIMAL(10,2) NOT NULL,
`FK_idCuenta` VARCHAR(40) NOT NULL,
`FK_idTipoMovimiento` INT NOT NULL,
`FK_idEstadoMovimiento` INT NOT NULL,
PRIMARY KEY (`PK_idMovimiento`),
KEY `FK_idCuenta` (`FK_idCuenta`),
KEY `FK_idTipoMovimiento` (`FK_idTipoMovimiento`),
KEY `FK_idEstadoMovimiento` (`FK_idEstadoMovimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*Creacion de llaves foraneas*/
/* SINTAXIS
ALTER TABLE TablaSecundaria(HIJA)
ADD CONSTRAINT fk_BdPrimariaBdSecundaria
FOREIGN KEY (FK) REFERENCES TABLA(PK);
*/
ALTER TABLE `usuarios`
ADD CONSTRAINT `fk_SucursalUsuarios`
FOREIGN KEY (`FK_idSucursal`) REFERENCES `sucursal` (`PK_idSucursal`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `usuarios`
ADD CONSTRAINT `fk_RolusuariosUsuarios`
FOREIGN KEY (`FK_rolUsuario`) REFERENCES `rolUsuarios` (`PK_rolUsuario`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `empleadosSucursal`
ADD CONSTRAINT `fk_UsuariosEmpleadossucursal`
FOREIGN KEY (`FK_idUsuario`) REFERENCES `usuarios` (`PK_idUsuario`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `cuentas`
ADD CONSTRAINT `fk_Usuarios_Cuentas`
FOREIGN KEY (`FK_idUsuario`) REFERENCES `usuarios` (`PK_idUsuario`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `cuentas`
ADD CONSTRAINT `fk_TipoDeCuenta_Cuentas`
FOREIGN KEY (`FK_idtipoDeCuenta`) REFERENCES `tipoDeCuenta` (`PK_idtipoDeCuenta`);

ALTER TABLE `movimientos`
ADD CONSTRAINT `fk_CuentaMovimientos`
FOREIGN KEY (`FK_idCuenta`) REFERENCES `cuentas` (`PK_idCuenta`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `movimientos`
ADD CONSTRAINT `fk_TipoDeMovimiento_Movimiento`
FOREIGN KEY (`FK_idTipoMovimiento`) REFERENCES `tipoMovimiento` (`PK_idTipoMovimiento`)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `movimientos`
ADD CONSTRAINT `fk_EstadoMovimiento_Movimiento`
FOREIGN KEY (`FK_idEstadoMovimiento`) REFERENCES `estadoMovimiento` (`PK_idEstadoMovimiento`)
ON DELETE CASCADE
ON UPDATE CASCADE;