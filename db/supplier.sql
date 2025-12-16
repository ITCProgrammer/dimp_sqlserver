/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : localhost:3307
Source Database       : printing

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2017-10-17 20:38:32
*/

SET FOREIGN_KEY_CHECKS=0;

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
  PRIMARY KEY  (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES ('2', 'LANGGENG MAKMUR PERSADA', 'Taman Palem Lestari Blok B 16 no.30A,Jl.Kamal Raya ,Cengkareng,Jakarta', '02155956667', 'Mr.Indra');
INSERT INTO `supplier` VALUES ('7', 'DONOMEX PARAMITA CHEMICALS', 'JL.JEMBATAN TIGA KAV.38,JAKARTA', '02166606360', 'Mr.James Yip');
INSERT INTO `supplier` VALUES ('8', 'HUNTSMAN  INDONESIA', 'Jl. Raya Pasar Minggu No 8 BRI Building 3rd Floor Jakarta 12760', '0217974578', 'Mr. David');
INSERT INTO `supplier` VALUES ('9', 'TSAI MEI TECHNOLOGY,PT.', '2FL, NO.17, Tung The 10th ST.,Taoyuan City, TAIWAN', '0886-3-3573526', 'MS. Mei Hui Wang');
INSERT INTO `supplier` VALUES ('10', ' Dystar Color Indonesia', 'Menara Global Building, 22nd Floor. JL. Gatot Subroto Kav.27 Jakarta.', '0215270550', 'Ms. Kartika');
INSERT INTO `supplier` VALUES ('11', 'ACHROMA', 'Komplek Pergudangan Bizhub Blok GC no.3 Gunung Sindur , Bogor', '02129666657', 'Mr. Hari Afriadi');
INSERT INTO `supplier` VALUES ('12', 'Sinar Kimia Utama', 'Pergudangan Semanan Megah Kav .37Semanan-Kalideres Jakarta Barat 11850', '021-5437 7905', 'Mr.Andreas');
INSERT INTO `supplier` VALUES ('13', 'Snogen Indonesia', 'Jl. Industri Cimareme III No. 9A| Bandung 40553 | Indonesia', '0226865905', 'Mrs.Sri');
INSERT INTO `supplier` VALUES ('14', 'Yasindo Multi Pratama', 'Komplek Permata Kota Blok J-21. Jl.P.Tubagus Angke 170, Jakarta Utara', '02166671700 ', 'Mrs.Yeti');
INSERT INTO `supplier` VALUES ('15', 'Mitra Kencana Surya', 'Jl.Kasuari Blok HB3 no. 11, Pondok Aren, Pondok Pucung, Bintaro Jaya Sektor 9, Tangerang 15229', '02171094402', 'Mr.Norman');
INSERT INTO `supplier` VALUES ('16', 'Indonesia Nanxing Chemical', 'Pergudangan Bizpark, Kopo Blok A 5 no. 7 A,Bandung', '02287301561', 'Mr.Shi Weiren');
INSERT INTO `supplier` VALUES ('17', 'SUMEI INDONESIA TRADING', 'Ruko Bekasi Mas Blok D no. 33 Jl.A Yani RT 04/03, Bekasi', '02188850972', 'Mr.Liu Yung Shing');
INSERT INTO `supplier` VALUES ('18', 'GUANGZHOU INU', 'Room.354-355 On West Tower The Ao Yuan Chuang Yue The   Building,   No.283  West Han Xi Da Dao Road,', '0862036972859', 'Mr.Liang');
INSERT INTO `supplier` VALUES ('19', 'BOZZETO INDONESIA', 'Jl.Tarajusari KM 0,2 Kamasan , Banjaran, Bandung 40377', '0225947176', 'Mr.Heriwan');
INSERT INTO `supplier` VALUES ('20', 'SURYA PUTERA ANUGERAH', 'Ruko Kopo Plaza Jl.Peta (Lingkar selatan) Blok C-15, Bandung', '0226040126', 'Mr.Halim');
INSERT INTO `supplier` VALUES ('21', 'PINTU MAS MULIA KIMIA', 'Jl.Tanah Abang 3 no. 5&7 Jakarta Pusat', '0213440862', 'Mr.Andi');
INSERT INTO `supplier` VALUES ('22', 'PULCRA CHEMICALS', 'Office Building Pesona View Blok B-11Jl. Ir. H. Juanda Rt. 12/28 MekarjayaSukmajaya - Depok 16411', '02177840988 ', 'Ms.Yuni');
INSERT INTO `supplier` VALUES ('23', 'DYMATIC CHEMICALS INDONESIA', 'Jl.Pitaniaga no.18, Ruko kota baru parahyangan. Bandung', '0226803330 ;', 'Mr.Eric');
INSERT INTO `supplier` VALUES ('24', 'CLARICHEM INDONESIA', 'Komplek Pergudangan Bizhub,Blok GC no.3, Gunung Sindur, Bogor ', '02129666657', 'Mr.Hari Afriadi');
INSERT INTO `supplier` VALUES ('25', 'ATLANTIC LESTARI', 'JL.K.H.M.Mansyur no. 246 B, Jakarta Barat 11210', '0216593331', 'Mr.Herman/Siswanto');
INSERT INTO `supplier` VALUES ('26', 'ASUTEXX / ESTEEM CHEM', '9A,LORONG 1,JALAN ZABEDAH,83000 BATU PAHAT,JOHOR', '\'+60 74341836', 'MR.GARY');
INSERT INTO `supplier` VALUES ('27', 'LUCAS SPS', 'Jl.Karang anyar no.26 RT 1 RW 4, Karang anyar,Astana Anyar, Bandung 40241', '0224234426', 'Mrs. Shinta');
INSERT INTO `supplier` VALUES ('28', 'CHARLIE SPS', 'JL. Lingkar Luar Barat No. 8 ACengkareng Jakarta Barat', '02154376633', 'Mr.Alfred');
INSERT INTO `supplier` VALUES ('29', 'APOLLO AGUNG CHEMICALS', 'Jl. Paradise Timur Raya Blok GII No. 1&2Sunter; Agung Jakarta Utara -14350', '0216404690', 'Mr.Yakob ');
INSERT INTO `supplier` VALUES ('30', 'TIMUR MAS TIRTA', 'Jl.Melawan No. 26/7 Mangga Dua Selatan,Jakarta', '0216288469', 'Mr.William');
INSERT INTO `supplier` VALUES ('31', 'LAUTAN LUAS', 'Jl.AIP II KS.Tubun Raya no. 77 ,Jakarta', '02180660777', 'Ms.Susana Raharja');
INSERT INTO `supplier` VALUES ('32', 'NICCA CHEMICAL', 'Jl.Ketapang Indah Blok B2, no. 36 Jl.K.H.Zainul arifin 14-20 Jakarta Barat ', '0216301445', 'Mr.Iwan');
INSERT INTO `supplier` VALUES ('33', 'LAJU SAKTI JAYA', 'Jl.Ketapang Indah Blok B2, no. 36 Jl.K.H.Zainul arifin 14-20 Jakarta Barat ', '0216301445', 'Mr.Iwan');
INSERT INTO `supplier` VALUES ('34', 'KHARISMA TRIJAYA', 'Jl. Siliwangi no. 374 km. 13, Bale Endah,Bandung', '02269069888', 'Mr.Agus');
INSERT INTO `supplier` VALUES ('35', 'JINDO INDUSTRY', 'JL. Akasia II Kav. A 7-3 Delta Silicone Industry Lippo City. Bekasi.', '0218972121', 'Mr.Ivan Yu');
INSERT INTO `supplier` VALUES ('36', 'DUNIA KIMIA JAYA', 'Jl.AIP II KS.Tubun Raya no. 77 ,Jakarta', '02180660777', 'Ms.Susana Raharja');
INSERT INTO `supplier` VALUES ('37', 'DALIAN SHENGLIN', 'RM1402, NO.23RENMIN RD., ZHONGSHAN DIST., DALIAN CHINA', '0086-411-82506361', 'Ms.Hilda/Mr.Yang');
INSERT INTO `supplier` VALUES ('38', 'CHEMATEX', 'Mangga Besar Raya no.42 II,Jakarta', '0216390629', 'Ms.Lisa');
INSERT INTO `supplier` VALUES ('39', 'BINTANG AGUNG JAYA', 'Mangga Besar Raya no.42 II,Jakarta', '0216390629', 'Ms.Lisa');
INSERT INTO `supplier` VALUES ('40', 'ARFIA MEGAH', 'Jl.Jababeka VII G Blok R no. 2C,Cikarang,Bekasi', '0218935259', 'Mr.Bambang ');
INSERT INTO `supplier` VALUES ('41', 'SIMUT SAKTI', '  Jl. LingkarLuarbarat 8A Cengkareng – West Jakarta', '+62-21-27962020', '');
