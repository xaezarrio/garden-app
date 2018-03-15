/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50621
 Source Host           : localhost:3306
 Source Schema         : db_garden

 Target Server Type    : MySQL
 Target Server Version : 50621
 File Encoding         : 65001

 Date: 14/03/2018 13:42:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for aktivitas
-- ----------------------------
DROP TABLE IF EXISTS `aktivitas`;
CREATE TABLE `aktivitas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `parent` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime(0) DEFAULT NULL,
  `updated_at` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 90 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of aktivitas
-- ----------------------------
INSERT INTO `aktivitas` VALUES (64, 'Pegawai', 'Keluar', '0', 1, NULL, '2018-03-03 05:44:57', '2018-03-03 10:20:10');
INSERT INTO `aktivitas` VALUES (65, 'Pribadi', 'Masuk', '0', 1, NULL, '2018-03-03 05:45:02', '2018-03-03 05:47:23');
INSERT INTO `aktivitas` VALUES (67, 'Gaji', 'Masuk', '64', 1, NULL, '2018-03-03 05:48:04', '2018-03-09 13:46:08');
INSERT INTO `aktivitas` VALUES (68, 'Bonus', 'Masuk', '64', 1, NULL, '2018-03-03 05:48:10', '2018-03-09 13:46:11');
INSERT INTO `aktivitas` VALUES (69, 'Kasbon', 'Keluar', '64', 1, NULL, '2018-03-03 05:48:15', '2018-03-09 13:46:17');
INSERT INTO `aktivitas` VALUES (70, 'BBM', 'Keluar', '65', 1, NULL, '2018-03-03 08:11:31', NULL);
INSERT INTO `aktivitas` VALUES (71, 'Makan', 'Keluar', '65', 1, NULL, '2018-03-03 08:11:40', NULL);
INSERT INTO `aktivitas` VALUES (72, 'Transport', 'Masuk', '0', 1, NULL, '2018-03-02 05:30:30', NULL);
INSERT INTO `aktivitas` VALUES (73, 'Servis', 'Keluar', '72', 1, NULL, '2018-03-02 05:42:47', '2018-03-09 13:28:14');
INSERT INTO `aktivitas` VALUES (74, 'BBM', 'Keluar', '72', 1, NULL, '2018-03-02 10:34:31', '2018-03-09 13:28:19');
INSERT INTO `aktivitas` VALUES (75, 'Bahan', 'Masuk', '0', 1, NULL, '2018-03-03 04:26:24', NULL);
INSERT INTO `aktivitas` VALUES (76, 'Pot', 'Masuk', '75', 1, NULL, '2018-03-03 04:26:34', NULL);
INSERT INTO `aktivitas` VALUES (77, 'Kantor', 'Masuk', '0', 1, NULL, '2018-03-03 14:41:01', NULL);
INSERT INTO `aktivitas` VALUES (78, 'Tambah Saldo', 'Masuk', '77', 1, NULL, '2018-03-03 14:41:14', NULL);
INSERT INTO `aktivitas` VALUES (79, 'ATK', 'Keluar', '77', 1, NULL, '2018-03-03 14:41:24', NULL);
INSERT INTO `aktivitas` VALUES (80, 'Konsumsi', 'Keluar', '77', 1, NULL, '2018-03-03 14:41:36', NULL);
INSERT INTO `aktivitas` VALUES (81, 'BBM', 'Keluar', '77', 1, NULL, '2018-03-03 14:41:49', NULL);
INSERT INTO `aktivitas` VALUES (82, 'Sumbangan', 'Keluar', '77', 1, NULL, '2018-03-03 14:41:56', NULL);
INSERT INTO `aktivitas` VALUES (83, 'Jasa', 'Keluar', '0', 1, NULL, '2018-03-09 13:27:11', NULL);
INSERT INTO `aktivitas` VALUES (84, 'Jasa borongan mandor', 'Keluar', '83', 1, NULL, '2018-03-09 13:27:35', NULL);
INSERT INTO `aktivitas` VALUES (85, 'Rembeurse', 'Keluar', '72', 1, NULL, '2018-03-09 13:28:05', NULL);
INSERT INTO `aktivitas` VALUES (86, 'Kasbon transport', 'Masuk', '72', 1, NULL, '2018-03-09 13:34:28', NULL);
INSERT INTO `aktivitas` VALUES (87, 'Entertain', 'Keluar', '65', 1, NULL, '2018-03-09 14:01:54', NULL);
INSERT INTO `aktivitas` VALUES (88, 'Pemasukan', 'Masuk', '65', 1, NULL, '2018-03-09 14:01:54', NULL);

-- ----------------------------
-- Table structure for aktivitas_proyek
-- ----------------------------
DROP TABLE IF EXISTS `aktivitas_proyek`;
CREATE TABLE `aktivitas_proyek`  (
  `ap_id` int(11) NOT NULL AUTO_INCREMENT,
  `ap_idproyek` int(11) NOT NULL,
  `ap_tanggal` date NOT NULL,
  `ap_idaktivitas` int(11) NOT NULL,
  `ap_idsubaktivitas` int(11) NOT NULL,
  `ap_qty` int(11) NOT NULL,
  `ap_nominal` int(11) NOT NULL,
  `ap_keterangan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` datetime(0) DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`ap_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of aktivitas_proyek
