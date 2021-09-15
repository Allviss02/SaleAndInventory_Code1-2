-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2021 at 06:44 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sale_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` varchar(20) NOT NULL,
  `Customer_Name` varchar(50) NOT NULL,
  `Tax_Code` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Person` varchar(50) NOT NULL,
  `Contact` varchar(50) NOT NULL,
  `Staff_ID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Customer_Name`, `Tax_Code`, `Address`, `Email`, `Phone`, `Person`, `Contact`, `Staff_ID`) VALUES
('A01', 'Hoang Long', '3700533721', 'Đường số 1, KCN Tân Đông Hiệp B, Phường Tân Đông Hiệp, Thành phố Dĩ An, Tỉnh Bình Dương', 'ctyhoanglong@gmail.com', '06503729115', 'Thanh Tuyen', '0988488577', 'HR01'),
('A02', 'Van Sanh', '0303264280', '616 Quốc lộ 1A, Khu phố 5, Phường Bình Hưng Hòa B, Quận Bình Tân, Hồ Chí Minh', 'vasafeed@gmail.com', '0837501393', 'Binh Minh', '0889977661', 'HR01'),
('A03', 'Cargill', '0303784292', '616 Quốc lộ 1A, Khu phố 5, Phường Bình Hưng Hòa B, Huyen Trang Bom, Dong Nai', 'cargill@gmail.com', '0838989393', 'Toan Khanh', '0889977008', 'HR02'),
('A04', 'Masan', '0303576603', 'Tầng 8, Central Plaza 17 Lê Duẩn-Quận 1-TP. Hồ Chí Minh', 'investorrelation@masangroup.com', '02862563862', 'Thang Pham', '0389786744', 'HR08');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderDetail_ID` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Delivery_Date` date NOT NULL,
  `Amount` int(11) NOT NULL,
  `Delivery_Status` varchar(50) DEFAULT NULL,
  `Product_ID` varchar(20) DEFAULT NULL,
  `OrderMaster_ID` varchar(20) DEFAULT NULL,
  `Invoice` varchar(20) DEFAULT NULL,
  `Warehouse` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrderDetail_ID`, `Quantity`, `Delivery_Date`, `Amount`, `Delivery_Status`, `Product_ID`, `OrderMaster_ID`, `Invoice`, `Warehouse`) VALUES
('OD01', 20000, '2021-06-01', 640000000, NULL, 'P02', 'OM01', NULL, NULL),
('OD02', 20000, '2021-09-15', 600000000, 'done', 'P03', 'OM02', 'VS001', 'WH03 and WH04'),
('OD03', 5000, '2021-09-20', 160000000, 'prepare', 'P02', 'OM02', NULL, 'WH01'),
('OD04', 10000, '2021-09-16', 300000000, NULL, 'P03', 'OM03', NULL, NULL),
('OD05', 10000, '2021-09-15', 300000000, NULL, 'P04', 'OM04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordermaster`
--

CREATE TABLE `ordermaster` (
  `OrderMaster_ID` varchar(20) NOT NULL,
  `OrderMaster_Date` datetime NOT NULL,
  `Approval` varchar(100) DEFAULT NULL,
  `Total_Amount` int(11) NOT NULL,
  `Customer_ID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordermaster`
--

INSERT INTO `ordermaster` (`OrderMaster_ID`, `OrderMaster_Date`, `Approval`, `Total_Amount`, `Customer_ID`) VALUES
('OM01', '2021-05-23 10:30:35', 'pending', 640000000, 'A01'),
('OM02', '2021-09-11 17:00:32', 'approval', 760000000, 'A02'),
('OM03', '2021-09-13 10:51:18', 'pending', 300000000, 'A04'),
('OM04', '2021-09-13 11:00:27', 'approval', 300000000, 'A03');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` varchar(20) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Packing` varchar(50) NOT NULL,
  `Supplier` varchar(100) NOT NULL,
  `Origin` varchar(50) NOT NULL,
  `Selling_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Packing`, `Supplier`, `Origin`, `Selling_Price`) VALUES
('P01', 'Lactose', '25kg', 'Polmlek', 'Poland', 32000),
('P02', 'Lactose', '25kg', 'Mullins', 'USA', 32000),
('P03', 'Whey', '25kg', 'Mullins', 'USA', 30000),
('P04', 'Whey', '25kg', 'Proliant', 'Holland', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `Receipt_ID` varchar(20) NOT NULL,
  `Receipt_Date` datetime NOT NULL,
  `Purchasing_Order` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`Receipt_ID`, `Receipt_Date`, `Purchasing_Order`) VALUES
