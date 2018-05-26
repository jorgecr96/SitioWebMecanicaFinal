-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2018 a las 05:19:55
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mecanica`
--
CREATE DATABASE IF NOT EXISTS `mecanica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mecanica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_esp` int(4) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Carrera` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_esp`, `Nombre`, `Carrera`) VALUES
(2, 'HOLA2', 'mecatronica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indices`
--

CREATE TABLE `indices` (
  `id_indice` int(4) NOT NULL,
  `carrera` varchar(11) NOT NULL,
  `periodo` varchar(7) NOT NULL,
  `fecha` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infraestructura`
--

CREATE TABLE `infraestructura` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigaciones`
--

CREATE TABLE `investigaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `archivo` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_apoyo`
--

CREATE TABLE `material_apoyo` (
  `id_material` int(4) NOT NULL,
  `seccion` varchar(15) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `material_apoyo`
--

INSERT INTO `material_apoyo` (`id_material`, `seccion`, `nombre`, `ruta`) VALUES
(12, 'Normativos', 'Prueba final 3', 'material/SOLICITUD FORMULARIO.pdf'),
(13, 'Ceneval', 'Ceneval 2019', 'material/itil-v33.pdf'),
(14, 'Documentos', 'Ceneval 2020', 'material/Cert742173358490.pdf'),
(15, 'Materias', 'Prueba final 2', 'material/Solicitud Apoyo A E-J 2018.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(4) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `creditos` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `semestre` int(11) NOT NULL,
  `programa` varchar(200) NOT NULL,
  `carrera` varchar(11) NOT NULL,
  `abreviacion` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `materia`, `creditos`, `tipo`, `semestre`, `programa`, `carrera`, `abreviacion`) VALUES
(2, 'Calculo Integral', 5, 'Tronco Comun', 2, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecanica', 'Calc Int'),
(3, 'Calculo Vectorial', 5, 'Tronco Comun', 3, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecanica', 'Calc Vect'),
(4, 'Algebra Lineal', 5, 'Tronco Comun', 4, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecanica', 'Alge Line'),
(5, 'Termodinamica', 5, 'Tronco Comun', 5, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecanica', 'Termo...'),
(6, 'Vibraciones Mecanicas', 5, 'Tronco Comun', 6, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecanica', 'Vibra Meca'),
(7, 'Especialidad 1.1', 5, 'Especialidad 1', 7, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecanica', 'Especial 1'),
(8, 'Especialidad 1.2', 5, 'Especialidad 1', 8, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecanica', 'Especial. 2'),
(9, 'Especialidad 1.4', 5, 'Especialidad 1', 9, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecanica', 'Especial. 4'),
(10, 'Especialidad 2.1', 5, 'Especialidad 2', 7, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecanica', 'Especial 2.1'),
(11, 'Especialidad 2.2', 5, 'Especialidad 2', 8, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecanica', 'Especial 2.2'),
(12, 'Especialidad 2.4', 5, 'Especialidad 2', 9, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecanica', 'Especial 2.4'),
(14, 'Calculo Integral', 5, 'Tronco Comun', 2, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecatronica', 'Calc Int'),
(15, 'Calculo Vectorial', 5, 'Tronco Comun', 3, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecatronica', 'Calc Vect'),
(16, 'Algebra Lineal', 5, 'Tronco Comun', 4, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecatronica', 'Alge Line'),
(17, 'Termodinamica', 5, 'Tronco Comun', 5, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecatronica', 'Termodina'),
(18, 'Vibraciones Mecanicas', 5, 'Tronco Comun', 6, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecatronica', 'Vibra Meca'),
(19, 'Especialidad 1.1', 5, 'Especialidad 1', 7, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecatronica', 'Especialid'),
(20, 'Especialidad 1.2', 5, 'Especialidad 1', 8, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecatronica', 'Especial. 2'),
(21, 'Especialidad 1.4', 5, 'Especialidad 1', 9, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecatronica', 'Especial. 4'),
(22, 'Especialidad 2.1', 5, 'Especialidad 2', 7, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecatronica', 'Especial 2.1'),
(23, 'Especialidad 2.2', 5, 'Especialidad 2', 8, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecatronica', 'Especial 2.2'),
(24, 'Especialidad 2.4', 5, 'Especialidad 2', 9, 'C:/xampp/htdocs/mecanica/PDF/reticula/CalculoDif.pdf', 'mecatronica', 'Especial 2.4'),
(25, 'Simon', 2, 'Tronco Comun', 3, 'ProgramasMaterias/crossword-jqnmng5dt7.pdf', 'Mecanica', 'SI'),
(26, 'matematicas', 5, 'tronco comun', 2, 'ProgramasMaterias/prueba.pdf', 'Mecanica', 'mate'),
(27, 'TPA', 5, 'Ingenieria_De_Software', 7, 'ProgramasMaterias/Jorge\'s Resume (1).pdf', 'Mecanica', 'TPA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(4) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo`, `descripcion`, `imagen`, `fecha`, `url`) VALUES
(9, 'Exposicion de adrian', 'Adrian expuso chido', 'noticias/black_panther_MILIMA20170126_0470_30.jpg', '2018-05-22', 'www.x.com'),
(10, 'Lalo Esta platicando', 'simon', 'noticias/WhatsApp Image 2018-03-05 at 4.33.00 PM.jpeg', '2018-05-23', ''),
(12, 'Noticia 1', 'a Ver pues morro', 'noticias/WhatsApp Image 2018-03-05 at 4.33.00 PM.jpeg', '2018-05-23', 'a ver.com'),
(13, 'Noticia 2', 'Noticia 2', 'noticias/black_panther_MILIMA20170126_0470_30.jpg', '2018-05-23', 'Noticia2'),
(14, 'Noticia Nueva', 'aasd', 'noticias/dt.common.streams.StreamServer.jpg', '2018-05-23', 'asd'),
(15, 'HOLA AMIGOS ESTA ES UNA NUEVA NOTICIA', 'a ver', 'noticias/WhatsApp Image 2018-03-05 at 4.33.00 PM.jpeg', '2018-05-23', 'simon.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id_profesor` int(4) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Tipo` varchar(25) NOT NULL,
  `Carrera` varchar(11) NOT NULL,
  `CV` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_profesor`, `Nombre`, `Tipo`, `Carrera`, `CV`, `foto`) VALUES
(3, 'Jorge Cervantes Ramirez', 'Presidente_de_academia', 'mecanica', 'CV/prueba.pdf', 'foto/Escenas-adicionales-50-sombras-mas-oscuras.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `passw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Estructura de tabla para la tabla `Sitios de Interes`
--

CREATE TABLE `sitio_interes` (
  `id_sitio` int(4) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `enlace` varchar(200) NOT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_esp`);

--
-- Indices de la tabla `indices`
--
ALTER TABLE `indices`
  ADD PRIMARY KEY (`id_indice`);

--
-- Indices de la tabla `infraestructura`
--
ALTER TABLE `infraestructura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `investigaciones`
--
ALTER TABLE `investigaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `material_apoyo`
--
ALTER TABLE `material_apoyo`
  ADD PRIMARY KEY (`id_material`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_esp` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `indices`
--
ALTER TABLE `indices`
  MODIFY `id_indice` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `infraestructura`
--
ALTER TABLE `infraestructura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `investigaciones`
--
ALTER TABLE `investigaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `material_apoyo`
--
ALTER TABLE `material_apoyo`
  MODIFY `id_material` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_profesor` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
