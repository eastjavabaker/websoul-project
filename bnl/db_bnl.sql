-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2013 at 02:17 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bnl`
--

-- --------------------------------------------------------

--
-- Table structure for table `mod_articles`
--

DROP TABLE IF EXISTS `mod_articles`;
CREATE TABLE IF NOT EXISTS `mod_articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seo_title` varchar(512) NOT NULL,
  `meta_description` varchar(512) NOT NULL,
  `meta_keyword` varchar(512) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '-',
  `short_content` varchar(300) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `picture` varchar(255) DEFAULT NULL,
  `publish` char(1) NOT NULL DEFAULT '0',
  `publish_date_from` date NOT NULL,
  `publish_date_to` date NOT NULL,
  `post_date` datetime DEFAULT NULL,
  `post_by` varchar(64) DEFAULT NULL,
  `countview` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mod_contact`
--

DROP TABLE IF EXISTS `mod_contact`;
CREATE TABLE IF NOT EXISTS `mod_contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `reply` text NOT NULL,
  `fbuid` varchar(64) NOT NULL,
  `created` datetime NOT NULL,
  `view` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mod_members`
--

DROP TABLE IF EXISTS `mod_members`;
CREATE TABLE IF NOT EXISTS `mod_members` (
  `fb_uid` varchar(64) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '-',
  `phone` varchar(32) DEFAULT NULL,
  `email` varchar(300) NOT NULL,
  `gender` varchar(16) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `hometown` varchar(512) NOT NULL,
  `education` text NOT NULL,
  `work` text NOT NULL,
  `current_location` varchar(512) NOT NULL,
  `pic1` varchar(255) NOT NULL,
  `pic2` varchar(255) NOT NULL,
  `devices` text NOT NULL,
  `publish` char(1) NOT NULL DEFAULT '0',
  `post_date` datetime DEFAULT NULL,
  `countview` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fb_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mod_pages`
--

DROP TABLE IF EXISTS `mod_pages`;
CREATE TABLE IF NOT EXISTS `mod_pages` (
  `page_code` varchar(6) CHARACTER SET latin1 NOT NULL DEFAULT '-',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `publish` char(1) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `post_date` datetime DEFAULT NULL,
  `post_by` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `countview` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`page_code`),
  KEY `title` (`page_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mod_pages`
--

INSERT INTO `mod_pages` (`page_code`, `title`, `content`, `publish`, `post_date`, `post_by`, `countview`) VALUES
('about2', 'CARA IKUTAN', 'Lorem ipsum dolor sit amet consectetur adipiscing elit cras ultricies dictum luct Sed lacinia velit a orci arg tincidunt et sagittis erat egestas vestibulum vestibulum aliquet elit ac aliquet phasellus at dolor vel metus atu accumsan lobortis morbi at mollis at purus Suspendisse est nunc, tempor vitae eleifend vel vulputate eget tortor metus Lorem ipsum dolor sit amet consectetur adipiscing elit cras ultricies dictum luct Sed lacinia velit a orci arg tincidunt et sagittis erat egestas vestibulum vestibulum', '1', '2012-05-13 11:04:30', NULL, 0),
('about1', 'LOVE TO WRITE ?', 'Lorem ipsum dolor sit amet consectetur adipiscing elit cras ultricies dictum luct Sed lacinia velit a orci arg tincidunt et sagittis erat egestas vestibulum vestibulum aliquet elit ac aliquet phasellus at dolor vel metus atu accumsan lobortis morbi at mollis at purus Suspendisse est nunc, tempor vitae eleifend vel vulputate eget tortor metus Lorem ipsum dolor sit amet consectetur adipiscing elit cras ultricies dictum luct Sed lacinia velit a orci arg tincidunt et sagittis erat egestas vestibulum vestibulum', '1', '2012-05-13 10:34:25', NULL, 0),
('tips', 'EDITOR TIPS', '<p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat magna eros eu erat. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat magna eros eu erat.</p>\r\n		    <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat magna eros eu erat. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat magna eros eu erat.</p>\r\n		    <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat magna eros eu erat. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate </p>', '1', '2012-05-13 19:54:33', NULL, 0),
('rdesc', 'HELLO', 'Lorem ipsum dolor sit amet consectetur adipiscing elit cras ultricies dictum luct Sed lacinia velit a orci arg tincidunt et sagittis erat egestas vestibulum vestibulum aliquet elit ac aliquet phasellus at dolor vel metus atu accumsan lobortis', '1', NULL, NULL, 0),
('rules', 'SYARAT & KETENTUAN', 'Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat magna eros eu erat.Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat magna eros eu erat.Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna\r\n\r\neros eu erat. Aliquam erat volutpat magna eros eu erat.Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat magna eros eu erat.\r\n\r\nPraesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat.', '1', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ref_articles_categories`
--

DROP TABLE IF EXISTS `ref_articles_categories`;
CREATE TABLE IF NOT EXISTS `ref_articles_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(300) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ref_articles_categories`
--

INSERT INTO `ref_articles_categories` (`id`, `category`, `description`, `created`) VALUES
(1, 'Test 123', 'test 123 adalah', '2013-02-14 00:00:00'),
(2, 'test 456', 'adalah', '2013-02-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sys_auths`
--

DROP TABLE IF EXISTS `sys_auths`;
CREATE TABLE IF NOT EXISTS `sys_auths` (
  `user_entity_id` int(11) NOT NULL,
  `module_code` varchar(16) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`user_entity_id`,`module_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sys_config`
--

DROP TABLE IF EXISTS `sys_config`;
CREATE TABLE IF NOT EXISTS `sys_config` (
  `entity_id` int(10) unsigned NOT NULL,
  `attribute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value_varchar` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value_int` int(10) unsigned DEFAULT NULL,
  `value_text` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sys_modules`
--

DROP TABLE IF EXISTS `sys_modules`;
CREATE TABLE IF NOT EXISTS `sys_modules` (
  `entity_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `root` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `module_code` varchar(16) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `package_file` varchar(255) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sys_modules`
--

INSERT INTO `sys_modules` (`entity_id`, `root`, `level`, `module_code`, `module_name`, `description`, `path`, `package_file`, `status`, `created`) VALUES
(7, 7, 2, 'ID', 'Test Module 1', 'just test just test 123', 'test1', NULL, '1', '2012-06-18 09:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_entity`
--

DROP TABLE IF EXISTS `user_entity`;
CREATE TABLE IF NOT EXISTS `user_entity` (
  `entity_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_entity_id` int(10) unsigned NOT NULL DEFAULT '0',
  `status` char(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  PRIMARY KEY (`entity_id`),
  UNIQUE KEY `emailunique` (`email`),
  KEY `group_entity_id` (`group_entity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_entity`
--

INSERT INTO `user_entity` (`entity_id`, `full_name`, `email`, `password`, `group_entity_id`, `status`, `created`, `modified`, `created_by`, `expired`) VALUES
(1, 'wahyu setianto', 'octopus.ws@gmail.com', '521c0f1341be54bb099035f81f177cb6bffb2b7b', 1, '1', NULL, '2012-06-12 09:47:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
CREATE TABLE IF NOT EXISTS `user_group` (
  `entity_id` int(10) unsigned NOT NULL,
  `group_name` varchar(128) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`entity_id`, `group_name`, `description`, `created`) VALUES
(1, 'Administrator', 'Full Access', '2012-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `user_entity_id` int(10) unsigned NOT NULL,
  `company` varchar(128) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `city` varchar(128) DEFAULT NULL,
  `phone` varchar(64) NOT NULL,
  `mobile_phone` varchar(64) DEFAULT NULL,
  `contact_person` varchar(128) NOT NULL,
  `department` varchar(128) DEFAULT NULL,
  `position` varchar(128) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`user_entity_id`),
  UNIQUE KEY `user_entityid` (`user_entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`user_entity_id`, `company`, `company_address`, `city`, `phone`, `mobile_phone`, `contact_person`, `department`, `position`, `created`, `modified`) VALUES
(1, 'Redcomm', 'Jl. Green Garden C1', 'DKI Jakarta', '021-898923', '081703030030', 'wahyu setianto', 'ITTT', 'Developer', '2012-02-08 18:04:53', '2012-06-12 09:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_status_description`
--

DROP TABLE IF EXISTS `user_status_description`;
CREATE TABLE IF NOT EXISTS `user_status_description` (
  `entity_id` tinyint(4) NOT NULL,
  `status_name` varchar(128) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_status_description`
--

INSERT INTO `user_status_description` (`entity_id`, `status_name`, `description`) VALUES
(0, 'Not Active', NULL),
(1, 'Active', NULL),
(2, 'Expired', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_entity`
--
ALTER TABLE `user_entity`
  ADD CONSTRAINT `user_entity_ibfk_1` FOREIGN KEY (`group_entity_id`) REFERENCES `user_group` (`entity_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
