-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 12:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insaat`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `contents` longtext NOT NULL,
  `history` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `contents`, `history`) VALUES
(1, 'Who Are We ?', '<h2><strong>Who Are We?</strong></h2><p>Since we started our activities in 1992, we have gained a leading identity in the sector by successfully implementing many prestigious projects. As Sur Yapı, we stand out in the sector as a group of companies that carry out high quality, turnkey works starting from the project stage, including product development, architectural construction and production, as well as the production of office and shopping mall projects, site management, management of second-hand sites, rental and management of shopping mall projects. we are going out. Aiming to create the ideal conditions for life by investing in the future, we aim to add permanent value to the society we live in with every work we produce. While we continue our steady growth in the construction sector, we are also achieving success in the energy sector, which we started in 2007.</p><h3><strong>Why Are We Different?</strong></h3><p>Honesty, perfectionism, teamwork since the first day we operated. spirit, innovation, ownership, stability and submissiveness were among our most important values. We have adopted the principle of transparency towards our customers, business partners and Our Employees. We aim to achieve the best work in the shortest time, with the most ideal budget, by following the new technology. We are walking towards the future stronger with the reputation, experience, knowledge and knowledge we have gained. We not only follow all processes from the beginning of the project to the turnkey delivery, but also ensure that the homeowners from Our Projects always feel with us through our after-sales services. By keeping customer satisfaction at the forefront, we constantly develop the best ways to communicate with our customers under today\'s conditions. By combining the importance we attach to our communication with our customers with technology, we bring a new breath to the real estate industry with our iHome application. With this understanding, we work with all our strength to emphasize our brand identity and Sur Yapı reliability in Our Projects, and we build each new project with the excitement of the first day.</p><h3><strong>Our Mission</strong></h3><p>Our investment will come , our goal is people living in ideal conditions. Our mission is to develop civilization</p><p>and to add permanent values ​​to the society we live in with every work we produce.</p><h3><strong>Our Vision</strong></h3><p>The reputation, experience and knowledge we have gained. and it supports our orientation towards our ideal of accumulation. We are walking towards the future with the strength we get from the past. Because we have an ideal and we have a lot to do</p><p>to achieve the ideal.</p>', '2024-06-11 06:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(80) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_mail` varchar(255) NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `admin_mail`, `first_name`, `last_name`, `last_update`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'sahil.bytecode@gmail.com', 'Sahil', 'Bansal', '2024-06-11 08:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `contents` longtext NOT NULL,
  `yazi_image` varchar(255) NOT NULL,
  `history` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `contents`, `yazi_image`, `history`) VALUES
