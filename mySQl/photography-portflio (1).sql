-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 18, 2023 at 10:21 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photography-portflio`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

DROP TABLE IF EXISTS `tbl_about`;
CREATE TABLE IF NOT EXISTS `tbl_about` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title1` varchar(100) NOT NULL,
  `title2` varchar(100) NOT NULL,
  `title3` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `text1` text NOT NULL,
  `text2` text NOT NULL,
  `text3` text NOT NULL,
  `display` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `title1`, `title2`, `title3`, `image_name`, `text1`, `text2`, `text3`, `display`) VALUES
(1, 'PHOTOGRAPHER', 'WHO AM I?', '', 'image_about_822.webp', 'The cab arrived late. The inside was in as bad of shape as the outside which was concerning, and it didn&#39;t appear that it had been cleaned in months. The green tree air-freshener hanging from the rearview mirror was either exhausted of its scent or not strong enough to overcome the other odors emitting from the cab. The correct decision, in this case, was to get the hell out of it and to call another cab, but she was late and didn&#39;t have a choice.', '', '', 'YES'),
(2, '+50\r\n', 'PROJECTS COMPLETED\r\n', '', 'image_about_5691.jpg', 'Over the past ten years, I have completed over 50 Photography projects including Shotting/Clip-Video, Video-Maker/Studio Portais/Events, and Marketing things.\r\n\r\n', '', '', 'YES'),
(3, 'Photographer', 'Marketing', 'Video Maker', '', 'Understand the clients subject matter completely and build on the knowledge related to it, becoming intimately familiar with the subject matter. Determine methods to address the specific customers needs and requirements.', 'Understand the clients subject matter completely and build on the knowledge related to it, becoming intimately familiar with the subject matter. Determine methods to address the specific customers needs and requirements.', 'Understand the clients subject matter completely and build on the knowledge related to it, becoming intimately familiar with the subject matter. Determine methods to address the specific customers needs and requirements.', 'YES'),
(4, 'Photographer', '', '', 'image_about_9893.png', '&#34;It&#39;s never good to give them details,&#34; Janice told her sister. &#34;Always be a little vague and keep them guessing.&#34; Her sister listened intently and nodded in agreement. She didn&#39;t fully understand what her sister was saying but that didn&#39;t matter. She loved her so much that she would have agreed to whatever came out of her mouth.', '', '', 'YES'),
(5, 'Photographer', '', '', 'image_about_2800.png', 'It was a concerning development that he couldn&#39;t get out of his mind. He&#39;d had many friends throughout his early years and had fond memories of playing with them, but he couldn&#39;t understand how it had all stopped. There was some point as he grew up that he played with each of his friends for the very last time, and he had no idea that it would be the last.', '', '', 'YES'),
(6, 'Photographer', 'Marketing', '', 'image_about_9925.webp', 'Green vines attached to the trunk of the tree had wound themselves toward the top of the canopy. Ants used the vine as their private highway, avoiding all the creases and crags of the bark, to freely move at top speed from top to bottom or bottom to top depending on their current chore. At least this was the way it was supposed to be. Something had damaged the vine overnight halfway up the tree leaving a gap in the once pristine ant highway.', '', 'Green vines attached to the trunk of the tree had wound themselves toward the top of the canopy. Ants used the vine as their private highway, avoiding all the creases and crags of the bark, to freely move at top speed from top to bottom or bottom to top depending on their current chore. At least this was the way it was supposed to be. Something had damaged the vine overnight halfway up the tree leaving a gap in the once pristine ant highway.', 'YES'),
(7, 'HOW DID I GET HERE?', '', '', '', 'I have always been a creative. When I was in middle school I asked my parents for a little point and shoot camera so that I could take pictures with my friends Once I got the camera I ended up rarely using it for what I had originally intended. go on walks and take pictures of flowers, and landscapes. Capturing someone&#39;s love story felt so significant to me and I haven&#39;t stopped since!\r\n\r\n', '', '', 'YES'),
(8, 'moncef.lakehal@outlook.com', 'PH Number: +213656711226', '', '', '', '', '', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'moncef', 'lak', 'moncefmoncef'),
(3, 'moncefmoncef', 'moncefmoncef', 'aa925c658f1fbf1a6dc4caef72687fcbc35f18b9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `favories` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `comment`, `favories`) VALUES
(15, 'Nature', 'image_category_8423.webp', 'Trees. It was something about the trees. The way they swayed with the wind in unison. The way they shaded the area around them. The sounds of their', 'NO'),
(16, 'Food', 'image_category_9113.webp', 'Trees. It was something about the trees. The way they swayed with the wind in unison. The way they shaded the area around them. The sounds of their', 'YES'),
(21, 'Travel', 'image_category_7384.webp', 'Trees. It was something about the trees. The way they swayed with the wind in unison. The way they shaded the area around them. The sounds of their', 'YES'),
(10, 'Beatch', 'image_category_1919.webp', 'Best Way To Rest', 'NO'),
(18, 'Portrais', 'image_category_7965.webp', 'All The Face', 'YES'),
(22, 'Cars', 'image_category_7628.webp', 'Trees. It was something about the trees. The way they swayed with the wind in unison. The way they shaded the area around them. The sounds of their', 'YES'),
(23, 'Sports', 'image_category_1750.webp', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'YES'),
(24, 'Animals', 'image_category_4636.webp', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `custome_contact` int(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_adress` varchar(255) NOT NULL,
  `customer_subject` varchar(255) NOT NULL,
  `customer_message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `date`, `customer_name`, `custome_contact`, `customer_email`, `customer_adress`, `customer_subject`, `customer_message`) VALUES
(1, '2021-05-21 14:01:34', 'dq', 12334, 'DQSQ', 'DSQSA', 'DFD', 'dfsfdsfdc'),
(2, '2021-05-22 22:25:48', 'Moncef', 656711226, 'moncifmoncif10@gmail.com', 'Ain Naadja', 'Wedding', 'For Family Wedding'),
(4, '2021-05-27 15:10:05', 'Fatiha', 5463634, 'moncifmoncif10@gmail.com', 'dsqsqd', 'wedding', 'nashha9 3arss photography'),
(5, '2021-05-28 15:58:29', 'moncef', 138381388, 'moncifmoncif10@gmail.com', 'oued smar', 'chkoupi', 'roh t9awadh 3aytly'),
(6, '2021-08-03 14:04:23', 'PaP5wUEcdE', 660650, 'duuuc@by0x.com', 'QAgUJP0ioH', 'HwxHektjni', '0qFkw1OMhU');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

DROP TABLE IF EXISTS `tbl_gallery`;
CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `key_word` varchar(255) NOT NULL,
  `Verticalement_or_Horizontale` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `favories` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `title`, `image_name`, `category_id`, `price`, `description`, `key_word`, `Verticalement_or_Horizontale`, `sex`, `year`, `favories`, `active`) VALUES
(10, 'Pizza', 'image_gallery_2130.webp', 16, '650.00', 'Pizza Margreta', 'pizza/Restaurent', 'Horizontale', 'BOTH', '2020', 'NO', 'YES'),
(11, 'Momo', 'image_gallery_2802.webp', 16, '500.00', 'China Food And Japan', 'china/japan/food', 'Horizontale', 'BOTH', '2015', 'YES', 'YES'),
(12, 'Burger', 'image_gallery_9419.webp', 16, '200.00', 'Amerecan Bergur', 'america/food/bergur', 'Horizontale', 'BOTH', '2015', 'YES', 'YES'),
(13, 'Pasta', 'image_gallery_4780.webp', 16, '500.00', 'Italy Pasta', 'italy/pasta/food', 'Horizontale', 'BOTH', '2015', 'NO', 'YES'),
(27, 'Portrais 1 men', 'image_gallery_7292.webp', 18, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'Men/portrais', 'Verticalement', 'MEN', '2022', 'NO', 'YES'),
(16, 'Person', 'image_gallery_5329.webp', 18, '1200.00', 'Portrais Picture White & Black In Cenima', 'white&black/portrais/cinema', 'Horizontale', 'MEN', '2010', 'NO', 'YES'),
(17, 'Child', 'image_gallery_6872.webp', 18, '1200.00', 'Portrais Picture White & Black For Women', 'women/potrais/child', 'Horizontale', '', '2019', 'YES', 'YES'),
(18, 'Betch', 'image_gallery_2123.webp', 10, '500.00', 'Emmty...', 'betch/sky', 'Horizontale', 'BOTH', '2018', 'YES', 'YES'),
(19, 'Gold Betch', 'image_gallery_8284.webp', 10, '350.00', 'Fiha KHir', 'gold/betch/sky/blue', 'Horizontale', 'BOTH', '2015', 'NO', 'YES'),
(20, 'Black Betch', 'image_gallery_1973.webp', 10, '650.00', 'Emmty...', 'balck/betch/blue/darkblue', 'Horizontale', 'BOTH', '2015', 'YES', 'YES'),
(22, 'Stars', 'image_gallery_6348.webp', 15, '12000.00', 'Fiha Khir', 'stars/space', 'Horizontale', 'BOTH', '2021', 'NO', 'YES'),
(23, 'Colors', 'image_gallery_3420.webp', 15, '200.00', 'Fiha Khir', 'colors/red/blue/sky/betch', 'Horizontale', 'BOTH', '2019', 'YES', 'YES'),
(24, 'Sup', 'image_gallery_362.webp', 16, '200000.00', 'Sup ', 'food/sup/orange/restaurent', 'Horizontale', 'BOTH', '2015', 'YES', 'YES'),
(25, 'Pizza american', 'image_gallery_2593.webp', 16, '300.00', 'pizza', 'pizza/restaurent/food\r\n', 'Horizontale', 'BOTH', '2016', 'NO', 'NO'),
(64, 'Nature 2', 'image_gallery_999.webp', 15, '100.00', 'Trees. It was something', 'nature', 'Verticalement', 'BOTH', '2022', 'YES', 'YES'),
(28, 'Portais 1 women ', 'image_gallery_4740.webp', 18, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'women/portrais', 'Verticalement', '', '2022', 'YES', 'YES'),
(29, 'Portrais 2 Men', 'image_gallery_1762.webp', 18, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'men/portrais', 'Verticalement', 'MEN', '2022', 'YES', 'YES'),
(30, 'Portrais 3 Men', 'image_gallery_6614.webp', 18, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'men/portrais/grin', 'Verticalement', 'MEN', '2022', 'NO', 'YES'),
(31, 'Portrais 2 women', 'image_gallery_2134.webp', 18, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'women/portrais', 'Verticalement', '', '2022', 'YES', 'YES'),
(32, 'Car 1', 'image_gallery_9436.webp', 22, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'car/bmw/old', 'Verticalement', 'BOTH', '2022', 'NO', 'YES'),
(33, 'Car 2', 'image_gallery_6583.webp', 22, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'car/bmw/old', 'Verticalement', 'BOTH', '2022', 'NO', 'YES'),
(34, 'Car 3', 'image_gallery_1190.webp', 22, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'car/bmw/old', 'Verticalement', 'BOTH', '2022', 'NO', 'YES'),
(35, 'Car 4', 'image_gallery_3315.webp', 22, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'car/golf/old', 'Verticalement', 'BOTH', '2022', 'YES', 'YES'),
(36, 'Car 5', 'image_gallery_6336.webp', 22, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'car/bmw/old', 'Verticalement', 'BOTH', '2022', 'YES', 'YES'),
(37, 'Car 6', 'image_gallery_1690.webp', 22, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'car/golf/old', 'Verticalement', 'BOTH', '2022', 'NO', 'YES'),
(38, 'Car 7', 'image_gallery_4187.webp', 22, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'car/golf/old', 'Verticalement', 'BOTH', '2022', 'NO', 'YES'),
(39, 'Car 8', 'image_gallery_9454.webp', 22, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'car/golf', 'Verticalement', 'BOTH', '2022', 'NO', 'YES'),
(40, 'Swimming', 'image_gallery_9989.webp', 23, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'swim/pool', 'Verticalement', 'BOTH', '2022', 'NO', 'YES'),
(41, 'Running', 'image_gallery_7733.webp', 23, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'run', 'Verticalement', 'BOTH', '2021', 'YES', 'YES'),
(42, 'Football', 'image_gallery_5719.webp', 23, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'ball', 'Verticalement', 'BOTH', '2022', 'YES', 'YES'),
(43, 'basketball', 'image_gallery_1641.webp', 23, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'ball,basket', 'Verticalement', 'BOTH', '2022', 'YES', 'YES'),
(44, 'Volley', 'image_gallery_6396.webp', 23, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'ball', 'Horizontale', 'BOTH', '2022', 'YES', 'YES'),
(45, 'Cat 1', 'image_gallery_5509.webp', 24, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'cat/old/gris', 'Verticalement', 'BOTH', '2022', 'NO', 'YES'),
(46, 'Cat 2', 'image_gallery_318.webp', 24, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'cat/play/old', 'Verticalement', 'BOTH', '2022', 'YES', 'YES'),
(47, 'Wolf 1', 'image_gallery_7712.webp', 24, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'wolf/snow', 'Verticalement', 'BOTH', '2022', 'YES', 'YES'),
(48, 'Fox', 'image_gallery_9564.webp', 24, '100.00', 'Trees. It was something about ', 'fox', 'Verticalement', 'BOTH', '2022', 'NO', 'YES'),
(49, 'Bird 1', 'image_gallery_6060.webp', 24, '100.00', 'Trees. It was something about the trees. The way they swayed with the wind in unison.', 'bird/blue', 'Verticalement', 'BOTH', '2022', 'NO', 'YES'),
(50, 'Bird 2', 'image_gallery_2190.webp', 24, '100.00', 'Trees. It was something', 'bird/blue', 'Horizontale', 'BOTH', '2022', 'YES', 'YES'),
(51, 'Gazelle 1', 'image_gallery_6759.webp', 24, '100.00', 'Trees. It was something', 'gazelle', 'Verticalement', 'BOTH', '2022', 'NO', 'YES'),
(52, 'Gazelle 2', 'image_gallery_1269.webp', 24, '100.00', 'Trees. It was something', 'gazelle', 'Verticalement', 'BOTH', '2022', 'YES', 'YES'),
(53, 'Squirrel', 'image_gallery_9625.webp', 24, '100.00', 'Trees. It was something', 'squirrel/orange', 'Verticalement', 'BOTH', '2021', 'NO', 'YES'),
(54, 'Travel 1', 'image_gallery_4887.webp', 21, '100.00', 'Trees. It was something', 'travel', 'Verticalement', 'BOTH', '2022', 'NO', 'YES'),
(55, 'Travel 2', 'image_gallery_2197.webp', 21, '100.00', 'Trees. It was something', 'travel', 'Verticalement', 'BOTH', '2022', 'YES', 'YES'),
(56, 'Travel 3', 'image_gallery_1777.webp', 21, '100.00', 'Trees. It was something', 'travel', 'Verticalement', 'BOTH', '2022', 'YES', 'YES'),
(57, 'Travel 4', 'image_gallery_5272.webp', 21, '100.00', 'Trees. It was something', 'travel', 'Verticalement', 'BOTH', '2021', 'NO', 'YES'),
(58, 'Travel 5', 'image_gallery_6776.webp', 21, '100.00', 'Trees. It was something', 'travel', 'Verticalement', 'BOTH', '2022', 'NO', 'YES'),
(59, 'Travel 6', 'image_gallery_4120.webp', 21, '100.00', 'Trees. It was something', 'travel', 'Verticalement', 'BOTH', '2021', 'NO', 'YES'),
(60, 'Meat balls', 'image_gallery_6236.webp', 16, '100.00', 'Trees. It was something', 'meat/food', 'Verticalement', 'BOTH', '2021', 'NO', 'YES'),
(61, 'Food 1', 'image_gallery_7705.webp', 16, '100.00', 'Trees. It was something', 'food', 'Verticalement', 'BOTH', '2021', 'YES', 'YES'),
(62, 'Food 2', 'image_gallery_2509.webp', 16, '100.00', 'Trees. It was something', 'food', 'Verticalement', 'BOTH', '2022', 'YES', 'YES'),
(63, 'Food 3', 'image_gallery_7185.webp', 16, '100.00', 'Trees. It was something', 'food', 'Verticalement', 'BOTH', '2022', 'YES', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recent_work`
--

DROP TABLE IF EXISTS `tbl_recent_work`;
CREATE TABLE IF NOT EXISTS `tbl_recent_work` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `active` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_recent_work`
--

INSERT INTO `tbl_recent_work` (`id`, `image_name`, `title`, `text`, `date`, `active`) VALUES
(6, 'image_work_1553.webp', 'Animals', 'Trees. It was something about the trees. The way they swayed with the wind in unison. The way they shaded the area around them. The sounds of their', '2022-01-21', 'YES'),
(10, 'image_work_1247.webp', 'Travel', 'Trees. It was something about the trees. The way they swayed with the wind in unison. The way they shaded the area around them. The sounds of their', '2019-08-22', 'YES'),
(9, 'image_work_4430.webp', 'Nature', 'Trees. It was something about the trees. The way they swayed with the wind in unison. The way they shaded the area around them. The sounds of their', '2020-08-11', 'YES'),
(11, 'image_work_4165.webp', 'Cars', 'Trees. It was something about the trees. The way they swayed with the wind in unison. The way they shaded the area around them. The sounds of their', '2021-05-21', 'YES'),
(12, 'image_work_3873.webp', 'Restaurant ', 'Trees. It was something about the trees. The way they swayed with the wind in unison. The way they shaded the area around them. The sounds of their', '2021-05-09', 'YES'),
(15, 'image_work_4158.webp', ' WEDDING', 'TREES. IT WAS SOMETHING ABOUT THE TREES. THE WAY THEY SWAYED WITH THE WIND IN UNISON. THE WAY THEY SHADED THE AREA AROUND THEM. THE SOUNDS OF THEIR', '2022-12-31', 'YES');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
