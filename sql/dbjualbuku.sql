-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 04:17 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbjualbuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbbuku`
--

CREATE TABLE `tbbuku` (
  `NoISBN` int(20) NOT NULL,
  `JudulBuku` varchar(100) NOT NULL,
  `Penulis` varchar(100) NOT NULL,
  `Penerbit` varchar(100) NOT NULL,
  `Harga` double(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbuku`
--

INSERT INTO `tbbuku` (`NoISBN`, `JudulBuku`, `Penulis`, `Penerbit`, `Harga`) VALUES
(12345678, 'Buku Test', 'Mbo', 'Ganteng', 200000),
(123456789, 'Buku Mantap Jiwa', 'Anthony', 'Erlangg', 150000),
(1234567898, 'Buku Mantap', 'Anthony', 'Erlangga', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `tbsupplier`
--

CREATE TABLE `tbsupplier` (
  `IdSupplier` int(11) NOT NULL,
  `NamaSupplier` varchar(100) NOT NULL,
  `AlamatSupplier` varchar(100) NOT NULL,
  `TelpSupplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsupplier`
--

INSERT INTO `tbsupplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `TelpSupplier`) VALUES
(1, 'Sumber Rejeki', 'Denpasar', '08123958346'),
(2, 'Jaya Makmur', 'Patimura', '0123017545012');

-- --------------------------------------------------------

--
-- Table structure for table `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `IdTransaksi` int(20) NOT NULL,
  `NoISBN` int(11) NOT NULL,
  `NoTransaksi` varchar(20) NOT NULL,
  `TanggalTransaksi` date NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `TotalBayar` double(12,0) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtransaksi`
--

INSERT INTO `tbtransaksi` (`IdTransaksi`, `NoISBN`, `NoTransaksi`, `TanggalTransaksi`, `Jumlah`, `TotalBayar`, `Status`) VALUES
(1, 12345678, 'Y4F718-11', '2018-11-15', 2, 400000, 'Lunas'),
(2, 1234567898, 'E9V718-11', '2018-11-15', 2, 300000, 'Lunas'),
(15, 12345678, 'E9VF18-11', '2018-11-15', 9, 1800000, 'Lunas'),
(16, 12345678, '2Y7818-11', '2018-11-15', 2, 400000, 'Lunas'),
(17, 1234567898, '2Y7818-11', '2018-11-15', 2, 300000, 'Lunas'),
(18, 12345678, 'PKHY18-11', '2018-11-15', 1, 200000, 'Lunas'),
(19, 12345678, 'EODS18-11', '2018-11-15', 1, 200000, 'Lunas'),
(20, 12345678, 'GIUC18-11', '2018-11-15', 1, 200000, 'Lunas'),
(21, 12345678, 'VJCR18-11', '2018-11-15', 1, 200000, 'Lunas'),
(22, 12345678, '460E18-11', '2018-11-15', 3, 600000, 'Lunas'),
(23, 12345678, '9IBA18-11', '2018-11-15', 1, 200000, 'Lunas'),
(24, 12345678, '8QLJ18-12', '2018-11-15', 1, 200000, 'Lunas'),
(25, 123456789, '8QLJ18-12', '2018-12-09', 2, 300000, 'Lunas'),
(26, 12345678, 'LYH718-12', '2018-12-09', 1, 200000, 'Lunas'),
(27, 1234567898, 'LYH718-12', '2018-12-09', 1, 150000, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Anthony Lee', 'anthonyleembahmo@gmail.com', '1.jpg', '$2y$10$XLNA.nePbuE.1ztj0MOuWeTeeY6k1/m/Go8pEOnHmPYkWP4I4cjy2', '2XYqBVoD8zOoay51WRct0CvLEDE2yzzAlBK01RPtnNFlPmUbf5bVpyW6CHqt', '2018-11-15 02:17:22', '2018-11-15 02:17:22'),
(3, 'Test baru', 'test@gmail.com', '1.jpg', '$2y$10$XI9TqtZVqbw2UkOI4AEP2ewxVw4pf4XkCJ2waNj6g0O.87Od5DM1G', '30rQiLBXUOE6BLRXOrIxTvl1KbnWOqbhpRdpGecfKo8PcT3kkRWxCv4EeoPl', '2018-11-15 02:32:32', '2018-11-15 02:32:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbbuku`
--
ALTER TABLE `tbbuku`
  ADD PRIMARY KEY (`NoISBN`);

--
-- Indexes for table `tbsupplier`
--
ALTER TABLE `tbsupplier`
  ADD PRIMARY KEY (`IdSupplier`);

--
-- Indexes for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`IdTransaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbsupplier`
--
ALTER TABLE `tbsupplier`
  MODIFY `IdSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  MODIFY `IdTransaksi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
