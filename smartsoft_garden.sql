/*
Navicat MySQL Data Transfer

Source Server         : uh
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : smartsoft_garden

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-04-06 09:47:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for aktivitas
-- ----------------------------
DROP TABLE IF EXISTS `aktivitas`;
CREATE TABLE `aktivitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `parent` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of aktivitas
-- ----------------------------
INSERT INTO `aktivitas` VALUES ('64', 'Pegawai', 'Keluar', '0', '1', null, '2018-03-03 05:44:57', '2018-03-03 10:20:10');
INSERT INTO `aktivitas` VALUES ('65', 'Pribadi', 'Masuk', '0', '1', null, '2018-03-03 05:45:02', '2018-03-03 05:47:23');
INSERT INTO `aktivitas` VALUES ('67', 'Gaji', 'Masuk', '64', '1', null, '2018-03-03 05:48:04', '2018-03-19 07:52:49');
INSERT INTO `aktivitas` VALUES ('68', 'Bonus', 'Masuk', '64', '1', null, '2018-03-03 05:48:10', '2018-03-15 05:53:23');
INSERT INTO `aktivitas` VALUES ('69', 'Kasbon', 'Keluar', '64', '1', null, '2018-03-03 05:48:15', '2018-03-09 13:46:17');
INSERT INTO `aktivitas` VALUES ('70', 'BBM', 'Keluar', '65', '1', null, '2018-03-03 08:11:31', null);
INSERT INTO `aktivitas` VALUES ('71', 'Makan', 'Keluar', '65', '1', null, '2018-03-03 08:11:40', null);
INSERT INTO `aktivitas` VALUES ('72', 'Transport', 'Masuk', '0', '1', null, '2018-03-02 05:30:30', null);
INSERT INTO `aktivitas` VALUES ('73', 'Servis', 'Keluar', '72', '1', null, '2018-03-02 05:42:47', '2018-03-09 13:28:14');
INSERT INTO `aktivitas` VALUES ('74', 'BBM', 'Keluar', '72', '1', null, '2018-03-02 10:34:31', '2018-03-09 13:28:19');
INSERT INTO `aktivitas` VALUES ('75', 'Bahan', 'Keluar', '0', '1', null, '2018-03-03 04:26:24', '2018-03-15 05:49:48');
INSERT INTO `aktivitas` VALUES ('76', 'Pembelian Bahan', 'Keluar', '75', '1', null, '2018-03-03 04:26:34', '2018-04-04 08:46:56');
INSERT INTO `aktivitas` VALUES ('77', 'Kantor', 'Masuk', '0', '1', null, '2018-03-03 14:41:01', null);
INSERT INTO `aktivitas` VALUES ('78', 'Tambah Saldo', 'Masuk', '77', '1', null, '2018-03-03 14:41:14', null);
INSERT INTO `aktivitas` VALUES ('79', 'Pembelian ATK', 'Keluar', '77', '1', null, '2018-03-03 14:41:24', '2018-03-28 05:37:34');
INSERT INTO `aktivitas` VALUES ('80', 'Pembayaran Konsumsi', 'Keluar', '77', '1', null, '2018-03-03 14:41:36', '2018-03-28 05:37:44');
INSERT INTO `aktivitas` VALUES ('81', 'BBM', 'Keluar', '77', '1', null, '2018-03-03 14:41:49', null);
INSERT INTO `aktivitas` VALUES ('82', 'Sumbangan', 'Keluar', '77', '1', null, '2018-03-03 14:41:56', null);
INSERT INTO `aktivitas` VALUES ('83', 'Jasa', 'Keluar', '0', '1', null, '2018-03-09 13:27:11', null);
INSERT INTO `aktivitas` VALUES ('84', 'Jasa borongan mandor', 'Keluar', '83', '1', null, '2018-03-09 13:27:35', null);
INSERT INTO `aktivitas` VALUES ('85', 'Rembeurse', 'Keluar', '72', '1', null, '2018-03-09 13:28:05', null);
INSERT INTO `aktivitas` VALUES ('86', 'Kasbon transport', 'Masuk', '72', '1', null, '2018-03-09 13:34:28', null);
INSERT INTO `aktivitas` VALUES ('87', 'Entertain', 'Keluar', '65', '1', null, '2018-03-09 14:01:54', null);
INSERT INTO `aktivitas` VALUES ('88', 'Pemasukan', 'Masuk', '65', '1', null, '2018-03-09 14:01:54', null);
INSERT INTO `aktivitas` VALUES ('93', 'Pembayaran Sisa Gaji', 'Keluar', '64', '1', null, '2018-03-20 04:21:27', null);
INSERT INTO `aktivitas` VALUES ('94', 'Simpan', 'Masuk', '0', '1', null, '2018-03-27 10:45:46', null);
INSERT INTO `aktivitas` VALUES ('95', 'Pinjam', 'Keluar', '0', '1', null, '2018-03-27 10:45:54', null);
INSERT INTO `aktivitas` VALUES ('96', 'Pokok', 'Masuk', '94', '1', null, '2018-03-27 10:46:02', null);
INSERT INTO `aktivitas` VALUES ('97', 'Sukarela', 'Masuk', '94', '1', null, '2018-03-27 10:46:10', null);
INSERT INTO `aktivitas` VALUES ('99', 'Pinjaman', 'Keluar', '95', '1', null, '2018-03-27 10:46:43', '2018-03-27 10:46:48');
INSERT INTO `aktivitas` VALUES ('100', 'Bayar Pinjaman', 'Masuk', '95', '1', null, '2018-03-27 10:47:02', '2018-03-27 10:47:12');
INSERT INTO `aktivitas` VALUES ('101', 'Tarik Simpanan Pokok', 'Keluar', '94', '1', null, '2018-03-27 10:47:41', '2018-04-03 08:33:10');
INSERT INTO `aktivitas` VALUES ('102', 'Pakai ATK', 'Pakai', '77', '1', null, '2018-03-28 05:38:12', null);
INSERT INTO `aktivitas` VALUES ('103', 'Tarik Simpanan Sukarela', 'Keluar', '94', '1', null, '2018-04-03 08:33:28', null);
INSERT INTO `aktivitas` VALUES ('104', 'Entertain', 'Keluar', '0', '1', null, '2018-04-04 08:46:31', null);
INSERT INTO `aktivitas` VALUES ('105', 'Modal', 'Masuk', '0', '1', null, '2018-04-05 06:54:11', null);
INSERT INTO `aktivitas` VALUES ('106', 'Kembalikan Modal', 'Keluar', '105', '1', null, '2018-04-05 06:54:29', '2018-04-05 06:54:34');

-- ----------------------------
-- Table structure for aktivitas_proyek
-- ----------------------------
DROP TABLE IF EXISTS `aktivitas_proyek`;
CREATE TABLE `aktivitas_proyek` (
  `ap_id` int(11) NOT NULL AUTO_INCREMENT,
  `ap_idproyek` int(11) NOT NULL,
  `ap_tanggal` date NOT NULL,
  `ap_idaktivitas` int(11) NOT NULL,
  `ap_idsubaktivitas` int(11) NOT NULL,
  `ap_item` varchar(255) DEFAULT NULL,
  `ap_qty` int(11) DEFAULT NULL,
  `ap_nominal` int(11) NOT NULL,
  `ap_keterangan` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ap_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of aktivitas_proyek
-- ----------------------------
INSERT INTO `aktivitas_proyek` VALUES ('22', '8', '2018-04-05', '83', '84', null, null, '50000000', 'Boraongan Mandor', '2018-04-05 19:40:46', null);

-- ----------------------------
-- Table structure for aset
-- ----------------------------
DROP TABLE IF EXISTS `aset`;
CREATE TABLE `aset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `stock` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of aset
-- ----------------------------

-- ----------------------------
-- Table structure for aset_detail
-- ----------------------------
DROP TABLE IF EXISTS `aset_detail`;
CREATE TABLE `aset_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `aset_id` int(11) DEFAULT NULL,
  `stock` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of aset_detail
-- ----------------------------

-- ----------------------------
-- Table structure for aset_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `aset_transaksi`;
CREATE TABLE `aset_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aset_transaksi
-- ----------------------------

-- ----------------------------
-- Table structure for aset_transaksi_detail
-- ----------------------------
DROP TABLE IF EXISTS `aset_transaksi_detail`;
CREATE TABLE `aset_transaksi_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_id` int(11) NOT NULL,
  `aset_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aset_transaksi_detail
-- ----------------------------

-- ----------------------------
-- Table structure for costcenter
-- ----------------------------
DROP TABLE IF EXISTS `costcenter`;
CREATE TABLE `costcenter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of costcenter
-- ----------------------------
INSERT INTO `costcenter` VALUES ('16', 'Cost Center ', '2018-04-05 19:31:10', null);

-- ----------------------------
-- Table structure for file
-- ----------------------------
DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` double DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `table` varchar(255) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of file
-- ----------------------------
INSERT INTO `file` VALUES ('24', '446.JPG', 'image/jpeg', '13.09', 'webfile/aktivitas-proyek/446.JPG', '', 'aktivitas_proyek', '22', '5', '2018-04-05 19:40:46', null);
INSERT INTO `file` VALUES ('25', '728.jpg', 'image/jpeg', '1.33', 'webfile/invoice/728.jpg', '', 'invoice', '15', '5', '2018-04-05 19:42:11', null);

-- ----------------------------
-- Table structure for invoice
-- ----------------------------
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyek_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `due` date DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT NULL,
  `pajak1` varchar(255) DEFAULT NULL,
  `pajak2` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of invoice
-- ----------------------------
INSERT INTO `invoice` VALUES ('15', '8', 'Pembayaran DP', '2018-04-02', '2018-04-30', 'Pembayaran Proyek', '100000000', '10000000', '2100000', '112100000', 'Harus segera dibayarkan', '5', 'Lunas', '2018-04-05 19:41:48', '2018-04-05 19:42:10');

-- ----------------------------
-- Table structure for invoice_item
-- ----------------------------
DROP TABLE IF EXISTS `invoice_item`;
CREATE TABLE `invoice_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of invoice_item
-- ----------------------------
INSERT INTO `invoice_item` VALUES ('18', '15', 'DP 50%', '100000000');

-- ----------------------------
-- Table structure for item
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `i_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_nama` varchar(100) DEFAULT NULL,
  `i_stok` int(11) DEFAULT NULL,
  `i_satuan` varchar(80) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`i_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES ('1', 'Rak Buku', '5', '1', null, '2018-04-06 04:13:13', null, '2018-04-06 04:20:09');
INSERT INTO `item` VALUES ('2', '', '0', '1', null, '2018-04-06 04:14:48', null, null);

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sallary` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES ('13', 'Jhon', '2500000', '2018-03-03 14:25:42', null);
INSERT INTO `karyawan` VALUES ('14', 'Rina Nagita', '2500000', '2018-03-03 14:25:54', null);
INSERT INTO `karyawan` VALUES ('15', 'Jodie', '2000000', '2018-03-03 14:26:07', null);
INSERT INTO `karyawan` VALUES ('16', 'Ari', '2000000', '2018-03-09 13:30:01', '2018-03-19 03:12:53');

-- ----------------------------
-- Table structure for karyawan_proyek
-- ----------------------------
DROP TABLE IF EXISTS `karyawan_proyek`;
CREATE TABLE `karyawan_proyek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `karyawan_id` int(11) DEFAULT NULL,
  `proyek_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of karyawan_proyek
-- ----------------------------

-- ----------------------------
-- Table structure for koperasi
-- ----------------------------
DROP TABLE IF EXISTS `koperasi`;
CREATE TABLE `koperasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aktivitas_id` int(11) DEFAULT NULL,
  `aktivitas_sub` int(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `karyawan_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of koperasi
-- ----------------------------

-- ----------------------------
-- Table structure for modal
-- ----------------------------
DROP TABLE IF EXISTS `modal`;
CREATE TABLE `modal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of modal
-- ----------------------------
INSERT INTO `modal` VALUES ('1', 'Internal');
INSERT INTO `modal` VALUES ('2', 'BCA');
INSERT INTO `modal` VALUES ('3', 'BRI');

-- ----------------------------
-- Table structure for pajak
-- ----------------------------
DROP TABLE IF EXISTS `pajak`;
CREATE TABLE `pajak` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pajak
-- ----------------------------
INSERT INTO `pajak` VALUES ('1', 'PPN');
INSERT INTO `pajak` VALUES ('2', 'PPN 21');
INSERT INTO `pajak` VALUES ('3', 'PPN 22');

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_nama_perusahaan` varchar(75) NOT NULL,
  `p_alamat` varchar(100) NOT NULL,
  `p_npwp` varchar(50) NOT NULL,
  `p_keterangan` varchar(100) DEFAULT NULL,
  `p_name` varchar(75) NOT NULL,
  `p_email` varchar(50) NOT NULL,
  `p_position` varchar(50) NOT NULL,
  `p_phone` varchar(20) NOT NULL,
  `p_name2` varchar(75) DEFAULT NULL,
  `p_email2` varchar(50) DEFAULT NULL,
  `p_position2` varchar(50) DEFAULT NULL,
  `p_phone2` varchar(20) DEFAULT NULL,
  `p_doc` varchar(50) DEFAULT NULL,
  `p_doc_path` varchar(75) DEFAULT NULL,
  `p_doc2` varchar(50) DEFAULT NULL,
  `p_doc_path2` varchar(75) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`p_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES ('6', 'PT Persero Jakarta Industrial Estate Pulogadung', 'Jl. Pulokambing Raya Blok J No.15, RW.9 · (021) 4600305', '15.232.123.5-393.000', 'Pelanggan Setia', 'Agung Harianto', 'agh@gmail.com', 'Manager', '087663226333', '', '', '', '', '', '1521540367', '', '1521540367', '2018-03-20 11:06:07', '');
INSERT INTO `pelanggan` VALUES ('7', 'PT. Asuransi Jasa Indonesia (PERSERO),', 'Kantor Pusat Asuransi Jasindo. Mulia Business Park Jl. Let.jen MT Haryono Kav. 58 - 60 Jakarta 12780', '14.242.113.4-313.002', 'Perusahaan Di Jakarta', 'Phone 1', 'p@mail.com', 'Manager', '021 - 7994508', 'Phone 2', 'p1@mail.com', 'Super Visor', '021 - 7995364', '', '1521540733', '', '1521540733', '2018-03-20 11:12:13', '');

-- ----------------------------
-- Table structure for pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran`;
CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `proyek_id` int(11) DEFAULT NULL,
  `aktivitas_id` int(11) DEFAULT NULL,
  `aktivitas_sub` int(11) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `satuan_id` int(11) DEFAULT NULL,
  `nominal` int(255) DEFAULT '0',
  `karyawan_id` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pengeluaran
-- ----------------------------
INSERT INTO `pengeluaran` VALUES ('1', '2018-04-06', '0', null, '79', 'Rak Buku', '5', '1', '3000000', null, 'Pembelian Inventory', '1522980793Capture.JPG', '5', 'Kantor', '2018-04-06 04:13:13', null);
INSERT INTO `pengeluaran` VALUES ('2', '2018-04-06', '0', null, '78', '', '0', '1', '15000000', null, 'Saldo Bulan Lalu', '1522980888macbook-icon.png', '5', 'Kantor', '2018-04-06 04:14:48', null);

-- ----------------------------
-- Table structure for perusahaan
-- ----------------------------
DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of perusahaan
-- ----------------------------
INSERT INTO `perusahaan` VALUES ('4', 'Smart Soft', 'Jl Dermaga no 24, Klender Duren Sawit, Jakarta Timur', '082919288333', '2018-03-20 11:13:49', null);

-- ----------------------------
-- Table structure for proyek
-- ----------------------------
DROP TABLE IF EXISTS `proyek`;
CREATE TABLE `proyek` (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_idperusahaan` int(11) DEFAULT NULL,
  `pr_idpelanggan` varchar(50) NOT NULL,
  `pr_spk` varchar(75) NOT NULL,
  `pr_nama` varchar(100) NOT NULL,
  `pr_idcost` varchar(50) NOT NULL,
  `pr_tgl_mulai` date NOT NULL,
  `pr_tgl_selesai` date NOT NULL,
  `pr_keterangan` varchar(100) DEFAULT NULL,
  `pr_nilai_kontrak` int(11) NOT NULL,
  `pr_pajak` varchar(20) NOT NULL,
  `pr_pajak2` varchar(20) NOT NULL,
  `pr_sumber` varchar(255) NOT NULL,
  `pr_bunga` varchar(255) DEFAULT NULL,
  `pr_modal` varchar(255) NOT NULL,
  `pr_status` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pr_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of proyek
-- ----------------------------
INSERT INTO `proyek` VALUES ('8', '4', '6', 'SPK0001', 'Pembuatan RPTRA Karang Asem - Jatinegara', '16', '2018-04-01', '2018-06-30', 'Harus selesai sesuai target', '250000000', '1', '2', '[\"2\",\"1\"]', '[\"1000000\",\"0\"]', '[\"80000000\",\"50000000\"]', 'open', '2018-04-05 19:32:32', '5', '2018-04-06 04:42:30', '');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'Super Admin');
INSERT INTO `role` VALUES ('2', 'Admin Kantor');
INSERT INTO `role` VALUES ('3', 'Partner');
INSERT INTO `role` VALUES ('4', 'Operator');

-- ----------------------------
-- Table structure for satuan
-- ----------------------------
DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of satuan
-- ----------------------------
INSERT INTO `satuan` VALUES ('1', 'PCS');
INSERT INTO `satuan` VALUES ('2', 'Meter');

-- ----------------------------
-- Table structure for toko
-- ----------------------------
DROP TABLE IF EXISTS `toko`;
CREATE TABLE `toko` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of toko
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('5', 'Smart Soft', 'smartsoft@gmail.com', 'smartsoft', 'f3c393f6c9f2a6b2f0202b1e1f0d5df0', '1', 'ENABLE', '2018-03-20 04:46:50', null);
INSERT INTO `user` VALUES ('6', 'Admin Kantor', 'admin@gardenapp.com', 'admin', 'f3c393f6c9f2a6b2f0202b1e1f0d5df0', '2', 'ENABLE', '2018-03-20 04:50:33', null);
INSERT INTO `user` VALUES ('7', 'Partner Smartsoft I', 'partner@gardenapp.com', 'partner1', 'f3c393f6c9f2a6b2f0202b1e1f0d5df0', '3', 'ENABLE', '2018-03-20 04:51:05', null);
INSERT INTO `user` VALUES ('8', 'Operator', 'operator@gmail.com', 'operator', 'f3c393f6c9f2a6b2f0202b1e1f0d5df0', '4', 'ENABLE', '2018-03-20 04:51:31', null);
