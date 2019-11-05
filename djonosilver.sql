-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 10:50 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `djonosilver`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(11) NOT NULL,
  `nama_admin` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `pertanyaan` enum('Dikota mana Anda Lahir?','Apa kartun kesukaan Anda?','Siapa nama Ayah anda?') NOT NULL,
  `jawaban_pertanyaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `pass`, `pertanyaan`, `jawaban_pertanyaan`) VALUES
('01', 'admin', 'admin', 'admin', 'Apa kartun kesukaan Anda?', 'apasaja');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(11) NOT NULL,
  `nama_anggota` varchar(150) NOT NULL,
  `jenkel` enum('Laki-laki','Perempuan') NOT NULL,
  `username_anggota` varchar(150) NOT NULL,
  `password_anggota` varchar(32) NOT NULL,
  `alamat` text,
  `provinsi` int(11) DEFAULT NULL,
  `kota` int(11) DEFAULT NULL,
  `islogin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `jenkel`, `username_anggota`, `password_anggota`, `alamat`, `provinsi`, `kota`, `islogin`) VALUES
('AGT001', 'abc', 'Perempuan', 'abc', '4911e516e5aa21d327512e0c8b197616', 'JL. Bimosari No. 218, Tahunan, Umbulharjo,Yogyakarta', 1, 17, 0),
('AGT002', 'Ndaru', 'Laki-laki', 'Albert', '931af583573227f0220bc568c65ce104', 'Ngentak', 1, 17, 1),
('AGT003', 'Albertus Ndaru K', 'Laki-laki', 'Ndaru', '02b1be0d48924c327124732726097157', 'Jl. Wonosari KM 7 ', 18, 283, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` varchar(11) NOT NULL,
  `nama_bahan` varchar(25) DEFAULT NULL,
  `harga_bahan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama_bahan`, `harga_bahan`) VALUES
('BHN001', 'Emas', '500000'),
('BHN002', 'Silver', '120000');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(11) NOT NULL,
  `id_kategori` varchar(11) NOT NULL,
  `id_bahan` varchar(11) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `harga_barang` float NOT NULL,
  `berat_satuan` float NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `id_bahan`, `nama_barang`, `harga_barang`, `berat_satuan`, `foto`, `keterangan`, `stok`) VALUES
('BRG001', 'KTG001', 'BHN002', 'Cincin Nikah', 2000000, 21, 'BRG_20190108_105731cinkah22.jpg', 'Ready', 9),
('BRG002', 'KTG001', 'BHN001', 'Cincin Nikah', 2000000, 30, 'BRG_20190108_105804cinkah22.jpg', 'Ready', 8);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_pembelian` varchar(11) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `id_pembelian` varchar(11) DEFAULT NULL,
  `id_pengrajin` varchar(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `id_barang`, `id_pembelian`, `id_pengrajin`, `jumlah`, `harga_barang`, `tgl`, `status`) VALUES
('PMB001', 'BRG001', 'BLI001', 'PNR001', 7, 750000, '2018-12-12 07:38:46', 1),
('PMB002', 'BRG002', 'BLI001', 'PNR002', 2, 9900000, '2018-12-12 07:38:46', 1),
('PMB003', 'BRG001', 'BLI002', 'PNR002', 5, 750000, '2018-12-12 09:35:48', 1),
('PMB004', 'BRG002', 'BLI002', 'PNR002', 5, 9900000, '2018-12-12 09:35:48', 1),
('PMB005', 'BRG002', 'BLI003', 'PNR001', 5, 9900000, '2018-12-12 09:36:02', 1),
('PMB006', 'BRG001', 'BLI003', 'PNR001', 5, 750000, '2018-12-12 09:36:02', 1),
('PMB007', 'BRG004', 'BLI004', 'PNR001', 20, 200000000, '2018-12-12 09:36:35', 1),
('PMB008', 'BRG005', 'BLI004', 'PNR002', 20, 200000000, '2018-12-12 09:36:35', 1),
('PMB009', 'BRG003', 'BLI004', 'PNR002', 20, 200000000, '2018-12-12 09:36:35', 1),
('PMB010', 'BRG001', 'BLI005', 'PNR001', 10, 2000000, '2019-01-08 07:45:12', 1),
('PMB011', 'BRG002', 'BLI005', 'PNR001', 10, 2000000, '2019-01-08 07:45:12', 1);

--
-- Triggers `detail_pembelian`
--
DELIMITER $$
CREATE TRIGGER `kurangstokkkkk` AFTER UPDATE ON `detail_pembelian` FOR EACH ROW BEGIN
DECLARE X,Y,z INTEGER;
SELECT old.jumlah FROM detail_pembelian WHERE id_detail_pembelian=old.id_detail_pembelian and old.id_pembelian is null INTO X;
SELECT new.jumlah FROM detail_pembelian WHERE id_detail_pembelian=new.id_detail_pembelian and old.id_pembelian is null INTO Y;
SET z=Y-X;
UPDATE barang SET stok=stok+z WHERE id_barang=new.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangstokkkkkkk` BEFORE DELETE ON `detail_pembelian` FOR EACH ROW begin 
update barang set stok= stok - old.jumlah where id_barang = old.id_barang;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambahstok` AFTER INSERT ON `detail_pembelian` FOR EACH ROW begin
update barang set stok=stok+new.jumlah, keterangan='Ready', harga_barang=new.harga_barang
where id_barang= new.id_barang;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail_pemesanan` varchar(11) NOT NULL,
  `id_pemesanan` varchar(11) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `total_bayar` float NOT NULL,
  `foto` varchar(225) NOT NULL,
  `deskripsi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jasa_layanan_kirim`
--

CREATE TABLE `jasa_layanan_kirim` (
  `id_jasa_layanan_kirim` varchar(11) NOT NULL,
  `nama_jasa_layanan_kirim` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa_layanan_kirim`
--

INSERT INTO `jasa_layanan_kirim` (`id_jasa_layanan_kirim`, `nama_jasa_layanan_kirim`) VALUES
('JASA001', 'JNE'),
('JASA002', 'TIKI'),
('JASA003', 'POS');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(11) NOT NULL,
  `nama_karyawan` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `no_tlp` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KTG001', 'Cincin'),
('KTG002', 'Kalung');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` varchar(11) NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `id_penjualan` varchar(11) DEFAULT NULL,
  `id_barang` varchar(10) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tgl` datetime DEFAULT CURRENT_TIMESTAMP,
  `cek` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_anggota`, `id_penjualan`, `id_barang`, `jumlah`, `tgl`, `cek`) VALUES
('KRJ001', 'AGT001', 'PNJ001', 'BRG001', 2, '2018-12-11 14:38:37', 1),
('KRJ002', 'AGT001', 'PNJ001', 'BRG002', 2, '2018-12-11 14:38:38', 1),
('KRJ003', 'AGT002', 'PNJ002', 'BRG001', 1, '2018-12-11 16:41:55', 1),
('KRJ004', 'AGT002', 'PNJ002', 'BRG002', 1, '2018-12-11 16:41:56', 1),
('KRJ005', 'AGT001', 'PNJ003', 'BRG001', 1, '2018-12-11 19:54:05', 1),
('KRJ006', 'AGT001', 'PNJ003', 'BRG002', 1, '2018-12-11 19:54:06', 1),
('KRJ007', 'AGT003', 'PNJ004', 'BRG001', 1, '2018-12-12 08:25:30', 1),
('KRJ008', 'AGT003', 'PNJ004', 'BRG002', 1, '2018-12-12 08:25:30', 1),
('KRJ009', 'AGT001', 'PNJ005', 'BRG001', 1, '2018-12-12 08:35:15', 1),
('KRJ010', 'AGT001', 'PNJ005', 'BRG002', 1, '2018-12-12 08:35:16', 1),
('KRJ011', 'AGT003', 'PNJ006', 'BRG001', 1, '2018-12-12 10:05:51', 1),
('KRJ012', 'AGT003', 'PNJ006', 'BRG002', 1, '2018-12-12 10:05:52', 1),
('KRJ013', 'AGT003', 'PNJ007', 'BRG001', 2, '2018-12-12 10:07:04', 1),
('KRJ014', 'AGT003', 'PNJ007', 'BRG002', 1, '2018-12-12 10:07:05', 1),
('KRJ015', 'AGT001', 'PNJ008', 'BRG002', 1, '2018-12-12 11:39:50', 1),
('KRJ016', 'AGT001', 'PNJ008', 'BRG001', 1, '2018-12-12 11:39:51', 1),
('KRJ017', 'AGT001', 'PNJ009', 'BRG001', 1, '2018-12-12 16:36:59', 1),
('KRJ018', 'AGT001', 'PNJ009', 'BRG002', 1, '2018-12-12 16:37:00', 1),
('KRJ019', 'AGT001', 'PNJ009', 'BRG003', 1, '2018-12-12 16:37:01', 1),
('KRJ020', 'AGT001', 'PNJ009', 'BRG004', 1, '2018-12-12 16:37:01', 1),
('KRJ021', 'AGT001', 'PNJ009', 'BRG005', 1, '2018-12-12 16:37:05', 1),
('KRJ022', 'AGT001', 'PNJ010', 'BRG002', 2, '2019-01-08 14:45:47', 1),
('KRJ023', 'AGT001', 'PNJ010', 'BRG001', 1, '2019-01-08 14:45:48', 1);

--
-- Triggers `keranjang`
--
DELIMITER $$
CREATE TRIGGER `kurang` AFTER UPDATE ON `keranjang` FOR EACH ROW BEGIN
update barang set stok=stok-1 WHERE barang.id_barang= new.id_barang and new.id_penjualan is NULL;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangstok` AFTER INSERT ON `keranjang` FOR EACH ROW BEGIN
update barang set stok=stok-new.jumlah WHERE barang.id_barang= new.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangtotal` AFTER DELETE ON `keranjang` FOR EACH ROW BEGIN
DECLARE total integer;
DECLARE harga integer;
DECLARE ongkir integer;
select harga_barang from barang where id_barang= old.id_barang into harga;
SELECT ongkir from penjualan where id_penjualan = old.id_penjualan into ongkir;
update barang set stok=stok+old.jumlah where barang.id_barang = old.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(11) NOT NULL,
  `tgl_masuk` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total_bayar` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `tgl_masuk`, `total_bayar`) VALUES
