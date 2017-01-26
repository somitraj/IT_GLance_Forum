-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2017 at 11:43 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itglance_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_tbl`
--

CREATE TABLE `address_tbl` (
  `id` int(11) NOT NULL,
  `local_address` varchar(255) DEFAULT NULL,
  `temporary_address` varchar(225) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_tbl`
--

CREATE TABLE `attendance_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `id` int(11) NOT NULL,
  `category` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'php', NULL, NULL),
(2, 'java', NULL, NULL),
(3, 'jquery', NULL, NULL),
(4, 'spring', NULL, NULL),
(5, 'angular', NULL, NULL),
(6, 'sql', NULL, NULL),
(7, 'css', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city_tbl`
--

CREATE TABLE `city_tbl` (
  `id` int(11) NOT NULL,
  `city` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_tbl`
--

INSERT INTO `city_tbl` (`id`, `city`, `created_at`, `updated_at`, `district_id`) VALUES
(1, 'kathmandu', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment_tbl`
--

CREATE TABLE `comment_tbl` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` varchar(1225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_tbl`
--

INSERT INTO `comment_tbl` (`id`, `post_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 11, 10, 'search in google', '2017-01-16 04:51:58', '2017-01-16 04:51:58'),
(4, 11, 10, 'use <link rel="stylesheet" type="text/css" href="mystyle.css">', '2017-01-16 04:51:58', '2017-01-16 04:51:58'),
(6, 10, 10, 'its AngularJS 2.0', '2017-01-16 04:53:55', '2017-01-16 04:53:55'),
(7, 8, 11, 'Java is a programming language and computing platform first released by Sun Microsystems in 1995. There are lots of applications and websites that will not work unless you have Java installed, and more are created every day. ', '2017-01-16 04:56:07', '2017-01-16 04:56:07'),
(10, 9, 11, 'go to w3schools.com', '2017-01-16 05:11:07', '2017-01-16 05:11:07'),
(11, 11, 11, 'go to w3schools.com', '2017-01-16 23:55:59', '2017-01-16 23:55:59'),
(12, 1, 11, 'you can download the file or put the files hyperlink', '2017-01-16 23:58:26', '2017-01-16 23:58:26'),
(14, 4, 11, 'goto https://www.ntu.edu.sg/home/ehchua/programming/java/JDBC_Basic.html', '2017-01-17 01:18:57', '2017-01-17 01:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `country_tbl`
--

CREATE TABLE `country_tbl` (
  `id` int(11) NOT NULL,
  `country` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_tbl`
--

INSERT INTO `country_tbl` (`id`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Nepal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `id` int(11) NOT NULL,
  `course_name` varchar(225) DEFAULT NULL,
  `course_description` varchar(225) DEFAULT NULL,
  `course_icon` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`id`, `course_name`, `course_description`, `course_icon`, `created_at`, `updated_at`) VALUES
(1, 'BIM', 'Bachelor in Information Management', NULL, NULL, NULL),
(2, 'BScCSIT', 'Bachelor in Science of Computer Science and Information Technology', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `district_tbl`
--

CREATE TABLE `district_tbl` (
  `id` int(11) NOT NULL,
  `district` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district_tbl`
--

INSERT INTO `district_tbl` (`id`, `district`, `created_at`, `updated_at`, `zone_id`) VALUES
(1, 'Kathmandu', NULL, NULL, 1),
(2, 'Lalitpur', NULL, NULL, 1),
(3, 'Bhaktapur', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_tbl`
--

CREATE TABLE `event_tbl` (
  `id` int(11) NOT NULL,
  `event_title` varchar(225) DEFAULT NULL,
  `event_description` varchar(1225) DEFAULT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `event_location` varchar(225) DEFAULT NULL,
  `event_image` varchar(225) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_tbl`
--

INSERT INTO `event_tbl` (`id`, `event_title`, `event_description`, `start_datetime`, `event_location`, `event_image`, `user_id`, `status_id`, `created_at`, `updated_at`, `end_datetime`) VALUES
(3, 'meeting', 'meeting soon', '2017-01-06 13:01:00', 'tudikhel', '1483608243.JPG', 5, 0, '2017-01-05 03:39:04', '2017-01-05 03:39:04', '2017-01-06 14:00:00'),
(12, 'assembly', 'we need to assemble', '2017-01-30 00:12:00', 'lainchaur', '1484119683.jpg', 10, 4, '2017-01-11 01:43:04', '2017-01-11 01:43:04', '2017-01-30 22:00:00'),
(14, 'Publication', 'need to discuss', '2017-01-11 15:00:00', 'auxfin building', '1484120183.jpg', 10, 4, '2017-01-11 01:51:24', '2017-01-11 01:51:24', '2017-01-11 19:00:00'),
(15, 'seminar', 'we need to attend the seminar', '2017-01-12 15:00:00', 'tudikhel', '1484206600.jpg', 10, NULL, '2017-01-12 01:51:41', '2017-01-12 01:51:41', '2017-01-16 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tbl`
--

CREATE TABLE `feedback_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(225) DEFAULT NULL,
  `body` varchar(1225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internship_detail_tbl`
--

CREATE TABLE `internship_detail_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `internship_started_date` date DEFAULT NULL,
  `internship_duration` int(11) DEFAULT NULL,
  `remarks` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `intern_project_tbl`
--

CREATE TABLE `intern_project_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `project_started_date` date DEFAULT NULL,
  `project_description` varchar(225) DEFAULT NULL,
  `project_status` varchar(225) DEFAULT NULL,
  `project_title` varchar(225) DEFAULT NULL,
  `project_duration` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `language_tbl`
--

CREATE TABLE `language_tbl` (
  `id` int(11) NOT NULL,
  `language` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language_tbl`
--

INSERT INTO `language_tbl` (`id`, `language`, `created_at`, `updated_at`) VALUES
(1, 'php', NULL, NULL),
(2, 'java', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message_status_tbl`
--

CREATE TABLE `message_status_tbl` (
  `id` int(11) NOT NULL,
  `message_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `is_read` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_status_tbl`
--

INSERT INTO `message_status_tbl` (`id`, `message_id`, `status_id`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 6, 4, NULL, '2017-01-26 01:59:37', '2017-01-26 01:59:37'),
(2, 3, 4, NULL, '2017-01-26 01:59:37', '2017-01-26 01:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `message_tbl`
--

CREATE TABLE `message_tbl` (
  `id` int(11) NOT NULL,
  `sender_userid` int(11) DEFAULT NULL,
  `receiver_userid` int(11) DEFAULT NULL,
  `message` varchar(1225) DEFAULT NULL,
  `subject` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_tbl`
--

INSERT INTO `message_tbl` (`id`, `sender_userid`, `receiver_userid`, `message`, `subject`, `created_at`, `updated_at`) VALUES
(1, 11, 10, 'hello', NULL, '2017-01-17 04:14:42', '2017-01-17 04:14:42'),
(2, 11, 10, 'hello friend', NULL, '2017-01-17 04:15:58', '2017-01-17 04:15:58'),
(3, 10, 11, 'how are you?', NULL, '2017-01-17 10:46:10', '2017-01-17 10:46:10'),
(4, 11, 5, 'oi hernaaaaa', NULL, '2017-01-25 00:54:47', '2017-01-25 00:54:47'),
(5, 11, 10, 'hello how are you?', NULL, '2017-01-26 01:54:30', '2017-01-26 01:54:30'),
(6, 11, 10, 'where are you?', NULL, '2017-01-26 01:59:37', '2017-01-26 01:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `posttype_tbl`
--

CREATE TABLE `posttype_tbl` (
  `id` int(11) NOT NULL,
  `post_type` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_tbl`
--

CREATE TABLE `post_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_title` varchar(225) DEFAULT NULL,
  `post_body` varchar(9225) DEFAULT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `post_type_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_tbl`
--

INSERT INTO `post_tbl` (`id`, `user_id`, `post_title`, `post_body`, `start_datetime`, `end_datetime`, `status_id`, `post_type_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 11, 'bootstrap include', '<p>How to include bootstrap in php?</p>', NULL, NULL, 3, NULL, 1, '2017-01-02 09:50:27', '2017-01-02 09:50:27'),
(2, 11, 'bootstrap include', '<p>How to include bootstrap in php?</p>', NULL, NULL, 4, NULL, 1, '2017-01-02 09:51:28', '2017-01-02 09:51:28'),
(3, 11, 'bootstrap include', '<p>How to include bootstrap in php?</p>', NULL, NULL, 4, NULL, 1, '2017-01-02 09:52:55', '2017-01-02 09:52:55'),
(4, 5, 'using jdbc', '<p>Hi folks I am new to java programming.Can anyone suggest me some good reading for JDBC connection. I have to connect my java program to a database. Also while searching on net i found the following statement a bit confusin', NULL, NULL, 3, NULL, 2, '2017-01-02 09:57:53', '2017-01-02 09:57:53'),
(5, 11, 'making dynamic search', '<p>how to make dynamic search?</p>\r\n<p>&nbsp;</p>', NULL, NULL, 3, NULL, 3, '2017-01-10 11:48:04', '2017-01-03 13:46:51'),
(6, 10, 'Basic jquery', '<p>What are the plugins necessary for using jquery?</p>', NULL, NULL, 4, NULL, 3, '2017-01-10 11:45:15', '2017-01-09 09:44:44'),
(7, 1, 'saving image to database', '<p>For ages I''ve been told not to store images on the database, or any big BLOB for that matter. While I can understand why the databases aren''t/weren''t efficient for that I never understood why they couldn''t. If I can put a file somewhere and reference it, why couldn''t the database engine do the same. How can I insert an image in MySQL and then retrieve it using PHP?</p>', NULL, NULL, 3, NULL, 1, '2017-01-09 16:43:57', '2017-01-09 16:43:57'),
(8, 10, 'About Java', '<p>What is Java?</p>', NULL, NULL, 3, NULL, 2, '2017-01-11 10:50:45', '2017-01-11 10:48:05'),
(9, 10, 'About php starting', '<p>hello everyone, &nbsp;new to php and i want to know what should i do as a beginner.</p>', NULL, NULL, 3, NULL, 1, '2017-01-12 08:38:08', '2017-01-12 08:37:25'),
(10, 5, 'basic', '<p>What is the latest version of angular js?</p>', NULL, NULL, 3, NULL, 5, '2017-01-13 07:07:10', '2017-01-13 07:07:10'),
(11, 11, 'using css', '<p>How to use external css?</p>', NULL, NULL, 3, NULL, 7, '2017-01-14 14:38:13', '2017-01-14 14:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `province_tbl`
--

CREATE TABLE `province_tbl` (
  `id` int(11) NOT NULL,
  `province` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province_tbl`
--

INSERT INTO `province_tbl` (`id`, `province`, `created_at`, `updated_at`) VALUES
(1, 'province1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skill_tbl`
--

CREATE TABLE `skill_tbl` (
  `id` int(11) NOT NULL,
  `skills` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_tbl`
--

CREATE TABLE `status_tbl` (
  `id` int(11) NOT NULL,
  `status` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_tbl`
--

INSERT INTO `status_tbl` (`id`, `status`, `created_at`, `updated_at`) VALUES
(0, 'active', NULL, NULL),
(1, 'inactice', NULL, NULL),
(3, 'publish', NULL, NULL),
(4, 'unpublish', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tag_tbl`
--

CREATE TABLE `tag_tbl` (
  `id` int(11) NOT NULL,
  `tagname` varchar(255) DEFAULT NULL,
  `tagcount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo_tbl`
--

CREATE TABLE `userinfo_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fname` varchar(225) DEFAULT NULL,
  `lname` varchar(225) DEFAULT NULL,
  `profile_image` varchar(225) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `course_type_id` int(11) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `skill_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `college` varchar(225) DEFAULT NULL,
  `language_type_id` int(11) DEFAULT NULL,
  `whylanguage` varchar(1225) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='\n';

--
-- Dumping data for table `userinfo_tbl`
--

INSERT INTO `userinfo_tbl` (`id`, `user_id`, `fname`, `lname`, `profile_image`, `mobile_no`, `email`, `course_type_id`, `gender`, `dob`, `address_id`, `course_id`, `skill_id`, `created_at`, `updated_at`, `phone_no`, `college`, `language_type_id`, `whylanguage`, `mname`) VALUES
(3, 1, 'somit', 'ranjit', '1483978073.JPG', NULL, 'sranjitkar@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, '2016-12-21 04:44:57', '2017-01-09 10:22:55', NULL, NULL, 1, NULL, ''),
(4, 2, 'ayush', 'maharjan', NULL, '2222', 'ranjitkarsomit@gmail.com', 2, '0', '1993-12-30', NULL, NULL, NULL, '2016-12-21 04:54:26', '2016-12-21 04:54:26', '1111', 'nccs', 1, NULL, 'singh'),
(5, 3, 's', 'r', NULL, '', 'ranjitkarsomit@gmail.com', 1, '', '2016-12-04', NULL, NULL, NULL, '2016-12-21 05:10:33', '2016-12-21 05:10:33', '', '', 1, NULL, ''),
(6, 5, 'suraj', 'shrestha', '1483977285.jpg', '21231', 'bikash279051@gmail.com', 2, '0', '2016-12-04', NULL, NULL, NULL, '2016-12-21 05:30:02', '2017-01-09 10:09:47', '1111', '', 2, NULL, NULL),
(10, 10, 'somit', 'ranjitkar', '1484206436.JPG', '9841664813', 'ranjitkarsomit@gmail.com', 2, '0', '1994-01-10', NULL, NULL, NULL, '2016-12-21 09:53:59', '2017-01-12 01:48:57', '424244', 'N.C.C.S ', 1, NULL, 'raj'),
(11, 11, 'ayush', 'singh', '1483977153.jpg', '4257000', 'ayu@y.com', 1, '0', '2000-12-12', NULL, NULL, NULL, '2016-12-28 10:51:15', '2017-01-09 10:07:36', '9841000000', 'NCCS college', 2, NULL, 'man'),
(12, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-01-02 03:32:33', '2017-01-02 03:32:33', NULL, NULL, 2, NULL, NULL),
(13, 13, 'pragita', 'suwal', NULL, '9841001100', 'p@gmail.com', 2, '1', '1994-01-07', NULL, NULL, NULL, '2017-01-08 06:14:31', '2017-01-08 06:14:31', '981345000', 'NCCS', 1, 'this is great', 's'),
(14, 14, 'Aashish', 'Chapagain', '1484210874.jpg', '9841001100', 'aashishchapagain@gmail.com', 1, '0', '1992-06-06', NULL, NULL, NULL, '2017-01-12 02:56:38', '2017-01-12 03:02:57', '981345000', 'nccs', 1, 'cause i know this language', ''),
(15, 15, 'ayush', 'singh', NULL, '9841001100', 'ayu@y.com', 2, '0', '1992-12-01', NULL, NULL, NULL, '2017-01-14 08:32:41', '2017-01-14 08:32:41', '981345000', 'abc', 1, 'great', 's');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `user_type_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'somitranjit', '$2y$10$y18tX1JorKhMhYI2RpLyAOJ5paTO62eIvmv/XtwY0ZzK5FCirVPse', 'sranjitkar@gmail.com', 2, 1, '2016-12-21 05:02:28', '2016-12-21 05:02:28'),
(2, NULL, NULL, 'ranjitkarsomit@gmail.com', 4, 0, '2016-12-21 05:03:27', '2016-12-21 05:03:27'),
(3, '', NULL, 'ranjitkarsomit@gmail.com', NULL, 0, '2016-12-21 05:10:33', '2016-12-21 05:10:33'),
(5, 'surajshe', '$2y$10$zxHIwdACpQNbf1rMkpdfgey8OuMDRw65srQDVNGw9vVwCAQYTKsbS', 'bikash279051@gmail.com', 3, 1, '2016-12-21 05:30:02', '2016-12-21 05:30:02'),
(10, 'somit', '$2y$10$2tK7X7xa1bVlZ8o8iBE5DuHcO.NsBCDF6HwTcKQLVAL32NJ5Wp3W.', 'ranjitkarsomit@gmail.com', 1, 1, '2016-12-26 18:15:00', '2016-12-26 18:15:00'),
(11, 'ayushsingh', '$2y$10$JZGcqV5fXYwp4yUI9ZhRoOcWJ7j.GFujFw/GNhw6uoUdqvrT4I.ce', 'ayu@y.com', 4, 1, '2016-12-28 10:51:14', '2016-12-28 10:51:14'),
(12, NULL, NULL, NULL, NULL, 0, '2017-01-02 03:32:33', '2017-01-02 03:32:33'),
(13, NULL, NULL, 'p@gmail.com', NULL, 0, '2017-01-08 06:14:30', '2017-01-08 06:14:30'),
(14, 'AashishChapagain', '$2y$10$FkpocLOPso8yrGVlfcOloOFm/K7hgJRqDkfu6bunmILl98af7WkJ2', 'aashishchapagain@gmail.com', 4, 1, '2017-01-12 02:56:38', '2017-01-12 02:56:38'),
(15, NULL, NULL, 'ayu@y.com', NULL, 0, '2017-01-14 08:32:41', '2017-01-14 08:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `usertype_tbl`
--

CREATE TABLE `usertype_tbl` (
  `id` int(11) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype_tbl`
--

INSERT INTO `usertype_tbl` (`id`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'mentor', NULL, NULL),
(3, 'submentor', NULL, NULL),
(4, 'intern', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `working_tbl`
--

CREATE TABLE `working_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(225) DEFAULT NULL,
  `started_date` date DEFAULT NULL,
  `company_address` varchar(225) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `working_position` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zone_tbl`
--

CREATE TABLE `zone_tbl` (
  `id` int(11) NOT NULL,
  `zone` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone_tbl`
--

INSERT INTO `zone_tbl` (`id`, `zone`, `created_at`, `updated_at`, `country_id`) VALUES
(1, 'Bagmati', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_tbl`
--
ALTER TABLE `address_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_country` (`country_id`),
  ADD KEY `fk_zone` (`zone_id`),
  ADD KEY `fk_district` (`district_id`),
  ADD KEY `fk_city` (`city_id`),
  ADD KEY `fk_province` (`province_id`);

--
-- Indexes for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_atten` (`user_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_tbl`
--
ALTER TABLE `city_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkdistrict` (`district_id`);

--
-- Indexes for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post3` (`post_id`),
  ADD KEY `fk_userid` (`user_id`);

--
-- Indexes for table `country_tbl`
--
ALTER TABLE `country_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district_tbl`
--
ALTER TABLE `district_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_zone1` (`zone_id`);

--
-- Indexes for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkevent` (`user_id`),
  ADD KEY `fkeventstatus` (`status_id`);

--
-- Indexes for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user2` (`user_id`);

--
-- Indexes for table `internship_detail_tbl`
--
ALTER TABLE `internship_detail_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkuser2` (`user_id`);

--
-- Indexes for table `intern_project_tbl`
--
ALTER TABLE `intern_project_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkuser` (`user_id`),
  ADD KEY `fkstatus` (`status_id`);

--
-- Indexes for table `language_tbl`
--
ALTER TABLE `language_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_status_tbl`
--
ALTER TABLE `message_status_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_msgs` (`message_id`),
  ADD KEY `fk_statusm` (`status_id`);

--
-- Indexes for table `message_tbl`
--
ALTER TABLE `message_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sender` (`sender_userid`),
  ADD KEY `fk_receiver` (`receiver_userid`);

--
-- Indexes for table `posttype_tbl`
--
ALTER TABLE `posttype_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tbl`
--
ALTER TABLE `post_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user22` (`user_id`),
  ADD KEY `fk_status22` (`status_id`),
  ADD KEY `fk_posttype22` (`post_type_id`),
  ADD KEY `fk_category22` (`category_id`);

--
-- Indexes for table `province_tbl`
--
ALTER TABLE `province_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_tbl`
--
ALTER TABLE `skill_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_tbl`
--
ALTER TABLE `status_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_tbl`
--
ALTER TABLE `tag_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo_tbl`
--
ALTER TABLE `userinfo_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_course` (`course_type_id`),
  ADD KEY `fk_address` (`address_id`),
  ADD KEY `fk_skill` (`skill_id`),
  ADD KEY `fk_langauge` (`language_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usertype` (`user_type_id`),
  ADD KEY `fk_status` (`status_id`);

--
-- Indexes for table `usertype_tbl`
--
ALTER TABLE `usertype_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_tbl`
--
ALTER TABLE `working_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkuserworking` (`user_id`);

--
-- Indexes for table `zone_tbl`
--
ALTER TABLE `zone_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkcountry` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_tbl`
--
ALTER TABLE `address_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `city_tbl`
--
ALTER TABLE `city_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `country_tbl`
--
ALTER TABLE `country_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `district_tbl`
--
ALTER TABLE `district_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `event_tbl`
--
ALTER TABLE `event_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `internship_detail_tbl`
--
ALTER TABLE `internship_detail_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `intern_project_tbl`
--
ALTER TABLE `intern_project_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language_tbl`
--
ALTER TABLE `language_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `message_status_tbl`
--
ALTER TABLE `message_status_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `message_tbl`
--
ALTER TABLE `message_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `posttype_tbl`
--
ALTER TABLE `posttype_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_tbl`
--
ALTER TABLE `post_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `province_tbl`
--
ALTER TABLE `province_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `skill_tbl`
--
ALTER TABLE `skill_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status_tbl`
--
ALTER TABLE `status_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tag_tbl`
--
ALTER TABLE `tag_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userinfo_tbl`
--
ALTER TABLE `userinfo_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `usertype_tbl`
--
ALTER TABLE `usertype_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `working_tbl`
--
ALTER TABLE `working_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `zone_tbl`
--
ALTER TABLE `zone_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_tbl`
--
ALTER TABLE `address_tbl`
  ADD CONSTRAINT `fk_city` FOREIGN KEY (`city_id`) REFERENCES `city_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_country` FOREIGN KEY (`country_id`) REFERENCES `country_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_district` FOREIGN KEY (`district_id`) REFERENCES `district_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_province` FOREIGN KEY (`province_id`) REFERENCES `province_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_zone` FOREIGN KEY (`zone_id`) REFERENCES `zone_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  ADD CONSTRAINT `fk_atten` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `city_tbl`
--
ALTER TABLE `city_tbl`
  ADD CONSTRAINT `fkdistrict` FOREIGN KEY (`district_id`) REFERENCES `district_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  ADD CONSTRAINT `fk_post3` FOREIGN KEY (`post_id`) REFERENCES `post_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `district_tbl`
--
ALTER TABLE `district_tbl`
  ADD CONSTRAINT `fk_zone1` FOREIGN KEY (`zone_id`) REFERENCES `zone_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD CONSTRAINT `fkevent` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkeventstatus` FOREIGN KEY (`status_id`) REFERENCES `status_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  ADD CONSTRAINT `fk_user2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `internship_detail_tbl`
--
ALTER TABLE `internship_detail_tbl`
  ADD CONSTRAINT `fkuser2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `intern_project_tbl`
--
ALTER TABLE `intern_project_tbl`
  ADD CONSTRAINT `fkstatus` FOREIGN KEY (`status_id`) REFERENCES `status_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `message_status_tbl`
--
ALTER TABLE `message_status_tbl`
  ADD CONSTRAINT `fk_msgs` FOREIGN KEY (`message_id`) REFERENCES `message_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_statusm` FOREIGN KEY (`status_id`) REFERENCES `status_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `message_tbl`
--
ALTER TABLE `message_tbl`
  ADD CONSTRAINT `fk_receiver` FOREIGN KEY (`receiver_userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sender` FOREIGN KEY (`sender_userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post_tbl`
--
ALTER TABLE `post_tbl`
  ADD CONSTRAINT `fk_category22` FOREIGN KEY (`category_id`) REFERENCES `category_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_posttype22` FOREIGN KEY (`post_type_id`) REFERENCES `posttype_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_status22` FOREIGN KEY (`status_id`) REFERENCES `status_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user22` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `userinfo_tbl`
--
ALTER TABLE `userinfo_tbl`
  ADD CONSTRAINT `fk_address` FOREIGN KEY (`address_id`) REFERENCES `address_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_course` FOREIGN KEY (`course_type_id`) REFERENCES `course_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_langauge` FOREIGN KEY (`language_type_id`) REFERENCES `language_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_skill` FOREIGN KEY (`skill_id`) REFERENCES `skill_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`status_id`) REFERENCES `status_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usertype` FOREIGN KEY (`user_type_id`) REFERENCES `usertype_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `working_tbl`
--
ALTER TABLE `working_tbl`
  ADD CONSTRAINT `fkuserworking` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zone_tbl`
--
ALTER TABLE `zone_tbl`
  ADD CONSTRAINT `fkcountry` FOREIGN KEY (`country_id`) REFERENCES `country_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
