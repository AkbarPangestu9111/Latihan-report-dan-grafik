-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 05:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jurusan`) VALUES
(1, '123456789', 'nana', 'sistem informasi'),
(2, '123456790', 'lulu', 'teknik industri'),
(3, '123456791', 'rara', 'bisnis digital'),
(4, '123456795', 'raymond', 'sistem informasi'),
(5, '123456789', 'fajar', 'informatika'),
(6, '123456797', 'wulan', 'sistem informasi'),
(7, '123456799', 'desi', 'teknik industri'),
(8, '123456785', 'nimas', 'bisnis digital'),
(9, '123456786', 'deni', 'sistem informasi');

