-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 02:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desertsafari_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `activity_type` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `featured_image` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `country_state` varchar(255) DEFAULT NULL,
  `operating_hours` varchar(255) NOT NULL,
  `instant_confirmation` varchar(255) NOT NULL,
  `mobile_voucher_accepted` varchar(255) NOT NULL,
  `non_refundable` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `transfer_options_available` varchar(255) NOT NULL,
  `google_map_link` text NOT NULL,
  `about_experience` text NOT NULL,
  `highlights` text NOT NULL,
  `tour_inclusions` text NOT NULL,
  `important_information` text NOT NULL,
  `booking_policy` text DEFAULT NULL,
  `slug` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `activity_type`, `name`, `featured_image`, `price`, `country_state`, `operating_hours`, `instant_confirmation`, `mobile_voucher_accepted`, `non_refundable`, `language`, `transfer_options_available`, `google_map_link`, `about_experience`, `highlights`, `tour_inclusions`, `important_information`, `booking_policy`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Best Vacation Packages - UAE', 'Burj Khalifa At The Top Tickets', '9If44PjjdL2mCrqDmFF6mFWlbBrMROzmvfip8mTC.jpg', '169', 'Abu Dhabi', 'Operating Hours', 'Instant Confirmation', 'Mobile Voucher Accepted', 'Free Cancellation 24 hours Prior', 'English / Arabic', 'Transfer options Available', 'https://maps.google.com/?cid=18394360053605775330', '<p>Hike the world\'s tallest building, Burj Khalifa and check out an eagle-eye view of the stunning contrast of Dubai\'s landscape from its two observation decks. Depending on your Burj Khalifa tickets, you will be granted access to one or both of them. It is only here that you can experience the fastest double-deck elevator, cruising at 10m/sec.<br><br>At The Top ticket allows you to explore the 124th without any time restraint. As you stand on the 124th floor, catch a close up view of the city through its advanced, high powered telescope.<br><br>Level 125 is dedicated to Arab arts and culture — you can dive into the state-of-the-art exhibits and uncover fascinating tales. Remain in awe when you step out onto the most spacious deck of Burj Khalifa whose decoration is inspired by Arabian Mashrabiya. Perched at a height of 452 metres, this exhilarating public observation terrace is the perfect place to enjoy the vibrant cityscape. Find your jaws hanging when you feel the glass-floor crack underneath your feet — this unusual animation is created through interactive audio and virtual sensors. The special effect of green screen photography and the virtual reality experience will add a dash of thrill to your journey.<br><br>At The Top Sky ticket includes entry to both the vantage points (124th+125th+148th) and provides an uninterrupted, all-in-one tour. Hop on to the exclusive SKY elevator — once the doors open to the 148th floor, at a staggering 555m, you will watch the unbelievable 360-degree views of the world below through the floor-to-ceiling glass.<br><br>Choose the timeslot that coincides with sunset — as the sun goes back in its nest and Dubai\'s light comes to life; feast your eyes on some magical vistas. A Guest Ambassador will guide you throughout the trip making it more seamless and convenient.<br><br>Book the Burj Khalifa tour tickets in advance to skip the long lines and save time. Get a deluxe experience with our best prices. Our Burj Khalifa entry ticket options also include preferences, time slots, and combo tours.<br></p>', '<p>    It’s the best way to take in the world’s tallest building up close.   <br>    Select from convenient ticket options.<br>    Standard ticket offers to the At the Top Observation Deck at 124th floor and 125th floors. <br>    Choose Sky Tickets to enjoy access to all of its observation decks including the world’s highest observation deck at 148th level. <br>    Watch a multimedia presentation that journeys back to Dubai’s quaint past and also lets you experience this massive structure’s diverse construction phases. <br>    Take in the swiftest ever elevator ride as you get transported to the observation deck in less than a minute. <br>    Scope out through the floor-to-ceiling glass windows to enjoy panoramic views over Dubai’s skyline, desert and ocean. <br>    Zoom in the cutting-edge telescopes for a closer view of Dubai landmarks.  <br>    Chance to step out to its outdoor terrace (only if weather permits) to relish unparalleled sights from a stunning viewpoint. <br>    Enjoy Guest Ambassador’s services, along with access to SKY lounge (but this is only applicable for Sky tickets). <br><br>With your <br><font color=\"#efc631\">Burj Khalifa Sky tickets</font><br>, you will be able to gain convenient access to the deck. For a more wholesome experience, you can book the combo of<br><font color=\"#efc631\">Burj Khalifa and Aquarium Tickets</font><br> .For brand-new experiences, sign up for the Museum of the Future tour or get your tickets to Ain Dubai,<br><font color=\"#efc631\">Infinity Des Lumières</font><br>and the View at the Palm, among others. <br></p>', '<p>    Entrance Ticket to Observation Deck<br>    30 Minutes view from the Observation Deck<br>    Transfers (if selected)<br><br><b>For Levels 148 + 125 + 124 :</b><br><br>    Enjoy a personalized tour, guided by a Guest Ambassador.<br>    Step out onto the world’s highest observation deck with an outdoor terrace at 555 meters.<br>    Refresh yourself with signature refreshments at SKY lounge.<br>    Explore Dubai’s most famous landmarks with a unique interactive experience, using motion senses.<br>    Continue your journey to levels 125 and 124.<br><br><b>For Levels 125 +124 :</b><br><br>    Be thrilled by the world’s fastest double deck elevators, cruising at 10 m/s.<br>    Take a closer look at the world below through avant-garde, high powered, telescopes.<br>    Level 125 offers a spacious deck tastefully decorated in Arabic mashrabiya for stunning 360-degree views.<br>    Set off on a virtual reality experience to the pinnacle of Burj Khalifa.<br><br><b>Note : Please check Option wise inclusions for every product before booking</b><br></p>', '<p>    A valid photo ID or passport must be displayed at the entrance.<br>    The booking confirmation is only valid for the selected date and time.<br>    Transfers (if selected) will be provided.<br>    There will be no refund for unused or partially used services.<br>    Children must be accompanied by an adult at all times.<br>    The service provider is not responsible if any component of an attraction is non-operational due to technical reasons.<br>    Guests are prohibited from bringing outside food and drinks.<br>    Shared transfers are only provided from centrally located hotels and residences in Dubai city (Deira, Bur Dubai, Sheikh Zayed, Marina).<br></p>', '332', 'burj-khalifa-at-the-top-tickets', 1, '2023-06-22 06:21:57', '2023-08-23 21:05:20'),
