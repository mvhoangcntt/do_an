/*
 Navicat Premium Data Transfer

 Source Server         : DB_Local
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : ap_cms_core

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 06/06/2019 08:58:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ap_banner
-- ----------------------------
DROP TABLE IF EXISTS `ap_banner`;
CREATE TABLE `ap_banner`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(5) NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url_video` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `script` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `is_status` tinyint(1) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'trang thai',
  `displayed_time` datetime(0) NOT NULL COMMENT 'ngay publish',
  `created_time` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT 'ngay tao',
  `updated_time` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'ngay sua',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_banner
-- ----------------------------
INSERT INTO `ap_banner` VALUES (1, 4, 'banner-home.jpg', '', NULL, '', 1, '2019-05-31 19:15:25', '2019-04-02 22:37:12', '2019-06-05 19:15:30');
INSERT INTO `ap_banner` VALUES (2, 101, 'untitled123.png', '', NULL, '', 1, '2019-06-12 19:15:32', '2018-09-24 22:37:28', '2019-06-05 19:15:36');
INSERT INTO `ap_banner` VALUES (3, 101, 'banner-home.jpg', '', NULL, '', 1, '2019-06-12 19:15:36', '2018-09-27 10:48:25', '2019-06-05 19:15:40');
INSERT INTO `ap_banner` VALUES (4, 101, '0_2ut8qgcydruy5az_.jpg', '', NULL, '', 1, '2019-06-13 19:15:42', '2018-09-27 14:27:46', '2019-06-05 19:15:45');
INSERT INTO `ap_banner` VALUES (7, 101, 'untitled123.png', '', NULL, NULL, 1, '2019-06-07 19:15:46', '2019-03-04 14:07:35', '2019-06-05 19:15:51');

-- ----------------------------
-- Table structure for ap_banner_translations
-- ----------------------------
DROP TABLE IF EXISTS `ap_banner_translations`;
CREATE TABLE `ap_banner_translations`  (
  `id` int(11) NULL DEFAULT NULL,
  `language_code` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `meta_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_description` varchar(170) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  UNIQUE INDEX `ap_banner_translations_id_language_code_pk`(`id`, `language_code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ap_category
-- ----------------------------
DROP TABLE IF EXISTS `ap_category`;
CREATE TABLE `ap_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `banner` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_featured` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Background for parent_id = 0',
  `files` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `style` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'style html',
  `class` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'post' COMMENT 'type theo đúng tên controller',
  `order` int(3) NULL DEFAULT 0,
  `is_status` tinyint(2) NOT NULL DEFAULT 1,
  `created_time` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_time` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ratting` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `retionship` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `question` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `url_video` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `link` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 109 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_category
-- ----------------------------
INSERT INTO `ap_category` VALUES (1, 0, NULL, 'abc-xyz.jpg', NULL, NULL, NULL, NULL, 'post', 2, 1, '2019-02-06 11:31:56', '2019-02-10 16:23:37', 'men_02', 'mem_02', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (45, 76, 'icon-cat2.png', 'bn-product.jpg', NULL, NULL, '', '', 'course', 0, 1, '2018-11-28 09:29:00', '2019-02-15 15:20:58', '0', '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (48, 76, 'icon-cat2.png', 'bn-news.jpg', NULL, NULL, '', '', 'course', 5, 1, '2019-01-08 10:58:38', '2019-02-14 02:28:07', '0', '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (49, 76, 'icon-cat2.png', 'baner.jpg', NULL, NULL, '', '', 'course', 4, 1, '2018-11-08 14:22:33', '2019-02-14 02:28:11', '0', '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (76, 0, 'icon-cat2.png', '', NULL, NULL, '', '', 'course', 4, 1, '2019-02-11 14:53:38', '2019-02-14 02:32:54', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (77, 0, 'icon-cat2.png', '', NULL, NULL, '', '', 'course', 1, 1, '2019-02-11 14:54:22', '2019-02-14 02:32:56', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (78, 0, 'icon-cat2.png', '', NULL, NULL, '', '', 'course', 1, 1, '2019-02-11 15:06:08', '2019-02-14 02:32:57', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (79, 78, 'icon-cat2.png', '', NULL, NULL, '', '', 'course', 5, 1, '2019-02-11 15:07:11', '2019-02-14 02:33:01', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (80, 0, '', '', NULL, NULL, '', '', 'video', 2, 1, '2019-02-11 18:33:19', '2019-02-19 18:35:30', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (81, 0, '', '', NULL, NULL, '', '', 'master', 5, 1, '2019-02-12 18:38:09', '2019-02-12 18:38:09', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (82, 81, '', '', NULL, NULL, '', '', 'master', 1, 1, '2019-02-12 18:39:10', '2019-02-12 18:39:10', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (83, 81, '', '', NULL, NULL, '', '', 'master', 2, 1, '2019-02-12 18:40:06', '2019-02-12 18:40:06', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (84, 81, '', '', NULL, NULL, '', '', 'master', 3, 1, '2019-02-12 18:41:04', '2019-02-12 18:41:04', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (85, 0, '', '', NULL, NULL, '', '', 'master', 6, 1, '2019-02-12 18:41:33', '2019-02-12 18:41:33', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (86, 85, '', '', NULL, NULL, '', '', 'master', 1, 1, '2019-02-12 18:43:02', '2019-02-12 18:43:02', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (87, 85, '', '', NULL, NULL, '', '', 'master', 2, 1, '2019-02-12 18:43:44', '2019-02-12 18:43:44', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (88, 85, '', '', NULL, NULL, '', '', 'master', 3, 1, '2019-02-12 18:44:06', '2019-02-12 18:44:06', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (89, 85, '', '', NULL, NULL, '', '', 'master', 4, 1, '2019-02-12 18:44:39', '2019-02-12 18:44:39', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (91, 90, NULL, NULL, NULL, NULL, NULL, NULL, 'post', 0, 1, '2019-02-13 16:19:49', '2019-02-13 16:19:52', '02', '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (92, 90, NULL, NULL, NULL, NULL, NULL, NULL, 'post', 0, 1, '2019-02-13 16:20:17', '2019-02-13 16:20:19', '02', '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (93, 90, NULL, NULL, NULL, NULL, NULL, NULL, 'post', 0, 1, '2019-02-13 16:20:37', '2019-02-13 16:20:40', '02', '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (94, 90, NULL, NULL, NULL, NULL, NULL, NULL, 'post', 0, 1, '2019-02-13 16:20:37', '2019-02-13 16:20:40', '02', '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (95, 90, NULL, NULL, NULL, NULL, NULL, NULL, 'post', 0, 1, '2019-02-13 16:20:37', '2019-02-13 16:20:40', '02', '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (97, 0, '', '', NULL, NULL, '', '', 'master', 7, 1, '2019-02-13 13:37:13', '2019-02-13 13:37:13', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (98, 97, '', '', NULL, NULL, '', 'fa fa-flash', 'master', 1, 1, '2019-02-13 13:38:22', '2019-02-14 03:20:02', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (99, 97, '', '', NULL, NULL, '', 'fa fa-diamond', 'master', 2, 1, '2019-02-13 13:39:57', '2019-02-13 15:44:09', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (100, 97, '', '', NULL, NULL, '', 'fa fa-star-o', 'master', 1, 1, '2019-02-13 13:41:21', '2019-02-14 03:19:22', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (101, 97, '', '', NULL, NULL, '', 'fa fa-rocket', 'master', 4, 1, '2019-02-13 13:43:11', '2019-02-14 03:20:06', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (102, 0, '', '', NULL, NULL, '', '', 'master', 8, 1, '2019-02-13 16:59:48', '2019-02-13 16:59:48', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (103, 102, 'pro2.jpg', '', NULL, NULL, '', '', 'master', 1, 1, '2019-02-13 17:00:48', '2019-02-13 17:03:57', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (104, 102, 'pro1.jpg', '', NULL, NULL, '', '', 'master', 2, 1, '2019-02-13 17:01:47', '2019-03-02 21:24:20', '', '', NULL, NULL, NULL, NULL, 'hehee');
INSERT INTO `ap_category` VALUES (105, 0, '', '', NULL, NULL, '', '', 'video', 1, 1, '2019-02-16 05:18:05', '2019-02-19 18:35:32', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ap_category` VALUES (107, 0, '', '', NULL, NULL, 'career', '', 'post', 4, 1, '2019-03-02 21:46:32', '2019-03-02 21:46:32', '', '', NULL, NULL, NULL, NULL, '');
INSERT INTO `ap_category` VALUES (108, 0, '', '', NULL, NULL, '', '', 'post', 5, 1, '2019-06-05 21:04:18', '2019-06-05 21:04:18', '', '', NULL, NULL, NULL, NULL, '');

-- ----------------------------
-- Table structure for ap_category_translations
-- ----------------------------
DROP TABLE IF EXISTS `ap_category_translations`;
CREATE TABLE `ap_category_translations`  (
  `id` int(11) NOT NULL,
  `language_code` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  UNIQUE INDEX `ap_category_translations_id_language_code_pk`(`id`, `language_code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_category_translations
-- ----------------------------
INSERT INTO `ap_category_translations` VALUES (108, 'en', 'àdasdfasdfasdf', 'àdasdfasdfasdf', 'adasdfaàdasdfasdfasdfsdfasdf', 'àdasdfasdfasdfàdasdfasdfasdfàdasdfasdfasdf', 'àdasdfasdfasdfàdasdfasdfasdfàdasdfasdfasdfàdasdfasdfasdfàdasdfasdfasdfàdasdfasdfasdfàdasdfasdfasdfàdasdfasdfasdfàdasdfasdfasdf', 'àdasdfasdfasdf', '');
INSERT INTO `ap_category_translations` VALUES (108, 'vi', 'dddd', 'ddddd', 'dddd', 'dddddddddddddddddddddddddddddddddddddddddddđ', 'dddddddddddddddddđdddddddddddddddddđdddddddddddddddddđdddddddddddddddddđdddddddddddddddddđdddddddddddddddddđdddddddddddddddddđ', 'ddddddddddddddd', '');

-- ----------------------------
-- Table structure for ap_contact
-- ----------------------------
DROP TABLE IF EXISTS `ap_contact`;
CREATE TABLE `ap_contact`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_time` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_contact
-- ----------------------------
INSERT INTO `ap_contact` VALUES (31, 'Đinh Văn Khương', 'khuongkoi200798@gmail.com', '0337373955', '123213213', '2019-01-24 09:59:53', NULL);
INSERT INTO `ap_contact` VALUES (32, 'Đinh Văn Khương', 'khuongkoi200798@gmail.com', '0337373955', 'OK', '2019-01-24 10:01:40', NULL);
INSERT INTO `ap_contact` VALUES (33, 'Đinh Văn Khương', 'khuongkoi200798@gmail.com', '0337373955', 'aaaaaaaaaaaaaaa', '2019-03-14 14:38:03', NULL);

-- ----------------------------
-- Table structure for ap_currency
-- ----------------------------
DROP TABLE IF EXISTS `ap_currency`;
CREATE TABLE `ap_currency`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_status` tinyint(1) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'trang thai',
  `format` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Định dạng tiền',
  `code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order` tinyint(1) NOT NULL,
  `country` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `symbol` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT 'ngay tao',
  `updated_time` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'ngay sua',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 115 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_currency
-- ----------------------------
INSERT INTO `ap_currency` VALUES (1, 'Leke', 2, NULL, 'ALL', 0, NULL, 'Lek', '2019-04-03 11:05:35', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (2, 'Dollars', 1, '23000', 'USD', 2, NULL, '$', '2019-04-03 11:05:35', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (3, 'Afghanis', 2, NULL, 'AFN', 0, NULL, '؋', '2019-04-03 11:05:35', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (4, 'Pesos', 2, NULL, 'ARS', 0, NULL, '$', '2019-04-03 11:05:35', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (5, 'Guilders', 2, NULL, 'AWG', 0, NULL, 'ƒ', '2019-04-03 11:05:35', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (6, 'Dollars', 2, NULL, 'AUD', 0, NULL, '$', '2019-04-03 11:05:35', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (7, 'New Manats', 2, NULL, 'AZN', 0, NULL, 'ман', '2019-04-03 11:05:36', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (8, 'Dollars', 2, NULL, 'BSD', 0, NULL, '$', '2019-04-03 11:05:36', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (9, 'Dollars', 2, NULL, 'BBD', 0, NULL, '$', '2019-04-03 11:05:36', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (10, 'Rubles', 2, NULL, 'BYR', 0, NULL, 'p.', '2019-04-03 11:05:36', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (11, 'Euro', 2, NULL, 'EUR', 0, NULL, '€', '2019-04-03 11:05:36', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (12, 'Dollars', 2, NULL, 'BZD', 0, NULL, 'BZ$', '2019-04-03 11:05:36', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (13, 'Dollars', 2, NULL, 'BMD', 0, NULL, '$', '2019-04-03 11:05:36', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (14, 'Bolivianos', 2, NULL, 'BOB', 0, NULL, '$b', '2019-04-03 11:05:36', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (15, 'Convertible Marka', 2, NULL, 'BAM', 0, NULL, 'KM', '2019-04-03 11:05:36', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (16, 'Pula', 2, NULL, 'BWP', 0, NULL, 'P', '2019-04-03 11:05:36', '2019-04-03 11:05:36');
INSERT INTO `ap_currency` VALUES (17, 'Leva', 2, NULL, 'BGN', 0, NULL, 'лв', '2019-04-03 11:05:36', '2019-04-03 11:05:36');
INSERT INTO `ap_currency` VALUES (18, 'Reais', 2, NULL, 'BRL', 0, NULL, 'R$', '2019-04-03 11:05:36', '2019-04-03 11:05:36');
INSERT INTO `ap_currency` VALUES (19, 'Pounds', 2, NULL, 'GBP', 0, NULL, '£', '2019-04-03 11:05:36', '2019-04-03 11:05:36');
INSERT INTO `ap_currency` VALUES (20, 'Dollars', 2, NULL, 'BND', 0, NULL, '$', '2019-04-03 11:05:36', '2019-04-03 11:05:36');
INSERT INTO `ap_currency` VALUES (21, 'Riels', 2, NULL, 'KHR', 0, NULL, '៛', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (22, 'Dollars', 2, NULL, 'CAD', 0, NULL, '$', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (23, 'Dollars', 2, NULL, 'KYD', 0, NULL, '$', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (24, 'Pesos', 2, NULL, 'CLP', 0, NULL, '$', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (25, 'Yuan Renminbi', 2, NULL, 'CNY', 0, NULL, '¥', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (26, 'Pesos', 2, NULL, 'COP', 0, NULL, '$', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (27, 'Colón', 2, NULL, 'CRC', 0, NULL, '₡', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (28, 'Kuna', 2, NULL, 'HRK', 0, NULL, 'kn', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (29, 'Pesos', 2, NULL, 'CUP', 0, NULL, '₱', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (30, 'Koruny', 2, NULL, 'CZK', 0, NULL, 'Kč', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (31, 'Kroner', 2, NULL, 'DKK', 0, NULL, 'kr', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (32, 'Pesos', 2, NULL, 'DOP ', 0, NULL, 'RD$', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (33, 'Dollars', 2, NULL, 'XCD', 0, NULL, '$', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (34, 'Pounds', 2, NULL, 'EGP', 0, NULL, '£', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (35, 'Colones', 2, NULL, 'SVC', 0, NULL, '$', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (36, 'Pounds', 2, NULL, 'FKP', 0, NULL, '£', '2019-04-03 11:05:37', '2019-04-03 11:05:37');
INSERT INTO `ap_currency` VALUES (37, 'Dollars', 2, NULL, 'FJD', 0, NULL, '$', '2019-04-03 11:05:38', '2019-04-03 11:05:38');
INSERT INTO `ap_currency` VALUES (38, 'Cedis', 2, NULL, 'GHC', 0, NULL, '¢', '2019-04-03 11:05:38', '2019-04-03 11:05:38');
INSERT INTO `ap_currency` VALUES (39, 'Pounds', 2, NULL, 'GIP', 0, NULL, '£', '2019-04-03 11:05:38', '2019-04-03 11:05:38');
INSERT INTO `ap_currency` VALUES (40, 'Quetzales', 2, NULL, 'GTQ', 0, NULL, 'Q', '2019-04-03 11:05:38', '2019-04-03 11:05:38');
INSERT INTO `ap_currency` VALUES (41, 'Pounds', 2, NULL, 'GGP', 0, NULL, '£', '2019-04-03 11:05:38', '2019-04-03 11:05:38');
INSERT INTO `ap_currency` VALUES (42, 'Dollars', 2, NULL, 'GYD', 0, NULL, '$', '2019-04-03 11:05:38', '2019-04-03 11:05:38');
INSERT INTO `ap_currency` VALUES (43, 'Lempiras', 2, NULL, 'HNL', 0, NULL, 'L', '2019-04-03 11:05:38', '2019-04-03 11:05:38');
INSERT INTO `ap_currency` VALUES (44, 'Dollars', 2, NULL, 'HKD', 0, NULL, '$', '2019-04-03 11:05:38', '2019-04-03 11:05:38');
INSERT INTO `ap_currency` VALUES (45, 'Forint', 2, NULL, 'HUF', 0, NULL, 'Ft', '2019-04-03 11:05:38', '2019-04-03 11:05:38');
INSERT INTO `ap_currency` VALUES (46, 'Kronur', 2, NULL, 'ISK', 0, NULL, 'kr', '2019-04-03 11:05:38', '2019-04-03 11:05:38');
INSERT INTO `ap_currency` VALUES (47, 'Rupees', 2, NULL, 'INR', 0, NULL, 'Rp', '2019-04-03 11:05:38', '2019-04-03 11:05:38');
INSERT INTO `ap_currency` VALUES (48, 'Rupiahs', 2, NULL, 'IDR', 0, NULL, 'Rp', '2019-04-03 11:05:38', '2019-04-03 11:05:38');
INSERT INTO `ap_currency` VALUES (49, 'Rials', 2, NULL, 'IRR', 0, NULL, '﷼', '2019-04-03 11:05:38', '2019-04-03 11:05:38');
INSERT INTO `ap_currency` VALUES (50, 'Pounds', 2, NULL, 'IMP', 0, NULL, '£', '2019-04-03 11:05:38', '2019-04-03 11:05:38');
INSERT INTO `ap_currency` VALUES (51, 'New Shekels', 2, NULL, 'ILS', 0, NULL, '₪', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (52, 'Dollars', 2, NULL, 'JMD', 0, NULL, 'J$', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (53, 'Yen', 2, NULL, 'JPY', 0, NULL, '¥', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (54, 'Pounds', 2, NULL, 'JEP', 0, NULL, '£', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (55, 'Tenge', 2, NULL, 'KZT', 0, NULL, 'лв', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (56, 'Won', 2, NULL, 'KPW', 0, NULL, '₩', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (57, 'Won', 2, NULL, 'KRW', 0, NULL, '₩', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (58, 'Soms', 2, NULL, 'KGS', 0, NULL, 'лв', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (59, 'Kips', 2, NULL, 'LAK', 0, NULL, '₭', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (60, 'Lati', 2, NULL, 'LVL', 0, NULL, 'Ls', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (61, 'Pounds', 2, NULL, 'LBP', 0, NULL, '£', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (62, 'Dollars', 2, NULL, 'LRD', 0, NULL, '$', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (63, 'Switzerland Francs', 2, NULL, 'CHF', 0, NULL, 'CHF', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (64, 'Litai', 2, NULL, 'LTL', 0, NULL, 'Lt', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (65, 'Denars', 2, NULL, 'MKD', 0, NULL, 'ден', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (66, 'Ringgits', 2, NULL, 'MYR', 0, NULL, 'RM', '2019-04-03 11:05:39', '2019-04-03 11:05:39');
INSERT INTO `ap_currency` VALUES (67, 'Rupees', 2, NULL, 'MUR', 0, NULL, '₨', '2019-04-03 11:05:40', '2019-04-03 11:05:40');
INSERT INTO `ap_currency` VALUES (68, 'Pesos', 2, NULL, 'MXN', 0, NULL, '$', '2019-04-03 11:05:40', '2019-04-03 11:05:40');
INSERT INTO `ap_currency` VALUES (69, 'Tugriks', 2, NULL, 'MNT', 0, NULL, '₮', '2019-04-03 11:05:40', '2019-04-03 11:05:40');
INSERT INTO `ap_currency` VALUES (70, 'Meticais', 2, NULL, 'MZN', 0, NULL, 'MT', '2019-04-03 11:05:40', '2019-04-03 11:05:40');
INSERT INTO `ap_currency` VALUES (71, 'Dollars', 2, NULL, 'NAD', 0, NULL, '$', '2019-04-03 11:05:40', '2019-04-03 11:05:40');
INSERT INTO `ap_currency` VALUES (72, 'Rupees', 2, NULL, 'NPR', 0, NULL, '₨', '2019-04-03 11:05:40', '2019-04-03 11:05:40');
INSERT INTO `ap_currency` VALUES (73, 'Guilders', 2, NULL, 'ANG', 0, NULL, 'ƒ', '2019-04-03 11:05:40', '2019-04-03 11:05:40');
INSERT INTO `ap_currency` VALUES (74, 'Dollars', 2, NULL, 'NZD', 0, NULL, '$', '2019-04-03 11:05:40', '2019-04-03 11:05:40');
INSERT INTO `ap_currency` VALUES (75, 'Cordobas', 2, NULL, 'NIO', 0, NULL, 'C$', '2019-04-03 11:05:40', '2019-04-03 11:05:40');
INSERT INTO `ap_currency` VALUES (76, 'Nairas', 2, NULL, 'NGN', 0, NULL, '₦', '2019-04-03 11:05:40', '2019-04-03 11:05:40');
INSERT INTO `ap_currency` VALUES (77, 'Krone', 2, NULL, 'NOK', 0, NULL, 'kr', '2019-04-03 11:05:40', '2019-04-03 11:05:40');
INSERT INTO `ap_currency` VALUES (78, 'Rials', 2, NULL, 'OMR', 0, NULL, '﷼', '2019-04-03 11:05:40', '2019-04-03 11:05:40');
INSERT INTO `ap_currency` VALUES (79, 'Rupees', 2, NULL, 'PKR', 0, NULL, '₨', '2019-04-03 11:05:41', '2019-04-03 11:05:41');
INSERT INTO `ap_currency` VALUES (80, 'Balboa', 2, NULL, 'PAB', 0, NULL, 'B/.', '2019-04-03 11:05:41', '2019-04-03 11:05:41');
INSERT INTO `ap_currency` VALUES (81, 'Guarani', 2, NULL, 'PYG', 0, NULL, 'Gs', '2019-04-03 11:05:41', '2019-04-03 11:05:41');
INSERT INTO `ap_currency` VALUES (82, 'Nuevos Soles', 2, NULL, 'PEN', 0, NULL, 'S/.', '2019-04-03 11:05:41', '2019-04-03 11:05:41');
INSERT INTO `ap_currency` VALUES (83, 'Pesos', 2, NULL, 'PHP', 0, NULL, 'Php', '2019-04-03 11:05:41', '2019-04-03 11:05:41');
INSERT INTO `ap_currency` VALUES (84, 'Zlotych', 2, NULL, 'PLN', 0, NULL, 'zł', '2019-04-03 11:05:41', '2019-04-03 11:05:41');
INSERT INTO `ap_currency` VALUES (85, 'Rials', 2, NULL, 'QAR', 0, NULL, '﷼', '2019-04-03 11:05:41', '2019-04-03 11:05:41');
INSERT INTO `ap_currency` VALUES (86, 'New Lei', 2, NULL, 'RON', 0, NULL, 'lei', '2019-04-03 11:05:41', '2019-04-03 11:05:41');
INSERT INTO `ap_currency` VALUES (87, 'Rubles', 2, NULL, 'RUB', 0, NULL, 'руб', '2019-04-03 11:05:41', '2019-04-03 11:05:41');
INSERT INTO `ap_currency` VALUES (88, 'Pounds', 2, NULL, 'SHP', 0, NULL, '£', '2019-04-03 11:05:41', '2019-04-03 11:05:41');
INSERT INTO `ap_currency` VALUES (89, 'Riyals', 2, NULL, 'SAR', 0, NULL, '﷼', '2019-04-03 11:05:41', '2019-04-03 11:05:41');
INSERT INTO `ap_currency` VALUES (90, 'Dinars', 2, NULL, 'RSD', 0, NULL, 'Дин.', '2019-04-03 11:05:41', '2019-04-03 11:05:41');
INSERT INTO `ap_currency` VALUES (91, 'Rupees', 2, NULL, 'SCR', 0, NULL, '₨', '2019-04-03 11:05:41', '2019-04-03 11:05:41');
INSERT INTO `ap_currency` VALUES (92, 'Dollars', 2, NULL, 'SGD', 0, NULL, '$', '2019-04-03 11:05:42', '2019-04-03 11:05:42');
INSERT INTO `ap_currency` VALUES (93, 'Dollars', 2, NULL, 'SBD', 0, NULL, '$', '2019-04-03 11:05:42', '2019-04-03 11:05:42');
INSERT INTO `ap_currency` VALUES (94, 'Shillings', 2, NULL, 'SOS', 0, NULL, 'S', '2019-04-03 11:05:42', '2019-04-03 11:05:42');
INSERT INTO `ap_currency` VALUES (95, 'Rand', 2, NULL, 'ZAR', 0, NULL, 'R', '2019-04-03 11:05:42', '2019-04-03 11:05:42');
INSERT INTO `ap_currency` VALUES (96, 'Rupees', 2, NULL, 'LKR', 0, NULL, '₨', '2019-04-03 11:05:42', '2019-04-03 11:05:42');
INSERT INTO `ap_currency` VALUES (97, 'Kronor', 2, NULL, 'SEK', 0, NULL, 'kr', '2019-04-03 11:05:42', '2019-04-03 11:05:42');
INSERT INTO `ap_currency` VALUES (98, 'Dollars', 2, NULL, 'SRD', 0, NULL, '$', '2019-04-03 11:05:42', '2019-04-03 11:05:42');
INSERT INTO `ap_currency` VALUES (99, 'Pounds', 2, NULL, 'SYP', 0, NULL, '£', '2019-04-03 11:05:42', '2019-04-03 11:05:42');
INSERT INTO `ap_currency` VALUES (100, 'New Dollars', 2, NULL, 'TWD', 0, NULL, 'NT$', '2019-04-03 11:05:42', '2019-04-03 11:05:42');
INSERT INTO `ap_currency` VALUES (101, 'Baht', 2, NULL, 'THB', 0, NULL, '฿', '2019-04-03 11:05:42', '2019-04-03 11:05:42');
INSERT INTO `ap_currency` VALUES (102, 'Dollars', 2, NULL, 'TTD', 0, NULL, 'TT$', '2019-04-03 11:05:42', '2019-04-03 11:05:42');
INSERT INTO `ap_currency` VALUES (103, 'Lira', 2, NULL, 'TRY', 0, NULL, 'TL', '2019-04-03 11:05:42', '2019-04-03 11:05:42');
INSERT INTO `ap_currency` VALUES (104, 'Liras', 2, NULL, 'TRL', 0, NULL, '£', '2019-04-03 11:05:43', '2019-04-03 11:05:43');
INSERT INTO `ap_currency` VALUES (105, 'Dollars', 2, NULL, 'TVD', 0, NULL, '$', '2019-04-03 11:05:43', '2019-05-06 08:50:46');
INSERT INTO `ap_currency` VALUES (106, 'Hryvnia', 2, NULL, 'UAH', 0, NULL, '₴', '2019-04-03 11:05:43', '2019-04-03 11:05:43');
INSERT INTO `ap_currency` VALUES (107, 'Pesos', 2, NULL, 'UYU', 0, NULL, '$U', '2019-04-03 11:05:43', '2019-04-03 11:05:43');
INSERT INTO `ap_currency` VALUES (108, 'Sums', 2, NULL, 'UZS', 0, NULL, 'лв', '2019-04-03 11:05:43', '2019-04-03 11:05:43');
INSERT INTO `ap_currency` VALUES (109, 'Bolivares Fuertes', 2, NULL, 'VEF', 0, NULL, 'Bs', '2019-04-03 11:05:43', '2019-04-03 11:05:43');
INSERT INTO `ap_currency` VALUES (110, 'Dong', 1, '1', 'VND', 1, NULL, '₫', '2019-04-03 11:05:43', '2019-06-05 19:59:29');
INSERT INTO `ap_currency` VALUES (111, 'Rials', 2, NULL, 'YER', 0, NULL, '﷼', '2019-04-03 11:05:43', '2019-04-03 11:05:43');
INSERT INTO `ap_currency` VALUES (112, 'Zimbabwe Dollars', 2, NULL, 'ZWD', 0, NULL, 'Z$', '2019-04-03 11:05:43', '2019-05-06 08:48:38');
INSERT INTO `ap_currency` VALUES (114, 'Euro', 2, '100', '€', 0, NULL, '€', '2019-04-19 11:31:05', '2019-06-05 19:59:29');

-- ----------------------------
-- Table structure for ap_exchange_currency
-- ----------------------------
DROP TABLE IF EXISTS `ap_exchange_currency`;
CREATE TABLE `ap_exchange_currency`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sell` double(10, 2) NOT NULL,
  `created_time` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_time` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_exchange_currency
-- ----------------------------
INSERT INTO `ap_exchange_currency` VALUES (1, 'AUD', 16507.46, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (2, 'CAD', 17635.86, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (3, 'CHF', 23746.31, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (4, 'DKK', 3583.62, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (5, 'EUR', 26962.11, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (6, 'GBP', 29863.05, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (7, 'HKD', 3007.28, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (8, 'INR', 350.24, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (9, 'JPY', 217.41, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (10, 'KRW', 20.68, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (11, 'MYR', 5644.94, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (12, 'NOK', 2734.34, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (13, 'RUB', 399.28, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (14, 'SAR', 6470.64, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (15, 'SEK', 2513.16, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (16, 'SGD', 17235.00, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (17, 'THB', 762.86, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (18, 'USD', 23475.00, '2019-06-06 08:57:03', '2019-06-06 08:57:03');
INSERT INTO `ap_exchange_currency` VALUES (19, 'CNY', 3500.00, '2019-06-06 08:57:11', '2019-06-06 08:57:11');
INSERT INTO `ap_exchange_currency` VALUES (20, 'NZD', 0.00, '2019-06-06 08:57:11', '2019-06-06 08:57:11');

-- ----------------------------
-- Table structure for ap_groups
-- ----------------------------
DROP TABLE IF EXISTS `ap_groups`;
CREATE TABLE `ap_groups`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `permission` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_groups
-- ----------------------------
INSERT INTO `ap_groups` VALUES (1, 'Admin', 'Administrator', '{\"banner\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"groups\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"media\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"menus\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"newsletter\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"page\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"post\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"product\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"property\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"setting\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"users\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"video\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"}}');
INSERT INTO `ap_groups` VALUES (2, 'Biên tập viên', 'Nhóm biên tập quản trị nội dung web', '{\"banner\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"groups\":{\"view\":\"1\"},\"media\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"menus\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"page\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"post\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"setting\":{\"view\":\"1\",\"add\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"import\":\"1\",\"export\":\"1\"},\"users\":{\"view\":\"1\"}}');

-- ----------------------------
-- Table structure for ap_log_action
-- ----------------------------
DROP TABLE IF EXISTS `ap_log_action`;
CREATE TABLE `ap_log_action`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `uid` int(11) NOT NULL,
  `created_time` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1384 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_log_action
-- ----------------------------
INSERT INTO `ap_log_action` VALUES (1, 'room', 'Update room: 2', 1, '2019-04-08 02:28:48');
INSERT INTO `ap_log_action` VALUES (2, 'property', 'Update property: 3', 1, '2019-04-08 04:20:27');
INSERT INTO `ap_log_action` VALUES (3, 'property', 'Update property: 4', 1, '2019-04-08 04:20:30');
INSERT INTO `ap_log_action` VALUES (4, 'property', 'Update property: 5', 1, '2019-04-08 04:20:33');
INSERT INTO `ap_log_action` VALUES (5, 'banner', 'Sửa Banner có id là 2', 1, '2019-04-09 10:46:37');
INSERT INTO `ap_log_action` VALUES (6, 'room', 'Update room: 1', 1, '2019-04-09 02:00:41');
INSERT INTO `ap_log_action` VALUES (7, 'room', 'Update room: 2', 1, '2019-04-09 02:00:46');
INSERT INTO `ap_log_action` VALUES (8, 'room', 'Update room: 16', 1, '2019-04-10 04:52:39');
INSERT INTO `ap_log_action` VALUES (9, 'renter', 'Update renter: 1', 1, '2019-04-11 11:05:20');
INSERT INTO `ap_log_action` VALUES (10, 'users', 'Insert users: 0', 1, '2019-04-11 02:36:28');
INSERT INTO `ap_log_action` VALUES (11, 'users', 'Update users: 37', 37, '2019-04-11 02:53:43');
INSERT INTO `ap_log_action` VALUES (12, 'users', 'Insert users: 0', 37, '2019-04-11 03:26:42');
INSERT INTO `ap_log_action` VALUES (13, 'groups', 'Insert groups: 3', 37, '2019-04-11 05:15:57');
INSERT INTO `ap_log_action` VALUES (14, 'groups', 'Update groups: 3', 37, '2019-04-11 05:20:39');
INSERT INTO `ap_log_action` VALUES (15, 'groups', 'Update groups: 3', 37, '2019-04-11 05:20:51');
INSERT INTO `ap_log_action` VALUES (16, 'groups', 'Insert groups: 4', 37, '2019-04-11 05:25:49');
INSERT INTO `ap_log_action` VALUES (17, 'groups', 'Update groups: 4', 37, '2019-04-11 05:25:57');
INSERT INTO `ap_log_action` VALUES (18, 'groups', 'Update groups: 3', 37, '2019-04-11 05:25:57');
INSERT INTO `ap_log_action` VALUES (19, 'groups', 'Insert groups: 5', 37, '2019-04-11 05:26:11');
INSERT INTO `ap_log_action` VALUES (20, 'groups', 'Update groups: 5', 37, '2019-04-11 05:26:16');
INSERT INTO `ap_log_action` VALUES (21, 'groups', 'Insert groups: 6', 37, '2019-04-11 05:27:18');
INSERT INTO `ap_log_action` VALUES (22, 'groups', 'Insert groups: 7', 37, '2019-04-11 05:27:20');
INSERT INTO `ap_log_action` VALUES (23, 'groups', 'Insert groups: 8', 37, '2019-04-11 05:27:23');
INSERT INTO `ap_log_action` VALUES (24, 'groups', 'Insert groups: 9', 37, '2019-04-11 05:27:26');
INSERT INTO `ap_log_action` VALUES (25, 'groups', 'Insert groups: 10', 37, '2019-04-11 05:27:28');
INSERT INTO `ap_log_action` VALUES (26, 'groups', 'Insert groups: 11', 37, '2019-04-11 05:27:37');
INSERT INTO `ap_log_action` VALUES (27, 'groups', 'Insert groups: 12', 37, '2019-04-11 05:27:40');
INSERT INTO `ap_log_action` VALUES (28, 'groups', 'Insert groups: 13', 37, '2019-04-11 05:27:43');
INSERT INTO `ap_log_action` VALUES (29, 'groups', 'Insert groups: 14', 37, '2019-04-11 05:27:46');
INSERT INTO `ap_log_action` VALUES (30, 'groups', 'Update groups: 14', 37, '2019-04-11 05:28:06');
INSERT INTO `ap_log_action` VALUES (31, 'groups', 'Update groups: 6', 37, '2019-04-11 05:28:25');
INSERT INTO `ap_log_action` VALUES (32, 'groups', 'Update groups: 7', 37, '2019-04-11 05:28:25');
INSERT INTO `ap_log_action` VALUES (33, 'groups', 'Update groups: 8', 37, '2019-04-11 05:28:25');
INSERT INTO `ap_log_action` VALUES (34, 'groups', 'Update groups: 9', 37, '2019-04-11 05:28:25');
INSERT INTO `ap_log_action` VALUES (35, 'groups', 'Update groups: 10', 37, '2019-04-11 05:28:25');
INSERT INTO `ap_log_action` VALUES (36, 'groups', 'Update groups: 11', 37, '2019-04-11 05:28:25');
INSERT INTO `ap_log_action` VALUES (37, 'groups', 'Update groups: 12', 37, '2019-04-11 05:28:25');
INSERT INTO `ap_log_action` VALUES (38, 'groups', 'Update groups: 13', 37, '2019-04-11 05:28:25');
INSERT INTO `ap_log_action` VALUES (39, 'groups', 'Insert groups: 15', 37, '2019-04-11 05:50:44');
INSERT INTO `ap_log_action` VALUES (40, 'groups', 'Update groups: 15', 37, '2019-04-11 05:55:52');
INSERT INTO `ap_log_action` VALUES (41, 'groups', 'Update groups: 15', 37, '2019-04-11 05:56:52');
INSERT INTO `ap_log_action` VALUES (42, 'groups', 'Update groups: 15', 37, '2019-04-11 05:58:08');
INSERT INTO `ap_log_action` VALUES (43, 'users', 'Update users: 38', 1, '2019-04-12 01:47:19');
INSERT INTO `ap_log_action` VALUES (44, 'users', 'Update users: 38', 38, '2019-04-12 01:47:48');
INSERT INTO `ap_log_action` VALUES (45, 'users', 'delete users: 37', 38, '2019-04-12 01:48:12');
INSERT INTO `ap_log_action` VALUES (46, 'unit', 'Insert unit: 1', 1, '2019-04-12 01:56:52');
INSERT INTO `ap_log_action` VALUES (47, 'users', 'Update users: 36', 1, '2019-04-12 02:04:50');
INSERT INTO `ap_log_action` VALUES (48, 'users', 'Update users: 38', 1, '2019-04-12 02:04:55');
INSERT INTO `ap_log_action` VALUES (49, 'users', 'Update users: 38', 1, '2019-04-12 02:17:37');
INSERT INTO `ap_log_action` VALUES (50, 'users', 'Update users: 38', 38, '2019-04-12 02:18:07');
INSERT INTO `ap_log_action` VALUES (51, 'users', 'Insert users: 0', 38, '2019-04-12 02:19:13');
INSERT INTO `ap_log_action` VALUES (52, 'users', 'Insert users: 0', 38, '2019-04-12 02:19:47');
INSERT INTO `ap_log_action` VALUES (53, 'users', 'Insert users: 0', 38, '2019-04-12 02:19:55');
INSERT INTO `ap_log_action` VALUES (54, 'users', 'Insert users: 0', 38, '2019-04-12 02:20:07');
INSERT INTO `ap_log_action` VALUES (55, 'users', 'Insert users: 0', 38, '2019-04-12 02:20:17');
INSERT INTO `ap_log_action` VALUES (56, 'users', 'Insert users: 0', 38, '2019-04-12 02:20:26');
INSERT INTO `ap_log_action` VALUES (57, 'users', 'Insert users: 0', 38, '2019-04-12 02:20:36');
INSERT INTO `ap_log_action` VALUES (58, 'users', 'delete users: 45', 38, '2019-04-12 02:21:21');
INSERT INTO `ap_log_action` VALUES (59, 'users', 'delete users: 44', 38, '2019-04-12 02:21:21');
INSERT INTO `ap_log_action` VALUES (60, 'users', 'delete users: 43', 38, '2019-04-12 02:21:21');
INSERT INTO `ap_log_action` VALUES (61, 'users', 'delete users: 42', 38, '2019-04-12 02:21:21');
INSERT INTO `ap_log_action` VALUES (62, 'users', 'delete users: 41', 38, '2019-04-12 02:21:21');
INSERT INTO `ap_log_action` VALUES (63, 'users', 'delete users: 40', 38, '2019-04-12 02:21:21');
INSERT INTO `ap_log_action` VALUES (64, 'users', 'delete users: 39', 38, '2019-04-12 02:21:45');
INSERT INTO `ap_log_action` VALUES (65, 'account', 'Update account: 19', 1, '2019-04-12 02:40:51');
INSERT INTO `ap_log_action` VALUES (66, 'account', 'Update account: 19', 1, '2019-04-12 02:41:09');
INSERT INTO `ap_log_action` VALUES (67, 'account', 'Insert account: 23', 1, '2019-04-12 02:49:24');
INSERT INTO `ap_log_action` VALUES (68, 'account', 'Update account: 23', 1, '2019-04-12 02:52:36');
INSERT INTO `ap_log_action` VALUES (69, 'account', 'Update account: 23', 1, '2019-04-12 02:53:10');
INSERT INTO `ap_log_action` VALUES (70, 'account', 'Update account: 23', 1, '2019-04-12 02:53:22');
INSERT INTO `ap_log_action` VALUES (71, 'account', 'Insert account: 24', 1, '2019-04-12 02:54:17');
INSERT INTO `ap_log_action` VALUES (72, 'account', 'Update account: 24', 1, '2019-04-12 02:54:59');
INSERT INTO `ap_log_action` VALUES (73, 'account', 'Update account: 24', 1, '2019-04-12 02:55:43');
INSERT INTO `ap_log_action` VALUES (74, 'account', 'Update account: 24', 1, '2019-04-12 02:56:07');
INSERT INTO `ap_log_action` VALUES (75, 'account', 'Update account: 23', 1, '2019-04-12 02:56:45');
INSERT INTO `ap_log_action` VALUES (76, 'account', 'Update account: 23', 1, '2019-04-12 02:57:43');
INSERT INTO `ap_log_action` VALUES (77, 'account', 'Update account: 24', 1, '2019-04-12 03:15:31');
INSERT INTO `ap_log_action` VALUES (78, 'account', 'Update account: 24', 1, '2019-04-12 03:17:26');
INSERT INTO `ap_log_action` VALUES (79, 'account', 'Update account: 24', 1, '2019-04-12 03:22:03');
INSERT INTO `ap_log_action` VALUES (80, 'account', 'Insert account: 25', 1, '2019-04-12 03:32:08');
INSERT INTO `ap_log_action` VALUES (81, 'account', 'Insert account: 26', 1, '2019-04-12 03:40:13');
INSERT INTO `ap_log_action` VALUES (82, 'account', 'Insert account: 27', 1, '2019-04-12 03:40:41');
INSERT INTO `ap_log_action` VALUES (83, 'account', 'Insert account: 28', 1, '2019-04-12 03:41:13');
INSERT INTO `ap_log_action` VALUES (84, 'account', 'Insert account: 29', 1, '2019-04-12 03:41:57');
INSERT INTO `ap_log_action` VALUES (85, 'account', 'Update account: 29', 1, '2019-04-12 03:47:53');
INSERT INTO `ap_log_action` VALUES (86, 'account', 'delete account: 29', 1, '2019-04-12 03:54:10');
INSERT INTO `ap_log_action` VALUES (87, 'account', 'delete account: 28', 1, '2019-04-12 03:54:10');
INSERT INTO `ap_log_action` VALUES (88, 'account', 'delete account: 27', 1, '2019-04-12 03:54:10');
INSERT INTO `ap_log_action` VALUES (89, 'account', 'delete account: 26', 1, '2019-04-12 03:54:16');
INSERT INTO `ap_log_action` VALUES (90, 'property', 'Update property: 5', 1, '2019-04-16 09:18:56');
INSERT INTO `ap_log_action` VALUES (91, 'property', 'Insert property: 0', 1, '2019-04-16 09:19:18');
INSERT INTO `ap_log_action` VALUES (92, 'property', 'Insert property: 0', 1, '2019-04-16 09:21:03');
INSERT INTO `ap_log_action` VALUES (93, 'property', 'Update property: 9', 1, '2019-04-16 09:21:12');
INSERT INTO `ap_log_action` VALUES (94, 'property', 'Update property: 9', 1, '2019-04-16 09:21:21');
INSERT INTO `ap_log_action` VALUES (95, 'property', 'Insert property: 0', 1, '2019-04-16 09:22:48');
INSERT INTO `ap_log_action` VALUES (96, 'property', 'Insert property: 0', 1, '2019-04-16 09:22:53');
INSERT INTO `ap_log_action` VALUES (97, 'property', 'Insert property: 0', 1, '2019-04-16 09:23:54');
INSERT INTO `ap_log_action` VALUES (98, 'property', 'Insert property: 0', 1, '2019-04-16 09:24:09');
INSERT INTO `ap_log_action` VALUES (99, 'property', 'Insert property: 0', 1, '2019-04-16 09:24:14');
INSERT INTO `ap_log_action` VALUES (100, 'property', 'Insert property: 0', 1, '2019-04-16 09:24:19');
INSERT INTO `ap_log_action` VALUES (101, 'property', 'Update property: 15', 1, '2019-04-16 09:25:20');
INSERT INTO `ap_log_action` VALUES (102, 'property', 'Update property: 14', 1, '2019-04-16 09:25:20');
INSERT INTO `ap_log_action` VALUES (103, 'property', 'Update property: 13', 1, '2019-04-16 09:25:20');
INSERT INTO `ap_log_action` VALUES (104, 'property', 'Update property: 12', 1, '2019-04-16 09:25:25');
INSERT INTO `ap_log_action` VALUES (105, 'property', 'Update property: 5', 1, '2019-04-16 09:25:53');
INSERT INTO `ap_log_action` VALUES (106, 'property', 'Update property: 5', 1, '2019-04-16 09:26:22');
INSERT INTO `ap_log_action` VALUES (107, 'property', 'Update property: 10', 1, '2019-04-16 09:33:06');
INSERT INTO `ap_log_action` VALUES (108, 'property', 'Update property: 11', 1, '2019-04-16 09:35:02');
INSERT INTO `ap_log_action` VALUES (109, 'property', 'Insert property: 0', 1, '2019-04-16 09:35:47');
INSERT INTO `ap_log_action` VALUES (110, 'property', 'Update property: 11', 1, '2019-04-16 09:35:54');
INSERT INTO `ap_log_action` VALUES (111, 'property', 'Insert property: 0', 1, '2019-04-16 09:37:38');
INSERT INTO `ap_log_action` VALUES (112, 'property', 'Insert property: 0', 1, '2019-04-16 09:38:18');
INSERT INTO `ap_log_action` VALUES (113, 'property', 'Insert property: 0', 1, '2019-04-16 09:39:48');
INSERT INTO `ap_log_action` VALUES (114, 'property', 'Insert property: 0', 1, '2019-04-16 09:40:31');
INSERT INTO `ap_log_action` VALUES (115, 'property', 'Update property: 5', 1, '2019-04-16 09:44:25');
INSERT INTO `ap_log_action` VALUES (116, 'property', 'Update property: 4', 1, '2019-04-16 09:44:56');
INSERT INTO `ap_log_action` VALUES (117, 'property', 'Insert property: 0', 1, '2019-04-16 09:45:24');
INSERT INTO `ap_log_action` VALUES (118, 'property', 'Update property: 21', 1, '2019-04-16 09:49:13');
INSERT INTO `ap_log_action` VALUES (119, 'property', 'Update property: 5', 1, '2019-04-16 09:49:52');
INSERT INTO `ap_log_action` VALUES (120, 'property', 'Update property: 4', 1, '2019-04-16 09:49:57');
INSERT INTO `ap_log_action` VALUES (121, 'category', 'Insert category: 3', 1, '2019-04-16 09:52:21');
INSERT INTO `ap_log_action` VALUES (122, 'category', 'Insert category: 4', 1, '2019-04-16 09:54:07');
INSERT INTO `ap_log_action` VALUES (123, 'category', 'Insert category: 5', 1, '2019-04-16 09:55:39');
INSERT INTO `ap_log_action` VALUES (124, 'category', 'Insert category: 6', 1, '2019-04-16 09:57:05');
INSERT INTO `ap_log_action` VALUES (125, 'category', 'Insert category: 7', 1, '2019-04-16 09:59:33');
INSERT INTO `ap_log_action` VALUES (126, 'category', 'Insert category: 8', 1, '2019-04-16 10:00:32');
INSERT INTO `ap_log_action` VALUES (127, 'category', 'Update category: 8', 1, '2019-04-16 10:01:40');
INSERT INTO `ap_log_action` VALUES (128, 'category', 'Insert category: 9', 1, '2019-04-16 10:02:14');
INSERT INTO `ap_log_action` VALUES (129, 'category', 'Insert category: 10', 1, '2019-04-16 10:02:29');
INSERT INTO `ap_log_action` VALUES (130, 'category', 'Update category: 10', 1, '2019-04-16 10:02:34');
INSERT INTO `ap_log_action` VALUES (131, 'category', 'Update category: 9', 1, '2019-04-16 10:02:34');
INSERT INTO `ap_log_action` VALUES (132, 'category', 'Update category: 8', 1, '2019-04-16 10:02:40');
INSERT INTO `ap_log_action` VALUES (133, 'category', 'Insert category: 11', 1, '2019-04-16 10:02:59');
INSERT INTO `ap_log_action` VALUES (134, 'category', 'Insert category: 12', 1, '2019-04-16 10:03:11');
INSERT INTO `ap_log_action` VALUES (135, 'category', 'Insert category: 13', 1, '2019-04-16 10:03:22');
INSERT INTO `ap_log_action` VALUES (136, 'category', 'Insert category: 14', 1, '2019-04-16 10:03:33');
INSERT INTO `ap_log_action` VALUES (137, 'category', 'Insert category: 15', 1, '2019-04-16 10:03:49');
INSERT INTO `ap_log_action` VALUES (138, 'category', 'Update category: 15', 1, '2019-04-16 10:04:44');
INSERT INTO `ap_log_action` VALUES (139, 'category', 'Update category: 14', 1, '2019-04-16 10:04:44');
INSERT INTO `ap_log_action` VALUES (140, 'category', 'Update category: 13', 1, '2019-04-16 10:04:44');
INSERT INTO `ap_log_action` VALUES (141, 'category', 'Update category: 12', 1, '2019-04-16 10:04:44');
INSERT INTO `ap_log_action` VALUES (142, 'category', 'Update category: 11', 1, '2019-04-16 10:04:44');
INSERT INTO `ap_log_action` VALUES (143, 'category', 'Update category: 2', 1, '2019-04-16 10:05:44');
INSERT INTO `ap_log_action` VALUES (144, 'category', 'Update category: 2', 1, '2019-04-16 10:05:53');
INSERT INTO `ap_log_action` VALUES (145, 'category', 'Update category: 2', 1, '2019-04-16 10:06:05');
INSERT INTO `ap_log_action` VALUES (146, 'category', 'Update category: 2', 1, '2019-04-16 10:06:13');
INSERT INTO `ap_log_action` VALUES (147, 'property', 'Insert property: 0', 1, '2019-04-16 10:50:13');
INSERT INTO `ap_log_action` VALUES (148, 'property', 'Update property: 22', 1, '2019-04-16 10:50:21');
INSERT INTO `ap_log_action` VALUES (149, 'property', 'Insert property: 0', 1, '2019-04-16 10:52:38');
INSERT INTO `ap_log_action` VALUES (150, 'property', 'Update property: 23', 1, '2019-04-16 10:52:45');
INSERT INTO `ap_log_action` VALUES (151, 'property', 'Insert property: 0', 1, '2019-04-16 10:53:19');
INSERT INTO `ap_log_action` VALUES (152, 'property', 'Insert property: 0', 1, '2019-04-16 10:53:55');
INSERT INTO `ap_log_action` VALUES (153, 'property', 'Insert property: 0', 1, '2019-04-16 10:54:43');
INSERT INTO `ap_log_action` VALUES (154, 'property', 'Insert property: 0', 1, '2019-04-16 10:55:06');
INSERT INTO `ap_log_action` VALUES (155, 'category', 'Insert category: 16', 1, '2019-04-16 10:59:33');
INSERT INTO `ap_log_action` VALUES (156, 'room', 'Update room: 1', 1, '2019-04-16 11:04:56');
INSERT INTO `ap_log_action` VALUES (157, 'room', 'Update room: 2', 1, '2019-04-16 11:16:58');
INSERT INTO `ap_log_action` VALUES (158, 'room', 'Update room: 2', 1, '2019-04-16 11:17:25');
INSERT INTO `ap_log_action` VALUES (159, 'category', 'Insert category: 17', 1, '2019-04-16 11:29:42');
INSERT INTO `ap_log_action` VALUES (160, 'category', 'Update category: 17', 1, '2019-04-16 11:32:17');
INSERT INTO `ap_log_action` VALUES (161, 'category', 'Update category: 1', 1, '2019-04-16 11:33:17');
INSERT INTO `ap_log_action` VALUES (162, 'category', 'Update category: 1', 1, '2019-04-16 11:33:26');
INSERT INTO `ap_log_action` VALUES (163, 'category', 'Insert category: 18', 1, '2019-04-16 11:34:08');
INSERT INTO `ap_log_action` VALUES (164, 'category', 'Insert category: 19', 1, '2019-04-16 11:34:42');
INSERT INTO `ap_log_action` VALUES (165, 'category', 'Insert category: 20', 1, '2019-04-16 11:35:11');
INSERT INTO `ap_log_action` VALUES (166, 'post', 'Update post: 1', 1, '2019-04-16 11:37:35');
INSERT INTO `ap_log_action` VALUES (167, 'post', 'Insert post: 2', 1, '2019-04-16 11:39:12');
INSERT INTO `ap_log_action` VALUES (168, 'post', 'Insert post: 3', 1, '2019-04-16 11:40:15');
INSERT INTO `ap_log_action` VALUES (169, 'post', 'Insert post: 4', 1, '2019-04-16 11:40:53');
INSERT INTO `ap_log_action` VALUES (170, 'post', 'Insert post: 5', 1, '2019-04-16 11:41:38');
INSERT INTO `ap_log_action` VALUES (171, 'post', 'Update post: 1', 1, '2019-04-16 11:42:40');
INSERT INTO `ap_log_action` VALUES (172, 'account', 'Update account: 25', 1, '2019-04-16 02:11:41');
INSERT INTO `ap_log_action` VALUES (173, 'account', 'Insert account: 30', 1, '2019-04-16 02:29:32');
INSERT INTO `ap_log_action` VALUES (174, 'account', 'Insert account: 31', 1, '2019-04-16 02:58:17');
INSERT INTO `ap_log_action` VALUES (175, 'account', 'Update account: 31', 1, '2019-04-16 03:02:15');
INSERT INTO `ap_log_action` VALUES (176, 'account', 'Update account: 30', 1, '2019-04-16 03:02:36');
INSERT INTO `ap_log_action` VALUES (177, 'account', 'Update account: 31', 1, '2019-04-16 03:02:41');
INSERT INTO `ap_log_action` VALUES (178, 'account', 'Update account: 31', 1, '2019-04-16 03:03:01');
INSERT INTO `ap_log_action` VALUES (179, 'account', 'Update account: 31', 1, '2019-04-16 03:03:08');
INSERT INTO `ap_log_action` VALUES (180, 'account', 'Update account: 31', 1, '2019-04-16 03:03:14');
INSERT INTO `ap_log_action` VALUES (181, 'account', 'Update account: 25', 1, '2019-04-16 03:10:55');
INSERT INTO `ap_log_action` VALUES (182, 'account', 'Update account: 31', 1, '2019-04-16 03:11:29');
INSERT INTO `ap_log_action` VALUES (183, 'account', 'Update account: 31', 1, '2019-04-16 03:11:59');
INSERT INTO `ap_log_action` VALUES (184, 'account', 'Update account: 31', 1, '2019-04-16 03:12:31');
INSERT INTO `ap_log_action` VALUES (185, 'account', 'Update account: 31', 1, '2019-04-16 03:18:50');
INSERT INTO `ap_log_action` VALUES (186, 'account', 'Update account: 30', 1, '2019-04-16 03:20:48');
INSERT INTO `ap_log_action` VALUES (187, 'account', 'Update account: 30', 1, '2019-04-16 03:20:58');
INSERT INTO `ap_log_action` VALUES (188, 'account', 'Update account: 30', 1, '2019-04-16 03:21:23');
INSERT INTO `ap_log_action` VALUES (189, 'account', 'Update account: 30', 1, '2019-04-16 03:21:52');
INSERT INTO `ap_log_action` VALUES (190, 'category', 'Insert category: 21', 1, '2019-04-16 04:13:47');
INSERT INTO `ap_log_action` VALUES (191, 'category', 'Update category: 21', 1, '2019-04-16 04:14:46');
INSERT INTO `ap_log_action` VALUES (192, 'category', 'Insert category: 22', 1, '2019-04-16 04:15:17');
INSERT INTO `ap_log_action` VALUES (193, 'category', 'Insert category: 23', 1, '2019-04-16 04:15:33');
INSERT INTO `ap_log_action` VALUES (194, 'category', 'Update category: 23', 1, '2019-04-16 04:15:39');
INSERT INTO `ap_log_action` VALUES (195, 'category', 'Update category: 22', 1, '2019-04-16 04:15:39');
INSERT INTO `ap_log_action` VALUES (196, 'category', 'Update category: 21', 1, '2019-04-16 04:15:43');
INSERT INTO `ap_log_action` VALUES (197, 'category', 'Insert category: 24', 1, '2019-04-16 04:17:42');
INSERT INTO `ap_log_action` VALUES (198, 'category', 'Insert category: 25', 1, '2019-04-16 04:17:52');
INSERT INTO `ap_log_action` VALUES (199, 'category', 'Insert category: 26', 1, '2019-04-16 04:18:02');
INSERT INTO `ap_log_action` VALUES (200, 'category', 'Insert category: 27', 1, '2019-04-16 04:18:12');
INSERT INTO `ap_log_action` VALUES (201, 'category', 'Insert category: 28', 1, '2019-04-16 04:18:24');
INSERT INTO `ap_log_action` VALUES (202, 'category', 'Insert category: 29', 1, '2019-04-16 04:18:34');
INSERT INTO `ap_log_action` VALUES (203, 'category', 'Update category: 29', 1, '2019-04-16 04:19:30');
INSERT INTO `ap_log_action` VALUES (204, 'category', 'Update category: 28', 1, '2019-04-16 04:19:30');
INSERT INTO `ap_log_action` VALUES (205, 'category', 'Update category: 27', 1, '2019-04-16 04:19:30');
INSERT INTO `ap_log_action` VALUES (206, 'category', 'Update category: 26', 1, '2019-04-16 04:19:30');
INSERT INTO `ap_log_action` VALUES (207, 'category', 'Update category: 25', 1, '2019-04-16 04:19:30');
INSERT INTO `ap_log_action` VALUES (208, 'category', 'Update category: 24', 1, '2019-04-16 04:19:30');
INSERT INTO `ap_log_action` VALUES (209, 'post', 'Insert post: 6', 1, '2019-04-16 04:32:05');
INSERT INTO `ap_log_action` VALUES (210, 'post', 'Insert post: 7', 1, '2019-04-16 04:33:50');
INSERT INTO `ap_log_action` VALUES (211, 'post', 'Insert post: 8', 1, '2019-04-16 04:34:03');
INSERT INTO `ap_log_action` VALUES (212, 'post', 'Insert post: 9', 1, '2019-04-16 04:34:22');
INSERT INTO `ap_log_action` VALUES (213, 'post', 'Insert post: 10', 1, '2019-04-16 04:34:35');
INSERT INTO `ap_log_action` VALUES (214, 'post', 'Insert post: 11', 1, '2019-04-16 04:34:50');
INSERT INTO `ap_log_action` VALUES (215, 'post', 'Update post: 11', 1, '2019-04-16 04:36:09');
INSERT INTO `ap_log_action` VALUES (216, 'post', 'Update post: 10', 1, '2019-04-16 04:36:20');
INSERT INTO `ap_log_action` VALUES (217, 'post', 'Update post: 9', 1, '2019-04-16 04:36:31');
INSERT INTO `ap_log_action` VALUES (218, 'post', 'Update post: 8', 1, '2019-04-16 04:36:40');
INSERT INTO `ap_log_action` VALUES (219, 'post', 'Update post: 7', 1, '2019-04-16 04:36:40');
INSERT INTO `ap_log_action` VALUES (220, 'post', 'Update post: 6', 1, '2019-04-16 04:36:40');
INSERT INTO `ap_log_action` VALUES (221, 'message_system', 'Sửa message_system có id là 6', 1, '2019-04-16 05:08:29');
INSERT INTO `ap_log_action` VALUES (222, 'message_system', 'Sửa message_system có id là 6', 1, '2019-04-16 05:08:35');
INSERT INTO `ap_log_action` VALUES (223, 'message_system', 'Sửa message_system có id là 7', 1, '2019-04-16 05:21:19');
INSERT INTO `ap_log_action` VALUES (224, 'message_system', 'Sửa message_system có id là 8', 1, '2019-04-16 05:22:15');
INSERT INTO `ap_log_action` VALUES (225, 'message_system', 'Sửa message_system có id là 8', 1, '2019-04-16 05:22:24');
INSERT INTO `ap_log_action` VALUES (226, 'message_system', 'Sửa message_system có id là 9', 1, '2019-04-16 05:43:38');
INSERT INTO `ap_log_action` VALUES (227, 'message_system', 'Sửa message_system có id là 9', 1, '2019-04-16 05:59:07');
INSERT INTO `ap_log_action` VALUES (228, 'message_system', 'Sửa message_system có id là 10', 1, '2019-04-17 09:30:38');
INSERT INTO `ap_log_action` VALUES (229, 'page', 'Insert page: 0', 1, '2019-04-17 09:44:44');
INSERT INTO `ap_log_action` VALUES (230, 'page', 'Insert page: 0', 1, '2019-04-17 09:45:01');
INSERT INTO `ap_log_action` VALUES (231, 'page', 'Update page: 14', 1, '2019-04-17 09:45:10');
INSERT INTO `ap_log_action` VALUES (232, 'page', 'Update page: 13', 1, '2019-04-17 09:45:16');
INSERT INTO `ap_log_action` VALUES (233, 'page', 'Insert page: 0', 1, '2019-04-17 09:57:55');
INSERT INTO `ap_log_action` VALUES (234, 'page', 'Update page: 15', 1, '2019-04-17 09:58:14');
INSERT INTO `ap_log_action` VALUES (235, 'page', 'Update page: 15', 1, '2019-04-17 09:58:37');
INSERT INTO `ap_log_action` VALUES (236, 'groups', 'Insert groups: 16', 1, '2019-04-17 11:32:08');
INSERT INTO `ap_log_action` VALUES (237, 'groups', 'Update groups: 16', 1, '2019-04-17 11:32:26');
INSERT INTO `ap_log_action` VALUES (238, 'groups', 'Update groups: 16', 1, '2019-04-17 11:32:33');
INSERT INTO `ap_log_action` VALUES (239, 'groups', 'Insert groups: 17', 1, '2019-04-17 11:33:18');
INSERT INTO `ap_log_action` VALUES (240, 'groups', 'Insert groups: 18', 1, '2019-04-17 11:33:45');
INSERT INTO `ap_log_action` VALUES (241, 'users', 'Update users: 38', 1, '2019-04-17 11:41:12');
INSERT INTO `ap_log_action` VALUES (242, 'users', 'Update users: 38', 1, '2019-04-17 11:43:43');
INSERT INTO `ap_log_action` VALUES (243, 'users', 'Update users: 38', 1, '2019-04-17 11:43:51');
INSERT INTO `ap_log_action` VALUES (244, 'groups', 'Update groups: 18', 1, '2019-04-17 11:50:34');
INSERT INTO `ap_log_action` VALUES (245, 'users', 'Update users: 38', 1, '2019-04-17 11:51:03');
INSERT INTO `ap_log_action` VALUES (246, 'groups', 'Insert groups: 19', 1, '2019-04-17 11:52:32');
INSERT INTO `ap_log_action` VALUES (247, 'groups', 'Update groups: 19', 1, '2019-04-17 01:33:01');
INSERT INTO `ap_log_action` VALUES (248, 'users', 'Insert users: 0', 1, '2019-04-17 01:35:33');
INSERT INTO `ap_log_action` VALUES (249, 'account', 'Update account: 31', 1, '2019-04-17 01:47:20');
INSERT INTO `ap_log_action` VALUES (250, 'account', 'Update account: 31', 1, '2019-04-17 01:47:47');
INSERT INTO `ap_log_action` VALUES (251, 'account', 'Update account: 31', 1, '2019-04-17 01:48:03');
INSERT INTO `ap_log_action` VALUES (252, 'account', 'Update account: 31', 1, '2019-04-17 01:48:24');
INSERT INTO `ap_log_action` VALUES (253, 'account', 'Update account: 31', 1, '2019-04-17 01:48:31');
INSERT INTO `ap_log_action` VALUES (254, 'account', 'Update account: 31', 1, '2019-04-17 01:48:45');
INSERT INTO `ap_log_action` VALUES (255, 'account', 'Insert account: 45', 1, '2019-04-17 01:50:07');
INSERT INTO `ap_log_action` VALUES (256, 'account', 'delete account: 45', 1, '2019-04-17 02:10:28');
INSERT INTO `ap_log_action` VALUES (257, 'account', 'delete account: 31', 1, '2019-04-17 02:14:37');
INSERT INTO `ap_log_action` VALUES (258, 'account', 'delete account: 30', 1, '2019-04-17 02:14:37');
INSERT INTO `ap_log_action` VALUES (259, 'account', 'delete account: 25', 1, '2019-04-17 02:14:37');
INSERT INTO `ap_log_action` VALUES (260, 'account', 'delete account: 24', 1, '2019-04-17 02:14:37');
INSERT INTO `ap_log_action` VALUES (261, 'account', 'delete account: 23', 1, '2019-04-17 02:14:37');
INSERT INTO `ap_log_action` VALUES (262, 'account', 'Insert account: 46', 1, '2019-04-17 02:15:16');
INSERT INTO `ap_log_action` VALUES (263, 'contact', 'Update contact: 44', 1, '2019-04-17 03:03:08');
INSERT INTO `ap_log_action` VALUES (264, 'contact', 'Update contact: 41', 1, '2019-04-17 03:04:15');
INSERT INTO `ap_log_action` VALUES (265, 'contact', 'Update contact: 40', 1, '2019-04-17 03:04:15');
INSERT INTO `ap_log_action` VALUES (266, 'property', 'Insert property: 0', 1, '2019-04-18 03:08:39');
INSERT INTO `ap_log_action` VALUES (267, 'property', 'Update property: 28', 1, '2019-04-18 03:10:54');
INSERT INTO `ap_log_action` VALUES (268, 'property', 'Insert property: 0', 1, '2019-04-18 03:11:13');
INSERT INTO `ap_log_action` VALUES (269, 'property', 'Insert property: 0', 1, '2019-04-18 03:11:39');
INSERT INTO `ap_log_action` VALUES (270, 'property', 'Insert property: 0', 1, '2019-04-18 03:12:21');
INSERT INTO `ap_log_action` VALUES (271, 'property', 'Update property: 31', 1, '2019-04-18 03:12:36');
INSERT INTO `ap_log_action` VALUES (272, 'property', 'Insert property: 0', 1, '2019-04-18 03:13:53');
INSERT INTO `ap_log_action` VALUES (273, 'property', 'Update property: 32', 1, '2019-04-18 03:14:01');
INSERT INTO `ap_log_action` VALUES (274, 'property', 'Update property: 32', 1, '2019-04-18 03:16:43');
INSERT INTO `ap_log_action` VALUES (275, 'property', 'Update property: 30', 1, '2019-04-18 03:16:43');
INSERT INTO `ap_log_action` VALUES (276, 'property', 'Update property: 29', 1, '2019-04-18 03:16:48');
INSERT INTO `ap_log_action` VALUES (277, 'post', 'Thêm Banner có id là 8', 1, '2019-04-18 03:29:12');
INSERT INTO `ap_log_action` VALUES (278, 'post', 'Thêm Banner có id là 9', 1, '2019-04-18 03:34:23');
INSERT INTO `ap_log_action` VALUES (279, 'property', 'Insert property: 0', 1, '2019-04-18 03:40:55');
INSERT INTO `ap_log_action` VALUES (280, 'property', 'Insert property: 0', 1, '2019-04-18 03:46:16');
INSERT INTO `ap_log_action` VALUES (281, 'property', 'Insert property: 0', 1, '2019-04-18 03:46:24');
INSERT INTO `ap_log_action` VALUES (282, 'post', 'Thêm Banner có id là 10', 1, '2019-04-19 09:25:56');
INSERT INTO `ap_log_action` VALUES (283, 'post', 'Thêm Banner có id là 11', 1, '2019-04-19 09:27:27');
INSERT INTO `ap_log_action` VALUES (284, 'post', 'Thêm Banner có id là 12', 1, '2019-04-19 09:28:25');
INSERT INTO `ap_log_action` VALUES (285, 'post', 'Thêm Banner có id là 13', 1, '2019-04-19 09:48:32');
INSERT INTO `ap_log_action` VALUES (286, 'post', 'Thêm Banner có id là 14', 1, '2019-04-19 09:48:43');
INSERT INTO `ap_log_action` VALUES (287, 'post', 'Thêm Banner có id là 15', 1, '2019-04-19 09:52:27');
INSERT INTO `ap_log_action` VALUES (288, 'post', 'Thêm Banner có id là 16', 1, '2019-04-19 09:53:41');
INSERT INTO `ap_log_action` VALUES (289, 'property', 'Insert property: 0', 1, '2019-04-19 09:54:14');
INSERT INTO `ap_log_action` VALUES (290, 'post', 'Thêm Banner có id là 17', 1, '2019-04-19 09:55:53');
INSERT INTO `ap_log_action` VALUES (291, 'post', 'Thêm Banner có id là 18', 1, '2019-04-19 10:04:40');
INSERT INTO `ap_log_action` VALUES (292, 'property', 'Insert property: 0', 1, '2019-04-19 10:33:16');
INSERT INTO `ap_log_action` VALUES (293, 'property', 'Insert property: 0', 1, '2019-04-19 10:33:35');
INSERT INTO `ap_log_action` VALUES (294, 'property', 'Insert property: 0', 1, '2019-04-19 10:33:53');
INSERT INTO `ap_log_action` VALUES (295, 'property', 'Insert property: 0', 1, '2019-04-19 10:34:10');
INSERT INTO `ap_log_action` VALUES (296, 'property', 'Insert property: 0', 1, '2019-04-19 10:34:23');
INSERT INTO `ap_log_action` VALUES (297, 'property', 'Insert property: 0', 1, '2019-04-19 10:34:38');
INSERT INTO `ap_log_action` VALUES (298, 'property', 'Insert property: 0', 1, '2019-04-19 10:34:54');
INSERT INTO `ap_log_action` VALUES (299, 'property', 'Insert property: 0', 1, '2019-04-19 10:35:13');
INSERT INTO `ap_log_action` VALUES (300, 'property', 'Insert property: 0', 1, '2019-04-19 10:35:28');
INSERT INTO `ap_log_action` VALUES (301, 'property', 'Insert property: 0', 1, '2019-04-19 10:35:41');
INSERT INTO `ap_log_action` VALUES (302, 'property', 'Insert property: 0', 1, '2019-04-19 10:35:52');
INSERT INTO `ap_log_action` VALUES (303, 'property', 'Insert property: 0', 1, '2019-04-19 10:36:06');
INSERT INTO `ap_log_action` VALUES (304, 'property', 'Update property: 3', 1, '2019-04-19 10:37:37');
INSERT INTO `ap_log_action` VALUES (305, 'property', 'Insert property: 0', 1, '2019-04-19 10:38:14');
INSERT INTO `ap_log_action` VALUES (306, 'property', 'Insert property: 0', 1, '2019-04-19 10:38:42');
INSERT INTO `ap_log_action` VALUES (307, 'property', 'Update property: 5', 1, '2019-04-19 10:39:47');
INSERT INTO `ap_log_action` VALUES (308, 'property', 'Update property: 4', 1, '2019-04-19 10:39:47');
INSERT INTO `ap_log_action` VALUES (309, 'property', 'Update property: 3', 1, '2019-04-19 10:39:47');
INSERT INTO `ap_log_action` VALUES (310, 'property', 'Update property: 21', 1, '2019-04-19 10:39:59');
INSERT INTO `ap_log_action` VALUES (311, 'property', 'Update property: 20', 1, '2019-04-19 10:39:59');
INSERT INTO `ap_log_action` VALUES (312, 'property', 'Update property: 19', 1, '2019-04-19 10:39:59');
INSERT INTO `ap_log_action` VALUES (313, 'property', 'Update property: 18', 1, '2019-04-19 10:39:59');
INSERT INTO `ap_log_action` VALUES (314, 'property', 'Update property: 17', 1, '2019-04-19 10:39:59');
INSERT INTO `ap_log_action` VALUES (315, 'property', 'Update property: 16', 1, '2019-04-19 10:39:59');
INSERT INTO `ap_log_action` VALUES (316, 'property', 'Update property: 11', 1, '2019-04-19 10:39:59');
INSERT INTO `ap_log_action` VALUES (317, 'property', 'Update property: 10', 1, '2019-04-19 10:39:59');
INSERT INTO `ap_log_action` VALUES (318, 'property', 'Update property: 9', 1, '2019-04-19 10:39:59');
INSERT INTO `ap_log_action` VALUES (319, 'property', 'Update property: 8', 1, '2019-04-19 10:39:59');
INSERT INTO `ap_log_action` VALUES (320, 'property', 'Update property: 27', 1, '2019-04-19 10:40:32');
INSERT INTO `ap_log_action` VALUES (321, 'property', 'Update property: 26', 1, '2019-04-19 10:40:32');
INSERT INTO `ap_log_action` VALUES (322, 'property', 'Update property: 25', 1, '2019-04-19 10:40:32');
INSERT INTO `ap_log_action` VALUES (323, 'property', 'Update property: 24', 1, '2019-04-19 10:40:32');
INSERT INTO `ap_log_action` VALUES (324, 'property', 'Update property: 23', 1, '2019-04-19 10:40:32');
INSERT INTO `ap_log_action` VALUES (325, 'property', 'Update property: 22', 1, '2019-04-19 10:40:32');
INSERT INTO `ap_log_action` VALUES (326, 'property', 'Insert property: 0', 1, '2019-04-19 10:41:13');
INSERT INTO `ap_log_action` VALUES (327, 'property', 'Insert property: 0', 1, '2019-04-19 10:41:29');
INSERT INTO `ap_log_action` VALUES (328, 'property', 'Insert property: 0', 1, '2019-04-19 10:43:20');
INSERT INTO `ap_log_action` VALUES (329, 'property', 'Insert property: 0', 1, '2019-04-19 10:43:52');
INSERT INTO `ap_log_action` VALUES (330, 'property', 'Insert property: 0', 1, '2019-04-19 10:44:26');
INSERT INTO `ap_log_action` VALUES (331, 'property', 'Insert property: 0', 1, '2019-04-19 10:44:54');
INSERT INTO `ap_log_action` VALUES (332, 'property', 'Insert property: 0', 1, '2019-04-19 10:45:16');
INSERT INTO `ap_log_action` VALUES (333, 'property', 'Insert property: 0', 1, '2019-04-19 10:45:29');
INSERT INTO `ap_log_action` VALUES (334, 'property', 'Update property: 58', 1, '2019-04-19 10:45:35');
INSERT INTO `ap_log_action` VALUES (335, 'property', 'Insert property: 0', 1, '2019-04-19 10:46:08');
INSERT INTO `ap_log_action` VALUES (336, 'property', 'Insert property: 0', 1, '2019-04-19 10:46:30');
INSERT INTO `ap_log_action` VALUES (337, 'property', 'Insert property: 0', 1, '2019-04-19 10:46:45');
INSERT INTO `ap_log_action` VALUES (338, 'property', 'Insert property: 0', 1, '2019-04-19 10:47:16');
INSERT INTO `ap_log_action` VALUES (339, 'property', 'Insert property: 0', 1, '2019-04-19 10:47:41');
INSERT INTO `ap_log_action` VALUES (340, 'property', 'Insert property: 0', 1, '2019-04-19 10:48:46');
INSERT INTO `ap_log_action` VALUES (341, 'property', 'Insert property: 0', 1, '2019-04-19 10:49:20');
INSERT INTO `ap_log_action` VALUES (342, 'property', 'Insert property: 0', 1, '2019-04-19 10:49:56');
INSERT INTO `ap_log_action` VALUES (343, 'property', 'Insert property: 0', 1, '2019-04-19 10:50:19');
INSERT INTO `ap_log_action` VALUES (344, 'category', 'Update category: 5', 1, '2019-04-19 10:52:21');
INSERT INTO `ap_log_action` VALUES (345, 'category', 'Update category: 16', 1, '2019-04-19 10:53:21');
INSERT INTO `ap_log_action` VALUES (346, 'category', 'Update category: 16', 1, '2019-04-19 10:53:37');
INSERT INTO `ap_log_action` VALUES (347, 'category', 'Update category: 7', 1, '2019-04-19 10:53:56');
INSERT INTO `ap_log_action` VALUES (348, 'category', 'Update category: 6', 1, '2019-04-19 10:53:56');
INSERT INTO `ap_log_action` VALUES (349, 'category', 'Update category: 4', 1, '2019-04-19 10:53:56');
INSERT INTO `ap_log_action` VALUES (350, 'category', 'Update category: 2', 1, '2019-04-19 10:53:56');
INSERT INTO `ap_log_action` VALUES (351, 'category', 'Insert category: 30', 1, '2019-04-19 10:57:52');
INSERT INTO `ap_log_action` VALUES (352, 'category', 'Update category: 3', 1, '2019-04-19 10:58:34');
INSERT INTO `ap_log_action` VALUES (353, 'category', 'Update category: 5', 1, '2019-04-19 10:58:40');
INSERT INTO `ap_log_action` VALUES (354, 'category', 'Update category: 16', 1, '2019-04-19 10:58:47');
INSERT INTO `ap_log_action` VALUES (355, 'category', 'Update category: 30', 1, '2019-04-19 10:58:52');
INSERT INTO `ap_log_action` VALUES (356, 'post', 'Thêm Banner có id là 19', 1, '2019-04-19 11:01:16');
INSERT INTO `ap_log_action` VALUES (357, 'post', 'Thêm Banner có id là 20', 1, '2019-04-19 11:01:23');
INSERT INTO `ap_log_action` VALUES (358, 'post', 'Thêm Banner có id là 21', 1, '2019-04-19 11:01:30');
INSERT INTO `ap_log_action` VALUES (359, 'post', 'Thêm Banner có id là 22', 1, '2019-04-19 11:01:38');
INSERT INTO `ap_log_action` VALUES (360, 'post', 'Thêm Banner có id là 23', 1, '2019-04-19 11:01:48');
INSERT INTO `ap_log_action` VALUES (361, 'post', 'Thêm Banner có id là 24', 1, '2019-04-19 11:01:57');
INSERT INTO `ap_log_action` VALUES (362, 'currency', 'Insert currency: 113', 1, '2019-04-19 11:27:03');
INSERT INTO `ap_log_action` VALUES (363, 'currency', 'Insert currency: 114', 1, '2019-04-19 11:31:05');
INSERT INTO `ap_log_action` VALUES (364, 'currency', 'Update currency: 113', 1, '2019-04-19 11:31:46');
INSERT INTO `ap_log_action` VALUES (365, 'currency', 'Update currency: 113', 1, '2019-04-19 11:33:32');
INSERT INTO `ap_log_action` VALUES (366, 'currency', 'Update currency: 113', 1, '2019-04-19 11:34:22');
INSERT INTO `ap_log_action` VALUES (367, 'search', 'Update search: 9', 1, '2019-04-19 11:40:18');
INSERT INTO `ap_log_action` VALUES (368, 'search', 'Update search: 9', 1, '2019-04-19 11:52:26');
INSERT INTO `ap_log_action` VALUES (369, 'search', 'Update search: 9', 1, '2019-04-19 11:54:08');
INSERT INTO `ap_log_action` VALUES (370, 'search', 'Update search: 10', 1, '2019-04-19 11:54:08');
INSERT INTO `ap_log_action` VALUES (371, 'search', 'Update search: 11', 1, '2019-04-19 11:54:34');
INSERT INTO `ap_log_action` VALUES (372, 'search', 'Update search: 12', 1, '2019-04-19 11:54:38');
INSERT INTO `ap_log_action` VALUES (373, 'search', 'Update search: 13', 1, '2019-04-19 11:54:42');
INSERT INTO `ap_log_action` VALUES (374, 'search', 'Update search: 14', 1, '2019-04-19 11:54:42');
INSERT INTO `ap_log_action` VALUES (375, 'search', 'Update search: 15', 1, '2019-04-19 11:54:42');
INSERT INTO `ap_log_action` VALUES (376, 'search', 'Update search: 16', 1, '2019-04-19 11:54:42');
INSERT INTO `ap_log_action` VALUES (377, 'search', 'Update search: 17', 1, '2019-04-19 11:54:42');
INSERT INTO `ap_log_action` VALUES (378, 'search', 'Update search: 18', 1, '2019-04-19 11:54:42');
INSERT INTO `ap_log_action` VALUES (379, 'search', 'Update search: 19', 1, '2019-04-19 11:54:42');
INSERT INTO `ap_log_action` VALUES (380, 'property', 'Insert property: 0', 1, '2019-04-19 02:04:44');
INSERT INTO `ap_log_action` VALUES (381, 'property', 'Update property: 68', 1, '2019-04-19 02:04:55');
INSERT INTO `ap_log_action` VALUES (382, 'property', 'Update property: 7', 1, '2019-04-19 02:05:14');
INSERT INTO `ap_log_action` VALUES (383, 'property', 'Update property: 7', 1, '2019-04-19 02:05:33');
INSERT INTO `ap_log_action` VALUES (384, 'property', 'Update property: 7', 1, '2019-04-19 02:05:58');
INSERT INTO `ap_log_action` VALUES (385, 'property', 'Update property: 68', 1, '2019-04-19 02:09:24');
INSERT INTO `ap_log_action` VALUES (386, 'room', 'Update room: 2', 1, '2019-04-19 02:10:23');
INSERT INTO `ap_log_action` VALUES (387, 'room', 'Insert room: 17', 1, '2019-04-19 02:35:18');
INSERT INTO `ap_log_action` VALUES (388, 'room', 'Insert room: 18', 1, '2019-04-19 02:35:46');
INSERT INTO `ap_log_action` VALUES (389, 'room', 'Insert room: 19', 1, '2019-04-19 02:44:07');
INSERT INTO `ap_log_action` VALUES (390, 'room', 'Update room: 19', 1, '2019-04-19 02:44:31');
INSERT INTO `ap_log_action` VALUES (391, 'room', 'Update room: 19', 1, '2019-04-19 02:44:47');
INSERT INTO `ap_log_action` VALUES (392, 'room', 'Update room: 19', 1, '2019-04-19 02:46:42');
INSERT INTO `ap_log_action` VALUES (393, 'room', 'Update room: 18', 1, '2019-04-19 02:46:42');
INSERT INTO `ap_log_action` VALUES (394, 'room', 'Update room: 17', 1, '2019-04-19 02:46:45');
INSERT INTO `ap_log_action` VALUES (395, 'room', 'Insert room: 20', 1, '2019-04-19 02:47:25');
INSERT INTO `ap_log_action` VALUES (396, 'room', 'Update room: 2', 1, '2019-04-21 11:50:56');
INSERT INTO `ap_log_action` VALUES (397, 'room', 'Update room: 1', 1, '2019-04-21 11:52:18');
INSERT INTO `ap_log_action` VALUES (398, 'room', 'Update room: 1', 1, '2019-04-21 11:52:23');
INSERT INTO `ap_log_action` VALUES (399, 'room', 'Update room: 22', 46, '2019-04-22 09:58:38');
INSERT INTO `ap_log_action` VALUES (400, 'room', 'Update room: 22', 46, '2019-04-22 10:11:04');
INSERT INTO `ap_log_action` VALUES (401, 'room', 'Update room: 22', 46, '2019-04-22 10:11:22');
INSERT INTO `ap_log_action` VALUES (402, 'room', 'Update room: 22', 46, '2019-04-22 10:17:05');
INSERT INTO `ap_log_action` VALUES (403, 'room', 'Update room: 22', 46, '2019-04-22 10:17:33');
INSERT INTO `ap_log_action` VALUES (404, 'room', 'Insert room: 23', 46, '2019-04-22 10:22:54');
INSERT INTO `ap_log_action` VALUES (405, 'room', 'Update room: 23', 46, '2019-04-22 10:24:13');
INSERT INTO `ap_log_action` VALUES (406, 'room', 'Insert room: 24', 46, '2019-04-22 10:25:05');
INSERT INTO `ap_log_action` VALUES (407, 'room', 'Update room: 24', 46, '2019-04-22 10:26:05');
INSERT INTO `ap_log_action` VALUES (408, 'room', 'Update room: 24', 46, '2019-04-22 10:27:08');
INSERT INTO `ap_log_action` VALUES (409, 'room', 'Update room: 23', 46, '2019-04-22 10:27:28');
INSERT INTO `ap_log_action` VALUES (410, 'room', 'Insert room: 25', 46, '2019-04-22 10:29:24');
INSERT INTO `ap_log_action` VALUES (411, 'account', 'delete account: 46', 46, '2019-04-22 11:35:33');
INSERT INTO `ap_log_action` VALUES (412, 'users', 'Insert users: 0', 1, '2019-04-22 04:02:32');
INSERT INTO `ap_log_action` VALUES (413, 'users', 'delete users: 38', 1, '2019-04-22 04:02:46');
INSERT INTO `ap_log_action` VALUES (414, 'users', 'Update users: 46', 1, '2019-04-22 04:02:57');
INSERT INTO `ap_log_action` VALUES (415, 'search', 'Insert search: 23', 1, '2019-04-23 08:53:20');
INSERT INTO `ap_log_action` VALUES (416, 'users', 'Update users: 47', 1, '2019-04-23 08:54:21');
INSERT INTO `ap_log_action` VALUES (417, 'users', 'Insert users: 0', 1, '2019-04-23 08:59:56');
INSERT INTO `ap_log_action` VALUES (418, 'account', 'Insert account: 65', 1, '2019-04-23 09:03:24');
INSERT INTO `ap_log_action` VALUES (419, 'account', 'Update account: 65', 1, '2019-04-23 09:03:40');
INSERT INTO `ap_log_action` VALUES (420, 'users', 'Update users: 46', 1, '2019-04-23 09:30:28');
INSERT INTO `ap_log_action` VALUES (421, 'users', 'Insert users: 0', 46, '2019-04-23 09:34:16');
INSERT INTO `ap_log_action` VALUES (422, 'users', 'Insert users: 0', 46, '2019-04-23 09:35:44');
INSERT INTO `ap_log_action` VALUES (423, 'property', 'Insert property: 0', 46, '2019-04-23 10:27:05');
INSERT INTO `ap_log_action` VALUES (424, 'property', 'Insert property: 0', 46, '2019-04-23 10:28:21');
INSERT INTO `ap_log_action` VALUES (425, 'property', 'Insert property: 0', 46, '2019-04-23 10:29:05');
INSERT INTO `ap_log_action` VALUES (426, 'account', 'delete account: 65', 46, '2019-04-23 11:20:18');
INSERT INTO `ap_log_action` VALUES (427, 'account', 'delete account: 64', 46, '2019-04-23 11:20:18');
INSERT INTO `ap_log_action` VALUES (428, 'account', 'delete account: 63', 46, '2019-04-23 11:20:18');
INSERT INTO `ap_log_action` VALUES (429, 'account', 'delete account: 62', 46, '2019-04-23 11:20:18');
INSERT INTO `ap_log_action` VALUES (430, 'account', 'delete account: 61', 46, '2019-04-23 11:20:18');
INSERT INTO `ap_log_action` VALUES (431, 'account', 'delete account: 60', 46, '2019-04-23 11:20:18');
INSERT INTO `ap_log_action` VALUES (432, 'room', 'Update room: 28', 1, '2019-04-23 11:46:34');
INSERT INTO `ap_log_action` VALUES (433, 'account', 'Insert account: 66', 1, '2019-04-23 02:18:50');
INSERT INTO `ap_log_action` VALUES (434, 'account', 'delete account: 66', 1, '2019-04-23 02:20:12');
INSERT INTO `ap_log_action` VALUES (435, 'account', 'Insert account: 68', 1, '2019-04-23 02:27:55');
INSERT INTO `ap_log_action` VALUES (436, 'property', 'Update property: 67', 1, '2019-04-23 03:12:29');
INSERT INTO `ap_log_action` VALUES (437, 'property', 'Update property: 67', 1, '2019-04-23 03:26:02');
INSERT INTO `ap_log_action` VALUES (438, 'property', 'Update property: 57', 1, '2019-04-23 03:26:28');
INSERT INTO `ap_log_action` VALUES (439, 'property', 'Update property: 51', 1, '2019-04-23 03:26:42');
INSERT INTO `ap_log_action` VALUES (440, 'property', 'Update property: 53', 1, '2019-04-23 03:26:57');
INSERT INTO `ap_log_action` VALUES (441, 'property', 'Update property: 60', 1, '2019-04-23 03:28:32');
INSERT INTO `ap_log_action` VALUES (442, 'room', 'Update room: 20', 1, '2019-04-23 03:33:52');
INSERT INTO `ap_log_action` VALUES (443, 'room', 'Update room: 2', 1, '2019-04-23 03:33:57');
INSERT INTO `ap_log_action` VALUES (444, 'room', 'Update room: 2', 1, '2019-04-23 03:35:53');
INSERT INTO `ap_log_action` VALUES (445, 'account', 'Update account: 67', 1, '2019-04-23 04:24:36');
INSERT INTO `ap_log_action` VALUES (446, 'account', 'Update account: 68', 1, '2019-04-23 04:43:46');
INSERT INTO `ap_log_action` VALUES (447, 'room', 'Insert room: 29', 1, '2019-04-24 09:55:56');
INSERT INTO `ap_log_action` VALUES (448, 'room', 'Update room: 29', 1, '2019-04-24 09:56:43');
INSERT INTO `ap_log_action` VALUES (449, 'users', 'Insert users: 0', 1, '2019-04-24 10:31:48');
INSERT INTO `ap_log_action` VALUES (450, 'account', 'Update account: 70', 1, '2019-04-24 10:56:57');
INSERT INTO `ap_log_action` VALUES (451, 'account', 'delete account: 70', 1, '2019-04-24 10:59:44');
INSERT INTO `ap_log_action` VALUES (452, 'account', 'delete account: 72', 1, '2019-04-24 11:26:45');
INSERT INTO `ap_log_action` VALUES (453, 'account', 'Update account: 73', 1, '2019-04-24 11:33:44');
INSERT INTO `ap_log_action` VALUES (454, 'account', 'Update account: 73', 1, '2019-04-24 11:34:46');
INSERT INTO `ap_log_action` VALUES (455, 'account', 'Update account: 73', 1, '2019-04-24 11:34:59');
INSERT INTO `ap_log_action` VALUES (456, 'account', 'Update account: 73', 1, '2019-04-24 11:35:34');
INSERT INTO `ap_log_action` VALUES (457, 'account', 'delete account: 73', 1, '2019-04-24 11:37:47');
INSERT INTO `ap_log_action` VALUES (458, 'account', 'Insert account: 74', 1, '2019-04-24 11:39:04');
INSERT INTO `ap_log_action` VALUES (459, 'unit', 'Update unit: 1', 1, '2019-04-24 02:25:22');
INSERT INTO `ap_log_action` VALUES (460, 'unit', 'Insert unit: 2', 1, '2019-04-24 02:26:37');
INSERT INTO `ap_log_action` VALUES (461, 'account', 'delete account: 71', 1, '2019-04-24 02:34:17');
INSERT INTO `ap_log_action` VALUES (462, 'account', 'delete account: 69', 1, '2019-04-24 02:34:20');
INSERT INTO `ap_log_action` VALUES (463, 'account', 'Insert account: 75', 1, '2019-04-24 02:35:19');
INSERT INTO `ap_log_action` VALUES (464, 'account', 'delete account: 75', 1, '2019-04-24 02:36:32');
INSERT INTO `ap_log_action` VALUES (465, 'account', 'Insert account: 76', 1, '2019-04-24 02:38:36');
INSERT INTO `ap_log_action` VALUES (466, 'account', 'Update account: 77', 1, '2019-04-24 09:55:28');
INSERT INTO `ap_log_action` VALUES (467, 'account', 'Update account: 77', 1, '2019-04-24 09:55:32');
INSERT INTO `ap_log_action` VALUES (468, 'room', 'Insert room: 30', 1, '2019-04-25 10:17:05');
INSERT INTO `ap_log_action` VALUES (469, 'room', 'Update room: 30', 1, '2019-04-25 10:17:27');
INSERT INTO `ap_log_action` VALUES (470, 'property', 'Update property: 71', 1, '2019-04-25 10:57:04');
INSERT INTO `ap_log_action` VALUES (471, 'property', 'Update property: 70', 1, '2019-04-25 10:57:06');
INSERT INTO `ap_log_action` VALUES (472, 'property', 'Update property: 69', 1, '2019-04-25 10:57:09');
INSERT INTO `ap_log_action` VALUES (473, 'property', 'Update property: 36', 1, '2019-04-25 10:57:11');
INSERT INTO `ap_log_action` VALUES (474, 'property', 'Update property: 35', 1, '2019-04-25 10:57:14');
INSERT INTO `ap_log_action` VALUES (475, 'property', 'Update property: 34', 1, '2019-04-25 10:57:16');
INSERT INTO `ap_log_action` VALUES (476, 'property', 'Update property: 33', 1, '2019-04-25 10:57:18');
INSERT INTO `ap_log_action` VALUES (477, 'room', 'Update room: 30', 1, '2019-04-25 02:06:13');
INSERT INTO `ap_log_action` VALUES (478, 'room', 'Update room: 30', 1, '2019-04-25 02:25:30');
INSERT INTO `ap_log_action` VALUES (479, 'room', 'Update room: 30', 1, '2019-04-25 02:26:34');
INSERT INTO `ap_log_action` VALUES (480, 'room', 'Update room: 30', 1, '2019-04-25 02:29:53');
INSERT INTO `ap_log_action` VALUES (481, 'room', 'Update room: 30', 1, '2019-04-25 02:30:56');
INSERT INTO `ap_log_action` VALUES (482, 'property', 'Update property: 67', 1, '2019-04-25 02:44:01');
INSERT INTO `ap_log_action` VALUES (483, 'property', 'Update property: 57', 1, '2019-04-25 02:44:46');
INSERT INTO `ap_log_action` VALUES (484, 'property', 'Update property: 51', 1, '2019-04-25 02:45:12');
INSERT INTO `ap_log_action` VALUES (485, 'property', 'Update property: 53', 1, '2019-04-25 02:45:33');
INSERT INTO `ap_log_action` VALUES (486, 'property', 'Update property: 60', 1, '2019-04-25 02:45:52');
INSERT INTO `ap_log_action` VALUES (487, 'account', 'Update account: 68', 1, '2019-04-25 02:48:33');
INSERT INTO `ap_log_action` VALUES (488, 'account', 'Update account: 81', 1, '2019-04-25 02:51:41');
INSERT INTO `ap_log_action` VALUES (489, 'account', 'delete account: 81', 1, '2019-04-25 02:56:37');
INSERT INTO `ap_log_action` VALUES (490, 'account', 'Insert account: 82', 1, '2019-04-25 02:59:15');
INSERT INTO `ap_log_action` VALUES (491, 'account', 'Insert account: 83', 1, '2019-04-25 03:02:04');
INSERT INTO `ap_log_action` VALUES (492, 'account', 'Update account: 68', 1, '2019-04-25 04:35:29');
INSERT INTO `ap_log_action` VALUES (493, 'room', 'Update room: 30', 1, '2019-04-25 10:18:25');
INSERT INTO `ap_log_action` VALUES (494, 'account', 'Insert account: 84', 1, '2019-04-26 09:40:20');
INSERT INTO `ap_log_action` VALUES (495, 'account', 'delete account: 84', 1, '2019-04-26 09:40:46');
INSERT INTO `ap_log_action` VALUES (496, 'account', 'Insert account: 85', 1, '2019-04-26 09:42:38');
INSERT INTO `ap_log_action` VALUES (497, 'room', 'Update room: 30', 1, '2019-04-26 11:05:52');
INSERT INTO `ap_log_action` VALUES (498, 'room', 'Update room: 1', 1, '2019-04-26 11:06:08');
INSERT INTO `ap_log_action` VALUES (499, 'room', 'Update room: 2', 1, '2019-04-26 11:06:10');
INSERT INTO `ap_log_action` VALUES (500, 'room', 'Update room: 20', 1, '2019-04-26 11:06:13');
INSERT INTO `ap_log_action` VALUES (501, 'room', 'Update room: 22', 1, '2019-04-26 11:06:19');
INSERT INTO `ap_log_action` VALUES (502, 'room', 'Update room: 23', 1, '2019-04-26 11:06:22');
INSERT INTO `ap_log_action` VALUES (503, 'room', 'Update room: 24', 1, '2019-04-26 11:06:24');
INSERT INTO `ap_log_action` VALUES (504, 'room', 'Update room: 28', 1, '2019-04-26 11:06:35');
INSERT INTO `ap_log_action` VALUES (505, 'page', 'Update page: 12', 1, '2019-04-26 11:07:27');
INSERT INTO `ap_log_action` VALUES (506, 'page', 'Update page: 2', 1, '2019-04-26 11:07:30');
INSERT INTO `ap_log_action` VALUES (507, 'page', 'Update page: 7', 1, '2019-04-26 11:07:37');
INSERT INTO `ap_log_action` VALUES (508, 'page', 'Update page: 8', 1, '2019-04-26 11:07:40');
INSERT INTO `ap_log_action` VALUES (509, 'page', 'Update page: 9', 1, '2019-04-26 11:07:43');
INSERT INTO `ap_log_action` VALUES (510, 'page', 'Update page: 10', 1, '2019-04-26 11:07:46');
INSERT INTO `ap_log_action` VALUES (511, 'page', 'Update page: 11', 1, '2019-04-26 11:07:49');
INSERT INTO `ap_log_action` VALUES (512, 'page', 'Update page: 12', 1, '2019-04-26 11:07:54');
INSERT INTO `ap_log_action` VALUES (513, 'room', 'Update room: 31', 1, '2019-04-26 02:08:08');
INSERT INTO `ap_log_action` VALUES (514, 'room', 'Update room: 31', 1, '2019-04-26 02:08:33');
INSERT INTO `ap_log_action` VALUES (515, 'account', 'delete account: 85', 1, '2019-04-26 02:13:36');
INSERT INTO `ap_log_action` VALUES (516, 'account', 'Insert account: 88', 1, '2019-04-26 02:14:55');
INSERT INTO `ap_log_action` VALUES (517, 'users', 'Insert users: 0', 1, '2019-04-26 02:26:51');
INSERT INTO `ap_log_action` VALUES (518, 'account', 'delete account: 82', 1, '2019-04-26 09:46:07');
INSERT INTO `ap_log_action` VALUES (519, 'room', 'Update room: 30', 1, '2019-04-26 10:04:07');
INSERT INTO `ap_log_action` VALUES (520, 'room', 'Update room: 30', 1, '2019-04-26 10:06:08');
INSERT INTO `ap_log_action` VALUES (521, 'room', 'Update room: 32', 1, '2019-04-26 10:06:37');
INSERT INTO `ap_log_action` VALUES (522, 'room', 'Update room: 31', 1, '2019-04-26 10:06:39');
INSERT INTO `ap_log_action` VALUES (523, 'room', 'Insert room: 33', 1, '2019-04-26 10:24:53');
INSERT INTO `ap_log_action` VALUES (524, 'room', 'Insert room: 34', 1, '2019-04-26 11:45:43');
INSERT INTO `ap_log_action` VALUES (525, 'room', 'Update room: 34', 1, '2019-04-26 11:46:01');
INSERT INTO `ap_log_action` VALUES (526, 'message_system', 'Sửa message_system có id là 11', 1, '2019-04-27 10:25:59');
INSERT INTO `ap_log_action` VALUES (527, 'search', 'Update search: 20', 1, '2019-04-28 01:21:22');
INSERT INTO `ap_log_action` VALUES (528, 'search', 'Update search: 21', 1, '2019-04-28 01:21:25');
INSERT INTO `ap_log_action` VALUES (529, 'search', 'Update search: 23', 1, '2019-04-28 01:21:28');
INSERT INTO `ap_log_action` VALUES (530, 'search', 'Update search: 22', 1, '2019-04-28 01:21:31');
INSERT INTO `ap_log_action` VALUES (531, 'room', 'Update room: 38', 1, '2019-04-30 11:54:58');
INSERT INTO `ap_log_action` VALUES (532, 'room', 'Update room: 38', 1, '2019-04-30 11:56:52');
INSERT INTO `ap_log_action` VALUES (533, 'room', 'Update room: 38', 1, '2019-05-01 12:00:36');
INSERT INTO `ap_log_action` VALUES (534, 'room', 'Update room: 38', 1, '2019-05-01 12:00:49');
INSERT INTO `ap_log_action` VALUES (535, 'account', 'delete account: 105', 1, '2019-05-02 09:50:35');
INSERT INTO `ap_log_action` VALUES (536, 'account', 'Insert account: 106', 1, '2019-05-02 10:00:10');
INSERT INTO `ap_log_action` VALUES (537, 'account', 'delete account: 19', 1, '2019-05-02 11:04:39');
INSERT INTO `ap_log_action` VALUES (538, 'account', 'delete account: 20', 1, '2019-05-02 11:05:53');
INSERT INTO `ap_log_action` VALUES (539, 'account', 'delete account: 109', 1, '2019-05-02 11:58:13');
INSERT INTO `ap_log_action` VALUES (540, 'room', 'Update room: 33', 1, '2019-05-02 01:40:53');
INSERT INTO `ap_log_action` VALUES (541, 'room', 'Update room: 33', 1, '2019-05-02 01:43:22');
INSERT INTO `ap_log_action` VALUES (542, 'room', 'Update room: 33', 1, '2019-05-02 02:17:14');
INSERT INTO `ap_log_action` VALUES (543, 'room', 'Update room: 30', 1, '2019-05-02 02:18:09');
INSERT INTO `ap_log_action` VALUES (544, 'room', 'Update room: 30', 1, '2019-05-02 02:18:22');
INSERT INTO `ap_log_action` VALUES (545, 'room', 'Update room: 1', 1, '2019-05-02 02:19:28');
INSERT INTO `ap_log_action` VALUES (546, 'room', 'Update room: 2', 1, '2019-05-02 02:20:03');
INSERT INTO `ap_log_action` VALUES (547, 'room', 'Update room: 28', 1, '2019-05-02 02:21:04');
INSERT INTO `ap_log_action` VALUES (548, 'room', 'Update room: 33', 1, '2019-05-02 02:22:02');
INSERT INTO `ap_log_action` VALUES (549, 'room', 'Update room: 20', 1, '2019-05-02 02:22:34');
INSERT INTO `ap_log_action` VALUES (550, 'room', 'Update room: 1', 1, '2019-05-02 02:24:31');
INSERT INTO `ap_log_action` VALUES (551, 'room', 'Update room: 1', 1, '2019-05-02 02:30:55');
INSERT INTO `ap_log_action` VALUES (552, 'room', 'Update room: 2', 1, '2019-05-02 02:33:35');
INSERT INTO `ap_log_action` VALUES (553, 'room', 'Update room: 33', 1, '2019-05-02 02:39:56');
INSERT INTO `ap_log_action` VALUES (554, 'room', 'Update room: 20', 1, '2019-05-02 02:42:45');
INSERT INTO `ap_log_action` VALUES (555, 'room', 'Update room: 23', 1, '2019-05-02 02:45:19');
INSERT INTO `ap_log_action` VALUES (556, 'room', 'Update room: 24', 1, '2019-05-02 02:46:55');
INSERT INTO `ap_log_action` VALUES (557, 'room', 'Update room: 25', 1, '2019-05-02 02:47:57');
INSERT INTO `ap_log_action` VALUES (558, 'room', 'Update room: 29', 1, '2019-05-02 02:55:57');
INSERT INTO `ap_log_action` VALUES (559, 'room', 'Update room: 30', 1, '2019-05-02 03:02:20');
INSERT INTO `ap_log_action` VALUES (560, 'room', 'Update room: 29', 1, '2019-05-02 03:02:34');
INSERT INTO `ap_log_action` VALUES (561, 'room', 'Update room: 30', 1, '2019-05-02 03:20:11');
INSERT INTO `ap_log_action` VALUES (562, 'room', 'Update room: 34', 1, '2019-05-02 03:22:47');
INSERT INTO `ap_log_action` VALUES (563, 'room', 'Update room: 34', 1, '2019-05-02 05:15:04');
INSERT INTO `ap_log_action` VALUES (564, 'room', 'Update room: 34', 1, '2019-05-02 05:27:56');
INSERT INTO `ap_log_action` VALUES (565, 'room', 'Update room: 2', 1, '2019-05-02 05:43:49');
INSERT INTO `ap_log_action` VALUES (566, 'system_menu', 'Update system_menu: 1', 1, '2019-05-03 09:32:19');
INSERT INTO `ap_log_action` VALUES (567, 'system_menu', 'Update system_menu: 1', 1, '2019-05-03 09:32:36');
INSERT INTO `ap_log_action` VALUES (568, 'page', 'Update page: 10', 1, '2019-05-03 10:49:51');
INSERT INTO `ap_log_action` VALUES (569, 'room', 'Update room: 37', 1, '2019-05-03 02:11:36');
INSERT INTO `ap_log_action` VALUES (570, 'room', 'Update room: 36', 1, '2019-05-03 02:11:40');
INSERT INTO `ap_log_action` VALUES (571, 'room', 'Update room: 21', 1, '2019-05-03 02:12:17');
INSERT INTO `ap_log_action` VALUES (572, 'room', 'Update room: 28', 1, '2019-05-03 02:13:41');
INSERT INTO `ap_log_action` VALUES (573, 'room', 'Update room: 20', 1, '2019-05-03 02:18:02');
INSERT INTO `ap_log_action` VALUES (574, 'room', 'Update room: 39', 1, '2019-05-03 02:19:00');
INSERT INTO `ap_log_action` VALUES (575, 'room', 'Update room: 24', 1, '2019-05-03 02:22:50');
INSERT INTO `ap_log_action` VALUES (576, 'room', 'Update room: 24', 1, '2019-05-03 02:23:26');
INSERT INTO `ap_log_action` VALUES (577, 'room', 'Update room: 24', 1, '2019-05-03 02:23:59');
INSERT INTO `ap_log_action` VALUES (578, 'room', 'Update room: 24', 1, '2019-05-03 02:24:46');
INSERT INTO `ap_log_action` VALUES (579, 'room', 'Update room: 24', 1, '2019-05-03 02:28:31');
INSERT INTO `ap_log_action` VALUES (580, 'room', 'Update room: 34', 1, '2019-05-03 03:05:28');
INSERT INTO `ap_log_action` VALUES (581, 'room', 'Update room: 30', 1, '2019-05-03 03:06:34');
INSERT INTO `ap_log_action` VALUES (582, 'room', 'Update room: 30', 1, '2019-05-03 03:06:59');
INSERT INTO `ap_log_action` VALUES (583, 'room', 'Update room: 29', 1, '2019-05-03 03:07:14');
INSERT INTO `ap_log_action` VALUES (584, 'room', 'Update room: 25', 1, '2019-05-03 03:08:16');
INSERT INTO `ap_log_action` VALUES (585, 'room', 'Update room: 24', 1, '2019-05-03 03:08:42');
INSERT INTO `ap_log_action` VALUES (586, 'room', 'Update room: 23', 1, '2019-05-03 03:08:54');
INSERT INTO `ap_log_action` VALUES (587, 'room', 'Update room: 20', 1, '2019-05-03 03:09:13');
INSERT INTO `ap_log_action` VALUES (588, 'room', 'Update room: 2', 1, '2019-05-03 03:09:22');
INSERT INTO `ap_log_action` VALUES (589, 'room', 'Update room: 1', 1, '2019-05-03 03:09:34');
INSERT INTO `ap_log_action` VALUES (590, 'room', 'Update room: 34', 1, '2019-05-03 04:08:42');
INSERT INTO `ap_log_action` VALUES (591, 'room', 'Update room: 33', 1, '2019-05-03 04:09:14');
INSERT INTO `ap_log_action` VALUES (592, 'room', 'Update room: 30', 1, '2019-05-03 04:09:49');
INSERT INTO `ap_log_action` VALUES (593, 'room', 'Update room: 29', 1, '2019-05-03 04:10:30');
INSERT INTO `ap_log_action` VALUES (594, 'room', 'Update room: 28', 1, '2019-05-03 04:10:46');
INSERT INTO `ap_log_action` VALUES (595, 'room', 'Update room: 25', 1, '2019-05-03 04:11:10');
INSERT INTO `ap_log_action` VALUES (596, 'room', 'Update room: 24', 1, '2019-05-03 04:11:30');
INSERT INTO `ap_log_action` VALUES (597, 'room', 'Update room: 20', 1, '2019-05-03 04:11:54');
INSERT INTO `ap_log_action` VALUES (598, 'room', 'Update room: 2', 1, '2019-05-03 04:12:23');
INSERT INTO `ap_log_action` VALUES (599, 'room', 'Update room: 1', 1, '2019-05-03 04:12:50');
INSERT INTO `ap_log_action` VALUES (600, 'property', 'Insert property: 0', 1, '2019-05-03 04:23:53');
INSERT INTO `ap_log_action` VALUES (601, 'property', 'Insert property: 0', 1, '2019-05-03 04:30:10');
INSERT INTO `ap_log_action` VALUES (602, 'property', 'Insert property: 0', 1, '2019-05-03 04:30:53');
INSERT INTO `ap_log_action` VALUES (603, 'property', 'Insert property: 0', 1, '2019-05-03 04:35:34');
INSERT INTO `ap_log_action` VALUES (604, 'property', 'Update property: 75', 1, '2019-05-03 04:35:47');
INSERT INTO `ap_log_action` VALUES (605, 'property', 'Insert property: 0', 1, '2019-05-03 04:37:30');
INSERT INTO `ap_log_action` VALUES (606, 'property', 'Insert property: 0', 1, '2019-05-03 04:38:20');
INSERT INTO `ap_log_action` VALUES (607, 'property', 'Insert property: 0', 1, '2019-05-03 04:40:21');
INSERT INTO `ap_log_action` VALUES (608, 'room', 'Update room: 34', 1, '2019-05-03 04:43:07');
INSERT INTO `ap_log_action` VALUES (609, 'room', 'Update room: 33', 1, '2019-05-03 04:48:22');
INSERT INTO `ap_log_action` VALUES (610, 'property', 'Update property: 78', 1, '2019-05-03 04:48:36');
INSERT INTO `ap_log_action` VALUES (611, 'room', 'Update room: 30', 1, '2019-05-03 04:49:46');
INSERT INTO `ap_log_action` VALUES (612, 'room', 'Update room: 29', 1, '2019-05-03 04:50:42');
INSERT INTO `ap_log_action` VALUES (613, 'room', 'Update room: 28', 1, '2019-05-03 04:51:50');
INSERT INTO `ap_log_action` VALUES (614, 'room', 'Update room: 25', 1, '2019-05-03 04:52:49');
INSERT INTO `ap_log_action` VALUES (615, 'room', 'Update room: 24', 1, '2019-05-03 04:53:53');
INSERT INTO `ap_log_action` VALUES (616, 'room', 'Update room: 23', 1, '2019-05-03 04:55:24');
INSERT INTO `ap_log_action` VALUES (617, 'room', 'Update room: 20', 1, '2019-05-03 04:56:14');
INSERT INTO `ap_log_action` VALUES (618, 'room', 'Update room: 2', 1, '2019-05-03 04:57:26');
INSERT INTO `ap_log_action` VALUES (619, 'room', 'Update room: 1', 1, '2019-05-03 04:58:18');
INSERT INTO `ap_log_action` VALUES (620, 'property', 'Update property: 51', 1, '2019-05-03 05:01:22');
INSERT INTO `ap_log_action` VALUES (621, 'property', 'Update property: 60', 1, '2019-05-03 05:02:40');
INSERT INTO `ap_log_action` VALUES (622, 'property', 'Update property: 57', 1, '2019-05-03 05:02:51');
INSERT INTO `ap_log_action` VALUES (623, 'property', 'Update property: 53', 1, '2019-05-03 05:03:09');
INSERT INTO `ap_log_action` VALUES (624, 'room', 'Update room: 27', 1, '2019-05-03 05:07:28');
INSERT INTO `ap_log_action` VALUES (625, 'room', 'Update room: 35', 1, '2019-05-03 05:39:48');
INSERT INTO `ap_log_action` VALUES (626, 'room', 'Update room: 38', 1, '2019-05-03 05:43:30');
INSERT INTO `ap_log_action` VALUES (627, 'account', 'delete account: 110', 1, '2019-05-03 05:50:02');
INSERT INTO `ap_log_action` VALUES (628, 'account', 'Insert account: 115', 1, '2019-05-03 05:50:50');
INSERT INTO `ap_log_action` VALUES (629, 'account', 'delete account: 115', 1, '2019-05-03 05:54:29');
INSERT INTO `ap_log_action` VALUES (630, 'account', 'Update account: 116', 1, '2019-05-03 05:57:58');
INSERT INTO `ap_log_action` VALUES (631, 'users', 'Insert users: 0', 1, '2019-05-03 05:59:42');
INSERT INTO `ap_log_action` VALUES (632, 'users', 'delete users: 53', 1, '2019-05-03 05:59:54');
INSERT INTO `ap_log_action` VALUES (633, 'users', 'Insert users: 0', 1, '2019-05-03 06:00:40');
INSERT INTO `ap_log_action` VALUES (634, 'users', 'delete users: 54', 1, '2019-05-04 09:56:12');
INSERT INTO `ap_log_action` VALUES (635, 'users', 'Insert users: 0', 1, '2019-05-04 09:56:39');
INSERT INTO `ap_log_action` VALUES (636, 'users', 'Update users: ', 55, '2019-05-04 09:58:17');
INSERT INTO `ap_log_action` VALUES (637, 'account', 'delete account: 93', 1, '2019-05-04 03:49:50');
INSERT INTO `ap_log_action` VALUES (638, 'users', 'Update users: 55', 1, '2019-05-06 10:42:18');
INSERT INTO `ap_log_action` VALUES (639, 'users', 'Update users: 55', 1, '2019-05-06 10:43:22');
INSERT INTO `ap_log_action` VALUES (640, 'currency', 'Update currency: 114', 1, '2019-05-06 10:44:39');
INSERT INTO `ap_log_action` VALUES (641, 'currency', 'Update currency: 2', 1, '2019-05-06 10:46:14');
INSERT INTO `ap_log_action` VALUES (642, 'users', 'Insert users: 0', 1, '2019-05-06 10:57:47');
INSERT INTO `ap_log_action` VALUES (643, 'account', 'Update account: 68', 1, '2019-05-06 11:04:58');
INSERT INTO `ap_log_action` VALUES (644, 'account', 'Update account: 122', 1, '2019-05-06 01:50:11');
INSERT INTO `ap_log_action` VALUES (645, 'account', 'Insert account: 123', 1, '2019-05-06 01:57:40');
INSERT INTO `ap_log_action` VALUES (646, 'account', 'Update account: 123', 1, '2019-05-06 02:07:36');
INSERT INTO `ap_log_action` VALUES (647, 'account', 'Insert account: 124', 1, '2019-05-06 02:11:07');
INSERT INTO `ap_log_action` VALUES (648, 'category', 'Insert category: 31', 1, '2019-05-06 02:33:49');
INSERT INTO `ap_log_action` VALUES (649, 'account', 'Update account: 117', 1, '2019-05-06 02:37:08');
INSERT INTO `ap_log_action` VALUES (650, 'account', 'Update account: 117', 1, '2019-05-06 02:37:45');
INSERT INTO `ap_log_action` VALUES (651, 'account', 'Insert account: 125', 1, '2019-05-06 02:42:14');
INSERT INTO `ap_log_action` VALUES (652, 'search', 'Update search: 20', 1, '2019-05-06 02:43:22');
INSERT INTO `ap_log_action` VALUES (653, 'search', 'Update search: 21', 1, '2019-05-06 02:43:36');
INSERT INTO `ap_log_action` VALUES (654, 'search', 'Update search: 22', 1, '2019-05-06 02:44:25');
INSERT INTO `ap_log_action` VALUES (655, 'search', 'Update search: 23', 1, '2019-05-06 02:45:00');
INSERT INTO `ap_log_action` VALUES (656, 'account', 'Update account: 125', 1, '2019-05-06 02:45:36');
INSERT INTO `ap_log_action` VALUES (657, 'account', 'delete account: 125', 1, '2019-05-06 02:45:41');
INSERT INTO `ap_log_action` VALUES (658, 'search', 'Insert search: 24', 1, '2019-05-06 02:47:05');
INSERT INTO `ap_log_action` VALUES (659, 'search', 'Insert search: 25', 1, '2019-05-06 02:48:14');
INSERT INTO `ap_log_action` VALUES (660, 'renter', 'Update renter: 6', 1, '2019-05-06 02:48:31');
INSERT INTO `ap_log_action` VALUES (661, 'search', 'Update search: 20', 1, '2019-05-06 02:51:43');
INSERT INTO `ap_log_action` VALUES (662, 'search', 'Update search: 21', 1, '2019-05-06 02:51:57');
INSERT INTO `ap_log_action` VALUES (663, 'search', 'Update search: 22', 1, '2019-05-06 02:52:07');
INSERT INTO `ap_log_action` VALUES (664, 'search', 'Update search: 23', 1, '2019-05-06 02:52:10');
INSERT INTO `ap_log_action` VALUES (665, 'search', 'Update search: 24', 1, '2019-05-06 02:52:19');
INSERT INTO `ap_log_action` VALUES (666, 'search', 'Update search: 25', 1, '2019-05-06 02:52:37');
INSERT INTO `ap_log_action` VALUES (667, 'renter', 'Update renter: 7', 1, '2019-05-06 02:54:49');
INSERT INTO `ap_log_action` VALUES (668, 'category', 'Insert category: 32', 1, '2019-05-06 02:56:09');
INSERT INTO `ap_log_action` VALUES (669, 'category', 'Update category: 32', 1, '2019-05-06 02:56:13');
INSERT INTO `ap_log_action` VALUES (670, 'category', 'Update category: 31', 1, '2019-05-06 02:56:20');
INSERT INTO `ap_log_action` VALUES (671, 'contact', 'Update contact: 52', 1, '2019-05-06 03:06:33');
INSERT INTO `ap_log_action` VALUES (672, 'contact', 'Update contact: 53', 1, '2019-05-06 03:07:50');
INSERT INTO `ap_log_action` VALUES (673, 'message_system', 'Sửa message_system có id là 24', 1, '2019-05-06 03:12:39');
INSERT INTO `ap_log_action` VALUES (674, 'property', 'Insert property: 0', 1, '2019-05-06 03:19:06');
INSERT INTO `ap_log_action` VALUES (675, 'property', 'Insert property: 0', 1, '2019-05-06 03:19:51');
INSERT INTO `ap_log_action` VALUES (676, 'property', 'Update property: 80', 1, '2019-05-06 03:19:57');
INSERT INTO `ap_log_action` VALUES (677, 'property', 'Update property: 79', 1, '2019-05-06 03:20:15');
INSERT INTO `ap_log_action` VALUES (678, 'property', 'Update property: 79', 1, '2019-05-06 03:20:20');
INSERT INTO `ap_log_action` VALUES (679, 'post', 'Thêm Banner có id là 25', 1, '2019-05-06 03:21:14');
INSERT INTO `ap_log_action` VALUES (680, 'post', 'Thêm Banner có id là 26', 1, '2019-05-06 03:21:42');
INSERT INTO `ap_log_action` VALUES (681, 'page', 'Insert page: 0', 1, '2019-05-06 03:28:28');
INSERT INTO `ap_log_action` VALUES (682, 'page', 'Insert page: 0', 1, '2019-05-06 03:28:47');
INSERT INTO `ap_log_action` VALUES (683, 'page', 'Update page: 17', 1, '2019-05-06 03:28:53');
INSERT INTO `ap_log_action` VALUES (684, 'page', 'Update page: 16', 1, '2019-05-06 03:28:59');
INSERT INTO `ap_log_action` VALUES (685, 'search', 'Insert search: 26', 1, '2019-05-06 03:36:45');
INSERT INTO `ap_log_action` VALUES (686, 'search', 'Update search: 26', 1, '2019-05-06 03:37:05');
INSERT INTO `ap_log_action` VALUES (687, 'currency', 'Insert currency: 115', 1, '2019-05-06 03:42:23');
INSERT INTO `ap_log_action` VALUES (688, 'page', 'Update page: 10', 1, '2019-05-06 03:42:36');
INSERT INTO `ap_log_action` VALUES (689, 'currency', 'Insert currency: 116', 1, '2019-05-06 03:42:36');
INSERT INTO `ap_log_action` VALUES (690, 'currency', 'Update currency: 116', 1, '2019-05-06 03:42:51');
INSERT INTO `ap_log_action` VALUES (691, 'currency', 'Update currency: 115', 1, '2019-05-06 03:42:58');
INSERT INTO `ap_log_action` VALUES (692, 'page', 'Update page: 8', 1, '2019-05-06 03:43:50');
INSERT INTO `ap_log_action` VALUES (693, 'page', 'Update page: 8', 1, '2019-05-06 03:45:32');
INSERT INTO `ap_log_action` VALUES (694, 'category', 'Insert category: 33', 1, '2019-05-06 03:46:47');
INSERT INTO `ap_log_action` VALUES (695, 'category', 'Insert category: 34', 1, '2019-05-06 03:47:32');
INSERT INTO `ap_log_action` VALUES (696, 'category', 'Update category: 33', 1, '2019-05-06 03:47:39');
INSERT INTO `ap_log_action` VALUES (697, 'category', 'Update category: 34', 1, '2019-05-06 03:47:46');
INSERT INTO `ap_log_action` VALUES (698, 'property', 'Insert property: 0', 1, '2019-05-06 03:48:18');
INSERT INTO `ap_log_action` VALUES (699, 'page', 'Update page: 8', 1, '2019-05-06 03:48:25');
INSERT INTO `ap_log_action` VALUES (700, 'property', 'Insert property: 0', 1, '2019-05-06 03:48:28');
INSERT INTO `ap_log_action` VALUES (701, 'page', 'Update page: 10', 1, '2019-05-06 03:51:07');
INSERT INTO `ap_log_action` VALUES (702, 'page', 'Update page: 10', 1, '2019-05-06 03:51:56');
INSERT INTO `ap_log_action` VALUES (703, 'page', 'Update page: 8', 1, '2019-05-06 03:53:26');
INSERT INTO `ap_log_action` VALUES (704, 'page', 'Update page: 10', 1, '2019-05-06 03:53:51');
INSERT INTO `ap_log_action` VALUES (705, 'page', 'Update page: 11', 1, '2019-05-06 03:55:28');
INSERT INTO `ap_log_action` VALUES (706, 'property', 'Update property: 82', 1, '2019-05-06 03:57:08');
INSERT INTO `ap_log_action` VALUES (707, 'property', 'Update property: 81', 1, '2019-05-06 03:57:14');
INSERT INTO `ap_log_action` VALUES (708, 'page', 'Update page: 11', 1, '2019-05-06 03:57:31');
INSERT INTO `ap_log_action` VALUES (709, 'page', 'Update page: 9', 1, '2019-05-06 03:58:16');
INSERT INTO `ap_log_action` VALUES (710, 'page', 'Update page: 9', 1, '2019-05-06 04:00:22');
INSERT INTO `ap_log_action` VALUES (711, 'page', 'Update page: 9', 1, '2019-05-06 04:01:40');
INSERT INTO `ap_log_action` VALUES (712, 'property', 'Insert property: 0', 1, '2019-05-06 04:02:57');
INSERT INTO `ap_log_action` VALUES (713, 'property', 'Insert property: 0', 1, '2019-05-06 04:03:04');
INSERT INTO `ap_log_action` VALUES (714, 'property', 'Update property: 84', 1, '2019-05-06 04:04:35');
INSERT INTO `ap_log_action` VALUES (715, 'property', 'Update property: 83', 1, '2019-05-06 04:04:43');
INSERT INTO `ap_log_action` VALUES (716, 'page', 'Update page: 7', 1, '2019-05-06 04:05:38');
INSERT INTO `ap_log_action` VALUES (717, 'page', 'Update page: 7', 1, '2019-05-06 04:17:21');
INSERT INTO `ap_log_action` VALUES (718, 'room', 'Insert room: 42', 1, '2019-05-06 04:21:29');
INSERT INTO `ap_log_action` VALUES (719, 'room', 'Update room: 42', 1, '2019-05-06 04:24:29');
INSERT INTO `ap_log_action` VALUES (720, 'room', 'Update room: 42', 1, '2019-05-06 04:25:16');
INSERT INTO `ap_log_action` VALUES (721, 'page', 'Update page: 10', 1, '2019-05-06 04:37:43');
INSERT INTO `ap_log_action` VALUES (722, 'page', 'Update page: 10', 1, '2019-05-06 04:39:00');
INSERT INTO `ap_log_action` VALUES (723, 'room', 'Update room: 42', 1, '2019-05-06 04:48:50');
INSERT INTO `ap_log_action` VALUES (724, 'room', 'Update room: 42', 1, '2019-05-07 09:43:11');
INSERT INTO `ap_log_action` VALUES (725, 'users', 'delete users: 50', 1, '2019-05-07 10:46:14');
INSERT INTO `ap_log_action` VALUES (726, 'users', 'delete users: 47', 1, '2019-05-07 10:47:03');
INSERT INTO `ap_log_action` VALUES (727, 'users', 'delete users: 48', 1, '2019-05-07 10:47:05');
INSERT INTO `ap_log_action` VALUES (728, 'users', 'Update users: 46', 1, '2019-05-07 10:55:11');
INSERT INTO `ap_log_action` VALUES (729, 'account', 'Update account: 122', 1, '2019-05-07 10:57:12');
INSERT INTO `ap_log_action` VALUES (730, 'account', 'Update account: 121', 1, '2019-05-07 10:57:18');
INSERT INTO `ap_log_action` VALUES (731, 'account', 'Update account: 120', 1, '2019-05-07 10:57:24');
INSERT INTO `ap_log_action` VALUES (732, 'account', 'Update account: 119', 1, '2019-05-07 10:57:39');
INSERT INTO `ap_log_action` VALUES (733, 'account', 'Update account: 117', 1, '2019-05-07 10:57:52');
INSERT INTO `ap_log_action` VALUES (734, 'renter', 'Update renter: 8', 1, '2019-05-07 11:17:13');
INSERT INTO `ap_log_action` VALUES (735, 'room', 'Update room: 41', 1, '2019-05-07 11:28:06');
INSERT INTO `ap_log_action` VALUES (736, 'room', 'Update room: 40', 1, '2019-05-07 11:28:08');
INSERT INTO `ap_log_action` VALUES (737, 'room', 'Update room: 42', 1, '2019-05-07 11:28:22');
INSERT INTO `ap_log_action` VALUES (738, 'account', 'delete account: 126', 1, '2019-05-07 03:54:01');
INSERT INTO `ap_log_action` VALUES (739, 'account', 'delete account: 55', 1, '2019-05-07 03:54:30');
INSERT INTO `ap_log_action` VALUES (740, 'account', 'delete account: 54', 1, '2019-05-07 03:54:33');
INSERT INTO `ap_log_action` VALUES (741, 'account', 'delete account: 53', 1, '2019-05-07 03:54:35');
INSERT INTO `ap_log_action` VALUES (742, 'account', 'delete account: 52', 1, '2019-05-07 03:54:43');
INSERT INTO `ap_log_action` VALUES (743, 'account', 'delete account: 51', 1, '2019-05-07 03:54:44');
INSERT INTO `ap_log_action` VALUES (744, 'account', 'delete account: 50', 1, '2019-05-07 03:54:44');
INSERT INTO `ap_log_action` VALUES (745, 'account', 'delete account: 49', 1, '2019-05-07 03:54:52');
INSERT INTO `ap_log_action` VALUES (746, 'account', 'delete account: 48', 1, '2019-05-07 03:54:52');
INSERT INTO `ap_log_action` VALUES (747, 'account', 'delete account: 47', 1, '2019-05-07 03:54:52');
INSERT INTO `ap_log_action` VALUES (748, 'account', 'Update account: 120', 1, '2019-05-08 09:32:57');
INSERT INTO `ap_log_action` VALUES (749, 'contact', 'Update contact: 47', 1, '2019-05-08 09:42:55');
INSERT INTO `ap_log_action` VALUES (750, 'message_system', 'Sửa message_system có id là 21', 1, '2019-05-08 09:47:37');
INSERT INTO `ap_log_action` VALUES (751, 'message_system', 'Sửa message_system có id là 19', 1, '2019-05-08 09:47:48');
INSERT INTO `ap_log_action` VALUES (752, 'message_system', 'Sửa message_system có id là 18', 1, '2019-05-08 09:47:55');
INSERT INTO `ap_log_action` VALUES (753, 'message_system', 'Sửa message_system có id là 21', 1, '2019-05-08 09:48:13');
INSERT INTO `ap_log_action` VALUES (754, 'message_system', 'Sửa message_system có id là 19', 1, '2019-05-08 09:48:18');
INSERT INTO `ap_log_action` VALUES (755, 'message_system', 'Sửa message_system có id là 18', 1, '2019-05-08 09:48:24');
INSERT INTO `ap_log_action` VALUES (756, 'account', 'Update account: 107', 1, '2019-05-08 02:19:34');
INSERT INTO `ap_log_action` VALUES (757, 'room', 'Update room: 23', 1, '2019-05-08 03:24:15');
INSERT INTO `ap_log_action` VALUES (758, 'system_menu', 'Update system_menu: 19', 1, '2019-05-08 05:46:56');
INSERT INTO `ap_log_action` VALUES (759, 'system_menu', 'Update system_menu: 18', 1, '2019-05-08 05:47:01');
INSERT INTO `ap_log_action` VALUES (760, 'system_menu', 'Update system_menu: 10', 1, '2019-05-08 05:47:42');
INSERT INTO `ap_log_action` VALUES (761, 'system_menu', 'Update system_menu: 11', 1, '2019-05-08 05:48:01');
INSERT INTO `ap_log_action` VALUES (762, 'system_menu', 'Update system_menu: 12', 1, '2019-05-08 05:48:04');
INSERT INTO `ap_log_action` VALUES (763, 'account', 'Update account: 68', 1, '2019-05-09 09:35:47');
INSERT INTO `ap_log_action` VALUES (764, 'room', 'Update room: 46', 1, '2019-05-09 12:08:28');
INSERT INTO `ap_log_action` VALUES (765, 'room', 'Update room: 34', 1, '2019-05-09 01:50:20');
INSERT INTO `ap_log_action` VALUES (766, 'room', 'Update room: 34', 1, '2019-05-09 01:50:31');
INSERT INTO `ap_log_action` VALUES (767, 'room', 'Update room: 33', 1, '2019-05-09 01:51:06');
INSERT INTO `ap_log_action` VALUES (768, 'room', 'Update room: 30', 1, '2019-05-09 01:51:24');
INSERT INTO `ap_log_action` VALUES (769, 'room', 'Update room: 30', 1, '2019-05-09 01:51:30');
INSERT INTO `ap_log_action` VALUES (770, 'room', 'Update room: 25', 1, '2019-05-09 01:51:54');
INSERT INTO `ap_log_action` VALUES (771, 'room', 'Update room: 28', 1, '2019-05-09 01:52:08');
INSERT INTO `ap_log_action` VALUES (772, 'room', 'Update room: 24', 1, '2019-05-09 01:52:35');
INSERT INTO `ap_log_action` VALUES (773, 'room', 'Update room: 23', 1, '2019-05-09 01:52:50');
INSERT INTO `ap_log_action` VALUES (774, 'room', 'Update room: 20', 1, '2019-05-09 01:53:01');
INSERT INTO `ap_log_action` VALUES (775, 'room', 'Update room: 2', 1, '2019-05-09 01:53:11');
INSERT INTO `ap_log_action` VALUES (776, 'room', 'Update room: 1', 1, '2019-05-09 01:53:23');
INSERT INTO `ap_log_action` VALUES (777, 'review', 'Update review: 17', 1, '2019-05-09 02:32:05');
INSERT INTO `ap_log_action` VALUES (778, 'review', 'Update review: 14', 1, '2019-05-09 02:32:14');
INSERT INTO `ap_log_action` VALUES (779, 'page', 'Update page: 7', 1, '2019-05-09 03:08:21');
INSERT INTO `ap_log_action` VALUES (780, 'account', 'Insert account: 133', 1, '2019-05-09 03:40:01');
INSERT INTO `ap_log_action` VALUES (781, 'account', 'delete account: 133', 1, '2019-05-09 03:42:29');
INSERT INTO `ap_log_action` VALUES (782, 'room', 'Update room: 45', 1, '2019-05-09 03:56:29');
INSERT INTO `ap_log_action` VALUES (783, 'room', 'Update room: 44', 1, '2019-05-09 03:56:32');
INSERT INTO `ap_log_action` VALUES (784, 'room', 'Update room: 34', 1, '2019-05-09 03:56:56');
INSERT INTO `ap_log_action` VALUES (785, 'room', 'Update room: 33', 1, '2019-05-09 03:57:12');
INSERT INTO `ap_log_action` VALUES (786, 'room', 'Update room: 34', 1, '2019-05-09 03:57:24');
INSERT INTO `ap_log_action` VALUES (787, 'room', 'Update room: 34', 1, '2019-05-09 03:58:31');
INSERT INTO `ap_log_action` VALUES (788, 'room', 'Update room: 25', 1, '2019-05-09 04:08:23');
INSERT INTO `ap_log_action` VALUES (789, 'room', 'Update room: 25', 1, '2019-05-09 04:09:05');
INSERT INTO `ap_log_action` VALUES (790, 'message_system', 'Sửa message_system có id là 27', 1, '2019-05-09 04:11:03');
INSERT INTO `ap_log_action` VALUES (791, 'room', 'Update room: 2', 1, '2019-05-09 05:07:59');
INSERT INTO `ap_log_action` VALUES (792, 'account', 'Update account: 117', 1, '2019-05-09 05:38:01');
INSERT INTO `ap_log_action` VALUES (793, 'room', 'Update room: 24', 1, '2019-05-09 07:07:05');
INSERT INTO `ap_log_action` VALUES (794, 'users', 'Update users: ', 1, '2019-05-09 07:15:50');
INSERT INTO `ap_log_action` VALUES (795, 'renter', 'Update renter: 3', 1, '2019-05-09 09:22:05');
INSERT INTO `ap_log_action` VALUES (796, 'renter', 'Update renter: 2', 1, '2019-05-09 09:22:08');
INSERT INTO `ap_log_action` VALUES (797, 'room', 'Update room: 2', 1, '2019-05-10 10:21:35');
INSERT INTO `ap_log_action` VALUES (798, 'users', 'delete users: 49', 1, '2019-05-10 10:30:10');
INSERT INTO `ap_log_action` VALUES (799, 'users', 'delete users: 46', 1, '2019-05-10 10:30:12');
INSERT INTO `ap_log_action` VALUES (800, 'users', 'delete users: 52', 1, '2019-05-10 10:30:17');
INSERT INTO `ap_log_action` VALUES (801, 'account', 'delete account: 117', 1, '2019-05-10 11:21:36');
INSERT INTO `ap_log_action` VALUES (802, 'room', 'Update room: 49', 1, '2019-05-10 11:50:53');
INSERT INTO `ap_log_action` VALUES (803, 'message_system', 'Sửa message_system có id là 33', 1, '2019-05-10 03:51:21');
INSERT INTO `ap_log_action` VALUES (804, 'message_system', 'Sửa message_system có id là 33', 1, '2019-05-10 03:51:39');
INSERT INTO `ap_log_action` VALUES (805, 'room', 'Update room: 34', 1, '2019-05-11 12:22:23');
INSERT INTO `ap_log_action` VALUES (806, 'room', 'Insert room: 52', 1, '2019-05-11 01:45:05');
INSERT INTO `ap_log_action` VALUES (807, 'room', 'Update room: 52', 1, '2019-05-11 01:49:32');
INSERT INTO `ap_log_action` VALUES (808, 'room', 'Update room: 52', 1, '2019-05-11 02:34:40');
INSERT INTO `ap_log_action` VALUES (809, 'room', 'Update room: 52', 1, '2019-05-11 02:36:48');
INSERT INTO `ap_log_action` VALUES (810, 'room', 'Update room: 52', 1, '2019-05-11 02:37:33');
INSERT INTO `ap_log_action` VALUES (811, 'room', 'Update room: 52', 1, '2019-05-11 02:37:48');
INSERT INTO `ap_log_action` VALUES (812, 'room', 'Update room: 52', 1, '2019-05-11 02:43:45');
INSERT INTO `ap_log_action` VALUES (813, 'property', 'Update property: 52', 1, '2019-05-11 05:31:25');
INSERT INTO `ap_log_action` VALUES (814, 'room', 'Update room: 34', 1, '2019-05-11 05:32:30');
INSERT INTO `ap_log_action` VALUES (815, 'room', 'Update room: 33', 1, '2019-05-11 05:33:26');
INSERT INTO `ap_log_action` VALUES (816, 'users', 'Update users: 56', 1, '2019-05-11 05:38:18');
INSERT INTO `ap_log_action` VALUES (817, 'property', 'Update property: 78', 56, '2019-05-11 05:39:10');
INSERT INTO `ap_log_action` VALUES (818, 'property', 'Update property: 77', 56, '2019-05-11 05:39:12');
INSERT INTO `ap_log_action` VALUES (819, 'property', 'Update property: 66', 56, '2019-05-11 05:40:04');
INSERT INTO `ap_log_action` VALUES (820, 'property', 'Update property: 65', 56, '2019-05-11 05:40:16');
INSERT INTO `ap_log_action` VALUES (821, 'property', 'Update property: 64', 56, '2019-05-11 05:40:54');
INSERT INTO `ap_log_action` VALUES (822, 'property', 'Update property: 63', 56, '2019-05-11 05:41:26');
INSERT INTO `ap_log_action` VALUES (823, 'property', 'Update property: 62', 56, '2019-05-11 05:41:47');
INSERT INTO `ap_log_action` VALUES (824, 'property', 'Update property: 59', 56, '2019-05-11 05:42:53');
INSERT INTO `ap_log_action` VALUES (825, 'property', 'Update property: 58', 56, '2019-05-11 05:43:02');
INSERT INTO `ap_log_action` VALUES (826, 'property', 'Update property: 56', 56, '2019-05-11 05:43:33');
INSERT INTO `ap_log_action` VALUES (827, 'property', 'Update property: 55', 56, '2019-05-11 05:43:45');
INSERT INTO `ap_log_action` VALUES (828, 'property', 'Update property: 48', 56, '2019-05-11 05:48:33');
INSERT INTO `ap_log_action` VALUES (829, 'property', 'Update property: 47', 56, '2019-05-11 05:48:44');
INSERT INTO `ap_log_action` VALUES (830, 'property', 'Update property: 46', 56, '2019-05-11 05:48:57');
INSERT INTO `ap_log_action` VALUES (831, 'property', 'Update property: 45', 56, '2019-05-11 05:49:24');
INSERT INTO `ap_log_action` VALUES (832, 'property', 'Update property: 44', 56, '2019-05-11 05:49:36');
INSERT INTO `ap_log_action` VALUES (833, 'property', 'Update property: 43', 56, '2019-05-11 05:49:51');
INSERT INTO `ap_log_action` VALUES (834, 'property', 'Update property: 42', 56, '2019-05-11 05:50:36');
INSERT INTO `ap_log_action` VALUES (835, 'property', 'Update property: 41', 56, '2019-05-11 05:50:46');
INSERT INTO `ap_log_action` VALUES (836, 'property', 'Update property: 40', 56, '2019-05-11 05:51:00');
INSERT INTO `ap_log_action` VALUES (837, 'property', 'Update property: 39', 56, '2019-05-11 05:51:15');
INSERT INTO `ap_log_action` VALUES (838, 'property', 'Update property: 38', 56, '2019-05-11 05:51:29');
INSERT INTO `ap_log_action` VALUES (839, 'property', 'Update property: 37', 56, '2019-05-11 05:51:38');
INSERT INTO `ap_log_action` VALUES (840, 'property', 'Update property: 49', 56, '2019-05-11 05:57:47');
INSERT INTO `ap_log_action` VALUES (841, 'property', 'Update property: 50', 56, '2019-05-11 05:58:17');
INSERT INTO `ap_log_action` VALUES (842, 'property', 'Update property: 54', 56, '2019-05-11 05:58:40');
INSERT INTO `ap_log_action` VALUES (843, 'property', 'Update property: 42', 56, '2019-05-11 05:58:59');
INSERT INTO `ap_log_action` VALUES (844, 'property', 'Update property: 51', 1, '2019-05-11 05:59:36');
INSERT INTO `ap_log_action` VALUES (845, 'property', 'Update property: 75', 1, '2019-05-11 06:00:22');
INSERT INTO `ap_log_action` VALUES (846, 'property', 'Update property: 74', 1, '2019-05-11 06:02:49');
INSERT INTO `ap_log_action` VALUES (847, 'property', 'Update property: 73', 1, '2019-05-11 06:03:10');
INSERT INTO `ap_log_action` VALUES (848, 'property', 'Update property: 61', 1, '2019-05-11 06:03:34');
INSERT INTO `ap_log_action` VALUES (849, 'property', 'Update property: 76', 56, '2019-05-11 11:39:42');
INSERT INTO `ap_log_action` VALUES (850, 'property', 'Update property: 72', 56, '2019-05-11 11:40:14');
INSERT INTO `ap_log_action` VALUES (851, 'property', 'Update property: 67', 56, '2019-05-11 11:40:44');
INSERT INTO `ap_log_action` VALUES (852, 'property', 'Update property: 61', 56, '2019-05-11 11:47:35');
INSERT INTO `ap_log_action` VALUES (853, 'property', 'Update property: 55', 56, '2019-05-11 11:48:17');
INSERT INTO `ap_log_action` VALUES (854, 'room', 'Update room: 34', 56, '2019-05-12 12:33:55');
INSERT INTO `ap_log_action` VALUES (855, 'room', 'Update room: 53', 1, '2019-05-12 12:45:38');
INSERT INTO `ap_log_action` VALUES (856, 'room', 'Insert room: 55', 56, '2019-05-13 10:52:06');
INSERT INTO `ap_log_action` VALUES (857, 'room', 'Update room: 55', 56, '2019-05-13 11:15:55');
INSERT INTO `ap_log_action` VALUES (858, 'room', 'Insert room: 56', 1, '2019-05-13 11:25:46');
INSERT INTO `ap_log_action` VALUES (859, 'room', 'Update room: 56', 1, '2019-05-13 11:32:39');
INSERT INTO `ap_log_action` VALUES (860, 'room', 'Update room: 55', 1, '2019-05-13 12:31:59');
INSERT INTO `ap_log_action` VALUES (861, 'room', 'Update room: 51', 1, '2019-05-13 12:32:12');
INSERT INTO `ap_log_action` VALUES (862, 'room', 'Update room: 57', 56, '2019-05-13 01:56:23');
INSERT INTO `ap_log_action` VALUES (863, 'room', 'Update room: 57', 56, '2019-05-13 01:56:36');
INSERT INTO `ap_log_action` VALUES (864, 'room', 'Update room: 56', 56, '2019-05-13 01:57:35');
INSERT INTO `ap_log_action` VALUES (865, 'room', 'Insert room: 58', 56, '2019-05-13 02:00:49');
INSERT INTO `ap_log_action` VALUES (866, 'room', 'Update room: 58', 56, '2019-05-13 02:01:44');
INSERT INTO `ap_log_action` VALUES (867, 'room', 'Update room: 49', 1, '2019-05-13 02:22:28');
INSERT INTO `ap_log_action` VALUES (868, 'room', 'Update room: 56', 1, '2019-05-13 02:29:50');
INSERT INTO `ap_log_action` VALUES (869, 'room', 'Update room: 56', 1, '2019-05-13 02:31:08');
INSERT INTO `ap_log_action` VALUES (870, 'room', 'Update room: 56', 1, '2019-05-13 02:47:26');
INSERT INTO `ap_log_action` VALUES (871, 'category', 'Insert category: 35', 56, '2019-05-13 02:58:28');
INSERT INTO `ap_log_action` VALUES (872, 'room', 'Update room: 56', 1, '2019-05-13 03:01:25');
INSERT INTO `ap_log_action` VALUES (873, 'category', 'Update category: 35', 56, '2019-05-13 03:01:31');
INSERT INTO `ap_log_action` VALUES (874, 'room', 'Update room: 56', 1, '2019-05-13 03:02:29');
INSERT INTO `ap_log_action` VALUES (875, 'room', 'Update room: 56', 1, '2019-05-13 03:03:26');
INSERT INTO `ap_log_action` VALUES (876, 'room', 'Update room: 58', 1, '2019-05-13 03:03:33');
INSERT INTO `ap_log_action` VALUES (877, 'room', 'Update room: 57', 1, '2019-05-13 03:03:40');
INSERT INTO `ap_log_action` VALUES (878, 'room', 'Update room: 55', 1, '2019-05-13 03:03:43');
INSERT INTO `ap_log_action` VALUES (879, 'room', 'Update room: 54', 1, '2019-05-13 03:03:46');
INSERT INTO `ap_log_action` VALUES (880, 'category', 'Update category: 30', 56, '2019-05-13 03:04:17');
INSERT INTO `ap_log_action` VALUES (881, 'category', 'Update category: 30', 56, '2019-05-13 03:05:27');
INSERT INTO `ap_log_action` VALUES (882, 'room', 'Update room: 52', 1, '2019-05-13 03:05:54');
INSERT INTO `ap_log_action` VALUES (883, 'room', 'Update room: 50', 1, '2019-05-13 03:06:01');
INSERT INTO `ap_log_action` VALUES (884, 'room', 'Update room: 48', 1, '2019-05-13 03:06:03');
INSERT INTO `ap_log_action` VALUES (885, 'room', 'Update room: 47', 1, '2019-05-13 03:06:05');
INSERT INTO `ap_log_action` VALUES (886, 'room', 'Update room: 43', 1, '2019-05-13 03:06:07');
INSERT INTO `ap_log_action` VALUES (887, 'room', 'Update room: 42', 1, '2019-05-13 03:06:11');
INSERT INTO `ap_log_action` VALUES (888, 'property', 'Insert property: 0', 56, '2019-05-13 03:09:59');
INSERT INTO `ap_log_action` VALUES (889, 'property', 'Update property: 85', 56, '2019-05-13 03:10:30');
INSERT INTO `ap_log_action` VALUES (890, 'room', 'Update room: 33', 56, '2019-05-13 03:10:54');
INSERT INTO `ap_log_action` VALUES (891, 'property', 'Insert property: 0', 56, '2019-05-13 03:11:48');
INSERT INTO `ap_log_action` VALUES (892, 'property', 'Update property: 86', 56, '2019-05-13 03:13:22');
INSERT INTO `ap_log_action` VALUES (893, 'property', 'Update property: 86', 56, '2019-05-13 03:14:45');
INSERT INTO `ap_log_action` VALUES (894, 'room', 'Update room: 34', 1, '2019-05-13 03:22:56');
INSERT INTO `ap_log_action` VALUES (895, 'room', 'Update room: 33', 1, '2019-05-13 03:25:57');
INSERT INTO `ap_log_action` VALUES (896, 'room', 'Update room: 30', 1, '2019-05-13 03:28:01');
INSERT INTO `ap_log_action` VALUES (897, 'room', 'Update room: 29', 1, '2019-05-13 03:29:52');
INSERT INTO `ap_log_action` VALUES (898, 'room', 'Update room: 26', 1, '2019-05-13 03:30:09');
INSERT INTO `ap_log_action` VALUES (899, 'room', 'Update room: 30', 1, '2019-05-13 03:30:32');
INSERT INTO `ap_log_action` VALUES (900, 'room', 'Update room: 28', 1, '2019-05-13 03:30:40');
INSERT INTO `ap_log_action` VALUES (901, 'room', 'Update room: 1', 1, '2019-05-13 03:32:10');
INSERT INTO `ap_log_action` VALUES (902, 'room', 'Update room: 1', 1, '2019-05-13 03:33:07');
INSERT INTO `ap_log_action` VALUES (903, 'room', 'Update room: 2', 1, '2019-05-13 03:34:37');
INSERT INTO `ap_log_action` VALUES (904, 'room', 'Update room: 20', 1, '2019-05-13 03:37:31');
INSERT INTO `ap_log_action` VALUES (905, 'room', 'Update room: 23', 1, '2019-05-13 03:39:09');
INSERT INTO `ap_log_action` VALUES (906, 'room', 'Update room: 24', 1, '2019-05-13 03:42:23');
INSERT INTO `ap_log_action` VALUES (907, 'room', 'Update room: 25', 1, '2019-05-13 03:45:22');
INSERT INTO `ap_log_action` VALUES (908, 'room', 'Update room: 1', 1, '2019-05-13 04:12:33');
INSERT INTO `ap_log_action` VALUES (909, 'room', 'Update room: 33', 1, '2019-05-13 04:17:02');
INSERT INTO `ap_log_action` VALUES (910, 'room', 'Update room: 30', 56, '2019-05-13 04:18:39');
INSERT INTO `ap_log_action` VALUES (911, 'room', 'Update room: 30', 1, '2019-05-13 04:21:33');
INSERT INTO `ap_log_action` VALUES (912, 'room', 'Update room: 56', 1, '2019-05-13 04:43:43');
INSERT INTO `ap_log_action` VALUES (913, 'room', 'Update room: 56', 1, '2019-05-13 04:45:24');
INSERT INTO `ap_log_action` VALUES (914, 'account', 'Update account: 139', 56, '2019-05-13 05:43:38');
INSERT INTO `ap_log_action` VALUES (915, 'account', 'Update account: 131', 56, '2019-05-13 05:44:03');
INSERT INTO `ap_log_action` VALUES (916, 'account', 'delete account: 32', 1, '2019-05-13 08:11:34');
INSERT INTO `ap_log_action` VALUES (917, 'review', 'Update review: 13', 1, '2019-05-13 08:25:29');
INSERT INTO `ap_log_action` VALUES (918, 'review', 'Update review: 14', 1, '2019-05-13 08:25:35');
INSERT INTO `ap_log_action` VALUES (919, 'review', 'Update review: 1', 1, '2019-05-13 08:25:44');
INSERT INTO `ap_log_action` VALUES (920, 'review', 'Update review: 19', 1, '2019-05-13 08:25:50');
INSERT INTO `ap_log_action` VALUES (921, 'category', 'Update category: 30', 1, '2019-05-14 12:36:09');
INSERT INTO `ap_log_action` VALUES (922, 'category', 'Update category: 16', 1, '2019-05-14 12:36:19');
INSERT INTO `ap_log_action` VALUES (923, 'category', 'Update category: 5', 1, '2019-05-14 12:36:25');
INSERT INTO `ap_log_action` VALUES (924, 'category', 'Update category: 3', 1, '2019-05-14 12:36:31');
INSERT INTO `ap_log_action` VALUES (925, 'property', 'Update property: 53', 56, '2019-05-14 09:00:20');
INSERT INTO `ap_log_action` VALUES (926, 'property', 'Update property: 57', 56, '2019-05-14 09:00:41');
INSERT INTO `ap_log_action` VALUES (927, 'property', 'Update property: 60', 56, '2019-05-14 09:01:02');
INSERT INTO `ap_log_action` VALUES (928, 'room', 'Update room: 25', 1, '2019-05-14 09:17:58');
INSERT INTO `ap_log_action` VALUES (929, 'room', 'Update room: 25', 1, '2019-05-14 09:18:18');
INSERT INTO `ap_log_action` VALUES (930, 'category', 'Update category: 16', 1, '2019-05-14 09:24:38');
INSERT INTO `ap_log_action` VALUES (931, 'account', 'Update account: 77', 1, '2019-05-14 09:35:12');
INSERT INTO `ap_log_action` VALUES (932, 'review', 'Update review: 40', 1, '2019-05-14 09:44:40');
INSERT INTO `ap_log_action` VALUES (933, 'review', 'Update review: 38', 1, '2019-05-14 09:44:43');
INSERT INTO `ap_log_action` VALUES (934, 'review', 'Update review: 37', 1, '2019-05-14 09:44:47');
INSERT INTO `ap_log_action` VALUES (935, 'review', 'Update review: 36', 1, '2019-05-14 09:44:52');
INSERT INTO `ap_log_action` VALUES (936, 'review', 'Update review: 35', 1, '2019-05-14 09:44:56');
INSERT INTO `ap_log_action` VALUES (937, 'review', 'Update review: 28', 1, '2019-05-14 09:45:00');
INSERT INTO `ap_log_action` VALUES (938, 'review', 'Update review: 27', 1, '2019-05-14 09:45:04');
INSERT INTO `ap_log_action` VALUES (939, 'review', 'Update review: 1', 1, '2019-05-14 09:45:11');
INSERT INTO `ap_log_action` VALUES (940, 'review', 'Update review: 18', 1, '2019-05-14 09:45:14');
INSERT INTO `ap_log_action` VALUES (941, 'review', 'Update review: 15', 1, '2019-05-14 09:45:17');
INSERT INTO `ap_log_action` VALUES (942, 'review', 'Update review: 14', 1, '2019-05-14 09:45:20');
INSERT INTO `ap_log_action` VALUES (943, 'review', 'Update review: 13', 1, '2019-05-14 09:45:23');
INSERT INTO `ap_log_action` VALUES (944, 'review', 'Update review: 21', 1, '2019-05-14 09:45:27');
INSERT INTO `ap_log_action` VALUES (945, 'review', 'Update review: 20', 1, '2019-05-14 09:45:30');
INSERT INTO `ap_log_action` VALUES (946, 'review', 'Update review: 19', 1, '2019-05-14 09:45:34');
INSERT INTO `ap_log_action` VALUES (947, 'room', 'Update room: 23', 1, '2019-05-14 09:48:36');
INSERT INTO `ap_log_action` VALUES (948, 'room', 'Update room: 2', 56, '2019-05-14 11:24:35');
INSERT INTO `ap_log_action` VALUES (949, 'room', 'Update room: 52', 56, '2019-05-14 11:39:37');
INSERT INTO `ap_log_action` VALUES (950, 'room', 'Update room: 62', 1, '2019-05-14 12:32:15');
INSERT INTO `ap_log_action` VALUES (951, 'room', 'Update room: 63', 1, '2019-05-14 12:32:18');
INSERT INTO `ap_log_action` VALUES (952, 'room', 'Update room: 64', 1, '2019-05-14 12:32:20');
INSERT INTO `ap_log_action` VALUES (953, 'room', 'Update room: 65', 1, '2019-05-14 12:32:23');
INSERT INTO `ap_log_action` VALUES (954, 'room', 'Update room: 66', 1, '2019-05-14 12:38:59');
INSERT INTO `ap_log_action` VALUES (955, 'room', 'Update room: 61', 56, '2019-05-14 12:44:02');
INSERT INTO `ap_log_action` VALUES (956, 'account', 'Update account: 135', 1, '2019-05-14 05:17:43');
INSERT INTO `ap_log_action` VALUES (957, 'room', 'Update room: 69', 56, '2019-05-15 09:51:16');
INSERT INTO `ap_log_action` VALUES (958, 'room', 'Update room: 68', 56, '2019-05-15 09:51:18');
INSERT INTO `ap_log_action` VALUES (959, 'room', 'Update room: 67', 56, '2019-05-15 09:51:20');
INSERT INTO `ap_log_action` VALUES (960, 'room', 'Update room: 60', 56, '2019-05-15 09:51:24');
INSERT INTO `ap_log_action` VALUES (961, 'room', 'Update room: 59', 56, '2019-05-15 09:51:27');
INSERT INTO `ap_log_action` VALUES (962, 'room', 'Update room: 25', 56, '2019-05-15 10:03:22');
INSERT INTO `ap_log_action` VALUES (963, 'account', 'Update account: 135', 56, '2019-05-15 11:06:09');
INSERT INTO `ap_log_action` VALUES (964, 'account', 'Update account: 135', 56, '2019-05-15 11:06:41');
INSERT INTO `ap_log_action` VALUES (965, 'account', 'Update account: 135', 56, '2019-05-15 11:06:58');
INSERT INTO `ap_log_action` VALUES (966, 'account', 'Update account: 135', 56, '2019-05-15 11:07:15');
INSERT INTO `ap_log_action` VALUES (967, 'account', 'delete account: 104', 56, '2019-05-15 11:51:52');
INSERT INTO `ap_log_action` VALUES (968, 'account', 'delete account: 104', 56, '2019-05-15 11:52:13');
INSERT INTO `ap_log_action` VALUES (969, 'account', 'delete account: 104', 56, '2019-05-15 11:57:47');
INSERT INTO `ap_log_action` VALUES (970, 'room', 'Update room: 24', 56, '2019-05-15 01:34:10');
INSERT INTO `ap_log_action` VALUES (971, 'room', 'Update room: 52', 56, '2019-05-15 04:26:20');
INSERT INTO `ap_log_action` VALUES (972, 'account', 'Update account: 135', 56, '2019-05-15 04:39:28');
INSERT INTO `ap_log_action` VALUES (973, 'account', 'Insert account: 142', 56, '2019-05-15 04:43:07');
INSERT INTO `ap_log_action` VALUES (974, 'account', 'Update account: 135', 56, '2019-05-15 04:52:29');
INSERT INTO `ap_log_action` VALUES (975, 'users', 'Insert users: 0', 56, '2019-05-16 04:11:02');
INSERT INTO `ap_log_action` VALUES (976, 'users', 'delete users: 57', 56, '2019-05-16 04:11:37');
INSERT INTO `ap_log_action` VALUES (977, 'account', 'delete account: 142', 56, '2019-05-16 05:18:23');
INSERT INTO `ap_log_action` VALUES (978, 'account', 'Update account: 135', 56, '2019-05-17 09:31:44');
INSERT INTO `ap_log_action` VALUES (979, 'contact', 'Update contact: 57', 56, '2019-05-17 01:57:25');
INSERT INTO `ap_log_action` VALUES (980, 'page', 'Update page: 7', 56, '2019-05-18 09:35:54');
INSERT INTO `ap_log_action` VALUES (981, 'page', 'Update page: 7', 56, '2019-05-18 09:45:33');
INSERT INTO `ap_log_action` VALUES (982, 'room', 'Update room: 72', 56, '2019-05-18 09:56:56');
INSERT INTO `ap_log_action` VALUES (983, 'room', 'Update room: 2', 56, '2019-05-18 09:57:52');
INSERT INTO `ap_log_action` VALUES (984, 'property', 'Update property: 61', 56, '2019-05-18 11:01:55');
INSERT INTO `ap_log_action` VALUES (985, 'room', 'Update room: 73', 56, '2019-05-18 01:53:47');
INSERT INTO `ap_log_action` VALUES (986, 'room', 'Update room: 74', 56, '2019-05-18 01:53:50');
INSERT INTO `ap_log_action` VALUES (987, 'room', 'Update room: 75', 56, '2019-05-18 01:53:52');
INSERT INTO `ap_log_action` VALUES (988, 'room', 'Update room: 76', 56, '2019-05-18 01:53:55');
INSERT INTO `ap_log_action` VALUES (989, 'room', 'Update room: 77', 56, '2019-05-18 01:53:58');
INSERT INTO `ap_log_action` VALUES (990, 'room', 'Update room: 71', 56, '2019-05-18 01:54:01');
INSERT INTO `ap_log_action` VALUES (991, 'message_system', 'Sửa message_system có id là 43', 56, '2019-05-18 02:25:35');
INSERT INTO `ap_log_action` VALUES (992, 'room', 'Update room: 2', 56, '2019-05-18 03:28:12');
INSERT INTO `ap_log_action` VALUES (993, 'system_menu', 'Update system_menu: 9', 1, '2019-05-18 04:39:05');
INSERT INTO `ap_log_action` VALUES (994, 'system_menu', 'Update system_menu: 20', 1, '2019-05-18 04:39:05');
INSERT INTO `ap_log_action` VALUES (995, 'system_menu', 'Update system_menu: 21', 1, '2019-05-18 04:39:05');
INSERT INTO `ap_log_action` VALUES (996, 'system_menu', 'Update system_menu: 24', 1, '2019-05-18 04:39:05');
INSERT INTO `ap_log_action` VALUES (997, 'system_menu', 'Update system_menu: 25', 1, '2019-05-18 04:39:05');
INSERT INTO `ap_log_action` VALUES (998, 'system_menu', 'Update system_menu: 26', 1, '2019-05-18 04:39:05');
INSERT INTO `ap_log_action` VALUES (999, 'system_menu', 'Update system_menu: 27', 1, '2019-05-18 04:39:05');
INSERT INTO `ap_log_action` VALUES (1000, 'system_menu', 'Update system_menu: 8', 1, '2019-05-18 04:39:16');
INSERT INTO `ap_log_action` VALUES (1001, 'system_menu', 'Update system_menu: 34', 1, '2019-05-18 04:39:16');
INSERT INTO `ap_log_action` VALUES (1002, 'system_menu', 'Update system_menu: 35', 1, '2019-05-18 04:39:16');
INSERT INTO `ap_log_action` VALUES (1003, 'users', 'Update users: ', 1, '2019-05-19 11:47:51');
INSERT INTO `ap_log_action` VALUES (1004, 'system_menu', 'Update system_menu: 7', 1, '2019-05-21 11:16:39');
INSERT INTO `ap_log_action` VALUES (1005, 'system_menu', 'Insert system_menu: 26', 1, '2019-05-21 11:27:25');
INSERT INTO `ap_log_action` VALUES (1006, 'system_menu', 'Insert system_menu: 27', 1, '2019-05-21 11:32:38');
INSERT INTO `ap_log_action` VALUES (1007, 'system_menu', 'Update system_menu: 17', 1, '2019-05-21 11:33:23');
INSERT INTO `ap_log_action` VALUES (1008, 'system_menu', 'Update system_menu: 27', 1, '2019-05-21 11:33:33');
INSERT INTO `ap_log_action` VALUES (1009, 'doc', 'Update doc: 2', 1, '2019-05-21 11:30:07');
INSERT INTO `ap_log_action` VALUES (1010, 'doc', 'Update doc: 2', 1, '2019-05-21 11:32:11');
INSERT INTO `ap_log_action` VALUES (1011, 'doc', 'Update doc: 2', 1, '2019-05-21 11:48:45');
INSERT INTO `ap_log_action` VALUES (1012, 'doc', 'Update doc: 2', 1, '2019-05-22 12:01:13');
INSERT INTO `ap_log_action` VALUES (1013, 'doc', 'Update doc: 2', 1, '2019-05-22 12:02:48');
INSERT INTO `ap_log_action` VALUES (1014, 'doc', 'Update doc: 2', 1, '2019-05-22 12:09:28');
INSERT INTO `ap_log_action` VALUES (1015, 'doc', 'Update doc: 2', 1, '2019-05-22 12:09:46');
INSERT INTO `ap_log_action` VALUES (1016, 'doc', 'Update doc: 2', 1, '2019-05-22 12:10:57');
INSERT INTO `ap_log_action` VALUES (1017, 'doc', 'Insert doc: 3', 1, '2019-05-22 12:20:09');
INSERT INTO `ap_log_action` VALUES (1018, 'doc', 'Update doc: 3', 1, '2019-05-22 12:54:49');
INSERT INTO `ap_log_action` VALUES (1019, 'doc', 'Update doc: 3', 1, '2019-05-22 12:55:21');
INSERT INTO `ap_log_action` VALUES (1020, 'system_menu', 'Insert system_menu: 28', 1, '2019-05-22 01:56:45');
INSERT INTO `ap_log_action` VALUES (1021, 'doc', 'Update doc: 2', 1, '2019-05-22 10:29:50');
INSERT INTO `ap_log_action` VALUES (1022, 'doc', 'Update doc: 2', 1, '2019-05-22 10:29:52');
INSERT INTO `ap_log_action` VALUES (1023, 'doc', 'Update doc: 2', 1, '2019-05-22 10:29:53');
INSERT INTO `ap_log_action` VALUES (1024, 'doc', 'Update doc: 2', 1, '2019-05-22 10:30:49');
INSERT INTO `ap_log_action` VALUES (1025, 'doc', 'Update doc: 2', 1, '2019-05-22 10:31:14');
INSERT INTO `ap_log_action` VALUES (1026, 'doc', 'Update doc: 2', 1, '2019-05-22 10:32:34');
INSERT INTO `ap_log_action` VALUES (1027, 'doc', 'Update doc: 2', 1, '2019-05-22 11:15:02');
INSERT INTO `ap_log_action` VALUES (1028, 'doc', 'Update doc: 2', 1, '2019-05-22 11:16:22');
INSERT INTO `ap_log_action` VALUES (1029, 'doc', 'Update doc: 1', 1, '2019-05-22 11:17:08');
INSERT INTO `ap_log_action` VALUES (1030, 'doc', 'Update doc: 2', 1, '2019-05-22 11:29:03');
INSERT INTO `ap_log_action` VALUES (1031, 'doc', 'Update doc: 2', 1, '2019-05-22 11:47:18');
INSERT INTO `ap_log_action` VALUES (1032, 'doc', 'Update doc: 2', 1, '2019-05-22 11:48:41');
INSERT INTO `ap_log_action` VALUES (1033, 'doc', 'Update doc: 2', 1, '2019-05-22 11:57:43');
INSERT INTO `ap_log_action` VALUES (1034, 'doc', 'Update doc: 2', 1, '2019-05-22 12:04:32');
INSERT INTO `ap_log_action` VALUES (1035, 'doc', 'Update doc: 2', 1, '2019-05-22 02:06:59');
INSERT INTO `ap_log_action` VALUES (1036, 'doc', 'Update doc: 2', 1, '2019-05-22 02:08:27');
INSERT INTO `ap_log_action` VALUES (1037, 'doc', 'Update doc: 2', 1, '2019-05-22 02:11:43');
INSERT INTO `ap_log_action` VALUES (1038, 'doc', 'Update doc: 2', 1, '2019-05-22 02:12:05');
INSERT INTO `ap_log_action` VALUES (1039, 'doc', 'Update doc: 2', 1, '2019-05-22 02:14:16');
INSERT INTO `ap_log_action` VALUES (1040, 'doc', 'Update doc: 2', 1, '2019-05-22 02:24:59');
INSERT INTO `ap_log_action` VALUES (1041, 'doc', 'Update doc: 2', 1, '2019-05-22 02:25:34');
INSERT INTO `ap_log_action` VALUES (1042, 'doc', 'Update doc: 2', 1, '2019-05-22 02:36:22');
INSERT INTO `ap_log_action` VALUES (1043, 'doc', 'Update doc: 2', 1, '2019-05-22 02:38:06');
INSERT INTO `ap_log_action` VALUES (1044, 'doc', 'Update doc: 2', 1, '2019-05-22 02:40:29');
INSERT INTO `ap_log_action` VALUES (1045, 'doc', 'Update doc: 2', 1, '2019-05-22 02:40:42');
INSERT INTO `ap_log_action` VALUES (1046, 'doc', 'Update doc: 2', 1, '2019-05-22 03:06:08');
INSERT INTO `ap_log_action` VALUES (1047, 'doc', 'Update doc: 2', 1, '2019-05-22 03:19:08');
INSERT INTO `ap_log_action` VALUES (1048, 'doc', 'Insert doc: 4', 1, '2019-05-22 03:48:07');
INSERT INTO `ap_log_action` VALUES (1049, 'doc', 'Update doc: 4', 1, '2019-05-22 04:00:20');
INSERT INTO `ap_log_action` VALUES (1050, 'doc', 'Update doc: 2', 1, '2019-05-22 04:00:53');
INSERT INTO `ap_log_action` VALUES (1051, 'doc', 'Update doc: 2', 1, '2019-05-22 04:15:26');
INSERT INTO `ap_log_action` VALUES (1052, 'doc', 'Update doc: 1', 1, '2019-05-22 04:18:41');
INSERT INTO `ap_log_action` VALUES (1053, 'doc', 'Insert doc: 5', 1, '2019-05-22 04:40:39');
INSERT INTO `ap_log_action` VALUES (1054, 'doc', 'Update doc: 5', 1, '2019-05-22 04:41:01');
INSERT INTO `ap_log_action` VALUES (1055, 'doc', 'Update doc: 5', 1, '2019-05-22 04:41:41');
INSERT INTO `ap_log_action` VALUES (1056, 'doc', 'Update doc: 5', 1, '2019-05-22 04:41:59');
INSERT INTO `ap_log_action` VALUES (1057, 'doc', 'Update doc: 2', 1, '2019-05-22 04:59:44');
INSERT INTO `ap_log_action` VALUES (1058, 'doc', 'Update doc: 2', 1, '2019-05-22 05:00:19');
INSERT INTO `ap_log_action` VALUES (1059, 'doc', 'Update doc: 5', 1, '2019-05-22 05:01:02');
INSERT INTO `ap_log_action` VALUES (1060, 'type_doc', 'Insert type_doc: 4', 1, '2019-05-23 03:56:37');
INSERT INTO `ap_log_action` VALUES (1061, 'doc', 'Update doc: 4', 1, '2019-05-23 03:57:54');
INSERT INTO `ap_log_action` VALUES (1062, 'doc', 'Update doc: 4', 1, '2019-05-23 03:58:28');
INSERT INTO `ap_log_action` VALUES (1063, 'doc', 'Update doc: 4', 1, '2019-05-23 04:01:35');
INSERT INTO `ap_log_action` VALUES (1064, 'doc', 'Update doc: 4', 1, '2019-05-23 04:01:56');
INSERT INTO `ap_log_action` VALUES (1065, 'doc', 'Update doc: 4', 1, '2019-05-23 04:06:47');
INSERT INTO `ap_log_action` VALUES (1066, 'type_doc', 'Insert type_doc: 5', 1, '2019-05-23 04:07:43');
INSERT INTO `ap_log_action` VALUES (1067, 'doc', 'Update doc: 1', 1, '2019-05-23 04:08:12');
INSERT INTO `ap_log_action` VALUES (1068, 'doc', 'Update doc: 1', 1, '2019-05-23 04:09:55');
INSERT INTO `ap_log_action` VALUES (1069, 'doc', 'Update doc: 5', 1, '2019-05-23 04:13:03');
INSERT INTO `ap_log_action` VALUES (1070, 'doc', 'Update doc: 5', 1, '2019-05-23 04:15:22');
INSERT INTO `ap_log_action` VALUES (1071, 'doc', 'Update doc: 2', 1, '2019-05-23 04:16:04');
INSERT INTO `ap_log_action` VALUES (1072, 'doc', 'Update doc: 2', 1, '2019-05-23 04:16:45');
INSERT INTO `ap_log_action` VALUES (1073, 'doc', 'Update doc: 2', 1, '2019-05-23 04:16:46');
INSERT INTO `ap_log_action` VALUES (1074, 'doc', 'Update doc: 1', 1, '2019-05-23 04:19:29');
INSERT INTO `ap_log_action` VALUES (1075, 'doc', 'Update doc: 1', 1, '2019-05-23 04:19:56');
INSERT INTO `ap_log_action` VALUES (1076, 'doc', 'Update doc: 1', 1, '2019-05-23 04:20:17');
INSERT INTO `ap_log_action` VALUES (1077, 'doc', 'Update doc: 1', 1, '2019-05-23 04:22:41');
INSERT INTO `ap_log_action` VALUES (1078, 'doc', 'Update doc: 1', 1, '2019-05-23 04:22:55');
INSERT INTO `ap_log_action` VALUES (1079, 'doc', 'Update doc: 1', 1, '2019-05-23 04:23:02');
INSERT INTO `ap_log_action` VALUES (1080, 'doc', 'Update doc: 1', 1, '2019-05-23 04:23:21');
INSERT INTO `ap_log_action` VALUES (1081, 'doc', 'Update doc: 5', 1, '2019-05-23 04:31:50');
INSERT INTO `ap_log_action` VALUES (1082, 'doc', 'Update doc: 5', 1, '2019-05-23 04:32:11');
INSERT INTO `ap_log_action` VALUES (1083, 'doc', 'Update doc: 5', 1, '2019-05-23 04:32:34');
INSERT INTO `ap_log_action` VALUES (1084, 'doc', 'Update doc: 2', 1, '2019-05-23 04:33:18');
INSERT INTO `ap_log_action` VALUES (1085, 'doc', 'Update doc: 2', 1, '2019-05-23 04:33:36');
INSERT INTO `ap_log_action` VALUES (1086, 'doc', 'Update doc: 2', 1, '2019-05-23 04:36:04');
INSERT INTO `ap_log_action` VALUES (1087, 'doc', 'Update doc: 2', 1, '2019-05-23 04:36:54');
INSERT INTO `ap_log_action` VALUES (1088, 'doc', 'Update doc: 2', 1, '2019-05-23 04:37:08');
INSERT INTO `ap_log_action` VALUES (1089, 'doc', 'Update doc: 2', 1, '2019-05-23 04:37:14');
INSERT INTO `ap_log_action` VALUES (1090, 'doc', 'Update doc: 2', 1, '2019-05-23 04:37:29');
INSERT INTO `ap_log_action` VALUES (1091, 'doc', 'Update doc: 5', 1, '2019-05-23 04:39:58');
INSERT INTO `ap_log_action` VALUES (1092, 'type_doc', 'Insert type_doc: 6', 1, '2019-05-23 04:45:27');
INSERT INTO `ap_log_action` VALUES (1093, 'doc', 'Insert doc: 6', 1, '2019-05-23 04:46:27');
INSERT INTO `ap_log_action` VALUES (1094, 'doc', 'Update doc: 6', 1, '2019-05-23 04:47:51');
INSERT INTO `ap_log_action` VALUES (1095, 'doc', 'Update doc: 5', 1, '2019-05-23 04:48:04');
INSERT INTO `ap_log_action` VALUES (1096, 'doc', 'Update doc: 2', 1, '2019-05-23 04:51:03');
INSERT INTO `ap_log_action` VALUES (1097, 'doc', 'Update doc: 2', 1, '2019-05-23 04:52:13');
INSERT INTO `ap_log_action` VALUES (1098, 'doc', 'Update doc: 2', 1, '2019-05-23 04:52:57');
INSERT INTO `ap_log_action` VALUES (1099, 'doc', 'Update doc: 2', 1, '2019-05-23 04:53:32');
INSERT INTO `ap_log_action` VALUES (1100, 'doc', 'Update doc: 2', 1, '2019-05-23 04:55:03');
INSERT INTO `ap_log_action` VALUES (1101, 'doc', 'Update doc: 2', 1, '2019-05-23 05:04:23');
INSERT INTO `ap_log_action` VALUES (1102, 'doc', 'Update doc: 2', 1, '2019-05-23 05:04:39');
INSERT INTO `ap_log_action` VALUES (1103, 'doc', 'Update doc: 2', 1, '2019-05-23 05:04:44');
INSERT INTO `ap_log_action` VALUES (1104, 'doc', 'Update doc: 2', 1, '2019-05-23 05:06:27');
INSERT INTO `ap_log_action` VALUES (1105, 'doc', 'Update doc: 2', 1, '2019-05-23 05:08:43');
INSERT INTO `ap_log_action` VALUES (1106, 'doc', 'Update doc: 2', 1, '2019-05-23 05:09:26');
INSERT INTO `ap_log_action` VALUES (1107, 'doc', 'Update doc: 2', 1, '2019-05-23 05:10:49');
INSERT INTO `ap_log_action` VALUES (1108, 'doc', 'Update doc: 2', 1, '2019-05-23 05:11:18');
INSERT INTO `ap_log_action` VALUES (1109, 'doc', 'Update doc: 6', 1, '2019-05-23 05:11:40');
INSERT INTO `ap_log_action` VALUES (1110, 'doc', 'Update doc: 5', 1, '2019-05-23 05:15:07');
INSERT INTO `ap_log_action` VALUES (1111, 'doc', 'Update doc: 5', 1, '2019-05-23 11:09:43');
INSERT INTO `ap_log_action` VALUES (1112, 'doc', 'Update doc: 5', 1, '2019-05-23 11:10:24');
INSERT INTO `ap_log_action` VALUES (1113, 'doc', 'Update doc: 5', 1, '2019-05-23 11:10:57');
INSERT INTO `ap_log_action` VALUES (1114, 'doc', 'Update doc: 5', 1, '2019-05-23 11:11:16');
INSERT INTO `ap_log_action` VALUES (1115, 'doc', 'Update doc: 5', 1, '2019-05-23 11:15:23');
INSERT INTO `ap_log_action` VALUES (1116, 'doc', 'Update doc: 2', 1, '2019-05-23 11:15:39');
INSERT INTO `ap_log_action` VALUES (1117, 'doc', 'Update doc: 6', 1, '2019-05-23 11:17:41');
INSERT INTO `ap_log_action` VALUES (1118, 'doc', 'Update doc: 6', 1, '2019-05-23 11:18:00');
INSERT INTO `ap_log_action` VALUES (1119, 'doc', 'Update doc: 5', 1, '2019-05-23 11:22:09');
INSERT INTO `ap_log_action` VALUES (1120, 'doc', 'Update doc: 2', 1, '2019-05-23 11:22:23');
INSERT INTO `ap_log_action` VALUES (1121, 'doc', 'Update doc: 5', 1, '2019-05-23 11:41:02');
INSERT INTO `ap_log_action` VALUES (1122, 'doc', 'Update doc: 5', 1, '2019-05-23 11:44:11');
INSERT INTO `ap_log_action` VALUES (1123, 'doc', 'Update doc: 5', 1, '2019-05-23 11:44:31');
INSERT INTO `ap_log_action` VALUES (1124, 'doc', 'Update doc: 5', 1, '2019-05-23 11:46:57');
INSERT INTO `ap_log_action` VALUES (1125, 'doc', 'Update doc: 5', 1, '2019-05-23 11:47:11');
INSERT INTO `ap_log_action` VALUES (1126, 'doc', 'Update doc: 5', 1, '2019-05-23 11:49:56');
INSERT INTO `ap_log_action` VALUES (1127, 'doc', 'Update doc: 2', 1, '2019-05-23 11:50:05');
INSERT INTO `ap_log_action` VALUES (1128, 'doc', 'Update doc: 5', 1, '2019-05-23 11:50:16');
INSERT INTO `ap_log_action` VALUES (1129, 'doc', 'Update doc: 5', 1, '2019-05-23 11:53:08');
INSERT INTO `ap_log_action` VALUES (1130, 'doc', 'Update doc: 2', 1, '2019-05-23 11:53:17');
INSERT INTO `ap_log_action` VALUES (1131, 'doc', 'Update doc: 5', 1, '2019-05-24 12:02:09');
INSERT INTO `ap_log_action` VALUES (1132, 'doc', 'Update doc: 2', 1, '2019-05-24 12:08:10');
INSERT INTO `ap_log_action` VALUES (1133, 'doc', 'Update doc: 2', 1, '2019-05-24 12:08:13');
INSERT INTO `ap_log_action` VALUES (1134, 'doc', 'Update doc: 6', 1, '2019-05-24 12:08:32');
INSERT INTO `ap_log_action` VALUES (1135, 'doc', 'Update doc: 6', 1, '2019-05-24 12:08:42');
INSERT INTO `ap_log_action` VALUES (1136, 'doc', 'Update doc: 6', 1, '2019-05-24 12:08:58');
INSERT INTO `ap_log_action` VALUES (1137, 'doc', 'Update doc: 6', 1, '2019-05-24 12:10:41');
INSERT INTO `ap_log_action` VALUES (1138, 'doc', 'Update doc: 6', 1, '2019-05-24 12:10:44');
INSERT INTO `ap_log_action` VALUES (1139, 'doc', 'Update doc: 6', 1, '2019-05-24 12:10:47');
INSERT INTO `ap_log_action` VALUES (1140, 'doc', 'Update doc: 6', 1, '2019-05-24 08:33:59');
INSERT INTO `ap_log_action` VALUES (1141, 'doc', 'Update doc: 6', 1, '2019-05-24 08:41:22');
INSERT INTO `ap_log_action` VALUES (1142, 'system_menu', 'Insert system_menu: 29', 1, '2019-05-24 08:47:22');
INSERT INTO `ap_log_action` VALUES (1143, 'system_menu', 'Insert system_menu: 30', 1, '2019-05-24 08:47:57');
INSERT INTO `ap_log_action` VALUES (1144, 'system_menu', 'Insert system_menu: 31', 1, '2019-05-24 08:48:18');
INSERT INTO `ap_log_action` VALUES (1145, 'system_menu', 'Update system_menu: 29', 1, '2019-05-24 08:50:11');
INSERT INTO `ap_log_action` VALUES (1146, 'system_menu', 'Insert system_menu: 32', 1, '2019-05-24 08:50:52');
INSERT INTO `ap_log_action` VALUES (1147, 'system_menu', 'Insert system_menu: 33', 1, '2019-05-24 08:51:45');
INSERT INTO `ap_log_action` VALUES (1148, 'system_menu', 'Update system_menu: 32', 1, '2019-05-24 08:52:02');
INSERT INTO `ap_log_action` VALUES (1149, 'system_menu', 'Update system_menu: 2', 1, '2019-05-24 08:57:21');
INSERT INTO `ap_log_action` VALUES (1150, 'system_menu', 'Update system_menu: 17', 1, '2019-05-24 08:58:10');
INSERT INTO `ap_log_action` VALUES (1151, 'system_menu', 'Insert system_menu: 34', 1, '2019-05-24 08:58:56');
INSERT INTO `ap_log_action` VALUES (1152, 'system_menu', 'Insert system_menu: 35', 1, '2019-05-24 08:59:18');
INSERT INTO `ap_log_action` VALUES (1153, 'system_menu', 'Insert system_menu: 36', 1, '2019-05-24 09:00:36');
INSERT INTO `ap_log_action` VALUES (1154, 'system_menu', 'Insert system_menu: 37', 1, '2019-05-24 09:01:44');
INSERT INTO `ap_log_action` VALUES (1155, 'system_menu', 'Insert system_menu: 38', 1, '2019-05-24 09:02:22');
INSERT INTO `ap_log_action` VALUES (1156, 'system_menu', 'Insert system_menu: 39', 1, '2019-05-24 09:02:25');
INSERT INTO `ap_log_action` VALUES (1157, 'system_menu', 'Insert system_menu: 40', 1, '2019-05-24 09:02:28');
INSERT INTO `ap_log_action` VALUES (1158, 'system_menu', 'Insert system_menu: 41', 1, '2019-05-24 09:02:32');
INSERT INTO `ap_log_action` VALUES (1159, 'system_menu', 'Insert system_menu: 42', 1, '2019-05-24 09:02:36');
INSERT INTO `ap_log_action` VALUES (1160, 'system_menu', 'Insert system_menu: 43', 1, '2019-05-24 09:02:39');
INSERT INTO `ap_log_action` VALUES (1161, 'system_menu', 'Insert system_menu: 44', 1, '2019-05-24 09:02:43');
INSERT INTO `ap_log_action` VALUES (1162, 'system_menu', 'Insert system_menu: 45', 1, '2019-05-24 09:02:51');
INSERT INTO `ap_log_action` VALUES (1163, 'system_menu', 'Update system_menu: 37', 1, '2019-05-24 09:03:29');
INSERT INTO `ap_log_action` VALUES (1164, 'system_menu', 'Insert system_menu: 46', 1, '2019-05-24 09:20:42');
INSERT INTO `ap_log_action` VALUES (1165, 'system_menu', 'Insert system_menu: 47', 1, '2019-05-24 09:21:46');
INSERT INTO `ap_log_action` VALUES (1166, 'system_menu', 'Insert system_menu: 48', 1, '2019-05-24 09:23:02');
INSERT INTO `ap_log_action` VALUES (1167, 'system_menu', 'Insert system_menu: 49', 1, '2019-05-24 09:24:46');
INSERT INTO `ap_log_action` VALUES (1168, 'system_menu', 'Update system_menu: 36', 1, '2019-05-24 09:25:18');
INSERT INTO `ap_log_action` VALUES (1169, 'system_menu', 'Update system_menu: 16', 1, '2019-05-24 09:26:38');
INSERT INTO `ap_log_action` VALUES (1170, 'system_menu', 'Update system_menu: 15', 1, '2019-05-24 09:26:46');
INSERT INTO `ap_log_action` VALUES (1171, 'system_menu', 'Update system_menu: 4', 1, '2019-05-24 09:27:27');
INSERT INTO `ap_log_action` VALUES (1172, 'system_menu', 'Update system_menu: 4', 1, '2019-05-24 09:29:46');
INSERT INTO `ap_log_action` VALUES (1173, 'system_menu', 'Insert system_menu: 51', 1, '2019-05-24 10:10:19');
INSERT INTO `ap_log_action` VALUES (1174, 'system_menu', 'Insert system_menu: 52', 1, '2019-05-24 10:31:58');
INSERT INTO `ap_log_action` VALUES (1175, 'system_menu', 'Insert system_menu: 53', 1, '2019-05-24 10:32:19');
INSERT INTO `ap_log_action` VALUES (1176, 'system_menu', 'Insert system_menu: 54', 1, '2019-05-24 10:33:17');
INSERT INTO `ap_log_action` VALUES (1177, 'system_menu', 'Insert system_menu: 55', 1, '2019-05-24 10:34:21');
INSERT INTO `ap_log_action` VALUES (1178, 'system_menu', 'Insert system_menu: 56', 1, '2019-05-24 10:35:16');
INSERT INTO `ap_log_action` VALUES (1179, 'system_menu', 'Insert system_menu: 57', 1, '2019-05-24 10:35:41');
INSERT INTO `ap_log_action` VALUES (1180, 'system_menu', 'Insert system_menu: 58', 1, '2019-05-24 10:35:58');
INSERT INTO `ap_log_action` VALUES (1181, 'system_menu', 'Insert system_menu: 59', 1, '2019-05-24 10:36:12');
INSERT INTO `ap_log_action` VALUES (1182, 'system_menu', 'Insert system_menu: 60', 1, '2019-05-24 10:36:23');
INSERT INTO `ap_log_action` VALUES (1183, 'type_doc', 'Update type_doc: 2', 1, '2019-05-24 10:38:24');
INSERT INTO `ap_log_action` VALUES (1184, 'type_doc', 'Update type_doc: 4', 1, '2019-05-24 10:38:31');
INSERT INTO `ap_log_action` VALUES (1185, 'type_doc', 'Update type_doc: 5', 1, '2019-05-24 10:38:38');
INSERT INTO `ap_log_action` VALUES (1186, 'type_doc', 'Update type_doc: 6', 1, '2019-05-24 10:38:47');
INSERT INTO `ap_log_action` VALUES (1187, 'type_doc', 'Insert type_doc: 7', 1, '2019-05-24 10:38:56');
INSERT INTO `ap_log_action` VALUES (1188, 'type_doc', 'Insert type_doc: 8', 1, '2019-05-24 10:39:05');
INSERT INTO `ap_log_action` VALUES (1189, 'type_doc', 'Insert type_doc: 9', 1, '2019-05-24 10:39:12');
INSERT INTO `ap_log_action` VALUES (1190, 'type_doc', 'Insert type_doc: 10', 1, '2019-05-24 10:39:20');
INSERT INTO `ap_log_action` VALUES (1191, 'type_doc', 'Insert type_doc: 11', 1, '2019-05-24 10:39:30');
INSERT INTO `ap_log_action` VALUES (1192, 'system_menu', 'Insert system_menu: 61', 1, '2019-05-24 10:41:25');
INSERT INTO `ap_log_action` VALUES (1193, 'users', 'Update users: ', 1, '2019-05-24 01:34:48');
INSERT INTO `ap_log_action` VALUES (1194, 'groups', 'Update groups: 18', 1, '2019-05-24 01:42:18');
INSERT INTO `ap_log_action` VALUES (1195, 'groups', 'Update groups: 17', 1, '2019-05-24 01:42:23');
INSERT INTO `ap_log_action` VALUES (1196, 'groups', 'Update groups: 16', 1, '2019-05-24 01:42:29');
INSERT INTO `ap_log_action` VALUES (1197, 'users', 'delete users: 56', 1, '2019-05-24 01:42:40');
INSERT INTO `ap_log_action` VALUES (1198, 'users', 'delete users: 55', 1, '2019-05-24 01:42:42');
INSERT INTO `ap_log_action` VALUES (1199, 'users', 'delete users: 51', 1, '2019-05-24 01:42:45');
INSERT INTO `ap_log_action` VALUES (1200, 'users', 'delete users: 36', 1, '2019-05-24 01:42:47');
INSERT INTO `ap_log_action` VALUES (1201, 'users', 'delete users: 34', 1, '2019-05-24 01:42:50');
INSERT INTO `ap_log_action` VALUES (1202, 'dm_chuc_vu', 'Insert dm_chuc_vu: 1', 1, '2019-05-29 09:10:00');
INSERT INTO `ap_log_action` VALUES (1203, 'dm_chuc_vu', 'Insert dm_chuc_vu: 2', 1, '2019-05-29 09:13:08');
INSERT INTO `ap_log_action` VALUES (1204, 'dm_chuc_vu', 'Insert dm_chuc_vu: 3', 1, '2019-05-29 09:13:17');
INSERT INTO `ap_log_action` VALUES (1205, 'dm_chuc_vu', 'Insert dm_chuc_vu: 4', 1, '2019-05-29 09:13:27');
INSERT INTO `ap_log_action` VALUES (1206, 'system_menu', 'Update system_menu: 30', 1, '2019-05-29 09:16:30');
INSERT INTO `ap_log_action` VALUES (1207, 'dm_don_vi_tinh', 'Insert dm_don_vi_tinh: 1', 1, '2019-05-29 09:32:36');
INSERT INTO `ap_log_action` VALUES (1208, 'dm_don_vi_tinh', 'Insert dm_don_vi_tinh: 2', 1, '2019-05-29 09:32:44');
INSERT INTO `ap_log_action` VALUES (1209, 'dm_ky_bao_cao', 'Insert dm_ky_bao_cao: 1', 1, '2019-05-29 09:41:29');
INSERT INTO `ap_log_action` VALUES (1210, 'dm_ky_bao_cao', 'Insert dm_ky_bao_cao: 2', 1, '2019-05-29 09:41:34');
INSERT INTO `ap_log_action` VALUES (1211, 'dm_ky_bao_cao', 'Insert dm_ky_bao_cao: 3', 1, '2019-05-29 09:41:41');
INSERT INTO `ap_log_action` VALUES (1212, 'dm_trinh_do', 'Insert dm_trinh_do: 1', 1, '2019-05-29 09:45:30');
INSERT INTO `ap_log_action` VALUES (1213, 'dm_trinh_do', 'Insert dm_trinh_do: 2', 1, '2019-05-29 09:45:37');
INSERT INTO `ap_log_action` VALUES (1214, 'dm_trinh_do', 'Update dm_trinh_do: 1', 1, '2019-05-29 09:46:04');
INSERT INTO `ap_log_action` VALUES (1215, 'dm_trinh_do', 'Update dm_trinh_do: 1', 1, '2019-05-29 09:46:27');
INSERT INTO `ap_log_action` VALUES (1216, 'dm_trinh_do', 'Update dm_trinh_do: 2', 1, '2019-05-29 09:46:38');
INSERT INTO `ap_log_action` VALUES (1217, 'dm_trinh_do', 'Insert dm_trinh_do: 3', 1, '2019-05-29 09:46:44');
INSERT INTO `ap_log_action` VALUES (1218, 'dm_trinh_do', 'Insert dm_trinh_do: 4', 1, '2019-05-29 09:46:50');
INSERT INTO `ap_log_action` VALUES (1219, 'dm_trinh_do', 'Insert dm_trinh_do: 5', 1, '2019-05-29 09:46:58');
INSERT INTO `ap_log_action` VALUES (1220, 'dm_don_vi_hc', 'Update dm_don_vi_hc: 97', 1, '2019-05-29 10:09:13');
INSERT INTO `ap_log_action` VALUES (1221, 'dm_ton_giao', 'Insert dm_ton_giao: 1', 1, '2019-05-29 11:48:51');
INSERT INTO `ap_log_action` VALUES (1222, 'dm_ton_giao', 'Insert dm_ton_giao: 2', 1, '2019-05-29 11:48:58');
INSERT INTO `ap_log_action` VALUES (1223, 'dm_chi_tieu', 'Insert dm_chi_tieu: 1', 1, '2019-05-29 11:51:45');
INSERT INTO `ap_log_action` VALUES (1224, 'dm_chi_tieu', 'Insert dm_chi_tieu: 2', 1, '2019-05-29 11:52:10');
INSERT INTO `ap_log_action` VALUES (1225, 'dm_chi_tieu', 'Insert dm_chi_tieu: 3', 1, '2019-05-29 11:52:20');
INSERT INTO `ap_log_action` VALUES (1226, 'dm_chi_tieu', 'Insert dm_chi_tieu: 4', 1, '2019-05-29 11:52:52');
INSERT INTO `ap_log_action` VALUES (1227, 'dm_chi_tieu', 'Insert dm_chi_tieu: 5', 1, '2019-05-29 02:22:58');
INSERT INTO `ap_log_action` VALUES (1228, 'dm_chi_tieu', 'Insert dm_chi_tieu: 6', 1, '2019-05-29 02:23:23');
INSERT INTO `ap_log_action` VALUES (1229, 'dm_chi_tieu', 'Insert dm_chi_tieu: 7', 1, '2019-05-29 02:23:48');
INSERT INTO `ap_log_action` VALUES (1230, 'dm_chi_tieu', 'Insert dm_chi_tieu: 8', 1, '2019-05-29 02:24:09');
INSERT INTO `ap_log_action` VALUES (1231, 'dm_chi_tieu', 'Insert dm_chi_tieu: 9', 1, '2019-05-29 02:24:26');
INSERT INTO `ap_log_action` VALUES (1232, 'dm_chi_tieu', 'Insert dm_chi_tieu: 10', 1, '2019-05-29 02:24:44');
INSERT INTO `ap_log_action` VALUES (1233, 'dm_chi_tieu', 'Insert dm_chi_tieu: 11', 1, '2019-05-29 02:24:56');
INSERT INTO `ap_log_action` VALUES (1234, 'dm_nhom_tuoi', 'Insert dm_nhom_tuoi: 1', 1, '2019-05-29 03:37:12');
INSERT INTO `ap_log_action` VALUES (1235, 'dm_nhom_tuoi', 'Insert dm_nhom_tuoi: 2', 1, '2019-05-29 03:37:23');
INSERT INTO `ap_log_action` VALUES (1236, 'dm_nhom_tuoi', 'Insert dm_nhom_tuoi: 3', 1, '2019-05-29 03:38:51');
INSERT INTO `ap_log_action` VALUES (1237, 'dm_nhom_tuoi', 'Insert dm_nhom_tuoi: 4', 1, '2019-05-29 03:39:11');
INSERT INTO `ap_log_action` VALUES (1238, 'dm_nhom_tuoi', 'Insert dm_nhom_tuoi: 5', 1, '2019-05-29 03:39:23');
INSERT INTO `ap_log_action` VALUES (1239, 'dm_nhom_tuoi', 'Insert dm_nhom_tuoi: 6', 1, '2019-05-29 03:39:39');
INSERT INTO `ap_log_action` VALUES (1240, 'loai_chi_tieu', 'Insert loai_chi_tieu: 7', 1, '2019-05-29 04:10:30');
INSERT INTO `ap_log_action` VALUES (1241, 'dm_trinh_do', 'Update dm_trinh_do: 2', 1, '2019-05-29 04:12:53');
INSERT INTO `ap_log_action` VALUES (1242, 'doc', 'Update doc: 1', 1, '2019-05-29 04:49:15');
INSERT INTO `ap_log_action` VALUES (1243, 'chi_tieu', 'Update chi_tieu: 00103', 1, '2019-05-30 01:08:08');
INSERT INTO `ap_log_action` VALUES (1244, 'chi_tieu', 'Update chi_tieu: 00102', 1, '2019-05-30 01:08:15');
INSERT INTO `ap_log_action` VALUES (1245, 'system_menu', 'Insert system_menu: 62', 1, '2019-05-30 09:14:45');
INSERT INTO `ap_log_action` VALUES (1246, 'system_menu', 'Insert system_menu: 63', 1, '2019-05-30 09:17:39');
INSERT INTO `ap_log_action` VALUES (1247, 'system_menu', 'Insert system_menu: 64', 1, '2019-05-30 09:18:29');
INSERT INTO `ap_log_action` VALUES (1248, 'system_menu', 'Update system_menu: 37', 1, '2019-05-30 09:25:23');
INSERT INTO `ap_log_action` VALUES (1249, 'system_menu', 'Update system_menu: 37', 1, '2019-05-30 09:26:01');
INSERT INTO `ap_log_action` VALUES (1250, 'doc_groups', 'Insert doc_groups: 1', 1, '2019-05-30 10:21:57');
INSERT INTO `ap_log_action` VALUES (1251, 'doc_groups', 'Insert doc_groups: 2', 1, '2019-05-30 10:22:09');
INSERT INTO `ap_log_action` VALUES (1252, 'system_menu', 'Insert system_menu: 65', 1, '2019-05-30 10:43:40');
INSERT INTO `ap_log_action` VALUES (1253, 'system_menu', 'Insert system_menu: 66', 1, '2019-05-30 10:44:56');
INSERT INTO `ap_log_action` VALUES (1254, 'system_menu', 'Insert system_menu: 67', 1, '2019-05-30 10:59:14');
INSERT INTO `ap_log_action` VALUES (1255, 'bieu_mau', 'Update bieu_mau: 0', 1, '2019-05-30 02:58:56');
INSERT INTO `ap_log_action` VALUES (1256, 'bieu_mau', 'Update bieu_mau: 0', 1, '2019-05-30 02:59:11');
INSERT INTO `ap_log_action` VALUES (1257, 'bieu_mau', 'Insert bieu_mau: 3', 1, '2019-05-30 03:06:24');
INSERT INTO `ap_log_action` VALUES (1258, 'bieu_mau', 'Insert bieu_mau: 4', 1, '2019-05-30 03:09:29');
INSERT INTO `ap_log_action` VALUES (1259, 'users', 'Insert users: 0', 1, '2019-05-30 03:22:00');
INSERT INTO `ap_log_action` VALUES (1260, 'users', 'Insert users: 0', 1, '2019-05-30 03:35:33');
INSERT INTO `ap_log_action` VALUES (1261, 'doc', 'Update doc: 5', 59, '2019-05-30 04:11:43');
INSERT INTO `ap_log_action` VALUES (1262, 'doc', 'Update doc: 5', 59, '2019-05-30 04:11:45');
INSERT INTO `ap_log_action` VALUES (1263, 'bieu_mau', 'Insert bieu_mau: 5', 1, '2019-05-30 04:40:56');
INSERT INTO `ap_log_action` VALUES (1264, 'chi_tieu', 'Update chi_tieu: 00105', 1, '2019-05-30 10:45:09');
INSERT INTO `ap_log_action` VALUES (1265, 'system_menu', 'Update system_menu: 37', 1, '2019-05-30 10:59:03');
INSERT INTO `ap_log_action` VALUES (1266, 'bao_cao', 'Insert bao_cao: 2', 1, '2019-05-31 12:56:02');
INSERT INTO `ap_log_action` VALUES (1267, 'bieu_mau', 'Insert bieu_mau: 6', 1, '2019-05-31 09:13:16');
INSERT INTO `ap_log_action` VALUES (1268, 'bieu_mau', 'Update bieu_mau: 6', 1, '2019-05-31 09:13:41');
INSERT INTO `ap_log_action` VALUES (1269, 'bieu_mau', 'Update bieu_mau: 6', 1, '2019-05-31 09:14:15');
INSERT INTO `ap_log_action` VALUES (1270, 'system_menu', 'Insert system_menu: 68', 1, '2019-05-31 05:19:01');
INSERT INTO `ap_log_action` VALUES (1271, 'system_menu', 'Delete system_menu: 68', 1, '2019-05-31 05:20:07');
INSERT INTO `ap_log_action` VALUES (1272, 'system_menu', 'Insert system_menu: 69', 1, '2019-05-31 05:20:30');
INSERT INTO `ap_log_action` VALUES (1273, 'system_menu', 'Insert system_menu: 70', 1, '2019-05-31 05:21:21');
INSERT INTO `ap_log_action` VALUES (1274, 'system_menu', 'Insert system_menu: 71', 1, '2019-05-31 05:22:07');
INSERT INTO `ap_log_action` VALUES (1275, 'system_menu', 'Delete system_menu: 69', 1, '2019-05-31 05:22:30');
INSERT INTO `ap_log_action` VALUES (1276, 'system_menu', 'Delete system_menu: 69', 1, '2019-05-31 05:22:30');
INSERT INTO `ap_log_action` VALUES (1277, 'system_menu', 'Delete system_menu: 69', 1, '2019-05-31 05:22:30');
INSERT INTO `ap_log_action` VALUES (1278, 'bao_cao', 'Insert bao_cao: 3', 1, '2019-05-31 05:26:05');
INSERT INTO `ap_log_action` VALUES (1279, 'bieu_mau', 'Update bieu_mau: 5', 1, '2019-05-31 05:26:50');
INSERT INTO `ap_log_action` VALUES (1280, 'bao_cao', 'Update bao_cao: 3', 1, '2019-05-31 05:27:08');
INSERT INTO `ap_log_action` VALUES (1281, 'system_menu', 'Delete system_menu: 37', 1, '2019-06-05 02:59:23');
INSERT INTO `ap_log_action` VALUES (1282, 'system_menu', 'Delete system_menu: 2', 1, '2019-06-05 03:01:00');
INSERT INTO `ap_log_action` VALUES (1283, 'system_menu', 'Delete system_menu: 2', 1, '2019-06-05 03:01:00');
INSERT INTO `ap_log_action` VALUES (1284, 'system_menu', 'Delete system_menu: 2', 1, '2019-06-05 03:01:00');
INSERT INTO `ap_log_action` VALUES (1285, 'system_menu', 'Delete system_menu: 2', 1, '2019-06-05 03:01:00');
INSERT INTO `ap_log_action` VALUES (1286, 'system_menu', 'Delete system_menu: 2', 1, '2019-06-05 03:01:00');
INSERT INTO `ap_log_action` VALUES (1287, 'system_menu', 'Delete system_menu: 2', 1, '2019-06-05 03:01:00');
INSERT INTO `ap_log_action` VALUES (1288, 'system_menu', 'Delete system_menu: 17', 1, '2019-06-05 03:01:03');
INSERT INTO `ap_log_action` VALUES (1289, 'system_menu', 'Delete system_menu: 17', 1, '2019-06-05 03:01:03');
INSERT INTO `ap_log_action` VALUES (1290, 'system_menu', 'Delete system_menu: 17', 1, '2019-06-05 03:01:03');
INSERT INTO `ap_log_action` VALUES (1291, 'system_menu', 'Delete system_menu: 17', 1, '2019-06-05 03:01:03');
INSERT INTO `ap_log_action` VALUES (1292, 'system_menu', 'Delete system_menu: 29', 1, '2019-06-05 03:01:05');
INSERT INTO `ap_log_action` VALUES (1293, 'system_menu', 'Delete system_menu: 29', 1, '2019-06-05 03:01:05');
INSERT INTO `ap_log_action` VALUES (1294, 'system_menu', 'Delete system_menu: 29', 1, '2019-06-05 03:01:05');
INSERT INTO `ap_log_action` VALUES (1295, 'system_menu', 'Delete system_menu: 29', 1, '2019-06-05 03:01:05');
INSERT INTO `ap_log_action` VALUES (1296, 'system_menu', 'Delete system_menu: 29', 1, '2019-06-05 03:01:05');
INSERT INTO `ap_log_action` VALUES (1297, 'system_menu', 'Delete system_menu: 29', 1, '2019-06-05 03:01:05');
INSERT INTO `ap_log_action` VALUES (1298, 'system_menu', 'Delete system_menu: 29', 1, '2019-06-05 03:01:05');
INSERT INTO `ap_log_action` VALUES (1299, 'system_menu', 'Delete system_menu: 29', 1, '2019-06-05 03:01:05');
INSERT INTO `ap_log_action` VALUES (1300, 'system_menu', 'Delete system_menu: 29', 1, '2019-06-05 03:01:05');
INSERT INTO `ap_log_action` VALUES (1301, 'system_menu', 'Delete system_menu: 29', 1, '2019-06-05 03:01:05');
INSERT INTO `ap_log_action` VALUES (1302, 'system_menu', 'Delete system_menu: 29', 1, '2019-06-05 03:01:05');
INSERT INTO `ap_log_action` VALUES (1303, 'system_menu', 'Delete system_menu: 29', 1, '2019-06-05 03:01:05');
INSERT INTO `ap_log_action` VALUES (1304, 'system_menu', 'Delete system_menu: 29', 1, '2019-06-05 03:01:05');
INSERT INTO `ap_log_action` VALUES (1305, 'system_menu', 'Delete system_menu: 36', 1, '2019-06-05 03:01:09');
INSERT INTO `ap_log_action` VALUES (1306, 'system_menu', 'Delete system_menu: 36', 1, '2019-06-05 03:01:09');
INSERT INTO `ap_log_action` VALUES (1307, 'system_menu', 'Delete system_menu: 36', 1, '2019-06-05 03:01:09');
INSERT INTO `ap_log_action` VALUES (1308, 'system_menu', 'Delete system_menu: 36', 1, '2019-06-05 03:01:09');
INSERT INTO `ap_log_action` VALUES (1309, 'system_menu', 'Delete system_menu: 36', 1, '2019-06-05 03:01:09');
INSERT INTO `ap_log_action` VALUES (1310, 'system_menu', 'Delete system_menu: 36', 1, '2019-06-05 03:01:09');
INSERT INTO `ap_log_action` VALUES (1311, 'system_menu', 'Delete system_menu: 62', 1, '2019-06-05 03:01:11');
INSERT INTO `ap_log_action` VALUES (1312, 'system_menu', 'Delete system_menu: 62', 1, '2019-06-05 03:01:11');
INSERT INTO `ap_log_action` VALUES (1313, 'system_menu', 'Delete system_menu: 62', 1, '2019-06-05 03:01:11');
INSERT INTO `ap_log_action` VALUES (1314, 'system_menu', 'Delete system_menu: 62', 1, '2019-06-05 03:01:11');
INSERT INTO `ap_log_action` VALUES (1315, 'system_menu', 'Delete system_menu: 65', 1, '2019-06-05 03:01:13');
INSERT INTO `ap_log_action` VALUES (1316, 'system_menu', 'Delete system_menu: 65', 1, '2019-06-05 03:01:13');
INSERT INTO `ap_log_action` VALUES (1317, 'system_menu', 'Delete system_menu: 65', 1, '2019-06-05 03:01:13');
INSERT INTO `ap_log_action` VALUES (1318, 'system_menu', 'Insert system_menu: 68', 1, '2019-06-05 03:02:06');
INSERT INTO `ap_log_action` VALUES (1319, 'system_menu', 'Update system_menu: ', 1, '2019-06-05 03:02:21');
INSERT INTO `ap_log_action` VALUES (1320, 'system_menu', 'Update system_menu: ', 1, '2019-06-05 03:02:25');
INSERT INTO `ap_log_action` VALUES (1321, 'system_menu', 'Insert system_menu: 69', 1, '2019-06-05 03:03:52');
INSERT INTO `ap_log_action` VALUES (1322, 'system_menu', 'Insert system_menu: 70', 1, '2019-06-05 03:04:40');
INSERT INTO `ap_log_action` VALUES (1323, 'system_menu', 'Insert system_menu: 71', 1, '2019-06-05 03:05:23');
INSERT INTO `ap_log_action` VALUES (1324, 'system_menu', 'Insert system_menu: 72', 1, '2019-06-05 03:06:00');
INSERT INTO `ap_log_action` VALUES (1325, 'category', 'Insert category: 108', 1, '2019-06-05 09:04:18');
INSERT INTO `ap_log_action` VALUES (1326, 'post', 'Insert post: 22', 1, '2019-06-05 09:05:36');
INSERT INTO `ap_log_action` VALUES (1327, 'exchange_currency', 'Insert exchange_currency: 21', 1, '2019-06-05 10:07:54');
INSERT INTO `ap_log_action` VALUES (1328, 'exchange_currency', 'Delete exchange_currency: 21', 1, '2019-06-05 10:10:15');
INSERT INTO `ap_log_action` VALUES (1329, 'exchange_currency', 'Insert exchange_currency: 22', 1, '2019-06-05 10:10:52');
INSERT INTO `ap_log_action` VALUES (1330, 'exchange_currency', 'Update exchange_currency: ', 1, '2019-06-05 10:23:48');
INSERT INTO `ap_log_action` VALUES (1331, 'exchange_currency', 'Update exchange_currency: 22', 1, '2019-06-05 10:25:15');
INSERT INTO `ap_log_action` VALUES (1332, 'exchange_currency', 'Update exchange_currency: 22', 1, '2019-06-05 10:25:21');
INSERT INTO `ap_log_action` VALUES (1333, 'exchange_currency', 'Update exchange_currency: 22', 1, '2019-06-05 10:25:36');
INSERT INTO `ap_log_action` VALUES (1334, 'exchange_currency', 'Insert exchange_currency: 23', 1, '2019-06-05 10:31:21');
INSERT INTO `ap_log_action` VALUES (1335, 'exchange_currency', 'Insert exchange_currency: 24', 1, '2019-06-05 10:35:57');
INSERT INTO `ap_log_action` VALUES (1336, 'exchange_currency', 'Insert exchange_currency: 1', 1, '2019-06-05 10:41:53');
INSERT INTO `ap_log_action` VALUES (1337, 'exchange_currency', 'Insert exchange_currency: 25', 1, '2019-06-05 10:41:53');
INSERT INTO `ap_log_action` VALUES (1338, 'exchange_currency', 'Delete exchange_currency: 25', 1, '2019-06-05 10:42:34');
INSERT INTO `ap_log_action` VALUES (1339, 'exchange_currency', 'Insert exchange_currency: 1', 1, '2019-06-05 10:42:48');
INSERT INTO `ap_log_action` VALUES (1340, 'exchange_currency', 'Delete exchange_currency: 24', 1, '2019-06-05 10:42:57');
INSERT INTO `ap_log_action` VALUES (1341, 'exchange_currency', 'Update exchange_currency: 20', 1, '2019-06-05 10:43:41');
INSERT INTO `ap_log_action` VALUES (1342, 'exchange_currency', 'Update exchange_currency: 20', 1, '2019-06-05 10:43:48');
INSERT INTO `ap_log_action` VALUES (1343, 'exchange_currency', 'Delete exchange_currency: 20', 1, '2019-06-05 10:51:39');
INSERT INTO `ap_log_action` VALUES (1344, 'exchange_currency', 'Delete exchange_currency: 21', 1, '2019-06-06 08:43:11');
INSERT INTO `ap_log_action` VALUES (1345, 'exchange_currency', 'Delete exchange_currency: 19', 1, '2019-06-06 08:43:11');
INSERT INTO `ap_log_action` VALUES (1346, 'exchange_currency', 'Delete exchange_currency: 18', 1, '2019-06-06 08:43:12');
INSERT INTO `ap_log_action` VALUES (1347, 'exchange_currency', 'Delete exchange_currency: 17', 1, '2019-06-06 08:43:12');
INSERT INTO `ap_log_action` VALUES (1348, 'exchange_currency', 'Delete exchange_currency: 16', 1, '2019-06-06 08:43:12');
INSERT INTO `ap_log_action` VALUES (1349, 'exchange_currency', 'Delete exchange_currency: 15', 1, '2019-06-06 08:43:12');
INSERT INTO `ap_log_action` VALUES (1350, 'exchange_currency', 'Delete exchange_currency: 14', 1, '2019-06-06 08:43:12');
INSERT INTO `ap_log_action` VALUES (1351, 'exchange_currency', 'Delete exchange_currency: 13', 1, '2019-06-06 08:43:12');
INSERT INTO `ap_log_action` VALUES (1352, 'exchange_currency', 'Delete exchange_currency: 12', 1, '2019-06-06 08:43:12');
INSERT INTO `ap_log_action` VALUES (1353, 'exchange_currency', 'Delete exchange_currency: 11', 1, '2019-06-06 08:43:12');
INSERT INTO `ap_log_action` VALUES (1354, 'exchange_currency', 'Delete exchange_currency: 10', 1, '2019-06-06 08:43:20');
INSERT INTO `ap_log_action` VALUES (1355, 'exchange_currency', 'Delete exchange_currency: 9', 1, '2019-06-06 08:43:20');
INSERT INTO `ap_log_action` VALUES (1356, 'exchange_currency', 'Delete exchange_currency: 8', 1, '2019-06-06 08:43:20');
INSERT INTO `ap_log_action` VALUES (1357, 'exchange_currency', 'Delete exchange_currency: 7', 1, '2019-06-06 08:43:20');
INSERT INTO `ap_log_action` VALUES (1358, 'exchange_currency', 'Delete exchange_currency: 6', 1, '2019-06-06 08:43:20');
INSERT INTO `ap_log_action` VALUES (1359, 'exchange_currency', 'Delete exchange_currency: 5', 1, '2019-06-06 08:43:21');
INSERT INTO `ap_log_action` VALUES (1360, 'exchange_currency', 'Delete exchange_currency: 4', 1, '2019-06-06 08:43:21');
INSERT INTO `ap_log_action` VALUES (1361, 'exchange_currency', 'Delete exchange_currency: 3', 1, '2019-06-06 08:43:21');
INSERT INTO `ap_log_action` VALUES (1362, 'exchange_currency', 'Delete exchange_currency: 2', 1, '2019-06-06 08:43:21');
INSERT INTO `ap_log_action` VALUES (1363, 'exchange_currency', 'Delete exchange_currency: 1', 1, '2019-06-06 08:43:21');
INSERT INTO `ap_log_action` VALUES (1364, 'exchange_currency', 'Delete exchange_currency: 41', 1, '2019-06-06 08:44:49');
INSERT INTO `ap_log_action` VALUES (1365, 'exchange_currency', 'Delete exchange_currency: 40', 1, '2019-06-06 08:44:49');
INSERT INTO `ap_log_action` VALUES (1366, 'exchange_currency', 'Delete exchange_currency: 39', 1, '2019-06-06 08:44:49');
INSERT INTO `ap_log_action` VALUES (1367, 'exchange_currency', 'Delete exchange_currency: 38', 1, '2019-06-06 08:44:50');
INSERT INTO `ap_log_action` VALUES (1368, 'exchange_currency', 'Delete exchange_currency: 37', 1, '2019-06-06 08:44:50');
INSERT INTO `ap_log_action` VALUES (1369, 'exchange_currency', 'Delete exchange_currency: 36', 1, '2019-06-06 08:44:50');
INSERT INTO `ap_log_action` VALUES (1370, 'exchange_currency', 'Delete exchange_currency: 35', 1, '2019-06-06 08:44:50');
INSERT INTO `ap_log_action` VALUES (1371, 'exchange_currency', 'Delete exchange_currency: 34', 1, '2019-06-06 08:44:50');
INSERT INTO `ap_log_action` VALUES (1372, 'exchange_currency', 'Delete exchange_currency: 33', 1, '2019-06-06 08:44:50');
INSERT INTO `ap_log_action` VALUES (1373, 'exchange_currency', 'Delete exchange_currency: 32', 1, '2019-06-06 08:44:50');
INSERT INTO `ap_log_action` VALUES (1374, 'exchange_currency', 'Delete exchange_currency: 31', 1, '2019-06-06 08:44:53');
INSERT INTO `ap_log_action` VALUES (1375, 'exchange_currency', 'Delete exchange_currency: 30', 1, '2019-06-06 08:44:53');
INSERT INTO `ap_log_action` VALUES (1376, 'exchange_currency', 'Delete exchange_currency: 29', 1, '2019-06-06 08:44:54');
INSERT INTO `ap_log_action` VALUES (1377, 'exchange_currency', 'Delete exchange_currency: 28', 1, '2019-06-06 08:44:54');
INSERT INTO `ap_log_action` VALUES (1378, 'exchange_currency', 'Delete exchange_currency: 27', 1, '2019-06-06 08:44:54');
INSERT INTO `ap_log_action` VALUES (1379, 'exchange_currency', 'Delete exchange_currency: 26', 1, '2019-06-06 08:44:54');
INSERT INTO `ap_log_action` VALUES (1380, 'exchange_currency', 'Delete exchange_currency: 25', 1, '2019-06-06 08:44:54');
INSERT INTO `ap_log_action` VALUES (1381, 'exchange_currency', 'Delete exchange_currency: 24', 1, '2019-06-06 08:44:54');
INSERT INTO `ap_log_action` VALUES (1382, 'exchange_currency', 'Delete exchange_currency: 23', 1, '2019-06-06 08:44:54');
INSERT INTO `ap_log_action` VALUES (1383, 'exchange_currency', 'Delete exchange_currency: 22', 1, '2019-06-06 08:44:54');

-- ----------------------------
-- Table structure for ap_login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `ap_login_attempts`;
CREATE TABLE `ap_login_attempts`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ap_menus
-- ----------------------------
DROP TABLE IF EXISTS `ap_menus`;
CREATE TABLE `ap_menus`  (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(75) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `icon` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  `parent_id` int(2) NOT NULL DEFAULT 0,
  `order` tinyint(2) NULL DEFAULT NULL,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `location_id` smallint(4) NOT NULL,
  `language_code` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2577 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_menus
-- ----------------------------
INSERT INTO `ap_menus` VALUES (1399, 'About us', '', 'about-us', 0, 1, '', 2, 'en', 'page');
INSERT INTO `ap_menus` VALUES (1400, 'Products', '', 'products-cp1', 0, 2, '', 2, 'en', 'product');
INSERT INTO `ap_menus` VALUES (1401, 'Catalogue', '', 'collection-cb33', 0, 3, '', 2, 'en', 'project');
INSERT INTO `ap_menus` VALUES (1402, 'Showroom', '', 'showroom', 0, 4, '', 2, 'en', 'other');
INSERT INTO `ap_menus` VALUES (1403, 'Company', '', 'company-c29', 0, 5, '', 2, 'en', 'post');
INSERT INTO `ap_menus` VALUES (2255, 'Sản phẩm', '', 'san-pham-cp40', 0, 1, '', 1, 'en', 'product');
INSERT INTO `ap_menus` VALUES (2256, 'Gạch ốp tường', NULL, 'gach-op-tuong-cp44', 2255, 1, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2257, 'Gạch lát nền', NULL, 'gach-lat-nen-cp43', 2255, 2, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2258, 'Gạch lát viền', NULL, 'gach-lat-vien-cp42', 2255, 3, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2259, 'Gạch ngoại thất', NULL, 'gach-ngoai-that-cp41', 2255, 4, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2260, 'Gạch DECOR', NULL, 'gach-decor-cp39', 2255, 5, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2261, 'Bộ sưu tập', '', 'bo-suu-tap-c33', 0, 2, '', 1, 'en', 'project');
INSERT INTO `ap_menus` VALUES (2262, 'Gạch Euro title', NULL, 'gach-Eurotitle-c32', 2261, 1, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2263, 'Gạch hoa', NULL, 'gach-hoa-c31', 2261, 2, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2264, 'Gạch Uno', NULL, 'gach-uno-c30', 2261, 3, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2265, 'Gạch Signature', NULL, 'gach-signature-c16', 2261, 4, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2266, 'Showroom', '', 'showroom', 0, 3, '', 1, 'en', 'post');
INSERT INTO `ap_menus` VALUES (2267, 'ngoại ngữ', '', 'ngoai-ngu-c47', 0, 4, '', 1, 'en', 'post');
INSERT INTO `ap_menus` VALUES (2268, 'Công ty', '', 'cong-ty-c29', 0, 5, '', 1, 'en', 'video');
INSERT INTO `ap_menus` VALUES (2269, 'Thông tin công ty', NULL, 'thong-tin-cong-ty-c25', 2268, 1, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2270, 'Sự kiện', NULL, 'su-kien-c26', 2268, 2, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2271, 'Thông tin cổ đông', NULL, 'thong-tin-co-dong-c27', 2268, 3, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2272, 'Profile', NULL, 'profile-c28', 2268, 4, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2273, 'E-Office', NULL, 'http://viglaceratienson.com:8080', 2268, 5, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2274, 'lập trình', NULL, 'lap-trinh-c46', 2268, 6, '', 1, 'en', NULL);
INSERT INTO `ap_menus` VALUES (2275, 'Liên hệ', '', 'lien-he', 0, 6, '', 1, 'en', 'page');
INSERT INTO `ap_menus` VALUES (2558, 'Giới thiệu', '', 'kowon.vn', 0, 1, 'url', 1, 'vi', '');
INSERT INTO `ap_menus` VALUES (2559, 'Thông tin công ty', NULL, 'thong-tin-cong-ty', 2558, 1, '', 1, 'vi', NULL);
INSERT INTO `ap_menus` VALUES (2560, 'Tin tức', NULL, 'tin-tuc-c48', 2558, 2, '', 1, 'vi', NULL);
INSERT INTO `ap_menus` VALUES (2561, 'Sự kiện', NULL, 'su-kien-c49', 2558, 3, '', 1, 'vi', NULL);
INSERT INTO `ap_menus` VALUES (2562, 'Sản phẩm', '', 'san-pham-cp40', 0, 2, '', 1, 'vi', '');
INSERT INTO `ap_menus` VALUES (2563, 'Dự án', '', 'du-an-cb50', 0, 3, '', 1, 'vi', '');
INSERT INTO `ap_menus` VALUES (2564, 'Công trình thương mại', NULL, 'cong-trinh-thuong-mai-cb53', 2563, 1, '', 1, 'vi', NULL);
INSERT INTO `ap_menus` VALUES (2565, 'Công trình công cộng', NULL, 'cong-trinh-cong-cong-cb52', 2563, 2, '', 1, 'vi', NULL);
INSERT INTO `ap_menus` VALUES (2566, 'Chung cư nhà ở', NULL, 'chung-cu-nha-o-cb51', 2563, 3, '', 1, 'vi', NULL);
INSERT INTO `ap_menus` VALUES (2567, 'Thư viện', '', 'thu-vien', 0, 4, '', 1, 'vi', '');
INSERT INTO `ap_menus` VALUES (2568, 'Phân phối', '', 'phan-phoi', 0, 5, '', 1, 'vi', '');
INSERT INTO `ap_menus` VALUES (2569, 'E-catalog', '', 'ecatalog', 0, 6, '', 1, 'vi', '');
INSERT INTO `ap_menus` VALUES (2570, 'Liên hệ', '', 'kowon.vn', 0, 7, 'url', 1, 'vi', '');
INSERT INTO `ap_menus` VALUES (2571, 'giới thiệu', '', 'gioi-thieu', 0, 1, '', 2, 'vi', 'page');
INSERT INTO `ap_menus` VALUES (2572, 'Điều khoản sử dụng', '', 'dieu-khoan-su-dung', 0, 2, '', 2, 'vi', 'page');
INSERT INTO `ap_menus` VALUES (2573, 'Quy chế hoạt động', '', 'quy-che-hoat-dong', 0, 3, '', 2, 'vi', 'page');
INSERT INTO `ap_menus` VALUES (2574, 'Chính sách bảo mật', '', 'chinh-sach-bao-mat', 0, 4, '', 2, 'vi', 'page');
INSERT INTO `ap_menus` VALUES (2575, 'Tin tức', '', 'tin-tuc-c48', 0, 1, '', 3, 'vi', 'post');
INSERT INTO `ap_menus` VALUES (2576, 'News', '', 'new-c48', 0, 1, '', 3, 'en', 'post');

-- ----------------------------
-- Table structure for ap_newsletter
-- ----------------------------
DROP TABLE IF EXISTS `ap_newsletter`;
CREATE TABLE `ap_newsletter`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_time` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `ap_newsletter_email_uindex`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_newsletter
-- ----------------------------
INSERT INTO `ap_newsletter` VALUES (1, 'aa@gmail.com', '2018-05-23 10:57:07');
INSERT INTO `ap_newsletter` VALUES (3, 'steven.mucian@gmail.com', '2018-05-23 11:39:54');
INSERT INTO `ap_newsletter` VALUES (7, 'maianh.apecsoft@gmail.com', '2018-05-28 11:13:46');
INSERT INTO `ap_newsletter` VALUES (8, 'maianh.crmviet@gmail.com', '2018-05-28 12:01:00');
INSERT INTO `ap_newsletter` VALUES (9, 'askeyh3t@gmail.com', '2018-06-06 09:49:32');
INSERT INTO `ap_newsletter` VALUES (10, 'lenganvcu96ht@gmail.com', '2018-07-30 01:23:59');
INSERT INTO `ap_newsletter` VALUES (22, 'nguyenminhcuong2@luvina.net', '2019-02-14 19:28:34');

-- ----------------------------
-- Table structure for ap_page
-- ----------------------------
DROP TABLE IF EXISTS `ap_page`;
CREATE TABLE `ap_page`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `style` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `banner` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_status` tinyint(1) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'trang thai',
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time_thanhlap` datetime(0) NOT NULL,
  `displayed_time` datetime(0) NOT NULL COMMENT 'ngay publish',
  `created_time` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT 'ngay tao',
  `updated_time` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'ngay sua',
  `album` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `block` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_page
-- ----------------------------
INSERT INTO `ap_page` VALUES (2, 0, 'contact', 'prf-banner.jpg', 'prf-banner.jpg', 1, NULL, '2019-06-05 19:19:45', '2019-06-05 19:20:34', '2019-01-07 14:46:38', '2019-06-05 19:20:35', NULL, NULL);
INSERT INTO `ap_page` VALUES (7, 0, '', '', '', 1, NULL, '2019-06-12 19:19:50', '2019-06-05 19:20:37', '2019-01-24 11:25:55', '2019-06-05 19:20:38', NULL, NULL);
INSERT INTO `ap_page` VALUES (8, 0, '', '', '', 1, NULL, '2019-06-05 19:20:01', '2019-06-05 19:20:39', '2019-01-24 11:26:20', '2019-06-05 19:20:40', NULL, NULL);
INSERT INTO `ap_page` VALUES (9, 0, '', '', '', 1, NULL, '2019-06-05 19:20:05', '2019-06-05 19:20:41', '2019-01-24 11:26:37', '2019-06-05 19:20:41', NULL, NULL);
INSERT INTO `ap_page` VALUES (10, 0, '', '', '', 1, NULL, '2019-06-05 19:20:09', '2019-06-05 19:20:42', '2019-01-24 11:26:55', '2019-06-05 19:20:43', NULL, NULL);
INSERT INTO `ap_page` VALUES (11, 0, '', '', '', 1, NULL, '2019-06-05 19:20:12', '2019-06-05 19:20:45', '2019-02-17 16:30:08', '2019-06-05 19:20:49', NULL, NULL);
INSERT INTO `ap_page` VALUES (12, 0, 'special', '', '', 1, NULL, '2019-06-05 19:20:29', '2019-06-05 19:20:50', '2019-02-25 14:48:21', '2019-06-05 19:20:52', NULL, NULL);

-- ----------------------------
-- Table structure for ap_page_translations
-- ----------------------------
DROP TABLE IF EXISTS `ap_page_translations`;
CREATE TABLE `ap_page_translations`  (
  `id` int(11) NULL DEFAULT NULL,
  `language_code` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `file_timeline` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content_more` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `meta_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_description` varchar(170) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  UNIQUE INDEX `ap_page_translations_id_language_code_pk`(`id`, `language_code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ap_post
-- ----------------------------
DROP TABLE IF EXISTS `ap_post`;
CREATE TABLE `ap_post`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_crawler` int(11) NULL DEFAULT NULL,
  `category_product` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'NULL' COMMENT 'List ID cate product',
  `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `album` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `url_video` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_status` tinyint(2) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'trang thai',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `displayed_time` date NOT NULL COMMENT 'ngay publish',
  `program` tinyint(1) NOT NULL DEFAULT 0,
  `number` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  `viewed` bigint(20) NOT NULL DEFAULT 0,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Partime/fulltime',
  `type_career` int(5) NULL DEFAULT NULL COMMENT 'Loại hình làm việc',
  `level` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Trình độ',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Địa điểm làm việc',
  `address_career` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Chi nhánh',
  `expiration_time` date NOT NULL,
  `created_time` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT 'ngay tao',
  `updated_time` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'ngay sua',
  `files` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `salary` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_post
-- ----------------------------
INSERT INTO `ap_post` VALUES (19, NULL, 'NULL', 'news-home4.jpg', NULL, '', 0, 0, '2019-06-05', 0, '1', 0, NULL, NULL, NULL, NULL, NULL, '2019-06-05', '2018-10-21 16:15:42', '2019-06-05 19:22:04', NULL, NULL, NULL);
INSERT INTO `ap_post` VALUES (21, NULL, 'NULL', 'news-home4.jpg', NULL, '', 1, 0, '2019-06-05', 0, '1', 0, NULL, NULL, NULL, NULL, NULL, '2019-06-05', '2018-10-25 15:59:41', '2019-06-05 19:22:07', NULL, NULL, NULL);
INSERT INTO `ap_post` VALUES (22, NULL, 'NULL', '', NULL, NULL, 1, 0, '0000-00-00', 0, '', 0, NULL, NULL, NULL, '', NULL, '0000-00-00', '2019-06-05 21:05:36', '2019-06-05 21:05:36', '', '', '');

-- ----------------------------
-- Table structure for ap_post_category
-- ----------------------------
DROP TABLE IF EXISTS `ap_post_category`;
CREATE TABLE `ap_post_category`  (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`, `category_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_post_category
-- ----------------------------
INSERT INTO `ap_post_category` VALUES (19, 48);
INSERT INTO `ap_post_category` VALUES (21, 48);
INSERT INTO `ap_post_category` VALUES (22, 49);
INSERT INTO `ap_post_category` VALUES (22, 108);
INSERT INTO `ap_post_category` VALUES (23, 49);
INSERT INTO `ap_post_category` VALUES (24, 48);
INSERT INTO `ap_post_category` VALUES (26, 48);
INSERT INTO `ap_post_category` VALUES (27, 49);
INSERT INTO `ap_post_category` VALUES (27, 107);
INSERT INTO `ap_post_category` VALUES (33, 48);
INSERT INTO `ap_post_category` VALUES (33, 49);
INSERT INTO `ap_post_category` VALUES (34, 48);
INSERT INTO `ap_post_category` VALUES (35, 48);
INSERT INTO `ap_post_category` VALUES (35, 107);
INSERT INTO `ap_post_category` VALUES (36, 48);
INSERT INTO `ap_post_category` VALUES (38, 48);
INSERT INTO `ap_post_category` VALUES (39, 107);
INSERT INTO `ap_post_category` VALUES (40, 69);
INSERT INTO `ap_post_category` VALUES (41, 67);
INSERT INTO `ap_post_category` VALUES (42, 1);
INSERT INTO `ap_post_category` VALUES (43, 1);
INSERT INTO `ap_post_category` VALUES (43, 107);

-- ----------------------------
-- Table structure for ap_post_translations
-- ----------------------------
DROP TABLE IF EXISTS `ap_post_translations`;
CREATE TABLE `ap_post_translations`  (
  `id` int(11) NULL DEFAULT NULL,
  `language_code` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `content_more` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `meta_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_description` varchar(170) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  UNIQUE INDEX `ap_post_translations_id_language_code_pk`(`id`, `language_code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_post_translations
-- ----------------------------
INSERT INTO `ap_post_translations` VALUES (22, 'vi', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', '<p>aaaaaaaaaaaaaaaaaaaaaaaa</p>', NULL, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaâaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaa');
INSERT INTO `ap_post_translations` VALUES (22, 'en', 'aa', 'aaaaaa', 'aaaaa', '<p>aaaa</p>', NULL, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaa');

-- ----------------------------
-- Table structure for ap_system_menu
-- ----------------------------
DROP TABLE IF EXISTS `ap_system_menu`;
CREATE TABLE `ap_system_menu`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `text` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `icon` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `href` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '#',
  `controller` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `parent_id` int(4) NOT NULL DEFAULT 0,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order` int(4) NULL DEFAULT NULL,
  `target` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 73 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_system_menu
-- ----------------------------
INSERT INTO `ap_system_menu` VALUES (1, 'Bảng điều khiển', 'fa fa-dashboard', '#', NULL, 0, '', 30, NULL);
INSERT INTO `ap_system_menu` VALUES (68, 'Quản lý thành viên', 'fa fa-users', '#', NULL, 0, 'treeview', 29, '_self');
INSERT INTO `ap_system_menu` VALUES (69, 'Danh sách nhóm', 'fa fa-users', 'groups', 'groups', 68, '', 0, '_self');
INSERT INTO `ap_system_menu` VALUES (70, 'Danh sách thành viên', 'fa fa-user', 'users', 'users', 68, '', 0, '_self');
INSERT INTO `ap_system_menu` VALUES (71, 'Quản lý khách hàng', 'fa fa-user', 'account', 'account', 68, '', 0, '_self');
INSERT INTO `ap_system_menu` VALUES (72, 'Quản trị nội dung', 'fa fa-newspaper-o', '#', NULL, 0, 'treeview', 28, '_self');

-- ----------------------------
-- Table structure for ap_users
-- ----------------------------
DROP TABLE IF EXISTS `ap_users`;
CREATE TABLE `ap_users`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `salt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `thumbnail_small` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activation_code` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_code` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED NULL DEFAULT NULL,
  `remember_code` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `active` tinyint(1) UNSIGNED NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_login` int(11) UNSIGNED NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_users
-- ----------------------------
INSERT INTO `ap_users` VALUES (1, '127.0.0.1', 'admin', 'admin', 'admin', 'Đinh Văn Khương', 'admin@gmail.com', '0973683037', '$2y$08$c5IudzkRxJHzdNpVpv3kMue3SSi.AcVkgARsIQBKeXQjklckmIOz2', '', 'author.jpg', NULL, 'Năm 1998', '', NULL, NULL, NULL, 1268889823, 1, NULL, 1559785281, '2019-01-31 17:30:53', '2017-12-17 00:49:09');
INSERT INTO `ap_users` VALUES (59, '14.177.235.179', 'vnpt', 'vnpt', 'vnpt', NULL, 'admin@vnpt.vn', '0970709700', '$2y$08$blG8UQvv0WiI.I87t6MsEeonWmBAG8m6Ry3ac/7E1vmd4/NnXgT12', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1559205333, 1, NULL, 1559221690, NULL, NULL);

-- ----------------------------
-- Table structure for ap_users_groups
-- ----------------------------
DROP TABLE IF EXISTS `ap_users_groups`;
CREATE TABLE `ap_users_groups`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `uc_users_groups`(`user_id`, `group_id`) USING BTREE,
  INDEX `fk_users_groups_users1_idx`(`user_id`) USING BTREE,
  INDEX `fk_users_groups_groups1_idx`(`group_id`) USING BTREE,
  CONSTRAINT `ap_users_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `ap_groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `ap_users_groups_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `ap_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 215 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ap_users_groups
-- ----------------------------
INSERT INTO `ap_users_groups` VALUES (1, 1, 1);
INSERT INTO `ap_users_groups` VALUES (214, 59, 1);

SET FOREIGN_KEY_CHECKS = 1;
