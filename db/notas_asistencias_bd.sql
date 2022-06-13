-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-06-2022 a las 19:31:54
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `notas_asistencias_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistenciamateria`
--

DROP TABLE IF EXISTS `asistenciamateria`;
CREATE TABLE IF NOT EXISTS `asistenciamateria` (
  `IdAsistencia` int(11) NOT NULL AUTO_INCREMENT,
  `AsisPorcentaje1` int(1) NOT NULL,
  `FechaAsistencia1` date DEFAULT NULL,
  `AsisPorcentaje2` int(1) NOT NULL,
  `FechaAsistencia2` date DEFAULT NULL,
  `AsisPorcentaje3` int(1) NOT NULL,
  `FechaAsistencia3` date DEFAULT NULL,
  `AsisPorcentaje4` int(1) NOT NULL,
  `FechaAsistencia4` date DEFAULT NULL,
  `AsisPorcentaje5` int(1) NOT NULL,
  `FechaAsistencia5` date DEFAULT NULL,
  `AsisPorcentaje6` int(1) NOT NULL,
  `FechaAsistencia6` date DEFAULT NULL,
  `AsisPorcentaje7` int(1) NOT NULL,
  `FechaAsistencia7` date DEFAULT NULL,
  `AsisPorcentaje8` int(1) NOT NULL,
  `FechaAsistencia8` date DEFAULT NULL,
  `CodAsisteEstudiante` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `CodAsisteMateria` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IdAsistencia`),
  KEY `AsisteEstudiante` (`CodAsisteEstudiante`),
  KEY `AsistenciaMateria` (`CodAsisteMateria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asistenciamateria`
--

INSERT INTO `asistenciamateria` (`IdAsistencia`, `AsisPorcentaje1`, `FechaAsistencia1`, `AsisPorcentaje2`, `FechaAsistencia2`, `AsisPorcentaje3`, `FechaAsistencia3`, `AsisPorcentaje4`, `FechaAsistencia4`, `AsisPorcentaje5`, `FechaAsistencia5`, `AsisPorcentaje6`, `FechaAsistencia6`, `AsisPorcentaje7`, `FechaAsistencia7`, `AsisPorcentaje8`, `FechaAsistencia8`, `CodAsisteEstudiante`, `CodAsisteMateria`) VALUES
(4, 1, '2022-06-14', 1, '2022-06-15', 1, '2022-06-16', 2, '2022-06-17', 2, '2022-06-18', 2, '2022-06-19', 0, '1900-01-01', 0, '1900-01-01', '2022MA1', 'MDO2022'),
(6, 1, '2022-06-01', 1, '2022-06-02', 2, '2022-06-03', 2, '2022-06-04', 1, '2022-06-07', 1, '2022-06-08', 0, '1900-01-01', 0, '1900-01-01', '2022MA1', 'MAT12022'),
(7, 2, '2022-06-01', 2, '2022-06-02', 0, '1900-01-01', 0, '1900-01-01', 0, '1900-01-01', 0, '1900-01-01', 0, '1900-01-01', 0, '1900-01-01', '2022MG5', 'MDO2022'),
(8, 1, '2022-06-01', 1, '2022-06-02', 1, '2022-06-03', 2, '2022-06-04', 2, '2022-06-05', 2, '2022-06-07', 0, '1900-01-01', 0, '1900-01-01', '2022MG5', 'EDD2022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

DROP TABLE IF EXISTS `docente`;
CREATE TABLE IF NOT EXISTS `docente` (
  `IdDocente` int(5) NOT NULL AUTO_INCREMENT,
  `NombresDocente` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ApellidosDocente` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `DUIDocente` char(9) COLLATE utf8_spanish_ci NOT NULL,
  `PassDocente` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `EmailDocente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FechaIngreDocente` date NOT NULL,
  `Sexo` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `CodigoDocente` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IdDocente`),
  KEY `CodigoDocente` (`CodigoDocente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`IdDocente`, `NombresDocente`, `ApellidosDocente`, `DUIDocente`, `PassDocente`, `EmailDocente`, `FechaIngreDocente`, `Sexo`, `CodigoDocente`) VALUES
