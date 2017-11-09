-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 02:00 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `post_id`, `date`) VALUES
(2, 'first commetn to first post from user ahmed', 12, 10, '2017-11-09 12:43:38'),
(3, 'secound comment from ahmed elkafrawy to first post', 12, 10, '2017-11-09 12:44:15'),
(4, 'this is first comment by ahmed elkafrawy to third post', 12, 12, '2017-11-09 12:48:46'),
(5, 'first commetn by ahmed to secound post', 12, 11, '2017-11-09 12:53:50'),
(6, 'secound comment by ahmed to secound post', 12, 11, '2017-11-09 12:56:05'),
(7, 'third comment to first post by ahmed', 12, 10, '2017-11-09 12:57:09'),
(8, 'fouth comment by ahmed to first post', 12, 10, '2017-11-09 12:58:53'),
(9, 'third comment by ahmed to secound post', 12, 11, '2017-11-09 13:00:44'),
(10, 'fourth comment by ahmed to secound post', 12, 11, '2017-11-09 13:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_body` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_body`, `user_id`, `post_image`, `post_date`) VALUES
(10, 'this is the title of first post', 'this is the body of first post this is the body of first post this is the body of first post\r\nthis is the body of first postthis is the body of first post', 12, 'http://localhost/projects/Blog_2/uploads/bottle5.png', '2017-11-09 12:30:06'),
(11, 'title of second post', 'this is the title of secound  post this is the title of secound  postthis is the title of secound  postthis is the title of secound  postthis is the title of secound  postthis is the title of secound  postthis is the title of secound  postthis is the title of secound  postthis is the title of secound  postthis is the title of secound  post', 12, 'http://localhost/projects/Blog_2/uploads/chatlogo5.png', '2017-11-09 12:31:08'),
(12, 'thirst post title', 'this is the body of third postthis is the body of third postthis is the body of third postthis is the body of third postthis is the body of third postthis is the body of third postthis is the body of third postthis is the body of third postthis is the body of third postthis is the body of third postthis is the body of third post', 12, 'http://localhost/projects/Blog_2/uploads/male1.png', '2017-11-09 12:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_admin`, `is_confirmed`, `is_deleted`) VALUES
(12, 'ahmed elkafrawy', 'ahmed@ahmed.com', '$2y$10$oTfTtWlFLZMcOxSUqKrB2eZeyY4vM5aqeq/znnqcRyvzLAKTc1SdC', 'default.jpg', '2017-11-09 12:28:10', NULL, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
