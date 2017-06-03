/* COPY PASTE THIS CODE TO CREATE DATABASE */

/*THIS CODE CREATES TWO DATABASES - ONE NAMED chat - THE OTHER NAMED dblogin*/

CREATE DATABASE `dblogin` ;

CREATE TABLE `dblogin`.`users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `dblogin`.`items` (
	`item_id` int(11) NOT NULL AUTO_INCREMENT,
	`item_title` varchar(50) NOT NULL,
	`item_description` varchar(9999) NOT NULL,
	`user_id` int(11) NOT NULL,
	`item_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET GLOBAL time_zone = "+00:00";

CREATE TABLE `dblogin`.`chatters` (
  `name` text NOT NULL,
  `seen` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `dblogin`.`messages` (
  `name` text NOT NULL,
  `msg` text NOT NULL,
  `posted` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
