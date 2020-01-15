-- --------------------------------------------------------
-- 主机:                           192.168.56.101
-- 服务器版本:                        5.6.46 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Linux
-- HeidiSQL 版本:                  10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 导出 vinosinfo 的数据库结构
CREATE DATABASE IF NOT EXISTS `vinosinfo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `vinosinfo`;

-- 导出  表 vinosinfo.admin_user 结构
CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='管理员表';

-- 正在导出表  vinosinfo.admin_user 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `admin_user` DISABLE KEYS */;
INSERT INTO `admin_user` (`id`, `username`, `password`) VALUES
	(1, 'lewis', '$2y$10$xhgojTF5pVf9k.VfiyFqMOctWqO2.sRINUl7pp4gz.kIa0KKh.LvG');
/*!40000 ALTER TABLE `admin_user` ENABLE KEYS */;

-- 导出  表 vinosinfo.f_bodega 结构
CREATE TABLE IF NOT EXISTS `f_bodega` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(48) NOT NULL DEFAULT '',
  `zone_id` tinyint(4) NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `desc` varchar(48) NOT NULL DEFAULT '',
  `is_show` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `create_user` varchar(48) NOT NULL DEFAULT 'Lewis' COMMENT '创建人',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `update_user` varchar(48) NOT NULL DEFAULT 'Lewis' COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='前端酒庄';

-- 正在导出表  vinosinfo.f_bodega 的数据：~12 rows (大约)
/*!40000 ALTER TABLE `f_bodega` DISABLE KEYS */;
INSERT INTO `f_bodega` (`id`, `name`, `zone_id`, `img`, `url`, `desc`, `is_show`, `create_time`, `create_user`, `update_time`, `update_user`) VALUES
	(1, '', 1, '/assets/images/content/bodega1.jpg', 'www.google.com', 'TU BODEGA', 1, '2019-01-13 13:44:25', 'Lewis', '2020-01-15 04:14:31', 'lewis'),
	(2, '', 1, '/assets/images/content/bodega2.jpg', 'www.baidu.com', 'TU BODEGA', 1, '2020-01-13 13:45:03', 'Lewis', '2020-01-13 13:50:07', 'Lewis'),
	(3, '', 1, '/assets/images/content/bodega3.jpg', 'www.baidu.com', 'TU BODEGA', 1, '2020-01-13 13:45:06', 'Lewis', '2020-01-13 13:50:11', 'Lewis'),
	(4, '', 1, '/assets/images/content/bodega4.jpg', 'www.baidu.com', 'TU BODEGA', 1, '2020-01-13 13:45:10', 'Lewis', '2020-01-13 13:50:14', 'Lewis'),
	(5, '', 1, '/assets/images/content/bodega5.jpg', 'www.baidu.com', 'TU BODEGA', 1, '2020-01-13 13:45:15', 'Lewis', '2020-01-13 13:50:16', 'Lewis'),
	(6, '', 1, '/assets/images/content/bodega6.jpg', 'www.baidu.com', 'TU BODEGA', 1, '2020-01-13 13:45:18', 'Lewis', '2020-01-13 13:50:19', 'Lewis'),
	(7, '', 1, '/assets/images/content/bodega7.jpg', 'www.baidu.com', 'TU BODEGA', 1, '2020-01-13 13:45:21', 'Lewis', '2020-01-13 13:50:22', 'Lewis'),
	(8, '', 1, '/assets/images/content/bodega8.jpg', 'www.baidu.com', 'TU BODEGA', 1, '2020-01-13 13:45:24', 'Lewis', '2020-01-13 13:50:26', 'Lewis'),
	(9, '', 1, '/assets/images/content/bodega9.jpg', 'www.baidu.com', 'TU BODEGA', 1, '2020-01-13 13:45:29', 'Lewis', '2020-01-13 13:50:31', 'Lewis'),
	(10, '', 1, '/assets/images/content/bodega10.jpg', 'www.baidu.com', 'TU BODEGA', 1, '2020-01-13 13:50:44', 'Lewis', '2020-01-13 14:06:18', 'Lewis'),
	(11, '', 1, '/assets/images/content/bodega11.jpg', 'www.baidu.com', 'TU BODEGA', 1, '2020-01-13 13:50:47', 'Lewis', '2020-01-13 14:06:21', 'Lewis'),
	(12, '', 1, '/assets/images/content/bodega12.jpg', 'www.baidu.com', 'TU BODEGA', 1, '2020-01-13 13:50:50', 'Lewis', '2020-01-13 14:06:22', 'Lewis');
/*!40000 ALTER TABLE `f_bodega` ENABLE KEYS */;

-- 导出  表 vinosinfo.f_contact 结构
CREATE TABLE IF NOT EXISTS `f_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(48) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '姓名',
  `phone` varchar(24) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '电话号码',
  `email` varchar(48) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT 'email',
  `message` text CHARACTER SET utf8 NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `create_user` varchar(48) NOT NULL DEFAULT 'Lewis' COMMENT '创建人',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `update_user` varchar(48) NOT NULL DEFAULT 'Lewis' COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='联系表';

