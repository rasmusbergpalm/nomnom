-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2011 at 11:20 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nomnom`
--

-- --------------------------------------------------------

--
-- Table structure for table `dashboards`
--

CREATE TABLE IF NOT EXISTS `dashboards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dashboards`
--

INSERT INTO `dashboards` (`id`, `name`) VALUES
(2, 'sdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `dashboards_items`
--

CREATE TABLE IF NOT EXISTS `dashboards_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dashboard_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `left` int(11) NOT NULL,
  `top` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `params` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dashboard_id` (`dashboard_id`,`item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `dashboards_items`
--

INSERT INTO `dashboards_items` (`id`, `dashboard_id`, `item_id`, `left`, `top`, `width`, `height`, `params`) VALUES
(12, 2, 2, 20, 0, 444, 312, '[''bergpalm.dk'']');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `top` int(11) NOT NULL,
  `left` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `code` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `top`, `left`, `width`, `height`, `code`) VALUES
(2, 'latency', 40, 40, 600, 400, 'function latency(itemid, host){\r\n    $.ajax({\r\n        type: "GET",\r\n        url: "http://localhost/couchdb/data/_design/tagsdate/_view/tagsdate?key=%22"+host+"%22",\r\n        dataType: ''json'',\r\n        success: function(msg){\r\n            var i=0;\r\n            var d=[];\r\n            console.log(msg);\r\n            $.each(msg.rows, function(k,r){\r\n            	console.log(r);\r\n                d.push([i++, r.value.latency]);	\r\n            });\r\n            console.log(d);\r\n            $.plot($(''#''+itemid), [d]);\r\n        }\r\n    });\r\n}');
