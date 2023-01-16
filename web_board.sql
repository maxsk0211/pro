-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2023 at 01:28 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_detail`
--

CREATE TABLE `chat_detail` (
  `id_chat_detail` int(10) NOT NULL,
  `id_chat_room` int(10) NOT NULL,
  `id_user` int(5) NOT NULL,
  `chat_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `chat_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat_detail`
--

INSERT INTO `chat_detail` (`id_chat_detail`, `id_chat_room`, `id_user`, `chat_text`, `chat_datetime`) VALUES
(2, 1, 1, '1', '0000-00-00 00:00:00'),
(3, 3, 38, '123123', '2023-01-05 13:58:30'),
(4, 3, 38, 'สวัสดีครับ 1', '2023-01-05 13:58:58'),
(5, 3, 38, 'โหลๆๆๆๆ 2', '2023-01-05 13:59:16'),
(6, 3, 38, 'เทสๆๆๆ 3', '2023-01-05 13:59:23'),
(7, 3, 1, 'เย้ๆๆๆๆ 4', '2023-01-05 14:16:30'),
(8, 3, 38, 'ไปๆๆๆ 5', '2023-01-05 15:25:45'),
(9, 3, 38, 'ดีจ้าาาา 6', '2023-01-05 15:28:16'),
(10, 2, 38, 'ดีครับ', '2023-01-05 15:30:44'),
(11, 3, 1, 'ได้เลยครับ', '2023-01-06 02:23:50'),
(12, 4, 37, 'ดีจ้าาาาา', '2023-01-06 04:46:58'),
(13, 4, 1, 'มีเรื่องออะไรให้ช่วยคะ', '2023-01-06 04:47:04'),
(14, 4, 37, 'กินข้าวไป', '2023-01-06 04:47:14'),
(15, 4, 1, 'ข้าวผัด ไก่กระเทียม ไก่ผัดไข่', '2023-01-06 04:47:30'),
(16, 4, 37, 'หนี วิ เทียว ดีกว่า ', '2023-01-06 04:47:34'),
(17, 4, 1, 'แรงมาก555555', '2023-01-06 04:47:46'),
(18, 4, 37, 'ไปๆๆๆ อย่าฉาวๆๆๆๆ', '2023-01-06 04:48:01'),
(19, 4, 1, 'เต้บอก อยากกินข้าวแล้วววว', '2023-01-06 04:48:09'),
(20, 4, 37, 'แล้ว นิ เดียว วิ นั่งร้องอยู่หลาว', '2023-01-06 04:48:28'),
(21, 4, 1, 'บรั๊ยส์ๆๆๆๆ', '2023-01-06 04:48:57'),
(22, 4, 1, 'บรั๊ยส์ๆๆๆๆ', '2023-01-06 04:49:04'),
(23, 4, 1, '', '2023-01-06 04:49:08'),
(24, 5, 1, 'qdqwdqwe', '2023-01-06 05:32:25'),
(25, 7, 45, 'ดีจ้า แอด', '2023-01-09 22:41:05'),
(26, 7, 1, 'สวัสดีครับ', '2023-01-09 22:41:27'),
(27, 7, 1, 'มีอะไรให้ชข่วยครับ', '2023-01-09 22:41:39'),
(28, 7, 45, 'ไม่มีแล้วจ้าาาา', '2023-01-09 22:41:47'),
(29, 15, 37, '333', '2023-01-15 19:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `chat_room`
--

CREATE TABLE `chat_room` (
  `id_chat_room` int(10) NOT NULL,
  `id_chat_room_type` int(5) NOT NULL,
  `chat_room_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_general` int(5) NOT NULL,
  `char_room_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat_room`
--

INSERT INTO `chat_room` (`id_chat_room`, `id_chat_room_type`, `chat_room_name`, `user_general`, `char_room_status`) VALUES
(3, 6, 'แอดมินช่วยด้วย', 38, 0),
(7, 8, 'แอดช่วยด้วย ปลูกกล่วยไม่ขึ้น', 45, 0),
(18, 5, '123', 29, 1),
(19, 7, '123123123', 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_room_type`
--

CREATE TABLE `chat_room_type` (
  `id_chat_room_type` int(5) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat_room_type`
--

INSERT INTO `chat_room_type` (`id_chat_room_type`, `type_name`) VALUES
(5, 'แพ็คเกจ'),
(6, 'การให้บริการ'),
(7, 'ยา'),
(8, 'ดูแลรักษา');

-- --------------------------------------------------------

--
-- Table structure for table `comment_news`
--

CREATE TABLE `comment_news` (
  `id_com_news` int(10) NOT NULL,
  `id_news` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `comment` text NOT NULL,
  `comment_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment_news`
--

INSERT INTO `comment_news` (`id_com_news`, `id_news`, `id_user`, `comment`, `comment_datetime`) VALUES
(4, 32, 1, '123123123', '2022-12-24 15:54:58'),
(5, 32, 1, '21211111', '2022-12-24 15:55:05'),
(10, 40, 1, '123123123123123123', '2023-01-09 04:19:12'),
(13, 32, 45, 'ดีครับ', '2023-01-09 22:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `comment_webboard`
--

CREATE TABLE `comment_webboard` (
  `id_com_web` int(10) NOT NULL,
  `id_webboard` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `comment` text NOT NULL,
  `comment_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment_webboard`
--

INSERT INTO `comment_webboard` (`id_com_web`, `id_webboard`, `id_user`, `comment`, `comment_datetime`) VALUES
(6, 4, 1, 'สุดยอดเลยครับ', '2022-11-27 00:07:56'),
(8, 4, 31, 'สวัสดีครับ', '2022-11-27 00:41:58'),
(9, 3, 1, 'สุดยอดครับ', '2022-11-27 11:52:10'),
(10, 4, 1, 'หิวข้าว ค๊าบบบบ', '2022-11-28 08:53:18'),
(11, 4, 1, 'เย้ๆๆๆๆ', '2022-11-28 13:32:44'),
(13, 12, 38, 'เย้ๆๆๆๆ', '2022-12-01 16:20:49'),
(14, 12, 38, '123', '2022-12-01 17:26:06'),
(19, 3, 37, 'สุดยอดๆๆๆ', '2022-12-26 16:09:09'),
(21, 12, 1, 'ดีจ้าาาาา', '2022-12-28 01:31:12'),
(26, 13, 1, 'qowefwef', '2023-01-05 02:56:27'),
(29, 22, 1, 'd qwds.kjvdq wdqwblk qwhb qw qwdq wlkq whfqwdq  dbelrdq whb', '2023-01-09 04:33:11'),
(30, 23, 45, 'ดีมากๆ เลย', '2023-01-09 22:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `log_login`
--

CREATE TABLE `log_login` (
  `id_log` int(10) NOT NULL,
  `id_user` int(5) NOT NULL,
  `detatime_log` datetime NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_login`
--

INSERT INTO `log_login` (`id_log`, `id_user`, `detatime_log`, `ip`) VALUES
(1, 1, '2023-01-09 13:51:52', '192.168.1.41'),
(2, 1, '2023-01-09 20:53:07', '192.168.1.41'),
(3, 1, '2023-01-09 20:54:06', '192.168.1.41'),
(4, 1, '2023-01-09 21:24:39', '192.168.1.41'),
(5, 37, '2023-01-09 21:30:15', '192.168.1.41'),
(6, 1, '2023-01-09 21:47:48', '192.168.1.41'),
(7, 37, '2023-01-09 21:50:13', '192.168.1.41'),
(8, 1, '2023-01-09 22:10:26', '::1'),
(9, 45, '2023-01-09 22:32:25', '192.168.1.41'),
(10, 37, '2023-01-09 22:36:58', '192.168.1.41'),
(11, 1, '2023-01-09 22:40:52', '192.168.1.41'),
(12, 1, '2023-01-10 09:18:48', '::1'),
(13, 1, '2023-01-10 09:35:13', '10.10.99.88'),
(14, 37, '2023-01-10 09:43:54', '10.10.99.88'),
(15, 37, '2023-01-10 10:01:27', '10.10.99.88'),
(16, 1, '2023-01-10 10:04:17', '10.10.99.79'),
(17, 1, '2023-01-10 10:32:35', '10.10.99.88'),
(18, 37, '2023-01-11 10:43:54', '::1'),
(19, 1, '2023-01-11 10:44:10', '::1'),
(20, 1, '2023-01-11 12:35:24', '10.10.99.88'),
(21, 1, '2023-01-11 12:42:29', '10.10.99.88'),
(22, 1, '2023-01-12 12:24:06', '::1'),
(23, 1, '2023-01-12 12:33:02', '::1'),
(24, 37, '2023-01-12 15:18:07', '::1'),
(25, 1, '2023-01-13 10:28:53', '10.10.99.121'),
(26, 1, '2023-01-13 10:31:09', '10.10.99.121'),
(27, 1, '2023-01-13 10:32:18', '10.10.99.121'),
(28, 46, '2023-01-13 11:09:08', '10.10.99.121'),
(29, 46, '2023-01-13 11:12:16', '10.10.99.121'),
(30, 1, '2023-01-13 14:03:31', '10.10.99.121'),
(31, 1, '2023-01-14 19:05:05', '::1'),
(32, 1, '2023-01-14 20:08:14', '::1'),
(33, 1, '2023-01-14 20:10:00', '::1'),
(34, 38, '2023-01-14 21:12:59', '::1'),
(35, 1, '2023-01-14 22:24:34', '::1'),
(36, 38, '2023-01-15 00:02:01', '::1'),
(37, 1, '2023-01-15 00:03:38', '::1'),
(38, 1, '2023-01-15 13:04:56', '::1'),
(39, 1, '2023-01-15 17:54:25', '::1'),
(40, 1, '2023-01-15 17:55:55', '192.168.1.34'),
(41, 37, '2023-01-15 18:07:02', '192.168.1.34'),
(42, 37, '2023-01-15 18:13:39', '192.168.1.34'),
(43, 1, '2023-01-15 18:29:16', '192.168.1.34'),
(44, 37, '2023-01-15 19:01:13', '192.168.1.34'),
(45, 1, '2023-01-15 19:45:08', '192.168.1.34'),
(46, 1, '2023-01-15 19:48:12', '192.168.1.34'),
(47, 37, '2023-01-16 18:49:53', '::1'),
(48, 38, '2023-01-16 18:50:25', '::1'),
(49, 1, '2023-01-16 18:51:07', '::1'),
(50, 2, '2023-01-16 18:53:02', '::1'),
(51, 28, '2023-01-16 18:54:13', '::1'),
(52, 29, '2023-01-16 18:56:27', '::1'),
(53, 37, '2023-01-16 19:48:37', '::1'),
(54, 1, '2023-01-16 20:04:41', '::1'),
(55, 1, '2023-01-16 20:19:43', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `news_topic` text NOT NULL,
  `news_topic_detail` text NOT NULL,
  `news_pic` varchar(100) NOT NULL,
  `news_date` date NOT NULL,
  `news_view` int(5) NOT NULL DEFAULT '0',
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `news_topic`, `news_topic_detail`, `news_pic`, `news_date`, `news_view`, `id_user`) VALUES
(32, 'วัยรุ่นต้องอิจฉา! ปู่ชาวจีนวัย 70 มุ่งออกกำลังกายจนได้กล้าม-หุ่นล่ำสุดฟิต', 'ในขณะที่ผู้ใหญ่หลายคนอาจกำลังกังวลว่าจะทำอะไรดีหลังเกษียณ คุณปู่ท่านนี้ค้นพบเป้าหมายใหม่หลังจากชีวิตไม่ต้องทำงานจำเจอีกต่อไป นั่นก็คือเล่นกล้าม!', '232301160703051.jpg', '2023-01-23', 165, 1),
(33, 'พบคุณยาย 5 แผ่นดิน อายุ 106 ปี เดินคล่องแคล่ว เผยชอบกินข้าวกับน้ำพริกผักต้ม', 'ผู้สูงอายุท่านนี้คือ นางหอม  อ่วมด้วง อายุถึง 106  ปี หรือเกิดปี 2455 อยู่บ้านเลขที่ 49 ถนนสมุทรสงครามบางแพร ตำบลอัมพวา อำเภออัมพวา จังหวัดสมุทรสงคราม', '222212041022473.png', '0000-00-00', 6, 1),
(34, 'เคล็ดลับ ประกวดผู้สูงอายุสุขภาพดี เผยกินแจ่วปลาร้าอายุยืน', 'อบจ.ขอนแก่น ร่วมกับสาขาสภาพผู้สูงอายุแห่งประเทศไทยในพระราชูปถัมภ์ฯ  จัดประกวดผู้สูงอายุสุขภาพดี เนื่องในวันผู้สูงอายุประจำปี 2561 เพื่อรณรงค์ให้สังคมตระหนักในคุณค่าพร้อมยกตัวอย่างเชิดชูผู้สูงอายุ', '222212041023071.jpg', '0000-00-00', 4, 1),
(35, 'ไม่มีใครแก่เกินเรียน! เมื่อ “ผู้สูงอายุ” มาเรียนรู้ “เทคโนโลยี” โปรแกรมโฟโต้ช็อป จะเกิดอะไรขึ้น?', 'คำว่า “เทคโนโลยี” กับ “ผู้สูงอายุ” ดูจะเป็นแม่เหล็กสองขั้วที่ถูกผลักออกจากกันเสมอ บางคนอาจจะกลัวสิ่งที่เรียกว่า “เทคโนโลยี” ด้วยซ้ำ จนทำให้ “โอกาส” ที่จะเรียนรู้ เข้าถึงข้อมูลบางอย่าง หรือสื่อสารกับลูกหลานในยุคปัจจุบันเป็นไปได้ยาก', '222212041023301.png', '0000-00-00', 1, 1),
(36, 'ปลัด พม. เปิดงานนวัตกรรมภูมิปัญญาผู้สูงอายุ สร้างงาน สร้างอาชีพ “สังคมดี ด้วยภูมิปัญญา เวลา และความรัก” พร้อมมอบรางวัลคลังปัญญาผู้สูงอายุดีเด่น กทม. ปี 2565', 'เมื่อวันที่ 22 ส.ค. 65 เวลา 14.00 น. นางพัชรี อาระยะกุล ปลัดกระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์ (ปลัด พม.) เป็นประธานในพิธีเปิดงานนวัตกรรมภูมิปัญญาผู้สูงอายุ สร้างงาน สร้างอาชีพ “สังคมดี ด้วยภูมิปัญญา  เวลา และความรัก', '222212041023531.jpg', '0000-00-00', 1, 1),
(37, '“สังคมสูงอายุ” โอกาสผู้ประกอบการ ลงทุนวิจัย นวัตกรรมตอบโจทย์', 'เป็นโอกาสในการสร้างธุรกิจใหม่ๆ เมื่อประเทศไทยก้าวสู่ สังคมผู้สูงอายุ โดยขณะนี้ผู้ประกอบการหลายภาคส่วนได้พัฒนา นวัตกรรมสุขภาพ สินค้าและบริการให้ตอบโจทย์กับความต้องการของผู้สูงอายุ ที่มีความ', '222212041024371.jpg', '0000-00-00', 13, 1),
(38, '\"สปสช.\" ดูแลสูงวัยติดบ้าน-ติดเตียง รับสังคมสูงอายุ', 'เมื่อวันที่ 9 มิ.ย. 2565 ทพ.อรรถพร ลิ้มปัญญาเลิศ รองเลขาธิการสำนักงานหลักประกันสุขภาพแห่งชาติ (สปสช.) พร้อมด้วย พญ.วลัยรัตน์ ไชยฟู รอง ผอ.สปสช.เขต 1 เชียงใหม่ ลงพื้นที่ไปยัง ต.บ้านกาศ อ.แม่สะเรียง จ.แม่ฮ่องสอน เพื่อเยี่ยมชม ', '222212041024581.jpg', '0000-00-00', 4, 1),
(39, 'ชงจัดตั้งระบบบำนาญแห่งชาติ แก้ปัญหาสูงวัยยากจน ไร้เงินออม', 'ข้อมูลการคาดประมาณประชากรจากสำนักงานสภาพัฒนาการเศรษฐกิจและสังคมแห่งชาติ ระบุว่า ประเทศไทยเข้าสู่สังคมผู้สูงอายุโดยสมบูรณ์ (complete aged society) ภายในปี 2565 คือ ประชากรอายุ 60 ปี ', '222212041025214.jpg', '0000-00-00', 3, 1),
(40, 'ครม.เคาะจ่ายเงินช่วยเหลือพิเศษผู้สูงอายุ 100-250 บาท เข้าสิ้นเดือน เม.ย.', 'นางสาวรัชดา ธนาดิเรก รองโฆษกประจำสำนักนายกรัฐมนตรี เปิดเผยหลังการประชุมคณะรัฐมนตรี (ครม.) เมื่อวันที่ 26 เมษายน 2565 ว่า ครม. อนุมัติหลักการจ่ายเงินช่วยเหลือพิเศษแก่ผู้สูงอายุที่ได้รับสิทธิสวัสดิการเบี้ยยังชีพในปีงบประมาณ 2565 เฉลี่ยรายละ 100 - 250 บาท ตามช่วงอายุ', '222212041025451.jpg', '0000-00-00', 78, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id_pa` int(5) NOT NULL,
  `pa_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pa_detail` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pa_pic` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_user` int(5) NOT NULL,
  `pa_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id_pa`, `pa_name`, `pa_detail`, `pa_pic`, `id_user`, `pa_price`) VALUES
(11, 'คลินิกกระตุ้นสมองและความจำ Online', 'กิจกรรมนี้เหมาะสำหรับ... ผู้สูงวัยที่ต้องการฝึกสมอง ทบทวนความจำ กระตุ้นการรู้คิด สร้างมิตรใหม่ในช่วงวัยเดียวกัน ตามให้ทันกับสถานการณ์ของวันเวลาที่เปลี่ยนแปลงไป ได้ใช้เวลาว่างระหว่างวันให้เป็นประโยชน์', '23230116070936timeline_25641020_081651 (1).jpg', 1, 1500),
(12, 'บริการดูแลหลังผ่าตัด กายภาพ 2 ครั้งต่อวัน', 'การเข้ารับกายภาพอย่างถูกต้อง เหมาะสมกับโรค วัย ความพร้อมของร่างกายจะช่วยฟื้นฟูอาการของผู้สูงวัยได้อย่างมาก “การกายภาพบำบัด (Physical Therapy)”', '22221226100931timeline_25641020_081651 (1).jpg', 1, 87500),
(13, 'โรงพยาบาลพักฟื้นหลังป่วยโควิด', 'เปิดให้บริการ 07:00-18:00 น. เบอร์โทร : 02-056-1684-5 เบอร์มือถือ : 084-2642646', '22221226101101พักฟื้นหลังติดโควิด_19_2_01.webp', 1, 97500),
(15, 'กายภาพบำบัดด้านการทรงตัว และการฟื้นฟูกล้ามเนื้อ', 'ศูนย์กายภาพบำบัดด้านการทรงตัวและการฟื้นฟูกล้ามเนื้อ เช่น เคสพาร์กินสัน สมองเสื่อม น้ำคั่งในโพรงสมอง อัมพาตอ่อนแรงครึ่งซีก\r\nหลังผ่าตัดเข่า ผ่าตัดกระดูกสันหลัง ราคา 1,000 บาทต่อครั้ง จากราคาปกติ 1200 บาท สิทธิ์ข้าราชการ รัฐวิสาหกิจลด 15%', '22221226101308ศูนย์ฟื้นฟูการเดินและการทรงตัว_01_1.jpg', 1, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id_report` int(5) NOT NULL,
  `report_topic` varchar(100) NOT NULL,
  `report_detail` text NOT NULL,
  `id_user` int(5) NOT NULL,
  `view_report` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id_report`, `report_topic`, `report_detail`, `id_user`, `view_report`) VALUES
(7, 'แบบประเมินกิจกรรมสำหรับ Happy Care Nursing Home - บ้านมีสูข', 'ทดสอบเพื่อนำมาปรับปรุง', 1, 271);

-- --------------------------------------------------------

--
-- Table structure for table `report_detail`
--

CREATE TABLE `report_detail` (
  `id_report_detail` int(5) NOT NULL,
  `id_report` int(5) NOT NULL,
  `detail_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `report_score` int(3) NOT NULL,
  `report_note` varchar(255) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report_detail`
--

INSERT INTO `report_detail` (`id_report_detail`, `id_report`, `detail_name`, `report_score`, `report_note`, `id_user`) VALUES
(4, 7, 'การใส่สีพื้นหลัง', 5, '-', 1),
(7, 7, 'ความสะอาด', 5, '-', 1),
(8, 7, 'ความเอาใจใส่ขแง เจ้าหน้าที่', 5, '', 1),
(9, 7, 'พิธีกร', 3, '', 1),
(10, 7, 'การแสดง', 5, '', 1),
(11, 7, 'กิจกรรม', 5, '', 1),
(17, 7, 'การต้อนรับกับพนักงาน', 7, '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `score_report`
--

CREATE TABLE `score_report` (
  `id_score_report` int(5) NOT NULL,
  `id_report` int(5) NOT NULL,
  `id_report_detail` int(5) NOT NULL,
  `use_score_report` int(5) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score_report`
--

INSERT INTO `score_report` (`id_score_report`, `id_report`, `id_report_detail`, `use_score_report`, `id_user`) VALUES
(122, 7, 4, 5, 45),
(123, 7, 7, 5, 45),
(124, 7, 8, 5, 45),
(125, 7, 9, 3, 45),
(126, 7, 10, 5, 45),
(127, 7, 11, 5, 45),
(128, 7, 17, 7, 45),
(129, 7, 4, 4, 37),
(130, 7, 7, 4, 37),
(131, 7, 8, 3, 37),
(132, 7, 9, 0, 37),
(133, 7, 10, 4, 37),
(134, 7, 11, 3, 37),
(135, 7, 17, 2, 37),
(136, 7, 4, 1, 38),
(137, 7, 7, 1, 38),
(138, 7, 8, 3, 38),
(139, 7, 9, 2, 38),
(140, 7, 10, 2, 38),
(141, 7, 11, 3, 38),
(142, 7, 17, 4, 38),
(143, 7, 4, 5, 2),
(144, 7, 7, 5, 2),
(145, 7, 8, 1, 2),
(146, 7, 9, 2, 2),
(147, 7, 10, 3, 2),
(148, 7, 11, 2, 2),
(149, 7, 17, 4, 2),
(150, 7, 4, 5, 28),
(151, 7, 7, 3, 28),
(152, 7, 8, 3, 28),
(153, 7, 9, 1, 28),
(154, 7, 10, 3, 28),
(155, 7, 11, 3, 28),
(156, 7, 17, 1, 28),
(157, 7, 4, 5, 29),
(158, 7, 7, 4, 29),
(159, 7, 8, 4, 29),
(160, 7, 9, 2, 29),
(161, 7, 10, 3, 29),
(162, 7, 11, 4, 29),
(163, 7, 17, 0, 29);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL COMMENT 'รหัส',
  `usernames` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `passwords` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รหัสผ่าน',
  `fname` varchar(100) NOT NULL COMMENT 'ชื่อ',
  `lname` varchar(100) NOT NULL COMMENT 'นามสกุล',
  `tel` text NOT NULL,
  `address` text NOT NULL COMMENT 'ที่อยู่',
  `pic` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'pic_default.jpg' COMMENT 'รูป',
  `birthday` date NOT NULL,
  `user_level` int(1) NOT NULL DEFAULT '0' COMMENT 'ระดับผู้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `usernames`, `passwords`, `fname`, `lname`, `tel`, `address`, `pic`, `birthday`, `user_level`) VALUES
(1, 'admin', '1234', 'สนธยา', 'แข็งแรง', '123', '1212', '222212300859002.jpg', '2022-12-12', 1),
(2, 'user3', '1234', 'user', '3', '0808930617', 'กระบี่', '232301160652252.jpg', '2022-12-12', 0),
(28, 'user4', '1234', 'user', '4', '0808930617', '111', '232301160653521.jpg', '2022-12-12', 0),
(29, 'user5', '1234', '11', '1', '0808930617', '1', '232301160655432.jpg', '2022-12-12', 0),
(32, '2', '2', '3', '4', '0808930617', '6', '22221127120645261043896_2141399209347208_980320519900517907_n.jpg', '2022-12-12', 0),
(37, 'user1', '1234', 'สาวเขียว', 'ของจริง', '0808930617', '123444', '232301150712481.jpg', '2022-12-12', 0),
(38, 'user2', '1234', 'นางแดง', 'จริงๆนะ', '0808930617', '12123123123', '../uploads/222212010419551.png', '2022-12-12', 0),
(39, 'sun', 'ma', 'sun', 'ma', '0808930617', '81120', '../uploads/22221214030809', '2022-12-12', 0),
(41, 'snookzonezaa@gmail.com', 'T1', '1', '2', '1', '2', '22221227013639ศูนย์ฟื้นฟูการเดินและการทรงตัว_01_1.jpg', '2016-05-16', 1),
(43, '123@we.we', '1', '123', '123', '123123', '123', '232301050616101.png', '2023-01-05', 0),
(44, 'natnalin.1404@gmail.com', '2002', 'Nutnalin', 'Suksamran', '0980830173', 'krabi', '232301060444011.jpg', '2023-01-06', 1),
(45, 'max.sk0211@gmail.com', '123456789', 'สนธยา', 'แข็งแรง', '0808930617', '107 ม.3 ต.ไสไทย อ.เมือง จ.กระบี่ 81000', '232301091032192.jpg', '1995-11-02', 1),
(46, '', '123', '123', '123', '123', '123', '232301131049182.jpg', '2023-01-03', 0),
(47, '123', '123', '123', '123', '1234', '123', '232301131059272.jpg', '2023-01-12', 0),
(48, '5', '5', '5', '5', '5', '5', '232301131100452.jpg', '2023-01-12', 0),
(49, '6', '6', '6', '6', '6', '6', '232301131106242.jpg', '2023-01-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `webboard`
--

CREATE TABLE `webboard` (
  `id_webboard` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `topic_webboard` varchar(255) NOT NULL,
  `detail_webboard` text NOT NULL,
  `pic_webboard` varchar(100) NOT NULL,
  `webboard_datetime` datetime NOT NULL,
  `view_webboard` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webboard`
--

INSERT INTO `webboard` (`id_webboard`, `id_user`, `topic_webboard`, `detail_webboard`, `pic_webboard`, `webboard_datetime`, `view_webboard`) VALUES
(3, 1, ' อังกฤษบันทึกแรกของคำในภาษาอังกฤษใช้ในค.ศ. 1697 โดยโจรสลัดอังกฤษ William Dampier', 'ต้นกำเนิดไม่แน่ชัดทั้งกิจกรรมทำอาหารและความหมายในตัวเองแต่เชื่อว่ามาจากภาษาแถบทะเลแคริบเบียนซึ่งเป็นภาษายุโรปในรูปbarbacoa แปลว่าหลุมไฟ อธิบายถึงการทำอาหารด้วยการรมควันเนื้อ (มักเป็นแพะ)มีหลักฐานกว้างขวางว่าทั้งสองคำและเทคนิคการทำอาหารกระจายออกจากแคริบเบี้ยนแล้วไปสเปน,โปรตุเกส, ฝรั่งเศส และ อังกฤษบันทึกแรกของคำในภาษาอังกฤษใช้ในค.ศ. 1697 โดยโจรสลัดอังกฤษ William Dampier', '22221226031101banner_คลินิกกิจกรรมบำบัด_01.webp', '2022-11-26 21:59:33', 147),
(4, 1, '1 อังกฤษบันทึกแรกของคำในภาษาอังกฤษใช้ในค.ศ. 1697 โดยโจรสลัดอังกฤษ William Dampier', '2 ต้นกำเนิดไม่แน่ชัดทั้งกิจกรรมทำอาหารและความหมายในตัวเองแต่เชื่อว่ามาจากภาษาแถบทะเลแคริบเบียนซึ่งเป็นภาษายุโรปในรูปbarbacoa แปลว่าหลุมไฟ อธิบายถึงการทำอาหารด้วยการรมควันเนื้อ (มักเป็นแพะ)มีหลักฐานกว้างขวางว่าทั้งสองคำและเทคนิคการทำอาหารกระจายออกจากแคริบเบี้ยนแล้วไปสเปน,โปรตุเกส, ฝรั่งเศส และ อังกฤษบันทึกแรกของคำในภาษาอังกฤษใช้ในค.ศ. 1697 โดยโจรสลัดอังกฤษ William Dampier', '22221127115106Simple Yellow Coming Soon Instagram Post.png', '2022-11-26 22:13:27', 72),
(13, 38, 'ภภภ', 'ถถถ', '222212010421082.jpg', '2022-12-01 16:21:08', 52),
(22, 1, '123', '123', '232301050257242.jpg', '2023-01-05 02:57:24', 36),
(23, 45, 'การปลูกกล้วย', 'การปลูกกล้วยยังไงให้โต', '23230109103617GP9dox3Cp3TdEuqf3ARb.jpg', '2023-01-09 22:36:17', 25);

-- --------------------------------------------------------

--
-- Table structure for table `web_history_count`
--

CREATE TABLE `web_history_count` (
  `id_web_count` int(3) NOT NULL,
  `web_count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_history_count`
--

INSERT INTO `web_history_count` (`id_web_count`, `web_count`) VALUES
(1, 796);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_detail`
--
ALTER TABLE `chat_detail`
  ADD PRIMARY KEY (`id_chat_detail`);

--
-- Indexes for table `chat_room`
--
ALTER TABLE `chat_room`
  ADD PRIMARY KEY (`id_chat_room`);

--
-- Indexes for table `chat_room_type`
--
ALTER TABLE `chat_room_type`
  ADD PRIMARY KEY (`id_chat_room_type`);

--
-- Indexes for table `comment_news`
--
ALTER TABLE `comment_news`
  ADD PRIMARY KEY (`id_com_news`);

--
-- Indexes for table `comment_webboard`
--
ALTER TABLE `comment_webboard`
  ADD PRIMARY KEY (`id_com_web`);

--
-- Indexes for table `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id_pa`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id_report`);

--
-- Indexes for table `report_detail`
--
ALTER TABLE `report_detail`
  ADD PRIMARY KEY (`id_report_detail`);

--
-- Indexes for table `score_report`
--
ALTER TABLE `score_report`
  ADD PRIMARY KEY (`id_score_report`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `webboard`
--
ALTER TABLE `webboard`
  ADD PRIMARY KEY (`id_webboard`);

--
-- Indexes for table `web_history_count`
--
ALTER TABLE `web_history_count`
  ADD PRIMARY KEY (`id_web_count`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_detail`
--
ALTER TABLE `chat_detail`
  MODIFY `id_chat_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `chat_room`
--
ALTER TABLE `chat_room`
  MODIFY `id_chat_room` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `chat_room_type`
--
ALTER TABLE `chat_room_type`
  MODIFY `id_chat_room_type` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment_news`
--
ALTER TABLE `comment_news`
  MODIFY `id_com_news` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comment_webboard`
--
ALTER TABLE `comment_webboard`
  MODIFY `id_com_web` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `log_login`
--
ALTER TABLE `log_login`
  MODIFY `id_log` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id_pa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id_report` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `report_detail`
--
ALTER TABLE `report_detail`
  MODIFY `id_report_detail` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `score_report`
--
ALTER TABLE `score_report`
  MODIFY `id_score_report` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `webboard`
--
ALTER TABLE `webboard`
  MODIFY `id_webboard` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `web_history_count`
--
ALTER TABLE `web_history_count`
  MODIFY `id_web_count` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