(14, 'Property Dealing', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>', 'images/4.jpg', '2024-06-11 07:59:47'),
(15, 'Construction', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'images/1 (1).jpg', '2024-06-11 07:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `entry_history` datetime NOT NULL,
  `exit_history` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `ip_address`, `entry_history`, `exit_history`) VALUES
(13, '::1', '2024-06-11 09:06:51', '2024-06-11 10:06:16'),
(14, '::1', '2024-06-11 10:06:46', '2024-06-11 10:06:29'),
(15, '::1', '2024-06-11 10:06:54', '2024-06-11 10:06:11'),
(16, '::1', '2024-06-11 10:06:37', '2024-06-11 11:06:09'),
(17, '::1', '2024-06-11 11:06:46', '2024-06-11 11:06:45'),
(18, '::1', '2024-06-11 11:06:36', '2024-06-11 11:06:07'),
(19, '::1', '2024-06-11 11:06:35', '2024-06-11 11:06:02'),
(20, '::1', '2024-06-11 11:06:04', '2024-06-11 11:06:18'),
(21, '::1', '2024-06-11 11:06:43', '2024-06-11 11:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL,
  `history` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `ad`, `url`, `status`, `order`, `history`) VALUES
(19, 'About Us', './about_us.php', 1, 1, '2024-06-11 08:09:12'),
(20, 'Home Page', './index.php', 1, 0, '2022-05-17 11:50:50'),
(22, 'Communication', './communication.php', 1, 3, '2024-06-11 10:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `section_1`
--

CREATE TABLE `section_1` (
  `id` int(11) NOT NULL,
  `main_title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `project_number` varchar(255) NOT NULL,
  `number_of_persons` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `contents` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `section_1`
--

INSERT INTO `section_1` (`id`, `main_title`, `sub_title`, `project_number`, `number_of_persons`, `image`, `contents`) VALUES
(1, 'We Lead the Field of Building and Construction', 'Dedicated to Delivering High Quality Construction Projects and Innovative Design !', '100', '50', 'images/1 (1).jpg', '<p>Yet those who embrace change are thriving, producing bigger, better, faster and more powerful products than ever before. You help manage crime; We can help you build your past and prepare for the future.&nbsp;</p><p>The world is changing faster than ever, Eteon constructions are threatened as technology breaks down and software changes. Quality Control System 100% Satisfaction Guarantee Highly Professional Staff Unrivaled Workmanship Accurate Testing Processes Professional and Qualified</p>');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `contents` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `image`, `contents`) VALUES
(5, 'ARCHITECTURE', 'images/appartment.png', 'As a Construction Company, we offer multiple services. Having been in the industry for a long time\nAs a result of its experiences and professionalism, it responds to all needs of the sector.\nWe try to be Support for every service we provide.…'),
(7, 'SERVICES', 'images/service-icon.png', 'As a Construction Company, we offer multiple services. Having been in the industry for a long time\nAs a result of its experiences and professionalism, it responds to all needs of the sector.\nWe try to be Support for every service we provide.…'),
(10, 'CONSULTATION', 'images/consultation.png', 'As a Construction Company, we offer multiple services. Having been in the industry for a long time As a result of its experiences and professionalism, it responds to all needs of the sector. We try to be Support for every service we provide.…');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_ad` varchar(255) NOT NULL,
  `logo_img` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `short_introduction` text NOT NULL,
  `address` text NOT NULL,
  `map_link` longtext NOT NULL,
  `header_color` varchar(255) NOT NULL,
  `footer_color` varchar(255) NOT NULL,
  `bg_color` varchar(255) NOT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL,
  `history` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_ad`, `logo_img`, `email`, `tel`, `short_introduction`, `address`, `map_link`, `header_color`, `footer_color`, `bg_color`, `opening_time`, `closing_time`, `history`) VALUES
(1, 'Bansal Properties & Construction', 'images/logo.png', 'shivbansal14@gmail.com', '+91-92177-77835', 'Experience excellence in property buying, selling, and development. Let\'s build your vision together. Contact us now!', 'Bansal Properties, Urban Estate, Phase -1, Patiala, Oppo. White House, Near Peer Baba Dargah', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d860.8318393692481!2d76.44474029879784!3d30.34164510687759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3910282347b7d7f9%3A0x4d227af32444a2ee!2sPeer%20Baba%20Di%20Dargah!5e0!3m2!1sen!2sin!4v1718091460998!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '#0e2bc5', '#0e2bc5', '#ffffff', '08:30:00', '20:30:00', '2024-06-11 09:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `explanation` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `history` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `image`, `explanation`, `status`, `history`) VALUES
(20, 'Project Management and Construction Structures', 'images/emma-houghton-EixJzIdl4bc-unsplash.jpg', 'Yet those who embrace change are thriving, producing bigger, better, faster and more powerful products than ever before. You help manage crime; We can help you build your past and prepare for the future.', 1, '2022-04-23 16:24:36'),
(26, 'Property Dealing and Consultation', 'images/mufid-majnun-cXOmuS-iKPE-unsplash.jpg', 'In property dealing, adapt to thrive. Secure your investments and plan for future growth with our innovative solutions, ensuring success today and tomorrow.', 1, '2024-06-11 10:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `ad`, `image`, `link`) VALUES
(7, 'Facebook', 'images/5296499_fb_facebook_facebook logo_icon.png', 'https://www.facebook.com/suryapi/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_1`
--
ALTER TABLE `section_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `section_1`
--
ALTER TABLE `section_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
