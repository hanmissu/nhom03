-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 15, 2023 lúc 02:12 PM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `do_an`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tenTK` varchar(50) NOT NULL,
  `matKhau` varchar(50) NOT NULL,
  `tenAdmiin` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `tenTK`, `matKhau`, `tenAdmiin`) VALUES
(1, 'admin', 'admin', 'quan chuong han');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `maDonHang` int(10) NOT NULL,
  `maGiay` int(10) NOT NULL,
  `tenGiay` varchar(50) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  KEY `FK_donHang_ChiTietDonHang` (`maDonHang`),
  KEY `FK_Giay_ChiTietDonHang` (`maGiay`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`maDonHang`, `maGiay`, `tenGiay`, `soLuong`, `gia`) VALUES
(78, 114, 'giÃ y bÃºp bÃª zucia mÅ©i vuÃ´ng Ä‘Ã­nh nÆ¡', 1, 200000),
(79, 115, 'nike jordan 1 low Ä‘en tráº¯ng', 1, 100000),
(79, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(80, 115, 'nike jordan 1 low Ä‘en tráº¯ng', 1, 100000),
(81, 110, 'adidas a102 xanh rÃªu', 1, 400000),
(85, 110, 'adidas a102 xanh rÃªu', 1, 400000),
(85, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(86, 110, 'adidas a102 xanh rÃªu', 1, 400000),
(87, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(88, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(89, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(90, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(92, 111, 'adidas alphabounce beyond nÃ¢u kem', 5, 100000),
(92, 112, 'adidas', 1, 500002),
(93, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(93, 112, 'adidas', 1, 500002),
(94, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(94, 112, 'adidas', 1, 500002),
(95, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(95, 112, 'adidas', 1, 500002),
(101, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(103, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(104, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(105, 113, 'giÃ y boot ná»¯ zucia khÃ³a kÃ©o', 1, 300000),
(105, 111, 'adidas alphabounce beyond nÃ¢u kem', 3, 100000),
(106, 113, 'giÃ y boot ná»¯ zucia khÃ³a kÃ©o', 1, 300000),
(106, 111, 'adidas alphabounce beyond nÃ¢u kem', 3, 100000),
(107, 113, 'giÃ y boot ná»¯ zucia khÃ³a kÃ©o', 1, 300000),
(107, 111, 'adidas alphabounce beyond nÃ¢u kem', 3, 100000),
(108, 113, 'giÃ y boot ná»¯ zucia khÃ³a kÃ©o', 1, 300000),
(108, 111, 'adidas alphabounce beyond nÃ¢u kem', 3, 100000),
(109, 113, 'giÃ y boot ná»¯ zucia khÃ³a kÃ©o', 1, 300000),
(109, 111, 'adidas alphabounce beyond nÃ¢u kem', 3, 100000),
(110, 113, 'giÃ y boot ná»¯ zucia khÃ³a kÃ©o', 1, 300000),
(110, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(111, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(112, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(112, 112, 'adidas', 2, 500002);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `maDonHang` int(10) NOT NULL AUTO_INCREMENT,
  `ngayXuat` varchar(50) NOT NULL,
  `maKH` int(50) NOT NULL,
  `tenKH` varchar(50) NOT NULL,
  `trangThai` int(11) NOT NULL,
  `diaChi` varchar(250) NOT NULL,
  `tongTien` int(10) NOT NULL,
  PRIMARY KEY (`maDonHang`),
  KEY `FKdonHang295585` (`tenKH`),
  KEY `FK_khachHang_donHang` (`maKH`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`maDonHang`, `ngayXuat`, `maKH`, `tenKH`, `trangThai`, `diaChi`, `tongTien`) VALUES
(78, '22-12-2022', 2, 'quan chÆ°Æ¡ng hÃ¢n', 1, 'bml', 200000),
(79, '22-12-2022', 2, 'quan chÆ°Æ¡ng hÃ¢n', 1, '180 cao lá»—', 200000),
(80, '22-12-2022', 14, 'Há»“ CÃ´ng Háº­u', 0, '180 cao lá»—', 100000),
(81, '22-12-2022', 14, 'Há»“ CÃ´ng Háº­u', 0, '180 cao lá»—', 400000),
(85, '23-12-2022', 2, 'quan chÆ°Æ¡ng hÃ¢n', 1, '180 cao lá»—', 500000),
(86, '23-12-2022', 2, 'quan chÆ°Æ¡ng hÃ¢n', 1, 'cao lo', 400000),
(87, '09-01-2023', 2, 'quan chÆ°Æ¡ng hÃ¢n', 0, '180 cao lá»—', 100000),
(88, '01-03-2023', 2, 'quan chÆ°Æ¡ng hÃ¢n', 0, 'aaa', 100000),
(89, '01-03-2023', 22, 'abc', 0, '', 100000),
(90, '01-03-2023', 22, 'abc', 0, 'aaa', 100000),
(92, '01-03-2023', 22, 'abc', 0, 'hhaan', 1000002),
(93, '01-03-2023', 22, 'abc', 0, 'don hang moi', 600002),
(94, '01-03-2023', 22, 'abc', 0, 'Viá»‡t Nam', 600002),
(95, '02-03-2023', 22, 'abc', 0, 'Viá»‡t Nam', 600002),
(101, '04-03-2023', 22, 'abc', 0, 'Viá»‡t Nam', 100000),
(103, '10-03-2023', 22, 'abc', 0, '---', 100000),
(104, '10-03-2023', 22, 'abc', 0, 'han-PhÆ°á»ng PhÃºc XÃ¡-Quáº­n Ba ÄÃ¬nh-ThÃ nh phá»‘ HÃ  Ná»™i', 100000),
(105, '13-03-2023', 22, 'abc', 0, 'aaaaa-Thá»‹ tráº¥n CÃ¡t Háº£i-Huyá»‡n CÃ¡t Háº£i-ThÃ nh phá»‘ Háº£i PhÃ²ng', 600000),
(106, '13-03-2023', 22, 'abc', 0, 'aaaaa-Thá»‹ tráº¥n CÃ¡t Háº£i-Huyá»‡n CÃ¡t Háº£i-ThÃ nh phá»‘ Háº£i PhÃ²ng', 600000),
(107, '13-03-2023', 22, 'abc', 0, 'aaaaa-Thá»‹ tráº¥n CÃ¡t Háº£i-Huyá»‡n CÃ¡t Háº£i-ThÃ nh phá»‘ Háº£i PhÃ²ng', 600000),
(108, '13-03-2023', 22, 'abc', 0, 'aaaaa-Thá»‹ tráº¥n CÃ¡t Háº£i-Huyá»‡n CÃ¡t Háº£i-ThÃ nh phá»‘ Háº£i PhÃ²ng', 600000),
(109, '13-03-2023', 22, 'abc', 0, 'aaaaa-Thá»‹ tráº¥n CÃ¡t Háº£i-Huyá»‡n CÃ¡t Háº£i-ThÃ nh phá»‘ Háº£i PhÃ²ng', 600000),
(110, '13-03-2023', 48, 'Han Quan', 0, 'd-XÃ£ LÅ©ng CÃº-Huyá»‡n Äá»“ng VÄƒn-Tá»‰nh HÃ  Giang', 400000),
(111, '13-03-2023', 48, 'Han Quan', 0, 'Viá»‡t Nam-PhÆ°á»ng SÃ´ng Báº±ng-ThÃ nh phá»‘ Cao Báº±ng-Tá»‰nh Cao Báº±ng', 100000),
(112, '13-03-2023', 48, 'Han Quan', 0, 'a-PhÆ°á»ng HÃ ng MÃ£-Quáº­n HoÃ n Kiáº¿m-ThÃ nh phá»‘ HÃ  Ná»™i', 1100004);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giay`
--

