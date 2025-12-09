DROP TABLE IF EXISTS doku;

CREATE TABLE `doku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `tglbayar` datetime NOT NULL,
  `kurs` bigint(8) NOT NULL,
  `transidmerchant` varchar(125) NOT NULL,
  `totalamount` double NOT NULL,
  `totaltransfer` decimal(10,0) NOT NULL,
  `words` varchar(200) NOT NULL,
  `statustype` varchar(1) NOT NULL,
  `response_code` varchar(50) NOT NULL,
  `approvalcode` char(6) NOT NULL,
  `trxstatus` varchar(50) NOT NULL,
  `payment_channel` int(2) NOT NULL,
  `paymentcode` varchar(30) NOT NULL,
  `session_id` varchar(48) NOT NULL,
  `bank_issuer` varchar(100) NOT NULL,
  `creditcard` varchar(16) NOT NULL,
  `payment_date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `verifyid` varchar(30) NOT NULL,
  `verifyscore` int(3) NOT NULL,
  `verifystatus` varchar(10) NOT NULL,
  `idreg` bigint(20) NOT NULL,
  `jenis` varchar(40) NOT NULL,
  `stat` int(1) NOT NULL,
  `basket` text NOT NULL,
  `idgroup` int(11) DEFAULT NULL,
  `ket2` text NOT NULL,
  `datamx` text NOT NULL,
  `kdevent` varchar(12) NOT NULL,
  `services_id` varchar(30) DEFAULT NULL,
  `acquirer_id` varchar(30) DEFAULT NULL,
  `channel_id` varchar(30) DEFAULT NULL,
  `trans_stat` varchar(20) DEFAULT NULL,
  `trans_date` datetime DEFAULT NULL,
  `trans_original_request_id` varchar(60) DEFAULT NULL,
  `va_number` varchar(60) DEFAULT NULL,
  `va_request_id` varchar(20) DEFAULT NULL,
  `va_ref` varchar(20) DEFAULT NULL,
  `va_chanel_type` varchar(20) DEFAULT NULL,
  `checkout_header` longtext NOT NULL,
  `checkout_data` longtext NOT NULL,
  `checkout_url` varchar(100) NOT NULL,
  `tglexpired` datetime NOT NULL,
  `payment_method_types` varchar(120) NOT NULL,
  `payment_data` longtext NOT NULL,
  `payment_header` text NOT NULL,
  `payment_referer` varchar(80) NOT NULL,
  `rq_data` text NOT NULL,
  `va_data` longtext NOT NULL,
  `rq_va` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS doku_ch;

CREATE TABLE `doku_ch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ch` varchar(120) NOT NULL,
  `neg` varchar(30) NOT NULL,
  `title` varchar(120) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `path` varchar(60) NOT NULL,
  `versi` varchar(4) NOT NULL,
  `kodepm` int(5) NOT NULL,
  `img` varchar(60) NOT NULL,
  `tnc` varchar(120) NOT NULL,
  `tnc_en` varchar(120) NOT NULL,
  `abp` varchar(120) NOT NULL,
  `howto` text NOT NULL,
  `howto_en` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS doku_notify;

CREATE TABLE `doku_notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `signature_gen` text NOT NULL,
  `signature_doku` text NOT NULL,
  `stat` varchar(12) NOT NULL,
  `header` text NOT NULL,
  `data` longtext NOT NULL,
  `notrans` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE IF EXISTS dokud;

CREATE TABLE `dokud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `starttime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `finishtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trxstatus` varchar(50) NOT NULL DEFAULT '0',
  `totalamount` double NOT NULL DEFAULT 0,
  `transidmerchant` varchar(125) NOT NULL DEFAULT '0',
  `session_id` varchar(50) NOT NULL DEFAULT '',
  `response_code` varchar(50) NOT NULL DEFAULT '',
  `creditcard` varchar(16) NOT NULL DEFAULT '',
  `bank` varchar(6) NOT NULL DEFAULT '',
  `approvalcode` char(6) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS editreg;

CREATE TABLE `editreg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_registran` int(11) NOT NULL,
  `tglentry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sidp` text NOT NULL,
  `sidpold` text NOT NULL,
  `pmethod1` int(11) NOT NULL,
  `transid` varchar(30) NOT NULL,
  `transidold` varchar(30) NOT NULL,
  `totold` int(11) NOT NULL,
  `totnew` int(11) NOT NULL,
  `kk` int(11) NOT NULL,
  `ket` varchar(30) NOT NULL,
  `accname` varchar(150) NOT NULL,
  `accno` varchar(40) NOT NULL,
  `accbank` varchar(100) NOT NULL,
  `accswift` varchar(50) NOT NULL,
  `accket` varchar(200) NOT NULL,
  `pmethod` int(11) NOT NULL,
  `stat` varchar(20) NOT NULL,
  `basket` text NOT NULL,
  `basketold` text NOT NULL,
  `transamount` int(11) NOT NULL,
  `transid_batch` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE IF EXISTS ipay88;

CREATE TABLE `ipay88` (
  `MerchantCode` varchar(30) DEFAULT NULL,
  `PaymentId` int(5) DEFAULT NULL,
  `RefNo` varchar(30) DEFAULT NULL,
  `Amount` decimal(15,2) DEFAULT NULL,
  `Currency` varchar(5) DEFAULT NULL,
  `Remark` varchar(100) DEFAULT NULL,
  `TransId` varchar(100) NOT NULL,
  `AuthCode` varchar(100) DEFAULT NULL,
  `TransactionStatus` varchar(100) DEFAULT NULL,
  `ErrDesc` text DEFAULT NULL,
  `Signature` varchar(100) DEFAULT NULL,
  `IssuerBank` varchar(100) DEFAULT NULL,
  `PaymentDate` varchar(100) DEFAULT NULL,
  `Xfield1` varchar(200) DEFAULT NULL,
  `DCCConversionRate` decimal(15,2) DEFAULT NULL,
  `OriginalAmount` decimal(15,2) DEFAULT NULL,
  `OriginalCurrency` varchar(10) DEFAULT NULL,
  `SettlementAmount` decimal(15,2) DEFAULT NULL,
  `SettlementCurrency` varchar(10) DEFAULT NULL,
  `Binbank` varchar(100) DEFAULT NULL,
  `APIVersion` varchar(7) DEFAULT NULL,
  `ProdDesc` varchar(300) DEFAULT NULL,
  `RequestType` varchar(100) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `UserEmail` varchar(120) DEFAULT NULL,
  `UserContact` varchar(50) DEFAULT NULL,
  `Lang` varchar(10) DEFAULT NULL,
  `ResponseURL` varchar(120) DEFAULT NULL,
  `BackendURL` varchar(120) DEFAULT NULL,
  `ItemTransactions` text DEFAULT NULL,
  `response1` longtext NOT NULL,
  `backend1` longtext NOT NULL,
  `tglentry` datetime DEFAULT current_timestamp(),
  `tglexp` datetime NOT NULL,
  PRIMARY KEY (`TransId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE IF EXISTS konfirmasi_transfer;

