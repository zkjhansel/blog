/*
Navicat MySQL Data Transfer

Source Server         : laravel
Source Server Version : 50721
Source Host           : 127.0.0.1:33060
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-04-07 18:25:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_admin
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin`;
CREATE TABLE `blog_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
