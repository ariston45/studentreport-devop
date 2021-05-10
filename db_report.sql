/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : db_report

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 10/05/2021 08:02:23
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
  PRIMARY KEY (`aca_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_acad_years
-- ----------------------------
INSERT INTO `tnt_acad_years` VALUES ('a.1', 'TNT.1', 'thn. 2020/2021');
INSERT INTO `tnt_acad_years` VALUES ('a.2', 'TNT.2', 'thn. 2020/2021');
INSERT INTO `tnt_acad_years` VALUES ('a.3', 'TNT.3', 'thn. 2020/2021');
INSERT INTO `tnt_acad_years` VALUES ('a.4', 'TNT.4', 'thn. 2020/2021');

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

-- ----------------------------
-- Table structure for tnt_fixdata_asses
-- ----------------------------
DROP TABLE IF EXISTS `tnt_fixdata_asses`;
CREATE TABLE `tnt_fixdata_asses`  (
  `fds_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fds_std_number` int NOT NULL,
  `fds_subject_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fds_aca_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fds_score` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fds_class` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`fds_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_fixdata_asses
-- ----------------------------

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
  `raw_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `raw_stu_num` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_score` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_point` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_feedback` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `raw_ass_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`raw_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_rawdata_assesment
-- ----------------------------

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
  `sch_longtime_learning` int NULL DEFAULT NULL,
  PRIMARY KEY (`sch_id`, `sch_tnt_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_school
-- ----------------------------
INSERT INTO `tnt_school` VALUES ('TNT.1', '0217f29f0744ce6361d81919ae26117a', 'SD', 'Sekolah Nusantara', 'Surabaya', 'sn@snusantara.sch.id', '130', 'www.sekolah-nusantara.com', '@scha', 'picture', 6);
INSERT INTO `tnt_school` VALUES ('TNT.2', '963f543bdec98109b5f20f8f9f99db0c', 'SMP', 'Sekolah PGRI', 'Surabaya', 'sg@spgri.com', '130', 'www.sekolah-pgri.com', '@sekg', 'picture', 3);
INSERT INTO `tnt_school` VALUES ('TNT.3', 'a0cf13a358cba1790c61e6cbec313f2f', 'SMA', 'Sekolah Muhammadiyah', 'Surabaya', 'sm@smuh.com', '130', 'www.sekolah-muhammadiyah.com', '@skm', 'picture', 3);
INSERT INTO `tnt_school` VALUES ('TNT.4', '1b5063a8e72da815b5a96b9f8d6130ce', 'SMK', 'Sekolah Katholik', 'Surabaya', 'sk@skat.com', '130', 'www.sekolah-katholik.com', '@skk', 'picture', 3);

-- ----------------------------
-- Table structure for tnt_student
-- ----------------------------
DROP TABLE IF EXISTS `tnt_student`;
CREATE TABLE `tnt_student`  (
  `stu_num` int UNSIGNED NOT NULL AUTO_INCREMENT,
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
INSERT INTO `tnt_student` VALUES (1, 'TNT.1', '10087', 'student1', NULL, '4', NULL, NULL, NULL, 'cls.1');
INSERT INTO `tnt_student` VALUES (2, 'TNT.1', '10088', 'student2', NULL, '4', NULL, NULL, NULL, 'cls.2');
INSERT INTO `tnt_student` VALUES (3, 'TNT.1', '11256', 'student3', NULL, '4', NULL, NULL, NULL, 'cls.3');
INSERT INTO `tnt_student` VALUES (4, 'TNT.1', '11245', 'student4', NULL, '4', NULL, NULL, NULL, 'cls.4');
INSERT INTO `tnt_student` VALUES (5, 'TNT.1', '11234', 'student5', NULL, '4', NULL, NULL, NULL, 'cls.5');
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

-- ----------------------------
-- Table structure for tnt_subject
-- ----------------------------
DROP TABLE IF EXISTS `tnt_subject`;
CREATE TABLE `tnt_subject`  (
  `suc_subject_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `suc_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `suc_mo_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `suc_teacher_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `suc_class_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`suc_subject_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_subject
-- ----------------------------
INSERT INTO `tnt_subject` VALUES ('sub.1', 'Matematika Dasar', 'm.1', '6', 'cls.1');
INSERT INTO `tnt_subject` VALUES ('sub.10', 'Ilmu Komputer', 'm.10', NULL, NULL);
INSERT INTO `tnt_subject` VALUES ('sub.11', 'Matematika Teknik', 'm.11', NULL, NULL);
INSERT INTO `tnt_subject` VALUES ('sub.12', 'Ilmu Gizi', 'm.12', NULL, NULL);
INSERT INTO `tnt_subject` VALUES ('sub.13', 'Teknik Masak', 'm.13', NULL, NULL);
INSERT INTO `tnt_subject` VALUES ('sub.14', 'Teknik Dasar Pelayaran', 'm.14', NULL, NULL);
INSERT INTO `tnt_subject` VALUES ('sub.15', 'Pengembangan Hayati', 'm.15', NULL, NULL);
INSERT INTO `tnt_subject` VALUES ('sub.2', 'Bahasa Indonesia', 'm.1', '6', 'cls.1');
INSERT INTO `tnt_subject` VALUES ('sub.3', 'Ekonomi', 'm.3', '10', 'cls.49');
INSERT INTO `tnt_subject` VALUES ('sub.4', 'Fisika', 'm.4', NULL, NULL);
INSERT INTO `tnt_subject` VALUES ('sub.5', 'Geologi', 'm.5', NULL, NULL);
INSERT INTO `tnt_subject` VALUES ('sub.6', 'Fisika Terapan', 'm.6', NULL, NULL);
INSERT INTO `tnt_subject` VALUES ('sub.7', 'Akuntansi Dasar', 'm.7', NULL, NULL);
INSERT INTO `tnt_subject` VALUES ('sub.8', 'Ekonomi Dasar', 'm.8', NULL, NULL);
INSERT INTO `tnt_subject` VALUES ('sub.9', 'Pemrograman Dasar', 'm.9', NULL, NULL);

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
-- Table structure for tnt_teacher
-- ----------------------------
DROP TABLE IF EXISTS `tnt_teacher`;
CREATE TABLE `tnt_teacher`  (
  `num_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tch_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tch_tnt_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tch_subject_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`num_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_teacher
-- ----------------------------
INSERT INTO `tnt_teacher` VALUES (1, '8', 'TNT.1', 'sub.1');
INSERT INTO `tnt_teacher` VALUES (2, '11', 'TNT.4', 'sub.10');
INSERT INTO `tnt_teacher` VALUES (3, '11', 'TNT.4', 'sub.11');
INSERT INTO `tnt_teacher` VALUES (4, '12', 'TNT.4', 'sub.12');
INSERT INTO `tnt_teacher` VALUES (5, '13', 'TNT.4', 'sub.13');
INSERT INTO `tnt_teacher` VALUES (6, '13', 'TNT.4', 'sub.14');
INSERT INTO `tnt_teacher` VALUES (7, '12', 'TNT.4', 'sub.15');
INSERT INTO `tnt_teacher` VALUES (8, '8', 'TNT.1', 'sub.2');
INSERT INTO `tnt_teacher` VALUES (9, '9', 'TNT.2', 'sub.3');
INSERT INTO `tnt_teacher` VALUES (10, '10', 'TNT.3', 'sub.4');
INSERT INTO `tnt_teacher` VALUES (11, '10', 'TNT.3', 'sub.5');
INSERT INTO `tnt_teacher` VALUES (12, '10', 'TNT.3', 'sub.6');
INSERT INTO `tnt_teacher` VALUES (13, '11', 'TNT.4', 'sub.7');
INSERT INTO `tnt_teacher` VALUES (14, '11', 'TNT.4', 'sub.8');
INSERT INTO `tnt_teacher` VALUES (15, '13', 'TNT.4', 'sub.9');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `u_id` int NOT NULL,
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
INSERT INTO `user` VALUES (4, 'Suneo', 'TNT_PARENT', 'TNT.1', 'suneo@gmail.com', '123');
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

-- ----------------------------
-- Table structure for user_meta
-- ----------------------------
DROP TABLE IF EXISTS `user_meta`;
CREATE TABLE `user_meta`  (
  `u_num` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `u_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_fullname` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_address` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_phone` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_scnd_email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_job_position` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`u_num`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_meta
-- ----------------------------
INSERT INTO `user_meta` VALUES (7, '1', 'Trust Marketing', 'Surabaya', '+62085267890044', NULL, 'Marketing');
INSERT INTO `user_meta` VALUES (8, '2', 'Super Admin', 'Surabaya', '+62085267890044', NULL, 'Developer');
INSERT INTO `user_meta` VALUES (9, '3', 'Trust Admin', 'Surabaya', '+62085267890044', NULL, 'Admin');
INSERT INTO `user_meta` VALUES (10, '4', 'Suneo', 'Surabaya', '+62085267890044', NULL, 'Wali Murid');
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

SET FOREIGN_KEY_CHECKS = 1;
