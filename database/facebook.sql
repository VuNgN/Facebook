-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2022 at 09:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Email`, `Pass`) VALUES
(1, 'admin2@gmail.com', '$2y$10$qivMIS7S2C/XqKDwlE13oeguHW939JZrCA6Q3ZS6A3iP.WAUr5Wbu');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `CommentID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CommentContent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`CommentID`, `PostID`, `UserID`, `CommentContent`) VALUES
(71, 2, 2, 'helo'),
(72, 10, 2, 'ok đã thấy rồi'),
(73, 3, 2, 'alo alo'),
(74, 7, 2, 'Xin Chào tôi là Chiến'),
(75, 9, 2, 'Xin Chào! Tôi là Chiến'),
(79, 13, 19, 'hello'),
(80, 13, 19, 'tôi đây '),
(82, 9, 19, 'alo 321'),
(86, 14, 19, '1234'),
(90, 15, 19, 'Heloooooo'),
(92, 14, 19, 'heloo123'),
(94, 17, 19, '1234545'),
(95, 17, 19, 'helo1'),
(96, 17, 19, 'helo1'),
(99, 17, 19, '123'),
(100, 17, 19, '123'),
(101, 17, 19, '1'),
(102, 17, 19, '123'),
(103, 17, 19, '1'),
(104, 17, 19, '15'),
(105, 17, 19, '12'),
(106, 17, 19, '12'),
(107, 17, 19, '1'),
(108, 17, 19, '1'),
(109, 17, 19, '1'),
(110, 17, 19, '1'),
(111, 17, 19, '1'),
(112, 17, 19, '1'),
(113, 17, 19, '1'),
(114, 17, 19, '1'),
(115, 17, 19, '1'),
(116, 17, 19, '1'),
(117, 17, 19, '1'),
(118, 17, 19, '2'),
(120, 10, 19, '1'),
(121, 26, 19, 'hello'),
(122, 27, 19, '123'),
(123, 14, 19, 'abc'),
(124, 14, 19, '1'),
(125, 14, 19, '123'),
(126, 3, 19, 'a'),
(127, 3, 19, 'u'),
(128, 41, 20, 'Siêu quasaa'),
(129, 32, 20, 'Vui thật');

-- --------------------------------------------------------

--
-- Table structure for table `friend_ship`
--

CREATE TABLE `friend_ship` (
  `User1ID` int(11) NOT NULL,
  `User2ID` int(11) NOT NULL,
  `Active` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friend_ship`
--

INSERT INTO `friend_ship` (`User1ID`, `User2ID`, `Active`) VALUES
(1, 2, 0),
(1, 3, 0),
(4, 1, 0),
(1, 7, 0),
(5, 1, 0),
(6, 1, 0),
(3, 2, 0),
(4, 2, 0),
(4, 3, 0),
(8, 1, 0),
(5, 2, 1),
(6, 2, 1),
(2, 7, 0),
(19, 2, 1),
(19, 3, 1),
(19, 4, 1),
(19, 6, 1),
(7, 19, 1),
(8, 19, 1),
(9, 19, 0),
(10, 19, 0),
(11, 19, 1),
(19, 1, 0),
(19, 20, 1),
(20, 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ImageID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ImageID`, `PostID`, `images`) VALUES
(2, 2, 'assets/images/content-img.jpeg'),
(3, 3, 'assets/images/get_away_from_my_computer-wallpaper-2560x1440.jpg'),
(6, 2, ''),
(7, 17, 'assets/uploads/méo.jpg'),
(11, 35, 'assets/uploads/789E503C-4F6C-4DA2-B8D3-752033A3C3E0.jpeg'),
(17, 41, 'assets/uploads/Untitled.png');

-- --------------------------------------------------------

--
-- Table structure for table `like_action`
--

