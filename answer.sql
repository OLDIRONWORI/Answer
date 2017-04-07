/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : answer

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-04-07 20:58:15
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_appointment
-- ----------------------------
INSERT INTO `an_appointment` VALUES ('3', '1', '5', '1');
INSERT INTO `an_appointment` VALUES ('5', '1', '1', '2');

-- ----------------------------
-- Table structure for an_article
-- ----------------------------
DROP TABLE IF EXISTS `an_article`;
CREATE TABLE `an_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL DEFAULT '0' COMMENT '发布者id',
  `usertype` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '发布者身份',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `keys` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '关键字 a,b,c',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '文章类型 0：提问 1：已被解答的问题 2：文章',
  `time` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_article
-- ----------------------------
INSERT INTO `an_article` VALUES ('4', '1', 'student', 'asd', 'asdasd', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('5', '1', 'teacher', 'asd', 'asdasd', '1,2,3', '2', '0');
INSERT INTO `an_article` VALUES ('6', '1', 'student', '231', '342', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('7', '1', 'student', '223131', '324242', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('8', '1', 'student', 'asd', 'asdasd', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('9', '1', 'student', 'kljlkj', 'kljklj', '1,2,3', '1', '1490585603');
INSERT INTO `an_article` VALUES ('10', '1', 'student', '1111111111', '222222222222', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('11', '1', 'student', '111', '222', '1,2,3', '1', '1490585747');
INSERT INTO `an_article` VALUES ('12', '1', 'student', 'asd', 'asdsd', '1,2,3', '1', '1490586983');
INSERT INTO `an_article` VALUES ('13', '1', 'student', 'sdf', 'dsf', '1,2,3', '1', '1490587543');
INSERT INTO `an_article` VALUES ('14', '1', 'student', 'df', 'sadf', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('15', '1', 'student', 'sdf', 'f', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('16', '1', 'student', 'sf', 'sdf', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('17', '1', 'student', 'sdf', 'sf', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('18', '1', 'student', 'sdf', 'sdf', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('19', '1', 'student', 'sdf', 'sdf', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('20', '1', 'student', 'sdf', 'dsf', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('21', '1', 'student', 'sdf', 'sdf', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('22', '1', 'student', 'sdf', 'sdf', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('23', '1', 'student', 'sdf', 'sdf', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('24', '1', 'student', 'sdf', '水电费了	水电费困了就睡来看', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('25', '1', 'student', 'sdf', '水电费了	水电费困了就睡来看', '4', '1', '0');
INSERT INTO `an_article` VALUES ('26', '1', 'student', 'sdf', '水电费了	水电费困了就睡来看', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('27', '1', 'student', 'sdf', '水电费了	水电费困了就睡来看', '1,2,3', '0', '0');
INSERT INTO `an_article` VALUES ('28', '1', 'student', 'sdf', '水电费了	水电费困了水电费了	水电费困了就睡来看睡来看', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('29', '1', 'student', 'sdf', '水电费了	水电费困了就睡来看', '1,2,3', '0', '0');
INSERT INTO `an_article` VALUES ('30', '1', 'student', '123', '123', '1,2,3', '1', '0');
INSERT INTO `an_article` VALUES ('31', '1', 'student', '水电费了', '水电费困了就睡来看', '1,2,3', '1', '1490605101');
INSERT INTO `an_article` VALUES ('32', '1', 'student', '阿斯达所', '阿萨德阿萨德', '1,2,3', '1', '1490605476');
INSERT INTO `an_article` VALUES ('124', '1', 'teacher', '瑟瑟发抖', '士大夫但是', '5,1', '2', '1491396845');

-- ----------------------------
-- Table structure for an_class
-- ----------------------------
DROP TABLE IF EXISTS `an_class`;
CREATE TABLE `an_class` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gradeid` int(11) NOT NULL DEFAULT '0' COMMENT '系id',
  `classname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '班级名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_class
-- ----------------------------
INSERT INTO `an_class` VALUES ('1', '3', '文学系一年级三班');
INSERT INTO `an_class` VALUES ('2', '3', '文学系一年级二班');
INSERT INTO `an_class` VALUES ('3', '3', '文学系一年级一班');
INSERT INTO `an_class` VALUES ('5', '4', '生物系一年级二班');

-- ----------------------------
-- Table structure for an_collect
-- ----------------------------
DROP TABLE IF EXISTS `an_collect`;
CREATE TABLE `an_collect` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `articleid` int(11) NOT NULL DEFAULT '0' COMMENT '收藏的文章id',
  `usertype` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '收藏用户类型',
  `time` int(11) NOT NULL DEFAULT '0' COMMENT '收藏时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_collect
-- ----------------------------
INSERT INTO `an_collect` VALUES ('1', '1', '4', 'student', '0');
INSERT INTO `an_collect` VALUES ('6', '1', '5', 'student', '1490883423');
INSERT INTO `an_collect` VALUES ('7', '0', '0', '', '0');
INSERT INTO `an_collect` VALUES ('8', '1', '4', 'student', '1491398884');
INSERT INTO `an_collect` VALUES ('9', '1', '4', 'student', '1491398891');
INSERT INTO `an_collect` VALUES ('10', '1', '25', 'student', '1491398894');
INSERT INTO `an_collect` VALUES ('11', '1', '124', 'student', '1491399057');
INSERT INTO `an_collect` VALUES ('14', '1', '16', 'teacher', '1491482410');
INSERT INTO `an_collect` VALUES ('15', '1', '25', 'teacher', '1491482414');
INSERT INTO `an_collect` VALUES ('16', '1', '124', 'teacher', '1491482439');
INSERT INTO `an_collect` VALUES ('17', '1', '27', 'student', '1491487456');
INSERT INTO `an_collect` VALUES ('18', '1', '27', 'student', '1491487510');
INSERT INTO `an_collect` VALUES ('19', '1', '27', 'teacher', '1491488341');
INSERT INTO `an_collect` VALUES ('20', '1', '29', 'teacher', '1491488354');
INSERT INTO `an_collect` VALUES ('21', '1', '27', 'teacher', '1491566753');
INSERT INTO `an_collect` VALUES ('22', '1', '27', 'teacher', '1491566836');
INSERT INTO `an_collect` VALUES ('23', '1', '29', 'teacher', '1491566838');
INSERT INTO `an_collect` VALUES ('24', '1', '25', 'teacher', '1491566842');
INSERT INTO `an_collect` VALUES ('25', '1', '4', 'teacher', '1491566843');

-- ----------------------------
-- Table structure for an_grade
-- ----------------------------
DROP TABLE IF EXISTS `an_grade`;
CREATE TABLE `an_grade` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seriesid` int(11) NOT NULL DEFAULT '0' COMMENT '系id',
  `gradename` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '年级名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_grade
