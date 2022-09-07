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

 Date: 05/09/2022 11:39:33
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for partners
-- ----------------------------
DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners`  (
  `partner_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`partner_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of partners
-- ----------------------------
INSERT INTO `partners` VALUES (1, 'Marko', 'Markovic');
INSERT INTO `partners` VALUES (2, 'Petar', 'Petrović');
INSERT INTO `partners` VALUES (3, 'Nevena', 'Nevenic');
INSERT INTO `partners` VALUES (4, 'Dusan', 'Dusan Drugi');

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions`  (
  `position_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`position_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of positions
-- ----------------------------
INSERT INTO `positions` VALUES (1, 'backend developer', 'backend developer work on backend');
INSERT INTO `positions` VALUES (2, 'frontend developer', 'frontend developer work on frontend');
INSERT INTO `positions` VALUES (6, 'fullstack', 'work all');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type`  (
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
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `gender` enum('Male','Female') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cv` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  INDEX `fk_user_position_id`(`position_id`) USING BTREE,
  INDEX `fk_user_type_id`(`type_id`) USING BTREE,
  CONSTRAINT `fk_user_position_id` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_user_type_id` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Marko', 'Markovic', 2, 1, 'Male', 'picture.png', 'MilutinovicNemanja.pdf');
INSERT INTO `users` VALUES (2, 'Petar', 'Petrović', 2, 1, 'Male', 'picture.png', 'MilutinovicNemanja.pdf');
INSERT INTO `users` VALUES (3, 'Nevena', 'Nevenic', 1, 1, 'Female', 'picture.png', 'sample.pdf');
INSERT INTO `users` VALUES (4, 'Dusan', 'Dusan Drugi', 6, 1, 'Male', 'picture.png', 'sample.pdf');

-- ----------------------------
-- Procedure structure for add_new_user_to_partners
-- ----------------------------
DROP PROCEDURE IF EXISTS `add_new_user_to_partners`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_new_user_to_partners`(IN first_name varchar(64),IN last_name varchar(64))
BEGIN
	
	INSERT INTO partners (partners.first_name, partners.last_name) VALUES(first_name, last_name);

END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
