-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 21, 2024 at 01:38 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omari`
--

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

DROP TABLE IF EXISTS `listing`;
CREATE TABLE IF NOT EXISTS `listing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` longtext COLLATE utf8_unicode_ci,
  `name` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `categories` longtext COLLATE utf8_unicode_ci,
  `amenities` longtext COLLATE utf8_unicode_ci,
  `photos` longtext COLLATE utf8_unicode_ci,
  `video_url` longtext COLLATE utf8_unicode_ci,
  `video_provider` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` longtext COLLATE utf8_unicode_ci,
  `address` longtext COLLATE utf8_unicode_ci,
  `email` longtext COLLATE utf8_unicode_ci,
  `phone` longtext COLLATE utf8_unicode_ci,
  `website` longtext COLLATE utf8_unicode_ci,
  `social` longtext COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `listing_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `listing_thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `listing_cover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_meta_tags` longtext COLLATE utf8_unicode_ci,
  `meta_description` longtext COLLATE utf8_unicode_ci,
  `date_added` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT '0',
  `google_analytics_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_expiry_date` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `reference` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marque` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modele` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prix` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `couleur` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `os` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reseau` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `memoire` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ram` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sim` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `copie` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gpu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `processeur` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `screensize` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gpuref` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disquetype` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disquesize` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kilometrage` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeboite` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `energie` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`id`, `code`, `name`, `description`, `categories`, `amenities`, `photos`, `video_url`, `video_provider`, `tags`, `address`, `email`, `phone`, `website`, `social`, `user_id`, `latitude`, `longitude`, `country_id`, `city_id`, `status`, `listing_type`, `listing_thumbnail`, `listing_cover`, `seo_meta_tags`, `meta_description`, `date_added`, `date_modified`, `is_featured`, `google_analytics_id`, `package_expiry_date`, `state_id`, `reference`, `marque`, `modele`, `prix`, `couleur`, `etat`, `os`, `reseau`, `memoire`, `ram`, `sim`, `copie`, `gpu`, `processeur`, `screensize`, `gpuref`, `disquetype`, `disquesize`, `kilometrage`, `typeboite`, `energie`) VALUES
(1, '524f5cfbcc1b6168b5eae0e3435b192f', 'Grand Hotel', '', '[\"12\"]', '[]', '[\"ed498ab7aaf4b610156c34a6ce52796a.jpg\",\"d9847655ed6953ac8f14e1c44e9234dc.jpg\",\"b83cc3247837f02e11299a0c2c7dd946.jpg\",\"265151374e0c2f994514abae1167f0ac.jpg\",\"a60bf92f1e439e98a2548d854b300ee2.jpg\"]', '', 'youtube', NULL, 'Logt 255 citÃ© des 67 HA CO\r\nRue Augostino Netto', 'alfreddjpro@gmail.com', '0325300003', 'www.err.Fr', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 3, '40.697195', '-73.9351', 128, NULL, 'active', 'hotel', 'f89c4289473b0c04612d22c36b0b7fbf.jpg', 'af3bad53146bd43c66d087b962e84652.jpg', 'Le grand hotel diego', 'Le grand hotel diego suarez', '1704747600', 1707166800, 0, '', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '39ee3f7a26af9b54e168d59cc8b3d580', 'Teste Mis en avant Voitured', 'dsdsds', '[\"13\"]', '[]', '[]', '', 'youtube', NULL, 'Logt III G 46 CABIS Ambatolampy Atehiroka', 'f203666@gmail.com', '+261325300003', 'ffff.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 5, '40.706464', '-74.033074', 128, NULL, 'active', 'general', '82760147a16185456283fb05e22a82d4.jpg', '4df264898c982465605769b36c61b57f.jpg', 'Key World', '', '1707253200', 1707253200, 1, '', '1879966800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '8922fa59f87a405bc75fb13081fa0a03', 'HHHHH', 'fsdfjjj', '[\"18\"]', '[]', '[]', '', 'youtube', NULL, '', '', '', 'ffff.com', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', 5, '40.708026', '-74.037191', 1, NULL, 'pending', 'general', '12aa843a2016169177af23c98ff615a7.jpg', 'thumbnail.png', 'fddfd', '', '1707253200', 1707253200, 0, '', '1879966800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '3e45de732c268fd7c3a55bda8fdf93cf', NULL, '', '\"[&quot;15&quot;,&quot;21&quot;]\"', '[]', NULL, '', '', NULL, '', '', '', '', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', 5, '', '', 0, 0, 'pending', '', NULL, NULL, '', '', '1708462800', NULL, 0, '', '1879966800', 0, 'ddfddf', 'marque', '', 'prix', '', 'etat', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '8cf41377ff25806ca1ea3aad1c8de43d', NULL, '', '[&quot;15&quot;,&quot;21&quot;]', '[]', NULL, '', '', NULL, '', '', '', '', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', 5, '', '', 0, 0, 'pending', '', NULL, NULL, '', '', '1708462800', NULL, 0, '', '1879966800', 0, 'ddfddf', 'marque', '', 'prix', '', 'etat', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '78cfcdf17bf2c62bd3baa2d70cc373d4', NULL, '', NULL, '[]', NULL, '', '', NULL, '', '', '', '', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', 5, '', '', 0, 0, 'pending', '', NULL, NULL, '', '', '1708462800', NULL, 0, '', '1879966800', 0, 'ddfddf', 'marque', '', 'prix', '', 'etat', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'f37b15feac2239d29538aa01a63cd0e5', NULL, '', NULL, '[]', NULL, '', '', NULL, '', '', '', '', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', 5, '', '', 0, 0, 'pending', '', NULL, NULL, '', '', '1708462800', NULL, 0, '', '1879966800', 0, 'ddfddf', 'marque', '', 'prix', '', 'etat', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '9a00dedeb11ae462c4fa981a95391113', NULL, '', '[&quot;15&quot;,&quot;21&quot;]', '[]', NULL, '', '', NULL, '', '', '', '', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', 5, '', '', 0, 0, 'pending', '', NULL, NULL, '', '', '1708462800', NULL, 0, '', '1879966800', 0, 'ddfddf', 'marque', '', 'prix', '', 'etat', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '7819b8ccf4e59e527d4fe296c57444b9', NULL, '', '\"[&quot;15&quot;,&quot;21&quot;]\"', '[]', NULL, '', '', NULL, '', '', '', '', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', 5, '', '', 0, 0, 'pending', '', NULL, NULL, '', '', '1708462800', NULL, 0, '', '1879966800', 0, 'ddfddf', 'marque', '', 'prix', '', 'etat', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'df3b5e6c20673e5aa46e31c64e6d34fe', NULL, '', '15,25', '[]', NULL, '', '', NULL, '', '', '', '', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', 5, '', '', 0, 0, 'pending', '', NULL, NULL, '', '', '1708462800', NULL, 0, '', '1879966800', 0, '', '', '', 'prix', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'ca2aa61550f88d58e3ba1891fc149b97', NULL, '', '\"15,25\"', '[]', NULL, '', '', NULL, '', '', '', '', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', 5, '', '', 0, 0, 'pending', '', NULL, NULL, '', '', '1708462800', NULL, 0, '', '1879966800', 0, '', '', '', 'prix', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'f67d85fa5525898649a575a4cadaa2fc', NULL, '', '\"15,25\"', '[]', NULL, '', '', NULL, '', '', '', '', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', 5, '', '', 0, 0, 'pending', '', NULL, NULL, '', '', '1708462800', NULL, 0, '', '1879966800', 0, '', '', '', 'prix', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
