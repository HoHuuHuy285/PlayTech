-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 04:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tshirt_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `LoaiSp` varchar(64) NOT NULL,
  `MoTa` varchar(64) NOT NULL,
  `Icon` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `LoaiSp`, `MoTa`, `Icon`) VALUES
(1, 'Mouse', 'Chuột Gaming không giây ', '<i class=\"bi bi-mouse-fill\" style=\"margin-bottom: 7px;\"></i>'),
(16, 'KeyBoard', 'Bàn Phím đầy đủ ', '<i class=\'bx bxs-keyboard\'></i>'),
(17, 'HeadPhone', 'Tai Nghe', '<i class=\'bx bx-joystick-alt\'></i>'),
(29, 'Joystick', 'Tay Cầm PS4', '<i class=\'bx bx-joystick-alt\'></i>');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `total_price` float(6,2) NOT NULL DEFAULT 0.00,
  `order_status` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `email`, `address`, `address2`, `country`, `state`, `zipcode`, `total_price`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 'Ahsan', 'Zameer', 'ahsnzmeerkhan@gmail.com', 'L-14 Gulshan-e-Malir, Malir Halt Karachi', 'L-14 Gulshan-e-Malir, Malir Halt Karachi', 'United States', 'California', '75210', 120.00, 'confirmed', '2021-02-15 11:16:10', '2021-02-15 11:16:10'),
