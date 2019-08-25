-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2019 at 05:18 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

DROP TABLE IF EXISTS `court`;
CREATE TABLE IF NOT EXISTS `court` (
  `court_id` int(11) NOT NULL AUTO_INCREMENT,
  `court_hash_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dist_id` int(11) NOT NULL,
  `court_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `court_name_bn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `court_status` int(11) NOT NULL,
  PRIMARY KEY (`court_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1788 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`court_id`, `court_hash_id`, `dist_id`, `court_name_en`, `court_name_bn`, `created_at`, `updated_at`, `court_status`) VALUES
(322, '60102fd98d40ca5a6de4caa17bdc36c1', 36, 'District Judge Court', 'জেলা জজ আদালত', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(323, 'c4c5ecf0cba23955570f0fd488e0f06c', 36, 'Special Judge Court', 'বিশেষ জজ আদালত', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(324, 'c9518b939094fa50e203193a0e4015f5', 36, 'Women and Children Repression Retention Tribunal', 'নারী ও শিশু নির্যাতন দমন ট্রাইব্যুনাল ', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(325, '3ae2f94faeeb33cdd1714b119fc4d9e3', 36, 'Additional District and Sessions Judge, 1st Court', 'অতিরিক্ত জেলা ও দায়রা জজ, ১ম আদালত', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(326, '77bd82a0e4f08a185c9c8c247626072a', 36, 'Joint District and Sessions Judge, 1st Court', 'যুগ্ম জেলা ও দায়রা জজ, ১ম আদালত', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(327, '371204f3a311e4912ba2c858cdafcacf', 36, 'Joint District and Sessions Judge, 2nd Court', 'যুগ্ম জেলা ও দায়রা জজ, ২য় আদালত', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(328, 'ac24a74de2453a02aa21d29ed471f0d1', 36, 'Assistant Judge, Additional court', 'সহকারী জজ, অতিরিক্ত আদালত', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(329, '2f44451067d948d7de45843536e1d238', 36, 'Joint District and Sessions Judge, Additional court', 'যুগ্ম জেলা ও দায়রা জজ, অতিরিক্ত আদালত', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(330, '29e384d1ec5c152390a6476486713f74', 36, 'Additional District and Sessions Judge, 2nd Court', 'অতিরিক্ত জেলা ও দায়রা জজ, ২য় আদালত', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(331, '247b596beccb8b63e23851fbe89546bc', 36, 'Assistant Judge Court, Bheramara', 'সহকারী জজ আদালত, ভেড়ামারা', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(332, '006d33ff189e327c0a2a44532a845d97', 36, 'Assistant Judge Court, Mirpur', 'সহকারী জজ আদালত, মিরপুর', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(333, 'ad2ba188403e1f6ce8a90cc01c34d291', 36, 'Assistant Judge Court, Kumarkhali', 'সহকারী জজ আদালত, কুমারখালী', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(334, '9b049bd0c3bd22f49e8db836b3ec2c56', 36, 'Senior Assistant Judge Court, Daulatpur', 'সিনিয়র সহকারী জজ আদালত, দৌলতপুর', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(335, '362072c432118aa71bf6a92fd063cad7', 36, 'Senior Assistant Judge Court,Sadar', 'সিনিয়র সহকারী জজ আদালত, সদর', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(336, '8da486a8aaf01e42fafb88ea857d1284', 36, 'Assistant Judge Court, Khosa', 'সহকারী জজ আদালত, খোকসা', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(337, '2875aa38bcd0f8dab90a9c253145c3d4', 36, 'Chief Judicial Magistrate Court', 'চীফ জুডিসিয়াল ম্যাজিস্ট্রেট আদালত', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(338, '423c3934a43e7dadd87ae15af47bc8b8', 36, 'Judicial magistrate -1', 'জুডিসিয়াল ম্যাজিস্ট্রেট -১', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(339, 'ae18d9fd761164de1819673d47c7a2aa', 36, 'Judicial magistrate -2', 'জুডিসিয়াল ম্যাজিস্ট্রেট -২', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(340, 'ff83c302501d41c460e74f9dc139c0ac', 36, 'Judicial magistrate -3', 'জুডিসিয়াল ম্যাজিস্ট্রেট -৩', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(341, 'bde83ca8a0ed0ef831b5accecff4ad79', 36, 'Judicial magistrate -4', 'জুডিসিয়াল ম্যাজিস্ট্রেট -৪', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(342, '0508aa63facd3cc5957125a9ee1503bc', 36, 'Senior Judicial Magistrate -1', 'সিনিয়র জুডিসিয়াল ম্যাজিস্ট্রেট -১', '2019-05-06 09:43:47', '2019-05-06 09:43:47', 1),
(343, '09a370eaeb9dd00cf7a49c2e197efe51', 36, 'Senior Judicial Magistrate -2', 'সিনিয়র জুডিসিয়াল ম্যাজিস্ট্রেট -২', '2019-05-06 09:43:48', '2019-05-06 09:43:48', 1),
(344, '29ff5c6b9b870d8ae8bb1b376f07dd58', 36, 'Senior Judicial Magistrate -3', 'সিনিয়র জুডিসিয়াল ম্যাজিস্ট্রেট -৩', '2019-05-06 09:43:48', '2019-05-06 09:43:48', 1),
(345, 'bb4439d64086e22b4a4b8d27411ef684', 36, 'Additional Chief Judicial Magistrate', 'অতিরিক্ত চীফ জুডিসিয়াল ম্যাজিস্ট্রেট', '2019-05-06 09:43:48', '2019-05-06 09:43:48', 1),
(346, '4637fd5818ce9a13c4a69172c0e23f9c', 36, 'Children\'s Court', 'শিশু আদালত', '2019-05-06 09:43:48', '2019-05-06 09:43:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `dist_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_hash_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dist_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dist_name_bn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dist_status` int(11) NOT NULL,
  PRIMARY KEY (`dist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dist_id`, `dist_hash_id`, `dist_name_en`, `dist_name_bn`, `created_at`, `updated_at`, `dist_status`) VALUES
(36, '35350f6fecd191c04150946d16edd61c', 'Kushtia', 'কুষ্টিয়া', '2019-06-09 18:00:00', '2019-05-06 09:40:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_hash_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `witness_name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `case_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hearing_time` datetime NOT NULL,
  `sms` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_status` int(11) NOT NULL,
  `statuses` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loginlimit`
--

DROP TABLE IF EXISTS `tbl_loginlimit`;
CREATE TABLE IF NOT EXISTS `tbl_loginlimit` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ipAddress` varchar(255) NOT NULL,
  `timeDiff` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_hash_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `court_id` int(11) NOT NULL,
  `user_name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_hash_id`, `court_id`, `user_name`, `password`, `created_at`, `updated_at`, `user_status`) VALUES
(3, 'fea9ebd024a503e0f7d015700e3f1256', 322, 'Test User', '$2a$08$EE3EJRxUm7g6JlXpuLNn4uW7yns2ZNQd0n7Yck4TVTCXDkSWv.2di', '2019-05-15 04:31:29', '2019-05-15 04:32:20', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
