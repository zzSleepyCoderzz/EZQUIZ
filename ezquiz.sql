-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 05:35 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` varchar(12) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jantina` varchar(10) NOT NULL,
  `aras` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `password`, `nama`, `jantina`, `aras`) VALUES
('041001141413', '1234', 'Timothy Chin Guan You', 'LELAKI', 'GURU'),
('111111111111', '1111', 'SUDO', 'NON-BINARY', 'ADMIN'),
('222222222222', '2222', 'Puan Norul Aishah', 'PEREMPUAN', 'GURU');

-- --------------------------------------------------------

--
-- Table structure for table `perekodan`
--

CREATE TABLE `perekodan` (
  `idperekodan` int(11) NOT NULL,
  `idpengguna` varchar(12) NOT NULL,
  `idtopik` int(10) NOT NULL,
  `skor` varchar(5) NOT NULL,
  `catatan_masa` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perekodan`
--

INSERT INTO `perekodan` (`idperekodan`, `idpengguna`, `idtopik`, `skor`, `catatan_masa`) VALUES
(11, '041001141413', 34, '5', '2021-11-30 16:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `idpilihan` int(11) NOT NULL,
  `nom_soalan` int(10) NOT NULL,
  `jawapan` varchar(20) NOT NULL,
  `pilihan_jawapan` text NOT NULL,
  `idsoalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pilihan`
--

INSERT INTO `pilihan` (`idpilihan`, `nom_soalan`, `jawapan`, `pilihan_jawapan`, `idsoalan`) VALUES
(150, 1, '0', 'Tali', 66),
(151, 1, '0', 'Kucing', 66),
(152, 1, '1', 'String', 66),
(153, 1, '0', 'Katak', 66),
(154, 2, '1', 'HTML, CSS, JS', 67),
(155, 2, '0', 'Solidity, GOlang, C#', 67),
(156, 2, '0', 'Python, Java, Flutter', 67),
(157, 2, '0', 'FORTRAN, COBOL, Assembly', 67),
(158, 3, '1', 'World Wide Web', 68),
(159, 3, '0', 'Witches Win WorldCup', 68),
(160, 3, '0', 'W3Schools', 68),
(161, 3, '0', 'WEEWOOWEE', 68),
(162, 4, '0', 'Joseph Stalin', 69),
(163, 4, '1', 'Tim Berners-Lee', 69),
(164, 4, '0', 'Vitalik Buterin', 69),
(165, 4, '0', 'Bill Gates', 69),
(166, 5, '0', 'Steve Jobs', 70),
(167, 5, '0', 'Satoshi Nakamoto', 70),
(168, 5, '0', 'Alan Turing', 70),
(169, 5, '1', 'James Gosling', 70),
(170, 1, '1', '1', 71),
(171, 1, '0', '2', 71),
(172, 1, '0', '3', 71),
(173, 1, '0', '4', 71),
(178, 1, '1', '1', 73),
(179, 1, '0', '2', 73),
(180, 1, '0', '3', 73),
(181, 1, '0', '4', 73),
(182, 1, '0', 'A word', 74),
(183, 1, '0', 'A time in history', 74),
(184, 1, '0', 'A place', 74),
(185, 1, '1', 'Your female parental figure', 74),
(186, 1, '1', 'Saya', 75),
(187, 1, '0', 'Adolf Hitler', 75),
(188, 1, '0', 'Hideki Tojo', 75),
(189, 1, '0', 'Benito Mussolini', 75);

-- --------------------------------------------------------

--
-- Table structure for table `soalan`
--

CREATE TABLE `soalan` (
  `idsoalan` int(11) NOT NULL,
  `nom_soalan` int(11) NOT NULL,
  `soalan` text NOT NULL,
  `gambarajah` varchar(20) NOT NULL,
  `idtopik` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soalan`
--

INSERT INTO `soalan` (`idsoalan`, `nom_soalan`, `soalan`, `gambarajah`, `idtopik`) VALUES
(66, 1, 'Nyatakan sebuah jenis data', '', 34),
(67, 2, 'Apakah 3 bahasa pengekodan yang digunakan dalam web dev?', '', 34),
(68, 3, ' Apakah maksud WWW?', 'wwwimg.jpg', 34),
(69, 4, 'Siapakah pencipta WWW?', '', 34),
(70, 5, 'Siapakah pencipta bahasa pengaturcaraan Java?', '', 34),
(71, 1, 'Testing', '', 38),
(73, 1, 'Testing ', '', 40),
(74, 1, 'What is a noun?', '', 41),
(75, 1, 'Siapakah pemimpin negara Jerman semasa WW2?', '', 42);

-- --------------------------------------------------------

--
-- Table structure for table `subjek`
--

CREATE TABLE `subjek` (
  `idsubjek` int(11) NOT NULL,
  `subjek` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjek`
--

INSERT INTO `subjek` (`idsubjek`, `subjek`) VALUES
(1, 'Sains Komputer'),
(2, 'Bahasa Melayu'),
(3, 'Bahasa Inggeris'),
(4, 'Sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `idtopik` int(11) NOT NULL,
  `topik` varchar(30) NOT NULL,
  `markah` int(11) NOT NULL,
  `idsubjek` int(10) NOT NULL,
  `idpengguna` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`idtopik`, `topik`, `markah`, `idsubjek`, `idpengguna`) VALUES
(34, 'General', 100, 1, '222222222222'),
(38, 'Bab 1 Tingkatan 5', 100, 1, '222222222222'),
(40, 'Bahasa dan Sastera', 100, 2, '222222222222'),
(41, 'Grammar', 100, 3, '222222222222'),
(42, 'Perang Dunia Kedua', 100, 4, '222222222222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `perekodan`
--
ALTER TABLE `perekodan`
  ADD PRIMARY KEY (`idperekodan`),
  ADD KEY `idpengguna` (`idpengguna`),
  ADD KEY `idtopik` (`idtopik`);

--
-- Indexes for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`idpilihan`),
  ADD KEY `idsoalan` (`idsoalan`);

--
-- Indexes for table `soalan`
--
ALTER TABLE `soalan`
  ADD PRIMARY KEY (`idsoalan`),
  ADD KEY `idtopik` (`idtopik`);

--
-- Indexes for table `subjek`
--
ALTER TABLE `subjek`
  ADD PRIMARY KEY (`idsubjek`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`idtopik`),
  ADD KEY `idsubjek` (`idsubjek`),
  ADD KEY `idpengguna` (`idpengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perekodan`
--
ALTER TABLE `perekodan`
  MODIFY `idperekodan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `idpilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `soalan`
--
ALTER TABLE `soalan`
  MODIFY `idsoalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `subjek`
--
ALTER TABLE `subjek`
  MODIFY `idsubjek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `idtopik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
