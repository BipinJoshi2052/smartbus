-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 08:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartbus`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_journal_vouchers`
--

CREATE TABLE `ac_journal_vouchers` (
  `id` bigint(20) NOT NULL,
  `journal_code` varchar(280) COLLATE utf8_swedish_ci NOT NULL,
  `remarks` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `debit_total` double(100,2) NOT NULL,
  `credit_total` double(100,2) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `transaction_date` date NOT NULL,
  `created_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ac_ledgers`
--

CREATE TABLE `ac_ledgers` (
  `id` bigint(20) NOT NULL,
  `ledger_code` varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  `name` mediumtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `opening_balance` double NOT NULL,
  `totaldebit` double NOT NULL,
  `totalcredit` double NOT NULL,
  `balance` double NOT NULL,
  `credit_days` int(11) DEFAULT NULL,
  `credit_interest_rate` double NOT NULL,
  `ledger_type` bigint(20) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_permanent` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ac_ledger_entry`
--

CREATE TABLE `ac_ledger_entry` (
  `id` bigint(20) NOT NULL,
  `entry_group` bigint(20) DEFAULT NULL,
  `ledger_id` bigint(20) NOT NULL,
  `tr_date` date NOT NULL,
  `particular` varchar(128) COLLATE utf8_swedish_ci DEFAULT NULL,
  `remarks` mediumtext COLLATE utf8_swedish_ci NOT NULL,
  `debit` double(64,2) NOT NULL,
  `credit` double(64,2) NOT NULL,
  `journal_id` bigint(20) DEFAULT NULL,
  `transaction_id` bigint(20) DEFAULT NULL,
  `booking_id` bigint(20) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) NOT NULL,
  `is_ob` tinyint(4) NOT NULL,
  `tax_type` varchar(128) COLLATE utf8_swedish_ci DEFAULT NULL,
  `tax_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ac_ledger_type`
--

CREATE TABLE `ac_ledger_type` (
  `id` bigint(20) NOT NULL,
  `type` varchar(120) COLLATE utf8_swedish_ci NOT NULL,
  `remark` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `operator` varchar(16) COLLATE utf8_swedish_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ac_taxes`
--

CREATE TABLE `ac_taxes` (
  `id` bigint(20) NOT NULL,
  `name` longtext COLLATE utf8_swedish_ci NOT NULL,
  `rate` float NOT NULL,
  `remarks` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `opperator` set('+','-') COLLATE utf8_swedish_ci NOT NULL DEFAULT '+',
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` bigint(20) NOT NULL,
  `name` longtext COLLATE utf8_swedish_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `alt_text` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `title` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `image` varchar(64) COLLATE utf8_swedish_ci DEFAULT NULL,
  `price` double NOT NULL,
  `company` varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  `contact_person` varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  `phone` varchar(64) COLLATE utf8_swedish_ci DEFAULT 'NULL',
  `email` mediumtext COLLATE utf8_swedish_ci DEFAULT 'NULL',
  `address` longtext COLLATE utf8_swedish_ci NOT NULL,
  `display_on` longtext COLLATE utf8_swedish_ci NOT NULL,
  `display_order` int(11) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `expiring_on` date NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `name`, `type`, `alt_text`, `title`, `content`, `image`, `price`, `company`, `contact_person`, `phone`, `email`, `address`, `display_on`, `display_order`, `created_by`, `created_on`, `expiring_on`, `is_active`) VALUES
(1, 'rosalyn livingstonasdfa', 0, 'Atque nemo aut elit', 'Dolorem commodi anim', 'Fuga Aute velit dol', '15822720966.jpg', 257, 'Valdez and Colon Trading', 'Eum officia velit b', '+1 (544) 815-7185', 'mytymonof@mailinator.com', 'Qui facere saepe eli', '', 0, 1, '2020-02-22 10:00:16', '2020-04-17', 1),
(2, 'kathleen decker', 0, 'Nostrum aut eum opti', 'Et maiores incididun', 'Sint explicabo Nes', '15822738232.jpg', 383, 'Kirk Abbott Plc', 'Sapiente voluptas re', '+1 (401) 325-1968', 'dosyre@mailinator.net', 'Ea incididunt id vit', '', 0, 1, '2020-02-21 14:15:23', '1993-06-17', 0),
(3, 'octavius byers', 0, 'Quis commodo volupta', 'Velit aut eum soluta', 'Accusamus consequunt', '1582381010.webp', 737, 'Conner Rios LLC', 'Totam ex exercitatio', '+1 (507) 193-2607', 'nuri@mailinator.com', 'Sed excepturi qui a ', '', 0, 1, '2020-02-27 10:33:48', '2020-09-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) NOT NULL,
  `name` varchar(120) COLLATE utf8_swedish_ci NOT NULL,
  `display_name` varchar(120) COLLATE utf8_swedish_ci DEFAULT NULL,
  `icon` varchar(60) COLLATE utf8_swedish_ci DEFAULT NULL,
  `verification_id` bigint(20) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `description` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `created _on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `display_name`, `icon`, `verification_id`, `is_active`, `is_verified`, `description`, `created _on`, `created_by`, `updated_on`, `updated_by`) VALUES
(8, 'ac', 'AC', 'fa-align-center', 168, 1, 1, NULL, '2020-02-22 20:29:03', 1, NULL, NULL),
(9, 'tv2', 'Tv2', 'fa-align-center', 169, 1, 1, NULL, '2020-02-22 20:59:14', 1, '2020-02-22 23:16:19', 1),
(10, 'seat3a', 'Seat3a', 'fa-align-center', 170, 1, 1, NULL, '2020-02-22 21:02:16', 1, '2020-02-23 09:30:43', 1),
(11, 'test4', 'Test4', 'fa-adjust', 173, 1, 0, NULL, '2020-02-22 21:26:54', 1, NULL, NULL),
(12, 'test5', 'Test5', 'fa-align-center', 174, 1, 0, NULL, '2020-02-22 21:30:14', 1, NULL, NULL),
(13, 'test6', 'Test6', 'fa-adjust', 175, 1, 0, NULL, '2020-02-22 21:31:01', 1, NULL, NULL),
(14, 'asdf', 'Asdf', 'fa-adjust', 176, 1, 0, NULL, '2020-02-22 21:31:50', 1, NULL, NULL),
(15, 'asdfasdf', 'Asdfasdf', 'fa-adjust', 177, 1, 0, NULL, '2020-02-22 21:33:07', 1, '2020-02-22 23:11:46', 1),
(16, 'qwer', 'Qwer', 'fa-align-left', 178, 1, 0, NULL, '2020-02-22 22:31:47', 1, '2020-02-22 22:33:13', 1),
(17, '1234', '1234', 'fa-align-center', 179, 1, 0, NULL, '2020-02-22 23:05:37', 1, '2020-02-22 23:16:09', 1),
(18, 'aserasdf', 'Aserasdf', 'fa-adjust', 180, 1, 0, NULL, '2020-02-23 09:30:29', 1, '2020-02-23 09:30:50', 1),
(19, 'hello world', 'Hello WOrld', 'fa-adjust', 181, 1, 0, NULL, '2020-02-23 09:42:02', 1, NULL, NULL),
(20, 'testing', 'Testing', 'fa-adjust', 182, 1, 0, NULL, '2020-02-23 16:53:30', 1, NULL, NULL),
(21, '1234', '1234', 'fa-adjust', 183, 1, 1, NULL, '2020-02-24 21:55:34', 1, NULL, NULL),
(22, 'galvin hahn', 'Galvin Hahn', 'fa-comment', 198, 1, 0, NULL, '2020-02-25 19:55:25', 1, '2020-02-25 21:12:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `source` mediumtext COLLATE utf8_swedish_ci NOT NULL,
  `source_id` mediumtext COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `subtitle` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `post_content` longtext COLLATE utf8_swedish_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_swedish_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `category_id`, `slug`, `title`, `subtitle`, `post_content`, `image`, `is_active`, `created_by`, `created_on`, `updated_on`, `updated_by`) VALUES
(17, 7, 'check-blog', 'Check Blog', 'Subtitle', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1582271378.webp', 1, 1, '2020-02-21 13:34:38', '2020-02-26 12:56:43', 1),
(19, 8, 'aspernatur-nisi-iste', 'Aspernatur nisi iste', 'Neque nisi illo duis', 'Dolor fuga Dolores ', '15822714246.jpg', 1, 1, '2020-02-21 13:35:24', '2020-02-25 16:15:02', 1),
(20, 7, 'voluptates-aut-labor', 'Voluptates aut labor', 'Fuga Quae vero enim', 'Ab sint numquam ali', '15822714375.jpg', 1, 1, '2020-02-21 13:35:37', '2020-02-25 16:15:04', 1),
(23, 7, 'blog', 'Blog', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1582559787.webp', 1, 13, '2020-02-24 21:41:26', '2020-02-24 21:41:26', 13),
(24, 8, 'quia-sit-anim-adipis', 'Quia sit anim adipis', 'Molestiae rerum natu', 'Tempore qui dolorem', '1582885912).png', 0, 1, '2020-02-28 16:16:52', '2020-02-28 16:16:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `remark` longtext COLLATE utf8_swedish_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `remark`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(7, 'Test1', 's', '2020-02-16 11:49:50', 5, NULL, 5),
(8, 'Owen Hahn', 'Dolor voluptatem id', '2020-02-16 11:49:50', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) NOT NULL,
  `blog_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `edited_status` tinyint(4) NOT NULL DEFAULT 0,
  `verification_comment` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `verified_by` bigint(20) DEFAULT NULL,
  `verified_on` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `comment` longtext COLLATE utf8_swedish_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `customer_id`, `is_active`, `is_verified`, `edited_status`, `verification_comment`, `verified_by`, `verified_on`, `name`, `email`, `phone`, `comment`, `created_on`) VALUES
(39, 17, 1, 1, 1, 1, NULL, NULL, '2020-02-24 21:53:52', 'Cruz Hooper', 'kunivi@mailinator.com', '93', 'Dolores dolor labore', '2020-02-24 21:53:52'),
(40, 17, 13, 1, 1, 1, 'asdf', 1, '2020-02-24 21:54:25', 'Murphy Valenzuela', 'sigaxolaf@mailinator.net', '47', 'Voluptatem sit esse', '2020-02-24 21:54:05'),
(41, 17, 1, 1, 1, 1, NULL, NULL, '2020-02-24 21:54:58', 'Cedric Foley', 'vitiw@mailinator.com', '79', 'Accusamus necessitat', '2020-02-24 21:54:58'),
(42, 17, 13, 1, 0, 0, NULL, NULL, '2020-02-24 21:55:13', 'Vance Burton', 'pyxekyhecu@mailinator.com', '7', 'Elit quia rerum vol', '2020-02-24 21:55:13'),
(43, 19, 1, 1, 1, 1, NULL, NULL, '2020-02-25 20:53:21', 'Jason Ortega', 'mejaboxuf@mailinator.com', '93', 'Harum qui aut dicta', '2020-02-25 20:53:21'),
(44, 19, NULL, 1, 1, 1, NULL, NULL, '2020-02-26 11:30:24', 'yoel', '', '', 'Voluptas aut adipisc', '2020-02-26 11:30:24'),
(45, 19, NULL, 1, 1, 1, 'asd', 1, '2020-02-26 12:12:51', 'Bipin', 'xacyn@mailinator.net', '91', 'Test comment', '2020-02-26 12:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) NOT NULL,
  `booking_code` varchar(128) COLLATE utf8_swedish_ci DEFAULT NULL,
  `schedule_id` bigint(20) NOT NULL,
  `booker_id` bigint(20) DEFAULT NULL,
  `booking_status` tinyint(4) NOT NULL,
  `boarding` bigint(20) NOT NULL,
  `dropping` bigint(20) NOT NULL,
  `price` double NOT NULL,
  `payment` longtext COLLATE utf8_swedish_ci NOT NULL,
  `seats` longtext COLLATE utf8_swedish_ci NOT NULL,
  `seat_count` int(11) NOT NULL,
  `name` longtext COLLATE utf8_swedish_ci NOT NULL,
  `phone` varchar(64) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8_swedish_ci DEFAULT NULL,
  `requests` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `can_cancel_ticket` tinyint(4) NOT NULL DEFAULT 1,
  `operator_verified` text COLLATE utf8_swedish_ci NOT NULL DEFAULT '0',
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `verification_id` bigint(20) DEFAULT NULL,
  `is_cancelled` tinyint(4) NOT NULL DEFAULT 0,
  `cancellation_date` datetime DEFAULT NULL,
  `cancelled_by` bigint(20) DEFAULT NULL,
  `cancellation_comment` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `has_travelled` tinyint(4) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) DEFAULT NULL,
  `has_insurance` longtext COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_code`, `schedule_id`, `booker_id`, `booking_status`, `boarding`, `dropping`, `price`, `payment`, `seats`, `seat_count`, `name`, `phone`, `email`, `requests`, `can_cancel_ticket`, `operator_verified`, `is_verified`, `verification_id`, `is_cancelled`, `cancellation_date`, `cancelled_by`, `cancellation_comment`, `has_travelled`, `created_on`, `created_by`, `has_insurance`) VALUES
(1, '00011567850276', 8, 5, 1, 3, 3, 36, '{\"transaction-id\":\"\",\"mode\":\"\"}', '[{\"id\":\"14\",\"name\":\"15\",\"passenger\":{\"name\":\"Stewart Buck\",\"age\":\"30\",\"gender\":\"m\"}},{\"id\":\"12\",\"name\":\"13\",\"passenger\":{\"name\":\"Henry Blackburn\",\"age\":\"19\",\"gender\":\"m\"}}]', 2, 'Neelam Shah', '9841077135', 'chetan.rajbhandari@gmail.com', 'asd', 1, '0', 0, NULL, 0, NULL, NULL, NULL, 0, '2019-09-07 15:42:57', NULL, NULL),
(2, '00021567919754', 8, 5, 1, 10, 10, 40, '{\"transaction-id\":\"\",\"mode\":\"\"}', '[{\"id\":\"13\",\"name\":\"14\",\"passenger\":{\"name\":\"Penelope Mills\",\"age\":\"66\",\"gender\":\"f\"}},{\"id\":\"5\",\"name\":\"6\",\"passenger\":{\"name\":\"Timon Dorsey\",\"age\":\"97\",\"gender\":\"m\"}}]', 2, 'Hayes Estes', '+1 (321) 597-6301', 'zosiwewebi@mailinator.com', 'Soluta beatae tempor', 1, '0', 0, NULL, 0, NULL, NULL, NULL, 0, '2019-09-08 11:00:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `age` text DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `expected_salary` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `website` longtext DEFAULT NULL,
  `other_details` longtext DEFAULT NULL,
  `file` varchar(250) NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `name`, `email`, `age`, `city`, `phone`, `expected_salary`, `experience`, `website`, `other_details`, `file`, `is_new`, `created_on`) VALUES
(5, 'Solomon Raymond', 'qovav@mailinator.com', 'Quibusdam sint volup', 'Assumenda aliqua In', '+1 (673) 891-2922', 'Laudantium beatae a', 'Numquam cupidatat ve', 'https://www.hulu.us', 'Quam voluptatibus do', '1582889431le.pdf', 1, '2020-02-28 00:00:00'),
(6, 'Mari Pugh', 'dawypyfyr@mailinator.com', 'Voluptas in voluptat', 'Proident qui aut ip', '+1 (795) 716-6952', 'Pariatur Asperiores', 'Veniam eos accusamu', 'https://www.wetelejojerytu.cc', 'Ratione magni quia e', '', 1, '2020-03-01 00:00:00'),
(7, 'Mari Pugh', 'dawypyfyr@mailinator.com', 'Voluptas in voluptat', 'Proident qui aut ip', '+1 (795) 716-6952', 'Pariatur Asperiores', 'Veniam eos accusamu', 'https://www.wetelejojerytu.cc', 'Ratione magni quia e', '1583035446le.pdf', 1, '2020-03-01 00:00:00'),
(8, 'Mari Pugh', 'dawypyfyr@mailinator.com', 'Voluptas in voluptat', 'Proident qui aut ip', '+1 (795) 716-6952', 'Pariatur Asperiores', 'Veniam eos accusamu', 'https://www.wetelejojerytu.cc', 'Ratione magni quia e', '1583035480le.pdf', 1, '2020-03-01 00:00:00'),
(9, 'Erasmus Humphrey', 'niwafotonu@mailinator.net', 'Eum enim quam labori', 'Ipsum omnis odio et ', '+1 (198) 571-2991', 'Consequatur sint e', 'Quo veniam eos tem', 'https://www.tynukuhe.org', 'Veritatis occaecat a', '1583035502le.pdf', 1, '2020-03-01 00:00:00'),
(10, 'Isabelle Mullins', 'cojym@mailinator.net', 'Sint iusto atque exc', 'Sit doloremque est a', '+1 (708) 793-2905', 'Ea dolores quo conse', 'Vero adipisicing qui', 'https://www.qisuk.co', 'Fugiat et ut incidid', '1583035994le.pdf', 1, '2020-03-01 00:00:00'),
(11, 'Kibo Hicks', 'qiqaxic@mailinator.com', 'Magnam possimus qui', 'Consectetur mollitia', '+1 (467) 451-4692', 'Deserunt quia deseru', 'Aliquam aliqua Sunt', 'https://www.qozewatagikenyt.cc', 'Quaerat labore minim', '1583036101le.pdf', 0, '2020-03-01 00:00:00'),
(12, 'Holmes Rasmussen', 'doxydoxer@mailinator.net', 'Facilis dolor dolore', 'Nihil non aliquid la', '+1 (525) 527-7761', 'Velit proident et l', 'Similique odit ab an', 'https://www.qomimys.cc', 'Sint quos velit aute', '1583036447le.pdf', 0, '2020-03-01 00:00:00'),
(13, 'Holmes Rasmussen', 'doxydoxer@mailinator.net', 'Facilis dolor dolore', 'Nihil non aliquid la', '+1 (525) 527-7761', 'Velit proident et l', 'Similique odit ab an', 'https://www.qomimys.cc', 'Sint quos velit aute', '1583036467le.pdf', 1, '2020-03-01 00:00:00'),
(14, 'Coby Deleon', 'nywekag@mailinator.net', 'Nobis ut accusantium', 'Ex aut dolor incidun', '+1 (458) 428-7052', 'Voluptas sed tempore', 'Qui consequat Excep', 'https://www.giboguriqyxa.co', 'Dolor voluptas sunt', '1583036580le.pdf', 0, '2020-03-01 00:00:00'),
(15, 'Coby Deleon', 'nywekag@mailinator.net', 'Nobis ut accusantium', 'Ex aut dolor incidun', '+1 (458) 428-7052', 'Voluptas sed tempore', 'Qui consequat Excep', 'https://www.giboguriqyxa.co', 'Dolor voluptas sunt', '1583036615le.pdf', 0, '2020-03-01 00:00:00'),
(16, 'Coby Deleon', 'nywekag@mailinator.net', 'Nobis ut accusantium', 'Ex aut dolor incidun', '+1 (458) 428-7052', 'Voluptas sed tempore', 'Qui consequat Excep', 'https://www.giboguriqyxa.co', 'Dolor voluptas sunt', '1583037007le.pdf', 0, '2020-03-01 00:00:00'),
(17, 'Coby Deleon', 'nywekag@mailinator.net', 'Nobis ut accusantium', 'Ex aut dolor incidun', '+1 (458) 428-7052', 'Voluptas sed tempore', 'Qui consequat Excep', 'https://www.giboguriqyxa.co', 'Dolor voluptas sunt', '1583037214le.pdf', 0, '2020-03-01 00:00:00'),
(18, 'Kimberly Parks', 'sodynyforo@mailinator.net', 'Earum illo voluptas ', 'Fugiat in quas sapie', '+1 (206) 171-7536', 'Atque ipsum volupta', 'Vel adipisicing dolo', 'https://www.syrukys.me', 'Sit repellendus Pos', '1583037270le.pdf', 0, '2020-03-01 00:00:00'),
(19, 'Kimberly Parks', 'sodynyforo@mailinator.net', 'Earum illo voluptas ', 'Fugiat in quas sapie', '+1 (206) 171-7536', 'Atque ipsum volupta', 'Vel adipisicing dolo', 'https://www.syrukys.me', 'Sit repellendus Pos', '1583037332le.pdf', 0, '2020-03-01 00:00:00'),
(20, 'Kimberly Parks', 'sodynyforo@mailinator.net', 'Earum illo voluptas ', 'Fugiat in quas sapie', '+1 (206) 171-7536', 'Atque ipsum volupta', 'Vel adipisicing dolo', 'https://www.syrukys.me', 'Sit repellendus Pos', '1583037349le.pdf', 0, '2020-03-01 00:00:00'),
(21, 'Kimberly Parks', 'sodynyforo@mailinator.net', 'Earum illo voluptas ', 'Fugiat in quas sapie', '+1 (206) 171-7536', 'Atque ipsum volupta', 'Vel adipisicing dolo', 'https://www.syrukys.me', 'Sit repellendus Pos', '1583037428le.pdf', 0, '2020-03-01 00:00:00'),
(22, 'Kimberly Parks', 'sodynyforo@mailinator.net', 'Earum illo voluptas ', 'Fugiat in quas sapie', '+1 (206) 171-7536', 'Atque ipsum volupta', 'Vel adipisicing dolo', 'https://www.syrukys.me', 'Sit repellendus Pos', '1583037464le.pdf', 0, '2020-03-01 00:00:00'),
(23, 'Kimberly Parks', 'sodynyforo@mailinator.net', 'Earum illo voluptas ', 'Fugiat in quas sapie', '+1 (206) 171-7536', 'Atque ipsum volupta', 'Vel adipisicing dolo', 'https://www.syrukys.me', 'Sit repellendus Pos', '1583037515le.pdf', 0, '2020-03-01 00:00:00'),
(24, 'Kimberly Parks', 'sodynyforo@mailinator.net', 'Earum illo voluptas ', 'Fugiat in quas sapie', '+1 (206) 171-7536', 'Atque ipsum volupta', 'Vel adipisicing dolo', 'https://www.syrukys.me', 'Sit repellendus Pos', '1583037540le.pdf', 1, '2020-03-01 00:00:00'),
(25, 'Kimberly Parks', 'sodynyforo@mailinator.net', 'Earum illo voluptas ', 'Fugiat in quas sapie', '+1 (206) 171-7536', 'Atque ipsum volupta', 'Vel adipisicing dolo', 'https://www.syrukys.me', 'Sit repellendus Pos', '1583037619le.pdf', 0, '2020-03-01 00:00:00'),
(26, 'Kimberly Parks', 'sodynyforo@mailinator.net', 'Earum illo voluptas ', 'Fugiat in quas sapie', '+1 (206) 171-7536', 'Atque ipsum volupta', 'Vel adipisicing dolo', 'https://www.syrukys.me', 'Sit repellendus Pos', '1583037664le.pdf', 0, '2020-03-01 00:00:00'),
(27, 'Cheryl Campbell', 'pecen@mailinator.net', 'Duis rerum facilis o', 'Tempor iste duis ill', '+1 (532) 727-2032', 'Optio quia voluptat', 'Ex sequi dolorum mol', 'https://www.jafucowukawyvyz.org.au', 'Quam iusto commodo i', '1583038411le.pdf', 1, '2020-03-01 00:00:00'),
(28, 'Rafael Hurley', 'taqyjiqese@mailinator.net', 'Perferendis rerum an', 'Corrupti molestiae ', '+1 (623) 543-3769', 'Excepteur magna fugi', 'Unde sit in nulla q', 'https://www.gepehodywudat.me', 'Hello please review my cv i have attached i am very capable and interesting person', '1583041675le.pdf', 1, '2020-03-01 00:00:00'),
(29, 'Rafael Hurley', 'taqyjiqese@mailinator.net', 'Perferendis rerum an', 'Corrupti molestiae ', '+1 (623) 543-3769', 'Excepteur magna fugi', 'Unde sit in nulla q', 'https://www.gepehodywudat.me', 'Hello please review my cv i have attached i am very capable and interesting person', '1583042134le.pdf', 0, '2020-03-01 00:00:00'),
(30, 'Rafael Hurley', 'taqyjiqese@mailinator.net', 'Perferendis rerum an', 'Corrupti molestiae ', '+1 (623) 543-3769', 'Excepteur magna fugi', 'Unde sit in nulla q', 'https://www.gepehodywudat.me', 'Hello please review my cv i have attached i am very capable and interesting person', '1583042141le.pdf', 0, '2020-03-01 00:00:00'),
(31, 'Joel Stevenson', 'mahehy@mailinator.com', 'Et ullam et in imped', 'Fugiat rem cillum n', '+1 (418) 486-7249', 'Ullam irure error re', 'Consequatur rerum co', 'https://www.depisavubyvanoc.com.au', 'Excepteur dolor exer', '1583042300le.pdf', 1, '2020-03-01 00:00:00'),
(32, 'Xander Fields', 'myhikyj@mailinator.net', 'Irure tenetur mollit', 'A culpa ut commodo e', '+1 (183) 943-5354', 'Expedita eu accusamu', 'Aliqua Voluptates v', 'https://www.tomi.org.uk', 'Lorem consequatur m', '1583042421le.pdf', 0, '2020-03-01 00:00:00'),
(33, 'Xander Fields', 'myhikyj@mailinator.net', 'Irure tenetur mollit', 'A culpa ut commodo e', '+1 (183) 943-5354', 'Expedita eu accusamu', 'Aliqua Voluptates v', 'https://www.tomi.org.uk', 'Lorem consequatur m', '1583042446le.pdf', 0, '2020-03-01 00:00:00'),
(34, 'Xander Fields', 'myhikyj@mailinator.net', 'Irure tenetur mollit', 'A culpa ut commodo e', '+1 (183) 943-5354', 'Expedita eu accusamu', 'Aliqua Voluptates v', 'https://www.tomi.org.uk', 'Lorem consequatur m', '1583042459le.pdf', 0, '2020-03-01 00:00:00'),
(35, 'Jessamine Garner', 'volubyr@mailinator.net', 'Officiis omnis anim ', 'Earum est porro obc', '+1 (174) 233-9108', 'Ut sequi et qui quo ', 'Lorem aut sit culpa ', 'https://www.zabydexyxigez.me.uk', 'Distinctio Quas lor', '1583042522le.pdf', 0, '2020-03-01 00:00:00'),
(36, 'Ursula Collins', 'wumytu@mailinator.com', 'Ipsum dolore cum nul', 'Soluta labore dolore', '+1 (585) 393-5651', 'Commodo aliquip dolo', 'Omnis ut quo labore ', 'https://www.genuxaracolage.com.au', 'Rerum iusto elit ma', '1583042782le.pdf', 0, '2020-03-01 00:00:00'),
(37, 'Yoshio Wilcox', 'wefy@mailinator.net', 'Officia elit sunt q', 'Sed sint qui cupidat', '+1 (689) 103-9912', 'Et dolorum qui ut ea', 'Corporis debitis ea ', 'https://www.senytabiz.us', 'Vero ea odio esse vo', '1583042958le.pdf', 0, '2020-03-01 00:00:00'),
(38, 'Gloria Olson', 'geruh@mailinator.net', 'In ex sit inventore ', 'Culpa dolor est nece', '+1 (328) 502-1293', 'Dolore ex enim dolor', 'Ea sint nulla anim l', 'https://www.wehebivi.cc', 'Hello sir how are you\r\n', '1583043085le.pdf', 0, '2020-03-01 00:00:00'),
(39, 'Yoel', 'quzenizi@mailinator.com', 'Fugiat nihil laudant', 'Qui delectus sed no', '+1 (246) 721-4692', 'Consequatur commodi ', 'Inventore veniam ex', 'https://www.gizidulowyq.com', 'Quaerat laboriosam ', '1583043187le.pdf', 1, '2020-03-01 00:00:00'),
(40, 'Quentin Ray', 'cajod@mailinator.net', 'Sunt accusantium con', 'Amet asperiores qui', '+1 (801) 637-3275', 'Qui voluptas consequ', 'Laudantium eu est ', 'https://www.datyb.cm', 'Ut in libero dolor e', '1583043338le.pdf', 0, '2020-03-01 00:00:00'),
(41, 'Zachary Holland', 'jylopywaqe@mailinator.net', 'Quis rem sit dolore ', 'Sed nostrud saepe no', '+1 (765) 271-9428', 'Culpa minus ipsum e', 'Amet sint cillum e', 'https://www.midarapigyxyzis.org.au', 'Ipsa aut consequunt', '1583043449le.pdf', 1, '2020-03-01 00:00:00'),
(42, 'Zorita Ingram', 'rezak@mailinator.net', 'Temporibus est susci', 'Asperiores amet adi', '+1 (983) 308-5061', 'Recusandae Velit e', 'Quia voluptas elit ', 'https://www.xupitugow.com.au', 'Cum suscipit odit se', '1583043785le.pdf', 1, '2020-03-01 12:08:05'),
(43, 'Giacomo Hull', 'fopomujo@mailinator.com', 'Soluta atque irure e', 'Soluta enim adipisic', '+1 (769) 951-8821', 'Omnis libero nostrud', 'Et omnis dolore exer', 'https://www.mexug.ca', 'Ea enim natus recusa', '1583045752le.pdf', 1, '2020-03-01 12:40:52'),
(44, 'Eagan Boyer', 'xanyz@mailinator.com', 'Et maiores cum est q', 'Ad rerum ipsum labor', '+1 (478) 445-2214', 'Debitis enim ut dolo', 'Unde sit consectetur', 'https://www.zimape.co.uk', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '1583046048le.pdf', 1, '2020-03-01 12:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) NOT NULL,
  `image` varchar(128) COLLATE utf8_swedish_ci DEFAULT NULL,
  `name` longtext COLLATE utf8_swedish_ci NOT NULL,
  `info` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `link` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT 0,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `image`, `name`, `info`, `link`, `is_active`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(8, '15828723025.png', 'Company Name 6', 'asdf', 'https://google.com/', 1, '2019-02-18 11:45:51', NULL, '2020-02-28 12:30:02', 1),
(9, '15828722884.png', 'Company Name 7', '', 'https://google.com/', 0, '2020-02-18 11:09:56', 1, '2020-02-28 12:29:48', 1),
(10, '15828722793.png', 'Company Name 8', 'Et dolores ut possim', 'https://google.com/', 0, '2020-02-18 11:11:04', 1, '2020-02-28 12:29:39', 1),
(11, '15828722722.png', 'Company Name 9', 'Deleniti numquam lab', 'https://google.com/', 0, '2020-02-25 16:25:27', 1, '2020-02-28 12:29:32', 1),
(21, '15828722191.png', 'Lacey Trevino', 'Delectus fuga Pers', 'https://www.google.com', 1, '2020-02-28 12:28:39', NULL, '2020-02-28 12:28:48', 1),
(26, '15828722722.png', 'Company Name 9', 'Deleniti numquam lab', 'https://google.com/', 0, '2020-02-25 16:25:27', 1, '2020-02-28 12:29:32', 1),
(27, '15828722722.png', 'Company Name 9', 'Deleniti numquam lab', 'https://google.com/', 0, '2020-02-25 16:25:27', 1, '2020-02-28 12:29:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_page_contents`
--

CREATE TABLE `client_page_contents` (
  `id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `title` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `remark` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `extra_notes` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_swedish_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `client_page_contents`
--

INSERT INTO `client_page_contents` (`id`, `client_id`, `title`, `remark`, `extra_notes`, `content`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(11, 21, 'Ut necessitatibus fu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci eaque magnam modi recusandae! Blanditiis debitis nulla reiciendis saepe voluptatum. Aliquid, excepturi explicabo facere hic laudantium saepe sint velit veniam.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci eaque magnam modi recusandae! Blanditiis debitis nulla reiciendis saepe voluptatum. Aliquid, excepturi explicabo facere hic laudantium saepe sint velit veniam.', '2020-02-28 07:28:08', 1, '2020-02-28 07:28:08', 1),
(12, 10, 'In sunt nulla dolor ', 'Animi eaque officia', 'Exercitation assumen', 'Voluptatem id nisi t', '2020-02-28 07:30:35', 1, '2020-02-28 07:30:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `explore`
--

CREATE TABLE `explore` (
  `id` bigint(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `explore`
--

INSERT INTO `explore` (`id`, `title`, `image`, `is_active`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'title', '', 0, '2020-02-25 06:08:56', 1, '2020-02-25 06:08:56', 1),
(2, 'asdf', NULL, 0, '2020-02-25 07:46:11', 1, '2020-02-25 07:46:11', 1),
(3, 'a', NULL, 0, '2020-02-25 07:47:14', 1, '2020-02-25 07:47:14', 1),
(4, 'a', NULL, 0, '2020-02-25 07:47:24', 1, '2020-02-25 07:47:24', 1),
(5, 'this is title', '1582617495_.jpg', 0, '2020-02-25 07:50:26', 1, '2020-02-25 07:58:15', 1),
(6, 'this is title', '1582868388.webp', 1, '2020-02-25 07:58:27', 1, '2020-02-28 05:39:48', 1),
(8, 'this is title', '15828027315.jpg', 1, '2020-02-25 09:55:17', 1, '2020-02-27 11:25:31', 1),
(9, 'this is title', '1582802717.webp', 1, '2020-02-25 10:29:57', 1, '2020-02-27 11:25:17', 1),
(10, 'Francesca Justicewet', '15826295142.jpg', 1, '2020-02-25 11:12:03', 1, '2020-02-25 11:18:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `content`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Ut eum aut quidem qes', 'Ut pariatur Rem eum', 1, '2020-02-27 09:45:25', 1, '2020-02-27 09:51:21', 1),
(2, 'Ut doloremque accusa', 'Itaque voluptatem al', 1, '2020-02-27 09:47:05', 1, '2020-02-27 10:14:01', 1),
(3, 'Non sint sit esse', 'Tempora distinctio ', 1, '2020-02-27 10:11:28', 1, '2020-02-27 10:47:49', 1),
(4, 'Sit elit dolorem q', 'Soluta accusantium p', 0, '2020-02-27 10:13:51', 1, '2020-02-27 10:13:51', 1),
(5, 'Impedit voluptate c', 'Voluptatem et cumqu', 0, '2020-02-27 10:18:09', 1, '2020-02-27 10:18:09', 1),
(6, 'Irure ad qui autem s', 'Et exercitationem al', 1, '2020-02-27 11:21:38', 1, '2020-02-27 11:21:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) NOT NULL,
  `name` varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  `street` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `city` longtext COLLATE utf8_swedish_ci NOT NULL,
  `district` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `zone` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `state` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `description` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `verification_id` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `street`, `city`, `district`, `zone`, `state`, `longitude`, `latitude`, `description`, `is_active`, `is_verified`, `verification_id`, `created_by`, `updated_by`, `updated_on`, `created_on`) VALUES
(1, 'gairidhara', 'maharajgunj', 'kathmandu', 'kathmandu', 'Bagmati', 'fa-adjust', 123, 123, 'Near Petrol Pump', 1, 1, 32, 1, 1, '2019-06-23 17:14:04', '2019-03-07 08:38:38'),
(2, 'maharajgunj', 'Thribum Sadak', 'Kathmandu', 'kathmandu', 'Bagmait', '0', 123, 123, 'Hello', 1, 1, 7, 1, 1, '2019-06-11 11:44:12', '2019-03-07 08:47:18'),
(3, 'lazimpat', 'lazimpat', 'kathmandu', 'kathmandu', 'Bagmait', '1', 12312, 123123, 'Hello', 1, 1, 40, 1, 1, '2019-06-13 14:17:45', '2019-03-12 10:16:32'),
(4, 'durbarmarg', 'durbarmarg', 'kathmandu', 'kathmandu', 'Bagmait', '1', 126545, 2165465, 'testing', 1, 1, 41, 1, 1, '2019-06-09 16:21:35', '2019-03-12 10:16:54'),
(5, 'bansbari', 'bansbari', 'kathmandu', 'kathmandu', 'Bagmait', '3', 123132, 12312, 'Test', 1, 1, 43, 1, 1, '2019-06-13 14:17:32', '2019-03-12 10:17:07'),
(6, 'golfutar', 'kathmandu', 'kathmandu', 'kathmandu', 'Bagmait', '4', NULL, NULL, 'goufutar kathmandu nepal', 1, 1, 46, 1, 1, '2019-06-15 07:08:20', '2019-03-12 10:17:17'),
(7, 'hattigauda', 'kathmandu', 'kathmandu', 'kathamdnu', 'Bagmait', '1', NULL, NULL, 'kathmanddui', 1, 1, 101, 1, 1, '2019-06-23 09:31:16', '2019-03-12 10:17:28'),
(8, 'budanilkantha', NULL, 'kathmandu', 'kathmandu', 'Bagmait', '5', NULL, NULL, 'near temple', 1, 1, NULL, 1, NULL, NULL, '2019-03-12 10:18:08'),
(9, 'kalanki', NULL, 'kathmandu', 'kathmandu', 'Bagmait', '4', NULL, NULL, 'outside the bus park', 1, 1, NULL, 1, NULL, NULL, '2019-03-14 10:40:06'),
(10, 'chabahil', NULL, 'Kathmandu', 'kathmandu', 'Bagmait', '3', NULL, NULL, 'chowk', 1, 1, NULL, 1, NULL, NULL, '2019-03-14 10:40:06'),
(11, 'Dhumbarahi', 'dhumbarahi', 'kathmandu', 'kathmandu', 'Bagmait', '3', 4563453, 456456, 'Hello Testing', 1, 1, 42, 1, NULL, NULL, '2019-06-09 16:33:32'),
(12, 'bagar', NULL, 'pokhara', 'Kaski', 'Gandaki', '5', NULL, NULL, 'in nepal', 1, 1, 44, 1, NULL, NULL, '2019-06-10 11:21:18'),
(13, 'taylor goff', 'Est laborum Vel vol', 'Rerum tempor facere ', 'Doloribus est magna', NULL, '6', 123, 123, 'Sint reprehenderit r', 1, 1, 185, 1, NULL, NULL, '2020-02-25 16:35:03'),
(14, '1234', '1234', '1234', '1234', NULL, '0', 1234, 1234, '1234', 1, 1, 186, 1, 1, '2020-02-25 16:38:48', '2020-02-25 16:35:16'),
(15, 'qwer', 'qwer', 'qwer', 'qwer', NULL, '0', 123, 123, 'qwerqwer', 1, 1, 187, 1, NULL, NULL, '2020-02-25 19:26:16'),
(16, 'iris craig', 'Id fugiat ea sit co', 'Est ipsum voluptate', 'Ea sequi sunt dolore', NULL, '1', 123, 1231, 'Unde unde excepteur ', 1, 0, 188, 1, NULL, NULL, '2020-02-25 19:27:16'),
(17, 'allen woodard', 'Voluptas laborum ea ', 'Omnis ut dolor dolor', 'Reiciendis ad sint i', NULL, '5', 123, 123, 'Perferendis similiqu', 1, 1, 191, 1, NULL, NULL, '2020-02-25 19:44:24'),
(18, 'allen woodard', 'Voluptas laborum ea ', 'Omnis ut dolor dolor', 'Reiciendis ad sint i', NULL, '5', 123, 123, 'Perferendis similiqu', 1, 1, 192, 1, NULL, NULL, '2020-02-25 19:45:57'),
(19, 'jescie wilcox', 'Eu sequi eu saepe fa', 'Quisquam ea non vel ', 'Dolor repellendus E', NULL, '3', 123, 123, 'Minim placeat illum', 1, 1, 193, 1, NULL, NULL, '2020-02-25 19:48:36'),
(20, 'jescie wilcox', 'Eu sequi eu saepe fa', 'Quisquam ea non vel ', 'Dolor repellendus E', NULL, '3', 123, 123, 'Minim placeat illum', 1, 1, 194, 1, NULL, NULL, '2020-02-25 19:49:26'),
(21, 'jescie wilcox', 'Eu sequi eu saepe fa', 'Quisquam ea non vel ', 'Dolor repellendus E', NULL, '3', 123, 123, 'Minim placeat illum', 1, 1, 195, 1, NULL, NULL, '2020-02-25 19:50:57'),
(22, 'jescie wilcox', 'Eu sequi eu saepe fa', 'Quisquam ea non vel ', 'Dolor repellendus E', NULL, '3', 123, 123, 'Minim placeat illum', 1, 1, 196, 1, NULL, NULL, '2020-02-25 19:51:59'),
(23, 'jescie wilcox', 'Eu sequi eu saepe fa', 'Quisquam ea non vel ', 'Dolor repellendus E', NULL, '3', 123, 123, 'Minim placeat illum', 1, 1, 197, 1, NULL, NULL, '2020-02-25 19:53:25'),
(24, 'jescie wilcox', 'Eu sequi eu saepe fa', 'Quisquam ea non vel ', 'Dolor repellendus E', NULL, '3', 123, 123, 'Minim placeat illum', 1, 1, 199, 1, NULL, NULL, '2020-02-25 19:56:41'),
(25, 'jescie wilcox', 'Eu sequi eu saepe fa', 'Quisquam ea non vel ', 'Dolor repellendus E', NULL, '3', 123, 123, 'Minim placeat illum', 1, 1, 200, 1, NULL, NULL, '2020-02-25 19:56:53'),
(26, 'jescie wilcox', 'Eu sequi eu saepe fa', 'Quisquam ea non vel ', 'Dolor repellendus E', NULL, '3', 123, 123, 'Minim placeat illum', 1, 1, 201, 1, NULL, NULL, '2020-02-25 19:57:26'),
(27, 'jescie wilcox', 'Eu sequi eu saepe fa', 'Quisquam ea non vel ', 'Dolor repellendus E', NULL, '3', 123, 123, 'Minim placeat illum', 1, 1, 202, 1, NULL, NULL, '2020-02-25 19:58:18'),
(28, 'jescie wilcox', 'Eu sequi eu saepe fa', 'Quisquam ea non vel ', 'Dolor repellendus E', NULL, '3', 123, 123, 'Minim placeat illum', 1, 1, 203, 1, NULL, NULL, '2020-02-25 19:59:24'),
(29, 'lesley orr', 'Ut ab eu commodi est', 'Deleniti odit molest', 'Sit eum veritatis si', NULL, '1', 123, 123, 'Aliqua Quam molliti', 1, 1, 204, 1, NULL, NULL, '2020-02-25 20:00:58'),
(30, 'samson mosley', 'Duis blanditiis dele', 'Cupiditate quisquam ', 'Et veniam ratione c', NULL, '4', 345, 345, 'Itaque voluptatem q', 1, 0, 205, 1, NULL, NULL, '2020-02-25 20:08:10'),
(31, 'zenia peterson', 'Nostrum porro cillum', 'Sint elit debitis f', 'Natus ut ex quisquam', NULL, '3', 4, 4, 'Omnis eiusmod adipis', 1, 1, 206, 1, NULL, NULL, '2020-02-25 20:21:52'),
(32, 'astra sharpe', 'Quia dicta aliquid v', 'Rerum nihil officia ', 'Impedit enim harum ', NULL, '6', 5, 5, 'Dolorem iusto minim ', 1, 1, 207, 1, 1, '2020-02-26 12:51:55', '2020-02-25 20:23:47'),
(33, 'stella sargent', 'Reprehenderit culpa', 'Sunt velit consequa', 'Qui non nulla incidu', NULL, '5', 123, 123, 'Iure reprehenderit q', 1, 1, 208, 1, 1, '2020-02-28 10:34:28', '2020-02-28 10:19:53'),
(34, 'alfreda phelps', 'Ea aspernatur eligen', 'Adipisicing consequa', 'Ex ea itaque aut dig', NULL, '4', 15, 51, 'Sit irure asperiore', 1, 1, 209, 1, NULL, NULL, '2020-02-28 12:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `message` longtext COLLATE utf8_swedish_ci NOT NULL,
  `is_new` tinyint(4) NOT NULL DEFAULT 1,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `message`, `is_new`, `created_on`) VALUES
(26, 'Sebastian Morris', 'xifarycuj@mailinator.com', '+1 (368) 427-9579', 'Dolores maxime corpo', 0, '2020-02-27 01:01:14'),
(27, 'Carlos Cunningham', 'vugomype@mailinator.net', '+1 (512) 893-4138', 'Impedit consequatur', 0, '2020-02-27 01:01:59'),
(28, 'Tanisha Whitehead', 'labekuju@mailinator.com', '+1 (483) 472-5603', 'Doloremque incidunt', 0, '2020-02-27 01:02:18'),
(29, 'Yvette Rodriguez', 'fubexafopi@mailinator.com', '+1 (865) 458-9271', 'Quam fuga Adipisci', 0, '2020-02-27 01:05:58'),
(30, 'Jenna Cain', 'rosotig@mailinator.com', '+1 (444) 291-5207', 'Commodo facere ipsum', 0, '2020-02-27 01:06:18'),
(31, 'Quinn Sykes', 'ciby@mailinator.net', '+1 (593) 414-6685', 'Rerum obcaecati enim', 0, '2020-02-27 01:06:35'),
(32, 'Kathleen Mathis', 'keryvycota@mailinator.com', '+1 (134) 591-1624', 'Non iure quia odit v', 0, '2020-02-27 01:07:08'),
(33, 'Nyssa Sweet', 'kugyjo@mailinator.net', '+1 (949) 529-3514', 'Sunt dolor lorem in', 0, '2020-02-27 01:07:31'),
(34, 'Desiree White', 'fupehego@mailinator.com', '+1 (527) 205-7851', 'Pariatur Perspiciat', 0, '2020-02-27 01:08:15'),
(35, 'Vladimir Fulton', 'pyzajevizo@mailinator.com', '+1 (643) 202-2217', 'Amet veritatis irur', 0, '2020-02-27 01:09:05'),
(36, 'Katell Harrell', 'kagydacazy@mailinator.net', '+1 (739) 477-8426', 'In maiores quae volu', 0, '2020-02-27 01:09:20'),
(37, 'Nomlanga Whitney', 'dutuxamija@mailinator.net', '+1 (688) 921-3774', 'Porro voluptas repre', 0, '2020-02-27 01:09:40'),
(38, 'Nadine Bradshaw', 'kiquvehuta@mailinator.com', '+1 (589) 926-9001', 'Cum sunt ipsum aut c', 0, '2020-02-27 01:10:06'),
(39, 'Kiara Salazar', 'vigudu@mailinator.net', '+1 (716) 756-5299', 'Pariatur Aut sit N', 0, '2020-02-27 01:11:54'),
(40, 'Dominic Mejia', 'kusenyb@mailinator.net', '+1 (635) 952-3822', 'Magna dolor eligendi', 0, '2020-02-27 09:44:16'),
(41, 'Kai Dawson', 'hefelovupu@mailinator.net', '+1 (806) 975-9163', 'Blanditiis et qui au', 0, '2020-02-27 09:44:44'),
(42, 'Ariel Kirkland', 'sijyn@mailinator.com', '+1 (402) 157-1709', 'Consequatur Rerum d', 0, '2020-02-27 10:16:37'),
(43, 'Ivor Hawkins', 'goxufyh@mailinator.net', '+1 (801) 596-6612', 'Sapiente eiusmod molSapiente eiusmod molSapiente eiusmod molSapiente eiusmod molSapiente eiusmod molSapiente eiusmod molSapiente eiusmod molSapiente eiusmod mol', 0, '2020-02-27 11:01:21'),
(44, 'Jordan Cooke', 'wubomuj@mailinator.net', '+1 (138) 837-1435', 'Accusamus qui labori', 0, '2020-03-01 12:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_swedish_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1544174741),
('m130524_201442_init', 1544174750);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `subtitle` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `post_content` longtext COLLATE utf8_swedish_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `image` text COLLATE utf8_swedish_ci NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `slug`, `title`, `subtitle`, `post_content`, `is_active`, `image`, `created_by`, `created_on`, `updated_on`, `updated_by`) VALUES
(7, 12, 'rerum-unde-architect', 'Rerum unde architect', 'Ullam omnis dolores', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, '15825338645.jpg', 1, '2020-02-22 18:49:23', NULL, 1),
(8, 5, 'explicabo-excepturi', 'Explicabo Excepturi', 'Molestiae laboris ut', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '15825338512.jpg', 1, '2020-02-24 14:29:11', NULL, 1),
(9, 10, 'libero-sunt-repellen', 'Libero sunt repellen', 'Aut sunt ea blanditi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '15825338746.jpg', 1, '2020-02-24 14:29:34', NULL, 1),
(10, 9, 'nulla-qui-dolores-su', 'Nulla qui dolores su', 'Qui eligendi eius qu', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '1582533886.webp', 1, '2020-02-24 14:29:46', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `remark` longtext COLLATE utf8_swedish_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(11) DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `name`, `remark`, `created_on`, `created_by`, `updated_by`, `updated_on`) VALUES
(5, 'Addison Reese', 'Ut vel sunt dolore o', '2020-02-18 07:45:55', 1, 1, NULL),
(6, 'Yael Nielsen', 'Et ullamco ullam tem', '2020-02-18 07:47:18', 1, 1, NULL),
(7, 'Kibo Molina', 'Praesentium in id do', '2020-02-18 07:47:47', 1, 1, NULL),
(8, 'Walker Thomas', 'Rerum voluptas qui n', '2020-02-18 07:48:27', 1, 1, NULL),
(9, 'Joan Mullins', 'Laudantium voluptat', '2020-02-18 07:52:19', 1, 1, NULL),
(10, 'Yen Jenkins', 'Eaque molestias dolo', '2020-02-18 07:52:48', 1, 1, NULL),
(11, 'Yen Jenkins', 'Eaque molestias dolo', '2020-02-18 07:56:45', 1, 1, NULL),
(12, 'Yoel', 'Aute qui quisquam no', '2020-02-18 07:56:52', 1, 1, NULL),
(13, 'Check News', 'Corporis voluptate l', '2020-02-18 09:35:16', 1, 1, NULL),
(14, 'Gabriel Fox', 'Tenetur voluptatibus', '2020-02-18 09:36:24', 1, 1, NULL),
(15, 'Zahir Fisher', 'Aliquip vel quasi es', '2020-02-18 09:36:47', 1, 1, NULL),
(16, 'Noelle Pace', 'Ipsum nostrum ipsam ', '2020-02-18 11:18:52', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  `label` varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  `image` varchar(64) COLLATE utf8_swedish_ci DEFAULT NULL,
  `on_menu` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `label`, `image`, `on_menu`, `is_active`, `created_on`) VALUES
(1, 'home', 'Home Page', NULL, 1, 1, '2019-02-20 12:34:49'),
(2, 'about', 'About Us', '1550649807t.jpg', 1, 1, '2019-02-20 12:34:49'),
(3, 'services', 'Our Services', '1550653400s.png', 1, 1, '2019-02-20 12:34:49'),
(6, 'team', 'Our Team', '15506534371.jpg', 1, 1, '2019-02-20 12:34:49'),
(7, 'blog', 'Blog', '15506534591.jpg', 0, 1, '2019-02-20 12:34:49'),
(8, 'contact', 'Contact Us', '1550653476s.jpg', 1, 1, '2019-02-20 12:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permissions` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions_old`
--

CREATE TABLE `permissions_old` (
  `id` bigint(20) NOT NULL,
  `role` int(11) NOT NULL,
  `controller` varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  `interface` varchar(4) COLLATE utf8_swedish_ci NOT NULL,
  `display_name` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `c` tinyint(4) NOT NULL DEFAULT 0,
  `r` tinyint(4) NOT NULL DEFAULT 0,
  `u` tinyint(4) NOT NULL DEFAULT 0,
  `d` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `permissions_old`
--

INSERT INTO `permissions_old` (`id`, `role`, `controller`, `interface`, `display_name`, `c`, `r`, `u`, `d`) VALUES
(1, 1, 'Account', 'b', 'Account', 1, 1, 1, 1),
(2, 1, 'Admin', 'b', 'Admin', 1, 1, 1, 1),
(3, 1, 'Amenities', 'b', 'Amenities', 1, 1, 1, 1),
(4, 1, 'Blog', 'b', 'Blog', 1, 1, 1, 1),
(5, 1, 'Bookings', 'b', 'Bookings', 1, 1, 1, 1),
(6, 1, 'Clients', 'b', 'Clients', 1, 1, 1, 1),
(7, 1, 'Locations', 'b', 'Locations', 1, 1, 1, 1),
(8, 1, 'Messages', 'b', 'Messages', 1, 1, 1, 1),
(9, 1, 'Pos', 'b', 'Pos', 1, 1, 1, 1),
(10, 1, 'Routes', 'b', 'Routes', 1, 1, 1, 1),
(11, 1, 'Schedules', 'b', 'Schedules', 1, 1, 1, 1),
(12, 1, 'Sections', 'b', 'Sections', 1, 1, 1, 1),
(13, 1, 'Services', 'b', 'Services', 1, 1, 1, 1),
(14, 1, 'Settings', 'b', 'Settings', 1, 1, 1, 1),
(15, 1, 'Site', 'b', 'Site', 1, 1, 1, 1),
(16, 1, 'Slider', 'b', 'Slider', 1, 1, 1, 1),
(17, 1, 'Team', 'b', 'Team', 1, 1, 1, 1),
(18, 1, 'Testimonials', 'b', 'Testimonials', 1, 1, 1, 1),
(19, 1, 'User', 'b', 'User', 1, 1, 1, 1),
(20, 1, 'Users', 'b', 'Users', 1, 1, 1, 1),
(21, 1, 'Vehicles', 'b', 'Vehicles', 1, 1, 1, 1),
(22, 1, 'Vendor', 'b', 'Vendor', 1, 1, 1, 1),
(23, 1, 'Verify', 'b', 'Verify', 1, 1, 1, 1),
(24, 2, 'Account', 'b', 'Account', 1, 1, 1, 1),
(25, 2, 'Admin', 'b', 'Admin', 1, 1, 1, 1),
(26, 2, 'Amenities', 'b', 'Amenities', 1, 1, 1, 1),
(27, 2, 'Blog', 'b', 'Blog', 1, 1, 1, 1),
(28, 2, 'Bookings', 'b', 'Bookings', 1, 1, 1, 1),
(29, 2, 'Clients', 'b', 'Clients', 1, 1, 1, 1),
(30, 2, 'Locations', 'b', 'Locations', 1, 1, 1, 1),
(31, 2, 'Messages', 'b', 'Messages', 1, 1, 1, 1),
(32, 2, 'Pos', 'b', 'Pos', 1, 1, 1, 1),
(33, 2, 'Routes', 'b', 'Routes', 1, 1, 1, 1),
(34, 2, 'Schedules', 'b', 'Schedules', 1, 1, 1, 1),
(35, 2, 'Sections', 'b', 'Sections', 1, 1, 1, 1),
(36, 2, 'Services', 'b', 'Services', 1, 1, 1, 1),
(37, 2, 'Settings', 'b', 'Settings', 1, 1, 1, 1),
(38, 2, 'Site', 'b', 'Site', 1, 1, 1, 1),
(39, 2, 'Slider', 'b', 'Slider', 1, 1, 1, 1),
(40, 2, 'Team', 'b', 'Team', 1, 1, 1, 1),
(41, 2, 'Testimonials', 'b', 'Testimonials', 1, 1, 1, 1),
(42, 2, 'User', 'b', 'User', 1, 1, 1, 1),
(43, 2, 'Users', 'b', 'Users', 1, 1, 1, 1),
(44, 2, 'Vehicles', 'b', 'Vehicles', 1, 1, 1, 1),
(45, 2, 'Vendor', 'b', 'Vendor', 1, 1, 1, 1),
(46, 2, 'Verify', 'b', 'Verify', 1, 1, 1, 1),
(47, 3, 'Account', 'b', 'Account', 1, 1, 1, 1),
(48, 3, 'Admin', 'b', 'Admin', 1, 1, 1, 1),
(49, 3, 'Amenities', 'b', 'Amenities', 1, 1, 1, 1),
(50, 3, 'Blog', 'b', 'Blog', 1, 1, 1, 1),
(51, 3, 'Bookings', 'b', 'Bookings', 1, 1, 1, 1),
(52, 3, 'Clients', 'b', 'Clients', 1, 1, 1, 1),
(53, 3, 'Locations', 'b', 'Locations', 1, 1, 1, 1),
(54, 3, 'Messages', 'b', 'Messages', 1, 1, 1, 1),
(55, 3, 'Pos', 'b', 'Pos', 1, 1, 1, 1),
(56, 3, 'Routes', 'b', 'Routes', 1, 1, 1, 1),
(57, 3, 'Schedules', 'b', 'Schedules', 1, 1, 1, 1),
(58, 3, 'Sections', 'b', 'Sections', 1, 1, 1, 1),
(59, 3, 'Services', 'b', 'Services', 1, 1, 1, 1),
(60, 3, 'Settings', 'b', 'Settings', 1, 1, 1, 1),
(61, 3, 'Site', 'b', 'Site', 1, 1, 1, 1),
(62, 3, 'Slider', 'b', 'Slider', 1, 1, 1, 1),
(63, 3, 'Team', 'b', 'Team', 1, 1, 1, 1),
(64, 3, 'Testimonials', 'b', 'Testimonials', 1, 1, 1, 1),
(65, 3, 'User', 'b', 'User', 1, 1, 1, 1),
(66, 3, 'Users', 'b', 'Users', 1, 1, 1, 1),
(67, 3, 'Vehicles', 'b', 'Vehicles', 1, 1, 1, 1),
(68, 3, 'Vendor', 'b', 'Vendor', 1, 1, 1, 1),
(69, 3, 'Verify', 'b', 'Verify', 1, 1, 1, 1),
(70, 4, 'Account', 'b', 'Account', 1, 1, 1, 1),
(71, 4, 'Admin', 'b', 'Admin', 1, 1, 1, 1),
(72, 4, 'Amenities', 'b', 'Amenities', 1, 1, 1, 1),
(73, 4, 'Blog', 'b', 'Blog', 1, 1, 1, 1),
(74, 4, 'Bookings', 'b', 'Bookings', 1, 1, 1, 1),
(75, 4, 'Clients', 'b', 'Clients', 1, 1, 1, 1),
(76, 4, 'Locations', 'b', 'Locations', 1, 1, 1, 1),
(77, 4, 'Messages', 'b', 'Messages', 1, 1, 1, 1),
(78, 4, 'Pos', 'b', 'Pos', 1, 1, 1, 1),
(79, 4, 'Routes', 'b', 'Routes', 1, 1, 1, 1),
(80, 4, 'Schedules', 'b', 'Schedules', 1, 1, 1, 1),
(81, 4, 'Sections', 'b', 'Sections', 1, 1, 1, 1),
(82, 4, 'Services', 'b', 'Services', 1, 1, 1, 1),
(83, 4, 'Settings', 'b', 'Settings', 1, 1, 1, 1),
(84, 4, 'Site', 'b', 'Site', 1, 1, 1, 1),
(85, 4, 'Slider', 'b', 'Slider', 1, 1, 1, 1),
(86, 4, 'Team', 'b', 'Team', 1, 1, 1, 1),
(87, 4, 'Testimonials', 'b', 'Testimonials', 1, 1, 1, 1),
(88, 4, 'User', 'b', 'User', 1, 1, 1, 1),
(89, 4, 'Users', 'b', 'Users', 1, 1, 1, 1),
(90, 4, 'Vehicles', 'b', 'Vehicles', 1, 1, 1, 1),
(91, 4, 'Vendor', 'b', 'Vendor', 1, 1, 1, 1),
(92, 4, 'Verify', 'b', 'Verify', 1, 1, 1, 1),
(93, 5, 'Account', 'b', 'Account', 1, 1, 1, 1),
(94, 5, 'Admin', 'b', 'Admin', 1, 1, 1, 1),
(95, 5, 'Amenities', 'b', 'Amenities', 1, 1, 1, 1),
(96, 5, 'Blog', 'b', 'Blog', 1, 1, 1, 1),
(97, 5, 'Bookings', 'b', 'Bookings', 1, 1, 1, 1),
(98, 5, 'Clients', 'b', 'Clients', 1, 1, 1, 1),
(99, 5, 'Locations', 'b', 'Locations', 1, 1, 1, 1),
(100, 5, 'Messages', 'b', 'Messages', 1, 1, 1, 1),
(101, 5, 'Pos', 'b', 'Pos', 1, 1, 1, 1),
(102, 5, 'Routes', 'b', 'Routes', 1, 1, 1, 1),
(103, 5, 'Schedules', 'b', 'Schedules', 1, 1, 1, 1),
(104, 5, 'Sections', 'b', 'Sections', 1, 1, 1, 1),
(105, 5, 'Services', 'b', 'Services', 1, 1, 1, 1),
(106, 5, 'Settings', 'b', 'Settings', 1, 1, 1, 1),
(107, 5, 'Site', 'b', 'Site', 1, 1, 1, 1),
(108, 5, 'Slider', 'b', 'Slider', 1, 1, 1, 1),
(109, 5, 'Team', 'b', 'Team', 1, 1, 1, 1),
(110, 5, 'Testimonials', 'b', 'Testimonials', 1, 1, 1, 1),
(111, 5, 'User', 'b', 'User', 1, 1, 1, 1),
(112, 5, 'Users', 'b', 'Users', 1, 1, 1, 1),
(113, 5, 'Vehicles', 'b', 'Vehicles', 1, 1, 1, 1),
(114, 5, 'Vendor', 'b', 'Vendor', 1, 1, 1, 1),
(115, 5, 'Verify', 'b', 'Verify', 1, 1, 1, 1),
(116, 6, 'Account', 'b', 'Account', 1, 1, 1, 1),
(117, 6, 'Admin', 'b', 'Admin', 1, 1, 1, 1),
(118, 6, 'Amenities', 'b', 'Amenities', 1, 1, 1, 1),
(119, 6, 'Blog', 'b', 'Blog', 1, 1, 1, 1),
(120, 6, 'Bookings', 'b', 'Bookings', 1, 1, 1, 1),
(121, 6, 'Clients', 'b', 'Clients', 1, 1, 1, 1),
(122, 6, 'Locations', 'b', 'Locations', 1, 1, 1, 1),
(123, 6, 'Messages', 'b', 'Messages', 1, 1, 1, 1),
(124, 6, 'Pos', 'b', 'Pos', 1, 1, 1, 1),
(125, 6, 'Routes', 'b', 'Routes', 1, 1, 1, 1),
(126, 6, 'Schedules', 'b', 'Schedules', 1, 1, 1, 1),
(127, 6, 'Sections', 'b', 'Sections', 1, 1, 1, 1),
(128, 6, 'Services', 'b', 'Services', 1, 1, 1, 1),
(129, 6, 'Settings', 'b', 'Settings', 1, 1, 1, 1),
(130, 6, 'Site', 'b', 'Site', 1, 1, 1, 1),
(131, 6, 'Slider', 'b', 'Slider', 1, 1, 1, 1),
(132, 6, 'Team', 'b', 'Team', 1, 1, 1, 1),
(133, 6, 'Testimonials', 'b', 'Testimonials', 1, 1, 1, 1),
(134, 6, 'User', 'b', 'User', 1, 1, 1, 1),
(135, 6, 'Users', 'b', 'Users', 1, 1, 1, 1),
(136, 6, 'Vehicles', 'b', 'Vehicles', 1, 1, 1, 1),
(137, 6, 'Vendor', 'b', 'Vendor', 1, 1, 1, 1),
(138, 6, 'Verify', 'b', 'Verify', 1, 1, 1, 1),
(139, 1, 'Permissions', 'b', 'Access Control', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `vehicle_id` bigint(20) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `seats` longtext COLLATE utf8_swedish_ci NOT NULL,
  `duration` varchar(32) COLLATE utf8_swedish_ci DEFAULT NULL,
  `departure` datetime NOT NULL,
  `arrival` datetime NOT NULL,
  `location_from` varchar(256) COLLATE utf8_swedish_ci DEFAULT NULL,
  `location_to` varchar(256) COLLATE utf8_swedish_ci DEFAULT NULL,
  `location_from_id` bigint(20) DEFAULT NULL,
  `location_to_id` bigint(20) DEFAULT NULL,
  `prices` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `additional_note` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `cancellation_note` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `cancellation_rates` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `drivers_info` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `has_departed` tinyint(4) NOT NULL DEFAULT 0,
  `operator_id` bigint(20) DEFAULT NULL,
  `operator_has_verified` tinyint(4) NOT NULL,
  `booking_closed` tinyint(4) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `user_id`, `vehicle_id`, `is_active`, `seats`, `duration`, `departure`, `arrival`, `location_from`, `location_to`, `location_from_id`, `location_to_id`, `prices`, `additional_note`, `cancellation_note`, `cancellation_rates`, `drivers_info`, `has_departed`, `operator_id`, `operator_has_verified`, `booking_closed`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 5, 1, 1, '[{\"id\":\"0\",\"name\":\"1\",\"position\":{\"left\":\"346px\",\"top\":\"133px\"},\"size\":{\"width\":\"56px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"1\",\"name\":\"2\",\"position\":{\"left\":\"97px\",\"top\":\"170px\"},\"size\":{\"width\":\"79px\",\"height\":\"25px\"},\"status\":\"1\",\"reservation\":\"2\"},{\"id\":\"2\",\"name\":\"3\",\"position\":{\"left\":\"112px\",\"top\":\"6px\"},\"size\":{\"width\":\"63px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"0\"},{\"id\":\"3\",\"name\":\"4\",\"position\":{\"left\":\"261px\",\"top\":\"169px\"},\"size\":{\"width\":\"68px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"4\",\"name\":\"5\",\"position\":{\"left\":\"345px\",\"top\":\"88px\"},\"size\":{\"width\":\"57px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"5\",\"name\":\"6\",\"position\":{\"left\":\"264px\",\"top\":\"44px\"},\"size\":{\"width\":\"60px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"1\"},{\"id\":\"6\",\"name\":\"6\",\"position\":{\"left\":\"99px\",\"top\":\"132px\"},\"size\":{\"width\":\"77px\",\"height\":\"25px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"7\",\"name\":\"8\",\"position\":{\"left\":\"187px\",\"top\":\"171px\"},\"size\":{\"width\":\"64px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"8\",\"name\":\"9\",\"position\":{\"left\":\"262px\",\"top\":\"133px\"},\"size\":{\"width\":\"64px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"9\",\"name\":\"10\",\"position\":{\"left\":\"346px\",\"top\":\"171px\"},\"size\":{\"width\":\"58px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"10\",\"name\":\"11\",\"position\":{\"left\":\"345px\",\"top\":\"42px\"},\"size\":{\"width\":\"56px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"11\",\"name\":\"12\",\"position\":{\"left\":\"344px\",\"top\":\"6px\"},\"size\":{\"width\":\"58px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"12\",\"name\":\"13\",\"position\":{\"left\":\"185px\",\"top\":\"6px\"},\"size\":{\"width\":\"64px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"13\",\"name\":\"14\",\"position\":{\"left\":\"263px\",\"top\":\"6px\"},\"size\":{\"width\":\"63px\",\"height\":\"25px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"14\",\"name\":\"15\",\"position\":{\"left\":\"183px\",\"top\":\"41px\"},\"size\":{\"width\":\"67px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"15\",\"name\":\"16\",\"position\":{\"left\":\"187px\",\"top\":\"133px\"},\"size\":{\"width\":\"64px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"16\",\"name\":\"17\",\"position\":{\"left\":\"112px\",\"top\":\"43px\"},\"size\":{\"width\":\"63px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"}]', '20 : 00', '2020-02-05 15:45:00', '2020-02-06 11:45:00', 'kathmandu', 'pokhara', NULL, NULL, '[{\"1\":{\"from_id\":\"10\",\"from\":\"chabahil\",\"to_id\":\"7\",\"to\":\"hattigauda\",\"from_address\":\"kathmandu, kathamdnu, 1\",\"to_address\":\"kathmandu, kathmandu, kathamdnu, 1\",\"price\":\"12\"},\"2\":{\"from_id\":\"10\",\"from\":\"chabahil\",\"to_id\":\"2\",\"to\":\"maharajgunj\",\"from_address\":\"Kathmandu, kathmandu, 0\",\"to_address\":\"Thribum Sadak, Kathmandu, kathmandu, 0\",\"price\":\"12\"},\"3\":{\"from_id\":\"10\",\"from\":\"chabahil\",\"to_id\":\"5\",\"to\":\"bansbari\",\"from_address\":\"kathmandu, kathmandu, 3\",\"to_address\":\"bansbari, kathmandu, kathmandu, 3\",\"price\":\"12\"},\"4\":{\"from_id\":\"10\",\"from\":\"chabahil\",\"to_id\":\"8\",\"to\":\"budanilkantha\",\"from_address\":\"kathmandu, 5\",\"to_address\":\"kathmandu, 5\",\"price\":\"12\"}},{\"2\":{\"from_id\":\"7\",\"from\":\"hattigauda\",\"to_id\":\"2\",\"to\":\"maharajgunj\",\"from_address\":\"Thribum Sadak, Kathmandu, kathmandu, 0\",\"to_address\":\"Thribum Sadak, Kathmandu, kathmandu, 0\",\"price\":\"23\"},\"3\":{\"from_id\":\"7\",\"from\":\"hattigauda\",\"to_id\":\"5\",\"to\":\"bansbari\",\"from_address\":\"bansbari, kathmandu, kathmandu, 3\",\"to_address\":\"bansbari, kathmandu, kathmandu, 3\",\"price\":\"23\"},\"4\":{\"from_id\":\"7\",\"from\":\"hattigauda\",\"to_id\":\"8\",\"to\":\"budanilkantha\",\"from_address\":\", kathmandu, 5\",\"to_address\":\"kathmandu, 5\",\"price\":\"23\"}},{\"3\":{\"from_id\":\"2\",\"from\":\"maharajgunj\",\"to_id\":\"5\",\"to\":\"bansbari\",\"from_address\":\"bansbari, kathmandu, kathmandu, 3\",\"to_address\":\"bansbari, kathmandu, kathmandu, 3\",\"price\":\"34\"},\"4\":{\"from_id\":\"2\",\"from\":\"maharajgunj\",\"to_id\":\"8\",\"to\":\"budanilkantha\",\"from_address\":\", kathmandu, 5\",\"to_address\":\"kathmandu, 5\",\"price\":\"34\"}},{\"4\":{\"from_id\":\"5\",\"from\":\"bansbari\",\"to_id\":\"8\",\"to\":\"budanilkantha\",\"from_address\":\", kathmandu, 5\",\"to_address\":\"kathmandu, 5\",\"price\":\"45\"}}]', '<h5 class=\"card-title\">Additional Information</h5>', '<h5 style=\"margin-right: 0px; margin-bottom: 22px; margin-left: 0px; line-height: 1.3; font-size: 18px; color: rgb(113, 113, 113); border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-transform: capitalize; letter-spacing: 0.2px;\">Cancellation Charges</h5><div class=\"cancellation-charges\" style=\"border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(113, 113, 113); letter-spacing: 0.2px;\"><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">30 days prior to departure - 0%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">7 days prior to departure - 25%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">5 days prior to departure - 40%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">3 days prior to departure - 60%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">1 day prior to departure - 75%</p></div>', NULL, '<p>Drivers\'s note</p>', 0, NULL, 0, 0, '2019-04-02 10:48:17', 1, '2019-09-01 08:44:48', 5),
(2, 5, 1, 1, '[{\"id\":\"0\",\"name\":\"1\",\"position\":{\"left\":\"346px\",\"top\":\"133px\"},\"size\":{\"width\":\"56px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"1\",\"name\":\"2\",\"position\":{\"left\":\"97px\",\"top\":\"170px\"},\"size\":{\"width\":\"79px\",\"height\":\"25px\"},\"status\":\"1\",\"reservation\":\"2\"},{\"id\":\"2\",\"name\":\"3\",\"position\":{\"left\":\"112px\",\"top\":\"6px\"},\"size\":{\"width\":\"63px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"0\"},{\"id\":\"3\",\"name\":\"4\",\"position\":{\"left\":\"261px\",\"top\":\"169px\"},\"size\":{\"width\":\"68px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"4\",\"name\":\"5\",\"position\":{\"left\":\"345px\",\"top\":\"88px\"},\"size\":{\"width\":\"57px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"5\",\"name\":\"6\",\"position\":{\"left\":\"264px\",\"top\":\"44px\"},\"size\":{\"width\":\"60px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"1\"},{\"id\":\"6\",\"name\":\"6\",\"position\":{\"left\":\"99px\",\"top\":\"132px\"},\"size\":{\"width\":\"77px\",\"height\":\"25px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"7\",\"name\":\"8\",\"position\":{\"left\":\"187px\",\"top\":\"171px\"},\"size\":{\"width\":\"64px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"8\",\"name\":\"9\",\"position\":{\"left\":\"262px\",\"top\":\"133px\"},\"size\":{\"width\":\"64px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"9\",\"name\":\"10\",\"position\":{\"left\":\"346px\",\"top\":\"171px\"},\"size\":{\"width\":\"58px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"10\",\"name\":\"11\",\"position\":{\"left\":\"345px\",\"top\":\"42px\"},\"size\":{\"width\":\"56px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"11\",\"name\":\"12\",\"position\":{\"left\":\"344px\",\"top\":\"6px\"},\"size\":{\"width\":\"58px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"12\",\"name\":\"13\",\"position\":{\"left\":\"185px\",\"top\":\"6px\"},\"size\":{\"width\":\"64px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"13\",\"name\":\"14\",\"position\":{\"left\":\"263px\",\"top\":\"6px\"},\"size\":{\"width\":\"63px\",\"height\":\"25px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"14\",\"name\":\"15\",\"position\":{\"left\":\"183px\",\"top\":\"41px\"},\"size\":{\"width\":\"67px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"15\",\"name\":\"16\",\"position\":{\"left\":\"187px\",\"top\":\"133px\"},\"size\":{\"width\":\"64px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"16\",\"name\":\"17\",\"position\":{\"left\":\"112px\",\"top\":\"43px\"},\"size\":{\"width\":\"63px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"}]', '23 : 00', '2020-02-20 14:37:00', '2020-02-21 00:00:00', 'kathmandu', 'pokhara', NULL, NULL, '[{\"1\":{\"from_id\":\"5\",\"from\":\"bansbari\",\"to_id\":\"3\",\"to\":\"lazimpat\",\"from_address\":\"lazimpat, kathmandu, kathmandu, 1\",\"to_address\":\"lazimpat, kathmandu, kathmandu, 1\",\"price\":\"\"},\"2\":{\"from_id\":\"5\",\"from\":\"bansbari\",\"to_id\":\"7\",\"to\":\"hattigauda\",\"from_address\":\"kathmandu, kathmandu, kathamdnu, 1\",\"to_address\":\"kathmandu, kathmandu, kathamdnu, 1\",\"price\":\"\"},\"3\":{\"from_id\":\"5\",\"from\":\"bansbari\",\"to_id\":\"8\",\"to\":\"budanilkantha\",\"from_address\":\", kathmandu, 5\",\"to_address\":\"kathmandu, 5\",\"price\":\"\"}},{\"2\":{\"from_id\":\"3\",\"from\":\"lazimpat\",\"to_id\":\"7\",\"to\":\"hattigauda\",\"from_address\":\"kathmandu, kathmandu, kathamdnu, 1\",\"to_address\":\"kathmandu, kathmandu, kathamdnu, 1\",\"price\":\"\"},\"3\":{\"from_id\":\"3\",\"from\":\"lazimpat\",\"to_id\":\"8\",\"to\":\"budanilkantha\",\"from_address\":\", kathmandu, 5\",\"to_address\":\"kathmandu, 5\",\"price\":\"\"}},{\"3\":{\"from_id\":\"7\",\"from\":\"hattigauda\",\"to_id\":\"8\",\"to\":\"budanilkantha\",\"from_address\":\", kathmandu, 5\",\"to_address\":\"kathmandu, 5\",\"price\":\"\"}}]', '', '<h5 style=\"margin-right: 0px; margin-bottom: 22px; margin-left: 0px; line-height: 1.3; font-size: 18px; color: rgb(113, 113, 113); border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-transform: capitalize; letter-spacing: 0.2px;\">Cancellation Charges</h5><div class=\"cancellation-charges\" style=\"border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(113, 113, 113); letter-spacing: 0.2px;\"><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">30 days prior to departure - 0%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">7 days prior to departure - 25%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">5 days prior to departure - 40%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">3 days prior to departure - 60%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">1 day prior to departure - 75%</p></div>', NULL, '', 0, NULL, 0, 0, '2019-04-02 14:13:57', 1, '2019-08-06 13:28:45', 1),
(7, 5, 1, 1, '[{\"id\":\"0\",\"name\":\"1\",\"position\":{\"left\":\"346px\",\"top\":\"133px\"},\"size\":{\"width\":\"56px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"1\",\"name\":\"2\",\"position\":{\"left\":\"97px\",\"top\":\"170px\"},\"size\":{\"width\":\"79px\",\"height\":\"25px\"},\"status\":\"1\",\"reservation\":\"2\"},{\"id\":\"2\",\"name\":\"3\",\"position\":{\"left\":\"112px\",\"top\":\"6px\"},\"size\":{\"width\":\"63px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"0\"},{\"id\":\"3\",\"name\":\"4\",\"position\":{\"left\":\"261px\",\"top\":\"169px\"},\"size\":{\"width\":\"68px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"4\",\"name\":\"5\",\"position\":{\"left\":\"345px\",\"top\":\"88px\"},\"size\":{\"width\":\"57px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"5\",\"name\":\"6\",\"position\":{\"left\":\"264px\",\"top\":\"44px\"},\"size\":{\"width\":\"60px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"1\"},{\"id\":\"6\",\"name\":\"6\",\"position\":{\"left\":\"99px\",\"top\":\"132px\"},\"size\":{\"width\":\"77px\",\"height\":\"25px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"7\",\"name\":\"8\",\"position\":{\"left\":\"187px\",\"top\":\"171px\"},\"size\":{\"width\":\"64px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"8\",\"name\":\"9\",\"position\":{\"left\":\"262px\",\"top\":\"133px\"},\"size\":{\"width\":\"64px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"9\",\"name\":\"10\",\"position\":{\"left\":\"346px\",\"top\":\"171px\"},\"size\":{\"width\":\"58px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"10\",\"name\":\"11\",\"position\":{\"left\":\"345px\",\"top\":\"42px\"},\"size\":{\"width\":\"56px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"11\",\"name\":\"12\",\"position\":{\"left\":\"344px\",\"top\":\"6px\"},\"size\":{\"width\":\"58px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"12\",\"name\":\"13\",\"position\":{\"left\":\"185px\",\"top\":\"6px\"},\"size\":{\"width\":\"64px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"13\",\"name\":\"14\",\"position\":{\"left\":\"263px\",\"top\":\"6px\"},\"size\":{\"width\":\"63px\",\"height\":\"25px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"14\",\"name\":\"15\",\"position\":{\"left\":\"183px\",\"top\":\"41px\"},\"size\":{\"width\":\"67px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"15\",\"name\":\"16\",\"position\":{\"left\":\"187px\",\"top\":\"133px\"},\"size\":{\"width\":\"64px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"16\",\"name\":\"17\",\"position\":{\"left\":\"112px\",\"top\":\"43px\"},\"size\":{\"width\":\"63px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"}]', '650 : 07', '2019-10-25 11:21:00', '2019-10-26 07:56:00', 'kathmandu', 'dharan', NULL, NULL, '[{\"1\":{\"from_id\":\"10\",\"from\":\"chabahil\",\"to_id\":\"7\",\"to\":\"hattigauda\",\"from_address\":\"kathmandu, kathamdnu, 1\",\"to_address\":\"kathmandu, kathmandu, kathamdnu, 1\",\"price\":\"12\"},\"2\":{\"from_id\":\"10\",\"from\":\"chabahil\",\"to_id\":\"3\",\"to\":\"lazimpat\",\"from_address\":\"kathmandu, kathmandu, 1\",\"to_address\":\"lazimpat, kathmandu, kathmandu, 1\",\"price\":\"14\"},\"3\":{\"from_id\":\"10\",\"from\":\"chabahil\",\"to_id\":\"5\",\"to\":\"bansbari\",\"from_address\":\"kathmandu, kathmandu, 3\",\"to_address\":\"bansbari, kathmandu, kathmandu, 3\",\"price\":\"15\"},\"4\":{\"from_id\":\"10\",\"from\":\"chabahil\",\"to_id\":\"8\",\"to\":\"budanilkantha\",\"from_address\":\"kathmandu, 5\",\"to_address\":\"kathmandu, 5\",\"price\":\"16\"}},{\"2\":{\"from_id\":\"7\",\"from\":\"hattigauda\",\"to_id\":\"3\",\"to\":\"lazimpat\",\"from_address\":\"lazimpat, kathmandu, kathmandu, 1\",\"to_address\":\"lazimpat, kathmandu, kathmandu, 1\",\"price\":\"21\"},\"3\":{\"from_id\":\"7\",\"from\":\"hattigauda\",\"to_id\":\"5\",\"to\":\"bansbari\",\"from_address\":\"bansbari, kathmandu, kathmandu, 3\",\"to_address\":\"bansbari, kathmandu, kathmandu, 3\",\"price\":\"22\"},\"4\":{\"from_id\":\"7\",\"from\":\"hattigauda\",\"to_id\":\"8\",\"to\":\"budanilkantha\",\"from_address\":\", kathmandu, 5\",\"to_address\":\"kathmandu, 5\",\"price\":\"23\"}},{\"3\":{\"from_id\":\"3\",\"from\":\"lazimpat\",\"to_id\":\"5\",\"to\":\"bansbari\",\"from_address\":\"bansbari, kathmandu, kathmandu, 3\",\"to_address\":\"bansbari, kathmandu, kathmandu, 3\",\"price\":\"31\"},\"4\":{\"from_id\":\"3\",\"from\":\"lazimpat\",\"to_id\":\"8\",\"to\":\"budanilkantha\",\"from_address\":\", kathmandu, 5\",\"to_address\":\"kathmandu, 5\",\"price\":\"32\"}},{\"4\":{\"from_id\":\"5\",\"from\":\"bansbari\",\"to_id\":\"8\",\"to\":\"budanilkantha\",\"from_address\":\", kathmandu, 5\",\"to_address\":\"kathmandu, 5\",\"price\":\"33\"}}]', '<h5 style=\"margin-right: 0px; margin-bottom: 22px; margin-left: 0px; line-height: 1.3; font-size: 18px; color: rgb(113, 113, 113); border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-transform: capitalize; letter-spacing: 0.2px;\">Cancellation Charges</h5><div class=\"cancellation-charges\" style=\"border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(113, 113, 113); letter-spacing: 0.2px;\"><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">30 days prior to departure - 0%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">7 days prior to departure - 25%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">5 days prior to departure - 40%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">3 days prior to departure - 60%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">1 day prior to departure - 75%</p></div>', '<h5 style=\"margin-right: 0px; margin-bottom: 22px; margin-left: 0px; line-height: 1.3; font-size: 18px; color: rgb(113, 113, 113); border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-transform: capitalize; letter-spacing: 0.2px;\">Cancellation Charges</h5><div class=\"cancellation-charges\" style=\"border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(113, 113, 113); letter-spacing: 0.2px;\"><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">30 days prior to departure - 0%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">7 days prior to departure - 25%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">5 days prior to departure - 40%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">3 days prior to departure - 60%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">1 day prior to departure - 75%</p></div>', NULL, '<p>Hari Bahadur</p><p>Number : 985202145</p>', 0, NULL, 0, 0, '2019-05-19 06:59:38', 1, '2019-08-06 13:29:44', 1),
(8, 5, 1, 1, '[{\"id\":\"0\",\"name\":\"1\",\"position\":{\"left\":\"346px\",\"top\":\"133px\"},\"size\":{\"width\":\"56px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"1\",\"name\":\"2\",\"position\":{\"left\":\"97px\",\"top\":\"170px\"},\"size\":{\"width\":\"79px\",\"height\":\"25px\"},\"status\":\"1\",\"reservation\":\"2\"},{\"id\":\"2\",\"name\":\"3\",\"position\":{\"left\":\"112px\",\"top\":\"6px\"},\"size\":{\"width\":\"63px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"0\"},{\"id\":\"3\",\"name\":\"4\",\"position\":{\"left\":\"261px\",\"top\":\"169px\"},\"size\":{\"width\":\"68px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"4\",\"name\":\"5\",\"position\":{\"left\":\"345px\",\"top\":\"88px\"},\"size\":{\"width\":\"57px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"5\",\"name\":\"6\",\"position\":{\"left\":\"264px\",\"top\":\"44px\"},\"size\":{\"width\":\"60px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"1\",\"booking\":{\"booking_id\":\"2\",\"temporary\":false,\"time\":\"2019-09-08 11:00:55\",\"passenger\":{\"name\":\"Timon Dorsey\",\"age\":\"97\",\"sex\":\"m\"}}},{\"id\":\"6\",\"name\":\"6\",\"position\":{\"left\":\"99px\",\"top\":\"132px\"},\"size\":{\"width\":\"77px\",\"height\":\"25px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"7\",\"name\":\"8\",\"position\":{\"left\":\"187px\",\"top\":\"171px\"},\"size\":{\"width\":\"64px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"8\",\"name\":\"9\",\"position\":{\"left\":\"262px\",\"top\":\"133px\"},\"size\":{\"width\":\"64px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"9\",\"name\":\"10\",\"position\":{\"left\":\"346px\",\"top\":\"171px\"},\"size\":{\"width\":\"58px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"10\",\"name\":\"11\",\"position\":{\"left\":\"345px\",\"top\":\"42px\"},\"size\":{\"width\":\"56px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"11\",\"name\":\"12\",\"position\":{\"left\":\"344px\",\"top\":\"6px\"},\"size\":{\"width\":\"58px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"12\",\"name\":\"13\",\"position\":{\"left\":\"185px\",\"top\":\"6px\"},\"size\":{\"width\":\"64px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\",\"booking\":{\"booking_id\":\"1\",\"temporary\":false,\"time\":\"2019-09-07 15:42:56\",\"passenger\":{\"name\":\"Henry Blackburn\",\"age\":\"19\",\"sex\":\"m\"}}},{\"id\":\"13\",\"name\":\"14\",\"position\":{\"left\":\"263px\",\"top\":\"6px\"},\"size\":{\"width\":\"63px\",\"height\":\"25px\"},\"status\":\"1\",\"reservation\":\"0\",\"booking\":{\"booking_id\":\"2\",\"temporary\":false,\"time\":\"2019-09-08 11:00:55\",\"passenger\":{\"name\":\"Penelope Mills\",\"age\":\"66\",\"sex\":\"f\"}}},{\"id\":\"14\",\"name\":\"15\",\"position\":{\"left\":\"183px\",\"top\":\"41px\"},\"size\":{\"width\":\"67px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\",\"booking\":{\"booking_id\":\"1\",\"temporary\":false,\"time\":\"2019-09-07 15:42:56\",\"passenger\":{\"name\":\"Stewart Buck\",\"age\":\"30\",\"sex\":\"m\"}}},{\"id\":\"15\",\"name\":\"16\",\"position\":{\"left\":\"187px\",\"top\":\"133px\"},\"size\":{\"width\":\"64px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"16\",\"name\":\"17\",\"position\":{\"left\":\"112px\",\"top\":\"43px\"},\"size\":{\"width\":\"63px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"}]', '01 : 45', '2020-02-13 00:00:00', '2020-02-14 00:00:00', 'kathmandu', 'pokhara', NULL, NULL, '[{\"1\":{\"from_id\":\"10\",\"from\":\"chabahil\",\"to_id\":\"3\",\"to\":\"lazimpat\",\"from_address\":\"kathmandu, kathmandu, 1\",\"to_address\":\"lazimpat, kathmandu, kathmandu, 1\",\"price\":\"20\"},\"2\":{\"from_id\":\"10\",\"from\":\"chabahil\",\"to_id\":\"8\",\"to\":\"budanilkantha\",\"from_address\":\"kathmandu, 5\",\"to_address\":\"kathmandu, 5\",\"price\":\"25\"},\"3\":{\"from_id\":\"10\",\"from\":\"chabahil\",\"to_id\":\"1\",\"to\":\"gairidhara\",\"from_address\":\"kathmandu, kathmandu, fa-adjust\",\"to_address\":\"maharajgunj, kathmandu, kathmandu, fa-adjust\",\"price\":\"32\"}},{\"2\":{\"from_id\":\"3\",\"from\":\"lazimpat\",\"to_id\":\"8\",\"to\":\"budanilkantha\",\"from_address\":\", kathmandu, 5\",\"to_address\":\"kathmandu, 5\",\"price\":\"18\"},\"3\":{\"from_id\":\"3\",\"from\":\"lazimpat\",\"to_id\":\"1\",\"to\":\"gairidhara\",\"from_address\":\"maharajgunj, kathmandu, kathmandu, fa-adjust\",\"to_address\":\"maharajgunj, kathmandu, kathmandu, fa-adjust\",\"price\":\"20\"}},{\"3\":{\"from_id\":\"8\",\"from\":\"budanilkantha\",\"to_id\":\"1\",\"to\":\"gairidhara\",\"from_address\":\"kathmandu, kathmandu, fa-adjust\",\"to_address\":\"maharajgunj, kathmandu, kathmandu, fa-adjust\",\"price\":\"20\"}}]', '', '<h5 style=\"margin-right: 0px; margin-bottom: 22px; margin-left: 0px; line-height: 1.3; font-size: 18px; color: rgb(113, 113, 113); border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-transform: capitalize; letter-spacing: 0.2px;\">Cancellation Charges</h5><div class=\"cancellation-charges\" style=\"border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(113, 113, 113); letter-spacing: 0.2px;\"><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">30 days prior to departure - 0%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">7 days prior to departure - 25%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">5 days prior to departure - 40%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">3 days prior to departure - 60%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">1 day prior to departure - 75%</p></div>', NULL, '', 0, NULL, 0, 0, '2019-06-23 15:30:52', 1, '2019-08-06 13:31:03', 1),
(9, 5, 2, 1, '[{\"id\":\"0\",\"name\":\"1\",\"position\":{\"left\":\"120px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"1\",\"name\":\"2\",\"position\":{\"left\":\"121px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"2\"},{\"id\":\"2\",\"name\":\"3\",\"position\":{\"left\":\"170px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"0\"},{\"id\":\"3\",\"name\":\"4\",\"position\":{\"left\":\"220px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"4\",\"name\":\"5\",\"position\":{\"left\":\"220px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"5\",\"name\":\"6\",\"position\":{\"left\":\"170px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"1\"},{\"id\":\"6\",\"name\":\"6\",\"position\":{\"left\":\"170px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"7\",\"name\":\"8\",\"position\":{\"left\":\"270px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"8\",\"name\":\"9\",\"position\":{\"left\":\"170px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"9\",\"name\":\"10\",\"position\":{\"left\":\"370px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"10\",\"name\":\"11\",\"position\":{\"left\":\"320px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"11\",\"name\":\"12\",\"position\":{\"left\":\"370px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"12\",\"name\":\"13\",\"position\":{\"left\":\"320px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"13\",\"name\":\"14\",\"position\":{\"left\":\"270px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"14\",\"name\":\"15\",\"position\":{\"left\":\"220px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"15\",\"name\":\"16\",\"position\":{\"left\":\"220px\",\"top\":\"49px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"16\",\"name\":\"17\",\"position\":{\"left\":\"270px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"17\",\"name\":\"18\",\"position\":{\"left\":\"270px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"18\",\"name\":\"19\",\"position\":{\"left\":\"320px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"19\",\"name\":\"20\",\"position\":{\"left\":\"320px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"20\",\"name\":\"21\",\"position\":{\"left\":\"370px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"4\"},{\"id\":\"21\",\"name\":\"22\",\"position\":{\"left\":\"370px\",\"top\":\"90px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"4\"},{\"id\":\"22\",\"name\":\"23\",\"position\":{\"left\":\"370px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"}]', '24:15:0', '2019-10-25 13:25:00', '2019-10-26 16:26:00', 'kathmandu', 'pokhara', NULL, NULL, NULL, '<p>hjkhjk</p>', '<h5 style=\"margin-right: 0px; margin-bottom: 22px; margin-left: 0px; line-height: 1.3; font-size: 18px; color: rgb(113, 113, 113); border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-transform: capitalize; letter-spacing: 0.2px;\">Cancellation Charges</h5><div class=\"cancellation-charges\" style=\"border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(113, 113, 113); letter-spacing: 0.2px;\"><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">30 days prior to departure - 0%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">7 days prior to departure - 25%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">5 days prior to departure - 40%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">3 days prior to departure - 60%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">1 day prior to departure - 75%</p></div>', NULL, '<p>werwe</p>', 0, NULL, 0, 0, '2019-06-23 15:42:26', 1, '2019-06-29 11:25:51', 1),
(10, 5, 2, 1, '[{\"id\":\"0\",\"name\":\"1\",\"position\":{\"left\":\"120px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"1\",\"booking\":{\"booking_id\":\"1\",\"passenger\":{\"name\":\"Harka Bahadur\",\"age\":\"35\",\"sex\":\"M\",\"contact\":\"0980525000\"}}},{\"id\":\"1\",\"name\":\"2\",\"position\":{\"left\":\"121px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"2\"},{\"id\":\"2\",\"name\":\"3\",\"position\":{\"left\":\"170px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"0\"},{\"id\":\"3\",\"name\":\"4\",\"position\":{\"left\":\"220px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"4\",\"name\":\"5\",\"position\":{\"left\":\"220px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"5\",\"name\":\"6\",\"position\":{\"left\":\"170px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"1\"},{\"id\":\"6\",\"name\":\"6\",\"position\":{\"left\":\"170px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"7\",\"name\":\"8\",\"position\":{\"left\":\"270px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"8\",\"name\":\"9\",\"position\":{\"left\":\"170px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"9\",\"name\":\"10\",\"position\":{\"left\":\"370px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"10\",\"name\":\"11\",\"position\":{\"left\":\"320px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"11\",\"name\":\"12\",\"position\":{\"left\":\"370px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"12\",\"name\":\"13\",\"position\":{\"left\":\"320px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"13\",\"name\":\"14\",\"position\":{\"left\":\"270px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"14\",\"name\":\"15\",\"position\":{\"left\":\"220px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"15\",\"name\":\"16\",\"position\":{\"left\":\"220px\",\"top\":\"49px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"16\",\"name\":\"17\",\"position\":{\"left\":\"270px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"17\",\"name\":\"18\",\"position\":{\"left\":\"270px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"18\",\"name\":\"19\",\"position\":{\"left\":\"320px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"19\",\"name\":\"20\",\"position\":{\"left\":\"320px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"20\",\"name\":\"21\",\"position\":{\"left\":\"370px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"4\"},{\"id\":\"21\",\"name\":\"22\",\"position\":{\"left\":\"370px\",\"top\":\"90px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"4\"},{\"id\":\"22\",\"name\":\"23\",\"position\":{\"left\":\"370px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"}]', '22:45:0', '2019-10-25 04:22:00', '2019-10-26 15:15:00', 'kathmandu', 'dharan', NULL, NULL, NULL, '<p>Additional Info test</p>', '<h5 style=\"margin-right: 0px; margin-bottom: 22px; margin-left: 0px; line-height: 1.3; font-size: 18px; color: rgb(113, 113, 113); border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-transform: capitalize; letter-spacing: 0.2px;\">Cancellation Charges</h5><div class=\"cancellation-charges\" style=\"border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(113, 113, 113); letter-spacing: 0.2px;\"><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">30 days prior to departure - 0%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">7 days prior to departure - 25%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">5 days prior to departure - 40%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">3 days prior to departure - 60%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">1 day prior to departure - 75%</p></div>', NULL, '<p>Drivers information goes here</p>', 0, NULL, 0, 0, '2019-06-23 15:43:12', 1, '2019-07-02 13:09:30', 1),
(11, 5, 2, 1, '[{\"id\":\"0\",\"name\":\"1\",\"position\":{\"left\":\"120px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"1\",\"name\":\"2\",\"position\":{\"left\":\"121px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"2\"},{\"id\":\"2\",\"name\":\"3\",\"position\":{\"left\":\"170px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"0\"},{\"id\":\"3\",\"name\":\"4\",\"position\":{\"left\":\"220px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"4\",\"name\":\"5\",\"position\":{\"left\":\"220px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"5\",\"name\":\"6\",\"position\":{\"left\":\"170px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"1\"},{\"id\":\"6\",\"name\":\"6\",\"position\":{\"left\":\"170px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"7\",\"name\":\"8\",\"position\":{\"left\":\"270px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"8\",\"name\":\"9\",\"position\":{\"left\":\"170px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"9\",\"name\":\"10\",\"position\":{\"left\":\"370px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"10\",\"name\":\"11\",\"position\":{\"left\":\"320px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"11\",\"name\":\"12\",\"position\":{\"left\":\"370px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"12\",\"name\":\"13\",\"position\":{\"left\":\"320px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"13\",\"name\":\"14\",\"position\":{\"left\":\"270px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"14\",\"name\":\"15\",\"position\":{\"left\":\"220px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"15\",\"name\":\"16\",\"position\":{\"left\":\"220px\",\"top\":\"49px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"16\",\"name\":\"17\",\"position\":{\"left\":\"270px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"17\",\"name\":\"18\",\"position\":{\"left\":\"270px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"18\",\"name\":\"19\",\"position\":{\"left\":\"320px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"19\",\"name\":\"20\",\"position\":{\"left\":\"320px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"20\",\"name\":\"21\",\"position\":{\"left\":\"370px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"4\"},{\"id\":\"21\",\"name\":\"22\",\"position\":{\"left\":\"370px\",\"top\":\"90px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"4\"},{\"id\":\"22\",\"name\":\"23\",\"position\":{\"left\":\"370px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"}]', '0:12:22', '2019-10-25 09:16:00', '2019-10-26 13:23:00', 'kathmandu', 'pokhara', NULL, NULL, NULL, '<p>test</p>', '<h5 style=\"margin-right: 0px; margin-bottom: 22px; margin-left: 0px; line-height: 1.3; font-size: 18px; color: rgb(113, 113, 113); border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-transform: capitalize; letter-spacing: 0.2px;\">Cancellation Charges</h5><div class=\"cancellation-charges\" style=\"border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(113, 113, 113); letter-spacing: 0.2px;\"><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">30 days prior to departure - 0%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">7 days prior to departure - 25%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">5 days prior to departure - 40%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">3 days prior to departure - 60%</p><p style=\"margin-bottom: 1rem; border-color: rgb(225, 225, 225); border-style: solid; border-width: 0px; zoom: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">1 day prior to departure - 75%</p></div>', NULL, '<p>this</p>', 0, NULL, 0, 0, '2019-08-14 17:34:11', 1, '2019-07-08 18:12:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_departures`
--

CREATE TABLE `schedule_departures` (
  `id` bigint(20) NOT NULL,
  `schedule_id` bigint(20) NOT NULL,
  `passenger_info` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `is_boarding` tinyint(4) NOT NULL DEFAULT 0,
  `departed_on` datetime NOT NULL,
  `boarding_closed` tinyint(4) NOT NULL,
  `reached_on` datetime NOT NULL,
  `current_location` mediumtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `problem_flag` tinyint(4) NOT NULL DEFAULT 0,
  `problem_description` longtext COLLATE utf8_swedish_ci NOT NULL,
  `problem_reported_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `updated_on` datetime NOT NULL,
  `occupancy` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_routes`
--

CREATE TABLE `schedule_routes` (
  `id` bigint(20) NOT NULL,
  `order_index` int(11) DEFAULT NULL,
  `schedule_id` bigint(20) NOT NULL,
  `location_id` bigint(20) NOT NULL,
  `time` time NOT NULL,
  `description` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `is_boarding` tinyint(4) NOT NULL,
  `is_dropping` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `schedule_routes`
--

INSERT INTO `schedule_routes` (`id`, `order_index`, `schedule_id`, `location_id`, `time`, `description`, `is_boarding`, `is_dropping`) VALUES
(1, NULL, 10, 10, '12:45:00', 'asd', 1, 0),
(2, NULL, 10, 5, '13:00:00', 'asdf', 1, 1),
(3, NULL, 10, 3, '13:15:00', 'asdfasdfas', 1, 1),
(4, NULL, 10, 7, '13:28:00', 'asdfasdfasdf', 1, 1),
(5, NULL, 10, 8, '14:00:00', 'asdfasdfasdf', 0, 1),
(6, 1, 8, 10, '12:45:00', '', 1, 0),
(7, NULL, 9, 5, '13:00:00', '', 1, 1),
(8, NULL, 9, 3, '13:15:00', '', 1, 1),
(9, NULL, 9, 7, '13:28:00', '', 1, 1),
(10, NULL, 9, 8, '14:00:00', '', 0, 1),
(11, NULL, 9, 10, '12:45:00', '', 1, 0),
(12, 2, 8, 5, '13:00:00', '', 0, 0),
(13, 3, 8, 3, '13:15:00', '', 1, 0),
(14, 4, 8, 7, '13:28:00', '', 0, 0),
(15, 5, 8, 8, '14:00:00', '', 1, 1),
(16, 1, 7, 10, '12:45:00', '', 1, 0),
(17, 1, 2, 5, '13:00:00', '', 1, 1),
(18, 2, 2, 3, '13:15:00', '', 1, 1),
(19, 3, 2, 7, '13:28:00', '', 1, 1),
(20, 4, 2, 8, '14:00:00', '', 0, 1),
(21, 1, 1, 10, '11:45:00', '', 1, 0),
(22, 2, 1, 7, '12:45:00', '', 0, 1),
(23, 3, 1, 2, '13:45:00', '', 0, 1),
(24, NULL, 11, 10, '12:45:00', '', 1, 0),
(25, NULL, 11, 2, '13:00:00', '', 0, 0),
(26, NULL, 11, 7, '13:36:00', '', 1, 0),
(27, NULL, 11, 9, '13:50:00', '', 0, 1),
(28, NULL, 11, 4, '14:00:00', '', 0, 0),
(29, NULL, 11, 3, '14:21:00', '', 1, 0),
(36, 6, 8, 1, '14:30:00', '', 0, 1),
(37, 4, 1, 5, '14:00:00', '', 1, 0),
(38, 5, 1, 8, '15:45:00', '', 0, 1),
(39, 2, 7, 7, '13:45:00', '', 1, 1),
(40, 3, 7, 3, '14:15:00', '', 1, 1),
(41, 4, 7, 5, '14:41:00', '', 1, 1),
(42, 5, 7, 8, '14:52:00', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `page_id` int(255) NOT NULL,
  `section_order` int(11) NOT NULL DEFAULT 0,
  `title` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `sub_title` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `button_position` varchar(16) COLLATE utf8_swedish_ci NOT NULL DEFAULT 'left',
  `image` varchar(128) COLLATE utf8_swedish_ci DEFAULT NULL,
  `image_position` varchar(16) COLLATE utf8_swedish_ci NOT NULL DEFAULT 'left',
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `page_id`, `section_order`, `title`, `sub_title`, `content`, `button_text`, `button_link`, `button_position`, `image`, `image_position`, `created_on`) VALUES
(1, 1, 89, 'Aliquip laboris dolo', 'Deserunt aliquip dol', '<p>asd</p>', 'Quam dolore et sed e', 'Eos maiores laborum', 'center', '', 'left', '2019-02-19 15:00:57'),
(2, 3, 89, 'Aliquip laboris dolo', 'Deserunt aliquip dol', '<p>asd</p>', 'Quam dolore et sed e', 'Eos maiores laborum', 'left', '154893651123.jpg', 'left', '2019-02-19 15:01:18'),
(3, 3, 0, 'We like to excel expectations', '', '<span style=\"color: rgb(83, 83, 83); font-size: 16px; letter-spacing: 0.96px; text-align: center;\">Our team consists of three different but yet very compatible members. Each of us possess expertise in different fields enabling us to solve all your challenges.</span>', '', '', 'right', '', 'right', '2019-02-19 15:29:16'),
(4, 2, 0, 'WELCOME TO GATEWAY SCANDINAVIA', 'Your 21st century nordic representation and communication agency with a unique blend of 50+ years of industry experience and infotech.We take advantage of digitalization and expertise to help our clients get smarter.', '<p>With more than 50 years of experience of the travel trade and tourism industry we are experts on the Scandinavian markets and can assist you in any field of business you need to develop. We welcome all kind of business–small or big. Whether you are a destination ,a boutique-hotel ,a resort, a hotel-group,an attraction,a cruise Line or an airline, we will find a solution tailor made just for you.</p><p>Together,we will create solid strategies based on our unique analysing tools to build brand awareness around your products and deliver the expected ROI. Our nature is innovative and we like thinking out of the box,so researching new prospects and strengthening your presence in the scandic market will be our utmost concern. We are open to strategic partnerships and we look forward to co-create with you. Gateway Scandinavia stands in such grounds where we are highly capable of showing results,therefore we guarantee!! Our array of tailored solutions gives you the freedom to choose between the services we offer according to your necessity. We offer flexible pricing with no long term commitment basis,all solutions depending on your preference.</p>', 'About Us', 'http://gsc.auctadigital.com/site/about/', 'center', NULL, 'left', '2019-02-19 15:33:01'),
(5, 2, 0, 'TAILORED, TARGETED AND LATEST SOLUTIONS', '', '<p>Our mission is to help international destinations and companies within the tourism industry to increase sales and maximize media exposure in the Nordic countries. Our main focus is to establish and maximize our client´s online visibility in Scandinavia. We maximize our client\'s presence through our virtual destination concept, a digital platform for all kinds of communication on the Scandinavian markets. Our concept of using big data and other advanced analyzing tools in the process gives us an in-depth understanding of our client\'s products, providing us the knowledge needed to provide our clients with outstanding online and offline strategies.</p><p>All in all we represent, market and sell your destination and products in all the Scandinavian countries. With a combined experience of more than 50 years in the Scandinavian travel industry, we know how to increase sales and visibility even for you.</p>', '', '', 'left', NULL, 'left', '2019-02-19 15:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` char(40) COLLATE utf8_swedish_ci NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `slug` varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  `type` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `caption` longtext COLLATE utf8_swedish_ci NOT NULL,
  `is_editable` tinyint(4) NOT NULL,
  `content` longtext COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `slug`, `type`, `caption`, `is_editable`, `content`) VALUES
(2, 'social_media', 'json', 'Social Media icon(s) on the footer of the site', 1, ''),
(3, 'video', 'text', 'Link to video on the about us page', 1, ''),
(4, 'show_blog', 'boolean', 'Show / Hide the blog', 1, '0'),
(5, 'blog_count', 'boolean', 'Maximum number of blog posts in the homepage', 1, '6'),
(7, 'show_slider', 'boolean', 'Show / Hide revolution slider', 1, '1'),
(8, 'fonts', 'json', 'Fonts that will be used throughout the website', 0, '{\"main\":{\"name\":\"Poppins\",\"size\":\"18\",\"weight\":\"300\",\"type\":\"sherif\"}}'),
(9, 'search_departure_days', 'text', 'Maximum Departure Date from today', 1, '30'),
(10, 'search_return_days', 'text', 'Maximum Return Date from the date of departure', 1, '60'),
(11, 'seat_info_change_disclaimer', 'text', 'seat info change disclaimer', 1, 'Please leave blank for walking column. Once set, Layout cannot be changed later.'),
(12, 'min_vehicle_seats', 'text', 'Minimum seats in a vehicle', 1, '0'),
(13, 'max_vehicle_seats', 'text', 'Minimum seats in a vehicle', 1, '30'),
(14, 'can_verify_vendors', 'json', 'Users who can verify vendors', 1, '[0,1]'),
(15, 'can_verify_agents', 'json', 'Users who can verify agents', 1, '[0,1]'),
(16, 'can_verify_customers', 'json', 'Users who can verify customers', 1, '[0,1]'),
(18, 'can_verify_operators', 'json', 'Users who can verify Operators', 1, '[3]'),
(19, 'seat_hold_interval', 'text', 'Maximum minutes to hold a seat before booking', 1, '15'),
(20, 'max_booking_seats', 'text', 'Maximum number of seats allowed per bookings', 1, '54'),
(21, 'contact', 'json', 'Contact(es) used in the contact page', 1, '[{\r\n\"office\":\"ecosanjal.com,No. 12, Ribon Building,Chakrapath,Kathmandu, Nepal. \",\r\n\"call_us\":\"+977 (1) 456-78-90 or +977 (1) 456-78-90\",\r\n\"email\":\"info@gateway-scandinavia.com\",\r\n\"phone\":\"+45 61 80 01 14 \",\"on_footer\":\"0\",\r\n\"facebook\":\"+45 61 80 01 14 \",\"on_footer\":\"0\",\r\n\"twitter\":\"+45 61 80 01 14 \",\"on_footer\":\"0\",\r\n\"linkedin\":\"+45 61 80 01 14 \",\"on_footer\":\"0\",\r\n\"google\":\"+45 61 80 01 14 \",\"on_footer\":\"0\",\r\n\"pinterest\":\"+45 61 80 01 14 \",\"on_footer\":\"0\",\r\n\"google\":\"+45 61 80 01 14 \",\"on_footer\":\"0\"\r\n}]'),
(22, 'about_us', 'json', 'about us contains details of about us page.', 1, '{\"about_us\":\" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi facere earum quis ipsa vitae qui minima esse ducimus dolorum iste nisi laborum repellat dolores dolore debitis adipisci nemo quia autem pariatur a voluptatem dignissimos maiores accusantium nobis tempora consequatur cumque quas ea doloribus deleniti</br>Quibusdam commodi laboriosam error temporibus iste ipsa soluta distinctio maiores ad totam beatae incidunt veritatis enim? Reiciendis voluptate assumenda quidem eos explicabo rerum.\",\"who_we_are\":\"yoel Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi facere earum quis ipsa vitae qui minima esse ducimus dolorum iste nisi laborum repellat dolores dolore debitis adipisci nemo quia autem pariatur a voluptatem dignissimos maiores accusantium nobis tempora consequatur cumque quas ea doloribus deleniti</br>Quibusdam commodi laboriosam error temporibus iste ipsa soluta distinctio maiores ad totam beatae incidunt veritatis enim? Reiciendis voluptate assumenda quidem eos explicabo rerum.</br>Quibusdam commodi laboriosam error temporibus iste ipsa soluta distinctio maiores ad totam beatae incidunt veritatis enim? Reiciendis voluptate assumenda quidem eos explicabo rerum.?\",\"why_choose_us\":\"yoel Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi facere earum quis ipsa vitae qui minima esse ducimus dolorum iste nisi laborum repellat dolores dolore debitis adipisci nemo quia autem pariatur a voluptatem dignissimos maiores accusantium nobis tempora consequatur cumque quas ea doloribus deleniti</br>Quibusdam commodi laboriosam error temporibus iste ipsa soluta distinctio maiores ad totam beatae incidunt veritatis enim? Reiciendis voluptate assumenda quidem eos explicabo rerum.</br>Quibusdam commodi laboriosam error temporibus iste ipsa soluta distinctio maiores ad totam beatae incidunt veritatis enim? Reiciendis voluptate assumenda quidem eos explicabo rerum.\",\"mission_statement\":\"yoel Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi facere earum quis ipsa vitae qui minima esse ducimus dolorum iste nisi laborum repellat dolores dolore debitis adipisci nemo quia autem pariatur a voluptatem dignissimos maiores accusantium nobis tempora consequatur cumque quas ea doloribus deleniti</br>Quibusdam commodi laboriosam error temporibus iste ipsa soluta distinctio maiores ad totam beatae incidunt veritatis enim? Reiciendis voluptate assumenda quidem eos explicabo rerum.</br>Quibusdam commodi laboriosam error temporibus iste ipsa soluta distinctio maiores ad totam beatae incidunt veritatis enim? Reiciendis voluptate assumenda quidem eos explicabo rerum.\",\"what_we_do\":\"yoel Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi facere earum quis ipsa vitae qui minima esse ducimus dolorum iste nisi laborum repellat dolores dolore debitis adipisci nemo quia autem pariatur a voluptatem dignissimos maiores accusantium nobis tempora consequatur cumque quas ea doloribus deleniti</br>Quibusdam commodi laboriosam error temporibus iste ipsa soluta distinctio maiores ad totam beatae incidunt veritatis enim? Reiciendis voluptate assumenda quidem eos explicabo rerum.</br>Quibusdam commodi laboriosam error temporibus iste ipsa soluta distinctio maiores ad totam beatae incidunt veritatis enim? Reiciendis voluptate assumenda quidem eos explicabo rerum.\"}');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `image` varchar(64) COLLATE utf8_swedish_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `info` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_swedish_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `info`, `position`, `content`, `created_on`) VALUES
(3, '15504744593.jpg', 'maritza beatty', NULL, 'Seo Expert', 'Hi ipsum dolor sit amet, est vel, id fllentesque tortor pede risus nullam hiden over the teamwe happy for your service', '2019-02-18 13:05:59'),
(4, '15504745024.jpg', 'rufus washington', NULL, 'CEO', 'Hi ipsum dolor sit amet, est vel, id fllentesque tortor pede risus nullam hiden over the teamwe happy for your service', '2019-02-18 13:06:42'),
(7, '15823080822.jpg', 'Oren Fisher', 'Laudantium voluptat', 'Distinctio Quis nos', 'Irure dolor soluta a', '2020-02-21 23:46:22'),
(8, '1582609728.webp', 'Howard Byers', 'Dolorem libero venia', 'Id quaerat ab non co', 'Assumenda at quasi v', '2020-02-25 11:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL,
  `ledger_id` bigint(20) NOT NULL,
  `code` longtext COLLATE utf8_swedish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `booking_id` bigint(20) NOT NULL,
  `description` longtext COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `incorrect_login` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_swedish_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `image` mediumtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_swedish_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `email_verified` tinyint(4) NOT NULL DEFAULT 0,
  `email_verification` varchar(64) COLLATE utf8_swedish_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `phone` varchar(64) COLLATE utf8_swedish_ci DEFAULT NULL,
  `phone_is_validated` tinyint(4) NOT NULL DEFAULT 0,
  `verification_id` bigint(20) DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `incorrect_login`, `name`, `role`, `image`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `email_verified`, `email_verification`, `status`, `phone`, `phone_is_validated`, `verification_id`, `is_verified`, `created_on`, `updated_on`, `created_by`, `updated_by`) VALUES
(1, 0, 'Sam Administrator', 1, '15504743231.jpg', 'admin@gmail.com', 'CCMimSr-D7e7tZPa-5OM0gpJVUI6uKjl', '$2y$13$xCdL76J2wvJUj9.vnECW6OzGdR8v5.TSVObBJ4WbSL1IpMqCSeg8m', 'a4Fkvr_WMwS1BaH27gPzOl_bfuho690x_1472543386', 'admin@gmail.com', 1, NULL, 10, NULL, 0, NULL, 0, '2019-06-02 00:00:00', NULL, 1, NULL),
(2, 0, 'Rup Pradhan', 5, '15504745024.jpg', 'client@gmail.com', 'CCMimSr-D7e7tZPa-5OM0gpJVUI6uKjq', '$2y$13$xCdL76J2wvJUj9.vnECW6OzGdR8v5.TSVObBJ4WbSL1IpMqCSeg8m', '1ZoByi-Kyn3kOTjS16lEp0hy9QqLrkP9_1561205962', 'client@gmail.com', 1, NULL, 10, '', 0, 77, 1, '2019-06-02 00:00:00', '2019-06-23 17:42:32', 1, 1),
(5, 0, 'Dev Basnet', 3, '15504744593.jpg', 'vendor@gmail.com', 'CMdCAeAHMGqQ2-kYumQ8sW8lpTJ_JSAs', '$2y$13$xCdL76J2wvJUj9.vnECW6OzGdR8v5.TSVObBJ4WbSL1IpMqCSeg8m', 'PHL0_x3AkNZAKLJmMz9umuag9YdlqJmM_1561206794', 'vendor@gmail.com', 1, NULL, 10, '', 0, 76, 1, '0000-00-00 00:00:00', NULL, 1, NULL),
(6, 0, 'Mat agent', 4, '1552110523r.jpg', 'agent@gmail.com', '', '$2y$13$xCdL76J2wvJUj9.vnECW6OzGdR8v5.TSVObBJ4WbSL1IpMqCSeg8m', 'a4Fkvr_WMwS1BaH27gPzO452fuho690x_1472543386', 'agent@gmail.com', 1, NULL, 10, NULL, 0, NULL, 0, '2019-06-10 04:11:06', NULL, 1, NULL),
(7, 0, 'Tilak operator', 6, '1552110608s.jpg', 'operator@gmail.com', '234234234', '$2y$13$xCdL76J2wvJUj9.vnECW6OzGdR8v5.TSVObBJ4WbSL1IpMqCSeg8m', 'a4Fkvr_WMwS1BaH27gPzO452fuas690x_1472543386', 'operator@gmail.com', 1, NULL, 10, NULL, 0, NULL, 0, '2019-06-23 10:32:17', NULL, 1, NULL),
(8, 0, 'Jaqarewo', 5, '15504938502.jpg', 'hello', '0PVlrkEJ5WSUtUdZD9MUfTc03OdPNLLS', '$2y$13$9LTJMVtWnVkwE7SF1LtMtOqC.e1MBDkGdnCR8w6x7gg7ZXIIYulmG', '8qOnWN0Emv5A2MRYkychde_gLSj-mtoI_1561265236', 'hello@hello.com', 0, NULL, 10, '', 0, 86, 1, '2019-06-23 10:32:17', NULL, 1, NULL),
(9, 0, 'Ramirez And Warren Traders', 3, NULL, 'jyvi@mailinator.com', '_Max4tR7rHlHqrpGDr7FsTGaTgJykVKw', '$2y$13$zNpNwWwTaJmQEGeobbudXOWe71Ag8UO7FnrSLWJKC9JR.JjFleE9q', 'wYX4_kiZ0DvzZ_rg3nZENExergiWRmWE_1566111738', 'jyvi@mailinator.com', 0, NULL, 10, '', 0, 91, 1, '2019-08-18 12:47:18', NULL, 1, NULL),
(10, 0, 'Gillespie Bowers Inc', 3, NULL, 'zizitiwus@mailinator.com', 'ltPkZ1CAVVzixA3kItR7TB0VqB-fQrY5', '$2y$13$65bi4dULnHDh97Te9KgkLOMFuO2yX72KkrBu79nKSSiRvIStQmCsa', '0rQ4IupMOvRtg92OsGwMZW5xzX_Bfnw1_1566111805', 'zizitiwus@mailinator.com', 0, NULL, 10, '', 0, 92, 1, '2019-08-18 12:48:25', NULL, 1, NULL),
(13, 0, 'Bipin Joshi', 5, '15504938502.jpg', 'joshi@gmail.com', '1', '$2y$13$xCdL76J2wvJUj9.vnECW6OzGdR8v5.TSVObBJ4WbSL1IpMqCSeg8m', '', 'joshi@gmail.com', 1, NULL, 10, '12341234', 0, NULL, 0, '2019-06-02 00:00:00', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `citizenship` varchar(64) COLLATE utf8_swedish_ci DEFAULT NULL,
  `license_no` varchar(64) COLLATE utf8_swedish_ci DEFAULT NULL,
  `images` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `commission_percentage` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `allowed_gateways` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `contact_person_name` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `contact_person_phone` mediumint(9) DEFAULT NULL,
  `contact_person_email` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `company_registration_number` varchar(64) COLLATE utf8_swedish_ci DEFAULT NULL,
  `pan_number` varchar(64) COLLATE utf8_swedish_ci DEFAULT NULL,
  `is_vat` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `company`, `address`, `phone`, `citizenship`, `license_no`, `images`, `commission_percentage`, `discount`, `allowed_gateways`, `contact_person_name`, `contact_person_phone`, `contact_person_email`, `company_registration_number`, `pan_number`, `is_vat`) VALUES
(1, 5, 'Baba Bus', 'Hattiban', '98080225445', '123456789', NULL, NULL, 0, 0, '[\"laxmi\",\"kumari\",\"esewa\",\"khalti\"]', '121', NULL, '', '45646545153465', '4564656564', 1),
(2, 2, '', 'Asdasd Asdfasdf Asdfa Sd12312312', '', NULL, NULL, NULL, 0, 0, NULL, '', NULL, '', NULL, NULL, 0),
(4, 10, 'Gillespie Bowers Inc', 'Eiusmod sit eiusmod', '+1 (816) 329-9916', NULL, NULL, NULL, 0, 0, '[\"laxmi\",\"khalti\"]', 'Ethan Mooney', 54, 'harufin@mailinator.net', 'THOMPSON WADE PLC', '9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(28) COLLATE utf8_swedish_ci NOT NULL,
  `display_name` varchar(64) COLLATE utf8_swedish_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `display_name`, `is_active`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'admin', 'Administrator', 1, '2019-06-17 03:59:06', 1, NULL, NULL),
(2, 'officer', 'Officer', 1, '2019-06-17 02:00:14', 1, NULL, NULL),
(3, 'vendor', 'Service Provider', 1, '2019-06-17 02:00:14', 1, NULL, NULL),
(4, 'agent', 'Agent', 1, '2019-06-17 02:00:14', 1, NULL, NULL),
(5, 'customer', 'Customer', 1, '2019-06-17 02:00:14', 1, NULL, NULL),
(6, 'operator', 'Assistant', 1, '2019-06-17 02:00:14', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `updated_on` datetime NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`id`, `title`, `description`, `is_active`, `updated_on`, `created_on`) VALUES
(3, 'Requirements', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, ,from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 0, '2020-03-01 11:32:08', '2020-02-28 00:00:00'),
(4, 'Sint asperiores illu', 'Ut dolorem quia aut ', 1, '2020-02-28 15:32:39', '2020-02-28 00:00:00'),
(5, 'Quia excepteur persp asdcasdcasdcasdc', 'Omnis rerum illum i', 1, '2020-02-28 15:33:00', '2020-02-28 00:00:00'),
(6, 'Hello', 'Natus doloribus elig hello', 0, '2020-02-28 12:21:03', '2020-02-28 00:00:00'),
(7, 'Cupidatat vero conse y', 'Delectus nostrud po y', 1, '2020-02-28 13:03:23', '2020-02-28 00:00:00'),
(8, 'Nobis omnis esse do', 'Est aute proident ', 0, '2020-02-28 12:28:44', '2020-02-28 00:00:00'),
(9, 'Provident beatae do', 'Ab ut quia nihil quo', 1, '2020-02-28 13:09:37', '2020-02-28 00:00:00'),
(10, 'Provident beatae do', 'Ab ut quia nihil quo', 0, '2020-02-28 12:57:46', '2020-02-28 00:00:00'),
(11, 'Provident beatae do', 'Ab ut quia nihil quo', 0, '2020-02-28 12:59:28', '2020-02-28 00:00:00'),
(12, 'Provident beatae do', 'Ab ut quia nihil quo', 0, '2020-02-28 12:59:30', '2020-02-28 00:00:00'),
(13, 'Provident beatae do', 'Ab ut quia nihil quo', 0, '2020-02-28 13:00:17', '2020-02-28 00:00:00'),
(14, 'Provident beatae do', 'Ab ut quia nihil quo', 0, '2020-02-28 13:00:20', '2020-02-28 00:00:00'),
(15, 'Provident beatae do', 'Ab ut quia nihil quo', 0, '2020-02-28 13:01:14', '2020-02-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) NOT NULL,
  `type` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `number_plate` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `bluebook_num` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `registration_date` date NOT NULL,
  `model` varchar(128) COLLATE utf8_swedish_ci DEFAULT NULL,
  `manufacturer` varchar(64) COLLATE utf8_swedish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `amenities` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `seat_count` int(11) NOT NULL DEFAULT 0,
  `seat_map` varchar(128) COLLATE utf8_swedish_ci DEFAULT NULL,
  `seats` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `contact_info` longtext COLLATE utf8_swedish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `images` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `verification_id` bigint(20) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `type`, `user_id`, `number_plate`, `bluebook_num`, `registration_date`, `model`, `manufacturer`, `description`, `amenities`, `seat_count`, `seat_map`, `seats`, `contact_info`, `image`, `images`, `verification_id`, `is_active`, `is_verified`, `created_on`, `created_by`, `updated_by`, `updated_on`) VALUES
(1, 2, 5, 'BA1PA254523', '600-AS-DAS-AS', '2019-06-26', 'AS', 'TATA', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry Lorem Ipsum.</p>', '[\"3\",\"4\"]', 17, 'bus', '[{\"id\":\"0\",\"name\":\"1\",\"position\":{\"left\":\"346px\",\"top\":\"133px\"},\"size\":{\"width\":\"56px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"1\",\"name\":\"2\",\"position\":{\"left\":\"97px\",\"top\":\"170px\"},\"size\":{\"width\":\"79px\",\"height\":\"25px\"},\"status\":\"1\",\"reservation\":\"2\"},{\"id\":\"2\",\"name\":\"3\",\"position\":{\"left\":\"112px\",\"top\":\"6px\"},\"size\":{\"width\":\"63px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"0\"},{\"id\":\"3\",\"name\":\"4\",\"position\":{\"left\":\"261px\",\"top\":\"169px\"},\"size\":{\"width\":\"68px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"4\",\"name\":\"5\",\"position\":{\"left\":\"345px\",\"top\":\"88px\"},\"size\":{\"width\":\"57px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"5\",\"name\":\"6\",\"position\":{\"left\":\"264px\",\"top\":\"44px\"},\"size\":{\"width\":\"60px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"1\"},{\"id\":\"6\",\"name\":\"6\",\"position\":{\"left\":\"99px\",\"top\":\"132px\"},\"size\":{\"width\":\"77px\",\"height\":\"25px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"7\",\"name\":\"8\",\"position\":{\"left\":\"187px\",\"top\":\"171px\"},\"size\":{\"width\":\"64px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"8\",\"name\":\"9\",\"position\":{\"left\":\"262px\",\"top\":\"133px\"},\"size\":{\"width\":\"64px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"9\",\"name\":\"10\",\"position\":{\"left\":\"346px\",\"top\":\"171px\"},\"size\":{\"width\":\"58px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"10\",\"name\":\"11\",\"position\":{\"left\":\"345px\",\"top\":\"42px\"},\"size\":{\"width\":\"56px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"11\",\"name\":\"12\",\"position\":{\"left\":\"344px\",\"top\":\"6px\"},\"size\":{\"width\":\"58px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"12\",\"name\":\"13\",\"position\":{\"left\":\"185px\",\"top\":\"6px\"},\"size\":{\"width\":\"64px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"13\",\"name\":\"14\",\"position\":{\"left\":\"263px\",\"top\":\"6px\"},\"size\":{\"width\":\"63px\",\"height\":\"25px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"14\",\"name\":\"15\",\"position\":{\"left\":\"183px\",\"top\":\"41px\"},\"size\":{\"width\":\"67px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"15\",\"name\":\"16\",\"position\":{\"left\":\"187px\",\"top\":\"133px\"},\"size\":{\"width\":\"64px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"16\",\"name\":\"17\",\"position\":{\"left\":\"112px\",\"top\":\"43px\"},\"size\":{\"width\":\"63px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"}]', '985225425', '005.jpg', '[{\'1564216420TB1.jpg\',\'1560675827e.png\'}]', 99, 1, 1, '2019-06-05 05:06:51', NULL, 1, '2019-07-16 11:05:43'),
(2, 4, 5, 'BA1JA2454', '199785365', '2017-05-17', '25454687', 'Mercedes', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry Lorem Ipsum.</p>', '[\"2\",\"5\"]', 23, 'bus', '[{\"id\":\"0\",\"name\":\"1\",\"position\":{\"left\":\"120px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"1\",\"name\":\"2\",\"position\":{\"left\":\"121px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"2\"},{\"id\":\"2\",\"name\":\"3\",\"position\":{\"left\":\"170px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"0\"},{\"id\":\"3\",\"name\":\"4\",\"position\":{\"left\":\"220px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"4\",\"name\":\"5\",\"position\":{\"left\":\"220px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"5\",\"name\":\"6\",\"position\":{\"left\":\"170px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"24px\"},\"status\":\"1\",\"reservation\":\"1\"},{\"id\":\"6\",\"name\":\"6\",\"position\":{\"left\":\"170px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"0\",\"reservation\":\"1\"},{\"id\":\"7\",\"name\":\"8\",\"position\":{\"left\":\"270px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"8\",\"name\":\"9\",\"position\":{\"left\":\"170px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"9\",\"name\":\"10\",\"position\":{\"left\":\"370px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"10\",\"name\":\"11\",\"position\":{\"left\":\"320px\",\"top\":\"50px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"11\",\"name\":\"12\",\"position\":{\"left\":\"370px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"12\",\"name\":\"13\",\"position\":{\"left\":\"320px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"13\",\"name\":\"14\",\"position\":{\"left\":\"270px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"14\",\"name\":\"15\",\"position\":{\"left\":\"220px\",\"top\":\"8px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"15\",\"name\":\"16\",\"position\":{\"left\":\"220px\",\"top\":\"49px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"16\",\"name\":\"17\",\"position\":{\"left\":\"270px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"17\",\"name\":\"18\",\"position\":{\"left\":\"270px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"18\",\"name\":\"19\",\"position\":{\"left\":\"320px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"19\",\"name\":\"20\",\"position\":{\"left\":\"320px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"},{\"id\":\"20\",\"name\":\"21\",\"position\":{\"left\":\"370px\",\"top\":\"130px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"4\"},{\"id\":\"21\",\"name\":\"22\",\"position\":{\"left\":\"370px\",\"top\":\"90px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"4\"},{\"id\":\"22\",\"name\":\"23\",\"position\":{\"left\":\"370px\",\"top\":\"170px\"},\"size\":{\"width\":\"24px\",\"height\":\"26px\"},\"status\":\"1\",\"reservation\":\"0\"}]', '9808055365', '1.jpg', '[{\'1564216420TB1.jpg\',\'1560675827e.png\'}]', 100, 1, 1, '2019-06-05 05:06:51', NULL, 1, '2019-08-08 16:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles_hire`
--

CREATE TABLE `vehicles_hire` (
  `id` bigint(20) NOT NULL,
  `type` bigint(20) NOT NULL COMMENT 'type',
  `number_plate` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `bluebook_num` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `registration_date` date NOT NULL,
  `model` varchar(128) COLLATE utf8_swedish_ci DEFAULT NULL,
  `manufacturer` varchar(64) COLLATE utf8_swedish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `amenities` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `seat_count` int(11) NOT NULL,
  `contact_info` longtext COLLATE utf8_swedish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `images` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_on` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_comments`
--

CREATE TABLE `vehicle_comments` (
  `id` bigint(20) NOT NULL,
  `vehicle_id` bigint(20) NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `verification_id` bigint(20) DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `comment` longtext COLLATE utf8_swedish_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `vehicle_comments`
--

INSERT INTO `vehicle_comments` (`id`, `vehicle_id`, `vendor_id`, `customer_id`, `verification_id`, `is_verified`, `is_active`, `name`, `email`, `phone`, `comment`, `created_on`) VALUES
(1, 2, 5, NULL, NULL, 0, 1, 'Ramesh Panta', NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2019-07-19 14:33:35'),
(2, 2, 5, NULL, NULL, 0, 1, 'Harihar Ratna', NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2019-07-19 14:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_ratings`
--

CREATE TABLE `vehicle_ratings` (
  `id` bigint(20) NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `vehicle_id` bigint(20) NOT NULL,
  `rating_type_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `booking_id` bigint(20) DEFAULT NULL,
  `rating_group` bigint(20) DEFAULT NULL,
  `rating` int(4) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `vehicle_ratings`
--

INSERT INTO `vehicle_ratings` (`id`, `vendor_id`, `vehicle_id`, `rating_type_id`, `customer_id`, `booking_id`, `rating_group`, `rating`, `created_on`) VALUES
(1, 5, 2, 1, 8, NULL, 1, 2, '2019-07-17 12:50:07'),
(2, 5, 2, 2, 8, NULL, 1, 3, '2019-07-17 12:50:27'),
(3, 5, 2, 3, 8, NULL, 1, 4, '2019-07-17 12:50:44'),
(4, 5, 2, 4, 8, NULL, 1, 5, '2019-07-17 12:50:57'),
(5, 5, 2, 5, 8, NULL, 1, 2, '2019-07-17 12:51:28'),
(6, 5, 2, 6, 8, NULL, 1, 3, '2019-07-17 12:51:47'),
(7, 5, 2, 7, 8, NULL, 1, 2, '2019-07-17 12:51:55'),
(8, 5, 2, 8, 8, NULL, 1, 1, '2019-07-17 12:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_rating_categories`
--

CREATE TABLE `vehicle_rating_categories` (
  `id` bigint(20) NOT NULL,
  `category` longtext COLLATE utf8_swedish_ci NOT NULL,
  `description` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `vehicle_rating_categories`
--

INSERT INTO `vehicle_rating_categories` (`id`, `category`, `description`, `created_on`, `is_active`) VALUES
(1, 'AC', NULL, '2019-05-16 12:07:44', 1),
(2, 'Cleanliness ', NULL, '2019-05-16 12:07:57', 1),
(3, 'Driving', NULL, '2019-05-16 12:08:10', 1),
(4, 'Facilities', NULL, '2019-05-16 12:08:17', 1),
(5, 'Punctuality', NULL, '2019-05-16 12:08:29', 1),
(6, 'Rest stop hygiene', NULL, '2019-05-16 12:09:12', 1),
(7, 'Seat comfort', NULL, '2019-05-16 12:09:12', 1),
(8, 'Staff behavior', NULL, '2019-05-16 12:09:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` bigint(20) NOT NULL,
  `verification_id` bigint(20) DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `name` varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  `remark` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `verification_id`, `is_verified`, `name`, `remark`, `is_active`, `created_on`, `created_by`, `updated_by`, `updated_on`) VALUES
(1, 1, 1, 'bus', '52 Seats Bus', 1, '2019-06-07 14:09:24', 1, 1, '2019-06-23 08:34:23'),
(2, 2, 1, 'jeep', '8 Seater Jeep', 1, '2019-06-07 14:09:50', 1, 1, '2019-06-14 07:13:44'),
(3, 5, 1, 'Sedan', '5 Seater Car', 1, '2019-06-08 09:17:12', NULL, NULL, '2019-06-08 13:38:48'),
(4, 45, 1, 'microbus', '16 Seater Microbus', 1, '2019-06-11 11:05:59', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_comments`
--

CREATE TABLE `vendor_comments` (
  `id` bigint(20) NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `verification_id` bigint(20) DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `comment` longtext COLLATE utf8_swedish_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verification_actions`
--

CREATE TABLE `verification_actions` (
  `id` bigint(20) NOT NULL,
  `table_name` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `table_id` bigint(20) NOT NULL,
  `comment` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `verification_comment` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `verification_status` tinyint(4) NOT NULL DEFAULT 0,
  `edited_status` tinyint(4) NOT NULL DEFAULT 0,
  `verified_by` bigint(20) DEFAULT NULL,
  `verified_on` datetime DEFAULT NULL,
  `requested_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `requested_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `verification_actions`
--

INSERT INTO `verification_actions` (`id`, `table_name`, `table_id`, `comment`, `verification_comment`, `verification_status`, `edited_status`, `verified_by`, `verified_on`, `requested_on`, `requested_by`) VALUES
(1, 'vehicle_types', 0, 'Vehicle Type', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1, 1, '2020-02-21 15:13:01', '2019-06-07 08:24:24', 1),
(2, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-14 07:13:44', '2019-06-07 08:24:50', 1),
(3, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 09:17:12', '2019-06-08 03:32:12', 1),
(4, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 13:38:16', '2019-06-08 07:53:16', 1),
(5, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 13:38:48', '2019-06-08 07:53:48', 1),
(6, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 20:14:29', '2019-06-08 14:29:29', 1),
(7, 'locations', 0, 'Location', NULL, 1, 0, 1, '2019-06-11 11:44:12', '2019-06-08 14:46:26', 1),
(8, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 20:40:09', '2019-06-08 14:55:09', 1),
(9, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 20:40:27', '2019-06-08 14:55:27', 1),
(10, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 20:43:15', '2019-06-08 14:58:15', 1),
(11, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 20:43:56', '2019-06-08 14:58:56', 1),
(12, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 20:45:57', '2019-06-08 15:00:57', 1),
(13, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 21:23:50', '2019-06-08 15:38:50', 1),
(14, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 21:24:59', '2019-06-08 15:39:59', 1),
(15, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 21:26:30', '2019-06-08 15:41:30', 1),
(16, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 21:26:46', '2019-06-08 15:41:46', 1),
(17, 'vehicle_types', 0, 'Vehicle Type', 'qwe', 1, 1, 1, '2020-02-21 22:06:59', '2019-06-08 15:47:30', 1),
(18, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 21:32:32', '2019-06-08 15:47:32', 1),
(19, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 21:32:33', '2019-06-08 15:47:33', 1),
(20, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 21:32:35', '2019-06-08 15:47:35', 1),
(21, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-08 21:32:37', '2019-06-08 15:47:37', 1),
(22, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:11:24', '2019-06-09 02:26:24', 1),
(23, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:11:49', '2019-06-09 02:26:49', 1),
(24, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:11:54', '2019-06-09 02:26:54', 1),
(25, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:13:41', '2019-06-09 02:28:41', 1),
(26, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:17:22', '2019-06-09 02:32:22', 1),
(27, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:30:57', '2019-06-09 02:45:57', 1),
(28, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:31:53', '2019-06-09 02:46:53', 1),
(29, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:32:06', '2019-06-09 02:47:06', 1),
(30, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:32:18', '2019-06-09 02:47:18', 1),
(31, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:32:40', '2019-06-09 02:47:40', 1),
(32, 'locations', 0, 'Location', NULL, 1, 0, 1, '2019-06-23 17:14:04', '2019-06-09 02:47:55', 1),
(33, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:45:03', '2019-06-09 03:00:03', 1),
(34, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:45:19', '2019-06-09 03:00:19', 1),
(35, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:45:22', '2019-06-09 03:00:22', 1),
(36, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:45:26', '2019-06-09 03:00:26', 1),
(37, 'vehicle_types', 0, 'Vehicle Type', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', -1, 0, 1, '2019-06-09 08:47:24', '2019-06-09 03:02:24', 1),
(38, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-09 08:47:26', '2019-06-09 03:02:26', 1),
(39, 'vehicle_types', 0, 'Vehicle Type', NULL, 0, 0, 1, '2019-06-09 08:48:12', '2019-06-09 03:03:12', 1),
(40, 'locations', 0, 'Location', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 1, 0, 1, '2019-06-13 14:17:45', '2019-06-09 10:36:03', 1),
(41, 'locations', 0, 'Location', NULL, 1, 0, 1, '2019-06-09 16:21:35', '2019-06-09 10:36:35', 1),
(42, 'locations', 0, 'Location', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', -1, 0, 1, '2019-06-09 16:33:32', '2019-06-09 10:48:32', 1),
(43, 'locations', 0, 'Location', NULL, 1, 0, 1, '2019-06-13 14:17:32', '2019-06-10 03:24:19', 1),
(44, 'locations', 0, 'Location', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 1, 0, 1, '2019-06-10 11:21:18', '2019-06-10 05:36:18', 1),
(45, 'vehicle_types', 0, 'Vehicle Type', NULL, 1, 0, 1, '2019-06-11 11:05:59', '2019-06-11 05:20:59', 1),
(46, 'locations', 0, 'Location', NULL, 1, 0, 1, '2019-06-15 07:08:20', '2019-06-15 01:23:20', 1),
(47, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:19:36', '2019-06-15 02:34:36', 1),
(48, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:22:46', '2019-06-15 02:37:46', 1),
(49, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:29:32', '2019-06-15 02:44:32', 1),
(50, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:31:17', '2019-06-15 02:46:17', 1),
(51, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:33:35', '2019-06-15 02:48:35', 1),
(52, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:34:05', '2019-06-15 02:49:05', 1),
(53, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:37:18', '2019-06-15 02:52:18', 1),
(54, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:37:25', '2019-06-15 02:52:25', 1),
(55, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:39:35', '2019-06-15 02:54:35', 1),
(56, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:40:17', '2019-06-15 02:55:17', 1),
(57, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:42:07', '2019-06-15 02:57:07', 1),
(58, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:45:55', '2019-06-15 03:00:55', 1),
(59, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:46:32', '2019-06-15 03:01:32', 1),
(60, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:49:36', '2019-06-15 03:04:36', 1),
(61, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:49:53', '2019-06-15 03:04:53', 1),
(62, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:50:26', '2019-06-15 03:05:26', 1),
(63, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:50:56', '2019-06-15 03:05:56', 1),
(64, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:51:50', '2019-06-15 03:06:50', 1),
(65, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:53:29', '2019-06-15 03:08:29', 1),
(66, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:53:45', '2019-06-15 03:08:45', 1),
(67, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:53:57', '2019-06-15 03:08:57', 1),
(68, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:54:28', '2019-06-15 03:09:28', 1),
(69, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:55:09', '2019-06-15 03:10:09', 1),
(70, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:56:43', '2019-06-15 03:11:43', 1),
(71, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:56:54', '2019-06-15 03:11:54', 1),
(72, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:57:08', '2019-06-15 03:12:08', 1),
(73, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:57:21', '2019-06-15 03:12:21', 1),
(74, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:57:50', '2019-06-15 03:12:50', 1),
(75, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:58:12', '2019-06-15 03:13:12', 1),
(76, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:58:19', '2019-06-15 03:13:19', 1),
(77, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:58:52', '2019-06-15 03:13:52', 1),
(78, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:58:59', '2019-06-15 03:13:59', 1),
(79, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 08:59:13', '2019-06-15 03:14:13', 1),
(80, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:00:31', '2019-06-15 03:15:31', 1),
(81, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:03:01', '2019-06-15 03:18:01', 1),
(82, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:03:25', '2019-06-15 03:18:25', 1),
(83, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:04:14', '2019-06-15 03:19:14', 1),
(84, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:06:36', '2019-06-15 03:21:36', 1),
(85, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:06:57', '2019-06-15 03:21:57', 1),
(86, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:07:24', '2019-06-15 03:22:24', 1),
(87, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:07:40', '2019-06-15 03:22:40', 1),
(88, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:08:22', '2019-06-15 03:23:22', 1),
(89, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:08:49', '2019-06-15 03:23:49', 1),
(90, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:09:46', '2019-06-15 03:24:46', 1),
(91, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:09:58', '2019-06-15 03:24:58', 1),
(92, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:10:06', '2019-06-15 03:25:06', 1),
(93, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:12:34', '2019-06-15 03:27:34', 1),
(94, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:13:14', '2019-06-15 03:28:14', 1),
(95, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:13:59', '2019-06-15 03:28:59', 1),
(96, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:18:19', '2019-06-15 03:33:19', 1),
(97, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:20:55', '2019-06-15 03:35:55', 1),
(98, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-06-15 09:23:28', '2019-06-15 03:38:28', 1),
(99, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-07-16 11:05:44', '2019-06-15 03:39:58', 1),
(100, 'vehicles', 0, 'Vehicle', NULL, 1, 0, 1, '2019-08-08 16:39:56', '2019-06-16 07:02:01', 1),
(101, 'locations', 0, 'Location', NULL, 1, 0, 1, '2019-06-23 09:31:16', '2019-06-23 03:46:16', 1),
(102, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 14:46:29', '2019-06-23 09:01:29', 1),
(103, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 14:47:25', '2019-06-23 09:02:25', 1),
(104, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 14:48:17', '2019-06-23 09:03:17', 1),
(105, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 14:50:48', '2019-06-23 09:05:48', 1),
(106, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 14:51:56', '2019-06-23 09:06:56', 1),
(107, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 14:55:31', '2019-06-23 09:10:31', 1),
(108, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:09:40', '2019-06-23 09:24:40', 1),
(109, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:09:54', '2019-06-23 09:24:54', 1),
(110, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:10:21', '2019-06-23 09:25:21', 1),
(111, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:11:35', '2019-06-23 09:26:35', 1),
(112, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:11:59', '2019-06-23 09:26:59', 1),
(113, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:13:11', '2019-06-23 09:28:11', 1),
(114, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:13:32', '2019-06-23 09:28:32', 1),
(115, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:13:44', '2019-06-23 09:28:44', 1),
(116, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:13:54', '2019-06-23 09:28:54', 1),
(117, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:14:17', '2019-06-23 09:29:17', 1),
(118, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:14:40', '2019-06-23 09:29:40', 1),
(119, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:16:32', '2019-06-23 09:31:32', 1),
(120, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:17:13', '2019-06-23 09:32:13', 1),
(121, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:18:25', '2019-06-23 09:33:25', 1),
(122, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:18:52', '2019-06-23 09:33:52', 1),
(123, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:21:42', '2019-06-23 09:36:42', 1),
(124, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:21:53', '2019-06-23 09:36:53', 1),
(125, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:22:04', '2019-06-23 09:37:04', 1),
(126, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:24:04', '2019-06-23 09:39:04', 1),
(127, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:24:22', '2019-06-23 09:39:22', 1),
(128, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:24:41', '2019-06-23 09:39:41', 1),
(129, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:25:17', '2019-06-23 09:40:17', 1),
(130, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:25:29', '2019-06-23 09:40:29', 1),
(131, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:25:37', '2019-06-23 09:40:37', 1),
(132, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:25:45', '2019-06-23 09:40:45', 1),
(133, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:26:10', '2019-06-23 09:41:10', 1),
(134, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:28:23', '2019-06-23 09:43:23', 1),
(135, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:28:51', '2019-06-23 09:43:51', 1),
(136, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:29:33', '2019-06-23 09:44:33', 1),
(137, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:29:43', '2019-06-23 09:44:43', 1),
(138, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:30:52', '2019-06-23 09:45:52', 1),
(139, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:32:53', '2019-06-23 09:47:53', 1),
(140, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:33:29', '2019-06-23 09:48:29', 1),
(141, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:33:59', '2019-06-23 09:48:59', 1),
(142, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:35:22', '2019-06-23 09:50:22', 1),
(143, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:35:42', '2019-06-23 09:50:42', 1),
(144, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:36:06', '2019-06-23 09:51:06', 1),
(145, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:36:40', '2019-06-23 09:51:40', 1),
(146, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:36:47', '2019-06-23 09:51:47', 1),
(147, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:37:34', '2019-06-23 09:52:34', 1),
(148, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:38:00', '2019-06-23 09:53:00', 1),
(149, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:38:20', '2019-06-23 09:53:20', 1),
(150, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:39:54', '2019-06-23 09:54:54', 1),
(151, 'schedules', 0, 'Schedule', NULL, 1, 0, 1, '2019-06-23 15:40:16', '2019-06-23 09:55:16', 1),
(152, 'schedules', 0, 'Schedule', 'jhkl', 0, 1, 1, '2020-02-22 13:48:53', '2019-06-23 09:55:41', 1),
(153, 'schedules', 0, 'Schedule', '1234', 1, 1, 1, '2020-02-22 13:48:43', '2019-06-23 09:56:22', 1),
(154, 'schedules', 0, 'Schedule', 'qwerqwerqwer', 1, 1, 1, '2020-02-21 20:04:13', '2019-06-23 09:57:00', 1),
(155, 'schedules', 0, 'Schedule', 'qq', 1, 1, 1, '2020-02-21 19:50:17', '2019-06-23 09:57:09', 1),
(156, 'schedules', 0, 'Schedule', 'asdasdasd', 1, 1, 1, '2020-02-21 15:14:52', '2019-06-23 09:57:26', 1),
(157, 'schedules', 0, 'Schedule', 'sfsdf', 1, 1, 1, '2020-02-21 15:14:02', '2019-06-23 09:58:12', 1),
(158, 'schedules', 0, 'Schedule', 'Lorem Ipsum is simply dum ublishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1, 1, '2020-02-21 15:13:16', '2019-06-23 11:49:11', 1),
(159, 'schedules', 0, 'Schedule', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1, 1, '2020-02-21 15:11:52', '2019-06-26 07:02:17', 1),
(160, 'vehicles', 0, 'Vehicle', 'qwer', 1, 1, 1, '2020-02-21 19:50:00', '2019-07-14 10:41:57', 1),
(161, 'vehicles', 0, 'Vehicle', 'qwerty', 1, 1, 1, '2020-02-21 19:49:49', '2019-07-14 10:42:55', 1),
(162, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-22 20:23:27', '2020-02-22 14:38:27', 1),
(163, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-22 20:23:48', '2020-02-22 14:38:48', 1),
(164, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-22 20:24:42', '2020-02-22 14:39:42', 1),
(165, 'amenities', 0, 'Amenity', NULL, 1, 0, 1, '2020-02-22 20:25:48', '2020-02-22 14:40:48', 1),
(166, 'amenities', 0, 'Amenity', NULL, 1, 0, 1, '2020-02-22 20:26:09', '2020-02-22 14:41:09', 1),
(167, 'amenities', 0, 'Amenity', NULL, 1, 0, 1, '2020-02-22 20:28:27', '2020-02-22 14:43:27', 1),
(168, 'amenities', 0, 'Amenity', NULL, 1, 0, 1, '2020-02-22 20:29:03', '2020-02-22 14:44:03', 1),
(169, 'amenities', 0, 'Amenity', NULL, 1, 0, 1, '2020-02-22 20:59:14', '2020-02-22 15:14:14', 1),
(170, 'amenities', 0, 'Amenity', NULL, 1, 0, 1, '2020-02-22 21:02:16', '2020-02-22 15:17:16', 1),
(171, 'amenities', 0, 'Amenities', NULL, 0, 0, NULL, NULL, '2020-02-22 15:36:45', 1),
(172, 'amenities', 0, 'Amenities', NULL, 0, 0, NULL, NULL, '2020-02-22 15:41:47', 1),
(173, 'amenities', 0, 'Amenities', NULL, 0, 0, NULL, NULL, '2020-02-22 15:41:54', 1),
(174, 'amenities', 0, 'Amenities', NULL, 0, 0, NULL, NULL, '2020-02-22 15:45:14', 1),
(175, 'amenities', 0, 'Amenities', NULL, 0, 0, NULL, NULL, '2020-02-22 15:46:01', 1),
(176, 'amenities', 0, 'Amenities', NULL, 0, 0, NULL, NULL, '2020-02-22 15:46:50', 1),
(177, 'amenities', 0, 'Amenities', 'test', 1, 1, 1, '2020-02-22 21:33:32', '2020-02-22 15:48:06', 1),
(178, 'amenities', 0, 'Amenities', NULL, 0, 0, NULL, NULL, '2020-02-22 16:46:47', 1),
(179, 'amenities', 0, 'Amenities', NULL, 0, 0, NULL, NULL, '2020-02-22 17:20:37', 1),
(180, 'amenities', 0, 'Amenities', NULL, 0, 0, NULL, NULL, '2020-02-23 03:45:28', 1),
(181, 'amenities', 19, 'Amenities', NULL, 1, 1, 1, NULL, '2020-02-23 03:57:01', 1),
(182, 'amenities', 20, 'Amenities', 'asdfasdf', 0, 1, 1, '2020-02-24 10:15:35', '2020-02-23 11:08:30', 1),
(183, 'amenities', 21, 'Amenities', 'tr', 1, 1, 1, '2020-02-24 21:55:45', '2020-02-24 16:10:34', 1),
(184, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 16:34:51', '2020-02-25 10:49:51', 1),
(185, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 16:35:03', '2020-02-25 10:50:03', 1),
(186, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 16:38:48', '2020-02-25 10:50:16', 1),
(187, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 19:26:16', '2020-02-25 13:41:16', 1),
(188, 'locations', 0, 'Location', NULL, 0, 0, NULL, NULL, '2020-02-25 13:42:16', 1),
(189, 'locations', 0, 'Location', NULL, 0, 0, NULL, NULL, '2020-02-25 13:47:55', 1),
(190, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 19:41:49', '2020-02-25 13:56:49', 1),
(191, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 19:44:24', '2020-02-25 13:59:24', 1),
(192, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 19:45:57', '2020-02-25 14:00:57', 1),
(193, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 19:48:36', '2020-02-25 14:03:36', 1),
(194, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 19:49:26', '2020-02-25 14:04:26', 1),
(195, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 19:50:57', '2020-02-25 14:05:57', 1),
(196, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 19:51:59', '2020-02-25 14:06:59', 1),
(197, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 19:53:25', '2020-02-25 14:08:25', 1),
(198, 'amenities', 22, 'Amenities', NULL, 0, 0, NULL, NULL, '2020-02-25 14:10:25', 1),
(199, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 19:56:41', '2020-02-25 14:11:41', 1),
(200, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 19:56:53', '2020-02-25 14:11:53', 1),
(201, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 19:57:26', '2020-02-25 14:12:26', 1),
(202, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 19:58:18', '2020-02-25 14:13:18', 1),
(203, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 19:59:24', '2020-02-25 14:14:24', 1),
(204, 'locations', 29, 'Location', NULL, 1, 0, 1, '2020-02-25 20:00:58', '2020-02-25 14:15:58', 1),
(205, 'locations', 30, 'Location', NULL, 0, 0, NULL, NULL, '2020-02-25 14:23:10', 1),
(206, 'locations', 0, 'Location', NULL, 1, 0, 1, '2020-02-25 20:21:52', '2020-02-25 14:36:52', 1),
(207, 'locations', 32, 'Location', NULL, 1, 1, 1, '2020-02-26 12:51:55', '2020-02-25 14:38:47', 1),
(208, 'locations', 33, 'Location', NULL, 1, 0, 1, '2020-02-28 10:34:28', '2020-02-28 04:34:53', 1),
(209, 'locations', 34, 'Location', NULL, 0, 0, NULL, '2020-02-28 12:11:57', '2020-02-28 06:26:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `verification_comments`
--

CREATE TABLE `verification_comments` (
  `id` bigint(20) NOT NULL,
  `table_name` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `comment` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `verification_comment` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `verification_status` tinyint(4) NOT NULL DEFAULT 0,
  `verified_by` bigint(20) DEFAULT NULL,
  `verified_on` datetime DEFAULT NULL,
  `requested_on` datetime NOT NULL DEFAULT current_timestamp(),
  `requested_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verification_users`
--

CREATE TABLE `verification_users` (
  `id` bigint(20) NOT NULL,
  `table_name` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `comment` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `verification_comment` longtext COLLATE utf8_swedish_ci DEFAULT NULL,
  `verification_status` tinyint(4) NOT NULL DEFAULT 0,
  `verified_by` bigint(20) DEFAULT NULL,
  `verified_on` datetime DEFAULT NULL,
  `requested_on` datetime NOT NULL DEFAULT current_timestamp(),
  `requested_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `verification_users`
--

INSERT INTO `verification_users` (`id`, `table_name`, `comment`, `verification_comment`, `verification_status`, `verified_by`, `verified_on`, `requested_on`, `requested_by`) VALUES
(1, 'user', 'User', NULL, 1, 1, '2019-06-22 17:34:37', '2019-06-22 17:34:37', 1),
(2, 'user', 'User', NULL, 1, 1, '2019-06-22 17:34:41', '2019-06-22 17:34:41', 1),
(3, 'user', 'User', NULL, 1, 1, '2019-06-22 17:38:04', '2019-06-22 17:38:04', 1),
(4, 'user', 'User', NULL, 1, 1, '2019-06-22 17:38:47', '2019-06-22 17:38:47', 1),
(5, 'user', 'User', NULL, 1, 1, '2019-06-22 17:54:18', '2019-06-22 17:54:18', 1),
(6, 'user', 'User', NULL, 1, 1, '2019-06-22 17:59:11', '2019-06-22 17:59:11', 1),
(7, 'user', 'User', NULL, 1, 1, '2019-06-22 17:59:20', '2019-06-22 17:59:20', 1),
(8, 'user', 'User', NULL, 1, 1, '2019-06-22 17:59:30', '2019-06-22 17:59:30', 1),
(9, 'user', 'User', NULL, 1, 1, '2019-06-22 17:59:34', '2019-06-22 17:59:34', 1),
(10, 'user', 'User', NULL, 1, 1, '2019-06-22 17:59:47', '2019-06-22 17:59:47', 1),
(11, 'user', 'User', NULL, 1, 1, '2019-06-22 18:00:48', '2019-06-22 18:00:48', 1),
(12, 'user', 'User', NULL, 1, 1, '2019-06-22 18:03:13', '2019-06-22 18:03:13', 1),
(13, 'user', 'User', NULL, 1, 1, '2019-06-22 18:04:22', '2019-06-22 18:04:22', 1),
(14, 'user', 'User', NULL, 1, 1, '2019-06-22 18:05:01', '2019-06-22 18:05:01', 1),
(15, 'user', 'User', NULL, 1, 1, '2019-06-22 18:07:47', '2019-06-22 18:07:47', 1),
(16, 'user', 'User', NULL, 1, 1, '2019-06-22 18:08:03', '2019-06-22 18:08:03', 1),
(17, 'user', 'User', NULL, 1, 1, '2019-06-22 18:10:09', '2019-06-22 18:10:09', 1),
(18, 'user', 'User', NULL, 1, 1, '2019-06-22 18:12:34', '2019-06-22 18:12:34', 1),
(19, 'user', 'User', NULL, 1, 1, '2019-06-22 18:14:56', '2019-06-22 18:14:56', 1),
(20, 'user', 'User', NULL, 1, 1, '2019-06-22 18:16:39', '2019-06-22 18:16:39', 1),
(21, 'user', 'User', NULL, 1, 1, '2019-06-22 18:17:23', '2019-06-22 18:17:24', 1),
(22, 'user', 'User', NULL, 1, 1, '2019-06-22 18:17:30', '2019-06-22 18:17:30', 1),
(23, 'user', 'User', NULL, 1, 1, '2019-06-22 18:18:14', '2019-06-22 18:18:14', 1),
(24, 'user', 'User', NULL, 1, 1, '2019-06-23 07:14:06', '2019-06-23 07:14:06', 1),
(25, 'user', 'User', NULL, 1, 1, '2019-06-23 07:37:40', '2019-06-23 07:37:40', 1),
(26, 'user', 'User', NULL, 1, 1, '2019-06-23 07:38:22', '2019-06-23 07:38:22', 1),
(27, 'user', 'User', NULL, 1, 1, '2019-06-23 07:40:13', '2019-06-23 07:40:13', 1),
(28, 'user', 'User', NULL, 1, 1, '2019-06-23 07:40:20', '2019-06-23 07:40:20', 1),
(29, 'user', 'User', NULL, 1, 1, '2019-06-23 07:40:23', '2019-06-23 07:40:23', 1),
(30, 'user', 'User', NULL, 1, 1, '2019-06-23 07:42:11', '2019-06-23 07:42:11', 1),
(31, 'user', 'User', NULL, 1, 1, '2019-06-23 07:42:34', '2019-06-23 07:42:34', 1),
(32, 'user', 'User', NULL, 1, 1, '2019-06-23 07:43:20', '2019-06-23 07:43:20', 1),
(33, 'user', 'User', NULL, 1, 1, '2019-06-23 07:43:23', '2019-06-23 07:43:23', 1),
(34, 'user', 'User', NULL, 1, 1, '2019-06-23 07:43:26', '2019-06-23 07:43:26', 1),
(35, 'user', 'User', NULL, 1, 1, '2019-06-23 07:44:02', '2019-06-23 07:44:02', 1),
(36, 'user', 'User', NULL, 1, 1, '2019-06-23 07:44:05', '2019-06-23 07:44:05', 1),
(37, 'user', 'User', NULL, 1, 1, '2019-06-23 07:44:21', '2019-06-23 07:44:21', 1),
(38, 'user', 'User', NULL, 1, 1, '2019-06-23 07:44:55', '2019-06-23 07:44:55', 1),
(39, 'user', 'User', NULL, 1, 1, '2019-06-23 07:45:02', '2019-06-23 07:45:02', 1),
(40, 'user', 'User', NULL, 1, 1, '2019-06-23 07:45:08', '2019-06-23 07:45:08', 1),
(41, 'user', 'User', NULL, 1, 1, '2019-06-23 07:45:46', '2019-06-23 07:45:46', 1),
(42, 'user', 'User', NULL, 1, 1, '2019-06-23 07:52:39', '2019-06-23 07:52:39', 1),
(43, 'user', 'User', NULL, 1, 1, '2019-06-23 07:53:06', '2019-06-23 07:53:06', 1),
(44, 'user', 'User', NULL, 1, 1, '2019-06-23 07:53:24', '2019-06-23 07:53:24', 1),
(45, 'user', 'User', NULL, 1, 1, '2019-06-23 07:53:57', '2019-06-23 07:53:57', 1),
(46, 'user', 'User', NULL, 1, 1, '2019-06-23 07:55:37', '2019-06-23 07:55:37', 1),
(47, 'user', 'User', NULL, 1, 1, '2019-06-23 07:56:12', '2019-06-23 07:56:12', 1),
(48, 'user', 'User', NULL, 1, 1, '2019-06-23 07:58:30', '2019-06-23 07:58:30', 1),
(49, 'user', 'User', NULL, 1, 1, '2019-06-23 07:59:33', '2019-06-23 07:59:33', 1),
(50, 'user', 'User', NULL, 1, 1, '2019-06-23 07:59:45', '2019-06-23 07:59:45', 1),
(51, 'user', 'User', NULL, 1, 1, '2019-06-23 08:00:02', '2019-06-23 08:00:02', 1),
(52, 'user', 'User', NULL, 1, 1, '2019-06-23 08:00:58', '2019-06-23 08:00:58', 1),
(53, 'user', 'User', NULL, 1, 1, '2019-06-23 08:01:03', '2019-06-23 08:01:03', 1),
(54, 'user', 'User', NULL, 1, 1, '2019-06-23 08:01:05', '2019-06-23 08:01:05', 1),
(55, 'user', 'User', NULL, 1, 1, '2019-06-23 08:04:25', '2019-06-23 08:04:25', 1),
(56, 'user', 'User', NULL, 1, 1, '2019-06-23 08:05:00', '2019-06-23 08:05:00', 1),
(57, 'user', 'User', NULL, 1, 1, '2019-06-23 08:05:13', '2019-06-23 08:05:13', 1),
(58, 'user', 'User', NULL, 1, 1, '2019-06-23 08:06:09', '2019-06-23 08:06:09', 1),
(59, 'user', 'User', NULL, 1, 1, '2019-06-23 08:07:17', '2019-06-23 08:07:17', 1),
(60, 'user', 'User', NULL, 1, 1, '2019-06-23 08:07:23', '2019-06-23 08:07:23', 1),
(61, 'user', 'User', NULL, 1, 1, '2019-06-23 08:08:59', '2019-06-23 08:08:59', 1),
(62, 'user', 'User', NULL, 1, 1, '2019-06-23 08:09:30', '2019-06-23 08:09:30', 1),
(63, 'user', 'User', NULL, 1, 1, '2019-06-23 08:13:26', '2019-06-23 08:13:26', 1),
(64, 'user', 'User', NULL, 1, 1, '2019-06-23 08:13:52', '2019-06-23 08:13:52', 1),
(65, 'user', 'User', NULL, 1, 1, '2019-06-23 08:15:26', '2019-06-23 08:15:26', 1),
(66, 'user', 'User', NULL, 1, 1, '2019-06-23 08:15:46', '2019-06-23 08:15:46', 1),
(67, 'user', 'User', NULL, 1, 1, '2019-06-23 08:15:56', '2019-06-23 08:15:56', 1),
(68, 'user', 'User', NULL, 1, 1, '2019-06-23 08:16:00', '2019-06-23 08:16:00', 1),
(69, 'user', 'User', NULL, 1, 1, '2019-06-23 08:16:05', '2019-06-23 08:16:05', 1),
(70, 'user', 'User', NULL, 1, 1, '2019-06-23 08:17:49', '2019-06-23 08:17:49', 1),
(71, 'user', 'User', NULL, 1, 1, '2019-06-23 08:18:17', '2019-06-23 08:18:17', 1),
(72, 'user', 'User', NULL, 1, 1, '2019-06-23 08:51:08', '2019-06-23 08:51:08', 1),
(73, 'user', 'User', NULL, 1, 1, '2019-06-23 08:53:13', '2019-06-23 08:53:13', 1),
(74, 'user', 'User', NULL, 1, 1, '2019-06-23 08:53:30', '2019-06-23 08:53:30', 1),
(75, 'user', 'User', NULL, 1, 1, '2019-06-23 09:33:59', '2019-06-23 09:33:59', 1),
(76, 'user', 'User', NULL, 1, 1, '2019-06-23 09:45:39', '2019-06-23 09:34:26', 1),
(77, 'user', 'User', NULL, 1, 1, '2019-06-23 17:42:32', '2019-06-23 10:11:02', 1),
(78, 'user', 'User', NULL, 1, 1, '2019-06-23 10:11:45', '2019-06-23 10:11:45', 1),
(79, 'user', 'User', NULL, 1, 1, '2019-06-23 10:12:07', '2019-06-23 10:12:07', 1),
(80, 'user', 'User', NULL, 1, 1, '2019-06-23 10:21:51', '2019-06-23 10:21:51', 1),
(81, 'user', 'User', NULL, 1, 1, '2019-06-23 10:23:47', '2019-06-23 10:23:47', 1),
(82, 'user', 'User', NULL, 1, 1, '2019-06-23 10:23:52', '2019-06-23 10:23:52', 1),
(83, 'user', 'User', NULL, 1, 1, '2019-06-23 10:24:26', '2019-06-23 10:24:26', 1),
(84, 'user', 'User', NULL, 1, 1, '2019-06-23 10:29:32', '2019-06-23 10:29:32', 1),
(85, 'user', 'User', NULL, 1, 1, '2019-06-23 10:30:29', '2019-06-23 10:30:29', 1),
(86, 'user', 'User', NULL, 1, 1, '2019-06-23 10:32:16', '2019-06-23 10:32:16', 1),
(87, 'user', 'User', NULL, 1, 1, '2019-06-23 10:33:53', '2019-06-23 10:33:53', 1),
(88, 'user', 'User', NULL, 1, 1, '2019-08-18 12:40:01', '2019-08-18 12:40:01', 1),
(89, 'user', 'User', NULL, 1, 1, '2019-08-18 12:41:35', '2019-08-18 12:41:35', 1),
(90, 'user', 'User', NULL, 1, 1, '2019-08-18 12:45:43', '2019-08-18 12:45:43', 1),
(91, 'user', 'User', NULL, 1, 1, '2019-08-18 12:47:18', '2019-08-18 12:47:18', 1),
(92, 'user', 'User', NULL, 1, 1, '2019-08-18 12:48:25', '2019-08-18 12:48:25', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_journal_vouchers`
--
ALTER TABLE `ac_journal_vouchers`
  ADD PRIMARY KEY (`id`,`journal_code`),
  ADD UNIQUE KEY `journal_code` (`journal_code`);

--
-- Indexes for table `ac_ledgers`
--
ALTER TABLE `ac_ledgers`
  ADD PRIMARY KEY (`id`,`ledger_code`),
  ADD UNIQUE KEY `ledger_code` (`ledger_code`),
  ADD KEY `ac_ledgers_ibfk_1` (`created_by`),
  ADD KEY `ac_ledgers_ibfk_3` (`updated_by`),
  ADD KEY `ledger_type` (`ledger_type`);

--
-- Indexes for table `ac_ledger_entry`
--
ALTER TABLE `ac_ledger_entry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entry_group` (`entry_group`),
  ADD KEY `journal_id` (`journal_id`),
  ADD KEY `ledger_id` (`ledger_id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `ac_ledger_type`
--
ALTER TABLE `ac_ledger_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `ac_taxes`
--
ALTER TABLE `ac_taxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `verification_id` (`verification_id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_ibfk_1` (`category_id`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_id` (`blog_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `customer_id` (`booker_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `boarding` (`boarding`),
  ADD KEY `dropping` (`dropping`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `client_page_contents`
--
ALTER TABLE `client_page_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `explore`
--
ALTER TABLE `explore`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_created_by` (`created_by`),
  ADD KEY `fk_updated_by` (`updated_by`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faq_created_by` (`created_by`),
  ADD KEY `faq_updated_by` (`updated_by`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verification_id` (`verification_id`),
  ADD KEY `locations_ibfk_2` (`created_by`),
  ADD KEY `locations_ibfk_3` (`updated_by`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_r` (`category_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_categories_ibfk_1` (`created_by`),
  ADD KEY `news_categories_ibfk_2` (`updated_by`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `permissions_old`
--
ALTER TABLE `permissions_old`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`),
  ADD KEY `controller` (`controller`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `location_from` (`location_from`),
  ADD KEY `location_to` (`location_to`),
  ADD KEY `schedules_ibfk_8` (`operator_id`),
  ADD KEY `location_from_id` (`location_from_id`),
  ADD KEY `location_to_id` (`location_to_id`);

--
-- Indexes for table `schedule_departures`
--
ALTER TABLE `schedule_departures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `problem_flag` (`problem_flag`),
  ADD KEY `problem_reported_by` (`problem_reported_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `schedule_routes`
--
ALTER TABLE `schedule_routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_routes_ibfk_1` (`schedule_id`),
  ADD KEY `schedule_routes_ibfk_2` (`location_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_r` (`page_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`,`slug`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `auth_key` (`auth_key`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `verification_id` (`verification_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `role` (`role`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `pan_number` (`pan_number`),
  ADD UNIQUE KEY `company_registration_number` (`company_registration_number`),
  ADD UNIQUE KEY `citizenship` (`citizenship`),
  ADD UNIQUE KEY `license_no` (`license_no`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`,`role`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number_plate` (`number_plate`),
  ADD UNIQUE KEY `bluebook_num_2` (`bluebook_num`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `type` (`type`),
  ADD KEY `bluebook_num` (`bluebook_num`),
  ADD KEY `verification_id` (`verification_id`),
  ADD KEY `vehicles_ibfk_5` (`updated_by`),
  ADD KEY `vehicles_ibfk_6` (`created_by`);

--
-- Indexes for table `vehicles_hire`
--
ALTER TABLE `vehicles_hire`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number_plate` (`number_plate`),
  ADD UNIQUE KEY `bluebook_num_2` (`bluebook_num`),
  ADD KEY `type` (`type`),
  ADD KEY `bluebook_num` (`bluebook_num`);

--
-- Indexes for table `vehicle_comments`
--
ALTER TABLE `vehicle_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `verification_id` (`verification_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `vehicle_ratings`
--
ALTER TABLE `vehicle_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `rating_type_id` (`rating_type_id`),
  ADD KEY `vehicle_ratings_ibfk_4` (`vendor_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `vehicle_rating_categories`
--
ALTER TABLE `vehicle_rating_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verification_id` (`verification_id`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `vendor_comments`
--
ALTER TABLE `vendor_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `verification_id` (`verification_id`);

--
-- Indexes for table `verification_actions`
--
ALTER TABLE `verification_actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_name` (`table_name`),
  ADD KEY `verified_by` (`verified_by`),
  ADD KEY `requested_by` (`requested_by`);

--
-- Indexes for table `verification_comments`
--
ALTER TABLE `verification_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_name` (`table_name`),
  ADD KEY `requested_by` (`requested_by`),
  ADD KEY `verified_by` (`verified_by`);

--
-- Indexes for table `verification_users`
--
ALTER TABLE `verification_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_name` (`table_name`),
  ADD KEY `verified_by` (`verified_by`),
  ADD KEY `requested_by` (`requested_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_journal_vouchers`
--
ALTER TABLE `ac_journal_vouchers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ac_ledgers`
--
ALTER TABLE `ac_ledgers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ac_ledger_entry`
--
ALTER TABLE `ac_ledger_entry`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ac_ledger_type`
--
ALTER TABLE `ac_ledger_type`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ac_taxes`
--
ALTER TABLE `ac_taxes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `client_page_contents`
--
ALTER TABLE `client_page_contents`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `explore`
--
ALTER TABLE `explore`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions_old`
--
ALTER TABLE `permissions_old`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schedule_departures`
--
ALTER TABLE `schedule_departures`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule_routes`
--
ALTER TABLE `schedule_routes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles_hire`
--
ALTER TABLE `vehicles_hire`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_comments`
--
ALTER TABLE `vehicle_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_ratings`
--
ALTER TABLE `vehicle_ratings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle_rating_categories`
--
ALTER TABLE `vehicle_rating_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_comments`
--
ALTER TABLE `vendor_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verification_actions`
--
ALTER TABLE `verification_actions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `verification_comments`
--
ALTER TABLE `verification_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verification_users`
--
ALTER TABLE `verification_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ac_ledgers`
--
ALTER TABLE `ac_ledgers`
  ADD CONSTRAINT `ac_ledgers_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ac_ledgers_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ac_ledgers_ibfk_4` FOREIGN KEY (`ledger_type`) REFERENCES `ac_ledger_type` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ac_ledger_entry`
--
ALTER TABLE `ac_ledger_entry`
  ADD CONSTRAINT `ac_ledger_entry_ibfk_1` FOREIGN KEY (`entry_group`) REFERENCES `ac_ledger_entry` (`id`),
  ADD CONSTRAINT `ac_ledger_entry_ibfk_3` FOREIGN KEY (`journal_id`) REFERENCES `ac_journal_vouchers` (`id`),
  ADD CONSTRAINT `ac_ledger_entry_ibfk_4` FOREIGN KEY (`ledger_id`) REFERENCES `ac_ledgers` (`id`),
  ADD CONSTRAINT `ac_ledger_entry_ibfk_5` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`),
  ADD CONSTRAINT `ac_ledger_entry_ibfk_6` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `ac_ledger_type`
--
ALTER TABLE `ac_ledger_type`
  ADD CONSTRAINT `ac_ledger_type_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `ac_ledger_type_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `ac_taxes`
--
ALTER TABLE `ac_taxes`
  ADD CONSTRAINT `ac_taxes_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ac_taxes_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `amenities`
--
ALTER TABLE `amenities`
  ADD CONSTRAINT `amenities_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `amenities_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `amenities_ibfk_4` FOREIGN KEY (`verification_id`) REFERENCES `verification_actions` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `auth_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD CONSTRAINT `blog_categories_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_categories_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `blog_comments_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`booker_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_5` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_6` FOREIGN KEY (`boarding`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `bookings_ibfk_7` FOREIGN KEY (`dropping`) REFERENCES `locations` (`id`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `client_page_contents`
--
ALTER TABLE `client_page_contents`
  ADD CONSTRAINT `client_page_contents_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `client_r` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `explore`
--
ALTER TABLE `explore`
  ADD CONSTRAINT `fk_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faq_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`verification_id`) REFERENCES `verification_actions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `locations_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `locations_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `news_categories` (`id`),
  ADD CONSTRAINT `news_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD CONSTRAINT `news_categories_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `news_categories_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `permissions_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `permissions_old`
--
ALTER TABLE `permissions_old`
  ADD CONSTRAINT `permissions_old_ibfk_1` FOREIGN KEY (`role`) REFERENCES `user_roles` (`id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_10` FOREIGN KEY (`location_to_id`) REFERENCES `locations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_ibfk_3` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_ibfk_6` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_ibfk_7` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_ibfk_8` FOREIGN KEY (`operator_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_ibfk_9` FOREIGN KEY (`location_from_id`) REFERENCES `locations` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `schedule_departures`
--
ALTER TABLE `schedule_departures`
  ADD CONSTRAINT `schedule_departures_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_departures_ibfk_2` FOREIGN KEY (`problem_reported_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_departures_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `verification_actions`
--
ALTER TABLE `verification_actions`
  ADD CONSTRAINT `FK_VERIFIED_BY` FOREIGN KEY (`verified_by`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