CREATE TABLE `like_action` (
  `PostID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `like_action`
--

INSERT INTO `like_action` (`PostID`, `UserID`) VALUES
(9, 19),
(10, 19),
(14, 19),
(41, 19),
(31, 20),
(32, 20),
(41, 20),
(48, 20),
(50, 20);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PostID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PostTime` datetime NOT NULL,
  `PostCaption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Reported` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PostID`, `UserID`, `PostTime`, `PostCaption`, `Reported`) VALUES
(2, 1, '2021-12-22 17:36:12', 'Hello world 2', 1),
(3, 2, '2021-12-22 21:57:00', 'Đây là bài viết của Chiến', 0),
(6, 5, '2021-12-22 22:31:51', 'Đây là bài viết của user 5', 0),
(7, 6, '2021-12-22 22:31:51', 'Đây là bài viết của user 6', 0),
(9, 7, '2021-12-22 22:31:51', 'Đây là bài viết của user 7-2', 0),
(10, 3, '2021-12-26 17:37:09', 'test ava user xem được hay chưa', 0),
(11, 19, '2021-12-28 09:23:24', 'Xin chào tôi là Tuấn', 0),
(12, 19, '2021-12-28 04:23:03', 'Tôi là Tuấn Test đăng bài ở trang newsfeed', 0),
(13, 5, '2021-12-29 18:16:17', 'Đây là bài viết để thử thời gian', 0),
(14, 2, '2021-12-29 04:32:53', 'đây là bài đăng\r\n', 0),
(15, 19, '2021-12-30 03:14:26', 'tôi là Tuấn', 0),
(16, 19, '2021-12-30 03:16:15', 'heloo', 0),
(17, 19, '2021-12-31 05:40:27', 'đây là méo', 0),
(18, 19, '2022-01-13 08:55:39', 'méo', 0),
(20, 19, '2022-01-13 09:02:40', 'ssfsdf', 0),
(21, 19, '2022-01-13 09:04:33', 'sdfdf', 0),
(23, 19, '2022-01-13 09:06:36', 'dff', 0),
(24, 19, '2022-01-13 09:07:20', 'sfff', 0),
(25, 19, '2022-01-13 09:09:29', 'â', 0),
(26, 19, '2022-01-13 09:09:55', 'a', 0),
(27, 19, '2022-01-13 09:12:04', 'aa', 0),
(31, 19, '2022-01-13 09:29:13', '123', 0),
(32, 19, '2022-01-13 09:30:36', 'tuấn', 0),
(35, 19, '2022-01-14 08:31:44', 'thử ảnh', 1),
(41, 19, '2022-01-14 08:58:54', 'Tuấn', 0),
(42, 19, '2022-01-14 05:52:07', 'đỉnh của chóp\r\n', 0),
(44, 20, '2022-01-15 05:06:18', 'Hế lố é ví bó đí chúng mình là nhóm 1 nè blefff', 0),
(45, 20, '2022-01-15 05:07:00', 'Đời người, có đôi lúc, cảm thấy quyết định lúc này đúng cũng chưa chắc gì sẽ đúng ở tương lai, hoặc lại cảm thấy quyết định hiện tại không đúng, chưa chắc cũng sẽ không đúng trong tương lai. Cho nên, đừng suy nghĩ nhiều như thế, hãy cứ sống lạc quan vui vẻ, và luôn mỉm cười! Ai nói tương lai sau này không có chuyện tốt đang chờ bạn chứ.', 0),
(46, 20, '2022-01-15 05:07:41', 'Nhân sinh vô thường, thế sự khó đoán! Người bạn thân thiết nhất của bạn hôm nay còn khỏe mạnh nhưng rất có thể ngày mai đã rời bỏ bạn đi xa, người yêu mà hôm nay bạn còn đặt biết bao kì vọng nhưng rất có thể ngày mai sẽ phản bội bạn. Còn con người vốn mềm yếu và nhỏ bé! Chẳng thể giữ lại được cái gì, cũng chẳng thể giữ lại được trái tim đã thay đổi, và càng không thể đổi thay được sự thật rằng ai đó đã ra đi. Nhân định thắng thiên, câu nói này thật nực cười biết mấy!\r\nBị độc thân – Nguyễn Ngọc Vũ', 0),
(47, 20, '2022-01-15 05:07:59', 'Tuổi càng lớn càng biết che dấu chính mình, học được cách nghĩ một đằng, nói một nẻo, học được cách không ép bản thân làm những chuyện mình không thích, tâm niệm rằng cứ để mọi chuyện thuận theo tự nhiên, đôi khi còn tự khen bản thân mình quá giỏi nữa chứ, sau này khi gặp một người nào đó tính tình cố chấp thì lại cho rằng họ không bình thường, cũng quên mất bản thân cũng từng có tuổi trẻ bồng bột.\r\nEm là học trò anh thì sao – Điền Phản', 0),
(48, 20, '2022-01-15 05:09:43', '    4 cái cần có để cuộc sống ý nghĩa hơn: Có sự nhiệp, có bạn tri kỷ, có người bạn trăm năm với tình yêu đích thực, cuối cùng là một mái ấm gia đình.\r\n    Cuộc sống vốn ngắn ngủi, vì vậy hãy dành sự yêu thương cho những người xứng đáng.\r\n    Cười nhiều lên một chút, với bạn bè, người thân, với những người mỉm cười với ta, và cả những người ta tình cờ gặp mặt, dù chẳng thân nhiều.\r\n    Để cuộc sống tươi đẹp hơn, hãy dậy thật sớm mỗi ngày. Để tận hưởng ánh nắng chan hòa của buổi sáng mai.\r\n    Hãy rộng lòng thêm một chút, mạnh dạn bày tỏ tình cảm với mọi người. Và đón nhận những tính cảm họ dành cho ta. Để biết “cảm giác bình thường tuyệt vời” của tình yêu thương, để sống chan hòa và cởi mở.\r\n    Hãy trao cho người khác những câu nói chân thành nhất. Hãy cho người đó biết đấy là cái quý giá nhất mà bạn có.\r\n    Lúc nào tôi cũng bay theo hướng bay của người khác. Lần này tôi sẽ bay theo con đường mà tôi đã lựa chọn.\r\n    Tôi tự nhủ với bản thân mình rằng, cần phải sống chân thực. Bất kể người khác nhìn mình bằng con mắt nào đi chăng nữa, dù cả thế giới phủ định, tôi vẫn có bản thân tin tưởng mình.\r\n    Trong cuộc sống đừng chờ đợi sự may mắn, mà hãy thực hiện và cũng đừng sợ sự thất bại, nếu bạn sợ, bạn sẽ chẳng làm được việc gì nên hồn đâu.', 0),
(50, 20, '2022-01-15 05:25:51', 'ab', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `UserID` int(11) NOT NULL,
  `UserEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserPass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserGender` bit(1) NOT NULL,
  `UserFirstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserLastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserBirth` date NOT NULL,
  `UserAddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserAva` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'assets\\images\\default_ava.png',
  `Reported` int(11) DEFAULT 0,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VerifyLink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Active` int(11) NOT NULL DEFAULT 0,
  `VerifyDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `LockTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`UserID`, `UserEmail`, `UserPass`, `UserGender`, `UserFirstName`, `UserLastName`, `UserBirth`, `UserAddress`, `UserAva`, `Reported`, `Description`, `VerifyLink`, `Active`, `VerifyDate`, `LockTime`) VALUES
