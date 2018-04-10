/*
Navicat MySQL Data Transfer

Source Server         : laravel
Source Server Version : 50721
Source Host           : 127.0.0.1:33060
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-04-10 10:01:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_admin
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin`;
CREATE TABLE `blog_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `create_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='//管理员表';

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
INSERT INTO `blog_admin` VALUES ('1', 'admin', 'eyJpdiI6ImMwdno5dmVreCtGRjBQNUlsKzBhUHc9PSIsInZhbHVlIjoiQmFUclJFSTRhSWQyaEpHQXNFUTUxUT09IiwibWFjIjoiMDRhMTc2OTg5YjE3YzdhM2YyODI1YTkwZjQxM2YzOWUxNjMyODc0MjFmM2FmYzJmODhjN2QxN2NkZDI3NDcyYSJ9', '0');

-- ----------------------------
-- Table structure for blog_category
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `cate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) NOT NULL DEFAULT '' COMMENT '//类别名称',
  `cate_title` varchar(255) NOT NULL DEFAULT '' COMMENT '//类别标题',
  `cate_pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '//上级cate_id',
  `cate_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '//seo关键词',
  `cate_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '//seo描述',
  `cate_scan` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '//浏览次数',
  `cate_order` mediumint(4) unsigned NOT NULL DEFAULT '0' COMMENT '//排序',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '//添加时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '//更新时间',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='//文章分类表';

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('1', '财经', '全国财经信息', '0', '', '', '0', '0', '1523324251', '1523324351');
INSERT INTO `blog_category` VALUES ('2', '新闻', '新闻资讯，来这里转转', '0', '', '', '0', '0', '1523324444', '1523324555');
INSERT INTO `blog_category` VALUES ('3', '娱乐', '娱乐八卦，尽在你手', '0', '', '', '0', '0', '1523324666', '1523324777');
