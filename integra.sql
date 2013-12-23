-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 17, 2013 at 01:16 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `integra`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `staffid` int(32) NOT NULL,
  `activity` longtext NOT NULL,
  `date` int(32) NOT NULL,
  `patient` int(32) NOT NULL,
  `relative` int(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `staffid`, `activity`, `date`, `patient`, `relative`) VALUES
(1, 1, 'Directed Oyelaja Adebambo with hospital number  to the nursing station for Appointment', 1369660536, 0, 0),
(2, 1, 'Directed Koded Michael with hospital number 09776 to the nursing station for Appointment', 1369675308, 4, 0),
(3, 1, 'Directed Yehia Adham with hospital number 0988 to the nursing station for Appointment', 1369676097, 3, 0),
(4, 1, 'Directed Oyelaja Adebambo with hospital number 0099 to the nursing station for Appointment', 1369677826, 1, 0),
(5, 1, 'Directed Yehia Adham with hospital number 0988 to the nursing station for Appointment', 1369677882, 3, 0),
(6, 1, 'Directed Koded Michael with hospital number 09776 to the nursing station for Appointment', 1369678585, 4, 0),
(7, 1, 'Directed Oyelaja Adebambo with hospital number 0099 to the nursing station for Appointment', 1369786840, 1, 0),
(8, 1, 'Directed Oyelaja Adebambo with hospital number 0099 to the nursing station for Appointment', 1369994887, 1, 0),
(9, 1, 'Attended to Oyelaja Adebambo, who was directed from the reception for Appointment and had waited for 34 minutes ago.', 1369996978, 1, 0),
(10, 1, 'Attended to Oyelaja Adebambo, who was directed from the reception for Appointment and had waited for 34 minutes ago.', 1369997233, 1, 0),
(11, 1, 'Took vital signs for Oyelaja Adebambo', 1369997233, 1, 0),
(12, 1, 'Took vital signs for Oyelaja Adebambo', 1369997953, 1, 0),
(13, 1, 'Added a medical record for Agunbiade Kolapo with hospital number 00098 to the medical records', 1369998759, 5, 0),
(14, 1, 'Directed Agunbiade Kolapo with hospital number 00098 to the nursing station for Appointment', 1369998799, 5, 0),
(15, 1, 'Attended to Agunbiade Kolapo, who was directed from the reception for Appointment and had waited for 11 seconds ago.', 1369998839, 5, 0),
(16, 1, 'Attended to Agunbiade Kolapo, who was directed from the reception for Appointment and had waited for 11 seconds ago.', 1369998908, 5, 0),
(17, 1, 'Took vital signs for Agunbiade Kolapo', 1369998908, 5, 0),
(18, 1, 'Added a medical record for Opara Chibuzor with hospital number 0098822 to the medical records', 1370009828, 6, 0),
(19, 1, 'Directed Opara Chibuzor with hospital number 0098822 to the nursing station for Appointment', 1370009935, 6, 0),
(20, 1, 'Attended to Opara Chibuzor, who was directed from the reception for Appointment and had waited for 1 minute ago.', 1370010038, 6, 0),
(21, 1, 'Attended to Opara Chibuzor, who was directed from the reception for Appointment and had waited for 1 minute ago.', 1370010174, 6, 0),
(22, 1, 'Took vital signs for Opara Chibuzor', 1370010174, 6, 0),
(23, 1, 'Updated medical record for Opara Chibuzor', 1370010498, 6, 0),
(24, 1, 'Updated medical record for Opara Chibuzor', 1370010522, 6, 0),
(25, 1, 'Took vital signs for Opara Chibuzor', 1370013996, 6, 0),
(26, 1, 'Updated medical record for Opara Chibuzor', 1370207763, 6, 0),
(27, 1, 'Updated medical record for Opara Chibuzor', 1370215735, 6, 0),
(28, 1, 'Updated medical record for Opara Chibuzor', 1370216035, 6, 0),
(29, 1, 'Took vital signs for Opara Chibuzor', 1370246296, 6, 0),
(30, 1, 'Added a medical record for Adefemi Babatunde with hospital number 098373 to the medical records', 1370267484, 7, 0),
(31, 1, 'Directed Adefemi Babatunde with hospital number 098373 to the nursing station for Appointment', 1370267493, 7, 0),
(32, 1, 'Attended to Adefemi Babatunde, who was directed from the reception for Appointment and had waited for 30 seconds ago.', 1370267573, 7, 0),
(33, 1, 'Attended to Adefemi Babatunde, who was directed from the reception for Appointment and had waited for 30 seconds ago.', 1370267813, 7, 0),
(34, 1, 'Updated medical record for Adefemi Babatunde', 1370267813, 7, 0),
(35, 1, 'Took vital signs for Adefemi Babatunde', 1370267947, 7, 0),
(36, 1, 'Updated medical record for Adefemi Babatunde', 1370270956, 7, 0),
(37, 1, 'Took vital signs for Adefemi Babatunde', 1370271148, 7, 0),
(38, 1, 'Took vital signs for Adefemi Babatunde', 1370271205, 7, 0),
(39, 1, 'Updated medical record for Adefemi Babatunde', 1370271496, 7, 0),
(40, 1, 'Took vital signs for Adefemi Babatunde', 1370272167, 7, 0),
(41, 1, 'Took vital signs for Adefemi Babatunde', 1370272262, 7, 0),
(42, 1, 'Took vital signs for Adefemi Babatunde', 1370272799, 7, 0),
(43, 1, 'Added a medical record for Ogun Tolulope with hospital number 0983737 to the medical records', 1370287604, 8, 0),
(44, 1, 'Directed Ogun Tolulope with hospital number 0983737 to the nursing station for Appointment', 1370287643, 8, 0),
(45, 1, 'Attended to Ogun Tolulope, who was directed from the reception for Appointment and had waited for 31 seconds ago.', 1370287695, 8, 0),
(46, 1, 'Attended to Ogun Tolulope, who was directed from the reception for Appointment and had waited for 31 seconds ago.', 1370288001, 8, 0),
(47, 1, 'Updated medical record for Ogun Tolulope', 1370288001, 8, 0),
(48, 1, 'Directed Ogun Tolulope with hospital number 0983737 to the nursing station for Appointment', 1370289329, 8, 0),
(49, 1, 'Attended to Ogun Tolulope, who was directed from the reception for Appointment and had waited for 23 seconds ago.', 1370289359, 8, 0),
(50, 1, 'Attended to Ogun Tolulope, who was directed from the reception for Appointment and had waited for 23 seconds ago.', 1370289375, 8, 0),
(51, 1, 'Took vital signs for Ogun Tolulope', 1370289405, 8, 0),
(52, 1, 'Updated medical record for Ogun Tolulope', 1370289455, 8, 0),
(53, 1, 'Added a medical record for Otie Chuks with hospital number 9383838 to the medical records', 1370352946, 9, 0),
(54, 1, 'Directed Otie Chuks with hospital number 9383838 to the nursing station for Appointment', 1370352971, 9, 0),
(55, 1, 'Directed Otie Chuks with hospital number 9383838 to the nursing station for Appointment', 1370363035, 9, 0),
(56, 1, 'Attended to Otie Chuks, who was directed from the reception for Appointment and had waited for 5 seconds ago.', 1370363053, 9, 0),
(57, 1, 'Attended to Otie Chuks, who was directed from the reception for Appointment and had waited for 5 seconds ago.', 1370363086, 9, 0),
(58, 1, 'Updated medical record for Otie Chuks', 1370363086, 9, 0),
(59, 1, 'Added a medical record for Yehia Adham with hospital number 09417 to the medical records', 1370445168, 10, 0),
(60, 1, 'Directed Yehia Adham with hospital number 09417 to the nursing station for Appointment', 1370445523, 10, 0),
(61, 1, 'Attended to Yehia Adham, who was directed from the reception for Appointment and had waited for 2 minutes ago.', 1370445695, 10, 0),
(62, 1, 'Attended to Yehia Adham, who was directed from the reception for Appointment and had waited for 2 minutes ago.', 1370445770, 10, 0),
(63, 1, 'Updated medical record for Yehia Adham', 1370445770, 10, 0),
(64, 1, 'Directed   with hospital number  to the Doctor', 1370893031, 7, 0),
(65, 1, 'Directed   with hospital number  to the Doctor', 1370893269, 7, 0),
(66, 1, 'Attended to Adefemi Babatunde, who was directed from the nursing station by ADEBAMBO OYELAJA.', 1370902844, 7, 0),
(67, 1, 'Added a medical record for Igbarumah Steven with hospital number 00884 to the medical records', 1371224358, 11, 0),
(68, 1, 'Directed Igbarumah Steven with hospital number 00884 to the nursing station for Appointment', 1371224426, 11, 0),
(69, 1, 'Attended to Igbarumah Steven, who was directed from the reception for Appointment and had waited for 20 seconds ago.', 1371224467, 11, 0),
(70, 1, 'Attended to Igbarumah Steven, who was directed from the reception for Appointment and had waited for 20 seconds ago.', 1371224504, 11, 0),
(71, 1, 'Updated medical record for Igbarumah Steven', 1371224504, 11, 0),
(72, 1, 'Directed   with hospital number  to the Doctor', 1371224540, 11, 0),
(73, 1, 'Attended to Igbarumah Steven, who was directed from the nursing station by ADEBAMBO OYELAJA and had waited for 17 seconds ago.', 1371224569, 11, 0),
(74, 1, 'Added a medical record for Onanuga Oluwatobiloba with hospital number 09876 to the medical records', 1371285992, 12, 0),
(75, 1, 'Directed Onanuga Oluwatobiloba with hospital number 09876 to the nursing station for Appointment', 1371286032, 12, 0),
(76, 1, 'Attended to Onanuga Oluwatobiloba, who was directed from the reception for Appointment and had waited for 21 seconds ago.', 1371286101, 12, 0),
(77, 1, 'Attended to Onanuga Oluwatobiloba, who was directed from the reception for Appointment and had waited for 21 seconds ago.', 1371286209, 12, 0),
(78, 1, 'Updated medical record for Onanuga Oluwatobiloba', 1371286209, 12, 0),
(79, 1, 'Directed   with hospital number  to the Doctor', 1371286247, 12, 0),
(80, 1, 'Attended to Onanuga Oluwatobiloba, who was directed from the nursing station by ADEBAMBO OYELAJA and had waited for 11 seconds ago.', 1371286267, 12, 0),
(81, 1, 'Added a medical record for Balogun Tola with hospital number 088822 to the medical records', 1371723194, 13, 0),
(82, 1, 'Directed Balogun Tola with hospital number 088822 to the nursing station for Appointment', 1371723212, 13, 0),
(83, 1, 'Attended to Balogun Tola, who was directed from the reception for Appointment and had waited for 14 seconds ago.', 1371723245, 13, 0),
(84, 1, 'Attended to Balogun Tola, who was directed from the reception for Appointment and had waited for 14 seconds ago.', 1371723265, 13, 0),
(85, 1, 'Updated medical record for Balogun Tola', 1371723265, 13, 0),
(86, 1, 'Directed   with hospital number  to the Doctor', 1371723287, 13, 0),
(87, 1, 'Attended to Balogun Tola, who was directed from the nursing station by ADEBAMBO OYELAJA and had waited for 11 seconds ago.', 1371723309, 13, 0),
(88, 1, 'Added a medical record for ND LOMASKY with hospital number 099833 to the medical records', 1372071750, 14, 0),
(89, 1, 'Directed ND LOMASKY with hospital number 099833 to the nursing station for Appointment', 1372071779, 14, 0),
(90, 1, 'Attended to ND LOMASKY, who was directed from the reception for Appointment and had waited for 16 seconds ago.', 1372071830, 14, 0),
(91, 1, 'Attended to ND LOMASKY, who was directed from the reception for Appointment and had waited for 16 seconds ago.', 1372071857, 14, 0),
(92, 1, 'Updated medical record for ND LOMASKY', 1372071857, 14, 0),
(93, 1, 'Directed   with hospital number  to the Doctor', 1372071873, 14, 0),
(94, 1, 'Attended to ND LOMASKY, who was directed from the nursing station by ADEBAMBO OYELAJA and had waited for 7 seconds ago.', 1372071889, 14, 0),
(95, 1, 'Directed Oyelaja Adebambo with hospital number 0099 to the nursing station for Appointment', 1372961971, 1, 0),
(96, 1, 'Attended to Oyelaja Adebambo, who was directed from the reception for Appointment and had waited for 19 seconds ago.', 1372962011, 1, 0),
(97, 1, 'Attended to Oyelaja Adebambo, who was directed from the reception for Appointment and had waited for 19 seconds ago.', 1372962192, 1, 0),
(98, 1, 'Updated medical record for Oyelaja Adebambo', 1372962193, 1, 0),
(99, 1, 'Directed   with hospital number  to the Doctor', 1372962219, 1, 0),
(100, 1, 'Attended to Oyelaja Adebambo, who was directed from the nursing station by ADEBAMBO OYELAJA and had waited for 11 seconds ago.', 1372962243, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctorwaiting`
--

CREATE TABLE IF NOT EXISTS `doctorwaiting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patientid` int(11) NOT NULL,
  `nurseid` int(11) NOT NULL,
  `timer` int(11) NOT NULL,
  `relative` int(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `surname` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `cnumber` int(255) NOT NULL,
  `telenum` int(255) NOT NULL,
  `date` int(32) NOT NULL,
  `hospitalnumber` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `smoking` varchar(255) NOT NULL,
  `alcohol` varchar(255) NOT NULL,
  `tobacco` varchar(255) NOT NULL,
  `married` varchar(255) NOT NULL,
  `daughters` varchar(255) NOT NULL,
  `sons` varchar(255) NOT NULL,
  `allergy` varchar(255) NOT NULL,
  `asthma` varchar(255) NOT NULL,
  `polio` varchar(255) NOT NULL,
  `ear disease` varchar(255) NOT NULL,
  `veneral disease` varchar(255) NOT NULL,
  `heart disease` varchar(255) NOT NULL,
  `sugery undergone` varchar(255) NOT NULL,
  `kidney` varchar(255) NOT NULL,
  `diabetes` varchar(255) NOT NULL,
  `hbp` varchar(255) NOT NULL,
  `epilepsy(fits)` varchar(255) NOT NULL,
  `psychiatric illness` varchar(255) NOT NULL,
  `bleeding disorders` varchar(255) NOT NULL,
  `major injuries` longtext NOT NULL,
  `tb` varchar(255) NOT NULL,
  `additional comments` longtext NOT NULL,
  `Family Asthma` varchar(255) NOT NULL,
  `Family Cardiac Disease` varchar(255) NOT NULL,
  `Family Hbp` varchar(255) NOT NULL,
  `Family TB` varchar(255) NOT NULL,
  `Family Diabetes` varchar(255) NOT NULL,
  `Family Cancer` varchar(255) NOT NULL,
  `Family Psychiatric Illness` varchar(255) NOT NULL,
  `Family Any Other Diseases` longtext NOT NULL,
  `temperature` varchar(255) NOT NULL,
  `pulse` varchar(255) NOT NULL,
  `blood` varchar(255) NOT NULL,
  `resp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `surname`, `other`, `type`, `cnumber`, `telenum`, `date`, `hospitalnumber`, `company`, `dob`, `gender`, `height`, `weight`, `smoking`, `alcohol`, `tobacco`, `married`, `daughters`, `sons`, `allergy`, `asthma`, `polio`, `ear disease`, `veneral disease`, `heart disease`, `sugery undergone`, `kidney`, `diabetes`, `hbp`, `epilepsy(fits)`, `psychiatric illness`, `bleeding disorders`, `major injuries`, `tb`, `additional comments`, `Family Asthma`, `Family Cardiac Disease`, `Family Hbp`, `Family TB`, `Family Diabetes`, `Family Cancer`, `Family Psychiatric Illness`, `Family Any Other Diseases`, `temperature`, `pulse`, `blood`, `resp`) VALUES