(2, 'Ahsan', 'Zameer', 'ahsnzmeerkhan@gmail.com', 'L-14 Gulshan-e-Malir, Malir Halt Karachi', 'L-14 Gulshan-e-Malir, Malir Halt Karachi', 'United States', 'California', '75210', 0.00, 'confirmed', '2021-02-15 11:18:47', '2021-02-15 11:18:47'),
(3, 'Ahsan', 'Zameer', 'ahsnzmeerkhan@gmail.com', 'L-14 Gulshan-e-Malir, Malir Halt Karachi', 'L-14 Gulshan-e-Malir, Malir Halt Karachi', 'United States', 'California', '75210', 114.00, 'confirmed', '2021-02-15 11:21:50', '2021-02-15 11:21:50'),
(4, 'Ho', 'Huy', 'huy.ho210215@gmail.com', '397 Nguyen Luong Bang', '397 Nguyen Luong Bang', 'United States', 'California', '159', 27.00, 'confirmed', '2023-06-18 10:53:42', '2023-06-18 10:53:42'),
(5, 'Thuan', 'Le', 'thuanle@gmail.com', 'HaiChau', 'HaiChau', 'United States', 'California', '13', 27.00, 'confirmed', '2023-06-18 11:40:31', '2023-06-18 11:40:31'),
(6, 'Minh', 'Quan', 'minhquan@gmail.com', '1', '1', 'United States', 'California', '223', 27.00, 'confirmed', '2023-06-18 11:41:37', '2023-06-18 11:41:37'),
(7, 'Khanh', 'Nguyen', 'KhanhNguyen@gmail.com', 'HoiAn', 'HoiAn', 'United States', 'California', '1234', 27.00, 'confirmed', '2023-06-18 12:11:39', '2023-06-18 12:11:39'),
(8, 'Mac', 'Van', 'technology@vnuk.edu.vn', 'VietNam', 'VietNam', 'United States', 'California', '876', 27.00, 'confirmed', '2023-06-18 12:12:52', '2023-06-18 12:12:52'),
(9, 'Test', 'Thu', 'thuanle@gmail.com', '397 Nguyen Luong Bang', '397 Nguyen Luong Bang', 'United States', 'California', '5555', 27.00, 'confirmed', '2023-06-18 12:13:39', '2023-06-18 12:13:39'),
(10, 'Ha', 'Ha', 'ba.thuoc.thanh.phong@gmail.com', '397 Nguyen Luong Bang', '397 Nguyen Luong Bang', 'United States', 'California', '3333', 27.00, 'confirmed', '2023-06-18 12:23:23', '2023-06-18 12:23:23'),
(11, 'Test', '2', 'test@gmail.com', '1234 main ST', '1234 main ST', 'United States', 'California', '853', 28.00, 'confirmed', '2023-06-19 04:07:00', '2023-06-19 04:07:00'),
(12, 'Nguoi Mua', '1', 'nguoi@gmail.com', 'dahfoas', 'dahfoas', 'United States', 'California', '2345', 49.00, 'confirmed', '2023-06-21 09:20:46', '2023-06-21 09:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_price` float(6,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_price` double(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `qty`, `total_price`) VALUES
(1, 3, 1, 'Black T-shirt', 10.00, 1, 9.50),
(2, 3, 3, 'Maroon T-shirt', 10.00, 5, 47.50),
(3, 3, 4, 'Orange T-shirt', 10.00, 6, 57.00),
(4, 4, 3, 'Maroon T-shirt', 27.00, 1, 27.00),
(5, 5, 3, 'Maroon T-shirt', 27.00, 1, 27.00),
(6, 6, 3, 'Maroon T-shirt', 27.00, 1, 27.00),
(7, 7, 3, 'Maroon T-shirt', 27.00, 1, 27.00),
(8, 8, 3, 'Maroon T-shirt', 27.00, 1, 27.00),
(9, 9, 3, 'Maroon T-shirt', 27.00, 1, 27.00),
(10, 10, 3, 'Maroon T-shirt', 27.00, 1, 27.00),
(11, 11, 7, 'Microsoft Bluetooth Ergonomic Mouse', 28.00, 1, 28.00),
(12, 12, 5, 'G402', 49.00, 1, 49.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `full_description` text DEFAULT NULL,
  `price` double(4,2) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_categorie` int(11) NOT NULL,
  `img` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `short_description`, `full_description`, `price`, `is_featured`, `is_active`, `created_at`, `updated_at`, `id_categorie`, `img`) VALUES
(2, 'Sony PS5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis suscipit esse ipsam officia. Quis sint nihil magnam explicabo veniam hic. Vitae nam iusto reiciendis ratione sed suscipit, aspernatur repudiandae.', '1111', 27.00, 1, 1, '2023-06-18 05:24:48', '2023-06-18 09:21:09', 29, 'Sony PS5.jpg'),
(3, 'Xbox Series X ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis suscipit esse ipsam officia. Quis sint nihil magnam explicabo veniam hic. Vitae nam iusto reiciendis ratione sed suscipit, aspernatur repudiandae.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis suscipit esse ipsam officia. Quis sint nihil magnam explicabo veniam hic. Vitae nam iusto reiciendis ratione sed suscipit, aspernatur repudiandae.', 25.00, 1, 1, '2023-06-18 20:09:19', '2023-06-19 20:09:24', 29, 'Xbox Series X .jpg'),
(4, 'Aula SI-9008-3050', 'Mouse Gaming ', '- adjustable DPI 500-1500(default)-2000-2500-3000-4000 with different color LED indicator light \n<br>\n- Illuminated Logo with seven different lighting colors (single color or breathing color)\n<br>\n- 7 Fully programmable buttons with different functions and macros to enhance gaming experience.\n<br>\n- Ergonomic design with non-slip materials to increase comfort\n', 30.00, 1, 1, '2023-06-18 20:18:57', '2023-06-19 20:18:57', 1, 'Aula SI-9008-3050.jpg'),
(5, 'G402', 'Mouse Gaming ', '- High-Speed Tracking: Fusion engine delivers one of the highest gaming mouse tracking speeds of up to 500 IPS\r\n<br>\r\n- Eight Programmable Buttons: Customise your Logitech wired gaming mouse and enjoy default configuration straight out of the box or set up one-button triggers personal to you and save them to your G402 USB gaming mouse\r\n<br>\r\n- On-The-Fly DPI: Shift through up to four DPI settings, from pixel-precise targeting (250 DPI) to lightning-fast manoeuvres (4000 DPI)\r\n<br>\r\n- Advanced Response Rate: With a 1MS report rate, you can be confident that no matter how precise or fast your moves are with this laptop, Mac or PC gaming mouse, they will be communicated to the game at the highest possible speed\r\n<br>\r\n- Comfortable Design: Lightweight materials, rubber grips and low friction feet help ensure that your computer gaming sessions last as long as you can.World\'s NO.1 Best Selling Gaming Gear Brand - Based on independent aggregated sales data (FEB ‘19 - FEB\'20) of Gaming Keyboard, Mice, and PC Headset in units\r\n', 49.00, 1, 1, '2023-06-12 20:25:54', '2023-06-19 20:25:54', 1, 'G402.jpg'),
(6, 'MARVO M425G ', '7-Button Gaming Mouse', 'Seven buttons - functions can be assigned individually<br>\r\nLong cable for great freedom of movement, reliable connection<br>\r\nWide range of adjustments for perfect match for game and player<br>\r\nColoured lighting, adjustable<br>\r\nDPI setting via fast dial 1200-1600-2400-3200 depending on the game situation\r\n', 26.25, 1, 1, '2023-06-12 20:30:16', '2023-06-19 20:30:16', 1, 'MARVO M425G .png'),
(7, 'Microsoft Bluetooth Ergonomic Mouse', 'Glacier with comfortable Ergonomic design, thumb rest, up to 15months battery life. Works with Bluetooth enabled PCs/Laptops Windows/Mac/Chrome computers', '\r\n    Comfortable ergonomic design, with soft easy-to-grip thumb rest, promotes natural hand and wrist position.<br>\r\n    Teflon base with precise tracking sensor glides smoothly over a variety of surfaces[4].<br>\r\n    Machined aluminum scroll wheel for precise navigation.<br>\r\n    Light, durable design with seamless finishes, in premium materials.<br>\r\n    3 customizable buttons to add app-specific functions to be more productive[2].\r\n', 28.00, 1, 1, '2023-06-12 20:33:27', '2023-06-19 20:33:27', 1, 'Microsoft Bluetooth Ergonomic Mouse.jpg'),
(8, 'Keychron C1', '', NULL, 60.00, 1, 1, '2023-06-06 20:58:41', '2023-06-19 04:08:00', 16, 'keychron.jpg'),
(9, 'Iqunix F97 Hitchhiker ', 'rfugjbhhk', NULL, 99.99, 1, 1, '2023-06-03 20:58:41', '2023-06-19 04:29:56', 16, 'Iqunix F97 Hitchhiker .jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `img`, `display_order`, `is_featured`) VALUES
(1, 1, 'MSI Force GC30.jpg', 1, 1),
(2, 2, 'Sony PS5.jpg', 1, 1),
(3, 3, 'Xbox Series X .jpg', 1, 1),
(4, 4, 'Aula SI-9008-3050.jpg', 1, 1),
(5, 5, 'G402.jpg', 1, 1),
(6, 6, 'MARVO M425G .png', 1, 1),
(7, 7, 'Microsoft Bluetooth Ergonomic Mouse.jpg', 1, 1),
(8, 8, 'keychron.jpg', 1, 1),
(9, 9, 'Iqunix F97 Hitchhiker .jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `password` varchar(12) NOT NULL,
  `is_admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `mail`, `password`, `is_admin`) VALUES
(1, 'Huy', 'Ho', 'huy.ho210215@vnuk.edu.vn', '14121412', 1),
(2, 'Thuan', 'Le', 'thuan.le210219@vnuk.edu.vn', '123456', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CATEGORIE` (`id_categorie`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_CATEGORIE` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
