-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 05:30 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vet`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`clientid` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientid`, `name`, `address`, `phone`, `email`, `password`) VALUES
(1, 'Akash', '11 UTA blvd, Arlington , Texas', 2147483647, 'akash@gmail.com', '$2y$10$obx9WSF8RTjMF997rlEDzeBZl8mts./nkARamUgLp1hoFvCz3Oea.'),
(2, 'John Wilson', '32,Summit Avenue, Arlington , Texas32,Summit Avenu', 2147483647, 'johnwilson@gmail.com', '$2y$10$6V7maXfHa5XWvEVnk.p2EOLKDtSeZ2NempHZnln1VSwPBWrWIrUBm'),
(3, 'Ricky Pointing', '232 Greek Row, Arlington , Texas', 2147483647, 'ricky.pointing@gmail.com', '$2y$10$RfUu12wQbWPAMFjDu7uVwOKSqA4o5QxPc1y8uFDWPx2L1FhN/CC9K'),
(4, 'Shane Warne', '12 Greek Row, Arlington , Texas', 2147483647, 'shane_warne@gmail.com', '$2y$10$34ozUfYg42fBMExtHYqHSOKJNowiTz1Hu50yPFzsvqWNFNBIIxWpm'),
(5, 'Monica Das', '42 California street, Arlington , Texas', 2147483647, 'galler_monica@gmail.com', '$2y$10$rGaBG5GIsZas4O0hJ7MTqeo1DMMHAe1ihDEv3ixFUuSbG2EfcKw.W');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `comments` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `comments`) VALUES
('Akash', 'akash@gmail.com', 'I need an appointment to get my dog vaccined'),
('John Wilson', 'johnwilson@gmail.com', 'Are cats treated in your hosiptal'),
('Akash', 'akash@gmail.com', 'Durning my appointment today I was told that my dog needs another checkup. Can you please let me know when I am supposed to visit again'),
('Shane Warne', 'shane_warne@gmail.com', 'My dog is not eating from a two days. Can you please let me know if you are open 24hours'),
('Shane Warne', 'shane_warne@gmail.com', 'Please schedule an appointment at anytime on this wednesday for me. Thanks'),
('Monice Galler', 'galler_monica@gmail.com', 'Do you have any dog which needs adoption?'),
('Akash', 'akash@gmail.com', 'I did not receive the receipt which I was supposed to receive in mail');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE IF NOT EXISTS `pet` (
`petid` int(10) NOT NULL,
  `petname` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`petid`, `petname`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Snake'),
(4, 'Fish'),
(5, 'Lizard'),
(6, 'Bird');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`questionid` int(10) NOT NULL,
  `question` tinytext NOT NULL,
  `answer` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionid`, `question`, `answer`) VALUES
(1, 'What’s different about Thrive pet food?', 'At Thrive we believe that you and your pet are what you eat. So we’ve used our 30+ years of experience of making premium quality food for humans to create a revolutionary ‘real’ pet food with simple, easily recognisable ingredients. We insist on using human-grade cuts of meat or fish, no substitutes and absolutely no ‘animal derivatives’. Our food is completely pure and free from artificial colours, flavours and preservatives, added sugars, wheat, gluten, dairy, soya and GM ingredients (you could say it’s what we leave out that makes us different!).'),
(2, 'What you mean by ‘complete’ food?', '‘Complete’ is a phrase that guarantees our pet food has all the vitamins, minerals and nutrients required for a balanced diet, as per the European Pet Food Industry Federation (FEDIAF) recommended guidelines. '),
(3, 'What does vet-approved mean? ', 'Products have been recommended and sold by vets.'),
(4, 'What are the salt amounts in the range?', 'Do not add salt or sugars to any food.'),
(5, 'When should I change from ‘puppy’ to ‘adult’?', 'There is no hard and fast rule and we think it depends on the breed. Although small breeds live twice as long as very large breeds, the big boys actually take longer to reach their adult body weight. So check with your breeder and/or your vet for guidance.'),
(6, 'Can Fleas Kill a Dog?', 'It’s not just the constant itching that flea bites cause – if left untreated, fleas are capable of reproducing and multiplying rapidly and the more fleas there are, the more blood your dog is losing. Think of it this way: an adult female flea can lay up to 50 eggs per day. And the more fleas that live on our dog, the more blood they suck – a female flea consumed up to 15 times her own body weight in blood daily!');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
`serviceid` int(10) NOT NULL,
  `servicename` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceid`, `servicename`, `description`) VALUES
(1, 'Medical Services', 'We offer state-of-the-art equipment and technology.'),
(2, 'Surgical Services', 'Full range of surgical procedures including orhopedics and emergency surgeries.'),
(3, 'Dental Care', 'A dental exam can determine whether your pet needs preventive dental care such as scaling and polishing.'),
(4, 'House Calls', 'The elderly, physically challenged, and mutiple pet households often find our in-home veterinary service helpftable and convenient.'),
(5, 'Emergencies', 'At least one of our doctors is on call every day and night.');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `clientid` int(10) NOT NULL,
  `serviceid` int(10) NOT NULL,
  `petid` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`clientid`, `serviceid`, `petid`, `date`) VALUES
(1, 2, 1, '2017-11-21'),
(2, 1, 2, '2017-11-21'),
(3, 3, 1, '2017-11-21'),
(4, 5, 6, '2017-11-21'),
(5, 4, 4, '2017-11-21'),
(5, 5, 4, '2017-11-21'),
(5, 1, 4, '2017-11-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`clientid`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
 ADD PRIMARY KEY (`petid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
 ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
 ADD KEY `clientid` (`clientid`), ADD KEY `serviceid` (`serviceid`), ADD KEY `petid` (`petid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
MODIFY `clientid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
MODIFY `petid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `questionid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
MODIFY `serviceid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`clientid`) REFERENCES `client` (`clientid`),
ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`serviceid`) REFERENCES `service` (`serviceid`),
ADD CONSTRAINT `subscription_ibfk_3` FOREIGN KEY (`petid`) REFERENCES `pet` (`petid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
