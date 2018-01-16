/*
Navicat MySQL Data Transfer

Source Server         : César
Source Server Version : 50539
Source Host           : localhost:3306
Source Database       : byctel

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2015-05-27 10:26:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `fotos`
-- ----------------------------
DROP TABLE IF EXISTS `fotos`;
CREATE TABLE `fotos` (
  `IdFoto` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `FotoPerfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdFoto`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fotos
-- ----------------------------
INSERT INTO `fotos` VALUES ('13', '3', 'AnhumasAbyss_ROW9774897869_1366x768.jpg', '1');
INSERT INTO `fotos` VALUES ('15', '5', 'fondos-de-pantalla-hd-paisajes-paisajes-fondo-de-pantalla-hd.jpg', null);
INSERT INTO `fotos` VALUES ('16', '5', 'Copia de windows-vista-wallpaper-large-27.jpg', null);
INSERT INTO `fotos` VALUES ('17', '6', 'muelle-1024-x-768.jpg', null);
INSERT INTO `fotos` VALUES ('18', '6', 'W7W (18).jpg', null);
INSERT INTO `fotos` VALUES ('19', '6', '', null);
INSERT INTO `fotos` VALUES ('20', '7', 'Windows-8.1-Wallpaper-HD-32-1024x576.jpg', null);
INSERT INTO `fotos` VALUES ('21', '8', 'Bari1.jpg', null);
INSERT INTO `fotos` VALUES ('22', '4', '1DC.jpg', null);
INSERT INTO `fotos` VALUES ('23', '9', '1DC.jpg', null);
INSERT INTO `fotos` VALUES ('24', '9', '22072009017.jpg', null);
INSERT INTO `fotos` VALUES ('25', '10', 'fotored.jpg', null);
INSERT INTO `fotos` VALUES ('26', '11', 'page1-img1.jpg', null);
INSERT INTO `fotos` VALUES ('27', '11', 'cctv.jpg', null);

-- ----------------------------
-- Table structure for `fotosser`
-- ----------------------------
DROP TABLE IF EXISTS `fotosser`;
CREATE TABLE `fotosser` (
  `IdFoto` int(11) NOT NULL AUTO_INCREMENT,
  `idServicios` int(11) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `FotoPerfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdFoto`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fotosser
-- ----------------------------
INSERT INTO `fotosser` VALUES ('26', '12', 'fotored.jpg', null);
INSERT INTO `fotosser` VALUES ('27', '13', 'controlacceso.jpg', null);
INSERT INTO `fotosser` VALUES ('28', '14', 'cctv.jpg', null);

-- ----------------------------
-- Table structure for `inicioproducto`
-- ----------------------------
DROP TABLE IF EXISTS `inicioproducto`;
CREATE TABLE `inicioproducto` (
  `idProduc` int(11) NOT NULL AUTO_INCREMENT,
  `Foto` varchar(100) DEFAULT NULL,
  `Titulo` varchar(50) DEFAULT NULL,
  `Texto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idProduc`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inicioproducto
-- ----------------------------
INSERT INTO `inicioproducto` VALUES ('1', 'banner1.jpg', 'Productos', 'Descripciones y valores del productos, consulte y le asesoraremos.');

-- ----------------------------
-- Table structure for `producto`
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) DEFAULT NULL,
  `DescripcionCorta` varchar(200) DEFAULT NULL,
  `Precio` varchar(50) DEFAULT NULL,
  `Activo` int(11) DEFAULT NULL,
  `FotoPerfil` varchar(100) DEFAULT NULL,
  `EnPortada` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES ('8', 'Producto', 'Producto', '200.000', '1', 'Bari1.jpg', '1');
INSERT INTO `producto` VALUES ('9', 'prueba1', 'en este campo veremos como queda la descripción.', '50.000', '1', '1DC.jpg', '1');
INSERT INTO `producto` VALUES ('11', 'Cable de red', 'Cables UTP con garantía y servicios incluidos', '25.000', '1', 'cctv.jpg', '1');

-- ----------------------------
-- Table structure for `servicios`
-- ----------------------------
DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios` (
  `idServicios` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) DEFAULT NULL,
  `DescripcionCorta` varchar(320) DEFAULT NULL,
  `Descripcion` text,
  `Activo` int(11) DEFAULT NULL,
  `FotoPerfil` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idServicios`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of servicios
-- ----------------------------
INSERT INTO `servicios` VALUES ('12', 'Cableado Estructurado de redes y fibra óptica', 'Nuestra Empresa \"Byctel Ltda\" Esta Capacitada para realizar todo tipo de instalaciones de red, tendidos de fibra óptica, Canalizaciones, centros de telefonía y todo lo relacionado a base de datos.', 'Nuestra Empresa \"Byctel Ltda\" Esta Capacitada para realizar todo tipo de instalaciones de red, tendidos de fibra óptica, Canalizaciones, centros de telefonía y todo lo relacionado a base de datos, también poseemos personal capacitado y apto para la habilitación y estructuración de Data Center según el cliente lo solicite.', '1', 'fotored.jpg');

-- ----------------------------
-- Table structure for `slider`
-- ----------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `idSlider` int(11) NOT NULL AUTO_INCREMENT,
  `Foto` varchar(50) DEFAULT NULL,
  `Titulo` varchar(25) DEFAULT NULL,
  `Subtitulo` varchar(48) DEFAULT NULL,
  `Menu` varchar(50) DEFAULT NULL,
  `Activo` int(11) DEFAULT NULL,
  `Orden` int(11) DEFAULT NULL,
  `Link` varchar(50) DEFAULT NULL,
  `Precio` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idSlider`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of slider
-- ----------------------------
INSERT INTO `slider` VALUES ('1', 'controlacceso.jpg', 'Contro de Acceso', 'Consulte por nuestros controles de Acceso.', 'Contro de Acceso', '1', '2', '', '0');
INSERT INTO `slider` VALUES ('2', 'informaticos.jpg', 'Informatica', 'Contamos con asesoramiento Informático.', 'Informatica', '1', '1', 'index.php', '0');
INSERT INTO `slider` VALUES ('3', 'fotored.jpg', 'Productos', 'Visite nuestros Productos.', 'Productos', '1', '3', 'productos.php', '0');
INSERT INTO `slider` VALUES ('4', 'nosotros.jpg', 'Staff', 'Conozca nuestro Staff.', 'Staff', '1', '4', 'nosotros.html', '0');