('BLI001', '2018-12-12 07:38:46', 25050000),
('BLI002', '2018-12-12 09:35:48', 53250000),
('BLI003', '2018-12-12 09:36:02', 53250000),
('BLI004', '2018-12-12 09:36:35', 12000000000),
('BLI005', '2019-01-08 07:45:12', 40000000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(11) NOT NULL,
  `id_anggota` varchar(11) DEFAULT NULL,
  `id_kategori` varchar(11) NOT NULL,
  `id_pengrajin` varchar(11) DEFAULT NULL,
  `tgl_pelunasan` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `foto` varchar(500) NOT NULL,
  `id_bahan` varchar(11) DEFAULT NULL,
  `dp` int(11) DEFAULT NULL,
  `kekurangan` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `totalharga` int(11) DEFAULT '0',
  `berat` int(11) NOT NULL,
  `status` enum('Pending','Terverifikasi','Proses','Selesai','Dikirim','Terkirim','Waiting') DEFAULT 'Pending',
  `cek` int(11) NOT NULL DEFAULT '0',
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deskripsi` varchar(400) DEFAULT NULL,
  `bukti_pembayaran` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_anggota`, `id_kategori`, `id_pengrajin`, `tgl_pelunasan`, `tgl_selesai`, `foto`, `id_bahan`, `dp`, `kekurangan`, `jumlah`, `totalharga`, `berat`, `status`, `cek`, `tgl`, `deskripsi`, `bukti_pembayaran`) VALUES
