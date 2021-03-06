/*
Navicat MySQL Data Transfer

Source Server         : laravel
Source Server Version : 50721
Source Host           : 127.0.0.1:33060
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-04-12 17:07:30
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
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `atr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `atr_title` varchar(100) DEFAULT '' COMMENT '//文章标题',
  `atr_tag` varchar(100) DEFAULT '' COMMENT '//关键词',
  `art_desc` varchar(200) DEFAULT '' COMMENT '//文章描述',
  `art_thumb` varchar(255) DEFAULT '' COMMENT '//缩略图',
  `art_content` text,
  `art_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '//文章添加时间',
  `art_author` varchar(64) DEFAULT '' COMMENT '//文章作者',
  `art_view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '//浏览量',
  PRIMARY KEY (`atr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章列表';

-- ----------------------------
-- Records of blog_article
-- ----------------------------

-- ----------------------------
-- Table structure for blog_category
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `cate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) DEFAULT '' COMMENT '//类别名称',
  `cate_title` varchar(255) DEFAULT '' COMMENT '//类别标题',
  `cate_pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '//上级cate_id',
  `cate_keywords` varchar(255) DEFAULT '' COMMENT '//seo关键词',
  `cate_desc` varchar(255) DEFAULT '' COMMENT '//seo描述',
  `cate_order` mediumint(4) unsigned NOT NULL DEFAULT '0' COMMENT '//排序',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '//添加时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '//更新时间',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='//文章分类表';

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('1', '财经', '全国财经信息', '0', '', '', '10', '1523324251', '1523324351');
INSERT INTO `blog_category` VALUES ('2', '新闻', '新闻资讯，来这里转转', '0', '', '', '0', '1523324444', '1523324555');
INSERT INTO `blog_category` VALUES ('3', '娱乐', '娱乐八卦，尽在你手', '0', '', '', '0', '1523324666', '1523324777');
INSERT INTO `blog_category` VALUES ('4', '国内新闻', '国内重要新鲜资讯，下载APP随时推送', '2', '', '', '0', '1523324251', '1523324251');
INSERT INTO `blog_category` VALUES ('5', '体育新闻', '国足男篮，统统有料', '2', '', '', '0', '1523324251', '1523324251');
INSERT INTO `blog_category` VALUES ('6', '科技新闻', '科技新闻，有创意的大脑在这里', '2', '', '', '0', '1523324251', '1523324251');
INSERT INTO `blog_category` VALUES ('7', '生活消费', '生活还是要继续', '1', '', '', '15', '1523324251', '1523324251');
INSERT INTO `blog_category` VALUES ('8', '资产理财', '你不理财财不理你', '1', '', '', '0', '1523324251', '1523324251');
INSERT INTO `blog_category` VALUES ('9', '直播', '大家现在都在搞直播', '0', '直播', '直播行业乱象丛生', '99', '0', '0');
INSERT INTO `blog_category` VALUES ('21', '测试555', '测试555', '0', '333', '测试222', '55', '1523438824', '1523501631');
INSERT INTO `blog_category` VALUES ('27', '5555', '55', '21', '555', '55', '55', '1523519891', '1523519891');
