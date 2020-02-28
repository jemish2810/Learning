-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2020 at 06:33 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CSV_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `MyGuests`
--

CREATE TABLE `MyGuests` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `MyGuests`
--

INSERT INTO `MyGuests` (`id`, `firstname`, `lastname`, `email`, `reg_date`) VALUES
(1, 'Jacinthe', 'Kessler', 'sfisher@example.org', '1990-04-05 20:31:21'),
(2, 'Dylan', 'Wisoky', 'jimmie.zulauf@example.com', '2003-04-21 17:02:21'),
(3, 'Rene', 'Hintz', 'russel.madisyn@example.org', '2014-09-21 23:01:54'),
(4, 'Zechariah', 'Schmitt', 'gmills@example.net', '2000-10-29 14:24:10'),
(5, 'Connie', 'Walter', 'mwiza@example.com', '2003-01-18 15:00:40'),
(6, 'Gregg', 'Marks', 'kroberts@example.org', '2004-05-24 23:01:07'),
(7, 'Shemar', 'Bode', 'chester.shields@example.org', '1974-08-15 17:59:07'),
(8, 'Lacy', 'McGlynn', 'fsawayn@example.net', '2017-02-13 18:33:00'),
(9, 'Leo', 'Willms', 'conn.tierra@example.org', '1985-07-06 22:53:38'),
(10, 'Vicky', 'Reynolds', 'nicolas43@example.com', '1972-07-16 20:02:52'),
(11, 'Jairo', 'Murphy', 'gwelch@example.org', '2000-05-30 05:31:07'),
(12, 'Harmony', 'Rutherford', 'abayer@example.org', '1991-04-01 16:29:28'),
(13, 'Justice', 'Volkman', 'qwaters@example.com', '1994-10-15 03:28:26'),
(14, 'Breanne', 'Daniel', 'yundt.kelley@example.com', '2016-01-31 18:11:40'),
(15, 'Porter', 'Koch', 'mayer.russ@example.com', '1985-07-01 06:41:03'),
(16, 'Kaci', 'Toy', 'omertz@example.net', '2018-10-24 02:03:06'),
(17, 'Justina', 'Tromp', 'maymie88@example.com', '2012-04-20 07:26:05'),
(18, 'Emanuel', 'Huel', 'hoppe.shawn@example.org', '1997-07-07 17:51:11'),
(19, 'Terrence', 'Dietrich', 'mraz.weston@example.com', '1987-08-03 02:07:08'),
(20, 'Kathleen', 'Walsh', 'keira70@example.net', '2001-12-17 00:26:16'),
(21, 'Elvie', 'Haag', 'umurray@example.net', '2005-02-16 21:49:55'),
(22, 'Gaylord', 'Marquardt', 'zmurray@example.com', '1971-06-08 12:05:10'),
(23, 'Olga', 'Wuckert', 'emmanuel20@example.org', '1998-08-20 22:08:51'),
(24, 'Glennie', 'Williamson', 'ferne.harber@example.com', '1992-12-01 18:56:15'),
(25, 'Uriah', 'Schaefer', 'wisoky.delphine@example.org', '2005-02-03 20:26:03'),
(26, 'Eleazar', 'Ullrich', 'giovanna32@example.org', '2019-04-25 14:34:55'),
(27, 'Ramiro', 'McClure', 'oreichel@example.net', '1976-08-31 00:07:07'),
(28, 'Juwan', 'Jerde', 'brakus.delpha@example.net', '2002-01-25 08:28:46'),
(29, 'Laverne', 'Gerhold', 'alda44@example.com', '1997-03-15 04:54:21'),
(30, 'Gene', 'Cassin', 'ubalistreri@example.net', '2017-04-11 05:25:00'),
(31, 'Reina', 'Welch', 'vthiel@example.net', '2002-06-11 07:39:51'),
(32, 'Kiera', 'Schuppe', 'wauer@example.net', '1972-10-17 21:09:48'),
(33, 'Robin', 'Eichmann', 'obrakus@example.org', '2001-07-25 03:52:56'),
(34, 'Aiden', 'Cassin', 'jeremie.shanahan@example.net', '2016-12-18 08:17:37'),
(35, 'Gaylord', 'Stracke', 'd\'amore.wilfrid@example.org', '2013-12-15 23:37:06'),
(36, 'Tate', 'Hills', 'arne.daniel@example.org', '1998-01-20 21:26:32'),
(37, 'Hettie', 'Funk', 'ckuphal@example.com', '1985-04-25 21:49:23'),
(38, 'Tara', 'Schuppe', 'hope.mayert@example.com', '2013-03-07 02:47:50'),
(39, 'Terence', 'Kihn', 'emard.jordyn@example.org', '1980-08-22 14:58:06'),
(40, 'Etha', 'Lesch', 'quigley.garrick@example.net', '1985-07-17 20:21:08'),
(41, 'Camryn', 'Buckridge', 'niko55@example.org', '1976-05-29 02:51:57'),
(42, 'Ruth', 'Konopelski', 'ashlee.smith@example.net', '2019-06-10 03:04:37'),
(43, 'Bernita', 'Halvorson', 'swaniawski.hosea@example.net', '1987-08-21 20:00:14'),
(44, 'Cole', 'Berge', 'dchristiansen@example.net', '2001-07-31 17:04:51'),
(45, 'Willard', 'Greenholt', 'devonte.osinski@example.org', '2015-10-24 10:19:15'),
(46, 'Paris', 'Swift', 'luisa.dare@example.org', '1973-02-05 08:54:24'),
(47, 'Lola', 'McKenzie', 'casandra.hudson@example.org', '1983-09-13 19:04:09'),
(48, 'Selina', 'Auer', 'ygreenfelder@example.com', '1978-09-24 20:35:16'),
(49, 'Jamil', 'Veum', 'jaren.roberts@example.org', '2003-04-20 01:45:06'),
(50, 'Matilda', 'Abernathy', 'stacy.thiel@example.org', '1979-09-07 20:54:35'),
(51, 'Jacques', 'Bogan', 'qjohnson@example.org', '2012-05-11 19:51:25'),
(52, 'Lawrence', 'Koss', 'bemard@example.net', '2014-05-23 10:34:18'),
(53, 'Tyrel', 'Hackett', 'dena.bernier@example.com', '2016-10-29 23:28:33'),
(54, 'Robyn', 'Beer', 'piper94@example.net', '1993-12-24 19:16:31'),
(55, 'Walker', 'Weissnat', 'vwitting@example.net', '1981-07-26 01:52:02'),
(56, 'Madelynn', 'Brekke', 'ashlee50@example.com', '2011-03-24 20:40:59'),
(57, 'Royal', 'Harvey', 'garrick10@example.com', '2011-06-11 19:21:41'),
(58, 'Ford', 'Emmerich', 'deven53@example.net', '2004-08-06 18:57:49'),
(59, 'Isabelle', 'Pollich', 'lynn09@example.com', '1971-05-24 22:12:58'),
(60, 'Sabina', 'Bashirian', 'wolf.monique@example.com', '2007-11-16 02:21:52'),
(61, 'Doyle', 'Beahan', 'toy.zoie@example.net', '2009-11-04 16:28:01'),
(62, 'Linnie', 'Mitchell', 'owen53@example.com', '1975-10-13 21:26:54'),
(63, 'Hope', 'Hilpert', 'abby54@example.net', '2006-10-05 20:20:05'),
(64, 'Celestine', 'Terry', 'mellie57@example.com', '1975-10-08 02:41:29'),
(65, 'Toby', 'Fadel', 'cathryn.kreiger@example.net', '1990-07-07 12:19:47'),
(66, 'Joe', 'Conroy', 'botsford.alvera@example.net', '1998-08-19 18:23:29'),
(67, 'Tanya', 'Johnson', 'wuckert.tatyana@example.net', '2015-11-07 16:30:35'),
(68, 'Elna', 'Ebert', 'pwaters@example.com', '1971-07-07 12:56:14'),
(69, 'Minnie', 'Stamm', 'wunsch.jermain@example.net', '2018-07-31 18:51:26'),
(70, 'Keenan', 'Kiehn', 'anderson.kaden@example.org', '2006-05-02 20:52:51'),
(71, 'Sylvia', 'Koelpin', 'dcarroll@example.org', '1994-03-10 12:43:27'),
(72, 'Magdalena', 'Treutel', 'uriel91@example.org', '2018-11-05 02:14:06'),
(73, 'Jaydon', 'Fay', 'ledner.vito@example.net', '1989-04-24 18:09:58'),
(74, 'Jazmyn', 'Shanahan', 'wuckert.tina@example.net', '2020-01-02 08:24:02'),
(75, 'Geovanni', 'Olson', 'akrajcik@example.org', '1972-02-21 22:15:41'),
(76, 'Trenton', 'Medhurst', 'torp.amara@example.com', '2010-07-15 09:03:24'),
(77, 'Nelda', 'Tromp', 'qbruen@example.org', '1970-12-18 00:55:58'),
(78, 'Hope', 'Champlin', 'tobin90@example.net', '2010-11-02 23:06:22'),
(79, 'Lou', 'Simonis', 'zdeckow@example.com', '2004-06-18 17:06:59'),
(80, 'Laurie', 'Morar', 'mmorar@example.net', '1973-04-05 14:14:56'),
(81, 'Brayan', 'Hansen', 'kobe.hettinger@example.net', '2014-05-11 20:45:37'),
(82, 'Tomas', 'Harber', 'dahlia36@example.org', '2005-10-10 16:22:06'),
(83, 'Aric', 'White', 'jschimmel@example.net', '1988-01-03 02:51:08'),
(84, 'Liliane', 'Greenfelder', 'vcorwin@example.org', '2008-12-29 22:26:03'),
(85, 'Hanna', 'Weber', 'fhomenick@example.com', '2019-12-28 23:09:58'),
(86, 'Donnie', 'Waelchi', 'nborer@example.com', '2006-11-20 13:45:06'),
(87, 'Bo', 'Mitchell', 'kenna62@example.net', '2017-08-01 04:40:33'),
(88, 'Reinhold', 'Herman', 'maggio.jermey@example.org', '1998-11-24 05:28:09'),
(89, 'Laron', 'Kilback', 'ngreen@example.org', '2018-02-26 06:24:46'),
(90, 'Ted', 'Hansen', 'losinski@example.com', '1985-06-02 09:24:59'),
(91, 'Rocio', 'Gusikowski', 'osbaldo28@example.org', '1997-12-09 02:30:52'),
(92, 'Dayana', 'Bashirian', 'sdooley@example.net', '1985-04-05 18:59:08'),
(93, 'Ahmad', 'Kemmer', 'cummings.jamaal@example.com', '2008-11-26 23:53:05'),
(94, 'Clifford', 'Bins', 'stokes.gideon@example.com', '1997-10-29 02:26:49'),
(95, 'Gino', 'Koss', 'twila.sanford@example.org', '1972-01-17 11:38:21'),
(96, 'Dayton', 'Bashirian', 'qgerhold@example.net', '2006-04-03 20:51:19'),
(97, 'General', 'Armstrong', 'heidenreich.iva@example.net', '1991-07-10 11:14:53'),
(98, 'Leonora', 'Kulas', 'royce.stracke@example.com', '2002-05-25 19:41:05'),
(99, 'Alf', 'Eichmann', 'ghegmann@example.com', '1981-04-27 18:44:35'),
(100, 'Jamison', 'Ledner', 'stefanie.balistreri@example.net', '2008-03-09 04:14:26'),
(101, 'abc', 'efg', 'abc@gmail.com', '2020-01-23 12:22:57'),
(102, 'abc', 'efg', 'abc@gmail.com', '2020-01-23 12:22:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `MyGuests`
--
ALTER TABLE `MyGuests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `MyGuests`
--
ALTER TABLE `MyGuests`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
