/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100131
 Source Host           : localhost:3306
 Source Schema         : kagera

 Target Server Type    : MySQL
 Target Server Version : 100131
 File Encoding         : 65001

 Date: 2022-09-08 09:48:41
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for partner
-- ----------------------------
DROP TABLE IF EXISTS `partner`;
CREATE TABLE `partner` (
  `partner_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`partner_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of partner
-- ----------------------------
INSERT INTO `partner` VALUES (1, 'Marko', 'Markovic');
INSERT INTO `partner` VALUES (2, 'Petar', 'Petrović');
INSERT INTO `partner` VALUES (3, 'Nevena', 'Nevenic');
INSERT INTO `partner` VALUES (4, 'Dusan', 'Dusan Drugi');

-- ----------------------------
-- Table structure for position
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `position_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`position_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of position
-- ----------------------------
INSERT INTO `position` VALUES (1, 'backend developer', 'backend developer work on backend');
INSERT INTO `position` VALUES (2, 'frontend developer', 'frontend developer work on frontend');
INSERT INTO `position` VALUES (6, 'fullstack', 'work all');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES (1, 'type one', 'blablabal');
INSERT INTO `type` VALUES (2, 'type two', 'lalalal');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `gender` enum('Male','Female') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `picture_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cv_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  INDEX `fk_user_position_id`(`position_id`) USING BTREE,
  INDEX `fk_user_type_id`(`type_id`) USING BTREE,
  CONSTRAINT `fk_user_position_id` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_user_type_id` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Marko', 'Markovic', 2, 1, 'Male', 'picture.png', 'MilutinovicNemanja.pdf');
INSERT INTO `user` VALUES (2, 'Petar', 'Petrović', 2, 1, 'Male', 'picture.png', 'MilutinovicNemanja.pdf');
INSERT INTO `user` VALUES (3, 'Nevena', 'Nevenic', 1, 1, 'Female', 'picture.png', 'sample.pdf');
INSERT INTO `user` VALUES (4, 'Dusan', 'Dusan Drugi', 6, 1, 'Male', 'picture.png', 'sample.pdf');

-- ----------------------------
-- Procedure structure for add_new_user_to_partners
-- ----------------------------
DROP PROCEDURE IF EXISTS `add_new_user_to_partners`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_new_user_to_partners`(IN first_name varchar(64),IN last_name varchar(64))
BEGIN
	
	INSERT INTO partner (partner.first_name, partner.last_name) VALUES(first_name, last_name);

END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