DROP TABLE IF EXISTS `giay`;
CREATE TABLE IF NOT EXISTS `giay` (
  `maGiay` int(10) NOT NULL AUTO_INCREMENT,
  `tenGiay` varchar(50) NOT NULL,
  `gia` int(10) NOT NULL,
  `mauSac` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `anh` varchar(225) NOT NULL,
  `moTa` varchar(1000) DEFAULT NULL,
  `maLoaiGiay` int(10) NOT NULL,
  PRIMARY KEY (`maGiay`),
  KEY `FK_LoaiGiay_Giay` (`maLoaiGiay`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `giay`
--

INSERT INTO `giay` (`maGiay`, `tenGiay`, `gia`, `mauSac`, `size`, `anh`, `moTa`, `maLoaiGiay`) VALUES
(110, 'adidas a102 xanh rÃªu', 400000, 'Ä‘á»', '36', 'adidas a102 xanh rÃªu.jpg', 'aaa', 5),
(111, 'adidas alphabounce beyond nÃ¢u kem', 100000, 'nÃ¢u', '36', 'adidas alphabounce beyond nÃ¢u kem.jpg', 'aaaa', 5),
(112, 'adidas', 500002, 'Ä‘á»', '36', 'adidas.jpg', 'aaa', 5),
(113, 'giÃ y boot ná»¯ zucia khÃ³a kÃ©o', 300000, 'mÃ u da', '36', 'giÃ y boot ná»¯ zucia khÃ³a kÃ©o.webp', 'asd', 2),
(114, 'giÃ y bÃºp bÃª zucia mÅ©i vuÃ´ng Ä‘Ã­nh nÆ¡', 200000, 'mÃ u da', '36', 'giÃ y bÃºp bÃª zucia mÅ©i vuÃ´ng Ä‘Ã­nh nÆ¡.webp', 'a', 2),
(115, 'nike jordan 1 low Ä‘en tráº¯ng', 100000, 'mÃ u da', '36', 'nike jordan 1 low Ä‘en tráº¯ng.jpg', 'a', 3),
(116, 'giÃ y mlb ny yankeÃ© Ä‘áº¿ nÃ¢u', 100000, 'mÃ u da', '36', 'giÃ y mlb ny yankeÃ© Ä‘áº¿ nÃ¢u.jpg', 'aa', 3),
(117, 'giÃ y lÆ°á»i nam zuciani', 400000, 'mÃ u da', '36', 'giÃ y lÆ°á»i nam zuciani.webp', 'a', 1),
(118, 'giÃ y lÆ°á»i nam zuciani', 100000, 'mÃ u da', '36', 'giÃ y lÆ°á»i nam zuciani.webp', 'a', 1),
(119, 'nike', 100000, 'mÃ u da', '36', 'pexels-web-donut-19090.jpg', '                                    aaaaa                                    ', 3),
(120, 'giÃ y thá»ƒ thao zuciani', 100000, 'Ä‘en tráº¯ng', '36', 'giÃ y thá»ƒ thao zuciani.webp', 'Ã¢', 3),
(121, 'demo', 100000, 'Ä‘á»', 'xl', 'áº¢nh chá»¥p mÃ n hÃ¬nh_20221214_114018.png', 'mÃ´ táº£', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `maKH` int(50) NOT NULL AUTO_INCREMENT,
  `tenKH` varchar(50) NOT NULL,
  `SDT` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `taiKhoan` varchar(50) DEFAULT NULL,
  `matKhau` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`maKH`),
  UNIQUE KEY `taiKhoan` (`taiKhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`maKH`, `tenKH`, `SDT`, `email`, `taiKhoan`, `matKhau`) VALUES
(2, 'quan chÆ°Æ¡ng hÃ¢n', 123456, 'chuonghan@gmail.com', 'chuonghan', '1'),
(14, 'Há»“ CÃ´ng Háº­u', 123456789, 'vuloc1810@gmail.com', 'hau123', '123456'),
(18, 'NgÃ´ máº¡nh cÆ°á»ng', 123456789, '123@gmail.com', 'cuong', '123'),
(22, 'abc', 123, 'han@gmail.com', 'a', '1'),
(23, 'aa', 18102005, 'aa@gmail.com', 'aa', 'aa'),
(26, 'Quan ChÆ°Æ¡ng HÃ¢n ', 18102005, '1@gmail.com', 'aaaaaaaa', '1'),
(30, 'ahahahaha', 18102005, '123@gmail.com', 'jjj', '1'),
(45, 'aaaaa', 1233466568, 'dang@gmail.com', '1', '3'),
(48, 'Han Quan', NULL, 'chuonghan2001@gmail.com', NULL, NULL),
(68, 'ChÆ°Æ¡ng HÃ¢n', NULL, NULL, NULL, NULL),
(69, 'ChÆ°Æ¡ng HÃ¢n', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaigiay`
--

DROP TABLE IF EXISTS `loaigiay`;
CREATE TABLE IF NOT EXISTS `loaigiay` (
  `maLoaiGiay` int(10) NOT NULL AUTO_INCREMENT,
  `tenLoai` varchar(50) NOT NULL,
  PRIMARY KEY (`maLoaiGiay`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loaigiay`
--

INSERT INTO `loaigiay` (`maLoaiGiay`, `tenLoai`) VALUES
(1, ' Nam'),
(2, ' Ná»¯'),
(3, 'Thá»ƒ Thao'),
(5, 'adidas');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `FK_Giay_ChiTietDonHang` FOREIGN KEY (`maGiay`) REFERENCES `giay` (`maGiay`),
  ADD CONSTRAINT `FK_donHang_ChiTietDonHang` FOREIGN KEY (`maDonHang`) REFERENCES `donhang` (`maDonHang`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `FK_khachHang_donHang` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`maKH`);

--
-- Các ràng buộc cho bảng `giay`
--
ALTER TABLE `giay`
  ADD CONSTRAINT `FK_LoaiGiay_Giay` FOREIGN KEY (`maLoaiGiay`) REFERENCES `loaigiay` (`maLoaiGiay`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
