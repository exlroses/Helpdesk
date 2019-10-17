-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2019 a las 16:43:32
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbrequerimiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `idconsulta` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `problema` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_problema` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Pendiente',
  `solucion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_solucion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `modo_contacto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `condicion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`idconsulta`, `idusuario`, `problema`, `tipo_problema`, `estado`, `tipo_estado`, `solucion`, `tipo_solucion`, `modo_contacto`, `condicion`, `fecha_hora`) VALUES
(1, 2, 'Torno 1', 'Falta mantenimiento', 'Urgente', 'Ejecutado', 'Se hizo el mantenimento respectivo', '', 'Personal', '', '2019-07-31 19:33:41'),
(2, 51, 'comprensora', 'no arranca el motor', 'Urgente', 'En Proceso', '', '', '', '', '2019-07-29 16:47:08'),
(3, 2, 'Planos', 'No aprueba los planos correspondientes', 'Urgente', 'Pendiente', '', '', '', '', '2019-07-31 19:34:59'),
(27, 51, 'Fresadora', 'el eje no esta girando', 'Urgente', 'Pendiente', '', '', '', '', '2019-07-31 19:35:10'),
(28, 2, 'Torno 2', 'falta mantenimiento de fines', 'No urgente', 'Ejecutado', 'Compra de nuevo eje', '', 'Correo', '', '2019-07-23 00:58:00'),
(29, 2, 'Torno 3', 'falta mantenimiento de fines', 'Urgente', 'Ejecutado', 'se ha mandado', '', 'Personal', 'Anulado', '2019-07-31 19:35:48'),
(30, 2, 'Maquina 4', 'falta mantenimiento', 'No urgente', 'En Proceso', 'jjjjj', '', 'Correo', '', '2019-08-01 02:41:55'),
(31, 51, 'Fresadora 2m3', 'tiene fallas en el arranque', 'No urgente', 'Pendiente', '', '', '', '', '2019-08-01 18:45:01'),
(32, 52, 'Maquina 12', 'No esta etiquetando los productos', 'No urgente', 'Pendiente', '', '', '', '', '2019-08-01 18:50:14'),
(33, 52, 'Comprensora', 'No esta botando aire', 'Urgente', 'En Proceso', 'se revisara en el transcurso del dia', '', 'Personal', '', '2019-08-01 18:52:38'),
(34, 52, 'Impresora', 'no scanea los documentos', 'No urgente', 'Pendiente', '', '', '', '', '2019-08-07 21:52:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'Escritorio'),
(2, 'Requerimientos'),
(3, 'Concluidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `area` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `nombre`, `dni`, `area`, `email`, `cargo`, `login`, `clave`, `imagen`, `condicion`) VALUES
(1, 'Stive Palomar', '54673456', 'Sistemas', 'marvinj.isd@gmail.com', 'Administrador', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1564592702.jpg', 1),
(2, 'Alejandro Hernan', '49837263', 'Torno', 'alejandro.rrhh@gmail.com', 'Usuario', 'prueba', '655e786674d9d3e77bc05ed1de37b4b6bc89f788829f9f3c679e7687b410c89b', '1563338699.jpg', 1),
(51, 'Ernesto', '46237068', 'Matriceria', 'prueba@gmail.com', 'Usuario', 'prueba2', '92573009c9ed328bd9d47d7187e01eb0abe4b995fb6abe0724b4f53bed590264', '1563589657.jpg', 1),
(52, 'flabia', '46237068', 'Ensamblaje', 'prueba@gmail.com', 'Usuario', 'prueba3', 'a0189bc70472cd6aa7e91ec7d3842f6201adfa8ffb5fe9cc1db50070b11beadb', '1563589467.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(105, 2, 1),
(106, 2, 2),
(131, 1, 1),
(132, 1, 2),
(133, 1, 3),
(141, 51, 1),
(142, 51, 2),
(145, 52, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idconsulta`),
  ADD KEY `fk_consulta_usuarios_idx` (`idusuario`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `fk_usuario_permiso_usuarios_idx` (`idusuario`),
  ADD KEY `fk_usuario_permiso_permiso_idx` (`idpermiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idconsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_consulta_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD CONSTRAINT `fk_usuario_permiso_permiso` FOREIGN KEY (`idpermiso`) REFERENCES `permiso` (`idpermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permiso_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