('Receipt01', '2021-08-20 07:34:19', 'PO001'),
('Receipt02', '2021-08-29 10:34:19', 'PO002'),
('Receipt03', '2021-09-14 13:22:03', 'PO003');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Role_ID` varchar(20) NOT NULL,
  `Role_Name` varchar(50) NOT NULL,
  `Description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Role_ID`, `Role_Name`, `Description`) VALUES
('A01', 'Accountant', NULL),
('A02', 'General Accountant', NULL),
('AD01', 'Admin', NULL),
('L01', 'Logistics Executive', NULL),
('L02', 'Logistics Manager', NULL),
('S01', 'Sale Executive', NULL),
('S02', 'Sale Manager', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` varchar(20) NOT NULL,
  `Staff_Name` varchar(50) NOT NULL,
  `Staff_Email` varchar(50) NOT NULL,
  `Staff_Phone` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Manager_ID` varchar(20) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Role_ID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Staff_Name`, `Staff_Email`, `Staff_Phone`, `Department`, `Manager_ID`, `Password`, `Role_ID`) VALUES
('HR01', 'Le Chau Hoang Nhut', 'nhutlchts2009030@fpt.edu.vn', '0976419792', 'Sale', 'HR02', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'S01'),
('HR02', 'Nguyen Van Khanh', 'vankhanh@gmail.com', '0789123573', 'Sale', 'HR11', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'S02'),
('HR03', 'Ly A Bang', 'abang@gmail.com', '0789100373', 'Accounting', 'HR04', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'A01'),
('HR04', 'Chung Van Nghe', 'vannghe@gmail.com', '0789123803', 'Accounting', 'HR11', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'A02'),
('HR05', 'Nguyen Thu Thao', 'thuthao@gmail.com', '0789454573', 'Logistics', 'HR06', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'L01'),
('HR06', 'Tran The Lam', 'thelam@gmail.com', '0790124573', 'Logistics', 'HR11', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'L02'),
('HR07', 'Nguyen Ai Vy', 'aivy@gmail.com', '0787823573', 'Admin', 'HR11', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'AD01'),
('HR08', 'Ly Vinh Phu', 'vinhphu@gmail.com', '0911678456', 'Sale', 'HR02', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'S01'),
('HR09', 'Nguyen Di Thai', 'dithai@gmail.com', '0988152376', 'Sale', 'HR02', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'S01');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `Warehouse_ID` varchar(20) NOT NULL,
  `Product_ID` varchar(20) DEFAULT NULL,
  `Receipt_ID` varchar(20) DEFAULT NULL,
  `Receipt_Quantity` int(10) NOT NULL,
  `Lot_Number` varchar(50) NOT NULL,
  `Production_Date` date NOT NULL,
  `Expiration_Date` date NOT NULL,
  `Pending` int(10) NOT NULL,
  `Selling` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`Warehouse_ID`, `Product_ID`, `Receipt_ID`, `Receipt_Quantity`, `Lot_Number`, `Production_Date`, `Expiration_Date`, `Pending`, `Selling`) VALUES
('WH01', 'P01', 'Receipt01', 10000, 'Lot011', '2021-05-20', '2022-04-20', 5000, 0),
('WH02', 'P02', 'Receipt01', 20000, 'Lot031', '2021-05-20', '2022-04-20', 0, 0),
('WH03', 'P03', 'Receipt02', 10000, 'Lot011', '2021-05-20', '2022-04-20', 10000, 0),
('WH04', 'P04', 'Receipt02', 20000, 'Lot031', '2021-05-20', '2022-04-20', 10000, 0),
('WH05', 'P01', 'Receipt02', 20000, 'Lot331', '2021-05-20', '2022-04-20', 0, 0),
('WH06', 'P03', 'Receipt03', 20000, 'LA0933', '2021-06-14', '2022-06-13', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`),
  ADD KEY `Staff_ID` (`Staff_ID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderDetail_ID`),
  ADD KEY `Product_ID` (`Product_ID`),
  ADD KEY `OrderMaster_ID` (`OrderMaster_ID`);

--
-- Indexes for table `ordermaster`
--
ALTER TABLE `ordermaster`
  ADD PRIMARY KEY (`OrderMaster_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`Receipt_ID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Role_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`),
  ADD KEY `Role_ID` (`Role_ID`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`Warehouse_ID`),
  ADD KEY `Product_ID` (`Product_ID`),
  ADD KEY `Receipt_ID` (`Receipt_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`Staff_ID`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`OrderMaster_ID`) REFERENCES `ordermaster` (`OrderMaster_ID`);

--
-- Constraints for table `ordermaster`
--
ALTER TABLE `ordermaster`
  ADD CONSTRAINT `ordermaster_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Role_ID`) REFERENCES `role` (`Role_ID`);

--
-- Constraints for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD CONSTRAINT `warehouse_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`),
  ADD CONSTRAINT `warehouse_ibfk_2` FOREIGN KEY (`Receipt_ID`) REFERENCES `receipt` (`Receipt_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
