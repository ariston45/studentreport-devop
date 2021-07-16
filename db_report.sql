/*
 Navicat Premium Data Transfer

 Source Server         : Development
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : db_report

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 16/07/2021 15:27:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tnt_acad_years
-- ----------------------------
DROP TABLE IF EXISTS `tnt_acad_years`;
CREATE TABLE `tnt_acad_years`  (
  `aca_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aca_tnt_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ach_years` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ach_status` enum('AKTIF','NONAKTIF') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`aca_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_acad_years
-- ----------------------------
INSERT INTO `tnt_acad_years` VALUES ('a.1', 'TNT.1', 'Tahun Ajaran 2020/2021', 'AKTIF');
INSERT INTO `tnt_acad_years` VALUES ('a.2', 'TNT.2', 'Tahun Ajaran 2020/2021', 'AKTIF');
INSERT INTO `tnt_acad_years` VALUES ('a.3', 'TNT.3', 'Tahun Ajaran 2020/2021', 'AKTIF');
INSERT INTO `tnt_acad_years` VALUES ('a.4', 'TNT.4', 'Tahun Ajaran 2020/2021', 'AKTIF');
INSERT INTO `tnt_acad_years` VALUES ('a.5', 'TNT.1', 'Tahun Ajaran 2021/2022', 'NONAKTIF');
INSERT INTO `tnt_acad_years` VALUES ('a.6', 'TNT.1', 'Tahun Ajaran 2022/2023', 'NONAKTIF');

-- ----------------------------
-- Table structure for tnt_assesment_category
-- ----------------------------
DROP TABLE IF EXISTS `tnt_assesment_category`;
CREATE TABLE `tnt_assesment_category`  (
  `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_acad_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cat_category_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cat_formula_asses` varchar(455) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cat_value_form` enum('ANGKA','HURUF') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cat_month_start` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cat_month_end` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cat_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_assesment_category
-- ----------------------------
INSERT INTO `tnt_assesment_category` VALUES (1, 'a.1', 'Evaluasi Tengah Semester Satu', '($var1+$var2)/2', NULL, NULL, NULL);
INSERT INTO `tnt_assesment_category` VALUES (2, 'a.1', 'Evaluasi Semester Satu', NULL, NULL, NULL, NULL);
INSERT INTO `tnt_assesment_category` VALUES (3, 'a.1', 'Evaluasi Tengah Semester Dua', NULL, NULL, NULL, NULL);
INSERT INTO `tnt_assesment_category` VALUES (4, 'a.1', 'Evaluasi Semester Dua', NULL, NULL, NULL, NULL);
INSERT INTO `tnt_assesment_category` VALUES (10, 'a.5', 'Evaluasi Tengah Semester Satu', NULL, 'HURUF', 'July 2021', 'August 2022');
INSERT INTO `tnt_assesment_category` VALUES (11, 'a.5', 'Evaluasi Semester Satu', NULL, 'ANGKA', 'July 2021', 'August 2022');
INSERT INTO `tnt_assesment_category` VALUES (12, 'a.5', 'Evaluasi Tengah Semester Dua', NULL, 'HURUF', 'July 2021', 'August 2022');
INSERT INTO `tnt_assesment_category` VALUES (13, 'a.5', 'Evaluasi Semester Dua', NULL, 'ANGKA', 'July 2021', 'August 2022');
INSERT INTO `tnt_assesment_category` VALUES (14, 'a.6', 'Evaluasi Tengah Semester Satu', NULL, 'HURUF', 'April 2022', 'December 2023');
INSERT INTO `tnt_assesment_category` VALUES (15, 'a.6', 'Evaluasi Semester Satu', NULL, 'ANGKA', 'April 2022', 'December 2023');
INSERT INTO `tnt_assesment_category` VALUES (16, 'a.6', 'Evaluasi Tengah Semester Dua', NULL, 'HURUF', 'April 2022', 'December 2023');
INSERT INTO `tnt_assesment_category` VALUES (17, 'a.6', 'Evaluasi Semester Dua', NULL, 'ANGKA', 'April 2022', 'December 2023');

-- ----------------------------
-- Table structure for tnt_assesment_reference
-- ----------------------------
DROP TABLE IF EXISTS `tnt_assesment_reference`;
CREATE TABLE `tnt_assesment_reference`  (
  `asp_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `asp_id_asses` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `asp_range` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `asp_huruf` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`asp_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_assesment_reference
-- ----------------------------

-- ----------------------------
-- Table structure for tnt_class
-- ----------------------------
DROP TABLE IF EXISTS `tnt_class`;
CREATE TABLE `tnt_class`  (
  `cls_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cls_id_major` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cls_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cls_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_class
-- ----------------------------
INSERT INTO `tnt_class` VALUES ('cls.1', 'm.1', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.10', 'm.10', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.11', 'm.10', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.12', 'm.10', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.13', 'm.11', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.14', 'm.11', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.15', 'm.11', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.16', 'm.11', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.17', 'm.11', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.18', 'm.11', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.19', 'm.12', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.2', 'm.1', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.20', 'm.12', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.21', 'm.12', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.22', 'm.12', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.23', 'm.12', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.24', 'm.12', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.25', 'm.13', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.26', 'm.13', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.27', 'm.13', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.28', 'm.13', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.29', 'm.13', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.3', 'm.1', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.30', 'm.13', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.31', 'm.14', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.32', 'm.14', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.33', 'm.14', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.34', 'm.14', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.35', 'm.14', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.36', 'm.14', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.37', 'm.15', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.38', 'm.15', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.39', 'm.15', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.4', 'm.1', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.40', 'm.15', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.41', 'm.15', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.42', 'm.15', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.43', 'm.2', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.44', 'm.2', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.45', 'm.2', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.46', 'm.2', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.47', 'm.2', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.48', 'm.2', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.49', 'm.3', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.5', 'm.1', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.50', 'm.3', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.51', 'm.3', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.52', 'm.3', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.53', 'm.3', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.54', 'm.3', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.55', 'm.4', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.56', 'm.4', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.57', 'm.4', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.58', 'm.4', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.59', 'm.4', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.6', 'm.1', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.60', 'm.4', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.61', 'm.5', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.62', 'm.5', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.63', 'm.5', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.64', 'm.5', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.65', 'm.5', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.66', 'm.5', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.67', 'm.6', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.68', 'm.6', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.69', 'm.6', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.7', 'm.10', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.70', 'm.6', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.71', 'm.6', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.72', 'm.6', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.73', 'm.7', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.74', 'm.7', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.75', 'm.7', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.76', 'm.7', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.77', 'm.7', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.78', 'm.7', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.79', 'm.8', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.8', 'm.10', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.80', 'm.8', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.81', 'm.8', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.82', 'm.8', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.83', 'm.8', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.84', 'm.8', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.85', 'm.9', 'Kelas 1A');
INSERT INTO `tnt_class` VALUES ('cls.86', 'm.9', 'Kelas 1B');
INSERT INTO `tnt_class` VALUES ('cls.87', 'm.9', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.88', 'm.9', 'Kelas 2A');
INSERT INTO `tnt_class` VALUES ('cls.89', 'm.9', 'Kelas 2B');
INSERT INTO `tnt_class` VALUES ('cls.9', 'm.10', 'Kelas 1C');
INSERT INTO `tnt_class` VALUES ('cls.90', 'm.9', 'Kelas 2C');
INSERT INTO `tnt_class` VALUES ('cls.91', 'cls.16', 'Kelas 1');
INSERT INTO `tnt_class` VALUES ('cls.92', 'm.1', 'Kelas 6A');

-- ----------------------------
-- Table structure for tnt_fixdata_asses
-- ----------------------------
DROP TABLE IF EXISTS `tnt_fixdata_asses`;
CREATE TABLE `tnt_fixdata_asses`  (
  `fds_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fds_cat_id` int(11) NULL DEFAULT NULL,
  `fds_aca_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fds_class` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fds_std_number` int(11) NOT NULL,
  `fds_subject_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fds_score` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`fds_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_fixdata_asses
-- ----------------------------
INSERT INTO `tnt_fixdata_asses` VALUES ('fds.0', 0, '#', '#', 0, '#', '#');
INSERT INTO `tnt_fixdata_asses` VALUES ('fds.13', 1, 'a.1', 'cls.92', 1, 'sub.1', '60');
INSERT INTO `tnt_fixdata_asses` VALUES ('fds.14', 1, 'a.1', 'cls.92', 2, 'sub.1', '95');
INSERT INTO `tnt_fixdata_asses` VALUES ('fds.15', 1, 'a.1', 'cls.92', 3, 'sub.1', '82.5');
INSERT INTO `tnt_fixdata_asses` VALUES ('fds.16', 1, 'a.1', 'cls.92', 4, 'sub.1', '85');
INSERT INTO `tnt_fixdata_asses` VALUES ('fds.5', 1, 'a.1', 'cls.92', 1, 'sub.17', '60');
INSERT INTO `tnt_fixdata_asses` VALUES ('fds.6', 1, 'a.1', 'cls.92', 2, 'sub.17', '95');
INSERT INTO `tnt_fixdata_asses` VALUES ('fds.7', 1, 'a.1', 'cls.92', 3, 'sub.17', '82.5');
INSERT INTO `tnt_fixdata_asses` VALUES ('fds.8', 1, 'a.1', 'cls.92', 4, 'sub.17', '85');

-- ----------------------------
-- Table structure for tnt_majors
-- ----------------------------
DROP TABLE IF EXISTS `tnt_majors`;
CREATE TABLE `tnt_majors`  (
  `mo_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mo_tnt_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mo_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`mo_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_majors
-- ----------------------------
INSERT INTO `tnt_majors` VALUES ('cls.16', 'MGNT', 'Test Jurusan');
INSERT INTO `tnt_majors` VALUES ('m.1', 'TNT.1', 'EAST');
INSERT INTO `tnt_majors` VALUES ('m.10', 'TNT.4', 'Teknik Komputer Jaringan');
INSERT INTO `tnt_majors` VALUES ('m.11', 'TNT.4', 'Teknik Mesin');
INSERT INTO `tnt_majors` VALUES ('m.12', 'TNT.4', 'Kesehatan Masyarakat');
INSERT INTO `tnt_majors` VALUES ('m.13', 'TNT.4', 'Tata Boga');
INSERT INTO `tnt_majors` VALUES ('m.14', 'TNT.4', 'Pelayaran');
INSERT INTO `tnt_majors` VALUES ('m.15', 'TNT.4', 'Kelautan');
INSERT INTO `tnt_majors` VALUES ('m.2', 'TNT.1', 'WEST');
INSERT INTO `tnt_majors` VALUES ('m.3', 'TNT.2', 'Pendidikan');
INSERT INTO `tnt_majors` VALUES ('m.4', 'TNT.3', 'IPA');
INSERT INTO `tnt_majors` VALUES ('m.5', 'TNT.3', 'IPS');
INSERT INTO `tnt_majors` VALUES ('m.6', 'TNT.3', 'Akselerasi');
INSERT INTO `tnt_majors` VALUES ('m.7', 'TNT.4', 'Akuntansi Perkantoran');
INSERT INTO `tnt_majors` VALUES ('m.8', 'TNT.4', 'Management');
INSERT INTO `tnt_majors` VALUES ('m.9', 'TNT.4', 'Sistem Informasi');

-- ----------------------------
-- Table structure for tnt_rawdata_assesment
-- ----------------------------
DROP TABLE IF EXISTS `tnt_rawdata_assesment`;
CREATE TABLE `tnt_rawdata_assesment`  (
  `raw_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `raw_years_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_cat_id` int(11) NOT NULL,
  `raw_mapel` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_class_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_stu_num` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_score` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_point` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_feedback` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_ass_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`raw_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 89 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_rawdata_assesment
-- ----------------------------
INSERT INTO `tnt_rawdata_assesment` VALUES (73, 'a.1', 1, 'sub.17', 'cls.92', '1', 'muridsatu@yafilev.onmicrosoft.com', 'Quis Bahasa Inggris Pertemuan 1', '100', '40', NULL, 'var1');
INSERT INTO `tnt_rawdata_assesment` VALUES (74, 'a.1', 1, 'sub.17', 'cls.92', '2', 'muriddua@yafilev.onmicrosoft.com', 'Quis Bahasa Inggris Pertemuan 1', '100', '100', NULL, 'var1');
INSERT INTO `tnt_rawdata_assesment` VALUES (75, 'a.1', 1, 'sub.17', 'cls.92', '3', 'muridtiga@yafilev.onmicrosoft.com', 'Quis Bahasa Inggris Pertemuan 1', '100', '80', NULL, 'var1');
INSERT INTO `tnt_rawdata_assesment` VALUES (76, 'a.1', 1, 'sub.17', 'cls.92', '4', 'muridempat@yafilev.onmicrosoft.com', 'Quis Bahasa Inggris Pertemuan 1', '100', '80', NULL, 'var1');
INSERT INTO `tnt_rawdata_assesment` VALUES (77, 'a.1', 1, 'sub.17', 'cls.92', '1', 'muridsatu@yafilev.onmicrosoft.com', 'Tugas Pertemuan Satu Bahasa Inggriss', '100', '80', NULL, 'var2');
INSERT INTO `tnt_rawdata_assesment` VALUES (78, 'a.1', 1, 'sub.17', 'cls.92', '2', 'muriddua@yafilev.onmicrosoft.com', 'Tugas Pertemuan Satu Bahasa Inggriss', '100', '90', NULL, 'var2');
INSERT INTO `tnt_rawdata_assesment` VALUES (79, 'a.1', 1, 'sub.17', 'cls.92', '3', 'muridtiga@yafilev.onmicrosoft.com', 'Tugas Pertemuan Satu Bahasa Inggriss', '100', '85', NULL, 'var2');
INSERT INTO `tnt_rawdata_assesment` VALUES (80, 'a.1', 1, 'sub.17', 'cls.92', '4', 'muridempat@yafilev.onmicrosoft.com', 'Tugas Pertemuan Satu Bahasa Inggriss', '100', '90', NULL, 'var2');
INSERT INTO `tnt_rawdata_assesment` VALUES (81, 'a.1', 1, 'sub.1', 'cls.92', '1', 'muridsatu@yafilev.onmicrosoft.com', 'Quis Bahasa Inggris Pertemuan 1', '100', '40', NULL, 'var1');
INSERT INTO `tnt_rawdata_assesment` VALUES (82, 'a.1', 1, 'sub.1', 'cls.92', '2', 'muriddua@yafilev.onmicrosoft.com', 'Quis Bahasa Inggris Pertemuan 1', '100', '100', NULL, 'var1');
INSERT INTO `tnt_rawdata_assesment` VALUES (83, 'a.1', 1, 'sub.1', 'cls.92', '3', 'muridtiga@yafilev.onmicrosoft.com', 'Quis Bahasa Inggris Pertemuan 1', '100', '80', NULL, 'var1');
INSERT INTO `tnt_rawdata_assesment` VALUES (84, 'a.1', 1, 'sub.1', 'cls.92', '4', 'muridempat@yafilev.onmicrosoft.com', 'Quis Bahasa Inggris Pertemuan 1', '100', '80', NULL, 'var1');
INSERT INTO `tnt_rawdata_assesment` VALUES (85, 'a.1', 1, 'sub.1', 'cls.92', '1', 'muridsatu@yafilev.onmicrosoft.com', 'Tugas Pertemuan Satu Bahasa Inggriss', '100', '80', NULL, 'var2');
INSERT INTO `tnt_rawdata_assesment` VALUES (86, 'a.1', 1, 'sub.1', 'cls.92', '2', 'muriddua@yafilev.onmicrosoft.com', 'Tugas Pertemuan Satu Bahasa Inggriss', '100', '90', NULL, 'var2');
INSERT INTO `tnt_rawdata_assesment` VALUES (87, 'a.1', 1, 'sub.1', 'cls.92', '3', 'muridtiga@yafilev.onmicrosoft.com', 'Tugas Pertemuan Satu Bahasa Inggriss', '100', '85', NULL, 'var2');
INSERT INTO `tnt_rawdata_assesment` VALUES (88, 'a.1', 1, 'sub.1', 'cls.92', '4', 'muridempat@yafilev.onmicrosoft.com', 'Tugas Pertemuan Satu Bahasa Inggriss', '100', '90', NULL, 'var2');

-- ----------------------------
-- Table structure for tnt_school
-- ----------------------------
DROP TABLE IF EXISTS `tnt_school`;
CREATE TABLE `tnt_school`  (
  `sch_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sch_tnt_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sch_level` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_address` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_phone` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_website` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_social_media` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_logo` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_longtime_learning` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`sch_id`, `sch_tnt_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_school
-- ----------------------------
INSERT INTO `tnt_school` VALUES ('MGNT', '###', '###', 'TRUST Academic Solution', 'Surabaya', '###', '130', '###', '###', 'picture', 0);
INSERT INTO `tnt_school` VALUES ('TNT.1', '0217f29f0744ce6361d81919ae26117a', 'SD', 'Sekolah Nusantara', 'Surabaya', 'sn@snusantara.sch.id', '130', 'www.sekolah-nusantara.com', '@scha', 'picture', 6);
INSERT INTO `tnt_school` VALUES ('TNT.2', '963f543bdec98109b5f20f8f9f99db0c', 'SMP', 'Sekolah PGRI', 'Surabaya', 'sg@spgri.com', '130', 'www.sekolah-pgri.com', '@sekg', 'picture', 3);
INSERT INTO `tnt_school` VALUES ('TNT.3', 'a0cf13a358cba1790c61e6cbec313f2f', 'SMA', 'Sekolah Muhammadiyah', 'Surabaya', 'sm@smuh.com', '130', 'www.sekolah-muhammadiyah.com', '@skm', 'picture', 3);
INSERT INTO `tnt_school` VALUES ('TNT.4', '1b5063a8e72da815b5a96b9f8d6130ce', 'SMK', 'Sekolah Katholik', 'Surabaya', 'sk@skat.com', '130', 'www.sekolah-katholik.com', '@skk', 'picture', 3);

-- ----------------------------
-- Table structure for tnt_student
-- ----------------------------
DROP TABLE IF EXISTS `tnt_student`;
CREATE TABLE `tnt_student`  (
  `stu_num` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stu_tnt_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stu_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stu_fullname` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stu_email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stu_id_parents` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stu_birthplace` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stu_birthday` date NULL DEFAULT NULL,
  `stu_gender` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stu_class` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`stu_num`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 97 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_student
-- ----------------------------
INSERT INTO `tnt_student` VALUES (1, 'TNT.1', '10087', 'student1', 'muridsatu@yafilev.onmicrosoft.com', '4', NULL, NULL, NULL, 'cls.92');
INSERT INTO `tnt_student` VALUES (2, 'TNT.1', '10088', 'student2', 'muriddua@yafilev.onmicrosoft.com', '4', NULL, NULL, NULL, 'cls.92');
INSERT INTO `tnt_student` VALUES (3, 'TNT.1', '11256', 'student3', 'muridtiga@yafilev.onmicrosoft.com', '4', NULL, NULL, NULL, 'cls.92');
INSERT INTO `tnt_student` VALUES (4, 'TNT.1', '11245', 'student4', 'muridempat@yafilev.onmicrosoft.com', '4', NULL, NULL, NULL, 'cls.92');
INSERT INTO `tnt_student` VALUES (5, 'TNT.1', '11246', 'Roni', 'muridlima@yafilev.onmicrosoft.com', '4', NULL, NULL, NULL, 'cls.92');
INSERT INTO `tnt_student` VALUES (6, 'TNT.1', '11223', 'student6', NULL, '4', NULL, NULL, NULL, 'cls.6');
INSERT INTO `tnt_student` VALUES (7, 'TNT.4', '11278', 'student7', NULL, '4', NULL, NULL, NULL, 'cls.7');
INSERT INTO `tnt_student` VALUES (8, 'TNT.4', '11267', 'student8', NULL, '4', NULL, NULL, NULL, 'cls.8');
INSERT INTO `tnt_student` VALUES (9, 'TNT.4', '11256', 'student9', NULL, '4', NULL, NULL, NULL, 'cls.9');
INSERT INTO `tnt_student` VALUES (10, 'TNT.4', '11245', 'student10', NULL, '4', NULL, NULL, NULL, 'cls.10');
INSERT INTO `tnt_student` VALUES (11, 'TNT.4', '11234', 'student11', NULL, '4', NULL, NULL, NULL, 'cls.11');
INSERT INTO `tnt_student` VALUES (12, 'TNT.4', '11223', 'student12', NULL, '4', NULL, NULL, NULL, 'cls.12');
INSERT INTO `tnt_student` VALUES (13, 'TNT.4', '11278', 'student13', NULL, '4', NULL, NULL, NULL, 'cls.13');
INSERT INTO `tnt_student` VALUES (14, 'TNT.4', '11267', 'student14', NULL, '4', NULL, NULL, NULL, 'cls.14');
INSERT INTO `tnt_student` VALUES (15, 'TNT.4', '11256', 'student15', NULL, '4', NULL, NULL, NULL, 'cls.15');
INSERT INTO `tnt_student` VALUES (16, 'TNT.4', '11245', 'student16', NULL, '4', NULL, NULL, NULL, 'cls.16');
INSERT INTO `tnt_student` VALUES (17, 'TNT.4', '11234', 'student17', NULL, '4', NULL, NULL, NULL, 'cls.17');
INSERT INTO `tnt_student` VALUES (18, 'TNT.4', '11223', 'student18', NULL, '4', NULL, NULL, NULL, 'cls.18');
INSERT INTO `tnt_student` VALUES (19, 'TNT.4', '11278', 'student19', NULL, '4', NULL, NULL, NULL, 'cls.19');
INSERT INTO `tnt_student` VALUES (20, 'TNT.4', '11267', 'student20', NULL, '4', NULL, NULL, NULL, 'cls.20');
INSERT INTO `tnt_student` VALUES (21, 'TNT.4', '11256', 'student21', NULL, '4', NULL, NULL, NULL, 'cls.21');
INSERT INTO `tnt_student` VALUES (22, 'TNT.4', '11245', 'student22', NULL, '4', NULL, NULL, NULL, 'cls.22');
INSERT INTO `tnt_student` VALUES (23, 'TNT.4', '11234', 'student23', NULL, '4', NULL, NULL, NULL, 'cls.23');
INSERT INTO `tnt_student` VALUES (24, 'TNT.4', '11223', 'student24', NULL, '4', NULL, NULL, NULL, 'cls.24');
INSERT INTO `tnt_student` VALUES (25, 'TNT.4', '11278', 'student25', NULL, '4', NULL, NULL, NULL, 'cls.25');
INSERT INTO `tnt_student` VALUES (26, 'TNT.4', '11267', 'student26', NULL, '4', NULL, NULL, NULL, 'cls.26');
INSERT INTO `tnt_student` VALUES (27, 'TNT.4', '11256', 'student27', NULL, '4', NULL, NULL, NULL, 'cls.27');
INSERT INTO `tnt_student` VALUES (28, 'TNT.4', '11245', 'student28', NULL, '4', NULL, NULL, NULL, 'cls.28');
INSERT INTO `tnt_student` VALUES (29, 'TNT.4', '11234', 'student29', NULL, '4', NULL, NULL, NULL, 'cls.29');
INSERT INTO `tnt_student` VALUES (30, 'TNT.4', '11223', 'student30', NULL, '4', NULL, NULL, NULL, 'cls.30');
INSERT INTO `tnt_student` VALUES (31, 'TNT.4', '11278', 'student31', NULL, '4', NULL, NULL, NULL, 'cls.31');
INSERT INTO `tnt_student` VALUES (32, 'TNT.4', '11267', 'student32', NULL, '4', NULL, NULL, NULL, 'cls.32');
INSERT INTO `tnt_student` VALUES (33, 'TNT.4', '11256', 'student33', NULL, '4', NULL, NULL, NULL, 'cls.33');
INSERT INTO `tnt_student` VALUES (34, 'TNT.4', '11245', 'student34', NULL, '4', NULL, NULL, NULL, 'cls.34');
INSERT INTO `tnt_student` VALUES (35, 'TNT.4', '11234', 'student35', NULL, '4', NULL, NULL, NULL, 'cls.35');
INSERT INTO `tnt_student` VALUES (36, 'TNT.4', '11223', 'student36', NULL, '4', NULL, NULL, NULL, 'cls.36');
INSERT INTO `tnt_student` VALUES (37, 'TNT.4', '11278', 'student37', NULL, '4', NULL, NULL, NULL, 'cls.37');
INSERT INTO `tnt_student` VALUES (38, 'TNT.4', '11267', 'student38', NULL, '4', NULL, NULL, NULL, 'cls.38');
INSERT INTO `tnt_student` VALUES (39, 'TNT.4', '11256', 'student39', NULL, '4', NULL, NULL, NULL, 'cls.39');
INSERT INTO `tnt_student` VALUES (40, 'TNT.4', '11245', 'student40', NULL, '4', NULL, NULL, NULL, 'cls.40');
INSERT INTO `tnt_student` VALUES (41, 'TNT.4', '11234', 'student41', NULL, '4', NULL, NULL, NULL, 'cls.41');
INSERT INTO `tnt_student` VALUES (42, 'TNT.4', '11223', 'student42', NULL, '4', NULL, NULL, NULL, 'cls.42');
INSERT INTO `tnt_student` VALUES (43, 'TNT.1', '11278', 'student43', NULL, '4', NULL, NULL, NULL, 'cls.43');
INSERT INTO `tnt_student` VALUES (44, 'TNT.1', '11267', 'student44', NULL, '4', NULL, NULL, NULL, 'cls.44');
INSERT INTO `tnt_student` VALUES (45, 'TNT.1', '11256', 'student45', NULL, '4', NULL, NULL, NULL, 'cls.45');
INSERT INTO `tnt_student` VALUES (46, 'TNT.1', '11245', 'student46', NULL, '4', NULL, NULL, NULL, 'cls.46');
INSERT INTO `tnt_student` VALUES (47, 'TNT.1', '11234', 'student47', NULL, '4', NULL, NULL, NULL, 'cls.47');
INSERT INTO `tnt_student` VALUES (48, 'TNT.1', '11223', 'student48', NULL, '4', NULL, NULL, NULL, 'cls.48');
INSERT INTO `tnt_student` VALUES (49, 'TNT.2', '11278', 'student49', NULL, '4', NULL, NULL, NULL, 'cls.49');
INSERT INTO `tnt_student` VALUES (50, 'TNT.2', '11267', 'student50', NULL, '4', NULL, NULL, NULL, 'cls.50');
INSERT INTO `tnt_student` VALUES (51, 'TNT.2', '11256', 'student51', NULL, '4', NULL, NULL, NULL, 'cls.51');
INSERT INTO `tnt_student` VALUES (52, 'TNT.2', '11245', 'student52', NULL, '4', NULL, NULL, NULL, 'cls.52');
INSERT INTO `tnt_student` VALUES (53, 'TNT.2', '11234', 'student53', NULL, '4', NULL, NULL, NULL, 'cls.53');
INSERT INTO `tnt_student` VALUES (54, 'TNT.2', '11223', 'student54', NULL, '4', NULL, NULL, NULL, 'cls.54');
INSERT INTO `tnt_student` VALUES (55, 'TNT.3', '11278', 'student55', NULL, '4', NULL, NULL, NULL, 'cls.55');
INSERT INTO `tnt_student` VALUES (56, 'TNT.3', '11267', 'student56', NULL, '4', NULL, NULL, NULL, 'cls.56');
INSERT INTO `tnt_student` VALUES (57, 'TNT.3', '11256', 'student57', NULL, '4', NULL, NULL, NULL, 'cls.57');
INSERT INTO `tnt_student` VALUES (58, 'TNT.3', '11245', 'student58', NULL, '4', NULL, NULL, NULL, 'cls.58');
INSERT INTO `tnt_student` VALUES (59, 'TNT.3', '11234', 'student59', NULL, '4', NULL, NULL, NULL, 'cls.59');
INSERT INTO `tnt_student` VALUES (60, 'TNT.3', '11223', 'student60', NULL, '4', NULL, NULL, NULL, 'cls.60');
INSERT INTO `tnt_student` VALUES (61, 'TNT.3', '11278', 'student61', NULL, '4', NULL, NULL, NULL, 'cls.61');
INSERT INTO `tnt_student` VALUES (62, 'TNT.3', '11267', 'student62', NULL, '4', NULL, NULL, NULL, 'cls.62');
INSERT INTO `tnt_student` VALUES (63, 'TNT.3', '11256', 'student63', NULL, '4', NULL, NULL, NULL, 'cls.63');
INSERT INTO `tnt_student` VALUES (64, 'TNT.3', '11245', 'student64', NULL, '4', NULL, NULL, NULL, 'cls.64');
INSERT INTO `tnt_student` VALUES (65, 'TNT.3', '11234', 'student65', NULL, '4', NULL, NULL, NULL, 'cls.65');
INSERT INTO `tnt_student` VALUES (66, 'TNT.3', '11223', 'student66', NULL, '4', NULL, NULL, NULL, 'cls.66');
INSERT INTO `tnt_student` VALUES (67, 'TNT.3', '11278', 'student67', NULL, '4', NULL, NULL, NULL, 'cls.67');
INSERT INTO `tnt_student` VALUES (68, 'TNT.3', '11267', 'student68', NULL, '4', NULL, NULL, NULL, 'cls.68');
INSERT INTO `tnt_student` VALUES (69, 'TNT.3', '11256', 'student69', NULL, '4', NULL, NULL, NULL, 'cls.69');
INSERT INTO `tnt_student` VALUES (70, 'TNT.3', '11245', 'student70', NULL, '4', NULL, NULL, NULL, 'cls.70');
INSERT INTO `tnt_student` VALUES (71, 'TNT.3', '11234', 'student71', NULL, '4', NULL, NULL, NULL, 'cls.71');
INSERT INTO `tnt_student` VALUES (72, 'TNT.3', '11223', 'student72', NULL, '4', NULL, NULL, NULL, 'cls.72');
INSERT INTO `tnt_student` VALUES (73, 'TNT.4', '11278', 'student73', NULL, '4', NULL, NULL, NULL, 'cls.73');
INSERT INTO `tnt_student` VALUES (74, 'TNT.4', '11267', 'student74', NULL, '4', NULL, NULL, NULL, 'cls.74');
INSERT INTO `tnt_student` VALUES (75, 'TNT.4', '11256', 'student75', NULL, '4', NULL, NULL, NULL, 'cls.75');
INSERT INTO `tnt_student` VALUES (76, 'TNT.4', '11245', 'student76', NULL, '4', NULL, NULL, NULL, 'cls.76');
INSERT INTO `tnt_student` VALUES (77, 'TNT.4', '11234', 'student77', NULL, '4', NULL, NULL, NULL, 'cls.77');
INSERT INTO `tnt_student` VALUES (78, 'TNT.4', '11223', 'student78', NULL, '4', NULL, NULL, NULL, 'cls.78');
INSERT INTO `tnt_student` VALUES (79, 'TNT.4', '11278', 'student79', NULL, '4', NULL, NULL, NULL, 'cls.79');
INSERT INTO `tnt_student` VALUES (80, 'TNT.4', '11267', 'student80', NULL, '4', NULL, NULL, NULL, 'cls.80');
INSERT INTO `tnt_student` VALUES (81, 'TNT.4', '11256', 'student81', NULL, '4', NULL, NULL, NULL, 'cls.81');
INSERT INTO `tnt_student` VALUES (82, 'TNT.4', '11245', 'student82', NULL, '4', NULL, NULL, NULL, 'cls.82');
INSERT INTO `tnt_student` VALUES (83, 'TNT.4', '11234', 'student83', NULL, '4', NULL, NULL, NULL, 'cls.83');
INSERT INTO `tnt_student` VALUES (84, 'TNT.4', '11223', 'student84', NULL, '4', NULL, NULL, NULL, 'cls.84');
INSERT INTO `tnt_student` VALUES (85, 'TNT.4', '11278', 'student85', NULL, '4', NULL, NULL, NULL, 'cls.85');
INSERT INTO `tnt_student` VALUES (86, 'TNT.4', '11267', 'student86', NULL, '4', NULL, NULL, NULL, 'cls.86');
INSERT INTO `tnt_student` VALUES (87, 'TNT.4', '11256', 'student87', NULL, '4', NULL, NULL, NULL, 'cls.87');
INSERT INTO `tnt_student` VALUES (88, 'TNT.4', '11245', 'student88', NULL, '4', NULL, NULL, NULL, 'cls.88');
INSERT INTO `tnt_student` VALUES (89, 'TNT.4', '11234', 'student89', NULL, '4', NULL, NULL, NULL, 'cls.89');
INSERT INTO `tnt_student` VALUES (90, 'TNT.4', '11223', 'student90', NULL, '4', NULL, NULL, NULL, 'cls.90');
INSERT INTO `tnt_student` VALUES (91, 'TNT.1', '68911', 'aris', 'aris.gmail.com', '29', 'Trenggalek', '1992-05-04', 'Laki-laki', 'cls.47');
INSERT INTO `tnt_student` VALUES (92, 'TNT.1', '68912', 'nano', 'nano.gmail.com', '30', 'Trenggalek', '1992-05-05', 'Laki-laki', 'cls.47');
INSERT INTO `tnt_student` VALUES (93, 'TNT.1', '68913', 'jimi', 'jimi.gmail.com', '31', 'Trenggalek', '1992-05-06', 'Laki-laki', 'cls.47');
INSERT INTO `tnt_student` VALUES (94, 'TNT.1', '68914', 'gonu', 'gonu.gmail.com', '32', 'Trenggalek', '1992-05-07', 'Laki-laki', 'cls.47');
INSERT INTO `tnt_student` VALUES (95, 'TNT.1', '68915', 'dude', 'dude.gmail.com', '33', 'Trenggalek', '1992-05-08', 'Laki-laki', 'cls.47');
INSERT INTO `tnt_student` VALUES (96, 'TNT.1', '68916', 'han', 'han.gmail.com', '34', 'Trenggalek', '1992-05-09', 'Laki-laki', 'cls.47');

-- ----------------------------
-- Table structure for tnt_subject
-- ----------------------------
DROP TABLE IF EXISTS `tnt_subject`;
CREATE TABLE `tnt_subject`  (
  `suc_subject_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `suc_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `suc_level` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `suc_tnt_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`suc_subject_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_subject
-- ----------------------------
INSERT INTO `tnt_subject` VALUES ('sub.1', 'Matematika Dasar 2', 'Tingkat_2', 'TNT.1');
INSERT INTO `tnt_subject` VALUES ('sub.10', 'Ilmu Komputer', 'Tingkat_1', 'TNT.4');
INSERT INTO `tnt_subject` VALUES ('sub.11', 'Matematika Teknik', 'Tingkat_1', 'TNT.4');
INSERT INTO `tnt_subject` VALUES ('sub.12', 'Fisika lanjut', 'Tingkat_1', 'TNT.3');
INSERT INTO `tnt_subject` VALUES ('sub.13', 'Geografi', 'Tingkat_1', 'TNT.3');
INSERT INTO `tnt_subject` VALUES ('sub.14', 'Teknik Dasar Pelayaran', 'Tingkat_1', 'TNT.4');
INSERT INTO `tnt_subject` VALUES ('sub.15', 'Pengembangan Hayati', 'Tingkat_1', 'TNT.4');
INSERT INTO `tnt_subject` VALUES ('sub.16', 'Pendidikan Kewarganegaraan', 'Tingkat_1', 'tnt.1');
INSERT INTO `tnt_subject` VALUES ('sub.17', 'Bahasa Inggris', 'Tingkat_6', 'TNT.1');
INSERT INTO `tnt_subject` VALUES ('sub.19', 'Matematika Dasar 1', 'Tingkat_1', 'TNT.1');
INSERT INTO `tnt_subject` VALUES ('sub.2', 'Bahasa Indonesia', 'Tingkat_1', 'TNT.1');
INSERT INTO `tnt_subject` VALUES ('sub.3', 'Ekonomi', 'Tingkat_1', 'TNT.2');
INSERT INTO `tnt_subject` VALUES ('sub.4', 'Fisika', 'Tingkat_1', 'TNT.2');
INSERT INTO `tnt_subject` VALUES ('sub.5', 'Geologi', 'Tingkat_1', 'TNT.2');
INSERT INTO `tnt_subject` VALUES ('sub.6', 'Fisika Terapan', 'Tingkat_1', 'TNT.4');
INSERT INTO `tnt_subject` VALUES ('sub.7', 'Akuntansi Dasar', 'Tingkat_1', 'TNT.2');
INSERT INTO `tnt_subject` VALUES ('sub.8', 'Ekonomi Dasar', 'Tingkat_1', 'TNT.2');
INSERT INTO `tnt_subject` VALUES ('sub.9', 'Pemrograman Dasar', 'Tingkat_1', 'TNT.4');

-- ----------------------------
-- Table structure for tnt_subject_asses
-- ----------------------------
DROP TABLE IF EXISTS `tnt_subject_asses`;
CREATE TABLE `tnt_subject_asses`  (
  `ass_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ass_subject_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ass_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ass_percentage` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ass_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_subject_asses
-- ----------------------------

-- ----------------------------
-- Table structure for tnt_teach_detail
-- ----------------------------
DROP TABLE IF EXISTS `tnt_teach_detail`;
CREATE TABLE `tnt_teach_detail`  (
  `ted_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ted_tch_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ted_subject_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ted_class_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ted_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_teach_detail
-- ----------------------------
INSERT INTO `tnt_teach_detail` VALUES (0, NULL, NULL, NULL);
INSERT INTO `tnt_teach_detail` VALUES (9, '8', 'sub.1', 'cls.1');
INSERT INTO `tnt_teach_detail` VALUES (10, '8', 'sub.2', 'cls.1');
INSERT INTO `tnt_teach_detail` VALUES (11, '9', 'sub.3', 'cls.13');
INSERT INTO `tnt_teach_detail` VALUES (12, '9', 'sub.3', 'cls.14');
INSERT INTO `tnt_teach_detail` VALUES (13, '9', 'sub.3', 'cls.15');
INSERT INTO `tnt_teach_detail` VALUES (14, '10', 'sub.12', 'cls.19');
INSERT INTO `tnt_teach_detail` VALUES (15, '10', 'sub.12', 'cls.20');
INSERT INTO `tnt_teach_detail` VALUES (16, '10', 'sub.12', 'cls.21');
INSERT INTO `tnt_teach_detail` VALUES (17, '11', 'sub.10', 'cls.49');
INSERT INTO `tnt_teach_detail` VALUES (18, '11', 'sub.10', 'cls.50');
INSERT INTO `tnt_teach_detail` VALUES (19, '11', 'sub.10', 'cls.51');
INSERT INTO `tnt_teach_detail` VALUES (20, '12', 'sub.11', 'cls.61');
INSERT INTO `tnt_teach_detail` VALUES (21, '12', 'sub.11', 'cls.62');
INSERT INTO `tnt_teach_detail` VALUES (22, '12', 'sub.11', 'cls.63');
INSERT INTO `tnt_teach_detail` VALUES (23, '13', 'sub.14', 'cls.79');
INSERT INTO `tnt_teach_detail` VALUES (24, '13', 'sub.14', 'cls.80');
INSERT INTO `tnt_teach_detail` VALUES (25, '13', 'sub.14', 'cls.81');
INSERT INTO `tnt_teach_detail` VALUES (26, '11', 'sub.15', 'cls.85');
INSERT INTO `tnt_teach_detail` VALUES (27, '11', 'sub.15', 'cls.86');
INSERT INTO `tnt_teach_detail` VALUES (28, '11', 'sub.15', 'cls.87');
INSERT INTO `tnt_teach_detail` VALUES (29, '12', 'sub.6', 'cls.61');
INSERT INTO `tnt_teach_detail` VALUES (30, '12', 'sub.6', 'cls.62');
INSERT INTO `tnt_teach_detail` VALUES (31, '12', 'sub.6', 'cls.63');
INSERT INTO `tnt_teach_detail` VALUES (32, '13', 'sub.9', 'cls.49');
INSERT INTO `tnt_teach_detail` VALUES (33, '13', 'sub.9', 'cls.50');
INSERT INTO `tnt_teach_detail` VALUES (34, '13', 'sub.9', 'cls.51');

-- ----------------------------
-- Table structure for tnt_teacher
-- ----------------------------
DROP TABLE IF EXISTS `tnt_teacher`;
CREATE TABLE `tnt_teacher`  (
  `num_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tch_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tch_tnt_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`num_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 91 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_teacher
-- ----------------------------
INSERT INTO `tnt_teacher` VALUES (0, '', NULL);
INSERT INTO `tnt_teacher` VALUES (1, '8', 'TNT.1');
INSERT INTO `tnt_teacher` VALUES (3, '11', 'TNT.4');
INSERT INTO `tnt_teacher` VALUES (4, '12', 'TNT.4');
INSERT INTO `tnt_teacher` VALUES (5, '13', 'TNT.4');
INSERT INTO `tnt_teacher` VALUES (8, '8', 'TNT.1');
INSERT INTO `tnt_teacher` VALUES (9, '9', 'TNT.2');
INSERT INTO `tnt_teacher` VALUES (10, '10', 'TNT.3');

-- ----------------------------
-- Table structure for tnt_variable
-- ----------------------------
DROP TABLE IF EXISTS `tnt_variable`;
CREATE TABLE `tnt_variable`  (
  `var_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `var_tnt_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `var_code` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `var_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`var_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_variable
-- ----------------------------
INSERT INTO `tnt_variable` VALUES (1, 'TNT.1', 'var1', 'Quiz1');
INSERT INTO `tnt_variable` VALUES (2, 'TNT.1', 'var2', 'Tugas');
INSERT INTO `tnt_variable` VALUES (3, 'TNT.1', 'var3', 'Ulangan Mid Semester');
INSERT INTO `tnt_variable` VALUES (5, 'TNT.1', 'var4', 'data');
INSERT INTO `tnt_variable` VALUES (6, 'TNT.1', 'var5', 'ulangan');
INSERT INTO `tnt_variable` VALUES (7, 'TNT.1', 'var6', 'ulangan harian 1');
INSERT INTO `tnt_variable` VALUES (8, 'TNT.1', 'var7', 'Quiz');
INSERT INTO `tnt_variable` VALUES (9, 'TNT.1', 'var8', 'Quiz');
INSERT INTO `tnt_variable` VALUES (10, 'TNT.1', 'var9', 'Quiz 1');
INSERT INTO `tnt_variable` VALUES (11, 'TNT.1', 'var10', 'ulangan harian');
INSERT INTO `tnt_variable` VALUES (12, 'TNT.1', 'var11', 'ulangan ');
INSERT INTO `tnt_variable` VALUES (13, 'TNT.1', 'var12', 'qw');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_rules_access` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_id_access` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `u_password` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`u_id`, `u_email`) USING BTREE,
  UNIQUE INDEX `u_email`(`u_email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Trust Marketing', 'MGNT_MARKETING', 'MGNT', 'suny@gmail.com', '123');
INSERT INTO `user` VALUES (2, 'Super Admin', 'MGNT_SUPERADMIN', 'MGNT', 'superadmin@gmail.com', '123');
INSERT INTO `user` VALUES (3, 'Trust Admin', 'MGNT_ADMIN', 'MGNT', 'trustadmin@gmail.com', '123');
INSERT INTO `user` VALUES (4, 'Suneo q', 'TNT_PARENT', 'TNT.1', 'suneo@gmail.com', '123');
INSERT INTO `user` VALUES (5, 'Kepsek', 'TNT_SUPERADMIN', 'TNT.1', 'kepsek@gmail.com', '123');
INSERT INTO `user` VALUES (6, 'Guru', 'TNT_TEACHER', 'TNT.1', 'guru@gmail.com', '123');
INSERT INTO `user` VALUES (7, 'Admin Sekolah', 'TNT_ADMIN', 'TNT.1', 'adminsek@gmail.com', '123');
INSERT INTO `user` VALUES (8, 'Bapak Mulyono', 'TNT_TEACHER', 'TNT.1', 'Mulyono@gmail.com', '123');
INSERT INTO `user` VALUES (9, 'Bapak Farid', 'TNT_TEACHER', 'TNT.2', 'Farid@gmail.com', '123');
INSERT INTO `user` VALUES (10, 'Bapak Hadi', 'TNT_TEACHER', 'TNT.3', 'Hadi@gmail.com', '123');
INSERT INTO `user` VALUES (11, 'Bapak Syamsul', 'TNT_TEACHER', 'TNT.4', 'Syamsul@gmail.com', '123');
INSERT INTO `user` VALUES (12, 'Bapak Rudi', 'TNT_TEACHER', 'TNT.4', 'Rudi@gmail.com', '123');
INSERT INTO `user` VALUES (13, 'Bapak Hartono', 'TNT_TEACHER', 'TNT.4', 'Hartono@gmail.com', '123');
INSERT INTO `user` VALUES (14, 'Paul', 'TNT_PARENT', 'TNT.1', 'Paul@gmail.com', '581999');
INSERT INTO `user` VALUES (15, 'Nirina', 'TNT_PARENT', 'TNT.1', 'nirina@gmail.com', '09051999');
INSERT INTO `user` VALUES (16, 'Wijayanto', 'TNT_PARENT', 'TNT.1', 'wijayanto@gmail.com', '04051999');
INSERT INTO `user` VALUES (17, 'Nikmah', 'TNT_PARENT', 'TNT.1', 'nikmah@gmail.com', '05051999');
INSERT INTO `user` VALUES (18, 'Alan', 'TNT_PARENT', 'TNT.1', 'alan@gmail.com', '06051999');
INSERT INTO `user` VALUES (19, 'Samijan', 'TNT_PARENT', 'TNT.1', 'Samijan@gmail.com', '07051999');
INSERT INTO `user` VALUES (20, 'James', 'TNT_SUPERADMIN', 'TNT.1', 'ex@gmail.com', '123');
INSERT INTO `user` VALUES (21, 'james', 'TNT_SUPERADMIN', 'TNT.1', 'james@gmail.com', '123');
INSERT INTO `user` VALUES (22, 'Andi', 'MGNT_SUPERADMIN', 'MGNT', 'andi@gmail.com', '123');

-- ----------------------------
-- Table structure for user_meta
-- ----------------------------
DROP TABLE IF EXISTS `user_meta`;
CREATE TABLE `user_meta`  (
  `u_num` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `u_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_fullname` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_address` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_phone` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_scnd_email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_job_position` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`u_num`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_meta
-- ----------------------------
INSERT INTO `user_meta` VALUES (7, '1', 'Trust Marketing', 'Surabaya', '+62085267890044', NULL, 'Marketing');
INSERT INTO `user_meta` VALUES (8, '2', 'Super Admin', 'Surabaya', '+62085267890044', NULL, 'Developer');
INSERT INTO `user_meta` VALUES (9, '3', 'Trust Admin', 'Surabaya', '+62085267890044', NULL, 'Admin');
INSERT INTO `user_meta` VALUES (10, '4', 'Suneo q', 'Surabaya', '+62085267890044', NULL, 'Wali Murid');
INSERT INTO `user_meta` VALUES (11, '5', 'Kepsek', 'Surabaya', '+62085267890044', NULL, 'Kepala Sekolah');
INSERT INTO `user_meta` VALUES (12, '6', 'Guru', 'Surabaya', '+62085267890044', NULL, 'Guru');
INSERT INTO `user_meta` VALUES (13, '7', 'Admin Sekolah', 'Surabaya', '+62085267890044', NULL, 'Admin');
INSERT INTO `user_meta` VALUES (14, '8', 'Bapak Mulyono', 'Surabaya', '+62085267890044', NULL, 'Guru');
INSERT INTO `user_meta` VALUES (15, '9', 'Bapak Farid', 'Surabaya', '+62085267890044', NULL, 'Guru');
INSERT INTO `user_meta` VALUES (16, '10', 'Bapak Hadi', 'Surabaya', '+62085267890044', NULL, 'Guru');
INSERT INTO `user_meta` VALUES (17, '11', 'Bapak Syamsul', 'Surabaya', '+62085267890044', NULL, 'Guru');
INSERT INTO `user_meta` VALUES (18, '12', 'Bapak Rudi', 'Surabaya', '+62085267890044', NULL, 'Guru');
INSERT INTO `user_meta` VALUES (19, '13', 'Bapak Hartono', 'Surabaya', '+62085267890044', NULL, 'Guru');
INSERT INTO `user_meta` VALUES (20, '14', 'Paul', 'Surabaya', '+62085267890044', NULL, 'Wali Murid');
INSERT INTO `user_meta` VALUES (21, '15', 'Nirina', 'Surabaya', '+62085267890044', NULL, 'Wali Murid');
INSERT INTO `user_meta` VALUES (22, '16', 'Wijayanto', 'Surabaya', '+62085267890044', NULL, 'Wali Murid');
INSERT INTO `user_meta` VALUES (23, '17', 'Nikmah', 'Surabaya', '+62085267890044', NULL, 'Wali Murid');
INSERT INTO `user_meta` VALUES (24, '18', 'Alan', 'Surabaya', '+62085267890044', NULL, 'Wali Murid');
INSERT INTO `user_meta` VALUES (25, '19', 'Samijan', 'Surabaya', '+62085267890044', NULL, 'Wali Murid');
INSERT INTO `user_meta` VALUES (26, '20', 'James', '12', '12', '0', 'sat');
INSERT INTO `user_meta` VALUES (27, '21', 'james', 'arthur', '08567', '0', 'staff');
INSERT INTO `user_meta` VALUES (28, '22', 'Andi', 'surabaya', '45', '0', 'staff');

SET FOREIGN_KEY_CHECKS = 1;
