-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-04-2024 a las 19:22:07
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bc_agricultura_sv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentabancaria`
--

DROP TABLE IF EXISTS `cuentabancaria`;
CREATE TABLE IF NOT EXISTS `cuentabancaria` (
  `ID_Cuenta` char(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `DUI_Usuario` char(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `Saldo` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_Cuenta`),
  KEY `fk_CuentaBancaria_Usuario` (`DUI_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `cuentabancaria`
--

INSERT INTO `cuentabancaria` (`ID_Cuenta`, `DUI_Usuario`, `Saldo`) VALUES
('183745926', '096100543', '1500.00'),
('255704137', '075862001', '200.00'),
('294117830', '862453104', '0.00'),
('299647103', '085237013', '0.00'),
('395441020', '400782041', '471.20'),
('410879620', '790085177', '0.00'),
('426937815', '456322217', '2200.00'),
('543587553', '625893331', '0.00'),
('572916438', '100523488', '2000.00'),
('583831206', '017687994', '20.00'),
('635421325', '017687994', '32.00'),
('638495721', '017687994', '67.05'),
('684100035', '258004367', '231.00'),
('784349029', '109744453', '0.00'),
('819365247', '096100543', '1800.00'),
('876592812', '209994101', '0.00'),
('990530214', '239411165', '0.00'),
('997299141', '100005423', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `ID` char(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `ID_Persona` int NOT NULL,
  `ID_Rol` int NOT NULL,
  `Estado` enum('Activo','Inactivo') CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `ID_Sucursal` char(6) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Empleado_Persona` (`ID_Persona`),
  KEY `fk_Empleado_Rol` (`ID_Rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID`, `ID_Persona`, `ID_Rol`, `Estado`, `ID_Sucursal`) VALUES
('ADC654321987', 4, 4, 'Activo', 'SUC456'),
('ASA321654987', 5, 5, 'Activo', 'SUC567'),
('CAJ987654321', 2, 2, 'Activo', 'SUC234'),
('CON456789123', 3, 3, 'Activo', 'SUC345'),
('GEG123456789', 1, 1, 'Activo', 'SUC123'),
('GES562311052', 6, 6, 'Activo', 'SUC678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientosbancarios`
--

DROP TABLE IF EXISTS `movimientosbancarios`;
CREATE TABLE IF NOT EXISTS `movimientosbancarios` (
  `ID` char(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `ID_Tipo` int DEFAULT NULL,
  `ID_cuenta_origen` char(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `ID_cuenta_destino` char(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `Fecha` datetime NOT NULL,
  `Monto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_MovimientosBancarios_CuentaBancaria_Origen` (`ID_cuenta_origen`),
  KEY `fk_MovimientosBancarios_CuentaBancaria_Destino` (`ID_cuenta_destino`),
  KEY `fk_MovimientosBancarios_TipoTransaccion` (`ID_Tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `movimientosbancarios`
--

INSERT INTO `movimientosbancarios` (`ID`, `ID_Tipo`, `ID_cuenta_origen`, `ID_cuenta_destino`, `Fecha`, `Monto`) VALUES
('000001', 1, NULL, '819365247', '2024-01-22 14:48:11', '500.00'),
('000002', 2, '183745926', NULL, '2024-03-16 10:49:11', '300.00'),
('000003', 3, '572916438', '426937815', '2024-02-07 09:10:53', '100.00'),
('000004', 1, NULL, '819365247', '2024-03-16 10:49:11', '800.00'),
('000005', 2, '572916438', NULL, '2024-03-16 10:49:11', '200.00'),
('000006', 1, NULL, '426937815', '2019-11-06 15:07:41', '30.00'),
('000007', 1, NULL, '426937815', '2021-04-28 10:42:02', '52.00'),
('000008', 2, '426937815', NULL, '2019-12-21 09:32:11', '12.00'),
('000009', 3, '426937815', '572916438', '2020-01-16 11:32:00', '17.95'),
('000010', 3, '684100035', '426937815', '2020-02-14 23:11:11', '26.00'),
('000011', 2, '426937815', NULL, '2020-03-28 12:56:07', '20.00'),
('000012', 1, NULL, '638495721', '2019-11-06 15:07:41', '30.00'),
('000013', 1, NULL, '638495721', '2021-04-28 10:42:02', '52.00'),
('000014', 2, '638495721', NULL, '2019-12-21 09:32:11', '12.00'),
('000015', 3, '638495721', '572916438', '2020-01-16 11:32:00', '17.95'),
('000016', 3, '684100035', '638495721', '2024-02-14 23:11:11', '26.00'),
('000017', 2, '638495721', NULL, '2020-03-28 12:56:07', '20.00'),
('000018', 1, NULL, '583831206', '2021-11-06 15:07:41', '30.00'),
('000019', 1, NULL, '583831206', '2022-04-28 10:42:02', '52.00'),
('000020', 2, '583831206', NULL, '2022-12-21 09:32:11', '12.00'),
('000021', 3, '183745926', '583831206', '2023-01-16 11:32:00', '17.95'),
('000022', 3, '583831206', '819365247', '2023-02-14 23:11:11', '26.00'),
('000023', 2, '583831206', NULL, '2023-03-28 12:56:07', '20.00'),
('000024', 1, NULL, '635421325', '2021-10-06 15:07:41', '30.00'),
('000025', 1, NULL, '635421325', '2022-02-28 10:42:02', '52.00'),
('000026', 2, '635421325', NULL, '2022-11-21 09:32:11', '12.00'),
('000027', 3, '684100035', '635421325', '2023-02-16 11:32:00', '17.95'),
('000028', 3, '635421325', '183745926', '2023-03-14 23:11:11', '26.00'),
('000029', 2, '635421325', NULL, '2023-03-28 12:56:07', '20.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PrimerNombre` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `SegundoNombre` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `PrimerApellido` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `SegundoApellido` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Direccion` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `DUI` char(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ID`, `PrimerNombre`, `SegundoNombre`, `PrimerApellido`, `SegundoApellido`, `Direccion`, `DUI`) VALUES
(1, 'Juan', 'Carlos', 'Pérez', 'Gómez', 'Avenida Principal #123', '123456789'),
(2, 'María', 'Elena', 'Rodríguez', 'Martínez', 'Calle Secundaria #456', '987654321'),
(3, 'Pedro', 'Antonio', 'López', 'Hernández', 'Calle Central #789', '456789123'),
(4, 'Ana', 'Isabel', 'García', 'Fernández', 'Avenida Norte #246', '654321987'),
(5, 'Luis', 'Alberto', 'Díaz', 'Sánchez', 'Calle Este #135', '321654987'),
(6, 'Elena', 'Marcela', 'Hernández', 'Carrillo', 'Avenida Norte #2', '562311052'),
(7, 'Oscar', 'Ernesto', 'Lumes', 'Carranza', 'Avenida Raúl Contreras #781', '096100543'),
(8, 'Federico', 'Daniel', 'Cortez', 'Menjivar', 'Avenida San Francisco #12', '100523488'),
(9, 'Ileana', 'Guadalupe', 'Díaz', 'Sosa', 'Avenida Romero Oeste #45', '456322217'),
(10, 'Oscar', 'Darío', 'Gutiérrez', 'Bram', 'BO ESCALÓN, AV. AGUILARES, LOCAL #4', '017687994'),
(11, 'Daniel', 'Armando', 'Osegueda', 'Mendoza', 'Barrio Concepción, Cedros verdes 3, CL PPAL, #142', '075862001'),
(12, 'Francisco', 'Ernesto', 'Calderon', 'Valladares', 'Prados de Venecia, COL Villanueva, CL PPAL, POL 3, #122', '400782041'),
(13, 'Oswaldo', 'Narciso', 'Orellana', 'Waldemar', 'Barrio Menjívar Fuentes, Av. Sur, PSJ 3, #7', '085237013'),
(14, 'Rolando', 'Izmael', 'Portillo', 'López', 'Bosques de la Escalón, CL PPAL, PSJ 8, Condominio Crown View, #72', '258004367'),
(15, 'José', 'Alexander', 'Medina', 'Urquilla', '4° Av. Raúl y Cardoza, CL La Palmas, #11', '209994101'),
(16, 'Emerson', 'Ernesto', 'Flores', 'Sandoval', 'Av. Los Pinos, PSJ 12, POL 1, #16', '790085177'),
(17, 'Natanael', 'Alexis', 'Guardado', 'Recinos', 'BO San Nicolás, COL Fuentes 2, #10', '239411165'),
(18, 'Sophia', 'Natalia', 'Herrera', 'Maite', 'Col. Miramontes 3 casa 58 -F pasaje #2', '109744453'),
(19, 'Oscar', 'Alfredo', 'Maldonado', 'Arriaga', 'pasaje salinitas #2', '862453104'),
(20, 'Mauricio', 'Josue', 'Escalón', 'Duarte', 'Primera y ultima avenida Raúl Contreras #15', '625893331'),
(21, 'Alba', 'Irene', 'Bonilla', 'Solis', 'COL. FUENTES, PSJ 16, POL 1, #4', '100005423');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `préstamo`
--

DROP TABLE IF EXISTS `préstamo`;
CREATE TABLE IF NOT EXISTS `préstamo` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `DUI_Usuario` char(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Monto` decimal(10,2) NOT NULL,
  `TasaInteres` decimal(10,2) NOT NULL,
  `Estado` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `FechaSolicitud` datetime NOT NULL,
  `CuotaMensual` decimal(10,2) NOT NULL,
  `PlazoPago` date NOT NULL,
  `ID_Solicitud` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Préstamo_Usuario` (`DUI_Usuario`),
  KEY `fk_Préstamo_Solicitud` (`ID_Solicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `préstamo`
--

INSERT INTO `préstamo` (`ID`, `DUI_Usuario`, `Monto`, `TasaInteres`, `Estado`, `FechaSolicitud`, `CuotaMensual`, `PlazoPago`, `ID_Solicitud`) VALUES
(6, '096100543', '5000.00', '0.08', 'Espera', '2024-03-16 09:06:13', '450.00', '2025-03-16', 1),
(7, '100523488', '3000.00', '0.06', 'Rechazado', '2024-03-10 11:23:12', '88.33', '2027-03-10', 2),
(8, '456322217', '4000.00', '0.07', 'Rechazado', '2024-03-14 13:18:14', '178.33', '2026-03-14', 3),
(9, '096100543', '6000.00', '0.09', 'Rechazado', '2024-03-14 17:12:09', '136.25', '2028-03-14', 4),
(10, '100523488', '7000.00', '0.10', 'Aprobado', '2024-03-15 15:57:23', '106.94', '2030-04-16', 5),
(11, '017687994', '79000.00', '0.12', 'Espera', '2024-03-29 14:42:55', '1800.00', '2045-03-29', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Rol` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID`, `Rol`) VALUES
(1, 'Gerente General'),
(2, 'Cajero'),
(3, 'Contador'),
(4, 'Dependiente del banco'),
(5, 'Asistente administrativo'),
(6, 'Gerente Sucursal'),
(7, 'Cliente'),
(8, 'Personal de limpieza'),
(9, 'Secretari@s/Recepcionistas'),
(10, 'Asistente administrativo'),
(11, 'Asesor Financiero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE IF NOT EXISTS `solicitud` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Asunto` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Contenido` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `ArgumentoDenegado` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `FechaAprobacionRechazo` datetime DEFAULT NULL,
  `ID_Empleado` char(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Solicitud_Empleado` (`ID_Empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`ID`, `Asunto`, `Contenido`, `ArgumentoDenegado`, `FechaAprobacionRechazo`, `ID_Empleado`) VALUES
(1, 'Solicitud de préstamo', 'Solicitud de préstamo por emergencia médica.', NULL, NULL, 'CAJ987654321'),
(2, 'Solicitud de préstamo', 'Solicitud de préstamo para invertir en educación.', 'Esa Escuela no existe.', '2024-03-13 13:30:07', 'CAJ987654321'),
(3, 'Solicitud de préstamo', 'Solicitud de préstamo para compra de vehículo.', 'Vehiculo no cuenta con papeles legales.', '2024-03-16 10:37:02', 'CAJ987654321'),
(4, 'Solicitud de préstamo', 'Solicitud de préstamo para remodelación de vivienda.', 'Dueño de terrenos con credenciales falsificadas y no esta registrado en hacienda.', '2024-03-16 10:47:22', 'CAJ987654321'),
(5, 'Solicitud de préstamo', 'Solicitud de préstamo para gastos médicos.', NULL, '2024-03-16 10:50:16', 'CAJ987654321'),
(6, 'Solicitud de préstamo', 'Solicitud de prestamos para compra de vivienda.', NULL, NULL, 'CAJ987654321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `ID` char(7) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Direccion` varchar(110) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `ID_Empleado` char(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Sucursal_Empleado` (`ID_Empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`ID`, `Nombre`, `Direccion`, `ID_Empleado`) VALUES
('SUC123', 'Sucursal Principal', 'Avenida Libertad #789', 'GEG123456789'),
('SUC234', 'Sucursal Central', 'Calle Independencia #456', 'CAJ987654321'),
('SUC345', 'Sucursal Norte', 'Avenida Reforma #123', 'CON456789123'),
('SUC456', 'Sucursal Sur', 'Calle Principe #246', 'ADC654321987'),
('SUC567', 'Sucursal Este', 'Avenida Universidad #789', 'ASA321654987'),
('SUC678', 'Sucursal Este 2', 'Avenida Don RUA #789', 'GES562311052');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotransaccion`
--

DROP TABLE IF EXISTS `tipotransaccion`;
CREATE TABLE IF NOT EXISTS `tipotransaccion` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tipotransaccion`
--

INSERT INTO `tipotransaccion` (`ID`, `Nombre`) VALUES
(1, 'Depósito'),
(2, 'Retiro'),
(3, 'Transferencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `DUI` char(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `ID_Persona` int NOT NULL,
  `Sueldo` decimal(10,2) NOT NULL,
  `Correo` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Contrasenia` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Verificado` enum('Si','No') CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `EstadoUsuario` enum('Activo','Inactivo') CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`DUI`),
  KEY `fk_Usuario_Persona` (`ID_Persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`DUI`, `ID_Persona`, `Sueldo`, `Correo`, `Contrasenia`, `Verificado`, `EstadoUsuario`) VALUES
('017687994', 10, '155.00', 'dariogutierres@example.com', 'contra123', 'Si', 'Activo'),
('075862001', 11, '685.00', 'dany.oz64@example.com', 'contra123', 'Si', 'Activo'),
('085237013', 13, '675.00', 'narcizorella@example.com', 'contra123', 'Si', 'Activo'),
('096100543', 7, '2800.00', 'oscar@example.com', 'contraseña123', 'Si', 'Activo'),
('100005423', 21, '958.00', 'albasolis@example.com', 'Contra123_', 'Si', 'Activo'),
('100523488', 8, '2700.00', 'fedecor@example.com', 'contraseña456', 'Si', 'Activo'),
('109744453', 18, '365.00', 'sophia.nat@example.com', 'contra123', 'Si', 'Activo'),
('123456789', 1, '2500.00', 'juan@example.com', 'Contra123_', 'Si', 'Activo'),
('209994101', 15, '385.00', 'chepeurquilla@example.com', 'contra123', 'Si', 'Activo'),
('239411165', 17, '2500.00', 'natarecinos96@example.com', 'contra123', 'Si', 'Activo'),
('258004367', 14, '4800.00', 'izmalopez1968@example.com', 'contra123', 'Si', 'Activo'),
('321654987', 5, '2400.00', 'luis@example.com', 'contraseña654', 'Si', 'Activo'),
('400782041', 12, '1200.00', 'francisc0cal73@example.com', 'contra123', 'Si', 'Activo'),
('456322217', 9, '2700.00', 'ilesosa@example.com', 'contraseña789', 'Si', 'Activo'),
('456789123', 3, '2200.00', 'pedro@example.com', 'contraseña789', 'Si', 'Activo'),
('562311052', 6, '2700.00', 'elecas@example.com', 'contraseña321', 'Si', 'Activo'),
('625893331', 20, '450.00', 'mausalarrue@example.com', 'contra123', 'Si', 'Activo'),
('654321987', 4, '2700.00', 'ana@example.com', 'contraseña987', 'Si', 'Activo'),
('790085177', 16, '345.00', 'emerso.sandoval@example.com', 'contra123', 'Si', 'Activo'),
('862453104', 19, '4800.00', 'oscararri@example.com', 'contra123', 'Si', 'Activo'),
('987654321', 2, '2000.00', 'maria@example.com', 'contraseña456', 'Si', 'Activo');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuentabancaria`
--
ALTER TABLE `cuentabancaria`
  ADD CONSTRAINT `fk_CuentaBancaria_Usuario` FOREIGN KEY (`DUI_Usuario`) REFERENCES `usuario` (`DUI`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_Empleado_Persona` FOREIGN KEY (`ID_Persona`) REFERENCES `persona` (`ID`),
  ADD CONSTRAINT `fk_Empleado_Rol` FOREIGN KEY (`ID_Rol`) REFERENCES `rol` (`ID`);

--
-- Filtros para la tabla `movimientosbancarios`
--
ALTER TABLE `movimientosbancarios`
  ADD CONSTRAINT `fk_MovimientosBancarios_CuentaBancaria_Destino` FOREIGN KEY (`ID_cuenta_destino`) REFERENCES `cuentabancaria` (`ID_Cuenta`),
  ADD CONSTRAINT `fk_MovimientosBancarios_CuentaBancaria_Origen` FOREIGN KEY (`ID_cuenta_origen`) REFERENCES `cuentabancaria` (`ID_Cuenta`),
  ADD CONSTRAINT `fk_MovimientosBancarios_TipoTransaccion` FOREIGN KEY (`ID_Tipo`) REFERENCES `tipotransaccion` (`ID`);

--
-- Filtros para la tabla `préstamo`
--
ALTER TABLE `préstamo`
  ADD CONSTRAINT `fk_Préstamo_Solicitud` FOREIGN KEY (`ID_Solicitud`) REFERENCES `solicitud` (`ID`),
  ADD CONSTRAINT `fk_Préstamo_Usuario` FOREIGN KEY (`DUI_Usuario`) REFERENCES `usuario` (`DUI`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_Solicitud_Empleado` FOREIGN KEY (`ID_Empleado`) REFERENCES `empleado` (`ID`);

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `fk_Sucursal_Empleado` FOREIGN KEY (`ID_Empleado`) REFERENCES `empleado` (`ID`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Persona` FOREIGN KEY (`ID_Persona`) REFERENCES `persona` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
