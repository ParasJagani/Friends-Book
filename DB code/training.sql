-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2017 at 02:20 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `training`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `sender_id` int(255) NOT NULL,
  `reciver_id` int(255) NOT NULL,
  `flag` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `sender_id`, `reciver_id`, `flag`) VALUES
(5, 3, 15, 1),
(6, 3, 1, 1),
(7, 3, 13, 0),
(16, 15, 1, 0),
(17, 21, 19, 0),
(18, 21, 22, 0),
(19, 23, 3, 1),
(21, 24, 21, 0),
(22, 24, 13, 1),
(23, 24, 1, 1),
(24, 1, 24, 1),
(26, 24, 18, 0),
(27, 24, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `friends_log`
--

CREATE TABLE IF NOT EXISTS `friends_log` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `User_id` int(255) NOT NULL,
  `friends_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `info_table`
--

CREATE TABLE IF NOT EXISTS `info_table` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phno` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `info_table`
--

INSERT INTO `info_table` (`id`, `firstname`, `lastname`, `email`, `password`, `address`, `phno`) VALUES
(1, 'paras', 'jagani', 'paras@gmail.com', 'er', 'borivali', '123'),
(2, 'Mickey', 'Mouse', '123@gmail.com', '1234', 'mumbai', '12345'),
(3, 'dhruv', 'sharma', '234@gmail.com', ' 123', 'mumbai', '1223344'),
(4, 'sam', 'abcd', '567@gmail.com', '12323', 'mumbai', '123455'),
(5, 'armin', 'van buuren', '6789@gmail.com', ' 123441', 'mumbai-west', '35454645'),
(6, 'yash', 'xyz', 'rtrtrtr@gmail.com', '32323', 'mumbai', '12345'),
(7, 'ankit', 'zzzz', 'ankit@gmail.com', 'wewewe', 'mumbai', '123232'),
(8, 'harry', 'wwww', 'hey@gmail.com', '1234', 'mumbai', '12346'),
(9, 'larry', 'pppp', 'ppp@gmail.com', '12345', 'mumbai', '12345'),
(10, 'ricky', 'jjjjj', 'jjj@gmail.com', '12345', 'mumbai', '121323'),
(11, '', '', '', '', '', ''),
(12, 'saukhya', 'pol', 'asasa@gmail.com', 'sdsd', 'Enter text here...', '232323'),
(13, '', '', '', '', '', ''),
(14, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_messages`
--

CREATE TABLE IF NOT EXISTS `post_messages` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `post_message` varchar(255) NOT NULL,
  `message_sender` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `post_messages`
--

INSERT INTO `post_messages` (`id`, `post_message`, `message_sender`) VALUES
(1, 'my first post', 3),
(2, 'my second post', 3),
(3, 'my third post', 3),
(4, 'test post', 3),
(5, 'sushant ganguli', 3),
(6, 'paras jagani post', 3),
(7, 'paras jagani post', 3),
(8, 'paras jagani post', 3),
(9, 'testing post', 3),
(10, '', 15),
(11, 'my post', 15),
(12, 'happy birthday paras', 1),
(13, 'happy birthday siddhesh', 16),
(14, 'test post', 1),
(15, 'my first post', 13),
(16, 'my 2nd post', 13),
(17, 'my 3nd post', 13),
(18, 'my 4th post', 13),
(19, 'my 5th post', 13),
(20, 'my 6th post', 13),
(21, 'my first post', 24);

-- --------------------------------------------------------

--
-- Table structure for table `reg_table`
--

CREATE TABLE IF NOT EXISTS `reg_table` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `reg_table`
--

INSERT INTO `reg_table` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'nick', 'samuel', 'nick@gmail.com', '1234'),
(3, 'paras', 'jagani', 'paras@gmail.com', '1234'),
(13, 'paras', 'jagani', 'paras2@gmail.com', '1234'),
(14, 'sam', 'abc', 'sam@gmail.com', '1234'),
(15, 'sam', 'abcd', 'sam2@gmail.com', '1234'),
(16, 'dhruv', 'xyz', 'dhruv@gmail.com', '1234'),
(18, 'parth', 'patel', 'parth@gmail.com', '1234'),
(19, 'rahul', 'patel', 'rahul@gmail.com', '1234'),
(21, 'siddhesh', 'sarfare', 'sid@gmail.com', '1234'),
(22, 'sameer', 'shah', 'sameer@gmail.com', '1234'),
(23, 'Siddhesh', 'Sarfare', 'siddhesh@gmail.com', '1234'),
(24, 'lisa', 'mendonca', 'lisa@gmail.com', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
