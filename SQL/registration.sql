-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 25, 2023 lúc 06:42 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `online_quiz`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `registration`
--

CREATE TABLE `registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `phonenum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`, `birthday`, `phonenum`) VALUES
(10, '123', 'hello', 'camly', '202cb962ac59075b964b07152d234b70', 'dafda@dfa', '123', '', '0'),
(14, 'franc', 'camly', '123', '827ccb0eea8a706c4c34a16891f84e7b', '123@g', '123', '', '0'),
(18, 'franc', 'camly hellu', 's4154', '827ccb0eea8a706c4c34a16891f84e7b', 'dafda@dfa', '123', '', '0'),
(21, ' Nguyen', 'camly', 'admin23', '202cb962ac59075b964b07152d234b70', 'dafda@dfa', '1234', '', '0'),
(22, 'franc', 'nguyen', 'admin123', '202cb962ac59075b964b07152d234b70', 'phanvanduc@gmail.com', '1234', '', '0'),
(23, 'camly', 'nguyen', 'admin2', '81dc9bdb52d04dc20036dbd8313ed055', 'phanvanduc@gmail.com', '12324', '', '0'),
(24, 'Ly Nguyen', 'hello', 's415455', '202cb962ac59075b964b07152d234b70', 'dafda@dfa', '1234', '', '123456'),
(25, 'Phan Nguyen', 'hello', 's41544', '202cb962ac59075b964b07152d234b70', 'dafda@dfa', '1234', '2023-04-19', '12334'),
(27, 'camly', 'hello', 's4154545', '202cb962ac59075b964b07152d234b70', 'dafda@dfa', '21312', '2023-04-27', '1234'),
(28, 'camly', 'hello', 's41546', '202cb962ac59075b964b07152d234b70', 'dafda@dfa', '1234', '2023-04-26', '1234'),
(29, 'camly', 'hello', 's4154567', '202cb962ac59075b964b07152d234b70', 'dafda@dfa', '1234', '2023-05-07', '123214502134');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
