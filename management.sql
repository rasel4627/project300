-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 04:55 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '01782614627', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `email`, `phone`, `date`, `time`, `person`, `created_at`, `updated_at`) VALUES
(1, 'Saifur Rahman', 'saifurrahmanrasel4627@gmail.com', '01841293737', '2020-12-16', '15:00', '5', NULL, NULL),
(3, 'Rasel', 'saifurrahmanrasel27@gmail.com', '01841293737', '2020-12-17', '12:00', '3', NULL, NULL),
(4, 'Juwel Ahmad', 'juwel@gmail.com', '018271283444', '2020-12-18', '13:00', '4', NULL, NULL),
(5, 'Masruf', 'saifurrahmanrasel4627@gmail.com', '012345567788', '2020-12-29', '15:48', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publication_status` int(2) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(15, 'Breakfast', NULL, 1, NULL, NULL),
(16, 'Lunch', NULL, 1, NULL, NULL),
(17, 'Dinner', NULL, 1, NULL, NULL),
(18, 'Drinks', NULL, 1, NULL, NULL),
(19, 'Coffee', NULL, 1, NULL, NULL),
(20, 'Desserts', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `provider`, `provider_id`, `password`, `remember_token`, `mobile`, `created_at`, `updated_at`) VALUES
(28, 'Saifur', 'srr@gmail.com', NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, '018923732742', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_10_25_194818_create_admin_table', 1),
(2, '2020_10_25_215734_create_categories_table', 2),
(3, '2020_10_26_230759_create_brands_table', 3),
(4, '2020_10_27_202747_create_products_table', 4),
(5, '2020_11_08_205823_create_slider_table', 5),
(6, '2020_11_11_215521_create_customers_table', 6),
(7, '2020_11_14_180932_create_shipping_table', 7),
(8, '2020_11_23_061337_create_payment_table', 8),
(9, '2020_11_23_061723_create_order_table', 8),
(10, '2020_11_23_061855_create_order_details_table', 8),
(11, '2020_11_24_182128_create_setting_table', 9),
(12, '2020_12_13_153943_create_booking_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_short_description` longtext COLLATE utf8mb4_unicode_ci,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publication_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category_id`, `product_short_description`, `product_price`, `product_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(16, 'Culver\'s Butterburger', 15, '<p>Meat , Bread , Sauce , Tomatoe</p>', 200.00, 'public/image/1685902485794229.jpg', 1, NULL, NULL),
(17, 'Chicken Sandwich', 15, '<p>Chicken Stick,Sauce,Drinks</p>', 200.00, 'public/image/1685902567248948.jpg', 1, NULL, NULL),
(18, 'Pumpkin Spiced', 15, '<p>Egg &nbsp;,Chicken , Sauce</p>', 230.00, 'public/image/1685902627239687.jpg', 1, NULL, NULL),
(19, 'Boiled Rice With Egg,meat', 16, '<p>Tomato,Saalad</p>', 280.00, 'public/image/1685902714438927.jpg', 1, NULL, NULL),
(20, 'Boiled Rice', 16, '<p>Sauce , Meat, Mutton</p>', 300.00, 'public/image/1685902772669856.jpg', 1, NULL, NULL),
(21, 'Plain Rice Egg', 16, '<p>Egg,Sallad</p>', 200.00, 'public/image/1685902817437262.jpg', 1, NULL, NULL),
(22, 'Chicken Grill', 17, '<p>Grill, Sauce, Salad</p>', 230.00, 'public/image/1685902854505589.jpg', 1, NULL, NULL),
(23, 'Rice With Different Item', 17, '<p>Hot Coffee</p>', 330.00, 'public/image/1685902906247126.jpg', 1, NULL, NULL),
(24, 'Raising Cane\'s Cake', 20, '<p>Milk , Sugar</p>', 250.00, 'public/image/1685902986069080.jpg', 1, NULL, NULL),
(25, 'Australian Special Cake', 20, '<p>Different Flavour Mixed</p>', 400.00, 'public/image/1685903015364267.jpg', 1, NULL, NULL),
(26, 'Thai Cake', 20, '<p>Double Mug</p>', 400.00, 'public/image/1685903044506173.jpg', 1, NULL, NULL),
(27, 'Soft Drinks', 18, '<p>Cold Water Flavour</p>', 260.00, 'public/image/1685903080600102.jpg', 1, NULL, NULL),
(28, 'Italian Drink', 18, '<p>RedColor</p>', 120.00, 'public/image/1685903155156147.jpg', 1, NULL, NULL),
(29, 'Chinies Special Cake', 20, '<p>Chocolate flavour , Kon item</p>', 150.00, 'public/image/1685904442931024.jpg', 1, NULL, NULL),
(30, 'Bangla Special Menu Cake', 20, '<p>3 Shaped Creation , Mixed color</p>', 300.00, 'public/image/1685904527491007.jpg', 1, NULL, NULL),
(31, 'Happy Birthday Cake', 20, '<p>White Looking with flower draw</p>', 400.00, 'public/image/1685904639068849.jpg', 1, NULL, NULL),
(32, 'Birthday Chocolate Cake', 20, '<p>Chocolate flavour</p>', 600.00, 'public/image/1685904707615968.jpg', 1, NULL, NULL),
(33, 'Chicken Charma', 15, '<p>Special Salaad mixed</p>', 329.00, 'public/image/1685904902367615.jpg', 1, NULL, NULL),
(34, 'Special Thai Nudules', 15, '<p>Samuk Nudules</p>', 200.00, 'public/image/1685904939814670.jpg', 1, NULL, NULL),
(35, 'Nudules', 15, '<p>Different Flavour</p>', 140.00, 'public/image/1685904987634500.jpg', 1, NULL, NULL),
(36, '1 piece fishes fry', 15, '<p>Fish , Tomato , Mixed salaad</p>', 100.00, 'public/image/1685905054118093.jpg', 1, NULL, NULL),
(37, 'Winter Morning Cake', 15, '<p>Cake , Milk Powder</p>', 190.00, 'public/image/1685905124360882.jpg', 1, NULL, NULL),
(38, 'Chicken Fry Roast', 16, '<p>Chicken , Sauce ,Salaad</p>', 200.00, 'public/image/1685905333743580.jpg', 1, NULL, NULL),
(39, 'Pitza Hot Item', 16, '<p>Mixed item</p>', 290.00, 'public/image/1685905405107634.jpg', 1, NULL, NULL),
(40, 'Chicken Sharma', 16, '<p>Chicken Stick, Sauce</p>', 289.00, 'public/image/1685905627196127.jpg', 1, NULL, NULL),
(41, 'Chicken Roles', 17, '<p>Chicken , Sauce</p>', 290.00, 'public/image/1685905729732719.jpg', 1, NULL, NULL),
(42, 'Chicken Biriyani', 17, '<p>Egg , Rice, Salaad</p>', 300.00, 'public/image/1685905781727547.jpg', 1, NULL, NULL),
(43, 'Boiled Egg Bread', 17, '<p>Egg , Bread ,</p>', 100.00, 'public/image/1685905839140186.jpg', 1, NULL, NULL),
(44, 'Lemon Juice', 18, '<p>Lemon , Clean Water, Suger ,Tasty Salt</p>', 30.00, 'public/image/1685905923531792.jpg', 1, NULL, NULL),
(45, 'Orange Juice', 18, '<p>Orange , Salt</p>', 50.00, 'public/image/1685905965688643.jpg', 1, NULL, NULL),
(46, 'Green Juice', 18, '<p>Green Leaf</p>', 199.00, 'public/image/1685906024648040.jpg', 1, NULL, NULL),
(47, 'Special Coffee', 19, '<p>Chocolate</p>', 80.00, 'public/image/1685906178773772.jpg', 1, NULL, NULL),
(48, 'Cup Coffee', 19, '<p>Cup Coffee</p>', 90.00, 'public/image/1685906279413850.jpg', 1, NULL, NULL),
(49, 'Love Coffee', 19, '<p>Coffee</p>', 180.00, 'public/image/1685906326283777.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `company_name`, `company_website`, `company_email`, `company_phone`, `company_fb`, `company_address`, `company_city`, `logo`, `created_at`, `updated_at`) VALUES
(2, 'Sultans Dine', 'www.restaurant.com', 'admin@gmail.com', '01782614627', 'facebook.com/rasel27', 'Lichu Bagaan 18/C', 'Sylhet', 'public/image/1686611596579831.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(8, 'public/image/1685899287089382.jpg', '1', NULL, NULL),
(9, 'public/image/1685899338650244.jpg', '1', NULL, NULL),
(10, 'public/image/1685899345983641.jpg', '1', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
