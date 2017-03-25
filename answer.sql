/*
Navicat MySQL Data Transfer

Source Server         : host
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : answer

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-15 18:28:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for an_admin
-- ----------------------------
DROP TABLE IF EXISTS `an_admin`;
CREATE TABLE `an_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '管理员账号',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_admin
-- ----------------------------
INSERT INTO `an_admin` VALUES ('1', 'admin', '4a7d1ed414474e4033ac29ccb8653d9b');

-- ----------------------------
-- Table structure for an_appointment
-- ----------------------------
DROP TABLE IF EXISTS `an_appointment`;
CREATE TABLE `an_appointment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL DEFAULT '0' COMMENT '学生id',
  `teacherid` int(11) NOT NULL DEFAULT '0' COMMENT '教师id',
  `appointmenttime` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '约定时间 1,2.3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_appointment
-- ----------------------------

-- ----------------------------
-- Table structure for an_article
-- ----------------------------
DROP TABLE IF EXISTS `an_article`;
CREATE TABLE `an_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `keys` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '关键字 a,b,c',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '文章类型 0：提问 1：已被解答的问题 2：文章',
  `time` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_article
-- ----------------------------

-- ----------------------------
-- Table structure for an_class
-- ----------------------------
DROP TABLE IF EXISTS `an_class`;
CREATE TABLE `an_class` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seriesid` int(11) NOT NULL DEFAULT '0' COMMENT '系id',
  `classname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '班级名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_class
-- ----------------------------
INSERT INTO `an_class` VALUES ('1', '1', '文学系一班');

-- ----------------------------
-- Table structure for an_grade
-- ----------------------------
DROP TABLE IF EXISTS `an_grade`;
CREATE TABLE `an_grade` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seriesid` int(11) NOT NULL DEFAULT '0' COMMENT '系id',
  `gradename` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '年级名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_grade
-- ----------------------------
INSERT INTO `an_grade` VALUES ('1', '0', '一年级');

-- ----------------------------
-- Table structure for an_keys
-- ----------------------------
DROP TABLE IF EXISTS `an_keys`;
CREATE TABLE `an_keys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `keyname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '关键字名',
  `order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序等级，越高越前面',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_keys
-- ----------------------------

-- ----------------------------
-- Table structure for an_reply
-- ----------------------------
DROP TABLE IF EXISTS `an_reply`;
CREATE TABLE `an_reply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contents` text COLLATE utf8_unicode_ci NOT NULL COMMENT '评论或问题的解答',
  `artcleid` int(11) NOT NULL DEFAULT '0' COMMENT '文章id或问题id',
  `time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '解答时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_reply
-- ----------------------------

-- ----------------------------
-- Table structure for an_series
-- ----------------------------
DROP TABLE IF EXISTS `an_series`;
CREATE TABLE `an_series` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seriesname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '系',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_series
-- ----------------------------
INSERT INTO `an_series` VALUES ('1', '文学系');

-- ----------------------------
-- Table structure for an_student
-- ----------------------------
DROP TABLE IF EXISTS `an_student`;
CREATE TABLE `an_student` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `realname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '学生姓名（真实姓名）',
  `classid` int(11) NOT NULL DEFAULT '0' COMMENT '学生班级id',
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '联系方式（必填）',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_student
-- ----------------------------
INSERT INTO `an_student` VALUES ('1', 'Jun', '1', '15818708414', '4a7d1ed414474e4033ac29ccb8653d9b');

-- ----------------------------
-- Table structure for an_teacher
-- ----------------------------
DROP TABLE IF EXISTS `an_teacher`;
CREATE TABLE `an_teacher` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `realname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '教师真实姓名',
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '联系方式',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '教师密码',
  `classid` int(11) NOT NULL DEFAULT '0' COMMENT '班级id',
  `leisuretime` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '空闲时间 1,2,3,4,5...24',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_teacher
-- ----------------------------
INSERT INTO `an_teacher` VALUES ('1', '德兴', '1311', '4a7d1ed414474e4033ac29ccb8653d9b', '0', '');
