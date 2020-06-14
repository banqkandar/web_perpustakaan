/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.28-MariaDB : Database - perpus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`perpus` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `perpus`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `no_tlp` varchar(20) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`nama`,`no_tlp`,`alamat`,`username`,`password`) values 
(1,'usep','0892389','medan','admin','admin');

/*Table structure for table `anggota` */

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `no_anggota` int(3) NOT NULL AUTO_INCREMENT,
  `nim` varchar(15) DEFAULT NULL,
  `nama_anggota` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` varchar(75) DEFAULT NULL,
  `jk` enum('l','p') DEFAULT NULL,
  `prodi` varchar(20) DEFAULT NULL,
  `status_peminjaman` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`no_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `anggota` */

insert  into `anggota`(`no_anggota`,`nim`,`nama_anggota`,`no_telp`,`alamat`,`jk`,`prodi`,`status_peminjaman`) values 
(1,'10116100','Ilham Ramadhan','0892123829','Banjaran','l','Teknik Informatika','Tidak Pinjam'),
(2,'10116107','Adi Aprilriyan R','0829392392','Lembang','l','Teknik Informatika','Pinjam'),
(3,'10116109','Ryan Yusup H','0829384948','Lembang','l','Teknik Informatika','Pinjam'),
(4,'10116113','Akbar Firliansyah','0893849289','Bekasi','l','Teknik Informatika','Pinjam'),
(5,'10116121','M.Iskandar','0812394848','Medan','l','Teknik Informatika','Pinjam'),
(7,'10116122','Iqbal Dwi cahyo','0892123821','Banten','l','Teknik Informatika','Tidak Pinjam'),
(8,'10116123','Aini Izza','08928545','Banten','p','Sistem Informasi','Tidak Pinjam'),
(9,'10116124','Al Ghani Iqbal','012893832','Solo','l','Sistem Informasi','Tidak Pinjam'),
(10,'10116125','Erry Nurhadiansyah','019289898','Subang','l','Teknik Informatika','pinnjam'),
(11,'10116126','asep galon','098765456789','banjaran','l','Sistem Informasi','Pinjam'),
(12,'10116096','Aa Suhendar','089238478','Lembang','l','Teknik Informatika','Pinjam');

/*Table structure for table `Petugas` */

DROP TABLE IF EXISTS `petugas`;

CREATE TABLE `petugas` (
  `id_petugas` int(3) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(50) DEFAULT NULL,
  `no_telp_petugas` varchar(15) DEFAULT NULL,
  `alamat_petugas` varchar(75) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `id_admin` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `petugas` */

insert  into `petugas`(`id_petugas`,`nama_petugas`,`no_telp_petugas`,`alamat_petugas`,`username`,`password`,`id_admin`) values 
(1,'Ilham Ramadhan','0891293821','Banjaran','ilham','ilham',NULL),
(2,'Ryan Yusup','0829383942','Lembang','ryan','ryan',NULL),
(3,'Mohamad Iskandar','0829392839','Medan','iskandar','iskandar',NULL),
(4,'Akbar Firliansyah','08221627839','Bandung-Bekasi','akbars','akbars',NULL),
(5,'refaldi','081321671872','lembang','reval','fauzan',NULL);

/*Table structure for table `Petugas` */

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `kode_buku` int(3) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `kategori` varchar(25) DEFAULT NULL,
  `tahun_terbit` varchar(4) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `lokasi` enum('rak1','rak2','rak3') DEFAULT NULL,
  `id_petugas` int(3) DEFAULT NULL,
  PRIMARY KEY (`kode_buku`),
  KEY `id_petugas` (`id_petugas`),
  CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `buku` */

insert  into `buku`(`kode_buku`,`judul`,`kategori`,`tahun_terbit`,`penerbit`,`pengarang`,`isbn`,`lokasi`,`id_petugas`) values 
(1,'Materi Dakwah untuk para dai','Agama','1989','Risaalahpress','A Zakariya','123','rak1',1),
(3,'Belajar CodeIgniter','Teknologi','2013','Erlangga','Iskandar','2839129ci','rak1',2),
(6,'Belajar Css dengan mudah','Teknologi','2014','Elex media','Ryan Y','23984729css','rak2',2),
(7,'Home','Agama','2003','Risalah Press','Asep Galon','bdg02938','rak1',1),
(8,'Belajar PHP mudah ','Agama','2006','IlhamPress','Saha sok ','aisdhih289238','rak3',3),
(9,'qwe','weq','2012','weq','we','qwe','rak3',2),
(10,'Berbagi Ilmu PHP','Teknologi','2008','RyanGambus','Ryan Yusup','1527638gmbs','rak2',2);

/*Table structure for table `peminjaman` */

DROP TABLE IF EXISTS `peminjaman`;

CREATE TABLE `peminjaman` (
  `no_peminjaman` int(3) NOT NULL AUTO_INCREMENT,
  `tgl_peminjaman` date DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `no_anggota` int(3) DEFAULT NULL,
  `kode_buku` int(3) DEFAULT NULL,
  PRIMARY KEY (`no_peminjaman`),
  KEY `no_anggota` (`no_anggota`),
  KEY `kode_buku` (`kode_buku`),
  CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`no_anggota`) REFERENCES `anggota` (`no_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `peminjaman` */

insert  into `peminjaman`(`no_peminjaman`,`tgl_peminjaman`,`tgl_pengembalian`,`no_anggota`,`kode_buku`) values 
(1,'2018-06-21','2018-06-28',1,3),
(3,'2018-06-15','2018-06-22',7,8),
(5,'2018-06-23','2018-06-30',8,6);

/*Table structure for table `pengembalian` */

DROP TABLE IF EXISTS `pengembalian`;

CREATE TABLE `pengembalian` (
  `no_pengembalian` int(3) NOT NULL AUTO_INCREMENT,
  `tgl_dikembalikan` date DEFAULT NULL,
  `status_keterlambatan` varchar(20) DEFAULT NULL,
  `terlambat` int(3) DEFAULT NULL,
  `denda` int(10) DEFAULT NULL,
  `no_peminjaman` int(3) DEFAULT NULL,
  PRIMARY KEY (`no_pengembalian`),
  UNIQUE KEY `no_peminjaman_2` (`no_peminjaman`),
  KEY `no_peminjaman` (`no_peminjaman`),
  CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`no_peminjaman`) REFERENCES `peminjaman` (`no_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `pengembalian` */

insert  into `pengembalian`(`no_pengembalian`,`tgl_dikembalikan`,`status_keterlambatan`,`terlambat`,`denda`,`no_peminjaman`) values 
(3,'2018-07-01','Terlambat',1,1000,5),
(4,'2018-06-28','Terlambat',6,6000,3),
(6,'2018-06-26',' Tidak Terlambat',0,0,1);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
