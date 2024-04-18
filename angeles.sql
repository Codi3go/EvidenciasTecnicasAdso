
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


DROP TABLE IF EXISTS `deportista`;
CREATE TABLE IF NOT EXISTS `deportista` (
  `id_deportista` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `direccion` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_deportista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `detalle_permisos`;
CREATE TABLE IF NOT EXISTS `detalle_permisos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_permiso` int NOT NULL,
  `id_profesor` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_permiso` (`id_permiso`),
  KEY `id_profesor` (`id_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `info_angeles`;
CREATE TABLE IF NOT EXISTS `info_angeles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `direccion` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



INSERT INTO `info_angeles` (`id`, `nombre`, `telefono`, `email`, `direccion`) VALUES
(1, 'Ángeles', '6026697313', 'angeles@club.angeles.com', 'Calle F #123');


DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `laboratorio` varchar(100) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `misvideos`;
CREATE TABLE IF NOT EXISTS `misvideos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `sinopsis` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



INSERT INTO `misvideos` (`id`, `nombre`, `sinopsis`, `url`) VALUES
(1, 'Tributo Pau Gasol', 'Nach', '../assets/img/NBA.mp4');



DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



INSERT INTO `permisos` (`id`, `nombre`) VALUES
(1, 'info_angeles'),
(2, 'profesores'),
(3, 'deportista'),
(4, 'informacion_deportista'),
(5, 'sesion_deportiva'),
(6, 'pagos');



DROP TABLE IF EXISTS `sesion_deportiva`;
CREATE TABLE IF NOT EXISTS `sesion_deportiva` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `nombre_corto` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `informacion_deportista`;
CREATE TABLE IF NOT EXISTS `informacion_deportista` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `profesor`;
CREATE TABLE IF NOT EXISTS `profesor` (
  `idprofesor` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `clave` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`idprofesor`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `profesor` (`idprofesor`, `nombre`, `correo`, `usuario`, `clave`) VALUES
(1, 'Ángeles', 'angeles@club.angeles.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Diego', 'diegoa_hoyoso@soy.sena.edu.co', 'diego', '078c007bd92ddec308ae2f5115c1775d'),
(3, 'Christian', 'chrauseche@soy.sena.edu.co', 'christian', '8354336224c63279aadd00a9621757ef4fdf31fc'),
(12, 'redre', 'Adsosuroccidente@gmail.com', 'erer', 'bc47f7492d28702c38f2ed383a58f96a');

ALTER TABLE `detalle_permisos`
  ADD CONSTRAINT `detalle_permisos_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_permisos_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`idprofesor`) ON DELETE CASCADE ON UPDATE CASCADE;