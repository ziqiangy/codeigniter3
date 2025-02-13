-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2025 at 05:56 PM
-- Server version: 10.11.7-MariaDB
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciapptest`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `volume_id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(22) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `book_long_title` varchar(59) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `book_subtitle` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `book_short_title` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `book_lds_url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `volume_id` (`volume_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `chapter_number` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flashcards`
--

DROP TABLE IF EXISTS `flashcards`;
CREATE TABLE IF NOT EXISTS `flashcards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `term` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `definition` varchar(2000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `insert_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flashcard_categories`
--

DROP TABLE IF EXISTS `flashcard_categories`;
CREATE TABLE IF NOT EXISTS `flashcard_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

DROP TABLE IF EXISTS `group_user`;
CREATE TABLE IF NOT EXISTS `group_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note_cate`
--

DROP TABLE IF EXISTS `note_cate`;
CREATE TABLE IF NOT EXISTS `note_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quick_notes`
--

DROP TABLE IF EXISTS `quick_notes`;
CREATE TABLE IF NOT EXISTS `quick_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `content` varchar(5000) DEFAULT NULL,
  `insert_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `archive_date` timestamp NULL DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `is_important` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `is_done` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc_note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `scriptures`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `scriptures`;
CREATE TABLE IF NOT EXISTS `scriptures` (
`volume_id` int(10) unsigned
,`book_id` int(10) unsigned
,`chapter_id` int(10) unsigned
,`verse_id` int(10) unsigned
,`volume_title` varchar(22)
,`book_title` varchar(22)
,`volume_long_title` varchar(26)
,`book_long_title` varchar(59)
,`volume_subtitle` varchar(36)
,`book_subtitle` varchar(80)
,`volume_short_title` varchar(3)
,`book_short_title` varchar(8)
,`volume_lds_url` varchar(12)
,`book_lds_url` varchar(255)
,`chapter_number` smallint(5) unsigned
,`verse_number` int(10) unsigned
,`scripture_text` text
,`verse_title` varchar(39)
,`verse_short_title` varchar(25)
);

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

DROP TABLE IF EXISTS `superadmin`;
CREATE TABLE IF NOT EXISTS `superadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `insert_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `role_id` int(11) DEFAULT NULL,
  `google_id` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'first_register',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verses`
--

DROP TABLE IF EXISTS `verses`;
CREATE TABLE IF NOT EXISTS `verses` (
  `id` int(10) UNSIGNED NOT NULL,
  `chapter_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `verse_number` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `scripture_text` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `chapter_id` (`chapter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volumes`
--

DROP TABLE IF EXISTS `volumes`;
CREATE TABLE IF NOT EXISTS `volumes` (
  `id` int(10) UNSIGNED NOT NULL,
  `volume_title` varchar(22) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `volume_long_title` varchar(26) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `volume_subtitle` varchar(36) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `volume_short_title` varchar(3) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `volume_lds_url` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webster_dictionary`
--

DROP TABLE IF EXISTS `webster_dictionary`;
CREATE TABLE IF NOT EXISTS `webster_dictionary` (
  `vocab` text DEFAULT NULL,
  `def` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='[*Webster''s Unabridged English Dictionary*](https://www.gutenberg.org/ebooks/29765) (from the [Gutenberg Project](https://www.gutenberg.org/), compiled August 22, 2009)';

-- --------------------------------------------------------

--
-- Structure for view `scriptures`
--
DROP TABLE IF EXISTS `scriptures`;

DROP VIEW IF EXISTS `scriptures`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `scriptures`  AS SELECT `volumes`.`id` AS `volume_id`, `books`.`id` AS `book_id`, `chapters`.`id` AS `chapter_id`, `verses`.`id` AS `verse_id`, `volumes`.`volume_title` AS `volume_title`, `books`.`book_title` AS `book_title`, `volumes`.`volume_long_title` AS `volume_long_title`, `books`.`book_long_title` AS `book_long_title`, `volumes`.`volume_subtitle` AS `volume_subtitle`, `books`.`book_subtitle` AS `book_subtitle`, `volumes`.`volume_short_title` AS `volume_short_title`, `books`.`book_short_title` AS `book_short_title`, `volumes`.`volume_lds_url` AS `volume_lds_url`, `books`.`book_lds_url` AS `book_lds_url`, `chapters`.`chapter_number` AS `chapter_number`, `verses`.`verse_number` AS `verse_number`, `verses`.`scripture_text` AS `scripture_text`, concat(`books`.`book_title`,' ',`chapters`.`chapter_number`,':',`verses`.`verse_number`) AS `verse_title`, concat(`books`.`book_short_title`,' ',`chapters`.`chapter_number`,':',`verses`.`verse_number`) AS `verse_short_title` FROM (((`volumes` join `books` on(`books`.`volume_id` = `volumes`.`id`)) join `chapters` on(`chapters`.`book_id` = `books`.`id`)) join `verses` on(`verses`.`chapter_id` = `chapters`.`id`)) ORDER BY `volumes`.`id` ASC, `books`.`id` ASC, `chapters`.`id` ASC, `verses`.`id` ASC ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`volume_id`) REFERENCES `volumes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `verses`
--
ALTER TABLE `verses`
  ADD CONSTRAINT `verses_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
