-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2021 at 07:11 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `add_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(50) NOT NULL,
  `appartment` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(10) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`add_id`, `customer_id`, `firstName`, `lastName`, `email`, `phone`, `address`, `country`, `appartment`, `city`, `state`, `zip`, `note`) VALUES
(1, 1, 'Temam', 'Hashim', 'temamhashim3@gmail.com', '6309814195', 'KIIT UNIVERSITY, INDIA', 'India', 'BOYS HOSTEL', 'BHUBANESWAR', 'ODISHA', 751024, 'Thanks for this amazing app');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'temamhashim3@gmail.com', 'temam');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `created_at`, `updated_at`) VALUES
(12, 'Mobile & Accessories ', '2021-06-11 05:39:22', '2021-06-11 05:39:22'),
(13, 'Electronics & accessories', '2021-06-11 05:39:55', '2021-06-11 05:39:55'),
(14, 'Computer & accessories', '2021-06-11 05:40:11', '2021-06-11 05:40:11'),
(15, 'Women\'s Fashion', '2021-06-11 05:40:21', '2021-06-11 05:40:21'),
(16, 'Men\'s Fashions', '2021-06-11 05:40:31', '2021-06-11 05:40:31'),
(17, 'Kid\'s Fashion', '2021-06-11 05:41:07', '2021-06-11 05:41:07'),
(18, 'Home & Kitchen', '2021-06-11 05:41:20', '2021-06-11 05:41:20'),
(19, 'Furniture', '2021-06-11 05:41:27', '2021-06-11 05:41:27'),
(20, 'Luxury Beauty', '2021-06-11 05:41:45', '2021-06-11 05:41:45'),
(21, 'Bags and Luggage', '2021-06-11 05:42:04', '2021-06-11 05:42:04'),
(22, 'Car and motorbike', '2021-06-11 05:42:34', '2021-06-11 05:42:34'),
(23, 'Books and E-books', '2021-06-11 05:42:49', '2021-06-11 05:42:49'),
(24, 'Sports', '2021-06-11 05:46:20', '2021-06-11 05:46:20'),
(26, 'cultural cloth', '2021-06-24 14:41:42', '2021-06-24 14:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `company` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `subject`, `email`, `msg`, `company`, `created_at`, `updated_at`) VALUES
(1, '', 'hello', 'temamhashim3@gmail.com', 'what happend to mysqli', '', '2021-06-01 08:14:03', '2021-06-01 08:14:03'),
(3, 'Temam Hashim Hashim', 'hello', 'temamhashim3@gmail.com', 'how is life', '', '2021-06-02 06:09:00', '2021-06-02 06:09:00'),
(4, 'Temam Hashim Hashim', 'hello', 'temamhashim3@gmail.com', 'ddddddddddddddddddddddddddddd', 'ccccc', '2021-06-02 06:23:23', '2021-06-02 06:23:23'),
(5, 'Temam Hashim Hashim', 'greeting', 'temamhashim3@gmail.com', 'greeting from tcoder', 'tcoder', '2021-06-02 08:57:01', '2021-06-02 08:57:01'),
(6, 'Temam Hashim Hashim', 'application Request', 'temamhashim3@gmail.com', 'want to apply as dealer', 'ccccc', '2021-06-02 09:13:20', '2021-06-02 09:13:20'),
(7, 'Temam Hashim Hashim', 'testEmail', 'temamhashim3@gmail.com', 'test message', 'xyz', '2021-06-02 09:51:32', '2021-06-02 09:51:32'),
(8, 'Temam Hashim Hashim', 'testEmail', 'temamhashim3@gmail.com', 'test message', 'xyz', '2021-06-02 09:52:01', '2021-06-02 09:52:01'),
(9, 'Temam Hashim Hashim', 'hello', 'temamhashim3@gmail.com', 'hello dear temam\r\n', 'ccccc', '2021-06-03 11:23:09', '2021-06-03 11:23:09'),
(10, 'Temam Hashim Hashim', 'application Request', 'temamhashim3@gmail.com', 'I want to apply as marchent partner', 'ccccc', '2021-06-03 11:48:05', '2021-06-03 11:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `cp_id` int(11) NOT NULL,
  `cp_code` varchar(255) NOT NULL,
  `cp_discount` varchar(20) NOT NULL,
  `cp_status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`cp_id`, `cp_code`, `cp_discount`, `cp_status`) VALUES
