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

 Date: 19/06/2020 19:22:49
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
INSERT INTO `mainpeople` VALUES ('12321ad', '你好');
INSERT INTO `mainpeople` VALUES ('日木尸日火', '你好');
INSERT INTO `mainpeople` VALUES ('日木尸日火', '好的');
INSERT INTO `mainpeople` VALUES ('日木尸日火', '好哦');
INSERT INTO `mainpeople` VALUES ('123333', '123');
INSERT INTO `mainpeople` VALUES ('123', '目前');
INSERT INTO `mainpeople` VALUES ('what', '123');
INSERT INTO `mainpeople` VALUES ('whahga', 'whatasdf');
INSERT INTO `mainpeople` VALUES ('whahga', 'whatasdfsdaf');
INSERT INTO `mainpeople` VALUES ('whahga', 'adsfasd');
INSERT INTO `mainpeople` VALUES ('whahga', 'adsfasdasdfdasf');
INSERT INTO `mainpeople` VALUES ('whahga', 'asdfafdasf');
INSERT INTO `mainpeople` VALUES ('whahga', 'asdfw');
INSERT INTO `mainpeople` VALUES ('whahga', 'asdfwa');

-- ----------------------------
-- Table structure for payrecord
-- ----------------------------
DROP TABLE IF EXISTS `payrecord`;
CREATE TABLE `payrecord`  (
  `ID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `paymoneypeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usemoneypeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `howmuchmoney` int(255) NULL DEFAULT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `adddatatime` timestamp(0) NULL DEFAULT current_timestamp(0)
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payrecord
-- ----------------------------
INSERT INTO `payrecord` VALUES ('123', '黃', '文,123,建', 100, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '好的', '建,你好,好哦', 123, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '黃', '黃,123,你好', 100, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', 'BBB', '黃,建', 123, NULL, NULL);
INSERT INTO `payrecord` VALUES ('233', '他', '我,你,他', 5968, NULL, NULL);
INSERT INTO `payrecord` VALUES ('233', '你', '我,他', 986, NULL, NULL);
INSERT INTO `payrecord` VALUES ('233', '我', '我,你,他', 986, NULL, NULL);
INSERT INTO `payrecord` VALUES ('233', '你', '他', 986, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '建', 'BBB', 123, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '建', '黃', 13, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '黃', '建,你好', 1000, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '好的', '黃,建,你好', 30, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '建', '123,建', 100, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '黃', '你好,好的', 981, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '黃', '文,123,BBB,好的', 734, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '你好', '黃,你好', 745, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '好的', '文,123,建', 15, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '文', '建,你好', 154, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '你好', '黃,文,123', 456, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '黃', 'BBB,好的', 23, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', 'BBB', '建,你好', 122, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '好哦', '你好,好哦,邊個', 100, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '好哦', '黃,123,你好,好哦', 1002, NULL, NULL);
INSERT INTO `payrecord` VALUES ('whahga', 'whatasdf', 'whatasdf,whatasdfsdaf,adsfasd,adsfasdasdfdasf,asdfafdasf,asdfw,asdfwa', 155, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '邊個', '黃,文,123,建', 500, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '黃', '文,123,建', 123, NULL, NULL);
INSERT INTO `payrecord` VALUES ('123', '邊個', '文', 987, '咩事', '2020-06-19 18:56:04');
INSERT INTO `payrecord` VALUES ('123', '好哦', '黃,文,建', 123, '123', '2020-06-19 18:56:25');
INSERT INTO `payrecord` VALUES ('123', '目前', '黃,文,123,建,好哦,邊個', 1000, '因為你欠我的', '2020-06-19 19:09:13');

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
INSERT INTO `token` VALUES ('whatisyour', NULL);
INSERT INTO `token` VALUES ('asdfasd', NULL);
INSERT INTO `token` VALUES ('adfdded', NULL);
INSERT INTO `token` VALUES ('dsfasd', NULL);
INSERT INTO `token` VALUES ('321432142', NULL);
INSERT INTO `token` VALUES ('adsfwddafd', NULL);
INSERT INTO `token` VALUES ('adsfawef', NULL);
INSERT INTO `token` VALUES ('12321ad', NULL);
INSERT INTO `token` VALUES ('日木尸日火', NULL);
INSERT INTO `token` VALUES ('what', NULL);
INSERT INTO `token` VALUES ('asdfwedaf', NULL);
INSERT INTO `token` VALUES ('123333', NULL);
INSERT INTO `token` VALUES ('123123213', NULL);
INSERT INTO `token` VALUES ('whahga', NULL);

SET FOREIGN_KEY_CHECKS = 1;