-- 正在导出表  vinosinfo.f_contact 的数据：~3 rows (大约)
/*!40000 ALTER TABLE `f_contact` DISABLE KEYS */;
INSERT INTO `f_contact` (`id`, `name`, `phone`, `email`, `message`, `create_time`, `create_user`, `update_time`, `update_user`) VALUES
	(1, 'a', '', 'lxx0103@yahoo.com', '', '2020-01-14 01:43:31', 'Lewis', '2020-01-14 01:43:31', 'Lewis'),
	(2, '123412341234', '1234', 'lxx0103@yahoo.com', '1234', '2020-01-14 01:46:10', 'Lewis', '2020-01-14 01:46:10', 'Lewis'),
	(3, '????', '????', 'lxx0103@yahoo.com', '????', '2020-01-15 04:37:20', 'Lewis', '2020-01-15 04:37:20', 'Lewis');
/*!40000 ALTER TABLE `f_contact` ENABLE KEYS */;

-- 导出  表 vinosinfo.f_map 结构
CREATE TABLE IF NOT EXISTS `f_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_id` tinyint(4) NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL DEFAULT '',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `create_user` varchar(48) NOT NULL DEFAULT 'Lewis' COMMENT '创建人',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `update_user` varchar(48) NOT NULL DEFAULT 'Lewis' COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- 正在导出表  vinosinfo.f_map 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `f_map` DISABLE KEYS */;
INSERT INTO `f_map` (`id`, `zone_id`, `img`, `create_time`, `create_user`, `update_time`, `update_user`) VALUES
	(1, 1, '/uploads/1579105123.png', '2020-01-16 00:07:57', 'Lewis', '2020-01-16 00:18:44', 'lewis'),
	(2, 2, '/uploads/1579104562.png', '2020-01-16 00:07:59', 'Lewis', '2020-01-16 00:09:23', 'lewis'),
	(3, 3, '/uploads/1579104572.png', '2020-01-16 00:08:01', 'Lewis', '2020-01-16 00:09:33', 'lewis'),
	(4, 4, '/uploads/1579104579.png', '2020-01-16 00:08:03', 'Lewis', '2020-01-16 00:09:40', 'lewis'),
	(5, 5, '/uploads/1579104587.png', '2020-01-16 00:08:06', 'Lewis', '2020-01-16 00:09:48', 'lewis'),
	(6, 6, '/uploads/1579104594.png', '2020-01-16 00:08:09', 'Lewis', '2020-01-16 00:09:55', 'lewis');
/*!40000 ALTER TABLE `f_map` ENABLE KEYS */;

