-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 06:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `triptactix`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'khalaf', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(3, 'cairo'),
(4, 'luxor'),
(5, 'Alexandria'),
(6, 'Aswan'),
(7, 'Giza'),
(8, 'Siwa'),
(10, 'Sharm El-Sheikh'),
(11, 'Taba'),
(12, ' Nuweiba'),
(13, 'Marsa Alam'),
(15, 'portsaid'),
(16, 'Hurghada'),
(17, 'Elgouna'),
(18, 'Marsa Matrouh'),
(19, 'Suez'),
(20, 'Fayoum');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `fname`, `lname`, `email`, `message`) VALUES
(8, 'ahmed', 'fawzy', 'mohamedali@gmail.com', 'sadasd'),
(9, 'ahmed', 'fawzy', 'mohamedali@gmail.com', 'sss'),
(10, 'ahmed', 'fawzy', 'mohamedali@gmail.com', 'asdasd'),
(11, 'ahmed', 'fawzy', 'mohamedali@gmail.com', 'sadasd'),
(12, 'khalfalla', 'shuaib', 'kalfallaahmeed@gmail.com', 'hello'),
(13, 'khalaf', 'shuaib', 'ab@gmail.com', 'Hello I want to say that you have a very good idea, and you provide a Uniqe service');

-- --------------------------------------------------------

--
-- Table structure for table `places_requests`
--

CREATE TABLE `places_requests` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `place_id` int(255) NOT NULL,
  `ticket_price` decimal(18,0) NOT NULL,
  `qty` int(255) NOT NULL,
  `req_date` datetime(6) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `places_requests`
--

