-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2017 at 10:26 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tobeasy`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `propertyID` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `reservation` varchar(60) DEFAULT NULL,
  `sales` varchar(60) DEFAULT NULL,
  `web` varchar(100) DEFAULT NULL,
  `remark` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propertyID`, `name`, `address`, `phone`, `reservation`, `sales`, `web`, `remark`) VALUES
(1, 'Danoya villa', 'jalan batubelig 559', '+62 361 4735305', 'reservation@danoya.com', 'ulan', 'www.danoya.com', 'dfdsf'),
(2, 'jas villa boutique', 'Jalan raya seminyak gang merta sari', '+62 361 4741681', 'reservation@jasvilla.com', 'linda', 'www.jasvilla.com', NULL),
(4, 'new pondok sara', 'jalan arjuna gang raja ', '+62 361 732142', 'booking@newpondoksaravilla.com', 'anton', 'www.newpondoksaravilla.com', NULL),
(5, 'danoya villa', 'jalan batubelig 559', '4735305', 'reservation@danoya.com', 'ulan', 'www.danoya.com', NULL),
(6, 'BAli Sunset Villa', 'Jl. Nakula 2 Gang Baik-Baik No 9, Seminyak', '+62 361 4727070', 'sales.balisunset@gmail.com', 'linda', 'http://balisunsetvilla.com', NULL),
(7, 'Danoya Villa', 'jalan batubelig 559', '+62 361 4735305 	', 'reservation@danoya.com', 'ulan', 'www.danoya.com', NULL),
(8, 'Alam Bidadari', 'Jl. Dewi Saraswati No.9, Seminyak', '(0361) 730520', 'vm@alambidadariseminyak.com', 'Nyoman Alit', 'http://alambidadariseminyak.com/', NULL),
(9, 'Jaz Villa', 'Jl. Laksamana, Gg. Bugis, Seminyak', '+62 361 4741681', 'reservation@jasvilla.com', 'linda', 'www.thejasvillasbali.com/', NULL),
(10, 'Cancelation', 'Cancelation', '-', '-', '-', '-', NULL),
(11, 'danoya villa', 'jalan batubelig 559', '+62 361 4735305', 'reservation@danoya.com', 'ulan', 'www.danoya.com', ''),
(12, 'Danoya villa', 'jalan batubelig 559', '+62 361 4735305', 'reservation@danoya.com', 'ulan', 'www.danoya.com', ''),
(13, 'Danoya villa', 'jalan batubelig 559', '+62 361 4735305', 'reservation@danoya.com', 'ulan', 'www.danoya.com', ''),
(14, 'danoya villa', 'jalan batubelig 559', '+62 361 4735305', 'reservation@danoya.com', 'ulan', 'www.danoya.com', 'adsa'),
(15, 'danoya villa', 'jalan batubelig 559', '+62 361 4735305', 'reservation@danoya.com', 'ulan', 'www.danoya.com', ''),
(16, 'danoya villa', 'jalan batubelig 559', '+62 361 4735305', 'reservation@danoya.com', 'ulan', 'www.danoya.com', 'sdas'),
(17, 'danoya villa', 'jalan batubelig 559', '4735305', 'reservation@danoya.com', 'ulan', 'www.danoya.com', ''),
(18, 'danoya villa', 'jalan batubelig 559', '+62 361 4735305', 'reservation@danoya.com', 'ulan', 'www.danoya.com', ''),
(19, 'danoya villa', 'jalan batubelig 559', '+62 361 4735305', 'reservation@danoya.com', 'ulan', 'www.danoya.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `tanggal` date NOT NULL,
  `resId` int(6) NOT NULL,
  `guest_name` varchar(60) NOT NULL,
  `roomId` int(5) NOT NULL,
  `status` varchar(20) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `rate_usd` int(12) NOT NULL,
  `rate_idr` int(12) NOT NULL,
  `rate_contract` int(12) NOT NULL,
  `country` text NOT NULL,
  `sob_id` int(10) NOT NULL,
  `los` int(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `remark` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`tanggal`, `resId`, `guest_name`, `roomId`, `status`, `check_in`, `check_out`, `rate_usd`, `rate_idr`, `rate_contract`, `country`, `sob_id`, `los`, `email`, `remark`) VALUES
('2016-09-02', 1, 'jhon', 1, 'Canceled', '2017-01-20', '2017-01-24', 0, 0, 0, 'dfdsf', 10, 4, 'anu@gmail.com', 'sdf'),
('2017-01-18', 2, 'mr awin', 2, 'Canceled', '2017-02-22', '2017-02-28', 0, 0, 0, 'dfdsf', 11, 6, '-', '-'),
('2017-01-18', 3, 'mr awin', 4, 'Canceled', '2017-05-18', '2017-05-31', 0, 0, 0, 'dfdsf', 10, 13, '-', '-'),
('2017-01-20', 4, 'tania', 1, 'Canceled', '1970-01-01', '1970-01-01', 115, 0, 1200000, '', 12, 0, 'gfdg@gmail.com', 'dfgdfgdfg'),
('2017-01-20', 5, 'Mrs. Ty Frewer', 4, 'Registered', '2017-02-07', '2017-02-11', 434, 5608437, 4800000, '', 11, 4, 'tyfrewer@hotmail.com', 'deposit 14 jan IDR 1,2jt cc bni\r\n@1,200,000/N EX:12,700'),
('2017-01-20', 6, 'Mr. Henry lin', 1, 'Registered', '2017-04-02', '2017-04-03', 99, 1281047, 1050000, '', 10, 1, 'henry-els9yu88o1o3bqr7@guest.airbnb.com', 'phone: +88 695 314 1219\r\nex:12,700 booking masssange upon arrival '),
('2017-01-20', 7, 'Mrs.LAura Gibbons', 4, 'Registered', '2017-04-11', '2017-04-14', 328, 4030759, 2850000, '', 11, 3, 'laurasg787980@gmail.com', 'homeaway dny, cod: 20 maret  ex:12,700 @950,000/N\r\nphone:+44 7725091671. Pic up: EK398/21:40 USD20 \r\nTOTAL: 4,230,759 free pick up: 200,000'),
('2017-01-20', 8, 'Mr. Sean Gully ', 4, 'Confirmed', '2017-05-15', '2017-05-23', 869, 11036300, 9600000, '', 11, 8, 'seankaren@esc.net.au', 'phone:+61 0411 283 345 @1,200,000/N ex:12,700 cod:1 april free aiport pick up arrival: JQ83 12:35 am (16 may)'),
('2017-01-20', 9, 'Mr. Sriram S', 1, 'Confirmed', '2017-05-07', '2017-05-13', 594, 7543800, 6300000, '', 10, 6, 'sriram-4bc12omw0w67hpef@guest.airbnb.com', 'phone +44 7640962358 @1,050,000/N \r\nPick up: Ak 376/1:55pm'),
('2017-01-20', 10, 'Mrs. Wendi Czislowski', 4, 'Confirmed', '2017-06-11', '2017-06-18', 805, 10223500, 8400000, '', 11, 7, 'wendiczislowski@hotmail.com', 'book direct dri homeaway tamu dp: USD 438=5,688,876, balance 367(3 hari sebelum kedatangan). cod: 15 may ex:12,700 @1,200,000/N'),
('2017-01-20', 11, 'Mrs. Lindsay Thompson', 4, 'Confirmed', '2017-10-17', '2017-10-27', 1047, 13296900, 12000000, '', 12, 10, '-', 'punya utang 170usd. harus di bayar saat bookingan ini. @1,200,000/N ex:12,700\r\ncod:25 sept '),
('2017-01-23', 12, ' Mrs. Janina Brunkow', 1, 'Registered', '2016-10-22', '2016-11-05', 1370, 17358336, 14700000, '', 11, 14, 'janina.brunkow@gmx.de', 'homeaway dny ff  @1,050,000/N'),
('2017-01-23', 13, 'Mr. Christopher Burwin', 1, 'Registered', '2016-09-05', '2016-09-14', 811, 10314526, 9450000, '', 11, 9, 'burwin36@googlemail.com', 'homeaway dny @1,050,000/N'),
('2017-01-23', 14, 'Mrs. Bre Appel', 4, 'Registered', '2016-08-13', '2016-08-20', 916, 11678921, 9450000, '', 11, 7, 'bree_appel_88@hotmail.com', 'homeaway dny @1,350,000/N'),
('2017-01-23', 15, 'Mrs. Yueng Kang', 1, 'Registered', '2016-01-10', '2016-01-12', 174, 2344922, 2344922, '', 11, 2, 'zhenxijasmine@gmail.com', 'homeaway dny'),
('2017-01-23', 16, 'Mr.Eric Taufan', 7, 'Registered', '2016-10-27', '2016-10-29', 301, 3824387, 3000000, '', 12, 2, 'erictaufan@gmail.com', 'tripadvisor dny @1,500,000/N'),
('2017-01-23', 17, 'Mrs.Brieana Mastrogiacomo', 5, 'Registered', '2016-06-14', '2016-06-24', 3090, 40089820, 40089820, '', 12, 10, 'brie-mastro@hotmail.com', 'tripadvisor dny, '),
('2017-01-24', 18, 'Quintin Ed Coetzer', 6, 'Registered', '2016-05-14', '2016-05-20', 279, 3623135, 2880000, '', 10, 6, '-', 'airbnb dny @480,000/N'),
('2017-01-24', 19, 'Zonghe Cai', 1, 'Registered', '2016-03-25', '2016-03-28', 247, 3142645, 3142645, '', 10, 3, '-', 'airbnb dny\r\n+65 9146 2462'),
('2017-01-24', 20, 'Aaron OConnell', 1, 'Registered', '2016-03-15', '2016-03-17', 178, 2302936, 2302936, '', 10, 2, '-', 'airbnb dny\r\n+1 (716) 352-0117'),
('2017-01-24', 21, 'Maria Fransisca', 5, 'Registered', '2016-02-11', '2016-02-15', 1358, 17819380, 16794645, '', 10, 4, '-', 'airbnb dny\r\n+62 813 1524 1003'),
('2017-01-24', 22, 'ANINDIT BORKOTOKY', 1, 'Registered', '2016-02-05', '2016-02-08', 291, 3862900, 3862900, '', 10, 3, '-', 'airbnb dny\r\n+91 7666 454 089'),
('2017-01-24', 23, 'Tan Yu Xuan', 1, 'Registered', '2016-01-28', '2016-02-01', 330, 4408838, 4408838, '', 10, 4, '-', 'airbnb dny\r\n+65 9678 7013'),
('2017-01-24', 24, 'Eqa Chan/Nur Atiqah Roslan', 1, 'Registered', '2016-01-18', '2016-01-21', 291, 3942946, 3657404, '', 10, 3, '-', 'airbnb dny\r\n+60 10 221 2340'),
('2017-01-24', 25, 'Aj Kim', 1, 'Registered', '2016-01-15', '2016-01-17', 178, 2423296, 2423296, '', 10, 2, '', 'airbnb dny\r\n+61 411 750 590'),
('2017-01-24', 26, 'A Patel', 6, 'Registered', '2015-12-25', '2015-12-31', 407, 5356766, 4800000, '', 10, 6, '-', ' airbnb dny   @800,000/N\r\n+61 404 607 705'),
('2017-01-24', 27, 'Dionne Hoh', 1, 'Registered', '2016-01-09', '2016-01-12', 247, 3344903, 3344903, '', 10, 3, '-', 'airbnb dny\r\n+65 9199 0095'),
('2017-01-24', 28, 'Daniel Chong', 1, 'Registered', '2015-12-04', '2015-12-06', 194, 2605614, 2283270, '', 10, 2, '-', 'airbnb dny\r\n+65 9745 6074'),
('2017-01-24', 29, 'Erin Padilla', 1, 'Registered', '2015-11-27', '2015-11-29', 82, 1102326, 1102326, '', 10, 2, '-', 'airbnb dny early CO stay 1 N  FOC 2 N\r\n+65 8722 6303\r\n+65 8322 7323'),
('2017-01-24', 30, 'Emma Cheng', 6, 'Registered', '2015-11-14', '2015-11-15', 44, 589864, 0, '', 10, 1, '-', 'airbnb dny +65 9895 0195'),
('2017-01-24', 31, 'Saleem Javed', 1, 'Registered', '2015-11-14', '2015-11-19', 412, 5523272, 5523272, '', 10, 5, '-', 'airbnb dny +61 402 440 923'),
('2017-01-24', 32, 'Wafa Ismail', 1, 'Registered', '2015-10-27', '2015-11-04', 621, 8237900, 8237900, '', 10, 8, '-', 'airbnb dny +1 (951) 212-3876'),
('2017-01-24', 33, 'Carl Siahaan', 1, 'Registered', '2015-10-20', '2015-10-22', 155, 2084543, 2084543, '', 10, 2, '-', 'airbnb dny +65 9680 1253'),
('2017-01-24', 34, 'InÃ¨s Aguinaga', 1, 'Registered', '2015-10-16', '2015-10-18', 155, 2037568, 2037568, '', 10, 2, '-', 'airbnb dny +852 9774 4849'),
('2017-01-24', 35, 'Sercan Aksoy', 1, 'Registered', '2015-09-02', '2015-09-08', 582, 8012951, 8012951, '', 10, 6, '-', 'airbnb dny +90 546 710 3768'),
('2017-01-24', 36, 'Chien Ling Ooi', 5, 'Registered', '2015-08-22', '2015-08-23', 458, 6254687, 6254687, '', 10, 1, '-', 'airbnb dny +60 12 922 0857'),
('2017-01-24', 37, 'Paras Lalwani', 8, 'Registered', '2016-12-28', '2017-01-01', 620, 8140383, 6900000, '', 11, 4, 'lalwani1@hotmail.com', '+6598506214\r\n@1,7250,000/ night'),
('2017-01-24', 38, 'Amalfi Darusman', 4, 'Registered', '2016-12-17', '2016-12-19', 213, 2780503, 2400000, '', 11, 2, 'amalfi.yusri@gmail.com', '+971561260615\r\n@1,200,000/nigh'),
('2017-01-24', 39, 'Richard Nathan', 1, 'Registered', '2016-11-10', '2016-11-15', 504, 6590691, 5250000, '', 11, 5, 'kingsta4eva@gmail.com', '+61 0497 480 869 @1,050,000/N'),
('2017-01-24', 40, 'LOK YIU YAU', 1, 'Registered', '2016-09-26', '2016-09-29', 291, 3666555, 3150000, '', 11, 3, 'angelyauhk@gmail.com', '+85298126242 @1,050,000/N'),
('2017-01-24', 41, ' Thibaut Ulpat', 4, 'Registered', '2016-08-19', '2016-08-21', 261, 3358935, 2700000, '', 11, 2, 'thibaut.ulpat@gmail.com', '+33 675689286 @1,350,000/N'),
('2017-01-24', 42, 'TAMARA ROBERTS', 4, 'Registered', '2016-07-11', '2016-07-15', 523, 6686576, 5400000, '', 11, 4, 'troberts@ncrad.com', '+61 431157780@1,350,000/N'),
('2017-01-24', 43, 'Ellie Crawford', 1, 'Registered', '2016-06-13', '2016-06-15', 174, 2269574, 2165238, '', 11, 2, 'ellie.crawford@outlook.com', '+61 0468 367 066'),
('2017-01-24', 44, 'Celeste Barnard', 1, 'Registered', '2016-05-27', '2016-05-30', 285, 3780164, 3262881, '', 11, 3, 'celeste_nicole@live.com.au', '610421563053'),
('2017-01-24', 45, 'Ian Gray', 9, 'Registered', '2016-01-03', '2016-01-13', 1067, 14302339, 1100000, '', 11, 10, 'ian9000@gmail.com', '+6421891300 @1,100,000'),
('2017-01-24', 46, 'GEORGIOS GIAMARELLOS', 1, 'Registered', '2015-10-25', '2015-11-01', 291, 9211580, 7000000, '', 11, 7, 'george28g@yahoo.gr', '+306942202200 extend bayar di villa. 5.457.300 bayar di villa $291=3,863,426\r\ntamu extend sampai tgl 1 nov'),
('2017-01-24', 47, 'MaksÃ¯m JdankÃ¯n', 1, 'Registered', '2015-09-28', '2015-10-11', 1261, 18010432, 18010432, '', 11, 13, 'svay888@gmail.com', '+79161999991 full dny'),
('2017-01-24', 48, 'Hira Chand', 2, 'Registered', '2016-12-27', '2017-01-03', 992, 12972155, 7300000, '', 10, 7, '-', '+61 432 611 120\r\ntamu early check 1 hari stay pingin tingga sama temennya, banyar cuma sampai tgl 31. m=5,672,155'),
('2017-01-24', 49, 'Trent Banks', 4, 'Canceled', '2016-11-25', '2016-12-05', 1025, 0, 0, '', 10, 10, '-', '+61 414 806 234'),
('2017-01-24', 50, 'Trent Banks', 4, 'Registered', '2016-11-25', '2016-12-05', 1025, 13512517, 12000000, '', 10, 10, '-', '+61 414 806 234 @1,200,000/N '),
('2017-01-24', 51, 'Chelsea Jackson', 4, 'Registered', '2016-11-04', '2016-11-17', 1333, 17020118, 15600000, '', 10, 13, '-', '+61 413 559 412@ 1,200,000/N\r\n+61 13 55 9412'),
('2017-01-24', 52, 'Caethrin Unjoto', 9, 'Registered', '2016-08-29', '2016-08-31', 213, 3358935, 2200000, '', 10, 2, '-', '+65 9681 3480 @1,100,000/N\r\n+44 9681 3480\r\n+44 8522 6619'),
('2017-01-24', 53, 'Abbe Hood', 4, 'Registered', '2016-07-20', '2016-07-22', 262, 3347485, 2700000, '', 10, 2, '-', '+64 22 192 5020 @1,350,000/N'),
('2017-01-24', 54, 'Louis Yoshiwara', 1, 'Registered', '2016-03-27', '2016-03-30', 285, 3688759, 3300471, '', 10, 3, '-', '+81-80-5403-3871'),
('2017-01-24', 55, 'Justine Nobels', 4, 'Registered', '2016-03-25', '2016-03-27', 213, 2710054, 2400000, '', 10, 2, '-', '+61 450 002 773 @1,200,000'),
('2017-01-24', 56, 'Ahmad Al Sitrawi', 1, 'Registered', '2016-02-17', '2016-02-19', 190, 2495305, 2174600, '', 10, 2, '-', '+971 55 647 6796'),
('2017-01-24', 57, 'Kevin Clayette', 2, 'Registered', '2016-02-13', '2016-02-15', 194, 2550246, 2300000, '', 10, 2, '-', '+61 416 424 599 @1,150,000'),
('2017-01-24', 58, 'Michael Carter', 9, 'Registered', '2016-02-12', '2016-02-15', 320, 4206592, 3600000, '', 10, 3, '-', '+65 9646 6601 @1,200,000'),
('2017-01-24', 59, 'Erna Sharil', 9, 'Registered', '2016-02-07', '2016-02-12', 533, 7047501, 6000000, '', 10, 5, '-', '+65 9648 5703 @1,200,000/N'),
('2017-01-24', 60, 'LÃ¹ nÃ¡n xÃº', 1, 'Registered', '2016-01-21', '2016-01-24', 247, 3314496, 3314496, '', 10, 3, '-', '+86 180 7111 8709'),
('2017-01-24', 61, 'LÃ¹ nÃ¡n xÃº', 1, 'Canceled', '2016-01-21', '2016-01-24', 247, 0, 0, '', 10, 3, '-', '+86 180 7111 8709'),
('2017-01-24', 62, 'ANGETTE KING', 4, 'Registered', '2016-10-13', '2016-10-17', 419, 5325300, 4800000, '', 12, 4, 'ang_ette@live.com', '+61 439 933 029 @1,200,000/N'),
('2017-01-24', 63, 'Mana Simpson', 4, 'Registered', '2016-06-23', '2016-06-28', 523, 6845016, 6000000, '', 12, 5, 'simpson.mana@yahoo.com', '0061413178354 @1,200,000'),
('2017-01-24', 64, 'Jeda Harvey', 4, 'Registered', '2016-04-29', '2016-05-01', 209, 3015192, 2400000, '', 10, 2, 'jeda.harvey@hotmail.com', '@1,200,000'),
('2017-01-25', 65, 'Jason', 4, 'Registered', '2016-08-10', '2016-08-19', 1178, 15050048, 12150000, '', 12, 9, 'jason@grissom.com.au', '0402929469 @3,50,000/N'),
('2017-01-25', 66, 'Benjamin Cook', 2, 'Registered', '2016-08-09', '2016-08-13', 523, 6671395, 5400000, '', 11, 4, 'lil.bennn@hotmail.com', '+61 458545236'),
('2017-01-25', 67, 'Michael Sunhong Cheng', 10, 'Registered', '2016-07-21', '2016-07-24', 79, 1004652, 0, '', 12, 3, '-', 'Honeymoon Private Villa at double 6 seminyak'),
('2017-01-25', 68, 'Teena Cappa', 10, 'Registered', '2016-05-04', '2016-05-14', 190, 2130672, 0, '', 12, 10, '-', 'Imperial 1 Bedroom villa 5 minute to the '),
('2017-01-25', 69, 'teighan rhodes', 10, 'Registered', '2016-01-21', '2016-01-24', 204, 2743149, 0, '', 12, 3, '-', '2BR private pool villa Close to the beach unuk membangun'),
('2017-01-25', 70, ' Jack Taylor', 1, 'Registered', '2016-06-27', '2016-06-30', 276, 3539355, 3150000, '', 11, 3, 'jack.graham.taylor@hotmail.com.au', '+61431083067 @1,050,000/N'),
('2017-01-25', 71, 'Xinchen Z', 10, 'Registered', '2016-01-13', '2016-01-14', 48, 653472, 0, '', 10, 1, '-', 'cancelation fee'),
('2017-01-25', 72, 'Anna D', 10, 'Registered', '2015-10-19', '2015-10-20', 39, 520046, 0, '', 10, 1, '', '1 BR private Pol Villa Cls seminyak'),
('2017-02-07', 73, 'Fleur Aussoleil', 4, 'Registered', '2017-02-14', '2017-02-15', 108, 1383370, 1000000, '', 11, 1, 'fleur.aussoleil@yahoo.fr', '+330660 5916 71'),
('2017-02-27', 74, 'Santono Saleh ksatriawisesa', 1, 'Registered', '2017-03-09', '2017-03-10', 98, 1274898, 1000000, '', 10, 1, 'santono-8nmf9e7g07jvvay0@guest.airbnb.com', 'ctr: 1Jt\r\ncp:081296551255'),
('2017-04-02', 76, 'Louise Turner', 4, 'Confirmed', '2017-04-30', '2017-05-02', 198, 2574000, 1100000, '', 10, 2, 'louise-e6yecjlqxuthfd6b@guest.airbnb.com', 'Pick up 20$,  QZ541 8 am'),
('2017-03-31', 75, 'Raymond Henare', 2, 'Registered', '2017-04-07', '2017-04-10', 302, 3913054, 3000000, '', 11, 3, 'raynz2@windowslive.com', 'Onfirm by arsita, rate:1jt/night\r\nPh:+61 487 093 978'),
('2017-04-04', 77, 'Gizem Karabulut ', 4, 'Confirmed', '2017-08-07', '2017-08-23', 2095, 26397000, 21600000, '', 10, 16, 'gizem-dplvxd1f9e9o1jvl@guest.airbnb.com', 'Rate:1,350,000/mlm, free pick-up ');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomId` int(8) NOT NULL,
  `propertyId` int(5) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `description` longtext,
  `typeOfRoom` varchar(60) DEFAULT NULL,
  `rateLowSeason` int(12) DEFAULT NULL,
  `rateHightSeason` int(12) DEFAULT NULL,
  `ratePeakSeason` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomId`, `propertyId`, `name`, `description`, `typeOfRoom`, `rateLowSeason`, `rateHightSeason`, `ratePeakSeason`) VALUES