-- 导出  表 vinosinfo.f_menu 结构
CREATE TABLE IF NOT EXISTS `f_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL DEFAULT '',
  `is_show_top` tinyint(4) NOT NULL DEFAULT '0',
  `is_show_bottom` tinyint(4) NOT NULL DEFAULT '0',
  `controller` varchar(24) NOT NULL DEFAULT '' COMMENT '对应控制器',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `create_user` varchar(48) NOT NULL DEFAULT 'Lewis' COMMENT '创建人',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `update_user` varchar(48) NOT NULL DEFAULT 'Lewis' COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='前端菜单';

-- 正在导出表  vinosinfo.f_menu 的数据：~7 rows (大约)
/*!40000 ALTER TABLE `f_menu` DISABLE KEYS */;
INSERT INTO `f_menu` (`id`, `name`, `is_show_top`, `is_show_bottom`, `controller`, `create_time`, `create_user`, `update_time`, `update_user`) VALUES
	(1, 'INICIO', 1, 1, 'index', '2020-01-11 20:21:02', 'Lewis', '2020-01-13 12:34:37', 'Lewis'),
	(2, 'AVISO LEGAL', 0, 1, 'legal', '2020-01-11 20:25:45', 'Lewis', '2020-01-13 12:34:51', 'Lewis'),
	(3, 'BODEGAS', 1, 0, 'bodegas', '2020-01-11 20:22:56', 'Lewis', '2020-01-13 12:35:15', 'Lewis'),
	(4, 'VINOS', 1, 0, 'vinos', '2020-01-11 20:23:12', 'Lewis', '2020-01-13 12:35:19', 'Lewis'),
	(5, 'NOSOTROS', 1, 1, 'nosotros', '2020-01-11 20:23:39', 'Lewis', '2020-01-13 12:35:23', 'Lewis'),
	(6, 'SERVICIOS', 1, 1, 'servicios', '2020-01-11 20:24:04', 'Lewis', '2020-01-13 12:35:29', 'Lewis'),
	(7, 'CONTACTO', 1, 1, 'contacto', '2020-01-11 20:24:25', 'Lewis', '2020-01-13 12:35:34', 'Lewis');
/*!40000 ALTER TABLE `f_menu` ENABLE KEYS */;

-- 导出  表 vinosinfo.f_slide 结构
CREATE TABLE IF NOT EXISTS `f_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `desc` varchar(48) NOT NULL DEFAULT '',
  `is_show` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `create_user` varchar(48) NOT NULL DEFAULT 'Lewis' COMMENT '创建人',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `update_user` varchar(48) NOT NULL DEFAULT 'Lewis' COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='前端轮播';

