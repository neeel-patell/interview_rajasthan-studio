/*
SQLyog Community
MySQL - 10.4.10-MariaDB : Database - interview-rajasthan-studio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`interview-rajasthan-studio` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `appointment` */

CREATE TABLE `appointment` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `coach_name` char(25) NOT NULL,
  `week_day` int(8) NOT NULL,
  `booking_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `appointment` */

/*Table structure for table `coach` */

CREATE TABLE `coach` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `name` char(25) NOT NULL,
  `time_zone` varchar(100) NOT NULL,
  `week_day` int(8) NOT NULL COMMENT '0: sunday, 1: monday, ... , 6: saturday',
  `available_at` time NOT NULL,
  `available_until` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `coach` */

insert  into `coach`(`id`,`name`,`time_zone`,`week_day`,`available_at`,`available_until`) values (1,'John Doe','(GMT-06:00) America/North_Dakota/New_Salem',1,'09:00:00','17:30:00'),(2,'John Doe','(GMT-06:00) America/North_Dakota/New_Salem',2,'08:00:00','16:00:00'),(3,'John Doe','(GMT-06:00) America/North_Dakota/New_Salem',4,'09:00:00','16:00:00'),(4,'John Doe','(GMT-06:00) America/North_Dakota/New_Salem',5,'07:00:00','14:00:00'),(5,'Jane Doe','(GMT-06:00) Central Time (US & Canada)',2,'08:00:00','10:00:00'),(6,'Jane Doe','(GMT-06:00) Central Time (US & Canada)',3,'11:00:00','18:00:00'),(7,'Jane Doe','(GMT-06:00) Central Time (US & Canada)',6,'09:00:00','15:00:00'),(8,'Jane Doe','(GMT-06:00) Central Time (US & Canada)',7,'08:00:00','15:00:00'),(9,'Rachel Green','(GMT-09:00) America/Yakutat',1,'08:00:00','10:00:00'),(10,'Rachel Green','(GMT-09:00) America/Yakutat',2,'11:00:00','13:00:00'),(11,'Rachel Green','(GMT-09:00) America/Yakutat',3,'08:00:00','10:00:00'),(12,'Rachel Green','(GMT-09:00) America/Yakutat',6,'08:00:00','11:00:00'),(13,'Rachel Green','(GMT-09:00) America/Yakutat',7,'07:00:00','09:00:00'),(14,'Margaret Houlihan','(GMT-06:00) Central Time (US & Canada)',1,'09:00:00','15:00:00'),(15,'Margaret Houlihan','(GMT-06:00) Central Time (US & Canada)',2,'06:00:00','13:00:00'),(16,'Margaret Houlihan','(GMT-06:00) Central Time (US & Canada)',3,'06:00:00','11:00:00'),(17,'Margaret Houlihan','(GMT-06:00) Central Time (US & Canada)',5,'08:00:00','12:00:00'),(18,'Margaret Houlihan','(GMT-06:00) Central Time (US & Canada)',6,'09:00:00','16:00:00'),(19,'Margaret Houlihan','(GMT-06:00) Central Time (US & Canada)',7,'08:00:00','10:00:00'),(20,'Hawkeye Pierce','(GMT-06:00) Central Time (US & Canada)',4,'07:00:00','14:00:00'),(21,'Hawkeye Pierce','(GMT-06:00) Central Time (US & Canada)',4,'15:00:00','17:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
