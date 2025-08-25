-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2025 at 12:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nimsta`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`) VALUES
(56, 6, 32, 'wqquyqouewqdwe', '2025-08-15 15:52:43'),
(57, 6, 32, 'hjdfjsdfkjsdfs', '2025-08-15 16:24:16'),
(58, 1, 32, 'hgfjghgjghghjj', '2025-08-15 16:24:34'),
(59, 1, 32, 'hgfjghgjghghjj', '2025-08-15 16:24:36'),
(60, 1, 32, 'hgfjghgjghghjj', '2025-08-15 16:24:37'),
(61, 6, 32, 'dfdsfd', '2025-08-15 16:53:37'),
(62, 6, 32, 'dhghhd', '2025-08-15 17:01:12'),
(63, 6, 32, 'fhhhh', '2025-08-15 17:05:40'),
(64, 6, 32, 'tyrrtrtr', '2025-08-15 17:09:38'),
(65, 6, 32, 'tyrrtrtrd', '2025-08-15 17:15:33'),
(66, 6, 32, 'ererere', '2025-08-15 17:15:51'),
(67, 6, 32, 'uyuy', '2025-08-15 17:16:03'),
(68, 6, 32, 'errer', '2025-08-15 17:20:10'),
(69, 6, 32, 'erecvvd', '2025-08-15 17:20:32'),
(70, 6, 32, 'ererere', '2025-08-15 17:22:12'),
(71, 6, 32, 'ererere', '2025-08-15 17:24:19'),
(72, 6, 32, 'ererere', '2025-08-15 17:24:23'),
(73, 6, 32, 'ererer', '2025-08-15 17:30:46'),
(74, 5, 32, 'sdjksjfse', '2025-08-16 08:27:55'),
(75, 4, 32, 'adfsgfdgfd', '2025-08-16 08:40:35'),
(76, 4, 32, 'fdxdxgf', '2025-08-16 08:41:03'),
(77, 4, 32, 'adaswd', '2025-08-16 08:41:42'),
(78, 1, 32, 'szdsasds', '2025-08-16 08:46:59'),
(79, 4, 32, 'rjkwrkeruweo43', '2025-08-16 08:56:12'),
(80, 4, 32, 'hjgjkkjkjj', '2025-08-16 09:01:12'),
(81, 4, 32, 'wadsaswa', '2025-08-16 09:04:48'),
(82, 4, 32, 'sdsadasda', '2025-08-16 09:05:11'),
(83, 6, 32, 'jgjkgh', '2025-08-16 09:07:20'),
(84, 4, 32, 'swarewe', '2025-08-17 09:54:17'),
(85, 6, 32, 'sASSSWQ', '2025-08-17 10:03:38'),
(86, 2, 32, 'SASASA', '2025-08-17 10:04:23'),
(87, 4, 32, 'aweweqwqw', '2025-08-17 10:24:45'),
(88, 6, 32, 'dfdsfdwe', '2025-08-17 10:45:43'),
(89, 1, 32, 'ASDASS', '2025-08-17 10:46:54'),
(90, 1, 32, 'WEREWRWE', '2025-08-17 10:47:30'),
(91, 1, 32, 'SDFSDDSD', '2025-08-17 10:49:07'),
(92, 1, 32, 'ASASAS', '2025-08-17 10:49:42'),
(93, 1, 32, 'FGDFGFDGDF', '2025-08-17 10:52:03'),
(94, 4, 32, 'FGFF', '2025-08-17 10:52:29'),
(95, 5, 32, 'FDSFSD', '2025-08-17 10:54:28'),
(96, 1, 32, 'gggggg', '2025-08-17 11:04:22'),
(97, 1, 32, 'fffff', '2025-08-17 11:06:51'),
(98, 3, 32, 'dddd', '2025-08-17 11:07:17'),
(99, 6, 32, 'ffff', '2025-08-17 11:07:47'),
(100, 2, 32, 'ssss', '2025-08-17 11:11:11'),
(101, 5, 32, 'dddd', '2025-08-17 11:15:06'),
(102, 5, 32, 'ssss', '2025-08-17 11:15:40'),
(103, 6, 32, 'dddd', '2025-08-17 11:22:39'),
(104, 6, 32, 'xxxx', '2025-08-17 11:22:50'),
(105, 5, 32, 'asasa', '2025-08-17 11:24:12'),
(106, 5, 32, 'asasa', '2025-08-17 11:24:14'),
(107, 2, 32, 'dddd', '2025-08-17 11:31:58'),
(108, 2, 32, 'sdsassa', '2025-08-17 11:32:48'),
(109, 1, 32, 'sssss', '2025-08-17 11:35:33'),
(110, 4, 32, 'ffff', '2025-08-17 11:36:02'),
(111, 6, 32, 'ffff', '2025-08-17 11:36:25'),
(112, 4, 32, 'ssss', '2025-08-17 11:37:21'),
(113, 4, 32, 'aaaa', '2025-08-17 11:37:31'),
(114, 5, 32, 'eee', '2025-08-17 11:39:49'),
(115, 5, 32, 'dssdds', '2025-08-17 12:19:34'),
(116, 2, 32, 'ddd', '2025-08-17 12:28:26'),
(117, 2, 32, 'aaa', '2025-08-17 12:28:34'),
(118, 1, 32, 'ssss', '2025-08-17 12:56:09'),
(119, 1, 32, 'yyy', '2025-08-17 13:27:53'),
(120, 1, 32, 'aaaa', '2025-08-17 13:28:03'),
(121, 1, 32, 'ooo', '2025-08-17 13:29:38'),
(122, 1, 32, 'hhh', '2025-08-17 13:31:52'),
(123, 3, 32, 'qqq', '2025-08-17 13:32:18'),
(124, 3, 32, 'rrr', '2025-08-17 13:34:55'),
(125, 3, 32, 'tt', '2025-08-17 13:35:13'),
(126, 1, 32, 'uuu', '2025-08-17 13:38:21'),
(127, 1, 32, 'uuu', '2025-08-17 13:38:22'),
(128, 1, 32, 'uuu', '2025-08-17 13:38:23'),
(129, 1, 32, 'uuu', '2025-08-17 13:38:23'),
(130, 1, 32, 'uuu', '2025-08-17 13:38:24'),
(131, 1, 32, 'uuu', '2025-08-17 13:38:24'),
(132, 6, 32, 'ww', '2025-08-17 13:39:27'),
(133, 6, 32, 'ww', '2025-08-17 13:39:30'),
(134, 6, 32, 'rr', '2025-08-17 13:39:47'),
(135, 5, 32, 'dd', '2025-08-17 13:40:07'),
(136, 6, 32, 'qqq', '2025-08-19 10:45:54'),
(137, 1, 32, 'www', '2025-08-19 12:01:45'),
(138, 54, 30, 'Welcome Avatar Image', '2025-08-21 11:58:33'),
(139, 54, 30, 'Minim minim in excepteur duis non cupidatat', '2025-08-21 12:02:35'),
(140, 4, 29, 'ggggg', '2025-08-22 14:08:11'),
(141, 3, 32, 'kkkk', '2025-08-24 20:08:37'),
(142, 53, 32, 'kkk', '2025-08-24 20:08:57'),
(143, 53, 32, 'rtyt', '2025-08-24 20:15:37'),
(144, 6, 32, 'hghghg', '2025-08-24 20:16:03'),
(145, 54, 32, 'ssss', '2025-08-24 20:17:39'),
(146, 54, 32, 'ssss', '2025-08-24 20:22:18'),
(147, 55, 32, 'ggggg', '2025-08-24 21:25:12'),
(148, 55, 32, 'ssss', '2025-08-24 21:25:23'),
(149, 54, 32, 'ssss', '2025-08-24 21:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` int(11) NOT NULL,
  `followed_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `followed_id`, `follower_id`, `created_at`) VALUES
(1, 31, 32, '2025-08-07 14:16:38'),
(2, 29, 32, '2025-08-07 14:17:06'),
(3, 30, 32, '2025-08-07 14:17:44'),
(4, 30, 31, '2025-08-07 14:29:31'),
(5, 32, 31, '2025-08-07 14:34:01'),
(6, 28, 29, '2025-08-07 15:39:54'),
(7, 30, 29, '2025-08-07 15:40:08'),
(8, 28, 30, '2025-08-14 11:46:47'),
(9, 28, 32, '2025-08-15 13:14:17'),
(10, 29, 31, '2025-08-19 13:14:33'),
(11, 32, 30, '2025-08-21 11:30:33'),
(12, 32, 29, '2025-08-22 16:28:34'),
(13, 31, 29, '2025-08-22 16:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`) VALUES
(1, 29, 18, '2025-07-25 10:47:17'),
(2, 29, 17, '2025-07-25 10:52:51'),
(3, 32, 18, '2025-07-25 17:22:41'),
(4, 32, 12, '2025-07-25 17:22:47'),
(6, 30, 8, '2025-08-04 14:32:25'),
(7, 30, 12, '2025-08-04 14:33:03'),
(23, 32, 3, '2025-08-19 12:04:15'),
(25, 31, 5, '2025-08-21 08:44:35'),
(32, 30, 6, '2025-08-21 13:13:17'),
(33, 30, 5, '2025-08-21 13:13:39'),
(39, 30, 53, '2025-08-21 22:01:37'),
(40, 29, 5, '2025-08-21 22:26:53'),
(48, 29, 53, '2025-08-22 10:48:48'),
(51, 29, 6, '2025-08-22 11:01:10'),
(54, 29, 2, '2025-08-22 11:06:06'),
(57, 29, 4, '2025-08-22 14:13:29'),
(59, 29, 54, '2025-08-22 16:27:45'),
(64, 32, 53, '2025-08-24 08:40:36'),
(65, 32, 54, '2025-08-24 08:40:49'),
(79, 32, 6, '2025-08-24 20:07:09'),
(80, 32, 5, '2025-08-24 20:07:15'),
(81, 32, 4, '2025-08-24 20:07:20'),
(82, 32, 1, '2025-08-24 20:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `media_type` varchar(10) DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `image_url`, `media_type`, `caption`, `created_at`) VALUES
(1, 31, 'https://res.cloudinary.com/dautlarnb/image/upload/v1751545835/dnhjzmyt0em5wqhov9gv.jpg', 'image', 'Avaliable as seen\r\n\r\nprice: 20,000', '2025-07-03 13:31:05'),
(2, 31, 'https://res.cloudinary.com/dautlarnb/image/upload/v1751545837/g0iyjf6p0lqk9yjmaz8l.jpg', 'image', 'Avaliable as seen\r\n\r\nprice: 20,000', '2025-07-03 13:31:06'),
(3, 31, 'https://res.cloudinary.com/dautlarnb/image/upload/v1751545838/ojwxuhymqzwmu8qx69uv.jpg', 'image', 'Avaliable as seen\r\n\r\nprice: 20,000', '2025-07-03 13:31:07'),
(4, 31, 'https://res.cloudinary.com/dautlarnb/image/upload/v1751545839/kd02yd65ghooakuel3vb.jpg', 'image', 'Avaliable as seen\r\n\r\nprice: 20,000', '2025-07-03 13:31:08'),
(5, 29, 'https://res.cloudinary.com/dautlarnb/image/upload/v1751545973/dt7tjfnnxuq6ukg6wryy.jpg', 'image', 'Luxury bedsheets avaliable as seen', '2025-07-03 13:33:25'),
(6, 29, 'https://res.cloudinary.com/dautlarnb/image/upload/v1751545977/letslgxfyzy5vikf6asp.jpg', 'image', 'Luxury bedsheets avaliable as seen', '2025-07-03 13:33:26'),
(53, 30, 'https://res.cloudinary.com/dautlarnb/image/upload/v1755777127/xqlbg38xdyn4511odr8v.png', 'image', 'Avatar et Lustique', '2025-08-21 12:53:03'),
(54, 30, 'https://res.cloudinary.com/dautlarnb/image/upload/v1755777128/xmjpg7q3qgpeia1bf0y7.jpg', 'image', 'Avatar et Lustique', '2025-08-21 12:53:07'),
(55, 32, 'https://res.cloudinary.com/dautlarnb/image/upload/v1756067026/rveykerhpirlcxf87rhe.jpg', 'image', 'Gold clippers', '2025-08-24 21:24:44'),
(56, 32, 'https://res.cloudinary.com/dautlarnb/image/upload/v1756070769/ufzzuxlw7hoirdrfuchz.jpg', 'image', 'Think Pad', '2025-08-24 22:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `contact`, `password`, `username`, `dob`, `gender`, `profile`, `date`) VALUES
(28, 'Sarah Uduak', 'sarahudev@email.com', 'Sarah@123', 'sarahudev', '2012-11-12', 'female', 'https://res.cloudinary.com/dautlarnb/image/upload/v1751545251/ycmzrzmsrqf4id7vdbne.jpg', '2025-07-03 13:20:28'),
(29, 'Michael Ekanem', 'michael.dev@email.com', 'Mike@456', 'mikedev', '1953-10-10', 'male', 'https://res.cloudinary.com/dautlarnb/image/upload/v1751545355/iqoxpno5rwbpbs5codou.jpg', '2025-07-03 13:22:30'),
(30, 'Rita Essien', 'ritae_codes@email.com', 'Rita!789', 'ritae_codes', '2001-05-08', 'female', 'https://res.cloudinary.com/dautlarnb/image/upload/v1751545614/viznuyyjv4n6mdlrmxoe.jpg', '2025-07-03 13:26:52'),
(31, 'Iniobong Asuquo', 'ini.writes@email.com', 'Ini#001', 'iniwrites', '1954-09-14', 'male', 'https://res.cloudinary.com/dautlarnb/image/upload/v1751545775/risrbjc2xkvyeqjbagus.jpg', '2025-07-03 13:28:54'),
(32, 'Promise Promise', 'promise@yahoo.net', '12345', '@pro', '1952-02-13', 'male', 'https://res.cloudinary.com/dautlarnb/image/upload/v1751903206/memg8iaxfmoxixazg1ag.jpg', '2025-07-07 16:44:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followed_id` (`followed_id`),
  ADD KEY `follower_id` (`follower_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`followed_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
