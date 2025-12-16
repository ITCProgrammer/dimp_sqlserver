/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : localhost:3307
Source Database       : inventory

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2017-10-19 08:00:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for app_users
-- ----------------------------
DROP TABLE IF EXISTS `app_users`;
CREATE TABLE `app_users` (
  `id_users` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1=admin ,2=pihak jurusan ,3=pegawai ,4=mahasiswa',
  `last_login` datetime NOT NULL,
  `dept_code` char(3) NOT NULL,
  `email` varchar(40) default NULL,
  PRIMARY KEY  (`id_users`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_users
-- ----------------------------
INSERT INTO `app_users` VALUES ('1', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '2017-10-19 05:00:54', 'ALL', 'bintoro.dy@indotaichen.com');
INSERT INTO `app_users` VALUES ('2', 'dit', 'akun dit', '7e0406ac63609197fdc77b1b473e0b97', '3', '2017-10-17 22:36:46', 'DIT', 'itsupport@indotaichen.com');

-- ----------------------------
-- Table structure for departments
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `code` char(3) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES ('ACC', 'ACCOUNTING');
INSERT INTO `departments` VALUES ('BRS', 'BRUSHING');
INSERT INTO `departments` VALUES ('DIT', 'DATA & INFORMATIKA');

-- ----------------------------
-- Table structure for dept_device
-- ----------------------------
DROP TABLE IF EXISTS `dept_device`;
CREATE TABLE `dept_device` (
  `id` int(11) NOT NULL auto_increment,
  `type_id` int(11) NOT NULL,
  `dept_code` char(3) NOT NULL,
  `device_code` varchar(20) NOT NULL,
  `merk` varchar(30) default NULL,
  `type` varchar(30) default NULL,
  `pc_connect` varchar(20) default NULL,
  `madein` varchar(30) default NULL,
  `production_year` char(4) default NULL,
  `sn` varchar(40) default NULL,
  `capacity` varchar(30) default NULL,
  `mb_merk` varchar(20) default NULL,
  `mb_type` varchar(20) default NULL,
  `prosesor_merk` varchar(20) default NULL,
  `prosesor_spec` varchar(30) default NULL,
  `ram_merk` varchar(20) default NULL,
  `ram_spec` varchar(20) default NULL,
  `ram_gb` int(2) default NULL,
  `hdd_merk` varchar(20) default NULL,
  `hdd_spec` varchar(30) default NULL,
  `hdd_gb` int(2) default NULL,
  `os` varchar(100) default NULL,
  `os_license` varchar(100) default NULL,
  `office_software` varchar(200) default NULL,
  `office_license` varchar(100) default NULL,
  `other_software` varchar(200) default NULL,
  `antivirus` varchar(200) default NULL,
  `av_license` varchar(100) default NULL,
  `nama_pengguna` varchar(30) default NULL,
  `computer_name` varchar(30) default NULL,
  `ip_address` varchar(30) default NULL,
  `mac_address` varchar(30) default NULL,
  `location` varchar(30) default NULL,
  `keterangan` varchar(200) default NULL,
  `bpp_no` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dept_device
-- ----------------------------
INSERT INTO `dept_device` VALUES ('1', '2', 'DIT', 'LTP01', '', '', '', 'china', '2000', '12324324', 'fgdfg', 'intel', 'indome', 'Intel', 'Core i5', 'visio', 'DDR2', '6', 'segeate', 'RAID5', '500', 'Windows_10_Pro_64bit', 'rgsdfgsdfg', '2016', 'fdfadfadf', 'macem2', 'smadav', 'dfsdfdf', 'bintoro', 'dit', '192.168.0.1', 'sdfdfdsf', 'dit room', 'percobaan', '3232');

-- ----------------------------
-- Table structure for device_type
-- ----------------------------
DROP TABLE IF EXISTS `device_type`;
CREATE TABLE `device_type` (
  `jenis_id` smallint(1) NOT NULL auto_increment,
  `jenis` varchar(15) NOT NULL,
  PRIMARY KEY  (`jenis_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of device_type
-- ----------------------------
INSERT INTO `device_type` VALUES ('1', 'PC');
INSERT INTO `device_type` VALUES ('2', 'Laptop');
INSERT INTO `device_type` VALUES ('3', 'Printer');
INSERT INTO `device_type` VALUES ('4', 'Scan Barcode');

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `level_id` smallint(6) NOT NULL,
  `level_keterangan` varchar(20) default NULL,
  PRIMARY KEY  (`level_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES ('1', 'Admin');
INSERT INTO `level` VALUES ('2', 'Manager');
INSERT INTO `level` VALUES ('3', 'Staff');

-- ----------------------------
-- Table structure for mainmenu
-- ----------------------------
DROP TABLE IF EXISTS `mainmenu`;
CREATE TABLE `mainmenu` (
  `id_mainmenu` int(11) NOT NULL auto_increment,
  `nama_mainmenu` varchar(100) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `link` varchar(50) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1= admin,2=jurusan,3 dosen',
  PRIMARY KEY  (`id_mainmenu`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mainmenu
-- ----------------------------
INSERT INTO `mainmenu` VALUES ('1', 'master data', 'fa fa-bar-chart-o', 'y', '#', '1');
INSERT INTO `mainmenu` VALUES ('2', 'proses', 'fa fa-building-o', 't', '#', '1');
INSERT INTO `mainmenu` VALUES ('3', 'data', 'gi gi-address_book', 'y', '#', '1');
INSERT INTO `mainmenu` VALUES ('4', 'users', 'gi gi-qrcode', 'y', 'users', '1');
INSERT INTO `mainmenu` VALUES ('5', 'laporan', 'gi gi-notes_2', 't', '#', '1');
INSERT INTO `mainmenu` VALUES ('6', 'data', 'gi gi-address_book', 'y', '#', '2');
INSERT INTO `mainmenu` VALUES ('7', 'laporan', 'gi gi-notes_2', 't', '#', '2');
INSERT INTO `mainmenu` VALUES ('8', 'master data', 'fa fa-bar-chart-o', 't', '#', '3');
INSERT INTO `mainmenu` VALUES ('9', 'proses', 'fa fa-building-o', 't', '#', '3');
INSERT INTO `mainmenu` VALUES ('10', 'data', 'gi gi-address_book', 'y', '#', '3');
INSERT INTO `mainmenu` VALUES ('11', 'laporan', 'gi gi-notes_2', 't', '#', '3');

-- ----------------------------
-- Table structure for os
-- ----------------------------
DROP TABLE IF EXISTS `os`;
CREATE TABLE `os` (
  `os_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of os
-- ----------------------------
INSERT INTO `os` VALUES ('Windows_XP_Pro_ 32bit');
INSERT INTO `os` VALUES ('Windows_XP_Pro_64bit');
INSERT INTO `os` VALUES ('Windows_Vista_32bit');
INSERT INTO `os` VALUES ('Windows_Vista_64bit');
INSERT INTO `os` VALUES ('Windows_7_Pro_32bit');
INSERT INTO `os` VALUES ('Windows_7_Pro_64bit');
INSERT INTO `os` VALUES ('Windows_7_Ultimate_32bit');
INSERT INTO `os` VALUES ('Windows_7_Ultimate_64bit');
INSERT INTO `os` VALUES ('Windows_8_32bit');
INSERT INTO `os` VALUES ('Windows_8_64bit');
INSERT INTO `os` VALUES ('Windows_8.1_32bit');
INSERT INTO `os` VALUES ('Windows_8.1_64bit');
INSERT INTO `os` VALUES ('Windows_10_Pro_32bit');
INSERT INTO `os` VALUES ('Windows_10_Pro_64bit');
INSERT INTO `os` VALUES ('Windows_Server_2003_R2');
INSERT INTO `os` VALUES ('Windows_Server_2012_R2');
INSERT INTO `os` VALUES ('FreeBSD');
INSERT INTO `os` VALUES ('Linux_Centos_7_64bit');

-- ----------------------------
-- Table structure for submenu
-- ----------------------------
DROP TABLE IF EXISTS `submenu`;
CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL auto_increment,
  `id_mainmenu` int(11) NOT NULL,
  `nama_submenu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `icon` varchar(30) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY  (`id_submenu`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of submenu
-- ----------------------------
INSERT INTO `submenu` VALUES ('1', '1', 'departments', 'dept', 'y', 'fa fa-puzzle-piece', '1');
INSERT INTO `submenu` VALUES ('2', '1', 'device type', 'type', 'y', 'gi gi-notes', '1');
INSERT INTO `submenu` VALUES ('3', '1', 'supplier', 'supplier', 'y', 'gi gi-cargo', '1');
INSERT INTO `submenu` VALUES ('4', '1', 'design', 'design', 't', 'fa fa-keyboard-o', '1');
INSERT INTO `submenu` VALUES ('5', '2', 'purchase order', 'po', 't', 'gi gi-book_open', '1');
INSERT INTO `submenu` VALUES ('6', '2', 'kartu kerja', 'kartukerja/order', 't', 'fa fa-keyboard-o', '1');
INSERT INTO `submenu` VALUES ('7', '2', 'stock opname', 'opname', 't', 'gi gi-cart_in', '1');
INSERT INTO `submenu` VALUES ('8', '3', 'dimp', 'dimp', 'y', 'gi gi-notes_2', '1');
INSERT INTO `submenu` VALUES ('9', '3', 'stock masuk', 'stockin', 't', 'gi gi-notes', '1');
INSERT INTO `submenu` VALUES ('10', '3', 'stock keluar', 'stockout', 't', 'gi gi-notes', '1');
INSERT INTO `submenu` VALUES ('11', '3', 'lost pasta', 'pasta', 't', 'fa fa-money', '1');
INSERT INTO `submenu` VALUES ('12', '5', 'laporan stock', 'rptstock', 't', 'hi hi-list-alt', '1');
INSERT INTO `submenu` VALUES ('13', '5', 'laporan produksi', 'rptproduksi', 't', 'hi hi-list-alt', '1');
INSERT INTO `submenu` VALUES ('14', '5', 'laporan lost pasta', 'rptpasta', 't', 'hi hi-list-alt', '1');
INSERT INTO `submenu` VALUES ('15', '6', 'stock obat', 'stock', 't', 'gi gi-notes_2', '2');
INSERT INTO `submenu` VALUES ('16', '6', 'stock masuk', 'stockin', 't', 'gi gi-notes', '2');
INSERT INTO `submenu` VALUES ('17', '6', 'stock keluar', 'stockout', 't', 'gi gi-notes', '2');
INSERT INTO `submenu` VALUES ('18', '6', 'lost pasta', 'pasta', 't', 'fa fa-money', '2');
INSERT INTO `submenu` VALUES ('19', '7', 'laporan stock', 'rptstock', 't', 'hi hi-list-alt', '2');
INSERT INTO `submenu` VALUES ('20', '7', 'laporan produksi', 'rptproduksi', 't', 'hi hi-list-alt', '2');
INSERT INTO `submenu` VALUES ('21', '7', 'laporan lost pasta', 'rptpasta', 't', 'hi hi-list-alt', '2');
INSERT INTO `submenu` VALUES ('22', '8', 'supplier', 'supplier', 't', 'gi gi-cargo', '3');
INSERT INTO `submenu` VALUES ('23', '8', 'obat', 'obat', 't', 'gi gi-notes', '3');
INSERT INTO `submenu` VALUES ('24', '8', 'mesin', 'mesin', 't', 'fa fa-puzzle-piece', '3');
INSERT INTO `submenu` VALUES ('25', '8', 'design', 'design', 't', 'fa fa-keyboard-o', '3');
INSERT INTO `submenu` VALUES ('26', '9', 'purchase order', 'po', 't', 'gi gi-book_open', '3');
INSERT INTO `submenu` VALUES ('27', '9', 'kartu kerja', 'kartukerja/order', 't', 'fa fa-keyboard-o', '3');
INSERT INTO `submenu` VALUES ('28', '9', 'stock opname', 'opname', 't', 'gi gi-cart_in', '3');
INSERT INTO `submenu` VALUES ('29', '10', 'dimp', 'dimp', 'y', 'gi gi-notes_2', '3');
INSERT INTO `submenu` VALUES ('30', '10', 'stock masuk', 'stockin', 't', 'gi gi-notes', '3');
INSERT INTO `submenu` VALUES ('31', '10', 'stock keluar', 'stockout', 't', 'gi gi-notes', '3');
INSERT INTO `submenu` VALUES ('32', '10', 'lost pasta', 'pasta', 't', 'fa fa-money', '3');
INSERT INTO `submenu` VALUES ('33', '11', 'laporan stock', 'rptstock', 't', 'hi hi-list-alt', '3');
INSERT INTO `submenu` VALUES ('34', '11', 'laporan produksi', 'rptproduksi', 't', 'hi hi-list-alt', '3');
INSERT INTO `submenu` VALUES ('35', '11', 'laporan lost pasta', 'rptpasta', 't', 'hi hi-list-alt', '3');
INSERT INTO `submenu` VALUES ('36', '1', 'metode', 'metode', 't', 'fa fa-calendar', '1');
INSERT INTO `submenu` VALUES ('37', '8', 'metode', 'metode', 't', 'fa fa-calendar', '3');
INSERT INTO `submenu` VALUES ('38', '1', 'data warna', 'warna', 't', 'gi gi-notes', '1');
INSERT INTO `submenu` VALUES ('39', '8', 'data warna', 'warna', 't', 'gi gi-notes', '3');

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL auto_increment,
  `nama_supplier` varchar(30) NOT NULL,
  `alamat` varchar(100) default NULL,
  `telp` varchar(20) default NULL,
  `kontak` varchar(20) default NULL,
  `email` varchar(40) default NULL,
  PRIMARY KEY  (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES ('2', 'LANGGENG MAKMUR PERSADA', 'Taman Palem Lestari Blok B 16 no.30A,Jl.Kamal Raya ,Cengkareng,Jakarta', '02155956667', 'Mr.Indra', 'indra@makmur.com');
INSERT INTO `supplier` VALUES ('7', 'DONOMEX PARAMITA CHEMICALS', 'JL.JEMBATAN TIGA KAV.38,JAKARTA', '02166606360', 'Mr.James Yip', null);
INSERT INTO `supplier` VALUES ('8', 'HUNTSMAN  INDONESIA', 'Jl. Raya Pasar Minggu No 8 BRI Building 3rd Floor Jakarta 12760', '0217974578', 'Mr. David', null);
INSERT INTO `supplier` VALUES ('9', 'TSAI MEI TECHNOLOGY,PT.', '2FL, NO.17, Tung The 10th ST.,Taoyuan City, TAIWAN', '0886-3-3573526', 'MS. Mei Hui Wang', null);
INSERT INTO `supplier` VALUES ('10', ' Dystar Color Indonesia', 'Menara Global Building, 22nd Floor. JL. Gatot Subroto Kav.27 Jakarta.', '0215270550', 'Ms. Kartika', null);
INSERT INTO `supplier` VALUES ('11', 'ACHROMA', 'Komplek Pergudangan Bizhub Blok GC no.3 Gunung Sindur , Bogor', '02129666657', 'Mr. Hari Afriadi', null);
INSERT INTO `supplier` VALUES ('12', 'Sinar Kimia Utama', 'Pergudangan Semanan Megah Kav .37Semanan-Kalideres Jakarta Barat 11850', '021-5437 7905', 'Mr.Andreas', null);
INSERT INTO `supplier` VALUES ('13', 'Snogen Indonesia', 'Jl. Industri Cimareme III No. 9A| Bandung 40553 | Indonesia', '0226865905', 'Mrs.Sri', null);
INSERT INTO `supplier` VALUES ('14', 'Yasindo Multi Pratama', 'Komplek Permata Kota Blok J-21. Jl.P.Tubagus Angke 170, Jakarta Utara', '02166671700 ', 'Mrs.Yeti', null);
INSERT INTO `supplier` VALUES ('15', 'Mitra Kencana Surya', 'Jl.Kasuari Blok HB3 no. 11, Pondok Aren, Pondok Pucung, Bintaro Jaya Sektor 9, Tangerang 15229', '02171094402', 'Mr.Norman', null);
INSERT INTO `supplier` VALUES ('16', 'Indonesia Nanxing Chemical', 'Pergudangan Bizpark, Kopo Blok A 5 no. 7 A,Bandung', '02287301561', 'Mr.Shi Weiren', null);
INSERT INTO `supplier` VALUES ('17', 'SUMEI INDONESIA TRADING', 'Ruko Bekasi Mas Blok D no. 33 Jl.A Yani RT 04/03, Bekasi', '02188850972', 'Mr.Liu Yung Shing', null);
INSERT INTO `supplier` VALUES ('18', 'GUANGZHOU INU', 'Room.354-355 On West Tower The Ao Yuan Chuang Yue The   Building,   No.283  West Han Xi Da Dao Road,', '0862036972859', 'Mr.Liang', null);
INSERT INTO `supplier` VALUES ('19', 'BOZZETO INDONESIA', 'Jl.Tarajusari KM 0,2 Kamasan , Banjaran, Bandung 40377', '0225947176', 'Mr.Heriwan', null);
INSERT INTO `supplier` VALUES ('20', 'SURYA PUTERA ANUGERAH', 'Ruko Kopo Plaza Jl.Peta (Lingkar selatan) Blok C-15, Bandung', '0226040126', 'Mr.Halim', null);
INSERT INTO `supplier` VALUES ('21', 'PINTU MAS MULIA KIMIA', 'Jl.Tanah Abang 3 no. 5&7 Jakarta Pusat', '0213440862', 'Mr.Andi', null);
INSERT INTO `supplier` VALUES ('22', 'PULCRA CHEMICALS', 'Office Building Pesona View Blok B-11Jl. Ir. H. Juanda Rt. 12/28 MekarjayaSukmajaya - Depok 16411', '02177840988 ', 'Ms.Yuni', null);
INSERT INTO `supplier` VALUES ('23', 'DYMATIC CHEMICALS INDONESIA', 'Jl.Pitaniaga no.18, Ruko kota baru parahyangan. Bandung', '0226803330 ;', 'Mr.Eric', null);
INSERT INTO `supplier` VALUES ('24', 'CLARICHEM INDONESIA', 'Komplek Pergudangan Bizhub,Blok GC no.3, Gunung Sindur, Bogor ', '02129666657', 'Mr.Hari Afriadi', null);
INSERT INTO `supplier` VALUES ('25', 'ATLANTIC LESTARI', 'JL.K.H.M.Mansyur no. 246 B, Jakarta Barat 11210', '0216593331', 'Mr.Herman/Siswanto', null);
INSERT INTO `supplier` VALUES ('26', 'ASUTEXX / ESTEEM CHEM', '9A,LORONG 1,JALAN ZABEDAH,83000 BATU PAHAT,JOHOR', '\'+60 74341836', 'MR.GARY', null);
INSERT INTO `supplier` VALUES ('27', 'LUCAS SPS', 'Jl.Karang anyar no.26 RT 1 RW 4, Karang anyar,Astana Anyar, Bandung 40241', '0224234426', 'Mrs. Shinta', null);
INSERT INTO `supplier` VALUES ('28', 'CHARLIE SPS', 'JL. Lingkar Luar Barat No. 8 ACengkareng Jakarta Barat', '02154376633', 'Mr.Alfred', null);
INSERT INTO `supplier` VALUES ('29', 'APOLLO AGUNG CHEMICALS', 'Jl. Paradise Timur Raya Blok GII No. 1&2Sunter; Agung Jakarta Utara -14350', '0216404690', 'Mr.Yakob ', null);
INSERT INTO `supplier` VALUES ('30', 'TIMUR MAS TIRTA', 'Jl.Melawan No. 26/7 Mangga Dua Selatan,Jakarta', '0216288469', 'Mr.William', null);
INSERT INTO `supplier` VALUES ('31', 'LAUTAN LUAS', 'Jl.AIP II KS.Tubun Raya no. 77 ,Jakarta', '02180660777', 'Ms.Susana Raharja', null);
INSERT INTO `supplier` VALUES ('32', 'NICCA CHEMICAL', 'Jl.Ketapang Indah Blok B2, no. 36 Jl.K.H.Zainul arifin 14-20 Jakarta Barat ', '0216301445', 'Mr.Iwan', null);
INSERT INTO `supplier` VALUES ('33', 'LAJU SAKTI JAYA', 'Jl.Ketapang Indah Blok B2, no. 36 Jl.K.H.Zainul arifin 14-20 Jakarta Barat ', '0216301445', 'Mr.Iwan', null);
INSERT INTO `supplier` VALUES ('34', 'KHARISMA TRIJAYA', 'Jl. Siliwangi no. 374 km. 13, Bale Endah,Bandung', '02269069888', 'Mr.Agus', null);
INSERT INTO `supplier` VALUES ('35', 'JINDO INDUSTRY', 'JL. Akasia II Kav. A 7-3 Delta Silicone Industry Lippo City. Bekasi.', '0218972121', 'Mr.Ivan Yu', null);
INSERT INTO `supplier` VALUES ('36', 'DUNIA KIMIA JAYA', 'Jl.AIP II KS.Tubun Raya no. 77 ,Jakarta', '02180660777', 'Ms.Susana Raharja', null);
INSERT INTO `supplier` VALUES ('37', 'DALIAN SHENGLIN', 'RM1402, NO.23RENMIN RD., ZHONGSHAN DIST., DALIAN CHINA', '0086-411-82506361', 'Ms.Hilda/Mr.Yang', null);
INSERT INTO `supplier` VALUES ('38', 'CHEMATEX', 'Mangga Besar Raya no.42 II,Jakarta', '0216390629', 'Ms.Lisa', null);
INSERT INTO `supplier` VALUES ('39', 'BINTANG AGUNG JAYA', 'Mangga Besar Raya no.42 II,Jakarta', '0216390629', 'Ms.Lisa', null);
INSERT INTO `supplier` VALUES ('40', 'ARFIA MEGAH', 'Jl.Jababeka VII G Blok R no. 2C,Cikarang,Bekasi', '0218935259', 'Mr.Bambang ', null);
INSERT INTO `supplier` VALUES ('41', 'SIMUT SAKTI', '  Jl. LingkarLuarbarat 8A Cengkareng – West Jakarta', '+62-21-27962020', '', null);
INSERT INTO `supplier` VALUES ('42', 'FILIPI', 'Jl Bandengan Utara 1 No 3 Jakarta', '081287479702', 'calvin', 'kepinz_19@yahoo.com');

-- ----------------------------
-- Table structure for tipe_hdd
-- ----------------------------
DROP TABLE IF EXISTS `tipe_hdd`;
CREATE TABLE `tipe_hdd` (
  `tipe` char(10) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipe_hdd
-- ----------------------------
INSERT INTO `tipe_hdd` VALUES ('SATA');
INSERT INTO `tipe_hdd` VALUES ('IDE');
INSERT INTO `tipe_hdd` VALUES ('RAID5');
INSERT INTO `tipe_hdd` VALUES ('RAID1+0');

-- ----------------------------
-- Table structure for tipe_ram
-- ----------------------------
DROP TABLE IF EXISTS `tipe_ram`;
CREATE TABLE `tipe_ram` (
  `tipe` varchar(10) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipe_ram
-- ----------------------------
INSERT INTO `tipe_ram` VALUES ('DDR3');
INSERT INTO `tipe_ram` VALUES ('DDR2');
INSERT INTO `tipe_ram` VALUES ('DDR1');
INSERT INTO `tipe_ram` VALUES ('SDRAM');