(1, 'tuan@gmail.com', '123', b'0', 'Nguyễn Minh', 'Tuấn', '2001-01-12', 'Hoàn Kiếm, Hà Nội', 'assets/images/content-img.jpeg', 3, NULL, '', 1, '2021-12-29 13:15:21', NULL),
(2, 'minh@gmail.com', '012', b'0', 'Trần Minh', 'Chiến', '2002-01-10', 'Quần Hoàng Mai, TP.Hà Nội', 'assets\\images\\get_away_from_my_computer-wallpaper-2560x1440.jpg', 2, NULL, '', 1, '2021-12-26 10:38:47', NULL),
(3, 'mglanton0@wiley.com', '7MEpB4pl', b'1', 'Marcia', 'Glanton', '1997-09-29', '4843 Farmco Alley', 'assets\\images\\i_belive_i_can_fly-wallpaper-2560x1440.jpg', 6, NULL, '', 0, '2021-12-26 10:30:40', '2021-12-01 00:00:00'),
(4, 'aguidi1@clickbank.net', '4u3sqk', b'1', 'Arden', 'Guidi', '2005-07-16', '48596 Oakridge Avenue', 'assets\\images\\kitty_12-wallpaper-1920x1080.jpg', 1, NULL, '', 1, '2021-12-26 10:31:17', NULL),
(5, 'apenna2@flavors.me', 'gTCGmI9L5', b'1', 'Alasdair', 'Penna', '2007-06-08', '913 Tennyson Center', 'assets\\images\\default_ava.png', 0, NULL, '', 1, '2021-12-26 15:41:13', NULL),
(6, 'shanbury3@devhub.com', '8dH5tQ', b'1', 'Stepha', 'Hanbury', '1991-01-18', '33 Holmberg Plaza', 'assets\\images\\méo.jpg', 9, NULL, '', 0, '2021-12-26 15:06:25', '2021-12-16 10:53:47'),
(7, 'jskryne4@homestead.com', 'tcSzfeXlUe9A', b'1', 'Joni', 'Skryne', '2001-02-27', '31 Redwing Road', 'assets\\images\\kitty_12-wallpaper-1920x1080.jpg', 1, NULL, '', 1, '2021-12-26 14:37:53', NULL),
(8, 'mrelfe5@typepad.com', 'cmuciGe2', b'1', 'Masha', 'Relfe', '2006-09-11', '47 Coleman Trail', 'assets\\images\\i_belive_i_can_fly-wallpaper-2560x1440.jpg', 3, NULL, '', 1, '2021-12-26 15:04:59', NULL),
(9, 'mswains6@spiegel.de', 'Iu1gwrXOyz', b'1', 'Monah', 'Swains', '2001-10-30', '6456 New Castle Point', 'assets\\images\\default_ava.png', 0, NULL, '', 0, '2021-12-26 15:41:25', NULL),
(10, 'cspadotto7@examiner.com', '79o4q8s67u', b'1', 'Casandra', 'Spadotto', '1992-10-08', '04 Lakewood Park', 'assets\\images\\get_away_from_my_computer-wallpaper-2560x1440.jpg', 1, NULL, '', 1, '2021-12-26 15:05:38', NULL),
(11, 'ajonsson8@topsy.com', 'aOCFQ35', b'1', 'Alyse', 'Jonsson', '1996-07-09', '683 Stang Road', 'assets\\images\\i_belive_i_can_fly-wallpaper-2560x1440.jpg', 4, NULL, '', 1, '2021-12-26 15:05:16', NULL),
(12, 'jmcilmorow9@jalbum.net', 'OgZuo8o', b'1', 'Jase', 'McIlmorow', '1995-10-03', '9456 Sherman Terrace', 'assets\\images\\get_away_from_my_computer-wallpaper-2560x1440.jpg', 7, NULL, '', 0, '2021-12-26 15:05:58', '2021-11-30 12:25:01'),
(19, 'nmtuan1201@gmail.com', '$2y$10$mkry.IOSUJAz6codd2AW8uIdpWiGmWoFBUOYbP2jbSEqODldFPlRS', b'0', 'Tuấn', 'Nguyễn', '2001-01-01', NULL, 'assets\\images\\avatar\\Tuan_avatar.jpg', 7, NULL, '28f1e0938fe9f5edf56c744b5360a574405', 1, '2022-01-15 04:49:01', NULL),
(20, 'vunguyen220901@gmail.com', '$2y$10$3ItzUAKeKfRDr4ERj1UqY.zF5LoW6hg2YaZF7y5cXcJQXu4xrNllq', b'0', 'Vũ', 'Nguyễn', '2021-01-01', NULL, 'assets\\images\\avatar\\Vu_avatar.jpg', 0, NULL, 'b67e0d097c5ac9bfa77407950da0e5484904', 1, '2022-01-15 04:48:48', NULL),
(21, 'thaovannihong@gmail.com', '$2y$10$eVTVsjCblVivbkLJfnnzcuB2g7qny/rDNcJDwkaLvJgbokWXTG6ZK', b'1', 'Vân', 'Trần', '2021-01-01', NULL, 'assets\\images\\avatar\\Van_avatar.jpg', 0, NULL, 'f6d129ed8c61e95954bf3958651393153129', 1, '2022-01-15 08:24:30', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_comment`
-- (See below for the actual view)
--
CREATE TABLE `view_comment` (
`CommentID` int(11)
,`CommentContent` text
,`PostID` int(11)
,`UserID` int(11)
,`UserName` varchar(101)
,`UserAva` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_post`
-- (See below for the actual view)
--
CREATE TABLE `view_post` (
`PostID` int(11)
,`UserID` int(11)
,`UserName` varchar(101)
,`PostCaption` text
,`PostTime` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `view_comment`
--
DROP TABLE IF EXISTS `view_comment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id18287084_tuan`@`localhost` SQL SECURITY DEFINER VIEW `view_comment`  AS SELECT `comment`.`CommentID` AS `CommentID`, `comment`.`CommentContent` AS `CommentContent`, `comment`.`PostID` AS `PostID`, `comment`.`UserID` AS `UserID`, concat(`user_profile`.`UserFirstName`,' ',`user_profile`.`UserLastName`) AS `UserName`, `user_profile`.`UserAva` AS `UserAva` FROM (`comment` join `user_profile` on(`comment`.`UserID` = `user_profile`.`UserID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_post`
--
DROP TABLE IF EXISTS `view_post`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id18287084_tuan`@`localhost` SQL SECURITY DEFINER VIEW `view_post`  AS SELECT `post`.`PostID` AS `PostID`, `post`.`UserID` AS `UserID`, concat(`user_profile`.`UserFirstName`,' ',`user_profile`.`UserLastName`) AS `UserName`, `post`.`PostCaption` AS `PostCaption`, `post`.`PostTime` AS `PostTime` FROM (`post` join `user_profile` on(`post`.`UserID` = `user_profile`.`UserID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `PostID` (`PostID`);

--
-- Indexes for table `friend_ship`
--
ALTER TABLE `friend_ship`
  ADD KEY `User1ID` (`User1ID`),
  ADD KEY `User2ID` (`User2ID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `PostID` (`PostID`);

--
-- Indexes for table `like_action`
--
ALTER TABLE `like_action`
  ADD PRIMARY KEY (`UserID`,`PostID`),
  ADD KEY `PostID` (`PostID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserEmail` (`UserEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user_profile` (`UserID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`);

--
-- Constraints for table `friend_ship`
--
ALTER TABLE `friend_ship`
  ADD CONSTRAINT `friend_ship_ibfk_1` FOREIGN KEY (`User1ID`) REFERENCES `user_profile` (`UserID`),
  ADD CONSTRAINT `friend_ship_ibfk_2` FOREIGN KEY (`User2ID`) REFERENCES `user_profile` (`UserID`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`);

--
-- Constraints for table `like_action`
--
ALTER TABLE `like_action`
  ADD CONSTRAINT `like_action_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user_profile` (`UserID`),
  ADD CONSTRAINT `like_action_ibfk_2` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user_profile` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
