-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 07:51 AM
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
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_author`
--

CREATE TABLE `tbl_author` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `author_image` varchar(250) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_author`
--

INSERT INTO `tbl_author` (`id`, `first_name`, `last_name`, `author_image`, `created_on`) VALUES
(1, 'A.W.', 'Kaylen', 'uploads/author/author654362a77f25cavatar.jpg', '2023-11-02 09:49:43'),
(2, 'Frankie', 'Blooding', 'uploads/author/author6543630f8aa69avatar.jpg', '2023-11-02 09:51:27'),
(3, 'Tessa', 'Sloan', 'uploads/author/author654363857d997avatar.jpg', '2023-11-02 09:53:25'),
(4, 'Rene', 'Webb', 'uploads/author/author654363d452cd5avatar.jpg', '2023-11-02 09:54:44'),
(5, 'Jami', 'Gray', 'uploads/author/author654364cd8a26favatar.jpg', '2023-11-02 09:58:53'),
(6, 'Tess', 'Thompson', 'uploads/author/author654373ef49d39avatar.jpg', '2023-11-02 11:03:27'),
(7, 'William', 'Shakespeare', 'uploads/author/author6552feafacca9avatar.jpg', '2023-11-14 05:59:27'),
(8, 'H.G.', 'Wells', 'uploads/author/author655300a38de0favatar.jpg', '2023-11-14 06:07:47'),
(9, 'Thornton', 'W. Burgess', 'uploads/author/author655301d3157a9avatar.jpg', '2023-11-14 06:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `id` int(11) NOT NULL,
  `book_title` varchar(250) NOT NULL,
  `book_category` int(20) NOT NULL,
  `book_category_name` varchar(250) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `author_id` varchar(50) NOT NULL,
  `book_author_name` varchar(250) NOT NULL,
  `total_copies` int(250) NOT NULL,
  `copies_out` int(250) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'NA',
  `updated_on` datetime NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`id`, `book_title`, `book_category`, `book_category_name`, `book_image`, `author_id`, `book_author_name`, `total_copies`, `copies_out`, `status`, `updated_on`, `created_on`) VALUES
(2, 'Hunted by the Past', 3, 'action_adventures', 'uploads/book654372709269851iohb8HBwL._SY200_.jpg', '5', 'Jami Gray', 1, 0, 'Published', '0000-00-00 00:00:00', '2023-11-02 10:57:04'),
(3, 'Billionaire Boss Protector', 2, 'romance', 'uploads/book654372d0bc0ac81yLAj-dOjL._SL1500_.jpg', '3', 'Tessa Sloan', 10, 0, 'Published', '0000-00-00 00:00:00', '2023-11-02 10:58:40'),
(4, 'Uncovering Lily', 2, 'romance', 'uploads/book6543730c1104a61UigRw8j4L._SL1500_.jpg', '4', 'Rene Webb', 10, 0, 'Published', '0000-00-00 00:00:00', '2023-11-02 10:59:40'),
(5, 'Whiskey Witches', 3, 'action_adventures', 'uploads/book654373361abe581AM3aXjgQL._SL1500_.jpg', '2', 'Frankie Blooding', 10, 0, 'Published', '0000-00-00 00:00:00', '2023-11-02 11:00:22'),
(6, 'The Making of a Matchmaker', 2, 'romance', 'uploads/book6543741c388ff51BWlPvGsHL.jpg', '6', 'Tess Thompson', 10, 0, 'Published', '0000-00-00 00:00:00', '2023-11-02 11:04:12'),
(7, 'Macbeth', 4, 'history', 'uploads/book6552ff7679de1cover-cust-6295.jpg', '7', 'William Shakespeare', 10, 0, 'Published', '0000-00-00 00:00:00', '2023-11-14 06:02:46'),
(8, 'The Time Machine', 1, 'technology', 'uploads/book655300cc1ba25cover-cust-7349.jpg', '8', 'H.G. Wells', 10, 0, 'Published', '0000-00-00 00:00:00', '2023-11-14 06:08:28'),
(9, 'The Burgess Animal Book for Children', 5, 'childrens', 'uploads/book6553022073fabcover-orig-1352.jpg', '9', 'Thornton W. Burgess', 10, 0, 'Published', '0000-00-00 00:00:00', '2023-11-14 06:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_display_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `category_display_name`) VALUES
(1, 'technology', 'Technology'),
(2, 'romance', 'Romance'),
(3, 'action_adventures', 'Action & Adventures'),
(4, 'history', 'History'),
(5, 'childrens', 'Childrens');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favourites`
--

CREATE TABLE `tbl_favourites` (
  `id` int(11) NOT NULL,
  `uid` int(250) NOT NULL,
  `book_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_favourites`
--

INSERT INTO `tbl_favourites` (`id`, `uid`, `book_id`) VALUES
(1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(50) NOT NULL,
  `receiver_id` varchar(50) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` longtext NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`id`, `sender_id`, `receiver_id`, `subject`, `message`, `status`, `created_on`) VALUES
(1, '1', '1', 'Admin', 'Test Message', 1, '2023-12-05 12:31:38'),
(2, '1', '1', 'Test 2', 'Message ', 1, '2023-12-06 06:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `username`, `email`, `password`, `phone_no`, `type`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', '1234567898', 'admin'),
(2, 'mukesh', 'mukeshgowd4@gmail.com', '12345', '1234567899', 'user'),
(3, 'mukesh', 'anthathimukesh1505l.sse@saveetha.com', '12345', '0', 'user'),
(4, 'user', 'user@login.com', 'user', '', 'user'),
(6, 'student', 'student@login.com', '12345', '', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_slots`
--

CREATE TABLE `tbl_time_slots` (
  `id` int(11) NOT NULL,
  `from_time` varchar(11) NOT NULL,
  `to_time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_time_slots`
--

INSERT INTO `tbl_time_slots` (`id`, `from_time`, `to_time`) VALUES
(1, '8:00 AM', '9:30 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `book_id` int(50) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `return_date` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Requested',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `user_id`, `book_id`, `slot_id`, `return_date`, `status`, `created_on`) VALUES
(7, 1, 2, 1, '12-29-2023', 'Approved', '2023-12-07 04:45:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_author`
--
ALTER TABLE `tbl_author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_favourites`
--
ALTER TABLE `tbl_favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_time_slots`
--
ALTER TABLE `tbl_time_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_author`
--
ALTER TABLE `tbl_author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_favourites`
--
ALTER TABLE `tbl_favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_time_slots`
--
ALTER TABLE `tbl_time_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