-- ----------------------------
INSERT INTO `aktivitas_proyek` VALUES (1, 2, '2018-03-03', 72, 74, 1, 500000, 'BBM 1 minggu', NULL, NULL);
INSERT INTO `aktivitas_proyek` VALUES (2, 2, '2018-03-03', 72, 73, 1, 250000, 'Service Pick Up', NULL, NULL);
INSERT INTO `aktivitas_proyek` VALUES (3, 2, '2018-03-03', 75, 76, 1, 300000, '100 PCS\r\n', NULL, NULL);
INSERT INTO `aktivitas_proyek` VALUES (4, 3, '2018-03-03', 72, 74, 1, 90000, 'BBM 1 Minggu ', NULL, NULL);
INSERT INTO `aktivitas_proyek` VALUES (5, 1, '2018-03-08', 75, 76, 1, 900000, '', NULL, NULL);
INSERT INTO `aktivitas_proyek` VALUES (6, 4, '2018-03-01', 72, 74, 1, 1000000, 'BBM untuk 1 minggu', NULL, NULL);
INSERT INTO `aktivitas_proyek` VALUES (7, 4, '2018-03-05', 72, 86, 1, 500000, 'kasbon transport mandor untuk 1 bulan', NULL, NULL);

-- ----------------------------
-- Table structure for aset
-- ----------------------------
DROP TABLE IF EXISTS `aset`;
CREATE TABLE `aset`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `stock` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `price` decimal(10, 0) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime(0) DEFAULT NULL,
  `updated_at` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of aset
-- ----------------------------
INSERT INTO `aset` VALUES (4, 'GLP', 'Gula Pasir', '350', 21000, NULL, '2018-03-02 08:21:56', '2018-03-02 08:58:58');
INSERT INTO `aset` VALUES (5, 'GLJ', 'Gula Jawa', '200', 15000, NULL, '2018-03-02 08:22:47', NULL);
INSERT INTO `aset` VALUES (6, 'BRS', 'Beras', '43', 200000, NULL, '2018-03-02 09:13:08', '2018-03-02 09:14:19');
INSERT INTO `aset` VALUES (7, 'GN21', 'Genset Honda', '5', 2500000, NULL, '2018-03-09 14:10:00', '2018-03-09 14:12:28');
INSERT INTO `aset` VALUES (8, 'GN22', 'genset Honda New', '1', 3000000, NULL, '2018-03-09 14:10:58', NULL);

