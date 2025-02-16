-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 12, 2025 at 11:59 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `venly`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `venue_id` int NOT NULL,
  `booking_message` varchar(255) DEFAULT NULL,
  `booking_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `venue_id` (`venue_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `venue_id`, `booking_message`, `booking_date`) VALUES
(23, 17, 4, 'I need to book this venue', '2024-12-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `phone` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `phone`) VALUES
(6, 'Nami', '$2y$10$lhHLxHIJuJ4znKKO0w8MHeTbWhX493L4LOGXoY.5hh.650SYjmyHG', 'nami@gmail.com', 'user', 2147483647),
(5, 'Danial', '$2y$10$kdu54adsKlkLHCr3aKVvluJ2t/kNyJyAF2QWshXRtISxIvzn1ZC7i', 'danial@gmail.com', 'user', 2147483647),
(4, 'Creeds', '$2y$10$YsUtvKbEEOthByH1hV2ku.l8ESAFV1Vd71z1GElw3MaNTkdfh4Zqy', 'creed@gmail.com', 'user', 2147483647),
(7, 'Zoro', '$2y$10$rbdi6.rs3BMdUP2RrYPtkuYwZgy2/0xFD8LHl2SYlFgRB2ySpm7U6', 'zoro@gmai.com', 'user', 2147483647),
(8, 'admin', '$2y$10$mIe3daMXL1.cF1SQQLNVyeG9FqMyRe5RqXwY/GQgyo74oLT2UzLrG', 'admin@gmail.com', 'admin', 2147483647),
(9, 'user', '$2y$10$aqfvYwUPJp2GumO1jk9awOwEjZ9VXz37cDKFh1qOu.DtAQikQxVSC', 'user', 'user', 2147483647),
(10, 'saugat devkota', '$2y$10$zdAn2w8eU9tTlbnhRxy48OrvYbGerV5yXPX8NkPrPQ03BfrKCRPjy', 'saugat@gmail.com', 'user', 2147483647),
(14, 'hobbit2', '$2y$10$e4suKL4K8LzvD/weltakweTvoZ5ZkhM/bwgJbYt1Es8Kn2wVPhsSu', 'hobbit2@gmail.com', 'user', 9802456234),
(15, 'anit', '$2y$10$eJSDFvLfzia2TLfalD0RNOV3U98nBoR4jzQKeOqhnyhIss5O7DNYC', 'anit@gmail.com', 'user', 9805642148),
(16, 'anit', '$2y$10$fLMrlqMzO//vFhM0sKtwiO33R55zWGzHEuYjavENbUsyXkHI8Q0ee', 'anit1@gmail.com', 'user', 9805642148),
(17, 'saroj', '$2y$10$YB9AB1BbCalSF.c9PO1Ob.7YUBKo6OR1gkMeqXTGZ5wAmbWHcUmZ6', 'saroj@gmail.com', 'user', 9805345612);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

DROP TABLE IF EXISTS `venue`;
CREATE TABLE IF NOT EXISTS `venue` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `facility` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_of_person` int NOT NULL,
  `service_price` decimal(10,2) NOT NULL,
  `food_price` decimal(10,2) NOT NULL,
  `map_link` text,
  `img_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `name`, `about`, `facility`, `location`, `email`, `no_of_person`, `service_price`, `food_price`, `map_link`, `img_path`) VALUES
