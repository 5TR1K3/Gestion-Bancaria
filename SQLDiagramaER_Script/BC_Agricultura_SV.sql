/*Creacion de la base de datos*/
CREATE DATABASE BD_AGRICULTURA_SV;
USE BD_AGRICULTURA_SV;

/*DLL*/

/*Creacion de tablas*/
CREATE TABLE rolUsuarios(
PK_rolUsuario INT AUTO_INCREMENT PRIMARY KEY,
nombreRol VARCHAR(30) UNIQUE NOT NULL,
descripcionRol VARCHAR(80) NULL
);
CREATE TABLE sucursal(
PK_idSucursal INT AUTO_INCREMENT PRIMARY KEY,
ubicacionSucursal VARCHAR(80) UNIQUE NOT NULL,
telefonoSucursal VARCHAR(9) UNIQUE NOT NULL
);
CREATE TABLE usuarios(
PK_idUsuario VARCHAR(40) PRIMARY KEY,
nombre VARCHAR(50) NOT NULL,
apellido VARCHAR(50) NOT NULL,
correo VARCHAR(120) UNIQUE NOT NULL,
password_Usuario VARCHAR(50) NOT NULL,
estado_Usuarios BOOLEAN NOT NULL,
telefonoUsuario VARCHAR(9) UNIQUE NOT NULL,
sueldo DECIMAL(10,2) NOT NULL,
FK_idSucursal INT NOT NULL,
FK_rolUsuario INT NOT NULL
);
CREATE TABLE empleadosSucursal(
PK_idEmpleado INT AUTO_INCREMENT PRIMARY KEY,
RolAprobado BOOLEAN NOT NULL,
estadoEmpleado BOOLEAN NOT NULL,
FK_idUsuario VARCHAR(40) NOT NULL
);
CREATE TABLE tipoDeCuenta(
PK_idTipoDeCuenta INT AUTO_INCREMENT PRIMARY KEY,
descripcionTipoDeCuenta VARCHAR(100) UNIQUE NOT NULL 
);
CREATE TABLE cuentas(
PK_idCuenta VARCHAR(40) PRIMARY KEY,
fechaDeCreacion DATETIME NOT NULL,
saldoCuenta DECIMAL(10,2) NOT NULL,
FK_idtipoDeCuenta INT NOT NULL,
FK_idUsuario VARCHAR(40) NOT NULL
);
CREATE TABLE tipoMovimiento(
PK_idTipoMovimiento INT AUTO_INCREMENT PRIMARY KEY,
descripcionTipoMovimiento VARCHAR(60) UNIQUE NOT NULL
);
CREATE TABLE estadoMovimiento(
PK_idEstadoMovimiento INT AUTO_INCREMENT PRIMARY KEY,
descripcionEstadoMovimiento VARCHAR(60) UNIQUE NOT NULL
);
CREATE TABLE movimientos(
PK_idMovimiento INT AUTO_INCREMENT PRIMARY KEY,
fechaMovimiento DATETIME NOT NULL,
montoDelMovimiento DECIMAL(10,2) NOT NULL,
FK_idCuenta VARCHAR(40) NOT NULL,
FK_idTipoMovimiento INT NOT NULL,
FK_idEstadoMovimiento INT NOT NULL
);
/*Creacion de llaves foraneas*/
/* SINTAXIS
ALTER TABLE TablaSecundaria(HIJA)
ADD CONSTRAINT fk_BdPrimariaBdSecundaria
FOREIGN KEY (FK) REFERENCES TABLA(PK);
*/
ALTER TABLE usuarios
ADD CONSTRAINT fk_SucursalUsuarios
FOREIGN KEY (FK_idSucursal) REFERENCES sucursal(PK_idSucursal)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE usuarios
ADD CONSTRAINT fk_RolusuariosUsuarios
FOREIGN KEY (FK_rolUsuario) REFERENCES rolUsuarios(PK_rolUsuario)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE empleadosSucursal
ADD CONSTRAINT fk_UsuariosEmpleadossucursal
FOREIGN KEY (FK_idUsuario) REFERENCES usuarios(PK_idUsuario)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE cuentas
ADD CONSTRAINT fk_Usuarios_Cuentas
FOREIGN KEY (FK_idUsuario) REFERENCES usuarios(PK_idUsuario)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE cuentas
ADD CONSTRAINT fk_TipoDeCuenta_Cuentas
FOREIGN KEY (FK_idtipoDeCuenta) REFERENCES tipoDeCuenta(PK_idtipoDeCuenta);

ALTER TABLE movimientos
ADD CONSTRAINT fk_CuentaMovimientos
FOREIGN KEY (FK_idCuenta) REFERENCES cuentas(PK_idCuenta)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE movimientos
ADD CONSTRAINT fk_TipoDeMovimiento_Movimiento
FOREIGN KEY (FK_idTipoMovimiento) REFERENCES tipoMovimiento(PK_idTipoMovimiento)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE movimientos
ADD CONSTRAINT fk_EstadoMovimiento_Movimiento
FOREIGN KEY (FK_idEstadoMovimiento) REFERENCES estadoMovimiento(PK_idEstadoMovimiento)
ON DELETE CASCADE
ON UPDATE CASCADE;