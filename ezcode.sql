-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2024 at 03:57 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user`, `password`, `email`, `role`) VALUES
(1, 'donam24', '180224', 'namdtph31893@fpt.edu.vn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_course`
--

CREATE TABLE `category_course` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category_course`
--

INSERT INTO `category_course` (`id`, `name`) VALUES
(1, 'Khóa học tiếng anh'),
(3, 'Khóa học PHP'),
(7, 'Khóa học Java');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_course` int NOT NULL,
  `id_account` int NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `lesson` int NOT NULL,
  `student` int NOT NULL,
  `mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `id_category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `image`, `price`, `lesson`, `student`, `mota`, `id_category`) VALUES
(13, 'tiếng anh 1.1', '/uploads/courses/1708573680eng1.jpg', 200000, 15, 35, 'rèn luyện kỹ năng nghe nói đọc viết', 1),
(14, 'tiếng anh 1.2', '/uploads/courses/1708391690eng2.jpeg', 200000, 9, 36, 'học ngữ pháp', 1),
(15, 'PHP1', '/uploads/courses/1708391771php1.jpg', 500000, 12, 35, 'Giới thiệu về PHP', 3),
(16, 'PHP2', '/uploads/courses/1708391822php2.png', 500000, 13, 32, 'MVC OOP', 3),
(20, 'java nâng cao', '/uploads/courses/1708392220java4.png', 80000, 20, 36, 'chuyên môn về mảng , vòng lặp', 7),
(21, 'Java cơ bản', '/uploads/courses/1708392310java5.png', 400000, 25, 34, 'mở đầu về ngôn ngữ lập trình java', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_course`
--
ALTER TABLE `category_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_course`
--
ALTER TABLE `category_course`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