INSERT INTO `places_requests` (`id`, `user_id`, `place_id`, `ticket_price`, `qty`, `req_date`, `status`) VALUES
(17, 7, 7, 2000, 3, '2025-04-26 21:59:22.000000', 'Pending'),
(18, 10, 6, 400, 1, '2025-05-07 21:21:02.000000', 'Pending'),
(19, 11, 6, 150, 1, '2025-05-08 16:10:50.000000', 'Pending'),
(20, 1, 7, 450, 9, '2025-05-08 16:24:41.000000', 'Pending'),
(21, 11, 12, 450, 5, '2025-05-08 17:22:18.000000', 'Pending'),
(22, 1, 12, 150, 1, '2025-05-08 17:24:52.000000', 'Pending'),
(23, 11, 12, 450, 1, '2025-05-08 17:27:55.000000', 'Pending'),
(24, 11, 12, 150, 1, '2025-05-08 17:32:11.000000', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tourism_places`
--

CREATE TABLE `tourism_places` (
  `id` int(255) NOT NULL,
  `place_image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `city_id` int(255) NOT NULL,
  `egyptian_ticket` decimal(18,0) NOT NULL,
  `foreign_ticket` decimal(18,0) NOT NULL,
  `direction` varchar(1000) NOT NULL,
  `desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tourism_places`
--

INSERT INTO `tourism_places` (`id`, `place_image`, `title`, `city_id`, `egyptian_ticket`, `foreign_ticket`, `direction`, `desc`) VALUES
(12, 'OIP.jpg', 'Saqqara pyramid', 7, 150, 450, 'https://maps.app.goo.gl/8t9ye7ZhRGxczCLMA', 'The Saqqara Pyramid, also known as the Step Pyramid of Djoser, is one of Egypt’s most iconic ancient structures. Located in Saqqara, near Memphis, it was built during the Third Dynasty (c. 2670 BCE) for Pharaoh Djoser and designed by his brilliant archite'),
(13, 'th.jpg', 'Grand Egyptian Museum', 7, 150, 450, 'https://maps.app.goo.gl/8t9ye7ZhRGxczCLMA', 'The Grand Egyptian Museum (GEM) is an extraordinary archaeological museum located in Giza, Egypt, just 2 kilometers from the Giza pyramid complex. It is designed to be the largest archaeological museum in the world, covering 81,000 square meters of floor ');

-- --------------------------------------------------------

--
-- Table structure for table `tour_guides`
--

CREATE TABLE `tour_guides` (
  `id` int(255) NOT NULL,
  `guide_image` varchar(255) NOT NULL,
  `guide_name` varchar(255) NOT NULL,
  `city_id` int(255) NOT NULL,
  `egyptian_ticket` decimal(18,0) NOT NULL,
  `foreign_ticket` decimal(18,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tour_guides`
--

INSERT INTO `tour_guides` (`id`, `guide_image`, `guide_name`, `city_id`, `egyptian_ticket`, `foreign_ticket`) VALUES
(2, '1918009.png', 'ziad', 3, 500, 2000),
(3, 'profileagweb.0179e9b5506a02dd27b07850824e8010.jpg', 'noha', 4, 750, 1050),
(4, 'camel-ride-pyramid-800x600.jpeg', 'HASSAN', 7, 400, 600);

-- --------------------------------------------------------

--
-- Table structure for table `tour_guides_requests`
--

CREATE TABLE `tour_guides_requests` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `guide_id` int(255) NOT NULL,
  `ticket_price` decimal(18,0) NOT NULL,
  `qty` int(255) NOT NULL,
  `req_date` datetime(6) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_guides_requests`
--

INSERT INTO `tour_guides_requests` (`id`, `user_id`, `guide_id`, `ticket_price`, `qty`, `req_date`, `status`) VALUES
(2, 7, 2, 2000, 2, '2025-04-26 21:58:51.000000', 'Pending'),
(3, 7, 2, 500, 3, '2025-04-26 22:25:09.000000', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `transportations`
--

CREATE TABLE `transportations` (
  `id` int(255) NOT NULL,
  `city_image` varchar(255) NOT NULL,
  `type_id` int(255) NOT NULL,
  `city_from` int(255) NOT NULL,
  `city_to` int(255) NOT NULL,
  `egyptian_ticket` decimal(18,0) NOT NULL,
  `foreign_ticket` decimal(18,0) NOT NULL,
  `duration` int(255) NOT NULL,
  `time_slot` time(6) NOT NULL,
  `direction` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transportations`
--

INSERT INTO `transportations` (`id`, `city_image`, `type_id`, `city_from`, `city_to`, `egyptian_ticket`, `foreign_ticket`, `duration`, `time_slot`, `direction`) VALUES
(2, 'img02.jpg', 7, 3, 4, 500, 950, 8, '16:59:00.000000', 'https://maps.app.goo.gl/8nh5YPMSuSQvRXZS9'),
(3, 'country-01.jpg', 8, 3, 4, 800, 1400, 5, '03:08:00.000000', 'https://maps.app.goo.gl/8nh5YPMSuSQvRXZS9');

-- --------------------------------------------------------

--
-- Table structure for table `transportation_requests`
--

CREATE TABLE `transportation_requests` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `transportation_id` int(255) NOT NULL,
  `ticket_price` decimal(18,0) NOT NULL,
  `qty` int(255) NOT NULL,
  `req_date` datetime(6) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transportation_requests`
--

INSERT INTO `transportation_requests` (`id`, `user_id`, `transportation_id`, `ticket_price`, `qty`, `req_date`, `status`) VALUES
(3, 7, 2, 950, 2, '2025-04-26 21:59:04.000000', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `transportation_types`
--

CREATE TABLE `transportation_types` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transportation_types`
--

INSERT INTO `transportation_types` (`id`, `title`) VALUES
(7, 'Bus'),
(8, 'Mini Bus'),
(9, 'AirPlane'),
(10, 'Coaster');

-- --------------------------------------------------------

--
-- Table structure for table `trip_programs`
--

CREATE TABLE `trip_programs` (
  `id` int(255) NOT NULL,
  `program_title` varchar(255) NOT NULL,
  `place_id` int(255) NOT NULL,
  `guid_id` int(255) NOT NULL,
  `transportation_id` int(255) NOT NULL,
  `egyptian_ticket` decimal(18,0) NOT NULL,
  `foregin_ticket` decimal(18,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip_programs`
--

INSERT INTO `trip_programs` (`id`, `program_title`, `place_id`, `guid_id`, `transportation_id`, `egyptian_ticket`, `foregin_ticket`) VALUES
(2, 'test offer', 7, 3, 3, 500, 900),
(3, 'test 2 Offer', 6, 2, 2, 700, 1500),
(4, 'Full First Day', 12, 4, 3, 650, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `trip_programs_requests`
--

CREATE TABLE `trip_programs_requests` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `trip_id` int(255) NOT NULL,
  `ticket_price` decimal(18,0) NOT NULL,
  `qty` int(255) NOT NULL,
  `req_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip_programs_requests`
--

INSERT INTO `trip_programs_requests` (`id`, `user_id`, `trip_id`, `ticket_price`, `qty`, `req_date`, `status`) VALUES
(1, 7, 2, 500, 4, '2025-05-05', 'Pending'),
(2, 7, 3, 1500, 2, '2025-05-05', 'Pending'),
(3, 7, 3, 1500, 1, '2025-05-05', 'Pending'),
(4, 7, 3, 700, 5, '2025-05-05', 'Pending'),
(5, 9, 3, 1500, 12, '2025-05-06', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `email`, `phone`, `address`, `password`) VALUES
(6, '722d6029152671b421806cf3a8aff0e328ed03bf.jpg', 'mohamed fawzy', 'mohamed@gmail.com', '01110047023', '25 madinaty', '123'),
(7, '1918009.png', 'ahmed mohamed', 'ahmed@gmail.com', '01110047023', '25 madinaty', '123456'),
(9, 'img_681928c5799d85.46731067.jpg', 'Mostafa', 'Mostafa@gmail.com', '01110047029', 'Nasr city', '123456'),
(10, 'kskd.jpg.webp', 'khalfallah', 'kalfallaahmeed@gmail.com', '01154966657', 'nasr city', 'Sabha2001'),
(11, 'img_681cad40bb9d88.57972928.jpg', 'Nadeem Khaled', 'nadeemkhaledd@gmail.com', '01125491114', 'Hh', '123456'),
(12, 'images1.jpg', 'Nadeem', 'Nadeemkhaledd@gmail.com', '01125491114', 'nasr city', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places_requests`
--
ALTER TABLE `places_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourism_places`
--
ALTER TABLE `tourism_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_guides`
--
ALTER TABLE `tour_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_guides_requests`
--
ALTER TABLE `tour_guides_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportations`
--
ALTER TABLE `transportations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportation_requests`
--
ALTER TABLE `transportation_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportation_types`
--
ALTER TABLE `transportation_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_programs`
--
ALTER TABLE `trip_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_programs_requests`
--
ALTER TABLE `trip_programs_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `places_requests`
--
ALTER TABLE `places_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tourism_places`
--
ALTER TABLE `tourism_places`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tour_guides`
--
ALTER TABLE `tour_guides`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tour_guides_requests`
--
ALTER TABLE `tour_guides_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transportations`
--
ALTER TABLE `transportations`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transportation_requests`
--
ALTER TABLE `transportation_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transportation_types`
--
ALTER TABLE `transportation_types`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trip_programs`
--
ALTER TABLE `trip_programs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trip_programs_requests`
--
ALTER TABLE `trip_programs_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
