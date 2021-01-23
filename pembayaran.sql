-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 12:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembayaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'pay123', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id` int(11) NOT NULL,
  `nama_metode` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `kategori` enum('e-money','virtual account','merchant','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id`, `nama_metode`, `deskripsi`, `logo`, `kategori`) VALUES
(1, 'DANA', 'Selesaikan pembayaran menggunakan saldo DANA kamu', 'https://upload.wikimedia.org/wikipedia/commons/5/52/Dana_logo.png', 'e-money'),
(2, 'GOPAY', 'Selesaikan pembayaran menggunakan saldo GOPAY kamu', 'https://seeklogo.com/images/G/gopay-logo-D27C1EBD0D-seeklogo.com.png', 'e-money'),
(3, 'LinkAja', 'Selesaikan pembayaran menggunakan saldo LinkAja kamu', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/LinkAja.svg/92px-LinkAja.svg.png', 'e-money'),
(4, 'OVO', 'Selesaikan pembayaran menggunakan saldo OVO kamu', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Logo_ovo_purple.svg/512px-Logo_ovo_purple.svg.png', 'e-money'),
(5, 'Mandiri Virtual Account', 'ATM Mandriri\r\n1. Masukkan kartu ATM dan Pin.\r\n2. Pilih Menu Bayar/Beli.\r\n3. Pilih menu Lainnya, hingga menemukan menu Multipayment.\r\n4. Masukkan Nomor Virtual Account, lalu pilih tombol Benar.\r\n5. Masukkan Angka 1 untuk memilih tagihan, lalu pilih tombol Ya.\r\n6. Akan muncul konfirmasi pembayaran, lalu pilih tombol Ya.\r\n7. Simpan struk sebagai bukti pembayaran Anda.', 'https://upload.wikimedia.org/wikipedia/en/thumb/f/fa/Bank_Mandiri_logo.svg/222px-Bank_Mandiri_logo.svg.png', 'virtual account'),
(6, 'BRI Virtual Account', 'ATM Bank BRI\r\n1. Masukkan ATM dan PIN\r\n2. Pilih Menu Transaksi Lain\r\n3. Pilih Menu Pembayaran\r\n4. Pilih Menu Lainnya\r\n5. Pilih Menu BRIVA\r\n6. Masukan 15 digit Nomor Virtual Account \r\n7. Proses Pembayaran (Ya/Tidak)\r\n8. Simpan struk sebagai bukti pembayaran Anda.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_BRI.png/320px-Logo_BRI.png', 'virtual account'),
(7, 'BNI Virtual Account', 'ATM Bank BNI\r\n1. Masukkan ATM dan PIN\r\n2. Pilih \"Menu Lainnya\"\r\n3. Pilih \"Transfer\"\r\n4. Pilih Jenis rekening yang akan Anda gunakan\r\n5. Pilih “Virtual Account Billing”\r\n6. Masukkan nomor Virtual Account\r\n7. Tagihan yang harus dibayarkan akan muncul pada layar konfirmasi\r\n8. Konfirmasi, apabila telah sesuai, lanjutkan transaksi\r\n9. Simpan struk sebagai bukti pembayaran Anda.', 'https://upload.wikimedia.org/wikipedia/en/thumb/2/27/BankNegaraIndonesia46-logo.svg/175px-BankNegaraIndonesia46-logo.svg.png', 'virtual account'),
(8, 'Indomaret', 'Pembayaran melalui kasir Indomaret. Kamu akan dikenakan tambahan biaya administrasi sebesar Rp.2,500 di kasir Indomaret.', 'https://upload.wikimedia.org/wikipedia/id/thumb/0/04/Logo_Indomaret.svg/220px-Logo_Indomaret.svg.png', 'merchant'),
(9, 'Alfamart', 'Pembayaran melalui kasir Alfamart. Kamu akan dikenakan tambahan biaya administrasi sebesar Rp.2,500 di kasir Alfamart.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Alfamart_logo.svg/320px-Alfamart_logo.svg.png', 'merchant');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `kode_pembayaran` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('FAILED','PENDING','SUCCESS','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_metode`, `kode_pembayaran`, `nama`, `total`, `status`) VALUES
(21, 1, 12515, 'Andi', 7000000, 'SUCCESS'),
(22, 1, 77, 'Aditya Prasetyo', 2700000, 'SUCCESS'),
(23, 3, 541, 'Aditya Prasetyo', 2700000, 'SUCCESS'),
(24, 3, 19, 'Aditya Prasetyo', 2700000, 'SUCCESS'),
(25, 3, 227, 'Aditya Prasetyo', 2700000, 'SUCCESS'),
(26, 5, 320, 'Aditya Prasetyo', 4400000, 'SUCCESS'),
(27, 1, 770, 'Aditya Prasetyo', 4400000, 'SUCCESS'),
(28, 7, 676, 'Aditya Prasetyo', 4400000, 'SUCCESS'),
(29, 7, 76, 'Aditya Prasetyo', 4400000, 'SUCCESS'),
(30, 7, 377, 'Aditya Prasetyo', 4400000, 'SUCCESS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaction_payment` (`id_metode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_metode`) REFERENCES `metode_pembayaran` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
