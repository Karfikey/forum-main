-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 04:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(3, 'Java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', '2022-09-12 11:34:03'),
(4, 'Django', 'Django is a free and open-source, Python-based web framework that follows the model–template–views architectural pattern. It is maintained by the Django Software Foundation, an independent organization established in the US as a 501 non-profit.', '2022-09-12 11:34:49'),
(6, 'Flutter', 'Flutter is an open-source UI software development kit created by Google. It is used to develop cross platform applications for Android, iOS, Linux, macOS, Windows, Google Fuchsia, and the web from a single codebase. First described in 2015, Flutter was re', '2022-09-12 11:36:56'),
(9, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation.', '2022-09-09 15:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'this is the comment', 4, 7, '2022-12-23 17:37:16'),
(2, 'applet class is built-in in java just try to import it.', 5, 8, '2022-12-23 17:49:42'),
(3, 'you can swing instead of applet', 5, 9, '2022-12-24 18:42:37'),
(4, 'bro applet is depricated why are you using it?', 5, 10, '2022-12-24 18:47:56'),
(5, 'bro applet is depricated why are you using it?', 5, 11, '2022-12-24 18:49:02'),
(6, 'try to learn new things bro dont use old stuff or technologies.', 5, 12, '2022-12-24 18:49:37'),
(7, 'try to learn new things bro dont use old stuff or technologies.', 5, 13, '2022-12-24 18:50:42'),
(8, 'try to learn new things bro dont use old stuff or technologies.', 5, 14, '2022-12-24 18:53:35'),
(9, 'make your you set the environment variables of python in your system', 8, 14, '2023-01-08 16:55:17'),
(10, 'go with some youtube videos', 8, 14, '2023-01-08 16:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` varchar(255) NOT NULL,
  `thread_cat_id` int(4) NOT NULL,
  `thread_user_id` int(4) NOT NULL,
  `timeStamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timeStamp`) VALUES
(1, 'Unable to install pyaudio.', 'Unable to install pyaudio in windows 11 what can i do now?', 9, 2, '2022-09-14 08:03:19'),
(2, 'how to set path of python in windows?', 'Help me pleaseee.', 9, 3, '2022-09-24 15:10:14'),
(3, 'hey', 'i am unable to install any module in python please help me', 9, 4, '2022-12-16 11:05:31'),
(4, 'how to install jdk', 'i am not able to install jdk', 3, 5, '2022-12-22 14:32:35'),
(5, 'how to use applet', 'unable to use applet in java', 3, 6, '2022-12-22 15:02:30'),
(8, 'django is not found', 'django installed in my system but it is showing django is not found', 4, 14, '2023-01-08 16:22:44'),
(9, 'unable to do django project', 'how to initialize a django project', 4, 14, '2023-01-08 16:51:56'),
(10, 'unable to install packages in djago', 'how to install packages in django', 4, 14, '2023-01-08 16:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timeStamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timeStamp`) VALUES
(2, 'parasverma@gmail.com', '$2y$10$mpS6zU7wGfSpg4aiXQEMd.mq.9NPcnP2kmmqkEm3E17xFVUoEwqj2', '2022-12-25 20:51:56'),
(3, 'tanuja@gmail.com', '$2y$10$3wOgrM9/YmyE9nR9uvCPpueQSBqB5xv5F2sBEPCmJcr1TfYO6ToMa', '2022-12-25 20:59:42'),
(4, 'paras45v@gmail.com', '$2y$10$BdnYKJLztW3g1bWjBPxLpun4aZPR0Maja0WvFsFY.pfVdtA9eqLKC', '2022-12-25 21:53:04'),
(5, 'parasvermaa@gmail.com', '$2y$10$s3DNrpVHY9B1h3tyX8f63.dcfnkXAoP7vPderKyY/DasIhtIv6e5G', '2022-12-25 21:58:08'),
(6, 'riya@gmail.com', '$2y$10$JccynaYOahsPlbBw4Ickh.JqASCnQ82/OwNTTUv9g8llCMdJLq7Pe', '2022-12-25 22:15:48'),
(7, 'riyakafaltiya@gmail.com', '$2y$10$gc5vI0hEP6ZI9iT01e6yBurPDbf9bUR0xJhYlJmkAA5AcTz5yYxBC', '2022-12-25 22:16:55'),
(8, 'div@gmail.com', '$2y$10$/GLRNBuIuOaxj5r6bx1Pvu9yzuXC6uLJGqE4LeGcdTlH8L1asCDP2', '2022-12-28 20:05:24'),
(9, 'div@124gmail.com', '$2y$10$pSWFFTIcX9UIiHui2ZMUiOTPuH5arGfNORNQve4rWzvuh.lecciDG', '2022-12-28 20:13:22'),
(10, 'divrey@gmail.com', '$2y$10$bB6hq3cVXqZDsNERZGr0M.xLm0h8Ptyx7y1JPF8DglAf9VQgNnyVe', '2022-12-28 20:26:48'),
(11, 'parascvbv@gmail.com', '$2y$10$Nyy0PbWec21oTACoBGC3YepoYL9H/jPp6Mx3NYNl20969XYka9wRK', '2022-12-28 20:29:18'),
(12, 'riyakafaltiyadf@gmail.com', '$2y$10$QYKad8nhUNSP/FW5PZa36.zZllIn.6LD2EaTwIgUZUfalmNmBUjbi', '2022-12-28 20:31:08'),
(13, 'paras@gmail.com', '$2y$10$HW1jzYnD.AJZ2Ggj37nZjuhJCBE/SYszX76DHE6.3WBjOx1gxd6gm', '2022-12-29 19:15:26'),
(14, 'tanujajuyal@gmail.com', '$2y$10$vjfDsiFXPuZZYHQJE2e8SO.Usb8g2jMJdFf1WXO/U4SaqI54Zpq0q', '2023-01-04 11:24:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
