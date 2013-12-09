-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Skapad: 14 okt 2013 kl 15:48
-- Serverversion: 5.5.32
-- PHP-version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `dcv`
--
CREATE DATABASE IF NOT EXISTS `dcv` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dcv`;

-- --------------------------------------------------------

--
-- Tabellstruktur `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `comment` varchar(10000) NOT NULL,
  `reply` tinyint(4) NOT NULL,
  `author` varchar(32) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumpning av Data i tabell `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `comment`, `reply`, `author`) VALUES
(1, 7, 'sdfsdfsdfsdf', 0, 'Sal'),
(2, 7, 'dfgdgfdgdfg', 0, 'Sal'),
(3, 7, 'This is a new comment bal bal bal', 0, 'Sal'),
(4, 7, 'This is another comment to test the new functionsdaw.', 0, 'Sal'),
(5, 7, 'This is a new comment', 0, 'Sal'),
(6, 7, 'This is a new comment', 0, 'Sal');

-- --------------------------------------------------------

--
-- Tabellstruktur `draft`
--

CREATE TABLE IF NOT EXISTS `draft` (
  `draft_id` int(11) NOT NULL AUTO_INCREMENT,
  `draft` varchar(4096) NOT NULL,
  `draft_title` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`draft_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumpning av Data i tabell `draft`
--

INSERT INTO `draft` (`draft_id`, `draft`, `draft_title`, `timestamp`) VALUES
(1, 'dfgfgdfgsdfg', 'sdfgdsfgdsfgdsg', '2013-10-14 07:51:24');

-- --------------------------------------------------------

--
-- Tabellstruktur `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post` mediumtext NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `comments` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumpning av Data i tabell `post`
--

INSERT INTO `post` (`post_id`, `post`, `post_title`, `comments`, `timestamp`, `views`) VALUES
(1, 'adwasdawd', 'aadawdad', 0, '2013-10-09 07:33:49', 0),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget sollicitudin dolor. Nam ut imperdiet tellus, a laoreet mauris. Duis semper scelerisque feugiat. In iaculis congue risus in vulputate. Etiam vitae elit erat. Duis porttitor arcu elementum felis faucibus, id commodo orci pulvinar. Pellentesque scelerisque erat a metus rhoncus, id facilisis magna sollicitudin. Sed vulputate in eros in accumsan. Proin rhoncus eros quis imperdiet pulvinar. Cras eget erat vel risus imperdiet molestie sed sed erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse ut neque ornare risus viverra pretium ac id risus. Duis commodo purus libero, ut consequat elit dictum ac.', 'Post 1', 0, '2013-10-09 07:36:02', 0),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget sollicitudin dolor. Nam ut imperdiet tellus, a laoreet mauris. Duis semper scelerisque feugiat. In iaculis congue risus in vulputate. Etiam vitae elit erat. Duis porttitor arcu elementum felis faucibus, id commodo orci pulvinar. Pellentesque scelerisque erat a metus rhoncus, id facilisis magna sollicitudin. Sed vulputate in eros in accumsan. Proin rhoncus eros quis imperdiet pulvinar. Cras eget erat vel risus imperdiet molestie sed sed erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse ut neque ornare risus viverra pretium ac id risus. Duis commodo purus libero, ut consequat elit dictum ac.', 'Post 2', 0, '2013-10-09 07:36:14', 0),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget sollicitudin dolor. Nam ut imperdiet tellus, a laoreet mauris. Duis semper scelerisque feugiat. In iaculis congue risus in vulputate. Etiam vitae elit erat. Duis porttitor arcu elementum felis faucibus, id commodo orci pulvinar. Pellentesque scelerisque erat a metus rhoncus, id facilisis magna sollicitudin. Sed vulputate in eros in accumsan. Proin rhoncus eros quis imperdiet pulvinar. Cras eget erat vel risus imperdiet molestie sed sed erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse ut neque ornare risus viverra pretium ac id risus. Duis commodo purus libero, ut consequat elit dictum ac.', 'Post 4', 0, '2013-10-09 07:36:27', 0),
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget sollicitudin dolor. Nam ut imperdiet tellus, a laoreet mauris. Duis semper scelerisque feugiat. In iaculis congue risus in vulputate. Etiam vitae elit erat. Duis porttitor arcu elementum felis faucibus, id commodo orci pulvinar. Pellentesque scelerisque erat a metus rhoncus, id facilisis magna sollicitudin. Sed vulputate in eros in accumsan. Proin rhoncus eros quis imperdiet pulvinar. Cras eget erat vel risus imperdiet molestie sed sed erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse ut neque ornare risus viverra pretium ac id risus. Duis commodo purus libero, ut consequat elit dictum ac.', 'Post 5', 0, '2013-10-09 07:36:34', 0),
(7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget sollicitudin dolor. Nam ut imperdiet tellus, a laoreet mauris. Duis semper scelerisque feugiat. In iaculis congue risus in vulputate. Etiam vitae elit erat. Duis porttitor arcu elementum felis faucibus, id commodo orci pulvinar. Pellentesque scelerisque erat a metus rhoncus, id fgdfgdfgdfgdfgdfg', 'Post 6', 6, '2013-10-14 13:05:04', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`user_id`, `email`, `username`, `password`) VALUES
(2, 'sam@sam.com', 'salmanqq', '$6$rounds=5000$df62b1ff88eeff1d$bAZMMwwJnz4x5051EzEO9EvsoAQuJv2pLs7yTTyB0nGPqU5NMEIutTkZXb1gAb/FpT9zLipdamrYiUmzVBgys/');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