('PSN003', 'AGT001', 'KTG001', NULL, NULL, NULL, 'PSN20190110_153640cinkah22.jpg', NULL, NULL, NULL, 1, 0, 14, 'Waiting', 0, '2019-01-10 15:36:40', 'sdfsfsdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_pengrajin`
--

CREATE TABLE `pemesanan_pengrajin` (
  `id_pemesanan_pengrajin` varchar(11) NOT NULL,
  `id_pemesanan` varchar(11) DEFAULT NULL,
  `id_pengrajin` varchar(11) DEFAULT NULL,
  `id_barang` varchar(11) DEFAULT NULL,
  `banyak` float DEFAULT NULL,
  `harga_beli` float DEFAULT NULL,
  `jumlah_bayar` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengrajin`
--

CREATE TABLE `pengrajin` (
  `id_pengrajin` varchar(11) NOT NULL,
  `nama_pengrajin` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `harga_jasa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengrajin`
--

INSERT INTO `pengrajin` (`id_pengrajin`, `nama_pengrajin`, `alamat`, `no_telp`, `harga_jasa`) VALUES
('PNR001', 'Parno', 'Jl. Gedongkuning No. 31', '085432843221', '200000'),
('PNR002', 'Ndaru K', 'Ngentak', '08123294934', '200000');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(11) NOT NULL,
  `id_jasa_layanan_kirim` varchar(11) DEFAULT NULL,
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ongkir` int(11) DEFAULT '0',
  `total_harga` int(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT 'Proses',
  `bukti` varchar(400) DEFAULT NULL,
  `resi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_jasa_layanan_kirim`, `tgl`, `ongkir`, `total_harga`, `status`, `bukti`, `resi`) VALUES
('PNJ001', 'JASA003', '2018-12-11 14:38:52', 26000, 21326000, 'Dikirim', '1542775841648.jpg', '030072204280'),
('PNJ002', 'JASA001', '2018-12-11 16:42:07', 36000, 10686000, 'Dikirim', 'spongebob4.jpg', '030072204280'),
('PNJ003', 'JASA001', '2018-12-11 19:54:27', 36000, 10686000, 'Dikirim', 'test2.jpg', '010180102446518'),
('PNJ004', 'JASA002', '2018-12-12 08:25:49', 42000, 10692000, 'Proses Pengirim', 'Murnilog.gif', NULL),
('PNJ005', 'JASA003', '2018-12-12 08:35:24', 26000, 10676000, 'Terverifikasi', 'murni.png', '010180102446518'),
('PNJ006', 'JASA001', '2018-12-12 10:06:38', 55000, 10705000, 'Dikirim', 'header.png', '010180102446518'),
('PNJ007', 'JASA001', '2018-12-12 10:07:16', 55000, 11455000, 'Dikirim', 'header.png', '010180102446518'),
('PNJ008', 'JASA003', '2018-12-12 11:40:05', 26000, 10676000, 'Terkirim', 'header.png', 'RT086052373DE'),
('PNJ009', 'JASA002', '2018-12-12 16:37:23', 43000, 610693000, 'Dikirim', 'murni.png', '030072204280'),
('PNJ010', 'JASA001', '2019-01-08 14:46:11', 36000, 6036000, 'Dikirim', 'beach-exotic-holiday-248797.jpg', '010180102446518');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `username_anggota` (`username_anggota`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail_pemesanan`);

--
-- Indexes for table `jasa_layanan_kirim`
--
ALTER TABLE `jasa_layanan_kirim`
  ADD PRIMARY KEY (`id_jasa_layanan_kirim`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_pengrajin` (`id_pengrajin`);

--
-- Indexes for table `pemesanan_pengrajin`
--
ALTER TABLE `pemesanan_pengrajin`
  ADD PRIMARY KEY (`id_pemesanan_pengrajin`);

--
-- Indexes for table `pengrajin`
--
ALTER TABLE `pengrajin`
  ADD PRIMARY KEY (`id_pengrajin`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_jasa_layanan_kirim` (`id_jasa_layanan_kirim`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`),
  ADD CONSTRAINT `pemesanan_ibfk_4` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `pemesanan_ibfk_5` FOREIGN KEY (`id_pengrajin`) REFERENCES `pengrajin` (`id_pengrajin`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_jasa_layanan_kirim`) REFERENCES `jasa_layanan_kirim` (`id_jasa_layanan_kirim`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
