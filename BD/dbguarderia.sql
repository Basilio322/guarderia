-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2023 a las 00:25:33
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbguarderia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `ruc` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `ruc`, `nombre`, `direccion`, `telefono`, `estado`) VALUES
(1, '7134726', 'Cliente Frecuente', 'Lima - Perú', '925491523', 1),
(2, '12345', 'Angel Sifuentes', 'Lima', '924517898', 1),
(3, '22222222', 'Angel Sifuentes', 'Lima', '921245789', 1),
(4, '99999', 'Cliente de prueba', 'editado', '92541456', 1),
(5, 'roberto', 'perez', 'asda', '213', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `total`, `estado`, `fecha`) VALUES
(1, '710.00', 1, '2020-11-01 10:24:21'),
(2, '88.00', 1, '2020-11-01 10:28:22'),
(3, '939.00', 1, '2020-11-01 10:31:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `ruc` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `razon` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `ruc`, `nombre`, `telefono`, `direccion`, `razon`) VALUES
(1, '71347267', 'Vida Informático', '925491523', 'Lima - Perú', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `producto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `producto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `doc_Id` int(11) NOT NULL,
  `doc_Nombres` varchar(50) NOT NULL,
  `doc_Paterno` varchar(50) NOT NULL,
  `doc_Materno` varchar(50) NOT NULL,
  `doc_Telefono` varchar(50) NOT NULL,
  `doc_Email` text NOT NULL,
  `doc_Direccion` text NOT NULL,
  `doc_Profesion` varchar(200) NOT NULL,
  `doc_instProv` varchar(250) NOT NULL,
  `s_Id` int(11) NOT NULL,
  `doc_Contrato` varchar(100) NOT NULL,
  `doc_Estado` varchar(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`doc_Id`, `doc_Nombres`, `doc_Paterno`, `doc_Materno`, `doc_Telefono`, `doc_Email`, `doc_Direccion`, `doc_Profesion`, `doc_instProv`, `s_Id`, `doc_Contrato`, `doc_Estado`) VALUES
(1, 'Juana', 'Mamani', 'Vargas', '44455487', 'juana@gmail,com', 'rosas Pampa', 'Lic. Educacion Parvularia', 'UPEA', 1, 'Voluntarios', '1'),
(2, 'Pedro', 'Perez', 'Pereira', '75548451', 'mar@gmail.com', 'su casa', 'Lic. Ciencias de la Educacion', 'INFOCAL', 2, 'Practicante', '1'),
(3, 'felipa', 'Rodriguez', 'Mendoza', '7745845', 'men@gmail.com', 'su casa', 'Lic. Ciencias de la Educacion', 'UPEA', 1, 'Practicante', '1'),
(9, 'Maria Jose', 'Vicuña', 'Sarmiento', '66544215', 'maria@gmail.com', 'rosas pampa', 'Tecnico en ciencias de la educacion', 'INFOCAL', 2, 'Voluntario', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `ins_Id` int(11) NOT NULL,
  `reg_Id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `ins_fecha` date NOT NULL,
  `s_Id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `id_Gestion` int(11) NOT NULL,
  `ins_Infantil` varchar(50) NOT NULL,
  `ins_estado` varchar(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`ins_Id`, `reg_Id`, `id`, `ins_fecha`, `s_Id`, `cat_id`, `id_Gestion`, `ins_Infantil`, `ins_estado`) VALUES
(13, 1, 1, '2022-12-05', 1, 1, 2, 'Don Bosquito', '1'),
(14, 2, 1, '2022-12-17', 1, 3, 1, 'Centrro Infantil Instituto Tecnológico Don Bosquit', '1'),
(15, 1, 1, '2022-12-19', 2, 3, 1, 'Centrro Infantil Instituto Tecnológico Don Bosquit', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensiones`
--

CREATE TABLE `pensiones` (
  `pen_id` int(11) NOT NULL,
  `ins_Id` int(11) NOT NULL,
  `pen_Fecha` date NOT NULL,
  `pen_PagoN` varchar(100) NOT NULL,
  `id_Gestion` int(11) NOT NULL,
  `pen_cuenta` varchar(11) NOT NULL,
  `pen_totalF` varchar(11) NOT NULL,
  `pen_Observacion` text NOT NULL,
  `pen_Estado` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pensiones`
--

INSERT INTO `pensiones` (`pen_id`, `ins_Id`, `pen_Fecha`, `pen_PagoN`, `id_Gestion`, `pen_cuenta`, `pen_totalF`, `pen_Observacion`, `pen_Estado`) VALUES
(1, 14, '2022-12-08', 'Diciembre', 1, '90', '110', 'le falta cancelar un monto total de 110 Bs', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `precio` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `cantidad`, `precio`, `estado`) VALUES
(1, '2580', 'Gaseosa', 799, '550.00', 0),
(2, '12345', 'frutas', 1630, '810.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regapoderado`
--

CREATE TABLE `regapoderado` (
  `apod_Id` int(11) NOT NULL,
  `reg_Id` int(11) NOT NULL,
  `apod_Nombres` varchar(100) NOT NULL,
  `apod_Paterno` varchar(100) NOT NULL,
  `apod_Materno` varchar(100) NOT NULL,
  `apod_Ci` varchar(15) NOT NULL,
  `apod_FechaNac` date NOT NULL,
  `apod_Parentesco` varchar(50) NOT NULL,
  `apod_Celular` varchar(15) NOT NULL,
  `apod_Direccion` text NOT NULL,
  `apod_ingresos` varchar(250) NOT NULL,
  `apod_Carrera` varchar(50) NOT NULL,
  `apod_Semestre` varchar(15) NOT NULL,
  `apod_Turno` varchar(15) NOT NULL,
  `apod_Estado` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `regapoderado`
--

INSERT INTO `regapoderado` (`apod_Id`, `reg_Id`, `apod_Nombres`, `apod_Paterno`, `apod_Materno`, `apod_Ci`, `apod_FechaNac`, `apod_Parentesco`, `apod_Celular`, `apod_Direccion`, `apod_ingresos`, `apod_Carrera`, `apod_Semestre`, `apod_Turno`, `apod_Estado`) VALUES
(1, 2, 'Jose', 'Ramirez', 'Senteno', '789457', '2014-10-07', '   Padre', '7777777', 'Villa Dolores', 'trabajo', '   Electricidad Industrial', '   Primer Semes', '   Mañana', '1'),
(2, 1, 'Maria Juana', 'Romero', 'Canqui', '7894554', '2012-10-10', '   Madre', '787878', 'Villa Exaltacion', 'asistente', '   Administracion de Empresas', '   primer Año', '   Tarde', '1'),
(3, 3, 'Sofia', 'Medron', 'Castillo', '7778787', '2008-06-03', 'Madre', '77777888', 'Santa Rosa', '', ' Sistemas Informáticos', ' Segundo Año', ' Mañana', '1'),
(4, 4, 'Jose Luis', 'Salasar', 'Sambriento', '5487962', '2006-02-23', 'Padre', '6665554', 'santiago I', 'Trabajador', 'Artes Gráficas', 'Quinto Semestre', 'Mañana', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regcontacto`
--

CREATE TABLE `regcontacto` (
  `con_Id` int(11) NOT NULL,
  `reg_Id` int(11) NOT NULL,
  `con_Nombres` varchar(50) NOT NULL,
  `con_Paterno` varchar(50) NOT NULL,
  `con_Materno` varchar(50) NOT NULL,
  `con_Ci` varchar(15) NOT NULL,
  `con_Celular` varchar(15) NOT NULL,
  `con_Parentesco` varchar(15) NOT NULL,
  `con_Direccion` text NOT NULL,
  `con_Estado` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `regcontacto`
--

INSERT INTO `regcontacto` (`con_Id`, `reg_Id`, `con_Nombres`, `con_Paterno`, `con_Materno`, `con_Ci`, `con_Celular`, `con_Parentesco`, `con_Direccion`, `con_Estado`) VALUES
(1, 1, 'Ricardo Francisco', 'Tapia', 'Castillo', '7879777', '7879454', ' Abuelo', 'Miraflores', '1'),
(2, 2, 'Wanda', 'Nara', 'Bustillos', '4478745', '7845484', ' Tia', 'Rio Seco', '1'),
(3, 3, 'Sofia', 'Medron', 'Castillo', '7745412', '789465412', 'Abuela', 'Santa Rosa', '1'),
(4, 4, 'Teodoro', 'Filipino', 'Medrano', '125648', '356558', 'Tia', 'Santigo II', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regninos`
--

CREATE TABLE `regninos` (
  `reg_Id` int(11) NOT NULL,
  `reg_Nombres` varchar(100) NOT NULL,
  `reg_Paterno` varchar(100) NOT NULL,
  `reg_Materno` varchar(100) NOT NULL,
  `reg_Genero` varchar(15) NOT NULL DEFAULT 'Masculino',
  `reg_FechaNac` date NOT NULL,
  `reg_estado` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `regninos`
--

INSERT INTO `regninos` (`reg_Id`, `reg_Nombres`, `reg_Paterno`, `reg_Materno`, `reg_Genero`, `reg_FechaNac`, `reg_estado`) VALUES
(1, 'Pedro Alfonso', 'Perez', 'Guzman', 'Masculino', '2021-10-05', '1'),
(2, 'Josefina Magali', 'Sarmiento', 'Sereno', 'Femenino', '2014-10-29', '1'),
(3, 'Rosa', 'Pereira', 'Casamiento', 'Femenino', '2022-06-21', '1'),
(4, 'rocio sambrano', 'salasar', 'medrano', 'Femenino', '2021-05-25', '1'),
(5, 'rodrigo', 'selalla', 'mendoza', 'Masculino', '2023-01-29', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `s_Id` int(11) NOT NULL,
  `s_nombre` varchar(50) NOT NULL,
  `s_descripcion` varchar(200) NOT NULL,
  `s_estado` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`s_Id`, `s_nombre`, `s_descripcion`, `s_estado`) VALUES
(1, 'nidito', '1 a 2 años', '1'),
(2, 'Pre infante', '2 a 3 años', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `correo`, `clave`, `rol`, `estado`) VALUES
(1, 'admin', 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Administrador', 1),
(2, 'naju', 'naju', 'naju@gmail.com', '3b4bb6dc4b5cd4785cede954ed18246fee7429e8cb77e2179e632a2651b52f52', 'Docente', 1),
(3, 'jaime', 'jaime', 'ja@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Administrador', 1),
(4, 'basilio', 'basilio', 'bas@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Docente', 1),
(5, 'admin2', 'admin2', 'admin2@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Docente', 1),
(6, 'admin3', 'admin3', 'admin@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Docente', 1),
(7, '', '', '', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'Administrador', 0),
(8, 'asd', 'admin4', 'ads@ad', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Docente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`doc_Id`),
  ADD KEY `s_Id` (`s_Id`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`ins_Id`),
  ADD KEY `s_Id` (`s_Id`),
  ADD KEY `reg_Id` (`reg_Id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_Gestion` (`id_Gestion`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indices de la tabla `pensiones`
--
ALTER TABLE `pensiones`
  ADD PRIMARY KEY (`pen_id`),
  ADD KEY `ins_Id` (`ins_Id`),
  ADD KEY `id_Gestion` (`id_Gestion`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `regapoderado`
--
ALTER TABLE `regapoderado`
  ADD PRIMARY KEY (`apod_Id`),
  ADD KEY `reg_Id` (`reg_Id`);

--
-- Indices de la tabla `regcontacto`
--
ALTER TABLE `regcontacto`
  ADD PRIMARY KEY (`con_Id`),
  ADD KEY `reg_Id` (`reg_Id`);

--
-- Indices de la tabla `regninos`
--
ALTER TABLE `regninos`
  ADD PRIMARY KEY (`reg_Id`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`s_Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `doc_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `ins_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pensiones`
--
ALTER TABLE `pensiones`
  MODIFY `pen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `regapoderado`
--
ALTER TABLE `regapoderado`
  MODIFY `apod_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `regcontacto`
--
ALTER TABLE `regcontacto`
  MODIFY `con_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `regninos`
--
ALTER TABLE `regninos`
  MODIFY `reg_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `s_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`s_Id`) REFERENCES `salas` (`s_Id`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`s_Id`) REFERENCES `salas` (`s_Id`),
  ADD CONSTRAINT `inscripcion_ibfk_2` FOREIGN KEY (`reg_Id`) REFERENCES `regninos` (`reg_Id`),
  ADD CONSTRAINT `inscripcion_ibfk_3` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `inscripcion_ibfk_4` FOREIGN KEY (`id_Gestion`) REFERENCES `gestion` (`id_Gestion`),
  ADD CONSTRAINT `inscripcion_ibfk_5` FOREIGN KEY (`cat_id`) REFERENCES `catpago` (`cat_id`);

--
-- Filtros para la tabla `pensiones`
--
ALTER TABLE `pensiones`
  ADD CONSTRAINT `pensiones_ibfk_1` FOREIGN KEY (`ins_Id`) REFERENCES `inscripcion` (`ins_Id`),
  ADD CONSTRAINT `pensiones_ibfk_3` FOREIGN KEY (`id_Gestion`) REFERENCES `gestion` (`id_Gestion`);

--
-- Filtros para la tabla `regapoderado`
--
ALTER TABLE `regapoderado`
  ADD CONSTRAINT `regapoderado_ibfk_1` FOREIGN KEY (`reg_Id`) REFERENCES `regninos` (`reg_Id`);

--
-- Filtros para la tabla `regcontacto`
--
ALTER TABLE `regcontacto`
  ADD CONSTRAINT `regcontacto_ibfk_1` FOREIGN KEY (`reg_Id`) REFERENCES `regninos` (`reg_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
