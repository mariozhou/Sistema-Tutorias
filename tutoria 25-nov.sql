-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 09:25:45
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
(32, 'taller', '', '', 'act/entrevistapdfpdf.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ayuda`
--

CREATE TABLE `ayuda` (
  `IdAyuda` int(11) NOT NULL,
  `IdTutorado` int(11) NOT NULL,
  `Tipo` varchar(25) NOT NULL,
  `Materia` varchar(25) DEFAULT NULL,
  `Motivo` varchar(250) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Volcado de datos para la tabla `cambiartutor`
--

INSERT INTO `cambiartutor` (`IdMensaje`, `IdTutorado`, `NombreTutorado`, `Mensaje`, `NombreTutor`, `Fecha`) VALUES
(23, 16401029, 'Jose Luis Ramos Monreal', 'no me cae bien este wey', 'edgar valderama', '2021-11-24 19:20:10');

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
  `Respuesta` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `canalizacion`
--

INSERT INTO `canalizacion` (`IdCanal`, `IdTutorado`, `Tipo`, `Comentarios`, `Fecha`, `IdTutor`, `Respuesta`) VALUES
(122, 16401029, 'Psicologico', 'no me siento bien', '2021-11-24 10:04:48', 16401028, 'pendientes de respuesta'),
(124, 16401029, 'Asesorias Departamental', 'reprobe jauregui ', '2021-11-24 19:19:41', 16401028, 'pendientes de respuesta'),
(126, 16401099, 'Inconveniente con maestro', 'sadasd', '2021-11-24 23:55:32', 16401027, 'respondida'),
(127, 16401099, 'Psicologico', 'asdasdasdas', '2021-11-25 00:43:06', 16401027, 'pendientes de respuesta');

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
(5, 'gh', 'gfh', 'files/eje-proyecto-invespdf.pdf', NULL, 0),
(34, 'entrevista1', '', 'files/16401029entrevista1.pdf', NULL, 16401029),
(35, 'ficha', '', 'files/16401026ficha.pdf', NULL, 16401026),
(37, 'entrevista 1', '', 'files/16401034entrevista-1.pdf', NULL, 16401034),
(39, 'asdas', '', 'files/16401029asdas.pdf', NULL, 16401029);

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
(3, 'Tutor', 16401026, 'asd', '', '2021-11-25 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `IdReporte` int(11) NOT NULL,
  `IdTutorado` int(11) NOT NULL,
  `NombreTutorado` varchar(50) NOT NULL,
  `IdTutor` int(11) DEFAULT NULL,
  `Semestres` tinyint(4) NOT NULL,
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

INSERT INTO `reporte` (`IdReporte`, `IdTutorado`, `NombreTutorado`, `IdTutor`, `Semestres`, `Psicologia`, `Asesoria`, `Actividad`, `Conferencias`, `Talleres`, `Estatus`, `HoraSesionIndiv`, `HoraSesionGrup`, `EvaValor`, `EvalNivel`, `Acredito`, `Noacredito`, `Deserto`, `AcreditadoSegui`) VALUES
(0, 0, '', NULL, 0, 0, 0, 0, 0, 0, 'Selecciona un estatus', 0, 0, 0, '', 0, 0, 0, 0),
(1, 16401026, 'Luis Miguel', 16401027, 0, 1, 1, 0, 0, 0, 'Acreditó', 0, 0, 1, 'Suficiente', 1, 0, 0, 0),
(3, 16401099, 'Jholaus Enrique Salazar Maldonado', 16401027, 0, 1, 1, 0, 0, 0, 'Acreditó', 1, 2, 3, 'Notable', 1, 0, 0, 0),
(5, 16401033, 'Jesus', 16401028, 0, 0, 0, 0, 0, 0, 'Seleccionar estatus', 0, 0, 0, '', 0, 0, 0, 0),
(6, 16401029, 'Jose Luis Ramos Monreal', 16401027, 0, 0, 0, 0, 0, 0, 'Seleccionar estatus', 0, 0, 0, '', 0, 0, 0, 0),
(7, 16401034, 'manuel', NULL, 0, 0, 0, 0, 0, 0, 'Seleccionar estatus', 0, 0, 0, '', 0, 0, 0, 0),
(8, 16401035, 'jose', NULL, 0, 0, 0, 0, 0, 0, 'Seleccionar estatus', 0, 0, 0, '', 0, 0, 0, 0),
(9, 20401011, 'chuy', NULL, 0, 0, 0, 0, 0, 0, 'Seleccionar estatus', 0, 0, 0, '', 0, 0, 0, 0);

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
(20401020, 'luis', 0),
(20401021, 'manel', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutorados`
--

CREATE TABLE `tutorados` (
  `IdTutorado` int(11) NOT NULL,
  `NombreTutorado` varchar(35) NOT NULL,
  `IdTutor` int(11) DEFAULT NULL,
  `Semestres` tinyint(4) NOT NULL,
  `Domicilio` varchar(100) NOT NULL,
  `Telefono` varchar(25) NOT NULL,
  `Preparatoria` varchar(35) NOT NULL,
  `Estatus` varchar(15) NOT NULL,
  `MotivoCarrera` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tutorados`
--

INSERT INTO `tutorados` (`IdTutorado`, `NombreTutorado`, `IdTutor`, `Semestres`, `Domicilio`, `Telefono`, `Preparatoria`, `Estatus`, `MotivoCarrera`) VALUES
(16401026, 'Luis Miguel', 16401027, 9, '', '', '', '', 0),
(16401029, 'Jose Luis Ramos Monreal', 16401028, 11, '', '', '', '', 0),
(16401033, 'Jesus', 16401020, 12, '', '', '', '', 0),
(16401034, 'manuel', NULL, 1, '', '', '', '', 0),
(16401035, 'jose', 16401020, 6, '', '', '', '', 0),
(16401099, 'Jholaus Enrique Salazar Maldonado', 16401027, 2, '', '', '', '', 0),
(20401011, 'chuy', NULL, 10, '', '', '', '', 0);

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
(16401020, 'blanca ramirez', 'br1234', 'Tutor', 0),
(16401023, 'Jiacheng Zhou', 'z1234', 'Jefe de departamento', 0),
(16401024, 'Juan Mario Gonzalez Borrayo', 'jm1234', 'Coordinador de Tutores', 0),
(16401026, 'Luis Miguel', 'lm1234', 'Alumno', 0),
(16401027, 'Sergio Rivera Rios', '123', 'Tutor', 0),
(16401028, 'edgar valderama', 'e1234', 'Tutor', 0),
(16401029, 'Jose Luis Ramos Monreal', 'jl1234', 'Alumno', 0),
(16401033, 'Jesus', '123456', 'Alumno', 1),
(16401034, 'manuel', 'm1234', 'Alumno', 0),
(16401035, 'jose', '123456', 'Alumno', 1),
(16401099, 'Jholaus Enrique Salazar Maldonado', 'js1234', 'Alumno', 0),
(16402011, 'francisco', '123456', 'Tutor', 1),
(20401011, 'chuy', '123456', 'Alumno', 1),
(20401020, 'luis', 'j1234', 'Tutor', 0),
(20401021, 'manel', '123456', 'Tutor', 1);

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
  ADD PRIMARY KEY (`IdAyuda`),
  ADD KEY `Ayuda-Tutorado` (`IdTutorado`);

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
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`IdMsj`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`IdReporte`);

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
  MODIFY `IdAct` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `cambiartutor`
--
ALTER TABLE `cambiartutor`
  MODIFY `IdMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `canalizacion`
--
ALTER TABLE `canalizacion`
  MODIFY `IdCanal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `IdMsj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `IdReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
