-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `web`;
CREATE DATABASE `web` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `web`;

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `amount` int(6) unsigned NOT NULL DEFAULT 0,
  `price` float unsigned NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `product` (`id`, `name`, `amount`, `price`, `date`) VALUES
(1,	'Chang',	50,	50,	'2020-09-12 00:00:00'),
(2,	'Leo',	30,	55,	'2020-09-11 00:00:00'),
(3,	'Singha',	80,	60,	'2020-09-11 00:00:00'),
(4,	'Heineken',	40,	65,	'2020-09-12 00:00:00');

DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned DEFAULT 0,
  `amount` int(10) unsigned DEFAULT 0,
  `unit_price` float unsigned DEFAULT NULL,
  `summary_price` float unsigned DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2020-09-12 15:40:11
