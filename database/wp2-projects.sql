-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2024 at 09:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp2-projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `no_rek` int(11) NOT NULL,
  `nama_rek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `no_rek`, `nama_rek`) VALUES
(1, 2147483647, 'Mandiri'),
(2, 2147483647, 'BCA'),
(3, 27354876, 'BRI');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tgl_post` date NOT NULL,
  `updateby` varchar(50) NOT NULL,
  `terbit` int(11) NOT NULL,
  `foto_berita` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `deskripsi`, `id_kategori`, `tgl_post`, `updateby`, `terbit`, `foto_berita`) VALUES
(8, 'nmn', 'oiuopi', 1, '2020-08-27', '6', 1, 'car-4.jpg'),
(12, '5 Mobil Paling Murah yang Dijual di Indonesia Saat Ini', '<p>Ketika saat ini Anda menggunakan kendaraan roda dua untuk keseharian, lalu berfikir untuk beralih menggunakan kendaraan roda empat alias mobil tapi terbentur dengan budget yang tidak banyak. Maka tentunya pilihan mobil dengan harga terjangkau adalah solusinya.</p>\r\n\r\n<p>Di Indonesia, beberapa pabrikan telah menjual mobil dengan harga yang relatif terjangkau dan memiliki beberapa varian yang dapat Anda pertimbangkan. Jika tidak membutuhkan kapasitas 7 penumpang, maka Anda bisa memilih model&nbsp;city car dengan harga murah yang tentunya menarik.</p>\r\n\r\n<p>Menurut data yang berhasil dihimpun OtoDriver dari beberapa situs resmi produsen penjual mobil, berikut ini adalah 5 mobil penumpang paling murah yang dijual di tanah air per Agustus 2019.</p>\r\n\r\n<p><img alt=\"\" src=\"https://otodriver.com/image/load/800/0/gallery/daihatsu-ayla-1-000-cc1554.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1. Daihatsu New Ayla 1.0 D M/T</strong></p>\r\n\r\n<p>Daihatsu Ayla 1.000 cc tipe D atau tipe terendah bertransmisi manual merupakan mobil penumpang paling murah yang dijual pabrikan saat ini, dalam situs resmi PT Astra Daihatsu Motor (ADM) mobil yang masuk ke dalam segmen Low Cost Green Car (LCGC) ini dibanderol hanya Rp 98,15 juta.</p>', 1, '2020-08-28', '7', 1, '091546500_1491554518-Ayla_depan.jpg'),
(13, 'Nasib Tragis Mobil Termurah di Dunia', '<p>Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quod quasi et nesciunt ut eos praesentium quos dolores velit sit esse obcaecati voluptate recusandae consequuntur quisquam beatae, at soluta dolorem aut ullam dicta consequatur optio incidunt itaque a. Dolorum hic vitae illum voluptas sint ad aspernatur cupiditate! Ut aut eveniet necessitatibus et incidunt quas magni ipsam totam excepturi eos saepe beatae vitae assumenda dolor repellendus hic, tempora. Odio, ea, adipisci repellat officiis accusantium omnis possimus earum asperiores molestiae neque nemo porro nisi inventore maiores repudiandae quidem laudantium dicta atque! Accusamus itaque consectetur nihil facilis impedit saepe earum quisquam necessitatibus ipsum asperiores.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Rem reiciendis, dolor accusamus ut eum nostrum mollitia commodi nihil aut cupiditate beatae, quibusdam est dolorem vel! Sequi eum vitae maxime assumenda modi ab facilis et in beatae placeat magni, voluptatibus nesciunt earum natus. Voluptatum temporibus magnam corporis vitae, dicta repellat soluta, veritatis consectetur consequatur dolore culpa ipsam perspiciatis fugit repellendus dolores porro, optio quos. Repellat eveniet labore, culpa, obcaecati ea cupiditate corporis aut alias quaerat sint, nostrum enim quisquam veritatis excepturi, incidunt animi voluptatem. A, repellat. Molestias magni dolor nihil laboriosam modi nobis cupiditate ipsa perferendis dignissimos quae minima ducimus ut corporis, tempora sequi aut ea, suscipit! Sapiente temporibus, et. Ipsa a perspiciatis modi repellendus esse libero dolore nesciunt autem ut, quo praesentium asperiores quia ad at porro est, omnis explicabo dolorem similique enim dolores nulla, totam, optio voluptates? Corrupti odit deleniti reiciendis laudantium in magnam id explicabo tenetur, quas facere.</p>\r\n\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque ea perferendis at obcaecati harum esse labore excepturi commodi ex enim ratione rerum blanditiis corrupti, rem distinctio quaerat culpa ullam soluta asperiores temporibus nobis explicabo laborum error molestias sed? Culpa nam neque laborum sed beatae tenetur. Quibusdam eaque enim velit rerum aspernatur ad. Nobis, quidem molestias unde, officia voluptas eum exercitationem, atque deserunt temporibus quis est culpa voluptatem dolores ullam quisquam sequi error animi itaque. Unde magnam labore quidem excepturi fuga minima odio modi obcaecati corrupti explicabo! Nisi consequuntur explicabo blanditiis dolor porro harum aut asperiores facere sed quidem natus nemo quasi, doloremque sit itaque numquam eum ipsum. Inventore magni et similique assumenda quibusdam voluptatibus ex non consequatur rem ducimus quis officia necessitatibus sequi enim velit at fugit totam nam nihil neque, eaque quos ut? Maxime ipsum, minima impedit ducimus earum voluptate at, dolore laborum officia blanditiis. Voluptatum sit quae blanditiis numquam, autem sequi quia, nihil nemo ducimus dignissimos ad ipsum commodi vitae ratione optio aut temporibus voluptate veniam, recusandae non aliquam dolores mollitia. Illum reprehenderit quis a molestias ipsum laborum mollitia explicabo officiis accusantium quae quam nihil magnam sit, ab beatae accusamus consequatur atque porro eos consectetur vero, eaque! Dolores!</p>', 2, '2020-08-28', '7', 1, '0445557Tata-Nano-Euro-NCAP780x390.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telepon` int(20) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `username`, `password`, `alamat`, `jenis_kelamin`, `telepon`, `no_ktp`, `id_role`, `created_at`, `updated_at`) VALUES
(12, 'Christy Dany Tallane', 'cdt2021', '$2y$10$zebMzEg9Y7lpHkLwaKlISesqMSJ6qZbOt6jVNH0yQG/SQrbggD2bu', 'cibitung', 'L', 2147483647, '8171010105960001', 2, '2024-01-01 04:06:15', '2024-01-01 04:06:15'),
(14, 'Christy Dany Tallane', 'ChrisDT', '$2y$10$E7MTxksyk2UXvQbTWDLSbeFAe3qDZvston/nX5ExOpS1qVHnkAwcC', 'Serang', 'L', 2147483647, '81710101050001', 2, '2024-06-20 13:48:46', '2024-06-20 13:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Teknologi'),
(2, 'Trending'),
(3, 'HDD'),
(4, 'Buming');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `kode_type` int(11) NOT NULL,
  `merk` varchar(40) NOT NULL,
  `no_plat` varchar(10) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `status` varchar(50) NOT NULL,
  `harga_mobil` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `ac` int(11) NOT NULL,
  `supir` int(11) NOT NULL,
  `mp3_player` int(11) NOT NULL,
  `central_lock` int(11) NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `kode_type`, `merk`, `no_plat`, `warna`, `tahun`, `status`, `harga_mobil`, `denda`, `ac`, `supir`, `mp3_player`, `central_lock`, `gambar`) VALUES
