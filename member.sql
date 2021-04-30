-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2020-10-22 18:16:21
-- 伺服器版本： 5.7.31
-- PHP 版本： 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `member`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `passwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`username`, `passwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- 資料表結構 `board`
--

DROP TABLE IF EXISTS `board`;
CREATE TABLE IF NOT EXISTS `board` (
  `boardid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `boardname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boardsex` enum('男','女') COLLATE utf8_unicode_ci DEFAULT '男',
  `boardsubject` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boardtime` datetime DEFAULT NULL,
  `boardmail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boardweb` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boardcontent` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`boardid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `board`
--

INSERT INTO `board` (`boardid`, `boardname`, `boardsex`, `boardsubject`, `boardtime`, `boardmail`, `boardweb`, `boardcontent`) VALUES
(1, '茶米', '男', '這是第一則留言', '2016-10-16 11:25:30', 'david@e-happy.com.tw', 'http://www.e-happy.com.tw', '這是茶米的第一則留言！'),
(2, 'Lily', '女', '好棒喔，真不錯。', '2016-10-16 11:27:30', 'lily@e-happy.com.tw', '', '我也很喜歡這個留言版！'),
(3, '路人甲', '男', '我也來加油', '2016-10-16 11:36:51', '', 'http://www.e-happy.com.tw', '路過，我也來加油喔！\r\n灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水。'),
(4, '路人乙', '男', '我也要學！', '2016-10-16 11:38:23', '', '', '請問這個程式很難嗎？\r\n我也好想學喔！'),
(5, '學員A', '女', '好漂亮的留言版', '2016-10-16 11:39:47', '', '', '這個留言版好漂亮喔！'),
(6, '學員B', '女', '這是我第一次留言', '2016-10-16 11:40:25', '', '', '這是我第一次留言，\r\n希望大家多多指教。'),
(7, '茶米', '男', '感謝大家的測試！', '2016-10-16 11:47:12', 'david@e-happy.com.tw', 'http://www.e-happy.com.tw', '感謝大家的測試！\r\n也希望大家多多棒場。'),
(9, '林玩', '男', 'GOGO food', '2020-10-16 13:18:06', '1235465@gmail.com', '', '我覺得xxxxxxx'),
(10, '哈哈', '男', 'GOGO', '2020-10-19 20:24:25', '1235465@gmail.com', '', 'wewfwefwefe'),
(11, '哈哈', '男', 'GOGO', '2020-10-19 21:07:02', '1235465@gmail.com', '', 'rehethrdhrhsreh'),
(12, '哈哈', '男', 'GOGO', '2020-10-22 11:32:10', '1235465@gmail.com', '', 'efgewrgwergwe'),
(13, '哈哈', '女', 'GOGO', '2020-10-22 11:34:02', '1235465@gmail.com', '', 'wqdwqdqwd'),
(14, '哈哈', '女', 'GOGO', '2020-10-22 11:34:21', '1235465@gmail.com', '', 'wqdwqdqwd');

-- --------------------------------------------------------

--
-- 資料表結構 `likeform`
--

DROP TABLE IF EXISTS `likeform`;
CREATE TABLE IF NOT EXISTS `likeform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `good` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `likeform`
--

INSERT INTO `likeform` (`id`, `name`, `good`) VALUES
(9, '北投', 'http://localhost/project/%E5%8C%97%E6%8A%95.html'),
(10, '北投', 'http://localhost/project/%E5%8C%97%E6%8A%95.html'),
(11, '北投', 'http://localhost/project/%E5%8C%97%E6%8A%95.html'),
(12, '北投', 'http://localhost/project/%E5%8C%97%E6%8A%95.html'),
(13, '谷關', 'http://localhost/project/%E8%B0%B7%E9%97%9C.html');

-- --------------------------------------------------------

--
-- 資料表結構 `problem`
--

DROP TABLE IF EXISTS `problem`;
CREATE TABLE IF NOT EXISTS `problem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL DEFAULT '',
  `mail` varchar(10) NOT NULL DEFAULT '',
  `problem` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `problem`
--

INSERT INTO `problem` (`id`, `name`, `mail`, `problem`) VALUES
(2, 'aaa', 'aaaaaaa', 'aaaaaaaaaa'),
(3, '', '', ''),
(4, '許大維', 'regtrhr', 'ehwtwewh'),
(5, 'aaa', 'grhgrdh', 'rhdsrhzd'),
(6, 'aaa', 'grhgrdh', 'rhdsrhzd');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(10) NOT NULL DEFAULT '',
  `password` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(10) NOT NULL DEFAULT '',
  `sex` char(2) NOT NULL DEFAULT '',
  `year` tinyint(4) NOT NULL DEFAULT '0',
  `month` tinyint(4) NOT NULL DEFAULT '0',
  `day` tinyint(4) NOT NULL DEFAULT '0',
  `telephone` varchar(20) NOT NULL DEFAULT '',
  `cellphone` varchar(20) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(50) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `name`, `sex`, `year`, `month`, `day`, `telephone`, `cellphone`, `address`, `email`, `url`, `comment`) VALUES
(7, 'guest', 'guest', '許大維', '男', 88, 1, 5, '0912345678', '0955667788', '韓國市', '123355612@gmail.com', 'http://', ''),
(5, 'jim', 'jim', '許子維', '男', 88, 1, 1, '0912222222', '0912222222', '韓國市', 'c00330033c@gmail.com', 'http://', ''),
(3, 'add', 'add', '許小維', '男', 88, 1, 1, '0912222222', '0912222222', '韓國市', '123355612@gmail.com', 'http://', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