(1, 'TEMAM2021', '9', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `username`, `password`, `profile`, `created_at`, `updated_at`) VALUES
(1, 'temamhashim3@gmail.com', 'temam', 'uploads/men-9.jpg', '2021-06-03 12:30:44', '2021-06-03 12:30:44'),
(2, 'kemal@gmail.com', 'kemal', '', '2021-06-03 12:31:40', '2021-06-03 12:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address_id` int(255) NOT NULL,
  `total` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `coupon` int(20) NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `payment_status` varchar(25) NOT NULL DEFAULT 'Incomplete',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `address_id`, `total`, `tax`, `coupon`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(23, 1, 1, 13, 1, 0, 'paypal', 'Incomplete', '2021-06-24 08:30:59', '2021-06-24 08:30:59'),
(24, 1, 1, 13, 1, 0, 'cash', 'Incomplete', '2021-06-24 08:54:51', '2021-06-24 08:54:51'),
(25, 1, 1, 13, 1, 0, 'paypal', 'Incomplete', '2021-06-24 08:55:36', '2021-06-24 08:55:36'),
(26, 1, 1, 11, 1, 0, 'paypal', 'Incomplete', '2021-06-26 06:05:40', '2021-06-26 06:05:40'),
(27, 1, 1, 24, 2, 0, 'paypal', 'Incomplete', '2021-06-26 06:50:16', '2021-06-26 06:50:16'),
(33, 1, 1, 222, 20, 0, 'paypal', 'Incomplete', '2021-06-26 07:01:50', '2021-06-26 07:01:50'),
(35, 1, 1, 54, 4, 5, 'paypal', 'Incomplete', '2021-06-26 07:08:51', '2021-06-26 07:08:51'),
(36, 1, 1, 24, 2, 0, 'cash', 'Incomplete', '2021-07-30 06:12:01', '2021-07-30 06:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `delivary_status` varchar(255) NOT NULL DEFAULT 'Accepted',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `delivary_status`, `created_at`, `updated_at`) VALUES
(25, 23, 20, 1, 'Accepted', '2021-06-24 08:30:59', '2021-06-24 08:30:59'),
(26, 24, 20, 1, 'Accepted', '2021-06-24 08:54:51', '2021-06-24 08:54:51'),
(27, 25, 20, 1, 'Shipped', '2021-06-24 08:55:36', '2021-06-24 08:55:36'),
(28, 26, 15, 1, 'On The Way', '2021-06-26 06:05:40', '2021-06-26 06:05:40'),
(29, 27, 23, 1, 'Dispached', '2021-06-26 06:50:16', '2021-06-26 06:50:16'),
(30, 33, 13, 1, 'Shipped', '2021-06-26 07:01:51', '2021-06-26 07:01:51'),
(31, 35, 16, 1, 'Delivered', '2021-06-26 07:08:51', '2021-06-26 07:08:51'),
(32, 35, 18, 1, 'Delivered', '2021-06-26 07:08:51', '2021-06-26 07:08:51'),
(33, 36, 23, 1, 'Accepted', '2021-07-30 06:12:03', '2021-07-30 06:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pr_id` int(11) NOT NULL,
  `pr_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `size` varchar(20) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `availability` varchar(20) NOT NULL DEFAULT 'In Stock',
  `description` text NOT NULL,
  `views_counter` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pr_id`, `pr_name`, `price`, `picture`, `type`, `size`, `tags`, `availability`, `description`, `views_counter`, `rating`, `category_id`, `created_at`, `updated_at`) VALUES
(4, 'Jacket', 30, 'fashion-23.jpeg,men-1.jpg,men-1.webp', 'men', '', 'men,clothing,popular,featured,Latest,casual,Formal', 'In Stock', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 21, 0, 16, '2021-08-04 06:33:03', '2021-06-07 06:22:07'),
(7, 'HP Laptop', 200, 'e1.jpg,e5.jpg,e8.jpg,e9.jpg', 'electronics', '', 'popular,featured,Latest,electronics,digital', 'In Stock', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 4, 0, 13, '2021-08-04 06:34:15', '2021-06-08 06:38:43'),
(8, 'Samsung Galaxy  S10 Mobile', 40, '5.jpg,e3.jpg', 'electronics', '', 'popular,featured,Latest,electronics', 'In Stock', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 8, 0, 12, '2021-08-04 06:35:41', '2021-06-09 06:41:40'),
(9, 'Shirt', 40, 'shirt-5.jpg,shirt-5.webp,shirt-6.jpg,shirt-6.webp', 'men', '', 'men,clothing', 'In Stock', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 6, 0, 16, '2021-08-04 06:46:09', '2021-06-11 05:29:49'),
(11, 'Shoes', 40, 'shoes-12.jpeg,shoes-13.jpeg,shoes-16.jpeg,shoes-17.jpeg', 'women', '', 'clothing,featured', 'In Stock', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 1, 0, 15, '2021-08-04 06:39:38', '2021-06-11 06:49:15'),
(12, 'Men Casual Shoes', 30, 'shoes-7.jpeg,shoes-8.jpeg,shoes-24.jpeg', 'men', '', 'men,clothing', 'In Stock', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 8, 0, 16, '2021-08-04 06:40:42', '2021-06-11 06:59:01'),
(13, 'Women Fashion Dress', 20, 'dress-11.jpg,dress-9.jpg,dress-16.jpg,dress-19.jpg', 'women', '', 'clothing,popular', 'In Stock', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 12, 0, 15, '2021-08-04 06:42:39', '2021-06-11 07:11:05'),
(17, 'Samsung Mobile S9', 100, '5.jpg,e2.jpg,e3.jpg,e4.jpg', 'electronics', '', 'popular,featured,Latest,electronics,digital', 'In Stock', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 5, 0, 12, '2021-08-04 06:43:28', '2021-06-12 06:22:14'),
(19, 'Culotte dress', 10, 'fashion-14.jpeg', 'women', '', 'clothing,popular,featured,Latest,women', 'In Stock', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 5, 0, 15, '2021-08-03 07:21:05', '2021-06-12 06:30:43'),
(20, 'Babydoll Dress', 12, 'fashion-18.jpeg', 'women', '', 'clothing,popular,featured,women,casual', 'In Stock', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 15, 0, 15, '2021-08-03 07:21:05', '2021-06-12 06:40:14'),
(21, 'Ethiopian Cultural Cloth', 10, 'im1.jpg,im2.jpg,im3.jpg,im5.jpg', 'women', '', 'clothing,featured', 'In Stock', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 7, 0, 26, '2021-08-04 06:45:18', '2021-06-12 13:45:50'),
(22, 'kid formal cloth', 10, 'kid-15.jpeg,kid-17.jpeg,kid18.jpeg,kid-21.jpeg,kid-23.jpeg', '', '', 'popular,featured,Latest,casual,standard,Formal', 'In Stock', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 24, 0, 17, '2021-08-04 06:44:08', '2021-06-12 13:47:44'),
(23, 'women dress', 22, 'dress-3.jpg,dress-4.jpg,dress-14.jpg', 'women', '', 'clothing,popular,featured,Latest,women', 'In Stock', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 32, 0, 15, '2021-08-04 06:45:51', '2021-06-15 07:36:54'),
(24, 'Ethiopian Cultural Dress', 20, 'men-6.jpg', 'women', '', '', 'In Stock', 'Best Ethiopian cultural cloth at lower price with best design and size fit for every one \r\n\r\nproduct available on cash delivery.', 0, 0, 15, '2021-08-03 07:21:06', '2021-07-30 08:22:42'),
(25, 'Ethiopian Cultural Dress', 20, 'dress-6.jpg,dress-7.jpg', 'women', '', 'clothing', 'In Stock', 'best cultural cloth at lower price', 4, 0, 26, '2021-08-04 06:07:06', '2021-07-30 08:28:39'),
(72, 'Dress 11', 20, 'dress-9.jpg,dress-10.jpg', 'women', '', 'clothing', 'In Stock', 'what a nice dress', 2, 0, 15, '2021-08-04 06:31:39', '2021-08-03 07:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `img_id` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `pr_img` varchar(255) DEFAULT NULL,
  `img_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`img_id`, `pr_id`, `pr_img`, `img_desc`) VALUES
(1, 20, 'uploads/women-2.jpg', 'T-shirt');

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_rating`
--

INSERT INTO `product_rating` (`id`, `product_id`, `rating`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 20, 4, 'temam', 'temam@gmail.com', '2021-06-17 14:51:51', '2021-06-17 14:51:51'),
(2, 20, 4, 'temam', 'temam@gmail.com', '2021-06-17 14:52:15', '2021-06-17 14:52:15'),
(3, 20, 3, 'xyz', 'xyz@gmail.com', '2021-06-17 15:08:54', '2021-06-17 15:08:54'),
(4, 21, 3, 'xyz', 'xyz@gmail.com', '2021-06-17 15:09:03', '2021-06-17 15:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `promo_images`
--

CREATE TABLE `promo_images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo_images`
--

INSERT INTO `promo_images` (`id`, `name`, `images`, `discount`, `desc`) VALUES
(1, 'Men Best Collection', ' images/slider/men-6.jpg', 45, 'Get all men new and best collection with up to 75% discount.'),
(2, 'Women Collection', 'images/slider/slider-4.jpg', 0, 'Get all women best collection with up to 75% discount'),
(3, 'Kid\'s Best Collection', ' images/slider/kid-3.jpg', 0, 'Get all kids new and best collection with up to 75% discount.'),
(4, 'Fashion Collection', ' images/slider/fashion-7.jpeg', 25, 'Get all Fashion collection with up to 75% discount'),
(5, 'Electronics', 'images/slider/slider-3.jpg', 25, 'All Electornics collections'),
(6, 'Kid\'s Collection', 'images/slider/kid-14.jpeg', 25, 'All Kids collections');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'men'),
(2, 'clothing'),
(3, 'sport'),
(4, 'popular'),
(5, 'featured'),
(6, 'Latest'),
(7, 'women'),
(8, 'electronics'),
(9, 'casual'),
(10, 'standard'),
(11, 'Formal'),
(12, 'digital');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`add_id`),
  ADD KEY `customer_address` (`customer_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`cp_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_order` (`address_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `product_image_rln` (`pr_id`);

--
-- Indexes for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_rating` (`product_id`);

--
-- Indexes for table `promo_images`
--
ALTER TABLE `promo_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promo_images`
--
ALTER TABLE `promo_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `customer_address` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `address_order` FOREIGN KEY (`address_id`) REFERENCES `address` (`add_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_rln` FOREIGN KEY (`pr_id`) REFERENCES `products` (`pr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD CONSTRAINT `product_rating` FOREIGN KEY (`product_id`) REFERENCES `products` (`pr_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
