<<<<<<< HEAD
/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : travelmoney

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 18/06/2020 10:13:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mainpeople
-- ----------------------------
DROP TABLE IF EXISTS `mainpeople`;
CREATE TABLE `mainpeople`  (
  `ID` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mainpeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mainpeople
-- ----------------------------
INSERT INTO `mainpeople` VALUES ('123', '黃');
INSERT INTO `mainpeople` VALUES ('123', '文');
INSERT INTO `mainpeople` VALUES ('123', '123');
INSERT INTO `mainpeople` VALUES ('123', '建');
INSERT INTO `mainpeople` VALUES ('123', '你好');
INSERT INTO `mainpeople` VALUES ('123', '好哦');
INSERT INTO `mainpeople` VALUES ('12344', '好的');
INSERT INTO `mainpeople` VALUES ('12344', '好');
INSERT INTO `mainpeople` VALUES ('1234', '好日');
INSERT INTO `mainpeople` VALUES ('1234', '明白');
INSERT INTO `mainpeople` VALUES ('1234', '哈佬');
INSERT INTO `mainpeople` VALUES ('123', '邊個');
INSERT INTO `mainpeople` VALUES ('123', 'BBB');
INSERT INTO `mainpeople` VALUES ('123', '好的');
INSERT INTO `mainpeople` VALUES ('1234', '1234');
INSERT INTO `mainpeople` VALUES ('66666', '好');
INSERT INTO `mainpeople` VALUES ('66666', '234');
INSERT INTO `mainpeople` VALUES ('233', '我');
INSERT INTO `mainpeople` VALUES ('233', '你');
INSERT INTO `mainpeople` VALUES ('233', '他');
INSERT INTO `mainpeople` VALUES ('0', '好');
INSERT INTO `mainpeople` VALUES ('0', '嗎');
INSERT INTO `mainpeople` VALUES ('789', '人');
INSERT INTO `mainpeople` VALUES ('789', '物');
INSERT INTO `mainpeople` VALUES ('0', '仌');

-- ----------------------------
-- Table structure for payrecord
-- ----------------------------
DROP TABLE IF EXISTS `payrecord`;
CREATE TABLE `payrecord`  (
  `ID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `paymoneypeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usemoneypeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `howmuchmoney` int(255) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payrecord
-- ----------------------------
INSERT INTO `payrecord` VALUES ('123', '黃', '文,123,建', 100);
INSERT INTO `payrecord` VALUES ('123', '好的', '建,你好,好哦', 123);
INSERT INTO `payrecord` VALUES ('123', '黃', '黃,123,你好', 100);
INSERT INTO `payrecord` VALUES ('123', 'BBB', '黃,建', 123);
INSERT INTO `payrecord` VALUES ('233', '他', '我,你,他', 5968);
INSERT INTO `payrecord` VALUES ('233', '你', '我,他', 986);
INSERT INTO `payrecord` VALUES ('233', '我', '我,你,他', 986);
INSERT INTO `payrecord` VALUES ('233', '你', '他', 986);

-- ----------------------------
-- Table structure for token
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token`  (
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id` int(11) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of token
-- ----------------------------
INSERT INTO `token` VALUES ('123', NULL);
INSERT INTO `token` VALUES ('1234', NULL);
INSERT INTO `token` VALUES ('12344', NULL);
INSERT INTO `token` VALUES ('666666', NULL);
INSERT INTO `token` VALUES ('66666', NULL);
INSERT INTO `token` VALUES ('233', NULL);
INSERT INTO `token` VALUES ('hello', NULL);
INSERT INTO `token` VALUES ('789', NULL);
INSERT INTO `token` VALUES ('wtf', NULL);

SET FOREIGN_KEY_CHECKS = 1;
=======
<<<<<<< HEAD
/*
 Navicat Premium Data Transfer

 Source Server         : 220.133.162.107
 Source Server Type    : MySQL
 Source Server Version : 50730
 Source Host           : 220.133.162.107:3306
 Source Schema         : travelmoney

 Target Server Type    : MySQL
 Target Server Version : 50730
 File Encoding         : 65001

 Date: 18/06/2020 09:05:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mainpeople
-- ----------------------------
DROP TABLE IF EXISTS `mainpeople`;
CREATE TABLE `mainpeople`  (
  `ID` int(11) NOT NULL,
  `mainpeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for payrecord
-- ----------------------------
DROP TABLE IF EXISTS `payrecord`;
CREATE TABLE `payrecord`  (
  `ID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `paymoneypeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usemoneypeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `howmuchmoney` int(255) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for token
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token`  (
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id` int(11) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

SET FOREIGN_KEY_CHECKS = 1;
=======
/*
 Navicat Premium Data Transfer

 Source Server         : 220.133.162.107
 Source Server Type    : MySQL
 Source Server Version : 50730
 Source Host           : 220.133.162.107:3306
 Source Schema         : travelmoney

 Target Server Type    : MySQL
 Target Server Version : 50730
 File Encoding         : 65001

 Date: 18/06/2020 09:05:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mainpeople
-- ----------------------------
DROP TABLE IF EXISTS `mainpeople`;
CREATE TABLE `mainpeople`  (
  `ID` int(11) NOT NULL,
  `mainpeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for payrecord
-- ----------------------------
DROP TABLE IF EXISTS `payrecord`;
CREATE TABLE `payrecord`  (
  `ID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `paymoneypeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usemoneypeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `howmuchmoney` int(255) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for token
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token`  (
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id` int(11) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

SET FOREIGN_KEY_CHECKS = 1;
>>>>>>> 836ac7638824b74a18834148b97a0edd2d348d97
>>>>>>> c70b1e07f6e3fb257cd7802fb3df23addeb4375c
