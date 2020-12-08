-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-12-2020 a las 22:37:29
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Informatica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alumnos`
--

CREATE TABLE `Alumnos` (
  `Id_Alumnos` int(11) NOT NULL,
  `Nombre` varchar(55) NOT NULL,
  `ApellidoP` varchar(55) NOT NULL,
  `ApellidoM` varchar(55) NOT NULL,
  `F_Nacimiento` date NOT NULL,
  `Id_Genero` int(11) NOT NULL,
  `Telefono` int(255) NOT NULL,
  `Id_Carrera` int(11) NOT NULL,
  `Id_Semestre` int(11) NOT NULL,
  `Id_Grupo` int(11) NOT NULL,
  `Id_Plantel` int(11) NOT NULL,
  `Email` varchar(155) NOT NULL,
  `Usuario` varchar(15) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Img` varchar(255) NOT NULL,
  `Estado` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Alumnos`
--

INSERT INTO `Alumnos` (`Id_Alumnos`, `Nombre`, `ApellidoP`, `ApellidoM`, `F_Nacimiento`, `Id_Genero`, `Telefono`, `Id_Carrera`, `Id_Semestre`, `Id_Grupo`, `Id_Plantel`, `Email`, `Usuario`, `Password`, `Img`, `Estado`) VALUES
(1, 'Jose Luis ', 'Chavez', 'Gomez', '1989-11-06', 1, 611099054, 1, 6, 6, 1, 'iscjlchavezg.mx', 'Jluis', 'e10adc3949ba59abbe56e057f20f883e', 'yo.jpg', 'Activo'),
(2, 'Emilio', 'Garcia', 'Garcia', '1995-09-08', 1, 45678902, 1, 5, 5, 1, 'Emilio@gmail.com', 'Emi', '827ccb0eea8a706c4c34a16891f84e7b', 'user.png', 'Activo'),
(5, 'Raul', 'Chavez', 'Rosales', '1960-01-18', 1, 56780981, 2, 5, 5, 2, 'Raul@hotmail.com', 'Raul', '827ccb0eea8a706c4c34a16891f84e7b', 'user.png', 'Activo'),
(12, 'Alexis', 'Gaspar', 'Gonzales', '2003-09-28', 1, 567890909, 1, 5, 5, 1, 'alexisgaspar330@gmail.com', 'Alex', '01cfcd4f6b8770febfb40cb906715822', 'user.png', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Carrera`
--

