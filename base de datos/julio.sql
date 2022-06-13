-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-07-2021 a las 06:00:21
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
-- Base de datos: `julio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta`
--

DROP TABLE IF EXISTS `boleta`;
CREATE TABLE IF NOT EXISTS `boleta` (
  `idboleta` int(11) NOT NULL AUTO_INCREMENT,
  `producto_idproducto` int(11) NOT NULL,
  `producto_categoria_idcategoria` int(11) NOT NULL,
  `venta_idventa` int(11) NOT NULL,
  `venta_cliente_idcliente` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idboleta`,`producto_idproducto`,`producto_categoria_idcategoria`,`venta_idventa`,`venta_cliente_idcliente`,`usuario_idusuario`),
  KEY `fk_producto_has_venta_producto1` (`producto_idproducto`,`producto_categoria_idcategoria`),
  KEY `fk_producto_has_venta_venta1` (`venta_idventa`,`venta_cliente_idcliente`),
  KEY `fk_boleta_usuario1` (`usuario_idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `boleta`
--

INSERT INTO `boleta` (`idboleta`, `producto_idproducto`, `producto_categoria_idcategoria`, `venta_idventa`, `venta_cliente_idcliente`, `usuario_idusuario`) VALUES
(2, 1, 2, 1165119320, 4, 1),
(3, 1, 2, 339995245, 4, 2),
(4, 1, 2, 53565477, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `estado` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `estado`) VALUES
(1, 'Procesadores', 'Disponible'),
(2, 'Tarjetas graficas', 'Disponible'),
(3, 'Audifonos', 'Disponible'),
(4, 'Teclado', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(10) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `edad` varchar(3) DEFAULT NULL,
  `cedula` varchar(100) DEFAULT NULL,
  `estado` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `rut`, `nombres`, `apellidos`, `direccion`, `telefono`, `correo`, `edad`, `cedula`, `estado`) VALUES
(1, '7066290-6', 'GABRIEL ', 'VERA PRIEGO', 'El Continente 7351, Santiago', '56112641487', 'correo@gmail.com', '25', 'https://i.ibb.co/wdB5PKj/Captura.png', 'Activo'),
(2, '6019912-4', 'JUAN ANTONIO ', 'VILLAVERDE ROIG', 'Avenida Balmaceda, 41125', '56627391451', 'correo@gmail.com', '35', 'https://i.ibb.co/wdB5PKj/Captura.png', 'Activo'),
(3, '18164891-0', 'AURORA', 'BARQUERO TORRENS', 'Francisco Encina 690', '56745697819', 'correo@gmail.com', '48', 'https://i.ibb.co/wdB5PKj/Captura.png', 'Activo'),
(4, '11111111-1', 'cliente', 'cliente', 'Ernesto Molina', '11111111111', 'correo@gmail.com', '50', 'https://i.ibb.co/wdB5PKj/Captura.png', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE IF NOT EXISTS `equipo` (
  `idequipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `sistema_operativo` varchar(100) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idequipo`,`cliente_idcliente`),
  KEY `fk_equipo_cliente1` (`cliente_idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `tipo`, `marca`, `modelo`, `sistema_operativo`, `cliente_idcliente`) VALUES
(1, 'Notebook', 'Lenovo', 'Y520', 'Windows 10', 1),
(2, 'Notebook', 'Asus', 'HK-1254', 'Windows 10', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `idfactura` int(11) NOT NULL AUTO_INCREMENT,
  `proveedor_idproveedor` int(11) NOT NULL,
  `producto_idproducto` int(11) NOT NULL,
  `producto_categoria_idcategoria` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `producto` varchar(100) DEFAULT NULL,
  `fecha` varchar(12) DEFAULT NULL,
  `fechaLlegada` varchar(10) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `metodo_pago` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idfactura`,`proveedor_idproveedor`,`producto_idproducto`,`producto_categoria_idcategoria`,`usuario_idusuario`),
  KEY `fk_proveedor_has_producto_proveedor1` (`proveedor_idproveedor`),
  KEY `fk_proveedor_has_producto_producto1` (`producto_idproducto`,`producto_categoria_idcategoria`),
  KEY `fk_factura_usuario1` (`usuario_idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=745167144 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idfactura`, `proveedor_idproveedor`, `producto_idproducto`, `producto_categoria_idcategoria`, `usuario_idusuario`, `producto`, `fecha`, `fechaLlegada`, `cantidad`, `precio`, `total`, `metodo_pago`) VALUES
(692512900, 2, 2, 1, 2, 'Intel Core i7-11700K', '12-07-2021', '2021-07-13', 1, 100, 100, 'Transferencia'),
(745167143, 2, 1, 2, 1, 'NVIDIA GeForce RTX 3090', '12-07-2021', '2021-09-12', 1, 1000000, 1000000, 'Paypal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_boleta`
--

DROP TABLE IF EXISTS `historial_boleta`;
CREATE TABLE IF NOT EXISTS `historial_boleta` (
  `idhistorialboleta` int(11) NOT NULL AUTO_INCREMENT,
  `rutCliente` varchar(20) DEFAULT NULL,
  `rutVendedor` varchar(20) DEFAULT NULL,
  `codigoVenta` varchar(100) DEFAULT NULL,
  `fechaEmision` varchar(20) DEFAULT NULL,
  `nombreProducto` varchar(100) DEFAULT NULL,
  `categoriaProducto` varchar(100) DEFAULT NULL,
  `promocion` varchar(2) DEFAULT NULL,
  `valorPromocion` varchar(100) DEFAULT NULL,
  `cantidadProducto` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`idhistorialboleta`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial_boleta`
--

INSERT INTO `historial_boleta` (`idhistorialboleta`, `rutCliente`, `rutVendedor`, `codigoVenta`, `fechaEmision`, `nombreProducto`, `categoriaProducto`, `promocion`, `valorPromocion`, `cantidadProducto`, `total`) VALUES
(1, '11111111-1', '19972074-0', '1165119320', '12-07-2021', 'NVIDIA GeForce RTX 3090', 'Tarjetas graficas', 'No', '0', 1, 2679990),
(2, '11111111-1', '11111111-1', '339995245', '12-07-2021', 'NVIDIA GeForce RTX 3090', 'Tarjetas graficas', 'No', '0', 1, 2529990),
(3, '7066290-6', '11111111-1', '53565477', '12-07-2021', 'NVIDIA GeForce RTX 3090', 'Tarjetas graficas', 'No', '0', 1, 2529990);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_factura`
--

DROP TABLE IF EXISTS `historial_factura`;
CREATE TABLE IF NOT EXISTS `historial_factura` (
  `idhistoriafactura` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProveedor` varchar(300) NOT NULL,
  `rutComprador` varchar(20) NOT NULL,
  `codigoFactura` varchar(300) NOT NULL,
  `fechaEmision` varchar(20) NOT NULL,
  `fechaLlegada` varchar(20) NOT NULL,
  `nombreProducto` varchar(300) NOT NULL,
  `categoriaproducto` varchar(300) NOT NULL,
  `cantidad` varchar(300) NOT NULL,
  `total` varchar(300) NOT NULL,
  PRIMARY KEY (`idhistoriafactura`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial_factura`
--

INSERT INTO `historial_factura` (`idhistoriafactura`, `nombreProveedor`, `rutComprador`, `codigoFactura`, `fechaEmision`, `fechaLlegada`, `nombreProducto`, `categoriaproducto`, `cantidad`, `total`) VALUES
(1, 'el chino infunable', '19972074-0', '745167143', '12-07-2021', '2021-09-12', 'NVIDIA GeForce RTX 3090', 'Tarjetas graficas', '1', '1000000'),
(2, 'el chino infunable', '11111111-1', '692512900', '12-07-2021', '2021-07-13', 'Intel Core i7-11700K', 'Procesadores', '1', '100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_ot`
--

DROP TABLE IF EXISTS `historial_ot`;
CREATE TABLE IF NOT EXISTS `historial_ot` (
  `idhistorialot` int(11) NOT NULL AUTO_INCREMENT,
  `codigoot` varchar(300) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `rutcliente` varchar(20) NOT NULL,
  `rutvendedor` varchar(20) NOT NULL,
  `tipoServicio` varchar(300) NOT NULL,
  `fechaTermino` varchar(20) NOT NULL,
  `metodoPago` varchar(20) NOT NULL,
  `promocion` varchar(2) NOT NULL,
  `valorPromocion` varchar(300) NOT NULL,
  `total` varchar(300) NOT NULL,
  PRIMARY KEY (`idhistorialot`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial_ot`
--

INSERT INTO `historial_ot` (`idhistorialot`, `codigoot`, `fecha`, `rutcliente`, `rutvendedor`, `tipoServicio`, `fechaTermino`, `metodoPago`, `promocion`, `valorPromocion`, `total`) VALUES
(1, '1244415897', '12-07-2021', '11111111-1', '19972074-0', 'Mantencion', '2021-07-15', 'Transferencia', 'No', '0', '15000'),
(2, '89544173', '12-07-2021', '7066290-6', '11111111-1', 'Mantencion', '2021-07-13', 'Transferencia', 'No', '0', '15000'),
(3, '1096882365', '12-07-2021', '7066290-6', '11111111-1', 'Mantencion', '2021-07-15', 'Transferencia', 'No', '0', '15000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_trabajo`
--

DROP TABLE IF EXISTS `orden_trabajo`;
CREATE TABLE IF NOT EXISTS `orden_trabajo` (
  `idsolicitud` int(11) NOT NULL AUTO_INCREMENT,
  `estadoInicial` varchar(300) DEFAULT NULL,
  `diagnostico` varchar(500) DEFAULT NULL,
  `promociones` varchar(2) DEFAULT NULL,
  `monto_promocion` float DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  `fechaTermino` varchar(10) DEFAULT NULL,
  `forma_pago` varchar(100) DEFAULT NULL,
  `servicio_idservicio` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `equipo_idequipo` int(11) NOT NULL,
  `equipo_cliente_idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idsolicitud`,`servicio_idservicio`,`usuario_idusuario`,`equipo_idequipo`,`equipo_cliente_idcliente`),
  KEY `fk_solicitud_servicio1` (`servicio_idservicio`),
  KEY `fk_solicitud_usuario1` (`usuario_idusuario`),
  KEY `fk_solicitud_equipo1` (`equipo_idequipo`,`equipo_cliente_idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=1244415898 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `orden_trabajo`
--

INSERT INTO `orden_trabajo` (`idsolicitud`, `estadoInicial`, `diagnostico`, `promociones`, `monto_promocion`, `total`, `fecha`, `fechaTermino`, `forma_pago`, `servicio_idservicio`, `usuario_idusuario`, `equipo_idequipo`, `equipo_cliente_idcliente`) VALUES
(89544173, 'asd', 'asd', 'No', 0, 15000, '12-07-2021', '2021-07-13', 'Transferencia', 1, 1, 1, 1),
(1096882365, 'asdas', 'asdas', 'No', 0, 15000, '12-07-2021', '2021-07-15', 'Transferencia', 1, 1, 1, 1),
(1244415897, 'sadasas', 'adaadsd', 'No', 0, 15000, '12-07-2021', '2021-07-15', 'Transferencia', 1, 1, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

DROP TABLE IF EXISTS `paises`;
CREATE TABLE IF NOT EXISTS `paises` (
  `Codigo` varchar(2) NOT NULL,
  `Pais` varchar(100) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`Codigo`, `Pais`) VALUES
('AU', 'Australia'),
('CN', 'China'),
('JP', 'Japan'),
('TH', 'Thailand'),
('IN', 'India'),
('MY', 'Malaysia'),
('KR', 'Kore'),
('HK', 'Hong Kong'),
('TW', 'Taiwan'),
('PH', 'Philippines'),
('VN', 'Vietnam'),
('FR', 'France'),
('EU', 'Europe'),
('DE', 'Germany'),
('SE', 'Sweden'),
('IT', 'Italy'),
('GR', 'Greece'),
('ES', 'Spain'),
('AT', 'Austria'),
('GB', 'United Kingdom'),
('NL', 'Netherlands'),
('BE', 'Belgium'),
('CH', 'Switzerland'),
('AE', 'United Arab Emirates'),
('IL', 'Israel'),
('UA', 'Ukraine'),
('RU', 'Russian Federation'),
('KZ', 'Kazakhstan'),
('PT', 'Portugal'),
('SA', 'Saudi Arabia'),
('DK', 'Denmark'),
('IR', 'Ira'),
('NO', 'Norway'),
('US', 'United States'),
('MX', 'Mexico'),
('CA', 'Canada'),
('A1', 'Anonymous Proxy'),
('SY', 'Syrian Arab Republic'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('IQ', 'Iraq'),
('TR', 'Turkey'),
('RO', 'Romania'),
('LB', 'Lebanon'),
('HU', 'Hungary'),
('GE', 'Georgia'),
('BR', 'Brazil'),
('AZ', 'Azerbaijan'),
('A2', 'Satellite Provider'),
('PS', 'Palestinian Territory'),
('LT', 'Lithuania'),
('OM', 'Oman'),
('SK', 'Slovakia'),
('RS', 'Serbia'),
('FI', 'Finland'),
('IS', 'Iceland'),
('BG', 'Bulgaria'),
('SI', 'Slovenia'),
('MD', 'Moldov'),
('MK', 'Macedonia'),
('LI', 'Liechtenstein'),
('JE', 'Jersey'),
('PL', 'Poland'),
('HR', 'Croatia'),
('BA', 'Bosnia and Herzegovina'),
('EE', 'Estonia'),
('LV', 'Latvia'),
('JO', 'Jordan'),
('KG', 'Kyrgyzstan'),
('RE', 'Reunion'),
('IE', 'Ireland'),
('LY', 'Libya'),
('LU', 'Luxembourg'),
('AM', 'Armenia'),
('VG', 'Virgin Island'),
('YE', 'Yemen'),
('BY', 'Belarus'),
('GI', 'Gibraltar'),
('MQ', 'Martinique'),
('PA', 'Panama'),
('DO', 'Dominican Republic'),
('GU', 'Guam'),
('PR', 'Puerto Rico'),
('VI', 'Virgin Island'),
('MN', 'Mongolia'),
('NZ', 'New Zealand'),
('SG', 'Singapore'),
('ID', 'Indonesia'),
('NP', 'Nepal'),
('PG', 'Papua New Guinea'),
('PK', 'Pakistan'),
('AP', 'Asia/Pacific Region'),
('BS', 'Bahamas'),
('LC', 'Saint Lucia'),
('AR', 'Argentina'),
('BD', 'Bangladesh'),
('TK', 'Tokelau'),
('KH', 'Cambodia'),
('MO', 'Macau'),
('MV', 'Maldives'),
('AF', 'Afghanistan'),
('NC', 'New Caledonia'),
('FJ', 'Fiji'),
('WF', 'Wallis and Futuna'),
('QA', 'Qatar'),
('AL', 'Albania'),
('BZ', 'Belize'),
('UZ', 'Uzbekistan'),
('KW', 'Kuwait'),
('ME', 'Montenegro'),
('PE', 'Peru'),
('BM', 'Bermuda'),
('CW', 'Curacao'),
('CO', 'Colombia'),
('VE', 'Venezuela'),
('CL', 'Chile'),
('EC', 'Ecuador'),
('ZA', 'South Africa'),
('IM', 'Isle of Man'),
('BO', 'Bolivia'),
('GG', 'Guernsey'),
('MT', 'Malta'),
('TJ', 'Tajikistan'),
('SC', 'Seychelles'),
('BH', 'Bahrain'),
('EG', 'Egypt'),
('ZW', 'Zimbabwe'),
('LR', 'Liberia'),
('KE', 'Kenya'),
('GH', 'Ghana'),
('NG', 'Nigeria'),
('TZ', 'Tanzani'),
('ZM', 'Zambia'),
('MG', 'Madagascar'),
('AO', 'Angola'),
('NA', 'Namibia'),
('CI', 'Cote D\'Ivoire'),
('SD', 'Sudan'),
('CM', 'Cameroon'),
('MW', 'Malawi'),
('GA', 'Gabon'),
('ML', 'Mali'),
('BJ', 'Benin'),
('TD', 'Chad'),
('BW', 'Botswana'),
('CV', 'Cape Verde'),
('RW', 'Rwanda'),
('CG', 'Congo'),
('UG', 'Uganda'),
('MZ', 'Mozambique'),
('GM', 'Gambia'),
('LS', 'Lesotho'),
('MU', 'Mauritius'),
('MA', 'Morocco'),
('DZ', 'Algeria'),
('GN', 'Guinea'),
('CD', 'Cong'),
('SZ', 'Swaziland'),
('BF', 'Burkina Faso'),
('SL', 'Sierra Leone'),
('SO', 'Somalia'),
('NE', 'Niger'),
('CF', 'Central African Republic'),
('TG', 'Togo'),
('BI', 'Burundi'),
('GQ', 'Equatorial Guinea'),
('SS', 'South Sudan'),
('SN', 'Senegal'),
('MR', 'Mauritania'),
('DJ', 'Djibouti'),
('KM', 'Comoros'),
('IO', 'British Indian Ocean Territory'),
('TN', 'Tunisia'),
('GL', 'Greenland'),
('VA', 'Holy See (Vatican City State)'),
('CR', 'Costa Rica'),
('KY', 'Cayman Islands'),
('JM', 'Jamaica'),
('GT', 'Guatemala'),
('MH', 'Marshall Islands'),
('AQ', 'Antarctica'),
('BB', 'Barbados'),
('AW', 'Aruba'),
('MC', 'Monaco'),
('AI', 'Anguilla'),
('KN', 'Saint Kitts and Nevis'),
('GD', 'Grenada'),
('PY', 'Paraguay'),
('MS', 'Montserrat'),
('TC', 'Turks and Caicos Islands'),
('AG', 'Antigua and Barbuda'),
('TV', 'Tuvalu'),
('PF', 'French Polynesia'),
('SB', 'Solomon Islands'),
('VU', 'Vanuatu'),
('ER', 'Eritrea'),
('TT', 'Trinidad and Tobago'),
('AD', 'Andorra'),
('HT', 'Haiti'),
('SH', 'Saint Helena'),
('FM', 'Micronesi'),
('SV', 'El Salvador'),
('HN', 'Honduras'),
('UY', 'Uruguay'),
('LK', 'Sri Lanka'),
('EH', 'Western Sahara'),
('CX', 'Christmas Island'),
('WS', 'Samoa'),
('SR', 'Suriname'),
('CK', 'Cook Islands'),
('KI', 'Kiribati'),
('NU', 'Niue'),
('TO', 'Tonga'),
('TF', 'French Southern Territories'),
('YT', 'Mayotte'),
('NF', 'Norfolk Island'),
('BN', 'Brunei Darussalam'),
('TM', 'Turkmenistan'),
('PN', 'Pitcairn Islands'),
('SM', 'San Marino'),
('AX', 'Aland Islands'),
('FO', 'Faroe Islands'),
('SJ', 'Svalbard and Jan Mayen'),
('CC', 'Cocos (Keeling) Islands'),
('NR', 'Nauru'),
('GS', 'South Georgia and the South Sandwich Islands'),
('UM', 'United States Minor Outlying Islands'),
('GW', 'Guinea-Bissau'),
('PW', 'Palau'),
('AS', 'American Samoa'),
('BT', 'Bhutan'),
('GF', 'French Guiana'),
('GP', 'Guadeloupe'),
('MF', 'Saint Martin'),
('VC', 'Saint Vincent and the Grenadines'),
('PM', 'Saint Pierre and Miquelon'),
('BL', 'Saint Barthelemy'),
('DM', 'Dominica'),
('ST', 'Sao Tome and Principe'),
('KP', 'Kore'),
('FK', 'Falkland Islands (Malvinas)'),
('MP', 'Northern Mariana Islands'),
('TL', 'Timor-Leste'),
('BQ', 'Bonair'),
('MM', 'Myanmar'),
('NI', 'Nicaragua'),
('SX', 'Sint Maarten (Dutch part)'),
('GY', 'Guyana'),
('LA', 'Lao People\'s Democratic Republic'),
('CU', 'Cuba'),
('ET', 'Ethiopia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `cantidad` varchar(6) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `estado` varchar(13) DEFAULT NULL,
  `categoria_idcategoria` int(11) NOT NULL,
  PRIMARY KEY (`idproducto`,`categoria_idcategoria`),
  KEY `fk_producto_categoria1` (`categoria_idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre`, `cantidad`, `precio`, `estado`, `categoria_idcategoria`) VALUES
(1, 'NVIDIA GeForce RTX 3090', '7', 2529990, 'Disponible', 2),
(2, 'Intel Core i7-11700K', '5', 399750, 'Disponible', 1),
(3, 'SteelSeries Arctis Pro ', '7', 299990, 'Disponible', 3),
(4, 'i5-1564684', '20', 500000, 'Disponible', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `nombre_contacto` varchar(100) DEFAULT NULL,
  `cargo_contacto` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `pais` varchar(56) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `estado` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `nombre`, `nombre_contacto`, `cargo_contacto`, `direccion`, `pais`, `telefono`, `correo`, `estado`) VALUES
(1, 'PCFACTORY', 'Alvaro Perez', 'Ejecutivo', 'Arturo Prat 620 La Serena', 'Chile', '56225600023', 'pcfactory@gmail.com', 'Activo'),
(2, 'el chino infunable', 'chino', 'jefe de la vida', 'direccion algo', 'China', '56239372062', 'correo@gmail.com', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE IF NOT EXISTS `servicio` (
  `idservicio` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) DEFAULT NULL,
  `monto` int(11) DEFAULT NULL,
  `estado` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`idservicio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idservicio`, `tipo`, `monto`, `estado`) VALUES
(1, 'Mantencion', 15000, 'Disponible'),
(2, 'Armado', 20000, 'Disponible'),
(3, 'Instalacion de OS', 5000, 'Disponible'),
(4, 'Masaje en la tula', 150000, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(10) DEFAULT NULL,
  `nombre_perfil` varchar(100) DEFAULT NULL,
  `clave` varchar(300) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `edad` varchar(3) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `tipo_usuario` varchar(14) DEFAULT NULL,
  `estado` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `rut`, `nombre_perfil`, `clave`, `correo`, `telefono`, `direccion`, `nombres`, `apellidos`, `edad`, `imagen`, `tipo_usuario`, `estado`) VALUES
(1, '19972074-0', 'admin', 'admin', 'admin@gmail.com', '56978068317', 'Ernesto Molina 1226', 'Fernando Patricio', 'Cordova Gutierrez', '22', 'https://i.ibb.co/wdB5PKj/Captura.png', 'Administrador', 'Activo'),
(2, '11111111-1', 'julio', 'julio', 'correo@gmail.com', '23131312132', 'Ernesto Molina', 'julio turbina', 'badilla canilla', '80', 'https://i.ibb.co/wdB5PKj/Captura.png', 'Administrador', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(10) DEFAULT NULL,
  `promociones` varchar(100) DEFAULT NULL,
  `monto_promocion` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `forma_pago` varchar(100) DEFAULT NULL,
  `servicio1` varchar(100) DEFAULT NULL,
  `servicio2` varchar(100) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idventa`,`cliente_idcliente`),
  KEY `fk_venta_cliente1` (`cliente_idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=1165119321 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `fecha`, `promociones`, `monto_promocion`, `cantidad`, `total`, `forma_pago`, `servicio1`, `servicio2`, `cliente_idcliente`) VALUES
(53565477, '12-07-2021', 'No', '0', 1, 2529990, 'Transferencia', 'No aplica', 'No aplica', 1),
(339995245, '12-07-2021', 'No', '0', 1, 2529990, 'Transferencia', 'No aplica', 'No aplica', 4),
(884646158, '12-07-2021', 'No', '0', 1, 2679990, 'Transferencia', '4,Masaje en la tula,150000', 'No aplica', 4),
(1165119320, '12-07-2021', 'No', '0', 1, 2679990, 'Transferencia', '4,Masaje en la tula,150000', 'No aplica', 4);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD CONSTRAINT `fk_boleta_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_has_venta_producto1` FOREIGN KEY (`producto_idproducto`,`producto_categoria_idcategoria`) REFERENCES `producto` (`idproducto`, `categoria_idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_has_venta_venta1` FOREIGN KEY (`venta_idventa`,`venta_cliente_idcliente`) REFERENCES `venta` (`idventa`, `cliente_idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `fk_equipo_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proveedor_has_producto_producto1` FOREIGN KEY (`producto_idproducto`,`producto_categoria_idcategoria`) REFERENCES `producto` (`idproducto`, `categoria_idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proveedor_has_producto_proveedor1` FOREIGN KEY (`proveedor_idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_trabajo`
--
ALTER TABLE `orden_trabajo`
  ADD CONSTRAINT `fk_solicitud_equipo1` FOREIGN KEY (`equipo_idequipo`,`equipo_cliente_idcliente`) REFERENCES `equipo` (`idequipo`, `cliente_idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_servicio1` FOREIGN KEY (`servicio_idservicio`) REFERENCES `servicio` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