-- 正在导出表  vinosinfo.f_slide 的数据：~24 rows (大约)
/*!40000 ALTER TABLE `f_slide` DISABLE KEYS */;
INSERT INTO `f_slide` (`id`, `type`, `img`, `url`, `desc`, `is_show`, `create_time`, `create_user`, `update_time`, `update_user`) VALUES
	(1, 1, '/assets/images/content/slide1.jpg', 'www.google.com', 'Descripcion de la bodega', 1, '2020-01-11 20:33:05', 'Lewis', '2020-01-15 23:44:12', 'Lewis'),
	(2, 1, '/assets/images/content/slide2.jpg', '', 'Descripcion de la bodega', 1, '2020-01-11 20:33:17', 'Lewis', '2020-01-14 02:04:43', 'Lewis'),
	(3, 1, '/assets/images/content/slide3.jpg', '', 'Descripcion de la bodega', 1, '2020-01-11 20:33:26', 'Lewis', '2020-01-14 02:04:46', 'Lewis'),
	(5, 2, '/assets/images/content/slide1.jpg', '', 'Descripcion de la bodega', 1, '2020-01-11 20:33:38', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(6, 2, '/assets/images/content/slide1.jpg', '', 'Descripcion de la bodega', 1, '2020-01-11 20:33:41', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(7, 2, '/assets/images/content/slide1.jpg', '', 'Descripcion de la bodega', 1, '2020-01-11 20:33:43', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(8, 2, '/assets/images/content/slide1.jpg', '', 'Descripcion de la bodega', 0, '2020-01-11 20:33:47', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(9, 3, '/assets/images/content/slide1.jpg', '', 'Tu vino', 1, '2020-01-11 20:33:52', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(10, 3, '/assets/images/content/slide1.jpg', '', 'Tu vino', 1, '2020-01-11 20:33:55', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(11, 3, '/assets/images/content/slide1.jpg', '', 'Tu vino', 1, '2020-01-11 20:33:57', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(12, 3, '/assets/images/content/slide1.jpg', '', 'Tu vino', 0, '2020-01-11 20:34:02', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(13, 4, '/assets/images/content/slide1.jpg', '', 'Tu vino', 1, '2020-01-11 20:34:08', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(14, 4, '/assets/images/content/slide1.jpg', '', 'Tu vino', 1, '2020-01-11 20:34:11', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(15, 4, '/assets/images/content/slide1.jpg', '', 'Tu vino', 1, '2020-01-11 20:34:13', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(16, 4, '/assets/images/content/slide1.jpg', '', 'Tu vino', 0, '2020-01-11 20:34:15', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(17, 5, '/assets/images/content/slide1.jpg', '', 'Tu vino', 1, '2020-01-11 20:34:17', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(18, 5, '/assets/images/content/slide1.jpg', '', 'Tu vino', 1, '2020-01-11 20:34:20', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(19, 5, '/assets/images/content/slide1.jpg', '', 'Tu vino', 1, '2020-01-11 20:34:22', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(20, 5, '/assets/images/content/slide1.jpg', '', 'Tu vino', 0, '2020-01-11 20:34:24', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(21, 6, '/assets/images/content/slide1.jpg', '', 'Tu vino', 1, '2020-01-11 20:34:37', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(22, 6, '/assets/images/content/slide1.jpg', '', 'Tu vino', 1, '2020-01-11 20:34:46', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(23, 6, '/assets/images/content/slide1.jpg', '', 'Tu vino', 1, '2020-01-11 20:34:50', 'Lewis', '2020-01-14 02:04:31', 'Lewis'),
	(24, 6, '/assets/images/content/slide1.jpg', '', 'Tu vino', 0, '2020-01-11 20:34:52', 'Lewis', '2020-01-14 02:04:31', 'Lewis');
/*!40000 ALTER TABLE `f_slide` ENABLE KEYS */;

-- 导出  表 vinosinfo.f_type 结构
CREATE TABLE IF NOT EXISTS `f_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '',
  `is_show` tinyint(4) NOT NULL DEFAULT '0',
  `row` tinyint(4) NOT NULL DEFAULT '0' COMMENT '第几行',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `create_user` varchar(48) CHARACTER SET latin1 NOT NULL DEFAULT 'Lewis' COMMENT '创建人',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `update_user` varchar(48) CHARACTER SET latin1 NOT NULL DEFAULT 'Lewis' COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='红酒类型';

-- 正在导出表  vinosinfo.f_type 的数据：~20 rows (大约)
/*!40000 ALTER TABLE `f_type` DISABLE KEYS */;
INSERT INTO `f_type` (`id`, `name`, `is_show`, `row`, `create_time`, `create_user`, `update_time`, `update_user`) VALUES
	(1, 'D.O.C.', 1, 1, '2020-01-14 00:10:02', 'Lewis', '2020-01-15 04:23:04', 'lewis'),
	(2, 'D.O.', 1, 1, '2020-01-14 00:10:02', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(3, 'VdlT', 1, 1, '2020-01-14 00:10:02', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(4, 'V.C.', 1, 1, '2020-01-14 00:10:02', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(5, 'Vinos de mesa', 1, 1, '2020-01-14 00:10:02', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(6, 'Vino Tinto', 1, 2, '2020-01-14 00:10:02', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(7, 'Tinto Crianza', 1, 2, '2020-01-14 00:10:02', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(8, 'Tinto Reserva', 1, 2, '2020-01-14 00:10:02', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(9, 'Tinto Gran Reserva', 1, 2, '2020-01-14 00:10:02', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(10, 'Tinto Roble', 1, 2, '2020-01-14 00:10:02', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(11, 'Tinto Joven', 1, 2, '2020-01-14 00:10:02', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(12, 'Blanco', 1, 3, '2020-01-14 00:10:02', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(13, 'Blanco dulce', 1, 3, '2020-01-14 00:10:02', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(14, 'Blanco con crianza', 1, 3, '2020-01-14 00:10:03', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(15, 'Blanco en barrica', 1, 3, '2020-01-14 00:10:03', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(16, 'Vino Rosado', 1, 3, '2020-01-14 00:10:03', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(17, 'Espumoso', 1, 4, '2020-01-14 00:10:03', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(18, 'Cava', 1, 4, '2020-01-14 00:10:03', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(19, 'Cava Reserva', 1, 4, '2020-01-14 00:10:03', 'Lewis', '2020-01-14 00:11:42', 'Lewis'),
	(21, 'Cava Gran Reserva', 1, 4, '2020-01-16 00:33:21', 'lewis', '2020-01-16 00:33:21', 'lewis');
/*!40000 ALTER TABLE `f_type` ENABLE KEYS */;

-- 导出  表 vinosinfo.f_vino 结构
CREATE TABLE IF NOT EXISTS `f_vino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(48) NOT NULL DEFAULT '',
  `type_id` tinyint(4) NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `desc` varchar(48) NOT NULL DEFAULT '',
  `is_show` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `create_user` varchar(48) CHARACTER SET latin1 NOT NULL DEFAULT 'Lewis' COMMENT '创建人',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `update_user` varchar(48) CHARACTER SET latin1 NOT NULL DEFAULT 'Lewis' COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='红酒';

-- 正在导出表  vinosinfo.f_vino 的数据：~12 rows (大约)
/*!40000 ALTER TABLE `f_vino` DISABLE KEYS */;
INSERT INTO `f_vino` (`id`, `name`, `type_id`, `img`, `url`, `desc`, `is_show`, `create_time`, `create_user`, `update_time`, `update_user`) VALUES
	(1, '', 1, '/assets/images/content/vino.jpg', 'www.google.com', 'TU VINO', 1, '2020-01-14 00:16:10', 'Lewis', '2020-01-15 04:29:50', 'lewis'),
	(2, '', 1, '/assets/images/content/vino.jpg', 'www.google.com', 'TU VINO', 1, '2020-01-14 00:16:10', 'Lewis', '2020-01-14 00:16:53', 'Lewis'),
	(3, '', 1, '/assets/images/content/vino.jpg', 'www.google.com', 'TU VINO', 1, '2020-01-14 00:16:11', 'Lewis', '2020-01-14 00:16:53', 'Lewis'),
	(4, '', 1, '/assets/images/content/vino.jpg', 'www.google.com', 'TU VINO', 1, '2020-01-14 00:16:11', 'Lewis', '2020-01-14 00:16:53', 'Lewis'),
	(5, '', 1, '/assets/images/content/vino.jpg', 'www.google.com', 'TU VINO', 1, '2020-01-14 00:16:12', 'Lewis', '2020-01-14 00:16:53', 'Lewis'),
	(6, '', 1, '/assets/images/content/vino.jpg', 'www.google.com', 'TU VINO', 1, '2020-01-14 00:16:12', 'Lewis', '2020-01-14 00:16:53', 'Lewis'),
	(7, '', 1, '/assets/images/content/vino.jpg', 'www.google.com', 'TU VINO', 1, '2020-01-14 00:16:12', 'Lewis', '2020-01-14 00:16:53', 'Lewis'),
	(8, '', 1, '/assets/images/content/vino.jpg', 'www.google.com', 'TU VINO', 1, '2020-01-14 00:16:13', 'Lewis', '2020-01-14 00:16:53', 'Lewis'),
	(9, '', 1, '/assets/images/content/vino.jpg', 'www.google.com', 'TU VINO', 1, '2020-01-14 00:16:13', 'Lewis', '2020-01-14 00:16:53', 'Lewis'),
	(10, '', 1, '/assets/images/content/vino.jpg', 'www.google.com', 'TU VINO', 1, '2020-01-14 00:16:14', 'Lewis', '2020-01-14 00:16:53', 'Lewis'),
	(11, '', 1, '/assets/images/content/vino.jpg', 'www.google.com', 'TU VINO', 1, '2020-01-14 00:16:14', 'Lewis', '2020-01-14 00:16:53', 'Lewis'),
	(12, '', 1, '/assets/images/content/vino.jpg', 'www.google.com', 'TU VINO', 1, '2020-01-14 00:16:14', 'Lewis', '2020-01-14 00:16:53', 'Lewis');
/*!40000 ALTER TABLE `f_vino` ENABLE KEYS */;

-- 导出  表 vinosinfo.f_zone 结构
CREATE TABLE IF NOT EXISTS `f_zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '',
  `is_show` tinyint(4) NOT NULL DEFAULT '0',
  `row` tinyint(4) NOT NULL DEFAULT '0' COMMENT '第几行',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `create_user` varchar(48) CHARACTER SET latin1 NOT NULL DEFAULT 'Lewis' COMMENT '创建人',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `update_user` varchar(48) CHARACTER SET latin1 NOT NULL DEFAULT 'Lewis' COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='酒庄地区';

-- 正在导出表  vinosinfo.f_zone 的数据：~17 rows (大约)
/*!40000 ALTER TABLE `f_zone` DISABLE KEYS */;
INSERT INTO `f_zone` (`id`, `name`, `is_show`, `row`, `create_time`, `create_user`, `update_time`, `update_user`) VALUES
	(1, 'Valle del Río Ebro', 1, 1, '2020-01-11 21:44:30', 'Lewis', '2020-01-15 01:34:36', 'lewis'),
	(2, 'Meseta Central', 1, 1, '2020-01-11 21:44:36', 'Lewis', '2020-01-13 13:18:21', 'Lewis'),
	(3, 'Valle del Río Duero', 1, 1, '2020-01-11 21:44:43', 'Lewis', '2020-01-13 13:18:22', 'Lewis'),
	(4, 'Costa Mediterránea', 1, 1, '2020-01-11 21:44:50', 'Lewis', '2020-01-13 13:18:23', 'Lewis'),
	(5, 'Noroeste de España', 1, 1, '2020-01-11 21:44:57', 'Lewis', '2020-01-13 13:18:24', 'Lewis'),
	(6, 'Andalucía', 1, 1, '2020-01-11 21:45:02', 'Lewis', '2020-01-13 13:18:25', 'Lewis'),
	(7, 'Rioja', 1, 2, '2020-01-13 13:19:04', 'Lewis', '2020-01-13 13:21:38', 'Lewis'),
	(8, 'Navarra', 1, 2, '2020-01-13 13:19:15', 'Lewis', '2020-01-13 13:21:37', 'Lewis'),
	(9, 'Madrid', 1, 2, '2020-01-13 13:19:22', 'Lewis', '2020-01-13 13:21:36', 'Lewis'),
	(10, 'La Mancha', 1, 2, '2020-01-13 13:19:35', 'Lewis', '2020-01-13 13:21:35', 'Lewis'),
	(11, 'Castilla y León', 1, 2, '2020-01-13 13:19:43', 'Lewis', '2020-01-13 13:21:34', 'Lewis'),
	(12, 'Toro', 1, 2, '2020-01-13 13:19:50', 'Lewis', '2020-01-13 13:21:33', 'Lewis'),
	(13, 'Ribera del Duero', 1, 2, '2020-01-13 13:19:59', 'Lewis', '2020-01-13 13:21:32', 'Lewis'),
	(14, 'León', 1, 2, '2020-01-13 13:20:08', 'Lewis', '2020-01-13 13:21:31', 'Lewis'),
	(15, 'Cataluña', 1, 2, '2020-01-13 13:20:20', 'Lewis', '2020-01-13 13:21:30', 'Lewis'),
	(16, 'Valencia', 1, 2, '2020-01-13 13:20:29', 'Lewis', '2020-01-13 13:21:29', 'Lewis'),
	(17, 'Alicante', 1, 2, '2020-01-13 13:20:39', 'Lewis', '2020-01-13 13:21:27', 'Lewis'),
	(18, 'Murcia', 1, 2, '2020-01-13 13:20:48', 'Lewis', '2020-01-13 13:21:26', 'Lewis'),
	(19, 'Galicia', 1, 2, '2020-01-13 13:20:57', 'Lewis', '2020-01-13 13:21:25', 'Lewis'),
	(21, 'Cádiz', 1, 2, '2020-01-16 00:36:44', 'lewis', '2020-01-16 00:36:56', 'lewis');
/*!40000 ALTER TABLE `f_zone` ENABLE KEYS */;

-- 导出  表 vinosinfo.s_menu 结构
CREATE TABLE IF NOT EXISTS `s_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单名称',
  `dir` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单目录',
  `controller` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单控制器',
  `method` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单方法',
  `is_enable` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否启用，0否1是',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级菜单id',
  `need_privilege` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否需要权限',
  `is_hidden` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示在菜单',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `create_user` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '创建人',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `update_user` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '更新人',
  PRIMARY KEY (`id`),
  KEY `is_enable` (`is_enable`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='菜单表';

-- 正在导出表  vinosinfo.s_menu 的数据：~13 rows (大约)
/*!40000 ALTER TABLE `s_menu` DISABLE KEYS */;
INSERT INTO `s_menu` (`id`, `name`, `dir`, `controller`, `method`, `is_enable`, `parent_id`, `need_privilege`, `is_hidden`, `create_time`, `create_user`, `update_time`, `update_user`) VALUES
	(1, '我的主页', 'admin', 'home', '', 1, 0, 1, 0, '2017-11-04 16:43:15', 'LIUXU', '2020-01-14 03:31:25', 'LIUXU'),
	(5, '权限管理', '', '', '', 1, 0, 1, 0, '2017-11-04 17:08:48', 'LIUXU', '2017-11-05 17:35:31', 'LIUXU'),
	(9, '菜单管理', 'admin', 'menu', '', 1, 5, 1, 0, '2017-11-04 17:08:48', 'LIUXU', '2020-01-14 03:37:45', 'LIUXU'),
	(14, '数据录入', '', '', '', 1, 0, 1, 0, '2017-11-11 17:06:58', 'a', '2020-01-14 03:42:46', 'lewis'),
	(15, '地区列表', 'admin', 'zone', '', 1, 14, 1, 0, '2017-11-11 17:26:59', 'a', '2020-01-15 01:12:40', 'lewis'),
	(18, '酒庄列表', 'admin', 'bodega', '', 1, 14, 1, 0, '2017-11-14 17:22:57', 'LIUXU', '2020-01-15 03:09:02', 'lewis'),
	(21, '红酒类型列表', 'admin', 'type', '', 1, 14, 1, 0, '2017-11-15 20:31:11', 'LIUXU', '2020-01-15 04:21:45', 'lewis'),
	(24, '留言管理', '', '', '', 1, 0, 1, 0, '2017-11-19 15:36:11', 'LIUXU', '2020-01-15 04:30:23', 'lewis'),
	(28, '红酒列表', 'admin', 'vino', '', 1, 14, 1, 0, '2017-11-19 16:11:42', 'LIUXU', '2020-01-15 04:23:45', 'lewis'),
	(31, '留言列表', 'admin', 'contact', '', 1, 24, 1, 0, '2017-11-19 17:10:25', 'LIUXU', '2020-01-15 04:36:34', 'lewis'),
	(32, '图片管理', '', '', '', 1, 0, 1, 0, '2020-01-15 23:29:31', 'lewis', '2020-01-15 23:29:31', 'lewis'),
	(33, '轮播图列表', 'admin', 'slide', '', 1, 32, 1, 0, '2020-01-15 23:29:56', 'lewis', '2020-01-15 23:29:56', 'lewis'),
	(34, '地图列表', 'admin', 'map', '', 1, 32, 1, 0, '2020-01-15 23:56:24', 'lewis', '2020-01-15 23:56:24', 'lewis');
/*!40000 ALTER TABLE `s_menu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
