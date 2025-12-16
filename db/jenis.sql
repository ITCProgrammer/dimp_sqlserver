/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : localhost:3307
Source Database       : printing

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2017-10-17 20:37:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for jenis
-- ----------------------------
DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis` (
  `jenis_id` smallint(1) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  PRIMARY KEY  (`jenis_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jenis
-- ----------------------------
INSERT INTO `jenis` VALUES ('1', 'Chemicals');
INSERT INTO `jenis` VALUES ('2', 'Dyestuffs');
INSERT INTO `jenis` VALUES ('3', 'PASTA');
