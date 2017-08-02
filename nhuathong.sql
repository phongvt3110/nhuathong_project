-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2017 at 08:02 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nhuathong`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE IF NOT EXISTS `admin_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `types` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`id`, `user`, `pass`, `types`) VALUES
(1, 'test', '14e1b600b1fd579f47433b88e8d85291', 1),
(5, 'testnv', 'fb469d7ef430b0baf0cab6c436e70375', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `parent_id` tinyint(4) NOT NULL,
  `position` tinyint(4) NOT NULL,
  `sub_position` tinyint(4) NOT NULL,
  `subsub_position` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`, `position`, `sub_position`, `subsub_position`) VALUES
(1, 'COLOPHAN â€“ NHá»°A THÃ”NG', 0, 1, 0, 0),
(2, ' NHá»°A THÃ”NG', 0, 1, 0, 0),
(3, 'Tinh Dáº§u ThÃ´ng', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `detail` text NOT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `comment`
--


-- --------------------------------------------------------

--
-- Table structure for table `common`
--

CREATE TABLE IF NOT EXISTS `common` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(400) NOT NULL,
  `detail` text,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `common`
--

INSERT INTO `common` (`id`, `title`, `detail`, `address`, `phone`, `email`, `fax`) VALUES
(1, 'nhua thong', '<p>\r\n	nhua thong.vn</p>\r\n', 'fsfs', 'fsfsfs', 'ffs', '222222222222'),
(2, 'anh vien', 'anh vien', 'P603 toÃ  nhÃ  CT2-C2 Chung cÆ° VOV Má»… TrÃ¬ - Tá»« LiÃªm - HÃ  Ná»™i', '0989328669', 'thongdesign.80@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `posttime` datetime NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contacts`
--


-- --------------------------------------------------------

--
-- Table structure for table `menu_footer`
--

CREATE TABLE IF NOT EXISTS `menu_footer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch1` varchar(400) NOT NULL,
  `branch2` varchar(400) NOT NULL,
  `branch3` varchar(400) NOT NULL,
  `thumb` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `menu_footer`
--

INSERT INTO `menu_footer` (`id`, `branch1`, `branch2`, `branch3`, `thumb`) VALUES
(1, 'HÃ  Ná»™i, Háº£i PhÃ²ng, Nam Äá»‹nh, HÃ  TÃ¢y, VÄ©nh PhÃºc, PhÃº Thá», Báº¯c Ninh, Báº¯c Giang, ThÃ¡i NguyÃªn, HÆ°ng YÃªn, Quáº£ng Ninh, Háº£i DÆ°Æ¡ng, Ninh BÃ¬nh, ThÃ¡i BÃ¬nh, HÃ  Nam', 'HÃ  Ná»™i, Háº£i PhÃ²ng, Nam Äá»‹nh, HÃ  TÃ¢y, VÄ©nh PhÃºc, PhÃº Thá», Báº¯c Ninh, Báº¯c Giang, ThÃ¡i NguyÃªn, HÆ°ng YÃªn, Quáº£ng Ninh, Háº£i DÆ°Æ¡ng, Ninh BÃ¬nh, ThÃ¡i BÃ¬nh, HÃ  Nam', 'HÃ  Ná»™i, Háº£i PhÃ²ng, Nam Äá»‹nh, HÃ  TÃ¢y, VÄ©nh PhÃºc, PhÃº Thá», Báº¯c Ninh, Báº¯c Giang, ThÃ¡i NguyÃªn, HÆ°ng YÃªn, Quáº£ng Ninh, Háº£i DÆ°Æ¡ng, Ninh BÃ¬nh, ThÃ¡i BÃ¬nh', ''),
(2, 'Copyright 2017 by NHá»°A THÃ”NG.VN', '', '', '300717233524logo_footer.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu_header`
--

CREATE TABLE IF NOT EXISTS `menu_header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumb` varchar(300) NOT NULL,
  `title` varchar(300) DEFAULT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `support` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `menu_header`
--

INSERT INTO `menu_header` (`id`, `thumb`, `title`, `phone1`, `phone2`, `support`) VALUES
(1, '300717233505logo.png', 'nhua thong.vn', '0989.328.669', '0989.328.669', '(TÆ¯ Váº¤N KHÃCH HÃ€NG 24/24)');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `serialno` varchar(50) DEFAULT NULL,
  `summary` varchar(350) DEFAULT NULL,
  `detail` text,
  `cateid` int(11) NOT NULL,
  `comment` text,
  `thumb_photo` varchar(200) NOT NULL,
  `origin_photo` varchar(200) NOT NULL,
  `postdate` datetime NOT NULL,
  `counter` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `lang` tinyint(4) NOT NULL,
  `hot` tinyint(4) NOT NULL DEFAULT '0',
  `actives` int(11) NOT NULL DEFAULT '1',
  `author` varchar(120) NOT NULL DEFAULT 'vienlv',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `name`, `serialno`, `summary`, `detail`, `cateid`, `comment`, `thumb_photo`, `origin_photo`, `postdate`, `counter`, `price`, `lang`, `hot`, `actives`, `author`) VALUES
(1, 'GiÃ¡ sÆ¡n Dulux trá»n gÃ³i', 'SÆ¡n nhÃ  Dulux', 'D001', 'Äá»‘i vá»›i cÃ´ng trÃ¬nh biá»‡t thá»±, cÃ´ng trÃ¬nh phá»©c táº¡p, cÃ´ng trÃ¬nh sÆ¡n cá»¥c bá»™ hoáº·c Ä‘á»‹a hÃ¬nh khÃ³ thi cÃ´ng, hoáº·c khÃ¡ch hÃ ng cÃ³ yÃªu cáº§u riÃªngâ€¦ chuyÃªn viÃªn tÆ° váº¥n sáº½ bÃ¡o giÃ¡ trá»±c tiáº¿p sau khi tiáº¿n hÃ nh kháº£o sÃ¡t táº¡i cÃ´ng trÃ¬nh.', '<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">1. 100% váº­t liá»‡u sÆ¡n CH&Iacute;NH H&Atilde;NG Tá»ª NH&Agrave; M&Aacute;Y</span><br style="box-sizing: border-box;" />\r\n	+ 100% váº­t liá»‡u Ä‘Æ°á»£c nháº­p ch&iacute;nh h&atilde;ng tá»« nh&agrave; m&aacute;y sÆ¡n Dulux &ndash; NgÆ°á»i báº¡n h&agrave;ng tin cáº­y!<br style="box-sizing: border-box;" />\r\n	+ Má»™t sá»‘ dá»± &aacute;n&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">SI&Ecirc;U VIP</span>, sÆ¡n Ä‘Æ°á»£c nháº­p kháº©u trá»±c tiáº¿p tá»«&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">vÆ°Æ¡ng quá»‘c Anh</span>.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">2. Cam káº¿t 100% váº­t liá»‡u sÆ¡n KH&Ocirc;NG CHá»¨A H&Oacute;A CHáº¤T Äá»˜C Háº I</span><br style="box-sizing: border-box;" />\r\n	+ Kh&ocirc;ng chá»©a Ch&igrave; (Pb)<br style="box-sizing: border-box;" />\r\n	+ Nháº¹ m&ugrave;i (ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; m&ugrave;i háº¯c)<br style="box-sizing: border-box;" />\r\n	+ Kh&ocirc;ng g&acirc;y máº©n ngá»©a, kh&ocirc;ng dá»‹ á»©ng vá»›i da<br style="box-sizing: border-box;" />\r\n	+ Kh&ocirc;ng chá»©a c&aacute;c th&agrave;nh pháº§n h&oacute;a cháº¥t c&oacute; háº¡i cho sá»©c khá»e.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">3. Chuy&ecirc;n gia tÆ° váº¥n h&agrave;ng Ä‘áº§u lÄ©nh vá»±c sÆ¡n</span><br style="box-sizing: border-box;" />\r\n	+ ÄÆ°á»£c Ä‘&agrave;o táº¡o b&agrave;i báº£n &amp; trang bá»‹ Ä‘áº§y Ä‘á»§ kiáº¿n thá»©c.<br style="box-sizing: border-box;" />\r\n	+ Am hiá»ƒu vá» sÆ¡n &amp; h&oacute;a cháº¥t.<br style="box-sizing: border-box;" />\r\n	+ Am hiá»ƒu vá» thiáº¿t káº¿, trang tr&iacute; nh&agrave; cá»­a.<br style="box-sizing: border-box;" />\r\n	+ Am hiá»ƒu phong thá»§y.<br style="box-sizing: border-box;" />\r\n	+ Tháº¥u hiá»ƒu t&acirc;m l&yacute;, sá»Ÿ th&iacute;ch cá»§a kh&aacute;ch h&agrave;ng.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">4. Äá»™i ngÅ© thá»£ thi c&ocirc;ng tay nghá» cao, ká»¹ thuáº­t xá»­ l&yacute; tÆ°á»ng giá»i</span><br style="box-sizing: border-box;" />\r\n	+ C&oacute; tr&ecirc;n 15 nÄƒm kinh nghiá»‡m thi c&ocirc;ng sÆ¡n<br style="box-sizing: border-box;" />\r\n	+ ÄÆ°á»£c tuyá»ƒn chá»n ká»¹ lÆ°á»¡ng tr&ecirc;n to&agrave;n quá»‘c<br style="box-sizing: border-box;" />\r\n	+ ThÆ°á»ng xuy&ecirc;n tham gia c&aacute;c kh&oacute;a huáº¥n luyá»‡n &amp; cuá»™c thi tay nghá» giá»i.<br style="box-sizing: border-box;" />\r\n	+ L&agrave;m viá»‡c c&oacute; tr&aacute;ch nhiá»‡m &amp; tu&acirc;n thá»§ ká»· luáº­t an to&agrave;n lao Ä‘á»™ng.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">5. Ch&iacute;nh s&aacute;ch chÄƒm s&oacute;c kh&aacute;ch h&agrave;ng NHÆ¯ THÆ¯á»¢NG Äáº¾ &ndash; Duy nháº¥t táº¡i Viá»‡t Nam!</span><br style="box-sizing: border-box;" />\r\n	+ ÄÆ°á»£c nh&agrave; tháº§u&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Báº¢O TR&Igrave;</span>&nbsp;sá»­a chá»¯a ho&agrave;n to&agrave;n&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">MIá»„N PH&Iacute;</span>.<br style="box-sizing: border-box;" />\r\n	+ Cam káº¿t&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Báº¢O H&Agrave;NH</span>&nbsp;tÆ°á»ng nh&agrave;&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Äáº¾N 10 NÄ‚M</span>.<br style="box-sizing: border-box;" />\r\n	+ Báº£o vá»‡&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">TUYá»†T Äá»I</span>&nbsp;quyá»n lá»£i kh&aacute;ch h&agrave;ng v&agrave; nhiá»u Æ°u Ä‘&atilde;i kh&aacute;c.</p>\r\n', 1, 'GiÃ¡ sÆ¡n Dulux trá»n gÃ³i', '0104170107515.jpg', '0404170034165.jpg', '2017-04-01 01:07:57', 0, 52000, 0, 1, 1, 'vienlv'),
(2, 'GiÃ¡ sÆ¡n Nippon trá»n gÃ³i', 'SÆ¡n nhÃ  Nippon ', 'N001', 'Äá»‘i vá»›i cÃ´ng trÃ¬nh biá»‡t thá»±, cÃ´ng trÃ¬nh phá»©c táº¡p, cÃ´ng trÃ¬nh sÆ¡n cá»¥c bá»™ hoáº·c Ä‘á»‹a hÃ¬nh khÃ³ thi cÃ´ng, hoáº·c khÃ¡ch hÃ ng cÃ³ yÃªu cáº§u riÃªngâ€¦ chuyÃªn viÃªn tÆ° váº¥n sáº½ bÃ¡o giÃ¡ trá»±c tiáº¿p sau khi tiáº¿n hÃ nh kháº£o sÃ¡t táº¡i cÃ´ng trÃ¬nh', '<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">1. 100% váº­t liá»‡u sÆ¡n CH&Iacute;NH H&Atilde;NG Tá»ª NH&Agrave; M&Aacute;Y</span><br style="box-sizing: border-box;" />\r\n	+ 100% váº­t liá»‡u Ä‘Æ°á»£c nháº­p ch&iacute;nh h&atilde;ng tá»« nh&agrave; m&aacute;y sÆ¡n Dulux &ndash; NgÆ°á»i báº¡n h&agrave;ng tin cáº­y!<br style="box-sizing: border-box;" />\r\n	+ Má»™t sá»‘ dá»± &aacute;n&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">SI&Ecirc;U VIP</span>, sÆ¡n Ä‘Æ°á»£c nháº­p kháº©u trá»±c tiáº¿p tá»«&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">vÆ°Æ¡ng quá»‘c Anh</span>.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">2. Cam káº¿t 100% váº­t liá»‡u sÆ¡n KH&Ocirc;NG CHá»¨A H&Oacute;A CHáº¤T Äá»˜C Háº I</span><br style="box-sizing: border-box;" />\r\n	+ Kh&ocirc;ng chá»©a Ch&igrave; (Pb)<br style="box-sizing: border-box;" />\r\n	+ Nháº¹ m&ugrave;i (ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; m&ugrave;i háº¯c)<br style="box-sizing: border-box;" />\r\n	+ Kh&ocirc;ng g&acirc;y máº©n ngá»©a, kh&ocirc;ng dá»‹ á»©ng vá»›i da<br style="box-sizing: border-box;" />\r\n	+ Kh&ocirc;ng chá»©a c&aacute;c th&agrave;nh pháº§n h&oacute;a cháº¥t c&oacute; háº¡i cho sá»©c khá»e.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">3. Chuy&ecirc;n gia tÆ° váº¥n h&agrave;ng Ä‘áº§u lÄ©nh vá»±c sÆ¡n</span><br style="box-sizing: border-box;" />\r\n	+ ÄÆ°á»£c Ä‘&agrave;o táº¡o b&agrave;i báº£n &amp; trang bá»‹ Ä‘áº§y Ä‘á»§ kiáº¿n thá»©c.<br style="box-sizing: border-box;" />\r\n	+ Am hiá»ƒu vá» sÆ¡n &amp; h&oacute;a cháº¥t.<br style="box-sizing: border-box;" />\r\n	+ Am hiá»ƒu vá» thiáº¿t káº¿, trang tr&iacute; nh&agrave; cá»­a.<br style="box-sizing: border-box;" />\r\n	+ Am hiá»ƒu phong thá»§y.<br style="box-sizing: border-box;" />\r\n	+ Tháº¥u hiá»ƒu t&acirc;m l&yacute;, sá»Ÿ th&iacute;ch cá»§a kh&aacute;ch h&agrave;ng.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">4. Äá»™i ngÅ© thá»£ thi c&ocirc;ng tay nghá» cao, ká»¹ thuáº­t xá»­ l&yacute; tÆ°á»ng giá»i</span><br style="box-sizing: border-box;" />\r\n	+ C&oacute; tr&ecirc;n 15 nÄƒm kinh nghiá»‡m thi c&ocirc;ng sÆ¡n<br style="box-sizing: border-box;" />\r\n	+ ÄÆ°á»£c tuyá»ƒn chá»n ká»¹ lÆ°á»¡ng tr&ecirc;n to&agrave;n quá»‘c<br style="box-sizing: border-box;" />\r\n	+ ThÆ°á»ng xuy&ecirc;n tham gia c&aacute;c kh&oacute;a huáº¥n luyá»‡n &amp; cuá»™c thi tay nghá» giá»i.<br style="box-sizing: border-box;" />\r\n	+ L&agrave;m viá»‡c c&oacute; tr&aacute;ch nhiá»‡m &amp; tu&acirc;n thá»§ ká»· luáº­t an to&agrave;n lao Ä‘á»™ng.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">5. Ch&iacute;nh s&aacute;ch chÄƒm s&oacute;c kh&aacute;ch h&agrave;ng NHÆ¯ THÆ¯á»¢NG Äáº¾ &ndash; Duy nháº¥t táº¡i Viá»‡t Nam!</span><br style="box-sizing: border-box;" />\r\n	+ ÄÆ°á»£c nh&agrave; tháº§u&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Báº¢O TR&Igrave;</span>&nbsp;sá»­a chá»¯a ho&agrave;n to&agrave;n&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">MIá»„N PH&Iacute;</span>.<br style="box-sizing: border-box;" />\r\n	+ Cam káº¿t&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Báº¢O H&Agrave;NH</span>&nbsp;tÆ°á»ng nh&agrave;&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Äáº¾N 10 NÄ‚M</span>.<br style="box-sizing: border-box;" />\r\n	+ Báº£o vá»‡&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">TUYá»†T Äá»I</span>&nbsp;quyá»n lá»£i kh&aacute;ch h&agrave;ng v&agrave; nhiá»u Æ°u Ä‘&atilde;i kh&aacute;c.</p>\r\n', 1, 'GiÃ¡ sÆ¡n Nippon trá»n gÃ³i', '0104170109165.jpg', '0104170109243.JPG', '2017-04-01 01:09:28', 0, 53000, 0, 1, 1, 'vienlv'),
(3, 'GiÃ¡ sÆ¡n Kova trá»n gÃ³i', 'SÆ¡n nhÃ  Kova', 'K001', 'Äá»‘i vá»›i cÃ´ng trÃ¬nh biá»‡t thá»±, cÃ´ng trÃ¬nh phá»©c táº¡p, cÃ´ng trÃ¬nh sÆ¡n cá»¥c bá»™ hoáº·c Ä‘á»‹a hÃ¬nh khÃ³ thi cÃ´ng, hoáº·c khÃ¡ch hÃ ng cÃ³ yÃªu cáº§u riÃªngâ€¦ chuyÃªn viÃªn tÆ° váº¥n sáº½ bÃ¡o giÃ¡ trá»±c tiáº¿p sau khi tiáº¿n hÃ nh kháº£o sÃ¡t táº¡i cÃ´ng trÃ¬nh', '<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">1. 100% váº­t liá»‡u sÆ¡n CH&Iacute;NH H&Atilde;NG Tá»ª NH&Agrave; M&Aacute;Y</span><br style="box-sizing: border-box;" />\r\n	+ 100% váº­t liá»‡u Ä‘Æ°á»£c nháº­p ch&iacute;nh h&atilde;ng tá»« nh&agrave; m&aacute;y sÆ¡n Dulux &ndash; NgÆ°á»i báº¡n h&agrave;ng tin cáº­y!<br style="box-sizing: border-box;" />\r\n	+ Má»™t sá»‘ dá»± &aacute;n&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">SI&Ecirc;U VIP</span>, sÆ¡n Ä‘Æ°á»£c nháº­p kháº©u trá»±c tiáº¿p tá»«&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">vÆ°Æ¡ng quá»‘c Anh</span>.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">2. Cam káº¿t 100% váº­t liá»‡u sÆ¡n KH&Ocirc;NG CHá»¨A H&Oacute;A CHáº¤T Äá»˜C Háº I</span><br style="box-sizing: border-box;" />\r\n	+ Kh&ocirc;ng chá»©a Ch&igrave; (Pb)<br style="box-sizing: border-box;" />\r\n	+ Nháº¹ m&ugrave;i (ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; m&ugrave;i háº¯c)<br style="box-sizing: border-box;" />\r\n	+ Kh&ocirc;ng g&acirc;y máº©n ngá»©a, kh&ocirc;ng dá»‹ á»©ng vá»›i da<br style="box-sizing: border-box;" />\r\n	+ Kh&ocirc;ng chá»©a c&aacute;c th&agrave;nh pháº§n h&oacute;a cháº¥t c&oacute; háº¡i cho sá»©c khá»e.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">3. Chuy&ecirc;n gia tÆ° váº¥n h&agrave;ng Ä‘áº§u lÄ©nh vá»±c sÆ¡n</span><br style="box-sizing: border-box;" />\r\n	+ ÄÆ°á»£c Ä‘&agrave;o táº¡o b&agrave;i báº£n &amp; trang bá»‹ Ä‘áº§y Ä‘á»§ kiáº¿n thá»©c.<br style="box-sizing: border-box;" />\r\n	+ Am hiá»ƒu vá» sÆ¡n &amp; h&oacute;a cháº¥t.<br style="box-sizing: border-box;" />\r\n	+ Am hiá»ƒu vá» thiáº¿t káº¿, trang tr&iacute; nh&agrave; cá»­a.<br style="box-sizing: border-box;" />\r\n	+ Am hiá»ƒu phong thá»§y.<br style="box-sizing: border-box;" />\r\n	+ Tháº¥u hiá»ƒu t&acirc;m l&yacute;, sá»Ÿ th&iacute;ch cá»§a kh&aacute;ch h&agrave;ng.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">4. Äá»™i ngÅ© thá»£ thi c&ocirc;ng tay nghá» cao, ká»¹ thuáº­t xá»­ l&yacute; tÆ°á»ng giá»i</span><br style="box-sizing: border-box;" />\r\n	+ C&oacute; tr&ecirc;n 15 nÄƒm kinh nghiá»‡m thi c&ocirc;ng sÆ¡n<br style="box-sizing: border-box;" />\r\n	+ ÄÆ°á»£c tuyá»ƒn chá»n ká»¹ lÆ°á»¡ng tr&ecirc;n to&agrave;n quá»‘c<br style="box-sizing: border-box;" />\r\n	+ ThÆ°á»ng xuy&ecirc;n tham gia c&aacute;c kh&oacute;a huáº¥n luyá»‡n &amp; cuá»™c thi tay nghá» giá»i.<br style="box-sizing: border-box;" />\r\n	+ L&agrave;m viá»‡c c&oacute; tr&aacute;ch nhiá»‡m &amp; tu&acirc;n thá»§ ká»· luáº­t an to&agrave;n lao Ä‘á»™ng.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">5. Ch&iacute;nh s&aacute;ch chÄƒm s&oacute;c kh&aacute;ch h&agrave;ng NHÆ¯ THÆ¯á»¢NG Äáº¾ &ndash; Duy nháº¥t táº¡i Viá»‡t Nam!</span><br style="box-sizing: border-box;" />\r\n	+ ÄÆ°á»£c nh&agrave; tháº§u&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Báº¢O TR&Igrave;</span>&nbsp;sá»­a chá»¯a ho&agrave;n to&agrave;n&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">MIá»„N PH&Iacute;</span>.<br style="box-sizing: border-box;" />\r\n	+ Cam káº¿t&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Báº¢O H&Agrave;NH</span>&nbsp;tÆ°á»ng nh&agrave;&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Äáº¾N 10 NÄ‚M</span>.<br style="box-sizing: border-box;" />\r\n	+ Báº£o vá»‡&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">TUYá»†T Äá»I</span>&nbsp;quyá»n lá»£i kh&aacute;ch h&agrave;ng v&agrave; nhiá»u Æ°u Ä‘&atilde;i kh&aacute;c.</p>\r\n', 1, 'GiÃ¡ sÆ¡n Kova trá»n gÃ³i', '0104170110455.jpg', '0404170033595.jpg', '2017-04-01 01:10:34', 0, 52000, 0, 1, 1, 'vienlv'),
(4, 'GiÃ¡ sÆ¡n Jotun trá»n gÃ³i', 'SÆ¡n nhÃ  Jotun', 'J001', 'Äá»‘i vá»›i cÃ´ng trÃ¬nh biá»‡t thá»±, cÃ´ng trÃ¬nh phá»©c táº¡p, cÃ´ng trÃ¬nh sÆ¡n cá»¥c bá»™ hoáº·c Ä‘á»‹a hÃ¬nh khÃ³ thi cÃ´ng, hoáº·c khÃ¡ch hÃ ng cÃ³ yÃªu cáº§u riÃªngâ€¦ chuyÃªn viÃªn tÆ° váº¥n sáº½ bÃ¡o giÃ¡ trá»±c tiáº¿p sau khi tiáº¿n hÃ nh kháº£o sÃ¡t táº¡i cÃ´ng trÃ¬nh', '<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">1. Váº­t liá»‡u sÆ¡n ch&iacute;nh h&atilde;ng Jotun Paint</span><br style="box-sizing: border-box;" />\r\n	+ 100% váº­t liá»‡u Ä‘Æ°á»£c nháº­p trá»±c tiáº¿p tá»« nh&agrave; m&aacute;y sÆ¡n JOTUN.<br style="box-sizing: border-box;" />\r\n	+ Nh&agrave; tháº§u duy nháº¥t Ä‘Æ°á»£c&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">JOTUN Viá»‡t Nam</span>&nbsp;á»§y quyá»n &amp;&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">táº­p Ä‘o&agrave;n JOTUN NAUY</span>&nbsp;chá»©ng nháº­n.<br style="box-sizing: border-box;" />\r\n	+ Má»™t sá»‘ dá»± &aacute;n&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">SI&Ecirc;U VIP</span>, sÆ¡n Ä‘Æ°á»£c nháº­p kháº©u trá»±c tiáº¿p tá»«&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">táº­p Ä‘o&agrave;n JOTUN NAUY</span>.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">2. Cam káº¿t 100% váº­t liá»‡u sÆ¡n KH&Ocirc;NG CHá»¨A H&Oacute;A CHáº¤T Äá»˜C Háº I</span><br style="box-sizing: border-box;" />\r\n	+ Kh&ocirc;ng chá»©a Ch&igrave; (Pb)<br style="box-sizing: border-box;" />\r\n	+ Kh&ocirc;ng chá»©a c&aacute;c th&agrave;nh pháº§n h&oacute;a cháº¥t c&oacute; háº¡i cho sá»©c khá»e.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">3. TÆ° váº¥n táº­n t&igrave;nh bá»Ÿi c&aacute;c CHUY&Ecirc;N GIA</span><br style="box-sizing: border-box;" />\r\n	+ Há»™i tá»¥ nhiá»u CHUY&Ecirc;N GIA H&Agrave;NG Äáº¦U ng&agrave;nh sÆ¡n.<br style="box-sizing: border-box;" />\r\n	+ Am hiá»ƒu vá» sÆ¡n &amp; h&oacute;a cháº¥t.<br style="box-sizing: border-box;" />\r\n	+ Am hiá»ƒu vá» thiáº¿t káº¿, trang tr&iacute; nh&agrave; cá»­a.<br style="box-sizing: border-box;" />\r\n	+ Am hiá»ƒu phong thá»§y.<br style="box-sizing: border-box;" />\r\n	+ Tháº¥u hiá»ƒu t&acirc;m l&yacute;, sá»Ÿ th&iacute;ch cá»§a kh&aacute;ch h&agrave;ng.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">4. Äá»™i ngÅ© thá»£ thi c&ocirc;ng tay nghá» cao, ká»¹ thuáº­t xá»­ l&yacute; tÆ°á»ng giá»i</span><br style="box-sizing: border-box;" />\r\n	+ C&oacute; tr&ecirc;n 15 nÄƒm kinh nghiá»‡m thi c&ocirc;ng sÆ¡n<br style="box-sizing: border-box;" />\r\n	+ ÄÆ°á»£c tuyá»ƒn chá»n ká»¹ lÆ°á»¡ng tr&ecirc;n to&agrave;n quá»‘c<br style="box-sizing: border-box;" />\r\n	+ ThÆ°á»ng xuy&ecirc;n tham gia c&aacute;c kh&oacute;a huáº¥n luyá»‡n &amp; cuá»™c thi tay nghá» giá»i.<br style="box-sizing: border-box;" />\r\n	+ L&agrave;m viá»‡c c&oacute; tr&aacute;ch nhiá»‡m &amp; tu&acirc;n thá»§ ká»· luáº­t an to&agrave;n lao Ä‘á»™ng.</p>\r\n<p style="box-sizing: border-box; margin: 15px 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 14px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(75, 75, 75);">\r\n	<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">5. Ch&iacute;nh s&aacute;ch chÄƒm s&oacute;c kh&aacute;ch h&agrave;ng NHÆ¯ THÆ¯á»¢NG Äáº¾ &ndash; Duy nháº¥t táº¡i Viá»‡t Nam!</span><br style="box-sizing: border-box;" />\r\n	+ ÄÆ°á»£c nh&agrave; tháº§u&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Báº¢O TR&Igrave;</span>&nbsp;sá»­a chá»¯a ho&agrave;n to&agrave;n&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">MIá»„N PH&Iacute;</span>.<br style="box-sizing: border-box;" />\r\n	+ Cam káº¿t&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Báº¢O H&Agrave;NH</span>&nbsp;tÆ°á»ng nh&agrave;&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Äáº¾N 10 NÄ‚M</span>.<br style="box-sizing: border-box;" />\r\n	+ Báº£o vá»‡&nbsp;<span style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">TUYá»†T Äá»I</span>&nbsp;quyá»n lá»£i kh&aacute;ch h&agrave;ng v&agrave; nhiá»u Æ°u Ä‘&atilde;i kh&aacute;c</p>\r\n', 1, 'GiÃ¡ sÆ¡n Jotun trá»n gÃ³i', '0104170113475.jpg', '0404170033303.JPG', '2017-04-01 01:13:38', 0, 52000, 0, 1, 1, 'vienlv'),
(5, 'fd', 'fdfd', 'b11', 'sff', '<p>\r\n	fsfsfsfs</p>\r\n', 2, 'fsfs', '080417143308ga1.jpg', '080417143314giada.jpg', '2017-04-08 14:32:56', 0, 22, 0, 1, 1, 'vienlv'),
(6, '', '', '', '', '', 0, '', '', '', '2017-05-25 22:59:53', 0, 0, 0, 0, 1, 'vienlv'),
(7, '', '', '', '', '', 0, '', '', '', '2017-05-25 23:00:25', 0, 0, 0, 0, 1, 'vienlv'),
(8, '', '', 'S001', '', '', 0, '', '', '', '2017-05-25 23:12:12', 0, 100, 0, 2, 1, 'vienlv'),
(9, '', '', 'S001', '', '', 0, '', '', '', '2017-05-25 23:12:20', 0, 100, 0, 2, 1, 'vienlv'),
(10, '', '', 'S001', '', '', 0, '', '', '', '2017-05-25 23:12:37', 0, 100, 0, 2, 1, 'vienlv'),
(11, 'dsdsd', 'dsdsd', 'S001', 'dsdsd', '<p>\r\n	dsdsd</p>\r\n', 1, 'dsdsd', '2505172324575.jpg', '2505172325015.jpg', '2017-05-25 23:24:50', 0, 100, 0, 0, 1, 'vienlv'),
(12, 'dsdsds', 'dsdsd', 'S001', 'dsdsdsd', '<p>\r\n	sdsdsd</p>\r\n', 1, 'dsdsd', '2505172326225.jpg', '2505172326275.jpg', '2017-05-25 23:26:08', 0, 100, 0, 0, 1, 'vienlv'),
(21, 'test', 'son nha dep luu tam', 'S001', 'son nha dep luu tam', 'son nha dep luu tam', 1, 'son', '100417212949jutun1.jpg', '100417212956jtun2.jpg', '2017-05-25 23:58:58', 0, 100, 0, 0, 1, 'vienlv'),
(22, 'fsfsf', 'sffs', 'S001', 'fsfsfs', '<p>\r\n	fsfsfsf</p>\r\n', 1, 'son', '100417212949jutun1.jpg', '100417212956jtun2.jpg', '2017-05-25 23:59:20', 0, 100, 0, 0, 1, 'test'),
(23, 'rerere', '2323', 'S001', 'son nha dep luu tam', 'son nha dep luu tam', 1, 'son', '100417212949jutun1.jpg', '100417212956jtun2.jpg', '2017-05-30 23:09:05', 0, 100, 0, 0, 0, 'test'),
(26, 'luu tam thoi chinh lai', 'son nha dep luu tam', 'S001', 'son nha dep luu tam', 'son nha dep luu tam', 1, 'son', '100417212949jutun1.jpg', '100417212956jtun2.jpg', '2017-05-30 23:50:28', 0, 100, 0, 0, 0, 'test'),
(27, 'testacc', 'abc', 'S001', 'fdfdfd', '<p>\r\n	ffsfsfsfs</p>\r\n', 1, 'fsfsfs', '3005172351175.jpg', '3005172351225.jpg', '2017-05-30 23:51:03', 0, 100, 0, 0, 0, 'test'),
(28, 'luu tam thoi chinh lai', 'son nha dep luu tam', 'S001', 'son nha dep luu tam', 'son nha dep luu tam', 1, 'son', '100417212949jutun1.jpg', '100417212956jtun2.jpg', '2017-05-30 23:51:55', 0, 100, 0, 0, 1, 'vienlv'),
(29, 'ok test', 'ererer', 'S001', 'dsdsd', '<p>\r\n	dsdsdsdsds</p>\r\n', 1, 'dsdsdsds', '3005172353015.jpg', '3005172353055.jpg', '2017-05-30 23:52:49', 0, 100, 0, 1, 1, 'vienlv'),
(30, 'luu tam thoi chinh lai', 'son nha dep luu tam', 'S001', 'son nha dep luu tam', 'son nha dep luu tam', 1, 'son', '100417212949jutun1.jpg', '100417212956jtun2.jpg', '2017-05-30 23:53:02', 0, 100, 0, 0, 1, 'vienlv'),
(31, 'luu tam thoi chinh lai', 'son nha dep luu tam', 'S001', 'son nha dep luu tam', 'son nha dep luu tam', 1, 'son', '100417212949jutun1.jpg', '100417212956jtun2.jpg', '2017-05-31 00:09:08', 0, 100, 0, 0, 0, 'test'),
(32, 'fff', 'dfdfdf', 'S001', 'fdfdf', '<p>\r\n	dfdfdf</p>\r\n', 1, 'fdfdf', '3105170009435.jpg', '3105170009475.jpg', '2017-05-31 00:09:26', 0, 100, 0, 0, 0, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `summary` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `thumb` varchar(150) NOT NULL,
  `postdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `services`
--


-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `summary` varchar(250) NOT NULL,
  `links` varchar(150) NOT NULL,
  `img` varchar(150) NOT NULL,
  `createdate` datetime NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `title`, `summary`, `links`, `img`, `createdate`, `type`) VALUES
(1, 'GiÃ¡ sÆ¡n Dulux trá»n gÃ³i', '', '#', '04041700313013.png', '2017-04-03 22:24:23', 1),
(2, 'GiÃ¡ sÆ¡n Nippon trá»n gÃ³i', '', '#', '04041700314013.png', '2017-04-03 22:31:51', 1),
(3, 'GiÃ¡ sÆ¡n Kova trá»n gÃ³i', '', '#', '04041700314913.png', '2017-04-03 22:32:10', 1),
(4, 'GiÃ¡ sÆ¡n Jotun trá»n gÃ³i', '', '#', '04041700315713.png', '2017-04-03 22:32:38', 1),
(5, 'quáº£ng cÃ¡o bÃªn pháº£i', '', '#', '030417231940sonha.jpg', '2017-04-03 23:19:21', 2);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `video`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
