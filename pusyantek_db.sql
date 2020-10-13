-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2020 at 10:43 AM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusyantek_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahasa`
--

CREATE TABLE `bahasa` (
  `id_bahasa` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `bahasa` varchar(30) NOT NULL,
  `kemampuan_bahasa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahasa`
--

INSERT INTO `bahasa` (`id_bahasa`, `nip`, `bahasa`, `kemampuan_bahasa`) VALUES
(1, '198905252010121006', 'German', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Kepala Pusyantek'),
(2, 'Tata Usaha'),
(3, 'Manajemen Pemasaran'),
(4, 'Manajemen Kontrak & Lisensi'),
(5, 'Manajemen Proyek'),
(6, 'Manajemen Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `diklat`
--

CREATE TABLE `diklat` (
  `id_diklat` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_diklat` varchar(100) NOT NULL,
  `mulai_diklat` date NOT NULL,
  `selesai_diklat` date NOT NULL,
  `tanda_lulus_diklat` varchar(40) NOT NULL,
  `tempat_diklat` varchar(35) NOT NULL,
  `negara_diklat` varchar(20) NOT NULL,
  `sponsor_diklat` varchar(40) NOT NULL,
  `file_diklat` text NOT NULL,
  `keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diklat`
--

INSERT INTO `diklat` (`id_diklat`, `nip`, `nama_diklat`, `mulai_diklat`, `selesai_diklat`, `tanda_lulus_diklat`, `tempat_diklat`, `negara_diklat`, `sponsor_diklat`, `file_diklat`, `keterangan`) VALUES
(1, '198905252010121006', 'Pelatihan diklat fungsional', '2019-05-10', '2019-06-03', 'ASDW12', 'Jakarta', 'Indonesia', '', '5b57460dc8ad46a7120f245ec70cc17c.pdf', ''),
(2, '198409052009011002', 'Pelatihan struktural', '2018-05-18', '2018-06-19', 'AD2d', 'Jakarta', 'Indonesia', '', '0892185531cfb9d38b32e374ecc66f1e.pdf', ''),
(3, '196201311989031003', 'Pelatihan struktural Kepala bidang', '2019-05-11', '2019-05-11', 'AD2d', 'Jakarta', 'Indonesia', '', 'ca06889cbce3885810c8c5d26700862a.pdf', ''),
(4, '196104071982031006', 'Pelatihan fungsional rekayasa', '2019-05-10', '2019-06-11', 'AD2d', 'Jakarta', 'Indonesia', '', '69108735c04197581f3f3769732ca7bd.pdf', ''),
(5, '198803242014022003', 'Pelatihan fungsional perekayas', '2018-05-09', '2018-05-23', 'ASDW12', 'Jakarta', 'Indonesia', '', '465ca10a3f4d6ca72823bad01d251d85.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `eselon`
--

CREATE TABLE `eselon` (
  `id_eselon` int(11) NOT NULL,
  `gol_eselon` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eselon`
--

INSERT INTO `eselon` (`id_eselon`, `gol_eselon`) VALUES
(2, 'I/A'),
(3, '..'),
(4, 'IV/B'),
(5, 'IV/A'),
(6, 'III/A'),
(7, 'II/A');

-- --------------------------------------------------------

--
-- Table structure for table `fungsional`
--

CREATE TABLE `fungsional` (
  `nip` varchar(20) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `status_fungsional` varchar(10) NOT NULL,
  `id_fungsional` int(11) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `no_sk` varchar(30) NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `file_sk` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fungsional`
--

INSERT INTO `fungsional` (`nip`, `id_jabatan`, `status_fungsional`, `id_fungsional`, `tanggal_sk`, `no_sk`, `tmt_jabatan`, `file_sk`, `status`) VALUES
('197105152003122003', 2, 'Aktif', 1, '2019-04-29', '-', '2019-02-19', '440cb4e91ef0137261f6f9cb2eb04b9f.pdf', 1),
('196004061989031002', 9, 'Aktif', 2, '2019-04-16', '-', '2019-02-04', '9d1b286422818e660cd649c90116f3fd.pdf', 1),
('198601072009122002', 10, 'Aktif', 3, '2019-04-30', '-', '2019-02-19', '64fac6154d4ccdc52120bc47a69ce9d2.pdf', 1),
('197508162002122002', 4, 'Aktif', 4, '2019-04-24', '-', '2019-02-06', 'ce4b7524d63f7bc76aaf3d4b1ec17f82.pdf', 1),
('195805301982032001', 9, 'Aktif', 5, '2019-04-24', '-', '2019-02-19', '1a92110bcb0a00ad665d837cf214e75b.pdf', 1),
('196205171988031001', 9, 'Aktif', 6, '2019-04-30', '-', '2019-03-13', '0b01027fdcbd69921a6f688ff6dd02e9.pdf', 1),
('196201311989031003', 9, 'Aktif', 7, '2019-04-24', '-', '2019-03-13', '3dd1b9d78e5d326c0f88b67944365d9e.pdf', 1),
('196611251986021001', 11, 'Aktif', 8, '2019-04-23', '-', '2019-02-06', 'd8058fde4f101cf6adf269ad02841837.pdf', 1),
('197003111996031001', 6, 'Aktif', 9, '2019-05-01', '-', '2019-02-04', '741cd9ba10490ddd6d283a3200540f05.pdf', 1),
('196303281991031004', 9, 'Aktif', 10, '2019-04-24', '-', '2019-02-19', '3ec413683f91f928f8eda8f45190ac29.pdf', 1),
('198411142009121002', 2, 'Aktif', 11, '2019-04-16', '-', '2019-03-19', 'c02733f18cb6d2ea8b17b09c5ad449e6.pdf', 1),
('195809241987031001', 6, 'Aktif', 12, '2019-04-29', '-', '2019-03-13', 'e6c4f9cb30079668163c8ca1608e79bb.pdf', 1),
('198503042008011004', 1, 'Aktif', 13, '2019-04-30', '-', '2019-02-04', 'c86b5b53c71560d48c2c01376b800aaa.pdf', 1),
('196402081985101001', 12, 'Aktif', 14, '2019-04-15', '-', '2019-03-13', 'cbb084a3ef8c2926843d39f2b2d35f93.pdf', 1),
('196104071982031006', 5, 'Aktif', 15, '2019-04-23', '-', '2019-02-04', 'd80d4763cd7ff267f9176c02133ad264.pdf', 1),
('198905252010121006', 1, 'Aktif', 16, '2019-06-19', '94 TAHUN 2018', '2019-02-06', '47abdd145435fa63fd5c8ce945b7b0e2.pdf', 1),
('1966112519860210012', 3, 'Aktif', 17, '2019-08-07', '94 TAHUN 2018', '2019-08-01', 'a8cd99ce70c104e0a8a0ea79981ebde4.pdf', 1),
('19661125198602100122', 3, 'Aktif', 18, '2019-08-20', '94 TAHUN 2018', '2019-02-06', '9c661f404d8a01a7707a2e597ff64155.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` varchar(6) NOT NULL,
  `pangkat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `pangkat`) VALUES
('I/a', 'Juru Muda'),
('I/b', 'Juru Muda Tingkat I'),
('I/c', 'Juru'),
('I/d', 'Juru Tingkat I'),
('II/a', 'Pengatur Muda'),
('II/b', 'Pengatur Muda Tingkat I'),
('II/c', 'Pengatur'),
('II/d', 'Pengatur Tingkat I'),
('III/a', 'Penata Muda'),
('III/b', 'Penata Muda Tingkat 1'),
('III/c', 'Penata'),
('III/d', 'Penata Tingkat I'),
('IV/a', 'Pembina'),
('IV/b', 'Pembina Tingkat I');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `nm_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `id_jabatan`, `nm_jabatan`) VALUES
(1, 'III/a', 'Perekayasa Pertama'),
(2, 'III/b', 'Perekayasa Pertama'),
(3, 'III/c', 'Perekayasa Muda'),
(4, 'III/d', 'Perekayasa Muda'),
(5, 'IV/a', 'Perekayasa Madya'),
(6, 'IV/b', 'Perekayasa Madya'),
(7, 'IV/d', 'Perekayasa Utama'),
(8, 'IV/e', 'Perekayasa Utama'),
(9, 'IV/c', 'Perekayasa Madya'),
(10, 'III/a', 'Arsiparis Pertama'),
(11, 'III/b', 'Teknisi Litkayasa Pelaksana Lanjutan '),
(12, 'III/b', 'Perencana Pertama');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_struktural`
--

CREATE TABLE `jabatan_struktural` (
  `id_jabatan` int(11) NOT NULL,
  `nm_jabatan` varchar(60) NOT NULL,
  `level_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_struktural`
--

INSERT INTO `jabatan_struktural` (`id_jabatan`, `nm_jabatan`, `level_jabatan`) VALUES
(2, 'Kepala Pusyantek', 1),
(5, 'Kepala Sub Bidang Manajemen Pemasaran', 3),
(6, 'Kepala Sub Bagian Tata Usaha', 3),
(7, 'Kepala Bidang Manajemen Pemasaran', 2),
(8, 'Kepala Sub Bidang Perencanaan Pemasaran', 3),
(9, 'Kepala Bidang Manajemen Proyek', 2),
(10, 'Kepala Sub Bidang Pelayanan Jasa', 3),
(11, 'Kepala Sub Bidang Pematangan Usaha', 3),
(12, 'Staff Bidang Manajemen Pemasaran', 4),
(13, 'Kepala Sub Bidang Manajemen Keuangan', 3),
(14, 'Staff Bagian Tata Usaha', 4),
(15, 'Ka.Bid Manajemen Kontrak & Lisensi', 2),
(16, 'Kepala Sub Bidang Kontrak', 3),
(17, 'Staff Sub Bidang Perencanaan Pemasaran', 4),
(18, 'Staff Sub Bidang Pembiayaan & Pelaporan', 4),
(19, 'Ka.Sub.Bidang Verifikasi', 3),
(20, 'Ka.Sub.Bidang Penerimaan', 3),
(21, 'Staff Sub Bidang Pemasyarakatan', 4),
(23, 'Staff Sub Bidang Pelayanan Jasa ', 4),
(24, 'Staff Sub Bidang Pematangan Usaha', 4),
(26, 'Ka.Sub.Bidang Pemasyarakatan', 3),
(27, 'Ka.Sub.Bidang Kontrak', 3),
(28, 'Ka.Sub.Bidang Lisensi', 3),
(29, 'Ka.Sub.Bagian Tata Usaha', 3),
(30, 'Staff Sub Bidang Monitoring & Evaluasi', 4),
(31, 'Ka.Sub.Bidang Perencanaan Pemasaran', 3),
(32, 'Ka.Bid Manajemen Proyek', 2),
(33, 'Ka.Sub.Bidang Pelayanan Jasa', 3),
(34, 'Ka.Bid Manajemen Kontrak & Litigasi', 2),
(35, 'Ka.Bid Manajemen Keuangan', 2),
(36, 'Staff Sub Bidang Kontrak', 4),
(37, 'Staff Sub Bidang Lisensi', 4),
(38, 'Staff Sub Bidang Verifikasi', 4),
(39, 'Staff Sub Bidang Penerimaan', 4),
(40, 'Ka.Sub.Bidang Pembiayaan & Pelaporan', 3),
(41, 'Ka.Bid Manajemen Pemasaran', 2),
(42, 'Ka.Sub.Bidang Monitoring & Evaluasi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kapasitas_server`
--

CREATE TABLE `kapasitas_server` (
  `id_kapasitas` int(11) NOT NULL,
  `kapasitas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kapasitas_server`
--

INSERT INTO `kapasitas_server` (`id_kapasitas`, `kapasitas`) VALUES
(1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `kartu`
--

CREATE TABLE `kartu` (
  `id_kartu` int(11) NOT NULL,
  `jenis_kartu` varchar(40) NOT NULL,
  `no_kartu` varchar(30) NOT NULL,
  `file_kartu` text NOT NULL,
  `nip` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartu`
--

INSERT INTO `kartu` (`id_kartu`, `jenis_kartu`, `no_kartu`, `file_kartu`, `nip`) VALUES
(1, 'BPJS', 'Q 029837', '8995993e4eb0aeb08cfc5763ce9fc57d.pdf', '196403111985101001'),
(2, 'NPWPs', 'wdqwdqs', '6803346ae49b7c857c8ce332a1b7f3f9.pdf', '198905252010121006'),
(3, 'NPWP', '2', '2412c61530932cad6bdd77d23c100ffe.pdf', '196608261992032001'),
(4, 'BPJS', 'wdqwdqs', 'd00cf6c5890d3cf6a971ecadeddbda63.pdf', '1966112519860210012'),
(5, 'BPJS', 'Q 029837', 'bc279da553227740e974506ccd2d47a7.pdf', '19661125198602100122'),
(6, 'NPWP', 'wdqwdqs', 'd63babd88a6af8c999f42ac78c0fa5c4.jpg', '19661125198602100122');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_klg` varchar(50) NOT NULL,
  `status_klg` varchar(20) NOT NULL,
  `jk_klg` enum('Laki-Laki','Perempuan') NOT NULL,
  `tl_klg` date NOT NULL,
  `tl_menikah` date NOT NULL,
  `catatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id_keluarga`, `nip`, `nama_klg`, `status_klg`, `jk_klg`, `tl_klg`, `tl_menikah`, `catatan`) VALUES
(2, '198905252010121006', 'Rasda', 'Istri', 'Perempuan', '2019-03-18', '2019-06-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(20) NOT NULL,
  `nip_lama` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `agama` varchar(9) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `status_pgw` varchar(4) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `foto` text NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pensiun` varchar(10) NOT NULL,
  `tanggal_bergabung` date NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  `jabatan_pelaksana` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nip_lama`, `nama`, `agama`, `jenis_kelamin`, `status_pgw`, `alamat`, `no_telp`, `id_bidang`, `foto`, `tempat_lahir`, `tanggal_lahir`, `pensiun`, `tanggal_bergabung`, `keterangan`, `jabatan_pelaksana`) VALUES
('1', '1', 'Titiek Enny Hadianti ', 'Islam', 'Perempuan', 'BLU', 'jl', '231231', 3, 'f24dc6fec060c9086d256cca4dcdd0af.jpg', 'Jakarta', '1951-03-20', '58', '0000-00-00', 'NON PNS', ''),
('10', '10', 'Heriyanti', 'Islam', 'Perempuan', 'BLU', 'jl', '231231', 6, '5380182161bddbd6e9894849a93acdc9.jpg', 'Jakarta', '1984-08-26', '58', '0000-00-00', 'NON PNS', ''),
('11', '11', 'Deny Arjuniadi', 'Islam', 'Laki-Laki', 'BLU', 'jl', '231231', 6, '3724c4c54a816c6cc5fe51221ad7922b.jpg', 'Jakarta', '1992-06-01', '58', '0000-00-00', 'NON PNS', ''),
('12', '12', 'Uci Sri Sundari', 'Islam', 'Perempuan', 'BLU', 'jl', '231231', 6, 'f0e80a5905785e08b9820b90ad43723b.jpg', 'Jakarta', '1991-11-05', '58', '0000-00-00', 'NON PNS', ''),
('13', '13', 'Puput Prihantini', 'Islam', 'Laki-Laki', 'BLU', 'jl', '231231', 6, 'd3257ee2e54d84cbfb9258afc331ec3b.jpg', 'Jakarta', '1994-04-28', '58', '0000-00-00', 'NON PNS', ''),
('14', '14', 'Anggel Vegita Risdi', 'Protestan', 'Perempuan', 'BLU', 'jl', '231231', 6, 'default.jpg', 'Jakarta', '1996-08-05', '58', '0000-00-00', 'NON PNS', ''),
('15', '15', 'Agustinus Dari Pase Ndori', 'Islam', 'Laki-Laki', 'BLU', 'jl', '231231', 2, '13546bd431811afe7f725c33f332848c.jpg', 'Jakarta', '1985-08-26', '58', '0000-00-00', 'NON PNS', ''),
('16', '16', 'Urip Wahyudin', 'Islam', 'Laki-Laki', 'BLU', 'jl', '231231', 2, 'b59327e52e0f18970942a9b81cd2319c.jpg', 'Jakarta', '1985-12-10', '58', '0000-00-00', 'NON PNS', ''),
('17', '17', 'Maria Agnes Debrina ', 'Katolik', 'Perempuan', 'BLU', 'jl', '231231', 2, 'ec8a9b9c4da55281c2421199e9e28df7.jpg', 'Jakarta', '1993-05-21', '58', '0000-00-00', 'NON PNS', ''),
('18', '18', 'Feby Damayanti', 'Islam', 'Perempuan', 'BLU', 'jl', '231231', 2, 'c41bff542a39ea6e131c1e1df72f12d9.jpg', 'Jakarta', '1986-02-03', '58', '0000-00-00', 'NON PNS', ''),
('19', '19', 'Selvy Kusumawati ', 'Islam', 'Perempuan', 'BLU', 'jl', '231231', 2, 'default.jpg', 'Jakarta', '0000-00-00', '58', '0000-00-00', 'NON PNS', 'Resepsionis'),
('195805301982032001', '680000744', 'Dra. Yanie Meilani, MSc.', 'Islam', 'Perempuan', 'PNS', 'Alam Asri 3 J.5/25 Vila Dago', '123123123', 3, 'd11428c65dced20064a436aaee7fa5a2.jpg', 'Jakarta', '1958-05-30', '58', '2019-04-30', 'PNS', ''),
('195809241987031001', '680001948', 'Ir. Wendranirsa, MSc.', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 5, '0149dd406cef5c22927ac9dd72d699a7.jpg', 'Jakarta', '1958-09-24', '60', '0000-00-00', 'PNS', ''),
('195809301986031005', '680001687', 'Dr. Ir. Unggul Priyanto, M.Sc', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 5, '4964ba67316646dc9ffb7ecfe709da28.jpg', 'Jakarta', '1958-09-30', '58', '0000-00-00', 'PNS', ''),
('196004061989031002', '68002492', 'Drs. Priyambodo Rahardjo.', 'Islam', 'Laki-Laki', 'PNS', 'jls', '231231', 2, '234ec574ae94f528ccf0586ce8d455e5.jpg', 'Jakarta', '1960-04-06', '60', '0000-00-00', 'PNS', ''),
('196104071982031006', '680000746', 'Mulyono, SE. MM', 'Islam', 'Laki-Laki', 'PNS', 'Alam Asri 3 J.5/25 Vila Dago', '12312312313', 6, '989096a673894a5896353463b5cd74f2.jpg', 'Jakarta', '1961-04-07', '65', '2011-01-20', 'PNS', ''),
('196107071988032001', '680002217', 'Dra. Vionita Lukitari Ari P, M', 'Protestan', 'Perempuan', 'PNS', 'jl', '231231', 6, '1fffa8bec303322cea2958211a0acc9f.jpg', 'Jakarta', '1961-07-07', '60', '0000-00-00', 'PNS', ''),
('196201311989031003', '680002547', 'Drs. Adim Hadi, MM', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 4, 'd06ebc5e12698c81a7a7e74bc5ebbe0e.jpg', 'Jakarta', '1962-01-31', '60', '0000-00-00', 'PNS', ''),
('196205171988031001', '680002223', 'Ir. Nizam Ghazali, M. Eng.', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 3, 'b48951d3bc3800bde5c7bbee99a3a3d7.jpg', 'Jakarta', '1962-05-17', '60', '0000-00-00', 'PNS', ''),
('196303281991031004', '680002976', 'Najmi Abbas, SE. MM', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 5, '088fc93aa5ad747dac176a7e6681f775.jpg', 'Jakarta', '1963-03-28', '58', '0000-00-00', 'PNS', ''),
('196402081985101001', '680001389', 'Setyosuko, SE.  MM', 'Islam', 'Laki-Laki', 'PNS', 'Alam Asri 3 J.5/25 Vila Dago', '123123131', 6, 'a4bbf956c3b43d094230106bed1f2acb.jpg', 'Jakarta', '1964-02-08', '58', '2011-01-26', 'PNS', ''),
('196403111985101001', '680001391', 'Drs. Anggara Lomak Prihatin.', 'Protestan', 'Laki-Laki', 'PNS', 'jl', '231231', 6, 'ff93a9a11fcfb4ea47dcc33d77bc6c95.jpg', 'Jakarta', '1964-03-11', '60', '0000-00-00', 'PNS', ''),
('196608261992032001', '680000744', 'Dr. Yenni Bakhtiar, M.Ag.Sc. ', 'Islam', 'Perempuan', 'PNS', 'jl2', '231231', 1, '22c4b5fbfe8b92391d92503497b0c5f9.jpg', 'Jakarta', '0000-00-00', '58', '0000-00-00', 'PNS', ''),
('196611251986021001', '680001605', 'Raden Trimanadi, S.Sos', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 4, 'bde866e8ac3e4c59183a715c1c931810.jpg', 'Jakarta', '1966-11-25', '60', '0000-00-00', 'PNS', ''),
('1966112519860210012', '680005080', 'Abdul Rahman', 'Islam', 'Laki-Laki', 'PNS', 'Alam Asri 3 J.5/25 Vila Dago', '1231231231', 3, 'e994ca897017a2f735e59afea43512c0.jpg', 'Tangsel', '2019-03-19', '58', '2019-07-10', 'Pensiun', ''),
('19661125198602100122', '', 'Abdul Rahman', 'Protestan', 'Laki-Laki', 'PNS', 'Alam Asri 3 J.5/25 Vila Dago', '2131241231234', 5, 'default.jpg', 'Tangsel', '2019-03-25', '0', '2011-01-26', 'PNS', ''),
('196808071998031000', '680003837', 'Ahmad Riyadi, S.Si., M.Si', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 5, '39fd888b661f70902b13118ba4e8844c.jpg', 'Jakarta', '1968-08-07', '58', '0000-00-00', 'PNS', ''),
('197003111996031001', '680003608', 'Hadi Surachman, ST, M.Si', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 5, '0275d4520b05dc361f6699702dbda1ba.jpg', 'Jakarta', '1970-03-11', '60', '0000-00-00', 'PNS', ''),
('197105152003122003', '680003998', 'Zannatunnaim, ST', 'Islam', 'Perempuan', 'PNS', 'jl', '231231', 2, '4d69206db8cfb2bff4c38a7293e742d7.jpg', 'Jakarta', '1971-05-15', '60', '0000-00-00', 'Pensiun', ''),
('197209041998011001', '680003808', 'Abdul Latif, M.Eng ', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 3, 'e9252526f8d8f740914998db91cc295b.jpg', 'Jakarta', '1972-09-04', '58', '0000-00-00', 'PNS', ''),
('197508162002122002', '680003993', 'Fina Pitono, ST., MBA.', 'Islam', 'Perempuan', 'PNS', 'jl', '231231', 3, 'dc1dc642127ac01a3aabcfc3913e0fa0.jpg', 'Jakarta', '1975-08-16', '58', '0000-00-00', 'PNS', ''),
('197509192006041024', '680004111', 'Muktiyono, ST, MT', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 5, '322565c5e6d587c7f28e9ccf35af4eb1.jpg', 'Jakarta', '1975-09-19', '58', '0000-00-00', 'PNS', ''),
('197608212009122001', '680004885', 'Frida Nurmasari, SE', 'Islam', 'Perempuan', 'PNS', 'jl', '231231', 6, 'e6122c5990524bf4928c60bfc573dc03.jpg', 'Jakarta', '1976-10-21', '58', '0000-00-00', 'PNS', ''),
('197805252009122001', '680004972', 'Astri Arnawengrum,  MM', 'Islam', 'Perempuan', 'PNS', 'jl', '231231', 2, 'ba3ed1d629cdfc1e822e866ba1bba711.jpg', 'Jakarta', '1978-05-25', '58', '0000-11-30', 'PNS', ''),
('197902112009012003', '680004564', 'Andi Herawati, S.Kom.', 'Islam', 'Perempuan', 'PNS', 'jl', '231231', 2, '2597429751ae0b71bb6a74ec5fad45b6.jpg', 'Jakarta', '1979-11-11', '58', '0000-00-00', 'PNS', ''),
('198110052009121001', '680004890', 'Asep Surahman, A.Md', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 6, '53bafc41a5666c8446d9041c304e2ca6.jpg', 'Jakarta', '1981-10-05', '58', '0000-00-00', 'PNS', ''),
('198301192009121002', '680004835', 'Yanuar Maulid Prihatna, SH., M', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 4, '4d5cfc0b1ef5a840670822eafe3b28d8.jpg', 'Jakarta', '1983-01-19', '58', '0000-00-00', 'PNS', ''),
('198311032008012010', '680004409', 'Nora Sulastri, ST', 'Islam', 'Perempuan', 'PNS', 'jl', '231231', 5, 'f46cc4e6b32d2e90f5ed880cd26ae103.jpg', 'Jakarta', '0000-00-00', '58', '0000-00-00', 'PNS', ''),
('198312052015032001', '680005478', 'Kurniati Cahyo Wulandari ', 'Islam', 'Perempuan', 'PNS', 'jl', '231231', 4, '50ae2c24c918ca6bac5c3d92b18e0f5d.jpg', 'Jakarta', '1983-12-05', '58', '0000-00-00', 'PNS', ''),
('198402162009012002', '680000744', 'Dessie Kumala Sari, SE.', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 6, '138c0eb767441619d8429764441d3f24.jpg', 'Jakarta', '2019-02-16', '58', '0000-00-00', 'PNS', ''),
('198405242014022001', '680005285', 'Eka Wulansari, SE', 'Islam', 'Perempuan', 'PNS', 'jl', '231231', 3, '813f06cf73dcc115761e711105ceecf9.jpg', 'Jakarta', '1984-05-24', '58', '0000-00-00', 'PNS', ''),
('198409052009011002', '680004574', 'Arya Adhitya, SH.', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 4, '717c87b17d8bbecac633079305de7427.jpg', 'Jakarta', '1984-09-05', '58', '0000-00-00', 'PNS', ''),
('198411142009121002', '680004950', 'Nurfadlih Syahlani, ST, M.Sc ', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 5, 'f54e37b94951be15f6fdcaaa905fb58c.jpg', 'Jakarta', '1984-11-14', '58', '0000-00-00', 'PNS', ''),
('198503042008011004', '680004418', 'Ricky Ilhamsyah, S. Kom.', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 5, '47b7b9dda0610d53d537b5672e3fcb7d.jpg', 'Jakarta', '1983-03-04', '58', '0000-00-00', 'PNS', ''),
('198601072009122002', '680004893', 'Dian Prasetyawati, SE', 'Islam', 'Perempuan', 'PNS', 'jl', '231231', 2, '3899a7d60279b5d75261250854ecbd42.jpg', 'Jakarta', '1986-01-07', '60', '0000-00-00', 'PNS', ''),
('198612142010122000', '680005024', 'Deviyani Prawitasari, S.T', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 5, 'b6ad2c5afa057377c5b2ab15233beccf.jpg', 'Jakarta', '0000-00-00', '58', '0000-00-00', 'PNS', ''),
('198702262009012001', '680004583', 'Damayanti Larasati, A.Md.., S.', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 6, '96deb2fd67a679204145390ae0919b02.jpg', 'Jakarta', '0000-00-00', '58', '0000-00-00', 'PNS', ''),
('198707292015031000', '680005529', 'Danu Sucipto', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 4, '7664b50a6ee04af26bef110b0bab320d.jpg', 'Jakarta', '1987-07-29', '58', '0000-00-00', 'PNS', ''),
('198802202010122004', '680005082', 'Nurul Fatimah, A.Md', 'Islam', 'Perempuan', 'PNS', 'jl', '231231', 6, 'ce1bc9057a644721f08f16884005c0f3.jpg', 'Jakarta', '1988-02-20', '58', '0000-00-00', 'PNS', ''),
('198802262009121001', '680004915', 'Muhammad Ridwan Nurindah, S.Mn', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 3, '97f9b0bffdc5ad3b3ae07f4ed7ba7542.jpg', 'Jakarta', '1998-02-26', '58', '0000-00-00', 'PNS', ''),
('198803242014022003', '680005380', 'Marina Dwi Ratri, SIA', 'Islam', 'Perempuan', 'PNS', 'jl', '231231', 3, '1d9434795ce816dcd4013e8ae1c36bd1.jpg', 'Jakarta', '1988-03-24', '58', '0000-00-00', 'PNS', ''),
('198905252010121006', '680005080', 'Agung Widyo Utomo', 'Islam', 'Laki-Laki', 'PNS', 'Dewa Ujung RT 16/007 No. 24 , Ciracas, Jakarta Tim', '123124123124', 2, 'a905ef1ede5b73ceb55bdeb3eb38a620.jpg', 'Jakarta', '1989-05-25', '60', '2011-01-26', 'PNS', 'IT Support'),
('198907232014022004', '680005316', 'Astri Yulita Auditiya, SE', 'Islam', 'Perempuan', 'PNS', 'jl', '231231', 5, '0696c1fe6a46b8d541084bd9e5291670.jpg', 'Jakarta', '1989-07-23', '58', '0000-00-00', 'PNS', ''),
('198907262019021003', '680000744', 'Tofa Waskito Aji, S.Ikom', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 3, 'default.jpg', 'Jakarta', '0000-00-00', '58', '0000-00-00', 'PNS', ''),
('199010082019021003', '680000744', 'Abdul Roji, S.E', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 6, 'default.jpg', 'Jakarta', '0000-00-00', '58', '0000-00-00', 'CPNS', ''),
('199503182019021004', '680005697', 'Aang Supriatna, S.E', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 5, 'c1849c5fb0440b2c19eabe9f009cc046.jpg', 'Jakarta', '0000-00-00', '58', '0000-00-00', 'CPNS', ''),
('199603252019022003', '680000744', 'Salwa Madania, SE', 'Islam', 'Perempuan', 'PNS', 'jl', '231231', 5, 'default.jpg', 'Jakarta', '0000-00-00', '58', '0000-00-00', 'PNS', ''),
('199706032018121001', '680000744', 'Aji Anggara Mukti, A.Md.Ak', 'Islam', 'Laki-Laki', 'PNS', 'jl', '231231', 6, 'default.jpg', 'Jakarta', '0000-00-00', '58', '0000-00-00', 'CPNS', ''),
('2', '2', 'Wafi Fauzan ', 'Islam', 'Laki-Laki', 'BLU', 'jl', '231231', 3, 'ca71eb1c9222b1d89d0bb8d3622a7b65.jpg', 'Jakarta', '1991-09-15', '58', '0000-00-00', 'NON PNS', 'asd'),
('20', '20', 'Whina Gresty Yunika ', 'Islam', 'Perempuan', 'BLU', 'jl', '231231', 2, 'default.jpg', 'Jakarta', '1983-03-13', '58', '0000-00-00', 'NON PNS', ''),
('3', '3', 'Mokhammad Yorga ', 'Islam', 'Laki-Laki', 'BLU', 'jl', '231231', 3, 'default.jpg', 'Jakarta', '1994-06-03', '58', '0000-00-00', 'NON PNS', ''),
('4', '4', 'Ganjar Satria Putra ', 'Islam', 'Laki-Laki', 'BLU', 'jl', '231231', 3, 'default.jpg', 'Jakarta', '1987-01-21', '58', '0000-11-30', 'NON PNS', ''),
('5', '5', 'Efrida Khairanny', 'Islam', 'Laki-Laki', 'BLU', 'jl', '231231', 4, 'default.jpg', 'Jakarta', '1995-07-15', '58', '0000-00-00', 'NON PNS', ''),
('6', '6', 'Fajar AlHadi', 'Islam', 'Laki-Laki', 'BLU', 'jl', '231231', 4, 'default.jpg', 'Jakarta', '1994-03-22', '58', '0000-00-00', 'NON PNS', ''),
('7', '7', 'Lukito Eminiyati', 'Islam', 'Perempuan', 'BLU', 'jl', '231231', 5, 'ab5641f48b4caf2c253216c1b0164be1.jpg', 'Jakarta', '1983-01-11', '58', '0000-00-00', 'NON PNS', ''),
('8', '8', 'Sarry Asrini', 'Islam', 'Perempuan', 'BLU', 'jl', '231231', 5, '313ce6ea4ce12393b5f3618e037cdffd.jpg', 'Jakarta', '1988-02-15', '58', '0000-00-00', 'NON PNS', ''),
('9', '9', 'Harini Rante', 'Islam', 'Perempuan', 'BLU', 'jl', '231231', 6, '976465ec779e16e3c4470825caa0db3e.jpg', 'Jakarta', '1970-09-02', '58', '0000-00-00', 'NON PNS', '');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tingkat` varchar(5) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `sekolah` varchar(70) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `konsentrasi` varchar(50) NOT NULL,
  `gelar` varchar(8) NOT NULL,
  `file_pendidikan` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `nip`, `tingkat`, `tahun_lulus`, `sekolah`, `jurusan`, `konsentrasi`, `gelar`, `file_pendidikan`, `status`) VALUES
(1, '196608261992032001', '', 0000, '', '', '', '', '', 1),
(2, '197902112009012003', 'S1 ', 0000, '', ' Teknik Informatika', '', '', '', 1),
(3, '197105152003122003', 'S1 ', 0000, '', ' Teknik Elektro', '', '', '', 1),
(4, '197805252009122001', 'S2 ', 0000, '', ' Ekonomi', '', '', '', 1),
(5, '196004061989031002', 'S1 ', 0000, '', ' Ekonomi', '', '', '', 1),
(6, '198601072009122002', 'S1 ', 0000, '', ' Ekonomi', '', '', '', 1),
(7, '198905252010121006', 'S2 ', 0000, '', ' Ilmu Komputer', '', '', '', 1),
(8, '197209041998011001', '', 0000, '', '', '', '', '', 1),
(9, '197508162002122002', 'S2 ', 0000, '', ' Teknik Lingkungan', '', '', '', 1),
(10, '195805301982032001', 'S2 ', 0000, '', ' MIPA Matematika', '', '', '', 1),
(11, '198907262019021003', '', 0000, '', '', '', '', '', 1),
(12, '198802262009121001', 'S2 ', 0000, '', ' Manajemen Bisnis', '', '', '', 1),
(13, '196205171988031001', 'S2 ', 0000, '', ' Teknik Elektro', '', '', '', 1),
(14, '198803242014022003', 'S1 ', 0000, '', ' Administrasi', '', '', '', 1),
(15, '198405242014022001', 'S1 ', 0000, '', ' Ekonomi', '', '', '', 1),
(16, '196201311989031003', 'S2 ', 0000, '', ' Ekonomi ', '', '', '', 1),
(17, '198301192009121002', 'S2 ', 0000, '', ' Hukum', '', '', '', 1),
(18, '198707292015031000', 'S1 ', 0000, '', ' Hukum', '', '', '', 1),
(19, '198312052015032001', 'S1 ', 0000, '', ' Hukum', '', '', '', 1),
(20, '198409052009011002', 'S1 ', 0000, '', ' Hukum', '', '', '', 1),
(21, '196611251986021001', 'S1 ', 0000, '', ' Administrasi', '', '', '', 1),
(22, '197003111996031001', 'S2 ', 0000, '', ' Teknologi Pertanian', '', '', '', 1),
(23, '196303281991031004', 'S2 ', 0000, '', ' Ekonomi', '', '', '', 1),
(24, '198311032008012010', 'S2 ', 0000, '', ' Teknik Industri', '', '', '', 1),
(25, '199603252019022003', '', 0000, '', '', '', '', '', 1),
(26, '198411142009121002', 'S2 ', 0000, '', ' Manajemen Bisnis', '', '', '', 1),
(27, '195809241987031001', 'S2 ', 0000, '', ' Teknik Elektro', '', '', '', 1),
(28, '198907232014022004', 'S1 ', 0000, '', ' Ekonomi', '', '', '', 1),
(29, '199503182019021004', '', 0000, '', '', '', '', '', 1),
(30, '196808071998031000', '', 0000, '', '', '', '', '', 1),
(31, '195809301986031005', '', 0000, '', '', '', '', '', 1),
(32, '198612142010122000', '', 0000, '', '', '', '', '', 1),
(33, '197509192006041024', 'S2 ', 0000, '', ' Teknik Industri', '', '', '', 1),
(34, '198503042008011004', 'S1 ', 0000, '', ' Teknik Informatika', '', '', '', 1),
(35, '196107071988032001', 'S2 ', 0000, '', ' Administrasi', '', '', '', 1),
(36, '198402162009012002', 'S1 ', 0000, '', ' Ekonomi', '', '', '', 1),
(37, '199010082019021003', '', 0000, '', '', '', '', '', 1),
(38, '196402081985101001', 'S2 ', 0000, '', ' Ekonomi', '', '', '', 1),
(39, '197608212009122001', 'S2 ', 0000, '', ' Ekonomi', '', '', '', 1),
(40, '196403111985101001', 'S1 ', 0000, '', ' Administrasi', '', '', '', 1),
(41, '198702262009012001', '', 0000, '', '', '', '', '', 1),
(42, '199706032018121001', '', 0000, '', '', '', '', '', 1),
(43, '196104071982031006', 'S2 ', 0000, '', ' Ekonomi', '', '', '', 1),
(44, '198110052009121001', 'D3 ', 0000, '', ' Teknik Informatika', '', '', '', 1),
(45, '198802202010122004', 'S1 ', 0000, '', ' Ekonomi', '', '', '', 1),
(46, '1', 'S1 ', 0000, '', ' Teknik Kimia', '', '', '', 1),
(47, '2', 'S1 ', 0000, '', ' Ilmu Komunikasi', '', '', '', 1),
(48, '3', 'S1 ', 0000, '', ' Ekonomi', '', '', '', 1),
(49, '4', 'S2 ', 0000, '', ' Geofisika', '', '', '', 1),
(50, '5', 'S1 ', 0000, '', '  Hukum', '', '', '', 1),
(51, '6', 'S1 ', 0000, '', ' Hukum', '', '', '', 1),
(52, '7', 'S1 ', 0000, '', ' Komunikasi', '', '', '', 1),
(53, '8', 'S1 ', 0000, '', ' Perikanan', '', '', '', 1),
(54, '9', 'S1 ', 0000, '', ' Akuntansi', '', '', '', 1),
(55, '10', 'D3 ', 0000, '', ' Akuntansi', '', '', '', 1),
(56, '11', 'S2 ', 0000, '', ' Akuntansi', '', '', '', 1),
(57, '12', 'S2 ', 0000, '', ' Akuntansi', '', '', '', 1),
(58, '13', 'S1 ', 0000, '', ' Akuntansi', '', '', '', 1),
(59, '14', 'S1 ', 0000, '', ' Adminstrasi Negara', '', '', '', 1),
(60, '15', 'S1 ', 0000, '', ' Administrasi Niaga', '', '', '', 1),
(61, '16', 'SMA', 0000, '', '', '', '', '', 1),
(62, '17', 'D3 ', 0000, '', ' Sekretaris', '', '', '', 1),
(63, '18', 'S1 ', 0000, '', ' Akuntansi', '', '', '', 1),
(64, '19', 'SMA', 0000, '', '', '', '', '', 1),
(65, '20', '  ', 0000, '', '', '', '', '', 1),
(66, '198905252010121006', 'D3', 2010, 'Institut Pertanian Bogor', 'Manajemen Informatika', 'Sistem informasi', 'A.md', '7cd9407cf2f7e84a26cc0e1ba1eec59e.pdf', 0),
(67, '198905252010121006', 'S1', 2013, 'Institut Pertanian Bogor', 'Ilmu Komputer', 'Programming', 'S.Komp', '276b665452adb7c7760ab05050d5838d.pdf', 0),
(68, '1966112519860210012', 'D3', 2019, 'Institut Pertanian Bogor', 'Manajemen Informatika', 'Programming', 'Amd', 'e5abe8e64ee8d9e36d068c4f2bfdd9ed.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman_kerja`
--

CREATE TABLE `pengalaman_kerja` (
  `id_kerja` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `jabatan_kerja` varchar(40) NOT NULL,
  `mulai_kerja` date NOT NULL,
  `selesai_kerja` date NOT NULL,
  `perusahaan_kerja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penghargaan`
--

CREATE TABLE `penghargaan` (
  `id_penghargaan` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_penghargaan` varchar(30) NOT NULL,
  `tanggal_penghargaan` date NOT NULL,
  `no_surat` varchar(40) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file_penghargaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghargaan`
--

INSERT INTO `penghargaan` (`id_penghargaan`, `nip`, `nama_penghargaan`, `tanggal_penghargaan`, `no_surat`, `instansi`, `keterangan`, `file_penghargaan`) VALUES
(2, '198905252010121006', 'Pengh', '2019-06-26', '12rf131', 'bppt', '', '17503dc74c2d9af2df7a2e3490f70151.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pangkat`
--

CREATE TABLE `riwayat_pangkat` (
  `id_riwayat` int(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_golongan` varchar(20) NOT NULL,
  `jenis_sk` varchar(20) NOT NULL,
  `no_sk` varchar(20) DEFAULT NULL,
  `tanggal_sk` date NOT NULL,
  `tmt_golongan` date NOT NULL,
  `file_sk` text,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_pangkat`
--

INSERT INTO `riwayat_pangkat` (`id_riwayat`, `nip`, `id_golongan`, `jenis_sk`, `no_sk`, `tanggal_sk`, `tmt_golongan`, `file_sk`, `status`) VALUES
(1, '195805301982032001', 'IV/b', 'PNS', '-', '2019-04-17', '2019-02-12', '0947969c71e04b9b81c560c67347bf7b.pdf', 1),
(6, '196608261992032001', 'IV/b', 'PNS', '94 TAHUN 2018', '2019-04-17', '2019-04-17', '', 0),
(7, '197902112009012003', 'III/c', 'PNS', '', '2019-04-18', '2019-04-18', '', 1),
(8, '197105152003122003', 'III/d', 'PNS', '', '2019-04-19', '2019-04-19', '', 1),
(9, '197805252009122001', 'III/c', 'PNS', '', '2019-04-20', '2019-04-20', '', 1),
(10, '196004061989031002', 'III/d', 'PNS', '', '2019-04-21', '2019-04-21', '', 1),
(11, '198601072009122002', 'III/a', 'PNS', '', '2019-04-22', '2019-04-22', '', 1),
(12, '198905252010121006', 'III/a', 'PNS', '94 TAHUN 2018', '2019-04-23', '2019-04-23', '', 1),
(13, '197209041998011001', 'IV/a', 'PNS', '', '2019-04-24', '2019-04-24', '', 1),
(14, '197508162002122002', 'III/d', 'PNS', '', '2019-04-25', '2019-04-25', '', 1),
(15, '195805301982032001', 'IV/a', 'PNS', '', '2019-04-26', '2019-04-26', '', 1),
(16, '198907262019021003', 'III/a', 'PNS', '', '2019-04-27', '2019-04-27', '', 1),
(17, '198802262009121001', 'III/c', 'PNS', '', '2019-04-28', '2019-04-28', '', 1),
(18, '196205171988031001', 'IV/a', 'PNS', '', '2019-04-29', '2019-04-29', '', 1),
(19, '198803242014022003', 'III/a', 'PNS', '', '2019-04-30', '2019-04-30', '', 1),
(20, '198405242014022001', 'III/a', 'PNS', '', '2019-05-01', '2019-05-01', '', 1),
(21, '196201311989031003', 'IV/b', 'PNS', '', '2019-05-02', '2019-05-02', '', 1),
(22, '198301192009121002', 'III/c', 'PNS', '', '2019-05-03', '2019-05-03', '', 1),
(23, '198707292015031000', 'III/a', 'PNS', '', '2019-05-04', '2019-05-04', '', 1),
(24, '198312052015032001', 'III/a', 'PNS', '', '2019-05-05', '2019-05-05', '', 1),
(25, '198409052009011002', 'III/c', 'PNS', '', '2019-05-06', '2019-05-06', '', 1),
(26, '196611251986021001', 'III/d', 'PNS', '', '2019-05-07', '2019-05-07', '', 1),
(27, '197003111996031001', 'IV/b', 'PNS', '', '2019-05-08', '2019-05-08', '', 1),
(28, '196303281991031004', 'IV/a', 'PNS', '', '2019-05-09', '2019-05-09', '', 1),
(29, '198311032008012010', 'III/c', 'PNS', '', '2019-05-10', '2019-05-10', '', 1),
(30, '198411142009121002', 'III/b', 'PNS', '', '2019-05-11', '2019-05-11', '', 1),
(31, '198907232014022004', 'III/a', 'PNS', '', '2019-05-13', '2019-05-13', '', 1),
(32, '197509192006041024', 'III/d', 'PNS', '', '2019-05-14', '2019-05-14', '', 1),
(33, '198503042008011004', 'III/a', 'PNS', '', '2019-05-15', '2019-05-15', '', 1),
(34, '196107071988032001', 'IV/b', 'PNS', '', '2019-05-16', '2019-05-16', '', 1),
(35, '198402162009012002', 'III/c', 'PNS', '', '2019-05-17', '2019-05-17', '', 1),
(36, '196402081985101001', 'IV/a', 'PNS', '', '2019-05-18', '2019-05-18', '', 1),
(37, '197608212009122001', 'III/b', 'PNS', '', '2019-05-19', '2019-05-19', '', 1),
(38, '196403111985101001', 'IV/a', 'PNS', '', '2019-05-20', '2019-05-20', '', 1),
(39, '196104071982031006', 'IV/a', 'PNS', '', '2019-05-21', '2019-05-21', '', 1),
(40, '198110052009121001', 'II/c', 'PNS', '', '2019-05-22', '2019-05-22', '', 1),
(41, '198802202010122004', 'III/a', 'PNS', '', '2019-05-23', '2019-05-23', '', 1),
(42, '1966112519860210012', 'II/a', 'PNS', '94 TAHUN 2018', '2019-07-30', '2019-07-30', '3dfbc3a0a1da56ac1dae4ae1e850b9f0.jpg', 1),
(43, '19661125198602100122', 'III/b', 'PNS', '94 TAHUN 2018', '2019-07-25', '2019-04-24', '909e14fc4729cf5ec51edafc9195c1b5.pdf', 1),
(44, '196608261992032001', 'IV/a', 'PNS', '94 TAHUN 2018', '2019-08-22', '2019-05-01', '45e817f6eeda37cf51b25e957b0bf3b5.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `id_seminar` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_seminar` varchar(50) NOT NULL,
  `peran` enum('Peserta','Narasumber','Moderator') NOT NULL,
  `tanggal_seminar` date NOT NULL,
  `tempat_seminar` varchar(30) NOT NULL,
  `file_seminar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`id_seminar`, `nip`, `nama_seminar`, `peran`, `tanggal_seminar`, `tempat_seminar`, `file_seminar`) VALUES
(2, '198905252010121006', 'Bagaimana menjadi Software Engineer', 'Moderator', '2019-06-12', 'Jakarta', '779b2cce880386e634683d806ce9484b.pdf'),
(3, '1966112519860210012', 'Bagaimana menjadi Software Engineer', 'Narasumber', '2019-03-13', 'Jakarta', 'a865ba6556f447425322059190ffc40d.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `sk_lainnya`
--

CREATE TABLE `sk_lainnya` (
  `id_sk` int(11) NOT NULL,
  `no_sk` varchar(30) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `jenis_sk` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file_sk` text NOT NULL,
  `nip` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffsubbid`
--

CREATE TABLE `staffsubbid` (
  `id_staffsubbid` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `id_subbidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffsubbid`
--

INSERT INTO `staffsubbid` (`id_staffsubbid`, `nip`, `id_subbidang`) VALUES
(1, '197902112009012003', 5),
(2, '197105152003122003', 5),
(3, '197805252009122001', 5),
(4, '196004061989031002', 5),
(5, '198601072009122002', 5),
(7, '197508162002122002', 6),
(8, '195805301982032001', 6),
(9, '198907262019021003', 6),
(10, '198802262009121001', 7),
(11, '196205171988031001', 7),
(12, '198803242014022003', 7),
(13, '198405242014022001', 7),
(14, '198301192009121002', 8),
(15, '198707292015031000', 8),
(16, '198312052015032001', 8),
(17, '198409052009011002', 9),
(18, '196611251986021001', 9),
(19, '196303281991031004', 10),
(20, '198311032008012010', 10),
(21, '199603252019022003', 10),
(22, '198411142009121002', 11),
(23, '195809241987031001', 11),
(24, '198907232014022004', 11),
(25, '199503182019021004', 11),
(26, '196808071998031000', 12),
(27, '195809301986031005', 12),
(28, '198612142010122000', 12),
(29, '197509192006041024', 12),
(30, '198503042008011004', 12),
(31, '198402162009012002', 3),
(32, '199010082019021003', 3),
(33, '196402081985101001', 4),
(34, '197608212009122001', 4),
(35, '196403111985101001', 4),
(36, '198702262009012001', 2),
(37, '199706032018121001', 2),
(38, '196104071982031006', 2),
(39, '198110052009121001', 2),
(40, '198802202010122004', 2),
(41, '2', 6),
(42, '1', 6),
(43, '13', 4),
(44, '198905252010121006', 5),
(45, '1966112519860210012', 7),
(46, '19661125198602100122', 11);

-- --------------------------------------------------------

--
-- Table structure for table `struktural`
--

CREATE TABLE `struktural` (
  `id_struktural` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `id_eselon` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `status_struktural` varchar(15) NOT NULL,
  `no_sk` varchar(30) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `file_sk` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struktural`
--

INSERT INTO `struktural` (`id_struktural`, `nip`, `id_eselon`, `id_jabatan`, `status_struktural`, `no_sk`, `tanggal_sk`, `tmt_jabatan`, `file_sk`, `status`) VALUES
(15, '198905252010121006', 3, 14, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(16, '195805301982032001', 3, 17, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(17, '196104071982031006', 3, 18, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(18, '196402081985101001', 4, 19, 'Aktif', '98 TAHUN 2018', '2019-02-28', '0000-00-00', 'aaa81b18eae269718c8e2771609a2cef.PNG', 1),
(19, '198402162009012002', 4, 20, 'Aktif', '1231', '2019-04-23', '0000-00-00', '37fa6b190bb37b185b72fc41c1952714.pdf', 1),
(20, '198405242014022001', 3, 21, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(21, '198601072009122002', 3, 14, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(22, '198311032008012010', 3, 23, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(23, '2', 3, 17, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(24, '198907232014022004', 3, 24, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(26, '198802202010122004', 3, 18, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(27, '198803242014022003', 3, 21, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(28, '197805252009122001', 3, 14, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(29, '198411142009121002', 4, 11, 'Aktif', '-', '0000-11-30', '0000-00-00', '088701efccc8b2dbdbd093a6bbd57b2e.pdf', 1),
(30, '198802262009121001', 4, 26, 'Aktif', '-', '1900-12-02', '0000-00-00', '30d079bca9be62f8f266ccbbcef4bff0.pdf', 1),
(31, '198110052009121001', 3, 18, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(32, '198301192009121002', 4, 27, 'Aktif', '-', '2019-04-29', '0000-00-00', '486d717661ea68a3df289e0a9ebedd5d.pdf', 1),
(33, '198409052009011002', 4, 28, 'Aktif', '-', '2019-04-29', '0000-00-00', '88cfb61c2d5beb065594b8845e5d11d9.pdf', 1),
(34, '197902112009012003', 4, 29, 'Aktif', '-', '2019-04-30', '0000-00-00', 'e9cc8d46a5f615ac6b70789d4cd38030.pdf', 1),
(35, '198503042008011004', 3, 30, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(36, '197509192006041024', 3, 30, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(37, '197105152003122003', 3, 14, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(38, '197508162002122002', 4, 31, 'Aktif', '-', '2019-05-02', '0000-00-00', '282eaadf9bd5a9ec431d116c9d89dd0b.pdf', 1),
(39, '197003111996031001', 7, 32, 'Aktif', '-', '2019-04-30', '0000-00-00', 'f6b841178fb625f216bf55592adc2029.pdf', 1),
(40, '196303281991031004', 4, 33, 'Aktif', '-', '2019-03-11', '0000-00-00', '6fa6bc726f969751adfdd3ffe3876f5b.pdf', 1),
(41, '196201311989031003', 7, 34, 'Aktif', '-', '2019-04-09', '0000-00-00', 'fd0619cfae6bf96e94a31b2be2f47281.pdf', 1),
(42, '196004061989031002', 3, 14, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(43, '196205171988031001', 3, 21, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(45, '195809241987031001', 3, 24, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(46, '198312052015032001', 3, 36, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(47, '198707292015031000', 3, 36, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(48, '196611251986021001', 3, 37, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(49, '196403111985101001', 3, 38, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(50, '197608212009122001', 3, 38, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(51, '199603252019022003', 3, 23, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(52, '196608261992032001', 7, 2, 'Non Aktif', '-', '2019-02-25', '0000-00-00', '8c76a24b4161e20fc0c6a0ff47584e14.pdf', 1),
(53, '199706032018121001', 3, 18, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(54, '199503182019021004', 3, 24, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(55, '199010082019021003', 3, 39, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(56, '198702262009012001', 5, 40, 'Aktif', '-', '2019-02-25', '0000-00-00', 'a07bbca7b6564f1fba4841a672da5aa4.pdf', 1),
(57, '198907262019021003', 3, 17, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(58, '198612142010122000', 3, 30, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(59, '197209041998011001', 7, 41, 'Aktif', '-', '2019-04-30', '0000-00-00', '33796443ac3c761f58432331f4a99feb.pdf', 1),
(60, '196808071998031000', 5, 42, 'Aktif', '-', '2019-04-16', '0000-00-00', 'b84954a422090ac2234a85da195bbac5.pdf', 1),
(61, '195809301986031005', 3, 30, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(62, '1', 3, 17, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(63, '196107071988032001', 7, 35, 'Aktif', '94 TAHUN 2020', '2019-02-25', '0000-00-00', 'b46054e44d5d4b947510a2eeb8111c82.pdf', 1),
(64, '13', 3, 38, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(65, '1966112519860210012', 3, 14, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1),
(66, '19661125198602100122', 3, 30, '', '', '0000-00-00', '0000-00-00', 'default.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subbidang`
--

CREATE TABLE `subbidang` (
  `id_subbidang` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `nama_subbidang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subbidang`
--

INSERT INTO `subbidang` (`id_subbidang`, `id_bidang`, `nama_subbidang`) VALUES
(2, 6, 'Pembiayaan & Pelaporan'),
(3, 6, 'Penerimaan'),
(4, 6, 'Verifikasi'),
(5, 2, ' Tata Usaha'),
(6, 3, 'Perencanaan Pemasaran'),
(7, 3, 'Pemasyarakatan'),
(8, 4, 'Kontrak'),
(9, 4, 'Lisensi'),
(10, 5, 'Pelayanan Jasa'),
(11, 5, 'Pematangan Usaha'),
(12, 5, 'Monitoring & Evaluasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` enum('admin','pegawai','atasan','sektretaris') NOT NULL,
  `nip` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `nip`) VALUES
('agung', '123', 'admin', '198905252010121006'),
('agung.widyo', 'YzNHQTBQazJTL2thTUEramxGR1Fudz09', 'pegawai', '198905252010121006'),
('agung123', 'agung123', 'pegawai', '2'),
('agungadmin', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'admin', '198905252010121006'),
('agungagung', 'agung123', 'pegawai', '2'),
('mulyono', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '196104071982031006'),
('pegawai-01', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '196608261992032001'),
('pegawai-02', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '197902112009012003'),
('pegawai-03', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '197105152003122003'),
('pegawai-04', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '197805252009122001'),
('pegawai-05', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '196004061989031002'),
('pegawai-06', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198601072009122002'),
('pegawai-07', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198905252010121006'),
('pegawai-08', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '197209041998011001'),
('pegawai-09', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '197508162002122002'),
('pegawai-10', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '195805301982032001'),
('pegawai-11', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198907262019021003'),
('pegawai-12', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198802262009121001'),
('pegawai-13', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '196205171988031001'),
('pegawai-14', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198803242014022003'),
('pegawai-15', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198405242014022001'),
('pegawai-16', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '196201311989031003'),
('pegawai-17', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198301192009121002'),
('pegawai-18', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198707292015031000'),
('pegawai-19', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198312052015032001'),
('pegawai-20', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198409052009011002'),
('pegawai-21', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '196611251986021001'),
('pegawai-22', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '197003111996031001'),
('pegawai-23', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '196303281991031004'),
('pegawai-24', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198311032008012010'),
('pegawai-25', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '199603252019022003'),
('pegawai-26', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198411142009121002'),
('pegawai-27', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '195809241987031001'),
('pegawai-28', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198907232014022004'),
('pegawai-29', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '199503182019021004'),
('pegawai-30', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '196808071998031000'),
('pegawai-31', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '195809301986031005'),
('pegawai-32', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198612142010122000'),
('pegawai-33', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '197509192006041024'),
('pegawai-34', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198503042008011004'),
('pegawai-36', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198402162009012002'),
('pegawai-37', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '199010082019021003'),
('pegawai-38', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '196402081985101001'),
('pegawai-39', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '197608212009122001'),
('pegawai-40', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '196403111985101001'),
('pegawai-41', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198702262009012001'),
('pegawai-42', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '199706032018121001'),
('pegawai-43', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '196104071982031006'),
('pegawai-44', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198110052009121001'),
('pegawai-45', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '198802202010122004'),
('pegawai-46', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '1'),
('pegawai-47', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '2'),
('pegawai-48', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '3'),
('pegawai-49', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '4'),
('pegawai-50', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '5'),
('pegawai-51', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '6'),
('pegawai-52', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '7'),
('pegawai-53', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '8'),
('pegawai-54', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '9'),
('pegawai-55', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '10'),
('pegawai-56', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '11'),
('pegawai-57', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '12'),
('pegawai-58', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '13'),
('pegawai-59', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '14'),
('pegawai-60', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '15'),
('pegawai-61', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '16'),
('pegawai-62', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '17'),
('pegawai-63', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '18'),
('pegawai-64', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '19'),
('pegawai-65', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '20'),
('rahman', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '19661125198602100122'),
('rahman123123', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'admin', '1966112519860210012'),
('rahmanqwe', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '1966112519860210012'),
('setyosuko', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '196402081985101001'),
('yaniemeilani', 'SXIwd1pIOWRpcVAya012VGNwQVN3Zz09', 'pegawai', '195805301982032001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`id_bahasa`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `diklat`
--
ALTER TABLE `diklat`
  ADD PRIMARY KEY (`id_diklat`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `eselon`
--
ALTER TABLE `eselon`
  ADD PRIMARY KEY (`id_eselon`);

--
-- Indexes for table `fungsional`
--
ALTER TABLE `fungsional`
  ADD PRIMARY KEY (`id_fungsional`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan_struktural`
--
ALTER TABLE `jabatan_struktural`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kapasitas_server`
--
ALTER TABLE `kapasitas_server`
  ADD PRIMARY KEY (`id_kapasitas`);

--
-- Indexes for table `kartu`
--
ALTER TABLE `kartu`
  ADD PRIMARY KEY (`id_kartu`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_jabatan` (`id_bidang`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  ADD PRIMARY KEY (`id_kerja`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `penghargaan`
--
ALTER TABLE `penghargaan`
  ADD PRIMARY KEY (`id_penghargaan`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `riwayat_pangkat`
--
ALTER TABLE `riwayat_pangkat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_golongan` (`id_golongan`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`id_seminar`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `sk_lainnya`
--
ALTER TABLE `sk_lainnya`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `staffsubbid`
--
ALTER TABLE `staffsubbid`
  ADD PRIMARY KEY (`id_staffsubbid`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_subbidang` (`id_subbidang`);

--
-- Indexes for table `struktural`
--
ALTER TABLE `struktural`
  ADD PRIMARY KEY (`id_struktural`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_eselon` (`id_eselon`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `subbidang`
--
ALTER TABLE `subbidang`
  ADD PRIMARY KEY (`id_subbidang`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `id_bahasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `diklat`
--
ALTER TABLE `diklat`
  MODIFY `id_diklat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `eselon`
--
ALTER TABLE `eselon`
  MODIFY `id_eselon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `fungsional`
--
ALTER TABLE `fungsional`
  MODIFY `id_fungsional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `jabatan_struktural`
--
ALTER TABLE `jabatan_struktural`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `kapasitas_server`
--
ALTER TABLE `kapasitas_server`
  MODIFY `id_kapasitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kartu`
--
ALTER TABLE `kartu`
  MODIFY `id_kartu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  MODIFY `id_kerja` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penghargaan`
--
ALTER TABLE `penghargaan`
  MODIFY `id_penghargaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `riwayat_pangkat`
--
ALTER TABLE `riwayat_pangkat`
  MODIFY `id_riwayat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `id_seminar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sk_lainnya`
--
ALTER TABLE `sk_lainnya`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staffsubbid`
--
ALTER TABLE `staffsubbid`
  MODIFY `id_staffsubbid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `struktural`
--
ALTER TABLE `struktural`
  MODIFY `id_struktural` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `subbidang`
--
ALTER TABLE `subbidang`
  MODIFY `id_subbidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahasa`
--
ALTER TABLE `bahasa`
  ADD CONSTRAINT `bahasa_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diklat`
--
ALTER TABLE `diklat`
  ADD CONSTRAINT `diklat_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fungsional`
--
ALTER TABLE `fungsional`
  ADD CONSTRAINT `fungsional_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fungsional_ibfk_4` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kartu`
--
ALTER TABLE `kartu`
  ADD CONSTRAINT `kartu_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `keluarga_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  ADD CONSTRAINT `pengalaman_kerja_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penghargaan`
--
ALTER TABLE `penghargaan`
  ADD CONSTRAINT `penghargaan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pangkat`
--
ALTER TABLE `riwayat_pangkat`
  ADD CONSTRAINT `riwayat_pangkat_ibfk_1` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_pangkat_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seminar`
--
ALTER TABLE `seminar`
  ADD CONSTRAINT `seminar_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sk_lainnya`
--
ALTER TABLE `sk_lainnya`
  ADD CONSTRAINT `sk_lainnya_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staffsubbid`
--
ALTER TABLE `staffsubbid`
  ADD CONSTRAINT `staffsubbid_ibfk_1` FOREIGN KEY (`id_subbidang`) REFERENCES `subbidang` (`id_subbidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staffsubbid_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `struktural`
--
ALTER TABLE `struktural`
  ADD CONSTRAINT `struktural_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `struktural_ibfk_2` FOREIGN KEY (`id_eselon`) REFERENCES `eselon` (`id_eselon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `struktural_ibfk_3` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan_struktural` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subbidang`
--
ALTER TABLE `subbidang`
  ADD CONSTRAINT `subbidang_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