(1, 'Oyelaja', 'Adebambo', 'PRIVATE', 0, 818816723, 1369386342, '0099', 'CYBERNATOR SOLUTIONS INC', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Eye problems', '11', '23', '87', '67'),
(3, 'Yehia', 'Adham', 'PRIVATE', 0, 2147483647, 1369407245, '0988', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Koded', 'Michael', 'PRIVATE', 0, 2147483647, 1369675199, '09776', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Agunbiade', 'Kolapo', 'PRIVATE', 0, 2147483647, 1369998759, '00098', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '36', '56', '89', '78'),
(6, 'Opara', 'Chibuzor', 'PRIVATE', 0, 2147483647, 1370009828, '0098822', '', '09/12/1988', 'MALE', '', '', 'Yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'No', '', '', '', '', '', '', '', '12', '65', '120/80', '09'),
(7, 'Adefemi', 'Babatunde', 'PRIVATE', 0, 2147483647, 1370267484, '098373', '', '09/25/1970', 'MALE', '180', '60', 'Yes', 'Yes', '', 'Yes', '', '', 'None', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'Yes', '', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', '', 'None', '37', '80', '118/78', '70'),
(8, 'Ogun', 'Tolulope', 'PRIVATE', 0, 2147483647, 1370287604, '0983737', '', '01/28/1970', 'FEMALE', '178', '70', 'No', 'No', '', 'No', '', '', 'Dust, smoke', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', 'Yes', 'No', 'No', 'No', 'No', 'Yes', '', '', '37', '90', '118/78', '188'),
(9, 'Otie', 'Chuks', 'PRIVATE', 0, 983737373, 1370352946, '9383838', '', '', '', '', '', 'Yes', 'Yes', '', 'No', '', '', 'None', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'Yehia', 'Adham', 'PRIVATE', 0, 2147483647, 1370445168, '09417', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'Igbarumah', 'Steven', 'PRIVATE', 0, 833333, 1371224358, '00884', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'Onanuga', 'Oluwatobiloba', 'PRIVATE', 0, 988888888, 1371285992, '09876', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'Balogun', 'Tola', 'PRIVATE', 0, 2147483647, 1371723194, '088822', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'ND', 'LOMASKY', 'PRIVATE', 0, 8, 1372071749, '099833', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `staffnumber` int(32) NOT NULL,
  `accesscode` varchar(255) NOT NULL,
  `staffname` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `lastvist` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `staffnumber`, `accesscode`, `staffname`, `photo`, `lastvist`) VALUES
(1, 'reception', 1, '5cf1bc1b9a2ada1ae9e2907aae1aefa', 'ADEBAMBO OYELAJA', '', '1372067004');

-- --------------------------------------------------------

--
-- Table structure for table `waiting`
--

CREATE TABLE IF NOT EXISTS `waiting` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `patientid` int(32) NOT NULL,
  `reason` longtext NOT NULL,
  `receptionistid` int(32) NOT NULL,
  `timer` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