CREATE TABLE `konfirmasi_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_konfirm` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis` varchar(20) NOT NULL,
  `id_reservasi` varchar(8) NOT NULL,
  `id_registran` bigint(8) NOT NULL,
  `tgl_transfer` date NOT NULL,
  `bank` varchar(30) NOT NULL,
  `jlh_transfer` decimal(13,2) NOT NULL,
  `disc` decimal(13,2) NOT NULL DEFAULT 0.00,
  `stat` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `confirmed_by` varchar(15) NOT NULL,
  `statvoucher` varchar(15) NOT NULL,
  `tglvoucher` date NOT NULL,
  `idvoucher` varchar(15) NOT NULL,
  `opr` varchar(20) NOT NULL,
  `tgl_validasi` datetime NOT NULL,
  `ref` varchar(30) NOT NULL,
  `nfbukti` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_registran` (`id_registran`),
  KEY `id_reservasi` (`id_reservasi`),
  KEY `jenis` (`jenis`),
  KEY `stat` (`stat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS konfirmasi_transfer_history;

CREATE TABLE `konfirmasi_transfer_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_konfirm` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis` varchar(20) NOT NULL,
  `id_reservasi` varchar(8) NOT NULL,
  `id_registran` bigint(8) NOT NULL,
  `tgl_transfer` date NOT NULL,
  `bank` varchar(30) NOT NULL,
  `jlh_transfer` decimal(13,2) NOT NULL,
  `disc` decimal(13,2) NOT NULL DEFAULT 0.00,
  `stat` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `confirmed_by` varchar(15) NOT NULL,
  `statvoucher` varchar(15) NOT NULL,
  `tglvoucher` date NOT NULL,
  `idvoucher` varchar(15) NOT NULL,
  `opr` varchar(20) NOT NULL,
  `tgl_validasi` datetime NOT NULL,
  `ref` varchar(30) NOT NULL,
  `nfbukti` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_registran` (`id_registran`),
  KEY `id_reservasi` (`id_reservasi`),
  KEY `jenis` (`jenis`),
  KEY `stat` (`stat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS m_acara;

CREATE TABLE `m_acara` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `NmAcara` varchar(50) DEFAULT NULL,
  `NmRuang` varchar(50) DEFAULT NULL,
  `Jam_mulai` datetime DEFAULT NULL,
  `Jam_Selesai` datetime DEFAULT NULL,
  `urlzoom` varchar(80) NOT NULL,
  `urlyoutube` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS master_cabang;

CREATE TABLE `master_cabang` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kdcab` varchar(4) NOT NULL,
  `cabang` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

 INSERT INTO master_cabang(id,kdcab,cabang)  VALUES 
  ("1","","Banjarnegara");
 INSERT INTO master_cabang(id,kdcab,cabang)  VALUES 
  ("2","","Banyumas"),
  ("3","","Batang"),
  ("4","","Blora"),
  ("5","","Boyolali"),
  ("6","","Brebes"),
  ("7","","Cilacap"),
  ("8","","Demak"),
  ("9","","Grobogan"),
  ("10","","Jepara"),
  ("11","","Karanganyar"),
  ("12","","Kebumen"),
  ("13","","Kendal"),
  ("14","","Klaten"),
  ("15","","Kudus"),
  ("16","","Magelang Kabupaten"),
  ("17","","Magelang Kota"),
  ("18","","Pati"),
  ("19","","Pekalongan"),
  ("20","","Pemalang"),
  ("21","","Purbalingga"),
  ("22","","Purworejo"),
  ("23","","Rembang"),
  ("24","","Salatiga"),
  ("25","","Semarang Kabupaten"),
  ("26","","Semarang Kota"),
  ("27","","Sragen"),
  ("28","","Sukoharjo"),
  ("29","","Surakarta"),
  ("30","","Tegal Kabupaten"),
  ("31","","Tegal Kota");
 INSERT INTO master_cabang(id,kdcab,cabang)  VALUES 
  ("32","","Temanggung"),
  ("33","","Wonogiri"),
  ("34","","Wonossobo"),
  ("35","","- none -");



DROP TABLE IF EXISTS master_data;

CREATE TABLE `master_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `simd` varchar(20) NOT NULL,
  `kode` varchar(8) NOT NULL,
  `title` varchar(200) NOT NULL,
  `cost` decimal(11,2) NOT NULL,
  `lat` decimal(11,2) NOT NULL,
  `onsite` decimal(11,2) NOT NULL,
  `cost_id` bigint(10) NOT NULL,
  `lat_id` bigint(10) NOT NULL,
  `onsite_id` bigint(10) NOT NULL,
  `kuota` int(8) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `sprofesi` varchar(300) NOT NULL DEFAULT '',
  `stipereg` varchar(200) NOT NULL DEFAULT '',
  `ket` text NOT NULL,
  `skp` varchar(200) NOT NULL,
  `neg` varchar(3) NOT NULL DEFAULT 'id',
  `mu` varchar(3) NOT NULL DEFAULT 'rp',
  `waktu` varchar(60) NOT NULL,
  `tempat` varchar(60) NOT NULL,
  `status` varchar(10) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `kodegroup` varchar(30) NOT NULL,
  `mn` varchar(5) NOT NULL COMMENT 'member non member',
  `lockrereg` int(1) DEFAULT 0,
  `lockcert` int(1) DEFAULT 0,
  `nfpdf` varchar(70) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kdevent` varchar(12) NOT NULL,
  `linkmateri` varchar(80) NOT NULL,
  `linkmateri2` varchar(120) NOT NULL,
  `lrc` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

 INSERT INTO master_data(id,simd,kode,title,cost,lat,onsite,cost_id,lat_id,onsite_id,kuota,jenis,sprofesi,stipereg,ket,skp,neg,mu,waktu,tempat,status,kategori,kodegroup,mn,lockrereg,lockcert,nfpdf,kdevent,linkmateri,linkmateri2,lrc)  VALUES 
  ("103","","","Unique Payment Verification Code","0.00","0.00","0.00","0","0","0","0","biaya","","","","","id","rp","","","1","","","","0","0","","","","","0");
 INSERT INTO master_data(id,simd,kode,title,cost,lat,onsite,cost_id,lat_id,onsite_id,kuota,jenis,sprofesi,stipereg,ket,skp,neg,mu,waktu,tempat,status,kategori,kodegroup,mn,lockrereg,lockcert,nfpdf,kdevent,linkmateri,linkmateri2,lrc)  VALUES 
  ("104","104","01","Symposiuum Spesialis","1500000.00","1750000.00","2000000.00","0","0","0","2000","symposium","Spesialis (SPOG)|","","","","id","","11 Februari 2025","HOTEL HOLLIDAY INN PASTEUR, BANDUNG","1","","sym","","0","0","","","","","0");



DROP TABLE IF EXISTS master_hotel;

CREATE TABLE `master_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` tinytext NOT NULL,
  `hotel` tinytext NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `kuota` bigint(5) NOT NULL,
  `ekstrabed` bigint(5) NOT NULL,
  `foto` varchar(120) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `official` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS master_jenis;

CREATE TABLE `master_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(15) NOT NULL,
  `jenisx` varchar(60) NOT NULL,
  `urutan` int(11) NOT NULL,
  `jlhmax` int(2) NOT NULL,
  `ket1` text NOT NULL,
  `ket2` text NOT NULL,
  `allowrereg` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

 INSERT INTO master_jenis(id,jenis,jenisx,urutan,jlhmax,ket1,ket2,allowrereg)  VALUES 
  ("1","symposium","Symposium","3","1","","","1");
 INSERT INTO master_jenis(id,jenis,jenisx,urutan,jlhmax,ket1,ket2,allowrereg)  VALUES 
  ("2","workshop","Workshop","2","1","","","1");



DROP TABLE IF EXISTS master_kamar;

CREATE TABLE `master_kamar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kamar` varchar(60) NOT NULL,
  `jumkamar` varchar(100) NOT NULL DEFAULT '0',
  `rp_rate` bigint(10) NOT NULL,
  `idhotel` int(5) NOT NULL,
  `rp_extra` bigint(8) NOT NULL DEFAULT 0,
  `us_extra` bigint(8) NOT NULL DEFAULT 0,
  `us_rate` bigint(8) NOT NULL DEFAULT 0,
  `jumextra` bigint(8) NOT NULL DEFAULT 0,
  `oc` int(1) NOT NULL,
  `ket` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS master_kota;

CREATE TABLE `master_kota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kk` varchar(8) NOT NULL,
  `kota` varchar(60) NOT NULL,
  `provinsi` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=503 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("1","Kab.","- OTHER -","");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("2","Kab.","Aceh Barat (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("3","Kab.","Aceh Barat Daya (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("4","Kab.","Aceh Besar (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("5","Kab.","Aceh Jaya (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("6","Kab.","Aceh Selatan (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("7","Kab.","Aceh Singkil (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("8","Kab.","Aceh Tamiang (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("9","Kab.","Aceh Tengah (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("10","Kab.","Aceh Tenggara (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("11","Kab.","Aceh Timur (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("12","Kab.","Aceh Utara (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("13","Kab.","Agam (Kab.)","Sumatera Barat"),
  ("14","Kab.","Alor (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("15","Kota","Ambon (Kota)","Maluku"),
  ("16","Kab.","Asahan (Kab.)","Sumatera Utara"),
  ("17","Kab.","Asmat (Kab.)","Papua"),
  ("18","Kab.","Badung (Kab.)","Bali"),
  ("19","Kab.","Balangan (Kab.)","Kalimantan Selatan"),
  ("20","Kota","Balikpapan (Kota)","Kalimantan Timur"),
  ("21","Kota","Banda Aceh (Kota)","Nanggroe Aceh Darussalam (NAD)"),
  ("22","Kota","Bandar Lampung (Kota)","Lampung"),
  ("23","Kab.","Bandung (Kab.)","Jawa Barat"),
  ("24","Kota","Bandung (Kota)","Jawa Barat"),
  ("25","Kab.","Bandung Barat (Kab.)","Jawa Barat"),
  ("26","Kab.","Banggai (Kab.)","Sulawesi Tengah"),
  ("27","Kab.","Banggai Kepulauan (Kab.)","Sulawesi Tengah"),
  ("28","Kab.","Bangka (Kab.)","Bangka Belitung"),
  ("29","Kab.","Bangka Barat (Kab.)","Bangka Belitung"),
  ("30","Kab.","Bangka Selatan (Kab.)","Bangka Belitung"),
  ("31","Kab.","Bangka Tengah (Kab.)","Bangka Belitung");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("32","Kab.","Bangkalan (Kab.)","Jawa Timur"),
  ("33","Kab.","Bangli (Kab.)","Bali"),
  ("34","Kab.","Banjar (Kab.)","Kalimantan Selatan"),
  ("35","Kota","Banjar (Kota)","Jawa Barat"),
  ("36","Kota","Banjarbaru (Kota)","Kalimantan Selatan"),
  ("37","Kota","Banjarmasin (Kota)","Kalimantan Selatan"),
  ("38","Kab.","Banjarnegara (Kab.)","Jawa Tengah"),
  ("39","Kab.","Bantaeng (Kab.)","Sulawesi Selatan"),
  ("40","Kab.","Bantul (Kab.)","DI Yogyakarta"),
  ("41","Kab.","Banyuasin (Kab.)","Sumatera Selatan"),
  ("42","Kab.","Banyumas (Kab.)","Jawa Tengah"),
  ("43","Kab.","Banyuwangi (Kab.)","Jawa Timur"),
  ("44","Kab.","Barito Kuala (Kab.)","Kalimantan Selatan"),
  ("45","Kab.","Barito Selatan (Kab.)","Kalimantan Tengah"),
  ("46","Kab.","Barito Timur (Kab.)","Kalimantan Tengah"),
  ("47","Kab.","Barito Utara (Kab.)","Kalimantan Tengah"),
  ("48","Kab.","Barru (Kab.)","Sulawesi Selatan"),
  ("49","Kota","Batam (Kota)","Kepulauan Riau"),
  ("50","Kab.","Batang (Kab.)","Jawa Tengah"),
  ("51","Kab.","Batang Hari (Kab.)","Jambi"),
  ("52","Kota","Batu (Kota)","Jawa Timur"),
  ("53","Kab.","Batu Bara (Kab.)","Sumatera Utara"),
  ("54","Kota","Bau-Bau (Kota)","Sulawesi Tenggara"),
  ("55","Kab.","Bekasi (Kab.)","Jawa Barat"),
  ("56","Kota","Bekasi (Kota)","Jawa Barat"),
  ("57","Kab.","Belitung (Kab.)","Bangka Belitung"),
  ("58","Kab.","Belitung Timur (Kab.)","Bangka Belitung"),
  ("59","Kab.","Belu (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("60","Kab.","Bener Meriah (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("61","Kab.","Bengkalis (Kab.)","Riau");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("62","Kab.","Bengkayang (Kab.)","Kalimantan Barat"),
  ("63","Kota","Bengkulu (Kota)","Bengkulu"),
  ("64","Kab.","Bengkulu Selatan (Kab.)","Bengkulu"),
  ("65","Kab.","Bengkulu Tengah (Kab.)","Bengkulu"),
  ("66","Kab.","Bengkulu Utara (Kab.)","Bengkulu"),
  ("67","Kab.","Berau (Kab.)","Kalimantan Timur"),
  ("68","Kab.","Biak Numfor (Kab.)","Papua"),
  ("69","Kab.","Bima (Kab.)","Nusa Tenggara Barat (NTB)"),
  ("70","Kota","Bima (Kota)","Nusa Tenggara Barat (NTB)"),
  ("71","Kota","Binjai (Kota)","Sumatera Utara"),
  ("72","Kab.","Bintan (Kab.)","Kepulauan Riau"),
  ("73","Kab.","Bireuen (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("74","Kota","Bitung (Kota)","Sulawesi Utara"),
  ("75","Kab.","Blitar (Kab.)","Jawa Timur"),
  ("76","Kota","Blitar (Kota)","Jawa Timur"),
  ("77","Kab.","Blora (Kab.)","Jawa Tengah"),
  ("78","Kab.","Boalemo (Kab.)","Gorontalo"),
  ("79","Kab.","Bogor (Kab.)","Jawa Barat"),
  ("80","Kota","Bogor (Kota)","Jawa Barat"),
  ("81","Kab.","Bojonegoro (Kab.)","Jawa Timur"),
  ("82","Kab.","Bolaang Mongondow (Bolmong) (Kab.)","Sulawesi Utara"),
  ("83","Kab.","Bolaang Mongondow Selatan (Kab.)","Sulawesi Utara"),
  ("84","Kab.","Bolaang Mongondow Timur (Kab.)","Sulawesi Utara"),
  ("85","Kab.","Bolaang Mongondow Utara (Kab.)","Sulawesi Utara"),
  ("86","Kab.","Bombana (Kab.)","Sulawesi Tenggara"),
  ("87","Kab.","Bondowoso (Kab.)","Jawa Timur"),
  ("88","Kab.","Bone (Kab.)","Sulawesi Selatan"),
  ("89","Kab.","Bone Bolango (Kab.)","Gorontalo"),
  ("90","Kota","Bontang (Kota)","Kalimantan Timur"),
  ("91","Kab.","Boven Digoel (Kab.)","Papua");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("92","Kab.","Boyolali (Kab.)","Jawa Tengah"),
  ("93","Kab.","Brebes (Kab.)","Jawa Tengah"),
  ("94","Kota","Bukittinggi (Kota)","Sumatera Barat"),
  ("95","Kab.","Buleleng (Kab.)","Bali"),
  ("96","Kab.","Bulukumba (Kab.)","Sulawesi Selatan"),
  ("97","Kab.","Bulungan (Bulongan) (Kab.)","Kalimantan Utara"),
  ("98","Kab.","Bungo (Kab.)","Jambi"),
  ("99","Kab.","Buol (Kab.)","Sulawesi Tengah"),
  ("100","Kab.","Buru (Kab.)","Maluku"),
  ("101","Kab.","Buru Selatan (Kab.)","Maluku"),
  ("102","Kab.","Buton (Kab.)","Sulawesi Tenggara"),
  ("103","Kab.","Buton Utara (Kab.)","Sulawesi Tenggara"),
  ("104","Kab.","Ciamis (Kab.)","Jawa Barat"),
  ("105","Kab.","Cianjur (Kab.)","Jawa Barat"),
  ("106","Kab.","Cilacap (Kab.)","Jawa Tengah"),
  ("107","Kota","Cilegon (Kota)","Banten"),
  ("108","Kota","Cimahi (Kota)","Jawa Barat"),
  ("109","Kab.","Cirebon (Kab.)","Jawa Barat"),
  ("110","Kota","Cirebon (Kota)","Jawa Barat"),
  ("111","Kab.","Dairi (Kab.)","Sumatera Utara"),
  ("112","Kab.","Deiyai (Deliyai) (Kab.)","Papua"),
  ("113","Kab.","Deli Serdang (Kab.)","Sumatera Utara"),
  ("114","Kab.","Demak (Kab.)","Jawa Tengah"),
  ("115","Kota","Denpasar (Kota)","Bali"),
  ("116","Kota","Depok (Kota)","Jawa Barat"),
  ("117","Kab.","Dharmasraya (Kab.)","Sumatera Barat"),
  ("118","Kab.","Dogiyai (Kab.)","Papua"),
  ("119","Kab.","Dompu (Kab.)","Nusa Tenggara Barat (NTB)"),
  ("120","Kab.","Donggala (Kab.)","Sulawesi Tengah"),
  ("121","Kota","Dumai (Kota)","Riau");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("122","Kab.","Empat Lawang (Kab.)","Sumatera Selatan"),
  ("123","Kab.","Ende (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("124","Kab.","Enrekang (Kab.)","Sulawesi Selatan"),
  ("125","Kab.","Fakfak (Kab.)","Papua Barat"),
  ("126","Kab.","Flores Timur (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("127","Kab.","Garut (Kab.)","Jawa Barat"),
  ("128","Kab.","Gayo Lues (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("129","Kab.","Gianyar (Kab.)","Bali"),
  ("130","Kab.","Gorontalo (Kab.)","Gorontalo"),
  ("131","Kota","Gorontalo (Kota)","Gorontalo"),
  ("132","Kab.","Gorontalo Utara (Kab.)","Gorontalo"),
  ("133","Kab.","Gowa (Kab.)","Sulawesi Selatan"),
  ("134","Kab.","Gresik (Kab.)","Jawa Timur"),
  ("135","Kab.","Grobogan (Kab.)","Jawa Tengah"),
  ("136","Kab.","Gunung Kidul (Kab.)","DI Yogyakarta"),
  ("137","Kab.","Gunung Mas (Kab.)","Kalimantan Tengah"),
  ("138","Kota","Gunungsitoli (Kota)","Sumatera Utara"),
  ("139","Kab.","Halmahera Barat (Kab.)","Maluku Utara"),
  ("140","Kab.","Halmahera Selatan (Kab.)","Maluku Utara"),
  ("141","Kab.","Halmahera Tengah (Kab.)","Maluku Utara"),
  ("142","Kab.","Halmahera Timur (Kab.)","Maluku Utara"),
  ("143","Kab.","Halmahera Utara (Kab.)","Maluku Utara"),
  ("144","Kab.","Hulu Sungai Selatan (Kab.)","Kalimantan Selatan"),
  ("145","Kab.","Hulu Sungai Tengah (Kab.)","Kalimantan Selatan"),
  ("146","Kab.","Hulu Sungai Utara (Kab.)","Kalimantan Selatan"),
  ("147","Kab.","Humbang Hasundutan (Kab.)","Sumatera Utara"),
  ("148","Kab.","Indragiri Hilir (Kab.)","Riau"),
  ("149","Kab.","Indragiri Hulu (Kab.)","Riau"),
  ("150","Kab.","Indramayu (Kab.)","Jawa Barat"),
  ("151","Kab.","Intan Jaya (Kab.)","Papua");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("152","Kota","Jakarta Barat (Kota)","DKI Jakarta"),
  ("153","Kota","Jakarta Pusat (Kota)","DKI Jakarta"),
  ("154","Kota","Jakarta Selatan (Kota)","DKI Jakarta"),
  ("155","Kota","Jakarta Timur (Kota)","DKI Jakarta"),
  ("156","Kota","Jakarta Utara (Kota)","DKI Jakarta"),
  ("157","Kota","Jambi (Kota)","Jambi"),
  ("158","Kab.","Jayapura (Kab.)","Papua"),
  ("159","Kota","Jayapura (Kota)","Papua"),
  ("160","Kab.","Jayawijaya (Kab.)","Papua"),
  ("161","Kab.","Jember (Kab.)","Jawa Timur"),
  ("162","Kab.","Jembrana (Kab.)","Bali"),
  ("163","Kab.","Jeneponto (Kab.)","Sulawesi Selatan"),
  ("164","Kab.","Jepara (Kab.)","Jawa Tengah"),
  ("165","Kab.","Jombang (Kab.)","Jawa Timur"),
  ("166","Kab.","Kaimana (Kab.)","Papua Barat"),
  ("167","Kab.","Kampar (Kab.)","Riau"),
  ("168","Kab.","Kapuas (Kab.)","Kalimantan Tengah"),
  ("169","Kab.","Kapuas Hulu (Kab.)","Kalimantan Barat"),
  ("170","Kab.","Karanganyar (Kab.)","Jawa Tengah"),
  ("171","Kab.","Karangasem (Kab.)","Bali"),
  ("172","Kab.","Karawang (Kab.)","Jawa Barat"),
  ("173","Kab.","Karimun (Kab.)","Kepulauan Riau"),
  ("174","Kab.","Karo (Kab.)","Sumatera Utara"),
  ("175","Kab.","Katingan (Kab.)","Kalimantan Tengah"),
  ("176","Kab.","Kaur (Kab.)","Bengkulu"),
  ("177","Kab.","Kayong Utara (Kab.)","Kalimantan Barat"),
  ("178","Kab.","Kebumen (Kab.)","Jawa Tengah"),
  ("179","Kab.","Kediri (Kab.)","Jawa Timur"),
  ("180","Kota","Kediri (Kota)","Jawa Timur"),
  ("181","Kab.","Keerom (Kab.)","Papua");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("182","Kab.","Kendal (Kab.)","Jawa Tengah"),
  ("183","Kota","Kendari (Kota)","Sulawesi Tenggara"),
  ("184","Kab.","Kepahiang (Kab.)","Bengkulu"),
  ("185","Kab.","Kepulauan Anambas (Kab.)","Kepulauan Riau"),
  ("186","Kab.","Kepulauan Aru (Kab.)","Maluku"),
  ("187","Kab.","Kepulauan Mentawai (Kab.)","Sumatera Barat"),
  ("188","Kab.","Kepulauan Meranti (Kab.)","Riau"),
  ("189","Kab.","Kepulauan Sangihe (Kab.)","Sulawesi Utara"),
  ("190","Kab.","Kepulauan Seribu (Kab.)","DKI Jakarta"),
  ("191","Kab.","Kepulauan Siau Tagulandang Biaro (Sitaro) (Kab.)","Sulawesi Utara"),
  ("192","Kab.","Kepulauan Sula (Kab.)","Maluku Utara"),
  ("193","Kab.","Kepulauan Talaud (Kab.)","Sulawesi Utara"),
  ("194","Kab.","Kepulauan Yapen (Yapen Waropen) (Kab.)","Papua"),
  ("195","Kab.","Kerinci (Kab.)","Jambi"),
  ("196","Kab.","Ketapang (Kab.)","Kalimantan Barat"),
  ("197","Kab.","Klaten (Kab.)","Jawa Tengah"),
  ("198","Kab.","Klungkung (Kab.)","Bali"),
  ("199","Kab.","Kolaka (Kab.)","Sulawesi Tenggara"),
  ("200","Kab.","Kolaka Utara (Kab.)","Sulawesi Tenggara"),
  ("201","Kab.","Konawe (Kab.)","Sulawesi Tenggara"),
  ("202","Kab.","Konawe Selatan (Kab.)","Sulawesi Tenggara"),
  ("203","Kab.","Konawe Utara (Kab.)","Sulawesi Tenggara"),
  ("204","Kab.","Kotabaru (Kab.)","Kalimantan Selatan"),
  ("205","Kota","Kotamobagu (Kota)","Sulawesi Utara"),
  ("206","Kab.","Kotawaringin Barat (Kab.)","Kalimantan Tengah"),
  ("207","Kab.","Kotawaringin Timur (Kab.)","Kalimantan Tengah"),
  ("208","Kab.","Kuantan Singingi (Kab.)","Riau"),
  ("209","Kab.","Kubu Raya (Kab.)","Kalimantan Barat"),
  ("210","Kab.","Kudus (Kab.)","Jawa Tengah"),
  ("211","Kab.","Kulon Progo (Kab.)","DI Yogyakarta");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("212","Kab.","Kuningan (Kab.)","Jawa Barat"),
  ("213","Kab.","Kupang (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("214","Kota","Kupang (Kota)","Nusa Tenggara Timur (NTT)"),
  ("215","Kab.","Kutai Barat (Kab.)","Kalimantan Timur"),
  ("216","Kab.","Kutai Kartanegara (Kab.)","Kalimantan Timur"),
  ("217","Kab.","Kutai Timur (Kab.)","Kalimantan Timur"),
  ("218","Kab.","Labuhan Batu (Kab.)","Sumatera Utara"),
  ("219","Kab.","Labuhan Batu Selatan (Kab.)","Sumatera Utara"),
  ("220","Kab.","Labuhan Batu Utara (Kab.)","Sumatera Utara"),
  ("221","Kab.","Lahat (Kab.)","Sumatera Selatan"),
  ("222","Kab.","Lamandau (Kab.)","Kalimantan Tengah"),
  ("223","Kab.","Lamongan (Kab.)","Jawa Timur"),
  ("224","Kab.","Lampung Barat (Kab.)","Lampung"),
  ("225","Kab.","Lampung Selatan (Kab.)","Lampung"),
  ("226","Kab.","Lampung Tengah (Kab.)","Lampung"),
  ("227","Kab.","Lampung Timur (Kab.)","Lampung"),
  ("228","Kab.","Lampung Utara (Kab.)","Lampung"),
  ("229","Kab.","Landak (Kab.)","Kalimantan Barat"),
  ("230","Kab.","Langkat (Kab.)","Sumatera Utara"),
  ("231","Kota","Langsa (Kota)","Nanggroe Aceh Darussalam (NAD)"),
  ("232","Kab.","Lanny Jaya (Kab.)","Papua"),
  ("233","Kab.","Lebak (Kab.)","Banten"),
  ("234","Kab.","Lebong (Kab.)","Bengkulu"),
  ("235","Kab.","Lembata (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("236","Kota","Lhokseumawe (Kota)","Nanggroe Aceh Darussalam (NAD)"),
  ("237","Kab.","Lima Puluh Koto/Kota (Kab.)","Sumatera Barat"),
  ("238","Kab.","Lingga (Kab.)","Kepulauan Riau"),
  ("239","Kab.","Lombok Barat (Kab.)","Nusa Tenggara Barat (NTB)"),
  ("240","Kab.","Lombok Tengah (Kab.)","Nusa Tenggara Barat (NTB)"),
  ("241","Kab.","Lombok Timur (Kab.)","Nusa Tenggara Barat (NTB)");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("242","Kab.","Lombok Utara (Kab.)","Nusa Tenggara Barat (NTB)"),
  ("243","Kota","Lubuk Linggau (Kota)","Sumatera Selatan"),
  ("244","Kab.","Lumajang (Kab.)","Jawa Timur"),
  ("245","Kab.","Luwu (Kab.)","Sulawesi Selatan"),
  ("246","Kab.","Luwu Timur (Kab.)","Sulawesi Selatan"),
  ("247","Kab.","Luwu Utara (Kab.)","Sulawesi Selatan"),
  ("248","Kab.","Madiun (Kab.)","Jawa Timur"),
  ("249","Kota","Madiun (Kota)","Jawa Timur"),
  ("250","Kab.","Magelang (Kab.)","Jawa Tengah"),
  ("251","Kota","Magelang (Kota)","Jawa Tengah"),
  ("252","Kab.","Magetan (Kab.)","Jawa Timur"),
  ("253","Kab.","Majalengka (Kab.)","Jawa Barat"),
  ("254","Kab.","Majene (Kab.)","Sulawesi Barat"),
  ("255","Kota","Makassar (Kota)","Sulawesi Selatan"),
  ("256","Kab.","Malang (Kab.)","Jawa Timur"),
  ("257","Kota","Malang (Kota)","Jawa Timur"),
  ("258","Kab.","Malinau (Kab.)","Kalimantan Utara"),
  ("259","Kab.","Maluku Barat Daya (Kab.)","Maluku"),
  ("260","Kab.","Maluku Tengah (Kab.)","Maluku"),
  ("261","Kab.","Maluku Tenggara (Kab.)","Maluku"),
  ("262","Kab.","Maluku Tenggara Barat (Kab.)","Maluku"),
  ("263","Kab.","Mamasa (Kab.)","Sulawesi Barat"),
  ("264","Kab.","Mamberamo Raya (Kab.)","Papua"),
  ("265","Kab.","Mamberamo Tengah (Kab.)","Papua"),
  ("266","Kab.","Mamuju (Kab.)","Sulawesi Barat"),
  ("267","Kab.","Mamuju Utara (Kab.)","Sulawesi Barat"),
  ("268","Kota","Manado (Kota)","Sulawesi Utara"),
  ("269","Kab.","Mandailing Natal (Kab.)","Sumatera Utara"),
  ("270","Kab.","Manggarai (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("271","Kab.","Manggarai Barat (Kab.)","Nusa Tenggara Timur (NTT)");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("272","Kab.","Manggarai Timur (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("273","Kab.","Manokwari (Kab.)","Papua Barat"),
  ("274","Kab.","Manokwari Selatan (Kab.)","Papua Barat"),
  ("275","Kab.","Mappi (Kab.)","Papua"),
  ("276","Kab.","Maros (Kab.)","Sulawesi Selatan"),
  ("277","Kota","Mataram (Kota)","Nusa Tenggara Barat (NTB)"),
  ("278","Kab.","Maybrat (Kab.)","Papua Barat"),
  ("279","Kota","Medan (Kota)","Sumatera Utara"),
  ("280","Kab.","Melawi (Kab.)","Kalimantan Barat"),
  ("281","Kab.","Merangin (Kab.)","Jambi"),
  ("282","Kab.","Merauke (Kab.)","Papua"),
  ("283","Kab.","Mesuji (Kab.)","Lampung"),
  ("284","Kota","Metro (Kota)","Lampung"),
  ("285","Kab.","Mimika (Kab.)","Papua"),
  ("286","Kab.","Minahasa (Kab.)","Sulawesi Utara"),
  ("287","Kab.","Minahasa Selatan (Kab.)","Sulawesi Utara"),
  ("288","Kab.","Minahasa Tenggara (Kab.)","Sulawesi Utara"),
  ("289","Kab.","Minahasa Utara (Kab.)","Sulawesi Utara"),
  ("290","Kab.","Mojokerto (Kab.)","Jawa Timur"),
  ("291","Kota","Mojokerto (Kota)","Jawa Timur"),
  ("292","Kab.","Morowali (Kab.)","Sulawesi Tengah"),
  ("293","Kab.","Muara Enim (Kab.)","Sumatera Selatan"),
  ("294","Kab.","Muaro Jambi (Kab.)","Jambi"),
  ("295","Kab.","Muko Muko (Kab.)","Bengkulu"),
  ("296","Kab.","Muna (Kab.)","Sulawesi Tenggara"),
  ("297","Kab.","Murung Raya (Kab.)","Kalimantan Tengah"),
  ("298","Kab.","Musi Banyuasin (Kab.)","Sumatera Selatan"),
  ("299","Kab.","Musi Rawas (Kab.)","Sumatera Selatan"),
  ("300","Kab.","Nabire (Kab.)","Papua"),
  ("301","Kab.","Nagan Raya (Kab.)","Nanggroe Aceh Darussalam (NAD)");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("302","Kab.","Nagekeo (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("303","Kab.","Natuna (Kab.)","Kepulauan Riau"),
  ("304","Kab.","Nduga (Kab.)","Papua"),
  ("305","Kab.","Ngada (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("306","Kab.","Nganjuk (Kab.)","Jawa Timur"),
  ("307","Kab.","Ngawi (Kab.)","Jawa Timur"),
  ("308","Kab.","Nias (Kab.)","Sumatera Utara"),
  ("309","Kab.","Nias Barat (Kab.)","Sumatera Utara"),
  ("310","Kab.","Nias Selatan (Kab.)","Sumatera Utara"),
  ("311","Kab.","Nias Utara (Kab.)","Sumatera Utara"),
  ("312","Kab.","Nunukan (Kab.)","Kalimantan Utara"),
  ("313","Kab.","Ogan Ilir (Kab.)","Sumatera Selatan"),
  ("314","Kab.","Ogan Komering Ilir (Kab.)","Sumatera Selatan"),
  ("315","Kab.","Ogan Komering Ulu (Kab.)","Sumatera Selatan"),
  ("316","Kab.","Ogan Komering Ulu Selatan (Kab.)","Sumatera Selatan"),
  ("317","Kab.","Ogan Komering Ulu Timur (Kab.)","Sumatera Selatan"),
  ("318","Kab.","Pacitan (Kab.)","Jawa Timur"),
  ("319","Kota","Padang (Kota)","Sumatera Barat"),
  ("320","Kab.","Padang Lawas (Kab.)","Sumatera Utara"),
  ("321","Kab.","Padang Lawas Utara (Kab.)","Sumatera Utara"),
  ("322","Kota","Padang Panjang (Kota)","Sumatera Barat"),
  ("323","Kab.","Padang Pariaman (Kab.)","Sumatera Barat"),
  ("324","Kota","Padang Sidempuan (Kota)","Sumatera Utara"),
  ("325","Kota","Pagar Alam (Kota)","Sumatera Selatan"),
  ("326","Kab.","Pakpak Bharat (Kab.)","Sumatera Utara"),
  ("327","Kota","Palangka Raya (Kota)","Kalimantan Tengah"),
  ("328","Kota","Palembang (Kota)","Sumatera Selatan"),
  ("329","Kota","Palopo (Kota)","Sulawesi Selatan"),
  ("330","Kota","Palu (Kota)","Sulawesi Tengah"),
  ("331","Kab.","Pamekasan (Kab.)","Jawa Timur");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("332","Kab.","Pandeglang (Kab.)","Banten"),
  ("333","Kab.","Pangandaran (Kab.)","Jawa Barat"),
  ("334","Kab.","Pangkajene Kepulauan (Kab.)","Sulawesi Selatan"),
  ("335","Kota","Pangkal Pinang (Kota)","Bangka Belitung"),
  ("336","Kab.","Paniai (Kab.)","Papua"),
  ("337","Kota","Parepare (Kota)","Sulawesi Selatan"),
  ("338","Kota","Pariaman (Kota)","Sumatera Barat"),
  ("339","Kab.","Parigi Moutong (Kab.)","Sulawesi Tengah"),
  ("340","Kab.","Pasaman (Kab.)","Sumatera Barat"),
  ("341","Kab.","Pasaman Barat (Kab.)","Sumatera Barat"),
  ("342","Kab.","Paser (Kab.)","Kalimantan Timur"),
  ("343","Kab.","Pasuruan (Kab.)","Jawa Timur"),
  ("344","Kota","Pasuruan (Kota)","Jawa Timur"),
  ("345","Kab.","Pati (Kab.)","Jawa Tengah"),
  ("346","Kota","Payakumbuh (Kota)","Sumatera Barat"),
  ("347","Kab.","Pegunungan Arfak (Kab.)","Papua Barat"),
  ("348","Kab.","Pegunungan Bintang (Kab.)","Papua"),
  ("349","Kab.","Pekalongan (Kab.)","Jawa Tengah"),
  ("350","Kota","Pekalongan (Kota)","Jawa Tengah"),
  ("351","Kota","Pekanbaru (Kota)","Riau"),
  ("352","Kab.","Pelalawan (Kab.)","Riau"),
  ("353","Kab.","Pemalang (Kab.)","Jawa Tengah"),
  ("354","Kota","Pematang Siantar (Kota)","Sumatera Utara"),
  ("355","Kab.","Penajam Paser Utara (Kab.)","Kalimantan Timur"),
  ("356","Kab.","Pesawaran (Kab.)","Lampung"),
  ("357","Kab.","Pesisir Barat (Kab.)","Lampung"),
  ("358","Kab.","Pesisir Selatan (Kab.)","Sumatera Barat"),
  ("359","Kab.","Pidie (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("360","Kab.","Pidie Jaya (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("361","Kab.","Pinrang (Kab.)","Sulawesi Selatan");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("362","Kab.","Pohuwato (Kab.)","Gorontalo"),
  ("363","Kab.","Polewali Mandar (Kab.)","Sulawesi Barat"),
  ("364","Kab.","Ponorogo (Kab.)","Jawa Timur"),
  ("365","Kab.","Pontianak (Kab.)","Kalimantan Barat"),
  ("366","Kota","Pontianak (Kota)","Kalimantan Barat"),
  ("367","Kab.","Poso (Kab.)","Sulawesi Tengah"),
  ("368","Kota","Prabumulih (Kota)","Sumatera Selatan"),
  ("369","Kab.","Pringsewu (Kab.)","Lampung"),
  ("370","Kab.","Probolinggo (Kab.)","Jawa Timur"),
  ("371","Kota","Probolinggo (Kota)","Jawa Timur"),
  ("372","Kab.","Pulang Pisau (Kab.)","Kalimantan Tengah"),
  ("373","Kab.","Pulau Morotai (Kab.)","Maluku Utara"),
  ("374","Kab.","Puncak (Kab.)","Papua"),
  ("375","Kab.","Puncak Jaya (Kab.)","Papua"),
  ("376","Kab.","Purbalingga (Kab.)","Jawa Tengah"),
  ("377","Kab.","Purwakarta (Kab.)","Jawa Barat"),
  ("378","Kab.","Purworejo (Kab.)","Jawa Tengah"),
  ("379","Kab.","Raja Ampat (Kab.)","Papua Barat"),
  ("380","Kab.","Rejang Lebong (Kab.)","Bengkulu"),
  ("381","Kab.","Rembang (Kab.)","Jawa Tengah"),
  ("382","Kab.","Rokan Hilir (Kab.)","Riau"),
  ("383","Kab.","Rokan Hulu (Kab.)","Riau"),
  ("384","Kab.","Rote Ndao (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("385","Kota","Sabang (Kota)","Nanggroe Aceh Darussalam (NAD)"),
  ("386","Kab.","Sabu Raijua (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("387","Kota","Salatiga (Kota)","Jawa Tengah"),
  ("388","Kota","Samarinda (Kota)","Kalimantan Timur"),
  ("389","Kab.","Sambas (Kab.)","Kalimantan Barat"),
  ("390","Kab.","Samosir (Kab.)","Sumatera Utara"),
  ("391","Kab.","Sampang (Kab.)","Jawa Timur");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("392","Kab.","Sanggau (Kab.)","Kalimantan Barat"),
  ("393","Kab.","Sarmi (Kab.)","Papua"),
  ("394","Kab.","Sarolangun (Kab.)","Jambi"),
  ("395","Kota","Sawah Lunto (Kota)","Sumatera Barat"),
  ("396","Kab.","Sekadau (Kab.)","Kalimantan Barat"),
  ("397","Kab.","Selayar (Kepulauan Selayar) (Kab.)","Sulawesi Selatan"),
  ("398","Kab.","Seluma (Kab.)","Bengkulu"),
  ("399","Kab.","Semarang (Kab.)","Jawa Tengah"),
  ("400","Kota","Semarang (Kota)","Jawa Tengah"),
  ("401","Kab.","Seram Bagian Barat (Kab.)","Maluku"),
  ("402","Kab.","Seram Bagian Timur (Kab.)","Maluku"),
  ("403","Kab.","Serang (Kab.)","Banten"),
  ("404","Kota","Serang (Kota)","Banten"),
  ("405","Kab.","Serdang Bedagai (Kab.)","Sumatera Utara"),
  ("406","Kab.","Seruyan (Kab.)","Kalimantan Tengah"),
  ("407","Kab.","Siak (Kab.)","Riau"),
  ("408","Kota","Sibolga (Kota)","Sumatera Utara"),
  ("409","Kab.","Sidenreng Rappang/Rapang (Kab.)","Sulawesi Selatan"),
  ("410","Kab.","Sidoarjo (Kab.)","Jawa Timur"),
  ("411","Kab.","Sigi (Kab.)","Sulawesi Tengah"),
  ("412","Kab.","Sijunjung (Sawah Lunto Sijunjung) (Kab.)","Sumatera Barat"),
  ("413","Kab.","Sikka (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("414","Kab.","Simalungun (Kab.)","Sumatera Utara"),
  ("415","Kab.","Simeulue (Kab.)","Nanggroe Aceh Darussalam (NAD)"),
  ("416","Kota","Singkawang (Kota)","Kalimantan Barat"),
  ("417","Kab.","Sinjai (Kab.)","Sulawesi Selatan"),
  ("418","Kab.","Sintang (Kab.)","Kalimantan Barat"),
  ("419","Kab.","Situbondo (Kab.)","Jawa Timur"),
  ("420","Kab.","Sleman (Kab.)","DI Yogyakarta"),
  ("421","Kab.","Solok (Kab.)","Sumatera Barat");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("422","Kota","Solok (Kota)","Sumatera Barat"),
  ("423","Kab.","Solok Selatan (Kab.)","Sumatera Barat"),
  ("424","Kab.","Soppeng (Kab.)","Sulawesi Selatan"),
  ("425","Kab.","Sorong (Kab.)","Papua Barat"),
  ("426","Kota","Sorong (Kota)","Papua Barat"),
  ("427","Kab.","Sorong Selatan (Kab.)","Papua Barat"),
  ("428","Kab.","Sragen (Kab.)","Jawa Tengah"),
  ("429","Kab.","Subang (Kab.)","Jawa Barat"),
  ("430","Kota","Subulussalam (Kota)","Nanggroe Aceh Darussalam (NAD)"),
  ("431","Kab.","Sukabumi (Kab.)","Jawa Barat"),
  ("432","Kota","Sukabumi (Kota)","Jawa Barat"),
  ("433","Kab.","Sukamara (Kab.)","Kalimantan Tengah"),
  ("434","Kab.","Sukoharjo (Kab.)","Jawa Tengah"),
  ("435","Kab.","Sumba Barat (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("436","Kab.","Sumba Barat Daya (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("437","Kab.","Sumba Tengah (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("438","Kab.","Sumba Timur (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("439","Kab.","Sumbawa (Kab.)","Nusa Tenggara Barat (NTB)"),
  ("440","Kab.","Sumbawa Barat (Kab.)","Nusa Tenggara Barat (NTB)"),
  ("441","Kab.","Sumedang (Kab.)","Jawa Barat"),
  ("442","Kab.","Sumenep (Kab.)","Jawa Timur"),
  ("443","Kota","Sungaipenuh (Kota)","Jambi"),
  ("444","Kab.","Supiori (Kab.)","Papua"),
  ("445","Kota","Surabaya (Kota)","Jawa Timur"),
  ("446","Kota","Surakarta (Solo) (Kota)","Jawa Tengah"),
  ("447","Kab.","Tabalong (Kab.)","Kalimantan Selatan"),
  ("448","Kab.","Tabanan (Kab.)","Bali"),
  ("449","Kab.","Takalar (Kab.)","Sulawesi Selatan"),
  ("450","Kab.","Tambrauw (Kab.)","Papua Barat"),
  ("451","Kab.","Tana Tidung (Kab.)","Kalimantan Utara");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("452","Kab.","Tana Toraja (Kab.)","Sulawesi Selatan"),
  ("453","Kab.","Tanah Bumbu (Kab.)","Kalimantan Selatan"),
  ("454","Kab.","Tanah Datar (Kab.)","Sumatera Barat"),
  ("455","Kab.","Tanah Laut (Kab.)","Kalimantan Selatan"),
  ("456","Kab.","Tangerang (Kab.)","Banten"),
  ("457","Kota","Tangerang (Kota)","Banten"),
  ("458","Kota","Tangerang Selatan (Kota)","Banten"),
  ("459","Kab.","Tanggamus (Kab.)","Lampung"),
  ("460","Kota","Tanjung Balai (Kota)","Sumatera Utara"),
  ("461","Kab.","Tanjung Jabung Barat (Kab.)","Jambi"),
  ("462","Kab.","Tanjung Jabung Timur (Kab.)","Jambi"),
  ("463","Kota","Tanjung Pinang (Kota)","Kepulauan Riau"),
  ("464","Kab.","Tapanuli Selatan (Kab.)","Sumatera Utara"),
  ("465","Kab.","Tapanuli Tengah (Kab.)","Sumatera Utara"),
  ("466","Kab.","Tapanuli Utara (Kab.)","Sumatera Utara"),
  ("467","Kab.","Tapin (Kab.)","Kalimantan Selatan"),
  ("468","Kota","Tarakan (Kota)","Kalimantan Utara"),
  ("469","Kab.","Tasikmalaya (Kab.)","Jawa Barat"),
  ("470","Kota","Tasikmalaya (Kota)","Jawa Barat"),
  ("471","Kota","Tebing Tinggi (Kota)","Sumatera Utara"),
  ("472","Kab.","Tebo (Kab.)","Jambi"),
  ("473","Kab.","Tegal (Kab.)","Jawa Tengah"),
  ("474","Kota","Tegal (Kota)","Jawa Tengah"),
  ("475","Kab.","Teluk Bintuni (Kab.)","Papua Barat"),
  ("476","Kab.","Teluk Wondama (Kab.)","Papua Barat"),
  ("477","Kab.","Temanggung (Kab.)","Jawa Tengah"),
  ("478","Kota","Ternate (Kota)","Maluku Utara"),
  ("479","Kota","Tidore Kepulauan (Kota)","Maluku Utara"),
  ("480","Kab.","Timor Tengah Selatan (Kab.)","Nusa Tenggara Timur (NTT)"),
  ("481","Kab.","Timor Tengah Utara (Kab.)","Nusa Tenggara Timur (NTT)");
 INSERT INTO master_kota(id,kk,kota,provinsi)  VALUES 
  ("482","Kab.","Toba Samosir (Kab.)","Sumatera Utara"),
  ("483","Kab.","Tojo Una-Una (Kab.)","Sulawesi Tengah"),
  ("484","Kab.","Toli-Toli (Kab.)","Sulawesi Tengah"),
  ("485","Kab.","Tolikara (Kab.)","Papua"),
  ("486","Kota","Tomohon (Kota)","Sulawesi Utara"),
  ("487","Kab.","Toraja Utara (Kab.)","Sulawesi Selatan"),
  ("488","Kab.","Trenggalek (Kab.)","Jawa Timur"),
  ("489","Kota","Tual (Kota)","Maluku"),
  ("490","Kab.","Tuban (Kab.)","Jawa Timur"),
  ("491","Kab.","Tulang Bawang (Kab.)","Lampung"),
  ("492","Kab.","Tulang Bawang Barat (Kab.)","Lampung"),
  ("493","Kab.","Tulungagung (Kab.)","Jawa Timur"),
  ("494","Kab.","Wajo (Kab.)","Sulawesi Selatan"),
  ("495","Kab.","Wakatobi (Kab.)","Sulawesi Tenggara"),
  ("496","Kab.","Waropen (Kab.)","Papua"),
  ("497","Kab.","Way Kanan (Kab.)","Lampung"),
  ("498","Kab.","Wonogiri (Kab.)","Jawa Tengah"),
  ("499","Kab.","Wonosobo (Kab.)","Jawa Tengah"),
  ("500","Kab.","Yahukimo (Kab.)","Papua"),
  ("501","Kab.","Yalimo (Kab.)","Papua"),
  ("502","Kota","Yogyakarta (Kota)","DI Yogyakarta");



DROP TABLE IF EXISTS master_negara;

CREATE TABLE `master_negara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(3) NOT NULL,
  `negara` varchar(30) NOT NULL,
  `pcode` varchar(5) NOT NULL,
  `kode2` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=242 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

 INSERT INTO master_negara(id,kode,negara,pcode,kode2)  VALUES 
  ("1","-","- OTHER -","-","-");
 INSERT INTO master_negara(id,kode,negara,pcode,kode2)  VALUES 
  ("2","AFG","Afghanistan","93","AF"),
  ("3","ALB","Albania","355","AL"),
  ("4","DZA","Algeria","213","DZ"),
  ("5","ASM","American Samoa","1684","AS"),
  ("6","AND","Andorra","376","AD"),
  ("7","AGO","Angola","244","AO"),
  ("8","AIA","Anguilla","1264","AI"),
  ("9","ATA","Antarctica","672","AQ"),
  ("10","ATG","Antigua and Barbuda","1268","AG"),
  ("11","ARG","Argentina","54","AR"),
  ("12","ARM","Armenia","374","AM"),
  ("13","ABW","Aruba","297","AW"),
  ("14","AUS","Australia","61","AU"),
  ("15","AUT","Austria","43","AT"),
  ("16","AZE","Azerbaijan","994","AZ"),
  ("17","BHS","Bahamas","1242","BS"),
  ("18","BHR","Bahrain","973","BH"),
  ("19","BGD","Bangladesh","880","BD"),
  ("20","BRB","Barbados","1246","BB"),
  ("21","BLR","Belarus","375","BY"),
  ("22","BEL","Belgium","32","BE"),
  ("23","BLZ","Belize","501","BZ"),
  ("24","BEN","Benin","229","BJ"),
  ("25","BMU","Bermuda","1441","BM"),
  ("26","BTN","Bhutan","975","BT"),
  ("27","BOL","Bolivia","591","BO"),
  ("28","BIH","Bosnia and Herzegovina","387","BA"),
  ("29","BWA","Botswana","267","BW"),
  ("30","BRA","Brazil","55","BR"),
  ("31","IOT","British Indian Ocean Territory","","IO");
 INSERT INTO master_negara(id,kode,negara,pcode,kode2)  VALUES 
  ("32","VGB","British Virgin Islands","1284","VG"),
  ("33","BRN","Brunei","673","BN"),
  ("34","BGR","Bulgaria","359","BG"),
  ("35","BFA","Burkina Faso","226","BF"),
  ("36","MMR","Burma (Myanmar)","95","MM"),
  ("37","BDI","Burundi","257","BI"),
  ("38","KHM","Cambodia","855","KH"),
  ("39","CMR","Cameroon","237","CM"),
  ("40","CAN","Canada","1","CA"),
  ("41","CPV","Cape Verde","238","CV"),
  ("42","CYM","Cayman Islands","1345","KY"),
  ("43","CAF","Central African Republic","236","CF"),
  ("44","TCD","Chad","235","TD"),
  ("45","CHL","Chile","56","CL"),
  ("46","CHN","China","86","CN"),
  ("47","CXR","Christmas Island","61","CX"),
  ("48","CCK","Cocos (Keeling) Islands","61","CC"),
  ("49","COL","Colombia","57","CO"),
  ("50","COM","Comoros","269","KM"),
  ("51","COG","Republic of the Congo","242","CG"),
  ("52","COD","Democratic Republic of the Con","243","CD"),
  ("53","COK","Cook Islands","682","CK"),
  ("54","CRC","Costa Rica","506","CR"),
  ("55","HRV","Croatia","385","HR"),
  ("56","CUB","Cuba","53","CU"),
  ("57","CYP","Cyprus","357","CY"),
  ("58","CZE","Czech Republic","420","CZ"),
  ("59","DNK","Denmark","45","DK"),
  ("60","DJI","Djibouti","253","DJ"),
  ("61","DMA","Dominica","1767","DM");
 INSERT INTO master_negara(id,kode,negara,pcode,kode2)  VALUES 
  ("62","DOM","Dominican Republic","1809","DO"),
  ("63","TLS","Timor-Leste","670","TL"),
  ("64","ECU","Ecuador","593","EC"),
  ("65","EGY","Egypt","20","EG"),
  ("66","SLV","El Savador","503","SV"),
  ("67","GNQ","Equatorial Guinea","240","GQ"),
  ("68","ERI","Eritrea","291","ER"),
  ("69","EST","Estonia","372","EE"),
  ("70","ETH","Ethiopia","251","ET"),
  ("71","FLK","Falkland Islands","500","FK"),
  ("72","FRO","Faroe Islands","298","FO"),
  ("73","FJI","Fiji","679","FJ"),
  ("74","FIN","Finland","358","FI"),
  ("75","FRA","France","33","FR"),
  ("76","PYF","French Polynesia","689","PF"),
  ("77","GAB","Gabon","241","GA"),
  ("78","GMB","Gambia","220","GM"),
  ("79","","Gaza Strip","970",""),
  ("80","GEO","Georgia","995","GE"),
  ("81","DEU","Germany","49","DE"),
  ("82","GHA","Ghana","233","GH"),
  ("83","GIB","Gibraltar","350","GI"),
  ("84","GRC","Greece","30","GR"),
  ("85","GRL","Greenland","299","GL"),
  ("86","GRD","Grenada","1473","GD"),
  ("87","GUM","Guam","1671","GU"),
  ("88","GTM","Guatemala","502","GT"),
  ("89","GIN","Guinea","224","GN"),
  ("90","GNB","Guinea-Bissau","245","GW"),
  ("91","GUY","Guyana","592","GY");
 INSERT INTO master_negara(id,kode,negara,pcode,kode2)  VALUES 
  ("92","HTI","Haiti","509","HT"),
  ("93","HND","Honduras","504","HN"),
  ("94","HKG","Hong Kong","852","HK"),
  ("95","HUN","Hungary","36","HU"),
  ("96","IS","Iceland","354","IS"),
  ("97","IND","India","91","IN"),
  ("98","IDN","Indonesia","62","ID"),
  ("99","IRN","Iran","98","IR"),
  ("100","IRQ","Iraq","964","IQ"),
  ("101","IRL","Ireland","353","IE"),
  ("102","IMN","Isle of Man","44","IM"),
  ("103","ISR","Israel","972","IL"),
  ("104","ITA","Italy","39","IT"),
  ("105","CIV","Ivory Coast","225","CI"),
  ("106","JAM","Jamaica","1876","JM"),
  ("107","JPN","Japan","81","JP"),
  ("108","JEY","Jersey","","JE"),
  ("109","JOR","Jordan","962","JO"),
  ("110","KAZ","Kazakhstan","7","KZ"),
  ("111","KEN","Kenya","254","KE"),
  ("112","KIR","Kiribati","686","KI"),
  ("113","","Kosovo","381",""),
  ("114","KWT","Kuwait","965","KW"),
  ("115","KGZ","Kyrgyzstan","996","KG"),
  ("116","LAO","Laos","856","LA"),
  ("117","LVA","Latvia","371","LV"),
  ("118","LBN","Lebanon","961","LB"),
  ("119","LSO","Lesotho","266","LS"),
  ("120","LBR","Liberia","231","LR"),
  ("121","LBY","Libya","218","LY");
 INSERT INTO master_negara(id,kode,negara,pcode,kode2)  VALUES 
  ("122","LIE","Liechtenstein","423","LI"),
  ("123","LTU","Lithuania","370","LT"),
  ("124","LUX","Luxembourg","352","LU"),
  ("125","MAC","Macau","853","MO"),
  ("126","MKD","Macedonia","389","MK"),
  ("127","MDG","Madagascar","261","MG"),
  ("128","MWI","Malawi","265","MW"),
  ("129","MYS","Malaysia","60","MY"),
  ("130","MDV","Maldives","960","MV"),
  ("131","MLI","Mali","223","ML"),
  ("132","MLT","Malta","356","MT"),
  ("133","MHL","Marshall Islands","692","MH"),
  ("134","MRT","Mauritania","222","MR"),
  ("135","MUS","Mauritius","230","MU"),
  ("136","MYT","Mayotte","262","YT"),
  ("137","MEX","Mexico","52","MX"),
  ("138","FSM","Micronesia","691","FM"),
  ("139","MDA","Moldova","373","MD"),
  ("140","MCO","Monaco","377","MC"),
  ("141","MNG","Mongolia","976","MN"),
  ("142","MNE","Montenegro","382","ME"),
  ("143","MSR","Montserrat","1664","MS"),
  ("144","MAR","Morocco","212","MA"),
  ("145","MOZ","Mozambique","258","MZ"),
  ("146","NAM","Namibia","264","NA"),
  ("147","NRU","Nauru","674","NR"),
  ("148","NPL","Nepal","977","NP"),
  ("149","NLD","Netherlands","31","NL"),
  ("150","ANT","Netherlands Antilles","599","AN"),
  ("151","NCL","New Caledonia","687","NC");
 INSERT INTO master_negara(id,kode,negara,pcode,kode2)  VALUES 
  ("152","NZL","New Zealand","64","NZ"),
  ("153","NIC","Nicaragua","505","NI"),
  ("154","NER","Niger","227","NE"),
  ("155","NGA","Nigeria","234","NG"),
  ("156","NIU","Niue","683","NU"),
  ("157","NFK","Norfolk Island","672","/N"),
  ("158","MNP","Northern Mariana Islands","1670","MP"),
  ("159","PRK","North Korea","850","KP"),
  ("160","NOR","Norway","47","NO"),
  ("161","OMN","Oman","968","OM"),
  ("162","PAK","Pakistan","92","PK"),
  ("163","PLW","Palau","680","PW"),
  ("164","PAN","Panama","507","PA"),
  ("165","PNG","Papua New Guinea","675","PG"),
  ("166","PRY","Paraguay","595","PY"),
  ("167","PER","Peru","51","PE"),
  ("168","PHL","Philippines","63","PH"),
  ("169","PCN","Pitcairn Islands","870","PN"),
  ("170","POL","Poland","48","PL"),
  ("171","PRT","Portugal","351","PT"),
  ("172","PRI","Puerto Rico","1","PR"),
  ("173","QAT","Qatar","974","QA"),
  ("174","ROU","Romania","40","RO"),
  ("175","RUS","Russia","7","RU"),
  ("176","RWA","Rwanda","250","RW"),
  ("177","BLM","Saint Barthelemy","590","BL"),
  ("178","WSM","Samoa","685","WS"),
  ("179","SMR","San Marino","378","SM"),
  ("180","STP","Sao Tome and Principe","239","ST"),
  ("181","SAU","Saudi Arabia","966","SA");
 INSERT INTO master_negara(id,kode,negara,pcode,kode2)  VALUES 
  ("182","SEN","Senegal","221","SN"),
  ("183","SRB","Serbia","381","RS"),
  ("184","SYC","Seychelles","248","SC"),
  ("185","SLE","Sierra Leone","232","SL"),
  ("186","SGP","Singapore","65","SG"),
  ("187","SVK","Slovakia","421","SK"),
  ("188","SVN","Slovenia","386","SI"),
  ("189","SLB","Solomon Islands","677","SB"),
  ("190","SOM","Somalia","252","SO"),
  ("191","ZAF","South Africa","27","ZA"),
  ("192","KOR","South Korea","82","KR"),
  ("193","ESP","Spain","34","ES"),
  ("194","LKA","Sri Lanka","94","LK"),
  ("195","SHN","Saint Helena","290","SH"),
  ("196","KNA","Saint Kitts and Nevis","1869","KN"),
  ("197","LCA","Saint Lucia","1758","LC"),
  ("198","MAF","Saint Martin","1599","MF"),
  ("199","SPM","Saint Pierre and Miquelon","508","PM"),
  ("200","VCT","Saint Vincent and the Grenadin","1784","VC"),
  ("201","SDN","Sudan","249","SD"),
  ("202","SUR","Suriname","597","SR"),
  ("203","SJM","Svalbard","","SJ"),
  ("204","SWZ","Swaziland","268","SZ"),
  ("205","SWE","Sweden","46","SE"),
  ("206","CHE","Switzerland","41","CH"),
  ("207","SYR","Syria","963","SY"),
  ("208","TWN","Taiwan","886","TW"),
  ("209","TJK","Tajikistan","992","TJ"),
  ("210","TZA","Tanzania","255","TZ"),
  ("211","THA","Thailand","66","TH");
 INSERT INTO master_negara(id,kode,negara,pcode,kode2)  VALUES 
  ("212","TGO","Togo","228","TG"),
  ("213","TKL","Tokelau","690","TK"),
  ("214","TON","Tonga","676","TO"),
  ("215","TTO","Trinidad and Tobago","1868","TT"),
  ("216","TUN","Tunisia","216","TN"),
  ("217","TUR","Turkey","90","TR"),
  ("218","TKM","Turkmenistan","993","TM"),
  ("219","TCA","Turks and Caicos Islands","1649","TC"),
  ("220","TUV","Tuvalu","688","TV"),
  ("221","ARE","United Arab Emirates","971","AE"),
  ("222","UGA","Uganda","256","UG"),
  ("223","GBR","United Kingdom","44","GB"),
  ("224","UKR","Ukraine","380","UA"),
  ("225","URY","Uruguay","598","UY"),
  ("226","USA","United States","1","US"),
  ("227","UZB","Uzbekistan","998","UZ"),
  ("228","VUT","Vanuatu","678","VU"),
  ("229","VAT","Holy See (Vatican City)","39","VA"),
  ("230","VEN","Venezuela","58","VE"),
  ("231","VNM","Vietnam","84","VN"),
  ("232","VIR","US Virgin Islands","1340","VI"),
  ("233","WLF","Wallis and Futuna","681","WF"),
  ("234","","West Bank","970",""),
  ("235","ESH","Western Sahara","","EH"),
  ("236","YEM","Yemen","967","YE"),
  ("237","ZMB","Zambia","260","ZM"),
  ("238","ZWE","Zimbabwe","263","ZW"),
  ("239","","Cote D`Ivore","",""),
  ("240","","Myanmar","",""),
  ("241","","Korea","","");



DROP TABLE IF EXISTS master_pameran;

CREATE TABLE `master_pameran` (
  `id` bigint(5) NOT NULL AUTO_INCREMENT,
  `kode` varchar(8) NOT NULL,
  `title` varchar(100) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `ukuran` varchar(12) NOT NULL,
  `harga` bigint(12) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS master_provinsi;

CREATE TABLE `master_provinsi` (
  `id` int(2) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

 INSERT INTO master_provinsi(id,provinsi)  VALUES 
  ("1","- OTHER -");
 INSERT INTO master_provinsi(id,provinsi)  VALUES 
  ("2","Bali"),
  ("3","Bangka Belitung"),
  ("4","Banten"),
  ("5","Bengkulu"),
  ("6","DI Yogyakarta"),
  ("7","DKI Jakarta"),
  ("8","Gorontalo"),
  ("9","Jambi"),
  ("10","Jawa Barat"),
  ("11","Jawa Tengah"),
  ("12","Jawa Timur"),
  ("13","Kalimantan Barat"),
  ("14","Kalimantan Selatan"),
  ("15","Kalimantan Tengah"),
  ("16","Kalimantan Timur"),
  ("17","Kalimantan Utara"),
  ("18","Kepulauan Riau"),
  ("19","Lampung"),
  ("20","Maluku"),
  ("21","Maluku Utara"),
  ("22","Nanggroe Aceh Darussalam (NAD)"),
  ("23","Nusa Tenggara Barat (NTB)"),
  ("24","Nusa Tenggara Timur (NTT)"),
  ("25","Papua"),
  ("26","Papua Barat"),
  ("27","Riau"),
  ("28","Sulawesi Barat"),
  ("29","Sulawesi Selatan"),
  ("30","Sulawesi Tengah"),
  ("31","Sulawesi Tenggara");
 INSERT INTO master_provinsi(id,provinsi)  VALUES 
  ("32","Sulawesi Utara"),
  ("33","Sumatera Barat"),
  ("34","Sumatera Selatan"),
  ("35","Sumatera Utara");



DROP TABLE IF EXISTS master_sponsor;

CREATE TABLE `master_sponsor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(8) NOT NULL,
  `sponsor` varchar(30) NOT NULL,
  `spalamat` varchar(120) NOT NULL,
  `sptelp` varchar(40) NOT NULL,
  `aktif` int(1) NOT NULL,
  `nffoto` varchar(100) NOT NULL,
  `web` varchar(100) NOT NULL,
  `jenissp` varchar(60) NOT NULL,
  `spcp` varchar(60) NOT NULL,
  `sphp` varchar(40) NOT NULL,
  `spemail` varchar(60) NOT NULL,
  `spfax` varchar(40) NOT NULL,
  `sppriority` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

 INSERT INTO master_sponsor(id,kode,sponsor,spalamat,sptelp,aktif,nffoto,web,jenissp,spcp,sphp,spemail,spfax,sppriority)  VALUES 
  ("2","","- OTHER -","","-","0","","","","-","","","-","0");
 INSERT INTO master_sponsor(id,kode,sponsor,spalamat,sptelp,aktif,nffoto,web,jenissp,spcp,sphp,spemail,spfax,sppriority)  VALUES 
  ("178","","ORGANIZING COMMITTEE","","","0","","","","","","","","0"),
  ("5","","ABBOTT","","","0","","","","","","","","0"),
  ("6","","ACTAVIS","","","0","","","","","","","","0"),
  ("7","","ALPHARMA","","","0","","","","","","","","0"),
  ("8","","APEX PHARMA","","","0","","","","","","","","0"),
  ("9","","ARMOXINDO","","","0","","","","","","","","0"),
  ("10","","ASTA MEDICA","","","0","","","","","","","","0"),
  ("11","","ASTELLAS PHARMA INDONESIA","","","0","","","","","","","","0"),
  ("12","","ASTRAZENECA INDONESIA","","","0","","","","","","","","0"),
  ("13","","AVENTIS PHARMA","","","0","","","","","","","","0"),
  ("14","","AXCELOR","","","0","","","","","","","","0"),
  ("15","","B BRAUN MEDICAL INDONESIA","","","0","","","","","","","","0"),
  ("16","","BAXTER","","","0","","","","","","","","0"),
  ("17","","BAYER CORP","","","0","","","","","","","","0"),
  ("18","","BAYER INDONESIA","","","0","","","","","","","","0"),
  ("19","","BEAUFOUR IPSEN","","","0","","","","","","","","0"),
  ("20","","BECTON DICKINSON","","","0","","","","","","","","0"),
  ("21","","BERNA","","","0","","","","","","","","0"),
  ("22","","BERNOFARM","","","0","","","","","","","","0"),
  ("23","","BINA SEHAT","","","0","","","","","","","","0"),
  ("24","","BINTANG TOEDJOE","","","0","","","","","","","","0"),
  ("25","","BIOLIFE","","","0","","","","","","","","0"),
  ("26","","BIOMEDIS","","","0","","","","","","","","0"),
  ("27","","BIOMERIUX","","","0","","","","","","","","0"),
  ("28","","BIOVIT","","","0","","","","","","","","0"),
  ("29","","BOEHRINGER INGELHEIM","","","0","","","","","","","","0"),
  ("30","","BESINS HEALTHCARE","","","0","","","","","","","","0"),
  ("31","","BRISTOL","","","0","","","","","","","","0"),
  ("32","","BRISTOL-MYERS SQUIB","","","0","","","","","","","","0"),
  ("33","","CAPRIFARMINDO","","","0","","","","","","","","0");
 INSERT INTO master_sponsor(id,kode,sponsor,spalamat,sptelp,aktif,nffoto,web,jenissp,spcp,sphp,spemail,spfax,sppriority)  VALUES 
  ("34","","CENDO","","","0","","","","","","","","0"),
  ("35","","CHEVRON","","","0","","","","","","","","0"),
  ("36","","COMBIPHAR","","","0","","","","","","","","0"),
  ("37","","CORONET","","","0","","","","","","","","0"),
  ("38","","CORSA","","","0","","","","","","","","0"),
  ("39","","DARYA-VARIA","","","0","","","","","","","","0"),
  ("40","","DEXA MEDICA","","","0","","","","","","","","0"),
  ("41","","DINA MENDINO","","","0","","","","","","","","0"),
  ("42","","PT. Dipa Pharmalab Intersains","","","0","","","","","","","","0"),
  ("43","","DKSH","","","0","","","","","","","","0"),
  ("44","","DOXA","","","0","","","","","","","","0"),
  ("45","","EISAI","","","0","","","","","","","","0"),
  ("46","","ERLIMPEX","","","0","","","","","","","","0"),
  ("47","","ESCOLAB","","","0","","","","","","","","0"),
  ("48","","PT. Ethica Industri Farmasi","","","0","","","","","","","","0"),
  ("49","","EURO-MED","","","0","","","","","","","","0"),
  ("50","","FAHRENHEIT","","","0","","","","","","","","0"),
  ("51","","FERRON","","","0","","","","","","","","0"),
  ("52","","FOURNIER","","","0","","","","","","","","0"),
  ("53","","PT. Fresenius Kabi Indonesia","","","0","","","","","","","","0"),
  ("54","","FRISIAN","","","0","","","","","","","","0"),
  ("55","","FUTAMED","","","0","","","","","","","","0"),
  ("56","","GLAXO","","","0","","","","","","","","0"),
  ("57","","Global Health","","","0","","","","","","","","0"),
  ("58","","GLOBAL MULTI","","","0","","","","","","","","0"),
  ("59","","GRACIA PHARMINDO","","","0","","","","","","","","0"),
  ("60","","GUARDIAN","","","0","","","","","","","","0"),
  ("61","","HARMONI PRIMA MEDIKA","","","0","","","","","","","","0"),
  ("62","","HELSINN","","","0","","","","","","","","0"),
  ("63","","HEXPHARM","","","0","","","","","","","","0");
 INSERT INTO master_sponsor(id,kode,sponsor,spalamat,sptelp,aktif,nffoto,web,jenissp,spcp,sphp,spemail,spfax,sppriority)  VALUES 
  ("64","","IDS MEDICAL INDONESIA","","","0","","","","","","","","0"),
  ("65","","IKAPHARMINDO","","","0","","","","","","","","0"),
  ("66","","INDO FARMA","","","0","","","","","","","","0"),
  ("67","","INDRA SAKTI","","","0","","","","","","","","0"),
  ("68","","INMARK","","","0","","","","","","","","0"),
  ("69","","INTERBAT","","","0","","","","","","","","0"),
  ("70","","ISTI KARYA PERSADA","","","0","","","","","","","","0"),
  ("71","","JANSSEN","","","0","","","","","","","","0"),
  ("72","","JEMBATAN DUA","","","0","","","","","","","","0"),
  ("73","","JOHNSON&JOHNSON","","","0","","","","","","","","0"),
  ("74","","KALBE FARMA","","","0","","","","","","","","0"),
  ("75","","KARINDO ALKESTRON","","","0","","","","","","","","0"),
  ("76","","KIMIA FARMA","","","0","","","","","","","","0"),
  ("77","","KONIMEX","","","0","","","","","","","","0"),
  ("78","","LANDSON","","","0","","","","","","","","0"),
  ("79","","LAPI","","","0","","","","","","","","0"),
  ("80","","LAWSIM","","","0","","","","","","","","0"),
  ("81","","LEDERLE","","","0","","","","","","","","0"),
  ("82","","LES LABS","","","0","","","","","","","","0"),
  ("83","","LYEMPF","","","0","","","","","","","","0"),
  ("84","","MAHAKAM BETA FARMA","","","0","","","","","","","","0"),
  ("85","","MEAD JOHNSON","","","0","","","","","","","","0"),
  ("86","","PT. Mega Medica Pharmaceutical","","","0","","","","","","","","0"),
  ("87","","MEDICHEM","","","0","","","","","","","","0"),
  ("88","","MEDIFARMA","","","0","","","","","","","","0"),
  ("89","","MEDIKON","","","0","","","","","","","","0"),
  ("90","","MEGA","","","0","","","","","","","","0"),
  ("91","","Mega Lifesciences","","","0","","","","","","","","0"),
  ("92","","MEIJI","","","0","","","","","","","","0"),
  ("93","","MEPROFARM","","","0","","","","","","","","0");
 INSERT INTO master_sponsor(id,kode,sponsor,spalamat,sptelp,aktif,nffoto,web,jenissp,spcp,sphp,spemail,spfax,sppriority)  VALUES 
  ("94","","MERAPI UTAMA PHARMA","","","0","","","","","","","","0"),
  ("95","","MERCK","","","0","","","","","","","","0"),
  ("96","","MERSIFARMA","","","0","","","","","","","","0"),
  ("97","","METISKA","","","0","","","","","","","","0"),
  ("98","","MILLENINUM","","","0","","","","","","","","0"),
  ("99","","MITRA KESEHATAN JAYA","","","0","","","","","","","","0"),
  ("100","","MerckSharpDohme Pharma Tbk","","","0","","","","","","","","0"),
  ("101","","MUGI","","","0","","","","","","","","0"),
  ("102","","NESTLE","","","0","","","","","","","","0"),
  ("103","","NEW ZEALAND","","","0","","","","","","","","0"),
  ("104","","NICHOLAS","","","0","","","","","","","","0"),
  ("105","","NOVARTIS INDONESIA","","","0","","","","","","","","0"),
  ("106","","NOVELL","","","0","","","","","","","","0"),
  ("107","","NOVO","","","0","","","","","","","","0"),
  ("108","","NUFARINDO","","","0","","","","","","","","0"),
  ("109","","NUGRAKARSERA","","","0","","","","","","","","0"),
  ("110","","NUTRICIA","","","0","","","","","","","","0"),
  ("111","","NUTRINDO","","","0","","","","","","","","0"),
  ("112","","ORGANON","","","0","","","","","","","","0"),
  ("113","","OTSUKA","","","0","","","","","","","","0"),
  ("114","","OTTO","","","0","","","","","","","","0"),
  ("115","","PACIFIC BIOTEKINDO","","","0","","","","","","","","0"),
  ("116","","PARAGERM","","","0","","","","","","","","0"),
  ("117","","PERSONAL","","","0","","","","","","","","0"),
  ("118","","PFIZER","","","0","","","","","","","","0"),
  ("119","","PHAPROS","","","0","","","","","","","","0"),
  ("120","","Pharmasolindo","","","0","","","","","","","","0"),
  ("121","","PHAROS","","","0","","","","","","","","0"),
  ("122","","PHAROS","","","0","","","","","","","","0"),
  ("4","","PHILIPS RESPIRONICS","","","0","","","","","","","","0");
 INSERT INTO master_sponsor(id,kode,sponsor,spalamat,sptelp,aktif,nffoto,web,jenissp,spcp,sphp,spemail,spfax,sppriority)  VALUES 
  ("123","","PHYTO KEMO","","","0","","","","","","","","0"),
  ("124","","PRAFA","","","0","","","","","","","","0"),
  ("125","","PRIMA HEXAL","","","0","","","","","","","","0"),
  ("126","","PROBUS","","","0","","","","","","","","0"),
  ("127","","PRODIA","","","0","","","","","","","","0"),
  ("128","","PROMED RAHARJO","","","0","","","","","","","","0"),
  ("129","","PT. Clinisindo Putra Perkasa","","","0","","","","","","","","0"),
  ("130","","PT. FUTAMED","","","0","","","","","","","","0"),
  ("131","","PT. Global Health","","","0","","","","","","","","0"),
  ("132","","PT.PHARMALINK","","","0","","","","","","","","0"),
  ("133","","PUSPA PHARMA","","","0","","","","","","","","0"),
  ("134","","PYRIDAM","","","0","","","","","","","","0"),
  ("135","","RAJAWALI","","","0","","","","","","","","0"),
  ("136","","ROCHE INDONESIA","","","0","","","","","","","","0"),
  ("137","","ROHTO LABS","","","0","","","","","","","","0"),
  ("138","","ROI SURYA","","","0","","","","","","","","0"),
  ("139","","ROYAL PHARMALAB","","","0","","","","","","","","0"),
  ("140","","SANBE FARMA","","","0","","","","","","","","0"),
  ("141","","SANDOZ","","","0","","","","","","","","0"),
  ("142","","SANGHIANG PERKASA","","","0","","","","","","","","0"),
  ("143","","SANKYO","","","0","","","","","","","","0"),
  ("144","","SANOFI","","","0","","","","","","","","0"),
  ("145","","SARI HUSADA","","","0","","","","","","","","0"),
  ("146","","SCHERING","","","0","","","","","","","","0"),
  ("147","","SERVIER INDONESIA","","","0","","","","","","","","0"),
  ("148","","SIMEX","","","0","","","","","","","","0"),
  ("149","","SOHO","","","0","","","","","","","","0"),
  ("150","","SOLAS","","","0","","","","","","","","0"),
  ("151","","SOLVAY","","","0","","","","","","","","0"),
  ("152","","St.JUDE MEDICAL","","","0","","","","","","","","0");
 INSERT INTO master_sponsor(id,kode,sponsor,spalamat,sptelp,aktif,nffoto,web,jenissp,spcp,sphp,spemail,spfax,sppriority)  VALUES 
  ("153","","STERLING","","","0","","","","","","","","0"),
  ("154","","STIEFEL LABS","","","0","","","","","","","","0"),
  ("155","","SUNTHI","","","0","","","","","","","","0"),
  ("156","","SURYA DERMATO","","","0","","","","","","","","0"),
  ("157","","TAKEDA","","","0","","","","","","","","0"),
  ("158","","TANABE","","","0","","","","","","","","0"),
  ("159","","TEGUHSINDO","","","0","","","","","","","","0"),
  ("160","","TEMPO SCAN PACIFIC","","","0","","","","","","","","0"),
  ("161","","TIARA PERMATA SARI","","","0","","","","","","","","0"),
  ("162","","TIRTATAMA NUSA","","","0","","","","","","","","0"),
  ("163","","TRANSFARMA","","","0","","","","","","","","0"),
  ("164","","TROPICA MAS","","","0","","","","","","","","0"),
  ("165","","TUNGGAL IDAMAN","","","0","","","","","","","","0"),
  ("166","","UCB","","","0","","","","","","","","0"),
  ("167","","UNITED AMERICAN","","","0","","","","","","","","0"),
  ("168","","VALEANT","","","0","","","","","","","","0"),
  ("169","","VITABIOTICS","","","0","","","","","","","","0"),
  ("170","","WESTMONT","","","0","","","","","","","","0"),
  ("171","","WIDATRA","","","0","","","","","","","","0"),
  ("172","","PT. Satya Abadi Pharma","","","0","","","","","","","","0"),
  ("173","","YAKULT","","","0","","","","","","","","0"),
  ("174","","YAMANOUCHI","","","0","","","","","","","","0"),
  ("175","","YARINDO","","","0","","","","","","","","0"),
  ("176","","YUPHARIN","","","0","","","","","","","","0"),
  ("177","","ZAMBON","","","0","","","","","","","","0"),
  ("179","","ORGANIZING COMMITTEE","","","0","","","","","","","","0"),
  ("180","","HEARTWARE","","","0","","","","","","","","0"),
  ("181","","VIFOR PHARMA","","","0","","","","","","","","0"),
  ("182","","ALERE","","","0","","","","","","","","0"),
  ("183","","BIOSENSORS","","","0","","","","","","","","0");
 INSERT INTO master_sponsor(id,kode,sponsor,spalamat,sptelp,aktif,nffoto,web,jenissp,spcp,sphp,spemail,spfax,sppriority)  VALUES 
  ("184","","PRO-HEALTH","","","0","","","","","","","","0"),
  ("185","","INFION FARMASI","","","0","","","","","","","","0"),
  ("186","","PT. Zuellig Pharma","","","0","","","","","","","","0"),
  ("187","","PT. Global Medika Inovasi","","","0","","","","","","","","0"),
  ("188","","Medtronic","","","0","","","","","","","","0"),
  ("189","","PT. Etana Biotechnologies Indo","","","0","","","","","","","","0"),
  ("190","","PT WORLD HOLIDAY TRAVEL ","","","0","","","","","","","","0"),
  ("191","","NUCLEUS FARMA","","","0","","","","","","","","0"),
  ("192","","PT. Nulab Pharmaceutical Indon","","","0","","","","","","","","0"),
  ("193","","PT. Pharma Health Care","","","0","","","","","","","","0"),
  ("194","","PT. Pharma Health Care","","","0","","","","","","","","0"),
  ("195","","Pribadi","","","0","","","","","","","","0"),
  ("196","","Siloam Hospitals Yogyakarta","","","0","","","","","","","","0"),
  ("197","","-","","","0","","","","","","","","0"),
  ("198","","PT. Novell Pharm Labs","","","0","","","","","","","","0"),
  ("199","","Tidak ada","","","0","","","","","","","","0"),
  ("200","","PT guardian pharmatama","","","0","","","","","","","","0"),
  ("201","","PT Simex Pharmaceutical Indone","","","0","","","","","","","","0"),
  ("202","","World holiday ","","","0","","","","","","","","0");



DROP TABLE IF EXISTS master_stand;

CREATE TABLE `master_stand` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) NOT NULL,
  `tipe` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS master_tour;

CREATE TABLE `master_tour` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `rp_rate` int(8) NOT NULL,
  `us_rate` bigint(8) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS master_tstand;

CREATE TABLE `master_tstand` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(2) NOT NULL,
  `tipestand` varchar(100) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` bigint(10) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS page;

CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext NOT NULL,
  `head` text NOT NULL,
  `content` text NOT NULL,
  `images` tinytext NOT NULL,
  `pages` tinytext NOT NULL,
  `stat` tinytext NOT NULL,
  `desc` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS registrasi;

CREATE TABLE `registrasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noagg` varchar(30) NOT NULL,
  `gelardepan` varchar(20) NOT NULL,
  `gelarbelakang` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `namasert` varchar(100) NOT NULL,
  `tempat` varchar(40) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `negara` varchar(30) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kodepos` varchar(9) NOT NULL,
  `cat` varchar(40) NOT NULL,
  `cab` varchar(30) NOT NULL,
  `institusi` varchar(60) NOT NULL,
  `alamat2` text NOT NULL,
  `telp2` varchar(30) NOT NULL,
  `fax2` varchar(30) NOT NULL,
  `kota2` varchar(30) NOT NULL,
  `provinsi2` varchar(30) NOT NULL,
  `negara2` varchar(30) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `lulusan` varchar(60) NOT NULL,
  `tahunlulus` int(4) NOT NULL,
  `ip` varchar(18) NOT NULL,
  `idpaket` int(3) NOT NULL,
  `idhotel` int(5) NOT NULL,
  `idtour` int(5) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `tglexp` date NOT NULL,
  `access_key` varchar(100) NOT NULL,
  `t_tglvalidasi` date NOT NULL,
  `t_tgltransfer` date NOT NULL,
  `t_idsponsor` int(5) NOT NULL,
  `t_idbank` int(5) NOT NULL,
  `t_cp` varchar(30) NOT NULL,
  `t_hp` varchar(15) NOT NULL,
  `t_tglkonfirm` date NOT NULL,
  `ccnum` varchar(60) NOT NULL,
  `ccname` varchar(30) NOT NULL,
  `cctype` varchar(15) NOT NULL,
  `ccexp` date NOT NULL,
  `tipereg` varchar(100) NOT NULL,
  `profesi` varchar(100) NOT NULL,
  `chabstract` varchar(20) NOT NULL,
  `sp_name` varchar(60) NOT NULL,
  `sp_company` varchar(120) NOT NULL,
  `sp_address` varchar(300) NOT NULL,
  `sp_phone1` varchar(30) NOT NULL,
  `sp_phone2` varchar(30) NOT NULL,
  `sp_fax` varchar(30) NOT NULL,
  `sp_email` varchar(60) NOT NULL,
  `foto` blob NOT NULL,
  `lockbayar` int(2) NOT NULL COMMENT '1:transfer, 2:onlinepayment-cancel,:success online payment',
  `idgroup` bigint(20) DEFAULT NULL,
  `ketgroup` text NOT NULL,
  `kodepromosi` varchar(10) NOT NULL,
  `regby` varchar(30) NOT NULL,
  `lansia` int(1) NOT NULL,
  `pmethod` varchar(31) NOT NULL,
  `passport` text NOT NULL,
  `psdatang` varchar(30) NOT NULL,
  `nfdatang` varchar(30) NOT NULL,
  `tgldatang` date NOT NULL,
  `jamdatang` varchar(30) NOT NULL,
  `pspulang` varchar(30) NOT NULL,
  `nfpulang` varchar(30) NOT NULL,
  `tglpulang` date NOT NULL,
  `jampulang` varchar(30) NOT NULL,
  `matauang` varchar(3) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `httpheader` text NOT NULL,
  `jk` varchar(12) NOT NULL,
  `kdevent` varchar(12) NOT NULL,
  `nffoto` varchar(80) NOT NULL DEFAULT '',
  `snotrans` varchar(200) NOT NULL,
  `akun_docquity` int(1) NOT NULL,
  `keanggotaan` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sp_company` (`sp_company`),
  KEY `tipereg` (`tipereg`),
  KEY `profesi` (`profesi`),
  KEY `tipereg_2` (`tipereg`),
  KEY `profesi_2` (`profesi`),
  KEY `tipereg_3` (`tipereg`),
  KEY `profesi_3` (`profesi`),
  KEY `tipereg_4` (`tipereg`),
  KEY `profesi_4` (`profesi`),
  KEY `tipereg_5` (`tipereg`),
  KEY `profesi_5` (`profesi`),
  KEY `tipereg_6` (`tipereg`),
  KEY `profesi_6` (`profesi`),
  KEY `tipereg_7` (`tipereg`),
  KEY `profesi_7` (`profesi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS registrasi_tmpdoku;

CREATE TABLE `registrasi_tmpdoku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noagg` varchar(30) NOT NULL,
  `gelardepan` varchar(20) NOT NULL,
  `gelarbelakang` varchar(20) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `namasert` varchar(60) NOT NULL,
  `tempat` varchar(40) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `negara` varchar(30) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kodepos` varchar(9) NOT NULL,
  `cat` varchar(40) NOT NULL,
  `cab` varchar(30) NOT NULL,
  `institusi` varchar(60) NOT NULL,
  `alamat2` text NOT NULL,
  `telp2` varchar(30) NOT NULL,
  `fax2` varchar(30) NOT NULL,
  `kota2` varchar(30) NOT NULL,
  `provinsi2` varchar(30) NOT NULL,
  `negara2` varchar(30) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `lulusan` varchar(60) NOT NULL,
  `tahunlulus` int(4) NOT NULL,
  `ip` varchar(18) NOT NULL,
  `idpaket` int(3) NOT NULL,
  `idhotel` int(5) NOT NULL,
  `idtour` int(5) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `tglexp` date NOT NULL,
  `access_key` varchar(100) NOT NULL,
  `t_tglvalidasi` date NOT NULL,
  `t_tgltransfer` date NOT NULL,
  `t_idsponsor` int(5) NOT NULL,
  `t_idbank` int(5) NOT NULL,
  `t_cp` varchar(30) NOT NULL,
  `t_hp` varchar(15) NOT NULL,
  `t_tglkonfirm` date NOT NULL,
  `ccnum` varchar(60) NOT NULL,
  `ccname` varchar(30) NOT NULL,
  `cctype` varchar(15) NOT NULL,
  `ccexp` date NOT NULL,
  `tipereg` varchar(50) NOT NULL,
  `profesi` varchar(60) NOT NULL,
  `chabstract` varchar(20) NOT NULL,
  `sp_name` varchar(60) NOT NULL,
  `sp_company` varchar(120) NOT NULL,
  `sp_address` varchar(300) NOT NULL,
  `sp_phone1` varchar(30) NOT NULL,
  `sp_phone2` varchar(30) NOT NULL,
  `sp_fax` varchar(30) NOT NULL,
  `sp_email` varchar(60) NOT NULL,
  `foto` blob NOT NULL,
  `lockbayar` int(2) NOT NULL COMMENT '1:transfer, 2:onlinepayment-cancel,:success online payment',
  `idgroup` bigint(20) DEFAULT NULL,
  `ketgroup` text NOT NULL,
  `kodepromosi` varchar(10) NOT NULL,
  `regby` varchar(30) NOT NULL,
  `lansia` int(1) NOT NULL,
  `pmethod` varchar(31) NOT NULL,
  `passport` text NOT NULL,
  `psdatang` varchar(30) NOT NULL,
  `nfdatang` varchar(30) NOT NULL,
  `tgldatang` date NOT NULL,
  `jamdatang` varchar(30) NOT NULL,
  `pspulang` varchar(30) NOT NULL,
  `nfpulang` varchar(30) NOT NULL,
  `tglpulang` date NOT NULL,
  `jampulang` varchar(30) NOT NULL,
  `matauang` varchar(3) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `httpheader` text NOT NULL,
  `jk` varchar(12) NOT NULL,
  `kdevent` varchar(12) NOT NULL,
  `nffoto` varchar(80) NOT NULL DEFAULT '',
  `snotrans` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sp_company` (`sp_company`),
  KEY `sp_company_2` (`sp_company`),
  KEY `sp_company_3` (`sp_company`),
  KEY `sp_company_4` (`sp_company`),
  KEY `sp_company_5` (`sp_company`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

 INSERT INTO registrasi_tmpdoku(id,noagg,gelardepan,gelarbelakang,nama,namasert,tempat,tgllahir,alamat,kota,provinsi,negara,telp,fax,hp,email,kodepos,cat,cab,institusi,alamat2,telp2,fax2,kota2,provinsi2,negara2,email2,lulusan,tahunlulus,ip,idpaket,idhotel,idtour,tgl,tglexp,access_key,t_tglvalidasi,t_tgltransfer,t_idsponsor,t_idbank,t_cp,t_hp,t_tglkonfirm,ccnum,ccname,cctype,ccexp,tipereg,profesi,chabstract,sp_name,sp_company,sp_address,sp_phone1,sp_phone2,sp_fax,sp_email,foto,lockbayar,idgroup,ketgroup,kodepromosi,regby,lansia,pmethod,passport,psdatang,nfdatang,tgldatang,jamdatang,pspulang,nfpulang,tglpulang,jampulang,matauang,httpheader,jk,kdevent,nffoto,snotrans)  VALUES 
  ("6","","","","umar test2","umar test2","","0000-00-00","","sjogja","jogja","id","","","32423423","mr.um412@gmail.com","","","","umar test","","","","","","","","","0","23.106.249.52","0","0","0","2021-10-09 10:25:53","0000-00-00","84v2r4w21603q4z29474v4t2r5z2p254i513t274a4t2n4v2","0000-00-00","0000-00-00","0","0","","","0000-00-00","","","","0000-00-00","","Specialist","","","","","","","","","","0","0","","","","0","15","","","","0000-00-00","","","","0000-00-00","","IDR","","","AO2","","AOO20006073125");
 INSERT INTO registrasi_tmpdoku(id,noagg,gelardepan,gelarbelakang,nama,namasert,tempat,tgllahir,alamat,kota,provinsi,negara,telp,fax,hp,email,kodepos,cat,cab,institusi,alamat2,telp2,fax2,kota2,provinsi2,negara2,email2,lulusan,tahunlulus,ip,idpaket,idhotel,idtour,tgl,tglexp,access_key,t_tglvalidasi,t_tgltransfer,t_idsponsor,t_idbank,t_cp,t_hp,t_tglkonfirm,ccnum,ccname,cctype,ccexp,tipereg,profesi,chabstract,sp_name,sp_company,sp_address,sp_phone1,sp_phone2,sp_fax,sp_email,foto,lockbayar,idgroup,ketgroup,kodepromosi,regby,lansia,pmethod,passport,psdatang,nfdatang,tgldatang,jamdatang,pspulang,nfpulang,tglpulang,jampulang,matauang,httpheader,jk,kdevent,nffoto,snotrans)  VALUES 
  ("7","","","","umar test2","umar test2","","0000-00-00","","sjogja","kk","id","","","32423423","mr.um412@gmail.com","","","","umar test","","","","","","","","","0","23.106.249.52","0","0","0","2021-10-09 10:27:43","0000-00-00","74v2r4w2u503q4z20664v4t2n5z2p254j513t274b4t2n4v2","0000-00-00","0000-00-00","0","0","","","0000-00-00","","","","0000-00-00","","Specialist","","","","","","","","","","0","0","","","","0","15","","","","0000-00-00","","","","0000-00-00","","IDR","","","AO2","","AOO20007125226"),
  ("8","","","","umar test2","umar test2","","0000-00-00","","sjogja","","id","","","32423423","mr.um412@gmail.com","","","","institusi","","","","","","","","","0","23.106.249.54","0","0","0","2021-10-10 15:21:44","0000-00-00","y5u2r4w2y503q4z21664v4t2d4z2p254j513t274d4t2n4v2","0000-00-00","0000-00-00","0","0","","","0000-00-00","","","","0000-00-00","","Specialist","","","","","","","","","","0","0","","","","0","15","","","","0000-00-00","","","","0000-00-00","","IDR","","Male","AO2","","AOO20008125552"),
  ("9","","","","umar testb","umar testb","","0000-00-00","","sjogja","","Armenia","","","32423423","mr.um412@gmail.com","","","","instit","","","","","","","","","0","23.106.249.34","0","0","0","2021-10-10 18:12:17","0000-00-00","a4t2s4w2x503q4z26474v4t2t5z2p254s523t27484t2n4v2","0000-00-00","0000-00-00","0","0","","","0000-00-00","","","","0000-00-00","","Specialist","","","","","","","","","","0","0","","","","0","36","","","","0000-00-00","","","","0000-00-00","","USD","","Male","AO2","","AOO20009125806"),
  ("10","","","","umar m","umar m","","0000-00-00","","sjogja","","Albania","","","32423423","mr.um412@gmail.com","","","","umar test","","","","","","","","","0","23.106.249.34","0","0","0","2021-10-10 18:35:19","0000-00-00","16u2r4w2v503q4z23664v4t2s5z2p254i513t274q4t2n4v2","0000-00-00","0000-00-00","0","0","","","0000-00-00","","","","0000-00-00","","Specialist","","","","","","","","","","0","0","","","","0","36","","","","0000-00-00","","","","0000-00-00","","USD","","Male","AO2","","AOO20010072839");



DROP TABLE IF EXISTS regtour;

CREATE TABLE `regtour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) NOT NULL,
  `namabelakang` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `tglentry` timestamp NOT NULL DEFAULT current_timestamp(),
  `transid` varchar(20) NOT NULL,
  `ketbasket1` text NOT NULL,
  `ketbasket2` text NOT NULL,
  `transamount` float(10,0) NOT NULL,
  `jlhtrans` int(5) NOT NULL,
  `jlhtour` int(5) NOT NULL,
  `cek` int(2) NOT NULL,
  `pmethod` int(6) NOT NULL,
  `stat` varchar(20) NOT NULL,
  `tglbayar` date NOT NULL,
  `jlhbayar` int(11) NOT NULL,
  `ref` varchar(20) NOT NULL,
  `nfbukti` varchar(60) NOT NULL,
  `cppay` varchar(40) NOT NULL,
  `hppay` varchar(30) NOT NULL,
  `emailpay` varchar(60) NOT NULL,
  `idsponsor` int(5) NOT NULL,
  `confirmed_by` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10008 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

 INSERT INTO regtour(id,nama,namabelakang,email,telp,hp,tglentry,transid,ketbasket1,ketbasket2,transamount,jlhtrans,jlhtour,cek,pmethod,stat,tglbayar,jlhbayar,ref,nfbukti,cppay,hppay,emailpay,idsponsor,confirmed_by)  VALUES 
  ("10000","umar","bb","mr.um412@gmail.com","2309423","08783166498","2022-04-13 12:57:15","AO2TR125715","Private Rental Full Day - Toyota Innova  - 05/25/2022 (2 unit @USD 75),1125000,2,2250000,502,75,trans ;Credit card fee,67500,1,67500","&lt;input id=\"mxtot_611232\" type=hidden value=\"2317500\"&gt;&lt;table border=1 width=100% class=tcartc&gt;&lt;tr&gt;&lt;td class=\"tdjudul col1\"&gt;No&lt;/td&gt;&lt;td  class=\"tdjudul col2\"&gt;Item&lt;/td&gt;&lt;td class=\"tdjudul col3\"&gt;Sub Total&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;1&lt;/td&gt;&lt;td  align=left &gt;Private Rental Full Day - Toyota Innova  - 05/25/2022 (2 unit @USD 75)&lt;/td&gt;&lt;td  align=right &gt;2.250.000&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;2&lt;/td&gt;&lt;td  align=left &gt;Credit card fee&lt;/td&gt;&lt;td  align=right &gt;67.500&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td class=\"tdjudul\" colspan=2&gt;&lt;center&gt;Total&lt;/center&gt;&lt;/td&gt;&lt;td class=tdjudul style=\"text-align:right\"&gt;IDR 2.317.500&lt;/td&gt;	&lt;/tr&gt;&lt;/table&gt;","2317500","0","0","1","0","","0000-00-00","0","","","","","","0","");
 INSERT INTO regtour(id,nama,namabelakang,email,telp,hp,tglentry,transid,ketbasket1,ketbasket2,transamount,jlhtrans,jlhtour,cek,pmethod,stat,tglbayar,jlhbayar,ref,nfbukti,cppay,hppay,emailpay,idsponsor,confirmed_by)  VALUES 
  ("10001","Milli ","Kitty","yanti.4b4@gmail.com","081806964175","081806964175","2022-04-13 15:05:49","AO2TR030549","Private Rental Full Day - Toyota Innova  - 05/25/2022 (1 unit @USD 75),1125000,1,1125000,502,75,trans ;Bank administration fee,4540,1,4540","&lt;input id=\"mxtot_870897\" type=hidden value=\"1129540\"&gt;&lt;table border=1 width=100% class=tcartc&gt;&lt;tr&gt;&lt;td class=\"tdjudul col1\"&gt;No&lt;/td&gt;&lt;td  class=\"tdjudul col2\"&gt;Item&lt;/td&gt;&lt;td class=\"tdjudul col3\"&gt;Sub Total&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;1&lt;/td&gt;&lt;td  align=left &gt;Private Rental Full Day - Toyota Innova  - 05/25/2022 (1 unit @USD 75)&lt;/td&gt;&lt;td  align=right &gt;1.125.000&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;2&lt;/td&gt;&lt;td  align=left &gt;Bank administration fee&lt;/td&gt;&lt;td  align=right &gt;4.540&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td class=\"tdjudul\" colspan=2&gt;&lt;center&gt;Total&lt;/center&gt;&lt;/td&gt;&lt;td class=tdjudul style=\"text-align:right\"&gt;IDR 1.129.540&lt;/td&gt;	&lt;/tr&gt;&lt;/table&gt;","1129540","0","0","1","0","","0000-00-00","0","","","","","","0",""),
  ("10002","Tester Yah ","Milly","yanti.4b4@gmail.com","081806964175","081806964175","2022-04-13 15:13:40","AO2TR031340","Half Day Tour - Toyota Innova  - 05/24/2022 (1 unit @USD 60),900000,1,900000,506,60,trans ;Bank administration fee,4540,1,4540","&lt;input id=\"mxtot_252445\" type=hidden value=\"904540\"&gt;&lt;table border=1 width=100% class=tcartc&gt;&lt;tr&gt;&lt;td class=\"tdjudul col1\"&gt;No&lt;/td&gt;&lt;td  class=\"tdjudul col2\"&gt;Item&lt;/td&gt;&lt;td class=\"tdjudul col3\"&gt;Sub Total&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;1&lt;/td&gt;&lt;td  align=left &gt;Half Day Tour - Toyota Innova  - 05/24/2022 (1 unit @USD 60)&lt;/td&gt;&lt;td  align=right &gt;900.000&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;2&lt;/td&gt;&lt;td  align=left &gt;Bank administration fee&lt;/td&gt;&lt;td  align=right &gt;4.540&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td class=\"tdjudul\" colspan=2&gt;&lt;center&gt;Total&lt;/center&gt;&lt;/td&gt;&lt;td class=tdjudul style=\"text-align:right\"&gt;IDR 904.540&lt;/td&gt;	&lt;/tr&gt;&lt;/table&gt;","904540","0","0","1","0","","0000-00-00","0","","","","","","0",""),
  ("10003","umar","umar2","mr.um412@gmail.com","2309423","08783166498","2022-04-14 13:09:23","AO2TR010923","Private Rental Full Day - Toyota Innova  - 05/20/2022 (1 unit @USD 75),1125000,1,1125000,502,75,trans;Nusa Peninda West Trip 1 day  - 05/23/2022 (8 pax @USD 95),1425000,8,11400000,513,95,tour ;Credit card fee,375750,1,375750","&lt;input id=\"mxtot_821115\" type=hidden value=\"12900750\"&gt;&lt;table border=1 width=100% class=tcartc&gt;&lt;tr&gt;&lt;td class=\"tdjudul col1\"&gt;No&lt;/td&gt;&lt;td  class=\"tdjudul col2\"&gt;Item&lt;/td&gt;&lt;td class=\"tdjudul col3\"&gt;Sub Total&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;1&lt;/td&gt;&lt;td  align=left &gt;Private Rental Full Day - Toyota Innova  - 05/20/2022 (1 unit @USD 75)&lt;/td&gt;&lt;td  align=right &gt;1.125.000&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;2&lt;/td&gt;&lt;td  align=left &gt;Nusa Peninda West Trip 1 day  - 05/23/2022 (8 pax @USD 95)&lt;/td&gt;&lt;td  align=right &gt;11.400.000&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;3&lt;/td&gt;&lt;td  align=left &gt;Credit card fee&lt;/td&gt;&lt;td  align=right &gt;375.750&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td class=\"tdjudul\" colspan=2&gt;&lt;center&gt;Total&lt;/center&gt;&lt;/td&gt;&lt;td class=tdjudul style=\"text-align:right\"&gt;IDR 12.900.750&lt;/td&gt;	&lt;/tr&gt;&lt;/table&gt;","12900750","0","0","1","15","","0000-00-00","0","","","","","","0",""),
  ("10004","Yanti ","Test","yanti.4b4@gmail.com","081806964175","081806964175","2022-04-14 14:20:17","AO2TR022017","Half Day Tour - Toyota Innova  - 05/24/2022 (1 unit @USD 60),900000,1,900000,506,60,trans ;Bank administration fee,4540,1,4540","&lt;input id=\"mxtot_152867\" type=hidden value=\"904540\"&gt;&lt;table border=1 width=100% class=tcartc&gt;&lt;tr&gt;&lt;td class=\"tdjudul col1\"&gt;No&lt;/td&gt;&lt;td  class=\"tdjudul col2\"&gt;Item&lt;/td&gt;&lt;td class=\"tdjudul col3\"&gt;Sub Total&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;1&lt;/td&gt;&lt;td  align=left &gt;Half Day Tour - Toyota Innova  - 05/24/2022 (1 unit @USD 60)&lt;/td&gt;&lt;td  align=right &gt;900.000&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;2&lt;/td&gt;&lt;td  align=left &gt;Bank administration fee&lt;/td&gt;&lt;td  align=right &gt;4.540&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td class=\"tdjudul\" colspan=2&gt;&lt;center&gt;Total&lt;/center&gt;&lt;/td&gt;&lt;td class=tdjudul style=\"text-align:right\"&gt;IDR 904.540&lt;/td&gt;	&lt;/tr&gt;&lt;/table&gt;","904540","0","0","1","125","","0000-00-00","0","","","","","","0",""),
  ("10005","lina","lina","lina.4b4@gmail.com","081310944944","081310944944","2022-04-16 05:10:21","AO2TR051021","Private Rental Full Day - Toyota Avanza  - 05/23/2022 (1 unit @USD 55),825000,1,825000,501,55,trans ;Credit card fee,24750,1,24750","&lt;input id=\"mxtot_612169\" type=hidden value=\"849750\"&gt;&lt;table border=1 width=100% class=tcartc&gt;&lt;tr&gt;&lt;td class=\"tdjudul col1\"&gt;No&lt;/td&gt;&lt;td  class=\"tdjudul col2\"&gt;Item&lt;/td&gt;&lt;td class=\"tdjudul col3\"&gt;Sub Total&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;1&lt;/td&gt;&lt;td  align=left &gt;Private Rental Full Day - Toyota Avanza  - 05/23/2022 (1 unit @USD 55)&lt;/td&gt;&lt;td  align=right &gt;825.000&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;2&lt;/td&gt;&lt;td  align=left &gt;Credit card fee&lt;/td&gt;&lt;td  align=right &gt;24.750&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td class=\"tdjudul\" colspan=2&gt;&lt;center&gt;Total&lt;/center&gt;&lt;/td&gt;&lt;td class=tdjudul style=\"text-align:right\"&gt;IDR 849.750&lt;/td&gt;	&lt;/tr&gt;&lt;/table&gt;","849750","0","0","1","15","","0000-00-00","0","","","","","","0",""),
  ("10006","lina","lina","lina.4b4@gmail.com","081310944","081310944944","2022-04-16 05:16:33","AO2TR051633","Private Rental Full Day - Toyota Avanza  - 05/25/2022 (1 unit @USD 55),825000,1,825000,501,55,trans ;Bank administration fee,4540,1,4540","&lt;input id=\"mxtot_372432\" type=hidden value=\"829540\"&gt;&lt;table border=1 width=100% class=tcartc&gt;&lt;tr&gt;&lt;td class=\"tdjudul col1\"&gt;No&lt;/td&gt;&lt;td  class=\"tdjudul col2\"&gt;Item&lt;/td&gt;&lt;td class=\"tdjudul col3\"&gt;Sub Total&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;1&lt;/td&gt;&lt;td  align=left &gt;Private Rental Full Day - Toyota Avanza  - 05/25/2022 (1 unit @USD 55)&lt;/td&gt;&lt;td  align=right &gt;825.000&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;2&lt;/td&gt;&lt;td  align=left &gt;Bank administration fee&lt;/td&gt;&lt;td  align=right &gt;4.540&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td class=\"tdjudul\" colspan=2&gt;&lt;center&gt;Total&lt;/center&gt;&lt;/td&gt;&lt;td class=tdjudul style=\"text-align:right\"&gt;IDR 829.540&lt;/td&gt;	&lt;/tr&gt;&lt;/table&gt;","829540","0","0","1","123","","0000-00-00","0","","","","","","0",""),
  ("10007","Refan","Arkandra","yanti.4b4@gmail.com","081806964175","081806964175","2022-04-22 22:01:48","AO2TR100148","Private Rental Full Day - Toyota Innova  - 05/25/2022 (1 unit @USD 75),1125000,1,1125000,502,75,trans;Nusa Peninda West Trip 1 day  - 05/27/2022 (2 pax @USD 95),1425000,2,2850000,513,95,tour ;Credit card fee,119250,1,119250","&lt;input id=\"mxtot_496087\" type=hidden value=\"4094250\"&gt;&lt;table border=1 width=100% class=tcartc&gt;&lt;tr&gt;&lt;td class=\"tdjudul col1\"&gt;No&lt;/td&gt;&lt;td  class=\"tdjudul col2\"&gt;Item&lt;/td&gt;&lt;td class=\"tdjudul col3\"&gt;Sub Total&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;1&lt;/td&gt;&lt;td  align=left &gt;Private Rental Full Day - Toyota Innova  - 05/25/2022 (1 unit @USD 75)&lt;/td&gt;&lt;td  align=right &gt;1.125.000&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;2&lt;/td&gt;&lt;td  align=left &gt;Nusa Peninda West Trip 1 day  - 05/27/2022 (2 pax @USD 95)&lt;/td&gt;&lt;td  align=right &gt;2.850.000&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td align=\"center\"&gt;3&lt;/td&gt;&lt;td  align=left &gt;Credit card fee&lt;/td&gt;&lt;td  align=right &gt;119.250&lt;/td&gt;&lt;tr&gt;&lt;tr&gt;&lt;td class=\"tdjudul\" colspan=2&gt;&lt;center&gt;Total&lt;/center&gt;&lt;/td&gt;&lt;td class=tdjudul style=\"text-align:right\"&gt;IDR 4.094.250&lt;/td&gt;	&lt;/tr&gt;&lt;/table&gt;","4094250","0","0","1","15","","0000-00-00","0","","","","","","0","");



DROP TABLE IF EXISTS regtourd;

CREATE TABLE `regtourd` (
  `idreg` int(11) NOT NULL,
  `imd` int(4) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `qty` int(5) NOT NULL,
  `sat` varchar(10) NOT NULL,
  `hrg` int(11) NOT NULL,
  `jtrans` varchar(20) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jmobil` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

 INSERT INTO regtourd(idreg,imd,deskripsi,qty,sat,hrg,jtrans,ket,id,jmobil,tgl)  VALUES 
  ("10000","502","Private Rental Full Day - Toyota Innova  - 05/25/2022 (2 unit @USD 75)","2","","1125000","trans","","1","","0000-00-00");
 INSERT INTO regtourd(idreg,imd,deskripsi,qty,sat,hrg,jtrans,ket,id,jmobil,tgl)  VALUES 
  ("10000","0","Credit card fee","1","","67500","addfee","","2","","0000-00-00"),
  ("10001","502","Private Rental Full Day - Toyota Innova  - 05/25/2022 (1 unit @USD 75)","1","","1125000","trans","","3","","0000-00-00"),
  ("10001","0","Bank administration fee","1","","4540","addfee","","4","","0000-00-00"),
  ("10002","506","Half Day Tour - Toyota Innova  - 05/24/2022 (1 unit @USD 60)","1","","900000","trans","","5","","0000-00-00"),
  ("10002","0","Bank administration fee","1","","4540","addfee","","6","","0000-00-00"),
  ("10003","502","Private Rental Full Day - Toyota Innova  - 05/20/2022 (1 unit @USD 75)","1","","1125000","trans","","7","","0000-00-00"),
  ("10003","513","Nusa Peninda West Trip 1 day  - 05/23/2022 (8 pax @USD 95)","8","","1425000","tour","","8","","0000-00-00"),
  ("10003","0","Credit card fee","1","","375750","addfee","","9","","0000-00-00"),
  ("10004","506","Half Day Tour - Toyota Innova  - 05/24/2022 (1 unit @USD 60)","1","","900000","trans","","10","","0000-00-00"),
  ("10004","0","Bank administration fee","1","","4540","addfee","","11","","0000-00-00"),
  ("10005","501","Private Rental Full Day - Toyota Avanza  - 05/23/2022 (1 unit @USD 55)","1","","825000","trans","","12","","0000-00-00"),
  ("10005","0","Credit card fee","1","","24750","addfee","","13","","0000-00-00"),
  ("10006","501","Private Rental Full Day - Toyota Avanza  - 05/25/2022 (1 unit @USD 55)","1","","825000","trans","","14","","0000-00-00"),
  ("10006","0","Bank administration fee","1","","4540","addfee","","15","","0000-00-00"),
  ("10007","502","Private Rental Full Day - Toyota Innova  - 05/25/2022 (1 unit @USD 75)","1","","1125000","trans","","16","","0000-00-00"),
  ("10007","513","Nusa Peninda West Trip 1 day  - 05/27/2022 (2 pax @USD 95)","2","","1425000","tour","","17","","0000-00-00"),
  ("10007","0","Credit card fee","1","","119250","addfee","","18","","0000-00-00");



DROP TABLE IF EXISTS reservasi_hotel;

CREATE TABLE `reservasi_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_registran` varchar(10) NOT NULL,
  `idhotel` bigint(5) NOT NULL,
  `idkamar` bigint(5) NOT NULL,
  `jumkamar` int(3) NOT NULL,
  `jumextra` int(4) NOT NULL DEFAULT 0,
  `rp_rate` bigint(20) NOT NULL,
  `rp_extra` int(7) NOT NULL DEFAULT 0,
  `addfee1` int(12) NOT NULL DEFAULT 0,
  `addfee2` int(12) NOT NULL DEFAULT 0,
  `cost` decimal(13,2) NOT NULL,
  `costusd` decimal(13,2) NOT NULL,
  `disp` bigint(10) NOT NULL DEFAULT 0,
  `cekin` tinytext NOT NULL,
  `cekout` tinytext NOT NULL,
  `idsponsor` varchar(30) NOT NULL,
  `idbank` varchar(30) NOT NULL,
  `cp` tinytext NOT NULL,
  `hp` tinytext NOT NULL,
  `email` varchar(60) NOT NULL,
  `rekanan` varchar(60) NOT NULL,
  `stat` tinytext NOT NULL,
  `h1` tinyint(4) NOT NULL,
  `h2` tinyint(4) NOT NULL,
  `h3` tinyint(4) NOT NULL,
  `h4` tinyint(4) NOT NULL,
  `h5` tinyint(4) NOT NULL,
  `h6` tinyint(4) NOT NULL,
  `h7` tinyint(4) NOT NULL,
  `h8` tinyint(4) NOT NULL,
  `h9` tinyint(4) NOT NULL,
  `h10` int(4) NOT NULL,
  `h11` int(5) NOT NULL,
  `h12` int(5) NOT NULL,
  `h13` int(5) NOT NULL,
  `h14` int(5) NOT NULL,
  `h15` int(5) NOT NULL,
  `reg_by` varchar(13) NOT NULL,
  `confirmed_by` varchar(30) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `ket2` varchar(100) NOT NULL,
  `an` varchar(200) NOT NULL,
  `an_email` varchar(60) NOT NULL,
  `jorang` int(3) NOT NULL,
  `jextra` int(3) NOT NULL,
  `transid` varchar(30) NOT NULL,
  `smoking` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `disc` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS reservasi_hotel_autodel;

CREATE TABLE `reservasi_hotel_autodel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_registran` varchar(10) NOT NULL,
  `idhotel` bigint(5) NOT NULL,
  `idkamar` bigint(5) NOT NULL,
  `jumkamar` int(3) NOT NULL,
  `jumextra` int(4) NOT NULL DEFAULT 0,
  `rp_rate` bigint(20) NOT NULL,
  `rp_extra` int(7) NOT NULL DEFAULT 0,
  `addfee1` int(12) NOT NULL DEFAULT 0,
  `addfee2` int(12) NOT NULL DEFAULT 0,
  `cost` decimal(13,2) NOT NULL,
  `costusd` decimal(13,2) NOT NULL,
  `disp` bigint(10) NOT NULL DEFAULT 0,
  `cekin` tinytext NOT NULL,
  `cekout` tinytext NOT NULL,
  `idsponsor` varchar(30) NOT NULL,
  `idbank` varchar(30) NOT NULL,
  `cp` tinytext NOT NULL,
  `hp` tinytext NOT NULL,
  `email` varchar(60) NOT NULL,
  `rekanan` varchar(60) NOT NULL,
  `stat` tinytext NOT NULL,
  `h1` tinyint(4) NOT NULL,
  `h2` tinyint(4) NOT NULL,
  `h3` tinyint(4) NOT NULL,
  `h4` tinyint(4) NOT NULL,
  `h5` tinyint(4) NOT NULL,
  `h6` tinyint(4) NOT NULL,
  `h7` tinyint(4) NOT NULL,
  `h8` tinyint(4) NOT NULL,
  `h9` tinyint(4) NOT NULL,
  `h10` int(4) NOT NULL,
  `h11` int(5) NOT NULL,
  `h12` int(5) NOT NULL,
  `h13` int(5) NOT NULL,
  `h14` int(5) NOT NULL,
  `h15` int(5) NOT NULL,
  `reg_by` varchar(13) NOT NULL,
  `confirmed_by` varchar(30) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `ket2` varchar(100) NOT NULL,
  `an` varchar(200) NOT NULL,
  `an_email` varchar(60) NOT NULL,
  `jorang` int(3) NOT NULL,
  `jextra` int(3) NOT NULL,
  `transid` varchar(30) NOT NULL,
  `smoking` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `disc` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS reservasi_hotel_del;

CREATE TABLE `reservasi_hotel_del` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_registran` varchar(10) NOT NULL,
  `idhotel` bigint(5) NOT NULL,
  `idkamar` bigint(5) NOT NULL,
  `jumkamar` int(3) NOT NULL,
  `jumextra` int(4) NOT NULL DEFAULT 0,
  `rp_rate` bigint(20) NOT NULL,
  `rp_extra` int(7) NOT NULL DEFAULT 0,
  `addfee1` int(12) NOT NULL DEFAULT 0,
  `addfee2` int(12) NOT NULL DEFAULT 0,
  `cost` bigint(20) NOT NULL,
  `disp` bigint(10) NOT NULL DEFAULT 0,
  `cekin` tinytext NOT NULL,
  `cekout` tinytext NOT NULL,
  `idsponsor` varchar(30) NOT NULL,
  `idbank` varchar(30) NOT NULL,
  `cp` tinytext NOT NULL,
  `hp` tinytext NOT NULL,
  `email` varchar(60) NOT NULL,
  `rekanan` varchar(60) NOT NULL,
  `stat` tinytext NOT NULL,
  `h1` tinyint(4) NOT NULL,
  `h2` tinyint(4) NOT NULL,
  `h3` tinyint(4) NOT NULL,
  `h4` tinyint(4) NOT NULL,
  `h5` tinyint(4) NOT NULL,
  `h6` tinyint(4) NOT NULL,
  `h7` tinyint(4) NOT NULL,
  `h8` tinyint(4) NOT NULL,
  `h9` tinyint(4) NOT NULL,
  `h10` int(4) NOT NULL,
  `h11` int(5) NOT NULL,
  `h12` int(5) NOT NULL,
  `h13` int(5) NOT NULL,
  `h14` int(5) NOT NULL,
  `h15` int(5) NOT NULL,
  `reg_by` varchar(13) NOT NULL,
  `confirmed_by` varchar(30) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `an` varchar(200) NOT NULL,
  `an_email` varchar(60) NOT NULL,
  `jorang` int(3) NOT NULL,
  `jextra` int(3) NOT NULL,
  `transid` varchar(30) NOT NULL,
  `smoking` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS reservasi_kongres_workshop;

CREATE TABLE `reservasi_kongres_workshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `tglexp` datetime NOT NULL,
  `jlh` int(5) NOT NULL DEFAULT 1,
  `cost` decimal(13,2) NOT NULL DEFAULT 0.00,
  `costusd` decimal(13,2) NOT NULL,
  `disp` bigint(10) NOT NULL DEFAULT 0,
  `id_master_data` int(8) NOT NULL,
  `id_registran` int(8) NOT NULL,
  `status` varchar(30) NOT NULL,
  `sponsor` int(8) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `reg_by` varchar(15) NOT NULL,
  `rereg_date` varchar(60) NOT NULL,
  `rereg_by` varchar(30) NOT NULL,
  `rereg_place` varchar(30) NOT NULL,
  `rereg_opr` varchar(20) NOT NULL,
  `cert_date` varchar(30) NOT NULL,
  `cert_by` varchar(30) NOT NULL,
  `cert_place` varchar(30) NOT NULL,
  `cert_opr` varchar(12) NOT NULL,
  `cert_no` varchar(120) NOT NULL,
  `pendamping` varchar(30) NOT NULL DEFAULT ' -',
  `confirmed_by` varchar(30) NOT NULL,
  `cd` varchar(15) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `ket2` varchar(30) NOT NULL,
  `an` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `transid_batch` varchar(30) NOT NULL,
  `disc` decimal(15,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `id_master_data` (`id_master_data`),
  KEY `id_registran` (`id_registran`),
  KEY `sponsor` (`sponsor`),
  KEY `jenis` (`jenis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS reservasi_kongres_workshop_autodel;

CREATE TABLE `reservasi_kongres_workshop_autodel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `tglexp` datetime NOT NULL,
  `jlh` int(5) NOT NULL DEFAULT 1,
  `cost` decimal(13,2) NOT NULL DEFAULT 0.00,
  `costusd` decimal(13,2) NOT NULL,
  `disp` bigint(10) NOT NULL DEFAULT 0,
  `id_master_data` int(8) NOT NULL,
  `id_registran` int(8) NOT NULL,
  `status` varchar(30) NOT NULL,
  `sponsor` int(8) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `reg_by` varchar(15) NOT NULL,
  `rereg_date` varchar(60) NOT NULL,
  `rereg_by` varchar(30) NOT NULL,
  `rereg_place` varchar(30) NOT NULL,
  `rereg_opr` varchar(20) NOT NULL,
  `cert_date` varchar(30) NOT NULL,
  `cert_by` varchar(30) NOT NULL,
  `cert_place` varchar(30) NOT NULL,
  `cert_opr` varchar(12) NOT NULL,
  `cert_no` varchar(120) NOT NULL,
  `pendamping` varchar(30) NOT NULL DEFAULT ' -',
  `confirmed_by` varchar(30) NOT NULL,
  `cd` varchar(15) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `ket2` varchar(30) NOT NULL,
  `an` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `transid_batch` varchar(30) NOT NULL,
  `disc` decimal(15,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS reservasi_kongres_workshop_history;

CREATE TABLE `reservasi_kongres_workshop_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `tglexp` datetime NOT NULL,
  `jlh` int(5) NOT NULL DEFAULT 1,
  `cost` decimal(13,2) NOT NULL DEFAULT 0.00,
  `costusd` decimal(13,2) NOT NULL,
  `disp` bigint(10) NOT NULL DEFAULT 0,
  `id_master_data` int(8) NOT NULL,
  `id_registran` int(8) NOT NULL,
  `status` varchar(30) NOT NULL,
  `sponsor` int(8) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `reg_by` varchar(15) NOT NULL,
  `rereg_date` varchar(60) NOT NULL,
  `rereg_by` varchar(30) NOT NULL,
  `rereg_place` varchar(30) NOT NULL,
  `rereg_opr` varchar(20) NOT NULL,
  `cert_date` varchar(30) NOT NULL,
  `cert_by` varchar(30) NOT NULL,
  `cert_place` varchar(30) NOT NULL,
  `cert_opr` varchar(12) NOT NULL,
  `cert_no` varchar(120) NOT NULL,
  `pendamping` varchar(30) NOT NULL DEFAULT ' -',
  `confirmed_by` varchar(30) NOT NULL,
  `cd` varchar(15) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `ket2` varchar(30) NOT NULL,
  `an` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `transid_batch` varchar(30) NOT NULL,
  `disc` decimal(15,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `id_master_data` (`id_master_data`),
  KEY `id_registran` (`id_registran`),
  KEY `sponsor` (`sponsor`),
  KEY `jenis` (`jenis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS t_absen;

CREATE TABLE `t_absen` (
  `H_Noreg` smallint(6) DEFAULT NULL,
  `NamaLengkap` varchar(50) DEFAULT NULL,
  `NmAcara` varchar(100) DEFAULT NULL,
  `NmRuang` varchar(50) DEFAULT NULL,
  `TglMasuk` datetime DEFAULT NULL,
  `JamMasuk` datetime DEFAULT NULL,
  `JamKeluar` datetime NOT NULL,
  `kode_acara` varchar(30) DEFAULT NULL,
  `kode_ruangan` varchar(4) NOT NULL DEFAULT '',
  `Flag` int(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `JumlJam` datetime DEFAULT NULL,
  `ip` varchar(40) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sessid` varchar(40) NOT NULL,
  `comp_id` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS tbabstract;

CREATE TABLE `tbabstract` (
  `id` bigint(8) NOT NULL AUTO_INCREMENT,
  `idregabs` int(8) NOT NULL,
  `namaabs` varchar(60) NOT NULL,
  `hpabs` varchar(30) NOT NULL,
  `emailabs` varchar(80) NOT NULL,
  `id_registran` bigint(12) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` text NOT NULL,
  `topic` varchar(200) NOT NULL,
  `isi` longtext NOT NULL,
  `isi2` longtext NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `stat` varchar(15) NOT NULL,
  `nmfile` varchar(200) NOT NULL,
  `rev` int(5) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `pres_tgl` date NOT NULL,
  `pres_jam` varchar(30) NOT NULL,
  `tglvalidasi` datetime NOT NULL,
  `pres_ruang` varchar(20) NOT NULL,
  `pres_no` varchar(10) NOT NULL,
  `pres_jenis` varchar(20) NOT NULL,
  `pres_judul` varchar(200) NOT NULL,
  `pcode` varchar(10) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `tglrevisi` timestamp NOT NULL DEFAULT current_timestamp(),
  `control` varchar(30) NOT NULL,
  `presenter` varchar(60) NOT NULL,
  `idprofile` bigint(8) NOT NULL,
  `ack` varchar(20) NOT NULL,
  `kdevent` varchar(20) NOT NULL,
  `keywords` varchar(80) NOT NULL,
  `institusi` varchar(120) NOT NULL,
  `statpass` varchar(40) NOT NULL,
  `nilai` decimal(6,2) NOT NULL,
  `urlyoutube` varchar(60) NOT NULL,
  `qatime` varchar(20) NOT NULL,
  `qaurl` varchar(80) NOT NULL,
  `nfabstract` varchar(260) NOT NULL,
  `nfposter` varchar(260) NOT NULL,
  `juri` varchar(120) NOT NULL,
  `neg` varchar(40) NOT NULL,
  `nfabstract_ori` varchar(100) NOT NULL,
  `nfposter_ori` varchar(100) NOT NULL,
  `tipereg` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS tbabstract2;

CREATE TABLE `tbabstract2` (
  `id` bigint(8) NOT NULL AUTO_INCREMENT,
  `idregabs` int(8) NOT NULL,
  `namaabs` varchar(60) NOT NULL,
  `hpabs` varchar(30) NOT NULL,
  `emailabs` varchar(80) NOT NULL,
  `id_registran` bigint(12) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` text NOT NULL,
  `topic` varchar(200) NOT NULL,
  `isi` longtext NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `stat` varchar(15) NOT NULL,
  `nmfile` varchar(200) NOT NULL,
  `rev` int(5) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `pres_tgl` date NOT NULL,
  `pres_jam` varchar(30) NOT NULL,
  `tglvalidasi` datetime NOT NULL,
  `pres_ruang` varchar(20) NOT NULL,
  `pres_no` varchar(10) NOT NULL,
  `pres_jenis` varchar(20) NOT NULL,
  `pres_judul` varchar(200) NOT NULL,
  `pcode` varchar(10) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `tglrevisi` timestamp NOT NULL DEFAULT current_timestamp(),
  `control` varchar(30) NOT NULL,
  `presenter` varchar(60) NOT NULL,
  `idprofile` bigint(8) NOT NULL,
  `ack` varchar(20) NOT NULL,
  `kdevent` varchar(20) NOT NULL,
  `keywords` varchar(80) NOT NULL,
  `institusi` varchar(120) NOT NULL,
  `statpass` varchar(40) NOT NULL,
  `nilai` decimal(6,2) NOT NULL,
  `urlyoutube` varchar(60) NOT NULL,
  `qatime` varchar(20) NOT NULL,
  `qaurl` varchar(80) NOT NULL,
  `nfabstract` varchar(260) NOT NULL,
  `nfposter` varchar(260) NOT NULL,
  `juri` varchar(120) NOT NULL,
  `neg` varchar(40) NOT NULL,
  `nfabstract_ori` varchar(100) NOT NULL,
  `nfposter_ori` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS tbchat;

CREATE TABLE `tbchat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pesan` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dari_nisn` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `dari_kdguru` varchar(15) NOT NULL DEFAULT '0',
  `replyto` int(11) NOT NULL DEFAULT 0,
  `idowner` int(11) NOT NULL DEFAULT 0,
  `kdmp` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `kdkelas` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `needreply` int(1) NOT NULL DEFAULT 1,
  `terbaca` int(1) NOT NULL DEFAULT 0,
  `idroom` int(11) NOT NULL,
  `nf1` varchar(60) NOT NULL DEFAULT '',
  `private` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

 INSERT INTO tbchat(id,tgl,pesan,modified_date,dari_nisn,dari_kdguru,replyto,idowner,kdmp,kdkelas,needreply,terbaca,idroom,nf1,private)  VALUES 
  ("38","2021-04-03 10:21:44","i want to ask","2021-04-03 10:21:44","","","0","0","","","1","0","9","","0");
 INSERT INTO tbchat(id,tgl,pesan,modified_date,dari_nisn,dari_kdguru,replyto,idowner,kdmp,kdkelas,needreply,terbaca,idroom,nf1,private)  VALUES 
  ("39","2021-04-03 10:28:25","ok. please type your question.","2021-04-03 10:28:25","","","38","0","","","1","0","9","","0"),
  ("40","2021-04-03 10:29:25","this is my question","2021-04-03 10:29:25","","","0","0","","","1","0","9","","0"),
  ("41","2021-04-03 10:30:15","ok. this is my answer","2021-04-03 10:30:15","","","40","0","","","1","0","9","","0"),
  ("42","2021-04-04 07:09:06","May I Know?","2021-04-04 07:09:06","","","0","0","","","1","0","9","","0"),
  ("43","2021-04-06 20:54:49","test","2021-04-06 20:54:49","","","0","0","","","1","0","53","","0"),
  ("44","2021-04-09 07:04:33","tes","2021-04-09 07:04:33","","","0","0","","","1","0","69","","0");



DROP TABLE IF EXISTS tbchat_room;

CREATE TABLE `tbchat_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room` varchar(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `idowner` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

 INSERT INTO tbchat_room(id,room,title,idowner)  VALUES 
  ("1","Room 1","Systematic literature review of cross-protective effect of HPV vaccines based on data from randomized clinical trials and real-world evidence","0");
 INSERT INTO tbchat_room(id,room,title,idowner)  VALUES 
  ("2","Room 2","Systematic literature review of neutralizing antibody immune responses to non-vaccine targeted high-risk HPV types induced by the bivalent and the quadrivalent vaccines","0"),
  ("3","Room 3","OVERVIEW OF VISUAL INSPECTION OF THE UTERINE CERVIX WITH ACETIC ACID (VIA) EXAMINATION IN MANADO CITY IN 2020","109"),
  ("4","Room 4","DISTRIBUTION OF PAP SMEAR CYTOLOGY AT PROF.KANDOU HOSPITAL MANADO IN 2019 ? 2020","91"),
  ("5","Room 5","BURDEN OF HPV IN HEAD AND NECK CANCERS - DESIGN OF BROADEN STUDY","0"),
  ("6","Room 6","Gender-Neutral 9-Valent Human Papillomavirus Vaccination in Hong Kong: A Cost-Effectiveness Analysis","0"),
  ("8","Room 8","HISTOPATHOLOGICAL FEATURES OF CERVICAL CANCER PATIENTS AT PROF.KANDOU HOSPITAL MANADO IN 2018-2020","93"),
  ("9","Room 9","PROFILE OF ENDOMETRIAL CANCER PATIENTS AT PROF.KANDOU HOSPITAL MANADO IN 2019-2020","95"),
  ("10","Room 10","PROFILE OF CERVICAL CANCER MANAGEMENT USING RADIATION THERAPY AT  PROF. KANDOU HOSPITAL MANADO IN 2019 ? 2020","94"),
  ("11","Room 11","OVARIAN CANCER CHARACTERISTICS IN PROF. DR. R.D. KANDOU HOSPITAL MANADO 2019-2020 PERIOD","92"),
  ("12","Room 12","Influence of Total Hysterectomy on Sexual Function","44"),
  ("13","Room 13","A Rare Case of Uterine Arteriovenous Malformation in Rural Areas: Diagnosis and Management","87"),
  ("14","Room 14","EFFECT OF IMAGING ON PRE OPERATIVE STAGING AND TREATMENT OF CERVICAL CANCER","265"),
  ("15","Room 15","Economic Evaluation of HPV Vaccination Program in Low-Middle Income Countries :  A Systematic Review","131"),
  ("17","Room 17","Clinical and Cost-Effectiveness Analysis in Cervical Cancer Screening Strategies: A Systematic Review","267"),
  ("18","Room 18","Study to assess Diagnostic yield of  Cervical cytology in Tertiary care centre of India ?Five year Experience","179"),
  ("19","Room 19","QUADRIVALENT HPV VACCINE EFFECTIVENESS AND IMMUNOGENICITY IN WOMEN AGED 24-45 YEARS","0"),
  ("21","Room 21","9-VALENT HPV VACCINE IMMUNOGENICITY/SAFETY IN 27-45 VERSUS  16-26-YEAR-OLD WOMEN","0"),
  ("22","Room 22","9vHPV VACCINE IMMUNOGENICITY AND SAFETY IN VIETNAMESE STUDY PARTICIPANTS AGED 9-26 YEARS","0"),
  ("24","Room 24","SAFETY OF 4-VALENT HUMAN PAPILLOMAVIRUS VACCINE AMONG MALES IN THE UNITED STATES","343"),
  ("25","Room 25","Safety of 9-Valent Human Papillomavirus Vaccine Routinely Administered to 216,000 Individuals","0"),
  ("26","Room 26","HPV Vaccine-Related & Cervical Cancer Knowledge, Perceptions, and Information Sources among PCOS patients","61"),
  ("27","Room 27","Effectiveness of AI-guided digital colposcopy cloud platform in the era of COVID-19","268"),
  ("28","Room 28","Genital Tuberculosis Causes Infertility Treatment Failure in RSUPN dr. Cipto Mangunkusumo : A Case Report","63"),
  ("29","Room 29","Analysis of Information Exposure with the Low Utilization of the JKN-KIS Program Services for Cervical Cancer Pre-Cervical Lesions at PHC Pekauman Banjarmasin","69"),
  ("30","Room 30","RISK FACTORS OFCERVICAL PRECANCEROUS LESIONS ON POSITIVE VISUAL INSPECTION OF ACETIC ACID ATTENDING A PRIMARY HEALTH CENTER: A CASE CONTROL STUDY","59"),
  ("31","Room 31","RECURRENCE RATE OF OVARIAN CANCER IN CIPTO MANGUNKUSUMO HOSPITAL, JAKARTA","138"),
  ("32","Room 32","OVERALL SURVIVAL RATE OF OVARIAN CANCER IN CIPTO MANGUNKUSUMO HOSPITAL, JAKARTA","138"),
  ("33","Room 33","Precancerous Lesion Screening History and  Risk Factors of Cervical Cancer Patients in Ulin Hospital","67"),
  ("34","Room 34","Rapid Point of Care Detection of Antibodies to Antigens of Common HPV types (-16,-18, -31 and -45) as Biomarkers in Cervical Neoplasia ","137"),
  ("35","Room 35","BENEFITS OF NIGELLA SATIVA EXTRACTING PROTECTING OVARIUM DUE TO CISPLATIN CHEMOTHERAPY","90");
 INSERT INTO tbchat_room(id,room,title,idowner)  VALUES 
  ("36","Room 36","PERSISTENT CERVICITIS MIMICKING CERVICAL CANCER APPEARANCE, HOW TO DISTINGUISHING?","320"),
  ("37","Room 37","THE SIMPLE ACETOWHITE LABELING SYSTEM FOR ARTIFICIAL INTELLIGENCE DATASET PREPARATION","269"),
  ("39","Room 39","Optimalization the Awareness of Precancer Lesions of Cervical Cancer in Pekauman Public Health Center Banjarmasin","68"),
  ("40","Room 40","Photodynamic Therapy In Cervical Intraepithelial Neoplasia","130"),
  ("41","Room 41","Reliability of Prepacked 4% Acetic Acid for VIA Examination in DKI Jakarta","284"),
  ("42","Room 42","Clinical Symptoms of Vulvovaginitis Among Premenopausal Women: A Retrospective Study In Southeast Sulawesi","84"),
  ("43","Room 43","Triage Strategies for HrHPV-Positive Women in Different Resource Settings in China ","302"),
  ("44","Room 44","Endometrial Polyp Malignancy in Post-menopausal Woman: A Case Report","287"),
  ("45","Room 45","CORRELATION BETWEEN ASCUS, ASCH CYTOLOGY, AND COLPOSCOPY RESULTS WITH HIGH-RISK HPV IN CIPTO MANGUNKUSUMO HOSPITAL ","277"),
  ("46","Room 46","Nonpuerperal Uterine Inversion With Myoma Geburt Mimicking Cervical Cancer: A Case Report","119"),
  ("47","Room 47","Knowledge, Attitude, and Behaviour of Adolescents on Human Papillomavirus: A Cross-Sectional Study in Songan Village, Bali, Indonesia","112"),
  ("48","Room 48","The Power of ?Looking at The Cervix by VIA?: A Case Study","275"),
  ("49","Room 49","Understanding of Sexually Transmitted Infections Among Reproductive Age Women in an Urban Community Health Center:  A Cross-Sectional Study","359"),
  ("50","Room 50","The Impact of The COVID-19 Pandemic on Cervical Cancer Outpatients at Cipto Mangunkusumo Hospital","276"),
  ("51","Room 51","The Use of Self-Sampling to Improve the Follow-up Rate of HPV Positive Women: A Feasibility Study","300"),
  ("52","Room 52","FEASIBILITY OF HPV SCREENING USING SELF SAMPLING  TECHNIQUES  DURING COVID  PANDEMIC","278"),
  ("53","Room 53","DON?T HAVE COLPOSCOPY? USE YOUR PHONE CAMERA","279"),
  ("54","Room 54","Focused Drives On Special Days Can Augment Cancer Screening During COVID-19 Pandemic.","141"),
  ("55","Room 55","Role of Ultrasound in Assessing Tumor Characteristics and Locoregional spread In Cervical Cancer","157"),
  ("56","Room 56","MASS SCREENING BY PAP ? SMEAR IN TWO DISTRICT","280"),
  ("57","Room 57","Title- Barriers to Cervical Screening Among HPV-Vaccinated Women In Low-Resource Settings","186"),
  ("58","Room 58","DIAGNOSTIC VALUES OF FEMICAM FOR DETECTING PRECANCEROUS CERVICAL LESIONS","200");



DROP TABLE IF EXISTS tbconfig;

CREATE TABLE `tbconfig` (
  `id` int(11) NOT NULL,
  `organisasi` varchar(20) NOT NULL,
  `instansi` text NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `website` varchar(200) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `email_reg` varchar(80) NOT NULL,
  `email_htl` varchar(60) NOT NULL,
  `email_sci` varchar(60) NOT NULL,
  `name_reg` varchar(60) NOT NULL,
  `name_acc` varchar(80) NOT NULL,
  `email_acc` varchar(80) NOT NULL,
  `host` varchar(60) NOT NULL,
  `judulweb` varchar(250) NOT NULL,
  `deskripsiweb` varchar(350) NOT NULL,
  `tglacara` varchar(60) NOT NULL,
  `tempat` varchar(120) NOT NULL,
  `tglmaxdaftar` date NOT NULL,
  `tglmaxkonfirm` date NOT NULL,
  `gv` varchar(200) NOT NULL,
  `keyword` varchar(300) NOT NULL,
  `sekretaris` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `bank` text NOT NULL,
  `bankusd` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `arh` tinyint(1) NOT NULL,
  `aro` varchar(50) NOT NULL,
  `ako` tinyint(1) NOT NULL,
  `lockadd` tinyint(1) NOT NULL,
  `batastgl_cekin` date NOT NULL,
  `batastgl_cekout` date NOT NULL,
  `batastgl_daftar` date NOT NULL,
  `autodelhtl` bigint(3) NOT NULL,
  `infohtl` text NOT NULL,
  `batastgl_cost` date NOT NULL,
  `batastgl_lat` date DEFAULT NULL,
  `batastgl_on` date NOT NULL,
  `inforeg` longtext NOT NULL,
  `infoabs` text DEFAULT NULL,
  `topikabs` text NOT NULL,
  `ruangabs` varchar(300) NOT NULL,
  `batastgl_abs` date NOT NULL,
  `exename` varchar(30) DEFAULT NULL,
  `asetting` varchar(200) NOT NULL DEFAULT '1111111111',
  `ajudulhotel` varchar(100) NOT NULL,
  `maxsympo` int(6) NOT NULL DEFAULT 0,
  `maxworkshop` int(6) NOT NULL DEFAULT 0,
  `infohl` text NOT NULL,
  `signature1` text NOT NULL,
  `signature2` text NOT NULL,
  `jnametag` int(11) NOT NULL DEFAULT 0,
  `certno1` int(3) NOT NULL,
  `certno2` int(3) NOT NULL,
  `autodelsympo` int(3) NOT NULL,
  `pesadmin` text NOT NULL,
  `pesuser` text NOT NULL,
  `lockdb` varchar(10) DEFAULT NULL COMMENT '0:open,1:online,2:offline',
  `kurs` float(8,2) NOT NULL DEFAULT 0.00,
  `kurs2` float(10,2) NOT NULL,
  `alamatfb` varchar(100) NOT NULL,
  `alamattwitter` varchar(100) NOT NULL,
  `noreply` varchar(60) NOT NULL,
  `bahasa` varchar(6) NOT NULL,
  `sgelar` varchar(61) NOT NULL,
  `sprofesi` varchar(500) NOT NULL,
  `sstatreg` varchar(500) NOT NULL,
  `sstatreg2` varchar(500) NOT NULL COMMENT 'statreg untuk guest',
  `sjenispaket` text NOT NULL,
  `kdevent` varchar(12) NOT NULL,
  `coba` varchar(5) DEFAULT NULL,
  `dbver` int(11) NOT NULL,
  `sbank` text DEFAULT NULL,
  `nfannouncement` varchar(100) NOT NULL,
  `batastglmulai_daftar` date NOT NULL,
  `batastglmulai_abs` date NOT NULL,
  `judulwebsingkat` varchar(15) NOT NULL,
  `hpevent` varchar(30) NOT NULL,
  `nflogo` varchar(70) NOT NULL,
  `venueevent` varchar(80) NOT NULL,
  `emailevent` varchar(80) NOT NULL,
  `statwebinar` int(2) NOT NULL DEFAULT 0,
  `urlwebinar` varchar(100) NOT NULL DEFAULT '',
  `folderhostoffline` varchar(85) NOT NULL,
  `folderhostonline` varchar(85) NOT NULL,
  `rndjs` decimal(12,0) DEFAULT 1,
  `ipdebug` varchar(100) NOT NULL DEFAULT '',
  `sstatregfree` varchar(100) NOT NULL COMMENT 'statreg free',
  `bankmanual` text NOT NULL,
  `sprofesi_en` varchar(500) NOT NULL,
  `scolor` varchar(120) NOT NULL DEFAULT '#323462,#4b4e75,#656789,#7f809d,#989ab0,#b2b3c4,#ccccd8,#e5e6eb',
  `umdbver` decimal(12,0) DEFAULT 1,
  `um_intab` int(11) NOT NULL COMMENT 'int autobackupdb dlm hari',
  `css_report` longtext NOT NULL,
  `useSecureIP` int(1) DEFAULT 0,
  `autodel` int(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

 INSERT INTO tbconfig(id,organisasi,instansi,alamat,website,email,telp,fax,email_reg,email_htl,email_sci,name_reg,name_acc,email_acc,host,judulweb,deskripsiweb,tglacara,tempat,tglmaxdaftar,tglmaxkonfirm,gv,keyword,sekretaris,city,bank,bankusd,arh,aro,ako,lockadd,batastgl_cekin,batastgl_cekout,batastgl_daftar,autodelhtl,infohtl,batastgl_cost,batastgl_lat,batastgl_on,inforeg,infoabs,topikabs,ruangabs,batastgl_abs,exename,asetting,ajudulhotel,maxsympo,maxworkshop,infohl,signature1,signature2,jnametag,certno1,certno2,autodelsympo,pesadmin,pesuser,lockdb,kurs,kurs2,alamatfb,alamattwitter,noreply,bahasa,sgelar,sprofesi,sstatreg,sstatreg2,sjenispaket,kdevent,coba,dbver,sbank,nfannouncement,batastglmulai_daftar,batastglmulai_abs,judulwebsingkat,hpevent,nflogo,venueevent,emailevent,statwebinar,urlwebinar,folderhostoffline,folderhostonline,rndjs,ipdebug,sstatregfree,bankmanual,sprofesi_en,scolor,umdbver,um_intab,css_report,useSecureIP,autodel)  VALUES 
  ("743366","","","","","","","","noreply@medicalevent.id","noreply@medicalevent.id","noreply@medicalevent.id","Sekretariat","Sekretariat","noreply@medicalevent.id","https://www.me-prof.com","Me-Prof","","","","0000-00-00","0000-00-00","","","","Bandung","","","0","1111","0","0","2023-02-27","2023-03-10","0000-00-00","0","","2025-01-01","2025-01-30","2025-01-31","","","","","0000-00-00","","1111111111","27,28,1,2,3,4,5,6,7,8,9,10","0","0","","","<p><strong>Sekretariat:</strong><br />\nDepartemen/KSM Obstetri dan Ginekologi<br />\nRumah Sakit Hasan Sadikin Fakultas Kedokteran Universitas Padjadjaran<br />\nJl. Pasteur no. 38, Pasteur, Kec. Sukajadi Kota Bandung, Jawa Barat 40161<br />\n<span style=\"color:var( --e-global-color-text ); font-size:14px\">Kontak: Admin 1 (0822-695-6690) / Admin 2 (0812 2321 2363)</span></p>","0","0","0","0","","","","17000.00","17000.00","","","noreply@medicalevent.id","en","","Spesialis (SPOG),Spesialis Lain,Dokter Umum,Mahasiswa,Bidan","Peserta,Pembicara,Moderator,Panitia,Undangan","Peserta","symposium,workshop","BC5","","78","","","0000-00-00","0000-00-00","MEPROF2025","","","Holiday Inn Bandung - Pasteur","infobccog@gmail.com","0","","","","11977","","Pembicara,Moderator,Panitia,Undangan","<p>Bank Mandiri KCP Bandung&nbsp; R.S. Hasan Sadikin 13204<br />\n&nbsp;</p>\n\n<p>No. Rekening : 132-00-9898707-7</p>","","#d04940,#d55f57,#da756e,#df8b85,#e4a09c,#e9b6b3,#eeccca,#f3e2e1","16","0","","0","0");



DROP TABLE IF EXISTS tbdokuconf;

CREATE TABLE `tbdokuconf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MALLID` varchar(30) NOT NULL,
  `MALLIDP` varchar(30) NOT NULL,
  `hash_password` varchar(30) NOT NULL,
  `hash_passwordP` varchar(30) NOT NULL,
  `dokuFormAction` varchar(80) NOT NULL,
  `dokuFormActionP` varchar(80) NOT NULL,
  `dokuIP` varchar(30) NOT NULL,
  `dokuccid` float(11,2) NOT NULL,
  `dokuccen` float(11,2) NOT NULL,
  `dokuadmfee` float(11,2) NOT NULL,
  `dokubankfee` float(8,2) NOT NULL,
  `dokuva_bankfee` decimal(8,2) NOT NULL DEFAULT 4500.00,
  `usedoku` int(1) NOT NULL,
  `useveritrans` int(1) NOT NULL,
  `vtmid` varchar(61) NOT NULL,
  `vtserverkey` varchar(61) NOT NULL,
  `vtclientkey` varchar(61) NOT NULL,
  `isvtproduction` int(1) NOT NULL,
  `isvtsanitization` int(1) NOT NULL,
  `isvt3ds` int(1) NOT NULL,
  `spaych` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

 INSERT INTO tbdokuconf(id,MALLID,MALLIDP,hash_password,hash_passwordP,dokuFormAction,dokuFormActionP,dokuIP,dokuccid,dokuccen,dokuadmfee,dokubankfee,dokuva_bankfee,usedoku,useveritrans,vtmid,vtserverkey,vtclientkey,isvtproduction,isvtsanitization,isvt3ds,spaych)  VALUES 
  ("1","MCH-1403-1633388917432","MCH-2466-1046698372467","SK-RWz7YWhrFwc4qwYtrHPi","SK-Ttq9bfo4TLD5hRmvYTTp","https://staging.doku.com/Suite/Receive","https://pay.doku.com/Suite/Receive","","3.00","3.00","4500.00","0.00","4500.00","1","0","","","","0","0","0","CREDIT_CARD|VIRTUAL_ACCOUNT_DOKU|VIRTUAL_ACCOUNT_BANK_MANDIRI|VIRTUAL_ACCOUNT_BANK_SYARIAH_MANDIRI|VIRTUAL_ACCOUNT_BRI");



DROP TABLE IF EXISTS tbh_berkas;

CREATE TABLE `tbh_berkas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nfberkas` varchar(200) NOT NULL,
  `jberkas` varchar(30) NOT NULL,
  `notrans` varchar(20) NOT NULL,
  `catatan` text NOT NULL,
  `tglentry` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS tbh_deftrans;

CREATE TABLE `tbh_deftrans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jtrans` varchar(20) NOT NULL,
  `kdbranch` varchar(20) NOT NULL,
  `nmfield` varchar(30) NOT NULL,
  `isi` varchar(30) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fdet` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE IF EXISTS tbh_jenislog;

CREATE TABLE `tbh_jenislog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenislog` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `deskripsi` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tb` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `vop` varchar(20) NOT NULL,
  `addvop` varchar(15) NOT NULL,
  `detlog` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `jtrans` varchar(6) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS tbh_logbackup;

CREATE TABLE `tbh_logbackup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgllog` datetime NOT NULL DEFAULT current_timestamp(),
  `nflog` varchar(50) NOT NULL,
  `jenis` varchar(200) NOT NULL DEFAULT 'b' COMMENT 'ab:autobackup,mb:manualbackup',
  `ket1` text NOT NULL,
  `ket2` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS tbh_logclick;

CREATE TABLE `tbh_logclick` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vurl` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `vuid` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `tglclick` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mark` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `ip` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hits` decimal(11,0) NOT NULL,
  `online` decimal(11,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20091 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS tbh_logdevice;

CREATE TABLE `tbh_logdevice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idreg` int(11) NOT NULL,
  `txtheader` text NOT NULL,
  `txtbrowser` text NOT NULL,
  `tglentry` datetime NOT NULL DEFAULT current_timestamp(),
  `lastclick` datetime NOT NULL,
  `stat` int(1) NOT NULL,
  `ua` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE IF EXISTS tbh_logh2;

CREATE TABLE `tbh_logh2` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `ket` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idtrans` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `ip` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `sq` text NOT NULL,
  `idjlog` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1602 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS tbh_logip;

CREATE TABLE `tbh_logip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(17) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `svuid` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `jlhip` int(5) NOT NULL,
  `ket` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `mark` varchar(20) NOT NULL DEFAULT '',
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS tbh_menu;

CREATE TABLE `tbh_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idx` int(11) NOT NULL,
  `cap` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icn1` varchar(30) NOT NULL,
  `icn2` varchar(30) NOT NULL,
  `idheader` int(11) NOT NULL,
  `jmenu` varchar(20) NOT NULL,
  `lv` int(11) NOT NULL,
  `target` varchar(20) NOT NULL,
  `txtconfirm` varchar(60) NOT NULL,
  `tb` varchar(20) NOT NULL,
  `sopr` varchar(200) NOT NULL COMMENT 'view,add,edit,delete,view2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS tbh_sysrole2;

CREATE TABLE `tbh_sysrole2` (
  `kode` varchar(25) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `grp` varchar(39) NOT NULL,
  `tb` varchar(39) NOT NULL,
  `inactive` int(1) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

 INSERT INTO tbh_sysrole2(kode,judul,deskripsi,grp,tb,inactive)  VALUES 
  ("brd_ipwhitelist","Add Ip Whitelist Pada Dashboard","","DASHBOARD","mjab","0");
 INSERT INTO tbh_sysrole2(kode,judul,deskripsi,grp,tb,inactive)  VALUES 
  ("brd_vaset","View Aset","","DASHBOARD","mjab","0"),
  ("brd_vhu","View Hutang","","DASHBOARD","mjab","0"),
  ("brd_vomset","View Omset Penjualan","","DASHBOARD","mjab","0"),
  ("brd_vpiu","View Piutang","","DASHBOARD","mjab","0"),
  ("brd_vutil","View Grafik Barang,Reminder Stok,Hutang jt,Log","","DASHBOARD","mjab","0"),
  ("brg_vactivity","View activity","","BARANG","mjab","0"),
  ("brg_vdstock","View detail stock","","BARANG","mjab","0"),
  ("brg_vhgjmin","View Harga jual minimal","","BARANG","mjab","0"),
  ("gn_changeloc","Pindah lokasi/Cabang","","General","mjab","0"),
  ("gn_vgl","View GL","","General","mjab","0"),
  ("pb_bayar","Pelunasan hutang","","Pembelian","mjab","0"),
  ("pb_checkout","Checkout Pembelian","","Pembelian","mjab","0"),
  ("pb_vhgm","View Harga Modal","","Pembelian","mjab","0"),
  ("pj_finishjo","Finishing Penjualan Online","","Penjualan","mjab","0"),
  ("pj_vhgm","View Harga Modal","","Penjualan","mjab","0"),
  ("pj_vhpp","View HPP","","Penjualan","mjab","0"),
  ("pj_vlr","View Estimasi Laba","","Penjualan","mjab","0"),
  ("stock_detmutasi","Detail Mutasi","","Stock","mjab","0"),
  ("stock_vdebug","View Debug di mutasi","","Stock","mjab","0"),
  ("stock_vdpp","View DPP di Mutasi","","Stock","mjab","0"),
  ("stock_vhisbeli","View History Pembelian","","Stock","mjab","0"),
  ("stock_vhrghisbeli","View Harga di History Pembelian","","Stock","mjab","0"),
  ("supp_vhp","View HP","","Supplier","mjab","0"),
  ("supp_vristan","View Ristan","","Supplier","mjab","0");



DROP TABLE IF EXISTS tbhacked;

CREATE TABLE `tbhacked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pesan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE IF EXISTS tbhasilsurvey;

CREATE TABLE `tbhasilsurvey` (
  `id` int(11) NOT NULL,
  `idreg` int(11) NOT NULL,
  `tglentry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip` varchar(32) NOT NULL,
  `idsurvey` int(11) NOT NULL,
  `survey_by` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS tbhasilsurveyd;

CREATE TABLE `tbhasilsurveyd` (
  `id` int(11) NOT NULL,
  `idsoal` varchar(10) NOT NULL,
  `jawaban` varchar(40) NOT NULL,
  `idreg` int(11) NOT NULL,
  `idh` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS tbjenis;

CREATE TABLE `tbjenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(15) NOT NULL,
  `jenis` varchar(60) NOT NULL,
  `urutan` int(11) NOT NULL,
  `jlhmax` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

 INSERT INTO tbjenis(id,kode,jenis,urutan,jlhmax)  VALUES 
  ("1","sympo","Symposium","1","1");
 INSERT INTO tbjenis(id,kode,jenis,urutan,jlhmax)  VALUES 
  ("2","wks","Workshop","2","1");



DROP TABLE IF EXISTS tbkandidat;

CREATE TABLE `tbkandidat` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `Nama` varchar(80) NOT NULL,
  `Profile` text NOT NULL,
  `foto` varchar(70) NOT NULL,
  `jlhpoint` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

 INSERT INTO tbkandidat(id,no,Nama,Profile,foto,jlhpoint)  VALUES 
  ("1","1","Dr. Erni Nurjasmi, Dra., M.Kes","","fotokandidat_1_fotokandidat_1_01.jpg","0");
 INSERT INTO tbkandidat(id,no,Nama,Profile,foto,jlhpoint)  VALUES 
  ("2","2","Hj. Aan Andanawati, SSIT. M.Kes","","fotokandidat_2_fotokandidat_2_02.jpg","0"),
  ("3","3","Dr. Hj. Ade Jubaedah, SSIT. MM MKM","","fotokandidat_3_03.jpg","0"),
  ("4","4","Yetty leoni M Irawan, Msc","","fotokandidat_4_04.jpg","0"),
  ("5","5","Nunik Endang Sunarsih, SST. SH. MSc","","fotokandidat_5_05.jpg","0"),
  ("6","6","Heru Herdiawati, SST. SH. MH","","fotokandidat_6_06.jpg","0"),
  ("7","7","Dr. Indra Supradewi, MKM","","fotokandidat_7_07.jpg","0"),
  ("8","8","Hj. Sugiyati, SKM. MSi","","fotokandidat_8_08.jpg","0"),
  ("9","9","Dra. Hj. Maryanah, Amkeb. M.Kes","","fotokandidat_9_09.jpg","0"),
  ("10","10","Sri Poerwaningsih, SKM. M.Kes","","fotokandidat_10_10.jpg","0"),
  ("11","11","Tuti Sukaeti, SST. M.Kes","","fotokandidat_11_11.jpg","0"),
  ("12","12","Herlyssa, SST. MKM","","fotokandidat_12_12.jpg","0"),
  ("13","13","Ratna Chairani, SST. M.Kes","","fotokandidat_13_13.jpg","0"),
  ("14","14","Siti Romlah, MKM","","fotokandidat_14_14.jpg","0"),
  ("15","15","Ida Ayu Citarasmi, SSIT. M.Kes","","fotokandidat_15_15.jpg","0"),
  ("16","16","TIDAK SAH","","fotokandidat_16_16.jpg","0"),
  ("17","17","ABSTAIN","","fotokandidat_17_Untitled.png","0");



DROP TABLE IF EXISTS tbl1kode;

CREATE TABLE `tbl1kode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `awalan` varchar(20) NOT NULL,
  `akhiran` varchar(20) NOT NULL,
  `digit` int(11) NOT NULL,
  `noterakhir` int(11) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS tbmail;

CREATE TABLE `tbmail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subyek` varchar(200) NOT NULL,
  `kepada` text NOT NULL,
  `cc` varchar(120) NOT NULL,
  `bcc` varchar(120) NOT NULL,
  `isi` text NOT NULL,
  `tgl` date NOT NULL,
  `ket` varchar(30) NOT NULL,
  `stat` varchar(30) NOT NULL,
  `tglentry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `replyto` varchar(70) NOT NULL,
  `dari` varchar(70) NOT NULL,
  `je` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

 INSERT INTO tbmail(id,subyek,kepada,cc,bcc,isi,tgl,ket,stat,tglentry,replyto,dari,je)  VALUES 
  ("1","Sertifikat #titleimd# Anda di PIT Fetomaternal 2023","1","","","Kepada Yth. #nama#,<br />\n\n<br />\n\nTerima kasih telah berpartisipasi pada acara #titleimd# dari tanggal #waktuimd#.<br />\n\nTerlampir kami sampaikan sertifikat kehadiran #titleimd#.<br />\n\nTerima kasih<br />\n\n<br />\n\n<br />\n\n#signature2#","0000-00-00","","","2023-03-09 20:57:26","registrasi@pitfetomaternal2023jkt.com  ","","");



DROP TABLE IF EXISTS tbpage;

CREATE TABLE `tbpage` (
  `id` tinyint(3) unsigned zerofill NOT NULL,
  `pg` varchar(100) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` longtext NOT NULL,
  `katakunci` varchar(200) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `gambar2` varchar(100) NOT NULL,
  `ket` varchar(60) NOT NULL,
  `cat` varchar(15) NOT NULL,
  `lang` varchar(4) NOT NULL,
  `urutan` int(11) NOT NULL,
  `link` varchar(60) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS tbpchannel;

CREATE TABLE `tbpchannel` (
  `id` int(11) NOT NULL,
  `pchannel` int(11) NOT NULL,
  `jpchannel` varchar(20) NOT NULL,
  `url` varchar(120) NOT NULL,
  `nffoto` varchar(70) NOT NULL,
  `tnc` text NOT NULL,
  `ket` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

 INSERT INTO tbpchannel(id,pchannel,jpchannel,url,nffoto,tnc,ket)  VALUES 
  ("1","1","Manual Transfer","","manual-transfer.jpg","","Manual Transfer");



DROP TABLE IF EXISTS tbpengunjung;

CREATE TABLE `tbpengunjung` (
  `id` int(20) NOT NULL,
  `ip` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT 1,
  `online` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

 INSERT INTO tbpengunjung(id,ip,tanggal,hits,online)  VALUES 
  ("0","110.138.83.254","2025-12-04","5","1764819188");



DROP TABLE IF EXISTS tbpromosi;

CREATE TABLE `tbpromosi` (
  `id` int(8) NOT NULL,
  `email` varchar(60) NOT NULL,
  `kodepromosi` varchar(10) NOT NULL,
  `idreg` text NOT NULL,
  `kuota` int(5) NOT NULL DEFAULT 1,
  `terpakai` int(1) NOT NULL DEFAULT 0,
  `nama` varchar(60) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `potongan` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS tbschedule;

CREATE TABLE `tbschedule` (
  `id` int(11) NOT NULL,
  `hari` int(2) NOT NULL,
  `harike` varchar(40) NOT NULL,
  `jam` varchar(40) NOT NULL,
  `acara` text NOT NULL,
  `tempat` varchar(60) NOT NULL,
  `pembicara` varchar(80) NOT NULL,
  `modrator` varchar(80) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `nourut` int(5) NOT NULL,
  `imd` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS tbslider;

CREATE TABLE `tbslider` (
  `id` int(6) NOT NULL,
  `judul1` varchar(80) NOT NULL,
  `judul2` varchar(80) NOT NULL,
  `judul3` varchar(80) NOT NULL,
  `nfgambar1` varchar(100) NOT NULL,
  `nfgambar2` varchar(100) NOT NULL,
  `inactive` int(1) NOT NULL,
  `isi` text NOT NULL,
  `jlhclick` int(11) NOT NULL,
  `jenis` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

 INSERT INTO tbslider(id,judul1,judul2,judul3,nfgambar1,nfgambar2,inactive,isi,jlhclick,jenis)  VALUES 
  ("6","\n\n","","","slider2.jpg","","0","Available Soon...","13","");
 INSERT INTO tbslider(id,judul1,judul2,judul3,nfgambar1,nfgambar2,inactive,isi,jlhclick,jenis)  VALUES 
  ("5","","","","slider1.jpg","","0","Available Soon...","2",""),
  ("7","","","","slider3.jpg","","0","","0","");



DROP TABLE IF EXISTS tbspeaker2;

CREATE TABLE `tbspeaker2` (
  `id` int(11) NOT NULL,
  `id_registran` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `ket1` text NOT NULL,
  `isi` text NOT NULL,
  `nfbio` varchar(280) NOT NULL,
  `nffoto` varchar(280) NOT NULL,
  `nourut` int(4) NOT NULL,
  `nfabstract` varchar(180) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

 INSERT INTO tbspeaker2(id,id_registran,nama,jenis,judul,ket1,isi,nfbio,nffoto,nourut,nfabstract)  VALUES 
  ("2","0","Prof. Dr. Andrijono,  MD","","","","","","nffoto_2_2.jpg","0","");
 INSERT INTO tbspeaker2(id,id_registran,nama,jenis,judul,ket1,isi,nfbio,nffoto,nourut,nfabstract)  VALUES 
  ("3","0","Prof. Dr. Laila Nuranna, MD","","","","","","","0",""),
  ("4","0","Prof.  Lil Valentin","","","","","","","0",""),
  ("5","0","Prof. Noriaki Sakuragi, MD","","","","","","","0",""),
  ("6","0","Prof. Tom Bourne","","","","","","","0",""),
  ("7","0","Prof. Togas Tulandi","","","","","","","0",""),
  ("8","0","Prof. Jae-Weon Kim, MD","","","","","","","0",""),
  ("9","0","Prof.  Hye-Sung  Moon, MD","","","","","","","0",""),
  ("10","0","Dr. Kwek Jin Wei, MD","","","","","","","0",""),
  ("11","0","Dr. Mala Sibal,  MD","","","","","","","0",""),
  ("12","0","Jeong ? Yeol Park,  MD, Ph.D","","","","","","","0",""),
  ("13","0","Jukka Kemppainen, MD","","","","","","","0",""),
  ("14","0","Luis Alonso Pacheco,  MD","","","","","","","0",""),
  ("15","0","Maura Campitelli, MD., Ph.D","","","","","","","0",""),
  ("16","0","Malcolm  G. Munro MD, FRCSC, FACOG","","","","","","","0",""),
  ("17","0","Nelinda Catherine P. Pangilinan, MD, FPOGS, FPSUOG","","","","","","","0",""),
  ("18","0","Simone  Garzon,  MD","","","","","","","0",""),
  ("19","0","Sonal Panchal, MD","","","","","","","0",""),
  ("20","0","Dr. Gatot Purwoto,  MD","","","","","","","0",""),
  ("21","0","Dr. Hariyono Winarto, MD","","","","","","","0",""),
  ("22","0","Andi Darma  Putra,  MD","","","","","","","0",""),
  ("23","0","Dr. Fitriyadi  Kusuma,  MD","","","","","","","0",""),
  ("24","0","Dr. Tofan Widya Utami,  MD","","","","","","","0",""),
  ("25","0","Tricia Dewi Angraeni,  MD","","","","","","","0",""),
  ("26","0","Kartiwa Hadi Nuryanto, MD","","","","","","","0",""),
  ("27","0","Other Center","","","","","","","0","");



DROP TABLE IF EXISTS tbtamu;

CREATE TABLE `tbtamu` (
  `id` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aktif` int(1) NOT NULL,
  `replyto` bigint(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `spam` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS tbuser;

CREATE TABLE `tbuser` (
  `userid` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `email` varchar(45) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `id` bigint(6) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(80) NOT NULL,
  `identitas` varchar(40) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `statuser` int(11) NOT NULL,
  `lastclick` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

 INSERT INTO tbuser(userid,username,usertype,pass,email,aktif,id,alamat,identitas,telp,statuser,lastclick)  VALUES 
  ("admin","admin","admin","60e215f238fee44e46716319214e6e39","","0","51","","5-23","adBcc25","0","0000-00-00 00:00:00");
 INSERT INTO tbuser(userid,username,usertype,pass,email,aktif,id,alamat,identitas,telp,statuser,lastclick)  VALUES 
  ("operator","operator","operator","4b583376b2767b923c3e1da60d10de59","","0","50","","ator","operator","0","0000-00-00 00:00:00");



DROP TABLE IF EXISTS temp;

CREATE TABLE `temp` (
  `id` int(6) NOT NULL,
  `name` varchar(70) NOT NULL,
  `emailAddress` varchar(63) NOT NULL,
  `verifyKey` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




DROP TABLE IF EXISTS um_link;

CREATE TABLE `um_link` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `judul` varchar(20) NOT NULL,
  `link` varchar(60) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `nmfile` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




