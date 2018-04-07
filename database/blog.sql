/*
Navicat MySQL Data Transfer

Source Server         : laravel
Source Server Version : 50721
Source Host           : 127.0.0.1:33060
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-04-07 22:00:29
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
  `create_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
INSERT INTO `blog_admin` VALUES ('1', 'admin', 'eyJpdiI6IjRvTEYxeG9yZStNWG1ZM2c2U1J5bHc9PSIsInZhbHVlIjoicWN3MGc4bG9nUW9OTHo5R0JXbllHUT09IiwibWFjIjoiNjFiNDhiOTRlMzM5ZWI0ODdmOTJhYzBkNDIwZGMxY2IwNzUzOWU1ZTYzYTJlM2Y1ZDRiNzIwNjQ4MWY0MmFmNiJ9', '0');
