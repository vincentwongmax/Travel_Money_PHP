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

 Date: 30/06/2020 09:05:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for del
-- ----------------------------
DROP TABLE IF EXISTS `del`;
CREATE TABLE `del`  (
  `ID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `paymoneypeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usemoneypeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `howmuchmoney` int(255) NULL DEFAULT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `adddatatime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `IDED` int(255) NOT NULL,
  `IDDD` int(255) NOT NULL AUTO_INCREMENT,
  `deltime` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`IDDD`, `IDED`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of del
-- ----------------------------
INSERT INTO `del` VALUES ('123', '建', '黃', 13, NULL, NULL, 10, 2, '2020-06-20 17:01:08');
INSERT INTO `del` VALUES ('123', '好的', '黃,建,你好', 30, NULL, NULL, 12, 3, '2020-06-20 17:01:08');
INSERT INTO `del` VALUES ('123', '建', '123,建', 100, NULL, NULL, 13, 4, '2020-06-20 17:01:08');
INSERT INTO `del` VALUES ('123', '黃', '你好,好的', 981, NULL, NULL, 14, 5, '2020-06-20 17:01:08');
INSERT INTO `del` VALUES ('123', '好哦', '黃,123,你好,好哦', 1002, NULL, NULL, 23, 6, '2020-06-20 17:01:08');
INSERT INTO `del` VALUES ('123', '黃', '文,123,BBB,好的', 734, NULL, NULL, 15, 7, '2020-06-20 17:01:08');
INSERT INTO `del` VALUES ('123', '你好', '黃,你好', 745, NULL, NULL, 16, 8, '2020-06-20 17:01:08');
INSERT INTO `del` VALUES ('macao', 'a,d,e', 'what,a,d,e', 100, 'test', '2020-06-20 15:36:37', 36, 9, '2020-06-20 17:01:08');
INSERT INTO `del` VALUES ('123', '你好', '黃,文,123', 456, NULL, NULL, 19, 10, '2020-06-20 17:01:08');
INSERT INTO `del` VALUES ('123', '黃', 'BBB,好的', 23, NULL, NULL, 20, 11, '2020-06-20 17:01:08');
INSERT INTO `del` VALUES ('123', 'BBB', '建,你好', 122, NULL, NULL, 21, 12, '2020-06-20 17:01:08');
INSERT INTO `del` VALUES (NULL, NULL, NULL, NULL, NULL, NULL, 0, 13, '2020-06-20 17:01:21');
INSERT INTO `del` VALUES (NULL, NULL, NULL, NULL, NULL, NULL, 0, 14, '2020-06-20 17:01:25');
INSERT INTO `del` VALUES ('123', '好哦', '你好,好哦,邊個', 100, NULL, NULL, 22, 15, '2020-06-20 21:47:53');
INSERT INTO `del` VALUES ('123', 'dsgf', '文,123,建', 446, '100', '2020-06-21 20:41:56', 37, 16, '2020-06-22 08:21:26');
INSERT INTO `del` VALUES ('123', '黃', '考試,cxvsdfwdd', 2, '100', '2020-06-22 13:27:11', 40, 17, '2020-06-22 13:27:27');
INSERT INTO `del` VALUES ('123', '好哦,建,50', NULL, NULL, '按鍵系統結算', '2020-06-22 15:54:05', 42, 18, '2020-06-22 15:57:02');
INSERT INTO `del` VALUES ('123', '好哦,建,50', NULL, NULL, '按鍵系統結算', '2020-06-22 15:57:23', 43, 19, '2020-06-22 15:59:53');
INSERT INTO `del` VALUES ('123', '你好,建,50', NULL, NULL, '按鍵系統結算', '2020-06-22 16:01:43', 44, 20, '2020-06-22 16:05:47');
INSERT INTO `del` VALUES ('123', '好的,咩料呀,125', NULL, NULL, '按鍵系統結算', '2020-06-22 16:06:26', 46, 21, '2020-06-22 16:06:43');
INSERT INTO `del` VALUES ('123', '文,咩料呀,125', NULL, NULL, '按鍵系統結算', '2020-06-22 16:06:52', 47, 22, '2020-06-22 16:07:38');
INSERT INTO `del` VALUES ('123', NULL, NULL, 0, '按鍵系統結算', '2020-06-22 16:15:29', 48, 23, '2020-06-22 16:16:11');
INSERT INTO `del` VALUES ('123', NULL, NULL, 0, '按鍵系統結算', '2020-06-22 16:16:17', 49, 24, '2020-06-22 16:17:13');
INSERT INTO `del` VALUES ('123', '123', '咩料呀', 125, '還錢(系統)', '2020-06-22 16:20:12', 55, 25, '2020-06-22 16:20:40');
INSERT INTO `del` VALUES ('123', '文', '咩料呀', 125, '還錢(系統)', '2020-06-22 16:20:09', 54, 26, '2020-06-22 16:20:42');
INSERT INTO `del` VALUES ('123', '好哦', '建', 50, '還錢(系統)', '2020-06-22 16:20:07', 53, 27, '2020-06-22 16:20:43');
INSERT INTO `del` VALUES ('123', '好的', '咩料呀', 125, '還錢(系統)', '2020-06-22 16:20:03', 52, 28, '2020-06-22 16:20:44');
INSERT INTO `del` VALUES ('123', '你好', '建', 50, '按鍵系統結算', '2020-06-22 16:17:16', 50, 29, '2020-06-22 16:20:49');
INSERT INTO `del` VALUES ('123', '考試,目前,71.58333333333326', NULL, 72, '還錢(系統)', '2020-06-22 16:53:15', 63, 30, '2020-06-22 16:58:19');
INSERT INTO `del` VALUES ('123', 'dsgf', '咩料呀', 9, '還錢(系統)', '2020-06-23 14:08:31', 74, 31, '2020-06-23 14:39:55');
INSERT INTO `del` VALUES ('123', '123', '咩料呀', 10, '還錢(系統)', '2020-06-23 14:08:26', 73, 32, '2020-06-23 14:39:57');
INSERT INTO `del` VALUES ('123', '123', '目前', 32, '還錢(系統)', '2020-06-23 14:08:20', 72, 33, '2020-06-23 14:39:58');
INSERT INTO `del` VALUES ('123', 'dsgf', '文', 50, '還錢(系統)', '2020-06-23 14:08:15', 71, 34, '2020-06-23 14:39:59');
INSERT INTO `del` VALUES ('123', 'adfedg', '目前', 66, '還錢(系統)', '2020-06-23 14:08:09', 70, 35, '2020-06-23 14:40:00');
INSERT INTO `del` VALUES ('123', 'adfedg', '建', 100, '還錢(系統)', '2020-06-23 14:07:59', 69, 36, '2020-06-23 14:40:01');
INSERT INTO `del` VALUES ('123', '嘅人', '文', 251, '還錢(系統)', '2020-06-23 14:07:54', 68, 37, '2020-06-23 14:40:02');
INSERT INTO `del` VALUES ('123', '考試', '目前', 251, '還錢(系統)', '2020-06-23 14:07:49', 67, 38, '2020-06-23 14:40:04');
INSERT INTO `del` VALUES ('123', '好的', '文', 276, '還錢(系統)', '2020-06-22 17:20:55', 66, 39, '2020-06-23 14:40:05');
INSERT INTO `del` VALUES ('123', 'dsgf', '咩料呀', 107, '還錢(系統)', '2020-06-22 17:02:21', 65, 40, '2020-06-23 14:40:06');
INSERT INTO `del` VALUES ('123', '你好', '目前', 301, '還錢(系統)', '2020-06-22 17:01:16', 64, 41, '2020-06-23 14:40:07');
INSERT INTO `del` VALUES ('123', '好哦', '文', 301, '還錢(系統)', '2020-06-22 16:50:48', 62, 42, '2020-06-23 14:40:09');
INSERT INTO `del` VALUES ('123', '好的', '目前', 14, '還錢(系統)', '2020-06-22 16:34:09', 61, 43, '2020-06-23 14:40:10');
INSERT INTO `del` VALUES ('123', '文', '你好,好哦,嘅人,考試', 1003, 'okoko', '2020-06-22 16:33:47', 60, 44, '2020-06-23 14:40:12');
INSERT INTO `del` VALUES ('123', '123', '咩料呀', 84, '還錢(系統)', '2020-06-22 16:26:02', 58, 45, '2020-06-23 14:40:13');
INSERT INTO `del` VALUES ('123', '嘅人', '目前', 166, '還錢(系統)', '2020-06-22 16:21:17', 57, 46, '2020-06-23 14:40:15');
INSERT INTO `del` VALUES ('123', '目前', '好的,目前,嘅人,dsgf,adfedg,咩料呀', 995, '女女女女女女女', '2020-06-22 16:21:11', 56, 47, '2020-06-23 14:40:16');
INSERT INTO `del` VALUES ('123', '12af', '咩料呀', 125, '還錢(系統)', '2020-06-22 16:19:59', 51, 48, '2020-06-23 14:40:17');
INSERT INTO `del` VALUES ('123', '咩料呀', '文,123,好的,12af', 500, '2', '2020-06-22 16:06:15', 45, 49, '2020-06-23 14:40:19');
INSERT INTO `del` VALUES ('123', '建', '建,你好,好哦', 150, '你好', '2020-06-22 15:29:45', 41, 50, '2020-06-23 14:40:20');
INSERT INTO `del` VALUES ('123', '文', '123', 100, '1255', '2020-06-23 21:25:05', 76, 51, '2020-06-23 21:25:10');
INSERT INTO `del` VALUES ('sdfdd', 'wsd', 'wsd,sdf,asds', 105, 'aswdv', '2020-06-23 21:32:34', 77, 52, '2020-06-23 21:32:44');
INSERT INTO `del` VALUES ('123', 'dsgf', '黃,文,123', 222, '12312', '2020-06-23 21:47:11', 79, 53, '2020-06-23 21:47:24');
INSERT INTO `del` VALUES ('123', '234', '黃,文,123', 123, '1232', '2020-06-23 22:17:15', 84, 61, '2020-06-23 22:17:36');
INSERT INTO `del` VALUES ('123', '文', 'adfedg,咩料呀,asdasdas', 123, '1223123', '2020-06-23 22:17:02', 83, 62, '2020-06-23 22:17:46');

-- ----------------------------
-- Table structure for mainpeople
-- ----------------------------
DROP TABLE IF EXISTS `mainpeople`;
CREATE TABLE `mainpeople`  (
  `ID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
INSERT INTO `mainpeople` VALUES ('bad', '123');
INSERT INTO `mainpeople` VALUES ('bad', '1232');
INSERT INTO `mainpeople` VALUES ('1233', '咁樣');
INSERT INTO `mainpeople` VALUES ('1233', '好嗎');
INSERT INTO `mainpeople` VALUES ('1233', '好的');
INSERT INTO `mainpeople` VALUES ('123', '嘅人');
INSERT INTO `mainpeople` VALUES ('123', '考試');
INSERT INTO `mainpeople` VALUES ('123', '123213');
INSERT INTO `mainpeople` VALUES ('123', '12af');
INSERT INTO `mainpeople` VALUES ('123', 'dsgf');
INSERT INTO `mainpeople` VALUES ('123', 'asdf');
INSERT INTO `mainpeople` VALUES ('macau', '文峰');
INSERT INTO `mainpeople` VALUES ('macau', '文建');
INSERT INTO `mainpeople` VALUES ('macao', 'what');
INSERT INTO `mainpeople` VALUES ('macao', 'whatis ');
INSERT INTO `mainpeople` VALUES ('macao', 'this this w');
INSERT INTO `mainpeople` VALUES ('123', '尸asdasdasdsad');
INSERT INTO `mainpeople` VALUES ('123', 'acxzcsww');
INSERT INTO `mainpeople` VALUES ('123', 'cxvsdfwdd');
INSERT INTO `mainpeople` VALUES ('123', '1233');
INSERT INTO `mainpeople` VALUES ('123', '234');
INSERT INTO `mainpeople` VALUES ('123', 'adfedg');
INSERT INTO `mainpeople` VALUES ('123', '咩料呀');
INSERT INTO `mainpeople` VALUES ('123', '，');
INSERT INTO `mainpeople` VALUES ('1232233', '，');
INSERT INTO `mainpeople` VALUES ('eatdinner2020', '，');
INSERT INTO `mainpeople` VALUES ('123日尸木', '，');
INSERT INTO `mainpeople` VALUES ('sdasdasfga', '，');
INSERT INTO `mainpeople` VALUES ('123', 'asdasdas');
INSERT INTO `mainpeople` VALUES ('123sdzfdf', 'asdf');
INSERT INTO `mainpeople` VALUES ('123sdzfdf', 'asdfa');
INSERT INTO `mainpeople` VALUES ('123sdzfdf', 'fsdf');
INSERT INTO `mainpeople` VALUES ('cdsjtaiwan', 'asdf');
INSERT INTO `mainpeople` VALUES ('cdsjtaiwan', '你好');
INSERT INTO `mainpeople` VALUES ('money', 'dsfa');
INSERT INTO `mainpeople` VALUES ('money', 'adsf');
INSERT INTO `mainpeople` VALUES ('sdfdd', 'wsd');
INSERT INTO `mainpeople` VALUES ('sdfdd', 'sdf');
INSERT INTO `mainpeople` VALUES ('sdfdd', 'asds');

-- ----------------------------
-- Table structure for payrecord
-- ----------------------------
DROP TABLE IF EXISTS `payrecord`;
CREATE TABLE `payrecord`  (
  `ID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `paymoneypeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usemoneypeople` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `howmuchmoney` double(255, 17) NOT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `adddatatime` timestamp(0) NULL DEFAULT current_timestamp(0),
  `IDED` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IDED`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 87 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payrecord
-- ----------------------------
INSERT INTO `payrecord` VALUES ('233', '他', '我,你,他', 5968.00000000000000000, NULL, NULL, 5);
INSERT INTO `payrecord` VALUES ('233', '你', '我,他', 986.00000000000000000, NULL, NULL, 6);
INSERT INTO `payrecord` VALUES ('233', '我', '我,你,他', 986.00000000000000000, NULL, NULL, 7);
INSERT INTO `payrecord` VALUES ('233', '你', '他', 986.00000000000000000, NULL, NULL, 8);
INSERT INTO `payrecord` VALUES ('whahga', 'whatasdf', 'whatasdf,whatasdfsdaf,adsfasd,adsfasdasdfdasf,asdfafdasf,asdfw,asdfwa', 155.00000000000000000, NULL, NULL, 24);
INSERT INTO `payrecord` VALUES ('bad', '1232', '1232', 112.00000000000000000, '??', '2020-06-19 22:14:52', 31);
INSERT INTO `payrecord` VALUES ('bad', '1232', '123,1232', 23.00000000000000000, 'asds', '2020-06-19 22:15:07', 32);
INSERT INTO `payrecord` VALUES ('1233', '好嗎', '咁樣,好嗎,好的', 1554.00000000000000000, 'Rtq pdoe', '2020-06-20 10:55:38', 33);
INSERT INTO `payrecord` VALUES ('macao', 'a,d,e', 'what,a,d,e', 100.00000000000000000, 'test', '2020-06-20 15:36:37', 36);
INSERT INTO `payrecord` VALUES ('123sdzfdf', 'asdf', 'asdf,asdfa,fsdf', 446.00000000000000000, '1000', '2020-06-21 20:45:42', 38);
INSERT INTO `payrecord` VALUES ('cdsjtaiwan', 'asdf', 'asdf,你好', 1500.00000000000000000, 'dasf', '2020-06-22 08:56:57', 39);
INSERT INTO `payrecord` VALUES ('money', 'dsfa', 'dsfa,adsf', 233.00000000000000000, '100', '2020-06-23 14:09:51', 75);
INSERT INTO `payrecord` VALUES ('123', '黃', '黃,文,123,建', 1554.00000000000000000, '1151', '2020-06-24 21:58:56', 85);
INSERT INTO `payrecord` VALUES ('123', '你好', '文,123,BBB,好的', 122.00000000000000000, '123123', '2020-06-24 22:00:09', 86);

-- ----------------------------
-- Table structure for token
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token`  (
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
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
INSERT INTO `token` VALUES ('3423', NULL);
INSERT INTO `token` VALUES ('12341234', NULL);
INSERT INTO `token` VALUES ('1231312', NULL);
INSERT INTO `token` VALUES ('2234234', NULL);
INSERT INTO `token` VALUES ('12312312312', NULL);
INSERT INTO `token` VALUES ('bad', NULL);
INSERT INTO `token` VALUES ('1212', NULL);
INSERT INTO `token` VALUES ('1233', NULL);
INSERT INTO `token` VALUES ('macau', NULL);
INSERT INTO `token` VALUES ('macao', NULL);
INSERT INTO `token` VALUES ('1232233', NULL);
INSERT INTO `token` VALUES ('asdsdfwe', NULL);
INSERT INTO `token` VALUES ('eatdinner2020', NULL);
INSERT INTO `token` VALUES ('123日尸木', NULL);
INSERT INTO `token` VALUES ('sdasdasfga', NULL);
INSERT INTO `token` VALUES ('4534df4', NULL);
INSERT INTO `token` VALUES ('123sdzfdf', NULL);
INSERT INTO `token` VALUES ('cdsjtaiwan', NULL);
INSERT INTO `token` VALUES ('trave', NULL);
INSERT INTO `token` VALUES ('money', NULL);
INSERT INTO `token` VALUES ('sisterbrother', NULL);
INSERT INTO `token` VALUES ('sdfdd', NULL);

SET FOREIGN_KEY_CHECKS = 1;