(4, 'The Evergreen Event Space ', 'The Evergreen Event Space is a versatile and modern venue located in the heart of the city. Featuring high ceilings, abundant natural light, and a minimalist aesthetic, the space can be easily transformed to suit a variety of events, from corporate conferences to lavish weddings. The main hall can accommodate up to 300 guests, with the option to divide the space into two smaller rooms for more intimate gatherings. Equipped with state-of-the-art audiovisual equipment and a catering-ready kitchen, the venue provides everything needed to bring your event vision to life. Outdoor patios and gardens offer picturesque backdrops for cocktail receptions and photo opportunities. On-site event coordinators are available to assist with all the planning details, ensuring a seamless and stress-free experience. Conveniently located with ample parking, the Evergreen Event Space is an ideal choice for those seeking a modern, flexible, and well-appointed venue. Book your event today and let us help you create an unforgettable experience.', 'The Evergreen Event Space boasts a modern and adaptable facility designed to cater to a wide range of events. The main hall features high ceilings, large windows allowing for ample natural light, and a sleek, minimalist decor that can be easily customized', 'ranibhan', 'new_ven@gmail.com', 5000, 5000.00, 5000.00, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25349.017794037638!2d85.27150897431635!3d27.71918139999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18e373056809%3A0x9f179929f2504602!2sNaya%20Bazar!5e1!3m2!1sne!2snp!4v1725989090396!5m2!1sne!2snp', 'images/image-1.png'),
(5, 'Rani Mall', 'a versatile and modern venue located in the heart of the city. Featuring high ceilings, abundant natural light, and a minimalist aesthetic, the space can be easily transformed to suit a variety of events, from corporate conferences to lavish weddings. The main hall can accommodate up to 300 guests, with the option to divide the space into two smaller rooms for more intimate gatherings. Equipped with state-of-the-art audiovisual equipment and a catering-ready kitchen, the venue provides everything needed to bring your event vision to life. Outdoor patios and gardens offer picturesque backdrops for cocktail receptions and photo opportunities. On-site event coordinators are available to assist with all the planning details, ensuring a seamless and stress-free experience. Conveniently located with ample parking, the Evergreen Event Space is an ideal choice for those seeking a modern, flexible, and well-appointed venue. Book your event today and let us help you create an unforgettable experience.', 'A modern and adaptable facility designed to cater to a wide range of events. The main hall features high ceilings, large windows allowing for ample natural light, and a sleek, minimalist decor that can be easily customized to match any event\'s aesthetic. ', 'lalipur', 'ranimall@gmail.com', 400, 20000.00, 2000.00, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25349.017794037638!2d85.27150897431635!3d27.71918139999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18e373056809%3A0x9f179929f2504602!2sNaya%20Bazar!5e1!3m2!1sne!2snp!4v1725989090396!5m2!1sne!2snp', 'images/image-2.png'),
(13, 'Hello Venue', 'This is it', 'This is it', 'New Town planning', 'hellovenue@gmail.com', 5000, 12000.00, 1200.00, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25349.017794037638!2d85.27150897431635!3d27.71918139999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18e373056809%3A0x9f179929f2504602!2sNaya%20Bazar!5e1!3m2!1sne!2snp!4v1725989090396!5m2!1sne!2snp', 'images/autumn-leaves-beautiful-anime-girl.jpeg'),
(7, 'Nepa Banquets', 'a versatile and modern venue located in the heart of the city. Featuring high ceilings, abundant natural light, and a minimalist aesthetic, the space can be easily transformed to suit a variety of events, from corporate conferences to lavish weddings. The main hall can accommodate up to 300 guests, with the option to divide the space into two smaller rooms for more intimate gatherings. Equipped with state-of-the-art audiovisual equipment and a catering-ready kitchen, the venue provides everything needed to bring your event vision to life. Outdoor patios and gardens offer picturesque backdrops for cocktail receptions and photo opportunities. On-site event coordinators are available to assist with all the planning details, ensuring a seamless and stress-free experience. Conveniently located with ample parking, the Evergreen Event Space is an ideal choice for those seeking a modern, flexible, and well-appointed venue. Book your event today and let us help you create an unforgettable experience.', 'A modern and adaptable facility designed to cater to a wide range of events. The main hall features high ceilings, large windows allowing for ample natural light, and a sleek, minimalist decor that can be easily customized to match any event\'s aesthetic. ', 'dallu, kathmandu', 'nepa_banquet@gmail.com', 200, 25000.00, 1500.00, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25349.017794037638!2d85.27150897431635!3d27.71918139999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18e373056809%3A0x9f179929f2504602!2sNaya%20Bazar!5e1!3m2!1sne!2snp!4v1725989090396!5m2!1sne!2snp', 'images/image-4.png'),
(8, 'Modern Venue', 'asdasd', 'asdasdasd', 'asdasd', 'modernvenue@gmail.com', 11221, 12000.00, 1200.00, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25349.017794037638!2d85.27150897431635!3d27.71918139999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18e373056809%3A0x9f179929f2504602!2sNaya%20Bazar!5e1!3m2!1sne!2snp!4v1725989090396!5m2!1sne!2snp', 'images/image-1.png'),
(11, 'Modern Venuess', 'asdasd', 'asdasdasd', 'asdasd', 'modernvenue@gmail.com', 11221, 12000.00, 1200.00, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25349.017794037638!2d85.27150897431635!3d27.71918139999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18e373056809%3A0x9f179929f2504602!2sNaya%20Bazar!5e1!3m2!1sne!2snp!4v1725989090396!5m2!1sne!2snp', 'images/image-2.png'),
(12, 'Modern Venuess', 'adasd', 'asdasd', 'asdasd', 'modernvenue@gmail.com', 11221, 12000.00, 1200.00, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25349.017794037638!2d85.27150897431635!3d27.71918139999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18e373056809%3A0x9f179929f2504602!2sNaya%20Bazar!5e1!3m2!1sne!2snp!4v1725989090396!5m2!1sne!2snp', 'images/image-4.png'),
(14, 'One piece', 'A place full of bubble. Peopl can use the bubble to carry the weight. Place is filled with the greenary and amazing senario.', 'A place full of bubble. Peopl can use the bubble to carry the weight. Place is filled with the greenary and amazing senario.', 'Sabondy, New world', 'one_piece@gmai.com', 500, 12000.00, 1200.00, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25349.017794037638!2d85.27150897431635!3d27.71918139999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18e373056809%3A0x9f179929f2504602!2sNaya%20Bazar!5e1!3m2!1sne!2snp!4v1725989090396!5m2!1sne!2snp', 'images/39746eea29ef15a08a05e9365c2d6be4..jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
