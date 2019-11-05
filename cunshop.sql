-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 02, 2018 lúc 12:08 AM
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
-- Cơ sở dữ liệu: `cunshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `Categoryid` int(11) NOT NULL,
  `Categoryname` varchar(30) NOT NULL,
  `Description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`Categoryid`, `Categoryname`, `Description`) VALUES
(1, 'Thuc an cho cho', 'Do cho cho'),
(2, 'Phu khien cho cho', 'Do cho cho'),
(3, 'Do dung cho cho', 'Do cho cho'),
(4, 'Thuc an cho meo', 'Do cho meo'),
(5, 'Phu khien cho meo', 'Do cho meo'),
(6, 'Do dung cho meo', 'Do cho meo'),
(7, 'Dich vu cat tia long', 'Dich Vu'),
(8, 'Dich vu tam spa', 'Dich vu'),
(9, 'Dich vu trong giu', 'Dich vu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `Custid` int(11) NOT NULL,
  `Fullname` varchar(60) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Postalcode` varchar(10) DEFAULT NULL,
  `City` varchar(30) NOT NULL,
  `Country` varchar(15) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Fax` varchar(15) DEFAULT NULL,
  `Tendangnhap` varchar(60) NOT NULL,
  `Password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`Custid`, `Fullname`, `Address`, `Postalcode`, `City`, `Country`, `Phone`, `Fax`, `Tendangnhap`, `Password`) VALUES
(1, 'Nguyen Van Tai', '12 Tran Binh', '100000', 'Ha Noi', 'Viet Nam', '0947285936', '0223-7834683', 'Taihoa', 2346124),
(2, 'Nguyen Van Tan', '46 Pham Van Dong', '700000', 'Ho Chi Minh', 'Viet Nam', '0987575673', '0223-7893214', 'Tanhai', 345677),
(3, 'Nguyen Van Phat', '52 Pham Van Dong', '500000', 'Nha Trang', 'Viet Nam', '0987734652', '0211-7712839', 'Phatdat', 21412354),
(4, 'Nguyen Van Loc', '13 Phu Dien', '550000', 'Da Nang', 'Viet Nam', '0982917494', '0781-7321989', 'Locphat', 8432785),
(5, 'Nguyen Van Phu', '54 Tran Duy Hung', '100000', 'Ha Noi', 'Viet Nam', '0987872382', '0981-6438924', 'Phucat', 356252),
(6, 'Nguyen Van Huong', '36 Nguyen Hoang', '900000', 'Phu si', 'Viet Nam', '0949073827', '0368-2784397', 'Huongthom', 3524542);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `Productid` int(11) NOT NULL,
  `Productname` varchar(40) NOT NULL,
  `Manufacturer` varchar(40) NOT NULL,
  `Unitprice` int(11) NOT NULL,
  `Images` varchar(40) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`Productid`, `Productname`, `Manufacturer`, `Unitprice`, `Images`, `Stock`, `Categoryid`) VALUES
(1, 'Royal Canin Bichon Frise', 'Royal Canin', 11111, 'img/Royal Canin Bichon Frise.jpg', 45, 1),
(2, 'Josera Josidog Agilo Sport', 'JOSERA PET FOODS', 1500000, 'img/Josera Josidog Agilo Sport.jpg', 30, 1),
(3, 'Golden con & MaxPower Golden Puppy', 'MAX POWER FOOD', 777, 'img/Golden con.jpg', 15, 1),
(4, 'Denim & Nylon Lead', 'HAND IN HAND', 1234, 'img/Denim & Nylon Lead.jpg', 37, 2),
(5, 'Ro mom mo vit', 'Aduck', 150000, 'img/Aduck.jpg', 12, 2),
(6, 'nha Go Cho cho', 'Home good', 450000, 'img/Nha go.jpg', 47, 3),
(7, 'nha Go cho meo', 'Home good', 45000, 'img/Nha go.jpg', 47, 6),
(9, 'Jinny Salmon', 'TRIXIE', 1500000, 'img/Jinny Salmon.jpg', 30, 4),
(15, 'Ghe sofa', 'Royal Canin', 1500000, 'Nhan giat do', 234, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Categoryid`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Custid`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD UNIQUE KEY `Tendangnhap` (`Tendangnhap`),
  ADD UNIQUE KEY `Password` (`Password`),
  ADD UNIQUE KEY `Fax` (`Fax`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Productid`),
  ADD KEY `Categoryid` (`Categoryid`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Categoryid`) REFERENCES `category` (`Categoryid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
