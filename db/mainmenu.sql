/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : localhost:3307
Source Database       : printing

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2017-10-17 20:37:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mainmenu
-- ----------------------------
DROP TABLE IF EXISTS `mainmenu`;
CREATE TABLE `mainmenu` (
  `id_mainmenu` int(11) NOT NULL auto_increment,
  `nama_mainmenu` varchar(100) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `link` varchar(50) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1= admin,2=jurusan,3 dosen',
  PRIMARY KEY  (`id_mainmenu`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mainmenu
-- ----------------------------
INSERT INTO `mainmenu` VALUES ('1', 'master data', 'fa fa-bar-chart-o', 'y', '#', '1');
INSERT INTO `mainmenu` VALUES ('2', 'proses', 'fa fa-building-o', 'y', '#', '1');
INSERT INTO `mainmenu` VALUES ('3', 'data', 'gi gi-address_book', 'y', '#', '1');
INSERT INTO `mainmenu` VALUES ('4', 'users', 'gi gi-qrcode', 'y', 'users', '1');
INSERT INTO `mainmenu` VALUES ('5', 'laporan', 'gi gi-notes_2', 't', '#', '1');
INSERT INTO `mainmenu` VALUES ('6', 'data', 'gi gi-address_book', 'y', '#', '2');
INSERT INTO `mainmenu` VALUES ('7', 'laporan', 'gi gi-notes_2', 't', '#', '2');
INSERT INTO `mainmenu` VALUES ('8', 'master data', 'fa fa-bar-chart-o', 'y', '#', '3');
INSERT INTO `mainmenu` VALUES ('9', 'proses', 'fa fa-building-o', 'y', '#', '3');
INSERT INTO `mainmenu` VALUES ('10', 'data', 'gi gi-address_book', 'y', '#', '3');
INSERT INTO `mainmenu` VALUES ('11', 'laporan', 'gi gi-notes_2', 't', '#', '3');