(12, 'Combo package', 'Darius Jensen', 'SWdb2R8anBem1qW7k27WCc7d3VdreYY0CEPBYJPt.jpg', '500', 'Sharjah', 'Keegan Henderson', 'Keegan Henderson', 'Myra Cruz', 'Ulric Cote', 'Molly Hurley', 'Amos Baird', 'Cairo Swanson', 'sadsasad', 'assadsad', 'sadsasa', 'assasasasa', '123', 'darius-jensen', 1, '2023-08-12 10:37:12', '2023-08-23 21:05:17'),
(13, 'Tours', 'Hannah Perez', 'SWdb2R8anBem1qW7k27WCc7d3VdreYY0CEPBYJPt.jpg', '500', 'Sharjah', 'Thane Sanford', 'Thane Sanford', 'Elaine Barr', 'Xander Lindsey', 'Garrett Sherman', 'Edward Bowers', 'Adria Livingston', 'asdsasadsasa', 'asdsasadsasa', 'asdsasadsasa', 'asdsasadsasa', '123', 'hannah-perez', 1, '2023-08-12 11:02:33', '2023-08-23 21:05:11'),
(14, 'Adventure Tours & Activities', 'Vanna Watson', 'QBF4eHUnqBTlWqlLIR9Jad1iMg52Tduy4yvJwbd7.jpg', '800', 'Abu Dhabi', 'Sacha Irwin', 'Sacha Irwin', 'Rachel Cortez', 'Virginia Lopez', 'Hope Welch', 'Ginger Mullins', 'Ria Foreman', 'sadsadsad', 'sadsadsad', 'sadsadsad', 'sadsadsad', '21321321132', 'vanna-watson', 1, '2023-08-17 14:58:11', '2023-08-23 21:04:52'),
(17, 'Best Selling Activities - Dubai', 'Maggy Oliver', 'Sfe6P2PSvNv476so0gMOhtJ3GRrB47xSZbMY2Uol.jpg', '5000', 'Ajman', 'Ignatius Mcguire', 'Ignatius Mcguire', 'Laurel Mcgowan', 'Wyoming Caldwell', 'Aurora Wheeler', 'Kessie Shaw', 'Martina Vang', '<p>asdvehicle_id</p><p><br></p><p></p>', '<p>asdvehicle_id</p><p><br></p><p></p>', '<p>asdvehicle_id</p><p><br></p><p></p>', '<p>asdvehicle_id</p><p></p>', '<p>asdvehicle_id</p><p></p>', 'maggy-oliver', 1, '2023-08-24 11:47:17', '2023-08-24 15:41:22'),
(18, 'Best Selling Activities - Dubai', 'Yuli Rice', 'rQTvfoIT61ewoFkyNLwrstbRekFjBQJ6UwMspNCp.jpg', '500', 'Ajman', 'Vivien Bonner', 'Vivien Bonner', 'Nicole Buckley', 'Amela Lamb', 'Daniel Vance', 'Gabriel Mcleod', 'Ivor Jenkins', 'asdsadsd', 'asdsadsd', 'asdsadsd', 'asdsadsd', 'asdsadsd', 'yuli-rice', 1, '2023-08-24 15:07:29', '2023-08-24 15:40:36'),
(20, 'Tours', 'Theodore Leonard', 'BPY4BDV5oOEcGz8Okc1TPoLbUYgc3z7mAdUweMkn.jpg', '6000', 'Abu Dhabi', 'Quintessa Bowman', 'Quintessa Bowman', 'Lewis Eaton', 'Flynn Gibbs', 'Jordan Cotton', 'Miranda Mclaughlin', 'Kaseem Haley', 'sadsasadas', 'sadsasadas', 'sadsasadas', 'sadsasadas', 'sadsasadas', 'theodore-leonard', 1, '2023-08-24 15:37:31', '2023-08-24 15:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `activity_gallery_images`
--

CREATE TABLE `activity_gallery_images` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_gallery_images`
--

INSERT INTO `activity_gallery_images` (`id`, `activity_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 14, '9If44PjjdL2mCrqDmFF6mFWlbBrMROzmvfip8mTC.jpg', '2023-08-24 16:32:11', '2023-08-24 16:32:11'),
(2, 14, 'QBF4eHUnqBTlWqlLIR9Jad1iMg52Tduy4yvJwbd7.jpg', '2023-08-24 16:32:11', '2023-08-24 16:32:11'),
(3, 14, 'SWdb2R8anBem1qW7k27WCc7d3VdreYY0CEPBYJPt.jpg', '2023-08-24 16:32:11', '2023-08-24 16:33:39'),
(21, 12, 'B732NU1PIh0QaOil2eYkWIhYXId32ZyeGBlWcDWc.jpg', '2023-08-24 15:27:38', '2023-08-24 15:27:38'),
(22, 12, 'DYooJRHMDWqnW9NHBiOEnaLrncBkummGnj3H68tl.jpg', '2023-08-24 15:27:38', '2023-08-24 15:27:38'),
(23, 12, 'kGlCKynhUAZeHl7ALJz6vVYVgLRXgLoi1DEwh9CG.jpg', '2023-08-24 15:27:39', '2023-08-24 15:27:39'),
(24, 12, 'ZSzo2Q7KU4Et8fuFWlfDoo2KbUOP7tM7T1SBxUWK.jpg', '2023-08-24 15:27:39', '2023-08-24 15:27:39'),
(31, 20, 'A0SZf5cp6xKxh3pxr1HGHmtMRZ1t2B3isMgKuEOV.jpg', '2023-08-24 15:37:31', '2023-08-24 15:37:31'),
(32, 20, 'xefFWWbOPfzT9ls0JoJ2dMVnH3wiqeCQ4a3d1ALu.jpg', '2023-08-24 15:37:31', '2023-08-24 15:37:31'),
(33, 20, 'epFl2znSiznORRzlmyz4lvSByyoU3xJ9iceIEkeU.jpg', '2023-08-24 15:37:31', '2023-08-24 15:37:31'),
(34, 20, '9seILNFVam2aoxDq38ETlEXN57ibzmbEWIDEOITa.jpg', '2023-08-24 15:37:31', '2023-08-24 15:37:31'),
(35, 18, 'cWqj3XLpIrBxzEPrKDSGsaCc22Ct4yN7nQ8cnmOV.jpg', '2023-08-24 15:40:36', '2023-08-24 15:40:36'),
(36, 18, 'DeNXSwRBDYwu7e0QCeQL26wVdubgMNazheHpGQa9.jpg', '2023-08-24 15:40:36', '2023-08-24 15:40:36'),
(37, 18, 'y2PqvpYSLGvytpiCfFmJabVOrMBaYL8SEy7covHy.jpg', '2023-08-24 15:40:36', '2023-08-24 15:40:36'),
(38, 18, 'Ao5aAnoFhDh3rBXR16lFam8tep7ZrZeLAIKLjzmy.jpg', '2023-08-24 15:40:36', '2023-08-24 15:40:36'),
(39, 17, 'EVJ6lyNT9yTpB52bB7Iu21J2IyXTHa4yAtJ4NkrS.jpg', '2023-08-24 15:41:22', '2023-08-24 15:41:22'),
(40, 17, 'GkAszFTQVBav3rVYOA3GSbj2b5C5lzff649hJ0Id.jpg', '2023-08-24 15:41:22', '2023-08-24 15:41:22'),
(41, 17, 'ktvtKYDa1Xgsr2dzW3dcetFclgUJv9TUGAc8gdx0.jpg', '2023-08-24 15:41:22', '2023-08-24 15:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `activity_price`
--

CREATE TABLE `activity_price` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `without_transfer_option_price` varchar(255) DEFAULT '0',
  `sharing_transfer_option_price` varchar(255) DEFAULT '0',
  `private_transfer_option_price` varchar(255) DEFAULT '0',
  `tour_date` varchar(255) NOT NULL,
  `adult_price` varchar(255) DEFAULT NULL,
  `adult_price_st` varchar(255) DEFAULT NULL,
  `adult_price_pt` varchar(255) DEFAULT NULL,
  `child_price` varchar(255) DEFAULT NULL,
  `child_price_st` varchar(255) DEFAULT NULL,
  `child_price_pt` varchar(255) DEFAULT NULL,
  `infant_price` varchar(255) DEFAULT NULL,
  `infant_price_st` varchar(25) DEFAULT NULL,
  `infant_price_pt` varchar(255) DEFAULT NULL,
  `cancellation_policy` text DEFAULT NULL,
  `child_policy` text DEFAULT NULL,
  `inclusions` text DEFAULT NULL,
  `without_pickup_timings` text DEFAULT NULL,
  `sharing_pickup_timings` text DEFAULT NULL,
  `private_pickup_timings` text DEFAULT NULL,
  `without_duration_approx` text DEFAULT NULL,
  `sharing_duration_approx` text DEFAULT NULL,
  `private_duration_approx` text DEFAULT NULL,
  `exclusion` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_price`
--

INSERT INTO `activity_price` (`id`, `activity_id`, `activity_name`, `without_transfer_option_price`, `sharing_transfer_option_price`, `private_transfer_option_price`, `tour_date`, `adult_price`, `adult_price_st`, `adult_price_pt`, `child_price`, `child_price_st`, `child_price_pt`, `infant_price`, `infant_price_st`, `infant_price_pt`, `cancellation_policy`, `child_policy`, `inclusions`, `without_pickup_timings`, `sharing_pickup_timings`, `private_pickup_timings`, `without_duration_approx`, `sharing_duration_approx`, `private_duration_approx`, `exclusion`, `created_at`, `updated_at`) VALUES
(2, 3, '124th + 125th Floor Non-Prime Hours Ticket', '1', '1', '1', '2023-06-30', '178', NULL, NULL, '148', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-22 06:21:57', '2023-08-29 16:32:39'),
(3, 3, '124th + 125th Floor Prime Hours Ticket', '1', '1', '1', '2023-06-30', '249', NULL, NULL, '157', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-22 06:21:57', '2023-08-12 10:20:35'),
(4, 3, '124th Floor with Dubai Aquarium Non-Prime Hours Ticket', '1', '0', '0', '2023-06-30', '250', NULL, NULL, '206', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-22 06:21:57', '2023-08-12 16:28:44'),
(5, 3, '148th + 124th + 125th  Floor Non-Prime Hours Ticket', '1', '0', '0', '2023-06-30', '404', NULL, NULL, '395', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-22 06:21:57', '2023-08-12 16:28:46'),
(6, 3, '148th + 124th + 125th Floor Prime Hours Ticket', '1', '0', '0', '2023-06-30', '553', NULL, NULL, '544', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-22 06:21:57', '2023-08-12 10:19:09'),
(7, 3, 'Burj Khalifa At the Top & Sky Views Ticket', '1', '0', '0', '2023-06-30', '20', NULL, NULL, '1', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-22 06:21:57', '2023-08-12 16:28:48'),
(12, 12, 'Gavin Reyes', '1', '1', '0', '1987-08-16', '500', '500', '500', '500', '500', '500', '500', '500', '500', 'asdbhbhbhbhbh, sadddddddddd', 'asdbhbhbhbhbh, sadddddddddd', 'asdbhbhbhbhbh, sadddddddddd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asdbhbhbhbhbh, sadddddddddd', '2023-08-12 10:37:12', '2023-08-24 15:27:38'),
(13, 13, 'Shea Carson', '1', '0', '0', '2003-08-25', '500', '500', '500', '500', '500', '500', '500', '500', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-12 11:02:33', '2023-08-12 11:02:33'),
(16, 14, 'Giacomo Stanton', '1', '1', '1', '1982-05-16', '800', '700', '600', '810', '710', '610', '820', '720', '620', 'In case Tours or Tickets cancelled after Booking 100 % charges will be applicable.', 'Children below 1.2 metres height & below 7 years will be considered as child and charged child rate.,     Children below 1.2 metres height & below 7 years will be considered as child and charged child rate.', 'Hotel transfers (If option selected), Access to Lost Chambers, Thrilling water slides and attractions for all ages., Relaxing lazy river for floating on inflatable tubes., Wave pool for experiencing artificial waves., Aqua play area for younger children with interactive features., Rapids and rivers for an adventurous rafting experience., One day access to lost chamber aquarium, Restrooms and showers available.', NULL, 'Pick up around 10:00 AM Drop off around 6:30 PM', 'Pick up around 10 am (Recommended)', NULL, '07:00 hours', '06:00 hours', 'Hotel transfers (If option selected), Access to Lost Chambers, Thrilling water slides and attractions for all ages., Relaxing lazy river for floating on inflatable tubes., Wave pool for experiencing artificial waves., Aqua play area for younger children with interactive features., Rapids and rivers for an adventurous rafting experience., One day access to lost chamber aquarium, Restrooms and showers available.', '2023-08-17 14:58:11', '2023-08-24 15:10:26'),
(17, 14, 'Baker Manning', '1', '1', '0', '1995-10-13', '500', '600', '700', '510', '610', '710', '520', '620', NULL, '1', '5058780, 5', '505050', 'Activity Starting Time is 10:00 am', 'Pick up around 10:00 AM Drop off around 5:30 PM', NULL, '05:00 hours', '07:00 hours', NULL, '50', '2023-08-17 14:58:11', '2023-08-24 15:52:29'),
(20, 17, 'Deacon Morales', '1', '0', '0', '1989-03-01', '500', '500', '500', '500', '500', '500', '500', '500', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-24 11:47:18', '2023-08-29 16:32:35'),
(21, 18, 'Jared Hoffman', '1', '1', '1', '2005-11-22', '500', '500', '500', '500', '500', '500', '500', '500', '500', 'Consequuntur quibusd, Et explicabo Et des, Et explicabo Et des', 'Eos molestias eos, Et explicabo Et des, Et explicabo Et des', 'Et explicabo Et des, Et explicabo Et des, Et explicabo Et des', 'Cally Cummings', 'Cherokee Booker', 'Eagan York', 'Shea Ingram', 'Olivia Mack', 'Chastity Shepard', 'Numquam lorem vel si, Et explicabo Et des, Et explicabo Et des', '2023-08-24 15:07:29', '2023-08-24 15:09:26'),
(23, 20, 'Garrison Dorsey', '1', '1', '1', '2022-09-04', '6000', '6000', '6000', '6000', '6000', '6000', '6000', '6000', '6000', 'Quibusdam quia conse, Quibusdam quia conse, Quibusdam quia conse, Quibusdam quia conse', 'Velit ut esse quis, Quibusdam quia conse, Quibusdam quia conse', 'Rerum anim consequat, Quibusdam quia conse, Quibusdam quia conse, Quibusdam quia conse, Quibusdam quia conse', 'Jordan Reilly', 'James Dotson', 'Madeline Santana', 'Harlan Black', 'Freya Carter', 'Chelsea Davenport', 'Qui ducimus dolor v, Quibusdam quia conse, Quibusdam quia conse, Quibusdam quia conse, Quibusdam quia conse', '2023-08-24 15:37:31', '2023-08-24 15:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `by` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `meta_description` text NOT NULL,
  `keywords` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `name`, `by`, `slug`, `date`, `description`, `status`, `meta_description`, `keywords`, `meta_title`, `created_at`, `updated_at`) VALUES
(13, 'Y5naGKbYiM6HXWYGONOzw8CI8nIMspupkjB6HEoo.jpg', 'Welcome Christmas in Style: Fashion Rerun’s Sweater Outfit Ideas', 'Fashion Redisplay', 'welcome-christmas-in-style-fashion-rerun-s-sweater-outfit-ideas', '2023-01-26', '<h3>Welcome Christmas in Style: Fashion Rerun’s Sweater Outfit Ideas</h3>\r\n\r\n                                <p>Quuntur magni dolores eos qui ratione\r\n voluptatem sequi nesciunt. Neque porro quia non numquam eius modi \r\ntempora incidunt ut labore et dolore magnam dolor sit amet, consectetur \r\nadipisicing.</p>\r\n\r\n                                <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore\r\n et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\nexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in  sed quia non numquam eius \r\nmodi tempora incidunt ut labore et dolore magnam aliquam quaerat \r\nvoluptatem.</p>\r\n\r\n                               \r\n\r\n                                <p>Quuntur magni dolores eos qui ratione\r\n voluptatem sequi nesciunt. Neque porro quia non numquam eius modi \r\ntempora incidunt ut labore et dolore magnam dolor sit amet, consectetur \r\nadipisicing.</p>\r\n\r\n                                <h3>Setting the mood with incense</h3>\r\n                                <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore\r\n et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\nexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in  sed quia non numquam eius \r\nmodi tempora incidunt ut labore et dolore magnam aliquam quaerat \r\nvoluptatem.</p>\r\n\r\n                                <h3>The rise of marketing and why you need it</h3>\r\n                                <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore\r\n et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>', 1, 'Welcome Christmas in Style: Fashion Rerun’s Sweater Outfit Ideas', 'Welcome Christmas in Style: Fashion Rerun’s Sweater Outfit Ideas', 'Welcome Christmas in Style: Fashion Rerun’s Sweater Outfit Ideas', '2022-06-06 03:35:53', '2023-01-26 05:09:18'),
(15, 'CSt47UsH3NH3vpWzj047dwiTUoP9ZCnHeVBb5YsZ.jpg', 'Being Stylish, Being You: Easy Ways to Upgrade Your Denim Game', 'Fashion Redisplay', 'being-stylish-being-you-easy-ways-to-upgrade-your-denim-game', '2023-01-26', '<h3>Welcome Christmas in Style: Fashion Rerun’s Sweater Outfit Ideas</h3>\r\n\r\n                                <p>Quuntur magni dolores eos qui ratione\r\n voluptatem sequi nesciunt. Neque porro quia non numquam eius modi \r\ntempora incidunt ut labore et dolore magnam dolor sit amet, consectetur \r\nadipisicing.</p>\r\n\r\n                                <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore\r\n et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\nexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in  sed quia non numquam eius \r\nmodi tempora incidunt ut labore et dolore magnam aliquam quaerat \r\nvoluptatem.</p>\r\n\r\n                               \r\n\r\n                                <p>Quuntur magni dolores eos qui ratione\r\n voluptatem sequi nesciunt. Neque porro quia non numquam eius modi \r\ntempora incidunt ut labore et dolore magnam dolor sit amet, consectetur \r\nadipisicing.</p>\r\n\r\n                                <h3>Setting the mood with incense</h3>\r\n                                <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore\r\n et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\nexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in  sed quia non numquam eius \r\nmodi tempora incidunt ut labore et dolore magnam aliquam quaerat \r\nvoluptatem.</p>\r\n\r\n                                <h3>The rise of marketing and why you need it</h3>\r\n                                <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore\r\n et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>', 1, 'Being Stylish, Being You: Easy Ways to Upgrade Your Denim Game', 'Being Stylish, Being You: Easy Ways to Upgrade Your Denim Game', 'Being Stylish, Being You: Easy Ways to Upgrade Your Denim Game', '2022-06-13 19:56:51', '2023-01-26 05:08:25'),
(16, '49aCMeqRXmGNDHmrDh45iUM7YBm1pbOw16FCdUSn.jpg', 'Welcome Christmas in Style: Fashion Rerun’s Sweater Outfit Ideas', 'Fashion Redisplay', 'welcome-christmas-in-style-fashion-rerun-s-sweater-outfit-ideas', '2023-01-26', '<h3>Welcome Christmas in Style: Fashion Rerun’s Sweater Outfit Ideas</h3>\r\n\r\n                                <p>Quuntur magni dolores eos qui ratione\r\n voluptatem sequi nesciunt. Neque porro quia non numquam eius modi \r\ntempora incidunt ut labore et dolore magnam dolor sit amet, consectetur \r\nadipisicing.</p>\r\n\r\n                                <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore\r\n et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\nexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in  sed quia non numquam eius \r\nmodi tempora incidunt ut labore et dolore magnam aliquam quaerat \r\nvoluptatem.</p>\r\n\r\n                               \r\n\r\n                                <p>Quuntur magni dolores eos qui ratione\r\n voluptatem sequi nesciunt. Neque porro quia non numquam eius modi \r\ntempora incidunt ut labore et dolore magnam dolor sit amet, consectetur \r\nadipisicing.</p>\r\n\r\n                                <h3>Setting the mood with incense</h3>\r\n                                <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore\r\n et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\nexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in  sed quia non numquam eius \r\nmodi tempora incidunt ut labore et dolore magnam aliquam quaerat \r\nvoluptatem.</p>\r\n\r\n                                <h3>The rise of marketing and why you need it</h3>\r\n                                <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore\r\n et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>', 1, 'Welcome Christmas in Style: Fashion Rerun’s Sweater Outfit Ideas', 'Welcome Christmas in Style: Fashion Rerun’s Sweater Outfit Ideas', 'Welcome Christmas in Style: Fashion Rerun’s Sweater Outfit Ideas', '2022-06-13 19:58:03', '2023-01-26 04:57:54'),
(17, 'Zh7PjDFrv9uf1BzbVq19DLeOsAktm4nDNxvyEtiD.png', 'sda', 'Fashion Redisplay', 'sda', '2023-05-31', '<p>asd<br></p>', 1, 'asd', 'sda', 'asd', '2023-05-31 01:36:48', '2023-05-31 01:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `visa_id` int(11) DEFAULT NULL,
  `product` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `activity_packages` text DEFAULT NULL,
  `activity_transfer` text DEFAULT NULL,
  `activity_travel_date` text DEFAULT NULL,
  `activity_adult_price` text DEFAULT NULL,
  `activity_child_price` text DEFAULT NULL,
  `activity_infant_price` text DEFAULT NULL,
  `activity_total_amount` text DEFAULT NULL,
  `visa_packages` text DEFAULT NULL,
  `visa_processing_type` text DEFAULT NULL,
  `visa_number` text DEFAULT NULL,
  `visa_travel_date` text DEFAULT NULL,
  `visa_total_amount` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`) VALUES
