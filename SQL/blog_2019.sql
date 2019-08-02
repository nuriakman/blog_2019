-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `blog_2019`;
CREATE DATABASE `blog_2019` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci */;
USE `blog_2019`;

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE `kategoriler` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `siralama` int(11) DEFAULT 0,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `kategoriler` (`kategori_id`, `kategori_adi`, `siralama`) VALUES
(1,	'Linux',	40),
(2,	'GİT',	30),
(3,	'PHP',	10),
(4,	'MySQL',	20);

DROP TABLE IF EXISTS `yazarlar`;
CREATE TABLE `yazarlar` (
  `yazar_id` int(11) NOT NULL AUTO_INCREMENT,
  `yazar_adi` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yazar_email` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `parola` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yetki_seviyesi` int(11) DEFAULT 1,
  PRIMARY KEY (`yazar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `yazarlar` (`yazar_id`, `yazar_adi`, `yazar_email`, `parola`, `yetki_seviyesi`) VALUES
(1,	'Nuri Akman',	'nuri@gmail.com',	'123',	2);

DROP TABLE IF EXISTS `yazilar`;
CREATE TABLE `yazilar` (
  `yazi_id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yazildigi_tarih` date DEFAULT NULL,
  `yayinlanacagi_tarih` date DEFAULT NULL,
  `yazar_id` int(11) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `yazi_spotu` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yazi` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` int(11) DEFAULT 0,
  `begeni` int(11) DEFAULT 0,
  `sayac` int(11) DEFAULT 0,
  PRIMARY KEY (`yazi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


-- 2019-08-02 08:20:29