-- ----------------------------
INSERT INTO `an_grade` VALUES ('3', '1', '文学系一年级');
INSERT INTO `an_grade` VALUES ('4', '4', '生物系二年级');

-- ----------------------------
-- Table structure for an_keys
-- ----------------------------
DROP TABLE IF EXISTS `an_keys`;
CREATE TABLE `an_keys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `keyname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '关键字名',
  `order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序等级，越高越前面',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_keys
-- ----------------------------
INSERT INTO `an_keys` VALUES ('1', '教案', '10');
INSERT INTO `an_keys` VALUES ('2', '教材', '2');
INSERT INTO `an_keys` VALUES ('3', '教程', '1');
INSERT INTO `an_keys` VALUES ('4', '213', '123');
INSERT INTO `an_keys` VALUES ('5', 'rwe', '22');

-- ----------------------------
-- Table structure for an_reply
-- ----------------------------
DROP TABLE IF EXISTS `an_reply`;
CREATE TABLE `an_reply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contents` text COLLATE utf8_unicode_ci NOT NULL COMMENT '评论或问题的解答',
  `userid` int(11) NOT NULL DEFAULT '0' COMMENT '回答者id',
  `articleid` int(11) NOT NULL DEFAULT '0' COMMENT '文章id或问题id',
  `time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '解答时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_reply
