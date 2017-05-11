-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2017 at 01:13 AM
-- Server version: 5.6.33-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epictech_winya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `permission` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1->success,0->failure',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_name`, `password`, `permission`, `status`) VALUES
(1, 'superadmin', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 2, 1),
(3, 'reporter', 'e10adc3949ba59abbe56e057f20f883e', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `college_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `applied_at` datetime NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `user_id`, `course_id`, `college_id`, `country_id`, `applied_at`, `status`) VALUES
(1, 1, 1, 1, 3, '2016-11-01 17:09:10', 1),
(2, 2, 2, 10, 3, '2016-12-10 00:00:00', 1),
(3, 3, 3, 7, 3, '2016-12-19 11:17:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `college_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `college_name` varchar(255) DEFAULT NULL,
  `college_details` text,
  `founded_year` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `intake` varchar(255) NOT NULL,
  `college_address` text,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`college_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `country_id`, `college_name`, `college_details`, `founded_year`, `type`, `intake`, `college_address`, `status`) VALUES
(1, 3, 'MFH International Institute', 'MFH is an international education group in Wellington New Zealand and SFO, USA, dedicated to offering unique pathways to its students around the world. MFH is accredited and funded by New Zealand government. MFH was established in 2002 by a team of professionals committed to quality education. We are passionate about providing a nurturing environment for students with the purpose of fostering academic excellence. We have built an excellent reputation as a provider of quality teaching & student support services. ', 2002, 'private', 'jan,feb,apr,may\r\n', 'Wellington Campus:\r\n\r\nLevels 3,4&6 Grand Central Tower\r\n76 - 86 Manners Street\r\nWellington CBD 6011, New Zealand\r\n(Reception: Level 6)\r\n\r\nPostal address:\r\nPO Box 24248\r\nWellington 6011, New Zealand', 1),
(2, 4, 'Flinders International Study Centre (FISC), Adelaide, Bedford Park, Australia\r\n', 'The FISC Foundation Program gives students the opportunity to progress to a FISC Diploma or to the undergraduate degree of their choice at Flinders University (upon meeting all necessary entry requirements).', 2013, 'Private', 'feb', 'Bedford Park, Australia', 1),
(3, 4, 'University of Canberra', 'The University of Canberra (UC) is located in Australia’s national capital. Currently there are 2,500 international students fromover 100 different countries, which means UC has a rich and diverse campus culture. With the new Strategic Plan, ‘Breakthrough’, the purpose is to help students develop the strengths and skills needed to make important academic, professional and personal breakthroughs in life. UC aims to be recognised as one of Australia’s most innovative tertiary institutions; world-ranked, with regional, national and international reach by 2018.', 1967, 'Public', 'feb,jan', ' Australia', 1),
(4, 4, 'APM College of Business and Communication, ', 'APM College of Business & Communication is an affiliate of the Think: Education Group, a leading provider of specialised education to the marketing and communications sector. APM, establisjed in 1986, forges strong partnerships with major industry and professional associations and provides its students with a range of higher education and vocational qualifications to suit their chosen career path. \r\n', 1986, 'Private', 'Feb,june', 'Australia', 1),
(5, 4, 'RMIT University\r\n', 'MIT University (officially the Royal Melbourne Institute of Technology) is a global university of technology and design with teaching, learning, research and innovation programs continually updated so that its students, staff and graduates are ready to meet the challenges of the 21st century. RMIT is Australia’s largest tertiary institution and is located in the heart of Melbourne city.', 1887, 'Public', 'Feb,jul', 'Australia', 1),
(6, 4, 'Stanley College', 'Stanley College is a modern and innovative tertiary institution offering careers and university study pathways for domestic and international students. It provides a favourable learning environment that allows creativity and opportunities for students to achieve academic success and personal growth.', 2008, 'Private', 'jan,feb', 'Australia', 1),
(7, 3, 'Waikato Institute of Technology (Wintec)', 'Wintec has been serving Waikato since 1924. Everyday Wintec adds to that rich 90-year history. The milestones Waikato has reached and will continue to achieve is embedded in its rich history and celebrated around the region.', 1924, 'Public', 'Nov', 'Hamilton, New Zealand', 1),
(8, 3, 'Otago Polytechnic', 'Otago Polytechnic is one of New Zealand’s top providers of high quality, career-focused education. We have a long tradition of producing exceptional graduates who are productive, thoughtful and creative members of their chosen profession. Through our experience-based learning and commitment to work towards a sustainable future, our graduates are work-ready, independent and equipped to make a real difference to their communities. ', 1966, 'Public', 'Feb,Mar', 'Dunedin, New Zealand', 1),
(9, 3, 'NorthTec', 'NorthTec is a state-owned institute of technology, adhering to the high educational standards set by the New Zealand Government. It is the region''s largest provider of tertiary education, with campuses and learning centers in Whangarei City, Kerikeri in the Bay of Islands, learning centers in Rawene, on the shores of the Hokianga, Dargaville, Kaikohe, and on the northernmost site in Kaitaia. The programmes offered in NorthTec are highly regarded by New Zealand employers as approved by the New Zealand Qualifications Authority and aids students to obtain qualifications that are internationally recognised. ', 1978, 'Public', 'Jul,feb', 'Whangarei, New Zealand', 1),
(10, 3, 'Unitec Institute of Technology, ', 'Unitec has cross credit relationships with institutions globally including Malaysia and we are renowned for innovation, sustainability and practical, real world learning. This means that our graduates are sought after by employers within New Zealand and internationally.\r\n\r\n', 1976, 'Public', 'Feb,jul', 'Auckland, New Zealand', 1);

-- --------------------------------------------------------

--
-- Table structure for table `college_image`
--

CREATE TABLE IF NOT EXISTS `college_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(45) DEFAULT NULL,
  `flag` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `flag`, `status`) VALUES
