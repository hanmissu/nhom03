-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 23, 2023 lúc 11:31 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 7.4.33

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
  `id` int NOT NULL AUTO_INCREMENT,
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
  `maDonHang` int NOT NULL,
  `maGiay` int NOT NULL,
  `tenGiay` varchar(50) NOT NULL,
  `soLuong` int NOT NULL,
  `gia` int NOT NULL,
  KEY `FK_Giay_ChiTietDonHang` (`maGiay`),
  KEY `FK_donHang_ChiTietDonHang` (`maDonHang`)
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
(91, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(92, 111, 'adidas alphabounce beyond nÃ¢u kem', 5, 100000),
(92, 112, 'adidas', 1, 500002),
(93, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(93, 112, 'adidas', 1, 500002),
(94, 111, 'adidas alphabounce beyond nÃ¢u kem', 1, 100000),
(94, 112, 'adidas', 1, 500002),
(95, 121, 'CLASSIC OXFORD - OF27', 1, 1750000),
(96, 122, 'SEMI-BROGUES CHISEL', 1, 1750000),
(96, 123, 'GIBSON BROGUES OXFORD', 1, 2750000),
(97, 122, 'SEMI-BROGUES CHISEL', 1, 1750000),
(98, 122, 'SEMI-BROGUES CHISEL', 1, 1750000),
(99, 122, 'SEMI-BROGUES CHISEL', 1, 1750000),
(100, 121, 'CLASSIC OXFORD - OF27', 1, 1750000),
(101, 122, 'SEMI-BROGUES CHISEL', 1, 1750000),
(102, 122, 'SEMI-BROGUES CHISEL', 1, 1750000),
(103, 122, 'SEMI-BROGUES CHISEL', 1, 1750000),
(104, 122, 'SEMI-BROGUES CHISEL', 1, 1750000),
(105, 122, 'SEMI-BROGUES CHISEL', 1, 1750000),
(106, 122, 'SEMI-BROGUES CHISEL', 1, 1750000),
(106, 125, 'B.E CLASSIC SNEAKERS ', 1, 1950000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `maDonHang` int NOT NULL AUTO_INCREMENT,
  `ngayXuat` varchar(50) NOT NULL,
  `maKH` int NOT NULL,
  `tenKH` varchar(50) NOT NULL,
  `trangThai` int NOT NULL,
  `diaChi` varchar(250) NOT NULL,
  `tongTien` int NOT NULL,
  PRIMARY KEY (`maDonHang`),
  KEY `FKdonHang295585` (`tenKH`),
  KEY `FK_khachHang_donHang` (`maKH`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

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
(91, '01-03-2023', 22, 'abc', 0, 'aaaaaaaaaaaaaaaa', 100000),
(92, '01-03-2023', 22, 'abc', 0, 'hhaan', 1000002),
(93, '01-03-2023', 22, 'abc', 0, 'don hang moi', 600002),
(94, '01-03-2023', 22, 'abc', 0, 'Viá»‡t Nam', 600002),
(95, '16-03-2023', 24, 'tung', 0, '1-Ph??ng Nguy?n Trãi-Thành ph? Hà Giang-T?nh Hà Giang', 1750000),
(96, '17-03-2023', 24, 'tung', 0, 'Vi?t Nam-Xã Tân M?-Thành ph? B?c Giang-T?nh B?c Giang', 4500000),
(97, '17-03-2023', 2, 'quan chÆ°Æ¡ng hÃ¢n', 0, 'Vi?t Nam-Ph??ng Tr?n Phú-Thành ph? Hà Giang-T?nh Hà Giang', 1750000),
(98, '17-03-2023', 35, 'han', 0, 'Vi?t Nam-Ph??ng Hàng Mã-Qu?n Hoàn Ki?m-Thành ph? Hà N?i', 1750000),
(99, '17-03-2023', 2, 'quan chÆ°Æ¡ng hÃ¢n', 0, 'Vi?t Nam-Xã Tân L?p-Huy?n Thanh S?n-T?nh Phú Th?', 1750000),
(100, '17-03-2023', 2, 'quan chÆ°Æ¡ng hÃ¢n', 0, 'Vi?t Nam-Xã Trung Kiên-Huy?n Yên L?c-T?nh V?nh Phúc', 1750000),
(101, '17-03-2023', 2, 'quan chÆ°Æ¡ng hÃ¢n', 0, 'Vi?t Nam-Ph??ng ??ng Xuân-Qu?n Hoàn Ki?m-Thành ph? Hà N?i', 1750000),
(102, '17-03-2023', 2, 'quan chÆ°Æ¡ng hÃ¢n', 0, 'Vi?t Nam-Xã Nam H?ng-Huy?n Tiên Lãng-Thành ph? H?i Phòng', 1750000),
(103, '17-03-2023', 2, 'quan chÆ°Æ¡ng hÃ¢n', 0, 'Vi?t Nam-Xã Nam H?ng-Huy?n Tiên Lãng-Thành ph? H?i Phòng', 1750000),
(104, '17-03-2023', 24, 'tung', 0, 'Vi?t Nam-Xã Ngh?a L?-Huy?n Cát H?i-Thành ph? H?i Phòng', 1750000),
(105, '17-03-2023', 24, 'tung', 0, 'Vi?t Nam-Ph??ng Hàng Mã-Qu?n Hoàn Ki?m-Thành ph? Hà N?i', 1750000),
(106, '17-03-2023', 45, 'han', 0, 'Vi?t Nam-Xã ??i ??ng-Huy?n Tiên Du-T?nh B?c Ninh', 3700000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giay`
--

DROP TABLE IF EXISTS `giay`;
CREATE TABLE IF NOT EXISTS `giay` (
  `maGiay` int NOT NULL AUTO_INCREMENT,
  `tenGiay` varchar(50) NOT NULL,
  `gia` int NOT NULL,
  `mauSac` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `anh` varchar(225) NOT NULL,
  `moTa` varchar(1000) DEFAULT NULL,
  `maLoaiGiay` int NOT NULL,
  PRIMARY KEY (`maGiay`),
  KEY `FK_LoaiGiay_Giay` (`maLoaiGiay`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `giay`
--

INSERT INTO `giay` (`maGiay`, `tenGiay`, `gia`, `mauSac`, `size`, `anh`, `moTa`, `maLoaiGiay`) VALUES
(121, 'CLASSIC OXFORD - OF27', 1750000, 'Brown', '38', 'sp1.png', '                  V?i 100% da bò th?t và ???c nh?p kh?u t? Ý.                  ', 1),
(122, 'SEMI-BROGUES CHISEL', 1750000, 'BLACK', '40', 'sp2.png', '                                    Thi?t k? sang tr?ng, c?u trúc ?? MKay                                    ', 1),
(123, 'GIBSON BROGUES OXFORD', 2750000, 'Brown', '39', 'sp3.png', '                  Thi?t k? form dáng theo ki?u ng??i Vi?t                  ', 1),
(124, 'PENNY LOAFER', 2750000, 'Black', '41', 'sp4.png', '                  GIBSON PENNY LOAFER - ?ôi giày Loafer ?? da sang tr?ng và dành cho nh?ng Quý Ông thích s? l?ch lãm v?i nh?ng b? Suit. N?u nh? yêu thích dòng Loafer sang tr?ng, ?ây h?n là ?ôi giày mà b?n không th? thi?u trong t? giày.                  ', 1),
(125, 'B.E CLASSIC SNEAKERS ', 1950000, 'While', '40', 'sp5.png', '                  ?ôi Sneaker tr? trung ??n t? BST Sneaker m?i c?a Be Classy. Phom dáng thanh l?ch và hoàn toàn làm t? da Bò Ý.  Phù h?p cho phong cách thanh l?ch. Dành cho nh?ng quý ông thích s? tr? trung, ??n gi?n và n?ng ??ng. Ti?n l?i ?i ??n b?t kì ?âu.                   ', 1),
(126, 'CLASSIC SNEAKERS - SN03', 1950000, 'Pink', '38', 'sp6.png', '?ôi Sneaker cho nam có thi?t k? c? b?n làm cho ngo?i hình c?a cánh ?àn ông tr? trung h?n bao gi? h?t. Hãy ch?n m?t b? Outfit theo ý mu?n c?a b?n, vi?c còn l?i, ?ôi Sneaker này s? giúp b?n t?a sáng.', 1),
(127, 'CHELSEA BOOTS - DO01', 2850000, 'L-Brown', '39', 'sp7.png', 'Mang thi?t k? ??n gi?n d? ph?i ??, dòng Boots m?i c?a Be Classy ???c ?a s? các Quý Ông ?ón nh?n. ', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `maKH` int NOT NULL AUTO_INCREMENT,
  `tenKH` varchar(50) NOT NULL,
  `SDT` int DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `taiKhoan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `matKhau` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `idFacebook` varchar(255) DEFAULT NULL,
  `codeVerify` int DEFAULT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`maKH`),
  UNIQUE KEY `taiKhoan` (`taiKhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`maKH`, `tenKH`, `SDT`, `email`, `taiKhoan`, `matKhau`, `idFacebook`, `codeVerify`, `status`) VALUES
(2, 'quan chÆ°Æ¡ng hÃ¢n', 123456, 'chuonghan2001@gmail.com', 'chuonghan', '1', NULL, NULL, 0),
(14, 'Há»“ CÃ´ng Háº­u', 123456789, 'vuloc1810@gmail.com', 'hau123', '123456', NULL, NULL, 0),
(15, 'abc', 123456, '123@gmail.com', '123', '123', NULL, NULL, 0),
(18, 'NgÃ´ máº¡nh cÆ°á»ng', 123456789, '123@gmail.com', 'cuong', '123', NULL, NULL, 0),
(19, 'abc', 123456789, '123@gmail.com', 'han', '123', NULL, NULL, 0),
(20, 'leu huy tung', 18102005, '123@gmail.com', 'admin', '123', NULL, NULL, 0),
(22, 'abc', 123, 'han@gmail.com', 'a', '1', NULL, NULL, 0),
(24, 'tung', 11111111, 'tungleu3701@gmail.com', 'tung', '1', NULL, NULL, 0),
(28, 'Ch??ng Hân', NULL, '', NULL, NULL, '877174523345043', NULL, 0),
(35, 'han', 364771704, 'hanlakbml@gmail.com', 'hanlak', '1', '', 85839, 0),
(37, 'han', 2147483647, 'hanmissu99@gmail.com', 'han1', '1', '', 39898, 0),
(41, 'dang', 2147483647, 'hd19102k1@gmail.com', 'dangden', '1', '', 81396, 1),
(45, 'han', 2147483647, 'nhokvjppro14@gmail.com', 'hanv', '1', '', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaigiay`
--

DROP TABLE IF EXISTS `loaigiay`;
CREATE TABLE IF NOT EXISTS `loaigiay` (
  `maLoaiGiay` int NOT NULL AUTO_INCREMENT,
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
