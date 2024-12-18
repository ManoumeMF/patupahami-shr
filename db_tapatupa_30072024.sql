/*
 Navicat Premium Data Transfer

 Source Server         : local_mysql8.0
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : db_tapatupa

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 30/07/2024 15:51:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cities
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities`  (
  `city_id` int NOT NULL AUTO_INCREMENT,
  `city_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prov_id` int NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`city_id`) USING BTREE,
  INDEX `prov_id`(`prov_id` ASC) USING BTREE,
  CONSTRAINT `prov_id` FOREIGN KEY (`prov_id`) REFERENCES `provinces` (`prov_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cities
-- ----------------------------

-- ----------------------------
-- Table structure for districts
-- ----------------------------
DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts`  (
  `dis_id` int NOT NULL AUTO_INCREMENT,
  `dis_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city_id` int NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`dis_id`) USING BTREE,
  INDEX `city_id`(`city_id` ASC) USING BTREE,
  CONSTRAINT `city_id` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of districts
-- ----------------------------

-- ----------------------------
-- Table structure for dokumenkelengkapan
-- ----------------------------
DROP TABLE IF EXISTS `dokumenkelengkapan`;
CREATE TABLE `dokumenkelengkapan`  (
  `idDokumenKelengkapan` int NOT NULL AUTO_INCREMENT,
  `idJenisDokumen` int NOT NULL,
  `dokumenKelengkapan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idDokumenKelengkapan`) USING BTREE,
  INDEX `idJenisDokumen`(`idJenisDokumen` ASC) USING BTREE,
  CONSTRAINT `idJenisDokumen` FOREIGN KEY (`idJenisDokumen`) REFERENCES `jenisdokumen` (`idJenisDokumen`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dokumenkelengkapan
-- ----------------------------

-- ----------------------------
-- Table structure for dokumenpermohonansewa
-- ----------------------------
DROP TABLE IF EXISTS `dokumenpermohonansewa`;
CREATE TABLE `dokumenpermohonansewa`  (
  `idDokumenPermohonanSewa` int NOT NULL,
  `idPermohonanSewa` int NOT NULL AUTO_INCREMENT,
  `idDokumenKelengkapan` int NOT NULL,
  `namaFileDokumen` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idDokumenPermohonanSewa`) USING BTREE,
  INDEX `idDokumenKelengkapan`(`idDokumenKelengkapan` ASC) USING BTREE,
  INDEX `idPermohonanSewa`(`idPermohonanSewa` ASC) USING BTREE,
  CONSTRAINT `idDokumenKelengkapan` FOREIGN KEY (`idDokumenKelengkapan`) REFERENCES `dokumenkelengkapan` (`idDokumenKelengkapan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `idPermohonanSewa` FOREIGN KEY (`idPermohonanSewa`) REFERENCES `permohonansewa` (`idPermohonanSewa`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dokumenpermohonansewa
-- ----------------------------

-- ----------------------------
-- Table structure for jangkawaktusewa
-- ----------------------------
DROP TABLE IF EXISTS `jangkawaktusewa`;
CREATE TABLE `jangkawaktusewa`  (
  `idJangkaWaktuSewa` int NOT NULL AUTO_INCREMENT,
  `idJenisJangkaWaktu` int NOT NULL,
  `jangkaWaktu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idJangkaWaktuSewa`) USING BTREE,
  INDEX `idJenisJangkaWaktu`(`idJenisJangkaWaktu` ASC) USING BTREE,
  CONSTRAINT `idJenisJangkaWaktu` FOREIGN KEY (`idJenisJangkaWaktu`) REFERENCES `jenisjangkawaktu` (`idJenisJangkaWaktu`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jangkawaktusewa
-- ----------------------------

-- ----------------------------
-- Table structure for jenisdokumen
-- ----------------------------
DROP TABLE IF EXISTS `jenisdokumen`;
CREATE TABLE `jenisdokumen`  (
  `idJenisDokumen` int NOT NULL AUTO_INCREMENT,
  `jenisDokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idJenisDokumen`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jenisdokumen
-- ----------------------------

-- ----------------------------
-- Table structure for jenisjangkawaktu
-- ----------------------------
DROP TABLE IF EXISTS `jenisjangkawaktu`;
CREATE TABLE `jenisjangkawaktu`  (
  `idJenisJangkaWaktu` int NOT NULL AUTO_INCREMENT,
  `jenisJangkaWaktu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idJenisJangkaWaktu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jenisjangkawaktu
-- ----------------------------

-- ----------------------------
-- Table structure for jeniskegiatan
-- ----------------------------
DROP TABLE IF EXISTS `jeniskegiatan`;
CREATE TABLE `jeniskegiatan`  (
  `idjenisKegiatan` int NOT NULL AUTO_INCREMENT,
  `jenisKegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idjenisKegiatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jeniskegiatan
-- ----------------------------

-- ----------------------------
-- Table structure for jenisobjekretribusi
-- ----------------------------
DROP TABLE IF EXISTS `jenisobjekretribusi`;
CREATE TABLE `jenisobjekretribusi`  (
  `idJenisObjekRetribusi` int NOT NULL AUTO_INCREMENT,
  `jenisObjekRetribusi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idJenisObjekRetribusi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

select * from jenisobjekretribusi j 
-- ----------------------------
-- Records of jenisobjekretribusi
-- ----------------------------

-- ----------------------------
-- Table structure for jenispermohonan
-- ----------------------------
DROP TABLE IF EXISTS `jenispermohonan`;
CREATE TABLE `jenispermohonan`  (
  `idJenisPermohonan` int NOT NULL AUTO_INCREMENT,
  `parentId` int NOT NULL,
  `jenisPermohonan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idJenisPermohonan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jenispermohonan
-- ----------------------------

-- ----------------------------
-- Table structure for jenisstatus
-- ----------------------------
DROP TABLE IF EXISTS `jenisstatus`;
CREATE TABLE `jenisstatus`  (
  `idJenisStatus` int NOT NULL AUTO_INCREMENT,
  `jenisStatus` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idJenisStatus`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jenisstatus
-- ----------------------------
INSERT INTO `jenisstatus` VALUES (1, 'Jenis Status 01 updated', 'Keterangan Jenis Status 01 updated', '2024-07-30 11:00:20', '2024-07-30 11:00:47', 0);
INSERT INTO `jenisstatus` VALUES (2, 'Jenis Status 02 updated', 'Keterangan Jenis Status 02 updated', '2024-07-30 11:02:23', '2024-07-30 14:37:00', 0);
INSERT INTO `jenisstatus` VALUES (3, 'Jenis Status 03', 'Keterangan Jenis Status 03', '2024-07-30 11:12:58', '2024-07-30 15:49:26', 0);
INSERT INTO `jenisstatus` VALUES (4, 'Jenis Status 04', 'Keterangan .showToast()', '2024-07-30 11:16:57', '2024-07-30 15:49:27', 0);
INSERT INTO `jenisstatus` VALUES (5, 'Jenis Status 05 updated', 'keteranga Jenis Status 05 updated', '2024-07-30 11:19:08', '2024-07-30 15:38:13', 0);
INSERT INTO `jenisstatus` VALUES (6, 'Jenis Status 06', 'Keterangan Jenis Status 06', '2024-07-30 11:23:00', NULL, 0);
INSERT INTO `jenisstatus` VALUES (7, 'Jenis Status 07', 'Keterangan Jenis Status 07', '2024-07-30 11:30:20', NULL, 0);
INSERT INTO `jenisstatus` VALUES (8, 'Jenis Status 08', 'Keterangan Jenis Status 08', '2024-07-30 11:33:38', NULL, 0);
INSERT INTO `jenisstatus` VALUES (9, 'Jenis Status 09', 'Keterangan Jenis Status 09', '2024-07-30 11:36:01', NULL, 0);
INSERT INTO `jenisstatus` VALUES (10, 'Jenis Status 10', 'Keterangan Jenis Status 10', '2024-07-30 12:06:40', NULL, 0);
INSERT INTO `jenisstatus` VALUES (11, 'Jenis Status 11', 'Keterangan Jenis Status 11', '2024-07-30 12:09:38', NULL, 0);
INSERT INTO `jenisstatus` VALUES (12, 'Jenis Status 12', 'Keterangan Jenis Status 12', '2024-07-30 12:12:08', NULL, 0);
INSERT INTO `jenisstatus` VALUES (13, 'Jenis Status 13', 'Keterangan Jenis Status 13', '2024-07-30 12:23:11', NULL, 0);
INSERT INTO `jenisstatus` VALUES (14, 'Jenis Status 14', 'Keterangan Jenis Status 14', '2024-07-30 12:39:29', '2024-07-30 15:49:28', 0);
INSERT INTO `jenisstatus` VALUES (15, 'Jenis Status 15', 'Keterangan Jenis Status 15', '2024-07-30 14:03:28', '2024-07-30 15:49:30', 0);

-- ----------------------------
-- Table structure for lokasiobjekretribusi
-- ----------------------------
DROP TABLE IF EXISTS `lokasiobjekretribusi`;
CREATE TABLE `lokasiobjekretribusi`  (
  `idLokasiObjekRetribusi` int NOT NULL AUTO_INCREMENT,
  `lokasiObjekRetribusi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idLokasiObjekRetribusi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of lokasiobjekretribusi
-- ----------------------------

-- ----------------------------
-- Table structure for objekretribusi
-- ----------------------------
DROP TABLE IF EXISTS `objekretribusi`;
CREATE TABLE `objekretribusi`  (
  `idObjekRetribusi` int NOT NULL AUTO_INCREMENT,
  `idLokasiObjekRetribusi` int NOT NULL,
  `idJenisObjekRetribusi` int NOT NULL,
  `kodeObjekRetribusi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `objekRetribusi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `panjangTanah` decimal(10, 2) NOT NULL,
  `lebarTanah` decimal(10, 2) NOT NULL,
  `luasTanah` decimal(10, 2) NOT NULL,
  `panjangBangunan` decimal(10, 2) NOT NULL,
  `lebarBangunan` decimal(10, 2) NOT NULL,
  `luasBangunan` decimal(10, 2) NOT NULL,
  `subdis_id` int NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `latitute` int NOT NULL,
  `longitude` int NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gambarDenahTanah` blob NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idObjekRetribusi`) USING BTREE,
  INDEX `idLokasiObjekRetribusi`(`idLokasiObjekRetribusi` ASC) USING BTREE,
  INDEX `idJenisObjekRetribusi`(`idJenisObjekRetribusi` ASC) USING BTREE,
  INDEX `subdis_id2`(`subdis_id` ASC) USING BTREE,
  CONSTRAINT `idJenisObjekRetribusi` FOREIGN KEY (`idJenisObjekRetribusi`) REFERENCES `jenisobjekretribusi` (`idJenisObjekRetribusi`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `idLokasiObjekRetribusi` FOREIGN KEY (`idLokasiObjekRetribusi`) REFERENCES `lokasiobjekretribusi` (`idLokasiObjekRetribusi`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `subdis_id2` FOREIGN KEY (`subdis_id`) REFERENCES `subdistricts` (`subdis_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of objekretribusi
-- ----------------------------

-- ----------------------------
-- Table structure for pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `pekerjaan`;
CREATE TABLE `pekerjaan`  (
  `idPekerjaan` int NOT NULL AUTO_INCREMENT,
  `namaPekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idPekerjaan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pekerjaan
-- ----------------------------

-- ----------------------------
-- Table structure for permohonansewa
-- ----------------------------
DROP TABLE IF EXISTS `permohonansewa`;
CREATE TABLE `permohonansewa`  (
  `idPermohonanSewa` int NOT NULL AUTO_INCREMENT,
  `idJenisPermohonan` int NOT NULL,
  `nomorSuratPermohonan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idWajibRetribusi` int NOT NULL,
  `idObjekRetribusi` int NOT NULL,
  `idjangkaWaktuSewa` int NOT NULL,
  `idPeruntukanSewa` int NOT NULL,
  `idStatus` int NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idPermohonanSewa`) USING BTREE,
  INDEX `idJenisPermohonan`(`idJenisPermohonan` ASC) USING BTREE,
  INDEX `idWajibRetribusi`(`idWajibRetribusi` ASC) USING BTREE,
  INDEX `idObjekRetribusi2`(`idObjekRetribusi` ASC) USING BTREE,
  INDEX `idjangkaWaktuSewa`(`idjangkaWaktuSewa` ASC) USING BTREE,
  INDEX `idPeruntukanSewa`(`idPeruntukanSewa` ASC) USING BTREE,
  INDEX `idStatus`(`idStatus` ASC) USING BTREE,
  CONSTRAINT `idjangkaWaktuSewa` FOREIGN KEY (`idjangkaWaktuSewa`) REFERENCES `jangkawaktusewa` (`idJangkaWaktuSewa`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `idJenisPermohonan` FOREIGN KEY (`idJenisPermohonan`) REFERENCES `jenispermohonan` (`idJenisPermohonan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `idObjekRetribusi2` FOREIGN KEY (`idObjekRetribusi`) REFERENCES `objekretribusi` (`idObjekRetribusi`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `idPeruntukanSewa` FOREIGN KEY (`idPeruntukanSewa`) REFERENCES `peruntukansewa` (`idperuntukanSewa`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `idStatus` FOREIGN KEY (`idStatus`) REFERENCES `status` (`idStatus`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `idWajibRetribusi` FOREIGN KEY (`idWajibRetribusi`) REFERENCES `wajibretribusi` (`idWajibRetribusi`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permohonansewa
-- ----------------------------

-- ----------------------------
-- Table structure for peruntukansewa
-- ----------------------------
DROP TABLE IF EXISTS `peruntukansewa`;
CREATE TABLE `peruntukansewa`  (
  `idperuntukanSewa` int NOT NULL AUTO_INCREMENT,
  `idjenisKegiatan` int NOT NULL,
  `peruntukanSewa` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idperuntukanSewa`) USING BTREE,
  INDEX `idjenisKegiatan`(`idjenisKegiatan` ASC) USING BTREE,
  CONSTRAINT `idjenisKegiatan` FOREIGN KEY (`idjenisKegiatan`) REFERENCES `jeniskegiatan` (`idjenisKegiatan`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of peruntukansewa
-- ----------------------------

-- ----------------------------
-- Table structure for photoobjekretribusi
-- ----------------------------
DROP TABLE IF EXISTS `photoobjekretribusi`;
CREATE TABLE `photoobjekretribusi`  (
  `idObjekRetribusi` int NOT NULL AUTO_INCREMENT,
  `photoObjekRetribusi` blob NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idObjekRetribusi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of photoobjekretribusi
-- ----------------------------

-- ----------------------------
-- Table structure for provinces
-- ----------------------------
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces`  (
  `prov_id` int NOT NULL AUTO_INCREMENT,
  `prov_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `locationid` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`prov_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of provinces
-- ----------------------------

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `idStatus` int NOT NULL AUTO_INCREMENT,
  `idJenisStatus` int NOT NULL,
  `namaStatus` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idStatus`) USING BTREE,
  INDEX `idJenisStatus`(`idJenisStatus` ASC) USING BTREE,
  CONSTRAINT `idJenisStatus` FOREIGN KEY (`idJenisStatus`) REFERENCES `jenisstatus` (`idJenisStatus`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, 1, 'Status 01', 'Keterangan Status 01', '2024-07-30 14:05:52', NULL, 0);
INSERT INTO `status` VALUES (2, 1, 'Status 02', 'Keterangan Status 02', '2024-07-30 14:18:15', NULL, 0);
INSERT INTO `status` VALUES (3, 2, 'Status 03', 'Keterangan Status 03', '2024-07-30 14:35:45', NULL, 0);
INSERT INTO `status` VALUES (4, 8, 'Status 04 update', 'Keterangan Status 04 update', '2024-07-30 15:39:55', '2024-07-30 15:50:24', 1);

-- ----------------------------
-- Table structure for subdistricts
-- ----------------------------
DROP TABLE IF EXISTS `subdistricts`;
CREATE TABLE `subdistricts`  (
  `subdis_id` int NOT NULL AUTO_INCREMENT,
  `subdis_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dis_id` int NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`subdis_id`) USING BTREE,
  INDEX `dis_id`(`dis_id` ASC) USING BTREE,
  CONSTRAINT `dis_id` FOREIGN KEY (`dis_id`) REFERENCES `districts` (`dis_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of subdistricts
-- ----------------------------

-- ----------------------------
-- Table structure for tarifobjekretribusi
-- ----------------------------
DROP TABLE IF EXISTS `tarifobjekretribusi`;
CREATE TABLE `tarifobjekretribusi`  (
  `idTarifObjekRetribusi` int NOT NULL AUTO_INCREMENT,
  `idObjekRetribusi` int NOT NULL,
  `idJenisJangkaWaktu` int NOT NULL,
  `nominalTarif` float NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idTarifObjekRetribusi`) USING BTREE,
  INDEX `idObjekRetribusi`(`idObjekRetribusi` ASC) USING BTREE,
  INDEX `idJenisJangkaWaktu2`(`idJenisJangkaWaktu` ASC) USING BTREE,
  CONSTRAINT `idJenisJangkaWaktu2` FOREIGN KEY (`idJenisJangkaWaktu`) REFERENCES `jenisjangkawaktu` (`idJenisJangkaWaktu`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `idObjekRetribusi` FOREIGN KEY (`idObjekRetribusi`) REFERENCES `objekretribusi` (`idObjekRetribusi`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tarifobjekretribusi
-- ----------------------------

-- ----------------------------
-- Table structure for wajibretribusi
-- ----------------------------
DROP TABLE IF EXISTS `wajibretribusi`;
CREATE TABLE `wajibretribusi`  (
  `idWajibRetribusi` int NOT NULL AUTO_INCREMENT,
  `namaWajibRetribusi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idPekerjaan` int NOT NULL,
  `subdis_id` int NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idWajibRetribusi`) USING BTREE,
  INDEX `idPekerjaan`(`idPekerjaan` ASC) USING BTREE,
  INDEX `subdis_id`(`subdis_id` ASC) USING BTREE,
  CONSTRAINT `idPekerjaan` FOREIGN KEY (`idPekerjaan`) REFERENCES `pekerjaan` (`idPekerjaan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `subdis_id` FOREIGN KEY (`subdis_id`) REFERENCES `subdistricts` (`subdis_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of wajibretribusi
-- ----------------------------

-- ----------------------------
-- Table structure for JenisRetribusi
-- ----------------------------

CREATE TABLE `JenisRetribusi` (
  `idJenisRetribusi` int NOT null AUTO_INCREMENT,
  `JenisRetribusi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idJenisRetribusi`) USING BTREE
)

select * from JenisRetribusi


-- ----------------------------
-- Table structure for JenisUser
-- ----------------------------
CREATE TABLE `jenisUser` (
  `idJenisUser` int NOT NULL,
  `jenisUser` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0
  PRIMARY KEY (`idJenisUser`) USING BTREE
)


-- ----------------------------
-- Table structure for Jabatan
-- ----------------------------
CREATE TABLE `jabatan` (
  `idJabatan` int NOT null AUTO_INCREMENT,
  `jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`idJabatan`) USING BTREE
)

select * from jabatan j

-- ----------------------------
-- Table structure for Departemen
-- ----------------------------

CREATE TABLE `departemen` (
  `idDepartemen` int NOT NULL,
  `namaDepartmen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT NULL,
  `updateAt` timestamp NULL DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idDepartemen`) USING BTREE
)
select * from departemen d 

-- ----------------------------
-- Table structure for Bidang
-- ----------------------------
CREATE TABLE `bidang` (
  `idBidang` int NOT NULL,
  `idDepartemen` int NOT NULL,
  `parentBidang` int NOT NULL,
  `namaBidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `createAt` timestamp NULL DEFAULT NULL,
  `updateAt` timestamp NULL DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idBidang`) USING BTREE,
  KEY `idDepartemen` (`idDepartemen`) USING BTREE,
  CONSTRAINT `idDepartemen` FOREIGN KEY (`idDepartemen`) REFERENCES `departemen` (`idDepartemen`) ON DELETE RESTRICT ON UPDATE RESTRICT
)

select * from bidang b 
-- ----------------------------
-- Procedure structure for cbo_JenisStatus
-- ----------------------------
DROP PROCEDURE IF EXISTS `cbo_JenisStatus`;
delimiter ;;
CREATE PROCEDURE `cbo_JenisStatus`()
BEGIN
	#Routine body goes here...
	SELECT
		jenisstatus.idJenisStatus,
		jenisstatus.jenisStatus
	FROM
		jenisstatus
	WHERE
		jenisstatus.isDeleted = 0;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_jenisStatus
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_jenisStatus`;
delimiter ;;
CREATE PROCEDURE `delete_jenisStatus`(IN `id` int)
BEGIN
	#Routine body goes here...
	UPDATE jenisstatus SET jenisstatus.isDeleted = 1, jenisstatus.updateAt = NOW()
	WHERE jenisstatus.idJenisStatus = id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for delete_status
-- ----------------------------
DROP PROCEDURE IF EXISTS `delete_status`;
delimiter ;;
CREATE PROCEDURE `delete_status`(IN `id` int)
BEGIN
	#Routine body goes here...
	UPDATE `status` SET `status`.isDeleted = 1, `status`.updateAt=NOW()
	WHERE `status`.idStatus=id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_jenisStatus
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_jenisStatus`;
delimiter ;;
CREATE PROCEDURE `insert_jenisStatus`(IN `dataJenisStatus` JSON)
BEGIN
	#Routine body goes here...
	SET @jenisStatus = JSON_UNQUOTE(JSON_EXTRACT(dataJenisStatus,'$.JenisStatus'));
	SET @keterangan = JSON_UNQUOTE(JSON_EXTRACT(dataJenisStatus,'$.Keterangan'));

	INSERT INTO jenisstatus(jenisstatus.jenisStatus, jenisstatus.keterangan)
	VALUES(@jenisStatus, @keterangan);
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insert_status
-- ----------------------------
DROP PROCEDURE IF EXISTS `insert_status`;
delimiter ;;
CREATE PROCEDURE `insert_status`(IN `dataStatus` JSON)
BEGIN
	#Routine body goes here...
	SET @jenisStatus = JSON_UNQUOTE(JSON_EXTRACT(dataStatus,'$.JenisStatus'));
	SET @namaStatus = JSON_UNQUOTE(JSON_EXTRACT(dataStatus,'$.Status'));
	SET @keterangan = JSON_UNQUOTE(JSON_EXTRACT(dataStatus,'$.Keterangan'));
	
	INSERT INTO `status`(`status`.namaStatus, `status`.idJenisStatus, `status`.keterangan)
	VALUES(@namaStatus, @jenisStatus, @keterangan);
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_jenisStatus
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_jenisStatus`;
delimiter ;;
CREATE PROCEDURE `update_jenisStatus`(IN `dataJenisStatus` JSON)
BEGIN
	#Routine body goes here...
	SET @idJenisStatus= JSON_UNQUOTE(JSON_EXTRACT(dataJenisStatus,'$.IdJenisStatus'));
	SET @jenisStatus= JSON_UNQUOTE(JSON_EXTRACT(dataJenisStatus,'$.JenisStatus'));
	SET @keterangan = JSON_UNQUOTE(JSON_EXTRACT(dataJenisStatus,'$.Keterangan'));

	UPDATE jenisstatus SET jenisstatus.jenisStatus = @jenisStatus, jenisstatus.keterangan = @keterangan, jenisstatus.updateAt = NOW()
	WHERE jenisstatus.idJenisStatus = @idJenisStatus;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update_status
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_status`;
delimiter ;;
CREATE PROCEDURE `update_status`(IN `dataStatus` JSON)
BEGIN
	#Routine body goes here...
	SET @idStatus = JSON_UNQUOTE(JSON_EXTRACT(dataStatus,'$.IdStatus'));
	SET @jenisStatus = JSON_UNQUOTE(JSON_EXTRACT(dataStatus,'$.IdJenisStatus'));
	SET @namaStatus = JSON_UNQUOTE(JSON_EXTRACT(dataStatus,'$.Status'));
	SET @keterangan = JSON_UNQUOTE(JSON_EXTRACT(dataStatus,'$.Keterangan'));
	
	UPDATE `status` SET `status`.namaStatus=@namaStatus, `status`.idJenisStatus=@jenisStatus, `status`.keterangan=@keterangan, `status`.updateAt=NOW()
	WHERE `status`.idStatus=@idStatus;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for viewAll_JenisStatus
-- ----------------------------
DROP PROCEDURE IF EXISTS `viewAll_JenisStatus`;
delimiter ;;
CREATE PROCEDURE `viewAll_JenisStatus`()
BEGIN
	#Routine body goes here...
SELECT
	jenisstatus.idJenisStatus, 
	jenisstatus.jenisStatus, 
	jenisstatus.keterangan
FROM
	jenisstatus
WHERE
	jenisstatus.isDeleted = 0;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for viewAll_status
-- ----------------------------
DROP PROCEDURE IF EXISTS `viewAll_status`;
delimiter ;;
CREATE PROCEDURE `viewAll_status`()
BEGIN
	#Routine body goes here...
SELECT
	`status`.idStatus,
	`status`.namaStatus, 
	jenisstatus.jenisStatus, 
	`status`.keterangan
FROM
	jenisstatus
	INNER JOIN
	`status`
	ON 
		jenisstatus.idJenisStatus = `status`.idJenisStatus
WHERE
	`status`.isDeleted = 0;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for view_jenisStatusById
-- ----------------------------
DROP PROCEDURE IF EXISTS `view_jenisStatusById`;
delimiter ;;
CREATE PROCEDURE `view_jenisStatusById`(IN `id` int)
BEGIN
	#Routine body goes here...
SELECT
	jenisstatus.idJenisStatus, 
	jenisstatus.jenisStatus, 
	jenisstatus.keterangan
FROM
	jenisstatus
WHERE
	jenisstatus.idJenisStatus = id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for view_statusById
-- ----------------------------
DROP PROCEDURE IF EXISTS `view_statusById`;
delimiter ;;
CREATE PROCEDURE `view_statusById`(IN `id` int)
BEGIN
	#Routine body goes here...
SELECT
	`status`.idStatus, 
	`status`.`namaStatus`, 
	`status`.idJenisStatus, 
	jenisstatus.jenisStatus, 
	`status`.keterangan
FROM
	`status`
	INNER JOIN
	jenisstatus
	ON 
		`status`.idJenisStatus = jenisstatus.idJenisStatus
WHERE
	`status`.idStatus = id;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
