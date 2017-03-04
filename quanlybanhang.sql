-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2017 at 05:55 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbh`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `idDonHang` int(11) UNSIGNED NOT NULL,
  `idSanPham` int(11) UNSIGNED NOT NULL,
  `SoLuong` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`idDonHang`, `idSanPham`, `SoLuong`) VALUES
(1, 2, 10),
(1, 3, 5),
(2, 4, 1),
(2, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) UNSIGNED NOT NULL,
  `ngaydathang` datetime NOT NULL,
  `ngaygiaohang` datetime NOT NULL,
  `idKhachHang` int(11) NOT NULL,
  `tinhtrangdonhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `ngaydathang`, `ngaygiaohang`, `idKhachHang`, `tinhtrangdonhang`) VALUES
(1, '2017-02-08 00:00:00', '2017-02-20 00:00:00', 1, 2),
(2, '2017-02-18 00:00:00', '2017-02-23 00:00:00', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `TenKH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `TenKH`, `DiaChi`, `SDT`, `Email`) VALUES
(1, 'Đức Thụ', 'Thủ Đức - TP HCM', '0969245459', 'ducthu@gmail.com'),
(2, 'Mỹ Thương', 'Linh Trung - Thủ Đức', '01678411346', 'thuonglun33@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenLoai` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaLoaiHang` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `TenLoai`, `MaLoaiHang`) VALUES
(1, 'Son', 1),
(2, 'Kem body', 1),
(3, 'Kem Face', 1),
(4, 'Giày', 2),
(5, 'Váy', 2),
(6, 'Xe máy', 3),
(7, 'Xe đạp', 3),
(8, 'Điện Thoại', 4);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2017_02_19_033451_sanpham', 2),
(3, '2017_02_19_033559_loaisanpham', 3),
(4, '2017_02_19_033700_edit_loaisanpham', 4),
(5, '2017_02_19_034957_loaihang', 5),
(6, '2017_02_19_035349_edit_loaisp', 6),
(7, '2017_02_19_052119_edit_tt_sp', 7),
(8, '2014_10_12_100000_create_password_resets_table', 8),
(9, '2017_02_21_135000_DucThu_TaoBang_DonHang', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) UNSIGNED NOT NULL,
  `TenSanPham` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayNhap` date NOT NULL,
  `MaLoaiSP` int(10) UNSIGNED NOT NULL,
  `GiaVon` double NOT NULL,
  `GiaBan` double NOT NULL,
  `id_TinhTrang` int(11) UNSIGNED NOT NULL,
  `SoLuongHienCo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `TenSanPham`, `NgayNhap`, `MaLoaiSP`, `GiaVon`, `GiaBan`, `id_TinhTrang`, `SoLuongHienCo`) VALUES
(1, 'Giày', '2017-02-15', 1, 1000, 2000, 1, 10),
(2, 'Váy', '0000-00-00', 1, 2000, 2500, 1, 0),
(3, 'Son', '0000-00-00', 2, 5000, 7000, 1, 0),
(4, 'Nón', '0000-00-00', 1, 1000, 2000, 2, 10),
(5, 'Xe máy', '0000-00-00', 1, 2000, 2500, 2, 0),
(7, 'xe gas', '0000-00-00', 2, 5000, 7000, 2, 0),
(8, 'Tivi', '0000-00-00', 1, 1000, 2000, 3, 10),
(9, 'Dienthoai zenfone', '0000-00-00', 1, 2000, 2500, 4, 0),
(10, 'I phone', '0000-00-00', 2, 5000, 7000, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `id` int(11) UNSIGNED NOT NULL,
  `TenTT` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='TinhTrang';

--
-- Dumping data for table `tinhtrang`
--

INSERT INTO `tinhtrang` (`id`, `TenTT`) VALUES
(1, 'Còn'),
(2, 'Hết'),
(3, 'Chờ nhập'),
(4, 'Chờ duyệt');

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrangdonhang`
--

CREATE TABLE `tinhtrangdonhang` (
  `id` int(11) NOT NULL,
  `TenTinhTrang` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tinhtrangdonhang`
--

INSERT INTO `tinhtrangdonhang` (`id`, `TenTinhTrang`) VALUES
(1, 'Đang chờ'),
(2, 'Đã hủy'),
(3, 'Đã giao');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capdo` int(11) NOT NULL,
  `gioitinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namsinh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `capdo`, `gioitinh`, `namsinh`) VALUES
(3, '123456', 'thuong@gmail.com', '$2y$10$iOKmwF7.TxsZ4xEKbfamcOJA8x0ge8ca0oV1y4WWRhQxDT.VMONCm', 1, 'on', 2002),
(4, '12345678', 'thuong@gmail.com', '$2y$10$ZWdVJijHeRsYMilUv1mhaeIASSgOVq17cMkbRzNfQow4qY7xhTjTa', 1, 'on', 2002),
(5, 'thuong', 'thuong@gmail.com', '$2y$10$OhYiGQ8AUsbpvm7K2eBRNuGWG57w1rcw5ViheDRfS6svTxCu0FFIq', 1, 'on', 1996),
(6, 'thu', 'thuong@gmail.com', '$2y$10$Z5WSqx9B/q1fXK1iXUVf4urgp6fIJ91X7b2vAQP5NL4Wpr/HhGm0K', 1, 'Nam', 1978),
(7, 'thuong', 'thuong@gmail.com', '$2y$10$ncD5Ff4Mrb.AfBWvAQrDTubtiFF3GdAB4e4foVtyeP7oEVnqrVhKq', 5, 'Chuabiet', 1979),
(8, 'hehe', 'thuong@gmail.com', '$2y$10$/9uOxg9tKe/zhQIXUtRx2e12bQ6plNAMoMfVLl0gdvfaJcu/izvVy', 1, 'Chưabiết', 1975),
(9, 'hothimythuong', 'thuong@gmail.com', '$2y$10$XenfqghoQJVcE6NAdP.jDu/ZUa3ZmK.yo6PLAsDQcorSauyIRGuJ2', 2, 'Nữ', 1993),
(10, '000', 'thuong@gmail.com', '$2y$10$UZoCvWUSf4/zjmT.I.TG6uZP2iBUoSwNkG.cncxF9.YWj99E86klO', 0, 'Nữ', 1977),
(11, 'test', 'thuong@gmail.com', '$2y$10$SBcgePbluEa2x.lsbPAyIunVzfh67X/hWFkfNEAAbYDYeOD5n4peW', 0, 'Nữ', 1979),
(12, 'thuong', 'thuong@gmail.com', '$2y$10$G3Q5ey01c2z/PVB7T91U/uBR8.LgeIl22fMXoxfNZH5kW02Vx7ZoC', 1, 'Nữ', 1979),
(13, 'thuong', 'thuong@gmail.com', '$2y$10$cQMr3wgMFSqoRMwVhxNZrOA0CxB.ifHnFojejvshmqY6pQ23XqyUK', 1, 'Nữ', 1979),
(14, 'lalalalalala', 'thuong@gmail.com', '$2y$10$0PWwutirv5ZbVSCBdlOn7uf8Gzs9PKDKbZFhYMAR1WB7X2HBqEK1u', 0, 'Nữ', 1979),
(15, '109', '1234@gmail.com', '$2y$10$41qKFrMzQE6W8.5kfZY7PesjVkPdOyauQATOzbqgCK.KqEjOLFNfO', 1, 'Chưabiết', 1979),
(16, '109999', '1234@gmail.com', '$2y$10$GIIapd.jum1.kZQUgvC0YOV8Zw39RS1D4/iVM4tpVoY41DL9RnhJu', 1, 'Chưabiết', 1979),
(17, '14520928888', '1234@gmail.com', '$2y$10$Yz7MOyE3a4DND3af7y5iQeHSlb.R7Y9VxRX76bGQzrjwaMQklKXam', 0, 'Nữ', 1979),
(18, '10999', 'thuong@gmail.com', '$2y$10$luL40vE/bcvfwa7Bsk7L9uexrkyr793Fkr1ShgwQ2KWpYIIscAnC.', 1, 'Nữ', 1979),
(19, 'mmmmm', 'thuong@gmail.com', '$2y$10$bNslFyrZRfxne3hEr85CS.aG/sG/vVQrWH/sLWYeqZRa3lK3VeNpW', 5, 'Nữ', 1979),
(20, '12222', '222@gmail.com', '$2y$10$F3vHLtKZQ8YxDxV/48wnFePBtiXhh6LLx4CsMtgI.MshEJdFxpKIO', 1, 'Nữ', 1979),
(21, '000', 'thuong@gmail.com', '$2y$10$88ssAjVCELBq/TT2p9L3Ae9B55.zCEmFdO6vlcYib7mzUTcfq2W4K', 0, 'Nữ', 1977),
(22, 'thuong123', 'thuong@gmail.com', '$2y$10$HK0UKeZlAtdaSAx6JjtfBe.VfWYQCRmbMcHWSlj4Ojk4Zxz0/cdAm', 1, 'Chưabiết', 2005),
(23, '123', '123@gmail.com', '$2y$10$RZpeR.7XKQmeOU1rzXQPsu9lM3P5MiTPkkNpTMKL4C1yU.yS7zu5u', 1, 'Nữ', 2002),
(24, 'thuong0000', 'thuong@gmail.com', '$2y$10$o6xgyJfmIVhVzpdAul5mP.7TNN2NWsdJW0YpzQKXQrtL.dT6amlSu', 1, 'Chưabiết', 1988),
(25, 'thuong0000', 'thuong@gmail.com', '$2y$10$YiIHqS0WlhQP2Pw55sXTnut2bYfJZX28lqJWvjlemlsEbgPHGELj6', 1, 'Chưabiết', 1988),
(26, 'thuong0000', 'thuong@gmail.com', '$2y$10$vy2lINR1wcN4oLwn53.zdurG0vsq6QlInYKhap3t8guSL1skNPM5y', 1, 'Chưabiết', 1988);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`idDonHang`,`idSanPham`),
  ADD KEY `idSanPham` (`idSanPham`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_idkhachhang_foreign` (`idKhachHang`),
  ADD KEY `donhang_tinhtrangdonhang_foreign` (`tinhtrangdonhang`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaisanpham_maloaihang_foreign` (`MaLoaiHang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_maloaisp_foreign` (`MaLoaiSP`),
  ADD KEY `sanpham_id_tinhtrang_foreign` (`id_TinhTrang`);

--
-- Indexes for table `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`idDonHang`) REFERENCES `donhang` (`id`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`idSanPham`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_idkhachhang_foreign` FOREIGN KEY (`idKhachHang`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `donhang_tinhtrangdonhang_foreign` FOREIGN KEY (`tinhtrangdonhang`) REFERENCES `tinhtrangdonhang` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_id_tinhtrang_foreign` FOREIGN KEY (`id_TinhTrang`) REFERENCES `tinhtrang` (`id`),
  ADD CONSTRAINT `sanpham_maloaisp_foreign` FOREIGN KEY (`MaLoaiSP`) REFERENCES `loaisanpham` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