(7, 3, 'Avanza', 'BM 1234 MB', 'Putih', '2009', '0', 100000, 90000, 1, 1, 1, 1, '19a7a09697d626d7d4c664a1436f896b.jpg'),
(8, 2, 'Xenia', 'BM 6754 UP', 'Putih', '2009', '0', 200000, 50000, 1, 1, 1, 0, '996143517.jpg'),
(21, 3, 'Kamarun', 'BM 6765 RE', 'Hijau', '2010', '1', 120000, 80000, 1, 1, 1, 1, '1844967957.jpg'),
(22, 3, 'Honda Jaz Rs Matic 201', 'BM 6743 UP', 'Putih', '2018', '0', 300000, 100000, 0, 1, 1, 0, 'honda_jaz_rs_matic_201_1547430590_57b73d33_progressive.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_rental` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tgl_rental` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `harga` varchar(120) NOT NULL,
  `denda` varchar(20) NOT NULL,
  `total_denda` varchar(100) NOT NULL,
  `tgl_penggembalian` date NOT NULL,
  `status_penggembalian` varchar(50) NOT NULL,
  `status_rental` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_rental`, `id_customer`, `id_mobil`, `tgl_rental`, `tgl_kembali`, `harga`, `denda`, `total_denda`, `tgl_penggembalian`, `status_penggembalian`, `status_rental`, `bukti_pembayaran`, `status_pembayaran`) VALUES
(3, 7, 23, '2020-08-24', '2020-08-27', '500000', '200000', '200000', '2020-08-28', 'Kembali', 'Selesai', 'car-5.jpg', 1),
(7, 7, 21, '2020-08-16', '2020-08-17', '120000', '80000', '720000', '2020-08-26', 'Kembali', 'Selesai', 'car-4.jpg', 1),
(9, 7, 23, '2020-08-26', '2020-08-27', '500000', '200000', '0', '0000-00-00', 'Belum Kembali', 'Belum Selesai', '', 0),
(10, 6, 22, '2020-08-26', '2020-08-27', '300000', '100000', '0', '0000-00-00', 'Belum Kembali', 'Belum Selesai', '', 0),
(17, 12, 8, '2024-01-06', '2024-01-08', '', '50000', '0', '0000-00-00', 'Belum Kembali', 'Belum Selesai', '', 0),
(18, 12, 7, '2024-01-17', '2024-01-19', '', '90000', '0', '0000-00-00', 'Belum Kembali', 'Belum Selesai', 'cdt2021_1704398719.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `kode_type` varchar(20) NOT NULL,
  `nama_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `kode_type`, `nama_type`) VALUES
(2, 'SDN', 'Sedan'),
(3, 'SZK', 'Suzuki'),
(7, 'PCU', 'Packup'),
(8, 'TRV', 'Travell');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_role` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `email`, `alamat`, `no_telp`, `password`, `image`, `id_role`, `is_active`, `created_at`, `updated_at`) VALUES
(6, 'Christy Dany Tallane', 'Xynz0', 'itsxynz0@gmail.com', '', '081328438393', '$2y$10$apVbWJYLsK.LPStgM2ccueA118yChf5tU9947MBRGu15fskHbUl5K', 'user.png', 2, 1, '0000-00-00 00:00:00', '2024-05-13 16:04:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `kode_type` (`kode_type`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`kode_type`) REFERENCES `type` (`id_type`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
