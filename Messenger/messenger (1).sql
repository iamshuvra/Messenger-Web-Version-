-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2020 at 01:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messenger`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE `chatting` (
  `created` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(0, 15, 16, 'hii', '2020-04-04 07:21:40', 2),
(0, 15, 16, '?', '2020-04-04 07:22:07', 2),
(0, 15, 16, '?', '2020-04-04 07:22:20', 2),
(0, 15, 16, 'yoooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', '2020-04-04 07:22:34', 2),
(0, 0, 16, 'hjvh', '2020-04-04 07:23:05', 2),
(0, 19, 1, 'n n', '2020-04-09 03:58:55', 2),
(0, 4, 1, 'yooooooooo', '2020-04-09 05:37:25', 2),
(0, 4, 1, 'yooooooooo', '2020-04-09 05:37:32', 2),
(0, 4, 1, 'yooooooooo', '2020-04-09 05:37:33', 2),
(0, 4, 1, 'yooooooooo', '2020-04-09 05:37:34', 2),
(0, 4, 1, 'hvhv', '2020-04-09 05:37:39', 2),
(0, 9, 1, 'b cnx', '2020-04-09 05:38:46', 2),
(0, 9, 1, 'b cnx', '2020-04-09 05:39:31', 2),
(0, 18, 1, 'sc', '2020-04-09 05:39:45', 2),
(0, 18, 1, 'mc', '2020-04-09 05:40:35', 2),
(0, 18, 1, 'mc', '2020-04-09 05:40:39', 2),
(0, 19, 1, 'hbh', '2020-04-09 05:44:55', 2),
(0, 19, 1, 'hbh', '2020-04-09 05:45:21', 2),
(0, 19, 1, 'n cn', '2020-04-09 05:48:32', 2),
(0, 18, 1, 'nb n', '2020-04-09 05:54:32', 2),
(0, 18, 1, 'nb n', '2020-04-09 05:54:35', 2),
(0, 19, 1, 'mn', '2020-04-09 05:55:06', 2),
(0, 19, 1, 'mn', '2020-04-09 05:55:07', 2),
(0, 19, 1, 'mn', '2020-04-09 05:55:07', 2),
(0, 19, 1, 'mn', '2020-04-09 05:55:07', 2),
(0, 18, 1, 'vcb', '2020-04-09 06:15:00', 2),
(0, 4, 1, 'gn', '2020-04-09 06:20:20', 2),
(0, 4, 1, 'hhhhh', '2020-04-09 07:04:58', 2),
(0, 4, 1, 'hhhhh', '2020-04-09 07:05:27', 2),
(0, 4, 1, 'bvb', '2020-04-09 07:17:03', 2),
(0, 1, 20, 'hi', '2020-04-18 16:54:59', 2),
(0, 1, 20, 'hi', '2020-04-18 16:55:09', 2),
(0, 1, 20, 'hi', '2020-04-18 16:55:12', 2),
(0, 1, 20, 'hi', '2020-04-18 16:55:13', 2),
(0, 1, 20, 'hi', '2020-04-18 16:55:14', 2),
(0, 1, 20, 'hi', '2020-04-18 16:55:14', 2),
(0, 1, 20, 'hi', '2020-04-18 16:55:18', 2),
(0, 1, 20, 'hi', '2020-04-18 16:55:19', 2),
(0, 1, 20, 'hi', '2020-04-18 16:55:23', 2),
(0, 1, 20, 'hi', '2020-04-18 16:55:24', 2),
(0, 1, 20, ';', '2020-04-18 18:46:41', 2),
(0, 1, 20, ';', '2020-04-18 18:46:43', 2),
(0, 20, 1, 'll', '2020-04-18 20:27:43', 2),
(0, 20, 1, 'll', '2020-04-18 20:27:46', 2),
(0, 20, 1, 'll', '2020-04-18 20:27:47', 2),
(0, 20, 1, 'll', '2020-04-18 20:27:47', 2),
(0, 20, 1, 'll', '2020-04-18 20:27:48', 2),
(0, 18, 1, 'hi', '2020-04-22 18:12:10', 2),
(0, 18, 1, 'hi', '2020-04-22 18:12:11', 2),
(0, 18, 1, 'hi', '2020-04-22 18:12:15', 2),
(0, 20, 1, 'lol', '2020-04-22 18:51:18', 2),
(0, 20, 1, 'lol', '2020-04-22 18:51:19', 2),
(0, 20, 1, 'lol', '2020-04-22 18:51:21', 2),
(0, 20, 1, 'lol', '2020-04-22 18:51:21', 2),
(0, 20, 1, 'lol', '2020-04-22 18:51:24', 2),
(0, 20, 1, 'lol', '2020-04-22 18:51:24', 2),
(0, 20, 1, 'lol', '2020-04-22 18:51:25', 2),
(0, 20, 1, 'lol', '2020-04-22 18:51:25', 2),
(0, 20, 1, 'lol', '2020-04-22 18:51:25', 2),
(0, 20, 1, 'lol', '2020-04-22 18:51:25', 2),
(0, 4, 1, 'gg', '2020-04-23 07:28:02', 2),
(0, 4, 1, 'gg', '2020-04-23 07:28:05', 2),
(0, 4, 1, 's', '2020-04-23 11:11:36', 1),
(0, 4, 1, 's', '2020-04-23 11:11:37', 1),
(0, 4, 1, 's', '2020-04-23 11:11:37', 1),
(0, 4, 1, 'sdd', '2020-04-23 11:11:45', 1),
(0, 4, 1, 'sdd', '2020-04-23 11:11:46', 1),
(0, 4, 1, 'sdd', '2020-04-23 11:11:46', 1),
(0, 4, 1, 'sdd', '2020-04-23 11:11:46', 1),
(0, 4, 1, 'sdd', '2020-04-23 11:11:47', 1),
(0, 4, 1, 'sdd', '2020-04-23 11:11:47', 1),
(0, 4, 1, 'sdd', '2020-04-23 11:11:47', 1),
(0, 4, 1, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', '2020-04-24 05:33:32', 1),
(0, 20, 1, 'KKKKKKKKKKKKKKKKKKKKKKkkkkkkkkkkkkk', '2020-05-02 09:08:16', 0),
(0, 20, 1, 'KKKKKKKKKKKKKKKKKKKKKKkkkkkkkkkkkkk', '2020-05-02 09:08:21', 0),
(0, 20, 1, 'KKKKKKKKKKKKKKKKKKKKKKkkkkkkkkkkkkk', '2020-05-02 09:08:22', 0),
(0, 20, 1, 'KKKKKKKKKKKKKKKKKKKKKKkkkkkkkkkkkkk100', '2020-05-02 09:09:00', 0),
(0, 1, 20, 'chat message', '2020-05-11 06:07:37', 1),
(0, 1, 20, 'chat message', '2020-05-11 06:07:41', 1),
(0, 19, 20, 'this is so hard', '2020-05-11 10:06:11', 1),
(0, 19, 20, 'm', '2020-05-11 10:06:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `faq_que_id` int(11) NOT NULL,
  `question_text` varchar(300) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_questions`
