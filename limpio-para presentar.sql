-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2021 a las 19:25:51
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tutoria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `IdAct` int(20) NOT NULL,
  `Actividad` varchar(200) DEFAULT NULL,
  `Des` varchar(520) DEFAULT NULL,
  `Semestres` varchar(35) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`IdAct`, `Actividad`, `Des`, `Semestres`, `url`) VALUES
(32, 'taller', '', '', 'act/entrevistapdfpdf.pdf'),
(46, 'actividad', '', '', 'act/16401029seguro123pdf.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ayuda`
--

CREATE TABLE `ayuda` (
  `IdAyuda` int(11) NOT NULL,
  `Tipo` varchar(25) NOT NULL,
  `Materia` varchar(25) DEFAULT NULL,
  `Motivo` varchar(250) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ayuda`
--

INSERT INTO `ayuda` (`IdAyuda`, `Tipo`, `Materia`, `Motivo`, `Fecha`) VALUES
(1, '', NULL, '', '2021-11-25 22:30:23'),
(2, '', NULL, '', '2021-11-25 22:30:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambiartutor`
--

CREATE TABLE `cambiartutor` (
  `IdMensaje` int(11) NOT NULL,
  `IdTutorado` int(11) NOT NULL,
  `NombreTutorado` varchar(65) NOT NULL,
  `Mensaje` varchar(550) NOT NULL,
  `NombreTutor` varchar(50) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canalizacion`
--

CREATE TABLE `canalizacion` (
  `IdCanal` int(11) NOT NULL,
  `IdTutorado` int(11) NOT NULL,
  `Tipo` varchar(25) NOT NULL,
  `Comentarios` varchar(500) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `IdTutor` int(11) NOT NULL,
  `Respuesta` varchar(25) NOT NULL,
  `Materia` varchar(50) DEFAULT NULL,
  `HoraAtend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `canalizacion`
--

INSERT INTO `canalizacion` (`IdCanal`, `IdTutorado`, `Tipo`, `Comentarios`, `Fecha`, `IdTutor`, `Respuesta`, `Materia`, `HoraAtend`) VALUES
(122, 16401029, 'Psicologico', 'no me siento bien', '2021-11-24 10:04:48', 16401028, 'pendientes de respuesta', '', 0),
(128, 16401099, 'Asesorias Departamental', 'solicito asesoria de Base de datos', '2021-11-25 10:22:37', 16401027, 'respondida', '', 0),
(133, 20401011, 'Psicologico', 'porfa', '2021-11-26 10:17:24', 16401020, 'pendientes de respuesta', '', 0),
(134, 16401042, 'Asesorias Departamental', 'reprobe', '2021-11-26 12:32:55', 20402021, 'respondida', 'programacion', 0),
(135, 16401041, 'Asesorias de Ciencias Bas', 'reprobe timoteo', '2021-11-26 12:37:50', 20402020, 'respondida', 'ecuaciones diferenciales', 0),
(136, 16401040, 'Dudas', 'información de becas ', '2021-11-26 12:38:53', 20402020, 'respondida', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `descripction` varchar(500) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `IdTutorado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `title`, `descripction`, `url`, `type`, `IdTutorado`) VALUES
(34, 'entrevista1', '', 'files/16401029entrevista1.pdf', NULL, 16401029),
(35, 'ficha', '', 'files/16401026ficha.pdf', NULL, 16401026),
(37, 'entrevista 1', '', 'files/16401034entrevista-1.pdf', NULL, 16401034);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impact`
--

CREATE TABLE `impact` (
  `IdImp` int(11) NOT NULL,
  `IdTutorado` int(11) NOT NULL,
  `Psi` varchar(500) DEFAULT NULL,
  `AssDep` varchar(500) DEFAULT NULL,
  `AssBC` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `impact`
--

INSERT INTO `impact` (`IdImp`, `IdTutorado`, `Psi`, `AssDep`, `AssBC`) VALUES
(0, 0, NULL, NULL, NULL),
(9, 16401029, NULL, NULL, NULL),
(10, 16401042, NULL, NULL, NULL),
(11, 16401044, NULL, NULL, NULL),
(12, 16401040, NULL, NULL, NULL),
(13, 16401041, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `IdMsj` int(11) NOT NULL,
  `Remitente` varchar(11) NOT NULL,
  `IdDestino` int(11) NOT NULL,
  `Mensaje` varchar(500) NOT NULL,
  `Asunto` varchar(250) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`IdMsj`, `Remitente`, `IdDestino`, `Mensaje`, `Asunto`, `Fecha`) VALUES
(5, 'Tutor', 16401099, 'hola', '', '2021-11-25 10:19:55'),
(6, 'Tutor', 16401099, 'hola', '', '2021-11-25 10:20:04'),
(11, 'Tutor', 16401042, 'asesoria: diariamente en el UD13 13 a 14 horas', '', '2021-11-26 12:34:35'),
(12, 'Tutor', 16401040, 'esta disponible la beca de manutencion ', '', '2021-11-26 12:39:54'),
(13, 'Tutor', 16401041, 'hay asesoria en CB1 de 1-2.pm', '', '2021-11-26 12:40:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `activo` int(11) NOT NULL,
  `Idperiodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`activo`, `Idperiodo`) VALUES
(0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `IdReporte` int(11) NOT NULL,
  `IdTutorado` int(11) NOT NULL,
  `NombreTutorado` varchar(50) NOT NULL,
  `IdTutor` int(11) DEFAULT NULL,
  `Psicologia` int(11) NOT NULL,
  `Asesoria` int(11) NOT NULL,
  `Actividad` int(11) NOT NULL,
  `Conferencias` int(11) NOT NULL,
  `Talleres` int(11) NOT NULL,
  `Estatus` varchar(30) NOT NULL,
  `HoraSesionIndiv` int(11) NOT NULL,
  `HoraSesionGrup` int(11) NOT NULL,
  `EvaValor` int(11) NOT NULL,
  `EvalNivel` varchar(20) NOT NULL,
  `Acredito` int(11) NOT NULL,
  `Noacredito` int(11) NOT NULL,
  `Deserto` int(11) NOT NULL,
  `AcreditadoSegui` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`IdReporte`, `IdTutorado`, `NombreTutorado`, `IdTutor`, `Psicologia`, `Asesoria`, `Actividad`, `Conferencias`, `Talleres`, `Estatus`, `HoraSesionIndiv`, `HoraSesionGrup`, `EvaValor`, `EvalNivel`, `Acredito`, `Noacredito`, `Deserto`, `AcreditadoSegui`) VALUES
(0, 0, '', NULL, 0, 0, 0, 0, 0, 'Selecciona un estatus', 0, 0, 0, '0', 0, 0, 0, 0),
(1, 16401026, 'Luis Miguel', NULL, 0, 0, 0, 0, 0, 'Selecciona un estatus', 0, 0, 0, '0', 0, 0, 0, 0),
(3, 16401099, 'Jholaus Enrique Salazar Maldonado', NULL, 0, 0, 0, 0, 0, 'Selecciona un estatus', 0, 0, 0, '0', 0, 0, 0, 0),
(6, 16401029, 'Jose Luis Ramos Monreal', NULL, 0, 0, 0, 0, 0, 'Selecciona un estatus', 0, 0, 0, '0', 0, 0, 0, 0),
(8, 16401035, 'jose', NULL, 0, 0, 0, 0, 0, 'Selecciona un estatus', 0, 0, 0, '0', 0, 0, 0, 0),
(10, 16401040, 'Diego', NULL, 0, 0, 0, 0, 0, 'Selecciona un estatus', 0, 0, 0, '0', 0, 0, 0, 0),
(11, 16401041, 'Ximena', NULL, 0, 0, 0, 0, 0, 'Selecciona un estatus', 0, 0, 0, '0', 0, 0, 0, 0),
(12, 16401042, 'Carlos', NULL, 0, 0, 0, 0, 0, 'Selecciona un estatus', 0, 0, 0, '0', 0, 0, 0, 0),
(13, 16401044, 'Yareli', NULL, 0, 0, 0, 0, 0, 'Selecciona un estatus', 0, 0, 0, '0', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportefile`
--

CREATE TABLE `reportefile` (
  `Idreport` int(11) NOT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp(),
  `Periodo` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reportefile`
--

INSERT INTO `reportefile` (`Idreport`, `Fecha`, `Periodo`, `url`, `title`) VALUES
(10, '2021-11-25', '', 'repot/agosto-diciembre-2021.xlsx', 'agosto-diciembre 2021'),
(13, '2021-11-30', '', 'repot/agosto-dic-2020.xlsx', 'agosto-dic 2020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `IdTutor` int(11) NOT NULL,
  `NombreTutor` varchar(35) NOT NULL,
  `periodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`IdTutor`, `NombreTutor`, `periodo`) VALUES
(16401020, 'blanca ramirez', 0),
(16401027, 'Sergio Rivera Rios', 0),
(16401028, 'edgar valderama', 0),
(16402011, 'francisco', 0),
(20401010, 'mariza ramirez', 0),
(20401020, 'luis', 0),
(20401021, 'manel', 0),
(20402020, 'Jorge Montes Cáceres', 0),
(20402021, 'Max González González', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutorados`
--

CREATE TABLE `tutorados` (
  `IdTutorado` int(11) NOT NULL,
  `NombreTutorado` varchar(35) NOT NULL,
  `IdTutor` int(11) DEFAULT NULL,
  `Semestres` tinyint(4) NOT NULL,
  `Acceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tutorados`
--

INSERT INTO `tutorados` (`IdTutorado`, `NombreTutorado`, `IdTutor`, `Semestres`, `Acceso`) VALUES
(16401026, 'Luis Miguel', NULL, 9, 0),
(16401029, 'Jose Luis Ramos Monreal', NULL, 11, 0),
(16401035, 'jose', NULL, 6, 0),
(16401040, 'Diego', NULL, 9, 0),
(16401041, 'Ximena', NULL, 6, 0),
(16401042, 'Carlos', NULL, 1, 0),
(16401044, 'Yareli', NULL, 12, 0),
(16401099, 'Jholaus Enrique Salazar Maldonado', NULL, 2, 0),
(20401011, 'chuy', NULL, 10, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUser` int(11) NOT NULL,
  `Nombre` varchar(35) NOT NULL,
  `Password` varchar(18) NOT NULL,
  `TipoUser` varchar(35) NOT NULL,
  `cambio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUser`, `Nombre`, `Password`, `TipoUser`, `cambio`) VALUES
(16401020, 'blanca ramirez', 'br1234', '', 0),
(16401023, '', 'z1234', 'Jefe de departamento', 0),
(16401024, '', 'jm1234', 'Coordinador de Tutores', 0),
(16401026, 'Luis Miguel', 'lm1234', 'Alumno', 0),
(16401027, 'Sergio Rivera Rios', 's1234', '', 0),
(16401028, 'edgar valderama', 'e1234', '', 0),
(16401029, 'Jose Luis Ramos Monreal', 'jl1234', 'Alumno', 0),
(16401033, 'Jesus', '123456', 'Alumno', 1),
(16401034, 'manuel', 'm1234', 'Alumno', 0),
(16401035, 'jose', '123456', 'Alumno', 1),
(16401040, 'Diego', '1234', 'Alumno', 0),
(16401041, 'Ximena', '1234', 'Alumno', 0),
(16401042, 'Carlos', '1234', 'Alumno', 0),
(16401044, 'Yareli', '1234', 'Alumno', 0),
(16401099, 'Jholaus Enrique Salazar Maldonado', '1234', 'Alumno', 0),
(16402011, 'francisco', '123456', '', 1),
(20401010, 'mariza ramirez', '123456', '', 0),
(20401011, 'chuy', '123', 'Alumno', 0),
(20401020, 'luis', 'j1234', '', 0),
(20401021, 'manel', '123456', '', 1),
(20402020, 'Jorge Montes Cáceres', '123456', '', 0),
(20402021, 'Max González González', '123456', '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`IdAct`);

--
-- Indices de la tabla `ayuda`
--
ALTER TABLE `ayuda`
  ADD PRIMARY KEY (`IdAyuda`);

--
-- Indices de la tabla `cambiartutor`
--
ALTER TABLE `cambiartutor`
  ADD PRIMARY KEY (`IdMensaje`),
  ADD KEY `Cambiar-Tutorado` (`IdTutorado`);

--
-- Indices de la tabla `canalizacion`
--
ALTER TABLE `canalizacion`
  ADD PRIMARY KEY (`IdCanal`,`IdTutorado`),
  ADD KEY `Tutorado-Canalizacion` (`IdTutorado`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `impact`
--
ALTER TABLE `impact`
  ADD PRIMARY KEY (`IdImp`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`IdMsj`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`Idperiodo`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`IdReporte`);

--
-- Indices de la tabla `reportefile`
--
ALTER TABLE `reportefile`
  ADD PRIMARY KEY (`Idreport`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`IdTutor`);

--
-- Indices de la tabla `tutorados`
--
ALTER TABLE `tutorados`
  ADD PRIMARY KEY (`IdTutorado`),
  ADD KEY `Tutor-Tutorado` (`IdTutor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `IdAct` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `ayuda`
--
ALTER TABLE `ayuda`
  MODIFY `IdAyuda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cambiartutor`
--
ALTER TABLE `cambiartutor`
  MODIFY `IdMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `canalizacion`
--
ALTER TABLE `canalizacion`
  MODIFY `IdCanal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `impact`
--
ALTER TABLE `impact`
  MODIFY `IdImp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `IdMsj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `Idperiodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `IdReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `reportefile`
--
ALTER TABLE `reportefile`
  MODIFY `Idreport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cambiartutor`
--
ALTER TABLE `cambiartutor`
  ADD CONSTRAINT `Cambiar-Tutorado` FOREIGN KEY (`IdTutorado`) REFERENCES `tutorados` (`IdTutorado`);

--
-- Filtros para la tabla `canalizacion`
--
ALTER TABLE `canalizacion`
  ADD CONSTRAINT `Tutorado-Canalizacion` FOREIGN KEY (`IdTutorado`) REFERENCES `tutorados` (`IdTutorado`);

--
-- Filtros para la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `usuario-Tutor` FOREIGN KEY (`IdTutor`) REFERENCES `usuario` (`IdUser`);

--
-- Filtros para la tabla `tutorados`
--
ALTER TABLE `tutorados`
  ADD CONSTRAINT `Tutor-Tutorado` FOREIGN KEY (`IdTutor`) REFERENCES `tutor` (`IdTutor`),
  ADD CONSTRAINT `Tutorada-usuario` FOREIGN KEY (`IdTutorado`) REFERENCES `usuario` (`IdUser`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `TutorBaja` ON SCHEDULE EVERY 6 MONTH STARTS '2021-12-30 22:53:56' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE tutorados SET `IdTutor`= ""$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
