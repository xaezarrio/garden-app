/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50621
 Source Host           : localhost:3306
 Source Schema         : westerindo

 Target Server Type    : MySQL
 Target Server Version : 50621
 File Encoding         : 65001

 Date: 09/11/2017 09:12:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_department
-- ----------------------------
DROP TABLE IF EXISTS `m_department`;
CREATE TABLE `m_department`  (
  `id_department` int(11) NOT NULL AUTO_INCREMENT,
  `d_kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `d_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_department`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_department
-- ----------------------------
INSERT INTO `m_department` VALUES (1, 'PRO', 'Produksi');
INSERT INTO `m_department` VALUES (2, 'SHE', 'She');
INSERT INTO `m_department` VALUES (3, 'MNT', 'Maintenance');
INSERT INTO `m_department` VALUES (4, 'QCL', 'QC Lab');
INSERT INTO `m_department` VALUES (5, 'LGS', 'Logistik');
INSERT INTO `m_department` VALUES (6, 'HRD', 'HRD');
INSERT INTO `m_department` VALUES (7, 'FAD', 'FAD');
INSERT INTO `m_department` VALUES (8, 'ENG', 'Engineering');
INSERT INTO `m_department` VALUES (9, 'GS', 'GS');
INSERT INTO `m_department` VALUES (10, 'PM', 'Plant Manager');
INSERT INTO `m_department` VALUES (11, 'KTR', 'Kontraktor');
INSERT INTO `m_department` VALUES (12, 'OTH', 'Others');

SET FOREIGN_KEY_CHECKS = 1;