(3, 'New Zealand', '30-11-2016-1480505110.jpg', 1),
(4, 'Australia', '30-11-2016-1480505177.jpg', 1),
(5, 'India', '25-01-2017-1485329166', 1),
(6, 'India', '25-01-2017-1485329178', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE IF NOT EXISTS `course_details` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_details` text,
  `course_fees` varchar(255) DEFAULT NULL,
  `course_time` varchar(255) DEFAULT NULL,
  `requirements` text,
  `course intake` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`course_id`, `college_id`, `country_id`, `course_name`, `course_details`, `course_fees`, `course_time`, `requirements`, `course intake`, `status`) VALUES
(1, 1, 3, 'Information Technology', 'nformation technology (IT) is the application of computers and internet to store,study, retrieve, transmit, and manipulate data, or information, often in the context of a business or other enterprise. IT is considered a subset of information and communications technology (ICT)', '100000\r\n\r\n', '2 Years', 'Australia: Year 11 (60% in relevant subjects)\r\nMalaysia: SPM (or forecast) - aggregate of 30 or less across 5 academic subjects\r\nSingapore: Singapore O Levels (or forecast) - aggregate of 30 or less across 5 academic subjects\r\nOr an equivalent qualification', 'aug,sep,oct', 1),
(2, 10, 3, 'Certificate in Applied Technology (Audio-Visual Technician)', 'Audio visual technicians work in a huge range of industries including theatre, stage and screen, as well as outdoor events and concerts. Train as an audio visual technician at Unitec and you’ll get to put your skills into practice working on real film sets and stage productions throughout the year. Unitec’s audio visual technician training is practical and hands-on. You’ll learn how to repair audio visual equipment, find out how theatre systems work, and practice using digital and computer electronics. ', 'NZD 19,350', '1 year', 'All applicants must be at least 16 years of age on the date of the programme''s commencement for the semester in which they wish to enrol (or provide a completed Early Release Exemption form).\r\nFor Level 4 Certificate programmes applicants must have a minimum of 4 years secondary education, and a minimum of 12 NCEA credits at Level 1 in each of at least two subjects, OR a pass in two subjects in New Zealand School Certificate, OR Unitec Certificate in Foundation Studies: Whitinga (Level 2) in a relevant pathway, OR equivalent.', 'Jul', 1),
(3, 7, 3, 'Master of Arts (Visual Arts, Design, and Music)', 'The Master of Arts programme provides students with a postgraduate study which leads towards professional and higher academic practice. This one-year postgraduate programme is ideal for graduates who have completed the Bachelor of Media Arts (Honours) programme, an equivalent qualification, a Postgraduate Diploma or professional practice. ', 'NZD 19,125', '1 year', 'Corresponding Bachelor with Honours degree, or\r\nPostgraduate Diploma with a minimum of a B grade average or equivalent, or\r\nWork-related experience equivalent to a corresponding Bachelor with Honours degree. Candidates will be required to demonstrate a high order of knowledge of their principal subject of study, including analytic writing, or', 'Mar', 1),
(4, 8, 3, 'Bachelor of Nursing - Dunedin Campus', 'Registered nurses may specialise in a variety of practice areas, including medical and surgical, mental health, child health/paediatrics, aged care and primary health care. There is a worldwide demand for registered nurses and a wide range of career options, both within New Zealand and overseas. These include working for hospitals, health centres, community agencies, public health and rest homes. Otago Polytechnic nursing graduates are in high demand due to their high calibre and work-readiness and Maori and Pasifika nurses are particularly sought after.', 'NZD 20,883', '3 years', 'NCEA Level 3 including:\r\nThree subjects - at Level 3 or above, made up of:\r\n14 credits in biology OR chemistry\r\n14 credits in English OR an English language-rich subject\r\n14 credits in one other approved subject\r\nthe remaining credits may come from either achievement or unit standards, and  \r\nLiteracy - 10 credits at Level 2 or above, made up of 5 credits in reading, 5 credits in writing, and\r\nNumeracy - 10 credits at Level 1 or above, made up of specified achievement standards available through a range of subjects OR package of three numeracy unit standards.', 'feb', 1),
(5, 9, 3, 'Certificate in General Farm Skills ', 'On successful completion of this qualification, you will have sufficient skills to enable you to advance in your career, gain employment as a farm worker, and/or lead to higher vocational or full-time training or study at trade certificate level with the Primary Industry Training Organisation as an apprentice. Within the range of units offered, a graduate will have demonstrated an ability to be safe, efficient and consistent while using a specific range of agricultural equipment and processes applying learnt skills under supervision.\r\n\r\n', 'NZD 8,250\r\n', '20 weeks', 'All applicants must:\r\nbe at least 16 years old at the time the programme commences\r\nbe able to read, write, and communicate in English at a basic level\r\nbe physically able to complete the programme specific outcomes\r\nApplicants for whom English is not a first language must have and IELTS score of 5 with no band score lower than 5; or an accepted international equivalence.', 'Jun', 1),
(6, 2, 4, 'FISC Foundation Program – Standard', 'The FISC Foundation Program provides a comprehensive academic preparation that is specifically ?designed for international students. ?Students will learn in small and supportive classes, ensuring that on completion, they are fully prepared for studying in a university environment. The Standard program runs for 2 trimesters (14 weeks each) over 8 months. Students will study 9 units ?consisting of 3 English units and 6 discipline based units. Students may change to new subjects at ?the completion of their first trimester provided they fulfil any prerequisites for those subjects.? Classes have up to 25 students. \n\n', 'AUD 20,900\r\n\r\n', '8 months', 'Australia: Year 11 (60% in relevant subjects)\r\nMalaysia: SPM (or forecast) - aggregate of 30 or less across 5 academic subjects\r\nSingapore: Singapore O Levels (or forecast) - aggregate of 30 or less across 5 academic subjects\r\nOr an equivalent qualification', 'aug,sep,oct', 1),
(7, 3, 4, 'Bachelor of Applied Economics', 'About this course\r\n\r\nThe Applied Economics degree is designed to train professional economists who are ready for a wide-variety of positions in the job market. It provides students with a strong core of knowledge in economic theory and their applications in a wide-array of situations. Upon successful completion of the degree, students will develop a deeper understanding of the workings of the economy; the context in which households, individuals and firms interact in the market; and government?s intervention in the market. Students will be able to confidently analyse economic data and provide advice to various stakeholders and inform public policy. The program offers a high degree of flexibility through the ability to choose an open major from more than 50 fields across all faculties of the university. Graduates will find employment in various industries (including banking, insurance, and finance) and different levels of federal and state government institutions (such as Department of Treasury, Australian Bureau of Statistics, Australian Taxation Office, Reserve Bank and Productivity Commission).\r\n\r\n', 'AUD 65,400', '3 years', 'Normal UC admission requirements to an undergraduate course.\r\nQualifications recognised by the university.', 'Aug', 1),
(8, 7, 4, 'Master of Arts (Visual Arts, Design, and Music)', 'The Master of Arts programme provides students with a postgraduate study which leads towards professional and higher academic practice. This one-year postgraduate programme is ideal for graduates who have completed the Bachelor of Media Arts (Honours) programme, an equivalent qualification, a Postgraduate Diploma or professional practice. ', 'NZD 19,125', '1 year', 'Corresponding Bachelor with Honours degree, or\r\nPostgraduate Diploma with a minimum of a B grade average or equivalent, or\r\nWork-related experience equivalent to a corresponding Bachelor with Honours degree. Candidates will be required to demonstrate a high order of knowledge of their principal subject of study, including analytic writing, or', 'Mar', 1),
(9, 4, 4, 'Diploma of Marketing', 'Diploma of Marketing in APM College of Business and Communication gives students the skills and marketing training to understand the important role that marketing plays in the success of contemporary organisations. Students will be able to examine industry trends, develop integrated marketing communications concepts, understand consumer needs and identify opportunities in the marketplace.', 'AUD 18,000', '1 year', 'Successfully completed a NSW School Certificate (Year 10) or the equivalent qualification from another state, territory or country or have relevant work experience.\r\nYou must be at least 17 years of age or 21 or over if you are applying as a mature aged student.', 'Jun', 1),
(10, 5, 4, 'Bachelor of Engineering ', 'This program is at the forefront of engineering education and is designed to satisfy current industry demand. Civil and infrastructure engineers plan, design, construct, supervise, manage and maintain essential infrastructure in modern communities. They aim to be responsive to wider community needs and reflective of the values that relate to the economic, environmental and social impacts of projects. \n\n', 'AUD 35,072', '4 years', 'You must have successfully completed an Australian Year 12 or an equivalent senior secondary school qualification with a minimum average of 70%.\r\nAny other international qualifications that are equivalent to an Australian Year 12.', 'Jun', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_image`
--

CREATE TABLE IF NOT EXISTS `course_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `myaccount`
--

CREATE TABLE IF NOT EXISTS `myaccount` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `process_table`
--

CREATE TABLE IF NOT EXISTS `process_table` (
  `process_id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `time_line_id` int(11) DEFAULT NULL,
  `is_completed` varchar(45) DEFAULT NULL,
  `completed_date` date NOT NULL,
  `expected_date` date NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`process_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `process_table`
--

INSERT INTO `process_table` (`process_id`, `application_id`, `time_line_id`, `is_completed`, `completed_date`, `expected_date`, `status`) VALUES
(1, 1, 1, '1', '2016-12-17', '2016-12-19', 1),
(36, 1, 2, '1', '2016-12-20', '2016-12-18', 1),
(69, 1, 3, '1', '2017-01-25', '2016-12-23', 1),
(70, 2, 5, '1', '2016-12-17', '2016-12-19', 1),
(71, 2, 6, '1', '2016-12-20', '2016-12-18', 1),
(72, 2, 7, '0', '0000-00-00', '2016-12-23', 1),
(73, 3, 9, '1', '2016-12-17', '2016-12-19', 1),
(74, 3, 10, '1', '2016-12-20', '2016-12-18', 1),
(75, 3, 11, '0', '0000-00-00', '2016-12-23', 1),
(76, 1, 4, '0', '0000-00-00', '2017-02-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `name`, `email`, `password`, `phone_no`, `created_at`, `status`) VALUES
(1, 'hari', 'hp.hari423@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9487914513', '2016-12-06 05:15:21', 1),
(2, 'hariprasath', 'jhp.hari06@gmailc.com', 'e10adc3949ba59abbe56e057f20f883e', '9876543210', '2016-12-22 09:23:23', 1),
(3, 'robin', 'robin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9876511111', '2016-12-22 09:23:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE IF NOT EXISTS `timeline` (
  `timeline_id` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `timeline_name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`timeline_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`timeline_id`, `college_id`, `course_id`, `country_id`, `timeline_name`, `status`) VALUES
(1, 1, 1, 3, 'Application Submitted', 1),
(2, 1, 1, 3, 'Document Sent', 1),
(3, 1, 1, 3, 'Document Verification', 1),
(4, 1, 1, 3, 'successfully Completed', 1),
(5, 10, 2, 3, 'Application Submitted', 1),
(6, 10, 2, 3, 'Document Sent', 1),
(7, 10, 2, 3, 'Document Verification', 1),
(8, 10, 2, 3, 'successfully Completed', 1),
(9, 7, 3, 3, 'Application Submitted', 1),
(10, 7, 3, 3, 'Document Sent', 1),
(11, 7, 3, 3, 'Document Verification', 1),
(12, 7, 3, 3, 'successfully Completed', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