-- ----------------------------
INSERT INTO `an_reply` VALUES ('1', 'qweqwe', '1', '10', '0');
INSERT INTO `an_reply` VALUES ('2', 'qweqwe', '1', '31', '1491396135');
INSERT INTO `an_reply` VALUES ('3', 'qweqwe', '1', '32', '1491396143');
INSERT INTO `an_reply` VALUES ('4', 'qweqwe', '1', '25', '1491396699');
INSERT INTO `an_reply` VALUES ('5', 'qweqwe', '1', '13', '1491396763');
INSERT INTO `an_reply` VALUES ('6', 'qweqwe', '1', '12', '1491396767');
INSERT INTO `an_reply` VALUES ('7', 'qweqwe', '1', '11', '1491396771');
INSERT INTO `an_reply` VALUES ('8', 'qweqwe', '1', '28', '1491396785');
INSERT INTO `an_reply` VALUES ('9', 'qweqwe', '1', '4', '1491479822');
INSERT INTO `an_reply` VALUES ('10', 'qweqwe', '1', '9', '1491479884');
INSERT INTO `an_reply` VALUES ('11', 'qweqwe', '1', '6', '1491479898');
INSERT INTO `an_reply` VALUES ('12', 'qweqwe', '1', '7', '1491479903');
INSERT INTO `an_reply` VALUES ('13', '是撒地方', '1', '8', '1491481806');
INSERT INTO `an_reply` VALUES ('14', '胜多负少', '1', '14', '1491481815');
INSERT INTO `an_reply` VALUES ('15', '士大夫但是', '1', '15', '1491481851');
INSERT INTO `an_reply` VALUES ('16', '士大夫', '1', '30', '1491481857');
INSERT INTO `an_reply` VALUES ('17', '是富士电机', '1', '16', '1491486183');
INSERT INTO `an_reply` VALUES ('18', '士大夫', '1', '17', '1491486268');
INSERT INTO `an_reply` VALUES ('19', '似懂非懂', '1', '18', '1491486282');
INSERT INTO `an_reply` VALUES ('20', '士大夫', '1', '24', '1491486285');
INSERT INTO `an_reply` VALUES ('21', '似的发射点', '1', '19', '1491486801');
INSERT INTO `an_reply` VALUES ('22', '士大夫', '1', '20', '1491486957');
INSERT INTO `an_reply` VALUES ('23', '斯达克警方\r\n', '1', '21', '1491487045');
INSERT INTO `an_reply` VALUES ('24', '胜多负少', '1', '22', '1491487229');
INSERT INTO `an_reply` VALUES ('25', '似的发射点', '1', '23', '1491487255');
INSERT INTO `an_reply` VALUES ('26', '看见了空间', '1', '26', '1491487345');

-- ----------------------------
-- Table structure for an_series
-- ----------------------------
DROP TABLE IF EXISTS `an_series`;
CREATE TABLE `an_series` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seriesname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '系',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_series
-- ----------------------------
INSERT INTO `an_series` VALUES ('1', '文学系');
INSERT INTO `an_series` VALUES ('4', '生物系');

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
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_student
-- ----------------------------
INSERT INTO `an_student` VALUES ('1', 'Jun', '1', '15818708414', '4a7d1ed414474e4033ac29ccb8653d9b', '0');
INSERT INTO `an_student` VALUES ('2', '342', '234', '234', '248e844336797ec98478f85e7626de4a', '1490759169');
INSERT INTO `an_student` VALUES ('3', '423', '423432', '432', 'faa9afea49ef2ff029a833cccc778fd0', '1490759293');
INSERT INTO `an_student` VALUES ('4', '342', '1', '423', '47257279d0b4f033e373b16e65f8f089', '1490759868');

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
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of an_teacher
-- ----------------------------
INSERT INTO `an_teacher` VALUES ('1', '德兴', '1311', '4a7d1ed414474e4033ac29ccb8653d9b', '1', '6,3,1', '0');
INSERT INTO `an_teacher` VALUES ('2', '22', '22', 'b6d767d2f8ed5d21a44b0e5886680cb9', '22', '1,2,3,16', '1490759146');
INSERT INTO `an_teacher` VALUES ('3', '432', '432', 'faa9afea49ef2ff029a833cccc778fd0', '42334', '1,2,3,16', '1490759302');
INSERT INTO `an_teacher` VALUES ('4', '42342', '42342', '325bea27a4f7aa6a93d6cdd1d0156237', '432423', '1,2,3,16', '1490759324');
INSERT INTO `an_teacher` VALUES ('5', '543', '543', '81448138f5f163ccdba4acc69819f280', '1', '2,3,6', '1490759890');