(20, 'Test2', '3444854553', 'test@test.com', 'Test2 3:58 31-1-2023', '2023-01-31 05:59:00', '2023-01-31 05:59:00'),
(21, 'Huzaifa1', '03444', 'mrhuzaifa29@gmail.com', 'sasdaasd', '2023-03-08 02:01:43', '2023-03-08 02:01:43'),
(22, 'Huzaifadsa123asdsda', '03444', 'admin@admin.com', 'sdasadsda asd dsasd das', '2023-03-08 03:21:57', '2023-03-08 03:21:57'),
(23, 'Huzaifa', '+923444854553', 'mrhuzaifa29@gmail.com', 'sadsad', '2023-05-31 06:55:03', '2023-05-31 06:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupon`
--

CREATE TABLE `discount_coupon` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `coupon_price` int(11) DEFAULT NULL,
  `minimum_amount` int(11) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `modify_date_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount_coupon`
--

INSERT INTO `discount_coupon` (`id`, `coupon_code`, `discount`, `coupon_price`, `minimum_amount`, `start_date`, `end_date`, `start_time`, `end_time`, `modify_date_time`, `created_at`, `updated_at`) VALUES
(1, 'abc', 'price', 2000, 9000, '2023-07-28', '2023-09-01', '00:00:00', '12:59:00', '2023-09-30 14:35:00', '2023-09-04 05:45:35', '2023-09-04 05:45:35'),
(2, 'cde', 'price', 10, NULL, '', '', '00:00:00', '00:00:00', '2023-09-30 14:35:00', '2023-09-04 05:45:39', '2023-09-04 05:45:39'),
(6, '123', 'percentage', 20, 9000, '2023-07-27', '2023-08-16', '03:46:00', '14:10:00', '2023-09-30 14:35:00', '2023-09-04 05:45:47', '2023-09-04 05:45:47'),
(7, '2023', 'percentage', 10, NULL, '2023-07-16', '2023-08-30', '14:35:00', '14:35:00', '2023-09-30 14:35:00', '2023-09-04 05:46:04', '2023-09-04 05:46:04'),
(8, '14aug', 'percentage', 15, NULL, '2023-08-10', '2023-08-17', '13:38:00', '13:42:00', '2023-09-30 14:35:00', '2023-09-04 05:46:08', '2023-09-04 05:46:08'),
(9, '511', 'price', 915, NULL, '2010-10-04', '2023-07-31', '04:17:00', '14:06:00', '2023-08-31 14:06:00', '2023-08-29 16:28:51', '2023-08-29 16:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_product`
--

CREATE TABLE `enquiry_product` (
  `id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_link` text NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry_product`
--

INSERT INTO `enquiry_product` (`id`, `product_name`, `product_link`, `fname`, `lname`, `email`, `country`, `number`, `subject`, `created_at`, `updated_at`) VALUES
(1, 'Australia Visa', 'http://127.0.0.1:8000/australia-visa', 'Huzaifa', 'Khan', 'mrhuzaifa29@gmail.com', 'Pakistan', '+923444854553', 'Heloo Teast', '2023-05-31 07:07:35', '2023-05-31 07:07:35'),
(2, 'Australia Visa', 'http://127.0.0.1:8000/australia-visa', 'Huzaifa', 'Khan', 'mrhuzaifa29@gmail.com', 'Pakistan', '03444854553', 'asdsad', '2023-05-31 07:08:57', '2023-05-31 07:08:57'),
(3, 'Australia Visa', 'http://127.0.0.1:8000/australia-visa', 'Huzaifa', 'Khan', 'mrhuzaifa29@gmail.com', 'Pakistan', '03444854553', 'asdsad', '2023-05-31 07:11:34', '2023-05-31 07:11:34'),
(4, 'Australia Visa', 'http://127.0.0.1:8000/australia-visa', 'Huzaifa', 'Khan', 'mrhuzaifa29@gmail.com', 'Pakistan', '03444854553', 'sdaasd', '2023-05-31 07:12:59', '2023-05-31 07:12:59'),
(5, 'Australia Visa', 'http://127.0.0.1:8000/australia-visa', 'Huzaifa', 'Khan', 'mrhuzaifa29@gmail.com', 'Saudi Arabia', '+923444854553', 'Teee', '2023-06-01 03:22:20', '2023-06-01 03:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `route` varchar(255) NOT NULL,
  `status` tinyint(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `meta_title`, `keywords`, `meta_description`, `route`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 'Desert Safari', 'Desert Safari', 'Desert Safari', 'home', 1, '2022-06-03 06:37:28', '2022-06-03 06:37:28'),
(2, 'Activity', 'activity', 'Activity | Desert Safari', 'Desert Safari', 'Desert Safari', 'product', 1, '2022-06-03 06:55:33', '2022-06-03 06:55:33'),
(3, 'Visa', 'visa', 'Visa | Desert Safari', 'Desert Safari', 'Desert Safari', 'visa', 1, '2022-06-03 06:55:33', '2022-06-03 06:55:33'),
(4, 'Cart', 'cart', 'Shopping Cart | Desert Safari', 'Desert Safari', 'Desert Safari', 'cart', 1, '2022-06-03 07:00:01', '2022-06-03 07:00:01'),
(5, 'Packages', 'packages', 'Packages | Desert Safari', 'Desert Safari', 'Desert Safari', 'packages', 1, '2022-06-03 07:00:01', '2022-06-03 07:00:01'),
(6, 'Tours', 'tours', 'Tours | Desert Safari', 'Desert Safari', 'Desert Safari', 'tours', 1, '2022-06-03 07:02:34', '2022-06-03 07:02:34'),
(7, 'Blog', 'blog', 'Blog | Desert Safari', 'Desert Safari', 'Desert Safari', 'blog', 1, '2022-06-03 07:02:34', '2022-06-03 07:02:34'),
(8, 'Contact Us', 'contact-us', 'Contact Us | Desert Safari', 'Desert Safari', 'Desert Safari', 'contact', 1, '2022-06-03 07:03:37', '2022-06-03 07:03:37'),
(9, 'Checkout', 'checkout', 'Checkout | Desert Safari', 'Desert Safari', 'Desert Safari', 'checkout', 1, '2022-06-13 13:19:32', '2022-06-13 20:26:51'),
(10, 'About Us', 'about-us', 'About Us | Desert Safari', 'Desert Safari', 'Desert Safari', 'about-us', 1, '2023-01-31 11:28:04', '2023-01-31 11:28:04'),
(11, 'Customer Service', 'customer-service', 'Customer Service | Desert Safari', 'Desert Safari', 'Desert Safari', 'customer-service', 1, '2023-01-31 11:28:04', '2023-01-31 11:28:04'),
(12, 'Faqs', 'faqs', 'Faqs | Desert Safari', 'Desert Safari', 'Desert Safari', 'faqs', 1, '2023-01-31 11:28:04', '2023-01-31 11:28:04'),
(13, 'Track Order', 'track-order', 'Track Order | Desert Safari', 'Desert Safari', 'Desert Safari', 'track-order', 1, '2023-01-31 11:28:04', '2023-01-31 11:28:04'),
(14, 'Feedback', 'feedback', 'Feedback | Desert Safari', 'Desert Safari', 'Desert Safari', 'feedback', 1, '2023-01-31 11:28:04', '2023-01-31 11:28:04'),
(15, 'Profile', 'profile', 'Profile | Desert Safari', 'Desert Safari', 'Desert Safari', 'user.edit', 1, '2023-03-16 13:01:40', '2023-03-16 13:01:40'),
(16, 'Order List', 'order_list', 'Order List | Desert Safari', 'Desert Safari', 'Desert Safari', 'order_list', 1, '2023-03-16 13:04:28', '2023-03-16 13:04:28'),
(17, 'Wish List', 'wishlist', 'Wish List | Desert Safari', 'Desert Safari', 'Desert Safari', 'wishlist', 1, '2023-03-16 13:04:28', '2023-03-16 13:04:28'),
(18, 'CEO Message', 'ceo', 'CEO Message | Desert Safari', 'Desert Safari', 'Desert Safari', 'ceo', 1, '2023-03-16 13:04:28', '2023-03-16 13:04:28'),
(19, 'Cookie Policy', 'cookie-policy', 'Cookie Policy | Desert Safari', 'Desert Safari', 'Desert Safari', 'cookie_policy', 1, '2023-09-01 15:57:03', '2023-09-01 15:57:03'),
(20, 'Privacy Policy', 'privacy-policy', 'Privacy Policy | Desert Safari', 'Desert Safari', 'Desert Safari', 'privacy_policy', 1, '2023-09-01 16:00:16', '2023-09-01 16:00:16'),
(21, 'Term Condition', 'term-condition', 'Term Condition | Desert Safari', 'Desert Safari', 'Desert Safari', 'term_condition', 1, '2023-09-01 16:00:16', '2023-09-01 16:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2014_10_12_100000_create_password_resets_table', 1),
(35, '2019_08_19_000000_create_failed_jobs_table', 1),
(36, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(37, '2023_01_09_073558_create_products_table', 1),
(38, '2023_01_09_073617_create_carts_table', 1),
(39, '2023_01_09_075134_create_brands_table', 1),
(40, '2023_01_31_104850_create_contacts_table', 2),
(41, '2023_03_17_073201_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('3966fa70-ff69-4dcf-a952-41ea85f5d9a9', 'App\\Notifications\\PurchaseNotification', 'App\\Models\\User', 2, '{\"repliedTime\":\"2023-07-13T21:57:35.539054Z\"}', NULL, '2023-07-13 16:57:35', '2023-07-13 16:57:35'),
('3bf186ae-62e5-44ca-a269-bb0e606c4e3f', 'App\\Notifications\\PurchaseNotification', 'App\\Models\\User', 2, '{\"repliedTime\":\"2023-07-17T11:30:13.627619Z\"}', NULL, '2023-07-17 06:30:13', '2023-07-17 06:30:13'),
('70f72b16-e458-42f5-a7f7-16485dd0af7f', 'App\\Notifications\\PurchaseNotification', 'App\\Models\\User', 2, '{\"repliedTime\":\"2023-07-14T08:10:44.172974Z\"}', NULL, '2023-07-14 03:10:44', '2023-07-14 03:10:44'),
('7ec5ebdd-3090-4438-970f-ad1c590a46d7', 'App\\Notifications\\PurchaseNotification', 'App\\Models\\User', 2, '{\"repliedTime\":\"2023-07-14T07:51:09.288416Z\"}', NULL, '2023-07-14 02:51:09', '2023-07-14 02:51:09'),
('87fc7604-8904-4338-8abd-df3cdb9753ab', 'App\\Notifications\\PurchaseNotification', 'App\\Models\\User', 2, '{\"repliedTime\":\"2023-07-14T08:06:52.556273Z\"}', NULL, '2023-07-14 03:06:52', '2023-07-14 03:06:52'),
('975eb974-a278-41af-b29a-562c194bf392', 'App\\Notifications\\PurchaseNotification', 'App\\Models\\total_users', 2, '{\"repliedTime\":\"2023-03-17T07:52:09.718955Z\"}', NULL, '2023-03-17 02:52:09', '2023-03-17 02:52:09'),
('9c85f89e-9b3d-492e-82ee-52599e1b50d5', 'App\\Notifications\\PurchaseNotification', 'App\\Models\\User', 2, '{\"repliedTime\":\"2023-07-14T08:17:20.545004Z\"}', NULL, '2023-07-14 03:17:20', '2023-07-14 03:17:20'),
('e44eaf2c-7c43-4933-90b9-29fbab73df32', 'App\\Notifications\\PurchaseNotification', 'App\\Models\\User', 2, '{\"repliedTime\":\"2023-03-17T07:41:44.503522Z\"}', NULL, '2023-03-17 02:41:44', '2023-03-17 02:41:44'),
('e6379c47-fac9-4b8d-8a33-6b4a4c31e11e', 'App\\Notifications\\PurchaseNotification', 'App\\Models\\User', 2, '{\"repliedTime\":\"2023-07-14T08:12:27.360821Z\"}', NULL, '2023-07-14 03:12:27', '2023-07-14 03:12:27'),
('fe02b325-c8c6-4c47-9ad4-8929a498c287', 'App\\Notifications\\PurchaseNotification', 'App\\Models\\User', 2, '{\"repliedTime\":\"2023-07-14T08:02:10.708336Z\"}', NULL, '2023-07-14 03:02:10', '2023-07-14 03:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `processing`
--

CREATE TABLE `processing` (
  `id` int(11) NOT NULL,
  `order_number` text DEFAULT NULL,
  `client_id` text NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_address` text NOT NULL,
  `client_country` varchar(255) NOT NULL,
  `order_details` text NOT NULL,
  `product_name` text NOT NULL,
  `client_number` varchar(255) NOT NULL,
  `client_alternate_number` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_shipaddress` text DEFAULT NULL,
  `client_note` text DEFAULT NULL,
  `discount_type` varchar(255) DEFAULT NULL,
  `discount_amount` varchar(255) DEFAULT NULL,
  `amount` varchar(255) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `order_status` text NOT NULL,
  `reason_cancel` text DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `processing`
--

INSERT INTO `processing` (`id`, `order_number`, `client_id`, `client_name`, `client_address`, `client_country`, `order_details`, `product_name`, `client_number`, `client_alternate_number`, `client_email`, `client_shipaddress`, `client_note`, `discount_type`, `discount_amount`, `amount`, `received_by`, `order_status`, `reason_cancel`, `read_at`, `created_at`, `updated_at`) VALUES
(41, NULL, 'waste', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '2023-07-13 21:57:17', '2023-08-23 06:44:34'),
(110, 'NUumUO--43', '162503', 'Ali Harris', 'A ducimus hic at nu Omnis eveniet illum Adipisci tenetur quo', 'Adipisci tenetur quo', '\"[{\\\"activity_id\\\":\\\"2\\\",\\\"user_id\\\":\\\"162503\\\",\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"AYA Universe ticket\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"1\\\\\\\":null}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"1\\\\\\\":\\\\\\\"8\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"1\\\\\\\":null}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"1\\\\\\\":null}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"664\\\\\\\"]\\\"}]\"', 'AYA Universe ticket', '+1 (517) 501-9385', '+1 (642) 924-5706', 'womij@mailinator.com', 'Qui molestiae dignis', 'Quia soluta illum e', NULL, NULL, '664', 'Cash', 'Approved', NULL, NULL, '2023-08-11 06:25:18', '2023-08-18 07:31:46'),
(111, 'AQamGI-162503-158', '162503', 'Kai Curry', 'Sed et ducimus itaq Vitae laborum Ullam Dicta atque id fugi', 'Dicta atque id fugi', '\"[{\\\"visa_id\\\":\\\"5\\\",\\\"user_id\\\":162503,\\\"product_visa\\\":\\\"visa\\\",\\\"visa_packages\\\":\\\"[\\\\\\\"Azerbaijan E visa\\\\\\\"]\\\",\\\"visa_processing_type\\\":\\\"{\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null}\\\",\\\"visa_travel_date\\\":\\\"{\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null}\\\",\\\"visa_number\\\":\\\"{\\\\\\\"3\\\\\\\":\\\\\\\"40\\\\\\\",\\\\\\\"4\\\\\\\":\\\\\\\"1\\\\\\\"}\\\",\\\"visa_number_e\\\":\\\"[]\\\",\\\"visa_total_amount\\\":\\\"[\\\\\\\"12000\\\\\\\"]\\\"},{\\\"activity_id\\\":\\\"4\\\",\\\"user_id\\\":162503,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"124th + 125th Floor Non-Prime Hours Ticket\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"8\\\\\\\":null}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"8\\\\\\\":\\\\\\\"73\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"8\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"8\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"2920\\\\\\\"]\\\"},{\\\"activity_id\\\":\\\"3\\\",\\\"user_id\\\":162503,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"124th + 125th Floor Non-Prime Hours Ticket\\\\\\\",\\\\\\\"124th + 125th Floor Prime Hours Ticket\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"2\\\\\\\":\\\\\\\"2023-08-24\\\\\\\",\\\\\\\"3\\\\\\\":\\\\\\\"2023-09-01\\\\\\\",\\\\\\\"4\\\\\\\":null,\\\\\\\"5\\\\\\\":null,\\\\\\\"6\\\\\\\":null,\\\\\\\"7\\\\\\\":null}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"2\\\\\\\":\\\\\\\"123\\\\\\\",\\\\\\\"3\\\\\\\":\\\\\\\"91\\\\\\\",\\\\\\\"4\\\\\\\":\\\\\\\"1\\\\\\\",\\\\\\\"5\\\\\\\":\\\\\\\"1\\\\\\\",\\\\\\\"6\\\\\\\":\\\\\\\"1\\\\\\\",\\\\\\\"7\\\\\\\":\\\\\\\"1\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"2\\\\\\\":\\\\\\\"45\\\\\\\",\\\\\\\"3\\\\\\\":\\\\\\\"32\\\\\\\",\\\\\\\"4\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"5\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"6\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"7\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"2\\\\\\\":null,\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null,\\\\\\\"5\\\\\\\":null,\\\\\\\"6\\\\\\\":null,\\\\\\\"7\\\\\\\":null}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"28554\\\\\\\",\\\\\\\"27683\\\\\\\"]\\\"}]\"', 'Azerbaijan E visa, 124th + 125th Floor Non-Prime Hours Ticket, 124th + 125th Floor Non-Prime Hours Ticket, 124th + 125th Floor Prime Hours Ticket', '+1 (108) 961-1805', '+1 (676) 427-9575', 'womij@mailinator.com', 'Officia nemo ullamco', 'Voluptatem minim neq', NULL, NULL, '71157', 'Cash', 'Approved', NULL, NULL, '2023-08-11 06:34:12', '2023-08-18 07:33:00'),
(112, 'AMasID-29-128', '211824', 'Damian Sanchez', 'Sed doloremque ipsam Blanditiis voluptas Et eum sint incidid', 'Et eum sint incidid', '\"[{\\\"activity_id\\\":\\\"2\\\",\\\"user_id\\\":\\\"211824\\\",\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"AYA Universe ticket\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"1\\\\\\\":null}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"1\\\\\\\":\\\\\\\"60\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"1\\\\\\\":null}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"1\\\\\\\":null}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"4980\\\\\\\"]\\\"}]\"', 'AYA Universe ticket', '+1 (807) 407-8708', '+1 (959) 939-5366', 'fubaq@mailinator.com', 'Deserunt et sint con', 'Eiusmod irure qui cu', NULL, NULL, '4980', 'Cash', 'Approved', NULL, NULL, '2023-08-11 11:18:35', '2023-08-18 07:32:58'),
(115, 'DOutID-153805-129', '153805', 'Ora Joseph', 'Nihil quae magnam do Magni in et omnis ut Eu distinctio Incid', 'Eu distinctio Incid', '\"[{\\\"activity_id\\\":\\\"11\\\",\\\"user_id\\\":153805,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Quinn Calderon\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"11\\\\\\\":null}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"41\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"36900\\\\\\\"]\\\"}]\"', 'Quinn Calderon', '+1 (982) 892-2805', '+1 (555) 635-4143', 'cuzopoha@mailinator.com', NULL, 'Nihil ut voluptatem', 'price', '8000', '20900', 'Cash', 'Approved', NULL, NULL, '2023-08-17 06:48:10', '2023-08-25 11:05:50'),
(116, 'TIicLI-153805-131', '153805', 'Odette Foreman', 'Aut sunt obcaecati Maxime hic esse dic Nostrud placeat eli', 'Nostrud placeat eli', '\"[{\\\"visa_id\\\":\\\"12\\\",\\\"user_id\\\":153805,\\\"product_visa\\\":\\\"visa\\\",\\\"visa_packages\\\":\\\"[\\\\\\\"Mark Day\\\\\\\",\\\\\\\"sasad\\\\\\\"]\\\",\\\"visa_processing_type\\\":\\\"{\\\\\\\"6\\\\\\\":null,\\\\\\\"7\\\\\\\":null}\\\",\\\"visa_travel_date\\\":\\\"{\\\\\\\"6\\\\\\\":null,\\\\\\\"7\\\\\\\":null}\\\",\\\"visa_number\\\":\\\"{\\\\\\\"6\\\\\\\":\\\\\\\"61\\\\\\\",\\\\\\\"7\\\\\\\":\\\\\\\"52\\\\\\\"}\\\",\\\"visa_number_e\\\":\\\"[]\\\",\\\"visa_total_amount\\\":\\\"[\\\\\\\"30500\\\\\\\",\\\\\\\"31200\\\\\\\"]\\\"}]\"', 'Mark Day, sasad', '+1 (605) 254-6253', '+1 (904) 403-6071', 'cuzopoha@mailinator.com', 'Cum id Nam cillum et', 'Eaque illo vitae aut', 'price', '8000', '45700', 'Cash', 'Approved', NULL, NULL, '2023-08-17 06:50:10', '2023-07-25 11:05:49'),
(118, 'ETinNT-153805-123', '153805', 'Rahim Parrish', 'Maxime corrupti et Iste facere sint min Molestiae sed sunt', 'Molestiae sed sunt', '\"[{\\\"activity_id\\\":\\\"11\\\",\\\"user_id\\\":153805,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Quinn Calderon\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"11\\\\\\\":null}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"14\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"12600\\\\\\\"]\\\"}]\"', 'Quinn Calderon', '+1 (639) 602-5994', '+1 (639) 602-5994', 'cuzopoha@mailinator.com', NULL, 'Autem qui molestiae', NULL, NULL, '12600', 'Cash', 'Approved', NULL, NULL, '2023-08-17 06:53:07', '2023-08-18 07:33:06'),
(119, '95hiAN-153805-120', '153805', 'Otto Mckay', 'C95 Karachi Pakistan', 'Pakistan', '\"[{\\\"visa_id\\\":\\\"5\\\",\\\"user_id\\\":153805,\\\"product_visa\\\":\\\"visa\\\",\\\"visa_packages\\\":\\\"[\\\\\\\"Azerbaijan E visa\\\\\\\",\\\\\\\"Azerbaijan Urgent E-visa\\\\\\\"]\\\",\\\"visa_processing_type\\\":\\\"{\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null}\\\",\\\"visa_travel_date\\\":\\\"{\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null}\\\",\\\"visa_number\\\":\\\"{\\\\\\\"3\\\\\\\":\\\\\\\"42\\\\\\\",\\\\\\\"4\\\\\\\":\\\\\\\"53\\\\\\\"}\\\",\\\"visa_number_e\\\":\\\"[]\\\",\\\"visa_total_amount\\\":\\\"[\\\\\\\"12600\\\\\\\",\\\\\\\"26500\\\\\\\"]\\\"}]\"', 'Azerbaijan E visa, Azerbaijan Urgent E-visa', '(636) 424-3082', '(636) 424-3082', 'cuzopoha@mailinator.com', NULL, NULL, 'price', '2000', '35100', 'Cash', 'Approved', NULL, NULL, '2023-08-17 06:54:05', '2023-08-25 11:05:38'),
(120, 'UItaTI-153805-120', '153805', 'Cheyenne Hunt', 'Aut sint quaerat qui Qui nisi sed volupta Hic a eius voluptati', 'Hic a eius voluptati', '\"[{\\\"activity_id\\\":\\\"3\\\",\\\"user_id\\\":153805,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"124th + 125th Floor Non-Prime Hours Ticket\\\\\\\",\\\\\\\"124th + 125th Floor Prime Hours Ticket\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"2\\\\\\\":null,\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null,\\\\\\\"5\\\\\\\":null,\\\\\\\"6\\\\\\\":null,\\\\\\\"7\\\\\\\":null}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"2\\\\\\\":\\\\\\\"59\\\\\\\",\\\\\\\"3\\\\\\\":\\\\\\\"51\\\\\\\",\\\\\\\"4\\\\\\\":\\\\\\\"1\\\\\\\",\\\\\\\"5\\\\\\\":\\\\\\\"1\\\\\\\",\\\\\\\"6\\\\\\\":\\\\\\\"1\\\\\\\",\\\\\\\"7\\\\\\\":\\\\\\\"1\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"2\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"3\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"4\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"5\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"6\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"7\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"2\\\\\\\":null,\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null,\\\\\\\"5\\\\\\\":null,\\\\\\\"6\\\\\\\":null,\\\\\\\"7\\\\\\\":null}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"10502\\\\\\\",\\\\\\\"12699\\\\\\\"]\\\"}]\"', '124th + 125th Floor Non-Prime Hours Ticket, 124th + 125th Floor Prime Hours Ticket', '+923444854553', '+923444854553', 'cuzopoha@mailinator.com', NULL, 'Atque dolore assumen', NULL, NULL, '23201', 'Cash', 'Approved', NULL, NULL, '2023-08-17 06:58:19', '2023-08-28 11:05:59'),
(121, 'ELen R--189', '213732', 'Leroy Delacruz', 'Ut tempore sit vel Est numquam providen Sit officia labore r', 'Sit officia labore r', '\"[{\\\"visa_id\\\":\\\"5\\\",\\\"user_id\\\":\\\"213732\\\",\\\"product_visa\\\":\\\"visa\\\",\\\"visa_packages\\\":\\\"[\\\\\\\"Azerbaijan E visa\\\\\\\",\\\\\\\"Azerbaijan Urgent E-visa\\\\\\\"]\\\",\\\"visa_processing_type\\\":\\\"{\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null}\\\",\\\"visa_travel_date\\\":\\\"{\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null}\\\",\\\"visa_number\\\":\\\"{\\\\\\\"3\\\\\\\":\\\\\\\"42\\\\\\\",\\\\\\\"4\\\\\\\":\\\\\\\"53\\\\\\\"}\\\",\\\"visa_number_e\\\":\\\"[]\\\",\\\"visa_total_amount\\\":\\\"[\\\\\\\"12600\\\\\\\",\\\\\\\"26500\\\\\\\"]\\\"}]\"', 'Azerbaijan E visa, Azerbaijan Urgent E-visa', '+1 (629) 481-9741', '+1 (629) 481-9741', 'kaqymowapu@mailinator.com', NULL, 'Fugiat veniam adipi', NULL, NULL, '39100', 'Cash', 'Approved', NULL, NULL, '2023-08-17 11:38:34', '2023-08-25 11:05:44'),
(122, 'POuiNT--128', '213932', 'Francesca Pratt', 'Facere ut sit tempo Odit quis beatae qui Ea fugiat consequunt', 'Ea fugiat consequunt', '\"[{\\\"visa_id\\\":\\\"5\\\",\\\"user_id\\\":\\\"213932\\\",\\\"product_visa\\\":\\\"visa\\\",\\\"visa_packages\\\":\\\"[\\\\\\\"Azerbaijan E visa\\\\\\\",\\\\\\\"Azerbaijan Urgent E-visa\\\\\\\"]\\\",\\\"visa_processing_type\\\":\\\"{\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null}\\\",\\\"visa_travel_date\\\":\\\"{\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null}\\\",\\\"visa_number\\\":\\\"{\\\\\\\"3\\\\\\\":\\\\\\\"42\\\\\\\",\\\\\\\"4\\\\\\\":\\\\\\\"53\\\\\\\"}\\\",\\\"visa_number_e\\\":\\\"[]\\\",\\\"visa_total_amount\\\":\\\"[\\\\\\\"12600\\\\\\\",\\\\\\\"26500\\\\\\\"]\\\"},{\\\"activity_id\\\":\\\"11\\\",\\\"user_id\\\":\\\"213932\\\",\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Quinn Calderon\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"11\\\\\\\":null}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"36\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"32400\\\\\\\"]\\\"}]\"', 'Azerbaijan E visa, Azerbaijan Urgent E-visa, Quinn Calderon', '+1 (909) 457-5258', '+1 (605) 458-9657', 'vice@mailinator.com', NULL, 'Et officiis expedita', 'price', '2000', '67500', 'Cash', 'Approved', NULL, NULL, '2023-08-17 11:40:22', '2023-08-25 11:05:33'),
(123, 'UI rDO--187', '214235', 'Rafael Nicholson', 'Enim voluptates qui Quibusdam expedita r Facere vitae commodo', 'Facere vitae commodo', '\"[{\\\"visa_id\\\":\\\"5\\\",\\\"user_id\\\":\\\"214235\\\",\\\"product_visa\\\":\\\"visa\\\",\\\"visa_packages\\\":\\\"[\\\\\\\"Azerbaijan E visa\\\\\\\",\\\\\\\"Azerbaijan Urgent E-visa\\\\\\\"]\\\",\\\"visa_processing_type\\\":\\\"{\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null}\\\",\\\"visa_travel_date\\\":\\\"{\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null}\\\",\\\"visa_number\\\":\\\"{\\\\\\\"3\\\\\\\":\\\\\\\"42\\\\\\\",\\\\\\\"4\\\\\\\":\\\\\\\"53\\\\\\\"}\\\",\\\"visa_number_e\\\":\\\"[]\\\",\\\"visa_total_amount\\\":\\\"[\\\\\\\"12600\\\\\\\",\\\\\\\"26500\\\\\\\"]\\\"},{\\\"activity_id\\\":\\\"11\\\",\\\"user_id\\\":\\\"214235\\\",\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Quinn Calderon\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"11\\\\\\\":null}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"50\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"45000\\\\\\\"]\\\"}]\"', 'Azerbaijan E visa, Azerbaijan Urgent E-visa, Quinn Calderon', '+1 (274) 138-5581', '+1 (916) 637-4912', 'cubojynyf@mailinator.com', NULL, 'Adipisicing eius in', 'price', '2000', '80100', 'Cash', 'Approved', NULL, NULL, '2023-08-17 11:48:38', '2023-08-25 11:05:32'),
(126, 'DEucCO--131', '003519', 'Lee Turner', 'Cupidatat est aut de In aliquip omnis duc Laudantium culpa co', 'Laudantium culpa co', '\"[{\\\"activity_id\\\":\\\"11\\\",\\\"user_id\\\":\\\"003519\\\",\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Quinn Calderon\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"11\\\\\\\":null}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"34\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"11\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"30600\\\\\\\"]\\\"},{\\\"activity_id\\\":\\\"3\\\",\\\"user_id\\\":\\\"003519\\\",\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"124th + 125th Floor Non-Prime Hours Ticket\\\\\\\",\\\\\\\"124th + 125th Floor Prime Hours Ticket\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"2\\\\\\\":null,\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null,\\\\\\\"5\\\\\\\":null,\\\\\\\"6\\\\\\\":null,\\\\\\\"7\\\\\\\":null}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"2\\\\\\\":\\\\\\\"11\\\\\\\",\\\\\\\"3\\\\\\\":\\\\\\\"46\\\\\\\",\\\\\\\"4\\\\\\\":\\\\\\\"1\\\\\\\",\\\\\\\"5\\\\\\\":\\\\\\\"1\\\\\\\",\\\\\\\"6\\\\\\\":\\\\\\\"1\\\\\\\",\\\\\\\"7\\\\\\\":\\\\\\\"1\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"2\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"3\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"4\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"5\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"6\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"7\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"2\\\\\\\":null,\\\\\\\"3\\\\\\\":null,\\\\\\\"4\\\\\\\":null,\\\\\\\"5\\\\\\\":null,\\\\\\\"6\\\\\\\":null,\\\\\\\"7\\\\\\\":null}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"1958\\\\\\\",\\\\\\\"11454\\\\\\\"]\\\"}]\"', 'Quinn Calderon, 124th + 125th Floor Non-Prime Hours Ticket, 124th + 125th Floor Prime Hours Ticket', '+1 (866) 904-3894', '+1 (534) 865-8528', 'felafyrug@mailinator.com', NULL, 'Quasi soluta debitis', 'price', '2000', '40012', 'Cash', 'Approved', NULL, NULL, '2023-08-17 14:40:09', '2023-08-25 11:05:30'),
(129, 'UP sTE-151607-215', '151607', 'Shelby Trujillo', 'Quibusdam esse volup Laborum Non et et s Ut natus cupiditate', 'Ut natus cupiditate', '\"[{\\\"activity_id\\\":\\\"18\\\",\\\"user_id\\\":151607,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Jared Hoffman\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"2023-08-25\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"67\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"33500\\\\\\\"]\\\"}]\"', 'Jared Hoffman', '+1 (514) 762-2642', '+1 (619) 536-6829', 'bofaxuheco@mailinator.com', 'Perspiciatis ab nes', 'Voluptas facilis eiu', NULL, NULL, '33500', 'Cash', 'Pending', NULL, NULL, '2023-08-25 05:25:05', '2023-08-25 05:25:05'),
(130, 'NT vCI-151607-173', '151607', 'Xandra Johnston', 'Eu adipisci accusant Id laboris laboris v Temporibus adipisci', 'Temporibus adipisci', '\"[{\\\"activity_id\\\":\\\"18\\\",\\\"user_id\\\":151607,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Jared Hoffman\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"2023-08-25\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"67\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"33500\\\\\\\"]\\\"}]\"', 'Jared Hoffman', '+1 (245) 356-2687', '+1 (779) 654-4776', 'bofaxuheco@mailinator.com', 'Labore ducimus mole', 'Commodo eveniet exc', 'percentage', '10', '30150', 'Cash', 'Pending', NULL, NULL, '2023-08-25 05:26:01', '2023-08-25 11:05:25'),
(131, 'GIta V-151607-132', '151607', 'Jared Bullock', 'Dolore porro ad fugi Officia eos soluta Non sed enim elit v', 'Non sed enim elit v', '\"[{\\\"activity_id\\\":\\\"18\\\",\\\"user_id\\\":151607,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Jared Hoffman\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"2023-08-25\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"67\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"33500\\\\\\\"]\\\"}]\"', 'Jared Hoffman', '+1 (708) 863-6805', '+1 (105) 391-8236', 'bofaxuheco@mailinator.com', NULL, 'Similique rerum quo', 'price', '2000', '31500', 'Cash', 'Pending', NULL, NULL, '2023-08-25 05:56:18', '2023-08-25 11:05:22'),
(132, 'MMdoNO-151607-134', '151607', 'Wallace Cunningham', 'Est velit odit comm Autem labore enim do Qui nobis eum sed no', 'Qui nobis eum sed no', '\"[{\\\"activity_id\\\":\\\"18\\\",\\\"user_id\\\":151607,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Jared Hoffman\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"2023-08-25\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"67\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"33500\\\\\\\"]\\\"}]\"', 'Jared Hoffman', '+1 (923) 138-1008', '+1 (421) 308-7922', 'bofaxuheco@mailinator.com', NULL, 'Eaque culpa ea tempo', 'percentage', '10', '30150', 'Cash', 'Pending', NULL, NULL, '2023-08-25 05:59:55', '2023-08-25 05:59:55'),
(133, 'SSamAM--144', '212746', 'Ashely Garner', 'Minus enim amet ass Est omnis qui do Nam Ut nihil aute ipsam', 'Ut nihil aute ipsam', '\"[{\\\"activity_id\\\":\\\"18\\\",\\\"user_id\\\":\\\"212746\\\",\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Jared Hoffman\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"2023-08-29\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"11\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"5500\\\\\\\"]\\\"}]\"', 'Jared Hoffman', '+1 (784) 773-3181', '+1 (388) 171-5241', 'pejukelis@mailinator.com', 'Dolor natus laudanti', 'Quia est quos ut qua', 'price', '915', '4585', 'Cash', 'Pending', NULL, NULL, '2023-08-29 11:29:17', '2023-08-29 11:29:17'),
(134, ' VruPA-212746-171', '212746', 'Brenna Petersen', 'Ad vitae sed nulla v Pariatur Est corru Est sunt enim culpa', 'Est sunt enim culpa', '\"[{\\\"activity_id\\\":\\\"17\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Deacon Morales\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"2023-08-29\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"39\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"19500\\\\\\\"]\\\"},{\\\"visa_id\\\":\\\"12\\\",\\\"user_id\\\":212746,\\\"product_visa\\\":\\\"visa\\\",\\\"visa_packages\\\":\\\"[\\\\\\\"Mark Day\\\\\\\",\\\\\\\"sasad\\\\\\\"]\\\",\\\"visa_processing_type\\\":\\\"{\\\\\\\"6\\\\\\\":null,\\\\\\\"7\\\\\\\":null}\\\",\\\"visa_travel_date\\\":\\\"{\\\\\\\"6\\\\\\\":\\\\\\\"2023-08-29\\\\\\\",\\\\\\\"7\\\\\\\":\\\\\\\"2023-08-30\\\\\\\"}\\\",\\\"visa_number\\\":\\\"{\\\\\\\"6\\\\\\\":\\\\\\\"13\\\\\\\",\\\\\\\"7\\\\\\\":\\\\\\\"46\\\\\\\"}\\\",\\\"visa_number_e\\\":\\\"[]\\\",\\\"visa_total_amount\\\":\\\"[\\\\\\\"6500\\\\\\\",\\\\\\\"27600\\\\\\\"]\\\"}]\"', 'Deacon Morales, Mark Day, sasad', '+1 (362) 661-7602', '+1 (753) 646-7591', 'pejukelis@mailinator.com', NULL, 'Reprehenderit quam', 'percentage', '10', '48240', 'Cash', 'Pending', NULL, NULL, '2023-08-29 11:33:23', '2023-08-29 11:33:23'),
(137, 'ELmuDA-212746-139', '212746', 'Mollie Dalton', 'Libero cupiditate el Consequatur possimu Excepturi assumenda', 'Excepturi assumenda', '\"[{\\\"activity_id\\\":\\\"17\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Deacon Morales\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"2023-09-01\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"54\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"27000\\\\\\\"]\\\"}]\"', 'Deacon Morales', '+1 (984) 251-6101', '+1 (355) 194-8557', 'pejukelis@mailinator.com', 'In culpa voluptatum', 'Nihil eos dolore in', NULL, NULL, '27000', 'Credit Card', 'Pending', NULL, NULL, '2023-09-01 07:35:14', '2023-09-01 07:40:06'),
(138, 'ELuiIT-212746-145', '212746', 'Hiram Sykes', 'Sit enim tempora del Voluptatum ipsam qui Ea distinctio Sit', 'Ea distinctio Sit', '\"[{\\\"activity_id\\\":\\\"17\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Deacon Morales\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"2023-09-01\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"22\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"11000\\\\\\\"]\\\"}]\"', 'Deacon Morales', '+1 (294) 559-5256', '+1 (835) 698-4575', 'pejukelis@mailinator.com', NULL, 'Possimus dolor inve', NULL, NULL, '11000', 'Cash', 'Pending', NULL, NULL, '2023-09-01 11:22:03', '2023-09-01 11:22:03'),
(139, 'ELuiIT-212746-162', '212746', 'Hiram Sykes', 'Sit enim tempora del Voluptatum ipsam qui Ea distinctio Sit', 'Ea distinctio Sit', '\"[{\\\"activity_id\\\":\\\"17\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Deacon Morales\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"2023-09-01\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"22\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"11000\\\\\\\"]\\\"}]\"', 'Deacon Morales', '+1 (294) 559-5256', '+1 (835) 698-4575', 'pejukelis@mailinator.com', NULL, 'Possimus dolor inve', NULL, NULL, '11000', 'Cash', 'Pending', NULL, NULL, '2023-09-01 11:22:12', '2023-09-01 11:22:12'),
(140, ' PusOF-212746-153', '212746', 'Hall Gordon', 'In incididunt est p Id autem quam quibus Quidem aliquip ad of', 'Quidem aliquip ad of', '\"[{\\\"activity_id\\\":\\\"17\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Deacon Morales\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"2023-09-01\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"22\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"11000\\\\\\\"]\\\"}]\"', 'Deacon Morales', '+1 (353) 797-6289', '+1 (411) 596-5475', 'pejukelis@mailinator.com', NULL, 'Vero vel sit dolor', NULL, NULL, '11000', 'Cash', 'Pending', NULL, NULL, '2023-09-01 11:22:30', '2023-09-01 11:22:30'),
(141, 'MP sSI-212746-158', '212746', 'Chloe Rollins', 'Et sed a magnam temp Accusamus quia aut s Accusantium irure si', 'Accusantium irure si', '\"[{\\\"activity_id\\\":\\\"17\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Deacon Morales\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"2023-09-01\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"22\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"11000\\\\\\\"]\\\"}]\"', 'Deacon Morales', '+1 (632) 487-9735', '+1 (928) 495-7892', 'pejukelis@mailinator.com', 'Impedit ad aliquam', 'Optio occaecat dign', NULL, NULL, '11000', 'Cash', 'Pending', NULL, NULL, '2023-09-01 11:23:07', '2023-09-01 11:23:07'),
(142, 'LU qDI-212746-168', '212746', 'Dane William', 'Ut animi earum volu Qui iure pariatur Q Culpa id non expedi', 'Culpa id non expedi', '\"[{\\\"activity_id\\\":\\\"18\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Jared Hoffman\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"2023-09-01\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"15\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"7500\\\\\\\"]\\\"}]\"', 'Jared Hoffman', '+1 (527) 922-8848', '+1 (648) 451-2422', 'pejukelis@mailinator.com', 'Consequatur Sed ill', 'Eos temporibus amet', NULL, NULL, '7500', 'Cash', 'Pending', NULL, NULL, '2023-09-01 11:25:01', '2023-09-01 11:25:01'),
(143, ' R a A-212746-143', '212746', 'Miriam Holt', 'Exercitation sequi r Excepturi occaecat a Pariatur Voluptas a', 'Pariatur Voluptas a', '\"[{\\\"activity_id\\\":\\\"17\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Deacon Morales\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"2023-09-01\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"19\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"9500\\\\\\\"]\\\"}]\"', 'Deacon Morales', '+1 (977) 192-3812', '+1 (135) 623-1551', 'pejukelis@mailinator.com', 'Est aut voluptate au', 'Voluptatem ullamco a', NULL, NULL, '9500', 'Credit Card', 'Pending', NULL, NULL, '2023-09-01 11:29:30', '2023-09-01 11:29:30'),
(144, 'QUatVE-212746-198', '212746', 'Zephania Faulkner', 'Quod aliquam consequ Ad ipsum consequat Aperiam odit est ve', 'Aperiam odit est ve', '\"[{\\\"activity_id\\\":\\\"18\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Jared Hoffman\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"2023-09-01\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"27\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"13500\\\\\\\"]\\\"}]\"', 'Jared Hoffman', '+1 (442) 689-5394', '+1 (621) 773-1493', 'pejukelis@mailinator.com', 'Ut nemo doloribus au', 'Dolor cillum ipsam e', NULL, NULL, '13500', 'Bank', 'Pending', NULL, NULL, '2023-09-01 11:39:40', '2023-09-01 11:39:40'),
(145, 'EM sCO-212746-155', '212746', 'Kane Hart', 'Expedita voluptatem Totam vitae culpa s Dolorem do dolore co', 'Dolorem do dolore co', '\"[{\\\"activity_id\\\":\\\"18\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Jared Hoffman\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"2023-09-01\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"39\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"19500\\\\\\\"]\\\"}]\"', 'Jared Hoffman', '+1 (854) 752-8168', '+1 (301) 622-6121', 'pejukelis@mailinator.com', NULL, 'Nobis ea ducimus el', NULL, NULL, '19500', 'Cash', 'Pending', NULL, NULL, '2023-09-01 11:41:23', '2023-09-01 11:41:23'),
(146, 'ARre R-212746-153', '212746', 'Emma Shelton', 'Sit quis odio et har Eiusmod duis dolore Qui minima eiusmod r', 'Qui minima eiusmod r', '\"[{\\\"activity_id\\\":\\\"17\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Deacon Morales\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"2023-09-04\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"32\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"16000\\\\\\\"]\\\"}]\"', 'Deacon Morales', '+1 (581) 998-7823', '+1 (165) 361-9883', 'pejukelis@mailinator.com', NULL, 'Praesentium voluptas', 'percentage', '10', '14400', 'Cash', 'Pending', NULL, NULL, '2023-09-04 00:46:25', '2023-09-04 00:46:25'),
(147, 'IAeiIT-212746-165', '212746', 'Shana Long', 'Error cillum repudia Doloremque maxime ei Harum incidunt sit', 'Harum incidunt sit', '\"[{\\\"activity_id\\\":\\\"18\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Jared Hoffman\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"2023-09-04\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"27\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"13500\\\\\\\"]\\\"}]\"', 'Jared Hoffman', '+1 (497) 366-8956', '+1 (571) 192-3227', 'pejukelis@mailinator.com', NULL, 'Excepteur cum aperia', 'percentage', '20', '10800', 'Bank', 'Pending', NULL, NULL, '2023-09-04 00:50:46', '2023-09-04 00:50:46'),
(148, 'TEemAT-212746-150', '212746', 'Griffin Jenkins', 'Velit at tempor aute Sequi sit voluptatem Consequatur voluptat', 'Consequatur voluptat', '\"[{\\\"activity_id\\\":\\\"14\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Giacomo Stanton\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"16\\\\\\\":\\\\\\\"2023-09-04\\\\\\\",\\\\\\\"17\\\\\\\":\\\\\\\"2023-09-04\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"16\\\\\\\":\\\\\\\"31\\\\\\\",\\\\\\\"17\\\\\\\":\\\\\\\"1\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"16\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"17\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"16\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"17\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"24800\\\\\\\"]\\\"}]\"', 'Giacomo Stanton', '+1 (167) 751-2387', '+1 (962) 841-3104', 'pejukelis@mailinator.com', NULL, 'Aperiam atque iusto', 'price', '2000', '22800', 'Credit Card', 'Pending', NULL, NULL, '2023-09-04 00:54:16', '2023-09-04 00:54:16'),
(149, 'ARalAT-212746-219', '212746', 'Sara Shelton', 'Qui sed quod eos har Qui sint eveniet al Distinctio Voluptat', 'Distinctio Voluptat', '\"[{\\\"activity_id\\\":\\\"14\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Giacomo Stanton\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"16\\\\\\\":\\\\\\\"2023-09-04\\\\\\\",\\\\\\\"17\\\\\\\":\\\\\\\"2023-09-04\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"16\\\\\\\":\\\\\\\"32\\\\\\\",\\\\\\\"17\\\\\\\":\\\\\\\"1\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"16\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"17\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"16\\\\\\\":\\\\\\\"0\\\\\\\",\\\\\\\"17\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"25600\\\\\\\"]\\\"}]\"', 'Giacomo Stanton', '+1 (961) 647-5409', '+1 (296) 579-4842', 'pejukelis@mailinator.com', NULL, 'Sit unde aut et proi', 'percentage', '10', '23040', 'Credit Card', 'Pending', NULL, NULL, '2023-09-04 01:03:37', '2023-09-04 01:03:37'),
(150, 'SEesAQ-212746-169', '212746', 'Mark Livingston', 'Quis molestias conse Dolor et quisquam es Iste voluptatem eaq', 'Iste voluptatem eaq', '\"[{\\\"activity_id\\\":\\\"17\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Deacon Morales\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"2023-09-04\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"32\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"16000\\\\\\\"]\\\"}]\"', 'Deacon Morales', '+1 (753) 529-6974', '+1 (176) 206-3645', 'pejukelis@mailinator.com', NULL, 'Animi qui sit susci', NULL, NULL, '16000', 'Bank', 'Pending', NULL, NULL, '2023-09-04 01:04:18', '2023-09-04 01:04:18'),
(151, 'CIti S-212746-193', '212746', 'Mia Garrett', 'Fugiat facilis inci Aut et et iure disti Vel maxime aperiam s', 'Vel maxime aperiam s', '\"[{\\\"activity_id\\\":\\\"18\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Jared Hoffman\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"2023-09-04\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"32\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"16000\\\\\\\"]\\\"}]\"', 'Jared Hoffman', '+1 (588) 276-4711', '+1 (432) 317-3344', 'pejukelis@mailinator.com', 'Molestias quidem min', 'Voluptatem consectet', 'percentage', '20', '12800', 'Cash', 'Pending', NULL, NULL, '2023-09-04 01:06:20', '2023-09-04 01:06:20'),
(152, 'TE aOL-212746-167', '212746', 'Kirestin Kaufman', 'Autem quas voluptate Aut aute possimus a Quis facere esse vol', 'Quis facere esse vol', '\"[{\\\"activity_id\\\":\\\"17\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Deacon Morales\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"2023-09-04\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"73\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"36500\\\\\\\"]\\\"}]\"', 'Deacon Morales', '+1 (209) 446-1532', '+1 (731) 883-6872', 'pejukelis@mailinator.com', NULL, 'Architecto corporis', NULL, NULL, '36500', 'Bank', 'Pending', NULL, NULL, '2023-09-04 01:07:58', '2023-09-04 01:07:58'),
(153, 'TAntIT-212746-157', '212746', 'Charissa Whitney', 'Est elit ipsum vita Laborum Provident Voluptatum sunt odit', 'Voluptatum sunt odit', '\"[{\\\"activity_id\\\":\\\"17\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Deacon Morales\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"2023-09-04\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"63\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"31500\\\\\\\"]\\\"}]\"', 'Deacon Morales', '+1 (424) 343-3054', '+1 (221) 185-9971', 'pejukelis@mailinator.com', 'Soluta at ipsum dist', 'Ipsam non repellendu', 'price', '2000', '29500', 'Credit Card', 'Pending', NULL, NULL, '2023-09-04 01:09:56', '2023-09-04 01:09:56'),
(154, ' ModTI-212746-165', '212746', 'Larissa Perry', 'Occaecat rerum qui m Et at voluptatem od Facilis ad voluptati', 'Facilis ad voluptati', '\"[{\\\"activity_id\\\":\\\"18\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Jared Hoffman\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"2023-09-04\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"28\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"14000\\\\\\\"]\\\"}]\"', 'Jared Hoffman', '+1 (319) 382-1864', '+1 (504) 257-4014', 'pejukelis@mailinator.com', 'Do dolores animi do', 'Aliquid pariatur De', NULL, NULL, '14000', 'Bank', 'Pending', NULL, NULL, '2023-09-04 01:12:24', '2023-09-04 01:12:24'),
(155, 'QUsaUS-212746-206', '212746', 'William Graham', 'Minima totam consequ Soluta id omnis ipsa Officia voluptatibus', 'Officia voluptatibus', '\"[{\\\"activity_id\\\":\\\"17\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Deacon Morales\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"2023-09-04\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"30\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"15000\\\\\\\"]\\\"}]\"', 'Deacon Morales', '+1 (842) 559-5705', '+1 (557) 823-5246', 'pejukelis@mailinator.com', NULL, 'Et est duis blanditi', NULL, NULL, '15000', 'Bank', 'Pending', NULL, NULL, '2023-09-04 01:15:14', '2023-09-04 01:15:14');
INSERT INTO `processing` (`id`, `order_number`, `client_id`, `client_name`, `client_address`, `client_country`, `order_details`, `product_name`, `client_number`, `client_alternate_number`, `client_email`, `client_shipaddress`, `client_note`, `discount_type`, `discount_amount`, `amount`, `received_by`, `order_status`, `reason_cancel`, `read_at`, `created_at`, `updated_at`) VALUES
(156, 'BIqu N-212746-166', '212746', 'Debra Noel', 'Voluptatem quas nobi Reprehenderit vel qu Necessitatibus sed n', 'Necessitatibus sed n', '\"[{\\\"activity_id\\\":\\\"18\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Jared Hoffman\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"2023-09-04\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"32\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"21\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"16000\\\\\\\"]\\\"}]\"', 'Jared Hoffman', '+1 (649) 494-4381', '+1 (385) 793-7975', 'pejukelis@mailinator.com', NULL, 'In consequuntur sint', 'price', '2000', '14000', 'Cash', 'Pending', NULL, NULL, '2023-09-04 01:17:33', '2023-09-04 01:17:33'),
(157, 'ST qDU-212746-175', '212746', 'Madison Dejesus', 'Soluta cum quas est Enim eum delectus q Hic ea ea repellendu', 'Hic ea ea repellendu', '\"[{\\\"activity_id\\\":\\\"17\\\",\\\"user_id\\\":212746,\\\"product_activity\\\":\\\"activity\\\",\\\"activity_packages\\\":\\\"[\\\\\\\"Deacon Morales\\\\\\\"]\\\",\\\"activity_travel_date\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"2023-09-04\\\\\\\"}\\\",\\\"activity_adult_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"32\\\\\\\"}\\\",\\\"activity_adult_price_st\\\":\\\"[]\\\",\\\"activity_adult_price_pt\\\":\\\"[]\\\",\\\"activity_child_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_child_price_st\\\":\\\"[]\\\",\\\"activity_child_price_pt\\\":\\\"[]\\\",\\\"activity_infant_price\\\":\\\"{\\\\\\\"20\\\\\\\":\\\\\\\"0\\\\\\\"}\\\",\\\"activity_infant_price_st\\\":\\\"[]\\\",\\\"activity_infant_price_pt\\\":\\\"[]\\\",\\\"activity_total_amount\\\":\\\"[\\\\\\\"16000\\\\\\\"]\\\"}]\"', 'Deacon Morales', '+1 (246) 652-7225', '+1 (601) 358-1037', 'pejukelis@mailinator.com', 'Veniam incididunt q', 'Laboris sint delenit', 'percentage', '20', '12800', 'Credit Card', 'Approved', NULL, NULL, '2023-09-04 01:18:18', '2023-09-04 05:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(50) NOT NULL DEFAULT '',
  `setting_value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`, `created_at`, `updated_at`) VALUES
(1, 'website_url', 'https://desertsafari4x4.com', '2022-05-11 05:52:35', '2023-05-31 01:39:11'),
(2, 'site_name', 'Desert Safari', '2022-05-11 05:52:35', '2023-05-29 03:06:34'),
(3, 'info_email', 'info@desertsafari4x4.com', '2022-05-11 05:52:35', '2022-06-06 01:51:49'),
(4, 'contact_no', '+971 52 2256416', '2022-05-11 05:52:35', '2022-06-23 20:54:29'),
(5, 'site_logo_header_dark', '18F53yLv8syKrqwZNCi23qECn05qkFUklgQ6G8LJ.png', '2022-05-11 05:52:35', '2023-05-31 01:44:16'),
(6, 'site_logo_header_light', 'xIXOigoaeyXx1fT4fP2nRlS2kK2j5F3fQG0T7Cfp.png', '2022-05-11 10:11:32', '2023-05-31 01:43:54'),
(7, 'footer_about', 'One of the most popular on the web is shopping.', '2022-05-11 10:11:32', '2023-03-08 03:26:22'),
(8, 'address', 'Airport Road Dubai UAE', '2022-05-11 10:17:57', '2022-06-23 20:54:29'),
(9, 'google_location', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462561.6574537445!2d55.22748795!3d25.076022449999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2s!4v1671523589444!5m2!1sen!2shttps://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7217.871970253125!2d55.373740000000005!3d25.239081!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5df9885daa05%3A0x7cf8603b46dc34a6!2sAirport%20Rd%20-%20Dubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sus!4v1689280621231!5m2!1sen!2sus', '2022-05-11 10:17:57', '2023-03-08 03:55:00'),
(10, 'facebook_page', '#', '2022-05-11 10:20:44', '2023-08-18 02:15:22'),
(11, 'twitter_page', '#', '2022-05-11 10:22:53', '2023-08-18 02:15:22'),
(12, 'social_instagram', '#', '2022-05-11 10:25:28', '2023-08-18 02:15:22'),
(13, 'social_linkedin', '#', '2022-05-11 10:27:05', '2023-08-18 02:15:22'),
(14, 'social_youtube', '#', '2022-05-13 11:46:54', '2023-08-18 02:15:22'),
(15, 'bank_name', 'SILK', '2023-09-01 15:04:47', '2023-09-01 10:11:18'),
(16, 'acc_no', '4545 4545 6466', '2023-09-01 15:04:47', '2023-09-01 10:13:10'),
(17, 'cr_card_link', 'www.google.com', '2023-09-01 15:04:47', '2023-09-01 15:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `email`, `created_at`, `updated_at`) VALUES
(3, 'sadsadasd@gmail.com', '2023-08-15 04:39:13', '2023-08-15 04:39:13'),
(4, 'mrhuzaifa29@gmail.com', '2023-08-15 04:41:13', '2023-08-15 04:41:13'),
(5, 'sadsadasd@gmail.com', '2023-08-15 04:42:11', '2023-08-15 04:42:11'),
(6, 'sadsadasd@gmail.com', '2023-08-15 04:42:33', '2023-08-15 04:42:33'),
(7, 'mrhuzaifa29@gmail.com', '2023-08-15 04:43:18', '2023-08-15 04:43:18'),
(8, 'sadsadasd@gmail.com', '2023-08-15 04:44:08', '2023-08-15 04:44:08'),
(9, 'sadsadasd@gmail.com', '2023-08-15 04:44:53', '2023-08-15 04:44:53'),
(10, 'mrhuzaifa29@gmail.com', '2023-08-15 05:18:46', '2023-08-15 05:18:46'),
(11, 'sadsadsad@gmail.com', '2023-08-15 05:21:04', '2023-08-15 05:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `temp_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `temp_id`, `name`, `lname`, `date_of_birth`, `email`, `email_verified_at`, `google_id`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 160909, 'Finn', 'Campos', NULL, 'xexeq@mailinator.com', NULL, NULL, '+1 (343) 247-7716', '$2y$10$elUDpdD5dtfhMkkv4a2E9eXOI7LzYhkxNiRWz3OK4j2JX/48pEpUC', NULL, '2023-08-10 14:53:41', '2023-08-11 06:09:32'),
(10, 4018, 'Denise', 'Alston', NULL, 'nymi@mailinator.com', NULL, NULL, '+1 (311) 669-7547', '$2y$10$GZhCrUauA4npVZwbpcYs5ukW/cR.jkXLTuH4H5clz2IcsLteL4Fgu', NULL, '2023-08-10 14:58:22', '2023-08-10 14:58:22'),
(12, 4018, 'Kevin', 'Rios', NULL, 'dupelo@mailinator.com', NULL, NULL, '+1 (498) 901-6285', '$2y$10$Jh92WolyZks5tC1QQLworOu4Pk.Yd4E7lMQwv0/c0C6Khn1JkRC6a', NULL, '2023-08-10 14:58:43', '2023-08-10 14:58:43'),
(13, 4018, 'Kevin', 'Rios', NULL, 'dupelo@mailinator.com12', NULL, NULL, '+1 (498) 901-6285', '$2y$10$5jjh2zFkgjnBykHpvS6DWudVg8g8al.Omm6uA/M0t697Mbh0xuR22', NULL, '2023-08-10 15:00:11', '2023-08-10 15:00:11'),
(15, 4018, 'Kevin', 'Rios', NULL, 'dupelo@mailinator.com1221', NULL, NULL, '+1 (498) 901-6285', '$2y$10$FQcp6gzzy10wzGVEejGa1ulUb/9M.t6OC4XECHOlEF9M9C0rCKIwO', NULL, '2023-08-10 15:00:24', '2023-08-10 15:00:24'),
(16, 4018, 'Herman', 'Beck', NULL, 'qabom@mailinator.com', NULL, NULL, '+1 (805) 749-3186', '$2y$10$M4IWBWS017nMg5ERj0Tur.yf5Dpkw46MVTJ4oAhiy2.QBDj2qVnMq', NULL, '2023-08-10 15:00:47', '2023-08-10 15:00:47'),
(17, 4018, 'Amity', 'Gillespie', NULL, 'lewisy@mailinator.com', NULL, NULL, '+1 (742) 688-7878', '$2y$10$FoSjJf7BI/ZDtqeI2lo.QOCrN5RPf44x7EvhQw4cnI7WlatPXYcGy', NULL, '2023-08-10 15:01:38', '2023-08-10 15:01:38'),
(18, 4018, 'Delilah', 'Garrett', NULL, 'ripuqija@mailinator.com', NULL, NULL, '+1 (583) 314-1159', '$2y$10$Oeg7XpYYrth7jkWsIWRBTekJfLow5QGdoCYkJZ/tOSDg5ubj0cD0u', NULL, '2023-08-10 15:02:51', '2023-08-10 15:02:51'),
(19, 10418, 'Susan', 'Sosa', NULL, 'firosukeg@mailinator.com', NULL, NULL, '+1 (752) 664-1265', '$2y$10$5bIcodC6cAddWUzAHeaA0OIAOAhjUh3nVsIWIAVtebd4fUpKvjY82', NULL, '2023-08-10 15:05:11', '2023-08-10 15:05:11'),
(20, 152627, 'Bradley', 'Waters', '1978-05-20', 'sovesijaqi@mailinator.com', NULL, NULL, '+1 (982) 194-5009', '$2y$10$jp8fTW2knpQ5J3nqr0CA3O4VolIHpcXP/9xFd4/9bSyANeS491YWK', NULL, '2023-08-10 15:16:49', '2023-08-11 05:54:28'),
(21, 114757, 'Thor', 'Sweet', NULL, 'boxekedu@mailinator.com', NULL, NULL, '+1 (926) 902-3538', '$2y$10$j3TYpM.k99tQxShuC4fXguXLvVhoII2XN/u8jHZfOrN2uTfym7lbC', NULL, '2023-08-11 01:49:14', '2023-08-11 01:49:14'),
(22, NULL, 'Lane', 'Malone', NULL, 'zoxinewabi@mailinator.com', NULL, NULL, '+1 (706) 283-7231', '$2y$10$3Zekh5UHrMcrL3H4N.DcPea9gIftHQd8mYt.Vdk.TVkWiBwNUegq.', NULL, '2023-08-11 06:16:15', '2023-08-11 06:16:15'),
(23, 161157, 'Kyla', 'Rosario', NULL, 'zabij@mailinator.com', NULL, NULL, '+1 (893) 781-9094', '$2y$10$/.38P1lYLHSYvTNgG30cY.0LFSWFFEfSpU8UfOHkgiZG8yM1jW61W', NULL, '2023-08-11 06:17:17', '2023-08-11 06:17:17'),
(24, 161157, 'Kirsten', 'Houston', NULL, 'xycexi@mailinator.com', NULL, NULL, '+1 (773) 218-2288', '$2y$10$XYv9/bRizWsEINsEe5aeiOc1GPz/lYyilyMy36ZNczohqCLhzOaai', NULL, '2023-08-11 06:18:36', '2023-08-11 06:18:36'),
(25, 161157, 'Nicole', 'Lyons', NULL, 'cowyketu@mailinator.com', NULL, NULL, '+1 (644) 123-6269', '$2y$10$wT7rAo071jIEv5guvorUwuHmtEtdy4Xm/j/GcV13Aq7.y5NeKGfMG', NULL, '2023-08-11 06:20:45', '2023-08-11 06:20:45'),
(26, 162107, 'Moses', 'Kent', NULL, 'rohixywok@mailinator.com', NULL, NULL, '+1 (372) 767-8193', '$2y$10$NGiuQR8tbnjOfxN9AbUbTefGGA0THbWYJsO1dL8KQl9i.FcfMqwBm', NULL, '2023-08-11 06:21:20', '2023-08-11 06:21:20'),
(27, 162142, 'Edan', 'Benjamin', NULL, 'fabozite@mailinator.com', NULL, NULL, '+1 (679) 496-9382', '$2y$10$wDBxdCu6sSy0WJc.jiyXsuUQOWnUw91BVfmPUMFzyViRr8oCRWsl2', NULL, '2023-08-11 06:21:53', '2023-08-11 06:21:53'),
(28, 162503, 'Ali', 'Harris', NULL, 'womij@mailinator.com', NULL, NULL, '+1 (517) 501-9385', '$2y$10$p6bpuY/xO1U84aoAj5no/ugEJjTt13n62OTAZqy81L0loJZq1eXdG', NULL, '2023-08-11 06:25:18', '2023-08-11 06:25:18'),
(29, 211824, 'Dolan', 'Higgins', '2021-10-11', 'fubaq@mailinator.com', NULL, NULL, '+1 (886) 455-4244', '$2y$10$VWpxXib9Une35Ec0f3YpzebDNVc1zGJ5pefndUyHqmMMUB39h51/2', NULL, '2023-08-11 11:18:01', '2023-08-11 11:18:35'),
(30, 115740, 'asdsad', 'asdsda', NULL, 'asdads', NULL, NULL, 'asd', '$2y$10$RFoLbujHFuCpjFPzpWJIReId/h0HVanlagZ4.xzl5wYfXQ4cHrnw2', NULL, '2023-08-17 05:35:31', '2023-08-17 05:35:31'),
(31, 153805, 'Otto', 'Mckay', NULL, 'cuzopoha@mailinator.com', NULL, NULL, '+1 (636) 424-3082', '$2y$10$u8eKe8/TeuKv1QusYPVgpu9pAFfoTZDF3vyQZPX9.4UEOawm98MqW', NULL, '2023-08-17 06:36:41', '2023-08-17 06:36:41'),
(32, 213732, 'Leroy', 'Delacruz', NULL, 'kaqymowapu@mailinator.com', NULL, NULL, '+1 (629) 481-9741', '$2y$10$QRxF9AK9TpjuMaK3XgkvU.LxMH3Sxpk.WJf65Ixa9iCnyJUmVgS7S', NULL, '2023-08-17 11:38:34', '2023-08-17 11:38:34'),
(33, 213932, 'Francesca', 'Pratt', NULL, 'vice@mailinator.com', NULL, NULL, '+1 (909) 457-5258', '$2y$10$UuFubPnu87sw4EFxzGg0.u.VOfrxoWIPPYX3e.daJuxmbB8zF0Eam', NULL, '2023-08-17 11:40:23', '2023-08-17 11:40:23'),
(34, 214235, 'Rafael', 'Nicholson', NULL, 'cubojynyf@mailinator.com', NULL, NULL, '+1 (274) 138-5581', '$2y$10$lxnKkUI7OwraQpFMlAN5neLv7v5P7m7qy77wZEAqwUbgQPNwd4qk2', NULL, '2023-08-17 11:48:38', '2023-08-17 11:48:38'),
(35, 215914, 'TaShya', 'Shelton', NULL, 'vycylywe@mailinator.com', NULL, NULL, '+1 (719) 567-9335', '$2y$10$zknv1O2EbRKU1vGRYAE6re1I9knIb3l7aCwzeMcTtlLctWMD2lFtq', NULL, '2023-08-17 12:00:22', '2023-08-17 12:00:22'),
(36, 2713, 'Sarah', 'Berger', NULL, 'gokyl@mailinator.com', NULL, NULL, '+1 (894) 966-3758', '$2y$10$ivdE1RM24u8selX/5CKoAuGbhxUwXC5En201oGfaO7xyaMa1BM.5m', NULL, '2023-08-17 14:32:53', '2023-08-17 14:32:53'),
(37, 3519, 'Arden', 'Stevenson', NULL, 'pemupiky@mailinator.com', NULL, NULL, '+1 (409) 826-9177', '$2y$10$tGB5dR7zsptwTuzyCs5mt.LtC/kY8VwdDnG6pO710klVW2YGKE6UK', NULL, '2023-08-17 14:41:53', '2023-08-17 14:41:53'),
(38, NULL, 'Renee', 'Alston', '1986-07-24', 'weqeq@mailinator.com', NULL, NULL, '+1 (627) 447-3884', '$2y$10$xNwMQtsUZIncQSmJM4EcEuAUWs9AzCVhHMgMT5ceCaqMYvFkDRZgS', NULL, '2023-08-23 01:24:44', '2023-08-23 01:24:44'),
(39, 151607, 'Britanney', 'Cantu', NULL, 'bofaxuheco@mailinator.com', NULL, NULL, '+1 (853) 324-7777', '$2y$10$2jx7anfltPLP2AZCuqMtWehGGNzGR9d42C92llOF0i2u2HNofNzfy', NULL, '2023-08-25 05:21:14', '2023-08-25 05:21:14'),
(40, 212746, 'Ashely', 'Garner', NULL, 'pejukelis@mailinator.com', NULL, NULL, '+1 (784) 773-3181', '$2y$10$pGT1XMVR/znbt1E/RYD6FeFq3O7cCQxf1rAk3hrOuY1AvU8x9JOuq', NULL, '2023-08-29 11:29:17', '2023-08-29 11:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `featured_image` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `visa_documents` text DEFAULT NULL,
  `faq` text DEFAULT NULL,
  `arrival_visa_country` text DEFAULT NULL,
  `restricted_visa_country` text DEFAULT NULL,
  `term_condition` text DEFAULT NULL,
  `working_days` varchar(255) NOT NULL,
  `easy_documentation` varchar(255) NOT NULL,
  `online_payment` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visa`
--

INSERT INTO `visa` (`id`, `name`, `featured_image`, `price`, `description`, `visa_documents`, `faq`, `arrival_visa_country`, `restricted_visa_country`, `term_condition`, `working_days`, `easy_documentation`, `online_payment`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Australia Visa', 'xJsiWLKI5WqKifPos1nudI08J1saB7A32DO7gABK.jpg', '750', '<p>With its awe-inspiring blend of lively cities, coastal experiences, untouched wilderness, wildlife wonders, and natural diversity accompanied by laidback feel, Australia is easily one of the most sought-after vacation spots. So if you plan for a trip to this wonderful country, we can help you with all your travel arrangements including professional visa assistance. <br><br>As a specialist in international visa services, Rayna Tours offers prompt visa services to people who wish to travel to Australia from the UAE. Be it for holidaying or business purpose, our highly knowledgeable and experienced visa team will assist you through the meticulous procedures, from the expert advice on the selection of right visa as well as eligibility criteria to the submission of your application as per the rules and regulations to keep you updated till the approval and on time delivery of your Australian visa. <br><br>Make a quick enquiry of our visa services by filling out all relevant details, such as number of visas, travel date, and processing type. The rest is assured that our panel of experts will review your queries and get back to you at the earliest possible convenience, ensuring seamlessly quick visa processing. Depending on the type of visa, you\'ll be required to meet certain requirements for the approval of your visa. Please refer to the \'VisaDocuments\' section for the entire list. <br></p>', '<p><b>Clients Documents</b><br><br>&nbsp;&nbsp;&nbsp; Valid UAE residence Visa with 90 days validity<br>&nbsp;&nbsp;&nbsp; Original Passport Required (6 month validity with at least two blank page)<br>&nbsp;&nbsp;&nbsp; Original NOC letter stating salary, designation, joining date, travel purpose for employee addressing. Valid Trade License copy, Self-Introduction letter stating monthly income, passport details for Partners, Investors &amp; Owners.<br>&nbsp;&nbsp;&nbsp; 3 Recent Photograph with White Background (3.5*4.5 CM)<br>&nbsp;&nbsp;&nbsp; Invitation letter from friend or relative can be additional advantage<br>&nbsp;&nbsp;&nbsp; Invitation letter required for Business visa<br><br><b>Rayna Assistance&nbsp;&nbsp; &nbsp;</b><br><br>&nbsp;&nbsp;&nbsp; Application Form Filling assistance<br>&nbsp;&nbsp;&nbsp; Verification of Documents<br>&nbsp;&nbsp;&nbsp; Flight &amp; Hotel Booking assistance<br>&nbsp;&nbsp;&nbsp; Online Visa Application<br><br><b>Special Note</b><br><br>&nbsp;&nbsp;&nbsp; Holiday Packages available including flight, hotel, sightseeing &amp; transfers<br>&nbsp;&nbsp;&nbsp; Kindly submit all documents by email<br>&nbsp;&nbsp;&nbsp; Service fees &amp; Visa fees is non-refundable in case of rejection<br>&nbsp;&nbsp;&nbsp; Confirmed Return air ticket and hotel voucher is required at the airport during visit to Australia <br>&nbsp;&nbsp;&nbsp; It would be e-visa and client don’t need to visit Embassy for visa submission<br>&nbsp;&nbsp;&nbsp; Visa validity depends upon Embassy<br></p>', '<p><b>Is it mandatory to have a visa to enter or visit Australia?</b><br>To enter Australia, it is mandatory for all nationalities, except for Australians and New Zealanders, to have an approved visa or entry permit.</p><p><br><b>I am joined by my kids; do they need a visa to enter Australia?</b><br>Yes, all members, including your infants and kids, joining you in travel will need a valid visa to enter Australia.</p><p><br><b>What are the procedures to apply for an Australia Visa?</b><br>Simply speak to our visa specialists who will help you to choose the right visa that is suitable for your Australia trip. They will compile all documents, complete your visa application, and submit it on your behalf to the Australia Embassy. Apart from these, our team will keep you abreast of your application status till it is approved on time.</p><p><br><b>Who can apply for an Australia visa through Rayna Tours?</b><br>Our Australia Visa service is open to the UAE nationalities and UAE residents only.</p><p><br><b>What are the documents and requirements for the application of Australia Visa?</b><br>To apply for an Australia Visa, you will need following documents:<br>- Original passport with a validity of at least six months<br>- UAE Residence Visa valid for at least 90 days<br>- Three recent photograph taken against white background<br>- NOC letter from employer and invitation letter from your acquaintance in Australia</p><p><br><b>Is it possible to extend my Australia Visa?</b><br>This depends on your visa type. Contact our visa experts for more details or assistance.</p><p><br><b>How many days will it take for Australia Visa processing?</b><br>Dependent on your visa choice, it takes somewhere from 25 days to 30 days for the processing of your Australia visa application.</p><p><br><b>Do you make refund in case my Australia visa is rejected?</b><br>Visa fee cannot be refunded in case your Australia application is rejected as the issuing authority mostly does not repay the amount.</p>', 'BRUNEI, Canada, Hong Kong, Japan, Malaysia, Singapore, South Korea, United States', 'Restricted Country Not Available.', '<p><b>Terms &amp; Conditions</b><br><br>These terms and conditions form the legal basis for Rayna Tours\' international visa services. By submitting your visa application through www.raynatours.com, you give your irrevocable consent to access our website and book our visa packages in line with and as per the following terms, which comprise the entire agreement between you (customer, client or applicant) and Rayna Tours LLC. So, we request you to read and carefully comprehend all the requirements and restraints stipulated herein, before you choose Rayna Tours LLC for international visa services. &nbsp;<br><br><b>1. Scope &amp; Procedures </b><br><br>Rayna Tours provides all individuals (mainly UAE residents), except for Qatar &amp; Azerbaijan nationals, who wish to travel to a foreign country with professional visa services. In this capacity, our specialist visa consultants accurately help clients to choose the most appropriate visa package, handle all documentation, and submit application on their behalf at the respective country\'s consulate, thus ensuring the approval of visa in a timely manner. <br><br>However, Rayna Tours shall not be held liable if a consulate or embassy makes a delay or fail to approve the visa for any reason that includes but not limited to: <br><br>&nbsp;&nbsp;&nbsp; Incomplete application forms <br>&nbsp;&nbsp;&nbsp; Error or omission of information &nbsp;<br>&nbsp;&nbsp;&nbsp; Missing or ambiguity of valid supporting documents <br>&nbsp;&nbsp;&nbsp; Non-booking of airline tickets <br><br>All or any expense suffered by the client due to the above mentioned shall not be the responsibility of Rayna Tours. Upon your request, Rayna Tours LLC can book air tickets as part of visa services. Unless otherwise it\'s not a requisite specified by a consulate, it\'s always advisable to purchase airline tickets and book hotel accommodation upon the approval of your visa. Further, we suggest you to check with airlines for further information, if you need to make a booking of transit flight for your intended journey, as transit visa policies vary depending on your nationality and the country you intend to visit. &nbsp;<br><br>2. Documentation <br><br>&nbsp;&nbsp;&nbsp; Prior to traveling, you must make sure that you\'ve obtained all documents necessitated by the issuing authority to gain smooth entry to the destination you plan to visit. Most countries require that your passport carry at least six months validity from the date you plan to leave the country.<br>&nbsp;&nbsp;&nbsp; For the processing of your visa application, make sure that you send your passport and all other relevant details within the specified timescale. By sending us your vital documents, you approve to abide by all requirements and explicitly agree that Rayna Tours LLC shall hand over these documents to you only after the completion of visa procedures by the issuing authority.<br>&nbsp;&nbsp;&nbsp; Embassies mostly provide appointments on first come basis. Appointments may change if we do not receive all your relevant documents.<br>&nbsp;&nbsp;&nbsp; Upon the completion of all procedures, Rayna Tours LLC exercises reasonable care and diligence in returning all your vital documents including appointment letter, flight voucher, hotel voucher and travel insurance. It is your responsibility to acknowledge its receipt via email. No further changes shall be accepted in the event we do not receive your email on the same day itself. Moreover, additional charges apply for any change.<br>&nbsp;&nbsp;&nbsp; Once you are in receipt of the visa, make sure that you notify us via email the same day itself, along with any discrepancy identified in your documentation. This is extremely important, as failing to do so shall be deemed as the acceptance of visa in the correct manner. Apparently, Rayna Tours LLC shall accept no liability caused due to any delay from your side.<br>&nbsp;&nbsp;&nbsp; It is your responsibility to notify us in advance regarding any additional requirement or changes in your travel plan. We do not accept any liability in connection with your inability or failure to comply with any such requirement.<br><br>3. Fee &amp; Payment Mode <br><br>In order to avail of our visa services, you shall pay a processing fee as specified by the issuing authority, apart from all related service charges. When it comes to payment mode, it can be done through a valid credit card, debit card or online bank transfer while ensuring that your payment will be processed and billed on immediate basis. Please be informed that this processing fee, along with visa application requisites, is subject to change without any prior notice. <br><br>4. Processing Time <br><br>The visa processing time varies from country to country. All visa application processing time (including urgent services) specified by Rayna Tours LLC are only estimates, construed in accordance with our several years of experience dealing with major consulates and embassies. The processing time usually begins the next day of receiving your visa application and excludes all or any public holidays. Immigration working days are from Sunday through Thursday. Besides UAE and their respective national holidays, an embassy or consulate may be closed without any prior notice. In fact, in no event, should Rayna Tours LLC be held responsible for the delayed approval of your visa. <br><br>5. Approval and Rejection of Visas <br><br>Once we submit your visa application, all evaluations associated with it are conducted by the respective consulate or embassy. Apparently, the grant or denial of your visa is at the sole discretion of the issuing authority, and Rayna Tours LLC possesses no legal capacity to provide assurance of your visa approval. <br><br>6. Policies on Cancellation &amp; Refund <br><br>• Following the opening of your visa file and submission of your visa application, all payment made to the consulate or embassy on your behalf is non-refundable, no matter your visa is approved or not. The processing fee is refundable only if you choose to cancel the service prior to forwarding your visa application to the issuing authority. In such cases, you may be entitled for a partial refund equivalent to not more than 50% of the fee, as the refund does not cover any administration, service or banking charges. <br><br>• After the submission of your visa application, Rayna Tours LLC shall not be held responsible for any loss or refund in the event of any sudden change in visa policies by the Embassy or Consulate. <br><br>• In order to cancel your visa application, log into your Rayna account and click \'Cancel\' or \'Delete\' option. Furthermore, in any event, we shall not recompense credit card payment of more than one month old, but instead offers a service credit which can be used for any upcoming visa application however made through Rayna Tours LLC only.<br><br>• The information on visa packages, pricing, and other details listed on the website are subject to alterations or amendments without any prior notice. We, therefore, request our clients and other interested parties to visit our website from time to time and review our terms and conditions\' most up-to-date version.<br><br>7. Privacy Policy<br><br>Click here to view the Privacy Policy in connection with our privacy practices for international visa services.<br><br>8. Use of Intellectual Property<br><br>All text, information, images and content contained in this website are sole proprietary to Rayna Tours LLC and protected by copyright laws. We, therefore, hold the complete authority to stop the access to all or any part of the website at any time, without any intimation, to resolve technical issues or for any other purposes.<br><br>The users or visitors may view the information provided on the website. Nevertheless, it is strictly prohibited to use the content or other materials displayed on the website for any such act as copying, publishing, altering, re-posting or selling. Moreover, any illegal use of logo, trademark or company name may subject the user to penalties.<br><br>Rayna Tours LLC is not liable for the information or materials of any other web pages linked to Raynatours.com. In fact, clicking the links of other web pages should be done at your own risk. <br><br>9. Applicable Law &amp; Language<br><br>The UAE Law is the applicable law, which exclusively governs everything associated with this Terms and Conditions. Both parties irrevocably accept that federal courts of the UAE (United Arab Emirates) will be the exclusive jurisdiction to resolve any dispute or disagreement emanating from visa services provided by Rayna Tours LLC.<br><br>Every correspondence or notice concerning the use of our system must be in writing in the English Language only. Accordingly, Rayna Tours LLC is not responsible for any error or spelling mistakes in any document provided in any other language other than English.<br><br>10. Indemnify<br><br>By making a reservation with Rayna Tours LLC, the user agrees to indemnify Rayna Tours LLC in opposition to any damage, expense or losses as a result of:<br><br>&nbsp;&nbsp;&nbsp; Encroachment of Rayna Tours\' Terms and Conditions<br>&nbsp;&nbsp;&nbsp; Fraudulent act by the client or his representatives or employees<br>&nbsp;&nbsp;&nbsp; Action, claim or proceeding by a third party in opposition to Rayna Tours LLC due to the breaches or misrepresentations from the client\'s side<br><br>11. Disclaimer<br><br>Rayna Tours LLC, its contractors, partners or suppliers do not represent that the materials provided on this website is perfect, comprehensive, or up to date. While it is true that we make constant effort to ensure the accurateness of its content, the website may contain certain imprecision and errors. We disclaim all warranties pertaining to the visa information, software, and service packages listed on this website. This covers every implied and express contract of non-encroachment and merchantability.<br><br>Rayna Tours LLC does not guarantee that the products or service packages made available through this website is free of any mistake or virus and would fulfill your needs. Nevertheless, by employing the latest technological innovations, we strive to assure you of a safe and unperturbed booking experience with us.<br><br>12. Complaints<br><br>If you have any complaint or query related to our visa services, you can communicate forthwith to our team on our toll free number: 80072962. Once you submit your application through Rayna Tours LLC, you agree that you shall not post any complaint or negative remark with regard to delay or rejection of visa by the issuing authority or by any other means on any of our social media pages, online or offline, without the prior written permission of Rayna Tours LLC.<br>Documentation<br></p>', 'Normal 25-30 Working Days', 'Easy Documentation', 'Online Payment Option', 'australia-visa', 1, '2023-05-31 03:07:35', '2023-05-31 03:07:35'),
(5, 'Azerbaijan Visa', '4dqQ2XF7j3rLydA9rbHZJ5lsYrdd2Z9Gwuu8yBjz.jpg', '350', '<p>There is no simplified way to obtain Azerbaijan visa than with Rayna \r\nTours. After all, Rayna Tours is an expert in arranging different types \r\nof to all UAE residents who are looking to make a hassle-free trip to \r\nAzerbaijan. While citizens of nine countries such as Russia, Ukraine, \r\nGeorgia, and Uzbekistan can enter Azerbaijan without a visa and stay \r\nhere for 90 days, nationals of certain countries like China, Qatar, \r\nSaudi Arabia, South Korea, and UAE are eligible for a visa on arrival \r\nthat is valid for 30 days. Apparently, all other nationalities should \r\nobtain a visa in order to visit Azerbaijan.<br><br>When you count on \r\nRayna Tours for your Azerbaijan visit, you can be absolutely \r\ntension-free, as no hectic appointments or time-consuming embassy visits\r\n are required for the approval of your Azerbaijan visa. In order to \r\napply for your Azerbaijan e-Visa, all you\'ve to do is to send us your \r\npassport, recent photographs, and finally, fill out a brief online visa \r\napplication form. Our qualified team of visa consultants has over a \r\ndecade\'s experience in offering all-inclusive travel management \r\nservices, and hence can help you with extremely professional and \r\nimpartial guidance in every step of your Azerbaijan visa application.<br><br>With\r\n a highly successful and proven track record in the international visa \r\nservices, we ensure that your visa application will be successfully \r\nsubmitted with all right documents, thereby eliminating all chances of \r\nits rejection. Apart from this, we also offer express visa services to \r\ncater to your urgent travel requirements.<br></p>', '<p><b>Clients Documents :</b><br><br>&nbsp;&nbsp;&nbsp; Passport should&nbsp; have 6 month validity with at least two blank page. <br>&nbsp;&nbsp;&nbsp; Valid UAE residence Visa with 90 days validity<br>&nbsp;&nbsp;&nbsp; Photo<br><br><b>Rayna Assistance :</b><br><br>&nbsp;&nbsp;&nbsp; Application submission at embassy&nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp; Application Form Filling assistance<br>&nbsp;&nbsp;&nbsp; Verification of Documents<br>&nbsp;&nbsp;&nbsp; Flight &amp; Hotel Booking assistance<br><br><b>Special Note :</b><br><br>&nbsp;&nbsp;&nbsp; Service Fees &amp; Visa fees is non-refundable in case of rejection<br>&nbsp;&nbsp;&nbsp; Confirmed Return air ticket and hotel voucher is required at the airport during visit to Oman<br>&nbsp;&nbsp;&nbsp; Visa must be used for entry to Azerbaijan within 3 months of approval<br>&nbsp;&nbsp;&nbsp; Traveler must enter Azerbaijan directly from a Any country.<br>&nbsp;&nbsp;&nbsp; A servant can only enter Azerbaijan if the accompanying employer is also accompanied by his family<br>&nbsp;&nbsp;&nbsp; Length of stay Azerbaijan in is 30 Days <br></p><p></p>', '<p><b>Is it mandatory for me to obtain a visa to enter Azerbaijan?</b><br>Visa is mandatory for all UAE citizens with multi nationalities to travel to Azerbaijan.</p><p><br><b>Do infants and kids require visa to enter Azerbaijan?</b><br>All infants as well as kids traveling with their UAE Citizen parent will require a visa to enter the Azerbaijan.</p><p><br><b>How should I apply for a Azerbaijan visa from another country?</b><br>All GCC Citizens can apply for International visas with us, send us enquiry at intvisas@raynatours.com.</p><p><b><br>What are the benefits of applying for visa through Rayna Tours?</b><br>By\r\n contacting Rayna Tours for your visa application needs, you can \r\neliminate the need for a local sponsor in the Azerbaijan. Minimal \r\ndocumentation quick processing is another of the key highlights. In most\r\n case, the visa processing takes only ten working days.</p><p><br><b>What are the different types of visa that I can apply for in UAE?</b><br>Depending\r\n on the duration or number of days you wish to spend in Azerbaijan, \r\ndifferent types of visas include tourist visa, transit visa, and visit \r\nvisa.</p><p><br><b>Can I book my ticket before applying for visa? </b><br>Yes,you\r\n can book your tickets to Azerbaijan&nbsp; before applying or processing of \r\nvisa,But for confirming same you can ask to our visa specialists.</p><p><br><b>How many days will it take to get a visa? </b><br>Visa\r\n processing usually take 4 working days. But this largely depends on the\r\n prompt submission of required documents as well as the meeting of \r\neligibility norms.</p><p><br><b>How about visa application fee? </b><br>To\r\n inquire about your visa application fee or discuss any visa-related \r\nquery, call our travel experts on 80072962 or email to \r\nintvisas@raynatours.com. We’ll promptly respond to your questions on \r\nvisa.</p><p><br><b>Is it possible for me to track the status of my visa application? </b><br>Upon\r\n the successful filling out of the visa application form, You can also \r\nget in touch with our visa agents to know your visa application status.</p><p><br><b>Is visa fee refunded in case my application is rejected? </b><br>This is not possible, as the immigration authority do not recompense for the rejected visa applications.</p><p><br><b>Can I know the reason of visa rejection? </b><br>The\r\n immigration authorities, at most, do not reveal the reasons for the \r\nrefusal of a visa, but in some cases it may get reason from Immigration.</p><p><br><b>What is the mode of receiving visa?</b><br>Once your visa is processed,&nbsp; it will be sent by email.<br></p><p></p>', 'Hong Kong, Japan, Malaysia, Singapore, Bahrain, China, Hong Kong, Indonesia, Iran, Israel, Japan, Kuwait, Macau, Malaysia, Oman, Qatar, Saudi Arabia, Singapore, United Arab Emirates, South Korea', 'Restricted Country Not Available.', '<p>These terms and conditions form the legal basis for Rayna Tours\' \r\ninternational visa services. By submitting your visa application through\r\n www.raynatours.com, you give your irrevocable consent to access our \r\nwebsite and book our visa packages in line with and as per the following\r\n terms, which comprise the entire agreement between you (customer, \r\nclient or applicant) and Rayna Tours LLC. So, we request you to read and\r\n carefully comprehend all the requirements and restraints stipulated \r\nherein, before you choose Rayna Tours LLC for international visa \r\nservices. &nbsp;<br><br><b>1. Scope &amp; Procedures </b><br><br>Rayna Tours \r\nprovides all individuals (mainly UAE residents), except for Qatar &amp; \r\nAzerbaijan nationals, who wish to travel to a foreign country with \r\nprofessional visa services. In this capacity, our specialist visa \r\nconsultants accurately help clients to choose the most appropriate visa \r\npackage, handle all documentation, and submit application on their \r\nbehalf at the respective country\'s consulate, thus ensuring the approval\r\n of visa in a timely manner. <br><br>However, Rayna Tours shall not be \r\nheld liable if a consulate or embassy makes a delay or fail to approve \r\nthe visa for any reason that includes but not limited to: <br><br>&nbsp;&nbsp;&nbsp; Incomplete application forms <br>&nbsp;&nbsp;&nbsp; Error or omission of information &nbsp;<br>&nbsp;&nbsp;&nbsp; Missing or ambiguity of valid supporting documents <br>&nbsp;&nbsp;&nbsp; Non-booking of airline tickets <br><br>All\r\n or any expense suffered by the client due to the above mentioned shall \r\nnot be the responsibility of Rayna Tours. Upon your request, Rayna Tours\r\n LLC can book air tickets as part of visa services. Unless otherwise \r\nit\'s not a requisite specified by a consulate, it\'s always advisable to \r\npurchase airline tickets and book hotel accommodation upon the approval \r\nof your visa. Further, we suggest you to check with airlines for further\r\n information, if you need to make a booking of transit flight for your \r\nintended journey, as transit visa policies vary depending on your \r\nnationality and the country you intend to visit. &nbsp;<br><b><br>2. Documentation </b><br><br>&nbsp;&nbsp;&nbsp;\r\n Prior to traveling, you must make sure that you\'ve obtained all \r\ndocuments necessitated by the issuing authority to gain smooth entry to \r\nthe destination you plan to visit. Most countries require that your \r\npassport carry at least six months validity from the date you plan to \r\nleave the country.<br>&nbsp;&nbsp;&nbsp; For the processing of your visa application, \r\nmake sure that you send your passport and all other relevant details \r\nwithin the specified timescale. By sending us your vital documents, you \r\napprove to abide by all requirements and explicitly agree that Rayna \r\nTours LLC shall hand over these documents to you only after the \r\ncompletion of visa procedures by the issuing authority.<br>&nbsp;&nbsp;&nbsp; Embassies\r\n mostly provide appointments on first come basis. Appointments may \r\nchange if we do not receive all your relevant documents.<br>&nbsp;&nbsp;&nbsp; Upon the\r\n completion of all procedures, Rayna Tours LLC exercises reasonable care\r\n and diligence in returning all your vital documents including \r\nappointment letter, flight voucher, hotel voucher and travel insurance. \r\nIt is your responsibility to acknowledge its receipt via email. No \r\nfurther changes shall be accepted in the event we do not receive your \r\nemail on the same day itself. Moreover, additional charges apply for any\r\n change.<br>&nbsp;&nbsp;&nbsp; Once you are in receipt of the visa, make sure that you \r\nnotify us via email the same day itself, along with any discrepancy \r\nidentified in your documentation. This is extremely important, as \r\nfailing to do so shall be deemed as the acceptance of visa in the \r\ncorrect manner. Apparently, Rayna Tours LLC shall accept no liability \r\ncaused due to any delay from your side.<br>&nbsp;&nbsp;&nbsp; It is your responsibility\r\n to notify us in advance regarding any additional requirement or changes\r\n in your travel plan. We do not accept any liability in connection with \r\nyour inability or failure to comply with any such requirement.<br><br><b>3. Fee &amp; Payment Mode </b><br><br>In\r\n order to avail of our visa services, you shall pay a processing fee as \r\nspecified by the issuing authority, apart from all related service \r\ncharges. When it comes to payment mode, it can be done through a valid \r\ncredit card, debit card or online bank transfer while ensuring that your\r\n payment will be processed and billed on immediate basis. Please be \r\ninformed that this processing fee, along with visa application \r\nrequisites, is subject to change without any prior notice. <br><br><b>4. Processing Time </b><br><br>The\r\n visa processing time varies from country to country. All visa \r\napplication processing time (including urgent services) specified by \r\nRayna Tours LLC are only estimates, construed in accordance with our \r\nseveral years of experience dealing with major consulates and embassies.\r\n The processing time usually begins the next day of receiving your visa \r\napplication and excludes all or any public holidays. Immigration working\r\n days are from Sunday through Thursday. Besides UAE and their respective\r\n national holidays, an embassy or consulate may be closed without any \r\nprior notice. In fact, in no event, should Rayna Tours LLC be held \r\nresponsible for the delayed approval of your visa. <br><br><b>5. Approval and Rejection of Visas </b><br><br>Once\r\n we submit your visa application, all evaluations associated with it are\r\n conducted by the respective consulate or embassy. Apparently, the grant\r\n or denial of your visa is at the sole discretion of the issuing \r\nauthority, and Rayna Tours LLC possesses no legal capacity to provide \r\nassurance of your visa approval. <br><br><b>6. Policies on Cancellation &amp; Refund </b><br><br>•\r\n Following the opening of your visa file and submission of your visa \r\napplication, all payment made to the consulate or embassy on your behalf\r\n is non-refundable, no matter your visa is approved or not. The \r\nprocessing fee is refundable only if you choose to cancel the service \r\nprior to forwarding your visa application to the issuing authority. In \r\nsuch cases, you may be entitled for a partial refund equivalent to not \r\nmore than 50% of the fee, as the refund does not cover any \r\nadministration, service or banking charges. <br><br>• After the \r\nsubmission of your visa application, Rayna Tours LLC shall not be held \r\nresponsible for any loss or refund in the event of any sudden change in \r\nvisa policies by the Embassy or Consulate. <br><br>• In order to cancel \r\nyour visa application, log into your Rayna account and click \'Cancel\' or\r\n \'Delete\' option. Furthermore, in any event, we shall not recompense \r\ncredit card payment of more than one month old, but instead offers a \r\nservice credit which can be used for any upcoming visa application \r\nhowever made through Rayna Tours LLC only.<br><br>• The information on \r\nvisa packages, pricing, and other details listed on the website are \r\nsubject to alterations or amendments without any prior notice. We, \r\ntherefore, request our clients and other interested parties to visit our\r\n website from time to time and review our terms and conditions\' most \r\nup-to-date version.<br><br><b>7. Privacy Policy</b><br><br>Click here to view the Privacy Policy in connection with our privacy practices for international visa services.<br><b><br>8. Use of Intellectual Property</b><br><br>All\r\n text, information, images and content contained in this website are \r\nsole proprietary to Rayna Tours LLC and protected by copyright laws. We,\r\n therefore, hold the complete authority to stop the access to all or any\r\n part of the website at any time, without any intimation, to resolve \r\ntechnical issues or for any other purposes.<br><br>The users or visitors\r\n may view the information provided on the website. Nevertheless, it is \r\nstrictly prohibited to use the content or other materials displayed on \r\nthe website for any such act as copying, publishing, altering, \r\nre-posting or selling. Moreover, any illegal use of logo, trademark or \r\ncompany name may subject the user to penalties.<br><br>Rayna Tours LLC \r\nis not liable for the information or materials of any other web pages \r\nlinked to Raynatours.com. In fact, clicking the links of other web pages\r\n should be done at your own risk. <br><br><b>9. Applicable Law &amp; Language</b><br><br>The\r\n UAE Law is the applicable law, which exclusively governs everything \r\nassociated with this Terms and Conditions. Both parties irrevocably \r\naccept that federal courts of the UAE (United Arab Emirates) will be the\r\n exclusive jurisdiction to resolve any dispute or disagreement emanating\r\n from visa services provided by Rayna Tours LLC.<br><br>Every \r\ncorrespondence or notice concerning the use of our system must be in \r\nwriting in the English Language only. Accordingly, Rayna Tours LLC is \r\nnot responsible for any error or spelling mistakes in any document \r\nprovided in any other language other than English.<br><br><b>10. Indemnify</b><br><br>By\r\n making a reservation with Rayna Tours LLC, the user agrees to indemnify\r\n Rayna Tours LLC in opposition to any damage, expense or losses as a \r\nresult of:<br><br>&nbsp;&nbsp;&nbsp; Encroachment of Rayna Tours\' Terms and Conditions<br>&nbsp;&nbsp;&nbsp; Fraudulent act by the client or his representatives or employees<br>&nbsp;&nbsp;&nbsp;\r\n Action, claim or proceeding by a third party in opposition to Rayna \r\nTours LLC due to the breaches or misrepresentations from the client\'s \r\nside<br><br><b>11. Disclaimer</b><br><br>Rayna Tours LLC, its \r\ncontractors, partners or suppliers do not represent that the materials \r\nprovided on this website is perfect, comprehensive, or up to date. While\r\n it is true that we make constant effort to ensure the accurateness of \r\nits content, the website may contain certain imprecision and errors. We \r\ndisclaim all warranties pertaining to the visa information, software, \r\nand service packages listed on this website. This covers every implied \r\nand express contract of non-encroachment and merchantability.<br><br>Rayna\r\n Tours LLC does not guarantee that the products or service packages made\r\n available through this website is free of any mistake or virus and \r\nwould fulfill your needs. Nevertheless, by employing the latest \r\ntechnological innovations, we strive to assure you of a safe and \r\nunperturbed booking experience with us.<br><br><b>12. Complaints</b><br><br>If\r\n you have any complaint or query related to our visa services, you can \r\ncommunicate forthwith to our team on our toll free number: 80072962. \r\nOnce you submit your application through Rayna Tours LLC, you agree that\r\n you shall not post any complaint or negative remark with regard to \r\ndelay or rejection of visa by the issuing authority or by any other \r\nmeans on any of our social media pages, online or offline, without the \r\nprior written permission of Rayna Tours LLC.<br>Documentation<br></p><p></p>', 'Normal 4 to 5 working Days Working Days', 'Easy Documentation', 'Online Payment Option', 'azerbaijan-visa', 1, '2023-05-31 05:54:04', '2023-05-31 05:54:04'),
(12, 'Geoffrey Obrien', 'SWdb2R8anBem1qW7k27WCc7d3VdreYY0CEPBYJPt.jpg', '500', 'sadsadas', 'sadsadas', 'sadsadas', 'Keefe Strickland', 'Axel Weeks', NULL, 'Sylvester Ferguson', 'Yvonne Garrison', 'Fletcher Gilbert', 'geoffrey-obrien', 1, '2023-08-12 11:16:42', '2023-08-12 16:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `visa_prices`
--

CREATE TABLE `visa_prices` (
  `id` int(11) NOT NULL,
  `visa_id` int(11) NOT NULL,
  `visa_name` varchar(255) NOT NULL,
  `processing_type_normal` varchar(255) DEFAULT NULL,
  `processing_type_express` varchar(255) DEFAULT NULL,
  `travel_date_end` varchar(255) NOT NULL,
  `visa_price` varchar(255) NOT NULL,
  `visa_price_e` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visa_prices`
--

INSERT INTO `visa_prices` (`id`, `visa_id`, `visa_name`, `processing_type_normal`, `processing_type_express`, `travel_date_end`, `visa_price`, `visa_price_e`, `created_at`, `updated_at`) VALUES
(2, 4, 'Australia Visa - subclass 600', '1', '0', '2022-05-05', '7500', NULL, '2023-05-31 03:07:35', '2023-08-04 18:22:46'),
(3, 5, 'Azerbaijan E visa', '1', '1', '2022-05-05', '300', '200', '2023-05-31 05:54:04', '2023-08-04 18:52:19'),
(4, 5, 'Azerbaijan Urgent E-visa', '1', '1', '2022-05-05', '500', '300', '2023-05-31 05:54:04', '2023-08-04 18:40:10'),
(6, 12, 'Mark Day', '1', '0', '1994-02-15', '500', '550', '2023-08-12 11:16:42', '2023-08-12 11:16:42'),
(7, 12, 'sasad', '1', '1', '2023-08-12', '600', '650', '2023-08-12 11:16:42', '2023-08-12 16:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `product_id`, `activity_id`, `quantity`, `user_id`, `created_at`, `updated_at`) VALUES
(53, NULL, 3, 1, 2, '2023-07-17 01:27:24', '2023-07-17 01:27:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_gallery_images`
--
ALTER TABLE `activity_gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Gallery_Activity_Id` (`activity_id`);

--
-- Indexes for table `activity_price`
--
ALTER TABLE `activity_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Test_Activity_Id` (`activity_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `activity` (`activity_id`),
  ADD KEY `sadas` (`visa_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_coupon`
--
ALTER TABLE `discount_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_product`
--
ALTER TABLE `enquiry_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `processing`
--
ALTER TABLE `processing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visa_prices`
--
ALTER TABLE `visa_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visa` (`visa_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test1` (`product_id`),
  ADD KEY `test2` (`user_id`),
  ADD KEY `eteas` (`activity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `activity_gallery_images`
--
ALTER TABLE `activity_gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `activity_price`
--
ALTER TABLE `activity_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `discount_coupon`
--
ALTER TABLE `discount_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `enquiry_product`
--
ALTER TABLE `enquiry_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `processing`
--
ALTER TABLE `processing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
