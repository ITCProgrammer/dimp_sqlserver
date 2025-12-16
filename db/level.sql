/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : localhost:3307
Source Database       : printing

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2017-10-17 20:38:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `level_id` smallint(6) NOT NULL,
  `level_keterangan` varchar(20) default NULL,
  PRIMARY KEY  (`level_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES ('1', 'Admin');
INSERT INTO `level` VALUES ('2', 'Manager');
INSERT INTO `level` VALUES ('3', 'Staff');
