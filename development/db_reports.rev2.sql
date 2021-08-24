/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : db_reports

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 27/04/2021 12:49:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tnt_acad_years
-- ----------------------------
DROP TABLE IF EXISTS `tnt_acad_years`;
CREATE TABLE `tnt_acad_years`  (
  `aca_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aca_sch_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ach_years` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`aca_id`) USING BTREE,
  INDEX `fk_tnt_acad_years_tnt_school_1`(`aca_sch_id`) USING BTREE,
  CONSTRAINT `fk_tnt_acad_years_tnt_school_1` FOREIGN KEY (`aca_sch_id`) REFERENCES `tnt_school` (`sch_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_acad_years
-- ----------------------------

-- ----------------------------
-- Table structure for tnt_class
-- ----------------------------
DROP TABLE IF EXISTS `tnt_class`;
CREATE TABLE `tnt_class`  (
  `cls_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cls_mj_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cls_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cls_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_class
-- ----------------------------
INSERT INTO `tnt_class` VALUES ('c.1', 'm.1', 'KELAS I');
INSERT INTO `tnt_class` VALUES ('c.2', 'm.1', 'KELAS II');
INSERT INTO `tnt_class` VALUES ('c.3', 'm.1', 'KELAS III');

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
  PRIMARY KEY (`fds_id`) USING BTREE,
  INDEX `fk_tnt_fixdata_asses_tnt_subject_1`(`fds_subject_id`) USING BTREE,
  INDEX `fk_tnt_fixdata_asses_tnt_acad_years_1`(`fds_aca_id`) USING BTREE,
  INDEX `fk_tnt_fixdata_asses_tnt_student_1`(`fds_std_number`) USING BTREE,
  CONSTRAINT `fk_tnt_fixdata_asses_tnt_acad_years_1` FOREIGN KEY (`fds_aca_id`) REFERENCES `tnt_acad_years` (`aca_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tnt_fixdata_asses_tnt_subject_1` FOREIGN KEY (`fds_subject_id`) REFERENCES `tnt_subject` (`ass_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_fixdata_asses
-- ----------------------------

-- ----------------------------
-- Table structure for tnt_majors
-- ----------------------------
DROP TABLE IF EXISTS `tnt_majors`;
CREATE TABLE `tnt_majors`  (
  `mj_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mj_sch_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mj_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`mj_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_majors
-- ----------------------------
INSERT INTO `tnt_majors` VALUES ('m.1', 'TNT.1', 'EAST');
INSERT INTO `tnt_majors` VALUES ('m.2', 'TNT.1', 'WEST');

-- ----------------------------
-- Table structure for tnt_rawdata_assesment
-- ----------------------------
DROP TABLE IF EXISTS `tnt_rawdata_assesment`;
CREATE TABLE `tnt_rawdata_assesment`  (
  `raw_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `raw_stu_num` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
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
  `sch_token_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sch_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_address` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_phone` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_website` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_social_media` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_logo` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sch_longtime_learning` int NOT NULL,
  PRIMARY KEY (`sch_id`, `sch_token_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_school
-- ----------------------------
INSERT INTO `tnt_school` VALUES ('TNT.1', '0217f29f0744ce6361d81919ae26117a', 'Sekolah Nusantara', 'Surabaya', 'sn@snusantara.sch.id', '130', 'www.sekolah-nusantara.com', '@scha', 'picture', 3);

-- ----------------------------
-- Table structure for tnt_student
-- ----------------------------
DROP TABLE IF EXISTS `tnt_student`;
CREATE TABLE `tnt_student`  (
  `stu_num` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `stu_sch_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stu_id` int NULL DEFAULT NULL,
  `stu_email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stu_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stu_id_parents` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stu_major` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stu_class` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`stu_num`, `stu_email`) USING BTREE,
  INDEX `stu_num`(`stu_num`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_student
-- ----------------------------
INSERT INTO `tnt_student` VALUES (1, 'TNT.1', 100, 'dani@example.com', 'dani candra', '4', 'm.1', 'c.2');

-- ----------------------------
-- Table structure for tnt_subject
-- ----------------------------
DROP TABLE IF EXISTS `tnt_subject`;
CREATE TABLE `tnt_subject`  (
  `ass_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ass_sch_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ass_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ass_percentage` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ass_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnt_subject
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `u_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `u_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_rules_access` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_id_access` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_password` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`u_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Trust Marketing', 'MGNT_MARKETING', 'MGNT', 'suneo@gmail.com', '123');
INSERT INTO `user` VALUES (2, 'Super Admin', 'MGNT_SUPERADMIN', 'MGNT', 'superadmin@gmail.com', '123');
INSERT INTO `user` VALUES (3, 'Trust Admin', 'MGNT_ADMIN', 'MGNT', 'trustadmin@gmail.com', '123');
INSERT INTO `user` VALUES (4, 'Suneo', 'TNT_PARENT', 'TNT.1', 'suneo@gmail.com', '123');
INSERT INTO `user` VALUES (5, 'Kepsek', 'TNT_SUPERADMIN', 'TNT.1', 'kepsek@gmail.com', '123');
INSERT INTO `user` VALUES (6, 'Guru', 'TNT_TEACHER', 'TNT.1', 'guru@gmail.com', '123');
INSERT INTO `user` VALUES (7, 'Admin Sekolah', 'TNT_ADMIN', 'TNT.1', 'adminsek@gmail.com', '123');

-- ----------------------------
-- Table structure for user_meta
-- ----------------------------
DROP TABLE IF EXISTS `user_meta`;
CREATE TABLE `user_meta`  (
  `u_num` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `u_id` int NULL DEFAULT NULL,
  `u_fullname` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_address` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_phone` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_scnd_email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `u_job_position` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`u_num`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_meta
-- ----------------------------
INSERT INTO `user_meta` VALUES (1, 1, 'Trust Marketing', 'Surabaya', '+ 62', NULL, 'management');
INSERT INTO `user_meta` VALUES (2, 2, 'Super Admin', 'Surabaya', '+ 62', NULL, 'management');
INSERT INTO `user_meta` VALUES (3, 3, 'Trust Admin', 'Surabaya', '+ 62', NULL, 'management');
INSERT INTO `user_meta` VALUES (4, 4, 'Suneo', 'Surabaya', '+ 62', NULL, 'wali murid');
INSERT INTO `user_meta` VALUES (5, 5, 'Kepsek', 'Surabaya', '+ 62', NULL, 'kepala sekolah');
INSERT INTO `user_meta` VALUES (6, 6, 'Guru', 'Surabaya', '+ 62', NULL, 'guru sekolah');
INSERT INTO `user_meta` VALUES (7, 7, 'admin sekolah ', 'Surabaya', '+ 62', NULL, 'admin Sekolah');

SET FOREIGN_KEY_CHECKS = 1;
