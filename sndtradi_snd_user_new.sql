-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2026 at 10:58 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sndtradi_snd_user_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `ab_id` int(11) NOT NULL,
  `ab_title` varchar(255) NOT NULL,
  `ab_desc` text NOT NULL,
  `ab_desclong` text NOT NULL,
  `ab_image` varchar(255) NOT NULL,
  `ab_alt1` varchar(255) NOT NULL,
  `ab_image2` varchar(255) NOT NULL,
  `ab_alt2` varchar(255) NOT NULL,
  `ab_broadimage` varchar(255) NOT NULL,
  `ab_status` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`ab_id`, `ab_title`, `ab_desc`, `ab_desclong`, `ab_image`, `ab_alt1`, `ab_image2`, `ab_alt2`, `ab_broadimage`, `ab_status`, `meta_title`, `meta_keyword`, `meta_desc`) VALUES
(1, 'WELCOME TO SND TRADING', '<p>SND TRADING PRIVATE LIMITED is a group company of Indian Company Siddhayu Ayurvedic Research Foundation Pvt. Ltd. Which is Part of Baidyanath Group, Popularly Known Brand as &ldquo;Baidyanath&rdquo; established in the Year 1917 in India and pioneered a large scale production of Ayurvedic formulations.</p>\r\n\r\n<p>Today, Baidyanath produces the largest range of Ayurveda products with over 700 formulations, sold at over 1,00,000 retail outlets, catering to over 50,000 practitioners. Backed with decades of experience, modern infrastructural facilities, state-of-the-art technology and quality human resource, Baidyanath continues to live the role it had assumed decades ago, that of a true heir to the legacy of Ayurveda.</p>\r\n', '<p>SND TRADING is a leading exporter specializing in a diverse range of agricultural and mineral commodities. Our product portfolio includes high-quality rice, soybeans, cocoa beans, and pulses, sourced from the finest producers. We are also a trusted supplier of key minerals and ores, including iron ore, lead ore, cobalt ore, manganese ore, and bauxite ore.</p>\r\n\r\n<p>At SND TRADING, we are committed to delivering excellence in every shipment, ensuring that our clients receive top-tier products that meet their specific needs. With a strong focus on quality, sustainability, and customer satisfaction, we are dedicated to being your reliable partner in global trade.</p>\r\n\r\n<p><span style=\"color:#000000\"><span style=\"font-size:24px\"><strong>Why Choose SND TRADING?</strong></span></span></p>\r\n\r\n<ul>\r\n	<li><strong>Diverse Product Range</strong>: From agricultural goods to essential minerals, we provide a wide array of products to meet varied industry demands.</li>\r\n	<li><strong>Quality Assurance</strong>: Our stringent quality control processes ensure that every product meets international standards.</li>\r\n	<li><strong>Global Reach</strong>: With an extensive network, we cater to clients across the globe, ensuring timely and efficient delivery.</li>\r\n	<li><strong>Sustainable Practices</strong>: We are committed to environmentally responsible sourcing and trading practices.</li>\r\n</ul>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<p><span style=\"color:#000000\"><span style=\"font-size:24px\"><strong>Our Mission</strong></span></span></p>\r\n\r\n<p>At SND TRADING, our mission is to connect global markets with top-quality agricultural and mineral products. We strive to foster long-term relationships with our clients by providing exceptional service, competitive pricing, and a commitment to sustainability. Our goal is to be a trusted partner in your supply chain, delivering consistent value and reliability.</p>\r\n', '1724153785_about.jpg', 'thumb-4-1.jpg', '1720521018_Decora Design About us images .jpg', 'thumb-4-2.jpg', '1723011654_1721970728_sunset-rice-field.jpg', '1', 'About Us', 'About Us key here', 'About Us desc here');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acheivements`
--

CREATE TABLE `tbl_acheivements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `ach_image` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `numbers` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_acheivements`
--

INSERT INTO `tbl_acheivements` (`id`, `title`, `subtitle`, `ach_image`, `alt`, `description`, `numbers`, `name`, `sort`, `status`) VALUES
(40, '+', '', '1709197816_employees.png', 'employees.png', '', 50, 'Awards Won', 1, 1),
(41, '\'s', '', '1709197860_sitemap.png', 'sitemap.png', '', 100, 'Satisfied Clients', 2, 1),
(42, '\'s', '', '1709197948_completed-task.png', 'completed-task.png', '', 1000, 'Shipments Completed ', 3, 1),
(43, '+', '', '1709197974_rating.png', 'rating.png', '', 19, 'Years of Experience', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `username`, `password`, `email`, `image`, `last_login`) VALUES
(1, 'SND Trading', 'admin@#2023', '59d2ae2ff151afeac055f50fd05044a0', 'info@sndtrading.org', '1721393864_logo.png', '2024-07-25 08:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `bnr_id` int(11) NOT NULL,
  `bnr_url` varchar(255) NOT NULL,
  `bnr_sort` varchar(200) NOT NULL,
  `bnr_image` varchar(255) NOT NULL,
  `bnr_alt` varchar(255) NOT NULL,
  `bnr_title` varchar(255) NOT NULL,
  `bnr_subtitle` text NOT NULL,
  `bnr_status` enum('0','1') NOT NULL,
  `bnr_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`bnr_id`, `bnr_url`, `bnr_sort`, `bnr_image`, `bnr_alt`, `bnr_title`, `bnr_subtitle`, `bnr_status`, `bnr_date`) VALUES
