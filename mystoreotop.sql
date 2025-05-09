-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 11:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystoreotop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_ip`) VALUES
(1, 'admin', 'parinton@gmail.com', '$2y$10$O59Gc/XmSPcuYzxaQRkHJ.HQfi2BdCr0aNUIF3EqUcNI9TeAjxkfO', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Food'),
(2, 'Drink'),
(3, 'Costume'),
(4, 'Decoration'),
(5, 'Herb');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `district_id` int(11) NOT NULL,
  `district_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `district_title`) VALUES
(1, 'Mueang Chon Buri'),
(2, 'Ban Bueng'),
(3, 'Nong Yai'),
(4, 'Bang Lamung'),
(5, 'Phan Thong'),
(6, 'Phanat Nikhom'),
(7, 'Sriracha'),
(8, 'Koh Si Chang'),
(9, 'Sattahip'),
(10, 'Bo Thong'),
(11, 'Koh Chan');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `district_id`, `product_image1`, `product_image2`, `product_price`, `date`, `status`) VALUES
(1, 'ไอศกรีมทุเรียน', 'ไอศกรีมรสทุเรียนที่เหมือนได้รับประทานทุเรียนจริงๆ ความหวาน มัน หอม จากการใช้ทุเรียนเกรดเยี่ยม แปรรูปเป็นไอศกรีมทุเรียนรสเลิศ ช่วยดับร้อนด้วยความอร่อยที่ใครได้รับประทานก็ติดใจ', 'ทุเรียน,ไอศกรีม,ไอศกรีมทุเรียน', 1, 1, 'ไอศกรีมทุเรียน1.jpg', 'ไอศกรีมทุเรียน2.jpg', '40', '2023-04-02 08:41:48', 'true'),
(2, 'หมูแผ่น', 'คัดสรรเนื้อหมูคุณภาพดีมาปรุงแต่ง อบกรอบด้วยสูตรพิเศษ รับประทานเล่นก็ได้ หรือจะรับประทานพร้อมข้าวสวยร้อนๆ ยิ่งเข้าที', 'หมูแผ่น,หมู', 1, 2, 'หมูแผ่น1.jpg', 'หมูแผ่น2.jpg', '90', '2023-03-31 05:32:42', 'true'),
(3, 'น้ำมัลเบอร์รี่', 'เครื่องดื่มที่ผสานคุณประโยชน์ที่ดีต่อร่างกาย รสชาติหวานอมเปรี้ยว ดับกระหายได้ดี สามารถดื่มได้บ่อยครั้ง เป็นอีกทางเลือกของน้ำผลไม้ที่เหมาะสมแก่ผู้บริโภคที่รักในการดูแลสุขภาพ', 'น้ำมัลเบอร์รี่,นํ้าผลไม้,สุขภาพ', 2, 11, 'น้ำมัลเบอร์รี่1.jpg', 'น้ำมัลเบอร์รี่2.jpg', '35', '2023-03-31 05:32:46', 'true'),
(4, 'น้ำฟักข้าว', 'น้ำฟักข้าวที่อุดมไปด้วยคุณประโยชน์ที่ดีต่อสุขภาพ ถือเป็นอีกเครื่องดื่มสมุนไพรที่ช่วยดับกระหายได้ดี แช่เย็นๆ ดื่มได้อย่างชื่นใจ เหมาะแก่ผู้บริโภคที่รักในการดูแลตนเอง', 'น้ำฟักข้าว,สุขภาพ,ฟักข้าว,สมุนไพร,เครื่องดื่มสมุนไพร', 2, 11, 'น้ำฟักข้าว1.jpg', 'น้ำฟักข้าว2.jpg', '35', '2023-03-31 05:32:50', 'true'),
(5, 'กระเป๋าถือ', 'จักสานงานไม้ไผ่สู่กระเป๋าถือคุณภาพ ที่มีความคงทน มีเอกลักษณ์ไม่ซ้ำฝีมือใคร ใช้งานได้หลากหลายโอกาส ใช้งานได้อย่างคุ้มค่า ', 'กระเป๋าถือ,กระเป๋า,จักสาน', 3, 6, 'กระเป๋าถือ1.jpg', 'กระเป๋าถือ2.jpg', '9500', '2023-03-31 05:32:56', 'true'),
(6, 'กระเป๋าถัก', 'ผลิตภัณฑ์ที่เกิดจากการผสานความตั้งใจด้วยใจรัก สร้างสรรค์ผลงานหัตถกรรมโครเชต์หลากหลายรูปแบบทั้งหมวกและกระเป๋ารูปทรงต่างๆ หลากหลายสีสันที่สามารถใช้งานได้อย่างทนทาน เหมาะกับทุกไลฟ์สไตล์ของชีวิต', 'หัตถกรรม,กระเป๋าถัก,กระเป๋า', 3, 4, 'กระเป๋าถัก1.jpg', 'กระเป๋าถัก2.jpg', '400', '2023-03-31 05:33:00', 'true'),
(7, 'เรือพระเจ้าตาก', 'เรือพระเจ้าตาก สัญลักษณ์แห่งชัยชนะและความรุ่งเรือง งานฝีมือบรรจงที่แสนประณีตจากผู้เชี่ยวชาญ มีมูลค่าสูง เหมาะแก่การนำไปตั้งโชว์เพื่อแสดงถึงความเจริญรุ่งเรือง ความมั่งคั่ง และความเป็นมรดกแห่งไทย', 'เรือพระเจ้าตาก,เรือ,งานฝีมือ', 4, 2, 'เรือพระเจ้าตาก1.jpg', 'เรือพระเจ้าตาก2.jpg', '36000', '2023-03-31 14:00:47', 'true'),
(8, 'พวงมาลัยมะลิทิชชู', 'พวงมาลัยมะลิทิชชู ความสวยงามเสมือนจริง ดั่งใช้ดอกไม้จากธรรมชาติสดๆ อายุการใช้งานที่ยาวนาน ใช้ได้กับงานมงคลที่หลากหลาย ฝีมือที่ประณีตในทุกชิ้น เป็นงานแฮนด์เมดที่มีมูลค่า ควรค่าต่อการซื้อหา', 'งานแฮนด์เมด,พวงมาลัยมะลิทิชชู,พวงมาลัย', 4, 1, 'พวงมาลัยมะลิทิชชู1.jpg', 'พวงมาลัยมะลิทิชชู2.jpg', '1800', '2023-03-31 05:33:09', 'true'),
(9, 'ยาหม่องเขียว', 'อีกหนึ่งยาทาแก้อาการปวดเมื่อยที่ทุกบ้านต้องมี ด้วยสรรพคุณจากสมุนไพรไทยหลากชนิด ช่วยเบาเทาอาการปวดเมื่อยต่างๆ ตามร่างกายได้ดี ทั้งยังมีกลิ่นหอมสมุนไพรอ่อนๆ ไม่ฉุน สามารถใช้งานได้นาน', 'ยาหม่อง,ยาหม่องเขียว,ยาทาแก้อาการปวดเมื่อย', 5, 4, 'ยาหม่องเขียว1.jpg', 'ยาหม่องเขียว2.jpg', '80', '2023-03-31 05:33:13', 'true'),
(10, 'ชุดพรรณกร', 'ผลิตภัณฑ์ที่จะช่วยบำรุงมือของคุณให้กลับมาเนียน นุ่ม ไร้รอยเหี่ยวย่น อีกทั้งยังช่วยบำรุงเล็บให้ดูสุขภาพดี เพียงใช้เป็นประจำทุกวัน ', 'ชุดพรรณกร,ช่วยบำรุงมือ,บำรุง', 5, 1, 'ชุดพรรณกร1.jpg', 'ชุดพรรณกร2.jpg', '480', '2023-03-31 05:33:16', 'true'),
(11, 'ท็อฟฟี่เค้กไรซ์เบอร์ ', 'ท็อฟฟี่เค้กที่ไม่ได้ให้แต่ความอร่อย แต่ยังได้สุขภาพที่ดีจากข้าวไรซ์เบอร์รี่ เนื้อเค้กแน่นๆ รสชาติกลมกล่อม กรุ่นกลิ่นความสดใหม่ในทุกชิ้น', 'เค้ก,ท็อฟฟี่เค้ก,ขนมเค้ก', 1, 1, 'ท็อฟฟี่เค้ก1.jpg', 'ท็อฟฟี่เค้ก2.jpg', '55', '2023-03-31 13:37:02', 'true'),
(12, 'คุกกี้ข้าวโอ๊ต  รสเม็ดมะม่วงหิมพานต์', 'ขนมคุกกี้อีกหนึ่งประเภทขนมที่เป็นที่นิยมตลอดกาล เราได้ผลิตและพัฒนาคุกกี้ที่ผสานทั้งความอร่อยและคุณประโยชน์ที่ดีให้แก่ผู้บริโภค โดยการเลือกใช้ข้าวโอ๊ตเป็นส่วนผสมหลัก นำมาปรุงแต่งเพิ่มรสชาติความมันของเม็ดมะม่วงหิมพานต์ เพื่อรสสัมผัสที่พิเศษมากยิ่งขึ้น', 'คุ๊กกี้,คุ๊กกี้ข้าวโอ๊ต,ขนมทานเล่น,ธัญพืช ', 1, 9, 'คุ๊กกี้ข้าวโอ๊ต1.jpg', 'คุ๊กกี้ข้าวโอ๊ต2.jpg', '50', '2023-03-31 13:42:18', 'true'),
(13, 'ผ้าบาติกลายบัวสวรรค์  ', 'ออกแบบสีสันให้เข้ากับยุคสมัย ออกแบบลวดลายที่มีความเข้ากัน เลือกคู่สีที่มีความสอดคล้อง เพื่อให้เป็นผ้าบาติกที่สวยงามมากที่สุด มีเอกลักษณ์ความเป็นงานฝีมือแบบช่างไทย ', 'ผ้าบาติก,บาติก เครื่องแต่งกาย ', 3, 10, 'ผ้าบาติก1.jpg', 'ผ้าบาติก2.jpg', '500', '2023-03-31 13:46:31', 'true'),
(14, 'แคทรียาขนาดกลาง', 'ดอกไม้ดินไทยที่ให้ความรู้สึกเหมือนดอกไม้จริง การเก็บงานที่ละเอียด สีสันสดใสดั่งดอกไม้จากธรรมชาติ นำไปตกแต่งสถานที่ยิ่งเพิ่มความสวยงามและมีเสน่ห์', 'ดอกไม้,ดอกแคทรียา,แคทรียา ', 4, 9, 'แคทีรยา1.jpg', 'แคทีรยา2.jpg', '12500', '2023-03-31 14:01:17', 'true'),
(15, 'โคมไฟดอกไม้ผ้าใยบัว', 'โคมไฟดอกไม้ผ้าใยบัว โคมไฟประดับในรูปแบบที่สวยงาม ผสานความละเอียดอ่อนของดอกไม้ประดิษฐ์ เมื่อเปิดไฟแล้วจะยิ่งเพิ่มความสวยงาม เหมาะแก่การนำไปไว้ในห้องนอน หรือตามสถานที่ต่างๆ', 'โคมไฟ,โคมไฟดอกไม้ ,โคมไฟดอกไม้ผ้าใยบัว', 4, 6, 'โคมไฟดอกไม้1.jpg', 'โคมไฟดอกไม้2.jpg', '245', '2023-03-31 05:34:10', 'true'),
(16, 'เสื้อลินินท์เพ้นท์', 'สื้อลินินเพ้นท์ด้วยดีไซน์ที่ผสมผสานความเป็นสมัยใหม่ มีความสวยงามโดดเด่นจากสีสันที่สดใส การเลือกคู่สีที่มีความสอดคล้อง มีหลากสไตล์ให้เลือกสรร สวมใส่สบาย ผู้หญิง หรือผู้ชายก็ใส่ได้', 'เสื้อ,เสื้อลินินท์,เสื้อลินินท์เพ้นท์', 3, 7, 'เสื้อลินินเพ้นท์1.jpg', 'เสื้อลินินเพ้นท์2.jpg', '1500', '2023-03-31 14:01:21', 'true'),
(17, 'Body Butter  ', 'Body Butter ผลิตภัณฑ์บำรุงผิวที่ให้กลิ่นหอมอ่อนๆ ช่วยปลอบประโลมผิวอย่างอ่อนโยน คืนความชุ่มชื่นให้แก่ผิวพรรณ ให้กลับมาสุขภาพดีอีกครั้งอย่างเป็นธรรมชาติ', 'ออยบัตเตอร์,บำรุงผิว,body butter', 5, 1, 'ออยบัตเตอร์1.jpg', 'ออยบัตเตอร์2.jpg', '140', '2023-03-31 05:34:13', 'true'),
(18, 'สบู่เปลือกมังคุด', 'ผลิตภัณฑ์ทำความสะอาดผิวจากเปลือกมังคุด ที่ผสานคุณประโยชน์ไว้มากมาย ช่วยให้ผิวของคุณเนียนนุ่ม กระจ่างใสอย่างเป็นธรรมมชาติเมื่อใช้เป็นประจำอย่างต่อเนื่อง ทั้งยังมอบการทำความสะอาดอย่างล้ำลึกให้ผิวของคุณสะอาดหมดจดในทุกครั้งที่ใช้', 'สบู่,สบู่เปลือกมังคุด,ทำความสะอาด', 5, 7, 'สบู่มังคุด1.jpg', 'สบู่มังคุด2.jpg', '60', '2023-03-31 05:35:07', 'true'),
(19, 'ผ้าทอลายขัด  คุณย่าท่าน', 'ผ้าทอมือ “คุณย่าท่าน” อันล้ำค่า มีประวัติครั้งสำคัญตั้งแต่สมัยรัชกาลที่ 5 เป็นแรงบันดาลใจให้แก่ชาวตำบลบ้านปึกสืบมา', 'ผ้าทอ,ผ้าทอมือ,ผ้าทอลายขัด,คุณย่าท่าน', 3, 1, 'ผ้าทอลายขัด1.jpg', 'ผ้าทอลายขัด2.jpg', '1800', '2023-03-31 14:01:24', 'true'),
(20, 'เสื้อมัดย้อมสีและคราม  สีชังมัดย้อม', 'เสื้อมัดย้อมสีและครามจากอำเภอเกาะสีชัง มุ่งเน้นความสวยงามแบบมีเอกลักษณ์ เน้นความสดใสของสีสันที่ทำให้เสื้อมัดย้อมมีเสน่ห์ สวมใส่สบาย ระบายความร้อนได้ดี มีหลากหลายสีสันให้เลือกตามความชอบ ', 'เสื้อมัดย้อม,ผ้ามัดย้อม,สีมัดย้อม,เสื้อมัดย้อมสี', 0, 8, 'สีชังมัดย้อม1.jpg', 'สีชังมัดย้อม2.jpg', '120', '2023-03-31 13:53:36', 'true'),
(21, 'น้ำพริกเผาปลาเค็ม  ป้าบัติ', 'เนื้อปลาเค็มคุณภาพคลุกเคล้ากับเครื่องเทศไทยๆ รสชาติอร่อยอย่างโดดเด่นความเป็นเอกลักษณ์ของอาหารพื้นบ้าน รสจัดจ้านปรุงอาหารมื้อไหนก็อร่อยทุกมื้อ ', 'น้ำพริก,น้ำพริกเผา,น้ำพริกเผาปลาเค็ม,ป้าบัติ', 1, 7, 'น้ำพริกเผาปลาเค็ม1.jpg', 'น้ำพริกเผาปลาเค็ม2.jpg', '50', '2023-03-31 13:55:05', 'true'),
(22, 'ทองม้วนงาดำ (รสเค็ม)  มณีจันทร์  ', 'ทองม้วนงาดำของมณีจันทร์นั้นให้มากกว่าความกรอบอร่อย เพราะยังกรุ่นความหอมจากงาดำ อีกทั้งงาดำนั้นยังมีคุณค่าทางโภชนาการ เป็นขนมที่ไม่ได้ให้แค่ความอร่อย แต่ยังให้คุณประโยชน์อีกด้วย', 'ทองม้วน,ทองม้วนงาดำ,รสเค็ม,มณีจันทร์', 1, 11, 'ทองม้วนงาดำ1.jpg', 'ทองม้วนงาดำ2.jpg', '50', '2023-03-31 13:55:57', 'true'),
(23, 'แจกันไม้ไผ่สานหุ้มภาชนะ', ' แจกันไม้ไผ่สานหุ้มภาชนะ มีความทนทาน ด้วยรูปแบบงานสานมือที่มีความสวยงามเป็นเอกลักษณ์ ประดับตกแต่งตามสถานที่ต่างๆ ให้สวยงามมากยิ่งขึ้น', 'แจกัน,แจกันไม้,แจกันไม้ไผ่,ไม้ไผ่,ไผ่สาน,หุ้มภาชนะ', 4, 6, 'แจกันไม้ไผ่สานหุ้มภาชนะ1.jpg', 'แจกันไม้ไผ่สานหุ้มภาชนะ2.jpg', '4800', '2023-03-31 14:01:29', 'true'),
(24, 'ดอกกุหลาบ  บ้านน้ำอ้อยร้านงานฝีมือ', 'ดอกกุหลาบถัก งานฝีมือที่มีความละเอียดประณีตเสมือนจริง สีสดสวย เหมาะแก่การนำไปเป็นของฝากให้แก่คนพิเศษ หรือจะนำไปใส่แจกันประดับตกแต่งห้องสวยๆ', 'ดอกไม้,ดอกกุหลาบ,กุหลาบ,งานฝีมือ', 4, 2, 'ดอกกุหลาบ1.jpg', 'ดอกกุหลาบ2.jpg', '400', '2023-03-31 13:57:17', 'true'),
(25, 'ยาสีฟันสมุนไพรเกลือผสมข่อยสูตรโบราณ นภาไวท์', 'ยาสีฟันสมุนไพรสูตรโบราณสจากเกลือผสมข่อย ที่ผสานคุณประโยชน์จากสมุนไพรช่วยดูแลเหงือกของคุณให้แข็งแรง ช่วยให้ฟันขาว ลดการเกิดกลิ่นปากและลดการเกิดแบคทีเรียในช่องปาก เพื่อลมหายใจหอมสดชื่น มั่นใจได้ในทุกครั้งที่ใช้', 'ยาสีฟัน,ฟัน,สมุนไพร,ยาสีฟันสูตรโบราณ,สมุนไพรเกลือ,นภาไวท์', 5, 7, 'ยาสีฟันสมุนไพรเกลือผสมข่อยสูตรโบราณ2.jpg', 'ยาสีฟันสมุนไพรเกลือผสมข่อยสูตรโบราณ1.jpg', '100', '2023-03-31 13:57:31', 'true'),
(26, 'หมักผมดอกอัญชัน  ชวน ', 'ผลิตภัณฑ์หมักผมจากสารสกัดดอกอัญชัน สมุนไพรไทยที่มีคุณสมบัติในการดูแลเส้นผมได้อย่างดีเยี่ยม ช่วยให้ผมดกดำเป็นเงางาม ผมมีน้ำหนัก ไม่พันกัน เมื่อใช้เป็นประจำอย่างต่อเนื่องผมของคุณจะกลับมามีสุขภาพดีอีกครั้ง', 'หมักผม,หมัก,ผม,ดอกอัญชัน,อัญชัน', 5, 6, 'หมักผมดอกอัญชัน1.jpg', 'หมักผมดอกอัญชัน2.jpg', '50', '2023-03-31 13:57:56', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
