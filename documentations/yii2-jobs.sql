-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.0.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for yii2_jobs
CREATE DATABASE IF NOT EXISTS `yii2_jobs` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `yii2_jobs`;


-- Dumping structure for table yii2_jobs.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_Date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table yii2_jobs.category: ~6 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `created_Date`) VALUES
	(1, 'Backend Software Engineer', '2016-04-19 19:17:54'),
	(2, 'Frontend Software Engineer', '2016-04-19 19:18:09'),
	(3, 'Data Scientist', '2016-04-19 19:18:10'),
	(4, 'DevOps', '2016-04-19 19:18:19'),
	(5, 'IOS Developer', '2016-04-19 19:18:30'),
	(6, 'Android Developer', '2016-04-19 19:18:38');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


-- Dumping structure for table yii2_jobs.job
CREATE TABLE IF NOT EXISTS `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `requirements` varchar(225) NOT NULL,
  `salary_range` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `state` varchar(225) NOT NULL,
  `zipcode` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `is_publish` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- Dumping data for table yii2_jobs.job: ~49 rows (approximately)
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` (`id`, `category_id`, `user_id`, `title`, `description`, `type`, `requirements`, `salary_range`, `city`, `state`, `zipcode`, `email`, `phone`, `is_publish`, `created_date`) VALUES
	(54, 1, 4, 'Backend Software Engineer', 'Maintain and develop with yii framework', 'full_time', 'Mut have experience :\r\n- PHP OOP\r\n- xHTML CSS concept\r\n- SQL Relationship', '$60 - $100', 'Jakarta', 'Jakarta', '14045', 'yii2jobs@jobs.com', '123-123-123', 1, '2016-04-21 10:36:28'),
	(55, 2, 4, 'Frontend Software Engineer', 'Maintain and develop with yii framework', 'full_time', 'Mut have experience :\r\n- PHP OOP\r\n- xHTML CSS concept\r\n- SQL Relationship', '$60 - $100', 'Jakarta', 'Jakarta', '14045', 'yii2jobs@jobs.com', '123-123-123', 1, '2016-04-21 10:36:28'),
	(56, 2, 4, 'IOS Developer', 'Maintain and develop with xamarin.form or xamarin.ios', 'full_time', 'Mut have experience :\r\n- C# ', '$60 - $100', 'Jakarta', 'Jakarta', '14045', 'yii2jobs@jobs.com', '123-123-123', 1, '2016-04-21 10:36:28'),
	(57, 2, 4, 'Android Developer', 'Maintain and develop with xamarin.form or xamarin.android', 'full_time', 'Mut have experience :\r\n- C#', '$60 - $100', 'Jakarta', 'Jakarta', '14045', 'yii2jobs@jobs.com', '123-123-123', 1, '2016-04-21 10:36:28');
/*!40000 ALTER TABLE `job` ENABLE KEYS */;


-- Dumping structure for table yii2_jobs.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table yii2_jobs.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `full_name`, `username`, `email`, `password`, `auth_key`, `created_date`) VALUES
	(4, 'Zeihan Aulia', 'zeihanaulia', 'zeihan.aulia@outlook.com', '21232f297a57a5a743894a0e4a801fc3', '_s7cgq2vr6ujeGZIL1j2vEgs0jVNirrr', '2016-04-20 15:14:49');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