(1, 'JUAN CARLOS', 'CRUZ GONZALEZ', '131313139', '1234', 'juancarlos@gmail.com', '2002-06-22', 'M', 'CG20221-1'),
(2, 'MARIA DOLORES', 'ARIAS MONTANO', '888899995', '8585', 'lolita@gmail.com', '2002-06-22', 'F', 'AM20222-1'),
(3, 'MARTA ESMERALDA', 'CONSTANZA HERNANDEZ', '565656568', '4545', 'tita@gmail.com', '2002-06-22', 'F', 'CH20223-1'),
(4, '', ' ', '', '', '', '2011-06-22', '', '20224-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE IF NOT EXISTS `estudiante` (
  `IdEstudiante` int(5) NOT NULL AUTO_INCREMENT,
  `NombresEstudiante` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ApellidosEstudiente` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `DUIEstudiante` char(9) COLLATE utf8_spanish_ci NOT NULL,
  `CodigoEstudiante` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `PassEstudiante` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `EmailEstudiante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` char(9) COLLATE utf8_spanish_ci NOT NULL,
  `FechaIngresoEstudiante` date DEFAULT NULL,
  `Sexo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IdEstudiante`),
  KEY `CodigoEstudiante` (`CodigoEstudiante`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`IdEstudiante`, `NombresEstudiante`, `ApellidosEstudiente`, `DUIEstudiante`, `CodigoEstudiante`, `PassEstudiante`, `EmailEstudiante`, `Telefono`, `FechaIngresoEstudiante`, `Sexo`) VALUES
(1, 'Carlos Rene', 'Montano Arias', '123456789', '2022MA1', '1212', 'montanocarlos@gmail.com', '7696-3351', '2022-05-10', 'M'),
(2, 'Oscar Alfredo', 'Montano Arias', '252525258', '2022MA2', '236', 'moreno@gmail.com', '66891212', '2010-05-22', 'M'),
(4, 'Carolina Beatriz', 'Abrego Molina', '787878789', '2022AM4', '12369', 'carito@gmail.com', '68981234', '2011-05-22', 'F'),
(5, 'Maria Jose', 'Mendoza Garcia', '787889651', '2022MG5', '78789', 'Marijose@gmail.com', '78995522', '2001-06-22', 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `IdMateria` int(5) NOT NULL AUTO_INCREMENT,
  `NombreMateria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CodMateria` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `CodMateriaAnio` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `FechaCreacionMateria` date NOT NULL,
  PRIMARY KEY (`IdMateria`),
  KEY `CodMateriaAnio` (`CodMateriaAnio`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`IdMateria`, `NombreMateria`, `CodMateria`, `CodMateriaAnio`, `FechaCreacionMateria`) VALUES
(1, 'METODOS DE OPTIMIZACION', 'MDO', 'MDO2022', '2014-05-22'),
(2, 'MATEMATICA 1', 'MAT1', 'MAT12022', '2014-05-22'),
(3, 'HERRAMIENTAS DE PRODUCTIVIDAD', 'HDP', 'HDP2022', '2014-05-22'),
(4, 'PROBABILIDAD Y ESTADISTICA 1', 'PYE1', 'PYE12022', '2014-05-22'),
(5, 'ESTRUCTURA DE DATOS', 'EDD', 'EDD2022', '2031-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notasmaterias`
--

DROP TABLE IF EXISTS `notasmaterias`;
CREATE TABLE IF NOT EXISTS `notasmaterias` (
  `IdNota` int(11) NOT NULL AUTO_INCREMENT,
  `Actividad1` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Porcentaje1` int(2) DEFAULT NULL,
  `Nota1` decimal(10,2) DEFAULT NULL,
  `NotaFnl1` double(10,2) DEFAULT NULL,
  `Actividad2` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Porcentaje2` int(2) DEFAULT NULL,
  `Nota2` decimal(10,2) DEFAULT NULL,
  `NotaFnl2` decimal(10,2) DEFAULT NULL,
  `Actividad3` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Porcentaje3` int(2) DEFAULT NULL,
  `Nota3` decimal(10,2) DEFAULT NULL,
  `NotaFnl3` decimal(10,2) DEFAULT NULL,
  `Actividad4` char(25) COLLATE utf8_spanish_ci NOT NULL,
  `Porcentaje4` int(2) DEFAULT NULL,
  `Nota4` decimal(10,2) DEFAULT NULL,
  `NotaFnl4` decimal(10,0) DEFAULT NULL,
  `Actividad5` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Porcentaje5` int(2) DEFAULT NULL,
  `Nota5` decimal(10,2) DEFAULT NULL,
  `NotaFnl5` decimal(10,2) DEFAULT NULL,
  `Actividad6` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Porcentaje6` int(2) DEFAULT NULL,
  `Nota6` decimal(10,2) DEFAULT NULL,
  `NotaFnl6` decimal(10,2) DEFAULT NULL,
  `Actividad7` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Porcentaje7` int(2) DEFAULT NULL,
  `Nota7` decimal(10,2) DEFAULT NULL,
  `NotaFnl7` decimal(10,2) DEFAULT NULL,
  `Actividad8` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Porcentaje8` int(2) DEFAULT NULL,
  `Nota8` decimal(10,2) DEFAULT NULL,
  `NotaFnl8` decimal(10,2) DEFAULT NULL,
  `Actividad9` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Porcentaje9` int(2) DEFAULT NULL,
  `Nota9` decimal(10,2) DEFAULT NULL,
  `NotaFnl9` decimal(10,2) DEFAULT NULL,
  `Actividad10` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Porcentaje10` int(2) DEFAULT NULL,
  `Nota10` decimal(10,2) DEFAULT NULL,
  `NotaFnl10` decimal(10,2) DEFAULT NULL,
  `EstadoMateria` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `CodEstudiante` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `CodMateria` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IdNota`),
  KEY `CodEstudiante` (`CodEstudiante`),
  KEY `CodMateria` (`CodMateria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notasmaterias`
--

INSERT INTO `notasmaterias` (`IdNota`, `Actividad1`, `Porcentaje1`, `Nota1`, `NotaFnl1`, `Actividad2`, `Porcentaje2`, `Nota2`, `NotaFnl2`, `Actividad3`, `Porcentaje3`, `Nota3`, `NotaFnl3`, `Actividad4`, `Porcentaje4`, `Nota4`, `NotaFnl4`, `Actividad5`, `Porcentaje5`, `Nota5`, `NotaFnl5`, `Actividad6`, `Porcentaje6`, `Nota6`, `NotaFnl6`, `Actividad7`, `Porcentaje7`, `Nota7`, `NotaFnl7`, `Actividad8`, `Porcentaje8`, `Nota8`, `NotaFnl8`, `Actividad9`, `Porcentaje9`, `Nota9`, `NotaFnl9`, `Actividad10`, `Porcentaje10`, `Nota10`, `NotaFnl10`, `EstadoMateria`, `CodEstudiante`, `CodMateria`) VALUES
(8, 'ACTIVIDAD 1', 10, '7.00', 0.70, 'LABORATORIO 1', 10, '7.00', '0.70', 'EXAMEN 1', 10, '7.00', '0.70', 'ACTIVIDAD 2', 10, '7.00', '1', 'LABORATORIO 2', 10, '7.00', '0.70', 'EXAMEN 2', 10, '7.00', '0.70', 'ACTIVIDAD 3', 10, '7.00', '0.70', 'LABORATORIO 3', 10, '7.00', '0.70', 'EXAMEN 3', 10, '7.00', '0.70', 'FORO', 10, '7.00', '0.70', 'APROBADO', '2022MG5', 'MDO2022'),
(9, 'ACTIVIDAD 1', 10, '5.55', 0.56, 'LABORATORIO 1', 10, '5.55', '0.56', 'EXAMEN 1', 10, '5.55', '0.56', 'ACTIVIDAD 2', 10, '5.55', '1', 'LABORATORIO 2', 10, '5.55', '0.56', 'EXAMEN 2', 10, '5.55', '0.56', 'ACTIVIDAD 3', 10, '5.55', '0.56', 'LABORATORIO 3', 10, '5.55', '0.56', 'EXAMEN 3', 10, '5.55', '0.56', 'FORO 1', 10, '5.55', '0.56', 'REPROBADO', '2022AM4', 'PYE12022'),
(10, 'EXAMEN 1', 20, '10.00', 2.00, 'EXAMEN 2', 20, '10.00', '2.00', 'EXAMEN', 20, '10.00', '2.00', 'LABORATORIO 1', 15, '10.00', '2', 'LABORATORIO', 15, '10.00', '1.50', 'LABORATORIO', 10, '10.00', '1.00', '-', 0, '0.00', '0.00', '-', 0, '0.00', '0.00', '-', 0, '0.00', '0.00', '-', 0, '0.00', '0.00', 'APROBADO', '2022MA2', 'MAT12022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrodocentemat`
--

DROP TABLE IF EXISTS `registrodocentemat`;
CREATE TABLE IF NOT EXISTS `registrodocentemat` (
  `IdRegisDocMat` int(5) NOT NULL AUTO_INCREMENT,
  `MatRegDocente` int(5) NOT NULL,
  `DocenteAsigMat` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IdRegisDocMat`),
  KEY `DocenteMateria` (`DocenteAsigMat`),
  KEY `RegisDocente` (`MatRegDocente`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registrodocentemat`
--

INSERT INTO `registrodocentemat` (`IdRegisDocMat`, `MatRegDocente`, `DocenteAsigMat`) VALUES
(7, 1, 'CG20221-1'),
(8, 2, 'CG20221-1'),
(9, 2, 'CG20221-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registromatestu`
--

DROP TABLE IF EXISTS `registromatestu`;
CREATE TABLE IF NOT EXISTS `registromatestu` (
  `IdRegisMateria` int(5) NOT NULL AUTO_INCREMENT,
  `RegisMat` int(5) NOT NULL,
  `RegisEstu` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IdRegisMateria`),
  KEY `RegisMat` (`RegisMat`),
  KEY `EstudianteRegis` (`RegisEstu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registromatestu`
--

INSERT INTO `registromatestu` (`IdRegisMateria`, `RegisMat`, `RegisEstu`) VALUES
(1, 1, '2022MG5'),
(2, 4, '2022MG5');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistenciamateria`
--
ALTER TABLE `asistenciamateria`
  ADD CONSTRAINT `AsisteEstudiante` FOREIGN KEY (`CodAsisteEstudiante`) REFERENCES `estudiante` (`CodigoEstudiante`),
  ADD CONSTRAINT `AsistenciaMateria` FOREIGN KEY (`CodAsisteMateria`) REFERENCES `materia` (`CodMateriaAnio`);

--
-- Filtros para la tabla `notasmaterias`
--
ALTER TABLE `notasmaterias`
  ADD CONSTRAINT `NotasEstudiantes` FOREIGN KEY (`CodEstudiante`) REFERENCES `estudiante` (`CodigoEstudiante`),
  ADD CONSTRAINT `NotasMateria` FOREIGN KEY (`CodMateria`) REFERENCES `materia` (`CodMateriaAnio`);

--
-- Filtros para la tabla `registrodocentemat`
--
ALTER TABLE `registrodocentemat`
  ADD CONSTRAINT `DocenteRegisMateria` FOREIGN KEY (`MatRegDocente`) REFERENCES `materia` (`IdMateria`),
  ADD CONSTRAINT `MateriaRegisDocente` FOREIGN KEY (`DocenteAsigMat`) REFERENCES `docente` (`CodigoDocente`);

--
-- Filtros para la tabla `registromatestu`
--
ALTER TABLE `registromatestu`
  ADD CONSTRAINT `EstudianteRegis` FOREIGN KEY (`RegisEstu`) REFERENCES `estudiante` (`CodigoEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `MateriaRegis` FOREIGN KEY (`RegisMat`) REFERENCES `materia` (`IdMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