-- ----------------------------
-- Table structure for aset_detail
-- ----------------------------
DROP TABLE IF EXISTS `aset_detail`;
CREATE TABLE `aset_detail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `aset_id` int(11) DEFAULT NULL,
  `stock` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `price` decimal(10, 0) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `updated_at` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of aset_detail
-- ----------------------------
INSERT INTO `aset_detail` VALUES (7, '2018-03-02', 4, '150', 21000, 0, '2018-03-02 08:21:57', NULL);
INSERT INTO `aset_detail` VALUES (8, '2018-03-02', 5, '200', 15000, 0, '2018-03-02 08:22:47', NULL);
INSERT INTO `aset_detail` VALUES (9, '2018-04-13', 4, '200', 21000, 0, '2018-03-02 08:58:58', NULL);
INSERT INTO `aset_detail` VALUES (10, '2018-03-02', 6, '20', 200000, 0, '2018-03-02 09:13:08', NULL);
INSERT INTO `aset_detail` VALUES (11, '2018-03-02', 6, '23', 200000, 0, '2018-03-02 09:14:19', NULL);
INSERT INTO `aset_detail` VALUES (12, '2018-03-01', 7, '2', 2000000, 0, '2018-03-09 14:10:00', NULL);
INSERT INTO `aset_detail` VALUES (13, '2018-03-09', 7, '2', 1000000, 0, '2018-03-09 14:10:28', NULL);
INSERT INTO `aset_detail` VALUES (14, '2018-03-09', 8, '1', 3000000, 0, '2018-03-09 14:10:58', NULL);
INSERT INTO `aset_detail` VALUES (15, '2018-03-09', 7, '1', 2500000, 0, '2018-03-09 14:12:28', NULL);

-- ----------------------------
-- Table structure for costcenter
-- ----------------------------
DROP TABLE IF EXISTS `costcenter`;
CREATE TABLE `costcenter`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` datetime(0) DEFAULT NULL,
  `updated_at` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of costcenter
-- ----------------------------
INSERT INTO `costcenter` VALUES (13, 'Bekasi Barat', '2018-03-02 09:18:08', '2018-03-09 13:28:46');
INSERT INTO `costcenter` VALUES (14, 'Bekasi Timur', '2018-03-09 13:28:57', NULL);
INSERT INTO `costcenter` VALUES (15, 'Bekasi Selatan', '2018-03-09 13:29:12', NULL);

