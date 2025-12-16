/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : localhost:3307
Source Database       : printing

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2017-10-17 20:38:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for submenu
-- ----------------------------
DROP TABLE IF EXISTS `submenu`;
CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL auto_increment,
  `id_mainmenu` int(11) NOT NULL,
  `nama_submenu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `icon` varchar(30) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY  (`id_submenu`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of submenu
-- ----------------------------
INSERT INTO `submenu` VALUES ('1', '1', 'supplier', 'supplier', 'y', 'gi gi-cargo', '1');
INSERT INTO `submenu` VALUES ('2', '1', 'obat', 'obat', 'y', 'gi gi-notes', '1');
INSERT INTO `submenu` VALUES ('3', '1', 'mesin', 'mesin', 'y', 'fa fa-puzzle-piece', '1');
INSERT INTO `submenu` VALUES ('4', '1', 'design', 'design', 't', 'fa fa-keyboard-o', '1');
INSERT INTO `submenu` VALUES ('5', '2', 'purchase order', 'po', 'y', 'gi gi-book_open', '1');
INSERT INTO `submenu` VALUES ('6', '2', 'kartu kerja', 'kartukerja/order', 'y', 'fa fa-keyboard-o', '1');
INSERT INTO `submenu` VALUES ('7', '2', 'stock opname', 'opname', 't', 'gi gi-cart_in', '1');
INSERT INTO `submenu` VALUES ('8', '3', 'stock obat', 'stock', 'y', 'gi gi-notes_2', '1');
INSERT INTO `submenu` VALUES ('9', '3', 'stock masuk', 'stockin', 'y', 'gi gi-notes', '1');
INSERT INTO `submenu` VALUES ('10', '3', 'stock keluar', 'stockout', 't', 'gi gi-notes', '1');
INSERT INTO `submenu` VALUES ('11', '3', 'lost pasta', 'pasta', 't', 'fa fa-money', '1');
INSERT INTO `submenu` VALUES ('12', '5', 'laporan stock', 'rptstock', 't', 'hi hi-list-alt', '1');
INSERT INTO `submenu` VALUES ('13', '5', 'laporan produksi', 'rptproduksi', 't', 'hi hi-list-alt', '1');
INSERT INTO `submenu` VALUES ('14', '5', 'laporan lost pasta', 'rptpasta', 't', 'hi hi-list-alt', '1');
INSERT INTO `submenu` VALUES ('15', '6', 'stock obat', 'stock', 'y', 'gi gi-notes_2', '2');
INSERT INTO `submenu` VALUES ('16', '6', 'stock masuk', 'stockin', 'y', 'gi gi-notes', '2');
INSERT INTO `submenu` VALUES ('17', '6', 'stock keluar', 'stockout', 't', 'gi gi-notes', '2');
INSERT INTO `submenu` VALUES ('18', '6', 'lost pasta', 'pasta', 't', 'fa fa-money', '2');
INSERT INTO `submenu` VALUES ('19', '7', 'laporan stock', 'rptstock', 't', 'hi hi-list-alt', '2');
INSERT INTO `submenu` VALUES ('20', '7', 'laporan produksi', 'rptproduksi', 't', 'hi hi-list-alt', '2');
INSERT INTO `submenu` VALUES ('21', '7', 'laporan lost pasta', 'rptpasta', 't', 'hi hi-list-alt', '2');
INSERT INTO `submenu` VALUES ('22', '8', 'supplier', 'supplier', 'y', 'gi gi-cargo', '3');
INSERT INTO `submenu` VALUES ('23', '8', 'obat', 'obat', 'y', 'gi gi-notes', '3');
INSERT INTO `submenu` VALUES ('24', '8', 'mesin', 'mesin', 'y', 'fa fa-puzzle-piece', '3');
INSERT INTO `submenu` VALUES ('25', '8', 'design', 'design', 't', 'fa fa-keyboard-o', '3');
INSERT INTO `submenu` VALUES ('26', '9', 'purchase order', 'po', 'y', 'gi gi-book_open', '3');
INSERT INTO `submenu` VALUES ('27', '9', 'kartu kerja', 'kartukerja/order', 'y', 'fa fa-keyboard-o', '3');
INSERT INTO `submenu` VALUES ('28', '9', 'stock opname', 'opname', 't', 'gi gi-cart_in', '3');
INSERT INTO `submenu` VALUES ('29', '10', 'stock obat', 'stock', 'y', 'gi gi-notes_2', '3');
INSERT INTO `submenu` VALUES ('30', '10', 'stock masuk', 'stockin', 'y', 'gi gi-notes', '3');
INSERT INTO `submenu` VALUES ('31', '10', 'stock keluar', 'stockout', 't', 'gi gi-notes', '3');
INSERT INTO `submenu` VALUES ('32', '10', 'lost pasta', 'pasta', 't', 'fa fa-money', '3');
INSERT INTO `submenu` VALUES ('33', '11', 'laporan stock', 'rptstock', 't', 'hi hi-list-alt', '3');
INSERT INTO `submenu` VALUES ('34', '11', 'laporan produksi', 'rptproduksi', 't', 'hi hi-list-alt', '3');
INSERT INTO `submenu` VALUES ('35', '11', 'laporan lost pasta', 'rptpasta', 't', 'hi hi-list-alt', '3');
INSERT INTO `submenu` VALUES ('36', '1', 'metode', 'metode', 'y', 'fa fa-calendar', '1');
INSERT INTO `submenu` VALUES ('37', '8', 'metode', 'metode', 'y', 'fa fa-calendar', '3');
INSERT INTO `submenu` VALUES ('38', '1', 'data warna', 'warna', 'y', 'gi gi-notes', '1');
INSERT INTO `submenu` VALUES ('39', '8', 'data warna', 'warna', 'y', 'gi gi-notes', '3');
