/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : localhost:3307
Source Database       : printing

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2017-10-17 20:36:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for app_users
-- ----------------------------
DROP TABLE IF EXISTS `app_users`;
CREATE TABLE `app_users` (
  `id_users` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1=admin ,2=pihak jurusan ,3=pegawai ,4=mahasiswa',
  `last_login` datetime NOT NULL,
  PRIMARY KEY  (`id_users`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_users
-- ----------------------------
INSERT INTO `app_users` VALUES ('1', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '2017-10-17 20:06:39');
INSERT INTO `app_users` VALUES ('13', 'printing', 'User Printing', '202cb962ac59075b964b07152d234b70', '3', '2017-10-14 21:00:18');
INSERT INTO `app_users` VALUES ('12', 'dit', 'Dept IT', '202cb962ac59075b964b07152d234b70', '2', '2017-10-14 20:59:54');
