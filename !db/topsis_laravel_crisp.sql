/*
SQLyog Ultimate v9.50 
MySQL - 5.5.5-10.4.22-MariaDB : Database - topsis_laravel_crisp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`topsis_laravel_crisp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `topsis_laravel_crisp`;

/*Table structure for table `tb_alternatif` */

DROP TABLE IF EXISTS `tb_alternatif`;

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_alternatif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_alternatif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_alternatif` */

insert  into `tb_alternatif`(`kode_alternatif`,`nama_alternatif`,`keterangan`,`total`,`rank`,`created_at`,`updated_at`) values ('A01','Alternatif 1',NULL,0.52706975203165,3,'2023-06-07 23:43:04','2023-06-07 23:46:00'),('A02','Alternatif 2',NULL,0.29360801332784,5,'2023-06-07 23:43:08','2023-06-07 23:46:00'),('A03','Alternatif 3',NULL,0.30100029454723,4,'2023-06-07 23:43:13','2023-06-07 23:46:00'),('A04','Alternatif 4',NULL,0.75998236029425,1,'2023-06-07 23:43:18','2023-06-07 23:46:00'),('A05','Alternatif 5',NULL,0.71107325085982,2,'2023-06-07 23:43:23','2023-06-07 23:46:00');

/*Table structure for table `tb_crisp` */

DROP TABLE IF EXISTS `tb_crisp`;

CREATE TABLE `tb_crisp` (
  `id_crisp` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_crisp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_kriteria` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bobot_crisp` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_crisp`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_crisp` */

insert  into `tb_crisp`(`id_crisp`,`nama_crisp`,`kode_kriteria`,`bobot_crisp`,`created_at`,`updated_at`) values (1,'Rendah','C01',1,'2023-06-07 23:38:44','2023-06-07 23:38:44'),(2,'Tinggi','C01',5,'2023-06-07 23:38:48','2023-06-07 23:39:25'),(3,'Rendah','C02',1,'2023-06-07 23:38:55','2023-06-07 23:38:55'),(4,'Tinggi','C02',5,'2023-06-07 23:38:59','2023-06-07 23:38:59'),(5,'Tinggi','C03',5,'2023-06-07 23:39:04','2023-06-07 23:39:04'),(6,'Rendah','C03',1,'2023-06-07 23:39:08','2023-06-07 23:39:08'),(7,'Rendah','C04',1,'2023-06-07 23:39:14','2023-06-07 23:39:14'),(8,'Tinggi','C04',5,'2023-06-07 23:39:19','2023-06-07 23:39:19'),(9,'Sedang','C01',3,'2023-06-07 23:39:19','2023-06-07 23:39:19'),(10,'Sedang','C02',3,'2023-06-07 23:39:19','2023-06-07 23:39:19'),(11,'Sedang','C03',3,'2023-06-07 23:39:19','2023-06-07 23:39:19'),(12,'Sedang','C04',3,'2023-06-07 23:39:19','2023-06-07 23:39:19');

/*Table structure for table `tb_kriteria` */

DROP TABLE IF EXISTS `tb_kriteria`;

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kriteria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  `atribut` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_kriteria` */

insert  into `tb_kriteria`(`kode_kriteria`,`nama_kriteria`,`bobot`,`atribut`,`created_at`,`updated_at`) values ('C01','Kriteria 1',1,'benefit','2023-06-07 23:34:27','2023-06-07 23:34:27'),('C02','Kriteria 2',2,'benefit','2023-06-07 23:34:34','2023-06-07 23:34:34'),('C03','Kriteria 3',3,'cost','2023-06-07 23:34:41','2023-06-07 23:34:41'),('C04','Kriteria 4',4,'cost','2023-06-07 23:34:48','2023-06-07 23:34:48');

/*Table structure for table `tb_rel_alternatif` */

DROP TABLE IF EXISTS `tb_rel_alternatif`;

CREATE TABLE `tb_rel_alternatif` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_alternatif` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_kriteria` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_crisp` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_rel_alternatif` */

insert  into `tb_rel_alternatif`(`ID`,`kode_alternatif`,`kode_kriteria`,`id_crisp`,`created_at`,`updated_at`) values (1,'A01','C01',9,NULL,NULL),(2,'A01','C02',10,NULL,NULL),(3,'A01','C03',6,NULL,NULL),(4,'A01','C04',8,NULL,NULL),(8,'A02','C01',2,NULL,NULL),(9,'A02','C02',3,NULL,NULL),(10,'A02','C03',5,NULL,NULL),(11,'A02','C04',12,NULL,NULL),(15,'A03','C01',2,NULL,NULL),(16,'A03','C02',3,NULL,NULL),(17,'A03','C03',11,NULL,NULL),(18,'A03','C04',8,NULL,NULL),(22,'A04','C01',2,NULL,NULL),(23,'A04','C02',3,NULL,NULL),(24,'A04','C03',6,NULL,NULL),(25,'A04','C04',7,NULL,NULL),(29,'A05','C01',2,NULL,NULL),(30,'A05','C02',10,NULL,NULL),(31,'A05','C03',6,NULL,NULL),(32,'A05','C04',12,NULL,NULL);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `tb_user_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`nama_user`,`username`,`password`,`level`,`status_user`,`created_at`,`updated_at`) values (1,'Administrator','admin','$2y$10$81/jWnT9DSc1rW.BD3r0Ue55u3oGrVhT0bqjYEvFRtsUndrcvBwRO','Admin',1,NULL,NULL),(2,'Manager','manager','$2y$10$zsgoYFNYH3zfkHXnITEzzuAJ6w3rhD.7U9b6h3x89cASZfY7omvNq','Manager',1,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