-- ----------------------------
-- Table structure for file
-- ----------------------------
DROP TABLE IF EXISTS `file`;
CREATE TABLE `file`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `size` double DEFAULT NULL,
  `dir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `table` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime(0) DEFAULT NULL,
  `updated_at` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of file
-- ----------------------------
INSERT INTO `file` VALUES (2, '56bf4b5c20ab4dce5ba024f6e6eb4e66.png', 'image/png', 25986, 'webfile/matters/36756bf4.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 'proyek', 1, 0, '2018-03-08 10:56:49', NULL);
INSERT INTO `file` VALUES (3, 'logo-bca.gif', 'image/gif', 3122, 'webfile/matters/436logo-.gif', 'File Image', 'proyek', 1, 0, '2018-03-08 10:57:35', NULL);
INSERT INTO `file` VALUES (4, 'logo-bni.gif', 'image/gif', 1316, 'webfile/matters/49logo-.gif', 'File Image', 'proyek', 1, 0, '2018-03-08 10:57:35', NULL);
INSERT INTO `file` VALUES (5, 'logo-bri.gif', 'image/gif', 2935, 'webfile/matters/607logo-.gif', 'File Image', 'proyek', 1, 0, '2018-03-08 10:57:35', NULL);
INSERT INTO `file` VALUES (6, 'logo-mandiri.gif', 'image/gif', 1845, 'webfile/matters/558logo-.gif', 'File Image', 'proyek', 1, 0, '2018-03-08 10:57:35', NULL);

-- ----------------------------
-- Table structure for invoice
-- ----------------------------
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyek_id` int(11) DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `due` date DEFAULT NULL,
  `termin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `subtotal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pajak1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pajak2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `total` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` datetime(0) DEFAULT NULL,
  `updated_at` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of invoice
-- ----------------------------
INSERT INTO `invoice` VALUES (5, 3, 'Invoice ke 1 Maret 2018', '2018-03-01', '2018-03-31', '4', '350000', '35000', '', '385000', 'ini Remark', 0, 'Lunas', '2018-03-08 05:50:43', '2018-03-08 07:23:35');
INSERT INTO `invoice` VALUES (8, 3, 'Invoice ke-2', '2018-03-01', '2018-03-17', '3', '200000', '20000', '', '220000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 0, 'Lunas', '2018-03-08 08:50:58', '2018-03-08 08:51:06');
INSERT INTO `invoice` VALUES (9, 4, 'Pembayaran progres 30%', '2018-03-12', '2018-03-16', '1', '6000000', '600000', '60000', '6660000', 'keterangan invoice ', 0, 'Lunas', '2018-03-09 13:37:40', '2018-03-09 13:38:17');

-- ----------------------------
-- Table structure for invoice_item
-- ----------------------------
DROP TABLE IF EXISTS `invoice_item`;
CREATE TABLE `invoice_item`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `item` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nominal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of invoice_item
-- ----------------------------
INSERT INTO `invoice_item` VALUES (6, 5, 'Mamin', '200000');
INSERT INTO `invoice_item` VALUES (7, 5, 'Transport', '150000');
INSERT INTO `invoice_item` VALUES (10, 8, 'Item 1 Invoice 2', '200000');
INSERT INTO `invoice_item` VALUES (11, 9, 'Pembangunan taman dengan progres 30%', '5000000');
INSERT INTO `invoice_item` VALUES (12, 9, 'Uang lembur tukang ', '1000000');

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sallary` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` datetime(0) DEFAULT NULL,
  `updated_at` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES (13, 'Jhon', '2500000', '2018-03-03 14:25:42', NULL);
INSERT INTO `karyawan` VALUES (14, 'Rina Nagita', '2500000', '2018-03-03 14:25:54', NULL);
INSERT INTO `karyawan` VALUES (15, 'Jodie', '2000000', '2018-03-03 14:26:07', NULL);
INSERT INTO `karyawan` VALUES (16, 'Ari', '3500000', '2018-03-09 13:30:01', NULL);

-- ----------------------------
-- Table structure for modal
-- ----------------------------
DROP TABLE IF EXISTS `modal`;
CREATE TABLE `modal`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of modal
-- ----------------------------
INSERT INTO `modal` VALUES (1, 'Internal');
INSERT INTO `modal` VALUES (2, 'BCA');
INSERT INTO `modal` VALUES (3, 'BRI');

-- ----------------------------
-- Table structure for pajak
-- ----------------------------
DROP TABLE IF EXISTS `pajak`;
CREATE TABLE `pajak`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pajak
-- ----------------------------
INSERT INTO `pajak` VALUES (1, 'PPN');
INSERT INTO `pajak` VALUES (2, 'PPN 21');
INSERT INTO `pajak` VALUES (3, 'PPN 22');

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_nama_perusahaan` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `p_alamat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `p_npwp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `p_keterangan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `p_name` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `p_email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `p_position` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `p_phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `p_name2` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `p_email2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `p_position2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `p_phone2` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `p_doc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `p_doc_path` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `p_doc2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `p_doc_path2` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` datetime(0) DEFAULT NULL,
  `created_by` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`p_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES (2, 'Smartsofts', 'Duren sawit', '123456889', 'Keterangan', 'Bayu', 'bayu@mail.com', 'Programmer', '08223121231', 'Misbah', 'misbah@mail.com', 'Programmer', '0822221312', 'Berkas', '1519977027smartso4_dynonobel_(1).sql', 'berkas 2', '1519974797', '2018-03-02 08:50:27', '');
INSERT INTO `pelanggan` VALUES (3, 'Soft', 'Jakarta', '123456', 'Keterangan', 'Misbah', 'misbah@mail.com', 'Programmer', '0812345678', '', '', '', '', 'Berkas', '1520047432Asset_Report_IT_(Desktop).xlsx', '', '1520047432', '2018-03-03 04:23:52', '');
INSERT INTO `pelanggan` VALUES (4, 'Misbah Company', 'Malang', '09898989898', 'Keterangan', 'Misbah', 'mibah@mail.com', 'programmer', '081231212', '', '', '', '', 'Berks', '1520068754LAPORAN_KONTROL_GU_-_PRINT_AT_20180228).xls', '', '1520068754', '2018-03-03 10:19:14', '');
INSERT INTO `pelanggan` VALUES (5, 'DISTARU ', 'Jl. ABC', '81.222.01-0000', 'test', 'Arif', 'arif@gmail.com', 'PPK', '08111111', '', '', '', '', 'npwp', '1520601958Capture.JPG', '', '1520601958', '2018-03-09 13:25:59', '');

-- ----------------------------
-- Table structure for pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran`;
CREATE TABLE `pengeluaran`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `proyek_id` int(11) DEFAULT NULL,
  `aktivitas_id` int(11) DEFAULT NULL,
  `aktivitas_sub` int(11) DEFAULT NULL,
  `item` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `satuan_id` int(11) DEFAULT NULL,
  `nominal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `karyawan_id` int(11) DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `updated_at` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pengeluaran
-- ----------------------------
INSERT INTO `pengeluaran` VALUES (3, '2018-03-09', NULL, NULL, 69, NULL, NULL, NULL, '200000', 16, 'test', NULL, 'Pegawai', '2018-03-09 13:46:42', NULL);
INSERT INTO `pengeluaran` VALUES (4, '2018-03-09', NULL, NULL, 71, NULL, NULL, NULL, '200000', NULL, 'makan di proyek', NULL, 'Pribadi', '2018-03-09 14:00:54', NULL);
INSERT INTO `pengeluaran` VALUES (5, '2018-03-09', NULL, NULL, 70, NULL, NULL, NULL, '200000', NULL, 'bbm 1 minggu', NULL, 'Pribadi', '2018-03-09 14:01:23', NULL);
INSERT INTO `pengeluaran` VALUES (6, '2018-03-07', NULL, NULL, 87, NULL, NULL, NULL, '1000000', NULL, 'entertain', NULL, 'Pribadi', '2018-03-09 14:02:10', NULL);
INSERT INTO `pengeluaran` VALUES (7, '2018-03-14', NULL, NULL, 68, NULL, NULL, NULL, '500000', 16, 'test bonus', NULL, 'Pegawai', '2018-03-14 02:29:40', NULL);

-- ----------------------------
-- Table structure for perusahaan
-- ----------------------------
DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE `perusahaan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` datetime(0) DEFAULT NULL,
  `updated_at` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of perusahaan
-- ----------------------------
INSERT INTO `perusahaan` VALUES (1, 'PT. TAMANKU', 'alamat 1', '081', '2018-03-09 13:31:08', NULL);
INSERT INTO `perusahaan` VALUES (2, 'PT. SOLUSI', 'test', '082', '2018-03-09 13:31:19', NULL);
INSERT INTO `perusahaan` VALUES (3, 'CV. ABC', 'test', '08121', '2018-03-09 13:31:29', NULL);

-- ----------------------------
-- Table structure for proyek
-- ----------------------------
DROP TABLE IF EXISTS `proyek`;
CREATE TABLE `proyek`  (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_idpelanggan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pr_spk` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pr_nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pr_idcost` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pr_tgl_mulai` date NOT NULL,
  `pr_tgl_selesai` date NOT NULL,
  `pr_keterangan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pr_nilai_kontrak` int(11) NOT NULL,
  `pr_pajak` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pr_pajak2` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pr_sumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pr_modal` int(11) NOT NULL,
  `pr_status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime(0) DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `update_at` datetime(0) DEFAULT NULL,
  `update_by` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`pr_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of proyek
