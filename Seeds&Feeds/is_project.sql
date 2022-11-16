-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 06:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `is_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_farmers`
--

CREATE TABLE `tbl_farmers` (
  `farmer_id` int(10) NOT NULL,
  `farmer_name` varchar(100) NOT NULL,
  `farmer_email` varchar(100) NOT NULL,
  `farmer_phone` varchar(100) NOT NULL,
  `farmer_password` varchar(100) NOT NULL,
  `farmer_address` varchar(100) DEFAULT NULL,
  `farmer_city` varchar(100) DEFAULT NULL,
  `farmer_country` varchar(100) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_farmers`
--

INSERT INTO `tbl_farmers` (`farmer_id`, `farmer_name`, `farmer_email`, `farmer_phone`, `farmer_password`, `farmer_address`, `farmer_city`, `farmer_country`, `latitude`, `longitude`) VALUES
(1, 'Prachin Jayeshkumar Patel', 'prachin.p@yahoo.com', '0723456798', '$2y$10$ovVSB9IZeewZjYN8w0IoqOfT4j/gF1kJJHTzYdc.fqyvaPi8spHi.', 'Kodi Rd Estate, Gandhi Avenue, Nairobi West', 'Nairobi', 'Kenya', -1.30742, 36.8226),
(2, 'Chandler Bing', 'chan@yahoo.com', '0722867426', '$2y$10$5poTO/9Wy53DM6p9xHaXmO5LG1louVXsvObhc9mQzIloJvlU7j.ma', 'Sunugra Road, South C', 'Nairobi', 'Kenya', -1.30742, 38.82),
(3, 'Monica Geller', 'monica@outlook.com', '0713967483', '$2y$10$xmEpnAfJOUCVpevz6/.jbeZrBhkOh1Txq4GZKBF7DtA6CqmcdKvYm', NULL, NULL, NULL, NULL, NULL),
(4, 'Prachi Patel', 'prachi.pjp@outlook.com', '0734590812', '$2y$10$BoyS5Kg/VurtJeCNFlhe.eDfoB0G3TJc5hxvWckQ9zPt8lSSdPVLu', NULL, NULL, NULL, NULL, NULL),
(5, 'Prachi Patel', 'prachi.p@yahoo.com', '0797039969', '$2y$10$aVlQDYo77vvX.FtjuMdvs.RTFa12lmmK/UUCI9fkaRxpQ.sLhTb4i', 'Canon Awori Street', 'Kakamega', 'Kenya', 0.416918, 34.6635),
(7, 'Elizabeth Geller', 'eliza@yahoo.com', '0733584945', '$2y$10$r8auFf/XSGRvT.w0Fp8YfuHgfO2b4ZDzzryvopOZECnADq2yCdsKC', 'Strathmore University', 'Nairobi', 'Kenya', -1.30933, 36.8125);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_farminput`
--

CREATE TABLE `tbl_farminput` (
  `farminput_id` int(10) NOT NULL,
  `farmer_id` int(10) NOT NULL,
  `input_id` int(10) NOT NULL,
  `quantity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_farminput`
--

INSERT INTO `tbl_farminput` (`farminput_id`, `farmer_id`, `input_id`, `quantity`) VALUES
(1, 1, 2, '2'),
(2, 1, 1, '1'),
(3, 1, 3, '10'),
(4, 1, 1, '2'),
(5, 5, 2, '2'),
(6, 5, 4, '1'),
(7, 5, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_farmproduce`
--

CREATE TABLE `tbl_farmproduce` (
  `produce_id` int(10) NOT NULL,
  `farmer_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `produce_stock` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_farmproduce`
--

INSERT INTO `tbl_farmproduce` (`produce_id`, `farmer_id`, `name`, `desc`, `produce_stock`, `unit`, `price`, `image`) VALUES
(1, 3, 'Tea ', 'Freshly harvested tea leaves', '50', 'Kg', 1000, 'tea.jpg'),
(2, 2, 'Milk', 'Full cream ', '50', 'litre', 70, 'milk.jpg'),
(4, 1, 'Coffee', 'Black', '70', 'Kg', 450, 'coffee.jpg'),
(5, 5, 'Sunflower', 'Freshly harvested', '50', 'Kg', 800, 'flower.jpg'),
(6, 5, 'Cofee', 'Black', '50', 'Kg', 450, 'coffee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inputorderdetails`
--

CREATE TABLE `tbl_inputorderdetails` (
  `inputorderdetails_id` int(10) NOT NULL,
  `inputorder_id` int(10) NOT NULL,
  `input_id` int(10) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inputorderdetails`
--

INSERT INTO `tbl_inputorderdetails` (`inputorderdetails_id`, `inputorder_id`, `input_id`, `quantity`, `total`) VALUES
(14, 6, 2, '2', '2000'),
(15, 6, 1, '1', '700000'),
(16, 6, 3, '10', '450'),
(17, 7, 1, '2', '1400000'),
(18, 8, 2, '2', '2000'),
(19, 8, 4, '1', '3000'),
(20, 9, 2, '1', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inputorders`
--

CREATE TABLE `tbl_inputorders` (
  `inputorder_id` int(10) NOT NULL,
  `farmer_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `payment_detail` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inputorders`
--

INSERT INTO `tbl_inputorders` (`inputorder_id`, `farmer_id`, `user_id`, `amount`, `status`, `payment_detail`) VALUES
(6, 1, 4, '702450', 'Processing', 14),
(7, 1, 1, '1400000', 'Processing', 18),
(8, 5, 4, '5000', 'Processing', 19),
(9, 5, 4, '1000', 'Processing', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inputs`
--

CREATE TABLE `tbl_inputs` (
  `input_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `unit` varchar(500) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inputs`
--

INSERT INTO `tbl_inputs` (`input_id`, `name`, `user_id`, `desc`, `unit`, `price`, `image`) VALUES
(1, 'Tractor', 1, 'Honda', 'Piece(s)', '700000', 'tractor.jpg'),
(2, 'Hay', 4, 'Premium Quality', 'Bale', '1000', 'hay.jpg'),
(3, 'Spinach Seeds', 5, 'Simlaw', 'Packet', '45', '5e9f56422457d.webp'),
(4, 'Fertilizer', 3, 'DAP', '10 KG', '3000', 'dap.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetails`
--

CREATE TABLE `tbl_orderdetails` (
  `orderdetail_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `produce_id` int(10) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orderdetails`
--

INSERT INTO `tbl_orderdetails` (`orderdetail_id`, `order_id`, `produce_id`, `quantity`, `total`) VALUES
(3, 6, 2, '3', '210'),
(4, 7, 1, '4', '4000'),
(5, 8, 2, '2', '140'),
(6, 9, 6, '1', '450'),
(7, 0, 2, '2', '140'),
(8, 0, 4, '1', '450'),
(9, 0, 5, '1', '800');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(10) NOT NULL,
  `farmer_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `payment_detail` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `farmer_id`, `user_id`, `amount`, `status`, `payment_detail`) VALUES
(3, 1, 2, '210', 'Processing', 15),
(7, 3, 1, '4000', 'Processing', 16),
(8, 1, 1, '140', 'Processing', 17),
(9, 5, 4, '450', 'Processing', 20),
(10, 2, 4, '1390', 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paymentdetails`
--

CREATE TABLE `tbl_paymentdetails` (
  `paymentdetail_id` int(10) NOT NULL,
  `shippingdetail_id` int(10) NOT NULL,
  `inputorder_id` int(10) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL,
  `paymentdetails` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_paymentdetails`
--

INSERT INTO `tbl_paymentdetails` (`paymentdetail_id`, `shippingdetail_id`, `inputorder_id`, `order_id`, `paymentdetails`) VALUES
(14, 18, 18, NULL, 'PE234789'),
(15, 19, NULL, 3, 'PQ799467'),
(16, 20, 7, NULL, 'PO786435'),
(17, 21, 8, NULL, 'PQ35532'),
(18, 22, NULL, 22, 'PK839485'),
(19, 23, NULL, 23, 'PO897654'),
(20, 24, 9, NULL, 'PR237484'),
(21, 26, NULL, 26, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requests`
--

CREATE TABLE `tbl_requests` (
  `request_id` int(10) NOT NULL,
  `farmer_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `message` varchar(100) NOT NULL,
  `visit` varchar(100) NOT NULL,
  `visit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_requests`
--

INSERT INTO `tbl_requests` (`request_id`, `farmer_id`, `user_id`, `message`, `visit`, `visit_date`) VALUES
(1, 3, 3, 'My cow is pregnant', 'Visited', '2022-07-21'),
(2, 3, 3, 'My dog is sick', 'Pending', '2022-07-29'),
(3, 1, 2, 'My hen is producing yellow eggs', 'Pending', '2022-07-30'),
(4, 5, 5, 'My cow is experiencing trouble', 'Visited', '2022-07-30'),
(5, 5, 5, 'My hen is producing pale eggs', 'Scheduled', '2022-07-30'),
(6, 7, 6, 'Would you please check my dog? She is bleeding', 'Pending', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(10) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`) VALUES
(1, 'Inputs Seller'),
(2, 'Produce Buyer'),
(3, 'Veterinarian');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shippingdetails`
--

CREATE TABLE `tbl_shippingdetails` (
  `shippingdetail_id` int(10) NOT NULL,
  `inputorder_id` int(10) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shippingdetails`
--

INSERT INTO `tbl_shippingdetails` (`shippingdetail_id`, `inputorder_id`, `order_id`, `name`, `phone`, `email`, `street`, `city`, `country`) VALUES
(18, 6, NULL, 'Chandler Bing', '0745689238', 'chan@yahoo.com', 'Kodi Rd Estate, Gandhi Avenue, Nairobi West', 'Nairobi', 'Kenya'),
(19, NULL, 3, 'Prachi Jayeshkumar Patel', '0797039969', 'prachi.p@yahoo.com', 'Apartment 20, Street 1', 'Washington DC', 'USA'),
(20, NULL, 7, 'Kamau Njoroge', '0723946593', 'kamau@gmail.com', 'Tom Mboya Street', 'Nairobi', ''),
(21, NULL, 8, 'Kamau Njoroge', '0735485932', 'kamau@gmail.com', 'Tom Mboya Street', 'Nairobi', ''),
(22, 7, NULL, 'Prachin Patel', '0723459043', 'prachin.p@yahoo.com', 'Apartment 20, Street 1', 'Kisumu', ''),
(23, 8, NULL, 'Prachi Jayeshkumar Patel', '0797039969', 'prachi.p@yahoo.com', 'Nairobi West', 'Nairobi', 'Kenya'),
(24, NULL, 9, 'Prachi Jayeshkumar Patel', '0797039969', 'prachi.p@yahoo.com', 'Nairobi West', 'Nairobi', ''),
(25, NULL, 10, 'Prachi Jayeshkumar Patel', '254797039969', 'prachi.p@yahoo.com', 'Apartment 20, Street 1', 'Nairobi', ''),
(26, 9, NULL, '', '', '', '', '', 'Kenya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `role_id` int(10) NOT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `password`, `address`, `city`, `country`, `role_id`, `latitude`, `longitude`) VALUES
(1, 'Kamau', 'Njoroge', 'kamau@gmail.com', '0732456789', '$2y$10$LrBf4u3x3mCXbLZaF8thRuHqsjOsX5tA9cgT74V/9gSQRXVtp9i6.', 'Tom Mboya Street, Nairobi CBD', 'Nairobi', 'Kenya', 2, -1.28363, 36.8251),
(2, 'Prachi', 'Patel', 'prachi.pjp@yahoo.com', '783456789', '$2y$10$LrBf4u3x3mCXbLZaF8thRuHqsjOsX5tA9cgT74V/9gSQRXVtp9i6.', 'Kodi Rd Estate, Gandhi Avenue, Nairobi West', 'Nairobi', 'Kenya', 3, -1.30742, 36.8226),
(3, 'James', 'Mujimba', 'james@gmail.com', '723456789', '$2y$10$kZ6ABsPBnnD5g1KQ2.jxZefLhpblobqlQUi37MO6Y8gGFnyzyBHFC', 'Near Giraffe Center, Karen', 'Nairobi', 'Kenya', 1, -1.37636, 36.7443),
(4, 'Kevin', 'Hartz', 'kevin@yahoo.com', '728464843', '$2y$10$xLbVudiYMNqzqRf.JQXwWebt28jq6K/hbI4OtWABig4ELFAeAzR5O', 'Condele', 'Kisumu', 'Kenya', 2, -0.0786108, 34.7768),
(5, 'Phoebe', 'Buffay', 'phoebe@outlook.com', '724695478', '$2y$10$4oHyIejKdeJvzwjM1XGL8.dEC3MoVkUaY4jxmbzC8RkYZwPq.MpAi', 'Mombasa Road', 'Nairobi', 'Kenya', 3, -1.36576, 36.9123),
(6, 'Rebecca', 'Abrahaam', 'rebecca@gmail.com', '723569508', '$2y$10$WmOL9jjPn3DWpZeQdV7HHOcEaTt5K0.u/Nvt/nn7FPwxYLf3rUdli', 'Kaplong-Narok-Maai Road', 'Narok', 'Kenya', 3, -1.09342, 35.8696);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_farmers`
--
ALTER TABLE `tbl_farmers`
  ADD PRIMARY KEY (`farmer_id`);

--
-- Indexes for table `tbl_farminput`
--
ALTER TABLE `tbl_farminput`
  ADD PRIMARY KEY (`farminput_id`),
  ADD KEY `farmer_id` (`farmer_id`),
  ADD KEY `input_id` (`input_id`);

--
-- Indexes for table `tbl_farmproduce`
--
ALTER TABLE `tbl_farmproduce`
  ADD PRIMARY KEY (`produce_id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `tbl_inputorderdetails`
--
ALTER TABLE `tbl_inputorderdetails`
  ADD PRIMARY KEY (`inputorderdetails_id`),
  ADD KEY `input_id` (`input_id`),
  ADD KEY `inputorder_id` (`inputorder_id`);

--
-- Indexes for table `tbl_inputorders`
--
ALTER TABLE `tbl_inputorders`
  ADD PRIMARY KEY (`inputorder_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `farmer_id` (`farmer_id`),
  ADD KEY `payment_detail` (`payment_detail`);

--
-- Indexes for table `tbl_inputs`
--
ALTER TABLE `tbl_inputs`
  ADD PRIMARY KEY (`input_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  ADD PRIMARY KEY (`orderdetail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `produce_id` (`produce_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `farmer_id` (`farmer_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_detail` (`payment_detail`);

--
-- Indexes for table `tbl_paymentdetails`
--
ALTER TABLE `tbl_paymentdetails`
  ADD PRIMARY KEY (`paymentdetail_id`),
  ADD KEY `shippingdetail_id` (`shippingdetail_id`);

--
-- Indexes for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `farmer_id` (`farmer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_shippingdetails`
--
ALTER TABLE `tbl_shippingdetails`
  ADD PRIMARY KEY (`shippingdetail_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_farmers`
--
ALTER TABLE `tbl_farmers`
  MODIFY `farmer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_farminput`
--
ALTER TABLE `tbl_farminput`
  MODIFY `farminput_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_farmproduce`
--
ALTER TABLE `tbl_farmproduce`
  MODIFY `produce_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_inputorderdetails`
--
ALTER TABLE `tbl_inputorderdetails`
  MODIFY `inputorderdetails_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_inputorders`
--
ALTER TABLE `tbl_inputorders`
  MODIFY `inputorder_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_inputs`
--
ALTER TABLE `tbl_inputs`
  MODIFY `input_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  MODIFY `orderdetail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_paymentdetails`
--
ALTER TABLE `tbl_paymentdetails`
  MODIFY `paymentdetail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_shippingdetails`
--
ALTER TABLE `tbl_shippingdetails`
  MODIFY `shippingdetail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