(10, '', '3', '1731330397_snd2.jpg', '', 'Trusted Supplier of Agro Commodities', 'As a trusted supplier of premium agro commodities, we ensure the highest quality products, reliable service, and timely delivery, meeting the global demand for sustainable and nutritious agricultural resources.', '1', '2024-11-11 13:06:37'),
(13, '', '1', '1731329881_minerals.jpg', '', 'Premium  Mineral Exports Worldwide', 'Offering superior mineral products, we guarantee dependable service and prompt delivery. Connecting global markets with the finest in mineral resources, we are your reliable partner for international exports.', '1', '2024-11-11 12:58:01'),
(14, '', '2', '1732174016_Picsart_24-11-21_12-56-10-596.jpg', '', 'All Marble Types, Worldwide Delivery', 'Discover the finest selection of premium marble in every variety, expertly sourced and delivered worldwide. Our commitment to quality ensures that you receive the best materials for your projects, anywhere, anytime.', '1', '2024-11-21 07:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogcategory`
--

CREATE TABLE `tbl_blogcategory` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `metatag` text NOT NULL,
  `metadesc` text NOT NULL,
  `metakeyword` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blogcategory`
--

INSERT INTO `tbl_blogcategory` (`id`, `name`, `url`, `sort`, `metatag`, `metadesc`, `metakeyword`, `status`) VALUES
(48, 'Worldwide', 'worldwide', 1, '', '', '', '1'),
(51, 'Countrylife', 'countrylife', 2, '', '', '', '1'),
(52, 'Explore', 'explore', 3, '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `b_id` int(11) NOT NULL,
  `b_category` int(11) NOT NULL,
  `b_tag` varchar(255) NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `b_alt` varchar(255) NOT NULL,
  `broad_image` varchar(255) NOT NULL,
  `b_alt2` varchar(255) NOT NULL,
  `b_inner_image` varchar(255) NOT NULL,
  `b_inner_alt` varchar(255) NOT NULL,
  `b_title` varchar(255) NOT NULL,
  `b_url` varchar(255) NOT NULL,
  `b_description` text NOT NULL,
  `metatag` varchar(255) NOT NULL,
  `metakeyword` text NOT NULL,
  `metadesc` text NOT NULL,
  `b_sort` varchar(255) NOT NULL,
  `b_status` int(11) NOT NULL,
  `b_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blogs`
--

INSERT INTO `tbl_blogs` (`b_id`, `b_category`, `b_tag`, `b_image`, `b_alt`, `broad_image`, `b_alt2`, `b_inner_image`, `b_inner_alt`, `b_title`, `b_url`, `b_description`, `metatag`, `metakeyword`, `metadesc`, `b_sort`, `b_status`, `b_date`) VALUES
(54, 48, 'Interiour, Start Shape, Starts', '1713939330_blog-details-1-1.jpg', 'blog-details-1-1.jpg', '1713939330_breadcurmb.jpg', '', '1713939330_blog-details-1-1.jpg', 'slide1.jpg', 'Experience the Power of Interior Design', 'experience-the-power-of-interior-design', '<p>There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour, or randomised words which don&rsquo;t look even slightly believable. If you are going to use a passage of Lorem Ipsum. There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour, or randomised words which don&rsquo;t look even slightly believable. If you are going to use a passage of Lorem Ipsum.</p>\r\n\r\n<p>Suspendisse ultricies vestibulum vehicula. Proin laoreet porttitor lacus. Duis auctor vel ex eu elementum. Fusce eu volutpat felis. Proin sed eros tincidunt, sagittis sapien eu, porta diam. Aenean finibus scelerisque nulla non facilisis. Fusce vel orci sed quam gravid</p>\r\n\r\n<p><img loading=\"lazy\"  alt=\"\" src=\"https://websitedesigningcompanyindia.in/decora/cms/assets/img/blog/blog-details-1-2.jpg\" /><img loading=\"lazy\"  alt=\"\" src=\"https://websitedesigningcompanyindia.in/decora/cms/assets/img/blog/blog-details-1-3.jpg\" /></p>\r\n\r\n<h4>Our Personal Approach</h4>\r\n\r\n<p>Aliquam condimentum, massa vel mollis volutpat, erat sem pharetra quam, ac mattis arcu elit non massa. Nam mollis nunc velit, vel varius arcu fringilla tristique. Cras elit nunc, sagittis eu bibendum eu, ultrices placerat sem. Praesent vitae metus auctor.</p>\r\n', 'Experience the Power of Interior Design', 'Experience the Power of Interior Design', 'Experience the Power of Interior Design', '1', 1, '2024-04-24'),
(55, 48, 'Interiour, Start Shape, Starts', '1713939330_blog-details-1-1.jpg', 'blog-details-1-1.jpg', '1713939330_breadcurmb.jpg', '', '1713939330_blog-details-1-1.jpg', 'slide1.jpg', 'Experience the Power of Interior Design3', 'experience-the-power-of-interior-design3', '<p>There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour, or randomised words which don&rsquo;t look even slightly believable. If you are going to use a passage of Lorem Ipsum. There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour, or randomised words which don&rsquo;t look even slightly believable. If you are going to use a passage of Lorem Ipsum.</p>\r\n\r\n<p>Suspendisse ultricies vestibulum vehicula. Proin laoreet porttitor lacus. Duis auctor vel ex eu elementum. Fusce eu volutpat felis. Proin sed eros tincidunt, sagittis sapien eu, porta diam. Aenean finibus scelerisque nulla non facilisis. Fusce vel orci sed quam gravid</p>\r\n\r\n<p><img loading=\"lazy\"  alt=\"\" src=\"https://websitedesigningcompanyindia.in/decora/cms/assets/img/blog/blog-details-1-2.jpg\" /><img loading=\"lazy\"  alt=\"\" src=\"https://websitedesigningcompanyindia.in/decora/cms/assets/img/blog/blog-details-1-3.jpg\" /></p>\r\n\r\n<h4>Our Personal Approach</h4>\r\n\r\n<p>Aliquam condimentum, massa vel mollis volutpat, erat sem pharetra quam, ac mattis arcu elit non massa. Nam mollis nunc velit, vel varius arcu fringilla tristique. Cras elit nunc, sagittis eu bibendum eu, ultrices placerat sem. Praesent vitae metus auctor.</p>\r\n', '', '', '', '1', 1, '2024-04-24'),
(56, 48, 'Interiour, Start Shape, Starts', '1713939330_blog-details-1-1.jpg', 'blog-details-1-1.jpg', '1713939330_breadcurmb.jpg', '', '1713939330_blog-details-1-1.jpg', 'slide1.jpg', 'Experience the Power of Interior Design2', 'experience-the-power-of-interior-design2', '<p>There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour, or randomised words which don&rsquo;t look even slightly believable. If you are going to use a passage of Lorem Ipsum. There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour, or randomised words which don&rsquo;t look even slightly believable. If you are going to use a passage of Lorem Ipsum.</p>\r\n\r\n<p>Suspendisse ultricies vestibulum vehicula. Proin laoreet porttitor lacus. Duis auctor vel ex eu elementum. Fusce eu volutpat felis. Proin sed eros tincidunt, sagittis sapien eu, porta diam. Aenean finibus scelerisque nulla non facilisis. Fusce vel orci sed quam gravid</p>\r\n\r\n<p><img loading=\"lazy\"  alt=\"\" src=\"https://websitedesigningcompanyindia.in/decora/cms/assets/img/blog/blog-details-1-2.jpg\" /><img loading=\"lazy\"  alt=\"\" src=\"https://websitedesigningcompanyindia.in/decora/cms/assets/img/blog/blog-details-1-3.jpg\" /></p>\r\n\r\n<h4>Our Personal Approach</h4>\r\n\r\n<p>Aliquam condimentum, massa vel mollis volutpat, erat sem pharetra quam, ac mattis arcu elit non massa. Nam mollis nunc velit, vel varius arcu fringilla tristique. Cras elit nunc, sagittis eu bibendum eu, ultrices placerat sem. Praesent vitae metus auctor.</p>\r\n', '', '', '', '1', 1, '2024-04-24'),
(57, 51, 'Interiour, Start Shape, Starts', '1713939330_blog-details-1-1.jpg', 'blog-details-1-1.jpg', '1713939330_breadcurmb.jpg', '', '1713939330_blog-details-1-1.jpg', 'slide1.jpg', 'Experience the Power of Interior Design1', 'experience-the-power-of-interior-design1', '<p>There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour, or randomised words which don&rsquo;t look even slightly believable. If you are going to use a passage of Lorem Ipsum. There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour, or randomised words which don&rsquo;t look even slightly believable. If you are going to use a passage of Lorem Ipsum.</p>\r\n\r\n<p>Suspendisse ultricies vestibulum vehicula. Proin laoreet porttitor lacus. Duis auctor vel ex eu elementum. Fusce eu volutpat felis. Proin sed eros tincidunt, sagittis sapien eu, porta diam. Aenean finibus scelerisque nulla non facilisis. Fusce vel orci sed quam gravid</p>\r\n\r\n<p><img loading=\"lazy\"  alt=\"\" src=\"https://websitedesigningcompanyindia.in/decora/cms/assets/img/blog/blog-details-1-2.jpg\" /><img loading=\"lazy\"  alt=\"\" src=\"https://websitedesigningcompanyindia.in/decora/cms/assets/img/blog/blog-details-1-3.jpg\" /></p>\r\n\r\n<h4>Our Personal Approach</h4>\r\n\r\n<p>Aliquam condimentum, massa vel mollis volutpat, erat sem pharetra quam, ac mattis arcu elit non massa. Nam mollis nunc velit, vel varius arcu fringilla tristique. Cras elit nunc, sagittis eu bibendum eu, ultrices placerat sem. Praesent vitae metus auctor.</p>\r\n', '', '', '', '1', 1, '2024-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_tags`
--

CREATE TABLE `tbl_blog_tags` (
  `id` int(11) NOT NULL,
  `b_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blog_tags`
--

INSERT INTO `tbl_blog_tags` (`id`, `b_id`, `title`, `url`, `sort`, `status`) VALUES
(16, '', 'Interiour', 'interiour', '1', '1'),
(17, '', 'Start Shape', 'start-shape', '2', '1'),
(18, '', 'Starts', 'starts', '3', '1'),
(23, '', 'Aesthetics', 'aesthetics', '', '1'),
(24, '', 'Functionality', 'functionality', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_breadcrumb`
--

CREATE TABLE `tbl_breadcrumb` (
  `brd_id` int(11) NOT NULL,
  `brd_image` varchar(255) NOT NULL,
  `brd_name` varchar(255) NOT NULL,
  `brd_sort` int(11) NOT NULL,
  `brd_status` int(11) NOT NULL,
  `metatag` text NOT NULL,
  `metakeyword` text NOT NULL,
  `metadesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_breadcrumb`
--

INSERT INTO `tbl_breadcrumb` (`brd_id`, `brd_image`, `brd_name`, `brd_sort`, `brd_status`, `metatag`, `metakeyword`, `metadesc`) VALUES
(1, '1723011188_1721970728_sunset-rice-field.jpg', 'Blog Page', 1, 1, 'Blog', 'Blog', 'Blog'),
(2, '1723011207_1721970728_sunset-rice-field.jpg', 'Contact Page', 2, 1, 'Contact ', 'Contact ', 'Contact '),
(3, '1723011223_1721970728_sunset-rice-field.jpg', 'Thank You Page', 3, 1, 'Thank You', 'Thank You', 'Thank You'),
(7, '1723011250_1721970728_sunset-rice-field.jpg', 'Gallery Page', 5, 1, 'Gallery', 'Gallery', 'Gallery'),
(10, '1723011477_1721970728_sunset-rice-field.jpg', '404 Page', 2, 1, '404 ', '404 ', '404 '),
(11, '1723011477_1721970728_sunset-rice-field.jpg', 'Career', 2, 1, 'Career', 'Career', 'Career'),
(12, '1723011477_1721970728_sunset-rice-field.jpg', 'Thank You Page', 2, 1, 'Thank You ', 'Thank You ', 'Thank You');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_career`
--

CREATE TABLE `tbl_career` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_res` varchar(1000) NOT NULL,
  `job_location` varchar(255) NOT NULL,
  `job_short_des` varchar(255) NOT NULL,
  `job_long_des` longtext NOT NULL,
  `job_req_skills` varchar(1000) NOT NULL,
  `job_tags` varchar(500) NOT NULL,
  `apply_last_date` date NOT NULL,
  `logo` varchar(255) NOT NULL,
  `publish_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `publish_by` varchar(255) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_career`
--

INSERT INTO `tbl_career` (`id`, `job_title`, `job_res`, `job_location`, `job_short_des`, `job_long_des`, `job_req_skills`, `job_tags`, `apply_last_date`, `logo`, `publish_date`, `status`, `sort`, `publish_by`, `time_stamp`) VALUES
(2, 'Urgent opening of the Export Sales Manager', '', 'New Delhi', '', '<p><strong>We are looking for export sales manager</strong></p>\r\n\r\n<p><strong>Responsibility: -&nbsp;</strong><br />\r\n&bull; Responsible for coordinating and overseeing a company export activity. This includes managing international sales, ensuring compliance with trade regulations, negotiating contracts, and developing relationship with foreign clients and distributors.<br />\r\n&bull; Leading Export house engage export of agro products-, metals, mineral, ores, Marbles and Granites, Polymers and Petro chemicals, Coals etc.<br />\r\n&bull; Identify potential foreign markets for international expansion.&nbsp;&nbsp; &nbsp;<br />\r\n&bull; Develop and implement strategic to grow export sales and market share.<br />\r\n&bull; Identify new business opportunities and build relationship with customers and various stack holders.<br />\r\n&bull; Handling the whole process of export sales include order processing, on time delivery management, payment tracking and various adhoc task required in the trade.<br />\r\n&bull; Monitor industry trends and perform competitor analysis.<br />\r\n&bull; Assist with setting wholesale and retail pricing to ensure profitability.<br />\r\n&bull; Reach out to different vendors who can potentially supply materials and review bids.<br />\r\n&bull; Review and negotiate contracts with foreign organizations.<br />\r\n&bull; Create and oversee all facets of the supply chain to ensure products can be properly exported.<br />\r\n&bull; Oversee inventory levels for products to ensure they are high enough to keep up with demand.<br />\r\n&bull; Meet with potential clients and buyers to discuss features and benefits of products/services.<br />\r\n&bull; Lead the development of marketing and sales strategies.<br />\r\n&bull; Establish partnerships with local distributors and suppliers.<br />\r\n&bull; Handle high-level customer service issues.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Interested candidates can contact us and&nbsp;Apply Now.</strong></p>\r\n', '', '', '2024-10-18', '1725358117_logo.svg', '2024-09-09', 1, 1, 'HR Department', '2023-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(200) NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `metadesc` text NOT NULL,
  `sort` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_alt` varchar(255) NOT NULL,
  `heading` text NOT NULL,
  `image1` varchar(255) NOT NULL,
  `alt1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `alt2` varchar(255) NOT NULL,
  `breadcrumb` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `desc` text NOT NULL,
  `status` int(11) NOT NULL,
  `is_page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `url`, `title`, `keyword`, `metadesc`, `sort`, `image`, `image_alt`, `heading`, `image1`, `alt1`, `image2`, `alt2`, `breadcrumb`, `short_desc`, `desc`, `status`, `is_page`) VALUES
(53, 'Minerals/Metals', 'minerals-metals', '', '', '', 1, '1709097034_int.jpg', '', '', '1709203881_int.jpg', '', '', '', '1709097034_bred.webp', '', '', 1, 'Submenu'),
(62, 'Agro Commodities', 'agro-commodities', '', '', '', 3, '1709110352_product.jpg', '', 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT', '1709110352_about-img-3.jpg', 'about-img-3.jpg', '1709110352_about-img-4.jpg', 'about-img-4.jpg', '1721970728_sunset-rice-field.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempo incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrice risus commodo viverra maecenas accumsan.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.</p>\r\n', 1, 'Submenu'),
(75, 'Marble', 'marble', '', '', '', 2, '', '', '', '', '', '', '', '', '', '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_video`
--

CREATE TABLE `tbl_category_video` (
  `id_glry` int(11) NOT NULL,
  `glry_category` varchar(255) NOT NULL,
  `glry_image` varchar(255) NOT NULL,
  `glry_link` text NOT NULL,
  `alt` varchar(255) NOT NULL,
  `glry_status` varchar(255) NOT NULL,
  `glry_sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category_video`
--

INSERT INTO `tbl_category_video` (`id_glry`, `glry_category`, `glry_image`, `glry_link`, `alt`, `glry_status`, `glry_sort`) VALUES
(3, '62', '1709109106_fashion.jpg', 'https://youtu.be/D6QCGtYwoLg?si=VJtu6tYVUyVI7BYa', 'alttt', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ach_image` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `title`, `ach_image`, `alt`, `sort`, `status`) VALUES
(9, '', '1713936576_brand-1-2.png', 'brand-1-2.png', 2, '1'),
(10, '', '1713936596_brand-1-3.png', 'brand-1-3.png', 3, '1'),
(11, '', '1713936615_brand-1-4.png', 'brand-1-4.png', 4, '1'),
(12, '', '1713936637_brand-1-5.png', 'brand-1-5.png', 5, '1'),
(15, 'https://websitedesigningcompanyindia.in/decora/cms/', '1713936558_brand-1-1.png', 'brand-1-1.png', 1, '1'),
(17, '', '1713936664_brand-1-6.png', 'brand-1-6.png', 6, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `sort` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`id`, `name`, `image`, `color`, `sort`, `status`) VALUES
(1, 'Yellow', '1714218637_images (2).jpeg', '#ffcc01', '1', '1'),
(2, 'Brown', '1714218455_images.jpeg', '#ca6d00', '', '1'),
(3, 'Gray', '1714218666_1712136604_Chrome Colour.png', '#c7c6c6', '3', '1'),
(4, 'Black', '1714218683_1712142355_46.jpg', '#000000', '4', '1'),
(5, 'Sky Blue', '1714218652_images (1).jpeg', '#1c93cb', '2', '1'),
(7, 'light green', '1714218804_7-72307_green-line-png-v-green-circle-image-png.png', '#000000', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `con_id` int(11) NOT NULL,
  `con_phone1` varchar(100) NOT NULL,
  `con_phone2` varchar(100) NOT NULL,
  `con_email1` varchar(100) NOT NULL,
  `con_email2` varchar(100) NOT NULL,
  `con_address` text NOT NULL,
  `con_address2` text NOT NULL,
  `con_address3` text NOT NULL,
  `con_detail` text NOT NULL,
  `con_map` text NOT NULL,
  `con_facebook` text NOT NULL,
  `con_instagram` text NOT NULL,
  `con_skype` text NOT NULL,
  `con_linkedin` text NOT NULL,
  `con_twitter` text NOT NULL,
  `con_youtube` text NOT NULL,
  `con_google` text NOT NULL,
  `con_whatsaap` varchar(255) NOT NULL,
  `con_pinterest` varchar(255) NOT NULL,
  `meta_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`con_id`, `con_phone1`, `con_phone2`, `con_email1`, `con_email2`, `con_address`, `con_address2`, `con_address3`, `con_detail`, `con_map`, `con_facebook`, `con_instagram`, `con_skype`, `con_linkedin`, `con_twitter`, `con_youtube`, `con_google`, `con_whatsaap`, `con_pinterest`, `meta_title`) VALUES
(1, '+91114576 8500', '', 'info@sndtrading.org', 'accounts@sndtrading.org', '<b>Regional Office :</b> 0, C/L-33, V.S.S. Nagar P.O Rasulgarh, P.S Sahid Bhubaneshwar, Khordha,Odisha, 751010', '<b>Corporate Office :</b> 805, Iternational Trade Tower, Nehru Place, New Delhi, 110019', '', 'SND TRADING is a leading exporter specializing in a diverse range of agricultural and mineral commodities.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d219.03963979672102!2d77.250383!3d28.5507117!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3004e363f9f%3A0xdc1d7a47509a6728!2sSND%20Trading%20Private%20Limited!5e0!3m2!1sen!2sin!4v1725432474860!5m2!1sen!2sin', '', '', '', '#', '', '', 'https://api.whatsapp.com/send?phone=919876543210', '#', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `id` int(11) NOT NULL,
  `officetype` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) NOT NULL,
  `email1` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `bimage` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL,
  `sort` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`id`, `officetype`, `branch`, `cname`, `location`, `phone1`, `phone2`, `email1`, `email2`, `bimage`, `alt`, `map`, `sort`, `status`) VALUES
(1, '', '', 'Delhi, India', 'A-212, Main Market, Adarsh Nagar, Delhi 110033', '', '', '', '', '', '', 'https://maps.app.goo.gl/kXXcVQaD4M8CjSRB8', '', '1'),
(2, '', '', 'Delhi, India', 'A-212, Main Market, Adarsh Nagar, Delhi 110033', '', '', '', '', '', '', 'https://maps.app.goo.gl/kXXcVQaD4M8CjSRB8', '', '1'),
(3, '', '', 'Delhi, India', 'A-212, Main Market, Adarsh Nagar, Delhi 110033', '', '', '', '', '', '', 'https://maps.app.goo.gl/kXXcVQaD4M8CjSRB8', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `glry_id` int(11) NOT NULL,
  `id_glry` varchar(255) NOT NULL,
  `glry_category` varchar(255) NOT NULL,
  `glry_name` varchar(255) NOT NULL,
  `glry_image` varchar(255) NOT NULL,
  `glry_status` int(11) NOT NULL,
  `glry_sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`glry_id`, `id_glry`, `glry_category`, `glry_name`, `glry_image`, `glry_status`, `glry_sort`) VALUES
(22, '', '3', 'Cargo & Port Image', '1723443985_port1.png', 1, 0),
(23, '', '3', 'Cargo Ready to be Exported', '1723444121_port2.png', 1, 0),
(24, '', '3', 'Coal Loaded to Rake on Mine Site', '1724150249_rail2.jpg', 1, 10),
(25, '', '3', 'Minerals by Racks', '1724150031_rail.jpg', 1, 9),
(26, '', '3', 'Export of Cargo', '1723444182_vessel2.png', 1, 11),
(27, '', '3', 'Vessel Loading at Port', '1723444680_vessel loading 1.png', 1, 0),
(28, '', '3', 'Sunset View at Port', '1723444699_vesselloading2.png', 1, 0),
(29, '', '3', 'Highly Equipped mine Operations', '1723444720_minrals1.png', 1, 0),
(32, '', '3', 'Premium Material From Mine', '1723445025_mine2.png', 1, 12),
(33, '', '3', 'High Tech Mines/Quarries', '1723445049_mine3.png', 1, 12),
(34, '', '3', 'Iron Ore Unloading at Port', '1723445498_ore1.png', 1, 0),
(35, '', '3', 'Logistical Operations', '1723445516_or2.png', 1, 0),
(36, '', '3', 'Preparation for Vessel Loading', '1723445550_ore3.png', 1, 0),
(39, '', '', 'Soyabean Harvesting', '1724150348_soyabean-harvesting.jpg', 1, 0),
(40, '', '', 'cocoa beans loading on ships', '1724150415_cocoa-beans-loading-on-ships.jpg', 1, 0),
(41, '', '', 'Premium Coco Farms', '1724472229_Premium-Coco-.png', 1, 11),
(42, '', '', 'Rice Field', '1725361797_rice.jpg', 1, 0),
(43, '', '3', 'Inspecting Harvest', '1725362511_rice.jpg', 1, 0),
(46, '<br />\r\n<b>Warning</b>:  Undefined variable $brec in <b>/home/ygwfaiiob1ds/public_html/admin/manage-gallery.php</b> on line <b>125</b><br />\r\n<br />\r\n<b>Warning</b>:  Trying to access array offset on value of type null in <b>/home/ygwfaiiob1ds/public_html', '', 'Unloading of Material at Port', '1725967584_upload.jpg', 1, 19),
(47, '<br />\r\n<b>Warning</b>:  Undefined variable $brec in <b>/home/ygwfaiiob1ds/public_html/admin/manage-gallery.php</b> on line <b>125</b><br />\r\n<br />\r\n<b>Warning</b>:  Trying to access array offset on value of type null in <b>/home/ygwfaiiob1ds/public_html', '', 'Marble Quarry', '1725967858_marbel upload.jpg', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_category`
--

CREATE TABLE `tbl_gallery_category` (
  `glry_id` int(11) NOT NULL,
  `glry_title` varchar(255) NOT NULL,
  `glry_sort` int(11) NOT NULL,
  `glry_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gallery_category`
--

INSERT INTO `tbl_gallery_category` (`glry_id`, `glry_title`, `glry_sort`, `glry_status`) VALUES
(3, 'Exterior', 1, 1),
(4, 'Side View', 2, 0),
(5, 'Worldwide', 3, 0),
(6, 'Countrylife', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_homedirector`
--

CREATE TABLE `tbl_homedirector` (
  `ab_id` int(11) NOT NULL,
  `ab_title` varchar(255) NOT NULL,
  `ab_desc` text NOT NULL,
  `ab_image` varchar(255) NOT NULL,
  `ab_alt` varchar(255) NOT NULL,
  `ab_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_homedirector`
--

INSERT INTO `tbl_homedirector` (`ab_id`, `ab_title`, `ab_desc`, `ab_image`, `ab_alt`, `ab_url`) VALUES
(1, 'Smart Products ', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis aliquam earum dolorum dolor, quod odio vero nostrum, dignissimos, obcaecati animi veniam doloribus laudantium ea aspernatur id? Laudantium corporis deleniti illum!&nbsp;</p>\r\n', '1704699006_36.jpg', '', 'https://websitedesigningcompanyindia.in/carolieto/cms-new/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home_extra_text`
--

CREATE TABLE `tbl_home_extra_text` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `link1` varchar(255) NOT NULL,
  `link2` varchar(255) NOT NULL,
  `pro_title` varchar(255) NOT NULL,
  `pro_subtitle` text NOT NULL,
  `srv_title` varchar(255) NOT NULL,
  `srv_subtitle` text NOT NULL,
  `work_title` varchar(255) NOT NULL,
  `work_subtitle` text NOT NULL,
  `test_title` varchar(255) NOT NULL,
  `test_subtitle` text NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_subtitle` text NOT NULL,
  `turn_title` varchar(255) NOT NULL,
  `turn_subtitle` text NOT NULL,
  `p_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_home_extra_text`
--

INSERT INTO `tbl_home_extra_text` (`id`, `title`, `subtitle`, `image`, `alt`, `link1`, `link2`, `pro_title`, `pro_subtitle`, `srv_title`, `srv_subtitle`, `work_title`, `work_subtitle`, `test_title`, `test_subtitle`, `blog_title`, `blog_subtitle`, `turn_title`, `turn_subtitle`, `p_image`) VALUES
(1, ' Reach out and let\'s start a conversation!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis incidunt asperiores aliquid possimus placeat sit dolorum quae repudiandae, nesciunt saepe, qui iure sapiente quia. Velit cumque similique nihil cupiditate nulla.', '1722252389_HOME_BG.jpg', 'altt', 'https://websitedesigningcompanyindia.in/kibachi/cms/contact', 'https://websitedesigningcompanyindia.in/kibachi/cms/contact', 'Delivering Quality Agro Commodities and Minerals/Metals Across the Globe', 'Providing top-quality Agro Commodities and Minerals/Metals with consistent excellence, reliability, and timely delivery. We connect global markets with the finest products, ensuring satisfaction and trust in every shipment.', 'Our Services', 'Designing the Future One <br/> Room at a Time', 'How We Do It', 'Work Process', 'Testimonial', 'What Our Client Says', 'Our', 'Valuable Client', 'Turnkey Interior/Exterio', 'Turnkey Interior/Exterio', '1723274681_largest-container-ships.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_applications`
--

CREATE TABLE `tbl_job_applications` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `applying_for` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `about` varchar(500) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_job_applications`
--

INSERT INTO `tbl_job_applications` (`id`, `job_id`, `name`, `email`, `mobile`, `applying_for`, `resume`, `about`, `location`, `date`) VALUES
(14, 2, 'Kanika Sauguny', 'kkanikasauguny@gmail.com', '+917018744997', 'Urgent opening of the Export Sales Manager', '1729075282_Resume - Kkanika Sauguny.pdf', '', 'Mumbai', '2024-10-16'),
(15, 2, 'Aditya Pandey', 'ADITYAKRPANDEY2002@gmail.com', '9354500427', 'Urgent opening of the Export Sales Manager', '1745063932_Resume.pdf', 'This side Aditya and My role is managing export and import documentation, ensuring compliance with DGFT guidelines, and providing solutions to streamline processes for clients in the manufacturing and service sectors. I am confident that my expertise aligns with the requirements for this position, and I would be eager to contribute to the continued success of your team.\r\n\r\nI would appreciate the opportunity to further discuss my qualifications in detail. Please feel free to contact me at your co', 'botanical garden', '2025-04-19'),
(16, 2, 'DynZGghvVSRzjmjLVcW', 'xij.in.ey.o.qopa.0.7@gmail.com', '6628020731', 'Urgent opening of the Export Sales Manager', '', 'iQHndyBRcWjZAbYqK', 'lUcQgwPvmmMsbjJccJouaYg', '2026-02-10'),
(17, 2, 'wlnNyZmKTRUyJMzoj', 'i.we.x.o.qay.o.p.748@gmail.com', '2591167822', 'Urgent opening of the Export Sales Manager', '', 'GdwUYFrfEizWFwrfU', 'bVBZmIdwRYpLRKPGAIhzOdC', '2026-03-04'),
(18, 2, 'UVYxgiQMZOgUsxLxFSUb', 'oxo.b.un.er.i1.8@gmail.com', '2688082638', 'Urgent opening of the Export Sales Manager', '', 'BwRnPFOoSGGAanHgyCzt', 'MukXdTjRMmJwxMvOrXluqf', '2026-03-10'),
(19, 2, 'oLpEDckLbiKnwPDSBIS', 'u.saf.ah.a.t.aq.8.3.9@gmail.com', '4464879252', 'Urgent opening of the Export Sales Manager', '', 'vGfJbwNyrOZYEenQxDgX', 'RHytNCKGiwBeZCBhuqOMxEJG', '2026-03-18'),
(20, 2, 'IHkuThIDXOAiqGcrEWmdPm', 'eb.eko.du.ha.c27.9@gmail.com', '9569698341', 'Urgent opening of the Export Sales Manager', '', 'XpUAHbxHoyDvFLUKVyoDNLl', 'SidhgrirLNFALdAb', '2026-03-23'),
(21, 2, 'qVwMTaMjRZBTJWMRE', 'iv.i.b.az.a.411@gmail.com', '4001454360', 'Urgent opening of the Export Sales Manager', '', 'IdgUILXMvsJDxGEtLAPmZesQ', 'lAPOxHBiTlbzAyXH', '2026-04-02'),
(22, 2, 'uztHONQGvzlJkZPVXoh', 'f.olu.q.i.gos.o.r.176@gmail.com', '3754680975', 'Urgent opening of the Export Sales Manager', '', 'sXwHLJZQbKvuxumuCsxFJhl', 'RHJHVowkoiMDKbqFyb', '2026-05-11'),
(23, 2, 'iOjuoifOpGGrSIgrL', 'im.e.s.a.wo.r.4.44@gmail.com', '9124904637', 'Urgent opening of the Export Sales Manager', '', 'ZohrPkGtiZKCKuwofkryN', 'CExEEbugMAdaWuRPyZ', '2026-05-16'),
(24, 2, 'VcVLeLtynzBNKACmNeneg', 'kag.e.vige.50@gmail.com', '6145256557', 'Urgent opening of the Export Sales Manager', '', 'AruHtqfKJQThgPMLO', 'KrDcoYHXlLUBXOjDKB', '2026-06-26'),
(25, 2, 'UDuCwnYBbzMYQVCbNHxMxj', 'on.ife.s.u.j.u8.0@gmail.com', '8292726559', 'Urgent opening of the Export Sales Manager', '', 'jlOtJCUZemZgvfmVyPgGR', 'WXTTAVrbpWeZYoZJhZ', '2026-07-27'),
(26, 2, 'dRdCxRISrKhoBsCjWZca', 'conijuga.14@gmail.com', '9356702888', 'Urgent opening of the Export Sales Manager', '', 'qZFpJWXiWPMITlNMdeoQvonB', 'igyOjQsYVvEuzyzY', '2026-07-27'),
(27, 2, 'Swayamprabha Mahapatra', 'swayamprabhamahapatra@gmail.com', '9637013114', 'Urgent opening of the Export Sales Manager', '1788332263_CV_2026.pdf', '', 'Bhubaneswar', '2026-09-02'),
(28, 2, 'bBxzegKbcWMqrNsiUSmn', 'w.e.doh.e.z.a.63@gmail.com', '9021036740', 'Urgent opening of the Export Sales Manager', '', 'uXDAfGqhNkRToRyJCYN', 'EXrFcmQsfebWlspnzQo', '2026-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter`
--

CREATE TABLE `tbl_newsletter` (
  `id` int(11) NOT NULL,
  `nl_email` varchar(255) NOT NULL,
  `add_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_newsletter`
--

INSERT INTO `tbl_newsletter` (`id`, `nl_email`, `add_on`) VALUES
(1, 'gautamchandni466@gmail.com', '2023-09-06'),
(2, 'chandnigautam111@gmail.com', '2023-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_portfolio`
--

CREATE TABLE `tbl_portfolio` (
  `b_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `b_category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `b_alt` varchar(255) NOT NULL,
  `b_status` varchar(255) NOT NULL,
  `b_sort` int(11) NOT NULL,
  `b_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_portfolio`
--

INSERT INTO `tbl_portfolio` (`b_id`, `service_id`, `b_category`, `name`, `b_image`, `b_alt`, `b_status`, `b_sort`, `b_title`) VALUES
(24, 7, '4', 'Portfolio1', '1714130956_project-4-1.jpg', '', '1', 1, ''),
(25, 7, '3', 'Portfolio2', '1714130971_project-4-2.jpg', '', '1', 0, ''),
(26, 7, '2', 'Portfolio3', '1714130984_project-4-3.jpg', '', '1', 3, ''),
(27, 7, '2', 'Portfolio6', '1714130996_project-4-4.jpg', '', '1', 4, ''),
(28, 7, '1', 'Portfolio4', '1714131011_project-4-5.jpg', '', '1', 6, ''),
(29, 7, '1', 'Portfolio5', '1714131024_project-4-6.jpg', '', '1', 7, ''),
(31, 6, '5', 'Testing', '1714216998_t4.jpg', '', '1', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_portfolio_category`
--

CREATE TABLE `tbl_portfolio_category` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_portfolio_category`
--

INSERT INTO `tbl_portfolio_category` (`id`, `service_id`, `name`, `sort`, `status`, `url`) VALUES
(1, 7, 'Exterior', 1, 1, 'exterior'),
(2, 7, 'Side View', 2, 1, 'side-view'),
(3, 7, 'Worldwide', 3, 1, 'worldwide'),
(4, 7, 'Countrylife', 4, 1, 'countrylife'),
(5, 6, 'Exterior', 1, 1, 'exterior'),
(6, 6, 'Side View', 2, 1, 'side-view');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `has_variations` enum('0','1') NOT NULL,
  `variations` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` varchar(200) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `hsncode` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `breadcrumb` varchar(255) NOT NULL,
  `image_alt` varchar(50) DEFAULT NULL,
  `images` text,
  `video` varchar(255) DEFAULT NULL,
  `brochure` varchar(255) DEFAULT NULL,
  `mrp` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `gst` varchar(50) NOT NULL,
  `show_in_new` enum('0','1') NOT NULL,
  `unit_sold` varchar(100) DEFAULT NULL,
  `trending` enum('0','1') NOT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `shortdesc` text NOT NULL,
  `description` text NOT NULL,
  `details` text NOT NULL,
  `tags` varchar(255) NOT NULL,
  `stock` enum('Instock','Outofstock') DEFAULT NULL,
  `metatag` varchar(255) NOT NULL,
  `keyword` text NOT NULL,
  `metadesc` text NOT NULL,
  `label` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `add_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `has_variations`, `variations`, `color`, `size`, `brand_id`, `category_id`, `subcategory_id`, `name`, `url`, `sku`, `hsncode`, `image`, `breadcrumb`, `image_alt`, `images`, `video`, `brochure`, `mrp`, `price`, `gst`, `show_in_new`, `unit_sold`, `trending`, `origin`, `shortdesc`, `description`, `details`, `tags`, `stock`, `metatag`, `keyword`, `metadesc`, `label`, `status`, `sort`, `add_on`) VALUES
(56, '0', '', '', '', 0, 62, '56', 'Rice', 'rice', '', '', '1723285134_1723012139_GettyImages-1734160670-0157c2daf8e841d6a783b38aedc51aa8.jpg', '1723285129_1721970728_sunset-rice-field.jpg', '', '1723009418_GettyImages-1734160670-0157c2daf8e841d6a783b38aedc51aa8.jpg,66b3142b04656_GettyImages-1734160670-0157c2daf8e841d6a783b38aedc51aa8.jpg', NULL, '', '', '', '', '0', NULL, '1', NULL, '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>\r\n', '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>\r\n', '', '', NULL, '', '', '', NULL, 1, 0, '2024-08-10 03:40:05'),
(57, '0', '', '', '', 0, 62, '59', 'Tur Dal', 'tur-dal', '', '', '1723012034_toor-dal.jpg', '1723285329_1721970728_sunset-rice-field.jpg', '', '1723012034_toor-dal.jpg', NULL, '', '', '', '', '0', NULL, '0', NULL, '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>\r\n', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 00:47:18'),
(59, '0', '', '', '', 0, 53, '0', 'Bauxite', 'bauxite', '', '', '1725432464_Bauxite.jpg', '', 'Testing Product', '1725426130_min.png', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 1, '2024-09-03 23:47:44'),
(60, '0', '', '', '', 0, 53, '', 'Manganese', 'manganese', '', '', '1725432585_Manganese.jpg', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-03 23:49:45'),
(61, '0', '', '', '', 0, 53, '', 'Cobalt', 'cobalt', '', '', '1725432611_Cobalt.jpg', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-03 23:50:11'),
(62, '0', '', '', '', 0, 53, '', 'Iron', 'iron', '', '', '1725433286_iron-ore.png', '', 'iron-ore.png', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 4, '2024-09-04 00:01:26'),
(63, '0', '', '', '', 0, 53, '', 'Lead', 'lead', '', '', '1725434839_lead-ore.png', '', 'lead-ore.png', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 5, '2024-09-04 00:27:19'),
(64, '0', '', '', '', 0, 53, '', 'Limestone', 'limestone', '', '', '1725435057_limestone-ore.png', '', 'limestone-ore.png', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 6, '2024-09-04 00:30:57'),
(65, '0', '', '', '', 0, 53, '', 'Coal', 'coal', '', '', '1725435248_coal-ore.png', '', 'coal-ore.png', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 7, '2024-09-04 00:34:08'),
(66, '0', '', '', '', 0, 75, '0', 'Makrana Marble', 'makrana-marble', '', '', '1725440704_makrana-marble-1665400479-6577777.jpeg', '', 'makrana.png', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 1, '2024-09-04 02:05:04'),
(67, '0', '', '', '', 0, 75, '0', 'Green Marble', 'green-marble', '', '', '1725441185_green-marble-tiles.jpg', '', 'green-marbel.jpg', '', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 2, '2024-09-04 02:13:05'),
(68, '0', '', '', '', 0, 75, '0', 'Super Albeta Marble', 'super-albeta-marble', '', '', '1725441506_albetas.png', '', 'albeta.png', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 3, '2024-09-04 02:18:26'),
(69, '0', '', '', '', 0, 75, '0', 'Beige Marble', 'beige-marble', '', '', '1725442145_H55-beige.avif', '', 'beige-marble.jpg', '', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 4, '2024-09-04 02:29:05'),
(70, '0', '', '', '', 0, 75, '0', 'Brown Marble', 'brown-marble', '', '', '1725442585_brown-Marb.png', '', 'brown-marble.jpg', '', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 5, '2024-09-04 02:36:25'),
(71, '0', '', '', '', 0, 75, '0', 'Statuario Marble', 'statuario-marble', '', '', '1725442933_Statuario-Marble.png', '', 'Statuario-Marble.png', '', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 6, '2024-09-04 02:47:30'),
(72, '0', '', '', '', 0, 75, '0', 'Grey Marble', 'grey-marble', '', '', '1725443274_20211025115742-1bbf3f57-f6b0-40b2-ab3d-c593ee3cc3ef.jpg', '', '', '', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 7, '2024-09-04 02:47:54'),
(73, '0', '', '', '', 0, 75, '', 'Blue Marble', 'blue-marble', '', '', '1725443666_images (1).jfif', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 8, '2024-09-04 02:54:26'),
(74, '0', '', '', '', 0, 75, '', 'White Marble', 'white-marble', '', '', '1725444013_white-Marble.png', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 9, '2024-09-04 03:00:13'),
(75, '0', '', '', '', 0, 75, '', 'Banswara White Marble', 'banswara-white-marble', '', '', '1725444622_2-30-300x300.webp', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 10, '2024-09-04 03:10:22'),
(76, '0', '', '', '', 0, 62, '0', 'Cotton', 'cotton', '', '', '1725445081_cottons.png', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 3, '2024-09-04 03:18:01'),
(77, '0', '', '', '', 0, 62, '56', 'Wheat', 'wheat', '', '', '1725445388_food3052181605672033525409.jpg', '', '', '', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 03:23:08'),
(78, '0', '', '', '', 0, 62, '56', 'Maize', 'maize', '', '', '1725445607_images (2).jfif', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 3, '2024-09-04 03:26:47'),
(79, '0', '', '', '', 0, 62, '56', 'Figer Millets', 'figer-millets', '', '', '1725446170_FigerMillets.png', '', '', '', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 4, '2024-09-04 03:36:10'),
(80, '0', '', '', '', 0, 62, '59', 'Chickpeas', 'chickpeas', '', '', '1725446747_511wtpCaekL._AC_UF1000,1000_QL80_.jpg', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 1, '2024-09-04 03:45:47'),
(81, '0', '', '', '', 0, 62, '59', 'Soyabeans', 'soyabeans', '', '', '1725447123_Soyabeans.png', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 4, '2024-09-04 03:52:03'),
(82, '0', '', '', '', 0, 62, '59', 'Kidney Beans', 'kidney-beans', '', '', '1725448019_Kidney-Beans.webp', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 4, '2024-09-04 04:06:59'),
(83, '0', '', '', '', 0, 62, '57', 'Clove', 'clove', '', '', '1725448145_clove.png', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 1, '2024-09-04 04:09:05'),
(84, '0', '', '', '', 0, 62, '57', 'Black Pepper', 'black-pepper', '', '', '1725448619_Black_Pepper_ground_2000x.webp', '', '', '', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 3, '2024-09-04 04:16:59'),
(85, '0', '', '', '', 0, 62, '57', 'Green Cardemom', 'green-cardemom', '', '', '1725449045_Layer_2_db1ba3c0-5e0c-42a8-8d17-283f3140682d.webp', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 5, '2024-09-04 04:24:05'),
(86, '0', '', '', '', 0, 62, '57', 'Black Cardemom', 'black-cardemom', '', '', '1725449607_PhotoRoom_20230420_171644-700x700.jpg', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 5, '2024-09-04 04:33:27'),
(87, '0', '', '', '', 0, 62, '57', 'Dry Cumin', 'dry-cumin', '', '', '1725449903_Dry-Cumin.png', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 6, '2024-09-04 04:38:23'),
(88, '0', '', '', '', 0, 62, '58', 'Peanut', 'peanut', '', '', '1725450412_peanut.webp', '', '', '', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 04:46:52'),
(89, '0', '', '', '', 0, 62, '57', 'Turmeric', 'turmeric', '', '', '1725450578_90855769.avif', '', '', '', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 04:49:38'),
(90, '0', '', '', '', 0, 62, '58', 'Cashew', 'cashew', '', '', '1725450593_cashew.webp', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 04:49:53'),
(91, '0', '', '', '', 0, 62, '57', 'Cinnamon/ Cassia Bark', 'cinnamon-cassia-bark', '', '', '1725450850_Cinnamon-Cassia-Bark.png', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 9, '2024-09-04 04:54:10'),
(92, '0', '', '', '', 0, 62, '58', 'Almond', 'almond', '', '', '1725452806_best-almonds-1.jpg', '', '', '', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 05:26:46'),
(93, '0', '', '', '', 0, 62, '58', 'Fox Nut', 'fox-nut', '', '', '1725452542_51pLGJNOnxL._AC_UF350,350_QL80_.jpg', '', '', '', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 05:22:22'),
(94, '0', '', '', '', 0, 62, '57', 'Star Anise', 'star-anise', '', '', '1725451203_s-l1200.jpg', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 05:00:03'),
(95, '0', '', '', '', 0, 62, '57', 'Fennel Seeds', 'fennel-seeds', '', '', '1725451420_Sauf-Premium_500x.jpg', '', '', '', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 05:03:40'),
(96, '0', '', '', '', 0, 62, '58', 'Dry Appricot', 'dry-appricot', '', '', '1725452929_Australian-Dried-Apricots-compress.webp', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 05:28:49'),
(97, '0', '', '', '', 0, 62, '57', 'Fenugreek Seeds', 'fenugreek-seeds', '', '', '1725451877_Fenugreek-Seeds.png', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 05:11:17'),
(98, '0', '', '', '', 0, 62, '57', 'Dry Red Chilli', 'dry-red-chilli', '', '', '1725452017_whole-red-chilli-jpg.webp', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 05:13:37'),
(99, '0', '', '', '', 0, 62, '57', 'Tamarind', 'tamarind', '', '', '1725452196_Why_does_fresh_tamarind_become_dark_in_colour.webp', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 05:16:36'),
(100, '0', '', '', '', 0, 62, '57', 'Mustured Seeds', 'mustured-seeds', '', '', '1725452285_mustard.webp', '', '', '', NULL, '', '', '', '', '0', NULL, '0', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 05:18:05'),
(101, '0', '', '', '', 0, 62, '58', 'Wallnuts', 'wallnuts', '', '', '1725453097_wallnut.png', '', '', '', NULL, '', '', '', '', '0', NULL, '1', NULL, '', '', '', '', NULL, '', '', '', NULL, 1, 0, '2024-09-04 05:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile`
--

CREATE TABLE `tbl_profile` (
  `pro_id` int(11) NOT NULL,
  `pro_logo` varchar(255) NOT NULL,
  `pro_dark_logo` varchar(255) NOT NULL,
  `pro_favicon` varchar(255) NOT NULL,
  `pro_title` text NOT NULL,
  `pro_keyword` text NOT NULL,
  `pro_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_profile`
--

INSERT INTO `tbl_profile` (`pro_id`, `pro_logo`, `pro_dark_logo`, `pro_favicon`, `pro_title`, `pro_keyword`, `pro_detail`) VALUES
(1, 'logo.svg', 'logo_dark.svg', 'fev-icon.png', 'SND Trading', 'SND Trading', 'SND Trading');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(11) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `metadesc` text,
  `url` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `alt1` varchar(255) DEFAULT NULL,
  `alt2` varchar(255) DEFAULT NULL,
  `broadimage` varchar(255) DEFAULT NULL,
  `desc` text,
  `short_desc` text,
  `status` int(11) DEFAULT NULL,
  `is_page` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `industry`, `name`, `heading`, `title`, `keyword`, `metadesc`, `url`, `sort`, `image`, `image1`, `image2`, `alt`, `alt1`, `alt2`, `broadimage`, `desc`, `short_desc`, `status`, `is_page`) VALUES
(5, '1', 'Mechanical', 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT', 'Interior Innovations', 'Interior Innovations', 'Interior Innovations', 'mechanical', 1, '1714115699_foot-back2.jpg', '1714370894_project-4-2.jpg', '1716355482_working.png', '', '', 'working.png', '1714115735_breadcurmb.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempo incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrice risus commodo viverra maecenas accumsan.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam.&nbsp;</p>\r\n', 1, 0),
(6, '1', 'Electrical', 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT', '', '', '', 'electrical', 1, '1714115758_foot-back2.jpg', '1714370907_project-4-2.jpg', '1716355851_working.png', '', '', '', '1714115758_breadcurmb.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempo incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrice risus commodo viverra maecenas accumsan.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam.</p>\r\n', 1, 0),
(7, '1', 'Plumbing', 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT', '', '', '', 'plumbing', 1, '1714115781_foot-back2.jpg', '1714370922_project-4-2.jpg', '1716355894_working.png', '', '', '', '1714115781_breadcurmb.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempo incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrice risus commodo viverra maecenas accumsan.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam.</p>\r\n', 1, 0),
(8, '1', 'AC/HVAC', 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT', '', '', '', 'ac-hvac', 1, '1714115810_foot-back2.jpg', '1714370935_project-4-2.jpg', '1716355950_working.png', '', '', '', '1714115810_breadcurmb.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempo incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrice risus commodo viverra maecenas accumsan.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam.&nbsp;</p>\r\n', 1, 0),
(9, '1', 'Repair And Renovation', 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT', '', '', '', 'repair-and-renovation', 1, '1714115826_foot-back2.jpg', '1714370949_project-4-2.jpg', '1716355994_working.png', '', '', '', '1714121858_breadcurmb.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempo incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrice risus commodo viverra maecenas accumsan.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam.&nbsp;</p>\r\n', 1, 0),
(12, '1', 'After Sales S', 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT', '', '', '', 'after-sales-s', 1, '1714115826_foot-back2.jpg', '1714370949_project-4-2.jpg', '1716356004_working.png', '', '', '', '1714121858_breadcurmb.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempo incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrice risus commodo viverra maecenas accumsan.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam. Esse? Esse repudiandae architecto incidunt corporis nemo nihil quia odio voluptatem blanditiis numquam doloribus nisi, odit ipsa rem omnis, molestiae placeat, perferendis dicta temporibus quam! Similique sit modi temporibus dolor aliquid.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis temporibus vero maxime minima, labore repudiandae asperiores, exercitationem incidunt, atque aperiam rem sapiente enim eaque dicta repellendus quia iusto quam.&nbsp;</p>\r\n', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_category`
--

CREATE TABLE `tbl_service_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `title` text NOT NULL,
  `keyword` text NOT NULL,
  `metadesc` text NOT NULL,
  `sort` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `broadimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service_category`
--

INSERT INTO `tbl_service_category` (`id`, `name`, `url`, `title`, `keyword`, `metadesc`, `sort`, `status`, `broadimage`) VALUES
(1, 'Mechanical', 'mechanical', 'Mechanical', 'Mechanical', 'Mechanical', 1, '1', '1714116972_breadcurmb.jpg'),
(2, 'Electrical', 'electrical', '', '', '', 2, '1', '1714116979_breadcurmb.jpg'),
(3, 'Plumbing', 'plumbing', '', '', '', 3, '1', '1709283717_bred.webp'),
(4, 'AC/HVAC', 'ac-hvac', '', '', '', 4, '1', ''),
(5, 'Repair And Renovation', 'repair-and-renovation', '', '', '', 5, '1', ''),
(7, 'After Sales S', 'after-sales-s', '', '', '', 6, '1', '1714116957_breadcurmb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`id`, `name`, `image`, `width`, `status`, `position`) VALUES
(24, '50', '1714366529662f28410cb45.png', 40, 1, 0),
(25, '100', '1714366511662f282f82b5c.png', 60, 1, 0),
(26, '200', '1714366485662f2815a5199.png', 80, 1, 0),
(31, '300', NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(20) NOT NULL,
  `name` text NOT NULL,
  `intro` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `subtitle` text NOT NULL,
  `title` varchar(200) NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `metadesc` text NOT NULL,
  `sort` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `alt2` varchar(255) NOT NULL,
  `broadimage` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `is_page` varchar(255) NOT NULL,
  `showhp` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`id`, `category_id`, `name`, `intro`, `url`, `subtitle`, `title`, `keyword`, `metadesc`, `sort`, `image`, `image2`, `alt`, `alt2`, `broadimage`, `desc`, `is_page`, `showhp`, `status`) VALUES
(56, 62, 'Grains', '', 'grains', '', '', '', '', 1, '1722251075_rice.jpg', '', '', '', '', '', '', 0, 1),
(57, 62, 'Spices', '', 'spices', '', '', '', '', 2, '1725436356_spices.png', '', '', '', '', '', '', 0, 1),
(58, 62, 'Dry Fruits', '', 'dry-fruits', '', '', '', '', 3, '1725436662_dryfruits.png', '', '', '', '', '', '', 0, 1),
(59, 62, 'Legumes & Pulses', '', 'legumes--pulses', '', '', '', '', 0, '172225191666a77a8c58d99pulse.jpg', '', '', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subsubcategory`
--

CREATE TABLE `tbl_subsubcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(20) NOT NULL,
  `subcategory_id` int(20) NOT NULL,
  `name` text NOT NULL,
  `title` varchar(200) NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `metadesc` text NOT NULL,
  `sort` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teams`
--

CREATE TABLE `tbl_teams` (
  `tt_id` int(11) NOT NULL,
  `tt_name` varchar(255) NOT NULL,
  `tt_url` varchar(255) NOT NULL,
  `tt_location` varchar(255) NOT NULL,
  `tt_short_detail` text NOT NULL,
  `heading` varchar(255) NOT NULL,
  `subheading` varchar(255) NOT NULL,
  `tt_detail` text NOT NULL,
  `tt_whatsapp` text NOT NULL,
  `tt_gmail` text NOT NULL,
  `tt_facebook` text NOT NULL,
  `tt_twitter` text NOT NULL,
  `tt_insta` text NOT NULL,
  `tt_google` text NOT NULL,
  `tt_sort` varchar(255) NOT NULL,
  `tt_status` varchar(255) NOT NULL,
  `tt_image` varchar(255) NOT NULL,
  `tt_alt` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `keyword` text NOT NULL,
  `metadesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teams`
--

INSERT INTO `tbl_teams` (`tt_id`, `tt_name`, `tt_url`, `tt_location`, `tt_short_detail`, `heading`, `subheading`, `tt_detail`, `tt_whatsapp`, `tt_gmail`, `tt_facebook`, `tt_twitter`, `tt_insta`, `tt_google`, `tt_sort`, `tt_status`, `tt_image`, `tt_alt`, `title`, `keyword`, `metadesc`) VALUES
(5, 'Rahul Gupta', 'rahul-gupta', 'Web Designing', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto saepe, reiciendis adipisci aut similique asperiores iure, fuga provident maxime fugit aperiam? Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto saepe, reiciendis adipisci aut similique asperiores iure, fuga provident maxime fugit aperiam? Quo aspernatur, vel error expedita reiciendis quod. Inventore, alias. Quo aspernatur, vel error expedita reiciendis quod. Inventore, alias.</p>\r\n', 'Heading Here', 'Heading Here', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto saepe, reiciendis adipisci aut similique asperiores iure, fuga provident maxime fugit aperiam? Quo aspernatur, vel error expedita reiciendis quod. Inventore, alias. Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto saepe, reiciendis adipisci aut similique asperiores iure, fuga provident maxime fugit aperiam? Quo aspernatur, vel error expedita reiciendis quod. Inventore, alias. Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto saepe, reiciendis adipisci aut similique asperiores iure, fuga provident maxime fugit aperiam? Quo aspernatur, vel error expedita reiciendis quod. Inventore, alias.</p>\r\n', '9876543210', 'dummy@gmail.com', '#', '#', '#', '9876543210', '2', '0', '1713951046_team-1-2.jpg', 'Professional Team', 'Rahul Gupta', 'Rahul Gupta', 'Rahul Gupta'),
(7, 'Anirudh Kumar', 'anirudh-kumar', 'Interior Designer', '<p>Eros justo, posuere loborti viverra laoreet matti ullamcorper posuere viverra .Aliquam eros justo, posuere lobortis, viverra laoreet augue mattis fermentum ullamcorper viverra<br />\r\nlaoreet Aliquam eros justo, posuere loborti viverra laoreet matti ullamcorper posuere Eros justo, posuere loborti viverra laoreet matti ullamcorper posuere viverra .Aliquam eros justo, posuere lobortis, viverra laoreet augue mattis fermentum</p>\r\n\r\n<p>Eros justo, posuere loborti viverra laoreet matti ullamcorper posuere viverra .Aliquam eros justo, posuere lobortis, viverra laoreet augue mattis fermentum ullamcorper viverra<br />\r\nlaoreet Aliquam eros justo, posuere loborti viverra laoreet matti ullamcorper posuere Eros justo, posuere loborti viverra laoreet matti ullamcorper posuere viverra .Aliquam eros justo, posuere lobortis, viverra laoreet augue mattis fermentum ullamcorper viverra<br />\r\nlaoreet Aliquam eros justo, posuere loborti viverra laoreet matti ullamcorper posuere</p>\r\n', '', 'heading here', '<p>desc here</p>\r\n', '9953597328', 'info@abc.ciom', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.insta.com/', '9953597328', '2', '0', '1713951008_team-1-1.jpg', '', '', '', ''),
(8, 'Manish Kumar', 'manish-kumar', 'Web Designing', '', '', '', '', '', '', '', '', '', '', '3', '0', '1713951098_team-1-3.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `tt_id` int(11) NOT NULL,
  `tt_image` varchar(255) NOT NULL,
  `tt_alt` varchar(255) NOT NULL,
  `tt_name` varchar(255) NOT NULL,
  `tt_location` varchar(255) NOT NULL,
  `tt_detail` text NOT NULL,
  `tt_status` int(11) NOT NULL,
  `tt_sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`tt_id`, `tt_image`, `tt_alt`, `tt_name`, `tt_location`, `tt_detail`, `tt_status`, `tt_sort`) VALUES
(43, '', '', 'Jane Smith', ' Global Metals Corp London, UK', 'Working with SND TRADING has been a game-changer for our business. Their wide range of high-quality mineral commodities, particularly iron ore and bauxite, has been instrumental in our manufacturing process. We appreciate their professionalism, reliability, and dedication to delivering on their promises. They are truly a partner we can count on.', 1, 1),
(44, '', '', 'Alice Brown', 'ChocoDelight Ltd. , Switzerland', 'SND TRADINGâ€™s cocoa beans are always of the highest quality. Their attention to detail and timely shipments have greatly benefited our business.', 1, 2),
(45, '', '', 'Vikram Mehta', ' AgriFoods International New York, USA', 'SND TRADING has been an exceptional partner in our supply chain. Their commitment to quality and timely delivery is unmatched. We have sourced high-quality rice and soybeans from them, and every shipment has exceeded our expectations. Their professionalism and dedication to customer satisfaction truly set them apart in the global trade industry.', 1, 0),
(46, '', '', 'Rajesh Kumar', 'GreenHarvest Agro, Mumbai', 'SND TRADING has been a reliable partner for our soybean and rice procurements. Their commitment to quality, timely delivery, and excellent customer service have made a significant impact on our operations. We look forward to continuing this strong partnership.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial_text`
--

CREATE TABLE `tbl_testimonial_text` (
  `id` int(11) NOT NULL,
  `ab_title` varchar(255) NOT NULL,
  `ab_image` varchar(255) NOT NULL,
  `ab_alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_testimonial_text`
--

INSERT INTO `tbl_testimonial_text` (`id`, `ab_title`, `ab_image`, `ab_alt`) VALUES
(1, 'What Our Client Says', '1723005938_1722253917_SeedsInBags.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_turnkey`
--

CREATE TABLE `tbl_turnkey` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `inner_image` varchar(255) NOT NULL,
  `broadimage` varchar(255) NOT NULL,
  `image_alt` varchar(255) NOT NULL,
  `inner_image_alt` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `shortdesc` text NOT NULL,
  `metatag` text NOT NULL,
  `keyword` text NOT NULL,
  `metadesc` text NOT NULL,
  `status` int(11) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_turnkey`
--

INSERT INTO `tbl_turnkey` (`id`, `category_id`, `name`, `url`, `image`, `inner_image`, `broadimage`, `image_alt`, `inner_image_alt`, `description`, `shortdesc`, `metatag`, `keyword`, `metadesc`, `status`, `sort`) VALUES
(1, 1, 'Institutional', 'institutional', '1713956379_t1.jpg', '1716353886_foot-back2.jpg', '', 't1.jpg', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolores? Illum deserunt eius maxime nostrum quisquam facilis modi quia, expedita alias voluptatum reiciendis itaque eum, nulla tenetur. Molestias, odit a! itaque magnam quae eveniet sapiente illum deleniti iste esse enim quis omnis corrupti ullam quos dolorum iure, labore perferendis. Deleniti iusto obcaecati laborum</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolores? Illum deserunt eius maxime nostrum quisquam facilis modi quia, expedita alias voluptatum reiciendis itaque eum, nulla tenetur. Molestias, odit a! itaque magnam quae eveniet sapiente illum deleniti iste esse enim quis omnis corrupti ullam quos dolorum iure, labore perferendis. Deleniti iusto obcaecati laborum</p>\r\n', '', '', '', 1, 6),
(2, 1, 'Industrial', 'industrial', '1713956920_t2.jpg', '1716353872_foot-back2.jpg', '', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolores? Illum deserunt eius maxime nostrum quisquam facilis modi quia, expedita alias voluptatum reiciendis itaque eum, nulla tenetur. Molestias, odit a! itaque magnam quae eveniet sapiente illum deleniti iste esse enim quis omnis corrupti ullam quos dolorum iure, labore perferendis. Deleniti iusto obcaecati laborum</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolores? Illum deserunt eius maxime nostrum quisquam facilis modi quia, expedita alias voluptatum reiciendis itaque eum, nulla tenetur. Molestias, odit a! itaque magnam quae eveniet sapiente illum deleniti iste esse enim quis omnis corrupti ullam quos dolorum iure, labore perferendis. Deleniti iusto obcaecati laborum</p>\r\n', '', '', '', 1, 5),
(3, 1, 'Hospitality', 'hospitality', '1713956932_t4.jpg', '1716353858_foot-back2.jpg', '', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolores? Illum deserunt eius maxime nostrum quisquam facilis modi quia, expedita alias voluptatum reiciendis itaque eum, nulla tenetur. Molestias, odit a! itaque magnam quae eveniet sapiente illum deleniti iste esse enim quis omnis corrupti ullam quos dolorum iure, labore perferendis. Deleniti iusto obcaecati laborum</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolores? Illum deserunt eius maxime nostrum quisquam facilis modi quia, expedita alias voluptatum reiciendis itaque eum, nulla tenetur. Molestias, odit a! itaque magnam quae eveniet sapiente illum deleniti iste esse enim quis omnis corrupti ullam quos dolorum iure, labore perferendis. Deleniti iusto obcaecati laborum</p>\r\n', '', '', '', 1, 4),
(4, 1, 'Hospital', 'hospital', '1713957288_t3.jpg', '1716353846_foot-back2.jpg', '', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolores? Illum deserunt eius maxime nostrum quisquam facilis modi quia, expedita alias voluptatum reiciendis itaque eum, nulla tenetur. Molestias, odit a! itaque magnam quae eveniet sapiente illum deleniti iste esse enim quis omnis corrupti ullam quos dolorum iure, labore perferendis. Deleniti iusto obcaecati laborum</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolores? Illum deserunt eius maxime nostrum quisquam facilis modi quia, expedita alias voluptatum reiciendis itaque eum, nulla tenetur. Molestias, odit a! itaque magnam quae eveniet sapiente illum deleniti iste esse enim quis omnis corrupti ullam quos dolorum iure, labore perferendis. Deleniti iusto obcaecati laborum</p>\r\n', '', '', '', 1, 3),
(6, 1, 'Commercial', 'commercial', '1713957288_t3.jpg', '1716353835_foot-back2.jpg', '', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolores? Illum deserunt eius maxime nostrum quisquam facilis modi quia, expedita alias voluptatum reiciendis itaque eum, nulla tenetur. Molestias, odit a! itaque magnam quae eveniet sapiente illum deleniti iste esse enim quis omnis corrupti ullam quos dolorum iure, labore perferendis. Deleniti iusto obcaecati laborum</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolores? Illum deserunt eius maxime nostrum quisquam facilis modi quia, expedita alias voluptatum reiciendis itaque eum, nulla tenetur. Molestias, odit a! itaque magnam quae eveniet sapiente illum deleniti iste esse enim quis omnis corrupti ullam quos dolorum iure, labore perferendis. Deleniti iusto obcaecati laborum</p>\r\n', '', '', '', 1, 2),
(7, 1, 'Landscaping/Terrace Gardening', 'landscaping-terrace-gardening', '1714035926_t1.jpg', '1716353822_foot-back2.jpg', '1714456686_breadcurmb.jpg', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolores? Illum deserunt eius maxime nostrum quisquam facilis modi quia, expedita alias voluptatum reiciendis itaque eum, nulla tenetur. Molestias, odit a! itaque magnam quae eveniet sapiente illum deleniti iste esse enim quis omnis corrupti ullam quos dolorum iure, labore perferendis. Deleniti iusto obcaecati laborum</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolores? Illum deserunt eius maxime nostrum quisquam facilis modi quia, expedita alias voluptatum reiciendis itaque eum, nulla tenetur. Molestias, odit a! itaque magnam quae eveniet sapiente illum deleniti iste esse enim quis omnis corrupti ullam quos dolorum iure, labore perferendis. Deleniti iusto obcaecati laborum</p>\r\n', 'Turnkey Name Here 1', 'Turnkey Name Here 1', 'Turnkey Name Here 1', 1, 7),
(9, 1, 'Residential', 'residential', '1714035926_t1.jpg', '1716353784_foot-back2.jpg', '1714456686_breadcurmb.jpg', '', 'alt', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolores? Illum deserunt eius maxime nostrum quisquam facilis modi quia, expedita alias voluptatum reiciendis itaque eum, nulla tenetur. Molestias, odit a! itaque magnam quae eveniet sapiente illum deleniti iste esse enim quis omnis corrupti ullam quos dolorum iure, labore perferendis. Deleniti iusto obcaecati laborum</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolores? Illum deserunt eius maxime nostrum quisquam facilis modi quia, expedita alias voluptatum reiciendis itaque eum, nulla tenetur. Molestias, odit a! itaque magnam quae eveniet sapiente illum deleniti iste esse enim quis omnis corrupti ullam quos dolorum iure, labore perferendis. Deleniti iusto obcaecati laborum</p>\r\n', 'Turnkey Name Here 1', 'Turnkey Name Here 1', 'Turnkey Name Here 1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_turnkey_category`
--

CREATE TABLE `tbl_turnkey_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_alt` varchar(255) NOT NULL,
  `breadcrumb` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `keyword` text NOT NULL,
  `metadesc` text NOT NULL,
  `status` int(11) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_turnkey_category`
--

INSERT INTO `tbl_turnkey_category` (`id`, `name`, `image`, `image_alt`, `breadcrumb`, `url`, `title`, `keyword`, `metadesc`, `status`, `sort`) VALUES
(1, 'Residential', '', '', '1714124028_breadcurmb.jpg', 'residential', 'Residential', 'Residential', 'Residential', 1, 0),
(2, 'Commercial', '', '', '', 'commercial', '', '', '', 1, 0),
(3, 'Hospital', '', '', '', 'hospital', '', '', '', 1, 0),
(4, 'Hospitality', '', '', '', 'hospitality', '', '', '', 1, 0),
(5, 'Industrial', '', '', '', 'industrial', '', '', '', 1, 0),
(6, 'Institutional', '', '', '', 'institutional', '', '', '', 1, 0),
(7, 'Landscaping/Terrace Gardening', '', '', '', 'landscaping-terrace-gardening', 'Landscaping/Terrace Gardening', 'Landscaping/Terrace Gardening', 'Landscaping/Terrace Gardening', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_videos`
--

CREATE TABLE `tbl_videos` (
  `b_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `b_image` varchar(255) DEFAULT NULL,
  `b_alt` varchar(255) DEFAULT NULL,
  `b_category` varchar(255) DEFAULT NULL,
  `b_title` varchar(255) DEFAULT NULL,
  `b_sort` int(11) DEFAULT NULL,
  `b_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_videos`
--

INSERT INTO `tbl_videos` (`b_id`, `service_id`, `name`, `b_image`, `b_alt`, `b_category`, `b_title`, `b_sort`, `b_status`) VALUES
(1, 1, '', '1714126033_project-4-3.jpg', '', '1', 'https://youtu.be/D6QCGtYwoLg?si=VJtu6tYVUyVI7BYa', 2, '1'),
(2, 1, 'Portfolio1', '1714126006_project-4-2.jpg', '', '3', '', 1, '1'),
(4, 1, '', '1714125993_project-4-1.jpg', '', '1', '', 1, '1'),
(5, 1, '', '1714126055_project-4-2.jpg', '', '1', '', 0, '1'),
(6, 1, '', '1714126069_project-4-4.jpg', '', '1', '', 0, '1'),
(7, 1, '', '1714126081_project-4-5 (1).jpg', '', '1', '', 0, '1'),
(8, 1, '', '1714126092_project-4-5.jpg', '', '1', '', 0, '1'),
(9, 1, '', '1714126104_project-4-6.jpg', '', '1', '', 0, '1'),
(10, 5, 'Portfolio7', '1714129109_project-4-1.jpg', '', '8', '', 0, '1'),
(11, 5, 'Portfolio4', '1714129123_project-4-2.jpg', '', '8', '', 2, '1'),
(12, 5, 'Portfolio2', '1714129136_project-4-3.jpg', '', '8', '', 3, '1'),
(13, 5, 'Portfolio11', '1714129148_project-4-4.jpg', '', '9', '', 0, '1'),
(14, 5, 'Portfolio1', '1714129161_project-4-6.jpg', '', '9', '', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_videos_category`
--

CREATE TABLE `tbl_videos_category` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_videos_category`
--

INSERT INTO `tbl_videos_category` (`id`, `service_id`, `name`, `sort`, `status`, `url`) VALUES
(1, 7, 'Exterior', 1, '1', 'exterior'),
(3, 1, 'Side View', 2, '1', 'side-view'),
(4, 1, 'Worldwide', 3, '1', 'worldwide'),
(5, 1, 'Countrylife', 4, '1', 'countrylife'),
(8, 5, 'Exterior', 1, '1', 'exterior'),
(9, 5, 'Side View', 2, '1', 'side-view');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_steps`
--

CREATE TABLE `tbl_work_steps` (
  `vs_id` int(11) NOT NULL,
  `vs_title` varchar(255) NOT NULL,
  `vs_subtitle` text NOT NULL,
  `vs_image` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `vs_sort` varchar(255) NOT NULL,
  `vs_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_work_steps`
--

INSERT INTO `tbl_work_steps` (`vs_id`, `vs_title`, `vs_subtitle`, `vs_image`, `alt`, `vs_sort`, `vs_status`) VALUES
(5, 'Concept Development', 'Understand your vision and requirements to create a personalized design concept.', '1713938316_p1.jpg', 'p1.png', '1', '1'),
(6, 'Design & Planning', 'Develop detailed plans and select materials, ensuring a cohesive and stylish design.', '1713938351_p2.jpg', 'p2.png', '2', '1'),
(7, 'Execution & Implementation', 'Oversee the project, ensuring precise execution of the design plan.', '1713938393_p3.jpg', 'p3.png', '3', '1'),
(9, 'Final Reveal & Handove', 'Conduct a quality check, present the completed design, and hand over your transformed space.', '1713938449_p4.jpg', 'p4.png', '4', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`ab_id`);

--
-- Indexes for table `tbl_acheivements`
--
ALTER TABLE `tbl_acheivements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`bnr_id`);

--
-- Indexes for table `tbl_blogcategory`
--
ALTER TABLE `tbl_blogcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_blog_tags`
--
ALTER TABLE `tbl_blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_breadcrumb`
--
ALTER TABLE `tbl_breadcrumb`
  ADD PRIMARY KEY (`brd_id`);

--
-- Indexes for table `tbl_career`
--
ALTER TABLE `tbl_career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category_video`
--
ALTER TABLE `tbl_category_video`
  ADD PRIMARY KEY (`id_glry`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`glry_id`);

--
-- Indexes for table `tbl_gallery_category`
--
ALTER TABLE `tbl_gallery_category`
  ADD PRIMARY KEY (`glry_id`);

--
-- Indexes for table `tbl_homedirector`
--
ALTER TABLE `tbl_homedirector`
  ADD PRIMARY KEY (`ab_id`);

--
-- Indexes for table `tbl_home_extra_text`
--
ALTER TABLE `tbl_home_extra_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job_applications`
--
ALTER TABLE `tbl_job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_portfolio`
--
ALTER TABLE `tbl_portfolio`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_portfolio_category`
--
ALTER TABLE `tbl_portfolio_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service_category`
--
ALTER TABLE `tbl_service_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subsubcategory`
--
ALTER TABLE `tbl_subsubcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teams`
--
ALTER TABLE `tbl_teams`
  ADD PRIMARY KEY (`tt_id`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`tt_id`);

--
-- Indexes for table `tbl_testimonial_text`
--
ALTER TABLE `tbl_testimonial_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_turnkey`
--
ALTER TABLE `tbl_turnkey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_turnkey_category`
--
ALTER TABLE `tbl_turnkey_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_videos`
--
ALTER TABLE `tbl_videos`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_videos_category`
--
ALTER TABLE `tbl_videos_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_work_steps`
--
ALTER TABLE `tbl_work_steps`
  ADD PRIMARY KEY (`vs_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `ab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_acheivements`
--
ALTER TABLE `tbl_acheivements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `bnr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_blogcategory`
--
ALTER TABLE `tbl_blogcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_blog_tags`
--
ALTER TABLE `tbl_blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_breadcrumb`
--
ALTER TABLE `tbl_breadcrumb`
  MODIFY `brd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_career`
--
ALTER TABLE `tbl_career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_category_video`
--
ALTER TABLE `tbl_category_video`
  MODIFY `id_glry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `glry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_gallery_category`
--
ALTER TABLE `tbl_gallery_category`
  MODIFY `glry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_homedirector`
--
ALTER TABLE `tbl_homedirector`
  MODIFY `ab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_home_extra_text`
--
ALTER TABLE `tbl_home_extra_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_job_applications`
--
ALTER TABLE `tbl_job_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_portfolio`
--
ALTER TABLE `tbl_portfolio`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_portfolio_category`
--
ALTER TABLE `tbl_portfolio_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_service_category`
--
ALTER TABLE `tbl_service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_subsubcategory`
--
ALTER TABLE `tbl_subsubcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_teams`
--
ALTER TABLE `tbl_teams`
  MODIFY `tt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `tt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_testimonial_text`
--
ALTER TABLE `tbl_testimonial_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_turnkey`
--
ALTER TABLE `tbl_turnkey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_turnkey_category`
--
ALTER TABLE `tbl_turnkey_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_videos`
--
ALTER TABLE `tbl_videos`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_videos_category`
--
ALTER TABLE `tbl_videos_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_work_steps`
--
ALTER TABLE `tbl_work_steps`
  MODIFY `vs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
