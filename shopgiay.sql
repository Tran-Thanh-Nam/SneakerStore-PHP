-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 26, 2020 lúc 05:37 PM
-- Phiên bản máy phục vụ: 10.1.40-MariaDB
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopgiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `ma_hd` int(11) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `so_luong_mua` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `ma_gh` int(11) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `so_luong` float NOT NULL,
  `tong_tien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`ma_gh`, `ma_hh`, `ma_kh`, `so_luong`, `tong_tien`) VALUES
(7, 1, 2, 4, 48),
(8, 2, 2, 4, 88);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ma_hd` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `tong_gia` int(11) NOT NULL,
  `ngay_ban` date NOT NULL,
  `ma_nv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_kh` int(11) NOT NULL,
  `ten_kh` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `dia_chi` text COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `username` text COLLATE utf8_vietnamese_ci NOT NULL,
  `password` int(11) NOT NULL,
  `quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_kh`, `ten_kh`, `dia_chi`, `sdt`, `ngay_sinh`, `username`, `password`, `quyen`) VALUES
(1, 'nam', '456', 123, '0000-00-00', 'admin', 123, 0),
(2, 'vinh', '123', 123, '0000-00-00', 'hoang', 123, 1),
(3, 'tu', 'quan5', 123, '0000-00-00', 'tu', 123, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `ma_hh` int(11) NOT NULL,
  `ten_hh` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `ma_ncc` int(11) NOT NULL,
  `tt_hang` text COLLATE utf8_vietnamese_ci NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `ngay_cap_nhat` date NOT NULL,
  `hinhanh` text COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`ma_hh`, `ten_hh`, `ma_ncc`, `tt_hang`, `tinhtrang`, `so_luong`, `don_gia`, `ngay_cap_nhat`, `hinhanh`) VALUES
(1, 'jordan 1 bred toe', 1, 'mau do', 1, 10, 12, '0000-00-00', 'https://image.goat.com/crop/750/attachments/product_template_additional_pictures/images/010/122/782/original/316403_01.jpg.jpeg?1519362103'),
(2, 'nike x offwhite blazer', 1, 'mau vang', 1, 10, 22, '0000-00-00', 'data:image/jpeg;base64,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'),
(3, 'nike uptempo', 1, 'mau xanh duong', 1, 5, 5, '0000-00-00', 'data:image/jpeg;base64,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'),
(4, 'nike x supemer af1 black', 1, 'mau den', 0, 0, 8, '0000-00-00', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQEfmBdw8HuFH36ZcfrAniDDDNzERTGPTz0Ug&usqp=CAU'),
(6, 'nike x fear of god all white', 1, 'mau trang', 1, 20, 20, '0000-00-00', 'data:image/jpeg;base64,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'),
(7, 'Nike Travis Scott Air Force 1', 1, 'mau nau', 1, 2, 27, '0000-00-00', 'data:image/jpeg;base64,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');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ncc`
--

CREATE TABLE `ncc` (
  `ma_ncc` int(11) NOT NULL,
  `ten_ncc` text COLLATE utf8_vietnamese_ci NOT NULL,
  `dia_chi` text COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ncc`
--

INSERT INTO `ncc` (`ma_ncc`, `ten_ncc`, `dia_chi`) VALUES
(1, 'nike', 'us'),
(2, 'adidas', 'us'),
(3, 'nike', 'us'),
(4, 'adidas', 'us');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id_nv` int(11) NOT NULL,
  `ten_nv` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `chucvu` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `dia_chi` text COLLATE utf8_vietnamese_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `cmnd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id_nv`, `ten_nv`, `chucvu`, `sdt`, `dia_chi`, `ngay_sinh`, `cmnd`) VALUES
(1, 'nam', 'giamdoc', 123, 'avc', '0000-00-00', 123456),
(2, 'hoang', 'nhanvien', 123, 'avc', '0000-00-00', 123);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD KEY `ma_hd` (`ma_hd`),
  ADD KEY `ma_hh` (`ma_hh`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`ma_gh`),
  ADD KEY `ma_hh` (`ma_hh`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ma_hd`),
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `ma_nv` (`ma_nv`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_kh`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `ma_ncc` (`ma_ncc`);

--
-- Chỉ mục cho bảng `ncc`
--
ALTER TABLE `ncc`
  ADD PRIMARY KEY (`ma_ncc`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id_nv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `ma_gh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ma_hd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `ncc`
--
ALTER TABLE `ncc`
  MODIFY `ma_ncc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id_nv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`ma_hd`) REFERENCES `hoadon` (`ma_hd`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`ma_hh`) REFERENCES `kho` (`ma_hh`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `kho` (`ma_hh`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`ma_kh`) REFERENCES `khachhang` (`id_kh`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khachhang` (`id_kh`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`ma_nv`) REFERENCES `nhanvien` (`id_nv`);

--
-- Các ràng buộc cho bảng `kho`
--
ALTER TABLE `kho`
  ADD CONSTRAINT `kho_ibfk_1` FOREIGN KEY (`ma_ncc`) REFERENCES `ncc` (`ma_ncc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;