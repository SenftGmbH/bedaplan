-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 15. Januar 2014 um 06:53
-- Server Version: 5.1.72
-- PHP-Version: 5.3.3-7+squeeze17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `bedaplan`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `current`
--

CREATE TABLE IF NOT EXISTS `current` (
  `current_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `current_nr` bigint(20) NOT NULL,
  `current_employee` text NOT NULL,
  PRIMARY KEY (`current_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `employee_name` text NOT NULL,
  `employee_division` int(11) NOT NULL,
  `employee_payment` int(11) NOT NULL,
  `employee_bonus` int(11) NOT NULL,
  `employee_free1` int(11) NOT NULL,
  `employee_free2` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `free`
--

CREATE TABLE IF NOT EXISTS `free` (
  `free_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `free_user` text NOT NULL,
  `free_date` text NOT NULL,
  `free_free` text NOT NULL,
  PRIMARY KEY (`free_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ill`
--

CREATE TABLE IF NOT EXISTS `ill` (
  `ill_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ill_user` text NOT NULL,
  `ill_date` text NOT NULL,
  `ill_free` text NOT NULL,
  PRIMARY KEY (`ill_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `me_employee` varchar(25) NOT NULL,
  `me_content` text NOT NULL,
  `me_status` int(11) NOT NULL,
  `me_free1` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_date` varchar(10) NOT NULL,
  `project_nr` bigint(20) NOT NULL,
  `project_description` text NOT NULL,
  `project_employee` text NOT NULL,
  `project_users` int(11) NOT NULL,
  `project_done` smallint(6) NOT NULL,
  `project_free1` text NOT NULL,
  `project_free2` text NOT NULL,
  `project_free3` text NOT NULL,
  `project_free4` text NOT NULL,
  `project_free5` text NOT NULL,
  `project_free6` double NOT NULL,
  `map` text NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projecttime`
--

CREATE TABLE IF NOT EXISTS `projecttime` (
  `pt_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pt_nr` bigint(20) NOT NULL,
  `pt_employee` text NOT NULL,
  `pt_start` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `pt_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pt_sort` varchar(10) NOT NULL,
  PRIMARY KEY (`pt_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projectuser`
--

CREATE TABLE IF NOT EXISTS `projectuser` (
  `id` bigint(20) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `project_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status_employee` varchar(25) NOT NULL,
  `status_wt` int(11) NOT NULL,
  `status_pt` int(11) NOT NULL,
  `status_me` int(11) NOT NULL,
  `status_free1` int(11) NOT NULL,
  `status_free2` int(11) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `vehicle_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `vehicle_employee` varchar(25) NOT NULL,
  `vehicle_date` varchar(10) NOT NULL,
  `vehicle_free` varchar(256) NOT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `version`
--

CREATE TABLE IF NOT EXISTS `version` (
  `programm` int(11) NOT NULL,
  `database` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `worktime`
--

CREATE TABLE IF NOT EXISTS `worktime` (
  `worktimeid` bigint(20) NOT NULL AUTO_INCREMENT,
  `wt_employee` text NOT NULL,
  `wt_start` timestamp NULL DEFAULT NULL,
  `wt_stop` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  `wt_sort` varchar(10) NOT NULL,
  PRIMARY KEY (`worktimeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;
