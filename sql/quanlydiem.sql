-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 29, 2019 lúc 10:52 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydiem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `day`
--

CREATE TABLE `day` (
  `MaDayHoc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MaMonHoc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Magv` int(6) NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocKy` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MoTaPhanCong` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `day`
--

INSERT INTO `day` (`MaDayHoc`, `MaMonHoc`, `Magv`, `MaLopHoc`, `MaHocKy`, `MoTaPhanCong`) VALUES
('001', 'T', 1010, '59TH1', '12016', 'day');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `MaDiem` int(6) NOT NULL,
  `MaHocKy` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MaMonHoc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Masv` int(6) NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Diemchuyencan` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Diemktgiuaky` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `DiemTH` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `DiemQT` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Diemthikt` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Diemtongket` float NOT NULL,
  `DiemChu` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`MaDiem`, `MaHocKy`, `MaMonHoc`, `Masv`, `MaLopHoc`, `Diemchuyencan`, `Diemktgiuaky`, `DiemTH`, `DiemQT`, `Diemthikt`, `Diemtongket`, `DiemChu`) VALUES
(2, '12016', 'T', 2, '59TH1', '7', '7', '7', '7', '7', 7, 'B'),
(3, '12016', 'T', 3, '59TH1', '6', '6', '6', '6', '6', 6, 'C');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `Magv` int(4) NOT NULL,
  `MaMonHoc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Makhoa` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tengv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `hocvi` varchar(29) COLLATE utf8_unicode_ci NOT NULL,
  `passwordgv` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`Magv`, `MaMonHoc`, `Makhoa`, `Tengv`, `DiaChi`, `SDT`, `hocvi`, `passwordgv`) VALUES
(1010, 'T', NULL, 'Lê Thị Ngọc Hân', 'Hà Nội          ', '01226156288', '', '123456'),
(1012, 'A', NULL, 'Đinh Thị Ngoc Diệp', 'Hà Nội      ', '0190919008', '', '123456'),
(1501, 'S', NULL, 'Trần Thị Ngọc Sử', 'Hà Nội\r\n   ', '05167654156', '', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocky`
--

CREATE TABLE `hocky` (
  `MaHocKy` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenHocKy` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `HeSoHK` int(1) NOT NULL,
  `NamHoc` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocky`
--

INSERT INTO `hocky` (`MaHocKy`, `TenHocKy`, `HeSoHK`, `NamHoc`) VALUES
('12016', '2016-2017', 1, '2016-2017'),
('12017', '2017-2018', 1, '2017-2018');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `Makhoa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Tenkhoa` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Tenlophoc` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`MaLopHoc`, `Tenlophoc`) VALUES
('59KT1', '59KT1'),
('59PM1', '59PM1'),
('59PM2', '59PM2'),
('59TH1', '59TH1'),
('59TH2', '59TH2'),
('60KT1', '60KT1'),
('60PM1', '60PM1'),
('60TH1', '60TH1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMonHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenMonHoc` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `SoTiet` int(20) NOT NULL,
  `Sotinchi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`MaMonHoc`, `TenMonHoc`, `SoTiet`, `Sotinchi`) VALUES
('A', 'Tiếng Anh 1', 60, 2),
('CTDLGT', 'Cấu trúc dữ liệu và giải thuật', 60, 3),
('H', 'Pháp Luật đại cương', 60, 3),
('LTTT11', 'Lý Thuyết Tính Toán', 60, 3),
('S', 'Công Nghệ Web', 60, 3),
('T', 'Phân Tích Thiết kế hệ thống thông tin', 60, 3),
('TA2', 'Tiếng Anh 2', 50, 3),
('TA3', 'Tiếng Anh 3', 60, 3),
('Ti', 'Tin Học Đại Cương', 60, 3),
('TN', 'Mạng Máy Tính', 60, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `Masv` int(6) NOT NULL,
  `MaLopHoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Makhoa` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tensv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `noisinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dantoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hotencha` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hotenme` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `passwordsv` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`Masv`, `MaLopHoc`, `Makhoa`, `Tensv`, `GioiTinh`, `NgaySinh`, `noisinh`, `dantoc`, `hotencha`, `hotenme`, `passwordsv`) VALUES
(0, '59KT1', NULL, 'Lê văn A', 'Nam', '2000-01-10', 'thanh hóa', 'kinh', 'Lê văn B', 'Nguyễn thị C', 'e10adc3949ba59abbe56e057f20f883e'),
(1, '59KT1', NULL, 'Nguyễn Tuấn Linh', 'Nam', '1999-01-05', 'thanh hóa', 'kinh', 'Lê văn B', 'Nguyễn thị C', '123456'),
(2, '59TH1', NULL, 'Trần Quang Huy', 'Nam', '1999-09-11', 'Thái Bình', 'kinh', 'Lê văn B', 'Nguyễn thị C', 'e10adc3949ba59abbe56e057f20f883e'),
(3, '59TH1', NULL, 'Lê Văn Nam', 'Nam', '1999-01-05', 'Hà Nội', 'kinh', 'Lê văn B', 'Nguyễn thị C', 'e10adc3949ba59abbe56e057f20f883e'),
(4, '59KT1', NULL, 'Nguyễn Tuấn Vũ', 'Nam', '1998-11-12', 'Hà Nội', 'kinh', 'Lê văn B', 'Nguyễn thị C', '25f9e794323b453885f5181f1b624d0b'),
(5, '59PM1', NULL, 'Lê Đức Anh', 'Nam', '1998-09-11', 'Thái Bình', 'kinh', 'Lê văn B', 'Nguyễn thị C', 'e10adc3949ba59abbe56e057f20f883e'),
(6, '59PM2', NULL, 'Trần Thị Ánh', 'Nữ', '1999-02-03', 'Hà Nội', 'kinh', 'Lê văn B', 'Nguyễn thị C', 'e10adc3949ba59abbe56e057f20f883e'),
(8, '59KT1', NULL, 'Lê văn A', 'Nam', '1999-02-03', 'thanh hóa', 'kinh', 'Lê văn B', 'Nguyễn thị C', 'e10adc3949ba59abbe56e057f20f883e'),
(9, '59KT1', NULL, 'Lê văn A', 'Nam', '1999-02-03', 'thanh hóa', 'kinh', 'Lê văn B', 'Nguyễn thị C', 'e10adc3949ba59abbe56e057f20f883e'),
(10, '59KT1', NULL, 'Lê văn A', 'Nam', '1999-08-08', 'Hà Nội', 'kinh', 'Lê văn B', 'Nguyễn thị C', 'e10adc3949ba59abbe56e057f20f883e'),
(11, '59KT1', NULL, 'Lê văn A', 'Nam', '1998-01-01', 'Hà Nội', 'kinh', 'Lê văn B', 'Nguyễn thị C', 'e10adc3949ba59abbe56e057f20f883e'),
(12, '60PM1', NULL, 'Lê văn A', 'Nam', '2000-02-03', 'thanh hóa', 'kinh', 'Lê văn B', 'Nguyễn thị C', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userid` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `level`) VALUES
(1, 'linh123', '123456', 1),
(2, 'huy123', '123456', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`MaDayHoc`),
  ADD KEY `fk_day_monhoc` (`MaMonHoc`),
  ADD KEY `fk_day_gv` (`Magv`),
  ADD KEY `fk_day_hocky` (`MaHocKy`),
  ADD KEY `fk_day_lophoc` (`MaLopHoc`);

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`MaDiem`),
  ADD KEY `fk_diem_mahk` (`MaHocKy`),
  ADD KEY `fk_diem_monhoc` (`MaMonHoc`),
  ADD KEY `MaLopHoc` (`MaLopHoc`),
  ADD KEY `fk_diem_sinhvien` (`Masv`) USING BTREE;

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`Magv`),
  ADD UNIQUE KEY `SDT` (`SDT`),
  ADD KEY `fk_gv_mh` (`MaMonHoc`),
  ADD KEY `fk_gv_kh` (`Makhoa`);

--
-- Chỉ mục cho bảng `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`MaHocKy`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`Makhoa`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`MaLopHoc`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMonHoc`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`Masv`),
  ADD KEY `fk_sv_lh` (`MaLopHoc`) USING BTREE,
  ADD KEY `Makhoa` (`Makhoa`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `diem`
--
ALTER TABLE `diem`
  MODIFY `MaDiem` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `day`
--
ALTER TABLE `day`
  ADD CONSTRAINT `fk_day_gv` FOREIGN KEY (`Magv`) REFERENCES `giangvien` (`Magv`),
  ADD CONSTRAINT `fk_day_hocky` FOREIGN KEY (`MaHocKy`) REFERENCES `hocky` (`MaHocKy`),
  ADD CONSTRAINT `fk_day_lophoc` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`),
  ADD CONSTRAINT `fk_day_monhoc` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`);

--
-- Các ràng buộc cho bảng `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`),
  ADD CONSTRAINT `fk_diem_hocsinh` FOREIGN KEY (`Masv`) REFERENCES `sinhvien` (`Masv`),
  ADD CONSTRAINT `fk_diem_mahk` FOREIGN KEY (`MaHocKy`) REFERENCES `hocky` (`MaHocKy`),
  ADD CONSTRAINT `fk_diem_monhoc` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`);

--
-- Các ràng buộc cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `fk_gv_kh` FOREIGN KEY (`Makhoa`) REFERENCES `khoa` (`Makhoa`),
  ADD CONSTRAINT `fk_gv_mh` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`);

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `fk_hs_lh` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`),
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`Makhoa`) REFERENCES `khoa` (`Makhoa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
