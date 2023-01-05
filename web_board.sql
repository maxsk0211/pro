-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2022 at 09:46 AM
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
-- Table structure for table `e_com`
--

CREATE TABLE `e_com` (
  `id_e_com` int(5) NOT NULL,
  `name_e_com` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อสินค้า',
  `price` int(10) NOT NULL COMMENT 'ราคา',
  `detail` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รายละเอียด',
  `tel` int(20) NOT NULL COMMENT 'เบอร์โทร',
  `pic` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รูป',
  `id_user` int(5) NOT NULL COMMENT 'รหัสผู้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `e_com`
--

INSERT INTO `e_com` (`id_e_com`, `name_e_com`, `price`, `detail`, `tel`, `pic`, `id_user`) VALUES
(1, '1', 2, '3', 4, '../uploads/22221110103059โลโก้ DBT.png', 1),
(2, '12312', 3412, '4124', 123123, '../uploads/22221110103515โลโก้ DBT.png', 1),
(3, '', 0, '', 0, '../uploads/22221112043916', 0),
(4, '', 0, '', 0, '../uploads/22221112043928', 0),
(5, '234234', 23, '234', 233, '22221112010238โลโก้ BC.png', 1),
(6, '123', 123, '123', 123, '22221112010301โลโก้ DBT.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_box`
--

CREATE TABLE `news_box` (
  `id_news` int(11) NOT NULL,
  `news_topic` text NOT NULL,
  `news_topic_detail` text NOT NULL,
  `news_pic` varchar(100) NOT NULL,
  `id_user` int(5) NOT NULL,
  `new_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_box`
--

INSERT INTO `news_box` (`id_news`, `news_topic`, `news_topic_detail`, `news_pic`, `id_user`, `new_status`) VALUES
(14, 'วัยรุ่นต้องอิจฉา! ปู่ชาวจีนวัย 70 มุ่งออกกำลังกายจนได้กล้าม-หุ่นล่ำสุดฟิต', 'ขอเป็นแบบอย่างแก่คนรุ่นใหม่...ปู่ชาวจีนวัย 70 มุ่งเล่นกล้าม-ออกกำลังกายเพื่อสุขภาพที่แข็งแรง จนได้หุ่นล้ำสุดฟิต\r\nในขณะที่ผู้ใหญ่หลายคนอาจกำลังกังวลว่าจะทำอะไรดีหลังเกษียณ คุณปู่ท่านนี้ค้นพบเป้าหมายใหม่หลังจากชีวิตไม่ต้องทำงานจำเจอีกต่อไป นั่นก็คือเล่นกล้าม!\r\nคุณปู่ “เจิ้ง เหว่ยเทา” อายุ 70 ปี เป็นคนเมืองหนานชาง มณฑลเจียงซี ตั้งแต่เกษียณมาคุณปู่ก็มุ่งมั่นเข้าฟิตเนส ยกเวท เล่นกล้าม เพื่อบำรุงสุขภาพให้แข็งแรงอยู่เสมอ จนกระทั่งมีกล้ามเนื้อเป็นมัดๆ แบบที่เรียกได้ว่าวัยรุ่นต้องอิจฉา\r\n', '../uploads/222211130341453.png', 1, 1),
(15, 'พบคุณยาย 5 แผ่นดิน อายุ 106 ปี เดินคล่องแคล่ว เผยชอบกินข้าวกับน้ำพริกผักต้ม', 'พบคุณยาย5แผ่นดินอายุ106ปีเดินบนสะพานไม้แผ่นเดียวข้ามคลองอย่างคล่องแคล่วเผยชอบกินข้าวกับน้ำพริกผักต้ม\r\nผู้สูงอายุท่านนี้คือ นางหอม  อ่วมด้วง อายุถึง 106  ปี หรือเกิดปี 2455 อยู่บ้านเลขที่ 49 ถนนสมุทรสงครามบางแพร ตำบลอัมพวา อำเภออัมพวา จังหวัดสมุทรสงคราม\r\n', '../uploads/222211130342213.png', 1, 1),
(16, 'เคล็ดลับ ประกวดผู้สูงอายุสุขภาพดี เผยกินแจ่วปลาร้าอายุยืน', 'อบจ.ขอนแก่น ร่วมกับสาขาสภาพผู้สูงอายุแห่งประเทศไทยในพระราชูปถัมภ์ฯ  จัดประกวดผู้สูงอายุสุขภาพดี เนื่องในวันผู้สูงอายุประจำปี 2561 เพื่อรณรงค์ให้สังคมตระหนักในคุณค่าพร้อมยกตัวอย่างเชิดชูผู้สูงอายุ', '../uploads/222211130342481.jpg', 1, 1),
(17, 'ไม่มีใครแก่เกินเรียน! เมื่อ “ผู้สูงอายุ” มาเรียนรู้ “เทคโนโลยี” โปรแกรมโฟโต้ช็อป จะเกิดอะไรขึ้น?', 'คำว่า “เทคโนโลยี” กับ “ผู้สูงอายุ” ดูจะเป็นแม่เหล็กสองขั้วที่ถูกผลักออกจากกันเสมอ บางคนอาจจะกลัวสิ่งที่เรียกว่า “เทคโนโลยี” ด้วยซ้ำ จนทำให้ “โอกาส” ที่จะเรียนรู้ เข้าถึงข้อมูลบางอย่าง หรือสื่อสารกับลูกหลานในยุคปัจจุบันเป็นไปได้ยาก', '../uploads/222211130343181.png', 1, 1),
(18, 'ปลัด พม. เปิดงานนวัตกรรมภูมิปัญญาผู้สูงอายุ สร้างงาน สร้างอาชีพ “สังคมดี ด้วยภูมิปัญญา เวลา และความรัก” พร้อมมอบรางวัลคลังปัญญาผู้สูงอายุดีเด่น กทม. ปี 2565', 'เมื่อวันที่ 22 ส.ค. 65 เวลา 14.00 น. นางพัชรี อาระยะกุล ปลัดกระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์ (ปลัด พม.) เป็นประธานในพิธีเปิดงานนวัตกรรมภูมิปัญญาผู้สูงอายุ สร้างงาน สร้างอาชีพ “สังคมดี ด้วยภูมิปัญญา  เวลา และความรัก” ซึ่งจัดระหว่างวันที่ 22 - 23 สิงหาคม 2565 เพื่อสร้างความรู้ ความเข้าใจ ในการนำนวัตกรรมภูมิปัญญาท้องถิ่นมาใช้ในชีวิตประจำวัน และถ่ายทอดภูมิปัญญาผู้สูงอายุเพื่อสร้างงาน อาชีพ และรายได้', '../uploads/222211130343451.jpg', 1, 1),
(19, '“สังคมสูงอายุ” โอกาสผู้ประกอบการ ลงทุนวิจัย นวัตกรรมตอบโจทย์', 'เป็นโอกาสในการสร้างธุรกิจใหม่ๆ เมื่อประเทศไทยก้าวสู่ สังคมผู้สูงอายุ โดยขณะนี้ผู้ประกอบการหลายภาคส่วนได้พัฒนา นวัตกรรมสุขภาพ สินค้าและบริการให้ตอบโจทย์กับความต้องการของผู้สูงอายุ ที่มีความต้องการงานบริการที่มีคุณภาพสูง ซึ่งผู้สูงอายุที่มีกำลังซื้อเป็นกลุ่มที่มีรายได้เฉลี่ยตั้งแต่ 100,000 ถึงมากกว่า 300,000 บาทต่อเดือน คิดเป็นสัดส่วนประมาณ 17.9% ของจำนวนประชากรผู้สูงอายุโดยเฉลี่ย เป็นกลุ่มเป้าหมายที่น่าสนใจ', '../uploads/222211130344121.jpg', 1, 1),
(20, '\"สปสช.\" ดูแลสูงวัยติดบ้าน-ติดเตียง รับสังคมสูงอายุ', 'เมื่อวันที่ 9 มิ.ย. 2565 ทพ.อรรถพร ลิ้มปัญญาเลิศ รองเลขาธิการสำนักงานหลักประกันสุขภาพแห่งชาติ (สปสช.) พร้อมด้วย พญ.วลัยรัตน์ ไชยฟู รอง ผอ.สปสช.เขต 1 เชียงใหม่ ลงพื้นที่ไปยัง ต.บ้านกาศ อ.แม่สะเรียง จ.แม่ฮ่องสอน เพื่อเยี่ยมชม ‘โครงการดูแลผู้สูงอายุโดยการเสริมสร้างความเข้มแข็งและพัฒนาคุณภาพชีวิตผู้สูงอายุตำบลบ้านกาศ’ โดย โรงพยาบาลส่งเสริมสุขภาพตำบล (รพ.สต.) บ้านสบหาร ใช้งบประมาณจากกองทุนหลักประกันสุขภาพท้องถิ่น (กปท.) ช่วยดูแลผู้สูงอายุที่มีภาวะติดบ้านและติดเตียง', '../uploads/222211130344384.jpg', 1, 1);

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
(4, 6, 'การใส่สีพื้นหลัง', 5, '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `repost`
--

CREATE TABLE `repost` (
  `id_report` int(5) NOT NULL,
  `report_topic` varchar(100) NOT NULL,
  `report_detail` text NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repost`
--

INSERT INTO `repost` (`id_report`, `report_topic`, `report_detail`, `id_user`) VALUES
(3, '', '2', 1),
(4, '1', '2', 1),
(5, '123123', '1 231 21 eg e 3rg 1 21g3ge g231  2 gr3r r 1erg12 21  g1 erg e g1gf', 1),
(6, 'ด้านการพัฒนาเว็บไซต์', 'ไม่มีหมายเหตุ', 1);

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
  `age` int(3) NOT NULL COMMENT 'อายุ',
  `address` text NOT NULL COMMENT 'ที่อยู่',
  `pic` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'pic_default.jpg' COMMENT 'รูป',
  `user_level` int(1) NOT NULL DEFAULT '0' COMMENT 'ระดับผู้ใช้งาน',
  `user_status` int(1) NOT NULL DEFAULT '1' COMMENT 'สถานะผู้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `usernames`, `passwords`, `fname`, `lname`, `age`, `address`, `pic`, `user_level`, `user_status`) VALUES
(1, 'admin', '1234', 'สนธยา', 'แข็งแรง', 11, '11', 'pic_default.jpg', 1, 1),
(2, '1', '1', '2', '3', 1, '1', 'pic_default.jpg1', 0, 1),
(28, 'adminqw1', '123411', '1', '11', 11111, '111', '../uploads/22221112111433โลโก้ BC.png', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `e_com`
--
ALTER TABLE `e_com`
  ADD PRIMARY KEY (`id_e_com`);

--
-- Indexes for table `news_box`
--
ALTER TABLE `news_box`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `report_detail`
--
ALTER TABLE `report_detail`
  ADD PRIMARY KEY (`id_report_detail`);

--
-- Indexes for table `repost`
--
ALTER TABLE `repost`
  ADD PRIMARY KEY (`id_report`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `e_com`
--
ALTER TABLE `e_com`
  MODIFY `id_e_com` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_box`
--
ALTER TABLE `news_box`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `report_detail`
--
ALTER TABLE `report_detail`
  MODIFY `id_report_detail` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `repost`
--
ALTER TABLE `repost`
  MODIFY `id_report` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