--

INSERT INTO `faq_questions` (`faq_que_id`, `question_text`, `timestamp`) VALUES
(35, 'jwnfdksjn', '2020-04-06 19:01:04'),
(36, 'q2?', '2020-04-07 12:08:09'),
(37, 'hvh', '2020-04-09 12:35:44'),
(53, ' hiiiiiiiiiiiiiiiiiiii?', '2020-04-09 21:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `group_chat`
--

CREATE TABLE `group_chat` (
  `id` int(100) NOT NULL,
  `from_user_id` int(100) DEFAULT NULL,
  `message` varchar(10000) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_chat`
--

INSERT INTO `group_chat` (`id`, `from_user_id`, `message`, `username`, `Time`) VALUES
(97, 20, 'done :)', 'arshad', '2020-05-11 11:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(20) NOT NULL,
  `user_id` int(200) NOT NULL,
  `last_activity` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`) VALUES
(1, 16, '2020-04-04 00:00:00'),
(2, 16, '0000-00-00 00:00:00'),
(3, 16, '0000-00-00 00:00:00'),
(4, 16, '2020-04-04 00:00:00'),
(5, 15, '2020-04-04 14:26:25'),
(6, 15, '2020-04-04 00:00:00'),
(7, 16, '2020-04-04 14:26:40'),
(8, 15, '2020-04-04 19:07:26'),
(9, 16, '2020-04-04 19:07:44'),
(10, 15, '2020-04-04 19:26:43'),
(11, 16, '2020-04-04 20:25:58'),
(12, 16, '2020-04-04 19:33:09'),
(13, 16, '0000-00-00 00:00:00'),
(14, 16, '2020-04-06 12:43:07'),
(15, 16, '0000-00-00 00:00:00'),
(16, 16, '0000-00-00 00:00:00'),
(17, 16, '0000-00-00 00:00:00'),
(18, 16, '0000-00-00 00:00:00'),
(19, 19, '0000-00-00 00:00:00'),
(20, 16, '2020-04-09 14:51:17'),
(21, 1, '2020-04-09 19:34:57'),
(22, 20, '2020-04-18 22:52:58'),
(23, 20, '2020-04-19 02:03:21'),
(24, 1, '2020-04-19 02:09:45'),
(25, 20, '2020-04-19 02:27:21'),
(26, 1, '2020-04-19 03:55:31'),
(27, 1, '2020-04-22 23:17:22'),
(28, 1, '0000-00-00 00:00:00'),
(29, 1, '2020-04-24 14:30:40'),
(30, 1, '2020-04-24 14:31:04'),
(31, 20, '2020-04-24 14:35:55'),
(32, 20, '2020-04-26 16:31:14'),
(33, 20, '2020-05-01 21:01:29'),
(34, 1, '2020-05-01 22:17:17'),
(35, 20, '2020-05-01 22:55:59'),
(36, 1, '2020-05-01 22:58:37'),
(37, 20, '2020-05-01 23:53:07'),
(38, 1, '2020-05-02 15:23:15'),
(39, 20, '2020-05-02 23:11:51'),
(40, 20, '2020-05-02 18:55:33'),
(41, 1, '2020-05-02 23:11:50'),
(42, 20, '0000-00-00 00:00:00'),
(43, 1, '0000-00-00 00:00:00'),
(44, 1, '2020-05-11 12:05:06'),
(45, 20, '0000-00-00 00:00:00'),
(46, 20, '0000-00-00 00:00:00'),
(47, 20, '2020-05-11 02:28:13'),
(48, 20, '2020-05-11 15:50:30'),
(49, 1, '0000-00-00 00:00:00'),
(50, 1, '0000-00-00 00:00:00'),
(51, 20, '2020-05-11 15:51:31'),
(52, 20, '0000-00-00 00:00:00'),
(53, 1, '2020-05-11 15:54:05'),
(54, 20, '2020-05-11 17:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

CREATE TABLE `question_answers` (
  `que_ans_id` int(11) NOT NULL,
  `que_answer` text NOT NULL,
  `faq_que_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_answers`
--

INSERT INTO `question_answers` (`que_ans_id`, `que_answer`, `faq_que_id`, `timestamp`) VALUES
(56, 'ncksank', 35, '2020-04-06 19:01:16'),
(57, 'm cms ', 35, '2020-04-06 19:01:28'),
(58, ' j  k ', 35, '2020-04-07 12:07:56'),
(59, 'yes', 36, '2020-04-07 12:08:18'),
(60, 'hvhvhhhhhhhhhhhh', 36, '2020-04-09 23:27:48'),
(61, 'ghcgc', 35, '2020-04-09 23:29:54'),
(62, 'hvh', 36, '2020-04-09 23:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `user_id` int(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT 'n/a',
  `gender` varchar(10) DEFAULT 'n/a',
  `dob` date DEFAULT NULL,
  `image` longtext NOT NULL,
  `aboutme` text NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`user_id`, `phone`, `username`, `password`, `email`, `name`, `gender`, `dob`, `image`, `aboutme`) VALUES
(1, '123', 'n', 'n', 'n@gmail.com', 'n/a', 'n/a', NULL, 'upload/chat9.jpg', 'N/A'),
(4, '234', 'z', 'z', 'z@gmail.com', 'n/a', 'n/a', NULL, 'images/user.png', 'N/A'),
(9, '99', 'k', 'k', 'k@gmail.com', 'n/a', 'n/a', NULL, 'images/user.png', 'N/A'),
(18, '12', 'm', '6f8f57715090da2632453988d9a1501b', 'm@gmail.com', ' no name', 'no gender', '0000-00-00', 'images/user.png', 'N/A'),
(19, '67', 't', 't', 'tt@gmail.com', ' no name', 'no gender', '0000-00-00', 'images/user.png', ' N/A'),
(20, 'arshad', 'arshad', 'a', 'arshad.shahoriar15@gmail.com', ' no name', 'no gender', '0000-00-00', 'upload/chat8.jpg', 'N/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`faq_que_id`);

--
-- Indexes for table `group_chat`
--
ALTER TABLE `group_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `question_answers`
--
ALTER TABLE `question_answers`
  ADD PRIMARY KEY (`que_ans_id`),
  ADD KEY `con26` (`faq_que_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `faq_que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `group_chat`
--
ALTER TABLE `group_chat`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `question_answers`
--
ALTER TABLE `question_answers`
  MODIFY `que_ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question_answers`
--
ALTER TABLE `question_answers`
  ADD CONSTRAINT `con26` FOREIGN KEY (`faq_que_id`) REFERENCES `faq_questions` (`faq_que_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
