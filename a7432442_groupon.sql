-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-09-2014 a las 00:22:40
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `a7432442_groupon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ciudades`
--

CREATE TABLE IF NOT EXISTS `Ciudades` (
  `Id_Ciudad` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Ciudad`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `Ciudades`
--

INSERT INTO `Ciudades` (`Id_Ciudad`, `Nombre`) VALUES
(1, 'Madrid'),
(2, 'Barcelona'),
(3, 'Malaga'),
(4, 'Pamplona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empresas`
--

CREATE TABLE IF NOT EXISTS `Empresas` (
  `Id_Empresa` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Tipo` int(20) DEFAULT NULL,
  `Nombre` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `Descripcion` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `Direccion` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `Mail` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `Pagina Web` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `Latitud_empresa` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Longitud_empresa` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Horario` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Id_Ciudad` int(10) DEFAULT NULL,
  PRIMARY KEY (`Id_Empresa`),
  KEY `Id_ciudad` (`Id_Ciudad`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `Empresas`
--

INSERT INTO `Empresas` (`Id_Empresa`, `Id_Tipo`, `Nombre`, `Descripcion`, `Direccion`, `Mail`, `Pagina Web`, `Latitud_empresa`, `Longitud_empresa`, `Horario`, `Id_Ciudad`) VALUES
(1, 2, 'Trajes Perez', 'Trajes de vestir de hombre', 'Calle Aduana 44', 'trajesperez@perez.com', 'www.Trajesperez.com', '40.4185221', '-3.6995957000000317', '10:00-20:00', 1),
(2, 4, 'Deportes el Cono', 'Especialidad en equipaciones deportivas', 'Travesia Pozas 2', 'cono@arbeloa.com', 'www.TiendaCono.com', '40.4251583', '-3.706754300000057', '10:00-20:00', 1),
(3, 5, 'Electrodomesticos Julian', 'Electrodometicos de Cocina', 'Calle Conde Duque 55', 'ElecJulian@julian.com', 'www.ElecJulian.com', '40.42839499999999', '-3.70982140000001', '10:00-20:00', 1),
(4, 6, 'Hotel Relax', 'Hotel 24h', 'CalleFernando el Catolico  12', 'hotelrelax@relax.com', 'www.HotelRelax.com', '40.43396690000001', '3.7077725999999984', '0:00-24:00', 1),
(5, 6, 'Hotel Elegante', 'Hotel 5 Estrellas', ' Calle tres peces  20', 'hotelelegante@elegante.com', 'www.HotelElegante.com', '40.410681', '-3.699582400000054', '0:00-24:00', 1),
(6, 1, 'Cafeteria Cule', 'Cafeteria Blaugrana', 'Carrer Comtal 15', 'cafecule@cule.com', 'www.cafecule.com', '41.3865686', '2.1733908999999585', '10:00-20:00', 2),
(7, 8, 'Bar El Pelotazo', 'Bar de Chupitos', 'Carrer de Fontanella 55', 'elpelotazo@pedo.com', 'www.Elpelotazo.com', '41.3884595', '2.172773199999938', '19:00-3:00', 2),
(8, 1, 'Otra cafetería', 'Descripcion de una cafeteria', 'Carrer Comtal, 45, Barcelona', 'aaa@aaa.com', 'aa.com', '41.3868967', '2.1744572', '10:00 - 20:00', 2),
(9, 1, 'Una cafetería', 'Descripcion de una cafeteria 1', 'Carrer Comtal, 1, Barcelona', 'bbb@aaa.com', 'bb.com', '41.3862903', '2.1725669', '10:00 - 20:00', 2),
(10, 1, 'Cafetería madrileña', 'el cafe más caro de todos', 'Calle guzmán el bueno 44', 'cafe@madrid.com', 'www.cafemadrid.com', '40.4353218', '-3.7131273', '10:00-21:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ofertas`
--

CREATE TABLE IF NOT EXISTS `Ofertas` (
  `Id_Oferta` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Empresa` int(10) DEFAULT NULL,
  `Fecha_Oferta` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Descripcion` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Oferta`),
  KEY `Id_Empresa` (`Id_Empresa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `Ofertas`
--

INSERT INTO `Ofertas` (`Id_Oferta`, `Id_Empresa`, `Fecha_Oferta`, `Descripcion`) VALUES
(1, 1, '19/09/2015', '10% En trajes de verano'),
(2, 2, '19/09/2015', 'Gratis calcetines por la compra de camiseta seleccion española'),
(3, 3, '19/09/2015', '25% En microondas'),
(4, 4, '19/09/2015', '5% En habitaciones doble'),
(5, 5, '19/09/2015', '5% En suits'),
(6, 6, '19/09/2015', 'Bollo suizo con el cafe gratis'),
(7, 7, '19/09/2015', '2x1 de 22 a 23'),
(8, 8, '21/09/2015', '2 cafes paga 1'),
(9, 9, '21/09/2015', '1 café paga 2'),
(10, 10, '21/09/2014', 'El café más caro al precio más económico.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seas01`
--

CREATE TABLE IF NOT EXISTS `seas01` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(200) DEFAULT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL,
  `LONGITUD` varchar(100) DEFAULT NULL,
  `LATITUD` varchar(100) DEFAULT NULL,
  `IMAGEN` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `seas01`
--

INSERT INTO `seas01` (`ID`, `NOMBRE`, `DESCRIPCION`, `LONGITUD`, `LATITUD`, `IMAGEN`) VALUES
(1, 'Seas, Estudios Abiertos', 'El sistema de Formacion Abierta de SEAS combina la metodologia a distancia con las nuevas tecnologias de comunicacion.', '41.67130099910645', '-0.878981351852417', 'Seas.png'),
(3, 'Hospital La Maz', 'MAZ dispone de una amplia red de centros asistenciales y hospitalarios propios y concertados distribuidos por todo el estado, especificos para la prestacion de asistencia a nuestros trabajadores protegidos, y donde la prioridad es dar un servicio de ', '41.68586103098603', '-0.8687353134155273', 'Hospitales.png'),
(4, 'Seas', 'Seas Estudios Superiores Abiertos. DelegaciÃ³n Centro Zaragoza', '41.64785539330573', '-0.8823448419570923', 'Seas.png'),
(5, 'Hospital Miguel Servet', 'Hospital Central de Zaragoza', '41.634874480570886', '-0.8996987342834473', 'Hospitales.png'),
(6, 'Hospital General de la Defensa de Zaragoza', 'Hospital Militar de Zaragoza', '41.63027962121499', '-0.9045052528381348', 'Hospitales.png'),
(7, 'Hospital Quiron Zaragoza', 'Clinica Quiron Zaragoza', '41.63666261827313', '-0.8937549591064453', 'Hospitales.png'),
(8, 'CLINICA NTRA. SRA. DEL PILAR', 'La superacion diaria y el esfuerzo en mejorar dia a dia es la filosofia que orienta el trabajo en la Clinica Nuestra Senora del Pilar.', '41.63715975985198', '-0.8889055252075195', 'Hospitales.png'),
(9, 'Clinica Montpellier', 'En junio de 1.970 se da forma al edificio moderno y funcional que alberga la Clinica Montpellier, que durante mas de 30 anos de servicio, se ha ganado a pulso un merecido prestigio dentro y fuera de la ciudad de Zaragoza.', '41.63626169485176', '-0.9138822555541992', 'Hospitales.png'),
(10, 'IberCaja', 'Sucursal de IberCaja', '41.669152', '-0.876903', 'Bancos.png'),
(11, 'CAI', 'Sucursal CAI', '41.669154', '-0.876605', 'Bancos.png'),
(12, 'Galerias Primero', 'Supermercado de Confianza, Galerias Primero', '41.670817', '-0.875522', 'Tiendas.png'),
(13, 'Gasolinera BP', 'Estacion de Servicio 24h', '41.666236', '-0.877179', 'Gasolineras.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TicketCompra`
--

CREATE TABLE IF NOT EXISTS `TicketCompra` (
  `Codigo_compra` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `Unidades` int(20) DEFAULT NULL,
  `Fecha_Compra` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Id_Oferta` int(10) DEFAULT NULL,
  `Id_Usuario` int(10) DEFAULT NULL,
  PRIMARY KEY (`Codigo_compra`),
  KEY `Id_Oferta` (`Id_Oferta`),
  KEY `Id_Usuario` (`Id_Usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `TicketCompra`
--

INSERT INTO `TicketCompra` (`Codigo_compra`, `email`, `Unidades`, `Fecha_Compra`, `Id_Oferta`, `Id_Usuario`) VALUES
(1, 'a@svalero.com', 2, '22-09-2014', 1, 1),
(2, 'a@svalero.com', 1, '22-09-2014', 8, 1),
(3, 'a@svalero.com', 1, '22-09-2014', 10, 1),
(4, 'a@svalero.com', 1, '22-09-2014', 7, 1),
(5, 'a@svalero.com', 3, '22-09-2014', 7, 1),
(6, 'a@svalero.com', 1, '22-09-2014', 1, 1),
(7, 'a@svalero.com', 1, '22-09-2014', 3, 1),
(8, 'a@svalero.com', 1, '23-09-2014', 1, 1),
(9, 'a@svalero.com', 1, '23-09-2014', 1, 1),
(10, 'a@svalero.com', 1, '23-09-2014', 1, 1),
(11, 'a@svalero.com', 1, '23-09-2014', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo`
--

CREATE TABLE IF NOT EXISTS `Tipo` (
  `Id_Tipo` int(10) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Tipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `Tipo`
--

INSERT INTO `Tipo` (`Id_Tipo`, `Descripcion`) VALUES
(1, 'Cafeteria'),
(2, 'Ropa'),
(3, 'Alimentacion'),
(4, 'Deportes'),
(5, 'Electrodomesticos'),
(6, 'Hoteles'),
(7, 'Restaurantes'),
(8, 'Bar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `Id_Usuario` int(10) NOT NULL AUTO_INCREMENT,
  `EMail` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `Pass` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`Id_Usuario`, `EMail`, `Pass`) VALUES
(1, 'a@svalero.com', '1234'),
(2, 'test', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