CREATE TABLE `Carrera` (
  `Id_Carrera` int(11) NOT NULL,
  `NombreC` varchar(50) NOT NULL,
  `Codigo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Carrera`
--

INSERT INTO `Carrera` (`Id_Carrera`, `NombreC`, `Codigo`) VALUES
(1, 'Informatica', 'INFO08'),
(2, 'Contabilidad', 'CONT08'),
(3, 'Alimentos y Bebidas', 'ALBE08'),
(4, 'Hospitalidad Turistica', 'HOSP08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estado`
--

CREATE TABLE `Estado` (
  `Id_Estado` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Id_Municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Estado`
--

INSERT INTO `Estado` (`Id_Estado`, `Nombre`, `Id_Municipio`) VALUES
(1, 'México', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Genero`
--

CREATE TABLE `Genero` (
  `Id_Genero` int(11) NOT NULL,
  `NombreG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Genero`
--

INSERT INTO `Genero` (`Id_Genero`, `NombreG`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grupo`
--

CREATE TABLE `Grupo` (
  `Id_Grupo` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Id_Carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Grupo`
--

INSERT INTO `Grupo` (`Id_Grupo`, `Nombre`, `Id_Carrera`) VALUES
(1, '105', 1),
(2, '205', 1),
(3, '305', 1),
(4, '405', 1),
(5, '505', 1),
(6, '605', 1),
(7, '301', 2),
(8, '206', 1),
(9, '306', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Modulos`
--

CREATE TABLE `Modulos` (
  `Id_Modulos` int(11) NOT NULL,
  `NombreM` varchar(55) COLLATE utf8_spanish2_ci NOT NULL,
  `Codigo` varchar(55) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `Modulos`
--

INSERT INTO `Modulos` (`Id_Modulos`, `NombreM`, `Codigo`) VALUES
(1, 'Programacion de base de datos', 'PSGB'),
(2, 'Conmutación de redes', 'IRLO'),
(3, 'Manejo de Proceso Administrativo', 'MAND'),
(4, 'Seguridad Informatica', 'SEG-008');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Parcial`
--

CREATE TABLE `Parcial` (
  `Id_Parcial` int(11) NOT NULL,
  `Id_Alumno` int(11) NOT NULL,
  `Id_Carrera` int(11) NOT NULL,
  `Id_Modulos` int(11) NOT NULL,
  `Cal1` int(11) NOT NULL,
  `Cal2` int(11) NOT NULL,
  `Cal3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `Parcial`
--

INSERT INTO `Parcial` (`Id_Parcial`, `Id_Alumno`, `Id_Carrera`, `Id_Modulos`, `Cal1`, `Cal2`, `Cal3`) VALUES
(1, 1, 1, 1, 70, 90, 85),
(2, 2, 1, 2, 80, 98, 75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Plantel`
--

CREATE TABLE `Plantel` (
  `Id_Plantel` int(11) NOT NULL,
  `NombreP` varchar(55) NOT NULL,
  `Codigo` varchar(255) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Direccion` text NOT NULL,
  `Telefono` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Plantel`
--

INSERT INTO `Plantel` (`Id_Plantel`, `NombreP`, `Codigo`, `Id_Estado`, `Direccion`, `Telefono`) VALUES
(1, 'Conalep Naucalpan I', '187', 1, 'Calle Miguel Negrete s/n Valle Dorado', 54678965),
(2, 'Conalep Atizapan I', '187', 1, 'Atizapan de Zaragoza', 45678909),
(3, 'Conalep Gustavo Baz', '0089', 1, 'Av. Gustabo baz prada Tlanepalnta ', 5678909),
(4, 'Conalep Naucalpan II', '188', 1, 'Av. Granjas s/n Col. Martires d eRio Blanco', 67890987);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Semestre`
--

CREATE TABLE `Semestre` (
  `Id_Semestre` int(11) NOT NULL,
  `NombreS` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Semestre`
--

INSERT INTO `Semestre` (`Id_Semestre`, `NombreS`) VALUES
(1, '1ro'),
(2, '2do'),
(3, '3ro'),
(4, '4to'),
(5, '5to'),
(6, '6to');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tusuario`
--

CREATE TABLE `Tusuario` (
  `Id_Tusuario` int(11) NOT NULL,
  `TNombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Nivel` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `Tusuario`
--

INSERT INTO `Tusuario` (`Id_Tusuario`, `TNombre`, `Nivel`) VALUES
(1, 'Sistemas', 'Developer'),
(2, 'Administrativo', 'Directivo'),
(3, 'Usuarios', 'Finales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `Id_Usuarios` int(11) NOT NULL,
  `Nombre` varchar(55) NOT NULL,
  `ApellidoP` varchar(55) NOT NULL,
  `ApellidoM` varchar(55) NOT NULL,
  `F_Nacimiento` date NOT NULL,
  `Id_Genero` int(11) NOT NULL,
  `Telefono` int(255) NOT NULL,
  `Id_Plantel` int(11) NOT NULL,
  `Id_Tusuario` int(11) NOT NULL,
  `Email` varchar(155) NOT NULL,
  `Usuario` varchar(15) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Img` varchar(255) NOT NULL,
  `Estado` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`Id_Usuarios`, `Nombre`, `ApellidoP`, `ApellidoM`, `F_Nacimiento`, `Id_Genero`, `Telefono`, `Id_Plantel`, `Id_Tusuario`, `Email`, `Usuario`, `Password`, `Img`, `Estado`) VALUES
(1, 'Jose Luis ', 'Chavez', 'Gomez', '1989-11-06', 1, 611099054, 1, 1, 'iscjlchavezg.mx', 'Jluis', 'e10adc3949ba59abbe56e057f20f883e', 'yo.jpg', 'Activo'),
(2, 'Emilio', 'Garcia', 'Garcia', '1995-09-08', 1, 45678902, 1, 1, 'Emilio@gmail.com', 'Emi', '827ccb0eea8a706c4c34a16891f84e7b', 'user.png', 'Activo'),
(12, 'Alexis', 'Gaspar', 'Gonzales', '2003-09-28', 1, 567890909, 1, 3, 'alexisgaspar330@gmail.com', 'Alex', '01cfcd4f6b8770febfb40cb906715822', 'user.png', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Alumnos`
--
ALTER TABLE `Alumnos`
  ADD PRIMARY KEY (`Id_Alumnos`),
  ADD KEY `Id_Genero` (`Id_Genero`),
  ADD KEY `Id_Carrera` (`Id_Carrera`),
  ADD KEY `Id_Semestre` (`Id_Semestre`),
  ADD KEY `Id_Grupo` (`Id_Grupo`),
  ADD KEY `Id_Plantel` (`Id_Plantel`);

--
-- Indices de la tabla `Carrera`
--
ALTER TABLE `Carrera`
  ADD PRIMARY KEY (`Id_Carrera`);

--
-- Indices de la tabla `Estado`
--
ALTER TABLE `Estado`
  ADD PRIMARY KEY (`Id_Estado`),
  ADD KEY `Id_Municipio` (`Id_Municipio`),
  ADD KEY `Id_Municipio_2` (`Id_Municipio`);

--
-- Indices de la tabla `Genero`
--
ALTER TABLE `Genero`
  ADD PRIMARY KEY (`Id_Genero`);

--
-- Indices de la tabla `Grupo`
--
ALTER TABLE `Grupo`
  ADD PRIMARY KEY (`Id_Grupo`),
  ADD KEY `Id_Carrera` (`Id_Carrera`);

--
-- Indices de la tabla `Modulos`
--
ALTER TABLE `Modulos`
  ADD PRIMARY KEY (`Id_Modulos`);

--
-- Indices de la tabla `Parcial`
--
ALTER TABLE `Parcial`
  ADD PRIMARY KEY (`Id_Parcial`),
  ADD KEY `Id_Alumno` (`Id_Alumno`),
  ADD KEY `Id_Carrera` (`Id_Carrera`),
  ADD KEY `Id_Modulos` (`Id_Modulos`);

--
-- Indices de la tabla `Plantel`
--
ALTER TABLE `Plantel`
  ADD PRIMARY KEY (`Id_Plantel`),
  ADD KEY `Id_Estado` (`Id_Estado`);

--
-- Indices de la tabla `Semestre`
--
ALTER TABLE `Semestre`
  ADD PRIMARY KEY (`Id_Semestre`);

--
-- Indices de la tabla `Tusuario`
--
ALTER TABLE `Tusuario`
  ADD PRIMARY KEY (`Id_Tusuario`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`Id_Usuarios`),
  ADD KEY `Id_Genero` (`Id_Genero`),
  ADD KEY `Id_Plantel` (`Id_Plantel`),
  ADD KEY `Id_Tusuario` (`Id_Tusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Alumnos`
--
ALTER TABLE `Alumnos`
  MODIFY `Id_Alumnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `Carrera`
--
ALTER TABLE `Carrera`
  MODIFY `Id_Carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Estado`
--
ALTER TABLE `Estado`
  MODIFY `Id_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Genero`
--
ALTER TABLE `Genero`
  MODIFY `Id_Genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Grupo`
--
ALTER TABLE `Grupo`
  MODIFY `Id_Grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `Modulos`
--
ALTER TABLE `Modulos`
  MODIFY `Id_Modulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Parcial`
--
ALTER TABLE `Parcial`
  MODIFY `Id_Parcial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Plantel`
--
ALTER TABLE `Plantel`
  MODIFY `Id_Plantel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Semestre`
--
ALTER TABLE `Semestre`
  MODIFY `Id_Semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Tusuario`
--
ALTER TABLE `Tusuario`
  MODIFY `Id_Tusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `Id_Usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Alumnos`
--
ALTER TABLE `Alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`Id_Genero`) REFERENCES `Genero` (`Id_Genero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`Id_Carrera`) REFERENCES `Carrera` (`Id_Carrera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_ibfk_3` FOREIGN KEY (`Id_Semestre`) REFERENCES `Semestre` (`Id_Semestre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_ibfk_4` FOREIGN KEY (`Id_Grupo`) REFERENCES `Grupo` (`Id_Grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_ibfk_5` FOREIGN KEY (`Id_Plantel`) REFERENCES `Plantel` (`Id_Plantel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Grupo`
--
ALTER TABLE `Grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`Id_Carrera`) REFERENCES `Carrera` (`Id_Carrera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Parcial`
--
ALTER TABLE `Parcial`
  ADD CONSTRAINT `parcial_ibfk_1` FOREIGN KEY (`Id_Alumno`) REFERENCES `Alumnos` (`Id_Alumnos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parcial_ibfk_2` FOREIGN KEY (`Id_Carrera`) REFERENCES `Carrera` (`Id_Carrera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parcial_ibfk_3` FOREIGN KEY (`Id_Modulos`) REFERENCES `Modulos` (`Id_Modulos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Plantel`
--
ALTER TABLE `Plantel`
  ADD CONSTRAINT `plantel_ibfk_1` FOREIGN KEY (`Id_Estado`) REFERENCES `Estado` (`Id_Estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Id_Genero`) REFERENCES `Genero` (`Id_Genero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`Id_Plantel`) REFERENCES `Plantel` (`Id_Plantel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`Id_Tusuario`) REFERENCES `Tusuario` (`Id_Tusuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