-- ----------------------------
INSERT INTO `proyek` VALUES (1, '2', '123456', 'Trotoar', '13', '2018-03-02', '2018-03-31', 'Harus cepat selesai bos!', 1000000, '1', '2', '2', 1000000, 'open', '2018-03-02 09:53:48', '', NULL, NULL);
INSERT INTO `proyek` VALUES (2, '2', '232131', 'Taman mini', '13', '2018-03-02', '2018-03-16', '', 2500000, '1', '', '1', 2500000, 'open', '2018-03-02 10:24:57', '', NULL, NULL);
INSERT INTO `proyek` VALUES (3, '4', '8798798797', 'Taman kota', '13', '2018-03-10', '2018-03-10', '', 9000000, '1', '', '3', 9000000, 'open', '2018-03-03 10:21:31', '', NULL, NULL);
INSERT INTO `proyek` VALUES (4, '5', 'SPK0001', 'pembangunan taman', '15', '2018-03-01', '2018-03-31', 'bla bla bla', 18000000, '1', '2', '2', 0, 'open', '2018-03-09 13:32:34', '', NULL, NULL);

-- ----------------------------
-- Table structure for satuan
-- ----------------------------
DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of satuan
-- ----------------------------
INSERT INTO `satuan` VALUES (1, 'PCS');
INSERT INTO `satuan` VALUES (2, 'Meter');

-- ----------------------------
-- Table structure for toko
-- ----------------------------
DROP TABLE IF EXISTS `toko`;
CREATE TABLE `toko`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` datetime(0) DEFAULT NULL,
  `updated_at` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of toko
-- ----------------------------
INSERT INTO `toko` VALUES (1, 'Toko 1', 'jl. bekasi', '081212', '2018-03-09 13:30:30', NULL);
INSERT INTO `toko` VALUES (2, 'Toko 2', 'Alamat 2', '081', '2018-03-09 13:30:41', NULL);

SET FOREIGN_KEY_CHECKS = 1;