(1, 1, 'imperial 1 bedroom', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sob`
--

CREATE TABLE `sob` (
  `sob_id` int(6) NOT NULL,
  `name` varchar(300) NOT NULL,
  `url` varchar(200) NOT NULL,
  `contact` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cs` varchar(200) NOT NULL,
  `other` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob`
--

INSERT INTO `sob` (`sob_id`, `name`, `url`, `contact`, `email`, `cs`, `other`) VALUES
(10, 'Airbnb', 'https://www.airbnb.co.id/dashboard', 'none', '-', '-', '-'),
(11, 'homeaway', 'http://www.homeaway.co.id/login', 'firman', 'firman@homeaway.com', '-', '-'),
(12, 'Tripadvisor', 'https://rentals.tripadvisor.com/inbox', 'none', '-', '-', '-'),
(13, 'Web', 'https://www.travel.tobeasy.com', '-', '-', '-', '-'),
(14, 'Direct', '-', '-', '-', '-', 'booking by email, phone,wa ect');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`propertyID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`resId`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomId`),
  ADD KEY `roomID` (`roomId`),
  ADD KEY `roomID_2` (`roomId`);

--
-- Indexes for table `sob`
--
ALTER TABLE `sob`
  ADD PRIMARY KEY (`sob_id`),
  ADD UNIQUE KEY `sob_id` (`sob_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `propertyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `resId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sob`
--
ALTER TABLE `sob`
  MODIFY `sob_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
